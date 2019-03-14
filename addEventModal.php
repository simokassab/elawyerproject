<!-- Modal -->


<div id="addEvent" class="modal fade" role="dialog" style="direction:rtl; height: 400px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-warning">
                <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h4 class="modal-title">اضافة احداث</h4>
            </div>
            <div class="modal-body">
                <div id="addEventBox" style=" margin-top:0px" class="mainbox col-md-12  col-sm-8 ">
                    <div class="panel panel-info"> 
                        <div class="panel-body" style="direction:rtl;" >
                            <form id="addMission" class="form-horizontal" role="form" action="DBS/addEvent.php" method="post">
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="email" class="col-md-3 control-label">قضية </label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="caseID">
                                            <?php for ($i = 0; $i < count($casesss); $i++) {
                                                $case = $casesss[$i]; ?>
                                                <option value="<?php echo $case['ID'] ?>"><?php echo $case['subject'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">الحدث</label>
                                    <div class="col-md-9">
                                       <textarea rows="5" class="form-control" id='event' name="event" placeholder=" "></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <input  type="submit" id="btn-signup" type="button" class="btn btn-primary" value="اضافة">
                                           <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
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
     String.prototype.toIndiaDigits= function(){
        var id= ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
        return this.replace(/[0-9]/g, function(w){
         return id[+w];
        });
       } 
    $(document).ready(function() {
      
       $('#startTimee').datetimepicker({
	formatTime:'H:i:00',
	formatDate:'Y-m-d',
	timepickerScrollbar:false
    });
    $('#endTimee').datetimepicker({
	formatTime:'H:i:00',
	formatDate:'Y-m-d',
	timepickerScrollbar:false
    });
    $('#dateee').datetimepicker({
	timepicker:false,
        format:'Y-m-d'
    });
       
    });
    
</script>