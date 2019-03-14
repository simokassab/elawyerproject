<?php
session_start();
$id=$_GET['id'];
//print_r($_SESSION['user']);
ob_start();
require_once ('../functions/global.php');
$con=connectDB($_SESSION['office']);
mysqli_query($con,"SET NAMES 'utf8'");
mysqli_query($con,'SET CHARACTER SET utf8');
$query = "update notification set status='READ' where `id`=$id";
$result = mysqli_query($con, $query);



?>