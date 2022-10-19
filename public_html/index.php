<?php

use \Rl\Models\Member;

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

require_once('../functions/pageHandling.php');
require_once('../functions/eventfunctions.php');
require_once('../functions/specialeventsfunctions.php');
require_once('../models/Model.php');
require_once('../models/Event.php');
require_once('../models/SpecialEvent.php');
require_once('../models/Member.php');
require_once('../models/Picture.php');
require_once('../models/Gallerycategory.php');

[$con, $twig] = bootstrap();


?>

<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Real Life Café</title>
	<link rel="stylesheet" href="/css/format.css">
	<link href="/css/output.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="/img/faviconRL.png">
	<script type="text/javascript" src="/js/navigation.js"></script>
</head>
<body id="idBody" class='bg-violet-300'>

<?=$twig->render('global/head.twig', ['additionalTitle' => $additionalTitle]); ?>

<div id="naviBar" class="bg-violet-200 flex justify-between sm:justify-end">
	<?php
		echo $twig->render('global/hamburger.twig');

		if(isset($_SESSION['username'])){
			$member = findOneByColumn(Member::class, 0, "membername", $_SESSION['username']);
			echo $twig->render('global/userLoggedIn.twig', ['member' => $member]);
		} else {
			echo $twig->render('global/loginButton.twig');
		}
	?>
</div>

<div id="main" class="text-center bg-violet-200 border border-solid border-black rounded-xl" style="margin: 10px 20px; padding: 20px;">
	<?php
		includePage(@$_GET['page']);
	?>
</div>

</body>
</html>

