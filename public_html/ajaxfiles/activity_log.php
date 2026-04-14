<?php
include('../include/conn.php');
include "../session.php";
$user_id = $_SESSION['CLIENT_LOGIN_ID'];


$data = array();
$draw = intval($_POST["sEcho"]);
$start = intval($_POST["iDisplayStart"]);
$length = intval($_POST["iDisplayLength"]);
$search =  $conn->real_escape_string($_POST['sSearch']);

$sort_column =  $conn->real_escape_string($_POST['iSortCol_0']);
$sort_dir =  $conn->real_escape_string($_POST['sSortDir_0']);

$value = str_replace("=","1!=1",$search);
	$sort_dir = str_replace("--","1!=1",$sort_dir);
	$sort_dir = str_replace(";","1!=1",$sort_dir);
	$sort_dir = str_replace("#","1!=1",$sort_dir);
	$from_date = $conn->real_escape_string($_POST['from_date']);
	$to_date = $conn->real_escape_string($_POST['to_date']);
	$report_type = $conn->real_escape_string($_POST['report_type']);

	
$log_type="";
if ($report_type == 'endlogin') {
    $log_type=" and log_type='login'";
}
if ($report_type == 'password') {
    $log_type=" and log_type='password'";
}
$search="";
if( !empty($value) )
{

    
	$search .= "and (username like '%$value%' or ip_address like '%$value%')";
	
}


    $sql_data_all = $conn->query("select * from activity_log as a where a.user_id=$user_id and date(a.date_time) >='$from_date' and date(a.date_time) <='$to_date' $log_type $search order by a.date_time desc");
    if($length == "-1"){
        $sql_data = $conn->query("select * from activity_log as a where a.user_id=$user_id and date(a.date_time) >='$from_date' and date(a.date_time) <='$to_date' $log_type $search order by a.date_time desc");
    
    
    }
    else{
        $sql_data = $conn->query("select * from activity_log as a where a.user_id=$user_id and date(a.date_time) >='$from_date' and date(a.date_time) <='$to_date' $log_type $search order by a.date_time DESC LIMIT $length OFFSET $start");
    
    
    }


$totalData = mysqli_num_rows($sql_data_all);
$totalFiltered = $totalData; 
$num=0;
	$data = array();
	while ($fetch_get_account_details = mysqli_fetch_assoc($sql_data)) {
        $username=$fetch_get_account_details['username'];
        $date_time=$fetch_get_account_details['date_time'];
		$date_time = date("d-m-Y H:i:s", strtotime($date_time));
        $ip_address=$fetch_get_account_details['ip_address'];
        $user_agent=$fetch_get_account_details['user_agent'];
		$data[] = array(
            "user"=>$username,
            "date"=>$date_time,
            "ip"=>$ip_address,
            "browser"=>$user_agent,
        );
	}

 
    $results = array(
		"sEcho" => $draw,
        "recordsTotal" => intval($totalData),
        "recordsFiltered" => intval( $totalFiltered ),
		"data"=>$data
	); 
echo json_encode($results);

?>