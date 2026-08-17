<?php

include "../../include/conn.php";
 include "../session.php";
   /* error_reporting(E_ALL);
   ini_set("display_errors",1);
   ini_set("display_startup_errors",1); */
   $user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
  $login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];

   if($login_type != 5){
   		header("Location: ../logout.php");
   }

// $url = $_POST['url'];
$theme1_color = $_POST['theme1_color'];
$theme2_color = $_POST['theme2_color'];
$primary_color = $_POST['primary_color'];
$secondary_color = $_POST['secondary_color'];
$date = date("Y-m-d H:i:s");

$check = $conn->query("SELECT id FROM theme_settings WHERE id = 1");

if ($check && $check->num_rows > 0) {
    $update = $conn->query("UPDATE theme_settings SET theme1_color='$theme1_color', theme2_color='$theme2_color', primary_color='$primary_color', secondary_color='$secondary_color',updated_at = '$date' WHERE id=1");
    if (!$update) {
        echo json_encode([
            "status" => "error",
            "message" => $conn->error
        ]);
        exit;
    }
}else {

    $insert = $conn->query(" INSERT INTO theme_settings ( id, theme1_color, theme2_color, primary_color, secondary_color, updated_at ) VALUES ( 1, '$theme1_color','$theme2_color', '$primary_color', '$secondary_color','$date' )");

        if (!$insert) {
        echo json_encode([
            "status" => "error",
            "message" => $conn->error
        ]);
        exit;
    }
}

/*----------------------------
    CSS GENERATE
----------------------------*/

function opacityColor($hex, $opacity)
{
    $hex = strtoupper($hex);

    $alpha = strtoupper(dechex(round($opacity * 255)));

    if (strlen($alpha) == 1) {
        $alpha = "0" . $alpha;
    }

    return $hex . $alpha;
}

$css = ":root {

    --theme1-bg: {$theme1_color};
    --theme1-bg90: " . opacityColor($theme1_color,0.90) . ";
    --theme2-bg: {$theme2_color};
    --theme2-bg70: " . opacityColor($theme2_color,0.70) . ";
    --theme2-bg85: " . opacityColor($theme2_color,0.85) . ";
    --primary-color: {$primary_color};
    --secondary-color: {$secondary_color};

}";

/* $cssFile = "../../storage/front/theme/theme.css"; */

$cssFiles = [
    "../../storage/front/theme/theme.css",
    "../../storage/mobile/css/theme.css",
];

foreach ($cssFiles as $cssFile) {

    if (!file_put_contents($cssFile, $css)) {
        echo json_encode([
            "status" => "error",
            "message" => "Database updated but CSS file could not be generated: " . $cssFile
        ]);
        exit;
    }
}

echo json_encode([
    "status" => "success",
    "message" => "Theme Settings Updated Successfully."
]);


?>