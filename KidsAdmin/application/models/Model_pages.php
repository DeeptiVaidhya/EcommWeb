<?php 

class Model_pages extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get active brand infromation */
	public function getaboutusdata()
	{
		$sql = "SELECT * FROM about_us";
		$query = $this->db->query($sql, array(1));
		return $query->result();
	}

	public function insert_about($about_data){
        $insert = $this->db->insert('about_us', $about_data);
        if ($insert) {
           return $this->db->insert_id();
        
        } else {
            return false;
        }
    }

    function display_about(){
        $query = $this->db->query("select * from about_us");
        return $query->result();

    }

    // edit about list
    public function edit($tb,$where,$set){
        return $this->db->set($set)->where($where)->update($tb);
     
    }
    //delete about list by id
    public function did_delete_row($id){
        $this->db->where('id', $id);
        $this->db->delete('about_us');
    }

    public function insert_policy($policy_data){
 
        $insert = $this->db->insert('privacy_policy', $policy_data);
        if ($insert) {
           return $this->db->insert_id();
        
        } else {
            return false;
        }
    }

       // Display policy
    function display_policy(){
        $query = $this->db->query("select * from privacy_policy ORDER BY id desc");
        return $query->result();

    }

// edit announcement list
    public function editpolicy($tb,$where,$set){
    	//echo $tb."===".$where."=========";print_r($set);
        return $this->db->set($set)->where($where)->update($tb);
    }

      //delete events list by id
   	public function delete_policy($id){
	    $this->db->where('id', $id);
	    $this->db->delete('privacy_policy');
    }

    public function insert_blog($blog_data){
        $insert = $this->db->insert('blog', $blog_data);
        if ($insert) {
           return $this->db->insert_id();
        } else {
            return false;
        }
    }

    // Display blog
    function display_blog(){
        $query = $this->db->query("select * from blog ORDER BY id desc");
        return $query->result();
    }

	// edit blog list
    public function editblog($tb,$where,$set){
        return $this->db->set($set)->where($where)->update($tb);
    }

    //delete events list by id
   	public function deleteblog($id){
	    $this->db-> where('id', $id);
	    $this->db-> delete('blog');
    }
}