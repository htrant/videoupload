<?php

class Note extends Controller {
	public function __construct() {
		parent::__construct();
		Authenticate::handlelogin();
	}
	
	public function index() {
		$this->view->noteList = $this->model->noteList();
		$this->view->render('note/index');
	}
	
	public function create() {
		$data = array(
			'title' => $_POST['title'],
			'content' => $_POST['content']
		);
		$this->model->create($data);
		header('Location: '. URL . 'note');
	}
	
	public function edit($id) {
		$this->view->note = $this->model->noteListSingle($id);
		if (empty($this->view->note)) {
			die("This is an invalid note");
		}
		$this->view->render('note/edit');
	}
	
	public function editSave($noteid) {
		$data = array(
			'noteid' => $noteid,
			'title' => $_POST['title'],
			'content' => $_POST['content']
		);
		$this->model->editSave($data);
		header("location: " . URL . "note");
	}
	
	public function delete($id) {
		$this->model->delete($id);
		header('Location: '. URL . 'note');
	}
	
}

?>