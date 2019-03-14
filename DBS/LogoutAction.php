
<?php
session_start();
ob_start();
$loggedUser = $_SESSION['user'];

//include_once '../DB/db.php';
include_once'../config.php';
require_once '../configDB.php';
$mysqli=connectDB($_SESSION['office']);

//echo $_SESSION['office'];
mysqli_query($mysqli,"SET NAMES 'utf8'");
mysqli_query($mysqli,'SET CHARACTER SET utf8');
$query_update=" update online_users set status=0, break_status='غير متصل' where date=CURDATE() and user_ID=".$_GET['userid'];
mysqli_query($mysqli, $query_update);
$con=connectDBChat($_SESSION['office']);
$query_chat='delete from frei_session where session_id='.$_GET['userid'];
mysqli_query($con, "SET NAMES 'utf8'");
    	mysqli_query($con, 'SET CHARACTER SET utf8');
    	mysqli_query($con, $query_chat);

unset($_SESSION['user']);
unset($_SESSION['office']);
session_destroy();
ob_end_flush();
?>
