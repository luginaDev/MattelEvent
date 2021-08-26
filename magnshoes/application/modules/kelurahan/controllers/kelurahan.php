<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelurahan extends Backend_Controller {
  function __construct()
    {
        parent::__construct();
        $this->load->model("kota/kota_model","k");
        $this->load->model("propinsi/propinsi_model","p");
        $this->load->model("kecamatan/kecamatan_model","kc");
        $this->load->model("kelurahan/kelurahan_model","kl");

    }

    public function delete($id){
      if(!empty($id)){
        if($this->kl->destroy(array("id"=>$id))){
          $this->session->set_flashdata('success', 'Data kelurahan berhasil Dihapus');
        }else{
          $this->session->set_flashdata('error', 'Data kelurahan Gagal Dihapus');
        }
        redirect("kelurahan");
      }
      redirect("kelurahan");
    }
    
    public function index(){
      $kota[] = $this->k->find(array(),0,-1); 
      $prop[] = $this->p->find(array(),0,-1); 
      $kec[] = $this->kc->find(array(),0,-1); 
      $alias ="a";
      $select = " a.id,a.nama , a.kecamatan_id , b.nama as kota ,b.id as kota_id , b.propinsi_id , c.nama as propinsi ,d.nama as kecamatan ";
      // $where = array("b.status !=" => "99");
      $table_join = array('kecamatan d' => 'd.id = a.kecamatan_id','kota b' => 'b.id = d.kota_id','propinsi c' => 'c.id = b.propinsi_id',);
      $data[] = $this->kl->find_by_join($alias,$select,array(),$table_join);

      $this->template
        ->title('Halaman Administrator | kelurahan')
        ->set("title_form" ,"kelurahan")
        ->set("data",$data)
        ->set("kota",$kota)
        ->set("prop",$prop)
        ->set("kec",$kec)
        ->build('kelurahan/index');
    }

    public function save(){
      $data = $this->input->post();
      if(!empty($data)){
        if($this->kl->save_or_update($data)){
          $this->session->set_flashdata('success', 'Data kelurahan berhasil ditambahkan');
        }else{
          $this->session->set_flashdata('error', 'Data kelurahan Gagal ditambahkan');
        }  
        redirect("kelurahan");
      }else{
        redirect("kelurahan");
      }
    }
}