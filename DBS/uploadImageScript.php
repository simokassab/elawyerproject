<?php
session_start();
$target_dir = "uploads/";
require_once '../config.php';
require_once '../functions/global.php';

changeImageByID($_GET['id'], $_GET['image']);
?>