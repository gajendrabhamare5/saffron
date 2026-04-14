<?php
include('../include/conn.php');
error_reporting(E_ALL);
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
$casino_list=array('superover','lucky7eu2','sicbo','teen32','teen20c','patti2','teen1','ab3','aaa2','btable2','teen','teen20','joker20','cmeter1','sicbo2','dum10','race17','teen20b','trio','lottcard','teen6','trap','goal','superover3','lucky15','roulette11','roulette12','roulette13','mogambo','dolidana','lucky5','teen62','worli','teenunique','joker1','joker120','dt20','dt6','dt202','teen8','dtl20','war','baccarat','baccarat2','3cardj','cmatch20','cmeter','worli2','notenum','teen120','ab4','superover2','race2','teen41','teen42','teen33','lucky7','lucky7eu','card32','aaa','btable','card32eu','poker20','poker','poker6','teensin','teenmuf','teen3','ab20','abj','queen','ballbyball','race20','cricketv3','ourroullete','poison','poison20');
$response_array=array();

foreach($casino_list as $casino){
    
    $url = CASINO_DATA_URL ."?type=$casino";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $get_data = curl_exec($ch);
    $bet_api_data = $get_data;
    $er = curl_error($ch);
    curl_close($ch);
    $get_data = json_decode($get_data);
    if(empty((array)$get_data->odds)){
    	$response_array[] = $casino;
        continue;
    }
    if(!isset($get_data->odds->serverTime)){
    	$response_array[] = $casino;
        continue;
    }
    $unixServerTime = $get_data->odds->serverTime / 1000;
    $time=time();
    $diffInSeconds=$time - $unixServerTime;
    if(abs($diffInSeconds) > 60){
        $response_array[] = $casino." Time - ".$diffInSeconds;
    }
} 
    $response_array_result = array();
foreach($casino_list as $casino){
    $result_url = RESULT_DATA_URL ."?type=$casino";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $result_url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $get_data = curl_exec($ch);
    $bet_api_data = $get_data;
    $er = curl_error($ch);
    curl_close($ch);
    $get_data = json_decode($get_data);
    if(empty((array)$get_data->odds)){
        $response_array_result[] = $casino;
        continue;
    }
    if(!isset($get_data->odds->serverTime)){
    	$response_array_result[] = $casino;
        continue;
    }
    $unixServerTime = $get_data->odds->serverTime / 1000;
    $time=time();
    $diffInSeconds=$time - $unixServerTime;
    if(abs($diffInSeconds) > 600 && ($casino != "ab4" && $casino != "cricketv3" && $casino != "ab3")){
        $response_array_result[] = $casino.' time '.$diffInSeconds;
    }
    else if(abs($diffInSeconds) > 6000 && ($casino == "ab4" || $casino == "cricketv3" || $casino == "ab3")){
    	$response_array_result[] = $casino.' time '.$diffInSeconds;
    }
    
}
if(count($response_array) > 0 || count($response_array_result) > 0){
   
    $website_title = SITE_NAME;
    
    $owner_mail= SITE_EMAIL;
	$owner_mail_pass= SITE_EMAIL_PASS;
	 $mail_host=SITE_EMAIL_HOST;  
	$mail_port=SITE_EMAIL_PORT;
	
	$subject="Servertime Log";
	$email="parikh.rushika@gmail.com";
	
    $data=json_encode($response_array);
    $data_result=json_encode($response_array_result);
    echo "Game Array : ".$data."</br> Game Result Array : ".$data_result;
    require '../exch-saff-247-controller/PHPMailer/src/Exception.php'; 
			require '../exch-saff-247-controller/PHPMailer/src/PHPMailer.php';
			require '../exch-saff-247-controller/PHPMailer/src/SMTP.php';
			define ('GUSER',$owner_mail);
			define ('GPWD',$owner_mail_pass); 
                                                
 	
 	  
					global $error;
				$mail = new PHPMailer\PHPMailer\PHPMailer();  // create a new object
				$mail->IsSMTP(); // enable SMTP
				$mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
				$mail->SMTPAuth = true;  // authentication enabled
				$mail->SMTPSecure = 'tls'; 
				//$mail->SMTPSecure = false; // secure transfer enabled REQUIRED for GMail
				$mail->SMTPAutoTLS = false;

				$mail->SMTPOptions = array(
					'ssl' => array(
						'verify_peer' => false,
						'verify_peer_name' => false,
						'allow_self_signed' => true,
					),
				);
				$mail->Host =$mail_host;
				$mail->Port = $mail_port;
				$mail->isHTML(true);
				$mail->Username = GUSER;  
				$mail->Password = GPWD;           
				$mail->SetFrom($owner_mail, $website_title);
				$mail->Subject = $subject;
				$mail->Body = "Game Array : ".$data."</br> Game Result Array : ".$data_result;
				$mail->AddAddress($email);
		if($mail->Send()){
				/* $erro[]= array(
							"code"=>"valid_email_forgot",
							"message"=>"success",
							
							);
			$d = array(
				"success"=>true,
				"data"=>$erro,
				
			); */
		}else{
			/* $erro[]= array(
							"code"=>"Technical issue in email authentication",
							"message"=>"123",
							
							);
			$d = array(
				"success"=>false,
				"data"=>$erro,
				
			); */
		}
        /* echo json_encode($d); */
}
?>