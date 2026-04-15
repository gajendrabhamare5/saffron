<?
include('include/conn.php');
include('include/flip_function.php');

$user_id = 51333;

$current_bet = array(
    "bet_event_type" => 4,
    "bet_event_id" => 828856279,
    "bet_market_id" => 8,
    "bet_runner_id" => "",
    "bet_margin_used" => 10000,
    "bet_win_amount" => 10000,
    "bet_odds" => 9,
    "bet_type" => 'Back',
    "bet_market_type" => 'BOOKMAKER_ODDS',
    "stack" => 10000,
    "runs" => 9,
    "other_fancy" => false,
);

echo "<pre>";
print_r($current_bet);
echo "</pre>";

$bet_event_type = $current_bet['bet_event_type'];
$bet_event_id = $current_bet['bet_event_id'];
$bet_market_id = $current_bet['bet_market_id'];
$bet_margin_used = $current_bet['bet_margin_used'];
$bet_win_amount = $current_bet['bet_win_amount'];
$bet_odds = $current_bet['bet_odds'];
echo $bet_type = $current_bet['bet_market_type'];
$bet_type_exposure = $current_bet['bet_type'];
$stack = $current_bet['stack'];
$runs = $current_bet['runs'];
$exposure_datetime = date("Y-m-d H:i:s");
$bet_type_check = false;



$bet_market_type2 = "";
if (isset($current_bet['bet_market_type2'])) {
    $bet_market_type2 = $current_bet['bet_market_type2'];
}
if ($bet_type == "MATCH_ODDS" or $bet_type == "BOOKMAKER_ODDS" or $bet_type == "BOOKMAKERSMALL_ODDS" or $bet_type == "BOOKMAKER_TIED_ODDS"  or $bet_type_check == true) {

    echo "select * from exposure_details where user_id=$user_id and event_id='$bet_event_id' and market_type='$bet_type'";
    $check_market_exposure_exit = $conn->query("select * from exposure_details where user_id=$user_id and event_id='$bet_event_id' and market_type='$bet_type'");
    $check_num_rows = mysqli_num_rows($check_market_exposure_exit);

    if ($check_num_rows <= 0) {
        //insert
        /* $conn->query("insert into exposure_details (user_id,event_id,market_type,exposure_amount,exposure_datetime,event_type,max_winning_amount) values('$user_id','$bet_event_id','$bet_type','-$bet_margin_used','$exposure_datetime','$bet_event_type','$bet_win_amount')"); */
    } else {
        $exposure_data_all = get_net_exposure_match_oods($conn, $user_id, $bet_event_id, $bet_type, $bet_type_exposure, $stack, $runs, array(), 1);
        echo "<pre>";
        print_r($exposure_data_all);
        echo "</pre>";
        $exposure_data = min($exposure_data_all);
        $max_exposure_data = max($exposure_data_all);
        if ($max_exposure_data < 0) {
            $max_exposure_data = 0;
        }
        echo "update exposure_details set exposure_amount='$exposure_data',max_winning_amount='$max_exposure_data',exposure_datetime='$exposure_datetime' where user_id=$user_id and event_id='$bet_event_id' and market_type='$bet_type'";
        /* $update_exposure_data = $conn->query("update exposure_details set exposure_amount='$exposure_data',max_winning_amount='$max_exposure_data',exposure_datetime='$exposure_datetime' where user_id=$user_id and event_id='$bet_event_id' and market_type='$bet_type'"); */
    }
}


