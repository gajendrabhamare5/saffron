<?php

include "../../include/conn.php";
 include "../session.php";
 include "../../include/function.php";
$_POST = check_variable_for_datatable($conn, $_POST);
   /* error_reporting(E_ALL);
   ini_set("display_errors",1);
   ini_set("display_startup_errors",1); */
   $user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
  $login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];



   if($login_type != 5){
   		header("Location: ../logout.php");
   }

// $url = $_POST['url'];
$alt = $_POST['title'];
$date123 = date("Y-m-d");
$image = $_FILES['image_file']['name'];
$tmp_dir = $_FILES['image_file']['tmp_name'];
$file_size = $_FILES['image_file']['size'];
$file_type = $_FILES['image_file']['type'];
$allowed = array("image/jpeg", "image/jpg", "image/png", "image/gif");

$slug = generateSlug($alt);
function generateSlug($string)
{
    $slug = strtolower(trim($string));
    $slug = preg_replace('/[^a-z0-9-]+/', '-', $slug);
    $slug = preg_replace('/-+/', "-", $slug);

    return trim($slug, '-');
}

if (!isset($_FILES['image_file']) || $_FILES['image_file']['error'] != 0) {
    echo "image_error";
    exit;
}

if (in_array($file_type, $allowed)) {
    // $datetime = date("Y-m-d_H_i_s");
    $ext = pathinfo($image, PATHINFO_EXTENSION);

    $path = "../../storage/logo";
    $path_db = "storage/logo";
   
    $file_name = "logo." . $ext;
    $file_path = $path . "/" . $file_name;
    $file_path_db = $path_db . "/" . $file_name;

    $check = $conn->query("SELECT * FROM logo WHERE id='1'");

    if ($check && $check->num_rows > 0) {
        // record exists -> update
        $row = $check->fetch_assoc();
        $old_file = "../../" . $row['logo_image'];
        // move new file
        if (move_uploaded_file($tmp_dir, $file_path)) {
             // delete old image file if exists
            if (!empty($old_file) && file_exists($old_file)) {
                unlink($old_file);
            }

            $sql = $conn->query("UPDATE logo SET name='$alt', logo_image='$file_path_db' WHERE id=1");
            echo ($sql) ? "updated" : "update_error";
        } else {
            echo "move_error";
        }

    } else {


        if (move_uploaded_file($tmp_dir, $file_path)) {
            //echo "INSERT INTO logo(`name`, `logo_image`) VALUES('$alt', '$file_path_db')";
            $sql = $conn->query("INSERT INTO logo(`id`,`name`, `logo_image`) VALUES('1','$alt', '$file_path_db')");
            if ($sql) {
                echo "ok";
            } else {
                echo "error";
            }
        } else {
            echo "move_error";
        }
    }
} else {
    echo "image_error";
}

?>