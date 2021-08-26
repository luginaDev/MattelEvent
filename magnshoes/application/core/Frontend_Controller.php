<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Frontend_Controller extends MX_Controller
{
  function __construct()
  {
     parent::__construct();
     // 

     $this->template
              ->set_theme('rony_sepatu')
              ->set_layout('layouts');
     $this->header();
     $this->load->helper('text');
    
  }

  public function header(){
    $this->load->model("sells/sell_model","sell");
    $this->load->model("products/daftar_harga_model","daftar_harga");
    $terlaris = $this
            ->sell
            ->find_by_sql("SELECT a.detail_produk_id ,sum(a.quantity) ,b.nama , b.gambar
                            FROM detail_pembelian a 
                            join detail_produk b on b.id = a.detail_produk_id
                            group by detail_produk_id 
                            order by quantity desc
                            limit 4");

    $memberx = $this->session->userdata("member_login");
    if($memberx!=""){
      $last_view = $this->db->query("SELECT a.* ,b.*,count(a.produk_kode) as jumlah 
                        FROM temp_page a
                        join produk b on b.kode = a.produk_kode
                        WHERE a.member_email = '".$memberx."'
                        group by a.produk_kode order by a.tanggal desc
                        limit 3 ")->result();
    }else{
      $ipX = $_SERVER["REMOTE_ADDR"];
      $last_view = $this->db->query("SELECT a.* ,b.*,count(a.produk_kode) as jumlah 
                        FROM temp_page a
                        join produk b on b.kode = a.produk_kode
                        WHERE a.ip = '".$ipX."'
                        group by a.produk_kode order by a.tanggal  desc
                        limit 3 ")->result();
    }
    // $most_view = $this->db->query("SELECT a.* ,b.*,count(a.produk_kode) as jumlah 
    //                     FROM temp_page a
    //                     join produk b on b.kode = a.produk_kode
    //                     group by a.produk_kode order by jumlah  desc
    //                     limit 3 ")->result();
    $most_view = $this->db->query("SELECT a.* , b.harga 
                            FROM `detail_produk` a 
                            join daftar_harga b on b.detail_produk_id = a.id
                            ORDER BY rand( )
                            LIMIT 3 ")->result();

    $partials_data = array(
        "left_menu" =>  $this->category_model->find(array(),0,-1) ,
         "menu_terlaris" => $terlaris,
         "last_view"  =>$last_view,
         "most_view"  => $most_view
         // "kurs_rupiah" => $this->show_convert_usd_to_rp()
      );
    
    $cart_data = array(
        "cart" => $this->cart_temp_model->show_cart_active()
      );

  	 $this->template
        ->set_partial("header","partials/_header",$cart_data)
  	 		->set_partial("left_menu_category","partials/_left_menu_category",$partials_data)
        ->set_partial("left_menu_terlaris","partials/_left_menu_terlaris",$partials_data)
        ->set_partial("left_menu_dilihat","partials/_left_menu_dilihat",$partials_data)
        ->set_partial("left_menu_terakhirdiliat","partials/_left_menu_terakhirdiliat",$partials_data)
        ->set_partial("left_menu_tracking","partials/_left_menu_tracking")
  	 		// ->set_partial("left_menu_testimonial","partials/_left_menu_testimonial")
        ->set_partial("shop_cart_info","partials/_left_shop_cart",$partials_data)
        ->set_partial("footer","partials/_footer")
  	 	;
  }
   public function encode($pass){
    $salt=$this->config->item('encryption_key');
     if (!empty($salt) || !empty($pass) ){
          $data = md5($pass."".$salt);
      }
      return $data;
  }

   public function show_convert_usd_to_rp(){
    // $this->load->helper('dom_helper');
    // $html = file_get_html("http://www.bca.co.id/id/biaya-limit/kurs_counter_bca/kurs_counter_bca_landing.jsp");
    // $find = $html->find("table[style='width:300px;float:left;'] tr td",5);
    //  return $find;
  }

}