<?php
    $loggedUser = $_SESSION['user'];
    $customers = getAllCustomers();
    $usersss = GetAllUsers();
  //  print_r($users)
    $casesss = getAllCases();
    $casesTypes = getAllCase_Type();
    $lawyers = getAllLawyers();
    $consultants = getAllConsultant();
    $opponents = getAllOpponents();
    $missions = getMissionss($loggedUser['idd'], $loggedUser['level_ID']);
    //print_r($missions);
  //  echo "dasdasd";
    $events = getEvents($loggedUser['idd'], $loggedUser['level_ID']);
       
?>

 <script>
                var missions = <?php echo json_encode($missions); ?> ;
                var cases = <?php echo json_encode($casesss); ?>;
                var events = <?php echo json_encode($events); ?>;
                
   
            </script>
            
<link rel="stylesheet" type="text/css" href="CSS/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="CSS/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="CSS/buttons.dataTables.css">
        <script type="text/javascript" language="javascript" src="JS/jquery.dataTables.js">
	</script>
        <script type="text/javascript" language="javascript" src="JS/dataTables.bootstrap.min.js">
	</script>
        <script type="text/javascript" language="javascript" src="JS/dataTables.buttons.js"></script>
        <script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
        <script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
       
        <script type="text/javascript" language="javascript" src="JS/buttons.html5.js"></script>
	<script type="text/javascript" language="javascript" class="init">
            $(document).ready(function() {
                $('#example').DataTable( {
                    dom: 'Brtip',
                    buttons: [
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5'
                    ]
                } );
            } );
	</script>
        <script language="javascript">
        $(document).ready(function () {
            $("#searchh").click(function () {
                $("#tbodyy").html('<tr><td colspan="9">Loading..</td></tr>');
                var fromm=$("#fromm").val();
                var too=$("#too").val();
                var mtypee=$("#mtypee").val();
                var priorityy=$("#priorityy").val();
                var commentss=$("#commentss").val();
                var statusss=$("#statusss").val();
                var endDate=$("#endDate").val();
                var startDate=$("#startDate").val();
                //alert(statusss);
                    $.ajax({
                        type: "get",
                        url: "DBS/searchmission.php",
                        data: 'fromm='+ fromm + '&too=' + too + '&mtypee=' + mtypee +'&priorityy='+priorityy+
                        '&statusss=' + statusss + '&commentss=' + commentss.trim()+'&endDate='+endDate+'&startDate='+startDate,
                        success: function (dataa) {
                            if(dataa==""){
                               $("#tbodyy").html('<tr><td colspan="9" align="center">لا يوجد</td></tr>'); 
                            }
                            else 
                                $("#tbodyy").html(dataa);
                        }
                    });
            });
        });
    </script>       
