<?php
class View extends UserTools {

	public function getAllSchools(){
		foreach($this->getAllOrganization() as $school)
		{
			//echo $school["Name"];
			?>
			<tr class="school" schoolId="<?php echo $school["id"]?>" >
				<td><input class="schoolName" type="text" value="<?php echo $school["name"]?>" schoolIdName="<?php echo $school["id"]?>" ></td>
				<td><input class="schoolInfo" type="text" value="<?php echo $school["extraInfo"]?>" schoolIdInfo="<?php echo $school["id"]?>"  ></td>
				<td>
					<a  href="editorganization.php?id=<?php echo $school["id"]?>" class="btn edit_school" buttonAction="editOrganization"><i class="material-icons">edit</i></a>
					<a  class="btn red remove_school" buttonAction="deleteOrganization"><i class="material-icons">delete</i></a>
					<a class="btn purple save_school" buttonAction="updateOrganization" ><i class="material-icons">save</i></a>
					</td>
					</tr>
			<?php

		}
	}

	public function getAllDepartmentsByOrganizationId($organizationId){

		foreach($this->getAllDepartmentsById($organizationId) as $department)
		{
			//echo $school["Name"];
			?>
			<tr class="klas" klasId="<?php echo $department["id"]?>" >
				<td><input class="klasName" type="text" value="<?php echo $department["name"]?>" klasIdName="<?php echo $department["id"]?>" ></td>
				<td>
					<a  class="btn red remove_department" buttonAction="deleteDepartment"><i class="material-icons">delete</i></a>
					<a class="btn purple update_department" buttonAction="updateDepartment" ><i class="material-icons">save</i></a>
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
			<tr class="quiz" quizId="<?php echo $quiz["id"]?>" >
				<td><input class="quizName" type="text" value="<?php echo $quiz["name"]?>" schoolIdName="<?php echo $quiz["id"]?>" ></td>
				<td><input class="quizInfo" type="text" value="<?php echo $quiz["extraInfo"]?>" schoolIdInfo="<?php echo $quiz["id"]?>"  ></td>
				<td>
					<a href="editquestions.php?id=<?php echo $quiz["id"]?>" class="btn edit_questions"><i class="material-icons">edit</i> </a>
					<a class="btn purple save_quiz" buttonAction="updateQuiz" ><i class="material-icons">save</i></a>
					<a  class="btn red remove_quiz" buttonAction="deleteQuiz"><i class="material-icons">delete</i></a>
					</td>
					</tr>
			<?php

		}
	}



	public function showEditDifficulties(){

		foreach ($this->getAllDifficulties() as $difficulty) {

			?>
			<tr class="difficulty" diffId="<?php echo $difficulty["id"]?>">
				<td><input  class="difficultyName" type="text" value="<?php echo $difficulty["difficulty"]?>"></td>
				<td><a  class="btn red deleteDifficulty" buttonAction="deleteDifficulty"><i class="material-icons">delete</i></a>
					<a class="btn purple updateDifficulty" buttonAction="updateDifficulty" ><i class="material-icons">save</i></a>
					</td>
					</tr>
			<?php
		}
	}

	public function showCategories(){

		foreach ($this->getAllCategories() as $category) {

			?>
			<tr class="category" catId="<?php echo $category["id"]?>">
				<td><input  class="categoryName" type="text" value="<?php echo $category["category"]?>"></td>
				<td><a  class="btn red deleteCategory" buttonAction="deleteCategory"><i class="material-icons">delete</i></a>
					<a class="btn purple updateCategory" buttonAction="updateCategory" ><i class="material-icons">save</i></a>
					</td>
					</tr>
			<?php
		}
	}

