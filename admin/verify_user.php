<?php
/*
connecting to mysql database
hostname : localhost
username : root
password : 123456
*/
include_once "../config.php";
$con=  connectDB();

$uname=$_POST['u_name'];
$pass=$_POST['pass'];

$qry=mysqli_query($con, "SELECT * FROM login_admin WHERE user='$uname'");

if(!$qry)
{
die("Query Failed: ". mysql_error());
}
else
{
$row=  mysqli_fetch_assoc($qry);

if($_POST['u_name']==$row["user"]&&$_POST['pass']==$row["password"])
{
session_start();
$_SESSION['name']=$_POST['u_name'];
$uname=$_POST['u_name'];
header("Location:admin_panel.php");
}
else
{
header("Location:index.php?id=username or password you entered is incorrect");
}
}

?>