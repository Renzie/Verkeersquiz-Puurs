<?php
class View extends UserTools {



	public function test(){
		 foreach($this->getAllUsers() as $data){
		 	echo $data["Name"]." ".$data["FamilyName"]."</br>";
		 }

		// register works
		//$this->registerAdmin("Arthur", "SupermoeilijKpassword3");

		//login
		// echo "login: ";
		// echo ($this->login("Renzie","password") ? "Succes" : "Failed");

		//$this->registerUser("Test","test",3);

		$this->makeDepartment("Test",3);






	}

	public function displayQuizzes(){
		if($this->getAllQuizzes() != null){
			foreach($this->getAllQuizzes() as $data){
				echo $data["Name"]." ".$data["Extra info"]."</br>";
			}
		}else{
			echo "There are no quizzes to display";
		}
	}

	public function displayLogs(){
		if($this->getAllQuizzes() != null){
			foreach($this->getLogs() as $data){
				echo $data["Timestamp"].": ".$data["Message"]."</br>";
			}
		}else{
			echo "Logs are empty";
		}
	}


	public function displayLoginPopup(){
		?>
		<!-- Button to open the modal login form -->
		<button onclick="document.getElementById('id01').style.display='block'">Login</button>

		<!-- The Modal -->
		<div id="id01" class="modal">
		<span onclick="document.getElementById('id01').style.display='none'"
		class="close" title="Close Modal">&times;</span>

		<!-- Modal Content -->
		<form class="modal-content animate" action="/login.php" method="post">

		<div class="container">
		  <label><b>Username</b></label>
		  <input type="text" placeholder="Enter Username" name="username" required>

		  <label><b>Password</b></label>
		  <input type="password" placeholder="Enter Password" name="pass" required>

		  <button type="submit">Login</button>
		  <input type="checkbox" checked="checked"> Remember me
		</div>

		<div class="container" style="background-color:#f1f1f1">
		  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
		  <span class="psw">Forgot <a href="#">password?</a></span>
		</div>
		</form>
		</div>

		<?php
	}
}

?>
