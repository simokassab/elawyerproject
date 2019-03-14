<?php
session_start();
require_once '../config.php';
$con=connectDB($_SESSION['office']);
$searchTerm = $_GET['term'];
mysqli_query($con, "SET NAMES 'utf8'");
mysqli_query($con, 'SET CHARACTER SET utf8');
//echo $query;
$query = "SELECT * FROM customers WHERE cfname LIKE '%".$searchTerm."%' or csname LIKE '%".$searchTerm."%' or ctname LIKE '%".$searchTerm."%' or clname LIKE '%".$searchTerm."%' ORDER BY cfname ASC";
//echo $query;
$result = mysqli_query($con, $query);
 while ($rows = mysqli_fetch_assoc($result)) {
    $data[] = $rows['cfname'].' '.$rows['csname'].' '.$rows['ctname'].' '.$rows['clname'];
}
	if(!empty($data)){
		echo json_encode($data);
	}
	else {
		echo "";
	}

?>