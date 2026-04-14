<?php
require '../vendor/autoload.php';
use ElephantIO\Client, ElephantIO\Engine\SocketIO\Version2X;

function sendBetEmail($conn, $betData, $query='',$apidata = '') {
    
    $BET_NOTIFY_EMAIL_ID = BET_NOTIFY_EMAIL_ID;
	$WEB_URL = WEB_URL;
	$PHYSICAL_PATH = PHYSICAL_PATH;
	$bkp_link = BACKUP_LINK;
	
	$parse = parse_url($WEB_URL);
	$host = $parse['host'];
	$WEB_URL = str_ireplace('www.', '', $host);
	
	$event_type	= $betData['event_type'];
	$bet_id		= $betData['bet_id'];
	$username	= $betData['username'];
	$event_id	= $betData['event_id'];
	$market_runner_name	= $betData['market_runner_name'];
	$bet_type	= $betData['bet_type'];
	$bet_odds	= $betData['bet_odds'];
	$bet_stack	= $betData['bet_stack'];
	$game_type	= $betData['game_type'];
	$user_id	= $betData['user_id'];
	$event_name	= $betData['event_name'];
	$time = (date('Y-m-d H:i:s'));
	
	
	if (strpos($query, '_details(') !== false) {
		$query = str_replace('_details(','_details (`bet_id`,',$query);
	}
	
	if($game_type == 0 || $game_type == '0'){
		$query = str_replace('bet_details (','bet_details (`bet_id`,',$query);
	}
	else{
		$query = str_replace('bet_teen_details (','bet_teen_details (`bet_id`,',$query);
	}
	
	if (strpos($query, '_details (') !== false) {
		$query = str_replace('values(',"values('$bet_id',",$query);
	}
	
	
	if($bet_type == '' && ($event_type == 'LUCKY7' || $event_type == 'LUCKY7B')){
		$bet_type = 'Back';
	}
    
	$all_event_type  = array('6_PLAYER_POKER' => '6 Player Poker','ODI_POKER' => '1 Day Poker','2020_POKER' => '2020 Poker','2020TEENPATTI' => '2020 Teenpatti','ODITEENPATTI' => '1 Day Teenpatti','OPENTEENPATTI' => 'Open Teenpatti','TESTTEENPATTI' => 'Test Teenpatti','LUCKY7' => 'Lucky7A','LUCKY7B' => 'Lucky7B','2020_DRAGON_TIGER' => '2020 Dragon Tiger','2020_DRAGON_TIGER2' => '2020 Dragon Tiger2','ODI_DRAGON_TIGER' => '1 Day Dragon Tiger','DTL20' => '2020 Dragon Tiger Lion','BACCARAT' => 'Baccarat','BACCARAT2' => 'Baccarat2','AMAR_AKBAR_ANTHONY' => 'Amar Akbar Anthony','B_TABLE' => 'Bollywood Casino','ABJ' => 'Andar Bahar 2','AB20' => 'Andar Bahar','32CARDS' => '32cards A','32CARDSB' => '32cards B','3_CARD_J' => '3 Card Judgement','CASINO_METER' => 'Casino Meter','CASINO_WAR' => 'Casino War','CASINO_WAR' => 'Casino War','INSTANT_WORLI' => 'Instant Worli','QUEEN' => 'Queen','RACE_20' => '2020 Race','FIVE_5_CRICKET' => '5Five Cricket',
							'1' => 'Soccer','2' => 'Tennis','4' => 'Cricket','8' => 'Election',
						);

	if(isset($all_event_type[$event_type])){
		$event_type = $all_event_type[$event_type];
	}
	
	$event_id .= (($game_type == 1)? '' : (' - '.$event_name) );
	
	$subject = $WEB_URL.' | '.$username . " - Bet notify | $event_type  - $event_id | At ".$time;

	$message = '
	<!doctype html>
	<html lang="en-US">

	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		<title>Bet Notification</title>
		<meta name="description" content="Bet Notification">
	</head>
	<style>
		a:hover {text-decoration: underline !important;}
	</style>

	<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
		<table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
			style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: \'Open Sans\', sans-serif;">
			<tr>
				<td>
					<table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td style="height:20px;">&nbsp;</td>
						</tr>
					
						<tr>
							<td>
								<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
									style="max-width:670px; background:#fff; border-radius:3px;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);padding:0 40px;">
									<tr>
										<td style="height:40px;">&nbsp;</td>
									</tr>
									<tr>
										<td style="padding:0 15px; text-align:center;">
											<h1 style="color:#1e1e2d; font-weight:400; margin:0;font-size:32px;font-family:\'Rubik\',sans-serif;">Bet Notification</h1>
											<span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; 
											width:100px;"></span>
										</td>
									</tr>
									<tr>
										<td>
											<table cellpadding="0" cellspacing="0"
												style="width: 100%; border: 1px solid #ededed">
												<tbody>
													<tr>
														<td style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
															User:
														</td>
														<td style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
															'.$username.'
														</td>
													</tr>
													<tr>
														<td style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
															Game:
														</td>
														<td style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
															'.$event_type.'
														</td>
													</tr>
													<tr>
														<td style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
															'. (($game_type == 1)? 'Round Id': 'Event Name ' ).':
														</td>
														<td style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
															'.$event_id.'
														</td>
													</tr>
													<tr>
														<td style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
															Nation:
														</td>
														<td style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
															'.$market_runner_name.'
														</td>
													</tr>
													<tr>
														<td style="padding: 10px; border-bottom: 1px solid #ededed;border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
															Nation Type:
														</td>
														<td style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
															'.$bet_type.'
														</td>
													</tr>
													<tr>
														<td style="padding: 10px; border-bottom: 1px solid #ededed;border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
															Odd:
														</td>
														<td style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
															'.$bet_odds.'
														</td>
													</tr>
													<tr>
														<td style="padding: 10px; border-bottom: 1px solid #ededed;border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
															Bet Amount:
														</td>
														<td style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
															'.$bet_stack.'
														</td>
													</tr>
													<tr>
														<td style="padding: 10px; border-bottom: 1px solid #ededed;border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
															Time:
														</td>
														<td style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
															'.$time.'
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
									<tr>
										<td style="height:40px;">&nbsp;</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td style="height:20px;">&nbsp;</td>
						</tr>
						<tr>
							<td style="text-align:center;">
									<p style="font-size:14px; color:#455056bd; line-height:18px; margin:0 0 0;">&copy; <strong>www.'.$WEB_URL.'</strong></p>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>

	</html>';

	$options = [
		'extraHeaders' => [
			'Authorization' => "myToken1234"
		]
	];

	$options = [

		'context' => [
			'ssl' => [
				'verify_peer' => false,
				 'verify_peer_name' => false
			]
		]

	];

	$client = new Client(new Version2X(SITE_IP2.'?token=mamu',$options));
	$client->initialize();
	
	$mailData = array(
		'to'	=>	$BET_NOTIFY_EMAIL_ID,
		'subject' =>	$subject,
		'body'	=> $message,
		'website'	=> $PHYSICAL_PATH,
		'user_id' => $user_id,
		'bet_id' => $bet_id,
		'game_type' => $game_type,
		'link' => $bkp_link,
		'query' => $query
	);

	$client->emit('sendMail',$mailData);
	
	$client->close();
	
	
		
}
