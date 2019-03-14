<script>
    var logged_in = false;
</script>
<?php
if (!empty($_SESSION['user'])) {
    $loggedUser = $_SESSION['user'];
    $users=  GetUserByID($_SESSION['user']['idd']);
    //print_r($users);
    $rights=getRightsByUser($loggedUser['idd']);
   // print_r($rights);
    ?>
    <script>
        var logged_in = true;
        $(document).ready(function () {
          $("#logout").click(function(){
               $.ajax({
                        type: "get",
                        url: "DBS/LogoutAction.php",
                        data: 'userid='+ <?php echo $loggedUser['idd']; ?>,
                        success: function (dataa) {
                            notif({
                                msg: "سوف يتم الخروج..",
                                type: "success"
                            });
                            setTimeout(
                                function()
                                {
                                    window.location.href='index.php';
                                }, 1000);
                        }
                    });
            });
        });
    </script>
    <?php
}
?>

         
    <script>
     $(document).ready(function () {
          $("#statuss").click(function(){
              
        });
        
          var myParam = location.search.split('action=')[1]
          //var myParam = location.search.split('myParam=')[1] ? location.search.split('myParam=')[1] : 'myDefaultValue';
         if(myParam=='mainpage'){
             $('#mainn').addClass('active-service');
         }
         if(myParam=='mainpage#'){
             $('#mainn').addClass('active-service');
         }
          if(myParam=='supervision_users/supervisionn'){
             $('#superss').addClass('active-service');
         }
         if(myParam=='supervision_users/supervisionn#'){
             $('#superss').addClass('active-service');
         }
         if(myParam=='kitchenn'){
             $('#kitchens').addClass('active-service');
         }if(myParam=='kitchenn#'){
             $('#kitchens').addClass('active-service');
         }

     });
    </script>
<script language="javascript">
           //var it;
           // x = 0;
           // function count() { 
           //     var s=$("#webmenu").val();
                //alert(s);
            //    if(s=='متصل'){
            //        x+=1;
            //        $.ajax({
            //            type: "post",
             //           url: "DBS/active.php",
            //            data: 'userid='+ <?php //echo $loggedUser['idd']; ?>,
            //           success: function (dataa) {
                    //    }
             //       });
             //       }
            //        else {
           //         }
           //     }   
           // (function() {

            //    var timeout = 2000;

            //    $(document).bind("idle.idleTimer", function() {
            //    clearInterval(it);    
            //    });


             //   $(document).bind("active.idleTimer", function() {
            //      it = setInterval(count, 1000);
            //    });
            //   $.idleTimer(timeout);

           // })(jQuery);

    $(document).ready(function () {
        $('select').val("متصل");
         var userid= <?php echo $_SESSION['user']['idd']; ?>;
        $.ajax({
                            type: "get",
                            url: "DBS/changeBreakStatus.php",
                            data: 'userid='+userid+'&breakstatus=متصل',
                            success: function (dataa) {
                                
                            }
                        });
       // it = setInterval(count, 1000); 
        $('#webmenu').on('change', function() {
            var userid= <?php echo $_SESSION['user']['idd']; ?>;
          //alert( this.value ); // or $(this).val()
          $.ajax({
                            type: "get",
                            url: "DBS/changeBreakStatus.php",
                            data: 'userid='+userid+'&breakstatus='+this.value,
                            success: function (dataa) {
                            }
                        });

        });
       
        $("#lawyerrr").select2();
         $("#fromm").select2(); 
          $("#too").select2(); 
    });
</script>

<script>

