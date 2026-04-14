<?
include "../include/conn.php";
$demoIDD = LOGINDEMOID;
$today_date = date("Y-m-d");
$date_con=" and date(bet_time) >= '$today_date'";
$date_con="";
$fetch_all_bets = $conn->query("SELECT GROUP_CONCAT(bet_id) as all_bets FROM `bet_details` where bet_status in (0,2) $date_con and user_id='$demoIDD'");
$data_bets = mysqli_fetch_assoc($fetch_all_bets);
$all_bets = $data_bets['all_bets'];
if (!empty($all_bets)) {
    $conn->query("delete from accounts where bet_id in ($all_bets) and game_type='0'");
    $conn->query("delete from accounts_temp where bet_id in ($all_bets) and game_type='0'");
}

$fetch_all_casino_bets = $conn->query("SELECT GROUP_CONCAT(bet_id) as all_casino_bets FROM `bet_teen_details` where bet_status in (0,2) $date_con and user_id='$demoIDD'");
$data_casino_bets = mysqli_fetch_assoc($fetch_all_casino_bets);
$all_casino_bets = $data_casino_bets['all_casino_bets'];
if (!empty($all_casino_bets)) {
    $conn->query("delete from accounts where bet_id in ($all_casino_bets) and game_type='1'");
    $conn->query("delete from accounts_temp where bet_id in ($all_casino_bets) and game_type='1'");
    
}
$conn->query("delete from exposure_details where user_id='$demoIDD'");
$conn->query("update bet_details set bet_status=2 where user_id='$demoIDD' and bet_status in (0,1) $date_con");
$conn->query("update bet_teen_details set bet_status=2 where user_id='$demoIDD' and bet_status in (0,1) $date_con");
?>