<?php
include('session.php');

require_once "head.html";
require_once "includes/Database.class.php";
require_once "includes/UserTools.class.php";
require_once "includes/View.class.php";
$view = new View();




?>

    <h1>Organisaties</h1>
    <table class="striped ">
        <thead>
        <tr>
            <th>Naam organisatie</th>
            <th>Extra info</th>
        </tr>
        </thead>
        <tbody class="tabel_school">
          <?php $view->getAllSchools(); ?>
        </tbody>



    </table>
    <a class="btn add_new_school"><i class="material-icons right">add</i>Nieuw school</a>

</section>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script type="text/javascript" src="assets/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="assets/js/school.js"></script>


<?php require_once "tail.html"; ?>
