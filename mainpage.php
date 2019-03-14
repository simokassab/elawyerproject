<?php
    $loggedUser = $_SESSION['user'];
date_default_timezone_set('Asia/Kuwait');
?>

<?php 
date_default_timezone_set('Asia/Kuwait');

 $date = date('Y-m-d H:i:s');
if(isset($_GET['notificationTicket'])){
 // NewNotification($from, $to, $url, $title, $status)
  NewNotification('Techoffice Support', $_SESSION['user']['idd'],'#', 'TECHOFFICE لقد تم إرسال التيكت إلى ','NOTREAD', $date);
}

?>
<script type="text/javascript">
  

</script>



<?php include_once "underheader.php"; ?>

<?php include_once 'menu.php'; 

include_once 'addMissionModal.php';?>

        

     <div class="right-section-02 margin-botm-25">
      <div class="panel panel-default">
           
              <div class="panel-heading c-list" >
                <span class="title" id="quickmissions">المهام </span>
                <ul class="pull-left c-controls">
                    <li><a href="#" data-toggle="modal" data-placement="top" class='tooltipp' data-target="#addMission" title='إضافة مهام'>
                            <span  class="glyphicon glyphicon-plus" style="color: #FC960F;"></span></a>

                </ul>
            </div>
          <div class="table-responsive " id="latestmissions">
           <table class="table">
            <thead>
                <td>
                    تعليق
                </td>
                 <td>
                    تاريخ
                </td>
                <td>
                    نوع المهمة
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
                <td>
                    أظهار
                </td>
            </thead>
            <tbody>
                <?php
                if(!empty($missions)){
                $today= new DateTime();
                $dif="";
                $count=0;
                if(count($missions)>8){
                   $count=8; 
                }
                else {
                    $count=count($missions);
                }
                for ($i = 0; $i < $count; $i++) {
                   $mission = $missions[$i];
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
                            <td >
                                <?php echo $mission['comments'] ?>
                            </td>
                            <td class="center">
                                <?php echo $mission['enddate'] ?>
                            </td>
                            <td>
                                <?php echo $mission['mtype'] ?>
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
                            <td
                                <a href="#" onclick="viewMission(<?php echo $i; ?>)" data-toggle="modal" data-target="#viewMission" ><span class="glyphicon glyphicon-eye-open"></span></a>
                            </td>
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
                            <td >
                                <?php echo $mission['comments'] ?>
                            </td>
                            <td class="center">
                                <?php echo $mission['enddate'] ?>
                            </td>
                            <td>
                                <?php echo $mission['mtype'] ?>
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
                            <td
                                <a href="#" onclick="viewMission(<?php echo $i; ?>)" data-toggle="modal" data-target="#viewMission" ><span class="glyphicon glyphicon-eye-open"></span></a>
                            </td>
                        </tr>
                <?php 

                  }
                  if ($dif > 0)  {
                    if($mission['status']=='DONE')// past date and mission done
                            echo "<tr style='background-color: #00C875; color: white;'>";
                        else
                            echo "<tr style='background-color: #FDAB3D;  color: white;'>";
                        ?>
                            <td >
                                <?php echo $mission['comments'] ?>
                            </td>
                            <td class="center">
                                <?php echo $mission['enddate'] ?>
                            </td>
                            <td>
                                <?php echo $mission['mtype'] ?>
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
                            <td
                                <a href="#" onclick="viewMission(<?php echo $i; ?>)" data-toggle="modal" data-target="#viewMission" ><span class="glyphicon glyphicon-eye-open"></span></a>
                            </td>
                        </tr>
                   
                <?php }
                }
                echo ' <tr><td colspan="8" style="text-align: center;"><a href="index.php?action=allmissions" target="_blank">عرض الكل</a></td></tr>';
                }
                else {
                      echo "<tr><td colspan='8'><center>لا يوجد مهام</center></td></tr>";
                }
                ?>
            </tbody>
          </table>
          </div>
          
        </div>
     </div>
     
     <div class="right-section-03">
      <div class="panel panel-default">
       
         <div class="panel-heading c-list" >
            <span class="title" id="quickcalendar">جدول الاعمال</span>
          
        </div> 
          <div class="panel-body" id="latestcalendar">
                    
           <?php   include "schedule/appointment.php"; ?>

            
          </div>
        </div>
     </div>
     
     
     
     </div>
   </div>
 </div>
</div>
 <?php include_once 'viewMissionModal.php'; ?>