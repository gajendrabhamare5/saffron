<?php

include('../include/conn.php');
include('../include/level_percentage.php');
error_reporting(E_ALL);
ini_set("error_display", 1);
ini_set("error_startup_display", 1);

$result = $_REQUEST['result'];
$game_type = $_REQUEST['type'];
$mid = $_REQUEST['mid'];
$cards = $_REQUEST['cards'];
$cards2 = $_REQUEST['cards'];
$cards3 = $_REQUEST['cards'];

$mid = str_replace("29.", "", $mid);
$event_type = "32CARDSB";

$cards = new stdClass();
$cards->{'ASS'} = array(
    'type' => 'diamond',
    'name' => 'A',
    'rank' => 1,
    'priority' => 14
);
$cards->{'ADD'} = array(
    'type' => 'heart',
    'name' => 'A',
    'rank' => 1,
    'priority' => 14
);
$cards->{'AHH'} = array(
    'type' => 'spade',
    'name' => 'A',
    'rank' => 1,
    'priority' => 14
);
$cards->{'ACC'} = array(
    'type' => 'club',
    'name' => 'A',
    'rank' => 1,
    'priority' => 14
);

$cards->{'ass'} = array(
    'type' => 'diamond',
    'name' => 'A',
    'rank' => 1,
    'priority' => 14
);
$cards->{'add'} = array(
    'type' => 'heart',
    'name' => 'A',
    'rank' => 1,
    'priority' => 14
);
$cards->{'ahh'} = array(
    'type' => 'spade',
    'name' => 'A',
    'rank' => 1,
    'priority' => 14
);
$cards->{'acc'} = array(
    'type' => 'club',
    'name' => 'A',
    'rank' => 1,
    'priority' => 14
);

$cards->{'2SS'} = array(
    'type' => 'diamond',
    'name' => '2',
    'rank' => 2,
    'priority' => 2
);
$cards->{'2DD'} = array(
    'type' => 'heart',
    'name' => '2',
    'rank' => 2,
    'priority' => 2
);
$cards->{'2HH'} = array(
    'type' => 'spade',
    'name' => '2',
    'rank' => 2,
    'priority' => 2
);
$cards->{'2CC'} = array(
    'type' => 'club',
    'name' => '2',
    'rank' => 2,
    'priority' => 2
);

$cards->{'3SS'} = array(
    'type' => 'diamond',
    'name' => '3',
    'rank' => 3,
    'priority' => 3
);
$cards->{'3DD'} = array(
    'type' => 'heart',
    'name' => '3',
    'rank' => 3,
    'priority' => 3
);
$cards->{'3HH'} = array(
    'type' => 'spade',
    'name' => '3',
    'rank' => 3,
    'priority' => 3
);
$cards->{'3CC'} = array(
    'type' => 'club',
    'name' => '3',
    'rank' => 3,
    'priority' => 3
);

$cards->{'4SS'} = array(
    'type' => 'diamond',
    'name' => '4',
    'rank' => 4,
    'priority' => 4
);
$cards->{'4DD'} = array(
    'type' => 'heart',
    'name' => '4',
    'rank' => 4,
    'priority' => 4
);
$cards->{'4HH'} = array(
    'type' => 'spade',
    'name' => '4',
    'rank' => 4,
    'priority' => 4
);
$cards->{'4CC'} = array(
    'type' => 'club',
    'name' => '4',
    'rank' => 4,
    'priority' => 4
);

$cards->{'5SS'} = array(
    'type' => 'diamond',
    'name' => '5',
    'rank' => 5,
    'priority' => 5
);
$cards->{'5DD'} = array(
    'type' => 'heart',
    'name' => '5',
    'rank' => 5,
    'priority' => 5
);
$cards->{'5HH'} = array(
    'type' => 'spade',
    'name' => '5',
    'rank' => 5,
    'priority' => 5
);
$cards->{'5CC'} = array(
    'type' => 'club',
    'name' => '5',
    'rank' => 5,
    'priority' => 5
);

