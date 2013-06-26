<?php

if (!defined('BASEPATH'))exit('Poibido o acesso direto ao script.');

/**
 * Este arquivo é o helper que reúne as funções para a integração
 * do conteúdo no layout.
 * 
 * @author Eliel de Paula <elieldepaula@gmail.com>
 * @since 0.0.1 05/12/2012
 */

if(!function_exists('getConteudoByLink')){
    
    /**
     * Esta função retorna um conteúdo específico baseando-se no link
	 * passado como parâmetro.
     * 
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @param string $link
     * @return array 
     */
    function getConteudoByLink($link){
        if($link == '')redirect('', 'script');
        $CI = & get_instance();
        $CI->load->model('conteudo_model');
        $cont = $CI->conteudo_model->get_by_link($link)->row();
        $CI->conteudo_model->add_view($cont->cod_conteudo);
        $dados = array();
        $dados['cod_conteudo'] = $cont->cod_conteudo;
        $dados['cod_usuario'] = $cont->cod_usuario;
        $dados['cod_categoria'] = $cont->cod_categoria;
        $dados['cnt_tipo'] = $cont->cnt_tipo;
        $dados['cnt_link'] = $cont->cnt_link;
        $dados['cnt_titulo'] = $cont->cnt_titulo;
        $dados['cnt_capa'] = $cont->cnt_capa;
        $dados['cnt_resumo'] = $cont->cnt_resumo;
        $dados['cnt_conteudo'] = $cont->cnt_conteudo;
        $dados['cnt_data_cad'] = $cont->cnt_data_cad;
        $dados['cnt_views'] = $cont->cnt_views;
        $dados['cnt_comentarios'] = $cont->cnt_comentarios;
        $dados['cnt_destaque'] = $cont->cnt_destaque;
        $dados['cnt_publicado'] = $cont->cnt_publicado;
        return $dados;
    }
}

if(!function_exists('getConteudoById')){
    
    /**
     * Esta função retorna um conteúdo específico baseando-se no ID
	 * passado como parâmetro.
     * 
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @param int $id
     * @return array 
     */
    function getConteudoById($id){
        if($id == '')redirect('', 'script');
        $CI = & get_instance();
        $CI->load->model('conteudo_model');
        $cont = $CI->conteudo_model->get_by_id($id)->row();
        $CI->conteudo_model->add_view($cont->cod_conteudo);
        $dados = array();
        $dados['cod_conteudo'] = $cont->cod_conteudo;
        $dados['cod_usuario'] = $cont->cod_usuario;
        $dados['cod_secao'] = $cont->cod_secao;
        $dados['cod_categoria'] = $cont->cod_categoria;
        $dados['cnt_tipo'] = $cont->cnt_tipo;
        $dados['cnt_link'] = $cont->cnt_link;
        $dados['cnt_titulo'] = $cont->cnt_titulo;
        $dados['cnt_capa'] = $cont->cnt_capa;
        $dados['cnt_resumo'] = $cont->cnt_resumo;
        $dados['cnt_conteudo'] = $cont->cnt_conteudo;
        $dados['cnt_data_cad'] = $cont->cnt_data_cad;
        $dados['cnt_views'] = $cont->cnt_views;
        $dados['cnt_comentarios'] = $cont->cnt_comentarios;
        $dados['cnt_destaque'] = $cont->cnt_destaque;
        $dados['cnt_publicado'] = $cont->cnt_publicado;
        return $dados;
    }
}

if(!function_exists('getListaConteudo')){
    
    /**
     * Esta função retorna uma lista de conteúdo de acordo com os parametros
     * informados para aprimorar o resultado.
     *
     * Alterações:
     * -----------
     *
     * 23/12/2012 - Retirada do parametro $secao
     * 
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @param string $tipo
     * @param int $secao
     * @param int $categoria
     * @param int $inicio
     * @param int $fim
     * @return array 
     */
    function getListaConteudo($tipo = 'Artigo', $categoria = NULL, $inicio = NULL, $fim = NULL){
        $CI = & get_instance();
        $CI->load->model('conteudo_model');
        $conteudo = $CI->conteudo_model->get_lista_conteudo($tipo, $categoria, $inicio, $fim);
        $dados = array();
        foreach($conteudo->result() as $i => $cont){
            $dados[$i][$cont->cod_conteudo]['cod_conteudo'] = $cont->cod_conteudo;
            $dados[$i]['cod_usuario'] = $cont->cod_usuario;
            $dados[$i]['cod_categoria'] = $cont->cod_categoria;
            $dados[$i]['cnt_tipo'] = $cont->cnt_tipo;
            $dados[$i]['cnt_link'] = $cont->cnt_link;
            $dados[$i]['cnt_titulo'] = $cont->cnt_titulo;
            $dados[$i]['cnt_capa'] = $cont->cnt_capa;
            $dados[$i]['cnt_resumo'] = $cont->cnt_resumo;
            $dados[$i]['cnt_conteudo'] = $cont->cnt_conteudo;
            $dados[$i]['cnt_data_cad'] = $cont->cnt_data_cad;
            $dados[$i]['cnt_views'] = $cont->cnt_views;
            $dados[$i]['cnt_comentarios'] = $cont->cnt_comentarios;
            $dados[$i]['cnt_destaque'] = $cont->cnt_destaque;
            $dados[$i]['cnt_publicado'] = $cont->cnt_publicado;
        }
        return $dados;
    }
}