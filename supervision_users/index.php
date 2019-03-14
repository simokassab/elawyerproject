<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Drag Drop Panels - Web Developer Plus Demos</title>
<script type="text/javascript" src="js/jquery-1.3.2.js" ></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js" ></script>
<link rel="stylesheet" type="text/css" href="styles.css" />
<script type="text/javascript" >
$(function(){
	$('.dragbox')
	.each(function(){
		$(this).hover(function(){
			$(this).find('h2').addClass('collapse');
		}, function(){
			$(this).find('h2').removeClass('collapse');
		})
		.find('h2').hover(function(){
			$(this).find('.configure').css('visibility', 'visible');
		}, function(){
			$(this).find('.configure').css('visibility', 'hidden');
		})
		.click(function(){
			$(this).siblings('.dragbox-content').toggle();
		})
		.end()
		.find('.configure').css('visibility', 'hidden');
	});
	$('.column').sortable({
		connectWith: '.column',
		handle: 'h2',
		cursor: 'move',
		placeholder: 'placeholder',
		forcePlaceholderSize: true,
		opacity: 0.4,
		stop: function(event, ui){
			$(ui.item).find('h2').click();
			var sortorder='';
			$('.column').each(function(){
				var itemorder=$(this).sortable('toArray');
				var columnId=$(this).attr('id');
				sortorder+=columnId+'='+itemorder.toString()+'&';
			});
		
			/*Pass sortorder variable to server using ajax to save state*/
		}
	})
	.disableSelection();
});
</script>
<style type="text/css">
		body {
			font-family: tahoma;
			font-size: 14px;
			font-weight:bold;
		}
		table {
			width:100%;
			border-top:1px solid #e5eff8;
			border-right:1px solid #e5eff8;
			margin:1em auto;
			border-collapse:collapse;
			}
			td {
			color:#678197;
			border-bottom:1px solid #e5eff8;
			border-left:1px solid #e5eff8;
			padding:.3em 1em;
			text-align:center;
		}
		tr.odd td {
			background:#f7fbff
			}
			tr.odd .column1 {
			background:#f4f9fe;
			}
			.column1 {
			background:#f9fcfe;
			}
			thead th {
			background:#f4f9fe;
			text-align:center;
			font:bold 1.2em/2em "Century Gothic","Trebuchet MS",Arial,Helvetica,sans-serif;
			color:#66a3d3;
			}
	</style>
</head>
<body>

	<h1><center>
		صفحة المراقبة
	</center></h1>
	<hr class="clear:both;">
	<br/>
	<div class="column" id="column1">
        <div class="dragbox" id="item1" >
            <h2>الموظفين</h2>
            <div class="dragbox-content" >
                <iframe width='100%' height='500px'  src='../superevents/users.php' ></iframe>
            </div>
        </div>
	</div>
	<div class="column" id="column2" >

		<div class="dragbox" id="item5" >
			<h2>التفاصيل</h2>
			<div class="dragbox-content" >
			<iframe width='100%' height='500px' src='../superevents/details.php' ></iframe>
			</div>
		</div>

	</div>

</body>
</html>
