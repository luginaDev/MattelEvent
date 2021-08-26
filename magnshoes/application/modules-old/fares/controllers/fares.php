<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fares extends Backend_Controller {
  function __construct()
    {
        parent::__construct();
        $this->load->model("fares/fare_model","a");
        $this->load->model("vendors/vendor_model","v");
    }

    public function delete($id){
      if(!empty($id)){
        if($this->a->destroy(array("id"=>$id))){
          $this->session->set_flashdata('success', 'Data fares berhasil Dihapus');
        }else{
          $this->session->set_flashdata('error', 'Data fares Gagal Dihapus');
        }
        redirect("fares");
      }
      redirect("fares");
    }
    
    public function index(){
      $data[] = $this->a->find(array(),0,-1); 
      $vendors[] = $this->v->find(array(),0,-1); 
      $this->template
        ->title('Halaman Administrator | fares')
        ->set("title_form" ,"fares")
        ->set("data",$data)
        ->set("vendors",$vendors)
        ->build('fares/index');
    }

    public function save(){
      $data = $this->input->post();
      if(!empty($data)){
        if($this->a->save_or_update($data)){
          $this->session->set_flashdata('success', 'Data fares berhasil ditambahkan');
        }else{
          $this->session->set_flashdata('error', 'Data fares Gagagl ditambahkan');
        }  
        redirect("fares");
      }else{
        redirect("fares");
      }
    }
}