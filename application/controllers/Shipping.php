<?php
class Shipping extends CI_Controller
{
    
    public function index()
    {

        $this->load->view('common/header');
        $this->load->view('shipping');
        $this->load->view('common/footer');
    }
    
}
?>