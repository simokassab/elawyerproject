<?php ?>
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
        
        <link href="../CSS/bootstrap.min.css" rel="stylesheet">
         <link href="../CSS/bootstrap-toggle.min.css" rel="stylesheet">
        <link href="../CSS/font-awesome.min.css" rel="stylesheet">
        <!-- Latest compiled and minified CSS -->
        <link rel="shortcut icon"  href="../images/logo.ico"/>
        <!-- Optional theme -->
        <link rel="stylesheet" href="../CSS/jquery.datetimepicker.css">
        <link rel="stylesheet" href="../CSS/jquery-ui.css">
        <link rel="stylesheet" href="./css/jquery-anyslider.css">
        <link rel="stylesheet" href="./css/step3.css">
        <script src="../JS/jquery.js"></script>
        <script src="../JS/jquery-ui-1.10.4.js"></script>
         <script src="../JS/jquery.datetimepicker.full.js"></script>
        <script src="../JS/bootstrap.min.js"></script>
        <script src="../JS/bootstrap-toggle.min.js"></script>
        <script src="../JS/jquery.form.js"></script>
         <script src="./js/jquery.easing.1.3.js"></script>
        <script src="./js/jquery.anyslider.js"></script>
        <script src="./js/jquery.cookie.js"></script>
         <style>
           body { 
            margin:0;
            padding:0;
            background: url(images/background1.png) no-repeat ; 
            -webkit-background-size: cover; /* pour anciens Chrome et Safari */
            background-size: cover; /* version standardisée */
            font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
          }
          .divv {
              height: 580px;
              margin: 35px 63px 0 0;
              width: 590px;
              background-color: white;
              float: right;
             }
           
            .glyphicon {
                font-size: 25px;
              
            }
            .hr_active {
                border: 2px solid orange;
            }
             .hr_active1 {
                border: 1px solid orange;
            }
             .hr_inactive{
                border-color: #8c8c8c;
            }
       </style>
            <script>
    $(function () {
        var package='';
        if($.cookie('e_package')==null){
            $.cookie('e_package','');
        }
        else {
            if($.cookie('e_package')=='silver'){
                $("#silver").html("Selected");
            }
            if($.cookie('e_package')=='gold'){
                $("#gold").html("Selected");
            }
            if($.cookie('e_package')=='platinum'){
                $(".sss").html("Selected");
            }
        }
        $('.slider1').anyslider({
            animation: 'fade',
            interval: 3000,
            reverse: true,
            showControls: false,
            startSlide: 1
        });
        $( "#silver" ).click(function(e) {
            e.preventDefault();
            $.cookie('e_package', "silver");
            $("#silver").html("Selected");
            $("#gold").html("Select");
            $(".sss").html("Select");
        }); 
        $( "#gold" ).click(function(ee) {
            ee.preventDefault();
            $.cookie('e_package', "gold");
            $("#gold").html("Selected");
             $(".sss").html("Select");
             $("#silver").html("Select");
        }); 
        $(".sss").click(function(e) {
            e.preventDefault();
          //  alert("f");
            $.cookie('e_package', "platinum");
            $(".sss").html("Selected");
            $("#gold").html("Select");
            $("#silver").html("Select");
        }); 
         $( "#closee" ).click(function() {
                         window.document.location="Step2.php";
                 
        });
        $( "#nextt" ).click(function() {
              window.document.location="checkout.php";
         }); 
    });
    </script>

  </head>
     <body >
         <div class="container mrlbody">   
	<div class="row">
		<div class="col-md-6 col-sm-4">
		</div>
		<div class="col-md-6 col-sm-8 bgcontant">
                   <br/>
                  <div class="col-lg-3 col-xs-3 xs-nopadding" style="text-align: center;">
                        <span class="glyphicon glyphicon-pencil"></span>
                       <br/> 
                       <p class="panel-success">الخطوة الأولى</p>
                       <span id="step1hr"><hr class="hr_inactive"/></span>
                    </div>
                     <div class="col-lg-3 col-xs-3 xs-nopadding" style="text-align: center;">
                        <span class="glyphicon glyphicon-tasks"></span>
                        <br/> <p class="panel-success">الخطوة الثانية</p>
                       <span id="step1hr"><hr class="hr_inactive"/></span>
                    </div>
                     <div class="col-lg-3 col-xs-3 xs-nopadding" style="text-align: center; color:orange; font-weight: bold;">
                        <span class="glyphicon glyphicon-list-alt"></span>
                        <br/> <p class="panel-success" > الخطوة الثالثة</p>
                       <span id="step1hr"><hr class="hr_active"/></span>
                    </div>
                     <div class="col-lg-3 col-xs-3 xs-nopadding" style="text-align: center;">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                        <br/> <p class="panel-success"> الخطوة الرابعة</p>
                       <span id="step1hr"><hr class="hr_inactive"/></span>
                    </div>
                    <div class="form-group col-md-5 ">
                       
                    </div>
                    <div class="form-group col-md-4 ">
                       
                    </div>
                     <div class="form-group col-md-12 " style="text-align: center;" >
                       

                                <div class="slider slider1">

                                    <span style="text-align: center;">
                                        <div class="span3 pro" >
                                            <div class="pricing-table-header-pro">
                                                <h2>SILVER</h2>
                                            </div>
                                            <div class="pricing-table-features">
                                                <p><strong>1 control Admin</strong></p>
                                                <p><strong>8 Users</strong></p>
                                                <p><strong>200</strong> cases</p>
                                            </div>
                                            <div class="pricing-table-signup-pro">
                                              <p><a href="#" id="silver">Select</a></p>
                                            </div>
                                        </div>
                                    </span>
                                    <span  style="text-align: center;">
                                      <div class="span3 small">
                                            <div class="pricing-table-header-small">
                                                <h2>GOLD</h2>
                                            </div>
                                            <div class="pricing-table-features">
                                                <p><strong>8 control Admin</strong></p>
                                                <p><strong>12 Users</strong></p>
                                                <p><strong>500</strong> cases</p>
                                            </div>
                                          <div class="pricing-table-signup-small" style="font-size: 12px;">
                                              <p><a href="#" id="gold">Select</a></p>
                                            </div>
                                        </div>
                                    </span>
                                    <span style="text-align: center;">
                                         <div class="span3 medium" >
                                            <div class="pricing-table-header-medium">
                                                <h2>PLATINUM</h2>
                                            </div>
                                            <div class="pricing-table-features">
                                                <p><strong>14 control Admin</strong></p>
                                                <p><strong>18 Users</strong></p>
                                                <p><strong>800</strong> cases</p>
                                            </div>
                                            <div class="pricing-table-signup-medium" >
                                              <p><a href="#" id="platinumm" class="sss" >Select</a></p>
                                            </div>
                                        </div>
                                    </span>

                                </div>

                    </div> 

                      <div class="form-group col-md-12" style="text-align: center;">  
                        <button type="button" id="closee" class="btn btn-warning" style="width:120px; height: 35px;" >
                              رجوع</button>
                          <button type="button" id="nextt" class="btn btn-primary" style="width:120px; height: 35px;" >
                              التالي</button>
                    </div>
                </div>
                   
                </div>
         </div>
     </body>
     
</html>
     