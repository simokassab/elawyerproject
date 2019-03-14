<?php 

?>

<script language="javascript">
        $(document).ready(function () {
            $('input[type=radio][name=optradio]').change(function() {
                if (this.value == 'new') {
                    $("#ffname").css("display","none");
                    $("#divf").css("display","none");
                    $("#fffname").css("display","none");
                    $("#name").css("display","inline");
                    $("#lname").css("display","inline");
                    $("#emaill").css("display","inline");
                    $("#firstname").css("display","inline");
                    $("#lastname").css("display","inline");
                    $("#labelemail").css("display","inline");
                    $("#firstname").attr("required","true");
                    $("#lastname").attr("required","true");
                    $("#emaill").css("required","true");
                }
                else if (this.value == 'existing') {
                    $("#ffname").css("display","inline");
                    $("#fffname").css("display","inline");
                    $("#divf").css("display","inline");
                    $("#name").css("display","none");
                    $("#lname").css("display","none");
                    $("#emaill").css("display","none");
                    $("#firstname").css("display","none");
                    $("#lastname").css("display","none");
                    $("#labelemail").css("display","none");
                    $("#firstname").removeAttr("required");
                    $("#lastname").removeAttr("required");
                    $("#emaill").removeAttr("required");
                    $("#ffname").select2();
                }
            }); 

        });

</script>
<!-- Modal -->

<?php include_once "underheader.php"; ?>
         
<form id="addCase" name="addCase" class="form-horizontal" role="form" action="DBS/addExecution.php" method="post">
<div class="home-cases-section">
	<div class="panel panel-info">
      <!-- Default panel contents -->
      <div class="panel-heading c-list">
        <span class="title">إجراء التنفيذ</span>
       </div>
        <div class="panel-body" style="direction:rtl;" >
	        <div class="form-group">
	            <div class="col-md-9">
	                <table class="table">
	                    <tr>
	                        <td>منفذ<input type="radio" name="optradio1" id="monafeth" value="1" checked="checked"></td>
	                        <td>منفذ ضده<input type="radio"  name="optradio1" id="diddaho" value="2"></td>
	                    </tr>
	                </table>
	          </div>
	        </div>
	        <div class="form-group">
	         <label style="float: right" for="firstname"  class="col-md-3 control-label">الإجراء* : </label>
	            <div class="col-md-9">
	                <input type="text" required="false" class="form-control" id="nameexec" name="nameexec" placeholder="إالإجراء">
	            </div>
	            
	        </div>
        </div>
    </div>
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
                 <label style="float: right" for="emaill" id="lableemail" class="col-md-3 control-label"> بريد إلكتروني* :</label>
                <div class="col-md-9">
                    <input  type="text" required="false" class="form-control" id="emaill" name="emaill" placeholder=" بريد إلكتروني">
                </div>
            </div>
            <br/>
	        <div class="form-group">                               
	        <div class="col-md-9">
	            <input  type="submit" name="submit" id="btn-signup" type="button" class="btn btn-warning" value="اضافة">
	              <button type="button" class="btn btn-danger">إلغاء</button>
	        </div>
   		</div>
        </div>
        
    </div>
</div>
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