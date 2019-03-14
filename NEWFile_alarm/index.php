<?php
$created="";
$fname="";
$lname="";
$subject="";
$appoint="";
$ctype="";
$desc="";
$appoint="";
$law="";

if(isset($_GET['act'])){
	$fname=$_GET['fname'];
	$lname=$_GET['lname'];
	$customer=$_GET['customer'];
	$subject=$_GET['subject'];
	$appoint=$_GET['appoint'];
	$ctype=$_GET['ctype'];
	$desc=$_GET['desc'];
	$law=$_GET['lawyer'];
}

else if(isset($_GET['created'])){
	$created="yes";
	//echo $created;
}
else {
	$created="";
}

if ($customer!=""){
	$cust=array();
	$cust=GetCustomerByID($customer);
}
?>
<script type="text/javascript">
	$(document).ready(function() {
		var s="";
		s="<?php echo $created; ?>";
		if (s!=""){
			notif({
				msg: "لقد تم إرسال الملف إلى قسم التدقيق ",
				type: "success"
			});

		}

	});
</script>

<form id="newcaseform" name="newcaseform"  role="form" action="NEWFile_alarm/ajax.php" method="get">
	<input type="hidden" id="customerid" name="customerid" value="<?php echo $customer; ?>" >
<div class="container">
<div id="newcase" style=" margin-top:10px" class="mainbox col-md-9 col-md-offset-3 col-sm-10 col-sm-offset-2">
<div class="panel panel-primary">
	<div class="panel-heading">
		<div class="panel-title" style="direction:rtl;" ><b>إستمارة فتح ملف (إنذار)</b>
				<div class='col-md-3'>
					<input type='text' class="form-control" id='casedate' name='casedate' required="required" />
				</div>
				<label for="casedate" class="col-md-1 control-label">التاريخ</label>
			<br/><br/>
			<script type="text/javascript">
				$(function () {
					$('#casedate').datetimepicker({
						format: "Y-m-d"
					});
				});

			</script>

		</div>
	</div>
	<div class="panel-body" style="direction:rtl;" >
		<div class="table-responsive">
				<table class="table">
					<thead>
					<th colspan="4" style="float: right;"> الموكل</th>
					</thead>
					<tr>
						<td>
							<input required="" type="text" value="<?php if($customer==0) echo $fname; else echo $cust[0]['cfname']; ?>"
								   class="form-control" name="customer" id="customer" placeholder="الإسم الأول">
						</td>
						<td>
							<input required="" type="text" value="<?php if($customer!=0)  echo $cust[0]['csname']; ?>"
								   class="form-control" name="customer2" id="customer2" placeholder="الإسم الثاني">
						</td><td>
							<input required="" type="text" value="<?php if($customer!=0)  echo $cust[0]['ctname']; ?>"
								   class="form-control" name="customer3" id="customer3" placeholder="الإسم الثالث">
						</td>
						<td>
							<input required="" type="text" value="<?php if($customer==0) echo $lname; else echo $cust[0]['clname']; ?>"
								   class="form-control" name="customer4" id="customer4" placeholder="الإسم الرابع">
						</td>
					</tr>
					<tr>
						<td colspan="4">
							<input required="" type="text"  value="<?php if($customer!=0)  echo $cust[0]['CID_number']; ?>"
								   class="form-control" name="IDNUMBER" id="IDNUMBER" placeholder="الرقم المدني">
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input required="" type="text"  value="<?php if($customer!=0)  echo $cust[0]['cphone1']; ?>"
								   class="form-control" name="t1" id="t1" placeholder="Tel 1">
						</td>
						<td>
							<input  type="text"  value="<?php if($customer!=0)  echo $cust[0]['cphone3']; ?>"
									class="form-control" name="t3" id="t3" placeholder="Tel 3">
						</td>
						<td>
							<input  type="text"  value="<?php if($customer!=0)  echo $cust[0]['cphone5']; ?>"
									class="form-control" name="t5" id="t5" placeholder="Tel 5">
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input  type="text" value="<?php if($customer!=0)  echo $cust[0]['cphone2']; ?>"
									class="form-control" name="t2" id="t2" placeholder="Tel 2">
						</td>
						<td>
							<input  type="text"  value="<?php if($customer!=0)  echo $cust[0]['cphone4']; ?>"
									class="form-control" name="t4" id="t4" placeholder="Tel 4">
						</td>
						<td>
							<input  type="text"  value="<?php if($customer!=0)  echo $cust[0]['cphone6']; ?>"
									class="form-control" name="t6" id="t6" placeholder="Tel 6">
						</td>
					</tr>
					<tr>
						<td colspan="4">
							<input required="" type="text" class="form-control" id="cust_desc" name="cust_desc" placeholder="صفته">
						</td>
					</tr>
				</table>
		</div>
	</div>
