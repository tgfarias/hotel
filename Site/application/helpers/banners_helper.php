<?php

if (!function_exists('get_banner')) {

    /**
     * Esta função retorna um array com os banners de uma determinada posição.
     *
     * Exemplo do array de retorno:
     *
     * array(
     *       [id] => '99',
     *       [banner] => array(
     *           [tipo] => '',
     *           [html] => '',
     *           [arquivo] => '',
     *           [width] => '',
     *           [height] => '',
     *           [ordem] => '',
     *           [link] => '',
     *           [montado] => ''
     *       )
     *   )
     *
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @param string $posicao
     * @return array
     */
    function getBanners($posicao) {
        /**
         * Inibi a utilização sem parãmetro.
         */
        if ($posicao == ''):
            echo '<p><b>Informe a posição do banner!</b></p>';
            exit;
        endif;
        $CI = & get_instance();
        $CI->load->model('banners_model');
        $query = $CI->banners_model->get_by_posicao($posicao);
        $saida = array();
        $final = array();
        foreach ($query->result() as $key => $row):
            $saida['id'] = $row->cod_banner;
            $saida['banner']['titulo'] = $row->ban_titulo;
            $saida['banner']['tipo'] = $row->ban_tipo;
            $saida['banner']['html'] = $row->ban_html;
            $saida['banner']['arquivo'] = $row->ban_arquivo;
            $saida['banner']['width'] = $row->ban_width;
            $saida['banner']['height'] = $row->ban_height;
            $saida['banner']['ordem'] = $row->ban_ordem;
            $saida['banner']['link'] = $row->ban_link;
            /**
             * Monta a saída da exibição automática.
             */
            switch ($row->ban_tipo):
                case 'Imagem':
                    $saida['banner']['montado'] = '<img src="' . base_url('midia/banners') . '/' . $row->ban_arquivo . '" width="' . $row->ban_width . '" height="' . $row->ban_height . '" />';
                    break;
                case 'Flash':
                    $flash = '';
                    $flash .= '<object type="application/x-shockwave-flash" data="' . base_url('midia/banners') . '/' . $row->ban_arquivo . '" width="' . $row->ban_width . '" height="' . $row->ban_height . '">';
                    $flash .= '    <param name="movie" value="' . base_url('midia/banners') . '/' . $row->ban_arquivo . '" />';
                    $flash .= '</object>';
                    $saida['banner']['montado'] = $flash;
                    break;
                case 'Html':
                    $saida['banner']['montado'] = '<div id="banner">' . $row->ban_html . '</div>';
                    break;
            endswitch;
            $CI->banners_model->add_view($row->cod_banner);
            array_push($final, $saida);
        endforeach;
        return $final;
    }

}