<?php include_once 'techoffice/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
	
.body { 
 background: url('./images/login_bg.png') no-repeat center center fixed; 
 -webkit-background-size: cover;
 -moz-background-size: cover;
 -o-background-size: cover;
 background-size: cover;
}


body{
	background: url('./images/bg4.png') no-repeat center center fixed;
	background-color: #ebebeb;
}

.top-bg{
	margin-top: 0px;
	height: 50px;
	background-color: #fff;
}

.left{
	margin-right: 70px;
}

#about{
	width: 200px;
}

#client{
	width: 200px;
}

.top{
	margin-top: 1%;
}

.panel-default {
 margin-top: 1%;
}
.form-group.last {
 margin-bottom: 0px;
}

.clr{
	background-image: url('./images/form_bg.jpg');
}
.up{
	margin-top: 20px;
}
.right{
	margin-left: -5%;
}
.input-group-addon
{
    background-color:#FFF;
}

.input-group .input-group-addon + .form-control
{
    border-left:none;
}




/* New CSS */

#app-icon img{
	width: 50px;
}

#right-arrow img{
	margin-top: 40px;
}

#cloud-logo img{
	width: 200px;
}
.enter-btn {margin-top:10px;}
.enter-btn .btn-default {background:url(images/enter-bg.png); height:48px; width:182px; text-align:center; color:#fff; border-radius:0px; border:0px; text-transform:uppercase; font-size:18px;}
.become-new-client .btn-default {display:block; text-align:center; margin-top: -55px; padding:5px 30px; border:1px solid #cbcbcb; background:#fff; font-size:18px; color:#adadad; border-radius:0px;}

</style>
	<title>E-lawyer.co</title>

</head>
<body class="">

	<div class="top-bg">
		<div class="container">
			<div class="row top">
				<div class="pull-left become-new-client" style="margin:50px 0px 0px 0px; "><a href="./newcustomer/index.php" class="btn btn-default">عميل جديد</a></div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					
        <div class="pull-right become-new-client"  style="margin:50px 0px 0px 0px; "><a href="./aboutus/index.php" class="btn btn-default">نبذة عنا</a></div>
			</div>
		</div>
	</div>
	<!--  col-lg-offset-8 col-md-offset-8 col-sm-offset-3 col-xs-offset-2  -->
	<div class="container top">
    <div class="row">
    	<!-- <div class="col-lg-1">
    		<div id="app-icon">
    			<img src="img/app.png">
    		</div>
    	</div>
    	<div class="col-lg-3">
    		<div id="right-arrow">
    			<img src="img/left-arrow.png">
    		</div>
    	</div>
    	<div class="col-lg-2">
    		<div id="cloud-logo">
    			<img src="img/logocloud.png">
    		</div>
    	</div> -->
    	<br/><br/>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-8 col-lg-offset-8 col-md-offset-8 col-sm-offset-3 col-xs-offset-2 clr">
            <div class="panel-default">
                </div>
                <div class="panel-body">
                 <div style="display:none" ></div>            
                    <div id ="error">
                        <p style="color:#FC960F; font-size: 18px;"><?php if(!empty($_GET['error'])) {
                            echo $_GET['error']; 
                                $_GET['error'] = " ";
                             }?>
                        </p>
                    </div>
                    <form id="loginform" class="form-horizontal" role="form" action="DBS/siginAction.php" method="post" >

					<div class="input-group">
					  <span class="input-group-addon">
					  	<img src="./images/icons/building-icon.png" alt="">
					  </span>
					  <select class="form-control" name="office">
					  <option value='null' >إختر المكتب</option>
				    		 <?php 
                        echo listOffices();
                    ?>
				    	</select>
					</div>
					<br />
				  	<div class="input-group">
					  <span class="input-group-addon">
					  	<img src="./images/icons/Places-user-identity-icon.png" alt="">
					  </span>
				    	<input type="text" class="form-control" id="username" name="username" placeholder="إسم المستخدم">
					</div>
					<br />
					<div class="input-group">
					  <span class="input-group-addon">
					  	<img src="./images/icons/Security-Password-1-icon.png" alt="">
					  </span>
				      <input type="password" class="form-control" id="password" name="password" placeholder="الرمز السري">
					</div>
					<br />
					<div class="input-group">
					  <span class="input-group-addon">
					  	<img src="./images/icons/Tools-icon.png" alt="">
					  </span>
				      <input type="int" class="form-control" id="tokenid" name="tokenid" placeholder="Token ID">
					</div>
				<div class="enter-btn">
				<button type="submit" class="btn btn-default" id="enterr">
					دخول
				</button>               
                </div>
				</form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>



</html>