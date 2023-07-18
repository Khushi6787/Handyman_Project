<?php 
class requestModel extends CI_Model {

	public function insertrequest($data){
		$this->db->insert('request',$data);
		return $this->db->insert_id();
	}

	public function updaterequest($data){
		$this->db->where('requestIDPK',$data['requestIDPK']);
		return $this->db->update('request',$data);
	}

	public function deleterequest($requestIDPK){
		$this->db->where('requestIDPK',$requestIDPK);
		$this->db->set('isActive',0);
		return $this->db->update('request');
	}

	public function searchrequest($requestIDPK){
		$this->db->select('*');
		$this->db->from('request');
		$this->db->where(array('requestIDPK'=>$requestIDPK,'isActive'=>1));
		$query = $this->db->get();
		return $query->row_array();
	}

	public function showrequest(){
		$this->db->select('*');
		$this->db->from('request');
		$this->db->where(array('isActive'=>1));	
		$query = $this->db->get();
		return $query->result_array();
	}

	public function showrequestbyUser($userIDFK){
		$this->db->select('*');
		$this->db->from('request');
		$this->db->where(array('userIDFK'=>$userIDFK,'isActive'=>1));	
		$query = $this->db->get();
		return $query->result_array();
	}

	public function showrequestbyProvider($providerIDFK){
		$this->db->select('*');
		$this->db->from('request');
		$this->db->where(array('providerIDFK'=>$providerIDFK,'isActive'=>1));	
		$query = $this->db->get();
		return $query->result_array();
	}

	public function showreadrequest($usertype,$userIDFK){
		$this->db->select('*');
		$this->db->from('request');
		$this->db->where(array('isActive'=>1));	
		if($usertype == "admin"){
			$this->db->where(array('is_read_admin'=>0));	
		}else{
			$this->db->where(array('is_read_provider'=>0,'providerIDFK'=>$userIDFK));	
		}
		$query = $this->db->get();
		return $query->result_array();
	}
}