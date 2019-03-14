<?php
session_start();
require_once '../config.php';
$con=connectDB($_SESSION['office']);
$searchTerm = $_GET['term'];
mysqli_query($con, "SET NAMES 'utf8'");
mysqli_query($con, 'SET CHARACTER SET utf8');
//echo $query;
$query = "SELECT * FROM users WHERE fname LIKE '%".$searchTerm."%' or sname LIKE '%".$searchTerm."%' or tname LIKE '%".$searchTerm."%' or lname LIKE '%".$searchTerm."%' ORDER BY fname ASC";
//echo $query;
$result = mysqli_query($con, $query);
 while ($rows = mysqli_fetch_assoc($result)) {
    $data[] = $rows['fname'].' '.$rows['sname'].' '.$rows['tname'].' '.$rows['lname'];
}
	if(!empty($data)){
		echo json_encode($data);
	}
	else {
		echo "";
	}

?>