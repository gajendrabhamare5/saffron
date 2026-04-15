<?php

include('../include/conn.php');
include('../include/level_percentage.php');
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

$result = $_REQUEST['result'];
$game_type = $_REQUEST['type'];
$mid = $_REQUEST['mid'];
$cards = $_REQUEST['cards'];
$cards2 = $_REQUEST['cards'];
$cards3 = $_REQUEST['cards'];
//$get_data = json_decode($get_data);

$event_type = "DTL20";
$mid = str_replace("32.", "", $mid);

$result_time = date("Y-m-d H:i:s");
$market_id = array();
$bet_final_result = '';

if ($result == 1) {
    $result_status = 'D';
    $bet_final_result = 'Dragon';
    $market_id[] = 1;
} else if ($result == 21) {
    $result_status = 'T';
    $bet_final_result = 'Tiger';
    $market_id[] = 21;
} else if ($result == 41) {
    $result_status = 'L';
    $bet_final_result = 'Lion';
    $market_id[] = 41;
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


$cards2 = json_decode($cards2);
$dragon_cards = array($cards2[0]);
$tiger_cards = array($cards2[1]);
$lion_cards = array($cards2[2]);



$is_even = is_even($dragon_cards[0], $cards);
if ($is_even) {
    $market_id[] = 5;
} else {
    $market_id[] = 4;
}

$is_red = is_red($dragon_cards[0], $cards);
if ($is_red) {
    $market_id[] = 3;
} else {
    $market_id[] = 2;
}

$is_even = is_even($tiger_cards[0], $cards);
if ($is_even) {
    $market_id[] = 25;
} else {
    $market_id[] = 24;
}

$is_red = is_red($tiger_cards[0], $cards);
if ($is_red) {
    $market_id[] = 23;
} else {
    $market_id[] = 22;
}

$is_even = is_even($lion_cards[0], $cards);
if ($is_even) {
    $market_id[] = 45;
} else {
    $market_id[] = 44;
}

$is_red = is_red($lion_cards[0], $cards);
if ($is_red) {
    $market_id[] = 43;
} else {
    $market_id[] = 42;
}



$dragon_cards_type_id = cards_type_id($dragon_cards[0], $cards, 'dragon');
$market_id[] = $dragon_cards_type_id;

$tiger_cards_type_id = cards_type_id($tiger_cards[0], $cards, 'tiger');
$market_id[] = $tiger_cards_type_id;

$tiger_cards_type_id = cards_type_id($lion_cards[0], $cards, 'lion');
$market_id[] = $tiger_cards_type_id;


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
    $bet_type = $fetch_get_all_bet['bet_type'];
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
			$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','$actual_win_amount2','Credit','4','$transaction_time','1',1,'$transaction_id')");

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

function is_even($card11, $cards) {
    $card1 = $cards->$card11;
    $rank = $card1['rank'];
    if ($rank % 2 == 0) {
        return true;
    } else {
        return false;
    }
}

function is_red($card11, $cards) {
    $card1 = $cards->$card11;
    $type = $card1['type'];
    if ($type == "diamond" or $type == "heart") {
        return true;
    } else {
        return false;
    }
}

function cards_type_id($card11, $cards, $type_cards) {
    $card1 = $cards->$card11;
    $rank = $card1['rank'];

    if ($type_cards == "dragon") {

        $market_id = $rank + 5;
    } else if ($type_cards == "tiger") {

        $market_id = $rank + 25;
    } else {

        $market_id = $rank + 45;
    }
    return $market_id;
}

?>