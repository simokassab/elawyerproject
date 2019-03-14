<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require_once '../config.php';
require_once '../functions/global.php';
$id=$_GET['alarmid'];
$alarm=getAlarmById($id);
print_r($alarm);
$src = "..//elfinder/files/".$_SESSION['office']."/".$alarm['lawyer_id']."/Alarm_".$alarm['ID']."_".$alarm['subject']."/";
mkdir("../elfinder/files/".$_SESSION['office']."/".$alarm['lawyer_id']."/Archived/Alarm_".$alarm['ID']."_".$alarm['subject']);

$dest = "../elfinder/files/".$_SESSION['office']."/".$alarm['lawyer_id']."/Archived/Alarm_".$alarm['ID']."_".$alarm['subject']."/";

$files = scandir($src);
// movin files
foreach ($files as $file){
    if (in_array($file, array(".",".."))) continue;
    rename($src.$file, $dest.$file);
    // $delete[] = $src.$file;
}
rmdir($src);
$con=  connectDB($_SESSION['office']);
mysqli_query($con, "SET NAMES 'utf8'");
mysqli_query($con, 'SET CHARACTER SET utf8');

$query="INSERT INTO `archive_alarm`(`ID`, `customer_id`, `customer_desc`, `startdate`, `casetype_id`, `lawyer_id`, `consultant_id`, "
        . "`opponent_id`, `opponent_desc`, `price`, `subject`, `description`, `status`) select * from alarm where id=".$id;

if (mysqli_query($con, $query)) {
        $conn=  connectDB($_SESSION['office']);
        $queryy='update archive_alarm set date=CURDATE() where ID='.$id;
        mysqli_query($conn, $queryy);
         mysqli_close($conn);
        $con1=  connectDB($_SESSION['office']);
        $query1='delete from alarm where ID='.$id;
        mysqli_query($con1, $query1);
         mysqli_close($con1);
        echo "ok";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);

?>
