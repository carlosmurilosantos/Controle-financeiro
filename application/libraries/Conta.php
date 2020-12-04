<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/util/CI_Object.php';

class Conta extends CI_Object{

    public function cria($data){
        $this->db->insert('conta', $data);
    }


}