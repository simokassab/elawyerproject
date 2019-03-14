<?php
if (isset($_GET['id'])) {
  $idd=$_GET['id'];
  //$lname = $_POST['lname'];
  $users = GetUserByID($_GET['id']);
}
    $loggedUser = $_SESSION['user'];

    $casesss = getAllCases();
    $casesTypes = getAllCase_Type();
    $lawyers = getAllLawyers();
    $consultants = getAllConsultant();
    $opponents = getAllOpponents();
    $missions = getMissions($loggedUser['idd'], $loggedUser['level_ID']);
    $events = getEvents($loggedUser['idd'], $loggedUser['level_ID']);
          
?>
 <script>
                var missions = <?php echo json_encode($missions); ?> ;
                var cases = <?php echo json_encode($cases); ?>;
                var events = <?php echo json_encode($events); ?>;
            </script>

 <?php include_once "underheader.php"; ?>
    <div class="home-estaff-section">
      <div class="panel panel-default">

          <div class="panel-body">
          
           <div>
              <div class="estaff-section-01">
              
              <div class="row">
              
              <div class="col-sm-6">
                <div class="comment-box">
                  <form>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Comment</label>
                    <textarea class="form-control" rows="3" disabled=""><?php echo $users[0]['description']; ?></textarea>
                  </div>
                </form>
               
                </div>
              </div>
              
              <div class="col-sm-6">
              
                <div class="row">
                  <div class="col-sm-6">
                    <div class="user-detail">
                     <h5><?php echo $users[0]['fname'].' '.$users[0]['lname']; ?></h5>
                     <p><b>الوظيفة: </b> <?php   echo getLevelById($users[0]['level_ID']);           ?></p>
                     <p><b>هاتف: </b><?php echo $users[0]['phone1']; ?></p>
                     <p><b>الغرفة:  </b><?php echo $users[0]['room']; ?></p>
                    </div>
                  </div>
                  <div class="col-sm-6">
                      <div class=""><img class="circular" style="width:130px; height:130px;" src="server/php/files/<?php echo $users[0]['photo']; ?>"/></div>
                  </div>
                </div>
                
              </div>
              
             </div>
            
              </div>
           <!------------------->
           </div>
       
           <hr/>
          
          <div class="estaff-section-02" >
           <div class="row">
               <div class="col-sm-12" >
               <div class="panel panel-default">
                  <div class="panel-heading">
                      <h3 class="panel-title" style="direction: rtl;">إحصائيات</h3>
                  </div>
                  <div class="panel-body">
                    <div id="stats" style="height: 350px;"></div>
                    
                  </div>
                </div>
             </div>
            
           </div>    
          </div> 
           
           <hr/>
           
          
          </div>
          
        </div>
     </div>
     
     </div>
   </div>
 </div>
</div>
</div>
            <?php 
$con = connectDB($_SESSION['office']);
mysqli_query($con, "SET NAMES 'utf8'");
mysqli_query($con, 'SET CHARACTER SET utf8');
$query = "select user, status, SUM(timee) as minutes from user_stats where user =$idd  group by user, status" ;
//echo $query;
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $array[] = $row;
    }
  //  print_r($array);
}
mysqli_close($con);

            echo "
<script type='text/javascript'>
$(function () {

    $(document).ready(function () {

        // Build the chart
        $('#stats').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'إحصائيات المستخدم ',
                useHTML: Highcharts.hasBidiBug
            },
            credits: {
			 text: 'Techoffice.co',
			 href: 'http://techoffice.co'
		},
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>',
                useHTML: Highcharts.hasBidiBug
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: ' ',
                colorByPoint: true,
                reversed: true,
                data: [
                ";
            $data="";
            foreach ($array as $arr){
                $data.="{ name: '".$arr['status']."',";
                $data.="y: ".$arr['minutes']."},";
            }
            $data=rtrim($data, ",");
            $data.="]";
            echo $data;
            echo "
            }]
        });
    });
});
</script>";
 ?>