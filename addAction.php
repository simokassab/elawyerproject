

<!-- Modal -->
<div id="addAction" class="modal fade" role="dialog"  style="direction:rtl; font-size: x-small;  overflow: auto;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-warning">
                <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h4 class="modal-title">إضافة إجراء</h4>dsadasdas
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
                                        <?php echo $customer[0]['cfname']." ". $customer[0]['csname']." ".$customer[0]['ctname']." ".$customer[0]['clname'];
            ?>
                                        <input type="hidden" name="customerid" id="customerid" value="<?php echo $customer[0]['ID']; ?> "/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right"  class="col-md-3 control-label">القضية </label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="cases" id="cases">
                                        <option selected disabled value=''>إختيار القضية</option>
                                            <?php 
                                                  $cases=array();
                                                  $cases=  getCasesByCustomer($customer[0]['ID']);
                                                  foreach ($cases as $case) {
                                                     
                                                ?>
                                                <option value="<?php echo $case['ID'] ?>"><?php echo $case['subject'];?></option>
                                            <?php } ?>
                                        </select>
                                        
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="float: right"  class="col-md-3 control-label">الانذار </label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="alarm" id="alarm">
                                            <option selected disabled value=''>إختيار الإنذار</option>
                                            <?php 
                                                  $alarm=array();
                                                  $alarm=  getAlarmByCustomer($customer[0]['ID']);
                                                  foreach ($alarm as $alarme) {
                                                     
                                                ?>
                                                <option value="<?php echo $alarme['ID'] ?>"><?php echo $alarme['subject'];?></option>
                                            <?php } ?>
                                        </select>
                                        
                                        
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
                                <div class="form-group">
                                    <label style="float: right" for="firstname" class="col-md-3 control-label">رسوم متبقية </label>
                                    <div class="col-md-9">
                                        <input disabled="disabled" type="text" class="form-control" id="remainFees" name="remainFees" placeholder="">
                                    </div>
                                </div>
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