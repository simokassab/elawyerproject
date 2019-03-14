<?php

if(!empty($_SESSION)){

}
else {
    header('location:index.php?action=body');
}
if(!isset($_GET['id'])){
    header("Location: ../notFound.php") ;
}
$id=$_GET['id'];
$appoint="";
$lawyer="";
$fname="";
$lname="";
$customer="";
$subject="";
$cons_type="";
$desc="";
$subject="";
$result="";
$con=connectDB($_SESSION['office']);

mysqli_query($con,"SET NAMES 'utf8'");
mysqli_query($con,'SET CHARACTER SET utf8');
$query="select * from alarm_consultation where id=$id ";
  //echo $query;
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $row = mysqli_fetch_assoc($result);
   // if($row['status']=='YES'){
        $appoint=$row['appoint'];
       // echo $appoint;
        $lawyer=$row['lawyer_ID'];
        $fname=$row['firstname'];
        $lname=$row['lastname'];
        $customer=$row['customer'];
        $subject=$row['subject'];
        $cons_type=$row['consult_type'];
        $desc=$row['description'];

   // }
   // else {
   //     header("location: index?action=consultation_alarm/request&id=".$_GET['id']);
   // }
}

$arr=array();
$content="";
$law=explode(",",$lawyer);
if($law==""){


foreach($law as $l){

$arr=GetUserByID($l);
   // print_r($arr);
    $content.="<li>".$arr[0]['fname']." ".$arr[0]['lname'];
}

}


mysqli_close($con);
$conn=connectDB($_SESSION['office']);
mysqli_query($conn,"SET NAMES 'utf8'");
mysqli_query($conn,'SET CHARACTER SET utf8');

    $query="select fname, lname from users where id=$appoint ";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($result);
        $cons_fname=$row['fname'];
        $cons_lname=$row['lname'];

    }
    else {
        echo "Error";
    }
if($customer!="") {
    $cust = array();
    $cust = GetCustomerByID($customer);
}


mysqli_close($conn);





