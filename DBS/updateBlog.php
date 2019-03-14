<?php
session_start(); 
$loggedUser = $_SESSION['user'];
include '../config.php';
include '../functions/global.php';
EditBlog($_POST['eidd'], $_POST['vedateee'], $_POST['titlee'],$_POST['descriptionn']);
header("Location: ../index.php?action=mainpage");
ob_flush();
exit();
?>