<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Donation extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Attributes';

		$this->load->model('model_attributes');
	}

	/* 
	* redirect to the index page 
	*/
	public function index()
	{
		$data['donation'] = $this->model_attributes->getDonationData();
		
		$this->load->view('templates/header');
		$this->load->view('templates/header_menu');
		$this->load->view('templates/side_menubar');
		
		$this->load->view('donation/DonationList',$data);
		$this->load->view('templates/footer');
	}

	public function getDonationById(){
    	$id = $this->input->post('id');
    	// $this->model_attributes->getDonationDataById($id);
    	$this->db->select("id,donation_status,donation_amount");
    	$this->db->from('Donate');
    	$this->db->where('id',$id);
    	echo json_encode($this->db->get()->row());
	}

	public function updateDonation(){

		$data = $this->input->post();
		$id = $this->input->post('id');
		unset($data['id']);
		// print_r($data);exit;
         $this->db->where('id',$id);
		$this->db->update('Donate',$data);
		
		
	}

	

}	