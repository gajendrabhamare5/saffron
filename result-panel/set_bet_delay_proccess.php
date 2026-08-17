<?php
include "../include/conn.php";
include "session.php";
/* error_reporting(E_ALL);
   ini_set("display_errors",1);
   ini_set("display_startup_errors",1); */
$user_id = $_SESSION['CONTROLLER_LOGIN_ID'];
$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];

$ip_address = '';
if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
	$ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
} else {
	$ip_address = gethostbyaddr($_SERVER['REMOTE_ADDR']);
}

$user_agent = $_SERVER['HTTP_USER_AGENT'];

$delay_value = $conn->real_escape_string($_POST['delay_value']);
$delay_value_id = $conn->real_escape_string($_POST['delay_value_id']);


$datetime = date("Y-m-d H:i:s");

$delay_value_id = explode(",", $delay_value_id);
$delay_value = explode(",", $delay_value);
foreach ($delay_value_id as $key => $value) {
	$delay = $delay_value[$key];

	$select_data = $conn->query("select * from bet_delay_master where market_type_id='$value'");
	$old_data = mysqli_fetch_assoc($select_data);
	$old_delay_value = $old_data['delay_value'];
	$old_market_type_name = $old_data['market_type_name'];
	$old_market_type_id = $old_data['market_type_id'];
	if ($old_delay_value != $delay) {
		$conn->query("insert into bet_delay_master_log set market_type_id='$old_market_type_id',market_type_name='$old_market_type_name',old_delay_value='$old_delay_value',new_delay_value='$delay',ip_address='$ip_address',user_agent='$user_agent',datetime='$datetime'");
	}
	$conn->query("update bet_delay_master set delay_value='$delay' where market_type_id='$value'");
}

$return_array = array(
	"status" => "ok",
	"message" => "Insert Delay Successffully",
);
echo json_encode($return_array);
exit();
