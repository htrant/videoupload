<?php

class Login_Model extends Model {
	function __construct() {
		parent::__construct();
	}
	
	public function doLogin() {
		$email = $_POST['email'];
		$password = $_POST['password'];		
		$stmt = $this->db->prepare("SELECT userid, role FROM users WHERE email=:email AND password=:password");
		$stmt->execute(array(
			':email' => $email,
			':password' => Hash::create('sha256', $password, HASH_PASSWORD_KEY)
		));		
		$data = $stmt->fetch();
		
		$count = $stmt->rowCount();		
		if ($count > 0) {
			//logged in
			Session::init();
			Session::set('loggedIn', true);
			Session::set('role', $data['role']);
			Session::set('userid', $data['userid']);
			header('Location: ../index');
		} else {
			//error
			header('Location: ../login');
		}
	} 
	
}

?>