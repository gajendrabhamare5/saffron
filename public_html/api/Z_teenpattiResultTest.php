<?php

include('../include/conn.php');
include('../include/level_percentage.php');
error_reporting(0);

$result = $_REQUEST['result'];
$game_type = $_REQUEST['type'];
$mid = $_REQUEST['mid'];
$cards2 = $_REQUEST['cards'];
$cards3 = $_REQUEST['cards'];
//$get_data = json_decode($get_data);

if ($game_type == "teen9") {
    $event_type = "TESTTEENPATTI";
    $mid = str_replace("10.", "", $mid);
}

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
$bet_final_result = '';
$market_id = array();
if ($result == 11) {
    $result_status = 'T';
    $bet_final_result = 'Tiger';
    $market_id[] = '11';
} else if ($result == 21) {
    $result_status = 'L';
    $bet_final_result = 'Lion';
    $market_id[] = '21';
} else if ($result == 31) {
    $result_status = 'D';
    $bet_final_result = 'Dragon';
    $market_id[] = '31';
} else {
    $get_all_bet1 = $conn->query("select * from bet_teen_details where event_id='$mid' and bet_status=1 and event_type='$event_type'");
    while ($fetch_get_all_bet1 = mysqli_fetch_assoc($get_all_bet1)) {
        $bet_id = $fetch_get_all_bet1['bet_id'];
        $update_bet = $conn->query("update bet_teen_details set bet_status=2,bet_result='0',bet_win_amount='0' where bet_id='$bet_id' and bet_status=1");

        $conn->query("delete from accounts where bet_id='$bet_id' and game_type=1");
        $conn->query("delete from exposure_details where event_id='$mid' and market_type ='$event_type'");
    }
    
    $conn->query("insert into twenty_teenpatti_result (event_id,game_type,result_status,cards,result_time) VALUES('$mid','$game_type','$result','$cards3','$result_time')");
        
    exit();
}

$cards2 = json_decode($cards2);
$tiger_cards = array($cards2[0], $cards2[1], $cards2[2]);
$lion_cards = array($cards2[3], $cards2[4], $cards2[5]);
$dragon_cards = array($cards2[6], $cards2[7], $cards2[8]);
$is_tiger_trio = is_trio($tiger_cards[0], $tiger_cards[1], $tiger_cards[2], $cards);
if ($is_tiger_trio) {
    $market_id[] = 15;
} else {
    $is_tiger_straight_flush = is_straight_flush($tiger_cards[0], $tiger_cards[1], $tiger_cards[2], $cards);
    if ($is_tiger_straight_flush) {
        $market_id[] = 16;
    } else {
        $is_tiger_flush = is_flush($tiger_cards[0], $tiger_cards[1], $tiger_cards[2], $cards);
        if ($is_tiger_flush) {
            $market_id[] = 14;
        } else {
            $is_tiger_color = is_color($tiger_cards[0], $tiger_cards[1], $tiger_cards[2], $cards);
            if ($is_tiger_color) {
                $market_id[] = 13;
            } else {
                $is_tiger_pair = is_pair($tiger_cards[0], $tiger_cards[1], $tiger_cards[2], $cards);
                if ($is_tiger_pair) {
                    $market_id[] = 12;
                } else {
                    
                }
            }
        }
    }
}

$is_lion_trio = is_trio($lion_cards[0], $lion_cards[1], $lion_cards[2], $cards);
if ($is_lion_trio) {
    $market_id[] = 25;
} else {
    $is_lion_straight_flush = is_straight_flush($lion_cards[0], $lion_cards[1], $lion_cards[2], $cards);
    if ($is_lion_straight_flush) {
        $market_id[] = 26;
    } else {
        $is_lion_flush = is_flush($lion_cards[0], $lion_cards[1], $lion_cards[2], $cards);
        if ($is_lion_flush) {
            $market_id[] = 24;
        } else {
            $is_lion_color = is_color($lion_cards[0], $lion_cards[1], $lion_cards[2], $cards);
            if ($is_lion_color) {
                $market_id[] = 23;
            } else {
                $is_lion_pair = is_pair($lion_cards[0], $lion_cards[1], $lion_cards[2], $cards);
                if ($is_lion_pair) {
                    $market_id[] = 22;
                } else {
                    
                }
            }
        }
    }
}

$is_dragon_trio = is_trio($dragon_cards[0], $dragon_cards[1], $dragon_cards[2], $cards);
if ($is_dragon_trio) {
    $market_id[] = 35;
} else {
    $is_dragon_straight_flush = is_straight_flush($dragon_cards[0], $dragon_cards[1], $dragon_cards[2], $cards);
    if ($is_dragon_straight_flush) {
        $market_id[] = 36;
    } else {
        $is_dragon_flush = is_flush($dragon_cards[0], $dragon_cards[1], $dragon_cards[2], $cards);
        if ($is_dragon_flush) {
            $market_id[] = 34;
        } else {
            $is_dragon_color = is_color($dragon_cards[0], $dragon_cards[1], $dragon_cards[2], $cards);
            if ($is_dragon_color) {
                $market_id[] = 33;
            } else {
                $is_dragon_pair = is_pair($dragon_cards[0], $dragon_cards[1], $dragon_cards[2], $cards);
                if ($is_dragon_pair) {
                    $market_id[] = 32;
                } else {
                    
                }
            }
        }
    }
}




$check_result_already_insert = $conn->query("select * from twenty_teenpatti_result where event_id='$mid'");
$row_count = mysqli_fetch_row($check_result_already_insert);

