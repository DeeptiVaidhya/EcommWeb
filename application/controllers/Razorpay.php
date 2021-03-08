<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @package Razorpay :  CodeIgniter Razorpay Gateway
 *
 * @author TechArise Team
 *
 * @email  info@techarise.com
 *   
 * Description of Razorpay Controller
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Razorpay extends CI_Controller {
    // construct
    public function __construct() {
        parent::__construct();   
        $this->load->model('Home_model');
        $this->load->library('cart');   
    }
    
    public function success() {
        $this->session->set_userdata('transaction_id', $this->input->post('razorpay_payment_id'));
        $transaction_id = $this->session->userdata('transaction_id');
        $invoice_id = $this->session->userdata('invoice_id');
        $update_array = array('bill_no'=>$transaction_id,'paid_status'=>1);
        $this->db->where('id',$invoice_id);
        $this->db->update('orders', $update_array);
        
        $data['itemInfo'] = $this->session->userdata(); 
        $this->load->view('common/header');
        $this->load->view('razorpay/success', $data);        
        $this->load->view('common/footer');
        
    }  
    public function failed() {
        $data['title'] = 'Razorpay Failed | TechArise';            
        $this->load->view('razorpay/failed', $data);
    } 
}
?>