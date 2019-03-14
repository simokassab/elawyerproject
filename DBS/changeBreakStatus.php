<?php
session_start();

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
date_default_timezone_set('Asia/Kuwait');
$date = date('Y-m-d');
$datetime=date('Y-m-d H:i:s');
//echo $date;
require_once '../config.php';
require_once '../functions/global.php';
$con=  connectDB($_SESSION['office']);
mysqli_query($con, "SET NAMES 'utf8'");
mysqli_query($con, 'SET CHARACTER SET utf8');

$breaks=$_GET['breakstatus'];
$id=$_GET['userid'];
$q="select break_status from online_users where user_ID=$id and date='$date'";

$result = mysqli_query($con, $q);
if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        $query1="select duration, timee from user_logs_daily where user_ID=".$id." and status='".$row['break_status']."'";
        //echo $query1."<br/>";
        $result1 = mysqli_query($con, $query1);
        if (mysqli_num_rows($result1) > 0) {
        // output data of each row
        $row1 = mysqli_fetch_assoc($result1);
        $oldtime=new \DateTime($row1['timee']);
        //echo $oldtime."<br/>";
        $now= new \DateTime(date('Y-m-d H:i:s'));
       // echo $now."<br/>";
        $duration=$row1['duration'] + $oldtime->diff($now)->format('%i') * 60 + $oldtime->diff($now)->format('%s');
        echo $row1['duration']." ---".$oldtime->diff($now)->format('%s')."  --------  ".$duration." ------<br>";
        $query_duration="update user_logs_daily set timee='$datetime',  duration=".$duration." where user_ID=".$id." and status='".$row['break_status']."' ";
     
        mysqli_query($con, $query_duration);
        }    
}
$query_status="update user_logs_daily set timee='$datetime' where user_ID=".$id." and status='".$breaks."' ";
//echo $query_status."<br/>";
mysqli_query($con, $query_status);        
$query="update online_users set break_status='".$breaks."' where user_ID=".$id." and date='$date'";
if (mysqli_query($con, $query)) {
    echo "ok";
}
mysqli_close($con);
?>