<?php

include('../include/conn.php');
include('../include/level_percentage.php');
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
$data_original = file_get_contents("php://input");
$data = json_decode(file_get_contents("php://input"));

$result_array = $data[0];



$rdesc = $result_array->desc;

$game_type = $result_array->gtype;
$mid = $result_array->mid;
$mid = str_replace("22.","",$mid);
$bet_final_result = "";
$result = $result_array->win;
$selection_id = $result_array->sid;


$cards3 = $result_array->cards;
$cards3 = '["'.$cards3.'"]';
$cards3 = str_replace(',','","',$cards3);
$cards2 = $cards3;
$event_type = "OPENTEENPATTI";

$selection_id_array = explode("|",$selection_id);
$result_status = $selection_id_array[0];
$result_time = date("Y-m-d H:i:s");
$market_id = array();
if ($result == 0) {
    
   
    $new_remarks = explode(",", $result_status);
    foreach ($new_remarks as $wn_market_id) {
        $market_id[] = $wn_market_id;
        $winner_cards_id[] = $wn_market_id;
    }
} 



$conn->query("insert into twenty_teenpatti_result (event_id,game_type,result_status,cards,result_time,desc_remakrs,data) VALUES('$mid','$game_type','$result_status','$cards3','$result_time','$rdesc','$data_original')");
$insert_id = $conn->insert_id;
if($insert_id <= 0){
	/* echo "already inserted"; exit()  */
}


$result_status = $result;

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


$return_odds = 0;
$return_odds2 = 0;
$cards2 = json_decode($cards2);

$cards_1 = array($cards2[0], $cards2[9], $cards2[18]);
$cards_2 = array($cards2[1], $cards2[10], $cards2[19]);
$cards_3 = array($cards2[2], $cards2[11], $cards2[20]);
$cards_4 = array($cards2[3], $cards2[12], $cards2[21]);
$cards_5 = array($cards2[4], $cards2[13], $cards2[22]);
$cards_6 = array($cards2[5], $cards2[14], $cards2[23]);
$cards_7 = array($cards2[6], $cards2[15], $cards2[24]);
$cards_8 = array($cards2[7], $cards2[16], $cards2[25]);

$is_cards_1 = is_trio($cards_1[0], $cards_1[1], $cards_1[2], $cards);
if ($is_cards_1) {
    $market_id[] = 11;
    $return_odds11 = 30;
} else {
    $is_1_straight_flush = is_straight_flush($cards_1[0], $cards_1[1], $cards_1[2], $cards);
    if ($is_1_straight_flush) {
        $market_id[] = 11;
        $return_odds11 = 40;
    } else {
        $is_1_flush = is_flush($cards_1[0], $cards_1[1], $cards_1[2], $cards);
        if ($is_1_flush) {
            //ron
            $market_id[] = 11;
            $return_odds11 = 6;
        } else {
            $is_1_color = is_color($cards_1[0], $cards_1[1], $cards_1[2], $cards);
            if ($is_1_color) {

                $market_id[] = 11;
                $return_odds11 = 4;
            } else {
                $is_1_pair = is_pair($cards_1[0], $cards_1[1], $cards_1[2], $cards);
                if ($is_1_pair) {
                    $market_id[] = 11;
                    $return_odds11 = 1;
                } else {
                    
                }
            }
        }
    }
}


$is_cards_2 = is_trio($cards_2[0], $cards_2[1], $cards_2[2], $cards);
if ($is_cards_2) {
    $market_id[] = 12;
    $return_odds12 = 30;
} else {
    $is_2_straight_flush = is_straight_flush($cards_2[0], $cards_2[1], $cards_2[2], $cards);
    if ($is_2_straight_flush) {
        $market_id[] = 12;
        $return_odds12 = 40;
    } else {
        $is_2_flush = is_flush($cards_2[0], $cards_2[1], $cards_2[2], $cards);
        if ($is_2_flush) {
            //ron
            $market_id[] = 12;
            $return_odds12 = 6;
        } else {
            $is_2_color = is_color($cards_2[0], $cards_2[1], $cards_2[2], $cards);
            if ($is_2_color) {

                $market_id[] = 12;
                $return_odds12 = 4;
            } else {
                $is_2_pair = is_pair($cards_2[0], $cards_2[1], $cards_2[2], $cards);
                if ($is_2_pair) {
                    $market_id[] = 12;
                    $return_odds12 = 1;
                } else {
                    
                }
            }
        }
    }
}

