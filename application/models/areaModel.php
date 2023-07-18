<?php 
class areaModel extends CI_Model {

	public function insertarea($data){
		$this->db->insert('area',$data);
		return $this->db->insert_id();
	}

	public function updatearea($data){
		$this->db->where('areaIDPK',$data['areaIDPK']);
		return $this->db->update('area',$data);
	}

	public function deletearea($areaIDPK){
		$this->db->where('areaIDPK',$areaIDPK);
		$this->db->set('isActive',0);
		return $this->db->update('area');
	}

	public function searcharea($areaIDPK){
		$this->db->select('*');
		$this->db->from('area');
		$this->db->where(array('areaIDPK'=>$areaIDPK,'isActive'=>1));
		$query = $this->db->get();
		return $query->row_array();
	}

	public function showarea(){
		$this->db->select('*');
		$this->db->from('area');
		$this->db->where(array('isActive'=>1));		
		$query = $this->db->get();
		return $query->result_array();
	}
} 
