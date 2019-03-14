<?php

$id="";
$arr=array();
$customer=array();
$alarm=array();
$price="";
$actions=array();
$contracttype="";
$case="";
$paid="";
$rem="";
$details="";
$ac_date="";
$feescost="";
$paidfees="";
$remfees="";
$comments="";
$custid="";
$casess=array();
$merge=array();

if(isset($_GET['customer_id'])){
    $custid=$_GET['customer_id'];
    //echo $custid;
    $customer=  GetCustomerByID($custid);
 
    $casess=  getCasesByCustomer($custid);
    $archivecase=getArchivedCasesByCustomer($custid);
    $alarms=getAlarmByCustomer($custid);
    $archivealarm=getArchivedAlarmByCustomer($custid);
    $merge=array_merge($casess, $archivecase, $alarms, $archivealarm);
    //print_r($merge);
    
}

if (isset($_GET['id'])){
   
    $id=$_GET['id'];
    $case=getCaseById($id);
    $alarm=getAlarmById($id);
    $merge=array_merge($case, $alarm);
   // print_r($case);
    $arr=getContractbyCaseId($id);
    //print_r($arr);
    $contracttype=$arr[0]['contract_type'];
   // echo $arr[0]['account_ID'];
    $customer=GetCustomerByID(getCustomerfromContract($arr[0]['account_ID']));
    //echo getCustomerfromContract($arr[0]['account_ID']);
    $action=getAccountActionByContractID($arr[0]['ID']);

}
    $loggedUser = $_SESSION['user'];
    
    $users = GetAllUsers();
    $casesss = getAllCases();
   // $alarm=getAllAlarms();
    $casesTypes = getAllCase_Type();
    $lawyers = getAllLawyers();
    $consultants = getAllConsultant();
    $opponents = getAllOpponents();
    $missions = getMissions($loggedUser['idd'], $loggedUser['level_ID']);
    $events = getEvents($loggedUser['idd'], $loggedUser['level_ID']);
?>
 
