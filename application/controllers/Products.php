<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller{
  function __construct(){
      header('Access-Control-Allow-Origin: *');
    parent::__construct();
    $this->load->library('cart');
    $this->load->model('Category_model');
    $this->load->model('Home_model');
    $this->load->model('product');
    $this->load->model("Search_model");
    $this->load->library('paypal_lib');
    $this->session->set_userdata(array("userid"=>3));
     $this->load->library("pagination");
  }
  // Update rating

  public function updateRating(){
    $userid = $this->session->userdata('userid');
    $postid = $this->input->post('postid');
    $rating = $this->input->post('rating');
    $averageRating = $this->product->userRating($userid,$postid,$rating);
    echo $averageRating;
  }

  public function changeCurrency(){
    $currency = $this->input->post('currency');
    
    $this->session->set_userdata('currency',$currency);
    
  }

  public function getSelectedCurrency(){
     $currency_option =  array('₹'=>'INR','£'=>'POUND','$'=>'USD','€'=>'EURO','A$'=>'AUD','¥'=>'JPY','C$'=>'CAD','NZ$'=>'NZD');

     $session_data = $this->session->userdata('currency');
     if(!empty($session_data)){
        echo $currency_option[$session_data];
     }
     else {
         echo $currency_option['₹'];
     }
  }

  public function searchBycategory(){
    $id =  $this->uri->segment(3);
    
    $config["base_url"] = base_url() . "Products/searchBycategory/$id";
    $config["total_rows"] = $this->Category_model->getProductByCategory_count($id);
    $config["per_page"] = 6;
    $config["uri_segment"] = 4;

    $this->pagination->initialize($config);

    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    $data = array();
    
    $data["links"] = $this->pagination->create_links();
    $data['all_products'] = $this->Category_model->getProductByCategory($id,$config["per_page"], $page);
    
    $data['Categories'] = $this->Category_model->getCategory();
    $data['arrival_products'] = $this->Home_model->getNreArrival();
    $data['Stores'] = $this->product->getStoreValue();
    $data['attribute_value'] = $this->Home_model->getAttributeValue();
    $data['SubCategories'] = $this->Category_model->getSubCategory();
    $this->load->view('common/header');
    $this->load->view('allproducts', $data); 
    $this->load->view('common/footer');
  }

  public function rating_filter(){
    $id=$this->uri->segment(3);
    $this->db->select('products.*,product_review.*');
    $this->db->from('products');
    $this->db->join('product_review', 'product_review.product_id = products.product_id');
    $query = $this->db->where(array('product_review.rating'=>$id));
    $result = $query->get()->result_array();
    $data['products'] = $result;
    $data['Categories'] = $this->Category_model->getCatogory();
    $data['SubCategories'] = $this->Category_model->getSubCategory();
    $this->load->view('common/header');
    $this->load->view('allproducts',$data);
    $this->load->view('common/footer');
  }
        
  public function product_review(){
    $data=$this->input->post();
    if(!empty($this->session->userdata('user_id'))){
    if($this->product->review($data)){
      echo 'Review Addedd';
    }else {
      echo 'Review Updated';
    }
    }
    else {
      echo 'Login first for review';
    }
  }

  
	public function Single_Product($id){
		$data = array();
		$data['s_products'] = $this->Home_model->getProductDetail($id);
		$data['arrival_products'] = $this->Home_model->getNreArrival();
		$data['reviews'] =  $this->product->getReviews($id);
		$this->load->view('common/header');
		$this->load->view('single_product', $data);
		$this->load->view('common/footer');
	}
	
	
  /*  Show All prodcuts*/
	public function allProducts() {
		if(!empty($this->input->get('s')) && !empty($this->input->get('e'))){
			$starting = $this->input->get('s');
			$ending = $this->input->get('e');
			$data = array();
			$config = array();
			$config["base_url"] = base_url() . "Products/allProducts/?s=".$starting."&e=".$ending."/";
			$config["total_rows"] = $this->Home_model->record_count(0,0,0,0,$starting,$ending);
			$config["per_page"] = 6;
			$config["uri_segment"] = 3;
			// $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
			// echo $actual_link;exit;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['all_products'] = $this->Home_model->getAllProducts($starting,$ending);
			$data['SubCategories'] = $this->Category_model->getSubCategory();
			$data['arrival_products'] = $this->Home_model->getNreArrival();
			$data['Categories'] = $this->Category_model->getCategory();
			$data['Stores'] = $this->product->getStoreValue();
			$this->load->view('common/header');
			$this->load->view('allproducts' , $data);
			$this->load->view('common/footer');
		}

		else {
			$config = array();
			$config["base_url"] = base_url() . "Products/allProducts/";
			$config["total_rows"] = $this->Home_model->record_count();
			$config["per_page"] = 6;
			$config["uri_segment"] = 3;

			$this->pagination->initialize($config);

			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data = array();
			$data['all_products'] = $this->Home_model->getAllProducts(0,0,$config["per_page"], $page);
			$data['Categories'] = $this->Category_model->getCategory();
			$data['SubCategories'] = $this->Category_model->getSubCategory();
			$data["links"] = $this->pagination->create_links();

			$data['arrival_products'] = $this->Home_model->getNreArrival();
			$data['attribute_value'] = $this->Home_model->getAttributeValue();
			$data['Stores'] = $this->product->getStoreValue();

			$this->load->view('common/header');
			$this->load->view('allproducts' , $data);
			$this->load->view('common/footer');
		}
	}



  public function FilterBySubcategory()
  {
    $sub_category_id = $this->uri->segment(3);
    $config = array();
    $config["base_url"] = base_url() . "Products/FilterBySubcategory/$sub_category_id/";
    $config["total_rows"] = $this->Home_model->record_count($sub_category_id);
    $config["per_page"] = 6;
    $config["uri_segment"] = 4;

    $this->pagination->initialize($config);

    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

    $data = array();
    $data['all_products'] = $this->Home_model->getProductFilterBySubCategory($config["per_page"], $page,$sub_category_id);
    // echo '<pre>';
    // print_r($data['all_products']);exit;

    $data['Categories'] = $this->Category_model->getCategory();
    $data['SubCategories'] = $this->Category_model->getSubCategory();
    $data["links"] = $this->pagination->create_links();

    $data['arrival_products'] = $this->Home_model->getNreArrival();
    $data['attribute_value'] = $this->Home_model->getAttributeValue();
    $data['Stores'] = $this->product->getStoreValue();
       $data['ChildSubCategories'] = $this->Category_model->getChildSubCategory();
    $this->load->view('common/header');
    $this->load->view('allproducts' , $data);
    $this->load->view('common/footer');
  }

    /* single product quanity update */
public function updateItemQty() {
	$update = 0;        
	$rowid = $this->input->get('rowid');
	$qty   = $this->input->get('qty');
	if (!empty($rowid) && !empty($qty)) {
		$data = array(
		'rowid' => $rowid,
		'qty' => $qty
		);
		$update = $this->cart->update($data);
	}
	echo $update ? 'ok' : 'err';
}
    
    /*Search filter */
  public function skeyword() 
  {
    $key = $this->input->post('title');
    $config["base_url"] = base_url() . "Products/skeyword/";
    $config["total_rows"] = $this->Home_model->record_count(0,0,0,$key);
    $config["per_page"] = 6;
    $config["uri_segment"] = 3;

    $this->pagination->initialize($config);

    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data["links"] = $this->pagination->create_links();
    $data['products'] = $this->Search_model->search($key,$config["per_page"],$page);
    $data['Categories'] = $this->Category_model->getCategory();
    $data['attribute_value'] = $this->Home_model->getAttributeValue();
    $data['Stores']=$this->product->getStoreValue();
    $data['SubCategories'] = $this->Category_model->getSubCategory();


    $this->load->view('common/header');
    $this->load->view('skeyview', $data);
    $this->load->view('common/footer');

  }

    /* sorting high low product*/
  public function sorting(){
    $value=$this->uri->segment(3);
    if($value==1){
    	
      $data['all_products']= $this->product->sortings($value,$config["per_page"],$page);
      $data['Stores']=$this->product->getStoreValue();
      $data['attribute_value'] = $this->Home_model->getAttributeValue();
      $data['SubCategories'] = $this->Category_model->getSubCategory();
      $data['Categories'] = $this->product->getCatogory();
     

      $this->load->view('common/header');
      $this->load->view('allproducts',$data);
      $this->load->view('common/footer');
    }else {
    	$config = array();
        $config["base_url"] = base_url() . "Products/sorting/$value/";
        $config["total_rows"] = $this->Home_model->record_count(0,$value);
        $config["per_page"] = 6;
        $config["uri_segment"] = 4;
         
        $this->pagination->initialize($config);
        
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
      $data['Stores']=$this->product->getStoreValue();
      $data['Categories'] = $this->product->getCatogory();
      $data['all_products']= $this->product->sortings($value,$config["per_page"],$page);
      $data['attribute_value'] = $this->Home_model->getAttributeValue();
      $data['SubCategories'] = $this->Category_model->getSubCategory();
       $data["links"] = $this->pagination->create_links();

      $this->load->view('common/header');
      $this->load->view('allproducts',$data);
      $this->load->view('common/footer');
    }

    }

    /* size product*/
    public function productsize(){
        
        $value=$this->uri->segment(3);
        $config = array();
        $config["base_url"] = base_url() . "Products/productsize/$value/";
        $config["total_rows"] = $this->Home_model->record_count(0,0,$value);
        $config["per_page"] = 6;
        $config["uri_segment"] = 4;
         
        $this->pagination->initialize($config);
        
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['all_products']= $this->product->productsizing($value, $config["per_page"],$page);
        $data['Stores']=$this->product->getStoreValue();
        $data['attribute_value'] = $this->Home_model->getAttributeValue();
        $data['SubCategories'] = $this->Category_model->getSubCategory();
        $data["links"] = $this->pagination->create_links();


        //$data['products']=$this->product->sortings($value);
        $data['Categories'] = $this->product->getCatogory();
        $this->load->view('common/header');
        $this->load->view('allproducts',$data);
        $this->load->view('common/footer');
    }

    public function productstore() {
      $value=$this->uri->segment(3);
      $data['all_products']= $this->product->productsizing($value);         
      $data['Stores']= $this->product->getStoreValue();
      $data['Categories'] = $this->product->getCatogory();
      $data['attribute_value'] = $this->Home_model->getAttributeValue();
      $data['SubCategories'] = $this->Category_model->getSubCategory();

      $this->load->view('common/header');
      $this->load->view('allproducts',$data);
      $this->load->view('common/footer');
    }

  public function fetch(){
    echo $this->product->html_output();
  }

  public function insert(){
    if($this->input->post('business_id')){
     $data = array(
      'business_id'  => $this->input->post('business_id'),
      'rating'   => $this->input->post('index')
     );
     $this->product->insert_rating($data);
    }
  }
}
?>