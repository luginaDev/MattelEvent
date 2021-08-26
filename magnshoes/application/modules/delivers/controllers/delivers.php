<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delivers extends Backend_Controller {
  function __construct()
    {
        parent::__construct();
ob_start();
        $this->load->model("sells/sell_model","c");
        $this->load->model("sells/detail_sell_model","ds");
        $this->load->model("products/product_model","p");
        $this->load->model("products/detail_product_model","dp");
        $this->load->model("products/daftar_harga_model","dh");
        $this->load->model("delivers/deliver_model","dv");
        $this->load->model("vendors/vendor_model","v");
        $this->load->model("fares/fare_model","f");

    }

    public function delete($id){
      if(!empty($id)){
        if($this->c->destroy(array("id"=>$id))){
          $this->session->set_flashdata('success', 'Data Pengiriman berhasil Dihapus');
        }else{
          $this->session->set_flashdata('error', 'Data Pengiriman Gagal Dihapus');
        }
        redirect("delivers");
      }
      redirect("delivers");
    }
    
    public function detail(){
      $id = $this->input->post("id");
      // $where = array("a.id" => )
      $data = $this->ds->find(array("pembelian_id" => $id),0,-1);
      $html = "<table>";
      $html .= "<thead> 
                <tr>
                <th>No</th>
                <th>Kode</th> 
                <th>Nama</th> 
                <th>Qty</th> 
                <th>Harga</th>
                <th>diskon</th> 
                <th>Subtotal</th>
              </tr> </thead><tbody>";
      foreach ($data as $i => $d ){
        $detail_produk = $this->dp->find_entity_by_id($d->detail_produk_id);
        // echo $detail_produk[0]->nama;
       // print_r($detail_produk);die;
        $harga = $this->dh->find_entity_by_id($d->daftar_harga_id);
        if(!empty($d->diskon_id)){
          $diskon = $this->ds->find_entity_by_id($d->diskon_id);
        }else{
          $diskon = array("0");
        }

        $html .= "<tr>
                <td>$i</td>
                <td></td> 
                <td></td> 
                <td></td> 
                <td>".$d->quantity."</td>
                <td>diskon</td> 
                <td>Subtotal</td>
                </tr>";
      }
      $html .= "</table>";
      echo $html;
    }

    public function index(){
      $this->load->model("members/member_model","mem");
      $pembelian = $this->c->find(array("status_pembayaran"=> "sudah"),0,-1,"id desc");
      $data[] = $pembelian ;
      // $data[] = $this->dv->find_entity_by("pembelian_id",$pembelian->id);
      $this->template
        ->title('Halaman Administrator | Pengiriman')
        ->set("title_form" ,"Pengiriman")
        ->set("data",$data)
        ->build('delivers/index');
    }

    public function notifikasi_pengiriman(){
      $data = $this->c->find(array("status_pembayaran" => "sudah"));
      if(count($data)>0){
        foreach($data as $i => $d){
        echo "<tr> <td>".($i+1)."</td>
              <td>$d->tanggal</td>
              <td><a href='".base_url("delivers/add_payment/$d->id")."' class='btn btn-info'>$d->type_pembayaran </a></td>
              <td>$d->subtotal</td>
              <td>$d->total</td> </tr>";
        }  
      }
    }

    public function save(){
      $data = $this->input->post();
      $email = array(
            "from" => 'info@magnshoes.com' ,
            "to"   => $data["email"],
            "subject" => "Informasi Pengiriman magnshoes ",
            "message" => $this->load->view("delivers/_info_delivery",$data,true)
          );
      $this->load->library("sendmail");

      // sementara dani 26-04-2013
      $this->sendmail->send($email);
      unset($data['email'],$data['invoice'],$data["vendor"]);
      if(!empty($data)){
        if($this->dv->save_or_update($data)){
          $this->session->set_flashdata('success', 'Data Pengiriman berhasil ditambahkan');
        }else{
          $this->session->set_flashdata('error', 'Data Pengiriman Gagagl ditambahkan');
        }  
        redirect("delivers");
      }else{
        redirect("delivers");
      }
    }

    public function print_label(){
      
      $id = $this->input->post("id");
      $data["row"] = $this->dv->find_entity_by_id($id);
      $sql = "SELECT a.nama AS kelurahan, b.nama AS kecamatan, c.nama AS kota, d.nama AS propinsi
          FROM kelurahan a
          JOIN kecamatan b ON b.id = a.kecamatan_id
          JOIN kota c ON c.id = b.kota_id
          JOIN propinsi d ON d.id = c.propinsi_id
          WHERE a.id =".$data["row"]->kelurahan_id."";
      $data["vendor"] = $this->v->find_entity_by_id($data["row"]->vendor_id);
      $data["city"] = $this->db->query($sql)->row();
      $this->load->view("delivers/_print_label",$data);

    }
    
    public function check_deliveries($id,$vendor_id){

      $this->load->model("members/member_model","member");
      $deliver = $this->dv->find_entity_by_id($id);
      $vendor = $this->v->find_entity_by_id($vendor_id);
      $pembelian = $this->c->find_entity_by_id($deliver->pembelian_id);
      $mem = $this->member->find(array("no_ktp"=>$pembelian->member_no_ktp),0,1);
      // $data = "";
      switch (strtoupper($vendor->kode)) {
        case 'POS':
          $data = $this->grap_pos($vendor->site,$deliver->kode_pengiriman);
          break;
        case 'JNE':
          $data = $this->grap_jne($vendor->site,$deliver->kode_pengiriman);
          break;
        case 'TIKI':
          $data = $this->grap_tiki($vendor->site,$deliver->kode_pengiriman);
          break;
        default:
          echo "belom didefinisikan";
          $data ="";
          redirect("delivers");
          break;
      }
    
      if(!empty($data)){
        $update = array(
          'id'  => $id,
          'status_pengiriman' => $data["status"]
        );

        if($data["status"]=="terkirim"){
          $update["tanggal_penerimaan"] = $data['datetime'];
          $demail = array(
            'kode_pengiriman' => $deliver->kode_pengiriman,
            'invoice' => $pembelian->invoice,
            'vendor' => $vendor->nama,
            'tanggal' => $deliver->tanggal,
            // 'tanggal_penerimaan' => $deliver->tanggal_penerimaan
            'tanggal_penerimaan' => $update["tanggal_penerimaan"]
            );
          $this->session->set_flashdata('success', 'Data Pengiriman berhasil diupdate');
          // print_r($update);die;
          $this->dv->update($update);
          if($data=="terkirim"){
              $email = array(
                "from" => 'info@magnshoes.com' ,
                "to"   => $mem[0]->email,
                "subject" => "Informasi Barang Terkirim magnshoes ",
                "message" => $this->load->view("delivers/_info_barang_terkirim",$demail,true)
              );
              $this->load->library("sendmail");
              $this->sendmail->send($email);
              redirect("delivers");
          }
        }else{
          $this->session->set_flashdata('success', 'Data Pengiriman berhasil diupdate');
          $this->dv->update($update);
        }
        redirect("delivers");
      }else{
        redirect("delivers");
      }
      redirect("delivers");
    }

    private function grap_pos($url,$kode_pengiriman){
      $this->load->helper('dom_helper');
      $urltag = str_replace("{noresi}", "$kode_pengiriman", $url);
      $html = file_get_html("$urltag");
      $value = strtolower($html->find("table.tabelku tr td",8));
      $response="--";
      if(empty($value)){
        $response = 'proses';
      }else{
        $pos1 = stripos($value, "diterima");
        if($pos1 == true) {
          $response = "terkirim" ;
        }else{
          $response = "mengirim";
        }
      }
      return $response;
    }

  private function grap_jne($url,$kode_pengiriman){
      $this->load->helper('dom_helper');
      $urltag = str_replace("{noresi}", "$kode_pengiriman", $url);
      $html = file_get_html("$urltag");
      $find = $html->find("table[width='557'] table table tr td");
      foreach($find as $ind => $e){
        $next[] = $e;
      }
      $value = strtolower(end($next));
      $response="--";

      if(empty($value)){
        $response = 'proses';
      }else{
        $pos1 = stripos($value, "delivered");
        if($pos1 == true) {
          $response = "terkirim" ;
        }else{
          $response = "mengirim";
        }
      }
      return $response;
  }

  public function grap_tiki($url,$kode_pengiriman){
    $this->load->library('curl');
    $this->load->helper('dom_helper');
    // $curl_html =  $this->curl->simple_post("$url", array('TxtCon'=>"$kode_pengiriman"), array(CURLOPT_BUFFERSIZE => 10)); 
    $curl_html =  $this->curl->simple_post($url, array('get_con'=>"$kode_pengiriman","submit" => "Check")); 
     
     // $html = file_get_html("'".$curl_html."'");
    $html =  str_get_html("$curl_html"); 
    // $html = str_get_html('<html><body>Hello!<div id="aa"></div></body></html>');
    // print_r($html);
    // print_r($html->find('div[id]'));
     // $html = dump_html_tree($curl_html);

     // $html = new simple_html_dom();
     // $html->load_file($curl_html);
     // var_dump($html->find("div"));
     // echo $curl_html;
    // echo $html;

    $find = $html->find("div[id='myisi'] table");
    $find_tr = $html->find("div[id='myisi'] table tr");
    $status = "";
    // $nextVal =  array();
    echo count($find_tr);
    foreach($find_tr as $ind => $e){
      // $nextVal[] = $e;
      // echo $e;
        if(strpos($e, "SUCCEED")){
          // echo $e;
          $index=((($ind+1) * 3) -1);
          $date = $html->find("div[id='myisi'] table tr td",$index);
          $time = $html->find("div[id='myisi'] table tr td",($index +1));
          $status = strtolower(strip_tags($html->find("div[id='myisi'] table tr td",($index +2))));
          $nextVal["status"] = strip_tags($status);
          $nextVal["location"] = strip_tags($html->find("div[id='myisi'] table tr td",($index +3)));
          $nextVal["remark"] = strip_tags($html->find("div[id='myisi'] table tr td",($index + 4)));
          // $datetime = $this->convertion_date(strip_tags($date),strip_tags($time),"/");
          $nextVal["datetime"] = $this->convertion_date(strip_tags($date),strip_tags($time),"/");
         
        }
     }
// echo $status;
// print_r($nextVal);
// die;
      $response="--";
      if(empty($status)){
        $response = 'proses';
      }else{
        $pos1 = stripos(strtolower($status), "succeed");
        echo $status."||".($status=="succeed" ? "true": "False");
        // echo $pos1;die;
        if($status=="succeed") {
          $response = "terkirim" ;
          $nextVal["status"] = "terkirim";
        }else{
          $response = "mengirim";
          $nextVal["status"] = "mengirim";
        }
      }
      // print_r($nextVal);die;
      return $nextVal;
  }

  function convertion_date($date,$time,$separator){
    $split = explode($separator,$date);
    return date("Y-m-d H:i:s",strtotime($split[2]."-".$split[1]."-".$split[0]." ".$time));
  }

  function test_jne(){
    $this->load->library('curl'); 
    // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    // http://jne.co.id/index.php?mib=tracking.detail&awb=1861842470005
    // $curl = $this->curl->simple_put('http://jne.co.id/index.php',array('mib'=>'tracking.detail','awb' => '1861842470005'));
    $this->curl->simple_get('http://jne.co.id/index.php?mib=tracking.detail&awb=1861842470005');

    var_dump($this->curl->info);
    // var_dump($curl);
    // echo "<hr/>";
    // var_dump($this->curl->error_code); // int
    // echo $this->curl->execute();
    var_dump($this->curl->error_string);
  }

  public function test_tiki(){
    $this->load->library('curl'); 
    // $curl_html =  $this->curl->simple_post("$url", array('TxtCon'=>"$kode_pengiriman"), array(CURLOPT_BUFFERSIZE => 10)); 
    $curl_html =  $this->curl->simple_post("$url", array('get_con'=>"$kode_pengiriman","submit" => "Check"), array(CURLOPT_BUFFERSIZE => 10)); 
     $this->load->helper('dom_helper');
     $html = str_get_html($curl_html);
     $find = $html->find('div[style="margin-top: 15px"] b font');
     $nextVal = Array();
     foreach($find as $ind => $e){
      $nextVal[] = $e;
     }
     var_dump($html);
     die;
     $value = strtolower(end($nextVal));
      $response="--";
      if(empty($value)){
        $response = 'proses';
      }else{
        $pos1 = stripos($value, "succeed");
        if($pos1 == true) {
          $response = "terkirim" ;
        }else{
          $response = "mengirim";
        }
      }
      return $response;
  }
}