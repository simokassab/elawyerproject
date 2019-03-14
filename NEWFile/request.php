<?php
$created="";
$result="";

$loggedUser = $_SESSION['user'];
$id_logged=$loggedUser['idd'];
if((isset($_GET['id']))) {
	$id = $_GET['id'];
	$con=connectDB($_SESSION['office']);
	$query = "Select * from form where ID=$id";
	mysqli_query($con, "SET NAMES 'utf8'");
	mysqli_query($con, 'SET CHARACTER SET utf8');
	$result = mysqli_query($con, $query);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$casedate = $row["date"];
		$customer = $row["customer"];
		//echo $customer;
		$customerid=$row['customerID'];
		//echo $customerid;
		$customer2 = $row["customer2"];
		//echo $customer2;
		$customer3 = $row["customer3"];
		$customer4 = $row["customer4"];
		$IDNUMBER = $row["IDNUMBER"];
		$t1=$row["t1"];
		$t2=$row["t2"];
		$t3=$row["t3"];
		$t4=$row["t4"];
		$t5=$row["t5"];
		$t6=$row["t6"];
		$cust_desc=$row["customer_desc"];
		$opponent=$row["opponent"];
		$opponent2=$row["opponent2"];
		$opponent3=$row["opponent3"];
		$opponent4=$row["opponent4"];
		$OPIDNUMBER=$row["OPIDNUMBER"];
		$opt1=$row["opt1"];
		$opt2=$row["opt2"];
		$opt3=$row["opt3"];
		$opponent_desc = $row["opponent_desc"];
		$subject = $row["subject"];
		$ctype = $row["type"];
		$details = $row["details"];
		$price = $row["price"];
		$paid = $row["paid"];
		$remaining = $row["remaining"];
		$paidtype = $row["p_type"];
		$lawyer = GetUserByID($row["lawyer_ID"]);
		//print_r($lawyer);
		$consultant = GetUserByID($row["consultant_ID"]);
		$assign = $row["assigned"];
		$comments = $row["comments"];
		$status = $row["status"];
        $result="";
		$cust=array();
		$cust=GetCustomerByID($customerid);
	}
	else {
		require_once("notFound.php");
		exit();
	}
}
 if((isset($_GET['act'])) && ($_GET['act']=="sendToLawyer") && (isset($_GET['id']))){

    $result="lawyer";
}

