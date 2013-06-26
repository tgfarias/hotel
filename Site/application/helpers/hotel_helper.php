<?php

if (!defined('BASEPATH'))exit('Poibido o acesso direto ao script.');

if (!function_exists('listaApartamentos')){

    /**
     * Esta função retorna a lista de livros de acordo com o testamento.
     *
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @param string $testamento
     * @return array
     */
    function listaApartamentos(){
        $CI = & get_instance();
        $CI->load->model('apartamentos_model');
        $query = $CI->apartamentos_model->list_all();
        $saida = array();
        $temp = array();
        foreach($query->result() as $row){
            $temp['cod_apartamento'] = $row->cod_apartamento;
            $temp['cod_cat_apartamento'] = $row->cod_cat_apartamento;
            $temp['numero'] = $row->numero;
            $temp['ramal'] = $row->ramal;
            $temp['status'] = $row->status;
            array_push($saida, $temp);
        }
        return $saida;
    }
}