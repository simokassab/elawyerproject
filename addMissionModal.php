<?php
// get all users 

?>

<!-- Modal -->
<div id="addMission" class="modal fade" role="dialog" style="direction:rtl; height:700px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-warning">
                <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h4 class="modal-title ">اضاف مهام</h4>
            </div>
            <div class="modal-body">
                <div id="addMissionBox" style=" margin-top:0px" class="mainbox col-md-12  col-sm-8 ">
                    <div class="panel panel-warning">
                        <div class="panel-body" style="direction:rtl;" >
                            <form id="addMission" class="form-horizontal" role="form" action="DBS/addMission.php" method="post">
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                <div class="form-group">
                                    <label for="email" style="float: right" class="col-md-3 control-label">مهام الى</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="UserID">
                                            <?php //print_r($usersss);
                                            
                                            for ($i = 0; $i < count($usersss); $i++) {
                                                $user = $usersss[$i]; ?>
                                                <option value="<?php echo $user['ID'] ?>"><?php echo $user['fname'] . " " . $user['lname'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">نوع المهام</label>
                                  
                                    <div class="col-md-9">
                                          <select class="form-control"  name="mtype">
                                              <option value="خاص">خاص</option>
                                              <option value="تكليف">تكليف</option>
                                               <option value="قضية">قضية</option>
                                          </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">تاريخ البدء</label>
                                    <div class="col-md-9">
                                        <input  required="" type="text" id="startDate" class="form-control" name="startdate" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">تاريخ الانتهاء</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" id="endDate" class="form-control" name="enddate" placeholder=" ">
                                    </div>
                                </div>
                                <!--div class="form-group">
                                    <label style="float: right" for="email" class="col-md-3 control-label">قضية </label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="caseID">
                                            <?php// for ($i = 0; $i < count($cases); $i++) {
                                              //  $case = $cases[$i]; ?>
                                                <option value="<?php //echo $case['ID'] ?>"><?php //echo $case['subject'];?></option>
                                            <?php //} ?>
                                        </select>
                                    </div>
                                </div-->
                                <div class="form-group">
                                    <label style="float: right" for="email" class="col-md-3 control-label">تعليق</label>
                                    <div class="col-md-9">
                                        <textarea required="" type="text" class="form-control" name="comments"  id="comments"  placeholder=" "></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="email" class="col-md-3 control-label">المشاركون</label>
                                    <div class="col-md-9">
                                        <select  id="lawyerrr" name="lawyerrr[]" style="width: 370px;" multiple="multiple" >

                                            <?php
                                            echo getOptions22("users", "ID","fname", "lname","");
                                            ?>
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="priority" class="col-md-3 control-label">الأهمية</label>
                                    <div class="col-md-9">
                                        <select required="" type="text" class="form-control" name="priority" placeholder=" ">
                                            <option value="مرتفع">مرتفع</option>
                                            <option value="متوسط">متوسط</option>
                                            <option value="منخفض">منخفض</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <input  type="submit" id="btn-signup" type="button" class="btn btn-primary" value="اضافة">
                                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
        $('#startDate').datetimepicker({
            timepicker:false,
        format:'Y-m-d'
        });
        $('#endDate').datetimepicker({
            timepicker:false,
        format:'Y-m-d'
        });
    });
</script>