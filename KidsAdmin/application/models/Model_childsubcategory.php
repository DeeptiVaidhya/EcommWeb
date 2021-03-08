<?php 

class Model_childsubcategory extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get active brand infromation */
	public function getActiveCategroy()
	{
		$sql = "SELECT * FROM subcategory WHERE active = ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	/* get the brand data */
	public function getCategoryData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM subcategory WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM childsubcategory";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
    function getSubCategoryData($id) {
        	$sql = "SELECT * FROM subcategory WHERE cat_id = ?";
			$query = $this->db->query($sql, array($id));
		//	echo $this->db->last_query(); exit;
			return $query->result_array();
    }

	public function create($data)
	{
		if($data) {
			$insert = $this->db->insert('childsubcategory', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('subcategory', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('subcategory');
			return ($delete == true) ? true : false;
		}
	}

}