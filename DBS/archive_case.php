<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require_once '../config.php';
require_once '../functions/global.php';
$id=$_GET['caseid'];
$case=getCaseById($id);
//print_r($case);
$src = "../elfinder/files/".$_SESSION['office']."/".$case[0]['lawyer_id']."/".$case[0]['ID']."_".$case[0]['subject']."/";
mkdir("../elfinder/files/".$_SESSION['office']."/".$case[0]['lawyer_id']."/Archived/".$case[0]['ID']."_".$case[0]['subject']);

$dest = "../elfinder/files/".$_SESSION['office']."/".$case[0]['lawyer_id']."/Archived/".$case[0]['ID']."_".$case[0]['subject']."/";

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

$query="INSERT INTO `archive_cases`(`ID`, `customer_id`, `customer_desc`, `startdate`, `casetype_id`, `lawyer_id`, `consultant_id`, "
        . "`opponent_id`, `opponent_desc`, `price`, `subject`, `description`, `status`) select * from cases where id=".$id;

if (mysqli_query($con, $query)) {
        $conn=  connectDB($_SESSION['office']);
        $queryy='update archive_cases set date=CURDATE() where ID='.$id;
        mysqli_query($conn, $queryy);
         mysqli_close($conn);
        $con1=  connectDB($_SESSION['office']);
        $query1='delete from cases where ID='.$id;
        mysqli_query($con1, $query1);
         mysqli_close($con1);
        echo "ok";
        NewCustomerNotification($_SESSION['user']['idd'], $case[0]['customer_id'], "index.php?action=viewArchiveCase&id=".$id , "لقد تم ارشفة القضية: ".$case[0]['subject'], "NOTREAD", );
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);

?>
