<?php
	include('../include/conn.php');
	include "../session.php";

	$user_id = $_SESSION['CLIENT_LOGIN_ID'];
	
	$sql = "
		SELECT 
			b.event_id,b.event_type,b.oddsmarketId,b.event_name,COUNT(b.bet_id) as total_bets
			,(SELECT SUM(e.exposure_amount) FROM exposure_details e WHERE e.event_id = b.event_id AND e.user_id = b.user_id) as total_exposure 
		FROM bet_details b 
		WHERE b.user_id=$user_id AND b.bet_status=1 GROUP BY b.event_id";	
	$get_all_data = $conn->query($sql);
	
	$returnArr = array();
	while($exposure_data = mysqli_fetch_assoc($get_all_data)){
		$returnArr[] = array(
			'eventId' => $exposure_data['event_id'],
			'oddsmarketId' => $exposure_data['oddsmarketId'],
			'eventType' => $exposure_data['event_type'],
			'eventName' => $exposure_data['event_name'],
			'trade' => $exposure_data['total_bets'],
		);
	}
	
	echo json_encode($returnArr);
?>