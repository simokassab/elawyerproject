 <script>
                var missions = <?php echo json_encode($missions); ?> ;
                var cases = <?php echo json_encode($casesss); ?>;
                var events = <?php echo json_encode($events); ?>;
                
   
            </script>
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
       
         <div class="left-box03 margin-botm-25" >
              <div class="tabbable">
                  <ul class="nav nav-tabs nav-justified">
                      <li class="active"><a href="#one" data-toggle="tab">تويتر<br/><br/></a></li>
                    <li><a href="#two" data-toggle="tab">فيسبوك<br/><br/></a></li>
                    <li ><a href="#twee" data-toggle="tab">  أخبار المكتب</a></li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="one">
                     <a class="twitter-timeline" href="https://twitter.com/techoffice_co" data-widget-id="697358038169210881">Tweets by @techoffice_co</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
 
                    </div>
                    
                    <div class="tab-pane" id="two">
                        <div class="fb-page" data-href="https://www.facebook.com/techoffice.co" data-tabs="timeline" 
                             data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" 
                             data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/techoffice.co">
                                    <a href="https://www.facebook.com/techoffice.co">Techoffice</a></blockquote></div></div>
                    </div>
                    <div class="tab-pane" id="twee">
                         أخبار المكتب
                    </div>

                  </div>
                </div>
         <!------------>
       </div>
       
     </div>
     <div class="col-sm-9">
     
     <div class="right-side">
     
    