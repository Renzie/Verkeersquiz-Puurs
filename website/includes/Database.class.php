<?php
class Database {
	private $db_host = 'verkeersquiz.eu.mysql';
	private $db_user = 'verkeersquiz_eu';
	private $db_pass = '2bYAMrtV7nkUZ2zR3pcEtPNX';
	private $db_name = 'verkeersquiz_eu';

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
