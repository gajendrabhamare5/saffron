<?php
	session_start();
	$userId = $_SESSION['CLIENT_LOGIN_ID'];
	if(isset($userId) && intVal($userId) > 0){
		$redis = new Redis();
		$redis->connect('127.0.0.1', 6379);
		$redis->setex("active_user:$userId", 15, time());
	}
?>