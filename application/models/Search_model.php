<?php 

 /**
  * 
  */
 class Search_model extends CI_Model
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		$this->load->database();
 	}


 	public function search($key,$limit=0,$start=0){
 		$this->db->like('name' , $key);
 		if(!empty($limit) && !empty($start)){

             $this->db->limit($limit, $start);
            }
            else {
                $this->db->limit(6);
            }
 		$query = $this->db->get('products');
 		
 		return   $query->result();
 		
 	}
 }
?>