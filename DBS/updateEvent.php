<?php
session_start(); 
$loggedUser = $_SESSION['user'];
include '../config.php';
include '../functions/global.php';
EditEvent($_POST['eid'], $_POST['vedatee'], $_POST['caseID'], $_POST['event'], $_POST['comments'],$_POST['startTime'], $_POST['endTime']);
header("Location: ../index.php?action=mainpage");
ob_flush();
exit();
?>