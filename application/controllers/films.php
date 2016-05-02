<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Films extends CI_Controller {

	function __construct()
	{
		// Construct our parent class
		parent::__construct();
		$this->load->model('photographer', NULL, TRUE);
		$this->load->model('glamsex_model', NULL, TRUE);
		$this->load->model('gallery', NULL, TRUE);
		$this->load->model('model_gallery', NULL, TRUE);
		$this->load->model('breasts_type', NULL, TRUE);
		$this->load->model('hair_color', NULL, TRUE);
		$this->load->model('eye_color', NULL, TRUE);
		$this->load->model('shaved_type', NULL, TRUE);
		$this->load->model('country', NULL, TRUE);
		$this->load->model('ethnicity', NULL, TRUE);
	}
	
	public function display($filmId = '', $filmName = '')
	{
		//Récupération de la gallerie
		$film = $this->gallery->getById($filmId);

		//Récupération du/des models
		$modelGs = $this->model_gallery->getByGalleryId($film->id);
		foreach($modelGs as $modelG) {
			$model = $this->glamsex_model->getById($modelG->model_id);
			$model->age = $modelG->age_published;
			$model->breasts_type = $this->breasts_type->getById($model->breasts_type_id_fk);
			$model->hair_color = $this->hair_color->getById($model->hair_color_id_fk);
			$model->eye_color = $this->eye_color->getById($model->eye_color_id_fk);
			$model->ethnicity = $this->ethnicity->getById($model->ethnicity_id_fk);
			$model->shaved_type = $this->shaved_type->getById($model->shaved_type_id_fk);
			break;
		}
		//Récupération du photographe
		$photographer = $this->photographer->getById($film->photographer_id_fk);
		$film->photographerName = $photographer->name;

		$data['film'] = $film;
		$data['model'] = $model;

		$this->load->view('films', $data);
	}
}
