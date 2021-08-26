<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cart_temp_model extends Common_Model{
  function __construct(){
    parent::__construct("cart_temp");
  }

    
 public function show_cart_active(){
  $this->db->select("rowid , detail_produk_id , member_id , SUM(qty) as qty , cart_date , daftar_harga_id , harga , gambar , name , diskon_id , diskon , min_quantity , stok , session_rowid");

  if($this->session->userdata("member_login")!=""){
    $this->db->where("member_id" , $this->session->userdata("member_login"));
    $this->db->group_by("member_id");
  }else{
    if(count($this->cart->contents())>0){
    foreach($this->cart->contents() as $item){
      $row_id[] =  $item["rowid"];
    }
    $this->db->where_in("session_rowid",$row_id);
    $this->db->where("member_id",'');
    // $this->db->group_by("session_rowid");
  }  
  }
  
  
  $this->db->group_by("session_rowid");
  $query = $this->db->get("cart_temp");
  if(count($query->result())>0){
    return $query->result();  
  }
  
 }

}