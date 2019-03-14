
<?php
include_once 'config.php';
header('Content-Type: text/html; charset=utf-8');
$ar=array();
if($_REQUEST['office']=='Select Office'){
    //echo "ok";
  $ar['info']='Please Choose an Office';
  $ar['status']='failed'; 
  echo json_encode($ar, JSON_UNESCAPED_UNICODE  | JSON_UNESCAPED_SLASHES);
  exit(1); 
}
else {
   $con=  connectDB($_REQUEST['office']);
}




$office=$_REQUEST['office'];
$username=$_REQUEST['username'];
$password=$_REQUEST['password'];
$devicetpe=$_REQUEST['devicetype'];
$devicetoken=$_REQUEST['devicetoken'];
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$query = "SELECT * FROM users WHERE user = '".$username."' AND password = '".$password."'";
//echo $query;
mysqli_query($con,"SET NAMES 'utf8'");
mysqli_query($con,'SET CHARACTER SET utf8');
$result = mysqli_query($con, $query);
$num_row = mysqli_num_rows($result);
// if user name and passord doesnot matches... 
if(empty($num_row)){
  // echo "empty";
    $ar['info']='User or password is incorrect';
    $ar['status']='failed';
}
else{ 
    $row =  mysqli_fetch_assoc($result);
     $ar['data'] = $row;
     if($row['photo']==''){
         $ar['data']['photo']='';
     }
     else {
         $ar['data']['photo']='http://e-lawyer.co/server/php/files/'.$row['photo'];
     }
     $query="select ID from mobile_notifications where userID=".$row['ID'];
     $result = mysqli_query($con, $query);
     $num_row = mysqli_num_rows($result);
     if(empty($num_row))
     {
         $query1="insert into mobile_notifications VALUES (NULL, '".$row['ID']."', '$devicetoken', '$devicetpe' )";
          mysqli_query($con, $query1);
     }
     else {
         $query2="UPDATE mobile_notifications SET device_token='$devicetoken', device_type='$devicetpe'  where userID=".$row['ID'];
          mysqli_query($con, $query2);
     }
    
   

    $ar['info']='Successfully logged';
    $ar['status']='success';
}

$content= json_encode($ar, JSON_UNESCAPED_UNICODE);
$content=  str_replace('\\', '', $content);

echo $content;


?>