<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        
        // Load form library & helper
        $this->load->library('form_validation');
        $this->load->helper('form');
        
     //load cart library 
        $this->load->library('cart');
        $this->load->library('paypal_lib');
        // Load product model
        $this->load->model('Home_model');
        
        $this->controller = 'checkout';
    }
    
    function index()
    {
        if(!$this->session->userdata('user_id')){
          redirect('login');
        }
        else
        {
        $this->load->view('common/header');        
        
        if ($this->cart->total_items() <= 0) 
        {
            redirect('/');
        }   

        $submit = $this->input->post('placeOrder');   
        $data['cartItems'] = $this->cart->contents();        
        $this->load->view('checkout', $data);
        $this->load->view('common/footer');
        }
    }
    
    function placeOrder($custID)
    {
        // Insert order data
          $ordData= array(
            'customer_id' => $custID,
            'grand_total' => $this->cart->total()
        );
        //if($this->Home_Model->insertOrderItems($ordData)){

        // $insertOrder = $this->Home_model->insertOrderItems($ordData);
        //}
        if ($this->Home_Model->insertOrderItems($ordData)) {
            // Retrieve cart data from the session
            $cartItems = $this->cart->contents();
            
            // Cart items
            $ordItemData = array();
            $i           = 0;
            foreach ($cartItems as $item) {
                $ordItemData[$i]['order_id']   = $insertOrder;
                $ordItemData[$i]['product_id'] = $item['id'];
                $ordItemData[$i]['quantity']   = $item['qty'];
                $ordItemData[$i]['sub_total']  = $item["subtotal"];
                $i++;
            }            
            if (!empty($ordItemData)) {
                // Insert order items
                $insertOrderItems = $this->Home_model->insertOrderItems($ordItemData);
                
                if ($insertOrderItems) {
                    // Remove items from the cart
                    $this->cart->destroy();
                    
                    // Return order ID
                    return $insertOrder;
                }                
            }
        }
        return false;
    }
      function buy($id)
    {
        // Set variables for paypal form
        $returnURL = base_url() . 'paypal/success';
        $cancelURL = base_url() . 'paypal/cancel';
        $notifyURL = base_url() . 'paypal/ipn';
        
        // Get product data from the database
        $product = $this->Home_model->getRows($id);
        
        // Get current user ID from the session
        // $userID = $_SESSION['userID'];
        
        // Add fields to paypal form
        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name', $product['name']);
        //$this->paypal_lib->add_field('custom', $userID);
        $this->paypal_lib->add_field('item_number', $product['id']);
        $this->paypal_lib->add_field('amount', $product['price']);
        
        // Render paypal form
        $this->paypal_lib->paypal_auto_form();
         
    }
    
    
    function orderSuccess($ordID)
    {
        // Fetch order data from the database
        $data['order'] = $this->Home_model->getOrder($ordID);

        
        // Load order details view
        $this->load->view('common/header');
        $this->load->view('order_success', $data);
        $this->load->view('common/footer');
        
    }
    function  orderSuccessPayment($ordID)
    {
        // Fetch order data from the database
        $data['order'] = $this->Home_model->getOrder($ordID);         
        // Load order details view
        $this->load->view('common/header');
        $this->load->view('paymentmode', $data);
        $this->load->view('common/footer');
        
    }
    
}
?>