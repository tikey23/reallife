<?php

if(isset($_SESSION['login_failed'])) {
	unset($_SESSION['login_failed']);
	echo "<p>Anmeldung ist fehlgeschlagen.</p>";
}

echo $twig->render('global/login.twig');
?>