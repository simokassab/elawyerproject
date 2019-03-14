<?php
include_once '../config.php';
include_once '../functions/global.php';
$con=  connectDB();
session_start();
if(isset($_SESSION['name']))
{
if(!$_SESSION['name']=='admin')
{
header("Location:index.php?id=You are not authorised to access this page unless you are administrator of this website");
}
}
else
{
header("Location:index.php?id=You are not authorised to access this page unless you are administrator of this website");
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .circular {
	width: 50px;
	height: 50px;
	border-radius: 150px;
	-webkit-border-radius: 150px;
	-moz-border-radius: 150px;
	background: url(http://link-to-your/image.jpg) no-repeat;
	}
        #notification_emails {
            background-color: white;
            
        }
        .lblnotification {
            cursor: pointer;
            color: black;
            font-size:small;
            direction: rtl;
        }
        .lblnotification:hover{
            color: #FC960F;
        }
        .modal-header-warning {
            color:#fff;
            padding:9px 15px;
            border-bottom:1px solid #eee;
            background-color: #FC960F;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
             border-top-left-radius: 5px;
             border-top-right-radius: 5px;
        }
    
    </style>
    <title>e-Lawyers</title>

        <meta name="description" content="E-lawyer">
        <meta name="author" content="LayoutIt!">
        
        <link href="../CSS/bootstrap.min.css" rel="stylesheet">
         <link href="../CSS/bootstrap-toggle.min.css" rel="stylesheet">
        <link href="../CSS/font-awesome.min.css" rel="stylesheet">
        <link href="../CSS/style.css" rel="stylesheet">
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
          <script src="../JS/scripts.js"></script> 
        <script src="../JS/idle.js"></script>
  </head>
     <body >
</head>

<body>
<div class="top-header">
  <div class="container-fluid">  
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button> <!--<a class="navbar-brand" href="#">Brand</a>-->
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                          
					<ul class="nav navbar-nav">
                                            <li>
                                           
                                            <li><a href="#"><img src="../images/top-icon-02.png"/></a></li>
                                            <li><a href="#"><img src="../images/top-icon-03.png"/></a></li>
                                            <li><a href="#"><img src="../images/top-icon-04.png"/></a></li>
                                            <li><a href="index.php?action=kitchenn"><img src="../images/top-icon-05.png"/></a></li>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
                               <li class="topmenu-text"><a href="#">صفحة المراقبة</a></li>             
                               <li class="topmenu-text active-tm"><a href="admin_panel.php?action=Users"> الموظفين </a></li>	
                         <li class="topmenu-text"><a href="#">المكتب</a></li>
                       
                         <li class="dropdown border-none"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               
                                <?php
                                    echo "Welcome ".$_SESSION['name'];
                                   
                                ?>
                               
                            </a>
                         <ul class="dropdown-menu">				
                                <li class="divider">
                                </li>
                                  <li><a  href="logout.php">تسجيل خروج</a></li>
                        </ul>
                        </li>
                        
                       
					</ul>
				</div>
			</nav>
			
		</div>
	</div>
  </div>  
</div> 

<div class="logo">
<div class="container">
 <div class="row">
   <div class="col-sm-12">
    <div class="logo-in"> <img src="../images/logo.png"/></div>
   </div>
 </div>
 </div>
</div>  
    
    <?php 
    if (isset($_GET['action'])){
        include_once $_GET['action'].'.php';
    }
    ?>
