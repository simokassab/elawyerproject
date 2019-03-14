<head>

<?php
//require_once ("../e-lawyer/config.php");
//$con = connectDB($_SESSION['office']);
$con = connectDB($_SESSION['office']);
function GetFnLnByID($id) {
    $array = array();
    $query = "select fname, lname from users where ID=$id ";
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if ($result) {
     $rows = mysqli_fetch_assoc($result);
            return $rows['fname']." ".$rows['lname'];
    } else {
        return false;
    }
    //mysqli_close($con);
}

//echo GetFnLnByID(2);


$content="<script type='text/javascript'>
 $(function () {
$('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            backgroundColor: '#E8EEF1',
            plotBorderWidth: 1,
            plotShadow: true,
            type: 'pie'
        },
        title: {
            text: 'عدد القضايا لكل محامي'
        },
		credits: {
			 text: 'Techoffice.co',
			 href: 'http://techoffice.co'
		},
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b> {point.percentage:.1f}%',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },";
$content.="series: [{
            name: ' القضايا ',
            colorByPoint: true,
            data: [";
mysqli_query($con, "SET NAMES 'utf8'");
mysqli_query($con, 'SET CHARACTER SET utf8');
$query="select lawyer_id, count(ID) as countt from cases group by lawyer_id";
$result = mysqli_query($con, $query);
while ($rows = mysqli_fetch_assoc($result)) {
	$content .= "{name: '".GetFnLnByID($rows['lawyer_id'])."',
y: ".$rows['countt']." },";
}
$content=substr($content, 0, -1);
$content.="]
		}]
    });
});
</script>";
echo  $content;
	
?>
</head>
<body>
<div id="container" style=" min-width: 710px; height: 500px; max-width: 900px; margin: 0 auto"></div>
</body>
