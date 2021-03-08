<?php
class Privacy_policy extends CI_Controller
{
public function __construct()
{
parent::__construct();
         $this->load->model('Privacy_model');
 


}

    public function index(){
         $this->load->view('common/header');
  /*Display policy*/
        $data_policy['data_policy']=$this->Privacy_model->display_policy();
        $this->load->view('privacy_policy' , $data_policy);       
              $this->load->view('common/footer');
    }
}
?>