$conn->query("insert into twenty_teenpatti_result (event_id,game_type,result_status,cards,result_time) VALUES('$mid','$game_type','$result_status','$cards3','$result_time')");

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
    $actual_win_amount2 = $bet_winning_amount;
    $get_parent_ids = $conn->query("select * from user_login_master where UserID=$bet_user_id");
    $fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
    $parentDL = $fetch_parent_ids['parentDL'];
    $parentMDL = $fetch_parent_ids['parentMDL'];
    $parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];


    if (in_array($bet_market_id, $market_id)) {
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

$conn->query("delete from exposure_details where event_id='$mid' and market_type ='$event_type'");
echo "done";

function is_trio($card11, $card22, $card33, $cards) {

    $card1 = $cards->$card11;
    $card2 = $cards->$card22;
    $card3 = $cards->$card33;

    if ($card1['name'] == $card2['name'] && $card2['name'] == $card3['name']) {
        return true;
    } else {
        return false;
    }
}

function is_straight_flush($card11, $card22, $card33, $cards) {
    $card1 = $cards->$card11;
    $card2 = $cards->$card22;
    $card3 = $cards->$card33;

    if ($card1['type'] == $card2['type'] && $card2['type'] == $card3['type']) {
        if (($card2['rank'] - $card3['rank'] == 1) && ($card1['rank'] - $card2['rank'] == 1)) {
            return true;
        } else if (($card3['rank'] - $card2['rank'] == 1) && ($card1['rank'] - $card3['rank'] == 1)) {
            return true;
        } else if (($card3['rank'] - $card1['rank'] == 1) && ($card2['rank'] - $card3['rank'] == 1)) {
            return true;
        } else if (($card1['rank'] - $card3['rank'] == 1) && ($card2['rank'] - $card1['rank'] == 1)) {
            return true;
        } else if (($card2['rank'] - $card1['rank'] == 1) && ($card3['rank'] - $card2['rank'] == 1)) {
            return true;
        } else if (($card1['rank'] - $card2['rank'] == 1) && ($card3['rank'] - $card1['rank'] == 1)) {
            return true;
        } else if (($card2['priority'] - $card3['priority'] == 1) && ($card1['priority'] - $card2['priority'] == 1)) {
            return true;
        } else if (($card3['priority'] - $card2['priority'] == 1) && ($card1['priority'] - $card3['priority'] == 1)) {
            return true;
        } else if (($card3['priority'] - $card1['priority'] == 1) && ($card2['priority'] - $card3['priority'] == 1)) {
            return true;
        } else if (($card1['priority'] - $card3['priority'] == 1) && ($card2['priority'] - $card1['priority'] == 1)) {
            return true;
        } else if (($card2['priority'] - $card1['priority'] == 1) && ($card3['priority'] - $card2['priority'] == 1)) {
            return true;
        } else if (($card1['priority'] - $card2['priority'] == 1) && ($card3['priority'] - $card1['priority'] == 1)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function is_flush($card11, $card22, $card33, $cards) {
    $card1 = $cards->$card11;
    $card2 = $cards->$card22;
    $card3 = $cards->$card33;
    if (($card2['rank'] - $card3['rank'] == 1) && ($card1['rank'] - $card2['rank'] == 1)) {
        return true;
    } else if (($card3['rank'] - $card2['rank'] == 1) && ($card1['rank'] - $card3['rank'] == 1)) {
        return true;
    } else if (($card3['rank'] - $card1['rank'] == 1) && ($card2['rank'] - $card3['rank'] == 1)) {
        return true;
    } else if (($card1['rank'] - $card3['rank'] == 1) && ($card2['rank'] - $card1['rank'] == 1)) {
        return true;
    } else if (($card2['rank'] - $card1['rank'] == 1) && ($card3['rank'] - $card2['rank'] == 1)) {
        return true;
    } else if (($card1['rank'] - $card2['rank'] == 1) && ($card3['rank'] - $card1['rank'] == 1)) {
        return true;
    } else if (($card2['priority'] - $card3['priority'] == 1) && ($card1['priority'] - $card2['priority'] == 1)) {
        return true;
    } else if (($card3['priority'] - $card2['priority'] == 1) && ($card1['priority'] - $card3['priority'] == 1)) {
        return true;
    } else if (($card3['priority'] - $card1['priority'] == 1) && ($card2['priority'] - $card3['priority'] == 1)) {
        return true;
    } else if (($card1['priority'] - $card3['priority'] == 1) && ($card2['priority'] - $card1['priority'] == 1)) {
        return true;
    } else if (($card2['priority'] - $card1['priority'] == 1) && ($card3['priority'] - $card2['priority'] == 1)) {
        return true;
    } else if (($card1['priority'] - $card2['priority'] == 1) && ($card3['priority'] - $card1['priority'] == 1)) {
        return true;
    } else {
        return false;
    }
}

function is_color($card11, $card22, $card33, $cards) {
    $card1 = $cards->$card11;
    $card2 = $cards->$card22;
    $card3 = $cards->$card33;
    if ($card1['type'] == $card2['type'] && $card2['type'] == $card3['type']) {
        return true;
    } else {
        
    }
}

function is_pair($card11, $card22, $card33, $cards) {
    $card1 = $cards->$card11;
    $card2 = $cards->$card22;
    $card3 = $cards->$card33;
    if ($card1['name'] == $card2['name'] || $card1['name'] == $card3['name']) {
        return true;
    } else if ($card2['name'] == $card1['name'] || $card2['name'] == $card3['name']) {
        return true;
    } else if ($card3['name'] == $card2['name'] || $card3['name'] == $card1['name']) {
        return true;
    } else {
        return false;
    }
}

?>