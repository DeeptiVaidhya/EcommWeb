<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
      public function __construct(){
        parent ::__construct();
        $this->load->model('Login_model');
      }  

  public function index(){
   

    if($this->session->userdata('user_id')== 0){
      if(!empty($_SERVER['HTTP_REFERER'])){
        $url= $_SERVER['HTTP_REFERER'];

     }
          if(!empty($url)){
             $this->new_url=explode("/",$url);
             $count = count($this->new_url);
      }

      else {
        $count =0;
      }
        
       
      if(!empty($this->new_url)){
       
        $count = count($this->new_url);

        $this->session->set_userdata('redirect',$this->new_url[$count-1]);
           $this->load->view('common/header');
           $this->load->view('login');
           $this->load->view('common/footer');
         }
       }
        

        else {
          if(!empty($_SERVER['HTTP_REFERER'])){
        $url= $_SERVER['HTTP_REFERER'];


     }

        if(!empty($url)){
             $this->new_url=explode("/",$url);
             $count = count($this->new_url);
      }

      else {
        $count =0;
      }
       
        
         if($this->new_url[$count-1] == 'checkout')
         {

            redirect('payment/Detail');
         }
         if($this->session->userdata('redirect') == 'Detail')
         {
            redirect('myaccount');
         }
         else {
            redirect('checkout');
         }

          
        }
    }


   public function  user_address(){
        
          $data= $this->input->post();
          
          // print_r($data);exit;
          // $this->load->library('form_validation');
      

          $update_data=array('firstname'=>$data['firstname'],'lastname'=>$data['lastname'],'phone'=>$data['phone'],'email'=>$data['email']);
          $this->db->where('id',$this->session->userdata('user_id'));
          
          if($this->db->update('users',$update_data)){

            echo 'updated sucessfully';
          // $data['user']=$this->Login_model->getUserById($this->session->userdata('user_id'));
          // $this->load->view('common/header');
          // $this->load->view('user_dashboard',$data);
          // $this->load->view('common/footer');
    }
  }
    

    public function forget_password(){
      $this->load->view('common/header');
      $this->load->view('forget_password');
      $this->load->view('common/footer');
    }
    
    public function process(){  
      $this->session->set_flashdata('message','');
      $user = $this->input->post('user');  
      $pass = $this->input->post('pass');  
      if($this->Login_model->varification($user,$pass)){
        // $this->load->view('common/header');
        // $this->load->view('paytm/details');
        //   $this->load->view('common/footer');

        if($this->session->userdata('redirect') == 'checkout'){
         redirect('payment/Detail');  
        }
        else {
          redirect('');
        }
        
      }else {
       $data['login_result']='Incorrect password';
       $data['class']="alert alert-danger";
       $this->load->view('common/header');
       $this->load->view('login',$data);
       $this->load->view('common/footer');
      }
    }


  public function user_dashboard(){
       if(!empty($this->session->userdata('user_id'))){
          $data['user']=$this->Login_model->getUserById($this->session->userdata('user_id'));
          $data['product_delivered'] = $this->User_dashboard->getData();

          $this->load->view('common/header');
          $this->load->view('user_dashboard',$data);
          $this->load->view('common/footer');
          }
          else {
            redirect(base_url().'login');
          }

  }


