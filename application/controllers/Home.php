<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends MY_Controller{

    public function index(){
       $this->show('<h1>Seja bem vindo</h1>');
    }


}
