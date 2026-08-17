<?php
include("../include/conn.php");
include("../include/flip_function.php");
include("../session.php");
$user_id = isset($_SESSION['CLIENT_LOGIN_ID']) ? (int)$_SESSION['CLIENT_LOGIN_ID'] : 0;
$parentDL = 0;
$parentMDL = 0;
$parentSuperMDL = 0;
$parentKingAdmin = 0;

if ($user_id > 0) {
    $get_parent_ids = $conn->query("select * from user_login_master where UserID=$user_id");
    if ($get_parent_ids && mysqli_num_rows($get_parent_ids) > 0) {
        $fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
        $parentDL = isset($fetch_parent_ids['parentDL']) ? (int)$fetch_parent_ids['parentDL'] : 0;
        $parentMDL = isset($fetch_parent_ids['parentMDL']) ? (int)$fetch_parent_ids['parentMDL'] : 0;
        $parentSuperMDL = isset($fetch_parent_ids['parentSuperMDL']) ? (int)$fetch_parent_ids['parentSuperMDL'] : 0;
        $parentKingAdmin = isset($fetch_parent_ids['parentKingAdmin']) ? (int)$fetch_parent_ids['parentKingAdmin'] : 0;
    }
}

if ($parentKingAdmin > 0) {
    $check_cess_parent = $parentKingAdmin;
} else {
    $check_cess_parent = $parentSuperMDL;
}

$fetch_access = array('cricket_access' => 1, 'soccer_access' => 1, 'tennis_access' => 1, 'video_access' => 1, 'politics_access' => 1);
if ($check_cess_parent > 0) {
    $get_access = $conn->query("select cricket_access,soccer_access,tennis_access,video_access from user_master where Id=$check_cess_parent");
    if ($get_access && mysqli_num_rows($get_access) > 0) {
        $fetch_access_db = mysqli_fetch_assoc($get_access);
        $fetch_access = array_merge($fetch_access, $fetch_access_db);
    }
}

$userAgent = $_SERVER['HTTP_USER_AGENT'];
if (preg_match('/android|iphone|ipad|ipod|blackberry|iemobile|opera mini/i', $userAgent)) {
    $device = 'Mob';
} else {
    $device = 'Web';
}
?>
<!DOCTYPE html>
<html lang="en">
<style>
    .sports .nav-tabs .nav-link.active {
        background-color: var(--theme2-bg) !important;
    }
</style>
<?php
include("head_css.php");
?>
<link rel="preconnect" href="<?php echo rtrim(SITE_SPORTS_IP, '/'); ?>" crossorigin>
<link rel="dns-prefetch" href="<?php echo rtrim(SITE_SPORTS_IP, '/'); ?>">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript">
    var check = false;
    (function(a) {
        if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i
            .test(a) ||
            /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i
            .test(a.substr(0, 4))) check = true;
    })(navigator.userAgent || navigator.vendor || window.opera);
    if (check == false) {
        window.location.assign('<?php echo WEB_URL . "home"; ?>');
    }
</script>

<body cz-shortcut-listen="true">
<script>
window._pageStart = Date.now();
window.destroySportsSocket = window.destroySportsSocket || function(reason) {
    var s = window.sportsSocket;
    if (!s) return;
    window.sportsSocket = null;
    window._matchSportsSocketActive = false;
    try {
        s.io.opts.reconnection = false;
        s.removeAllListeners();
        if (s.io && s.io.engine) s.io.engine.close();
        if (s.io) s.io.close();
        s.disconnect();
        s.close();
    } catch (e) {}
};
</script>
    <div id="app">
        <!--
