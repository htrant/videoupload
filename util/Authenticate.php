<?php

class Authenticate {
	
	public static function handlelogin() {
		@session_start();
		$logged = $_SESSION['loggedIn'];
		if ($logged == false) {
			Session::destroy();
			header("location: ../login");
			exit;
		}
	}
	
	
}



?>