<?php
include_once 'config.php';
header('Content-Type: text/html; charset=utf-8');
$fname=$_REQUEST['firstname'];
$lname=$_REQUEST['lastname'];
$company=$_REQUEST['company'];
$phone=$_REQUEST['phone'];
$email=$_REQUEST['email'];
$con = connectDB($_SESSION['office']);
$ar=array();
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "INSERT INTO newcustomer values (NULL, '$fname', '$lname',  '$company', '$phone', '$email',
    '', '')";

    if (mysqli_query($con, $query)) {
        $lastid = mysqli_insert_id($con);
        $ar['ID']=$lastid;
        $ar['info']='First step is successfully done';
        $ar['status']='success';
    } else {
        $ar['info']='Error'.mysqli_error($con);
        $ar['status']='failed';
       // echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
    echo json_encode($ar);
    mysqli_close($con);

    
?>

