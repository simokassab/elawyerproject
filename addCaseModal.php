<?php 
    $customers=getAllCustomers();
    $casesTypes = getAllCase_Type();
    $lawyerss = getLawyersName();
    //print_r(getLawyersName());
   // echo $lawyers[1]['USERID']."fffff";
    $consultants = getAllConsultant();
    $opponents = getAllOpponents();

   // if(isset($_GET['result']) &&($_GET['result']!='')){
   //     header('location: index.php?action=NEWFile/customer&id'.$_GET['caseid']);
  //  }
  //  else {
   //     header('location: index.php?action=cases&id_case='.$_GET['caseid']);
   // }

?>
<style>


/* Important part */
.modal-dialog{
    overflow-y: initial !important
}
.modal-body{
    height: 550px;
    overflow-y: auto;
    overflow-x: hidden;
}
</style>
<script language="javascript">
        $(document).ready(function () {

            var getUrlParameter = function getUrlParameter(sParam) {
                var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                    sURLVariables = sPageURL.split('&'),
                    sParameterName,
                    i;

                for (i = 0; i < sURLVariables.length; i++) {
                    sParameterName = sURLVariables[i].split('=');

                    if (sParameterName[0] === sParam) {
                        return sParameterName[1] === undefined ? true : sParameterName[1];
                    }
                }
            };

            var result=getUrlParameter('result');
            var caseid=getUrlParameter('caseid');
           
            if(result==''){
                notif({
                        msg: "لقد تم فتح القضية بنجاح... الرجاء المتابعة..",
                        type: "info"
                    });
                setTimeout(
                    function () {
                        window.location.href = "index.php?action=cases&id_case="+caseid;
                    }, 3000);
            }

            if(result=='1'){
                 notif({
                        msg: "لقد تم فتح القضية بنجاح... الرجاء المتابعة..",
                        type: "info"
                    });
                setTimeout(
                    function () {
                        window.location.href = "index.php?action=NEWFile/customer&id="+caseid;
                        }, 3000);
            }
            if(result=='2'){

            }
            if(result=='12'){
                notif({
                        msg: "لقد تم فتح القضية بنجاح... الرجاء المتابعة..",
                        type: "info"
                    });
                setTimeout(
                    function () {
                        window.location.href = "index.php?action=NEWFile/customer&id="+caseid;
                        }, 3000);
            }
            //alert(result);

            $('input[type=radio][name=optradio]').change(function() {
                if (this.value == 'new') {
                    $("#ffname").css("display","none");
                    $("#divf").css("display","none");
                    $("#fffname").css("display","none");
                    $("#name").css("display","inline");
                    $("#lname").css("display","inline");
                    $("#firstname").css("display","inline");
                    $("#lastname").css("display","inline");
                    $("#firstname").attr("required","true");
                    $("#lastname").attr("required","true");
                }
                else if (this.value == 'existing') {
                    $("#ffname").css("display","inline");
                    $("#fffname").css("display","inline");
                    $("#divf").css("display","inline");
                    $("#name").css("display","none");
                    $("#lname").css("display","none");
                    $("#firstname").css("display","none");
                    $("#lastname").css("display","none");
                    $("#firstname").removeAttr("required");
                    $("#lastname").removeAttr("required");
                    $("#ffname").select2();
                }
            });

            $('input[type=radio][name=ooptradio]').change(function() {
                if (this.value == 'new') {
                    $("#offname").css("display","none");
                    $("#odivf").css("display","none");
                    $("#offfname").css("display","none");
                    $("#oname").css("display","inline");
                    $("#olname").css("display","inline");
                    $("#ofirstname").css("display","inline");
                    $("#olastname").css("display","inline");
                    $("#ofirstname").attr("required","true");
                    $("#olastname").attr("required","true");
                }
                else if (this.value == 'existing') {
                    $("#offname").css("display","inline");
                    $("#offfname").css("display","inline");
                    $("#odivf").css("display","inline");
                    $("#oname").css("display","none");
                    $("#olname").css("display","none");
                    $("#ofirstname").css("display","none");
                    $("#olastname").css("display","none");
                    $("#ofirstname").removeAttr("required");
                    $("#olastname").removeAttr("required");
                    $("#offname").select2();
                }
            });

        });

</script>
<!-- Modal -->

<?php include_once "underheader.php"; ?>
         
