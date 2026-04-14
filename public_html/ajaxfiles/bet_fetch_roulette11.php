	<?php
    include('../include/conn.php');
    include "../session.php";
    $user_id = $_SESSION['CLIENT_LOGIN_ID'];
    $eventType = $conn->real_escape_string($_POST['eventType']);
    $eventId = $conn->real_escape_string($_POST['eventId']);

    $count_total_bet=0;
    $open_bet_data=array();
    $get_all_open_bet_data2 = $conn->query("SELECT market_id,bet_stack FROM bet_teen_details where 1=1 and event_type='$eventType' and user_id=$user_id and bet_status=1 and event_id = $eventId order by bet_time desc");
    if (mysqli_num_rows($get_all_open_bet_data2) > 0) {
        while ($fetch_open_bet_data2 = mysqli_fetch_assoc($get_all_open_bet_data2)) {
            $count_total_bet++;
            $market_id=$fetch_open_bet_data2['market_id'];
            if (!isset($open_bet_data[$market_id])) {
                $open_bet_data[$market_id] = 0;
            }
            $open_bet_data[$market_id] += (int)$fetch_open_bet_data2['bet_stack'];
        }
    }


    if ($open_bet_data != null) {
        $return_array = array(
            "status" => 'ok',
            "open_bet_data" => $open_bet_data,
            "count_total_bet" => $count_total_bet,
        );
    } else {
        $return_array = array(
            "status" => 'error',
             "count_total_bet" => $count_total_bet,
        );
    }
    echo json_encode($return_array);
    ?>