$is_cards_3 = is_trio($cards_3[0], $cards_3[1], $cards_3[2], $cards);
if ($is_cards_3) {
    $market_id[] = 13;
    $return_odds13 = 30;
} else {
    $is_3_straight_flush = is_straight_flush($cards_3[0], $cards_3[1], $cards_3[2], $cards);
    if ($is_3_straight_flush) {
        $market_id[] = 13;
        $return_odds13 = 40;
    } else {
        $is_3_flush = is_flush($cards_3[0], $cards_3[1], $cards_3[2], $cards);
        if ($is_3_flush) {
            //ron
            $market_id[] = 13;
            $return_odds13 = 6;
        } else {
            $is_3_color = is_color($cards_3[0], $cards_3[1], $cards_3[2], $cards);
            if ($is_3_color) {

                $market_id[] = 13;
                $return_odds13 = 4;
            } else {
                $is_3_pair = is_pair($cards_3[0], $cards_3[1], $cards_3[2], $cards);
                if ($is_3_pair) {
                    $market_id[] = 13;
                    $return_odds13 = 1;
                } else {
                    
                }
            }
        }
    }
}


$is_cards_4 = is_trio($cards_4[0], $cards_4[1], $cards_4[2], $cards);
if ($is_cards_4) {
    $market_id[] = 14;
    $return_odds14 = 30;
} else {
    $is_4_straight_flush = is_straight_flush($cards_4[0], $cards_4[1], $cards_4[2], $cards);
    if ($is_4_straight_flush) {
        $market_id[] = 14;
        $return_odds14 = 40;
    } else {
        $is_4_flush = is_flush($cards_4[0], $cards_4[1], $cards_4[2], $cards);
        if ($is_4_flush) {
            //ron
            $market_id[] = 14;
            $return_odds14 = 6;
        } else {
            $is_4_color = is_color($cards_4[0], $cards_4[1], $cards_4[2], $cards);
            if ($is_4_color) {

                $market_id[] = 14;
                $return_odds14 = 4;
            } else {
                $is_4_pair = is_pair($cards_4[0], $cards_4[1], $cards_4[2], $cards);
                if ($is_4_pair) {
                    $market_id[] = 14;
                    $return_odds14 = 1;
                } else {
                    
                }
            }
        }
    }
}

$is_cards_5 = is_trio($cards_5[0], $cards_5[1], $cards_5[2], $cards);
if ($is_cards_5) {
    $market_id[] = 15;
    $return_odds15 = 30;
} else {
    $is_5_straight_flush = is_straight_flush($cards_5[0], $cards_5[1], $cards_5[2], $cards);
    if ($is_5_straight_flush) {
        $market_id[] = 15;
        $return_odds15 = 40;
    } else {
        $is_5_flush = is_flush($cards_5[0], $cards_5[1], $cards_5[2], $cards);
        if ($is_5_flush) {
            //ron
            $market_id[] = 15;
            $return_odds15 = 6;
        } else {
            $is_5_color = is_color($cards_5[0], $cards_5[1], $cards_5[2], $cards);
            if ($is_5_color) {

                $market_id[] = 15;
                $return_odds15 = 4;
            } else {
                $is_5_pair = is_pair($cards_5[0], $cards_5[1], $cards_5[2], $cards);
                if ($is_5_pair) {
                    $market_id[] = 15;
                    $return_odds15 = 1;
                } else {
                    
                }
            }
        }
    }
}

$is_cards_6 = is_trio($cards_6[0], $cards_6[1], $cards_6[2], $cards);
if ($is_cards_6) {
    $market_id[] = 16;
    $return_odds16 = 30;
} else {
    $is_6_straight_flush = is_straight_flush($cards_6[0], $cards_6[1], $cards_6[2], $cards);
    if ($is_6_straight_flush) {
        $market_id[] = 16;
        $return_odds16 = 40;
    } else {
        $is_6_flush = is_flush($cards_6[0], $cards_6[1], $cards_6[2], $cards);
        if ($is_6_flush) {
            //ron
            $market_id[] = 16;
            $return_odds16 = 6;
        } else {
            $is_6_color = is_color($cards_6[0], $cards_6[1], $cards_6[2], $cards);
            if ($is_6_color) {

                $market_id[] = 16;
                $return_odds16 = 4;
            } else {
                $is_6_pair = is_pair($cards_6[0], $cards_6[1], $cards_6[2], $cards);
                if ($is_6_pair) {
                    $market_id[] = 16;
                    $return_odds16 = 1;
                } else {
                    
                }
            }
        }
    }
}


