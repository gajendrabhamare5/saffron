<?


include('../include/conn.php');
$json = file_get_contents('php://input');

$request = json_decode($json);
$conn->query("insert into telegram_webook_response set response='$json'");

$token = '7838243818:AAF5zuZYm2Q6ko2YB2owHcoNs-SjREJA61M';
$url = "https://api.telegram.org/bot$token/sendMessage";

$chatId = $request->message->chat->id;
$userText = $request->message->text;
$message = "Invalid Command! Try again."; 

if($userText == "/start"){
    $message = "Hey! You are 1 step away from 2-Step Verification, Now please proceed for further step: /connect your_id to enable it for your account.";
}else if(strpos($userText,"/connect") !== false){
    $message = "2-Step Verification is enabled, Now you can use this bot to login into your account.";
    $otp = str_replace("/connect ","",$userText);

    $responseUserID = $conn->query("select pcode_user_id from user_panel_verification_code where pcode_verification_code = '$otp' ");
    if(mysqli_num_rows($responseUserID) <= 0){
        $message = "Please enter valid command!";
    }else{
        $responseUserData = mysqli_fetch_assoc($responseUserID);
        $userId = $responseUserData['pcode_user_id'];
        $responseUserID = $conn->query("update user_master set user_device_id='$chatId',user_verification_status='ENABLED' where Id = '$userId' ");
    }
}
// $verificationCode = '123456'; // Example verification code
// $emailId = $userMapDetail[0]['Email_ID']; // User's email ID

$data = [
    'chat_id' => $chatId,
    'text' => $message,
];

// Initialize cURL
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

// Execute cURL request
$response = curl_exec($ch);

// Handle cURL errors
if ($response === false) {
    echo 'Error sending message: ' . curl_error($ch);
} else {
    echo 'Message sent successfully: ' . $response;
}

// Close cURL session
curl_close($ch);

?>