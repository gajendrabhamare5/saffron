<?php

include("../include/conn.php");
include("../include/level_percentage.php");
 
 exit();
echo "start";
/* 26785,27044,27869,29736, */
if(true){

	
	$get_bets = $conn->query("select * from bet_teen_details where bet_status=0 and bet_id IN (4034380,4034039,4034046,4034189,4034233,4034241,4034266,4034285,4034339,4034328,4034240,4041610,4041577,4041611,4041635,4089974,4089933,4089967,4090055,4090059,4089934,3825527,3825586,3863857,3863907,3863860,3863876,3863865,4027252,4027350,4027319,4027343,4027373,4027377,4027293,4027232,4027261,4027250,4027280,4027277,4027300,4027295,4027325,4027345,4027349,4027379)");

	while($bet_data = mysqli_fetch_assoc($get_bets)){
	
		$mid = $bet_data['event_id'];
		$bet_id = $bet_data['bet_id'];
		echo $bet_id;
		$bet_user_id = $bet_data['user_id'];
		$bet_result = $bet_data['bet_result'];
		$bet_time = $bet_data['bet_time'];
	
		$end_date_time = date("Y-m-d H:i:s",strtotime($bet_time));
		$transaction_time = date("Y-m-d H:i:s",strtotime($bet_time));
		$transaction_time2 = date("d-m-Y H:i:s",strtotime($bet_time));
	
		$conn->query("DELETE FROM `accounts` WHERE `bet_id` = $bet_id AND `game_type` = 1");
	
		//win
		if($bet_result > 0){
			$transaction_id = 'casino-'.$bet_id.'-'.$bet_user_id;
			
			$account_description = "#Win $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
			$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id',0,'$account_description','$bet_id','$mid','$bet_result','Credit','4','$transaction_time','1',1,'$transaction_id')");
			$last_inser_id = $conn->insert_id;
			if($last_inser_id == 0 or true){
				echo "</br>";
				echo "</br>";
				echo "insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id',0,'$account_description','$bet_id','$mid','$bet_result','Credit','4','$transaction_time','1',1,'$transaction_id')";
				
				
				echo "</br>";
				echo "</br>";
			}
			
			$level_pers = get_level_per($conn, $bet_user_id);
			echo "<pre>";
			print_r($level_pers);
			echo "</pre>";
			foreach ($level_pers as $debit_user_id => $level_per) {

				$debit_amt = 0 - (($bet_result / 100) * $level_per);
			
				$transaction_id = 'casino-'.$bet_id.'-'.$debit_user_id;

				$account_descriptionSMDL = "#Loss $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
				$insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$debit_amt','Debit','7','$transaction_time','1',1,'$transaction_id')");
				
				$last_inser_id = $conn->insert_id;
				if($last_inser_id == 0 or true){
					echo "</br>";
				echo "</br>";
					echo "insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$debit_amt','Debit','7','$transaction_time','1',1,'$transaction_id')";
					
					
					echo "</br>";
					echo "</br>";
				}
			}
		}
		else{
		//loss
	
			$bet_result = abs($bet_result);
			$transaction_id = 'casino-'.$bet_id.'-'.$bet_user_id;
			
			$account_description = "#Loss $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
			$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','-$bet_result','Debit','7','$transaction_time','1',1,'$transaction_id')");

			$last_inser_id = $conn->insert_id;
				if($last_inser_id == 0 or true){
					echo "</br>";
				echo "</br>";
					echo "insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','-$bet_result','Debit','7','$transaction_time','1',1,'$transaction_id')";
					
					
					echo "</br>";
					echo "</br>";
				}
				
			$level_pers = get_level_per($conn, $bet_user_id);
			echo "<pre>";
			print_r($level_pers);
			echo "</pre>";
			foreach ($level_pers as $cradit_user_id => $level_per) {

				$cradit_amt = ($bet_result / 100) * $level_per;
			
				$transaction_id = 'casino-'.$bet_id.'-'.$cradit_user_id;

				$account_descriptionSMDL = "#Win $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
				$insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$cradit_amt','Credit','4','$transaction_time','1',1,'$transaction_id')");
				
				$last_inser_id = $conn->insert_id;
				if($last_inser_id == 0 or true){
					
					echo "</br>";
				echo "</br>";
					echo "insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$cradit_amt','Credit','4','$transaction_time','1',1,'$transaction_id')";
					
					
					echo "</br>";
					echo "</br>";
					
				}
			}
		
		}
	}
}
else if(false){

	$get_bets = $conn->query("select * from bet_details where bet_status=0 and user_id IN (1482,1872,1431,1432,1433,1434,1435,1436,1450,1455,1456,1457,1460,1465,1468,1473,1477,1479,1483,1485,1486,1488,1491,1492,1493,1494,1498,1505,1507,1520,1524,1527,1532,1533,1534,1536,1537,1538,1544,1545,1548,1547,1556,1566,1571,1572,1573,1574,1575,1576,1578,1579,1580,1583,1584,1585,1586,1603,1598,1608,1609,1611,1612,1613,1614,1615,1616,1617,1618,1619,1620,1621,1622,1623,1624,1625,1626,1627,1628,1629,1630,1631,1632,1633,1634,1639,1641,1665,1668,1671,1672,1673,4379,1674,1678,1680,1681,1683,1684,1690,1693,1694,1695,1696,1701,1704,1725,1735,1743,1752,1754,1755,1762,1770,1771,1776,1789,1796,1797,1802,1807,1810,1811,1812,1814,1834,1843,1853,1859,1867,1877,1878,1881,1908,1939,1933,1937,1942,1943,1944,1968,1974,1979,1981,1998,1999,2000,2007,2010,2020,2017,2022,2023,2036,2038,2044,2083,2104,2124,2179,2180,2181,2182,2183,2185,2186,2187,2265,2266,2279,2281,2282,2283,2296,2302,2307,2311,2372,2373,2377,2379,2466,2468,2470,2471,2475,2483,2492,2505,2546,2600,2627,2641,2730,2819,2850,2854,3149,2875,2892,2924,2968,3140,3032,3029,3040,3043,3045,3054,3057,3078,3079,3093,3096,3117,3131,3172,3200,3237,3340,3364,3409,3410,3422,3439,3490,3541,3564,3566,3565,3567,3612,3639,3647,3648,3656,3700,3699,3718,3875,3828,3829,3834,3830,3836,3854,3857,3879,3884,3913,3923,3939,3978,3982,4013,4018,4029,4034,4043,4084,4097,4156,4162,4181,4184,4194,4196,4236,4209,4215,4219,4241,4251,4259,4269,4271,4312,4381,4422,4428,4439,4448,4512,4521,4545,4654,4635)");

	while($bet_data = mysqli_fetch_assoc($get_bets)){
	
		$mid = $bet_data['event_id'];
		$bet_id = $bet_data['bet_id'];
		echo $bet_id;
		$bet_user_id = $bet_data['user_id'];
		$bet_result = $bet_data['bet_result'];
		$bet_time = $bet_data['bet_time'];
		$event_name = $bet_data['event_name'];
		$event_type = $bet_data['event_type'];
		$market_name = $bet_data['market_name'];
	
		$end_date_time = date("Y-m-d H:i:s",strtotime($bet_time));
		$transaction_time = date("Y-m-d H:i:s",strtotime($bet_time));
		$transaction_time2 = date("d-m-Y H:i:s",strtotime($bet_time));
	
		$conn->query("DELETE FROM `accounts` WHERE `bet_id` = $bet_id AND `game_type` = 0");
	
		//win
		if($bet_result > 0){
			$transaction_id = 'sports-'.$bet_id.'-'.$bet_user_id;
			
			$account_description = "#Win  BET ID $bet_id - $event_name -$market_name at $transaction_time2";
			$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id',0,'$account_description','$bet_id','$mid','$bet_result','Credit','4','$transaction_time','1',0,'$transaction_id')");

			$last_inser_id = $conn->insert_id;
			if($last_inser_id == 0){
				
				echo "</br>";
				echo "</br>";
				echo "insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id',0,'$account_description','$bet_id','$mid','$bet_result','Credit','4','$transaction_time','1',0,'$transaction_id')";
				
				echo "</br>";
				echo "</br>";
			}
			
			$level_pers = get_level_per($conn, $bet_user_id);
			foreach ($level_pers as $debit_user_id => $level_per) {

				$debit_amt = 0 - (($bet_result / 100) * $level_per);
			
				$transaction_id = 'sports-'.$bet_id.'-'.$debit_user_id;

				$account_descriptionSMDL = "#Loss  BET ID $bet_id - $event_name -$market_name at $transaction_time2";
				$insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$debit_amt','Debit','7','$transaction_time','1',0,'$transaction_id')");
				
				$last_inser_id = $conn->insert_id;
				if($last_inser_id == 0){
					
					echo "</br>";
				echo "</br>";
					echo "insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$debit_amt','Debit','7','$transaction_time','1',0,'$transaction_id')";
					
					echo "</br>";
					echo "</br>";
				}
				
			}
		}
		else{
		//loss
	
			$bet_result = abs($bet_result);
			$transaction_id = 'sports-'.$bet_id.'-'.$bet_user_id;
			
			$account_description = "#Loss BET ID $bet_id - $event_name -$market_name at $transaction_time2";
			$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','-$bet_result','Debit','7','$transaction_time','1',0,'$transaction_id')");

			
			$last_inser_id = $conn->insert_id;
				if($last_inser_id == 0){
					
					echo "</br>";
				echo "</br>";
					echo "insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','-$bet_result','Debit','7','$transaction_time','1',0,'$transaction_id')";
					
					echo "</br>";
					echo "</br>";
				}
				
			$level_pers = get_level_per($conn, $bet_user_id);
			foreach ($level_pers as $cradit_user_id => $level_per) {

				$cradit_amt = ($bet_result / 100) * $level_per;
			
				$transaction_id = 'sports-'.$bet_id.'-'.$cradit_user_id;

				$account_descriptionSMDL = "#Win  BET ID $bet_id - $event_name -$market_name at $transaction_time2";
				$insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$cradit_amt','Credit','4','$transaction_time','1',0,'$transaction_id')");
				
				$last_inser_id = $conn->insert_id;
				if($last_inser_id == 0){
					
					echo "</br>";
				echo "</br>";
					echo "insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$cradit_amt','Credit','4','$transaction_time','1',0,'$transaction_id')";
					echo "</br>";
					echo "</br>";
				}
				
			}
		
		}
	}
}
else if(false){
	
	$get_event_data = $conn->query("select event_id from bet_details where bet_status=0 and user_id IN (1482,1872,1431,1432,1433,1434,1435,1436,1450,1455,1456,1457,1460,1465,1468,1473,1477,1479,1483,1485,1486,1488,1491,1492,1493,1494,1498,1505,1507,1520,1524,1527,1532,1533,1534,1536,1537,1538,1544,1545,1548,1547,1556,1566,1571,1572,1573,1574,1575,1576,1578,1579,1580,1583,1584,1585,1586,1603,1598,1608,1609,1611,1612,1613,1614,1615,1616,1617,1618,1619,1620,1621,1622,1623,1624,1625,1626,1627,1628,1629,1630,1631,1632,1633,1634,1639,1641,1665,1668,1671,1672,1673,4379,1674,1678,1680,1681,1683,1684,1690,1693,1694,1695,1696,1701,1704,1725,1735,1743,1752,1754,1755,1762,1770,1771,1776,1789,1796,1797,1802,1807,1810,1811,1812,1814,1834,1843,1853,1859,1867,1877,1878,1881,1908,1939,1933,1937,1942,1943,1944,1968,1974,1979,1981,1998,1999,2000,2007,2010,2020,2017,2022,2023,2036,2038,2044,2083,2104,2124,2179,2180,2181,2182,2183,2185,2186,2187,2265,2266,2279,2281,2282,2283,2296,2302,2307,2311,2372,2373,2377,2379,2466,2468,2470,2471,2475,2483,2492,2505,2546,2600,2627,2641,2730,2819,2850,2854,3149,2875,2892,2924,2968,3140,3032,3029,3040,3043,3045,3054,3057,3078,3079,3093,3096,3117,3131,3172,3200,3237,3340,3364,3409,3410,3422,3439,3490,3541,3564,3566,3565,3567,3612,3639,3647,3648,3656,3700,3699,3718,3875,3828,3829,3834,3830,3836,3854,3857,3879,3884,3913,3923,3939,3978,3982,4013,4018,4029,4034,4043,4084,4097,4156,4162,4181,4184,4194,4196,4236,4209,4215,4219,4241,4251,4259,4269,4271,4312,4381,4422,4428,4439,4448,4512,4521,4545,4654,4635) GROUP BY event_id");
	while($fetch_get_event_data = mysqli_fetch_assoc($get_event_data)){
		$event_id = $fetch_get_event_data['event_id'];
		echo $event_id;
		$get_all_user_commision = $conn->query("select bet_id,event_id,market_id,event_name,bet_time,market_name,market_type,SUM(bet_result) as overal_result,user_id,Email_ID from bet_details as b left outer join user_login_master as u on u.UserID=b.user_id where b.event_id='$event_id' and b.market_type='MATCH_ODDS' and b.bet_status=0 GROUP BY user_id");
		$entry_transaction_time = date("Y-m-d H:i:s");
		$entry_transaction_time = date("Y-m-d H:i:s",(strtotime($entry_transaction_time) +2));
		while ($fetch_get_all_user_commision = mysqli_fetch_assoc($get_all_user_commision)) {
			$commission_bet_id = $fetch_get_all_user_commision['bet_id'];
			$commision_user_id = $fetch_get_all_user_commision['user_id'];
			$commision_user_Email_ID = $fetch_get_all_user_commision['Email_ID'];
			$commision_overal_result = $fetch_get_all_user_commision['overal_result'];
			$commision_event_name = $fetch_get_all_user_commision['event_name'];
			$bet_time = $fetch_get_all_user_commision['bet_time'];
			$entry_transaction_time = date("Y-m-d H:i:s",strtotime($bet_time));
			$comm_amount = ($commision_overal_result * 1) / 100;

			$check_already_comm_add = $conn->query("select * from accounts where event_id='$event_id' and user_id='$commision_user_id'");
			$fetch_check_already_comm_add = mysqli_fetch_assoc($check_already_comm_add);
			if (true) {
				if ($comm_amount > 0) {

					$transaction_id = 'sports_comm-'.$commission_bet_id.'-1';
					$update_bet_status = $conn->query("update bet_details set bet_comm='$comm_amount' where bet_id=$commission_bet_id");
					$account_description_commision = "#Commission Paid from $commision_user_Email_ID Event name - $commision_event_name at $entry_transaction_time";


					$whitelabel_comm_amount = ($comm_amount/100) * WHTELABEL_PER;
					$controller_comm_amount = $comm_amount;
					
					 $insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('1','$commision_user_id','$account_description_commision','$commission_bet_id','$event_id','$whitelabel_comm_amount','Credit','10','$entry_transaction_time','1','$transaction_id')");
					$account_id1 = $conn->insert_id;
					
					/* $transaction_id = 'sports_comm-'.$commission_bet_id.'-'.CONTROLLER_ID;
					$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('".CONTROLLER_ID."','$commision_user_id','$account_description_commision','$commission_bet_id','$event_id','$controller_comm_amount','Credit','10','$entry_transaction_time','1','$transaction_id')");
					$controller_id1 = $conn->insert_id; */

					$comm_amount = $comm_amount * (-1);

					$transaction_id = 'sports_comm-'.$commission_bet_id.'-'.$commision_user_id;
					$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$commision_user_id',0,'$account_description_commision','$commission_bet_id','$comm_amount','Debit','9','$entry_transaction_time','1','$transaction_id')");

					$account_id2 = $conn->insert_id;


					$both_account_id = $account_id1 . "," . $account_id2;
					$conn->query("insert into commission_master (account_id,user_id,bet_id,event_id,comm_amount,comm_datetime) values('$both_account_id','$commision_user_id','$commission_bet_id','$event_id','$comm_amount','$entry_transaction_time')");
				}
			}
		}
	}
	
	
}
else if(false){
	$get_user_settlement = $conn->query("select * from accounts as a left outer join user_login_master as u on u.UserID=a.user_id where a.entry_type=8 and u.UserType=1");
	while($fetch_get_user_settlement = mysqli_fetch_assoc($get_user_settlement)){
		$user_id = $fetch_get_user_settlement['user_id'];
		$opp_user_id = $fetch_get_user_settlement['opp_user_id'];
		$account_date_time = $fetch_get_user_settlement['account_date_time'];
		$user_amount = $fetch_get_user_settlement['amount'];
		$account_description = $fetch_get_user_settlement['account_description'];
		$type = $fetch_get_user_settlement['type'];
		$parent_id = $fetch_get_user_settlement['parent_id'];
		
		$transaction_time = $account_date_time;
		if($parent_id != $opp_user_id){
			
			$user_amount = abs($user_amount);
			$transaction_points = $user_amount;
			
			$del_old_entry = $conn->query("delete from accounts where entry_type=8 and user_id=$user_id and account_date_time='$account_date_time'");
			$del_old_entry = $conn->query("delete from accounts where entry_type=8 and user_id=$opp_user_id and account_date_time='$account_date_time'");
			if($type == "Credit"){
				$insert_deposit_entry = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('$user_id','$parent_id','$account_description','0','$transaction_points','Credit','8','$transaction_time','1')");
				
				$insert_withdraw_entry = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('$parent_id','$user_id','$account_description','0','-$transaction_points','Debit','8','$transaction_time','1')");
			}
			else{
				
				$insert_deposit_entry = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('$user_id','$parent_id','$account_description','0','-$transaction_points','Debit','8','$transaction_time','1')");
				
				
				$insert_withdraw_entry = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('$parent_id','$user_id','$account_description','0','$transaction_points','Credit','8','$transaction_time','1')");
			
			}
			

			
			echo "$user_id - $opp_user_id - $parent_id - $account_date_time </br>";
		}
		
		
	}
}
echo 'success';
?>