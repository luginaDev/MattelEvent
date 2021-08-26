<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Convert_currency extends Frontend_Controller {
  
  function __construct(){
    parent::__construct();
  }
  public function index(){
    $this->load->helper('dom_helper');
    // $html = file_get_html("http://www.bca.co.id/id/biaya-limit/kurs_counter_bca/kurs_counter_bca_landing.jsp");
     // $find = $html->find("table[style='width:300px;float:left;'] tr td",5);
     echo "Sumber : http://www.bca.co.id/id/biaya-limit/kurs_counter_bca/kurs_counter_bca_landing.jsp <br/>";
     echo "nilai : 1 USD = Rp.";
     // $nilai = explode(".",$find);
     // echo $nilai[0];
     // echo "<hr/> $find ".intval(9800.00);
     echo "<br/> <br/>";
  }

  public function convert_usd(){

  }

}