<?php 

if ( ! defined('BASEPATH')) exit('Acesso direto ao script negado.'); 

/** 
 * Esta classe foi gerada automaticamente pelo sistema de geração 
 * de CMS para Codeigniter desenvolvido por Eliel de Paula. 
 * 
 * Esta classe fornece os atributos e métodos necessários para 
 * o controller da tabela categoria_apartamento 
 * 
 * @package CMS 
 * @author Gerado automaticamente - <contato@elieldepaula.com.br> 
 * @since 28/03/2013 
 * @version 0.0.1 
 * 
 */

class categoria_apartamento extends MX_Controller { 

    private $painel_name = 'categoria_apartamento';

    function __construct() {
        parent::__construct();
        only_user();
        $this->load->model($this->painel_name.'_model');
    }

    /**
     * Este método mostra a lista de registros da tabela categoria_apartamento.
     * 
     * @access public 
     * @author Gerado automaticamente <contato@elieldepaula.com.br> 
     * @return boolean 
     */
    public function index() {
        $config = array();
        $dados_painel = array();
        $limit = 10;
        $uri_segment = 5;
        $offset = $this->uri->segment($uri_segment);
        $config['base_url'] = site_url('admin/'.$this->painel_name.'/index/pag');
        $total_registros = $this->categoria_apartamento_model->count_all();
        $config['total_rows'] = $total_registros;
        $config['per_page'] = $limit;
        $config['uri_segment'] = $uri_segment;
        $this->pagination->initialize($config);
        $dados_painel['msg'] = $this->session->flashdata('feedback');
        $dados_painel['lista'] = $this->categoria_apartamento_model->get_paged_list($limit, $offset)->result();
        $dados_painel['paginacao'] = $this->pagination->create_links();
        $dados_painel['total_registros'] = $total_registros;
        $dados_painel['modo'] = 'default';
        $this->template->load('main_view', $this->painel_name.'_view', $dados_painel);
    }

    /**
     * Este método exibe o formulário de cadastro da tabela categoria_apartamento.
     * 
     * @access public 
     * @author Gerado automaticamente <contato@elieldepaula.com.br> 
     * @return boolean 
     */
    public function insert() {
        $dados_painel['modo'] = 'insert';
        $this->template->load('main_view', $this->painel_name.'_view', $dados_painel);
    }

    /**
     * Este método exibe o formulário de alteração da tabela categoria_apartamento.
     * 
     * @access public 
     * @author Gerado automaticamente <contato@elieldepaula.com.br> 
     * @return boolean 
     */
    public function update($id = ''){
        if($id=='')redirect('admin/'.$this->painel_name);
        $dados_painel['modo'] = 'update';
        	$dados_painel['row'] = $this->categoria_apartamento_model->get_by_id($id)->row();
        	$this->template->load('main_view', $this->painel_name.'_view', $dados_painel);
    }

    /**
     * Este método salva o registro na tabela categoria_apartamento.
     * Se houver um ID ele atualiza, caso contrário cria um novo registro.
     * 
     * @access public 
     * @author Gerado automaticamente <contato@elieldepaula.com.br> 
     * @return boolean 
     */
    public function save($id = '') {
        $dados_save['titulo'] = $_POST['titulo'];
        $dados_save['descricao'] = $_POST['descricao'];
        $dados_save['imagem'] = $this->_upload();
        $dados_save['valor_normal'] = formata_valor_db( $_POST['valor_normal'] );
        $dados_save['valor_alta'] = formata_valor_db($_POST['valor_alta'] );
        $dados_save['ativo'] = $_POST['ativo'];
        $dados_save['data_cadastro'] = mdate('%Y-%m-%d', strtotime($_POST['data_cadastro']));
        if($id):
            if($this->categoria_apartamento_model->update($id, $dados_save)):
                $this->session->set_flashdata('feedback', 'Dados salvos com sucesso!');
                redirect('admin/'.$this->painel_name);
            else:
                $this->session->set_flashdata('feedback', 'Erro ao salvar os dados.');
                redirect('admin/'.$this->painel_name);
            endif;
        else:
            if($this->categoria_apartamento_model->save($dados_save)):
                $this->session->set_flashdata('feedback', 'Dados salvos com sucesso!');
                redirect('admin/'.$this->painel_name);
            else:
                $this->session->set_flashdata('feedback', 'Erro ao salvar os dados');
                redirect('admin/'.$this->painel_name);
            endif;
        endif;
    }

    /**
     * Este método exclui um registro da tabela categoria_apartamento.
     * 
     * @access public 
     * @author Gerado automaticamente <contato@elieldepaula.com.br> 
     * @return boolean 
     */
    public function delete($id) {
        if($this->categoria_apartamento_model->delete($id)):
            $this->session->set_flashdata('feedback', 'Dados excluidos com sucesso!');
    	       redirect('admin/'.$this->painel_name);
    	   else:
    	       $this->session->set_flashdata('feedback', 'Erro ao excluir os dados.');
            redirect('admin/'.$this->painel_name);
    	   endif;
    }

    /**
     * Este método faz o upload da foto do apartamento.
     *
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @since 0.1 18/04/2013
     * @return String Nome do arquivo
     */
    private function _upload() {
        $config['upload_path'] = './midia/apartamentos/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '0';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $config['remove_spaces'] = TRUE;
        $config['overwrite'] = TRUE;
        $config['file_name'] = md5(date('YmdHis'));
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()):
            return NULL;
        else:
            $capa = $this->upload->data();
            return $capa['file_name'];
        endif;
    }

}

/* Sem fechamento para evitar erros de cabecalho. */

