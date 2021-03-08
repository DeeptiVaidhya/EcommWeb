<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller{
    
    function __construct(){

        parent::__construct();
        $this->load->library('cart');
        $this->load->model('Home_model');
        $this->load->model('Category_model');
        $this->load->library('cart');
        $this->load->model('Home_model');
        $this->load->model('product');
        $this->load->model("Search_model");
        $this->load->library('paypal_lib');
        $this->session->set_userdata(array("userid"=>3));
        $this->load->library("pagination");
    }
     
    public function index(){
        
        //print_r($this->session->userdata);
        // $data['products'] = $this->Home_model->getRows();
        // $data['products'] = $this->Home_model->getHomeRows();
        // $data['arrival_products'] = $this->Home_model->getNreArrival();
        // $data['Categories'] = $this->Category_model->getCategory();
        // $data['arrival_products'] = $this->Home_model->getNreArrival();
        // $data['Stores'] = $this->product->getStoreValue();
        // $data['attribute_value'] = $this->Home_model->getAttributeValue();
        // $data['SubCategories'] = $this->Category_model->getSubCategory();
        
        $data['all_products'] = $this->Home_model->getHomeRows();
        $data['Categories'] = $this->Category_model->getCategory();
        $data['arrival_products'] = $this->Home_model->getNreArrival();
        $data['Stores'] = $this->product->getStoreValue();
        $data['attribute_value'] = $this->Home_model->getAttributeValue();
        $data['SubCategories'] = $this->Category_model->getSubCategory();
        $data['ChildSubCategories'] = $this->Category_model->getChildSubCategory();


       $this->load->view('common/header');

        $this->load->view('home', $data);     
      
        $this->load->view('common/footer');
    }
    
    function addToCart($proID,$size='',$color=''){
        $product = $this->Home_model->getRows($proID);
        $data = array(
            'id' => $product->id,
            'qty' => 1,
            'price' => $product->price,
            'name' => $product->name,
            'image' => $product->image,
            'size' =>$size,
            'color'=>$color
        );
        $this->cart->insert($data);
        // Redirect to the cart page
        redirect('cart');
    }
    
    function addCartByJquery(){
        $data = $this->input->post();
       $product = $this->Home_model->getRows($data['proID']);
        $data = array(
            'id' => $product->id,
            'qty' => $data['qty'],
            'price' => $product->price,
            'name' => $product->name,
            'image' => $product->image,
            'size' =>$data['size'],
            'color'=>$data['color']
        );
         $this->cart->insert($data);
        
        // Redirect to the cart page
         
    }
    
    
    
}
?>