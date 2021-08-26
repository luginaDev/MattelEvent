<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Propinsi extends Backend_Controller {
  function __construct()
    {
        parent::__construct();
        $this->load->model("propinsi/propinsi_model","p");
    }

    public function delete($id){
      if(!empty($id)){
        if($this->p->destroy(array("id"=>$id))){
          $this->session->set_flashdata('success', 'Data Provinsi berhasil Dihapus');
        }else{
          $this->session->set_flashdata('error', 'Data Provinsi Gagal Dihapus');
        }
        redirect("propinsi");
      }
      redirect("propinsi");
    }
    
    public function index(){
      $data[] = $this->p->find(array(),0,-1); 
      $this->template
        ->title('Halaman Administrator | Provinsi')
        ->set("title_form" ,"Provinsi")
        ->set("data",$data)
        ->build('propinsi/index');
    }

    public function save(){
      $data = $this->input->post();
      if(!empty($data)){
        if($this->p->save_or_update($data)){
          $this->session->set_flashdata('success', 'Data Provinsi berhasil ditambahkan');
        }else{
          $this->session->set_flashdata('error', 'Data Provinsi Gagal ditambahkan');
        }  
        redirect("propinsi");
      }else{
        redirect("propinsi");
      }
    }
}