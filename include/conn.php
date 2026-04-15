<?php

//error_reporting(0);error_reporting(E_ALL);ini_set("display_errors",1);ini_set("display_startup_errors",1);

/* $DB_host = "167.99.67.72";

$DB_user = "saffr247_other1";
$DB_pass = "H8EOw5xhZifT"; 
$DB_name = "saffr247_bet"; */

$DB_host = "localhost";

$DB_user = "root";
$DB_pass = ""; 
$DB_name = "saffron_bet";

$conn = new MySQLi($DB_host, $DB_user, $DB_pass, $DB_name);

if ($conn->connect_errno) {

  die("ERROR : -> " . $conn->connect_error);
}


$sitename_backup="Saffronexch247";

date_default_timezone_set('Asia/Kolkata');
ini_set('memory_limit', '-1');
define('SITE_NAME', 'Saffronexch247');
/*define('SITE_EMAIL', 'funbet9.com@gmail.com');
define('SITE_EMAIL_PASS', 'ayuvvwwbeoqbqqip');*/
define('SITE_EMAIL', 'Batmann09877@gmail.com');
define('SITE_EMAIL_PASS', 'eufqfroltrqcqqrx');
define('SITE_EMAIL_HOST', 'smtp.gmail.com');
define('SITE_EMAIL_PORT', '587');
define('SITE_EMAIL_TO', 'trubet09@gmail.com');
 
define('SITE_ID', 6);
/* $rand_number = rand(0,2);	

$randomSportSocketArray = ["https://dataservicedetails.com:2053/","https://trubet9.bet:2053/","https://setyourdata.org:2053/"];
	
define('SITE_IP', $randomSportSocketArray[$rand_number]); */
define('SITE_IP', "https://trubet9.bet:2053/");
define('SITE_SPORTS_IP', "https://trubet9.bet:8443/");
define('SITE_IP2', "http://bigdatazone.org:3000");

define('GAME_IP', SITE_IP);
define('SPORTS_SOCKET', SITE_IP);
define('LOGINDEMOID', "8");
define('LOGINDEMONAME', "demo");
define('LOGINDEMOPASS', "Abcd@@1234");




define('WEB_URL', "http://localhost/gaju/saffron/");
define('MOBILE_URL', "http://localhost/gaju/saffron/m/");
define('MOBILE_URLlogin', "http://localhost/gaju/saffron/m/");
define('CASINO_DELAY_TIME', 3);
define('SKIP_FANCY', '30065956,30065961,30065962,30065965');

define('CASINO_DATA_URL', SITE_IP2 . '/getTeenpattiData');
define('RESULT_DATA_URL', SITE_IP2 . '/getTeenpattiResult');

define('VIDEO_URL', 'https://saffronexch247.com/mediaplayer/play.php?t=112233444&name=');
define('tv_url', 'https://e765432.diamondcricketid.com/tvd247.php?1=1');

define('IFRAME_URL1', 'https://casino.diamondcricketid.com/swiftdizire/?id=');
define('IFRAME_URL_SET', "true");
define('IFRAME_URL', '');
/* define('AUTH_CODE_URL', 'http://159.65.143.49:3001/api/v1/'); */
define('AUTH_CODE_URL', 'https://saffronexch247.com:8443/api/v1/');
define('TELEGRAM_BOT', '@Saffronexch247_bot');
define('TELEGRAM_link_BOT', 'Saffronexch247_bot');

define('TEENSIN_CODE', IFRAME_URL1 . 3072);
define('TEEN20C_CODE', IFRAME_URL1 . 3073);
define('LUCKY15_CODE', IFRAME_URL1 . 3074);
define('LUCKY7EU2_CODE', IFRAME_URL1 . 3075);
define('TEEN41_CODE', IFRAME_URL1 . 3076);
define('TEEN42_CODE', IFRAME_URL1 . 3077);
define('TEEN33_CODE', IFRAME_URL1 . 3078);
define('TEEN3_CODE', IFRAME_URL1 . 3079);
define('TEEN32_CODE', IFRAME_URL1 . 3080);
define('TEENMUF_CODE', IFRAME_URL1 . 3081);
define('PATTI2_CODE', IFRAME_URL1 . 3082);
define('TEEN6_CODE', IFRAME_URL1 . 3083);
define('AB4_CODE', IFRAME_URL1 . 3084);
define('AB3_CODE', IFRAME_URL1 . 3085);
define('SUPEROVER2_CODE', IFRAME_URL1 . 3086);
define('GOAL_CODE', IFRAME_URL1 . 3087);
define('SUPEROVER3_CODE', IFRAME_URL1 . 3088);
define('CMETER1_CODE', IFRAME_URL1 . 3089);
define('BTABLE2_CODE', IFRAME_URL1 . 3070);
define('AAA2_CODE', IFRAME_URL1 . 3090);
define('LOTTCARD_CODE', IFRAME_URL1 . 3091);
define('RACE2_CODE', IFRAME_URL1 . 3092);
define('RACE17_CODE', IFRAME_URL1 . 3093);
define('SICBO_CODE', IFRAME_URL1 . 3094);
define('SICBO2_CODE', IFRAME_URL1 . 3095);
define('DUM10_CODE', IFRAME_URL1 . 3096);
define('TEEN1_CODE', IFRAME_URL1 . 3097);
define('TEEN120_CODE', IFRAME_URL1 . 3098);
define('KBC_CODE', IFRAME_URL1 . 3099);
define('NOTENUM_CODE', IFRAME_URL1 . 4000);
define('TRIO_CODE', IFRAME_URL1 . 4001);
define('TRAP_CODE', IFRAME_URL1 . 4002);
define('JOKER20_CODE', IFRAME_URL1 . 4003);
define('JOKER1_CODE', IFRAME_URL1 . 4004);
define('TEENJOKER_CODE', IFRAME_URL1 . 4005);
define('POISON20_CODE', IFRAME_URL1 . 4006);
define('TEEN20B_CODE', IFRAME_URL1 . 4007);

