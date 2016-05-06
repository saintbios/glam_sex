<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		// Construct our parent class
		parent::__construct();
		$this->load->model('photographer', NULL, TRUE);
		$this->load->model('glamsex_model', NULL, TRUE);
		$this->load->model('gallery', NULL, TRUE);
		$this->load->model('model_gallery', NULL, TRUE);
		$this->load->helper('form');

		if(!isset($_SESSION))
			session_start();

		if(!isset($_SESSION['itemsPerPage']))
			$_SESSION['itemsPerPage'] = 20;

		if(!isset($_SESSION['nbActiveModels']))
			$_SESSION['nbActiveModels'] = $this->glamsex_model->getNbActive();

		if(!isset($_SESSION['nbActivePhotoGalleries']))
			$_SESSION['nbActivePhotoGalleries'] = $this->gallery->getNbActive(1);

		if(!isset($_SESSION['nbActiveFilmGalleries']))
			$_SESSION['nbActiveFilmGalleries'] = $this->gallery->getNbActive(2);
	}
	
	public function index()
	{
		/*$nbActivePhotos = $this->gallery->getNbActive(1);
		$nbActiveFilms = $this->gallery->getNbActive(2);*/
		
		//Récupération des 20 derniers models
		$models = $this->glamsex_model->getLast(20);
		
		//Récupération des 20 dernières galleries photo
		$photoGalleries = $this->gallery->getLastGalleries(1, 20);
		foreach($photoGalleries as $g) {
			$modelGs = $this->model_gallery->getByGalleryId($g->id);
			foreach($modelGs as $modelG) {
				$model = $this->glamsex_model->getById($modelG->model_id);
				$g->modelId = $modelG->model_id;
				$g->modelName = $model->name;
				break;
			}
		}

		//Récupération des 20 derniers films
		$movieGalleries = $this->gallery->getLastGalleries(2, 20);
		foreach($movieGalleries as $g) {
			$modelGs = $this->model_gallery->getByGalleryId($g->id);
			foreach($modelGs as $modelG) {
				$model = $this->glamsex_model->getById($modelG->model_id);
				$g->modelId = $modelG->model_id;
				$g->modelName = $model->name;
				break;
			}
		}

		$data['models'] = $models;
		$data['photoGalleries'] = $photoGalleries;
		$data['filmGalleries'] = $movieGalleries;

		$this->load->view('home', $data);
	}
}
