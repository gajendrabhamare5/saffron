<?php

include("../include/conn.php");

$data = json_decode(file_get_contents("php://input"));
$jsonString = json_encode($data);
// $sql = "INSERT INTO casino_result_responce (game,responce) VALUES('mail','$jsonString')";
// $conn->query($sql);

$user_id = $data->user_id;
$bet_id = $data->bet_id;
$game_type = $data->game_type;
$subject = $data->subject;
$body = $data->body;
$reason = $data->error->response;
$responseCode = $data->error->responseCode;

$datettime = date("Y-m-d H:i:s");

$fetch_bet_data = array();
$event_type = 0;
if($game_type == 0){
	$bet_data = $conn->query("select * from bet_details where bet_id=$bet_id");
	$fetch_bet_data = mysqli_fetch_assoc($bet_data);
}
else{
	$bet_data = $conn->query("select * from bet_teen_details where bet_id=$bet_id");
	$fetch_bet_data = mysqli_fetch_assoc($bet_data);
}

$trade_added_time = $fetch_bet_data['bet_time'];
$event_type = $fetch_bet_data['event_type'];

$get_user_data = $conn->query("select * from user_master where user_id=$user_id");
$fetch_get_user_data = mysqli_fetch_assoc($get_user_data);
$user_name = $fetch_get_user_data['Email_ID'];

$insert = array(
	"user_id"=>$user_id,
	"user_name"=>$user_name,
	"bet_id"=>$bet_id,
	"game_type"=>$game_type,
	"event_type"=>$event_type,
	"subject"=>$subject,
	"body"=>addslashes($body),
	"reason"=>$reason,
	"time"=>$datettime,
);

$sql = "INSERT INTO mail_failed_bet (user_id,user_name,bet_id,game_type,event_type,subject,body,reason,time) VALUES($user_id,
	'$user_name','$bet_id',
	'$game_type',
	'$event_type',
	'$subject', 
	'". (addslashes($body)). "',
	'$reason',
	'$datettime')
";
$conn->query($sql);
echo "ok";

?>