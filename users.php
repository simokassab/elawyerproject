<?php
    $loggedUser = $_SESSION['user'];

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
    $( "#name_" ).autocomplete({
      source: 'autocomplete/search_users.php'
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
               الموظفين
               </span>
                <?php 
                if(($rights[0]['staf']=='W') || ($rights[0]['staf']=='RW')) {
               ?>
               <ul class="pull-left c-controls">
                    <li><a data-toggle="modal" data-target="#addUser"><i class="glyphicon glyphicon-plus"></i></a></li>

                </ul>
              <?php
              }
               ?>
            </div>
          <div class="panel-body">
            <form method="post">
            <?php //check the rights
              if(($rights[0]['staf']!='R') && ($rights[0]['staf']!='RW')) {

                echo "You don't have the rights to view this page.";
              }
              else {
             ?>  
             <div class="col-sm-4"> 
                       <button type="submit" class="btn btn-primary" style=" width: 200px;" name="submit">بحث</button>
                   </div>
            <div class="col-sm-8">
                 <input type="text" style="direction: rtl;" class="form-control"  placeholder="الإسم" id="name_" name="name_"
                    value="<?php if(isset($_POST['name_'])) echo $_POST['name_'];?>"     
                        >  
                 </div>
            <?php } ?> 
            </form>
           
           </div>
     
           <hr/>
           
           <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
            <div class="row">
                 <?php 
                 if (isset($_POST['submit'])) {
                    $name_ = $_POST['name_'];
                    $nam=explode(" ", $name_);
                    $users = GetUserByCritria($nam[0], $nam[1], $nam[2], $nam[3]);
                    // echo count($customers);
                     if (count($users) == 0) {
                 ?>
             <li class="list-group-item">لا يوجد   </li>
                 <?php
                }else{
            // lopping on the users
            for ($i = 0; $i < count($users); $i++) {
                $userr = $users[$i];
                
                ?>
             <a href="index.php?action=estaff&id=<?php echo $userr['ID']; ?>">
             <div class="col-sm-6">
               <div class="client-detail-box">
                 <div class="row">
                   <div class="col-sm-5">
                      
                     <div class="box-img">
                         <img width="100px" height="100px" src="server/php/files/<?php echo $userr['photo'];?>"/>
                     </div>
                   </div>
                   <div class="col-sm-5">
                       <div class="box-detail" style="direction: rtl;">
                     <h6 ><?php
                      echo $userr['fname'] . " " . $userr['lname'];
                     
                     ?></h6>
                     <p><b>رقم العضوية: </b><?php echo $userr['ID_member']; ?></p>
                      <p><b>الغرفة:  </b><?php echo $userr['room']; ?></p>
                     <p><b>العنوان:</b> <?php  echo $userr['address'];  ?></p>
                     </div>
                   </div>
                     <?php 
                        if($_SESSION['user']['level_ID']==1){

               
                     ?>
                   <div class=" col-sm-2">
                     <div class="box-edit"><a target="_blank"  href="index.php?action=editestaff&estaffid=<?php echo $userr['ID']; ?>"><i class="fa fa-pencil-square-o"></i></a></div>
                   </div>
                        <?php  }
                        else {
                            
                        }
                     ?>
                 </div>
               </div>
             </div>
                 </a>
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
