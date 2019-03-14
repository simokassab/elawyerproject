<?php
include 'config.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header('Content-Type: text/html; charset=utf-8');
function EditUser($id, $fn, $sn, $tn, $ln, $gender, $ID_member, $add, $street, $kasima, $houset, $house_nb, $floor, $eadd, $ph1, $ph2, $ph3, $email, $fax, $room, $photo, $desc) {
    $ar=array();
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
  
    $query = "UPDATE users SET fname = '$fn', sname = '$sn', tname = '$tn', lname = '$ln', gender='$gender',
                ID_member='$ID_member', address = '$add', street = '$street', kasima = '$kasima',
                house_type = '$houset', house_nb = '$house_nb', floor = '$floor', eaddress = '$eadd',
                phone1='$ph1', phone2 = '$ph2', phone3 = '$ph3',email = '$email', fax = '$fax', room='$room',
                description='$desc'
                where id = $id ";
    //echo $query;
    if (mysqli_query($con, $query)) {
        $ar['info']='Profile updated successfully';
        $ar['status']='success';
    } else {
        //echo "Error: " . $query . "<br>" . mysqli_error($con);
        $ar['info']='Error'. mysqli_error($con);
        $ar['status']='failed';
    }

    mysqli_close($con);
    return json_encode($ar);
}
echo EditUser($_REQUEST['idd'], $_REQUEST['fname'], $_REQUEST['sname'], $_REQUEST['tname'], $_REQUEST['lname'], 
        $_REQUEST['gender'], $_REQUEST['idnumber'], $_REQUEST['address'], $_REQUEST['street'], $_REQUEST['kasema'], 
        $_REQUEST['houseType'], $_REQUEST['houseNumber'], $_REQUEST['floor'], $_REQUEST['eaddress'], $_REQUEST['phone1'], 
        $_REQUEST['phone2'], $_REQUEST['phone3'], $_REQUEST['email'], $_REQUEST['fax'], $_REQUEST['room'], '',
        $_POST['description']);

