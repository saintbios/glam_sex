<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Models extends CI_Controller {

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
	
	public function displayModel($modelId = '', $modelName = '')
	{
		//Récupération de la gallerie
		$model = $this->glamsex_model->getById($modelId);

		//Récupération du/des models
		$model->breasts_type = $this->breasts_type->getById($model->breasts_type_id_fk);
		$model->hair_color = $this->hair_color->getById($model->hair_color_id_fk);
		$model->eye_color = $this->eye_color->getById($model->eye_color_id_fk);
		$model->ethnicity = $this->ethnicity->getById($model->ethnicity_id_fk);
		$model->shaved_type = $this->shaved_type->getById($model->shaved_type_id_fk);

		//Récupération des galleries photo
		$galleries = $this->model_gallery->getByModelId($modelId);
		$photoGalleries = array();
		$movieGalleries = array();
		foreach($galleries as $gallery) {
			$gallery = $this->gallery->getById($gallery->gallery_id);
			if($gallery->gallery_type_id_fk == 1) {
				if($gallery->active == 1)
					$photoGalleries[] = $gallery;
			} else {
				if($gallery->active == 1)
					$movieGalleries[] = $gallery;
			}
		}

		if(count($photoGalleries) > 1)
			$photoGalleries = $this->sortArray($photoGalleries);

		if(count($movieGalleries) > 1)
	    	$movieGalleries = $this->sortArray($photoGalleries);

		$data['model'] = $model;
		$data['photoGalleries'] = $photoGalleries;
		$data['filmGalleries'] = $movieGalleries;
		$this->load->view('model_page', $data);
	}

	private function sortArray($pArray) {
		$ordered = false;
	    $size = count($pArray);
	    while(!$ordered){
	        $ordered = true;
	        for($i=0 ; $i < $size-1 ; $i++) {
	            if($pArray[$i]->date > $pArray[$i+1]->date)
	            {
	                $temp = $pArray[$i+1];
	                $pArray[$i+1] = $pArray[$i];
	                $pArray[$i] = $temp;
	                $ordered = false;
	            }
	        }
	        $size--;
	    }
	    $pArray = array_reverse($pArray);
	    return $pArray;
	}
}
