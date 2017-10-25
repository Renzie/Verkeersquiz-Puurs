<?php
class View extends UserTools {



	public function test(){
		foreach($this->getAllUsers() as $data){
			echo $data["Name"]." ".$data["FamilyName"]."</br>";
		}
		// register works
		//$this->registerAdmin("Arthur", "SupermoeilijKpassword3");

		//login
		echo "login:";
		echo ($this->login("Renzie","password") ? "Succes" : "Failed");

	}
}

?>
