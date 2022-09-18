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

if(isset($_SESSION['password'])){
	if ($_SESSION['password'] === "$ADMINPASSWORD") {
		
		$_SESSION['memberpassword'] = $_SESSION['password'];

		// Events
		include 'template/admin/adminEventList.php';

		// Special Events
		include 'template/admin/adminSpecialEventsbutton.html';

		//Logout
		include 'template/logout.html';
		
	} else {

		// Login failed
		include 'template/admin/loginfailed.php';
	}
} else {
	include 'template/admin/adminlogin.html';
}

?>
</div>