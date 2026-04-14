<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
  |--------------------------------------------------------------------------
  | Display Debug backtrace
  |--------------------------------------------------------------------------
  |
  | If set to TRUE, a backtrace will be displayed along with php errors. If
  | error_reporting is disabled, the backtrace will not display, regardless
  | of this setting
  |
 */
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
  |--------------------------------------------------------------------------
  | File and Directory Modes
  |--------------------------------------------------------------------------
  |
  | These prefs are used when checking and setting modes when working
  | with the file system.  The defaults are fine on servers with proper
  | security, but you may wish (or even need) to change the values in
  | certain environments (Apache running a separate process for each
  | user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
  | always be used to set the mode correctly.
  |
 */
defined('FILE_READ_MODE') OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE') OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE') OR define('DIR_WRITE_MODE', 0755);

/*
  |--------------------------------------------------------------------------
  | File Stream Modes
  |--------------------------------------------------------------------------
  |
  | These modes are used when working with fopen()/popen()
  |
 */
defined('FOPEN_READ') OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE') OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE') OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE') OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE') OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE') OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT') OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT') OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
  |--------------------------------------------------------------------------
  | Exit Status Codes
  |--------------------------------------------------------------------------
  |
  | Used to indicate the conditions under which the script is exit()ing.
  | While there is no universal standard for error codes, there are some
  | broad conventions.  Three such conventions are mentioned below, for
  | those who wish to make use of them.  The CodeIgniter defaults were
  | chosen for the least overlap with these conventions, while still
  | leaving room for others to be defined in future versions and user
  | applications.
  |
  | The three main conventions used for determining exit status codes
  | are as follows:
  |
  |    Standard C/C++ Library (stdlibc):
  |       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
  |       (This link also contains other GNU-specific conventions)
  |    BSD sysexits.h:
  |       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
  |    Bash scripting:
  |       http://tldp.org/LDP/abs/html/exitcodes.html
  |
 */
defined('EXIT_SUCCESS') OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR') OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG') OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE') OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS') OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT') OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE') OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN') OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX') OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


defined('LIMIT') OR define('LIMIT', 100);
defined('MASTER_URL') OR define('MASTER_URL', '/admin');
defined('MASTER_DIR') OR define('MASTER_DIR', 'admin');
defined('SPORTS') OR define('SPORTS', serialize(array(4 => 'Cricket', 1 => 'Football', 2 => 'Tennis', 3 => 'Other')));
defined('CONTROLLER_ID') OR define('CONTROLLER_ID', 1);
defined('CONTROLLER_POWER') OR define('CONTROLLER_POWER', 6);
defined('CONTROLLER_EMAIL_ID') OR define('CONTROLLER_EMAIL_ID', 'Controller');
defined('WHTELABEL_ID') OR define('WHTELABEL_ID', 1);
defined('WHTELABEL_PER') OR define('WHTELABEL_PER', 100);
defined('WHTELABEL_POWER') OR define('WHTELABEL_POWER', 5);
defined('WHTELABEL_EMAIL_ID') OR define('WHTELABEL_EMAIL_ID', 'Kuber');
/*defined('SITE_IP') OR define('SITE_IP', 'https://datafeedstore.org:2053/');*/
defined('SITE_IP') OR define('SITE_IP', 'https://trubet9.bet:2053/');
defined('SITE_IP2') OR define('SITE_IP2', 'http://bigdatazone.org:3000');

define('ACCOUNT_DATABASE_NAME', 'accounts_temp');
define('TELEGRAM_BOT', '@Saffronexch247_bot');
define('TELEGRAM_link_BOT', 'Saffronexch247_bot');
define('AUTH_CODE_URL', 'https://saffronexch247.com:8443/api/v1/');
define('LOGINDEMOID', "8");


define('GAME_IP', SITE_IP);

define('WEB_URL', "https://saffronexch247.com/");
define('PROJECTNAME', "Saffronexch247");
define('SUFFIXNAME', ".com");
/*define('tv_url', 'https://dpmatka.in/anm.php?type=video');*/

define('GOOGLE_SITE_KEY', "6LcrsdQZAAAAABDYp8_GLhoZ5BYqX7g5u5oDWXlx");
define('GOOGLE_SECRET_KEY', "6LcrsdQZAAAAABkKxch1yHdMsp2EU1dkKEKRX7CY");

define('SKIP_FANCY', '30065956,30065961,30065962,30065965');

define('IPL_MARKET_ID', '828856279');
define('IPL_MARKET_NAME', 'Indian Premier League');
define('IPL_EVENT_ID', '');
define('IPL_EVENT_TYPE_ID', '4');