$cards->{'6SS'} = array(
    'type' => 'diamond',
    'name' => '6',
    'rank' => 6,
    'priority' => 6
);
$cards->{'6DD'} = array(
    'type' => 'heart',
    'name' => '6',
    'rank' => 6,
    'priority' => 6
);
$cards->{'6HH'} = array(
    'type' => 'spade',
    'name' => '6',
    'rank' => 6,
    'priority' => 6
);
$cards->{'6CC'} = array(
    'type' => 'club',
    'name' => '6',
    'rank' => 6,
    'priority' => 6
);

$cards->{'7SS'} = array(
    'type' => 'diamond',
    'name' => '7',
    'rank' => 7,
    'priority' => 7
);
$cards->{'7DD'} = array(
    'type' => 'heart',
    'name' => '7',
    'rank' => 7,
    'priority' => 7
);
$cards->{'7HH'} = array(
    'type' => 'spade',
    'name' => '7',
    'rank' => 7,
    'priority' => 7
);
$cards->{'7CC'} = array(
    'type' => 'club',
    'name' => '7',
    'rank' => 7,
    'priority' => 7
);

$cards->{'8SS'} = array(
    'type' => 'diamond',
    'name' => '8',
    'rank' => 8,
    'priority' => 8
);
$cards->{'8DD'} = array(
    'type' => 'heart',
    'name' => '8',
    'rank' => 8,
    'priority' => 8
);
$cards->{'8HH'} = array(
    'type' => 'spade',
    'name' => '8',
    'rank' => 8,
    'priority' => 8
);
$cards->{'8CC'} = array(
    'type' => 'club',
    'name' => '8',
    'rank' => 8,
    'priority' => 8
);

$cards->{'9SS'} = array(
    'type' => 'diamond',
    'name' => '9',
    'rank' => 9,
    'priority' => 9
);
$cards->{'9DD'} = array(
    'type' => 'heart',
    'name' => '9',
    'rank' => 9,
    'priority' => 9
);
$cards->{'9HH'} = array(
    'type' => 'spade',
    'name' => '9',
    'rank' => 9,
    'priority' => 9
);
$cards->{'9CC'} = array(
    'type' => 'club',
    'name' => '9',
    'rank' => 9,
    'priority' => 9
);

$cards->{'10SS'} = array(
    'type' => 'diamond',
    'name' => '10',
    'rank' => 10,
    'priority' => 10
);
$cards->{'10DD'} = array(
    'type' => 'heart',
    'name' => '10',
    'rank' => 10,
    'priority' => 10
);
$cards->{'10HH'} = array(
    'type' => 'spade',
    'name' => '10',
    'rank' => 10,
    'priority' => 10
);
$cards->{'10CC'} = array(
    'type' => 'club',
    'name' => '10',
    'rank' => 10,
    'priority' => 10
);

$cards->{'JSS'} = array(
    'type' => 'diamond',
    'name' => 'J',
    'rank' => 11,
    'priority' => 11
);
$cards->{'JDD'} = array(
    'type' => 'heart',
    'name' => 'J',
    'rank' => 11,
    'priority' => 11
);
$cards->{'JHH'} = array(
    'type' => 'spade',
    'name' => 'J',
    'rank' => 11,
    'priority' => 11
);
$cards->{'JCC'} = array(
    'type' => 'club',
    'name' => 'J',
    'rank' => 11,
    'priority' => 11
);

$cards->{'QSS'} = array(
    'type' => 'diamond',
    'name' => 'Q',
    'rank' => 12,
    'priority' => 12
);
$cards->{'QDD'} = array(
    'type' => 'heart',
    'name' => 'Q',
    'rank' => 12,
    'priority' => 12
);
$cards->{'QHH'} = array(
    'type' => 'spade',
    'name' => 'Q',
    'rank' => 12,
    'priority' => 12
);
$cards->{'QCC'} = array(
    'type' => 'club',
    'name' => 'Q',
    'rank' => 12,
    'priority' => 12
);

