<?php
include("include/conn.php");
include('include/flip_function.php');
include('session.php');
$user_id = $_SESSION['CLIENT_LOGIN_ID'];

$get_parent_ids = $conn->query("select parentSuperMDL from user_login_master where UserID=$user_id");
$fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
$parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];

$get_access = $conn->query("select cricket_access,soccer_access,soccer_access,video_access from user_master where Id=$parentSuperMDL");
$fetch_access = mysqli_fetch_assoc($get_access);

if ($fetch_access['video_access'] != 1) {
    echo "<script>alert('you are does not access this game');window.location.href='/';</script>";
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<?php
include("head_css.php");
?>
<style>
    .casino-table {
        background-color: #f7f7f7;
        color: #333;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-top: 5px;
    }

    .casino-table-box {
        width: 100%;
        display: flex;
        /* flex-wrap: wrap; */
        justify-content: space-between;
        align-items: flex-start;
    }

    .casino-odd-box-container {
        width: 100%;
    }

    .casino-odd-box-container {
        width: calc(25% - 7.5px);
        margin-right: 10px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .casino-nation-name {
        font-size: 16px;
        font-weight: bold;
        margin: 6px;
    }

    .casino-nation-name {
        width: 100%;
        text-align: center;
    }

    .casino-odds-box {
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 5px 0;
        font-weight: bold;
        border-left: 1px solid #c7c8ca;
        cursor: pointer;
        min-height: 46px;
    }

    .casino-odds-box {
        width: 49%;
    }

    .casino-odds {
        font-size: 18px;
        font-weight: bold;
        line-height: 1;
    }

    .casino-nation-book {
        font-size: 12px;
        font-weight: bold;
        min-height: 18px;
        z-index: 1;
    }

    .suspended-box {
        position: relative;
        pointer-events: none;
        cursor: none;
    }

    .suspended-box::before {
        background-image: url(storage/front/img/lock.svg);
        background-size: 17px 17px;
        filter: invert(1);
        -webkit-filter: invert(1);
        background-repeat: no-repeat;
        content: "";
        position: absolute;
        z-index: 1;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-position: center;
        pointer-events: none;
    }

    .suspended-box::after {
        content: "";
        background-color: #373636d6;
        position: absolute;
        height: 100%;
        width: 100%;
        left: 0;
        top: 0;
        cursor: not-allowed;
        display: flex;
        justify-content: center;
        align-items: center;
        pointer-events: none;
    }

    .casino-last-result-title {
        padding: 10px;
        background-color: var(--theme2-bg);
        color: #ffffff;
        font-size: 14px;
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
        width: 100%;
        /* height: 41px; */
        align-items: center;
    }

    .casino-last-result-title a {
        color: #ffffff;
    }

    .casino-last-results {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-end;
        margin-top: 10px;
        width: 100%;
    }

    .casino-last-results .result {
        background: #355e3b;
        color: #fff;
        height: 30px;
        width: 30px;
        border-radius: 50%;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        font-weight: bold;
        margin-left: 5px;
        cursor: pointer;
    }

    .casino-last-results .result.result-a {
        color: #ff4500;
    }

    .casino-last-results .result.result-b {
        color: #ffff33;
    }

    .casino-last-results .result.result-c {
        color: #33c6ff;
    }
</style>

<body cz-shortcut-listen="true" class="" data-modal-open-count="0" style="">
    <div id="app">
        <?php
        include("loader.php");
        ?>
        <div class="wrapper">
            <?php
            include("header.php");
            ?>
            <div class="main">
                <div class="container-fluid container-fluid-5">
                    <div class="row row5">
                        <?php
                        include("left_sidebar.php");
                        ?>
                        <!---->
                        <div class="col-md-10 featured-box">
                            <div class="row row5 teenpatti-1day">
                                <div class="col-md-9 coupon-card featured-box-detail">
                                    <div class="coupon-card">
                                        <div class="game-heading"><span class="card-header-title">Race to 17
                                                <!-- <small role="button" class="teenpatti-rules"  onclick="view_rules('tp-rules.jpg')" data-target="#rules_popup" data-toggle="modal"  tabindex="0"><u>Rules</u></small> -->
                                                <!---->
                                            </span>
                                            <small role="button" class="teenpatti-rules" onclick="view_rules('race17')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small>
                                            <span class="float-right">
                                                Round ID:
                                                <span class="round_no">0</span>
                                                <!--   | Min: <span>100</span> | Max: <span>500000</span> --></span>
                                        </div>
                                        <!---->
                                        <div class="video-container">
                                            <?php
                                            if (!empty(IFRAME_URL_SET)) {
                                            ?>
                                                <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . RACE17_CODE; ?>" width="100%" height="200px" style="border: 0px;"></iframe>
                                            <?php

                                            } else {
                                            ?>
                                                <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                            <?php

                                            }
                                            ?>
                                            <!---->
                                            <!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL;
                                                                                    echo RACE17_CODE; ?>" width="100%" height="400"
                                                style="border: 0px;"></iframe> -->
                                            <div class="clock clock2digit flip-clock-wrapper">
                                                <ul class="flip play">
                                                    <li class="flip-clock-before">
                                                        <a href="#">
                                                            <div class="up">
                                                                <div class="shadow"></div>
                                                                <div class="inn">4</div>
                                                            </div>
                                                            <div class="down">
                                                                <div class="shadow"></div>
                                                                <div class="inn">4</div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="flip-clock-active">
                                                        <a href="#">
                                                            <div class="up">
                                                                <div class="shadow"></div>
                                                                <div class="inn">3</div>
                                                            </div>
                                                            <div class="down">
                                                                <div class="shadow"></div>
                                                                <div class="inn">3</div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <ul class="flip play">
                                                    <li class="flip-clock-before">
                                                        <a href="#">
                                                            <div class="up">
                                                                <div class="shadow"></div>
                                                                <div class="inn">3</div>
                                                            </div>
                                                            <div class="down">
                                                                <div class="shadow"></div>
                                                                <div class="inn">3</div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="flip-clock-active">
                                                        <a href="#">
                                                            <div class="up">
                                                                <div class="shadow"></div>
                                                                <div class="inn">2</div>
                                                            </div>
                                                            <div class="down">
                                                                <div class="shadow"></div>
                                                                <div class="inn">2</div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="video-overlay">
                                                <div class="videoCards">
                                                    <div>
                                                        <h3 class="text-white">Total : <span
                                                                class="cards_total">0</span></h3>
                                                        <div class="d-flex flex-column mt-1">
                                                            <img id="card_c1" src="storage/front/img/cards/1.png">
                                                            <img id="card_c2" src="storage/front/img/cards/1.png">
                                                            <img id="card_c3" src="storage/front/img/cards/1.png">
                                                            <img id="card_c4" src="storage/front/img/cards/1.png">
                                                            <img id="card_c5" src="storage/front/img/cards/1.png">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="casino-detail">
                                            <div class="casino-table">
                                                <div class="casino-table-box markets_all">
                                                    <!-- <div class="casino-odd-box-container">
                                                        <div class="casino-nation-name">Race to 17</div>
                                                        <div class="casino-odds-box back"><span class="casino-odds">1.08</span></div>
                                                        <div class="casino-odds-box lay"><span class="casino-odds">1.1</span></div>
                                                        <div class="casino-nation-book text-center w-100"></div>
                                                    </div>
                                                    <div class="casino-odd-box-container">
                                                        <div class="casino-nation-name">Big Card (7,8,9) - 3</div>
                                                        <div class="casino-odds-box back"><span class="casino-odds">4.37</span></div>
                                                        <div class="casino-odds-box lay"><span class="casino-odds">4.72</span></div>
                                                        <div class="casino-nation-book text-center w-100"></div>
                                                    </div>
                                                    <div class="casino-odd-box-container">
                                                        <div class="casino-nation-name">Zero Card - 3</div>
                                                        <div class="casino-odds-box back"><span class="casino-odds">3.02</span></div>
                                                        <div class="casino-odds-box lay"><span class="casino-odds">3.23</span></div>
                                                        <div class="casino-nation-book text-center w-100"></div>
                                                    </div>
                                                    <div class="casino-odd-box-container">
                                                        <div class="casino-nation-name">Any Zero</div>
                                                        <div class="casino-odds-box back suspended-box"><span class="casino-odds">0</span></div>
                                                        <div class="casino-odds-box lay suspended-box"><span class="casino-odds">0</span></div>
                                                        <div class="casino-nation-book text-center w-100"></div>
                                                    </div> -->
                                                </div>
                                            </div>
                                            <div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=race17">View All</a></span></div>
                                            <div class="casino-last-results" id="last-result">
                                                <!-- <span class="result result-b">Y</span><span class="result result-a">N</span><span class="result result-b">Y</span><span class="result result-b">Y</span><span class="result result-b">Y</span><span class="result result-a">N</span><span class="result result-b">Y</span><span class="result result-a">N</span><span class="result result-a">N</span><span class="result result-b">Y</span> -->
                                            </div>
                                        </div>

                                        <!-- <div class="fancy-marker-title">
                                            <h4>Last Result <a href="casinoresults?game_type=race17"
                                                    class="result-view-all">View All</a></h4>
                                        </div>
                                        <div class="m-b-10">
                                            <p id="last-result" class="text-right"></p>
                                        </div> -->
                                    </div>
                                </div>
                                <?php
                                include("right_sidebar.php");
                                ?>
                                <div>
                                    <!---->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="js/socket.io.js"></script>
            <script type="text/javascript" src="js/jquery.min.js"></script>
            <?php
            include("footer.php");
            ?>
        </div>
    </div>






</body>

<script src="storage/front/js/flipclock.js" type="text/javascript"></script>
<script type="text/javascript" src='footer-js.js?1'></script>

<script type="text/javascript">
    $(function() {
        var header = $("#sidebar-right");
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();

            if (scroll >= $(window).height() / 3) {
                $("#sidebar-right").css('position', 'fixed');
                $("#sidebar-right").css('top', '0px');
                $("#sidebar-right").css('right', '0px');
                $("#sidebar-right").css('width', '25.5%');
            } else {
                $("#sidebar-right").css('position', 'relative');
                $("#sidebar-right").css('top', '0px');
                $("#sidebar-right").css('right', '0px');
                $("#sidebar-right").css('width', '25.5%');
            }
        });
    });


    var site_url = '<?php echo WEB_URL; ?>';
    var websocketurl = '<?php echo GAME_IP; ?>';
    var clock = new FlipClock($(".clock"), {
        clockFace: "Counter"
    });
    var oldGameId = 0;
    var resultGameLast = 0;
    var selectionid = "";
    var runner = "";
    var b1 = "";
    var bs1 = "";
    var l1 = "";
    var ls1 = "";
    var markettype = "RACE17";
    var markettype_2 = markettype;
    var back_html = "";
    var lay_html = "";
    var gstatus = "";
    var last_result_id = '0';

    function websocket(type) {
        socket = io.connect(websocketurl, {
            transports: ['websocket']
        });
        socket.on('connect', function() {
            socket.emit('Room', 'race17');
        });
        socket.on('gameIframe', function(data) {
            $("#casinoIframe").attr('src', data);
        });
        socket.on('game', function(data) {
           
            data1 = data;
            if (data && data.t1) {
                if (oldGameId != data1.t1[0].mid && data1.t1[0].mid != 0 && data1.t1[0].mid != "0") {
                    setTimeout(function() {
                        clearCards();
                    }, <?php echo CASINO_RESULT_TIMEOUT; ?>);
                }
                oldGameId = data1.t1[0].mid;
                if (data1.t1[0].mid != 0 && data1.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark")
                        .text(data.t1[0].remark);
                    var card_count = 0;
                    if (data.t1[0].C1 != 1) {
                        $("#card_c1").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C1 +
                            ".png");
                        card_value = getType(data.t1[0].C1);
                        card_rank = card_value.rank;
                        card_count += card_rank;
                    }
                    if (data.t1[0].C2 != 1) {
                        $("#card_c2").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C2 +
                            ".png");
                        card_value = getType(data.t1[0].C2);
                        card_rank = card_value.rank;
                        card_count += card_rank;
                    }
                    if (data.t1[0].C3 != 1) {
                        $("#card_c3").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C3 +
                            ".png");
                        card_value = getType(data.t1[0].C3);
                        card_rank = card_value.rank;
                        card_count += card_rank;
                    }
                    if (data.t1[0].C4 != 1) {
                        $("#card_c4").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C4 +
                            ".png");
                        card_value = getType(data.t1[0].C4);
                        card_rank = card_value.rank;
                        card_count += card_rank;
                    }
                    if (data.t1[0].C5 != 1) {
                        $("#card_c5").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C5 +
                            ".png");
                        card_value = getType(data.t1[0].C5);
                        card_rank = card_value.rank;
                        card_count += card_rank;
                    }
                    $(".cards_total").text(card_count);
                }
                clock.setValue(data.t1[0].autotime);
                $(".round_no").text(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid
                    .split(".")[1] : data.t1[0].mid);
                eventId = data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[
                    1] : data.t1[0].mid;
                var markets_all_race = "";
                var markets_all_other = "";
                var markets_all_only_zero = "";
                for (var j in data.t2) {
                    selectionid = data.t2[j].sectionId || data.t2[j].sid;
                    new_selectionid = selectionid;
                    runner = data.t2[j].nation || data.t2[j].nat;
                    b1 = data.t2[j].b1;
                    bs1 = data.t2[j].bs1;
                    l1 = data.t2[j].l1;
                    ls1 = data.t2[j].ls1;
                    visible = data.t2[j].visible;
                    if (visible == "1") {

                        /* back_html = '<span class="odds d-block"><b>' + b1 +
                            '</b></span> <span style="color: black;">' +
                            bs1 + '</span>';
                        $(".market_" + selectionid + "_b_btn").attr("side", "Back");
                        $(".market_" + selectionid + "_b_btn").attr("selectionid", selectionid);
                        $(".market_" + selectionid + "_b_btn").attr("marketid", selectionid);
                        $(".market_" + selectionid + "_b_btn").attr("runner", runner);
                        $(".market_" + selectionid + "_b_btn").attr("marketname", runner);
                        $(".market_" + selectionid + "_b_btn").attr("eventid", eventId);
                        $(".market_" + selectionid + "_b_btn").attr("markettype", markettype);
                        $(".market_" + selectionid + "_b_btn").attr("event_name", markettype);
                        $(".market_" + selectionid + "_b_btn").attr("fullmarketodds", b1);
                        $(".market_" + selectionid + "_b_btn").attr("fullfancymarketrate", b1);
                        $(".market_" + selectionid + "_b_btn").html(back_html);

                        lay_html = '<span class="odds d-block"><b>' + l1 +
                            '</b></span> <span style="color: black;">' +
                            ls1 + '</span>';
                        $(".market_" + selectionid + "_l_btn").attr("side", "Back");
                        $(".market_" + selectionid + "_l_btn").attr("selectionid", selectionid);
                        $(".market_" + selectionid + "_l_btn").attr("marketid", selectionid);
                        $(".market_" + selectionid + "_l_btn").attr("runner", runner);
                        $(".market_" + selectionid + "_l_btn").attr("marketname", runner);
                        $(".market_" + selectionid + "_l_btn").attr("eventid", eventId);
                        $(".market_" + selectionid + "_l_btn").attr("markettype", markettype);
                        $(".market_" + selectionid + "_l_btn").attr("event_name", markettype);
                        $(".market_" + selectionid + "_l_btn").attr("fullmarketodds", l1);
                        $(".market_" + selectionid + "_l_btn").attr("fullfancymarketrate", l1);
                        $(".market_" + selectionid + "_l_btn").html(lay_html); */

                        var statuss = "";

                        gstatus = data.t2[j].gstatus.toString();
                        if (gstatus == "SUSPENDED" || gstatus == "0") {
                            /*  $(".market_" + selectionid + "_row").addClass("suspended"); */
                            statuss = "suspended-box";
                        } else {
                            /*  $(".market_" + selectionid + "_row").removeClass("suspended"); */
                        }
                        var exposure = "";
                        var ex_color = "";
                        if ($('.casino-nation-book').hasClass("market_" + new_selectionid + "_b_exposure")) {
                            exposure = $(".market_" + new_selectionid + "_b_exposure").html();

                            if (exposure != "") {
                                if (parseInt(exposure, 10) < 0) {
                                    ex_color = "redd";
                                } else {
                                    ex_color = "greenn";
                                }
                            }
                        }
                        var back_data =
                            `side="Back" selectionid="${new_selectionid}" marketid="${new_selectionid}" runner="${runner}" marketname="${runner}" eventid="${eventId}" markettype="${markettype}" event_name="${markettype}" fullmarketodds="${b1}" fullfancymarketrate="${b1}"`;
                        var lay_data =
                            `side="Lay" selectionid="${new_selectionid}" marketid="${new_selectionid}" runner="${runner}" marketname="${runner}" eventid="${eventId}" markettype="${markettype}" event_name="${markettype}" fullmarketodds="${l1}" fullfancymarketrate="${l1}"`;
                        if (selectionid == "1") {
                            markets_all_race = `<div
                                                        class="casino-odds-box back back-1 market_${new_selectionid}_row  market_${new_selectionid}_b_btn ${statuss}" ${back_data}>
                                                        <span class="casino-odds">${b1}</span>
                                                    </div>
                                                    <div class="casino-odds-box lay lay-1 market_${new_selectionid}_row  market_${new_selectionid}_l_btn ${statuss}" ${lay_data}>
                                                        <span class="casino-odds">${l1}</span>
                                                    </div><div class="casino-nation-book text-center w-100 market_${new_selectionid}_b_exposure market_exposure ${ex_color}">${exposure}</div>`;
                        } else if (selectionid == "12") {
                            markets_all_only_zero = `<div
                                                        class="casino-odds-box back back-1 market_${new_selectionid}_row  market_${new_selectionid}_b_btn ${statuss}" ${back_data}>
                                                        <span class="casino-odds">${b1}</span>
                                                    </div>
                                                    <div
                                                        class="casino-odds-box lay lay-1 market_${new_selectionid}_row  market_1_${new_selectionid}_btn ${statuss}" ${lay_data}>
                                                        <span class="casino-odds">${l1}</span>
                                                    </div>
                                                    <div class="casino-nation-book text-center w-100 market_${new_selectionid}_b_exposure market_exposure ${ex_color}">${exposure}</div>`;
                        } else {
                            markets_all_other += `<div class="casino-odd-box-container">
                                                    <div class="casino-nation-name">${runner}</div>
                                                    <div class="casino-odds-box back back-1 market_${new_selectionid}_row  market_${new_selectionid}_b_btn ${statuss}" ${back_data}><span
                                                            class="casino-odds">${b1}</span></div>
                                                    <div class="casino-odds-box lay lay-1 market_${new_selectionid}_row  market_1_${new_selectionid}_btn ${statuss}" ${lay_data}><span
                                                            class="casino-odds">${l1}</span></div>
                                                    <div class="casino-nation-book text-center w-100 market_${new_selectionid}_b_exposure market_exposure ${ex_color}">${exposure}</div>
                                                </div>`;
                        }
                    }
                }
                $(".markets_all").html(`<div class="casino-odd-box-container">
                                                    <div class="casino-nation-name">Race to 17</div>
                                                    ${markets_all_race}
                                                    
                                                </div>
                                                ${markets_all_other}
                                                <div class="casino-odd-box-container">
                                                    <div class="casino-nation-name">Any Zero</div>
                                                    ${markets_all_only_zero}
                                                    
                                                </div>`);
            }
        });
        socket.on('gameResult', function(args) {
            if (args.data) {
                updateResult(args.data);
            } else {
                updateResult(args['res']);
            }
        });
        socket.on('error', function(data) {});
        socket.on('close', function(data) {});
    }

    function clearCards() {
        refresh(markettype);
        $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c4").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c5").attr("src", site_url + "storage/front/img/cards/1.png");
    }

    function updateResult(data) {
      
        if (data && data[0]) {
            data = JSON.parse(JSON.stringify(data));
            resultGameLast = data[0].mid;

            if (last_result_id != resultGameLast) {
                last_result_id = resultGameLast;
                refresh(markettype);
            }

            var html = "";
            var ab = "";
            var ab1 = "";
            casino_type = "'race17'";
            data.forEach((runData) => {

                eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] :
                    runData.mid;
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type +
                    ')"  class="ball-runs last-result ml-1 ' + (parseInt(runData.win) == 1 ? 'playerb' :
                        'playera') + '">' + (parseInt(runData.win) == 1 ? 'Y' : 'N') + '</span>';
            });
            $("#last-result").html(html);
            if (oldGameId == 0 || oldGameId == resultGameLast) {
                $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c4").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c5").attr("src", site_url + "storage/front/img/cards/1.png");
            }
        }
    }

    function teenpatti(type) {
        gameType = type
        websocket();
    }
    teenpatti("ok");

    jQuery(document).on("input", "#inputStake", function() {
        var stake = $("#inputStake").val();
        eventId = $("#fullMarketBetsWrap").attr("eventid");
        $("#inputStake").val(stake);
        odds = parseFloat($("#odds_val").val());
        inputStake = $("#inputStake").val();
        bet_stake_side = $("#bet_stake_side").val();
        bet_markettype = $("#bet_markettype").val();
        if (bet_markettype != "FANCY_ODDS") {
            if (bet_stake_side == "Lay") {
                profit = parseInt(inputStake);
            } else {
                profit = (odds - 1) * inputStake;
            }
        }
        $("#profitLiability").text(profit.toFixed(2));
    });
    jQuery(document).on("click", ".label_stake", function() {
        // stake = $(this).attr("stake");
        // eventId = $("#fullMarketBetsWrap").attr("eventid");
        // $("#inputStake").val(stake);
        
  eventId = $("#fullMarketBetsWrap").attr("eventid");
   var currentStake = parseFloat($("#inputStake").val()) || 0;
		var buttonStake = parseFloat($(this).attr("stake")) || 0;
		var totalStake = currentStake + buttonStake;

	$("#inputStake").val(totalStake);

        odds = parseFloat($("#odds_val").val());
        inputStake = $("#inputStake").val();
        bet_stake_side = $("#bet_stake_side").val();
        bet_markettype = $("#bet_markettype").val();
        if (bet_markettype != "FANCY_ODDS") {
            if (bet_stake_side == "Lay") {
                profit = (odds - 1) * inputStake;
            } else {
                profit = (odds - 1) * inputStake;
            }
        }
        $("#profitLiability").text(profit.toFixed(2));
    });
    jQuery(document).on("click", ".close-bet-slip", function() {
        $('.bet-slip-data').remove();
        $(".back-1").removeClass("select");
        $(".lay-1").removeClass("select");
    });
    jQuery(document).on("click", "#placeBet", function() {
        $("#placeBet").html('<i class="fa fa-spinner  fa-spin"></i> Submit');
        $("#placeBet").addClass('disabled');
        $(".placeBetLoader").addClass('show');
        var last_place_bet = "";
        bet_stake_side = $("#bet_stake_side").val();
        bet_type = bet_stake_side;
        bet_event_id = $("#bet_event_id").val();
        bet_marketId = $("#bet_marketId").val();
        oddsmarketId = bet_marketId;
        eventType = 'RACE17';
        bet_event_name = $("#bet_event_name").val();
        inputStake = $("#inputStake").val();
        market_runner_name = $("#market_runner_name").val();
        market_odd_name = $("#market_odd_name").val();
        var runsNo;
        var oddsNo;
        bet_market_name = $("#bet_market_name").val();
        eventManualType = 'Auto';
        if (bet_stake_side == "Lay") {
            type = "No";
            class_type = "no";
            unmatched_side_type = false;
        } else {
            type = "Yes";
            class_type = "yes";
            unmatched_side_type = true;
        }
        bet_markettype = $("#bet_markettype").val();
        if (bet_markettype != "FANCY_ODDS") {
            bet_market_type = bet_markettype;
            runsNo = parseFloat($("#odds_val").val());
            oddsNo = parseFloat($("#odds_val").val());
            if (bet_stake_side == "Lay") {
                return_stake = (oddsNo - 1) * inputStake;
                return_stake = parseInt(return_stake);
            } else {
                return_stake = (oddsNo - 1) * inputStake;
                return_stake = parseInt(return_stake);
            }
            bet_seconds = 1;
            bet_sec = 1000;
        }

        $(".placeBet").addClass("disable");
        /* $("#inputStake").val(""); */
        $(".back-1").removeClass("select");
        $(".lay-1").removeClass("select");
        $("#loadingMsg").show();
        $('.header_Back_' + bet_event_id).remove();
        $('.header_Lay_' + bet_event_id).remove();
        $('#betSlipFullBtn').hide();
        $('#backSlipHeader').hide();
        $('#laySlipHeader').hide();
        $(".back-1").removeClass("select");
        $(".lay-1").removeClass("select");
        $("#placeBets").addClass('disable');
        $("#bet-error-class").removeClass("b-toast-danger");
        $("#bet-error-class").removeClass("b-toast-success");
        setTimeout(function() {
            $.ajax({
                type: 'POST',
                url: 'ajaxfiles/bet_place_race17.php',
                dataType: 'json',
                data: {
                    eventId: bet_event_id,
                    eventType: eventType,
                    marketId: bet_marketId,
                    stack: inputStake,
                    type: type,
                    odds: oddsNo,
                    runs: runsNo,
                    bet_market_type: bet_market_type,
                    oddsmarketId: oddsmarketId,
                    eventManualType: eventManualType,
                    market_runner_name: market_runner_name,
                    market_odd_name: market_odd_name,
                    bet_event_name: bet_event_name,
                    bet_type: bet_type
                },
                success: function(response) {
                    $(".placeBetLoader").removeClass('show');
                    var check_status = response['status'];
                    var message = response['message'];
                    if (check_status == 'ok') {
                        if (bet_markettype != "FANCY_ODDS") {
                            oddsNo = runsNo;
                        } else {
                            oddsNo = oddsNo;
                        }
                        auth_key = 1;
                        /* $("#bet-error-class").addClass("b-toast-success"); */
                        toastr.clear()
                        toastr.success("", message, {
                            "timeOut": "3000",
                            "iconClass": "toast-success",
                            "positionClass": "toast-top-center",
                            "extendedTImeout": "0"
                        });
                    } else {
                        /* $("#bet-error-class").addClass("b-toast-danger"); */
                        toastr.clear()
                        toastr.warning("", message, {
                            "timeOut": "3000",
                            "iconClass": "toast-warning",
                            "positionClass": "toast-top-center",
                            "extendedTImeout": "0"
                        });
                    }
                    /* error_message_text = message;
                    $("#errorMsgText").text(error_message_text);
                    $("#errorMsg").fadeIn('fast').delay(3000).hide(0); */
                    $(".close-bet-slip").click();
                    refresh(markettype);
                }
            });
        }, bet_sec - 2000);
    });

    function getType(data) {
        var data1 = data;
        if (data) {
            data = data.split('DD');
            if (data.length > 1) {
                var obj = {
                    type: '[',
                    color: 'red',
                    ctype: 'diamond',
                    card: data[0],
                    rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 0 : data[0] == 'Q' ? 0 : data[0] == 'J' ?
                        0 : data[0] == '10' ?
                        0 : parseInt(data[0])
                }
                return obj;
            } else {
                data = data1;
                data = data.split('HH');
                if (data.length > 1) {
                    var obj = {
                        type: '{',
                        color: 'red',
                        ctype: 'heart',
                        card: data[0],
                        rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 0 : data[0] == 'Q' ? 0 : data[0] == 'J' ?
                            0 : data[0] == '10' ?
                            0 : parseInt(data[0])
                    }
                    return obj;
                } else {
                    data = data1;
                    data = data.split('SS');
                    if (data.length > 1) {
                        var obj = {
                            type: ']',
                            color: 'black',
                            ctype: 'spade',
                            card: data[0],
                            rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 0 : data[0] == 'Q' ? 0 : data[0] == 'J' ?
                                0 : data[0] == '10' ?
                                0 : parseInt(data[0])
                        }
                        return obj;
                    } else {
                        data = data1;
                        data = data.split('CC');
                        if (data.length > 1) {
                            var obj = {
                                type: '}',
                                color: 'black',
                                ctype: 'club',
                                card: data[0],
                                rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 0 : data[0] == 'Q' ? 0 : data[0] == 'J' ?
                                    0 : data[0] == '10' ?
                                    0 : parseInt(data[0])
                            }
                            return obj;
                        } else {
                            return 0;
                        }
                    }
                }
            }
        }
        return 0;
    }
</script>
<?php

include("footer-js.php");
include("footer-result-popup.php");
?>

<div id="errorMsg" class="b-toaster b-toaster-top-center" style="display:none;">
    <div class="b-toaster-slot vue-portal-target">
        <div role="alert" aria-live="assertive" aria-atomic="true" id="bet-error-class"
            class="b-toast b-toast-solid b-toast-prepend b-toast-danger">
            <div tabindex="0" class="toast">
                <header class="toast-header"><strong class="mr-2" id="errorMsgText"></strong>
                    <button type="button" aria-label="Close" class="close ml-auto mb-1">&times;</button>
                </header>
                <div class="toast-body"> </div>
            </div>
        </div>
    </div>

    </body>



</html>