<?php
session_start();

if(!$_SESSION['login']){
   header("location:logout.php");
   die();
}

if(!isset($_GET["id"])){
	header("location:organisatie.php");
}

require_once "head.html";
require_once "includes/Database.class.php";
require_once "includes/UserTools.class.php";
require_once "includes/View.class.php";

$userTools = new UserTools();
$view = new View();
$data = array();
$data = $userTools->getQuizInfoById($_GET["id"]);




?>

    <h2>Template maken voor: <?php echo $data["name"]?> </h2>
		<div class="row s12">
			<div class="col s4">
        <p>Maak een nieuwe template</p>
				<br>
				<div class="input-field col s12">
          <input placeholder="Naam template" id="template_name" type="text" class="validate" required>
          <label for="first_name">Template naam</label>
        </div>

			</div>
      <div class="col s4">
        <br>
        <div id="back" class="hide">

        <br>
        <a type="submit" class="waves-effect waves-light btn blue " href="javascript:location.reload()">Nieuwe template</a>
      </div>
      </div>
      <div class="col s4">
        <p>Wijzig template</p>
        <br>
        <div class="input-field col s12">
      <select class="templateSelect">
        <option value="" disabled selected>Kies een template</option>
        <?php
          foreach ($userTools->getAllTemplates() as $template) {
            ?> <option class="templateOption" value="<?php echo $template["id"];?>" quiztemplate='<?php echo $template["template"];?>'><?php echo $template["name"]; ?> </option>
        <?php  }
         ?>
      </select>
      <label>Bestaande templates</label>
    </div>
    </div>

		</div>
    <form>
    <?php
    $view->getAnswersOverview($_GET["id"]);
    ?>

    </form>
		<a type="submit" class="waves-effect waves-light btn" id="submitTemplate">Aanmaken</a>
    <a type="submit" class="waves-effect waves-light btn hide" id="updateTemplate">Update</a>
    <a type="submit" class="waves-effect waves-light btn hide red" id="deleteTemplate">Delete</a>
    <br><br>

</section>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="assets/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="assets/js/template.js"></script>


<?php

require_once "tail.html";

?>
