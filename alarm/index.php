<?php

session_start();
require_once '../PHPWord/PHPWord.php';
include ('../functions/global.php');
include ('../constants.php');
require_once "../config.php";
require_once('../tcpdf/tcpdf.php');
$arr=array();
header('Content-Type: text/html; charset=utf-8');
$id="";
$cust=array();
$user=array();
$consult=array();
$opponent=array();
$id="";
$id="";
$id="";
$id="";
$id="";
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $con=connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    mysqli_close($con);
    $arr=getAlarmById($id);
   // echo $id;
  //  print_r($arr);
    $user= GetUserByID($arr['lawyer_id']);
   // print_r($user);
    echo $arr['consultant_id'];
    $consult= GetUserByID($arr['consultant_id']);
    //echo $consult['fname'];
    $cust=GetCustomerByID($arr['customer_id']);
    $opponent= getOpponentById($arr['opponent_id']);
    NewCustomerNotification($_SESSION['user']['idd'], $arr['customer_id'], "index.php?action=viewAlarm&id=".$id , "لقد تم إضافة الإنذار:  ".$arr['subject'], "NOTREAD", );
    $PHPWord = new PHPWord();
    $document = $PHPWord->loadTemplate('Template.docx');
    $document->setValue('Value1', $cust[0]['cfname']." ".$cust[0]['csname']." ".$cust[0]['ctname']." ".$cust[0]['clname']." ");
    $document->setValue('Value2', $user[0]['fname']." ".$user[0]['lname']);
    $document->setValue('Value3', $consult[0]['fname']." ".$consult[0]['lname']);
    $document->setValue('Value4', $opponent[0]['ofname']." ".$opponent[0]['osname']." ".$opponent[0]['otname']." ".$opponent[0]['olname']);
    $document->setValue('Value5', $arr['startdate']);
    $document->setValue('Value6', $arr['subject']);
    $document->setValue('Value7', $arr['description']);
    $document->setValue('Value8', $arr['price']);
   // echo $user[0]['fname'];

    //echo '../elfinder/files/'.$arr[0]['lawyer_id'].'/'.$id.'_'.$arr[0]['subject'].'/contract.docx';

    $document->save('../elfinder/files/'.$_SESSION['office'].'/'.$arr['lawyer_id'].'/Alarm_'.$id.'_'.replace_(trim($arr['subject']),' ','_').'/contract.docx');

// Add text elements
    //create al tawkil as pdf
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetFont('aealarabiya', '', 25);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('TechOffice');
    $pdf->SetTitle('');
    $pdf->SetSubject('توكيل');

// set default header data
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

// set some language dependent data:
    $lg = Array();
    $lg['a_meta_charset'] = 'UTF-8';
    $lg['a_meta_dir'] = 'rtl';
    $lg['a_meta_language'] = 'fa';
    $lg['w_page'] = 'page';

// set some language-dependent strings (optional)
    $pdf->setLanguageArray($lg);

// ---------------------------------------------------------

// set font


// add a page
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
        $pdf->Output(PATH_URL.'elfinder/files/'.$_SESSION['office'].'/'.$arr["lawyer_id"].'/Alarm_'.$id.'_'.replace_(trim($arr['subject']),' ','_').'/Authorization.pdf', 'F');
    }
    else 
    {
         $pdf->Output($_SERVER['DOCUMENT_ROOT'] .'/elawyer/elfinder/files/'.$_SESSION['office'].'/'.$arr["lawyer_id"].'/Alarm_'.$id.'_'.replace_(trim($arr['subject']),' ','_').'/Authorization.pdf', 'F');
    }
    

}
?>