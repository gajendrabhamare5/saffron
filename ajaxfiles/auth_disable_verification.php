<?
include('../include/conn.php');
if(isset($_POST['pagename']) && $_POST['pagename'] == "login"){
    $user_id = $_POST['user_id'];
}else{
    session_start();

    if (!isset($_SESSION['CLIENT_LOGIN_STATUS']) && !isset($_SESSION['CLIENT_LOGIN_ID'])) {
        $return = array(
            "status" => 'error',
            "message" => "User not avilable",
        );
        echo json_encode($return);
        exit();
    }
    $user_id = $_SESSION['CLIENT_LOGIN_ID'];
}
/* error_reporting(E_ALL);
ini_set("display_errors",1);
ini_set("display_startup_errors",1); */
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


$client = new Client(new Version2X($host, $options));
$client->initialize();


$code=$_POST['code'];
$data = array(
    'user_id' => $user_id,
    'code' => $code,
);

// Encode the data to JSON
$jsonData = json_encode($data);

// URL to which the request is sent
$url = AUTH_CODE_URL.'verification/disable_verification';
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_POSTFIELDS => $jsonData,
    CURLOPT_HTTPHEADER => array(
        "content-type: application/json",
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

if (curl_errno($curl)) {
    $return = array(
        "status" => 'error',
        "message" => curl_error($ch),
    );
    echo json_encode($return);
    exit();
}
curl_close($curl);
$response = (array)json_decode($response);

if (!$response['status']) {
    $return = array(
        "zsg" => $temp,
        "status" => 'error',
        "message" => $response['message'],
    );
    echo json_encode($return);
    exit();
} 
else {
	$client->emit('authDisableVerified', ["user_id"	=>	$user_id, "site_id"	=>	SITE_ID, "status"	=>	"DISABLED"]);
	$client->close();
    $return = array(
        "status" => 'ok',
        "message" => $response['message'],
    );
    echo json_encode($return);
    exit();
}
?>
