<?php

/**
 *
 */
//$website_url=$_SERVER['HTTP_HOST']."/e-lawyer/";

function connectDBTechoffice (){
    if($_SERVER["SERVER_ADDR"]=="::1") {
    $db_conx = mysqli_connect("localhost",  "root", "", "techoffice");
    // Evaluate the connection
    if (mysqli_connect_errno()) {
        echo mysqli_connect_error();
        exit();
    } else {
        return $db_conx;
    }
    }
    else {
       $db_conx = mysqli_connect("localhost",  "kassabmo", "selfcareapps", "techoffice");
        // Evaluate the connection
        if (mysqli_connect_errno()) {
            echo mysqli_connect_error();
            exit();
        } else {
            return $db_conx;
        } 
    }
}

function listOffices(){
$con = connectDBTechoffice();
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $content = "";
    $query = "SELECT distinct id, name from office order by name ;";
    $result = mysqli_query($con, $query);
    while ($rows = mysqli_fetch_assoc($result)) {
         $content .= "\n<option value='" . $rows['name'] . "'>" . $rows['name'] . "</option>";
   

    }
     return $content;
}




//echo ;

?>