<?php
//This is the Roels Special
require_once "head.html";
require_once "includes/Database.class.php";
require_once "includes/UserTools.class.php";
require_once "includes/View.class.php";
$view = new View();

if (isset($_POST['Submit1'])) {
    $username = $_POST['username'];

    if ($username == "letmein") {
        print("Welcome back, friend!");
    } else {
        print("You're not a member of this site");
    }
}



?>

    <h1>Scholen</h1>
    <table class="striped ">
        <thead>
        <tr>
            <th>Naam school</th>
            <th>Extra info</th>
        </tr>
        </thead>
        <tbody class="tabel_school">
          <?php
         $view->getAllSchools();
           ?>
        </tbody>



    </table>
    <a class="btn add_new_school"><i class="material-icons right">add</i>Nieuw school</a>

</section>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script type="text/javascript" src="assets/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="assets/js/school.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>


<?php

require_once "tail.html";

?>
