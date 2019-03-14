<?php

include_once 'config.php';
header('Content-Type: text/html; charset=utf-8');

function getAllNotifications() {
    $con = connectDB($_SESSION['office']);
    $user_id=$_REQUEST['id'];

    $query = "SELECT * FROM notification where `to` = '$user_id'";
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $array = array();
        $return_array=array();
        $return_array['info']='found';
        $return_array['status']='success';
        $return_array['data'] = mysqli_fetch_assoc($result);
    }
    else {
        $return_array['info']='Not Found';
        $return_array['status']='failed';
    }
    mysqli_close($con);
    return $return_array;
}

$cus=array();

$notifications =  getAllNotifications();

echo  json_encode($notifications,JSON_UNESCAPED_UNICODE  | JSON_UNESCAPED_SLASHES);

?>