<?php

//require_once('config.php');
require_once('PHPMailer-master/PHPMailerAutoload.php');
function makeDir($path)
{
    return is_dir($path) || mkdir($path);
}
  //makeDir("../elfinder/files/5");

//makeDir("../elfinder/files/6/مرحبا ");
function rand_color() {
    return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
}

function is_multi($a) { // check if multiple array 
    $rv = array_filter($a,'is_array');
    if(count($rv)>0) return "ok";
    return "nok";
}

function replace_($string, $replace, $replace1){
    $string=str_replace($replace, $replace1, $string);
    return $string;
}

//echo replace_("hello kassab kassab", " ", "_");

function sendEmail( $to, $subject, $body){
    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';
    $mail->IsSMTP(); // enable SMTP
    //$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "n1plcpnl0024.prod.ams1.secureserver.net";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);              // set the SMTP port for the GMAIL server
    $mail->Username   = "contact@e-lawyer.co";  // GMAIL username
    $mail->Password   = "elawyer123!";            // GMAIL password

    $mail->SetFrom('donotreply@e-lawyer.co', 'E-lawyer System ');

    //$mail->AddReplyTo("name@yourdomain.com","First Last");

    $mail->Subject    = $subject;

    //$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
    $body=$body;
    $mail->MsgHTML($body);

    $address = $to;


    $mail->AddAddress($address, "");

    //$mail->AddAttachment("images/phpmailer.gif");      // attachment
    //->AddAttachment("images/phpmailer_mini.gif"); // attachment

    if(!$mail->Send()) {
      return $mail->ErrorInfo;
    } else {
      return "ok";
    }
}


function getAllRights(){
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query='select * from rights order by ID';
     $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
    }
    mysqli_close($con);
    return $array;
}

function getChecked($field, $id, $name){
    if($field=='N')
        echo "<td style='text-align:center;'>R: <input type='checkbox' value='' name='r_".$name."_".$id."' id='r_".$name."_".$id."'/><br/>
              W: <input type='checkbox' name='w_".$name."_".$id."' id='w_".$name."_".$id."'/></td>";
    if($field=='W')
        echo "<td style='text-align:center;'>R: <input type='checkbox' name='r_".$name."_".$id."' id='r_".$name."_".$id."'/><br/>
              W: <input type='checkbox' name='w_".$name."_".$id."' id='w_".$name."_".$id."' checked /></td>";
    if($field=='R')
        echo "<td style='text-align:center;'>R: <input type='checkbox' checked name='r_".$name."_".$id."' id='r_".$name."_".$id."'/><br/>
              W: <input type='checkbox' name='w_".$name."_".$id."' id='w_".$name."_".$id."'/></td>";
    if($field=='RW')
            echo "<td style='text-align:center;'>R: <input type='checkbox' checked name='r_".$name."_".$id."' id='r_".$name."_".$id."'/><br/>
              W: <input type='checkbox' checked name='w_".$name."_".$id."' id='w_".$name."_".$id."'/></td>";

}


function getRightsByUser($userid){
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query='select * from rights where userID='.$userid;
     $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
    }
    mysqli_close($con);
    return $array;
}

function NewEmailQueue($from, $to, $subject, $body) {
    $con = connectDB($_SESSION['office']);
    $lastid = "";
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "INSERT INTO mails values (NULL, '$from', '$to',  '$subject', '$body', '0')";

    if (mysqli_query($con, $query)) {
        $lastid = mysqli_insert_id($con);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/DEVE/functions/sendmail.php?to=".$to.'&subject='.$subject.'&body='.$body);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $output = curl_exec($ch);
        curl_close($ch);
        return $lastid;

    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);

}

//echo NewEmailQueue('mohammad.','mohammad.a.kassab@gmail.com','d','d');
//echo sendEmail('m.kassab@techoffice.co', 'test', 'test mail');
function getMails(){
    $con = connectDB($_SESSION['office']);
    $array=array();
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "select * from mails where status=0";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $array = $row;
        }
    }
    mysqli_close($con);
    return $array;
}

//print_r(getMails());

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890_*!@;#&.';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 6; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

function generate_key_string() {

    $tokens = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $segment_chars = 5;
    $num_segments = 4;
    $key_string = '';

    for ($i = 0; $i < $num_segments; $i++) {

        $segment = '';

        for ($j = 0; $j < $segment_chars; $j++) {
            $segment .= $tokens[rand(0, 35)];
        }

        $key_string .= $segment;

        if ($i < ($num_segments - 1)) {
            $key_string .= '-';
        }
    }

    echo $key_string;
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}


function getCaseTypes() {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');

    $content = "";
    $query = "SELECT  ID, ctype  FROM case_type   order by ctype";
    $result = mysqli_query($con, $query);
    while ($rows = mysqli_fetch_assoc($result)) {
        $content .= "\n<option value='" . $rows['ID'] . "'>" . $rows['ctype'] . "</option>";
    }
    return $content;
}

//echo $_SESSION['office'];
function getUsersByRules($rule) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $content = "";
    $query = "SELECT * from users where level_ID='$rule' ";
    $result = mysqli_query($con, $query);
    while ($rows = mysqli_fetch_assoc($result)) {
        $content .= "\n<option value='" . $rows['ID'] . "'>" . $rows['fname'] . " " . $rows['lname'] . "</option>";
    }
    return $content;
}

function getLevelById($id) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $content = "";
    $query = "SELECT rule from level where ID='$id' ";
     $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($result);
        return $row['rule'];
    } 
    mysqli_close($con);
}

function getAllBreak(){
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "select * from break_status order by value";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
    }
    mysqli_close($con);
    return $array;
}
//print_r(getAllBreak());
// generate_key_string();

function getOptions($table, $field1, $field2, $selected = "") {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $content = "";
    $query = "SELECT distinct $field1, $field2 FROM $table order by $field2 ;";
    $result = mysqli_query($con, $query);
    while ($rows = mysqli_fetch_assoc($result)) {
        if ($rows[$field1] == $selected) {
            $content.="<option value='" . $rows[$field1] . "' selected='selected'>" . $rows[$field2] . "</option>";
        } else
            $content .= "\n<option style=\"background:url('images/status/Meeting.png') no-repeat; width:25px; height:25px; !important\" value='" . $rows[$field1] . "'>" . $rows[$field2] . "</option>";
    }
    return $content;
}

function getOptionsStatus($table, $field1, $field2, $selected = "") {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $content = "";
    $query = "SELECT distinct $field1, $field2 FROM $table order by $field2 ;";
    $result = mysqli_query($con, $query);
    while ($rows = mysqli_fetch_assoc($result)) {
        if ($rows[$field1] == $selected) {
            $content.="<option   value='" . $rows[$field1] . "' selected='selected'>" . $rows[$field2] . "</option>";
        } else
            $content .= "\n<option style='background-image:url(images/status/".$rows[$field2].");' value='" . $rows[$field1] . "'>" . $rows[$field2] . "</option>";
    }
    return $content;
}