//echo $result;
?>
<script type="text/javascript">
	$(document).ready(function() {
			$('#print').click(function() {

				$.print("#container");

			});
$("#check").click(function(){
			var idd=<?php echo $id; ?>;
			var cust=$("#customer").val();
			var cust2=$("#customer2").val();
			var cust3=$("#customer3").val();
			var cust4=$("#customer4").val();
			var op=$("#opponent").val();
			var op2=$("#opponent2").val();
			var op3=$("#opponent3").val();
			var op4=$("#opponent4").val();
			$.ajax({
				type: "get",
				url: "NEWFile/ajax.php",
				data: 'act=check&c='+cust+'&c2='+cust2+'&c3='+cust3+'&c4='+cust4+'&op='+op+'&op2='+op2+'&op3='+op3+'&op4='+op4
						+'&idd='+idd,
				success: function (data) {
					if(data==""){
						$("#true").css("display","inline");
						$("#trueop").css("display","inline");
						$("#result").html("لقد تم تدقيق كل من الموكل والخصم بنجاح");

					}
					else if(data=="1"){
						$("#false").css("display","inline");
						$("#trueop").css("display","inline");
						$("#result").html("لقد تم تدقيق كل من الخصم بنجاح ولكن الموكل موجود كخصم في قاعدة البيانات");
					}
					else if(data=="2"){
						$("#true").css("display","inline");
						$("#falseop").css("display","inline");
						$("#result").html("لقد تم تدقيق الموكل بنجاح ولكن الخصم موجود كعميل في قاعدة البيانات");
					}
					else {
						$("#false").css("display","inline");
						$("#falseop").css("display","inline");
						$("#result").html("لم يتم تدقيق كل من الموكل والخصم");
					}
					$("#sub").css("display","inline");
				}
			});
			$('body').delay(1000) //wait 5 seconds
        .animate({
            //animate jQuery's custom "scrollTop" style
            //grab the value as the offset of #second from the top of the page
            'scrollTop': $('#resulta').offset().top
        }, 300); 
		});

        $("#sub").click(function(){
            var lawyer="<?php echo $row["lawyer_ID"]; ?>";
            var res=$("#result").html();
            var idd=<?php echo $id; ?>;
            var id_user=<?php echo $id_logged; ?>;
            $.ajax({
                type: "get",
                url: "NEWFile/ajax.php",
                data: '&res='+res+'&idd='+idd+'&lawyer='+lawyer+'&act=sendToLawyer&from='+id_user,
                success: function (data) {
                    notif({
                        msg: "تم إرسال الملف إلى المحامي",
                        type: "success"
                    });

                  //  setTimeout(
                  //      function()
                 //       {
                  //         window.location.href="index.php?action=mainpage";
                  //      }, 2000);
                }
            });
        });
        $("#open_case").click(function(){
            var idd =" <?php echo $id;?>";
            var customerid ="<?php echo $row["customerID"];?>";
		//	alert(customerid);
            var casedate ="<?php echo $row["date"];?>";
            var  cust ="<?php echo  $row["customer"];?>";
            var  cust2 ="<?php echo  $row["customer2"];?>";
            var  cust3 ="<?php echo  $row["customer3"];?>";
            var  cust4 ="<?php echo  $row["customer4"];?>";
            var  IDNUMBER ="<?php echo  $row["IDNUMBER"];?>";
            var  t1="<?php echo $row["t1"];?>";
            var   t2="<?php echo $row["t2"];?>";
            var  t3="<?php echo $row["t3"];?>";
            var   t4="<?php echo $row["t4"];?>";
            var   t5="<?php echo $row["t5"];?>";
            var   t6="<?php echo $row["t6"];?>";
            var    cust_desc="<?php echo $row["customer_desc"];?>";
            var   op="<?php echo $row["opponent"];?>";
            var op2="<?php echo $row["opponent2"];?>";
            var op3="<?php echo $row["opponent3"];?>";
            var op4="<?php echo $row["opponent4"];?>";
            var OPIDNUMBER="<?php echo $row["OPIDNUMBER"];?>";
            var  opt1="<?php echo $row["opt1"];?>";
            var   opt2="<?php echo $row["opt2"];?>";
            var   opt3="<?php echo $row["opt3"];?>";
            var    opponent_desc ="<?php echo  $row["opponent_desc"];?>";
            var    subject = "<?php echo $row["subject"];?>";
            var    ctype = "<?php echo $row["type"];?>";
            var   details =" <?php echo $row["details"];?>";
            var   price ="<?php echo  $row["price"];?>";
            var   paid =" <?php echo $row["paid"];?>";
            var   remaining ="<?php echo  $row["remaining"];?>";
            var   paidtype ="<?php echo  $row["p_type"];?>";
            var   lawyer ="<?php echo  $row["lawyer_ID"];?>";
            var   consultant ="<?php echo  $row["consultant_ID"];?>";
            var  assign ="<?php echo  $row["assigned"];?>";
            var   comments ="<?php echo  $row["comments"];?>";
            var    status ="<?php echo  $row["status"]; ?>";
            $.ajax({
                type: "get",
                url: "NEWFile/ajax.php",
                data: 'act=opencase&casedate='+casedate+'&customerid='+customerid+'&customer='+cust+'&customer2='+cust2+'&customer3='+cust3+'&customer4='+cust4+
                '&IDNUMBER='+IDNUMBER+'&customer_desc='+cust_desc+'&opponent='+op+'&opponent2='+op2+'&opponent3='+op3+'&opponent4='+op4+
                    '&t1='+t1+'&t2='+t2+'&t3='+t3+'&t4='+t4+'&t5='+t5+'&t6='+t6+'&OPIDNUMBER='+OPIDNUMBER+'&opt1='+opt1+
                    '&opt2='+opt2+'&opt3='+opt3+'&opponent_desc='+opponent_desc+'&subject='+subject+'&ctype='+ctype+
                '&details='+details+'&price='+price+'&paid='+paid+'&remaining='+remaining+'&paidtype='+paidtype+'&lawyer='+lawyer+
                '&consultant='+consultant+'&assign='+assign+'&comments='+comments+'&status='+status+'&id='+idd,
                success: function (dataa) {
					notif({
						msg: "لقد تم فتح القضية بنجاح... الرجاء المتابعة..",
						type: "info"
					});
					//alert(dataa);
					if (dataa.indexOf('&') > -1) {
						var s=dataa.split('&');
						//alert(s);
					setTimeout(
							function () {
								window.location.href = "index.php?action=cases&id_case="+s[0];
							}, 3000);
					}
					else {
						setTimeout(
								function () {
							window.location.href = "index.php?action=NEWFile/customer&id="+dataa;
						}, 3000);
					}
                }
            });
        });
	});
