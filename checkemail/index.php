<style>
 
</style>
<?php 
/* connect to gmail */
function ArabicDate($your_date) {
    $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
    //$your_date = date('y-m-d'); // The Current Date
    $en_month = date("M", strtotime($your_date));
    foreach ($months as $en => $ar) {
        if ($en == $en_month) { $ar_month = $ar; }
    }

    $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
    $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
    $ar_day_format = date('D'); // The Current Day
    $ar_day = str_replace($find, $replace, $ar_day_format);

    header('Content-Type: text/html; charset=utf-8');
    $standard = array("0","1","2","3","4","5","6","7","8","9");
    $eastern_arabic_symbols = array("٠","١","٢","٣","٤","٥","٦","٧","٨","٩");
    $current_date = $ar_day.' '.date('d').'-'.$ar_month.'-'.date('Y');
    $arabic_date = str_replace($standard , $eastern_arabic_symbols , $current_date);

    return $arabic_date;
}

date_default_timezone_set('Asia/Beirut');
$hostname = '{imap.gmail.com:993/imap/ssl/novalidate-cert}'; 
$username = 'mohammad.a.kassab@gmail.com'; $password = 'Naddoucha150888;'; 
$output="";
/* try to connect */
$inbox =  imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());
 
/* grab emails */
$emails = imap_search($inbox, 'UNSEEN');

/* if emails are returned, cycle through each... */
if($emails) {
 // echo json_encode($emails);
  /* begin output var */

  /* put the newest emails on top */
  rsort($emails);
  $output.="<table class='tb'>";
  /* for every email... */
  foreach($emails as $email_number) {
    /* get information specific to this email */
$overview = imap_fetch_overview($inbox,$email_number,0);
    $dat=  strtotime($overview[0]->date);
    $output.="<span class='tb'>";
     $output.= ArabicDate(date('Y-m-l H:i:s',$dat)).' &nbsp;&nbsp; | &nbsp;&nbsp;' ;
     $output.= $overview[0]->from;
      $output.=" بريد إلكتروني من  ".'</span>##';
   

 }
 $output.="</table>";
echo $output;
  
} 
else {
	echo "";
}
/* close the connection */
imap_close($inbox);



?>