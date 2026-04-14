<?php
include "include/conn.php";

/*
date_default_timezone_set('Asia/Kolkata');
$old_DB_host = "localhost";

$old_DB_user = "11starex_ashish";
$old_DB_pass = "Ashish@@321.."; 
$old_DB_name = "11starex_ashish";
$old_conn = new MySQLi($old_DB_host, $old_DB_user, $old_DB_pass, $old_DB_name); */
ini_set('memory_limit', '-1');
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

$monthAgoDate = date("Y-m-d", strtotime("-31 days"));
/* $monthAgoDate = date('Y-m-d', strtotime('last Sunday', strtotime($monthAgoDate))); */
/* $entryDate = date("Y-m-d 00:00:00",  strtotime("-4 months +1 days"));
$entryDate = date("Y-m-d 00:00:00", strtotime('last Sunday', strtotime($entryDate)));
$entryDate = date("Y-m-d 00:00:00",  strtotime("+1 days", strtotime($entryDate))); */
$entryDate = $monthAgoDate;
echo $monthAgoDate . "<br>";
echo $entryDate . "<br>";
$transaction_time = strtotime($entryDate);

echo "hii";
exit();



$limit = 0;
if (isset($_REQUEST['limit']))
	$limit = intVal($conn->real_escape_string($_REQUEST['limit']));


$account_array = array();

$account_sum = $conn->query("SELECT SUM(`amount`) as total_balance,user_id,entry_type,type FROM `accounts2` WHERE date(`account_date_time`) < '$monthAgoDate' GROUP BY user_id,entry_type");
$i = 0;
while ($account_data = mysqli_fetch_assoc($account_sum)) {
	/* if($i<10){ */
	$acc_user_id = $account_data['user_id'];
	$acc_entry_type = $account_data['entry_type'];
	$account_array[$acc_user_id][$acc_entry_type] = $account_data;
	$i++;
	/* } */
}

$res_user_master = $conn->query("SELECT Id,Name FROM `user_master` ORDER BY `Id` asc");


$entryTypeArr = array(1 => 'Deposit', 2 => 'Withdraw', 3 => 'Bet', 4 => 'Win', 5 => 'Generated', 6 => 'Unmatchedbet', 7 => 'Loss', 8 => 'Settelment', 9 => 'Commisionpaid', 10 => 'Comm Win', 11 => 'Comm Settelment');

$counter = 0;
$all_users_delete = array();
while ($user_master_data = mysqli_fetch_assoc($res_user_master)) {

	$user_id_ = $user_master_data['Id'];


	if (isset($account_array) && isset($account_array[$user_id_])) {

		foreach ($account_array[$user_id_] as $key => $val) {
			$user_id = $val['user_id'];
			$all_users_delete[] = $user_id;
			$opp_user_id = 0;
			$entry_type = $val['entry_type'];
			$account_description = $entryTypeArr[$entry_type] . ' Query forwarding ' . $entryDate;
			$bet_id = 0;
			$event_id = 0;
			$game_type = 0;
			$amount = $val['total_balance'];
			$type = $val['type'];
			$account_date_time = $entryDate;
			$status = 1;
			$remark = $entryTypeArr[$entry_type] . ' Query forwarding';
			$transaction_id = ($transaction_time . '-' . $val['user_id'] . '-' . $val['entry_type']);

			$query = "INSERT INTO accounts2 (user_id,opp_user_id,account_description,bet_id,event_id,game_type,amount,type,entry_type,account_date_time,status,remark,transaction_id,query_forwarding) VALUES ($user_id,$opp_user_id,'$account_description',$bet_id,$event_id,$game_type,$amount,'$type',$entry_type,'$account_date_time',$status,'$remark','$transaction_id','1')";
			$conn->query($query);

			/* $delete_query = "DELETE FROM `accounts2` WHERE `entry_type` = $entry_type AND `user_id` = $user_id AND account_date_time < '$monthAgoDate 00:00:00'";
			$conn->query($delete_query); */


		}


	}


	$counter++;
}
if (count($all_users_delete) > 0) {
	$deleted_users1 = array_unique($all_users_delete);
	$deleted_users = implode(",", $deleted_users1);
	$delete_query = "DELETE FROM `accounts2` WHERE date(account_date_time) < '$monthAgoDate' and user_id in ($deleted_users)";
	$conn->query($delete_query);
}
echo "$counter user sync successfully.";

?>