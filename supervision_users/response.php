<?php
session_start();
require "../e-lawyer/config.php";
if(isset($_GET["action"])) {
	if ($_GET["action"] == "details") {
		$query = "select superevents.ID as IDD, date, event, fname, lname from superevents, users where user_ID=users.ID and hidden='NO' order by date DESC";
		$con = connectDB($_SESSION['office']);
		$array = array();
		mysqli_query($con, "SET NAMES 'utf8'");
		mysqli_query($con, 'SET CHARACTER SET utf8');
		$result = mysqli_query($con, $query);
		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while ($row = mysqli_fetch_assoc($result)) {
				$array[] = $row;
			}
		}
		mysqli_close($con);
	}

}

?>