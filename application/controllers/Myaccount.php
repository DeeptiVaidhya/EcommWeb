  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myaccount extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        
        // Load cart library
        $this->load->library('cart');
        
        // Load product model
        // Load paypal library & product model
        $this->load->library('paypal_lib');
        $this->load->model('Account_model');
    }
    
    function index()
    {

    	if(!empty($this->session->userdata('user_id'))){
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->Account_model->getUserDetail($user_id);
        $data['address'] = $this->Account_model->getAddress($user_id);
        $data['product_delivered']= $this->Account_model->getData();
        $this->load->view('common/header');
        $this->load->view('myaccount',$data);
        $this->load->view('common/footer');
     }
     else {
     	redirect('login');
     }
        
    }

    public function deleteAddress(){
      $id = $this->uri->segment(3);
      $this->Account_model->deleteAddressById($id);
      redirect('Myaccount');
    }

    public function updateAddress(){
      if(empty($this->input->post())){
        $id = $this->uri->segment(3);
        $data['update_address'] = $this->Account_model->getAddressForUpdateById($id);
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->Account_model->getUserDetail($user_id);
        $data['address'] = $this->Account_model->getAddress($user_id);
        $data['product_delivered']= $this->Account_model->getData();
        $data['edit'] = true;
        $this->load->view('common/header');
        $this->load->view('myaccount',$data);
        $this->load->view('common/footer');

      }
      else {
        
        $id = $this->input->post('id');
        $data = $this->input->post();
        unset($data['save']);
        unset($data['id']);
        $this->db->where('id',$id);
        $this->db->update('user_address',$data);
        redirect('Myaccount');
        
      }
    }

  public function  user_address(){

    $data= $this->input->post();
    $update_data=array('firstname'=>$data['firstname'],'lastname'=>$data['lastname']
    ,'phone'=>$data['phone'],'email'=>$data['email']);
    $this->db->where('id',$this->session->userdata('user_id'));
    if($this->db->update('users',$update_data)){
      echo 'updated sucessfully';
    }
  }
    
  public function process(){ 

          $this->session->set_flashdata('message','');
          $user = $this->input->post('user');  
          $pass = $this->input->post('pass');  
          if($this->Account_model->varification($user,$pass)){
          $data['user']=$this->Account_model->getUserById($this->session->userdata('user_id'));
          $data['product_delivered']= $this->Account_model->getData();
         

      if(!empty($this->session->userdata('redirect'))){
       if($this->session->userdata('redirect') == 'details') {
           $this->load->view('common/header');
           $this->load->view('paytm/details');
           $this->load->view('common/footer');
        //$this->session->set_userdata('redirect','');
         }
         if($this->session->userdata('redirect') == 'blog'){
          // $data['comments']=$this->Blog->getComments();
          // $this->load->view('common/header');
          // $this->load->view('blog',$data);
          // $this->load->view('common/footer');
          
          redirect( base_url().'welcome/blog');

         }

         if($this->session->userdata('redirect')== 'cart') {
          $data = array();
        // Retrieve cart data from the session
        //   $data['cartItems'] = $this->cart->contents();
        // // Load the cart view
        // $this->load->view('common/header');
        // $this->load->view('cart/index', $data);
        // $this->load->view('common/footer');
         redirect( base_url().'cart');  

         }
       }
         else {

          // $data['user']=$this->Login_model->getUserById($this->session->userdata('user_id'));
          // $data['product_delivered'] = $this->User_dashboard->getData();

          // $this->load->view('common/header');
          // $this->load->view('user_dashboard',$data);
          // $this->load->view('common/footer');
          redirect(base_url().'Login/user_dashboard');
        }
    
    }
    else {
         $data['login_result']='Incorrect password';
         $data['class']="alert alert-danger";
         $this->load->view('common/header');
         $this->load->view('login',$data);
         $this->load->view('common/footer');
    }

  }

    public function address(){
      $data = $this->input->post();

      if(!empty($this->session->userdata('user_id'))){
        $data['user_id'] = $this->session->userdata('user_id');
      }
      
      if($this->db->insert('user_address',$data)){
        echo 'Record inserted Successfully';
      }
      else {
        echo 'Unable to insert record';
      }
    }


    public function track(){
      $invoice_id = $this->uri->segment(3);
      $product_id = $this->uri->segment(4);
      $data['invoice_detail'] = $this->Account_model->getInvoiceDetailByInvoceId($invoice_id);
      $data['product_detail'] = $this->Account_model->getProductDetailByProductId($product_id);

      $post = [
      'email' => 'tulazpokharel@gmail.com',
      'password' => 'Hepppp@0801',
      ];

      $ch = curl_init('https://apiv2.shiprocket.in/v1/external/auth/login');
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      // execute!
      $response = curl_exec($ch);
      // close the connection, release resources used
      curl_close($ch);
      // do anything you want with your response
      $token = json_decode($response);
      $tokens = $token->token;


     $ch = curl_init();  
     $url = 'https://apiv2.shiprocket.in/v1/external/courier/track/shipment/'.$data['invoice_detail']->shipment_id;
      curl_setopt($ch,CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json',
      'Authorization: Bearer '.$tokens]);
      $output=curl_exec($ch);
 
       curl_close($ch);
       $object_output = json_decode($output);
       $data['tracking'] = $object_output->tracking_data;
       $this->load->view('common/header');
       $this->load->view('Track',$data);
       $this->load->view('common/footer');
     }


     public function cancelOrder(){
      $order_id = $this->input->post('order_id');

       $post = [
      'email' => 'tulazpokharel@gmail.com',
      'password' => 'Hepppp@0801',
      ];

      $ch = curl_init('https://apiv2.shiprocket.in/v1/external/auth/login');
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      // execute!
      $response = curl_exec($ch);
      // close the connection, release resources used
      curl_close($ch);
      // do anything you want with your response
      $token = json_decode($response);
      $tokens = $token->token;

      $post = [
        'ids' => $order_id
      ];

      
      $object = json_encode((object)$post);
      // print_r($object);exit;
      $curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/orders/cancel",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>$object,
      CURLOPT_HTTPHEADER => array(
      "Content-Type: application/json",
      "Authorization: Bearer ".$token->token
      ),
      ));

      $response = curl_exec($curl);
      

      curl_close($curl);
      redirect('myaccount');
     }

    public function signUpProcess(){

     
      

      $this->session->set_flashdata('message','signup');
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation'); 
      $this->data = $this->input->post();
      
      $user= array('user_name'=>$this->data['user_name'],'user_email'=>$this->data['user_email'],'user_phone'=>$this->data['user_phone'],'user_fullname'=>$this->data['user_full'],'user_password'=>md5($this->data['user_spassword']),'user_bdate'=>$this->data['user_birth'],'user_city'=>$this->data['user_city']);
      $this->form_validation->set_rules('user_name', 'Username', 'required');
      $this->form_validation->set_rules('user_email', 'Email', 'required');
      $this->form_validation->set_rules('user_phone', 'Phone Number', 'required');
      $this->form_validation->set_rules('user_full', 'Full Name', 'required');
      $this->form_validation->set_rules('user_birth', 'User Birth Day', 'required');
      $this->form_validation->set_rules('user_city', 'User City', 'required');
      $this->form_validation->set_rules('user_spassword', 'Password ', 'required');
      $this->form_validation->set_rules('user_cpassword', 'Password Confirmation', 'required|matches[user_spassword]');
      if ($this->form_validation->run() == FALSE){
        $this->load->view('common/header');
        $this->load->view('myaccount');
        $this->load->view('common/footer');
      }
      else{
        $this->db->where('user_email', $this->input->post('user_email'));
        $query = $this->db->get('login');
        $count_row = $query->num_rows();
       // echo $count_row;exit;
        if ($count_row > 0) {
         
          $data['result']='Email is already exists';
          $data['status']=false;
          $this->session->set_flashdata('message','fgsdfg');
          $this->session->set_flashdata('tab','r');
          $this->load->view('common/header');
          $this->load->view('myaccount',$data);
          $this->load->view('common/footer');


        }
         
         else if(!preg_match('/^[0-9]{10}+$/', $this->input->post('user_phone')))
           {


             $data['result']='Invalid Mobile number';
             $this->load->view('common/header');
             $this->load->view('myaccount',$data);
             $this->load->view('common/footer');
           }  
           
        
         else {
         
          if($this->Account_model->saveUser($user)){
          $data['login_result']='User Added Sucessfully';
          $this->session->set_flashdata('message','');
          $data['class']="alert alert-success";
          $data['status']=false;
          $this->load->view('common/header');
          $this->load->view('Logins',$data);
          $this->load->view('common/footer');
          }else {
            $data['result']= 'Unable To Add User';
            $data['class'] = 'alert alert-danger';
            $this->session->set_flashdata('tab','r');
            $data['status']=true;
            $this->load->view('common/header');
            $this->load->view('Logins',$data);
            $this->load->view('common/footer');
          }
          
          $this->db->select('user_id');
          $this->db->from('login');
          $this->db->order_by("user_id", "desc");
          $result= $this->db->get()->row();
          $id = $result->user_id+1;
          $config['protocol'] = 'smtp';
          $config['smtp_host'] = 'ssl://smtp.googlemail.com';
          $config['smtp_port'] = 465;
          $config['smtp_user'] = 'sonalirathore0009@gmail.com';
          $config['smtp_pass'] = 'passwordkyarkhu#@*';
          $config['mailtype'] = 'html';
          $message =   "
              <html>
              <head>
                <title>Verification Code</title>
              </head>
              <body>
                <h2>Thank you for Registering.</h2>
                <p>Your Account:</p>
                <p>Email: ".$this->data['user_email']."</p>
                <p>Password: ".$this->data['user_spassword']."</p>
                <p>Please click the link below to activate your account.</p>
                <h4><a href='".base_url()."login/activate/".$id.'/'.$code."'>Activate My Account</a></h4>
              </body>
              </html>
              ";
          $this->load->library('email', $config);
          $this->email->set_newline("\r\n");
          $this->email->from($config['smtp_user']);
          $this->email->to($this->data['user_email']);
          $this->email->subject('Signup Verification Email');
          $this->email->message($message);
          if($this->email->send()){
           $this->session->set_flashdata('message','Activation code sent to email');
          }else{
            $this->session->set_flashdata('message', $this->email->print_debugger());
          }     
        }
      }
    }

}
?>