<?php
include("loader.php");
?>
 -->
        <div>
            <?php
            include("header.php");
            ?>
            <style>
                /*  .casino-tables img {
                    height: 95px !important;
                } */
                .casinoicons .casino-name {
                    padding: 2.5px !important;
                    position: unset !important;
                }

                #cricket_event .match-loading {
                    padding: 12px;
                    text-align: center;
                    color: #999;
                }

                #casino-tables.casino-deferred img[data-casino-src] {
                    min-height: 95px;
                    background: #f0f0f0;
                }

                .item {
    display: none;
}
.item.active {
    display: block;
}

            </style>
            <div class="latest-event d-xl-none">

                <?php
                $sql = "SELECT * FROM home_custom_event_list ORDER BY id DESC LIMIT 5";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $icon_value = $row["sport_type"];
                        if ($row["sport_type"] == "8") {
                            $icon_value = 40;
                        }
                ?>

                        <div class="latest-event-item"><a class="blink_me"
                                href="event_full_market?eventType=<?php echo $row["sport_type"] ?>&eventId=<?php echo $row["event_id"] ?>&marketId=<?php echo $row["market_id"] ?>"><i
                                    class='d-icon icon-<?php echo $icon_value ?>'></i><span><?php echo $row["event_name"] ?></span></a>
                        </div>
                <?php
                    }
                }
                ?>
                <!-- <div class="latest-event-item"><a class="blink_me" href="#"><i
                            class='d-icon icon-2'></i><span>Hobart Hurricanes v Sydney Thunder</span></a>
                </div>
                <div class="latest-event-item"><a class="blink_me" href="#"><i
                            class='d-icon icon-4'></i><span>Dortmund v Leverkusen</span></a></div>
                <div class="latest-event-item"><a class="blink_me" href="#"><i
                            class='d-icon icon-4'></i><span>Paul v F Auger-Aliassime</span></a></div>
                <div class="latest-event-item"><a class="blink_me" href="#"><i
                            class='d-icon icon-4'></i><span>Ma Joint v Mertens</span></a></div> -->
            </div>
            <div class="main-content">
                <ul class="nav nav-tabs game-nav-bar">

                    <?
                    if ($user_id  != LOGINDEMOID) {
                    ?>
                        <li class="nav-item"><a href="aviator-list" class="type nav-link newclass blink_me"> <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 457.6 277.4" style="
    /* height: 23px; */
    height: 24px;
    transform: rotate(10deg);
">
                                    <defs>
                                        <style>
                                            .cls-1 {
                                                fill: #e40539;
                                            }
                                        </style>
                                    </defs>
                                    <g id="Layer_1-2" data-name="Layer 1">
                                        <g>
                                            <path class="cls-1" d="M61.85,273.4c-1.8-3.5-2.3-3.9-4-3-3.2,1.7-5.5,1.1-9-2.5l-3.3-3.4,4.4-1.9c2.4-1.1,8-2.2,12.4-2.6,27.1-2.5,84.1-19.2,161-47.1,32.1-11.7,80.4-30.1,81.3-31,1.2-1.2-1-1.5-11.9-1.7-10.6-.2-11.7,0-16.5,2.4-13.1,6.8-74.6,31.2-92.8,36.7l-6.9,2.1-6.4-5-6.5-4.9-3.6,1.5c-21.3,9-88,36.4-89.2,36.6-1,.2-1.6-.6-1.8-2.3-.3-2.4.5-3,7.8-6.9,4.5-2.3,7.9-4.5,7.5-4.8-.3-.4-4.3-.9-8.9-1.3-9.7-.8-17.3-4-28.2-11.9-4.8-3.5-7.8-5-10-5-4.3,0-6.4.9-6.4,2.7,0,.8,6.8,8.7,15.1,17.6,13,13.7,14.9,16.2,13.3,16.8-3.7,1.5-4.8.8-16.3-10.3-6.4-6.2-14.6-14.2-18.3-17.7l-6.7-6.5-8.8,4.2-8.8,4.2-.3-3.4c-.2-2,.2-4.4.8-5.5s6.5-4.8,13.1-8.2c11.8-6,14.2-8,12.2-10-.7-.7-4.1.5-10.2,3.5l-9.1,4.6v-2.5c0-2,1.4-3.3,7.7-7,10.3-6,17.3-8.1,22.3-6.6,2.1.6,10.7,6.3,19.1,12.6,19,14.3,29.4,19.9,35.9,19.2,5.3-.5,34-13.7,61.9-28.5,18.3-9.7,21.6-12.1,19.5-14.2-.7-.7-7.1,1.8-21.4,8.5-14.7,7-20.5,9.3-21.1,8.4-1.2-2-.1-3.3,5.6-6.3,3-1.6,5.5-3.4,5.5-4,0-.7-1.3-2.5-2.8-4l-2.9-2.7-19.8,9.6c-10.9,5.2-20,9.3-20.2,9.1-.8-.7,2.5-12.8,3.8-14.1.8-.8,9.5-5.6,19.4-10.8,17.7-9.4,18-9.6,17.8-12.7,0-1.7-.4-3.4-.7-3.7s-3.9.9-8,2.7l-7.4,3.3-8.9-9.3c-4.8-5.1-8.9-9.6-9.1-10-.5-1.4,8.8-7.9,14.6-10.1,10.4-4,10.9-3.9,118.5,11.3,35.6,5,65.5,9.7,66.5,10.4,1.6,1.1,1.6,1.4-.1,4.8l-1.7,3.7,2.8,1c1.5.5,5.8,2.1,9.5,3.6l6.9,2.5,10.1-4.3c12.4-5.2,32.9-15.6,45.6-23.2l9.4-5.5,3.2,2.4c3.2,2.4,6.9,3.1,7.9,1.6.3-.5-2.5-6.9-6.3-14.3-3.7-7.4-8.7-18.4-11-24.4-2.4-6.1-4.8-11.6-5.4-12.4-.9-1-3.3-1.2-10.7-.8-10.8.5-18.1,2.6-42,12-15.4,6-67.7,31.5-70.6,34.4-1.3,1.4-3.4,1.4-19.2-.1-9.7-.9-18-1.6-18.4-1.6-1.4,0-.8-5.5,1.1-9.7,1.6-3.4,3.9-5.4,14-12.1,14.3-9.5,28.2-16.5,37.4-18.9l6.5-1.7,9.9,3.9c14.3,5.6,16.3,5.6,39.8-1,38.2-10.6,43.5-11.8,52.2-11.9,8-.1,8.3,0,11.6,3.3,2.6,2.5,5.7,8.3,12,23,4.7,10.8,9,21.3,9.7,23.5,1.7,5.4.8,11.9-2.4,16-6.7,8.8-38,25.2-82.1,42.8-22.8,9.1-61.8,21.9-162.5,53.3-31.1,9.7-64.7,20.3-74.6,23.6-10,3.2-18.9,5.9-19.8,5.9-.8,0-2.5-1.8-3.6-4ZM291.35,168.4c3.8-2.3,7.1-6.9,5.8-8-.6-.5-144.9-20.8-158.8-22.3-1.2-.1-2,.4-2,1.3,0,1.2,15.5,4.6,72,16.1,39.6,8.1,73.7,14.7,75.9,14.8,2.3.1,5.2-.7,7.1-1.9h0ZM247.65,122c4.2-2.3,11.2-5.8,15.4-7.7,4.3-1.9,7.8-3.7,7.8-4.1s-2.8-1.3-6.2-2c-7.7-1.7-13.7-.9-22.4,3.3-6.7,3.1-18.9,11.7-18.1,12.6.6.5,9.3,1.9,13.5,2.2,1.3,0,5.8-1.9,10-4.3h0ZM282.15,115.8c7.5-3.8,10.7-6,10.5-7.1-.4-2.1-18.3-9.2-23.4-9.3-2.2,0-4.9.6-6,1.4q-2.1,1.6,10.4,6.5c2.6,1,4.8,2.3,5,2.9s-1.9,2.2-4.7,3.6c-5.5,2.8-6.6,4-5.7,6.1.8,2.3,2.3,1.9,13.9-4.1h0Z"></path>
                                            <path class="cls-1" d="M440.55,196.2c-6.8-10.1-13.5-20.3-14.9-22.8-1.5-2.5-5.5-14.1-9.1-25.7l-6.5-21.3,5.1-5c2.7-2.8,5.1-4.9,5.2-4.8.1.2,5.2,9.4,11.4,20.6,11.9,21.3,15.8,31,23.1,58,3.3,11.9,3.3,12.3,1.7,15.7-.9,1.9-2.1,3.5-2.6,3.5s-6.5-8.2-13.4-18.2h0ZM454.65,206.5c.2-1.9-.5-4.6-1.7-6.7-1.8-3.1-22-30.4-24.3-32.9-1.2-1.3-3,1.5-2.2,3.5,1.2,3.4,26,39.9,26.9,39.6.6-.1,1.1-1.7,1.3-3.5h0Z"></path>
                                            <path class="cls-1" d="M295.35,148.3c-13.2-2.6-24.6-4.9-25.4-5.1-.8-.2,11.3-5.4,27-11.6l28.3-11.4,5.3,5.9c2.9,3.2,5.2,6.3,5.3,6.9,0,.6-2.3,5.5-5.1,10.8-4.8,9.1-5.2,9.6-8.2,9.5-1.8-.1-14-2.3-27.2-5h0Z"></path>
                                            <path class="cls-1" d="M334.85,152.1c0-.2,1.6-3.6,3.6-7.5,1.9-4,4.1-9,4.9-11.1l1.3-3.8-5.3-6.9c-5.3-6.8-5.4-6.9-3.2-8.1,2-1.1,2.6-.8,6.2,3.2,2.2,2.5,4.3,4.5,4.6,4.5s1.7-3.9,3-8.7l2.4-8.8.3,4.9c.2,2.6-.2,8-.8,11.8l-1,7,5.1,6.4,5.1,6.4-2.7,1c-2.2.9-2.9.6-5-1.8-1.3-1.5-2.5-3-2.5-3.4-.1-2.3-1.9-.1-3.9,4.6-1.2,3-2.8,5.9-3.5,6.5-1.4,1.1-8.6,4.3-8.6,3.8h0Z"></path>
                                            <path class="cls-1" d="M404.75,114.7c-7.2-16.1-7.3-16.4-5.8-17.5,1.5-1,21.2-.4,24.2.7.9.4,1.7,1.4,1.7,2.2,0,4.2-12.6,21.3-15.6,21.3-.9,0-2.8-2.9-4.5-6.7h0ZM414.15,104.7c4.8-2,8.7-4,8.7-4.4,0-1.2-4.4-1.9-13.2-1.9-8.2,0-8.8.1-8.8,2,0,2.4,2.7,8,3.8,8,.4,0,4.6-1.6,9.5-3.7Z"></path>
                                            <path class="cls-1" d="M385.05,75.9c-10.7-19.1-14-27.3-20.7-51.6-4-14.3-4.3-18.7-1.6-22l1.9-2.3,14.8,22.3,14.8,22.3,7.6,24.2c4.2,13.2,7.4,24.2,7.1,24.3-.3.1-3.5.3-7.1.6l-6.5.4-10.3-18.2h0ZM391.85,46.5c0-1.5-23.2-37.5-26.1-40.6-1.3-1.3-2.9,1.2-2.9,4.7,0,2.5,8.8,15.4,22.3,32.7,4.6,6,6.7,7,6.7,3.2Z"></path>
                                        </g>
                                    </g>
                                </svg> 
                            <span class="ms-1">Crash</span></a></li>
                    <?
                    }
                    ?>

                    <?php
                    if (CASINO_PLAY) {
                    ?>
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="type nav-link newclass"> Lottery </a>
                        </li>
                    <?php } ?>
                    <li class="nav-item"><a href="home"
                            class="type nav-link router-link-exact-active router-link-active active newclass"> Sports
                        </a></li>
                    <?php
                    if (CASINO_PLAY) {
                    ?>
                        <!-- <li class="nav-item"><a href="home" class="type nav-link"> Sports </a></li> -->
                        <li class="nav-item"><a href="slot" class="type nav-link newclass"> Our Casino </a></li>

                        <li class="nav-item"><a href="live_casino" class="type nav-link newclass"> Live Casino </a>
                        </li>
                    <?php } ?>
                    <li class="nav-item"><a href="slot_list" class="type nav-link newclass"> Slots </a></li>
                    <li class="nav-item"><a href="fantasy_list" class="type nav-link newclass"> Fantasy </a></li>
                    <!-- <?php if (ELECTION_EVENT_ID != '') { ?>
                        <li class="nav-item"><a href="/m/event_full_market?eventType=<?php echo ELECTION_EVENT_TYPE_ID; ?>&eventId=<?php echo ELECTION_EVENT_ID; ?>&marketId=<?php echo ELECTION_MARKET_ID; ?>" class="type nav-link"> <?php echo ELECTION_MARKET_NAME; ?> </a></li>
                    <?php } ?> -->
                    <!--  <li class="nav-item"><a href="others" class="type nav-link"> Others </a></li> -->
                </ul>
                <div>
                    <div class="tab-content">
                        <div id="home" class="tab-pane sports active">
                            <ul class="nav nav-tabs game-nav-bar">

                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game4" class="sports nav-link active cricket_tab_btn"
                                        onclick="tab_view('cricket')">
                                        <div><i class="icon icon-4"></i></div>
                                        <div>
                                            Cricket
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game1" class="sports nav-link football_tab_btn"
                                        onclick="tab_view('football')">
                                        <div><i class="icon icon-1"></i></div>
                                        <div>
                                            Football
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game2" class="sports nav-link tennis_tab_btn"
                                        onclick="tab_view('tennis')">
                                        <div><i class="icon icon-2"></i></div>
                                        <div>
                                            Tennis
                                        </div>
                                    </a>
                                </li>
                                
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game8" class="sports nav-link"
                                        onclick="tab_view('8')">
                                        <div><i class="icon icon-8"></i></div>
                                        <div>
                                            Table Tennis
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#gameeee" class="sports nav-link">
                                        <div><i class="icon icon-66"></i></div>
                                        <div>
                                            Kabaddi
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#gameeee" class="sports nav-link">
                                        <div><i class="icon icon-68"></i></div>
                                        <div>
                                            Esoccer
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game10" class="sports nav-link" onclick="tab_view('10')">
                                        <div><i class="icon icon-10"></i></div>
                                        <div>
                                            Horse Racing
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game65" class="sports nav-link" onclick="tab_view('65')">
                                        <div><i class="icon icon-65"></i></div>
                                        <div>
                                            Greyhound Racing
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game15" class="sports nav-link" onclick="tab_view('15')">
                                        <div><i class="icon icon-15"></i></div>
                                        <div>
                                            Basketball
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game18" class="sports nav-link" onclick="tab_view('18')">
                                        <div><i class="icon icon-18"></i></div>
                                        <div>
                                            Volleyball
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game22" class="sports nav-link" onclick="tab_view('22')">
                                        <div><i class="icon icon-22"></i></div>
                                        <div>
                                            Badminton
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game59" class="sports nav-link" onclick="tab_view('59')">
                                        <div><i class="icon icon-59"></i></div>
                                        <div>
                                            Snooker
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game6" class="sports nav-link" onclick="tab_view('6')">
                                        <div><i class="icon icon-6"></i></div>
                                        <div>
                                            Boxing
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game3" class="sports nav-link" onclick="tab_view('3')">
                                        <div><i class="icon icon-3"></i></div>
                                        <div>
                                            Mixed Martial Arts
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game58" class="sports nav-link" onclick="tab_view('58')">
                                        <div><i class="icon icon-58"></i></div>
                                        <div>
                                            American Football
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game11" class="sports nav-link" onclick="tab_view('11')">
                                        <div><i class="icon icon-11"></i></div>
                                        <div>
                                            E Games
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#gameeee" class="sports nav-link">
                                        <div><i class="icon icon-19"></i></div>
                                        <div>
                                            Ice Hockey
                                        </div>
                                    </a>
                                </li>


                                <li class="nav-item text-center">

                                    <a data-toggle="tab" href="#gameeee" class="sports nav-link">
                                        <div><i class="icon icon-9"></i></div>
                                        <div>
                                            Futsal
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game52" class="sports nav-link" onclick="tab_view('52')">
                                        <div><i class="icon icon-52"></i></div>
                                        <div>
                                            Motor Sports
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game40" class="sports nav-link"
                                        onclick="tab_view('40')">
                                        <div><i class="icon icon-40"></i></div>
                                        <div>
                                            Politics
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#gameeee" class="sports nav-link">
                                        <div><i class="icon icon-39"></i></div>
                                        <div>
                                            Handball
                                        </div>
                                    </a>
                                </li>


                            </ul>
                            <div class="tab-content">
                                <div id="game1" class="tab-pane container pl-0 pr-0">
                                    <div class="game-listing-container" id="football_event"
                                        style="max-height: calc((100vh - 184px) / 2);max-height: 289px; overflow-x: auto;">
                                        <div class="game-list pt-1 pb-1 container-fluid">
                                            <div class="row row5">
                                                <div class="col-12">
                                                    <p class="text-center mb-1 mt-1">No real-time records found</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="game2" class="tab-pane container pl-0 pr-0">
                                    <div class="game-listing-container" id="tennis_event"
                                        style="max-height: calc((100vh - 184px) / 2);max-height: 289px; overflow-x: auto;">
                                        <div class="game-list pt-1 pb-1 container-fluid">
                                            <div class="row row5">
                                                <div class="col-12">
                                                    <p class="text-center mb-1 mt-1">No real-time records found</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="game4" class="tab-pane container pl-0 pr-0 active">
                                    <div class="game-listing-container" id="cricket_event"
                                        style="max-height: calc((100vh - 184px) / 2);max-height: 289px; overflow-x: auto;">
                                        <div class="match-loading">Loading matches...</div>
                                    </div>
                                </div>
                                <div id="game15" class="tab-pane container pl-0 pr-0">
                                    <div class="game-listing-container" id="event_15"
                                        style="max-height: calc((100vh - 184px) / 2);max-height: 289px; overflow-x: auto;">
                                    </div>
                                </div>
                                <div id="game40" class="tab-pane container pl-0 pr-0">
                                    <div class="game-listing-container" id="event_40"
                                        style="max-height: calc((100vh - 184px) / 2);max-height: 289px; overflow-x: auto;">
                                    </div>
                                </div>
                                <div id="game65" class="tab-pane container pl-0 pr-0">
                                    <div class="game-listing-container" id="event_65"
                                        style="max-height: calc((100vh - 184px) / 2);max-height: 289px; overflow-x: auto;">
                                    </div>
                                </div>
                                <div id="game10" class="tab-pane container pl-0 pr-0">
                                    <div class="game-listing-container" id="event_10"
                                        style="max-height: calc((100vh - 184px) / 2);max-height: 289px; overflow-x: auto;">
                                    </div>
                                </div>
                                <div id="game8" class="tab-pane container pl-0 pr-0">
                                    <div class="game-listing-container" id="event_8"
                                        style="max-height: calc((100vh - 184px) / 2);max-height: 289px; overflow-x: auto;">
                                    </div>
                                </div>
                                <div id="game18" class="tab-pane container pl-0 pr-0">
                                    <div class="game-listing-container" id="event_18"
                                        style="max-height: calc((100vh - 184px) / 2);max-height: 289px; overflow-x: auto;">
                                    </div>
                                </div>
                                <div id="game22" class="tab-pane container pl-0 pr-0">
                                    <div class="game-listing-container" id="event_22"
                                        style="max-height: calc((100vh - 184px) / 2);max-height: 289px; overflow-x: auto;">
                                    </div>
                                </div>
                                <div id="game59" class="tab-pane container pl-0 pr-0">
                                    <div class="game-listing-container" id="event_59"
                                        style="max-height: calc((100vh - 184px) / 2);max-height: 289px; overflow-x: auto;">
                                    </div>
                                </div>
                                <div id="game6" class="tab-pane container pl-0 pr-0">
                                    <div class="game-listing-container" id="event_6"
                                        style="max-height: calc((100vh - 184px) / 2);max-height: 289px; overflow-x: auto;">
                                    </div>
                                </div>
                                <div id="game3" class="tab-pane container pl-0 pr-0">
                                    <div class="game-listing-container" id="event_3"
                                        style="max-height: calc((100vh - 184px) / 2);max-height: 289px; overflow-x: auto;">
                                    </div>
                                </div>
                                <div id="game58" class="tab-pane container pl-0 pr-0">
                                    <div class="game-listing-container" id="event_58"
                                        style="max-height: calc((100vh - 184px) / 2);max-height: 289px; overflow-x: auto;">
                                    </div>
                                </div>
                                <div id="game11" class="tab-pane container pl-0 pr-0">
                                    <div class="game-listing-container" id="event_11"
                                        style="max-height: calc((100vh - 184px) / 2);max-height: 289px; overflow-x: auto;">
                                    </div>
                                </div>
                                <div id="game52" class="tab-pane container pl-0 pr-0">
                                    <div class="game-listing-container" id="event_52"
                                        style="max-height: calc((100vh - 184px) / 2);max-height: 289px; overflow-x: auto;">
                                    </div>
                                </div>
                                <div id="gameeee" class="tab-pane container pl-0 pr-0">
                                    <div class="game-listing-container"
                                        style="max-height: calc((100vh - 184px) / 2);max-height: 289px; overflow-x: auto;">
                                        <div class="game-list pt-1 pb-1 container-fluid">
                                            <div class="row row5">
                                                <div class="col-12">
                                                    <p class="text-center mb-1 mt-1">No real-time records found</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="game52" class="tab-pane container pl-0 pr-0">
                                    <div class="game-listing-container"
                                        style="max-height: calc((100vh - 184px) / 2);max-height: 289px; overflow-x: auto;">
                                        <div class="game-list pt-1 pb-1 container-fluid">
                                            <div class="row row5">
                                                <div class="col-12">
                                                    <p class="text-center mb-1 mt-1">No real-time records found</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="game26420387" class="tab-pane container pl-0 pr-0">
                                    <div class="game-listing-container"
                                        style="max-height: calc((100vh - 184px) / 2);max-height: 289px;overflow-x: auto;">
                                        <div class="game-list pt-1 pb-1 container-fluid">
                                            <div class="row row5">
                                                <div class="col-12">
                                                    <p class="text-center mb-1 mt-1">No real-time records found</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!---->
                        </div>
                    </div>
                    <script>
