<style>
    input {
        padding: 2px;
        margin: 2px;
        border-radius: 2px;
        border: 1px solid black;
    }

    input:hover {
        background-color: #c4b5fd; /* bg-violet-300 */
        padding: 2px;
    }

    button {
        padding: 2px;
        margin: 2px;
        border-radius: 2px;
        border: 1px solid black;
    }
</style>

<?php

require_once('functions/eventfunctions.php');

echo "<form action='/index.php?page=admin' method='post'>";
$con = new mysqli("", "root", "", "reallife");

if (isset($_POST['kennwort'])) {
	$_SESSION["password"] = $_POST["kennwort"];
}

if ($_SESSION['password'] === "reallifecafe") {
	echo "<h1 class='text-3xl font-bold'><u>Administrator Bereich</u></h1>";
	echo "<br>";

	echo "<p><b>Eingetragene Termine:</b></p>";

	if(isset($_POST['modifyEvent'])){
		modifyEvent($con, $_POST['newdate'], $_POST['modifyEvent']);
	}

	if(isset($_POST['deleteEvent'])){
		deleteEvent($con, $_POST['deleteEvent']);
	}

	if(isset($_POST['createEvent'])){
		createEvent($con, $_POST['day'], $_POST['month'], $_POST['year'], );
	}

	showEvent($con);

	echo "</form>";
	echo "<br>";
	echo "<form action='/index.php?page=logout' method='post'>";
	echo "<p><b><input type='submit' value='Abmelden'></b></p>";
	echo "</form>";
} else {
	echo "<p>Fehlgeschlagen</p>";
	echo "<p><a href='/index.php?page=anmeldung'>Nochmals anmelden</a></p>";
	session_destroy();
}

?>