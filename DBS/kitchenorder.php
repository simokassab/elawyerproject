<?php
/**
 * Created by PhpStorm.
 * User: MAK
 * Date: 3/9/2016
 * Time: 1:11 PM
 */
session_start();

include ('../functions/global.php');
require_once "../config.php";
$con=connectDB($_SESSION['office']);
mysqli_query($con,"SET NAMES 'utf8'");
mysqli_query($con,'SET CHARACTER SET utf8');
$comments="";
$user="";
$order="";
$coffee_without_sugar=$_GET["coffee_without_sugar"];
$coffee_with_halfsugar=$_GET["coffee_with_halfsugar"];
$coffee_with_sugar=$_GET["coffee_with_sugar"];

$tea_without_sugar=$_GET["tea_without_sugar"];
$tea_with_halfsugar=$_GET["tea_with_halfsugar"];
$tea_with_sugar=$_GET["tea_with_sugar"];
$water=$_GET["water"];
$comments=$_GET["comments"];
$user=$_GET["user"];

if($coffee_without_sugar!='0'){
    $order.=" قهوة بدون سكر ".$coffee_without_sugar.",";
}
if($coffee_with_halfsugar!='0'){
    $order.=" قهوة مع نص سكر ".$coffee_with_halfsugar.",";
}
if($coffee_with_sugar!='0'){
    $order.=" قهوة مع سكر ".$coffee_with_sugar.",";
}

if($tea_without_sugar!='0'){
    $order.=" شاي بدون سكر ".$tea_without_sugar.",";
}
if($tea_with_halfsugar!='0'){
    $order.=" شاي مع نص سكر ".$tea_with_halfsugar.",";
}
if($tea_with_sugar!='0'){
    $order.=" شاي مع سكر ".$tea_with_sugar.",";
}

if($water!='0'){
    $order.=" ماء ".$water.",";
}

$order=substr($order,0,-1);

//echo $order;
$query="insert into kitchen VALUES (NULL, $user, '$order', NOW(), 'OPEN', '$comments')";
mysqli_query($con, $query);
$userr=array();
$userr=GetUserByID($user);
NewSuperEvent($userr[0]['fname']." ".$userr[0]['lname']." قام  بطلب من المطبخ: "."<br/>". $order, $user );
?>