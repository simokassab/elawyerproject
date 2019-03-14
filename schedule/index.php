<?php

$user_level="";

$user_level=$_SESSION['user']['level_ID'];
// here we have to check level of each user logged

if($user_level!=1 && $user_level!=2 && $user_level!=3 && $user_level!=4 ) {
    echo "";
}
else {
?>

    <script>

        $(document).ready(function() {

            var calendar = $('#calendar').fullCalendar({
                lang: 'ar',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                businessHours: {
                    start: '08:00', // a start time (10am in this example)
                    end: '17:00', // an end time (6pm in this example)

                    dow: [ 0, 1, 2, 3, 4, 6 ]

                },
                defaultView: 'agendaWeek',
                events: {
                    url: 'schedule/events.php?id=<?php echo $user_level; ?>',
                    error: function() {
                        $('#script-warning').show();
                    }
                },
                loading: function(bool) {
                    $('#loading').toggle(bool);
                }
            });
        });

    </script>
<div id="calendar" style="height: 100%;"></div>
<?php if($user_level==4){?>
<div id="fullCalModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                <h4 id="modalTitle" class="modal-title"></h4>
            </div>
            <label class="control-label" for="modalBody">التفاصيل:</label>
                 <div id="modalBody" class="modal-body"></div>
            <label class="control-label" for="modalwhen">التاريخ-الوقت:</label>
            <div id="modalwhen" class="modal-body"></div>
            <a id="eventUrl" target="_blank">فتح الإستشارة وارسالها</a>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<?php }
}
?>


