<?php 
//echo  $_SESSION['user']['idd'];
$users= GetUserByID($_SESSION['user']['idd']);
?> 
<script>
function isInt(value) {
  return !isNaN(value) && (function(x) { return (x | 0) === x; })(parseFloat(value))
}
        $(document).ready(function() {
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
                events: "schedule/viewappoint.php",
               
                selectable: true,
                eventClick:  function(event, jsEvent, view) {
                var whenn=event.start.format('YYYY-MM-DD HH:mm:ss') + '  -   '+ event.end.format('YYYY-MM-DD HH:mm:ss');
                 var str=new Array();
                        str= event.title.split("-");
                // alert(str[1]);
                 var urll="";
                 urll=event.url;
               //  alert(urll);
               
                 if (isInt(urll)) {
                  //alert(urll);
                  $("#usertype").html('المستخدم');
                    $('#modalTitle').html(str[0]);
                    $('#modalwhen').html(whenn);
                    $('#modalBody').html(event.description);
                    $('#modaluser').html(str[1]);
                    $('#fullCalModal').modal();
                    return false;
                 }
                 else {
                   // alert("ddd");
                     var logged='';
                    var logged= <?php echo $_SESSION['user']['level_ID'];?>;
                    //alert(logged);
                    if(logged==4){
                        $("#modalurl").attr("href", urll);  
                        $("#modalurl").html('<button class="btn btn-primary">إرسال للمحامي</button>'); 
                        $('#modalTitle').html(str[0]);
                        $('#modalwhen').html(whenn);
                        $('#modalBody').html(event.description);
                        $('#modaluser').html(str[0]);
                        $('#fullCalModal').modal();
                        return false;
                      }
                      else if(logged==2){
                        $("#usertype").html('الموضوع');    
                        $('#modalTitle').html(str[0]);
                        $('#modalwhen').html(whenn);
                        $('#modalBody').html(event.description);
                        $('#modaluser').html(event.title);
                        $('#fullCalModal').modal();
                        return false;
                      }
                      else {
                          $("#usertype").html('الموضوع');  
                          $('#modalTitle').html(event.title);
                        $('#modalwhen').html(whenn);
                        $('#modalBody').html(event.description);
                        $('#modaluser').html(event.title);
                        $('#fullCalModal').modal();
                        return false;
                      }
                 }
                
                
             

                },
                //header and other values
                select: function(start, end, allDay) {
                    endtime = moment(end).format('YYYY-MM-DD HH:mm:ss');
                    starttime = moment(start).format('YYYY-MM-DD HH:mm:ss');
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
                //alert("fff");
                var userr= <?php echo $_SESSION['user']['idd']; ?>;
                if($('#title').val()!=""){
                $(".bs-example-modal-lg").modal('hide');
                console.log($('#apptStartTime').val());
                console.log($('#apptEndTime').val());
                console.log($('#apptAllDay').val());
                    $.ajax({
                        url: 'schedule/addapoint.php',
                        data:'userr='+userr+'&title=' +  $('#title').val() + '&start=' + $('#apptStartTime').val() +
                        '&end=' + $('#apptEndTime').val() + '&description=' + $('#desc').val()+
                        '&priv='+ $('#priv').val() ,
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
                        color: '<?php echo $_SESSION['user']['color']; ?>',
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
            width: 300px;
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
<div id="calendar" style="width: 100%;"></div>
<div id="fullCalModal" class="modal fade" style="direction: rtl; height:600px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-warning">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                <h4 id="modalTitle" class="modal-title"></h4>
            </div>
            <label class="control-label" for="modaluser" id="usertype" >المستخدم:</label>
                 <div id="modaluser" class="modal-body" style="direction: rtl; height:50px;"></div>
            <label class="control-label" for="modalBody">التفاصيل:</label>
                 <div id="modalBody" class="modal-body" style="direction: rtl; height:50px;"></div>
          
            <label class="control-label" for="modalwhen">التاريخ-الوقت:</label>
           
            <div id="modalwhen" class="modal-body" style="direction: rtl; height:50px;"></div>
            <br/>
            <a  id="modalurl">
                
            </a> <br/><br/>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="modal fade bs-example-modal-lg "  role="dialog" aria-labelledby="myLargeModalLabel" style="direction: rtl; height:500px;">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header modal-header-warning">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 id="myModalLabel1" >موعد 
                    </h3>
                </div>
                <div class="modal-body">
                    <form id="createAppointmentForm" class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label" for="title">الموضوع:</label>
                            <div class="controls">
                                <input type="text" name="title"  id="title"  class="form-control"
                                       data-provide="typeahead" value="" >

                            </div>
                           
                            <label class="control-label" for="desc">تفاصيل الموعد</label>
                            <div class="controls">
                            <textarea cols="130"  rows="5"
                                      name="desc" id="desc" class="form-control"></textarea>
                            <input type="hidden" id="apptStartTime"/>
                            <input type="hidden" id="apptEndTime"/>
                            <input type="hidden" id="apptAllDay" />
                                </div>
                         <div class="controls"><br/>
                               <select required="" id="priv" type="text" class="form-control" name="priv" placeholder=" ">
                                    <option value="عام">عام</option>
                                    <option value="خاص">خاص</option>
                                </select>

                         </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="when">تاريخ الموعد:</label>
                            <div class="controls controls-row" id="when" style="margin-top:5px; height:50px;">
                            </div>
                            
                        </div>
                    </form>
                    <div class="control-group">
                    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><b>
                        إلغاء
                        </b></button>
                    <button type="submit" class="btn btn-primary" id="submitButton"><b>حفظ</b></button>
                </div><br/><br/>
                </div>
                
            </div>
        </div>
    </div>
</div>