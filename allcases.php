<?php

?>
    <script>
        $(document).ready(function () {

        $.ajax({
            type: "get",
            url: "cases/index.php",
            data: 'act=create&id=<?php echo $id; ?>',
            success: function (dataa) {
                // alert(dataa);
                notif({
                    msg: "Case has been opened successfully.. ",
                    type: "info"
                });
                setTimeout(
                    function()
                    {
                        window.location.href='index.php?action=TOD';
                    }, 1000);
            }
        });
        });
    </script>

<?php

if (isset($_GET['custid'])) {

    $customerr=$_GET['custid'];
  //  echo $customerr;
    $sub = getCasesByCriteria("cases", "","","","",$customerr);
    $sub1 = getCasesByCriteria("archive_cases", "","","","",$customerr);
}
else {
    include_once './notFound.php';
}
    $loggedUser = $_SESSION['user'];
    $customer=  GetCustomerByID($_GET['custid']);
    $users = GetAllUsers();
 //   $casesss = getAllCases();
    $casesTypes = getAllCase_Type();
    $lawyers = getAllLawyers();
    $consultants = getAllConsultant();
    $opponents = getAllOpponents();
    $missions = getMissions($loggedUser['idd'], $loggedUser['level_ID']);
    $events = getEvents($loggedUser['idd'], $loggedUser['level_ID']);
?>
  

<div class="home-cases-page">
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
       
       
       <div class="left-box03 margin-botm-25">
           <!-- tabs -->
           <div class="tabbable">
                  <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#one" data-toggle="tab">تقارير</a></li>
                    <li><a href="#two" data-toggle="tab">التقدم</a></li>
                    <li><a href="#twee" data-toggle="tab">الاحصائيات </a></li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="one">
                    
                    <ul class="nav nav-pills tab-pill">
                      <li role="presentation" class="active"><a href="#">Home</a></li>
                      <li role="presentation"><a href="#">Profile</a></li>
                      <li role="presentation"><a href="#">Messages</a></li>
                    </ul>
                    
                    <!----------->
                     <div id="area-example" style="height:200px;"></div>
                    <!----------->
                    
                    <hr/>
                    <div class="option-btn">
                    <a class="btn btn-default" href="#" role="button">Cases</a>
                    <a class="btn btn-default" href="#" role="button">Lawyers</a>
                    <a class="btn btn-default" href="#" role="button">Leadership</a>
                    <a class="btn btn-default" href="#" role="button">Growth</a>
                    <a class="btn btn-default" href="#" role="button">Development</a>
                    <a class="btn btn-default" href="#" role="button">Completion</a>
                    </div>. 
                    
                    </div>
                    
                    <div class="tab-pane" id="two">Secondo sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
                    Aliquam in felis sit amet augue.</div>
                    
                    <div class="tab-pane" id="twee">Thirdamuno, ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
                    Quisque mauris augue, molestie tincidunt condimentum vitae.</div>
                    
                   </div>
                </div>
           <!-- /tabs -->
       </div>
       
       
       
       
     </div>
     <div class="col-sm-9">
     
     <div class="right-side">
         
 <?php include_once 'menu.php'; ?>
    <div class="home-client-section">
      <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading c-list" style="direction: rtl; text-align: center;">
              <span class="title">
               قضايا الموكل: <?php echo $customer[0]['cfname'].' '.$customer[0]['csname'].' '.$customer[0]['ctname']
                       .' '.$customer[0]['clname'];?>
               </span>

            </div>
      </div>
    </div>
         
    <div class="home-cases-section-01">
       <div class="panel panel-primary">
          <!-- Default panel contents -->
          <div class="panel-heading c-list"><span class="title">القضايا الجارية</span></div>
          <div class="panel-body">
           <div class="traded-cases">
           <div class="row">
           </div>
           <div class="row" styl>
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
                                <a href="index.php?action=contract&id=<?php echo $casee['ID'];?>">
                                <?php
                                    }
                                    else {
                                  ?> 
                                <a href="index.php?action=viewCases&id=<?php echo $casee['ID'];?>">
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

           ?>  
           </div>    
            </div>
           </div>
          
           </div>
          </div>
          
        </div>
     </div>

                      <div class="home-cases-section-01">
            <div class="panel">
          <!-- Default panel contents -->
          <div class="panel-heading modal-header-warning"><span> القضايا المؤرشفة</span></div>
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
                                <a href="index.php?action=viewCases&id=<?php echo $casee['ID'];?>">
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



