
<?php 
session_start();
ob_start();
require_once '../config.php';
require_once '../functions/global.php';
$con = connectDB($_SESSION['office']);
$users= GetAllUsers();
foreach ($users as $us){
$query="INSERT INTO `rules` (`ID`, `userID`, `cust`, `staf`, `even`, `arch`, `acco`, `supe`, `cons`, `news`) VALUES (NULL, '".$us['ID']."', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N');";
mysqli_query($con, $query);
}
mysqli_close($con);
ob_flush();
?>
