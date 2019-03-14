<?php
session_start(); 
$loggedUser = $_SESSION['user'];
include '../config.php';
include '../functions/global.php';
//$status = "DONE" ; // must checked later
//echo $_POST['caseSubject'];
//echo $_POST['consultant_ID'];
$cons="";
if(isset($_POST['consultnat_ID'])){
    $cons=$_POST['consultnat_ID'];
}

EditCase($_POST['cid'], $_POST['caseTypeID'], $_POST['lawyer_ID'], $cons, $_POST['caseSubject'], $_POST['description'], $_POST['status']);
header("Location: ../index.php?action=viewCases&id=".$_POST['cid']);
//EditCase($id, $casetype_id, $lawyer_id, $consultant_id, $subject, $description, $status);
ob_flush();
exit();
?>