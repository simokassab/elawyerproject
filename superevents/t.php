<script src="../js/jquery.js"></script>
<script type="text/javascript">
var INTERVAL = 1;

$(document).ready( function() {
  var delay = INTERVAL * 1000;
  var target = $('#counter');
  var counter = parseInt( target.text(), 10 );
  setInterval( function() {
    target.text( counter++ );
  }, delay );
} );
</script>
<div id='counter'>0</div>