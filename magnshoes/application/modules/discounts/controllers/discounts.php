<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Discounts extends Backend_Controller {
  function __construct()
    {
        parent::__construct();
        $this->load->model("discounts/discount_model","dc");
        $this->load->model("products/product_model","p");
    }

    public function delete($id){
      if(!empty($id)){
        if($this->dc->destroy(array("id" => $id))){
          $this->session->set_flashdata('success', 'Data diskon berhasil Dihapus');
        }else{
          $this->session->set_flashdata('error', 'Data diskon Gagal Dihapus');
        }
        redirect("discounts");
      }
      redirect("discounts");
    }
    
    public function index(){
      $data =array(
        0 => $this->dc->find(array(),0,-1,"id desc"),
        1 => $this->p->find(array(),0,-1)
        );
      
      $this->template
        ->title('Halaman Administrator | Diskon ')
        ->set("title_form" ,"diskon")
        ->set("data",$data)
        ->build('discounts/index');
    }

    public function save(){
      $data = $this->input->post();
      if(!empty($data)){
        $insert = array(
          "produk_kode" => $data["produk_kode"],
          // "id" => $data["id"],
          "diskon" => $data["diskon"],
          "berawal" => date("Y-m-d H:i:s",strtotime($data["berawal"])),
          "berakhir" => date("Y-m-d H:i:s",strtotime($data["berakhir"])),
          "min_quantity" => $data["min_quantity"]
          );
        $cek = $this->db->get_where("diskon",array("produk_kode" => $data["produk_kode"],"status" => "aktif"))->result();
          $this->db->where(array("produk_kode" => $data["produk_kode"],"status" => "aktif"));
          if( $this->db->update("diskon",array("status" => "nonaktif"))){
            if($this->dc->save($insert)){
              $this->session->set_flashdata('success', 'Data diskon berhasil ditambahkan');
            }else{
              $this->session->set_flashdata('error', 'Data diskon Gagagl ditambahkan');
            }  
            redirect("discounts");
          }
        
      }else{
        redirect("discounts");
      }
    }
}