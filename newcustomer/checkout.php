<?php 

    
?>
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
        <link rel="stylesheet" href="../CSS/style.css">
        <script src="../JS/jquery.js"></script>
        <script src="../JS/jquery-ui-1.10.4.js"></script>
         <script src="../JS/jquery.datetimepicker.full.js"></script>
        <script src="../JS/bootstrap.min.js"></script>
        <script src="../JS/bootstrap-toggle.min.js"></script>
        <script src="../JS/jquery.form.js"></script>
        <script src="./js/jquery.cookie.js"></script>
        <script type="text/javascript">
                $(document).ready(function() {
                      $('#fullname').html("<b>"+$.cookie('e_fname')+" "+$.cookie('e_lname')+"</b>") ;     
                       $('#server').html("<b>"+$.cookie('e_server')+" TB</b>") ;  
                       $('#package').html("<b>"+$.cookie('e_package')+" </b>") ; 
                       var server_=$.cookie('e_server') * 500;
                       $('#server_').html("<b style='color:orange;'>$ "+server_+" </b>") ; 
                       var package_='';
                       if($.cookie('e_package')=='silver'){
                          // package_=99;
                         //  $('#package_').html("<b style='color:orange;'> 99$/month </b>") ;  
                       }
                       if($.cookie('e_package')=='gold'){
                         //   package_=299;
                        //  $('#package_').html("<b style='color:orange;'> 299$/month </b>") ;  
                       }
                       if($.cookie('e_package')=='platinum'){
                          //  package_=399;
                          //$('#package_').html("<b style='color:orange;'> 399$/month </b>") ;  
                       }
                       var totall=server_ + package_;
                        $('#totall').html("$ "+totall) ; 
                  $( "#closee" ).click(function() {
                      if(confirm('هل تريد إلغاء الطلب ؟')){
                           $.cookie('e_fname','');
                        $.cookie('e_lname', '');
                        $.cookie('e_company', '');
                        $.cookie('e_email', '');
                        $.cookie('e_mobile', '');
                        $.removeCookie('e_server');
                        $.removeCookie('e_package');
                         window.document.location="http://e-lawyer.co";
                    }
                    else {
                        
                    }
                    }); 
                    $( "#checkoutt" ).click(function() {
                            var fname=$.cookie('e_fname');
                            var lname=$.cookie('e_lname');
                            var comp=$.cookie('e_company');
                            var mob=$.cookie('e_mobile');
                            var email=$.cookie('e_email');
                            var server=$.cookie('e_server');
                            var package=$.cookie('e_package');
                            $('#waitt').css('display', 'block');
                            $.ajax({
                            type: "get",
                            url: "sendmail.php",
                            data: 'fname='+fname+"&lname="+lname+"&comp="+comp+"&mob="+mob+"&email="+email+"&server="+server+"&package="+package,
                            success: function (dataa) {
                                $("#resultt").html('شكراً لتواصلك معنا، سوف يتم الإتصال بك في أقرب وقت ممكن.');
                                $('#waitt').css('display', 'none');
                                $.cookie('e_fname','');
                                $.cookie('e_lname', '');
                                $.cookie('e_company', '');
                                $.cookie('e_email', '');
                                $.cookie('e_mobile', '');
                                $.removeCookie('e_server');
                                $.removeCookie('e_package');
                                setTimeout(
                                function()
                               {
                                   window.location.href="http://www.e-lawyer.co/";
                                }, 3000);
                            }
                              
                        });
                    });
                     $( "#backk" ).click(function() {
                         window.document.location="Step3.php";
                 
        });
                    
                });
       </script>
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
                     <div class="col-lg-3 col-xs-3 xs-nopadding" style="text-align: center;">
                        <span class="glyphicon glyphicon-list-alt"></span>
                        <br/> <p class="panel-success" > الخطوة الثالثة</p>
                       <span id="step1hr"><hr class="hr_inactive"/></span>
                    </div>
                     <div class="col-lg-3 col-xs-3 xs-nopadding"   style="text-align: center; color:orange; font-weight: bold;">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                        <br/> <p class="panel-success"> الخطوة الرابعة</p>
                       <span id="step1hr"><hr class="hr_active"/></span>
                    </div>
                  
                   
                      <div class="form-group col-md-12 " style="text-align: center;">
                          <h3 style="color:grey;"> ملخص الطلب</h4>
                    </div>
                   <div class="form-group col-md-12 " style="direction: rtl;" >
                       <table class="table table-hover">
                              <tr>
                                 
                                  <td>الإسم:</td> 
                                   <td id="fullname"></td>
                              <tr>
                                  <td>سعة السيرفر:</td> 
                                  <td id="server"></td>
                              <tr>
                                  <td>الباقة:</td> 
                                  <td id="package"></td>
                              </tr>
                         </table>
                       <hr class="hr_active1"/>
                    </div>
                   
                   <div class="form-group col-md-12 " style="direction: rtl;">
                     
                       <h3 id="resultt" style="color:#1D76AA;"></h3>
                       <h3 id="waitt" style="color:#1D76AA; display: none;">الرجاء الإنتظار...</h3>
                   </div>
                   
                      <div class="form-group col-md-12 xs-nopadding" style="text-align: center;">  <br/><br/>
                           <button type="button" id="closee" class="btn btn-danger" style="width:100px; height: 35px;" >
                              إلغاء</button>
                          <button type="button" id="backk" class="btn btn-warning" style="width:100px; height: 35px;" >
                              رجوع</button>
                          <button type="button" id="checkoutt" class="btn btn-success" style="width:100px; height: 35px;" >
                              اطلب الان</button>
                           
                    </div>
                </div>
                   
                </div>

     </body>
     
</html>
     