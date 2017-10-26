<html>
<body>

<?php require_once "includes/UserTools.class.php";


	$tools = new UserTools();
	echo ($tools->login($_POST["username"],$_POST["pass"]) ? "Welcome ".$_POST["username"] : "Failed to login with ".$_POST["username"]." ".$_POST["pass"]);

?>



</body>
</html>
