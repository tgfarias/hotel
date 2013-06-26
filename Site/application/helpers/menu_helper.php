<?php

if (!defined('BASEPATH'))exit('Poibido o acesso direto ao script.');

if (!function_exists('get_menu')) {
    
    /**
     * Esta função retorna um menu indicando sua posição no parametro.
     * 
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @since 0.2 21/01/2013
     * @param string $posicao Posição do menu.
     * @return string 
     */
    function get_menu($posicao){
        
        $CI = & get_instance();
        $CI->load->model('menu_model');
        $CI->load->model('itens_menu_model');
        
        $menu = $CI->menu_model->getByPosicao($posicao)->row();
        
        $itens = $CI->itens_menu_model->ListaItensMenu($menu->cod_menu);
        
        $html = '';
        
        $html .= '<ul class="catnav">';
        foreach($itens->result() as $itm){
            
            switch ($itm->tipo) {
                // Link externo
                case "Index" :
                    if($itm->blank){
                        $html .= '<li>'.anchor('', $itm->label, array('target'=>'_blank')).'</li>';
                    }else{
                        $html .= '<li>'.anchor('', $itm->label).'</li>';
                    }
                    break;
                // Link externo
                case "Externo" :
                    if($itm->blank){
                        $html .= '<li><a href="'.$itm->item.'" target="_blank">'.$itm->label.'</a></li>';
                    }else{
                        $html .= '<li><a href="'.$itm->item.'">'.$itm->label.'</a></li>';
                    }
                    break;
                // Link de conteúdo
                case "Conteudo" :
                    if($itm->blank){
                        $html .= '<li>'.anchor('default/conteudo/ver/'.$itm->item, $itm->label, array('target'=>'_blank')).'</li>';
                    }else{
                        $html .= '<li>'.anchor('default/conteudo/ver/'.$itm->item, $itm->label).'</li>';
                    }
                    break;
                // Lista de categorias de uma seção
                case "Secao" :
                    if($itm->blank){
                        $html .= '<li>'.anchor('default/conteudo/secao/'.$itm->item, $itm->label, array('target'=>'_blank')).'</li>';
                    }else{
                        $html .= '<li>'.anchor('default/conteudo/secao/'.$itm->item, $itm->label).'</li>';
                    }
                    break;
                // Lista de conteúdo de uma categoria
                case "Categoria" :
                    if($itm->blank){
                        $html .= '<li>'.anchor('default/conteudo/artigos/'.$itm->item, $itm->label, array('target'=>'_blank')).'</li>';
                    }else{
                        $html .= '<li>'.anchor('default/conteudo/artigos/'.$itm->item, $itm->label).'</li>';
                    }
                    break;
                // Lista de galerias de mídia
                case "ListaMidia" :
                    if($itm->blank){
                        $html .= '<li>'.anchor('default/conteudo/midias', $itm->label, array('target'=>'_blank')).'</li>';
                    }else{
                        $html .= '<li>'.anchor('default/conteudo/midias', $itm->label).'</li>';
                    }
                    break;
                // Link direto para uma galeria de mídia
                case "Midia" :
                    if($itm->blank){
                        $html .= '<li>'.anchor('default/conteudo/midias/'.$itm->item, $itm->label, array('target'=>'_blank')).'</li>';
                    }else{
                        $html .= '<li>'.anchor('default/conteudo/midias/'.$itm->item, $itm->label).'</li>';
                    }
                    break;
                // Link direto para uma galeria de mídia
                case "ListaDownloads" :
                    if($itm->blank){
                        $html .= '<li>'.anchor('default/conteudo/downloads/'.$itm->item, $itm->label, array('target'=>'_blank')).'</li>';
                    }else{
                        $html .= '<li>'.anchor('default/conteudo/downloads/'.$itm->item, $itm->label).'</li>';
                    }
                    break;
                // Formulário de contato
                case "Contato" :
                    if($itm->blank){
                        $html .= '<li>'.anchor('default/contato', $itm->label, array('target'=>'_blank')).'</li>';
                    }else{
                        $html .= '<li>'.anchor('default/contato', $itm->label).'</li>';
                    }
                    break;
                // Sub-Menu
                case "SubMenu" :
                    if($itm->blank){
                        $html .= '<li><a>'.$itm->label.'</a>'.get_menu($itm->item).'</li>';
                    }else{
                        $html .= '<li><a>'.$itm->label.'</a>'.get_menu($itm->item).'</li>';
                    }
                    break;
            }
        }
        $html .= "</ul>";
        
        return $html;
    }
}