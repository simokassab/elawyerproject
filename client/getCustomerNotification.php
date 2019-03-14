<?php
session_start();
$idd=$_SESSION['user']['idd'];
//print_r($_SESSION['user']);
ob_start();
require_once ("../config.php");
require_once ('../functions/global.php');
$con=connectDB($_SESSION['office']);
mysqli_query($con,"SET NAMES 'utf8'");
mysqli_query($con,'SET CHARACTER SET utf8');
$query = "SELECT * FROM notifications_customer where `to`=$idd  order by date_ DESC";
//echo $query;
$result = mysqli_query($con, $query);

	$num_row = mysqli_num_rows($result);
	// check if json_encode function do not exist in php4 on the server .. 
	if (!function_exists('json_encode')){
		function json_encode($a=false){
			if (is_null($a)) return 'null';
			if ($a === false) return 'false';
			if ($a === true) return 'true';
			if (is_scalar($a)){
				if (is_float($a)){
					// Always use "." for floats.
					return floatval(str_replace(",", ".", strval($a)));
				}
				if (is_string($a)){
					static $jsonReplaces = array(array("\\", "/", "\n", "\t", "\r", "\b", "\f", '"'), array('\\\\', '\\/', '\\n', '\\t', '\\r', '\\b', '\\f', '\"'));
					return '"' . str_replace($jsonReplaces[0], $jsonReplaces[1], $a) . '"';
				}else
					return $a;
				}
			$isList = true;
			for ($i = 0, reset($a); $i < count($a); $i++, next($a)){
				if (key($a) !== $i){
					$isList = false;
					break;
				}
			}
			$result = array();
			if ($isList){
				foreach ($a as $v) $result[] = json_encode($v);
				return '[' . join(',', $result) . ']';
			}else{
				foreach ($a as $k => $v) $result[] = json_encode($k).':'.json_encode($v);
				return '{' . join(',', $result) . '}';
			}
		}
	}
	//print_r($result);
	if(empty($num_row)){
		echo json_encode ("");
	}else{
		$returnedData = array();
		$last_result = array();
		 while ($row =  mysqli_fetch_assoc($result)){
			$last_result['id']        = $row['id'];
			$last_result['from']   = $row['from'];
			$last_result['to']   = $row['to'];
			$last_result['url']   = $row['url'];
			$last_result['title']  = $row['title'];	
			$last_result['status'] = $row['status'];	
			$last_result['date'] = $row['date_'];
			$returnedData[] = $last_result;
		}
	 mysqli_close($con);
	 $conn=connectDB($_SESSION['office']);
	$query1="select count(ID) as count from notifications_customer where `to`=$idd and status='NOTREAD' ";
	$result1 = mysqli_query($conn, $query1);
	$row1 = mysqli_fetch_assoc($result1);
	$returnedData[]['count']=$row1['count'];
		echo json_encode ($returnedData);
}

exit();
?>

