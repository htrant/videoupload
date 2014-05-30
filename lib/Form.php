<?php

require "Form/Validate.php";

/**
 * - Fill in a form
 * - POST to PHP
 * - Sanitize
 * - Validate
 * - Return data
 * - Write to DB
 */
class Form {
	/** @var array $postData Store the posted data */
	private $postData = array();	
	/** @var array $currentItem The immdediately posted item */
	private $currentItem = null;
	
	/** @var object validate This is for validating the form */
	private $validate = array();
	
	/** @var array $error Store the current errors */
	private $error = array();
	
	
	/**
	 * __construct - Instantiates the Validate object
	 */
	public function __construct() {
		$this->validate = new Validate();
	}
	
	
	/**
	 * get - Return the posted data
	 * @param mixed $fieldName (empty array as default)
	 * @return mixed multitype Return string or array
	 */
	public function get($fieldName = array()) {
		if ($fieldName) {
			if (isset($this->postData[$fieldName])) {
				return $this->postData[$fieldName];
			} else {
				return false;
			}
		} else {		
			return $this->postData;
		}
	}
	
	
	/**
	 * post - This is to run $_POST
	 * @param string $field The html field to post
	 * @return Form
	 */
	public function post($field) {
		$this->postData[$field] = $_POST[$field];
		$this->currentItem = $field;
		return $this;
	}
	
	
	/**
	 * validate - This is for validation
	 * @param string $type_of_validator A method called from Form/Validate
	 */
	public function validate($type_of_validator, $arg = null) {
		if($arg == null) {
			$error = $this->validate->{$type_of_validator}($this->postData[$this->currentItem]);
		} else {
			$error = $this->validate->{$type_of_validator}($this->postData[$this->currentItem], $arg);
		}
		
		if ($error) {
			$this->error[$this->currentItem] = $error;
		}
		return $this;
	}
	
	
	/**
	 * submit - Handles the from and throws an exception upon error
	 * @throws Exception
	 * @return boolean
	 */
	public function submit(){
		if (empty($this->error)) {
			return true;
		} else {
			$string = null;
			foreach($this->error as $key=>$value) {
				$string .= $key . " => " .$value . "\n";
			}
			throw new Exception($string);
		}
	}
	
	
}

?>