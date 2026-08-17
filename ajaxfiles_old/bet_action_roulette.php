<?php
include('../include/conn.php');
include "../session.php";
function generateRandomString($length = 18)
{
    if (function_exists('random_bytes')) {
        $bytes = random_bytes($length);
    } elseif (function_exists('openssl_random_pseudo_bytes')) {
        $bytes = openssl_random_pseudo_bytes($length);
    } else {
        // Fallback (not secure)
        $characters = '0123456789abcdefghijklmvwxyzABCDEFGHInopqrstuJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $bytes = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $bytes;
    }

    return substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $length);
}

include('../include/flip_function.php');
include('../include/flip_function2.php');
$user_id = $_SESSION['CLIENT_LOGIN_ID'];
$eventType = $conn->real_escape_string($_POST['eventType']);
$eventId = $conn->real_escape_string($_POST['eventId']);
$action_type = $conn->real_escape_string($_POST['action_type']);

$all_market_id = array();
if ($action_type == "undo") {
    $get_all_open_bet_data2 = $conn->query("SELECT bet_id as all_bet_id,market_id as all_market_id FROM bet_teen_details where 1=1 and event_type='$eventType' and user_id=$user_id and bet_status=1 and event_id = $eventId order by bet_time desc limit 1");
    if (mysqli_num_rows($get_all_open_bet_data2) <= 0) {
        $return_array = array(
            "status" => 'error',
            "message" => "Bet Not Confirm Last transaction not valid.",
        );

        echo json_encode($return_array);
        exit();
    }
    $fetch_data = mysqli_fetch_assoc($get_all_open_bet_data2);
    $bet_idd = $fetch_data['all_bet_id'];
    $all_market_id_db = $fetch_data['all_market_id'];
    if (!empty($all_market_id_db)) {
        $all_market_id = explode(",", $all_market_id_db);
    }
    if (!empty($bet_idd)) {
        $conn->query("update bet_teen_details set bet_status=2 where bet_id in ($bet_idd) and event_type='$eventType' and user_id=$user_id and bet_status=1 and event_id = $eventId");

        $exposure_data = get_net_exposure_casino_roullete($conn, $user_id, $eventId, $eventType);
        $max_exposure_data = abs($exposure_data);
        $update_exposure_data = $conn->query("update exposure_details set exposure_amount='$exposure_data',max_winning_amount='$max_exposure_data' where user_id=$user_id and event_id='$eventId' and market_type='$eventType' and casino_back_name=''");
    }
} else if ($action_type == "clear") {
    $get_all_open_bet_data2 = $conn->query("SELECT GROUP_CONCAT(bet_id) as all_bet_id,GROUP_CONCAT(market_id) as all_market_id FROM bet_teen_details where 1=1 and event_type='$eventType' and user_id=$user_id and bet_status=1 and event_id = $eventId order by bet_time desc");
    if (mysqli_num_rows($get_all_open_bet_data2) <= 0) {
        $return_array = array(
            "status" => 'error',
            "message" => "Bet Not Confirm Last transaction not valid.",
        );

        echo json_encode($return_array);
        exit();
    }
    $fetch_data = mysqli_fetch_assoc($get_all_open_bet_data2);
    $bet_idd = $fetch_data['all_bet_id'];
    $all_market_id_db = $fetch_data['all_market_id'];
    if (!empty($all_market_id_db)) {
        $all_market_id = explode(",", $all_market_id_db);
    }
    if (!empty($bet_idd)) {
        $conn->query("update bet_teen_details set bet_status=2 where bet_id in ($bet_idd) and event_type='$eventType' and user_id=$user_id and bet_status=1 and event_id = $eventId");

        $exposure_data = get_net_exposure_casino_roullete($conn, $user_id, $eventId, $eventType);
        $max_exposure_data = abs($exposure_data);
        $update_exposure_data = $conn->query("update exposure_details set exposure_amount='$exposure_data',max_winning_amount='$max_exposure_data' where user_id=$user_id and event_id='$eventId' and market_type='$eventType' and casino_back_name=''");
    }
} else if ($action_type == "repeat") {
    //$all_old_bet=$conn->real_escape_string($_POST['all_old_bet']);
    $exposure = 0;
    $bet_ip_address = '';
    if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
        $bet_ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
    } else {
        $bet_ip_address = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    }

    $bet_user_agent = $_SERVER['HTTP_USER_AGENT'];
    /* if(!empty($all_old_bet)){ */


    $datee = date("Y-m-d");
    $get_all_open_bet_data21 = $conn->query("SELECT * FROM bet_teen_details where event_id != '$eventId' and event_type='$eventType'  AND bet_status in ('0','1') AND user_id=$user_id and date(bet_time)='$datee' order by bet_id desc limit 1");
    if (mysqli_num_rows($get_all_open_bet_data21) <= 0) {
        $return_array = array(
            "status" => 'error',
            "message" => "Bet Not Confirm Last transaction not valid.",
        );

        echo json_encode($return_array);
        exit();
    }
    $fetch_data_old_new = mysqli_fetch_assoc($get_all_open_bet_data21);
    $db_event_id = $fetch_data_old_new['event_id'];
    $get_all_open_bet_data2 = $conn->query("SELECT * FROM bet_teen_details where event_id = '$db_event_id' and event_type='$eventType' AND user_id=$user_id and date(bet_time)='$datee' AND bet_status != '2' order by bet_id desc");
    if (mysqli_num_rows($get_all_open_bet_data2) > 0) {
        $check_account_amount = $conn->query("select sum(amount) as total_account_balance from accounts where user_id=$user_id");
        $fetch_check_account_amount = mysqli_fetch_assoc($check_account_amount);
        $account_balance = $fetch_check_account_amount['total_account_balance'];

        $unmatched_exposure_balance = get_unmatched_expo($conn, $user_id);
        $final_net_exposure = get_total_net_exposure($conn, $user_id);
        $exposure_balance = $final_net_exposure;
        $check_plus_expo = $exposure_balance + $unmatched_exposure_balance;


        $get_userdata = $conn->query("select * from user_master where Id=$user_id");
        $fetch_userdata = mysqli_fetch_assoc($get_userdata);
        $net_exposure_limit = $fetch_userdata['net_exposure_limit'];


        $all_bet_margin_used = 0;
        $all_bet_bet_win_amount = 0;
        while ($fetch_data_old = mysqli_fetch_assoc($get_all_open_bet_data2)) {
            $db_bet_id = $fetch_data_old['bet_id'];

            $all_market_id_db = $fetch_data_old['market_id'];
            $bet_margin_used_db = $fetch_data_old['bet_margin_used'];
            $margin_used = $fetch_data_old['bet_margin_used'];


            $total_exposure = $margin_used;
            if ($check_plus_expo > 0) {
                $available_balance = $account_balance - $margin_used;
            } else {
                $available_balance = ($account_balance + $exposure_balance + $unmatched_exposure_balance) - $margin_used;
                $total_exposure = ($exposure_balance + $unmatched_exposure_balance) - $margin_used;
            }

            if ($available_balance < 0) {
                $return = array(
                    "status" => 'error',
                    "message" => 'Insufficient Funds. ',
                );
                echo json_encode($return);
                exit();
            }

            if (!empty($net_exposure_limit) && $net_exposure_limit < abs($total_exposure)) {

                $return = array(
                    "status" => 'error',
                    "message" => 'Bet Not Confirm Check Exposer Limit And Balance.' . number_format(abs($total_exposure), 2, ".", ""),
                );
                save_rejection_log($conn, $user_id, ($return['message'] . " #" . __LINE__), $market_runner_name, $page_call_time, $get_data, $url);
                echo json_encode($return);
                exit();
            }

            $bet_win_amount_db = $fetch_data_old['bet_win_amount'];
            $all_bet_margin_used += (int) $bet_margin_used_db;
            $all_bet_bet_win_amount += (int) $bet_win_amount_db;
            $all_market_id[] = $all_market_id_db;
            $bet_time = date('Y-m-d H:i:s');
            $randome_key = generateRandomString();
            $insertt = $conn->query("INSERT INTO `bet_teen_details`(`event_type`, `event_id`, `oddsmarketId`, `market_id`, `user_id`, `event_name`, `market_name`, `market_type`, `bet_type`, `bet_runs`, `bet_odds`, `bet_stack`, `bet_result`, `bet_margin_used`, `bet_win_amount`, `bet_time`, `bet_status`, `bet_ip_address`, `bet_user_agent`,`randomkey`) SELECT `event_type`, '$eventId', `oddsmarketId`, `market_id`, `user_id`, `event_name`, `market_name`, `market_type`, `bet_type`, `bet_runs`, `bet_odds`, `bet_stack`, '0', `bet_margin_used`, `bet_win_amount`, '$bet_time', '1', '$bet_ip_address', '$bet_user_agent','$randome_key' FROM bet_teen_details WHERE bet_id IN ($db_bet_id) AND bet_status in ('0','1') AND user_id=$user_id");
        }

        $exposure_data = get_net_exposure_casino_roullete($conn, $user_id, $eventId, $eventType);
        $max_exposure_data = abs($exposure_data);
        $fetch_expo = $conn->query("select * from exposure_details where user_id=$user_id and event_id='$eventId' and market_type='$eventType' and casino_back_name=''");
        if (mysqli_num_rows($fetch_expo) <= 0) {
            $insert_exposure_data = $conn->query("insert into exposure_details (user_id,event_id,market_type,exposure_amount,max_winning_amount,casino_back_name) values ($user_id,'$eventId','$eventType','$exposure_data','$max_exposure_data','');");
        } else {
            $update_exposure_data = $conn->query("update exposure_details set exposure_amount='$exposure_data',max_winning_amount='$max_exposure_data' where user_id=$user_id and event_id='$eventId' and market_type='$eventType' and casino_back_name=''");
        }
    }
    /* } */
}


$return_array = array(
    "status" => 'ok',
    "all_market_id" => $all_market_id,
);

echo json_encode($return_array);