?>
    <script>

        $(document).ready(function() {
           $("#alert").modal();
            var idd=<?php echo $id; ?> ;
            var conss=<?php echo $appoint; ?> ;
            var calendar = $('#calendar').fullCalendar({
                 lang: 'ar',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                businessHours: {
                    start: '08:00', // a start time (10am in this example)
                    end: '17:00', // an end time (6pm in this example)

                    dow: [ 0, 1, 2, 3, 4, 6 ]
                    // days of week. an array of zero-based day of week integers (0=Sunday)
                    // (Monday-Thursday in this example)
                },
                defaultView: 'agendaWeek',
                events: "calendar_alarm/events.php?id="+conss,
                selectable: true,
                eventClick:  function(event, jsEvent, view) {
                    if (event.url) {

                        var whenn=event.start.format('YYYY-MM-DDTHH:mm:ss') + '  -   '+ event.end.format('YYYY-MM-DDTHH:mm:ss');
                        $('#modalTitle').html(event.title);
                        $('#modalwhen').html(whenn);
                        $('#modalBody').html(event.description);
                        $('#eventUrl').attr('href',event.url);
                        $('#fullCalModal').modal();
                        return false;
                    }

                },
                //header and other values
                select: function(start, end, allDay) {
                    endtime = moment(end).format('YYYY-MM-DDTHH:mm:ss');
                    starttime = moment(start).format('YYYY-MM-DDTHH:mm:ss');
                    var mywhen = starttime + ' - ' + endtime;
                    $('.bs-example-modal-lg #apptStartTime').val(starttime);
                    $('.bs-example-modal-lg #apptEndTime').val(endtime);
                    $('.bs-example-modal-lg #apptAllDay').val(allDay);
                    $('.bs-example-modal-lg #when').text(mywhen);
                    $('.bs-example-modal-lg').modal('show');
                }
            });

            $('#submitButton').on('click', function(e){
                // We don't want this to act as a link so cancel the link action
                e.preventDefault();

                doSubmit();
            });

            function doSubmit(){
                if($('#title').val()!=""){
                 if(window.location.hostname=='localhost') 
                    {
                         var urll='http://'+ window.location.hostname +'/DEVE/index.php?action=consultation_alarm/request';
                    }
                    else 
                    {
                        var urll='http://'+ window.location.hostname +'/index.php?action=consultation_alarm/request';
                    }
                  //  alert(urll);
                $(".bs-example-modal-lg").modal('hide');
                console.log($('#apptStartTime').val());
                console.log($('#apptEndTime').val());
                console.log($('#apptAllDay').val());
                    $.ajax({
                        url: 'calendar_alarm/add_events.php',
                        data: 'title=' + $('#with').val() + '-'+ $('#title').val() + '&start=' + $('#apptStartTime').val() +
                        '&end=' + $('#apptEndTime').val() + '&description=' + $('#desc').val()+
                        '&consultation_ID='+ idd +'&url='+urll,
                        type: "GET",
                        success: function (json) {
                            setTimeout(

                                function()
                                {
                                    window.location.href = 'index.php?action=mainpage';

                                }, 1000);

                        }
                    });
                $("#calendar").fullCalendar('renderEvent',
                    {
                        title: $('#title').val(),
                        start: new Date($('#apptStartTime').val()),
                        end: new Date($('#apptEndTime').val()),
                        color: 'red',
                        allDay: false
                    },
                    true);
                calendar.fullCalendar('unselect');
                }
                  else {
                    alert("Please fill data");
                }
            }

        });

    </script>
    <style>

        .fullCalModal > div {
            width: 500px;
            position: relative;
            margin: 10% auto;
            padding: 5px 20px 13px 20px;
            border-radius: 10px;
            background: #fff;
            background: -moz-linear-gradient(#fff, #999);
            background: -webkit-linear-gradient(#fff, #999);
            background: -o-linear-gradient(#fff, #999);
        }
    </style>

<div id="alert" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content" >
            <!-- dialog body -->
            <div class="modal-body" style='height:150px;'>
                <button type="button" class="close" data-dismiss="alert">&times;</button><b>
                    لقد تم قبول طلب الإنذار من مدير المكتب.
                    <br/><br/><br/>
                الرجاء أخذ موعد للمراجع.
                </b>  </div>
            <!-- dialog buttons -->
            <div class="modal-footer"><button type="button" class="btn btn-primary" data-dismiss="modal">OK</button></div>
        </div>
    </div>
</div>
<div id="calendar" style="width: 90%;"></div>
<div id="fullCalModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                <h4 id="modalTitle" class="modal-title"></h4>
            </div>
            <label class="control-label" for="modalBody">التفاصيل:</label>
                 <div id="modalBody"></div>
            <label class="control-label" for="modalass">المشاركين::</label>
            <div id="modalass">
                <?php
                echo $content;
                ?>

            </div>
            <label class="control-label" for="modalwhen">التاريخ-الوقت:</label>
            <div id="modalwhen" ></div>
            <a id="eventUrl" target="_blank">فتح الإستشارة وارسالها</a>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<div class="container">
    <!-- Trigger the modal with a button -->
    <!-- Modal -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style='height:600px;'>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 id="myModalLabel1" style="color: orange;">موعد جديد
                    <?php
                        echo $cons_fname.' '.$cons_lname;
                    ?>
                    </h3>
                </div>
                <div class="modal-body">
                    <form id="createAppointmentForm" class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label" for="with">مع: </label>
                            <div class="controls">
                                <?php
                                    if($customer==0){
                                ?>
                                <input type="text" name="with" id="with" style="margin: 0 auto;"
                                       data-provide="typeahead" disabled="disabled" value="<?php echo $fname.' '.$lname; ?>" >
                                <?php
                                    }
                                else {
                                ?>
                                <input type="text" name="with" id="with" style="margin: 0 auto;"
                                       data-provide="typeahead" disabled="disabled"
                                       value="<?php echo $cust[0]['cfname'].' '.$cust[0]['csname'].' '.$cust[0]['ctname'].' '.$cust[0]['clname']; ?>">
                                <?php }?>
                            </div>
                            <label class="control-label" for="title">الموضوع:</label>
                            <div class="controls">
                                <input type="text" name="title" id="title" style="margin: 0 auto; width: 400px;"
                                       data-provide="typeahead" value="<?php echo $subject; ?>" >

                            </div>
                            <label class="control-label" for="modalass">المشاركين:</label>
                            <div id="modalass" >
                                <?php
                                echo $content;
                                ?>

                            </div>
                            <label class="control-label" for="desc">تفاصيل الموعد</label>
                            <div class="controls">
                            <textarea cols="130"  rows="5"
                                      name="desc" id="desc" class="form-control"><?php echo str_ireplace("<br />", "\r\n", $desc); ?></textarea>
                            <input type="hidden" id="apptStartTime"/>
                            <input type="hidden" id="apptEndTime"/>
                            <input type="hidden" id="apptAllDay" />
                                </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="when">تاريخ الموعد:</label>
                            <div class="controls controls-row" id="when" style="margin-top:5px;">
                            </div>
                        </div><br/><br/>
                         </form>
                          <button class="btn" data-dismiss="modal" aria-hidden="true"><b>
                        إلغاء
                        </b></button>
                    <button type="submit" class="btn btn-primary" id="submitButton"><b>حفظ</b></button>
                   
                </div>
            </div>
        </div>
    </div>
</div>

