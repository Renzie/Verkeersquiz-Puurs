<?php
require_once "includes/Database.class.php";
require_once "includes/UserTools.class.php";
require_once "includes/View.class.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<link rel="stylesheet" type="text/css" href="assets/css/reset.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
</head>
<body>
	<?php
		$view = new View();
		$view->test();
		echo "</br>";
		//$view->displayLoginPopup();
	?>

	<script src="assets/js/jquery-3.2.1.js" />
	<script src="assets/js/script.js" />
</body>
</html>
