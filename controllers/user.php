<?php

class User extends Controller {	
	public function __construct() {
		parent::__construct();
		Authenticate::handlelogin();
	}
	
	public function index() {
		$this->view->user = $this->model->userList();
		$this->view->render('user/index');
	}
	
	public function create() {
		$data = array();
		
		$data['email'] = $_POST['email'];
		$data['password'] = $_POST['password'];
		$data['role'] = $_POST['role'];
		
		//@TODO: Do error checking
		
		$this->model->create($data);
		header('Location: '. URL . 'user');
	}
	
	public function edit($id) {
		//fetch individual user
		$this->view->user = $this->model->userListSingle($id);
		$this->view->render('user/edit');
	}
	
	public function editSave($id) {
		$data = array();
		$data['userid'] = $id;
		$data['email'] = $_POST['email'];
		$data['password'] = $_POST['password'];
		$data['role'] = $_POST['role'];
		$this->model->editSave($data);
	}
	
	public function delete($id) {
		$this->model->delete($id);
		header('Location: '. URL . 'user');
	}
	
}

?>