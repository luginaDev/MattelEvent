<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends Backend_Controller {
  function __construct()
    {
        parent::__construct();
        $this->load->model("categories/category_model","c");
    }

    public function delete($id){
      if(!empty($id)){
        if($this->c->destroy(array("id"=>$id))){
          $this->session->set_flashdata('success', 'Data Category berhasil Dihapus');
        }else{
          $this->session->set_flashdata('error', 'Data Category Gagal Dihapus');
        }
        redirect("categories");
      }
      redirect("categories");
    }
    
    public function index(){
      $data[] = $this->c->find(array(),0,-1); 
      $this->template
        ->title('Halaman Administrator | Category')
        ->set("title_form" ,"Kategori")
        ->set("data",$data)
        ->build('categories/index');
    }

    public function save(){
      $data = $this->input->post();
      if(!empty($data)){
        if($this->c->save_or_update($data)){
          $this->session->set_flashdata('success', 'Data Category berhasil ditambahkan');
        }else{
          $this->session->set_flashdata('error', 'Data Category Gagagl ditambahkan');
        }  
        redirect("categories");
      }else{
        redirect("categories");
      }
    }
}