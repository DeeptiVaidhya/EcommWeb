<?php

class UserSetting extends CI_Controller {
	public function index(){
		$this->load->view('sidebar');
        $this->load->view('reset_password');    

	}


	   public function updatePwd() {
    	$this->form_validation->set_rules('password' ,'Current Password','required');
    	$this->form_validation->set_rules('newpass' , 'New Password','required|alpha_numeric');
    	$this->form_validation->set_rules('confpassword' , 'Confirm Password','required|matches[newpass]');
		if($this->form_validation->run() == FALSE) {

			$this->load->view('sidebar');
            $this->load->view('reset_password');
			}
		    else {

		    	
			$curr_password = $this->input->post('password');
			$new_password = $this->input->post('newpass');
			$conf_password = $this->input->post('confpassword');
			$this->load->model('Resetpassword_model');
			// $userid= '1';
			if(!empty($this->session->userdata('user')['username'])){
				$username = $this->session->userdata('user')['username'];
				$this->db->select('*');
				$this->db->from('register');
				$this->db->where('username',$username);
				$u = $this->db->get()->result_array();
				$userid = $u[0]['id'];
			}

			$passwd = $this->Resetpassword_model->getCurrPassword($userid);
			
				
              if($this->Resetpassword_model->updatePassword($new_password , $userid)) {
              	
                $this->session->set_flashdata('result','Password Updated Successfully');
                redirect('Reset_password');
		    }
    

    
    
}
}


public function Account(){
	if(!empty($this->session->userdata('user'))){
	$this->db->select('*');
	$this->db->from('register');
	$this->db->where('username',$this->session->userdata('user')['username']);
	$data['users'] = $this->db->get()->result_array();
	}
	else {


	}

	$this->load->view('sidebar');
	$this->load->view('User/setting',$data);

}

public function UpdateUser(){
	$data = $this->input->post();
	$update_data = array('user'=>$data['username'],'email'=>$data['email']);
	$this->db->where('id',$data['id']);

	if($this->db->update('register',$update_data)){
		$this->session->set_userdata('user',array('username'=>$update_data['username']));
		$this->session->set_flashdata('result','User Updated Successfully');
		redirect('UserSetting/Account');
	}

}
}