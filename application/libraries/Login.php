<?php
include_once APPPATH.'libraries/util/CI_Object.php';

class Login extends CI_Object{

    public function verifica($email, $senha){
        $res = $this->db->get_where('login', ['email' => $email, 'senha' => $senha]);
        $v = $res->result_array();
        return sizeof($v);
      
    }

}