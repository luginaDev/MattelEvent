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
      $this->load->model("kota/kota_model","k");
      $this->load->model("propinsi/propinsi_model","p");
      $this->load->model("kecamatan/kecamatan_model","kc");

      $data[] = $this->a->find(array(),0,-1); 
      $vendors[] = $this->v->find(array(),0,-1); 

      $kota[] = $this->k->find(array(),0,-1); 
      $prop[] = $this->p->find(array(),0,-1); 
      $alias ="a";
      $select = " a.id,a.nama , a.kota_id , b.nama as kota , b.propinsi_id , c.nama as propinsi  ";
      // $where = array("b.status !=" => "99");
      $table_join = array('kota b' => 'b.id = a.kota_id','propinsi c' => 'c.id = b.propinsi_id');
      $data2[] = $this->kc->find_by_join($alias,$select,array(),$table_join);

      $this->template
        ->title('Halaman Administrator | Tarif')
        ->set("title_form" ,"Tarif")
        ->set("data",$data)
        ->set("vendors",$vendors)
        ->set("data2",$data2)
        ->set("kota",$kota)
        ->set("prop",$prop)
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