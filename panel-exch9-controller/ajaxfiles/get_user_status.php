<?php
	session_start();
	$userId = $_SESSION['CONTROLLER_LOGIN_ID'];
	$it = NULL;
	$activeUsers = [];
	if(isset($userId) && intVal($userId) > 0){
		$redis = new Redis();
		$redis->connect('127.0.0.1', 6379);
		
		while ($keys = $redis->scan($it, "active_user:*")) {
			foreach ($keys as $k) {
				$activeUsers[] = str_replace('active_user:', '', $k);
			}
		}
	}
	$return = array(
				'status' => "ok",'list' => $activeUsers
				);
	echo json_encode($return);
?>