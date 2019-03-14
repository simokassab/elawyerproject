<?php
session_start(); 
ob_start();
$loggedUser = $_SESSION['user'];
include '../config.php';
include '../functions/global.php';
NewEvent($_POST['dateee'], $_POST['caseID'], $_POST['event'], $_POST['comments'], $_POST['startTimee'], $_POST['endTimee']);
	if(isset($_POST['ByCase'])){
		//header("Location: ../index.php?action=viewCases&id=".$_POST['caseID']);
	}
	else {
		//header("Location: ../index.php?action=mainpage");
	}
ob_end_flush();
?>