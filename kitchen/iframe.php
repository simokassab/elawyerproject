<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="4">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<head>
<link href="../CSS/bootstrap.min.css" rel="stylesheet">
         <link href="../CSS/bootstrap-toggle.min.css" rel="stylesheet">
        <link href="../CSS/font-awesome.min.css" rel="stylesheet">
        <link href="../CSS/style.css" rel="stylesheet">
        <script src="../JS/jquery.js"></script>
        <script src="../JS/bootstrap.min.js"></script>
        <script src="../JS/bootstrap-toggle.min.js"></script>

     <style>
         body {
             background-color: #E8EEF1;
         }
th {
  background: steelblue;
  width: 25%;
  font-weight: lighter;
  text-shadow: 0 1px 0 #38678f;
  color: white;
  text-align: center;
  border: 2px solid #38678f;
  box-shadow: inset 0px 1px 2px #568ebd;
  transition: all 0.2s;
  
}

tr {
  border-bottom:1px solid #cccccc;
}
tr:last-child {
  border-bottom: 0px;
}
td  {
  font-size: 18px; 
  text-align:right; 
    border-right: 1px solid #cccccc;
  padding: 4px;
  transition: all 0.2s;
}

        </style>
<script language="javascript">	
		$(document).ready(function () {

				$.ajax({
				url: 'ajax.php',
				dataType: 'json',
				success: function(response) {
					//alert(response);
					if(response==""){
						//alert("dasd");
						$("#listt").append('<tr><td colspan="6"><br/> <h4>NO ORDERS ...</h4></td></li>');
					}
					
					else {
                                            $("#listt").append('<tr><th>الموظف</th><th>الغرفة</th><th>الطلب</th><th>الوقت</th><th>تعليق</th><th>تنفيذ</th></tr>');
                                           
						for (var key in response) {

							$("#listt").append('<tr><td><font color="#FC960F">'+response[key].fname+' '+response[key].lname+'</font><td>'+response[key].room+
										'<td>'+response[key].orderr+'<td>'+response[key].datetimee +' <td>'+response[key].comments+
										'<td><input type="button" class="btn btn-warning btn-sm " style="width:100px; font-weight: bold;" value="نفذت" onClick="Validate('+response[key].ID+')"/></td></li>');
						}
						var audio = new Audio('../JS/notif.mp3');
						//audio.play();

					}
				}
			});
		});
function Validate(id){
	$.ajax({
		type: "get",
		url: "ajax.php",
		data: 'ID='+id,
		cache: false,
		success:  function(data){
       // alert("Settings has been updated successfully.");
        window.location.reload(true);
    }
});
}
	</script> 
	
</head>

<body>
<table class="heavyTable" id="listt">
    </tbody>
    </table>
</body>
</html>