$(function() {
    var str=window.location+"";   
    $("#langg").click(function() {
       // $("#selectLanguageDropdown").css("display",'block');
    });
                        
});
</script>
<div class="top-header">
  <div class="container-fluid">  
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button> <!--<a class="navbar-brand" href="#">Brand</a>-->
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                              <?php 
                               if (empty($_SESSION['user'])) {
                               ?>
                                    
                          
                               <?php
                                    
                               }
                               else {
                                   if($loggedUser['level_ID']==1){
                                        $men=' <li  id="langs"><div id="selectLanguageDropdown" style="width:80px;" class="localizationTool"></div></li>
                                           
                                            <li id="kitchens" class="tooltipp1" title="المطبخ"><a href="index.php?action=kitchenn"><img src="images/top-icon-05.png"/></a></li>
                                            <li id="kitchens" ><a class="tooltipp1" title="إرسال تنبيه" href="#" data-toggle="modal" data-placement="top" data-target="#addTicket"><img src="images/top-icon-03.png"/></a></li>';
                                    }
                                   if($loggedUser['level_ID']==2 ){ 
                                        $men=' <li  id="langs"><div id="selectLanguageDropdown" style="width:80px;" class="localizationTool"></div></li>
                                            <li id="kitchens" class="tooltipp1" title="المطبخ"><a href="index.php?action=kitchenn"><img src="images/top-icon-05.png"/></a></li>
                                            <li id="kitchens" ><a class="tooltipp1" title="إرسال تنبيه" href="#" data-toggle="modal" data-placement="top" data-target="#addTicket"><img src="images/top-icon-03.png"/></a></li>';
                                   } 
                                   if($loggedUser['level_ID']==7){
                                        $men=' <li  id="langs"><div id="selectLanguageDropdown" style="width:80px;" class="localizationTool"></div></li>'
                                                . '<li id="kitchens" ><a class="tooltipp1" title="إرسال تنبيه" href="#" data-toggle="modal" data-placement="top" data-target="#addTicket"><img src="images/top-icon-03.png"/></a></li>';
                                    }
                                     if($loggedUser['level_ID']==6){
                                        $men=' <li  id="langs"><div id="selectLanguageDropdown" style="width:80px;" class="localizationTool"></div></li>
                                            <li id="kitchens" class="tooltipp1" title="المطبخ"><a href="index.php?action=kitchenn"><img src="images/top-icon-05.png"/></a></li>
                                            <li id="kitchens" ><a class="tooltipp1" title="إرسال تنبيه" href="#" data-toggle="modal" data-placement="top" data-target="#addTicket"><img src="images/top-icon-03.png"/></a></li>';
                                    }
                                     if($loggedUser['level_ID']==3){
                                        $men=' <li  id="langs"><div id="selectLanguageDropdown" style="width:80px;" class="localizationTool"></div></li>
                                            <li id="kitchens" class="tooltipp1" title="المطبخ"><a href="index.php?action=kitchenn"><img src="images/top-icon-05.png"/></a></li>
                                            <li id="kitchens" ><a class="tooltipp1" title="إرسال تنبيه" href="#" data-toggle="modal" data-placement="top" data-target="#addTicket"><img src="images/top-icon-03.png"/></a></li>';
                                    }
                                    if($loggedUser['level_ID']==4){
                                        $men=' <li  id="langs"><div id="selectLanguageDropdown" style="width:80px;" class="localizationTool"></div></li>
                                            <li id="kitchens" class="tooltipp1" title="المطبخ"><a href="index.php?action=kitchenn"><img src="images/top-icon-05.png"/></a></li>
                                            <li id="kitchens" ><a class="tooltipp1" title="إرسال تنبيه" href="#" data-toggle="modal" data-placement="top" data-target="#addTicket"><img src="images/top-icon-03.png"/></a></li>';
                                    }
                                    if($loggedUser['level_ID']==5){
                                        $men=' <li  id="langs"><div id="selectLanguageDropdown" style="width:80px;" class="localizationTool"></div></li>
                                            <li id="kitchens" class="tooltipp1" title="المطبخ"><a href="index.php?action=kitchenn"><img src="images/top-icon-05.png"/></a></li>
                                            <li id="kitchens" ><a class="tooltipp1" title="إرسال تنبيه" href="#" data-toggle="modal" data-placement="top" data-target="#addTicket"><img src="images/top-icon-03.png"/></a></li>';
                                    }
                              ?>

					<ul class="nav navbar-nav">
                     <li id="statuss"    style="cursor: pointer;"  title='الحالة'>
                     <select name="webmenu" id="webmenu" style='width:120px;' >
                        <?php 
                            $break=array();
                            $break=getAllBreak();
                            foreach($break as $b) {
                                //if($b['value']=='متصل')
                                echo "<option value='".$b['value']."' title='images/status/".$b['photo']."'>".$b['value']."</option>";
                            }
                        ?>
                        </select>
                          </li>
                   
                     <?php 
                     echo $men;
                       
                    ?>

                    <?php //check the rights
                       // echo $rights[0]['supe'];
                         if(($rights[0]['supe']=='R') || ($rights[0]['supe']=='RW')) {
                    ?>
                    
                    <li id="superss" class="topmenu-text border-left "><a href="index.php?action=supervision_users/supervisionn">صفحة المراقبة</a></li>
                    
					
					
					
                    <?php 
                            
                        }
                    ?>
                   </ul>
                   <ul class="nav navbar-nav navbar-right">  
                    <?php 
                      // elseif ($loggedUser['level_ID']=='4'){
                     if(($rights[0]['cons']=='R') || ($rights[0]['cons']=='RW')) {    
                            
                       
                    ?>
                        <li class="topmenu-text border-left">
                            <a href="index.php?action=consultation/index">طلب إستشارة</a></li>
                    <?php 
                        }
                       // else {}
                    ?>
                       <?php 
                                  if ($loggedUser['level_ID']!='7'){
                       ?>   

                        <li id="mainn" class="topmenu-text" style='border-left: 1;'><a href="index.php?action=mainpage">الصفحة الرئيسية </a></li>	
                        <li class="dropdown tooltipp1" id="liNotificationDropDown" title='الإشعارات'>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
                               aria-haspopup="true" aria-expanded="false">
                                 <span title="Notifications" ><img src="images/top-icon-06.png"/></span>
                            <font class="badge badge-important" id='notification_counter' ></font>
                            </a>
                         <ul class="dropdown-menu notific-text"  id="notification_dropdown" role="menu">
			</ul>
                        </li>
                        <li class="dropdown" id="liNotificationemails">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span  title="Emails"></span> <img src="images/top-icon-07.png"/></span>
                            <font class="badge badge-important" id='notification_counter1' ></font>
                            </a>
                        <ul class="dropdown-menu notific-text"  id="notification_emails">
			</ul>
                        </li>
                       
                            <?php 
                                  }

                            ?>
                        <li class="dropdown border-none"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php 
                            if($users[0]['photo']==''){
                                echo '<img class="circular" alt="الصورة ليست موجودة" src="./server/php/files/noimage.gif" />';
                            }
                            else {
                                echo '<img class="circular" alt="الصورة ليست موجودة" src="./server/php/files/'.$users[0]['photo'].'" />';
                            }
                        ?>
                                
                                 <?php echo $loggedUser["fname"] . " " . $loggedUser["lname"] ?>
                               
                            </a>
                         <ul class="dropdown-menu" style='width:140px;'>
								<li >
                                                                    <a href="<?php echo  'index.php?action=editestaff&estaffid='.$users[0]['ID']; ?>">
                                                                    الملف الشخصي
                                                                    </a>
								</li>
								
								
								<li class="divider">
								</li>
								  <li><a  id='logout' style='cursor: pointer;'>تسجيل خروج</a></li>
							</ul>
                        </li>
                        
						
					</ul>
                                <?php 
                                  }
                                
                                ?>
				</div>
				
			</nav>
			
		</div>
            
	</div>
      
  </div>  
    
