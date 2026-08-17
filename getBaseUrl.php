<?php
$postData = json_decode(file_get_contents('php://input'), true);
if (isset($postData["app_name"])) {
	include 'include/conn.php';
	$data = [];
	$data["status"] = true;
	$data["url"] = AUTH_CODE_URL;
	$data["socket_url"] = SITE_IP;
	$data["site_id"] = SITE_ID;
	echo json_encode($data);
} else {
	echo "<h1>Unauthorized Access</h1>";
}

?>