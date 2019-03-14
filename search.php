
<?php
//session_start();
include_once 'config.php';

// Search by string in all tables (customers, cases, alarms, missions, events) and return json for each table
function search() {
	$array = array();
	$return_array=array();
	//$return_array['data']['customers']=array();

	if(!empty($_REQUEST['data'])) 
	{
		//echo $_REQUEST['data'];
		$con = connectDB($_SESSION['office']);

		// customers data
		$customer_columns = ['cfname', 'csname', 'ctname', 'clname'];
		$return_array['data']['customers'] = add_get_params($con, 'customers', $customer_columns);

		$users_columns = ['fname', 'sname', 'tname', 'lname', 'room', 'address'];
		$return_array['data']['users'] = add_get_params($con, 'users', $users_columns);

		$cases_columns = ['customer_desc', 'opponent_desc', 'price', 'subject', 'description', 'status'];
		$return_array['data']['cases'] = add_get_params($con, 'cases', $cases_columns);
		
		$cases_archive_columns = ['customer_desc', 'opponent_desc', 'price', 'subject', 'description', 'status'];
		$return_array['data']['archived_cases'] = add_get_params($con, 'archive_cases', $cases_archive_columns);
		
		$mission_columns = ['mtype', 'comments', 'status', 'participants', 'priority'];
		$return_array['data']['missions'] = add_get_params($con, 'missions', $mission_columns);

		$event_columns = ['event', 'comments'];
		$return_array['data']['events'] = add_get_params($con, 'events', $event_columns);

		$alarm_columns = ['customer_desc', 'opponent_desc', 'price', 'subject', 'description', 'status'];
		$return_array['data']['alarms'] = add_get_params($con, 'alarm', $alarm_columns);


    $alarm_archive_columns = ['customer_desc', 'opponent_desc', 'price', 'subject', 'description', 'status'];
    $return_array['data']['archived_alarms'] = add_get_params($con, 'archive_alarm', $alarm_archive_columns);
		//$alarm_consultation_columns = ['lastname', 'firstname', 'customer', 'consult_type', 'subject', 'description', 'appoint', 'status'];
		//$return_array['data']['alarms_consultations'] = add_get_params($con, 'alarm_consultation', $alarm_consultation_columns);

		//$alarm_form_columns = ['customerID', 'date', 'customer', 'customer2', 'customer3', 'customer4', 'IDNUMBER', 
						//	't1', 't2', 't3', 't4', 't5', 't6', 'customer_desc', 'opponentid', 'opponent', 
						//	'opponent2', 'opponent3', 'opponent3', 'OPIDNUMBER', 'opt1', 'opt2', 'opt3',
						//	'opponent_desc', 'subject','type','details', 'price', 'paid', 'remaining', 'p_type',
						//	'lawyer_ID', 'consultant_ID', 'assigned', 'comments', 'status'
		//];

		//$return_array['data']['alarms_forms'] = add_get_params($con, 'alarm_form', $alarm_form_columns);

		mysqli_close($con);
	}
	else
	{
		$return_array['info']='no data to search';
		$return_array['status']='failed';
	}

	return $return_array;
}

function add_get_params($con, $table_name, $customer_columns) {
	mysqli_query($con, "SET NAMES 'utf8'");
	mysqli_query($con, 'SET CHARACTER SET utf8');
	
	//echo $_REQUEST['data'];
	$result_array = array();

	$string_like_data = " like '%".mb_strtolower($_REQUEST['data'], 'UTF-8')."%' OR ";
	//echo $string_like_data;
	
	$query = "select * from ".$table_name." where ";

	foreach ($customer_columns as $column) {
		$query .= $column.$string_like_data;
	}

	$query  = trim($query, ' OR'); // then trim trailing and prefixing commas
	//mysqli_query($con, "SET NAMES 'utf8'");
	//echo $query;
	//
	//mysqli_query($con, 'SET CHARACTER SET utf8');
	$result = mysqli_query($con, $query);

	if (!empty($result) && mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			array_push($result_array, $row);
		}
	}

	return $result_array;
}

$data=array();
$data =  search();

//print_r($data);
//echo json_encode($data,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>

