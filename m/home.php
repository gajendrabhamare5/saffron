<?php
	include("../include/conn.php");
	include("../include/flip_function.php");
	include("../session.php");
	$user_id = $_SESSION['CLIENT_LOGIN_ID'];
	$get_parent_ids = $conn->query("select * from user_login_master where UserID=$user_id");
	$fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
	$parentDL = $fetch_parent_ids['parentDL'];
	$parentMDL = $fetch_parent_ids['parentMDL'];
	$parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];
	$parentKingAdmin = $fetch_parent_ids['parentKingAdmin'];

	if($parentKingAdmin > 0){
		$check_cess_parent = $parentKingAdmin;
	}
	else{
		$check_cess_parent = $parentSuperMDL;
	}

	$get_access = $conn->query("select cricket_access,soccer_access,tennis_access,video_access from user_master where Id=$check_cess_parent");
	$fetch_access = mysqli_fetch_assoc($get_access);

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
    background-color: var(--theme1-bg90) !important;
}
</style>
<?php
	include("head_css.php");
?>
<script type="text/javascript">
var check = false;
(function(a) {
    if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i
        .test(a) ||
        /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i
        .test(a.substr(0, 4))) check = true;
})(navigator.userAgent || navigator.vendor || window.opera);
if (check == false) {
    window.location.assign('<?php echo WEB_URL."home"; ?>');
}
</script>

<body cz-shortcut-listen="true">
    <div id="app">
        <!--
<?php
	include ("loader.php");
