<?php 
class authModel extends CI_Model {

	public function insertauth($data){
		$this->db->insert('auth',$data);
		return $this->db->insert_id();
	}

	public function updateauth($data){
		$this->db->where('authIDPK',$data['authIDPK']);
		return $this->db->update('auth',$data);
	}

	public function deleteauth($authIDPK){
		$this->db->where('authIDPK',$authIDPK);
		$this->db->set('isActive',0);
		return $this->db->update('auth');
	}

	public function searchauth($authIDPK){
		$this->db->select('*');
		$this->db->from('auth');
		$this->db->where(array('authIDPK'=>$authIDPK,'isActive'=>1));
		$query = $this->db->get();
		return $query->row_array();
	}

	public function user_data_email($email,$password){
		$this->db->select('*');
		$this->db->from('auth');
		$this->db->where(array('email'=>$email,'password'=>$password));
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		return $query->row_array();
	}

	public function showauth(){
		$this->db->select('*');
		$this->db->from('auth');
		$this->db->where(array('isActive'=>1,'usertype'=>'auth'));	
		$query = $this->db->get();
		return $query->result_array();
	}

    public function showprovider(){
		$this->db->select('*');
		$this->db->from('provider');
		$this->db->where(array('isActive'=>1,'usertype'=>'provider'));	
		$query = $this->db->get();
		return $query->result_array();
	}

	public function user_data_by_type(){
		$this->db->select('*');
		$this->db->from('auth');
		$this->db->where(array('isActive'=>1,'usertype'=>'client'));	
		$query = $this->db->get();
		return $query->result_array();
	}
} 
