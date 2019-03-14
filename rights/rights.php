<?php
session_start();
ob_start();
header('Content-Type: text/html; charset=utf-8');
require_once '../config.php';
require_once '../functions/global.php';
$con = connectDB($_SESSION['office']);
$users= GetAllUsers();

foreach ($users as $us){

	$query="INSERT INTO `rules` (`ID`, `userID`, `cust`, `staf`, `even`, `arch`, `acco`, `supe`, `cons`, `news`) VALUES (NULL, '".$us['ID']."', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N');";

//mysqli_query($con, $query);
}

mysqli_close($con);

$rights=array();

$rights=getAllRights();

?>
<title>e-Lawyers Admin</title>

        <meta name="description" content="E-lawyer">
        <link href="../CSS/bootstrap.min.css" rel="stylesheet" <link href="CSS/app.css" rel="stylesheet">
         <link href="../CSS/bootstrap-toggle.min.css" rel="stylesheet">
        <link href="../CSS/font-awesome.min.css" rel="stylesheet">
        <link href="../CSS/style.css" rel="stylesheet">
        <link href="../CSS/jquery.fileupload.css" rel="stylesheet">
        <!-- Latest compiled and minified CSS -->
        <link rel="shortcut icon"  href="./images/logo.ico"/>
        <link href='../CSS/fullcalendar.css' rel='stylesheet' />
        <link href='../CSS/fullcalendar.print.css' rel='stylesheet' media='print' />
        <!-- Optional theme -->
        <link rel="stylesheet" href="../CSS/jquery.datetimepicker.css">
        <link rel="stylesheet" href="../CSS/notifIt.css">
        <link rel="stylesheet" href="../CSS/jquery-ui.css">
        <link rel="stylesheet" href="../CSS/select2.min.css">
        <link rel="stylesheet" href="../JS/lang/css/jquery.localizationTool.css">
        <script src="../JS/jquery.js"></script>
        <script src="../JS/jquery-ui-1.10.4.js"></script>
 <div class="">
 <form name='form' method='post' action='action.php' >
    <table class="table-striped table-bordered table-hover" style='width:100%;'>
        <thead>
        <tr style='background-color:#1D76AA; color:white;'>
            <td style='text-align:center; '> Name \ Rights </td>
            <td style='text-align:center;'>Cust </td>
            <td style='text-align:center;'> E-Staff </td>
            <td style='text-align:center;'>Events </td>
            <td style='text-align:center;'>Arch. </td>
            <td style='text-align:center;'>Acc</td>
            <td style='text-align:center;'>Super.</td>
            <td style='text-align:center;'>New Cons.</td>
            <td style='text-align:center;' >News</td>
        </tr>
        </thead>
        <tbody>
        <?php 
        	foreach($rights as $r){
           		echo "<tr>
        				<td style='padding: 10px; color:#FC960F;text-align:center; '>". GetFnameLnameByUserID($r['userID'])."</td>";
        		getChecked($r['cust'], $r['userID'], 'cust');
        		getChecked($r['staf'], $r['userID'], 'staf');
        		getChecked($r['even'], $r['userID'], 'even');
        		getChecked($r['arch'], $r['userID'], 'arch');
        		getChecked($r['acct'], $r['userID'], 'acct');
        		getChecked($r['supe'], $r['userID'], 'supe');
        		getChecked($r['cons'], $r['userID'], 'cons');
        		getChecked($r['news'], $r['userID'], 'news');
        	}
        ?>
        </tbody>
	</table>

	<br/><br/><input type="submit" value="Save" class="form-control btn-success" id="save" name="save">
</div>

</form>
<?php
ob_end_flush();
 ?>
