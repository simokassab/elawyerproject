<?php
$id="";
if(isset($_GET['id_alarm'])){
    $id=$_GET['id_alarm'];

?>
    <script>
        $(document).ready(function () {

        $.ajax({
            type: "get",
            url: "alarm/index.php",
            data: 'act=create&id=<?php echo $id; ?>',
            success: function (dataa) {
               //  alert(dataa);
                notif({
                    msg: "لقد تم اضافةالإنذار بنجاح ",
                    type: "info"
                });
                setTimeout(
                    function()
                    {
                       // window.location.href='index.php?action=TOD';
                    }, 1000);
            }
        });
        });
    </script>

<?php
}

if (isset($_POST['submit'])) {
    $subject = $_POST['subject'];
    $customer=$_POST['customers'];
   // echo $customer."<br>";
    $cust=  explode(" ", $customer);
    if($customer==""){
      $customerr="";  
    }
    else {
       // echo $cust[0];
    $s= GetCustomerByFullName($cust[0], $cust[1], $cust[2], $cust[3]);
    $customerr=$s[0]['ID'];
  //  echo $customerr;
    }
    $lawyer_id=$_POST['lawyers'];
    $consultant_id=$_POST['consultants'];
    $idd=$_POST['idd'];
    $sub = getAlarmByCriteria("alarm", $lawyer_id,$consultant_id,$idd,$subject,$customerr);
    $sub1 = getAlarmByCriteria("archive_alarm", $lawyer_id,$consultant_id,$idd,$subject,$customerr);
}
    $loggedUser = $_SESSION['user'];
    
    $users = GetAllUsers();
 //   $casesss = getAllCases();
    $casesTypes = getAllCase_Type();
    $lawyers = getAllLawyers();
    $consultants = getAllConsultant();
    $opponents = getAllOpponents();
    $missions = getMissions($loggedUser['idd'], $loggedUser['level_ID']);
    $events = getEvents($loggedUser['idd'], $loggedUser['level_ID']);
?>
  
