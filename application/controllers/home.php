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
	}
	
	public function index()
	{
		//Récupération des 20 derniers models
		$models = $this->glamsex_model->getLast(20);
		//Récupération des 20 dernières galleries photo
		$photoGalleries = $this->gallery->getLastPhotoGalleries(20);
		//var_dump($photoGalleries);
		

		//Récupération des 20 derniers films
		$movieGalleries = $this->gallery->getLastMovieGalleries(20);
		//var_dump($movieGalleries);
		//exit(0);

		$data['models'] = $models;
		$data['photoGalleries'] = $photoGalleries;

		$this->load->view('test_home', $data);
	}
}
