<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<?php
session_start();
// Values received via ajax
require_once("../functions/global.php");
require_once "../config.php";
$con=connectDB($_SESSION['office']);
mysqli_query($con,"SET NAMES 'utf8'");
mysqli_query($con,'SET CHARACTER SET utf8');

$title = $_GET['title'];
$start = $_GET['start'];
$end = $_GET['end'];
$url = $_GET['url']."&id=".$_GET['consultation_ID'];
$consultation_id = $_GET['consultation_ID'];
$description = $_GET['description'];
$query="INSERT INTO calendar  VALUES (NULL,'$consultation_id', '$start','$end', '$title', '$url','$description')";
if (mysqli_query($con, $query)) {
   // NewSuperEvent("لقد تم أخذ موعد للمراجعي", 4 );
    return true;
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}


?>