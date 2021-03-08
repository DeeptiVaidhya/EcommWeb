<?php
class Terms_condition extends CI_Controller
{
    
    public function index()
    {

        $this->load->view('common/header');
        $this->load->view('terms_condition');
        $this->load->view('common/footer');
    }
    
}
?>