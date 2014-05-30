<?php

class Login extends Controller {	
	function __construct() {
		parent::__construct();		
	}
	
	public function index() {
		$this->view->render('login/index');
	}
	
	public function doLogin() {
		$this->model->doLogin();
	}
}

?>