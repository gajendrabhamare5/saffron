<?php

include('../include/conn.php');
include('../include/level_percentage.php');
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

$data_original = '{"t1":{"rid":"170260323174706","mtime":"3/23/2026 5:47:06 PM","ename":"Unlimited Joker 20-20","rdesc":"Player A","card":"9SS,10CC,8SS,8DD,KHH,2DD","winnat":"Result","win":"1","gtype":"joker120"},"t2":null}';
$data = json_decode($data_original);

$result_array = $data->t1;



$remark = $result_array->rdesc;


$game_type = $result_array->gtype;
$mid = $result_array->rid;
$bet_final_result = $result_array->winnat;
$result = $result_array->win;
$result_status = $result_array->win;


$cards3 = $result_array->card;
$cards_arr = explode(",", $cards3);
$playerA_cards = array();
$playerB_cards = array();
if (count($cards_arr) >= 6) {
    $playerA_cards = [$cards_arr[0], $cards_arr[2], $cards_arr[4]];
    $playerB_cards = [$cards_arr[1], $cards_arr[3], $cards_arr[5]];
}
echo "<pre>";
print_r($playerA_cards);
echo "</pre>";
echo "<pre>";
print_r($playerB_cards);
echo "</pre>";
$cards3 = '["'.$cards3.'"]';
$cards3 = str_replace(',','","',$cards3);
$cards = $cards3;
$cards2 =$cards3;



$event_type = "JOKER120";

$market_id = array();
$market_id[] = $result_status;
$winner_cards_id = array();
$result_time = date("Y-m-d H:i:s");
$return_odds = 0;
$return_odds2 = 0;
$cards2 = json_decode($cards2);


  
$bet_final_result = 'Winner - '.$bet_final_result;

$end_date_time = date("Y-m-d H:i:s");
$transaction_time = date("Y-m-d H:i:s");
$transaction_time2 = date("d-m-Y H:i:s");

$get_all_bet = $conn->query("select * from bet_teen_details where event_id='$mid' and bet_status=0 and event_type='$event_type'");
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

    $joker_card = $fetch_get_all_bet['joker_card'];
    $get_parent_ids = $conn->query("select * from user_login_master where UserID=$bet_user_id");
    $fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
    $parentDL = $fetch_parent_ids['parentDL'];
    $parentMDL = $fetch_parent_ids['parentMDL'];
    $parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];

    $player_winner = ""; // fallback
    if (count($playerA_cards) == 3 && count($playerB_cards) == 3) {
        $jokerRankStr="0";
        if(!empty($joker_card)){
            $jokerRankStr = get_joker_rank_str($joker_card); 
        }
        $custom_winner = compareHandsJoker($playerA_cards, $playerB_cards, $jokerRankStr);
        echo "<pre>";
print_r($custom_winner);
echo "</pre>";
        if($custom_winner == 14 || $custom_winner == 140) {
            $player_winner = $custom_winner;
        }
    }
    echo $player_winner;
    $bet_type = strtolower($fetch_get_all_bet['bet_type']);
    $winner_flag=false;
   
    if ((int)$bet_market_id == 14 || (int)$bet_market_id == 140) {
		if ($bet_market_id == $player_winner and $bet_type == "back") {
			$winner_flag=true;
		} else if ($bet_market_id != $player_winner and $bet_type == "lay") {
			$winner_flag=true;
		}
	}

/* 
    if ($winner_flag) {

        $user_amount = $actual_win_amount2;
        $smdl_amount = -$actual_win_amount2;


        $bet_result = ($bet_odds - 1 ) * $bet_stack;
        $update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='$user_amount',bet_final_result='$bet_final_result' where bet_id='$bet_id' and bet_status=1");
        
        if($conn->affected_rows > 0){
        	$transaction_id = $bet_id.'-'.$bet_user_id;
			$account_description = "#Win $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
            if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $user_amount != 0)){
			    $insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','$user_amount','Credit','4','$transaction_time','1',1,'$transaction_id')");
            }
            if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $user_amount != 0))){
				$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','$user_amount','Credit','4','$transaction_time','1',1,'$transaction_id')");
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
        $update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='-$bet_amount',bet_final_result='$bet_final_result'  where bet_id='$bet_id' and bet_status=1");

		if($conn->affected_rows > 0){
			$transaction_id = $bet_id.'-'.$bet_user_id;
			$account_description = "#Loss $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
            if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $bet_amount != 0)){
			    $insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','-$bet_amount','Debit','7','$transaction_time','1',1,'$transaction_id')");
            }
            if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $bet_amount != 0))){
				$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','-$bet_amount','Debit','7','$transaction_time','1',1,'$transaction_id')");
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
    } */
}
/* $conn->query("delete from exposure_details where event_id='$mid' and market_type ='$event_type'"); */


echo "done";

function get_joker_rank_str($joker_id) {
    if ($joker_id == 11) return 'J';
    if ($joker_id == 12) return 'Q';
    if ($joker_id == 13) return 'K';
    if ($joker_id == 14 || $joker_id == 1) return 'A';
    return (string)$joker_id;
}

function cardValueJoker($card) {
    if (strpos($card, "10") === 0) return 10;
    $map = [
        '2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>6,'7'=>7,'8'=>8,'9'=>9,
        'T'=>10,'J'=>11,'Q'=>12,'K'=>13,'A'=>14
    ];
    return $map[$card[0]];
}