$cards->{'KSS'} = array(
    'type' => 'diamond',
    'name' => 'K',
    'rank' => 13,
    'priority' => 13
);
$cards->{'KDD'} = array(
    'type' => 'heart',
    'name' => 'K',
    'rank' => 13,
    'priority' => 13
);
$cards->{'KHH'} = array(
    'type' => 'spade',
    'name' => 'K',
    'rank' => 13,
    'priority' => 13
);
$cards->{'KCC'} = array(
    'type' => 'club',
    'name' => 'K',
    'rank' => 13,
    'priority' => 13
);
$cards->{'ass'} = array(
    'type' => 'diamond',
    'name' => 'A',
    'rank' => 1,
    'priority' => 14
);
$cards->{'add'} = array(
    'type' => 'heart',
    'name' => 'A',
    'rank' => 1,
    'priority' => 14
);
$cards->{'ahh'} = array(
    'type' => 'spade',
    'name' => 'A',
    'rank' => 1,
    'priority' => 14
);
$cards->{'acc'} = array(
    'type' => 'club',
    'name' => 'A',
    'rank' => 1,
    'priority' => 14
);

$cards->{'ass'} = array(
    'type' => 'diamond',
    'name' => 'A',
    'rank' => 1,
    'priority' => 14
);
$cards->{'add'} = array(
    'type' => 'heart',
    'name' => 'A',
    'rank' => 1,
    'priority' => 14
);
$cards->{'ahh'} = array(
    'type' => 'spade',
    'name' => 'A',
    'rank' => 1,
    'priority' => 14
);
$cards->{'acc'} = array(
    'type' => 'club',
    'name' => 'A',
    'rank' => 1,
    'priority' => 14
);

$cards->{'2ss'} = array(
    'type' => 'diamond',
    'name' => '2',
    'rank' => 2,
    'priority' => 2
);
$cards->{'2dd'} = array(
    'type' => 'heart',
    'name' => '2',
    'rank' => 2,
    'priority' => 2
);
$cards->{'2hh'} = array(
    'type' => 'spade',
    'name' => '2',
    'rank' => 2,
    'priority' => 2
);
$cards->{'2cc'} = array(
    'type' => 'club',
    'name' => '2',
    'rank' => 2,
    'priority' => 2
);

$cards->{'3ss'} = array(
    'type' => 'diamond',
    'name' => '3',
    'rank' => 3,
    'priority' => 3
);
$cards->{'3dd'} = array(
    'type' => 'heart',
    'name' => '3',
    'rank' => 3,
    'priority' => 3
);
$cards->{'3hh'} = array(
    'type' => 'spade',
    'name' => '3',
    'rank' => 3,
    'priority' => 3
);
$cards->{'3cc'} = array(
    'type' => 'club',
    'name' => '3',
    'rank' => 3,
    'priority' => 3
);

$cards->{'4ss'} = array(
    'type' => 'diamond',
    'name' => '4',
    'rank' => 4,
    'priority' => 4
);
$cards->{'4dd'} = array(
    'type' => 'heart',
    'name' => '4',
    'rank' => 4,
    'priority' => 4
);
$cards->{'4hh'} = array(
    'type' => 'spade',
    'name' => '4',
    'rank' => 4,
    'priority' => 4
);
$cards->{'4cc'} = array(
    'type' => 'club',
    'name' => '4',
    'rank' => 4,
    'priority' => 4
);

$cards->{'5ss'} = array(
    'type' => 'diamond',
    'name' => '5',
    'rank' => 5,
    'priority' => 5
);
$cards->{'5dd'} = array(
    'type' => 'heart',
    'name' => '5',
    'rank' => 5,
    'priority' => 5
);
$cards->{'5hh'} = array(
    'type' => 'spade',
    'name' => '5',
    'rank' => 5,
    'priority' => 5
);
$cards->{'5cc'} = array(
    'type' => 'club',
    'name' => '5',
    'rank' => 5,
    'priority' => 5
);

$cards->{'6ss'} = array(
    'type' => 'diamond',
    'name' => '6',
    'rank' => 6,
    'priority' => 6
);
$cards->{'6dd'} = array(
    'type' => 'heart',
    'name' => '6',
    'rank' => 6,
    'priority' => 6
);
$cards->{'6hh'} = array(
    'type' => 'spade',
    'name' => '6',
    'rank' => 6,
    'priority' => 6
);
$cards->{'6cc'} = array(
    'type' => 'club',
    'name' => '6',
    'rank' => 6,
    'priority' => 6
);

