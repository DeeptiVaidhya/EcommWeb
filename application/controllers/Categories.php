<?php
defined('BASEPATH') OR exit('No direct script accesss allowed');

class Cart extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        
        //load cart library 
        $this->load->library('cart');
        
        //load product model
        $this->load->model('product');
    }
    
    public function index()
    {
        $data['productsbycategory'] = $this->Categories_model->NestedProducts();
        $this->load->view('categories', $data);
    }
    
}

?>