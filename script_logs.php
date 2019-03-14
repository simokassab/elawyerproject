<?php

session_start();
require_once './config.php';

require_once './functions/global.php';

$con=  connectDB($_SESSION['office']);
mysqli_query($con,"SET NAMES 'utf8'");
mysqli_query($con,'SET CHARACTER SET utf8');
date_default_timezone_set('Asia/Kuwait');
$date = date('Y-m-d');
//echo $date;
$time=date('H:i:s');

//echo $time;
$users=array();

$users=  GetAllUsers();
$break=array();
$break=  getAllBreak();
$q_drop='TRUNCATE TABLE user_logs_daily ';
	mysqli_query($con, $q_drop);
foreach($users as $user){

    $query="insert into user_active VALUES (NULL, ".$user['ID'].",  '0', '$date')";
        mysqli_query($con, $query);
    echo $query;
    $query_online_users="insert into online_users VALUES (NULL, ".$user['ID'].", '$date', '00:00:00', 0, 'غير متصل') ";
    //echo $query_online_users;
    mysqli_query($con, $query_online_users);
    foreach ($break as $b){

        $query="insert into user_logs_daily VALUES (NULL, ".$user['ID'].", '".$b['value']."', NULL, '0')";
        mysqli_query($con, $query);
        
    }
    
}


//print_r(getAllBreak());
?>