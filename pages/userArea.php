<?php

use \Rl\Models\Event;
use \Rl\Models\Member;

if(!$_SESSION['username']) die("buuuuh");
$username = $_SESSION['username'];
$member = findOneByColumn(Member::class, 0, "membername", $_SESSION['username']);
if($member == NULL) die("not allowed");
$events = findAll(Event::class);

echo $twig->render('user/userMain.twig', ["member" => $member, "events" => $events]);

