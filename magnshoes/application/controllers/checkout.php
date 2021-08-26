<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends Frontend_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model("products/product_model","p");
    $this->load->model("products/detail_product_model","dp");
    $this->load->model("products/daftar_harga_model","dh");
    $this->load->model("discounts/discount_model","dc");
    $this->load->model("cart_temp_model","ct");

  }

  public function cancel_order(){
    $member = $this->session->userdata("member_id");
    if(!empty($member)){
      $cart = $this->ct->find(array("member_id " => $member),0,-1);
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
        $this->session->set_flashdata('message', 'data Cart Anda '.$member.' berhasil di Cancel');
      }
    }
    redirect("/");
  }

  public function remove_cart($member){

  }

  public function proccess_ordering(){

    $this->load->model("members/member_model","m");
    $this->load->model("sells/sell_model","sell");
    $this->load->model("delivers/deliver_model","del");
    $this->load->model("sells/detail_sell_model","ds");
    $this->load->library("convert_currency");

    $data = $this->input->post();
    if(!empty($data)){
      $member = $this->m->find_entity_by("email",$this->session->userdata("member_login"));
      if($data["type_pembayaran"]=="transfer" || $data["type_pembayaran"]=="cod"){
        $type_pembayaran = "tr";
      }
      $pembelian = array(
          "tanggal"          => date("Y-m-d H:i:s",time()),
          "member_no_ktp"    => $member->no_ktp,
          "subtotal"          => $data["subtotal"],
          "total"             => $data["total_keseluruhan"],
          "status_pembayaran" => "blom",
          "status_barang"     => "stok",
          "type_pembayaran"   => $data["type_pembayaran"],
          "rekening_id"       => $data["rekening_id"],
          "kurs"              => 1,
          "currency"          => "USD",
          "invoice"           => $data["invoice"]
      );
      $result=$this->sell->save($pembelian);
      if($result){
        $pem = mysql_insert_id();
        //$pem = $this->db->query("select * from pembelian where invoice = '".$data["invoice"]."'")->row()->id;
        foreach($data["detail_produk_id"] as $ind => $d){
          $sell_detail = array(
              "detail_produk_id"  => $d,
              "pembelian_id"      => $pem,
              "diskon_id"         => $data["diskon_id"][$ind] ,
              "daftar_harga_id"   => $data["daftar_harga_id"][$ind],
              "quantity"          => $data["dquantity"][$ind]
          );
          $this->ds->save($sell_detail);
        }
         $pengiriman = array(

              "pembelian_id"  => $pem,

              "total_biaya"   => $data["tambahan_biaya"],
              "tanggal"       => date("Y-m-d H:i:s",time()),
              "alamat"        => $data["alamat"],
              "no_telp"       => $data["telp"],
              "kelurahan_id"  => $data["kelurahan_id"],
              "nama"          => $data["nama"]
            );
        if($data["type_pembayaran"]=="cod"){
          $pengiriman["vendor_id"] = "99";
          $pengiriman["tarif_id"] = "99";
        }else {
           $pengiriman["tarif_id"] = $data["tarif_id"];
           $pengiriman["vendor_id"] = $data["vendor_id"];
        }

       $this->del->save($pengiriman);
        $this->cart_temp_model->destroy(array("member_id"=>$member->email));

        $email_member["id"] = $pem;
        $email = array(
            "from" => 'info.magnshoes.com' ,
            "to"   => $this->session->userdata("member_login"),
            "subject" => "Invoices Magnshoes ".$pem,
            "message" => $this->load->view("frontend/_invoices",$email_member,true)
          );
        $this->load->library("sendmail");
        $data = $this->sendmail->send($email);
        $this->session->set_flashdata('message', 'CheckOut berhasil dilakukan silakan lakukan pembayaran via '.$data["type_pembayaran"]);
        redirect("frontend/add_payment/$pem");
      }else{
        $this->session->set_flashdata('message', 'silakan lakukan pembelian');
        redirect("frontend/checkout");
      }
    }else{
        $this->session->set_flashdata('message', 'silakan lakukan pembelian');
        redirect("frontend/checkout");
    }
  }

  public function convert_usd_to_rp($total){
    $this->load->helper('dom_helper');
    $html = file_get_html("http://www.bca.co.id/id/biaya-limit/kurs_counter_bca/kurs_counter_bca_landing.jsp");
     $find = $html->find("table[style='width:300px;float:left;'] tr td",5);
     $nilai = explode(".",$find);
     // echo "$total / intval(var)$nilai[0]";
     // echo 390000 / 9800;
     $hasil = (int)$total / intval($find->plaintext);
     // echo $hasil;
     return $hasil;
  }

  // public function test_convert($id){
  //   // echo $id;
  //   $this->convert_usd_to_rp($id);
  // }
  public function proccess_ordering_paypal(){
    $this->load->model("members/member_model","m");
    $this->load->model("sells/sell_model","sell");
    $this->load->model("delivers/deliver_model","del");
    $this->load->model("sells/detail_sell_model","ds");
    $this->load->library("convert_currency");

    $data = $this->input->post();
 //    echo $data["tambahan_biaya"];
 // die;
    if(!empty($data)){
      $member = $this->m->find_entity_by("email",$this->session->userdata("member_login"));
      if($data["type_pembayaran"]=="transfer" || $data["type_pembayaran"]=="cod"){
        $type_pembayaran = "tr";
      }
      $pembelian = array(
          "tanggal"          => date("Y-m-d H:i:s",time()),
          "member_no_ktp"    => $member->no_ktp,
          "subtotal"          => $data["subtotal"],
          "total"             => $data["total_keseluruhan"],
          "status_pembayaran" => "blom",
          "status_barang"     => "stok",
          "type_pembayaran"   => $data["type_pembayaran"],
          "rekening_id"       => $data["rekening_id"],
          "kurs"              => $this->convert_currency->check_kurs("USD"),
          "currency"          => "USD",
          "invoice"           => $data["invoice"]
      );
      $result=$this->sell->save($pembelian);
      $paypal = array();
      if($result){
        $pem = mysql_insert_id();
        $invoices = $pem;
        foreach($data["detail_produk_id"] as $ind => $d){
          $sell_detail = array(
              "detail_produk_id"  => $d,
              "pembelian_id"      => $pem,
              "diskon_id"         => $data["diskon_id"][$ind] ,
              "daftar_harga_id"   => $data["daftar_harga_id"][$ind],
              "quantity"          => $data["dquantity"][$ind]
          );
          $det = $this->dp->find_entity_by_id($d);
          $price_list = $this->dh->find_entity_by_id($data["daftar_harga_id"][$ind]);
          $paypal[] = array(
            "item_name_".($ind+1).""  => $det->nama ,
            "amount_".($ind+1).""    => number_format(($this->convert_usd_to_rp($price_list->harga)),2)  ,
           "invoice"           => $data["invoice"],
            "quantity_".($ind+1).""    => $data["dquantity"][$ind]
            );
          $this->ds->save($sell_detail);
        }

        if($data["type_pembayaran"]=="transfer" || $data["type_pembayaran"]=="paypall"){
         $vendor_init =  $data["vendor_id"];
         $tarif_init = $data["tarif_id"];
        }else{
         $vendor_init =  99;
         $tarif_init = 99;
        }

        $pengiriman = array(
              "vendor_id"     => $vendor_init,
              "pembelian_id"  => $pem,
              "tarif_id"      => $tarif_init,
              "total_biaya"   => $data["tambahan_biaya"],
              "tanggal"       => date("Y-m-d H:i:s",time()),
              "alamat"        => $data["alamat"],
              "nama"        => $data["nama"],
              "no_telp"       => $data["telp"],
              "kelurahan_id"  => $data["kelurahan_id"]
            );
            $this->del->save($pengiriman);
            $this->cart_temp_model->destroy(array("member_id"=>$member->email));
            $email_member["id"] = $pem;
            $email = array(
              "from" => 'info.magnshoes.com' ,
              "to"   => $this->session->userdata("member_login"),
              "subject" => "Invoices Magnshoes ".$pem,
              "message" => $this->load->view("frontend/_invoices",$email_member,true)
            );
          $this->load->library("sendmail");
          $this->sendmail->send($email);
          $this->session->set_flashdata('message', 'CheckOut berhasil dilakukan silakan lakukan pembayaran via '.$data["type_pembayaran"]);
          $paypal[] = array(
            "item_name_".(count($paypal)+1).""  => "Biaya tambahan/pengiriman",
            "amount_".(count($paypal)+1).""    => number_format(($this->convert_usd_to_rp($data["tambahan_biaya"])),2)  ,
           // "invoice"           => $data["invoice"],
            "quantity_".(count($paypal)+1).""    => 1
          );

          $this->paypal($paypal,$pem,$invoices);
        }else{
           $this->session->set_flashdata('message', 'silakan lakukan pembelian');
        }
      }else{
        $this->session->set_flashdata('message', 'silakan lakukan pembelian');
      }
  }

  public function add_retur($id,$detail_produk_id){
    $this->load->model("sells/sell_model","sell");
    $this->load->model("sells/detail_sell_model","detsell");
    $data["detail"] = $this->detsell->find_entity_by_id($id);
    $this->load->view("frontend/_add_retur",$data);
  }

  public function confirm_retur($id){
    $this->load->model("sells/sell_model","sell");
    $this->load->model("sells/detail_sell_model","detsell");
    $this->load->model("returns/detail_return_model","dretur");
    $this->load->model("returns/return_model","rt");
    $this->load->model("products/product_model","p");
    $this->load->model("products/detail_product_model","dp");
    $this->load->model("products/daftar_harga_model","dh");
    $this->load->model("discounts/discount_model","dc");
    $pembelian = $this->detsell->find_entity_by_id($id);
    $data["detail"] = $pembelian;
    $data["detail_retur"] = $this->dretur->find_entity_by("detail_pembelian_id",$id);
    $data["detail_produk"] = $this->dp->find_entity_by("id",$pembelian->detail_produk_id);
    $data["products"] = $this->dp->find(array(),0,-1);
    $data["harga"] = $this->dh->find(array("detail_produk_id" => $pembelian->detail_produk_id),0,1,"id desc");
    $this->load->view("frontend/_confirm_retur",$data);
  }

  public function update_retur(){
    $this->load->model("returns/detail_return_model","dretur");
    $data = $this->input->post();
    $cek = $this->dretur->find_entity_by_id($data["detail_retur_id"]);
    $old_kode_retur = (empty($cek->retur_detail_produk_id)? '': $cek->retur_detail_produk_id.";");
    $old_pengganti =  (empty($cek->jumlah_pengganti)? '': $cek->jumlah_pengganti.";");
    $update = array(
      "id"                      => $data["detail_retur_id"] ,
      "retur_detail_produk_id"  => $old_kode_retur ."".implode(";",$data["kode"]),
      "jumlah_pengganti"        => $old_pengganti."".implode(";",$data["jumlah"]),
      "status"                  => "accept_confirm"
    );
    $this->dretur->update($update);

    $this->session->set_flashdata('message', 'data retur berhasil dilakukan');
    redirect($_SERVER["HTTP_REFERER"]);
  }

  public function create_retur(){
    $this->load->model("returns/return_model","retur");
    $data = $this->input->post();
    $this->retur->create_retur($data);
    $this->session->set_flashdata('message', 'data retur berhasil dilakukan');
    redirect($_SERVER["HTTP_REFERER"]);
  }

  public function update_pengiriman(){
    $this->load->model("delivers/deliver_model","deliver");
    $data = array(
      'id'  => $this->input->post("id"),
      'status_pengiriman' => "terkirim"
      );
    $this->deliver->update($data);
  }

  public function paypal($data,$id_pembelian,$invoices){
    $this->load->library("paypal_class");
    $p = new paypal_class;
    //$p->add_field('business', 'kaosmixstore@gmail.com');
    // $p->add_field('business', 'magnsh_1338185979_biz@gmail.com');
    $p->add_field('business', 'magnshoes@gmail.com');
    $p->add_field('first_name',$this->session->userdata("member_name"));
    $p->add_field('upload','1');
    // $p->add_field('invoiceId',$invoices);
    // $p->add_field('notify_url',base_url()."chekout/test_ipn");
   $p->add_field('notify_url',"http://magnshoes.com/checkout/proses_ipn");
   $p->add_field('return',"http://magnshoes.com/checkout/proses_ipn");
   // $p->add_field('PAYMENTREQUEST_0_PAYMENTACTION',"http://stagging.magnshoes.com/chekout/test_ipn");
   // $p->add_field('USER',"magnsh_1338185979_biz_api1.gmail.com");
   // $p->add_field('PWD',"1338186005");
   // $p->add_field('SIGNATURE',"AkoxvKxWbZRMfoOU7IOSzqqEU6mmAXYUUKrPBgoeH1aaf29xyeorpMSi");
   // $p->add_field('VERSION',"11.0");
   // $p->add_field('METHOD',"DoExpressCheckoutPayment");

    foreach($data as $d){
      foreach ($d as $key => $value) {
        $p->add_field($key, $value);
      }
    }
    $p->submit_paypal_post();
  }

  public function convert_kurs(){
    $this->load->library("convert_currency");
    $data = $this->convert_currency->convert(10000,"IDR","USD",2);
    echo $this->convert_currency->check_kurs("USD");

  }

  public function test_ipn(){
    //$this->load->library("paypal_class");
    //$p = new paypal_class;
    //$p->validate_ipn();
    $this->load->helper('file');
    $data  = json_encode($this->input->post())."\n";
    if ( ! write_file(getcwd().'/log_ipn.php', $data,'a+'))
    {
         echo 'Unable to write the file';
    }
    else
    {
         echo 'File written!';
    }
    // write_file(getcwd().'/log_ipn.php', $data, 'r+');

  }

  public function show_test_ipn(){
    $this->load->helper('file');
    $string = read_file(getcwd().'/log_ipn.php');
  }

  public function test_paypal(){
    // $this->load->view("frontend/test_paypal");

    // $this->load->library('paypal_class');
     $this->load->library("paypal_class");
     $p = new paypal_class;
    $this->paypal_class->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';   // testing paypal url
    //$p->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';   // paypal url
    $p->add_field('currency_code', 'CHF');
    $p->add_field('business','magnsh_1338185979_biz@gmail.com');
    //$p->add_field('business', $this->config->item('bussinessPayPalAccount'));
    $p->add_field('return', 'http://stagging.magnshoes.com/chekout/test_ipn'); // return url
    $p->add_field('cancel_return','http://stagging.magnshoes.com/chekout/test_ipn'); // cancel url
    $p->add_field('notify_url','http://stagging.magnshoes.com/chekout/test_ipn'); // notify url
    $totalPrice = "900000";
    $p->add_field('item_name', 'Testing');
    $p->add_field('amount', $totalPrice);
    $p->add_field('custom', "1");
    $p->submit_paypal_post(); // submit the fields to paypal
     $p->dump_fields();    // for debugging, output a table of all the fields
    exit;

  }
  public function update_verifikasi(){
    $data = $this->input->post();
    if(count($data)>0){
      $subtotal = 0;
      $insert_detail_pembelian =array();
      foreach($data["keterangan_verifikasi"] as $ind => $d){
        $update = array(
          'keterangan_verifikasi' => $data["keterangan_verifikasi"][$ind],
          'status'  => $data["status"][$ind] ,
          'id'  => $data["id"][$ind]
          );
        if($data["oldstatus"][$ind] == "accept_confirm"){
          $insert_detail_pembelian[] = array(
            "detail_produk_id"  => $data["detail_produk_id"][$ind] ,
            "diskon_id"         => $data["diskon_id"][$ind] ,
            "daftar_harga_id"  => $data["daftar_harga_id"][$ind] ,
            "quantity"          => "-".$data["qty"][$ind]
          );
          $subtotal  +=  "-".($data["qty"][$ind] * $data["harga"][$ind]) ;
        }
        $this->drt->update($update);
      }
      if(count($insert_detail_pembelian) > 0){
        $sell = $this->s->find_entity_by_id($data["pembelian_id"]);
        $pembelian = array(
          "invoice"             => "0" ,
          "tanggal"            => date("Y-m-d H:i:s"),
          "member_no_ktp"       => $sell->member_no_ktp ,
          "subtotal"           => intval($subtotal),
          "total"              => intval($subtotal),
          "status_pembayaran"  => $sell->status_pembayaran,
          "status_barang"      => $sell->status_barang,
          "type_pembayaran"    => $sell->type_pembayaran,
          "rekening_id"        => $sell->rekening_id,
          "currency"          => $sell->currency,
          "kurs"              => $sell->kurs,
          "referesi_pembelian_id"  => $data["pembelian_id"],
          "type_pembelian"       => "retur"
        );
        $this->s->save($pembelian);
        $new_pembelian_id = mysql_insert_id();
        foreach ($insert_detail_pembelian as $key => $value) {
          $detail_pembelian = array(
            "pembelian_id"      =>  $new_pembelian_id ,
            "detail_produk_id"  => $value["detail_produk_id"] ,
            "diskon_id"         => $value["diskon_id"]   ,
            "daftar_harga_id"  => $value["daftar_harga_id"] ,
            "quantity"          => intval($value["quantity"])
          );
          $this->ds->save($detail_pembelian);
        }
        $pembayaran = array(
          "pembelian_id"    => $new_pembelian_id ,
          "tanggal"         => date("Y-m-d H:i:s") ,
          "jenis_bayar"   => "retur" ,
          "no_rekening"   => 0 ,
          "no_rek_tujuan"   => 0 ,
          "rekening_id"   => 1 ,
          "total" => intval("$subtotal")
        );
        $this->pay->save($pembayaran);
        $deliver = $this->dv->find(array("pembelian_id" => $data["pembelian_id"]),0,1);
        $kirim = array(
          "nama"          => $deliver[0]->nama,
          "pembelian_id"  => $new_pembelian_id,
          "vendor_id"     => $deliver[0]->vendor_id,
          "tarif_id"      => $deliver[0]->tarif_id,
          "total_biaya"     => $deliver[0]->total_biaya,
          "alamat"        => $deliver[0]->alamat,
          "no_telp"       => $deliver[0]->no_telp,
          "kelurahan_id"  => $deliver[0]->kelurahan_id,
          "status_pengiriman" => "belum"
        );
        $this->dv->save($kirim);
        redirect("returns/index");
      }
      redirect("returns/index");
    }
    redirect("returns/index");
  }

  public function save_payment(){
      $this->load->model("payments/payment_model","pm");
      $this->load->model("sells/sell_model","sell_model");
      $this->load->model("rekening/rekening_model","rek");
      $data = $this->input->post();

      $rekn = explode("/",$data["rekening_id"]);
      $data["rekening_id"] = $rekn[0];
      $data["tanggal"] = date("Y-m-d H:i:s");
      // $data["tanggal"] = date("Y-m-d H:i:s",strtotime($data["tanggal_bayar"]));
      $data["tanggal_bayar"] = date("Y-m-d H:i:s",strtotime($data["tanggal_bayar"]));
      $email = array(
            "from" => 'info@magnshoes.com' ,
            "to"   => $data["email"],
            "subject" => "Konfirmasi Pembayaran Magnshoes ".$data['invoice'],
            "message" => $this->load->view("sells/_info_payment",$data,true)
          );
      $this->load->library("sendmail");
      $this->sendmail->send($email);

      unset($data['email'],$data['invoice'],$data["status_pembayaran"]);
     $payment = $this->pm->find_entity_by("pembelian_id",$data["pembelian_id"]);
     $bank = $this->rek->find_entity_by_id($data["rekening_id"]);
      if(!empty($payment->id)){
        $this->pm->update_attribute(array("id"=>$payment->id),array("no_rekening" => $data["no_rekening"],"no_rek_tujuan" => $bank->rekening,"rekening_id" => $data["rekening_id"],'total'=>$data["total"]));
      }else{
        $this->pm->save($data);
      }
      $this->sell_model->update_attribute(array("id"=>$data["pembelian_id"]),array("status_pembayaran" => "konfirmasi","rekening_id" => $data["rekening_id"]));
      $this->session->set_flashdata('succes', 'Data Pembayaran Berhasil Di update');
      redirect("frontend/history_wish");
    }

    public function proses_ipn(){
      $this->load->helper('file');
      $this->load->model("payments/payment_model","pm");
      $this->load->model("sells/sell_model","sell_model");
      $this->load->model("rekening/rekening_model","rek");

      $post = $this->input->post();

      $payment = $this->sell_model->find_entity_by("invoice",$post["invoice"]);
      $data  = json_encode($this->input->post())."$payment->id | \n";
      if ( ! write_file(getcwd().'/log_ipn.php', $data,'a+'))
      {
           echo 'Unable to write the file';
      }
      else
      {
           echo 'File written!';
      }

      // $this->pm->update_attribute(array("pembelian_id"=>$payment->id),array('total'=>$payment->total));
      $this->sell_model->update_attribute(array("id"=>$payment->id),array("status_pembayaran" => "sudah"));

      // if ( ! write_file(getcwd().'/log_ipn.php', $data,'a+'))
      // {
      //      echo 'Unable to write the file';
      // }
      // else
      // {
      //      echo 'File written!';
      // }
    }

  public function update_payment(){
   //  $this->load->model("payments/payment_model","pm");
//     $this->load->model("sells/sell_model","sell_model");
      $post = $this->input->post();
      $this->db->where("id", $post["id_pembelian"]);
      $this->db->update("pembelian",array("type_pembayaran"=> $post["type_pembayaran"]));
      redirect("frontend/history_wish");
  }

  public function new_proccess_ordering_paypal(){
    $this->load->model("members/member_model","m");
    $this->load->model("sells/sell_model","sell");
    $this->load->model("delivers/deliver_model","del");
    $this->load->model("sells/detail_sell_model","ds");
    $this->load->library("convert_currency");

    $post = $this->input->post();
    $this->db->where("id", $post["id_pembelian"]);
    $this->db->update("pembelian",array("type_pembayaran"=> $post["type_pembayaran"]));
    if(!empty($post)){
      $member = $this->m->find_entity_by("email",$this->session->userdata("member_login"));
      $pembelian = $this->sell->find_entity_by_id($post["id_pembelian"]);
      $deliver = $this->del->find_entity_by("pembelian_id",$post["id_pembelian"]);
      $detail_pembelian = $this->ds->find(array("pembelian_id " => $post["id_pembelian"]),0,-1);
      $paypal = array();
        $invoices = $pembelian->invoice;
        foreach($detail_pembelian as $ind => $d){
          $det = $this->dp->find_entity_by_id($d->detail_produk_id);
          $price_list = $this->dh->find_entity_by_id($d->daftar_harga_id);
          $paypal[] = array(
            "item_name_".($ind+1).""  => $det->nama ,
            "amount_".($ind+1).""    => number_format(($this->convert_usd_to_rp($price_list->harga)),2)  ,
           "invoice"           => $pembelian->invoice,
            "quantity_".($ind+1).""    => $d->quantity
            );
        }

         $vendor_init = $deliver->vendor_id;
         $tarif_init = $deliver->tarif_id;
        $email_member["id"] = $pembelian->id;
        $email = array(
          "from" => 'info.magnshoes.com' ,
          "to"   => $this->session->userdata("member_login"),
          "subject" => "Invoices Magnshoes ".$pembelian->invoice,
          "message" => $this->load->view("frontend/_invoices",$email_member,true)
        );
        $this->load->library("sendmail");
        $this->session->set_flashdata('message', 'CheckOut berhasil dilakukan silakan lakukan pembayaran via '.$post["type_pembayaran"]);
        $paypal[] = array(
            "item_name_".(count($paypal)+1).""  => "Biaya tambahan/pengiriman",
            "amount_".(count($paypal)+1).""    => number_format(($this->convert_usd_to_rp($deliver->total_biaya)),2)  ,
           "invoice"           => $pembelian->invoice,
            "quantity_".(count($paypal)+1).""    => 1
          );

        $this->paypal($paypal,$pembelian->id,$invoices);
      }else{
        $this->session->set_flashdata('message', 'silakan lakukan pembelian');
      }
  }

  public function show_convert_usd_to_rp(){
    $this->load->helper('dom_helper');
    $html = file_get_html("http://www.bca.co.id/id/biaya-limit/kurs_counter_bca/kurs_counter_bca_landing.jsp");
    $find = $html->find("table[style='width:300px;float:left;'] tr td",5);
     return $hasil;
  }

}
