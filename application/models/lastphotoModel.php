<?php 
class lastphotoModel extends CI_Model {

	public function insertlastphoto($data){
		$this->db->insert('last_photo_service',$data);
		return $this->db->insert_id();
	}

	public function updatelastphoto($data){
		$this->db->where('lastphotoIDPK',$data['lastphotoIDPK']);
		return $this->db->update('last_photo_service',$data);
	}

	public function deletelastphoto($lastphotoIDPK){
		$this->db->where('lastphotoIDPK',$lastphotoIDPK);
		$this->db->set('isActive',0);
		return $this->db->update('last_photo_service');
	}

	public function searchlastphoto($lastphotoIDPK){
		$this->db->select('*');
		$this->db->from('last_photo_service');
		$this->db->where(array('lastphotoIDPK'=>$lastphotoIDPK,'isActive'=>1));
		$query = $this->db->get();		
		return $query->row_array();
	}

	public function showlastphotobyProvider($id){
		$this->db->select('*');
		$this->db->from('last_photo_service');
		$this->db->where(array('providerIDFK'=>$id,'isActive'=>1));
		$query = $this->db->get();		
		return $query->result_array();
	}

	public function showlastphoto(){
		$this->db->select('l.*,p.providerName');
		$this->db->from('last_photo_service l');
		$this->db->join('provider p','p.providerIDPK =l.providerIDFK');
		$this->db->where(array('l.isActive'=>1));		
		$query = $this->db->get();
		return $query->result_array();
	}

	public function viewphoto($id){
		$this->db->select('*');
		$this->db->from('last_photo_service');
		$this->db->where(array('isActive'=>1,'providerIDFK'=>$id));
		$query = $this->db->get();
		return $query->result_array();
	}
} 
