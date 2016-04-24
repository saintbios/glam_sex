<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Photographer extends CI_Model
{	
	public function __construct()
	{
		$this->load->model('photographer_tag', NULL, TRUE);
		$this->load->model('tag', NULL, TRUE);
	}
	
	public function getAll()
	{
		$return_data = array();
		
		$this->db->order_by('id', 'ASC');

		if(! $query = $this->db->get('photographer')) {
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
		if(!$query = $this->db->get_where('photographer', array('id' => $pId))) {
			return $this->db->error();
		} else {
			if ($query->num_rows() > 0) {
				return $query->row();
			} else {
				return false;
			}
		}
	}
	
	public function getByName($pName)
	{
		if(!$query = $this->db->get_where('photographer', array('name' => $pName))) {
			return $this->db->error();
		} else {
			if ($query->num_rows() > 0) {
				return $query->row();
			} else {
				return false;
			}
		}
	}
	
	public function insert($pPhotographer)
	{
		if(!$photographer = $this->getByName($pPhotographer->name)) {
			
			$photographerId = $this->_insert($pPhotographer);
			if(strlen($pPhotographer->tags) > 0) {
				$tagsArray = explode(",", $pPhotographer->tags);
				if(count($tagsArray) > 0) {
					foreach($tagsArray as $key=>$tagLabel) {
						if(strlen($tagLabel) <= 85)
							$this->photographer_tag->insert($photographerId, $this->tag->insert(trim($tagLabel)));
					}
				}
			}
			return $photographerId;
		} else {
			if(strlen($pPhotographer->tags) > 0) {
				$tagsArray = explode(",", $pPhotographer->tags);
				if(count($tagsArray) > 0) {
					foreach($tagsArray as $key=>$tagLabel) {
						if(strlen($tagLabel) <= 85)
							$this->photographer_tag->insert($photographer->id, $this->tag->insert(trim($tagLabel)));
					}
				}
			}
			
			return $photographer->id;
		}
	}
	
	private function _insert($pPhotographer)
	{
		$insert_data = array(
				'name' => $this->db->escape_str($pPhotographer->name),
				'rating' => $pPhotographer->rating,
				'rating_date' => date('Y-m-d')
		);
		
		if(! $this->db->insert('photographer', $insert_data)) {
			return $this->db->error();
		}
		
		return $this->db->insert_id();
	}
}