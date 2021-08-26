<?php
  $b = $this->config->item("base_url") . "/";
  $this->load->view("kartikasari/header");

  if(isset($data_content)){
    switch($data_content){
      # HOME
      case 0:
        $this->load->view("kartikasari/welcome",$data);
        break;
    
      # LOCATION
      case 1:
        $this->load->view("kartikasari/location",$data);
        break;
    
      # ABOUT US
      case 2:
        $this->load->view("kartikasari/aboutus",$data);
        break;
    
      # PRODUCTS
      case 3:
        $this->load->view("kartikasari/products",$data);
        break;
    
      # SEPCIAL HAMPERS
      case 4:
        $this->load->view("kartikasari/specialhampers",$data);
        break;
    
      # MADAME SARI
      case 5:
        $this->load->view("kartikasari/madamesari",$data);
        break;
    
      # KEBON JUKUT
      case 6:
        $this->load->view("kartikasari/kebonjukut",$data);
        break;

      # PAYMENT HOW TO
      case 7:
        $this->load->view("kartikasari/paymenthowto",$data);
        break;

      # CAREER PAGE
      case 8:
        $this->load->view("kartikasari/careerpages",$data);
        break;
    }
  }

  $this->load->view("kartikasari/footer"); 
?>
