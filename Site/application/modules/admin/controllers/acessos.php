<?php

if (!defined('BASEPATH'))
    exit('Acesso direto ao script negado.');

/**
 * Esta classe foi gerada automaticamente pelo sistema de geração 
 * de CMS para Codeigniter desenvolvido por Eliel de Paula. 
 * 
 * Esta classe fornece os atributos e métodos necessários para 
 * o controller da tabela tb_acessos 
 * 
 * @author Eliel de Paula - <elieldepaula@gmail.com> 
 * @since 26/07/2012 
 * @version 0.0.1 
 * 
 */

class acessos extends MX_Controller {

    private $painel_name = 'acessos';

    function __construct() {
        parent::__construct();
        only_user();
        $this->load->model($this->painel_name . '_model');
    }

    /**
     * Este método mostra a lista de registros da tabela tb_acessos.
     * 
     * @access public 
     * @author Eliel de Paula <elieldepaula@gmail.com> 
     * @return boolean 
     */
    public function index($cod_usuario) {
        $config = array();
        $dados_painel = array();
        $limit = 25;
        $uri_segment = 6;
        $offset = $this->uri->segment($uri_segment);
        $config['base_url'] = site_url('admin/' . $this->painel_name . '/index/' . $cod_usuario . '/pag');
        $total_registros = $this->acessos_model->count_all($cod_usuario);
        $config['total_rows'] = $total_registros;
        $config['per_page'] = $limit;
        $config['uri_segment'] = $uri_segment;
        $this->pagination->initialize($config);
        $dados_painel['msg'] = $this->session->flashdata('feedback');
        $dados_painel['lista'] = $this->acessos_model->get_paged_list($cod_usuario, $limit, $offset)->result();
        $dados_painel['paginacao'] = $this->pagination->create_links();
        $dados_painel['total_registros'] = $total_registros;
        $dados_painel['modo'] = 'default';
        $this->template->load('main_view', $this->painel_name . '_view', $dados_painel);
    }

    /**
     * Este método exibe o formulário de cadastro da tabela tb_acessos.
     * 
     * @access public 
     * @author Eliel de Paula <elieldepaula@gmail.com> 
     * @return boolean 
     */
    public function insert() {
        $dados_painel['modo'] = 'insert';
        $this->template->load('main_view', $this->painel_name . '_view', $dados_painel);
    }

    /**
     * Este método exibe o formulário de alteração da tabela tb_acessos.
     * 
     * @access public 
     * @author Eliel de Paula <elieldepaula@gmail.com> 
     * @return boolean 
     */
    public function update($id = '') {
        if ($id == '')
            redirect('admin/' . $this->painel_name);
        $dados_painel['modo'] = 'update';
        $dados_painel['row'] = $this->acessos_model->get_by_id($id)->row();
        $this->template->load('main_view', $this->painel_name . '_view', $dados_painel);
    }

    /**
     * Este método salva o registro na tabela tb_acessos.
     * Se houver um ID ele atualiza, caso contrário cria um novo registro.
     * 
     * NOTA: Este método foi gerado automaticamente mas não é utilizado no CMS
     *       já que o registro dos acessos é feito durante o login.
     * 
     * @access public 
     * @author Eliel de Paula <elieldepaula@gmail.com> 
     * @return boolean 
     */
    public function save($id = '') {
        $dados_save['cod_acesso'] = $_POST['cod_acesso'];
        $dados_save['cod_usuario'] = $_POST['cod_usuario'];
        $dados_save['ace_data'] = $_POST['ace_data'];
        $dados_save['ace_ip'] = $_POST['ace_ip'];
        if ($id):
            if ($this->acessos_model->update($id, $dados_save)):
                $this->session->set_flashdata('feedback', 'Dados salvos com sucesso!');
                redirect('admin/' . $this->painel_name);
            else:
                $this->session->set_flashdata('feedback', 'Erro ao salvar os dados.');
                redirect('admin/' . $this->painel_name);
            endif;
        else:
            if ($this->acessos_model->save($dados_save)):
                $this->session->set_flashdata('feedback', 'Dados salvos com sucesso!');
                redirect('admin/' . $this->painel_name);
            else:
                $this->session->set_flashdata('feedback', 'Erro ao salvar os dados');
                redirect('admin/' . $this->painel_name);
            endif;
        endif;
    }

    /**
     * Este método exclui um registro da tabela tb_acessos.
     * 
     * @access public 
     * @author Eliel de Paula <elieldepaula@gmail.com> 
     * @return boolean 
     */
    public function delete($id) {
        if ($this->acessos_model->delete($id)):
            $this->session->set_flashdata('feedback', 'Dados excluidos com sucesso!');
            redirect('admin/' . $this->painel_name);
        else:
            $this->session->set_flashdata('feedback', 'Erro ao excluir os dados.');
            redirect('admin/' . $this->painel_name);
        endif;
    }

}

/* Sem fechamento para evitar erros de cabecalho. */

