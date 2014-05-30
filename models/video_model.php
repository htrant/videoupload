<?php

class Video_Model extends Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function videoList() {
		$fileData = $this->db->select("SELECT * FROM video WHERE userid = :userid",
				array(
						"userid" => $_SESSION['userid']
		));
		return $fileData;
	}
	
	public function singleVideoList($id) {
		return $this->db->select("SELECT * FROM video WHERE userid = :userid AND fileid = :id",
				array(
						":userid" 	=> $_SESSION['userid'],
						":id" 		=> $id
		));
	}
	
	
	
}

?>