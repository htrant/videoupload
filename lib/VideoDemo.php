<?php

class VideoDemo {
	
	function __construct() {
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url,'/');
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$url = explode('/', $url);
		
		//print_r($url);
		
		if (empty($url[0])) {
			require 'controllers/index.php';
			$controller = new Index();
			$controller->index();
			return false;	//code below won't execute
		}
		
		$file = 'controllers/' . $url[0] . '.php';
		if (file_exists($file)) {
			require $file;
		} else {
			$controller->Error();
		}
		
		$controller = new $url[0];
		$controller->loadModel($url[0]);
		
		//calling methods
		if (isset($url[2])) {
			if (method_exists($controller, $url[1])) {
				$controller->{$url[1]}($url[2]);	//$controller->loadModel($url[2])
			} else {
				$controller->Error();
			}
		} else {
			if (isset($url[1])) {
				if (method_exists($controller, $url[1])) {
					$controller->{$url[1]}();	//$controller->loadModel();
				} else {
					$controller->Error();
				}
			} else {
				$controller->Index();
			}
		}
		
	}
	
}

?>