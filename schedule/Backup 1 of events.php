<?php
// List of events
session_start();
require_once("../functions/global.php");
require_once "../config.php";
$con=connectDB();
mysqli_query($con,"SET NAMES 'utf8'");
mysqli_query($con,'SET CHARACTER SET utf8');
$json = array();
$array=array();
$arr=GetUserByID($_GET['id']);

//Check on level ID, if its 4 so secretary and also we will show all users.
//print_r($arr);
//echo $arr[0]['level_ID'];
if($arr[0]['level_ID']==4){
    $requete = "SELECT calendar.id, title, start, end,  url, calendar.description, color FROM calendar, consultation, users
              where calendar.consultation_ID=consultation.ID and
              users.ID=consultation.appoint 
              UNION 
              SELECT calendar.id, title, start, end,  url, calendar.description, color FROM calendar, alarm_consultation, users
              where calendar.consultation_ID=alarm_consultation.ID and
              users.ID=alarm_consultation.appoint 
              ";
    $result=mysqli_query($con,$requete);
    while($row = mysqli_fetch_assoc($result)){
        $array[] = $row;
    }

    echo json_encode($array);
}
else {
   $requete = "SELECT calendar.id, title, start, end, calendar.description, color FROM calendar, alarm_consultation, users
              where calendar.consultation_ID=alarm_consultation.ID and
              users.ID=alarm_consultation.appoint and users.ID=".$_GET['id']." 
              UNION
              SELECT calendar.id, title, start, end, calendar.description, color FROM calendar, consultation, users
              where calendar.consultation_ID=consultation.ID and
              users.ID=consultation.appoint and users.ID=".$_GET['id']." ";

    $result=mysqli_query($con,$requete);
    while($row = mysqli_fetch_assoc($result)){
        $array[] = $row;
    }

    echo json_encode($array);
}

 // Query that retrieves events


?>