<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {
 
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function login() {
		 
		$this->load->model('LoginModel', 'login');
		$v['error'] = $this->login->verifica();
		$html = $this->load->view('access/login_form', $v, true);
		$this->show($html, false);
	 
	}
}

