<?php
if(!empty($_SESSION)){

$loggedUser = $_SESSION['user'];
$id_logged=$loggedUser['idd'];
 }
else {
    header('location:index.php?action=body');
}
$fname="";
$lname="";
$customer="";
$cust=array();
$subject="";
$desc="";
$consul="";
$lawyer="";
$lawyer="";
$ctype="";
$ok="";
$disabled="";
if (isset($_GET['id'])){
    $con=connectDB($_SESSION['office']);
    mysqli_query($con,"SET NAMES 'utf8'");
    mysqli_query($con,'SET CHARACTER SET utf8');
    $query="select * from consultation where ID=".$_GET['id'];
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($result);
        $fname=$row['firstname'];

        $lname=$row['lastname'];
        $customer=$row['customer'];
        if($customer >0)
            $cust=GetCustomerByID($customer);
      //  print_r($cust);
        $subject=str_ireplace("<br />","\r\n",$row['subject']);
        $desc=str_ireplace("<br />","\r\n",$row['description']);
        $consul=$row['appoint'];
        $lawyer=$row['lawyer_ID'];
        $ctype=$row['consult_type'];
        //echo $row['status'];
        if($row['status']=="CANCEL"){
            $result="disabled";
        }
        else if($row['status']=="LAWYER") {
            $result="lawyer";
        }
        else {
            $result="enabled";
        }


    }
    mysqli_close($con);
}
else {
    header('Location: ../notFound.php');
}

/* Show list of lawyers/consultants   */
//echo $lawyer;
if($lawyer!=0){
    $law=explode(",",$lawyer);
    $arr=array();
    $content="";

        foreach($law as $l){
        $arr=GetUserByID($l);
        $content.="<li>".$arr[0]['fname']." ".$arr[0]['lname'];
    }
}
else {
    $content="";
}
$case="";
if(isset($_GET['act'])){
    if($_GET['act']=="lawyer"){
        $case="GO";// link to open a case.
    }
}
?>
    <script language="javascript">
        $(document).ready(function () {
            var cons= <?php echo $consul; ?>;
            var idd= <?php echo $_GET['id']; ?>;
            var id_user=<?php echo $id_logged; ?>;
            $("#send").click(function () {
                $.ajax({
                    type: "get",
                    url: "consultation/ajax.php",
                    data: 'act=sendToLawyer&id='+idd+'&appoint='+cons+'&id_user='+id_user,
                    success: function (dataa) {
                        notif({
                            msg: "لقد تم إرسال طلب الإستشارة إلى المحامي",
                            type: "success"
                        }),
                        setTimeout(
                            function()
                            {
                                window.location.href="index.php";
                            }, 2000);
                    }
                });

            });
            $("#opencase").click(function () {
                var fname= "<?php echo $fname ?>";
                var lname= "<?php echo $lname ?>";
                var customer= "<?php echo $customer ?>";
                var subject= "<?php echo $subject ?>";
                var desc= "<?php echo $desc ?>";
                var appoint= "<?php echo $consul ?>";
                var lawyer=" <?php echo $lawyer ?>";
                var type= "<?php echo $ctype;  ?>";
                window.location.href="index.php?action=NEWFile/index&act=opencase&fname="+fname+"&lname="+lname+"&customer="+customer+
                                        "&subject="+subject+"&desc="+desc+"&appoint="+appoint+
                                        "&lawyer="+lawyer+"&ctype="+type;
            });
            $("#sec_appoint").click(function () {
                var fname= "<?php echo $fname ?>";
                var lname= "<?php echo $lname ?>";
                var subject= "<?php echo $subject ?>";
                var desc= "<?php echo $desc ?>";
                var appoint= "<?php echo $consul ?>";
                var lawyer=" <?php echo $lawyer ?>";
                var type= "<?php echo $ctype ?>";
                $.ajax({
                    type: "get",
                    url: "calendar/add_events.php",
                    data: 'title= مراجعة ' + fname + '-'+ lname + '&start=' + '&description=' + '&consultation_ID='+ idd +'&url='+urll,
                    success: function (dataa) {
                        notif({
                            msg: "لقد تم إرسال طلب الإستشارة إلى المحامي",
                            type: "success"
                        }),
                            setTimeout(
                                function()
                                {
                                    window.location.href="index.php";
                                }, 2000);
                    }
                });
            });
        });
    </script>

