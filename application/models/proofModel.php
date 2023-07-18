<?php 
class proofModel extends CI_Model {

	public function insertproof($data){
		$this->db->insert('proof',$data);
		return $this->db->insert_id();
	}

	public function updateproof($data){
		$this->db->where('proofIDPK',$data['proofIDPK']);
		return $this->db->update('proof',$data);
	}

	public function deleteproof($proofIDPK){
		$this->db->where('proofIDPK',$proofIDPK);
		$this->db->set('isActive',0);
		return $this->db->update('proof');
	}

	public function searchproof($proofIDPK){
		$this->db->select('*');
		$this->db->from('proof');
		$this->db->where(array('proofIDPK'=>$proofIDPK,'isActive'=>1));
		$query = $this->db->get();
		return $query->row_array();
	}

	public function showproofbyProvider($providerIDFK){
		$this->db->select('*');
		$this->db->from('proof');
		$this->db->where(array('providerIDFK'=>$providerIDFK, 'isActive'=>1));
		$query = $this->db->get();
		return $query->result_array();
	}

	public function showproof(){
		$this->db->select('*');
		$this->db->from('proof');
		$this->db->where(array('isActive'=>1));	
		$query = $this->db->get();
		return $query->result_array();
	}

	public function downloadphoto($id){
		$this->db->select('*');
		$this->db->from('proof');
		$this->db->where(array('isActive'=>1,'providerIDFK'=>$id));
		$query = $this->db->get();
		return $query->result_array();
	}
} 
