<?php
exit();
include('../include/conn.php');

$bet_event_type = $current_bet['bet_event_type'];
$bet_event_id = $current_bet['bet_event_id'];
$bet_market_id = $current_bet['bet_market_id'];
$bet_margin_used = $current_bet['bet_margin_used'];
$bet_win_amount = $current_bet['bet_win_amount'];
$bet_odds = $current_bet['bet_odds'];
$bet_type = $current_bet['bet_market_type'];
$bet_type_exposure = $current_bet['bet_type'];
$stack = $current_bet['stack'];
$runs = $current_bet['runs'];
$exposure_datetime = date("Y-m-d H:i:s");
$bet_type_check = false;



$bet_market_type2 = "";
if (isset($current_bet['bet_market_type2'])) {
    $bet_market_type2 = $current_bet['bet_market_type2'];
}

if (strpos($bet_type, "OVER_UNDER") !== false) {
    $bet_type_check = true;
}

if ($bet_type == "KHADO_ODDS") {

    $check_market_exposure_exit = $conn->query("select * from exposure_details where user_id=$user_id and event_id='$bet_event_id' and market_id='$bet_market_id' and market_type='$bet_type'");

    $check_num_rows = mysqli_num_rows($check_market_exposure_exit);

    if ($check_num_rows <= 0) {
        //insert
        $conn->query("insert into exposure_details (user_id,event_id,market_id,market_type,exposure_amount,exposure_datetime,max_winning_amount) values('$user_id','$bet_event_id','$bet_market_id','$bet_type','-$bet_margin_used','$exposure_datetime','$bet_win_amount')");
    } else {
        //change net exposure

        //$exposure_data = get_current_bet_fancy_exposure2($conn,$user_id,$bet_event_id,$bet_market_id);
        //$exposure_data = min($exposure_data);
        $update_exposure_data = $conn->query("update exposure_details set exposure_amount = exposure_amount - '$stack',max_winning_amount='$bet_win_amount',exposure_datetime='$exposure_datetime' where user_id=$user_id and event_id='$bet_event_id' and market_id='$bet_market_id' and market_type='$bet_type'");
    }
} else if ($bet_type == "FANCY_ODDS" or $bet_type == "FANCY1_ODDS" or $bet_type == "BALL_ODDS") {


    if ($bet_market_type2 == "SUPER_OVER" or $bet_market_type2 == "FIVE_5_CRICKET") {
        /* if($bet_type == "FANCY1_ODDS"){
                $bet_market_type2 = "FANCY_ODDS";
                $bet_type = "FANCY_ODDS";
            } */
    }

    $check_market_exposure_exit = $conn->query("select * from exposure_details where user_id=$user_id and event_id='$bet_event_id' and market_id='$bet_market_id' and market_type='$bet_type'");

    $check_num_rows = mysqli_num_rows($check_market_exposure_exit);

    if ($check_num_rows <= 0) {
        //insert
        $conn->query("insert into exposure_details (user_id,event_id,market_id,market_type,exposure_amount,exposure_datetime,max_winning_amount) values('$user_id','$bet_event_id','$bet_market_id','$bet_type','-$bet_margin_used','$exposure_datetime','$bet_win_amount')");
    } else {
        //change net exposure

        if ($bet_market_type2 == "SUPER_OVER" or $bet_market_type2 == "FIVE_5_CRICKET") {

            $exposure_data = get_current_bet_fancy_casino_exposure2($conn, $user_id, $bet_event_id, $bet_market_id, $bet_market_type2);
        } else {
            $exposure_data = get_current_bet_fancy_exposure2($conn, $user_id, $bet_event_id, $bet_market_id);
        }


        $exposure_data = min($exposure_data);
        $max_exposure_data = max($exposure_data);
        if ($max_exposure_data < 0) {
            $max_exposure_data = 0;
        }
        $update_exposure_data = $conn->query("update exposure_details set exposure_amount='$exposure_data',max_winning_amount='$max_exposure_data',exposure_datetime='$exposure_datetime' where user_id=$user_id and event_id='$bet_event_id' and market_id='$bet_market_id' and market_type='$bet_type'");
    }
} else if ($bet_type == "MATCH_ODDS" or $bet_type == "BOOKMAKER_ODDS" or $bet_type == "BOOKMAKERSMALL_ODDS"  or $bet_type_check == true) {

    $check_market_exposure_exit = $conn->query("select * from exposure_details where user_id=$user_id and event_id='$bet_event_id' and market_type='$bet_type'");
    $check_num_rows = mysqli_num_rows($check_market_exposure_exit);

    if ($check_num_rows <= 0) {
        //insert
        $conn->query("insert into exposure_details (user_id,event_id,market_type,exposure_amount,exposure_datetime,event_type,max_winning_amount) values('$user_id','$bet_event_id','$bet_type','-$bet_margin_used','$exposure_datetime','$bet_event_type','$bet_win_amount')");
    } else {
        $exposure_data_all = get_net_exposure_match_oods($conn, $user_id, $bet_event_id, $bet_type, $bet_type_exposure, $stack, $runs, array(), 1);
        $exposure_data = min($exposure_data_all);
        $max_exposure_data = max($exposure_data_all);
        if ($max_exposure_data < 0) {
            $max_exposure_data = 0;
        }
        $update_exposure_data = $conn->query("update exposure_details set exposure_amount='$exposure_data',max_winning_amount='$max_exposure_data',exposure_datetime='$exposure_datetime' where user_id=$user_id and event_id='$bet_event_id' and market_type='$bet_type'");
    }
} else {

    $bet_market_name = "";
    $where = "";
    if (isset($current_bet['bet_market_name'])) {
        $bet_market_name = $current_bet['bet_market_name'];
        $where = " and casino_back_name='$bet_market_name'";
    }

    $check_market_exposure_exit = $conn->query("select * from exposure_details where user_id=$user_id and event_id='$bet_event_id' and market_type='$bet_type' $where");
    $check_num_rows = mysqli_num_rows($check_market_exposure_exit);

    if ($check_num_rows <= 0) {
        //insert
        $conn->query("insert into exposure_details (user_id,event_id,market_type,exposure_amount,exposure_datetime,casino_back_name,max_winning_amount) values('$user_id','$bet_event_id','$bet_type','-$bet_margin_used','$exposure_datetime','$bet_market_name','$bet_win_amount')");
    } else {

        if ($bet_type == "INSTANT_WORLI") {
            $conn->query("insert into exposure_details (user_id,event_id,market_type,exposure_amount,exposure_datetime,casino_back_name,max_winning_amount) values('$user_id','$bet_event_id','$bet_type','-$bet_margin_used','$exposure_datetime','$bet_market_name','$bet_win_amount')");
        } else {
            $exposure_data = get_net_exposure_casino_oods($conn, $user_id, $bet_event_id, $bet_type, $bet_type_exposure, $stack, $runs, $bet_market_name);

            $max_exposure_data = abs($exposure_data);


            $update_exposure_data = $conn->query("update exposure_details set exposure_amount='$exposure_data',max_winning_amount='$max_exposure_data',exposure_datetime='$exposure_datetime' where user_id=$user_id and event_id='$bet_event_id' and market_type='$bet_type' and casino_back_name='$bet_market_name'");
        }
    }
}

?>