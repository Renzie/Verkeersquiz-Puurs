<?php
class Database {
	private $db_host = 'localhost';
	private $db_user = 'root';
	private $db_pass = '';
	private $db_name = 'puurs';

	protected function connect(){
		$conn = new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
		return $conn;
	}



}
?>
