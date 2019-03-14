<?php
ob_start();
if((!empty($_SESSION)) && ($_SESSION['user']['level_ID']==1)){
$loggedUser = $_SESSION['user'];
$id_logged=$loggedUser['idd'];
$to=$_GET['from'];
//echo $to;
}

else {
    include_once("notFound.php");
    exit();
}
$fname="";
$lname="";
$customer="";
$subject="";
$desc="";
$consul="";
$lawyer="";
$lawyer="";
$ctype="";
$disabled="";
$cus=array();
if (isset($_GET['id'])){
    //echo $id;
    $con=connectDB($_SESSION['office']);
    mysqli_query($con,"SET NAMES 'utf8'");
    mysqli_query($con,'SET CHARACTER SET utf8');
    $query="select * from alarm_consultation where ID=".$_GET['id'];
   // echo $query;
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($result);
           // if($row['firstname']=='')
            $fname=$row['firstname'];
            $lname=$row['lastname'];
            $customer=$row['customer'];
            $subject=str_ireplace("<br />","\r\n",$row['subject']);
            $desc=str_ireplace("<br />","\r\n",$row['description']);
            $appoint=$row['appoint'];
            $lawyer=$row['lawyer_ID'];
            $ctype=$row['consult_type'];

            $law=array();
            $law=explode(",",$lawyer);
    }
    //echo $fname."dd";
    if($fname==''){
        $cus=GetCustomerByID($customer);
        $fname=$cus[0]['cfname'];
        $lname=$cus[0]['clname'];
    }
    mysqli_close($con);
}
else {
    header('Location: ../notFound.php');
}
?>
<script language="javascript">
    $(document).ready(function () {
        $("#lawyer").select2();
        $("#appointm").select2();

        var idd= <?php echo $_GET['id']; ?>;
        $("#send").click(function () {
            var mySelections = [];
            $('#lawyer option').each(function(i) {
                if (this.selected == true) {
                    mySelections.push(this.value);
                }
            });
            var appoint = $("#appointm").val();
            //  alert(apppoint);
            var id_user= <?php echo $id_logged;  ?>;
            var to_user= <?php echo $to;  ?>;
            var customer='<?php echo $customer; ?>';
            var ctype = $("#ctype").val();

            var firstname = '';
            var lastname = '';
            //alert(customer);
            if(customer=='null'){
            var lastname = $("#lastname").val().trim();
            var firstname = $("#firstname").val().trim();
           // alert(lastname + firstname);
            }
            var subject = $("#subject").val().replace(/\r\n|\r|\n/g,"<br />");
            var description = $("#description").val().replace(/\r\n|\r|\n/g,"<br />");
            //alert(lawyer);
            var valid = true;
            if (lawyer == null) {
                $("#law").css("color", "red");
                valid = false;
            }
            if (lawyer != null) {
                $("#law").css("color", "black");
            }
            if (ctype == -1) {
                $("#ct").css("color", "red");
                valid = false;
            }
            if (ctype != -1) {
                $("#ct").css("color", "black");
            }
            if (appoint == -1) {
                $("#appoint").css("color", "red");
                valid = false;
            }
            if (appoint != -1) {
                $("#appoint").css("color", "black");
            }
            if (subject == "") {
                $("#sub").css("color", "red");
                valid = false;
            }
            if (subject != "") {
                $("#sub").css("color", "black");
            }
            if (description == "") {
                $("#desc").css("color", "red");
                valid = false;
            }
            if (description != "") {
                $("#desc").css("color", "black");
            }
            if (valid == true) {
                $.ajax({
                    type: "get",
                    url: "consultation_alarm/ajax.php",
                    data: 'act=update&id='+idd+'&ctype=' + ctype + '&lawyer=' + mySelections + '&firstname='
                    + firstname + '&lastname=' + lastname +'&customer='+customer+
                    '&subject=' + subject + '&description=' + description+'&status=YES&appoint='+appoint+'&id_user='+id_user
                    +'&to_user='+to_user,
                    success: function (dataa) {
                        // alert(dataa);
                        notif({
                            msg: "لقد تم إرسال طلب الإنذار إلى السكرتير ",
                            type: "success"
                        });

                    }
                });
            }

        });
        $("#cancel").click(function () {
            var idd= <?php echo $_GET['id']; ?>;
            var id_user= <?php echo $id_logged;  ?>;
            var to_user= <?php echo $to;  ?>;
            $.ajax({
                type: "get",
                url: "consultation_alarm/ajax.php",
                data: 'act=cancel&id='+idd+'&id_user='+id_user
                    +'&to_user='+to_user,
                success: function (dataa) {
                    // alert(dataa);
                    window.location.href = "../index.php";
                }
            });
        });
    });
