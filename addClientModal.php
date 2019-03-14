<style>


/* Important part */
.modal-dialog{
    overflow-y: initial !important
}
.modal-body{
    height: 550px;
    overflow-y: auto;
}
</style>
﻿<?php

?>
<!-- Modal -->
<div id="addClient" class="modal fade" role="dialog" style="direction:rtl; ">
    <div class="modal-dialog" style="max-width: 700px;">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-header-warning">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">اضافة عميل</h4>
            </div>
            <div class="modal-body">
                <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-12  col-sm-8 ">
                    <div class="panel panel-info">
                        <div class="panel-body" style="direction:rtl;" >
                            <form id="signupform" class="form-horizontal" role="form"  enctype="multipart/form-data"  action="DBS/addClient.php" method="post">
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">الاسم الاول</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="cfname" placeholder=" ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">الاسم الثاني</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="csname" placeholder=" ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">الاسم الثالث</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="ctname" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="email" class="col-md-3 control-label">اسم العائلة</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="clname" placeholder=" ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right"  class="col-md-3 control-label">رقم الهوية</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="cidnumber" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right"  class="col-md-3 control-label">العنوان</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="caddress" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right"  class="col-md-3 control-label">الشارع</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="cstreet" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">القسيمة</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="ckasima" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">نوع البيت</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="chouseType" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">رقم البيت</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="chouseNumber" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">طابق </label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="cfloor" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">عنوان الكتروني </label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="ceaddress" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">هاتف 1  </label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="cphone1" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">هاتف 2  </label>
                                    <div class="col-md-9">
                                        <input  type="text" class="form-control" name="cphone2" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">هاتف 3  </label>
                                    <div class="col-md-9">
                                        <input  type="text" class="form-control" name="cphone3" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">هاتف 4  </label>
                                    <div class="col-md-9">
                                        <input  type="text" class="form-control" name="cphone4" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">هاتف 5  </label>
                                    <div class="col-md-9">
                                        <input  type="text" class="form-control" name="cphone5" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">هاتف 6  </label>
                                    <div class="col-md-9">
                                        <input  type="text" class="form-control" name="cphone6" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">بريد الكتروني  </label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="cemail" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">فاكس  </label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="cfax" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">تاريخ الولادة  </label>
                                    <div class="col-md-9">
                                        <input required="" type="text" id="birthdate" class="form-control datepicker" name="cbirthday" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" class="col-md-3 control-label">الوظيفة </label>
                                    <div class="col-md-9">
                                        <input  type="text" class="form-control" name="ccompany" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" class="col-md-3 control-label">VIP </label>
                                    <div class="col-md-9">
                                        <input  type="checkbox" class="form-control" name="VIP" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <input  type="submit" id="btn-signup" type="button" class="btn btn-info" value="اضافة">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
        $('#birthdate').datetimepicker({
           timepicker:false,
            format:'Y-m-d'
        });

    });
</script>