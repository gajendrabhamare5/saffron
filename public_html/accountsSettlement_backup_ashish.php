<?php
exit();
include "include/conn.php";

/* $DB_host = "localhost";
$DB_user = "11starex_ashish"; 
$DB_pass = "Ashish@@321..";
$DB_name = "11starex_ashish";

$conn = new MySQLi($DB_host, $DB_user, $DB_pass, $DB_name); */
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
ini_set('memory_limit', '-1');
ini_set('max_execution_time', '300000');

$monthAgoDate = date("Y-m-d", strtotime("-30 days"));

$entryDate = date("Y-m-d 00:00:00", strtotime("-31 days"));
$transaction_time = strtotime($entryDate);

$limit = 0;
if (isset($_REQUEST['limit']))
	$limit = intVal($conn->real_escape_string($_REQUEST['limit']));

/* $old_data_query=$conn->query("select * from `accounts` WHERE  account_date_time < '$monthAgoDate 00:00:00' and query_forwarding=0"); 
$valuess_array=array();

while($old_data=mysqli_fetch_assoc($old_data_query))
{
$columns = implode(", ",array_keys($old_data));
$escaped_values = array_map(array($conn, 'real_escape_string'), array_values($old_data));
$values  = implode("', '", $escaped_values);
$valuess_array[]=$values;

}
$new_array=array_chunk($valuess_array,980);	
$count=count($new_array);
for($j=0;$j<$count;$j++)
{

$values1=$new_array[$j];
$sql="INSERT INTO `accounts_backup`($columns) VALUES ";
$ccc=count($values1);
foreach($values1 as $key=>$val)
{

$sql.="('$val')";
if($key < ($ccc - 1))
{
$sql.=",";
}
}
echo $sql."<br>\n";
$conn->query($sql);

} */
$res_user_master = $conn->query("SELECT Id FROM `user_master` ORDER BY `power` DESC");

$entryTypeArr = array(1 => 'Deposit', 2 => 'Withdraw', 3 => 'Bet', 4 => 'Win', 5 => 'Generated', 6 => 'Unmatchedbet', 7 => 'Loss', 8 => 'Settelment', 9 => 'Commisionpaid', 10 => 'Comm Win', 11 => 'Comm Settelment');

$counter = 0;
while ($user_master_data = mysqli_fetch_assoc($res_user_master)) {

	$user_id_ = $user_master_data['Id'];

	$sql = "
SELECT 
*,SUM(`amount`) as total_balance
FROM `accounts` 
WHERE `account_date_time` < '$monthAgoDate 00:00:00' AND `user_id` = $user_id_
GROUP BY entry_type
";

	$accounts_data = $conn->query($sql);

	while ($account_data = mysqli_fetch_assoc($accounts_data)) {

		$user_id = $account_data['user_id'];
		$opp_user_id = 0;
		$entry_type = $account_data['entry_type'];
		$account_description = $entryTypeArr[$entry_type] . ' Query forwarding ' . $entryDate;
		$bet_id = 0;
		$event_id = 0;
		$game_type = 0;
		$amount = $account_data['total_balance'];
		$type = $account_data['type'];
		$account_date_time = $entryDate;
		$status = 1;
		$remark = $entryTypeArr[$entry_type] . ' Query forwarding';
		$transaction_id = ($transaction_time . '-' . $account_data['user_id'] . '-' . $account_data['entry_type']);

		$query = "INSERT INTO accounts 
(user_id,opp_user_id,account_description,bet_id,event_id,game_type,amount,type,entry_type,account_date_time,status,remark,transaction_id,query_forwarding)
VALUES ($user_id,$opp_user_id,'$account_description',$bet_id,$event_id,$game_type,$amount,'$type',$entry_type,'$account_date_time',$status,'$remark','$transaction_id','1')";

		$conn->query($query);

		$delete_query = "DELETE FROM `accounts` WHERE `account_description` NOT LIKE '$account_description' AND `entry_type` = $entry_type AND `user_id` = $user_id AND account_date_time < '$monthAgoDate 00:00:00'";
		$conn->query($delete_query);
	}

	$counter++;
}

echo "$counter user sync successfully.";