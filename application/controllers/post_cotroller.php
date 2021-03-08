<?php 

/**
 * 
 */
class Post_cotroller extends CI_Controller
{
	
	function __construct(argument)
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model("Post_m");
	}


}

?>