<?php

 class Wishlist extends CI_Model {
	
    public function addToWishList($data){
		$where_condition = array('product_id'=>$data['product_id'],'user_id'=>$data['user_id']);
     $this->db->select('*');
     $this->db->from('product_wishlist');
     $this->db->where($where_condition);
     $query = $this->db->get()->result_array();
     if(!empty($query)){
     	if(count($query)>0){
     		 $this->db->delete('product_wishlist',$where_condition);
             	
             echo 'Removed from wishlist';
     	}

     }
     else {
     if($this->db->insert('product_wishlist',$data)){
     	echo 'addedd to wishlist';
     }
     else {
     	 
     }
	}
	}




    function getWishlist(){
        if(!empty($this->session->userdata('user_id'))){
        $this->db->select('*');
        $this->db->from('product_wishlist');
        $this->db->where('user_id',$this->session->userdata('user_id'));
        $query = $this->db->get()->result_array();
        return $query;
        }
    }

    function remove_single_product($id){
        if(!empty($this->session->userdata('user_id'))) {
        $where_condition1 = array('product_id'=>$id,'user_id'=>$this->session->userdata('user_id'));
    if($this->db->delete('product_wishlist',$where_condition1)){
        return true;
    }
    else {
        return false;
    }

    }

    }
}