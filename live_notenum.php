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
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: flex-start;
    }

    .casino-odd-box-container-box {
        width: calc(33.33% - 8px);
        /* margin-right: 10px; */
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .casino-odd-box-container {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .casino-nation-name {
        font-size: 16px;
        font-weight: bold;
    }

    .casino-nation-name {
        width: 100%;
        text-align: center;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin-bottom: 5px;
    }

    .casino-nation-name img {
        height: 30px;
        margin-right: 5px;
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
        text-align: center;
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

    .casino-table-left-box,
    .casino-table-center-box,
    .casino-table-right-box {
        width: 49%;
        border-left: 1px solid #c7c8ca;
        border-right: 1px solid #c7c8ca;
        border-top: 1px solid #c7c8ca;
        background-color: #f2f2f2;
    }

    .casino-table-left-box {
        width: 33%;
        padding: 5px 5px 0 5px;
        border-bottom: 1px solid #c7c8ca;
    }

    .casino-table-left-box .casino-odd-box-container {
        width: 100%;
    }

    .casino-table-left-box .casino-odds-box {
        width: 100%;
    }

    .casino-table-right-box {
        width: 66%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: flex-start;
        padding: 5px 5px 0 5px;
        border-bottom: 1px solid #c7c8ca;
    }

    .casino-table-header,
    .casino-table-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        border-bottom: 1px solid #c7c8ca;
    }

    .teenpatti2 .casino-nation-detail {
        width: 60%;
    }

    .casino-table-header .casino-nation-detail {
        font-weight: bold;
        min-height: unset;
    }

    .casino-nation-detail {
        display: flex;
        align-items: flex-start;
        flex-direction: column;
        flex-wrap: wrap;
        justify-content: center;
        padding-left: 5px;
        min-height: 46px;
    }

    .teenpatti2 .casino-odds-box {
        width: 20%;
    }

    .casino-table-header .casino-odds-box {
        cursor: unset;
        padding: 2px;
        min-height: unset;
        height: auto !important;
    }

    .casino-odds {
        font-size: 18px;
        font-weight: bold;
        line-height: 1;
    }

    .under-over-row .uo-box {
        display: flex;
        flex-wrap: wrap;
        width: 48%;
        margin-top: 10px;
        border: 1px solid #c7c8ca;
    }

    .teenpatti2 .under-over-row .uo-box .casino-nation-detail {
        width: 70%;
    }

    .teenpatti2 .under-over-row .uo-box .casino-odds-box {
        width: 30%;
    }

    .teenpatti2 .teen2other {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        border: 0;
    }

    .casino-table-full-box {
        /* width: 100%;
    border-left: 1px solid var(--table-border);
    border-right: 1px solid var(--table-border);
    border-top: 1px solid var(--table-border);
    background-color: var(--bg-table-row); */
    }

    .teenpatti2 .teen2other .casino-odds-box {
        width: 16%;
        flex-direction: row;
        justify-content: space-between;
        padding: 5px 10px;
    }

    .bltitle img {
        height: 35px;
    }

    .teen2cards {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        border: 0;
        padding: 10px 10px 0 10px;
    }

    .card-odd-box {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        flex-direction: column;
        align-items: center;
        margin-bottom: 10px;
        margin-right: 10px;
        cursor: pointer;
    }

    .card-odd-box .casino-odds {
        margin-bottom: 5px;
        font-size: 14px;
    }

    .card-odd-box img {
        height: 60px;
    }

    @media only screen and (min-width: 1200px) and (max-width: 1399px) {
        .card-odd-box img {
            height: 45px;
        }
    }

    @media only screen and (max-width: 767px) {
        .casino-table-box {
            padding: 5px;
        }

        .casino-table-left-box,
        .casino-table-right-box {
            width: 100%;
            padding: 0 5px;
        }

        .teenpatti2 .teen2other .casino-odds-box {
            width: 49%;
            margin-bottom: 10px;
        }

        .teenpatti2 .casino-table-right-box {
            margin-top: 10px;
        }

        .card-odd-box img {
            height: 45px;
        }
    }

    .casino-table-box-divider {
        background-color: var(--table-border);
        width: 2px;
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
        z-index: 100;
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
        height: 41px;
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
                                        <div class="game-heading"><span class="card-header-title">Note Number
                                                <!-- <small role="button" class="teenpatti-rules"  onclick="view_rules('tp-rules.jpg')" data-target="#rules_popup" data-toggle="modal"  tabindex="0"><u>Rules</u></small> --> <!----></span>
                                            <small role="button" class="teenpatti-rules" onclick="view_rules('notenum')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small>
                                            <span class="float-right">
                                                Round ID:
                                                <span class="round_no">0</span><!--   | Min: <span>100</span> | Max: <span>500000</span> --></span>
                                        </div>
                                        <!---->
                                        <div class="video-container">
                                            <?php
                                            if (!empty(IFRAME_URL_SET)) {
                                            ?>
                                                <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . NOTENUM_CODE; ?>" width="100%" height="200px" style="border: 0px;"></iframe>
                                            <?php

                                            } else {
                                            ?>
                                                <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                            <?php

                                            }
                                            ?>
                                            <!---->
                                            <!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL;
                                                                                    echo NOTENUM_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
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
                                                        <div class="d-flex flex-column mt-1">
                                                            <img id="card_c1" src="storage/front/img/cards/1.png">
                                                            <img id="card_c2" src="storage/front/img/cards/1.png">
                                                            <img id="card_c3" src="storage/front/img/cards/1.png">
                                                            <img id="card_c4" src="storage/front/img/cards/1.png">
                                                            <img id="card_c5" src="storage/front/img/cards/1.png">
                                                            <img id="card_c6" src="storage/front/img/cards/1.png">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="casino-table markets_all">

                                        </div>

                                        <div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=notenum">View All</a></span></div>
                                        <div class="casino-last-results" id="last-result"></div>
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
    var markettype = "NOTENUM";
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
            socket.emit('Room', 'notenum');
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
                    }
                    if (data.t1[0].C2 != 1) {
                        $("#card_c2").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C2 +
                            ".png");
                    }
                    if (data.t1[0].C3 != 1) {
                        $("#card_c3").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C3 +
                            ".png");

                    }
                    if (data.t1[0].C4 != 1) {
                        $("#card_c4").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C4 +
                            ".png");

                    }
                    if (data.t1[0].C5 != 1) {
                        $("#card_c5").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C5 +
                            ".png");
                    }
                    if (data.t1[0].C6 != 1) {
                        $("#card_c6").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C6 +
                            ".png");
                    }
                }
                clock.setValue(data.t1[0].autotime);
                $(".round_no").text(data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid);
                $("#casino_event_id").val(data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid);
                eventId = data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid;
                var markets_odd_even = "";
                var markets_colors = "";
                var markets_low_high = "";
                var markets_baccarat = "";
                var markets_cards = "";
                for (var j in data.t2) {
                    selectionid = data.t2[j].sectionId || data.t2[j].sid;
                    new_selectionid = selectionid;
                    runner = data.t2[j].nation || data.t2[j].nat;
                    b1 = data.t2[j].b1;
                    bs1 = data.t2[j].bs1;
                    l1 = data.t2[j].l1;
                    ls1 = data.t2[j].ls1;
                    visible = data.t2[j].visible;
                    subtype = data.t2[j].subtype;
                    if (visible == "1") {
                        /* back_html = '<span class="odds d-block"><b>' + b1 + '</b></span> <span style="color: black;">' + bs1 + '</span>';
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

                        lay_html = '<span class="odds d-block"><b>' + l1 + '</b></span> <span style="color: black;">' + ls1 + '</span>';
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
                        if (subtype == "odd" || subtype == "even") {
                            markets_odd_even += `<div class="casino-odd-box-container">
                                                        <div class="casino-nation-name align-items-center">
                                                            <span class="me-2">${runner}</span>`;
                            if (subtype == "odd") {
                                markets_odd_even += `<img src="../storage/front/img/cards/A.jpg">
                                                            <img src="storage/front/img/cards/3.jpg">
                                                            <img src="storage/front/img/cards/5.jpg">
                                                            <img src="storage/front/img/cards/7.jpg">
                                                            <img src="storage/front/img/cards/9.jpg">`;
                            }
                            if (subtype == "even") {
                                markets_odd_even += `<img src="../storage/front/img/cards/2.jpg">
                                                            <img src="storage/front/img/cards/4.jpg">
                                                            <img src="storage/front/img/cards/6.jpg">
                                                            <img src="storage/front/img/cards/8.jpg">
                                                            <img src="storage/front/img/cards/10.jpg">`;
                            }
                            markets_odd_even += `</div>
                                                        <div class="casino-odds-box back back-1 market_${new_selectionid}_row  market_${new_selectionid}_b_btn ${statuss}" ${back_data}>
                                                            <span class="casino-odds">${b1}</span>
                                                        </div>
                                                        <div class="casino-odds-box lay lay-1 market_${new_selectionid}_row  market_${new_selectionid}_l_btn ${statuss}" ${lay_data}>
                                                            <span class="casino-odds">${l1}</span>
                                                        </div>
                                                         <div class="casino-nation-book text-center w-100 market_${new_selectionid}_b_exposure market_exposure ${ex_color}">${exposure}</div>
                                                    </div>`;
                        }
                        if (subtype == "black" || subtype == "red") {
                            markets_colors += `<div class="casino-odd-box-container">`;
                            if (subtype == "black") {
                                markets_colors += `<div class="casino-nation-name">
                                                            <img src="storage/front/img/cards/spade.png">
                                                            <img src="storage/front/img/cards/club.png">
                                                        </div>`;
                            }
                            if (subtype == "red") {
                                markets_colors += `<div class="casino-nation-name">
                                                            <img src="storage/front/img/cards/heart.png">
                                                            <img src="storage/front/img/cards/diamond.png">
                                                        </div>`;
                            }
                            markets_colors += `<div class="casino-odds-box back back-1 market_${new_selectionid}_row  market_${new_selectionid}_b_btn ${statuss}" ${back_data}>
                                                            <span class="casino-odds">${b1}</span>
                                                        </div>
                                                        <div class="casino-odds-box lay lay-1 market_${new_selectionid}_row  market_${new_selectionid}_l_btn ${statuss}" ${lay_data}>
                                                            <span class="casino-odds">${l1}</span>
                                                        </div>
                                                         <div class="casino-nation-book text-center w-100 market_${new_selectionid}_b_exposure market_exposure ${ex_color}">${exposure}</div>
                                                    </div>`;
                        }
                        if (subtype == "high" || subtype == "low") {
                            markets_low_high += `<div class="casino-odd-box-container">
                                                        <div class="casino-nation-name align-items-center">
                                                            <span class="me-2">${runner}</span>`;
                            if (subtype == "low") {
                                markets_low_high += `<img src="../storage/front/img/cards/A.jpg">
                                                            <img src="storage/front/img/cards/2.jpg">
                                                            <img src="storage/front/img/cards/3.jpg">
                                                            <img src="storage/front/img/cards/4.jpg">
                                                            <img src="storage/front/img/cards/5.jpg">`;
                            }
                            if (subtype == "high") {
                                markets_low_high += `<img src="../storage/front/img/cards/6.jpg">
                                                            <img src="storage/front/img/cards/7.jpg">
                                                            <img src="storage/front/img/cards/8.jpg">
                                                            <img src="storage/front/img/cards/9.jpg">
                                                            <img src="storage/front/img/cards/10.jpg">`;
                            }
                            markets_low_high += `</div>
                                                        <div class="casino-odds-box back back-1 market_${new_selectionid}_row  market_${new_selectionid}_b_btn ${statuss}" ${back_data}>
                                                            <span class="casino-odds">${b1}</span>
                                                        </div>
                                                        <div class="casino-odds-box lay lay-1 market_${new_selectionid}_row  market_${new_selectionid}_l_btn ${statuss}" ${lay_data}>
                                                            <span class="casino-odds">${l1}</span>
                                                        </div>
                                                         <div class="casino-nation-book text-center w-100 market_${new_selectionid}_b_exposure market_exposure ${ex_color}">${exposure}</div>
                                                    </div>`;
                        }
                        if (subtype == "bacc") {
                            markets_baccarat += `<div class="casino-odd-box-container">
                                                        <div class="casino-nation-name"><b>${runner}</b>`;
                            if (runner == "Baccarat 1") {
                                markets_baccarat += `<span class="">(1st, 2nd, 3rd card)</span>`;
                            }
                            if (runner == "Baccarat 2") {
                                markets_baccarat += `<span class="">(4th, 5th, 6th card)</span>`;
                            }
                            markets_baccarat += ` </div>
                                                        <div class="casino-odds-box back back-1 market_${new_selectionid}_row  market_${new_selectionid}_b_btn ${statuss}" ${back_data}>
                                                            <span class="casino-odds">${b1}</span>
                                                        </div>
                                                         <div class="casino-nation-book text-center w-100 market_${new_selectionid}_b_exposure market_exposure ${ex_color}">${exposure}</div>
                                                    </div>`;
                        }
                        if (data.t2[j].odds && subtype == "card") {
                            for (var k in data.t2[j].odds) {
                                odd_selectionid = new_selectionid + "_" + data.t2[j].odds[k].ssid;
                                odd_runner = runner + " - " + data.t2[j].odds[k].nat;
                                odd_b1 = data.t2[j].odds[k].b;
                                sno = data.t2[j].odds[k].sno;
                                if (sno == "1") {
                                    sno = "A";
                                }
                                var back_data =
                                    `side="Back" selectionid="${odd_selectionid}" marketid="${odd_selectionid}" runner="${odd_runner}" marketname="${odd_runner}" eventid="${eventId}" markettype="${markettype}" event_name="${markettype}" fullmarketodds="${odd_b1}" fullfancymarketrate="${odd_b1}"`;

                                markets_cards += `<div class="card-odd-box">
                                                        <div class="casino-odds">${odd_b1}</div>
                                                        <div class=" back-1 market_${odd_selectionid}_row  market_${odd_selectionid}_b_btn ${statuss}" ${back_data}><img src="storage/front/img/cards/${sno}.png"></div>
                                                        <div class="casino-nation-book text-center w-100 market_${new_selectionid}_b_exposure market_exposure ${ex_color}">${exposure}</div>
                                                    </div>`;
                            }
                        }
                    }
                }
                $(".markets_all").html(`<div class="casino-table-box px-1">
                                                <div class="casino-odd-box-container-box">
                                                ${markets_odd_even}
                                                </div>
                                                <div class="casino-odd-box-container-box">
                                                    ${markets_colors}
                                                </div>
                                                <div class="casino-odd-box-container-box ">
                                                    ${markets_low_high}
                                                </div>
                                            </div>
                                            <div class="casino-table-box mt-1">
                                                <div class="casino-table-left-box ">
                                                    ${markets_baccarat}
                                                </div>
                                                <div class="casino-table-right-box ">
                                                    ${markets_cards}
                                                </div>
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
        $("#card_c6").attr("src", site_url + "storage/front/img/cards/1.png");
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
            casino_type = "'notenum'";
            data.forEach((runData) => {

                ab = "result-b";
                ab1 = "R";


                eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] : runData.mid;
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs  ' + ab + ' result">' + ab1 + '</span>';
            });
            $("#last-result").html(html);
            if (oldGameId == 0 || oldGameId == resultGameLast) {
                $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c4").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c5").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c6").attr("src", site_url + "storage/front/img/cards/1.png");
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
        eventType = 'NOTENUM';
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
                url: 'ajaxfiles/bet_place_notenum.php',
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
</script>
<?php

include("footer-js.php");
include("footer-result-popup.php");
?>

<div id="errorMsg" class="b-toaster b-toaster-top-center" style="display:none;">
    <div class="b-toaster-slot vue-portal-target">
        <div role="alert" aria-live="assertive" aria-atomic="true" id="bet-error-class" class="b-toast b-toast-solid b-toast-prepend b-toast-danger">
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