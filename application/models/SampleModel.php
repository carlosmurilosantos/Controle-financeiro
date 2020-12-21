<?php

defined('BASEPATH') OR exit('No direct script access allowed');
 

class SampleModel extends CI_Model{

    public function action_one(){
        $this->load->library('conta');
        $data  = $this->input->post();

        $this->conta->delete($data);
}

    public function action_two()
    {


}

}
