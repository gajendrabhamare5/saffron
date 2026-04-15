<?php
include('../include/conn.php');
include('../include/flip_function.php');
include('../include/flip_function2.php');

include "../session.php";


$user_id = $_SESSION['CLIENT_LOGIN_ID'];

$markettype = $conn->real_escape_string($_REQUEST['markettype']);
$event_id = $conn->real_escape_string($_REQUEST['main_event_id']);

$exposure_array = array();

if ($markettype == "TESTTEENPATTI" or $markettype == "OPENTEENPATTI") {
	$get_total_exposure = $conn->query("select SUM(bet_win_amount) as total_exposure,market_id from bet_teen_details where user_id=$user_id and event_type='$markettype' and event_id='$event_id' and bet_status=1 GROUP BY market_id");

	while ($fetch_get_total_exposure = mysqli_fetch_assoc($get_total_exposure)) {

		$market_id = $fetch_get_total_exposure['market_id'];
		$total_exposure = $fetch_get_total_exposure['total_exposure'];



		$exposure_array[] = array(
			"market_id" => $market_id,
			"total_exposure" => $total_exposure,
		);
	}
} else if ($markettype == "CMETER1") {
	$get_total_exposure = $conn->query("select SUM(bet_win_amount) as total_exposure,market_id from bet_teen_details where user_id=$user_id and event_type='$markettype' and event_id='$event_id' and bet_status=1 GROUP BY market_id");

	while ($fetch_get_total_exposure = mysqli_fetch_assoc($get_total_exposure)) {

		$market_id = $fetch_get_total_exposure['market_id'];
		$total_exposure = $fetch_get_total_exposure['total_exposure'];
		$total_exposure = $total_exposure * (-1);


		$exposure_array[] = array(
			"market_id" => $market_id,
			"total_exposure" => $total_exposure,
		);
	}
} else if ($markettype == "32CARDS" or $markettype == "QUEEN" or $markettype == "RACE2") {

	$all_maket_exposure = get_net_exposure_casino_oods_on_page($conn, $user_id, $event_id, $markettype, $markettype);
	foreach ($all_maket_exposure as $exposure_data) {
		$market_id = $exposure_data['market_id'];
		$total_exposure = $exposure_data['win_loss'];
		$exposure_array[] = array(
			"market_id" => $market_id,
			"total_exposure" => $total_exposure,
		);
	}
} else if ($markettype == "POISON" || $markettype == "POISON20" || $markettype == "JOKER20" || $markettype == "JOKER1") {

	$all_maket_exposure = get_net_exposure_casino_oods_on_page_poison($conn, $user_id, $event_id, $markettype, $markettype);
	foreach ($all_maket_exposure as $exposure_data) {
		$market_id = $exposure_data['market_id'];
		$total_exposure = $exposure_data['win_loss'];
		$exposure_array[] = array(
			"market_id" => $market_id,
			"total_exposure" => $total_exposure,
		);
	}
} else if ($markettype == "TEEN41" || $markettype == "TEEN1" || $markettype == "TEEN3" || $markettype == "TEEN32" || $markettype == "TEEN33" || $markettype == "TEEN42" || $markettype == "ODITEENPATTI" || $markettype == "TEEN62" || $markettype == "TEEN6" || $markettype == "TRAP" || $markettype == "PATTI2" || $markettype == "TEENJOKER" || $markettype == "DOLIDANA" || $markettype == "MOGAMBO") {

	$all_maket_exposure = get_net_exposure_casino_oods_on_page($conn, $user_id, $event_id, $markettype, $markettype);
	foreach ($all_maket_exposure as $exposure_data) {
		$market_id = $exposure_data['market_id'];
		$total_exposure = $exposure_data['win_loss'];
		$exposure_array[] = array(
			"market_id" => $market_id,
			"total_exposure" => $total_exposure,
			"all_maket_exposure" => $all_maket_exposure,
		);
	}
	if ($markettype == "TEEN41" || $markettype == "TEEN42" || $markettype == "TEEN1" || $markettype == "ODITEENPATTI" || $markettype == "TEEN62" || $markettype == "TEEN6" || $markettype == "PATTI2" || $markettype == "TEEN3" || $markettype == "DOLIDANA") {

		/* $get_total_exposure = $conn->query("select SUM(
				CASE 
					WHEN bet_type IN ('No', 'Lay') 
					THEN ((bet_margin_used + bet_win_amount) - bet_win_amount) 
					ELSE -((bet_margin_used + bet_win_amount) - bet_margin_used) 
				END
			) AS total_exposure,market_id from bet_teen_details where user_id=$user_id and event_type='$markettype' and event_id='$event_id' and bet_status=1 and market_id != 1 && market_id != 2 GROUP BY market_id"); */

		$get_total_exposure = $conn->query("select SUM(bet_margin_used) as total_exposure,market_id from bet_teen_details where user_id=$user_id and event_type='$markettype' and event_id='$event_id' and bet_status=1 and market_id != 1 && market_id != 2 GROUP BY market_id");

		while ($fetch_get_total_exposure = mysqli_fetch_assoc($get_total_exposure)) {

			$market_id = $fetch_get_total_exposure['market_id'];
			$total_exposure = $fetch_get_total_exposure['total_exposure'];
			$total_exposure = $total_exposure * (-1);


			$exposure_array[$market_id] = array(
				"market_id" => $market_id,
				"total_exposure" => $total_exposure,
				"total_exposure3" => $total_exposure,
			);
		}
	} else if ($markettype == "TRAP" || $markettype == "MOGAMBO") {

		$get_total_exposure = $conn->query("select CASE 
        WHEN COUNT(*) = 1 AND MAX(bet_type) = 'Lay' THEN 
            MAX(bet_margin_used)
        
        WHEN COUNT(*) = 1 AND MAX(bet_type) = 'Back' THEN 
            MAX(bet_stack)
        
        ELSE 
            GREATEST(
                ABS(SUM(CASE 
                    WHEN bet_type = 'Back' THEN bet_win_amount
                    WHEN bet_type IN ('No', 'Lay') THEN -1 * bet_margin_used
                    ELSE 0
                END)),
                ABS(SUM(CASE 
                    WHEN bet_type = 'Back' THEN -1 * bet_stack
                    WHEN bet_type IN ('No', 'Lay') THEN bet_stack
                    ELSE 0
                END))
            )
    	END AS total_exposure,market_id from bet_teen_details where user_id=$user_id and event_type='$markettype' and event_id='$event_id' and bet_status=1 and market_id != 1 && market_id != 2 GROUP BY market_id");

			

			while ($fetch_get_total_exposure = mysqli_fetch_assoc($get_total_exposure)) {
	
				$market_id = $fetch_get_total_exposure['market_id'];
				$total_exposure = $fetch_get_total_exposure['total_exposure'];
				$total_exposure = $total_exposure * (-1);
	
	
				$exposure_array[$market_id] = array(
					"market_id" => $market_id,
					"total_exposure" => $total_exposure,
					"total_exposure3" => $total_exposure,
				);
			}
		
	} 
} else if ($markettype == "RACE17" || $markettype == "NOTENUM" || $markettype == "TEENSIN" || $markettype == "TRIO" || $markettype == "TEEN20C" || $markettype == "TEEN20B" || $markettype == "2020TEENPATTI") {

	

		$get_total_exposure = $conn->query("select CASE 
        WHEN COUNT(*) = 1 AND MAX(bet_type) = 'Lay' THEN 
            MAX(bet_margin_used)
        
        WHEN COUNT(*) = 1 AND MAX(bet_type) = 'Back' THEN 
            MAX(bet_stack)
        
        ELSE 
            GREATEST(
                ABS(SUM(CASE 
                    WHEN bet_type = 'Back' THEN bet_win_amount
                    WHEN bet_type IN ('No', 'Lay') THEN -1 * bet_margin_used
                    ELSE 0
                END)),
                ABS(SUM(CASE 
                    WHEN bet_type = 'Back' THEN -1 * bet_stack
                    WHEN bet_type IN ('No', 'Lay') THEN bet_stack
                    ELSE 0
                END))
            )
    END AS total_exposure,market_id from bet_teen_details where user_id=$user_id and event_type='$markettype' and event_id='$event_id' and bet_status=1 GROUP BY market_id");

			

			while ($fetch_get_total_exposure = mysqli_fetch_assoc($get_total_exposure)) {
	
				$market_id = $fetch_get_total_exposure['market_id'];
				$total_exposure = $fetch_get_total_exposure['total_exposure'];
				$total_exposure = $total_exposure * (-1);
	
	
				$exposure_array[$market_id] = array(
					"market_id" => $market_id,
					"total_exposure" => $total_exposure,
					"total_exposure3" => $total_exposure,
				);
			}
		
	
} else if ($markettype == "DUM10") {

	$all_maket_exposure = get_net_exposure_casino_oods_on_page($conn, $user_id, $event_id, $markettype, $markettype);
	foreach ($all_maket_exposure as $exposure_data) {
		$market_id = $exposure_data['market_id'];
		$total_exposure = $exposure_data['win_loss'];
		
		$exposure_array[] = array(
			"market_id" => $market_id,
			"total_exposure" => $total_exposure,
			"all_maket_exposure" => $all_maket_exposure,
			
		);
	}


	/* $get_total_exposure = $conn->query("select SUM(
				CASE 
					WHEN bet_type IN ('No', 'Lay') 
					THEN ((bet_margin_used + bet_win_amount) - bet_win_amount) 
					ELSE -((bet_margin_used + bet_win_amount) - bet_margin_used) 
				END
			) AS total_exposure,market_id from bet_teen_details where user_id=$user_id and event_type='$markettype' and event_id='$event_id' and bet_status=1 and market_id != 1 && market_id != 2 GROUP BY market_id"); */

	$get_total_exposure = $conn->query("select SUM(bet_margin_used) as total_exposure,market_id from bet_teen_details where user_id=$user_id and event_type='$markettype' and event_id='$event_id' and bet_status=1 and market_id != 1 GROUP BY market_id");

	while ($fetch_get_total_exposure = mysqli_fetch_assoc($get_total_exposure)) {

		$market_id = $fetch_get_total_exposure['market_id'];
		$total_exposure = $fetch_get_total_exposure['total_exposure'];
		$total_exposure = $total_exposure * (-1);


		$exposure_array[$market_id] = array(
			"market_id" => $market_id,
			"total_exposure" => $total_exposure,
			"total_exposure3" => $total_exposure,
		);
	}
} else if ($markettype == "GOAL" || $markettype == "LUCKY15") {

	$all_maket_exposure = get_net_exposure_casino_oods_on_page_other($conn, $user_id, $event_id, $markettype, '');
	foreach ($all_maket_exposure as $exposure_data) {
		$market_id = $exposure_data['market_id'];
		$total_exposure = $exposure_data['win_loss'];
		$exposure_array[] = array(
			"market_id" => $market_id,
			"total_exposure" => $total_exposure,
		);
	}
} else if ($markettype == "SUPER_OVER"   or $markettype == "FIVE_5_CRICKET" or $markettype == "SUPER_OVER2" or $markettype == "SUPER_OVER3") {

	$all_maket_exposure = get_net_exposure_casino_oods_on_page($conn, $user_id, $event_id, $markettype, $markettype);
	foreach ($all_maket_exposure as $exposure_data) {
		$market_id = $exposure_data['market_id'];
		$total_exposure = $exposure_data['win_loss'];

		$exposure_array[] = array(
			"market_id" => $market_id,
			"total_exposure" => $total_exposure,
		);
	}



	$get_fancy_data_exposure = $conn->query("select * from exposure_details where user_id=$user_id and event_id=$event_id and market_id>2");
	while ($fetch_get_fancy_data_exposure = mysqli_fetch_assoc($get_fancy_data_exposure)) {
		$market_id = $fetch_get_fancy_data_exposure['market_id'];
		$total_exposure = $fetch_get_fancy_data_exposure['exposure_amount'];
		$exposure_array[] = array(
			"market_id" => $market_id,
			"total_exposure" => $total_exposure,
		);
	}
} else if ($markettype == "ODI_DRAGON_TIGER") {

	$all_maket_exposure = get_net_exposure_casino_oods_on_page($conn, $user_id, $event_id, $markettype, $markettype);
	foreach ($all_maket_exposure as $exposure_data) {
		$market_id = $exposure_data['market_id'];
		$total_exposure = $exposure_data['win_loss'];
		$exposure_array[] = array(
			"market_id" => $market_id,
			"total_exposure" => $total_exposure,
		);
	}

	$get_total_exposure = $conn->query("select SUM(bet_margin_used) as total_exposure,market_id from bet_teen_details where user_id=$user_id and event_type='$markettype' and event_id='$event_id' and market_id>2 and bet_status=1 GROUP BY market_id");

	while ($fetch_get_total_exposure = mysqli_fetch_assoc($get_total_exposure)) {

		$market_id = $fetch_get_total_exposure['market_id'];
		$total_exposure = $fetch_get_total_exposure['total_exposure'];


		$total_exposure = $total_exposure * (-1);


		$exposure_array[] = array(
			"market_id" => $market_id,
			"total_exposure" => $total_exposure,
		);
	}
} else if ($markettype == "AMAR_AKBAR_ANTHONY" || $markettype == "AMAR_AKBAR_ANTHONY2") {

	$all_maket_exposure = get_net_exposure_casino_oods_on_page_other($conn, $user_id, $event_id, $markettype, $markettype);
	foreach ($all_maket_exposure as $exposure_data) {
		$market_id = $exposure_data['market_id'];
		$total_exposure = $exposure_data['win_loss'];
		$exposure_array[] = array(
			"market_id" => $market_id,
			"total_exposure" => $total_exposure,
		);
	}

	$get_total_exposure = $conn->query("select SUM(bet_margin_used) as total_exposure,market_id from bet_teen_details where user_id=$user_id and event_type='$markettype' and event_id='$event_id' and market_id>3 and bet_status=1 GROUP BY market_id");

	while ($fetch_get_total_exposure = mysqli_fetch_assoc($get_total_exposure)) {

		$market_id = $fetch_get_total_exposure['market_id'];
		$total_exposure = $fetch_get_total_exposure['total_exposure'];


		$total_exposure = $total_exposure * (-1);


		$exposure_array[] = array(
			"market_id" => $market_id,
			"total_exposure" => $total_exposure,
		);
	}
} else if ($markettype == "ODI_POKER") {

	$all_maket_exposure = get_net_exposure_casino_oods_on_page($conn, $user_id, $event_id, $markettype, $markettype);
	foreach ($all_maket_exposure as $exposure_data) {
		$market_id = $exposure_data['market_id'];
		$total_exposure = $exposure_data['win_loss'];
		$exposure_array[] = array(
			"market_id" => $market_id,
			"total_exposure" => $total_exposure,
		);
	}

	$get_total_exposure = $conn->query("select SUM(bet_margin_used) as total_exposure,market_id from bet_teen_details where user_id=$user_id and event_type='$markettype' and event_id='$event_id' and market_id>2 and bet_status=1 GROUP BY market_id");

	while ($fetch_get_total_exposure = mysqli_fetch_assoc($get_total_exposure)) {

		$market_id = $fetch_get_total_exposure['market_id'];
		$total_exposure = $fetch_get_total_exposure['total_exposure'];


		$total_exposure = $total_exposure * (-1);


		$exposure_array[] = array(
			"market_id" => $market_id,
			"total_exposure" => $total_exposure,
		);
	}
} else if ($markettype == "2020_CRICKET_MATCH") {

	$all_maket_exposure = get_net_exposure_casino_oods_on_page($conn, $user_id, $event_id, $markettype, $markettype);
	foreach ($all_maket_exposure as $exposure_data) {
		$market_id = $exposure_data['market_id'];
		$total_exposure = $exposure_data['win_loss'];
		$exposure_array[] = array(
			"market_id" => $market_id,
			"total_exposure" => $total_exposure,
		);
	}
} else if ($markettype == "32CARDSB") {

	$all_maket_exposure = get_net_exposure_casino_oods_on_page($conn, $user_id, $event_id, $markettype, $markettype);
	foreach ($all_maket_exposure as $exposure_data) {
		$market_id = $exposure_data['market_id'];
		$total_exposure = $exposure_data['win_loss'];
		$exposure_array[] = array(
			"market_id" => $market_id,
			"total_exposure" => $total_exposure,
		);
	}

	$only_back_id = array();
	$only_back_id[] = 5;
	$only_back_id[] = 6;
	$only_back_id[] = 7;
	$only_back_id[] = 8;
	$only_back_id[] = 9;
	$only_back_id[] = 10;
	$only_back_id[] = 11;
	$only_back_id[] = 12;
	$only_back_id[] = 15;
	$only_back_id[] = 16;
	$only_back_id[] = 17;
	$only_back_id[] = 18;
	$only_back_id[] = 19;
	$only_back_id[] = 20;
	$only_back_id[] = 21;
	$only_back_id[] = 22;
	$only_back_id[] = 23;
	$only_back_id[] = 24;
	$only_back_id[] = 25;
	$only_back_id[] = 26;

	$only_back_id = implode(",", $only_back_id);

	$get_total_exposure = $conn->query("select SUM(bet_margin_used) as total_exposure,market_id from bet_teen_details where user_id=$user_id and event_type='$markettype' and event_id='$event_id' and market_id IN ($only_back_id) and bet_status=1 GROUP BY market_id");

	while ($fetch_get_total_exposure = mysqli_fetch_assoc($get_total_exposure)) {

		$market_id = $fetch_get_total_exposure['market_id'];
		$total_exposure = $fetch_get_total_exposure['total_exposure'];


		$total_exposure = $total_exposure * (-1);


		$exposure_array[] = array(
			"market_id" => $market_id,
			"total_exposure" => $total_exposure,
		);
	}


	$odd_market_expo = array();
	$all_maket_exposure = get_net_exposure_casino_oods_on_page($conn, $user_id, $event_id, $markettype, "BLACK_3");
	foreach ($all_maket_exposure as $exposure_data) {
		$market_id = $exposure_data['market_id'];
		$total_exposure = $exposure_data['win_loss'];
		$odd_market_expo[] = $total_exposure;
	}


	$exposure_array[] = array(
		"market_id" => 13,
		"total_exposure" => min($odd_market_expo),
	);

	$odd_market_expo = array();
	$all_maket_exposure = get_net_exposure_casino_oods_on_page($conn, $user_id, $event_id, $markettype, "RED_3");
	foreach ($all_maket_exposure as $exposure_data) {
		$market_id = $exposure_data['market_id'];
		$total_exposure = $exposure_data['win_loss'];
		$odd_market_expo[] = $total_exposure;
	}


	$exposure_array[] = array(
		"market_id" => 14,
		"total_exposure" => min($odd_market_expo),
	);

	$odd_market_expo = array();
	$all_maket_exposure = get_net_exposure_casino_oods_on_page($conn, $user_id, $event_id, $markettype, "BLACK_RED_2_3");
	foreach ($all_maket_exposure as $exposure_data) {
		$market_id = $exposure_data['market_id'];
		$total_exposure = $exposure_data['win_loss'];
		$odd_market_expo[] = $total_exposure;
	}


	$exposure_array[] = array(
		"market_id" => 27,
		"total_exposure" => min($odd_market_expo),
	);
} else if ($markettype == "B_TABLE" || $markettype == "B_TABLE2") {

	$all_maket_exposure = get_net_exposure_casino_oods_on_page($conn, $user_id, $event_id, $markettype, $markettype);
	foreach ($all_maket_exposure as $exposure_data) {
		$market_id = $exposure_data['market_id'];
		$total_exposure = $exposure_data['win_loss'];
		$exposure_array[] = array(
			"market_id" => $market_id,
			"total_exposure" => $total_exposure,
		);
	}

	$odd_market_expo = array();
	$all_maket_exposure = get_net_exposure_casino_oods_on_page($conn, $user_id, $event_id, $markettype, "ODD");
	foreach ($all_maket_exposure as $exposure_data) {
		$market_id = $exposure_data['market_id'];
		$total_exposure = $exposure_data['win_loss'];
		$odd_market_expo[] = $total_exposure;
	}


	$exposure_array[] = array(
		"market_id" => 7,
		"total_exposure" => min($odd_market_expo),
	);

	$get_total_exposure = $conn->query("select SUM(bet_margin_used) as total_exposure,market_id from bet_teen_details where user_id=$user_id and event_type='$markettype' and event_id='$event_id' and market_id>7 and bet_status=1 GROUP BY market_id");

	while ($fetch_get_total_exposure = mysqli_fetch_assoc($get_total_exposure)) {

		$market_id = $fetch_get_total_exposure['market_id'];
		$total_exposure = $fetch_get_total_exposure['total_exposure'];


		$total_exposure = $total_exposure * (-1);


		$exposure_array[] = array(
			"market_id" => $market_id,
			"total_exposure" => $total_exposure,
		);
	}
} else if ($markettype == "RACE_20") {

	$all_maket_exposure = get_net_exposure_casino_oods_on_page($conn, $user_id, $event_id, $markettype, $markettype);
	foreach ($all_maket_exposure as $exposure_data) {
		$market_id = $exposure_data['market_id'];
		$total_exposure = $exposure_data['win_loss'];
		$exposure_array[] = array(
			"market_id" => $market_id,
			"total_exposure" => $total_exposure,
		);
	}

	$get_total_exposure = $conn->query("select SUM(bet_margin_used) as total_exposure,market_id from bet_teen_details where user_id=$user_id and event_type='$markettype' and event_id='$event_id' and market_id>=5 and bet_status=1 GROUP BY market_id");

	while ($fetch_get_total_exposure = mysqli_fetch_assoc($get_total_exposure)) {

		$market_id = $fetch_get_total_exposure['market_id'];
		$total_exposure = $fetch_get_total_exposure['total_exposure'];


		$total_exposure = $total_exposure * (-1);


		$exposure_array[] = array(
			"market_id" => $market_id,
			"total_exposure" => $total_exposure,
		);
	}
} else {
	$get_total_exposure = $conn->query("select SUM(bet_margin_used) as total_exposure,market_id from bet_teen_details where user_id=$user_id and event_type='$markettype' and event_id='$event_id' and bet_status=1 GROUP BY market_id");

	while ($fetch_get_total_exposure = mysqli_fetch_assoc($get_total_exposure)) {

		$market_id = $fetch_get_total_exposure['market_id'];
		$total_exposure = $fetch_get_total_exposure['total_exposure'];


		$total_exposure = $total_exposure * (-1);


		$exposure_array[] = array(
			"market_id" => $market_id,
			"total_exposure" => $total_exposure,
		);
	}
}




$d = array(
	"status" => "ok",
	"data" => $exposure_array,
);
echo json_encode($d);
