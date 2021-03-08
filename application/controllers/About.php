<?php
class About extends CI_Controller
{
public function __construct()
{
parent::__construct();
 $this->load->model('About_model');
}

    public function index(){
         $this->load->view('common/header');
  /*Display Blog*/
        $data_about['data_about']=$this->About_model->display_about();
        $this->load->view('about' , $data_about);  
          $this->load->view('common/footer');
    }
}
?>