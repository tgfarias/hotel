<?php

if (!function_exists('lista_marcas')) {

    function lista_marcas() {
        $CI = & get_instance();
        $CI->load->model('marcas_model');
        $query = $CI->marcas_model->list_all();
        $saida = array();
        $temp = array();
        foreach ($query->result() as $row) {
            $temp['cod_marca'] = $row->cod_marca;
            $temp['titulo'] = $row->titulo;
            $temp['imagem'] = $row->imagem;
            array_push($saida, $temp);
        }
        return $saida;
    }

}

if (!function_exists('lista_produtos')) {

    function lista_produtos($categoria = NULL, $marca = NULL, $modelo = NULL, $destaque = NULL, $disponivel = NULL) {
        $CI = & get_instance();
        $CI->load->model('produtos_model');
        $query = $CI->produtos_model->lista_produtos($categoria, $marca, $modelo, $destaque, $disponivel);
        $saida = array();
        $temp = array();
        foreach ($query->result() as $row) {
            $temp['cod_produto'] = $row->cod_produto;
            $temp['cod_usuario'] = $row->cod_usuario;
            $temp['cod_categoria'] = $row->cod_categoria;
            $temp['cod_marca'] = $row->cod_marca;
            $temp['cod_modelo'] = $row->cod_modelo;
            $temp['titulo'] = $row->titulo;
            $temp['link'] = $row->link;
            $temp['descricao'] = $row->descricao;
            $temp['foto'] = $row->foto;
            $temp['valor'] = $row->valor;
            $temp['data'] = $row->data;
            $temp['destaque'] = $row->destaque;
            $temp['disponivel'] = $row->disponivel;
            array_push($saida, $temp);
        }
        return $saida;
    }

}

if (!function_exists('ver_produto_por_link')) {

    function ver_produto_por_link($link) {
        $CI = & get_instance();
        $CI->load->model('produtos_model');
        $row = $CI->produtos_model->get_by_link($link)->row();
        $saida = array();
        $saida['cod_produto'] = $row->cod_produto;
        $saida['cod_usuario'] = $row->cod_usuario;
        $saida['cod_categoria'] = $row->cod_categoria;
        $saida['cod_marca'] = $row->cod_marca;
        $saida['cod_modelo'] = $row->cod_modelo;
        $saida['titulo'] = $row->titulo;
        $saida['link'] = $row->link;
        $saida['descricao'] = $row->descricao;
        $saida['foto'] = $row->foto;
        $saida['valor'] = $row->valor;
        $saida['data'] = $row->data;
        $saida['destaque'] = $row->destaque;
        $saida['disponivel'] = $row->disponivel;
        return $saida;
    }

}

// Deixa aberto para não dar erro de cabeçalho.