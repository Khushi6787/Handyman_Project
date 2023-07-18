<?php 
class providerModel extends CI_Model {

	public function insertprovider($data){
		$this->db->insert('provider',$data);
		return $this->db->insert_id();
	}

	public function updateprovider($data){
		$this->db->where('providerIDPK',$data['providerIDPK']);
		return $this->db->update('provider',$data);
	}

	public function deleteprovider($providerIDPK){
		$this->db->where('providerIDPK',$providerIDPK);
		$this->db->set('isActive',0);
		return $this->db->update('provider');
	}

	public function searchprovider($providerIDPK){
		$this->db->select('*');
		$this->db->from('provider');
		$this->db->where(array('providerIDPK'=>$providerIDPK,'isActive'=>1));
		$query = $this->db->get();
		return $query->row_array();
	}

	public function showprovider(){
		$this->db->select('p.*,t.typeName,c.categoryName,a.areaName');
		$this->db->from('provider p');
		$this->db->join('provider_type t','t.typeIDPK =p.typeIDFK');
		$this->db->join('category c','c.categoryIDPK =p.categoryIDFK');
		$this->db->join('area a','a.areaIDPK =p.areaIDFK');
		$this->db->where(array('p.isActive'=>1));	
		$query = $this->db->get();
		return $query->result_array();
	}

	public function showproviderbyID($categoryIDFK){
		$this->db->select('p.*');
		$this->db->from('provider p');
		$this->db->where(array('categoryIDFK'=>$categoryIDFK,'p.isActive'=>1));	
		$query = $this->db->get();
		return $query->result_array();
	}

	public function showproviderdetails(){
		$this->db->select('p.*');
		$this->db->from('provider p');
		$this->db->where(array('p.isActive'=>1));	
		$query = $this->db->get();
		return $query->result_array();
	}
} 
