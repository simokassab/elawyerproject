<?php
//require 'pdfcrowd.php';
session_start();
include ('../functions/global.php');
require_once "../config.php";
$res="";
$customer_id="";
$customerid="";
$opponent_id="";
$account="";
$contract="";
$consultant='';
$opponent_id="";
$case_id="";
    if(isset($_GET["sub"])) {
        $customerid = $_GET['customerid'];
        $casedate = $_GET["casedate"];
        $customer = $_GET["customer"];
        $customer2 = $_GET["customer2"];
        $customer3 = $_GET["customer3"];
        $customer4 = $_GET["customer4"];
        $IDNUMBER = $_GET["IDNUMBER"];
        $t1 = $_GET["t1"];
        $t2 = $_GET["t2"];
        $t3 = $_GET["t3"];
        $t4 = $_GET["t4"];
        $t5 = $_GET["t5"];
        $t6 = $_GET["t6"];
        $cust_desc = $_GET["cust_desc"];
        $opponent = $_GET["opponent"];
        $opponent2 = $_GET["opponent2"];
        $opponent3 = $_GET["opponent3"];
        $opponent4 = $_GET["opponent4"];
        $OPIDNUMBER = $_GET["OPIDNUMBER"];
        $opt1 = $_GET["opt1"];
        $opt2 = $_GET["opt2"];
        $opt3 = $_GET["opt3"];
        $opponent_desc = $_GET["opponent_desc"];
        $subject = $_GET["subject"];
        $ctype = $_GET["ctype"];
        $details = $_GET["details"];
        $price = $_GET["price"];
        $paid = "";
        if ($_GET['paid'])
            $paid = $_GET["paid"];
        $remaining = $price - $paid;;
        $paidtype = $_GET["paidtype"];
        $lawyer = $_GET["lawyer"];
        if(!isset($_GET["consultant"])){
             $consultant='';
        }
        else {
             $consultant = $_GET["consultant"];
         }
        $assign = $_GET["assign"];
        $comments = $_GET["comments"];
        $assigned = "";
        $audit=$_GET['auditors'];
       // echo $assign;
     //   echo strlen(trim($assign));
        if(strlen(trim($assign))>1){
        foreach ($assign as $s) {
            $assigned .= $s . ",";
        }
        $assigned = substr($assigned, 0, strlen($assigned) - 1);
        }
        else {
            $assigned=$assign;
        }
        // echo $assigned;
        if ($customerid == 0) {

        $id = NewAlarmForm(0, $casedate,  $customer, $customer2, $customer3, $customer4, $IDNUMBER, $t1, $t2, $t3, $t4, $t5, $t6,
            $cust_desc, 0,  $opponent, $opponent2, $opponent3, $opponent4, $opt1, $opt2, $opt3, $OPIDNUMBER, $opponent_desc, $subject, $ctype,
            nl2br($details), $price, $paid, $remaining, $paidtype, $lawyer, $consultant, $assigned, trim(nl2br($comments)), 'PENDING');
         }
        else {
            $id = NewAlarmForm($customerid, $casedate,  '', '', '', '', 0, '', '', '', '', '', '',
                $cust_desc, 0, $opponent, $opponent2, $opponent3, $opponent4, $opt1, $opt2, $opt3, $OPIDNUMBER, $opponent_desc, $subject, $ctype,
                nl2br($details), $price, $paid, $remaining, $paidtype, $lawyer, $consultant, $assigned, trim(nl2br($comments)), 'PENDING');
        }
        NewNotification($lawyer, $audit, "index.php?action=NEWFile_alarm/request&id=".$id."&from=".$lawyer, "(إنذار) - رسالة من المحامي ".GetFnameLnameByUserID($lawyer), 'NOTREAD' );
        NewSuperEvent("تم إرسال الملف إلى قسم التدقيق (إنذار)", $lawyer );
        header("location: ../index.php");
    }

if(isset($_GET['act']) &&( $_GET['act']=='check')){

    if(CheckIfOpponent($_GET['c'], $_GET['c2'], $_GET['c3'], $_GET['c4'])){
        $res= "1";
        UpdateStatusAlarmForm($_GET['idd'], "REFUSED");
    }
    if(CheckIfCustomer($_GET['op'], $_GET['op2'],$_GET['op3'], $_GET['op4'])){
        $res.="2";
        UpdateStatusAlarmForm($_GET['idd'], "REFUSED");
    }
    if($res==""){
        UpdateStatusAlarmForm($_GET['idd'], "ACCEPTED");
    }
    echo $res;
}
if(isset($_GET['act']) &&( $_GET['act']=='sendToLawyer')){

    NewNotification($_GET['from'],$_GET['lawyer'], 'index.php?action=NEWFile_alarm/request&act=sendToLawyer&id='.$_GET['idd'].'&res='.$_GET['res'],'(إنذار) - رسالة من قسم التدقيق '.GetFnameLnameByUserID($_GET['from']),'NOTREAD');
    NewSuperEvent("قسم التدقيق أرسل الملف إلى المحامي (إنذار)", 5 );
}

