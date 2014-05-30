<?php

class Watch extends Controller {
	public function __construct() {
		parent::__construct();
		Authenticate::handlelogin();
	}
	
	public function index() {
		$this->view->singleVideoList = $this->model->singleVideoList();
		$this->view->render('watch/index');
	}
	
}

?>