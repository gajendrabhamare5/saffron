<?php

include('../include/conn.php');
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

$monthAgoDate = date("Y-m-d", strtotime("-30 days"));
$entryDate = date("Y-m-d 00:00:00", strtotime("-31 days"));

$transaction_time = strtotime($entryDate);


$limit = 0;
if(isset($_REQUEST['limit']))
	$limit = intVal($conn->real_escape_string($_REQUEST['limit']));

$res_user_master = $conn->query("SELECT Id FROM `user_master`");


///UPDATE `user_master` SET `total_balace` = 0, `total_deposit_withdraw` = 0, `total_profit_loss` = 0, `sync_account_id` = 0


$counter = 0;
while($user_master_data = mysqli_fetch_assoc($res_user_master)){
	
	$user_id = $user_master_data['Id'];
	
	$sql = "
		SELECT 
			*,SUM(`amount`) as total_balance
		FROM `accounts` 
		WHERE `account_date_time` < '$monthAgoDate 00:00:00' AND `user_id` = $user_id
		GROUP BY entry_type
		";
		
	$accounts_data = $conn->query($sql);
	
	while($account_data = mysqli_fetch_assoc($accounts_data)){
		
		$user_id = $account_data['user_id'];
		$opp_user_id = 0;
		$account_description = 'Query forwarding '.$entryDate;
		$bet_id = 0;
		$event_id = 0;
		$game_type = 0;
		$amount = $account_data['total_balance'];
		$type = $account_data['type'];
		$entry_type = $account_data['entry_type'];
		$account_date_time = $entryDate;
		$status = 1;
		$remark = 'Query forwarding';
		$transaction_id = ($transaction_time.'-'.$account_data['user_id'].'-'.$account_data['entry_type']);

		try {
			// First of all, let's begin a transaction
			$conn->begin_transaction();
	
			$query = "INSERT INTO accounts 
							(user_id,opp_user_id,account_description,bet_id,event_id,game_type,amount,type,entry_type,account_date_time,status,remark,transaction_id)
			 			VALUES ($user_id,$opp_user_id,'$account_description',$bet_id,$event_id,$game_type,$amount,'$type',$entry_type,'$account_date_time',$status,'$remark','$transaction_id')";
			//$conn->query($query);
			
			
			echo $delete_query = "DELETE FROM `accounts` WHERE `account_description` NOT LIKE '$account_description' AND `user_id` = $user_id AND account_date_time < '$monthAgoDate 00:00:00'";
	die;
			$conn->query($delete_query);
			
			// If we arrive here, it means that no exception was thrown
			// i.e. no query has failed, and we can commit the transaction
			$conn->commit();
		} catch (\Throwable $e) {
			// An exception has been thrown
			// We must rollback the transaction
			$conn->rollback();
			throw $e; // but the error must be handled anyway
		}
	}


	$counter++;
}

echo "$counter user sync successfully.";

?>