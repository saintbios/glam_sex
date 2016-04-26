<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download_models_pictures extends CI_Controller {

	function __construct() {
		// Construct our parent class
		parent::__construct();
		$this->load->model('glamsex_model', NULL, TRUE);
		$this->imgsDestinationFolder = './assets/images/models/';
		set_time_limit(0);
	}
	
	public function init($pLimit) {
		if($models = $this->glamsex_model->getByActive($pLimit, 0)) {
			foreach($models as $model) {
				if($this->downloadPicture($model)) {
					if($this->getImgSize($model)) {
						$this->glamsex_model->updateActiveStatus($model->id, 1);
					}
				}
			}
		}
	}

	private function getImgSize($pModel) {
		$imgSize = getimagesize($this->imgsDestinationFolder.$pModel->id.'/glam-sex_'.$pModel->id.'_headshot.jpg');
		if($this->glamsex_model->updateHeadshotDimentions($pModel->id, $imgSize[0], $imgSize[1])) {
			return true;
		} else {
			return false;
		}
	}
	
	private function downloadPicture($pModel) {
		$pictureUrl = $pModel->headshot_url;
		$pictureFileName = 'glam-sex_' . $pModel->id . '_headshot.jpg';
		if(mkdir($this->imgsDestinationFolder . $pModel->id)) {
			if(!@copy($pictureUrl,$this->imgsDestinationFolder . $pModel->id . '/' . $pictureFileName)) {
				$errors= error_get_last();
				return false;
			} else {
				return $pictureUrl;
			}
		} else {
			return false;
		}
	}
}
