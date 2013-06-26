<?php

if (!function_exists('getUltimasMidias')) {
    
    /**
     * Esta função retorna um array com a lista de ítens de uma galeria
     * de mídia de acordo com os parâmetros passados.
     * 
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @param string $tipo
     * @param int $inicio
     * @param int $fim
     * @return array
     */
    function getUltimasMidias($tipo = 'Imagem', $inicio = NULL, $fim = NULL){
        
        $arrSaida = array();
        $CI = & get_instance();
        $CI->load->model('itens_midia_model');
        $queryMidia = $CI->itens_midia_model->get_ultimas_midias($tipo, $inicio, $fim);
        $i = 0;
        foreach ($queryMidia->result() as $midia):
            $arrSaida[$i]['id'] = $midia->cod_item_midia;
            $arrSaida[$i]['idmidia'] = $midia->cod_midia;
            $arrSaida[$i]['idusuario'] = $midia->cod_usuario;
            $arrSaida[$i]['tipo'] = $midia->itm_tipo;
            $arrSaida[$i]['views'] = $midia->itm_views;
            $arrSaida[$i]['titulo'] = $midia->itm_titulo;
            $arrSaida[$i]['descricao'] = $midia->itm_descricao;
            $arrSaida[$i]['arquivo'] = $midia->itm_file_name;
            $arrSaida[$i]['pasta'] = $midia->itm_pasta;
            $arrSaida[$i]['conteudo'] = $midia->itm_conteudo;
            $arrSaida[$i]['data'] = $midia->itm_data_cad;
            $arrSaida[$i]['publicado'] = $midia->itm_publicado;
            $i = $i + 1;
        endforeach;
        
        return $arrSaida;
        
    }
}

if (!function_exists('getListaMidia')) {

    /**
     * Esta função retorna uma lista de galerias de mídia.
     * 
     * Exemplo de retorno:
     * -------------------
     * 
     * Array (
     * 		    [1] =&gt; Array
     * 		        (
     * 		            [id] =&gt; 1
     * 		            [idusuario] =&gt; 1
     * 		            [titulo] =&gt; Galeria de testes
     * 		            [link] =&gt; Galeria-de-testes
     * 		            [tipo] =&gt; Massa
     * 		            [capa] =&gt; 1.jpg
     * 		            [pasta] =&gt; Galeria_de_testes_30_01_2013
     * 		            [descricao] =&gt; Galeria de testes #001
     * 		            [data] =&gt; 2013-01-30 00:00:00
     * 		            [destaque] =&gt; 0
     * 		            [comentario] =&gt; 0
     * 		            [publicado] =&gt; 1
     * 		        )
     * 		)
     *
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @since 0.1 30/01/2013
     * @return array
     */
    function getListaMidia($tipo = NULL) {
        $arrSaida = array();
        $CI = & get_instance();
        $CI->load->model('midias_model');
        $queryMidia = $CI->midias_model->lista_midia_by_tipo($tipo);
        foreach ($queryMidia->result() as $midia):
            $arrSaida[$midia->cod_midia]['id'] = $midia->cod_midia;
            $arrSaida[$midia->cod_midia]['idusuario'] = $midia->cod_usuario;
            $arrSaida[$midia->cod_midia]['titulo'] = $midia->mid_titulo;
            $arrSaida[$midia->cod_midia]['link'] = $midia->mid_link;
            $arrSaida[$midia->cod_midia]['tipo'] = $midia->mid_tipo;
            $arrSaida[$midia->cod_midia]['capa'] = $midia->mid_capa;
            $arrSaida[$midia->cod_midia]['pasta'] = $midia->mid_pasta;
            $arrSaida[$midia->cod_midia]['descricao'] = $midia->mid_descricao;
            $arrSaida[$midia->cod_midia]['data'] = $midia->mid_data_cad;
            $arrSaida[$midia->cod_midia]['destaque'] = $midia->mid_destaque;
            $arrSaida[$midia->cod_midia]['comentario'] = $midia->mid_comentario;
            $arrSaida[$midia->cod_midia]['publicado'] = $midia->mid_publicado;
        endforeach;
        return $arrSaida;
    }

}

