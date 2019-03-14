<?php
session_start();
ob_start();
?>
<?php
$loggedUser = $_SESSION['user'];
include '../config.php';
include '../functions/global.php';
$status = 'PENDING' ;
$customerid='';
$opponentid='';
$result='';
$case_id='';
$account='';
$consultant_ID='';
$desc=$_POST['description'];
if(isset($_POST['ffname']) ){
	$customerid=$_POST['ffname'];
	$account=getAccountIdByCustomerId($customerid);
}
else {
	$customerid=NewCustomer($_POST['firstname'],'','',$_POST['lastname'], '',0,'','','','', '',''
            ,'','','','','','','','',NUll,'','1', '');
	$account=NewAccount($_POST['caseStartDate'], $customerid);
	$result.='1';
}
if(isset($_POST['offname']) ){
	$opponentid=$_POST['offname'];
	echo $opponentid;
}
else {
$opponentid=NewOpponent($_POST['ofirstname'],'','',$_POST['olastname'],'',0,'','','','','','');
$result.='2';
}
$case_id=NewCase($customerid, $_POST['customerDesc'],$_POST['caseStartDate'], $_POST['caseTypeID'],$_POST['lawyer_ID'],
        $_POST['consultant_ID'], $opponentid, $_POST['oppoDesc'], $_POST['price'], trim($_POST['subject']), $desc, $status);
NewSuperEvent("المحامي كم بفتح القضية: ".$_POST['subject'], $_POST['lawyer_ID'] );
$contract=NewContract($account, $_POST['paidtype'], $case_id);
$remaining=$_POST['price'] - $_POST['paid'];
NewAccountAction($contract, $_POST['paid'], $remaining, 'اتعاب العقد'   ,$_POST['caseStartDate'], 0,0,0, '');
makeDir("../elfinder/files/".$_SESSION['office'].'/'.$_POST['lawyer_ID']."/".$case_id."_".replace_(trim($_POST['subject']),' ','_'));
header("location: ../index.php?action=addCaseModal&result=".$result.'&caseid='.$case_id);
ob_end_flush();
?>