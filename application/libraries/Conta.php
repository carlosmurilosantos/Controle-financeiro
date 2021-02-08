<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/util/CI_Object.php';

class Conta extends CI_Object{

    public function cria($data){
        unset($data['month']); 
        $this->db->insert('conta', $data);
        return $this->db->insert_id();
    }

    public function lista($tipo, $mes = 0, $ano = 0){
        $data = ['tipo' => $tipo, 'mes' => $mes, 'ano' => $ano];
        $res = $this->db->get_where('conta', $data);
        return $res->result_array();
    }

    public function delete($data){
        $this->db->delete('conta', $data);
    }

    public function edita($data){
        unset($data['month']); 
        $this->db->update('conta', $data,'id ='.$data['id']); 
    }
     
    public function status($data){
        $sql = "UPDATE conta SET liquidada = liquidada + 1 WHERE id = ".$data['id'];
        $this->db->query($sql);
         
    }
}