<?php
session_start(); 
ob_start();
header('Content-Type: text/html; charset=utf-8');
$loggedUser = $_SESSION['user'];
include '../config.php';
include '../functions/global.php';
if(isset($_GET['id'])){
    DeleteMission($_GET['id']);
   // header('Refresh: 1; url=index.php?action=mainpage');
}
ob_end_flush();
?>