<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontend extends Frontend_Controller {
  
  function __construct(){
    parent::__construct();
    $this->load->model("products/product_model","p");
    $this->load->model("products/detail_product_model","dp");
    $this->load->model("products/daftar_harga_model","dh");
    $this->load->model("discounts/discount_model","dc");
    $this->load->model("partials/rating_model","rat");
  }

  public function add_wish(){
    $this->load->model("cart_temp_model","ct");
    $form = $this->input->post();
    if(!empty($form) ){
      if($this->input->post("stok") > 0){

        $data = array(
           'id'               => $this->input->post("id"),
           'detail_produk_id' => $this->input->post("id"),
           'produk_kode'      => $this->input->post("produk_kode"),
           'qty'              => $this->input->post("quantity"),
           'price'            => $this->input->post("harga"),
           'name'             => $this->input->post("nama"),
           'id_harga'         => $this->input->post("id_harga"),
           'daftar_harga_id'  => $this->input->post("id_harga"),
           'gambar'           => $this->input->post("gambar"),
           'stok'             => $this->input->post("stok") - $this->input->post("quantity"),
           'diskon_id'        => $this->input->post("diskon_id"),
           'diskon'           => $this->input->post("diskon"),
           'min_quantity'     => $this->input->post("min_quantity")
          );
        $sisa_stok =  $data["stok"];
        $update = array(
           'id'   => $this->input->post("id"),
           'stok' => $sisa_stok
          );
        if($this->dp->update($update)){
          $this->session->set_flashdata('message', 'Cart anda berhasil di tambah');
        }else{
          $this->session->set_flashdata('message', 'Gagal update detail produk');
        }
        $response = $this->save_cart($data);
        $temp = array(
          'session_rowid'     => $response["rowid"],
          'detail_produk_id'  => $this->input->post("id"),
          'qty'               => $this->input->post("quantity"),
          'cart_date'         => date("Y-m-d H:i:s"),
          'qty'               => $this->input->post("quantity"),
          'harga'             => $this->input->post("harga"),
          'name'              => $this->input->post("nama"),
          'daftar_harga_id'   => $this->input->post("id_harga"),
          'gambar'            => $this->input->post("gambar"),
          'diskon_id'         => $this->input->post("diskon_id"),
          'diskon'            => $this->input->post("diskon"),
          'min_quantity'      => $this->input->post("min_quantity"),
          "member_id"         => $this->session->userdata("member_login"),
          'stok'              => $sisa_stok
        );
        $this->ct->save($temp);
        redirect($this->input->post("url_wish"));
      }
    }else{
      $this->session->set_flashdata('message', 'Sisa Stok Tidak Tersedia');
      redirect($this->input->post("url_wish"));
    }
    redirect($this->input->post("url_wish"));
  }

  public function add_payment($id){
  $this->load->model("sells/sell_model","c");
  $this->load->model("sells/detail_sell_model","ds");
  $this->load->model("members/member_model","mm");
  $this->load->model("discounts/discount_model","dc");
  $this->load->model("delivers/deliver_model","dv");
  $this->load->model("returns/return_model","retur");
  $this->load->model("returns/detail_return_model","det_retur");
  $this->load->model("payments/payment_model","pm");
  $data["jual"] = $this->c->find(array("id"=>$id,"member_no_ktp"=>$this->session->userdata("member_ktp")),0,1);

  if(count($data["jual"])>0){
    $data["member"] = $this->mm->find_entity_by("no_ktp",$data["jual"][0]->member_no_ktp);
    $data["detail"] = $this->ds->find(array("pembelian_id"=>$id),0,-1);
    $data["retur"]  = $this->retur->find_entity_by("pembelian_id",$id);
    $this->template
      ->title('Penjualan')
      ->set("title_form" ,"Detail Penjualan")
      ->set("data",$data)
      ->build('frontend/detail_history_sell');
  }else{
    $this->session->set_flashdata('message', 'Anda tidak memiliki akses kedalam halaman tersebut!');
    redirect("/");
  }

  }

  public function testimonial(){
    $this->template
      ->title('testimonial')
      ->set("title_form" ,"Tambah Testimonial")
      ->build('frontend/testimonial');
  }

  public function add_testimonial(){
    $this->load->model("members/member_model","mm");
    $this->load->model("testimonial_model","ts");
    $data = $this->input->post();
    if(!empty($data)){
      $member = $this->mm->find_entity_by("email",$this->session->userdata("member_login"));
      $data["email"] = $member->email;
      $data["nama"] = $member->nama;
      $data["pages"]  = "testimonial";
      $this->ts->save($data);
      $this->session->set_flashdata('message', 'Testimonial Berhasil ditambahkan');
      redirect($_SERVER["HTTP_REFERER"]);
    }else{
      $this->session->set_flashdata('message', 'Testimonial Gagal ditambahkan');
      redirect($_SERVER["HTTP_REFERER"]);
    }
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
      );
      $this->template
          ->set('rows' , $data)
          ->build("frontend/category");
    }else{
        $this->index();
    }
  }
  
  public function history_wish(){
  $this->load->model("sells/sell_model","c");
  $this->load->model("sells/detail_sell_model","ds");
  $this->load->model("products/product_model","p");
  $this->load->model("products/detail_product_model","dp");
  $this->load->model("products/daftar_harga_model","dh");
  $this->load->model("delivers/deliver_model","deliver");
  $this->load->model("members/member_model","m");
  $member =  $this->m->find_entity_by("email",$this->session->userdata("member_login"));
  $data = array(
        'data' => $this->c->find(array("member_no_ktp" => $member->no_ktp),0,-1,"id desc")
    );

  $this->template
      ->set('rows' , $data)
      ->build("frontend/history_wish");
 }

  public function create_registrasi_member(){
    $this->load->model("members/member_model","m");
    $data = $this->input->post();
    if(!empty($data)){
      $data["aktivasi_key"] = $this->encode_active($data["email"]);
      $data["status"] = "new";
      $member = array(
        "no_ktp" => $data["no_ktp"],
        "nama" => $data["nama"],
        "agama_id" => $data["agama_id"],
        "telp" => $data["telp"],
        "alamat" => $data["address_1"],
        "kelurahan_id" => $data["kelurahan_id"],
        "email" => $data["email"],
        "password" => $this->encode($data["password"]),
        "aktivasi_key" => $data["aktivasi_key"],
        "status" => $data["status"]

        );
      $email_member = $member;
      $email_member["link_aktivasi_key"] = "<a href='".base_url("frontend/aktifasi_member/". $data["aktivasi_key"])."'> ".base_url("frontend/aktifasi_member/". $data["aktivasi_key"])." </a>";

      $data = array(
        "from" => 'magnshoes@magnshoes.me.in' ,
        "to"   =>  $data["email"],
        "subject" => "Aktifasi Member magnshoes ".$data["nama"],
        "message" => $this->load->view("frontend/_email_aktifasi_tpl",$email_member,true)
      );

      $this->load->library("sendmail");
      $cek =$this->m->find_entity_by("no_ktp",$member["no_ktp"]);
      if(count($cek)>0){
        $this->session->set_userdata('member_ktp',$member["no_ktp"]);
        $this->session->set_userdata('member_alamat',$member["alamat"]);
        $this->session->set_userdata('member_kelurahan_id',$member["kelurahan_id"]);
        unset($member["status"]);
        unset($member["aktivasi_key"]);
        $this->db->where('no_ktp', $member["no_ktp"]);
        $this->db->update("member",$member);
        $this->session->set_flashdata('message', "Data Berhasil diupdate");
        redirect("/");
      }else{
        $this->m->save($member);
        $data = $this->sendmail->send($data);
        $this->session->set_flashdata('message', "silakan cek email anda dan lakukan aktivasi untuk mengaktifkan data member anda");
        redirect("/");
      }
    }
    
  }
  public function checkout(){
    $this->load->model("propinsi/propinsi_model","pr");
    $this->load->model("kecamatan/kecamatan_model","kc");
    $this->load->model("kelurahan/kelurahan_model","kl");
    $this->load->model("vendors/vendor_model","v");
    $this->load->model("rekening/rekening_model","rek");
    $this->load->model("agama/agama_model","a");
    $this->load->model("members/member_model","mem");
     $this->load->library("convert_currency");
    $this->template
      ->title('Checkout ')
      ->build('frontend/checkout');
  }

  public function shop_cart(){
    $this->load->model("propinsi/propinsi_model","pr");
    $this->load->model("kecamatan/kecamatan_model","kc");
    $this->load->model("kelurahan/kelurahan_model","kl");
    $this->load->model("vendors/vendor_model","v");
    $cart_data = array(
        "cart" => $this->cart_temp_model->show_cart_active()
      );
    $this->template
      ->title('Checkout ')
      ->build('frontend/shop_cart',$cart_data);
  }

  public function contactus(){
    $this->template
      ->title("Contant US")
      ->build("frontend/contactus");
  }
  
  private function generate_active($data){

  }

  private function encode_active($email){
    $salt=$this->config->item('encryption_key');
     if (!empty($salt) ||!empty($email) ){
          $data = base64_encode($email."|pisah|".$salt);
      }
      return $data;
  }

  private function decode_activate($activate){
    $salt=$this->config->item('encryption_key');
     if (!empty($salt) ||!empty($activate) ){
          $data = base64_decode($activate);
          $string = explode("|pisah|",$data);
      }
      return $string[0];
  }
  
  public function check_email_member(){
    $this->load->model("members/member_model","m");
    $email = $this->input->get("email");
    $response = $this->m->find_entity_by("email",$email);
    return false;
    
  }

  public function index(){
    $partials_control = array(
        "produk_baru" =>  $this->detail_produk_model->find_new_product()
      );
    $this->template
      ->set_partial('slideshow', 'partials/_slideshow')
      ->set_partial('features', 'partials/_features',$partials_control)
      ->set_partial('produk_baru', 'partials/_produk_baru',$partials_control)
      ->title('Mag N Shoes | Official Online Store')
      ->build('frontend/home');
  }

  public function login_member(){
    $this->load->view("frontend/login_member");
  }

  public function member_login(){
    $this->load->model("members/member_model","m");
    if((!$this->input->post('email') =='') && (!$this->input->post('password')=='') ){
      $data['email']=$this->input->post('email');
      $data['password']=$this->encode($this->input->post('password'));
      $data["status"] = "aktif";
      $rows=$this->m->find($data);
      if(count($rows) > 0){
        $member = $rows[0]->email;
        foreach($this->cart->contents() as $item){
          $update_cart = array( "member_id" => $member);
          $this->db->where(array("detail_produk_id" => $item["id"],"session_rowid"=>$item["rowid"]));
          $result=$this->db->update("cart_temp",$update_cart);
        }
        $this->session->set_flashdata('success', ' Anda berhasil login');
        $this->session->set_userdata('member_login',$rows[0]->email);
        $this->session->set_userdata('member_name',$rows[0]->nama);
        $this->session->set_userdata('member_ktp',$rows[0]->no_ktp);
        $this->session->set_userdata('member_alamat',$rows[0]->alamat);
        $this->session->set_userdata('member_kelurahan_id',$rows[0]->kelurahan_id);
        $this->session->set_flashdata('message', 'Anda berhasil login');
        redirect('/');
      }else{
        $this->session->set_flashdata('message', 'Email / Password anda salah silakan ulangi kembali ');
        $this->checkout();
      }
    }else{
        $this->session->set_flashdata('message', 'Email / Password anda salah silakan ulangi kembali ');
        $this->checkout();
    }
  }

  public function member_logout(){
    $array_items = array('member_login' => '', 'member_name' => '');
    $this->session->unset_userdata($array_items);
    $this->session->sess_destroy();
    $this->session->set_flashdata('message', 'Anda berhasil logout');
    redirect('/');
  }

  public function member_check_cart(){
    $member = $this->session->userdata("member_login");

    if(!empty($member)){
      foreach($this->cart->contents() as $item){
        // echo $item->id;
        $update_cart = array( "member_id" => $member);
        
        $this->db->where(array("rowid" => $item["id"]));
        // $this->db->where(array("rowid" => $item["rowid"],));
        $result=$this->db->update("cart_tem",$update_cart);
        die;
        $this->cart_temp_model->update_attribute(array("rowid" => $item["id"]),$update);
      }
    }
  }

  public function products(){
   $this->load->model("sells/detail_sell_model","sell");
   $this->load->model("frontend_model");
   $this->load->library('pagination');
    $post["current_page"] = $this->uri->segment(3);
    $pages = 5;
    $current_page = (empty($post["current_page"])? 0 : $post["current_page"]) ;
    $data["current_page"] = $post["current_page"];
 
    // $data["data"] = $this->dp->find(array(),$current_page,$pages);
    $data["data"] = $this->p->find(array(),$current_page,$pages);
    // $this->p->find(array(),$current_page,$pages);
    // $this->db->select("*");
    // $this->db->from("")
    // $data["data"] = $this->frontend_model->show_product($current_page,$pages);
    // print_r($data["data"]);
    // die;
    $count = $this->p->find(array(),0,-1);
    
    $config['base_url'] =base_url()."frontend/products";
    $config['total_rows'] = count($count);
    $config['per_page'] = $pages;
    $config['cur_tag_open'] = ' <a href="#" class="current">';
    $config['cur_tag_close'] = '</a>';
    $config["anchor_class"] =" class='pagination_ajax_all'";
    $this->pagination->initialize($config); 
    $data["url_wish"] = "frontend/products/";
    $this->template
        ->set('rows' , $data)
        ->build("frontend/products");
  }

  public function detail_produk($id){
    $data["data"] = $this->dp->find(array("produk_kode"=>$id));
    $this->load->view("frontend/_detail_produk",$data);
  }

  public function registrasi_member(){
    $this->load->model("agama/agama_model","a");
    $this->load->model("kota/kota_model","k");
    $this->load->model("propinsi/propinsi_model","pr");
    $this->load->model("kecamatan/kecamatan_model","kc");
    $this->load->model("kelurahan/kelurahan_model","kl");
    $this->load->model("members/member_model");
   
    $this->load->view("frontend/registrasi_member");
  }

  public function remove_wish($id,$row,$qty,$detail_produk_id){
    if(!empty($id)){
      $data = array(
           'rowid'   => $row,
           'qty'     => 0,
          );
      $stok = $this->dp->find_entity_by_id($detail_produk_id);
      if(count($stok)> 0){
        $this->cart_temp_model->delete(array("session_rowid" => $row));
        $update = array(
           'id'      => $detail_produk_id,
           'stok'     => $qty + $stok->stok
          );
        $this->dp->update($update);
      }
      $this->cart->update($data);
      redirect("/");
    }
    redirect("/");
  }
  
  public function save_cart($data){
    $response = array();
    $res_rowid = array();
    $res_qty = array();
    if($this->cart->total_items()>0){
      foreach($this->cart->contents() as $item){
        $response[] = $item["id"];
        $res_rowid[] = $item["rowid"];
        $res_qty[] = $item["qty"];
      }
      // print_r($res_rowid);
      $next = array_search($data["id"], $response);
      $qty = $data["qty"];
      if(is_int($next)){
        $data["rowid"] = $res_rowid[$next];
        unset($data["qty"]);
        $data["qty"] = $res_qty[$next] + $qty;
        $resp = $this->cart->update($data);
      }else{
        $req = $this->cart->insert($data);
        $data["rowid"] = $req;
      }
    }else{
      $req =  $this->cart->insert($data);
      $data["rowid"] = $req;
    }
    return $data;
  }

  public function static_pages($id){
    if(!empty($id)){
      $this->load->model("pages/pages_model","pages");
      // $data = $this->product_model->find(array(),0,-1);
      $data = array(
          'data' => $this->pages->find_entity_by_id($id)
      );
      $this->template
          ->set('rows' , $data)
          ->build("frontend/static_pages");
    }else{
        $this->index();
    }
  }

  public function send_mail($data){
     $config = Array(
       'protocol' => 'smtp',
       'smtp_host' => 'ssl://smtp.gmail.com',
       'smtp_port' => 465, 
       'smtp_user' => 'magnshoes@gmail.com',
       'smtp_pass' => 'notforsale'

      ); 
    $this->load->library('email',$config);
    // $this->load->library('email');

    $this->email->initialize($config);
    $this->email->from('magnshoes@gmail.com', 'Toko sepatu online | aktifasi member');
    $this->email->to('danzztakezo@gmail.com'); 
   
    $this->email->subject($data["subject"]);
    $this->email->message($data["message"]);  
    $this->email->send();
    // if(!$this->email->send()){
    //   show_error($this->email->print_debugger());
    // }else{
    //   echo "u email send";
    //  }
     echo $this->email->print_debugger();

    
  }
  public function test_send_mail(){
    $member = array(
        "no_ktp" => "no_ktp",
        "nama" => "nama",
        "agama_id" => "agama_id",
        "telp" => "telp",
        "alamat" => "address_1",
        "kelurahan_id" => "kelurahan_id",
        "email" => "email",
        "password" => $this->encode("password"),
        "aktivasi_key" => "aktivasi_key",
        "status" => "status"

        );
      $email_member = $member;
      $email_member["link_aktivasi_key"] = "<a href='".base_url("frontend/aktifasi_member/aktivasi_key")."'> ".base_url("frontend/aktifasi_member/aktivasi_key")." </a>";
      
      $data = array(
        "from" => 'magnshoes@magnshoes.me.in' ,
        "to"   =>  "danzztakezo@gmail.com",
        "subject" => "Aktifasi Member Magnshoes",
        // "message" => "<a href='".base_url("frontend/aktifasi_member/". $data["aktivasi_key"])."'> ".base_url("frontend/aktifasi_member/". $data["aktivasi_key"])." </a>"
        "message" => $this->load->view("frontend/_email_aktifasi_tpl",$email_member,true)
      );

    $this->load->library("sendmail");
    $data = $this->sendmail->send($data);

    echo $data;
  }
  public function email(){
  $config = Array(
     'protocol' => 'SMTP',
     'smtp_host' => 'ssl://smtp.gmail.com',
     'smtp_port' => 465,
     'smtp_user' => 'danzztakezo@gmail.com',
     'smtp_pass' => '',
  );
  $this->load->library('email', $config);
  $this->email->set_newline("\r\n");

  $this->email->from('danzztakezo@gmail.com', ' Dani Aplikasi ');
  $this->email->to('dani_oracle@yahoo.co.id');

  $this->email->subject(' CodeIgniter Rocks Socks ');
  $this->email->message('aplikasi dani'.time().' ');


  if (!$this->email->send())
     show_error($this->email->print_debugger());
  else
     echo 'Your e-mail has been sent!';  
  }
  
    public function aktifasi_member($id){
   // echo $id;
    $this->load->model("members/member_model","u");
    $this->u->update_attribute(array("aktivasi_key" => $id),array("status" => "aktif"));
    $this->session->set_flashdata('message', 'Aktivasi Member Berhasil anda lakukan.');
    redirect("/");
  }

  public function test_grab(){
    $urlx = "http://www.posindonesia.co.id/home/modules/mod_search/tmpl/libs/lacakk1121m4np05.php?jenis=0&barcode=12996671239&lacak=Lacak";
      $this->load->helper('dom_helper');
      // Grab HTML From the URL
    $html = file_get_html("http://jne.co.id/index.php?mib=tracking.detail&awb=1861842470005");
   // echo $html;
   // echo "<hr/>";
    //echo $html->find("table[width='557'] table table",2);
    // find all link on Codeigniter Site
    $find = $html->find("table[width='557'] table table tr td")->last_child();
    echo " jmlah = ".$find;
    foreach($find as $ind => $e){
      echo $e->last_child()  . "| $ind <hr>";
    }
  }

  public function test_grab_jne(){
    $this->load->helper('dom_helper');
    // Grab HTML From the URL
    $html = file_get_html("http://jne.co.id/index.php?mib=tracking.detail&awb=1861842470005");
    $find = $html->find("table[width='557'] table table tr td");
    foreach($find as $ind => $e){
      // $next = $ind;
      $next[] = $e;
      // echo $e. "| $ind <hr>";
    }
    echo end($next);
  }

  public function test_grab_tiki(){
    $this->load->library('curl'); 
    $curl_html =  $this->curl->simple_post('http://www.tiki-online.com/tracking/track_single', array('TxtCon'=>'020112163323'), array(CURLOPT_BUFFERSIZE => 10)); 
     $this->load->helper('dom_helper');
     $html = str_get_html($curl_html);
     $find = $html->find('div[style="margin-top: 15px"] b font');
     $nextVal = Array();
     foreach($find as $ind => $e){
     // echo $e  . "| $ind <hr>";
      $nextVal[] = $e;
     }
    echo end($nextVal);
  }

  public function search_page(){
    $input = $this->input->post();
    if($input["keyword"]!=""){
      $data["data"] = $this->db->query("SELECT * FROM `detail_produk` WHERE `nama` LIKE '%".$input["keyword"]."%' OR `warna` LIKE '%".$input["keyword"]."%' OR `stok` LIKE '%".$input["keyword"]."%'")->result();
                
      $this->template
      ->title('Penjualan')
      ->set("title_form" ,"hasil pencarian")
      ->set("rows",$data)
      ->set("search_page",$input)
      //->build('frontend/search_page');
      ->build('frontend/_search_page');
    }
  }

  public function cancel_sell(){
    $this->load->model("sells/sell_model","sell_model");
    $this->load->model("sells/detail_sell_model","detail_sell_model");
    $this->load->model("delivers/deliver_model","deliver_model");
    // echo $id;
    // $member = $this->db->get_where("member",array("email"=>$this->session->userdata("member_login")))->row();
    // print_r($member);
    $where = array("status_pembayaran" => "blom","DATE(tanggal) < "=> date("Y-m-d"));
    $cek = $this->db->get_where("pembelian",$where)->result();
    foreach($cek as $c){
       // echo "Loop $c->id";
      $id = $c->id;
      $detprod = $this->detail_sell_model->find_entity_by("pembelian_id",$c->id);
      if(count($detprod)>0){
        // print_r($detprod);
        $old_stok = $this->detail_produk_model->find_entity_by_id($detprod->detail_produk_id);
        // $pembelian = $this->sell_model->find_entity_by_id($id);
        $member = $this->db->get_where("member",array("no_ktp"=>$c->member_no_ktp))->row();
        // ## update detail produk  stok + stok detail pembelian ## 
        if(count($detprod)>0){
          $new_stok = $old_stok->stok + $detprod->quantity;
          $update = array("id"=>$c->id,"stok"=>$new_stok);
          if($this->detail_produk_model->update($update)){
            #delete
            $this->deliver_model->destroy(array("pembelian_id"=>$id));
            $this->detail_sell_model->destroy(array("id"=>$detprod->id));
            $this->sell_model->destroy(array("id"=>$id));
            $data = array(
              "from" => 'info@magnshoes.com' ,
              "to"   =>  $member->email,
              "subject" => "pembatalan pembelian ".$c->id,
              "message" => $this->load->view("frontend/_email_pembatan_tpl",array("nama"=> $member->nama,"pembelian" => $id,"invoice" => $c->invoice,"tgl"=>$c->tanggal),true)
            );

            $this->load->library("sendmail");
            $data = $this->sendmail->send($data);
            // $this->session->set_flashdata('message', 'pembatalan Pembelian berhasil dilakukan');
             // redirect("frontend/history_wish");
          }
        }
      }
    }
    // die;
    // $id =1;
    
    // redirect("frontend/history_wish");
  }

  public function forget_password(){
    $this->load->model("members/member_model","member");
    $data = $this->input->post();
    $dbmember = $this->db->query("select * from member where email='".$data["email"]."'")->row();
    if(count($dbmember)){
    $new_pass = rand();
    $send_data = array(
        "from" => 'Admin Magnshoes' ,
        "to"   =>  "$dbmember->email" ,
        "subject" => "Reset",
        "message" => "Username : $dbmember->email  <br/>  Password baru ".$new_pass." <br/> "
      );
      $this->load->library("sendmail");
      $this->sendmail->send($send_data);
      $this->member->update_attribute(array("no_ktp" => $dbmember->no_ktp),array("password" => $this->encode($new_pass)));
    }
    redirect("/");
  }
  
}
