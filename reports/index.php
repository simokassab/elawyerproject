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
          
?>
 <script>
    var missions = <?php echo json_encode($missions); ?> ;
    var cases = <?php echo json_encode($casesss); ?>;
    var events = <?php echo json_encode($events); ?>;
$(document).ready(function() {
    $('#search').click(function() {
         var pagee=$('#reports').val();
         var URL='index.php?action=reports/'+pagee;
        // var strWindowFeatures = "location=yes,height=770,width=920,scrollbars=yes,status=yes";
         window.open(URL, "_blank");

    });
     })
</script>

<div class="mail-content">
 <div class="container">
   <div class="row">
     <div class="col-sm-3">
     
       <div class="common-box left-box01 margin-botm-25">
         <div class="panel panel-default">
          <div class="panel-heading">
              <span id="quickevents" style="color: #b60000;">
           آخر الأحداث 
           </span>
           <a href="#" data-toggle="modal" data-target="#addEvent"><span  class="glyphicon glyphicon-plus" style="color: #FC960F;"></span></a>
          </div>
          <div class="panel-body" id="latestevents">
            
                <?php
                if (!empty($events)){
                    $v=count($events);
                    if($v>6){
                        $v=6;
                    }
                    else {
                        $v=count($events);
                    }
                    for ($i=0; $i<$v;$i++) {
                            $event = $events[$i];
                    ?>

                        <?php echo $event['event'] ?>
                            <a href="#" onclick="viewEvent(<?php echo $i; ?>)" data-toggle="modal" data-target="#viewEvent" >
                                <span class="glyphicon glyphicon-eye-open"></span></a>
                    <hr/>
                    <?php }
                    }
                    else {
                        echo "لا يوجد أحداث";
                    }

                    ?>
           
          </div>
        </div>
       </div>
       
       <div class="left-box02 margin-botm-25">
         <!------------>
            <div class="">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading c-list">
                                <span class="title">أخبار المكتب </span>
                                <ul class="pull-left c-controls">
                                    <li><a href="#cant-do-all-the-work-for-you" data-toggle="tooltip" data-placement="top" title="Add Contact"><i class="glyphicon glyphicon-plus"></i></a></li>
                                    
                                </ul>
                            </div>
                            
                            <ul class="list-group" id="contact-list">
                                <li class="list-group-item">
                                    <div class="col-xs-12 col-sm-4">
                                        <img src="images/fb-icon.png" alt="" class="img-responsive" />
                                    </div>
                                    <div class="col-xs-12 col-sm-8">
                                        <span class="name">Scott Stevens</span><br/>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                                
                                <li class="list-group-item">
                                    <div class="col-xs-12 col-sm-4">
                                        <img src="images/tw-icon.png" alt="" class="img-responsive" />
                                    </div>
                                    <div class="col-xs-12 col-sm-8">
                                        <span class="name">Seth Frazier</span><br/>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                                
                                <li class="list-group-item">
                                    <div class="col-xs-12 col-sm-4">
                                        <img src="images/instr-icon.png" alt="" class="img-responsive" />
                                    </div>
                                    <div class="col-xs-12 col-sm-8">
                                        <span class="name">Jean Myers</span><br/>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                                
                                <li class="list-group-item">
                                    <div class="col-xs-12 col-sm-4">
                                        <img src="images/social-user.png" alt="" class="img-responsive" />
                                    </div>
                                    <div class="col-xs-12 col-sm-8">
                                        <span class="name">Todd Shelton</span><br/>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                                
                            </ul>
                            
                             <div class="panel-footer text-center"><a href="#">See All</a></div>
                        </div>
                    </div>
                </div>
            </div>
         <!------------>
       </div>
     </div>
     <div class="col-sm-9">
     
     <div class="right-side">
         
             <?php include_once 'menu.php'; ?>
         
     <div class="home-client-section">
      <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading c-list" style="direction: rtl;">
              <span class="title">
               التقارير
               </span>
            </div>
          <div class="panel-body">
           <div>
           <!------------------->
           
            <form method="post">
                <div class="form-group" style="direction: rtl;">
               <div class="row">
                  
                   <br/>
                   <div class="col-sm-4"><input class="btn btn-primary" style="height:40px; width: 180px;" type="button" name="search" id="search" value="بحث"/></div>
                   <div class="col-sm-8">
                    <select class="form-control" id="reports" name="reports" style="height:40px;">
                       <option value="casesprogress"> القضايا الجارية  </option>
                       <option value="casesarchive"> القضايا المؤرشفة</option>
                       <option value="win">القضايا الرابحة </option>
                       <option value="loose"> القضايا الخاسرة </option>
                       <option value="casestype">حسب نوع القضايا </option>
                       <option value="users"> ساعات العمل للموظفين</option>
                       <option value="lawyers"> القضايا لكل محامي </option>
                       <option value="customers">  العملاء </option>
                            <option value="customers_">المراجعين </option>
                            <option value="eaccount_"> الملفات المالية</option>
                            <option value="kitchen_"> المطبخ  </option>
                            <option value="missions_">المهام </option>
                            <option value="events_">الاحداث </option>
                            <option value="calendar_">جدول الاعمال الشهري  </option> 
                   </select>
                   </div>
              </div>
             
     
           <hr/>
           
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
