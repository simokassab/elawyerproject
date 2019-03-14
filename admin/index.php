<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
body h1 {
color: #1D76AA;
}
.circular {
      width: 100px;
      height: 100px;
      border-radius: 150px;
      -webkit-border-radius: 150px;
      -moz-border-radius: 150px;
}
#form1 p {
color: #1D76AA;
font-weight: bold;
}
.para {
color: #FC960F;
font-weight: bold;
}
</style>
</head>

<body>
    <img src="../images/logo.png" class="circular"></img>
<h1 align="center">E-lawyer Administration Page</h1>
<p align="center">&nbsp;</p>
<form id="form1" name="form1" method="post" action="verify_user.php">
<p align="center">Username : 
<label for="u_name"></label>
<input type="text" name="u_name" id="u_name" />
</p>
<p align="center">Password : 
<label for="pass"></label>
<input type="password" name="pass" id="pass" />
</p>
<p align="center">
<input type="submit" name="submit" id="submit" value="Login" />
</p>
</form>
<br/>
<h3 align="center" class="para">
<?php
if(isset($_GET['id']))
{
echo $_GET['id'];
}
?>
</h3>

</body>
</html>
