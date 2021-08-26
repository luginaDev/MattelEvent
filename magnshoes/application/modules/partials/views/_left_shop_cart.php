<?php 
if($this->session->userdata("member_login")==""){
  $this->load->view("frontend/_cart_left_nonlog");
}else{
  $this->load->view("frontend/_cart_left_log");
}
?>

