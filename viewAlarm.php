 <?php
$users = GetAllUsers();
$casesTypes = getAllCase_Type();

$consultants = getAllConsultant();
$opponents = getAllOpponents();
$missions = getMissionsByCaseId($_GET['id']);
//$events = getEventsByCaseId($_GET['id']);
$alarm = getAlarmByID($_GET['id']);
$customer=  GetCustomerByID($alarm['customer_id']);
//print_r($customer);
$lawyer=GetUserByID($alarm['lawyer_id']);
if($alarm['consultant_id']!=""){
    $consultant=  GetUserByID($alarm['consultant_id']);
}
?>

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
</style>
<script type="text/javascript">
     $(document).ready(function () {
           $("#archive").click(function () {
               var alarmid= <?php echo $_GET['id'];  ?>;
            if(confirm("سوف نقوم بأرشفة الإنذار إضغط 'ok' للمتابعة")){
                $.ajax({
                        type: "get",
                        url: "DBS/archive_alarm.php",
                        data: 'alarmid='+alarmid,
                        success: function (dataa) {
                          // alert(dataa);
                            notif({
                                msg: "لقد تم ارشفة القضية بنجاح",
                                type: "success"
                            });
                            setTimeout(
                               function()
                               {
                                   // window.location.href='index.php?action=mainpage';
                                }, 2000);
                        }
                    });
            }
           });
     });
