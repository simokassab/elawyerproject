<?php
session_start();
$loggedUser = $_SESSION['user'];

//echo $_POST['VIP'];
include '../config.php';
include '../functions/global.php';
EditCustomer($_POST['idd'], $_POST['fname'], $_POST['sname'], $_POST['tname'], $_POST['lname'], 
        $_POST['address'], $_POST['street'], $_POST['kasema'], 
        $_POST['houseType'], $_POST['houseNumber'], $_POST['floor'], $_POST['eaddress'], $_POST['idnumber'],  $_POST['phone1'], 
        $_POST['phone2'], $_POST['phone3'], $_POST['phone4'], $_POST['phone5'], $_POST['phone6'], $_POST['email'], $_POST['fax'],
        $_POST['birth'], $_POST['company'], $_POST['VIP']);



header("Location: ../index.php?action=editcustomer&customerid=".$_POST['idd']);
ob_flush();
exit();
?>