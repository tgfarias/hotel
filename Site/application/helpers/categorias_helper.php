<?php

if (!function_exists('lista_categorias')) {
	
	function lista_categorias(){
		$CI = & get_instance();
		$CI->load->model('categorias_model');
		$query = $CI->categorias_model->list_all();
		$saida = array();
		$temp = array();
		foreach($query->result() as $row){
			$temp['cod_categoria'] = $row->cod_categoria;
			$temp['cod_secao'] = $row->cod_secao;
			$temp['cat_titulo'] = $row->cat_titulo;
			array_push($saida, $temp);
		}
		return $saida;
	}
}

/* Sem fechar para evitar erros de cabalhos. */
