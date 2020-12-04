<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContasModel extends CI_Model{

    public function cria($tipo){
        if(sizeof($_POST) == 0) return;
 
        $this->load->library('conta', '', 'bill');
        $data = $this->input->post();
        $this->bill->cria($data);
    }


    public function lista(){
         
    }
}