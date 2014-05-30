<?php

class User_Model extends Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function userList() {
		return $this->db->select("SELECT userid, email, role FROM users");
	}
	
	public function userListSingle($id) {		
		return $this->db->select("SELECT userid, email, role FROM users WHERE userid = :userid", array(':userid'=>$id));
	}
	
	public function create($data) {
		$this->db->insert('users',array(
			'email' => $data['email'],
			'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
			'role' => $data['role']
		));
	}
	
	public function delete($id) {
		// Donot delete user with role owner
		$result = $this->db->select("SELECT role FROM users WHERE userid = :id", array(":id"=>$id));
		if ($result[0]["role"] == "owner") {
			return false;
		}
		$this->db->delete('users', "userid = '$id' ");
	}
	
	public function editSave($data) {
		$postData = array(
			'email' => $data['email'],
			'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
			'role' => $data['role']
		);
		
		$where = " `userid` = {$data['id']}";		
		$this->db->update('users', $postData, $where);
	}
	
}

?>