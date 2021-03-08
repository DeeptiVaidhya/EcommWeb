<?php
class Return_policy extends CI_Controller
{
    
    public function index()
    {

        $this->load->view('common/header');
        $this->load->view('return_policy');
        $this->load->view('common/footer');
    }
    
}
?>