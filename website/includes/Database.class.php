<?php
class Database {


	/*protected function connect(){
		return new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
	}*/

	protected function getPDOObject(){
        $db_host = '127.0.0.1';
        $db_user = 'puurs';
        $db_pass = 'puurs';
        $db_name = 'puurs';
        $dsn = "mysql:host=$db_host;dbname=$db_name";
		try {
			$conn = new PDO($dsn,$db_user,$db_pass);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//echo "Connected successfully";
            return $conn;
		}
		catch(PDOException $e)
		{
			echo "Connection failed: " . $e->getMessage();
		}
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
