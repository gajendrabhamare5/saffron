<?php


	$owner_mail= "info@11starexch.com";						 
	$owner_mail_pass= "11star@mail";
    $website_name ="11starexch";
    
    $email="ashish@siliconleaf.com";
$subject = "Forgot Password";
	$message = "Hi ".$first_name." ".$last_name.",<br>";

    
    $message .= 'You OTP is : 12345<br>';




					$subject = "Delete OTP";
					require 'PHPMailer/src/Exception.php';
			require 'PHPMailer/src/PHPMailer.php';
			require 'PHPMailer/src/SMTP.php';
				/*define ('GUSER','kapdavilla@gmail.com');
				define ('GPWD','kanchanc');*/

				define ('GUSER',"$owner_mail");
				define ('GPWD',	$owner_mail_pass);


				global $error;
				$mail = new PHPMailer\PHPMailer\PHPMailer();  // create a new object
				$mail->IsSMTP(); // enable SMTP
				$mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
				$mail->SMTPAuth = true;  // authentication enabled
				$mail->SMTPSecure = 'TLS'; // secure transfer enabled REQUIRED for GMail
				$mail->SMTPAutoTLS = false;
				/*$mail->Host = 'smtp.gmail.com';
				$mail->Port = 587;
				$mail->isHTML(true);
				$mail->Username = GUSER;
				$mail->Password = GPWD;
				$mail->SetFrom("kapdavilla@gmail.com", "Kapda Villa");
				$mail->Subject = $subject;
				$mail->Body = $message;
				$mail->AddAddress($email);*/
				$mail->Host = "11starexch";
				$mail->Port = 587;
				$mail->isHTML(true);
				$mail->Username = GUSER;
				$mail->Password = GPWD;
				$mail->SetFrom($owner_mail, $website_name);
				$mail->Subject = $subject;
				$mail->Body = $message;
				$mail->AddAddress($email);
				if($mail->Send()){
					$return = array('status'=>'ok');
					echo json_encode($return);
				}else{
					$return = array('status'=>'failed');
					echo  json_encode($return);
				}
			
				?>