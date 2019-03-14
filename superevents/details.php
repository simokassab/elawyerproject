
<html>
    <head>
<link href="../CSS/bootstrap.min.css" rel="stylesheet">
         <link href="../CSS/bootstrap-toggle.min.css" rel="stylesheet">
        <link href="../CSS/font-awesome.min.css" rel="stylesheet">
        <link href="../CSS/style.css" rel="stylesheet">
        <script src="../JS/jquery.js"></script>
        <script src="../JS/bootstrap.min.js"></script>
        <script src="../JS/bootstrap-toggle.min.js"></script>
        <style>

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
  border-bottom: 2px solid #cccccc;
}
tr:last-child {
  border-bottom: 0px;
}


td  {
  font-size: 13px; 
  text-align:right; 
    border-right: 1px solid #cccccc;
  padding: 4px;
  transition: all 0.2s;
}


        </style>
	<script language="javascript">
		$(document).ready(function () {
			function update() {
			$("#listt").html("");
				$.ajax({
				url: 'ajax.php?action=details',
				dataType: 'json',
				success: function(response) {
					if(response==""){
					$("#listt").append('<thead><tr>		<th colspan="4"><center> لا يوجد </center></th>	</tr>');
					}
					else {
					$("#listt").append('<thead><tr>		<th >الموظف</th>		<th>الحدث</th>		<th>التاريخ</th>		<th class="tdd">إخفاء</th>		</tr></thead><tbody>');
					}
					for (var key in response) {
					
					//alert(response[key].event);
					$("#listt").append('<tr><td>'+response[key].fname+' '+response[key].lname+
										'</td> <td >'+response[key].event+' <td>'+response[key].date +
										' </td><td ><input type="button"  class="btn btn-warning btn-sm " value="إخفاء" onclick="HideIt('+response[key].IDD+')"></td></tr>');
				}
				
				}
				
			});
			window.setTimeout(update, 10000);
		}
		update();
		});
function HideIt(id){
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
