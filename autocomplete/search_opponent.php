<?php
session_start();
require_once '../config.php';
$con=connectDB($_SESSION['office']);
$searchTerm = $_GET['term'];
mysqli_query($con, "SET NAMES 'utf8'");
mysqli_query($con, 'SET CHARACTER SET utf8');
//echo $query;
$query = "SELECT * FROM opponent WHERE ofname LIKE '%".$searchTerm."%' or osname LIKE '%".$searchTerm."%' or otname LIKE '%".$searchTerm."%' or olname LIKE '%".$searchTerm."%' ORDER BY ofname ASC";
//echo $query;
$result = mysqli_query($con, $query);
 while ($rows = mysqli_fetch_assoc($result)) {
    $data[] = $rows['ofname'].' '.$rows['osname'].' '.$rows['otname'].' '.$rows['olname'];
}
	if(!empty($data)){
		echo json_encode($data);
	}
	else {
		echo "";
	}

?>