public function email_blog(){

        $send_data=$this->input->post();
       //print_r($send_data);
                
        
        
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'Gopalsh98598@gmail.com';
        $config['smtp_pass']    = '3d6h9l12v';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'text'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not      
        
        $this->load->library('email');
        $this->email->initialize($config);
   
        $this->email->from($send_data['email'], 'myname');
        $this->email->to('Gopalsh98598@gmail.com'); 

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');  

        if($this->email->send()){
         
          echo 'please check email';
          // $data['email_result'] = 'please check email';
          // $data['class'] = 'alert alert-success';
          // $this->load->view('common/header');
          // $this->load->view('contact',$data);
          // $this->load->view('common/footer');
        }
        else {
          echo 'unable to send email';

          // $data['email_result'] = 'unable to send email';
          // $data['class'] = 'alert alert-danger';
          // $this->load->view('common/header');
          // $this->load->view('contact',$data);
          // $this->load->view('common/footer');

        }  
  }


   public function address(){
      $address=$this->input->post();
       if(!empty($this->session->userdata('user_id'))) {
      $data=array('user_id'=>$this->session->userdata('user_id'),'Address1'=>$address['address1'],'Address2'=>$address['address2'],'City'=>$address['city'],'State'=>$address['state'],'Pincode'=>$address['pincode']);
      if($this->db->insert('user_address',$data)){
      
         echo 'address saved';
        }
      }
      // }
   }

    public function delete(){
      $id=$this->uri->segment(3);
      $this ->db->where('id', $id);
      $this ->db->delete('user_address');
      $data['user']=$this->Login_model->getUserById($this->session->userdata('user_id'));
      $data['product_delivered'] = $this->User_dashboard->getData();
      $this->load->view('common/header');
      $this->load->view('user_dashboard',$data);
      $this->load->view('common/footer');
   }

    public function testing(){
      print_r($this->session->userdata('user_id'));
    }

    public function signUp(){
      $this->session->set_flashdata('message','signup');
      $this->load->view('common/header');
      $this->load->view('register');
      $this->load->view('common/footer');
    }


    public function track(){
      $this->load->view('common/header');
      $this->load->view('Track');
      $this->load->view('common/footer');
    }

    public function FAQ(){
      $this->load->view('common/header');
      $this->load->view('FAQ');
      $this->load->view('common/footer');

    }

    public function edit(){
      $id=$this->uri->segment(3);
      $this->db->select('*');
      $this->db->from('user_address');
      $this->db->where('id',$id);
      $data['edit']=$this->db->get()->result_array();
      $data['status']='edit';
      $data['user']=$this->Login_model->getUserById($this->session->userdata('user_id'));
      $data['product_delivered'] = $this->User_dashboard->getData();
      $this->load->view('common/header');
      $this->load->view('user_dashboard',$data);
      $this->load->view('common/footer');
    }

    public function update_address(){
      $data=$this->input->post();
      $update_address=array('Address1'=>$data['address1'],'Address2'=>$data['address2'],'City'=>$data['city'],'State'=>$data['state'],'Pincode'=>$data['pincode']);
      $this->db->where(array('id'=>$data['id']));
      if($this->db->update('user_address',$update_address)){
        $data['user']=$this->Login_model->getUserById($this->session->userdata('user_id'));
        $data['result']= 'user updated sucessfully';
        $this->load->view('common/header');
        $this->load->view('user_dashboard',$data);
        $this->load->view('common/footer');
      }
    }


    public function forget(){
      $email=$this->input->post('email');
      if(!empty($email)){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('email'=>$email));
        $result=$this->db->get()->result_array();
         if(count($result)>0) {
      //config
      $config['protocol'] = 'smtp';
      $config['smtp_host'] = 'ssl://smtp.googlemail.com';
      $config['smtp_port'] = 465;
      $config['smtp_user'] = 'Gopalsh98598@gmail.com';
      $config['smtp_pass'] = '3d6h9l12v';
      $config['mailtype'] = 'html';
      
      $this->load->library('email', $config);
      $this->email->from('Gopalsh98598@gmail.com', 'Identification');
      $this->email->to('$email');
      $this->email->subject('Reset Password Link');
      //$Otp = mt_rand(100000, 999999);
      $Link = base_url()."login/resetPassword548377043/".base64_encode($email);
      $this->email->message('<html>
        <head>
          <title>Reset Password Link</title>
        </head>
        <body>          
          <p>Your Account:</p>
          <p>Email: ".$email."</p>          
          <p>Please click the link below to reset your password.</p>
          <h4><a href="$Link">Reset password</a></h4>
        </body>
        </html>');

      if ($this->email->send()) {
        echo 'please check you email';
      } else {
        echo 'unable to send link';
      }
    }else {
      echo '<p style="color:red;">Unknown Email Address</p>';
    }
    }

    }


    public function resetPassword548377043(){
      $decode = $this->uri->segment(3);
      $d=base64_decode($decode);
      $this->db->select('user_id');
      $this->db->from('users');
      $this->db->where('user_email',$d);
      $result=$this->db->get()->row();
      $this->session->set_userdata('change_user',$result->user_id);
      $this->load->view('common/header');
      $this->load->view('change_password');
      $this->load->view('common/footer');
    }

    public function changePassword(){
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      $this->form_validation->set_rules('password1', 'New Password', 'required');
      $this->form_validation->set_rules('password2', 'Confirm Password', 'required|matches[password1]');
      if ($this->form_validation->run() == FALSE){
        $this->load->view('common/header');
        $this->load->view('change_password');
        $this->load->view('common/footer');
      }else{
        $data=$this->input->post();
        $new_data=array('user_password'=>md5($data['password1']));
        $this->db->where(array('user_id'=>$data['user_id']));
      if($this->db->update('users',$new_data)){
        $data['result']= 'password changed';
        $this->load->view('common/header');
        $this->load->view('change_password',$data);
        $this->load->view('common/footer');
        }
      }
    }


    public function signUpProcess(){
      $this->form_validation->set_rules('firstname', 'First Name', 'required');
      // $this->form_validation->set_rules('username', 'user Name', 'required');
      $this->form_validation->set_rules('lastname', 'Last Name', 'required');
      $this->form_validation->set_rules('email', 'Email is required',  'trim|required|valid_email|is_unique[users.email]');
      //$this->form_validation->set_rules('phone', 'Phone No', 'required');
      //$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|regex_match[/^[0-9]$/]');
      $this->form_validation->set_rules('phone', 'Phone No', 'required|regex_match[/^[0-9]{10}$/]'); //{10} for 10 digits number
      $this->form_validation->set_rules('password', 'Full Name', 'required');
      $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'required|matches[password]');
      if($this->form_validation->run() == FALSE){
        $this->load->view('common/header');
        $this->load->view('register');
        $this->load->view('common/footer');
      }else{
        $data = $this->input->post();
        unset($data['cpassword']);
        unset($data['submit']);

        if($this->Login_model->saveUser($data)){
          redirect('Login');
        }  
      }
    }

       
    private function SendEmailToAdminForRegistration($data){
      $config = array(
        'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
        'smtp_host' => 'ssl://smtp.gmail.com', 
        'smtp_port' => 465,
        'smtp_user' => 'gopalsh98598gmail.com',
        'smtp_pass' => '3d6h9l12v',
        'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
        'mailtype' => 'html', //plaintext 'text' mails or 'html'
        'smtp_timeout' => '4', //in seconds
        'charset' => 'iso-8859-1',
        'wordwrap' => TRUE
      );

      $this->load->library('email',$config);
      $from = 'Gopalsh98598@gmail.com';
      $to = 'Gopalsh022@gmail.com';
      $subject = "New user registration.";
      $message = "<h2>New user registration.</h2>";
      $message .= "<p><strong>Name: </strong>".$data['user_full']."</p>";
      $message .= "<p><strong>Email: </strong>".$data['user_email']."</p>";
      $message .= "<p><strong>Username: </strong>".$data['user_name']."</p>";
      $this->email->set_newline("\r\n");
      $this->email->from($from);
      $this->email->to($to);
      $this->email->subject($subject);
      $this->email->message($message);

      if ($this->email->send()) {
          echo 'Your Email has successfully been sent.';
      } else {
        print_r($this->email->print_debugger());
      }
    }

    public function activate(){
      $this->load->Model('User');
      $id =  $this->uri->segment(3);
      $code = $this->uri->segment(4);
      $user = $this->User->getUser($id);
      if($user['varification_code'] == $code){
        $data['is_email_varified'] = 1;
        $query = $this->User->activate($data, $id);
        if($query){
          redirect('login');
        }else{
        }
      }else{
        $this->session->set_flashdata('message', 'Cannot activate account. Code didnt match');
      } 
    }
    
    public function logout(){
    $this->session->set_userdata('user_id',0);
    $this->session->sess_destroy();

      redirect('Login');
    }  
}