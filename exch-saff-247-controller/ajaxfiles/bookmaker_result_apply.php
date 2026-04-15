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
$result_market_id = $_REQUEST['market_id'];
$market_id = $_REQUEST['market_id'];
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


foreach ($white_list_data as $white_list_url) {
    $url2 = $white_list_url . "controller-agent/ajaxfiles/bookmaker_result_apply_auto.php?event_id=$event_id&market_id=$market_id&market_type=$market_type&match_odds_result=$match_odds_result";
    $url2 = str_replace(" ", "%20", $url2);
    file_get_contents($url2);
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

$get_market_data = $conn->query("select * from bet_details where event_id='$event_id' and market_id=$result_market_id LIMIT 1");
$fetch_get_market_data = mysqli_fetch_assoc($get_market_data);
$runnerName = $fetch_get_market_data['market_name'];

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
    $delete_bet_details = $conn->query("update bet_details set bet_status=2 where event_id='$event_id' and market_type='$market_type_search'");
    $delete_exposure = $conn->query("delete from exposure_details where event_id='$event_id' and market_type='$market_type_search'");
    $return_array = array(
        "status" => 'ok',
        "message" => 'Bet Cancelled',
    );
    echo json_encode($return_array);
    exit();
}

if ($match_odds_result == 'Win') {
    $get_win_bet_details_1 = $conn->query("select * from bet_details where event_id='$event_id' and market_type='$market_type_search' and bet_status=1");
    while ($fetch_get_win_bet_details_1 = mysqli_fetch_assoc($get_win_bet_details_1)) {

        //won entry
        $bet_id = $fetch_get_win_bet_details_1['bet_id'];
        $bet_odds = $fetch_get_win_bet_details_1['bet_odds'];
        $marketName = $fetch_get_win_bet_details_1['market_name'];
        $market_id = $fetch_get_win_bet_details_1['market_id'];
        $bet_type = $fetch_get_win_bet_details_1['bet_type'];
        $winner_name = $fetch_get_win_bet_details_1['winner_name'];
        if ($result_market_id == $market_id) {
            if ($bet_type == 'Back') {

                //                echo 'win_'.$marketName.'--'.$bet_type.'--'.$bet_id.'<br>';
                set_result($conn, $bet_id, "Win");
            } else {
                //                echo 'loss_'.$marketName.'--'.$bet_type.'--'.$bet_id.'<br>';
                set_result($conn, $bet_id, "Loss");
            }
        } else {
            if ($bet_type == 'Lay') {
                //                echo 'win_'.$marketName.'--'.$bet_type.'--'.$bet_id.'<br>';
                set_result($conn, $bet_id, "Win");
            } else {
                //                echo 'loss_'.$marketName.'--'.$bet_type.'--'.$bet_id.'<br>';
                set_result($conn, $bet_id, "Loss");
            }
        }
    }

    $return_array = array(
        "status" => "ok",
        "message" => "Result Done",
    );
    echo json_encode($return_array);
} else if ($match_odds_result == 'Loss') {
    $get_win_bet_details_1 = $conn->query("select * from bet_details where event_id='$event_id' and market_type='$market_type_search' and bet_status=1");
    while ($fetch_get_win_bet_details_1 = mysqli_fetch_assoc($get_win_bet_details_1)) {

        //won entry
        $bet_id = $fetch_get_win_bet_details_1['bet_id'];
        $bet_odds = $fetch_get_win_bet_details_1['bet_odds'];
        $marketName = $fetch_get_win_bet_details_1['market_name'];
        $market_id = $fetch_get_win_bet_details_1['market_id'];
        $bet_type = $fetch_get_win_bet_details_1['bet_type'];
        $event_name = $fetch_get_win_bet_details_1['event_name'];
        $winner_name = $fetch_get_win_bet_details_1['winner_name'];
        $expname = explode(' v ', $event_name);
        $result = array_values(array_diff($expname, [$marketName]));
        $marketName = $result[0];
        if ($result_market_id == $market_id) {
            if ($bet_type == 'Back') {
                //                echo 'loss_'.$marketName.'--'.$bet_type.'--'.$bet_id.'<br>';
                set_result($conn, $bet_id, "Loss");

            } else {
                //                echo 'win_'.$marketName.'--'.$bet_type.'--'.$bet_id.'<br>';
                set_result($conn, $bet_id, "Win");
            }
        }
    }

    $return_array = array(
        "status" => "ok",
        "message" => "Result Done",
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
    if ($result_status == 'Win') {
        if (empty($winner_name)) {
            $conn->query("UPDATE `bet_details` SET `winner_name`='$market_name' WHERE event_id='$event_id' and `market_type` in ('BOOKMAKER_ODDS','BOOKMAKERSMALL_ODDS')");
        }

    } else {

        if (empty($winner_name)) {
            $expname = explode(' v ', $event_name);
            $result = array_values(array_diff($expname, [$market_name]));
            $market_name = $result[0];
            $conn->query("UPDATE `bet_details` SET `winner_name`='$market_name' WHERE event_id='$event_id' and `market_type` in ('BOOKMAKER_ODDS','BOOKMAKERSMALL_ODDS')");
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
