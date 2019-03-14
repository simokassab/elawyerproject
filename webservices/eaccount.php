<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'config.php';
header('Content-Type: text/html; charset=utf-8');
function GetCustomerByCritrias() {
    $array = array();
    $query = "select * from customers where ID >0 ";
    $con = connectDB($_SESSION['office']);
  //  echo $query;
    $return_array=array();
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
     //   $i=0;
        // output data of each row
            $return_array=array();
            $return_array['info']='found';
            $return_array['status']='success';
            $return_array['data']=array();
        while ($row = mysqli_fetch_assoc($result)) {
            $array['ID'] = $row['ID'];
            $array['cfname'] = $row['cfname'];
            $array['csname'] = $row['csname'];
            $array['ctname'] = $row['ctname'];
            $array['clname'] = $row['clname'];
            $array['ccompany'] = $row['ccompany'];
            $array['caddress'] = $row['caddress'];
            $array['cemail'] = $row['cemail'];
            $array['url'] = 'http://www.e-lawyer.co/webservices/eaccountinfo.php?customer_id='.$row['ID'];
            array_push($return_array['data'],$array);
            
        }
    }
    else {
         $return_array['info']='not found';
         $return_array['status']='failed';
    }
    mysqli_close($con);
    return $return_array;
}

$customers=array();
$customers =  GetCustomerByCritrias();

echo json_encode($customers,JSON_UNESCAPED_UNICODE);