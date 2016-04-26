<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download_photos_files extends CI_Controller {

	function __construct() {
		// Construct our parent class
		parent::__construct();
		$this->zipDestinationFolder = './assets/img_packages/';
		$this->imgsDestinationFolder = './assets/images/galeries/';
		set_time_limit(0);
	}
	
	public function init($pLimit) {
		$this->load->model('gallery', NULL, TRUE);
		if($galleries = $this->gallery->getInitializedGalleries(1, $pLimit)) {
			foreach($galleries as $gallery) {
				//FIRST : check if cover url contains "cover-rss.jpg" >> no zip dl, update cover status
				if(strpos($gallery->cover_url, 'cover-rss.jpg')) {
					$this->gallery->updateCoverStatus($gallery->id, 99);
					continue;
				}
				//SECOND : dl the zip pack of pictures
				if($this->downloadZip($gallery)) {
					$this->gallery->updateZipStatus($gallery->id, 1);
					//THIRD : unzip
					if($this->unzipFile($this->zipDestinationFolder . $gallery->id . '.zip', $gallery->id)) {
						$this->gallery->updateZipStatus($gallery->id, 2);
						$this->renameDirectoryPics($this->imgsDestinationFolder.$gallery->id, $gallery->id);
						//FOURTH : count img files in unzipped folder to update the DB
						if($nbPics = $this->countFiles($this->imgsDestinationFolder.$gallery->id)) {
							$this->gallery->updateNbFhgPics($gallery->id, $nbPics);
						}
						//FIFTH : download cover
						if($coverUrl = $this->downloadCover($gallery)) {
							$this->gallery->updateCoverUrl($gallery->id, $coverUrl);
							if($this->getImgSize($gallery)) {
								$this->gallery->updateCoverStatus($gallery->id, 1);
								$this->gallery->updateActiveStatus($gallery->id, 1);
								//SIXTH = delete zip file
								$this->deleteZipFile($gallery->id);
							}
						}
					}
				}
			}
		}
	}
	
	private function downloadCover($pGallery) {
		$coverUrl = 'https://www.metart.com/media/' . $pGallery->metart_id . '/cover_' . $pGallery->metart_id . '.jpg';
		$coverFileName = 'glam-sex_' . $pGallery->id . '_cover.jpg';
		if(!@copy($coverUrl,$this->imgsDestinationFolder . $pGallery->id . '/' . $coverFileName)) {
			$errors= error_get_last();
			$this->gallery->updateCoverStatus($pGallery->id, 90);
			return false;
		} else {
			return $coverUrl;
		}
	}
	
	private function downloadZip($pGallery) {
		if(!@copy($pGallery->zip_file_url,$this->zipDestinationFolder . $pGallery->id . '.zip')) {
			$errors= error_get_last();
			$this->gallery->updateZipStatus($pGallery->id, 90);
			return false;
		} else {
			if(filesize($this->zipDestinationFolder . $pGallery->id . '.zip') < 500000) {
				$this->gallery->updateZipStatus($pGallery->id, 91);
				return false;
			} else {
				return true;
			}
		}
	}
	
	private function unzipFile($pZipFile, $pGalleryId) {
		$zip = new ZipArchive;
		$res = $zip->open($pZipFile);
		if ($res === TRUE) {
			$zip->extractTo($this->imgsDestinationFolder.$pGalleryId);
			$zip->close();
			return true;
		} else {
			$this->gallery->updateZipStatus($pGalleryId, 92);
			return false;
		}
	}
	
	private function renameDirectoryPics($pDirectory, $pId) {
		$scannedDirectory = array_diff(scandir($pDirectory), array('..', '.'));
		$key = 0;
		foreach($scannedDirectory as $pic) {
			rename($pDirectory . '/' . $pic, $pDirectory . '/glam-sex_' . $pId . '_' . $key . '.jpg');
			$key++;
		}
	}
	
	private function countFiles($Folder) {
		if($files = glob($Folder . '/*.jpg')) {
			return count($files);
		} else {
			return false;
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

	private function deleteZipFile($pGalleryId) {
		return unlink($this->zipDestinationFolder.$pGalleryId.'.zip');
	}
}
