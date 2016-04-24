<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_gallery extends CI_Model
{
	public function getAll()
	{
		$return_data = array();
	
		$this->db->order_by('id', 'ASC');
	
		if(! $query = $this->db->get('model_gallery')) {
			return $this->db->error();
		} else {
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}
	}
	
	public function getByModelId($pModelId)
	{
		if(! $query = $this->db->get_where('model_gallery', array('model_id' => $pModelId))) {
			return $this->db->error();
		} else {
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}
	}
	
	public function getByGalleryId($pGalleryId)
	{
		if(! $query = $this->db->get_where('model_gallery', array('gallery_id' => $pGalleryId))) {
			return $this->db->error();
		} else {
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}
	}
	
	public function getByIds($pPhotographerId, $pGalleryId)
	{
		if(! $query = $this->db->get_where('model_gallery', array('model_id' => $pPhotographerId, 'gallery_id' => $pGalleryId))) {
			return $this->db->error();
		} else {
			if ($query->num_rows() > 0) {
				return $query->row();
			} else {
				return false;
			}
		}
	}
	
	public function insert($pPhotographerId, $pGalleryId, $pAgePublished)
	{
		if(!$returnElt = $this->getByIds($pPhotographerId, $pGalleryId)) {
			return $this->_insert($pPhotographerId, $pGalleryId, $pAgePublished);
		}
	}
	
	private function _insert($pPhotographerId, $pGalleryId, $pAgePublished)
	{
		$error = false;
		$return_data = array();
		$insert_data = array(
				'model_id' => $pPhotographerId,
				'gallery_id' => $pGalleryId,
				'age_published' => $pAgePublished
		);
	
		if(! $this->db->insert('model_gallery', $insert_data)) {
			return $this->db->error();
		} else {
			return $this->db->insert_id();
		}
	}
}