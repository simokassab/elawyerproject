 <?php

    $loggedUser = $_SESSION['user'];
    //echo $loggedUser['idd'];
    $customers = getAllCustomers();
    $usersss = GetAllUsers();
  //  print_r($users)
    $casesss = getAllCases();
    $casesTypes = getAllCase_Type();
    $lawyers = getAllLawyers();
    $consultants = getAllConsultant();
    $opponents = getAllOpponents();
    $missions = getMissions($loggedUser['idd'], $loggedUser['level_ID']);
    //print_r($missions);
  //  echo "dasdasd";
    $events = getEvents($loggedUser['idd'], $loggedUser['level_ID']);
    //print_r ($events);
    $blogs=getBlog();
   // print_r($blogs);
       
?>
<script>
    var missions = <?php echo json_encode($missions); ?> ;
   
    var events = <?php echo json_encode($events); ?>;

</script> 

 <?php 

if (empty($missions)) {
     $missions='';
}
else {

}


if (empty($casesss)) {
     $casesss='';
}
else {
  
}

if (empty($events)) {
     $events='';
}
else {
  
}

 ?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=515680848577955";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="mail-content">
 <div class="container">
   <div class="row">
     <div class="col-sm-3">
      <form action="index.php">
        <div class="panel panel-default">
        <div class="panel-heading clearfix">
                <div class="input-group">
                <input type='hidden' value='search' name='action'>
                    <input type="text" class="form-control" name="data" id='data' placeholder="البحث السريع">
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>

                    </div>
                </div>
        </div>
    </div>
    </form>
       <div class="common-box left-box01 margin-botm-25">
         <div class="panel panel-default">
          <div class="panel-heading">
              <span id="quickevents" style="color: #b60000;">
           آخر الأحداث 
           </span>
           <ul class="pull-left c-controls">
         
              <a href="#" data-toggle="modal" data-target="#addEvent" class='tooltipp' title='إضافة حدث'><span  class="glyphicon glyphicon-plus" style="color: #FC960F;"></span></a>
              
            </ul>
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

                        <?php echo "<b style='color: #b60000;'>".substr($event['event'], 0, 30)."</b>" ?>
                            <a class='tooltipp' href="#" onclick="viewEvent(<?php echo $i; ?>)" data-toggle="modal"  title="رؤية الحدث" data-target="#viewEvent" >
                                <span class="glyphicon glyphicon-eye-open" style='float:left;'></span></a>
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
       
         <div class="left-box03 margin-botm-25" >
              
       </div>
       
     </div>
     <div class="col-sm-9">
     
     <div class="right-side">
     
    <?php include_once 'viewEventModal.php'; ?>