<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

  public function __construct(){
 
    parent::__construct();
    $this->load->helper('url');
    // Load model
    $this->load->model('Search_model');
      $this->load->model('Category_model');
        $this->load->model('Home_model');
        $this->load->model('Product_model');
  }

  public function index(){

  }

    public function skeyword(){
    $key = $this->input->post('name');
    $data['products'] = $this->Post_m->search($key);


    $this->load->view('common/header');
    $this->load->view('skeyview', $data);
    $this->load->view('common/footer');

  }

   /* Search bar*/
    function searchBycategory(){
        //$data = array();
        $id =  $this->uri->segment(3);
        $data['products'] = $this->Category_model->getProductByCategory($id);
        $data['Categories'] = $this->Category_model->getCategory();
        $data['arrival_products'] = $this->Home_model->getNreArrival();
        $data['Stores'] = $this->product->getStoreValue();
        $data['attribute_value'] = $this->Home_model->getAttributeValue();

        
     
       $this->load->view('common/header');

        $this->load->view('skeyview', $data);     
      
        $this->load->view('common/footer');
           
    }


     public function Single_Product($id){
       $data = array();
        $data['s_products'] = $this->Home_model->getProductDetail($id);
       $this->load->view('common/header');
        $this->load->view('single_product', $data);
        $this->load->view('common/footer');
    }
    

}