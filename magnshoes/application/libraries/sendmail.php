<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sendmail{

  public function send($data){
    $config = Array(
      'protocol' => "smtp",
      'smtp_host' => "ssl://smtp.googlemail.com",
      'smtp_port' => 465,
      'smtp_user' => "magnshoes@gmail.com",
      'smtp_pass' => "notforsale123A",
      'mailtype' => "html",
      'charset' => "iso-8859-1",
      'wordwrap' => TRUE
    );


    $CI =& get_instance();
    $CI->load->library('email', $config);
    $CI->email->set_newline("\r\n");
    $CI->email->from($data["from"]); // change it to yours
    $CI->email->to($data["to"]); // change it to yours
    $CI->email->subject($data["subject"]);
    $CI->email->message($data["message"]);

    if($CI->email->send()){
      $confirm =  'Email sent.';
    }else{
      $confirm = show_error($CI->email->print_debugger());
    }

    return $confirm;
  }
}
