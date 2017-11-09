<?php
class Database {
	private $db_host = '127.0.0.1';
	private $db_user = 'root';
	private $db_pass = 'toor';
	private $db_name = 'puurs';

	protected function connect(){
		return new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
	}

	protected function getData($sql,$connection){
		$result = $connection->query($sql);
		$numRows = $result->num_rows;
		$data = array();
		if($numRows > 0){
			while($row = $result->fetch_assoc()){
				$data[] = $row;
			}
		}
		$connection->close();
		return $data;
	}


}
?>