if (!function_exists('getMidiaByLink')) {

    /**
     * Esta função retorna uma galeria de mídia em um array multi-dimensional
     * sendo que o primeiro bloco reúne as informações da galeraia e no
     * segundo bloco contém um array com a lista de ítens da galeria.
     * 
     * Exemplo de retorno da função:
     * -----------------------------
     * 
     * Array(
     * 		    [galeria] =&gt; Array
     * 		        (
     * 		            [id] =&gt; 1
     * 		            [idusuario] =&gt; 1
     * 		            [titulo] =&gt; Galeria de testes
     * 		            [link] =&gt; Galeria-de-testes
     * 		            [tipo] =&gt; Massa
     * 		            [capa] =&gt; 1.jpg
     * 		            [pasta] =&gt; Galeria_de_testes_30_01_2013
     * 		            [descricao] =&gt; Galeria de testes #001
     * 		            [data] =&gt; 2013-01-30 00:00:00
     * 		            [destaque] =&gt; 0
     * 		            [comentario] =&gt; 0
     * 		            [publicado] =&gt; 1
     * 		        )
     *
     * 		    [0] =&gt; Array
     * 		        (
     * 		            [itens] =&gt; Array
     * 		                (
     * 		                    [id] =&gt; 1
     * 		                    [idmidia] =&gt; 1
     * 		                    [idusuario] =&gt; 1
     * 		                    [tipo] =&gt; Massa
     * 		                    [views] =&gt; 0
     * 		                    [titulo] =&gt; Cadastro em massa.
     * 		                    [descricao] =&gt; 
     * 		                    [arquivo] =&gt; 1.jpg
     * 		                    [pasta] =&gt; Galeria_de_testes_30_01_2013
     * 		                    [conteudo] =&gt; 
     * 		                    [data] =&gt; 2013-01-30 00:00:00
     * 		                    [publicado] =&gt; 1
     * 		                )
     *
     * 		        )
     *
     * 		    [1] =&gt; Array
     * 		        (
     * 		            [itens] =&gt; Array
     * 		                (
     * 		                    [id] =&gt; 2
     * 		                    [idmidia] =&gt; 1
     * 		                    [idusuario] =&gt; 1
     * 		                    [tipo] =&gt; Massa
     * 		                    [views] =&gt; 0
     * 		                    [titulo] =&gt; Cadastro em massa.
     * 		                    [descricao] =&gt; 
     * 		                    [arquivo] =&gt; 2.jpg
     * 		                    [pasta] =&gt; Galeria_de_testes_30_01_2013
     * 		                    [conteudo] =&gt; 
     * 		                    [data] =&gt; 2013-01-30 00:00:00
     * 		                    [publicado] =&gt; 1
     * 		                )
     *
     *
     * 		        )
     *
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @since 0.1 30/01/2013
     * @param string $link Link amigável da galeria.
     * @return array
     */
    function getMidiaByLink($link) {
        $arrSaida = array();
        $arrItens = array();
        $CI = & get_instance();
        $CI->load->model('midias_model');
        $CI->load->model('itens_midia_model');
        $midia = $CI->midias_model->get_by_link($link)->row();
        $queryItens = $CI->itens_midia_model->lista_itens($midia->cod_midia);
        //$arrSaida[$midia->cod_midia]['galeria']['id'] = $midia->cod_midia;
        $arrSaida['galeria']['idusuario'] = $midia->cod_usuario;
        $arrSaida['galeria']['titulo'] = $midia->mid_titulo;
        $arrSaida['galeria']['link'] = $midia->mid_link;
        $arrSaida['galeria']['tipo'] = $midia->mid_tipo;
        $arrSaida['galeria']['capa'] = $midia->mid_capa;
        $arrSaida['galeria']['pasta'] = $midia->mid_pasta;
        $arrSaida['galeria']['descricao'] = $midia->mid_descricao;
        $arrSaida['galeria']['data'] = $midia->mid_data_cad;
        $arrSaida['galeria']['destaque'] = $midia->mid_destaque;
        $arrSaida['galeria']['comentario'] = $midia->mid_comentario;
        $arrSaida['galeria']['publicado'] = $midia->mid_publicado;
        foreach ($queryItens->result() as $item):
            $tempArrItens['id'] = $item->cod_item_midia;
            $tempArrItens['idmidia'] = $item->cod_midia;
            $tempArrItens['idusuario'] = $item->cod_usuario;
            $tempArrItens['tipo'] = $item->itm_tipo;
            $tempArrItens['views'] = $item->itm_views;
            $tempArrItens['titulo'] = $item->itm_titulo;
            $tempArrItens['descricao'] = $item->itm_descricao;
            $tempArrItens['arquivo'] = $item->itm_file_name;
            $tempArrItens['pasta'] = $item->itm_pasta;
            $tempArrItens['conteudo'] = $item->itm_conteudo;
            $tempArrItens['data'] = $item->itm_data_cad;
            $tempArrItens['publicado'] = $item->itm_publicado;
            array_push($arrItens, $tempArrItens);
        endforeach;
        $arrSaida['itens'] = $arrItens;
        return $arrSaida;
    }

}

/* midias_helper.php */
/* addplication/helpers */
