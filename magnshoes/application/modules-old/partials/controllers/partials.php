<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partials extends MX_Controller{
  function __construct()
    {
        parent::__construct();
        $this->load->model("kota/kota_model","k");
        $this->load->model("propinsi/propinsi_model","p");
        $this->load->model("kecamatan/kecamatan_model","kc");
        $this->load->model("kelurahan/kelurahan_model","kl");
        $this->load->model("fares/fare_model","t");
   }

  public function select_option_kota(){
    $id = $this->input->post("id");
    $kota = $this->input->post("kota");
    $data = $this->k->find(array("propinsi_id"=>$id),0,-1);
    $opt = "<option value=''>--pilih--</option>";
    foreach($data as $d){
      if(!empty($kota) && $kota==$d->id){
        $select_opt="selected='selected'";
      }else{
        $select_opt="";
      }
      $opt .="<option value='".$d->id."' ".$select_opt."> $d->nama</option>";
    }
    echo $opt;
  }

  public function select_option_kecamatan(){
    $id = $this->input->post("id");
    $kota = $this->input->post("kelurahan");
    $data = $this->kc->find(array("kota_id"=>$id),0,-1);
    $opt ="<option value=''>--pilih--</option>";
    foreach($data as $d){
      if(!empty($kota) && $kota==$d->id){
        $select_opt="selected='selected'";
      }else{
        $select_opt="";
      }
      $opt .="<option value='".$d->id."' ".$select_opt."> $d->nama</option>";
    }
    echo $opt;
  }

  public function select_option_kelurahan(){
    $id = $this->input->post("id");
    $kecamatan = $this->input->post("kecamatan");
    $data = $this->kl->find(array("kecamatan_id"=>$id),0,-1);
    $opt ="<option value=''>--pilih--</option>";
    foreach($data as $d){
      if(!empty($kecamatan) && $kecamatan==$d->id){
        $select_opt="selected='selected'";
      }else{
        $select_opt="";
      }
      $opt .="<option value='".$d->id."' ".$select_opt."> $d->nama</option>";
    }
    echo $opt;
  }

  public function select_option_tarif(){
    $id = $this->input->post("id");
    // $kecamatan = $this->input->post("kecamatan");
    $data = $this->t->find(array("vendor_id"=>$id),0,-1);
    $opt ="<option value=''>--pilih--</option>";
    foreach($data as $d){
      // if(!empty($kecamatan) && $kecamatan==$d->id){
      //   $select_opt="selected='selected'";
      // }else{
      //   $select_opt="";
      // }
      $opt .="<option value='".$d->id."' > $d->tujuan (".number_format($d->tarif).")</option>";
    }
    echo $opt;
  }

  public function check_tarif(){
    $id = $this->input->post("id");
    $data = $this->t->find_entity_by_id($id);
    echo $data->tarif;
  }
}