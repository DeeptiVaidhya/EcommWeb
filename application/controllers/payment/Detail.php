<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Detail extends CI_Controller {
  function  __construct() {
    parent::__construct();
    $this->load->library('paypal_lib');
    $this->load->library('cart');
    $this->products='';
    $this->count = 1;
    $this->total_amount =0;
  }
	public function index(){
    if(!empty($this->session->userdata('user_id'))){
    $this->session->set_userdata('amount');
    $this->load->view('common/header');
    $this->load->view('paytm/details');
    $this->load->view('common/footer');
    }else {
    $id=$this->uri->segment(4);
      $this->data['amount']=$id;
      $this->session->set_userdata('amount',$id);
      $this->session->set_userdata('redirect','details');
      $this->load->view('common/header');
      $this->load->view('Logins');
      $this->load->view('common/footer');
    }
	}
	
	
	

	public function Payment(){
   		$this->form_validation->set_rules('first_name', 'First Name', 'required');
      $this->form_validation->set_rules('last_name', 'Last Name', 'required');
    //   $this->form_validation->set_rules('company_name', 'Company Name', 'required');
      $this->form_validation->set_rules('street1', 'Street ', 'required');
      $this->form_validation->set_rules('street2', 'Street', 'required');
      $this->form_validation->set_rules('city_name', 'City Name', 'required');
      $this->form_validation->set_rules('country', 'Country', 'required');
      $this->form_validation->set_rules('zip_code', 'Zip Code', 'required');
      $this->form_validation->set_rules('phone', 'Phone', 'required');
      $this->form_validation->set_rules('state_country', 'State Country', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required');
      if ($this->form_validation->run() == FALSE){
           $data['cartItems'] = $this->cart->contents();
        $this->load->view('common/header');
        $this->load->view('checkout',$data);
        $this->load->view('common/footer');
      }else{

        $datas=$this->input->post();
        $this->session->set_userdata('shipping',$datas);
        foreach($this->cart->contents() as $items){
          $this->total_amount += $items['price']*$items['qty'];
          //print_r($items);
          // if($this->count ==1){
          //   $this->products = $this->products .''.$items['id'];
          //   $this->count++;
          // }else {
          //   $this->products = $this->products .','.$items['id'];
          //   $this->count++;
          // }
        }
        // echo $this->total_amount;exit;
        // print_r($datas);exit;

 
        $address=$datas['street1'].''.$datas['street2'].''.$datas['city_name'].''.$datas['zip_code'].''.$datas['zip_code'].''.$datas['state_country'];
         $customer_name = $datas['first_name'].' '.$datas['last_name'] ;      
        $insert_data=array('user_id'=>$this->session->userdata('user_id'),'date_time'=>date("Y-m-d"),'customer_name'=>$customer_name,'customer_phone'=>
          $datas['phone'],'customer_address'=>$address,'paid_status'=>2,'net_amount'=>$this->total_amount);

         $session_data = array();

         if($this->db->insert('orders',$insert_data)){

          
          $id = $this->db->insert_id();
          $this->session->set_userdata('invoice_id',$id);
           foreach($this->cart->contents() as $items){
            
            $array_items = array('order_id'=>$id,'product_id'=>$items['id'],'qty'=>$items['qty'],'rate'=>$items['price'],'amount'=>$items['subtotal']);

             $this->db->insert('orders_item',$array_items);
           }
           
          $data['data']=$this->input->post();
           
          $this->session->set_flashdata('result','Record inserted successfully');
          $data['zipcode'] = $datas['zip_code'];
          $this->load->view('common/header');
          $this->load->view('payment_option',$data);
          $this->load->view('common/footer');
         }else {
          $data['data']=$this->input->post();
          $this->session->set_flashdata('result','Unable to insert');
          $this->load->view('common/header');
          $this->load->view('payment_option');
          $this->load->view('common/footer');
        }
      }
	}


  public function PaymentOption(){
    $this->load->view('common/header');
    $this->load->view('payment_option');
    $this->load->view('common/footer');
  }




  // public function paymenttesting(){
  //   $this->load->view('paypal/success');
  // }

  public function submitpayment(){  
    $tatal_quantity=0;
    $total_price=0;
    foreach($this->cart->contents() as $items){
      $tatal_quantity=$tatal_quantity+$items['qty'];
      $total_price=$total_price+$items['price'];
    }
    $returnURL = base_url().'paypal/success'; //payment success url
    $cancelURL = base_url().'paypal/cancel'; //payment cancel url
    $notifyURL = base_url().'paypal/ipn'; //ipn url
    $userID = $this->session->userdata('user_id'); //current user id
    $logo = base_url().'assets/images/1-02.png';
    $this->paypal_lib->add_field('return', $returnURL);
    $this->paypal_lib->add_field('cancel_return', $cancelURL);
    $this->paypal_lib->add_field('notify_url', $notifyURL);
    $this->paypal_lib->add_field('item_name', 'fgdfgsdg');
    $this->paypal_lib->add_field('custom', $userID);
    $this->paypal_lib->add_field('item_number',$tatal_quantity );
    $this->paypal_lib->add_field('amount',  $this->session->userdata('amount'));        
    $this->paypal_lib->image($logo);
    $this->paypal_lib->paypal_auto_form();
  }
}