<?php 
if (!defined('BASEPATH'))exit('No direct script access allowed');
  class Login_model extends CI_Model {
    public function varification($user,$pass){
      $this->db->select('*');
      $this->db->from('users');
      $this->db->where(array('email'=>$user,'phone'=>$pass));
      $result=$this->db->get()->result();
      if(count($result)){
        $this->session->set_userdata(array(
            'user_id'  => $result[0]->id,
            'username' => $result[0]->username,
            'firstname' => $result[0]->firstname,
            'lastname'  => $result[0]->lastname,
            'email'   => $result[0]->email,
            'phone'   => $result[0]->phone
        ));
        return true;
      }else {
        return false;
      }
    }
    public function getUserById($id){
      $this->db->select("*");
      $this->db->from('users');
      $this->db->where('user_id',$id);
      $user_data=$this->db->get()->result_array();
      return $user_data;
    }

    public function saveUser($data){
      if($this->db->insert('users',$data)){
        return true;
      }else {
        return false;
      }
    }
  }