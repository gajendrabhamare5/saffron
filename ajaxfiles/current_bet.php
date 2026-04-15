<?php
include('../include/conn.php');
include "../session.php";
$user_id = $_SESSION['CLIENT_LOGIN_ID'];


$data = array();
$draw = intval($_POST["sEcho"]);
$start = intval($_POST["iDisplayStart"]);
$length = intval($_POST["iDisplayLength"]);
$search = $conn->real_escape_string($_POST['sSearch']);

$sort_column = $conn->real_escape_string($_POST['iSortCol_0']);
$sort_dir = $conn->real_escape_string($_POST['sSortDir_0']);

$value = str_replace("=", "1!=1", $search);
$sort_dir = str_replace("--", "1!=1", $sort_dir);
$sort_dir = str_replace(";", "1!=1", $sort_dir);
$sort_dir = str_replace("#", "1!=1", $sort_dir);
$report_type = $conn->real_escape_string($_POST['report_type']);
$BetType = $conn->real_escape_string($_POST['BetType']);
$query_condition = "";
$is_casino = 0;
if ($report_type == 'sports') {
    $query_condition .= " and event_type in (1,2,4)";
}
if ($report_type == 'casino') {
    $is_casino = 1;
}

if (strtolower($BetType) == "back") {
    $query_condition .= " and (bet_type='Back' || bet_type='Yes')";
}
if (strtolower($BetType) == "lay") {
    $query_condition .= " and (bet_type='Lay' || bet_type='No')";
}
$todaya = date("Y-m-d");
$query_condition .= " and date(bet_time) = '$todaya'";
$search = "";
if (!empty($value)) {


    $search .= "and (event_type like '%$value%' or event_name like '%$value%' or market_name like '%$value%' or bet_odds like '%$value%' or bet_stack like '%$value%')";

}

if ($is_casino == 1) {
    $ttt = "SELECT count(*) totrecord,sum(bet_stack) as totamount FROM bet_teen_details where user_id=$user_id $query_condition $search order by bet_time desc";
    $sql_data_all = $conn->query("SELECT count(*) totrecord,sum(bet_stack) as totamount FROM bet_teen_details where user_id=$user_id $query_condition $search order by bet_time desc");
    if ($length == "-1") {
        $sql_data = $conn->query("select * from bet_teen_details where user_id=$user_id $query_condition $search order by bet_time desc");


    } else {
        $sql_data = $conn->query("select * from bet_teen_details where user_id=$user_id $query_condition $search order by bet_time desc LIMIT $length OFFSET $start");


    }
} else {
    $sql_data_all = $conn->query("SELECT count(*) totrecord,sum(bet_stack) as totamount FROM bet_details where user_id=$user_id $query_condition $search order by bet_time desc");
    if ($length == "-1") {
        $sql_data = $conn->query("SELECT * FROM bet_details where user_id=$user_id $query_condition $search order by bet_time desc");


    } else {
        $sql_data = $conn->query("SELECT * FROM bet_details where user_id=$user_id $query_condition $search order by bet_time desc LIMIT $length OFFSET $start");


    }
}
$all_data = mysqli_fetch_assoc($sql_data_all);
$tot_amount = $all_data['totamount'];
if (empty($tot_amount)) {
    $tot_amount = 0;
}
$totalData = $all_data['totrecord'];
$totalFiltered = $totalData;
$num = 0;
$data = array();
while ($fetch_get_account_details = mysqli_fetch_assoc($sql_data)) {
    $event_type = $fetch_get_account_details['event_type'];
    $event_name = $fetch_get_account_details['event_name'];
    $market_name = $fetch_get_account_details['market_name'];
    $bet_stack = $fetch_get_account_details['bet_stack'];
    $bet_type = $fetch_get_account_details['bet_type'];
    $bet_odds = $fetch_get_account_details['bet_odds'];
    $bet_runs = $fetch_get_account_details['bet_runs'];
    $bet_runs2 = $fetch_get_account_details['bet_runs2'];
    $market_type = $fetch_get_account_details['market_type'];
    $bet_result = $fetch_get_account_details['bet_result'];
    $bet_status = $fetch_get_account_details['bet_status'];
    $date_time = $fetch_get_account_details['bet_time'];
    $date_time = date("d-m-Y H:i:s", strtotime($date_time));

    if ($bet_status == 1) {
        $bet_status = "Open";
    } else if ($bet_status == 0) {
        $bet_status = "Closed";
    } else {
        $bet_status = "Cancelled";
    }
    $event_type_label = "";
    if ($event_type == 4) {
        $event_type_label = "Cricket";
    } else if ($event_type == 2) {
        $event_type_label = "Tennis";
    } else if ($event_type == 1) {
        $event_type_label = "Soccer";
    }

    if ($market_type == 'KHADO_ODDS') {
        $bet_odds = $bet_runs;
        $market_name .= '-' . (($bet_runs2 - $bet_runs) + 1);
    } else if ((int) $bet_runs > 0) {
        $market_name .= '/' . $bet_odds;
        $bet_odds = $bet_runs;
    }

    if ($market_type == "BOOKMAKER_ODDS") {

        $bet_odds = (float) $bet_odds * 100 - 100;
        $bet_odds = round($bet_odds, 2);
    }

    $data[] = array(
        "event_type_label" => $event_type_label,
        "event_name" => $event_name,
        "market_name" => $market_name,
        "nation" => $market_name,
        "datetime" => $date_time,
        "user_rate" => $bet_odds,
        "amount" => $bet_stack,
        "bet_type" => $bet_type,
        "action" => "",
    );
}


$results = array(
    "sEcho" => $draw,
    "iTotalRecords" => intval($totalData),
    "iTotalDisplayRecords" => intval($totalFiltered),
    "aaData" => $data,
    "total_amount" => $tot_amount,
    "total_bets" => $totalData,
    "ttt" => "",
);
echo json_encode($results);

?>