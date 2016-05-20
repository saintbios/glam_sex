<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Breasts_type extends CI_Model
{
	public function getAll()
	{
		$return_data = array();
		
		$this->db->order_by('id', 'ASC');
		
		if(! $query = $this->db->get('breasts_type')) {
			return $this->db->error();
		} else {
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}
	}
	
	public function getById($pId)
	{
		if(! $query = $this->db->get_where('breasts_type', array('id' => $pId))) {
			return $this->db->error();
		} else {
			if ($query->num_rows() > 0) {
				return $query->row();
			} else {
				return false;
			}
		}
	}
	
	public function getByLabel($pLabel)
	{
		if(! $query = $this->db->get_where('breasts_type', array('label' => $pLabel))) {
			return $this->db->error();
		} else {
			if ($query->num_rows() > 0) {
				return $query->row();
			} else {
				return false;
			}
		}
	}
	
	public function insert($pLabel)
	{
		if(!$returnElt = $this->getByLabel($pLabel)) {
			return $this->_insert($pLabel);
		} else {
			return $returnElt->id;
		}
	}
	
	private function _insert($pLabel)
	{
		$error = false;
		$return_data = array();
		$insert_data = array(
				'label' => $this->db->escape_str($pLabel)
		);
		
		if(! $this->db->insert('breasts_type', $insert_data)) {
			return $this->db->error();
		} else {
			return $this->db->insert_id();
		}
	}
}