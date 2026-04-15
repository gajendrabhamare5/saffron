<?php

$DB_host = "localhost";

$DB_user = "chetakex_bet";
$DB_pass = "Chetak@exch#bet"; 
$DB_name = "chetakex_test";

$conn = new MySQLi($DB_host, $DB_user, $DB_pass, $DB_name);

if ($conn->connect_errno) {

  die("ERROR : -> " . $conn->connect_error);
}
include('../../include/level_percentage.php');
/* error_reporting(E_ALL);
  ini_set("display_errors",1);
  ini_set("display_startup_errors",1); */
$user_id = 1;
$login_type = 5;
$entry_transaction_time = date("d-m-Y H:i:s");
$event_id = $_REQUEST['event_id'];
$event_id = 821378516;
$result_market_id = $_REQUEST['market_id'];
$result_market_id = 1;
$market_id = $_REQUEST['market_id'];
$market_id = 1;
$match_odds_result = $_REQUEST['match_odds_result'];
echo $match_odds_result = "Win";
$market_type = $_REQUEST['market_type'];
$market_type = 'BOOKMAKER_ODDS';
if($market_type == "bookmakersmall" || $market_type == "BOOKMAKERSMALL_ODDS"){
	$market_type_search = 'BOOKMAKERSMALL_ODDS';
	$market_type = 'BOOKMAKERSMALL_ODDS';
	$market_type_search = 'BOOKMAKERSMALL_ODDS';
}
else{
	$market_type_search = 'BOOKMAKER_ODDS';
	$market_type = 'BOOKMAKER_ODDS';
	$market_type_search = 'BOOKMAKER_ODDS';	
}

/* 	foreach($white_list_data as $white_list_url){
		$url2 = $white_list_url."controller-agent/ajaxfiles/bookmaker_result_apply_auto.php?event_id=$event_id&market_id=$market_id&market_type=$market_type&match_odds_result=$match_odds_result";
		$url2 = str_replace(" ","%20",$url2);
		file_get_contents($url2);
	} */
	
$ip_address = '';
if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
	$ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
}
else{
	$ip_address = gethostbyaddr($_SERVER['REMOTE_ADDR']);
}

$user_agent = $_SERVER['HTTP_USER_AGENT'];

if($match_odds_result == "Win"){
	$status = 2;
}
else{
	$status = 3;
}

/* $get_market_data = $conn->query("select * from bet_details where event_id='$event_id' and market_id=$result_market_id LIMIT 1");
$fetch_get_market_data = mysqli_fetch_assoc($get_market_data);
$runnerName = $fetch_get_market_data['market_name']; */
 echo "1=".date("Y-m-d H:i:s")."<br>";
