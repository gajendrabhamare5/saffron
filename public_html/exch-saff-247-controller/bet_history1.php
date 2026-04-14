<?php
	include "../../include/conn.php";
	include "../session.php";
	
//      error_reporting(E_ALL);
//   ini_set('display_errors', 1);
//   ini_set('display_startup_errors', 1);

	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];

	if($login_type != 5){
		header("Location: ../logout.php");
	}

$smdl_name   = $_POST['smdl_name'];
$mdl_name    = $_POST['mdl_name'];
$dl_name     = $_POST['dl_name'];
$client_name = $_POST['client_name'];
$event_type  = $_POST['event_type']; 
$event_name  = $_POST['event_name'];
$market_name = $_POST['market_name'];
$start_date  = $_POST['start_date'];
$end_date    = $_POST['end_date'];
$login_type    = $_POST['login_type'];
$site_name    = $_POST['site_name'];

$draw = isset($_POST['draw']) ? intval($_POST['draw']) : 0;

$start = $_POST['start'];
$length = $_POST['length'];

$where = " WHERE 1=1 AND b.bet_status != 2 ";
$where_casino = "  AND b.bet_status != 2";

if (!empty($start_date) && !empty($end_date) ) {
    $start_date = date("Y-m-d", strtotime($start_date));
    $end_date   = date("Y-m-d", strtotime($end_date));
    $where .= " AND DATE(b.bet_time) BETWEEN '$start_date' AND '$end_date' ";
    
}

if (empty($start_date) || empty($end_date)) {
    $start_date = date("Y-m-d");
    $end_date   = date("Y-m-d");
}

if (!empty($client_name) ) {
    $get_client = $conn->query("SELECT UserID FROM user_login_master WHERE Email_ID='$client_name'");
    $fc = mysqli_fetch_assoc($get_client);
    $client_id = $fc['UserID'];
    $where .= " AND b.user_id = '$client_id'";
     $where_casino .= " AND b.user_id = '$client_id'";
}

if (!empty($event_name)) {
    $ex = explode("#", $event_name);
    $event_id = $ex[1];
    $where .= " AND b.event_id = '$event_id'";
     $where_casino .=" AND b.event_id = '$event_id'";
}

if (!empty($market_name)) {
    $where .= " AND b.market_name = '$market_name'";
     $where_casino .=" AND b.market_name = '$market_name'";
}

$where_casino .= " AND 1=1";
$search_event_type = ""; 

if (!empty($event_type) && is_array($event_type) && $event_type[0] !== '') {
    if (in_array("9999999999", $event_type)) {
        $where .= " AND 1!=1";           // disable normal bets
        $where_casino .= " AND 1=1";      // enable casino bets
    } else {
        $list = implode(",", array_map('intval', $event_type));
        $where .= " AND b.event_type IN ($list)";
        $where_casino .= " AND 1!=1";     // disable casino bets
    }

}

$all_master_details = [];
$get_all_user_data = $conn->query("SELECT * FROM user_login_master WHERE UserType<>1");
while ($fetch = mysqli_fetch_assoc($get_all_user_data)) {
    $all_master_details[$fetch['UserID']] = $fetch['Email_ID'];
}