$cards->{'7ss'} = array(
    'type' => 'diamond',
    'name' => '7',
    'rank' => 7,
    'priority' => 7
);
$cards->{'7dd'} = array(
    'type' => 'heart',
    'name' => '7',
    'rank' => 7,
    'priority' => 7
);
$cards->{'7hh'} = array(
    'type' => 'spade',
    'name' => '7',
    'rank' => 7,
    'priority' => 7
);
$cards->{'7cc'} = array(
    'type' => 'club',
    'name' => '7',
    'rank' => 7,
    'priority' => 7
);

$cards->{'8ss'} = array(
    'type' => 'diamond',
    'name' => '8',
    'rank' => 8,
    'priority' => 8
);
$cards->{'8dd'} = array(
    'type' => 'heart',
    'name' => '8',
    'rank' => 8,
    'priority' => 8
);
$cards->{'8hh'} = array(
    'type' => 'spade',
    'name' => '8',
    'rank' => 8,
    'priority' => 8
);
$cards->{'8cc'} = array(
    'type' => 'club',
    'name' => '8',
    'rank' => 8,
    'priority' => 8
);

$cards->{'9ss'} = array(
    'type' => 'diamond',
    'name' => '9',
    'rank' => 9,
    'priority' => 9
);
$cards->{'9dd'} = array(
    'type' => 'heart',
    'name' => '9',
    'rank' => 9,
    'priority' => 9
);
$cards->{'9hh'} = array(
    'type' => 'spade',
    'name' => '9',
    'rank' => 9,
    'priority' => 9
);
$cards->{'9cc'} = array(
    'type' => 'club',
    'name' => '9',
    'rank' => 9,
    'priority' => 9
);

$cards->{'10ss'} = array(
    'type' => 'diamond',
    'name' => '10',
    'rank' => 10,
    'priority' => 10
);
$cards->{'10dd'} = array(
    'type' => 'heart',
    'name' => '10',
    'rank' => 10,
    'priority' => 10
);
$cards->{'10hh'} = array(
    'type' => 'spade',
    'name' => '10',
    'rank' => 10,
    'priority' => 10
);
$cards->{'10cc'} = array(
    'type' => 'club',
    'name' => '10',
    'rank' => 10,
    'priority' => 10
);

$cards->{'jss'} = array(
    'type' => 'diamond',
    'name' => 'J',
    'rank' => 11,
    'priority' => 11
);
$cards->{'jdd'} = array(
    'type' => 'heart',
    'name' => 'J',
    'rank' => 11,
    'priority' => 11
);
$cards->{'jhh'} = array(
    'type' => 'spade',
    'name' => 'J',
    'rank' => 11,
    'priority' => 11
);
$cards->{'jcc'} = array(
    'type' => 'club',
    'name' => 'J',
    'rank' => 11,
    'priority' => 11
);

$cards->{'qss'} = array(
    'type' => 'diamond',
    'name' => 'Q',
    'rank' => 12,
    'priority' => 12
);
$cards->{'qdd'} = array(
    'type' => 'heart',
    'name' => 'Q',
    'rank' => 12,
    'priority' => 12
);
$cards->{'qhh'} = array(
    'type' => 'spade',
    'name' => 'Q',
    'rank' => 12,
    'priority' => 12
);
$cards->{'qcc'} = array(
    'type' => 'club',
    'name' => 'Q',
    'rank' => 12,
    'priority' => 12
);

$cards->{'kss'} = array(
    'type' => 'diamond',
    'name' => 'K',
    'rank' => 13,
    'priority' => 13
);
$cards->{'kdd'} = array(
    'type' => 'heart',
    'name' => 'K',
    'rank' => 13,
    'priority' => 13
);
$cards->{'khh'} = array(
    'type' => 'spade',
    'name' => 'K',
    'rank' => 13,
    'priority' => 13
);
$cards->{'kcc'} = array(
    'type' => 'club',
    'name' => 'K',
    'rank' => 13,
    'priority' => 13
);

$result_time = date("Y-m-d H:i:s");
$market_ids = array();

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


$cards2 = json_decode($cards2);
$is_any_three_cards_black = is_any_three_cards_black($cards2, $cards);
if ($is_any_three_cards_black) {
    $market_id_c = 13;
} else {
    $is_any_three_cards_red = is_any_three_cards_red($cards2, $cards);
    if ($is_any_three_cards_red) {
        $market_id_c = 14;
    } else {
        $is_two_black_red = is_two_black_red($cards2, $cards);
        if ($is_two_black_red) {
            $market_id_c = 27;
        }
    }
}


