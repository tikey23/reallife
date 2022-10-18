<div class="text-center" id="admin">
	<?php

	require_once('../functions/eventfunctions.php');


	global $con;

	if (isset($_POST['password'])) {
		$_SESSION["password"] = $_POST["password"];
	}

	if ($ADMINPASSWORD == "") {
		die('Passwort nicht gesetzt');
	}

	if (isset($_SESSION['password'])) {
		if ($_SESSION['password'] == "$ADMINPASSWORD") {

			$_SESSION['memberpassword'] = $_SESSION['password'];

			//Admin logged in

			echo $twig->render('admin/admin.twig');
			echo $twig->render('admin/adminEventsbutton.twig');
			echo $twig->render('admin/adminSpecialEventsbutton.twig');
			echo $twig->render('admin/adminGalleryButton.twig');
			echo $twig->render('admin/adminMemberButton.twig');
			echo $twig->render('global/logout.twig');
		} else {
			session_destroy();
			echo $twig->render('admin/loginfailed.twig');
		}
	} else {
		echo $twig->render('admin/adminlogin.twig');
	}

	?>
</div>