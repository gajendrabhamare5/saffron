<?php
include('../include/conn.php');
include('../include/flip_function.php');
include('../include/flip_function2.php');
include "../session.php";
include('../include/market_limit.php');
include('../include/rejection_log.php');



	$host = SITE_IP;


 	require '../vendor/autoload.php';

	use ElephantIO\Client;
	use ElephantIO\Engine\SocketIO\Version2X;

	$options = [
		'context' => [
			'ssl' => [
				'verify_peer' => false,
				 'verify_peer_name' => false
			]
		]
	];
	
	$client = new Client(new Version2X(SITE_IP.'?token=mamu',$options));
	$client->initialize();
	

$bet_ip_address = '';
if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
	$bet_ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
}
else{
	$bet_ip_address = gethostbyaddr($_SERVER['REMOTE_ADDR']);
}

$bet_user_agent = $_SERVER['HTTP_USER_AGENT'];

$user_id = $_SESSION['CLIENT_LOGIN_ID'];
?>