<div class="mail-content">
 <div class="container">
   <div class="row">
     <div class="col-sm-12">

     <div class="right-section-03">
         <div class="">
             
             
             <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading c-list" style="direction: rtl;">
              <span class="title" id="quickmissionss">
               المهام
               </span>
            </div>
          <div class="panel-body">
           <div id="latestmissionss">
                     
              <div class="form-group">
               <div class="row">
                  <div class="col-sm-3" style="direction: rtl;">
                 <label for="exampleInputEmail1"> الأهمية</label>
                 <select type="text" class="form-control" id="priorityy" name="priorityy" placeholder=" ">
                    <option value="-1">--</option>
                     <option value="مرتفع">مرتفع</option>
                    <option value="متوسط">متوسط</option>
                    <option value="منخفض">منخفض</option>
                </select>
                 </div>
                 <div class="col-sm-3" style="direction: rtl;">
                 <label for="exampleInputEmail1"> نوع المهمة</label>
                 <select class="form-control"  name="mtypee" id="mtypee">
                                              <option value="-1">--</option>
                                              <option value="خاص">خاص</option>
                                              <option value="تكليف">تكليف</option>
                                               <option value="قضية">قضية</option>
                                          </select>
                 
                 
                 </div>
                 <div class="col-sm-3" style="direction: rtl;">
                     <label for="exampleInputEmail1" >إلى</label>
                     
                     <select  id="too" name="too[]" style="width: 250px;" multiple="multiple" >

                        <?php
                        echo getOptionsMissions("users", "ID","fname", "lname","");
                        ?>
                    </select>
                     
                 </div>
                   <div class="col-sm-3" style="direction: rtl;">
                 <label for="exampleInputEmail1" >من</label><br/>
                 <select  id="fromm" name="fromm[]" style="width: 250px;" multiple="multiple" >

                        <?php
                        echo getOptionsMissions("users", "ID","fname", "lname","");
                        ?>
                    </select>
                 </div>
               </div>
              </div>
              
              <div class="form-group">
               <div class="row">
               
                    <div class="col-sm-3" style="direction: rtl;">
                 <label for="exampleInputEmail1">التعليق</label>
                  <input type="text" class="form-control" name="commentss" id="commentss"  value="<?php if(isset($_POST['company'])) echo $_POST['company']; ?>">    
                 </div>
                  <div class="col-sm-3" style="direction: rtl;">
                 <label for="exampleInputEmail1">الحالة </label>
                 <select class="form-control"   id="statusss">
                     <option value="-1">--</option>
                    <option value="DONE">نفذت</option>
                    <option value="PENDING">قيد الإنتظار</option>
                </select>
                 
                 
                 </div>
                  <div class="col-sm-3" style="direction: rtl;">
                 <label for="exampleInputEmail1">تاريخ الانتهاء </label>
                 
                    <div class="form-group">
                            <input   type="text" id="endDate" class="form-control" name="endDate" placeholder="">
                        </div>
                    
                 
                 </div>
                    <div class="col-sm-3" style="direction: rtl;">
                 <label for="exampleInputEmail1">تاريخ البدء</label>
                 
                    <div class="form-group">
                            <input type="text" id="startDate" class="form-control" name="startDate" placeholder="">
                        </div>
                    
                 
                 </div>
               </div><br/>
                  <div class="form-group">
                      <div class="row">
                         <div style="direction: rtl; text-align: center;">
                   <div > 
                       <button type="button" class="btn btn-primary" id="searchh" style=" width: 200px;" name="submit">بحث</button>
                   </div>
                 </div>
                          </div>
                  </div>
           </div>
     
           <hr/>
           </div>
         
            <div  id="resultss">
                <table id="example" class="display cell-border" cellspacing="0" width="100%">
    <thead>
        <tr>
                <th style="color: #0C97D2;">من</th>
                <th style="color: #0C97D2;" > إلى</th>
                <th style="color: #0C97D2;" >نوع المهمة</th>
                <th style="color: #0C97D2;" >الأهمية</th>
                <th style="color: #0C97D2;" >تاريخ البدء</th>
                <th style="color: #0C97D2;" >تاريخ الإنتهاء</th>
                <th style="color: #0C97D2;" >الحالة</th>
                <th style="color: #0C97D2;" >التعليق</th>
                <th style="color: #0C97D2;" >المشاركين</th>
        </tr>
    </thead>
    <tbody id="tbodyy">
      <?php 
        $con=  connectDB($_SESSION['office']);
        $tbody="";
            mysqli_query($con, "SET NAMES 'utf8'");
            mysqli_query($con, 'SET CHARACTER SET utf8');
            $query = "select * from missions order by enddate";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    $usfrom=  GetUserByID($row['from_user_id']);
                    $usto=  GetUserByID($row['to_user_id']);
                    $tbody.="<tr><td>".$usfrom[0]['fname']." ".$usfrom[0]['lname']."</td>";
                    $tbody.="<td>".$usto[0]['fname']." ".$usto[0]['lname']."</td>";
                    $tbody.="<td>".$row['mtype']."</td>";
                    $tbody.="<td>".$row['priority']."</td>";
                    $tbody.="<td>".$row['startdate']."</td>";
                    $tbody.="<td>".$row['enddate']."</td>";
                    $tbody.="<td>".$row['status']."</td>";
                    $tbody.="<td>".$row['comments']."</td>";
                    $tbody.="<td>".$row['participants']."</td></tr>";
                }
            }
            echo $tbody;
            mysqli_close($con);
      
      ?>
    </tbody>
                </table>
          </div>
          
       
     </div>
             
             
             
         </div></div>
          <br/><br/>
   
     </div>
     
     
     
     </div>
   </div>
 </div>
</div>
 