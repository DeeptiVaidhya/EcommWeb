<?php
class Blog extends CI_Controller
{
public function __construct()
{
parent::__construct();
 $this->load->model('Blog_model');
}

    public function index(){
         $this->load->view('common/header');
  /*Display Blog*/
        $data_blog['data_blog']=$this->Blog_model->display_blog();
        $this->load->view('blog' , $data_blog);  
          $this->load->view('common/footer');
    }
}
?>