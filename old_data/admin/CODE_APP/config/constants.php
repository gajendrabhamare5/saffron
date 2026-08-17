<?php

defined('BASEPATH') or exit('No direct script access allowed');

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
defined('SHOW_DEBUG_BACKTRACE') or define('SHOW_DEBUG_BACKTRACE', TRUE);

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
defined('FILE_READ_MODE') or define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') or define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE') or define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE') or define('DIR_WRITE_MODE', 0755);

/*
  |--------------------------------------------------------------------------
  | File Stream Modes
  |--------------------------------------------------------------------------
  |
  | These modes are used when working with fopen()/popen()
  |
 */
defined('FOPEN_READ') or define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE') or define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE') or define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE') or define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE') or define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE') or define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT') or define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT') or define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

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
defined('EXIT_SUCCESS') or define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR') or define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG') or define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE') or define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS') or define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') or define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT') or define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE') or define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN') or define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX') or define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

define('WEB_URL', "https://saffronexch247.com/old_data/");
defined('LIMIT') or define('LIMIT', 100);
defined('MASTER_URL') or define('MASTER_URL', WEB_URL . 'admin');
defined('MASTER_DIR') or define('MASTER_DIR', 'admin');
defined('SPORTS') or define('SPORTS', serialize(array(4 => 'Cricket', 1 => 'Football', 2 => 'Tennis', 3 => 'Other')));
defined('CONTROLLER_ID') or define('CONTROLLER_ID', 1);
defined('CONTROLLER_POWER') or define('CONTROLLER_POWER', 6);
defined('CONTROLLER_EMAIL_ID') or define('CONTROLLER_EMAIL_ID', 'Controller');
defined('WHTELABEL_ID') or define('WHTELABEL_ID', 1);
defined('WHTELABEL_PER') or define('WHTELABEL_PER', 100);
defined('WHTELABEL_POWER') or define('WHTELABEL_POWER', 5);
defined('WHTELABEL_EMAIL_ID') or define('WHTELABEL_EMAIL_ID', 'Kuber');
/*defined('SITE_IP') OR define('SITE_IP', 'https://datafeedstore.org:2053/');*/
defined('SITE_IP') or define('SITE_IP', 'https://mininginfo.org:2053/');
defined('SITE_IP2') or define('SITE_IP2', 'http://webcraze.net:3000');

define('ACCOUNT_DATABASE_NAME', 'accounts_temp');


define('GAME_IP', SITE_IP);

define('PROJECTNAME', "Saffronexch247");
define('SUFFIXNAME', ".com");


define('GOOGLE_SITE_KEY', "6LcrsdQZAAAAABDYp8_GLhoZ5BYqX7g5u5oDWXlx");
define('GOOGLE_SECRET_KEY', "6LcrsdQZAAAAABkKxch1yHdMsp2EU1dkKEKRX7CY");

define('SKIP_FANCY', '30065956,30065961,30065962,30065965');

define('ELECTION_MARKET_ID', '1.171005151010');
define('ELECTION_MARKET_NAME', 'ELECTION');
define('ELECTION_EVENT_ID', '');
define('ELECTION_EVENT_TYPE_ID', '8');

define('IPL_MARKET_ID', '1.199812143');
define('IPL_MARKET_NAME', 'IPL 2023');
/* define('IPL_EVENT_ID', '28529194'); */
define('IPL_EVENT_ID', '28127348');
define('IPL_EVENT_TYPE_ID', '4');

define('SITE_ID', 5);
define('INSERT_ACCOUNTS_TEMP', true);
define('CASINO_SET_INTERVAL', 5000);

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
define('CASINOMETER_CODE', IFRAME_URL1 . 3046);
define('CRICKET20_CODE', IFRAME_URL1 . 3045);
define('CASINO_RESULT_TIMEOUT', 3000);
define('SUPEROVER_CODE', IFRAME_URL1 . 3060);
