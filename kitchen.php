<style>
	.center{
		width: 550px;
		margin: 40px auto;
		direction: rtl;

	}
</style>
<script type="text/javascript">
	$( document ).ready(function() {
		$('.btn-number').click(function (e) {
			e.preventDefault();
			//alert("dd");
			fieldName = $(this).attr('data-field');
			type = $(this).attr('data-type');
			var input = $("input[name='" + fieldName + "']");
			var currentVal = parseInt(input.val());
			if (!isNaN(currentVal)) {
				if (type == 'minus') {

					if (currentVal > input.attr('min')) {
						input.val(currentVal - 1).change();
					}
					if (parseInt(input.val()) == input.attr('min')) {
						$(this).attr('disabled', true);
					}

				} else if (type == 'plus') {

					if (currentVal < input.attr('max')) {
						input.val(currentVal + 1).change();
					}
					if (parseInt(input.val()) == input.attr('max')) {
						$(this).attr('disabled', true);
					}

				}
			} else {
				input.val(0);
			}
		});
		$('.input-number').focusin(function () {
			$(this).data('oldValue', $(this).val());
		});
		$('.input-number').change(function () {

			minValue = parseInt($(this).attr('min'));
			maxValue = parseInt($(this).attr('max'));
			valueCurrent = parseInt($(this).val());

			name = $(this).attr('name');
			if (valueCurrent >= minValue) {
				$(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
			} else {
				alert('Sorry, the minimum value was reached');
				$(this).val($(this).data('oldValue'));
			}
			if (valueCurrent <= maxValue) {
				$(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
			} else {
				alert('Sorry, the maximum value was reached');
				$(this).val($(this).data('oldValue'));
			}


		});
		$(".input-number").keydown(function (e) {
			// Allow: backspace, delete, tab, escape, enter and .
			if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
					// Allow: Ctrl+A
				(e.keyCode == 65 && e.ctrlKey === true) ||
					// Allow: home, end, left, right
				(e.keyCode >= 35 && e.keyCode <= 39)) {
				// let it happen, don't do anything
				return;
			}
			// Ensure that it is a number and stop the keypress
			if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
				e.preventDefault();
			}
		});
		/****************************************************************/

		$('.btn-number1').click(function (e) {
			e.preventDefault();
			//alert("dd");
			fieldName = $(this).attr('data-field');
			type = $(this).attr('data-type');
			var input = $("input[name='" + fieldName + "']");
			var currentVal = parseInt(input.val());
			if (!isNaN(currentVal)) {
				if (type == 'minus') {

					if (currentVal > input.attr('min')) {
						input.val(currentVal - 1).change();
					}
					if (parseInt(input.val()) == input.attr('min')) {
						$(this).attr('disabled', true);
					}

				} else if (type == 'plus') {

					if (currentVal < input.attr('max')) {
						input.val(currentVal + 1).change();
					}
					if (parseInt(input.val()) == input.attr('max')) {
						$(this).attr('disabled', true);
					}

				}
			} else {
				input.val(0);
			}
		});
		$('.input-number1').focusin(function () {
			$(this).data('oldValue', $(this).val());
		});
		$('.input-number1').change(function () {

			minValue = parseInt($(this).attr('min'));
			maxValue = parseInt($(this).attr('max'));
			valueCurrent = parseInt($(this).val());

			name = $(this).attr('name');
			if (valueCurrent >= minValue) {
				$(".btn-number1[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
			} else {
				alert('Sorry, the minimum value was reached');
				$(this).val($(this).data('oldValue'));
			}
			if (valueCurrent <= maxValue) {
				$(".btn-number1[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
			} else {
				alert('Sorry, the maximum value was reached');
				$(this).val($(this).data('oldValue'));
			}


		});
		$(".input-number1").keydown(function (e) {
			// Allow: backspace, delete, tab, escape, enter and .
			if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
					// Allow: Ctrl+A
				(e.keyCode == 65 && e.ctrlKey === true) ||
					// Allow: home, end, left, right
				(e.keyCode >= 35 && e.keyCode <= 39)) {
				// let it happen, don't do anything
				return;
			}
			// Ensure that it is a number and stop the keypress
			if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
				e.preventDefault();
			}
		});
		/****************************************************************/

		$('.btn-number2').click(function (e) {
			e.preventDefault();
			//alert("dd");
			fieldName = $(this).attr('data-field');
			type = $(this).attr('data-type');
			var input = $("input[name='" + fieldName + "']");
			var currentVal = parseInt(input.val());
			if (!isNaN(currentVal)) {
				if (type == 'minus') {

					if (currentVal > input.attr('min')) {
						input.val(currentVal - 1).change();
					}
					if (parseInt(input.val()) == input.attr('min')) {
						$(this).attr('disabled', true);
					}

				} else if (type == 'plus') {

					if (currentVal < input.attr('max')) {
						input.val(currentVal + 1).change();
					}
					if (parseInt(input.val()) == input.attr('max')) {
						$(this).attr('disabled', true);
					}

				}
			} else {
				input.val(0);
			}
		});
		$('.input-number2').focusin(function () {
			$(this).data('oldValue', $(this).val());
		});
		$('.input-number2').change(function () {

			minValue = parseInt($(this).attr('min'));
			maxValue = parseInt($(this).attr('max'));
			valueCurrent = parseInt($(this).val());

			name = $(this).attr('name');
			if (valueCurrent >= minValue) {
				$(".btn-number1[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
			} else {
				alert('Sorry, the minimum value was reached');
				$(this).val($(this).data('oldValue'));
			}
			if (valueCurrent <= maxValue) {
				$(".btn-number1[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
			} else {
				alert('Sorry, the maximum value was reached');
				$(this).val($(this).data('oldValue'));
			}


		});
		$(".input-number2").keydown(function (e) {
			// Allow: backspace, delete, tab, escape, enter and .
			if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
					// Allow: Ctrl+A
				(e.keyCode == 65 && e.ctrlKey === true) ||
					// Allow: home, end, left, right
				(e.keyCode >= 35 && e.keyCode <= 39)) {
				// let it happen, don't do anything
				return;
			}
			// Ensure that it is a number and stop the keypress
			if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
				e.preventDefault();
			}
		});
		$('#sendorder').click(function (e) {
			var coffee=$("#coffee").val();
		//	alert();
			var tea=$("#tea").val();
			var water=$("#water").val();
			var comments=$("#comment_kitchen").val();
			$.ajax({
				type: "get",
				url: "DBS/kitchenorder.php",
				data: 'coffee='+coffee+'&tea='+tea+'&water='+water+'&comments='+comments+"&user="+<?php echo  $_SESSION['user']['idd'] ;?>,
				success: function (dataa) {
					notif({
						msg:"لقد تم إرسال طلبك إلى المطبخ",
						type: "success"
					})
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
<div >
	<h2  style="direction: rtl">اختر طلبك</h2>
		<div class="center">
			<div class="input-group">
				
			  <span class="input-group-btn">
				  <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[2]">
					  <span class="glyphicon glyphicon-minus"></span>
				  </button>
			  </span>
                                <input type="text" name="quant[2]" id="coffee" style="width: 90px; direction: rtl;"
                                               class="form-control input-number" value="0" min="1" max="10">
			  <span class="input-group-btn">
				  <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
					  <span class="glyphicon glyphicon-plus"></span>
				  </button>
			  </span>

				<p></p>
			</div>
			<br/>

			<div class="input-group">
				<span class="input-group-addon radius_reversed" id="basic-addon1"  >شاي</span>
			  <span class="input-group-btn">
				  <button type="button" class="btn btn-danger btn-number1"  data-type="minus" data-field="quant[2]">
					  <span class="glyphicon glyphicon-minus"></span>
				  </button>
			  </span>
				<input type="text" name="quant1[2]" id="tea" class="form-control input-number1" value="0" min="1" max="10">
			  <span class="input-group-btn">
				  <button type="button" class="btn btn-success btn-number1" data-type="plus" data-field="quant1[2]">
					  <span class="glyphicon glyphicon-plus"></span>
				  </button>
			  </span>

				<p></p>
			</div>
			<br/>

			<div class="input-group">
				<span class="input-group-addon radius_reversed" id="basic-addon1"  >ماء </span>
			  <span class="input-group-btn">
				  <button type="button" class="btn btn-danger btn-number2"  data-type="minus" data-field="quant[2]">
					  <span class="glyphicon glyphicon-minus"></span>
				  </button>
			  </span>
				<input type="text" name="quant2[2]" id="water" class="form-control input-number2" value="0" min="1" max="10">
			  <span class="input-group-btn">
				  <button type="button" class="btn btn-success btn-number2" data-type="plus" data-field="quant2[2]">
					  <span class="glyphicon glyphicon-plus"></span>
				  </button>
			  </span>

				<p></p>
			</div>
			<br/>
			<div class="form-group">
				<span class="input-group-addon radius_reversed" id="basic-addon1"  >ملاحظات</span>
				<textarea class="form-control" rows="5" id="comment_kitchen"></textarea>
			</div>
			<div class="input-group" >
				<input  type="button" class="form-control btn btn-primary" id="sendorder" value="     إرسال    "    name="sendorder" autocomplete="off" spellcheck="false" />
			</div>
		</div>
</div>