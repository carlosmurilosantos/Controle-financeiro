<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/rest/MyRestController.php';

class ContasRest extends MyRestController {

    function __construct(){
        parent::__construct ('contas');
    }

    function delete_conta_post(){
        $res = $this->model->delete_conta();
        $this->response($res, RESTController::HTTP_OK);
    }

    function status_conta_post(){
        $res = $this->model->status_conta();
        $this->response($res, RESTController::HTTP_OK);
    }
}


