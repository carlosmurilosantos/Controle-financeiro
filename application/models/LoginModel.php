<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class LoginModel extends CI_Model{

    public function verifica(){
       
        if(sizeof($_POST) == 0) return 0;
        
        if(strcmp($_POST['email'], 'admin@admin.com') == 0)
            if(strcmp($_POST['senha'], 'password') == 0){
                echo 'Login correto';
                
                redirect('home');
                return 0;
            }
            return 1;
    }
}