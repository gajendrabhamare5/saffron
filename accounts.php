<?php
include 'include/conn.php';
include('include/user_balance.php');
header('Content-Type: application/json; charset=utf-8');
$userId=$_GET['userId'];
if(!isset($_GET['userId'])){
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
$game=$_GET['game'];

$wallet_session = $_SERVER['HTTP_WALLET_SESSION'];
$passkey = $_SERVER['HTTP_PASS_KEY'];

$raw_json = file_get_contents('php://input');
$x = json_encode($_REQUEST);
$s_columns = implode(',',array_keys($_SERVER));
$s_values  = implode(',',array_values($_SERVER));
$r_columns = implode(',',array_keys($_REQUEST));		
$r_values  = $x;

$datetime=date("Y-m-d H:i:s");

$conn->query("insert into common_wallet_response set `response`='$raw_json',`wallet_session`='$wallet_session',`pass_key`='$passkey',`request_keys`='$r_columns',`server_keys`='$s_columns]',`server_values`='$s_values',`request_values`='$r_values',`page_name`='account',`datetime`='$datetime'");

/* if($userId != 'lvWa3dsEgenDbBt'){
    if($game == "balance"){
        http_response_code(400);
        $return = array(
            "code" => 'REQUEST_DECLINED',
            "message" => 'Your Account is Blocked.',
        );
        echo json_encode($return);
        exit();
    }else{
        http_response_code(403);
    
        $return = array(
            "code" => 'ACCOUNT_BLOCKED',
            "message" => 'Your Account is Blocked.',
        );
        echo json_encode($return);
        exit();
    }
} */

$get_auth_data = $conn->query("select * from user_master  where playerId='$userId'");
if(mysqli_num_rows($get_auth_data) <= 0){
    /* http_response_code(500);
    $d=array(
        "code"=>"UNKNOWN_ERROR",
        "description"=>"User Not Exist",
        
    );
    echo json_encode($d);
    exit(); */
    if($game == "balance"){
        http_response_code(400);
        $return = array(
            "code" => 'REQUEST_DECLINED',
            "message" => 'Your Account is Blocked.',
        );
        echo json_encode($return);
        exit();
    }else{
        http_response_code(403);
    
        $return = array(
            "code" => 'ACCOUNT_BLOCKED',
            "message" => 'Your Account is Blocked.',
        );
        echo json_encode($return);
        exit();
    }
}
$fetch_userdata = mysqli_fetch_assoc($get_auth_data);
$user_id = $fetch_userdata['Id'];
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
	    if($game == "balance"){
            http_response_code(400);
            $return = array(
    			"code" => 'REQUEST_DECLINED',
    			"message" => 'Your Account is Blocked.',
    		);
    		echo json_encode($return);
    		exit();
    	}else{
            http_response_code(403);
    	
    		$return = array(
    			"code" => 'ACCOUNT_BLOCKED',
    			"message" => 'Your Account is Blocked.',
    		);
    		echo json_encode($return);
    		exit();
        }
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
	if($wallet_session != $db_wallet_session && $game != "balance"){
	    http_response_code(400);
		$return = array(
			"code" => 'INVALID_TOKEN',
			"message" => 'Missing, invalid or expired player (wallet) session token.',
		);
		echo json_encode($return);
		exit();
	}
	
	
	/* $get_account_balance = $conn->query("select SUM(`amount`) as total_balance from accounts where user_id=$user_id and status=1");
	$fetch_account_balance = mysqli_fetch_assoc($get_account_balance);
	$account_balance = $fetch_account_balance['total_balance'];
	
	$unmatched_exposure_balance = get_unmatched_expo($conn,$user_id);
	
	$final_net_exposure = get_total_net_exposure($conn,$user_id);
	$exposure_balance = $final_net_exposure;
		
	$exposure_balance = $exposure_balance * (-1);
	$unmatched_exposure_balance = $unmatched_exposure_balance * (-1);
	
	$user_balance=$account_balance - ($exposure_balance + $unmatched_exposure_balance); */
	$user_balance=get_user_balance($conn,$user_id);
	$user_balance = $user_balance / 10;
	http_response_code(200); 
		$return = array(
			"balance" =>round($user_balance,2),
			"currency" =>"INR",
		);
		echo json_encode($return);
		exit();
	
	
?>