$is_player_8_even = is_player_even($cards2[0], $cards);
if ($is_player_8_even) {
    $market_ids[] = 6;
    $bet_final_result .= ' | 8:Even';
} else {
    $market_ids[] = 5;
    $bet_final_result .= ' | 8:Odd';
}

$is_player_9_even = is_player_even($cards2[1], $cards);
if ($is_player_9_even) {
    $market_ids[] = 8;
    $bet_final_result .= ' | 9:Even';
} else {
    $market_ids[] = 7;
    $bet_final_result .= ' | 9:Odd';
}

$is_player_10_even = is_player_even($cards2[2], $cards);
if ($is_player_10_even) {
    $market_ids[] = 10;
    $bet_final_result .= ' | 10:Even';
} else {
    $market_ids[] = 9;
    $bet_final_result .= ' | 10:Odd';
}


$is_player_11_even = is_player_even($cards2[3], $cards);
if ($is_player_11_even) {
    $market_ids[] = 12;
    $bet_final_result .= ' | 11:Even';
} else {
    $market_ids[] = 11;
    $bet_final_result .= ' | 11:Odd';
}

$is_total_8_9_win = is_total_8_9_win($cards2[0], $cards2[1], $cards2[2], $cards2[3], $cards);
if ($is_total_8_9_win) {
    $market_ids[] = 25;
} else {
    $is_total_10_11_win = is_total_10_11_win($cards2[0], $cards2[1], $cards2[2], $cards2[3], $cards);
    if ($is_total_10_11_win) {
        $market_ids[] = 26;
    }
}


$check_single_bet = check_single_bet($cards2[0], $cards2[1], $cards2[2], $cards2[3], $cards);
$market_ids[] = $check_single_bet;

$check_result_already_insert = $conn->query("select * from twenty_teenpatti_result where event_id='$mid'");
$row_count = mysqli_fetch_row($check_result_already_insert);



$conn->query("insert into twenty_teenpatti_result (event_id,game_type,result_status,cards,result_time) VALUES('$mid','$game_type','$result_status','$cards3','$result_time')");
/* if($row_count > 0){
  echo "ok";
  exit();
  } */

$end_date_time = date("Y-m-d H:i:s");
$transaction_time = date("Y-m-d H:i:s");
$transaction_time2 = date("d-m-Y H:i:s");

