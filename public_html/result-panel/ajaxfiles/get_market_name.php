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

$event_id = $_REQUEST['event_id'];
$sport_id = $_REQUEST['sport_id'];
$get_active_market_name = $conn->query("select  * from bet_details where bet_status=1 and event_id=$event_id and event_type='$sport_id' GROUP BY event_id,market_type,market_id");
while ($fetch_get_active_market_name = mysqli_fetch_assoc($get_active_market_name)) {
	$market_id = $fetch_get_active_market_name['market_id'];
	$market_type = $fetch_get_active_market_name['market_type'];
	$market_name = $fetch_get_active_market_name['market_name'];

	$market_name_data[] = array(
		"market_id" => $market_id,
		"market_type" => $market_type,
		"market_name" => $market_name,
	);
}
$return_array = array(
	"status" => "ok",
	"market_name_data" => $market_name_data
);
echo json_encode($return_array);
