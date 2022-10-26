<?php

use \Rl\Models\Member;

if(!$_SESSION['username']) die("buuuuh");
$username = $_SESSION['username'];
$member = findOneByColumn(Member::class, 0, "membername", $_SESSION['username']);
if($member == "error") die("not allowed");

echo $twig->render('user/userTitle.twig', ["member" => $member]);

if ($member->memberfunction == "Admin") {
	echo $twig->render('admin/toAdmin.twig');
}

echo $twig->render('admin/adminEventsbutton.twig');

echo $twig->render('user/userButtons.twig');
echo $twig->render('global/logout.twig');

$events = showActualEvent();
echo $twig->render('user/userAvailable.twig', ['events' => $events, 'member' => $member]);