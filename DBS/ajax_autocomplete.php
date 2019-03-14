<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../config.php';

$con=  connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $s=$_GET['term'];

    $query="select cfname, csname, ctname, clname from customers where cfname like'%$s%' "
            . "or csname like'%$s%'  or ctname like'%$s%' or clname  like'%$s%'";
    $result = mysqli_query($con, $query);
    while ($rows = mysqli_fetch_assoc($result)) {
         $data[] = $rows['cfname'].' '.$rows['csname'].' '.$rows['ctname'].' '.$rows['clname'];
    }
    echo json_encode($data);
    ?>