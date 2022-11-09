<?php

include('../config/config.php');
require_once('../functions/emailfunctions.php');

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['newCandidate'])){
    $mailContent = "<p>Eine neue Anmdelung von einer Kandidat/in als Helfer/in für Real Life Café erhalten.</p>";

    $mailContent .= "<p>Name: " . $_POST['candidateName'] . "</p>";
    $mailContent .= "<p>Email: " . $_POST['candidateE_mail'] . "</p>";
    $mailContent .= "<p>Mobile: " . $_POST['candidateMobile'] . "</p>";
    $mailContent .= "<p>Little Akiba Profil: " . $_POST['candidateLittle_akiba'] . "</p>";
    $mailContent .= "<p>Little Akiba Profil: " . $_POST['avatarLittle_akiba'] . "</p>";
    
    $address = "recipient1@mailtrap.io";
    $addressName = "Zody";

    $subject = "Real Life Cafe - Helfer Bewerbung";

    $report = "<p>Vielen Dank! Deine Anmeldung wurde versandt. Wir werden bald mit Dir Kontakt aufnehmen.</p>";
    $report .="<p><a href='/index.php?page=becomeMember'><span class='underline-offset-0'>Zurück</span></a></p>";

    sendEmail($mailContent, $address, $addressName, $report, $subject);

} else {
    echo $twig->render('member/becomeMember.twig');
}
?>