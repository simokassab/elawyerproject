<?php
    include_once 'config.php';
    include '../functions/global.php';
    header('Content-Type: text/html; charset=utf-8');

    $title=$_REQUEST['title'];
    $description=$_REQUEST['description'];
    $email=$_REQUEST['email'];
    $con = connectDB($_SESSION['office']);
    $ar=array();
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "INSERT INTO support_ticket values (NULL, '$title', '$description',  '$email', '1')";

    if (mysqli_query($con, $query)) 
    {
        $lastid = mysqli_insert_id($con);
        $ar['ID']=$lastid;
        $ar['info']='First step is successfully done';
        $ar['status']='success';

        // Send the email to our support team
        sendEmail( 'support@techoffice.co', 'New ticket #'.$lastid, 'A new ticket has been created (Ref: #'.$lastid.')');

        // Send the email to the user
        sendEmail( $email, 'E-Lawyer Support Ticket Opened #'.$lastid, 'We are following your ticket and we will get back to you soon.');
    } 
    else 
    {
        $ar['info']='Error'.mysqli_error($con);
        $ar['status']='failed';
    }
    echo json_encode($ar);
    mysqli_close($con);
?>

