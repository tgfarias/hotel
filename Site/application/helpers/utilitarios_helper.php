<?php

if (!defined('BASEPATH'))
    exit('Poibido o acesso direto ao script.');

/**
 * Este é o arquivo de Helper Utilitário do CMS, ele reúne algumas
 * das funções usadas frequentemente no desenvolvimento dos sites.
 * 
 * NOTA
 * ----
 * Este helper é exclusivo para o ADMIN e é iniciado automaticamente,
 * caso tenha que executar alguma função no site, é necessário ou 
 * copiar a função no website_helper ou inicia-lo no controller do site.
 * 
 * DEFINIÇÕES
 * ----------
 * Como em funções não temos as classificações 'public' nem 'private', foi
 * adotado o padrão de nomenclatura do Framework que identifica funções
 * com _ (underline) como privadas para que o desenvolvedor saiba que são
 * usadas apenas em outras funções do mesmo helper e não na aplicação direta.
 * 
 * EX: _nome_da_funcao()
 * 
 * DICAS DE USO DE RECURSOS
 * ------------------------
 * -> Usando os models nos helpers:
 *    Usa-se uma variável para receber a instância atual do framework e então
 *    poder executar os comandos como em um método comum de um controller:
 * 
 *    Ex:
 *    ---
 *    $CI = & get_instance();
 *    $CI->load->model('nome_do_model');
 *    $CI->nome_do_model->algum_metodo();
 * 
 * @author Eliel de Paula <elieldepaula@gmail.com>
 * @since 20/07/2012
 * @version 0.0.1
 * 
 */
if (!function_exists('get_user_login')) {

    /**
     * Esta função retorna as informações da sessão do usuário logado
     * passando apenas o parametro $chave do ítem a ser retornado.
     * 
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @param string $chave - Valor a ser recuperado da sessão do usuário.
     * @return string 
     */
    function get_user_login($chave) {
        $CI = & get_instance();
        return $CI->session->userdata($chave);
    }

}

if (!function_exists('get_relacionamento')) {
    function get_relacionamento($tabela, $chave, $titulo, $posicao){
        
        $model = $tabela.'_model';
        
        $CI = & get_config();
        $CI->load->model($model);
        
        switch ($posicao) :
            case 'text' :
                // Exibe o tídulo em forma de texto normal.
                break;
            case 'insert' :
                // Mosta um select para formulário
                break;
            case 'update' :
                // Mostra um select selecionado para alteração
                break;
        endswitch;
    }
}

if (!function_exists('sim_nao')) {

    /**
     * Esta função retorna 'Sim' ou 'Não' de acordo com o parametro $var, ela
     * é utilizada normalmente para responder a perguntas como Publicado: [Sim, Não]
     * usando como parãmetro a variável $var.
     * 
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @param string $var - Variável a ser testada.
     * @return string 
     */
    function sim_nao($var) {
        if ($var):
            return 'Sim';
        else:
            return 'N&atilde;o';
        endif;
    }

}

if (!function_exists('publicado')) {

    /**
     * Esta função retorna "Publicado" ou "Não publicado"
     * caso o parametro seja verdadeiro ou não, como 
     * alternativa à função sim_nao()
     * 
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @param int $var - Variável a ser testada.
     * @return string
     */
    function publicado($var) {
        if ($var):
            return 'Publicado';
        else:
            return 'N&atilde;o publicado';
        endif;
    }

}

if (!function_exists('marcado')) {

    /**
     * Esta função insere a propriedade 'checked' em um input do tipo 'checkbox'.
     * 
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @param int $var - Variável a ser testada.
     * @return string
     */
    function marcado($var) {
        if ($var):
            return 'checked="checked"';
        endif;
    }

}

if (!function_exists('get_menu_admin')) {

    /**
     * Esta função é responsável por montar o menu lateral do painel
     * de controle do site de acordo com os módulos cadastrados e marcados
     * como 'visível no menu lateral'.
     * 
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @return string
     */
    function get_menu_admin() {
        $CI = & get_instance();
        $CI->load->model('modulos_model');
        return $CI->modulos_model->get_menu_admin();
    }

}

