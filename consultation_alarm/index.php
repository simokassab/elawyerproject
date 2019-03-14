<?php
if((!empty($_SESSION)) && ($_SESSION['user']['level_ID']==4)){
$loggedUser = $_SESSION['user'];
$id_logged=$loggedUser['idd'];
    ?>
<?php }
else {
    include "notFound.php";
    exit();
    //header('location:index.php?action=body');
}?>
    <script language="javascript">
        $(document).ready(function () {
            $('input[type=radio][name=optradio]').change(function() {
                if (this.value == 'new') {
                    $("#ffname").css("display","none");
                    $("#divf").css("display","none");
                    $("#fffname").css("display","none");
                    $("#name").css("display","inline");
                    $("#lname").css("display","inline");
                    $("#firstname").css("display","inline");
                    $("#lastname").css("display","inline");
                }
                else if (this.value == 'existing') {
                    $("#ffname").css("display","inline");
                    $("#fffname").css("display","inline");
                    $("#divf").css("display","inline");
                    $("#name").css("display","none");
                    $("#lname").css("display","none");
                    $("#firstname").css("display","none");
                    $("#lastname").css("display","none");
                    $("#ffname").select2();
                }
            });

            $("#send").click(function () {
                var ctype = $("#ctype").val();
                var id_user= <?php echo $id_logged;  ?>;
                var managers=$("#managers").val();
               // alert(managers);
                ///alert(id_user);
                var ffname = $("#ffname").val();
                var firstname = $("#firstname").val();
                var lastname = $("#lastname").val();
                var subject = $("#subject").val().replace(/\r\n|\r|\n/g,"<br />").trim();
                var description = $("#description").val().replace(/\r\n|\r|\n/g,"<br />").trim();
                var valid = true;
                if ($("#new").is(":checked")){
                    if (firstname == "") {
                        $("#name").css("color", "red");
                        valid = false;
                    }
                    if (firstname != "") {
                        $("#name").css("color", "black");
                    }
                    if (lastname == "") {
                        $("#lname").css("color", "red");
                        valid = false;
                    }
                    if (lastname != "") {
                        $("#lname").css("color", "black");
                    }
                }
                else {
                    if(ffname==null){
                        $("#fffname").css("color", "red");
                        valid = false;
                    }
                    else {
                        $("#fffname").css("color", "black");

                    }
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
                        data: 'act=insert&ctype=' + ctype + '&firstname=' + firstname + '&lastname=' + lastname +'&customer='+ffname+
                        '&subject=' + subject + '&description=' + description.trim()+'&id_user='+id_user+'&managers='+managers,
                        success: function (dataa) {
                            notif({
                                msg: "لقد تم إرسال طلب الإنذار إلى مدير المكتب للإطلاع عليه",
                                type: "success"
                            });
                            setTimeout(
                                function()
                                {
                                 //   window.location.href='index.php?action=mainpage';
                                }, 2000);
                        }
                    });
                }
            });
        });
    </script>

<!-- MENU PRINCIPAL -->
<div class="container">
    <div  style=" margin-top:10px" class="mainbox col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title" style="direction:rtl;" ><b>طلب إنذار</b>

            </div>
        </div>
        <div class="panel-body" style="direction:rtl;" >
            <div class="form-group">
                <div class="col-md-9">
                    <table class="table">
                        <tr>
                            <td>عميل جديد <input type="radio" name="optradio" id="new" value="new" checked="checked"></td>
                            <td>عميل موجود<input type="radio"  name="optradio" id="existing" value="existing"></td>
                        </tr>
                    </table>
            </div><br/><br/>
                <div class="col-md-9">
                    <select class="form-control" id="ctype" >
                        <<?php echo  getCaseTypes(); ?>
                    </select>
                </div>
                <label for="ctype" class="col-md-3 control-label">نوع الإنذار :</label>
            </div><br/><br/>
            <div class="form-group">
                <div class="col-md-9"  id="divf" >
                    <select class="form-control"   id="ffname"  style="display: none" >
                        <option value="null" selected disabled>إسم العميل</option>
                        <?php
                        $cus=array();
                        $cus=getAllCustomers();
                        foreach ($cus as $c){
                            echo "<option value='".$c['ID']."'>".$c['cfname']." ".$c['csname']." ".$c['ctname']." ".$c['clname']
                            ."</option>";
                        }
                        ?>
                    </select>

                </div>
                <label for="ffname" style="display: none"  id="fffname" class="col-md-3 control-label">إسم العميل* :</label>
                <div class="col-md-9">
                    <input required="" type="text" class="form-control" id="firstname" name="firstname" placeholder="إسم الموكل">
                </div>
                <label for="firstname" id="name" class="col-md-3 control-label">إسم الموكل* : </label>
            </div><br/><br/><br/><br/>
            <div class="form-group">
                <div class="col-md-9">
                    <input required="" type="text" class="form-control" id="lastname" name="lastname" placeholder=" العائلة">
                </div>
                <label for="lastname" id="lname" class="col-md-3 control-label"> العائلة* :</label>
            </div><br/><br/><br/>
            <div class="form-group">
                <div class="col-md-9">
                    <input required="" type="text" class="form-control" id="subject" name="subject" placeholder="موضوع الإنذار وعنوانه">
                </div>
                <label for="subject" id="sub" class="col-md-3 control-label">موضوع الإنذار* :</label>
            </div><br/><br/><br/>
            <div class="form-group">
                <div class="col-md-9">
                    <textarea class="form-control" style="resize: none;" rows="7" required="required" id="description" placeholder=" تفاصيل الإنذار"></textarea><br/><br/>
                </div>
                <label for="description" id="desc" class="col-md-3 control-label"> تفاصيل الإنذار* : </label>
            </div>

            <div class="form-group">
                <div class="col-md-9">
                    <select class="form-control" id="managers" >
                        <option value="" selected disabled>إختار مدير المكتب</option>
                        <?php
                        echo getOptionsManagers("users", "ID", "fname", "lname", '' );
                        ?>
                    </select>
                </div>
                <label for="managers" id="desc" class="col-md-3 control-label">مدير المكتب: </label>
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
