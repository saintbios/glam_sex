<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galleries extends CI_Controller {

	function __construct()
	{
		// Construct our parent class
		parent::__construct();
		$this->load->library('UtilsMetArt');
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
	
	public function displayPhotoGallery($galleryId = '', $galleryName = '')
	{
		//Récupération de la gallerie
		$gallery = $this->gallery->getById($galleryId);

		//Récupération du/des models
		$modelGs = $this->model_gallery->getByGalleryId($gallery->id);
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
		$photographer = $this->photographer->getById($gallery->photographer_id_fk);
		$gallery->photographerName = $photographer->name;

		$data['gallery'] = $gallery;
		$data['model'] = $model;

		$this->load->view('gallery_page', $data);
	}

	public function displayMovieGallery($filmId = '', $filmName = '')
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
		
		//Récupération des galleries photo
		$galleries = $this->model_gallery->getByModelId($model->id);
		$photoGalleries = array();
		$movieGalleries = array();
		foreach($galleries as $gallery) {
			$gallery = $this->gallery->getById($gallery->gallery_id);
			if($gallery->gallery_type_id_fk == 1) {
				if($gallery->active == 1)
					$photoGalleries[] = $gallery;
			} else {
				if($gallery->active == 1 && $gallery->id != $film->id)
					$movieGalleries[] = $gallery;
			}
		}

		if(count($photoGalleries) > 1)
			$photoGalleries = $this->utilsmetart->sortArray($photoGalleries);

		if(count($movieGalleries) > 1)
	    	$movieGalleries = $this->utilsmetart->sortArray($movieGalleries);

		$data['film'] = $film;
		$data['model'] = $model;
		$data['photoGalleries'] = $photoGalleries;
		$data['filmGalleries'] = $movieGalleries;

		$this->load->view('film_page', $data);
	}

	public function browseAllPhotoGalleries($pPage) {
		$galleries = $this->gallery->browsePaginated(1, $pPage);
		foreach($galleries as $g) {
			$modelGs = $this->model_gallery->getByGalleryId($g->id);
			foreach($modelGs as $modelG) {
				$model = $this->glamsex_model->getById($modelG->model_id);
				$g->modelId = $modelG->model_id;
				$g->modelName = $model->name;
				break;
			}
		}
		$data['galleries'] = $galleries;
		$data['activePage'] = $pPage;
		$this->load->view('photo_galleries_page', $data);
	}

	public function browseAllMovieGalleries($pPage) {
		$galleries = $this->gallery->browsePaginated(2, $pPage);
		foreach($galleries as $g) {
			$modelGs = $this->model_gallery->getByGalleryId($g->id);
			foreach($modelGs as $modelG) {
				$model = $this->glamsex_model->getById($modelG->model_id);
				$g->modelId = $modelG->model_id;
				$g->modelName = $model->name;
				break;
			}
		}
		$data['galleries'] = $galleries;
		$data['activePage'] = $pPage;
		$this->load->view('film_galleries_page', $data);
	}

	public function search($pPage) {
		$searchValue = $this->security->xss_clean($this->input->get('searchvaluesanitized'));

		$galleries = $this->gallery->search($searchValue, $pPage);
		$_SESSION['nbSearchResults'] = $this->gallery->nbSearchResults($searchValue);

		$searchValueClean = str_replace('+', ' ', $searchValue);
		$searchValue = str_replace('+', '%2B', $searchValue);
		foreach($galleries as $g) {
			$modelGs = $this->model_gallery->getByGalleryId($g->id);
			foreach($modelGs as $modelG) {
				$model = $this->glamsex_model->getById($modelG->model_id);
				$g->modelId = $modelG->model_id;
				$g->modelName = $model->name;
				break;
			}
		}

		$returnData['galleries'] = $galleries;
		$returnData['activePage'] = $pPage;
		$returnData['searchValueClean'] = $searchValueClean;
		$returnData['searchValue'] = $searchValue;
		
		$this->load->view('search', $returnData);
	}
}
