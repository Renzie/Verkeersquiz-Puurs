<?php
class Database {
	private $db_host = 'sql11.freemysqlhosting.net';
	private $db_user = 'sql11198882';
	private $db_pass = 'NSnPfnZF8M';
	private $db_name = 'sql11198882';

	protected function connect(){
		$conn = new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
		return $conn;
	}



}
?>
