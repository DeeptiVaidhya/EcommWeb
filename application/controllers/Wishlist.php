<?php
defined('BASEPATH') OR exit('No direct script accesss allowed');

class Wishlist extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        
        //load cart library 
        $this->load->library('cart');
        $this->load->library('paypal_lib');
        $this->load->library('session');
        //load home model
        $this->load->model('Home_model');
    }
    
    function index()
    {
        $data = array();
        
        //retrieve cart data from the session 
        //$data['wishlistItems'] = $this->cart->contents();
        
        
        if(!empty($this->session->userdata('user_id'))){
        $user_id = $this->session->userdata('user_id');
        }
        else {
            $user_id=0;
        }
         
         $data['wishlistItems'] = $this->Home_model->getWishlist($user_id);
        
        //load the cart view
        $this->load->view('common/header');
        $this->load->view('wishlist', $data);
        $this->load->view('common/footer');
        
        
    }
    
    function updateItemQty()
    {

        $update = 0;
        
        //get cart item info
        $rowid = $this->input->get('rowid');
        $qty   = $this->input->get('qty');
        
        //update item in the cart
        if (!empty($rowid) && !empty($qty)) {
            $data = array(
                'rowid' => $rowid,
                'qty' => $qty
            );
            
            $update = $this->cart->update($data);
        }
        
        //return response
        echo $update ? 'ok' : 'err';
    }

    function addTowishlist($proID){
        // Fetch specific product by ID
        $product = $this->Home_model->getRows($proID);
        $product_id = $product->id;
        $user_id = $this->session->userdata('user_id');
        if($user_id){
            $this->Home_model->addToWishList($user_id,$product_id);
            redirect('wishlist/');
        }else{
            redirect('login');
        }
    }
    
    function removeItem($id){
        $product_id = $id;
        if($this->Home_model->remove_single_product($product_id)){
        $data['wishlistItems']=$this->Home_model->getWishlist($this->session->userdata('user_id'));
            $this->load->view('common/header');
            $this->load->view('wishlist', $data);
            $this->load->view('common/footer');
        }else {
         $data['wishlistItems']=$this->Home_model->getWishlist($this->session->userdata('user_id'));
            $this->load->view('common/header');
            $this->load->view('wishlist', $data);
            $this->load->view('common/footer');
        }
    }
}
?>