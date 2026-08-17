<?php
include('../include/conn.php');
include "session.php";

	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$controller_controller_type = 	$_SESSION['CONTROLLER_CONTROLLER_TYPE'];
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
	if($login_type != 5){
		header("Location: ../logout.php");
	}

	
	$select_page = $_POST['select_page'];
	
	
	$ImageName = $_FILES['select_slide_file']['name'];
	
	$ext = pathinfo($ImageName, PATHINFO_EXTENSION);
	
	if($ext != 'png' and $ext != 'jpg' and $ext != "jpeg" and $ext != "gif"){
		$_SESSION['SLIDER_MSG'] = "invalidformate";
	
	echo "<script>location.href='slider.php'</script>";
	exit();
	}
	
	$path = 'slider/'; 
	
	$album_images_name1 = str_replace(" ","_",$ImageName);
					
					
	$time = time();
	$new_name =$time."_".$album_images_name1;
	$location = $path . $ImageName; 
	
	$temp =  explode(".", $_FILES["select_slide_file"]["name"]);
	
	$newfilename = round(microtime(true)) . '.' . end($temp);
	$is_upload = move_uploaded_file($_FILES["select_slide_file"]["tmp_name"], $path . $newfilename);
	

	if($is_upload == 1){
		$added_time = date("Y-m-d H:i:s");
		$insert_query = $conn->query("insert into slider_details(sider_type,sider_image,added_time) VALUES('$select_page','$newfilename','$added_time')");
		
		$_SESSION['SLIDER_MSG'] = "ok";
	}
	else{
		$_SESSION['SLIDER_MSG'] = "wrong";
	}
	
	
	echo "<script>location.href='slider.php'</script>";
?>