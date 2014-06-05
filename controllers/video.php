<?php

class Video extends Controller {
	public function __construct() {
		parent::__construct();
		Authenticate::handlelogin();
	}
	
	public function index() {
		$this->view->videoList = $this->model->videoList();
		$this->view->render('video/index');
	}
	
	public function watch($id) {
		$this->view->video = $this->model->singleVideoList($id);
		if (empty($this->view->video)) {
			die("This is an invalid video");
		}
		$this->view->render('video/watch');
	}
	
}

?>