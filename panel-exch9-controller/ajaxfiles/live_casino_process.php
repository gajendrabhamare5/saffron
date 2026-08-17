<?php
include "../../include/conn.php";
include "../session.php";
include "../../include/function.php";
$_REQUEST = check_variable_for_datatable($conn, $_REQUEST);
$type = $_REQUEST['type'];
$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
if ($login_type != 5) {
    header("Location: ../logout.php");
}
if($type == 'add'){
    $image = $_FILES['image_file']['name'];
    $tmp_dir = $_FILES['image_file']['tmp_name'];
    $game_type = trim($_REQUEST['game_type']);
    $game_name = trim($_REQUEST['game_name']);
    $game_id = trim($_REQUEST['game_id']);
    $game_provider = trim($_REQUEST['game_provider']);
    $game_category = trim($_REQUEST['game_category']);

    $datetime = date("Y-m-d H:i:s");
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $fileSize = $_FILES['image_file']['size'];
    $allowedExt = array("jpg","jpeg","png");
    $msg= "error";
    if(in_array($ext, $allowedExt)){
        /*if($fileSize < $banner_file_size){*/
            $filePath = 'storage/live_casino/'.$image;
            $fileDestination = '../../storage/live_casino/'.$image;
            if (move_uploaded_file($tmp_dir, $fileDestination)) {
                $msg= "ok";
                $banner_id = $conn->query("INSERT INTO `live_casino_list`( `image`, `game_category`, `game_provider`, `game_type`,`game_name`,`game_id`, `datetime`) VALUES ('$filePath','$game_category','$game_provider','$game_type','$game_name','$game_id','$datetime')");
            } else {
                $msg= "error";
            }
        /* }else{
            $msg = "size";
        } */
    }
    else{
        $msg = "extension";
    }
    $results = array(
        "status"   =>$msg,
    );

    echo json_encode($results);
}
if($type == 'delete'){
    $id = $_REQUEST['id'];
    
    if(!empty($id)){
        $conn->query("delete from live_casino_list where id = '$id' ");
        $status = 'ok';
        $message = 'Image has been deleted successfully.';
    }else{
        $status = 'error';
        $message = 'Something wen wrong.';
    }


    $results = array(
        "status"    => $status,
        "message"   => $message,
    );

    echo json_encode($results);
}
if($type == 'fetch'){
    $id = $_REQUEST['id'];
    $fetch = $conn->query("select * from live_casino_list where id = '$id' ");
    if(mysqli_num_rows($fetch) > 0){
        $data = mysqli_fetch_array($fetch);
        $image = WEB_URL.''.$data['image'];
        $game_type = $data['game_type'];
        $game_name = $data['game_name'];
        $game_id = $data['game_id'];
        $game_provider = $data['game_provider'];
        $game_category = $data['game_category'];
    }
    $results = array(
        "status"    => 'ok',
        "image"   => $image,
        "game_provider"   => $game_provider,
        "game_type"   => $game_type,
        "game_name"   => $game_name,
        "game_id"   => $game_id,
        "game_category"   => $game_category,
    );

echo json_encode($results);
}

if($type == 'edit'){
    $image = $_FILES['image_file']['name'];
    $tmp_dir = $_FILES['image_file']['tmp_name'];
    $game_type = trim($_REQUEST['game_type']);
    $game_name = trim($_REQUEST['game_name']);
    $game_id = trim($_REQUEST['game_id']);
    $game_provider = trim($_REQUEST['game_provider']);
    $game_category = trim($_REQUEST['game_category']);
    $id = $_REQUEST['id'];
    $datetime = date("Y-m-d H:i:s");
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $fileSize = $_FILES['image_file']['size'];
    $allowedExt = array("jpg","jpeg","png");
    $msg= "error";
    if(!empty($image)){
        if(in_array($ext, $allowedExt)){
            // if($fileSize < $banner_file_size){
                $filePath = 'storage/live_casino/'.$image;
            $fileDestination = '../../storage/live_casino/'.$image;
                if (move_uploaded_file($tmp_dir, $fileDestination)) {
                    $msg= "ok";
                    
                    $conn->query("update live_casino_list SET game_category='$game_category', image='$filePath' , game_provider='$game_provider' , game_type='$game_type', game_name='$game_name', game_id='$game_id' , datetime = '$datetime' where id = '$id' ");
                } else {
                    $msg= "error";
                }
               
            // }else{
            //     $msg = "size";
            // }
        } 
        else{
            $msg = "extension";
        }
    }else{
        $conn->query("update live_casino_list SET game_category='$game_category' , game_provider='$game_provider' , game_type='$game_type', game_name='$game_name', game_id='$game_id' , datetime = '$datetime' where id = '$id' ");
        $msg= "ok";
    }
    
    $results = array(
        "status"   =>$msg,
    );
    
    echo json_encode($results);
}
?>