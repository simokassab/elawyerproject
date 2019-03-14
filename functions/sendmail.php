<?php
require_once('PHPMailer-master/PHPMailerAutoload.php');
$mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';
    $mail->IsSMTP(); // enable SMTP
    //$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "n1plcpnl0024.prod.ams1.secureserver.net";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);              // set the SMTP port for the GMAIL server
    $mail->Username   = "contact@e-lawyer.co";  // GMAIL username
    $mail->Password   = "elawyer123!";            // GMAIL password

    $mail->SetFrom('donotreply@e-lawyer.co', 'E-lawyer System ');

    //$mail->AddReplyTo("name@yourdomain.com","First Last");

    $mail->Subject    = $_GET['subject'];

    //$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
    $body=$body;
    $mail->MsgHTML($_GET['body']);

    $address = $_GET['to'];


    $mail->AddAddress($address, "");

    //$mail->AddAttachment("images/phpmailer.gif");      // attachment
    //->AddAttachment("images/phpmailer_mini.gif"); // attachment

    if(!$mail->Send()) {
      return $mail->ErrorInfo;
    } else {
      return "ok";
    }



?>