$get_market_data = $conn->query("select market_name,group_concat(user_id) all_users from bet_details where event_id='$event_id' and market_type='$market_type_search' LIMIT 1");
$fetch_get_market_data = mysqli_fetch_assoc($get_market_data);
$runnerName = $fetch_get_market_data['market_name'];
$all_users = $fetch_get_market_data['all_users'];
echo "2=".date("Y-m-d H:i:s")."<br>";
$user_list=array();
$get_parent_ids = $conn->query("select Id,Email_ID,parentDL,parentMDL,parentSuperMDL,parentKingAdmin,my_percentage from user_master where Id in ($all_users)");
while($fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids)){
    $UserID = $fetch_parent_ids['Id'];
    /* $user_Email_ID = $fetch_parent_ids['Email_ID'];
    $parentDL = $fetch_parent_ids['parentDL'];
    $parentMDL = $fetch_parent_ids['parentMDL'];
    $parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];
    $parentKingAdmin = $fetch_parent_ids['parentKingAdmin'];
    $my_percentage = $fetch_parent_ids['my_percentage']; */
    $user_list[$UserID]=$fetch_parent_ids;
}
echo "3=".date("Y-m-d H:i:s")."<br>";
$datetime = date("Y-m-d H:i:s");
$query2 = "INSERT INTO `result_match_odds` (`eventId`,`selectionId`,`runnerName`,`status`,`datetime`,`added_by`,`ip_address`,`user_agent`,`is_bookmaker`) VALUES ($event_id,$result_market_id,'$runnerName',$status,'$datetime','$user_id','$ip_address','$user_agent','1')";
$insert = $conn->query($query2);
echo "4=".date("Y-m-d H:i:s")."<br>";
$conn->query("insert into result_summery_logs set `eventId`='$event_id',`selectionId`='$result_market_id',`runnerName`='$runnerName',`status`='$status',`datetime`='$datetime',`added_by`='$user_id',`ip_address`='$ip_address',`user_agent`='$user_agent',`is_bookmaker`='1'");
echo "5=".date("Y-m-d H:i:s")."<br>";
if ($match_odds_result == "Win") {
//    $bet_type = "Back";
    $bet_type_2 = "Lay";
    $result_status = 0;
    $result_status2 = 2;
} else if ($match_odds_result == "Loss") {
//    $bet_type = "Lay";
    $bet_type_2 = "Back";
    $result_status = 1;
    $result_status2 = 3;
} else {
    $conn->query("delete from unmatched_bet_details where event_id='$event_id'");
    $delete_bet_details = $conn->query("update bet_details set bet_status=2 where event_id='$event_id' and market_type='$market_type_search'");
    $delete_exposure = $conn->query("delete from exposure_details where event_id='$event_id' and market_type='$market_type_search'");
    $return_array = array(
        "status" => 'ok',
        "message" => 'Bet Cancelled',
    );
    echo json_encode($return_array);
    exit();
}

