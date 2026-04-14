<?php


$data = json_decode(file_get_contents("php://input"));
$event_id =$data->eventId;
$html_data =$data->data;
$isMobile =$data->isMobile;

$html = '<?php
	header("X-Frame-Options: SAMEORIGIN");
?>';
$html .= $html_data;

if($isMobile == 1 or $isMobile == true or $isMobile == "1" or $isMobile == "true"){
	
	$myfile = fopen("$event_id"."_m.php", "w");
}
else{
	$myfile = fopen("$event_id.php", "w");
	
}
	$txt = $html;
	fwrite($myfile, $txt);
	fclose($myfile);

?>