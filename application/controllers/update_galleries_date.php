<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_galleries_date extends CI_Controller {

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
	
	public function detailedGalleries($pStartDate, $pStopDate, $pLimit) {
		//Galleries details
		$fields = array(
				'name',
				'link',
				'date',
				'rating',
				'number_of_pics',
				'models',
				'photographer',
				'cover'
		);
		if($galleries = $this->apimetart->getMetArtObjectsFromApi($pStartDate, $pStopDate, 'GalleryImages', 'latest-gallery', $fields, $pLimit)) {
			echo '<p>Nombre de galeries a traiter: '.count($galleries).'</p>';
			$count = 0;
			foreach($galleries as $key => $gallery) {
				if($this->gallery->update($gallery))
					$count++;
			}
			echo '<p>Nombre de galeries mises a jour: '.$count.' ('.round(($count*100)/count($galleries)).'%)</p>';
		} else {
			echo '<p>Aucune gallerie a completer pour cette periode</p>';
		}
	}
}
