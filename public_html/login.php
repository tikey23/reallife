<?php

use \Rl\Models\Member;

require_once('../load.php');

if (isset($_POST['username'])) {
	$username = $_POST['username'];
	$pwd = $_POST['pwd'];
	$member = findOneByColumn(Member::class, 0, "membername", $username);
		
	if ($member == "error") {
		$_SESSION['login_failed'] = TRUE;
	} else {
		if (password_verify($pwd, $member->pwd)) {
			if ($member->memberfunction == "Admin") {
				$_SESSION['admin'] = true;
				$_SESSION['shift'] = true;
				$_SESSION['leader'] = true;
				$_SESSION['helper'] = true;
			} elseif ($member->memberfunction == "Vorstand") {
				$_SESSION['leader'] = TRUE;
				$_SESSION['helper'] = TRUE;
			} elseif ($member->memberfunction == "Schichtplanung") {
				$_SESSION['shift'] = true;
				$_SESSION['leader'] = TRUE;
				$_SESSION['helper'] = TRUE;
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
			$_SESSION['login_failed'] = TRUE;
		}
	}
}

header("location:/index.php?page=login");
exit;
