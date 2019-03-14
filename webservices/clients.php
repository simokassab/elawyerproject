<?php
include_once 'config.php';
header('Content-Type: text/html; charset=utf-8');

function GetCustomerByCritria() {
    $array = array();
    $con = connectDB('techoffice');
    //echo $query."<br>";
    mysqli_query($con, "SET NAMES 'utf8'");
    //mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "select  customers.ID as customer_id, customers.cfname as firstname, customers.csname as secondname,"
            . " customers.ctname as thirdname, customers.clname as lastname, "
            . "customers.ccompany as company, customers.cemail as email, customers.caddress as address  "
            . " from customers  where customers.ID >0";
    
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $i=0;
        $return_array=array();
        $return_array['info']='found';
            $return_array['status']='success';
            $return_array['data']=array();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
           
            $array['firstname']=$row['firstname'];
            $array['lastname']=$row['lastname'];
            $array['company']=$row['company'];
            $array['email']=$row['email'];
            $array['address']=$row['address'];
            $array['url_case']='http://www.e-lawyer.co/webservices/getcasebycustomerid.php?id='.$row['customer_id'];
          //  $array['data']['url_cases'] = 'dddd';
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

$customers =  GetCustomerByCritria();
//$cus['data']=$customers;
//print_r($customers);
echo  json_encode($customers,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);