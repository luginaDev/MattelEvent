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

  public function add_rating(){
    $data = $this->input->post();
    $this->load->model("partials/rating_model","rat");
    $pesan = "error|anda belum melakukan Login silakan anda login Terlebih dahulu";
    if($this->session->userdata("member_login")!=""){
    if(!empty($data)){
      $find = $this->rat->find(array("detail_produk_id"=>$data['detail_produk_id'],"member_email" => $this->session->userdata("member_login")),0,-1);
      if(count($find)>0){
        $pesan = "error| Maaf Anda sebelumnya telah memberikan rating pada produk ini";
        }else{
          $data["member_email"] =  $this->session->userdata("member_login");
          $this->rat->save($data);
          $pesan = "success| Data Rating telah dilakukan";
          $this->session->set_flashdata('success', 'Data Rating telah dilakukan');
        }
    }
    }
    echo $pesan;
  }

  public function detail_kirim($id){
    $this->load->model("delivers/deliver_model","deliver");
    $this->load->model("vendors/vendor_model","vendor");
    $data["rows"] = $this->deliver->find_entity_by("pembelian_id",$id);
    $pegiriman = $this->load->view("_detail_kirim",$data);
   
  }

  public function grab_site(){
    
      echo file_get_contents("http://jne.co.id/index.php?mib=tracking&lang=IN");
    
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

  public function show_option_kelurahan(){
    $id = $this->input->post("id");
    $data = $this->kl->find(array("id"=>$id),0,-1);
    $opt ="<option value=''>--pilih--</option>";
    foreach($data as $d){
      if(!empty($id) && $id==$d->id){
        $select_opt="selected='selected'";
      }else{
        $select_opt="";
      }
      $opt .="<option value='".$d->id."' ".$select_opt."> $d->nama</option>";
    }
    echo $opt;
  }

  public function show_option_kecamatan(){
    $id = $this->input->post("id");
    $kel = $this->kl->find_entity_by_id($id);
    $data = $this->kc->find(array("id"=>$kel->kecamatan_id),0,-1);
    $opt ="<option value=''>--pilih--</option>";
    foreach($data as $d){
      if(!empty($id) && $kel->kecamatan_id == $d->id){
        $select_opt="selected='selected'";
      }else{
        $select_opt="";
      }
      $opt .="<option value='".$d->id."' ".$select_opt."> $d->nama</option>";
    }
    echo $opt;
  }

  public function show_option_kota(){
    $id = $this->input->post("id");
    $kel = $this->kl->find_entity_by_id($id);
    $kec = $this->kc->find_entity_by_id($kel->kecamatan_id);
    $data = $this->k->find(array("id"=>$kec->kota_id),0,-1);
    $opt ="<option value=''>--pilih--</option>";
    foreach($data as $d){
      if(!empty($id) && $kec->kota_id == $d->id){
        $select_opt="selected='selected'";
      }else{
        $select_opt="";
      }
      $opt .="<option value='".$d->id."' ".$select_opt."> $d->nama</option>";
    }
    echo $opt;
  }

  public function show_option_prop(){
    $id = $this->input->post("id");
    $kel = $this->kl->find_entity_by_id($id);
    $kec = $this->kc->find_entity_by_id($kel->kecamatan_id);
    $kot = $this->k->find_entity_by_id($kec->kota_id);
    $data = $this->p->find(array("id"=>$kot->propinsi_id),0,-1);
    $prop =  $this->p->find(array(),0,-1);
    
    $opt ="<option value=''>--pilih--</option>";
    foreach($prop as $d){
      if(!empty($id) && $kot->propinsi_id == $d->id){
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
    $kota = $this->input->post("kota_id");
    $name_kota = $this->k->find_entity_by_id($kota);
    $where = "vendor_id = $id and nama like '%".$name_kota->nama."%' ";
    $this->db->where($where);
    $data = $this->db->get("tarif")->result();

    // $data = $this->t->find(array("vendor_id"=>$id),0,-1);
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