$is_cards_7 = is_trio($cards_7[0], $cards_7[1], $cards_7[2], $cards);
if ($is_cards_7) {
    $market_id[] = 17;
    $return_odds17 = 30;
} else {
    $is_7_straight_flush = is_straight_flush($cards_7[0], $cards_7[1], $cards_7[2], $cards);
    if ($is_7_straight_flush) {
        $market_id[] = 17;
        $return_odds17 = 40;
    } else {
        $is_7_flush = is_flush($cards_7[0], $cards_7[1], $cards_7[2], $cards);
        if ($is_7_flush) {
            //ron
            $market_id[] = 17;
            $return_odds17 = 6;
        } else {
            $is_7_color = is_color($cards_7[0], $cards_7[1], $cards_7[2], $cards);
            if ($is_7_color) {

                $market_id[] = 17;
                $return_odds17 = 4;
            } else {
                $is_7_pair = is_pair($cards_7[0], $cards_7[1], $cards_7[2], $cards);
                if ($is_7_pair) {
                    $market_id[] = 17;
                    $return_odds17 = 1;
                } else {
                    
                }
            }
        }
    }
}

$is_cards_8 = is_trio($cards_8[0], $cards_8[1], $cards_8[2], $cards);
if ($is_cards_8) {
    $market_id[] = 18;
    $return_odds18 = 30;
} else {
    $is_8_straight_flush = is_straight_flush($cards_8[0], $cards_8[1], $cards_8[2], $cards);
    if ($is_8_straight_flush) {
        $market_id[] = 18;
        $return_odds18 = 40;
    } else {
        $is_8_flush = is_flush($cards_8[0], $cards_8[1], $cards_8[2], $cards);
        if ($is_8_flush) {
            //ron
            $market_id[] = 18;
            $return_odds18 = 6;
        } else {
            $is_8_color = is_color($cards_8[0], $cards_8[1], $cards_8[2], $cards);
            if ($is_8_color) {

                $market_id[] = 18;
                $return_odds18 = 4;
            } else {
                $is_8_pair = is_pair($cards_8[0], $cards_8[1], $cards_8[2], $cards);
                if ($is_8_pair) {
                    $market_id[] = 18;
                    $return_odds18 = 1;
                } else {
                    
                }
            }
        }
    }
}

$check_result_already_insert = $conn->query("select * from twenty_teenpatti_result where event_id='$mid'");
$row_count = mysqli_fetch_row($check_result_already_insert);
$market_id_text = implode(",", $winner_cards_id);
$result_status = $market_id_text;

$conn->query("insert into twenty_teenpatti_result (event_id,game_type,result_status,cards,result_time) VALUES('$mid','$game_type','$result_status','$cards3','$result_time')");
/* if($row_count > 0){
  echo "ok";
  exit();
  } */
  
$bet_final_result = 'Winner - '.$market_id_text;

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

        if ($bet_market_id == 11) {
            $actual_win_amount2 = $return_odds11 * $bet_amount;
        } else if ($bet_market_id == 12) {
            $actual_win_amount2 = $return_odds12 * $bet_amount;
        } else if ($bet_market_id == 13) {
            $actual_win_amount2 = $return_odds13 * $bet_amount;
        } else if ($bet_market_id == 14) {
            $actual_win_amount2 = $return_odds14 * $bet_amount;
        } else if ($bet_market_id == 15) {
            $actual_win_amount2 = $return_odds15 * $bet_amount;
        } else if ($bet_market_id == 16) {
            $actual_win_amount2 = $return_odds16 * $bet_amount;
        } else if ($bet_market_id == 17) {
            $actual_win_amount2 = $return_odds17 * $bet_amount;
        } else if ($bet_market_id == 18) {
            $actual_win_amount2 = $return_odds18 * $bet_amount;
        }

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
        $update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='-$bet_stack',bet_final_result='$bet_final_result'  where bet_id='$bet_id' and bet_status=1");

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