function cardSuitJoker($card) {
    return (strpos($card, "10") === 0) ? substr($card, 2, 1) : substr($card, 1, 1);
}

function evaluateHandJoker($cards, $jokerRank) {
    $jokerCount = 0;
    $nonJokers = [];
    foreach ($cards as $card) {
        $val = cardValueJoker($card);
        $rankStr = (strpos($card, "10") === 0) ? "10" : strtoupper($card[0]);
        if ($rankStr == strtoupper($jokerRank)) {
            $jokerCount++;
        } else {
            $nonJokers[] = ['val' => $val, 'suit' => cardSuitJoker($card)];
        }
    }

    if ($jokerCount == 3) {
        return [6, 14, ['14S', '14H', '14D']];
    }
    if ($jokerCount == 2) {
        $v = $nonJokers[0]['val'];
        $s = $nonJokers[0]['suit'];
        $s2 = ($s == 'S') ? 'H' : 'S';
        $s3 = ($s == 'C') ? 'D' : 'C';
        return [6, $v, [$v.$s, $v.$s2, $v.$s3]];
    }
    if ($jokerCount == 1) {
        $c1 = $nonJokers[0];
        $c2 = $nonJokers[1];
        $v1 = $c1['val']; 
        $s1 = $c1['suit'];
        $v2 = $c2['val']; 
        $s2 = $c2['suit'];
        if ($v1 < $v2) { 
            $tmp = $v1; $v1 = $v2; $v2 = $tmp; 
            $tmpS = $s1; $s1 = $s2; $s2 = $tmpS;
        }
        $isFlush = ($s1 == $s2);
        
        if ($v1 == $v2) {
            $s3 = ($s1 == 'S' || $s2 == 'S') ? 'H' : 'S';
            return [6, $v1, [$v1.$s1, $v2.$s2, $v1.$s3]]; 
        }
        
        $diff = $v1 - $v2;
        $isStraight = false;
        $straightHigh = 0;
        $jokerBecomes = 0;
        $js = $isFlush ? $s1 : 'S';

        if ($diff == 1) {
            $isStraight = true;
            $straightHigh = $v1 + 1 > 14 ? 14 : $v1 + 1;
            $jokerBecomes = ($v1 + 1 > 14) ? $v2 - 1 : $v1 + 1;
            if ($v1 == 3 && $v2 == 2) { $straightHigh = 3; $jokerBecomes = 14; }
        } else if ($diff == 2) {
            $isStraight = true;
            $straightHigh = $v1; 
            $jokerBecomes = $v1 - 1;
        } else if (($v1 == 14 && $v2 == 2) || ($v1 == 14 && $v2 == 3)) {
            $isStraight = true;
            $straightHigh = 3;
            $jokerBecomes = ($v2 == 2) ? 3 : 2; 
        }
        
        if ($isStraight && $isFlush) return [5, $straightHigh, [$v1.$s1, $v2.$s2, $jokerBecomes.$js]];
        if ($isStraight) return [4, $straightHigh, [$v1.$s1, $v2.$s2, $jokerBecomes.$js]];
        
        if ($isFlush) {
            $jokerBecomes = ($v1 == 14) ? 13 : 14; 
            return [3, $v1, [$v1.$s1, $v2.$s2, $jokerBecomes.$js]];
        }
        
        return [2, $v1, [$v1.$s1, $v2.$s2, $v1.$js]]; 
    }

    $values = [];
    $suits = [];
    $finalPrintValues = [];
    foreach ($nonJokers as $c) {
        $values[] = $c['val'];
        $suits[] = $c['suit'];
        $finalPrintValues[] = $c['val'].$c['suit'];
    }
    sort($values);
    $isFlush = count(array_unique($suits)) == 1;
    $isTrail = count(array_unique($values)) == 1;
    $isStraight = false;
    if ($values[0]+1 == $values[1] && $values[1]+1 == $values[2]) $isStraight = true;
    if ($values == [2,3,14]) {
        $isStraight = true;
        // keeping logic intact
        $values = [1,2,3];
    }
    
    if ($isTrail) return [6, max($values), $finalPrintValues];
    if ($isStraight && $isFlush) return [5, max($values), $finalPrintValues];
    if ($isStraight) return [4, max($values), $finalPrintValues];
    if ($isFlush) return [3, max($values), $finalPrintValues];
    if (count(array_unique($values)) == 2) {
        $counts = array_count_values($values);
        foreach ($counts as $val => $count) {
            if ($count == 2) return [2, $val, $finalPrintValues];
        }
    }
    return [1, max($values), $finalPrintValues];
}

function compareHandsJoker($handA, $handB, $jokerRank) {
    if (empty($jokerRank) || $jokerRank == 'null' || $jokerRank == '0') {
        $jokerRank = 'NONE';
    }
    $rankA = evaluateHandJoker($handA, $jokerRank);
    $rankB = evaluateHandJoker($handB, $jokerRank);
    
    echo "<pre> ----------------- </pre>";
    echo "<pre> Player A Final Cards Values: "; print_r($rankA[2]); echo "</pre>";
    echo "<pre> Player B Final Cards Values: "; print_r($rankB[2]); echo "</pre>";
    echo "<pre> ----------------- </pre>";

    if ($rankA[0] > $rankB[0]) return 14;
    elseif ($rankA[0] < $rankB[0]) return 140;
    else {
        if ($rankA[1] > $rankB[1]) return 14;
        elseif ($rankA[1] < $rankB[1]) return 140;
        else return 3;
    }
}
?>