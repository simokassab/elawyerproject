<?php


include_once 'config.php';
header('Content-Type: text/html; charset=utf-8');

function GetUsers() {
    $array = array();
    $return_array=array();

    if(!empty($_REQUEST['id'])) 
    {
        $query = "select * from users where ID = ".$_REQUEST['id'];
    }
    else
    {
        $query = "select * from users where ID > 0 ";
    }
    
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if(!empty($result)){
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            $return_array['info']='found';
            $return_array['status']='success';
            $return_array['data']=array();
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $array['ID'] = $row['ID'];
                $array['fname'] = $row['fname'];
                $array['sname'] = $row['sname'];
                $array['tname'] = $row['tname'];
                $array['lname'] = $row['lname'];
                $array['ID_member'] = $row['ID_member'];
                $array['room'] = $row['room'];
                $array['address'] = $row['address'];
                $array['url'] = 'http://www.e-lawyer.co/webservices/estaff_part.php?id='.$row['ID'];
                array_push($return_array['data'],$array);
            }
        }
        else {
             $return_array['info']='not found';
            $return_array['status']='failed';
        }
    }
    mysqli_close($con);
    return $return_array;
}
$users=array();
$users =  GetUsers();

echo json_encode($users,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>