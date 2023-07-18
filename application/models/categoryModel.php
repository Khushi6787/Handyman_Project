<?php 
class categoryModel extends CI_Model {

	public function insertcategory($data){
		$this->db->insert('category',$data);
		return $this->db->insert_id();
	}

	public function updatecategory($data){
		$this->db->where('categoryIDPK',$data['categoryIDPK']);
		return $this->db->update('category',$data);
	}

	public function deletecategory($categoryIDPK){
		$this->db->where('categoryIDPK',$categoryIDPK);
		$this->db->set('isActive',0);
		return $this->db->update('category');
	}

	public function searchcategory($categoryIDPK){
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where(array('categoryIDPK'=>$categoryIDPK,'isActive'=>1));
		$query = $this->db->get();
		return $query->row_array();
	}

	public function showcategory(){
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where(array('isActive'=>1));
		$query = $this->db->get();
		return $query->result_array();
	}
} 
