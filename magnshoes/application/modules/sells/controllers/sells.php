<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sells extends Backend_Controller {
  function __construct()
    {
        parent::__construct();
        $this->load->model("sells/sell_model","c");
        $this->load->model("sells/detail_sell_model","ds");
        $this->load->model("products/product_model","p");
        $this->load->model("products/detail_product_model","dp");
        $this->load->model("products/daftar_harga_model","dh");
        $this->load->model("delivers/deliver_model","dv");
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
      $data = $this->ds->find(array("pembelian_id" => $id),0,-1);
      $this->load->view("sells/_notifikasi_penjualan",$data);
    }

    public function index(){
      $data[] = $this->c->find(array(),0,-1,"id desc"); 
      $this->template
        ->title('Halaman Administrator | Penjualan')
        ->set("title_form" ,"Penjualan")
        ->set("data",$data)
        ->build('sells/index');
    }

    public function notifikasi_data(){
      $data["data"] = $this->c->find(array("status_pembayaran" => "blom"),0,-1,"id desc");
      $this->load->view("sells/_notifikasi_penjualan",$data);
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
      $pembelian = $this->c->find_entity_by_id($data["pembelian_id"]);
      $data["tipe_pembayaran"] = $pembelian->type_pembayaran;
      $data["status_pembayaran"] = "sudah";
      $status_pembayaran = $data["status_pembayaran"];
      $email = array(
            "from" => 'info@magnshoes.com' ,
            "to"   => $data["email"],
            "subject" => "Informasi Pelunasan Pembayaran Magnshoes ".$data["invoice"],
            "message" => $this->load->view("sells/_info_payment",$data,true)
          );
      $this->load->library("sendmail");
      // sementara dani 26-04-2013
      $this->sendmail->send($email);
      $data["tanggal"] = date("Y-m-d",strtotime($data["tanggal"]));
      unset($data['email'],$data['invoice'],$data["status_pembayaran"],$data["tipe_pembayaran"]);
    
      // $this->pm->save($data);
      $this->c->update_attribute(array("id"=>$data["pembelian_id"]),array("status_pembayaran" => $status_pembayaran));
      $this->session->set_flashdata('succes', 'Data Pembayaran Berhasil Di update');
      redirect("sells");
    }
}