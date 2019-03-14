<?php
$id="";
$cust_id="";
$cfname="";
$csname="";
$ctname="";
$clname="";
$cuser="";
$cpassword="";
$caddress="";
$cstreet="";
$ckasima="";
$chouse_type="";
$chouse_nb="";
$cfloor="";
$ceaddress="";
$CID_number="";
$cphone1="";
$cphone2="";
$cphone3="";
$cphone4="";
$cphone5="";
$cphone6="";
$cemail="";
$cfax="";
$cbirth="";
$ccompany="";
$ar=array();
if(isset($_GET['id']) && !isset($_GET['update'])){
    $id=$_GET['id'];

    $query="select customer_ID from cases where ID=".$id;
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($result);
        $cust_id= $row['customer_ID'];
     //   echo $cust_id;
    } else {
        return false;
    }
    mysqli_close($con);
    $ar=GetCustomerByID($cust_id);
    if(empty($ar)){
        include "notFound.php";
        exit();
    }
    $cfname=$ar[0]["cfname"];
    $csname=$ar[0]["csname"];
    $ctname=$ar[0]["ctname"];
    $clname=$ar[0]["clname"];
    $cuser=$ar[0]["cuser"];
    $cpassword=$ar[0]["cpassword"];
    $caddress=$ar[0]["caddress"];
    $cstreet=$ar[0]["cstreet"];
    $ckasima=$ar[0]["ckasima"];
    $chouse_type=$ar[0]["chouse_type"];
    $chouse_nb=$ar[0]["chouse_nb"];
    $cfloor=$ar[0]["cfloor"];
    $ceaddress=$ar[0]["ceaddress"];
    $CID_number=$ar[0]["CID_number"];
    $cphone1=$ar[0]["cphone1"];
    $cphone2=$ar[0]["cphone2"];
    $cphone3=$ar[0]["cphone3"];
    $cphone4=$ar[0]["cphone4"];
    $cphone5=$ar[0]["cphone5"];
    $cphone6=$ar[0]["cphone6"];
    $cemail=$ar[0]["cemail"];
    $cfax=$ar[0]["cfax"];
    $cbirth=$ar[0]["cbirth"];
    $ccompany=$ar[0]["ccompany"];
}

else {
    include "notFound.php";
    exit();
}




