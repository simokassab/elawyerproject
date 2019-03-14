<?php

if($_SERVER["SERVER_ADDR"]=="::1") {
$servername = "46.252.205.150";
$username = "root";
$password = "root";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

}

else {
	$servername = "46.252.205.150";
	$username = "kassabmo";
	$password = "selfcareapps";

	$conn = new mysqli($servername, $username, $password);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
}