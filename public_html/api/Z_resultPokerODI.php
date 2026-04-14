<?php

include('../include/conn.php');
include('../include/level_percentage.php');
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

$result = $_REQUEST['result'];
$game_type = $_REQUEST['type'];
$desc = $_REQUEST['desc'];
$mid = $_REQUEST['mid'];
$cards = $_REQUEST['cards'];
$cards2 = $_REQUEST['cards'];
$cards3 = $_REQUEST['cards'];

//$get_data = json_decode($get_data);

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
    'name' => 'a',
    'rank' => 1,
    'priority' => 14
);
$cards->{'add'} = array(
    'type' => 'heart',
    'name' => 'a',
    'rank' => 1,
    'priority' => 14
);
$cards->{'ahh'} = array(
    'type' => 'spade',
    'name' => 'a',
    'rank' => 1,
    'priority' => 14
);
$cards->{'acc'} = array(
    'type' => 'club',
    'name' => 'a',
    'rank' => 1,
    'priority' => 14
);

$cards->{'ass'} = array(
    'type' => 'diamond',
    'name' => 'a',
    'rank' => 1,
    'priority' => 14
);
$cards->{'add'} = array(
    'type' => 'heart',
    'name' => 'a',
    'rank' => 1,
    'priority' => 14
);
$cards->{'ahh'} = array(
    'type' => 'spade',
    'name' => 'a',
    'rank' => 1,
    'priority' => 14
);
$cards->{'acc'} = array(
    'type' => 'club',
    'name' => 'a',
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
    'name' => 'j',
    'rank' => 11,
    'priority' => 11
);
$cards->{'jdd'} = array(
    'type' => 'heart',
    'name' => 'j',
    'rank' => 11,
    'priority' => 11
);
$cards->{'jhh'} = array(
    'type' => 'spade',
    'name' => 'j',
    'rank' => 11,
    'priority' => 11
);
$cards->{'jcc'} = array(
    'type' => 'club',
    'name' => 'j',
    'rank' => 11,
    'priority' => 11
);

$cards->{'qss'} = array(
    'type' => 'diamond',
    'name' => 'q',
    'rank' => 12,
    'priority' => 12
);
$cards->{'qdd'} = array(
    'type' => 'heart',
    'name' => 'q',
    'rank' => 12,
    'priority' => 12
);
$cards->{'qhh'} = array(
    'type' => 'spade',
    'name' => 'q',
    'rank' => 12,
    'priority' => 12
);
$cards->{'qcc'} = array(
    'type' => 'club',
    'name' => 'q',
    'rank' => 12,
    'priority' => 12
);

$cards->{'kss'} = array(
    'type' => 'diamond',
    'name' => 'k',
    'rank' => 13,
    'priority' => 13
);
$cards->{'kdd'} = array(
    'type' => 'heart',
    'name' => 'k',
    'rank' => 13,
    'priority' => 13
);
$cards->{'khh'} = array(
    'type' => 'spade',
    'name' => 'k',
    'rank' => 13,
    'priority' => 13
);
$cards->{'kcc'} = array(
    'type' => 'club',
    'name' => 'k',
    'rank' => 13,
    'priority' => 13
);

$market_id = array();

$cards2 = json_decode($cards2);
$a_cards = array($cards2[0], $cards2[1]);
$b_cards = array($cards2[2], $cards2[3]);

$event_type = "ODI_POKER";
$mid = str_replace("13.", "", $mid);

$result_time = date("Y-m-d H:i:s");
$bet_final_result = '';
if ($result == 11) {
    $result_status = 'A';
    $bet_final_result = 'Player A';
    $market_id_fixed = 1;
} else if ($result == 21) {
    $result_status = 'B';
    $bet_final_result = 'Player B';
    $market_id_fixed = 2;
} else if ($result == "CAN") {
    $get_all_bet1 = $conn->query("select * from bet_teen_details where event_id='$mid' and bet_status=1 and event_type='$event_type'");
    while ($fetch_get_all_bet1 = mysqli_fetch_assoc($get_all_bet1)) {
        $bet_id = $fetch_get_all_bet1['bet_id'];
        $update_bet = $conn->query("update bet_teen_details set bet_status=2,bet_result='0',bet_win_amount='0' where bet_id='$bet_id' and bet_status=1");

        $conn->query("delete from accounts where bet_id='$bet_id' and game_type=1");
        $conn->query("delete from exposure_details where event_id='$mid' and market_type ='$event_type'");
    }
} else {
    $result_status = $result;
	$bet_final_result = 'Tie';
    $get_all_bet1 = $conn->query("select * from bet_teen_details where event_id='$mid' and bet_status=1 and event_type='$event_type'");
    while ($fetch_get_all_bet1 = mysqli_fetch_assoc($get_all_bet1)) {
        $bet_id = $fetch_get_all_bet1['bet_id'];
        $market_ids = $fetch_get_all_bet1['market_id'];

        $update_bet = $conn->query("update bet_teen_details set bet_status=2,bet_result='0',bet_win_amount='0',bet_final_result='$bet_final_result' where bet_id='$bet_id' and bet_status=1");

        $conn->query("delete from accounts where bet_id='$bet_id' and game_type=1");
        $conn->query("delete from exposure_details where event_id='$mid' and market_type ='$event_type'");
    }
}


