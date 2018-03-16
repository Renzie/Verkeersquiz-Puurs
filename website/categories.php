<?php
include('session.php');

require_once "head.html";
require_once "includes/Database.class.php";
require_once "includes/UserTools.class.php";
require_once "includes/View.class.php";
$view = new View();




?>

    <h1>Categorieën</h1>
    <table class="striped ">
        <thead>
        <tr>
            <th>Categorie</th>
        </tr>
        </thead>
        <tbody class="tabel_school">
          <?php

         $view->showCategories();
           ?>
        </tbody>



    </table>
    <a class="btn add_new_difficulty"><i class="material-icons right">add</i>Nieuwe moeilijkheidsgraad</a>

</section>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script type="text/javascript" src="assets/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="assets/js/categories.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>


<?php

require_once "tail.html";

?>
