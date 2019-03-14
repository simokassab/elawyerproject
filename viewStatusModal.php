<script>
    function viewEvent(eventID){
        event = events[eventID];
        //alert(JSON.stringify(event, null, 2));
        document.getElementById("eid").value = event['ID'];
        document.getElementById("vedatee").value = event['datee'];
        document.getElementById("caseID").value = event['case_ID'];
        document.getElementById("event").value = event['event'];
        document.getElementById("Eventcomments").value = event['comments'];
        document.getElementById("eventStartTime").value = event['starttime'];
        document.getElementById("eventEndTime").value = event['endtime'];
    }

</script>
﻿<!-- Modal -->
<div id="viewEvent" class="modal fade" role="dialog" style="direction:rtl">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-warning">
                <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h4 class="modal-title">اضافة احداث</h4>
            </div>
            <div class="modal-body">
                <div id="addEventBox" style=" margin-top:50px" class="mainbox col-md-12  col-sm-8 ">
                    <div class="panel panel-info">
                        <div class="panel-body" style="direction:rtl;" >
                            <form id="addMission" class="form-horizontal" role="form" action="DBS/updateEvent.php" method="post">
                                <input type="hidden" id="eid" name="eid"/>
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">التاريخ </label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" id="vedatee" name="vedatee" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="email" class="col-md-3 control-label">قضية </label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="caseID" name="caseID">
                                            <?php for ($i = 0; $i < count($casesss); $i++) {
                                                $case = $casesss[$i]; ?>
                                                <option value="<?php echo $case['ID'] ?>"><?php echo $case['subject'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label"> اسم الحدث</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" id="event" class="form-control" name="event" placeholder=" ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="email" class="col-md-3 control-label">تعليق</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" id="Eventcomments" class="form-control" name="comments" placeholder=" ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="email" class="col-md-3 control-label">وقت البدء</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" id="eventStartTime" class="form-control" name="startTime" placeholder=" ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="email" class="col-md-3 control-label">وقت الانتهاء</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" id="eventEndTime" class="form-control" name="endTime" placeholder=" ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <input  type="submit" id="btn-signup" type="button" class="btn btn-primary" value="تحديث">
                                         <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
               
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    // When the document is ready
    $(document).ready(function() {
      
        $('#eventStartTime').datetimepicker({
    	formatTime:'H:i:00',
    	formatDate:'Y-m-d',
    	timepickerScrollbar:false
        });
        $('#eventEndTime').datetimepicker({
    	formatTime:'H:i:00',
    	formatDate:'Y-m-d',
    	timepickerScrollbar:false
        });
        $('#vedatee').datetimepicker({
    	timepicker:false,
            format:'Y-m-d'
        });
       
    });
</script>