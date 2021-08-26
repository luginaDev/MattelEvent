<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fproducts extends Frontend_Controller {
  
  function __construct(){
    parent::__construct();
    $this->load->model("products/product_model","p");
    $this->load->model("products/detail_product_model","dp");
    $this->load->model("products/daftar_harga_model","dh");
    $this->load->model("discounts/discount_model","dc");
    $this->load->model("partials/rating_model","rat");
  }

   public function categories($id){
     $this->load->model("sells/detail_sell_model","sell");
    if(!empty($id)){
      $table_join = array(
        'detail_produk b' => 'b.produk_kode = a.kode',
      );
      $data = array(
        'data' => $this->p->find_by_join("a","a.kode,b.*" ,array("kategori_id" => $id) , $table_join),
        'url_wish'  => "frontend/categories/".$id
      );catego
      $this->template
          ->set('rows' , $data)
          ->build("frontend/category");
    }else{
        $this->index();
    }
  }
}