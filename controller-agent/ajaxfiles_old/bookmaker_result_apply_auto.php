<?php

include "../../include/conn.php";
include('../../include/level_percentage.php');


$user_id = 1;
$login_type = 5;


$entry_transaction_time = date("d-m-Y H:i:s"); 
$event_id = $_REQUEST['event_id'];
$result_market_id = $_REQUEST['market_id'];
$match_odds_result = $_REQUEST['match_odds_result'];
$market_type = $_REQUEST['market_type'];
if ($market_type == "bookmakersmall" || $market_type == "BOOKMAKERSMALL_ODDS") {
    $market_type_search = 'BOOKMAKERSMALL_ODDS';
    $market_type = 'BOOKMAKERSMALL_ODDS';
    $market_type_search = 'BOOKMAKERSMALL_ODDS';
} else {
    $market_type_search = 'BOOKMAKER_ODDS';
    $market_type = 'BOOKMAKER_ODDS';
    $market_type_search = 'BOOKMAKER_ODDS';
}


$ip_address = '';
if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
    $ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
} else {
    $ip_address = gethostbyaddr($_SERVER['REMOTE_ADDR']);
}

$user_agent = $_SERVER['HTTP_USER_AGENT'];

if ($match_odds_result == "Win") {
    $status = 2;
} else {
    $status = 3;
}

$condition = "";
$condition1 = "";
if (isset($_REQUEST['oddsmarketId'])) {
    $oddsmarketId = $_REQUEST['oddsmarketId'];
    $condition = " oddsmarketId='$oddsmarketId' and ";
    $condition1 = " b.oddsmarketId='$oddsmarketId' and ";
}

/* $get_market_data = $conn->query("select * from bet_details where $condition event_id='$event_id' and market_id=$result_market_id LIMIT 1");
$fetch_get_market_data = mysqli_fetch_assoc($get_market_data);
$runnerName = $fetch_get_market_data['market_name']; */

$get_market_data = $conn->query("select market_name,group_concat(user_id) all_users from bet_details where $condition event_id='$event_id' and market_type='$market_type_search' LIMIT 1");
$fetch_get_market_data = mysqli_fetch_assoc($get_market_data);
$runnerName = $fetch_get_market_data['market_name'];
$all_users = $fetch_get_market_data['all_users'];

$user_list = array();
$get_parent_ids = $conn->query("select Id,Email_ID,parentDL,parentMDL,parentSuperMDL,parentKingAdmin,my_percentage from user_master");
while ($fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids)) {
    $UserID = $fetch_parent_ids['Id'];
    /* $user_Email_ID = $fetch_parent_ids['Email_ID'];
    $parentDL = $fetch_parent_ids['parentDL'];
    $parentMDL = $fetch_parent_ids['parentMDL'];
    $parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];
    $parentKingAdmin = $fetch_parent_ids['parentKingAdmin'];
    $my_percentage = $fetch_parent_ids['my_percentage']; */
    $user_list[$UserID] = $fetch_parent_ids;
}

$datetime = date("Y-m-d H:i:s");
$query2 = "INSERT INTO `result_match_odds` (`eventId`,`selectionId`,`runnerName`,`status`,`datetime`,`added_by`,`ip_address`,`user_agent`,`is_bookmaker`) VALUES ($event_id,$result_market_id,'$runnerName',$status,'$datetime','$user_id','$ip_address','$user_agent','1')";
$insert = $conn->query($query2);

$conn->query("insert into result_summery_logs set `eventId`='$event_id',`selectionId`='$result_market_id',`runnerName`='$runnerName',`status`='$status',`datetime`='$datetime',`added_by`='$user_id',`ip_address`='$ip_address',`user_agent`='$user_agent',`is_bookmaker`='1'");