	public function getAllQuestionsById($id){
		foreach ($this->getAllQuestionsByQuizId($id) as $data) {
			?>

			<li class="question" questionId="<?php echo $data["id"]?>">
		        <div class="collapsible-header">
		        <i class="material-icons">chevron_right</i> <?php echo $data["question"]?> </div>
		    	  <div class="collapsible-body">
							<form>
		        <label>Vraag</label>
		        <input name="question" class="col s6" type="text" value="<?php echo $data["question"]?>" placeholder="vraag"/>

		        <div class="editquestion row">
		        <div class=" col s5">
							<div class="input-field">
		        <select name="difficulty">
		       	<option value="" disabled >Selecteer de moeilijkheidsgraad</option>

						<?php
						foreach ($this->getAllDifficulties() as $difficulty) {
							?>
							<option value="<?php echo $difficulty["id"] ?>"
								<?php
								if($difficulty["id"] == $data["difficulty"])
								{
									?> selected <?php
								}
								 ?>
								><?php echo $difficulty["difficulty"] ?></option>

							<?php
						}
						 ?>

		        <!-- <option value="makkelijk">Makkelijk</option>
		       	<option value="normaal">Normaal</option>
		        <option value="moeilijk">Moeilijk</option> -->
		        </select>
		        <label for="difficulty">Moelijkheidsgraad</label>
					</div>
					<div class="input-field">

						 <select name="category">
							 <option disabled>selecteer een categorie</option>
							 <?php
	 						foreach ($this->getAllCategories() as $categorie) {
	 							?>
	 							<option value="<?php echo $categorie["id"] ?>"
	 								<?php
	 								if($categorie["id"] == $data["category"])
	 								{
	 									?> selected <?php
	 								}
	 								 ?>
	 								><?php echo $categorie["category"] ?></option>

	 							<?php
	 						}
	 						 ?>
						 </select>
						 <label for="category">Categorie</label>
					 </div>



		        </div>
		       <div class="col s4 file-field ">
		       <div>
		       	<label>Afbeelding</label>
		        <img name="image" class="materialboxed questionimg" src="<?php echo ($data["imageLink"]!="" ?"images/".$data["imageLink"] : "#")  ?>">
		        </div>



		        </div>
		        <div class="questionbuttons col s3 file-field input-field">
		        <a data-tooltip="Voeg een foto toe" class=" btn tooltipped btn-small waves-effect waves-light purple">
		        <i class="material-icons">add_a_photo</i> <input class="imageupload" type="file" accept="image/gif, image/jpeg, image/png">
		        </a>
						<?php echo ($data["imageLink"]!="" ? '<a data-tooltip="Verwijder afbeelding" class="removeimage btn tooltipped btn-small waves-effect waves-light red"><i class="material-icons">block</i></a>' : "")  ?>

		        </div>
		        </div>

						<h4>Antwoorden</h4>

						<div class="answersdiv<?php echo $data["id"] ?>">
		        <ul class="answers row">
							<?php $this->getAnswerByQuestionId($data["id"]) ?>
		        </ul>
					</div>

		        <div class="row">
		        <div class="col s6">
		        <a class="newanswer  btn btn-small waves-effect waves-light blue "><i class="material-icons ">add</i></a>
		        </div>

		        <div class="col s3 offset-s3 ">
		        <a data-tooltip="Sla deze vraag op!"
		     class="tooltipped btn btn-small waves-effect waves-light green updateQuestion"><i
		     class="material-icons ">save</i></a>
		        <a data-tooltip="Verwijder deze vraag!"
		     class="removeQuestion tooltipped btn btn-small waves-effect waves-light red"><i
		    class="material-icons">delete</i></a>
		        </div>
		        </div>
					</form>
		        </div>
		        </li>


			<?php
		}


	}

	private function getAnswerByQuestionId($id){

		foreach ($this->getAllAnswersByQuestionId($id) as $data) {
			?>
			<li class="answer" answerid="<?php echo $data["id"]?>"  correct = "<?php echo $data["correct"]?>"><div class="input-field col s12">
				<input placeholder="Antwoord " type="text" class="validate" value="<?php echo $data["answer"]?>">
				<a class="removeanswer btn btn-small waves-effect waves-light red"><i class="material-icons">delete</i></a>
				 <a class="markcorrect btn btn-small waves-effect waves-light <?php
				 if($data["correct"] == 0){
					 echo "red";
				 }else{
					 echo "green";
				 }
				 ?>"><i class="material-icons">done</i></a>
				</div></li>

			<?php
		}
	}

public function amountQuestionsQuiz($id){

	foreach ($this->getAllDifficulties() as $difficulty) {
		?>
		<div style="width:20%;display:inline-block;">
			<label><?php echo $difficulty["difficulty"] ?></label><input class="diff<?php echo $difficulty["id"] ?>" type="number" min="0" max="100">
		</div>
		<?php
	}

}



	public function test(){
		 foreach($this->getAllUsers() as $data){
		 	echo $data["name"]." ".$data["familyName"]."</br>";
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
				echo $data["name"]." ".$data["extraInfo"]."</br>";
			}
		}else{
			echo "There are no quizzes to display";
		}
	}

	public function displayLogs(){
		if($this->getAllQuizzes() != null){
			foreach($this->getLogs() as $data){
				echo $data["timestamp"].": ".$data["message"]."</br>";
			}
		}else{
			echo "Logs are empty";
		}
	}

	public function getAnswersOverview($quizid){

		$allQuizQuestions = $this->getAllQuestionsByQuizId($quizid);
		$allCategories = $this->getAllCategories();
		$allDifficulties = $this->getAllDifficulties();

		$stucturedData=[];

		foreach ($allCategories as $category) {
			$subarray=[];
			foreach ($allDifficulties as $difficulty) {
				$counter = 0;
				foreach($allQuizQuestions as $question){
					//echo "<p>quest.diff: ".$question["difficulty"]."</p>";
					//echo "<p>diff.diff: ".$difficulty["id"]."</p>";
					//echo "<p>qest.cat: ".$question["category"]."</p>";
					//echo "<p>qest.diff: ".$category["id"]."</p>";
					if($question["difficulty"]==$difficulty["id"] AND $question["category"] == $category["id"]){

						$counter++;
					}
				}
				$subarray[$difficulty["difficulty"]]=$counter;
			}
			$stucturedData[$category["category"]]=$subarray;
		}
		print_r ($stucturedData);


		//display collumns
		foreach ($allCategories as $category) {
			echo "<div id='kolom' class='row s12'>";
			echo "<h5>".$category["category"]."</h5>";
			foreach ($allDifficulties as $difficulty) {
				echo "<div id='kolom' class='col s3'>";
				echo '<label>'.$difficulty["difficulty"].' ('.$stucturedData[$category["category"]][$difficulty["difficulty"]].')</label>';
				echo '<input name "'.$category["category"].'_'.$difficulty["difficulty"].'" min="0" max="'.$stucturedData[$category["category"]][$difficulty["difficulty"]].'" name="something" type="number"/>';
				echo "</div>";
			}

			echo "</div>";

		}
		echo "</div>";



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
