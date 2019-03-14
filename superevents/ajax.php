<?php
session_start();
require ('../config.php');

if(isset($_GET['ID'])){
	$con=connectDB($_SESSION['office']);
	mysqli_query($con,"SET NAMES 'utf8'");
	mysqli_query($con,'SET CHARACTER SET utf8');
	$query="UPDATE superevents SET hidden='YES' where ID=".$_GET['ID'];
	if (mysqli_query($con, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

else {

	if($_GET["action"]=="details"){
		$query="select superevents.ID as IDD, date, event, fname, lname from superevents, users where user_ID=users.ID and hidden='NO' order by date DESC";
		 $con=connectDB($_SESSION['office']);
		 $array = array();
		mysqli_query($con,"SET NAMES 'utf8'");
		mysqli_query($con,'SET CHARACTER SET utf8');
		$result = mysqli_query($con, $query);
		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)){
				$array[] = $row;
			}
		}
		mysqli_close($con);
		echo json_encode($array);
	}
	if($_GET["action"]=="users"){
		$query="select CONCAT(CONCAT(users.fname, ' '),users.lname) as name_, online_users.date,
 online_users.firstlogin, online_users.status, online_users.break_status
				from users, online_users where users.ID=online_users.user_ID and date=CURDATE()";
		$con=connectDB($_SESSION['office']);
		$array = array();
		mysqli_query($con,"SET NAMES 'utf8'");
		mysqli_query($con,'SET CHARACTER SET utf8');
		$result = mysqli_query($con, $query);
		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)){
				$array[] = $row;
			}
		}
		mysqli_close($con);
		echo json_encode($array);
	}
}
	?>