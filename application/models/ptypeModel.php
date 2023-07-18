<?php 
class ptypeModel extends CI_Model {

	public function insertptype($data){
		$this->db->insert('provider_type',$data);
		return $this->db->insert_id();
	}

	public function updateptype($data){
		$this->db->where('typeIDPK',$data['typeIDPK']);
		return $this->db->update('provider_type',$data);
	}

	public function deleteptype($typeIDPK){
		$this->db->where('typeIDPK',$typeIDPK);
		$this->db->set('isActive',0);
		return $this->db->update('provider_type');
	}

	public function searchptype($typeIDPK){
		$this->db->select('*');
		$this->db->from('provider_type');
		$this->db->where(array('typeIDPK'=>$typeIDPK,'isActive'=>1));
		$query = $this->db->get();
		return $query->row_array();
	}

	public function showptype(){
		$this->db->select('*');
		$this->db->from('provider_type');
		$this->db->where(array('isActive'=>1));	
		$query = $this->db->get();
		return $query->result_array();
	}
} 
