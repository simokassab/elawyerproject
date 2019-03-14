<?php
session_start();
$loggedUser = $_SESSION['user'];


unset($_SESSION['user']);
unset($_SESSION['office']);
session_destroy();
header("location: ../client/index.php");
?>
