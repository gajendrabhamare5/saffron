<?php

include "../../include/conn.php";
include('../../include/level_percentage.php');
$per_list=array();
$user_id = 1;
$login_type = 5;
if ($login_type != 5) {
    header("Location: ../logout.php");
}
$entry_transaction_time = date("d-m-Y H:i:s");
$event_id = $_REQUEST['event_id'];
$market_id = $_REQUEST['market_id'];
$market_type = $_REQUEST['market_type'];
$match_odds_result = $_REQUEST['match_odds_result'];

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
exit();
$get_market_data = $conn->query("select * from bet_details where event_id='$event_id' and market_id=$market_id LIMIT 1");
$fetch_get_market_data = mysqli_fetch_assoc($get_market_data);
$runnerName = $fetch_get_market_data['market_name'];

$datetime = date("Y-m-d H:i:s");
$query2 = "INSERT INTO `result_match_odds` (`eventId`,`selectionId`,`runnerName`,`status`,`datetime`,`added_by`,`ip_address`,`user_agent`) VALUES ($event_id,$market_id,'$runnerName',$status,'$datetime','$user_id','$ip_address','$user_agent')";
$insert = $conn->query($query2);

$conn->query("insert into result_summery_logs set `eventId`='$event_id',`selectionId`='$market_id',`runnerName`='$runnerName',`status`='$status',`datetime`='$datetime',`added_by`='$user_id',`ip_address`='$ip_address',`user_agent`='$user_agent'");


