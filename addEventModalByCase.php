<!-- Modal -->

<?php 

$case=array();
if(isset($_GET['id']))
$case=getCaseByID($_GET['id']);
//print_r($case);
?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#event_type').on('change', function() {
            if($("#event_type option:selected").text()=='إختيار الإجراء'){

            }
            else {
                $('#event_').val($("#event_type option:selected").text());
            }
        });
        $("#event_type").select2({
          placeholder: "Select a state",
          dir: "rtl"
        });
    });
</script>
<div id="addEventByCase" class="modal fade" role="dialog" style="direction:rtl; height:600px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-warning">
                <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h4 class="modal-title">اضافة إجراء</h4>
            </div>
            <div class="modal-body">
            <?php //echo $case[0]['subject']; ?>
                <div id="addEventBox" style=" margin-top:0px" class="mainbox col-md-12  col-sm-8 ">
                  
                    <h5>قضية للموكل: <?php echo $customer_[0]['cfname'].' '.$customer_[0]['csname'].' '.$customer_[0]['ctname'].' '.$customer_[0]['clname'];  ?></h5>
                            <form id="addMission" class="form-horizontal" role="form" action="DBS/addEvent.php" method="post">
                            
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">القضية </label>
                                    <div class="col-md-9">
                                        <input disabled="" value="<?php echo $case[0]['subject'].'_'.$case[0]['ID'];  ?>" type="text" class="form-control" id="CaseName" name="CaseName" placeholder="">
                                    </div>
                                </div>
                                <input type='hidden' name='caseID' id='caseID' value='<?php echo $case[0]['ID']; ?>' >
                                   <input type='hidden' name='ByCase' id='ByCase' value='1' >
                                <div class="form-group">
                                        <label style="float: right" for="email" class="col-md-3 control-label">الإجراء</label>
                                        <div class="col-md-9" >
                                            <select  class="form-control" style='width:100%; direction: rtl;'  id="event_type" name="event_type">
                                                <option  value='null' selected="">إختيار الإجراء</option>
                                                <?php
                                                    $types=getEventsType();
                                                    foreach($types as $t) {
                                                        echo "<option value='".$t['name']."'>".$t['name']."</option>";
                                                    }
                                                 ?>
                                            </select>
                                        </div>
                                    </div>   
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">الإجراء</label>
                                    <div class="col-md-9">
                                        <textarea rows="5" class="form-control" id='event_' name="event" placeholder=" "></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">الجلسة القادمة</label>
                                    <div class="col-md-9">
                                        <input  required="" type="text" id="startDateev" class="form-control" name="startDateev" placeholder="">
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
            <div class="modal-footer">
             
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    // When the document is ready
    $(document).ready(function() {
        $('#startDateev').datetimepicker({
            timepicker:false,
        format:'Y-m-d'
        });

    });
</script>