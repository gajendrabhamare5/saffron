<?
include('../include/conn.php');
$user_id="";
if (isset($_POST['auth_login_id'])) {
    session_start();
    if (!isset($_SESSION['CLIENT_AUTH_STATUS']) && !isset($_SESSION['CLIENT_AUTH_UID'])) {
        $return = array(
            "status" => 'error',
            "message" => "User not avilable",
        );
        echo json_encode($return);
        exit();
    }
    $user_id = $_POST['auth_login_id'];
} else {
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

$code = $_POST['code'];
$data = array(
    'user_id' => $user_id,
    'code' => $code,
);

// Encode the data to JSON
$jsonData = json_encode($data);

// URL to which the request is sent
$url = AUTH_CODE_URL.'verification/verify_code';
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
    if (isset($_POST['auth_login_id'])) {

        session_start();
        unset($_SESSION['CLIENT_AUTH_STATUS']);
        unset($_SESSION['CLIENT_AUTH_UID']);
        function generateRandomString($length = 18)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        $login_ip_addrss = '';
        if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $login_ip_addrss = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else {
            $login_ip_addrss = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        }
        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        $check_user_name = $conn->query("select * from user_login_master where `UserID`='$user_id' and UserType IN (1)");
        $row = mysqli_fetch_assoc($check_user_name);
        $UserID = $row['UserID'];
        $uid = $UserID;
        $first_password_changed = $row['first_password_changed'];
        $sql = "SELECT * FROM `user_master` WHERE `Id`=$uid";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $name = $row['Name'];

        $date_time = date("Y-m-d H:i:s");
        $conn->query("insert into login_ip_address(user_id,ip_address,login_date_time,user_agent) VALUES($uid,'$login_ip_addrss','$date_time','$user_agent')");

        $_SESSION['CLIENT_LOGIN_STATUS'] = true;
        $_SESSION['CLIENT_LOGIN_ID'] = $uid;
        $_SESSION['CLIENT_LOGIN_NAME'] = $name;
        $_SESSION['FIRST_PASSWORD_CHANGED'] = $first_password_changed;

        $str = rand();
        $login_random_string = md5($str);
        $_SESSION['LOGIN_ENC_ID'] = base64_encode($uid);
        $_SESSION['LOGIN_STRING'] = $login_random_string;

        $first_two_character = substr($name, 0, 2);

        $generate_radom = generateRandomString();
        $api_auth_token = "$first_two_character" . $generate_radom;
        $api_auth_token = strtoupper($api_auth_token);

        $conn->query("UPDATE `user_login_master` SET `loginString` = '$login_random_string',api_auth_token='$api_auth_token' where Id=$uid");


        $client->emit('authDisableVerified', ["user_id"	=>	$uid, "site_id"	=>	SITE_ID, "status"	=>	"login"]);
	    $client->close();

        $return = array(
            "status" => 'ok',
            "login_id" => base64_encode($uid),
            "login_string" => $login_random_string,
            "first_password_changed" => $first_password_changed,
        );
        echo json_encode($return);
        exit();
    }

    $return = array(
        "status" => 'ok',
        "message" => $response['message'],
    );
    echo json_encode($return);
    exit();
}
