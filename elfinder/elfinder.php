<?php 
session_start();
?>
<!DOCTYPE html>
<?php
//
$id="";
$host=$_SERVER['HTTP_HOST'];
$office=$_SESSION['office'];
$alarm=array();
//echo $office;
include_once '../functions/global.php';
include_once '../config.php';
if((isset($_GET['level'])) && (!isset($_GET['todid'])) && (!isset($_GET['alarm'])) && (!isset($_GET['archive']) )){
$id=$_GET['id'];
$level=$_GET['level'];

if(($level==1) || ($level==2) || ($level==3)) {
//echo dirname($_SERVER['PHP_SELF']) . '/files/' . $id . '/';
echo '<html>
	<head>

		<title>elFinder 2.0</title>

		<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
		<script src="js/jquery.js"></script>
		<script src="js/jquery_ui.js"></script>

		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" href="css/theme.css">

		<!-- elFinder JS (REQUIRED) -->
		<script src="js/elfinder.min.js"></script>
		<script src="js/i18n/elfinder.ar.js"></script>

		<!-- elFinder translation (OPTIONAL) -->


		<!-- elFinder initialization (REQUIRED) -->
		 <script src="../JS/jquery.cookie.js"></script>
		<script type="text/javascript">

			$(document).ready(function() {
				var lang_="";
				var cooki_lang=$.cookie("userLanguage");
					if(cooki_lang=="en_GB"){
						lang_="en";
					}
					else {
						lang_="ar";
					}
				$(\'#elfinder\').elfinder({ 
					url : "php/connector.minimal.php?id='.$id.'&level='.$level.'&office='.$office.'",
						lang : lang_,
						handlers : {
					    dblclick : function(event, elfinderInstance) {
							//console.log("dddd");
					      event.preventDefault();
					      //var f= files;
					     // console.log(files);
					      elfinderInstance.exec(\'getfile\')
					        .done(function() {  })
					        .fail(function() { elfinderInstance.exec(\'open\'); });
					    }
					  },
					  getFileCallback : function(files, fm) {
					  	var pathh=files.path;
					  	console.log(files.path);
					  	if(pathh.indexOf(\'doc\') > -1)
						{
						  window.open("https://view.officeapps.live.com/op/view.aspx?src=http://'.$host.'/elawyerfinal/elfinder/files/"+files.path+"&embedded=true", "_blank");
						}
						else {
							
							 window.open("http://'.$host.'/elawyerfinal/elfinder/files/"+files.path, "_blank");
						}
					    return false;
					}
				});
			});
		</script>
	</head>
	<body>

		<!-- Element where elFinder will be created (REQUIRED) -->
		<div id="elfinder"></div>

	</body>
</html>';

 }
	else {
		//include ("../kitchen.php");
	}
}

if((isset($_GET['level'])) && (isset($_GET['todid'])) && (!isset($_GET['alarm'])) && (!isset($_GET['archive']) ) ){
$id=$_GET['id'];
$level=$_GET['level'];

$todid=$_GET['todid'];
 $case= getCaseById($todid);
    $link=$office.'/'.$case[0]['lawyer_id'] . '/'.$case[0]['ID'].'_'.replace_($case[0]['subject'], ' ', '_')."/";
//echo $todid;
//echo dirname($_SERVER['PHP_SELF']) . '/files/' . $id . '/';
echo '<html>
	<head>
	
		<title>elFinder 2.0</title>

		<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
		<script src="js/jquery.js"></script>
		<script src="js/jquery_ui.js"></script>

		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" href="css/theme.css">

		<!-- elFinder JS (REQUIRED) -->
		<script src="js/elfinder.min.js"></script>
		<script src="js/i18n/elfinder.ar.js"></script>

		<!-- elFinder translation (OPTIONAL) -->


		<!-- elFinder initialization (REQUIRED) -->
		<script src="../JS/jquery.cookie.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				var lang_="";
				var cooki_lang=$.cookie("userLanguage");
					if(cooki_lang=="en_GB"){
						lang_="en";
					}
					else {
						lang_="ar";
					}
				$(\'#elfinder\').elfinder({ 
					url : "php/connector.minimal.php?id='.$id.'&level='.$level.'&todid='.$link.'",
						lang : lang_,
						handlers : {
					   dblclick : function(event, elfinderInstance) {
							//console.log("dddd");
					      event.preventDefault();
					      //var f= files;
					     // console.log(files);
					      elfinderInstance.exec(\'getfile\')
					        .done(function() {  })
					        .fail(function() { elfinderInstance.exec(\'open\'); });
					    }
					  },
					  getFileCallback : function(files, fm) {
					  	var pathh=files.path;
					  	console.log(files.path);
					  	if(pathh.indexOf(\'doc\') > -1)
						{
						  window.open("https://view.officeapps.live.com/op/view.aspx?src=http://'.$host.'/elawyerfinal/elfinder/files/"+files.path+"&embedded=true", "_blank");
						}
						else {
							
							 window.open("http://'.$host.'/elawyerfinal/elfinder/files/"+files.path, "_blank");
						}
					    return false;
					  }
					
				});
			});
		</script>
	</head>
	<body>

		<!-- Element where elFinder will be created (REQUIRED) -->
		<div id="elfinder"></div>

	</body>
</html>';


}


if((isset($_GET['level'])) && (isset($_GET['todid'])) && (!isset($_GET['alarm'])) && (isset($_GET['archive']) )) {
$id=$_GET['id'];
$level=$_GET['level'];

$todid=$_GET['todid'];
 $case= getArchiveCaseById($todid);
    $link=$office.'/'.$case[0]['lawyer_id'] . '/Archived/'.$case[0]['ID'].'_'.replace_($case[0]['subject'], ' ', '_')."/";
//echo $todid;
//echo dirname($_SERVER['PHP_SELF']) . '/files/' . $id . '/';
echo '<html>
	<head>
	
		<title>elFinder 2.0</title>

		<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
		<script src="js/jquery.js"></script>
		<script src="js/jquery_ui.js"></script>

		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" href="css/theme.css">

		<!-- elFinder JS (REQUIRED) -->
		<script src="js/elfinder.min.js"></script>
		<script src="js/i18n/elfinder.ar.js"></script>

		<!-- elFinder translation (OPTIONAL) -->


		<!-- elFinder initialization (REQUIRED) -->
		<script src="../JS/jquery.cookie.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				var lang_="";
				var cooki_lang=$.cookie("userLanguage");
					if(cooki_lang=="en_GB"){
						lang_="en";
					}
					else {
						lang_="ar";
					}
				$(\'#elfinder\').elfinder({ 
					url : "php/connector.minimal.php?id='.$id.'&level='.$level.'&todid='.$link.'",
						lang : lang_,
						handlers : {
					   dblclick : function(event, elfinderInstance) {
							//console.log("dddd");
					      event.preventDefault();
					      //var f= files;
					     // console.log(files);
					      elfinderInstance.exec(\'getfile\')
					        .done(function() {  })
					        .fail(function() { elfinderInstance.exec(\'open\'); });
					    }
					  },
					  getFileCallback : function(files, fm) {
					  	var pathh=files.path;
					  	console.log(files.path);
					  	if(pathh.indexOf(\'doc\') > -1)
						{
						  window.open("https://view.officeapps.live.com/op/view.aspx?src=http://'.$host.'/elawyerfinal/elfinder/files/"+files.path+"&embedded=true", "_blank");
						}
						else {
							
							 window.open("http://'.$host.'/elawyerfinal/elfinder/files/"+files.path, "_blank");
						}
					    return false;
					  }
					
				});
			});
		</script>
	</head>
	<body>

		<!-- Element where elFinder will be created (REQUIRED) -->
		<div id="elfinder"></div>

	</body>
</html>';


}

if((isset($_GET['level'])) && (isset($_GET['todid'])) && (isset($_GET['alarm']))  && (!isset($_GET['archive']) ) ){
$id=$_GET['id'];
$level=$_GET['level'];

$todid=$_GET['todid'];
//echo $todid;
 $alarm= getAlarmById($todid);
 //print_r($alarm);
    $link=$office.'/'.$alarm['lawyer_id'] . '/Alarm_'.$alarm['ID'].'_'.replace_($alarm['subject'], ' ', '_')."/";
//echo $todid;
//echo dirname($_SERVER['PHP_SELF']) . '/files/' . $id . '/';
echo '<html>
	<head>
	
		<title>elFinder 2.0</title>

		<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
		<script src="js/jquery.js"></script>
		<script src="js/jquery_ui.js"></script>

		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" href="css/theme.css">

		<!-- elFinder JS (REQUIRED) -->
		<script src="js/elfinder.min.js"></script>
		<script src="js/i18n/elfinder.ar.js"></script>

		<!-- elFinder translation (OPTIONAL) -->


		<!-- elFinder initialization (REQUIRED) -->
		<script src="../JS/jquery.cookie.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				var lang_="";
				var cooki_lang=$.cookie("userLanguage");
					if(cooki_lang=="en_GB"){
						lang_="en";
					}
					else {
						lang_="ar";
					}
				$(\'#elfinder\').elfinder({ 
					url : "php/connector.minimal.php?id='.$id.'&level='.$level.'&todid='.$link.'",
					lang : lang_,
						handlers : {
					   dblclick : function(event, elfinderInstance) {
							//console.log("dddd");
					      event.preventDefault();
					      //var f= files;
					     // console.log(files);
					      elfinderInstance.exec(\'getfile\')
					        .done(function() {  })
					        .fail(function() { elfinderInstance.exec(\'open\'); });
					    }
					  },
					  getFileCallback : function(files, fm) {
					  	var pathh=files.path;
					  	console.log(files.path);
					  	if(pathh.indexOf(\'doc\') > -1)
						{
						  window.open("https://view.officeapps.live.com/op/view.aspx?src=http://'.$host.'/elawyerfinal/elfinder/files/"+files.path+"&embedded=true", "_blank");
						}
						else {
							
							 window.open("http://'.$host.'/elawyer/elfinderfinal/files/"+files.path, "_blank");
						}
					    return false;
					}
				});
				
			});
		</script>
	</head>
	<body>

		<!-- Element where elFinder will be created (REQUIRED) -->
		<div id="elfinder"></div>

	</body>
</html>';


}


if((isset($_GET['level'])) && (isset($_GET['todid'])) && (isset($_GET['alarm']))  && (isset($_GET['archive']) )){
$id=$_GET['id'];
$level=$_GET['level'];

$todid=$_GET['todid'];
//echo $todid;
 $alarm= getArchiveAlarmById($todid);
 //print_r($alarm);
    $link=$office.'/'.$alarm['lawyer_id'] . '/Archived/Alarm_'.$alarm['ID'].'_'.replace_($alarm['subject'], ' ', '_')."/";
//echo $todid;
//echo dirname($_SERVER['PHP_SELF']) . '/files/' . $id . '/';
echo '<html>
	<head>
	
		<title>elFinder 2.0</title>

		<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
		<script src="js/jquery.js"></script>
		<script src="js/jquery_ui.js"></script>

		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" href="css/theme.css">

		<!-- elFinder JS (REQUIRED) -->
		<script src="js/elfinder.min.js"></script>
		<script src="js/i18n/elfinder.ar.js"></script>

		<!-- elFinder translation (OPTIONAL) -->


		<!-- elFinder initialization (REQUIRED) -->
		<script src="../JS/jquery.cookie.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				var lang_="";
				var cooki_lang=$.cookie("userLanguage");
					if(cooki_lang=="en_GB"){
						lang_="en";
					}
					else {
						lang_="ar";
					}
				$(\'#elfinder\').elfinder({ 
					url : "php/connector.minimal.php?id='.$id.'&level='.$level.'&todid='.$link.'",
					lang : lang_,
						handlers : {
					   dblclick : function(event, elfinderInstance) {
							//console.log("dddd");
					      event.preventDefault();
					      //var f= files;
					     // console.log(files);
					      elfinderInstance.exec(\'getfile\')
					        .done(function() {  })
					        .fail(function() { elfinderInstance.exec(\'open\'); });
					    }
					  },
					  getFileCallback : function(files, fm) {
					  	var pathh=files.path;
					  	console.log(files.path);
					  	if(pathh.indexOf(\'doc\') > -1)
						{
						  window.open("https://view.officeapps.live.com/op/view.aspx?src=http://'.$host.'/elawyerfinal/elfinder/files/"+files.path+"&embedded=true", "_blank");
						}
						else {
							
							 window.open("http://'.$host.'/elawyerfinal/elfinder/files/"+files.path, "_blank");
						}
					    return false;
					}
				});
				
			});
		</script>
	</head>
	<body>

		<!-- Element where elFinder will be created (REQUIRED) -->
		<div id="elfinder"></div>

	</body>
</html>';


}

if((isset($_GET['customer'])) && (isset($_GET['todid'])) && (!isset($_GET['alarm'])) && (!isset($_GET['archive']))  ){
$id=$_GET['id'];
//$level=$_GET['level'];

$todid=$_GET['todid'];
 $case= getCaseById($todid);
    $link=$office.'/'.$case[0]['lawyer_id'] . '/'.$case[0]['ID'].'_'.replace_($case[0]['subject'], ' ', '_')."/";
//echo $todid;
//echo dirname($_SERVER['PHP_SELF']) . '/files/' . $id . '/';
echo '<html>
	<head>
	
		<title>elFinder 2.0</title>

		<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
		<script src="js/jquery.js"></script>
		<script src="js/jquery_ui.js"></script>

		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" href="css/theme.css">

		<!-- elFinder JS (REQUIRED) -->
		<script src="js/elfinder.min.js"></script>
		<script src="js/i18n/elfinder.ar.js"></script>

		<!-- elFinder translation (OPTIONAL) -->


		<!-- elFinder initialization (REQUIRED) -->
		<script src="../JS/jquery.cookie.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				var lang_="";
				var cooki_lang=$.cookie("userLanguage");
					if(cooki_lang=="en_GB"){
						lang_="en";
					}
					else {
						lang_="ar";
					}
				$(\'#elfinder\').elfinder({ 
					url : "php/connector.minimal.php?id='.$id.'&level=1&todid='.$link.'",
						lang : lang_,
						handlers : {
					   dblclick : function(event, elfinderInstance) {
							//console.log("dddd");
					      event.preventDefault();
					      //var f= files;
					     // console.log(files);
					      elfinderInstance.exec(\'getfile\')
					        .done(function() {  })
					        .fail(function() { elfinderInstance.exec(\'open\'); });
					    }
					  },
					  getFileCallback : function(files, fm) {
					  	var pathh=files.path;
					  	console.log(files.path);
					  	if(pathh.indexOf(\'doc\') > -1)
						{
						  window.open("https://view.officeapps.live.com/op/view.aspx?src=http://'.$host.'/elawyerfinal/elfinder/files/"+files.path+"&embedded=true", "_blank");
						}
						else {
							
							 window.open("http://'.$host.'/elawyerfinal/elfinder/files/"+files.path, "_blank");
						}
					    return false;
					  }
					
				});
			});
		</script>
	</head>
	<body>

		<!-- Element where elFinder will be created (REQUIRED) -->
		<div id="elfinder"></div>

	</body>
</html>';


}


if((isset($_GET['customer'])) && (isset($_GET['todid'])) && (!isset($_GET['alarm'])) && (isset($_GET['archive']))  ){
$id=$_GET['id'];
//$level=$_GET['level'];

$todid=$_GET['todid'];
 $case= getArchiveCaseById($todid);
    $link=$office.'/'.$case[0]['lawyer_id'] . '/Archived/'.$case[0]['ID'].'_'.replace_($case[0]['subject'], ' ', '_')."/";
//echo $todid;
//echo dirname($_SERVER['PHP_SELF']) . '/files/' . $id . '/';
echo '<html>
	<head>
	
		<title>elFinder 2.0</title>

		<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
		<script src="js/jquery.js"></script>
		<script src="js/jquery_ui.js"></script>

		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" href="css/theme.css">

		<!-- elFinder JS (REQUIRED) -->
		<script src="js/elfinder.min.js"></script>
		<script src="js/i18n/elfinder.ar.js"></script>

		<!-- elFinder translation (OPTIONAL) -->


		<!-- elFinder initialization (REQUIRED) -->
		<script src="../JS/jquery.cookie.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				var lang_="";
				var cooki_lang=$.cookie("userLanguage");
					if(cooki_lang=="en_GB"){
						lang_="en";
					}
					else {
						lang_="ar";
					}
				$(\'#elfinder\').elfinder({ 
					url : "php/connector.minimal.php?id='.$id.'&level=1&todid='.$link.'",
						lang : lang_,
						handlers : {
					   dblclick : function(event, elfinderInstance) {
							//console.log("dddd");
					      event.preventDefault();
					      //var f= files;
					     // console.log(files);
					      elfinderInstance.exec(\'getfile\')
					        .done(function() {  })
					        .fail(function() { elfinderInstance.exec(\'open\'); });
					    }
					  },
					  getFileCallback : function(files, fm) {
					  	var pathh=files.path;
					  	console.log(files.path);
					  	if(pathh.indexOf(\'doc\') > -1)
						{
						  window.open("https://view.officeapps.live.com/op/view.aspx?src=http://'.$host.'/elawyerfinal/elfinder/files/"+files.path+"&embedded=true", "_blank");
						}
						else {
							
							 window.open("http://'.$host.'/elawyerfinal/elfinder/files/"+files.path, "_blank");
						}
					    return false;
					  }
					
				});
			});
		</script>
	</head>
	<body>

		<!-- Element where elFinder will be created (REQUIRED) -->
		<div id="elfinder"></div>

	</body>
</html>';


}


if((isset($_GET['customer'])) && (isset($_GET['todid'])) && (isset($_GET['alarm'])) && (!isset($_GET['archive']))){
$id=$_GET['id'];
//$level=$_GET['level'];

$todid=$_GET['todid'];
//echo $todid;
 $alarm= getAlarmById($todid);
 //print_r($alarm);
    $link=$office.'/'.$alarm['lawyer_id'] . '/Alarm_'.$alarm['ID'].'_'.replace_($alarm['subject'], ' ', '_')."/";
//echo $todid;
//echo dirname($_SERVER['PHP_SELF']) . '/files/' . $id . '/';
echo '<html>
	<head>
	
		<title>elFinder 2.0</title>

		<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
		<script src="js/jquery.js"></script>
		<script src="js/jquery_ui.js"></script>

		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" href="css/theme.css">

		<!-- elFinder JS (REQUIRED) -->
		<script src="js/elfinder.min.js"></script>
		<script src="js/i18n/elfinder.ar.js"></script>

		<!-- elFinder translation (OPTIONAL) -->


		<!-- elFinder initialization (REQUIRED) -->
		<script src="../JS/jquery.cookie.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				var lang_="";
				var cooki_lang=$.cookie("userLanguage");
					if(cooki_lang=="en_GB"){
						lang_="en";
					}
					else {
						lang_="ar";
					}
				$(\'#elfinder\').elfinder({ 
					url : "php/connector.minimal.php?id='.$id.'&level=1&todid='.$link.'",
					lang : lang_,
						handlers : {
					   dblclick : function(event, elfinderInstance) {
							//console.log("dddd");
					      event.preventDefault();
					      //var f= files;
					     // console.log(files);
					      elfinderInstance.exec(\'getfile\')
					        .done(function() {  })
					        .fail(function() { elfinderInstance.exec(\'open\'); });
					    }
					  },
					  getFileCallback : function(files, fm) {
					  	var pathh=files.path;
					  	console.log(files.path);
					  	if(pathh.indexOf(\'doc\') > -1)
						{
						  window.open("https://view.officeapps.live.com/op/view.aspx?src=http://'.$host.'/elawyerfinal/elfinder/files/"+files.path+"&embedded=true", "_blank");
						}
						else {
							
							 window.open("http://'.$host.'/elawyerfinal/elfinder/files/"+files.path, "_blank");
						}
					    return false;
					}
				});
				
			});
		</script>
	</head>
	<body>

		<!-- Element where elFinder will be created (REQUIRED) -->
		<div id="elfinder"></div>

	</body>
</html>';


}


if((isset($_GET['customer'])) && (isset($_GET['todid'])) && (isset($_GET['alarm'])) && (isset($_GET['archive']))){
$id=$_GET['id'];
//$level=$_GET['level'];

$todid=$_GET['todid'];
//echo $todid;
 $alarm= getArchiveAlarmById($todid);
 //print_r($alarm);
    $link=$office.'/'.$alarm['lawyer_id'] . '/Alarm_'.$alarm['ID'].'_'.replace_($alarm['subject'], ' ', '_')."/";
//echo $todid;
//echo dirname($_SERVER['PHP_SELF']) . '/files/' . $id . '/';
echo '<html>
	<head>
	
		<title>elFinder 2.0</title>

		<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
		<script src="js/jquery.js"></script>
		<script src="js/jquery_ui.js"></script>

		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" href="css/theme.css">

		<!-- elFinder JS (REQUIRED) -->
		<script src="js/elfinder.min.js"></script>
		<script src="js/i18n/elfinder.ar.js"></script>

		<!-- elFinder translation (OPTIONAL) -->


		<!-- elFinder initialization (REQUIRED) -->
		<script src="../JS/jquery.cookie.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				var lang_="";
				var cooki_lang=$.cookie("userLanguage");
					if(cooki_lang=="en_GB"){
						lang_="en";
					}
					else {
						lang_="ar";
					}
				$(\'#elfinder\').elfinder({ 
					url : "php/connector.minimal.php?id='.$id.'&level=1&todid='.$link.'",
					lang : lang_,
						handlers : {
					   dblclick : function(event, elfinderInstance) {
							//console.log("dddd");
					      event.preventDefault();
					      //var f= files;
					     // console.log(files);
					      elfinderInstance.exec(\'getfile\')
					        .done(function() {  })
					        .fail(function() { elfinderInstance.exec(\'open\'); });
					    }
					  },
					  getFileCallback : function(files, fm) {
					  	var pathh=files.path;
					  	console.log(files.path);
					  	if(pathh.indexOf(\'doc\') > -1)
						{
						  window.open("https://view.officeapps.live.com/op/view.aspx?src=http://'.$host.'/elawyerfinal/elfinder/files/"+files.path+"&embedded=true", "_blank");
						}
						else {
							
							 window.open("http://'.$host.'/elawyerfinal/elfinder/files/"+files.path, "_blank");
						}
					    return false;
					}
				});
				
			});
		</script>
	</head>
	<body>

		<!-- Element where elFinder will be created (REQUIRED) -->
		<div id="elfinder"></div>

	</body>
</html>';


}
	?>