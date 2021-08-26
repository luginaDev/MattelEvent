<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Returns extends Backend_Controller {
  function __construct()
    {
        parent::__construct();
        $this->load->model("returns/detail_return_model","drt");
        $this->load->model("returns/return_model","rt");
        $this->load->model("sells/sell_model","s");
        $this->load->model("sells/detail_sell_model","ds");
        $this->load->model("products/product_model","p");
        $this->load->model("products/detail_product_model","dp");
        $this->load->model("products/daftar_harga_model","dh");
        $this->load->model("delivers/deliver_model","dv");
        $this->load->model("vendors/vendor_model","v");
        $this->load->model("fares/fare_model","f");
        $this->load->model("discounts/discount_model","dc");
        $this->load->model("payments/payment_model","pay");

    }

    public function delete($id){
      if(!empty($id)){
        if($this->rt->destroy(array("id"=>$id))){
          $this->session->set_flashdata('success', 'Data Pengiriman berhasil Dihapus');
        }else{
          $this->session->set_flashdata('error', 'Data Pengiriman Gagal Dihapus');
        }
        redirect("returns");
      }
      redirect("returns");
    }

    public function detail(){
      $id = $this->input->post("id");
      // $where = array("a.id" => )
      $data = $this->rt->find(array("pembelian_id" => $id),0,-1);
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
        print_r($detail_produk);die;
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
      $pembelian = $this->rt->find(array(),0,-1);

      $data[] = $this->rt->find(array(),0,-1,"pembelian_id desc");
      // $data[] = $this->dv->find_entity_by("pembelian_id",$pembelian->id);
      $this->template
        ->title('Halaman Administrator | Retur')
        ->set("title_form" ,"Retur")
        ->set("data",$data)
        ->build('returns/index');
    }

    public function notifikasi_pengiriman(){
      $data = $this->c->find(array("status_pembayaran" => "sudah"));
      if(count($data)>0){
        foreach($data as $i => $d){
        echo "<tr> <td>".($i+1)."</td>
              <td>$d->tanggal</td>
              <td><a href='".base_url("returns/add_payment/$d->id")."' class='btn btn-info'>$d->type_pembayaran </a></td>
              <td>$d->subtotal</td>
              <td>$d->total</td> </tr>";
        }
      }
    }

    public function save(){
      $data = $this->input->post();
      if(!empty($data)){
        if($this->dv->save_or_update($data)){
          $this->session->set_flashdata('success', 'Data Pengiriman berhasil ditambahkan');
        }else{
          $this->session->set_flashdata('error', 'Data Pengiriman Gagagl ditambahkan');
        }
        redirect("returns");
      }else{
        redirect("returns");
      }
    }

  public function show(){
    $id = $this->input->post("id");
    $data["detail"] = $this->drt->find(array("retur_pembelian_id" => $id),0,-1);
    $data["pembelian_id"] =
    $this->load->view("returns/_detail",$data);
  }

  public function update_verifikasi(){
    $data = $this->input->post();
    if(count($data)>0){
      $subtotal = 0;
      $insert_detail_pembelian =array();
      foreach($data["keterangan_verifikasi"] as $ind => $d){
        $update = array(
          'keterangan_verifikasi' => $data["keterangan_verifikasi"][$ind],
         //'status'  => $data["status"][$ind] ,
          'id'  => $data["id"][$ind]
          );
        if($data["status"][$ind] == "disetujui"){
          $insert_detail_pembelian[] = array(
            "detail_produk_id"  => $data["detail_produk_id"][$ind] ,
            "diskon_id"         => $data["diskon_id"][$ind] ,
            "daftar_harga_id"  => $data["daftar_harga_id"][$ind] ,
            "quantity"          => "-".$data["qty"][$ind]
          );
          $update["status"] =  "finish";
          $subtotal  +=  "-".($data["qty"][$ind] * $data["harga"][$ind]) ;
        }elseif(($data["status"][$ind] == "accept_confirm")){
          $insert_detail_pembelian[] = array(
            "detail_produk_id"  => $data["ac_detail_produk_id"][$ind] ,
            "diskon_id"         => $data["ac_diskon_id"][$ind] ,
            "daftar_harga_id"  => $data["ac_daftar_harga_id"][$ind] ,
            "quantity"          => "-".$data["qty"][$ind]
          );
          $update["status"] =  "finish";
          $subtotal  +=  "-".($data["qty"][$ind] * $data["harga"][$ind]) ;
        }else{
        	$update["status"] =  $data["status"][$ind];
        }
        $this->drt->update($update);
      }
      if(count($insert_detail_pembelian) > 0){
        $sell = $this->s->find_entity_by_id($data["pembelian_id"]);
        $Rsell = $this->s->find_entity_by("invoice","R-".$sell->invoice);
        
        if(count($Rsell)>0){
         $new_pembelian_id = $Rsell->id;
         $subtotal = intval("-".(abs($subtotal) + abs($Rsell->subtotal)));
         $update_pembelian = array(
            "id"    => $new_pembelian_id,
            "subtotal"           => $subtotal,
            "total"              =>  $subtotal
          );

          $this->s->update($update_pembelian);

        }else{
           $pembelian = array(
            "invoice"             => "R-".$sell->invoice ,
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
        }

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
          "total_biaya"   => $deliver[0]->total_biaya,
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

  public function notifikasi_data(){
   //   $data["rows"] = $this->db->query("SELECT * FROM `detail_retur` WHERE `status` IN ('baru', 'cofirm') GROUP BY `retur_pembelian_id` ");
     /* if(count($data)>0){
        foreach($data as $i => $d){
        echo "<tr> <td>".($i+1)."</td>
              <td>$d->tanggal</td>
              <td><a href='".base_url("sells/add_payment/$d->id")."' class='btn btn-info'>$d->type_pembayaran </a></td>
              <td>$d->subtotal</td>
              <td>$d->total</td> </tr>";
        }
      }*/
      $data["pembelian"] = $this->rt->find(array(),0,-1);

      $data["retur"] = $this->rt->find(array(),0,-1);
    // $data[] = $this->dv->find_entity_by("pembelian_id",$pembelian->id);
    /*  $this->template
        ->title('Halaman Administrator | Retur')
        ->set("title_form" ,"Retur")
        ->set("data",$data)
        ->build('returns/index');
    */
    $this->load->view("returns/_notifikasi_retur",$data);
    }

}
