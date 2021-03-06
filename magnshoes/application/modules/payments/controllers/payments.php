<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payments extends Backend_Controller {
  function __construct()
    {
        parent::__construct();
        $this->load->model("sells/sell_model","c");
        $this->load->model("sells/detail_sell_model","ds");
        $this->load->model("products/product_model","p");
        $this->load->model("products/detail_product_model","dp");
        $this->load->model("products/daftar_harga_model","dh");
        $this->load->model("payments/payment_model","pm");
    }

    public function delete($id){
      if(!empty($id)){
        if($this->c->destroy(array("id"=>$id))){
          $this->session->set_flashdata('success', 'Data Category berhasil Dihapus');
        }else{
          $this->session->set_flashdata('error', 'Data Category Gagal Dihapus');
        }
        redirect("sells");
      }
      redirect("sells");
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
      $data[] = $this->c->find(array(),0,-1,"id desc"); 
      $this->template
        ->title('Halaman Administrator | Pembayaran')
        ->set("title_form" ,"Pembayaran")
        ->set("data",$data)
        ->build('sells/index');
    }

    public function notifikasi_data(){
      $data = $this->c->find(array("status_pembayaran" => "blom"));
      if(count($data)>0){
        foreach($data as $i => $d){
        echo "<tr> <td>".($i+1)."</td>
              <td>$d->tanggal</td>
              <td><a href='".base_url("sells/add_payment/$d->id")."' class='btn btn-info'>$d->type_pembayaran </a></td>
              <td>$d->subtotal</td>
              <td>$d->total</td> </tr>";
        }  
      }
    }

    public function save(){
      $data = $this->input->post();
      if(!empty($data)){
        if($this->c->save_or_update($data)){
          $this->session->set_flashdata('success', 'Data Category berhasil ditambahkan');
        }else{
          $this->session->set_flashdata('error', 'Data Category Gagagl ditambahkan');
        }  
        redirect("sells");
      }else{
        redirect("sells");
      }
    }

    public function add_payment($id){
      $this->load->model("members/member_model","mm");
      $this->load->model("discounts/discount_model","dc");
      $this->load->model("delivers/deliver_model","dv");
      $data["jual"] = $this->c->find_entity_by_id($id); 
      $data["member"] = $this->mm->find_entity_by("no_ktp",$data["jual"]->member_no_ktp);
      $data["detail"] = $this->ds->find(array("pembelian_id"=>$id),0,-1); 

      $this->template
        ->title('Halaman Administrator | Penjualan')
        ->set("title_form" ,"Tambah Pembayaran Penjualan")
        ->set("data",$data)
        ->build('sells/add_payment');
    }

    public function save_payment(){
      $this->load->model("payments/payment_model","pm");

      $data = $this->input->post();
      $data["tanggal"] = date("Y-m-d",strtotime($data["tanggal"]));
      // print_r($data);die;
      $this->pm->save($data);
      $this->c->update_attribute(array("id"=>$data["pembelian_id"]),array("status_pembayaran" => "sudah"));
      $this->session->set_flashdata('succes', 'Data Pembayaran Berhasil Di update');
      redirect("sells");
    }
}