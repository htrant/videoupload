<?php
class Database extends PDO {
	
	public function __construct($db_type, $db_host, $db_name, $db_user, $db_pass) {		
		parent::__construct($db_type . ':host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
	}
	
	
	/**
	 * select
	 * @param string $sql An Sql string
	 * @param array $array Parameters to bind (Empty array as default)
	 * @param constant $fetchMode A PDO fetch mode (FETCH_ASSOC as default)
	 * @return Return mixed 
	 */
	public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC) {
		$stmt = $this->prepare($sql);
		foreach($array as $key=>$value) {
			$stmt->bindValue("$key", $value);
		}
		$stmt->execute();
		return $stmt->fetchAll($fetchMode);
	}
	
	
	/**
	 * insert
	 * @param string $table A name of table to insert data into
	 * @param string $data An associative array
	 */	
	public function insert($table, $data) {
		ksort($data);
		$fieldNames = implode("`, `", array_keys($data));
		$fieldValues = ":" . implode(", :", array_keys($data));
		
		$stmt = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)" );		
		foreach ($data as $key=>$value) {
			$stmt->bindValue(":$key", $value);
		}
		
		$stmt->execute();
	}
	
	
	/**
	 * update
	 * @param string $table A name of table to insert data into
	 * @param string $data An associative array
	 * @param string $where The WHERE part
	 */
	public function update($table, $data, $where) {
		ksort($data);
		$fieldDetails = null;
		
		foreach($data as $key=>$value) {
			$fieldDetails .= "`$key`= :$key,";
		}
		$fieldDetails = rtrim($fieldDetails, ',');
		
		$stmt = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
		
		foreach ($data as $key=>$value) {
			$stmt->bindValue(":$key", $value);			
		}
		$stmt->execute();
	}
	
	
	/**
	 * delete
	 * @param string $table A name of table contains item to be deleted
	 * @param string $where The condition
	 * @param integer $limit The limitation (1 as default)
	 */
	public function delete($table, $where, $limit = 1) {
		$sql = ("DELETE FROM $table WHERE $where LIMIT $limit");
		$rowAffected = $this->exec($sql);
		return $rowAffected;
	}
}

?>