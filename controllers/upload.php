<?php

class Upload extends Controller {

	function __construct() {
		parent::__construct();
		Authenticate::handlelogin();
	}
	
	public function index() {
		$this->view->render ( 'upload/index' );
	}
	
	public function doUpload() {
		$postData = array (
				'filetitle' => $_POST ['filetitle'],
				'filedes' => $_POST ['filedes'],
				'file' => $file = $_FILES['file']
		);
		if ($this->model->doUpload($postData) == true) { 
			header('Location: '. URL . 'video');
		} else {
			header('Location: ' . URL . 'index');
		}
	}
	
	
}

?>