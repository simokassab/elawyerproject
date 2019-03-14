<script>
  function parseArabic(str) {
    return Number( str.replace(/[٠١٢٣٤٥٦٧٨٩]/g, function(d) {
        return d.charCodeAt(0) - 1632;
    }).replace(/[۰۱۲۳۴۵۶۷۸۹]/g, function(d) {
        return d.charCodeAt(0) - 1776;
    }) );
}

   $(document).ready(function () {
       $('#paid').keyup(function() { 
           $("#paid").val(parseArabic($("#paid").val()));
       });
       $('#feesCost').keyup(function() { 
           $("#feesCost").val(parseArabic($("#feesCost").val()));
       });
       $('#paidFees').keyup(function() { 
           $("#paidFees").val(parseArabic($("#paidFees").val()));
       });
   });
</script>
<?php $case = getCasesByID($_GET['id']); ?>
<!-- Modal -->
<div id="addActionByCase" class="modal fade" role="dialog"  style="direction:rtl; font-size: x-small;  overflow: auto;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-warning">
                <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h4 class="modal-title">إضافة إجراء</h4>
            </div>
            <div class="modal-body">
                <div id="addCaseBox"  class="mainbox col-md-12  col-sm-8 ">
                    <div class="panel panel-info">
                      
                        <div class="panel-body" style="direction:rtl;" >
                            <form id="addActions" class="form-horizontal" role="form" action="DBS/addAction.php" method="post">
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                <div class="form-group">
                                    <label for="email" style="float: right" class="col-md-3 control-label">الموكل</label>
                                    <div class="col-md-9">
                                        <?php echo $customer_[0]['cfname']." ". $customer_[0]['csname']." ".$customer_[0]['ctname']." ".$customer_[0]['clname'];
            ?>
                                        <input type="hidden" name="customerid" id="customerid" value="<?php echo $customer_[0]['ID']; ?> "/>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label style="float: right"  class="col-md-3 control-label">القضية </label>
                                    <div class="col-md-9">
                                        <input   type="text" disabled="" value="<?php echo $case['subject'].'_'.$case['ID']; ?>" id="casesname" required="true" class="form-control" name="casesname" placeholder="">
                                         <input type="hidden" name="cases" id="cases" value="<?php echo $case['ID']; ?> "/>
                                         <input type="hidden" name="ByCase" id="ByCase" value="yes"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right"  class="col-md-3 control-label">التاريخ </label>
                                    <div class="col-md-9">
                                        <input   type="text" id="actionDate" required="true" class="form-control" name="actionDate" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">مدفوع </label>
                                    <div class="col-md-9">
                                        <input   type="text" id="paid" value="0" class="form-control" name="paid" placeholder="">
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label style="float: right" for="email" class="col-md-3 control-label">رسوم (+)</label>
                                    <div class="col-md-9">
                                        <input   type="text" value="0" id="feesCost" class="form-control" name="feesCost" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" class="col-md-3 control-label">دفع رسوم (-)</label>
                                    <div class="col-md-9">
                                        <input  type="text" value="0" id="paidFees" class="form-control" name="paidFees" placeholder="">
                                    </div>
                                </div>
                                    <input  type="hidden" class="form-control" id="remainFees" name="remainFees">
                                <div class="form-group">
                                    <label style="float: right" for="email" class="col-md-3 control-label">تفاصيل</label>
                                    <div class="col-md-9">
                                        <textarea   type="text"  id="details" class="form-control" name="details" placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">ملاحظات </label>
                                    <div class="col-md-9">
                                       <textarea  type="text" id="comments" class="form-control" name="comments" placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <input  type="submit" id="submitAction" type="button" class="btn btn-primary" value="اضافة">
                                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div><script type="text/javascript">
    // When the document is ready
    $(document).ready(function() {
        $('#actionDate').datetimepicker({
            timepicker:false,
        format:'Y-m-d'
        });

    });
</script>
</div>