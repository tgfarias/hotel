<?php

if (!defined('BASEPATH'))
    exit('Poibido o acesso direto ao script.');

/**
 * Este helper reúne as funçõs usadas mais frequentemente
 * no desenvolviemnto dos sites durante a integração do 
 * layout com o framework. 
 * 
 * NOTA
 * ----
 * Este helper é exclusivo para o SITE e não é iniciado automaticamente,
 * caso tenha que executar alguma função no site, é necessário inicia-lo 
 * no controller do site.
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

if (!function_exists('get_conf')) {

    /**
     * Esta função retorna uma configuração dinâmica criada no painel de controle
     * para ser usada em qualquer parte do site. Para usar informe como a chave
     * criada como parâmetro para recuperar seu valor.
     * 
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @param string $chave
     * @return string 
     */
    function get_conf($chave) {
        $CI = & get_instance();
        $CI->load->model('configuracoes_model');
        return $CI->configuracoes_model->get_by_chave($chave);
    }

}

if (!function_exists('formata_valor')) {

    /**
     * Esta função formata um número para um valor monetário.
     * 
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @param double $valor - Valor a ser formatado
     * @return double
     */
    function formata_valor($valor) {
        return number_format($valor,2,',','.');
    }

}

if (!function_exists('formata_valor_db')){
 
    /**
     * Esta função muda o formato de um valor BR para ser inserido no banco de dados.
     * 
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @since 0.1 21/02/2013
     * @param string $valor Valor a ser convertido
     * @return string
     */
    function formata_valor_db($valor){
        $valor = str_replace('.', '', $valor);
        $valor = str_replace(',', '.', $valor);
        return $valor;
    }	
 }

/* Sem fechamento para evitar erros de cabecalho. */