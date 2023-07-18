<?php 
class inquiryModel extends CI_Model {

	public function insertinquiry($data){
		$this->db->insert('inquiry',$data);
		return $this->db->insert_id();
	}

	public function updateinquiry($data){
		$this->db->where('inquiryIDPK',$data['inquiryIDPK']);
		return $this->db->update('inquiry',$data);
	}

	public function deleteinquiry($inquiryIDPK){
		$this->db->where('inquiryIDPK',$inquiryIDPK);
		$this->db->set('isActive',0);
		return $this->db->update('inquiry');
	}

	public function searchinquiry($inquiryIDPK){
		$this->db->select('*');
		$this->db->from('inquiry');
		$this->db->where(array('inquiryIDPK'=>$inquiryIDPK,'isActive'=>1));
		$query = $this->db->get();
		return $query->row_array();
	}

	public function showinquiry(){
		$this->db->select('*');
		$this->db->from('inquiry');
		$this->db->where(array('isActive'=>1));	
		$query = $this->db->get();
		return $query->result_array();
	}

	public function showreadinquiry(){
		$this->db->select('*');
		$this->db->from('inquiry');
		$this->db->where(array('isActive'=>1));	
		$this->db->where(array('is_read'=>0));	
		$query = $this->db->get();
		return $query->result_array();
	}
} 
