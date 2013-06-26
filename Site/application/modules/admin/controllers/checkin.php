<?php 

if ( ! defined('BASEPATH')) exit('Acesso direto ao script negado.');

class checkin extends MX_Controller { 

    private $painel_name = 'consumos';

    function __construct() {
        parent::__construct();
        $this->output->enable_profiler(false);
        only_user();
        $this->load->model(array($this->painel_name.'_model', 'categoria_apartamento_model', 'apartamentos_model','hospedes_model'));
        $this->load->helper(array('hotel'));
    }
    
    public function index(){
        // Lista de apartamentos e seus status.
        $principal = array();
        $interno = array();
        $principal['contents'] = $this->load->view('checkin', $interno, TRUE);
        $this->load->view('main_view', $principal);
    }

    public function novo($id){
        //if($apto == '') return 
        $apto = $this->apartamentos_model->get_by_id($id)->row();
        $categoria = $this->categoria_apartamento_model->get_by_id($apto->cod_cat_apartamento)->row();

        $principal = array();
        $interno = array();
        $interno['selecionado'] = $apto->numero;
        $interno['id'] = $id;
        $interno['tarifa'] = array(1 => $categoria->valor_normal, 2 => $categoria->valor_alta);
        $interno['hospedes'] = $this->hospedes_model->list_all()->result();

        //$principal['contents'] = $this->load->view('new_checkin', $interno, TRUE);
        $this->load->view('new_checkin', $interno);
        //$this->load->view('main_view', $principal);
    }   


    public function ajax() {    
        
        $data = $this->hospedes_model->get();        
        header('Content-type: application/json');       
        echo json_encode($data);
    }     

}
