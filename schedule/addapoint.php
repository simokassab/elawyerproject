<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<?php
session_start();
// Values received via ajax
require_once "../config.php";
require_once("../functions/global.php");

$con=connectDB($_SESSION['office']);
mysqli_query($con,"SET NAMES 'utf8'");
mysqli_query($con,'SET CHARACTER SET utf8');

$title = $_GET['title'];
$user_id=$_GET['userr'];
$start = $_GET['start'];
$end = $_GET['end'];
$description = $_GET['description'];
$priv=$_GET['priv'];
$query="INSERT INTO appointment  VALUES (NULL,'$user_id', '$start','$end', '$title', '$description', '$priv')";
if (mysqli_query($con, $query)) {
   // NewSuperEvent("لقد تم أخذ موعد للمراجعي", 4 );
    return true;
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}


?>