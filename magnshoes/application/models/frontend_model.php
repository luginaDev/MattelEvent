<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class frontend_model extends CI_Model{
  // function __construct(){
  //   parent::__construct("kategori");
  // }

  function show_product($current_page,$pages){
    $this->db->select("*");
    $this->db->from("produk a");
    $this->db->join("detail_produk b","b.produk_kode = a.kode");
    $query = $this->db->get()->result();
    if(count($query)>0){
      $data = $query;
    }else{
      $data = "";
    }
    return $data;
  }

}