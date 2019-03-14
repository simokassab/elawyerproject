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
                function validateEmail(email) {
                    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    return re.test(email);
                }
                if($.cookie('e_fname')!=''){
                   $('#firstname').val($.cookie('e_fname')) ;
                }
                if($.cookie('e_lname')!=''){
                   $('#lastname').val($.cookie('e_lname')) ;
                }
                if($.cookie('e_company')!=''){
                   $('#company').val($.cookie('e_company')) ;
                }
                if($.cookie('e_mobile')!=''){
                   $('#mobile').val($.cookie('e_mobile')) ;
                }
                if($.cookie('e_email')!=''){
                   $('#email').val($.cookie('e_email')) ;
                }
                
                
               $( "#nextt" ).click(function() {
                   var checkk='';
                   if($('#firstname').val()==""){
                       checkk+='الرجاء إدخال الإسم'+'\n';
                   }
                   if($('#lastname').val()==""){
                       checkk+='الرجاء إدخال العائلة'+'\n';
                   }
                   if($('#email').val()==""){
                       checkk+='الرجاء إدخال البريد الإلكتروني'+'\n';
                   }
                   if($('#email').val()!=""){
                       if(!validateEmail($('#email').val())){
                           checkk+='البريد الإلكتروني غير صحيح'+'\n';
                       }
                   }
                   if($('#company').val()==""){
                       checkk+='الرجاء إدخال إسم الشركة'+'\n';
                   }
                   if($('#mobile').val()==""){
                       checkk+='الرجاء إدخال رقم الهاتف'+'\n';
                   }
                   if(checkk==''){
                        $.cookie('e_fname', $('#firstname').val());
                        $.cookie('e_lname', $('#lastname').val());
                        $.cookie('e_company', $('#company').val());
                        $.cookie('e_email', $('#email').val());
                        $.cookie('e_mobile', $('#mobile').val());
                        window.document.location="Step2.php";
                   }
                   else {
                       alert(checkk);
                   }
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
          .footer {
            position: relative;
            height: 30px;
            clear:both;
            padding-top:20px;
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
             .hr_inactive{
                border-color: #8c8c8c;
            }
            .imgg {
                filter: brightness(10%);
                margin: 20px 0px 0px -90px;
            }
            a {
                color: orange; 
            }
          
       </style>
  </head>
     <body >
         <div class="container mrlbody">   
	<div class="row clearfix">
		<div class="col-md-6 col-sm-4">
		</div>
		<div class="col-md-6 col-sm-8 bgcontant">
                   <br/>
                   <div class="col-md-3 col-xs-3 xs-nopadding" style="text-align: center; color:orange; font-weight: bold;">
                        <a href="index.php"  id="step1">
                            <span class="glyphicon glyphicon-pencil"></span>
                           <br/> 

                           <p class="panel-success">الخطوة الأولى</p>
                           <span id="step1hr"><hr class="hr_active"/></span>
                       </a>
                    </div>
                     <div class="col-md-3 col-xs-3 xs-nopadding" style="text-align: center;">
                        
                            <span class="glyphicon glyphicon-tasks"></span>
                            <br/> <p class="panel-success">الخطوة الثانية</p>
                           <span id="step1hr"><hr class="hr_inactive"/></span>
                        
                    </div>
                     <div class="col-md-3 col-xs-3 xs-nopadding" style="text-align: center;">
                        <span class="glyphicon glyphicon-list-alt"></span>
                        <br/> <p class="panel-success" > الخطوة الثالثة</p>
                       <span id="step1hr"><hr class="hr_inactive"/></span>
                    </div>
                     <div class="col-md-3 col-xs-3 xs-nopadding" style="text-align: center;">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                        <br/> <p class="panel-success"> الخطوة الرابعة</p>
                       <span id="step1hr"><hr class="hr_inactive"/></span>
                    </div>
                    <div class="form-group col-md-5 ">
                       
                    </div>
                    <div class="form-group col-md-4 ">
                       
                    </div>
                      <div class="form-group col-md-6 " style="direction: rtl;">
                          <label for="name" class="control-label"  >العائلة</label>
                        <input type="text" value='' class="form-control" id="lastname" name="lastname" placeholder="">
                    </div>
                      <div class="form-group col-md-6" style="direction: rtl;">
                        <label for="name" class="control-label">الإسم</label>
                        <input type="text" value='' class="form-control" id="firstname" name="firstname" placeholder="">
                    </div> 
                     <div class="form-group col-md-12 "> </div>
                      <div class="form-group col-md-12" style="direction: rtl;">
                        <label for="name" class="control-label">إسم الشركة</label>
                        <input type="text" value='' class="form-control" id="company" placeholder="">
                    </div>
                     <div class="form-group col-md-12 "> </div>
                     <div class="form-group col-md-12" style="direction: rtl;">
                        <label for="name" class="control-label">هاتف</label>
                        <input type="text" value='' class="form-control" id="mobile" placeholder="">
                    </div>
                      <div class="form-group col-md-12 "> </div>
                      <div class="form-group col-md-12" style="direction: rtl;">
                        <label for="name" class="control-label">البريد الإلكتروني</label>
                        <input type="email" value='' class="form-control" id="email" placeholder="">
                    </div>
                    
                      <div class="form-group col-md-12" style="text-align: center;">  <br/>
                       
                         
                          <button type="button" id="nextt" class="btn btn-primary" style="width:120px; height: 35px;" >
                              التالي</button>
                           
                    </div>
                </div>
                   
                </div>
           
         </div>
 
     </body>
     
</html>
     