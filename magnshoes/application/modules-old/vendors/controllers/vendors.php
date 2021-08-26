<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendors extends Backend_Controller {
  function __construct()
    {
        parent::__construct();
        $this->load->model("vendors/vendor_model","a");
    }

    public function delete($id){
      if(!empty($id)){
        if($this->a->destroy(array("id"=>$id))){
          $this->session->set_flashdata('success', 'Data vendors berhasil Dihapus');
        }else{
          $this->session->set_flashdata('error', 'Data vendors Gagal Dihapus');
        }
        redirect("vendors");
      }
      redirect("vendors");
    }
    
    public function index(){
      $data[] = $this->a->find(array(),0,-1); 
      $this->template
        ->title('Halaman Administrator | vendors')
        ->set("title_form" ,"vendors")
        ->set("data",$data)
        ->build('vendors/index');
    }

    public function save(){
      $data = $this->input->post();
      if(!empty($data)){
        if($this->a->save_or_update($data)){
          $this->session->set_flashdata('success', 'Data vendors berhasil ditambahkan');
        }else{
          $this->session->set_flashdata('error', 'Data vendors Gagagl ditambahkan');
        }  
        redirect("vendors");
      }else{
        redirect("vendors");
      }
    }
}