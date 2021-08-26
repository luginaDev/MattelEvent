<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kota extends Backend_Controller {
  function __construct()
    {
        parent::__construct();
        $this->load->model("kota/kota_model","k");
        $this->load->model("propinsi/propinsi_model","p");
    }

    public function delete($id){
      if(!empty($id)){
        if($this->k->destroy(array("id"=>$id))){
          $this->session->set_flashdata('success', 'Data Kota berhasil Dihapus');
        }else{
          $this->session->set_flashdata('error', 'Data Kota Gagal Dihapus');
        }
        redirect("kota");
      }
      redirect("kota");
    }
    
    public function index(){
      $propinsi[] = $this->p->find(array(),0,-1); 
      $alias ="a";
      $select = " a.id,a.nama , a.propinsi_id , b.nama as propinsi";
      // $where = array("b.status !=" => "99");
      $table_join = array('propinsi b' => 'b.id = a.propinsi_id');
      $data[] = $this->k->find_by_join($alias,$select,array(),$table_join);

      $this->template
        ->title('Halaman Administrator | Kota')
        ->set("title_form" ,"Kota")
        ->set("data",$data)
        ->set("prop",$propinsi)
        ->build('kota/index');
    }

    public function save(){
      $data = $this->input->post();
      if(!empty($data)){
        if($this->k->save_or_update($data)){
          $this->session->set_flashdata('success', 'Data Kota berhasil ditambahkan');
        }else{
          $this->session->set_flashdata('error', 'Data Kota Gagal ditambahkan');
        }  
        redirect("kota");
      }else{
        redirect("kota");
      }
    }
}