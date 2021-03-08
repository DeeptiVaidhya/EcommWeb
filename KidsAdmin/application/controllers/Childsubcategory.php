<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Childsubcategory extends Admin_Controller 
{
	public function __construct()
	{
		
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'ChildSubCategory';

		$this->load->model('model_childsubcategory');
		$this->load->model('model_category');
	}

	/* 
	* It only redirects to the manage category page
	*/
	public function index(){	
		

		$this->data['categoryData'] = $this->model_category->getActiveCategroy();
		$this->render_template('childsubcategory/index', $this->data);	
	}	

	/*
	* It checks if it gets the category id and retreives
	* the category information from the category model and 
	* returns the data into json format. 
	* This function is invoked from the view page.
	*/
	public function fetchCategoryDataById($id) 
	{

		if($id) {
			$data = $this->model_subcategory->getCategoryData($id);
			echo json_encode($data);
		}

		return false;
	}
	
	
	// Ajax function to get the parent subcategories
	function getsubcategories() {
	    $parent_id = $this->input->get('parent_id');
	    $data = $this->model_childsubcategory->getSubCategoryData($parent_id);
	    
	   // print_r($data); exit;
	    foreach($data as $subcat) {
	        echo '<option value="'.$subcat['id'].'">'.$subcat['name'].'</option>';
	    }
	}

	/*
	* Fetches the category value from the category table 
	* this function is called from the datatable ajax function
	*/
	public function fetchCategoryData()
	{
		$result = array('data' => array());

		$data = $this->model_childsubcategory->getCategoryData();

		foreach ($data as $key => $value) {

			// button
			$buttons = '';

			//if(in_array('updateSubcategory', $this->permission)) {
				$buttons .= '<a  class="btn btn-default" href="'.base_url().'childsubcategory/update/'.$value['id'].'"><i class="fa fa-pencil"></i></button>';
			//}

			//if(in_array('deleteSubcategory', $this->permission)) {
				$buttons .= ' <a type="button" class="btn btn-default" href="'.base_url().'childsubcategory/remove/'.$value['id'].'"><i class="fa fa-trash"></i></a>';
			//}
				

			$status = ($value['active'] == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>';

			$result['data'][$key] = array(
				$value['name'],
				$status,
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}

	/*
	* Its checks the category form validation 
	* and if the validation is successfully then it inserts the data into the database 
	* and returns the json format operation messages
	*/
	public function create(){

		$response = array();

		
		$this->form_validation->set_rules('cat', 'Category name', 'trim|required');
		
			$this->form_validation->set_rules('subcat', 'Sub Category name', 'trim|required');
			
			
		$this->form_validation->set_rules('childsub_category_name', 'Child Sub Category name', 'trim|required');
		
		$this->form_validation->set_rules('active', 'Active', 'trim|required');

		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        if ($this->form_validation->run() == TRUE) {
        	$data = array(
        		
        		'category_id' => $this->input->post('cat'),
        		'sub_category_id' => $this->input->post('subcat'),
        		'name' => $this->input->post('childsub_category_name'),
        		'active' => $this->input->post('active'),	
        	);
        	//echo "<pre>";print_r($data);die;

        	$create = $this->model_childsubcategory->create($data);
        	if($create == true) {
        		$response['success'] = true;
        		$response['messages'] = 'Succesfully created';
        	}
        	else {
        		$response['success'] = false;
        		$response['messages'] = 'Error in the database while creating the brand information';			
        	}
        }
        else {
        	$response['success'] = false;
        	foreach ($_POST as $key => $value) {
        		$response['messages'][$key] = form_error($key);
        	}
        }

        echo json_encode($response);
	}

	/*
	* Its checks the category form validation 
	* and if the validation is successfully then it updates the data into the database 
	* and returns the json format operation messages
	*/
	public function update($id=0)
	{

		// if(!in_array('updateSubcategory', $this->permission)) {
		// 	redirect('dashboard', 'refresh');
		// }
		if(empty($this->input->post())){
			$this->data['update_data'] = $this->model_category->getSubcategoriesDetails($id);
			$this->data['categoryData'] = $this->model_category->getActiveCategroy();
		    $this->render_template('subcategory/update', $this->data);	
         	
		}
		else {
			$update_data = $this->input->post();
			$id = $update_data['update_id'];
			unset($update_data['update_id']);
			$this->db->where('id',$id);
			$this->db->update('subcategory',$update_data);
			redirect('subcategory/');

		  

		
		}
	}

	/*
	* It removes the category information from the database 
	* and returns the json format operation messages
	*/
	public function remove()
	{
		// if(!in_array('deleteSubcategory', $this->permission)) {
		// 	redirect('dashboard', 'refresh');
		// }
		
		$category_id = $this->uri->segment(3);

		$response = array();
		if($category_id) {
			$delete = $this->model_subcategory->remove($category_id);
			if($delete == true) {
				$response['success'] = true;
				$response['messages'] = "Successfully removed";	
			}
			else {
				$response['success'] = false;
				$response['messages'] = "Error in the database while removing the brand information";
			}
		}
		else {
			$response['success'] = false;
			$response['messages'] = "Refersh the page again!!";
		}
        
        redirect('subcategory/','refresh');


		
	}

}