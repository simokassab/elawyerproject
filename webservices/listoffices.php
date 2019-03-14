<?php 

include_once '../techoffice/config.php';

$con = connectDBTechoffice();
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $content = "";
    $array = array();
    $return_array=array();
    $query = "SELECT distinct id, name from office order by name ;";
    $result = mysqli_query($con, $query);
    $return_array['info']='found';
    $return_array['status']='success';
    $return_array['data']=array();
    $fix=array();
    $fix=array('name'=>'Select Office');
    array_push($return_array['data'], $fix);
    while ($rows = mysqli_fetch_assoc($result)) {
         $array['name'] = $rows['name'];
         array_push($return_array['data'],$array);
    }
    
    //$return_array['data']['name']='ss';
    mysqli_close($con);
    echo json_encode($return_array,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>


