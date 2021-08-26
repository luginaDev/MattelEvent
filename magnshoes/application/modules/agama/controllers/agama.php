<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agama extends Backend_Controller {
  function __construct()
    {
        parent::__construct();
        $this->load->model("agama/agama_model","a");
    }

    public function delete($id){
      if(!empty($id)){
        if($this->a->destroy(array("id"=>$id))){
          $this->session->set_flashdata('success', 'Data Agama berhasil Dihapus');
        }else{
          $this->session->set_flashdata('error', 'Data Agama Gagal Dihapus');
        }
        redirect("agama");
      }
      redirect("agama");
    }
    
    public function index(){
      $data[] = $this->a->find(array(),0,-1); 
      $this->template
        ->title('Halaman Administrator | Agama')
        ->set("title_form" ,"Agama")
        ->set("data",$data)
        ->build('agama/index');
    }

    public function save(){
      $data = $this->input->post();
      if(!empty($data)){
        if($this->a->save_or_update($data)){
          $this->session->set_flashdata('success', 'Data Agama berhasil ditambahkan');
        }else{
          $this->session->set_flashdata('error', 'Data Agama Gagagl ditambahkan');
        }  
        redirect("agama");
      }else{
        redirect("agama");
      }
    }
}