window._homeMatchesLoaded = false;
window._pendingCricketData = null;
window._homeSocketScheduled = false;
window._earlyAjaxStart = Date.now();
$.ajax({
    type: 'GET',
    url: '<?php echo SITE_SPORTS_IP; ?>getCricketMatches',
    success: function(data) {
        window._pendingCricketData = data;
        window._homeMatchesLoaded = true;
        if (typeof window.applyPendingCricketData === 'function') {
            window.applyPendingCricketData(data);
        }
    },
    error: function() {
        if (typeof window.scheduleCasinoImages === 'function') window.scheduleCasinoImages();
        else if (typeof window.initCasinoImages === 'function') window.initCasinoImages();
    }
});
</script>
                    <?php if ($fetch_access['video_access'] == 1 && CASINO_PLAY) { ?>
                        <div class="tab-content">
                            <div id="casino-tables" class="tab-pane active casino-tables casino-deferred">
                                <div class="container-fluid1">
                                    <!-- <div class="row row5">
                                    <div class="col-12">
                                        <h4 class="text-uppercase mt-3">Our Casino</h4>
                                    </div>
                                </div> -->
                                    <div class="d-flex flex-wrap">
                                        <!-- ///////////////////////////////// -->
                                        <!-- <div class="casinowidth text-center">
                                    <div class="casinoicons">
                                        <a href="live_teenjoker" class=""><img
                                                data-casino-src="../storage/mobile/img/homeimages/teenjoker.jpg"
                                                class="img-fluid">
                                            <div class="casino-name">Teenpatti Joker</div>

                                        </a>
                                    </div>
                                </div> -->
                                        <? if (game80 == true) { ?>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons comingsoon">
                                                    <a href="#" class=""><img data-casino-src="../storage/mobile/img/homeimages/worli3.gif"
                                                            class="img-fluid">
                                                        <div class="casino-name">Matka</div>

                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_teen62" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/teen62.gif" class="img-fluid">
                                                        <div class="casino-name">V VIP Teenpatti 1-day</div>

                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_dolidana" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/dolidana.gif"
                                                            class="img-fluid">
                                                        <div class="casino-name">DoliDana</div>

                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_mogambo" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/mogambo.gif"
                                                            class="img-fluid">
                                                        <div class="casino-name">Mogambo</div>

                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_teen20v1" class="check-balance"><img
                                                            data-casino-src="../storage/mobile/img/homeimages/teen20v1.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">20-20 Teenpatti Vip1</div>

                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_lucky5" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/lucky5.jpg" class="img-fluid">
                                                        <div class="casino-name">Lucky 6</div>

                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_roulette12" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/roulette12.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Beach Roulette</div>

                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_roulette13" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/roulette13.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Roulette</div>

                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_roulette11" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/roulette11.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Golden Roulette</div>

                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_poison" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/poison.jpg" class="img-fluid">
                                                        <div class="casino-name">Teenpatti Poison One Day</div>

                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_teenunique" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/teenunique.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Unique Teenpatti</div>

                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_poison20" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/poison20.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Teenpatti Poison 20-20</div>

                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_joker120" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/joker120.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Unlimited Joker 20-20</div>

                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_joker20" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/joker20.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Teenpatti Joker 20-20</div>

                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_joker1" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/joker1.jpg" class="img-fluid">
                                                        <div class="casino-name">Unlimited Joker Oneday</div>

                                                    </a>
                                                </div>
                                            </div>



                                        <? } ?>
                                        <? if (game60 == true) { ?>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_goal2" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/goal2.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Goal 2</div>

                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_teen20c" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/teen20c.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">20-20 Teenpatti C</div>

                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_btable2" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/btable2.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Bollywood Casino 2</div>

                                                    </a>
                                                </div>
                                            </div>
                                        <? } ?>
                                        <? if (game80 == true) { ?>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_ourroullete" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/ourroullete.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Unique Roulette</div>

                                                    </a>
                                                </div>
                                            </div>
                                        <? } ?>
                                        <!-- <div class="casinowidth text-center">
                                    <div class="casinoicons">
                                        <a href="live_ourroullete" class=""><img
                                                data-casino-src="../storage/mobile/img/homeimages/ourroullete.jpg"
                                                class="img-fluid">
                                            <div class="casino-name">Unique Roulette</div>

                                        </a>
                                    </div>
                                </div> -->
                                        <? if (game30 == true) { ?>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_superover3" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/superover3.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Mini SuperOver</div>

                                                    </a>
                                                </div>
                                            </div>
                                        <? } ?>
                                        <? if (game60 == true) { ?>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_goal" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/goal.jpg" class="img-fluid">
                                                        <div class="casino-name">Goal</div>

                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_ab204" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/ab4.jpg" class="img-fluid">
                                                        <div class="casino-name">ANDAR BAHAR 150 cards</div>

                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_lucky15" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/lucky15.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">LUCKY 15</div>

                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_superover2" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/superover2.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Super Over2</div>

                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_teen41" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/teen41.jpg" class="img-fluid">
                                                        <div class="casino-name">Queen Top Open Teenpatti</div>

                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_teen42" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/teen42.jpg" class="img-fluid">
                                                        <div class="casino-name">Jack Top Open Teenpatti</div>

                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_sicbo2" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/sicbo2.jpg" class="img-fluid">
                                                        <div class="casino-name">Sic Bo2</div>

                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_teen33" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/teen33.jpg" class="img-fluid">
                                                        <div class="casino-name">Instant Teenpatti 3.0</div>

                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_sicbo" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/sicbo.jpg" class="img-fluid">
                                                        <div class="casino-name">Sic Bo</div>

                                                    </a>
                                                </div>
                                            </div>
                                        <? } ?>
                                        <? if (game30 == true) { ?>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_ballbyball" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/ballbyball.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Ball By Ball</div>

                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_teen32" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/teen32.jpg" class="img-fluid">
                                                        <div class="casino-name">Instant Teenpatti 2.0</div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_odi_teenpatti" class=""><img
                                                            data-casino-src="/storage/mobile/img/homeimages/teen.jpg" class="img-fluid">
                                                        <div class="casino-name">Teenpatti 1-Day</div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_20_teenpatti" class=""><img
                                                            data-casino-src="/storage/mobile/img/homeimages/teen20.jpg" class="img-fluid">
                                                        <div class="casino-name">20-20 Teenpatti</div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_test_teenpatti" class=""><img
                                                            data-casino-src="/storage/mobile/img/homeimages/teen9.jpg" class="img-fluid">
                                                        <div class="casino-name">Teenpatti Test</div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_open_teenpatti" class=""><img
                                                            data-casino-src="/storage/mobile/img/homeimages/teen8.jpg" class="img-fluid">
                                                        <div class="casino-name">Teenpatti Open</div>

                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_1day_poker" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/poker1.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Poker 1-Day</div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_20poker" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/poker20.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">20-20 Poker</div>
                                                    </a>
                                                </div>
                                            </div>


                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_6player_poker" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/poker6.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Poker 6 Players</div>

                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_baccarat" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/baccarat.png"
                                                            class="img-fluid">
                                                        <div class="casino-name">Baccarat</div>

                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_baccarat2" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/baccarat2.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Baccarat 2</div>

                                                    </a>
                                                </div>
                                            </div>
                                        <? } ?>
                                        <? if (game30 == true) { ?>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_20_dragon_tiger" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/dt20.jpg" class="img-fluid">
                                                        <div class="casino-name">20-20 Dragon Tiger</div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_odi_dragon_tiger" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/dt6.jpg" class="img-fluid">
                                                        <div class="casino-name">1 Day Dragon Tiger</div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_dtl20" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/dtl20.jpg" class="img-fluid">
                                                        <div class="casino-name">20-20 D T L</div>

                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_dt202" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/dt202.jpg" class="img-fluid">
                                                        <div class="casino-name">20-20 Dragon Tiger 2</div>

                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_32_cards-a" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/card32.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">32 Cards A</div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_32_cards-b" class=""><img
                                                            data-casino-src="/storage/mobile/img/homeimages/card32eu.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">32 Cards B</div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_ab20" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/andar-bahar.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Andar Bahar</div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_ab202" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/andar-bahar2.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Andar Bahar 2</div>

                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_lucky7" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/lucky7.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Lucky 7 - A</div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_lucky7eu" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/lucky7Bhome.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Lucky 7 - B</div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_3cardj" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/3cardj.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">3 Cards Judgement</div>

                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_casino_war" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/warr.jpg" class="img-fluid">
                                                        <div class="casino-name">Casino War</div>

                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_worli_matka" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/worlii.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Worli Matka</div>

                                                    </a>
                                                </div>
                                            </div>


                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_instant_worli" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/worli2.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Instant Worli</div>

                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_aaa" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/aaa.jpg" class="img-fluid">
                                                        <div class="casino-name">Amar Akbar Anthony</div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_ddb" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/bollywood-casino.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Bollywood Casino</div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_lottcard" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/lottcard.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Lottery</div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_5_cricket" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/cricketv3.jpeg"
                                                            class="img-fluid">
                                                        <div class="casino-name">5Five Cricket</div>

                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_cc20" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/cmatch20.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Cricket Match 20-20</div>

                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_cmeter" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/cmeter.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Casino Meter</div>

                                                    </a>
                                                </div>
                                            </div>
                                        <? } ?>
                                        <? if (game60 == true) { ?>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_teen6" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/teen6.jpg" class="img-fluid">
                                                        <div class="casino-name">Teenpatti - 2.0</div>
                                                    </a>
                                                </div>
                                            </div>
                                        <? } ?>
                                        <? if (game30 == true) { ?>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_queen" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/queen.jpeg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Queen</div>

                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_race20" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/race20.png"
                                                            class="img-fluid">
                                                        <div class="casino-name">Race20</div>

                                                    </a>
                                                </div>
                                            </div>
                                        <? } ?>
                                        <? if (game60 == true) { ?>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_lucky7eu2" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/lucky7eu2.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Lucky 7-C</div>

                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_superover" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/superover.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Super Over</div>
                                                        <div class="new-launch-casino">New Launch</div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_thetrap" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/trap.jpg" class="img-fluid">
                                                        <div class="casino-name">The Trap</div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_patti2" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/patti2.jpg" class="img-fluid">
                                                        <div class="casino-name">2 Cards Teenpatti</div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_teensin" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/teensin.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">29Card Baccarat</div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_teenmuf" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/teenmuf.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Muflis Teenpatti</div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_race17" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/race17.jpg" class="img-fluid">
                                                        <div class="casino-name">Race To 17</div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_teen20b" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/teen20b.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">20-20 Teenpatti B</div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_trio" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/trio.jpg" class="img-fluid">
                                                        <div class="casino-name">Trio</div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_notenum" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/notenum.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">Note Number</div>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- <div class="casinowidth text-center">
                                    <div class="casinoicons">
                                        <a href="live_kbc" class=""><img
                                                data-casino-src="../storage/mobile/img/homeimages/kbc.jpg"
                                                class="img-fluid">
                                            <div class="casino-name">K.B.C</div>
                                        </a>
                                    </div>
                                </div> -->
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_teen120" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/teen120.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">1 CARD 20-20</div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_teen1" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/teen1.jpg" class="img-fluid">
                                                        <div class="casino-name">1 CARD ONE-DAY</div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_ab3" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/ab3.jpg" class="img-fluid">
                                                        <div class="casino-name">ANDAR BAHAR 50 cards</div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_aaa2" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/aaa2.jpg" class="img-fluid">
                                                        <div class="casino-name">Amar Akbar Anthony 2</div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_race2" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/race2.jpg" class="img-fluid">
                                                        <div class="casino-name">Race to 2nd</div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_teen3" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/teen3.jpg" class="img-fluid">
                                                        <div class="casino-name">Instant Teenpatti</div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_dum10" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/dum10.jpg" class="img-fluid">
                                                        <div class="casino-name">Dus ka Dum</div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="casinowidth text-center">
                                                <div class="casinoicons">
                                                    <a href="live_cmeter1" class=""><img
                                                            data-casino-src="../storage/mobile/img/homeimages/cmeter1.jpg"
                                                            class="img-fluid">
                                                        <div class="casino-name">1 Card Meter</div>
                                                    </a>
                                                </div>
                                            </div>
                                        <? } ?>

                                    </div>


                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($fetch_access['video_access'] == 1 && CASINO_PLAY) { ?>
                    <script>
                    window.initCasinoImages = window.initCasinoImages || function() {
                        if (window._casinoImagesLoaded) return;
                        var el = document.getElementById('casino-tables');
                        if (!el) return;
                        window._casinoImagesLoaded = true;
                        window._casinoLoadStart = window._casinoLoadStart || Date.now();
                        var imgs = el.querySelectorAll('img[data-casino-src]');
                        var eagerCount = 16;
                        imgs.forEach(function(img, i) {
                            var src = img.getAttribute('data-casino-src');
                            if (!src) return;
                            img.decoding = 'async';
                            if (i < eagerCount) {
                                if ('fetchPriority' in img) img.fetchPriority = 'low';
                                img.src = src;
                            } else {
                                img.loading = 'lazy';
                                img.src = src;
                            }
                        });
                        el.classList.remove('casino-deferred');
                        el.classList.add('casino-ready');
                    };
                    window.scheduleCasinoImages = window.scheduleCasinoImages || function() {
                        if (window._casinoImagesLoaded) return;
                        requestAnimationFrame(function() { window.initCasinoImages(); });
                    };
                    if (window._homeMatchesLoaded) {
                        window.scheduleCasinoImages();
                    } else {
                        window._casinoPendingLoad = true;
                    }
                    </script>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="../js/socket.io.js?1"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>

    <div role="dialog" class="modal in" id="modal_login_notification_popup" aria-modal="true">
        <div class="modal-dialog modal-xl"><span tabindex="0"></span>
            <div role="document" tabindex="-1" class="modal-content" id="__BVID__151___BV_modal_content_">
                <header class="modal-header" id="__BVID__151___BV_modal_header_">
                    <h5 class="modal-title" id="__BVID__151___BV_modal_title_"></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </header>
                <div class="modal-body" id="__BVID__151___BV_modal_body_">
                    <div style="box-shadow: 0px 0px 5px; padding: 10px;">
                        <h4>Dear Client,</h4>
                        <h6 class="mb-1">You are requested to login with our official site <a
                                href="javascript:void(0)">'<?php echo SITE_NAME; ?>.com'</a> only. Please check the site
                            name before you login.</h6>
                        <h6 class="mb-1">Thanks for your support.</h6>
                        <h6 class="mb-1">Team <?php echo SITE_NAME; ?></h6>
                    </div>
                    <div class="mt-3 font-hindi" style="box-shadow: 0px 0px 5px; padding: 10px;">
                        <h4>प्रिय ग्राहक,</h4>
                        <h6 class="mb-1">आपसे अनुरोध है कि केवल हमारी आधिकारिक साइट <a
                                href="javascript:void(0)">'<?php echo SITE_NAME; ?>.com'</a> से लॉगिन करें। लॉगइन करने
                            से पहले साइट का नाम जरूर देख लें।</h6>
                        <h6 class="mb-1">आपके समर्थन के लिए धन्यवाद।</h6>
                        <h6 class="mb-1">टीम <?php echo SITE_NAME; ?></h6>
                    </div>
                    <div class="text-right mt-3">
                        <button class="btn btn-primary" style="min-width: 100px;" data-dismiss="modal">OK</button>
                    </div>
                </div>
                <!---->
            </div><span tabindex="0"></span>
        </div>
    </div>
    <?php
    /* $check = $conn->query("SELECT * FROM home_image WHERE device='$device' LIMIT 1");
    $row = $check->fetch_assoc(); */

   /*  if ($user_id == '11') { */

        $check = $conn->query("SELECT * FROM home_image WHERE device='$device'");
        $row = $check->num_rows;
        
        if ($device == 'Mob' && $row >0) {

    ?>

            <div role="dialog" class="modal in" id="home_poup" aria-modal="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">

                        <header class="modal-header">
                            <h5 class="modal-title">
                                ⚠️ Beware Of Phishing Websites Before Login. Enable Security Auth To Secure Your ID.
                            </h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </header>

                        <div id="homeCarousel" class="carousel slide" data-ride="carousel">

                            <div class="carousel-inner" role="listbox">

                                <?php
                                $active = true;
                                while ($row = $check->fetch_assoc()) {
                                ?>
                                    <div class="item <?php echo ($active ? 'active' : ''); ?>">
                                        <img src="../<?php echo $row['image']; ?>"
                                            style="height:95vh;width:100%;">
                                    </div>
                                <?php
                                    $active = false;
                                }
                                ?>

                            </div>

                            <a class="left carousel-control" href="#homeCarousel" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>

                            <a class="right carousel-control" href="#homeCarousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>

                        </div>

                    </div>
                </div>
            </div>

            <?php
            if (!isset($_SESSION['home_poup'])) {
            ?>
                <script>
                    $(document).ready(function() {
                        console.log("carousel",$.fn.carousel);
                        console.log("modal",$.fn.modal);
                        $("#home_poup").modal("show");

                        $("#homeCarousel").carousel({
                            interval: 3000, // 3 second
                            
                        });


                    });
                </script>
            <?php
            }
            $_SESSION['home_poup'] = 1;
        }
   /*  }  */
    
    ?>

    <script type="text/javascript">
        function url_redirect(link) {
            if (window.sportsSocket) {
                window.destroySportsSocket('url_redirect');
            }
            location.href = '<?php echo str_replace("index", "", MOBILE_URL); ?>' + link;
        }
    </script>
</body>

<?php
include "footer.php";
?>

</html>
<style>
    .nav-tabs {
        display: flex;
        /* gap: 5px; */
        margin-bottom: 1px;

    }

    .nav-tabs .tab {
        padding: 6px 12px;
        background: #ddd;
        cursor: pointer;
        border-radius: 3px;
        border-left: 2px solid var(--theme1-bg);
    }

    .nav-tabs .active {
        background: var(--theme1-bg);
        color: #fff;
    }

    .event-box {
        margin-bottom: 15px;
    }

    .event-title {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .time-btn {
        display: inline-block;
        padding: 5px 8px;
        margin: 3px;
        background: #e0e0e0;
        border-radius: 4px;
        font-size: 12px;
    }

    #event_10 .nav-tabs {
        background-color: #e0e0e0 !important;
    }

    #event_65 .nav-tabs {
        background-color: #e0e0e0 !important;
    }

    .time-btn {
        position: relative;
    }

    .live-btn::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        border-top: 10px solid green;
        border-right: 10px solid transparent;
    }
