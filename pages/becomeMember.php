<script type="text/javascript" src="/js/newCandidateForm.js"></script>

<?php

include('../config/config.php');

use PHPMailer\PHPMailer\PHPMailer;



if(isset($_POST['newCandidate'])){
    $mailContent = "<p>Eine neue Anmdelung von einer Kandidat/in als Helfer/in für Real Life Café erhalten.</p>";

    $mailContent .= "<p>Name: " . $_POST['candidateName'] . "</p>";
    $mailContent .= "<p>Email: " . $_POST['candidateE_mail'] . "</p>";
    $mailContent .= "<p>Mobile: " . $_POST['candidateMobile'] . "</p>";
    $mailContent .= "<p>Little Akiba Profil: " . $_POST['candidateLittle_akiba'] . "</p>";
    $mailContent .= "<p>Little Akiba Avatar: " . $_POST['candidateImg'] . "</p>";
    
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = $Email["host"];
    $mail->SMTPAuth = true;
    $mail->Port = $Email["port"];
    $mail->Username = $Email["username"];
    $mail->Password = $Email["password"];
    $mail->SMTPSecure = 'tls';

    $mail->setFrom($Email["fromAddress"], $Email["fromName"]);
    $mail->addReplyTo($Email["replyAddress"], $Email["replyName"]);
    $mail->addAddress($Email["address"], $Email["adressName"]);

    /* $mail->addCC('cc1@example.com', 'Elena');
    $mail->addBCC('bcc1@example.com', 'Alex'); */


    $mail->Subject = 'Test Email via Mailtrap SMTP using PHPMailer';

    $mail->isHTML(true);

/*     $mailContent = "<h1>Send HTML Email using SMTP in PHP</h1>
        <p>This is a test email I’m sending using SMTP mail server with PHPMailer.</p>"; */
    $mail->Body = $mailContent;


    // $mail->msgHTML(file_get_contents('pages/contents.html'), __DIR__);

    if($mail->send()){
        echo 'Vielen Dank! Deine Anmeldung wurde versandt. Wir werden bald mit Dir Kontakt aufnehmen.';
        echo "<p><a href='/index.php?page=becomeMember'><span class='underline-offset-0'>Zurück</span></a></p>";
        // echo 'Message has been sent';
    }else{
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
} else {
    echo $twig->render('member/becomeMember.twig');
}
?>