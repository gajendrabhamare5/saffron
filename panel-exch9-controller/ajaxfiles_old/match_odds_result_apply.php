<?php

include "../../include/conn.php";
include "../session.php";
include('../../include/level_percentage.php');
/* error_reporting(E_ALL);
  ini_set("display_errors",1);
  ini_set("display_startup_errors",1); */
$user_id = $_SESSION['CONTROLLER_LOGIN_ID'];
$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
if ($login_type != 5) {
    header("Location: ../logout.php");
}
$entry_transaction_time = date("d-m-Y H:i:s");
$event_id = $_REQUEST['event_id'];
$market_id = $_REQUEST['market_id'];
$market_type = $_REQUEST['market_type'];
$match_odds_result = $_REQUEST['match_odds_result'];




foreach ($white_list_data as $white_list_url) {
    $url = $white_list_url . "controller-agent/ajaxfiles/match_odds_result_apply_auto.php?event_id=$event_id&market_id=$market_id&market_type=$market_type&match_odds_result=$match_odds_result";
    $url = str_replace(" ", "%20", $url);
    file_get_contents($url);
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
            $marketName = $fetch_get_win_bet_details_1['market_name'];
             $winner_name = $fetch_get_win_bet_details_1['winner_name'];
             
                $market_type = $fetch_get_win_bet_details_1['market_type'];
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
                
                set_result($conn, $bet_id, "Win");
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
                set_result($conn, $bet_id, "Loss");
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
                set_result($conn, $bet_id, "Win");
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
                set_result($conn, $bet_id, "Loss");
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
                set_result($conn, $bet_id, "Win");
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
                set_result($conn, $bet_id, "Loss");
            }
        }
    }

    //$get_all_user_commision = $conn->query("select bet_id,event_id,market_id,event_name,market_name,market_type,SUM(bet_result) as overal_result,user_id,Email_ID from bet_details as b left outer join user_login_master as u on u.UserID=b.user_id where b.event_id='event_id' and b.market_id='$market_id' and b.market_type='MATCH_ODDS' and u.parentMDL !=615 and u.parentDL!=65 and b.bet_status=0 GROUP BY user_id");		


    $get_all_user_commision = $conn->query("select bet_id,event_id,market_id,event_name,market_name,market_type,SUM(bet_result) as overal_result,user_id,Email_ID from bet_details as b left outer join user_login_master as u on u.UserID=b.user_id where b.event_id='$event_id' and b.market_type='MATCH_ODDS' and b.bet_status=0 GROUP BY user_id");
    $entry_transaction_time = date("Y-m-d H:i:s");
    $entry_transaction_time = date("Y-m-d H:i:s", (strtotime($entry_transaction_time) + 2));
    while ($fetch_get_all_user_commision = mysqli_fetch_assoc($get_all_user_commision)) {
        $commission_bet_id = $fetch_get_all_user_commision['bet_id'];
        $commision_user_id = $fetch_get_all_user_commision['user_id'];
        $commision_user_Email_ID = $fetch_get_all_user_commision['Email_ID'];
        $commision_overal_result = $fetch_get_all_user_commision['overal_result'];
        $commision_event_name = $fetch_get_all_user_commision['event_name'];
        $comm_amount = ($commision_overal_result * 1) / 100;

        $check_already_comm_add = $conn->query("select * from accounts where event_id='$event_id' and user_id='$commision_user_id'");
        $check_already_comm_count = mysqli_num_rows($check_already_comm_add);

        if ($check_already_comm_count != null) {


            $get_account_id = $conn->query("select * from commission_master where user_id=$commision_user_id and event_id='$event_id'");
            $fetch_event_id = mysqli_fetch_assoc($get_account_id);
            $comm_id = $fetch_event_id['comm_id'];
            $both_account_id = $fetch_event_id['account_id'];

            $conn->query("delete from commission_master where comm_id='$comm_id'");

            $conn->query("delete from accounts where account_id IN($both_account_id) and game_type=0");
            $conn->query("delete from accounts_temp where account_id IN($both_account_id) and game_type=0");
        }

        if (true) {
            if ($comm_amount > 0) {

                $transaction_id = 'sports_comm-' . $commission_bet_id . '-1';
                $update_bet_status = $conn->query("update bet_details set bet_comm='$comm_amount' where bet_id=$commission_bet_id");
                $account_description_commision = "#Commission Paid from $commision_user_Email_ID Event name - $commision_event_name at $entry_transaction_time";


                /*
                $whitelabel_comm_amount = ($comm_amount/100) * WHTELABEL_PER;
                $controller_comm_amount = ($comm_amount/100) * (100 - WHTELABEL_PER);
                
                $insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('1','$commision_user_id','$account_description_commision','$commission_bet_id','$event_id','$whitelabel_comm_amount','Credit','10','$entry_transaction_time','1','$transaction_id')");
                $account_id1 = $conn->insert_id;
                
                $transaction_id = 'sports_comm-'.$commission_bet_id.'-'.CONTROLLER_ID;
                $insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('".CONTROLLER_ID."','$commision_user_id','$account_description_commision','$commission_bet_id','$event_id','$controller_comm_amount','Credit','10','$entry_transaction_time','1','$transaction_id')");
                $controller_id1 = $conn->insert_id;
                */

                $level_pers = get_level_per($conn, $commision_user_id);

                foreach ($level_pers as $cradit_user_id => $level_per) {

                    $cradit_amt = ($comm_amount / 100) * $level_per;
                    if ($cradit_amt > 0) {
                        $transaction_id = 'sports_comm-' . $commission_bet_id . '-' . $cradit_user_id;
                        if (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $cradit_amt != 0)) {
                            $insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('" . $cradit_user_id . "','$commision_user_id','$account_description_commision','$commission_bet_id','$event_id','$cradit_amt','Credit','10','$entry_transaction_time','1','$transaction_id')");
                        }
                        if (INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $cradit_amt != 0))) {
                            $conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('" . $cradit_user_id . "','$commision_user_id','$account_description_commision','$commission_bet_id','$event_id','$cradit_amt','Credit','10','$entry_transaction_time','1','$transaction_id')");
                        }
                    }
                }
                $account_id1 = 0;

                $comm_amount = $comm_amount * (-1);

                $transaction_id = 'sports_comm-' . $commission_bet_id . '-' . $commision_user_id;
                if (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $comm_amount != 0)) {
                    $insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$commision_user_id',0,'$account_description_commision','$commission_bet_id','$comm_amount','Debit','9','$entry_transaction_time','1','$transaction_id')");
                }
                if (INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $comm_amount != 0))) {
                    $conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$commision_user_id',0,'$account_description_commision','$commission_bet_id','$comm_amount','Debit','9','$entry_transaction_time','1','$transaction_id')");
                }

                $account_id2 = $conn->insert_id;


                $both_account_id = $account_id1 . "," . $account_id2;
                $conn->query("insert into commission_master (account_id,user_id,bet_id,event_id,comm_amount,comm_datetime) values('$both_account_id','$commision_user_id','$commission_bet_id','$event_id','$comm_amount','$entry_transaction_time')");
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

