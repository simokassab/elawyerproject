<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>E-Lawyer</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />    
    <!-- full calendar css-->
    <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
	<link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
	<link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">

	<link rel="stylesheet" href="css/fullcalendar.css">
	<link href="css/widgets.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
	<link href="css/xcharts.min.css" rel=" stylesheet">	
	<link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    
  
  </head>

  <body>
 
  <section id="container" class="">
     
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                
            </div>

            <a href="index.php" class="logo flip animated" data-wow-duration="1000ms" data-wow-delay="300ms">E- <span class="lite">lawyer</span></a>
          

            

            <div class="top-nav notification-row">
             
                <ul class="nav pull-right top-menu">
                    
                   
               </ul>
            
            </div>
      </header>      
      

   

<?php

require_once '../config.php';
$con = connectDB($_SESSION['office']);
mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
$result=mysqli_query($con, "select * from superevents");
//$q=mysql_query("select * from superevents");




?>
     
      <section id="main-content">
          <section class="wrapper">
		  
           

              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Record
                          </header>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th>ID</th>
                                 <th>date</th>
                                 <th>event</th>
                                 <th>user_ID</th>
								 <th>hidden</th>
								
                                 
                              </tr>
                              
                            <?PHP 
							
							
							if(mysqli_num_rows($result)>0){
								 while ($row = mysqli_fetch_assoc($result))
{
	echo "<tr>
	<td> ".$row['ID']."</td>
	<td> ".$row['date']."</td>
	<td> ".$row['event']."</td>
	<td> ".$row['user_ID']."</td>
	<td> ".$row['hidden']."</td>
	<td>"; ?>
    <?PHP echo "</td>
	</tr>
	";
}
}
?>   
                                                            
                           </tbody>
                        </table>
                      </section>
                  </div>
              </div>
          
          </section>
      </section>
    
  </section>

    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nicescroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>


  </body>
</html>