function getOptions2($table, $field1, $field2, $field3, $selected = "") {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $content = "";
    $query = "SELECT distinct $field1, $field2, $field3  FROM $table where level_ID=2 or Level_ID=3 order by $field2 ;";
    $result = mysqli_query($con, $query);
    while ($rows = mysqli_fetch_assoc($result)) {
        if ($rows[$field1] == $selected) {
            $content.="<option value='" . $rows[$field1] . "' selected>" . $rows[$field2] . " " . $rows[$field3] . "</option>";
        } else
            $content .= "\n<option value='" . $rows[$field1] . "'>" . $rows[$field2] . " " . $rows[$field3] . "</option>";
    }
    return $content;
}

function getOptionsMissions($table, $field1, $field2, $field3, $selected = "") {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $content = "";
    $query = "SELECT distinct $field1, $field2, $field3  FROM $table  order by $field2 ;";
    $result = mysqli_query($con, $query);
    while ($rows = mysqli_fetch_assoc($result)) {
        if ($rows[$field1] == $selected) {
            $content.="<option value='" . $rows[$field1] . "' selected>" . $rows[$field2] . " " . $rows[$field3] . "</option>";
        } else
            $content .= "\n<option value='" . $rows[$field1] . "'>" . $rows[$field2] . " " . $rows[$field3] . "</option>";
    }
    return $content;
}

function getOptions22($table, $field1, $field2, $field3, $selected = "") {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $content = "";
    $query = "SELECT distinct $field1, $field2, $field3  FROM $table   order by $field2 ;";
    $result = mysqli_query($con, $query);
    while ($rows = mysqli_fetch_assoc($result)) {
        if ($rows[$field1] == $selected) {
            $content.="<option value='" . $rows[$field2] . " ".$rows[$field3]. "' selected>" . $rows[$field2] . " " . $rows[$field3] . "</option>";
        } else
            $content .= "\n<option value='" . $rows[$field2] . " ".$rows[$field3].  "'>" . $rows[$field2] . " " . $rows[$field3] . "</option>";
    }
    return $content;
}

function getOptionsLawyers($table, $field1, $field2, $field3, $selected = "") {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $content = "";
    $query = "SELECT distinct $field1, $field2, $field3  FROM $table where level_ID=2 order by $field2 ;";
    $result = mysqli_query($con, $query);
    while ($rows = mysqli_fetch_assoc($result)) {
        if ($rows[$field1] == $selected) {
            $content.="<option value='" . $rows[$field1] . "' selected>" . $rows[$field2] . " " . $rows[$field3] . "</option>";
        } else
            $content .= "\n<option value='" . $rows[$field1] . "'>" . $rows[$field2] . " " . $rows[$field3] . "</option>";
    }
    return $content;
}

function getOptionsManagers($table, $field1, $field2, $field3, $selected = "") {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $content = "";
    $query = "SELECT distinct $field1, $field2, $field3  FROM $table where level_ID=1 order by $field2 ;";
    $result = mysqli_query($con, $query);
    while ($rows = mysqli_fetch_assoc($result)) {
        if ($rows[$field1] == $selected) {
            $content.="<option value='" . $rows[$field1] . "' selected>" . $rows[$field2] . " " . $rows[$field3] . "</option>";
        } else
            $content .= "\n<option value='" . $rows[$field1] . "'>" . $rows[$field2] . " " . $rows[$field3] . "</option>";
    }
    return $content;
}

function getOptionsAuditors($table, $field1, $field2, $field3, $selected = "") {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $content = "";
    $query = "SELECT distinct $field1, $field2, $field3  FROM $table where level_ID=5 order by $field2 ;";
    $result = mysqli_query($con, $query);
    while ($rows = mysqli_fetch_assoc($result)) {
        if ($rows[$field1] == $selected) {
            $content.="<option value='" . $rows[$field1] . "' selected>" . $rows[$field2] . " " . $rows[$field3] . "</option>";
        } else
            $content .= "\n<option value='" . $rows[$field1] . "'>" . $rows[$field2] . " " . $rows[$field3] . "</option>";
    }
    return $content;
}

function getOptionsConsultant($table, $field1, $field2, $field3, $selected = "") {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $content = "";
    $query = "SELECT distinct $field1, $field2, $field3  FROM $table where level_ID=3 order by $field2 ;";
    $result = mysqli_query($con, $query);
    while ($rows = mysqli_fetch_assoc($result)) {
        if ($rows[$field1] == $selected) {
            $content.="<option value='" . $rows[$field1] . "' selected>" . $rows[$field2] . " " . $rows[$field3] . "</option>";
        } else
            $content .= "\n<option value='" . $rows[$field1] . "'>" . $rows[$field2] . " " . $rows[$field3] . "</option>";
    }
    return $content;
}


function getOptions1($table, $field1, $field2, $field3, $rule, $selected) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $content = "";
    $query = "SELECT distinct $field1, $field2, $field3 FROM $table where level_ID='$rule' ";
    $result = mysqli_query($con, $query);
    while ($rows = mysqli_fetch_assoc($result)) {
        if ($rows[$field1] == $selected) {
            $content.="<option value='" . $rows[$field1] . "' selected>" . $rows[$field2] . " " . $rows[$field3] . "</option>";
        } else
            $content .= "\n<option value='" . $rows[$field1] . "'>" . $rows[$field2] . " " . $rows[$field3] . "</option>";
    }
    return $content;
}

function getTypeById($id, $name, $table) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "select $name from $table where ID='$id'  ";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($result);
        return $row["$name"];
    }
    mysqli_close($con);
}

/* * *********************    NOTIFICATION ****************************** */
/* * *********************    NOTIFICATION ****************************** */

function NewNotification($from, $to, $url, $title, $status) {
    $con = connectDB($_SESSION['office']);
    $lastid = "";
    date_default_timezone_set('Asia/Kuwait');
    $date = date('Y-m-d H:i:s');
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "INSERT INTO notification values (NULL, '$from', '$to',  '$url', '$title', '$status', '$date')";

    if (mysqli_query($con, $query)) {
        $lastid = mysqli_insert_id($con);
        return $lastid;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);
}

function MarkAsRead($id, $to_id) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "UPDATE notification set status='READ' where id='$id' and `to`='$to_id'";
    $result = "";
    if (mysqli_query($con, $query)) {
        //$lastid = mysqli_insert_id($con);
        $result = true;
    } else {
        $result = false;
        //echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
    return $result;
}

function getAllNotificationsByID($id) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "select * from notification where `to`='$id'  ";
   // echo $query;
     mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
    }
    mysqli_close($con);
    return $array;
}