function set_result($conn, $bet_id, $result_status)
{

    $get_bet_details = $conn->query("select * from bet_details where bet_id=$bet_id and bet_status=1");
    $fetch_bet_details = mysqli_fetch_assoc($get_bet_details);
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

    $get_parent_ids = $conn->query("select * from user_login_master where UserID=$bet_user_id");
    $fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
    $user_Email_ID = $fetch_parent_ids['Email_ID'];
    $parentDL = $fetch_parent_ids['parentDL'];
    $parentMDL = $fetch_parent_ids['parentMDL'];
    $parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];
    $eventId = $fetch_bet_details['event_id'];
    $marketId = $fetch_bet_details['market_id'];
    /* $get_DL_comm = $conn->query("select * from user_master where Id=$parentDL");
      $fetch_DL_comm = mysqli_fetch_assoc($get_DL_comm);
      $dl_commission = $fetch_DL_comm['my_percentage'];

      $get_MDL_comm = $conn->query("select * from user_master where Id=$parentMDL");
      $fetch_MDL_comm = mysqli_fetch_assoc($get_MDL_comm);
      $mdl_commission = $fetch_MDL_comm['my_percentage'];

      $smdl_commission = 100 - $mdl_commission - $dl_commission; */


    if ($result_status == 'Win') {
        $actual_win_amount = $bet_win_amount + $bet_margin_used;
        $actual_win_amount2 = $bet_win_amount;
        $user_amount = $actual_win_amount2;
        /* $dl_amount = -($actual_win_amount2 * $dl_commission) / 100;
          $mdl_amount = -($actual_win_amount2 * $mdl_commission) / 100;
          $smdl_amount = -($actual_win_amount2 * $smdl_commission) / 100; */
        $smdl_amount = -$actual_win_amount2;
    } else if ($result_status == 'Loss') {
        $actual_loss_amount = $bet_margin_used;
        $user_amount = -$actual_loss_amount;
        /* $dl_amount = ($actual_loss_amount * $dl_commission) / 100;
          $mdl_amount = ($actual_loss_amount * $mdl_commission) / 100;
          $smdl_amount = ($actual_loss_amount * $smdl_commission) / 100; */
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
        /* $account_descriptionDL = "#Loss BET ID $bet_id - $event_name -$market_name";
          $insert_user_accountDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('$parentDL','$bet_user_id','$account_descriptionDL','$bet_id','$dl_amount','Debit','7','$transaction_time','1')");

          $account_descriptionMDL = "#Loss BET ID $bet_id - $event_name -$market_name";
          $insert_user_accountMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('$parentMDL','$bet_user_id','$account_descriptionMDL','$bet_id','$mdl_amount','Debit','7','$transaction_time','1')"); */

        //        $account_descriptionSMDL = "#Loss BET ID $bet_id - $event_name -$market_name at $entry_transaction_time";
        //        $insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('$parentSuperMDL','$bet_user_id','$account_descriptionSMDL','$bet_id','$smdl_amount','Debit','7','$transaction_time','1')");

        $level_pers = get_level_per($conn, $bet_user_id);
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
        }
        /* $account_descriptionDL = "#Win BET ID $bet_id - $event_name -$market_name";
          $insert_user_accountDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('$parentDL','$bet_user_id','$account_descriptionDL','$bet_id','$dl_amount','Credit','4','$transaction_time','1')");

          $account_descriptionMDL = "#Win BET ID $bet_id - $event_name -$market_name";
          $insert_user_accountMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('$parentMDL','$bet_user_id','$account_descriptionMDL','$bet_id','$mdl_amount','Credit','4','$transaction_time','1')"); */

        //        $account_descriptionSMDL = "#Win BET ID $bet_id - $event_name -$market_name at $entry_transaction_time";
        //        $insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('$parentSuperMDL','$bet_user_id','$account_descriptionSMDL','$bet_id','$smdl_amount','Credit','4','$transaction_time','1')");

        $level_pers = get_level_per($conn, $bet_user_id);
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