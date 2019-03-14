<head>

<?php
//require_once ("../e-lawyer/config.php");
//$con = connectDB($_SESSION['office']);
$con = connectDB($_SESSION['office']);


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
            text: 'تقرير حسب نوع القضايا'
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
                    format: '<b>{point.name}</b> {point.y}',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },";
$content.="series: [{
            name: ' ',
            colorByPoint: true,
            data: [";
mysqli_query($con, "SET NAMES 'utf8'");
mysqli_query($con, 'SET CHARACTER SET utf8');
$query="select cases.casetype_id, COUNT(cases.ID) as countt from cases group by cases.casetype_id";
$result = mysqli_query($con, $query);
while ($rows = mysqli_fetch_assoc($result)) {
	$content .= "{name: '".  getTypeById($rows['casetype_id'], 'ctype','case_type')."',
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
