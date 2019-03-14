<html>
<head>
<?php include_once 'techoffice/config.php'; ?>
<style>
    
body {background:#ebebeb;}
@font-face {
	font-family: 'Droid Arabic Kufi';
	src: url('./fonts/DroidArabicKufi-Bold.eot');
	src: url('./fonts/DroidArabicKufi-Bold.eot?#iefix') format('embedded-opentype'),
		url('./fonts/DroidArabicKufi-Bold.woff') format('woff'),
		url('./fonts/DroidArabicKufi-Bold.ttf') format('truetype');
	font-weight: bold;
	font-style: normal;
}

@font-face {
	font-family: 'Droid Arabic Kufi';
	src: url('./fonts/DroidArabicKufi.eot');
	src: url('./fonts/DroidArabicKufi.eot?#iefix') format('embedded-opentype'),
		url('./fonts/DroidArabicKufi.woff') format('woff'),
		url('./fonts/DroidArabicKufi.ttf') format('truetype');
	font-weight: normal;
	font-style: normal;
}
img {max-width:100%;}

header {background:#fff; padding:5px 0; margin-top:0px;}
.become-new-client {}
.become-new-client .btn-default {display:block; text-align:center; padding:5px 10px; border:1px solid #cbcbcb; background:#fff; font-size:18px; color:#adadad; border-radius:0px;}

.login-section {position:relative; margin-top:10px;}
.arrow01 { margin-top:10px; position:relative;}
.arrow01 span {position:absolute; left:55%; font-weight:bold; color:#acacac; font-size:14px;}

.login-d {background:url(./images/blue-bg.png) repeat; padding:20px 20px 10px 20px; margin-top:5px;}
.login-d .form-group {position:relative; margin-top:20px;}
.login-d .form-control {border-radius:0px; padding-left:40px; height:40px; color:#acacac; background:url(./images/text-bg.png) repeat-x; box-shadow:-2px 2px 5px #333;}
.login-d .txt1:before {content:""; background:url(images/my-off-icon.png) no-repeat; position:absolute; width:24px; height:28px; left:7px; top:5px;}

.login-d .txt2:before {content:""; background:url(images/user-icon.png) no-repeat; position:absolute; width:24px; height:28px; left:7px; top:5px;}

.login-d .txt3:before {content:""; background:url(images/password-icon.png) no-repeat; position:absolute; width:24px; height:28px; left:7px; top:5px;}

.login-d .txt4:before {content:""; background:url(images/token-icon.png) no-repeat; position:absolute; width:24px; height:28px; left:7px; top:5px;}

.enter-btn {margin-top:20px;}
.enter-btn .btn-default {background:url(images/enter-bg.png); height:48px; width:182px; text-align:center; color:#fff; border-radius:0px; border:0px; text-transform:uppercase; font-size:18px;}

.arrow02 { margin-top:10px; position:relative; margin-bottom:0px;}
.arrow02 span {position:absolute; left:55%; font-weight:bold; color:#acacac; font-size:14px; bottom:10px;}
.at-home {margin-top:420px;}
.at-office {margin-top:455px;}
.arrow-left {background:url(images/left-arrow.png) no-repeat; width:177px; height:32px; position:absolute; left:-100px; top:50px;}
.arrow-right {background:url(images/right-arrow.png) no-repeat; width:177px; height:32px; position:absolute; right:-140px; top:50px;}
.top-arrow {background:url(images/top-arrow.png) no-repeat; width:139px; height:138px; position:absolute; right:-60px; bottom:120px;}
.down-left-arrow {background:url(images/down-left-arrow.png) no-repeat; width:243px; height:450px; position:absolute; left:-190px; top:100px;}
.down-right-arrow {background:url(images/down-arrow-right.png) no-repeat; width:243px; height:450px; position:absolute; right:-190px; top:100px;}

.become-new-client .btn-default:hover {background:#1C76BC; color:#fff;}

@media screen and (max-width:991px) {

.arrow-left {width:50px; left:-40px;}
.arrow-right {width:50px; right:-73px; background-position:right;}
.down-left-arrow {left:-160px; top:180px;}
.down-right-arrow {right:-230px; top:180px;}
.arrow01 span, .arrow02 span {left:60%;}
.top-arrow {bottom: 160px;
    height: 60px;
    position: absolute;
    right: -41px;
    width: 110px;}
	
}

@media screen and (max-width:767px) {
	
	.arrow-lef, .arrow-right, .down-left-arrow, .down-right-arrow, .down-left-arrow, .arrow-left, .top-arrow, .at-office, .at-home {display:none;}
	.arrow01 span, .arrow02 span {left:53%;}
	.display-none {display:none;}
	.backup {margin-bottom:40px;}
	
	}
	
@media screen and (max-width:480px) {
.become-new-client {float:none !important; margin-bottom:10px;}	
.arrow01 span, .arrow02 span {left:56%;}
}

</style>
<script>
$(document).ready(function () {
    // Handler for .ready() called.
   // $('html, body').animate({
   //     scrollTop: $('#loginn').offset().top
  //  }, 'slow');
});
</script>
</head>
<body>
<form id="loginform" class="form-horizontal" role="form" action="DBS/siginAction.php" method="post" >
 <div class="col-md-12">
               <div class="pull-left become-new-client" style="margin:50px 0px 0px 0px; "><a href="./newcustomer/index.php" class="btn btn-default">عميل جديد</a></div>
        <div class="pull-right become-new-client"  style="margin:50px 0px 0px 0px; "><a href="#" class="btn btn-default">نبذة عنا</a></div>
      </div>
<section style="margin:-40px 0px 0px 0px;">
   
    <div class="container" >
    <div class="login-section" >
        
        <div class="row" >
           
        <div class="col-xs-12 col-sm-4 col-md-4 text-center display-none">
            <img src="images/tablet.png" width="90" height="135"/>
        <div class="at-home"><img src="images/at-home.png" width="150" height="110" /></div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4  text-center"> 
        <div class="arrow-left"></div>
        <div class="arrow-right"></div>
        <div class="down-left-arrow"> </div>
        <div class="down-right-arrow"></div>
        <div class="logo"><img src="images/logocloud.png" width="240px" height="90px"/> </div>
        <div class="arrow01"><img src="images/up-arrow.png" height="50px"/> <span>backup 2</span></div>
        <div class="login-d" id="loginn">
            <div style="display:none" ></div>            
                    <div id ="error">
                        <p style="color:#FC960F; font-size: 18px;"><?php if(!empty($_GET['error'])) {
                            echo $_GET['error']; 
                                $_GET['error'] = " ";
                             }?>
                        </p>
                    </div>
				<div class="form-group txt1">
					<select class="form-control" name="office" id="office">
                    <?php 
                        echo listOffices();
                    ?>
                     
                    </select>
				</div>
				<div class="form-group txt2">
                                    <input class="form-control" id="exampleInputPassword1" id="username" name="username" type="text" placeholder="إسم المستخدم" />
				</div>
                <div class="form-group txt3">
					<input class="form-control" id="exampleInputPassword1" id="password" name="password" type="password"  placeholder="الرمز السري"/>
				</div>
                <div class="form-group txt4">
					<input class="form-control" id="exampleInputPassword1" type="text"  placeholder="Token ID"/>
				</div>
				<div class="enter-btn">
				<button type="submit" class="btn btn-default" id="enterr">
					دخول
				</button>               
                </div>

            
        </div>
        <div class="arrow-right">
            
        </div>
            <div class="arrow02"><img src="images/arrow-02.png" height="50px"/><span>backup 1</span></div>
            <div class="backup"><img src="images/backup.png" width="160" height="110"/></div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4  text-center display-none">
            <img src="images/app.png" width="60px" height="115px" style="margin:0px 30px 0px 0px;"/>
        <div class="at-office"><img src="images/at-office.png" width="150" height="110"/></div><br> <br>
        </div>
          
      </div>
      
    </div>
  </div>
</section>
    
    
</form>    
    </div>
</body>
</html>
