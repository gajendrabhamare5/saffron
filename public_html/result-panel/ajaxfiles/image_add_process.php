<?php

include "../../include/conn.php";

// $url = $_POST['url'];
$alt = $_POST['title'];
$device = $_POST['device'];
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


if (in_array($file_type, $allowed)) {
    // $datetime = date("Y-m-d_H_i_s");
    $ext = pathinfo($image, PATHINFO_EXTENSION);

    $path = "../../storage/";
    $path_db = "storage/";
    // $year_folder = $path;
    // $year_folder1 = $path1;
    // $month_folder = $year_folder;
    // $month_folder1 = $year_folder1;

    // $unique_slug = $slug ;

    // $new_name = $path1 . "/" . $unique_slug . "." . $ext;
    // $new_name1 = $path . "/" . $unique_slug . "." . $ext;

    if ($device == "Web") {
        $file_name = "home_web." . $ext;
    } else {
        $file_name = "home_mob." . $ext;
    }

    $file_path = $path . "/" . $file_name;
    $file_path_db = $path_db . "/" . $file_name;

    $check = $conn->query("SELECT * FROM home_image WHERE device='$device' LIMIT 1");

    if ($check && $check->num_rows > 0) {
        // record exists -> update
        $row = $check->fetch_assoc();
        $old_file = "../" . $row['image'];

        // delete old image file if exists
        if (file_exists($old_file)) {
            unlink($old_file);
        }

        // move new file
        if (move_uploaded_file($tmp_dir, $file_path)) {
            $sql = $conn->query("UPDATE home_image SET title='$alt', image='$file_path_db' WHERE device='$device'");
            echo ($sql) ? "updated" : "update_error";
        } else {
            echo "move_error";
        }

    } else {


        if (move_uploaded_file($tmp_dir, $file_path)) {
            //echo "INSERT INTO home_image(`title`, `image`,`device`) VALUES('$alt', '$new_name','$device')";
            $sql = $conn->query("INSERT INTO home_image(`title`, `image`,`device`) VALUES('$alt', '$file_path_db','$device')");
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