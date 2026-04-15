<?php
include('../include/conn.php');
include('../include/level_percentage.php');
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

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



$result_status = "";



/* echo $desc_remakrs;
echo "<br>";
echo $actual_win_amount2 = $winning_loss_run * 100;
echo "<br>";
echo $actual_win_amount2 = $actual_win_amount2 * 1.15;


exit();
$result_status = $result; */
/* $conn->query("insert into twenty_teenpatti_result (event_id,game_type,result_status,cards,result_time,desc_remakrs,data) VALUES('$mid','$game_type','$result_status','$cards3','$result_time','$desc_remakrs','$data_original')"); */


$event_type = "CASINO_METER";
$get_all_bet = $conn->query("select * from bet_teen_details where bet_status=0 and event_type='$event_type' and date(bet_time) >= '2024-08-29' order by bet_time asc");
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
    $transaction_time = $fetch_get_all_bet['bet_time'];
    $bet_event_id = $fetch_get_all_bet['event_id'];
    $transaction_time = $fetch_get_all_bet['bet_time'];
    $transaction_bet_result = $fetch_get_all_bet['bet_result'];
    $transaction_time2 = $transaction_time;

    $actual_win_amount2 = $bet_winning_amount;
    $get_parent_ids = $conn->query("select * from user_login_master where UserID=$bet_user_id");
    $fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
    $parentDL = $fetch_parent_ids['parentDL'];
    $parentMDL = $fetch_parent_ids['parentMDL'];
    $parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];

    $get_parent_ids = $conn->query("select * from twenty_teenpatti_result where event_id=$bet_event_id limit 1");
    $fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
    $data_original = $fetch_parent_ids['data'];

    $data = json_decode($data_original);

    $result_array = $data->t1;



    $rdesc = $result_array->rdesc;


    $game_type = $result_array->gtype;
    $mid = $result_array->rid;
    $bet_final_result = $result_array->winnat;
    $result = $result_array->win;


    $cards3 = $result_array->card;
    $cards3 = '["'.$cards3.'"]';
    $cards3 = str_replace(',','","',$cards3);
    $cards2 = $cards3;
    $cards2 = json_decode($cards2);

    $sum_cards = sum_cards($cards2, $cards,$bet_market_name);
    $low = $sum_cards['low'];
    $high = $sum_cards['high'];

    $market_id=array();
    $desc_remakrs = $low . "-" . $high;
    if ($low > $high) {
        $result = 1;
        $winning_loss_run = $low - $high;
        $market_id[] = 1;
    } else {
        $result = 2;
        $winning_loss_run = $high - $low;
        $market_id[] = 2;
    }
    if($winning_loss_run > 50){
        $winning_loss_run=50;
    }
    echo "<br>";
    echo "<br>";
    echo "<br>";    
    echo "event_id=$bet_event_id";
    echo "<br>";
    //$bet_result = ($bet_odds - 1 ) * $bet_stack;
    echo $transaction_bet_result;
    if (in_array($bet_market_id, $market_id)) {

        //$return_stack = $bet_stack * 1.5;

        $actual_win_amount2 = $winning_loss_run * $bet_stack;
        $actual_win_amount2 = $actual_win_amount2 * 1.15;

        $user_amount = $actual_win_amount2;
        $smdl_amount = -$actual_win_amount2;
        if(abs($actual_win_amount2) == abs($transaction_bet_result)){
            continue;
        }
        echo "<br>";
        echo "update bet_teen_details_ak set bet_status=0,bet_result='$actual_win_amount2' where bet_id='$bet_id' and bet_status=0";
       /*  $update_bet = $conn->query("update bet_teen_details_ak set bet_status=0,bet_result='$actual_win_amount2' where bet_id='$bet_id' and bet_status=0"); */
        
       /*  if($update_bet){ */
       echo "<br>";
            echo "update accounts_ak set amount='$actual_win_amount2' where bet_id='$bet_id' and user_id='$bet_user_id' and game_type='1'";
            echo "<br>";
            echo "update accounts_temp_ak set amount='$actual_win_amount2' where bet_id='$bet_id' and user_id='$bet_user_id' and game_type='1'";

           /*  $conn->query("update accounts_ak set amount='$actual_win_amount2' where bet_id='$bet_id' and user_id='$bet_user_id' and game_type='1'");
            $conn->query("update accounts_temp_ak set amount='$actual_win_amount2' where bet_id='$bet_id' and user_id='$bet_user_id' and game_type='1'"); */

        	

			$level_pers = get_level_per($conn, $bet_user_id);
			foreach ($level_pers as $debit_user_id => $level_per) {

				$debit_amt = 0 - (($actual_win_amount2 / 100) * $level_per);
                echo "<br>";
                if($debit_amt != 0){
                    echo "update accounts_ak set amount='$debit_amt' where bet_id='$bet_id' and user_id='$debit_user_id' and game_type='1'";
                    echo "<br>";
                    echo "update accounts_temp_ak set amount='$debit_amt' where bet_id='$bet_id' and user_id='$debit_user_id' and game_type='1'";
                /*  $conn->query("update accounts_ak set amount='$debit_amt' where bet_id='$bet_id' and user_id='$debit_user_id' and game_type='1'");
                    $conn->query("update accounts_temp_ak set amount='$debit_amt' where bet_id='$bet_id' and user_id='$debit_user_id' and game_type='1'");
    */
                }
				
			}
        /* } */
    } else {

        $lossing_amount = $winning_loss_run * $bet_stack;
        if(abs($lossing_amount) == abs($transaction_bet_result)){
            continue;
        }
        echo "<br>";
        echo "update bet_teen_details_ak set bet_status=0,bet_result='-$lossing_amount'  where bet_id='$bet_id' and bet_status=0";

       /*  $update_bet = $conn->query("update bet_teen_details_ak set bet_status=0,bet_result='-$lossing_amount'  where bet_id='$bet_id' and bet_status=0");

		if($conn->affected_rows > 0){ */
        echo "<br>";
        echo "update accounts_ak set amount='-$lossing_amount' where bet_id='$bet_id' and user_id='$bet_user_id' and game_type='1'";
        echo "<br>";
        echo "update accounts_temp_ak set amount='-$lossing_amount' where bet_id='$bet_id' and user_id='$bet_user_id' and game_type='1'";
         /*    $conn->query("update accounts_ak set amount='-$lossing_amount' where bet_id='$bet_id' and user_id='$bet_user_id' and game_type='1'");
            $conn->query("update accounts_temp_ak set amount='-$lossing_amount' where bet_id='$bet_id' and user_id='$bet_user_id' and game_type='1'"); */

			

			$level_pers = get_level_per($conn, $bet_user_id);
			foreach ($level_pers as $cradit_user_id => $level_per) {
               
				$cradit_amt = ($lossing_amount / 100) * $level_per;
				echo "<br>";
                if($cradit_amt != 0){
                echo "update accounts_ak set amount='$cradit_amt' where bet_id='$bet_id' and user_id='$cradit_user_id' and game_type='1'";
                echo "<br>";
                echo "update accounts_temp_ak set amount='$cradit_amt' where bet_id='$bet_id' and user_id='$cradit_user_id' and game_type='1'";
               /*  $conn->query("update accounts_ak set amount='$cradit_amt' where bet_id='$bet_id' and user_id='$cradit_user_id' and game_type='1'");
                $conn->query("update accounts_temp_ak set amount='$cradit_amt' where bet_id='$bet_id' and user_id='$cradit_user_id' and game_type='1'"); */
                }
			}
       /*  } */
    }
}


