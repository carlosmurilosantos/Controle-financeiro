<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
 
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function login() {
		$this->load->model('LoginModel', 'login');
		$this->login->verifica();
		$this->load->view('common/cabecalho');
		$this->load->view('access/login_form');
		$this->load->view('common/rodape');
	 
	}
}