?>
 -->
        <div>
            <?php
				include("header.php");
			?>
            <div class="latest-event d-xl-none">

                <?php 
            $sql = "SELECT * FROM home_custom_event_list ORDER BY id DESC LIMIT 5";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $icon_value=$row["sport_type"];
                    if($row["sport_type"] == "8"){
                        $icon_value=40;
                    }
            ?>

                <div class="latest-event-item"><a class="blink_me"
                        href="event_full_market?eventType=<?php echo $row["sport_type"]?>&eventId=<?php echo $row["event_id"]?>&marketId=<?php echo $row["market_id"]?>"><i
                            class='d-icon icon-<?php echo $icon_value?>'></i><span><?php echo $row["event_name"]?></span></a>
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
                    <li class="nav-item"><a href="javascript:void(0)" class="type nav-link newclass"> Lottery </a></li>
                    <li class="nav-item"><a href="home"
                            class="type nav-link router-link-exact-active router-link-active active newclass"> Sports
                        </a></li>
                    <!-- <li class="nav-item"><a href="home" class="type nav-link"> Sports </a></li> -->
                    <li class="nav-item"><a href="slot" class="type nav-link newclass"> Our Casino </a></li>
                    <li class="nav-item"><a href="javascript:void(0)" class="type nav-link newclass"> Live Casino </a>
                    </li>
                    <li class="nav-item"><a href="javascript:void(0)" class="type nav-link newclass"> Slots </a></li>
                    <li class="nav-item"><a href="javascript:void(0)" class="type nav-link newclass"> Fantasy </a></li>
                    <!-- <?php if(ELECTION_EVENT_ID != ''){ ?>
                    	<li class="nav-item"><a href="/m/event_full_market?eventType=<?php echo ELECTION_EVENT_TYPE_ID;?>&eventId=<?php echo ELECTION_EVENT_ID;?>&marketId=<?php echo ELECTION_MARKET_ID;?>" class="type nav-link"> <?php echo ELECTION_MARKET_NAME;?> </a></li>
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
                                <!-- <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game6" class="sports nav-link" onclick="tab_view('politics')">
                                        <div><i class="icon icon-40"></i></div>
                                        <div>
                                        Politics
                                        </div>
                                    </a>
                                </li> -->
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
                                    <a data-toggle="tab" href="#game6" class="sports nav-link">
                                        <div><i class="icon icon-8"></i></div>
                                        <div>
                                            Table Tennis
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game6" class="sports nav-link">
                                        <div><i class="icon icon-66"></i></div>
                                        <div>
                                            Kabaddi
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game6" class="sports nav-link">
                                        <div><i class="icon icon-68"></i></div>
                                        <div>
                                            Esoccer
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game6" class="sports nav-link">
                                        <div><i class="icon icon-10"></i></div>
                                        <div>
                                            Horse Racing
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game6" class="sports nav-link">
                                        <div><i class="icon icon-65"></i></div>
                                        <div>
                                            Greyhound Racing
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game6" class="sports nav-link">
                                        <div><i class="icon icon-15"></i></div>
                                        <div>
                                            Basketball
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game6" class="sports nav-link">
                                        <div><i class="icon icon-18"></i></div>
                                        <div>
                                            Volleyball
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game6" class="sports nav-link">
                                        <div><i class="icon icon-22"></i></div>
                                        <div>
                                            Badminton
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game6" class="sports nav-link">
                                        <div><i class="icon icon-59"></i></div>
                                        <div>
                                            Snooker
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game6" class="sports nav-link">
                                        <div><i class="icon icon-6"></i></div>
                                        <div>
                                            Boxing
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game6" class="sports nav-link">
                                        <div><i class="icon icon-3"></i></div>
                                        <div>
                                            Mixed Martial Arts
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game6" class="sports nav-link">
                                        <div><i class="icon icon-58"></i></div>
                                        <div>
                                            American Football
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game6" class="sports nav-link">
                                        <div><i class="icon icon-11"></i></div>
                                        <div>
                                            E Games
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game6" class="sports nav-link">
                                        <div><i class="icon icon-19"></i></div>
                                        <div>
                                            Ice Hockey
                                        </div>
                                    </a>
                                </li>


                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game6" class="sports nav-link">
                                        <div><i class="icon icon-9"></i></div>
                                        <div>
                                            Futsal
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game6" class="sports nav-link">
                                        <div><i class="icon icon-52"></i></div>
                                        <div>
                                            Motor Sports
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game6" class="sports nav-link">
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
                                        style="max-height: calc((100vh - 184px) / 2);max-height: 250px; overflow-x: auto;">
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
                                        style="max-height: calc((100vh - 184px) / 2);max-height: 250px; overflow-x: auto;">
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
                                        style="max-height: calc((100vh - 184px) / 2);max-height: 250px; overflow-x: auto;">
                                    </div>
                                </div>
                                <div id="game6" class="tab-pane container pl-0 pr-0">
                                    <div class="game-listing-container"
                                        style="max-height: calc((100vh - 184px) / 2);max-height: 250px; overflow-x: auto;">
                                        <div class="game-list pt-1 pb-1 container-fluid">
                                            <div class="row row5">
                                                <div class="col-12">
                                                    <p class="text-center mb-1 mt-1">No real-time records found</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="game8" class="tab-pane container pl-0 pr-0">
                                    <div class="game-listing-container"
                                        style="max-height: calc((100vh - 184px) / 2);max-height: 250px; overflow-x: auto;">
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
                                        style="max-height: calc((100vh - 184px) / 2);max-height: 250px; overflow-x: auto;">
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
                                        style="max-height: calc((100vh - 184px) / 2);max-height: 250px;overflow-x: auto;">
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
                    <?php if($fetch_access['video_access'] == 1){?>
                    <div class="tab-content">
                        <div id="casino-tables" class="tab-pane active casino-tables">
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
                                                src="../storage/mobile/img/casinoicons/teenjoker.jpg"
                                                class="img-fluid">
                                            <div class="casino-name">Teenpatti Joker</div>

                                        </a>
                                    </div>
                                </div> -->
                                    <? if ($user_id == 6840 ){?>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="#" class=""><img src="../storage/front/img/casinoicons/worli3.gif"
                                                    class="img-fluid">
                                                <div class="casino-name">Matka</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_teen62" class=""><img
                                                    src="../storage/front/img/casinoicons/teen62.gif" class="img-fluid">
                                                <div class="casino-name">V VIP Teenpatti 1-day</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_dolidana" class=""><img
                                                    src="../storage/front/img/casinoicons/dolidana.gif"
                                                    class="img-fluid">
                                                <div class="casino-name">DoliDana</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_mogambo" class=""><img
                                                    src="../storage/front/img/casinoicons/mogambo.gif"
                                                    class="img-fluid">
                                                <div class="casino-name">Mogambo</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_teen20v1" class="check-balance"><img
                                                    src="../storage/front/img/casinoicons/teen20v1.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">20-20 Teenpatti Vip1</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_lucky5" class=""><img
                                                    src="../storage/front/img/casinoicons/lucky5.jpg" class="img-fluid">
                                                <div class="casino-name">Lucky 6</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_roulette12" class=""><img
                                                    src="../storage/front/img/casinoicons/roulette12.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">Beach Roulette</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_roulette13" class=""><img
                                                    src="../storage/front/img/casinoicons/roulette13.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">Roulette</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_roulette11" class=""><img
                                                    src="../storage/front/img/casinoicons/roulette11.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">Golden Roulette</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_poison" class=""><img
                                                    src="../storage/front/img/casinoicons/poison.jpg" class="img-fluid">
                                                <div class="casino-name">Teenpatti Poison One Day</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_teenunique" class=""><img
                                                    src="../storage/front/img/casinoicons/teenunique.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">Unique Teenpatti</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_poison20" class=""><img
                                                    src="../storage/front/img/casinoicons/poison20.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">Teenpatti Poison 20-20</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_joker120" class=""><img
                                                    src="../storage/front/img/casinoicons/joker120.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">Unlimited Joker 20-20</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_joker20" class=""><img
                                                    src="../storage/front/img/casinoicons/joker20.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">Teenpatti Joker 20-20</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_joker1" class=""><img
                                                    src="../storage/front/img/casinoicons/joker1.jpg" class="img-fluid">
                                                <div class="casino-name">Unlimited Joker Oneday</div>

                                            </a>
                                        </div>
                                    </div>



                                    <?}?>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_teen20c" class=""><img
                                                    src="../storage/front/img/casinoicons/teen20c.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">20-20 Teenpatti C</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_btable2" class=""><img
                                                    src="../storage/front/img/casinoicons/btable2.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">Bollywood Casino 2</div>

                                            </a>
                                        </div>
                                    </div>
                                    <? if ($user_id == 6840 ){?>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_ourroullete" class=""><img
                                                    src="../storage/front/img/casinoicons/ourroullete.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">Unique Roulette</div>

                                            </a>
                                        </div>
                                    </div>
                                    <?}?>
                                    <!-- <div class="casinowidth text-center">
                                    <div class="casinoicons">
                                        <a href="live_ourroullete" class=""><img
                                                src="../storage/front/img/casinoicons/ourroullete.jpg"
                                                class="img-fluid">
                                            <div class="casino-name">Unique Roulette</div>

                                        </a>
                                    </div>
                                </div> -->
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_superover3" class=""><img
                                                    src="../storage/front/img/casinoicons/superover3.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">Mini SuperOver</div>

                                            </a>
                                        </div>
                                    </div>

                                    <!-- ///////////////////////////////// -->
                                    <!-- ///////////////////////////////// -->

                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_goal" class=""><img
                                                    src="../storage/front/img/casinoicons/goal.jpg" class="img-fluid">
                                                <div class="casino-name">Goal</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_ab204" class=""><img
                                                    src="../storage/front/img/casinoicons/ab4.jpg" class="img-fluid">
                                                <div class="casino-name">ANDAR BAHAR 150 cards</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_lucky15" class=""><img
                                                    src="../storage/front/img/casinoicons/lucky15.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">LUCKY 15</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_superover2" class=""><img
                                                    src="../storage/front/img/casinoicons/superover2.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">Super Over2</div>

                                            </a>
                                        </div>
                                    </div>

                                    <!-- ///////////////////////////////// -->
                                    <!-- ///////////////////////////////// -->

                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_teen41" class=""><img
                                                    src="../storage/front/img/casinoicons/teen41.jpg" class="img-fluid">
                                                <div class="casino-name">Queen Top Open Teenpatti</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_teen42" class=""><img
                                                    src="../storage/front/img/casinoicons/teen42.jpg" class="img-fluid">
                                                <div class="casino-name">Jack Top Open Teenpatti</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_sicbo2" class=""><img
                                                    src="../storage/front/img/casinoicons/sicbo2.jpg" class="img-fluid">
                                                <div class="casino-name">Sic Bo2</div>

                                            </a>
                                        </div>
                                    </div>

                                    <!-- ///////////////////////////////// -->
                                    <!-- ///////////////////////////////// -->

                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_teen33" class=""><img
                                                    src="../storage/front/img/casinoicons/teen33.jpg" class="img-fluid">
                                                <div class="casino-name">Instant Teenpatti 3.0</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_sicbo" class=""><img
                                                    src="../storage/front/img/casinoicons/sicbo.jpg" class="img-fluid">
                                                <div class="casino-name">Sic Bo</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_ballbyball" class=""><img
                                                    src="../storage/mobile/img/casinoicons/ballbyball.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">Ball By Ball</div>

                                            </a>
                                        </div>
                                    </div>

                                    <!-- ///////////////////////////////// -->
                                    <!-- ///////////////////////////////// -->

                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_teen32" class=""><img
                                                    src="../storage/front/img/casinoicons/teen32.jpg" class="img-fluid">
                                                <div class="casino-name">Instant Teenpatti 2.0</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_odi_teenpatti" class=""><img
                                                    src="/storage/mobile/img/casinoicons/teen.jpg" class="img-fluid">
                                                <div class="casino-name">Teenpatti 1-Day</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_20_teenpatti" class=""><img
                                                    src="/storage/mobile/img/casinoicons/teen20.jpg" class="img-fluid">
                                                <div class="casino-name">20-20 Teenpatti</div>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- ///////////////////////////////// -->
                                    <!-- ///////////////////////////////// -->

                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_test_teenpatti" class=""><img
                                                    src="/storage/mobile/img/casinoicons/teen9.jpg" class="img-fluid">
                                                <div class="casino-name">Teenpatti Test</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_open_teenpatti" class=""><img
                                                    src="/storage/mobile/img/casinoicons/teen8.jpg" class="img-fluid">
                                                <div class="casino-name">Teenpatti Open</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_1day_poker" class=""><img
                                                    src="../storage/mobile/img/casinoicons/poker1.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">Poker 1-Day</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_20poker" class=""><img
                                                    src="../storage/mobile/img/casinoicons/poker20.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">20-20 Poker</div>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- ///////////////////////////////// -->
                                    <!-- ///////////////////////////////// -->

                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_6player_poker" class=""><img
                                                    src="../storage/mobile/img/casinoicons/poker6.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">Poker 6 Players</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_baccarat" class=""><img
                                                    src="../storage/mobile/img/casinoicons/baccarat.png"
                                                    class="img-fluid">
                                                <div class="casino-name">Baccarat</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_baccarat2" class=""><img
                                                    src="../storage/mobile/img/casinoicons/baccarat2.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">Baccarat 2</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_20_dragon_tiger" class=""><img
                                                    src="../storage/mobile/img/casinoicons/dt20.jpg" class="img-fluid">
                                                <div class="casino-name">20-20 Dragon Tiger</div>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- ///////////////////////////////// -->
                                    <!-- ///////////////////////////////// -->

                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_odi_dragon_tiger" class=""><img
                                                    src="../storage/mobile/img/casinoicons/dt6.jpg" class="img-fluid">
                                                <div class="casino-name">1 Day Dragon Tiger</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_dtl20" class=""><img
                                                    src="../storage/mobile/img/casinoicons/dtl20.jpg" class="img-fluid">
                                                <div class="casino-name">20-20 D T L</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_dt202" class=""><img
                                                    src="../storage/mobile/img/casinoicons/dt202.jpg" class="img-fluid">
                                                <div class="casino-name">20-20 Dragon Tiger 2</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_32_cards-a" class=""><img
                                                    src="../storage/mobile/img/casinoicons/card32.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">32 Cards A</div>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- ///////////////////////////////// -->
                                    <!-- ///////////////////////////////// -->

                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_32_cards-b" class=""><img
                                                    src="/storage/mobile/img/casinoicons/card32eu.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">32 Cards B</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_ab20" class=""><img
                                                    src="../storage/mobile/img/casinoicons/andar-bahar.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">Andar Bahar</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_ab202" class=""><img
                                                    src="../storage/mobile/img/casinoicons/andar-bahar2.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">Andar Bahar 2</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_lucky7" class=""><img
                                                    src="../storage/mobile/img/casinoicons/lucky7.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">Lucky 7 - A</div>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- ///////////////////////////////// -->
                                    <!-- ///////////////////////////////// -->

                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_lucky7eu" class=""><img
                                                    src="../storage/mobile/img/casinoicons/lucky7Bhome.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">Lucky 7 - B</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_3cardj" class=""><img
                                                    src="../storage/mobile/img/casinoicons/3cardj.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">3 Cards Judgement</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_casino_war" class=""><img
                                                    src="../storage/mobile/img/casinoicons/warr.jpg" class="img-fluid">
                                                <div class="casino-name">Casino War</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_worli_matka" class=""><img
                                                    src="../storage/mobile/img/casinoicons/worlii.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">Worli Matka</div>

                                            </a>
                                        </div>
                                    </div>

                                    <!-- ///////////////////////////////// -->
                                    <!-- ///////////////////////////////// -->

                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_instant_worli" class=""><img
                                                    src="../storage/mobile/img/casinoicons/worli2.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">Instant Worli</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_aaa" class=""><img
                                                    src="../storage/mobile/img/casinoicons/aaa.jpg" class="img-fluid">
                                                <div class="casino-name">Amar Akbar Anthony</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_ddb" class=""><img
                                                    src="../storage/mobile/img/casinoicons/bollywood-casino.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">Bollywood Casino</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_lottcard" class=""><img
                                                    src="../storage/mobile/img/casinoicons/lottcard.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">Lottery</div>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- ///////////////////////////////// -->
                                    <!-- ///////////////////////////////// -->

                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_5_cricket" class=""><img
                                                    src="../storage/mobile/img/casinoicons/cricketv3.jpeg"
                                                    class="img-fluid">
                                                <div class="casino-name">5Five Cricket</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_cc20" class=""><img
                                                    src="../storage/mobile/img/casinoicons/cmatch20.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">Cricket Match 20-20</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_cmeter" class=""><img
                                                    src="../storage/mobile/img/casinoicons/cmeter.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">Casino Meter</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_teen6" class=""><img
                                                    src="../storage/mobile/img/casinoicons/teen6.jpg" class="img-fluid">
                                                <div class="casino-name">Teenpatti - 2.0</div>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- ///////////////////////////////// -->
                                    <!-- ///////////////////////////////// -->

                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_queen" class=""><img
                                                    src="../storage/mobile/img/casinoicons/queen.jpeg"
                                                    class="img-fluid">
                                                <div class="casino-name">Queen</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_race20" class=""><img
                                                    src="../storage/mobile/img/casinoicons/race20.png"
                                                    class="img-fluid">
                                                <div class="casino-name">Race20</div>

                                            </a>
                                        </div>
                                    </div>

                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_lucky7eu2" class=""><img
                                                    src="../storage/front/img/casinoicons/lucky7eu2.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">Lucky 7-C</div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_superover" class=""><img
                                                    src="../storage/mobile/img/casinoicons/superover.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">Super Over</div>
                                                <div class="new-launch-casino">New Launch</div>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- ///////////////////////////////// -->
                                    <!-- ///////////////////////////////// -->

                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_thetrap" class=""><img
                                                    src="../storage/mobile/img/casinoicons/trap.jpg" class="img-fluid">
                                                <div class="casino-name">The Trap</div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_patti2" class=""><img
                                                    src="../storage/front/img/casinoicons/patti2.jpg" class="img-fluid">
                                                <div class="casino-name">2 Cards Teenpatti</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_teensin" class=""><img
                                                    src="../storage/front/img/casinoicons/teensin.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">29Card Baccarat</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_teenmuf" class=""><img
                                                    src="../storage/front/img/casinoicons/teenmuf.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">Muflis Teenpatti</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_race17" class=""><img
                                                    src="../storage/front/img/casinoicons/race17.jpg" class="img-fluid">
                                                <div class="casino-name">Race To 17</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_teen20b" class=""><img
                                                    src="../storage/front/img/casinoicons/teen20b.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">20-20 Teenpatti B</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_trio" class=""><img
                                                    src="../storage/front/img/casinoicons/trio.jpg" class="img-fluid">
                                                <div class="casino-name">Trio</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_notenum" class=""><img
                                                    src="../storage/front/img/casinoicons/notenum.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">Note Number</div>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- <div class="casinowidth text-center">
                                    <div class="casinoicons">
                                        <a href="live_kbc" class=""><img
                                                src="../storage/front/img/casinoicons/kbc.jpg"
                                                class="img-fluid">
                                            <div class="casino-name">K.B.C</div>
                                        </a>
                                    </div>
                                </div> -->
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_teen120" class=""><img
                                                    src="../storage/front/img/casinoicons/teen120.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">1 CARD 20-20</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_teen1" class=""><img
                                                    src="../storage/front/img/casinoicons/teen1.jpg" class="img-fluid">
                                                <div class="casino-name">1 CARD ONE-DAY</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_ab3" class=""><img
                                                    src="../storage/front/img/casinoicons/ab3.jpg" class="img-fluid">
                                                <div class="casino-name">ANDAR BAHAR 50 cards</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_aaa2" class=""><img
                                                    src="../storage/front/img/casinoicons/aaa2.jpg" class="img-fluid">
                                                <div class="casino-name">Amar Akbar Anthony 2</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_race2" class=""><img
                                                    src="../storage/front/img/casinoicons/race2.jpg" class="img-fluid">
                                                <div class="casino-name">Race to 2nd</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_teen3" class=""><img
                                                    src="../storage/front/img/casinoicons/teen3.jpg" class="img-fluid">
                                                <div class="casino-name">Instant Teenpatti</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_dum10" class=""><img
                                                    src="../storage/front/img/casinoicons/dum10.jpg" class="img-fluid">
                                                <div class="casino-name">Dus ka Dum</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="casinowidth text-center">
                                        <div class="casinoicons">
                                            <a href="live_cmeter1" class=""><img
                                                    src="../storage/front/img/casinoicons/cmeter1.jpg"
                                                    class="img-fluid">
                                                <div class="casino-name">1 Card Meter</div>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- ///////////////////////////////// -->

                                </div>


                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://saffronexch247.com/js/socket.io.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
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
    $check = $conn->query("SELECT * FROM home_image WHERE device='$device' LIMIT 1");
$row   = $check->fetch_assoc();

if ($device == 'Mob' && $row) {
    
?>

    <div role="dialog" class="modal in" id="home_poup" aria-modal="true">
        <div class="modal-dialog modal-xl"><span tabindex="0"></span>
            <div role="document" tabindex="-1" class="modal-content" id="__BVID__151___BV_modal_content_">
                <header class="modal-header" id="__BVID__151___BV_modal_header_">
                    <h5 class="modal-title" id="__BVID__151___BV_modal_title_"></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </header>

                <img src="../<?php echo $row['image'] . '?' . time(); ?>" style="height:95vh">

            </div><span tabindex="0"></span>
        </div>
    </div>

    <?php
/* if(!isset($_SESSION['login_popup'])){
    echo '<script type="text/javascript">$(document).ready(function (){$("#modal_login_notification_popup").modal("show"); });</script>';
}
$_SESSION['login_popup'] = 1; */
if (!isset($_SESSION['home_poup'])) {
	echo '<script type="text/javascript">$(document).ready(function (){$("#home_poup").modal("show"); });</script>';
}
$_SESSION['home_poup'] = 1;
}
?>

    <script type="text/javascript">
    function url_redirect(link) {
        location.href = '<?php echo str_replace("index","",MOBILE_URL); ?>' + link;
    }
    </script>
</body>

<?php
	include "footer.php";
?>

</html>

<script type="text/javascript">
var cricket_html = "";
var football_html = "";
var tennis_html = "";


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
var socket = io("<?php echo SITE_SPORTS_IP; ?>");

$.ajax({
    type: 'GET',
    url: '<?php echo SITE_SPORTS_IP; ?>getCricketMatches',
    success: function(data) {
        setData(data);
    }
});
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
                    data.body.sort(function(a, b) {
                        return (a.inPlay === b.inPlay) ? 0 : (a.inPlay ? -1 : 1);
                    });
                    key = Object.keys(data.body)[0];
                    eventType = parseInt(data.body[key].SportId);
                    event_type_array[eventType] = data.body.length;

                 
                        cricket_html += "<span onclick=\"window.location.href='live_superover2'\"><div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'> <div class='col-8'> <p class='mb-0 game-name'><strong class='match_name_cust'>Super Over2</strong></p> </div><div class='col-4 text-right'> <div class='game-icons'> <span class='game-icon'> <span class='active-icon' style='vertical-align: bottom;'></span></span> <span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span><span class='game-icon'><img src='../storage/front/img/ic_fancy.png' class='fancy-icon'></span><span class='game-icon'><img src='../storage/mobile/img/ic_bm.png' class='bm-icon'></span> </div> </div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'> <a href='javascript:void(0);' class='btn-back'>-</a><a href='javascript:void(0);' class='btn-lay'>-</a> </div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>-</a><a href='javascript:void(0);' class='btn-lay'>-</a></div><div class='text-center game-col game-home'> <a href='javascript:void(0);' class='btn-back'>-</a> <a href='javascript:void(0);' class='btn-lay'>-</a></div></div></div></div> </span>";

                        football_html += "<span onclick=\"window.location.href='live_goal'\"><div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'> <div class='col-8'> <p class='mb-0 game-name'><strong class='match_name_cust'>Goal</strong></p> </div><div class='col-4 text-right'> <div class='game-icons'> <span class='game-icon'> <span class='active-icon' style='vertical-align: bottom;'></span></span> <span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span></div> </div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'> <a href='javascript:void(0);' class='btn-back'>-</a><a href='javascript:void(0);' class='btn-lay'>-</a> </div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>-</a><a href='javascript:void(0);' class='btn-lay'>-</a></div><div class='text-center game-col game-home'> <a href='javascript:void(0);' class='btn-back'>-</a> <a href='javascript:void(0);' class='btn-lay'>-</a></div></div></div></div> </span>";
                 
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



                                }


                                if (eventType == 1) {
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



                                }

                                if (eventType == 2) {
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

                                if (eventType == 3) {
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
                                if (eventType == 7522) {
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



                                }

                                if (eventType == 7524) {
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
                    }
                    if (eventType == 2) {
                        if (tennis_html == "") {
                            tennis_html =
                                "<div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-12'><p class='text-center mb-1 mt-1'>No real-time records found</p></div></div></div>";
                        }
                        $("#tennis_event").html(tennis_html);
                        //tennis_html = "";
                    }
                    if (eventType == 1) {
                        if (football_html == "") {
                            football_html =
                                "<div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-12'><p class='text-center mb-1 mt-1'>No real-time records found</p></div></div></div>";
                        }
                        $("#football_event").html(football_html);
                        //football_html = "";
                    }

                    if (eventType == 3) {
                        if (golf_html == "") {
                            golf_html =
                                "<div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-12'><p class='text-center mb-1 mt-1'>No real-time records found</p></div></div></div>";
                        }
                        $("#golf_event").html(golf_html);
                        golf_html = "";
                    }
                    if (eventType == 7522) {
                        if (basketball_html == "") {
                            basketball_html =
                                "<div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-12'><p class='text-center mb-1 mt-1'>No real-time records found</p></div></div></div>";
                        }
                        $("#basketball_event").html(basketball_html);
                        basketball_html = "";
                    }
                    if (eventType == 7524) {
                        if (icehockey_html == "") {
                            icehockey_html =
                                "<div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-12'><p class='text-center mb-1 mt-1'>No real-time records found</p></div></div></div>";
                        }
                        $("#icehockey_event").html(icehockey_html);
                        icehockey_html = "";
                    }
                } else {
                    var x =
                        '<div class="game-listing-container" style="max-height: calc((100vh - 184px) / 2); overflow-x: auto;"> <div class="game-list pt-1 pb-1 container-fluid"><div class="row row5"><div class="col-12"><p class="text-center mb-1 mt-1">No real-time records found</p> </div></div> </div> </div>';
                    if (sportId == 4) {
                        $("#cricket_event").html(x);
                    }
                    if (sportId == 2) {
                        $("#tennis_event").html(x);
                    }
                    if (sportId == 1) {
                        $("#football_event").html(x);
                    }
                }
            }
        }
    }
}

