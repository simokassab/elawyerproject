<script>
    function viewBlog(BlogID){
        blog = blogs[BlogID];
       // alert(JSON.stringify(blog, null, 2));
        document.getElementById("eidd").value = blog['ID'];
       //document.getElementById("UserIDD").value = blog['user_id'];
        document.getElementById("titlee").value = blog['title'];
        document.getElementById("descriptionn").value = blog['description'];
        document.getElementById("vedateee").value = blog['date'];
    }

</script>
﻿<!-- Modal -->
<div id="viewBlog" class="modal fade" role="dialog" style="direction:rtl; height:500px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-warning">
                <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h4 class="modal-title">تحرير الخبر</h4>
            </div>
            <div class="modal-body">
                <div id="addEventBox" style=" margin-top:10px" class="mainbox col-md-12  col-sm-8 ">
                    <div class="panel panel-info">
                        <div class="panel-body" style="direction:rtl;" >
                            <form id="addMission" class="form-horizontal" role="form" action="DBS/updateBlog.php" method="post">
                                <input type="hidden" id="eidd" name="eidd"/>
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">التاريخ </label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" id="vedateee" name="vedateee" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label"> العنوان</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" id="titlee" class="form-control" name="titlee" placeholder=" ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="email" class="col-md-3 control-label">التفاصيل</label>
                                    <div class="col-md-9">
                                        <textarea required="" rows='6' type="text" id="descriptionn" class="form-control" name="descriptionn"    ></textarea>
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
        </div>
    </div>
</div>
<script type="text/javascript">
    // When the document is ready
    $(document).ready(function() {
        $('#vedateee').datetimepicker({
    	formatTime:'H:i:00',
        formatDate:'Y-m-d',
        timepickerScrollbar:false
        });
       
    });
</script>