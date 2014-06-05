<?php

class Validate {
	function __construct() {}
	
	public function minlength($data, $arg){
		if (strlen($data) < $arg) {
			return "Your string can only be $arg long";
		}
	}
	
	public function maxLength($data, $arg){
		if (strlen($data) > $arg) {
			return "Your string can only be $arg long";
		}
	}
	
	public function digit($data){
		if (ctype_digit($data) == false) {
			return "Your string must be a digit";
		}
	}
	
	/* Handling nonexistent method if called */
	public function __call($name, $arg) {
		throw new Exception("$name does not exist inside of: " . __CLASS__);
	}
	
}

?>
