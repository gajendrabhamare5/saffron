<?php
$eventId = $_GET['eventId'];
$url = "http://vkcasinos.com/diamond/data.php?eventId=".$eventId;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$contents = curl_exec($ch);
$er = curl_error($ch);
curl_close($ch);
print_r($er);
?>