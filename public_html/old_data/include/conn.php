<?php

//error_reporting(0);error_reporting(E_ALL);ini_set("display_errors",1);ini_set("display_startup_errors",1);

$DB_host = "localhost";

$DB_user = "saffr247_olddata";
$DB_pass = "olddata@@987987.";
$DB_name = "saffr247_olddata";

$conn = new MySQLi($DB_host, $DB_user, $DB_pass, $DB_name);

if ($conn->connect_errno) {

  die("ERROR : -> " . $conn->connect_error);
}

$sitename_backup="Saffronexch247";

date_default_timezone_set('Asia/Kolkata');
ini_set('memory_limit', '-1');
define('SITE_NAME', 'Saffronexch247');
define('SITE_EMAIL', '11starexch.com@gmail.com');
define('SITE_EMAIL_PASS', 'kvcyiemrshamoojs');
define('SITE_EMAIL_HOST', 'smtp.gmail.com');
define('SITE_EMAIL_PORT', '25');
define('SITE_EMAIL_TO', 'symemon787877@icloud.com');

define('SITE_ID', 5);
/*define('SITE_IP', "http://starexch11.com:3002");

define('SITE_IP', "https://webdatastore.org:2053/");
*/
define('SITE_IP', "https://mininginfo.org:2053/");
define('SITE_IP2', "http://bigdatazone.org:3000");

define('GAME_IP', SITE_IP);
define('SPORTS_SOCKET', SITE_IP);




define('WEB_URL', "https://saffronexch247.com/");
define('MOBILE_URL', "https://saffronexch247.com/m/");
define('MOBILE_URLlogin', "https://saffronexch247.com/m/");
define('CASINO_DELAY_TIME', 3);
define('SKIP_FANCY', '30065956,30065961,30065962,30065965');

define('CASINO_DATA_URL', SITE_IP2 . '/getTeenpattiData');

define('VIDEO_URL', 'https://saffronexch247.com/mediaplayer/play.php?t=112233444&name=');

/* define('IFRAME_URL','https://premium.casinovid.in/diamondvideo/?id='); */
/* define('IFRAME_URL','https://vrnl.xyz/?params='); */
/* define('IFRAME_URL','https://vrnl.xyz/?params=');
define('A2020TEENPATTI_CODE', '8015,TP2020');
define('ODITEENPATTI_CODE',  '8001,TPONEDAY');
define('TESTTEENPATTI_CODE',  '8002,TEST');
define('OPENTEENPATTI_CODE', '8003,OPEN');

define('A2020POKER_CODE',  '8007,POKER2020');
define('ODIPOKER_CODE',  '8008,POKERONEDAY');
define('A6PLAYERPOKER_CODE',  '8009,POKER6PLAYER');

define('A32CARDSA_CODE',  '8006,32cards');
define('A32CARDSB_CODE',  '8024,32CARDSB');

define('LUCKY7A_CODE',  '8011,LUCKY7');
define('LUCKY7B_CODE',  '8017,LUCKY7B');

define('WORLI_CODE',  '8004,WORLI1');
define('INSTANTWORLI_CODE', '8005,WORLI2');

define('ANDARBAHAR_CODE', '8010,AB');
define('ANDARBAHAR2_CODE', '8019,AB2');

define('A2020DT_CODE', '8012,DRAGONTIGER');
define('A2020DT2_CODE', '8020,DRAGONTIGER20');
define('ODIDT_CODE', '8025,ONEDAYDRAGONTIGER');
define('DTL_CODE','8026,DRAGONTIGERLION');

define('AAA_CODE', '8013,AAA');
define('BTABLE_CODE', '8014,BOLLYWOOD');

define('A3CJ_CODE', '8016,3CARDSJ');

define('BACCARAT_CODE', '8022,BACCARAT');
define('BACCARAT2_CODE', '8023,BACCARAT2');

define('CASINOWAR_CODE', '8032,CASINOWAR');
define('CASINOMETER_CODE', '8018,CASINOMETER');
define('QUEEN_CODE', '8028,CASINOQUEEN');
define('RACE20_CODE', '8029,RACE2020');
define('CRICKET20_CODE', '8031,CRICKET20');
define('CRICKET5_CODE', '8030,CRICKET');
define('SUPEROVER_CODE', '8033,SUPEROVER'); */


define('IFRAME_URL1', 'https://alpha-g.qnsports.live/route/?id=');
define('IFRAME_URL', '');

define('A2020TEENPATTI_CODE', IFRAME_URL1 . 3030);
define('ODITEENPATTI_CODE', IFRAME_URL1 . 3031);
define('TESTTEENPATTI_CODE', IFRAME_URL1 . 3048);
define('OPENTEENPATTI_CODE', IFRAME_URL1 .  3049);

define('A2020POKER_CODE', IFRAME_URL1 . 3052);
define('ODIPOKER_CODE', IFRAME_URL1 . 3051);
define('A6PLAYERPOKER_CODE', IFRAME_URL1 . 3050);

define('A32CARDSA_CODE', IFRAME_URL1 . 3055);
define('A32CARDSB_CODE', IFRAME_URL1 . 3034);

define('LUCKY7A_CODE', IFRAME_URL1 . 3058);
define('LUCKY7B_CODE', IFRAME_URL1 . 3032);

define('WORLI_CODE', IFRAME_URL1 . 3054);
define('INSTANTWORLI_CODE', IFRAME_URL1 . 3040);

define('ANDARBAHAR_CODE', IFRAME_URL1 . 3053);
define('ANDARBAHAR2_CODE', IFRAME_URL1 . 3043);

define('A2020DT_CODE', IFRAME_URL1 . 3035);
define('A2020DT2_CODE', IFRAME_URL1 . 3059);
define('ODIDT_CODE', IFRAME_URL1 . 3057);
define('DTL_CODE', IFRAME_URL1 . 3047);

