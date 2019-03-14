<style>
  


/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #095584;
    min-width: 200px;

    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index:100;
}

/* Links inside the dropdown */
.dropdown-content a {
    
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #116599; color:white;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: #1D76AA;
}
</style>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<?php 
if(isset($_GET['action'])) {}
?>

 <div  class="right-section-01 margin-botm-25">
       <div class="panel panel-default">
           
          <div class="panel-heading" id="quick" >الوصول السريع </div>
          <div class="panel-body" ID="menu">
            <div class="service-list">
            <ul class="list-inline">
              <li>
                    <?php 
                        if((isset($_GET['action'])) && ($_GET['action']=="eaccount")) {
                            
                        
                  ?>
               <div class="service-01 active-service">
                   <a href="index.php?action=eaccount">
                 <img src="images/circle-icon-01.png"/>
                 <h5>المحاسبة</h5></a>
               </div>
                  <?php 
                        }
                        else {
                ?> 
                  <div class="service-01">
                   <a href="index.php?action=eaccount">
                 <img src="images/circle-icon-01.png"/>
                 <h5>المحاسبة</h5></a>
               </div>
                        <?php } ?>
              </li>
              <li>
               <div class="service-02">
                   <a href="index.php?action=TOD">
                   <img src="images/circle-icon-02.png"/>
                 <h5>ارشيف</h5></a>
               </div>
              </li>
              <li>
                    <?php 
                    if((isset($_GET['action'])) && (($_GET['action']=="cases") || ($_GET['action']=="alarm")) ) {
                            
                        
                  ?>
               <div class="service-03 active-service dropdown">
                   
                 <img src="images/circle-icon-03.png"/>
                 <h5 class='dropbtn'>الإجراءات</h5>
                           <div class="dropdown-content">
                            <a style='color:white;' href="index.php?action=cases">القضايا</a>
                            <a style='color:white;' href="index.php?action=alarm">الإنذارات</a>
                             <a style='color:white;' href="index.php?action=newexecution">إجراء التنفيذ</a>
                          </div>
               </div>
                  <?php 
                        }
                        else {
                ?> 
                  <div class="service-03 dropdown">
                 <img src="images/circle-icon-03.png"/>
                 <h5 class='dropbtn'>الإجراءات</h5>
                       <div class="dropdown-content">
                            <a style='color:white;' href="index.php?action=cases">القضايا</a>
                            <a style='color:white;' href="index.php?action=alarm">الإنذارات</a>
                            <a style='color:white;' href="index.php?action=newexecution">إجراء التنفيذ</a>
                          </div>
               </div>
                   <?php 
                        }
                   
                  ?>
                   
              </li>
              <li>
                <?php 
                    if((isset($_GET['action'])) && ($_GET['action']=="users")) {
                            
                        
                  ?>
               <div class="service-04 active-service">
                   <a href="index.php?action=users">
                  <img src="images/circle-icon-04.png"/>
                 <h5>الموظفين</h5></a>
               </div>
                  <?php 
                        }
                        else {
                ?> 
               <div class="service-04">
                   <a href="index.php?action=users">
                 <img src="images/circle-icon-04.png"/>
                 <h5>الموظفين</h5></a>
               </div>
                    <?php } ?>
              </li>
              <li>
                  <?php 
                   if((isset($_GET['action'])) && ($_GET['action']=="customers")) {
                            
                        
                  ?>
               <div class="service-05 active-service">
                   <a href="index.php?action=customers">
                 <img src="images/circle-icon-05.png"/>
                 <h5>عملاء </h5></a>
               </div>
                <?php 
                        }
                        else {
                ?> 
                   <div class="service-05 ">
                   <a href="index.php?action=customers">
                 <img src="images/circle-icon-05.png"/>
                 <h5>عملاء </h5></a>
               </div>
                  <?php 
                        }
                       
                  ?>
                   
              </li>
              
            </ul>
          </div>
        </div>
     </div>
     </div>

<script>
  $(document).ready(function() {
     
   togle("quick","menu");
  });
</script>