$get_all_bet = $conn->query("select * from bet_teen_details where event_id='$mid' and event_type='$event_type' and bet_status=1");
while ($fetch_get_all_bet = mysqli_fetch_assoc($get_all_bet)) {
    echo $bet_id = $fetch_get_all_bet['bet_id'];
    $bet_user_id = $fetch_get_all_bet['user_id'];
    $bet_market_id = $fetch_get_all_bet['market_id'];
    $bet_market_name = $fetch_get_all_bet['market_name'];
    $bet_amount = $fetch_get_all_bet['bet_margin_used'];
    $bet_odds = $fetch_get_all_bet['bet_odds'];
    $bet_stack = $fetch_get_all_bet['bet_stack'];
    $bet_winning_amount = $fetch_get_all_bet['bet_win_amount'];
    $bet_type = $fetch_get_all_bet['bet_type'];
    $actual_win_amount2 = $bet_winning_amount;
    $get_parent_ids = $conn->query("select * from user_login_master where UserID=$bet_user_id");
    $fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
    $parentDL = $fetch_parent_ids['parentDL'];
    $parentMDL = $fetch_parent_ids['parentMDL'];
    $parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];

    if ($bet_market_id <= 4) {
        if ($bet_market_id == $market_id and $bet_type == "Back") {
            set_result($conn, $bet_id, "Win", $mid, $end_date_time,$bet_final_result);
        } else if ($bet_market_id != $market_id and $bet_type == "Lay") {
            set_result($conn, $bet_id, "Win", $mid, $end_date_time,$bet_final_result);
        } else {
            set_result($conn, $bet_id, "Loss", $mid, $end_date_time,$bet_final_result);
        }
    }


    if ($bet_market_id == 13 or $bet_market_id == 14 or $bet_market_id == 27) {
        if ($bet_market_id == $market_id_c and $bet_type == "Back") {
            set_result($conn, $bet_id, "Win", $mid, $end_date_time,$bet_final_result);
        } else if ($bet_market_id != $market_id_c and $bet_type == "Lay") {
            set_result($conn, $bet_id, "Win", $mid, $end_date_time,$bet_final_result);
        } else {
            set_result($conn, $bet_id, "Loss", $mid, $end_date_time,$bet_final_result);
        }
    }

    if (($bet_market_id >= 5 and $bet_market_id <= 12) or ( $bet_market_id >= 15 and $bet_market_id <= 26)) {
        if (in_array($bet_market_id, $market_ids)) {
            $user_amount = $actual_win_amount2;
            $smdl_amount = -$actual_win_amount2;

            $bet_result = ($bet_odds - 1 ) * $bet_stack;
            $update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='$bet_result',bet_final_result='$bet_final_result' where bet_id='$bet_id' and bet_status=1");
            
            if($conn->affected_rows > 0){
				$transaction_id = $bet_id.'-'.$bet_user_id;
				
				$account_description = "#Win $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
				$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','$bet_result','Credit','4','$transaction_time','1',1,'$transaction_id')");

				$level_pers = get_level_per($conn, $bet_user_id);
				foreach ($level_pers as $debit_user_id => $level_per) {

					$debit_amt = 0 - (($actual_win_amount2 / 100) * $level_per);
				
					$transaction_id = $bet_id.'-'.$debit_user_id;

					$account_descriptionSMDL = "#Loss $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
					$insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$debit_amt','Debit','7','$transaction_time','1',1,'$transaction_id')");
				}
            }
        } else {


            $bet_winning_amount22 = ($bet_odds - 1 ) * $bet_stack;
            $update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='-$bet_stack',bet_final_result='$bet_final_result'  where bet_id='$bet_id' and bet_status=1");
			if($conn->affected_rows > 0){
				$transaction_id = $bet_id.'-'.$bet_user_id;
			
				$account_description = "#Loss $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
				$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','-$bet_stack','Debit','7','$transaction_time','1',1,'$transaction_id')");

				$level_pers = get_level_per($conn, $bet_user_id);
				foreach ($level_pers as $cradit_user_id => $level_per) {

					$cradit_amt = ($bet_amount / 100) * $level_per;
				
					$transaction_id = $bet_id.'-'.$cradit_user_id;

					$account_descriptionSMDL = "#Win $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
					$insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$cradit_amt','Credit','4','$transaction_time','1',1,'$transaction_id')");
				}
            }
        }
    }
}

function set_result($conn, $bet_id, $result_status, $mid, $end_date_time,$bet_final_result='') {


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

		if($conn->affected_rows > 0){
		
			$transaction_id = $bet_id.'-'.$bet_user_id;
			$account_description = "#Win $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
			$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','$actual_win_amount2','Credit','4','$transaction_time','1',1,'$transaction_id')");

			$level_pers = get_level_per($conn, $bet_user_id);
			foreach ($level_pers as $debit_user_id => $level_per) {

				$debit_amt = 0 - (($actual_win_amount2 / 100) * $level_per);
				
				$transaction_id = $bet_id.'-'.$debit_user_id;

				$account_descriptionSMDL = "#Loss $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
				$insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$debit_amt','Debit','7','$transaction_time','1',1,'$transaction_id')");
			}
        }
    } else if ($result_status == 'Loss') {
        echo "loss";
        $bet_winning_amount22 = $bet_winning_amount - $bet_amount;
        $update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='$user_amount' ,bet_final_result='$bet_final_result' where bet_id='$bet_id' and bet_status=1");

		if($conn->affected_rows > 0){
			$transaction_id = $bet_id.'-'.$bet_user_id;
			$account_description = "#Loss $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
			$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','$user_amount','Debit','7','$transaction_time','1',1,'$transaction_id')");

			$level_pers = get_level_per($conn, $bet_user_id);
			foreach ($level_pers as $cradit_user_id => $level_per) {

				$cradit_amt = ($bet_amount / 100) * $level_per;
				
				$transaction_id = $bet_id.'-'.$cradit_user_id;

				$account_descriptionSMDL = "#Win $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
				$insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$cradit_amt','Credit','4','$transaction_time','1',1,'$transaction_id')");
			}
        }
    }
    return true;
}

