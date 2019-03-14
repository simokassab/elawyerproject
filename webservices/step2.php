<?php
include_once 'config.php';
$ID=$_REQUEST['ID'];
$capacity=$_REQUEST['capacity'];
$package=$_REQUEST['package_name'];
$con = connectDB($_SESSION['office']);
$ar=array();
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "UPDATE newcustomer SET servercapacity='$capacity', package_name='$package' where ID='$ID'";

    if (mysqli_query($con, $query)) {
        
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
    $query1="select * from newcustomer where ID='$ID' ";
     $result = mysqli_query($con, $query1);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $ar['data'] = $row;
        }
    }
    $ar['info']='Second step is successfully done';
    $ar['status']='success';
    echo json_encode($ar);
    mysqli_close($con);





?>

