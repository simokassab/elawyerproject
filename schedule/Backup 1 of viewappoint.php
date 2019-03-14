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



 // Query that retrieves events
 $requete = "SELECT appointment.ID, CONCAT(title, CONCAT(' - ', CONCAT(users.fname, CONCAT(' ',users.lname)))) as title, start, 
        end, appointment.ID as url, appointment.description, color FROM appointment, users where appointment.user_id=users.ID 
        UNION 
        SELECT calendar.id, title, start, end, url, calendar.description, 
        color FROM calendar, consultation, users 
        where calendar.consultation_ID=consultation.ID and users.ID=consultation.appoint 
        UNION
        SELECT calendar.id, title, start, end, url, calendar.description, 
        color FROM calendar, alarm_consultation, users 
        where calendar.consultation_ID=alarm_consultation.ID and users.ID=alarm_consultation.appoint 
        ";
         
//echo $requete;
 // connection to the database
$result=mysqli_query($con,$requete);
while($row = mysqli_fetch_assoc($result)){
 $array[] = $row;
}

 echo json_encode($array);

?>