<?php include_once "underheader.php"; ?>
         
 <?php include_once 'menu.php'; ?>
     <div class="home-cases-section">
      <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading c-list">
            <span class="title">الإنذارات</span>
           <ul class="pull-left c-controls">
                    <li><a href='index.php?action=addAlarmModal'><i class="glyphicon glyphicon-plus"></i></a></li>

                </ul>
                            </div>
          <div class="panel-body">
           <div>
        
           
           <form action="index.php?action=alarm" method="post">
                <div class="form-group" style="direction: rtl;">
               <div class="row">
                 <div class="col-sm-4">
                 <label for="exampleInputEmail1">المحامي</label>
                   <select class="form-control" id="lawyers" name="lawyers">
                      <option value="">إختر المحامي</option>
                      <?php 
                      if(isset($_POST['lawyers'])){
                        echo getOptionsLawyers('users', 'ID', 'fname', 'lname', $_POST['lawyers']);
                      }
                      else {
                           echo getOptionsLawyers('users', 'ID', 'fname', 'lname', '');
                      }
                      ?>
                    </select>
                 </div>
                 <div class="col-sm-4">
                 <label for="exampleInputEmail1">رقم الإنذار</label>
                 <input type="text" class="form-control"  placeholder="" id="idd" name="idd"
                    value="<?php if(isset($_POST['idd'])) echo $_POST['idd'];?>"     
                        >  
                 </div>
                 <div class="col-sm-4">
                 <label for="exampleInputEmail1"> عنوان الإنذار</label>
                 <input type="text" class="form-control"  placeholder="" name="subject" id="subject"
                        value="<?php if(isset($_POST['subject'])) echo $_POST['subject'];?>" >    
                 </div>
               </div>
              </div>
              
              <div class="form-group" style="direction: rtl;">
               <div class="row">
                 <div class="col-sm-6">
                 <label for="exampleInputEmail1">المستشار</label>
                 <select class="form-control" name="consultants" id="consultants">
                       <option value="">إختر المستشار</option>
                         <?php 
                         if(isset($_POST['consultants'])){
                            echo getOptionsConsultant('users', 'ID', 'fname', 'lname', $_POST['consultants']);
                         }
                         else {
                              echo getOptionsConsultant('users', 'ID', 'fname', 'lname','');
                             
                         }
                         ?>
                    </select>
                 </div>
                 <div class="col-sm-6">
                 <label for="exampleInputEmail1">الموكل</label>
                  <input type="text" class="form-control"  placeholder="" name="customers" id="customers" 
                          value="<?php if(isset($_POST['customers'])) echo $_POST['customers'];?>"> 
                 
                 </div>
               
               </div>
              </div>
              <div class="form-group">
                      <div class="row">
                         <div style="direction: rtl; text-align: center;">
                   <div > 
                       <button type="submit" class="btn btn-primary" style=" width: 200px;" name="submit">بحث</button>
                   </div>
                 </div>
                          </div>
                  </div>
            </form>
           </div>
          </div>
        </div>
     </div>
        <?php 
                if(isset($_POST['submit'])) {
                    
                    ?> 
                     <div class="home-cases-section-01">
            <div class="panel panel-primary">
          <!-- Default panel contents -->
          <div class="panel-heading c-list"><span class="title">الإنذارات الجارية</span></div>
          <div class="panel-body">
           <div class="traded-cases">
           <div class="row">
           </div>
           <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="row" style="direction: rtl;">    
                    <?php
                   if(count($sub)==0){
                   ?> 
                    <li class="list-group-item" style="text-align: center;">لا يوجد   </li>    
                   <?php
                   }
                   else {
                       
                       foreach ($sub as $casee){
                           $custo=  GetCustomerByID($casee['customer_id']);
                       ?>
                     <div class="col-sm-6" >
                        <div class="traded-cases-box">
                          <div class="row">
                            <div class="col-sm-4">
                              <div class="box-img">
                                  <img src="images/circle-icon-03.png" width="80px"/>
                              </div>
                            </div>
                            <div class="col-sm-6">
                                <?php 
                                    if($loggedUser['level_ID']==5){
                                       
                                ?> 
                                <a href="index.php?action=contract&customer_id=<?php echo $casee['customer_id'];?>">
                                <?php
                                    }
                                    else {
                                  ?> 
                                <a href="index.php?action=viewAlarm&id=<?php echo $casee['ID'];?>">
                                <?php       
                                    }
                                ?>
                            <div class="box-detail">
                                <h6>القضية: <u><?php echo $casee['subject'] ?></u></h6>
                                <p>رقم: <u><?php echo $casee['ID']; ?></u></p>
                              <p>الموكل: <u><?php echo $custo[0]['cfname'].' '.$custo[0]['clname'] ?></u></p>
                              <p>التاريخ: <u><?php echo $casee['startdate'] ?></u></p>
                              <p>الأتعاب: <u><?php echo $casee['price'] ?></u></p>
                              </div>
                                </a>
                            </div>
                          
                          </div>
                        </div>
                      </div>   
                       <?php
                       }
                   }
                }
           ?>  
           </div>    
            </div>
           </div>
          
           </div>
          </div>
          
        </div>
     </div>
  <?php 
                if(isset($_POST['submit'])) {
                    
                    ?> 
                      <div class="home-cases-section-01">
            <div class="panel">
          <!-- Default panel contents -->
          <div class="panel-heading modal-header-warning"><span>الإنذارات المؤرشفة</span></div>
          <div class="panel-body">
           <div class="traded-cases">
           <div class="row">
           </div>
           <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="row" style="direction: rtl;">    
                    <?php
                   if(count($sub1)==0){
                   ?> 
                    <li class="list-group-item" style="text-align: center">لا يوجد   </li>    
                   <?php
                   }
                   else {
                       ?>
       
            <?php 
                       foreach ($sub1 as $casee){
                           $custo=  GetCustomerByID($casee['customer_id']);
                       ?>
                     <div class="col-sm-6" >
                        <div class="traded-cases-box">
                          <div class="row">
                            <div class="col-sm-4">
                              <div class="box-img">
                                  <img src="images/circle-icon-03.png" width="80px"/>
                              </div>
                            </div>
                            <div class="col-sm-6">
                                <?php 
                                    if($loggedUser['level_ID']==5){
                                       
                                ?> 
                                <a href="index.php?action=contract&id=<?php echo $casee['ID'];?>">
                                <?php
                                    }
                                    else {
                                  ?> 
                                <a href="index.php?action=viewArchiveAlarm&id=<?php echo $casee['ID'];?>">
                                <?php       
                                    }
                                ?>
                            <div class="box-detail">
                                <h6>القضية: <u><?php echo $casee['subject'] ?></u></h6>
                                <p>رقم: <u><?php echo $casee['ID']; ?></u></p>
                              <p>الموكل: <u><?php echo $custo[0]['cfname'].' '.$custo[0]['clname'] ?></u></p>
                              <p>التاريخ: <u><?php echo $casee['startdate'] ?></u></p>
                              <p>الأتعاب: <u><?php echo $casee['price'] ?></u></p>
                              </div>
                                </a>
                            </div>
                          
                          </div>
                        </div>
                      </div>   
                       <?php
                       }
                   }
                }
           ?>  
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



