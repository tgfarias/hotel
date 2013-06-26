<?php

if ( ! defined('BASEPATH')) exit('Acesso direto ao script negado.'); 

/**
 * Este controller é uma classe auxiliar para gerar as imagens
 * redimensionadas em tempo de execussão usando a biblioteca
 * de manipulação de imagens do CodeIgniter.
 * 
 * @author Eliel de Paula <elieldepaula@gmail.com>
 * @since 0.0.1 14/08/2012
 * @access public
 */
class imagem extends MX_Controller {
    
    /**
     * Este método redimentiona uma imagem de acordo com os parâmetros
     * passados pela url.
     * 
     * @access public 
     * @author Eliel de Paula <elieldepaula@gmail.com> 
     * @param string $caminho
     * @param string $imagem
     * @param int $largura
     * @param int $altura
     * @return image
     */
    public function thumbs($caminho, $imagem, $largura, $altura) {
        
        $caminho = str_replace("-", "/", $caminho) . '/';
        
        $config['image_library'] = 'gd2';
        $config['source_image'] = $caminho . $imagem;
        $config['maintain_ratio'] = true;
        $config['dynamic_output'] = true;
        $config['width'] = $largura;
        $config['quality'] = "100%";
        $config['height'] = $altura;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }
}

?>
