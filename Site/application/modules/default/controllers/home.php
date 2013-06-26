<?php

if (!defined('BASEPATH')) exit ('Não é permitido o acesso direto ao script.');

class Home extends MX_Controller {

	function __construct() {
        parent::__construct();
    }

    public function index(){
    	$this->load->view('bemvindo');
    }

}