<?php
include "../../include/conn.php";
/* error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1); */

$type = $_POST['type'];
$host = GAME_IP_NEW;


require '../../vendor/autoload.php';

use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version2X;

$options = [
    'context' => [
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false
        ]
    ]
];


function emitChangeInMaxBet($host, $options)
{
    try {
        $client = new Client(new Version2X($host, $options));
        $client->initialize();
        $client->emit('changeInMaxBet', []);
        $client->close();
    } catch (\Exception $e) {
        // Socket connection failed, but we shouldn't stop the db operation
    }
}
if ($type == 'add') {

    $sport_name = trim($_POST['sport_name']);
    $eventName = trim($_POST['eventName']);
    $eventId = trim($_POST['eventId']);
    $min_bet = trim($_POST['min_bet']);
    $max_bet = trim($_POST['max_bet']);
    $market_type = trim($_POST['market_type']);
    $marketId = $_POST['marketId'];
    $datetime = date("Y-m-d H:i:s");
   
    $msg = "ok";
    $check_query = $conn->query("SELECT * FROM event_min_max WHERE eventId = '$eventId' AND market_type = '$market_type' AND marketId = '$marketId'");
    /* if (mysqli_num_rows($check_query) > 0) {
        $msg = "error";
        $results = array(
            "status" => "already_exists",
        );
        echo json_encode($results);
        exit;
    }

    $banner_id = $conn->query("INSERT INTO `event_min_max`( `sport_name`, `marketId`, `eventName`, `eventId`, `min_bet`, `max_bet`, `created_at`) VALUES ('$sport_name','$marketId','$eventName','$eventId','$min_bet','$max_bet','$datetime')"); */
    if (mysqli_num_rows($check_query) > 0) {
           $conn->query("update event_min_max SET min_bet='$min_bet', max_bet='$max_bet' , updated_at = '$datetime' where eventId='$eventId' and market_type='$market_type' and marketId='$marketId'");
        }else {
           
            $banner_id = $conn->query("INSERT INTO `event_min_max`( `sport_name`, `marketId`, `eventName`, `eventId`, market_type,min_bet, max_bet,`created_at`) VALUES ('$sport_name','$marketId','$eventName','$eventId','$market_type','$min_bet','$max_bet','$datetime')");
        }

    emitChangeInMaxBet($host, $options);
   
    echo json_encode([
        "status" => "ok"
    ]);
}
if ($type == 'delete') {
    $sport_name = $_POST['sport_name'];
    $eventName = $_POST['eventName'];
    $eventId = $_POST['eventId'];
    $market_type = $_POST['market_type'];
    $marketId = $_POST['marketId'];

    $check_query = $conn->query("SELECT * FROM event_min_max WHERE eventId = '$eventId'and eventName='$eventName' and sport_name ='$sport_name'and market_type ='$market_type' and marketId ='$marketId'");
    if (mysqli_num_rows($check_query) > 0) {

         $conn->query("delete from event_min_max where sport_name='$sport_name' and eventName='$eventName' and eventId='$eventId' and market_type='$market_type' and marketId='$marketId'");
           emitChangeInMaxBet($host, $options);
        $status = 'ok';
        $message = 'Min Max has been deleted successfully.';
    }else{
        $status = 'error';
        $message = 'Something went wrong.';
    }

    /* if (!empty($id)) {

        $conn->query("delete from event_min_max where id = '$id' ");
        emitChangeInMaxBet($host, $options);
        $status = 'ok';
        $message = 'Min Max has been deleted successfully.';
    } else {
        $status = 'error';
        $message = 'Something wen wrong.';
    } */


    $results = array(
        "status" => $status,
        "message" => $message,
    );

    echo json_encode($results);
}
if ($type == 'fetch') {
    $sport_listt = [];
    $sport_query = $conn->query("select * from sport_list where is_delete='0'");
    while ($sport_data = mysqli_fetch_assoc($sport_query)) {
        $sport_id_db = $sport_data['sport_id'];
        $sport_name_db = $sport_data['sport_name'];
        $sport_listt[$sport_id_db] = $sport_name_db;
    }

    $id = $_POST['id'];
    $fetch = $conn->query("select * from event_min_max where id = '$id' ");
    if (mysqli_num_rows($fetch) > 0) {
        $data = mysqli_fetch_array($fetch);
        $sport_name = $data['sport_name'];
        $sport_name = $sport_listt[$sport_name];
        $marketId = $data['marketId'];
        $eventName = $data['eventName'];
        $eventId = $data['eventId'];
        $min_bet = $data['min_bet'];
        $max_bet = $data['max_bet'];
    }
    $results = array(
        "status" => 'ok',
        "sport_name" => $sport_name,
        "marketId" => $marketId,
        "eventName" => $eventName,
        "eventId" => $eventId,
        "min_bet" => $min_bet,
        "max_bet" => $max_bet,
    );

    echo json_encode($results);
}

if ($type == 'edit') {

    /* $marketId = ""; */
    $sport_name = trim($_POST['sport_name']);
    $eventName = trim($_POST['eventName']);
    $eventId = trim($_POST['eventId']);
    $min_bet = trim($_POST['min_bet']);
    $max_bet = trim($_POST['max_bet']);
    $market_type = trim($_POST['market_type']);
    $marketId = $_POST['marketId'];
    $id = $_POST['id'];
    $datetime = date("Y-m-d H:i:s");
    $msg = "ok";

     $check_query = $conn->query("SELECT * FROM event_min_max WHERE eventId = '$eventId'and eventName='$eventName' and sport_name ='$sport_name' and market_type ='$market_type' and marketId ='$marketId'");
    if (mysqli_num_rows($check_query) > 0) {

         $conn->query("update event_min_max SET min_bet='$min_bet', max_bet='$max_bet' , updated_at = '$datetime' where sport_name='$sport_name' and eventName='$eventName' and eventId='$eventId' and market_type='$market_type' and marketId='$marketId'");
    emitChangeInMaxBet($host, $options);

        $results = array(
            "status" => "$msg",
        );
        echo json_encode($results);
        exit;
    }else{
         $results = array(
        "status" => "does not exist",
        );

     echo json_encode($results);
        exit;
    }

}
?>