/* $conn->query("delete from exposure_details where event_id='$mid' and market_type ='$event_type'"); */

echo "done";

function sum_cards($cards2, $cards,$bet_market_name) {
	
	$low = 0;
	$high = 0;

    $ranks_hight=array();
    $ranks_low=array();
	foreach($cards2 as $c){
		$card11 = $cards->$c;
		$rank_1 = $card11['rank'];
		
		/* $spade10=false;
		if(strtolower($c) == "10ss")
		{
			$spade10=true;
		}
		$spade9=false;
		if(strtolower($c) == "9ss")
		{
			$spade9=true;
    
		} */
        $spade9=false;
        $spade10=false;
        if(strtolower($bet_market_name) == "high" && strtolower($c) == "9ss"){
            $spade9=false;
        }
        if(strtolower($bet_market_name) == "high" && strtolower($c) == "10ss"){
            $spade10=true;
        }
        if(strtolower($bet_market_name) == "low" && strtolower($c) == "9ss"){
            $spade9=true;
        }
        if(strtolower($bet_market_name) == "low" && strtolower($c) == "10ss"){
            $spade10=false;
        }
        if($rank_1 >= 10 && ($spade9 == true || $spade10 == false)){
            $high += $rank_1;
            $ranks_hight[]=$rank_1."=".$c;
        }else{
            $low += $rank_1;
            $ranks_low[]=$rank_1."=".$c;
        }
		
		/* if($rank_1 >= 10){
			$high += $rank_1;
		}
		else{
			$low += $rank_1;
		} */
		
	}
	
	$return_data = array(
						"low"=>$low,
						"high"=>$high,
						"ranks_low"=>$ranks_low,
						"ranks_hight"=>$ranks_hight,
						);
    
    return $return_data;
}

?>