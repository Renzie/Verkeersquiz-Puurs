<?php

session_start();

/*if(!$_SESSION['login']){
   header("location:logout.php");
   //die;
}*/

if(!isset($_GET["id"])){
	header("location:organizatie.php");
}

require_once "head.html";
require_once "includes/Database.class.php";
require_once "includes/UserTools.class.php";
require_once "includes/View.class.php";
$view = new View();




?>

    <h1>Klassen</h1>
    <table class="striped klassen ">
        <thead>
        <tr>
            <th>Naam Klas</th>
            <th>Selecteer een quiz schema</th>
        </tr>
        </thead>
        <tbody class="tabel_school">
          <?php
         $view->getAllDepartmentsByOrganizationId($_GET["id"]);
           ?>
        </tbody>



    </table>
    <a class="btn add_new_department"><i class="material-icons right">add</i>Nieuwe Klas</a>

</section>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script type="text/javascript" src="assets/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="assets/js/school.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>
<script type="text/javascript" src="assets/js/editorganization.js"></script>


<?php

require_once "tail.html";

?>
