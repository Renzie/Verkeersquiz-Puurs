<?php
class View extends UserTools {



	public function test(){
		foreach($this->getAllUsers() as $data){
			echo $data["Name"]."<br />";
			echo $data["FamilyName"]."<br />";
		}

		$this->registerAdmin("Arthur", "SupermoeilijKpassword3");
	}
}

?>