</div>
	<div class="panel panel-primary" style="direction:rtl;">
		<div class="table-responsive">
			<table class="table">
				<thead>
				<th colspan="4" style="float: right;">الخصم</th>
				</thead>
				<tr>
					<td>
						<input required="" type="text"
							   class="form-control" name="opponent" id="opponent" placeholder="الإسم الأول">
					</td>
					<td>
						<input required="" type="text" class="form-control" name="opponent2" id="opponent2" placeholder="الإسم الثاني">
					</td><td>
						<input required="" type="text" class="form-control" name="opponent3" id="opponent3" placeholder="الإسم الثالث">
					</td>
					<td>
						<input required="" type="text" class="form-control" name="opponent4" id="opponent4" placeholder="الإسم الرابع">
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<input required="" type="text" class="form-control" name="OPIDNUMBER" id="OPIDNUMBER" placeholder="الرقم المدني">
					</td>
				</tr>
				<tr>
					<td colspan="2	">
						<input required="" type="text" class="form-control" name="opt1" id="opt1" placeholder="Tel 1">
					</td>
					<td>
						<input  type="text" class="form-control" name="opt2" id="opt2" placeholder="Tel 2">
					</td>
					<td>
						<input  type="text" class="form-control" name="opt3" id="opt3" placeholder="Tel 3">
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<input required="" type="text" class="form-control" id="opponent_desc" name="opponent_desc" placeholder="صفته">
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-body" style="direction:rtl;" >
			<div class="form-group">
				<div class="col-md-9">
					<input required="" value="<?php echo $subject; ?>" type="text" class="form-control" name="subject" id="subject" placeholder="موضوع الدعوة">
				</div>
				<label for="customer" class="col-md-3 control-label">موضوع الإنذار :</label>
			</div>
			<div class="form-group">
				<div class="col-md-9">
					<select class="form-control" id="ctype" name="ctype" required="required">
						<option value="" selected disabled>نوع الإنذار</option>
						<?php
							echo getOptions("case_type", "ID", "ctype", "$ctype");
						?>
					</select>
				</div>
				<label for="email" class="col-md-3 control-label">نوع الإنذار :</label>
			</div>
		</div>
	<div class="panel-body" style="direction:rtl;" >
		<div class="form-group">
			<div class="col-md-9">
				<textarea class="form-control" value="<?php echo $desc; ?>" style="resize: none;" rows="12" required="required" id="details" name="details" placeholder="تفاصيل الإنذار"><?php echo $desc; ?></textarea>
			</div>
			<label for="details" class="col-md-3 control-label">تفاصيل الإنذار :</label>
		</div>
	</div>
</div>
	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="panel-title" style="direction:rtl;" ><b>التفاصيل المالية</b></div>
		</div>
		<div class="panel-body" style="direction:rtl;" >
			<div class="form-group">
				<div class="col-md-9">
					<input required="" type="text" class="form-control" id="price" name="price" placeholder="إجمالي الأتعاب">
				</div>
				<label for="price" class="col-md-3 control-label">إجمالي الأتعاب :</label>
			</div>
			<div class="form-group">
				<div class="col-md-9">
					<input required="" type="text" class="form-control" id="paid" name="paid" placeholder="المبلغ المدفوع">
				</div>
				<label for="paid" class="col-md-3 control-label">المبلغ المدفوع :</label>
			</div>
			<div class="form-group">
				<div class="col-md-9">
					<input disabled="disabled" type="text" class="form-control" id="remaining" name="remaining" placeholder="المبلغ المتبقي">
				</div>
				<label for="remaining" class="col-md-3 control-label">المبلغ المتبقي :</label>
			</div>
			<div class="form-group">
				<div class="col-md-9">
					<input type="text" class="form-control" id="paidtype"  name="paidtype" placeholder="طريقة السداد">
				</div>
				<label for="paidtype" class="col-md-3 control-label">طريقة السداد :</label>
			</div>
		</div>
	</div>
	<div class="panel panel-danger">
		<div class="panel-heading">
			<div class="panel-title" style="direction:rtl;" ><b>القائم بالتعاقد وملاحظات هامة</b></div>
		</div>
		<div class="panel-body" style="direction:rtl;" >
			<div class="form-group">
				<div class="col-md-9">
					<select class="form-control" id="lawyer" name="lawyer"   >
						<?php
						echo getOptionsLawyers("users", "ID","fname", "lname","$appoint");
						?>
					</select>
				</div>
				<label for="lawyer" class="col-md-3 control-label">المحامي :</label>
			</div>
			<div class="form-group">
				<div class="col-md-9">
					<select class="form-control" id="consultant" name="consultant"   >
						<option value="null" selected disabled>المستشار</option>
						<?php
						echo getOptionsConsultant("users", "ID","fname", "lname","");
						?>
					</select>
				</div>
				<label for="consultant" class="col-md-3 control-label">المستشار :</label>
			</div>
			<div class="form-group">
				<div class="col-md-9">
					<?php
					$ass="";
					$content="<br/><br/><ul class=\"list-group\">";
					if($law!=0){
						$ass=explode(",",$law);
						$arr=array();
						$content="";
						foreach($ass as $l){

							$arr=GetUserByID($l);
							$content.="<li class=\"list-group-item\">".$arr[0]['fname']." ".$arr[0]['lname'];
						}
						echo $content."</ul>";
					}
					?>
					<input type="hidden" id="assign" name="assign" value="<?php echo $law; ?>"/>
				</div>
				<label for="assign" class="col-md-3 control-label">المشاركون :</label>
			</div>
			<div class="form-group">
				<div class="col-md-9">
					<textarea class="form-control" style="resize: none;" rows="10"  required="required" id="comments" name="comments" placeholder="الملاحظات"></textarea>
				</div>
				<label for="firstname" class="col-md-3 control-label">الملاحظات<br/>
					(< 1000 حرفا)</label>
			</div>
			<br/>
			<div class="form-group">
				<div class="col-md-9">
					<select class="form-control" id="consultant" name="auditors"   >
						<option value="" selected disabled>المدقق</option>
						<?php
						echo getOptionsAuditors("users", "ID","fname", "lname","");
						?>
					</select>
				</div>
				<label for="auditors" class="col-md-3 control-label">المدقق :</label>
			</div>
			<div class="form-group">
				<div class="col-md-offset-3 col-md-9 pull-left">
					<br/><br/>
					<input  type="submit" id="sub" name="sub" class="btn btn-success" value="إرسال للتدقيق">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input  id="cancel" type="button" class="btn btn-danger" value="إلغاء">
				</div>
			</div>
		</div>

	</div>

	 </div>
</div>
</form>

