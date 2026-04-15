<?php
	
	include "../include/conn.php";
	
	error_reporting(0);
	
	$login_user_id = $_REQUEST['bid']; 
	$user_id = $login_user_id;
	$login_user_type = $_REQUEST['btype'];
	$user_type = $login_user_type;
	
	$event_id = $_REQUEST['event_id'];
	
	$market_id = $_REQUEST['market_id'];
	
	
	
	$return_errror = "";
	if($event_id == ""){
		$return_errror = "Invalid Event Name";
	}else if($market_id == ""){
		$return_errror = "Invalid Market Name";
	}

	if($return_errror != ""){
		$return = array(
			"status"=>'error',
			"message"=>$return_errror,
			);		
		echo json_encode($return);
		exit();
	}
	else{
		
		$user_data = array();
		$user_data['Id'] = $user_id;
		
		if($user_type == 5){
			$get_all_fancy_stake = $conn->query("select * from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS'");

		}
		else{
			$get_all_fancy_stake = $conn->query("select * from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS'");
		}
		
		$stack_rate_array = array();
		while($fetch_get_all_fancy_stake = mysqli_fetch_assoc($get_all_fancy_stake)){
			$stack_rate_array[] = $fetch_get_all_fancy_stake['bet_runs'];
		}
		$stack_rate_unique_array =  array_unique($stack_rate_array);
		sort($stack_rate_unique_array);
		
		$last_run_value = 0;

		
		$book_list = array();
		if($stack_rate_unique_array != null){
			$min_run = $stack_rate_unique_array[0];
			$max_run = max($stack_rate_unique_array);
			$i=0;
			$first_label = $min_run -1;
			
			$echo_first_label_runs = "0 - ".$first_label;
			
			if($user_type == 5){
				$get_lower_yes_total = $conn->query("select b.bet_win_amount as total_win_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs < $first_label and b.bet_type='Yes'");
			}
			else{
				$get_lower_yes_total = $conn->query("select b.bet_win_amount as total_win_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id)  and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs < $first_label and b.bet_type='Yes'");
			}

			$total_win_yes_amount_user = 0;
			while($fetch_get_lower_yes_total = mysqli_fetch_assoc($get_lower_yes_total)){
				$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];
				$bet_user_id = $fetch_get_lower_yes_total['user_id'];
				
				
					$betting_data = array();
					$get_parent_data = $conn->query("select * from user_login_master where UserId=$bet_user_id");
					$fetch_get_parent_data = mysqli_fetch_assoc($get_parent_data);
				    $betting_data['parentDL'] = $fetch_get_parent_data['parentDL'];
					$betting_data['parentMDL'] = $fetch_get_parent_data['parentMDL'];
					$betting_data['parentSuperMDL'] = $fetch_get_parent_data['parentSuperMDL'];
					$betting_data['parentKingAdmin'] = $fetch_get_parent_data['parentKingAdmin'];
				
					$self_percentage = get_my_partnership($conn,$user_data,$betting_data,'my');
				
				$total_self_win_amount_yes =  ($win_amount_yes * $self_percentage) / 100;
				$total_win_yes_amount_user = $total_win_yes_amount_user + $total_self_win_amount_yes;
			}





			if($user_type == 5){
				$get_lower_no_total = $conn->query("select b.bet_win_amount as win_amount_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='No'");

			}
			else{
				$get_lower_no_total = $conn->query("select b.bet_win_amount as win_amount_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='No'");

			}
			

			$total_win_no_amount_user = 0;
			while($fetch_get_lower_no_total = mysqli_fetch_assoc($get_lower_no_total)){
				
				$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];
				
				$bet_user_id = $fetch_get_lower_no_total['user_id'];
				
				
					$betting_data = array();
					$get_parent_data = $conn->query("select * from user_login_master where UserId=$bet_user_id");
					$fetch_get_parent_data = mysqli_fetch_assoc($get_parent_data);
				    $betting_data['parentDL'] = $fetch_get_parent_data['parentDL'];
					$betting_data['parentMDL'] = $fetch_get_parent_data['parentMDL'];
					$betting_data['parentSuperMDL'] = $fetch_get_parent_data['parentSuperMDL'];
					$betting_data['parentKingAdmin'] = $fetch_get_parent_data['parentKingAdmin'];
				
					$self_percentage = get_my_partnership($conn,$user_data,$betting_data,'my');
				
				$total_self_win_amount_no =  ($win_amount_no * $self_percentage) / 100;
				$total_win_no_amount_user = $total_win_no_amount_user + $total_self_win_amount_no;
				
			}



			

			if($user_type == 5){
				$get_higher_yes_total = $conn->query("select b.bet_margin_used as total_loss_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='Yes'");

			}
			else{
				$get_higher_yes_total = $conn->query("select b.bet_margin_used as total_loss_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id)  and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='Yes'");
			}

			

			$total_loss_amount_yes_user = 0;
			while($fetch_get_higher_yes_total = mysqli_fetch_assoc($get_higher_yes_total)){
				$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];
				$bet_user_id = $fetch_get_higher_yes_total['user_id'];
				
				
					$betting_data = array();
					$get_parent_data = $conn->query("select * from user_login_master where UserId=$bet_user_id");
					$fetch_get_parent_data = mysqli_fetch_assoc($get_parent_data);
				    $betting_data['parentDL'] = $fetch_get_parent_data['parentDL'];
					$betting_data['parentMDL'] = $fetch_get_parent_data['parentMDL'];
					$betting_data['parentSuperMDL'] = $fetch_get_parent_data['parentSuperMDL'];
					$betting_data['parentKingAdmin'] = $fetch_get_parent_data['parentKingAdmin'];
				
					$self_percentage = get_my_partnership($conn,$user_data,$betting_data,'my');
				
				$total_self_loss_amount_yes =  ($loss_amount_yes * $self_percentage) / 100;
				
				$total_loss_amount_yes_user = $total_loss_amount_yes_user + $total_self_loss_amount_yes;
			}





			if($user_type == 5){
				$get_higher_no_total = $conn->query("select b.bet_margin_used as total_loss_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs < $first_label and b.bet_type='No'");

			}
			else{
				$get_higher_no_total = $conn->query("select b.bet_margin_used as total_loss_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs < $first_label and b.bet_type='No'");
			}
			
			$total_loss_amount_no_user = 0;
			while($fetch_get_higher_no_total = mysqli_fetch_assoc($get_higher_no_total)){
				$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];
				
				$bet_user_id = $fetch_get_higher_no_total['user_id'];
				
				
					$betting_data = array();
					$get_parent_data = $conn->query("select * from user_login_master where UserId=$bet_user_id");
					$fetch_get_parent_data = mysqli_fetch_assoc($get_parent_data);
				    $betting_data['parentDL'] = $fetch_get_parent_data['parentDL'];
					$betting_data['parentMDL'] = $fetch_get_parent_data['parentMDL'];
					$betting_data['parentSuperMDL'] = $fetch_get_parent_data['parentSuperMDL'];
					$betting_data['parentKingAdmin'] = $fetch_get_parent_data['parentKingAdmin'];
				
					$self_percentage = get_my_partnership($conn,$user_data,$betting_data,'my');
				
				$total_self_loss_amount_no =  ($loss_amount_no * $self_percentage) / 100;
				
				$total_loss_amount_no_user = $total_loss_amount_no_user + $total_self_loss_amount_no;
			}



			



			$total_win = $total_win_yes_amount_user + $total_win_no_amount_user;



			$total_loss = $total_loss_amount_yes_user + $total_loss_amount_no_user;



			$exposure = $total_win - $total_loss;



			$exposure =  $exposure * (-1);

			$book_details = array(
									"runs"=>$echo_first_label_runs,
									"exposure"=>$exposure,
									);
			
			$book_list[] = $book_details;
			
			foreach($stack_rate_unique_array as $runs){



		if($runs != $max_run){



			$next_value  =$stack_rate_unique_array[$i + 1];



			$new_value = $next_value - 1;



			if($runs == $new_value){



				$new_run_title = "$runs";



				//$new_value = $runs;



			}else{



				$new_run_title = "$runs - $new_value";



			}



		$first_label = $new_value;


		if($user_type == 5){
			$get_lower_yes_total = $conn->query("select b.bet_win_amount as total_win_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='Yes'");

		}
		else{
			$get_lower_yes_total = $conn->query("select b.bet_win_amount as total_win_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='Yes'");

		}
		


		$total_win_yes_amount_user = 0;
			while($fetch_get_lower_yes_total = mysqli_fetch_assoc($get_lower_yes_total)){
				$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];
				$bet_user_id = $fetch_get_lower_yes_total['user_id'];
				
				
					$betting_data = array();
					$get_parent_data = $conn->query("select * from user_login_master where UserId=$bet_user_id");
					$fetch_get_parent_data = mysqli_fetch_assoc($get_parent_data);
				    $betting_data['parentDL'] = $fetch_get_parent_data['parentDL'];
					$betting_data['parentMDL'] = $fetch_get_parent_data['parentMDL'];
					$betting_data['parentSuperMDL'] = $fetch_get_parent_data['parentSuperMDL'];
					$betting_data['parentKingAdmin'] = $fetch_get_parent_data['parentKingAdmin'];
				
					$self_percentage = get_my_partnership($conn,$user_data,$betting_data,'my');
				
				$total_self_win_amount_yes =  ($win_amount_yes * $self_percentage) / 100;
				$total_win_yes_amount_user = $total_win_yes_amount_user + $total_self_win_amount_yes;
			}


		if($user_type == 5){
			$get_lower_no_total = $conn->query("select bet_win_amount as win_amount_no,user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='No'");

		}
		else{
			$get_lower_no_total = $conn->query("select bet_win_amount as win_amount_no,user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='No'");

		}
		


		$total_win_no_amount_user = 0;
			while($fetch_get_lower_no_total = mysqli_fetch_assoc($get_lower_no_total)){
				
				$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];
				
				$bet_user_id = $fetch_get_lower_no_total['user_id'];
				
				
					$betting_data = array();
					$get_parent_data = $conn->query("select * from user_login_master where UserId=$bet_user_id");
					$fetch_get_parent_data = mysqli_fetch_assoc($get_parent_data);
				    $betting_data['parentDL'] = $fetch_get_parent_data['parentDL'];
					$betting_data['parentMDL'] = $fetch_get_parent_data['parentMDL'];
					$betting_data['parentSuperMDL'] = $fetch_get_parent_data['parentSuperMDL'];
					$betting_data['parentKingAdmin'] = $fetch_get_parent_data['parentKingAdmin'];
				
					$self_percentage = get_my_partnership($conn,$user_data,$betting_data,'my');
				
				$total_self_win_amount_no =  ($win_amount_no * $self_percentage) / 100;
				$total_win_no_amount_user = $total_win_no_amount_user + $total_self_win_amount_no;
				
			}


		if($user_type == 5){
			$get_higher_yes_total = $conn->query("select b.bet_margin_used as total_loss_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where  b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='Yes'");

		}
		else{
			$get_higher_yes_total = $conn->query("select b.bet_margin_used as total_loss_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='Yes'");

		}
		


		$total_loss_amount_yes_user = 0;
			while($fetch_get_higher_yes_total = mysqli_fetch_assoc($get_higher_yes_total)){
				$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];
				$bet_user_id = $fetch_get_higher_yes_total['user_id'];
				
				
					$betting_data = array();
					$get_parent_data = $conn->query("select * from user_login_master where UserId=$bet_user_id");
					$fetch_get_parent_data = mysqli_fetch_assoc($get_parent_data);
				    $betting_data['parentDL'] = $fetch_get_parent_data['parentDL'];
					$betting_data['parentMDL'] = $fetch_get_parent_data['parentMDL'];
					$betting_data['parentSuperMDL'] = $fetch_get_parent_data['parentSuperMDL'];
					$betting_data['parentKingAdmin'] = $fetch_get_parent_data['parentKingAdmin'];
				
					$self_percentage = get_my_partnership($conn,$user_data,$betting_data,'my');
				
				$total_self_loss_amount_yes =  ($loss_amount_yes * $self_percentage) / 100;
				
				$total_loss_amount_yes_user = $total_loss_amount_yes_user + $total_self_loss_amount_yes;
			}


		if($user_type == 5){
			$get_higher_no_total = $conn->query("select b.bet_margin_used as total_loss_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where  b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='No'");

		}
		else{
			$get_higher_no_total = $conn->query("select b.bet_margin_used as total_loss_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='No'");

		}
		


		$total_loss_amount_no_user = 0;
			while($fetch_get_higher_no_total = mysqli_fetch_assoc($get_higher_no_total)){
				$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];
				
				$bet_user_id = $fetch_get_higher_no_total['user_id'];
				
				
					$betting_data = array();
					$get_parent_data = $conn->query("select * from user_login_master where UserId=$bet_user_id");
					$fetch_get_parent_data = mysqli_fetch_assoc($get_parent_data);
				    $betting_data['parentDL'] = $fetch_get_parent_data['parentDL'];
					$betting_data['parentMDL'] = $fetch_get_parent_data['parentMDL'];
					$betting_data['parentSuperMDL'] = $fetch_get_parent_data['parentSuperMDL'];
					$betting_data['parentKingAdmin'] = $fetch_get_parent_data['parentKingAdmin'];
				
					$self_percentage = get_my_partnership($conn,$user_data,$betting_data,'my');
				
				$total_self_loss_amount_no =  ($loss_amount_no * $self_percentage) / 100;
				
				$total_loss_amount_no_user = $total_loss_amount_no_user + $total_self_loss_amount_no;
			}



		$total_win = $total_win_yes_amount_user + $total_win_no_amount_user;



			$total_loss = $total_loss_amount_yes_user + $total_loss_amount_no_user;



		$exposure = $total_win - $total_loss;
		$exposure = $exposure * (-1);
				$book_details = array(
											"runs"=>$new_run_title,
											"exposure"=>$exposure,
											);
					
					$book_list[] = $book_details;
					$i++;

		}
			}
			
		$first_label = $max_run;
		$echo_first_label_runs =  $first_label." + ";
		
		$search = $first_label - 1;

		
		if($user_type == 5){
			$get_lower_yes_total = $conn->query("select b.bet_win_amount as total_win_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='Yes'");
		}
		else{
			$get_lower_yes_total = $conn->query("select b.bet_win_amount as total_win_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='Yes'");
		}
		
		


		$total_win_yes_amount_user = 0;
			while($fetch_get_lower_yes_total = mysqli_fetch_assoc($get_lower_yes_total)){
				$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];
				$bet_user_id = $fetch_get_lower_yes_total['user_id'];
				
				
					$betting_data = array();
					$get_parent_data = $conn->query("select * from user_login_master where UserId=$bet_user_id");
					$fetch_get_parent_data = mysqli_fetch_assoc($get_parent_data);
				    $betting_data['parentDL'] = $fetch_get_parent_data['parentDL'];
					$betting_data['parentMDL'] = $fetch_get_parent_data['parentMDL'];
					$betting_data['parentSuperMDL'] = $fetch_get_parent_data['parentSuperMDL'];
					$betting_data['parentKingAdmin'] = $fetch_get_parent_data['parentKingAdmin'];
				
					$self_percentage = get_my_partnership($conn,$user_data,$betting_data,'my');
				
				$total_self_win_amount_yes =  ($win_amount_yes * $self_percentage) / 100;
				$total_win_yes_amount_user = $total_win_yes_amount_user + $total_self_win_amount_yes;
			}

			
		if($user_type == 5){
			$get_lower_no_total = $conn->query("select b.bet_win_amount as win_amount_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='No'");

		}
		else{
			$get_lower_no_total = $conn->query("select b.bet_win_amount as win_amount_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='No'");

		}
		


			$total_win_no_amount_user = 0;
			while($fetch_get_lower_no_total = mysqli_fetch_assoc($get_lower_no_total)){
				
				$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];
				
				$bet_user_id = $fetch_get_lower_no_total['user_id'];
				
					$betting_data = array();
					$get_parent_data = $conn->query("select * from user_login_master where UserId=$bet_user_id");
					$fetch_get_parent_data = mysqli_fetch_assoc($get_parent_data);
				    $betting_data['parentDL'] = $fetch_get_parent_data['parentDL'];
					$betting_data['parentMDL'] = $fetch_get_parent_data['parentMDL'];
					$betting_data['parentSuperMDL'] = $fetch_get_parent_data['parentSuperMDL'];
					$betting_data['parentKingAdmin'] = $fetch_get_parent_data['parentKingAdmin'];
				
					$self_percentage = get_my_partnership($conn,$user_data,$betting_data,'my');
				
				$total_self_win_amount_no =  ($win_amount_no * $self_percentage) / 100;
				$total_win_no_amount_user = $total_win_no_amount_user + $total_self_win_amount_no;
				
			}
		

		if($user_type == 5){
			$get_higher_yes_total = $conn->query("select b.bet_margin_used as total_loss_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='Yes'");

		}
		else{
			$get_higher_yes_total = $conn->query("select b.bet_margin_used as total_loss_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='Yes'");

		}

		


		$total_loss_amount_yes_user = 0;
			while($fetch_get_higher_yes_total = mysqli_fetch_assoc($get_higher_yes_total)){
				$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];
				$bet_user_id = $fetch_get_higher_yes_total['user_id'];
				
				
					$betting_data = array();
					$get_parent_data = $conn->query("select * from user_login_master where UserId=$bet_user_id");
					$fetch_get_parent_data = mysqli_fetch_assoc($get_parent_data);
				    $betting_data['parentDL'] = $fetch_get_parent_data['parentDL'];
					$betting_data['parentMDL'] = $fetch_get_parent_data['parentMDL'];
					$betting_data['parentSuperMDL'] = $fetch_get_parent_data['parentSuperMDL'];
					$betting_data['parentKingAdmin'] = $fetch_get_parent_data['parentKingAdmin'];
				
					$self_percentage = get_my_partnership($conn,$user_data,$betting_data,'my');
				
				$total_self_loss_amount_yes =  ($loss_amount_yes * $self_percentage) / 100;
				
				$total_loss_amount_yes_user = $total_loss_amount_yes_user + $total_self_loss_amount_yes;
			}

	
		if($user_type == 5){
			$get_higher_no_total = $conn->query("select b.bet_margin_used as total_loss_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='No'");

		}
		else{
			$get_higher_no_total = $conn->query("select b.bet_margin_used as total_loss_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='No'");

		}

		


		$total_loss_amount_no_user = 0;
			while($fetch_get_higher_no_total = mysqli_fetch_assoc($get_higher_no_total)){
				$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];
				
				$bet_user_id = $fetch_get_higher_no_total['user_id'];
				
				
					$betting_data = array();
					$get_parent_data = $conn->query("select * from user_login_master where UserId=$bet_user_id");
					$fetch_get_parent_data = mysqli_fetch_assoc($get_parent_data);
				    $betting_data['parentDL'] = $fetch_get_parent_data['parentDL'];
					$betting_data['parentMDL'] = $fetch_get_parent_data['parentMDL'];
					$betting_data['parentSuperMDL'] = $fetch_get_parent_data['parentSuperMDL'];
					$betting_data['parentKingAdmin'] = $fetch_get_parent_data['parentKingAdmin'];
				
					$self_percentage = get_my_partnership($conn,$user_data,$betting_data,'my');
				
				$total_self_loss_amount_no =  ($loss_amount_no * $self_percentage) / 100;
				
				$total_loss_amount_no_user = $total_loss_amount_no_user + $total_self_loss_amount_no;
			}



			$total_win = $total_win_yes_amount_user + $total_win_no_amount_user;



			$total_loss = $total_loss_amount_yes_user + $total_loss_amount_no_user;



		$exposure = $total_win - $total_loss;



		$exposure = $exposure * (-1);
		
		$book_details = array(
											"runs"=>$echo_first_label_runs,
											"exposure"=>$exposure,
											);
					
					$book_list[] = $book_details;
		
		}
		
		$return = array(
						"status"=>"ok",
						"data"=>$book_list,
						);
		echo json_encode($return);
	}
	
	
	 function get_my_partnership($conn,$user_data = array(), $betting_data = array(),$return_type = 'my') {

        $parentDL = $betting_data['parentDL'];
        $parentMDL = $betting_data['parentMDL'];
        $parentSuperMDL = $betting_data['parentSuperMDL'];
        $parentSuperKingAdmin = $betting_data['parentKingAdmin'];

        $level_per_arr = array();
        $dl_per = $mdl_per = $smdl_per = $whte_per = 0;
        if ($parentDL > 0) {
            $res_dl_data = $conn->query("select my_percentage from user_master where Id=$parentDL");
            $dl_data = mysqli_fetch_assoc($res_dl_data);
            
                $dl_per = $dl_data['my_percentage'];
                if ($dl_per <= 100 && $dl_per > 0) {
                    $level_per_arr[$parentDL] = $dl_per;
                }
            
        }
        if ($parentMDL > 0) {
            $res_mdl_data = $conn->query("select my_percentage from user_master where Id=$parentMDL");
            $mdl_data = mysqli_fetch_assoc($res_mdl_data);
            
                $mdl_per = $mdl_data['my_percentage'];

                if ($mdl_per <= 100 && $mdl_per > 0 && !isset($level_per_arr[$parentMDL])) {
                    $level_per_arr[$parentMDL] = $mdl_per - $dl_per;
                }
            
        }
        
        if ($parentSuperMDL > 0) {
            $res_smdl_data = $conn->query("select my_percentage from user_master where Id=$parentSuperMDL");
            $smdl_data = mysqli_fetch_assoc($res_smdl_data);
            
                $smdl_per = $smdl_data['my_percentage'];
                if ($smdl_per <= 100 && $smdl_per > 0 && !isset($level_per_arr[$parentSuperMDL])) {
                    $level_per_arr[$parentSuperMDL] = $smdl_per - $mdl_per;
                }
            
        }
		if ($parentSuperKingAdmin > 0) {
            $res_king_admin_data = $conn->query("select my_percentage from user_master where Id=$parentSuperKingAdmin");
            $king_admin_data = mysqli_fetch_assoc($res_king_admin_data);
            
                $king_admin_per = $king_admin_data['my_percentage'];
                if ($king_admin_per <= 100 && $king_admin_per > 0 && !isset($level_per_arr[$parentSuperKingAdmin])) {
                    $level_per_arr[$parentSuperKingAdmin] = $king_admin_per - $smdl_per;
                }
            
        }
		$cn_per = 100;
		if($king_admin_per >= 0){
			$level_per_arr[1] = $cn_per - $king_admin_per;
		}
		else{
			$level_per_arr[1] = $cn_per - $mdl_per;
		}
		/* $cn_per1 = 100;
		$level_per_arr[13] = $cn_per1 - $cn_per; */
        if($return_type == 'all'){
            return $level_per_arr;
        }
        else{
            return $level_per_arr[$user_data['Id']];
        }
    }
?>