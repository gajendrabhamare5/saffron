<?php
include "../../include/conn.php";
include "../session.php";
/* error_reporting(E_ALL);
ini_set('display_errors',1);
ini_set('display_startup_errors',1); */
$user_id = $_SESSION['CONTROLLER_LOGIN_ID'];
$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
if ($login_type != 5) {
    header("Location: ../logout.php");
}

$data = array();
$draw = $_REQUEST['draw'];
$offset = $_REQUEST['start'];
$length = $_REQUEST['length'];
$search1 = $_REQUEST['search'];
$searchValue = $search1['value']; // Search value

$searchWhere = " ";
if(!empty($searchValue)){
   $searchValue = mysqli_real_escape_string($conn, $searchValue);

    $searchWhere = " AND (
        um.Email_ID LIKE '%$searchValue%' OR
        ed.market_type LIKE '%$searchValue%' OR
        ed.market_id LIKE '%$searchValue%' OR
        ed.exposure_amount LIKE '%$searchValue%' OR
        ed.max_winning_amount LIKE '%$searchValue%' OR
        ed.exposure_datetime LIKE '%$searchValue%' 
    )";
}

/* echo "select ed.*, um.Email_ID from `exposure_details` ed  LEFT JOIN user_master um ON um.Id = ed.user_id   WHERE 1=1  $searchWhere order by ed.exposure_id asc"; */

$sql_data_all = $conn->query("select ed.*, um.Email_ID from `exposure_details` ed  LEFT JOIN user_master um ON um.Id = ed.user_id   WHERE 1=1  $searchWhere order by ed.exposure_id asc");
/* echo "select ed.*, um.Email_ID from `exposure_details` ed  LEFT JOIN user_master um ON um.Id = ed.user_id  WHERE 1=1 $searchWhere order by ed.exposure_id asc limit $length offset $offset"; */
$sql_data = $conn->query("select ed.*, um.Email_ID from `exposure_details` ed  LEFT JOIN user_master um ON um.Id = ed.user_id  WHERE 1=1 $searchWhere order by ed.exposure_id asc limit $length offset $offset");

$totalData = mysqli_num_rows($sql_data_all); 
$totalFiltered = $totalData;

/* Store current page records */
$rows = array();
$eventIds = array();
$marketIds = array();
$betStatus = array();
$userIds = array();

$fancyBetStatus = array();
$teenBetStatus = array();

while ($row = mysqli_fetch_assoc($sql_data)) {
    $rows[] = $row;
    $eventIds[] = "'" . mysqli_real_escape_string($conn, $row['event_id']) . "'";
     $marketIds[] = "'" . mysqli_real_escape_string($conn, $row['market_id']) . "'";
     $userIds[]   = "'" . mysqli_real_escape_string($conn, $row['user_id']) . "'";
}
/* Fetch event names only once */
$eventNames = array();
$marketNames = array();

if (!empty($eventIds)) {

    $eventIdList = implode(",", array_unique($eventIds));
    $marketIdList = implode(",", array_unique($marketIds));
    $userIdList = implode(",", array_unique($userIds));
   
    $q = $conn->query("
        SELECT event_id, event_name, market_name, bet_status, user_id
        FROM bet_details
        WHERE event_id IN ($eventIdList)
         AND user_id IN ($userIdList)
        GROUP BY event_id, user_id
    ");

    while ($r = mysqli_fetch_assoc($q)) {
        $eventNames[$r['event_id']] = $r['event_name'];
        $key = $r['event_id'].'_'.$r['user_id'];
        $marketNames[$key] = $r['market_name'];
       /*  $betStatus[$key] = $r['bet_status']; */
        $fancyBetStatus[$key] = $r['bet_status'];
    }

    // Second table (only missing event_ids)
    $q = $conn->query("
        SELECT event_id, event_name, bet_status, user_id
        FROM bet_teen_details
        WHERE event_id IN ($eventIdList)
         AND user_id IN ($userIdList)
        GROUP BY event_id, user_id
    ");

    while ($r = mysqli_fetch_assoc($q)) {
        if (!isset($eventNames[$r['event_id']])) {
            $eventNames[$r['event_id']] = $r['event_name'];
        }
         $key = $r['event_id'].'_'.$r['user_id'];
          $teenBetStatus[$key] = $r['bet_status'];
    }
}

$num = $offset;

foreach ($rows as $fetch_data) {

    $num++;

    $id = $fetch_data['exposure_id'];
    $Email_ID = $fetch_data['Email_ID'];
    $event_id = $fetch_data['event_id'];
    $market_id = $fetch_data['market_id'];
    $market_type = $fetch_data['market_type'];
    $exposure_amount = $fetch_data['exposure_amount'];
    $max_winning_amount = $fetch_data['max_winning_amount'];
    $exposure_datetime = $fetch_data['exposure_datetime'];
    $user_id = $fetch_data['user_id'];

    $event_name = isset($eventNames[$event_id]) ? $eventNames[$event_id] : '';
    $key = $event_id.'_'.$user_id;
    $display_market = isset($marketNames[$key]) ? $marketNames[$key] : $market_id;

    
    $status = 0;

if (isset($fancyBetStatus[$key])) {
    $status = $fancyBetStatus[$key];
}  else {
    $teenKey = $event_id.'_'.$user_id;
    if (isset($teenBetStatus[$teenKey])) {
        $status = $teenBetStatus[$teenKey];
    }
}

    $data[] = array(
        $num,
        $Email_ID,
        $event_name,
        $display_market,
        $market_type,
        $exposure_amount,
        $max_winning_amount,
        $exposure_datetime,
        "<span style='font-size:20px;color:red;margin-right:5px;cursor:pointer;' onclick='delete_exposure($id,$status)'><i class='fa fa-trash'></i></span>"
    );
}



$results = array(
    "draw" => $draw,
    "recordsTotal" => intval($totalData),
    "recordsFiltered" => intval($totalFiltered),
    "data" => $data
);
/*while($row = $result->fetch_array(MYSQLI_ASSOC)){
$results["data"][] = $row ;
}*/

echo json_encode($results);
?>