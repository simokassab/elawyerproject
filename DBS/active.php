<?php
session_start();
require_once '../config.php';
require_once '../functions/global.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//$x=$_GET['x'];
$user=$_POST['userid'];
$duration="";
$con=  connectDB($_SESSION['office']);
$query="select active from user_active where user_id=$user";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $duration=$row['active'];
        
}
$dur=$duration + 1;
$query_duration="update user_active set active=".$dur." where user_id=$user";
mysqli_query($con, $query_duration);

?>
