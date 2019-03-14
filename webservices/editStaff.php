<?php
include 'config.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header('Content-Type: text/html; charset=utf-8');
function EditStaff() {
	$ar=array();

	if(!empty($_REQUEST) && !empty($_REQUEST['id']) && count($_REQUEST) > 1)
	{
		$id = $_REQUEST['id'];
		unset($_REQUEST['id']);

		$con = connectDB($_SESSION['office']);
		mysqli_query($con, "SET NAMES 'utf8'");
		mysqli_query($con, 'SET CHARACTER SET utf8');

		$query = "UPDATE users SET ";

		foreach($_REQUEST as $key=>$value) {
			$query .= $key . " = '" . $value . "', "; 
		}

		$query 	= trim($query, ' ,'); // then trim trailing and prefixing commas
		$query .= " WHERE id = ".$id;

		if (mysqli_query($con, $query)) {
			$ar['info']='Profile updated successfully';
			$ar['status']='success';
		} else {
			$ar['info']='Error'. mysqli_error($con);
			$ar['status']='failed';
		}
		mysqli_close($con);
	}
	else
	{
		$ar['info']='Error => No data passed to be updated';
		$ar['status']='failed';
	}

	return json_encode($ar);
}

echo EditStaff();
