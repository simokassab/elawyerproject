
<?php
include_once 'config.php';

// Search by string in all tables (customers, cases, alarms, missions, events) and return json for each table
function search() {
	$array = array();
	$return_array=array();
	$return_array['data']['customers']=array();

	if(!empty($_REQUEST['data'])) 
	{
		echo $_REQUEST['data'];
		$con = connectDB('techoffice');

		// customers data
		$customer_columns = ['fname', 'sname', 'tname', 'lname', 'room', 'address'];
		$return_array['data']['customers'] = add_get_params($con, 'users', $customer_columns);

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
	header('Content-Type: text/html; charset=utf-8');
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


echo json_encode($data,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>