<?php 
class userModel extends CI_Model {

	public function insertuser($data){
		$this->db->insert('user',$data);
		return $this->db->insert_id();
	}

	public function updateuser($data){
		$this->db->where('userIDPK',$data['userIDPK']);
		return $this->db->update('user',$data);
	}

	public function deleteuser($userIDPK){
		$this->db->where('userIDPK',$userIDPK);
		$this->db->set('isActive',0);
		return $this->db->update('user');
	}

	public function searchuser($userIDFK){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array('userIDPK'=>$userIDFK,'isActive'=>1));
		$query = $this->db->get();
		return $query->row_array();
	}

	public function showuser(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array('isActive'=>1));	
		$query = $this->db->get();
		return $query->result_array();
	}
} 
