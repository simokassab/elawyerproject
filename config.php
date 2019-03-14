<?php
function connectDB ($office){
    if($_SERVER["SERVER_ADDR"]=="::1") {
        $db_conx = mysqli_connect("localhost",  "root", "", "elawyer_".$office);
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

function connectDBChat ($office){
    if($_SERVER["SERVER_ADDR"]=="::1") {
        $db_conx = mysqli_connect("localhost",  "root", "", "freichat_".$office);
        // Evaluate the connection
		//echo "ddddd";
        if (mysqli_connect_errno()) {
            echo mysqli_connect_error();
            exit();
        } else {
            return $db_conx;
        }
    }
    else {
         $db_conx = mysqli_connect("localhost",  "kassabmo", "selfcareapps", "freichat_".$office);
        // Evaluate the connection
        if (mysqli_connect_errno()) {
            echo mysqli_connect_error();
            exit();
        } else {
            return $db_conx;
        }
    }
}

?>