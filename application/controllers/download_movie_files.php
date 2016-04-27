<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download_movie_files extends CI_Controller {

	function __construct() {
		// Construct our parent class
		parent::__construct();
		$this->imgsDestinationFolder = './assets/images/galleries/';
		set_time_limit(0);
	}
	
	public function init($pLimit) {
		$this->load->model('gallery', NULL, TRUE);
		if($galleries = $this->gallery->getInitializedGalleries(2, $pLimit)) {
			foreach($galleries as $gallery) {
				if($coverUrl = $this->downloadCover($gallery)) {
					$this->gallery->updateCoverUrl($gallery->id, $coverUrl);
					if($this->getImgSize($gallery)) {
						$this->gallery->updateCoverStatus($gallery->id, 1);
						if($this->downloadWideCover($gallery)) {
							$this->gallery->updateActiveStatus($gallery->id, 1);	
						}
					}
				}
			}
		}
	}
	
	private function downloadCover($pGallery) {
		$coverUrl = 'https://www.metart.com/media/' . $pGallery->metart_id . '/cover_' . $pGallery->metart_id . '.jpg';
		$coverFileName = 'glam-sex_' . $pGallery->id . '_cover.jpg';
		if(mkdir($this->imgsDestinationFolder . $pGallery->id)) {
			if(!@copy($coverUrl,$this->imgsDestinationFolder . $pGallery->id . '/' . $coverFileName)) {
				$errors= error_get_last();
				$this->gallery->updateCoverStatus($pGallery->id, 90);
				var_dump($errors);
				return false;
			} else {
				return $coverUrl;
			}
		} else {
			return false;
		}
	}

	private function downloadWideCover($pGallery) {
		$coverUrl = 'https://www.metart.com/media/' . $pGallery->metart_id . '/wide_' . $pGallery->metart_id . '.jpg';
		$coverFileName = 'glam-sex_' . $pGallery->id . '_wide_cover.jpg';
		if(!@copy($coverUrl,$this->imgsDestinationFolder . $pGallery->id . '/' . $coverFileName)) {
			$errors= error_get_last();
			$this->gallery->updateCoverStatus($pGallery->id, 91);
			return false;
		} else {
			return $coverUrl;
		}
	}

	private function getImgSize($pGallery) {
		if($imgSize = getimagesize($this->imgsDestinationFolder.$pGallery->id.'/glam-sex_'.$pGallery->id.'_cover.jpg')) {
			$this->gallery->updateCoverDimentions($pGallery->id, $imgSize[0], $imgSize[1]);
			return true;
		} else {
			return false;
		}
	}
}