</script>

<div class="container">
    <div  style=" margin-top:10px" class="mainbox col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title" style="direction:rtl;" ><b>طلب الإنذار جديد ل: <?php echo $fname." ". $lname; ?>	</b>

            </div>
        </div>
        <div class="panel-body" style="direction:rtl;" >
            <div class="form-group">
                <div class="col-md-9">
                    <select class="form-control" id="ctype" >
                      
                       
                       <?php echo  getOptions("case_type","ID", "ctype", "$ctype"); ?>
                    </select>
                </div>
                <label for="ctype" class="col-md-3 control-label">نوع الإنذار :</label>
            </div><br/><br/>
            <div class="form-group">
                <div class="col-md-9">
                    <select  id="lawyer" multiple="multiple" >

                        <?php
                        echo getOptions2("users", "ID","fname", "lname","");
                        ?>
                    </select>
                </div>
                <label for="lawyer" class="col-md-3 control-label">إضافة محامي أو مستشار:</label>
            </div><br/><br/>
            <?php
            if($customer==0){


            ?>
            <div class="form-group">

                <div class="col-md-9">
                    <input disabled type="text" class="form-control" value="<?php echo $fname; ?>"
                           id="firstname" name="firstname" placeholder="إسم الموكل">
                </div>
                <label for="firstname" id="name" class="col-md-3 control-label" >إسم الموكل* : </label>
            </div><br/><br/>
            <div class="form-group">
                <div class="col-md-9">
                    <input disabled type="text" class="form-control" id="lastname" value="<?php echo $lname; ?>" name="lastname" placeholder=" العائلة">
                </div>
                <label for="lastname" id="lname" class="col-md-3 control-label"> العائلة* :</label>
            </div><br/><br/>
            <?php  }
            else {
                $cust=array();
                $cust=GetCustomerByID($customer);
            ?>
        <div class="form-group">
            <div class="col-md-9">
                <input disabled="disabled" type="text" class="form-control" id="cfname"
                       value="<?php echo $cust[0]['cfname'].' '.$cust[0]['csname'].' '.$cust[0]['ctname'].' '.$cust[0]['clname']; ?>"
                       name="cfname" >
            </div>
            <label for="lastname" id="lname" class="col-md-3 control-label">إسم العميل : </label>
        </div><br/><br/>
            <?php
            }
            ?>
            <div class="form-group">
                <div class="col-md-9">
                    <input required="" type="text" class="form-control" value="<?php echo trim($subject); ?>"
                           id="subject" name="subject" placeholder="موضوع الإستشارة وعنوانها">
                </div>
                <label for="subject" id="sub" class="col-md-3 control-label">موضوع الإستشارة وعنوانها* :</label>
            </div><br/><br/>
            <div class="form-group">
                <div class="col-md-9">
                    <textarea class="form-control" style="resize: none;" rows="7" required="required" id="description" placeholder=" تفاصيل الإستشارة"><?php echo trim($desc); ?></textarea>
                </div>
                <label for="description" id="desc" class="col-md-3 control-label"> تفاصيل الإستشارة* : </label>
            </div>
            <div class="form-group">
                <div class="col-md-9">
                    <select class="form-control" id="appointm" >
                        <option value="" selected disabled>تحديد موعد مع</option>
                        <?php
                        echo getOptions2("users", "ID", "fname", "lname", $lawyer );
                        ?>
                    </select>
                </div>
                <label for="appointm" id="desc" class="col-md-3 control-label">تحديد موعد مع: </label>
            </div>
            <div class="form-group">
                <div class="col-md-offset-3 col-md-9 pull-left">
                    <input  type="button" id="send" class="btn btn-success" value="إرسال">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input  id="cancel" type="button" class="btn btn-danger" value="إلغاء">
                </div>
            </div>
        </div>
        </div>
    </div>