function get_net_exposure_match_oods($conn, $user_id, $bet_event_id, $market_type, $bet_type_exposure, $stack, $runs, $current_bet = array(), $is_all_value = 0)
{
    $runs = floatVal($runs);
    $event_id = $bet_event_id;
    $market_id = $conn->query("select * from event_market_id where event_id='$bet_event_id' and market_type='$market_type'");
    $market_ids = array();
    while ($market_ids_array = mysqli_fetch_assoc($market_id)) {
        $market_ids[] = $market_ids_array['market_id'];
    }

    $bet_type_check = false;

    if (strpos($market_type, "OVER_UNDER") !== false || strpos($market_type, "UNDER_OVER") !== false || strpos($market_type, "GAME_WINNER") !== false || strpos($market_type, "2ND_SET_WINNER") !== false || strpos($market_type, "GAME_TO_DEUCE") !== false || strpos($market_type, "BM_2ND_SET") !== false || strpos($market_type, "POINT_WINNER") !== false) {
        $bet_type_check = true;
    }

    if (count($current_bet) > 0 && isset($current_bet['other_fancy']) && $current_bet['other_fancy'] == "other") {
        $bet_type_check = true;
    }
    $othermarkets = array();
    $market_ids = array_unique($market_ids);
    if ($market_type == "MATCH_ODDS" or $market_type == "BOOKMAKER_ODDS" or $market_type == "BOOKMAKERSMALL_ODDS" or $market_type == "BOOKMAKER_TIED_ODDS" or $bet_type_check == true) {
        $market_1_id = $market_ids[0];

        $market_2_id = $market_ids[1];
        /* $market_3_id = $market_ids[2]; */

        
        foreach ($market_ids as $keys => $ids) {
            if ($keys != 0 and $keys != 1) {
                $othermarkets[] = $ids;
            }
        }
    } else {
        $market_1_id = 1;
        $market_2_id = 3;
    }


    $type = $bet_type_exposure;
    if ($market_type == "MATCH_ODDS" or $market_type == "BOOKMAKER_ODDS" or $market_type == "BOOKMAKERSMALL_ODDS" or $market_type == "BOOKMAKER_TIED_ODDS" or $bet_type_check == true) {
        if ($type == "Lay") {
            $exposure_bet_type = "Lay";
            $margin_used = $stack * ($runs - 1);
            $bet_win_amount = $stack;
        } else {
            $exposure_bet_type = "Back";
            $bet_win_amount = $stack * ($runs - 1);
            $margin_used = $stack;
        }


        $get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_details where user_id=$user_id and event_id=$event_id and market_type='$market_type' and bet_status=1 GROUP BY event_id");
        $fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet);
        $total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];




        $event_1_id = $event_id;


        $get_1_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_1_id and market_type='$market_type' and bet_type='Back'");

        $get_1_opp_lay_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_1_id and market_type='$market_type' and bet_type='Lay'");

        $get_2_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_2_id and market_type='$market_type' and bet_type='Back'");

        $get_2_opp_lay_data = $conn->query("select * from  bet_details where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_2_id and market_type='$market_type' and bet_type='Lay'");




        $total_1_win_back = 0;
        while ($fetch_get_1_win_back_data = mysqli_fetch_assoc($get_1_win_back_data)) {
            $total_1_win_back = $total_1_win_back + $fetch_get_1_win_back_data['bet_win_amount'] + $fetch_get_1_win_back_data['bet_margin_used'];
        }
        $total_1_win_lay = 0;
        while ($fetch_get_1_opp_lay_data = mysqli_fetch_assoc($get_1_opp_lay_data)) {
            $total_1_win_lay = $total_1_win_lay + $fetch_get_1_opp_lay_data['bet_win_amount'] + $fetch_get_1_opp_lay_data['bet_margin_used'];
        }
        $total_2_win_back = 0;
        while ($fetch_get_2_win_back_data = mysqli_fetch_assoc($get_2_win_back_data)) {
            $total_2_win_back = $total_2_win_back + $fetch_get_2_win_back_data['bet_win_amount'] + $fetch_get_2_win_back_data['bet_margin_used'];
        }
        $total_2_win_lay = 0;
        while ($fetch_get_2_opp_lay_data = mysqli_fetch_assoc($get_2_opp_lay_data)) {
            $total_2_win_lay = $total_2_win_lay + $fetch_get_2_opp_lay_data['bet_win_amount'] + $fetch_get_2_opp_lay_data['bet_margin_used'];
        }

        $other_market_win = array();
        if (count($othermarkets) > 0) {
            foreach ($othermarkets as $markets) {
                $get_3_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$markets and market_type='$market_type' and bet_type='Back'");

                $get_3_opp_lay_data = $conn->query("select * from  bet_details where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$markets and market_type='$market_type' and bet_type='Lay'");
                $total_3_win_back = 0;
                while ($fetch_get_3_win_back_data = mysqli_fetch_assoc($get_3_win_back_data)) {
                    $total_3_win_back = $total_3_win_back + $fetch_get_3_win_back_data['bet_win_amount'] + $fetch_get_3_win_back_data['bet_margin_used'];
                }
                $other_market_win["total_" . $markets . "_win_back"] = $total_3_win_back;
                $total_3_win_lay = 0;
                while ($fetch_get_3_opp_lay_data = mysqli_fetch_assoc($get_3_opp_lay_data)) {
                    $total_3_win_lay = $total_3_win_lay + $fetch_get_3_opp_lay_data['bet_win_amount'] + $fetch_get_3_opp_lay_data['bet_margin_used'];
                }
                $other_market_win["total_" . $markets . "_win_lay"] = $total_3_win_lay;
            }
        }


        $current_bet_event_id = $current_bet['bet_event_id'];

        if ($current_bet_event_id == $event_1_id) {

            $current_bet_market_id = $current_bet['bet_market_id'];
            $current_bet_type = $current_bet['bet_type'];
            $current_bet_win_amount = $current_bet['bet_win_amount'];
            $current_bet_margin_used = $current_bet['bet_margin_used'];
            $total_bet_amount = $total_bet_amount + $current_bet_margin_used;
            if ($current_bet_type == 'Back') {
                //same market id
                if ($current_bet_market_id == $market_1_id) {
                    $total_1_win_back = $total_1_win_back + $current_bet_win_amount + $current_bet_margin_used;
                } else if ($current_bet_market_id == $market_2_id) {
                    $total_2_win_back = $total_2_win_back + $current_bet_win_amount + $current_bet_margin_used;
                } else {
                    if (count($othermarkets) > 0) {
                        foreach ($othermarkets as $markets) {
                            $other_market_win["total_" . $markets . "_win_back"] =  $other_market_win["total_" . $markets . "_win_back"]  + $current_bet_win_amount + $current_bet_margin_used;
                        }
                    }
                }
            } else {
                //other market id
                if ($current_bet_market_id == $market_1_id) {
                    $total_2_win_lay = $total_2_win_lay + $current_bet_win_amount + $current_bet_margin_used;
                    if (count($othermarkets) > 0) {
                        foreach ($othermarkets as $markets) {
                            $other_market_win["total_" . $markets . "_win_lay"] =  $other_market_win["total_" . $markets . "_win_lay"]  + $current_bet_win_amount + $current_bet_margin_used;
                        }
                    }
                } else if ($current_bet_market_id == $market_2_id) {
                    $total_1_win_lay = $total_1_win_lay + $current_bet_win_amount + $current_bet_margin_used;
                    if (count($othermarkets) > 0) {
                        foreach ($othermarkets as $markets) {
                            $other_market_win["total_" . $markets . "_win_lay"] =  $other_market_win["total_" . $markets . "_win_lay"]  + $current_bet_win_amount + $current_bet_margin_used;
                        }
                    }
                } else if (count($othermarkets) > 0) {
                    $total_1_win_lay = $total_1_win_lay + $current_bet_win_amount + $current_bet_margin_used;
                    $total_2_win_lay = $total_2_win_lay + $current_bet_win_amount + $current_bet_margin_used;
                    foreach ($othermarkets as $markets) {
                        if ($current_bet_market_id != $markets) {
                            $other_market_win["total_" . $markets . "_win_lay"] =  $other_market_win["total_" . $markets . "_win_lay"]  + $current_bet_win_amount + $current_bet_margin_used;
                        }
                    }
                } else {
                    $total_2_win_lay = $total_2_win_lay + $current_bet_win_amount + $current_bet_margin_used;
                    $total_1_win_lay = $total_1_win_lay + $current_bet_win_amount + $current_bet_margin_used;
                }
            }
        }

        $winning_amount_team_1 = ($total_1_win_back +  $total_1_win_lay) - $total_bet_amount;

        $winning_amount_team_2 = ($total_2_win_back + $total_2_win_lay) - $total_bet_amount;

        $win_team_1 = $winning_amount_team_1;

        $win_team_2 = $winning_amount_team_2;
        $net_exposure_array = array();
        if (count($othermarkets) > 0) {
            $net_exposure_array[] = $win_team_1;
            $net_exposure_array[] = $win_team_2;
            foreach ($othermarkets as $markets) {
                $win_team_3 =  ($other_market_win["total_" . $markets . "_win_back"] + $other_market_win["total_" . $markets . "_win_lay"]) - $total_bet_amount;
                $net_exposure_array[] = $win_team_3;
            }
        } else {

            $net_exposure_array[] = $win_team_1;
            $net_exposure_array[] = $win_team_2;
        }
    }

    if ($is_all_value == 0) {
        $net_exposure_array =  min($net_exposure_array);
    }

    return $net_exposure_array;
}
