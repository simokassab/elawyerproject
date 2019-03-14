<?php 
include_once ("../config.php");
include_once ("../functions/global.php");
ob_start();
session_start();
$notificationID=$_GET['id'];
//$url=$_GET['url'];
$to_id = $_SESSION['user']['idd'];
$result = MarkAsReadCsutomer($notificationID, $to_id);
if($result){
	$con =connectDB($_SESSION['office']);
	$query="select * from notifications_customer where ID=".$notificationID;
	$result = mysqli_query($con, $query);
	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		$row = mysqli_fetch_assoc($result);
		$url = $row['url'];
		mysqli_close($con);
		if($url=='#'){
			header("location: index.php?action=mainpage");
		}
		else {
			header("location: $url");	
		}
		
		//echo $url;

	}
	ob_end_flush();
}else{
	echo "<h2>Something Wrong Happens !!!</h2>";
}
echo $notificationID;
?>
