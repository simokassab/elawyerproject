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
       
?>
            
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
              alert('dd');
                $("#tbodyy").html('<tr><td colspan="9">Loading..</td></tr>');
                var idd= <?php echo $loggedUser['idd']; ?>;
                var fromm=$("#fromm").val();
                var status=$("#statusss").val();
                var subject=$("#subject").val();
                var startDate=$("#startDate").val();
                //alert(statusss);
                    $.ajax({
                        type: "get",
                        url: "DBS/searchnotifications.php",
                        data: 'fromm='+ fromm + '&status=' + status + '&subject=' + subject +'&startDate='+startDate+'&idd='+idd,
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
               الإشعارات
               </span>
            </div>
          <div class="panel-body">
           <div id="latestmissionss">
              <div class="form-group">
               <div class="row">
               <div class="col-sm-3" style="direction: rtl;">
                 <label for="exampleInputEmail1">التاريخ</label>
                 
                    <div class="form-group">
                            <input type="text" id="startDate" class="form-control" name="startDate" placeholder="">
                        </div>
                    
                 
                 </div>
                <div class="col-sm-3" style="direction: rtl;">
                 <label for="exampleInputEmail1">العنوان</label>
                  <input type="text" class="form-control" name="subject" id="subject"  value="<?php if(isset($_POST['subect'])) echo $_POST['subject']; ?>">    
                 </div>
                 <div class="col-sm-3" style="direction: rtl;">
                 <label for="exampleInputEmail1">الحالة </label>
                 <select class="form-control"   id="statusss">
                     <option value="-1">--</option>
                    <option value="READ">مقروء</option>
                    <option value="NOTREAD">غير مقروء</option>
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
                <th style="color: #0C97D2;" >رابط</th>
                <th style="color: #0C97D2;" >العنوان</th>
                <th style="color: #0C97D2;" >الحالة</th>
                <th style="color: #0C97D2;" >التاريخ</th>
        </tr>
    </thead>
    <tbody id="tbodyy">
      <?php 
        $ar=array();
        $ar=getAllNotificationsByID($loggedUser['idd']);
        $tbody="";
          foreach($ar as $arr){
                    $usfrom=  GetUserByID($arr['from']);
                    $usto=  GetUserByID($arr['to']);
                    $tbody.="<tr><td>".$usfrom[0]['fname']." ".$usfrom[0]['lname']."</td>";
                    $tbody.="<td>".$usto[0]['fname']." ".$usto[0]['lname']."</td>";
                    $tbody.="<td><a href='".$arr['url']."' >".$arr['title']." </a></td>";
                    $tbody.="<td>".$arr['title']."</td>";
                    $tbody.="<td>".$arr['status']."</td>";
                    $tbody.="<td>".$arr['date_']."</td></tr>";
                }
            
            echo $tbody;
           
      
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
 