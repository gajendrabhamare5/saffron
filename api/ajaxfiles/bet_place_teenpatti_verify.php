<?php
$type2 = $_REQUEST['type2'];
$url = "http://vkcasinos.com/diamond/games.php?type=$type2";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$contents = curl_exec($ch);
$er = curl_error($ch);
curl_close($ch);

?>