if ($market_type == "Match Odds" or $market_type == "Toss Odds" or $market_type == "Tie Odds" or $market_type == "Other Odds") {



    if ($market_type == "Match Odds") {
        $market_type_search = "MATCH_ODDS";
    } else if ($market_type == "Toss Odds") {
        $market_type_search = "TOSS_ODDS";
    } else if ($market_type == "Tie Odds") {
        $market_type_search = "TIED_MATCH";
    } else if ($market_type == "Other Odds") {
        $get_market_type = $conn->query("select * from bet_details where event_id='$event_id' and market_id='$market_id' and market_type NOT IN ('MATCH_ODDS','TOSS_ODDS','TIED_MATCH','FANCY_ODDS','BOOKMAKER_ODDS','BOOKMAKERSMALL_ODDS')");
        $fetch_get_market_type = mysqli_fetch_assoc($get_market_type);
        $market_type_search = $fetch_get_market_type['market_type'];
    }



    if ($match_odds_result == "Win") {
        $bet_type = "Back";
        $bet_type_2 = "Lay";
        $result_status = 0;
        $result_status2 = 2;
    } else if ($match_odds_result == "Loss") {
        $bet_type = "Lay";
        $bet_type_2 = "Back";
        $result_status = 1;
        $result_status2 = 3;
    } else {
        $conn->query("delete from unmatched_bet_details where event_id='$event_id'");
        $delete_bet_details = $conn->query("update bet_details set bet_status=2 where event_id='$event_id' and market_type='$market_type_search'");
        $delete_exposure = $conn->query("delete from exposure_details where event_id='$event_id' and market_type='$market_type_search'");
        $return_array = array(
            "status" => 'ok',
            "message" => 'Bet Cancelled',
        );
        echo json_encode($return_array);
        exit();
    }


    if ($result_status == 0) {

        $get_win_bet_details_1 = $conn->query("select * from bet_details where event_id='$event_id' and market_id=$market_id and market_type='$market_type_search' and bet_type='$bet_type' and bet_status=1");
        while ($fetch_get_win_bet_details_1 = mysqli_fetch_assoc($get_win_bet_details_1)) {
            //won entry
            $bet_id = $fetch_get_win_bet_details_1['bet_id'];
            $bet_odds = $fetch_get_win_bet_details_1['bet_odds'];
             $winner_name = $fetch_get_win_bet_details_1['winner_name'];
              $market_type = $fetch_get_win_bet_details_1['market_type'];
              $marketName = $fetch_get_win_bet_details_1['market_name'];
            if ($bet_odds < 1) {
                $eventId = $fetch_get_win_bet_details_1['event_id'];
                $eventType = $fetch_get_win_bet_details_1['event_type'];
                $marketId = $fetch_get_win_bet_details_1['market_id'];
                $user_id = $fetch_get_win_bet_details_1['user_id'];
                $eventName = $fetch_get_win_bet_details_1['event_name'];
                $marketName = $fetch_get_win_bet_details_1['market_name'];
                $market_type = $fetch_get_win_bet_details_1['market_type'];
                $bet_type = $fetch_get_win_bet_details_1['bet_type'];
                $bet_runs = $fetch_get_win_bet_details_1['bet_runs'];
                $runs = $fetch_get_win_bet_details_1['bet_odds'];
                $stack = $fetch_get_win_bet_details_1['bet_stack'];
                $bet_result = $fetch_get_win_bet_details_1['bet_result'];
                $stk = $fetch_get_win_bet_details_1['bet_margin_used'];
                $bet_time = $fetch_get_win_bet_details_1['bet_time'];
                $bet_status = $fetch_get_win_bet_details_1['bet_status'];
                $bet_win_amount = $fetch_get_win_bet_details_1['bet_win_amount'];
               

                $insert_trade = $conn->query("insert into wrong_bet_details (`original_bet_id`,`event_id`,`event_type`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`) values($bet_id,'$eventId','$eventType','$marketId','$user_id','$eventName','$marketName','$market_type','$bet_type','$bet_runs','$runs','$stack','$bet_result','$stk','$bet_time','$bet_status','$bet_win_amount')");
                $delete_bet_details = $conn->query("update bet_details set bet_status=2 where user_id=$user_id and bet_id=$bet_id");
            } else {
              
                set_result($conn, $bet_id, "Win",$fetch_get_win_bet_details_1);
            }
        }


        $get_loss_bet_details_1 = $conn->query("select * from bet_details where event_id='$event_id' and market_id<>$market_id and market_type='$market_type_search' and bet_type='$bet_type' and bet_status=1");
        while ($fetch_get_loss_bet_details_1 = mysqli_fetch_assoc($get_loss_bet_details_1)) {
            //loss entry
            $bet_id = $fetch_get_loss_bet_details_1['bet_id'];
            $bet_odds = $fetch_get_loss_bet_details_1['bet_odds'];
            if ($bet_odds < 1) {
                $eventId = $fetch_get_loss_bet_details_1['event_id'];
                $eventType = $fetch_get_loss_bet_details_1['event_type'];
                $marketId = $fetch_get_loss_bet_details_1['market_id'];
                $user_id = $fetch_get_loss_bet_details_1['user_id'];
                $eventName = $fetch_get_loss_bet_details_1['event_name'];
                $marketName = $fetch_get_loss_bet_details_1['market_name'];
                $market_type = $fetch_get_loss_bet_details_1['market_type'];
                $bet_type = $fetch_get_loss_bet_details_1['bet_type'];
                $bet_runs = $fetch_get_loss_bet_details_1['bet_runs'];
                $runs = $fetch_get_loss_bet_details_1['bet_odds'];
                $stack = $fetch_get_loss_bet_details_1['bet_stack'];
                $bet_result = $fetch_get_loss_bet_details_1['bet_result'];
                $stk = $fetch_get_loss_bet_details_1['bet_margin_used'];
                $bet_time = $fetch_get_loss_bet_details_1['bet_time'];
                $bet_status = $fetch_get_loss_bet_details_1['bet_status'];
                $bet_win_amount = $fetch_get_loss_bet_details_1['bet_win_amount'];

                $insert_trade = $conn->query("insert into wrong_bet_details (`original_bet_id`,`event_id`,`event_type`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`) values($bet_id,'$eventId','$eventType','$marketId','$user_id','$eventName','$marketName','$market_type','$bet_type','$bet_runs','$runs','$stack','$bet_result','$stk','$bet_time','$bet_status','$bet_win_amount')");
                $delete_bet_details = $conn->query("update bet_details set bet_status=2 where user_id=$user_id and bet_id=$bet_id");
            } else {
                set_result($conn, $bet_id, "Loss",$fetch_get_loss_bet_details_1);
            }
        }


        $get_win_bet_details_2 = $conn->query("select * from bet_details where event_id='$event_id' and market_id<>$market_id and market_type='$market_type_search' and bet_type='$bet_type_2' and bet_status=1");
        while ($fetch_get_win_bet_details_2 = mysqli_fetch_assoc($get_win_bet_details_2)) {
            //won entry
            $bet_id = $fetch_get_win_bet_details_2['bet_id'];
            $bet_odds = $fetch_get_win_bet_details_2['bet_odds'];
            if ($bet_odds < 1) {
                $eventId = $fetch_get_win_bet_details_2['event_id'];
                $eventType = $fetch_get_win_bet_details_2['event_type'];
                $marketId = $fetch_get_win_bet_details_2['market_id'];
                $user_id = $fetch_get_win_bet_details_2['user_id'];
                $eventName = $fetch_get_win_bet_details_2['event_name'];
                $marketName = $fetch_get_win_bet_details_2['market_name'];
                $market_type = $fetch_get_win_bet_details_2['market_type'];
                $bet_type = $fetch_get_win_bet_details_2['bet_type'];
                $bet_runs = $fetch_get_win_bet_details_2['bet_runs'];
                $runs = $fetch_get_win_bet_details_2['bet_odds'];
                $stack = $fetch_get_win_bet_details_2['bet_stack'];
                $bet_result = $fetch_get_win_bet_details_2['bet_result'];
                $stk = $fetch_get_win_bet_details_2['bet_margin_used'];
                $bet_time = $fetch_get_win_bet_details_2['bet_time'];
                $bet_status = $fetch_get_win_bet_details_2['bet_status'];
                $bet_win_amount = $fetch_get_win_bet_details_2['bet_win_amount'];

                $insert_trade = $conn->query("insert into wrong_bet_details (`original_bet_id`,`event_id`,`event_type`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`) values($bet_id,'$eventId','$eventType','$marketId','$user_id','$eventName','$marketName','$market_type','$bet_type','$bet_runs','$runs','$stack','$bet_result','$stk','$bet_time','$bet_status','$bet_win_amount')");
                $delete_bet_details = $conn->query("update bet_details set bet_status=2 where user_id=$user_id and bet_id=$bet_id");
            } else {
                set_result($conn, $bet_id, "Win",$fetch_get_win_bet_details_2);
            }
        }

        $get_loss_bet_details_2 = $conn->query("select * from bet_details where event_id='$event_id' and market_id=$market_id and market_type='$market_type_search' and bet_type='$bet_type_2' and bet_status=1");
        while ($fetch_get_loss_bet_details_2 = mysqli_fetch_assoc($get_loss_bet_details_2)) {
            //loss entry
            $bet_id = $fetch_get_loss_bet_details_2['bet_id'];
            $bet_odds = $fetch_get_loss_bet_details_2['bet_odds'];
            if ($bet_odds < 1) {
                $eventId = $fetch_get_loss_bet_details_2['event_id'];
                $eventType = $fetch_get_loss_bet_details_2['event_type'];
                $marketId = $fetch_get_loss_bet_details_2['market_id'];
                $user_id = $fetch_get_loss_bet_details_2['user_id'];
                $eventName = $fetch_get_loss_bet_details_2['event_name'];
                $marketName = $fetch_get_loss_bet_details_2['market_name'];
                $market_type = $fetch_get_loss_bet_details_2['market_type'];
                $bet_type = $fetch_get_loss_bet_details_2['bet_type'];
                $bet_runs = $fetch_get_loss_bet_details_2['bet_runs'];
                $runs = $fetch_get_loss_bet_details_2['bet_odds'];
                $stack = $fetch_get_loss_bet_details_2['bet_stack'];
                $bet_result = $fetch_get_loss_bet_details_2['bet_result'];
                $stk = $fetch_get_loss_bet_details_2['bet_margin_used'];
                $bet_time = $fetch_get_loss_bet_details_2['bet_time'];
                $bet_status = $fetch_get_loss_bet_details_2['bet_status'];
                $bet_win_amount = $fetch_get_loss_bet_details_2['bet_win_amount'];

                $insert_trade = $conn->query("insert into wrong_bet_details (`original_bet_id`,`event_id`,`event_type`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`) values($bet_id,'$eventId','$eventType','$marketId','$user_id','$eventName','$marketName','$market_type','$bet_type','$bet_runs','$runs','$stack','$bet_result','$stk','$bet_time','$bet_status','$bet_win_amount')");
                $delete_bet_details = $conn->query("update bet_details set bet_status=2 where user_id=$user_id and bet_id=$bet_id");
            } else {
                set_result($conn, $bet_id, "Loss",$fetch_get_loss_bet_details_2);
            }
        }
    } else {
        $get_win_bet_details_1 = $conn->query("select * from bet_details where event_id='$event_id' and market_id=$market_id and market_type='$market_type_search' and bet_type='$bet_type' and bet_status=1");
        while ($fetch_get_win_bet_details_1 = mysqli_fetch_assoc($get_win_bet_details_1)) {
            //won entry

            $bet_id = $fetch_get_win_bet_details_1['bet_id'];
            $bet_odds = $fetch_get_win_bet_details_1['bet_odds'];
            if ($bet_odds < 1) {
                $eventId = $fetch_get_win_bet_details_1['event_id'];
                $eventType = $fetch_get_win_bet_details_1['event_type'];
                $marketId = $fetch_get_win_bet_details_1['market_id'];
                $user_id = $fetch_get_win_bet_details_1['user_id'];
                $eventName = $fetch_get_win_bet_details_1['event_name'];
                $marketName = $fetch_get_win_bet_details_1['market_name'];
                $market_type = $fetch_get_win_bet_details_1['market_type'];
                $bet_type = $fetch_get_win_bet_details_1['bet_type'];
                $bet_runs = $fetch_get_win_bet_details_1['bet_runs'];
                $runs = $fetch_get_win_bet_details_1['bet_odds'];
                $stack = $fetch_get_win_bet_details_1['bet_stack'];
                $bet_result = $fetch_get_win_bet_details_1['bet_result'];
                $stk = $fetch_get_win_bet_details_1['bet_margin_used'];
                $bet_time = $fetch_get_win_bet_details_1['bet_time'];
                $bet_status = $fetch_get_win_bet_details_1['bet_status'];
                $bet_win_amount = $fetch_get_win_bet_details_1['bet_win_amount'];

                $insert_trade = $conn->query("insert into wrong_bet_details (`original_bet_id`,`event_id`,`event_type`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`) values($bet_id,'$eventId','$eventType','$marketId','$user_id','$eventName','$marketName','$market_type','$bet_type','$bet_runs','$runs','$stack','$bet_result','$stk','$bet_time','$bet_status','$bet_win_amount')");
                $delete_bet_details = $conn->query("update bet_details set bet_status=2 where user_id=$user_id and bet_id=$bet_id");
            } else {
                set_result($conn, $bet_id, "Win",$fetch_get_win_bet_details_1);
            }
        }


        $get_loss_bet_details_1 = $conn->query("select * from bet_details where event_id='$event_id' and market_id=$market_id and market_type='$market_type_search' and bet_type='$bet_type_2' and bet_status=1");
        while ($fetch_get_loss_bet_details_1 = mysqli_fetch_assoc($get_loss_bet_details_1)) {
            //loss entry

            $bet_id = $fetch_get_loss_bet_details_1['bet_id'];
            $bet_odds = $fetch_get_loss_bet_details_1['bet_odds'];
            if ($bet_odds < 1) {
                $eventId = $fetch_get_loss_bet_details_1['event_id'];
                $eventType = $fetch_get_loss_bet_details_1['event_type'];
                $marketId = $fetch_get_loss_bet_details_1['market_id'];
                $user_id = $fetch_get_loss_bet_details_1['user_id'];
                $eventName = $fetch_get_loss_bet_details_1['event_name'];
                $marketName = $fetch_get_loss_bet_details_1['market_name'];
                $market_type = $fetch_get_loss_bet_details_1['market_type'];
                $bet_type = $fetch_get_loss_bet_details_1['bet_type'];
                $bet_runs = $fetch_get_loss_bet_details_1['bet_runs'];
                $runs = $fetch_get_loss_bet_details_1['bet_odds'];
                $stack = $fetch_get_loss_bet_details_1['bet_stack'];
                $bet_result = $fetch_get_loss_bet_details_1['bet_result'];
                $stk = $fetch_get_loss_bet_details_1['bet_margin_used'];
                $bet_time = $fetch_get_loss_bet_details_1['bet_time'];
                $bet_status = $fetch_get_loss_bet_details_1['bet_status'];
                $bet_win_amount = $fetch_get_loss_bet_details_1['bet_win_amount'];

                $insert_trade = $conn->query("insert into wrong_bet_details (`original_bet_id`,`event_id`,`event_type`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`) values($bet_id,'$eventId','$eventType','$marketId','$user_id','$eventName','$marketName','$market_type','$bet_type','$bet_runs','$runs','$stack','$bet_result','$stk','$bet_time','$bet_status','$bet_win_amount')");
                $delete_bet_details = $conn->query("update bet_details set bet_status=2 where user_id=$user_id and bet_id=$bet_id");
            } else {
                set_result($conn, $bet_id, "Loss",$fetch_get_loss_bet_details_1);
            }
        }
    }

    
    $commision_list=array();
    $get_account_id = $conn->query("select * from commission_master where event_id='$event_id'");
    while($fetch_event_id = mysqli_fetch_assoc($get_account_id)){
        $comision_users=$fetch_event_id['user_id'];
        $commision_list[$comision_users]=$fetch_event_id;
    }

    $user_list=array();
    $get_users_id = $conn->query("select * from user_login_master where UserType='1'");
    while($fetch_user_id = mysqli_fetch_assoc($get_users_id)){
        $users_id_db=$fetch_user_id['UserID'];
        $user_list[$users_id_db]=$fetch_user_id;
    }

    $get_all_user_commision = $conn->query("select bet_id,event_id,market_id,event_name,market_name,market_type,SUM(bet_result) as overal_result,user_id from bet_details as b where b.event_id='$event_id' and b.market_type='MATCH_ODDS' and b.bet_status=0 GROUP BY user_id");
    $entry_transaction_time = date("Y-m-d H:i:s");
    $entry_transaction_time = date("Y-m-d H:i:s", (strtotime($entry_transaction_time) + 2));
    while ($fetch_get_all_user_commision = mysqli_fetch_assoc($get_all_user_commision)) {
        $commission_bet_id = $fetch_get_all_user_commision['bet_id'];
        $commision_user_id = $fetch_get_all_user_commision['user_id'];
        $commision_user_Email_ID ="";
        if(isset($user_list[$commision_user_id])){
            $commision_user_Email_ID =$user_list[$commision_user_id]['Email_ID'];
        }
        $commision_overal_result = $fetch_get_all_user_commision['overal_result'];
        $commision_event_name = $fetch_get_all_user_commision['event_name'];
        $comm_amount = ($commision_overal_result * 1) / 100;
       
        if(isset($commision_list[$commision_user_id])){
			$fetch_event_id = $commision_list[$commision_user_id];
			$comm_id = $fetch_event_id['comm_id'];
			$both_account_id = $fetch_event_id['account_id'];
			$both_account_temp_id = $fetch_event_id['account_temp_id'];

			$conn->query("delete from commission_master where comm_id='$comm_id'");

			$conn->query("delete from accounts where account_id IN($both_account_id) and game_type=0");
			$conn->query("delete from accounts_temp where account_id IN($both_account_temp_id) and game_type=0");
        }

        if (true) {
            if ($comm_amount > 0) {

                $transaction_id = 'sports_comm-' . $commission_bet_id . '-1';
                $update_bet_status = $conn->query("update bet_details set bet_comm='$comm_amount' where bet_id=$commission_bet_id");
                $account_description_commision = "#Commission Paid from $commision_user_Email_ID Event name - $commision_event_name at $entry_transaction_time";

                if(isset($per_list[$commision_user_id])){
                    $level_pers=$per_list[$commision_user_id];
                }else{
                    $level_pers = get_level_per($conn, $commision_user_id);
                    $per_list[$commision_user_id]=$level_pers;
                }
                $account_ids=array();
                foreach ($level_pers as $cradit_user_id => $level_per) {

                    $cradit_amt = ($comm_amount / 100) * $level_per;
                    if ($cradit_amt > 0) {
                        $transaction_id = 'sports_comm-' . $commission_bet_id . '-' . $cradit_user_id;
                        if (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $cradit_amt != 0)) {
                            $insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('" . $cradit_user_id . "','$commision_user_id','$account_description_commision','$commission_bet_id','$event_id','$cradit_amt','Credit','10','$entry_transaction_time','1','$transaction_id')");
                            $account_id_db4 = $conn->insert_id;
                            $account_ids['accounts'][]=$account_id_db4;
                        }
                        if (INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $cradit_amt != 0))) {
                            $conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('" . $cradit_user_id . "','$commision_user_id','$account_description_commision','$commission_bet_id','$event_id','$cradit_amt','Credit','10','$entry_transaction_time','1','$transaction_id')");
                            $account_id_db3 = $conn->insert_id;
                            $account_ids['accounts_temp'][]=$account_id_db3;
                        }
                    }
                }
                $account_id1 = 0;

                $comm_amount = $comm_amount * (-1);

                $transaction_id = 'sports_comm-' . $commission_bet_id . '-' . $commision_user_id;
                if (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $comm_amount != 0)) {
                    $insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$commision_user_id',0,'$account_description_commision','$commission_bet_id','$event_id','$comm_amount','Debit','9','$entry_transaction_time','1','$transaction_id')");
                    
                    $account_id_db = $conn->insert_id;
                    $account_ids['accounts'][]=$account_id_db;
                }
                if (INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $comm_amount != 0))) {
                    $conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$commision_user_id',0,'$account_description_commision','$commission_bet_id','$event_id','$comm_amount','Debit','9','$entry_transaction_time','1','$transaction_id')");
                    
                    $account_id_db2 = $conn->insert_id;
                    $account_ids['accounts_temp'][]=$account_id_db2;
                }
                $account_id2 = $conn->insert_id;


                $both_account_id =implode(",",$account_ids['accounts']);
                $both_accounttemp_id =implode(",",$account_ids['accounts_temp']);
                $conn->query("insert into commission_master (account_id,account_temp_id,user_id,bet_id,event_id,comm_amount,comm_datetime) values('$both_account_id','$both_accounttemp_id','$commision_user_id','$commission_bet_id','$event_id','$comm_amount','$entry_transaction_time')");
                
            }
        }
    }


    $conn->query("delete from unmatched_bet_details where event_id='$event_id'");
    $delete_exposure = $conn->query("delete from exposure_details where event_id='$eventId' and market_type='$market_type'");
    $return_array = array(
        "status" => "ok",
        "message" => "Result Done",
    );
    echo json_encode($return_array);
} else {
    $return_array = array(
        "status" => "error",
        "message" => "Please Select Valid Market Type or Market Name",
    );
    echo json_encode($return_array);
}

