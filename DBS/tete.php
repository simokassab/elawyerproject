<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="../JS/idle.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>timertest</title>
<script language="javascript">
var it;
x = 0;
$(document).ready(function() {
      it = setInterval(count, 1000); 
});
function count() { 
        x+=1;
		$.ajax({
			type: "post",
			url: "active.php",
			//data: 'x='+x,
			success: function (dataa) {
				//alert(dataa);
			}
        });
        
}

(function() {

    var timeout = 2000;

    $(document).bind("idle.idleTimer", function() {
    clearInterval(it);    
    });


    $(document).bind("active.idleTimer", function() {
      it = setInterval(count, 1000);
    });
   $.idleTimer(timeout);

})(jQuery);

</script>
</head>

<body>
<div class="status" style="border:1px dashed black; width:500px; height:50px;"></div>
<div class="usercount"style="border:1px dashed black; width:500px; height:50px;"></div>
</body>
</html>


