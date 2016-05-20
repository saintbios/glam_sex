<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Model
{
	public function __construct() {
		$this->load->model('photographer', NULL, TRUE);
		$this->load->model('glamsex_model', NULL, TRUE);
		$this->load->model('gallery_type', NULL, TRUE);
		$this->load->model('model_gallery', NULL, TRUE);
	}
	
	public function getAll() {
		$return_data = array();
	
		$this->db->order_by('id', 'DESC');
	
		if(! $query = $this->db->get('gallery')) {
			return $this->db->error();
		} else {
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}
	}

	public function getLastGalleries($pType = 1, $pLimit = null) {
		$return_data = array();
	
		$this->db->order_by('date', 'DESC');
		$this->db->order_by('id', 'DESC');
		$this->db->where('gallery_type_id_fk', $pType);
		$this->db->where('active', 1);

		if($pLimit) {
			$this->db->limit($pLimit);
		}
		
		if(! $query = $this->db->get('gallery')) {
			return $this->db->error();
		} else {
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}
	}
	
	public function getById($pId) {
		if(!$query = $this->db->get_where('gallery', array('id' => $pId))) {
			return $this->db->error();
		} else {
			if ($query->num_rows() > 0) {
				return $query->row();
			} else {
				return false;
			}
		}
	}
	
	public function getByName($pName) {
		if(!$query = $this->db->get_where('gallery', array('name' => $pName))) {
			return $this->db->error();
		} else {
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}
	}
	
	public function getByNameAndDate($pName, $pDate) {
		if(!$query = $this->db->get_where('gallery', array('name' => $pName,'date' => $pDate))) {
			return $this->db->error();
		} else {
			if ($query->num_rows() > 0) {
				return $query->row();
			} else {
				return false;
			}
		}
	}
	
	public function getByMetArtIdOnCover($pMetArtID) {
		$this->db->select('id,name,date');
		$this->db->from('gallery');
		$this->db->like("cover_url",$pMetArtID);
		if(!$query=$this->db->get()) {
			return $this->db->error();
		} else {
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}
	}

	public function isActive($pGalleryId) {
		$this->db->select('active');
		$this->db->from('gallery');
		$this->db->where("id",$pGalleryId);
		if(!$query=$this->db->get()) {
			return $this->db->error();
		} else {
			if ($query->num_rows() > 0) {
				$gallery = $query->row();
				if($gallery->active == 1) {
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		}
	}

	public function getNbActive($pGalleryType) {
		$query = $this->db->query("select count(id) as nbActive from gallery g
		where active = 1
		and gallery_type_id_fk = " .$pGalleryType);
		$nbActiveGalleries = $query->row();
		return $nbActiveGalleries;
	}

	public function browsePaginated($pGalleryType, $pPage) {
		$return_data = array();
		$whereQuery = '';

		$query = $this->db->query("select * from gallery g
		where active = 1
		and gallery_type_id_fk = " . $pGalleryType ."
		order by g.date desc limit " . $_SESSION['itemsPerPage']*($pPage-1) . "," . $_SESSION['itemsPerPage']);
        
        $results = $query->result();
        return $results;
	}
	
	public function insert($pGallery, $pInitType) {
		if(! $gallery = $this->getByNameAndDate($pGallery->name,$pGallery->date)) {
			$pGallery->photographer = $this->photographer->getByName($pGallery->photographer);
			if($pInitType == 'fhg') {
				$pGallery->type = $this->gallery_type->insert($pGallery->type);
				$galleryId = $this->_insert($pGallery);
			} else {
				$pGallery->type = 2;
				$galleryId = $this->_insertPartial($pGallery);
			}
			
			//Boucle sur les models de la gallerie
			$modelNamesArray = explode(",", $pGallery->models);
			foreach($modelNamesArray as $key => $modelName) {
				$model = $this->glamsex_model->getByName(trim($modelName));
				$this->model_gallery->insert($model->id, $galleryId, $pGallery->age);
			}
			return $galleryId;
		} else {
			return $gallery->id;
		}
	}

	public function update($pGallery) {
		if(! $galleries = $this->getByName($pGallery->name)) {
			echo '<p>PAS TROUVE: '.$pGallery->name.' '.$pGallery->date.' '.$pGallery->cover.'</p>';
			return false;
		} else {
			//First check : on MetArtID
			$first = explode('_', $pGallery->cover);
			$second = explode('.',$first[count($first)-1]);
			$metArtId = $second[0];
			if($galleryId = $this->checkByMetArtID($metArtId)) {
				return $this->_update($pGallery, $galleryId);
			} else {
				//Second check : by nearest date + model name
				if($idFound = $this->checkByNearestDate($galleries, $pGallery->date)) {
					if($this->checkByModels($pGallery, $idFound)) {
						if($this->checkByPhotographer($pGallery, $this->getById($idFound))) {
							return $this->_update($pGallery, $idFound);
						} else {
							return false;
						}
					} else {
						return false;
					}
				} else {
					echo '<p>'.$pGallery->name.' ('.$pGallery->date.') : AUCUNE GALERIE PROCHE DANS LE TEMPS</p>';
					return false;
				}
			}
		}
	}
	
	private function checkByNearestDate($pGalleries, $refGalleryDate) {
		$referenceDate = strtotime($refGalleryDate);
		$compDate = array();
		foreach($pGalleries as $key => $gallery) {
			$compDate[$gallery->id] = abs($referenceDate - strtotime($gallery->date));
		}
		asort($compDate);
		reset($compDate);
		$nearestId = key($compDate);
		if($compDate[$nearestId] < 6300000)
			return $nearestId;
		else
			return false;
	}
	
	private function checkByMetArtID($pMetArtId) {
		if((!$galleries = $this->getByMetArtIdOnCover($pMetArtId)) || count($galleries) > 1) {
			return false;
		} else {
			return($galleries[0]->id);
		}
	}
	
	private function checkByModels($pGallery, $pIdFound) {
		$modelsRef = $this->model_gallery->getByGalleryId($pIdFound);
		$modelsRefArray = array();
		foreach($modelsRef as $modelRef) {
			$modelsRefArray[] = $modelRef->model_id;
		}
		$modelNamesArray = explode(",", $pGallery->models);
		$modelsToCheck = array();
		if(count($modelsRefArray) != count($modelNamesArray)) {
			echo '<p>NEAR FOUND /!\ MODELS DIFF 1 : '.$pGallery->name.'</p>';
			return false;
		}
		foreach($modelNamesArray as $key => $modelName) {
			$model = $this->glamsex_model->getByName(trim($modelName));
			if(!in_array($model->id, $modelsRefArray)) {
				echo '<p>NEAR FOUND /!\ MODELS DIFF 2 : '.$pGallery->name.'</p>';
				return false;
			}
		}
		return true;
	}
	
	private function checkByPhotographer($pGallery, $pGalleryFound) {
		$photographerRef = $pGalleryFound->photographer_id_fk;
		$photographer = $this->photographer->getByName(trim($pGallery->photographer));
		if($photographer->id != $photographerRef) {
			echo '<p>NEAR FOUND /!\ PHOTOGRAPHER DIFF : '.$pGallery->name.'</p>';
			return false;
		}
		return true;
	}

	public function search($pSearchValue, $pPage) {
		$searchValues = explode('+', $pSearchValue);
		$finalArray = array();

		foreach($searchValues as $searchValue) {
			if(strlen($searchValue) > 1)
				$finalArray[] = $searchValue;
		}
		$regexpValue = implode('|', $finalArray);
		$query = $this->db->query("select * from gallery g
		where active = 1
		and gallery_type_id_fk = 1
		and (
			name REGEXP ('" . $regexpValue . "')
			or short_description REGEXP ('" . $regexpValue . "')
			)
		order by g.date desc limit " . $_SESSION['itemsPerPage']*($pPage-1) . "," . $_SESSION['itemsPerPage']);
        
        $results = $query->result();
        return $results;
	}

	public function nbSearchResults($pSearchValue) {
		$searchValues = explode('+', $pSearchValue);
		$finalArray = array();

		foreach($searchValues as $searchValue) {
			if(strlen($searchValue) > 1)
				$finalArray[] = $searchValue;
		}
		$regexpValue = implode('|', $finalArray);
		$query = $this->db->query("select count(id) as nbSearchResults from gallery g
		where active = 1
		and gallery_type_id_fk = 1
		and (
			name REGEXP ('" . $regexpValue . "')
			or short_description REGEXP ('" . $regexpValue . "')
		)
		order by g.date desc");
        
        $results = $query->row();
        return $results;
	}
	
	private function _insert($pGallery) {
		$insert_data = array(
				'name' => $this->db->escape_str($pGallery->name),
				'photographer_id_fk' => $pGallery->photographer->id,
				'gallery_type_id_fk' => $pGallery->type,
				'date' => $pGallery->date,
				'short_description' => $this->db->escape_str($pGallery->short_description),
				'long_description' => $this->db->escape_str($pGallery->long_description),
				'blog_description' => $this->db->escape_str($pGallery->blog_description),
				'number_of_models' => $pGallery->number_of_models,
				'number_of_pics_fhg' => $pGallery->number_of_pics,
				'number_of_pics' => 0,
				'external_link' => $pGallery->link,
				'zip_file_url' => $pGallery->zip,
				'cover_url' => $pGallery->cover,
				'rating' => null,
				'rating_date' => null,
				'complete' => 0,
				'active' => 0,
				'activation_date' => null,
				'has_video_trailer' => 0
		);
	
		if(! $this->db->insert('gallery', $insert_data)) {
			return $this->db->error();
		} else {
			return $this->db->insert_id();
		}
	}
	
	//For movies galleries (we only get detailed infos for these ones)
	private function _insertPartial($pGallery) {
		$first = explode('_', $pGallery->cover);
		$second = explode('.',$first[count($first)-1]);
		$metArtId = $second[0];
		
		$insert_data = array(
				'name' => $this->db->escape_str($pGallery->name),
				'photographer_id_fk' => $pGallery->photographer->id,
				'gallery_type_id_fk' => $pGallery->type,
				'date' => $pGallery->date,
				'number_of_models' => $pGallery->number_of_models,
				'number_of_pics_fhg' => 0,
				'number_of_pics' => 0,
				'external_link' => '',
				'zip_file_url' => '',
				'cover_url' => $pGallery->cover,
				'rating' => $pGallery->rating,
				'rating_date' => date('Y-m-d'),
				'complete' => 0,
				'active' => 0,
				'activation_date' => null,
				'has_video_trailer' => 0,
				'metart_id' => $metArtId
		);
		
		if(! $this->db->insert('gallery', $insert_data)) {
			return $this->db->error();
		} else {
			return $this->db->insert_id();
		}
	}
	
	private function _update($pGallery, $pId) {
		$first = explode('_', $pGallery->cover);
		$second = explode('.',$first[count($first)-1]);
		$metArtId = $second[0];
		$update_data = array(
				'date' => $pGallery->date,
				'rating' => $pGallery->rating,
				'number_of_pics' => $pGallery->number_of_pics,
				'rating_date' => date('Y-m-d'),
				'cover_url' => $pGallery->cover,
				'metart_id' => $metArtId,
				'external_link' => $pGallery->link
		);
		$this->db->where('id', $pId);
		$this->db->update('gallery', $update_data);
		//echo '<p>UPDATED '.$pGallery->name.' ('.$pId.')</p>';
		return $pId;
	}
	
	public function getInitializedGalleries($pType, $pLimit) {
		$this->db->limit($pLimit);
		$this->db->order_by('id', 'DESC');
		if(! $query = $this->db->get_where('gallery', array('gallery_type_id_fk' => $pType, 'active' => 0, 'zip_complete' => 0, 'cover_complete' => 0))) {
			return false;
		} else {
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}
	}
	
	public function updateZipStatus($pGalleryId, $pZipStatus) {
		$update_data = array(
				'zip_complete' => $pZipStatus
		);
		$this->db->where('id', $pGalleryId);
		$this->db->update('gallery', $update_data);
	}
	
	public function updateNbFhgPics($pGalleryId, $pNbPics) {
		$update_data = array(
				'number_of_pics_fhg' => $pNbPics
		);
		$this->db->where('id', $pGalleryId);
		$this->db->update('gallery', $update_data);
	}
	
	public function updateCoverUrl($pGalleryId, $pCoverUrl) {
		$update_data = array(
				'cover_url' => $pCoverUrl
		);
		$this->db->where('id', $pGalleryId);
		$this->db->update('gallery', $update_data);
	}
	
	public function updateCoverStatus($pGalleryId, $pCoverStatus) {
		$update_data = array(
				'cover_complete' => $pCoverStatus
		);
		$this->db->where('id', $pGalleryId);
		$this->db->update('gallery', $update_data);
	}
	
	public function updateActiveStatus($pGalleryId, $pActiveStatus) {
		$update_data = array(
				'active' => $pActiveStatus,
				'activation_date' => date("Y-m-d")
		);
		$this->db->where('id', $pGalleryId);
		$this->db->update('gallery', $update_data);
	}

	public function updateCoverDimentions($pGalleryId, $pWidth, $pHeight) {
		$update_data = array(
				'cover_width' => $pWidth,
				'cover_height' => $pHeight
		);
		$this->db->where('id', $pGalleryId);
		$this->db->update('gallery', $update_data);
	}
}