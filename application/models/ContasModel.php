<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/component/Table.php'; 

class ContasModel extends CI_Model{

    public function __construct(){
        $this->load->library('conta', '', 'bill');
    }

    public function cria($tipo){
        if(sizeof($_POST) == 0) return;
  
        $data = $this->input->post();
        $this->bill->cria($data);
    }


    public function lista($tipo){
        $data = [];
        $v = $this->bill->lista('pagar', 9, 2020);

        foreach ($v as $row) {
            $aux['parceiro'] = $row['parceiro'];
            $aux['descricao'] = $row['descricao'];
            $aux['valor'] = $row['valor'];
            $aux['mes'] = $row['mes'];
            $aux['ano'] = $row['ano'];
            $aux['btn'] = $this->getActionButton();
            $data[] = $aux;
        }

        $label = ['Parceiro', 'Descrição', 'Valor', 'Mês', 'Ano',''];

        $table = new Table($data, $label);
        return $table->getHTML();
      
   }

   private function getActionButton(){
       $html = '<a><i class="fas fa-edit mr-2 text-primary"></i></a>';
       $html .= '<a><i class="fas fa-times mr-2 red-text"></i></a>';
       return $html;
   }
   
}