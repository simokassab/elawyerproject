<?php
include ('../functions/global.php');
session_start();
require_once "../config.php";
if(isset($_GET['act'])){
    if($_GET['act']=="insert"){
        $id="";
        $id= NewConsultation($_GET['firstname'], $_GET['lastname'], $_GET['customer'], $_GET['ctype'], nl2br($_GET['subject']), trim(nl2br($_GET['description'])),
                        0, 0, 'PENDING');

        NewNotification($_GET['id_user'], $_GET['managers'], "index.php?action=consultation/super_request&id=".$id."&from=".$_GET['id_user'], "بيان إستشاري جديد ".GetFnameLnameByUserID($_GET['id_user']), 'NOTREAD' );
        NewSuperEvent("السكرتير أرسل بيان إستشاري لمدير المكتب", $_GET['id_user'] );

    }
    if($_GET['act']=="update"){
        $con=connectDB($_SESSION['office']);
       // echo $_GET['lawyer'];
        //EditConsultation($id, $fname, $lname, $consult_type, $subject, $description, $consultant_id, $lawyer_id, $status)
        $id_update=EditConsultation($_GET['id'], $_GET['firstname'], $_GET['lastname'], $_GET['customer'], $_GET['ctype'],
            nl2br($_GET['subject']), nl2br($_GET['description']), $_GET['appoint'],
            $_GET['lawyer'], $_GET['status']);
        NewNotification($_GET['id_user'], $_GET['to_user'], "index.php?action=calendar/index&id=".$id_update."&response=yes&nextdate=".$_GET['nextdate'], "رسالة من مدير المكتب ".GetFnameLnameByUserID($_GET['id_user']), 'NOTREAD' );
        NewSuperEvent("مدير المكتب أرسل الموافقة للسكرتير ", 1 );
    }
    if($_GET['act']=="cancel"){
        EditConsultationStatus($_GET['id'], "CANCEL");
         NewNotification($_GET['id_user'], $_GET['to_user'],"index.php?action=consultation/request&id=".$_GET['id']."&act=cancel", "لقد تم رفض البيان من قبل مدير المكتب ".GetFnameLnameByUserID($_GET['id_user']), 'NOTREAD' );
        NewSuperEvent("لقد تم رفض البيان الإستشاري", 1 );
    }
    if($_GET['act']=="sendToLawyer"){
        EditConsultationStatus($_GET['id'], "LAWYER");
         NewNotification($_GET['id_user'], $_GET['appoint'], "index.php?action=consultation/request&id=".$_GET['id']."&act=lawyer", "بيان إستشاري من السكرتير ".GetFnameLnameByUserID($_GET['id_user']), 'NOTREAD' );
        NewSuperEvent("السكرتير أرسل البيان الإستشاري للمحامي", 4 );
    }
}
?>