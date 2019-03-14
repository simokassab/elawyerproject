<?php
session_start();

include ('../functions/global.php');
echo "ddd";
require_once "../config.php";
if(isset($_GET['act'])){
    if($_GET['act']=="insert"){
       // $id="";
        $id= NewAlarmConsultation($_GET['firstname'], $_GET['lastname'], $_GET['customer'], $_GET['ctype'], nl2br($_GET['subject']), trim(nl2br($_GET['description'])),0, 0, 'PENDING');

        NewNotification($_GET['id_user'], $_GET['managers'], "index.php?action=consultation_alarm/super_request&id=".$id."&from=".$_GET['id_user'], "طلب إنذار جديد من  ".GetFnameLnameByUserID($_GET['id_user']), 'NOTREAD');
        NewSuperEvent("السكرتير أرسل طلب الإنذار لمدير المكتب", $_GET['id_user'] );

    }
    if($_GET['act']=="update"){
        $con=connectDB($_SESSION['office']);
        echo "ddd";
       // echo $_GET['lawyer'];
        //EditConsultation($id, $fname, $lname, $consult_type, $subject, $description, $consultant_id, $lawyer_id, $status)
        $id_update=EditAlarmConsultation($_GET['id'], $_GET['firstname'], $_GET['lastname'], $_GET['customer'], $_GET['ctype'],
            nl2br($_GET['subject']), nl2br($_GET['description']), $_GET['appoint'],
            $_GET['lawyer'], $_GET['status']);
        NewNotification($_GET['id_user'], $_GET['to_user'], "index.php?action=calendar_alarm/index&id=".$id_update."&response=yes", " طلب الإنذار - رسالة من مدير المكتب ".GetFnameLnameByUserID($_GET['id_user']), 'NOTREAD' );
        NewSuperEvent("مدير المكتب أرسل الموافقة للسكرتير ", 1 );
    }
    if($_GET['act']=="cancel"){
        EditAlarmConsultationStatus($_GET['id'], "CANCEL");
         NewNotification($_GET['id_user'], $_GET['to_user'],"index.php?action=consultation_alarm/request&id=".$_GET['id']."&act=cancel", "لقد تم رفض البيان من قبل مدير المكتب ".GetFnameLnameByUserID($_GET['id_user']), 'NOTREAD' );
        NewSuperEvent("لقد تم رفض طلب الإنذار من ", 1 );
    }
    if($_GET['act']=="sendToLawyer"){
        EditAlarmConsultationStatus($_GET['id'], "LAWYER");
         NewNotification($_GET['id_user'], $_GET['appoint'], "index.php?action=consultation_alarm/request&id=".$_GET['id']."&act=lawyer", "طلب إنذار من السكرتير ".GetFnameLnameByUserID($_GET['id_user']), 'NOTREAD' );
        NewSuperEvent("السكرتير أرسل البيان الإستشاري للمحامي", 4 );
    }
}
?>