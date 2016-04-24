<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Init_data extends CI_Controller {

	function __construct() {
		// Construct our parent class
		parent::__construct();
		$this->load->library('apimetart');
		$this->load->model('photographer', NULL, TRUE);
		$this->load->model('glamsex_model', NULL, TRUE);
		$this->load->model('gallery', NULL, TRUE);
		set_time_limit(0);
	}
	
	public function photographers($pStartDate, $pStopDate) {
		//Photographers details
		$photographers = $this->apimetart->getMetArtObjectsFromApi($pStartDate, $pStopDate, 'Photographer', 'latest-photographer', null, 1000);
		$this->initPhotographers($photographers);
	}
	
	public function models($pFileId) {
		//Models details
		$models = $this->apimetart->getMetArtObjectsFromFile($pFileId);
		$this->initModels($models);
	}
	
	public function fhgGalleries($pStartDate, $pStopDate, $pLimit) {
		 //FHG galleries without details
		 if($fhgGalleries = $this->apimetart->getMetArtObjectsFromApi($pStartDate, $pStopDate, 'MarketingTool', 'latest-marketingTool', null, $pLimit)) {
		 	$this->initGalleries($fhgGalleries, 'fhg');
		 } else {
		 	echo '<p>Aucune gallerie a inserer pour cette periode</p>';
		 }
	}
	
	public function fhgMovieGalleries($pStartDate, $pStopDate, $pLimit) {
		//FHG galleries without details
		if($fhgMovieGalleries = $this->apimetart->getMetArtObjectsFromApi($pStartDate, $pStopDate, 'GalleryMovies', 'latest-gallery', null, $pLimit)) {
			$this->initGalleries($fhgMovieGalleries, 'detailedMovie');
		} else {
			echo '<p>Aucune gallerie a inserer pour cette periode</p>';
		}
	}
	
	public function detailedGalleries($pStartDate, $pStopDate, $pLimit) {
		//Galleries details
		$fields = array(
				'name',
				'date',
				'rating',
				'number_of_pics',
				'models',
				'photographer',
				'cover'
		);
		if($galleries = $this->apimetart->getMetArtObjectsFromApi($pStartDate, $pStopDate, 'GalleryImages', 'latest-gallery', $fields, $pLimit)) {
			$this->completeGalleries($galleries);
		} else {
			echo '<p>Aucune gallerie a completer pour cette periode</p>';
		}
	}
	
	private function initPhotographers($pPhotographers) {
		foreach($pPhotographers as $key => $photographer) {
			$this->photographer->insert($photographer);
		}
	}
	
	private function initModels($pModels) {
		foreach($pModels as $key => $model) {
			$this->glamsex_model->insert($model);
		}
	}
	
	private function initGalleries($pGalleries, $pInitType) {
		echo '<p>Nombre de galeries a traiter: '.count($pGalleries).'</p>';
		foreach($pGalleries as $key => $gallery) {
			$galleryIdInserted = $this->gallery->insert($gallery, $pInitType);
			echo '<p>Gallerie '.$galleryIdInserted.' inseree</p>';
		}
	}
	
	private function completeGalleries($pGalleries) {
		echo '<p>Nombre de galeries a traiter: '.count($pGalleries).'</p>';
		$count = 0;
		foreach($pGalleries as $key => $gallery) {
			if($this->gallery->update($gallery))
				$count++;
		}
		echo '<p>Nombre de galeries mises a jour: '.$count.' ('.round(($count*100)/count($pGalleries)).'%)</p>';
	}
}
