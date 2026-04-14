<?php
include('../include/conn.php');
include "../session.php";
$user_id = $_SESSION['CLIENT_LOGIN_ID'];
$event_id = $conn->real_escape_string($_REQUEST['event_id']);
$casino_type = $conn->real_escape_string($_REQUEST['casino_type']);
$cards_result = new stdClass();
	$cards_result->{'ADD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'A',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards_result->{'AHH'} = array(
		'type'		=>	'heart',
		'name'		=>	'A',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards_result->{'ASS'} = array(
		'type'		=>	'spade',
		'name'		=>	'A',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards_result->{'ACC'} = array(
		'type'		=>	'club',
		'name'		=>	'A',
		'rank'		=>	1,
		'priority'	=>	14
	);
	
	$cards_result->{'add'} = array(
		'type'		=>	'diamond',
		'name'		=>	'A',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards_result->{'ahh'} = array(
		'type'		=>	'heart',
		'name'		=>	'A',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards_result->{'ass'} = array(
		'type'		=>	'spade',
		'name'		=>	'A',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards_result->{'acc'} = array(
		'type'		=>	'club',
		'name'		=>	'A',
		'rank'		=>	1,
		'priority'	=>	14
	);
	
	$cards_result->{'2DD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'2',
		'rank'		=>	2,
		'priority'	=>	2
	);
	$cards_result->{'2HH'} = array(
		'type'		=>	'heart',
		'name'		=>	'2',
		'rank'		=>	2,
		'priority'	=>	2
	);
	$cards_result->{'2SS'} = array(
		'type'		=>	'spade',
		'name'		=>	'2',
		'rank'		=>	2,
		'priority'	=>	2
	);
	$cards_result->{'2CC'} = array(
		'type'		=>	'club',
		'name'		=>	'2',
		'rank'		=>	2,
		'priority'	=>	2
	);
	
	$cards_result->{'3DD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'3',
		'rank'		=>	3,
		'priority'	=>	3
	);
	$cards_result->{'3HH'} = array(
		'type'		=>	'heart',
		'name'		=>	'3',
		'rank'		=>	3,
		'priority'	=>	3
	);
	$cards_result->{'3SS'} = array(
		'type'		=>	'spade',
		'name'		=>	'3',
		'rank'		=>	3,
		'priority'	=>	3
	);
	$cards_result->{'3CC'} = array(
		'type'		=>	'club',
		'name'		=>	'3',
		'rank'		=>	3,
		'priority'	=>	3
	);
	
	$cards_result->{'4DD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'4',
		'rank'		=>	4,
		'priority'	=>	4
	);
	$cards_result->{'4HH'} = array(
		'type'		=>	'heart',
		'name'		=>	'4',
		'rank'		=>	4,
		'priority'	=>	4
	);
	$cards_result->{'4SS'} = array(
		'type'		=>	'spade',
		'name'		=>	'4',
		'rank'		=>	4,
		'priority'	=>	4
	);
	$cards_result->{'4CC'} = array(
		'type'		=>	'club',
		'name'		=>	'4',
		'rank'		=>	4,
		'priority'	=>	4
	);
	
	$cards_result->{'5SS'} = array(
		'type'		=>	'diamond',
		'name'		=>	'5',
		'rank'		=>	5,
		'priority'	=>	5
	);
	$cards_result->{'5HH'} = array(
		'type'		=>	'heart',
		'name'		=>	'5',
		'rank'		=>	5,
		'priority'	=>	5
	);
	$cards_result->{'5SS'} = array(
		'type'		=>	'spade',
		'name'		=>	'5',
		'rank'		=>	5,
		'priority'	=>	5
	);
	$cards_result->{'5CC'} = array(
		'type'		=>	'club',
		'name'		=>	'5',
		'rank'		=>	5,
		'priority'	=>	5
	);
	
	$cards_result->{'6DD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'6',
		'rank'		=>	6,
		'priority'	=>	6
	);
	$cards_result->{'6HH'} = array(
		'type'		=>	'heart',
		'name'		=>	'6',
		'rank'		=>	6,
		'priority'	=>	6
	);
	$cards_result->{'6SS'} = array(
		'type'		=>	'spade',
		'name'		=>	'6',
		'rank'		=>	6,
		'priority'	=>	6
	);
	$cards_result->{'6CC'} = array(
		'type'		=>	'club',
		'name'		=>	'6',
		'rank'		=>	6,
		'priority'	=>	6
	);
	
	$cards_result->{'7DD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'7',
		'rank'		=>	7,
		'priority'	=>	7
	);
	$cards_result->{'7HH'} = array(
		'type'		=>	'heart',
		'name'		=>	'7',
		'rank'		=>	7,
		'priority'	=>	7
	);
	$cards_result->{'7SS'} = array(
		'type'		=>	'spade',
		'name'		=>	'7',
		'rank'		=>	7,
		'priority'	=>	7
	);
	$cards_result->{'7CC'} = array(
		'type'		=>	'club',
		'name'		=>	'7',
		'rank'		=>	7,
		'priority'	=>	7
	);
	
	$cards_result->{'8DD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'8',
		'rank'		=>	8,
		'priority'	=>	8
	);
	$cards_result->{'8HH'} = array(
		'type'		=>	'heart',
		'name'		=>	'8',
		'rank'		=>	8,
		'priority'	=>	8
	);
	$cards_result->{'8SS'} = array(
		'type'		=>	'spade',
		'name'		=>	'8',
		'rank'		=>	8,
		'priority'	=>	8
	);
	$cards_result->{'8CC'} = array(
		'type'		=>	'club',
		'name'		=>	'8',
		'rank'		=>	8,
		'priority'	=>	8
	);
	
	$cards_result->{'9DD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'9',
		'rank'		=>	9,
		'priority'	=>	9
	);
	$cards_result->{'9HH'} = array(
		'type'		=>	'heart',
		'name'		=>	'9',
		'rank'		=>	9,
		'priority'	=>	9
	);
	$cards_result->{'9SS'} = array(
		'type'		=>	'spade',
		'name'		=>	'9',
		'rank'		=>	9,
		'priority'	=>	9
	);
	$cards_result->{'9CC'} = array(
		'type'		=>	'club',
		'name'		=>	'9',
		'rank'		=>	9,
		'priority'	=>	9
	);
	
	$cards_result->{'10DD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'10',
		'rank'		=>	10,
		'priority'	=>	10
	);
	$cards_result->{'10HH'} = array(
		'type'		=>	'heart',
		'name'		=>	'10',
		'rank'		=>	10,
		'priority'	=>	10
	);
	$cards_result->{'10SS'} = array(
		'type'		=>	'spade',
		'name'		=>	'10',
		'rank'		=>	10,
		'priority'	=>	10
	);
	$cards_result->{'10CC'} = array(
		'type'		=>	'club',
		'name'		=>	'10',
		'rank'		=>	10,
		'priority'	=>	10
	);
	
	$cards_result->{'JDD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'J',
		'rank'		=>	11,
		'priority'	=>	11
	);
	$cards_result->{'JHH'} = array(
		'type'		=>	'heart',
		'name'		=>	'J',
		'rank'		=>	11,
		'priority'	=>	11
	);
	$cards_result->{'JSS'} = array(
		'type'		=>	'spade',
		'name'		=>	'J',
		'rank'		=>	11,
		'priority'	=>	11
	);
	$cards_result->{'JCC'} = array(
		'type'		=>	'club',
		'name'		=>	'J',
		'rank'		=>	11,
		'priority'	=>	11
	);
	
	$cards_result->{'QDD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'Q',
		'rank'		=>	12,
		'priority'	=>	12
	);
	$cards_result->{'QHH'} = array(
		'type'		=>	'heart',
		'name'		=>	'Q',
		'rank'		=>	12,
		'priority'	=>	12
	);
	$cards_result->{'QSS'} = array(
		'type'		=>	'spade',
		'name'		=>	'Q',
		'rank'		=>	12,
		'priority'	=>	12
	);
	$cards_result->{'QCC'} = array(
		'type'		=>	'club',
		'name'		=>	'Q',
		'rank'		=>	12,
		'priority'	=>	12
	);
	
	$cards_result->{'KDD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'K',
		'rank'		=>	13,
		'priority'	=>	13
	);
	$cards_result->{'KHH'} = array(
		'type'		=>	'heart',
		'name'		=>	'K',
		'rank'		=>	13,
		'priority'	=>	13
	);
	$cards_result->{'KSS'} = array(
		'type'		=>	'spade',
		'name'		=>	'K',
		'rank'		=>	13,
		'priority'	=>	13
	);
	$cards_result->{'KCC'} = array(
		'type'		=>	'club',
		'name'		=>	'K',
		'rank'		=>	13,
		'priority'	=>	13
	);
	$cards_result->{'add'} = array(
		'type'		=>	'diamond',
		'name'		=>	'a',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards_result->{'ahh'} = array(
		'type'		=>	'heart',
		'name'		=>	'a',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards_result->{'ass'} = array(
		'type'		=>	'spade',
		'name'		=>	'a',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards_result->{'acc'} = array(
		'type'		=>	'club',
		'name'		=>	'a',
		'rank'		=>	1,
		'priority'	=>	14
	);
	
	$cards_result->{'add'} = array(
		'type'		=>	'diamond',
		'name'		=>	'a',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards_result->{'ahh'} = array(
		'type'		=>	'heart',
		'name'		=>	'a',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards_result->{'ass'} = array(
		'type'		=>	'spade',
		'name'		=>	'a',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards_result->{'acc'} = array(
		'type'		=>	'club',
		'name'		=>	'a',
		'rank'		=>	1,
		'priority'	=>	14
	);
	
	$cards_result->{'2dd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'2',
		'rank'		=>	2,
		'priority'	=>	2
	);
	$cards_result->{'2hh'} = array(
		'type'		=>	'heart',
		'name'		=>	'2',
		'rank'		=>	2,
		'priority'	=>	2
	);
	$cards_result->{'2ss'} = array(
		'type'		=>	'spade',
		'name'		=>	'2',
		'rank'		=>	2,
		'priority'	=>	2
	);
	$cards_result->{'2cc'} = array(
		'type'		=>	'club',
		'name'		=>	'2',
		'rank'		=>	2,
		'priority'	=>	2
	);
	
	$cards_result->{'3dd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'3',
		'rank'		=>	3,
		'priority'	=>	3
	);
	$cards_result->{'3hh'} = array(
		'type'		=>	'heart',
		'name'		=>	'3',
		'rank'		=>	3,
		'priority'	=>	3
	);
	$cards_result->{'3ss'} = array(
		'type'		=>	'spade',
		'name'		=>	'3',
		'rank'		=>	3,
		'priority'	=>	3
	);
	$cards_result->{'3cc'} = array(
		'type'		=>	'club',
		'name'		=>	'3',
		'rank'		=>	3,
		'priority'	=>	3
	);
	
	$cards_result->{'4dd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'4',
		'rank'		=>	4,
		'priority'	=>	4
	);
	$cards_result->{'4hh'} = array(
		'type'		=>	'heart',
		'name'		=>	'4',
		'rank'		=>	4,
		'priority'	=>	4
	);
	$cards_result->{'4ss'} = array(
		'type'		=>	'spade',
		'name'		=>	'4',
		'rank'		=>	4,
		'priority'	=>	4
	);
	$cards_result->{'4cc'} = array(
		'type'		=>	'club',
		'name'		=>	'4',
		'rank'		=>	4,
		'priority'	=>	4
	);
	
	$cards_result->{'5dd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'5',
		'rank'		=>	5,
		'priority'	=>	5
	);
	$cards_result->{'5hh'} = array(
		'type'		=>	'heart',
		'name'		=>	'5',
		'rank'		=>	5,
		'priority'	=>	5
	);
	$cards_result->{'5ss'} = array(
		'type'		=>	'spade',
		'name'		=>	'5',
		'rank'		=>	5,
		'priority'	=>	5
	);
	$cards_result->{'5cc'} = array(
		'type'		=>	'club',
		'name'		=>	'5',
		'rank'		=>	5,
		'priority'	=>	5
	);
	
	$cards_result->{'6dd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'6',
		'rank'		=>	6,
		'priority'	=>	6
	);
	$cards_result->{'6hh'} = array(
		'type'		=>	'heart',
		'name'		=>	'6',
		'rank'		=>	6,
		'priority'	=>	6
	);
	$cards_result->{'6ss'} = array(
		'type'		=>	'spade',
		'name'		=>	'6',
		'rank'		=>	6,
		'priority'	=>	6
	);
	$cards_result->{'6cc'} = array(
		'type'		=>	'club',
		'name'		=>	'6',
		'rank'		=>	6,
		'priority'	=>	6
	);
	
	$cards_result->{'7dd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'7',
		'rank'		=>	7,
		'priority'	=>	7
	);
	$cards_result->{'7hh'} = array(
		'type'		=>	'heart',
		'name'		=>	'7',
		'rank'		=>	7,
		'priority'	=>	7
	);
	$cards_result->{'7ss'} = array(
		'type'		=>	'spade',
		'name'		=>	'7',
		'rank'		=>	7,
		'priority'	=>	7
	);
	$cards_result->{'7cc'} = array(
		'type'		=>	'club',
		'name'		=>	'7',
		'rank'		=>	7,
		'priority'	=>	7
	);
	
	$cards_result->{'8dd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'8',
		'rank'		=>	8,
		'priority'	=>	8
	);
	$cards_result->{'8hh'} = array(
		'type'		=>	'heart',
		'name'		=>	'8',
		'rank'		=>	8,
		'priority'	=>	8
	);
	$cards_result->{'8ss'} = array(
		'type'		=>	'spade',
		'name'		=>	'8',
		'rank'		=>	8,
		'priority'	=>	8
	);
	$cards_result->{'8cc'} = array(
		'type'		=>	'club',
		'name'		=>	'8',
		'rank'		=>	8,
		'priority'	=>	8
	);
	
	$cards_result->{'9dd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'9',
		'rank'		=>	9,
		'priority'	=>	9
	);
	$cards_result->{'9hh'} = array(
		'type'		=>	'heart',
		'name'		=>	'9',
		'rank'		=>	9,
		'priority'	=>	9
	);
	$cards_result->{'9ss'} = array(
		'type'		=>	'spade',
		'name'		=>	'9',
		'rank'		=>	9,
		'priority'	=>	9
	);
	$cards_result->{'9cc'} = array(
		'type'		=>	'club',
		'name'		=>	'9',
		'rank'		=>	9,
		'priority'	=>	9
	);
	
	$cards_result->{'10dd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'10',
		'rank'		=>	10,
		'priority'	=>	10
	);
	$cards_result->{'10hh'} = array(
		'type'		=>	'heart',
		'name'		=>	'10',
		'rank'		=>	10,
		'priority'	=>	10
	);
	$cards_result->{'10ss'} = array(
		'type'		=>	'spade',
		'name'		=>	'10',
		'rank'		=>	10,
		'priority'	=>	10
	);
	$cards_result->{'10cc'} = array(
		'type'		=>	'club',
		'name'		=>	'10',
		'rank'		=>	10,
		'priority'	=>	10
	);
	
	$cards_result->{'jdd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'j',
		'rank'		=>	11,
		'priority'	=>	11
	);
	$cards_result->{'jhh'} = array(
		'type'		=>	'heart',
		'name'		=>	'j',
		'rank'		=>	11,
		'priority'	=>	11
	);
	$cards_result->{'jss'} = array(
		'type'		=>	'spade',
		'name'		=>	'j',
		'rank'		=>	11,
		'priority'	=>	11
	);
	$cards_result->{'jcc'} = array(
		'type'		=>	'club',
		'name'		=>	'j',
		'rank'		=>	11,
		'priority'	=>	11
	);
	
	$cards_result->{'qdd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'q',
		'rank'		=>	12,
		'priority'	=>	12
	);
	$cards_result->{'qhh'} = array(
		'type'		=>	'heart',
		'name'		=>	'q',
		'rank'		=>	12,
		'priority'	=>	12
	);
	$cards_result->{'qss'} = array(
		'type'		=>	'spade',
		'name'		=>	'q',
		'rank'		=>	12,
		'priority'	=>	12
	);
	$cards_result->{'qcc'} = array(
		'type'		=>	'club',
		'name'		=>	'q',
		'rank'		=>	12,
		'priority'	=>	12
	);
	
	$cards_result->{'kdd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'k',
		'rank'		=>	13,
		'priority'	=>	13
	);
	$cards_result->{'khh'} = array(
		'type'		=>	'heart',
		'name'		=>	'k',
		'rank'		=>	13,
		'priority'	=>	13
	);
	$cards_result->{'kss'} = array(
		'type'		=>	'spade',
		'name'		=>	'k',
		'rank'		=>	13,
		'priority'	=>	13
	);
	$cards_result->{'kcc'} = array(
		'type'		=>	'club',
		'name'		=>	'k',
		'rank'		=>	13,
		'priority'	=>	13
	);
	
	
	function is_even($card11,$cards_result){
		$card1 = $cards_result->$card11;
		$rank = $card1['rank']; 
		if($rank % 2 == 0){
			return true;
		}else{
			return false;
		}
	}

	function is_red($card11,$cards_result){
		$card1 = $cards_result->$card11;
		$type = $card1['type']; 
		if($type == "diamond" or $type == "heart"){
			return true;
		}else{
			return false;
		}
	}
	
	function is_pair_dt20($dragon_cards,$tiger_cards,$cards_result){
			$dragon_cards = $cards_result->$dragon_cards;
			$dragon_cards_rank = $dragon_cards['rank']; 
			
			$tiger_cards = $cards_result->$tiger_cards;
			$tiger_cards_rank = $tiger_cards['rank']; 
			
			if($tiger_cards_rank == $dragon_cards_rank){
				return true;
			}else{
				return false;
			}
			
		}
	
	function rank_number($card11,$cards_result){
		$card1 = $cards_result->$card11;
		$rank = $card1['rank'];
		return $rank;
		
	}
	
	function is_dulhan($card11,$cards_result){
		$card1 = $cards_result->$card11;
		$rank = $card1['rank'];
		
		if($rank == 12 or $rank == 13 ){
			return true;
		}else{
			return false;
		}
		
	}
	
	
	if($casino_type == "teen20" or $casino_type == "teen"){
		
		$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id=$event_id");
		$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
		$cards = $fetch_get_casino_result['cards'];
		$result_status = $fetch_get_casino_result['result_status'];
		$cards = json_decode($cards);
	
		$carda1  = WEB_URL."/storage/front/img/cards/".$cards[0].".png";
		$carda2  = WEB_URL."/storage/front/img/cards/".$cards[2].".png";
		$carda3  = WEB_URL."/storage/front/img/cards/".$cards[4].".png";
		
		$cardb1  = WEB_URL."/storage/front/img/cards/".$cards[1].".png";
		$cardb2  = WEB_URL."/storage/front/img/cards/".$cards[3].".png";
		$cardb3  = WEB_URL."/storage/front/img/cards/".$cards[5].".png";
?>

							<div class="row row5 oepn-teen-result">
								<div class="col-3 winner-title">
									<h4>Player A</h4></div>
								<div class="col-7">
									<div class="result-image"><img src="<?php echo $carda1; ?>"> <img src="<?php echo $carda2; ?>"> <img src="<?php echo $carda3; ?>"></div>
								</div>
								<div class="col-2 winner-box">
								 <?php
										if($result_status == "A"){
									?>
										<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
									<?php								
										}
									?>
									
									
								</div>
							</div>


							<div class="row row5 oepn-teen-result">
								<div class="col-3 winner-title">
									<h4>Player B</h4></div>
								<div class="col-7">
									<div class="result-image"><img src="<?php echo $cardb1; ?>"> <img src="<?php echo $cardb2; ?>"> <img src="<?php echo $cardb3; ?>"></div>
								</div>
								<div class="col-2 winner-box">
								 <?php
										if($result_status == "B"){
									?>
										<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
									<?php								
										}
									?>
									
									
								</div>
							</div>
						
<?php
	}
	else if($casino_type == "meter"){
		$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id=$event_id");
		$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
		$cards = $fetch_get_casino_result['cards'];
		$cards = json_decode($cards);
		$low_cards = array();
		$high_cards = array();
		$result_cards = array();
		$i = 0;
		while($cards[$i]){
			if($cards[$i] == '10HH' || $cards[$i] == '10hh'){
				$result_cards[] = $cards[$i];
			}
			else{
				$a = $cards[$i];
				$card_1 = $cards_result->$a;
				$card_1_rank = $card_1['rank']; 
				
				if($card_1_rank < 10){
					$low_cards[] = $cards[$i];
				}
				else{
					$high_cards[] = $cards[$i];
				}
			}
			$i++;
		}
		?>
		<div data-v-4c3807ce="" class="row row5 align-items-center cmeter">
			<div data-v-4c3807ce="" class="col-10">
				<div data-v-4c3807ce="" class="row align-items-center">
					<div data-v-4c3807ce="" class="col-2">
						<h6 data-v-4c3807ce="">Low Cards</h6>
					</div>
					<div data-v-4c3807ce="" class="col-10">
						<div data-v-4c3807ce="" class="result-image">
							<?php
								$j = 0;
								while($low_cards[$j]){
									$carda1  = WEB_URL."/storage/front/img/cards/".$low_cards[$j].".png";
									?>
										<img src="<?php echo $carda1; ?>" class="mr-2">
									<?php
									$j++;
								}
							?>
						</div>
					</div>
				</div>
				<div data-v-4c3807ce="" class="row mt-3 align-items-center">
					<div data-v-4c3807ce="" class="col-2">
						<h6 data-v-4c3807ce="">High Cards</h6>
					</div>
					<div data-v-4c3807ce="" class="col-10">
						<div data-v-4c3807ce="" class="result-image">
							<?php
								$j = 0;
								while($high_cards[$j]){
									$carda1  = WEB_URL."/storage/front/img/cards/".$high_cards[$j].".png";
									?>
										<img src="<?php echo $carda1; ?>" class="mr-2">
									<?php
									$j++;
								}
							?>
						</div>
					</div>
				</div>
			</div>
			<div data-v-4c3807ce="" class="col-2 align-items-center text-right">
				<div data-v-4c3807ce="" class="result-image">
					<?php
						$j = 0;
						while($result_cards[$j]){
							$carda1  = WEB_URL."/storage/front/img/cards/".$result_cards[$j].".png";
							?>
								<img src="<?php echo $carda1; ?>" class="mr-2">
							<?php
							$j++;
						}
					?>
				</div>
			</div>
		</div>
		<?php
	}
	else if($casino_type == "teen9"){
		
		
		$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id=$event_id");
		$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
		$cards = $fetch_get_casino_result['cards'];
		$result_status = $fetch_get_casino_result['result_status'];
		$cards = json_decode($cards);
	
	
		$carda1  = WEB_URL."/storage/front/img/cards/".$cards[0].".png";
		$carda2  = WEB_URL."/storage/front/img/cards/".$cards[3].".png";
		$carda3  = WEB_URL."/storage/front/img/cards/".$cards[6].".png";
		
		$cardb1  = WEB_URL."/storage/front/img/cards/".$cards[1].".png";
		$cardb2  = WEB_URL."/storage/front/img/cards/".$cards[4].".png";
		$cardb3  = WEB_URL."/storage/front/img/cards/".$cards[7].".png";
		
		$cardc1  = WEB_URL."/storage/front/img/cards/".$cards[2].".png";
		$cardc2  = WEB_URL."/storage/front/img/cards/".$cards[5].".png";
		$cardc3  = WEB_URL."/storage/front/img/cards/".$cards[8].".png";
	
		
?>
	<div class="row row5 oepn-teen-result">
								<div class="col-3 winner-title">
									<h4>Tiger</h4></div>
								<div class="col-7">
									<div class="result-image"><img src="<?php echo $carda1; ?>"> <img src="<?php echo $carda2; ?>"> <img src="<?php echo $carda3; ?>"></div>
								</div>
								<div class="col-2 winner-box">
								 <?php
										if($result_status == "T"){
									?>
										<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
									<?php								
										}
									?>
									
									
								</div>
							</div>
                           
						   <div class="row row5 oepn-teen-result">
								<div class="col-3 winner-title">
									<h4>Lion</h4></div>
								<div class="col-7">
									<div class="result-image"><img src="<?php echo $cardb1; ?>"> <img src="<?php echo $cardb2; ?>"> <img src="<?php echo $cardb3; ?>"></div>
								</div>
								<div class="col-2 winner-box">
								 <?php
										if($result_status == "L"){
									?>
										<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
									<?php								
										}
									?>
									
									
								</div>
							</div>
						   
							<div class="row row5 oepn-teen-result">
								<div class="col-3 winner-title">
									<h4>Dragon</h4></div>
								<div class="col-7">
									<div class="result-image"><img src="<?php echo $cardc1; ?>"> <img src="<?php echo $cardc2; ?>"> <img src="<?php echo $cardc3; ?>"></div>
								</div>
								<div class="col-2 winner-box">
								 <?php
										if($result_status == "D"){
									?>
										<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
									<?php								
										}
									?>
									
									
								</div>
							</div>
<?php
	
	}else if($casino_type == "war"){
		
		$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id=$event_id");
		$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
		$cards = $fetch_get_casino_result['cards'];
		$result_status = $fetch_get_casino_result['result_status'];
		$cards = json_decode($cards);
	
		$card1  = WEB_URL."/storage/front/img/cards/".$cards[0].".png";
		$card2  = WEB_URL."/storage/front/img/cards/".$cards[1].".png";
		$card3  = WEB_URL."/storage/front/img/cards/".$cards[2].".png";
		
		$card4  = WEB_URL."/storage/front/img/cards/".$cards[3].".png";
		$card5  = WEB_URL."/storage/front/img/cards/".$cards[4].".png";
		$card6  = WEB_URL."/storage/front/img/cards/".$cards[5].".png";
		
		$card_delear  = WEB_URL."/storage/front/img/cards/".$cards[6].".png";
		
		
		$result_status = explode(",",$result_status);
		
		
	?>
		<div class="row row5 oepn-teen-result">
			<div class="col-3 winner-title"><h4>Dealer</h4></div>
			<div class="col-7">
				<div class="result-image"><img src="<?php echo $card_delear; ?>" /></div>
			</div>
		</div>
		<div class="row row5 oepn-teen-result">
			<div class="col-3 winner-title"><h4>Player 1</h4></div>
			<div class="col-7">
				<div class="result-image"><img src="<?php echo $card1; ?>" /></div>
			</div>
			<div class="col-2 winner-box">
			<?php
				if(in_array(1,$result_status)){
			?>
			
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			
			<?php
				}
			?>
			</div>
		</div>
		<div class="row row5 oepn-teen-result">
			<div class="col-3 winner-title"><h4>Player 2</h4></div>
			<div class="col-7">
				<div class="result-image"><img src="<?php echo $card2; ?>" /></div>
			</div>
			<div class="col-2 winner-box">
			
			<?php
				if(in_array(11,$result_status)){
			?>
			
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			
			<?php
				}
			?>
			</div>
		</div>
		<div class="row row5 oepn-teen-result">
			<div class="col-3 winner-title"><h4>Player 3</h4></div>
			<div class="col-7">
				<div class="result-image"><img src="<?php echo $card3; ?>" /></div>
			</div>
			<div class="col-2 winner-box">
				<?php
				if(in_array(21,$result_status)){
			?>
			
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			
			<?php
				}
			?>
			</div>
		</div>
		<div class="row row5 oepn-teen-result">
			<div class="col-3 winner-title"><h4>Player 4</h4></div>
			<div class="col-7">
				<div class="result-image"><img src="<?php echo $card4; ?>" /></div>
			</div>
			<div class="col-2 winner-box">
				<?php
				if(in_array(31,$result_status)){
			?>
			
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			
			<?php
				}
			?>
			</div>
		</div>
		<div class="row row5 oepn-teen-result">
			<div class="col-3 winner-title"><h4>Player 5</h4></div>
			<div class="col-7">
				<div class="result-image"><img src="<?php echo $card5; ?>" /></div>
			</div>
			<div class="col-2 winner-box">
				<?php
				if(in_array(41,$result_status)){
			?>
			
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			
			<?php
				}
			?>
			</div>
		</div>
		<div class="row row5 oepn-teen-result">
			<div class="col-3 winner-title"><h4>Player 6</h4></div>
			<div class="col-7">
				<div class="result-image"><img src="<?php echo $card6; ?>" /></div>
			</div>
			<div class="col-2 winner-box"><?php
				if(in_array(51,$result_status)){
			?>
			
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			
			<?php
				}
			?></div>
		</div>


	<?php
	}else if($casino_type == "teen8"){
		
		$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id=$event_id");
		$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
		$cards = $fetch_get_casino_result['cards'];
		$result_status = $fetch_get_casino_result['result_status'];
		$cards = json_decode($cards);
	
		$card_1_1  = WEB_URL."/storage/front/img/cards/".$cards[0].".png";
		$card_1_2  = WEB_URL."/storage/front/img/cards/".$cards[9].".png";
		$card_1_3  = WEB_URL."/storage/front/img/cards/".$cards[18].".png";
		
		$card_2_1  = WEB_URL."/storage/front/img/cards/".$cards[1].".png";
		$card_2_2  = WEB_URL."/storage/front/img/cards/".$cards[10].".png";
		$card_2_3  = WEB_URL."/storage/front/img/cards/".$cards[19].".png";
		
		$card_3_1  = WEB_URL."/storage/front/img/cards/".$cards[2].".png";
		$card_3_2  = WEB_URL."/storage/front/img/cards/".$cards[11].".png";
		$card_3_3  = WEB_URL."/storage/front/img/cards/".$cards[20].".png";
		
		$card_4_1  = WEB_URL."/storage/front/img/cards/".$cards[3].".png";
		$card_4_2  = WEB_URL."/storage/front/img/cards/".$cards[12].".png";
		$card_4_3  = WEB_URL."/storage/front/img/cards/".$cards[21].".png";
		
		$card_5_1  = WEB_URL."/storage/front/img/cards/".$cards[4].".png";
		$card_5_2  = WEB_URL."/storage/front/img/cards/".$cards[13].".png";
		$card_5_3  = WEB_URL."/storage/front/img/cards/".$cards[22].".png";
		
		$card_6_1  = WEB_URL."/storage/front/img/cards/".$cards[5].".png";
		$card_6_2  = WEB_URL."/storage/front/img/cards/".$cards[14].".png";
		$card_6_3  = WEB_URL."/storage/front/img/cards/".$cards[23].".png";
		
		
		$card_7_1  = WEB_URL."/storage/front/img/cards/".$cards[6].".png";
		$card_7_2  = WEB_URL."/storage/front/img/cards/".$cards[15].".png";
		$card_7_3  = WEB_URL."/storage/front/img/cards/".$cards[24].".png";
		
		$card_8_1  = WEB_URL."/storage/front/img/cards/".$cards[7].".png";
		$card_8_2  = WEB_URL."/storage/front/img/cards/".$cards[16].".png";
		$card_8_3  = WEB_URL."/storage/front/img/cards/".$cards[25].".png";
		
		$card_dealer_1  = WEB_URL."/storage/front/img/cards/".$cards[8].".png";
		$card_dealer_2  = WEB_URL."/storage/front/img/cards/".$cards[17].".png";
		$card_dealer_3  = WEB_URL."/storage/front/img/cards/".$cards[26].".png";
		
		
		
		
		$result_status = explode(",",$result_status);
	?>
		<div class="row row5 oepn-teen-result">
			<div class="col-3 winner-title"><h4>Dealer</h4></div>
			<div class="col-7">
				<div class="result-image">
					<img src="<?php echo $card_dealer_1; ?>" />
					<img src="<?php echo $card_dealer_2; ?>" />
					<img src="<?php echo $card_dealer_3; ?>" />
				</div>
			</div>
		</div>
		<div class="row row5 oepn-teen-result">
			<div class="col-3 winner-title"><h4>Player 1</h4></div>
			<div class="col-7">
				<div class="result-image">
					<img src="<?php echo $card_1_1; ?>" /> 
					<img src="<?php echo $card_1_2; ?>" /> 
					<img src="<?php echo $card_1_3; ?>" /> 
				</div>
			</div>
			<div class="col-2 winner-box">
			<?php
				if(in_array(1,$result_status)){
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
				}
			?>
			</div>
		</div>
		<div class="row row5 oepn-teen-result">
			<div class="col-3 winner-title"><h4>Player 2</h4></div>
			<div class="col-7">
				<div class="result-image">
					
					<img src="<?php echo $card_2_1; ?>" /> 
					<img src="<?php echo $card_2_2; ?>" /> 
					<img src="<?php echo $card_2_3; ?>" /> 
					
				</div>
			</div>
			<div class="col-2 winner-box">
				<?php
				if(in_array(2,$result_status)){
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
				}
			?>
			</div>
		</div>
		<div class="row row5 oepn-teen-result">
			<div class="col-3 winner-title"><h4>Player 3</h4></div>
			<div class="col-7">
				<div class="result-image">
					
					<img src="<?php echo $card_3_1; ?>" /> 
					<img src="<?php echo $card_3_2; ?>" /> 
					<img src="<?php echo $card_3_3; ?>" /> 
					
				</div>
			</div>
			<div class="col-2 winner-box">
				<?php
				if(in_array(3,$result_status)){
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
				}
			?>
			</div>
		</div>
		<div class="row row5 oepn-teen-result">
			<div class="col-3 winner-title"><h4>Player 4</h4></div>
			<div class="col-7">
				<div class="result-image">
					
					<img src="<?php echo $card_4_1; ?>" /> 
					<img src="<?php echo $card_4_2; ?>" /> 
					<img src="<?php echo $card_4_3; ?>" /> 
					
				</div>
			</div>
			<div class="col-2 winner-box">
				<?php
				if(in_array(4,$result_status)){
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
				}
			?>
			</div>
		</div>
		<div class="row row5 oepn-teen-result">
			<div class="col-3 winner-title"><h4>Player 5</h4></div>
			<div class="col-7">
				<div class="result-image">
					<img src="<?php echo $card_5_1; ?>" /> 
					<img src="<?php echo $card_5_2; ?>" /> 
					<img src="<?php echo $card_5_3; ?>" /> 
				</div>
			</div>
			<div class="col-2 winner-box">
				<?php
				if(in_array(5,$result_status)){
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
				}
			?>
			</div>
		</div>
		<div class="row row5 oepn-teen-result">
			<div class="col-3 winner-title"><h4>Player 6</h4></div>
			<div class="col-7">
				<div class="result-image">
					<img src="<?php echo $card_6_1; ?>" /> 
					<img src="<?php echo $card_6_2; ?>" /> 
					<img src="<?php echo $card_6_3; ?>" /> 
				</div>
			</div>
			<div class="col-2 winner-box">
				<?php
				if(in_array(6,$result_status)){
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
				}
			?>
			</div>
		</div>
		<div class="row row5 oepn-teen-result">
			<div class="col-3 winner-title"><h4>Player 7</h4></div>
			<div class="col-7">
				<div class="result-image">
					<img src="<?php echo $card_7_1; ?>" /> 
					<img src="<?php echo $card_7_2; ?>" /> 
					<img src="<?php echo $card_7_3; ?>" /> 
				</div>
			</div>
			<div class="col-2 winner-box">
				<?php
				if(in_array(7,$result_status)){
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
				}
			?>
			</div>
		</div>
		<div class="row row5 oepn-teen-result">
			<div class="col-3 winner-title"><h4>Player 8</h4></div>
			<div class="col-7">
				<div class="result-image">
					<img src="<?php echo $card_8_1; ?>" /> 
					<img src="<?php echo $card_8_2; ?>" /> 
					<img src="<?php echo $card_8_3; ?>" />
				</div>
			</div>
			<div class="col-2 winner-box">
				<?php
				if(in_array(8,$result_status)){
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
				}
			?>
			</div>
		</div>

	<?php
	}else if($casino_type == "poker" or $casino_type == "poker20"){
		
		$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id=$event_id");
		$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
		$cards = $fetch_get_casino_result['cards'];
		$result_status = $fetch_get_casino_result['result_status'];
		$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
		$cards = json_decode($cards);
	
		
			$rdesc = str_replace(" ","",$desc_remakrs);
			$rdesc_array = explode("#",$rdesc);



			$winner = $rdesc_array[0];
			$pair_check = $rdesc_array[1];
			if($casino_type == "poker"){
				$pair_check = $rdesc_array[2];
			}
			
			$pair_check_array = explode("|",$pair_check);
			
		$card_a_1  = WEB_URL."/storage/front/img/cards/".$cards[0].".png";
		$card_a_2  = WEB_URL."/storage/front/img/cards/".$cards[1].".png";
		
		$card_b_1  = WEB_URL."/storage/front/img/cards/".$cards[2].".png";
		$card_b_2  = WEB_URL."/storage/front/img/cards/".$cards[3].".png";
		
		$card_dealer_1  = WEB_URL."/storage/front/img/cards/".$cards[4].".png";
		$card_dealer_2  = WEB_URL."/storage/front/img/cards/".$cards[5].".png";
		$card_dealer_3  = WEB_URL."/storage/front/img/cards/".$cards[6].".png";
		$card_dealer_4  = WEB_URL."/storage/front/img/cards/".$cards[7].".png";
		$card_dealer_5  = WEB_URL."/storage/front/img/cards/".$cards[8].".png";
		
		
	?>
	<div class="row row5 oepn-teen-result">
    <div class="col-3 winner-title"><h4>Board</h4></div>
    <div class="col-9">
        <div class="result-image">
            <img src="<?php echo $card_dealer_1; ?>" />
            <img src="<?php echo $card_dealer_2; ?>" />
            <img src="<?php echo $card_dealer_3; ?>" />
            <img src="<?php echo $card_dealer_4; ?>" />
            <img src="<?php echo $card_dealer_5; ?>" />
        </div>
    </div>
</div>
<div class="row row5 oepn-teen-result">
    <div class="col-3 winner-title"><h4>Player A</h4></div>
    <div class="col-7">
        <div class="result-image">
		
			<img src="<?php echo $card_a_1; ?>" />
			<img src="<?php echo $card_a_2; ?>" />
			
		</div>
    </div>
    <div class="col-2 winner-box">
        <?php
				if($result_status == 1  or $result_status == "A"){
			?>
			<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
				}
			?>
    </div>
</div>
<div class="row row5 oepn-teen-result">
    <div class="col-3 winner-title"><h4>Player B</h4></div>
    <div class="col-7">
        <div class="result-image">
		<img src="<?php echo $card_b_1; ?>" />
			<img src="<?php echo $card_b_2; ?>" />
		</div>
    </div>
    <div class="col-2 winner-box">
		<?php
				if($result_status == 2  or $result_status == "B"){
			?>
			<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
				}
			?>
	</div>
</div>
<div class="row mt-3">
    <div class="col-12">
        <div class="winner-board">
            
            <div class="mb-1">
                    <span class="text-success">Winner:</span>
                    <?php echo $winner; ?>
                </div>
			<?php
			
			if($pair_check_array != null){
				
				foreach($pair_check_array as $pair_data){
					$pair_data_array = explode(":",$pair_data);
					if($pair_data_array != null){
						$winner_side = $pair_data_array[0];
						$winner_type = $pair_data_array[1];
						if($winner_side == "A"){
							$texg_color = "danger";
						}
						else{
							$texg_color = "warning";
						}
			?>
				 <div class="mb-1">
                    <span class="text-<?php echo $texg_color; ?>">Player <?php echo $winner_side; ?></span>
                    <?php echo $winner_type; ?>
                </div>
			<?php
					}
				}
			}
			?>
        </div>
    </div>
</div>

	<?php
	}else if($casino_type == "poker9"){
		$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id=$event_id");
		$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
		$cards = $fetch_get_casino_result['cards'];
		$result_status = $fetch_get_casino_result['result_status'];
		$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
		$cards = json_decode($cards);
		
		$player_1_1  = WEB_URL."/storage/front/img/cards/".$cards[0].".png";
		$player_1_2  = WEB_URL."/storage/front/img/cards/".$cards[6].".png";
		
		$player_2_1  = WEB_URL."/storage/front/img/cards/".$cards[1].".png";
		$player_2_2  = WEB_URL."/storage/front/img/cards/".$cards[7].".png";
		
		$player_3_1  = WEB_URL."/storage/front/img/cards/".$cards[2].".png";
		$player_3_2  = WEB_URL."/storage/front/img/cards/".$cards[8].".png";
		
		$player_4_1  = WEB_URL."/storage/front/img/cards/".$cards[3].".png";
		$player_4_2  = WEB_URL."/storage/front/img/cards/".$cards[9].".png";
		
		$player_5_1  = WEB_URL."/storage/front/img/cards/".$cards[4].".png";
		$player_5_2  = WEB_URL."/storage/front/img/cards/".$cards[10].".png";
		
		$player_6_1  = WEB_URL."/storage/front/img/cards/".$cards[5].".png";
		$player_6_2  = WEB_URL."/storage/front/img/cards/".$cards[11].".png";
		
		
		
		$card_dealer_1  = WEB_URL."/storage/front/img/cards/".$cards[12].".png";
		$card_dealer_2  = WEB_URL."/storage/front/img/cards/".$cards[13].".png";
		$card_dealer_3  = WEB_URL."/storage/front/img/cards/".$cards[14].".png";
		$card_dealer_4  = WEB_URL."/storage/front/img/cards/".$cards[15].".png";
		$card_dealer_5  = WEB_URL."/storage/front/img/cards/".$cards[16].".png";
		
		?>
		
		<div class="row row5 oepn-teen-result">
    <div class="col-3 winner-title"><h4>Board</h4></div>
    <div class="col-9">
        <div class="result-image">
            <img src="<?php echo $card_dealer_1; ?>" /> 
            <img src="<?php echo $card_dealer_2; ?>" /> 
            <img src="<?php echo $card_dealer_3; ?>" /> 
            <img src="<?php echo $card_dealer_4; ?>" /> 
            <img src="<?php echo $card_dealer_5; ?>" /> 
        </div>
    </div>
</div>
<div class="row row5 oepn-teen-result">
    <div class="col-3 winner-title"><h4>Player 1</h4></div>
    <div class="col-7">
        <div class="result-image">
			<img src="<?php echo $player_1_1; ?>" /> 
			<img src="<?php echo $player_1_2; ?>" /> 
		</div>
    </div>
    <div class="col-2 winner-box">
		<?php
		if($result_status == 1){
	?>
        <div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
	<?php
		}
	?>
	</div>
</div>
<div class="row row5 oepn-teen-result">
    <div class="col-3 winner-title"><h4>Player 2</h4></div>
    <div class="col-7">
        <div class="result-image">
			<img src="<?php echo $player_2_1; ?>" /> 
			<img src="<?php echo $player_2_2; ?>" /> 
		</div>
    </div>
    <div class="col-2 winner-box">
		
		<?php
		if($result_status == 2){
	?>
        <div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
	<?php
		}
	?>
	
	</div>
</div>
<div class="row row5 oepn-teen-result">
    <div class="col-3 winner-title"><h4>Player 3</h4></div>
    <div class="col-7">
        <div class="result-image">
			<img src="<?php echo $player_3_1; ?>" /> 
			<img src="<?php echo $player_3_2; ?>" /> 
		</div>
    </div>
    <div class="col-2 winner-box">
		<?php
			if($result_status == 3){
		?>
			<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
		<?php
			}
		?>
	</div>
</div>
<div class="row row5 oepn-teen-result">
    <div class="col-3 winner-title"><h4>Player 4</h4></div>
    <div class="col-7">
        <div class="result-image">
			<img src="<?php echo $player_4_1; ?>" /> 
			<img src="<?php echo $player_4_2; ?>" /> 
		</div>
    </div>
    <div class="col-2 winner-box">
	<?php
		if($result_status == 4){
	?>
        <div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
	<?php
		}
	?>
    </div>
</div>
<div class="row row5 oepn-teen-result">
    <div class="col-3 winner-title"><h4>Player 5</h4></div>
    <div class="col-7">
        <div class="result-image">
			<img src="<?php echo $player_5_1; ?>" /> 
			<img src="<?php echo $player_5_2; ?>" /> 
		</div>
    </div>
    <div class="col-2 winner-box">
	<?php
		if($result_status == 5){
	?>
        <div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
	<?php
		}
	?>
	</div>
</div>
<div class="row row5 oepn-teen-result">
    <div class="col-3 winner-title"><h4>Player 6</h4></div>
    <div class="col-7">
        <div class="result-image">
			<img src="<?php echo $player_6_1; ?>" /> 
			<img src="<?php echo $player_6_2; ?>" /> 
		</div>
    </div>
    <div class="col-2 winner-box">
	<?php
		if($result_status == 6){
	?>
        <div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
	<?php
		}
	?>
	</div>
</div>
<div class="row mt-3">
    <div class="col-12">
        <div class="winner-board">
            <div class="mb-1">
                <span class="text-success">Result:</span>
                <?php echo $desc_remakrs; ?>
            </div>
        </div>
    </div>
</div>

		<?php
	}else if($casino_type == "ab20"){
		
		$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id=$event_id");
		$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
		$cards = $fetch_get_casino_result['cards'];
		$cards_b = $fetch_get_casino_result['b_cards'];
		$result_status = $fetch_get_casino_result['result_status'];
		$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
		$cards = json_decode($cards);
		
		
	?>
		
		<div class="row">
    <div class="col-12 text-center">
        <h4>Andar</h4>
        <div class="result-image">
            <div id="result-a-cards" class="ab-rtlslider owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                <div class="owl-stage-outer">
                    <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 608px;">
                        <?php
						$i=0;
						foreach($cards as $a_cards){
							
							if($i%2 != 0){
						
							
							$a_image  = WEB_URL."/storage/front/img/cards/".$a_cards.".png";
						?>
						<div class="owl-item" style="">
                            <div class="item"><img style="width:40px;height:50px;" src="<?php echo $a_image; ?>" /></div>
                        </div>
						<?php
							}
							$i++;
						}
						?>
						?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-12 text-center">
        <h4>Bahar</h4>
        <div class="result-image">
            <div id="result-b-cards" class="ab-rtlslider owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                <div class="owl-stage-outer">
                    <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 654px;">
                        <?php
						$i=0;
						foreach($cards as $a_cards){
							if($i%2 == 0){
						
							
							$a_image  = WEB_URL."/storage/front/img/cards/".$a_cards.".png";
						?>
						<div class="owl-item" style="">
                            <div class="item"><img style="width:40px;height:50px;" src="<?php echo $a_image; ?>" /></div>
                        </div>
						<?php
							}
							$i++;
						}
						?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>


	<?php
	}else if($casino_type == "abj"){
		
		$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id=$event_id");
		$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
		$cards = $fetch_get_casino_result['cards'];
		$result_status = $fetch_get_casino_result['result_status'];
		$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
		$cards = json_decode($cards);
		
	?>
		
	<?php
	}else if($casino_type == "3cardj"){
		$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id=$event_id");
		$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
		$cards = $fetch_get_casino_result['cards'];
		$result_status = $fetch_get_casino_result['result_status'];
		$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
		$cards = json_decode($cards);
		
		$card_1  = WEB_URL."/storage/front/img/cards/".$cards[0].".png";
		$card_2  = WEB_URL."/storage/front/img/cards/".$cards[1].".png";
		$card_3  = WEB_URL."/storage/front/img/cards/".$cards[2].".png";
	?>
		<div class="row">
		<div class="col-12 text-center">
			<div class="result-image">
				<img src="<?php echo $card_1; ?>" /> 
				<img src="<?php echo $card_2; ?>" /> 
				<img src="<?php echo $card_3; ?>" /> 
			</div>
		</div>
	</div>

	<?php
	}else if($casino_type == "card32" or $casino_type == "card32eu"){
		$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id=$event_id");
		$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
		$cards = $fetch_get_casino_result['cards'];
		$result_status = $fetch_get_casino_result['result_status'];
		$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
		$cards = json_decode($cards);
		
		//player 8
		$player_8[] = $card_0  = WEB_URL."/storage/front/img/cards/".$cards[0].".png";
		$player_8[] = $card_4  = WEB_URL."/storage/front/img/cards/".$cards[4].".png";
		$player_8[] = $card_8  = WEB_URL."/storage/front/img/cards/".$cards[8].".png";
		$player_8[] = $card_12  = WEB_URL."/storage/front/img/cards/".$cards[12].".png";
		$player_8[] = $card_16  = WEB_URL."/storage/front/img/cards/".$cards[16].".png";
		$player_8[] = $card_20  = WEB_URL."/storage/front/img/cards/".$cards[20].".png";
		$player_8[] = $card_24  = WEB_URL."/storage/front/img/cards/".$cards[24].".png";
		$player_8[] = $card_28  = WEB_URL."/storage/front/img/cards/".$cards[28].".png";
		$player_8[] = $card_32  = WEB_URL."/storage/front/img/cards/".$cards[32].".png";
		
		
		
		//player 9
		$player_9[] = $card_1  = WEB_URL."/storage/front/img/cards/".$cards[1].".png";
		$player_9[] = $card_5  = WEB_URL."/storage/front/img/cards/".$cards[5].".png";
		$player_9[] = $card_9  = WEB_URL."/storage/front/img/cards/".$cards[9].".png";
		$player_9[] = $card_13  = WEB_URL."/storage/front/img/cards/".$cards[13].".png";
		$player_9[] = $card_17  = WEB_URL."/storage/front/img/cards/".$cards[17].".png";
		$player_9[] = $card_21  = WEB_URL."/storage/front/img/cards/".$cards[21].".png";
		$player_9[] = $card_25  = WEB_URL."/storage/front/img/cards/".$cards[25].".png";
		$player_9[] = $card_29  = WEB_URL."/storage/front/img/cards/".$cards[29].".png";
		$player_9[] = $card_33  = WEB_URL."/storage/front/img/cards/".$cards[33].".png";
		
		//player 10
		$player_10[] = $card_2  = WEB_URL."/storage/front/img/cards/".$cards[2].".png";
		$player_10[] = $card_6  = WEB_URL."/storage/front/img/cards/".$cards[6].".png";
		$player_10[] = $card_10  = WEB_URL."/storage/front/img/cards/".$cards[10].".png";
		$player_10[] = $card_14  = WEB_URL."/storage/front/img/cards/".$cards[14].".png";
		$player_10[] = $card_18  = WEB_URL."/storage/front/img/cards/".$cards[18].".png";
		$player_10[] = $card_22  = WEB_URL."/storage/front/img/cards/".$cards[22].".png";
		$player_10[] = $card_26  = WEB_URL."/storage/front/img/cards/".$cards[26].".png";
		$player_10[] = $card_30  = WEB_URL."/storage/front/img/cards/".$cards[30].".png";
		$player_10[] = $card_34  = WEB_URL."/storage/front/img/cards/".$cards[34].".png";

		//player 11
		$player_11[] = $card_3  = WEB_URL."/storage/front/img/cards/".$cards[3].".png";
		$player_11[] = $card_7  = WEB_URL."/storage/front/img/cards/".$cards[7].".png";
		$player_11[] = $card_11  = WEB_URL."/storage/front/img/cards/".$cards[11].".png";
		$player_11[] = $card_15  = WEB_URL."/storage/front/img/cards/".$cards[15].".png";
		$player_11[] = $card_19  = WEB_URL."/storage/front/img/cards/".$cards[19].".png";
		$player_11[] = $card_23  = WEB_URL."/storage/front/img/cards/".$cards[23].".png";
		$player_11[] = $card_27  = WEB_URL."/storage/front/img/cards/".$cards[27].".png";
		$player_11[] = $card_31  = WEB_URL."/storage/front/img/cards/".$cards[31].".png";
		$player_11[] = $card_35  = WEB_URL."/storage/front/img/cards/".$cards[35].".png";
	?>
		<div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title"><h4>Player 8</h4></div>
		<div class="col-7">
			<div class="result-image">
			
			<?php
					foreach($player_8 as $card_8){
						if($card_8 != WEB_URL."/storage/front/img/cards/1.png"){
				?>	
						<img src="<?php echo $card_8; ?>"/>
				<?php
						}
					}
				?>
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
					if($result_status == 8){
				?>
			<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
		<?php
					}
				?>
		</div>
	</div>
	<div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title"><h4>Player 9</h4></div>
		<div class="col-7">
			<div class="result-image">
			<?php
					foreach($player_9 as $card_9){
						if($card_9 != WEB_URL."/storage/front/img/cards/1.png"){
				?>	
						<img src="<?php echo $card_9; ?>"/>
				<?php
						}
					}
				?>
			</div>
		</div>
		<div class="col-2 winner-box">
		<?php
					if($result_status == 9){
				?>
			<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
		<?php
					}
				?>
		</div>
	</div>
	<div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title"><h4>Player 10</h4></div>
		<div class="col-7">
			<div class="result-image">
			
			<?php
					foreach($player_10 as $card_10){
						if($card_10 != WEB_URL."/storage/front/img/cards/1.png"){
				?>	
						<img src="<?php echo $card_10; ?>"/>
				<?php
						}
					}
				?>
			
			</div>
		</div>
		<div class="col-2 winner-box">
		<?php
					if($result_status == 10){
				?>
			<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
		<?php
					}
				?>
		</div>
	</div>
	<div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title"><h4>Player 11</h4></div>
		<div class="col-7">
			<div class="result-image">
				<?php
					foreach($player_11 as $card_11){
						if($card_11 != WEB_URL."/storage/front/img/cards/1.png"){
				?>	
						<img src="<?php echo $card_11; ?>"/>
				<?php
						}
					}
				?>
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
					if($result_status == 11){
				?>
			<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
		<?php
					}
				?>
		</div>
	</div>

	<?php
	}else if ($casino_type == "worli2" or $casino_type == "worli"){
		$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id=$event_id");
		$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
		$cards = $fetch_get_casino_result['cards'];
		$result_status = $fetch_get_casino_result['result_status'];
		$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
		$cards = json_decode($cards);
		
		$card_1  = WEB_URL."/storage/front/img/cards/".$cards[0].".png";
		$card_2  = WEB_URL."/storage/front/img/cards/".$cards[1].".png";
		$card_3  = WEB_URL."/storage/front/img/cards/".$cards[2].".png";
		
		$card_1_value = str_replace("A","1",$card_1);
		$card_2_value = str_replace("A","1",$card_2);
		$card_3_value = str_replace("A","1",$card_3);
		
		$card_1_value = preg_replace("/[^0-9]/", "", "$card_1_value" );
		$card_2_value = preg_replace("/[^0-9]/", "", "$card_2_value" );
		$card_3_value = preg_replace("/[^0-9]/", "", "$card_3_value" );
		
		if($card_1_value >= 10){
			$card_1_value = substr($card_1_value, -1); 
		}
		
		if($card_2_value >= 10){
			$card_2_value = substr($card_2_value, -1); 
		}
		
		if($card_3_value >= 10){
			$card_3_value = substr($card_3_value, -1); 
		}
	?>
		<div class="row">
		<div class="col-12 text-center">
			<div class="result-image">
				<img src="<?php echo $card_1; ?>" /> 
				<img src="<?php echo $card_2; ?>" /> 
				<img src="<?php echo $card_3; ?>" /> 
			</div>
			<div class="mt-3">
				<span class="bg-success pt-2 pb-2 pl-2 pr-2 text-white"><b><?php echo $card_1_value.$card_2_value.$card_3_value; ?> - <?php echo $result_status; ?></b></span>
			</div>
		</div>
	</div>


	<?php
	}else if ($casino_type == "lucky7" or $casino_type == "lucky7eu"){
		$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id=$event_id");
		$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
		$cards = $fetch_get_casino_result['cards'];
		$result_status = $fetch_get_casino_result['result_status'];
		$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
		$cards = json_decode($cards);
		
		$card_1  = WEB_URL."/storage/front/img/cards/".$cards[0].".png";
		$result_status_text = "";
		if($result_status == "H" or $result_status =="2"){
			$result_status_text = "High Card"; 
		}else if($result_status == "L"  or $result_status =="1"){
			$result_status_text = "Low Card"; 
		}else if($result_status == "T"){
			$result_status_text = "Tie"; 
		}
		
		
		$card_1_value = str_replace("SS","",$cards[0]);		
		$card_1_value = str_replace("DD","",$card_1_value);
		$card_1_value = str_replace("HH","",$card_1_value);
		$card_1_value = str_replace("CC","",$card_1_value);
		
		$odd_even = "";
		$is_even = is_even($cards[0],$cards_result);
		if($is_even){
			$odd_even = "Even";
		}else {
			$odd_even = "Odd";
		}
		
		$red_black = "";
		$is_red = is_red($cards[0],$cards_result);
		if($is_red){
			$red_black = "Red";
		}else {
			$red_black = "Black";
		}
		?>
			<div class="row">
    <div class="col-12 text-center">
        <div class="result-image"><img src="<?php echo $card_1; ?>" /></div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 text-center">
        <div class="winner-board">
            <div class="mb-1"><span class="text-success">Result:</span> <span><?php echo $result_status_text; ?> || <?php echo $red_black; ?> || <?php echo $odd_even; ?> || Card <?php echo $card_1_value; ?></span></div>
        </div>
    </div>
</div>


		<?php
	}else if ($casino_type == "dt20" or $casino_type == "dt202" or $casino_type == "dt6"){
		$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id=$event_id");
		$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
		$cards = $fetch_get_casino_result['cards'];
		$result_status = $fetch_get_casino_result['result_status'];
		$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
		$cards = json_decode($cards);
		
		$card_1  = WEB_URL."/storage/front/img/cards/".$cards[0].".png";
		$card_2  = WEB_URL."/storage/front/img/cards/".$cards[1].".png";
		
		$result_text = "";
		if($result_status == "D"){
			$result_text = "Dragon";
		}else if($result_status == "T"){
			$result_text = "Tiger";
		}
		
		$is_par_text = "No";
		$is_pair_dt20 = is_pair_dt20($cards[0],$cards[1],$cards_result);
		if($is_pair_dt20){
			$is_par_text = "Is";
		}
		
		$card_1_value = str_replace("SS","",$cards[0]);		
		$card_1_value = str_replace("DD","",$card_1_value);
		$card_1_value = str_replace("HH","",$card_1_value);
		$card_1_value = str_replace("CC","",$card_1_value);
		
		
		$card_2_value = str_replace("SS","",$cards[1]);		
		$card_2_value = str_replace("DD","",$card_2_value);
		$card_2_value = str_replace("HH","",$card_2_value);
		$card_2_value = str_replace("CC","",$card_2_value);
		
		$odd_even_dragon = "";
		$is_even = is_even($cards[0],$cards_result);
		if($is_even){
			$odd_even_dragon = "Even";
		}else {
			$odd_even_dragon = "Odd";
		}
		
		$red_black_dragon = "";
		$is_red = is_red($cards[0],$cards_result);
		if($is_red){
			$red_black_dragon = "Red";
		}else {
			$red_black_dragon = "Black";
		}
		
		$odd_even_tiger = "";
		$is_even = is_even($cards[1],$cards_result);
		if($is_even){
			$odd_even_tiger = "Even";
		}else {
			$odd_even_tiger = "Odd";
		}
		
		$red_black_tiger = "";
		$is_red = is_red($cards[1],$cards_result);
		if($is_red){
			$red_black_tiger = "Red";
		}else {
			$red_black_tiger = "Black";
		}
	?>
		
		<div class="row">
		<div class="col-12 text-center">
			<div class="result-image">
			<img src="<?php echo $card_1; ?>" /> 
			<img src="<?php echo $card_2; ?>" /> 
		</div>
	</div>
	</div>
	<div class="row mt-3">
		<div class="col-12 text-center">
			<div class="winner-board">
				<div class="mb-1">
					<span class="text-success">Result: </span>
					<?php echo $result_text; ?>|<?php echo $is_par_text; ?> Pair
				</div>
				<div class="mb-1">
					<span class="text-success">Dragon: </span>
					<?php echo $red_black_dragon; ?>|<?php echo $odd_even_dragon; ?>|Card<?php echo $card_1_value; ?>
				</div>
				<div class="mb-1">
					<span class="text-success">Tiger: </span>
					<?php echo $red_black_tiger; ?>|<?php echo $odd_even_tiger; ?>|Card<?php echo $card_2_value; ?>
				</div>
			</div>
		</div>
	</div>


	<?php
	}else if ($casino_type == "aaa"){
		$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id=$event_id");
		$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
		$cards = $fetch_get_casino_result['cards'];
		$result_status = $fetch_get_casino_result['result_status'];
		$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
		$cards = json_decode($cards);
		
		$card_1  = WEB_URL."/storage/front/img/cards/".$cards[0].".png";
		
		$result_text = "";
		if($result_status == "A"){
			$result_text = "Amar";
		}else if($result_status == "B"){
			$result_text = "Akbar";
		}else if($result_status == "C"){
			$result_text = "Anthony";
		}
		
		$card_1_value = str_replace("SS","",$cards[0]);		
		$card_1_value = str_replace("DD","",$card_1_value);
		$card_1_value = str_replace("HH","",$card_1_value);
		$card_1_value = str_replace("CC","",$card_1_value);
		
		
		$odd_even = "";
		$is_even = is_even($cards[0],$cards_result);
		if($is_even){
			$odd_even = "Even";
		}else {
			$odd_even = "Odd";
		}
		
		$red_black = "";
		$is_red = is_red($cards[0],$cards_result);
		if($is_red){
			$red_black = "Red";
		}else {
			$red_black = "Black";
		}
		
		$is_under_over = "Tie ";
		$is_current_card = rank_number($cards[0],$cards_result);
		if($is_current_card < 7){
			$is_under_over = "Under 7";
		}else if($is_current_card>7){
			$is_under_over = "Over 7";
		}
	?>
		<div class="row">
			<div class="col-12 text-center">
				<div class="result-image"><img src="<?php echo $card_1; ?>" /></div>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-12 text-center">
				<div class="winner-board">
					<div class="mb-1"><span class="text-success">Result:</span> <span><?php echo $result_text; ?> </span></div>
					<div class="mb-1"><span> <?php echo $red_black; ?> | <?php echo $odd_even; ?> | <?php echo $is_under_over; ?> | Card <?php echo $card_1_value; ?></span></div>
				</div>
			</div>
		</div>


	
	<?php
	}else if ($casino_type == "btable"){
		$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id=$event_id");
		$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
		$cards = $fetch_get_casino_result['cards'];
		$result_status = $fetch_get_casino_result['result_status'];
		$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
		$cards = json_decode($cards);
		
		$card_1  = WEB_URL."/storage/front/img/cards/".$cards[0].".png";
		
		$result_text = "";
		if($result_status == "A"){
			$result_text = "DON";
		}else if($result_status == "B"){
			$result_text = "Amar Akbar Anthony";
		}else if($result_status == "C"){
			$result_text = "Sahib Bibi Aur Ghulam";
		}else if($result_status == "D"){
			$result_text = "Dharam Veer";
		}else if($result_status == "E"){
			$result_text = "Kis KisKo Pyaar Karoon";
		}else if($result_status == "F"){
			$result_text = "Ghulam";
		}
		
		$card_1_value = str_replace("SS","",$cards[0]);		
		$card_1_value = str_replace("DD","",$card_1_value);
		$card_1_value = str_replace("HH","",$card_1_value);
		$card_1_value = str_replace("CC","",$card_1_value);
		
		
		$odd_even = "";
		$is_even = is_even($cards[0],$cards_result);
		if($is_even){
			$odd_even = "Even";
		}else {
			$odd_even = "Odd";
		}
		
		$red_black = "";
		$is_red = is_red($cards[0],$cards_result);
		if($is_red){
			$red_black = "Red";
		}else {
			$red_black = "Black";
		}
		
		$is_dulhan = is_dulhan($cards[0],$cards_result);
		if($is_dulhan){
			$dulha_barati = "Dulha Dulhan";
		}else{
			$dulha_barati = "Barati";
		}
	?>
		
		<div class="row">
			<div class="col-12 text-center">
				<div class="result-image"><img src="<?php echo $card_1; ?>" /></div>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-12 text-center">
				<div class="winner-board">
					<div class="mb-1"><span class="text-success">Result:</span> <span><?php echo $result_text; ?> </span></div>
					<div class="mb-1"><span> <?php echo $red_black; ?> | <?php echo $odd_even; ?> | <?php echo $dulha_barati; ?> | Card <?php echo $card_1_value; ?></span></div>
				</div>
			</div>
		</div>


	
	<?php
	}else if($casino_type == "dtl20"){
		$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id=$event_id");
		$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
		$cards = $fetch_get_casino_result['cards'];
		$result_status = $fetch_get_casino_result['result_status'];
		$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
		$cards = json_decode($cards);
		
		$card_1  = WEB_URL."/storage/front/img/cards/".$cards[0].".png";
		$card_2  = WEB_URL."/storage/front/img/cards/".$cards[1].".png";
		$card_3  = WEB_URL."/storage/front/img/cards/".$cards[2].".png";
		
		
			
		
	?>	
		<div class="row row5 oepn-teen-result">
				<div class="col-3 winner-title"><h4>Dragon</h4></div>
			<div class="col-7">
				<div class="result-image"><img src="<?php echo $card_1; ?>" /></div>
			</div>
			<div class="col-2 winner-box">
			<?php 
					if($result_status == "1" or $result_status =="D"){
					?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php 
					}
				?>
			</div>
		</div>
		<div class="row row5 oepn-teen-result">
			<div class="col-3 winner-title"><h4>Tiger</h4></div>
			<div class="col-7">
				<div class="result-image"><img src="<?php echo $card_2; ?>" /></div>
			</div>
			<div class="col-2 winner-box">
				<?php 
					if($result_status == "2" or $result_status =="T"){
					?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php 
					}
				?>
			</div>
		</div>
		<div class="row row5 oepn-teen-result">
			<div class="col-3 winner-title"><h4>Lion</h4></div>
			<div class="col-7">
				<div class="result-image"><img src="<?php echo $card_3; ?>" /></div>
			</div>
			<div class="col-2 winner-box">
			<?php 
					if($result_status == "3" or $result_status =="L"){
					?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php 
					}
				?>
			</div>
		</div>

	
	<?php
	}else if ($casino_type == "baccarat" or $casino_type == "baccarat2"){
		$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id=$event_id");
		$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
		$cards = $fetch_get_casino_result['cards'];
		$result_status = $fetch_get_casino_result['result_status'];
		$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
		$cards = json_decode($cards);
		
		$card_1  = WEB_URL."/storage/front/img/cards/".$cards[0].".png";
		$card_2  = WEB_URL."/storage/front/img/cards/".$cards[1].".png";
		$card_3  = WEB_URL."/storage/front/img/cards/".$cards[2].".png";
		$card_4  = WEB_URL."/storage/front/img/cards/".$cards[3].".png";
		$card_5  = WEB_URL."/storage/front/img/cards/".$cards[5].".png";
		$card_6  = WEB_URL."/storage/front/img/cards/".$cards[6].".png";
	?>
	<div class="row row5 oepn-teen-result">
    <div class="col-3 winner-title"><h4>Player</h4></div>
    <div class="col-7">
        <div class="result-image">
            
			<?php
						if($card_5 != WEB_URL."/storage/front/img/cards/1.png"){
					?>
						<img src="<?php echo $card_5; ?>" class="lrotate" /> 
					<?php
						}
					?>
					<img src="<?php echo $card_3; ?>" />
					<img src="<?php echo $card_1; ?>"/>
			
        </div>
    </div>
    <div class="col-2 winner-box">
	
	<?php
		if($result_status == 1){
				?>
        <div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
	<?php
		}
		?>
	</div>
</div>
<div class="row row5 oepn-teen-result">
    <div class="col-3 winner-title"><h4>Banker</h4></div>
    <div class="col-7">
        <div class="result-image">
           
					<img src="<?php echo $card_2; ?>" />
					<img src="<?php echo $card_4; ?>"/>
				 <?php
						if($card_6 != WEB_URL."/storage/front/img/cards/1.png"){
					?>
						<img src="<?php echo $card_6; ?>" class="rrotate" /> 
					<?php
						}
					?>
        </div>
    </div>
    <div class="col-2 winner-box">
	<?php
		if($result_status == 2){
				?>
        <div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
	<?php
		}
		?>
    </div>
</div>

<?php	
	}else if ($casino_type =="cricket20"){
		$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id=$event_id");
		$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
		$cards = $fetch_get_casino_result['cards'];
		$result_status = $fetch_get_casino_result['result_status'];
		$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
		$cards = json_decode($cards);
		
		$card_1  = WEB_URL."/storage/front/img/cards/".$cards[0].".png";
	?>
		<div class="row">
			<div class="col-12 text-center">
				<div class="result-image"><img src="<?php echo $card_1; ?>" /></div>
			</div>
		</div>

	
	<?php
	}
?>