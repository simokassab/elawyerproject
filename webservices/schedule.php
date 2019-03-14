<?php

header('Content-Type: text/html; charset=utf-8');
require_once "./config.php";
$con=connectDB($_SESSION['office']);
mysqli_query($con,"SET NAMES 'utf8'");
mysqli_query($con,'SET CHARACTER SET utf8');
$json = array();
$return_array=array();

$month=$_REQUEST['month'];

$year=$_REQUEST['year'];

 // Query that retrieves events
 $requete = "SELECT appointment.ID, CONCAT(title, CONCAT(' - ', CONCAT(users.fname, CONCAT(' ',users.lname)))) as title, start, 
        end, appointment.ID as url, appointment.description, color FROM appointment, users where appointment.user_id=users.ID 
        AND appointment.start BETWEEN  '$year-$month-01 00:00:00' AND  '$year-$month-31 23:59:59'
        UNION 
        SELECT calendar.id, title, start, end, url, calendar.description, 
        color FROM calendar, consultation, users 
        where calendar.consultation_ID=consultation.ID and users.ID=consultation.appoint   
        AND calendar.start BETWEEN  '$year-$month-01 00:00:00' AND  '$year-$month-31 23:59:59'
        ";


$result=mysqli_query($con,$requete);
$num_row = mysqli_num_rows($result);
 $ar = array();
// if user name and passord doesnot matches... 
    if(!empty($num_row)){
        $return_array['info']='found';
        $return_array['status']='success';
        $return_array['data']=array();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $ar = $row;
            array_push($return_array['data'],$ar);
        }
        
    } else {
       $return_array['info']='not found';
       $return_array['status']='failed';
    }


 echo json_encode($return_array,JSON_UNESCAPED_UNICODE);

?>