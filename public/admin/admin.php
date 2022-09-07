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

<div class="text-center" id="admin">
<?php

require_once('functions/eventfunctions.php');
//require_once('functions/galleryfunctions.php');


global $con;
// $con = new mysqli("", "root", "", "reallife");

if (isset($_POST['kennwort'])) {
	$_SESSION["password"] = $_POST["kennwort"];
}

if ($_SESSION['password'] === "reallifecafe") {
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