</script>
<?php include_once "underheader.php"; ?>
         
 <?php include_once 'menu.php'; ?>
    <div class="home-cases-section-02">
      <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading c-list">
            <span class="title"><?php echo $alarm['subject'] ?></span>
            <ul class="pull-left c-controls">
                <li><a href="#" data-placement="top" title="Add Contact"></a></li>
            </ul>
        </div>

          <div class="panel-body">
           <div>            
            <div class="case02-heading" style="direction: rtl;">
              <h5>إنذار للموكل: <?php echo $customer[0]['cfname'].' '.$customer[0]['csname'].' '.$customer[0]['ctname'].' '.$customer[0]['clname'];  ?></h5>
              <button type="button" class="btn btn-success">جارية</button> 
            </div>
            
            <br/>
            
            <div class="case02-tabs">
              <div class="row">
                <div class="col-md-12">
     
        <!-- tabs -->
        <div class="tabbable">
          <ul class="nav nav-tabs nav-justified">
          
           
            <li><a href="#case-tab-05" data-toggle="tab">TOD</a></li>
             <li><a href="#case-tab-02" data-toggle="tab">فواتير</a></li>
              <li class="active "><a href="#case-tab-01" data-toggle="tab">معلومات</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="case-tab-01">
                <div class="panel panel-warning"> 
                            <div class="panel-body" style="direction:rtl;" >
                                <form id="addMission" class="form-horizontal" role="form" action="DBS/updateAlarm.php" method="post">
                                    <input type="hidden" name="cid" id="cid" value='<?php echo $_GET['id'] ;?>' />
                                    <div id="signupalert" style="display:none" class="alert alert-danger">
                                        <p>Error:</p>
                                        <span></span>
                                    </div>
                                    <div class="form-group">
                                        <label style="float: right"  class="col-md-3 control-label">اسم الإنذار</label>
                                        <div class="col-md-9">
                                            <input  required="" type="text" id="caseSubject" value="<?php echo $alarm['subject'] ?>" class="form-control" 
                                                    name="caseSubject" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" style="float: right;"  class="col-md-3 control-label">الموكل</label>
                                        <div class="col-md-9">

                                            <select  disabled="true" class="form-control" id="customerID" name="customerID">
                                                
                                                    <option selected value="<?php echo $alarm['customer_id'] ?>" ><?php echo $customer[0]['cfname'] . " " . $customer[0]['csname'] . " " . $customer[0]['ctname'] . " " . $customer[0]['clname'] ?></option>
                                               
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="float: right" disabled="true" class="col-md-3 control-label">تاريخ البدء</label>
                                        <div class="col-md-9">
                                            <input disabled="true" required="" type="text" value="<?php echo $alarm['startdate'] ?>" id="vcaseStartDate" class="form-control" name="vcaseStartDate" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="float: right" for="firstname" class="col-md-3 control-label">نوع القضبة</label>
                                        <div class="col-md-9">
                                            
                                            <select class="form-control"  id ="caseTypeID" name="caseTypeID">
                                               <?php 
                                                echo getOptions("case_type", "ID", "ctype", $alarm['casetype_id']);
                                               ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="float: right" for="email" class="col-md-3 control-label">المحامي </label>
                                        <div class="col-md-9">
                                            <input type='text' disabled="true" class="form-control" 
                                                   value="<?php echo $lawyer[0]['fname'] . " " . $lawyer[0]['sname'] . " " . $lawyer[0]['tname'] . " " . $lawyer[0]['lname']; ?>" 
                                                   id="lawyer_ID" name="lawyer_ID" id='lawyer_ID'>
                                            <input type='hidden' value="<?php echo $lawyer[0]['ID']; ?>" id="lawyer_ID" name="lawyer_ID" />
                                                  
                                               
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="float: right" for="email" class="col-md-3 control-label">مستشار</label>
                                        <div class="col-md-9">
                                            <?php if(!empty($consultant)){ ?>
                                            <input type="text" class="form-control"  id="consultant_ID" name="consultant_ID">
                                               <input type='text' disabled="true" class="form-control" 
                                                   value="<?php echo $consultant[0]['fname'] . " " . $consultant[0]['sname'] . " " . $consultant[0]['tname'] . " " . $consultant[0]['lname']; ?>" 
                                                   id="lawyer_ID" name="lawyer_ID" id='lawyer_ID'>
                                            <input type='hidden' value="<?php echo $consultant[0]['ID']; ?>" id="lawyer_ID" name="lawyer_ID" />
                                                <?php 
                                                  //  echo getOptionsConsultant("users", "fname", "sname", "lname", $case['consultnat_id']);
                                            }
                                            else {
                                                
                                            }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="float: right" for="email" class="col-md-3 control-label">الخصم</label>
                                        <div class="col-md-9">
                                            <select class="form-control" disabled="true" <?php echo $case['opponent_id'] ?> id="opponents_ID" name="opponents_ID">
                                                <?php
                                                for ($i = 0; $i < count($opponents); $i++) {
                                                    $opponent = $opponents[$i];
                                                    ?>
                                                    <option value="<?php echo $opponent['ID'] ?>"><?php echo $opponent['ofname'] . " " . $opponent['osname'] . " " . $opponent['otname'] . " " . $opponent['olname']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="float: right" for="firstname" class="col-md-3 control-label">الأتعاب </label>
                                        <div class="col-md-9">
                                            <input disabled="true" type="text" value="<?php echo $alarm['price'] ?>" class="form-control" id="price" name="price" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="float: right" for="firstname" class="col-md-3 control-label">وصف </label>
                                        <div class="col-md-9">
                                            <textarea required="" type="text" id="description" 
                                                      class="form-control" name="description" 
                                                      placeholder=""><?php echo $alarm['description'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="float: right" for="firstname" class="col-md-3 control-label">الحالة </label>
                                        <div class="col-md-9">
                                            <select name="status" id="status" class="form-control"> 
                                            <?php 
                                            
                                                if($alarm['status']=="PENDING"){
                                                    echo "<option value='PENDING' selected='selected'>جارية</option>"
                                                    . "<option value='DONE' >منتهية</option>";
                                                }
                                                 if($case['status']=="DONE"){
                                                    echo "<option value='PENDING'>جارية</option>"
                                                    . "<option value='WON'  selected='selected'>منتهية</option>";
                                                }
                                                
                                            ?>
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!-- Button -->                                        
                                        <div class="col-md-offset-3 col-md-9">
                                            <input  type="submit" id="btn-signup" type="button" class="btn btn-primary" value="تحديث">
                                      
                                            <input  id="archive" name="archive" type="button" class="btn btn-warning" value="ارشفة الإنذار">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
            <br/>
            <br/>
            <br/>           
            </div>
            
              <div class="tab-pane" id="case-tab-02">
                     <div class="panel panel-success"> 
                         <div class="panel-body" style="direction:rtl;" >
                         <div class="panel panel-default"> 
                         <div class="panel-body" style="direction:rtl;" ><br/>
                           <div class="embed-responsive embed-responsive-16by9">

                        <iframe class="embed-responsive-item" 
                                src="contractCase.php?id=<?php echo $_GET['id'] ;?>" 
                                width="100%" ></iframe>
                            </div> 
                         </div>
                     </div>
                         </div>
                  </div>
              </div>
              <div class="tab-pane" id="case-tab-03">
                 
               <div class="panel panel-danger"> 
                         <div class="panel-body" style="direction:rtl;" >
                              <br/>
           <table class="table table-hover">
           <thead style="font-weight: bold">
                <td>
                    تاريخ البدء
                </td>
                 <td>
                    تاريخ الإنتهاء
                </td>
                <td>
                    المهمة
                </td>
                <td>
                    القضية
                </td>
                 <td>
                    التفاصيل
                </td>
                <td>
                    أولوية
                </td>
                 <td>
                    الحالة
                </td>
                </thead>
            <tbody>
                <?php
                // lopping on the missions
                for ($i = 0; $i < count($missions); $i++) {
                    $mission = $missions[$i];
                    ?>
                    <tr>
                        <td class="center">
                            <?php echo $mission['startdate'] ?>
                        </td>
                        <td>
                            <?php echo $mission['enddate'] ?>
                        </td>
                        <td>
                            <?php echo $mission['mtype'] ?>
                        </td>
                        <td>
                            <?php echo $mission['subject'] ?>
                        </td>
                        <td>
                            <?php echo $mission['comments'] ?>
                        </td>
                         <td>
                            <?php echo $mission['priority'] ?>
                        </td>
                        <td>
                            <?php 
                                if($mission['status']=="DONE"){
                                     echo "<b><font color='red'>نفذت</font></b>";
                                }
                                else {
                                     echo "<b><font color='orange'>قيد الإنتظار</font></b>";
                                }
                                ?>
                        </td>

                    </tr>
                <?php } 

                ?>
            </tbody>
          </table>
          </div>
              </div>
            </div>
              <div class="tab-pane" id="case-tab-04">
                     <div class="panel panel-primary"> 
                         <div class="panel-body" style="direction:rtl;" ><br/>
                    <table class="table table-hover heavyTable "> 
                        <thead  style="font-weight: bold" 
                            <tr> 
                                <td>تاريخ</td> 
                                <td>القضية</td> 
                                <td>الحدث</td> 
                                <td>الموكل</td> 
                                <td>وقت البدء</td> 
                                <td>وقت الإنتهاء</td>
                                <td>الأتعاب</td>	
                                <td>التفاصيل</td>
                            </tr> 
                        </thead> 
                        <tbody>
                            <?php
                            if (!empty($events))
                                for ($i=0; $i<count ($events);$i++) {
                                    	$event = $events[$i];
                                    ?>
                                    <tr class="default"> 
                                        <td><?php echo $event['datee'] ?></td> 
                                        <td><?php echo $event['subject'] ?></td> 
                                        <td><?php echo $event['event'] ?></td> 
                                        <td><?php echo $event['cfname'] . " " . $event['clname'] ?></td> 
                                        <td><?php echo $event['starttime'] ?></td> 
                                         <td><?php echo $event['endtime'] ?></td>
                                        <td><?php echo $event['price'] ?>دينار</td> 
                                        <td><?php echo $event['comments'] ?></td> 
                                        
                                    </tr> 
                                <?php } 
                                $level= $_SESSION['user']['level_ID'];
                                $idd=$_SESSION['user']['idd'];
                                
                                ?>
                        </tbody> 
                    </table>
                </div>
                </div>     
              </div>
              <div class="tab-pane" id="case-tab-05">
                     <div class="panel panel-default"> 
                         <div class="panel-body" style="direction:rtl;" ><br/>
                           <div class="embed-responsive embed-responsive-16by9">

                        <iframe class="embed-responsive-item" 
                                src="elfinder/elfinder.php?alarm=yes&id=<?php echo $idd."&level=".$level; ?>&todid=<?php echo $_GET['id'] ;?>" 
                                width="100%" ></iframe>
                            </div> 
                         </div>
                     </div>
                  
              </div>
           </div>
        </div>
    </div>
              </div>
           </div>
           </div>
          </div>
        </div>
     </div>
 </div>
   </div>
 </div>
</div>
</div>