$check_result_already_insert = $conn->query("select * from twenty_teenpatti_result where event_id='$mid'");
$row_count = mysqli_fetch_row($check_result_already_insert);

$desc1_array = explode("@@", $desc);
$winner = $desc1_array[0];
$player_a_result = $desc1_array[1];
$player_b_result = $desc1_array[2];

if (strpos($player_a_result, 'Royal Flush') !== false) {
    $market_id[] = 4;
    $return_odds = 100;
} else if (strpos($player_a_result, 'Straight Flush') !== false) {
    $market_id[] = 4;
    $return_odds = 50;
} else if (strpos($player_a_result, 'Four of a Kind') !== false) {
    $market_id[] = 4;
    $return_odds = 30;
} else if (strpos($player_a_result, 'Full House') !== false) {
    $market_id[] = 4;
    $return_odds = 8;
} else if (strpos($player_a_result, 'Flush') !== false) {
    $market_id[] = 4;
    $return_odds = 6;
} else if (strpos($player_a_result, 'Straight') !== false) {
    $market_id[] = 4;
    $return_odds = 4;
} else if (strpos($player_a_result, 'Three of a Kind') !== false) {
    $market_id[] = 4;
    $return_odds = 3;
}

if (strpos($player_b_result, 'Royal Flush') !== false) {
    $market_id[] = 6;
    $return_odds2 = 100;
} else if (strpos($player_b_result, 'Straight Flush') !== false) {
    $market_id[] = 6;
    $return_odds2 = 50;
} else if (strpos($player_b_result, 'Four of a Kind') !== false) {
    $market_id[] = 6;
    $return_odds2 = 30;
} else if (strpos($player_b_result, 'Full House') !== false) {
    $market_id[] = 6;
    $return_odds2 = 8;
} else if (strpos($player_b_result, 'Flush') !== false) {
    $market_id[] = 6;
    $return_odds2 = 6;
} else if (strpos($player_b_result, 'Straight') !== false) {
    $market_id[] = 6;
    $return_odds2 = 4;
} else if (strpos($player_b_result, 'Three of a Kind') !== false) {
    $market_id[] = 6;
    $return_odds2 = 3;
}

$desc = str_replace(",", "-", $desc);



$is_2_card_a_a = is_2_card_a_a($a_cards[0], $a_cards[1], $cards);
if ($is_2_card_a_a) {
    $market_id[] = 3;
    $return_odds3 = 30;
} else {
    $is_2_card_ak_shuited = is_2_card_ak_shuited($a_cards[0], $a_cards[1], $cards);
    if ($is_2_card_ak_shuited) {
        $market_id[] = 3;
        $return_odds3 = 25;
    } else {
        $is_2_card_a_q_a_j_suited = is_2_card_a_q_a_j_suited($a_cards[0], $a_cards[1], $cards);
        if ($is_2_card_a_q_a_j_suited) {
            $market_id[] = 3;
            $return_odds3 = 20;
        } else {
            $is_2_card_ak_off_shited = is_2_card_ak_off_shited($a_cards[0], $a_cards[1], $cards);
            if ($is_2_card_ak_off_shited) {
                $market_id[] = 3;
                $return_odds3 = 15;
            } else {
                $is_2_card_jqk_pair = is_2_card_jqk_pair($a_cards[0], $a_cards[1], $cards);
                if ($is_2_card_jqk_pair) {
                    $market_id[] = 3;
                    $return_odds3 = 10;
                } else {
                    $is_2_card_a_q_a_j_off_suited = is_2_card_a_q_a_j_off_suited($a_cards[0], $a_cards[1], $cards);
                    if ($is_2_card_a_q_a_j_off_suited) {
                        $market_id[] = 3;
                        $return_odds3 = 5;
                    } else {
                        $is_2_card_pair = is_2_card_pair($a_cards[0], $a_cards[1], $cards);
                        if ($is_2_card_pair) {
                            $market_id[] = 3;
                            $return_odds3 = 3;
                        }
                    }
                }
            }
        }
    }
}