$filterQuery1 = $conn->query("
    SELECT COUNT(*) AS total
    FROM bet_details b
    LEFT JOIN user_login_master ulm ON ulm.UserID = b.user_id
    $where
   
");

if ($filterQuery1) {
    $row = $filterQuery1->fetch_assoc();
   
    $filteredData = $row['total'];
    // echo "count1=$filteredData";
}
//$filteredData = $filterQuery1->fetch_assoc()['total'];

//echo " SELECT COUNT(*) AS total FROM bet_teen_details b LEFT JOIN user_login_master ulm ON ulm.UserID = b.user_id WHERE DATE(b.bet_time) BETWEEN '$start_date' AND '$end_date' $where_casino";

$filterQuery2 = $conn->query("

    SELECT COUNT(*) AS total
    FROM bet_teen_details b
    LEFT JOIN user_login_master ulm ON ulm.UserID = b.user_id
    WHERE DATE(b.bet_time) BETWEEN '$start_date' AND '$end_date'
    $where_casino
");

if ($filterQuery2) {
    $row = $filterQuery2->fetch_assoc();
    $filteredData += $row['total'];
    // echo "count2=$filteredData";
}

//$filteredData += $filterQuery2->fetch_assoc()['total'];


function format_bet_row($row, $all_master_details,$site_name, $type = 'bet') {
    // Master emails
    $dl_email_id = $all_master_details[$row['parentDL']];
    $mdl_email_id = $all_master_details[$row['parentMDL']];
    $smdl_email_id = $all_master_details[$row['parentSuperMDL']];
    $king_email_id = $all_master_details[$row['parentKingAdmin']];

    if ($dl_email_id == $mdl_email_id) $dl_email_id = '';
    if ($mdl_email_id == $smdl_email_id) $mdl_email_id = '';
    if ($smdl_email_id == $king_email_id) $smdl_email_id = '';

    // Status
    if ($row['bet_result'] > 0) $status = "Client Win";
    else if ($row['bet_result'] < 0) $status = "Client Loss";
    else $status = "No Result";

    $select_html = '<select onchange="set_otp('.$row['bet_id'].',\''.$type.'\')">
                        <option value="">Select</option>
                        <option value="Delete">Delete</option>
                    </select>';

    return [
        'Email_ID'       => $row['Email_ID'],
        'parentDL'       => $dl_email_id,
        'parentMDL'      => $mdl_email_id,
        'parentSuperMDL' => $smdl_email_id,
        'parentKingAdmin'=> $king_email_id,
        'site_name'      => $site_name,
        'event_name'     => $row['event_name'] . ($type=='casino' ? " (".$row['event_id'].")" : ''),
        'market_name'    => $row['market_name'],
        'bet_type'       => $row['bet_type'],
        'bet_stack'      => $row['bet_stack'],
        'bet_runs'       => $row['bet_runs'],
        'bet_odds'       => $row['bet_odds'],
        'bet_result'     => $row['bet_result'],
        'status_text'    => $status,
        'action_html'    => $select_html,
        'bet_time'       => date("d-m-Y H:i:s", strtotime($row['bet_time']))
    ];
}

$merged = [];

   
$q1 = $conn->query("
    SELECT b.*, ulm.Email_ID, ulm.parentDL, ulm.parentMDL, ulm.parentSuperMDL, ulm.parentKingAdmin
    FROM bet_details b
    LEFT JOIN user_login_master ulm ON ulm.UserID = b.user_id
    $where
");

while ($r = mysqli_fetch_assoc($q1)) {
    $merged[] = format_bet_row($r, $all_master_details, $site_name, 'bet');
    
}

// Fetch casino bets
$q2 = $conn->query("
    SELECT b.*, ulm.Email_ID, ulm.parentDL, ulm.parentMDL, ulm.parentSuperMDL, ulm.parentKingAdmin
    FROM bet_teen_details b
    LEFT JOIN user_login_master ulm ON ulm.UserID = b.user_id
    WHERE DATE(b.bet_time) BETWEEN '$start_date' AND '$end_date'
    $where_casino
");

// Add casino bets
while ($r = mysqli_fetch_assoc($q2)) {
    $merged[] = format_bet_row($r, $all_master_details, $site_name, 'casino');
}


usort($merged, function($a, $b) {
    return strtotime($b['bet_time']) - strtotime($a['bet_time']);
});

$final = array_slice($merged, $start, $length);


echo json_encode([
    "draw" => $draw,
    "recordsTotal" => intval($filteredData),
    "recordsFiltered" => intval($filteredData),
    "data" => $final,
]);




?>