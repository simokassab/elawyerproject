<?php
session_start(); 
ob_start();
date_default_timezone_set('Asia/Kuwait');
$loggedUser = $_SESSION['user'];
include '../config.php';
include '../functions/global.php';
$date = date('Y-m-d H:i:s');
$datee=explode(" ", $date);
$con=connectDB($_SESSION['office']);
mysqli_query($con, "SET NAMES 'utf8'");
mysqli_query($con, 'SET CHARACTER SET utf8');
$query="select ID from event_type where name='".$_POST['event']."'";
$result = mysqli_query($con, $query);
//echo mysqli_num_rows($result);
if(mysqli_num_rows($result)==0){
	mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
	$q="insert into event_type VALUES (NULL, '".$_POST['event']."')";
	//echo $q;
	mysqli_query($con, $q);
}
else {

}
mysqli_close($con);
NewEvent($datee[0], $_POST['caseID'], $_POST['event'], $datee[1], $_POST['startDateev']);
	if(isset($_POST['ByCase'])){
		header("Location: ../index.php?action=viewCases&id=".$_POST['caseID']."&tab=even");
	}
	else {
		header("Location: ../index.php?action=mainpage");
	}
ob_end_flush();
?>