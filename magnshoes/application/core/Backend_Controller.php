<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Backend_Controller extends MX_Controller{
  
  function __construct()
  {
     parent::__construct();
     $this->template->set_theme('blackwhite');
     $this->load->model('backend/user');
     $this->load->model("sells/sell_model");
     $this->load->model("returns/return_model");
     $this->load->model("groups/group_model");
     $this->check_login();

  }

  private function authorizer(){
    $logged = $this->session->userdata('user_login');
    $data = $this->user->find_entity_by("email",$logged);
    $roles = $this->config->item('roles');
    $controller_active = $this->uri->segment(1);
    $group = $this->cek_group($data->group_id);
    if(empty($group)){
        $this->session->set_flashdata('error', 'anda tidak memiliki akses Kesistem');
        redirect("login_backend");
    }else{
      if(array_key_exists($group,$roles)){
        if(in_array($controller_active,array_values($roles[$group]))){

        }else{
          $this->session->set_flashdata('error', 'Anda Tidak memiliki akses ke dalam sistem');
          redirect("login_backend");
        }
      }elseif($group=="superadmin"){

      }else{
        $this->session->set_flashdata('error', 'acount group anda belum terdaftar disistem');
        redirect("login_backend");
      }
    }
  }

  public function authority_menu($controller_name){
    echo "$controller_name";
  }

  private function cek_group($group_id){
    $this->load->model('groups/group_model','g');
    return $this->g->find_entity_by_id($group_id)->nama;
  }

  private function cek_email($email){
    if(!empty($email)){
      $where['email']=$this->encode($email);
      $rows=$this->user->find($where);
      if(count($rows)>0){
        $data=true;
      }else{
        $data=false;
      }
    }else{
      $data=false;
    }
    return $data;
  }

  private function check_login(){
    $logged=$this->session->userdata('user_login');
     $segment=$this->uri->segment(2);
     if(empty($logged) && ($this->cek_email($logged))==false){
        $this->session->set_flashdata('error', 'Anda Tidak Memiliki Akses / Silakan Login Terlebih Dahulu');
      redirect("login_backend");
     }else{
       // $this->template
       //      ->set_partial("top_menu","backend/partials/_top_menu")
       //      ->set_partial("left_menu","backend/partials/_left_menu");
       $this->menu();
       $this->authorizer();
     }
  }

  public function encode($pass){
    $salt=$this->config->item('encryption_key');
     if (!empty($salt) ||!empty($pass) ){
          $data = md5($pass."".$salt);
      }
      return $data;
  }


  public function encode_active($email){
    $salt=$this->config->item('encryption_key');
     if (!empty($salt) ||!empty($email) ){
          $data = base64_encode($email."|pisah|".$salt);
      }
      return $data;
  }

  private function restrict(){
    redirect("backend/login_admin");
  }


  public function menu(){
   $rows["partials_data"] = $this->check_notification();
   //echo "<pre>"; print_r($rows);
   $this->template
            ->set_partial("top_menu","backend/partials/_top_menu",$rows)
            ->set_partial("left_menu","backend/partials/_left_menu",$rows)
            ->set_partial("error_message","backend/partials/_error_message")
        ;

  }

  public function check_notification(){
    //echo"<h1> masuk sini </h1>";
    $data["nav_val"] = $this->uri->segment(1);
    $data["nav_val3"] = $this->uri->segment(3);
    $status_pembayaran = $this->sell_model->find(array("status_pembayaran" => "blom"));
    $data["count_sp"]=count($status_pembayaran);
    $status_retur = $this->db->query("SELECT * FROM `detail_retur` WHERE `status` IN ('baru', 'cofirm') GROUP BY `retur_pembelian_id` ");
    $data["count_retur"]=count($status_retur);
    $data["logged"] = $this->session->userdata('user_login');
    $data["user"] = $this->user->find_entity_by("email",$data["logged"]);
    $data["group"] = $this->group_model->find_entity_by_id($data["user"]->group_id)->nama;
    $data["roles"] = $this->config->item("roles");
   return $data;
  }

}
