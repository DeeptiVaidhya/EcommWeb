<?php

class Account_model extends CI_Model {
   

   public function getData(){
     
      if($this->session->userdata('user_id')) {
      $this->db->select('products.*,orders.id as invoice_id,orders_item.amount');
      $this->db->from('orders');
      $this->db->join('orders_item','orders_item.order_id = orders.id');
      $this->db->join('products','orders_item.product_id=products.id');
      $this->db->order_by('orders.id','desc');
      $this->db->where('user_id',$this->session->userdata('user_id'));
      $query=$this->db->get()->result_array();
      
      return $query;
     
   }
   }

   public function getInvoiceDetailByInvoceId($invoice_id){
      $this->db->select("*");
      $this->db->from('orders');
      $this->db->where('id',$invoice_id);
      return $this->db->get()->row();
   }

   public function getProductDetailByProductId($id){
      $this->db->select("*");
      $this->db->from('products');
      $this->db->where('id',$id);
      return $this->db->get()->row();
   }

   public function getAddressForUpdateById($id){
      $this->db->select("*");
      $this->db->from('user_address');
      $this->db->where("id",$id);
      return $this->db->get()->result_array();


   }

   public function deleteAddressById($address_id){
      $this->db->where('id', $address_id);
      $this->db->delete('user_address');
   }

   public function getUserDetail($id){
   	$this->db->select("*");
   	$this->db->from('users');
   	$this->db->where('id',$id);
   	return $this->db->get()->result_array();
   }

   public function getAddress($user_id){
      $this->db->select('CONCAT(address1," ",address2) as address,city,state,pincode,id');
      $this->db->from('user_address');
      $this->db->where('user_id',$user_id);
      // $this->db->limit(3);
      $query = $this->db->get()->result_array();
      return $query;
   }




}