<?php include_once "underheader.php"; ?>
         
 <?php include_once 'menu.php'; ?>
     <div class="home-cases-section">
      <div class="panel panel-primary">
          <!-- Default panel contents -->
          <div class="panel-heading c-list">
            <span class="title" style='color:white;'>القضايا</span>
           </div>
          <div class="panel-body">
           	<?php 
           	if(empty($data['data']['cases']))
           			echo "لا يوجد";
           		else {
           			//print_r($data['data']['cases'])
           			?>
           		
           		<table class="table table-hover ">
           			<tr>
           				<th></th>
           				<th>عنوان القضية</th>
           				<th>التاريخ</th>
           				<th>تفاصيل</th>
           				<th>الأتعاب</th>
           			</tr>
           			<?php 
           				foreach($data['data']['cases'] as $cases_ ) {
           					echo "<tr>
           							<td><a href='index.php?action=viewCases&id=".$cases_['ID']."'><i class='glyphicon glyphicon-zoom-in'></i></a></td>
           							<td>".$cases_['subject']."</td>
           							<td>".$cases_['startdate']."</td>
           							<td>".$cases_['description']."</td>
           							<td>".$cases_['price']."</td>
           						</tr>";
           				}
           			?>
           			
           		</table>
           	<?php 
           		}	
           	?>
		   </div>
		 </div>
		 <br/>
		 <div class="panel panel-primary">
          <!-- Default panel contents -->
          <div class="panel-heading c-list">
            <span class="title" style='color:white;'>الإنذارات</span>
           </div>
          <div class="panel-body">
           	<?php 
           	if(empty($data['data']['alarms']))
           			echo "لا يوجد";
           		else {
           			//print_r($data['data']['cases'])
           			?>
           		
           		<table class="table table-hover ">
           			<tr>
           				<th></th>
           				<th>عنوان القضية</th>
           				<th>التاريخ</th>
           				<th>تفاصيل</th>
           				<th>الأتعاب</th>
           			</tr>
           			<?php 
           				foreach($data['data']['alarms'] as $alarm_ ) {
           					echo "<tr>
           							<td><a href='index.php?action=viewAlarm&id=".$alarm_['ID']."'><i class='glyphicon glyphicon-zoom-in'></i></a></td>
           							<td>".$alarm_['subject']."</td>
           							<td>".$alarm_['startdate']."</td>
           							<td>".$alarm_['description']."</td>
           							<td>".$alarm_['price']."</td>
           						</tr>";
           				}
           			?>
           			
           		</table>
           	<?php 
           		}	
           	?>
		   </div>
		 </div>
		 <br/>
         <div class="panel panel-info">
          <!-- Default panel contents -->
          <div class="panel-heading c-list">
            <span class="title">القضايا المؤرشفة</span>
           </div>
          <div class="panel-body">
            <?php 
            if(empty($data['data']['archived_cases']))
                echo "لا يوجد";
              else {
                //print_r($data['data']['cases'])
                ?>
              
              <table class="table table-hover ">
                <tr>
                  <th></th>
                  <th>عنوان القضية</th>
                  <th>التاريخ</th>
                  <th>تفاصيل</th>
                  <th>الأتعاب</th>
                </tr>
                <?php 
                  foreach($data['data']['archived_cases'] as $cases_ ) {
                    echo "<tr>
                        <td><a href='index.php?action=viewArchiveCases&id=".$cases_['ID']."'><i class='glyphicon glyphicon-zoom-in'></i></a></td>
                        <td>".$cases_['subject']."</td>
                        <td>".$cases_['startdate']."</td>
                        <td>".$cases_['description']."</td>
                        <td>".$cases_['price']."</td>
                      </tr>";
                  }
                ?>
                
              </table>
            <?php 
              } 
            ?>
       </div>
     </div>
     <br/>
     <div class="panel panel-info">
          <!-- Default panel contents -->
          <div class="panel-heading c-list">
            <span class="title"   >الإنذارات المؤرشفة</span>
           </div>
          <div class="panel-body">
            <?php 
            if(empty($data['data']['archived_alarms']))
                echo "لا يوجد";
              else {
                //print_r($data['data']['cases'])
                ?>
              
              <table class="table table-hover ">
                <tr>
                  <th></th>
                  <th>عنوان القضية</th>
                  <th>التاريخ</th>
                  <th>تفاصيل</th>
                  <th>الأتعاب</th>
                </tr>
                <?php 
                  foreach($data['data']['archived_alarms'] as $alarm_ ) {
                    echo "<tr>
                        <td><a href='index.php?action=viewArchiveAlarm&id=".$alarm_['ID']."'><i class='glyphicon glyphicon-zoom-in'></i></a></td>
                        <td>".$alarm_['subject']."</td>
                        <td>".$alarm_['startdate']."</td>
                        <td>".$alarm_['description']."</td>
                        <td>".$alarm_['price']."</td>
                      </tr>";
                  }
                ?>
                
              </table>
            <?php 
              } 
            ?>
       </div>
     </div>
     <br/>
		 <div class="panel panel-danger">
          <!-- Default panel contents -->
          <div class="panel-heading c-list">
            <span class="title">الموظفين</span>
           </div>
          <div class="panel-body">
           	<?php 
           	if(empty($data['data']['users']))
           			echo "لا يوجد";
           		else {
           			//print_r($data['data']['customers'])
           			?>
           		
           		<table class="table table-hover ">
           			<tr>
           				<th></th>
           				<th>الإسم الرابع</th>
           				<th>الإسم الثالث</th>
           				<th>الإسم الثاني</th>
           				<th>الإسم الأول </th>
           				
           				
           				
           			</tr>
           			<?php 
           				foreach($data['data']['users'] as $user_ ) {
           					echo "<tr>
           							<td><a href='index.php?action=estaff&id=".$user_['ID']."'><i class='glyphicon glyphicon-zoom-in'></i></a></td>
           							<td>".$user_['lname']."</td>
           							<td>".$user_['tname']."</td>
           							<td>".$user_['sname']."</td>
           							<td>".$user_['fname']."</td>
           							
           							
           							
           						</tr>";
           				}
           			?>
           			
           		</table>
           	<?php 
           		}	
           	?>
		   </div>
		 </div>
		 <br/>
		 <div class="panel panel-success">
          <!-- Default panel contents -->
          <div class="panel-heading c-list">
            <span class="title">العملاء</span>
           </div>
          <div class="panel-body">
           	<?php 
           	if(empty($data['data']['customers']))
           			echo "لا يوجد";
           		else {
           			//print_r($data['data']['customers'])
           			?>
           		
           		<table class="table table-hover ">
           			<tr>
           				<th></th>
           				<th>الإسم الأول </th>
           				<th>الإسم الثاني</th>
           				<th>الإسم الثالث</th>
           				<th>الإسم الرابع</th>
           			</tr>
           			<?php 
           				foreach($data['data']['customers'] as $custom ) {
           					echo "<tr>
           							<td><a href='index.php?action=editcustomer&customerid=".$custom['ID']."'><i class='glyphicon glyphicon-zoom-in'></i></a></td>
           							<td>".$custom['cfname']."</td>
           							<td>".$custom['csname']."</td>
           							<td>".$custom['ctname']."</td>
           							<td>".$custom['clname']."</td>
           						</tr>";
           				}
           			?>
           			
           		</table>
           	<?php 
           		}	
           	?>
		   </div>
		 </div>
		 <br/>

		 <div class="panel panel-danger">
          <!-- Default panel contents -->
          <div class="panel-heading c-list">
            <span class="title">الأحداث</span>
           </div>
          <div class="panel-body">
           	<?php 
           	if(empty($data['data']['events']))
           			echo "لا يوجد";
           		else {
           			//print_r($data['data']['customers'])
           			?>
           		
           		<table class="table table-hover ">
           			<tr>
           				<th>اسم الحدث</th>
           				<th>تعليق</th>
           				<th>اوقت البدء</th>
           				<th>وقت الانتهاء</th>
           			</tr>
           			<?php 
           				foreach($data['data']['events'] as $event ) {
           					echo "<tr>
           							<td>".$event['event']."</td>
           							<td>".$event['comments']."</td>
           							<td>".$event['starttime']."</td>
           							<td>".$event['endtime']."</td>
           						</tr>";
           				}
           			?>
           			
           		</table>
           	<?php 
           		}	
           	?>
		   </div>
		 </div>
		  <br/>
		 <div class="panel panel-primary">
          <!-- Default panel contents -->
          <div class="panel-heading c-list">
            <span class="title" style='color:white;'>المهام</span>
           </div>
          <div class="panel-body">
           	<?php 
           	if(empty($data['data']['missions']))
           			echo "لا يوجد";
           		else {
           			//print_r($data['data']['customers'])
           			?>
           		
           		<table class="table table-hover ">
           			<tr>
           				<th>الحالة</th>
           				<th>الأهمية</th>
           				<th>اتعليق</th>
           				<th>تاريخ الإنتهاء</th>
           				<th>تاريخ البدء</th>
           				<th>إلى</th>
           				<th>من</th>
           			</tr>
           			<?php 
           				foreach($data['data']['missions'] as $mission ) {
           					echo "<tr>
           							<td>".$mission['status']."</td>
           							<td>".$mission['priority']."</td>
           							<td>".$mission['comments']."</td>
           							<td>".$mission['enddate']."</td>
           							<td>".$mission['startdate']."</td>
           							<td>".GetFnameLnameByUserID($mission['to_user_id'])."</td>
           							<td>".GetFnameLnameByUserID($mission['from_user_id'])."</td>
           						</tr>";
           				}
           			?>
           			
           		</table>
           	<?php 
           		}	
           	?>
		   </div>
		 </div>

		</div>