if (isset($_GET['act']) &&($_GET['act']=="opencase")){
    $customerid=$_GET['customerid'];
    $casedate=$_GET["casedate"];
    $customer=$_GET["customer"];
    $customer2=$_GET["customer2"];
    $customer3=$_GET["customer3"];
    $customer4=$_GET["customer4"];
    $IDNUMBER=$_GET["IDNUMBER"];
    $t1=$_GET["t1"];
    $t2=$_GET["t2"];
    $t3=$_GET["t3"];
    $t4=$_GET["t4"];
    $t5=$_GET["t5"];
    $t6=$_GET["t6"];
    $cust_desc=$_GET["customer_desc"];
    $opponent=$_GET["opponent"];
    $opponent2=$_GET["opponent2"];
    $opponent3=$_GET["opponent3"];
    $opponent4=$_GET["opponent4"];
    $OPIDNUMBER=$_GET["OPIDNUMBER"];
    $opt1=$_GET["opt1"];
    $opt2=$_GET["opt2"];
    $opt3=$_GET["opt3"];
    $opponent_desc=$_GET["opponent_desc"];
    $subject=$_GET["subject"];
    $ctype=$_GET["ctype"];
    $details=$_GET["details"];
    $price=$_GET["price"];
    $paid="";
    if($_GET['paid'])
        $paid=$_GET["paid"];
    $remaining=$price - $paid;;
    $paidtype=$_GET["paidtype"];
    $lawyer=$_GET["lawyer"];
    $consultant=$_GET["consultant"];
    $assign=$_GET["assign"];
    $comments=$_GET["comments"];
    $assigned="";
   // echo $assign;
    if(strlen(trim($assign))>1){
        foreach($assign as $s){
            $assigned.=$s.",";
        }
        $assigned=substr($assigned,0,strlen($assigned)-1);
    }
    else {
        $assigned=$assign;
    }
    if($customerid==0){
        $customer_id=NewCustomer($customer,$customer2,$customer3,$customer4, '','','','','','', '',$IDNUMBER
            ,$t1,$t2,$t3,$t4,$t5,$t6,'','',NUll,'','ACTIVE', '');
        $account=NewAccount($casedate, $customer_id);
    }
    else {
        $customer_id=$customerid;
        $account=getAccountIdByCustomerId($customerid);
    }
    $s=array();
    $s=getOpponentByName($opponent, $opponent2, $opponent3, $opponent4);
    if(empty($s)){
    $opponent_id=NewOpponent($opponent,$opponent2,$opponent3,$opponent4,'',$OPIDNUMBER,
        $opt1,$opt2,$opt3,'','','');
    }
    else {
        $opponent_id=$s[0]['ID'];
    }
    $case_id=NewAlarm($customer_id, $cust_desc, $casedate,$ctype,$lawyer,$consultant,$opponent_id, $opponent_desc,
        $price,$subject,$details ,'PENDING');
    NewSuperEvent("المحامي كم بفتح إنذار جديد: ".$subject, $lawyer );

    $contract=NewContract($account, $paidtype, $case_id);
    NewAccountAction($contract, $paid, $remaining, 'اتعاب العقد'   ,$casedate, 0,0,0, '');
    makeDir("../elfinder/files/".$_SESSION['office'].'/'.$lawyer."/Alarm_".$case_id."_".$subject);
    if($customerid==0)
        echo $case_id;
    else {
        echo $case_id.'&exist=existing';
    }
}

if (isset($_GET['updatee'])){
    $idd=$_GET["idd"];
    $customer=$_GET["cfname"];
    $customer2=$_GET["csname"];
    $customer3=$_GET["ctname"];
    $customer4=$_GET["clname"];
    $t1=$_GET["t1"];
    $t2=$_GET["t2"];
    $t3=$_GET["t3"];
    $t4=$_GET["t4"];
    $t5=$_GET["t5"];
    $t6=$_GET["t6"];
    $caddress=$_GET["caddress"];
    $cstreet=$_GET["cstreet"];
    $ckasima=$_GET["ckasima"];
    $chousetype=$_GET["chousetype"];
    $chousenb=$_GET["chousenb"];
    $cfloor=$_GET["cfloor"];
    $ceaddress=$_GET["ceaddress"];
    $CID_number=$_GET["CID_number"];
    $cemail=$_GET["cemail"];
    $cfax=$_GET["cfax"];
    $cbirth=$_GET["cbirth"];
    $ccompany=$_GET["ccompany"];
    EditCustomer($idd, $customer, $customer2, $customer3, $customer4, $caddress, $cstreet, $ckasima, $chousetype, $chousenb,
        $cfloor, $ceaddress, $CID_number, $t1, $t2, $t3, $t4, $t5, $t6, $cemail, $cfax, $cbirth, $ccompany) ;

    header("location: ../index.php?action=alarm&id_alarm=".$_GET['id_case']);
}



?>