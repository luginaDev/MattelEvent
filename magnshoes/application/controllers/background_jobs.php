<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Background_jobs extends Frontend_Controller {
  
  function __construct(){
    parent::__construct();
    $this->load->model("products/product_model","p");
    $this->load->model("products/detail_product_model","dp");
    $this->load->model("products/daftar_harga_model","dh");
    $this->load->model("discounts/discount_model","dc");
    $this->load->model("cart_temp_model","ct");
  }


  public function run_job_from_cart(){
    // $nexthours = date('Y-m-d H:i:s', time() + (1 * 0.4 * 60 * 60));
    // $nexthours = date('Y-m-d H:i:s',mktime(date("H"), date("i")+15, date("s"),  date("n"),  date("j"), date("Y")));
    $nexthours = date('Y-m-d H:i:s',mktime(date("H"), date("i")+1, date("s"),  date("n"),  date("j"), date("Y")));
    echo "waktu skrg = ".date('Y-m-d H:i:s',time())." ; 1 jam kemudian =".$nexthours;
    // echo " = time : ".time()." cek :". date('Y-m-d H:i:s',mktime(date("H"), date("i")+15, date("s"),  date("n"),  date("j"), date("Y")));
    // die;
    $this->load->model("cart_temp_model","ct");
    $this->load->model("products/detail_product_model","dp");
    // $cart = $this->ct->find(array("cart_date <" => $nexthours,"member_id " => ""),0,-1);
    $cart = $this->ct->find(array("cart_date <" => $nexthours,"member_id" => 0),0,-1);
    // print_r($cart);die;
    $return = "refresh";
    if(count($cart)>0){
      foreach($cart as $c){
        $data = array(
           'rowid'   => $c->session_rowid,
           'qty'     => 0,
          );
        $detail = $this->dp->find_entity_by_id($c->detail_produk_id);
        if(!empty($detail)){
          $new =array(
            'id'  => $detail->id,
            'stok'  => $c->qty + $detail->stok
          );
          $this->dp->update($new);   
        }
        $this->ct->delete(array("rowid" => $c->rowid));
        $this->cart->update($data);
        // $this->cart->destroy();
      }
     $return = "refresh";
    }
    return  $return;
    // echo $return;
  }

  public function run_job_from_cart_member(){
    $nexthours = date('Y-m-d H:s:i', time() + (1 * 24 * 60 * 60));
    $member = $this->session->userdata("member_id");
    $this->load->model("cart_temp_model","ct");
    $this->load->model("products/detail_product_model","dp");
    $cart = $this->ct->find(array("cart_date <" => $nexthours,"member_id " => $member),0,-1);
    if(count($cart)>0){
      foreach($cart as $c){
        $detail = $this->dp->find_entity_by_id($c->detail_produk_id);
        if(!empty($detail)){
          $new =array(
            'id'  => $detail->id,
            'stok'  => $c->qty + $detail->stok
          );
          $this->dp->update($new);   
        }
        $this->ct->delete(array("rowid" => $c->rowid));
      }
    }
    echo  "refresh";
  }

}