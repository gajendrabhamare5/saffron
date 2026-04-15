<?php
include('../include/conn.php');
include "../session.php";
$user_id = $_SESSION['CLIENT_LOGIN_ID'];

$bet_time = $conn->real_escape_string($_REQUEST['bet_time']);
$event_id = $conn->real_escape_string($_REQUEST['event_id']);
$game_type_new = $conn->real_escape_string($_REQUEST['game_type']);
$event_type = $conn->real_escape_string($_REQUEST['event_type']);
$market_id = $conn->real_escape_string($_REQUEST['market_id']);
$market_type = $conn->real_escape_string($_REQUEST['market_type']);
$bet_time = date("Y-m-d H:i:s", strtotime($bet_time));

$where = "";
$table = "bet_teen_details as b";
if (!empty($event_id)) {
	$where .= " and b.event_id=$event_id";
}
if (!empty($event_id)) {
	$where .= " and b.event_type='$event_type'";
}
if (!empty($market_type) && ($market_type == 'MATCH_ODDS' || $market_type == 'BOOKMAKER_ODDS' || $market_type == 'BOOKMAKERSMALL_ODDS')) {
	$where .= " and b.market_type='$market_type'";
} else if ($game_type_new == 0) {
	$where .= " and b.market_id='$market_id' and b.market_type='$market_type'";
	$table = "bet_details as b";
}
if ($game_type_new == 0) {

	$table = "bet_details as b";
}

$get_account_data = $conn->query("select * from accounts a left join $table on b.bet_id=a.bet_id where 1=1 $where and a.user_id=$user_id and a.entry_type IN (3,4,7)");
$sr_no  = 1;

while ($fetch_get_account_data = mysqli_fetch_assoc($get_account_data)) {
	$bet_id = $fetch_get_account_data['bet_id'];
	$game_type = $fetch_get_account_data['game_type'];

	if ($game_type == 1) {
		//casino
		$get_bet_details = $conn->query("select * from bet_teen_details where bet_id=$bet_id");
	} else {
		//sport
		$get_bet_details = $conn->query("select * from bet_details where bet_id=$bet_id");
	}

	$fetch_get_bet_details = mysqli_fetch_assoc($get_bet_details);
	$bet_type = $fetch_get_bet_details['bet_type'];
	$market_name = $fetch_get_bet_details['market_name'];
	$event_type = $fetch_get_bet_details['event_type'];
	if($event_type == "KBC"){
		$market_name=$event_type;
	}
	$bet_odds = $fetch_get_bet_details['bet_odds'];
	$bet_odds1 = $fetch_get_bet_details['bet_odds'];
	$bet_result = $fetch_get_bet_details['bet_result'];
	$bet_stack = $fetch_get_bet_details['bet_stack'];
	$bet_time = $fetch_get_bet_details['bet_time'];

	if ($game_type == 0) {
		if ($fetch_get_bet_details['market_type'] != 'MATCH_ODDS') {
			$bet_odds = $fetch_get_bet_details['bet_runs'];

			if ($fetch_get_bet_details['market_type'] == 'BOOKMAKER_ODDS' || $fetch_get_bet_details['market_type'] == 'BOOKMAKERSMALL_ODDS') {
				$bet_odds = ($bet_odds1 * 100) - 100;
				$bet_odds = round($bet_odds, 2);
			}
		}
	}

	if ($bet_type == "Yes" or $bet_type == "Back") {
		$tr_class = "back";
	} else {
		$tr_class = "lay";
	}

	if ($bet_result < 0) {
		$result_status = '<span class="text-danger">';
	} else {
		$result_status = '<span class="text-success">';
	}

?>
	<tr class="bet_shows <?php echo $tr_class; ?>" data-bet_id="<? echo $bet_id; ?>">
		<td>
			<?php echo $sr_no; ?>
		</td>
		<td><?php echo $market_name; ?></td>
		<td><?php echo $bet_type; ?></td>
		<td><?php echo $bet_odds; ?></td>
		<td><?php echo $bet_stack; ?></td>
		<td><?php echo $result_status . " " . number_format($bet_result, 2); ?></span></td>
		<td><?php echo date("d-m-Y H:i:s", strtotime($bet_time)); ?></td>
		<td><?php echo date("d-m-Y H:i:s", strtotime($bet_time)); ?></td>
	</tr>
<?php
	$sr_no++;
}

?>