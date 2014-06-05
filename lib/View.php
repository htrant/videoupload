<?php

class View {
	function __construct() {
		
	}
	
	public function render($name, $notInclude = false) {
		if ($notInclude == true) {
			require 'views/' . $name . '.php';
		} else {
			require 'views/template/header.php';
			require 'views/' . $name . '.php';
			require 'views/template/footer.php';
		}
	}
	
}

?>