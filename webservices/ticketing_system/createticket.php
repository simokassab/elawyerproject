<?php 
$api_key = "vBGUeElzODmlsCBZeEqj";
$password = "x";
$subject='';
//$yourdomain = "https://techoffice.freshdesk.com";
if(isset($_POST['frommodal'])) {
    $subject=$_POST['subject'].' - '.$_POST['name'];
  }
  else {
   $subject= $_POST['subject'];
  }
$ticket_data = json_encode(array(
  "description" => $_POST['description'],
  "subject" => $subject,
  "email" => $_POST['email'],
  "priority" => 1,
  "status" => 2,
  "group_id" => 19000016326
));
$url = "https://techoffice.freshdesk.com/api/v2/tickets";
$ch = curl_init($url);
$ar=array();
$header[] = "Content-type: application/json";
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_USERPWD, "$api_key:$password");
curl_setopt($ch, CURLOPT_POSTFIELDS, $ticket_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
//print curl_error($ch);
//echo $server_output;
$info = curl_getinfo($ch);
//print_r($info);
$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$headers = substr($server_output, 0, $header_size);
$response = substr($server_output, $header_size);
if($info['http_code'] == 201) {
   $ar['info']='Ticket created successfully';
   $ar['status']='success';
} else { 
  if($info['http_code'] == 404) {
    echo "Error, Please check the end point \n";
    $ar['info']="Error, Please check the end point \n";
    $ar['status']='failed';
  } else {
    $ar['info']='Error'.$info['http_code'];
    $ar['status']='failed';
  }
}

if(isset($_POST['frommodal'])) {
    header("Location: ../../index.php?action=mainpage&notificationTicket=yes");
  }
else {
 echo json_encode($ar);
}
curl_close($ch);
?>