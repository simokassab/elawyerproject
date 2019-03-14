<?php
header('Content-Type: text/html; charset=utf-8');
session_start(); 
$loggedUser = $_SESSION['user'];
include '../config.php';
include '../functions/global.php';
$status = 1 ; // must checked later
updateMission($_POST['mid'],$loggedUser['idd'], $_POST['UserID'], $_POST['mtype'], $_POST['VMstartdate'],
    $_POST['VMenddate'], $_POST['commentssss'], $status);
header("Location: ../index.php?action=mainpage");
ob_flush();
exit();
?>