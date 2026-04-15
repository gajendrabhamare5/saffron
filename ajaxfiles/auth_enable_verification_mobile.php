<?
include('../include/conn.php');
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
$data = array(
    'user_id' => $user_id,
);

// Encode the data to JSON
$jsonData = json_encode($data);

// URL to which the request is sent
$url = AUTH_CODE_URL.'verification/enable_verification_mobile';
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
        "message" => curl_error($curl),
        "url" => $url,
    );
    echo json_encode($return);
    exit();
}
curl_close($curl);
$response = (array)json_decode($response);

if (!$response['status']) {
    $return = array(
        "status" => 'error',
        "message" => $response['message'],
        "url1" => $url,
        "response" => $response,
    );
    echo json_encode($return);
    exit();
} else {
    $return = array(
        "status" => 'ok',
        "message" => $response['message'],
        "verification_code" => $response['data']->verification_code,
    );
    echo json_encode($return);
    exit();
}
?>
