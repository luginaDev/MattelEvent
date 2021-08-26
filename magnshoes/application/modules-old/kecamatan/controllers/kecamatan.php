<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kecamatan extends Backend_Controller {
  function __construct()
    {
        parent::__construct();
        $this->load->model("kota/kota_model","k");
        $this->load->model("propinsi/propinsi_model","p");
        $this->load->model("kecamatan/kecamatan_model","kc");
    }

    public function delete($id){
      if(!empty($id)){
        if($this->kc->destroy(array("id"=>$id))){
          $this->session->set_flashdata('success', 'Data kecamatan berhasil Dihapus');
        }else{
          $this->session->set_flashdata('error', 'Data kecamatan Gagal Dihapus');
        }
        redirect("kecamatan");
      }
      redirect("kecamatan");
    }
    
    public function index(){
      $kota[] = $this->k->find(array(),0,-1); 
      $prop[] = $this->p->find(array(),0,-1); 
      $alias ="a";
      $select = " a.id,a.nama , a.kota_id , b.nama as kota , b.propinsi_id , c.nama as propinsi  ";
      // $where = array("b.status !=" => "99");
      $table_join = array('kota b' => 'b.id = a.kota_id','propinsi c' => 'c.id = b.propinsi_id');
      $data[] = $this->kc->find_by_join($alias,$select,array(),$table_join);

      $this->template
        ->title('Halaman Administrator | kecamatan')
        ->set("title_form" ,"kecamatan")
        ->set("data",$data)
        ->set("kota",$kota)
        ->set("prop",$prop)
        ->build('kecamatan/index');
    }

    public function save(){
      $data = $this->input->post();
      if(!empty($data)){
        if($this->kc->save_or_update($data)){
          $this->session->set_flashdata('success', 'Data kecamatan berhasil ditambahkan');
        }else{
          $this->session->set_flashdata('error', 'Data kecamatan Gagal ditambahkan');
        }  
        redirect("kecamatan");
      }else{
        redirect("kecamatan");
      }
    }
}