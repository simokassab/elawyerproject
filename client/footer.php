<?php
//echo time_elapsed_string('2013-05-01 00:22:35');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="videe">
<div id="selectLanguageDropdown" style="width:80px;" class="localizationTool"></div>
 <footer>
       <div class="footer">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <div class="footer-left">e-Lawyer الحقوق محفوظة إلى</div>
            </div>
            <div class="col-sm-6">
              <div class="footer-right"><img src="../images/footer-logo.png"/></div>
            </div>
          </div>
        </div>
       </div>
     </footer>  
 </div>
<script>	
	if(logged_in){
    // get notification every 5 minites .... 300000
    var getnotefication = window.setInterval(function(){ GetNotefication();}, 4000);
    var notification_status = true;
    function GetNotefication (){
        try{
        if(notification_status){
            notification_status = false;
            $.ajax({
                type: "POST",
                url: "getCustomerNotification.php",
                success:function(data) {
                    parsedData = JSON.parse(data);
                    if(parsedData.length > 0){
                        var count_=parsedData.length-1;
                    var count_unread=parsedData[count_].count;
                    // getting the element of the li element that contain all the nodes.. 
                    var liNotificationDropDown = document.getElementById("liNotificationDropDown");
                        // must check if ul notification_dropdown still exist or have been removed before ...
                        // if it exist must remove it then re create it in order not to repeat the same notification ... 
                        // if it doesnt exist only  create it ... 
                        var notification_dropdown =document.getElementById("notification_dropdown");
                        if(notification_dropdown !== null){
                            RemoveNode(liNotificationDropDown,notification_dropdown);
                            notification_dropdown = CreateNode(liNotificationDropDown,"ul","notification_dropdown","dropdown-menu","","");
                        }else{
                            notification_dropdown = CreateNode(liNotificationDropDown,"ul","notification_dropdown","dropdown-menu","","");
                        }
                       // document.getElementById("notification_dropdown").innerHTML = '<li class="titlebar"><span class="title">Notifications</span> <span class="settings"><i class="icon-cog"></i></span></li>';                        


                        var divbox = CreateNode(notification_dropdown,"div","","notifbox","","");
                        if(count_>5){
                            count_=5;
                        }
                        else {
                           // cnt=parsedData.length;
                        }
                       // alert(cnt);
                        for(var i = 0 ; i  < count_ ; i++){
                            var Notification = parsedData[i];
                            if(Notification['status']=='NOTREAD'){
                                 var notification_item = CreateNode(divbox,"li",Notification['id'],"notice_unread","","");
                         
                                 href = "<?php echo "notificationHandler.php?" ?>"+"id="+Notification['id'];

                                    innerHTML = "<div  id='"+Notification['id']+"' >"+ Notification['title']+"  <br/><span style='font-size:10px; ' >"+Notification['date']+" </span></div>";
                            }
                            else {
                                var notification_item = CreateNode(divbox,"li",Notification['id'],"notice","","");
                         
                                 href = "<?php echo "notificationHandler.php?" ?>"+"id="+Notification['id'];

                                innerHTML = "<div  id='"+Notification['id']+"' >"+ Notification['title']+"   <br/><span style='font-size:10px; ' >"+Notification['date']+"</div>";
                            }
                            

                           
                           var a = CreateNode(notification_item,"a","","form-horizontal",href,innerHTML); 
                      

                        }
                     document.getElementById("notification_dropdown").innerHTML += "<center><a style='color:#095584; text-decoration: underline;' href='index.php?action=allnotifications'>عرض الكل</a></center><br/>";
                    if(count_unread>0){
                        document.title="ELAWYER.CO ("+count_unread+")";
                        document.getElementById("notification_counter").innerHTML = count_unread;
                    }
                    notification_status = true;

                    } ////////////////////////////////////////////////////
                  else {

                        var liNotificationDropDown = document.getElementById("liNotificationDropDown");
                        // must check if ul notification_dropdown still exist or have been removed before ...
                        // if it exist must remove it then re create it in order not to repeat the same notification ... 
                        // if it doesnt exist only  create it ... 
                        var notification_dropdown =document.getElementById("notification_dropdown");
                        if(notification_dropdown !== null){
                            RemoveNode(liNotificationDropDown,notification_dropdown);
                            notification_dropdown = CreateNode(liNotificationDropDown,"ul","notification_dropdown","dropdown-menu","","");
                        }else{
                            notification_dropdown = CreateNode(liNotificationDropDown,"ul","notification_dropdown","dropdown-menu","","");
                        }

                      document.getElementById("notification_dropdown").innerHTML += "<br/><center>لا يوجد اشعارات</center><br/>";
                      notification_status = true;
                  }
                }
            });
        };
        }catch(err){
            console.log("Exception "+err);
           // return false ; 
        }
        /*******************************************/
       
    }
    
}
/**if(logged_in){
    // get notification every 5 minites .... 300000
    var getnotefication1 = window.setInterval(function(){ GetNoteficationEmail();}, 4000);
    var notification_status1 = true;
    function GetNoteficationEmail (){
        try{
        if(notification_status1){
            notification_status1 = false;
            $.ajax({
                type: "POST",
                url: "checkemail/index.php",
                success:function(data) {
                 //  alert(data);
                    // getting the element of the li element that contain all the nodes.. 
                    var liNotificationemails = document.getElementById("liNotificationemails");
                  //  var liNotificationDropDown_mobile = document.getElementById("liNotificationDropDown_mobile"); 
                //  alert(data);
                 //   alert(data.indexOf("videee"));
                 var emails = data.split("##");
                // alert(emails.length);
                    if(emails.length>1){
                        //document.title="ELAWYER.CO ("+parsedData.length+")";
                        // must check if ul notification_dropdown still exist or have been removed before ...
                        // if it exist must remove it then re create it in order not to repeat the same notification ... 
                        // if it doesnt exist only  create it ... 
                        var notification_emails =document.getElementById("notification_emails");
                        if(notification_dropdown !== null){
                            RemoveNode(liNotificationemails,notification_emails);
                            notification_emails = CreateNode(liNotificationemails,"ul","notification_emails","dropdown-menu","","");
                        }else{
                            notification_emails = CreateNode(liNotificationemails,"ul","notification_emails","dropdown-menu","","");
                        }
                    
			//var emails = data.split("##");
                        for(var i = 0 ; i  < emails.length-1 ; i++){
                          //  var Notification = parsedData[i];
                          //
                            var notification_item1 = CreateNode(notification_emails,"li","","","","");
                           // var notification_item_mobile = CreateNode(notification_dropdown_mobile,"li","","","",""); 
                           //var li_mobile = document.createElement("LI");

                            href1 = "/webmail/";
                            innerHTML1 = "<label class='lblnotification'>"+ emails[i]+"</label>";
                            //innerHTML = "<span style='position:inline' class='glyphicon glyphicon-plane'></span><span style='float:left'> Reservation Has Been Booked <br> From "+PASNotification['segments'][0]['departure_city_name_en']+
                                  //      " To "+PASNotification['segments'][0]['destination_city_name_en']+" "+triptype+"</span>";
                           //alert(emails[i]);
                           var a1 = CreateNode(notification_item1,"a","","form-horizontal",href1,innerHTML1); 
                           a1.target='_blank';
                            //var a_mobile = CreateNode(notification_item_mobile,"a","","",href,innerHTML);

                        }
                        //alert(emails.length);
                        document.getElementById("notification_counter1").innerHTML = "";
                        document.getElementById("notification_counter1").innerHTML = emails.length-1;

                       // return;
                     //   document.getElementById("notification_counter_mobile").innerHTML = " ";
                       // document.getElementById("notification_counter_mobile").innerHTML = parsedData['PASNotification'].length;
                    }else{
                        try{
                            document.getElementById("notification_counter1").innerHTML = "";
                            document.getElementById("notification_emails").innerHTML = "<a href='webmail/'>لا يوجد أي اشعارات</a>";
                          //  document.getElementById("notification_counter_mobile").innerHTML = "";
                            // must remove the ul element inside the li in order not to show empty drop down ... 
                            if(notification_emails != null){
                                liNotificationemails.removeChild(notification_emails);
                            }
                          /*  if(notification_dropdown_mobile != null){
                                liNotificationDropDown_mobile.removeChild(notification_dropdown_mobile);
                            }*/
                       // }catch(err){
                          //  console.log("Exception "+err);
                      //  }
                 //   }
                 //   notification_status1 = true;
           //     }
          //  });
     //   };
      //  }catch(err){
       //     console.log("Exception "+err);
           // return false ; 
      //  }
        /*******************************************/
       
  //  }
    
