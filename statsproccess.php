<?php
session_start();
require_once './config.php';
require_once './functions/global.php';
date_default_timezone_set('Asia/Kuwait');
$date = date('Y-m-d');
//echo $date;
$time=date('H:i:s');

$con=  connectDB($_SESSION['office']);
mysqli_query($con,"SET NAMES 'utf8'");
mysqli_query($con,'SET CHARACTER SET utf8');

$users=array();

$users=  GetAllUsers();
$break=array();
$break=  getAllBreak();
$query="insert into user_stats  select ID, user_ID, status, duration, '$date' from user_logs_daily";
//echo $query;
mysqli_query($con, $query);


//print_r(getAllBreak());
?>