<?php include_once "underheader.php"; ?>
<?php include_once 'menu.php'; ?>
         
      <div id='tablee' class="right-section-02 margin-botm-25 home-bill-table">
      <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading c-list" style="direction: rtl;">
              <span class="title">
              كشف حساب خاص ل:
              <b> <?php echo $customer[0]['cfname']." ". $customer[0]['csname']." ".$customer[0]['ctname']." ".$customer[0]['clname'];
            ?>
            </b>
               </span>
               <ul class="pull-left c-controls">
                    <li><a data-toggle="modal" data-target="#addAction"><i class="glyphicon glyphicon-plus"></i></a></li>

                </ul>
            </div>
          <div class="panel-body">
                
              <div class="form-group">
            <?php
                if($custid==""){
            ?>
                   <div class="table-responsive">
                <table style="direction: rtl" class="">
                    <thead>
                    <tr >
                        <td > رقم العقد</td>
                        <td>نوع العقد </td>
                        <td> الأتعاب </td>
                        <td>المدفوع </td>
                        <td>الرسوم </td>
                        <td>االرسوم المدفوعة</td>
                        <td>التاريخ </td>
                        <td>البيان </td>
                        <td> ملاحظات (رقم السند)</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td> <?php echo $id; ?> </td>
                        <td>مقدم </td>
                        <td><?php echo $case[0]['price'] ;?> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> <?php echo $case[0]['startdate'] ?> </td>
                        <td>  </td>
                        <td>  </td>
                    </tr>
                   

                        <?php
                        foreach ($action as $s) {
                            ?>
                    <tr>
                            <td> <?php echo $s['ID'] ?> </td>
                            <td>  </td>
                            <td>  </td>
                            <td>  <?php if($s['paid']!=0) echo $s['paid'] ?>  </td>
                            <td>  <?php if($s['fees_cost']!=0) echo $s['fees_cost'] ?>  </td>
                            <td>  <?php if($s['paid_fees']!=0) echo $s['paid_fees'] ?>  </td>
                            <td>  <?php echo $s['ac_date'] ?>  </td>
                            <td>  <?php echo $s['comments'] ?>  </td>
                            <td>  <?php echo $s['comments'] ?>  </td>
                    </tr>
                            <?php
                            }
               
                ?>
                <tr>
                    <td>المجموع</td>
                        <td></td>
                        
                        <td><?php echo getAllPrices($case[0]['customer_id']) ?></td>
                        <td><?php echo getAllPaid($case[0]['customer_id']) ?></td>
                        <td><?php echo getAllfees($case[0]['customer_id']) ?></td>
                        <td><?php echo getAllPaidfees($case[0]['customer_id']) ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                </tr>
                <?php
                 }
                else {
                            ?>
                    <table style="direction: rtl" class="table table-striped table-bordered table-hover table-condensed">
                    <thead>
                        <tr  class="modal-header-warning">
                        <td > رقم العقد</td>
                        <td>نوع العقد </td>
                        <td> الأتعاب </td>
                        <td>المدفوع </td>
                        <td>الرسوم </td>
                        <td>االرسوم المدفوعة</td>
                        <td>التاريخ </td>
                        <td>البيان </td>
                        <td> ملاحظات (رقم السند)</td>
                    </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($merge as $mergee){
                        ?>
                   
                    <tr>
                        <td> <?php echo $mergee['ID'] ?></td>
                        <td>مقدم </td>
                        <td><?php echo $mergee['price'] ;?> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> <?php echo $mergee['startdate'] ?> </td>
                        <td>  </td>
                        <td>  </td>
                    </tr>
                        <?php
                             $arr=getContractbyCaseId($mergee['ID']);
                            $contracttype=$arr[0]['contract_type'];
                            $action=getAccountActionByContractID($arr[0]['ID']);
                        foreach ($action as $s) {
                            ?>
                    <tr>
                            <td> <?php echo $s['ID'] ?> </td>
                            <td>  </td>
                            <td>  </td>
                            <td>  <?php if($s['paid']!=0) echo $s['paid'] ?>  </td>
                            <td>  <?php if($s['fees_cost']!=0) echo $s['fees_cost'] ?>  </td>
                            <td>  <?php if($s['paid_fees']!=0) echo $s['paid_fees'] ?>  </td>
                            <td>  <?php echo $s['ac_date'] ?>  </td>
                            <td>  <?php echo $s['comments'] ?>  </td>
                            <td>  <?php echo $s['comments'] ?>  </td>
                    </tr>  
                   <?php 
                        }
                }
                
                ?>
                <tr class="danger">
                        <td>المجموع</td>
                        <td></td>
                        <td><?php echo getAllPrices($custid) ?></td>
                        <td><?php echo getAllPaid($custid) ?></td>
                        <td><?php echo getAllfees($custid) ?></td>
                        <td><?php echo getAllPaidfees($custid) ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                </tr>
                    <?php  
                }
                ?>
                
               
                    
                    </tbody>
                </table>
                   </div>
          <table class="table" >

                <tr>
                     <td style="float: right">
                       : الأتعاب

                    </td>
                    <td style="float: right">
                        <?php 
                        if($custid==""){
                             echo getAllPrices($mergee['customer_id']);
                        }
                        else {
                             echo getAllPrices($custid);
                        }
                        
                        ?>
                    </td>
                   

                </tr>
                <tr>
                    <td style="float: right">
                     :   المدفوع

                    </td>
                    <td style="float: right">
                        
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
                     <td style="float: right">
                       : المتبقي

                    </td>
                    <td style="float: right">
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
                    <td style="float: right">
                       : الرسوم

                    </td>
                    <td style="float: right">
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
             
          </div>
          
        </div>
     </div>
     
      <input type="button" value="طباعة" class="form-control btn-success" id="printt" name="printt">
     </div>
   </div>
 </div>
</div>
</div>

<?php 
include_once 'addAction.php';
?>

<script src="./JS/jQuery.print.js"></script>

 <script>
        $(document).ready(function () {
            $("#printt").click(function () { 
                $("#tablee").print({
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

