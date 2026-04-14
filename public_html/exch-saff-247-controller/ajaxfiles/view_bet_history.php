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

$searchValue = $_POST['search']['value'];

$draw = isset($_POST['draw']) ? intval($_POST['draw']) : 0;

$start = $_POST['start'];
$length = $_POST['length'];

$where = " WHERE 1=1 AND b.bet_status != 2 ";
$where_casino = "  AND b.bet_status != 2";

$searchSql = "";
$gg="";
if (!empty($searchValue)) {
    $searchValue = $conn->real_escape_string($searchValue);
  // echo $gg="SELECT GROUP_CONCAT(UserID) as allusers FROM user_login_master WHERE Email_ID LIKE '%$searchValue%'";
  $get_client11 = $conn->query("SELECT GROUP_CONCAT(UserID) as allusers FROM user_login_master WHERE Email_ID LIKE '%$searchValue%' and  UserType=1");
    $fc1 = mysqli_fetch_assoc($get_client11);
    $allusers = $fc1['allusers'];
    $user_con="";
    if(!empty($allusers)){
        $user_con=" or b.user_id in ($allusers)";
    }
    $searchSql = "
        AND (b.event_name LIKE '%$searchValue%'
            OR b.market_name LIKE '%$searchValue%'
            OR b.bet_type LIKE '%$searchValue%'
            OR b.bet_stack LIKE '%$searchValue%'
            OR b.bet_runs LIKE '%$searchValue%'
            OR b.bet_odds LIKE '%$searchValue%'
            OR b.bet_result LIKE '%$searchValue%' $user_con
        )
    ";
}

$where .= $searchSql;
$where_casino .= $searchSql;

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

$all_master_details =array();
$get_all_user_data = $conn->query("SELECT * FROM user_login_master");
while ($fetch = mysqli_fetch_assoc($get_all_user_data)) {
    $all_master_details[$fetch['UserID']] = $fetch;
}



$filterQuery1 = $conn->query("
    SELECT COUNT(*) AS total
    FROM bet_details b
    $where
   
");

if ($filterQuery1) {
    $row = $filterQuery1->fetch_assoc();
   
    $filteredData = $row['total'];
    // echo "count1=$filteredData";
}
//$filteredData = $filterQuery1->fetch_assoc()['total'];

//echo " SELECT COUNT(*) AS total FROM bet_teen_details b LEFT JOIN user_login_master ulm ON ulm.UserID = b.user_id WHERE DATE(b.bet_time) BETWEEN '$start_date' AND '$end_date' $where_casino";

// echo " SELECT COUNT(*) AS total
//     FROM bet_teen_details b
//     WHERE DATE(b.bet_time) BETWEEN '$start_date' AND '$end_date'
//     $where_casino";

$filterQuery2 = $conn->query("

    SELECT COUNT(*) AS total
    FROM bet_teen_details b
    WHERE DATE(b.bet_time) BETWEEN '$start_date' AND '$end_date'
    $where_casino
");

if ($filterQuery2) {
    $row = $filterQuery2->fetch_assoc();
    $filteredData += $row['total'];
    // echo "count2=$filteredData";
}

//$filteredData += $filterQuery2->fetch_assoc()['total'];

function format_bet_row($row, $all_master_details, $site_name, $type = 'bet') {

    $client_details = $all_master_details[$row['user_id']];
    $client_email=$client_details['Email_ID'];

    $dl_uid   = $client_details['parentDL'];
    $dl_email_id   = $all_master_details[$dl_uid]['Email_ID'];
    $mdl_uid   = $client_details['parentMDL'];
    $mdl_email_id  = $all_master_details[$mdl_uid]['Email_ID'];
    $smdl_uid   = $client_details['parentSuperMDL'];
    $smdl_email_id = $all_master_details[$smdl_uid]['Email_ID'];
     $kmdl_uid   = $client_details['parentKingAdmin'];
    $king_email_id = $all_master_details[$kmdl_uid]['Email_ID'];

    if ($dl_email_id == $mdl_email_id) $dl_email_id = '';
    if ($mdl_email_id == $smdl_email_id) $mdl_email_id = '';
    if ($smdl_email_id == $king_email_id) $smdl_email_id = '';

    if ($row['bet_result'] > 0) $status = "Client Win";
    else if ($row['bet_result'] < 0) $status = "Client Loss";
    else $status = "No Result";

     if($type == "bet"){
         $action_html = '
        <select  name="set_result" id="set_result_'.$row['bet_id'].'" onchange="set_otp('.$row['bet_id'].', \''.$type.'\')">
            <option value="">Select</option>
            <option value="Delete">Delete</option>
        </select>
    ';
    }else{
 $action_html = '
        <select  name="set_result_casino" id="set_result_casino_'.$row['bet_id'].'" onchange="set_otp('.$row['bet_id'].', \''.$type.'\')">
            <option value="">Select</option>
            <option value="Delete">Delete</option>
        </select>
    ';
    }

    return [
        'Email_ID'        => $client_email,
        'parentDL'        => $dl_email_id,
        'parentMDL'       => $mdl_email_id,
        'parentSuperMDL'  => $smdl_email_id,
        'parentKingAdmin' => $king_email_id,
        'site_name'       => $site_name,
        'event_name'      => $row['event_name'],
        'market_name'     => $row['market_name'],
        'bet_type'        => $row['bet_type'],
        'bet_stack'       => $row['bet_stack'],
        'bet_runs'        => $row['bet_runs'],
        'bet_odds'        => $row['bet_odds'],
        'bet_result'      => $row['bet_result'],
        'status_text'     => $status,
        'action_html'     => $action_html,
        'bet_time'        => date("d-m-Y H:i:s", strtotime($row['bet_time']))
    ];
}

$sql = "
(
    SELECT 
        b.bet_id,
        b.bet_time,
        b.event_name,
        b.market_name,
        b.bet_type,
        b.bet_stack,
        b.bet_runs,
        b.bet_odds,
        b.bet_result,
        b.user_id,
        'bet' AS bet_source
    FROM bet_details b
    $where
)
UNION ALL
(
    SELECT 
        b.bet_id,
        b.bet_time,
        b.event_name,
        b.market_name,
        b.bet_type,
        b.bet_stack,
        b.bet_runs,
        b.bet_odds,
        b.bet_result,
        b.user_id,
        'casino_bet' AS bet_source
    FROM bet_teen_details b
    WHERE DATE(b.bet_time) BETWEEN '$start_date' AND '$end_date'
    $where_casino
)
ORDER BY bet_time DESC
LIMIT $start, $length
";
$q = $conn->query($sql);

$data = [];

while ($r = mysqli_fetch_assoc($q)) {
    $data[] = format_bet_row(
        $r,
        $all_master_details,
        $site_name,
        $r['bet_source']
    );
}

echo json_encode([
    "draw" => $draw,
    "recordsTotal" => intval($filteredData),
    "recordsFiltered" => intval($filteredData),
    "data" => $data,
]);




?>