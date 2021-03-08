<?php
class Termscondition_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function auth_check($data_terms)
    {
        $query = $this->db->get_where(' terms_condition', $data_terms);
        if ($query)
        {
            return $query->row();
        }
        return false;
    }
   

    // Display terms
    function display_terms()
    {
        $query = $this->db->query("select * from  terms_condition ");
        return $query->result();

    }

}
?>
