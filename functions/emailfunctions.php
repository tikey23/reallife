<?php

use PHPMailer\PHPMailer\PHPMailer;

function sendEmail($mailContent, $address, $addressName, $report){
    include('../config/config.php');
    
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
        echo $report;
    }else{
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}
?>