$conn->query("delete from exposure_details where event_id='$mid' and market_type ='$event_type'");
echo "done";

function is_any_three_cards_black($cards2, $cards) {

    $i = 0;
    $loop = 0;
    foreach ($cards2 as $card_data) {
        $card1 = $cards->$card_data;
        if ($card1['type'] == "spade" or $card1['type'] == "club") {
            $i++;
        }
        if ($loop >= 3) {
            break;
        }
        $loop++;
    }

    if ($i >= 3) {
        return true;
    } else {
        return false;
    }
}

function is_any_three_cards_red($cards2, $cards) {
    $i = 0;
    $loop = 0;
    foreach ($cards2 as $card_data) {
        $card1 = $cards->$card_data;
        if ($card1['type'] == "diamond" or $card1['type'] == "heart") {
            $i++;
        }
        if ($loop >= 3) {
            break;
        }
        $loop++;
    }

    if ($i >= 3) {
        return true;
    } else {
        return false;
    }
}

function is_two_black_red($cards2, $cards) {
    $i = 0;
    $loop = 0;
    foreach ($cards2 as $card_data) {
        $card1 = $cards->$card_data;
        if ($card1['type'] == "diamond" or $card1['type'] == "heart") {
            $i++;
        }

        if ($loop >= 3) {
            break;
        }
        $loop++;
    }

    if ($i == 2) {
        return true;
    } else {
        return false;
    }
}

function is_player_even($cards2, $cards) {
    $cards2 = $cards->$cards2;
    $rank = $cards2['rank'];
    if ($rank % 2 == 0) {
        return true;
    } else {
        return false;
    }
}

function is_total_8_9_win($card_8, $card_9, $card_10, $card_11, $cards) {

    $cards8 = $cards->$card_8;
    $cards9 = $cards->$card_9;
    $cards10 = $cards->$card_10;
    $cards11 = $cards->$card_11;

    $rank_8 = $cards8['rank'];
    $rank_9 = $cards9['rank'];
    $rank_10 = $cards10['rank'];
    $rank_11 = $cards11['rank'];

    $total_8_9 = $rank_8 + $rank_9;
    $total_10_11 = $rank_10 + $rank_11;
    if ($total_8_9 > $total_10_11) {
        return true;
    } else if ($total_8_9 == $total_10_11) {
        return false;
    } else {
        return false;
    }
}

function is_total_10_11_win($card_8, $card_9, $card_10, $card_11, $cards) {

    $cards8 = $cards->$card_8;
    $cards9 = $cards->$card_9;
    $cards10 = $cards->$card_10;
    $cards11 = $cards->$card_11;

    $rank_8 = $cards8['rank'];
    $rank_9 = $cards9['rank'];
    $rank_10 = $cards10['rank'];
    $rank_11 = $cards11['rank'];

    $total_8_9 = $rank_8 + $rank_9;
    $total_10_11 = $rank_10 + $rank_11;
    if ($total_8_9 < $total_10_11) {
        return true;
    } else if ($total_8_9 == $total_10_11) {
        return false;
    } else {
        return false;
    }
}

function check_single_bet($card_8, $card_9, $card_10, $card_11, $cards) {
    $cards8 = $cards->$card_8;
    $cards9 = $cards->$card_9;
    $cards10 = $cards->$card_10;
    $cards11 = $cards->$card_11;

    $rank_8 = $cards8['rank'];
    $rank_9 = $cards9['rank'];
    $rank_10 = $cards10['rank'];
    $rank_11 = $cards11['rank'];

    $total_of_all = $rank_8 + $rank_9 + $rank_10 + $rank_11;

    $number = substr($total_of_all, -1);

    if ($number == 1) {
        $market_id = 15;
    } else if ($number == 2) {
        $market_id = 16;
    } else if ($number == 3) {
        $market_id = 17;
    } else if ($number == 4) {
        $market_id = 18;
    } else if ($number == 5) {
        $market_id = 19;
    } else if ($number == 6) {
        $market_id = 20;
    } else if ($number == 7) {
        $market_id = 21;
    } else if ($number == 8) {
        $market_id = 22;
    } else if ($number == 9) {
        $market_id = 23;
    } else {
        $market_id = 24;
    }
    return $market_id;
}

?>