//} **/

</script>

<!-- YAMLI CODE START -->

<script type="text/javascript" src="../JS/apiyamli.js"></script>
<script type="text/javascript">
    if (typeof(Yamli) == "object" && Yamli.init( { uiLanguage: "en" , startMode: "onOrUserDefault" } ))
    {
        Yamli.yamlify( "firstname", { settingsPlacement: "inside" } );
        Yamli.yamlify( "lastname", { settingsPlacement: "inside" } );
        Yamli.yamlify( "subject", { settingsPlacement: "inside" } );
        Yamli.yamlify( "description", { settingsPlacement: "inside" } );
        Yamli.yamlify( "fname", { settingsPlacement: "inside" } );
        Yamli.yamlify( "sname", { settingsPlacement: "inside" } );
         Yamli.yamlify( "tname", { settingsPlacement: "inside" } );
          Yamli.yamlify( "lname", { settingsPlacement: "inside" } );
    Yamli.yamlify( "description", { settingsPlacement: "inside" } );
    Yamli.yamlify( "houseType", { settingsPlacement: "inside" } );
    Yamli.yamlify( "kasema", { settingsPlacement: "inside" } );
    Yamli.yamlify( "street", { settingsPlacement: "inside" } );
    Yamli.yamlify( "address", { settingsPlacement: "inside" } );
     Yamli.yamlify( "comment_kitchen", { settingsPlacement: "inside" } );
     Yamli.yamlify( "fnn", { settingsPlacement: "inside" } );
     Yamli.yamlify( "tnn", { settingsPlacement: "inside" } );
     Yamli.yamlify( "lnn", { settingsPlacement: "inside" } );
     Yamli.yamlify( "case_subject", { settingsPlacement: "inside" } );
     Yamli.yamlify( "address", { settingsPlacement: "inside" } );
     Yamli.yamlify( "phone1", { settingsPlacement: "inside" } );
     Yamli.yamlify( "company", { settingsPlacement: "inside" } );
     Yamli.yamlify( "snn", { settingsPlacement: "inside" } );
     Yamli.yamlify( "address", { settingsPlacement: "inside" } );
     Yamli.yamlify( "address", { settingsPlacement: "inside" } );
     Yamli.yamlify( "customers", { settingsPlacement: "inside" } );
     
     Yamli.yamlify( "title", { settingsPlacement: "inside" } );
     Yamli.yamlify( "comments", { settingsPlacement: "inside" } );
     Yamli.yamlify( "desc", { settingsPlacement: "inside" } );
     Yamli.yamlify( "customers", { settingsPlacement: "inside" } );
     Yamli.yamlify( "oppoDesc", { settingsPlacement: "inside" } );
     Yamli.yamlify( "customerDesc", { settingsPlacement: "inside" } );
     Yamli.yamlify( "ofirstname", { settingsPlacement: "inside" } );
    Yamli.yamlify( "olastname", { settingsPlacement: "inside" } );
    Yamli.yamlify( "titlee", { settingsPlacement: "inside" } );
    Yamli.yamlify( "subject", { settingsPlacement: "inside" } );
    Yamli.yamlify( "descriptionn", { settingsPlacement: "inside" } );
     Yamli.yamlify( "event", { settingsPlacement: "inside" } );
    }
</script>