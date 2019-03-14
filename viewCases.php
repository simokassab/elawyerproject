 <?php
 ob_start();
$users = GetAllUsers();
$casesTypes = getAllCase_Type();

$consultants = getAllConsultant();
$opponents = getAllOpponents();
$missionss = getMissionsByCaseId($_GET['id']);
//print_r($missionss);//
$eventss = getEventsByCaseId($_GET['id']);
$executions=getExecutionsByCase($_GET['id']);
$case = getCasesByID($_GET['id']);
$customer_=  GetCustomerByID($case['customer_id']);
//print_r($customer_);
$lawyer=GetUserByID($case['lawyer_id']);
if($case['consultant_id']!=""){
    $consultant=  GetUserByID($case['consultant_id']);
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
<script language="javascript">
        $(document).ready(function () {

            var getUrlParameter = function getUrlParameter(sParam) {
                var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                    sURLVariables = sPageURL.split('&'),
                    sParameterName,
                    i;

                for (i = 0; i < sURLVariables.length; i++) {
                    sParameterName = sURLVariables[i].split('=');

                    if (sParameterName[0] === sParam) {
                        return sParameterName[1] === undefined ? true : sParameterName[1];
                    }
                }
            };

            var tab=getUrlParameter('tab');
            if (tab=='acco') {
              $("#cas").removeClass("active");
              $("#case1").removeClass("active");
              $("#acco").addClass("active");
              $("#accounting1").addClass("active");
            }
            if (tab=='miss') {
              $("#cas").removeClass("active");
              $("#case1").removeClass("active");
              $("#miss").addClass("active");
              $("#missions1").addClass("active");
            }
            if (tab=='even') {
              $("#cas").removeClass("active");
              $("#case1").removeClass("active");
              $("#even").addClass("active");
              $("#events1").addClass("active");
            }
            if (tab=='todd') {
              $("#cas").removeClass("active");
              $("#case1").removeClass("active");
              $("#todd").addClass("active");
              $("#tod1").addClass("active");
            }
            if (tab=='exec') {
              $("#cas").removeClass("active");
              $("#case1").removeClass("active");
              $("#exec").addClass("active");
              $("#execution1").addClass("active");
            }
            if (tab=='cas') {

              $("#cas").addClass("active");
            }

        });
</script>
<script type="text/javascript">
     $(document).ready(function () {
           $("#archive").click(function () {
               var caseid= <?php echo $_GET['id'];  ?>;
            if(confirm("سوف نقوم بأرشفة القضية، إضغط 'ok' للمتابعة")){
                $.ajax({
                        type: "get",
                        url: "DBS/archive_case.php",
                        data: 'caseid='+caseid,
                        success: function (dataa) {
                          // alert(dataa);
                            notif({
                                msg: "لقد تم ارشفة القضية بنجاح",
                                type: "success"
                            });
                            //setTimeout(
                             //  function()
                             //  {
                                //    window.location.href='index.php?action=mainpage';
                             //   }, 2000);
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
            <span class="title"><?php echo $case['subject'] ?></span>
            <ul class="pull-left c-controls">
                <li><a href="#" data-placement="top" title="Add Contact"></a></li>
            </ul>
        </div>
          <div class="panel-body" id='printall'>
           <div>            
            <div class="case02-heading" style="direction: rtl;">
              <h5>قضية للموكل: <?php echo $customer_[0]['cfname'].' '.$customer_[0]['csname'].' '.$customer_[0]['ctname'].' '.$customer_[0]['clname'];  ?></h5>
              <h4>رقم: <?php echo $_GET['id'];  ?></h4>
              <button type="button" class="btn btn-success">جارية</button> 
            </div>
            <br/>
            <div class="case02-tabs">
              <div class="row">
                <div class="col-md-12">
        <!-- tabs -->
        <div class="tabbable">
          <ul class="nav nav-tabs nav-justified">
             <li id='acco'><a href="#accounting1" data-toggle="tab">فواتير</a></li>
             <li id='exec'><a href="#execution1" data-toggle="tab">إجراء التنفيذ</a></li>
            <li id='todd'><a href="#tod1" data-toggle="tab">حافظة المستندات</a></li>
            <li id='miss'><a href="#missions1" data-toggle="tab">أعمال إدارية</a></li>
            <li id='even'><a href="#events1" data-toggle="tab">اجراءات الجلسة</a></li>
              <li id='cas' class='active'><a href="#case1" data-toggle="tab">معلومات</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="case1">
                <div class="panel panel-warning"> 

                            <div class="panel-body" style="direction:rtl;" >
                                <form id="addMission" class="form-horizontal" role="form" action="DBS/updateCase.php" method="post">
                                    <input type="hidden" name="cid" id="cid" value='<?php echo $_GET['id'] ;?>' />
                                    <div id="signupalert" style="display:none" class="alert alert-danger">
                                        <p>Error:</p>
                                        <span></span>
                                    </div>
                                    <div class="form-group">
                                        <label style="float: right"  class="col-md-3 control-label">موضوع الدعوى</label>
                                        <div class="col-md-9">
                                            <input  required="" type="text" id="caseSubject" value="<?php echo $case['subject'] ?>" class="form-control" 
                                                    name="caseSubject" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="float: right" disabled="true" class="col-md-3 control-label">الموكل</label>
                                        <div class="col-md-9">
                                            <input disabled="true" required="" type="text" value="<?php echo $customer_[0]['cfname'] . " " . $customer_[0]['csname'] . " " . $customer_[0]['ctname'] . " " . $customer_[0]['clname'] ?>" id="customerID" class="form-control" name="customerID">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="float: right" disabled="true" class="col-md-3 control-label">تاريخ البدء</label>
                                        <div class="col-md-9">
                                            <input disabled="true" required="" type="text" value="<?php echo $case['startdate'] ?>" id="vcaseStartDate" class="form-control" name="vcaseStartDate" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="float: right" for="firstname" class="col-md-3 control-label">نوع القضبة</label>
                                        <div class="col-md-9">
                                            
                                            <select class="form-control"  id ="caseTypeID" name="caseTypeID">
                                               <?php 
                                                echo getOptions("case_type", "ID", "ctype", $case['casetype_id']);
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
                                            <input disabled="true" type="text" value="<?php echo $case['price'] ?>" class="form-control" id="price" name="price" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="float: right" for="firstname" class="col-md-3 control-label">وصف </label>
                                        <div class="col-md-9">
                                            <textarea required="" type="text" id="description" 
                                                      class="form-control" name="description" 
                                                      placeholder=""><?php echo $case['description'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="float: right" for="firstname" class="col-md-3 control-label">الحالة </label>
                                        <div class="col-md-9">
                                            <select name="status" id="status" class="form-control"> 
                                            <?php 
                                            
                                                if($case['status']=="PENDING"){
                                                    echo "<option value='PENDING' selected='selected'>جارية</option>"
                                                    . "<option value='WON' >رابحة</option>"
                                                    . "<option value='LOOSE'>خاسرة</option>";
                                                }
                                                 if($case['status']=="WON"){
                                                    echo "<option value='PENDING'>جارية</option>"
                                                    . "<option value='WON'  selected='selected'>رابحة</option>"
                                                    . "<option value='LOOSE'>خاسرة</option>";
                                                }
                                                 if($case['status']=="LOOSE"){
                                                    echo "<option value='PENDING' >جارية</option>"
                                                    . "<option value='WON' >رابحة</option>"
                                                    . "<option value='LOOSE' selected='selected'>خاسرة</option>";
                                                }
                                            ?>
                                            </select>      
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!-- Button -->                                        
                                        <div class="col-md-offset-3 col-md-9">
                                            <input  type="submit" id="btn-signup" type="button" class="btn btn-primary" value="تحديث">
                                      
                                            <input  id="archive" name="archive" type="button" class="btn btn-warning" value="ارشفة القضية">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
            <br/>
            <br/>
            <br/>           
            </div>
              <div class="tab-pane" id="accounting1">
                     <div class="panel panel-success"> 
                         <div class="panel-body" style="direction:rtl;" ><br/>
                         <?php         
                            if (isset($_GET['id'])){
                            $id=$_GET['id'];
                            //echo $id;
                            $case=getCaseById($id);
                            $alarm=getAlarmById($id);
                            $archivecase=getArchiveCasesByID($id);
                            $archivealarm=getArchiveAlarmById($id);
                            $merge=array_merge($case, $alarm, $archivecase,$archivealarm);
                            $s=is_multi($merge);
                            $arr=getContractbyCaseId($id);
                            $contracttype=$arr[0]['contract_type'];
                            $customer=GetCustomerByID(getCustomerfromContract($arr[0]['account_ID']));
                             $custid=$customer[0]['ID'];
                            $action=getAccountActionByContractID($arr[0]['ID']);
                        }
                            $loggedUser = $_SESSION['user'];
                            $users = GetAllUsers();
                            $casesss = getAllCases();
                            $casesTypes = getAllCase_Type();
                            $lawyers = getAllLawyers();
                            $consultants = getAllConsultant();
                            $opponents = getAllOpponents();
                            $missions = getMissions($loggedUser['idd'], $loggedUser['level_ID']);
                            $events = getEvents($loggedUser['idd'], $loggedUser['level_ID']);
                        ?>
                      <div class="right-section-02 margin-botm-25 home-bill-table">
                      <div class="panel panel-default">
                    
                          <div class="panel-heading c-list" style="direction: rtl;">
                              <span class="title">
                              كشف حساب خاص ل:
                              <b> <?php echo $customer[0]['cfname']." ". $customer[0]['csname']." ".$customer[0]['ctname']." ".$customer[0]['clname'];
                            ?>
                            </b>
                               </span> 
                               <a href="#" data-toggle="modal" data-placement="top" class='tooltipp' data-target="#addActionByCase" title='إضافة مهام'><span  class="glyphicon glyphicon-plus" style="color: #FC960F; float:left; text-align:right;"></span></a>
                            </div>
                          <div class="panel-body">
                              <div class="form-group" id='printdiv' >
                                   <div class="table-responsive">
                                    <table style="direction: rtl" class="table table-striped table-bordered table-hover table-condensed">
                                    <thead>
                                        <tr  class="modal-header-warning">
                                        <td style="font-size: small;"> رقم العقد</td>
                                        <td style="font-size: small;">نوع العقد </td>
                                        <td style="font-size: small;"> الأتعاب </td>
                                        <td style="font-size: small;">المدفوع </td>
                                        <td style="font-size: small;">الرسوم </td>
                                        <td style="font-size: small;">االرسوم المدفوعة</td>
                                        <td style="font-size: small;">التاريخ </td>
                                        <td style="font-size: small;">البيان </td>
                                        <td style="font-size: small;"> ملاحظات (رقم السند)</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                           $s=is_multi($merge);
                                           if($s=='nok'){
                                        ?>
                                    <tr class="info">
                                        <td style="font-size: small;"> <?php echo $merge['ID']; ?> </td>
                                        <td style="font-size: small;">مقدم </td>
                                        <td style="font-size: small;"><?php echo $merge['price'] ;?> </td>
                                        <td style="font-size: small;"> </td>
                                        <td style="font-size: small;"> </td>
                                        <td style="font-size: small;"> </td>
                                        <td style="font-size: small;"> <?php echo $merge['startdate'] ?> </td>
                                        <td style="font-size: small;">  </td>
                                        <td style="font-size: small;">  </td>
                                    </tr>
                                        <?php
                                             $arr=getContractbyCaseId($merge['ID']);
                                            $contracttype=$arr[0]['contract_type'];
                                            $action=getAccountActionByContractID($arr[0]['ID']);
                                        foreach ($action as $s) {
                                            ?>
                                    <tr>
                                            <td style="font-size: small;"> <?php echo $s['ID'] ?> </td>
                                            <td style="font-size: small;">  </td>
                                            <td style="font-size: small;">  </td>
                                            <td style="font-size: small;">  <?php if($s['paid']!=0) echo $s['paid'] ?>  </td>
                                            <td style="font-size: small;">  <?php if($s['fees_cost']!=0) echo $s['fees_cost'] ?>  </td>
                                            <td style="font-size: small;">  <?php if($s['paid_fees']!=0) echo $s['paid_fees'] ?>  </td>
                                            <td style="font-size: small;">  <?php echo $s['ac_date'] ?>  </td>
                                            <td style="font-size: small;">  <?php echo $s['comments'] ?>  </td>
                                            <td style="font-size: small;">  <?php echo $s['comments'] ?>  </td>
                                    </tr>  
                                   <?php 
                                        }
                                }
                                else {
                                ?>
                                <tr class="info"> 
                                        <td style="font-size: small;"> <?php echo $merge[0]['ID']; ?> </td>
                                        <td style="font-size: small;">مقدم </td>
                                        <td style="font-size: small;"><?php echo $merge[0]['price'] ;?> </td>
                                        <td style="font-size: small;"> </td>
                                        <td style="font-size: small;"> </td>
                                        <td style="font-size: small;"> </td>
                                        <td style="font-size: small;"> <?php echo $merge[0]['startdate'] ?> </td>
                                        <td style="font-size: small;">  </td>
                                        <td style="font-size: small;">  </td>
                                    </tr>
                                        <?php
                                             $arr=getContractbyCaseId($merge[0]['ID']);
                                            $contracttype=$arr[0]['contract_type'];
                                            $action=getAccountActionByContractID($arr[0]['ID']);
                                        foreach ($action as $s) {
                                            ?>
                                    <tr>
                                            <td style="font-size: small;"> <?php echo $s['ID'] ?> </td>
                                            <td style="font-size: small;">  </td>
                                            <td style="font-size: small;">  </td>
                                            <td style="font-size: small;">  <?php if($s['paid']!=0) echo $s['paid'] ?>  </td>
                                            <td style="font-size: small;">  <?php if($s['fees_cost']!=0) echo $s['fees_cost'] ?>  </td>
                                            <td style="font-size: small;">  <?php if($s['paid_fees']!=0) echo $s['paid_fees'] ?>  </td>
                                            <td style="font-size: small;">  <?php echo $s['ac_date'] ?>  </td>
                                            <td style="font-size: small;">  <?php echo $s['comments'] ?>  </td>
                                            <td style="font-size: small;">  <?php echo $s['comments'] ?>  </td>
                                    </tr>
                                    <?php }
                                    }?>
                                <tr class="danger">
                                        <td style="font-size: small;">المجموع</td>
                                        <td style="font-size: small;"></td>
                                        <td style="font-size: small;"><?php echo getAllPrices($custid) ?></td>
                                        <td style="font-size: small;"><?php echo getAllPaid($custid) ?></td>
                                        <td style="font-size: small;"><?php echo getAllfees($custid) ?></td>
                                        <td style="font-size: small;"><?php echo getAllPaidfees($custid) ?></td>
                                        <td style="font-size: small;"></td>
                                        <td style="font-size: small;"></td>
                                        <td style="font-size: small;"></td>
                                </tr> 
                                    </tbody>
                                </table>
                                   </div>
                          <table class="table" >
                                <tr>
                                     <td style="float: right;font-size: small;">
                                       : الأتعاب
                                    </td>
                                    <td style="float: right;font-size: small;">
                                        <?php 
                                        if($custid==""){
                                             echo getAllPrices($case[0]['customer_id']);
                                        }
                                        else {
                                             echo getAllPrices($custid);
                                        }
                                        
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="float: right;font-size: small;">
                                     :   المدفوع
                                    </td>
                                    <td style="float: right;font-size: small;">
                                        <?php 
                                        if($custid==""){
                                            echo getAllPaid($case[0]['customer_id'])   ;
                                        }
                                        else {
                                               echo getAllPaid($custid)   ;
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                     <td style="float: right; font-size: small;">
                                       : المتبقي
                                    </td>
                                    <td style="float: right; font-size: small;">
                                        <?php 
                                         if($custid==""){
                                             echo getAllPrices($case[0]['customer_id']) - getAllPaid($case[0]['customer_id']); 
                                         }
                                         else {
                                             echo getAllPrices($custid) - getAllPaid($custid); 
                                         }
                                        
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="float: right; font-size: small;">
                                       : الرسوم
                                    </td>
                                    <td style="float: right; font-size: small;">
                                        <?php 
                                          if($custid==""){
                                             echo getAllfees($case[0]['customer_id']) - getAllPaidfees($case[0]['customer_id']) ;
                                          }
                                          else {
                                              echo getAllfees($custid) - getAllPaidfees($custid) ;
                                          }
                                          ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                         <input type="button" value="طباعة" class="form-control btn-success" id="printt" name="printt">
                         
                          </div>
                        </div>
                     </div>
                     </div>
                   </div>
                 </div>
              <div class="tab-pane" id="missions1">
               <div class="panel panel-danger"> 
                         <div class="panel-body" style="direction:rtl;" id='print_mission' >
                         <ul class="pull-left c-controls">
                    <a href="#" data-toggle="modal" data-placement="top" class='tooltipp' data-target="#addMissionByCase" title='إضافة مهام'>
                            <span  class="glyphicon glyphicon-plus" style="color: #FC960F;"></span></a>
                </ul>
                              <br/>

           <table class="table table-hover">
                      <thead>
                <td>
                   رقم
                </td>
                 <td>
                    تاريخ
                </td>
                <td>
                    تعليق
                </td>
                <td>
                    المسؤول
                </td>
                 <td>
                    المشاركون
                </td>
                 <td>
                    الأهمية
                </td>
                 <td>
                    الحالة
                </td>
            </thead>
            <tbody>
                <?php
                $c=array();
                if(!empty($missionss)){
                $today= new DateTime();
                $dif="";
               $count=count($missionss);
                for ($i = 0; $i < $count; $i++) {
                   $mission = $missionss[$i];
                   $datem=new DateTime($mission['enddate']);
                   $interval = $today->diff($datem);
                   if($today > $datem){
                        $dif= ($interval->days *-1) ;
                   }
                   else {
                        $dif= ($interval->days *1);
                   }
                  // echo $dif;
                   if($dif<-0){
                 //   echo $dif;
                        if($mission['status']=='DONE')// past date and mission done
                            echo "<tr style='background-color: #00C875; color: white;' >";
                        else
                            echo "<tr style='background-color: #E2445C; font-weight:bold; color: white;'>";
                        ?>
                            <td>
                            <?php echo $i+1;?>
                            </td>
                            <td class="center">
                                <?php echo $mission['enddate'] ?>
                            </td>
                            <td >
                                <?php echo $mission['comments'] ?>
                            </td>
                            <td>
                                <?php 
                                    $s=array();
                                    $s=  GetUserByID($mission['to_user_id']);
                                        
                                    echo $s[0]['fname']." ".$s[0]['lname'] ?>
                            </td>
                            <td>
                                <?php 
                                $part=$mission['participants'];
                                if (strpos($part, ',') !== false) {
                                   $p=array();
                                    $participant='';
                                    $p=explode(',', $part);
                                    foreach($p as $pp) {
                                        //$uss=GetUserByID($pp);
                                        $participant.=$pp.'<br/>';
                                        
                                    }
                                    echo $participant;
                                }
                                else {
                                    echo $part;
                                }
                                ?>
                            </td>
                             <td>

                                <?php 
                                 if($mission['priority']=='مرتفع'){
                                     echo "<b><font color='red'>".$mission['priority']."</font></b>";
                                 }
                                 else {
                                echo $mission['priority'];
                                }?>
                            </td>
                              <td><span>
                                <?php 
                                   if($mission['status']=='DONE') {// past date and mission done
                                        echo "نفذت";
                                    }
                                    else {
                                        echo "عالقة"; 
                                    }
                                ?>
                                  </span> </td>
                        </tr>
                    <?php 
                   }
                  if ( ($dif ==0) )  {
                  //  echo $dif;
                        if($mission['status']=='DONE')// past date and mission done
                            echo "<tr  style='background-color: #00C875; font-weight:bold;'>";
                        else
                            echo "<tr style='background-color: #46A2D1; font-weight:bold; color: white;'>";
                        ?>
                        <td>
                            <?php echo $i+1;?>
                            </td>
                            <td class="center">
                                <?php echo $mission['enddate'] ?>
                            </td>
                            <td >
                                <?php echo $mission['comments'] ?>
                            </td>
                            
                            <td>
                                <?php 
                                    $s=array();
                                    $s=  GetUserByID($mission['to_user_id']);
                                        
                                    echo $s[0]['fname']." ".$s[0]['lname'] ?>
                            </td>
                            <td>
                                <?php 
                                $part=$mission['participants'];
                                if (strpos($part, ',') !== false) {
                                   $p=array();
                                    $participant='';
                                    $p=explode(',', $part);
                                    foreach($p as $pp) {
                                        //$uss=GetUserByID($pp);
                                        $participant.=$pp.'<br/>';
                                        
                                    }
                                    echo $participant;
                                }
                                else {
                                    echo $part;
                                }
                                ?>
                            </td>
                             <td>

                                <?php 
                                 if($mission['priority']=='مرتفع'){
                                     echo "<b><font color='red'>".$mission['priority']."</font></b>";
                                 }
                                 else {
                                echo $mission['priority'];
                                }?>
                            </td>
                              <td><span>
                                <?php 
                                   if($mission['status']=='DONE') {// past date and mission done
                                        echo "نفذت";
                                    }
                                    else {
                                        echo "متداولة"; 
                                    }
                                ?>
                                  </span> </td>
                        </tr>
                <?php 

                  }
                  if ($dif > 0)  {
                    if($mission['status']=='DONE')// past date and mission done
                            echo "<tr style='background-color: #00C875; color: white;'>";
                        else
                            echo "<tr style='background-color: #FDAB3D;  color: white;'>";
                        ?>
                        <td>
                            <?php echo $i+1;?>
                            </td>
                           <td class="center">
                                <?php echo $mission['enddate'] ?>
                            </td>
                            <td >
                                <?php echo $mission['comments'] ?>
                            </td>
                            
                            <td>
                                <?php 
                                    $s=array();
                                    $s=  GetUserByID($mission['to_user_id']);
                                        
                                    echo $s[0]['fname']." ".$s[0]['lname'] ?>
                            </td>
                            <td>
                                <?php 
                                $part=$mission['participants'];
                                if (strpos($part, ',') !== false) {
                                   $p=array();
                                    $participant='';
                                    $p=explode(',', $part);
                                    foreach($p as $pp) {
                                        //$uss=GetUserByID($pp);
                                        $participant.=$pp.'<br/>';
                                        
                                    }
                                    echo $participant;
                                }
                                else {
                                    echo $part;
                                }
                                ?>
                            </td>
                             <td>

                                <?php 
                                 if($mission['priority']=='مرتفع'){
                                     echo "<b><font color='red'>".$mission['priority']."</font></b>";
                                 }
                                 else {
                                echo $mission['priority'];
                                }?>
                            </td>
                              <td><span>
                                <?php 
                                   if($mission['status']=='DONE') {// past date and mission done
                                        echo "نفذت";
                                    }
                                    else {
                                        echo "متداولة"; 
                                    }
                                ?>
                                  </span> </td>
                        </tr>
                   
                <?php }
                }
           
                }
                else {
                      echo "<tr><td colspan='8'><center>لا يوجد مهام</center></td></tr>";
                }
                ?>
            </tbody>
          </table>
          </div>
          
              </div>
              <input type="button" value="طباعة" class="form-control btn-success " id="printmission">
            </div>
            <div class="tab-pane" id="execution1">
                     <div class="panel-heading">
                     <ul class="pull-left c-controls">
                   
                        <a href="#" data-toggle="modal" data-target="#addExecutionByCase" class='tooltipp' title='إضافة تنفيذ'><span  class="glyphicon glyphicon-plus" style="color: #FC960F;"></span></a>
                      </ul>
                    </div>
                    <div class="panel-body" style="direction:rtl;" id='print_events'><br/>
                    <table class="table table-hover heavyTable "> 
                        <thead  style="font-weight: bold" 
                            <tr> 
                                <td>رقم</td> 
                                <td>تاريخ</td>
                                <td>الإجراء</td> 
                                <td>ملاحظات</td>
                                <td>التاريخ القادم</td>
                            </tr> 
                        </thead> 
                        <tbody>
                            <?php
                            if (!empty($executions))
                                for ($i=0; $i<count ($executions);$i++) {
                                      $exec = $executions[$i];
                                    ?>
                                    <tr class="default"> 
                                        <td class="col-md-1"><?php echo $i+1; ?></td>
                                        <td class="col-md-2"><?php echo  $exec['date'] ?></td> 
                                        <td class="col-md-3"><?php echo substr($exec['execution'], 0, 50) ?></td> 
                                        <td class="col-md-4"><?php echo substr($exec['comments'], 0, 100) ?></td> 
                                        
                                        <td class="col-md-2"><?php echo $exec['nextdate'] ?></td> 
                                    </tr> 
                                <?php } 
                                $level= $_SESSION['user']['level_ID'];
                                $idd=$_SESSION['user']['idd'];
                                ?>
                        </tbody> 
                    </table>
                </div>
                <input type="button" value="طباعة" class="form-control btn-success " id="printevents">
                </div>
              <div class="tab-pane" id="events1">
                     <div class="panel-heading">
                     <ul class="pull-left c-controls">
                   
                        <a href="#" data-toggle="modal" data-target="#addEventByCase" class='tooltipp' title='إضافة حدث'><span  class="glyphicon glyphicon-plus" style="color: #FC960F;"></span></a>
                      </ul>
                    </div>
                    <div class="panel-body" style="direction:rtl;" id='print_events'><br/>
                    <table class="table table-hover heavyTable "> 
                        <thead  style="font-weight: bold" 
                            <tr> 
                                <td>رقم</td> 
                                <td>تاريخ</td> 
                                <td>الوقت</td>
                                <td>الحدث</td> 
                                <td>الجلسة القادمة</td>
                            </tr> 
                        </thead> 
                        <tbody>
                            <?php
                            if (!empty($eventss))
                                for ($i=0; $i<count ($eventss);$i++) {
                                    	$event = $eventss[$i];
                                    ?>
                                    <tr class="default"> 
                                        <td class="col-md-1"><?php echo $i+1; ?></td>
                                        <td class="col-md-2"><?php echo $event['datee'] ?></td> 
                                        <td class="col-md-2"><?php echo $event['starttime'] ?></td> 
                                        <td class="col-md-5"><?php echo substr($event['event'], 0, 50) ?></td> 
                                        <td class="col-md-2"><?php echo $event['nextdate'] ?></td> 
                                    </tr> 
                                <?php } 
                                $level= $_SESSION['user']['level_ID'];
                                $idd=$_SESSION['user']['idd'];
                                ?>
                        </tbody> 
                    </table>
                </div>
                <input type="button" value="طباعة" class="form-control btn-success " id="printevents">
                </div>  
              <div class="tab-pane" id="tod1">
                     <div class="panel panel-default"> 
                         <div class="panel-body" style="direction:rtl;" ><br/>
                           <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" 
                                src="elfinder/elfinder.php?id=<?php echo $idd."&level=".$level; ?>&todid=<?php echo $_GET['id'] ;?>" 
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
<?php ob_flush(); 

include_once 'addActionByCase.php';
include_once 'addExecutionModalByCase.php';

?>
<script src="./JS/jQuery.print.js"></script>

 <script>
        $(document).ready(function () {
            $("#printt").click(function () { 
                $("#printdiv").print({
                    //Use Global styles
                    globalStyles : true,
                    //Add link with attrbute media=print
                    mediaPrint : false,
                    //Print in a hidden iframe
                    iframe : false,
                    //Add this on bottom
                    append : "<br/>By Techoffice!"
                });
            });
            $("#printmission").click(function () { 
                $("#printall").print({
                    //Use Global styles
                    globalStyles : true,
                    //Add link with attrbute media=print
                    mediaPrint : false,
                    //Print in a hidden iframe
                    iframe : false,
                    //Add this on bottom
                    append : "<br/>By Techoffice!"
                });
            });
            $("#printevents").click(function () { 
                $("#printall").print({
                    //Use Global styles
                    globalStyles : true,
                    //Add link with attrbute media=print
                    mediaPrint : false,
                    //Print in a hidden iframe
                    iframe : false,
                    //Add this on bottom
                    append : "<br/>By Techoffice!"
                });
            });
       
        });
    </script>