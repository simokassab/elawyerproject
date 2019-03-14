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
  border-bottom:1px solid #cccccc;
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
        <script>
        $(document).ready(function () {
                var d=0;
                function update() {
                        var s="";
                        var d="";
                $("#listt").html("");
                        $.ajax({
                        url: 'ajax.php?action=users',
                        dataType: 'json',
                        success: function(response) {
                                $("#listt").append('<thead><tr>		<th>الموظف</th>		<th>التاريخ</th>		' +
                                        '<th>ساعة الدخول</th><th>الحالة</th>	<th>وضع </th>	</tr></thead><tbody>');
                                for (var key in response) {
                                //	alert(response[key].firstlogin);
                                        if(response[key].status=="1"){
                                                s="<img src='../images/online.png' width='80px' />";
                                        }
                                        else {
                                                s="<img src='../images/offline.png' width='80px'/>";
                                        }

                                        d++;
                                $("#listt").append('<tr><td>'+response[key].name_+
                                        '</td> <td>'+response[key].date+'</td><td>'
                                        +response[key].firstlogin+'</td><td>'+s +'</td><td>'+response[key].break_status+'</td></tr>');
                        }

                        }

                });
                window.setTimeout(update, 10000);
        }
        update();
        });

	</script> 
</head>

<body>
    <table class="heavyTable" id="listt">
    </tbody>
    </table>
</body>
</html>