define('AAA_CODE', IFRAME_URL1 . 3056);
define('BTABLE_CODE', IFRAME_URL1 . 3041);
define('A3CJ_CODE', IFRAME_URL1 . 3039);
define('BACCARAT_CODE', IFRAME_URL1 . 3044);
define('BACCARAT2_CODE', IFRAME_URL1 . 3033);

define('CASINOWAR_CODE', IFRAME_URL1 . 3038);
define('QUEEN_CODE', IFRAME_URL1 . 3037);
define('RACE20_CODE', IFRAME_URL1 . 3036);
define('CRICKET5_CODE', IFRAME_URL1 . 3042);
define('SUPEROVER_CODE', IFRAME_URL1 . 3060);
define('CASINOMETER_CODE', IFRAME_URL1 . 3046);
define('CRICKET20_CODE', IFRAME_URL1 . 3045);

define('CARDS32B', 'https://saffronexch247.com/mediaplayer/play.php?t=112233444&name=502369599703580948450756');
define('A2020DT', 'https://saffronexch247.com/mediaplayer/play.php?t=112233444&name=275524931482564555418389');
define('ODIDT', 'https://saffronexch247.com/mediaplayer/play.php?t=112233444&name=464287942271098827854288');
define('ODIPOKER', 'https://saffronexch247.com/mediaplayer/play.php?t=112233444&name=757602834234699852109014');
define('SCORE_URL', 'https://sportsscore.onupdate.in/#/?');

define('ELECTION_MIN', 500);
define('ELECTION_MAX', 25000);
define('WHTELABEL_ID', 1);
define('WHTELABEL_PER', 100);
define('CONTROLLER_ID', 1);


define('SPORTS_DATA_URL', SITE_IP2 . 'getFancyData1?eventId=');
define('SPORTS_DATA1_URL', SITE_IP2 . 'getOddsData?eventId=');

defined('CENTRAL_PANEL_KEY') or define('CENTRAL_PANEL_KEY', '5124cf22ec8c61b79b3c46c90852c2b9');

defined('CACHE_TIME') or define('CACHE_TIME', '1615529353');


define('IPL_MARKET_ID', '1.199812143');
define('IPL_MARKET_NAME', 'IPL 2023');
/* define('IPL_EVENT_ID', '28127348'); */
define('IPL_EVENT_ID', '');
define('IPL_EVENT_TYPE_ID', '4');


define('FIFA_MARKET_ID', '1.145970106');
define('FIFA_MARKET_NAME', 'FIFA CUP 2022');
define('FIFA_EVENT_ID', '');
define('FIFA_EVENT_TYPE_ID', '1');



define('ELECTION_MARKET_ID', '1.171005151010');
define('ELECTION_MARKET_NAME', 'ELECTION');
define('ELECTION_EVENT_ID', '');
define('ELECTION_EVENT_TYPE_ID', '8');

$maintanance = 0;
$fetch_unser = $conn->query("select * from casino_under_maintanance limit 1");
if (mysqli_num_rows($fetch_unser) > 0) {
  $data_under = mysqli_fetch_assoc($fetch_unser);
  $maintanance = $data_under['type'];
}

define('CASINO_RESULT_TIMEOUT', 4000);
define('CASINO_MAINTENANCE', $maintanance);
define('CASINO_MAINTENANCE_MSG', "Under Maintenance");

/* $marquee="Due to some technical issue all the results of Casino War game from 10/09/2021 till 27/09/2021 have been calculated again, Incorrect results have been reverted"; */
$marquee = "Al masry vs Al ittihad(egy) and Shanghai east india vs Guangzhou, wrong rate bet will be  voided by Betfair";
$fetch_marquee = $conn->query("select * from marquee_master limit 1");
if (mysqli_num_rows($fetch_marquee) > 0) {
  $data_mar = mysqli_fetch_assoc($fetch_marquee);
  $marquee = $data_mar['marquee'];
}
define('SITE_MARQUEE', $marquee);
define('INSERT_ACCOUNTS_ZERO', false);

define('INSERT_ACCOUNTS_TEMP', true);
define('CHECK_CASINO_EXPOSURE', true);
define('CASINO_EXPOSURE_LIMIT', 1000000);
define('SOCCER_EXPOSURE_LIMIT', 500000);
define('TENNIS_EXPOSURE_LIMIT', 500000);

define('NEW_DATA_UNDER_MAINTAIN', 0);

$market_type_array = array(
  "2020TEENPATTI",
  "2020_DRAGON_TIGER",
  "2020_POKER",
  "32CARDS",
  "32CARDSB",
  "AB20",
  "AMAR_AKBAR_ANTHONY",
  "B_TABLE",
  "LUCKY7",
  "LUCKY7B",
  "ODITEENPATTI",
  "ODI_DRAGON_TIGER",
  "ODI_POKER",
  "OPENTEENPATTI",
  "TESTTEENPATTI",
);

error_reporting(0);
 

$white_list_data = array();


$white_list_data_mamu = array();


$casino_maintanace_list_data = array();
//include('flip_function.php');

$suspend_array = array('MATCH_ODDS' => 8, "BOOKMAKER_ODDS" => 1, "BOOKMAKER_SMALL_ODDS" => 2, "FANCY_ODDS" => 3, "KHADO_ODDS" => 4, "METER_ODDS" => 5, "FANCY1_ODDS" => 6, "ODDEVEN_ODDS" => 7);

define('BET_NOTIFY_EMAIL_ID', 'parikh.rushika@gmail.com');
define('PHYSICAL_PATH', 'http://157.230.249.179/~saffr247/');
define('BACKUP_LINK', '');
