<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class LoginModel extends CI_Model{

    public function verifica(){
       
        if(sizeof($_POST) == 0) return 0; 

        $email = $this->input->post('email');
        $senha = $this->input->post('senha');

        $this->load->library('Login', '', 'acesso');
        $k = $this->acesso->verifica($email, $senha);

        if($k) {
            redirect('home');
        }
        else  return 1;

        } 
}

