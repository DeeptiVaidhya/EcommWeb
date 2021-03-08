<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller{
	public function __construct(){
		parent::__construct();
	    $this->load->library('form_validation');
        $this->load->library('session');
	}

    public function index(){
 
        $this->load->view('common/header');
        $this->load->view('contact');
        $this->load->view('common/footer');

        if(!empty($this->session->flashdata('result'))){
        	// sleep(5);
        	// redirect('home');
        }
    }

    public function submit(){
                $this->load->library('form_validation');

        $data = $formData = array();
        
        // If contact request is submitted
        if($this->input->post('contactSubmit')){
            
            // Get the form data
            $formData = $this->input->post();
            
            // Form field validation rules
            $this->form_validation->set_rules('name', 'Name', 'trim|required|alpha');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('contact_no', 'Phone', 'trim|required|numeric|min_length[10]|max_length[10]');
            $this->form_validation->set_rules('message', 'Message', 'trim|required');
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                
                // Define email data
                $mailData = array(
                    'name' => $formData['name'],
                    'email' => $formData['email'],
                    'contact_no' => $formData['contact_no'],
                    'message' => $formData['message']
                );
                
                // Send an email to the site admin
                $send = $this->sendEmail($mailData);
                
                // Check email sending status
                if($send){
                    // Unset form data
                    $this->session->set_flashdata('result','Enquiry send successfully');
                    $formData = array();
                    
                    $data['status'] = array(
                        'type' => 'success',
                        'msg' => 'Your Contact request has been submitted successfully.'
                    );
                }else{
                    $data['status'] = array(
                        'type' => 'error',
                        'msg' => 'Some problems occured, please try again.'
                    );
                }
            }
        }
        
        // Pass POST data to view
        $data['postData'] = $formData;
        
        // Pass the data to view
        $this->session->set_flashdata('result','Inquiry Send Successfully');
        redirect('/');

    }
    
    private function sendEmail($mailData){
        // Load the email library
        $this->load->library('email');
        // Mail config
        $to = 'sonalirathore0009@gmail.com';
        $from = 'info@alphawizz.com';
        $fromName = 'Sonali Rathore';
        $mailSubject = 'Contact Request Submitted by '.$mailData['name'];
        
        // Mail content
        $mailContent = '
            <h2>Contact Request Submitted</h2>
            <p><b>Name: </b>'.$mailData['name'].'</p>
            <p><b>Email: </b>'.$mailData['email'].'</p>
            <p><b>Phone: </b>'.$mailData['contact_no'].'</p>
            <p><b>Message: </b>'.$mailData['message'].'</p>';
            
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->to($to);
        $this->email->from($from, $fromName);
        $this->email->subject($mailSubject);
        $this->email->message($mailContent);
        // Send email & return status
        $this->email->send();
        redirect("/");
    }
    
}