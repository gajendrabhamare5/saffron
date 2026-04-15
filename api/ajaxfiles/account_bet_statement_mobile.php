<?php
include('../include/conn.php');
include "../session.php";
$user_id = $_SESSION['CLIENT_LOGIN_ID'];

$bet_time = $conn->real_escape_string($_REQUEST['bet_time']);
$bet_time = date("Y-m-d H:i:s",strtotime($bet_time));
$get_account_data = $conn->query("select * from accounts where account_date_time='$bet_time' and user_id=$user_id and entry_type IN (3,4,7)");
$sr_no  =1 ;

while($fetch_get_account_data = mysqli_fetch_assoc($get_account_data)){
	$bet_id = $fetch_get_account_data['bet_id'];
	$game_type = $fetch_get_account_data['game_type'];
	
	if($game_type == 1){
		//casino
		$get_bet_details = $conn->query("select * from bet_teen_details where bet_id=$bet_id");
	}else{
		//sport
		$get_bet_details = $conn->query("select * from bet_details where bet_id=$bet_id");
	}
	
	$fetch_get_bet_details = mysqli_fetch_assoc($get_bet_details);
	$bet_type = $fetch_get_bet_details['bet_type'];
	$market_name = $fetch_get_bet_details['market_name'];
	$bet_odds = $fetch_get_bet_details['bet_odds'];
	$bet_odds1 = $fetch_get_bet_details['bet_odds'];
	$bet_result = $fetch_get_bet_details['bet_result'];
	$bet_stack = $fetch_get_bet_details['bet_stack'];
	$bet_time = $fetch_get_bet_details['bet_time'];
        
        if($game_type == 0){
            
			if($fetch_get_bet_details['market_type'] != 'MATCH_ODDS'){
				$bet_odds = $fetch_get_bet_details['bet_runs'];
				
				if($fetch_get_bet_details['market_type'] == 'BOOKMAKER_ODDS' || $fetch_get_bet_details['market_type'] == 'BOOKMAKERSMALL_ODDS'){
					$bet_odds = ($bet_odds1 * 100) -100;
					$bet_odds = round($bet_odds,2);
				}
				
			}
			
			
        }
        
	if($bet_type == "Yes" or $bet_type == "Back"){
		$tr_class = "back";
	}else{
		$tr_class = "lay";
	}
	
	if($bet_result < 0){
		$result_status = '<span class="text-danger">';
	}else{
		$result_status = '<span class="text-success">';
	}
?>
	
	<div class="account-statement <?php echo $tr_class; ?>">
			<div class="row row5">
				<div class="col-6">
					<div><b>Nation: </b><?php echo $market_name; ?></div>
					<div><b>Placed Date: </b><?php echo date("d-m-Y H:i:s",strtotime($bet_time)); ?></div>
					<div><b>Matched Date: </b><?php echo date("d-m-Y H:i:s",strtotime($bet_time)); ?></div>
				</div>
				<div class="col-2 text-right">
					<div><b>Rate</b></div>
					<div><?php echo $bet_odds; ?></div>
				</div>
				<div class="col-2 text-right">
					<div><b>Amount</b></div>
					<div><?php echo $bet_stack; ?></div>
				</div>
				<div class="col-2 text-right">
					<div><b>W&amp;L</b></div>
					<?php echo $result_status . " ".number_format($bet_result,2); ?></span>
				</div>
			</div>
		</div>
<?php
$sr_no++;
}

?>