define('ELECTION_MARKET_ID', '571591658');
define('ELECTION_MARKET_NAME', 'ICC Champions Trophy');
define('ELECTION_EVENT_ID', '');
define('ELECTION_EVENT_TYPE_ID', '4');

define('SITE_ID', 6);
define('INSERT_ACCOUNTS_TEMP', true);
define('CASINO_SET_INTERVAL', 5000);



$game_list = array(
	"teen20c" => "20-20 Teenpatti C",
	"btable2" => "Bollywood Casino 2",
	"ourroullete" => "Unique Roulette",
	"superover3" => "Mini SUPER OVER",
	"goal" => "Goal",
	"lucky15" => "LUCKY 15",
	"superover2" => "SUPER OVER 2",
	"teen41" => "Queen Top Open Teenpatti",
	"teen42" => "Jack Top Open Teenpatti",
	"sicbo2" => "Sic Bo 2",
	"teen33" => "Instant Teenpatti 3.0",
	"sicbo" => "Sic Bo",
	"ballbyball" => "Ball by Ball",
	"teen32" => "Instant Teenpatti 2.0",
	"teen" => "Teenpatti 1-day",
	"teen20" => "20-20 Teenpatti",
	"teen9" => "Test Teenpatti",
	"teen8" => "Teenpatti Open",
	"poker" => "1-Day Poker",
	"poker20" => "20-20 Poker",
	"poker6" => "6 Player Poker",
	"baccarat" => "Baccarat",
	"baccarat2" => "Baccarat 2",
	"dt20" => "20-20 Dragon Tiger",
	"dt6" => "1 Day Dragon Tiger",
	"dtl20" => "20-20 Dragon Tiger Lion",
	"dt202" => "20-20 Dragon Tiger 2",
	"card32" => "32 Cards - A",
	"card32eu" => "32 Cards- B",
	"ab20" => "Andar Bahar",
	"abj" => "Andar Bahar 2",
	"lucky7" => "Lucky 7",
	"lucky7eu" => "Lucky 7 B",
	"3cardj" => "3 Cards Judgement",
	"War" => "Casino War",
	"worli" => "Worli Matka",
	"worli2" => "Instant Worli",
	"aaa" => "Amar Akbar Anthony",
	"ddb" => "Bollywood Table",
	"btable" => "B_TABLE",
	"lottcard" => "Lottery",
	"cricketv3" => "AUS vs IND 5Five Cricket",
	"cmatch20" => "20-20 Cricket Match",
	"cmeter" => "Casino Meter",
	"teen6" => "Teenpatti - 2.0",
	"queen" => "Queen",
	"race20" => "Race 20-20",
	"lucky7eu2" => "Lucky 7 c",
	"superover" => "ENG VS RSA SUPER OVER",
	"trap" => "The Trap",
	"patti2" => "2 Cards Teenpatti",
	"teensin" => "29Card Baccarat",
	"teenmuf" => "Muflis Teenpatti",
	"race17" => "Race to 17",
	"teen20b" => "20-20 Teenpatti B",
	"trio" => "Trio",
	"notenum" => "Note Number",
	"kbc" => "K.B.C",
	"teen120" => "1 CARD 20-20",
	"teen1" => "1 CARD ONE-DAY",
	"ab3" => "ANDAR BAHAR 50 CARDS",
	"ab4" => "ANDAR BAHAR 150 CARDS",
	"aaa2" => "Amar Akbar Anthony 2",
	"race2" => "Race to 2nd",
	"teen3" => "Instant Teenpatti",
	"dum10" => "Dus ka Dum",
	"cmeter1" => "1 Card Meter",

);
defined('GAME_LIST') OR define('GAME_LIST', serialize($game_list));

