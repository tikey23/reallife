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
    echo "<form action='/index.php?page=admin' method='post'>";
	echo "<h1 class='text-3xl font-bold underline'>Administrator Bereich</h1>";
	echo "<br>";
    
    // Events
    include 'admin/adminEvent.php';

    echo "</form>";
	echo "<br>";

    //Logout
	echo "<form action='/index.php?page=logout' method='post'>";
	echo "<p><b><input type='submit' value='Abmelden'></b></p>";
	echo "</form>";
} else {

    // Login failed
	echo "<p>Fehlgeschlagen</p>";
	echo "<p><a href='/index.php?page=anmeldung'>Nochmals anmelden</a></p>";
	session_destroy();
}

?>
</div>