<?php
include 'include/conn.php';
include('include/level_percentage.php');
include('include/user_balance.php');

header('Content-Type: application/json; charset=utf-8');
/* error_reporting(E_ALL);
ini_set("display_errors",1);
ini_set("display_errors",1); */
$passkey = $_SERVER['HTTP_PASS_KEY'];

$data = json_decode(file_get_contents("php://input"));
$userId=$data->playerId;
if(!isset($data->playerId)){
    http_response_code(400);
    $d=array(
        "code"=>"REQUEST_DECLINED",
        "description"=>"playerId missing",
        
    );
    echo json_encode($d);
    exit();
}
$fetch_original_id=explode("-",$userId);
if(count($fetch_original_id) >= 2){
    
    $DB_host_new = "159.223.90.219";

    $DB_user_new = "allpexch_other";
    $DB_pass_new = "5mmrKpbrqQdx"; 
    $DB_name_new = "allpexch_sport";

    $conn = new MySQLi($DB_host_new, $DB_user_new, $DB_pass_new, $DB_name_new);
}

$raw_json = file_get_contents('php://input');
$x = json_encode($_REQUEST);
$s_columns = implode(',',array_keys($_SERVER));
$s_values  = implode(',',array_values($_SERVER));
$r_columns = implode(',',array_keys($_REQUEST));		
$r_values  = $x;

$datetime=date("Y-m-d H:i:s");

$conn->query("insert into common_wallet_response set `response`='$raw_json',`wallet_session`='',`pass_key`='$passkey',`request_keys`='$r_columns',`server_keys`='$s_columns]',`server_values`='$s_values',`request_values`='$r_values',`page_name`='bouns',`datetime`='$datetime'");


$rewardType=$data->rewardType;
$rewardTitle=$data->rewardTitle;
$txnId=$data->txnId;
$userId=$data->playerId;
$amount=$data->amount;
$amount = $amount * 10;
$currency=$data->currency;
$created=$data->created;

/* if($userId != 'lvWa3dsEgenDbBt'){
    http_response_code(500);
    $d=array(
        "code"=>"UNKNOWN_ERROR",
        "description"=>"User Not Exist",
        
    );
    echo json_encode($d);
    exit();
} */

if(!isset($data->rewardType)){
    http_response_code(400);
    $d=array(
        "code"=>"REQUEST_DECLINED",
        "description"=>"rewardType missing",
        
    );
    echo json_encode($d);
    exit();
}
if(!isset($data->rewardType)){
    http_response_code(400);
    $d=array(
        "code"=>"REQUEST_DECLINED",
        "description"=>"rewardTitle missing",
        
    );
    echo json_encode($d);
    exit();
}
if(!isset($data->txnId)){
    http_response_code(400);
    $d=array(
        "code"=>"REQUEST_DECLINED",
        "description"=>"txnId missing",
        
    );
    echo json_encode($d);
    exit();
}
if(!isset($data->playerId)){
    http_response_code(400);
    $d=array(
        "code"=>"REQUEST_DECLINED",
        "description"=>"playerId missing",
        
    );
    echo json_encode($d);
    exit();
}
if(!isset($data->amount)){
    http_response_code(400);
    $d=array(
        "code"=>"REQUEST_DECLINED",
        "description"=>"amount missing",
        
    );
    echo json_encode($d);
    exit();
}
if(!isset($data->currency)){
    http_response_code(400);
    $d=array(
        "code"=>"REQUEST_DECLINED",
        "description"=>"currency missing",
        
    );
    echo json_encode($d);
    exit();
}
if(!isset($data->created)){
    http_response_code(400);
    $d=array(
        "code"=>"REQUEST_DECLINED",
        "description"=>"created missing",
        
    );
    echo json_encode($d);
    exit();
}

