<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Groups extends Backend_Controller {
  function __construct()
    {
        parent::__construct();
        $this->load->model("groups/group_model","g");
    }

    public function delete($id){
      if(!empty($id)){
        if($this->g->destroy(array("id"=>$id))){
          $this->session->set_flashdata('success', 'Data Group berhasil Dihapus');
        }else{
          $this->session->set_flashdata('error', 'Data Group Gagal Dihapus');
        }
        redirect("groups");
      }
      redirect("groups");
    }

    public function index(){
      $data[] = $this->g->find(array(),0,-1); 
      $this->template
        ->title('Halaman Administrator | Groups')
        ->set("data",$data)
        ->build('groups/index');
    }

    public function save(){
      $data = $this->input->post();
      if(!empty($data)){
        if($this->g->save_or_update($data)){
          $this->session->set_flashdata('success', 'Data Group Berhasil diperbaharui/ditambahkan');
        }else{
          $this->session->set_flashdata('error', 'Data Group Gagal diperbaharui/ditambahkan');
        }
        redirect("groups");
      }
      redirect("groups");
    }



}
?>