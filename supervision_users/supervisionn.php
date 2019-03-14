
<?php 
//echo  $_SESSION['user']['level_ID'];
if( $_SESSION['user']['level_ID']!='1') {
    include_once 'notFound.php';
    exit();  
}
?>
<style>
    .roww {
        margin-left: 5px;
        margin-right: 5px;
    }
    </style>
           <div class="row roww">
                 
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="color: #b60000; text-align: center; direction: rtl;"  id="userss">
                             الموظفين
                        </div>
                        <div class="panel-body" id="userss_">
                        <iframe  src='./superevents/users.php' style="border-right: 4px solid #FFF; width: 100%; overflow: scroll; height:400px;"></iframe>
                        </div>  
                    </div>
                </div>
             <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="color: #b60000; text-align: center; direction: rtl;"  id="eventss">
                             القضايا
                        </div>
                        <div class="panel-body" id="eventss_">
                        <iframe  src='./superevents/details.php' style="border-right: 4px solid #FFF; width: 100%; overflow: scroll; height:400px;"></iframe>
                        </div>  
                    </div>
                </div>
            </div>

<script>
     $(document).ready(function() {
        togle("userss","userss_");
          togle("eventss","eventss_");
       });
    </script>