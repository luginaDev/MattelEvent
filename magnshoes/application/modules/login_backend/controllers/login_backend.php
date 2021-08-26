<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Login_backend extends MX_Controller
{

  function __construct()
  {
    $this->load->model('backend/user','u');
  }
  public function index(){
     $this->template
      ->set_theme('blackwhite')
      ->set_layout('login')
      ->title('Halaman Administrator')
      ->build('login_backend/login');
  }

  public function login(){
   if((!$this->input->post('email') =='') && (!$this->input->post('password')=='') ){
      $data['email']=$this->input->post('email');
      $data['password']=$this->encode($this->input->post('password'));
      $rows=$this->u->find($data);
      if(count($rows) > 0){
        $this->session->set_flashdata('success', ' Anda berhasil login');
        $this->session->set_userdata('user_login',$rows[0]->email);
        $this->session->set_userdata('name',$rows[0]->username);
        redirect('backend/dashboard');
      }else{
        $this->session->set_flashdata('error', 'Email / Password anda salah silakan ulangi kembali ');
        $this->index();
      }
    }else{
        $this->session->set_flashdata('error', 'Email / Password anda salah silakan ulangi kembali ');
        $this->index();
    }
  }
  
  public function logout(){
    $this->session->sess_destroy();
    redirect('backend/');
  }

  private function encode($pass){
    $salt=$this->config->item('encryption_key');
     if (!empty($salt) ||!empty($pass) ){
          $data = md5($pass."".$salt);
      }
      return $data;
  }

}