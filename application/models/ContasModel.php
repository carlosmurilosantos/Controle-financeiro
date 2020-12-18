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
        $this->validate();
        
        if($this->form_validation->run()){
            $this->bill->cria($data);
        }
      
        
    }

    private function validate(){
         
        $this->form_validation->set_rules('parceiro', 'Parceiro Comercial', 'required|min_length[5]|max_length[100]');
        $this->form_validation->set_rules('descricao', 'Descriçao da conta', 'required|min_length[5]|max_length[100]');
        $this->form_validation->set_rules('valor', 'Preço a ser pago', 'required|greater_than[0]');
        $this->form_validation->set_rules('mes', 'Mês de pagamento', 'required|greater_than[0]|less_than[13]');
        $this->form_validation->set_rules('ano', 'Ano de pagamento', 'required|greater_than[2019]|less_than[2031]');
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