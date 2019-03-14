<?php
session_start();
$query_update="";
$query_insert="";
date_default_timezone_set('Asia/Kuwait');
$date = date('Y-m-d');
//echo $date;
$time=date('H:i:s');
include_once'../configDB.php';
include_once'../config.php';
$username = $_POST["username"];
$password = $_POST["password"];
$office=  $_POST["office"];
if($office=='null'){
	 header("Location: ../index.php?action=signIn&error=الرجاء إختيار المكتب");
}

if(($username=='admin')&& ($password=='admin')){
	$_SESSION['office']= $office;
	header("Location: ../rights/rights.php");
}
else {
	//echo $_SESSION['office'];
	$mysqli=connectDBList($office);

	$query = "SELECT * FROM users WHERE user = '".$username."' AND password = '".$password."'";
	//echo $query;
	mysqli_query($mysqli,"SET NAMES 'utf8'");
	mysqli_query($mysqli,'SET CHARACTER SET utf8');
	$result = mysqli_query($mysqli, $query);
	$num_row = mysqli_num_rows($result);
	// if user name and passord doesnot matches... 
	if(empty($num_row)){
	  // echo "empty";
		 header("Location: ../index.php?action=signIn&error=اسم المستخدم أو كلمة المرور خاطئة");
	}else{
	    if ($row =  mysqli_fetch_assoc($result)){
	    	$_SESSION['office']     = $office;
	    	//echo $_SESSION['office'] ;
	    	//echo $_POST["office"];
	        $_SESSION['user']['idd']     = $row['ID'];
	        $_SESSION['user']['user'] = $row['user'];
	        $_SESSION['user']['password'] = $row['password'];
			$_SESSION['user']['fname']= $row['fname'];
			$_SESSION['user']['sname']  = $row['sname']; 
			$_SESSION['user']['tname']  = $row['tname']; 
			$_SESSION['user']['lname']  = $row['lname']; 
			$_SESSION['user']['gender']  = $row['gender']; 
			$_SESSION['user']['ID_number']  = $row['ID_number']; 
			$_SESSION['user']['ID_member']  = $row['ID_member']; 
			$_SESSION['user']['address']  = $row['address']; 
			$_SESSION['user']['street']  = $row['street']; 
			$_SESSION['user']['kasima']  = $row['kasima']; 
			$_SESSION['user']['house_type']  = $row['house_type']; 
			$_SESSION['user']['house_nb']  = $row['house_nb']; 
			$_SESSION['user']['floor']  = $row['floor']; 
			$_SESSION['user']['eaddress']  = $row['eaddress']; 
			$_SESSION['user']['phone1']  = $row['phone1']; 
			$_SESSION['user']['phone2']  = $row['phone2']; 
			$_SESSION['user']['phone3']  = $row['phone3']; 
			$_SESSION['user']['email']  = $row['email']; 
			$_SESSION['user']['fax']  = $row['fax']; 
			$_SESSION['user']['room']  = $row['room']; 
			$_SESSION['user']['photo']  = $row['photo']; 
			$_SESSION['user']['description']  = $row['description']; 
			$_SESSION['user']['level_ID']  = $row['level_ID']; 
			$_SESSION['user']['lawyer_type_ID']  = $row['lawyer_type_ID']; 
			$_SESSION['user']['status']  = $row['status'];
	                $_SESSION['user']['color']  = $row['color'];

	        $conn=connectDBChat($_SESSION['office']);
	        $query_chat="insert into user_info VALUES (".$row['ID'].", '".$row['fname']." ".$row['lname']. "' )";
	        mysqli_query($conn, "SET NAMES 'utf8'");
	    	mysqli_query($conn, 'SET CHARACTER SET utf8');
	    	mysqli_query($conn, $query_chat);
			$query="Select firstlogin from online_users where user_ID=".$row['ID']." and date=CURDATE() ";
			mysqli_query($mysqli,"SET NAMES 'utf8'");
			mysqli_query($mysqli,'SET CHARACTER SET utf8');
			$result = mysqli_query($mysqli, $query);
			$rows = mysqli_fetch_assoc($result);
			//echo $rows['firstlogin'];
			if($rows['firstlogin']=='00:00:00'){
				$query_update=" update online_users set status=1, break_status='متصل', firstlogin='$time' where date=CURDATE() and user_ID=".$row['ID'];
				mysqli_query($mysqli, $query_update);
				//echo $query_update;
			}
			else {
				$query_update=" update online_users set status=1, break_status='متصل' where date=CURDATE() and user_ID=".$row['ID'];
				mysqli_query($mysqli, $query_update);
				//echo $query_update;
			}
	                $queryy="update user_logs set timee=CURTIME() where user_ID=".$row['ID']." and status='متصل' ";
	                mysqli_query($mysqli, $queryy);

	                
	              
	                
	    }



	  header("Location:  ../index.php?action=mainpage");
	}
}
?>