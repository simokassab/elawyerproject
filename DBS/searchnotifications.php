<?php
session_start();
include_once('../config.php');
include_once('../functions/global.php');
$con=  connectDB($_SESSION['office']);
mysqli_query($con, "SET NAMES 'utf8'");
mysqli_query($con, 'SET CHARACTER SET utf8');

$fromm=$_GET['fromm'];
$startDate=$_GET['startDate'];
$statusss=$_GET['status'];
$subject=$_GET['subject'];
$idd=$_GET['idd'];

$query="select * from notification where `to`=$idd ";
$where="";
if($fromm !='null'){
    if (strpos($fromm, ',') !== false) {
        $where=" and (";
        $from=array();
        $from=explode(",",$fromm);
        foreach ($from as $f){
            $where.="`from`=".$f." or ";
        }
        $where=substr($where, 0, -3);
        $where.=" ) ";
    }

    else {
        $where.=" and `from`=".$fromm;
    }
}


if($subject!="")
    $where.=" and title like '%".$subject."%'";

if($startDate!=""){
   $where.=" and date_='".$startDate."' "; 
}

if($statusss!=-1){
   $where.=" and status='".$statusss."' "; 
}

$query.=$where;
$tbody='';
//echo $query;
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $usfrom=  GetUserByID($row['from']);
        $usto=  GetUserByID($row['to']);
        $tbody.="<tr><td>".$usfrom[0]['fname']." ".$usfrom[0]['lname']."</td>";
        $tbody.="<td>".$usto[0]['fname']." ".$usto[0]['lname']."</td>";
        $tbody.="<td><a href='".$row['url']."' >".$row['title']." </a></td>";
        $tbody.="<td>".$row['title']."</td>";
        $tbody.="<td>".$row['date_']."</td></tr>";
    }
}

else {
    echo "";
}

echo $tbody;
mysqli_close($con);
        