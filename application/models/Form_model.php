<?php
class Form_model extends CI_Model {
  
    public function __construct()
    {
        $this->load->database();
    }
     
    public function auth_check($data)
    {
        $query = $this->db->get_where('register', $data);
        if($query){   
         return $query->row();
        }
        return false;
    }
    public function insert_user($data)
    {
 
        $insert = $this->db->insert('register', $data);
        if ($insert) {
           return $this->db->insert_id();
        } else {
            return false;
        }
    }
     function can_login($first_name, $password)  
      {  
           $this->db->where('first_name', $first_name);  
           $this->db->where('password', $password);  
           $query = $this->db->get('register');  
           // SELECT * FROM users WHERE username = '$username' AND password = '$password'  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;       
           }  
      }  
}
?>