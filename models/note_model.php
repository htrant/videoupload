<?php

class Note_Model extends Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function noteList() {
		return $this->db->select("SELECT * FROM note WHERE userid = :userid",
				array(
					"userid" => $_SESSION['userid']
		));
	}
	
	public function noteListSingle($id) {
		return $this->db->select("SELECT * FROM note WHERE userid = :userid AND noteid = :id", 
				array(
						":userid" 	=> $_SESSION['userid'],
						":id" 		=> $id
		));
	}
	
	public function create($data) {
		$this->db->insert ('note', array(
				'title' => $data['title'],
				'userid' => $_SESSION['userid'],
				'content' => $data['content'],
				'date_added' => date('Y-m-d H:i:s')
		));
	}
	
	public function delete($id) {
		$this->db->delete('note', "noteid = '$id' ");
	}
	
	public function editSave($data) {
		$postData = array(
				'title' => $data['title'],
				'content' => $data['content']
		);
		$this->db->update("note", $postData, "noteid = {$data['noteid']} AND userid = {$_SESSION['userid']} ");
	}
	
	
	
}

?>