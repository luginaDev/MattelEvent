<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Members extends Backend_Controller {
  function __construct()
    {
        parent::__construct();
        $this->load->model("members/member_model","m");
        $this->load->model("agama/agama_model","a");
        $this->load->model("kota/kota_model","k");
        $this->load->model("propinsi/propinsi_model","p");
        $this->load->model("kecamatan/kecamatan_model","kc");
        $this->load->model("kelurahan/kelurahan_model","kl");
    }

    public function delete($id){
      if(!empty($id)){
        if($this->m->destroy(array("id" => $id))){
          $this->session->set_flashdata('success', 'Data member berhasil Dihapus');
        }else{
          $this->session->set_flashdata('error', 'Data member Gagal Dihapus');
        }
        redirect("members");
      }
      redirect("members");
    }
    
    public function index(){
      $data =array(
        0 => $this->m->find(array(),0,-1),
        "kota" => $this->k->find(array(),0,-1), 
        "prop" => $this->p->find(array(),0,-1),
        "kec" => $this->kc->find(array(),0,-1), 
        "agama" => $this->a->find(array(),0,-1) 
        // 1 => $this->p->find(array(),0,-1)
        );
      
      $this->template
        ->title('Halaman Administrator | member ')
        ->set("title_form" ,"member")
        ->set("data",$data)
        ->build('members/index');
    }

    public function save(){
      $data = $this->input->post();
      if(!empty($data)){
        $data["aktivasi_key"] = $this->encode_active($data["email"]);
        // $data["status"] = "new";

        $member = array(
          "no_ktp" => $data["no_ktp"],
          "nama" => $data["nama"],
          "agama_id" => $data["agama_id"],
          "telp" => $data["telp"],
          "alamat" => $data["alamat"],
          "kelurahan_id" => $data["kelurahan_id"],
          "email" => $data["email"],
          "password" => $this->encode($data["password"]),
          "aktivasi_key" => $data["aktivasi_key"],
          "status" => $data["status"]

          );
        if($this->m->save($member)){
          $this->session->set_flashdata('success', 'Data member berhasil ditambahkan');
        }else{
          $this->session->set_flashdata('error', 'Data member Gagagl ditambahkan');
        }  
        redirect("members");
      }else{
        redirect("members");
      }
    }
}