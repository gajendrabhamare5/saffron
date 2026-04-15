<?php

include('../include/conn.php');
include('../include/level_percentage.php');
error_reporting(0);


$data_original = file_get_contents("php://input");
$data = json_decode(file_get_contents("php://input"));

$result_array = $data->t1;



$rdesc = $result_array->rdesc;


$game_type = $result_array->gtype;
$mid = $result_array->rid;
$bet_final_result = $result_array->winnat;
$result = $result_array->win;


$cards3 = $result_array->card;
$cards3 = '["' . $cards3 . '"]';
$cards3 = str_replace(',', '","', $cards3);

$event_type = "32CARDS";

$result_time = date("Y-m-d H:i:s");
$bet_final_result = '';
if ($result == 1) {
    $result_status = '8';
    $bet_final_result = 'Player 8';
    $market_id = 1;
} else if ($result == "CAN") {
    $get_all_bet1 = $conn->query("select * from bet_teen_details where event_id='$mid' and bet_status=1 and event_type='$event_type'");
    while ($fetch_get_all_bet1 = mysqli_fetch_assoc($get_all_bet1)) {
        $bet_id = $fetch_get_all_bet1['bet_id'];
        $update_bet = $conn->query("update bet_teen_details set bet_status=2,bet_result='0',bet_win_amount='0' where bet_id='$bet_id' and bet_status=1");

        $conn->query("delete from accounts where bet_id='$bet_id' and game_type=1");
        $conn->query("delete from accounts_temp where bet_id='$bet_id' and game_type=1");
        $conn->query("delete from exposure_details where event_id='$mid' and market_type ='$event_type'");
    }
} else if ($result == 2) {
    $result_status = '9';
    $bet_final_result = 'Player 9';
    $market_id = 2;
} else if ($result == 3) {
    $result_status = '10';
    $bet_final_result = 'Player 10';
    $market_id = 3;
} else if ($result == 4) {
    $result_status = '11';
    $bet_final_result = 'Player 11';
    $market_id = 4;
}



$check_result_already_insert = $conn->query("select * from twenty_teenpatti_result where event_id='$mid' and game_type='$game_type'");
$row_count = mysqli_fetch_row($check_result_already_insert);
if ($row_count != 0) {
    echo "already inserted";
    exit();
}


$conn->query("insert into twenty_teenpatti_result (event_id,game_type,result_status,cards,result_time,desc_remakrs,data) VALUES('$mid','$game_type','$result_status','$cards3','$result_time','$rdesc','$data_original')");



$end_date_time = date("Y-m-d H:i:s");
$transaction_time = date("Y-m-d H:i:s");
$transaction_time2 = date("d-m-Y H:i:s");

$get_all_bet = $conn->query("select * from bet_teen_details where event_id='$mid' and event_type='$event_type' and bet_status=1");
while ($fetch_get_all_bet = mysqli_fetch_assoc($get_all_bet)) {
    $bet_id = $fetch_get_all_bet['bet_id'];

    $conn->query("delete from accounts where bet_id='$bet_id' and game_type=1");
    $conn->query("delete from accounts_temp where bet_id='$bet_id' and game_type=1");

    $bet_user_id = $fetch_get_all_bet['user_id'];
    $bet_market_id = $fetch_get_all_bet['market_id'];
    $bet_market_name = $fetch_get_all_bet['market_name'];
    $bet_amount = $fetch_get_all_bet['bet_margin_used'];
    $bet_winning_amount = $fetch_get_all_bet['bet_win_amount'];
    $bet_type = $fetch_get_all_bet['bet_type'];
    $actual_win_amount2 = $bet_winning_amount;
    $get_parent_ids = $conn->query("select * from user_login_master where UserID=$bet_user_id");
    $fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
    $parentDL = $fetch_parent_ids['parentDL'];
    $parentMDL = $fetch_parent_ids['parentMDL'];
    $parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];


    if ($bet_market_id == $market_id and $bet_type == "Back") {
        set_result($conn, $bet_id, "Win", $mid, $end_date_time, $bet_final_result);
    } else if ($bet_market_id != $market_id and $bet_type == "Lay") {
        set_result($conn, $bet_id, "Win", $mid, $end_date_time, $bet_final_result);
    } else {
        set_result($conn, $bet_id, "Loss", $mid, $end_date_time, $bet_final_result);
    }
}

