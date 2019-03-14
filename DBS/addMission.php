<?php
session_start(); 
ob_start();
header('Content-Type: text/html; charset=utf-8');
$loggedUser = $_SESSION['user'];
include '../config.php';
include '../functions/global.php';
if(isset($_GET['id'])){
    ValidateMission($_GET['id']);
   // header('Refresh: 1; url=index.php?action=mainpage');
}
else {
$status = "PENDING"; // must checked later
$part=$_POST['lawyerrr'];
$participants="";
foreach($part as $p){
    $participants.=$p.",";
}
$participants=  rtrim($participants,",");
//echo $participants;
$userto=$_POST['UserID'];
$uss=  GetUserByID($userto);
if(isset($_POST['caseid'])){
	NewMission($loggedUser['idd'], $_POST['UserID'], 'قضية', $_POST['startdate'],
	    $_POST['enddate'], $_POST['caseid'], $_POST['comments'], $status, $participants, $_POST['priority']);
}
else {
	NewMission($loggedUser['idd'], $_POST['UserID'], $_POST['mtype'], $_POST['startdate'],
	    $_POST['enddate'], 0, $_POST['comments'], $status, $participants, $_POST['priority']);
}
NewNotification($loggedUser['idd'], $_POST['UserID'], "index.php?action=mainpage", "مهمة جديدة من: ".GetFnameLnameByUserID($loggedUser['idd']), "NOTREAD");
$body="<h3>Type:".$_POST['mtype']." </h3><br/>";
$body.="<h3>Start Date: ".$_POST['startdate']."</h3><br/>";
$body.="<h3>End Date: ".$_POST['enddate']."</h3><br/>";
$body.="<h3>Comments: ".$_POST['comments']."</h3><br/>";
$body.="<h3>Participants: ".$participants."</h3><br/>";
$body.="<h3>Priority: ".$_POST['priority']."</h3><br/>";

//sendEmail($uss[0]['email'], 'مهمة جديدة', $body);
    NewAppointmentt($_POST['UserID'], $_POST['startdate'], $_POST['enddate'], 'New Mission', $_POST['comments'].'-<b>'.$_POST['priority'].'-', '');
	if(isset($_POST['ByCase'])){
		header("Location: ../index.php?action=viewCases&id=".$_POST['caseid']."&tab=miss");
	}
	else {
		header("Location: ../index.php?action=mainpage");
	}
}

ob_end_flush();
?>