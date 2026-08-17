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
$check_user_name = $conn->query("select * from user_login_master where `UserID`='$user_id' and UserType IN (1)");
$row_count = mysqli_num_rows($check_user_name);

if ($row_count <= 0) {
	$return = array(
		"status" => 'error',
		"message" => 'Invalid username',
	);
	echo json_encode($return);
	exit();
}

    $data = array(
        'user_id' => $user_id,
    );


    // Encode the data to JSON
    $jsonData = json_encode($data);

    // URL to which the request is sent
    $url = AUTH_CODE_URL.'verification/telegram_generate_otp';
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
        );
        echo json_encode($return);
        exit();
    } else {
        $return = array(
            "status" => 'ok',
            "message" => $response['message'],
        );
        echo json_encode($return);
        exit();
    }

?>
