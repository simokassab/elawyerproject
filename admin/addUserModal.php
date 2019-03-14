<?php
//require_once './functions/global.php';
//require_once 'config.php';
$levels = GetAllLevels();
$lawyer_types = getAllLawyer_Type();
$color=  rand_color();
?>
﻿<!-- Modal -->
<div id="addUser" class="modal fade" role="dialog" style="direction:rtl; ">
    <div class="modal-dialog" style="max-width: 700px;">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">اضافة مستخدم</h4>
            </div>
            <div class="modal-body">
                <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-12  col-sm-8 ">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div  style="direction:rtl" class="panel-title">اضافة مستخدم</div>
                        </div>  
                        <div class="panel-body" style="direction:rtl;" >
                            <form id="signupform" class="form-horizontal" role="form"  enctype="multipart/form-data"  
                                  action="DBS/signUpAction.php" method="post">
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                <div class="form-group">
                                    <label for="email" style="float: right" class="col-md-3 control-label">المستوى</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="level_id" id="level_id" onchange="checkLevel()">
                                            <?php for ($i = 0; $i < count($levels); $i++) {
                                                $level= $levels[$i];
                                                ?>
                                                <option value="<?php echo $level['ID'] ?>"><?php echo $level['rule'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" style="display: none" id="lawyerTypeBox">
                                    <label for="email" style="float: right" class="col-md-3 control-label">نوع المحامي</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="lawyer_type_id">
                                            <?php for ($i = 0; $i < count($lawyer_types); $i++) {
                                                $lawyer_type= $lawyer_types[$i];
                                                ?>
                                                <option value="<?php echo $lawyer_type['ID'] ?>"><?php echo $lawyer_type['trule'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" style="float: right" class="col-md-3 control-label">الصورة</label>
                                    <div class="col-md-9">
                                        <input id="file-0a" name="image" class="file" type="file" multiple data-min-file-count="1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">الاسم الاول</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="fname" id="fname" placeholder=" ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">الاسم الثاني</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="sname"  id="sname" placeholder=" ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">الاسم الثالث</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="tname" id="tname" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="email" class="col-md-3 control-label">اسم العائلة</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="lname" id="lname" placeholder=" ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="email" class="col-md-3 control-label">اسم المستخدم</label>
                                    <div class="col-md-9">
                                        <input disabled type="text" class="form-control" name="username"  placeholder=" ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="email" class="col-md-3 control-label">كلمة السر </label>
                                    <div class="col-md-9">
                                        <input disabled type="text" class="form-control" name="password" placeholder=" ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">الجنس</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="gender" >
                                            <option value="male"> ذكر</option>
                                            <option value="female"> انثى</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right"  class="col-md-3 control-label">رقم الهوية</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="idnumber" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right"  class="col-md-3 control-label">رقم العضو</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="idmember" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right"  class="col-md-3 control-label">العنوان</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="address" id="address" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right"  class="col-md-3 control-label">الشارع</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="street" id="street" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">القسيمة</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="kasema" id="kasema" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">نوع البيت</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="houseType" id="housetype" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">رقم البيت</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="houseNumber" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">طابق </label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="floor" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">غرفة  </label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="room" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">عنوان الكتروني </label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="eaddress" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">هاتف 1  </label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="phone1" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">هاتف 2  </label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="phone2" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">هاتف 3  </label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="phone3" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">بريد الكتروني  </label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="email" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">فاكس  </label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="fax" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="color" class="col-md-3 control-label">اللون  </label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" 
                                               name="color" 
                                               value="<?php echo $color; ?>" id="color" placeholder="" 
                                               style="background-color: <?php echo $color; ?>;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">وصف  </label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="description" id="desctription" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <input  type="submit" id="btn-signup" type="button" class="btn btn-info" value="اضافة">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>

function checkLevel(){
    level = document.getElementById("level_id").value;
    if(level == 2 ){
        $('#lawyerTypeBox').slideDown();
    }else{
        $('#lawyerTypeBox').slideUp();
    }
}
</script>