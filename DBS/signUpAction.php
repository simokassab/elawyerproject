<?php
session_start(); 
$loggedUser = $_SESSION['user'];
include '../config.php';
include '../constants.php';
include '../functions/global.php';
$id="";
$status = 1 ; // must checked later
if($_POST['level_id'] == 2 ){
    $lawyer_type_id = $_POST['lawyer_type_id'];
}else{
    $lawyer_type_id =-1;
}
$status = 1 ; 
$id=NewUser($_POST['fname'], $_POST['sname'], $_POST['tname'], $_POST['lname'], $_POST['gender'], $_POST['idnumber'], 
        $_POST['idmember'], $_POST['address'], $_POST['street'], $_POST['kasema'], $_POST['houseType'],$_POST['houseNumber'],
        $_POST['floor'], $_POST['eaddress'], $_POST['phone1'], $_POST['phone2'],$_POST['phone3'],$_POST['email'], $_POST['fax'],
        $_POST['room'], '' , $_POST['description'], $_POST['level_id'], $lawyer_type_id, $_POST['color'], $status, $_POST['fb'], $_POST['tw'], $_POST['linkedin'], $_POST['insta'],$_POST['snap'] );
if(($_POST['level_id']==1) ||($_POST['level_id']==2) || ($_POST['level_id']==3)){
		if($_SERVER['SERVER_NAME']=='localhost')
	    {
	    	makeDir(PATH_URL."elfinder/files/".$_SESSION['office']."/$id");
	     	makeDir(PATH_URL."elfinder/files/".$_SESSION['office']."/$id/Archived");
	    }
	    else {
	    	makeDir($_SERVER['DOCUMENT_ROOT']."/elawyer/elfinder/files/".$_SESSION['office']."/$id");
	     	makeDir($_SERVER['DOCUMENT_ROOT']."/elawyer/elfinder/files/".$_SESSION['office']."/$id/Archived");
	    }
}
header("Location: ../index.php?action=editestaff&estaffid=".$id);
ob_flush();
exit();
?>