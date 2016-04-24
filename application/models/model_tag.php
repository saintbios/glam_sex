<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_tag extends CI_Model
{
	public function getAll()
	{
		$return_data = array();
		
		$this->db->order_by('id', 'ASC');
		
		if(! $query = $this->db->get('model_tag')) {
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
	
	public function getByModelId($pModelId)
	{
		if(! $query = $this->db->get_where('model_tag', array('model_id' => $pModelId))) {
			return $this->db->error();
		} else {
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}
	}
	
	public function getByTagId($pTagId)
	{
		if(! $query = $this->db->get_where('model_tag', array('tag_id' => $pTagId))) {
			return $this->db->error();
		} else {
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}
	}
	
	public function getByIds($pModelId, $pTagId)
	{
		if(! $query = $this->db->get_where('model_tag', array('model_id' => $pModelId, 'tag_id' => $pTagId))) {
			return $this->db->error();
		} else {
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}
	}
	
	public function insert($pModelId, $pTagId)
	{
		if(!$returnElt = $this->getByIds($pModelId, $pTagId)) {
			return $this->_insert($pModelId, $pTagId);
		}
	}
	
	private function _insert($pModelId, $pTagId)
	{
		$error = false;
		$return_data = array();
		$insert_data = array(
				'model_id' => $pModelId,
				'tag_id' => $pTagId
		);
	
		if(! $this->db->insert('model_tag', $insert_data)) {
			return $this->db->error();
		} else {
			return $this->db->insert_id();
		}
	}
}