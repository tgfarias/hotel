<?php

if (!defined('BASEPATH'))
    exit('Acesso direto ao script negado.');

/**
 * Esta biblioteca gera uma imagem CAPTCHA de forma simples como opção
 * à biblioteca nativa do Codeigniter por causa dos problemas com os
 * caminhos exigidos nas configurações.
 * 
 * @author Eliel de Paula <elieldepaula@gmail.com>
 * @since 0.0.1 16/08/2012
 * @access public
 */
class Captcha {

    function __construct() {
        
    }

    /**
     * Este método gera a imagem captcha e registra uma sessão com a palavra
     * para a validação. 
     * 
     * Sessão criada: $_SESSION['captcha_code']
     * 
     * @author Eliel de Paula <elieldepaula@gmail.com>
     * @access public
     * @param string $path - Caminho físico da biblioteca.
     * @param string $url - Url completa da biblioteca.
     * @return image
     */
    public function get_captcha($path, $url) {
        session_start();
        $codigoCaptcha = substr(md5(time()), 0, 9);
        $_SESSION['captcha_code'] = $codigoCaptcha;
        $imagemCaptcha = imagecreatefrompng($url . "/fundocaptch.png");
        $fonteCaptcha = imageloadfont($path . "/anonymous.gdf");
        $corCaptcha = imagecolorallocate($imagemCaptcha, 255, 0, 0);
        imagestring($imagemCaptcha, $fonteCaptcha, 15, 5, $codigoCaptcha, $corCaptcha);
        header("Content-type: image/png");
        imagepng($imagemCaptcha);
        imagedestroy($imagemCaptcha);
    }

}