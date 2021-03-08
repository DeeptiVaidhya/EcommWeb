<?php 

class Model_category extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get active brand infromation */
	public function getActiveCategroy()
	{
		$sql = "SELECT * FROM categories WHERE active = ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getActiveSubCategroy()
	{
		$sql = "SELECT * FROM subcategory WHERE active = ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}
	
	
    public function getActiveChildSubCategroy()
	{
		$sql = "SELECT * FROM childsubcategory WHERE active = ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	/* get the brand data */
	public function getCategoryData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM categories WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM categories";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getSubcategoriesDetails($sub_category_id){
    	$this->db->select("*");
    	$this->db->from('subcategory');
    	$this->db->where('id',$sub_category_id);
    	return $this->db->get()->row();

	}

	public function create($data)
	{
		if($data) {
			$insert = $this->db->insert('categories', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('categories', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('categories');
			return ($delete == true) ? true : false;
		}
	}

}