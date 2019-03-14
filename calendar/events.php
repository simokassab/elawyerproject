<?php
session_start();
// List of events
require_once("../functions/global.php");
require_once "../config.php";
$con=connectDB($_SESSION['office']);

//echo "dsadsad";
mysqli_query($con,"SET NAMES 'utf8'");
mysqli_query($con,'SET CHARACTER SET utf8');
 $json = array();
$array=array();

$cons=$_GET['id'];

 // Query that retrieves events
 $requete = "SELECT calendar.id, title, start, end,  url, .calendar.description, color FROM calendar, alarm_consultation, users
            where calendar.consultation_ID=alarm_consultation.ID and
            users.ID=alarm_consultation.appoint and
            alarm_consultation.appoint='$cons'
            UNION 
            SELECT calendar.id, title, start, end,  url, .calendar.description, color FROM calendar, consultation, users
            where calendar.consultation_ID=consultation.ID and
            users.ID=consultation.appoint and
            consultation.appoint='$cons'";
//echo $requete;
 // connection to the database
$result=mysqli_query($con,$requete);
while($row = mysqli_fetch_assoc($result)){
 $array[] = $row;
}

 echo json_encode($array);

?>