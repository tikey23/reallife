<div class="text-center" id="admin">
	<?php

	require_once('../functions/eventfunctions.php');

	global $con;

	if (isset($_SESSION['admin'])) {
		echo $twig->render('admin/admin.twig');
		echo $twig->render('admin/adminEventsbutton.twig');
		echo $twig->render('admin/adminSpecialEventsbutton.twig');
		echo $twig->render('admin/adminGalleryButton.twig');
		echo $twig->render('admin/adminMemberButton.twig');
		echo $twig->render('global/logout.twig');
	} else {
		session_destroy();
		echo $twig->render('global/loginfailed.twig');
	}

	?>
</div>