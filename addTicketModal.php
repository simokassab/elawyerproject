<!-- Modal -->


<div id="addTicket" class="modal fade" role="dialog" style="direction:rtl">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-warning">
                <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h4 class="modal-title">إرسال تيكت</h4>
            </div>
            <div class="modal-body">
                <div id="addTicketBox" style=" margin-top:50px" class="mainbox col-md-12  col-sm-8 ">
                    <div class="panel panel-info"> 
                        <div style="direction:rtl;" >
                            <form id="addTicket" class="form-horizontal" role="form" action="webservices/ticketing_system/createticket.php" method="post">
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="email" class="col-md-3 control-label">أهلاً  </label>
                                    <div class="col-md-9">
                                <?php 
                                    echo $_SESSION['user']['fname']." ".$_SESSION['user']['lname'];
                                ?>
                                </div>
                                </div>
                                <input type='hidden' name='name' value='<?php echo $_SESSION['user']['fname']." ".$_SESSION['user']['lname'];?>'>
                                <div class="form-group">
                                    <label style="float: right" for="email" class="col-md-3 control-label">البريد الإلكتروني  </label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="email" placeholder=" " 
                                        value="<?php echo $_SESSION['user']['email']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="subject" class="col-md-3 control-label">عنوان التيكت</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="subject" placeholder=" ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="description" class="col-md-3 control-label">التفاصيل</label>
                                    <div class="col-md-9">
                                    <textarea name="description" class="form-control" rows='6'></textarea>
                                        
                                    </div>
                                </div>
                                <input type='hidden' name='frommodal' value='modal'>
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
      
       $('#startTime').datetimepicker({
	formatTime:'H:i:00',
	formatDate:'Y-m-d',
	timepickerScrollbar:false
    });
    $('#endTime').datetimepicker({
	formatTime:'H:i:00',
	formatDate:'Y-m-d',
	timepickerScrollbar:false
    });
    $('#datee').datetimepicker({
	timepicker:false,
        format:'Y-m-d'
    });
       
    });
    
</script>