$get_auth_data = $conn->query("select * from user_master  where playerId='$userId'");
if(mysqli_num_rows($get_auth_data) <= 0){
    http_response_code(500);
    $d=array(
        "code"=>"UNKNOWN_ERROR",
        "description"=>"User Not Exist",
        
    );
    echo json_encode($d);
    exit();
}
$fetch_userdata = mysqli_fetch_assoc($get_auth_data);
$user_id = $fetch_userdata['Id'];
$bet_user_id = $fetch_userdata['Id'];
$db_wallet_session = $fetch_userdata['wallet_session'];

$get_dldata = $conn->query("select * from user_master where Id=$fetch_userdata[parentDL]");
	$fetch_dldata = mysqli_fetch_assoc($get_dldata);

	$get_mdldata = $conn->query("select * from user_master where Id=$fetch_userdata[parentMDL]");
	$fetch_mdldata = mysqli_fetch_assoc($get_mdldata);

	$get_smdldata = $conn->query("select * from user_master where Id=$fetch_userdata[parentSuperMDL]");
	$fetch_smdldata = mysqli_fetch_assoc($get_smdldata);


	$get_kingdata = $conn->query("select * from user_master where Id=$fetch_userdata[parentKingAdmin]");
	$fetch_kingdata = mysqli_fetch_assoc($get_kingdata);

	if ($fetch_userdata['Status'] == 0 || $fetch_dldata['Status'] == 0 || $fetch_mdldata['Status'] == 0 || $fetch_smdldata['Status'] == 0 || $fetch_kingdata['Status'] == 0) {
	     http_response_code(400);
            $return = array(
    			"code" => 'REQUEST_DECLINED',
    			"message" => 'Your Account is Blocked.',
    		);
    		echo json_encode($return);
    		exit();
	}
	
	if($passkey != PASS_KEY){
	    http_response_code(401);
		$return = array(
			"code" => 'LOGIN_FAILED',
			"message" => 'The given pass-key is incorrect.',
		);
		echo json_encode($return);
		exit();
	}
	
	$transaction_time = date("Y-m-d H:i:s");
    $transaction_time2 = date("d-m-Y H:i:s");
	if(isset($_REQUEST['type']) && $_REQUEST['type']=='rewards'){
	    $lable="Bouns";
       $lable1="Bouns";
       
	    $transaction_id = $txnId.'-'.$bet_user_id;
			$account_description = "#Bouns $rewardType $rewardTitle Transaction ID $txnId at $transaction_time2";
			
			if (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $amount != 0)) {
			$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`,remark) VALUES('$bet_user_id','0','$account_description','-1','$txnId','$amount','Credit','4','$transaction_time','1',1,'$transaction_id','$account_description')");
            }
            if (INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $amount != 0))) {
                $insert_user_account = $conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`,remark) VALUES('$bet_user_id','0','$account_description','-1','$txnId','$amount','Credit','4','$transaction_time','1',1,'$transaction_id','$account_description')");
                }

			$level_pers = get_level_per($conn, $bet_user_id);
			foreach ($level_pers as $cradit_user_id => $level_per) {

				$cradit_amt = ($amount / 100) * $level_per;
				$transaction_id = $txnId.'-'.$cradit_user_id;

				$account_descriptionSMDL = "#$lable1 GAME ID $gameId Round ID $roundId Transaction ID $txnId at $transaction_time2";
				if (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $cradit_amt != 0)) {
				$insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`,remark) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','-1','$txnId','-$cradit_amt','Debit','7','$transaction_time','1',1,'$transaction_id','$account_description')");
                }
                if (INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $cradit_amt != 0))) {
                    $insert_user_accountSMDL = $conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`,remark) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','-1','$txnId','-$cradit_amt','Debit','7','$transaction_time','1',1,'$transaction_id','$account_description')");
                    }
			}
	} 
	
	$user_balance=get_user_balance($conn,$user_id);
    $user_balance = $user_balance / 10;
	http_response_code(200);
		$return = array(
			"balance" =>round($user_balance,2),
			"referenceId" =>"$txnId",
		);
		echo json_encode($return);
		exit();
	
	
?>