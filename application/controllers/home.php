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
	}
	
	public function index()
	{
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
