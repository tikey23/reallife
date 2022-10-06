<script type="text/javascript" src="js/NewCandidateForm.js"></script>
<?php

use PHPMailer\PHPMailer\PHPMailer;

// echo $twig->render('member/becomeMember.twig');

if(isset($_POST['newCandidate'])){
    /* candidateName
    candidateE_mail
    candidateMobile
    candidateLittle_akiba
    candidateImg */

    // Vielen Dank! Deine Anmeldung wurde versandt. Wir werden bald mit Dir Kontakt aufnehmen.
    
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Port = 2525;
    $mail->Username = '0afb01c22b87eb';
    $mail->Password = '175cfdf6334a3e';
    $mail->SMTPSecure = 'tls';

    $mail->setFrom('info@mailtrap.io', 'Mailtrap');
    $mail->addReplyTo('info@mailtrap.io', 'Mailtrap');
    $mail->addAddress('recipient1@mailtrap.io', 'Zody');

    /* $mail->addCC('cc1@example.com', 'Elena');
    $mail->addBCC('bcc1@example.com', 'Alex'); */


    $mail->Subject = 'Test Email via Mailtrap SMTP using PHPMailer';

    $mail->isHTML(true);

    $mailContent = "<h1>Send HTML Email using SMTP in PHP</h1>
        <p>This is a test email I’m sending using SMTP mail server with PHPMailer.</p>";
    $mail->Body = $mailContent;


    $mail->msgHTML(file_get_contents('pages/contents.html'), __DIR__);

    if($mail->send()){
        echo 'Message has been sent';
    }else{
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}
?>