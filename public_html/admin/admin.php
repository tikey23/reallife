<div class="text-center" id="admin">
	<?php

	require_once('functions/eventfunctions.php');


	global $con;

	if (isset($_POST['password'])) {
		$_SESSION["password"] = $_POST["password"];
	}

	if ($ADMINPASSWORD == "") {
		die('Passwort nicht gesetzt');
	}

	if (isset($_SESSION['password'])) {
		if ($_SESSION['password'] === "$ADMINPASSWORD") {

			$_SESSION['memberpassword'] = $_SESSION['password'];

			if (isset($_POST['modifyEvent'])) {
				modifyEvent($_POST['newdate'], $_POST['modifyEvent']);
			}

			if (isset($_POST['deleteEvent'])) {
				deleteEvent($_POST['deleteEvent']);
			}

			if (isset($_POST['createEvent'])) {
				createEvent($_POST['day0'], $_POST['month0'], $_POST['year0'],);
			}

			$events = getEvents();
			$selectDate = selectdate(0);

			echo $twig->render('admin/adminEventList.twig', [
				"events" => $events,
				"modifypick" => @$_POST['modifypick'],
				"selectDate" => $selectDate,
			]);
			echo $twig->render('admin/adminSpecialEventsbutton.twig');
			echo $twig->render('logout.twig');
		} else {
			session_destroy();
			echo $twig->render('admin/loginfailed.twig');
		}
	} else {
		echo $twig->render('admin/adminlogin.twig');
	}

	?>
</div>