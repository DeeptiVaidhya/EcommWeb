<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Admin_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->data['page_title'] = 'Pages';
		$this->load->model('model_pages');
	}

    /* 
    * It only redirects to the manage product page
    */
	public function index(){
        $this->data['data_about'] = $this->model_pages->getaboutusdata();;
		$this->render_template('aboutus/index', $this->data);	
	}

    public function list(){
        $this->data['data_policy'] = $this->model_pages->display_policy();;
        $this->render_template('privacypolicy/index', $this->data);   
    }

    public function bloglist(){
        $data_blog['data_blog'] = $this->model_pages->display_blog();
        $this->render_template('blog/index', $data_blog); 
    }

    public function create(){
        $this->render_template('aboutus/create', $this->data);
    }

    public function createpolicy(){
        $this->render_template('privacypolicy/create', $this->data);
    }

    public function about_post(){
        $image_name="";
        //Upload Images into the folder
        if (isset($_FILES["profile_image"]) && $_FILES["profile_image"]["size"] > 0) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['encrypt_name']  = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('profile_image')) {
                $data["responce"] = false;
                $data["error"]    = 'Error! : ' . $this->upload->display_errors();
            } else {
                $img_data   = $this->upload->data();
                $image_name = $img_data['file_name'];
            }
        }        
        //insert data into the database
        $this->load->model('model_pages');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('profile_image', 'Image');
        
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');
        
        if ($this->form_validation->run() === FALSE) {
            $this->render_template('aboutus/create', $this->data);
        } else {
            $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'profile_image' => $image_name              
            );
            $this->model_pages->insert_about($data);
            $data_about['data_about'] = $this->model_pages->display_about();
            $this->session->set_flashdata('success', 'Successfully created');
            redirect('pages/index/', 'refresh');
        }  
    }

    /*
    * It Delete the aboutus data from the aboutus table 
    * this function is called from the datatable ajax function
    */
    public function delete_row($id) {
        $this->model_pages->did_delete_row($id);
        $data_about['data_about'] = $this->model_pages->display_about();
        redirect('pages/index/', 'refresh');
        // $this->load->view('sidebar');
        // $this->load->view('services_list', $data_Services);
        
    }

    public function update(){       
        $image_name="";
        if (isset($_FILES["profile_image"]) && $_FILES["profile_image"]["size"] > 0) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['encrypt_name']  = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('profile_image')) {
                $data["responce"] = false;
                $data["error"]    = 'Error! : ' . $this->upload->display_errors();                
            } else {
                $img_data   = $this->upload->data();
                $image_name = $img_data['file_name'];                
            }
        }
        $about_data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'profile_image' => ($image_name)?$image_name:$this->input->post('about_image')            
        );
        $this->model_pages->edit('about_us', 'id = ' . $this->input->post('id'), $about_data);
        $data_about['data_about'] = $this->model_pages->display_about();       
        redirect('pages/index/', 'refresh');
    } 

    public function edit_aboutlist(){
        $id  = $this->uri->segment(3);
        $data_about = $this->db->query("select * from  about_us  where id=" . $id);
        $data['about_edit'] = $data_about->result_array();
        $this->render_template('aboutus/edit', $data);       
        
    }


    public function policy_post(){     
        //insert data into the database
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');
        
        if ($this->form_validation->run() === FALSE) {
            $this->render_template('privacypolicy/index', $this->data);
        } else {
            $policy_data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
            );
            
            $check = $this->model_pages->insert_policy($policy_data);
            $this->data['data_policy'] = $this->model_pages->display_policy();;
            redirect('privacypolicy/index/', 'refresh');

        }
    }

    public function edit_policylist(){                
        $id    = $this->uri->segment(3);
        $data_policy = $this->db->query("select * from  privacy_policy  where id=" . $id);
        // $data_projects['project_edit'] = $data_projects->result_array();
        $data['policy_edit'] = $data_policy->result_array();
        $this->render_template('privacypolicy/edit', $data);              
        
    }
    
    // save edit announcement list data
    public function updatepolicy(){
        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description')
        );
        unset($data['submit']);
        $this->model_pages->editpolicy('privacy_policy', 'id = ' . $this->input->post('id'), $data);
        $this->data['data_policy'] = $this->model_pages->display_policy();;
        $this->render_template('privacypolicy/index', $this->data); 
        
    } 
        // delete data
    public function delete_policylist($id) {   
        $this->model_pages->delete_policy($id);
        $this->data['data_policy'] = $this->model_pages->display_policy();;
        $this->render_template('privacypolicy/index', $this->data); 
    }


    public function edit_bloglist(){
        $id  = $this->uri->segment(3);
        $data_blog = $this->db->query("select * from  blog  where id=" . $id);
        $data['blog_edit'] = $data_blog->result_array();
        $this->render_template('blog/edit', $data);        
        
    }
    
    // save edit services list data
    public function updateblog(){ 
        $blog_data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description')
        );
        $this->model_pages->edit('blog', 'id = ' . $this->input->post('id'), $blog_data);
        $data_blog['data_blog'] = $this->model_pages->display_blog();       
        $this->render_template('blog/index', $data_blog);
    } 

    public function blog_post(){     
        //insert data into the database
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('sidebar');
            $this->load->view('blog');
        } else {
        $blog_data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
        );
        
        $check = $this->model_pages->insert_blog($blog_data);
        $data_blog['data_blog'] = $this->model_pages->display_blog();
        $this->render_template('blog/index', $data_blog); 
            
        }    
    }   
    // delete data
    public function delete_blog($id) {
        $this->model_pages->did_delete_row($id);
        $data_blog['data_blog'] = $this->model_pages->display_blog();
        $this->render_template('blog/index', $data_blog);
        // $this->load->view('sidebar');
        // $this->load->view('services_list', $data_Services);
        
    }
}