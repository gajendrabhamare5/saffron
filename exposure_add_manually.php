<?php
exit();
include('include/conn.php');
include('include/flip_function.php');
include('include/flip_function2.php');

$ddd=$conn->query("SELECT *  FROM `bet_details` WHERE date(bet_time) < '2023-11-30' and bet_status=1 and event_type=4 and event_id=32816493  
ORDER BY `bet_details`.`event_name`  DESC");
while($gggg=mysqli_fetch_assoc($ddd)){
    $user_id=$gggg['user_id'];
    $eventId=$gggg['event_id'];
    $marketId=$gggg['market_id'];
    $bet_runner_id=$gggg['runner_id'];
    $margin_used=$gggg['bet_margin_used'];
    $bet_win_amount=$gggg['bet_win_amount'];
    $odds=$gggg['bet_odds'];
    $exposure_bet_type=$gggg['bet_type'];
    $market_type=$gggg['market_type'];
    $stack=$gggg['bet_stack'];
    $runs=$gggg['bet_runs'];
    $current_bet = array(
		"bet_event_id" => $eventId,
		"bet_market_id" => $marketId,
		"bet_runner_id" => $bet_runner_id,
		"bet_margin_used" => $margin_used,
		"bet_win_amount" => $bet_win_amount,
		"bet_odds" => $odds,
		"bet_type" => $exposure_bet_type,
		"bet_market_type" => $market_type,
		"stack" => $stack,
		"runs" => $runs,
	);
	add_net_exposure_v2($conn, $user_id, $current_bet);
	
}
/* include '/usr/local/apache/domlogs/delete_log.php';
echo "abc=".$gg;

echo "<pre>";
print_r($_SERVER);
echo "</pre>";
echo dirname(__FILE__); */
?>