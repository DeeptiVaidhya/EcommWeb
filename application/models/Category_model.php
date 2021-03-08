<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category_model extends CI_Model
{
    
    function __construct()
    {
        // $this->proTable      = 'categories';
        $this->proTable      = 'products';
        $this->catTable      = 'categories';
        $this->custTable     = 'customers';
        $this->ordTable      = 'orders';
        $this->ordItemsTable = 'order_items';
     
        
    }
    
    public function getCategory($id = '')
    {
        $this->db->select('*');
        $this->db->from($this->catTable);
        // $this->db->join("subcategory",'subcategory.cat_id=categories.id','left');
        if ($id) {
            $this->db->where('id', $id);
            $query  = $this->db->get();
            $result = $query->result_array();
        } else {
            $this->db->order_by('id', 'asc');
            $query  = $this->db->get();
            $result = $query->result_array();
        }
        
        //return fetched data
      
        return !empty($result) ? $result : false;
    }


    public function getSubCategory(){
        $this->db->select("*");
        $this->db->from('subcategory');
        $data = $this->db->get()->result_array();
        //  echo '<pre>';
        // print_r($data);
        // exit;
        return $data;
    }
    
     public function getChildSubCategory(){
        $this->db->select("*");
        $this->db->from('childsubcategory');
        $data = $this->db->get()->result_array();
        //  echo '<pre>';
        // print_r($data);
        // exit;
        return $data;
    }
    
    



    public function getProductByCategory($id = '',$limit,$start){
        $this->db->select('*');
        $this->db->from($this->proTable);
        $this->db->where('status', '1');
        if ($id) {
            $this->db->like('category_id', $id);
            if(!empty($start) && !empty($limit))
            {
                $this->db->limit($start,$limit);
            }
            $query  = $this->db->get();
            $result = $query->result_array();
            

        } else {
            $this->db->order_by('name', 'asc');
            if(!empty($start) && empty($limit))
            {
                $this->db->limit($start,$limit);
            }
            $query  = $this->db->get();
            $result = $query->result_array();
        }
        //echo $this->db->last_query();die;    
        //return fetched data
        return !empty($result) ? $result : false;
    }



    public function getProductByCategory_count($id='')
    {
        $this->db->select('*');
        $this->db->from($this->proTable);
        $this->db->where('status', '1');


        $this->db->where('category_id', $id);

        $count  = $this->db->get()->num_rows();
        


        //echo $this->db->last_query();die;    
        //return fetched data
        return !empty($count) ? $count : 0;
    }

 
    
}

?>