$is_2_card_a_a = is_2_card_a_a($b_cards[0], $b_cards[1], $cards);
if ($is_2_card_a_a) {
    $market_id[] = 5;
    $return_odds5 = 30;
} else {
    $is_2_card_ak_shuited = is_2_card_ak_shuited($b_cards[0], $b_cards[1], $cards);
    if ($is_2_card_ak_shuited) {
        $market_id[] = 5;
        $return_odds5 = 25;
    } else {
        $is_2_card_a_q_a_j_suited = is_2_card_a_q_a_j_suited($b_cards[0], $b_cards[1], $cards);
        if ($is_2_card_a_q_a_j_suited) {
            $market_id[] = 5;
            $return_odds5 = 20;
        } else {
            $is_2_card_ak_off_shited = is_2_card_ak_off_shited($b_cards[0], $b_cards[1], $cards);
            if ($is_2_card_ak_off_shited) {
                $market_id[] = 5;
                $return_odds5 = 15;
            } else {
                $is_2_card_jqk_pair = is_2_card_jqk_pair($b_cards[0], $b_cards[1], $cards);
                if ($is_2_card_jqk_pair) {
                    $market_id[] = 5;
                    $return_odds5 = 10;
                } else {
                    $is_2_card_a_q_a_j_off_suited = is_2_card_a_q_a_j_off_suited($b_cards[0], $b_cards[1], $cards);
                    if ($is_2_card_a_q_a_j_off_suited) {
                        $market_id[] = 5;
                        $return_odds5 = 5;
                    } else {
                        $is_2_card_pair = is_2_card_pair($b_cards[0], $b_cards[1], $cards);
                        if ($is_2_card_pair) {
                            $market_id[] = 5;
                            $return_odds5 = 3;
                        }
                    }
                }
            }
        }
    }
}

$conn->query("insert into twenty_teenpatti_result (event_id,game_type,result_status,cards,desc_remakrs,result_time) VALUES('$mid','$game_type','$result_status','$cards3','$desc','$result_time')");


$end_date_time = date("Y-m-d H:i:s");
$transaction_time = date("Y-m-d H:i:s");
$transaction_time2 = date("d-m-Y H:i:s");

