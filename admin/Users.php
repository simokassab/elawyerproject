<?php
if (isset($_POST['submit'])) {
    $lname = $_POST['lname'];
    $users = GetUserByNAME($lname);
    if(count($users)!=0){
        ?>
        <script>    var users = <?php echo json_encode($users); ?>;</script>
        <?php
    }else{
        ?>
        <script>     users =[];</script>
        <?php
    }
}
?>
<div class="container">    
    <div class="panel panel-primary" style="direction:rtl; max-width:95%">
        <!-- Default panel contents -->
        <div class="panel-heading">
            المستخدمون
            <a href="#" data-toggle="modal" data-target="#addUser"><span style="color:red" class="glyphicon glyphicon-plus"></span></a>
        </div>
        <div class="panel-body">
            <form class="input-group" method="post">
                <input type="text" class="form-control" name="lname" placeholder="بحث حسب اسم العائلة">
                <span class="input-group-btn">
                    <input type="submit" name="submit" class="btn btn-default" value="بحث"/>
                </span>
            </form>
        </div>
        <ul class="list-group">
                <?php
                if (isset($_POST['submit'])) {
                    if(count($users)==0){
                        ?>
                        <li class="list-group-item">لا يوجد موظف بهذا الاسم</li>
                    <?php }else{
                // lopping on the users
                for ($i = 0; $i < count($users); $i++) {
                    $user = $users[$i];
                    ?>
                <li class="list-group-item"><a data-toggle="modal" data-target="#viewUser" onclick="viewUser(<?php echo $i; ?>)" href="#"  data-toggle="modal" data-target="#viewCase" ><?php echo $user['fname']." ".$user['sname']." ".$user['tname']." ".$user['lname']; ?></a></li>
                <?php } }}?>
        </ul>
    </div>
</div>
<?php include_once 'addUserModal.php'; ?>
<?php include_once './viewUserModal.php'; ?>
