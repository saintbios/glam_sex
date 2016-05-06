<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Init_data extends CI_Controller {

	function __construct()
	{
		// Construct our parent class
		parent::__construct();
		$this->load->library('apimetart');
		$this->load->model('photographer', NULL, TRUE);
		$this->load->model('glamsex_model', NULL, TRUE);
		$this->load->model('gallery', NULL, TRUE);
		set_time_limit(0);

		if(!isset($_SESSION))
			session_start();

		if(!isset($_SESSION['logged']) || $_SESSION['logged'] == false) {
			echo "You must be logged fuccboi";
			exit(0);
		}
	}
	
	public function init($pStartDate, $pStopDate)
	{
		//Photographers details
		$photographers = $this->apimetart->getMetArtObjectsFromApi($pStartDate, $pStopDate, 'Photographer', 'latest-photographer', 100);
		$this->initPhotographers($photographers);
		
		//Models details
		$models = $this->apimetart->getMetArtObjectsFromApi($pStartDate, $pStopDate, 'Model', 'latest-model', 100);
		$this->initModels($models);
		
		//FHG galleries without details
		$fhgGalleries = $this->apimetart->getMetArtObjectsFromApi($pStartDate, $pStopDate, 'MarketingTool', 'latest-marketingTool', 300);
		$this->initGalleries($fhgGalleries);
		
		//Galleries details
		$galleries = $this->apimetart->getMetArtObjectsFromApi($pStartDate, $pStopDate, 'Gallery', 'latest-gallery', 300);
		$this->completeGalleries($galleries);
	}
	
	private function initPhotographers($pPhotographers)
	{
		foreach($pPhotographers as $key => $photographer) {
			$this->photographer->insert($photographer);
		}
	}
	
	private function initModels($pModels)
	{
		foreach($pModels as $key => $model) {
			$this->glamsex_model->insert($model);
		}
	}
	
	private function initGalleries($pGalleries)
	{
		foreach($pGalleries as $key => $gallery) {
			$this->gallery->insert($gallery);
		}
	}
	
	private function completeGalleries($pGalleries)
	{
		foreach($pGalleries as $key => $gallery) {
			$this->gallery->update($gallery);
		}
	}
}
