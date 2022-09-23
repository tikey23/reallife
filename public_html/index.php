<?php

use Rl\Models\Member\Member;

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

require_once('functions/date.php');
require_once('functions/pageHandling.php');
require_once('functions/eventfunctions.php');
require_once('functions/specialeventsfunctions.php');
require_once('models/Model.php');
require_once('models/Member.php');

[$con, $twig] = bootstrap();


?>

<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8">
	<title>Real Life Café</title>
	<link rel="stylesheet" href="/css/format.css">
	<link href="/css/output.css" rel="stylesheet">
</head>
<body>

<?=$twig->render('global/head.twig');?>

<div class="text-center p-2" id="main">
	<?php
		includePage(@$_GET['page']);
	?>
</div>

<div class="foot mb-8">
	<p>Version 0.03</p>
	<?php
	if (isset($_SESSION['password'])) {
		echo "<p><a href='/index.php?page=admin'>Admin Bereich</a></p>";
	} else {
		echo "<p><a href='/index.php?page=admin'>Administrator Anmeldung</a></p>";
	}

	if (isset($_SESSION['memberpassword']) || isset($_SESSION['password'])) {
		echo "<p><a href='/index.php?page=member'>Mitarbeiter Bereich</a></p>";
	} else {
		echo "<p><a href='/index.php?page=member'>Mitarbeiter Anmeldung</a></p>";
	}
	?>

</div>


</body>
</html>

