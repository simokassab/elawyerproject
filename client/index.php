<?php 
include ('../constants.php');
//mkdir(PATH_URL.'elfinder/files/test', 0777, true);
//echo PATH_URL;
session_start();
//require_once 'configDB.php';
if (isset($_SESSION['office'])) {
            require_once ("../config.php");
            
            }
//
require_once ('../functions/global.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
       
    </style>
    <title>e-Lawyers</title>

        <meta name="description" content="E-lawyer">
        <meta name="author" content="LayoutIt!">
        
        <link href="../CSS/bootstrap.min.css" rel="stylesheet" <link href="CSS/app.css" rel="stylesheet">
         <link href="../CSS/bootstrap-toggle.min.css" rel="stylesheet">
        <link href="../CSS/font-awesome.min.css" rel="stylesheet">
        <link href="../CSS/style.css" rel="stylesheet">
        <link href="../CSS/jquery.fileupload.css" rel="stylesheet">
        <!-- Latest compiled and minified CSS -->
        <link rel="shortcut icon"  href="../images/logo.ico"/>
        <link href='../CSS/fullcalendar.css' rel='stylesheet' />
        <link href='../CSS/fullcalendar.print.css' rel='stylesheet' media='print' />
        <!-- Optional theme -->
        <link rel="stylesheet" href="../CSS/jquery.datetimepicker.css">
        <link rel="stylesheet" href="../CSS/notifIt.css">
        <link rel="stylesheet" href="../CSS/jquery-ui.css">
        <link rel="stylesheet" href="../CSS/select2.min.css">
        <script src="../JS/jquery.js"></script>
        
        <script src="../JS/jquery-ui-1.10.4.js"></script>
        <script src='../JS/moment.min.js'></script>
        <script src='../JS/notifIt.js'></script>
         <script src="../JS/jquery.datetimepicker.full.js"></script>
        <script src="../JS/bootstrap.min.js"></script>
        <link href="../CSS/fileinput.css" media="all" rel="stylesheet" type="text/css" />
        <script src="../JS/fileinput.js" type="text/javascript"></script>
        <script src="../JS/fileinput_locale_fr.js" type="text/javascript"></script>
        <script src="../JS/fileinput_locale_es.js" type="text/javascript"></script>
        <script src="../JS/bootstrap-toggle.min.js"></script>
        <script src="../JS/jquery.form.js"></script>
        <script src='../JS/fullcalendar.min.js'></script>
        <script src='../JS/fullcalendar/lang/ar.js'></script>
        <script src='../JS/jQuery.print.js'></script>
        <script src='../JS/select2.min.js'></script>
        <script src="../JS/persianumber.js"></script> 
        <script src="../JS/scripts.js"></script> 
        <script src="../JS/highcharts.js"></script>
        <script src="../JS/exporting.js"></script>
        <script src="../JS/idle.js"></script>
        <script src="../JS/jquery.fileupload.js"></script> 
        <script src="../JS/allscripts.js"></script> 

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
            include_once './header.php';
            
            }
            ?>
         
            <?php
            $pagesAuthorizedWithoutSession = array("signIn");
            // now we will get the action of the page from the get array 
            if (!empty($_GET['action'])) {
                // cbeck if this page exist or not .. 
                if (file_exists($_GET['action'] . ".php")) {
                    if (!empty($_SESSION['user'])) {
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
                    include_once './footer.php';
            }
            else {
                 include_once './signIn.php';
            }
            ?>
        </div>


    </body>




    
    <!----------CALENDER SCRIPT----------->
    
    
  </body>
</html>

