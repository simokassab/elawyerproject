<?php

/**
 *
 */
//$website_url=$_SERVER['HTTP_HOST']."/e-lawyer/";
//$office=;
function connectDB ($office){
    if($_SERVER["SERVER_ADDR"]=="::1") {
        $db_conx = mysqli_connect("localhost",  "root", "root", "elawyer_".$office);
        // Evaluate the connection
        if (mysqli_connect_errno()) {
            echo mysqli_connect_error();
            exit();
        } else {
            return $db_conx;
        }
    }
    else {
         $db_conx = mysqli_connect("localhost",  "kassabmo", "selfcareapps", "elawyer_".$office);
        // Evaluate the connection
        if (mysqli_connect_errno()) {
            echo mysqli_connect_error();
            exit();
        } else {
            return $db_conx;
        }
    }
}

function connectDBChat (){
    $db_conx = mysqli_connect("localhost",  "root", "root", "freichat_".$_SESSION['office']);
    // Evaluate the connection
    if (mysqli_connect_errno()) {
        echo mysqli_connect_error();
        exit();
    } else {
        return $db_conx;
    }
}

?>