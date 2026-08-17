<?php

//$sport_ids = array(4, 2, 1);
$sport_ids = array(2, 1);
foreach ($sport_ids as $sport_id) {

    $page = 1;

    $content = getData($sport_id, $page);

    $results = $content['results'];
    $total_pages = ceil($content['pager']['total'] / $content['pager']['per_page']);

    $page = $content['pager']['page'];

    for ($page = 2; $total_pages >= $page; $page++) {
        $content1 = getData($sport_id, $page);

        $results = array_merge($results, $content1['results']);
    }

    $fp = fopen($sport_id . '.json', 'w');
    fwrite($fp, json_encode($results, JSON_PRETTY_PRINT));   // here it will print the array pretty
    fclose($fp);
}

function getData($sport_id = '', $page = 1) {

    if ($sport_id == '')
        return false;

    $url = "https://api.b365api.com/v1/betfair/ex/upcoming?sport_id=" . $sport_id . "&token=24310-FJHos4zlmNbn5J&page=" . $page;
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT_MS, 3000);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

    $content = json_decode(trim(curl_exec($ch)), true);

    curl_close($ch);

    return $content;
}

?>