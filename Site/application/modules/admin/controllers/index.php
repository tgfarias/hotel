<?php

if (!defined('BASEPATH'))
    exit('Acesso direto ao script negado.');

/**
 * Este controller faz a exibição dos ítens iniciais e de segurança do Life CMS
 *
 * @access public
 * @author Eliel de Paula <elieldepaula@gmail.com>
 */
class index extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    /**
     * Este método exibe a página inicial do CMS
     * 
     * @access public
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @return void
     */
    public function index() {
        only_user();
        $dados_painel['msg'] = $this->session->flashdata('feedback');
        $this->template->load('main_view', 'dashboard_view', $dados_painel);
    }

    /**
     * Este método exibe a tela de recuperação de senha.
     * 
     * @access public
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @return void
     */
    public function recuperar() {
        $this->load->view('recuperar_senha');
    }

    /**
     * Este método exibe a tela de login do CMS.
     * 
     * @access public
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @return void
     */
    public function login() {
        $this->load->view('login_view');
    }

    /**
     * Este método efetua o teste do login verificando os dados enviados pelo
     * formulário de login.
     * 
     * @access public
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @return void
     */
    public function dologin() {
        $user = strip_tags($_POST['email']);
        $pass = strip_tags($_POST['senha']);
        if (!$user && !$pass):
            $this->session->set_flashdata('feedback', 'Os dados não podem ficar em branco.');
            redirect('admin/index/login');
        else:
            $this->load->model('usuarios_model');
            $login = $this->usuarios_model->check_login($user, md5($pass));
            if ($login):
                $usuario = $this->usuarios_model->get_by_id($login)->row();
                /**
                 * Seta a sessão do CI com os dados do usuário.
                 */
                $dados_usuario = array(
                    'cod_usuario' => $usuario->cod_usuario,
                    'nome' => $usuario->usu_nome,
                    'admin' => $usuario->usu_admin,
                    'permissoes' => $usuario->usu_permissoes,
                    'email' => $usuario->usu_email,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($dados_usuario);
                /**
                 * Registra o acesso
                 */
                $this->load->model('acessos_model');
                $dados_acesso['cod_usuario'] = $usuario->cod_usuario;
                $dados_acesso['ace_data'] = date("Y-m-d H:i:s");
                $dados_acesso['ace_ip'] = $_SERVER["REMOTE_ADDR"];
                $this->acessos_model->save($dados_acesso);
                /**
                 * Redireciona para a página protegida.
                 */
                redirect('admin/index');
            else:
                $this->session->set_flashdata('feedback', 'Seu login falhou, por favor tente novamente.');
                redirect('admin/index/login');
            endif;
        endif;
    }

    /**
     * Este método efetua a saída do usuário do sistema.
     * 
     * @access public
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @return void
     */
    public function dologout() {
        $dados_usuario = array(
            'cod_usuario' => '',
            'nome' => '',
            'email' => '',
            'logged_in' => FALSE
        );
        $this->session->unset_userdata($dados_usuario);
        redirect('admin/index/login');
    }

    /**
     * Este método processa a primeira parte da recuperação de senha do usuário
     * enviando um email com o código de confirmação para redefinir a senha.
     * 
     * @access public
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @return void
     */
    public function dorecover() {
        $this->load->model('usuarios_model');
        /**
         * Verifica se o email está em branco ou não.
         */
        $email = $_POST['email'];
        if ($email == ''):
            $this->session->set_flashdata('feedback', 'É necessário informar o email para recuperar a senha.');
            redirect('admin/index/recuperar');
        endif;

        $usuario = $this->usuarios_model->email_existe($email);

        if($usuario):
            $link_confirmacao = site_url('admin/index/confrecovery/' . str_replace('=', '', base64_encode(base64_encode($usuario->usu_email))));
            $mensagem = "";
            $mensagem .= "SOLICITAÇÃO DE REDEFINIÇÃO DE SENHA\n";
            $mensagem .= "-----------------------------------\n\n";
            $mensagem .= "Olá " . $usuario->usu_nome . ", você está recebendo este email pois recebemos uma solicitação de redefinição de senha para o usuário deste email.\n\n";
            $mensagem .= "Clique no link abaixo para confirmar sua solicitação, em seguida você receberá outro e-mail com novas instruções.\n\n";
            $mensagem .= " " . $link_confirmacao . "\n\n";
            $mensagem .= "Caso você não tenha solicitado esta redefinição, simplismente ignore este email pois seus dados estão seguros.\n\n";
            $mensagem .= "Em caso de suporte não hesite em entrar em contato conosco acessando nosso site: www.lifesites.com.br";
            if (mail($usuario->usu_email, 'Redefinição de senha', "$mensagem", "From: Life CMS <nao-responda@lifesites.com.br>")):
                $this->session->set_flashdata('feedback', 'Enviamos uma mensagem de confirmação para o email informado, leia e siga as instruções.');
                redirect('admin/index/recuperar');
            else:
                $this->session->set_flashdata('feedback', 'Não foi possível completar o procedimento, tente novamente mais tarde.');
                redirect('admin/index/recuperar');
            endif;
        else:
            $this->session->set_flashdata('feedback', 'O email indicado não existe em nosso cadastro.');
            redirect('admin/index/recuperar');
        endif;
    }

    /**
     * Este método efetua a validação do código enviado para o usuário na
     * primeira fase da recuperação dos dados.
     * 
     * @access public
     * @param type $codigo
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @return void
     */
    public function confrecovery($codigo) {
        $this->load->model('usuarios_model');
        if ($codigo == ''):
            $this->session->set_flashdata('feedback', 'Procedimento inválido.');
            redirect('admin/index/login');
        else:
            $email = base64_decode(base64_decode($codigo));
            $usuario = $this->usuarios_model->email_existe($email);
            if ($usuario):
                $dados_update = array();
                $dados_update['usu_senha'] = '89794b621a313bb59eed0d9f0f4e8205';
                if ($this->usuarios_model->update($usuario->cod_usuario, $dados_update)):
                    $mensagem = "";
                    $mensagem .= "CONFIRMAÇÃO DE REDEFINIÇÃO DE SENHA \n";
                    $mensagem .= "------------------------------------ \n\n";
                    $mensagem .= "Olá " . $usuario->usu_nome . ", sua senha foi derefinida, confira abaixo seus dados de login atualizados: \n";
                    $mensagem .= "Email: " . $usuario->usu_email . " \n";
                    $mensagem .= "Senha: 123mudar \n\n";
                    $mensagem .= "Para sua segurança, altere a sua senha imediatamente para uma mais segura de sua preferência. \n\n";
                    $mensagem .= "Lambrando que nosso suporte está disponível acessando nosso site: www.lifesites.com.br \n\n";
                    $mensagem .= "Obrigado. \n\n";
                    $mensagem .= "------------------------------------ \n";
                    $mensagem .= "Este email foi enviado automaticamente, não responda, use nosso suporte on-line acessando www.lifesites.com.br \n\n";
                    if (mail($usuario->usu_email, 'Redefinição de senha', "$mensagem", "From: Life CMS <nao-responda@lifesites.com.br>")):
                        $this->session->set_flashdata('feedback', 'Enviamos uma mensagem com seus novos dados de acesso, obrigado.');
                        redirect('admin/index/login');
                    else:
                        $this->session->set_flashdata('feedback', 'Não foi possível completar o procedimento, tente novamente mais tarde.');
                        redirect('admin/index/recuperar');
                    endif;
                else:
                    $this->session->set_flashdata('feedback', 'Não foi possível completar o procedimento, tente novamente mais tarde.');
                    redirect('admin/index/recuperar');
                endif;
            else:
                $this->session->set_flashdata('feedback', 'O usuário não foi encontrado em nossa base de dados.');
                redirect('admin/index/login');
            endif;
        endif;
    }

}