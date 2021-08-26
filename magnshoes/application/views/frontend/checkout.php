<?php
 if($this->session->userdata('member_login')!=""){ 
    echo $this->load->view("frontend/_checkout_product_buy");
  }else{
    echo $this->load->view("frontend/_confirm_login");  
  }    
?>