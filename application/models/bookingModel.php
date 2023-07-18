<?php 
class bookingModel extends CI_Model {

	public function insertbooking($data){
		$this->db->insert('booking',$data);
		return $this->db->insert_id();
	}

	public function updatebooking($data){
		$this->db->where('bookingIDPK',$data['bookingIDPK']);
		return $this->db->update('booking',$data);
	}

	public function deletebooking($bookingIDPK){
		$this->db->where('bookingIDPK',$bookingIDPK);
		$this->db->set('isActive',0);
		return $this->db->update('booking');
	}

	public function searchbooking($bookingIDPK){
		$this->db->select('*');
		$this->db->from('booking');
		$this->db->where(array('bookingIDPK'=>$bookingIDPK,'isActive'=>1));
		$query = $this->db->get();
		return $query->row_array();
	}

	public function showbooking(){
		$this->db->select('*');
		$this->db->from('booking');
		$this->db->where(array('isActive'=>1));
		$query = $this->db->get();
		return $query->result_array();
	}

	public function showbookingbyUser($userIDFK){
		$this->db->select('booking.*');
		$this->db->from('booking');
		$this->db->join('request r','r.requestIDPK=booking.requestIDFK');
		$this->db->where(array('r.userIDFK'=>$userIDFK,'booking.isActive'=>1));
		$query = $this->db->get();
		return $query->result_array();
	}

	public function showbookingbyProvider($providerIDFK){
		$this->db->select('booking.*');
		$this->db->from('booking');
		$this->db->join('request r','r.requestIDPK=booking.requestIDFK');
		$this->db->where(array('r.providerIDFK'=>$providerIDFK,'booking.isActive'=>1));
		$query = $this->db->get();
		return $query->result_array();
	}

	public function booking_data_by_status($status){
		$this->db->select('*');
		$this->db->from('booking');
		$this->db->where(array('isActive'=>1,'status'=>$status));
		$query = $this->db->get();
		return $query->result_array();
	}

	public function booking_data_by_status_provider($status,$userIDFK){
		$this->db->select('booking.*');
		$this->db->from('booking');
		$this->db->join('request r','r.requestIDPK=booking.requestIDFK');
		$this->db->where(array('r.providerIDFK'=>$userIDFK,'booking.isActive'=>1,'booking.status'=>$status));
		$query = $this->db->get();
		return $query->result_array();
	}

	public function complete_data_by_status_provider($status,$userIDFK){
		$this->db->select('booking.*');
		$this->db->from('booking');
		$this->db->join('request r','r.requestIDPK=booking.requestIDFK');
		$this->db->where(array('r.providerIDFK'=>$userIDFK,'booking.isActive'=>1,'booking.status'=>$status));
		$query = $this->db->get();
		return $query->result_array();
	}

	public function showbookingbyID($requestIDFK){
		$this->db->select('*');
		$this->db->from('booking');
		$this->db->where(array('requestIDFK'=>$requestIDFK,'isActive'=>1));
		$query = $this->db->get();
		return $query->result_array();
	}
} 
