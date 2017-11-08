<?php
class View extends UserTools {

	public function getAllSchools(){
		foreach($this->getAllOrganization() as $school)
		{
			//echo $school["Name"];
			?>
			<tr class="school" schoolId="<?php echo $school["Id"]?>" >
				<td><input class="schoolName" type="text" value="<?php echo $school["Name"]?>" schoolIdName="<?php echo $school["Id"]?>" ></td>
				<td><input class="schoolInfo" type="text" value="<?php echo $school["ExtraInfo"]?>" schoolIdInfo="<?php echo $school["Id"]?>"  ></td>
				<td><a  class="btn red remove_school" buttonAction="deleteOrganization"><i class="material-icons">delete</i></a>
					<a class="btn purple save_school" buttonAction="updateOrganization" ><i class="material-icons">save</i></a>
					</td>
					</tr>
			<?php

		}
	}

	public function getQuizzes(){


		foreach($this->getAllQuizzes() as $quiz)
		{
			//echo $school["Name"];
			?>
			<tr class="quiz" quizId="<?php echo $quiz["Id"]?>" >
				<td><input class="quizName" type="text" value="<?php echo $quiz["Name"]?>" schoolIdName="<?php echo $quiz["Id"]?>" ></td>
				<td><input class="quizInfo" type="text" value="<?php echo $quiz["Extra info"]?>" schoolIdInfo="<?php echo $quiz["Id"]?>"  ></td>
				<td>
					<a class="btn edit_questions"><i class="material-icons">edit</i> </a>
					<a class="btn purple save_quiz" buttonAction="updateQuiz" ><i class="material-icons">save</i></a>
					<a  class="btn red remove_quiz" buttonAction="deleteQuiz"><i class="material-icons">delete</i></a>
					</td>
					</tr>
			<?php

		}
	}




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

		//$this->makeDepartment("Test",3);

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