</style>
<script type="text/javascript">
    var cricket_html = "";
    var football_html = "";
    var tennis_html = "";
    var other_html = "";


    function formatAMPM(date) {
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        minutes = minutes < 10 ? '0' + minutes : minutes;
        var strTime = hours + ':' + minutes + '' + ampm;
        return strTime;
    }

    var month_name = function(dt) {
        mlist = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        return mlist[dt.getMonth()];
    };

    var b11 = "-";
    var b21 = "-";
    var b31 = "-";

    var l11 = "-";
    var l21 = "-";
    var l31 = "-";

    var site_url = '<?php echo WEB_URL; ?>';
    var _sportsSocketOpts = {
        transports: ['websocket', 'polling'],
        forceNew: true,
        timeout: 10000,
        reconnection: true,
        reconnectionAttempts: 3,
        reconnectionDelay: 3000,
        reconnectionDelayMax: 10000
    };
    var socket;

    function initHomeSportsSocket() {
        if (window.sportsSocket && window.sportsSocket.connected) return;
        if (window.sportsSocket) window.destroySportsSocket('reinit');
        socket = io("<?php echo SITE_SPORTS_IP; ?>", _sportsSocketOpts);
        window.sportsSocket = socket;
        socket.on('connect', function() {
            var transport = (socket.io && socket.io.engine && socket.io.engine.transport) ? socket.io.engine.transport.name : '';
            if (transport === 'websocket') sessionStorage.setItem('sportsTransport', 'websocket');
            if (!_homeMatchesLoaded) {
                <?php if ($fetch_access['cricket_access'] == 1) { ?>
                socket.emit('getMatches', { eventType: 4 });
                <?php } ?>
            }
        });
        socket.on('eventGetLiveEventName', function(data) {
            args = data;
            setData(data);
        });
    }

    function scheduleHomeSportsSocket() {
        if (window._homeSocketScheduled) return;
        window._homeSocketScheduled = true;
        setTimeout(initHomeSportsSocket, 500);
    }

    var event_type_array = {};

    function setData(data) {

        if (data) {
            if (data.sport) {

                if (data.sport.body) {
                    if (data.sportId == 4) {
                        cricket_html = "";
                    } else if (data.sportId == 1) {
                        football_html = "";
                    } else if (data.sportId == 2) {
                        tennis_html = "";

                    } else {
                        other_html = "";
                    }
                    var list_sport = data.sport.body;
                    eventNotIncluded = data.eventNotIncluded;
                    var sportId = data.sportId;
                    var result = Object.keys(data.sport.body).length;
                    if (result > 0) {
                        var main_datas = data;
                        var main_x = data;


                        smdl_c = ['1', '2'];
                        mdl_c = ['1', '2'];
                        dl_c = ['1', '2'];
                        smdl_s = ['1', '2'];
                        smdl_b = ['1', '2'];
                        smdl_r = ['1', '2'];
                        mdl_s = ['1', '2'];
                        dl_s = ['1', '2'];
                        smdl_t = ['1', '2'];
                        mdl_t = ['1', '2'];
                        mdl_b = ['1', '2'];
                        mdl_r = ['1', '2'];
                        dl_t = ['1', '2'];
                        dl_b = ['1', '2'];
                        dl_r = ['1', '2'];
                        evnt = ['1', '2'];
                        evnt = eventNotIncluded || [];



                        data = main_datas.sport;
                        let sportData = main_datas.sport;
                        let sportId = parseInt(main_datas.sportId);
                        data.body.sort(function(a, b) {
                            return (a.inPlay === b.inPlay) ? 0 : (a.inPlay ? -1 : 1);
                        });
                        key = Object.keys(data.body)[0];
                        eventType = parseInt(data.body[key].SportId);
                        if (main_datas.sportId == "10" || main_datas.sportId == "65") {
                            eventType = parseInt(data.body[key].etid);
                        }

                        event_type_array[eventType] = data.body.length;


                        cricket_html += "<span onclick=\"window.location.href='live_superover2'\"><div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'> <div class='col-8'> <p class='mb-0 game-name'><strong class='match_name_cust'>Super Over2</strong></p> </div><div class='col-4 text-right'> <div class='game-icons'> <span class='game-icon'> <span class='active-icon' style='vertical-align: bottom;'></span></span> <span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span><span class='game-icon'><img src='../storage/front/img/ic_fancy.png' class='fancy-icon'></span><span class='game-icon'><img src='../storage/mobile/img/ic_bm.png' class='bm-icon'></span> </div> </div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'> <a href='javascript:void(0);' class='btn-back'>-</a><a href='javascript:void(0);' class='btn-lay'>-</a> </div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>-</a><a href='javascript:void(0);' class='btn-lay'>-</a></div><div class='text-center game-col game-home'> <a href='javascript:void(0);' class='btn-back'>-</a> <a href='javascript:void(0);' class='btn-lay'>-</a></div></div></div></div> </span>";

                        football_html += "<span onclick=\"window.location.href='live_goal2'\"><div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'> <div class='col-8'> <p class='mb-0 game-name'><strong class='match_name_cust'>Goal2</strong></p> </div><div class='col-4 text-right'> <div class='game-icons'> <span class='game-icon'> <span class='active-icon' style='vertical-align: bottom;'></span></span> <span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span></div> </div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'> <a href='javascript:void(0);' class='btn-back'>-</a><a href='javascript:void(0);' class='btn-lay'>-</a> </div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>-</a><a href='javascript:void(0);' class='btn-lay'>-</a></div><div class='text-center game-col game-home'> <a href='javascript:void(0);' class='btn-back'>-</a> <a href='javascript:void(0);' class='btn-lay'>-</a></div></div></div></div> </span>";

                        if (eventType == "10" || eventType == "65") {

                            let dataObj = sportData.body || [];
                            let tabsHTML = "";

                            // 🔹 Create Tabs
                            dataObj.forEach((country, index) => {
                                tabsHTML += `
                                    <div class="tab ${index === 0 ? 'active' : ''}" 
                                        onclick="loadEvents(${index})">
                                        ${country.cname}
                                    </div>
                                `;
                            });

                            // 🔹 Reusable function (IMPORTANT)
                            function renderEvents(country) {
                                let html = "";

                                country.children?.forEach(event => {

                                    // ✅ Check LIVE
                                    let isLive = event.children?.some(m => m.iplay === true);

                                    html += `
                                        <div class="event-box ${isLive ? 'live-event' : ''}">
                                            ${isLive ? "<div class='live-triangle'></div>" : ""}

                                            <div class="event-title">
                                                <span class='game-icon'>
                                                    <i class='fas fa-tv v-m icon-tv'></i>
                                                </span> 
                                                ${event.ename}
                                            </div>
                                    `;

                                    event.children?.forEach(match => {
                                        let time = formatTime(match.stime);
                                        let isLive = match.iplay === true;

                                        html += `
                                        <span class="time-btn ${isLive ? 'live-btn' : ''}" data-id="${match.gmid}">
                                        ${isLive ? "<span class='live-dot'></span>" : ""}
                                        ${time}
                                    </span>
                                        `;
                                    });

                                    html += `</div>`;
                                });

                                return html;
                            }

                            // 🔹 Initial Load (first tab)
                            let eventsHTML = dataObj[0] ? renderEvents(dataObj[0]) : "";

                            // 🔹 FINAL HTML
                            other_html += `
                                <div class="nav-tabs">${tabsHTML}</div>
                                <div id="eventsContainer">${eventsHTML}</div>
                            `;


                            // 🔹 Tab Click Function
                            window.loadEvents = function(index) {

                                let selectedCountry = dataObj[index];
                                if (!selectedCountry) return;

                                let html = renderEvents(selectedCountry);

                                document.getElementById("eventsContainer").innerHTML = html;

                                // Active tab highlight
                                document.querySelectorAll(".tab").forEach((el, i) => {
                                    el.classList.toggle("active", i === index);
                                });
                            };


                            // 🔹 Time Format
                            function formatTime(dateStr) {
                                let date = new Date(dateStr);
                                return date.toLocaleTimeString([], {
                                    hour: '2-digit',
                                    minute: '2-digit',
                                    hour12: false
                                });
                            }
                        } else {

                            for (var i in data.body) {

                                if (data.body[i]) {


                                    event_id = data.body[i].matchid.toString();
                                    marketId = data.body[i].marketid;
                                    n1 = smdl_c.includes(event_id) || smdl_c.includes(event_id.toString());
                                    n2 = mdl_c.includes(event_id) || mdl_c.includes(event_id.toString());
                                    n3 = dl_c.includes(event_id) || dl_c.includes(event_id.toString());

                                    s1 = smdl_s.includes(event_id) || smdl_s.includes(event_id.toString());
                                    s2 = mdl_s.includes(event_id) || mdl_s.includes(event_id.toString());
                                    s3 = dl_s.includes(event_id) || dl_s.includes(event_id.toString());

                                    t1 = smdl_t.includes(event_id) || smdl_t.includes(event_id.toString());
                                    t2 = mdl_t.includes(event_id) || mdl_t.includes(event_id.toString());
                                    t3 = dl_t.includes(event_id) || dl_t.includes(event_id.toString());

                                    b1 = smdl_b.includes(event_id) || smdl_b.includes(event_id.toString());
                                    b2 = mdl_b.includes(event_id) || mdl_b.includes(event_id.toString());
                                    b3 = dl_b.includes(event_id) || dl_b.includes(event_id.toString());

                                    r1 = smdl_r.includes(event_id) || smdl_r.includes(event_id.toString());
                                    r2 = mdl_r.includes(event_id) || mdl_r.includes(event_id.toString());
                                    r3 = dl_r.includes(event_id) || dl_r.includes(event_id.toString());
                                    e1 = evnt.includes(parseInt(marketId)) || evnt.includes(marketId.toString());
                                    if (!n1 && !n2 && !n3 && !s1 && !s2 && !s3 && !t1 && !t2 && !t3 && !b1 && !b2 && !b3 && !
                                        r1 && !r2 && !r3 && !e1) {

                                        if (eventType == 4) {
                                            event_name = data.body[i].matchName;

                                            marketTime = data.body[i].matchdate;
                                            marketDateTime = data.body[i].matchdate;





                                            inPlay = data.body[i].inPlay || "0";
                                            marketId = data.body[i].marketid;
                                            marketinPlay = data.body[i].inPlay || "0";
                                            isFancy = data.body[i].fancy || "0";
                                            is_tv = data.body[i].tv || "0";
                                            fancySpan = "";
                                            market_status = "";
                                            if (marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" ||
                                                marketinPlay == 1) {
                                                market_status = "active-icon";
                                            }

                                            if (isFancy == true || isFancy == "True" || isFancy == "1" || isFancy == 1) {
                                                fancy_status =
                                                    "<span class='game-icon'><img src='../storage/front/img/ic_fancy.png' class='fancy-icon'></span>";
                                            } else {
                                                fancy_status = "";

                                            }

                                            if (is_tv == true || is_tv == "True" || is_tv == "1" || is_tv == 1) {
                                                tv_status =
                                                    "<span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span>";
                                            } else {
                                                tv_status = "";

                                            }


                                            var back_0 = "-";
                                            var back_1 = "-";
                                            var back_2 = "-";

                                            var lay_0 = "-";
                                            var lay_1 = "-";
                                            var lay_2 = "-";

                                            if (data.body[i].b1) {
                                                back_0 = data.body[i].b1;
                                            }
                                            if (data.body[i].b2) {
                                                back_1 = data.body[i].b2;
                                            }
                                            if (data.body[i].b3) {
                                                back_2 = data.body[i].b3;
                                            }

                                            if (data.body[i].l1) {
                                                lay_0 = data.body[i].l1;
                                            }
                                            if (data.body[i].l2) {
                                                lay_1 = data.body[i].l2;
                                            }
                                            if (data.body[i].b3) {
                                                lay_2 = data.body[i].l3;
                                            }

                                            const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", "Jul", "Aug", "Sep",
                                                "Oct", "Nov", "Dec"
                                            ];

                                            // marketTime1 = new Date(marketTime);
                                            // marketdate = ("0" + (marketTime1.getDate())).slice(-2);
                                            // marketMonth = monthNames[marketTime1.getMonth()];
                                            // marketYear = marketTime1.getFullYear();
                                            // marketHours = ("0" + (marketTime1.getHours())).slice(-2);
                                            // marketMinutes = ("0" + (marketTime1.getMinutes())).slice(-2);
                                            // var ampm = marketHours >= 12 ? 'pm' : 'am';

                                            // marketHours = marketHours % 12;
                                            // marketHours = marketHours ? marketHours : 12;

                                            // market_full_date = marketMonth + " " + marketdate + ", " + marketYear + " " +
                                            //     marketHours + ":" + marketMinutes + " " + ampm;

                                            var marketTime1 = new Date(marketTime);

                                            var marketDate = ("0" + marketTime1.getDate()).slice(-2);
                                            var marketMonth = ("0" + (marketTime1.getMonth() + 1)).slice(-2);
                                            var marketYear = marketTime1.getFullYear();

                                            var marketHours = ("0" + marketTime1.getHours()).slice(-2);
                                            var marketMinutes = ("0" + marketTime1.getMinutes()).slice(-2);
                                            var marketSeconds = ("0" + marketTime1.getSeconds()).slice(-2);

                                            var market_full_date =
                                                marketDate + "/" + marketMonth + "/" + marketYear + " " +
                                                marketHours + ":" + marketMinutes + ":" + marketSeconds;

                                            cricket_html += "<span onclick=\"url_redirect('event_full_market?eventType=" +
                                                eventType + "&eventId=" + event_id + "&marketId=" + marketId +
                                                "');\"><div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-8'><p class='mb-0 game-name'><strong class='match_name_cust'>" +
                                                event_name + "</strong></p><p class='mb-0 match_name_cust'>" +
                                                market_full_date +
                                                "</p></div><div class='col-4 text-right'><div class='game-icons'><span class='game-icon'><span class='" +
                                                market_status + "' style='vertical-align: bottom;'></span></span> " +
                                                tv_status + " " + fancy_status +
                                                " <span class='game-icon'><img src='../storage/mobile/img/ic_bm.png' class='bm-icon'></span></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><b >1</b></div><div class='text-center game-col game-home'><b >X</b></div><div class='text-center game-col game-home'><b >2</b></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                                back_0 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_0 +
                                                "</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                                back_2 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_2 +
                                                "</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                                back_1 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_1 +
                                                "</a></div></div></div></div> </span>";



                                        } else if (eventType == 1) {
                                            event_name = data.body[i].matchName;

                                            marketTime = data.body[i].matchdate;
                                            marketDateTime = data.body[i].matchdate;





                                            inPlay = data.body[i].inPlay || "0";
                                            marketId = data.body[i].marketid;
                                            marketinPlay = data.body[i].inPlay || "0";
                                            isFancy = data.body[i].fancy || "0";
                                            is_tv = data.body[i].tv || "0";
                                            fancySpan = "";
                                            market_status = "";
                                            if (marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" ||
                                                marketinPlay == 1) {
                                                market_status = "active-icon";
                                            }

                                            if (isFancy == true || isFancy == "True" || isFancy == "1" || isFancy == 1) {
                                                fancy_status =
                                                    "<span class='game-icon'><img src='../storage/front/img/ic_fancy.png' class='fancy-icon'></span>";
                                            } else {
                                                fancy_status = "";

                                            }

                                            if (is_tv == true || is_tv == "True" || is_tv == "1" || is_tv == 1) {
                                                tv_status =
                                                    "<span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span>";
                                            } else {
                                                tv_status = "";

                                            }


                                            var back_0 = "-";
                                            var back_1 = "-";
                                            var back_2 = "-";

                                            var lay_0 = "-";
                                            var lay_1 = "-";
                                            var lay_2 = "-";

                                            if (data.body[i].b1) {
                                                back_0 = data.body[i].b1;
                                            }
                                            if (data.body[i].b2) {
                                                back_1 = data.body[i].b2;
                                            }
                                            if (data.body[i].b3) {
                                                back_2 = data.body[i].b3;
                                            }

                                            if (data.body[i].l1) {
                                                lay_0 = data.body[i].l1;
                                            }
                                            if (data.body[i].l2) {
                                                lay_1 = data.body[i].l2;
                                            }
                                            if (data.body[i].b3) {
                                                lay_2 = data.body[i].l3;
                                            }



                                            const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", "Jul", "Aug", "Sep",
                                                "Oct", "Nov", "Dec"
                                            ];

                                            marketTime1 = new Date(marketTime);
                                            marketdate = ("0" + (marketTime1.getDate())).slice(-2);
                                            marketMonth = monthNames[marketTime1.getMonth()];
                                            marketYear = marketTime1.getFullYear();
                                            marketHours = ("0" + (marketTime1.getHours())).slice(-2);
                                            marketMinutes = ("0" + (marketTime1.getMinutes())).slice(-2);
                                            var ampm = marketHours >= 12 ? 'pm' : 'am';

                                            marketHours = marketHours % 12;
                                            marketHours = marketHours ? marketHours : 12;

                                            market_full_date = marketMonth + " " + marketdate + ", " + marketYear + " " +
                                                marketHours + ":" + marketMinutes + " " + ampm;

                                            football_html += "<span onclick=\"url_redirect('event_full_market?eventType=" +
                                                eventType + "&eventId=" + event_id + "&marketId=" + marketId +
                                                "');\"><div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-8'><p class='mb-0 game-name'><strong class='match_name_cust'>" +
                                                event_name + "</strong></p><p class='mb-0 match_name_cust'>" +
                                                market_full_date +
                                                "</p></div><div class='col-4 text-right'><div class='game-icons'><span class='game-icon'><span class='" +
                                                market_status + "' style='vertical-align: bottom;'></span></span> " +
                                                tv_status + " " + fancy_status +
                                                " <span class='game-icon'><img src='../storage/mobile/img/ic_bm.png' class='bm-icon'></span></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><b >1</b></div><div class='text-center game-col game-home'><b >X</b></div><div class='text-center game-col game-home'><b >2</b></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                                back_0 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_0 +
                                                "</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                                back_2 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_2 +
                                                "</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                                back_1 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_1 +
                                                "</a></div></div></div></div> </span>";



                                        } else if (eventType == 2) {
                                            event_name = data.body[i].matchName;

                                            marketTime = data.body[i].matchdate;
                                            marketDateTime = data.body[i].matchdate;





                                            inPlay = data.body[i].inPlay || "0";
                                            marketId = data.body[i].marketid;
                                            marketinPlay = data.body[i].inPlay || "0";
                                            isFancy = data.body[i].fancy || "0";
                                            is_tv = data.body[i].tv || "0";
                                            fancySpan = "";
                                            market_status = "";
                                            if (marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" ||
                                                marketinPlay == 1) {
                                                market_status = "active-icon";
                                            }

                                            if (isFancy == true || isFancy == "True" || isFancy == "1" || isFancy == 1) {
                                                fancy_status =
                                                    "<span class='game-icon'><img src='../storage/front/img/ic_fancy.png' class='fancy-icon'></span>";
                                            } else {
                                                fancy_status = "";

                                            }

                                            if (is_tv == true || is_tv == "True" || is_tv == "1" || is_tv == 1) {
                                                tv_status =
                                                    "<span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span>";
                                            } else {
                                                tv_status = "";

                                            }


                                            var back_0 = "-";
                                            var back_1 = "-";
                                            var back_2 = "-";

                                            var lay_0 = "-";
                                            var lay_1 = "-";
                                            var lay_2 = "-";

                                            var back_0 = "-";
                                            var back_1 = "-";
                                            var back_2 = "-";

                                            var lay_0 = "-";
                                            var lay_1 = "-";
                                            var lay_2 = "-";

                                            if (data.body[i].b1) {
                                                back_0 = data.body[i].b1;
                                            }
                                            if (data.body[i].b2) {
                                                back_1 = data.body[i].b2;
                                            }
                                            if (data.body[i].b3) {
                                                back_2 = data.body[i].b3;
                                            }

                                            if (data.body[i].l1) {
                                                lay_0 = data.body[i].l1;
                                            }
                                            if (data.body[i].l2) {
                                                lay_1 = data.body[i].l2;
                                            }
                                            if (data.body[i].b3) {
                                                lay_2 = data.body[i].l3;
                                            }



                                            const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", "Jul", "Aug", "Sep",
                                                "Oct", "Nov", "Dec"
                                            ];

                                            marketTime1 = new Date(marketTime);
                                            marketdate = ("0" + (marketTime1.getDate())).slice(-2);
                                            marketMonth = monthNames[marketTime1.getMonth()];
                                            marketYear = marketTime1.getFullYear();
                                            marketHours = ("0" + (marketTime1.getHours())).slice(-2);
                                            marketMinutes = ("0" + (marketTime1.getMinutes())).slice(-2);
                                            var ampm = marketHours >= 12 ? 'pm' : 'am';

                                            marketHours = marketHours % 12;
                                            marketHours = marketHours ? marketHours : 12;

                                            market_full_date = marketMonth + " " + marketdate + ", " + marketYear + " " +
                                                marketHours + ":" + marketMinutes + " " + ampm;

                                            tennis_html += "<span onclick=\"url_redirect('event_full_market?eventType=" +
                                                eventType + "&eventId=" + event_id + "&marketId=" + marketId +
                                                "');\"><div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-8'><p class='mb-0 game-name'><strong  class='match_name_cust'>" +
                                                event_name + "</strong></p><p class='mb-0 match_name_cust'>" +
                                                market_full_date +
                                                "</p></div><div class='col-4 text-right'><div class='game-icons'><span class='game-icon'><span class='" +
                                                market_status + "' style='vertical-align: bottom;'></span></span> " +
                                                tv_status + " " + fancy_status +
                                                " <span class='game-icon'><img src='../storage/mobile/img/ic_bm.png' class='bm-icon'></span></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><b >1</b></div><div class='text-center game-col game-home'><b >X</b></div><div class='text-center game-col game-home'><b >2</b></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                                back_0 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_0 +
                                                "</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                                back_2 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_2 +
                                                "</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                                back_1 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_1 +
                                                "</a></div></div></div></div> </span>";



                                        }

                                        /* else if (eventType == 3) {
                                            event_name = data.body[i].matchName;

                                            marketTime = data.body[i].matchdate;
                                            marketDateTime = data.body[i].matchdate;





                                            inPlay = data.body[i].inPlay || "0";
                                            marketId = data.body[i].marketid;
                                            marketinPlay = data.body[i].inPlay || "0";
                                            isFancy = data.body[i].fancy || "0";
                                            is_tv = data.body[i].tv || "0";
                                            fancySpan = "";
                                            market_status = "";
                                            if (marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" ||
                                                marketinPlay == 1) {
                                                market_status = "active-icon";
                                            }

                                            if (isFancy == true || isFancy == "True" || isFancy == "1" || isFancy == 1) {
                                                fancy_status =
                                                    "<span class='game-icon'><img src='../storage/front/img/ic_fancy.png' class='fancy-icon'></span>";
                                            } else {
                                                fancy_status = "";

                                            }

                                            if (is_tv == true || is_tv == "True" || is_tv == "1" || is_tv == 1) {
                                                tv_status =
                                                    "<span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span>";
                                            } else {
                                                tv_status = "";

                                            }


                                            var back_0 = "-";
                                            var back_1 = "-";
                                            var back_2 = "-";

                                            var lay_0 = "-";
                                            var lay_1 = "-";
                                            var lay_2 = "-";

                                            var back_0 = "-";
                                            var back_1 = "-";
                                            var back_2 = "-";

                                            var lay_0 = "-";
                                            var lay_1 = "-";
                                            var lay_2 = "-";

                                            if (data.body[i].b1) {
                                                back_0 = data.body[i].b1;
                                            }
                                            if (data.body[i].b2) {
                                                back_1 = data.body[i].b2;
                                            }
                                            if (data.body[i].b3) {
                                                back_2 = data.body[i].b3;
                                            }

                                            if (data.body[i].l1) {
                                                lay_0 = data.body[i].l1;
                                            }
                                            if (data.body[i].l2) {
                                                lay_1 = data.body[i].l2;
                                            }
                                            if (data.body[i].b3) {
                                                lay_2 = data.body[i].l3;
                                            }



                                            const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", "Jul", "Aug", "Sep",
                                                "Oct", "Nov", "Dec"
                                            ];

                                            marketTime1 = new Date(marketTime);
                                            marketdate = ("0" + (marketTime1.getDate())).slice(-2);
                                            marketMonth = monthNames[marketTime1.getMonth()];
                                            marketYear = marketTime1.getFullYear();
                                            marketHours = ("0" + (marketTime1.getHours())).slice(-2);
                                            marketMinutes = ("0" + (marketTime1.getMinutes())).slice(-2);
                                            var ampm = marketHours >= 12 ? 'pm' : 'am';

                                            marketHours = marketHours % 12;
                                            marketHours = marketHours ? marketHours : 12;

                                            market_full_date = marketMonth + " " + marketdate + ", " + marketYear + " " +
                                                marketHours + ":" + marketMinutes + " " + ampm;

                                            golf_html += "<span onclick=\"url_redirect('event_full_market?eventType=" +
                                                eventType + "&eventId=" + event_id + "&marketId=" + marketId +
                                                "');\"><div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-8'><p class='mb-0 game-name'><strong  class='match_name_cust'>" +
                                                event_name + "</strong></p><p class='mb-0 match_name_cust'>" +
                                                market_full_date +
                                                "</p></div><div class='col-4 text-right'><div class='game-icons'><span class='game-icon'><span class='" +
                                                market_status + "' style='vertical-align: bottom;'></span></span> " +
                                                tv_status + " " + fancy_status +
                                                " <span class='game-icon'><img src='../storage/mobile/img/ic_bm.png' class='bm-icon'></span></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><b >1</b></div><div class='text-center game-col game-home'><b >X</b></div><div class='text-center game-col game-home'><b >2</b></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                                back_0 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_0 +
                                                "</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                                back_2 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_2 +
                                                "</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                                back_1 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_1 +
                                                "</a></div></div></div></div> </span>";



                                        } 
                                                */
                                        else if (eventType == 7522) {
                                            event_name = data.body[i].matchName;

                                            marketTime = data.body[i].matchdate;
                                            marketDateTime = data.body[i].matchdate;





                                            inPlay = data.body[i].inPlay || "0";
                                            marketId = data.body[i].marketid;
                                            marketinPlay = data.body[i].inPlay || "0";
                                            isFancy = data.body[i].fancy || "0";
                                            is_tv = data.body[i].tv || "0";
                                            fancySpan = "";
                                            market_status = "";
                                            if (marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" ||
                                                marketinPlay == 1) {
                                                market_status = "active-icon";
                                            }

                                            if (isFancy == true || isFancy == "True" || isFancy == "1" || isFancy == 1) {
                                                fancy_status =
                                                    "<span class='game-icon'><img src='../storage/front/img/ic_fancy.png' class='fancy-icon'></span>";
                                            } else {
                                                fancy_status = "";

                                            }

                                            if (is_tv == true || is_tv == "True" || is_tv == "1" || is_tv == 1) {
                                                tv_status =
                                                    "<span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span>";
                                            } else {
                                                tv_status = "";

                                            }


                                            var back_0 = "-";
                                            var back_1 = "-";
                                            var back_2 = "-";

                                            var lay_0 = "-";
                                            var lay_1 = "-";
                                            var lay_2 = "-";

                                            var back_0 = "-";
                                            var back_1 = "-";
                                            var back_2 = "-";

                                            var lay_0 = "-";
                                            var lay_1 = "-";
                                            var lay_2 = "-";

                                            if (data.body[i].b1) {
                                                back_0 = data.body[i].b1;
                                            }
                                            if (data.body[i].b2) {
                                                back_1 = data.body[i].b2;
                                            }
                                            if (data.body[i].b3) {
                                                back_2 = data.body[i].b3;
                                            }

                                            if (data.body[i].l1) {
                                                lay_0 = data.body[i].l1;
                                            }
                                            if (data.body[i].l2) {
                                                lay_1 = data.body[i].l2;
                                            }
                                            if (data.body[i].b3) {
                                                lay_2 = data.body[i].l3;
                                            }



                                            const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", "Jul", "Aug", "Sep",
                                                "Oct", "Nov", "Dec"
                                            ];

                                            marketTime1 = new Date(marketTime);
                                            marketdate = ("0" + (marketTime1.getDate())).slice(-2);
                                            marketMonth = monthNames[marketTime1.getMonth()];
                                            marketYear = marketTime1.getFullYear();
                                            marketHours = ("0" + (marketTime1.getHours())).slice(-2);
                                            marketMinutes = ("0" + (marketTime1.getMinutes())).slice(-2);
                                            var ampm = marketHours >= 12 ? 'pm' : 'am';

                                            marketHours = marketHours % 12;
                                            marketHours = marketHours ? marketHours : 12;

                                            market_full_date = marketMonth + " " + marketdate + ", " + marketYear + " " +
                                                marketHours + ":" + marketMinutes + " " + ampm;

                                            basketball_html += "<span onclick=\"url_redirect('event_full_market?eventType=" +
                                                eventType + "&eventId=" + event_id + "&marketId=" + marketId +
                                                "');\"><div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-8'><p class='mb-0 game-name'><strong  class='match_name_cust'>" +
                                                event_name + "</strong></p><p class='mb-0 match_name_cust'>" +
                                                market_full_date +
                                                "</p></div><div class='col-4 text-right'><div class='game-icons'><span class='game-icon'><span class='" +
                                                market_status + "' style='vertical-align: bottom;'></span></span> " +
                                                tv_status + " " + fancy_status +
                                                " <span class='game-icon'><img src='../storage/mobile/img/ic_bm.png' class='bm-icon'></span></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><b >1</b></div><div class='text-center game-col game-home'><b >X</b></div><div class='text-center game-col game-home'><b >2</b></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                                back_0 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_0 +
                                                "</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                                back_2 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_2 +
                                                "</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                                back_1 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_1 +
                                                "</a></div></div></div></div> </span>";



                                        } else if (eventType == 7524) {
                                            event_name = data.body[i].matchName;

                                            marketTime = data.body[i].matchdate;
                                            marketDateTime = data.body[i].matchdate;





                                            inPlay = data.body[i].inPlay || "0";
                                            marketId = data.body[i].marketid;
                                            marketinPlay = data.body[i].inPlay || "0";
                                            isFancy = data.body[i].fancy || "0";
                                            is_tv = data.body[i].tv || "0";
                                            fancySpan = "";
                                            market_status = "";
                                            if (marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" ||
                                                marketinPlay == 1) {
                                                market_status = "active-icon";
                                            }

                                            if (isFancy == true || isFancy == "True" || isFancy == "1" || isFancy == 1) {
                                                fancy_status =
                                                    "<span class='game-icon'><img src='../storage/front/img/ic_fancy.png' class='fancy-icon'></span>";
                                            } else {
                                                fancy_status = "";

                                            }

                                            if (is_tv == true || is_tv == "True" || is_tv == "1" || is_tv == 1) {
                                                tv_status =
                                                    "<span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span>";
                                            } else {
                                                tv_status = "";

                                            }


                                            var back_0 = "-";
                                            var back_1 = "-";
                                            var back_2 = "-";

                                            var lay_0 = "-";
                                            var lay_1 = "-";
                                            var lay_2 = "-";

                                            var back_0 = "-";
                                            var back_1 = "-";
                                            var back_2 = "-";

                                            var lay_0 = "-";
                                            var lay_1 = "-";
                                            var lay_2 = "-";

                                            if (data.body[i].b1) {
                                                back_0 = data.body[i].b1;
                                            }
                                            if (data.body[i].b2) {
                                                back_1 = data.body[i].b2;
                                            }
                                            if (data.body[i].b3) {
                                                back_2 = data.body[i].b3;
                                            }

                                            if (data.body[i].l1) {
                                                lay_0 = data.body[i].l1;
                                            }
                                            if (data.body[i].l2) {
                                                lay_1 = data.body[i].l2;
                                            }
                                            if (data.body[i].b3) {
                                                lay_2 = data.body[i].l3;
                                            }



                                            const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", "Jul", "Aug", "Sep",
                                                "Oct", "Nov", "Dec"
                                            ];

                                            marketTime1 = new Date(marketTime);
                                            marketdate = ("0" + (marketTime1.getDate())).slice(-2);
                                            marketMonth = monthNames[marketTime1.getMonth()];
                                            marketYear = marketTime1.getFullYear();
                                            marketHours = ("0" + (marketTime1.getHours())).slice(-2);
                                            marketMinutes = ("0" + (marketTime1.getMinutes())).slice(-2);
                                            var ampm = marketHours >= 12 ? 'pm' : 'am';

                                            marketHours = marketHours % 12;
                                            marketHours = marketHours ? marketHours : 12;

                                            market_full_date = marketMonth + " " + marketdate + ", " + marketYear + " " +
                                                marketHours + ":" + marketMinutes + " " + ampm;

                                            icehockey_html += "<span onclick=\"url_redirect('event_full_market?eventType=" +
                                                eventType + "&eventId=" + event_id + "&marketId=" + marketId +
                                                "');\"><div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-8'><p class='mb-0 game-name'><strong  class='match_name_cust'>" +
                                                event_name + "</strong></p><p class='mb-0 match_name_cust'>" +
                                                market_full_date +
                                                "</p></div><div class='col-4 text-right'><div class='game-icons'><span class='game-icon'><span class='" +
                                                market_status + "' style='vertical-align: bottom;'></span></span> " +
                                                tv_status + " " + fancy_status +
                                                " <span class='game-icon'><img src='../storage/mobile/img/ic_bm.png?1' class='bm-icon'></span></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><b >1</b></div><div class='text-center game-col game-home'><b >X</b></div><div class='text-center game-col game-home'><b >2</b></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                                back_0 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_0 +
                                                "</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                                back_2 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_2 +
                                                "</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                                back_1 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_1 +
                                                "</a></div></div></div></div> </span>";



                                        } else {
                                            event_name = data.body[i].matchName;

                                            marketTime = data.body[i].matchdate;
                                            marketDateTime = data.body[i].matchdate;





                                            inPlay = data.body[i].inPlay || "0";
                                            marketId = data.body[i].marketid;
                                            marketinPlay = data.body[i].inPlay || "0";
                                            isFancy = data.body[i].fancy || "0";
                                            is_tv = data.body[i].tv || "0";
                                            fancySpan = "";
                                            market_status = "";
                                            if (marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" ||
                                                marketinPlay == 1) {
                                                market_status = "active-icon";
                                            }

                                            if (isFancy == true || isFancy == "True" || isFancy == "1" || isFancy == 1) {
                                                fancy_status =
                                                    "<span class='game-icon'><img src='../storage/front/img/ic_fancy.png' class='fancy-icon'></span>";
                                            } else {
                                                fancy_status = "";

                                            }

                                            if (is_tv == true || is_tv == "True" || is_tv == "1" || is_tv == 1) {
                                                tv_status =
                                                    "<span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span>";
                                            } else {
                                                tv_status = "";

                                            }


                                            var back_0 = "-";
                                            var back_1 = "-";
                                            var back_2 = "-";

                                            var lay_0 = "-";
                                            var lay_1 = "-";
                                            var lay_2 = "-";

                                            if (data.body[i].b1) {
                                                back_0 = data.body[i].b1;
                                            }
                                            if (data.body[i].b2) {
                                                back_1 = data.body[i].b2;
                                            }
                                            if (data.body[i].b3) {
                                                back_2 = data.body[i].b3;
                                            }

                                            if (data.body[i].l1) {
                                                lay_0 = data.body[i].l1;
                                            }
                                            if (data.body[i].l2) {
                                                lay_1 = data.body[i].l2;
                                            }
                                            if (data.body[i].b3) {
                                                lay_2 = data.body[i].l3;
                                            }

                                            const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", "Jul", "Aug", "Sep",
                                                "Oct", "Nov", "Dec"
                                            ];

                                            // marketTime1 = new Date(marketTime);
                                            // marketdate = ("0" + (marketTime1.getDate())).slice(-2);
                                            // marketMonth = monthNames[marketTime1.getMonth()];
                                            // marketYear = marketTime1.getFullYear();
                                            // marketHours = ("0" + (marketTime1.getHours())).slice(-2);
                                            // marketMinutes = ("0" + (marketTime1.getMinutes())).slice(-2);
                                            // var ampm = marketHours >= 12 ? 'pm' : 'am';

                                            // marketHours = marketHours % 12;
                                            // marketHours = marketHours ? marketHours : 12;

                                            // market_full_date = marketMonth + " " + marketdate + ", " + marketYear + " " +
                                            //     marketHours + ":" + marketMinutes + " " + ampm;

                                            var marketTime1 = new Date(marketTime);

                                            var marketDate = ("0" + marketTime1.getDate()).slice(-2);
                                            var marketMonth = ("0" + (marketTime1.getMonth() + 1)).slice(-2);
                                            var marketYear = marketTime1.getFullYear();

                                            var marketHours = ("0" + marketTime1.getHours()).slice(-2);
                                            var marketMinutes = ("0" + marketTime1.getMinutes()).slice(-2);
                                            var marketSeconds = ("0" + marketTime1.getSeconds()).slice(-2);

                                            var market_full_date =
                                                marketDate + "/" + marketMonth + "/" + marketYear + " " +
                                                marketHours + ":" + marketMinutes + ":" + marketSeconds;

                                            other_html += "<span class='otherEvents'><div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-8'><p class='mb-0 game-name'><strong class='match_name_cust'>" +
                                                event_name + "</strong></p><p class='mb-0 match_name_cust'>" +
                                                market_full_date +
                                                "</p></div><div class='col-4 text-right'><div class='game-icons'><span class='game-icon'><span class='" +
                                                market_status + "' style='vertical-align: bottom;'></span></span> " +
                                                tv_status + " " + fancy_status +
                                                " <span class='game-icon'><img src='../storage/mobile/img/ic_bm.png' class='bm-icon'></span></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><b >1</b></div><div class='text-center game-col game-home'><b >X</b></div><div class='text-center game-col game-home'><b >2</b></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                                back_0 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_0 +
                                                "</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                                back_2 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_2 +
                                                "</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                                back_1 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_1 +
                                                "</a></div></div></div></div> </span>";
                                        }
                                    }

                                }

                            }
                        }

                        if (eventType == 4) {
                            if (cricket_html == "") {
                                cricket_html =
                                    "<div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-12'><p class='text-center mb-1 mt-1'>No real-time records found</p></div></div></div>";
                            }
                            $("#cricket_event").html(cricket_html);
                            //	cricket_html = "";
                        } else if (eventType == 2) {
                            if (tennis_html == "") {
                                tennis_html =
                                    "<div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-12'><p class='text-center mb-1 mt-1'>No real-time records found</p></div></div></div>";
                            }
                            $("#tennis_event").html(tennis_html);
                            //tennis_html = "";
                        } else if (eventType == 1) {
                            if (football_html == "") {
                                football_html =
                                    "<div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-12'><p class='text-center mb-1 mt-1'>No real-time records found</p></div></div></div>";
                            }
                            $("#football_event").html(football_html);
                            //football_html = "";
                        }

                        /* else if (eventType == 3) {
                            if (golf_html == "") {
                                golf_html =
                                    "<div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-12'><p class='text-center mb-1 mt-1'>No real-time records found</p></div></div></div>";
                            }
                            $("#golf_event").html(golf_html);
                            golf_html = "";
                        } */
                        else if (eventType == 7522) {
                            if (basketball_html == "") {
                                basketball_html =
                                    "<div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-12'><p class='text-center mb-1 mt-1'>No real-time records found</p></div></div></div>";
                            }
                            $("#basketball_event").html(basketball_html);
                            basketball_html = "";
                        } else if (eventType == 10) {
                            if (other_html == "") {
                                other_html =
                                    "<div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-12'><p class='text-center mb-1 mt-1'>No real-time records found</p></div></div></div>";
                            }
                            $("#event_10").html(other_html);
                            other_html = "";
                        } else if (eventType == 7524) {
                            if (icehockey_html == "") {
                                icehockey_html =
                                    "<div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-12'><p class='text-center mb-1 mt-1'>No real-time records found</p></div></div></div>";
                            }
                            $("#icehockey_event").html(icehockey_html);
                            icehockey_html = "";
                        } else {
                            $("#football_event").html("");
                            $("#cricket_event").html("");
                            $("#tennis_event").html("");
                            if (other_html == "") {
                                other_html =
                                    "<div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-12'><p class='text-center mb-1 mt-1'>No real-time records found 1</p></div></div></div>";
                            }
                            $("#event_" + eventType).html(other_html);
                            other_html = "";
                        }
                    } else {
                        var x =
                            '<div class="game-listing-container" style="max-height: calc((100vh - 184px) / 2); overflow-x: auto;"> <div class="game-list pt-1 pb-1 container-fluid"><div class="row row5"><div class="col-12"><p class="text-center mb-1 mt-1">No real-time records found</p> </div></div> </div> </div>';
                        if (sportId == 4) {
                            $("#cricket_event").html(x);
                        } else if (sportId == 2) {
                            $("#tennis_event").html(x);
                        } else if (sportId == 1) {
                            $("#football_event").html(x);
                        }
                    }
                }
            }
        }
    }

    window.addEventListener('pagehide', function() {
        window.destroySportsSocket('pagehide');
    });
    window.addEventListener('pageshow', function(e) {
        if (e.persisted) {
            window._homeSocketScheduled = false;
            window.destroySportsSocket('pageshow-bfcache');
            scheduleHomeSportsSocket();
        }
    });

    function tab_view(tab_name) {
        var has_data = false;
        if (tab_name == "football") {
            if (football_html != "") {
                has_data = true;
            }
            <?php if ($fetch_access['soccer_access'] == 1) { ?>
                if (!event_type_array['1'] || (event_type_array['1'] && event_type_array['1'] <= 0)) {
                    $.ajax({
                        type: 'GET',
                        url: '<?php echo SITE_SPORTS_IP; ?>getSoccerMatches',
                        success: function(data) {
                            setData(data);
                        }
                    });
                }
                socket.emit('getMatches', {
                    eventType: 1
                });
            <?php } ?>
        } else if (tab_name == "tennis") {
            if (tennis_html != "") {
                has_data = true;
            }
            <?php if ($fetch_access['tennis_access'] == 1) { ?>
                if (!event_type_array['2'] || (event_type_array['2'] && event_type_array['2'] <= 0)) {
                    $.ajax({
                        type: 'GET',
                        url: '<?php echo SITE_SPORTS_IP; ?>getTennisMatches',
                        success: function(data) {
                            setData(data);
                        }
                    });
                }
                socket.emit('getMatches', {
                    eventType: 2
                });
            <?php } ?>
        } else if (tab_name == "cricket") {
            if (cricket_html != "") {
                has_data = true;
            }
            <?php if ($fetch_access['cricket_access'] == 1) { ?>
                if (!event_type_array['4'] || (event_type_array['4'] && event_type_array['4'] <= 0)) {
                    $.ajax({
                        type: 'GET',
                        url: '<?php echo SITE_SPORTS_IP; ?>getCricketMatches',
                        success: function(data) {
                            setData(data);
                        }
                    });
                }
                socket.emit('getMatches', {
                    eventType: 4
                });
            <?php } ?>
        } else if (tab_name == "politics") {

            if (!event_type_array['8'] || (event_type_array['8'] && event_type_array['8'] <= 0)) {
                $.ajax({
                    type: 'GET',
                    url: '<?php echo SITE_SPORTS_IP; ?>getCricketMatches',
                    success: function(data) {
                        setData(data);
                    }
                });
            }
            socket.emit('getMatches', {
                eventType: 8
            });

        } else {
            if (other_html != "") {
                has_data = true;
            }
            if (tab_name != "") {
                socket.emit('getMatches', {
                    eventType: tab_name
                });
            }
        }

        if (!has_data) {
            var html = `<div class='game-list pt-1 pb-1 container-fluid'>
                                            <div class='row row5'>
                                                <div class='col-12'>
                                                    <p class='text-center mb-1 mt-1'><i class="fa fa-spinner fa-spin" style="font-size:25px;"></i></p>
                                                </div>
                                            </div>
                                        </div>`;
            var other_html1 =
                "<div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-12'><p class='text-center mb-1 mt-1'>No real-time records found</p></div></div></div>";
            if (tab_name == "football") {
                $("#football_event").html(html);
            } else if (tab_name == "tennis") {
                $("#tennis_event").html(html);
            } else if (tab_name == "cricket") {
                $("#cricket_event").html(html);
            } else if (event_type_array[tab_name] == 0 || event_type_array[tab_name] == undefined) {

                $("#event_" + tab_name).html(other_html1);
            } else {
                $("#event_" + tab_name).html(html);
            }
        } else {
            if (tab_name == "football") {
                $("#football_event").html(football_html);
            } else if (tab_name == "tennis") {
                $("#tennis_event").html(tennis_html);
            } else if (tab_name == "cricket") {
                $("#cricket_event").html(cricket_html);
            } else {
                $("#event_" + tab_name).html(other_html);

            }
        }


    }

    window.applyPendingCricketData = function(data) {
        setData(data);
        window._pendingCricketData = null;
        if (!window._casinoImagesLoaded && (window._casinoPendingLoad || typeof window.scheduleCasinoImages === 'function')) {
            if (typeof window.scheduleCasinoImages === 'function') {
                window.scheduleCasinoImages();
            } else if (typeof window.initCasinoImages === 'function') {
                window.initCasinoImages();
            }
        }
        scheduleHomeSportsSocket();
    };

    if (window._pendingCricketData) {
        applyPendingCricketData(window._pendingCricketData);
    } else if (!window._earlyAjaxStart) {
        $.ajax({
            type: 'GET',
            url: '<?php echo SITE_SPORTS_IP; ?>getCricketMatches',
            success: function(data) {
                window._homeMatchesLoaded = true;
                applyPendingCricketData(data);
            },
            error: function() {
                if (typeof window.scheduleCasinoImages === 'function') window.scheduleCasinoImages();
                else if (typeof window.initCasinoImages === 'function') window.initCasinoImages();
            }
        });
    }

    setTimeout(function() {
        if (!window._homeSocketScheduled) {
            window._homeSocketScheduled = true;
            initHomeSportsSocket();
        }
        if (document.getElementById('casino-tables') && document.getElementById('casino-tables').classList.contains('casino-deferred')) {
            if (typeof window.scheduleCasinoImages === 'function') window.scheduleCasinoImages();
            else if (typeof window.initCasinoImages === 'function') window.initCasinoImages();
        }
    }, 5000);

    $(document).on("click", ".otherEvents", function(e) {
        toastr.clear();
        toastr.warning("", "Block By upline", {
            "timeOut": "3000",
            "iconClass": "toast-warning",
            "positionClass": "toast-top-center",
            "extendedTImeout": "0"
        });
    });

    function showComingSoon(e) {
        toastr.clear()
        toastr.success("", "Coming Soon", {
            "timeOut": "3000",
            "iconClass": "toast-warning",
            "positionClass": "toast-top-center",
            "extendedTImeout": "0"
        });
    }
    $(document).on("click", ".comingsoon", function(e) {
        showComingSoon();
        e.preventDefault();

    });


    $(document).on("click", ".check-balance", function(e) {
        e.preventDefault();

        let url = $(this).attr("href");

        $.ajax({
            url: "../ajaxfiles/refresh_balance.php",
            type: "GET",
            dataType: "json",
            success: function(res) {

                let balance = parseFloat(res.balance);
                console.log("Balance:", balance);

                if (balance < 20000) {
                    toastr.clear();
                    toastr.warning("", "Minimum balance required is 20000", {
                        "timeOut": "3000",
                        "iconClass": "toast-warning",
                        "positionClass": "toast-top-center",
                        "extendedTImeout": "0"
                    });
                } else {
                    // ✅ open page if balance OK
                    window.location.href = url;
                }
            },
            error: function() {
                toastr.warning("", "Unable to fetch balance", {
                    "timeOut": "3000",
                    "iconClass": "toast-warning",
                    "positionClass": "toast-top-center",
                    "extendedTImeout": "0"
                });
            }
        });
    });
</script>
<script type="text/javascript" src='footer-js.js?01'></script>