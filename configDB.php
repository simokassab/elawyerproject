<?php

function  connectDBList($office){

//if($_SERVER["SERVER_ADDR"]=="::1") {
$mysqli = new mysqli("localhost", "root", "", "elawyer_".$office , 3306);
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        exit();
    }
    else {
        return $mysqli;
    }

//}
//else {
//	$mysqli = new mysqli("localhost", "kassabmo", "selfcareapps", "elawyer_".$office , 3306);
 //   if ($mysqli->connect_errno) {
  //      echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  //      exit();
  //  }
  //  else {
   //     return $mysqli;
    //}
//}
}

?>