<?php

class Donate extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->files='';
		$this->user_id='';
	}

	public function index(){
		if(!empty($this->input->post())){
		    $this->load->library('form_validation');
			$this->form_validation->set_rules('first_name', 'First Name', 'required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required');
			$this->form_validation->set_rules('phone_number', 'Phone Number', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('gender', 'Gender', 'required');
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
                if ($this->form_validation->run() == FALSE)
                {
					$this->load->view('common/header');
					$this->load->view('DonateView');
					$this->load->view('common/footer');
                }
                else
                {
                $input = $this->input->post();
				$donate_data = array('user_id'=>$this->user_id,'first_name'=>$input['first_name'],'last_name'=>$input['last_name'],'email'=>$input['email'],'phone_number'=>$input['phone_number'],'gender'=>$input['gender']);
				$filesCount = count($_FILES['files']['name']);

				for($i = 0; $i < $filesCount; $i++){
					$_FILES['file']['name']     = $_FILES['files']['name'][$i];
					$_FILES['file']['type']     = $_FILES['files']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
					$_FILES['file']['error']     = $_FILES['files']['error'][$i];
					$_FILES['file']['size']     = $_FILES['files']['size'][$i];

					// File upload configuration
					$uploadPath = 'uploads/Donate/';
					$config['upload_path'] = $uploadPath;
					$config['allowed_types'] = 'jpg|jpeg|png|gif';

					// Load and initialize upload library
					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					// Upload file to server
					if($this->upload->do_upload('file')){
						// Uploaded file data
						$fileData = $this->upload->data();
						$uploadData[$i] = $fileData['file_name'];
						
					}
					
				}
				
                if(!empty($uploadData))
                {
				    $this->files = implode(',',$uploadData);
                }
                else 
                {
                	$this->files = '';
                }

				$donate_data['images'] = $this->files;

				$this->db->insert('Donate',$donate_data);
				$this->session->set_flashdata('success','Donated Successfully');
				redirect('Donate');
	}
}


	else {
		$this->load->view('common/header');
		$this->load->view('DonateView');
		$this->load->view('common/footer');
	}
    }

	}