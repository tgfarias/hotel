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

class dadosusuario extends MX_Controller {

    private $painel_name = 'usuarios';

    function __construct() {
        parent::__construct();
        only_user();
        $this->load->model($this->painel_name . '_model');
    }

    /**
     * Este método exibe o formulário de alteração da tabela tb_acessos.
     * 
     * @access public 
     * @author Eliel de Paula <elieldepaula@gmail.com> 
     * @return boolean 
     */
    public function index($id = '') {
        $id = $this->session->userdata('cod_usuario');
        $dados_painel['msg'] = $this->session->flashdata('feedback');
        $dados_painel['modo'] = 'usuario';
        $dados_painel['row'] = $this->usuarios_model->get_by_id($id)->row();
        $this->template->load('main_view', $this->painel_name . '_view', $dados_painel);
    }

    /**
     * Este método salva o registro na tabela tb_acessos.
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

        if ($id):
            if ($_POST['alterar_senha'])
                $dados_save['usu_senha'] = md5($_POST['usu_senha']);
            if ($this->usuarios_model->update($id, $dados_save)):
                $this->session->set_flashdata('feedback', 'Dados salvos com sucesso!');
                redirect('admin/dadosusuario', 'script');
            else:
                $this->session->set_flashdata('feedback', 'Erro ao salvar os dados.');
                redirect('admin/dadosusuario', 'script');
            endif;
        else:
            $this->session->set_flashdata('feedback', 'Procedimento inválido');
            redirect('admin/dadosusuario');
        endif;
    }

}

/* Sem fechamento para evitar erros de cabecalho. */

