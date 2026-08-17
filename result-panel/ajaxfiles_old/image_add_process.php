<?php

include "../../include/conn.php";


// $url = $_POST['url'];
$alt = $_POST['alt'];
$type = $_POST['type'];
$device = $_POST['device'];

if ($type == 'add') {

    $allowed = array(
        "image/jpeg",
        "image/jpg",
        "image/png",
        "image/gif"
    );

    $path = "../../storage/";
    $path_db = "storage/";

    if (!isset($_FILES['image_file'])) {
        echo "image_error";
        exit;
    }

        $image_name = $_FILES['image_file']['name'];
        $tmp_dir   = $_FILES['image_file']['tmp_name'];
        $file_size = $_FILES['image_file']['size'];
        $file_type = $_FILES['image_file']['type'];

        if (!in_array($file_type, $allowed)) {
              echo "image_error";
        exit;
        }

        $ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

        /*  $new_file_name = time() . "_" . rand(1000, 9999) . "_" . $key . "." . $ext; */
        $new_file_name = basename($image_name);

        $file_path = $path . $new_file_name;
        $file_path_db = $path_db . $new_file_name;

        if (move_uploaded_file($tmp_dir, $file_path)) {

            $sql = $conn->query(" INSERT INTO home_image ( title,image,device ) VALUES('$alt','$file_path_db', '$device')");

            if ($sql) {
                echo "ok";
            } else {
                echo "db_error";
            }
        }else {
        echo "move_error";
    }
    

    exit;
}

if ($type == 'delete') {
    
    $image = $_POST['image'];
    $file_name = basename($image);
    $device = $_POST['device'];

    $get = $conn->query("SELECT * FROM home_image WHERE device='$device' AND image LIKE '%$file_name' LIMIT 1 ");
    if ($get && $get->num_rows > 0) {
        $row = $get->fetch_assoc();
        $file = "../../" . $row['image'];
        if (file_exists($file)) {
            unlink($file);
        }
        $delete = $conn->query("DELETE FROM home_image WHERE device='$device' AND image LIKE '%$file_name'");
        echo ($delete) ? "ok" : "error";
    } else {
        echo "not_found";
    }
    exit;
}