$game_list2 = array(
	"TEEN20C" => "teen20c",
	"B_TABLE2" => "btable2",
	"ourroullete" => "Unique Roulette",
	"SUPER_OVER3" => "superover3",
	"GOAL" => "goal",
	"LUCKY15" => "lucky15",
	"SUPER_OVER2" => "superover2",
	"TEEN41" => "teen41",
	"TEEN42" => "teen42",
	"SICBO2" => "sicbo2",
	"TEEN33" => "teen33",
	"SICBO" => "sicbo",
	"BALLBYBALL" => "ballbyball",
	"TEEN32" => "teen32",
	"ODITEENPATTI" => "teen",
	"2020TEENPATTI" => "teen20",
	"TESTTEENPATTI" => "teen9",
	"OPENTEENPATTI" => "teen8",
	"ODI_POKER" => "poker",
	"2020_POKER" => "poker20",
	"6_PLAYER_POKER" => "poker6",
	"BACCARAT" => "baccarat",
	"BACCARAT2" => "baccarat2",
	"2020_DRAGON_TIGER" => "dt20",
	"ODI_DRAGON_TIGER" => "dt6",
	"DTL20" => "dtl20",
	"2020_DRAGON_TIGER2" => "dt202",
	"32CARDS" => "card32",
	"32CARDSB" => "card32eu",
	"AB20" => "ab20",
	"ABJ" => "abj",
	"LUCKY7" => "lucky7",
	"LUCKY7B" => "lucky7eu",
	"3_CARD_J" => "3cardj",
	"CASINO_WAR" => "War",
	"WORLI" => "worli",
	"INSTANT_WORLI" => "worli2",
	"AMAR_AKBAR_ANTHONY" => "aaa",
	"ddb" => "Bollywood Table",
	"B_TABLE" => "btable",
	"LOTTCARD" => "lottcard",
	"FIVE_5_CRICKET" => "cricketv3",
	"2020_CRICKET_MATCH" => "cmatch20",
	"CASINO_METER" => "cmeter",
	"TEEN6" => "teen6",
	"QUEEN" => "queen",
	"RACE_20" => "race20",
	"LUCKY7C" => "lucky7eu2",
	"SUPER_OVER" => "superover",
	"TRAP" => "trap",
	"PATTI2" => "patti2",
	"TEENSIN" => "teensin",
	"TEENMUF" => "teenmuf",
	"RACE17" => "race17",
	"TEEN20B" => "teen20b",
	"TRIO" => "trio",
	"NOTENUM" => "notenum",
	"KBC" => "kbc",
	"TEEN120" => "teen120",
	"TEEN1" => "teen1",
	"AB3" => "ab3",
	"AB4" => "ab4",
	"AMAR_AKBAR_ANTHONY2" => "aaa2",
	"RACE2" => "race2",
	"TEEN3" => "teen3",
	"DUM10" => "dum10",
	"CMETER1" => "cmeter1",
);
defined('GAME_LIST2') OR define('GAME_LIST2', json_encode($game_list2));

define('VIDEO_URL', "https://saffronexch247.com/mediaplayer/play.php?name=");
/* define('AB', '284317742543931229456917&time=1608200610');
define('LUCKY7A','496814920128696630121360');
define('LUCKY7B','335577895901041970344384');
define('TESTTEENPATTI','557083887946595637249943');
define('A2020DTL','563010125372078365957264');
define('ODITEENPATTI','302911060298761900425973');
define('A2020TEENPATTI','768881501761074579675730');

define('A2020POKER','316798212711669756033128');
define('BOLLYWOOD','740342552305700461617452');
define('CARDS32A','573607726723975211389290');

define('AAA','276495535076795674163010');

define('DTL','https://saffronexch247.com/mediaplayer/play.php?t=112233444&name=563010125372078365957264');


define('CARDS32B','https://saffronexch247.com/mediaplayer/play.php?t=112233444&name=502369599703580948450756');
define('A2020DT','https://saffronexch247.com/mediaplayer/play.php?t=112233444&name=275524931482564555418389');
define('ODIDT','https://saffronexch247.com/mediaplayer/play.php?t=112233444&name=464287942271098827854288');
define('ODIPOKER','https://saffronexch247.com/mediaplayer/play.php?t=112233444&name=757602834234699852109014');
 */

/* define('IFRAME_URL','https://premium.casinovid.in/diamondvideo/?id='); */
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

define('CASINOWAR_CODE', '8032,WAR');
define('CASINOMETER_CODE', '8018,CASINOMETER');
define('QUEEN_CODE', '8028,QUEEN');
define('RACE20_CODE', '8029,RACE2020');
define('CRICKET20_CODE', '8031,CRICKET20');
define('CRICKET5_CODE', '8030,CRICKET');
 */

define('tv_url', 'https://e765432.diamondcricketid.com/tvd247.php?1=1');

define('IFRAME_URL1', 'https://casino.diamondcricketid.com/swiftdizire/?id=');
// define('IFRAME_URL1','https://alpha-g.qnsports.live/route/?id=');
// define('IFRAME_URL','');


define('IFRAME_URL_SET', "true");
define('IFRAME_URL', '');

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
define('TEENJOKER_CODE', IFRAME_URL1 . 4003);
define('POISON20_CODE', IFRAME_URL1 . 4006);

define('A2020TEENPATTI_CODE', IFRAME_URL1 . 3030);
define('ODITEENPATTI_CODE', IFRAME_URL1 . 3031);
define('TESTTEENPATTI_CODE', IFRAME_URL1 . 3048);
define('OPENTEENPATTI_CODE', IFRAME_URL1 . 3049);

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