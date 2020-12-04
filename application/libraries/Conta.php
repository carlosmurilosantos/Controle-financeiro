<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/util/CI_Object.php';

class Conta extends CI_Object{

    public function cria($data){
        $this->db->insert('conta', $data);
        return $this->db->insert_id();
    }

    public function lista($tipo, $mes = 0, $ano = 0){
        $data = ['tipo' => $tipo, 'mes' => $mes, 'ano' => $ano];
        $res = $this->db->get_where('conta', $data);
        return $res->result_array();
    }

}