<?php

session_start();
//require_once '../config.php';
//require_once '../functions/global.php';    
require_once('../tcpdf/tcpdf.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//session_start(); 
//$loggedUser = $_SESSION['user'];
include '../config.php';
include '../functions/global.php';
$caseid='';
$alarmid='';
if(isset($_POST['cases'])){
 $caseid=$_POST['cases'];   
}
if(isset($_POST['alarm'])){
 $alarmid=$_POST['alarm'];   
}
//$status = 1 ; // must checked later
$customerid=$_POST['customerid'];

if((isset($_POST['ByCase'])) && ($caseid!='') & ($alarmid=='')){
    $cases=  getCaseById($caseid);
    $contract=getContractbyCaseId($caseid);
    $rem=$cases[0]['price'] - (getAllPaid($customerid) + $_POST['paid']);
    $rem_fees=  getAllfees($_POST['customerid'])-(getAllPaidfees($customerid) + $_POST['paidFees']);
    $actionid="";
    //echo $rem."<br/>";
    //echo $_POST['paid']."<br/>";
    //echo $rem_fees."<br/>";
    //echo $contract[0]['ID']."<br/>";
    //echo $customerid."<br/>";
    //NewAccountAction($contract_ID, $paid, $rem, $details, $datee, $fees_cost, $paid_fees, $rem_fees, $comments);
    $actionid=NewAccountAction($contract[0]['ID'], $_POST['paid'],$rem, $_POST['details'],$_POST['actionDate'],
            $_POST['feesCost'], 
            $_POST['paidFees'], $rem_fees, $_POST['comments']);
    header("Location: ../index.php?action=viewCases&id=".$caseid."&tab=acco");
}

//echo $alarmid.'<br/>';
//echo $caseid;

if((!isset($_POST['ByCase'])) && ($caseid=='') & ($alarmid!='')){
    $alarm=  getAlarmById($alarmid);
    $contract=getContractbyCaseId($alarmid);
    $rem=$alarm['price'] - (getAllPaid($customerid) + $_POST['paid']);
    $rem_fees=  getAllfees($_POST['customerid'])-(getAllPaidfees($customerid) + $_POST['paidFees']);
    $actionid="";
    //echo $rem."<br/>";
    //echo $_POST['paid']."<br/>";
    //echo $rem_fees."<br/>";
    //echo $contract[0]['ID']."<br/>";
    //echo $customerid."<br/>";
    //NewAccountAction($contract_ID, $paid, $rem, $details, $datee, $fees_cost, $paid_fees, $rem_fees, $comments);
    $actionid=NewAccountAction($contract[0]['ID'], $_POST['paid'],$rem, $_POST['details'],$_POST['actionDate'],
            $_POST['feesCost'], 
            $_POST['paidFees'], $rem_fees, $_POST['comments']);
     header("Location: ../index.php?action=contract&customer_id=".$_POST['customerid']);
}
if((!isset($_POST['ByCase'])) && ($caseid!='') & ($alarmid=='')){
    $cases=  getCaseById($caseid);
    $contract=getContractbyCaseId($caseid);
    $rem=$cases[0]['price'] - (getAllPaid($customerid) + $_POST['paid']);
    $rem_fees=  getAllfees($_POST['customerid'])-(getAllPaidfees($customerid) + $_POST['paidFees']);
    $actionid="";
    //echo $rem."<br/>";
    //echo $_POST['paid']."<br/>";
    //echo $rem_fees."<br/>";
    //echo $contract[0]['ID']."<br/>";
    //echo $customerid."<br/>";
    //NewAccountAction($contract_ID, $paid, $rem, $details, $datee, $fees_cost, $paid_fees, $rem_fees, $comments);
    $actionid=NewAccountAction($contract[0]['ID'], $_POST['paid'],$rem, $_POST['details'],$_POST['actionDate'],
            $_POST['feesCost'], 
            $_POST['paidFees'], $rem_fees, $_POST['comments']);
    header("Location: ../index.php?action=contract&customer_id=".$_POST['customerid']);
}


ob_flush();
//exit();

?>