if ($match_odds_result == "Win") {
    //    $bet_type = "Back";
    $bet_type_2 = "Lay";
    $result_status = 0;
    $result_status2 = 2;
} else if ($match_odds_result == "Loss") {
    //    $bet_type = "Lay";
    $bet_type_2 = "Back";
    $result_status = 1;
    $result_status2 = 3;
} else {
    $conn->query("delete from unmatched_bet_details where event_id='$event_id'");
    $delete_bet_details = $conn->query("update bet_details set bet_status=2 where $condition event_id='$event_id' and market_type='$market_type_search'");
    $delete_exposure = $conn->query("delete from exposure_details where event_id='$event_id' and market_type='$market_type_search'");
    $return_array = array(
        "status" => 'ok',
        "message" => 'Bet Cancelled',
    );
    echo json_encode($return_array);
    exit();
}
$transaction_time = date("Y-m-d H:i:s");
$entry_transaction_time = date("d-m-Y H:i:s");
$teams = [];
$res = $conn->query("
    SELECT DISTINCT market_id, market_name
    FROM event_market_id
    WHERE event_id='$event_id'
    AND market_type='$market_type_search'
");
while ($r = $res->fetch_assoc()) {
    $teams[$r['market_id']] = $r['market_name'];
}

$user_level_cache = [];
$exposure_cache = [];
$accounts_inserts = [];
$accounts_temp_inserts = [];
$chunkSize = 500;

$get_win_bet_details_1 = $conn->query("select * from bet_details where $condition event_id='$event_id' and market_type='$market_type_search' and bet_status=1");
    while ($fetch_get_win_bet_details_1 = mysqli_fetch_assoc($get_win_bet_details_1)) {

        //won entry
        $bet_id = $fetch_get_win_bet_details_1['bet_id'];
        $bet_odds = $fetch_get_win_bet_details_1['bet_odds'];
        $marketName = $fetch_get_win_bet_details_1['market_name'];
        $market_id = $fetch_get_win_bet_details_1['market_id'];
        $bet_type = $fetch_get_win_bet_details_1['bet_type'];
        $winner_name = $fetch_get_win_bet_details_1['winner_name'];
        $bet_user_id = $fetch_get_win_bet_details_1['user_id'];
    if (!isset($user_level_cache[$bet_user_id])) {
        $user_level_cache[$bet_user_id] = get_level_per_result_latest($conn, $bet_user_id, $user_list);
    }
    $result_status = "Loss";
    if ($match_odds_result == 'Win') {

        if ($market_id == $result_market_id) {
            $result_status = ($bet_type == 'Back') ? 'Win' : 'Loss';
        } else {
            $result_status = ($bet_type == 'Lay') ? 'Win' : 'Loss';
        }
    } else { // match_odds_result == Loss

        if ($result_market_id == $market_id) {
            $result_status = ($bet_type == 'Back') ? 'Loss' : 'Win';
        } else {
            continue; // same behavior as your original code
        }
    }
    set_result($conn, $bet_id, $result_status, $fetch_get_win_bet_details_1, $user_level_cache[$bet_user_id], $accounts_inserts, $accounts_temp_inserts,$transaction_time,$entry_transaction_time);    

}

    $winner_name_db = '';
if ($match_odds_result === 'Win') {
    $winner_name_db = isset($teams[$result_market_id]) ? $teams[$result_market_id] : '';
} else {
    foreach ($teams as $mid => $name) {
        if ($mid != $result_market_id) {
            $winner_name_db = $name;
            break;
        }
    }
}
if (!empty($winner_name_db)) {
    $conn->query("UPDATE `bet_details` SET `winner_name`='$winner_name_db' WHERE event_id='$event_id' and `market_type` in ('BOOKMAKER_ODDS','BOOKMAKERSMALL_ODDS')");
}
$conn->query("
    UPDATE bet_details
    SET
        bet_status = 0,
        bet_result_time = '$datetime',
        bet_result = CASE
            WHEN (
                ('$match_odds_result' = 'Win' AND market_id = '$result_market_id' AND bet_type = 'Back')
             OR ('$match_odds_result' = 'Win' AND market_id != '$result_market_id' AND bet_type = 'Lay')
             OR ('$match_odds_result' = 'Loss' AND market_id = '$result_market_id' AND bet_type = 'Lay')
            )
            THEN bet_win_amount
            ELSE -bet_margin_used
        END
    WHERE $condition
      event_id = '$event_id'
      AND market_type = '$market_type_search'
      AND bet_status = 1
");

if (!empty($accounts_inserts)) {
    foreach (array_chunk($accounts_inserts, $chunkSize) as $chunk) {
        $sql = "INSERT INTO accounts 
            (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) 
            VALUES " . implode(',', $chunk);
        $conn->query($sql);
    }
}
if (!empty($accounts_temp_inserts)) {
    foreach (array_chunk($accounts_temp_inserts, $chunkSize) as $chunk) {
        $sql = "INSERT INTO accounts_temp 
            (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) 
            VALUES " . implode(',', $chunk);
        $conn->query($sql);
    }
}

$conn->query("
        DELETE FROM exposure_details
        WHERE event_id = '$event_id'
        AND market_type = '$market_type_search'
    ");


    $return_array = array(
        "status" => "ok",
        "message" => "Result Done",
    );
    echo json_encode($return_array);
    
    
function set_result($conn, $bet_id, $result_status, $fetch_bet_details, $level_pers, &$accounts_inserts, &$accounts_temp_inserts,$transaction_time,$entry_transaction_time)
{

    /* $get_bet_details = $conn->query("select * from bet_details where bet_id=$bet_id and bet_status=1");
    $fetch_bet_details = mysqli_fetch_assoc($get_bet_details); */
    $bet_user_id = $fetch_bet_details['user_id'];
    $event_name = $fetch_bet_details['event_name'];
    $market_name = $fetch_bet_details['market_name'];
    $market_type = $fetch_bet_details['market_type'];
    $bet_type = $fetch_bet_details['bet_type'];
    $bet_runs = $fetch_bet_details['bet_runs'];
    $bet_odds = $fetch_bet_details['bet_odds'];
    $bet_stack = $fetch_bet_details['bet_stack'];
    $bet_margin_used = $fetch_bet_details['bet_margin_used'];
    $bet_win_amount = $fetch_bet_details['bet_win_amount'];
    
     $winner_name = $fetch_bet_details['winner_name'];
    $event_id = $fetch_bet_details['event_id'];
    $market_id = $fetch_bet_details['market_id'];
    /* if($result_status == 'Win'){
        global $result_market_id;
        if ($market_id == $result_market_id && $bet_type == "Back" && $winner_name != $market_name) {
            $winner_name="";
        }
        if(empty($winner_name)){
            $conn->query("UPDATE `bet_details` SET `winner_name`='$market_name' WHERE event_id='$event_id' and `market_type` in ('BOOKMAKER_ODDS','BOOKMAKERSMALL_ODDS')");
        }
    }else{
        
         if(empty($winner_name)){
            $expname = explode(' v ', $event_name);
            $result = array_values(array_diff($expname, [$market_name]));
            $market_name1 = $result[0];
            if ($market_id == $result_market_id && $bet_type == "Lay") {
                $market_name1=$market_name;
            }
            $conn->query("UPDATE `bet_details` SET `winner_name`='$market_name1' WHERE event_id='$event_id' and `market_type` in ('BOOKMAKER_ODDS','BOOKMAKERSMALL_ODDS')");
        }
    } */

    /* $get_parent_ids = $conn->query("select * from user_login_master where UserID=$bet_user_id");
    $fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
    $user_Email_ID = $fetch_parent_ids['Email_ID'];
    $parentDL = $fetch_parent_ids['parentDL'];
    $parentMDL = $fetch_parent_ids['parentMDL'];
    $parentSuperMDL = $fetch_parent_ids['parentSuperMDL']; */
    $eventId = $fetch_bet_details['event_id'];
    $marketId = $fetch_bet_details['market_id'];


    if ($result_status == 'Win') {
        $actual_win_amount = $bet_win_amount + $bet_margin_used;
        $actual_win_amount2 = $bet_win_amount;
        $user_amount = $actual_win_amount2;

        $smdl_amount = -$actual_win_amount2;
    } else if ($result_status == 'Loss') {
        $actual_loss_amount = $bet_margin_used;
        $user_amount = -$actual_loss_amount;

        $smdl_amount = $actual_loss_amount;
    } else {

        $delete_bet_details = $conn->query("update bet_details set bet_status=2 where user_id=$bet_user_id and bet_id=$bet_id");
        $delete_bet_details = $conn->query("delete from accounts where user_id=$bet_user_id and bet_id=$bet_id and game_type=0");
        $delete_bet_details = $conn->query("delete from accounts_temp where user_id=$bet_user_id and bet_id=$bet_id and game_type=0");
        $delete_exposure = $conn->query("delete from exposure_details where event_id='$eventId' and user_id=$bet_user_id and market_type='$market_type'");
        $return_array = array(
            "status" => 'ok',
            "message" => 'Bet Cancelled',
        );
        echo json_encode($return_array);
        exit();
    }

    if ($result_status == 'Win') {
        $transaction_id = 'sports-' . $bet_id . '-' . $bet_user_id;
        $account_description = "#Win BET ID $bet_id - $event_name -$market_name at $entry_transaction_time";
        if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $actual_win_amount2 != 0)){
			$accounts_inserts[] = "('$bet_user_id','0','$account_description','$bet_id','$actual_win_amount2','Credit','4','$transaction_time','1','$transaction_id')";
		}
		if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $actual_win_amount2 != 0))){ 
			$accounts_temp_inserts[] = "('$bet_user_id','0','$account_description','$bet_id','$actual_win_amount2','Credit','4','$transaction_time','1','$transaction_id')";
		}

        foreach ($level_pers as $debit_user_id => $level_per) {

            $debit_amt = 0 - (($actual_win_amount2 / 100) * $level_per);
            $transaction_id = 'sports-' . $bet_id . '-' . $debit_user_id;

            $account_descriptionSMDL = "#Loss BET ID $bet_id - $event_name -$market_name at $entry_transaction_time";
            if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $debit_amt != 0)){
				$accounts_inserts[] = "('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$debit_amt','Debit','7','$transaction_time','1','$transaction_id')";
			}
			if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $debit_amt != 0))){ 
				$accounts_temp_inserts[] = "('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$debit_amt','Debit','7','$transaction_time','1','$transaction_id')";
			}
        }
    } else if ($result_status == 'Loss') {
        $transaction_id = 'sports-' . $bet_id . '-' . $bet_user_id;
        $account_description = "#Loss BET ID $bet_id - $event_name -$market_name at $entry_transaction_time";
        if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $user_amount != 0)){
			$accounts_inserts[] = "('$bet_user_id','0','$account_description','$bet_id','$user_amount','Debit','7','$transaction_time','1','$transaction_id')";
		} 
		if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $user_amount != 0))){ 
			$accounts_temp_inserts[] = "('$bet_user_id','0','$account_description','$bet_id','$user_amount','Debit','7','$transaction_time','1','$transaction_id')";
		}

        foreach ($level_pers as $cradit_user_id => $level_per) {

            $cradit_amt = ($bet_margin_used / 100) * $level_per;
            $transaction_id = 'sports-' . $bet_id . '-' . $cradit_user_id;

            $account_descriptionSMDL = "#Win BET ID $bet_id - $event_name -$market_name at $entry_transaction_time";
            if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $cradit_amt != 0)){
				$accounts_inserts[] = "('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$cradit_amt','Credit','4','$transaction_time','1','$transaction_id')";
			}
			if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $cradit_amt != 0))){ 
				$accounts_temp_inserts[] = "('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$cradit_amt','Credit','4','$transaction_time','1','$transaction_id')";
			}
        }
    }
    return true;
}
