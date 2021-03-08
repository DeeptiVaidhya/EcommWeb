<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Model{
    
    function __construct() {
        $this->proTable = 'products';
        $this->custTable = 'customers';
        $this->ordTable = 'orders';
        $this->ordItemsTable = 'order_items';
    }
    
    /*
     * Fetch products data from the database
     * @param id returns a single record if specified, otherwise all records
     */

        public function get($id = ''){
        $this->db->select('*');
        $this->db->from($this->proTable);
        //$this->db->where('status', '1');
        if($id){
            $this->db->where('product_id', $id);
            $query  = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('product_name', 'asc');
            $query  = $this->db->get();
            $result = $query->result_array();
        }
        
        // return fetched data
        return !empty($result)?$result:false;
    }
   


      public function getRow($id = ''){
        $this->db->select('*');
        $this->db->from($this->proTable);
        // $this->db->where('status', '1');
        if($id){
            $this->db->where('product_id', $id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('product_name', 'asc');

            $query = $this->db->get();
            $result = $query->result_array();
        }
        
        // Return fetched data
        return !empty($result)?$result:false;
    }

    public function getRating($id){
      $this->db->select('one_rating,two_rating,three_rating,four_rating,five_rating');
      $this->db->from('product_rating');
      $this->db->where('product_id',$id);
       $query = $this->db->get();
        $result = $query->result_array();
     //           $result = $query->result_array();
     // $this->db->select('rating_times,total_rating');
     //    $this->db->from($this->proTable);
     //    if($id){
     //        $this->db->where('product_id',$id);
     //         $query = $this->db->get();
     //           $result = $query->result_array();
              

     //    }
      
         return !empty($result)?$result:false;

    }

 
   public function search($search){
       $this->db->select('*');
        $this->db->from($this->proTable);
         if($search){
            $query = $this->db->like('product_name', $search);
             $this->db->or_like('product_description', $search);
              $this->db->or_like('product_pincode', $search);
              $query = $this->db->get();
               $result = $query->result_array();
        }
        return !empty($result)?$result:false;

   }

   public function sortings($sort,$limit=0,$start=0){
        $this->db->select('*');
        $this->db->from($this->proTable);


         if($sort==3){
            if(!empty($limit) && !empty($start)){

             $this->db->limit($limit, $start);
            }
            else {

                $this->db->limit(6); 
            }
              $query = $this->db->order_by('price','asc');
              $query = $this->db->get();
              
               $result = $query->result_array();


        }
        else if($sort == 4){
            if(!empty($limit) && !empty($start)){

             $this->db->limit($limit, $start);
            }
            else {

                $this->db->limit(6); 
            }
            $query = $this->db->order_by('price','desc');
              $query = $this->db->get();
               $result = $query->result_array();
        }
         
           
        return !empty($result)?$result:false;
   }


   public function productsizing($id,$limit=0,$start=0){
        $this->db->select('*');
        $this->db->from($this->proTable);
        if(!empty($limit) && !empty($start)){

             $this->db->limit($limit, $start);
            }
            else {
                $this->db->limit(6);
            }
        $this->db->like('attribute_value_id', $id);
        $query  = $this->db->get();
        $result = $query->result_array();
        

        return !empty($result) ? $result : false;

   }

      
    public function getStoreValue() {
        $this->db->select('*');
        $this->db->from('stores');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

      public function productstore(){
        $value=$this->uri->segment(3);
        $this->db->select('*');
        $this->db->from($this->proTable);
        $this->db->like('store_id', $value);
        $query  = $this->db->get();
        $result = $query->result_array();

        return !empty($result) ? $result : false;

   }

   public function review($data){
    if(!empty($this->session->userdata('user_id'))){
    $insert_data=array('product_id'=>$data['product_id'],'user_id'=>$this->session->userdata('user_id'),'rating'=>$data['rating_value'],'comment'=>$data['comment'],'approved'=>1);
    $this->db->select('*');
    $this->db->from('product_review');
    $update_condition=array('user_id'=>$insert_data['user_id'],'product_id'=>$insert_data['product_id']);
    $this->db->where($update_condition);
    $query=$this->db->get()->result_array();
    if(empty(count($query))){
        if($this->db->insert('product_review',$insert_data)){
        return true;    
    }else {
        return false;
    }
    }else {
        $update_condition=array('user_id'=>$insert_data['user_id'],'product_id'=>$insert_data['product_id'],'approved'=>1);
        $this->db->where($update_condition);
        $this->db->update('product_review',$insert_data);
    }
    //rating_valuerating_valuecomment
   }
}

public function getReviews($id){
    $this->db->select('*');
    $this->db->from('product_review');

    if($id){
      $this->db->where('product_id',$id);
      $query = $this->db->get();
      $result = $query->result_array();
    
    }

        return !empty($result)?$result:false;
}


    public function getCatogory(){
        $this->db->select('*');
        $this->db->from('categories');
        //echo $this->db->last_query();die("Asdasd");
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function sortByPincode($pincode){
         $this->db->select('*');
        $this->db->from($this->proTable);
        $this->db->where('product_pincode',$pincode);
        $query= $this->db->get();
            $result= $query->result_array();

            return !empty($result)?$result:false;
}


    public function getRows($category=''){
        $this->db->select('*');
        $this->db->from($this->proTable);
        // $this->db->where('status', '1');

        if($category){
            $this->db->where('category_id',$category);

            $query= $this->db->get();
            $result= $query->result_array();
           
        }
        // if($id){
        //     $this->db->where('product_id', $id);
        //     $query = $this->db->get();
        //     $result = $query->row_array();
        // }
        else{
            $this->db->order_by('product_name', 'asc');
            $this->db->limit(6);
            $query = $this->db->get();
            $result = $query->result_array();
        }
        
        // Return fetched data
        return !empty($result)?$result:false;
    }

    public function view_more(){
         $this->db->select('*');
        $this->db->from($this->proTable);
         $this->db->order_by('product_name', 'asc');
          $query = $this->db->get();
            $result = $query->result_array();
             return !empty($result)?$result:false;
    }
    
    /*
     * Fetch order data from the database
     * @param id returns a single record of the specified ID
     */
    public function getOrder($id){
        $this->db->select('o.*, c.name, c.email, c.phone, c.address');
        $this->db->from($this->ordTable.' as o');
        $this->db->join($this->custTable.' as c', 'c.id = o.customer_id', 'left');
        $this->db->where('o.id', $id);
        $query = $this->db->get();
        $result = $query->row_array();
        
        // Get order items
        $this->db->select('i.*, p.image, p.name, p.price');
        $this->db->from($this->ordItemsTable.' as i');
        $this->db->join($this->proTable.' as p', 'p.id = i.product_id', 'left');
        $this->db->where('i.order_id', $id);
        $query2 = $this->db->get();
        $result['items'] = ($query2->num_rows() > 0)?$query2->result_array():array();
        
        // Return fetched data
        return !empty($result)?$result:false;
    }
    
    /*
     * Insert customer data in the database
     * @param data array
     */
    public function insertCustomer($data){
        // Add created and modified date if not included
        if(!array_key_exists("created", $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified", $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        
        // Insert customer data
        $insert = $this->db->insert($this->custTable, $data);

        // Return the status
        return $insert?$this->db->insert_id():false;
    }
    
    /*
     * Insert order data in the database
     * @param data array
     */
    public function insertOrder($data){
        // Add created and modified date if not included
        if(!array_key_exists("created", $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified", $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        
        // Insert order data
        $insert = $this->db->insert($this->ordTable, $data);

        // Return the status
        return $insert?$this->db->insert_id():false;
    }
    
    /*
     * Insert order items data in the database
     * @param data array
     */
    public function insertOrderItems($data = array()) {
        
        // Insert order items
        $insert = $this->db->insert_batch($this->ordItemsTable, $data);

        // Return the status
        return $insert?true:false;
    }


       public function popular(){
     $this->db->select('products.*');
     $this->db->distinct();
     $this->db->from('products');
     $this->db->join('product_review', 'products.id = product_review.product_id');
     //$this->db->order_by('product_rating.total_rating');
     //$this->db->where('product_rating.product_id','products.product_id');
     $result = $this->db->get()->result_array();
    //print_r($query);
    return !empty($result)?$result:false;

   }
    
}