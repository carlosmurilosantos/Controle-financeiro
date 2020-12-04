<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContasModel extends CI_Model{

    public function __construct(){
        $this->load->library('conta', '', 'bill');
    }

    public function cria($tipo){
        if(sizeof($_POST) == 0) return;
  
        $data = $this->input->post();
        $this->bill->cria($data);
    }


    public function lista(){
        $v = $this->bill->lista('pagar', 9, 2020);
        die(print_r($v));
          
    }
}