</div> 

 
<div class="logo">
<div class="container">
 <div class="row">
   <div class="col-sm-12">

    <div class="logo-in"> <img src="images/logo.png"/></div>
   </div>
 </div>
 
 </div>
    
</div>  

<script>
    function CreateNode (parent,childType, ID, childClass, href, InnerHTML) {
        var child ;
        // childType must be String 
        if(typeof (childType) === "string" ){
            child =  document.createElement(childType);
        }else {
            console.log("childType is not of type String: "+childType+" type: "+typeof (childType));
            return false ; 
        }
        // check if the child ID is not empty in order to add it or not ... 
        if(ID.replace(" ", "") !== "" && ID.replace(" ", "") !== null ){
            child.id = ID ; 
        }
        // check if childClass is not empty in order to add it .. 
        if(childClass.replace(" ", "") !== "" && childClass.replace(" ", "") !== null ){
            child.className = childClass ; 
        }
        // check if href is not empty in order to add it .. 
        if(href.replace(" ", "") !== "" && href.replace(" ", "") !== null ){
            // also must check if the childtype == a in order to add the href ... 
            if(childType === "a"){
                child.href = href ; 
            }else{
                console.log("childType cannot take href ");
                return false ; 
            }
        }
        // check if InnerHTML is not empty in order to add it .. 
        if(InnerHTML.replace(" ", "") !== "" && InnerHTML.replace(" ", "") !== null ){
            child.innerHTML = InnerHTML ; 
        }
        parent.appendChild(child);
        return child ; 
    } 
    function RemoveNode(parent , child){
        if(parent.hasChildNodes()){
            parent.removeChild(child);
            console.log("child element removed") ;
            return true ; 
        }else{
            console.log("can not remove child element") ;
            return false ; 
        }
        return true ; 
    }
	

</script>

<?php 
include_once 'addTicketModal.php';
?>

