

<?php
//echo $_SERVER["REMOTE_ADDR"];
    $loggedUser = $_SESSION['user'];

       
?>




     <div class="right-section-02 margin-botm-25" style="width:97%; float:right; padding-right: 50px;">
      <div class="panel panel-default" >
          
              <div class="panel-heading c-list" >
                <span class="title" id="quickmissions">القضايا </span>
            </div>
          <div class="panel-body">
        
            <?php 
              $cases=array();
              $cases=getCaseByCustomer($_SESSION['user']['idd']);
              if(empty($cases)){
                echo "<p style='align:center;'>لا يوجد</p>";
              }
              else
              foreach ($cases as $case) { 
              ?> 
                     <a href="index.php?action=viewCases&id=<?php echo $case['ID'];?>">
                     <div class="col-sm-4"   style="float:right;" >
                        <div class="traded-cases-box" >
                          <div class="row" >
                            <div class="col-sm-4" >
                              <div class="box-img" >
                                  <img src="../images/circle-icon-03.png" width="80px"/>
                              </div>
                            </div>
                            <div class="col-sm-8" >
                               
                               
                            <div class="box-detail" >
                                <h4 style='color: white;'>القضية: <u><?php echo $case['subject'] ?></u></h4>
                                <p>رقم: <u><?php echo $case['ID']; ?></u></p>
                              <p>التاريخ: <u><?php echo $case['startdate'] ?></u></p>
                              <p>الأتعاب: <u><?php echo $case['price'] ?></u></p>
                              <p>الحالة: <u><?php echo $case['status'] ?></u></p>
                              </div>
                                </a>
                            </div>
                             </div>
                        </div>
                         </div>
                           <?php       
                                    }
                                ?>

          </div>
          
        </div>
         <div class="panel panel-default" >
          
              <div class="panel-heading c-list" >
                <span class="title" id="quickmissions">الإنذارات </span>
            </div>
          <div class="panel-body">
        
            <?php 
              $alarm=array();
              $alarm=getAlarmByCustomer($_SESSION['user']['idd']);
              if(empty($alarm)){
                echo "<p style='align:center;'>لا يوجد</p>";
              }
              else
              foreach ($alarm as $alarmm) { 
              ?> 
                     <a href="index.php?action=viewAlarm&id=<?php echo $alarmm['ID'];?>">
                     <div class="col-sm-4"   style="float:right;" >
                        <div class="traded-cases-box" >
                          <div class="row" >
                            <div class="col-sm-4" >
                              <div class="box-img" >
                                  <img src="../images/circle-icon-03.png" width="80px"/>
                              </div>
                            </div>
                            <div class="col-sm-8" >
                               
                               
                            <div class="box-detail" >
                                <h4 style='color: white;'>القضية: <u><?php echo $alarmm['subject'] ?></u></h4>
                                <p>رقم: <u><?php echo $alarmm['ID']; ?></u></p>
                              <p>التاريخ: <u><?php echo $alarmm['startdate'] ?></u></p>
                              <p>الأتعاب: <u><?php echo $alarmm['price'] ?></u></p>
                              <p>الحالة: <u><?php echo $alarmm['status'] ?></u></p>
                              </div>
                                </a>
                            </div>
                             </div>
                        </div>
                         </div>
                           <?php       
                                    }
                                ?>

          </div>
          
        </div>

        <div class="panel panel-default" >
          
              <div class="panel-heading c-list" >
                <span class="title" id="quickmissions">القضايا المؤرشفة  </span>
            </div>
          <div class="panel-body">
        
            <?php 
              $cases=array();
              $cases=getArchivedCasesByCustomer($_SESSION['user']['idd']);
              if(empty($cases)){
                echo "<p style='align:center;'>لا يوجد</p>";
              }
              else
              foreach ($cases as $case) { 
              ?> 
                     <a href="index.php?action=viewArchiveCase&id=<?php echo $case['ID'];?>">
                     <div class="col-sm-4"   style="float:right;" >
                        <div class="traded-cases-box" >
                          <div class="row" >
                            <div class="col-sm-4" >
                              <div class="box-img" >
                                  <img src="../images/circle-icon-03.png" width="80px"/>
                              </div>
                            </div>
                            <div class="col-sm-8" >
                               
                               
                            <div class="box-detail" >
                                <h4 style='color: white;'>القضية: <u><?php echo $case['subject'] ?></u></h4>
                                <p>رقم: <u><?php echo $case['ID']; ?></u></p>
                              <p>التاريخ: <u><?php echo $case['startdate'] ?></u></p>
                              <p>الأتعاب: <u><?php echo $case['price'] ?></u></p>
                              <p>الحالة: <u><?php echo $case['status'] ?></u></p>
                              </div>
                                </a>
                            </div>
                             </div>
                        </div>
                         </div>
                           <?php       
                                    }
                                ?>

          </div>
          
        </div>

     <div class="panel panel-default" >
          
              <div class="panel-heading c-list" >
                <span class="title" id="quickmissions">الإنذارات المؤرشفة </span>
            </div>
          <div class="panel-body">
        
            <?php 
              $alarm=array();
              $alarm=getArchivedAlarmByCustomer($_SESSION['user']['idd']);
              if(empty($alarm)){
                echo "<p style='align:center;'>لا يوجد</p>";
              }
              else {
              foreach ($alarm as $alarmm) { 
              ?> 
                     <a href="index.php?action=viewAlarm&id=<?php echo $alarmm['ID'];?>">
                     <div class="col-sm-4"   style="float:right;" >
                        <div class="traded-cases-box" >
                          <div class="row" >
                            <div class="col-sm-4" >
                              <div class="box-img" >
                                  <img src="../images/circle-icon-03.png" width="80px"/>
                              </div>
                            </div>
                            <div class="col-sm-8" >
                               
                               
                            <div class="box-detail" >
                                <h4 style='color: white;'>القضية: <u><?php echo $alarmm['subject'] ?></u></h4>
                                <p>رقم: <u><?php echo $alarmm['ID']; ?></u></p>
                              <p>التاريخ: <u><?php echo $alarmm['startdate'] ?></u></p>
                              <p>الأتعاب: <u><?php echo $alarmm['price'] ?></u></p>
                              <p>الحالة: <u><?php echo $alarmm['status'] ?></u></p>
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
