 <?php
 
 //echo 'http://'.$_SERVER['HTTP_HOST'].'/DEVE/';
$users = GetAllUsers();
$casesTypes = getAllCase_Type();

if(isset($_GET['estaffid']) ){
    $id=$_GET['estaffid'];
    $user_=  GetUserByID($id);
}
else {
    include_once './notFound.php';
    exit();
}
?>

<style>
    
th {
  background: steelblue;
  width: 25%;
  font-weight: lighter;
  text-shadow: 0 1px 0 #38678f;
  color: white;
  text-align: center;
  border: 2px solid #38678f;
  box-shadow: inset 0px 1px 2px #568ebd;
  transition: all 0.2s;
}
tr {
  border-bottom: 2px solid #cccccc;
}
tr:last-child {
  border-bottom: 0px;
}
</style>

<script>
/*jslint unparam: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = './server/php/';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                if((file.name.search('jpg')!= -1)  || (file.name.search('jpeg')!= -1) 
                        || (file.name.search('png')!= -1)  || (file.name.search('PNG')!= -1)  
                        || (file.name.search('JPG')!= -1)  || (file.name.search('JPEG')!= -1)){
                   // alert(file.name);
                    $('#user_image').attr('src', './server/php/files/'+file.name);
                    var idd=<?php echo $id; ?>;
                    $.ajax({
                    type: "get",
                    url: "DBS/uploadImageScript.php",
                    data: 'image='+file.name+'&id='+idd,
                    success: function (dataa) {

                    }

                });
            }
            else {
               $.ajax({
                    type: "get",
                    url: "DBS/deletefile.php",
                    data: 'file='+file.name,
                    success: function (dataa) {

                    }

                });
                alert('هذا النوع من الملفات غير مسموح به');
            }
                
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
</script>
<?php include_once "underheader.php"; ?>
 <?php include_once 'menu.php'; ?>
    <div class="home-cases-section-02">
      <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading c-list">
            <span class="title"><?php echo $user_[0]['fname'].' '.$user_[0]['lname']; ?></span>

        </div>

         <div class="panel-body" style="direction:rtl;" >
                        <form id="signupform" class="form-horizontal" enctype="multipart/form-data" role="form" action="DBS/updateMyProfile.php" method="post" >
                            <input type="hidden" id="idd" name="idd" value="<?php echo $id; ?>" />
                            <input type="hidden"  name="fromUsersPage" value="1"/>
                            <div id="signupalert" style="display:none" class="alert alert-danger">
                                <p>Error:</p>
                                <span></span>
                            </div>
                            <div class="form-group">
                                <label for="email" style="float: right" class="col-md-3 control-label">الصورة</label>
                                <div class="col-md-9">
                                    <img  id="user_image"  width="80px" class="img-thumbnail img-responsive"
                                          src="./server/php/files/<?php echo $user_[0]['photo']; ?>"/>
                                  <span class="btn btn-success fileinput-button">
                                    <i class="glyphicon glyphicon-plus"></i>
                                    <span>إختيار الصورة</span>
                                    <!-- The file input field used as target for the file upload widget -->
                                    <input id="fileupload" type="file" name="files[]" >
                                    </span>
                                    <br>
                                    <!-- The global progress bar -->
                                    <div id="progress" class="progress">
                                        <div class="progress-bar progress-bar-success"></div>
                                    </div>
                                    <!-- The container for the uploaded files -->
                                  
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">الاسم الاول</label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $user_[0]['fname']; ?>" type="text" class="form-control" id="fname" name="fname" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">الاسم الثاني</label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $user_[0]['sname']; ?>" type="text" id="sname" class="form-control" name="sname" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">الاسم الثالث</label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $user_[0]['tname']; ?>" type="text" id="tname" class="form-control" name="tname" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="email" class="col-md-3 control-label">اسم العائلة</label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $user_[0]['lname']; ?>" type="text" id="lname" class="form-control" name="lname" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="email" class="col-md-3 control-label">اسم المستخدم</label>
                                <div class="col-md-9">
                                    <input disabled="" value="<?php echo $user_[0]['user']; ?>" type="text" class="form-control" id="user" name="username" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="email" class="col-md-3 control-label">كلمة السر </label>
                                <div class="col-md-9">
                                    <?php if(($_SESSION['user']['idd']==$id) || ($_SESSION['user']['level_ID']==1)){
                                      
                                      ?>
                                     <input required="" value="<?php echo $user_[0]['password']; ?>" type="text" id="password" class="form-control" name="password" placeholder=" ">
                                  <?php }
                                  else { ?>
                                     <input required="" disabled="" value="<?php echo $user_[0]['password']; ?>" type="password" id="password" class="form-control" name="password" placeholder=" ">
                               <?php }
                                   ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">الجنس</label>
                                <div class="col-md-9">
                                    
                                    <select class="form-control" name="gender" id="gender">
                                        <?php if($user_[0]['gender']=='male'){ ?>
                                        <option value="male" selected="true"> ذكر</option>
                                        <option value="female"> انثى</option>
                                        <?php }else  { ?>
                                        <option value="male" > ذكر</option>
                                        <option value="female" selected="true"> انثى</option>
                                          <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right"  class="col-md-3 control-label">رقم الهوية</label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $user_[0]['ID_number']; ?>" id="ID_number" type="text" class="form-control" name="idnumber" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right"  class="col-md-3 control-label">رقم العضوية </label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $user_[0]['ID_member']; ?>" id="ID_member" type="text" class="form-control" name="idmember" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right"  class="col-md-3 control-label">العنوان</label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $user_[0]['address']; ?>"  type="text" id="address" class="form-control" name="address" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right"  class="col-md-3 control-label">الشارع</label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $user_[0]['street']; ?>"  type="text" id="street"  class="form-control" name="street" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">القسيمة</label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $user_[0]['kasima']; ?>"  type="text" id="kasima" class="form-control" name="kasema" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">نوع البيت</label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $user_[0]['house_type']; ?>" type="text" id="house_type" class="form-control" name="houseType" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">رقم البيت</label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $user_[0]['house_nb']; ?>" type="text" id="house_nb" class="form-control" name="houseNumber" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">طابق </label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $user_[0]['floor']; ?>" type="text" id="floor" class="form-control" name="floor" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">غرفة  </label>
                                <div class="col-md-9">
                                    <input  value="<?php echo $user_[0]['room']; ?>" type="text" id="room" class="form-control" name="room" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">عنوان الكتروني </label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $user_[0]['eaddress']; ?>" type="text" id="eaddress" class="form-control" name="eaddress" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">هاتف 1  </label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $user_[0]['phone1']; ?>" type="text" id="phone1"  class="form-control" name="phone1" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">هاتف 2  </label>
                                <div class="col-md-9">
                                    <input  value="<?php echo $user_[0]['phone2']; ?>" type="text" id="phone2" class="form-control" name="phone2" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">هاتف 3  </label>
                                <div class="col-md-9">
                                    <input  value="<?php echo $user_[0]['phone3']; ?>" type="text" id="phone3" class="form-control" name="phone3" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">بريد الكتروني  </label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $user_[0]['email']; ?>" type="text" id="email" class="form-control" name="email" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">فاكس  </label>
                                <div class="col-md-9">
                                    <input  value="<?php echo $user_[0]['fax']; ?>" type="text" id="fax" class="form-control" name="fax" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">فيسبوك  </label>
                                <div class="col-md-9">
                                    <input  value="<?php echo $user_[0]['facebook']; ?>" type="text" id="fb" class="form-control" name="fb" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">تويتر  </label>
                                <div class="col-md-9">
                                    <input  value="<?php echo $user_[0]['twitter']; ?>" type="text" id="tw" class="form-control" name="tw" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">لينكد أين  </label>
                                <div class="col-md-9">
                                    <input  value="<?php echo $user_[0]['linkedin']; ?>" type="text" id="linkedin" class="form-control" name="linkedin" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">إنستجرام  </label>
                                <div class="col-md-9">
                                    <input  value="<?php echo $user_[0]['instagram']; ?>" type="text" id="insta" class="form-control" name="insta" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">سناب شات   </label>
                                <div class="col-md-9">
                                    <input  value="<?php echo $user_[0]['snapchat']; ?>" type="text" id="snap" class="form-control" name="snap" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">ملاحظات  </label>
                                <div class="col-md-9">
                                    <input  value="<?php echo $user_[0]['description']; ?>" type="text" id="description" class="form-control" name="description" placeholder="">
                                </div>
                            </div>
                            <?php 
                                 if(($_SESSION['user']['idd']==$id) || ($_SESSION['user']['level_ID']==1)){
                                      
                                    
                            ?>
                            <div class="form-group">
                                <!-- Button -->                                        
                                <div class="col-md-offset-3 col-md-9">
                                    <input  type="submit" id="btn-signup" name="submit" type="button" class="btn btn-info" value="تحديث">
                                </div>
                            </div>
                                 <?php } ?>
                        </form>
                    </div>
        </div>
     </div>
 </div>
   </div>
 </div>
</div>
</div>