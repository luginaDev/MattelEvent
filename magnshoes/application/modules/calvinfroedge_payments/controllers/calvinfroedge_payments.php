<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calvinfroedge_payments extends Frontend_Controller
{
    public function index(){
      //echo "<a href='".base_url('oauth/session')."' >log in via google account</a>";
    	// $config = Payment_Utility::load('config', '/path/to/your/gateway/config'); 
		$params = array('cc_number' => 4111111111111111, 'amt' => 35.00, 'cc_exp' => '022016', 'cc_code' => '203');
		$response = $this->payments->payment_action('paypal_paymentspro', $params); 
		print_r($response);
     $this->load->view("calvinfroedge_payments/index");

    }


}
