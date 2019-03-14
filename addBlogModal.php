<!-- Modal -->
<div id="addBlog" class="modal fade" role="dialog" style="direction:rtl; height:500px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-warning">
                <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h4 class="modal-title">اضافة خبر</h4>
            </div>
            <div class="modal-body" >
                <div id="addEventBox" style=" margin-top:0px" class="mainbox col-md-12  col-sm-8 ">
                    <div class="panel panel-info"> 
                        <div class="panel-body" style="direction:rtl;" >
                            <form id="addMission" class="form-horizontal" role="form" action="DBS/addBlog.php" method="post">
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                <input type="hidden" name='user_id' value='<?php echo $_SESSION["user"]["idd"];  ?>'>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-12 control-label">
                                    <?php 
                                        echo $_SESSION['user']['fname']." ".$_SESSION['user']['lname'];
                                    ?>
                                     </label>
                                    
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">الموضوع</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" id='subject' name="subject" placeholder="الموضوع">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="email" class="col-md-3 control-label">التفاصيل</label>
                                    <div class="col-md-9">
                                        <textarea  rows='6' type="text" id="description" class="form-control" name="description" placeholder="التفاصيل"></textarea> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">التاريخ </label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" id="date__" name="date__" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <input  type="submit" id="btn-signup" type="button" class="btn btn-primary" value="اضافة">
                                           <button type="button" class="btn btn-warning" data-dismiss="modal">إلغاء</button>
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
    $(document).ready(function() {
    $('#date__').datetimepicker({
    	formatTime:'H:i:00',
        formatDate:'Y-m-d',
        timepickerScrollbar:false
        });
       
    });
    
</script>