<?php

include_once 'config.php';
header('Content-Type: text/html; charset=utf-8');

function getAllCases() {
    $con = connectDB($_SESSION['office']);
    $query = "SELECT archive_cases.ID as ID, subject, startdate, price, customers.cfname as fistname, customers.clname as lastname FROM archive_cases, customers"
            . " where archive_cases.customer_id=customers.id ";
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        $array = array();
        $return_array=array();
        $return_array['info']='found';
            $return_array['status']='success';
            $return_array['data']=array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $array['subject'] = $rows['subject'];
            $array['ID'] = $rows['ID'];
            $array['startdate'] = $rows['startdate'];
            $array['fistname'] = $rows['fistname'];
            $array['lastname'] = $rows['lastname'];
            $array['price'] = $rows['price'];
            
            $array['url']='http://www.e-lawyer.co/webservices/getcasebyid.php?id='.$rows['ID'];
            array_push($return_array['data'],$array);
        }
    }
    else {
        $return_array['info']='Not Found';
        $return_array['status']='failed';
    }
    mysqli_close($con);
    return $return_array;
}

$cus=array();

$customers =  getAllCases();

echo  json_encode($customers,JSON_UNESCAPED_UNICODE  | JSON_UNESCAPED_SLASHES);

?>