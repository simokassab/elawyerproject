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
        <link rel="stylesheet" href="./css/jquery-ui-slider-pips.css">
        <script src="../JS/jquery.js"></script>
        <script src="../JS/jquery-ui-1.10.4.js"></script>
         <script src="../JS/jquery.datetimepicker.full.js"></script>
        <script src="../JS/bootstrap.min.js"></script>
        <script src="../JS/bootstrap-toggle.min.js"></script>
        <script src="../JS/jquery.form.js"></script>
        <script src="./js/jquery-ui-slider-pips.js"></script>
       <script src="./js/jquery.cookie.js"></script>
       <script>
            $(document).ready(function() { 
                $( "#nextt" ).click(function() {
                 //  var s='لقد اخترت: ';
                 //  s+=$('#ress').html();
                 //  s+='\n';
                 //  s+='هل تريد المتابعة ؟';
                 //  alert(s);
                   // if(confirm(s)){
                         window.document.location="Step3.php";
                    //}
                   // else {
                        
                   // }
                }); 
                 $( "#closee" ).click(function() {
                         window.document.location="index.php";
                 
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
              background: url(images/unnamed.png) no-repeat;
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
         

            /*the slider background*/
            .slider {
            width:auto;
            height:11px;
            background:url(images/slider-bg.png) 430px 11px;
            position:relative;
            margin: 0px 0px 0px 10px;
            padding:0 10px;
            }

            /*Style for the slider button*/
            .ui-slider-horizontal .ui-slider-handle {
            width:23px;
            height:23px;
            position:absolute;
            top:-7px;
            margin-left:-12px;
            z-index:200;
            border-radius: 150px;
            -webkit-border-radius: 150px;
            -moz-border-radius: 150px;
            background:url(images/logo.png) no-repeat;
            }
        
            /*Result div where the slider value is displayed*/
            #slider-result {
            font-size:45px;
            height:100px;
            color:#258BCA;
            /*width:250px;
            margin: -10px 0px 0px 140px;*/
            text-align:center;
            text-shadow:1px  1px 1px #000;
            font-weight:700;
            padding:20px 0;
            }

            /*This is the fill bar colour*/
            .ui-widget-header {
            background:url(images/fill.png) no-repeat left;
            height:8px;
            left:1px;
            top:1px;
            position:absolute;
            }
            .ui-slider-horizontal .ui-slider-handle:hover {
                cursor: pointer;
            }
            .slider label {
                position: absolute;
                width: 20px;
                margin-left: -10px;
                text-align: center;
                margin-top: 20px;
            }

            a {
            outline:none;
            -moz-outline-style:none;
            }
			@media (max-width:959px) {
			#slider-result{font-size:38px;}
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
                     <div class="col-lg-3 col-xs-3 xs-nopadding" style="text-align: center; color:orange; font-weight: bold;">
                        <span class="glyphicon glyphicon-tasks"></span>
                        <br/> <p class="panel-success">الخطوة الثانية</p>
                       <span id="step1hr"><hr class="hr_active"/></span>
                    </div>
                     <div class="col-lg-3 col-xs-3 xs-nopadding" style="text-align: center;">
                        <span class="glyphicon glyphicon-list-alt"></span>
                        <br/> <p class="panel-success" > الخطوة الثالثة</p>
                       <span id="step1hr"><hr class="hr_inactive"/></span>
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
                           
                         <img src="images/backup.png" />
                    </div> 
                    <div class="form-group col-md-12 " >
                          <label class="ccontrol-label">Select your server Capacity: </label>
                          <br/>
                         <div class="slider"></div> 
                         <div class="form-group col-lg-12 " >
                            
                              <div id="slider-result">
                                   <hr/>
                                  <span id="ress"></span>
                                
                              </div>
                         </div>
                          
                           <script> 
                          $(document).ready(function() {
                              //$.cookie('e_server', 2);
                             // $.removeCookie('e_server');
                              
                              var vall='';
                              if($.cookie('e_server')==null){
                                  vall=2;
                                  $('#ress').html(vall+' TB');
                                 // $('#costt').html(' السعر: $'+vall * 500);
                              }
                              else {
                                  vall=$.cookie('e_server');
                                  $('#ress').html(vall+' TB');
                                //  $('#costt').html(' السعر: $'+vall * 500);
                              }
                             // alert(vall);
                            //  alert($.cookie('e_fname'));
                                $('.slider').slider({
                                    min:2,
                                    max:10,
                                    animate:true,
                                    value:vall, 
                                    step:2,
                                 change: function(event, ui) { 
                                      //  alert(ui.value); 
                                         $('#ress').html(ui.value+" TB");
                                         $.cookie('e_server', ui.value);
                                     //    $('#costt').html(' السعر: $'+ui.value * 500);
                                         
                                    } 
                             
                                });
                                  $('.slider').slider("pips", {
        	
                                            first: "label",
                                            last: "label",
                                        rest: "label",
                                            step: 2,
                                            labels: true,
                                            prefix: "",
                                            suffix: " TB"

                                    });
                                    $('.slider').slider("float", {
        	
                                        handle: true,
                                        pips: true,
                                        labels: false,
                                        prefix: "",
                                        suffix: " TB"

                                });
                                
                                    
                            });

                        </script>  
                         
                    </div> 
                      <div class="form-group col-md-12" style="text-align: center;"> 
                          <button type="button" id="closee" class="btn btn-warning" style="width:120px; height: 35px;" >
                              رجوع</button>
                          <button type="button" class="btn btn-primary" id="nextt" style="width:120px; height: 35px;" >
                              التالي</button>
                          
                    </div>
                </div>
                   
                </div>
         </div>
     </body>
     
</html>
     