<?php 
session_start();
ob_flush();
date_default_timezone_set('Asia/Kuwait');
$loggedUser = $_SESSION['user'];
include ('../constants.php');
include '../config.php';
include '../functions/global.php';
require_once('../tcpdf/tcpdf.php');
$date=date('Y-m-d H:i:s');
if(isset($_POST['ByCase'])){
	NewexecutionByCase($_POST['caseID'], $_POST['executionn'], $_POST['commentsexec'], $date, $_POST['nextdatee'] );
	header("Location: ../index.php?action=viewCases&id=".$_POST['caseID']."&tab=exec");
}
$status = 'PENDING' ;
$customerid='';
$execid='';
$cust=array();

if(isset($_POST['submit'])){
	if(isset($_POST['ffname']) ){
	$customerid=$_POST['ffname'];
	//$account=getAccountIdByCustomerId($customerid);
	}
	else {
		$customerid=NewCustomer($_POST['firstname'],'','',$_POST['lastname'], '',0,'','','','', '',''
	            ,'','','','','','',$_POST['emaill'],'',NUll,'','1', '');
	}
	$cust=getCustomerByID('$customerid');
	$execid=Newexecution($_POST['optradio1'], $customerid, $_POST['nameexec'], 'OPEN', $date);
	makeDir('../elfinder/files/'.$_SESSION['office'].'/execution/'.$execid.'_'.replace_(trim($_POST['nameexec']),' ','_'));
	$pdf->SetHeaderData('../images/logo.png', '70px', '', '', array(0,64,255), array(0,64,128));

// set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);


// set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    $lg = Array();
    $lg['a_meta_charset'] = 'UTF-8';
    $lg['a_meta_dir'] = 'rtl';
    $lg['a_meta_language'] = 'fa';
    $lg['w_page'] = 'page';
    $pdf->setLanguageArray($lg);

    $pdf->AddPage();
    $s="<u>&nbsp;&nbsp; ".$cust[0]['cfname']." ".$cust[0]['csname']." ".$cust[0]['ctname']." ".$cust[0]['clname']."</u> ";
    $htmlcontent = '<br/> <br/>       السيد مدير إدارة التوثيقات: <b>'.' </b>    _________________________  المحترم   <br/>';
    $htmlcontent.= '<br/>تحية طيبة وبعد ... ';
    $htmlcontent.= '<br/><br/> نفيدكم علماً بأنه لا منع لدينا من قيام السيد   '.$s;
    $htmlcontent.= '<br/> بطاقة مدنية رقم: '."<u>".$cust[0]['CID_number']."</u>&nbsp;&nbsp;&nbsp;&nbsp;";
    $htmlcontent.= 'بإصدار توكيل بإسم: ';
    $htmlcontent.= "<ul>";
    $htmlcontent.= "<li> المحامي "." /&nbsp;&nbsp; <u>".$user[0]['fname']." ".$user[0]['lname']."</u></li></ul>";
    $htmlcontent.= "<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ويضاف للوكيل حق الصرف والقبض والتنازل والإبراء.";
    $htmlcontent.= "<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;وتفضلوا بقبول فائق الإحترام...";


    $pdf->WriteHTML($htmlcontent, true, 0, true, 0);

// set LTR direction for english translation
    $pdf->setRTL(false);
    ob_clean();
// ---------------------------------------------------------
//Close and output PDF document
    if($_SERVER['SERVER_NAME']=='localhost')
    {
        //echo $_SERVER['DOCUMENT_ROOT'] .'DEVE/elfinder/files/'.$arr[0]["lawyer_id"].'/'.$id.'_'.$arr[0]["subject"].'/tawkil.pdf';
        $pdf->Output(PATH_URL.'elfinder/files/'.$_SESSION['office'].'/'.$arr[0]["lawyer_id"].'/'.$id.'_'.replace_($arr[0]['subject'], ' ', '_').'/Authorization.pdf', 'F');
    }
    else 
    {
         $pdf->Output($_SERVER['DOCUMENT_ROOT'] .'/elawyer/elfinder/files/'.$_SESSION['office'].'/execution/'.$execid.'_'.replace_(trim($_POST['nameexec']),' ','_').'/Authorization.pdf', 'F');
    }
}
?>