<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Glamsex_login extends CI_Controller {

	function __construct() {
		// Construct our parent class
		parent::__construct();
		$this->load->model('user', NULL, TRUE);

		if(!isset($_SESSION))
			session_start();

		if(!isset($_SESSION['logged']))
			$_SESSION['logged'] = false;
	}
	
	public function index() {
		//Photographers details
		$this->load->view('login');
	}

	public function request() {
		$returnData = array();
		$login = $this->input->get('login');
		$pwd = sha1($this->input->get('password'));
		if($this->user->getUser($login, $pwd)) {
			$returnData['loginMessage'] = 'Aight brudda !';
			$_SESSION['logged'] = true;
		} else {
			$returnData['loginMessage'] = 'Incorrect credentials';
		}
		$this->load->view('login', $returnData);
	}
}