<?php

include('../include/conn.php');
include('../include/level_percentage.php');
error_reporting(E_ALL);
ini_set("error_display", 1);
ini_set("error_startup_display", 1);




$data_original = file_get_contents("php://input");
$data = json_decode($data_original);

$result_array = $data->t1;



$rdesc =$result_array->rdesc;

$game_type = $result_array->gtype;
$mid = $result_array->rid;
$bet_final_result = $result_array->winnat;
$result = $result_array->win;
$result_status = $result_array->win;	


$cards31 = $result_array->card;
$cards31 = explode(",",$cards31);
$andar = [];
$bahar = [];

foreach ($cards31 as $i => $card) {
    if ($i % 2 == 1) {
        $andar[] = $card;  // Andar
    } else {
        $bahar[] = $card;  // Bahar
    }
}

// Keep arrays intact, just join groups with *
$cards3 = implode(',', $andar) . ',*,' . implode(',', $bahar);


$event_type = "AB20";

$result_time = date("Y-m-d H:i:s");
$market_ids = array();

$cards3_array = explode(",*,",$cards3);
$cards1_a = $cards3_array[0];
$cards2_b = $cards3_array[1];
$cards1 = $cards3_array[0];
$cards2 = $cards3_array[1];


$cards1 = '["'.$cards1.'"]';
$cards1 = str_replace(',','","',$cards1);

$cards2 = '["'.$cards2.'"]';
$cards2 = str_replace(',','","',$cards2);

$result_status=$result;

$check_result_already_insert = $conn->query("select * from twenty_teenpatti_result where event_id='$mid' and game_type='$game_type'");
$row_count = mysqli_num_rows($check_result_already_insert);
if($row_count > 0){
	echo "already inserted";
	exit();
}


$conn->query("insert into twenty_teenpatti_result (event_id,game_type,result_status,cards,b_cards,result_time,desc_remakrs,data) VALUES('$mid','$game_type','$result_status','$cards1','$cards2','$result_time','$rdesc','$data_original')");
$insert_id = $conn->insert_id;
if($insert_id < 0){
	/* echo "already inserted"; exit()  */
} 




$cards1_array = explode(",",$cards1_a);
$cards2_array = explode(",",$cards2_b);

