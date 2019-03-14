<?php
if (isset($_POST['submit'])) {
  //  if (!empty($_POST['case_subject']) || !empty($_POST['address'])) {

        //$case_subject = $_POST['case_subject'];
        $customers =  GetCustomerByCritria($_POST['case_subject'], $_POST['fnn'], $_POST['snn'],
            $_POST['tnn'], $_POST['lnn'], $_POST['address'],$_POST['phone1'],$_POST['company'], "");
        if (count($customers) != 0) {
            ?>
            <script>    var customers = <?php echo json_encode($customers); ?>;</script>
            <?php
        } else {
            ?>
            <script>     customers = [];</script>
            <?php
        }
   // }
}
?>
<style>
    .radius_reversed {
        border-radius: 0px !important;
        border-top-right-radius: 5px !important;
        border-bottom-right-radius:5px !important;
    }
    .radius_input_reversed{
        border-radius: 0px !important;
        border-top-left-radius: 5px !important;
        border-bottom-left-radius:5px !important;
    }
    .raduis_no{
        border-radius: 0px !important;
    }
</style>
<div class="container">
    <div class="panel panel-primary" style="direction:rtl; max-width:100%">
        <!-- Default panel contents -->
        <div class="panel-heading">
            العملاء
            <a href="#" data-toggle="modal" data-target="#addClient"><span style="color:red" class="glyphicon glyphicon-plus"></span></a>
        </div>
        <div class="panel-body">
            <form  method="post">
                <div class="form-group  col-lg-12" >
                    <div class=" col-lg-3 pull-right">
                        <div class="input-group">
                            <span class="input-group-addon radius_reversed" id="basic-addon1"  >الإسم الأول</span>
                            <input type="text" class="form-control radius_input_reversed"  name="fnn"/>
                        </div>
                    </div>
                         <div class=" col-lg-3 pull-right">
                        <div class="input-group">
                            <span class="input-group-addon radius_reversed" id="basic-addon1"  >الإسم الثاني</span>
                            <input type="text" class="form-control radius_input_reversed" name="snn"  />
                        </div>
                    </div>

                         <div class=" col-lg-3 pull-right">
                        <div class="input-group">
                            <span class="input-group-addon radius_reversed"  id="basic-addon1"  >الإسم الثالث</span>
                            <input type="text" class="form-control radius_input_reversed" name="tnn" />
                        </div>
                    </div>
                    
                    <div class=" col-lg-3 pull-right">
                        <div class="input-group">
                            <span class="input-group-addon radius_reversed" id="basic-addon1"  >الإسم الرابع</span>
                            <input type="text" class="form-control radius_input_reversed" name="lnn" />
                        </div>
                    </div>
                </div>

                <div class="form-group  col-sm-12 col-xs-12 col-md-12 col-lg-12" >
                         <div class=" col-lg-3 pull-right">
                        <div class="input-group">
                            <span class="input-group-addon radius_reversed" id="basic-addon1"  >القضية</span>
                            <input type="text" class="form-control radius_input_reversed"  name="case_subject"/>
                        </div>
                    </div>
                        <div class=" col-lg-3 pull-right">
                        <div class="input-group">
                            <span class="input-group-addon radius_reversed" id="basic-addon1"  >مدينة / بلد</span>
                            <input type="text" class="form-control radius_input_reversed" name="address"  />
                        </div>
                    </div>

                        <div class=" col-lg-3 pull-right">
                        <div class="input-group">
                            <span class="input-group-addon radius_reversed" id="basic-addon1"  >هاتف</span>
                            <input type="text" class="form-control radius_input_reversed" name="phone1" />
                        </div>
                    </div>
             
                <div class=" col-lg-3 pull-right">
                        <div class="input-group">
                            <span class="input-group-addon radius_reversed" id="basic-addon1"  >الشركة</span>
                            <input type="text"    class="form-control radius_input_reversed" name="company" />
                        </div>
                    </div>
                </div>
                <div class="form-group  col-sm-12 col-xs-12 col-md-12 col-lg-12" >
                <div class=" col-lg-3 pull-right">
                        <div class="input-group">
                            <input type="submit" style="width: 200px;"
                                   class="form-control btn btn-primary" name="submit" value="بحث" name="dep_suggestBox" autocomplete="off" spellcheck="false" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <ul class="list-group">
            <?php
            if (isset($_POST['submit'])) {
                if (count($customers) == 0) {
                    ?>
                    <li class="list-group-item">لا يوجد   </li>
                <?php
                }else{
                    // lopping on the users
                    for ($i = 0; $i < count($customers); $i++) {
                        $customer = $customers[$i];
                        if($_SESSION['user']['level_ID']==5){


                        ?>
                        <li class="list-group-item"><a
                                href="index.php?action=contract&customer_id=<?php echo $customer['ID']; ?>"    >
                                <?php echo ($i+1)." - " .$customer['cfname'] . " " . $customer['csname'] . " " . $customer['ctname'] . " " . $customer['clname']; ?></a></li>
              <?php     }
                        else {
                            ?>
                            <li class="list-group-item"><a data-toggle="modal" data-target="#viewClient" onclick="viewUser(<?php echo $i; ?>)" href="#"  data-toggle="modal"  ><?php echo ($i+1)." - " .$customer['cfname'] . " " . $customer['csname'] . " " . $customer['ctname'] . " " . $customer['clname']; ?></a></li>
                            <?php
                        }
                    }
                 }
            } ?>
        </ul>
    </div>
</div>
    <div id="viewClient" class="modal fade" role="dialog" style="direction:rtl">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    </div></div></div></div>
<?php include './addClientModal.php'; ?>