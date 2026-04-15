<?php
function save_rejection_log($conn = false, $user_id = '', $error = '', $market_runner_name = '', $page_call_time = '', $api_call = array(), $api_url = '', $details = '', $game_type = '1')
{

	$time = DATE('Y-m-d H:i:s');
	$details = json_encode($_REQUEST);
	$api_call = json_encode($api_call);
	if (empty($page_call_time)) {
		$page_call_time = "0000-00-00 00:00:00";
	}

	$sql_market_limit = $conn->query('INSERT INTO rejection_log (user_id,log_market_name,api_data,api_url,log_error,log_details,page_call_time,log_time,game_type) VALUES (' . $user_id . ',"' . $market_runner_name . '",\'' . $api_call . '\',\'' . $api_url . '\',"' . $error . '",\'' . $details . '\',"' . $page_call_time . '","' . $time . '","' . $game_type . '");');

	return true;
}
function save_success_log($conn = false, $user_id = '', $bet_id = '', $market_runner_name = '', $page_call_time = '', $api_call = array(), $api_url = '', $details = '', $game_type = '1')
{

	$time = DATE('Y-m-d H:i:s');
	$details = json_encode($_REQUEST);
	$api_call = json_encode($api_call);
	if (empty($page_call_time)) {
		$page_call_time = "0000-00-00 00:00:00";
	}

	$sql_market_limit = $conn->query('INSERT INTO bet_success_log (user_id,log_market_name,api_data,api_url,bet_id,log_details,page_call_time,log_time,game_type) VALUES (' . $user_id . ',"' . $market_runner_name . '",\'' . $api_call . '\',\'' . $api_url . '\',"' . $bet_id . '",\'' . $details . '\',"' . $page_call_time . '","' . $time . '","' . $game_type . '");');

	return true;
}
