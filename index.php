<?php 
include ('constants.php');
session_start();
//require_once 'configDB.php';
if (isset($_SESSION['office'])) {
            require_once ("config.php");  
            }
require_once ('functions/global.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
       
    </style>

                    <!--===========================FreiChat=======START=========================-->
<!--	For uninstalling ME , first remove/comment all FreiChat related code i.e below code
	 Then remove FreiChat tables frei_session & frei_chat if necessary
         The best/recommended way is using the module for installation                         -->

<?php
$ses = null; // Return null if user is not logged in 
 
if(isset($_SESSION['user']['idd']))
{ 
  if($_SESSION['user']['idd'] != null) // Here null is guest 
  { 
   $ses=$_SESSION['user']['idd']; //LOOK, now userid will be passed to FreiChat 
  } 
} 
//echo $ses;
if(!function_exists("freichatx_get_hash")){
function freichatx_get_hash($ses){

       if(is_file("D:/wamp64/www/elawyerfinal/freichat_sorat/hardcode.php")){

               require "D:/wamp64/www/elawyerfinal/freichat_sorat/hardcode.php";

               $temp_id =  $ses . $uid;

               return md5($temp_id);

       }
       else
       {
               echo "<script>alert('module freichatx says: hardcode.php file not
found!');</script>";
       }

       return 0;
}
}
?>
<script type="text/javascript" language="javascipt" src="http://localhost/elawyerfinal/freichat_sorat/client/main.php?id=<?php echo $ses;?>&xhash=<?php echo freichatx_get_hash($ses); ?>"></script>
	<link rel="stylesheet" href="http://localhost/elawyerfinal/freichat_sorat/client/jquery/freichat_themes/freichatcss.php" type="text/css">
<!--===========================FreiChatX=======END=========================-->                
		<title>e-Lawyers</title>
        <meta name="description" content="E-lawyer">
        <link href="CSS/bootstrap.min.css" rel="stylesheet" <link href="CSS/app.css" rel="stylesheet">
        <link rel="stylesheet" href="CSS/dd.css">
         <link href="CSS/bootstrap-toggle.min.css" rel="stylesheet">
        <link href="CSS/font-awesome.min.css" rel="stylesheet">
        <link href="CSS/style.css" rel="stylesheet">
        <link href="CSS/jquery.fileupload.css" rel="stylesheet">
        <!-- Latest compiled and minified CSS -->
        <link rel="shortcut icon"  href="./images/logo.ico"/>
        <link href='CSS/fullcalendar.css' rel='stylesheet' />
        <link href='CSS/fullcalendar.print.css' rel='stylesheet' media='print' />
        <!-- Optional theme -->
        <link rel="stylesheet" href="CSS/jquery.datetimepicker.css">
        <link rel="stylesheet" href="CSS/notifIt.css">
        <link rel="stylesheet" href="CSS/jquery-ui.css">
        <link rel="stylesheet" href="CSS/select2.min.css">
        <link rel="stylesheet" href="JS/lang/css/jquery.localizationTool.css">
        
        <script src="JS/jquery.js"></script>
        <script src="JS/jquery.dd.js"></script> 
        <script src="JS/jquery-ui-1.10.4.js"></script>
        
        <script src='JS/moment.min.js'></script>
        <script src='JS/notifIt.js'></script>
         <script src="JS/jquery.datetimepicker.full.js"></script>

        <script src="JS/bootstrap.min.js"></script>
        <link href="CSS/fileinput.css" media="all" rel="stylesheet" type="text/css" />
        <script src="JS/fileinput.js" type="text/javascript"></script>
        <script src="JS/fileinput_locale_fr.js" type="text/javascript"></script>
        <script src="JS/fileinput_locale_es.js" type="text/javascript"></script>
        <script src="JS/bootstrap-toggle.min.js"></script>
        <script src="JS/jquery.form.js"></script>
        <script src='JS/fullcalendar.min.js'></script>
        <script src='JS/jQuery.print.js'></script>
        <script src='JS/select2.min.js'></script>
        <script src="JS/persianumber.js"></script> 
        <script src="JS/scripts.js"></script> 
        <script src="JS/highcharts.js"></script>
        <script src="JS/exporting.js"></script>
        <script src="JS/idle.js"></script>
        <script src="JS/jquery.fileupload.js"></script>  

<style>
  .desc { color:#fff; }
        .desc a {color:#fff;}
        
        .dropdown dd, .dropdown dt, .dropdown ul { margin:0px; padding:0px; }
        .dropdown dd { position:relative; }
        .dropdown a, .dropdown a:visited { color:#816c5b; text-decoration:none; outline:none;}
        .dropdown a:hover { color:#5d4617;}
        .dropdown dt a:hover { color:#5d4617; border: 1px solid #d0c9af;}
        .dropdown dt a {background:#fff url('http://www.jankoatwarpspeed.com/wp-content/uploads/examples/reinventing-drop-down/arrow.png') no-repeat scroll right center; display:block; padding-right:20px;
                        border:1px solid #fff; width:110px;}
        .dropdown dt a span {cursor:pointer; display:block; padding:5px;}
        .dropdown dd ul { background:#fff none repeat scroll 0 0; border:1px solid #d4ca9a; color:#C5C0B0; display:none;
                          left:0px; padding:5px 0px; position:absolute; top:2px; width:auto; min-width:110px; list-style:none;}
        .dropdown span.value { display:none;}
        .dropdown dd ul li a { padding:15px; display:block;}
        .dropdown dd ul li a:hover { background-color:#d0c9af;}
        
        .dropdown img.flag { border:none;  width: 20px; height:20px;  }
        .flagvisibility { display:none;}



</style>


  </head>


     <body >       
            <?php
            if (!empty($_SESSION['user'])) {
            include_once 'header.php';
            
            }
            ?>
         
            <?php
            $pagesAuthorizedWithoutSession = array("signIn");
            // now we will get the action of the page from the get array 
            if (!empty($_GET['action'])) {
                // cbeck if this page exist or not .. 
                if (file_exists($_GET['action'] . ".php")) {
                    if (!empty($_SESSION['user'])) {
                        if($_SESSION['user']['level_ID']==7){
                            include_once 'kitchenrequest.php';
                         }
                         else
                        include_once $_GET['action'] . ".php";
                    include_once 'footer.php';
                    }else{
                       
                             include_once './signIn.php';
                        
                    }
                } else {
                    include_once "notFound.php";
                }
            } else if(empty($_GET['action']) && !empty($_SESSION['user'])) {
                  
                    include_once 'mainpage.php';
                    echo '';
                    include_once 'footer.php';
            }
            else {
                 include_once './signIn.php';
                 ?>
                
            
        </script>
           <?php 
            }
            ?>
        </div>


    </body>
</html>
  <script>
     $(document).ready(function() {
        togle("quickevents","latestevents");
        togle("quicknews","latestnews");
        togle("quickmissions","latestmissions");
        togle("quickcalendar","latestcalendar");
        togle("quickmissionss","latestmissionss");
       });
    </script>

<?php
include_once 'addMissionModalByCase.php';

include_once 'addBlogModal.php';
include_once 'viewMissionModal.php';
include_once 'addEventModal.php';
include_once 'addEventModalByCase.php';
include_once 'viewEventModal.php';
include_once 'addClientModal.php';
include_once 'addUserModal.php';
include_once 'viewBlogModal.php';
?>
                    <!--===========================FreiChat=======START=========================-->
<!--    For uninstalling ME , first remove/comment all FreiChat related code i.e below code
     Then remove FreiChat tables frei_session & frei_chat if necessary
         The best/recommended way is using the module for installation                         -->

 <script src="./JS/lang/js/jquery.localizationTool.js"></script>
 <script src="./JS/jquery.cookie.js"></script>
 <script src="./JS/lang/js/lang.js"></script>
     
