<?php
session_start(); 
ob_start();
$loggedUser = $_SESSION['user'];
include '../config.php';
include '../functions/global.php';
NewBlog($_POST['user_id'], $_POST['subject'], $_POST['description'], $_POST['date__']);
header("Location: ../index.php?action=mainpage");
ob_end_flush();
?>