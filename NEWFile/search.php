<?php
session_start();
include ('../functions/global.php');
require_once "../config.php";
$res="";
$array=array();
if (isset($_GET['search'])) {
    $con=connectDB($_SESSION['office']);
    $res=$_GET['search'];
    $query="select fname, lname from users where fname like '%$res'";
    $result = mysqli_query($con, $query);
    if ($result) {
        $last_result = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $array[] = $rows;
        }
    } else {
        $array = false;
    }
    mysqli_close($con);
    echo json_encode($array);
}
?>