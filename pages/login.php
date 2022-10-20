<?php

use \Rl\Models\Member;

if (!isset($_SESSION['username'])) {
	$username = $_POST['username'];
	$pwd = $_POST['pwd'];

	$member = findOneByColumn(Member::class, 0, "membername", $username);
} else {
	$username = $_SESSION['username'];
	$pwd = $_SESSION['pwd'];
	$member = findOneByColumn(Member::class, 0, "membername", $_SESSION['username']);
}

if ($member == "error") {
	echo "Anmeldedaten sind nicht korrekt";
} else {
	if (password_verify($pwd, $member->pwd)) {

		$_SESSION['username'] = $username;
		$_SESSION['pwd'] = $pwd;
		if (!isset($_SESSION['refresh'])) {
			header("location:/index.php?page=userArea");
			exit;
		}
	} else {
		echo "Anmeldung fehlgeschlagen";
	}
}

echo $twig->render('global/login.twig');
?>