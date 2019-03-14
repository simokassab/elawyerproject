
<?php 
//session_start();
if( $_SESSION['user']['level_ID']!='7') {
    include_once 'notFound.php';
    exit();
    
}

?>

<div class="row">

     <div class="col-lg-12" >
         <div class="panel panel-default">
             <div class="panel-heading" style="color: #b60000; text-align: center; direction: rtl; font-size: 24px;"  id="userss">
                  المطبخ
             </div>
             <div class="panel-body" id="userss_" style=" background-color: #E8EEF1;">
                 <iframe  src='./kitchen/iframe.php' style="width: 100%; overflow: scroll; height:500px;"></iframe>
             </div>  
         </div>
     </div>
 </div>