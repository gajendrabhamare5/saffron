<?php
include "../../include/conn.php";
include "../session.php";
$user_id = $_SESSION['CONTROLLER_LOGIN_ID'];
$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];


if ($login_type == 5) {
	/* $get_pnl_report  = $conn->query("select * from bet_details as b left outer join  user_login_master as ulm on ulm.UserID=b.user_id where b.bet_status =1 order by b.event_id, b.market_type , b.market_id, b.bet_type"); */
} else {
	header("Location: ../logout.php");
}

$event_type = $_REQUEST['sport_id'];

$current_date =  date('Y-m-d H:i:s', strtotime('-15 day', strtotime(date("Y-m-d H:i:s"))));

$get_active_market_name = $conn->query("select  * from bet_details where event_type='$event_type' and   bet_time>='$current_date' GROUP BY event_id");

while ($fetch_get_active_market_name = mysqli_fetch_assoc($get_active_market_name)) {
	$event_id = $fetch_get_active_market_name['event_id'];
	$event_name = $fetch_get_active_market_name['event_name'];

	$market_name_data[] = array(
		"event_id" => $event_id,
		"event_name" => $event_name,
	);
}
$return_array = array(
	"status" => "ok",
	"event_name_data" => $market_name_data
);
echo json_encode($return_array);