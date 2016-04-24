<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Photographer_tag extends CI_Model
{
	public function getAll()
	{
		$return_data = array();
		$this->db->order_by('photographer_id', 'ASC');
		
		if(! $query = $this->db->get('photographer_tag')) {
			return $this->db->error();
		} else {
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $key=>$row) {
					$return_data[$key] = $row;
					return $return_data;
				}
			} else {
				return false;
			}
		}
	}
	
	public function getByPhotographerId($pPhotographerId)
	{
		if(! $query = $this->db->get_where('photographer_tag', array('photographer_id' => $pPhotographerId))) {
			return $this->db->error();
		} else {
			if($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}
	}
	
	public function getByTagId($pTagId)
	{
		if(! $query = $this->db->get_where('photographer_tag', array('tag_id' => $pTagId))) {
			return $this->db->error();
		} else {
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}
	}
	
	public function getByIds($pPhotographerId, $pTagId)
	{
		if(! $query = $this->db->get_where('photographer_tag', array('photographer_id' => $pPhotographerId, 'tag_id' => $pTagId))) {
			return $this->db->error();
		} else {
			if ($query->num_rows() > 0) {
				return $query->row();
			} else {
				return false;
			}
		}
	}
	
	public function insert($pPhotographerId, $pTagId)
	{
		if(!$returnElt = $this->getByIds($pPhotographerId, $pTagId)) {
			return $this->_insert($pPhotographerId, $pTagId);
		}
	}
	
	private function _insert($pPhotographerId, $pTagId)
	{
		$error = false;
		$return_data = array();
		$insert_data = array(
				'photographer_id' => $pPhotographerId,
				'tag_id' => $pTagId
		);
	
		if(! $this->db->insert('photographer_tag', $insert_data)) {
			return $this->db->error();
		} else {
			return $this->db->insert_id();
		}
	}
}