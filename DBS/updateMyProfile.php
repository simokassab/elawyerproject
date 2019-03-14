<?php
session_start();
$loggedUser = $_SESSION['user'];
include '../config.php';
include '../functions/global.php';
//include './uploadImageScript.php';
EditUser($_POST['idd'], $_POST['fname'], $_POST['sname'], $_POST['tname'], $_POST['lname'], $_POST['password'], 
        $_POST['gender'], $_POST['idnumber'], $_POST['address'], $_POST['street'], $_POST['kasema'], 
        $_POST['houseType'], $_POST['houseNumber'], $_POST['floor'], $_POST['eaddress'], $_POST['phone1'], 
        $_POST['phone2'], $_POST['phone3'], $_POST['email'], $_POST['fax'], $_POST['room'], '',
        $_POST['description'], $loggedUser['level_ID'], $loggedUser['lawyer_type_ID'], $_POST['fb'], $_POST['tw'], $_POST['linkedin'], $_POST['insta'], $_POST['snap']);
//if($_POST['fromUsersPage'] == 1){
 //   header("Location: ../index.php?action=Users");
 //   exit;
//}
// MUST UPDATE SESSION IN ORDER TO TAKE THE NEW VALUES .. 
//include_once '../DB/db.php';
$db=connectDB($_SESSION['office']);
if ($loggedUser['idd']==$_POST['idd'] ) {
    $query = "SELECT * FROM users WHERE id = ".$_POST['idd'];
    mysqli_query($db, "SET NAMES 'utf8'");
    mysqli_query($db, 'SET CHARACTER SET utf8');
    $result = mysqli_query($db, $query);
    $num_row = mysqli_num_rows($result);
    // if user name and passord doesnot matches... 

    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['user']['idd'] = $row['ID'];
        $_SESSION['user']['user'] = $row['user'];
        $_SESSION['user']['password'] = $row['password'];
        $_SESSION['user']['fname'] = $row['fname'];
        $_SESSION['user']['sname'] = $row['sname'];
        $_SESSION['user']['tname'] = $row['tname'];
        $_SESSION['user']['lname'] = $row['lname'];
        $_SESSION['user']['gender'] = $row['gender'];
        $_SESSION['user']['ID_number'] = $row['ID_number'];
        $_SESSION['user']['ID_member'] = $row['ID_member'];
        $_SESSION['user']['address'] = $row['address'];
        $_SESSION['user']['street'] = $row['street'];
        $_SESSION['user']['kasima'] = $row['kasima'];
        $_SESSION['user']['house_type'] = $row['house_type'];
        $_SESSION['user']['house_nb'] = $row['house_nb'];
        $_SESSION['user']['floor'] = $row['floor'];
        $_SESSION['user']['eaddress'] = $row['eaddress'];
        $_SESSION['user']['phone1'] = $row['phone1'];
        $_SESSION['user']['phone2'] = $row['phone2'];
        $_SESSION['user']['phone3'] = $row['phone3'];
        $_SESSION['user']['email'] = $row['email'];
        $_SESSION['user']['fax'] = $row['fax'];
        $_SESSION['user']['room'] = $row['room'];
        $_SESSION['user']['photo'] = $row['photo'];
        $_SESSION['user']['description'] = $row['description'];
        $_SESSION['user']['level_ID'] = $row['level_ID'];
        $_SESSION['user']['lawyer_type_ID'] = $row['lawyer_type_ID'];
        $_SESSION['user']['status'] = $row['status'];
    }
}
header("Location: ../index.php?action=editestaff&estaffid=".$_POST['idd']);
ob_flush();
exit();
?>