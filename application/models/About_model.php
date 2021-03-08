<?php
class About_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function auth_check($data_blog)
    {
        $query = $this->db->get_where('blog', $data_blog);
        if ($query)
        {
            return $query->row();
        }
        return false;
    }
   

    // Display blog
    function display_about()
    {
        $query = $this->db->query("select * from about_us ");
        return $query->result();

    }

}
?>