function NewCustomerNotification($from, $to, $url, $title, $status) {
    $con = connectDB($_SESSION['office']);
    $lastid = "";
    date_default_timezone_set('Asia/Kuwait');
    $date = date('Y-m-d H:i:s');
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "INSERT INTO notifications_customer values (NULL, '$from', '$to',  '$url', '$title', '$status', '$date')";

    if (mysqli_query($con, $query)) {
        $lastid = mysqli_insert_id($con);
        return $lastid;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);
}

function MarkAsReadCsutomer($id, $to_id) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "UPDATE notifications_customer set status='READ' where id='$id' and `to`='$to_id'";
    $result = "";
    if (mysqli_query($con, $query)) {
        //$lastid = mysqli_insert_id($con);
        $result = true;
    } else {
        $result = false;
        //echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
    return $result;
}

function getAllCsutomerNotificationsByID($id) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "select * from notifications_customer where `to`='$id'  ";
   // echo $query;
     mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
    }
    mysqli_close($con);
    return $array;
}


//print_r(getAllNotificationsByID(4));

/**
 * First visit lal 3amil
 */
function NewConsultation($fname, $lname, $customer, $consult_type, $subject, $description, $appoint, $lawyer_id, $status) {
    $con = connectDB($_SESSION['office']);
    $lastid = "";
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "INSERT INTO consultation values (NULL, '$fname', '$lname', '$customer',  '$consult_type', '$subject', '$description',
    '$appoint', '$lawyer_id', '$status')";

    if (mysqli_query($con, $query)) {
        $lastid = mysqli_insert_id($con);
        return $lastid;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

function EditConsultation($id, $fname, $lname, $customer, $consult_type, $subject, $description, $appoint, $lawyer_id, $status) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "Update consultation SET firstname='$fname', lastname='$lname', customer='$customer',  consult_type='$consult_type',
            subject='$subject', description='$description', appoint='$appoint', lawyer_ID='$lawyer_id', status='$status'
            where ID=$id";

    if (mysqli_query($con, $query)) {
        return $id;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

function EditConsultationStatus($id, $status) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "Update consultation SET status='$status' where ID=$id";

    if (mysqli_query($con, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}



/** Alarm **/

/**
 * First visit lal 3amil
 */
function NewAlarmConsultation($fname, $lname, $customer, $consult_type, $subject, $description, $appoint, $lawyer_id, $status) {
    $con = connectDB($_SESSION['office']);
    $lastid = "";
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "INSERT INTO alarm_consultation values (NULL, '$fname', '$lname', '$customer',  '$consult_type', '$subject', '$description',
    '$appoint', '$lawyer_id', '$status')";

    if (mysqli_query($con, $query)) {
        $lastid = mysqli_insert_id($con);
        return $lastid;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

function EditAlarmConsultation($id, $fname, $lname, $customer, $consult_type, $subject, $description, $appoint, $lawyer_id, $status) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "Update alarm_consultation SET firstname='$fname', lastname='$lname', customer='$customer',  consult_type='$consult_type',
            subject='$subject', description='$description', appoint='$appoint', lawyer_ID='$lawyer_id', status='$status'
            where ID=$id";

    if (mysqli_query($con, $query)) {
        return $id;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

function EditAlarmConsultationStatus($id, $status) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "Update alarm_consultation SET status='$status' where ID=$id";

    if (mysqli_query($con, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

/* * ************************** NEW FORM ********************** */

function NewForm($customerid, $casedate,   $customer, $customer2, $customer3, $customer4, $IDNUMBER, $t1, $t2, $t3, $t4, $t5, $t6,
                 $cust_desc, $opponentid, $opponent, $opponent2, $opponent3, $opponent4, $OPIDNUMBER, $opt1, $opt2, $opt3, $opponent_desc,
                 $subject, $ctype, $details, $price, $paid, $remaining, $ptype, $lawyer, $consultant, $assign, $comments, $status) {
    $con = connectDB($_SESSION['office']);
    $lastid = "";
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "INSERT INTO form values (NULL,'$customerid', '$casedate',  '$customer',  '$customer2',  '$customer3',  '$customer4', '$IDNUMBER',
            '$t1', '$t2', '$t3', '$t4', '$t5', '$t6','$cust_desc', '$opponentid',
            '$opponent', '$opponent2', '$opponent3', '$opponent4', '$OPIDNUMBER', '$opt1', '$opt2', '$opt3',
    '$opponent_desc', '$subject', '$ctype', '$details', '$price', '$paid', '$remaining','$ptype', '$lawyer', '$consultant',
    '$assign', '$comments', '$status')";

    if (mysqli_query($con, $query)) {
        $lastid = mysqli_insert_id($con);
        return $lastid;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

function UpdateStatusForm($id, $status) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "Update form SET status='$status' where ID=$id";
    if (mysqli_query($con, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

/* * ************************** NEW ALARM FORM ********************** */

function NewAlarmForm($customerid, $casedate,   $customer, $customer2, $customer3, $customer4, $IDNUMBER, $t1, $t2, $t3, $t4, $t5, $t6,
                 $cust_desc, $opponentid, $opponent, $opponent2, $opponent3, $opponent4, $OPIDNUMBER, $opt1, $opt2, $opt3, $opponent_desc,
                 $subject, $ctype, $details, $price, $paid, $remaining, $ptype, $lawyer, $consultant, $assign, $comments, $status) {
    $con = connectDB($_SESSION['office']);
    $lastid = "";
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "INSERT INTO alarm_form values (NULL,'$customerid', '$casedate',  '$customer',  '$customer2',  '$customer3',  '$customer4', '$IDNUMBER',
            '$t1', '$t2', '$t3', '$t4', '$t5', '$t6','$cust_desc', '$opponentid',
            '$opponent', '$opponent2', '$opponent3', '$opponent4', '$OPIDNUMBER', '$opt1', '$opt2', '$opt3',
    '$opponent_desc', '$subject', '$ctype', '$details', '$price', '$paid', '$remaining','$ptype', '$lawyer', '$consultant',
    '$assign', '$comments', '$status')";

    if (mysqli_query($con, $query)) {
        $lastid = mysqli_insert_id($con);
        return $lastid;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

function UpdateStatusAlarmForm($id, $status) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "Update alarm_form SET status='$status' where ID=$id";
    if (mysqli_query($con, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

/* * ********************************************************** */

function NewAppointment($consultation_ID, $customer_ID, $date, $starttime, $endtime, $title, $URL) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "INSERT INTO consultation values (NULL, '$consultation_ID', '$customer_ID',  '$date', '$starttime', '$endtime',
    '$title', '$URL')";

    if (mysqli_query($con, $query)) {
        $lastid = mysqli_insert_id($con);
        return $lastid;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

function NewAppointmentt($user_id, $starttime, $endtime, $title, $description, $privilege) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "INSERT INTO appointment values (NULL, '$user_id',  '$starttime', '$endtime',   '$title', '$description', '$privilege')";

    if (mysqli_query($con, $query)) {
        $lastid = mysqli_insert_id($con);
        return $lastid;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

function NewCustomer($cfn, $csn, $ctn, $cln, $cadd, $cstreet, $ckasima, $chouset, $chouse_nb,
                     $cfloor, $ceadd, $CID_nb, $cph1, $cph2, $cph3, $cph4, $ph5, $cph6, $cemail, $cfax, $cbirth, $ccompany, $status, $vip) {
    $user = "";
    $pass = "";
   // if ($cemail != "") {
    $user = $cemail;
    //} else {
       // $user = $cfn[0] . "." . $cln;
   // }
    $lastid='';
    $pass = randomPassword();
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    if($cbirth==NULL){
        $query="INSERT INTO customers values (NULL, '$cfn', '$csn', '$ctn', '$cln', '$user', '$pass',
    '$cadd', '$cstreet', '$ckasima', '$chouset', '$chouse_nb', '$cfloor', '$ceadd', '$CID_nb',
    '$cph1', '$cph2', '$cph3', '$cph4', '$ph5', '$cph6', '$cemail', '$cfax', NULL, '$ccompany', '$status', '$vip')";
    }
    else {
    $query = "INSERT INTO customers values (NULL, '$cfn', '$csn', '$ctn', '$cln', '$user', '$pass',
    '$cadd', '$cstreet', '$ckasima', '$chouset', '$chouse_nb', '$cfloor', '$ceadd', '$CID_nb',
    '$cph1', '$cph2', '$cph3', '$cph4', '$ph5', '$cph6', '$cemail', '$cfax', '$cbirth', '$ccompany', '$status', '$vip')";
   // echo $query;
    }
    if (mysqli_query($con, $query)) {
        $lastid = mysqli_insert_id($con);
        return $lastid;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

function getAllCustomers() {
    $array = array();
    $query = "select * from customers order by cfname  ";
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
    }
    mysqli_close($con);
    return $array;
}

function GetCustomerByID($id) {
    $array = array();
    $query = "select * from customers where ID=$id ";
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
    }
    mysqli_close($con);
    return $array;
}

//print_r(GetCustomerByID(70));
function GetCustomerByCritria($case_subjec="", $cfname="", $csname="",
                              $ctname="", $clname="", $address="",$phone1="",$company="",$email="") {
    $array = array();
    $query = "select * from customers  where customers.ID >0 ";
  
    if(!empty($address)){
        $query.=" and customers.caddress  like '%$address%'";
    }
    if(!empty($cfname)){
        $query.=" and customers.cfname  like '%$cfname%'";
    }
    if(!empty($csname)){
        $query.=" and customers.csname  like '%$csname%'";
    }
    if(!empty($ctname)){
        $query.=" and customers.ctname like '%$ctname%'";
    }
    if(!empty($clname)){
        $query.=" and customers.clname  like '%$clname%'";
    }
    if(!empty($phone1)){
        $query.=" and customers.cphone1 like '%$phone1%'";
    }
    if(!empty($company)){
        $query.=" and customers.ccompany like '%$company%'";
    }
    if(!empty($email)){
        $query.=" and customers.cemail = '%$email%'";
    }
    $con = connectDB($_SESSION['office']);
    //echo $query;
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
    }
    mysqli_close($con);
    return $array;
}

function GetCustomerByCritrias( $cfname="", $csname="",
                              $ctname="", $clname="", $address="",$phone1="",$company="",$email="") {
    $array = array();
    $query = "select * from customers where ID >0 ";
    if(!empty($address)){
        $query.=" and customers.caddress  like '%$address%'";
    }
    if(!empty($cfname)){
        $query.=" and customers.cfname  like '%$cfname%'";
    }
    if(!empty($csname)){
        $query.=" and customers.csname  like '%$csname%'";
    }
    if(!empty($ctname)){
        $query.=" and customers.ctname like '%$ctname%'";
    }
    if(!empty($clname)){
        $query.=" and customers.clname  like '%$clname%'";
    }
    if(!empty($phone1)){
        $query.=" and customers.cphone1 like '%$phone1%'";
    }
    if(!empty($company)){
        $query.=" and customers.ccompany like '%$company%'";
    }
    if(!empty($email)){
        $query.=" and customers.cemail = '%$email%'";
    }
    $con = connectDB($_SESSION['office']);
   // echo $query;
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
    }
    mysqli_close($con);
    return $array;
}


function GetCustomerByFullName($cfname="", $csname="",   $ctname="", $clname="") {
    $array = array();
    $query = "select * from customers where customers.ID >0 ";

    if(!empty($cfname)){
        $query.=" and customers.cfname  like '%$cfname%'";
    }
    if(!empty($csname)){
        $query.=" and customers.csname  like '%$csname%'";
    }
    if(!empty($ctname)){
        $query.=" and customers.ctname like '%$ctname%'";
    }
    if(!empty($clname)){
        $query.=" and customers.clname  like '%$clname%'";
    }
    $con = connectDB($_SESSION['office']);
   // echo $query;
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
    }
    mysqli_close($con);
    return $array;
}

function EditCustomer($id, $cfn, $csn, $ctn, $cln, $cadd, $cstreet, $ckasima, $chouset,
                      $chouse_nb, $cfloor, $ceadd, $cid, $cph1, $cph2, $cph3, $cph4, $cph5, $cph6, $cemail, $cfax, $cbirth, $ccompany, $vip) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "UPDATE customers SET cfname = '$cfn', csname = '$csn', ctname = '$ctn', clname = '$cln',
            caddress = '$cadd', cstreet = '$cstreet', ckasima = '$ckasima', chouse_type = '$chouset', chouse_nb = '$chouse_nb',
           cfloor = '$cfloor', ceaddress = '$ceadd', CID_number='$cid' , cphone1 = '$cph1', cphone2 = '$cph2', cphone3 = '$cph3',
           cphone4 = '$cph4', cphone5 = '$cph5', cphone6 = '$cph6', cemail = '$cemail', cfax = '$cfax', cbirth = '$cbirth',
           ccompany = '$ccompany', VIP= '$vip' WHERE customers.ID = $id";

    if (mysqli_query($con, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

/**
 * DesOrActCustomer is to activate or disactivate the customer
 * if s=active, so this is to active it, if s=desactive so this is to desactivate it
 * desactivate customer
 * if status=1 so active, if status=0 so desactivated
 */
function DesOrActCustomer($s, $id) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    if ($s == "active") {
        $query = "Update customers SET status=1 where ID=$id";
    } else {
        $query = "Update customers SET status=0 where ID=$id";
    }
    if (mysqli_query($con, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

function checkExistringCustomer($cfn, $csn, $ctn, $cln) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "select id from customers where cfname='$cfn' and csname='$csn' and ctname='$ctn' and clname='$cln' ";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($result);
        return $row['ID'];
    } else {
        return "NEW";
    }
    mysqli_close($con);
}

function DeleteCustomer($id) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "delete from customer where ID='$id' ";
    $result = mysqli_query($con, $query);
    mysqli_close($con);
}

/* * *********************** END CUSTOMER *********************** */

/* * ********************** USERS ************************* */

function NewUser($fn, $sn, $tn, $ln, $gender, $ID_number, $ID_member, $add, $street, 
        $kasima, $houset, $house_nb, $floor, $eadd, $ph1, $ph2, $ph3, $email, $fax, $room, $photo, 
        $desc, $level_id, $lawyer_type_id, $color, $status, $fb, $tw, $linkedin, $insta, $snap) {

    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $user = "";
    $pass = "";
    if ($email != "") {
        $user = $email;
    } else {
        $user = $fn[0] . "." . $ln;
    }
    $lastod='';
    $pass = randomPassword();
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "INSERT INTO users  values (NULL, '$fn', '$sn', '$tn', '$ln', '$user', '$pass', '$gender',
    '$ID_number', '$ID_member','$add', '$street', '$kasima', '$houset', '$house_nb', '$floor', '$eadd',
   '$ph1', '$ph2', '$ph3', '$email', '$fax', '$room', '$photo', '$desc', '$level_id', '$lawyer_type_id', '$color', '$status', '$fb', '$tw', '$linkedin', '$insta', '$snap')";
    //echo $query;
    if (mysqli_query($con, $query)) {
        $lastid = mysqli_insert_id($con);
        return $lastid;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

function EditUser($id, $fn, $sn, $tn, $ln, $password, $gender, $ID_member, $add, $street, $kasima, $houset, $house_nb, $floor, $eadd, $ph1, $ph2, $ph3, $email, $fax, $room, $photo, $desc, $level_id, $lawyer_type_id, $fb, $tw, $linkedin, $insta, $snap) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    if($photo==''){
    $query = "UPDATE users SET fname = '$fn', sname = '$sn', tname = '$tn', lname = '$ln', password='$password', gender='$gender',
                ID_member='$ID_member', address = '$add', street = '$street', kasima = '$kasima',
                house_type = '$houset', house_nb = '$house_nb', floor = '$floor', eaddress = '$eadd',
                phone1='$ph1', phone2 = '$ph2', phone3 = '$ph3',email = '$email', fax = '$fax', room='$room',
                description='$desc', level_ID='$level_id', lawyer_type_ID='$lawyer_type_id', facebook='$fb', twitter='$tw', linkedin='$linkedin', instagram='$insta', snapchat='$snap' 
                where id = $id ";
    }
    if (mysqli_query($con, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

function changeImageByID($id, $photo) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "UPDATE users SET  photo='$photo' where id='$id'";
    if (mysqli_query($con, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}
/**
 * DesOrActUser is to activate or disactivate the User
 * if s=active, so this is to active it, if s=desactive so this is to desactivate it
 * desactivate User
 * if status=1 so active, if status=0 so desactivated
 */
function DesOrActUser($s, $id) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    if ($s == "active") {
        $query = "Update users SET status=1 where ID=$id";
    } else {
        $query = "Update users SET status=0 where ID=$id";
    }
    if (mysqli_query($con, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

function GetUserByID($id) {
    $array = array();
    if($id==""){
        return"";
    }
    $query = "select * from users where ID=$id ";
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
    }
    mysqli_close($con);
    return $array;
}

function GetUserByCritria($fname="", $sname="", $tname="", $lname="") {
    $array = array();
    $query = "select * from users  where users.ID >0 ";
  
    if(!empty($fname)){
        $query.=" and fname  like '%$fname%'";
    }
    if(!empty($sname)){
        $query.=" and sname  like '%$sname%'";
    }
    if(!empty($tname)){
        $query.=" and tname like '%$tname%'";
    }
    if(!empty($lname)){
        $query.=" and lname  like '%$lname%'";
    }
    $con = connectDB($_SESSION['office']);
    //echo $query;
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
    }
    mysqli_close($con);
    return $array;
}

function GetFnameLnameByUserID($id) {
    $array ="" ;
    if($id==""){
        return"";
    }
    $query = "select fname, lname from users where ID=$id ";
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
        $array=$row['fname']." ".$row['lname'];
    }
    mysqli_close($con);
    return $array;
}

//echo GetFnameLnameByUserID(4);

function GetUserByNAME($lname) {
    $array = array();
    $query = "select * from users where lname like '$lname%' or fname like '$lname' or sname like '$lname' or tname like '$lname' ";
   // echo $query;
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    //echo "<pre>" ;    print_r($result);die("</pre>");
    if(!empty($result)){
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $array[] = $row;
            }
        }
    }
    mysqli_close($con);
    return $array;
}

function GetAllUsers() {
    $array = array();
    $query = "select * from users  ";
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
    }
    mysqli_close($con);
    return $array;
}

function GetAllLevels() {
    $array = array();
    $query = "select * from level  ";
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
    }
    mysqli_close($con);
    return $array;
}

function getAllLawyers() {
    $array = array();
    $query = "select * from users inner join level on users.level_ID = level.ID where level.ID = '2' ";
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
    }
    mysqli_close($con);
    return $array;
}

function getLawyersName() {
    $array = array();
    $query = "select users.ID as USERID, fname, sname, tname, lname from users inner join level on users.level_ID = level.ID where level.ID = '2' ";
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
    }
    mysqli_close($con);
    return $array;
}

function getAllLawyer_Type() {
    $array = array();
    $query = "select * from lawyer_type ";
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
    }
    mysqli_close($con);
    return $array;
}

function getAllConsultant() {
    $array = array();
    $query = "select * from users inner join level on users.level_ID = level.ID where level.ID = '3' ";
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
    }
    mysqli_close($con);
    return $array;
}

/* * ********************** END USER ************************** */

/* * ********************* OPPONENT *************************** */

function NewOpponent($ofn, $osn, $otn, $oln, $ogender, $OID_nb, $oph1, $oph2, $oph3, $oph4, $oph5, $oph6) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "INSERT INTO opponent values (NULL, '$ofn',  '$osn', '$otn', '$oln', '$ogender', '$OID_nb', '$oph1'
            , '$oph2', '$oph3', '$oph4', '$oph5', '$oph6')";
    $lastid="";
    if (mysqli_query($con, $query)) {
        $lastid = mysqli_insert_id($con);
        return $lastid;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

function DeleteOpponent($id) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "delete from opponent where ID=$id";

    if (mysqli_query($con, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

function CheckIfOpponent($fn, $sn, $tn, $ln) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $array = array();
    $query = "select ID from opponent where ofname='$fn' and osname='$sn' and otname='$tn' and olname='$ln' ";
    $con = connectDB($_SESSION['office']);
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($result);
        return $row['ID'];
    } else {
        return false;
    }
    mysqli_close($con);
}

function CheckIfCustomer($fn, $sn, $tn, $ln) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $array = array();
    $query = "select ID from customers where cfname='$fn' and csname='$sn' and ctname='$tn' and clname='$ln' ";
    $con = connectDB($_SESSION['office']);
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($result);
        return $row['ID'];
    } else {
        return false;
    }
    mysqli_close($con);
}

function getAllOpponents() {
    $array = array();
    $query = "select * from opponent ";
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
    }
    mysqli_close($con);
    return $array;
}
function getOpponentById($id) {
    $array = array();
    $query = "select * from opponent where ID=$id ";
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
    }
    mysqli_close($con);
    return $array;
}

function getOpponentByName($op1, $op2, $op3, $op4) {
    $array = array();
    $query = "select * from opponent where ofname='$op1' and osname='$op2' and otname='$op3' and olname='$op4' ";
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
    }
    mysqli_close($con);
    return $array;
}



