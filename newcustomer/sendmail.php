<?php 

require_once('./PHPMailer-master/PHPMailerAutoload.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail = new PHPMailer();
$mail->CharSet = 'UTF-8';
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "n1plcpnl0024.prod.ams1.secureserver.net";
$mail->Port = 465; // or 587
$mail->IsHTML(true);              // set the SMTP port for the GMAIL server
$mail->Username   = "contact@e-lawyer.co";  // GMAIL username
$mail->Password   = "elawyer123!";            // GMAIL password

$mail->SetFrom(''.$_GET['email'], ''.$_GET['fname'].' '.$_GET['lname']);

//$mail->AddReplyTo("name@yourdomain.com","First Last");

$mail->Subject    = "طلب جديد من ".$_GET['fname'].' '.$_GET['lname'];

//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
$body="Dear Techoffice, <br/><br/>";
$body.="<h3> Full Name: <b>".$_GET['fname'].' '.$_GET['lname']."</b><br/></h3>";
$body.="<h3>Company: <b>".$_GET['comp']."</b><br/></h3>";
$body.="<h3>Mobile: <b>".$_GET['mob']."</b><br/></h3>";
$body.="<h3>Email: <b>".$_GET['email']."</b><br/></h3>";
$body.="<h3>Server Capacity: <b>".$_GET['server']." TB</b><br/></h3>";
$body.="<h3>Package: <b>".$_GET['package']."</b><br/></h3><br/><br/>";
$body.="Regards,<br/>";
$mail->MsgHTML($body);

$address = "team@techoffice.co";


$mail->AddAddress($address, "Team Techoffice");

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}

?>