if($match_odds_result == 'Win'){
    echo "6=".date("Y-m-d H:i:s")."<br>";
    $get_win_bet_details_1 = $conn->query("select * from bet_details where event_id='$event_id' and market_type='$market_type_search' and bet_status=1");
    while ($fetch_get_win_bet_details_1 = mysqli_fetch_assoc($get_win_bet_details_1)) {
        
        //won entry
        $bet_id = $fetch_get_win_bet_details_1['bet_id'];
        $bet_odds = $fetch_get_win_bet_details_1['bet_odds'];
        $marketName = $fetch_get_win_bet_details_1['market_name'];
        $market_id = $fetch_get_win_bet_details_1['market_id'];
        $bet_type = $fetch_get_win_bet_details_1['bet_type'];
        if($result_market_id == $market_id){
            if($bet_type == 'Back'){
//                echo 'win_'.$marketName.'--'.$bet_type.'--'.$bet_id.'<br>';
echo "7=".date("Y-m-d H:i:s")."<br>";
                set_result($conn, $bet_id, "Win",$fetch_get_win_bet_details_1);
                echo "8=".date("Y-m-d H:i:s")."<br>";
            }  else {
                echo "9=".date("Y-m-d H:i:s")."<br>";
//                echo 'loss_'.$marketName.'--'.$bet_type.'--'.$bet_id.'<br>';
                set_result($conn, $bet_id, "Loss",$fetch_get_win_bet_details_1);
                echo "10=".date("Y-m-d H:i:s")."<br>";
            }
        }
        else{
            if($bet_type == 'Lay'){
                echo "11=".date("Y-m-d H:i:s")."<br>";
//                echo 'win_'.$marketName.'--'.$bet_type.'--'.$bet_id.'<br>';
                set_result($conn, $bet_id, "Win",$fetch_get_win_bet_details_1);
                echo "12=".date("Y-m-d H:i:s")."<br>";
            }  else {
//                echo 'loss_'.$marketName.'--'.$bet_type.'--'.$bet_id.'<br>';
echo "13=".date("Y-m-d H:i:s")."<br>";
                set_result($conn, $bet_id, "Loss",$fetch_get_win_bet_details_1);
                echo "13=".date("Y-m-d H:i:s")."<br>";
            }            
        }
    }
    /* foreach($user_id_array as $key=>$value){
        $bet_user_id_new=$value;
        $eventId_new=$event_id;
        $market_type_new=$market_type_search;
        $delete_exposure = $conn->query("delete from exposure_details where event_id='$eventId_new' and user_id=$bet_user_id_new and market_type='$market_type_new'");
    } */
    $return_array = array(
        "status" => "ok",
        "message" => "Result Done",
    );
    echo json_encode($return_array);
}
else if($match_odds_result == 'Loss'){

    $user_id_array=array();
    
    $get_win_bet_details_1 = $conn->query("select * from bet_details where event_id='$event_id' and market_type='$market_type_search' and bet_status=1");
    while ($fetch_get_win_bet_details_1 = mysqli_fetch_assoc($get_win_bet_details_1)) {
        
        //won entry
        $bet_id = $fetch_get_win_bet_details_1['bet_id'];
        $bet_odds = $fetch_get_win_bet_details_1['bet_odds'];
        $marketName = $fetch_get_win_bet_details_1['market_name'];
        $market_id = $fetch_get_win_bet_details_1['market_id'];
        $bet_type = $fetch_get_win_bet_details_1['bet_type'];
        if($result_market_id == $market_id){
            if($bet_type == 'Back'){ 
//                echo 'loss_'.$marketName.'--'.$bet_type.'--'.$bet_id.'<br>';
                set_result($conn, $bet_id, "Loss",$fetch_get_win_bet_details_1);

            }  else {
//                echo 'win_'.$marketName.'--'.$bet_type.'--'.$bet_id.'<br>';
                set_result($conn, $bet_id, "Win",$fetch_get_win_bet_details_1);
            }
        }

    }
      /* foreach($user_id_array as $key=>$value){
        $bet_user_id_new=$value;
        $eventId_new=$event_id;
        $market_type_new=$market_type_search;
        $delete_exposure = $conn->query("delete from exposure_details where event_id='$eventId_new' and user_id=$bet_user_id_new and market_type='$market_type_new'");
    } */
    $return_array = array(
        "status" => "ok",
        "message" => "Result Done",
    );
    echo json_encode($return_array);
}

