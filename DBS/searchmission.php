<?php

include_once('../config.php');
include_once('../functions/global.php');
$con=  connectDB($_SESSION['office']);
mysqli_query($con, "SET NAMES 'utf8'");
mysqli_query($con, 'SET CHARACTER SET utf8');

$fromm=$_GET['fromm'];
$too=$_GET['too'];
$endDate=$_GET['endDate'];
$startDate=$_GET['startDate'];
$commentss=$_GET['commentss'];
$statusss=$_GET['statusss'];
$priorityy=$_GET['priorityy'];
$mtypee=$_GET['mtypee'];

$query="select * from missions where ID >0 ";
$where="";
if($fromm !='null'){
    if (strpos($fromm, ',') !== false) {
        $where=" and (";
        $from=array();
        $from=explode(",",$fromm);
        foreach ($from as $f){
            $where.="from_user_id=".$f." or ";
        }
        $where=substr($where, 0, -3);
        $where.=" ) ";
    }

    else {
        $where.=" and from_user_id=".$fromm;
    }
}
if($too!='null'){
    if (strpos($too, ',') !== false) {
        $where.=" and (";
        $to=array();
        $to=explode(",",$too);
        foreach ($to as $t){
            $where.="to_user_id=".$t." or ";
        }
        $where=substr($where, 0, -3);
        $where.=" ) ";
    }

    else {
        $where.=" and from_user_id=".$too;
    }
}

if($mtypee!=-1)
    $where.=" and mtype='".$mtypee."'";

if($commentss!="")
    $where.=" and comments like '%".$commentss."%'";

if($startDate!=""){
   $where.=" and startdate='".$startDate."' "; 
}

if($endDate!=""){
   $where.=" and enddate='".$endDate."' ";  
}

if($priorityy!=-1){
   $where.=" and priority='".$priorityy."' "; 
}

if($statusss!=-1){
   $where.=" and status='".$statusss."' "; 
}

$query.=$where;
$tbody='';
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $usfrom=  GetUserByID($row['from_user_id']);
        $usto=  GetUserByID($row['to_user_id']);
        $tbody.="<tr><td>".$usfrom[0]['fname']." ".$usfrom[0]['lname']."</td>";
        $tbody.="<td>".$usto[0]['fname']." ".$usto[0]['lname']."</td>";
        $tbody.="<td>".$row['mtype']."</td>";
        $tbody.="<td>".$row['priority']."</td>";
        $tbody.="<td>".$row['startdate']."</td>";
        $tbody.="<td>".$row['enddate']."</td>";
        $tbody.="<td>".$row['status']."</td>";
        $tbody.="<td>".$row['comments']."</td>";
        $tbody.="<td>".$row['participants']."</td></tr>";
    }
}

echo $tbody;
mysqli_close($con);
        
