<?php
include("securearea.php");
include("crypto.php");
class Request extends CI_Controller{
	function __construct(){
	parent::__construct();
		$this->load->helper("url");	
		$this->load->helper('string');
		$this->load->model('Home_model');			
		$this->load->library('session');
	}
    public function sendRequest(){
   		$this->load->view("request_view");
   	}
   
    public function getResponse(){
   		$this->load->view("response_view");
   	}

   	public function sendRozarPay(){
   		$data['itemInfo'] = $this->cart->contents();
      $this->load->view('common/header');
      $this->load->view('allproducts' , $data);
   		$this->load->view("razorpay/index");
      $this->load->view('common/footer');
   	}
}
?>
