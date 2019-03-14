<link href="../CSS/bootstrap.min.css" rel="stylesheet">
         <link href="../CSS/bootstrap-toggle.min.css" rel="stylesheet">
        <link href="../CSS/font-awesome.min.css" rel="stylesheet">
        <link href="../CSS/style.css" rel="stylesheet">
        <link href="../CSS/jquery.fileupload.css" rel="stylesheet">
        <!-- Latest compiled and minified CSS -->
        <link rel="shortcut icon"  href="./images/logo.ico"/>
        <link href='../CSS/fullcalendar.css' rel='stylesheet' />
        <link href='../CSS/fullcalendar.print.css' rel='stylesheet' media='print' />
        <!-- Optional theme -->
        <link rel="stylesheet" href="../CSS/jquery.datetimepicker.css">
        <link rel="stylesheet" href="../CSS/notifIt.css">
        <link rel="stylesheet" href="../CSS/jquery-ui.css">
        <link rel="stylesheet" href="../CSS/select2.min.css">
        <script src="../JS/jquery.js"></script>
        
        <script src="../JS/jquery-ui-1.10.4.js"></script>
        <script src='../JS/moment.min.js'></script>
        <script src='../JS/notifIt.js'></script>
         <script src="../JS/jquery.datetimepicker.full.js"></script>
        <script src="../JS/bootstrap.min.js"></script>
        <link href="../CSS/fileinput.css" media="all" rel="stylesheet" type="text/css" />
        <script src="../JS/fileinput.js" type="text/javascript"></script>
        <script src="../JS/fileinput_locale_fr.js" type="text/javascript"></script>
        <script src="../JS/fileinput_locale_es.js" type="text/javascript"></script>
        <script src="../JS/bootstrap-toggle.min.js"></script>
        <script src="../JS/jquery.form.js"></script>
        <script src='../JS/fullcalendar.min.js'></script>
        <script src='../JS/fullcalendar/lang/ar.js'></script>
        <script src='../JS/jQuery.print.js'></script>
        <script src='../JS/select2.min.js'></script>
        <script src="../JS/persianumber.js"></script> 
        <script src="../JS/scripts.js"></script> 
        <script src="../JS/highcharts.js"></script>
        <script src="../JS/exporting.js"></script>
        <script src="../JS/idle.js"></script>
        <script src="../JS/jquery.fileupload.js"></script> 
<?php 
session_start();
require_once '../config.php';
require_once '../functions/global.php';
if (isset($_GET['id'])){
    $id=$_GET['id'];
    //echo $id;
    $case=getCaseById($id);
    $alarm=getAlarmById($id);
    $archivecase=getArchiveCasesByID($id);
    $archivealarm=getArchiveAlarmById($id);
    $merge=array_merge($case, $alarm, $archivecase,$archivealarm);
    $s=is_multi($merge);
   // echo $s;
    $arr=getContractbyCaseId($id);
    //print_r($arr);
    $contracttype=$arr[0]['contract_type'];
    //echo $contracttype;
    //echo $arr[0]['account_ID'];

    $customer=GetCustomerByID(getCustomerfromContract($arr[0]['account_ID']));
     $custid=$customer[0]['ID'];
    //echo getCustomerfromContract($arr[0]['account_ID']);
    $action=getAccountActionByContractID($arr[0]['ID']);

}
    $loggedUser = $_SESSION['user'];
    
    $users = GetAllUsers();
    $casesss = getAllCases();
    $casesTypes = getAllCase_Type();
    $lawyers = getAllLawyers();
    $consultants = getAllConsultant();
    $opponents = getAllOpponents();
?>

         
      <div class="right-section-02 margin-botm-25 home-bill-table">
      <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading c-list" style="direction: rtl;">
              <span class="title">
              كشف حساب خاص ل:
              <b> <?php echo $customer[0]['cfname']." ". $customer[0]['csname']." ".$customer[0]['ctname']." ".$customer[0]['clname'];
            ?>
            </b>
               </span>
               
            </div>
          <div class="panel-body">
                
              <div class="form-group" >
            
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
              
          </div>
          
        </div>
     </div>
     
     
     </div>
   </div>
 </div>
</div>
</div>