define('ROULETTE11_CODE', IFRAME_URL1 . 4021);
define('ROULETTE13_CODE', IFRAME_URL1 . 4020);
define('OURROULLETE_CODE', IFRAME_URL1 . 4022);

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
define('BALLBYBALL_CODE', IFRAME_URL1 . 3061);

define('LUCKY5_CODE', IFRAME_URL1 . 3062);
define('POISON_CODE', IFRAME_URL1 . 3063);
define('TEENUNIQUE_CODE', IFRAME_URL1 . 3064);
define('JOKER120_CODE', IFRAME_URL1 . 3065);
define('ROULETTE12_CODE', IFRAME_URL1 . 3066);

define('TEEN62_CODE', IFRAME_URL1 . 4008);
define('WORLI3_CODE', IFRAME_URL1 . 4009);
define('DOLIDANA_CODE', IFRAME_URL1 . 4010);
define('MOGAMBO_CODE', IFRAME_URL1 . 4011);
define('TEEN20V1_CODE', IFRAME_URL1 . 4012);

define('CARDS32B', 'https://saffronexch247.com/mediaplayer/play.php?t=112233444&name=502369599703580948450756');
define('A2020DT', 'https://saffronexch247.com/mediaplayer/play.php?t=112233444&name=275524931482564555418389');
define('ODIDT', 'https://saffronexch247.com/mediaplayer/play.php?t=112233444&name=464287942271098827854288');
define('ODIPOKER', 'https://saffronexch247.com/mediaplayer/play.php?t=112233444&name=757602834234699852109014');
define('SCORE_URL', 'https://sportsscore.onupdate.in/#/?');
define('LATEST_SCORE_URL', 'https://e765432.diamondcricketid.com/anm.php?type=scorecard');

define('ELECTION_MIN', 500);
define('ELECTION_MAX', 25000);
define('WHTELABEL_ID', 1);
define('WHTELABEL_PER', 100);
define('CONTROLLER_ID', 1);


define('SPORTS_DATA_URL', SITE_IP2 . '/getFancyData1?eventId=');
define('SPORTS_DATA1_URL', SITE_IP2 . '/getOddsData?eventId=');

defined('CENTRAL_PANEL_KEY') or define('CENTRAL_PANEL_KEY', '5124cf22ec8c61b79b3c46c90852c2b9');

$cache_time=1;
defined('CACHE_TIME') or define('CACHE_TIME', $cache_time);


define('IPL_MARKET_ID', '828856279');
define('IPL_MARKET_NAME', 'Indian Premier League');
define('IPL_EVENT_ID', '');
define('IPL_EVENT_TYPE_ID', '4');


define('ELECTION_MARKET_ID', '571591658');
define('ELECTION_MARKET_NAME', 'ICC Champions Trophy');
define('ELECTION_EVENT_ID', '');
define('ELECTION_EVENT_TYPE_ID', '4');


define('ELECTION_EVENT_ID_NEW', '517807477');
define('ELECTION_MARKET_ID_NEW', '517807477');
define('ELECTION_MARKET_NAME_NEW', 'Bihar Election 2025');


define('IPL_MARKET_ID_NEW', '');
define('IPL_EVENT_TYPE_ID_NEW', '');
define('IPL_MARKET_NAME_NEW', 'IPL 2026');


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

