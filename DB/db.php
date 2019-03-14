<?php
session_start();
$db=mysqli_connect("localhost","root","");
if($db=== FALSE) die ('Fail message');
if(mysqli_select_db($db, $_SESSION['office'])===FALSE)
    die ("Fail message". mysqli_error());


?>
