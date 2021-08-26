<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends Backend_Controller {
  function __construct()
    {
        parent::__construct();
        $this->load->model("users/user_model","u");
        $this->load->model("groups/group_model","g");
    }

    public function delete($id){
      if(!empty($id)){
        if($this->u->destroy(array("id"=>$id))){
          $this->session->set_flashdata('success', 'Data Group berhasil Dihapus');
        }else{
          $this->session->set_flashdata('error', 'Data Group Gagal Dihapus');
        }
        redirect("users");
      }
      redirect("users");
    }

    public function index(){
      $groups[] = $this->g->find(array(),0,-1); 
      $alias ="a";
      $select = "a.id,a.username, a.email, b.nama ,b.status,a.group_id";
      $where = array("b.status !=" => "99");
      $table_join = array('groups b' => 'b.id = a.group_id');
      $data[] = $this->u->find_by_join($alias,$select,$where,$table_join);
      $this->template
        ->title('Halaman Administrator | Users')
        ->set("title_form","Users")
        ->set("data",$data)
        ->set("groups",$groups)
        ->build('users/index');
    }

    public function save(){
      $data = $this->input->post();
      $data["password"] = $this->encode($data["password"]);
      if(!empty($data)){
        if($this->u->save_or_update($data)){
          $this->session->set_flashdata('success', 'Data Users Berhasil diperbaharui/ditambahkan');
        }else{
          $this->session->set_flashdata('error', 'Data Users Gagal diperbaharui/ditambahkan');
        }
        redirect("users");
      }
      redirect("users");
    }



}
?>