socket.on('connect', function() {
    <?php if($fetch_access['cricket_access'] == 1){ ?>
    socket.emit('getMatches', {
        eventType: 4
    });
    <?php } ?>
});

function tab_view(tab_name) {
    var has_data = false;
    if (tab_name == "football") {
        if (football_html != "") {
            has_data = true;
        }
        <?php if($fetch_access['soccer_access'] == 1){ ?>
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
        <?php if($fetch_access['tennis_access'] == 1){ ?>
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
        <?php if($fetch_access['cricket_access'] == 1){ ?>
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

    } else {}
    if (!has_data) {
        var html = `<div class='game-list pt-1 pb-1 container-fluid'>
											<div class='row row5'>
												<div class='col-12'>
													<p class='text-center mb-1 mt-1'><i class="fa fa-spinner fa-spin" style="font-size:25px;"></i></p>
												</div>
											</div>
										</div>`;
        if (tab_name == "football") {
            $("#football_event").html(html);
        } else if (tab_name == "tennis") {
            $("#tennis_event").html(html);
        } else if (tab_name == "cricket") {
            $("#cricket_event").html(html);
        }
    } else {
        if (tab_name == "football") {
            $("#football_event").html(football_html);
        } else if (tab_name == "tennis") {
            $("#tennis_event").html(tennis_html);
        } else if (tab_name == "cricket") {
            $("#cricket_event").html(cricket_html);
        }
    }


}

socket.on('eventGetLiveEventName', function(data) {
    args = data;
    setData(data);
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