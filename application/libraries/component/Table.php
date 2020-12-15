<?php
class Table {
    private $data;
    private $label;

    function __construct(array $data, array $label){
      $this->data = $data;
      $this->label = $label;
    }

    private function header(){
      $html = '<thead><tr>';
          
      foreach ($this->label as $col) {
        $html .= '<th scope="col">'.$col.'</th>';
      }

      $html .= '</tr></thead>';
      return $html;
    }

    private function body(){
      $html = '<tbody>'. 
              $this->rows().
              '</tbody>';
      return $html;

    }

    private function rows(){
      $html = ''; $i = 0;

      foreach ($this->data as $row) {
        $html .= '<tr>';

        foreach ($row as $col) {
          $html .= '<td>'. $col .'</td>';
        }

        $html .= '</tr>';
      }
      return $html;    
    
    }


    public function getHTML() {
        $html = '<table class="table">'. 
                $this->header().
                $this->body().
                '</table>';

        return $html;

    }


}
