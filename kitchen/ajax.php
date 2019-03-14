<?php
require ('../config.php');


	
if(isset($_GET['ID'])){
	$con=connectDB();
	mysqli_query($con,"SET NAMES 'utf8'");
mysqli_query($con,'SET CHARACTER SET utf8');
	$query="UPDATE kitchen SET statuss='CLOSED' where ID=".$_GET['ID'];
	if (mysqli_query($con, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

else {
	$query="select kitchen.ID, orderr, datetimee, statuss, comments, fname, lname, room from kitchen, users where user_ID=users.ID and statuss = 'OPEN' order by datetimee DESC";
	 $con=connectDB();
	 mysqli_query($con,"SET NAMES 'utf8'");
mysqli_query($con,'SET CHARACTER SET utf8');
	 $array = array();
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
?>