$get_all_bet = $conn->query("select * from bet_teen_details where event_id='$mid' and bet_status=1 and event_type='$event_type'");
while ($fetch_get_all_bet = mysqli_fetch_assoc($get_all_bet)) {

    $bet_id = $fetch_get_all_bet['bet_id'];
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

    if ($bet_market_id == 1 or $bet_market_id == 2) {
        if ($bet_market_id == $market_id_fixed and $bet_type == "Back") {
            set_result($conn, $bet_id, "Win", $mid, $end_date_time,$bet_final_result);
        } else if ($bet_market_id != $market_id_fixed and $bet_type == "Lay") {
            set_result($conn, $bet_id, "Win", $mid, $end_date_time,$bet_final_result);
        } else {
            set_result($conn, $bet_id, "Loss", $mid, $end_date_time,$bet_final_result);
        }
    }

    if ($bet_market_id >= 3) {


        if (in_array($bet_market_id, $market_id)) {
            $bet_result = ($bet_odds - 1 ) * $bet_stack;

            if ($bet_market_id == 4) {
                $actual_win_amount2 = $return_odds * $bet_amount;
                $bet_result = ($return_odds - 1 ) * $bet_stack;
            } else if ($bet_market_id == 6) {
                $actual_win_amount2 = $return_odds2 * $bet_amount;
                $bet_result = ($return_odds2 - 1 ) * $bet_stack;
            } else if ($bet_market_id == 3) {
                $actual_win_amount2 = $return_odds3 * $bet_amount;
                $bet_result = ($return_odds3 - 1 ) * $bet_stack;
            } else if ($bet_market_id == 5) {
                $actual_win_amount2 = $return_odds5 * $bet_amount;
                $bet_result = ($return_odds5 - 1 ) * $bet_stack;
            }

            $user_amount = $bet_result;
            $smdl_amount = -$bet_result;

            $update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='$bet_result',bet_final_result='$bet_final_result' where bet_id='$bet_id' and bet_status=1");
            
            if($conn->affected_rows > 0){
            	$transaction_id = $bet_id.'-'.$bet_user_id;
				$account_description = "#Win $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
				$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','$user_amount','Credit','4','$transaction_time','1',1,'$transaction_id')");

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




$conn->query("delete from exposure_details where event_id='$mid' and market_type ='$event_type'");

echo "done";

function set_result($conn, $bet_id, $result_status, $mid, $end_date_time,$bet_final_result = '') {


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
        
        $update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='$user_amount',bet_final_result='$bet_final_result'  where bet_id='$bet_id' and bet_status=1");

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

function is_2_card_a_a($card_1, $card_2, $cards) {
    $card1_data = $cards->$card_1;
    $card2_data = $cards->$card_2;
    $rank_card_1 = $card1_data['rank'];
    $rank_card_2 = $card2_data['rank'];
    if ($rank_card_1 == 1 and $rank_card_2 == 1) {
        return true;
    } else {
        return false;
    }
}

function is_2_card_ak_shuited($card_1, $card_2, $cards) {
    $card1_data = $cards->$card_1;
    $card2_data = $cards->$card_2;
    $rank_card_1 = $card1_data['rank'];
    $rank_card_2 = $card2_data['rank'];

    $type_card_1 = $card1_data['type'];
    $type_card_2 = $card2_data['type'];

    if ($type_card_1 == $type_card_2) {
        if ($rank_card_1 != $rank_card_2) {
            if (($rank_card_1 == 1 or $rank_card_1 == 13) and ( $rank_card_2 == 1 or $rank_card_2 == 13)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function is_2_card_ak_off_shited($card_1, $card_2, $cards) {
    $card1_data = $cards->$card_1;
    $card2_data = $cards->$card_2;
    $rank_card_1 = $card1_data['rank'];
    $rank_card_2 = $card2_data['rank'];

    $type_card_1 = $card1_data['type'];
    $type_card_2 = $card2_data['type'];

    if ($type_card_1 != $type_card_2) {
        if ($rank_card_1 != $rank_card_2) {
            if (($rank_card_1 == 1 or $rank_card_1 == 13) and ( $rank_card_2 == 1 or $rank_card_2 == 13)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function is_2_card_a_q_a_j_suited($card_1, $card_2, $cards) {
    $card1_data = $cards->$card_1;
    $card2_data = $cards->$card_2;
    $rank_card_1 = $card1_data['rank'];
    $rank_card_2 = $card2_data['rank'];

    $type_card_1 = $card1_data['type'];
    $type_card_2 = $card2_data['type'];

    if ($type_card_1 == $type_card_2) {
        if ($rank_card_1 != $rank_card_2) {
            if ((($rank_card_1 == 1 or $rank_card_1 == 12) and ( $rank_card_2 == 1 or $rank_card_2 == 12)) or ( ($rank_card_1 == 1 or $rank_card_1 == 11) and ( $rank_card_2 == 1 or $rank_card_2 == 11))) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function is_2_card_a_q_a_j_off_suited($card_1, $card_2, $cards) {
    $card1_data = $cards->$card_1;
    $card2_data = $cards->$card_2;
    $rank_card_1 = $card1_data['rank'];
    $rank_card_2 = $card2_data['rank'];

    $type_card_1 = $card1_data['type'];
    $type_card_2 = $card2_data['type'];
    if ($type_card_1 != $type_card_2) {
        if ($rank_card_1 != $rank_card_2) {
            if ((($rank_card_1 == 1 or $rank_card_1 == 12) and ( $rank_card_2 == 1 or $rank_card_2 == 12)) or ( ($rank_card_1 == 1 or $rank_card_1 == 11) and ( $rank_card_2 == 1 or $rank_card_2 == 11))) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function is_2_card_pair($card_1, $card_2, $cards) {
    $card1_data = $cards->$card_1;
    $card2_data = $cards->$card_2;
    $rank_card_1 = $card1_data['rank'];
    $rank_card_2 = $card2_data['rank'];

    if ($rank_card_1 >= 2 and $rank_card_1 <= 10) {
        if ($rank_card_1 == $rank_card_2) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function is_2_card_jqk_pair() {
    return false;
}

?>