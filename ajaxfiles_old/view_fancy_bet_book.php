<?php

include('../include/conn.php');

include('../session.php');

$user_id = $_SESSION['CLIENT_LOGIN_ID'];

if($_REQUEST['event_id']){

	$event_id = $_REQUEST['event_id'];

}else{

	echo "<h1>Error:</h1>";

	exit();

}

if($_REQUEST['market_id']){

	$market_id = $_REQUEST['market_id'];

}else{

	echo "<h1>Error:</h1>";

	exit();

}

	$get_all_fancy_stake = $conn->query("select * from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS'");

	$stack_rate_array = array();

	while($fetch_get_all_fancy_stake = mysqli_fetch_assoc($get_all_fancy_stake)){

		$stack_rate_array[] = $fetch_get_all_fancy_stake['bet_runs'];

	}

	$stack_rate_unique_array =  array_unique($stack_rate_array);

	sort($stack_rate_unique_array);

?>
  

                <table id="table" class="table table-bordered">

                    <tr>

                        <th width="50%" class="align-C" style="text-align:center;">Runs</th>

                        <th width="50%" class="border-l" style="text-align:right";>Amount</th>

                    </tr>

                    <?php

	$last_run_value = 0;

	if($stack_rate_unique_array != null){

	$min_run = $stack_rate_unique_array[0];

	$max_run = max($stack_rate_unique_array);

	$i=0;

	?>
	
	<?php

	$first_label = $min_run -1;
	
	$get_lower_yes_total = $conn->query("select SUM(bet_win_amount) as total_win_yes from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs < $first_label and bet_type='Yes'");

		$fetch_get_lower_yes_total = mysqli_fetch_assoc($get_lower_yes_total);

		$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];

		$get_lower_no_total = $conn->query("select SUM(bet_win_amount) as win_amount_no from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='No'");

		$fetch_get_lower_no_total = mysqli_fetch_assoc($get_lower_no_total);

		$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];

		$get_higher_yes_total = $conn->query("select SUM(bet_margin_used) as total_loss_yes from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='Yes'");

		$fetch_get_higher_yes_total = mysqli_fetch_assoc($get_higher_yes_total);

		$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];

		$get_higher_no_total = $conn->query("select SUM(bet_margin_used) as total_loss_no from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs < $first_label and bet_type='No'");

		$fetch_get_higher_no_total = mysqli_fetch_assoc($get_higher_no_total);

		$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];

		$total_win = $win_amount_yes + $win_amount_no;

		$total_loss = $loss_amount_yes + $loss_amount_no;

		$exposure = $total_win - $total_loss;
		
		if($exposure == 0){
			$background_color = "";
		}
		else if($exposure > 0){
			$background_color = "background-color:#72bbef";
		}
		else{
			$background_color = "background-color:#faa9ba";
		}
		
	?>

                        <tr id="trTemp" style="<?php echo $background_color; ?>">

                            <td id="runs" class="align-C" style="text-align:center;">
                                <?php 


		echo "0 - ".$first_label; ?>

                            </td>

                            <td id="exposure" class="" style="text-align:right;">

                                <?php

		

		echo $exposure;

		?>

                            </td>

                        </tr>

                        <?php

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

		$get_lower_yes_total = $conn->query("select SUM(bet_win_amount) as total_win_yes from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs <= $first_label and bet_type='Yes'");

		$fetch_get_lower_yes_total = mysqli_fetch_assoc($get_lower_yes_total);

		$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];

		$get_lower_no_total = $conn->query("select SUM(bet_win_amount) as win_amount_no from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='No'");

		$fetch_get_lower_no_total = mysqli_fetch_assoc($get_lower_no_total);

		$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];

		$get_higher_yes_total = $conn->query("select SUM(bet_margin_used) as total_loss_yes from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='Yes'");

		$fetch_get_higher_yes_total = mysqli_fetch_assoc($get_higher_yes_total);

		$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];

		$get_higher_no_total = $conn->query("select SUM(bet_margin_used) as total_loss_no from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs <= $first_label and bet_type='No'");

		$fetch_get_higher_no_total = mysqli_fetch_assoc($get_higher_no_total);

		$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];

		$total_win = $win_amount_yes + $win_amount_no;

		$total_loss = $loss_amount_yes + $loss_amount_no;

		$exposure = $total_win - $total_loss;
		if($exposure == 0){
			$background_color = "";
		}
		else if($exposure > 0){
			$background_color = "background-color:#72bbef";
		}
		else{
			$background_color = "background-color:#faa9ba";
		}
		
				?>

                            <tr id="trTemp" style="<?php echo $background_color; ?>">

                                <td id="runs" class="align-C" style="text-align:center;">
                                    <?php echo $new_run_title; ?>
                                </td>

                                <td id="exposure" class="" style="text-align:right;">
                                    <?php echo $exposure; ?>
                                </td>

                            </tr>

                            <?php

		$i++;

		}

			}

	?>

	
	<?php
	
	$first_label = $max_run;
	
	$search = $first_label - 1;
		$get_lower_yes_total = $conn->query("select SUM(bet_win_amount) as total_win_yes from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs <= $first_label and bet_type='Yes'");

		$fetch_get_lower_yes_total = mysqli_fetch_assoc($get_lower_yes_total);

		$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];

		$get_lower_no_total = $conn->query("select SUM(bet_win_amount) as win_amount_no from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='No'");

		$fetch_get_lower_no_total = mysqli_fetch_assoc($get_lower_no_total);

		$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];

		$get_higher_yes_total = $conn->query("select SUM(bet_margin_used) as total_loss_yes from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='Yes'");

		$fetch_get_higher_yes_total = mysqli_fetch_assoc($get_higher_yes_total);

		$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];

		$get_higher_no_total = $conn->query("select SUM(bet_margin_used) as total_loss_no from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs <= $first_label and bet_type='No'");

		$fetch_get_higher_no_total = mysqli_fetch_assoc($get_higher_no_total);

		$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];

		$total_win = $win_amount_yes + $win_amount_no;

		$total_loss = $loss_amount_yes + $loss_amount_no;

		$exposure = $total_win - $total_loss;
		
		if($exposure == 0){
			$background_color = "";
		}
		else if($exposure > 0){
			$background_color = "background-color:#72bbef";
		}
		else{
			$background_color = "background-color:#faa9ba";
		}
		
	?>
                                <tr id="trTemp" style="<?php echo $background_color; ?>">

                                    <td id="runs" class="align-C" style="text-align:center;">
                                        <?php 

			

		echo $first_label." + "; ?>

                                    </td>

                                    <td id="exposure" class="" style="text-align:right;">

                                        <?php
		

		echo $exposure;

		?>

                                    </td>

                                </tr>

                                <?php

	}else{

	?>

                                    <tr id="trTemp">

                                        <td id="runs" class="align-C" colspan="2">No Place bet on this market.</td>

                                    </tr>

                                    <?php

	}

		?>

                </table>