$new_casino ="'2020TEENPATTI','2020_POKER','ODI_POKER','6_PLAYER_POKER','LUCKY15','OPENTEENPATTI','CASINO_WAR','DTL20','CASINO_METER','2020_CRICKET_MATCH','INSTANT_WORLI','RACE_20','SUPER_OVER','FIVE_5_CRICKET','LUCKY7C','GOAL','SUPER_OVER3','TEEN41','TEEN42','SICBO2','SICBO','SUPER_OVER2','TEEN33','TEEN32','TEEN6','LOTTCARD','TRAP','PATTI2','TEENSIN','TEENMUF','RACE17','TEEN20B','TRIO','NOTENUM','KBC','TEEN120','TEEN1','AMAR_AKBAR_ANTHONY2','RACE2','TEEN3','DUM10','TEEN20C','CMETER1','ODITEENPATTI','B_TABLE2','ROULETTE13','ROULETTE12','ROULETTE12','OURROULLETE','DOLIDANA','RACE20','POISON20','POISON','MOGAMBO','TEENUNIQUE'";
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
$game_list_fullName=array(
	"teen20c"=>"20-20 Teenpatti C",
	"btable2"=>"Bollywood Casino 2",
	"ourroullete"=>"Unique Roulette",
	"superover3"=>"Mini SUPER OVER",
	"goal"=>"Goal",
	"ab204"=>"Andar Bahar",
	"lucky15"=>"LUCKY 15",
	"superover2"=>"SUPER OVER 2",
	"teen41"=>"Queen Top Open Teenpatti",
	"teen42"=>"Jack Top Open Teenpatti",
	"sicbo2"=>"Sic Bo 2",
	"teen33"=>"Instant Teenpatti 3.0",
	"sicbo"=>"Sic Bo",
	"ballbyball"=>"Ball by Ball",
	"teen32"=>"Instant Teenpatti 2.0",
	"teen"=>"Teenpatti 1-day",
	"teen20"=>"20-20 Teenpatti",
	"teen9"=>"Test Teenpatti",
	"teen8"=>"Teenpatti Open",
	"poker"=>"1-Day Poker",
	"poker20"=>"20-20 Poker",
	"poker6"=>"6 Player Poker",
	"baccarat"=>"Baccarat",
	"baccarat2"=>"Baccarat 2",
	"dt20"=>"20-20 Dragon Tiger",
	"dt6"=>"1 Day Dragon Tiger",
	"dtl20"=>"20-20 Dragon Tiger Lion",
	"dt202"=>"20-20 Dragon Tiger 2",
	"card32"=>"32 Cards - A",
	"card32eu"=>"32 Cards- B",
	"ab20"=>"Andar Bahar",
	"abj"=>"Andar Bahar 2",
	"lucky7"=>"Lucky 7",
	"lucky7eu"=>"Lucky 7 B",
	"3cardj"=>"3 Cards Judgement",
	"War"=>"Casino War",
	"worli"=>"Worli Matka",
	"worli2"=>"Instant Worli",
	"aaa"=>"Amar Akbar Anthony",
	"ddb"=>"Bollywood Table",
	"btable"=>"B_TABLE",
	"lottcard"=>"Lottery",
	"cricketv3"=>"AUS vs IND 5Five Cricket",
	"cmatch20"=>"20-20 Cricket Match",
	"cmeter"=>"Casino Meter",
	"teen6"=>"Teenpatti - 2.0",
	"queen"=>"Queen",
	"race20"=>"Race 20-20",
	"lucky7eu2"=>"Lucky 7 c",
	"superover"=>"ENG VS RSA SUPER OVER",
	"trap"=>"The Trap",
	"patti2"=>"2 Cards Teenpatti",
	"teensin"=>"29Card Baccarat",
	"teenmuf"=>"Muflis Teenpatti",
	"race17"=>"Race to 17",
	"teen20b"=>"20-20 Teenpatti B",
	"trio"=>"Trio",
	"notenum"=>"Note Number",
	"kbc"=>"K.B.C",
	"teen120"=>"1 CARD 20-20",
	"teen1"=>"1 CARD ONE-DAY",
	"ab3"=>"ANDAR BAHAR 50 CARDS",
	"ab4"=>"ANDAR BAHAR 150 CARDS",
	"aaa2"=>"Amar Akbar Anthony 2",
	"race2"=>"Race to 2nd",
	"teen3"=>"Instant Teenpatti",
	"dum10"=>"Dus ka Dum",
	"cmeter1"=>"1 Card Meter",
	"teenjoker"=>"Teenpatti Joker",
	"dolidana"=>"DOLI DANA",
	"poison"=>"Teenpatti Poison One Day",
	"poison20"=>"Teenpatti Poison 20-20",
	"mogambo"=>"Mogambo",
	"teenunique"=>"Unique Teenpatti",
);


 

$white_list_data = array();


$white_list_data_mamu = array();


$casino_maintanace_list_data = array();
//include('flip_function.php');

$suspend_array = array('MATCH_ODDS' => 8, "BOOKMAKER_ODDS" => 1, "BOOKMAKER_SMALL_ODDS" => 2, "FANCY_ODDS" => 3, "KHADO_ODDS" => 4, "METER_ODDS" => 5, "FANCY1_ODDS" => 6, "ODDEVEN_ODDS" => 7);

define('BET_NOTIFY_EMAIL_ID', 'parikh.rushika@gmail.com');
define('PHYSICAL_PATH', 'http://178.128.85.43/~saffron/');
define('BACKUP_LINK', '');
