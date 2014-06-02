<?php

class VideoDemo {
	
	private $_url = null;
	private $_controller = null;
	
	private $_controllerPath = 'controllers/'; //Always inculude /
	private $_modelPath = 'models/'; //Always inculude /
	private $_errorFile = 'error.php';
	private $_defaultFile = 'index.php';
	
	/**
	 * Use init()
	 */
	function __construct() {
		
	}


	/**
	 * Start the app
	 * @return boolean
	 */
	public function init(){
		//Sets the protected url
		$this->_getUrl();
		
		//Load default controller if no url is set
		if (empty($this->_url[0])) {
			$this->_loadDefaultController();
			return false;
		}
		
		$this->_loadExistingController();		
		$this->_callControllerMethod();
	}
	
	
	/**
	 * (Optional) Set a custom path for controllers
	 * @param string $path
	 */
	public function setControllerPath($path) {
		$this->_controllerPath = trim($path, '/') . '/';
	}
	
	
	/**
	 * (Optional) Set custom path for models
	 * @param string $path
	 */
	public function setModelPath($path) {
		$this->_modelPath = trim($path, '/') . '/';
	}
	
	
	/**
	 * (Optional) Set custom path for error file
	 * @param string $path Use file name of controller only, eg: error.php
	 */
	public function setErrorFile($path) {
		$this->_errorFile = trim($path, '/') . '/';
	}
	
	
	/**
	 * (Optional) Set custom path for error file
	 * @param string $path Use file name of controller only, eg: error.php
	 */
	public function setDefaultFile($path) {
		$this->_defaultFile = trim($path, '/') . '/';
	}
	
	
	/**
	 * Fetching the $_GET from url
	 */
	private function _getUrl() {
		$this->_url = isset($_GET['url']) ? $_GET['url'] : null;
		$this->_url = rtrim($this->_url,'/');
		$this->_url = filter_var($this->_url, FILTER_SANITIZE_URL);
		$this->_url = explode('/', $this->_url);
	}
	
	
	/**
	 * Loading if no GET parameter
	 */
	private function _loadDefaultController() {		
		require $this->_controllerPath . $this->_defaultFile;
		$this->_controller = new Index();
		$this->_controller->index();
	}
	
	
	/**
	 * Loading an existing controller from GET parameter
	 * @return boolean|string
	 */
	private function _loadExistingController() {
		$file = $this->_controllerPath . $this->_url[0] . '.php';
		
		if (file_exists($file)) {
			require $file;
			$this->_controller = new $this->_url[0];
			$this->_controller->loadModel($this->_url[0], $this->_modelPath);
		} else {
			$this->_error();
			return false;
		}
	}
	
	
	/**
	 * If a method is passed in GET url parameter
  	 * eg url: http://URL/controller/method/(param)/(param)/(param)
	 * url[0] = Controller
	 * url[1] = Method
	 * url[2] = param
	 * url[3] = param
	 * url[4] = param
	 */
	private function _callControllerMethod(){
		
		
		$urlLength = count($this->_url);
		
		if ($urlLength > 1) {
			//Ensure the method called is correct
			if (!method_exists($this->_controller, $this->_url[1])) {				
				$this->_error();
			}
		}
		
		//Determine what to load
		switch($urlLength) {
			case 5:
				//Controller->Method(param1,pram2,parm3)
				$this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
				break;
			case 4:
				$this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
				break;
			case 3:
				$this->_controller->{$this->_url[1]}($this->_url[2]);
				break;
			case 2:
				$this->_controller->{$this->_url[1]}();
				break;
			default:
				//Uncomment line below for debug
				//print_r($this->_url);
				$this->_controller->Index();
				break;
		}
	}
	
	
	/**
	 * Redirecting to error page
	 * @return boolean
	 */
	private function _error() {
		require $this->_controllerPath. $this->_errorFile;
		$this->_controller = new Error();
		$this->_controller->index();
		exit;
	}
	
}

?>