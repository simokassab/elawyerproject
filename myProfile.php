<div id="myProfilebox" style=" margin-top:50px" class="mainbox col-md-10  col-sm-8 ">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <div  style="direction:rtl" class="panel-title"> الملف الشخصي</div>
        </div>  
        <div class="panel-body" style="direction:rtl;" >
            <form id="signupform" class="form-horizontal" enctype="multipart/form-data" role="form" action="DBS/updateMyProfile.php" method="post" >
                <input type="hidden" id="idd" name="idd" value="<?php echo $loggedUser['idd']; ?>" />
                <input type="hidden"  name="fromUsersPage" value="0"/>
                <div id="signupalert" style="display:none" class="alert alert-danger">
                    <p>Error:</p>
                    <span></span>
                </div>
                <div class="form-group">
                    <label for="email" style="float: right" class="col-md-3 control-label">الصورة</label>
                    <div class="col-md-9">
                        <img alt="الصورة ليست موجودة" src="<?php echo website_url."DBS/uploads/".$loggedUser['photo'] ?>" width="80px" class="img-thumbnail img-responsive"/>
                        <input id="file-0a"  name="fileToUpload" class="file" type="file" multiple data-min-file-count="1">
                    </div>
                </div>
                <div class="form-group">
                    <label style="float: right" for="firstname" class="col-md-3 control-label">الاسم الاول</label>
                    <div class="col-md-9">
                        <input required="" type="text" class="form-control" value="<?php echo $loggedUser['fname'] ?>" name="fname" placeholder=" ">
                    </div>
                </div>
                <div class="form-group">
                    <label style="float: right" for="firstname" class="col-md-3 control-label">الاسم الثاني</label>
                    <div class="col-md-9">
                        <input required="" type="text" value="<?php echo $loggedUser['sname'] ?>" class="form-control" name="sname" placeholder=" ">
                    </div>
                </div>
                <div class="form-group">
                    <label style="float: right" for="firstname" class="col-md-3 control-label">الاسم الثالث</label>
                    <div class="col-md-9">
                        <input required="" type="text" value="<?php echo $loggedUser['tname'] ?>" class="form-control" name="tname" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label style="float: right" for="email" class="col-md-3 control-label">اسم العائلة</label>
                    <div class="col-md-9">
                        <input required="" type="text" value="<?php echo $loggedUser['lname'] ?>" class="form-control" name="lname" placeholder=" ">
                    </div>
                </div>
                <div class="form-group">
                    <label style="float: right" for="email" class="col-md-3 control-label">اسم المستخدم</label>
                    <div class="col-md-9">
                        <input required="" type="text" class="form-control" value="<?php echo $loggedUser['user'] ?>" name="username" placeholder=" ">
                    </div>
                </div>
                <div class="form-group">
                    <label style="float: right" for="email" class="col-md-3 control-label">كلمة السر </label>
                    <div class="col-md-9">
                        <input required="" type="password" value="<?php echo $loggedUser['password'] ?>" class="form-control" name="password" placeholder=" ">
                    </div>
                </div>
                <div class="form-group">
                    <label style="float: right" for="email" class="col-md-3 control-label"> تأكيد كلمة السر</label>
                    <div class="col-md-9">
                        <input required="" type="password" value="<?php echo $loggedUser['password'] ?>" class="form-control" name="confirmPassword" placeholder=" ">
                    </div>
                </div>
                <div class="form-group">
                    <label style="float: right" for="firstname" class="col-md-3 control-label">الجنس</label>
                    <div class="col-md-9">
                        <select class="form-control" name="gender" value="<?php echo $loggedUser['gender']; ?>" >
                            <option value="male"> ذكر</option>
                            <option value="female"> انثى</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label style="float: right"  class="col-md-3 control-label">رقم الهوية</label>
                    <div class="col-md-9">
                        <input required="" value="<?php echo $loggedUser['ID_number']; ?>" type="text" class="form-control" name="idnumber" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label style="float: right"  class="col-md-3 control-label">رقم العضو</label>
                    <div class="col-md-9">
                        <input required="" value="<?php echo $loggedUser['ID_member']; ?>" type="text" class="form-control" name="idmember" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label style="float: right"  class="col-md-3 control-label">العنوان</label>
                    <div class="col-md-9">
                        <input required="" type="text" value="<?php echo $loggedUser['address']; ?>" class="form-control" name="address" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label style="float: right"  class="col-md-3 control-label">الشارع</label>
                    <div class="col-md-9">
                        <input required="" type="text" value="<?php echo $loggedUser['street']; ?>"  class="form-control" name="street" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label style="float: right" for="firstname" class="col-md-3 control-label">القسيمة</label>
                    <div class="col-md-9">
                        <input required="" type="text" value="<?php echo $loggedUser['kasima']; ?>" class="form-control" name="kasema" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label style="float: right" for="firstname" class="col-md-3 control-label">نوع البيت</label>
                    <div class="col-md-9">
                        <input required="" type="text" value="<?php echo $loggedUser['house_type']; ?>" class="form-control" name="houseType" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label style="float: right" for="firstname" class="col-md-3 control-label">رقم البيت</label>
                    <div class="col-md-9">
                        <input required="" type="text" value="<?php echo $loggedUser['house_nb']; ?>" class="form-control" name="houseNumber" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label style="float: right" for="firstname" class="col-md-3 control-label">طابق </label>
                    <div class="col-md-9">
                        <input required="" type="text" value="<?php echo $loggedUser['floor']; ?>" class="form-control" name="floor" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label style="float: right" for="firstname" class="col-md-3 control-label">غرفة  </label>
                    <div class="col-md-9">
                        <input required="" type="text" value="<?php echo $loggedUser['room'] ?>" class="form-control" name="room" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label style="float: right" for="firstname" class="col-md-3 control-label">عنوان الكتروني </label>
                    <div class="col-md-9">
                        <input required="" type="text" value="<?php echo $loggedUser['eaddress']; ?>"  class="form-control" name="eaddress" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label style="float: right" for="firstname" class="col-md-3 control-label">هاتف 1  </label>
                    <div class="col-md-9">
                        <input required="" type="text" value="<?php echo $loggedUser['phone1']; ?>"  class="form-control" name="phone1" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label style="float: right" for="firstname" class="col-md-3 control-label">هاتف 2  </label>
                    <div class="col-md-9">
                        <input required="" type="text" value="<?php echo $loggedUser['phone2']; ?>" class="form-control" name="phone2" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label style="float: right" for="firstname" class="col-md-3 control-label">هاتف 3  </label>
                    <div class="col-md-9">
                        <input required="" type="text" value="<?php echo $loggedUser['phone3']; ?>" class="form-control" name="phone3" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label style="float: right" for="firstname" class="col-md-3 control-label">بريد الكتروني  </label>
                    <div class="col-md-9">
                        <input required="" type="text" value="<?php echo $loggedUser['email']; ?>" class="form-control" name="email" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label style="float: right" for="firstname" class="col-md-3 control-label">فاكس  </label>
                    <div class="col-md-9">
                        <input required="" type="text" value="<?php echo $loggedUser['fax']; ?>" class="form-control" name="fax" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label style="float: right" for="firstname" class="col-md-3 control-label">وصف  </label>
                    <div class="col-md-9">
                        <input required="" type="text" value="<?php echo $loggedUser['description']; ?>" class="form-control" name="description" placeholder="">
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