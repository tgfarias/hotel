<?php 

if ( ! defined('BASEPATH')) exit('Acesso direto ao script negado.'); 

/** 
 * Esta classe foi gerada automaticamente pelo sistema de geração 
 * de CMS para Codeigniter desenvolvido por Eliel de Paula. 
 * 
 * Esta classe fornece os atributos e métodos necessários para 
 * o controller da tabela funcionarios 
 * 
 * @package CMS 
 * @author Gerado automaticamente - <contato@elieldepaula.com.br> 
 * @since 28/03/2013 
 * @version 0.0.1 
 * 
 */

class funcionarios extends MX_Controller { 

    private $painel_name = 'funcionarios';

    function __construct() {
        parent::__construct();
        only_user();
        $this->load->model($this->painel_name.'_model');
    }

    /**
     * Este método mostra a lista de registros da tabela funcionarios.
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
        $total_registros = $this->funcionarios_model->count_all();
        $config['total_rows'] = $total_registros;
        $config['per_page'] = $limit;
        $config['uri_segment'] = $uri_segment;
        $this->pagination->initialize($config);
        $dados_painel['msg'] = $this->session->flashdata('feedback');
        $dados_painel['lista'] = $this->funcionarios_model->get_paged_list($limit, $offset)->result();
        $dados_painel['paginacao'] = $this->pagination->create_links();
        $dados_painel['total_registros'] = $total_registros;
        $dados_painel['modo'] = 'default';
        $this->template->load('main_view', $this->painel_name.'_view', $dados_painel);
    }

    /**
     * Este método exibe o formulário de cadastro da tabela funcionarios.
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
     * Este método exibe o formulário de alteração da tabela funcionarios.
     * 
     * @access public 
     * @author Gerado automaticamente <contato@elieldepaula.com.br> 
     * @return boolean 
     */
    public function update($id = ''){
        if($id=='')redirect('admin/'.$this->painel_name);
        $dados_painel['modo'] = 'update';
        $dados_painel['row'] = $this->funcionarios_model->get_by_id($id)->row();
        $this->template->load('main_view', $this->painel_name.'_view', $dados_painel);
    }

    /**
     * Este método salva o registro na tabela funcionarios.
     * Se houver um ID ele atualiza, caso contrário cria um novo registro.
     * 
     * @access public 
     * @author Gerado automaticamente <contato@elieldepaula.com.br> 
     * @return boolean 
     */
    public function save($id = '') {
        $dados_save['cod_turno'] = $_POST['cod_turno'];
        $dados_save['nome'] = $_POST['nome'];
        $dados_save['funcao'] = $_POST['funcao'];
        $dados_save['data_admissao'] = $_POST['data_admissao'];
        $dados_save['telefone'] = $_POST['telefone'];
        $dados_save['email'] = $_POST['email'];
        $dados_save['ativo'] = $_POST['ativo'];
        if($id):
            if($this->funcionarios_model->update($id, $dados_save)):
                $this->session->set_flashdata('feedback', 'Dados salvos com sucesso!');
                redirect('admin/'.$this->painel_name);
            else:
                $this->session->set_flashdata('feedback', 'Erro ao salvar os dados.');
                redirect('admin/'.$this->painel_name);
            endif;
        else:
			$dados_save['cod_usuario'] = $this->session->userdata('cod_usuario');
            if($this->funcionarios_model->save($dados_save)):
                $this->session->set_flashdata('feedback', 'Dados salvos com sucesso!');
                redirect('admin/'.$this->painel_name);
            else:
                $this->session->set_flashdata('feedback', 'Erro ao salvar os dados');
                redirect('admin/'.$this->painel_name);
            endif;
        endif;
    }

    /**
     * Este método exclui um registro da tabela funcionarios.
     * 
     * @access public 
     * @author Gerado automaticamente <contato@elieldepaula.com.br> 
     * @return boolean 
     */
    public function delete($id) {
        if($this->funcionarios_model->delete($id)):
            $this->session->set_flashdata('feedback', 'Dados excluidos com sucesso!');
    	       redirect('admin/'.$this->painel_name);
    	   else:
    	       $this->session->set_flashdata('feedback', 'Erro ao excluir os dados.');
            redirect('admin/'.$this->painel_name);
    	   endif;
    }

}

/* Sem fechamento para evitar erros de cabecalho. */