<!-- WRAPPER DROITE -->
<?php
if($result=="disabled"){
    echo "<center><h1 style='background-color: red;font-size: x-large;'> لم يتم قبول طلب الإستشارة... يرجى مراجعة مدير المكتب</h1></center><br/>";
}
?>
<div class="container">
    <div  style=" margin-top:10px" class="mainbox col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php
               if(empty($cust)){
                ?>

                    <?php

                    }
                    else {
                ?>
                <div class="panel-title" style="direction:rtl;"><b>بيان إستشاري جديد
                        ل: <?php echo $cust[0]['cfname'] . " " .$cust[0]['csname'] . " ".$cust[0]['ctname'] . " ". $cust[0]['clname']; ?>    </b>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="panel-body" style="direction:rtl;" >
                <div class="form-group">
                    <div class="col-md-9">
                        <span style="font-size: large;font-weight:bold;"><?php echo  getTypeById($ctype, "ctype", "case_type"); ?></span> <br>
                    </div>
                    <label for="ctype" class="col-md-3 control-label">نوع الإستشار :</label>
                </div><br/><br/>
                <div class="form-group">
                    <div class="col-md-9">

                        <?php
                        echo $content;
                        ?>
                    </div>
                    <label for="lawyer" class="col-md-3 control-label">إضافة محامي أو مستشار:</label>
                </div><br/><br/>

                <div class="form-group">
                    <div class="col-md-9">
                        <span style="font-size: large;font-weight:bold;">
                            <?php echo $subject; ?>
                               </span><br><br>
                    </div>
                    <label for="subject" id="sub" class="col-md-3 control-label">موضوع الإستشارة وعنوانها* :</label>
                </div><br/><br/>
                <div class="form-group">
                    <div class="col-md-9">
                        <textarea class="form-control"  style="width:325px;text-align:right;font-weight:bold;"  id="description" disabled ><?php echo trim($desc); ?></textarea><br><br>
                    </div>
                    <label for="description" id="desc" class="col-md-3 control-label"> تفاصيل الإستشارة* : </label>
                </div>
                <div class="form-group">
                    <div class="col-md-9">
                        <span style="font-size: large;font-weight:bold;">
                            <?php echo getTypeById($consul,"fname", "users" )." ".getTypeById($consul,"lname", "users" ); ?>
                        </span><br><br>
                    </div>
                    <label for="appointm" id="desc" class="col-md-3 control-label">تحديد موعد مع: </label>
                </div>
                <div class="form-group">
                    <?php
                    if(($result!="disabled") &&($case!='GO') &&($result!="lawyer")){
                        echo '<div class="col-md-offset-3 col-md-9 pull-left">
                        <input  type="button" id="send" class="btn btn-success" value="إرسال">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input  id="cancel" type="button" class="btn btn-danger" value="إلغاء">
                    </div>';
                    }
                    if(($result=="lawyer") &&($case!='GO')){
                        echo '<div class="col-md-offset-3 col-md-9 pull-left">
                                <span>
                                   لقد تم إرسال البيان من قبل.. الرجاء مراجعة المحامي
                                </span>
                    </div>';
                    }
                    if(($result!="disabled") &&($case=='GO')){
                        echo ' <div class="col-md-offset-3 col-md-9 pull-left">
                        <input  type="button" id="opencase" class="btn btn-success" value="فتح ملف">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        
                    </div>';
                    }
                    ?>
            </div>
        </div>
    </div>
        </div>

  </div>