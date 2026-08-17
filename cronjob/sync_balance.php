<?php

include('../include/conn.php');
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

$yesterday_date = date("Y-m-d", strtotime("-7 days"));

// $limit = 0;
// if(isset($_REQUEST['limit']))
// 	$limit = intVal($conn->real_escape_string($_REQUEST['limit']));
// 
// $res_user_master = $conn->query("SELECT Id,sync_account_id,total_balace FROM `user_master` LIMIT $limit,100");

$res_user_master = $conn->query("SELECT Id,sync_account_id,total_balace FROM `user_master`");

$counter = 0;
while($user_master_data = mysqli_fetch_assoc($res_user_master)){
	
	$user_id = $user_master_data['Id'];
	
	$sql = "
		SELECT 
			MAX(`account_id`) as max_account_id, 
			SUM(`amount`) as total_balance,
			CASE WHEN (entry_type IN (1,2,5)) THEN
				'DP_WD'
			WHEN (entry_type NOT IN (1,2,5)) THEN
				'PL'
			END as baltype
		FROM `accounts` 
		WHERE `account_date_time` < '$yesterday_date 00:00:00' AND `user_id` = $user_id
		GROUP BY baltype
		";
		
	$balances_data = $conn->query($sql);
	
	$total_balance = $total_deposit_withdraw = $total_profit_loss = 0;
	$sync_account_ids = array(0);
	while($balance_data = mysqli_fetch_assoc($balances_data)){
	
		$total_balance += $balance_data['total_balance'];
		if($balance_data['baltype'] == 'DP_WD')
			$total_deposit_withdraw = $balance_data['total_balance'];
		if($balance_data['baltype'] == 'PL')
			$total_profit_loss = $balance_data['total_balance'];
		
		$sync_account_ids[] = $balance_data['max_account_id'];
	}
	
	$sync_account_id = max($sync_account_ids);
	
	$conn->query("UPDATE `user_master` SET total_balace = $total_balance, total_deposit_withdraw = $total_deposit_withdraw, total_profit_loss = $total_profit_loss, sync_account_id = '$sync_account_id'  WHERE Id = $user_id");
	
	$counter++;
}

echo "$counter user sync successfully.";

?>