<?php

class Dashboard extends Controller {	
	function __construct() {
		parent::__construct();
		Authenticate::handlelogin();		
		$this->view->js = array('dashboard/js/dashboardScript.js');
	}
	
	function index() {
		$this->view->render('dashboard/index');
	}
	
	function logout() {
		Session::destroy();
		header('location: ' . URL . 'login');
		exit;
	}
	
	function xhrInsert() {	//xml http request
		$this->model->xhrInsert();
	}
	
	function xhrGetLists() {
		$this->model->xhrGetLists();
	}
	
	function xhrDelete() {
		$this->model->xhrDelete();
	}
	
}

?>