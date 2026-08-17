<?php
exit();
include('../include/conn.php');
error_reporting(0);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
function unique_array($my_array, $key, $gstatuss)
{
    $result = array();
    $i = 0;
    $key_array = array();

    foreach ($my_array as $val) {

        /* if (array_key_exists('gtype', $val) && strpos($val['gtype'], 'poker') !== false) {

            continue;
        }
        if (array_key_exists('gtype', $val) && strpos($val['gtype'], 'teen') !== false) {

            continue;
        } */
        /*  if ($gstatuss != $val[$key]) {
            continue;
        } else { */
        if (!in_array($val[$key], $key_array)) {
            $key_array[$i] = $val[$key];
            $result[$i] = $val;
        }
        $i++;
        /*  } */
    }
    return $result;
}
function myfunction($products, $field, $value)
{
    foreach ($products as $key => $product) {
        if ($product[$field] === $value)
            return $key;
    }
    return false;
}

/* $students = array(
    0 => array("city_id" => "1", "name" => "Sara",  "mobile_num" => "1111111111"),
    1 => array("city_id" => "2", "name" => "Robin", "mobile_num" => "2222222222"),
    2 => array("city_id" => "1", "name" => "Sonia", "mobile_num" => "3333333333"),
);

print_r(unique_array($students, "city_id")); */

$offset = 0;
if (isset($_REQUEST['offset'])) {
    $offset = $_REQUEST['offset'];
}
$bet_id_array = array();
$gtpe_array = array();
$bet_id_array_new = array();
$ptype = array('poker', 'teen', 'dt6', 'abj', 'card32', 'dt6','card32eu','poker9','poker6');
//$ptype = array();
$where = "log_time > '2022-02-17 11:59:59' and user_id=19985";
//$where = '1';
$fetch_query = $conn->query("select *  from bet_success_log where $where limit 200000 offset $offset");
while ($fetch_data = mysqli_fetch_assoc($fetch_query)) {
    $api_data = $fetch_data['api_data'];
    $log_details = $fetch_data['log_details'];
    $log_details = json_decode($log_details);
    $marketId = $log_details->marketId;

    $bet_id = $fetch_data['bet_id'];
    $user_id = $fetch_data['user_id'];
    $api_data = json_decode($api_data);
    $details_t1 = $api_data->odds->t1[0]->gtype;
    if (in_array($details_t1, $ptype)) {

        continue;
    }

    $details = $api_data->odds->t2;
    $autotime = $api_data->odds->t1[0]->autotime;
    $c1_value = $api_data->odds->t1[0]->C1;
    $new_array = objectToArray($details);
    $arr_index = myfunction($new_array, 'sid', $marketId);
    $gstatuss = $new_array[$arr_index]['gstatus'];

    $details = unique_array($new_array, 'gstatus', $gstatuss);


    if (count($details) > 1 && intval($c1_value) != 1 ) {
        $bet_id_array[] = array('bet_id' => $bet_id, 'game_type' => $details_t1, 'user_id' => $user_id,"autotime" => intval($autotime));
        $gtpe_array[] = $details_t1;
        $bet_id_array_new[] = $bet_id;
    }
}
echo "HI";
echo "<pre>";
print_r($bet_id_array);
echo "</pre>";

echo implode(',', $bet_id_array_new);

function objectToArray($d)
{
    if (is_object($d)) {
        // Gets the properties of the given object
        // with get_object_vars function
        $d = get_object_vars($d);
    }

    if (is_array($d)) {
        /*
        * Return array converted to object
        * Using __FUNCTION__ (Magic constant)
        * for recursive call
        */
        return array_map(__FUNCTION__, $d);
    } else {
        // Return array
        return $d;
    }
}
