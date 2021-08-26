<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Price_lists extends Backend_Controller {
  function __construct()
    {
        parent::__construct();
        $this->load->model("products/daftar_harga_model","a");
        $this->load->model("products/product_model","p");
        $this->load->model("categories/category_model","c");
        $this->load->model("products/detail_product_model","dp");
        // $this->load->model("products/daftar_harga_model","dh");
    }

    public function delete($id){
      if(!empty($id)){
        if($this->a->destroy(array("id"=>$id))){
          $this->session->set_flashdata('success', 'Data price_lists berhasil Dihapus');
        }else{
          $this->session->set_flashdata('error', 'Data price_lists Gagal Dihapus');
        }
        redirect("price_lists");
      }
      redirect("price_lists");
    }
    
    public function index(){
      $data[] = $this->a->find(array(),0,-1,"date_created desc"); 
      $this->template
        ->title('Halaman Administrator | price_lists')
        ->set("title_form" ,"Daftar Harga")
        ->set("data",$data)
        ->build('price_lists/index');
    }

    public function save(){
      $data = $this->input->post();
      if(!empty($data)){
        if($this->a->save_or_update($data)){
          $this->session->set_flashdata('success', 'Data price_lists berhasil ditambahkan');
        }else{
          $this->session->set_flashdata('error', 'Data price_lists Gagagl ditambahkan');
        }  
        redirect("price_lists");
      }else{
        redirect("price_lists");
      }
    }
}