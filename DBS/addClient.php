<?php
session_start(); 
ob_start();
$loggedUser = $_SESSION['user'];
include '../config.php';
include '../functions/global.php';


$status = 1 ; // must checked later

$lastid=NewCustomer(
    $_POST['cfname'], $_POST['csname'], $_POST['ctname'], $_POST['clname'], $_POST['caddress'], 
    $_POST['cstreet'], $_POST['ckasima'], $_POST['chouseType'], $_POST['chouseNumber'], $_POST['cfloor'], 
    $_POST['ceaddress'], $_POST['cidnumber'], $_POST['cphone1'], $_POST['cphone2'],$_POST['cphone3'],$_POST['cphone4'],
    $_POST['cphone5'],$_POST['cphone6'], $_POST['cemail'], $_POST['cfax'],$_POST['cbirthday'], $_POST['ccompany'], $status, $_POST['VIP']);
 $date = date('Y-m-d');
NewAccount($date, $lastid);
header("Location: ../index.php?action=editcustomer&customerid=".$lastid);
ob_end_flush();
?>