function set_result($conn, $bet_id, $result_status,$fetch_bet_details)
{
    global $per_list;
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
    $transaction_time = date("Y-m-d H:i:s");
    $entry_transaction_time = date("d-m-Y H:i:s");

     $winner_name = $fetch_bet_details['winner_name'];
    $event_id = $fetch_bet_details['event_id'];
    if($result_status == 'Win'){
        if($market_type == "MATCH_ODDS" && empty($winner_name)){
                    $conn->query("UPDATE `bet_details` SET `winner_name`='$market_name' WHERE event_id='$event_id' and `market_type` = 'MATCH_ODDS'");
                }
       

    }else{
        
         if($market_type == "MATCH_ODDS" && empty($winner_name)){
            $expname = explode(' v ', $event_name);
            $result = array_values(array_diff($expname, [$market_name]));
            $market_name=$result[0];
            $conn->query("UPDATE `bet_details` SET `winner_name`='$market_name' WHERE event_id='$event_id' and `market_type` = 'MATCH_ODDS'");
                }
    }

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
    $update_bet_status = $conn->query("update bet_details set bet_status=0,bet_result='$user_amount' where bet_id=$bet_id and bet_status=1");
    $delete_exposure = $conn->query("delete from exposure_details where event_id='$eventId' and user_id=$bet_user_id and market_type='$market_type'");
    //adjust account 

    if ($result_status == 'Win') {

        $transaction_id = 'sports-' . $bet_id . '-' . $bet_user_id;
        $account_description = "#Win BET ID $bet_id - $event_name -$market_name at $entry_transaction_time";
        if (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $actual_win_amount2 != 0)) {
            $insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$actual_win_amount2','Credit','4','$transaction_time','1','$transaction_id')");
        }
        if (INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $actual_win_amount2 != 0))) {
            $conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$actual_win_amount2','Credit','4','$transaction_time','1','$transaction_id')");
        }
        
		if(isset($per_list[$bet_user_id])){
            $level_pers=$per_list[$bet_user_id];
        }
        else{
            $level_pers = get_level_per($conn, $bet_user_id);
            $per_list[$bet_user_id]=$level_pers;
        }
        foreach ($level_pers as $debit_user_id => $level_per) {

            $debit_amt = 0 - (($actual_win_amount2 / 100) * $level_per);
            $transaction_id = 'sports-' . $bet_id . '-' . $debit_user_id;

            $account_descriptionSMDL = "#Loss BET ID $bet_id - $event_name -$market_name at $entry_transaction_time";
            if (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $debit_amt != 0)) {
                $insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$debit_amt','Debit','7','$transaction_time','1','$transaction_id')");
            }
            if (INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $debit_amt != 0))) {
                $conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$debit_amt','Debit','7','$transaction_time','1','$transaction_id')");
            }
        }
    } else if ($result_status == 'Loss') {
        $transaction_id = 'sports-' . $bet_id . '-' . $bet_user_id;
        $account_description = "#Loss BET ID $bet_id - $event_name -$market_name at $entry_transaction_time";
        if (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $user_amount != 0)) {
            $insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$user_amount','Debit','7','$transaction_time','1','$transaction_id')");
        }
        if (INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $user_amount != 0))) {
            $conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$user_amount','Debit','7','$transaction_time','1','$transaction_id')");
        }$level_pers = get_level_per($conn, $bet_user_id);
        foreach ($level_pers as $cradit_user_id => $level_per) {

            $cradit_amt = ($bet_margin_used / 100) * $level_per;
            $transaction_id = 'sports-' . $bet_id . '-' . $cradit_user_id;

            $account_descriptionSMDL = "#Win BET ID $bet_id - $event_name -$market_name at $entry_transaction_time";
            if (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $cradit_amt != 0)) {
                $insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$cradit_amt','Credit','4','$transaction_time','1','$transaction_id')");
            }
            if (INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $cradit_amt != 0))) {
                $conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$cradit_amt','Credit','4','$transaction_time','1','$transaction_id')");
            }
        }
    }
    return true;
}