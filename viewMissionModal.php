<script>
    function viewMission(missionID){
        mission = missions[missionID];
       // alert(JSON.stringify(mission, null, 2));
        document.getElementById("mid").value = mission['ID'];
        document.getElementById("from_user_id").value = mission['from_user_id'];
        document.getElementById("UserID").value = mission['to_user_id'];
        document.getElementById("mtype").value = mission['mtype'];
        document.getElementById("VMstartDate").value = mission['startdate'];
        document.getElementById("VMendDate").value = mission['enddate'];
        document.getElementById("participants").value = mission['participants'];
        document.getElementById("commentssss").value = mission['comments'];
        var idd= <?php echo $_SESSION['user']['idd'] ?>;
        var id1= document.getElementById("from_user_id").value;
        if(idd!=id1){
            $("#deletee").css("display", 'none');
        }
        else {
            $("#deletee").css("display", 'inline');
        }
    }
    </script>
    <script>
$(document).ready(function() {
   // alert(document.getElementById("commentssss").value);
    $('#done').click(function() {
        var idd=document.getElementById("mid").value;
        var s=confirm ("هل تم تنفيذ المهمة بنجاح ؟");
        if(s==true){
            $.ajax({
                type: "get",
                url: "DBS/addMission.php",
                data: 'id='+idd,
                success: function (data) {
                  location.reload();
                }
            });
        }
        else {
            
        }

    });
    var idd= <?php echo $_SESSION['user']['idd'] ?>;
   // var id1= document.getElementById("from_user_id").value;
    //alert(id1);
    $('#deletee').click(function() {
        var idd=document.getElementById("mid").value;
        var s=confirm ("هل تريد فعلاً حذف المهمة ؟");
        if(s==true){
            $.ajax({
                type: "get",
                url: "DBS/DeleteMission.php",
                data: 'id='+idd,
                success: function (data) {
                  location.reload();
                }
            });
        }
        else {
            
        }
    });
});
</script>
<style>
.modal-header-warning {
	color:#fff;
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #FC960F;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
}

.btn-warning {
     background-color: #FC960F;
}
    
</style>
<!-- Modal -->
<div id="viewMission" class="modal fade" role="dialog" style="direction:rtl; height:500px;">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-header-warning">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h4 class="modal-title"> مهام</h4>
            </div>
            <div class="modal-body">
                <div id="addMissionBox" style=" margin-top:50px" class="mainbox col-md-12  col-sm-8 ">
                            <form id="addMission" class="form-horizontal" role="form" action="DBS/updateMission.php" method="post">
                                <input type="hidden" name="mid" id="mid" />
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                <div class="form-group">
                                    <label for="email" style="float: right" class="col-md-3 control-label">مهام الى</label>
                                    <div class="col-md-9">
                                        
                                        <select class="form-control" id="UserID" name="UserID">
                                            <?php for ($i = 0; $i < count($usersss); $i++) {
                                                $user = $usersss[$i];
                                                ?>
                                            <option value="<?php echo $user['ID']; ?>" selected ><?php echo $user['fname'] . " " . $user['lname'] ?></option>
<?php } ?>
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label style="float: right"  class="col-md-3 control-label">نوع المهام</label>
                                    <div class="col-md-9">
                                        <input required="" id="mtype" type="text" class="form-control" name="mtype" placeholder="">
                                    </div>
                                </div>
                                <input type="hidden" name="from_user_id" id='from_user_id'>
                                <div class="form-group">
                                    <label style="float: right"  class="col-md-3 control-label">تاريخ البدء</label>
                                    <div class="col-md-9">
                                        <input  required="" type="text" id="VMstartDate" class="form-control " 
                                                name="VMstartdate" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">تاريخ الانتهاء</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" id="VMendDate" class="form-control" name="VMenddate" placeholder=" ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" class="col-md-3 control-label">المشاركين</label>
                                    <div class="col-md-9">
                                        <input  type="text" id="participants" class="form-control" name="participants">
                                        
                                    </div>
                                </div>
                                
                               <div class="form-group">
                                    <label style="float: right" class="col-md-3 control-label">تعليق</label>
                                    <div class="col-md-9">
                                        <input  type="text" id="commentssss" class="form-control" name="commentssss">
                                        
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <input  type="submit" id="btn-signup" type="button" class="btn btn-primary" value="تحديث">
                                        <input  id="done" type="button" class="btn btn-warning" value="نفذت">
                                         <input  id="deletee" type="button" class="btn btn-danger" value="حذف">
                                    </div>
                                </div>
                            </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // When the document is ready
    $(document).ready(function() {
        $('#VMstartDate').datetimepicker({
           timepicker:false,
            format:'Y-m-d'
        });
        $('#VMendDate').datetimepicker({
            timepicker:false,
        format:'Y-m-d'
        });
    });
</script>