</script>
<form id="newcaseform" name="newcaseform"  role="form" action="NEWFile/ajax.php" method="get">
<div class="container">
<div id="newcase" style=" margin-top:10px" class="mainbox col-md-9 col-md-offset-3 col-sm-10 col-sm-offset-2">

<div class="panel panel-primary">
	<div class="panel-heading">
		<div class="panel-title" style="direction:rtl;" ><b>إستمارة فتح ملف</b><br/><br/>
            <?php
                if($result==""){
            ?>
			<input type="button" width="00px;" class="btn-danger" id="check" value="CHECK"/>
            <?php
                }
            else {

            }
            ?>
				<div class='col-md-3'>
					<input type='text' disabled="disabled"  value="<?php echo $casedate; ?>"
						   class="form-control" id='casedate' name='casedate' required="required" />
				</div>
				<label for="casedate" class="col-md-1 control-label">التاريخ</label>
			<br/><br/>
		</div>
	</div>
	<div class="panel-body" style="direction:rtl;" >
		<div class="table-responsive">
			<table class="table">
				<thead>
				<th  style="float: right;"> الموكل
				<span class="glyphicon glyphicon-ok" style="display: none" id="true"></span>
				<span class="glyphicon glyphicon-remove" style="display: none" id="false"></span></th>
				</thead>
				<tr>
					<td>
						<input required="" type="text" disabled="disabled"
							   value="<?php if($customerid=='') echo $customer; else echo $cust[0]['cfname']; ?>"
							   class="form-control" name="customer" id="customer" placeholder="الإسم الأول">
					</td>
					<td>
						<input required="" type="text" disabled="disabled"
							   value="<?php if($customerid=='')  echo $customer2; else echo $cust[0]['csname'] ?>"
							   class="form-control" name="customer2" id="customer2" placeholder="الإسم الثاني">
					</td><td>
						<input required="" type="text" disabled="disabled"
							   value="<?php if($customerid=='')  echo $customer3; else echo $cust[0]['ctname'] ?>"
							   class="form-control" name="customer3" id="customer3" placeholder="الإسم الثالث">
					</td>
					<td>
						<input required="" type="text" disabled="disabled"
							   value="<?php if($customerid=='')  echo $customer4; else echo $cust[0]['clname'] ?>"
							   class="form-control" name="customer4" id="customer4" placeholder="الإسم الرابع">
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<input required="" type="text" class="form-control" disabled="disabled"
							   value="<?php if($customerid=='')  echo $IDNUMBER; else echo $cust[0]['CID_number'] ?>"
							   name="IDNUMBER" id="IDNUMBER" placeholder="الرقم المدني">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input required="" type="text"  disabled="disabled"
							   value="<?php if($customerid=='')  echo $t1;else echo $cust[0]['cphone1'] ?>"
							   class="form-control" name="t1" id="t1" placeholder="Tel 1">
					</td>
					<td>
						<input  type="text"  disabled="disabled"
								value="<?php if($customerid=='')  echo $t2; else echo $cust[0]['cphone2'] ?>"
								class="form-control" name="t3" id="t3" placeholder="Tel 3">
					</td>
					<td>
						<input  type="text"  disabled="disabled"
								value="<?php if($customerid=='')  echo $t3;else echo $cust[0]['cphone3'] ?>"
								class="form-control" name="t5" id="t5" placeholder="Tel 5">
					</td>
				</tr>
				<tr>
					<td colspan="2	">
						<input  type="text"  disabled="disabled"
								value="<?php if($customerid=='')  echo $t4; else echo $cust[0]['cphone4'] ?>"
								class="form-control" name="t2" id="t2" placeholder="Tel 2">
					</td>
					<td>
						<input  type="text"  disabled="disabled"
								value="<?php if($customerid=='')  echo $t5; else echo $cust[0]['cphone5'] ?>"
								class="form-control" name="t4" id="t4" placeholder="Tel 4">
					</td>
					<td>
						<input  type="text"  disabled="disabled"
								value="<?php if($customerid=='')  echo $t6; else echo $cust[0]['cphone6'] ?>"
								class="form-control" name="t6" id="t6" placeholder="Tel 6">
					</td>
				</tr>
				<tr>
					<td colspan="3">
						<input required="" type="text"  disabled="disabled"  value="<?php echo $cust_desc; ?>"
							   class="form-control" id="cust_desc" name="cust_desc" placeholder="صفته">
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
				<th colspan="4" style="float: right;">الخصم
					<span class="glyphicon glyphicon-ok" style="display: none" id="trueop"></span>
					<span class="glyphicon glyphicon-remove" style="display: none" id="falseop"></span>
				</th>
				</thead>
				<tr>
					<td>
						<input required="" type="text"  disabled="disabled"  value="<?php echo $opponent; ?>"
							   class="form-control" name="opponent" id="opponent" placeholder="الإسم الأول">
					</td>
					<td>
						<input required="" type="text"  disabled="disabled"  value="<?php echo $opponent2; ?>"
							   class="form-control" name="opponent2" id="opponent2" placeholder="الإسم الثاني">
					</td><td>
						<input required="" type="text"  disabled="disabled"  value="<?php echo $opponent3; ?>"
							   class="form-control" name="opponent3" id="opponent3" placeholder="الإسم الثالث">
					</td>
					<td>
						<input required="" type="text"  disabled="disabled"  value="<?php echo $opponent4; ?>"
							   class="form-control" name="opponent4" id="opponent4" placeholder="الإسم الرابع">
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<input required="" type="text"  disabled="disabled"  value="<?php echo $OPIDNUMBER; ?>"
							   class="form-control" name="OPIDNUMBER" id="OPIDNUMBER" placeholder="الرقم المدني">
					</td>
				</tr>
				<tr>
					<td colspan="2	">
						<input required="" type="text"  disabled="disabled"  value="<?php echo $opt1; ?>"
							   class="form-control" name="opt1" id="opt1" placeholder="Tel 1">
					</td>
					<td>
						<input  type="text"  disabled="disabled"  value="<?php echo $opt2; ?>"
								class="form-control" name="opt2" id="opt2" placeholder="Tel 2">
					</td>
					<td>
						<input  type="text"  disabled="disabled"  value="<?php echo $opt3; ?>"
								class="form-control" name="opt3" id="opt3" placeholder="Tel 3">
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<input required="" type="text"  disabled="disabled"  value="<?php echo $opponent_desc; ?>"
							   class="form-control" id="opponent_desc" name="opponent_desc" placeholder="صفته">
					</td>

				</tr>
			</table>
		</div>
	</div><br/><br/><br/>
	<div class="panel panel-primary">

		<div class="panel-body" style="direction:rtl;" >

			<div class="form-group">
				<div class="col-md-9">

					<input disabled="disabled" type="text"  value="<?php echo $subject; ?>"
						   class="form-control" name="subject" id="subject" placeholder="موضوع الدعوة">
				</div>
				<label for="customer" class="col-md-3 control-label">موضوع الدعوة :</label>
			</div>
			<div class="form-group">
				<div class="col-md-9">
					<select disabled="disabled" class="form-control" id="ctype" name="ctype" required="required">
						<?php
							echo getOptions("case_type", "ID", "ctype", '$ctype');
						?>
					</select>
				</div>
				<label for="email" class="col-md-3 control-label">نوع القضية :</label>
			</div>
		</div>
	<div class="panel-body" style="direction:rtl;" >
		<div class="form-group">
			<div class="col-md-9">
				<textarea class="form-control"  disabled="disabled" style="resize: none;" rows="12" required="required" id="details" name="details" placeholder="تفاصيل الدعوى"><?php echo $details; ?></textarea>
			</div>
			<label for="details" class="col-md-3 control-label">تفاصيل الدعوى :</label>
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
					<input disabled="disabled"  value="<?php echo $price; ?>"
						   type="text" class="form-control" id="price" name="price" placeholder="إجمالي الأتعاب">
				</div>
				<label for="price" class="col-md-3 control-label">إجمالي الأتعاب :</label>
			</div>
			<div class="form-group">
				<div class="col-md-9">
					<input required="" type="text" class="form-control"  disabled="disabled"  value="<?php echo $paid; ?>"
						   id="paid" name="paid" placeholder="المبلغ المدفوع">
				</div>
				<label for="paid" class="col-md-3 control-label">المبلغ المدفوع :</label>
			</div>
			<div class="form-group">
				<div class="col-md-9">
					<input disabled="disabled" type="text" class="form-control"  disabled="disabled"  value="<?php echo $remaining; ?>"
						   id="remaining" name="remaining" placeholder="المبلغ المتبقي">
				</div>
				<label for="remaining" class="col-md-3 control-label">المبلغ المتبقي :</label>
			</div>
			<div class="form-group">
				<div class="col-md-9">
					<input type="text" class="form-control" disabled="disabled"  value="<?php echo $paidtype; ?>"
						   id="paidtype"  name="paidtype" placeholder="طريقة السداد">
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
					<input required="" type="text" class="form-control" disabled="disabled"  value="<?php echo $lawyer[0]['fname']." ".$lawyer[0]['lname']; ?>"
						   id="lawyer" name="lawyer" placeholder="المحامي">
				</div>
				<label for="firstname" class="col-md-3 control-label">المحامي :</label>
			</div>
			<div class="form-group">
				<div class="col-md-9">
					<?php
						if(!empty($consultant)){
					?>
					<input disabled="disabled" type="text" class="form-control" value="<?php echo  $consultant[0]['fname']." ".$consultant[0]['lname'];  ?>"
						   id="consultant" name="consultant" placeholder="المستشار">
					<?php
						}
					else {
					?>
						<input disabled="disabled" type="text" class="form-control" value=""
							   id="consultant" name="consultant" placeholder="المستشار">
					<?php
					}
					?>
				</div>
				<label for="firstname" class="col-md-3 control-label">المستشار :</label>
			</div>
			<div class="form-group">
				<div class="col-md-9">
					<?php
                    $content="";
					$ass="";
                    if($assign!=0){
                        $ass=explode(",",$assign);
                        $arr=array();
                        $content.="<br/><br/><ul class=\"list-group\">";

                        foreach($ass as $l){

                            $arr=GetUserByID($l);
                            $content.="<li class=\"list-group-item\">".$arr[0]['fname']." ".$arr[0]['lname'];
                        }
                        echo $content."</ul>";
                    }
                    else {
                       // $content="<span>لا يوجد</span>";
                        echo "<h5 >لا يوجد</h5>";
                    }
					?>
				</div>
				<label for="assign" class="col-md-3 control-label">المشاركون :</label>
			</div>
			<div class="form-group">
				<div class="col-md-9">
					<textarea class="form-control" style="resize: none;" rows="10"  disabled="disabled" id="comments" name="comments" placeholder="الملاحظات"><?php echo $comments; ?></textarea>
				</div>
				<label for="firstname" class="col-md-3 control-label">الملاحظات<br/>
					(< 1000 حرفا)</label>
			</div>
			<div class="form-group" id='resulta'>
		<div class="col-md-offset-3 col-md-9 pull-left">
			<br/><br/>
			<?php
			if($result==""){
				?>
				<input  type="button" id="sub" name="sub" class="btn btn-success" style="display: none" value="إرسال للمحامي">
			<?php }
			else {
				?>
				<input  type="button" id="open_case" name="open_case"
						class="btn btn-success"  value="فتح القضية">

				<input  type="button" id="close" name="close"
						class="btn btn-danger"  value="إلغاء">
				<h2 id="result"> </h2>
			<?php }
				if(isset($_GET['res'])){
					echo "<img width='100px' height='100px' src='images/checked.png'  />";
				}

			?>
			<h2 id="result"> </h2>
		</div>
	</div>
		</div>
	</div>
	 </div>
</div>
	
</form>

