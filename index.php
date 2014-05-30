<?php

require 'config.php';
require 'util/Authenticate.php';

//User autoloader	
function __autoload($class) {		
	require LIB . $class . ".php";
}

$webapp = new VideoDemo();
			
?>