if (!function_exists('only_user')) {

    /**
     * Esta função verifica se o usuário está logado no sistema ou não
     * para fazer o controle das áreas restritas verificando seu nível
     * de permissão determinado durante o cadastro do usuário.
     * 
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @return void
     */
    function only_user() {
        $CI = & get_instance();
        $logado = $CI->session->userdata('logged_in');
        if ($logado):
            $admin = $CI->session->userdata('admin');
            $permissoes = $CI->session->userdata('permissoes');
            if (!$admin):
                $array_permissoes = explode(';', $permissoes);
                if (!_verifica_permissao($array_permissoes, _get_modulo_id())):
                    $CI->session->set_flashdata('feedback', 'Você não tem permissão para acessar esta área.');
                    redirect('admin/index');
                endif;
            endif;
        else:
            $CI->session->set_flashdata('feedback', 'Área restrita a usuários registrados.');
            redirect('admin/index/login');
        endif;
    }

}

if (!function_exists('is_admin')) {

    /**
     * Esta função verifica se o usuário logado é um usuário 'master' ou não para
     * decidir se libera o acesso total ou não.
     * 
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @return boolean
     */
    function is_admin() {
        $CI = & get_instance();
        if ($CI->session->userdata('admin')):
            return true;
        else:
            return false;
        endif;
    }

}

if (!function_exists('get_categoria')) {

    /**
     * Esta função retorna o título de uma categoria referenciando
     * o código da categoria.
     * 
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @param int $cod_categoria
     * @return string
     */
    function get_categoria($cod_categoria) {
        $CI = & get_instance();
        $CI->load->model('categorias_model');
        $cat = $CI->categorias_model->get_by_id($cod_categoria)->row();
        return $cat->cat_titulo;
    }

}

if (!function_exists('get_secao')) {

    /**
     * Esta função retorna o título de uma seção referenciando
     * o código da seção.
     * 
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @param int $cod_secao
     * @return string
     */
    function get_secao($cod_secao) {
        $CI = & get_instance();
        $CI->load->model('secoes_model');
        $cat = $CI->secoes_model->get_by_id($cod_secao)->row();
        return $cat->sec_titulo;
    }

}

if (!function_exists('_verifica_permissao')) {

    /**
     * Esta função verifica a permissão do usuário, ela é usada somente
     * na função only_user()
     * 
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @param array $array
     * @param int $modulo_atual
     * @return boolean
     */
    function _verifica_permissao($array, $modulo_atual) {
        $out = false;
        foreach ($array as $modulo):
            if ($modulo == $modulo_atual):
                $out = true;
                break;
            else:
                $out = false;
            endif;
        endforeach;
        return $out;
    }

}

if (!function_exists('_get_modulo_id')) {

    /**
     * Esta função retorna o código do módulo informando o link cadastrado
     * no banco de dados. Esta função é usada somente na função only_user()
     * para a verificação da pesmissão do usuário. 
     * 
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @return mixed
     */
    function _get_modulo_id() {
        $CI = & get_instance();
        $modulo_atual = $CI->uri->segment(2);
        $CI->load->model('modulos_model');
        $query = $CI->modulos_model->get_id_by_link('admin/' . $modulo_atual)->row();
        return $query->cod_modulo;
    }

}

if (!function_exists('relacionamento')) {
    
    /**
     * Esta função busca o relacionamento básico entre tabelas.
     * 
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * 
     * @since 0.2
     * @param string $tabela
     * @param string $chave
     * @param string $titulo
     * @param string $valor
     * @param string $posicao
     * @return mixed
     */
    function relacionamento($tabela, $chave, $titulo, $valor, $posicao){
        
        $model = str_replace('tb_', '', $tabela) . '_model';
        
        $CI = & get_instance();
        $CI->load->model($model);
        
        
        switch ($posicao):
            case 'text':
                $query = $CI->{$model}->relacionamento($chave, $valor)->row();
                return $query->{$titulo};
                break;
            case 'form':
                return $CI->{$model}->relacionamento($chave, $valor)->result();
                break;
        endswitch;
    }
}

/* Sem fechamento para evitar erros de cabecalho. */