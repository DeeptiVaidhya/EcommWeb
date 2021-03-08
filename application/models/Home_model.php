<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home_model extends CI_Model
{
    
    function __construct()
    {
        $this->proTable      = 'products';
        $this->custTable     = 'customers';
        $this->ordTable      = 'orders';
        $this->ordItemsTable = 'order_items';
        $this->catTable      = 'categories';
        
    }
    
    public function getRows($id = ''){
        $this->db->select('*');
        $this->db->from($this->proTable);
        $this->db->where('status', '1');
        if ($id) {
            $this->db->where('id', $id);
            $query  = $this->db->get();
            $result = $query->row();
        } else {
            $this->db->order_by('name', 'asc');
            $query  = $this->db->get();
            $result = $query->row();
        }

        //return fetched data
        return !empty($result) ? $result : false;
    }
  public function getHomeRows($id = '')
    {


        $this->db->select('*');
        $this->db->from($this->proTable);
        $this->db->where('status', '1');
        $this->db->limit(18);
        if ($id) {
            $this->db->where('id', $id);
            $query  = $this->db->get();
            $result = $query->result_array();
        } else {
            $this->db->order_by('name', 'asc');
            $query  = $this->db->get();
            $result = $query->result_array();
        }

        //return fetched data
        return !empty($result) ? $result : false;
    }
    public function Categories(){
        $this->db->select("*");
        $this->db->from("categories");
        return $this->db->get()->result_array();
    }



    public function addToWishList($user_id,$product_id){
      $this->db->select("*");
      $this->db->from('wishlist');
      $this->db->where(array('user_id'=>$user_id,'product_id'=>$product_id));
      $data = $this->db->get()->result();
      $count = 0;
      (empty($data)?'':$count=count($data));

      if($count == 0){
        $this->db->insert('wishlist',array('user_id'=>$user_id,'product_id'=>$product_id));
        return true;
      }
      else {
        return true;
      }

    }


    public function getWishlist($user_id)
    {
        $this->db->select("products.id,products.name,products.price,products.qty,products.image");
        $this->db->from("wishlist");
        $this->db->join('products','wishlist.product_id=products.id');
        $this->db->where('wishlist.user_id',$user_id);
        $data = $this->db->get()->result_array();
        return empty($data)?false:$data;
    }

    public function getWishlistCount($user_id)
    {
       
    }


    /* fetch order data from thhe database parameter id return a single record of the specified id    
     */
    
    public function getOrder($id)
    {
        $this->db->select('o.*, c.name, c.email, c.phone, c.address');
        $this->db->from($this->ordTable . ' as o');
        $this->db->join($this->custTable . ' as c', 'c.id = o.customer_id', 'left');
        $this->db->where('o.id', $id);
        $query  = $this->db->get();
        $result = $query->row_array();
        
        // Get order items
        $this->db->select('i.*, p.image, p.name, p.price');
        $this->db->from($this->ordItemsTable . ' as i');
        $this->db->join($this->proTable . ' as p', 'p.id = i.product_id', 'left');
        $this->db->where('i.order_id', $id);
        $query2          = $this->db->get();
        $result['items'] = ($query2->num_rows() > 0) ? $query2->result_array() : array();
        
        // Return fetched data
        return !empty($result) ? $result : false;
    }
    
    /* insert customer data in the database
    @param data array*/
    
    public function insertCustomer($data)
    {
        //Add created and modified date if not included
        if (!array_key_exists("created", $data)) {
            $data['created'] = date("Y-m-d H i:s");
        }
        
        //insert customer data 
        $insert = $this->db->insert($this->custTable, $data);
        
        //return the  status
        return $insert ? $this->db->insert_id() : false;
    }
    
    /* insert order data in the database
    param data array
    */
    
    public function insertOrder($data)
    {
        //add created and modified date if not included 
        
        if (!array_key_exists("created", $data)) {
            $data['modified'] = date("Y-m-d H:i:s");
            
        }
        
        //insert order data
        $insert = $this->db->insert($this->ordTable, $data);
        
        
        //return the status
        return $insert ? $this->db->insert_id() : false;
    }
    
    /* insert order item data in the databse
    param data array
    */
    
    public function insertOrderItems($data)
    {
        //insert order items'

         $insert = $this->db->insert('order_items',$data);
        // $this->db->insert_batch($data){
        return $insert;
        //return  the status
        // return $insert ? true : false;
    }

 /* product size dropdown */
    public function getAttributeValue() {

        $this->db->select('*');
        $this->db->from('attribute_value');
        $this->db->where('attribute_parent_id',4);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
 }

    public function record_count($sub_category_id =0,$filter_id=0,$size=0,$search='',$s=0,$e=0){
        if($sub_category_id != 0){
            // $data = $this->db->count_all("products")->like('sub_category_id',$sub_category_id);
            $this->db->select("*");
            $this->db->from('products');
            $this->db->like('sub_category_id',$sub_category_id);
            $data = $this->db->get()->num_rows();
        }
        else if($filter_id != 0){
             if($filter_id==3){
               $this->db->select("*");
               $this->db->from('products');
               $this->db->order_by('price','asc');
               $data = $this->db->get()->num_rows();
               
          }
        else if($filter_id == 4){
               $this->db->select("*");
               $this->db->from('products');
               $this->db->order_by('price','desc');
               $data = $this->db->get()->num_rows();
               
        }
        
        }
        else if($size != 0){
            $this->db->select("*");
            $this->db->from('products');
            $this->db->like('attribute_value_id', $size);
            $data  = $this->db->get()->num_rows();
            // echo $data;exit;
        }
        else if($search != ''){
            $this->db->select("*");
            $this->db->from('products');
            $this->db->like('name' , $search);
            $data  = $this->db->get()->num_rows();
        }
        else if($s && $e){
            $this->db->select("*");
            $this->db->from('products');
            $this->db->where('price >= ',$s);
            $this->db->where('price <=', $e);
            $data  = $this->db->get()->num_rows();
        }

        else {
            $data = $this->db->count_all("products");
        }
        return $data;
    }
    
    
/* single product*/
   public function getProductDetail($id){
        $this->db->select('*');
        $this->db->from($this->proTable);
        
        // $this->db->join('attribute_value','attribute_value.id = products.attribute_value_id');
        $this->db->where('products.id', $id);
        $query  = $this->db->get();
        $result = $query->row();
        
        //return fetched data
        return !empty($result) ? $result : false;
        }
        

        public function getAllProducts($S=0,$L=0,$limit=0,$start=0) {
            $this->db->select('*');
             
            $this->db->from($this->proTable);
            if(!empty($S) && !empty($L)){
            $this->db->where('price >= ',$S);
            $this->db->where('price <=', $L);
            }

            if(!empty($limit) && !empty($start)){
             $this->db->limit($limit, $start);
            }

            else {
                $this->db->limit(6);
            }

            $query =$this->db->get()->result_array();
             
            if ($query)
            {
                return $query;
            }
            return false;

    }


    public function getProductFilterBySubCategory($limit,$start,$sub_category_id){
            $this->db->select('*');
             
            $this->db->from($this->proTable);
            $this->db->like('sub_category_id',$sub_category_id);
             if(!empty($limit) && !empty($start)){

             $this->db->limit($limit, $start);
            }
            else {
                $this->db->limit(6);
            }

            $query =$this->db->get()->result_array();

             
            if ($query)
            {
                return $query;
            }
            return false; 
    }

     public function getSubcategory($id = '')
    {
    
        $this->db->select('*');
        $this->db->from($this->proTable);
  
        if ($id) {
            $this->db->where('category_id', $id);
            
            $query  = $this->db->get();
            $result = $query->row_array();
        } else {
            $this->db->order_by('name', 'asc');
            $query  = $this->db->get();
            $result = $query->result_array();
        }
        
        //return fetched data
        return !empty($result) ? $result : false;
    }


    public function getNreArrival($id = '')
    {


        $this->db->select('*');
        $this->db->from($this->proTable);
        $this->db->order_by('rand()');
        $this->db->limit(4);
        $query  = $this->db->get();
        $result = $query->result_array();

        //return fetched data
        return !empty($result) ? $result : false;
    }


    public function remove_single_product($id){
        if(!empty($this->session->userdata('user_id'))) {
            $where_condition1 = array('product_id'=>$id,'user_id'=>$this->session->userdata('user_id'));
            if($this->db->delete('wishlist',$where_condition1)){
                return true;
            }
            else {
                return false;
            }
        }   
    }
    
}

?>