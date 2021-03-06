<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Glamsex_model extends CI_Model
{
	public function __construct()
	{
		$this->load->model('shaved_type', NULL, TRUE);
		$this->load->model('hair_color', NULL, TRUE);
		$this->load->model('eye_color', NULL, TRUE);
		$this->load->model('breasts_type', NULL, TRUE);
		$this->load->model('ethnicity', NULL, TRUE);
		$this->load->model('country', NULL, TRUE);
		$this->load->model('model_tag', NULL, TRUE);
		$this->load->model('model_gallery', NULL, TRUE);
		$this->load->model('gallery', NULL, TRUE);
	}
	
	public function getAll()
	{
	$return_data = array();
		
		$this->db->order_by('id', 'DESC');
		
		if(! $query = $this->db->get('model')) {
			return $this->db->error();
		} else {
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}
	}

	public function getLast($pLimit = null) {
		$return_data = array();
		
		$query = $this->db->query("select * from model m
		where active = 1
		and headshot_width = 229
		and (select count(gallery_id)
			from model_gallery mg 
		    where mg.model_id = m.id
		    and (
		        select count(id)
		        from gallery g
		        where g.id = mg.gallery_id
		        and g.active = 1
		        ) > 0
			) > 0
		order by m.id desc limit " . $pLimit);
        
        $results = $query->result();
        return $results;
	}

	public function getNbActive() {
		$query = $this->db->query("select count(id) as nbActive from model m
		where active = 1
		and headshot_width = 229
		and (select count(gallery_id)
			from model_gallery mg 
		    where mg.model_id = m.id
		    and (
		        select count(id)
		        from gallery g
		        where g.id = mg.gallery_id
		        and g.active = 1
		        ) > 0
			) > 0
		order by m.id asc");

		$nbActiveModels = $query->row();
		return $nbActiveModels;
	}

	public function browsePaginated($pPage) {
		$query = $this->db->query("select * from model m
		where active = 1
		and headshot_width = 229
		and (select count(gallery_id)
			from model_gallery mg 
		    where mg.model_id = m.id
		    and (
		        select count(id)
		        from gallery g
		        where g.id = mg.gallery_id
		        and g.active = 1
		        ) > 0
			) > 0
		order by m.id desc limit " . $_SESSION['itemsPerPage']*($pPage-1) . "," . $_SESSION['itemsPerPage']);
        
        $results = $query->result();
        return $results;
	}

	private function hasActiveGalleries($pModelId) {
		if($modelGalleries = $this->model_gallery->getByModelId($pModelId)) {
			foreach($modelGalleries as $modelGallery) {
				$isActive = $this->gallery->isActive($modelGallery->gallery_id);
				if($isActive)
					return true;
			}
		}
		return false;
	}
	
	public function getById($pId)
	{
		if(!$query = $this->db->get_where('model', array('id' => $pId))) {
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
		if(!$query = $this->db->get_where('model', array('name' => $pName))) {
			return $this->db->error();
		} else {
			if ($query->num_rows() > 0) {
				return $query->row();
			} else {
				return false;
			}
		}
	}
	
	public function insert($pModel)
	{
		if(! $model = $this->getByName($pModel->name)) {			
			$pModel->shaved = $this->shaved_type->insert($pModel->shaved);
			$pModel->hair_color = $this->hair_color->insert($pModel->hair_color);
			$pModel->eye_color = $this->eye_color->insert($pModel->eye_color);
			$pModel->breasts = $this->breasts_type->insert($pModel->breasts);
			$pModel->ethnicity = $this->ethnicity->insert($pModel->ethnicity);
			$pModel->country = $this->country->insert($pModel->country);
			$modelId = $this->_insert($pModel);
			if(strlen($pModel->tags) > 0) {
				$tagsArray = explode(",", $pModel->tags);
				if(count($tagsArray) > 0) {
					foreach($tagsArray as $key=>$tagLabel) {
						if(strlen($tagLabel) <= 85)
							$this->model_tag->insert($modelId, $this->tag->insert(trim($tagLabel)));
					}
				}
			}
			
			return $modelId;
		} else {
			$tagsArray = explode(",", $pModel->tags);
			if(count($tagsArray) > 0) {
				foreach($tagsArray as $key=>$tagLabel) {
					$this->model_tag->insert($model->id, $this->tag->insert(trim($tagLabel)));
				}
			}
			return $model->id;
		}
	}
	
	private function _insert($pModel)
	{
		if($pModel->rating == 0) {
			$pModel->rating = null;
			$dateRating = null;
		} else {
			$dateRating = date('Y-m-d');
		}
		
		$insert_data = array(
				'name' => $this->db->escape_str($pModel->name),
				'headshot_url' => $pModel->headshot,
				'rating' => $pModel->rating,
				'rating_date' => $dateRating,
				'bio' => $this->db->escape_str($pModel->bio),
				'shaved_type_id_fk' => $pModel->shaved,
				'hair_color_id_fk' => $pModel->hair_color,
				'eye_color_id_fk' => $pModel->eye_color,
				'breasts_type_id_fk' => $pModel->breasts,
				'ethnicity_id_fk' => $pModel->ethnicity,
				'country_id_fk' => $pModel->country
		);
		
		if(! $this->db->insert('model', $insert_data)) {
			return $this->db->error();
		} else {
			return $this->db->insert_id();
		}
	}
	
	public function updateIncompleteModel($pModelId, $pBreastsTypeId, $pShavedTypeId, $pHairColorId, $pEyeColorId, $pEthnicityId, $pCountryId)
	{
		$model = $this->getModelById($pModelId);
		if($model['data'][0]->hair_color_id_fk == 1 && $model['data'][0]->eye_color_id_fk == 1 && $model['data'][0]->breasts_type_id_fk == 1) {
			$update_data = array(
					'hair_color_id_fk' => $pHairColorId,
					'eye_color_id_fk' => $pEyeColorId,
					'breasts_type_id_fk' => $pBreastsTypeId,
					'shaved_type_id_fk' => $pShavedTypeId,
					'ethnicity_id_fk' => $pEthnicityId,
					'country_id_fk' => $pCountryId
			);
			$this->db->where('id', $pModelId);
			$this->db->update('model', $update_data);
		}
	}

	public function getByActive($pLimit, $pActive) {
		$this->db->limit($pLimit);
		if(! $query = $this->db->get_where('model', array('active' => $pActive))) {
			return false;
		} else {
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}
	}

	public function updateActiveStatus($pModelId, $pActiveStatus) {
		$update_data = array(
				'active' => $pActiveStatus,
				'activation_date' => date("Y-m-d")
		);
		$this->db->where('id', $pModelId);
		$this->db->update('model', $update_data);
	}

	public function updateHeadshotDimentions($pModelId, $pWidth, $pHeight) {
		$update_data = array(
				'headshot_width' => $pWidth,
				'headshot_height' => $pHeight
		);
		$this->db->where('id', $pModelId);
		$this->db->update('model', $update_data);
	}
}