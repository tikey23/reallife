<?php

use \Rl\Models\Member;

if (isset($_POST['username'])) {
	$username = $_POST['username'];
	$pwd = $_POST['pwd'];
	$member = findOneByColumn(Member::class, 0, "membername", $username);
		
	if ($member == "error") {
		echo "Anmeldedaten sind nicht korrekt";
	} else {
	
		if (password_verify($pwd, $member->pwd)) {
			if ($member->memberfunction == "Admin") {
				$_SESSION['admin'] = true;
				$_SESSION['leader'] = true;
				$_SESSION['helper'] = true;
			} elseif ($member->memberfunction == "Leiter") {
				$_SESSION['leader'] = TRUE;
				$_SESSION['helper'] = TRUE;
			} else {
				$_SESSION['helper'] = TRUE;
			}
			$_SESSION['username'] = $username;

			header("location:/index.php?page=userArea");
			exit;
		} else {
			echo "Anmeldung fehlgeschlagen";
		}
	}
}

echo $twig->render('global/login.twig');
?>