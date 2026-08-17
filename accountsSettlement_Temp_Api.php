<?php
include("include/conn.php");

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

$monthAgoDate = date("Y-m-d", strtotime("-20 days"));
$entryDate = date("Y-m-d 00:00:00", strtotime("-21 days"));
$entryDate = date("Y-m-d H:i:s");

$transaction_time = strtotime($entryDate);


$limit = 0;
if(isset($_REQUEST['limit']))
	$limit = intVal($conn->real_escape_string($_REQUEST['limit']));

$res_user_master = $conn->query("SELECT Id FROM `user_master` ORDER BY `power` DESC");


$entryTypeArr = array(1 => 'Deposit', 2 => 'Withdraw', 3 => 'Bet', 4 => 'Win', 5 => 'Generated', 6 => 'Unmatchedbet', 7 => 'Loss', 8 => 'Settelment', 9 => 'Commisionpaid', 10 => 'Comm Win', 11 => 'Comm Settelment');

$counter = 0;
while($user_master_data = mysqli_fetch_assoc($res_user_master)){
	
	$user_id_ = $user_master_data['Id'];
	
	$sql = "
		SELECT 
			*,SUM(`amount`) as total_balance
		FROM `accounts` 
		WHERE 1=1 AND `user_id` = $user_id_
		GROUP BY entry_type
		";
		
	$accounts_data = $conn->query($sql);

	while($account_data = mysqli_fetch_assoc($accounts_data)){

		$user_id = $account_data['user_id'];
		$opp_user_id = 0;
		$entry_type = $account_data['entry_type'];
		$account_description = $entryTypeArr[$entry_type] . ' Query forwarding '.$entryDate;
		$bet_id = 0;
		$event_id = 0;
		$game_type = 0;
		$amount = $account_data['total_balance'];
		$type = $account_data['type'];
		$account_date_time = $entryDate;
		$status = 1;
		$remark = $entryTypeArr[$entry_type] .' Query forwarding';
		$transaction_id = ($transaction_time.'-'.$account_data['user_id'].'-'.$account_data['entry_type']);


		echo $query = "INSERT INTO 	accounts_temp 
						(user_id,opp_user_id,account_description,bet_id,event_id,game_type,amount,type,entry_type,account_date_time,status,remark,transaction_id)
					VALUES ($user_id,$opp_user_id,'$account_description',$bet_id,$event_id,$game_type,$amount,'$type',$entry_type,'$account_date_time',$status,'$remark','$transaction_id')";
		
		$conn->query($query);
		echo "<br>";
		
	
	}

	$counter++;
}

echo "$counter user sync successfully.";

?>