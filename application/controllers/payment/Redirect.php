<?php

class Redirect extends CI_Controller {
  public function start($amount){
     //$data['amount']=$this->uri->segment(4);
    if($this->session->userdata('user_id')){
      
      $this->load->view('paytm/TnxTest');
    }
    else {
      $this->load->view('paytm/login');
      $this->load->view('common/footer');
    }

    
  }

  public function payment(){
    $this->load->view('paytm/Redirects');
  }

  public function pgResponse(){
  	$this->load->view('paytm/pgResponse');
  }
  public function login(){
  	
  	// $this->load->view('common/header');
  	// $this->load->view('paytm/login');
  	// $this->load->view('common/footer');
  }


    public function process()  
    {  

        $user = $this->input->post('user');  
        $pass = $this->input->post('pass');  
       if($this->Login_model->varification($user,$pass)){
        $this->load->view('paytm/Redirects');
       }
       else {
        $data['result']='Incorrect password';
        $this->load->view('paytm/login',$data);
      $this->load->view('common/footer');
       }
    }

    public function testing(){
      print_r($this->session->userdata('user_id'));
    }


   public function logout(){

    if($this->session->set_userdata('user_id',0)){
      redirect('paytm/Redirect/login');
    }
   }  
}