<?php
include('session.php');

if(!isset($_GET["oid"])){
	header("location:organisatie.php");
}

require_once "head.html";
require_once "includes/Database.class.php";
require_once "includes/UserTools.class.php";
require_once "includes/View.class.php";
$view = new View();
$userTools = new UserTools();

$organisationData = $userTools->getOrganisationInfoById($_GET["oid"]);
$departmentData = $userTools->getDepartmentByDepartmentId($_GET["did"]);




?>
    <h2>School: <?php echo $organisationData["name"]; ?></h2>
    <h2>Klas: <?php echo $departmentData["name"]; ?></h2>

    <ul class="quizzes collapsible" data-collapsible="accordion">
          <?php $view->getQuizzesForTemplate($departmentData["id"]); ?>
    </ul>
    </table>


</section>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script type="text/javascript" src="assets/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="assets/js/school.js"></script>
<script type="text/javascript" src="assets/js/editdepartment.js"></script>
<script>
var url_string = window.location.href;
var url = new URL(url_string);
var loaded = false;
var html = '<li><div class="divider"></div></li><li><a href="/editorganisation.php?id=<?php echo $organisationData["id"]; ?>"><i class="material-icons">label</i> <?php echo $organisationData["name"]; ?></a></li>';

if(!loaded) {
    $("#slide-out").append(html);
    loaded = true;
}
</script>


<?php require_once "tail.html";?>