function set_result($conn, $bet_id, $result_status,$fetch_bet_details) {
    global $user_list;
   /*  $get_bet_details = $conn->query("select * from bet_details where bet_id=$bet_id and bet_status=1");
    $fetch_bet_details = mysqli_fetch_assoc($get_bet_details); */
    $bet_user_id = $fetch_bet_details['user_id'];
    $event_name = $fetch_bet_details['event_name'];
    $market_name = $fetch_bet_details['market_name'];
    $market_type = $fetch_bet_details['market_type'];
    $bet_type = $fetch_bet_details['bet_type'];
    $bet_runs = $fetch_bet_details['bet_runs'];
    $bet_odds = $fetch_bet_details['bet_odds'];
    $bet_stack = $fetch_bet_details['bet_stack'];
    $bet_margin_used = $fetch_bet_details['bet_margin_used'];
    $bet_win_amount = $fetch_bet_details['bet_win_amount'];
    $transaction_time = date("Y-m-d H:i:s");
    $entry_transaction_time = date("d-m-Y H:i:s");

    /* $get_parent_ids = $conn->query("select * from user_login_master where UserID=$bet_user_id");
    $fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
    $user_Email_ID = $fetch_parent_ids['Email_ID'];
    $parentDL = $fetch_parent_ids['parentDL'];
    $parentMDL = $fetch_parent_ids['parentMDL'];
    $parentSuperMDL = $fetch_parent_ids['parentSuperMDL']; */
    $eventId = $fetch_bet_details['event_id'];
    $marketId = $fetch_bet_details['market_id'];


    if ($result_status == 'Win') {
        $actual_win_amount = $bet_win_amount + $bet_margin_used;
        $actual_win_amount2 = $bet_win_amount;
        $user_amount = $actual_win_amount2;
        
        $smdl_amount = -$actual_win_amount2;
    } else if ($result_status == 'Loss') {
        $actual_loss_amount = $bet_margin_used;
        $user_amount = -$actual_loss_amount;
        
        $smdl_amount = $actual_loss_amount;
    } else {

        $delete_bet_details = $conn->query("update bet_details set bet_status=2 where user_id=$bet_user_id and bet_id=$bet_id");
        $delete_bet_details = $conn->query("delete from accounts where user_id=$bet_user_id and bet_id=$bet_id and game_type=0");
        $delete_bet_details = $conn->query("delete from accounts_temp where user_id=$bet_user_id and bet_id=$bet_id and game_type=0");
        $delete_exposure = $conn->query("delete from exposure_details where event_id='$eventId' and user_id=$bet_user_id and market_type='$market_type'");
        $return_array = array(
            "status" => 'ok',
            "message" => 'Bet Cancelled',
        );
        echo json_encode($return_array);
        exit();
    }

    $update_bet_status = $conn->query("update bet_details set bet_status=0,bet_result='$user_amount' where bet_id=$bet_id and bet_status=1");

    $delete_exposure = $conn->query("delete from exposure_details where event_id='$eventId' and user_id=$bet_user_id and market_type='$market_type'");
    //adjust account 
    if ($result_status == 'Win') {
		$transaction_id = 'sports-'.$bet_id.'-'.$bet_user_id;
        $account_description = "#Win BET ID $bet_id - $event_name -$market_name at $entry_transaction_time";
		if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $actual_win_amount2 != 0)){
			$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$actual_win_amount2','Credit','4','$transaction_time','1','$transaction_id')");
		}
		if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $actual_win_amount2 != 0))){
			$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$actual_win_amount2','Credit','4','$transaction_time','1','$transaction_id')");
		}

        $level_pers = get_level_per_result_new($conn, $bet_user_id,$user_list);
        foreach ($level_pers as $debit_user_id => $level_per) {

            $debit_amt = 0 - (($actual_win_amount2 / 100) * $level_per);
            $transaction_id = 'sports-'.$bet_id.'-'.$debit_user_id;

            $account_descriptionSMDL = "#Loss BET ID $bet_id - $event_name -$market_name at $entry_transaction_time";
			if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $debit_amt != 0)){
				$insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$debit_amt','Debit','7','$transaction_time','1','$transaction_id')");
			}
			if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $debit_amt != 0))){
				$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$debit_amt','Debit','7','$transaction_time','1','$transaction_id')");
			}
        }
    } else if ($result_status == 'Loss') {
    	$transaction_id = 'sports-'.$bet_id.'-'.$bet_user_id;
        $account_description = "#Loss BET ID $bet_id - $event_name -$market_name at $entry_transaction_time";
		if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $user_amount != 0)){
			$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$user_amount','Debit','7','$transaction_time','1','$transaction_id')");
		}
		if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $user_amount != 0))){
			$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$user_amount','Debit','7','$transaction_time','1','$transaction_id')");
		}

        $level_pers =  get_level_per_result_new($conn, $bet_user_id,$user_list);
        foreach ($level_pers as $cradit_user_id => $level_per) {

            $cradit_amt = ($bet_margin_used / 100) * $level_per;
            $transaction_id = 'sports-'.$bet_id.'-'.$cradit_user_id;

            $account_descriptionSMDL = "#Win BET ID $bet_id - $event_name -$market_name at $entry_transaction_time"; 
			if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $cradit_amt != 0)){
				$insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$cradit_amt','Credit','4','$transaction_time','1','$transaction_id')");
			} 
			if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $cradit_amt != 0))){ 
				$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$cradit_amt','Credit','4','$transaction_time','1','$transaction_id')");
			}
        }
    }
    return true;
}
