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
if ($_SESSION['password'] === "$ADMINPASSWORD") {

	// Events
	include 'template/admin/adminEventList.php';

	// Special Events
	include 'template/admin/adminSpecialEventsbutton.html';

    //Logout
	include 'template/admin/logout.html';
	
} else {

    // Login failed
	include 'template/admin/loginfailed.php';
}

?>
</div>