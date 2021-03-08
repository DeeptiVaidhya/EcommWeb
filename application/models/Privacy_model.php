<?php
class Privacy_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function auth_check($data_policy)
    {
        $query = $this->db->get_where('privacy_policy', $data_policy);
        if ($query)
        {
            return $query->row();
        }
        return false;
    }
   

    // Display terms
    function display_policy()
    {
        $query = $this->db->query("select * from  privacy_policy ");
        return $query->result();

    }

}
?>