<form id="addCase" name="addCase" class="form-horizontal" role="form" action="DBS/addCase.php" method="post">
<div class="home-cases-section">
    <div class="panel panel-info">
          <!-- Default panel contents -->
          <div class="panel-heading c-list">
            <span class="title">الموكل</span>
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
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="ffname" style="display: none;float: right;"  id="fffname" class="col-md-3 control-label">إسم الموكل* :</label>
                            <div class="col-md-9"  id="divf" >
                                <select class="form-control"  name='ffname' id="ffname"  style="display: none" >
                                    <option value="null" selected disabled>إسم الموكل</option>
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
                        </div>
                        <div class="form-group">
                         <label style="float: right" for="firstname" id="name" class="col-md-3 control-label">إسم الموكل* : </label>
                            <div class="col-md-9">
                                <input type="text" required="false" class="form-control" id="firstname" name="firstname" placeholder="إسم الموكل">
                            </div>
                            
                        </div>
                        <div class="form-group">
                             <label style="float: right" for="lastname" id="lname" class="col-md-3 control-label"> العائلة* :</label>
                            <div class="col-md-9">
                                <input  type="text" required="false" class="form-control" id="lastname" name="lastname" placeholder=" العائلة">
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="float: right"  class="col-md-3 control-label">وصف عن الموكل</label>
                            <div class="col-md-9">
                                <input  required="" type="text" class="form-control" name="customerDesc" id='customerDesc' placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-danger">
                      <div class="panel-heading c-list">
                        <span class="title">الخصم</span>
                       </div>
                        <div class="panel-body" style="direction:rtl;" >
                                <div class="form-group">
                                    <div class="col-md-9">
                                        <table class="table">
                                            <tr>
                                                <td> خصم جديد <input type="radio" name="ooptradio" id="new" value="new" checked="checked"></td>
                                                <td>خصم موجود<input type="radio"  name="ooptradio" id="existing" value="existing"></td>
                                            </tr>
                                        </table>
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label for="ffname" style="display: none;float: right;"  id="offfname" class="col-md-3 control-label">إسم الخصم* :</label>
                                    <div class="col-md-9"  id="odivf" >
                                        <select class="form-control"   id="offname" name="offname"  style="display: none;direction:rtl;float: right;" name='opponents_ID' >
                                            <option value="null" selected disabled >إسم الخصم</option>
                                           <?php for ($i = 0; $i < count($opponents); $i++) {
                                                $opponent = $opponents[$i];
                                                ?>
                                                <option value="<?php echo $opponent['ID'] ?>"><?php echo $opponent['ofname'] . " " . $opponent['osname']." ".$opponent['otname']." ".$opponent['olname']; ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                 <label style="float: right" for="firstname" id="oname" class="col-md-3 control-label">إسم الخصم* : </label>
                                    <div class="col-md-9">
                                        <input  type="text" required="false" class="form-control" id="ofirstname" name="ofirstname" placeholder="إسم الخصم">
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                     <label style="float: right" for="lastname" id="olname" class="col-md-3 control-label"> العائلة* :</label>
                                    <div class="col-md-9">
                                        <input  type="text" required="false" class="form-control" id="olastname" name="olastname" placeholder=" العائلة">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" class="col-md-3 control-label">وصف الخصم </label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="oppoDesc" id='oppoDesc' placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-warning  ">
                          <div class="panel-heading c-list">
                            <span class="title">معلومات عن القضية</span>
                           </div>
                            <div class="panel-body" style="direction:rtl;" >
                                <div class="form-group">
                                    <label style="float: right"  class="col-md-3 control-label">تاريخ البدء</label>
                                    <div class="col-md-9">
                                        <input  required="" type="text" id="caseStartDate" class="form-control" name="caseStartDate" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">نوع القضية</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="caseTypeID">
                                            <?php for ($i = 0; $i < count($casesTypes); $i++) {
                                                $caseType= $casesTypes[$i];
                                                ?>
                                                <option value="<?php echo $caseType['ID'] ?>"><?php echo $caseType['ctype'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="email" class="col-md-3 control-label"> </label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="lawyer_ID">
                                            <option value="0" selected>المحامي</option>
                                            <?php for ($i = 0; $i < count($lawyerss); $i++) {
                                                $lawyer = $lawyerss[$i];
                                                ?>
                                                <option value="<?php echo $lawyer['USERID'] ?>"><?php echo $lawyer['fname'] . " " . $lawyer['sname']." ".$lawyer['tname']." ".$lawyer['lname']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="email" class="col-md-3 control-label">مستشار</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="consultant_ID">
                                            <option value="0" selected>مستشار</option>
                                            <?php for ($i = 0; $i < count($consultants); $i++) {
                                                $consultant = $consultants[$i];
                                                ?>
                                                <option value="<?php echo $consultant['ID'] ?>"><?php echo $consultant['fname'] . " " . $consultant['sname']." ".$consultant['tname']." ".$consultant['lname']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">الأتعاب </label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="price" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">طريقة الدفع </label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="paidtype" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">المدفوع</label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="paid" placeholder="" value='0'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">الموضوع </label>
                                    <div class="col-md-9">
                                        <input required="" type="text" class="form-control" name="subject" id='subject' placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">ملاحظات </label>
                                    <div class="col-md-9">
                                    <textarea rows="7" class="form-control" form="addCase" name="description" id='description'></textarea>
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <input  type="submit" id="btn-signup" type="button" class="btn btn-warning" value="اضافة">
                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <br/>
                </form>
    </div><script type="text/javascript">
    // When the document is ready
    $(document).ready(function() {
        $('#caseStartDate').datetimepicker({
          timepicker:false,
        format:'Y-m-d'
        });

    });
</script>
</div>