$cards = new stdClass();
$cards->{'ADD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'A',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards->{'AHH'} = array(
		'type'		=>	'heart',
		'name'		=>	'A',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards->{'ASS'} = array(
		'type'		=>	'spade',
		'name'		=>	'A',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards->{'ACC'} = array(
		'type'		=>	'club',
		'name'		=>	'A',
		'rank'		=>	1,
		'priority'	=>	14
	);
	
	$cards->{'add'} = array(
		'type'		=>	'diamond',
		'name'		=>	'A',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards->{'ahh'} = array(
		'type'		=>	'heart',
		'name'		=>	'A',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards->{'ass'} = array(
		'type'		=>	'spade',
		'name'		=>	'A',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards->{'acc'} = array(
		'type'		=>	'club',
		'name'		=>	'A',
		'rank'		=>	1,
		'priority'	=>	14
	);
	
	$cards->{'2DD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'2',
		'rank'		=>	2,
		'priority'	=>	2
	);
	$cards->{'2HH'} = array(
		'type'		=>	'heart',
		'name'		=>	'2',
		'rank'		=>	2,
		'priority'	=>	2
	);
	$cards->{'2SS'} = array(
		'type'		=>	'spade',
		'name'		=>	'2',
		'rank'		=>	2,
		'priority'	=>	2
	);
	$cards->{'2CC'} = array(
		'type'		=>	'club',
		'name'		=>	'2',
		'rank'		=>	2,
		'priority'	=>	2
	);
	
	$cards->{'3DD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'3',
		'rank'		=>	3,
		'priority'	=>	3
	);
	$cards->{'3HH'} = array(
		'type'		=>	'heart',
		'name'		=>	'3',
		'rank'		=>	3,
		'priority'	=>	3
	);
	$cards->{'3SS'} = array(
		'type'		=>	'spade',
		'name'		=>	'3',
		'rank'		=>	3,
		'priority'	=>	3
	);
	$cards->{'3CC'} = array(
		'type'		=>	'club',
		'name'		=>	'3',
		'rank'		=>	3,
		'priority'	=>	3
	);
	
	$cards->{'4DD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'4',
		'rank'		=>	4,
		'priority'	=>	4
	);
	$cards->{'4HH'} = array(
		'type'		=>	'heart',
		'name'		=>	'4',
		'rank'		=>	4,
		'priority'	=>	4
	);
	$cards->{'4SS'} = array(
		'type'		=>	'spade',
		'name'		=>	'4',
		'rank'		=>	4,
		'priority'	=>	4
	);
	$cards->{'4CC'} = array(
		'type'		=>	'club',
		'name'		=>	'4',
		'rank'		=>	4,
		'priority'	=>	4
	);
	
	$cards->{'5SS'} = array(
		'type'		=>	'diamond',
		'name'		=>	'5',
		'rank'		=>	5,
		'priority'	=>	5
	);
	$cards->{'5HH'} = array(
		'type'		=>	'heart',
		'name'		=>	'5',
		'rank'		=>	5,
		'priority'	=>	5
	);
	$cards->{'5SS'} = array(
		'type'		=>	'spade',
		'name'		=>	'5',
		'rank'		=>	5,
		'priority'	=>	5
	);
	$cards->{'5CC'} = array(
		'type'		=>	'club',
		'name'		=>	'5',
		'rank'		=>	5,
		'priority'	=>	5
	);
	
	$cards->{'6DD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'6',
		'rank'		=>	6,
		'priority'	=>	6
	);
	$cards->{'6HH'} = array(
		'type'		=>	'heart',
		'name'		=>	'6',
		'rank'		=>	6,
		'priority'	=>	6
	);
	$cards->{'6SS'} = array(
		'type'		=>	'spade',
		'name'		=>	'6',
		'rank'		=>	6,
		'priority'	=>	6
	);
	$cards->{'6CC'} = array(
		'type'		=>	'club',
		'name'		=>	'6',
		'rank'		=>	6,
		'priority'	=>	6
	);
	
	$cards->{'7DD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'7',
		'rank'		=>	7,
		'priority'	=>	7
	);
	$cards->{'7HH'} = array(
		'type'		=>	'heart',
		'name'		=>	'7',
		'rank'		=>	7,
		'priority'	=>	7
	);
	$cards->{'7SS'} = array(
		'type'		=>	'spade',
		'name'		=>	'7',
		'rank'		=>	7,
		'priority'	=>	7
	);
	$cards->{'7CC'} = array(
		'type'		=>	'club',
		'name'		=>	'7',
		'rank'		=>	7,
		'priority'	=>	7
	);
	
	$cards->{'8DD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'8',
		'rank'		=>	8,
		'priority'	=>	8
	);
	$cards->{'8HH'} = array(
		'type'		=>	'heart',
		'name'		=>	'8',
		'rank'		=>	8,
		'priority'	=>	8
	);
	$cards->{'8SS'} = array(
		'type'		=>	'spade',
		'name'		=>	'8',
		'rank'		=>	8,
		'priority'	=>	8
	);
	$cards->{'8CC'} = array(
		'type'		=>	'club',
		'name'		=>	'8',
		'rank'		=>	8,
		'priority'	=>	8
	);
	
	$cards->{'9DD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'9',
		'rank'		=>	9,
		'priority'	=>	9
	);
	$cards->{'9HH'} = array(
		'type'		=>	'heart',
		'name'		=>	'9',
		'rank'		=>	9,
		'priority'	=>	9
	);
	$cards->{'9SS'} = array(
		'type'		=>	'spade',
		'name'		=>	'9',
		'rank'		=>	9,
		'priority'	=>	9
	);
	$cards->{'9CC'} = array(
		'type'		=>	'club',
		'name'		=>	'9',
		'rank'		=>	9,
		'priority'	=>	9
	);
	
	$cards->{'10DD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'10',
		'rank'		=>	10,
		'priority'	=>	10
	);
	$cards->{'10HH'} = array(
		'type'		=>	'heart',
		'name'		=>	'10',
		'rank'		=>	10,
		'priority'	=>	10
	);
	$cards->{'10SS'} = array(
		'type'		=>	'spade',
		'name'		=>	'10',
		'rank'		=>	10,
		'priority'	=>	10
	);
	$cards->{'10CC'} = array(
		'type'		=>	'club',
		'name'		=>	'10',
		'rank'		=>	10,
		'priority'	=>	10
	);
	
	$cards->{'JDD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'J',
		'rank'		=>	11,
		'priority'	=>	11
	);
	$cards->{'JHH'} = array(
		'type'		=>	'heart',
		'name'		=>	'J',
		'rank'		=>	11,
		'priority'	=>	11
	);
	$cards->{'JSS'} = array(
		'type'		=>	'spade',
		'name'		=>	'J',
		'rank'		=>	11,
		'priority'	=>	11
	);
	$cards->{'JCC'} = array(
		'type'		=>	'club',
		'name'		=>	'J',
		'rank'		=>	11,
		'priority'	=>	11
	);
	
	$cards->{'QDD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'Q',
		'rank'		=>	12,
		'priority'	=>	12
	);
	$cards->{'QHH'} = array(
		'type'		=>	'heart',
		'name'		=>	'Q',
		'rank'		=>	12,
		'priority'	=>	12
	);
	$cards->{'QSS'} = array(
		'type'		=>	'spade',
		'name'		=>	'Q',
		'rank'		=>	12,
		'priority'	=>	12
	);
	$cards->{'QCC'} = array(
		'type'		=>	'club',
		'name'		=>	'Q',
		'rank'		=>	12,
		'priority'	=>	12
	);
	
	$cards->{'KDD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'K',
		'rank'		=>	13,
		'priority'	=>	13
	);
	$cards->{'KHH'} = array(
		'type'		=>	'heart',
		'name'		=>	'K',
		'rank'		=>	13,
		'priority'	=>	13
	);
	$cards->{'KSS'} = array(
		'type'		=>	'spade',
		'name'		=>	'K',
		'rank'		=>	13,
		'priority'	=>	13
	);
	$cards->{'KCC'} = array(
		'type'		=>	'club',
		'name'		=>	'K',
		'rank'		=>	13,
		'priority'	=>	13
	);
	$cards->{'add'} = array(
		'type'		=>	'diamond',
		'name'		=>	'a',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards->{'ahh'} = array(
		'type'		=>	'heart',
		'name'		=>	'a',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards->{'ass'} = array(
		'type'		=>	'spade',
		'name'		=>	'a',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards->{'acc'} = array(
		'type'		=>	'club',
		'name'		=>	'a',
		'rank'		=>	1,
		'priority'	=>	14
	);
	
	$cards->{'add'} = array(
		'type'		=>	'diamond',
		'name'		=>	'a',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards->{'ahh'} = array(
		'type'		=>	'heart',
		'name'		=>	'a',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards->{'ass'} = array(
		'type'		=>	'spade',
		'name'		=>	'a',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards->{'acc'} = array(
		'type'		=>	'club',
		'name'		=>	'a',
		'rank'		=>	1,
		'priority'	=>	14
	);
	
	$cards->{'2dd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'2',
		'rank'		=>	2,
		'priority'	=>	2
	);
	$cards->{'2hh'} = array(
		'type'		=>	'heart',
		'name'		=>	'2',
		'rank'		=>	2,
		'priority'	=>	2
	);
	$cards->{'2ss'} = array(
		'type'		=>	'spade',
		'name'		=>	'2',
		'rank'		=>	2,
		'priority'	=>	2
	);
	$cards->{'2cc'} = array(
		'type'		=>	'club',
		'name'		=>	'2',
		'rank'		=>	2,
		'priority'	=>	2
	);
	
	$cards->{'3dd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'3',
		'rank'		=>	3,
		'priority'	=>	3
	);
	$cards->{'3hh'} = array(
		'type'		=>	'heart',
		'name'		=>	'3',
		'rank'		=>	3,
		'priority'	=>	3
	);
	$cards->{'3ss'} = array(
		'type'		=>	'spade',
		'name'		=>	'3',
		'rank'		=>	3,
		'priority'	=>	3
	);
	$cards->{'3cc'} = array(
		'type'		=>	'club',
		'name'		=>	'3',
		'rank'		=>	3,
		'priority'	=>	3
	);
	
	$cards->{'4dd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'4',
		'rank'		=>	4,
		'priority'	=>	4
	);
	$cards->{'4hh'} = array(
		'type'		=>	'heart',
		'name'		=>	'4',
		'rank'		=>	4,
		'priority'	=>	4
	);
	$cards->{'4ss'} = array(
		'type'		=>	'spade',
		'name'		=>	'4',
		'rank'		=>	4,
		'priority'	=>	4
	);
	$cards->{'4cc'} = array(
		'type'		=>	'club',
		'name'		=>	'4',
		'rank'		=>	4,
		'priority'	=>	4
	);
	
	$cards->{'5dd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'5',
		'rank'		=>	5,
		'priority'	=>	5
	);
	$cards->{'5hh'} = array(
		'type'		=>	'heart',
		'name'		=>	'5',
		'rank'		=>	5,
		'priority'	=>	5
	);
	$cards->{'5ss'} = array(
		'type'		=>	'spade',
		'name'		=>	'5',
		'rank'		=>	5,
		'priority'	=>	5
	);
	$cards->{'5cc'} = array(
		'type'		=>	'club',
		'name'		=>	'5',
		'rank'		=>	5,
		'priority'	=>	5
	);
	
	$cards->{'6dd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'6',
		'rank'		=>	6,
		'priority'	=>	6
	);
	$cards->{'6hh'} = array(
		'type'		=>	'heart',
		'name'		=>	'6',
		'rank'		=>	6,
		'priority'	=>	6
	);
	$cards->{'6ss'} = array(
		'type'		=>	'spade',
		'name'		=>	'6',
		'rank'		=>	6,
		'priority'	=>	6
	);
	$cards->{'6cc'} = array(
		'type'		=>	'club',
		'name'		=>	'6',
		'rank'		=>	6,
		'priority'	=>	6
	);
	
	$cards->{'7dd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'7',
		'rank'		=>	7,
		'priority'	=>	7
	);
	$cards->{'7hh'} = array(
		'type'		=>	'heart',
		'name'		=>	'7',
		'rank'		=>	7,
		'priority'	=>	7
	);
	$cards->{'7ss'} = array(
		'type'		=>	'spade',
		'name'		=>	'7',
		'rank'		=>	7,
		'priority'	=>	7
	);
	$cards->{'7cc'} = array(
		'type'		=>	'club',
		'name'		=>	'7',
		'rank'		=>	7,
		'priority'	=>	7
	);
	
	$cards->{'8dd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'8',
		'rank'		=>	8,
		'priority'	=>	8
	);
	$cards->{'8hh'} = array(
		'type'		=>	'heart',
		'name'		=>	'8',
		'rank'		=>	8,
		'priority'	=>	8
	);
	$cards->{'8ss'} = array(
		'type'		=>	'spade',
		'name'		=>	'8',
		'rank'		=>	8,
		'priority'	=>	8
	);
	$cards->{'8cc'} = array(
		'type'		=>	'club',
		'name'		=>	'8',
		'rank'		=>	8,
		'priority'	=>	8
	);
	
	$cards->{'9dd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'9',
		'rank'		=>	9,
		'priority'	=>	9
	);
	$cards->{'9hh'} = array(
		'type'		=>	'heart',
		'name'		=>	'9',
		'rank'		=>	9,
		'priority'	=>	9
	);
	$cards->{'9ss'} = array(
		'type'		=>	'spade',
		'name'		=>	'9',
		'rank'		=>	9,
		'priority'	=>	9
	);
	$cards->{'9cc'} = array(
		'type'		=>	'club',
		'name'		=>	'9',
		'rank'		=>	9,
		'priority'	=>	9
	);
	
	$cards->{'10dd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'10',
		'rank'		=>	10,
		'priority'	=>	10
	);
	$cards->{'10hh'} = array(
		'type'		=>	'heart',
		'name'		=>	'10',
		'rank'		=>	10,
		'priority'	=>	10
	);
	$cards->{'10ss'} = array(
		'type'		=>	'spade',
		'name'		=>	'10',
		'rank'		=>	10,
		'priority'	=>	10
	);
	$cards->{'10cc'} = array(
		'type'		=>	'club',
		'name'		=>	'10',
		'rank'		=>	10,
		'priority'	=>	10
	);
	
	$cards->{'jdd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'j',
		'rank'		=>	11,
		'priority'	=>	11
	);
	$cards->{'jhh'} = array(
		'type'		=>	'heart',
		'name'		=>	'j',
		'rank'		=>	11,
		'priority'	=>	11
	);
	$cards->{'jss'} = array(
		'type'		=>	'spade',
		'name'		=>	'j',
		'rank'		=>	11,
		'priority'	=>	11
	);
	$cards->{'jcc'} = array(
		'type'		=>	'club',
		'name'		=>	'j',
		'rank'		=>	11,
		'priority'	=>	11
	);
	
	$cards->{'qdd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'q',
		'rank'		=>	12,
		'priority'	=>	12
	);
	$cards->{'qhh'} = array(
		'type'		=>	'heart',
		'name'		=>	'q',
		'rank'		=>	12,
		'priority'	=>	12
	);
	$cards->{'qss'} = array(
		'type'		=>	'spade',
		'name'		=>	'q',
		'rank'		=>	12,
		'priority'	=>	12
	);
	$cards->{'qcc'} = array(
		'type'		=>	'club',
		'name'		=>	'q',
		'rank'		=>	12,
		'priority'	=>	12
	);
	
	$cards->{'kdd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'k',
		'rank'		=>	13,
		'priority'	=>	13
	);
	$cards->{'khh'} = array(
		'type'		=>	'heart',
		'name'		=>	'k',
		'rank'		=>	13,
		'priority'	=>	13
	);
	$cards->{'kss'} = array(
		'type'		=>	'spade',
		'name'		=>	'k',
		'rank'		=>	13,
		'priority'	=>	13
	);
	$cards->{'kcc'} = array(
		'type'		=>	'club',
		'name'		=>	'k',
		'rank'		=>	13,
		'priority'	=>	13
	);

$market_id_25 = market_id_25($cards2, $cards);


$check_array = array();

$cards_a_length = count($cards1_array);
$cards_b_length = count($cards2_array);

if($cards_a_length > $cards_b_length){
	$final_length = $cards_a_length;
}
else{
	$final_length = $cards_b_length;
}


for($i=0;$i<$final_length;$i++){
	$bahar_card = $cards2_array[$i];
	$andar_card = $cards1_array[$i];
	
	$final_bahar_card = substr($bahar_card, 0, -2);
	$final_andar_card = substr($andar_card, 0, -2);
	
	if(in_array($final_bahar_card,$check_array)){
		
	}
	else{
		$market_ids[] = is_card_number($final_bahar_card,"bahar");
		$check_array[] = $final_bahar_card;
	}
	
	if(in_array($final_andar_card,$check_array)){
		
	}
	else{
		$market_ids[] = is_card_number($final_andar_card,"andar");
		$check_array[] = $final_andar_card;
	}
	
}


$end_date_time = date("Y-m-d H:i:s");
$transaction_time = date("Y-m-d H:i:s");
$transaction_time2 = date("d-m-Y H:i:s");

$get_all_bet = $conn->query("select * from bet_teen_details where event_id='$mid' and event_type='$event_type' and bet_status=1");
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


    if (in_array($bet_market_id, $market_ids)) {
        $user_amount = $actual_win_amount2;
        $smdl_amount = -$actual_win_amount2;
        if ($market_id_25 == $bet_market_id) {
            $bet_odds = 1.25;
        }
        $bet_result = ($bet_odds - 1 ) * $bet_stack;
        $update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='$bet_result' where bet_id='$bet_id' and bet_status=1");

		if($conn->affected_rows > 0){      
		
			$transaction_id = $bet_id.'-'.$bet_user_id;
			
			$account_description = "#Win $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
			if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $bet_result != 0)){
				$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id',0,'$account_description','$bet_id','$mid','$bet_result','Credit','4','$transaction_time','1',1,'$transaction_id')");
			}
			if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $bet_result != 0))){
				$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id',0,'$account_description','$bet_id','$mid','$bet_result','Credit','4','$transaction_time','1',1,'$transaction_id')");
			}

			$level_pers = get_level_per($conn, $bet_user_id);
			foreach ($level_pers as $debit_user_id => $level_per) {

				$debit_amt = 0 - (($actual_win_amount2 / 100) * $level_per);
				
				$transaction_id = $bet_id.'-'.$debit_user_id;

				$account_descriptionSMDL = "#Loss $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
				if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $debit_amt != 0)){
					$insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$debit_amt','Debit','7','$transaction_time','1',1,'$transaction_id')");
				}
				if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $debit_amt != 0))){
					$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$debit_amt','Debit','7','$transaction_time','1',1,'$transaction_id')");
				}
			}
        }
    } else {


        $bet_winning_amount22 = ($bet_odds - 1 ) * $bet_stack;
        $update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='-$bet_stack'  where bet_id='$bet_id' and bet_status=1");

		if($conn->affected_rows > 0){
		
			$transaction_id = $bet_id.'-'.$bet_user_id;
			
			$account_description = "#Loss $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
			if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $bet_stack != 0)){
				$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','-$bet_stack','Debit','7','$transaction_time','1',1,'$transaction_id')");
			}
			if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $bet_stack != 0))){
				$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','-$bet_stack','Debit','7','$transaction_time','1',1,'$transaction_id')");
			}

			$level_pers = get_level_per($conn, $bet_user_id);
			foreach ($level_pers as $cradit_user_id => $level_per) {

				$cradit_amt = ($bet_amount / 100) * $level_per;
				
				$transaction_id = $bet_id.'-'.$cradit_user_id;

				$account_descriptionSMDL = "#Win $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
				if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $cradit_amt != 0)){
					$insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$cradit_amt','Credit','4','$transaction_time','1',1,'$transaction_id')");
				}
				if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $cradit_amt != 0))){
					$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$cradit_amt','Credit','4','$transaction_time','1',1,'$transaction_id')");
				}
			}
        }
    }
}


$conn->query("delete from exposure_details where event_id='$mid' and market_type ='$event_type'");
echo "done";

function is_card_number($card, $cards_type) {
	 if($card == "A" or $card == 1 or $card == "1"){
		$rank = 1;
	}
	else if($card == "K" or $card == 13 or $card == "13"){
		$rank = 13;
	}
	else if($card == "J" or $card == 11 or $card == "11"){
		$rank = 11;
	}
	else if($card == "Q" or $card == 12 or $card == "12"){
		$rank = 12;
	}
	else{
		$rank = $card;
	}
	if(strtoupper($cards_type) == "BAHAR"){
		return 20 + $rank;
	}
	else{
		return $rank;
	}
	
}
function market_id_25($cards2, $cards) {
    $cards_data = $cards->$cards2;

    $cards_rank = $cards_data['rank'];

    $return_id = 20 + $cards_rank;
    return $return_id;
}

?>