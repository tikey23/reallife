<?php

use \Rl\Models\Event;
use \Rl\Models\Member;

if(!$_SESSION['username']) die("buuuuh");
$username = $_SESSION['username'];
$member = findOneByColumn(Member::class, 0, "membername", $_SESSION['username']);
if($member == NULL) die("not allowed");
$events = listActualEvent();

if(isset($_POST["modifyPwd"])){
    $oldpwd = $_POST['oldpwd'];
    if (password_verify($oldpwd, $member->pwd)) {
        $newPwd = $_POST['memberNewPwd'];
        $memberNewPwd = password_hash($newPwd, PASSWORD_DEFAULT);
        $member->pwd = $memberNewPwd;
        $member->save();
        echo "Passwort angepasst.";
    } else {
        echo "Altes Passwort falsch. Passwort wurde nicht geändert.";
    }
}

echo $twig->render('user/userMain.twig', ["member" => $member, "events" => $events]);

