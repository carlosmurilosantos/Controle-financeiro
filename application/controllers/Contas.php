<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contas extends MY_Controller{

    public function index(){
        echo 'Lista de todas as contas';
    }

    public function pagar($mes = 0, $ano = 0){
        $mes = $mes ? $mes : date('m');
        $ano = $ano ? $ano : date('Y');
        $_POST['month'] = "$ano-$mes";

        $this->load->model('ContasModel', 'conta');
        $this->conta->cria('cria');
 
        $v['lista'] = $this->conta->lista('pagar', $mes, $ano);
      
        $v['tipo'] = 'pagar';

    
        $html = $this->load->view('contas/lista_contas', $v, true);
 
        $this->show($html);
    }

    

    public function receber($mes = 0, $ano = 0){
        
     
        $this->load->model('ContasModel', 'conta');
        $this->conta->cria('receber');

         
        $v['lista'] = $this->conta->lista('receber', $mes, $ano);
        $v['tipo'] = 'receber';
 
        $html = $this->load->view('contas/lista_contas', $v, true);
 
        $this->show($html);


    }
}
