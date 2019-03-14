<?php
	include_once 'config.php';
	header('Content-Type: text/html; charset=utf-8');

	$id=$_REQUEST['id'];
	$con = connectDB($_SESSION['office']);
	$ar=array();
	mysqli_query($con, "SET NAMES 'utf8'");
	mysqli_query($con, 'SET CHARACTER SET utf8');

	$query1 = "SELECT * from notification WHERE id = '$id'";
	$result1 = mysqli_query($con, $query1);
	if (mysqli_num_rows($result1) > 0) {
		$ar['data'] = $rows[0];

		$query = "UPDATE notification SET status = 'READ' WHERE id = '$id'";
		if (mysqli_query($con, $query)) 
		{
			$ar['info']='The nofication has been successfully readed';
			$ar['status']='success';
		} 
		else 
		{
			$ar['info']='Error'.mysqli_error($con);
			$ar['status']='failed';
		}
	}
	else {
		$ar['info']='Not Found';
		$ar['status']='failed';
	}

	echo json_encode($ar);
	mysqli_close($con);
?>