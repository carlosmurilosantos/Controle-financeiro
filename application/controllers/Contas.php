<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contas extends MY_Controller{

    public function index(){
        echo 'Lista de todas as contas';
    }

    public function pagar($mes = 0, $ano = 0){
        $mes = $mes ? $mes : date('m');
        $ano = $ano ? $ano : date('Y');
        $_POST['month'] = "$ano-$mes";

        //salva os dados da nova conta caso exista
        $this->load->model('ContasModel', 'conta');
        $this->conta->cria('cria');

        //recupera a lista de contas a pagar
        $v['lista'] = $this->conta->lista('pagar', $mes, $ano);
      
        $v['tipo'] = 'pagar';

        //carrega a view e passa lista de contas
        $html = $this->load->view('contas/lista_contas', $v, true);

        // exibe esta view
        $this->show($html);
    }

    public function receber($mes = 0, $ano = 0){
        
        //salva os dados da nova conta caso exista
        $this->load->model('ContasModel', 'conta');
        $this->conta->cria('receber');

        //recupera a lista de contas a pagar
        $v['lista'] = $this->conta->lista('receber', $mes, $ano);
        $v['tipo'] = 'receber';

        //carrega a view e passa lista de contas
        $html = $this->load->view('contas/lista_contas', $v, true);

        // exibe esta view
        $this->show($html);


    }
}
