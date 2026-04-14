<?php
include "include/conn.php";
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

$monthAgoDate = date("Y-m-d", strtotime("-2 days"));
$entryDate = date("Y-m-d 00:00:00", strtotime("-3 days"));
$entryDateChk = date("Y-m-d", strtotime("-3 days"));

$conn->query("delete from accounts_temp where DATE(account_date_time) <= '$entryDateChk'");
$conn->query("INSERT INTO accounts_temp (
    user_id,
    opp_user_id,
    entry_by,
    account_description,
    bet_id,
    event_id,
    game_type,
    amount,
    type,
    entry_type,
    account_date_time,
    status,
    remark,
    transaction_id,
    auto_pool
)
SELECT 
    user_id,
    '0' AS opp_user_id,
    '0' AS entry_by,
    CONCAT(
        CASE entry_type
            WHEN 1 THEN 'Deposit'
            WHEN 2 THEN 'Withdraw'
            WHEN 3 THEN 'Bet'
            WHEN 4 THEN 'Win'
            WHEN 5 THEN 'Generated'
            WHEN 6 THEN 'Unmatchedbet'
            WHEN 7 THEN 'Loss'
            WHEN 8 THEN 'Settelment'
            WHEN 9 THEN 'Commisionpaid'
            WHEN 10 THEN 'Comm Win'
            WHEN 11 THEN 'Comm Settelment'
            ELSE CONCAT('Unknown (', entry_type, ')')
        END,
        ' Query forwarding $entryDate'
    ) AS account_description,
    '0' AS bet_id,
    '0' AS event_id,
    '0' AS game_type,
    SUM(amount) AS amount,
    type,
    entry_type,
    '$entryDate' AS account_date_time,
    '1' AS status,
    CONCAT(
        CASE entry_type
            WHEN 1 THEN 'Deposit'
            WHEN 2 THEN 'Withdraw'
            WHEN 3 THEN 'Bet'
            WHEN 4 THEN 'Win'
            WHEN 5 THEN 'Generated'
            WHEN 6 THEN 'Unmatchedbet'
            WHEN 7 THEN 'Loss'
            WHEN 8 THEN 'Settelment'
            WHEN 9 THEN 'Commisionpaid'
            WHEN 10 THEN 'Comm Win'
            WHEN 11 THEN 'Comm Settelment'
            ELSE CONCAT('Unknown (', entry_type, ')')
        END,
        ' Query forwarding'
    ) AS remark,
    CONCAT(UNIX_TIMESTAMP('$entryDate'), '-', user_id, '-', entry_type) AS transaction_id,
    auto_pool
FROM 
    accounts
WHERE 
    DATE(account_date_time) <= '$entryDateChk'
GROUP BY 
    user_id, entry_type, type");

/* $transaction_time = strtotime($entryDate);


$limit = 0;
if(isset($_REQUEST['limit']))
	$limit = intVal($conn->real_escape_string($_REQUEST['limit']));


	$account_array=array();

	$account_sum=$conn->query("SELECT SUM(`amount`) as total_balance,user_id,entry_type,type FROM `accounts_temp` WHERE `account_date_time` < '$monthAgoDate 00:00:00' GROUP BY user_id,entry_type");
	$i=0;
	while($account_data=mysqli_fetch_assoc($account_sum)){
		$acc_user_id=$account_data['user_id'];
		$acc_entry_type=$account_data['entry_type'];
		$account_array[$acc_user_id][$acc_entry_type]=$account_data;
		$i++;
	}

$res_user_master = $conn->query("SELECT Id FROM `user_master` ORDER BY `power` DESC");


$entryTypeArr = array(1 => 'Deposit', 2 => 'Withdraw', 3 => 'Bet', 4 => 'Win', 5 => 'Generated', 6 => 'Unmatchedbet', 7 => 'Loss', 8 => 'Settelment', 9 => 'Commisionpaid', 10 => 'Comm Win', 11 => 'Comm Settelment');

$counter = 0;
while($user_master_data = mysqli_fetch_assoc($res_user_master)){

	$user_id_ = $user_master_data['Id'];


		if(isset($account_array) && isset($account_array[$user_id_])){

			foreach($account_array[$user_id_] as $key=>$val){
				$user_id = $val['user_id'];
				$opp_user_id = 0;
				$entry_type = $val['entry_type'];
				$account_description = $entryTypeArr[$entry_type] . ' Query forwarding '.$entryDate;
				$bet_id = 0;
				$event_id = 0;
				$game_type = 0;
				$amount = $val['total_balance'];
				$type = $val['type'];
				$account_date_time = $entryDate;
				$status = 1;
				$remark = $entryTypeArr[$entry_type] .' Query forwarding';
				$transaction_id = ($transaction_time.'-'.$val['user_id'].'-'.$val['entry_type']);

				$query = "INSERT INTO accounts_temp 
							(user_id,opp_user_id,account_description,bet_id,event_id,game_type,amount,type,entry_type,account_date_time,status,remark,transaction_id)
						VALUES ($user_id,$opp_user_id,'$account_description',$bet_id,$event_id,$game_type,$amount,'$type',$entry_type,'$account_date_time',$status,'$remark','$transaction_id')";

				$conn->query($query);
				$delete_query = "DELETE FROM `accounts_temp` WHERE `account_description` NOT LIKE '$account_description' AND `entry_type` = $entry_type AND `user_id` = $user_id AND account_date_time < '$monthAgoDate 00:00:00'";
				$conn->query($delete_query);
			}


		}
	$counter++;
} */

echo "$counter user sync successfully.";

?>