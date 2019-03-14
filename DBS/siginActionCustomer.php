<?php
$query_update="";
$query_insert="";
//include_once '../DB/db.php';
//print_r($_POST);
include_once'../configDB.php';
include_once'../config.php';
$username = $_POST["username"];
$password = $_POST["password"];
$office=  $_POST["office"];
if($office=='null'){
	 header("Location: ../client/index.php?action=signIn&error=الرجاء إختيار المكتب");
}
//echo $_SESSION['office'];
$mysqli=connectDBList($office);

$query = "SELECT * FROM customers WHERE cuser = '".$username."' AND cpassword = '".$password."'";
//echo $query;
mysqli_query($mysqli,"SET NAMES 'utf8'");
mysqli_query($mysqli,'SET CHARACTER SET utf8');
$result = mysqli_query($mysqli, $query);
$num_row = mysqli_num_rows($result);
// if user name and passord doesnot matches... 
if(empty($num_row)){
  // echo "empty";
	 header("Location: ../client/index.php?action=signIn&error=اسم المستخدم أو كلمة المرور خاطئة");
}else{
    session_start();
    if ($row =  mysqli_fetch_assoc($result)){
    	$_SESSION['office']     = $office;
    	//echo $_SESSION['office'] ;
    	//echo $_POST["office"];
        $_SESSION['user']['idd']     = $row['ID'];
        $_SESSION['user']['user'] = $row['cuser'];
        $_SESSION['user']['password'] = $row['cpassword'];
		$_SESSION['user']['fname']= $row['cfname'];
		$_SESSION['user']['sname']  = $row['csname']; 
		$_SESSION['user']['tname']  = $row['ctname']; 
		$_SESSION['user']['lname']  = $row['clname']; 	 
		$_SESSION['user']['ID_number']  = $row['CID_number']; 
		$_SESSION['user']['address']  = $row['caddress']; 
		$_SESSION['user']['street']  = $row['cstreet']; 
		$_SESSION['user']['kasima']  = $row['ckasima']; 
		$_SESSION['user']['house_type']  = $row['chouse_type']; 
		$_SESSION['user']['house_nb']  = $row['chouse_nb']; 
		$_SESSION['user']['floor']  = $row['cfloor']; 
		$_SESSION['user']['eaddress']  = $row['ceaddress']; 
		$_SESSION['user']['phone1']  = $row['cphone1']; 
		$_SESSION['user']['phone2']  = $row['cphone2']; 
		$_SESSION['user']['phone3']  = $row['cphone3']; 
		$_SESSION['user']['phone4']  = $row['cphone4'];
		$_SESSION['user']['phone5']  = $row['cphone5'];
		$_SESSION['user']['phone6']  = $row['cphone6'];
		$_SESSION['user']['email']  = $row['cemail']; 
		$_SESSION['user']['fax']  = $row['cfax'];  
		$_SESSION['user']['birth']  = $row['cbirth']; 
		$_SESSION['user']['company']  = $row['ccompany']; 
		$_SESSION['user']['status']  = $row['status'];
        $_SESSION['user']['vip']  = $row['VIP'];

        
              
                
    }



   header("Location:  ../client/index.php?action=mainpage");
}
?>