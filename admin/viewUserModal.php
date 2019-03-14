<script>
    function viewUser(UserID) {
        user = users[UserID];
        //alert(JSON.stringify(user, null, 2));
        document.getElementById("idd").value=user['ID'];
        document.getElementById("user_image").src="<?php echo website_url . "DBS/uploads/" ?>"+user['photo'];
        document.getElementById("fname").value=user['fname'];
        document.getElementById("sname").value=user['sname'];
        document.getElementById("tname").value=user['tname'];
        document.getElementById("lname").value=user['lname'];
        document.getElementById("user").value=user['user'];
        document.getElementById("password").value=user['password'];
        document.getElementById("confitmPassword").value=user['password'];
        document.getElementById("gender").value=user['gender'];
        document.getElementById("ID_number").value=user['ID_number'];
        document.getElementById("ID_member").value=user['ID_member'];
        document.getElementById("address").value=user['address'];
        document.getElementById("kasima").value=user['kasima'];
        document.getElementById("house_type").value=user['house_type'];
        document.getElementById("house_nb").value=user['house_nb'];
        document.getElementById("floor").value=user['floor'];
        document.getElementById("room").value=user['room'];
        document.getElementById("eaddress").value=user['eaddress'];
        document.getElementById("street").value=user['street'];    
        document.getElementById("email").value=user['email'];
        document.getElementById("phone1").value=user['phone1'];
        document.getElementById("phone2").value=user['phone2'];
        document.getElementById("phone3").value=user['phone3'];
        document.getElementById("fax").value=user['fax'];
        document.getElementById("description").value=user['description'];

    }

</script>

<div id="viewUser" class="modal fade" role="dialog" style="direction:rtl">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> الموظف</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <div  style="direction:rtl" class="panel-title"> الملف الشخصي</div>
                    </div>  
                    <div class="panel-body" style="direction:rtl;" >
                        <form id="signupform" class="form-horizontal" enctype="multipart/form-data" role="form" action="DBS/updateMyProfile.php" method="post" >
                            <input type="hidden" id="idd" name="idd" />
                            <input type="hidden"  name="fromUsersPage" value="1"/>
                            <div id="signupalert" style="display:none" class="alert alert-danger">
                                <p>Error:</p>
                                <span></span>
                            </div>
                            <div class="form-group">
                                <label for="email" style="float: right" class="col-md-3 control-label">الصورة</label>
                                <div class="col-md-9">
                                    <img alt="الصورة ليست موجودة" id="user_image"  width="80px" class="img-thumbnail img-responsive"/>
                                    <input id="file-0a"  name="fileToUpload" class="file" type="file" multiple data-min-file-count="1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">الاسم الاول</label>
                                <div class="col-md-9">
                                    <input required="" type="text" class="form-control" id="fname" name="fname" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">الاسم الثاني</label>
                                <div class="col-md-9">
                                    <input required="" type="text" id="sname" class="form-control" name="sname" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">الاسم الثالث</label>
                                <div class="col-md-9">
                                    <input required="" type="text" id="tname" class="form-control" name="tname" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="email" class="col-md-3 control-label">اسم العائلة</label>
                                <div class="col-md-9">
                                    <input required="" type="text" id="lname" class="form-control" name="lname" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="email" class="col-md-3 control-label">اسم المستخدم</label>
                                <div class="col-md-9">
                                    <input required="" type="text" class="form-control" id="user" name="username" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="email" class="col-md-3 control-label">كلمة السر </label>
                                <div class="col-md-9">
                                    <input required="" type="password" id="password" class="form-control" name="password" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="email" class="col-md-3 control-label"> تأكيد كلمة السر</label>
                                <div class="col-md-9">
                                    <input required="" type="password" id="confitmPassword" class="form-control" name="confirmPassword" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">الجنس</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="gender" id="gender">
                                        <option value="male"> ذكر</option>
                                        <option value="female"> انثى</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right"  class="col-md-3 control-label">رقم الهوية</label>
                                <div class="col-md-9">
                                    <input required="" id="ID_number" type="text" class="form-control" name="idnumber" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right"  class="col-md-3 control-label">رقم العضو</label>
                                <div class="col-md-9">
                                    <input required="" id="ID_member" type="text" class="form-control" name="idmember" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right"  class="col-md-3 control-label">العنوان</label>
                                <div class="col-md-9">
                                    <input required="" type="text" id="address" class="form-control" name="address" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right"  class="col-md-3 control-label">الشارع</label>
                                <div class="col-md-9">
                                    <input required="" type="text" id="street"  class="form-control" name="street" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">القسيمة</label>
                                <div class="col-md-9">
                                    <input required="" type="text" id="kasima" class="form-control" name="kasema" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">نوع البيت</label>
                                <div class="col-md-9">
                                    <input required="" type="text" id="house_type" class="form-control" name="houseType" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">رقم البيت</label>
                                <div class="col-md-9">
                                    <input required="" type="text" id="house_nb" class="form-control" name="houseNumber" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">طابق </label>
                                <div class="col-md-9">
                                    <input required="" type="text" id="floor" class="form-control" name="floor" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">غرفة  </label>
                                <div class="col-md-9">
                                    <input required="" type="text" id="room" class="form-control" name="room" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">عنوان الكتروني </label>
                                <div class="col-md-9">
                                    <input required="" type="text" id="eaddress" class="form-control" name="eaddress" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">هاتف 1  </label>
                                <div class="col-md-9">
                                    <input required="" type="text" id="phone1"  class="form-control" name="phone1" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">هاتف 2  </label>
                                <div class="col-md-9">
                                    <input required="" type="text" id="phone2" class="form-control" name="phone2" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">هاتف 3  </label>
                                <div class="col-md-9">
                                    <input required="" type="text" id="phone3" class="form-control" name="phone3" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">بريد الكتروني  </label>
                                <div class="col-md-9">
                                    <input required="" type="text" id="email" class="form-control" name="email" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">فاكس  </label>
                                <div class="col-md-9">
                                    <input required="" type="text" id="fax" class="form-control" name="fax" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">وصف  </label>
                                <div class="col-md-9">
                                    <input required="" type="text" id="description" class="form-control" name="description" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- Button -->                                        
                                <div class="col-md-offset-3 col-md-9">
                                    <input  type="submit" id="btn-signup" name="submit" type="button" class="btn btn-info" value="تحديث">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>