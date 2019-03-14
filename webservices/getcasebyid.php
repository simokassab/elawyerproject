<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'config.php';
header('Content-Type: text/html; charset=utf-8');

function getCaseById($case_id) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "SELECT * FROM cases where ID=$case_id ";
    $result = mysqli_query($con, $query);
    $num_row = mysqli_num_rows($result);
// if user name and passord doesnot matches... 
    if(!empty($num_row)){
        $ar = array();
        $ar['info']='Case found';
        $ar['status']='success';
        //$ar['missions']='';
        while ($rows = mysqli_fetch_assoc($result)) {
            $ar['information'] = $rows;
        }
        
    } else {
       $ar['info']='No case found';
       $ar['status']='failed';
    }
    mysqli_close($con);
    
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "SELECT m.ID,m.startdate,m.enddate, c.subject,m.mtype, m.comments, m.from_user_id , "
            . "m.to_user_id, m.priority, m.status "
            . "FROM missions as m inner join cases as c on m.case_id = c.ID where m.case_id='$case_id' "
            . " order BY m.enddate";
   // echo $query;
    $result = mysqli_query($con, $query);
    if ($result) {
       // $last_result = array();
        while ($rows = mysqli_fetch_assoc($result)) {
           $ar['missions'] = $rows;
        }
    } else {
        
    }
    mysqli_close($con);
    
    
    return $ar;
}

$cus=array();

$customers = getCaseById($_REQUEST['id']);

echo  json_encode($customers,JSON_UNESCAPED_UNICODE);

?>