?>
<div class="panel-body">
    <div id="signupbox" style=" margin-top:0px" class="mainbox col-md-12  col-sm-8 ">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div  style="direction:rtl" class="panel-title">إضافة عميل</div>
            </div>
            <div class="panel-body" style="direction:rtl;" >
                <form id="updatecustomer" class="form-horizontal" role="form"
                      action="NEWFile/ajax.php" method="get">
                    <input type="hidden" name="idd" id="idd" value="<?php echo $cust_id; ?>" />
                    <input type="hidden" name="id_case" id="id_case" value="<?php echo $id; ?>" />
                    <div class="form-group">
                        <label style="float: right" for="firstname"
                               class="col-md-3 control-label">الاسم الاول</label>
                        <div class="col-md-9">
                            <input required="" type="text" class="form-control" value="<?php echo $cfname; ?>" name="cfname" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="float: right" for="firstname" class="col-md-3 control-label">الاسم الثاني</label>
                        <div class="col-md-9">
                            <input required="" type="text" class="form-control" value="<?php echo $csname; ?>" name="csname" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="float: right" for="firstname" class="col-md-3 control-label">الاسم الثالث</label>
                        <div class="col-md-9">
                            <input required="" type="text" class="form-control" name="ctname" value="<?php echo $ctname; ?>" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="float: right" for="email" class="col-md-3 control-label">اسم العائلة</label>
                        <div class="col-md-9">
                            <input required="" type="text" class="form-control" value="<?php echo $clname; ?>" name="clname" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="float: right" for="email" class="col-md-3 control-label">اسم المستخدم</label>
                        <div class="col-md-9">
                            <input disabled type="text" class="form-control" value="<?php echo $cuser; ?>" name="cusername" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="float: right" for="email" class="col-md-3 control-label">كلمة السر </label>
                        <div class="col-md-9">
                            <input disabled type="text" class="form-control" value="<?php echo $cpassword; ?>" name="cpassword" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="float: right"  class="col-md-3 control-label">العنوان</label>
                        <div class="col-md-9">
                            <input required="" type="text" class="form-control" value="<?php echo $caddress; ?>" name="caddress" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="float: right"  class="col-md-3 control-label">الشارع </label>
                        <div class="col-md-9">
                            <input required="" type="text" class="form-control" value="<?php echo $cstreet; ?>" name="cstreet" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="float: right"  class="col-md-3 control-label">القسيمة</label>
                        <div class="col-md-9">
                            <input required="" type="text" value="<?php echo $ckasima; ?>" class="form-control" name="ckasima" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="float: right"  class="col-md-3 control-label">نوع المنزل </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="<?php echo $chouse_type; ?>" name="chousetype" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="float: right"  class="col-md-3 control-label">رقم المنزل
                        </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="<?php echo $chouse_nb; ?>" name="chousenb" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="float: right"  class="col-md-3 control-label">الطابق       </label>
                        <div class="col-md-9">
                            <input  type="text" class="form-control" name="cfloor" value="<?php echo $cfloor; ?>" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="float: right"  class="col-md-3 control-label">العنوان الإلكتروني
                        </label>
                        <div class="col-md-9">
                            <input required="" type="text" class="form-control" value="<?php echo $ceaddress; ?>" name="ceaddress" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="float: right"  class="col-md-3 control-label">الرقم المدني
                        </label>
                        <div class="col-md-9">
                            <input required="" type="text" class="form-control" value="<?php echo $CID_number; ?>"
                                   name="CID_number" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="float: right"  class="col-md-3 control-label">TEL1
                        </label>
                        <div class="col-md-9">
                            <input required="" type="text" class="form-control" value="<?php echo $cphone1; ?>" name="t1" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="float: right"  class="col-md-3 control-label">TEL2
                        </label>
                        <div class="col-md-9">
                            <input required="" type="text" class="form-control" value="<?php echo $cphone2; ?>"  name="t2" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="float: right"  class="col-md-3 control-label">TEL3
                        </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="t3" value="<?php echo $cphone3; ?>"  placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="float: right"  class="col-md-3 control-label">TEL4
                        </label>
                        <div class="col-md-9">
                            <input  type="text" class="form-control" name="t4" value="<?php echo $cphone4; ?>"  placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="float: right"  class="col-md-3 control-label">TEL5
                        </label>
                        <div class="col-md-9">
                            <input  type="text" class="form-control" name="t5" value="<?php echo $cphone5; ?>"  placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="float: right"  class="col-md-3 control-label">TEL6
                        </label>
                        <div class="col-md-9">
                            <input  type="text" class="form-control" name="t6" value="<?php echo $cphone6; ?>"  placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="float: right"  class="col-md-3 control-label">بريد إلكتروني
                        </label>
                        <div class="col-md-9">
                            <input  type="text" class="form-control" name="cemail"  value="<?php echo $cemail; ?>" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="float: right"  class="col-md-3 control-label">فاكس
                        </label>
                        <div class="col-md-9">
                            <input  type="text" class="form-control" name="cfax" value="<?php echo $cfax; ?>"  placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="float: right"  class="col-md-3 control-label">تاريخ الميلاد(yyyy-dd-mm)
                        </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="cbirth" value="<?php echo $cbirth; ?>"  placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="float: right"  class="col-md-3 control-label">الشركة</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="ccompany" value="<?php echo $ccompany; ?>"  placeholder="">
                        </div>
                    </div>
                   <div class="form-group">
                        <!-- Button -->
                        <div class="col-md-offset-3 col-md-9">
                            <input  type="submit" id="updatee" name="updatee"  class="btn btn-info" value="اضافة">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>