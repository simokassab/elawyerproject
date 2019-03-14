<?php

    $loggedUser = $_SESSION['user'];
    
    $users = GetAllUsers();
    $casesss = getAllCases();
    $casesTypes = getAllCase_Type();
    $lawyers = getAllLawyers();
    $consultants = getAllConsultant();
    $opponents = getAllOpponents();
    $missions = getMissions($loggedUser['idd'], $loggedUser['level_ID']);
    $events = getEvents($loggedUser['idd'], $loggedUser['level_ID']);
    $rights=getRightsByUser($loggedUser['idd']);       
?>
  <script>
  $(function() {
    $( "#fnn" ).autocomplete({
      source: 'autocomplete/search.php'
    });
  });
  </script>
 <?php include_once "underheader.php"; ?>
         
             <?php include_once 'menu.php'; ?>
         
     <div class="home-client-section">
      <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading c-list" style="direction: rtl;">
              <span class="title">
               بحث حسب إسم الموكل
               </span>
            </div>
          <div class="panel-body">
           <div>
            <form method="post">
            <?php //check the rights
                if(($rights[0]['acct']!='R') && ($rights[0]['acct']!='RW')) {

                  echo "You don't have the rights to view this page.";
                }
                else {
               ?>
              <div class="form-group">
               <div class="row">
                   <div class="col-sm-12" style="direction: rtl;">
                 <label for="exampleInputEmail1" >الإسم </label>
                 <input type="text" class="form-control"  placeholder="" id='fnn'  name="fnn" value="<?php if(isset($_POST['fnn'])) echo $_POST['fnn']; ?>">    
                 </div>
               </div>
              </div>
              
              <div class="form-group">
               <div class="row">
               
                    <div class="col-sm-4" style="direction: rtl;">
                 <label for="exampleInputEmail1">الشركة</label>
                  <input type="text" class="form-control" name="company"  value="<?php if(isset($_POST['company'])) echo $_POST['company']; ?>">    
                 </div>
                  <div class="col-sm-4" style="direction: rtl;">
                 <label for="exampleInputEmail1">هاتف</label>
                  <input type="text" class="form-control"  name="phone1" value="<?php if(isset($_POST['phone1'])) echo $_POST['phone1']; ?>">   
                 </div>
                  <div class="col-sm-4" style="direction: rtl;">
                 <label for="exampleInputEmail1">مدينة / بلد</label>
                  <input type="text" class="form-control" name="address"  value="<?php if(isset($_POST['address'])) echo $_POST['address']; ?>">       
                 </div>

               </div><br/>
                  <div class="form-group">
                      <div class="row">
                         <div style="direction: rtl; text-align: center;">
                   <div > 
                       <button type="submit" class="btn btn-primary" style=" width: 200px;" name="submit">بحث</button>
                   </div>
                 </div>
                          </div>
                  </div>
              <?php 
                }
              ?>
            </form>
           
           </div>
     
           <hr/>
           
           <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
            <div class="row">
                 <?php 
                 if (isset($_POST['submit'])) {
                  if((isset($_POST['fnn'])) && $_POST['fnn']!=""){
                  $cust=$_POST['fnn'];
                  $cust_=explode(" ", $cust);
                  $customerss =  GetCustomerByCritria("", $cust_[0], $cust_[1],
                      $cust_[2], $cust_[3], $_POST['address'],$_POST['phone1'],$_POST['company'], "");
                  ($customerss);
                }
                else {
                   $customerss =  GetCustomerByCritria("", "", "", "", "", $_POST['address'],$_POST['phone1'],$_POST['company'], "");
                }
                    // echo count($customers);
                     if (count($customers) == 0) {
                 ?>
             <li class="list-group-item">لا يوجد   </li>
                 <?php
                }else{
            // lopping on the users
            for ($i = 0; $i < count($customers); $i++) {
                $customer = $customers[$i];
                
                ?>
             <div class="col-sm-6">
               <div class="client-detail-box">
                 <div class="row">
                   <div class="col-sm-5">
                      
                     <div class="box-img">
                      <img src="images/user-img.jpg"/>
                     </div>
                   </div>
                     <a <a target="_blank" href="index.php?action=contract&customer_id=<?php echo $customer['ID']; ?>">
                   <div class="col-sm-5">
                       <div class="box-detail" style="direction: rtl;">
                     <h6 ><?php
                      echo $customer['cfname'] . " " . $customer['clname'];
                     
                     ?></h6>
                     <p><b>الشركة:</b> <?php  echo $customer['ccompany'];  ?></p>
                     <p>تفاصيل:</p>
                     <p><b>العنوان:</b> <?php  echo $customer['caddress'];  ?></p>
                     </div>
                   </div>
                             </a>
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
           <hr/>
          
          </div>
          
        </div>
     </div>
     
     
     </div>
   </div>
 </div>
</div>
</div>
