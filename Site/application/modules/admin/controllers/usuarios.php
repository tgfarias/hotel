<?php

if (!defined('BASEPATH'))
    exit('Acesso direto ao script negado.');

/**
 * Esta classe foi gerada automaticamente pelo sistema de geração 
 * de CMS para Codeigniter desenvolvido por Eliel de Paula. 
 * 
 * Esta classe fornece os atributos e métodos necessários para 
 * o controller da tabela tb_usuarios 
 * 
 * @author Eliel de Paula - <elieldepaula@gmail.com> 
 * @since 26/07/2012 
 * @version 0.0.1 
 * 
 */

class usuarios extends MX_Controller {

    private $painel_name = 'usuarios';

    function __construct() {
        parent::__construct();
        only_user();
        $this->load->model($this->painel_name . '_model');
    }

    /**
     * Este método mostra a lista de registros da tabela tb_usuarios.
     * 
     * @access public 
     * @author Eliel de Paula <elieldepaula@gmail.com> 
     * @return boolean 
     */
    public function index() {
        $config = array();
        $dados_painel = array();
        $limit = 25;
        $uri_segment = 5;
        $offset = $this->uri->segment($uri_segment);
        $config['base_url'] = site_url('admin/' . $this->painel_name . '/index/pag');
        $total_registros = $this->usuarios_model->count_all();
        $config['total_rows'] = $total_registros;
        $config['per_page'] = $limit;
        $config['uri_segment'] = $uri_segment;
        $this->pagination->initialize($config);
        $dados_painel['msg'] = $this->session->flashdata('feedback');
        $dados_painel['lista'] = $this->usuarios_model->get_paged_list($limit, $offset)->result();
        $dados_painel['paginacao'] = $this->pagination->create_links();
        $dados_painel['total_registros'] = $total_registros;
        $dados_painel['modo'] = 'default';
        $this->template->load('main_view', $this->painel_name . '_view', $dados_painel);
    }

    /**
     * Este método exibe o formulário de cadastro da tabela tb_usuarios.
     * 
     * @access public 
     * @author Eliel de Paula <elieldepaula@gmail.com> 
     * @return boolean 
     */
    public function insert() {
        $this->load->model('modulos_model');
        $dados_painel['lista_modulos'] = $this->modulos_model->list_all()->result();
        $dados_painel['modo'] = 'insert';
        $this->template->load('main_view', $this->painel_name . '_view', $dados_painel);
    }

    /**
     * Este método exibe o formulário de alteração da tabela tb_usuarios.
     * 
     * @access public 
     * @author Eliel de Paula <elieldepaula@gmail.com> 
     * @return boolean 
     */
    public function update($id = '') {
        $this->load->model('modulos_model');
        if ($id == '')
            redirect('admin/' . $this->painel_name, 'script');
        $dados_painel['modo'] = 'update';
        $dados_painel['lista_modulos'] = $this->modulos_model->list_all()->result();
        $dados_painel['modulos'] = $this->modulos_model;
        $dados_painel['row'] = $this->usuarios_model->get_by_id($id)->row();
        $this->template->load('main_view', $this->painel_name . '_view', $dados_painel);
    }

    /**
     * Este método salva o registro na tabela tb_usuarios.
     * Se houver um ID ele atualiza, caso contrário cria um novo registro.
     * 
     * @access public 
     * @author Eliel de Paula <elieldepaula@gmail.com> 
     * @return boolean 
     */
    public function save($id = '') {
        if ($_POST['usu_nome'])
            $dados_save['usu_nome'] = $_POST['usu_nome'];
        if ($_POST['usu_email'])
            $dados_save['usu_email'] = $_POST['usu_email'];
        if (isset($_POST['usu_admin'])):
            $dados_save['usu_admin'] = $_POST['usu_admin'];
        else:
            $dados_save['usu_admin'] = '';
        endif;
        if ($_POST['usu_ativo']):
            $dados_save['usu_ativo'] = $_POST['usu_ativo'];
        else:
            $dados_save['usu_ativo'] = '';
        endif;
        // Trata as permissões
        if (isset($_POST['usu_permissoes'])):
            $permissoes = '';
            foreach ($_POST['usu_permissoes'] as $modulo):
                $permissoes .= $modulo . ';';
            endforeach;
            $dados_save['usu_permissoes'] = $permissoes;
        else:
            $dados_save['usu_permissoes'] = '';
        endif;
        if ($id):
            if (isset($_POST['alterar_senha']))
                $dados_save['usu_senha'] = md5($_POST['usu_senha']);
            if ($this->usuarios_model->update($id, $dados_save)):
                $this->session->set_flashdata('feedback', 'Dados salvos com sucesso!');
                redirect('admin/' . $this->painel_name, 'script');
            else:
                $this->session->set_flashdata('feedback', 'Erro ao salvar os dados.');
                redirect('admin/' . $this->painel_name, 'script');
            endif;
        else:
            $dados_save['usu_senha'] = md5($_POST['usu_senha']);
            $dados_save['usu_data_cad'] = mdate('%Y-%m-%d', strtotime($_POST['usu_data_cad']));
            if ($this->usuarios_model->save($dados_save)):
                $this->session->set_flashdata('feedback', 'Dados salvos com sucesso!');
                redirect('admin/' . $this->painel_name, 'script');
            else:
                $this->session->set_flashdata('feedback', 'Erro ao salvar os dados');
                redirect('admin/' . $this->painel_name, 'script');
            endif;
        endif;
    }

    /**
     * Este método exclui um registro da tabela tb_usuarios.
     * 
     * @access public 
     * @author Eliel de Paula <elieldepaula@gmail.com> 
     * @return boolean 
     */
    public function delete($cod_usuario) {
        $this->load->model('acessos_model');
        if ($this->acessos_model->delete($cod_usuario) AND $this->usuarios_model->delete($cod_usuario)):
            $this->session->set_flashdata('feedback', 'Dados excluidos com sucesso!');
            redirect('admin/' . $this->painel_name, 'script');
        else:
            $this->session->set_flashdata('feedback', 'Erro ao excluir os dados.');
            redirect('admin/' . $this->painel_name, 'script');
        endif;
    }

}

/* Sem fechamento para evitar erros de cabecalho. */