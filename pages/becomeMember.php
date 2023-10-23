<?php

include('../config/config.php');
require_once('../functions/emailfunctions.php');

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['newCandidate'])){
    $address = "info@chibicon.ch";
    $addressName = "RL-Webseite";
    
    $subject = "Real Life Cafe - Helfer Bewerbung";
    
    $mailContent = "<p>Eine neue Anmdelung von einer Kandidat/in als Helfer/in für Real Life Café erhalten.</p>";
    $mailContent .= "<p>Name: " . $_POST['candidateName'] . "</p>";
    $mailContent .= "<p>Email: " . $_POST['candidateE_mail'] . "</p>";
    $mailContent .= "<p>Mobile: " . $_POST['candidateMobile'] . "</p>";
    $mailContent .= "<p>Little Akiba Profil: " . $_POST['candidateLittle_akiba'] . "</p>";
    $mailContent .= "<p>Little Akiba Avatar: " . $_POST['avatarLittle_akiba'] . "</p>";
    
    $report = "<p>Vielen Dank! Deine Anmeldung wurde versandt. Wir werden bald mit Dir Kontakt aufnehmen.</p>";
    $report .="<p><a href='https://reallifecafe.ch/index.php?page=becomeMember'><span class='underline-offset-0'>Zurück</span></a></p>";

    sendEmail($address, $addressName, $subject, $mailContent, $report);

} else {
    echo $twig->render('member/becomeMember.twig');
}
?>