/* * ********************** END Opponent ************************** */

/* * ********************* CASES ********************************* */

function NewCase($customer_id, $customer_desc, $startdate, $casetype_id, $lawyer_id, $consultant_id,
                 $opponent_id, $opponent_desc, $price, $subject, $description, $status) {
    $con = connectDB($_SESSION['office']);
    $lastid="";
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "INSERT INTO cases values (NULL, '$customer_id','$customer_desc' , '$startdate', '$casetype_id', '$lawyer_id', '$consultant_id',
    '$opponent_id', '$opponent_desc', '$price','$subject', '$description', '$status')";

    if (mysqli_query($con, $query)) {
        $lastid = mysqli_insert_id($con);
        return $lastid;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

function getCasesByID($id) {
    $con = connectDB($_SESSION['office']);
    $query = "SELECT * FROM cases where ID='$id'";
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if ($result) {
        $last_result = array();
        if ($rows = mysqli_fetch_assoc($result)) {
            $last_result = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}

function getArchiveCasesByID($id) {
    $con = connectDB($_SESSION['office']);
    $query = "SELECT * FROM archive_cases where ID='$id'";
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if ($result) {
        $last_result = array();
        if ($rows = mysqli_fetch_assoc($result)) {
            $last_result = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}

function getCasesByCustomer($customer) {
    $con = connectDB($_SESSION['office']);
    $query = "SELECT * FROM cases where customer_id='$customer'";
   // echo $query;    
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if ($result) {
         $last_result = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $last_result[] = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}

function getArchivedCasesByCustomer($customer) {
    $con = connectDB($_SESSION['office']);
    $query = "SELECT * FROM archive_cases where customer_id='$customer'";
   // echo $query;    
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if ($result) {
         $last_result = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $last_result[] = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}



function getCasesBySubject($subject) {
    $con = connectDB($_SESSION['office']);
    $query = "SELECT * FROM cases where subject like '%$subject%'";
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if ($result) {
        $last_result = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $last_result[] = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}



function getCasesByCriteria($table, $lawyer, $consultant, $id, $subject, $customerr) {
    $con = connectDB($_SESSION['office']);
    
    $query = "SELECT * FROM $table where ID >0  ";
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    if ($id !="") {
        $query .=" and ID = '$id' ";
    }
    if ($lawyer !="") {
        $query .=" and lawyer_id = '$lawyer' ";
    }
    if ($consultant !="") {
        $query .=" and consultant_id = '$consultant' ";
    }
    if ($subject !="") {
        $query .=" and subject like '%$subject%' ";
    }
    if ($customerr !="") {
        $query .=" and customer_id = '$customerr' ";
    }
   //echo $query;
    $result = mysqli_query($con, $query);
    if ($result) {
        $last_result = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $last_result[] = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}



function getCaseById($case_id) {
    $con = connectDB($_SESSION['office']);
    $query = "SELECT * FROM cases where ID=$case_id ";
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if ($result) {
        $last_result = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $last_result[] = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}


function getArchiveCaseById($case_id) {
    $con = connectDB($_SESSION['office']);
    $query = "SELECT * FROM archive_cases where ID=$case_id ";
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if ($result) {
        $last_result = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $last_result[] = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}


function getCaseByCustomer($customer) {
    $con = connectDB($_SESSION['office']);
    $query = "SELECT * FROM cases where customer_ID='$customer' ";
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if ($result) {
        $last_result = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $last_result[] = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}

function getArchiveCaseByCustomer($customer) {
    $con = connectDB($_SESSION['office']);
    $query = "SELECT * FROM archive_cases where customer_ID='$customer' ";
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if ($result) {
        $last_result = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $last_result[] = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}

function getAllCases() {
    $con = connectDB($_SESSION['office']);
    $query = "SELECT * FROM cases ";
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if ($result) {
        $last_result = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $last_result[] = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}

function getAllCase_Type() {
    $con = connectDB($_SESSION['office']);
    $query = "SELECT * FROM case_type ";
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if ($result) {
        $last_result = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $last_result[] = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}

function EditCase($id, $casetype_id, $lawyer_id, $consultant_id, $subject, $description, $status) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "UPDATE cases SET casetype_id ='$casetype_id', lawyer_id = '$lawyer_id', consultant_id = '$consultant_id',
                subject = '$subject', description='$description', status='$status'
                 where id = $id ";
    if (mysqli_query($con, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

function CloseCase($id) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "UPDATE cases SET  status='CLOSED'  where id = $id ";
    if (mysqli_query($con, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

/* * ********************************* END CASES ********************************* */


/* * ********************* ALARM ********************************* */

function NewAlarm($customer_id, $customer_desc, $startdate, $casetype_id, $lawyer_id, $consultant_id,
                 $opponent_id, $opponent_desc, $price, $subject, $description, $status) {
    $con = connectDB($_SESSION['office']);
    $lastid="";
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "INSERT INTO alarm values (NULL, '$customer_id','$customer_desc' , '$startdate', '$casetype_id', '$lawyer_id', '$consultant_id',
    '$opponent_id', '$opponent_desc', '$price','$subject', '$description', '$status')";

    if (mysqli_query($con, $query)) {
        $lastid = mysqli_insert_id($con);
        return $lastid;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

function getAlarmByID($id) {
    $con = connectDB($_SESSION['office']);
    $query = "SELECT * FROM alarm where ID='$id'";
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if ($result) {
        $last_result = array();
        if ($rows = mysqli_fetch_assoc($result)) {
            $last_result = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}

function getArchiveAlarmByID($id) {
    $con = connectDB($_SESSION['office']);
    $query = "SELECT * FROM archive_alarm where ID='$id'";
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if ($result) {
        $last_result = array();
        if ($rows = mysqli_fetch_assoc($result)) {
            $last_result = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}

function getAlarmByCustomer($customer) {
    $con = connectDB($_SESSION['office']);
    $query = "SELECT * FROM alarm where customer_id='$customer'";
   // echo $query;    
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if ($result) {
         $last_result = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $last_result[] = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}

function getArchivedAlarmByCustomer($customer) {
    $con = connectDB($_SESSION['office']);
    $query = "SELECT * FROM archive_alarm where customer_id='$customer'";
   // echo $query;    
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if ($result) {
         $last_result = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $last_result[] = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}




function getAlarmBySubject($subject) {
    $con = connectDB($_SESSION['office']);
    $query = "SELECT * FROM alarm where subject like '%$subject%'";
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if ($result) {
        $last_result = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $last_result[] = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}



function getAlarmByCriteria($table, $lawyer, $consultant, $id, $subject, $customerr) {
    $con = connectDB($_SESSION['office']);
    
    $query = "SELECT * FROM $table where ID >0  ";
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    if ($id !="") {
        $query .=" and ID = '$id' ";
    }
    if ($lawyer !="") {
        $query .=" and lawyer_id = '$lawyer' ";
    }
    if ($consultant !="") {
        $query .=" and consultant_id = '$consultant' ";
    }
    if ($subject !="") {
        $query .=" and subject like '%$subject%' ";
    }
    if ($customerr !="") {
        $query .=" and customer_id = '$customerr' ";
    }
   //echo $query;
    $result = mysqli_query($con, $query);
    if ($result) {
        $last_result = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $last_result[] = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}




function getAllAlarms() {
    $con = connectDB($_SESSION['office']);
    $query = "SELECT * FROM alarm ";
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $result = mysqli_query($con, $query);
    if ($result) {
        $last_result = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $last_result[] = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}


function EditAlarm($id, $casetype_id, $lawyer_id, $consultant_id, $subject, $description, $status) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "UPDATE alarm SET casetype_id ='$casetype_id', lawyer_id = '$lawyer_id', consultant_id = '$consultant_id',
                subject = '$subject', description='$description', status='$status'
                 where id = $id ";
    if (mysqli_query($con, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

function CloseAlarm($id) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "UPDATE cases SET  status='CLOSED'  where id = $id ";
    if (mysqli_query($con, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

/* * ********************************* END Alarm ********************************* */


/** BLOG **/
function NewBlog($user_id, $subject, $description, $date) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "INSERT INTO blog values (NULL,  '$user_id', '$subject', '$description', '$date')";
    //echo $query;
    if (mysqli_query($con, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}


function getBlog() {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "SELECT * from blog order by date DESC";
   // echo $query;
    $result = mysqli_query($con, $query);
    if ($result) {
        $last_result = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $last_result[] = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}


function EditBlog($id, $date, $title, $description) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "UPDATE blog SET date ='$date', title = '$title', description = '$description' where id = $id";

    if (mysqli_query($con, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

//print_r(getBlog());


/* * ******************************** EVENTS ********************************* */

function NewEvent($date, $case_ID, $event, $starttime, $nextdate) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "INSERT INTO events values (NULL, '$date', '$case_ID', '$event', '$starttime', '$nextdate')";

    if (mysqli_query($con, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

function EditEvent($id, $date, $case_ID, $event, $starttime, $enddtime) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "UPDATE events SET datee ='$date', case_ID = '$case_ID', event = '$event',
                starttime='$starttime'   where id = $id";

    if (mysqli_query($con, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

/* * ************************** END EVENT ************************ */

/* * ************************* MISSION **************************** */

function NewMission($from, $to, $mtype, $startdate, $enddate, $case_id, $comments, $status, $participants, $priority) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "INSERT INTO missions values (NULL, '$from', '$to', '$mtype', '$startdate', '$enddate',
    '$case_id', '$comments', '$status', '$participants',  '$priority')";
   // echo $query;
    if (mysqli_query($con, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

function getMissions($user_id, $level_id) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "SELECT * from missions where ID > 0  ";
    if ($level_id != 1) {
        $query .="  and to_user_id = '$user_id'  ";
    }
    $query.=" order BY enddate";
   // echo $query;
    $result = mysqli_query($con, $query);
    if ($result) {
        $last_result = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $last_result[] = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}

function getMissionss($user_id, $level_id) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "SELECT m.ID,m.startdate,m.enddate,m.mtype, m.comments, m.from_user_id , m.to_user_id,m.case_id, m.participants, "
            . "m.priority FROM missions as m   ";
    $query.=" order BY m.enddate";
   // echo $query;
    $result = mysqli_query($con, $query);
    if ($result) {
        $last_result = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $last_result[] = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}

function getMissionsByCaseId($caseid) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "SELECT * FROM missions where case_id='$caseid' order BY enddate";
    //echo $query;
    $result = mysqli_query($con, $query);
    if ($result) {
        $last_result = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $last_result[] = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}

/**
 *  Validate a mission
 */
function ValidateMission($id) {
    $con = connectDB($_SESSION['office']);
    $query = "Update missions SET status='DONE' where ID=$id";
    if (mysqli_query($con, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

function DeleteMission($id) {
    $con = connectDB($_SESSION['office']);
    $query = "delete from missions where ID=$id";
    if (mysqli_query($con, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

function updateMission($id,$from, $to, $mtype, $startdate, $enddate, $comments, $status) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "Update missions SET from_user_id='$from', mtype='$mtype', to_user_id='$to', startdate='$startdate', enddate='$enddate' , case_id='0', comments='$comments' where ID=$id";
    //echo $query;
    if (mysqli_query($con, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

/* * ************************ END MISSIONS ********************** */

/* * ********************** KITCHEN *************************** */

function NewOrder($user_ID, $order, $status, $comments) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "INSERT INTO kitchen values (NULL, '$user_ID', '$order', '$status', '$comments')";

    if (mysqli_query($con, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

function ValidateOrder($id) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "Update kitchen SET status='DONE' where ID=$id";
    if (mysqli_query($con, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

/* * ******************************** END KITCHEN ************************* */

/* * ****************************** SUPER EVENTS ************************ */

function NewSuperEvent($event, $user_ID) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "INSERT INTO superevents values (NULL, NOW(), '$event', '$user_ID', 'NO')";

    if (mysqli_query($con, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}


function getEvents($user_id, $level_id) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "SELECT * from  events  ORDER BY datee";
   
    $result = mysqli_query($con, $query);
    if ($result) {
        $last_result = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $last_result[] = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}

function getEventsType() {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "SELECT * from  event_type  ORDER BY name";
   
    $result = mysqli_query($con, $query);
    if ($result) {
        $last_result = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $last_result[] = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}

function getEventsByCaseId($caseid) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "SELECT * FROM events where case_ID='$caseid' ORDER BY ID";
    //echo $query;
    $result = mysqli_query($con, $query);
    if ($result) {
        $last_result = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $last_result[] = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}



//echo $date;

/* * **************************** END SUPER EVENTS ************************* */
/******************************** EXECUTION *******************************/

function Newexecution($type, $customerid, $name, $status, $date) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "INSERT INTO `execution` (`ID`,`type`, `customer_id`,  `name`, `status`, `date`) 
    VALUES (NULL, '$type', '$customerid',  '$name', '$status', '$date');";

    if (mysqli_query($con, $query)) {
        $lastid = mysqli_insert_id($con);
        return $lastid;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);
}

function NewexecutionByCase($caseid, $execution, $comments, $date, $nextdate) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "INSERT INTO `cases_execution` (`ID`, `case_ID`, `execution`, `comments`, `date`, `nextdate`)
     VALUES (NULL, '$caseid', '$execution', '$comments', '$date', '$nextdate');";

    if (mysqli_query($con, $query)) {
        $lastid = mysqli_insert_id($con);
        return $lastid;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);
}

function NewexecutionAction ($executionid, $result, $comments, $date, $followdate) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "INSERT INTO `exec_action` (`ID`, `exec_ID`, `result`, `comments`, `date`, `followdate`) 
    VALUES (NULL, '$executionid', '$result', '$comments', '$date', '$followdate');";

    if (mysqli_query($con, $query)) {
        $lastid = mysqli_insert_id($con);
        return $lastid;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);
}

function getExecutionsByCase($caseid) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "Select * from cases_execution where case_ID='$caseid'";

     $result = mysqli_query($con, $query);
    if ($result) {
        $last_result = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $last_result[] = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}

function ArchiveExecution($executionid){
     $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "UPDATE execution set status='ARCHIVE' where ID='$executionid'";
    $result = "";
    if (mysqli_query($con, $query)) {
        $result = true;
    } else {
        $result = false;
    }

    mysqli_close($con);
    return $result;
}


/* * **************************** ACCOUNT ********************************* */

function NewAccount($date, $customer_ID) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "INSERT INTO account  values (NULL, '$date', '$customer_ID' )";

    if (mysqli_query($con, $query)) {
        $lastid = mysqli_insert_id($con);
        return $lastid;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);
}

/* * ************************* END ACCOUNT ************************** */

/* * ************************* CONTRACT ************************** */

function NewContract($account_ID, $contract_type, $case_id) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "INSERT INTO contract  values (NULL, '$account_ID', '$contract_type', '$case_id')";

    if (mysqli_query($con, $query)) {
        $lastid = mysqli_insert_id($con);
        return $lastid;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);
}

function getContractbyCaseId($case_id) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "select * from contract where case_id='$case_id'";
   // echo $query;
    $result = mysqli_query($con, $query);
    if ($result) {
        $last_result = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $last_result[] = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}



function getCustomerfromContract($contract) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "select customer_id from account, contract where account.ID=contract.account_ID and account_ID='$contract'";
    // echo $query;
    $result = mysqli_query($con, $query);
    if ($result) {
        $last_result = array();
     $rows = mysqli_fetch_assoc($result);
            return $rows['customer_id'];
    } else {
        return false;
    }
    mysqli_close($con);
}

function getAllPrices($customer){
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "select SUM(prices) as prices FROM
                (
                select SUM(price) as prices from cases where customer_ID=$customer
                    UNION ALL
                select SUM(price) as prices from alarm where customer_ID=$customer   
                    )a";
    // echo $query;
    $result = mysqli_query($con, $query);
    if ($result) {
        $last_result = array();
     $rows = mysqli_fetch_assoc($result);
            return $rows['prices'];
    } else {
        return false;
    }
    mysqli_close($con);
    
}

function getAllPaid($customer){
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $sql = "SELECT SUM(paid) as paids from account_action, contract, account "
            . "where account.ID=contract.account_ID and contract.ID=account_action.contract_ID and account.customer_id=$customer";
    // echo $query;
    $result = mysqli_query($con, $sql);
    if ($result) {
        $last_result = array();
     $rows = mysqli_fetch_assoc($result);
            return $rows['paids'];
    } else {
        return false;
    }
    mysqli_close($con);
    
}

function getAllfees($customer){
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $sql = "SELECT SUM(fees_cost) as feess from account_action, contract, account "
            . "where account.ID=contract.account_ID and contract.ID=account_action.contract_ID and account.customer_id=$customer";
    // echo $query;
    $result = mysqli_query($con, $sql);
    if ($result) {
        $last_result = array();
     $rows = mysqli_fetch_assoc($result);
            return $rows['feess'];
    } else {
        return false;
    }
    mysqli_close($con);
    
}

function getAllPaidfees($customer){
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $sql = "SELECT SUM(paid_fees) as paidfeess from account_action, contract, account "
            . "where account.ID=contract.account_ID and contract.ID=account_action.contract_ID and account.customer_id=$customer";
    // echo $query;
    $result = mysqli_query($con, $sql);
    if ($result) {
        $last_result = array();
     $rows = mysqli_fetch_assoc($result);
            return $rows['paidfeess'];
    } else {
        return false;
    }
    mysqli_close($con);
    
}


/* * ************************* END CONTRACT ************************** */

/* * ************************* NEW ACCOUNT ACTION ************************** */

function NewAccountAction($contract_ID, $paid, $rem, $details, $datee, $fees_cost, $paid_fees, $rem_fees, $comments) {
    $con = connectDB($_SESSION['office']);
    $lastid="";
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "INSERT INTO account_action  values (NULL, '$contract_ID', '$paid', '$rem', '$details', '$datee', '$fees_cost', '$paid_fees'
           , '$rem_fees', '$comments')";
    //echo $query;
    if (mysqli_query($con, $query)) {
        $lastid = mysqli_insert_id($con);
        return $lastid;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);
}

function getAccountActionByContractID($c_id){
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "select * from account_action where contract_ID='$c_id' order by ID";
    // echo $query;
    $result = mysqli_query($con, $query);
    if ($result) {
        $last_result = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $last_result[] = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}

function getAccountAction(){
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "select * from account_action ";
    // echo $query;
    $result = mysqli_query($con, $query);
    if ($result) {
        $last_result = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $last_result[] = $rows;
        }
    } else {
        $last_result = false;
    }
    mysqli_close($con);
    return $last_result;
}

function getAccountIdByCustomerId($customerid){
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "select ID from account where customer_ID='$customerid'  ";
    // echo $query;
    $result = mysqli_query($con, $query);
    if ($result) {
        $rows = mysqli_fetch_assoc($result);
        return $rows['ID'];
    } else {
        return false;
    }
    mysqli_close($con);
}

function EditAccountAction($id, $paid, $details, $fees_cost, $paid_fees, $comments) {
    $con = connectDB($_SESSION['office']);
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET CHARACTER SET utf8');
    $query = "UPDATE account_action  SET paid='$paid', details='$details', fees_cost='$fees_cost', paid_fees='$paid_fees'
           , comments='$comments'";

    if (mysqli_query($con, $query)) {
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);
}

?>