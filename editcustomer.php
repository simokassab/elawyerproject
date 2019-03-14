 <?php
 
 //echo 'http://'.$_SERVER['HTTP_HOST'].'/DEVE/';
$users = GetAllUsers();
$casesTypes = getAllCase_Type();

$consultants = getAllConsultant();
$opponents = getAllOpponents();
if(isset($_GET['customerid']) ){
    $id=$_GET['customerid'];
    $customer_=  GetCustomerByID($id);
   // print_r($customer_);
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
$(document).ready(function () { 
    $("#delete").click(function () { 
        var id= <?php echo $id; ?>;
        $.ajax({
            type: "get",
            url: "DBS/DeleteCustomer.php",
            data: 'id='+id ,
            success: function (dataa) {
                notif({
                    msg: "لقد تم إرسال طلب الإستشارة إلى مدير المكتب للإطلاع عليه",
                    type: "success"
                });
                setTimeout(
                    function()
                    {
                        window.location.href='index.php?action=mainpage';
                    }, 2000);
            }
        });
    });

});
</script>

<?php include_once "underheader.php"; ?>
 <?php include_once 'menu.php'; ?>
    <div class="home-cases-section-02">
      <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading c-list">
            <span class="title"><?php echo $customer_[0]['cfname'].' '.$customer_[0]['clname']; ?></span>

        </div>

         <div class="panel-body" style="direction:rtl;" >
                        <form id="signupform" class="form-horizontal" enctype="multipart/form-data" role="form" action="DBS/updatecustomer.php" method="post" >
                            <input type="hidden" id="idd" name="idd" value="<?php echo $id; ?>" />
                            <input type="hidden"  name="fromUsersPage" value="1"/>
                            <div id="signupalert" style="display:none" class="alert alert-danger">
                                <p>Error:</p>
                                <span></span>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">الاسم الاول</label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $customer_[0]['cfname']; ?>" type="text" class="form-control" id="fname" name="fname" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">الاسم الثاني</label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $customer_[0]['csname']; ?>" type="text" id="sname" class="form-control" name="sname" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">الاسم الثالث</label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $customer_[0]['ctname']; ?>" type="text" id="tname" class="form-control" name="tname" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="email" class="col-md-3 control-label">اسم العائلة</label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $customer_[0]['clname']; ?>" type="text" id="lname" class="form-control" name="lname" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="email" class="col-md-3 control-label">اسم المستخدم</label>
                                <div class="col-md-9">
                                    <input disabled="" value="<?php echo $customer_[0]['cuser']; ?>" type="text" class="form-control" id="user" name="username" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="email" class="col-md-3 control-label">كلمة السر </label>
                                <div class="col-md-9">
                                    <?php if($_SESSION['user']['idd']==$id){
                                      
                                      ?>
                                     <input required="" value="<?php echo $customer_[0]['cpassword']; ?>" type="text" id="password" class="form-control" name="password" placeholder=" ">
                                  <?php }
                                  else { ?>
                                     <input required="" disabled="" value="<?php echo $customer_[0]['cpassword']; ?>" type="text" id="password" class="form-control" name="password" placeholder=" ">
                               <?php }
                                   ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right"  class="col-md-3 control-label">رقم الهوية</label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $customer_[0]['CID_number']; ?>" id="ID_number" type="text" class="form-control" name="idnumber" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right"  class="col-md-3 control-label">العنوان</label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $customer_[0]['caddress']; ?>"  type="text" id="address" class="form-control" name="address" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right"  class="col-md-3 control-label">الشارع</label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $customer_[0]['cstreet']; ?>"  type="text" id="street"  class="form-control" name="street" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">القسيمة</label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $customer_[0]['ckasima']; ?>"  type="text" id="kasima" class="form-control" name="kasema" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">نوع البيت</label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $customer_[0]['chouse_type']; ?>" type="text" id="house_type" class="form-control" name="houseType" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">رقم البيت</label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $customer_[0]['chouse_nb']; ?>" type="text" id="house_nb" class="form-control" name="houseNumber" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">طابق </label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $customer_[0]['cfloor']; ?>" type="text" id="floor" class="form-control" name="floor" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">عنوان الكتروني </label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $customer_[0]['ceaddress']; ?>" type="text" id="eaddress" class="form-control" name="eaddress" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">هاتف 1  </label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $customer_[0]['cphone1']; ?>" type="text" id="phone1"  class="form-control" name="phone1" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">هاتف 2  </label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $customer_[0]['cphone2']; ?>" type="text" id="phone2" class="form-control" name="phone2" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">هاتف 3  </label>
                                <div class="col-md-9">
                                    <input  value="<?php echo $customer_[0]['cphone3']; ?>" type="text" id="phone3" class="form-control" name="phone3" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">هاتف 4  </label>
                                <div class="col-md-9">
                                    <input  value="<?php echo $customer_[0]['cphone4']; ?>" type="text" id="phone3" class="form-control" name="phone4" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">هاتف 5  </label>
                                <div class="col-md-9">
                                    <input  value="<?php echo $customer_[0]['cphone5']; ?>" type="text" id="phone3" class="form-control" name="phone5" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">هاتف 6  </label>
                                <div class="col-md-9">
                                    <input  value="<?php echo $customer_[0]['cphone6']; ?>" type="text" id="phone3" class="form-control" name="phone6" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">بريد الكتروني  </label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $customer_[0]['cemail']; ?>" type="text" id="email" class="form-control" name="email" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">فاكس  </label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $customer_[0]['cfax']; ?>" type="text" id="fax" class="form-control" name="fax" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">تاريخ الميلاد  </label>
                                <div class="col-md-9">
                                    <input required="" value="<?php echo $customer_[0]['cbirth']; ?>" type="text" id="birth" class="form-control" name="birth" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="float: right" for="firstname" class="col-md-3 control-label">الوظيفة</label>
                                <div class="col-md-9">
                                    <input  value="<?php echo $customer_[0]['ccompany']; ?>" type="text" id="company" class="form-control" name="company" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                    <label style="float: right" class="col-md-3 control-label">VIP </label>
                                    <div class="col-md-9">
                                    <select name="VIP" class="form-control">
                                    <?php 
                                        if($customer_[0]['VIP']=='on'){

                                    ?>
                                        <option value='on' selected>VIP</option>
                                         <option value='off' >NOT VIP</option>
                                    <?php
                                        }
                                        else {

                                        
                                    ?>
                                         <option value='on'  >VIP</option>
                                         <option value='off' selected>NOT VIP</option>
                                    <?php 
                                        }
                                    ?>
                                    </select>
                                    </div>
                                </div>
                            <?php 
                               //  if( ($_SESSION['user']['level_ID']==1)){
                                      
                                    
                            ?>
                            <div class="form-group">
                                <!-- Button -->                                        
                                <div class="col-md-offset-3 col-md-9">
                                    <input  type="submit" id="btn-signup" name="submit" type="button" class="btn btn-info" value="تحديث">
                                   
                                </div>
                            </div>
                                 <?php// } ?>
                        </form>
                    </div>
        </div>
     </div>
 </div>
   </div>
 </div>
</div>
</div>