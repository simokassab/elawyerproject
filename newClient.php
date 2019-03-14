<div class="container">    
<div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<div class="panel panel-info">
	<div class="panel-heading">
		<div class="panel-title">اضافة عميل</div>
	</div>  
	<div class="panel-body" style="direction:rtl;" >
		<form id="signupform" class="form-horizontal" role="form" action="DBS/signUpAction.php" method="post">
			<div id="signupalert" style="display:none" class="alert alert-danger">
				<p>Error:</p>
				<span></span>
			</div>
			<div class="form-group">
				<div class="col-md-9">
                <input id="file-0a" class="file" type="file" multiple data-min-file-count="1">
				</div>
				<label for="email" class="col-md-3 control-label">الصورة</label>
			</div>
			<div class="form-group">
				<div class="col-md-9">
					<input required="" type="text" class="form-control" name="lname" placeholder="اسم العائلة">
				</div>
				<label for="email" class="col-md-3 control-label">اسم العائلة</label>
			</div>
			<div class="form-group">
				<div class="col-md-9">
					<input required="" type="text" class="form-control" name="fname" placeholder="الاسم الاول">
				</div>
				<label for="firstname" class="col-md-3 control-label">الاسم الاول</label>
			</div>
			<div class="form-group">
				<div class="col-md-9">
					<input required="" type="text" class="form-control" name="time" placeholder="التوقيت">
				</div>
				<label for="firstname" class="col-md-3 control-label">التوقيت</label>
			</div>
			<div class="form-group">
				<div class="col-md-9">
					<input required="" type="text" class="form-control" name="malaf" placeholder="الملف الشخصي">
				</div>
				<label for="firstname" class="col-md-3 control-label">الملف الشخصي</label>
			</div>
			<div class="form-group">
				<div class="col-md-9">
					<input required="" type="text" class="form-control" name="mawde3" placeholder="الموضع">
				</div>
				<label for="firstname" class="col-md-3 control-label">الموضع</label>
			</div>
			<div class="form-group">
				<div class="col-md-9">
					<input required="" type="text" class="form-control" name="address" placeholder="الموضع">
				</div>
				<label for="firstname" class="col-md-3 control-label">العنوان</label>
			</div>
			<div class="form-group">
				<div class="col-md-9">
					<input required="" type="text" class="form-control" name="address_code" placeholder="الرمز البريدي">
				</div>
				<label for="firstname" class="col-md-3 control-label">الرمز البريدي</label>
			</div>
			<div class="form-group">
				<div class="col-md-9">
					<input required="" type="text" class="form-control" name="address_code" placeholder="">
				</div>
				<label for="firstname" class="col-md-3 control-label">المدينة</label>
			</div>
			<div class="form-group">
				<div class="col-md-9">
					<input required="" type="text" class="form-control" name="address_code" placeholder="">
				</div>
				<label for="firstname" class="col-md-3 control-label">المقاطعة/الدولة</label>
			</div>
			<div class="form-group">
				<div class="col-md-9">
					<input required="" type="text" class="form-control" name="address_code" placeholder="">
				</div>
				<label for="firstname" class="col-md-3 control-label">البلد</label>
			</div>
			<div class="form-group">
				<div class="col-md-9">
					<input required="" type="text" class="form-control" name="address_code" placeholder="">
				</div>
				<label for="firstname" class="col-md-3 control-label">مباشر</label>
			</div>
			<div class="form-group">
				<!-- Button -->                                        
				<div class="col-md-offset-3 col-md-9">
					<input  type="submit" id="btn-signup" type="button" class="btn btn-info" value="Sign Up">
				</div>
			</div>
		</form>
	 </div>
</div>




</div>
</div> 