function set_result($conn, $bet_id, $result_status, $mid, $end_date_time, $bet_final_result = '')
{


    $end_date_time = date("Y-m-d H:i:s");
    $transaction_time = $end_date_time;
    $transaction_time2 = $end_date_time;
    $get_bet_details = $conn->query("select * from bet_teen_details where bet_id=$bet_id and bet_status=1");
    $fetch_bet_details = mysqli_fetch_assoc($get_bet_details);
    $bet_user_id = $fetch_bet_details['user_id'];
    $bet_market_id = $fetch_bet_details['market_id'];
    $bet_market_name = $fetch_bet_details['market_name'];
    $bet_amount = $fetch_bet_details['bet_margin_used'];
    $bet_winning_amount = $fetch_bet_details['bet_win_amount'];
    $actual_win_amount2 = $bet_winning_amount;
    $get_parent_ids = $conn->query("select * from user_login_master where UserID=$bet_user_id");
    $fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
    $parentDL = $fetch_parent_ids['parentDL'];
    $parentMDL = $fetch_parent_ids['parentMDL'];
    $parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];

    //adjust account 

    if ($result_status == 'Win') {
        $actual_win_amount = $bet_winning_amount + $bet_amount;
        $actual_win_amount2 = $bet_winning_amount;
        $user_amount = $actual_win_amount2;
        $smdl_amount = -$actual_win_amount2;
    } else if ($result_status == 'Loss') {
        $actual_loss_amount = $bet_amount;
        $user_amount = -$actual_loss_amount;
        $smdl_amount = $actual_loss_amount;
    }

    if ($result_status == 'Win') {
        echo "Win";
        $user_amount = $actual_win_amount2;
        $smdl_amount = -$actual_win_amount2;

        $bet_result = $user_amount;

        $update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='$bet_result',bet_final_result='$bet_final_result' where bet_id='$bet_id' and bet_status=1");

        if ($conn->affected_rows > 0) {

            $transaction_id = $bet_id . '-' . $bet_user_id;

            $account_description = "#Win $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
            if (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $actual_win_amount2 != 0)) {
                $insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','$actual_win_amount2','Credit','4','$transaction_time','1',1,'$transaction_id')");
            }
            if (INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $actual_win_amount2 != 0))) {
                $conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','$actual_win_amount2','Credit','4','$transaction_time','1',1,'$transaction_id')");
            }


            $level_pers = get_level_per($conn, $bet_user_id);
            foreach ($level_pers as $debit_user_id => $level_per) {

                $debit_amt = 0 - (($actual_win_amount2 / 100) * $level_per);

                $transaction_id = $bet_id . '-' . $debit_user_id;

                $account_descriptionSMDL = "#Loss $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
                if (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $debit_amt != 0)) {
                    $insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$debit_amt','Debit','7','$transaction_time','1',1,'$transaction_id')");
                }
                if (INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $debit_amt != 0))) {
                    $conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$debit_amt','Debit','7','$transaction_time','1',1,'$transaction_id')");
                }
            }
        }
    } else if ($result_status == 'Loss') {
        echo "loss";
        $bet_winning_amount22 = $bet_winning_amount - $bet_amount;
        $update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='$user_amount',bet_final_result='$bet_final_result'  where bet_id='$bet_id' and bet_status=1");

        if ($conn->affected_rows > 0) {

            $transaction_id = $bet_id . '-' . $bet_user_id;

            $account_description = "#Loss $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
            if (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $user_amount != 0)) {
                $insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','$user_amount','Debit','7','$transaction_time','1',1,'$transaction_id')");
            }
            if (INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $user_amount != 0))) {
                $conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','$user_amount','Debit','7','$transaction_time','1',1,'$transaction_id')");
            }

            $level_pers = get_level_per($conn, $bet_user_id);
            foreach ($level_pers as $cradit_user_id => $level_per) {

                $cradit_amt = ($bet_amount / 100) * $level_per;

                $transaction_id = $bet_id . '-' . $cradit_user_id;

                $account_descriptionSMDL = "#Win $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
                if (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $cradit_amt != 0)) {
                    $insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$cradit_amt','Credit','4','$transaction_time','1',1,'$transaction_id')");
                }
                if (INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $cradit_amt != 0))) {
                    $conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$cradit_amt','Credit','4','$transaction_time','1',1,'$transaction_id')");
                }
            }
        }
    }
    return true;
}

$conn->query("delete from exposure_details where event_id='$mid' and market_type ='$event_type'");
echo "done";
?>