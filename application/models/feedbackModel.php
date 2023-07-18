<?php 
class feedbackModel extends CI_Model {

	public function insertfeedback($data){
		$this->db->insert('feedback',$data);
		return $this->db->insert_id();
	}

	public function updatefeedback($data){
		$this->db->where('feedbackIDPK',$data['feedbackIDPK']);
		return $this->db->update('feedback',$data);
	}

	public function deletefeedback($feedbackIDPK){
		$this->db->where('feedbackIDPK',$feedbackIDPK);
		$this->db->set('isActive',0);
		return $this->db->update('feedback');
	}

	public function searchfeedback($feedbackIDPK){
		$this->db->select('*');
		$this->db->from('feedback');
		$this->db->where(array('feedbackIDPK'=>$feedbackIDPK,'isActive'=>1));
		$query = $this->db->get();
		return $query->row_array();
	}

	public function showfeedback(){
		$this->db->select('f.*');
		$this->db->from('feedback f');
		$this->db->where(array('f.isActive'=>1));		
		$query = $this->db->get();
		return $query->result_array();
	}

	public function showfeedbackbyUser($userIDFK){
		$this->db->select('*');
		$this->db->from('feedback');
		$this->db->where(array('userIDFK'=>$userIDFK,'isActive'=>1));
		$query = $this->db->get();
		return $query->result_array();
	}
} 
