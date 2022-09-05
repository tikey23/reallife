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

<div class="admin">
<?php

require_once('functions/eventfunctions.php');


$con = new mysqli("", "root", "", "reallife");

if (isset($_POST['kennwort'])) {
	$_SESSION["password"] = $_POST["kennwort"];
}

if ($_SESSION['password'] === "reallifecafe") {
	echo "<h1 class='text-3xl font-bold'><u>Administrator Bereich</u></h1>";
	echo "<br>";

	//echo "<input type='checkbox' id='check-event' class='event-checkbox'>";
	// echo "<label for='check-event'><button>Event</button></label>";
	include "adminEvent.php";

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
</div>