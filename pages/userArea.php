<?php

use \Rl\Models\Member;

if(!$_SESSION['username']) die("buuuuh");
$username = $_SESSION['username'];
$member = findOneByColumn(Member::class, 0, "membername", $_SESSION['username']);
if($member == "error") die("not allowed");

echo $twig->render('user/userTitle.twig', ["member" => $member]);

if ($member->memberfunction == "Admin") {
	$_SESSION['admin'] = TRUE;
	$_SESSION['leader'] = TRUE;
	$_SESSION['helper'] = TRUE;
	echo $twig->render('admin/toAdmin.twig');
} elseif ($member->memberfunction == "Leiter") {
	$_SESSION['leader'] = TRUE;
	$_SESSION['helper'] = TRUE;
} else {
	$_SESSION['helper'] = TRUE;
}

echo $twig->render('admin/adminEventsbutton.twig');
echo $twig->render('user/userButtons.twig');
echo $twig->render('global/logout.twig');