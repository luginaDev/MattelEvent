<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Oauth extends Frontend_Controller
{
    public function index(){
      //echo "<a href='".base_url('oauth/session')."' >log in via google account</a>";
     $this->load->view("oauth/index");
    }

    public function session($provider)
    {
      ob_start();
      $config_token = $this->config->item($provider);
      $provider = $this->oauth2->provider($provider,$config_token);
      if ( ! $this->input->get('code'))
      {
          // By sending no options it'll come back here
        $provider->authorize();
        redirect("/");
      }
      else
      {
        // Howzit?
        try
        {
            $token = $provider->access($_GET['code']);
            // $token = $provider->access($_POST['code']);

            $user = $provider->get_user_info($token);
            $this->session_login($token,$user);
            // Here you should use this information to A) look for a user B) help a new user sign up with existing data.
            // If you store it all in a cookie and redirect to a registration page this is crazy-simple.
            echo "<pre>Tokens: ";
            var_dump($token);

            echo "\n\nUser Info: ";
            var_dump($user);
            redirect("/");
            
        }

        catch (OAuth2_Exception $e)
        {
            show_error('That didnt work: '.$e);
        }

      }
    }


    public function session_login($token,$userinfo){
        $this->load->model("oauth/oauth_model");
        // print_r($userinfo);
        $data['email']=$userinfo["email"];
        $rows=$this->oauth_model->find($data);
          if(count($rows) > 0){
            $member = array("email" => $rows[0]->email, "nama" => $rows[0]->nama,'no_ktp' => $rows[0]->no_ktp,'alamat' => $rows[0]->alamat,'kelurahan_id' => $rows[0]->kelurahan_id);
            $this->update_cart($member);
          }else{
            $member = array(
              "no_ktp" => $userinfo["uid"],
              "nama" => $userinfo["name"],
              "alamat" => $userinfo["location"],
              "email" => $userinfo["email"],
              "status" => "aktif",
              "status_sso"   => "unregister"
              );
            if($this->oauth_model->save($member)){
               $this->update_cart($member); 
            }
          }
    }

    public function update_cart($member){
      foreach($this->cart->contents() as $item){
        $update_cart = array( "member_id" => $member["email"]);
        $this->db->where(array("detail_produk_id" => $item["id"],"session_rowid"=>$item["rowid"]));
        $result=$this->db->update("cart_temp",$update_cart);
      }
      $this->session->set_flashdata('success', ' Anda berhasil login');
      $this->session->set_userdata('member_login',$member["email"]);
      $this->session->set_userdata('member_name',$member["nama"]);
      $this->session->set_userdata('member_ktp',$member["no_ktp"]);
      $this->session->set_userdata('member_alamat',$member["alamat"]);
      $this->session->set_userdata('member_kelurahan_id',$member["kelurahan_id"]);
      $this->session->set_flashdata('message', 'Anda berhasil login');
      redirect("/");
    }
}