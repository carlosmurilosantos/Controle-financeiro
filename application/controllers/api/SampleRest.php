<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/rest/MyRestController.php';

class SampleRest extends MyRestController {

    function __construct(){
        parent::__construct ('sample');
    }

    function action_one_post(){
        $res = $this->model->action_one();
        $this->response($res, RESTController::HTTP_OK);
    }

    function action_two_get(){
        $res = $this->model->action_two_get();
        $this->response($res, RESTController::HTTP_OK);
    }
} 