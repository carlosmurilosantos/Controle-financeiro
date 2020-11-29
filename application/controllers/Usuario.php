<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Usuario extends CI_Controller{

    public function cadastro(){
        $this->load->view('common/cabecalho');
        $this->load->view('common/navbar');
        echo 'Cadastro de usuário';
		$this->load->view('common/rodape');

    }
}

