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
    .teenpatti-1day .suspended:after {
        width: 100% !important;
    }

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

    .casino-table-left-box,
    .casino-table-center-box,
    .casino-table-right-box {
        width: 50%;
        border-left: 1px solid #c7c8ca;
        border-right: 1px solid #c7c8ca;
        border-top: 1px solid #c7c8ca;
        background-color: #f2f2f2;
    }

    .casino-table-header,
    .casino-table-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        border-bottom: 1px solid #c7c8ca;
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

    .casino-table-header .casino-nation-detail {
        font-weight: bold;
        min-height: unset;
    }

    .casino-nation-detail {
        width: 60%;
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

    .casino-table-header .casino-odds-box {
        cursor: unset;
        padding: 2px;
        min-height: unset;
        height: 28px !important;
    }

    .casino-odds-box {
        width: 20%;
    }

    .casino-table-header,
    .casino-table-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        border-bottom: 1px solid #c7c8ca;
    }

    .casino-nation-name {
        font-size: 16px;
        font-weight: bold;
    }

    .casino-odds {
        font-size: 18px;
        font-weight: bold;
        line-height: 1;
    }

    .casino-table-box-divider {
        background-color: #c7c8ca;
        width: 2px;
    }

    .back {
        background-color: #72bbef !important;
    }

    .lay {
        background-color: #faa9ba !important;
    }

    .under-over-row .uo-box {
        display: flex;
        flex-wrap: wrap;
        width: 48%;
        margin-top: 10px;
        border: 1px solid #c7c8ca;
    }

    .under-over-row .uo-box .casino-nation-detail {
        width: 70%;
    }

    .card-devider {
        position: absolute;
        width: 2px;
        height: 100%;
        padding: 0;
        background: #fff;
        margin-right: 15px;
    }

    .under-over-row .uo-box .casino-odds-box {
        width: 30%;
    }

    .casino-volume {
        font-size: 12px;
        font-weight: 100;
        line-height: 1;
        margin-top: 5px;
    }

    .casino-nation-book {
        font-size: 12px;
        font-weight: bold;
        min-height: 18px;
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

    marquee {
        position: unset !important;
        width: 100% !important;
    }
    .three-card-total{
            justify-content: center;
    margin-top: 5px;
    }
 .mini-baccarat .casino-odds-box{
    width: 40% !important;
    }
    .mogambo-total {
    background-color: #ffe300c7;
    padding: 4px;
    color: #000;
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
                                        <div class="game-heading"><span class="card-header-title">Mogambo
                                                <!-- <small role="button" class="teenpatti-rules"  onclick="view_rules('tp-rules.jpg')" data-target="#rules_popup" data-toggle="modal"  tabindex="0"><u>Rules</u></small> --> <!----></span>
                                            <small role="button" class="teenpatti-rules" onclick="view_rules('mogambo')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small>
                                            <span class="float-right">
                                                Round ID:
                                                <span class="round_no">0</span><!--   | Min: <span>100</span> | Max: <span>500000</span> --></span>
                                        </div>
                                        <!---->
                                        <div class="video-container">
                                            <!---->
                                            <?php
                                            if (!empty(IFRAME_URL_SET)) {
                                            ?>
                                                <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . TEENJOKER_CODE; ?>" width="100%" height="200px" style="border: 0px;"></iframe>
                                            <?php

                                            } else {
                                            ?>
                                                <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                            <?php

                                            }
                                            ?>
                                            <!-- <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                          <iframe class="iframedesign" src="<?php echo IFRAME_URL;
                                                                            echo MOGAMBO_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
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
                                                    <h5 class="mogambo-total">Total: <span class="tot_count">0</span></h5>
                                                    <div>
                                                        <h3 class="text-white">DAGA / TEJA</h3>
                                                        <div>
                                                            <img id="card_c1" src="storage/front/img/cards/1.png">
                                                            <img id="card_c2" src="storage/front/img/cards/1.png">
                                                            <!-- <img id="card_c3" src="storage/front/img/cards/1.png"> -->
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <h3 class="text-white">MOGAMBO</h3>
                                                        <div>
                                                            <img id="card_c3" src="storage/front/img/cards/1.png">
                                                            <!-- <img id="card_c4" src="storage/front/img/cards/1.png"> -->
                                                            <!-- <img id="card_c5" src="storage/front/img/cards/1.png">
                                                            <img id="card_c6" src="storage/front/img/cards/1.png"> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="casino-detail">
                                            <div class="casino-table">
                                                <div class="casino-table-box">
                                                    <div class="casino-table-left-box">

                                                        <div class="casino-table-body">
                                                            <div class="casino-table-row mini-baccarat">
                                                                <div class="casino-nation-detail">
                                                                    <div class="casino-nation-name">Daga / Teja</div>
                                                                    <div class="casino-nation-book text-center market_2_b_exposure market_exposure"></div>
                                                                </div>
                                                                <div class="casino-odds-box back back-1 market_2_b_btn suspended-box"><span class="casino-odds market_2_b_val">0</span></div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="casino-table-box-divider"></div> -->
                                                    <div class="casino-table-right-box">

                                                        <div class="casino-table-body">
                                                            <div class="casino-table-row mini-baccarat">
                                                                <div class="casino-nation-detail">
                                                                    <div class="casino-nation-name">Mogambo</div>
                                                                    <div class="casino-nation-book text-center market_1_b_exposure market_exposure"></div>
                                                                </div>
                                                                <div class="casino-odds-box back back-1 market_1_b_btn suspended-box"><span class="casino-odds market_1_b_val">1.9</span></div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="casino-table-box three-card-total">
                                                    <div class="casino-table-left-box">
                                                        <div class="casino-table-body">
                                                            <div class="casino-table-row">
                                                                <div class="casino-nation-detail">
                                                                    <div class="casino-nation-name">3 Card Total</div>
                                                                    <div class="casino-nation-book text-center market_3_b_exposure market_exposure"></div>
                                                                </div>
                                                                <div class="casino-odds-box lay lay-1 market_3_l_btn suspended-box"><span class="casino-odds market_3_l_val">30</span><span class="casino-volume market_3_l_volume">120</span></div>
                                                                <div class="casino-odds-box back back-1 market_3_b_btn suspended-box"><span class="casino-odds market_3_b_val">30</span><span class="casino-volume market_3_b_volume">100</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="mt-1 casino-remark-div">
                                                 <marquee style="color: #097c93;">Play Our New Game Premium Teenpatti 1 Day</marquee>
                                                 </div> -->

                                            <div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=mogambo">View All</a></span></div>
                                            <div class="casino-last-results" id="last-result">
                                                <!-- <span class="result result-b">B</span><span class="result result-a">A</span><span class="result result-b">B</span><span class="result result-b">B</span><span class="result result-b">B</span><span class="result result-a">A</span><span class="result result-a">A</span><span class="result result-b">B</span><span class="result result-a">A</span><span class="result result-a">A</span> -->
                                            </div>
                                        </div>
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
<script type="text/javascript" src='footer-js.js?3'></script>

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
    var markettype = "MOGAMBO";
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
            socket.emit('Room', 'mogambo');
        });
        socket.on('gameIframe', function(data) {
            $("#casinoIframe").attr('src', data);
        });
        socket.on('game', function(data) {
            data1 = data;
            if (data) {
                if (oldGameId != data1.t1[0].mid && data1.t1[0].mid != 0 && data1.t1[0].mid != "0") {
                    setTimeout(function() {
                        clearCards();
                    }, <?php echo CASINO_RESULT_TIMEOUT; ?>);
                }
                oldGameId = data1.t1[0].mid;
               
                if (data1.t1[0].mid != 0 && data1.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark")
                        .text(data.t1[0].remark);
                    
                     var tot_count = 0;
                    if (data.t1[0].C1 != 1) {
                        $("#card_c1").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C1 + ".png");
                        card_value = getType(data.t1[0].C1);
                        card_rank = card_value.rank;
                        tot_count += card_rank;
                    }
                    if (data.t1[0].C2 != 1) {
                        $("#card_c2").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C2 + ".png");
                        card_value = getType(data.t1[0].C2);
                        card_rank = card_value.rank;
                        tot_count += card_rank;
                    }
                    if (data.t1[0].C3 != 1) {
                        $("#card_c3").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C3 + ".png");
                        card_value = getType(data.t1[0].C3);
                        card_rank = card_value.rank;
                        tot_count += card_rank;
                    }
                     $(".tot_count").text(tot_count);
                }
                
                clock.setValue(data1.t1[0].autotime);
                $(".round_no").text(data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid);
                $("#casino_event_id").val(data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid);
                eventId = data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid;
                for (var j in data.t2) {
                    selectionid = data.t2[j].sectionId || data.t2[j].sid;
                    runner = data.t2[j].nation || data.t2[j].nat;
                    b1 = data.t2[j].b1;
                    bs1 = data.t2[j].bs1;
                    l1 = data.t2[j].l1;
                    ls1 = data.t2[j].ls1;
                    var ratesback=b1;
                    var rateslay=l1;
                    if(selectionid == "3"){
                        ratesback=bs1;
                        rateslay=ls1;
                    }
                    back_html = '<span class="casino-odds d-block"><b>' + b1 + '</b></span>';
                    $(".market_" + selectionid + "_b_btn").attr("side", "Back");
                    $(".market_" + selectionid + "_b_btn").attr("selectionid", selectionid);
                    $(".market_" + selectionid + "_b_btn").attr("marketid", selectionid);
                    $(".market_" + selectionid + "_b_btn").attr("runner", runner);
                    $(".market_" + selectionid + "_b_btn").attr("marketname", runner);
                    $(".market_" + selectionid + "_b_btn").attr("eventid", eventId);
                    $(".market_" + selectionid + "_b_btn").attr("markettype", markettype);
                    $(".market_" + selectionid + "_b_btn").attr("event_name", markettype);
                    $(".market_" + selectionid + "_b_btn").attr("fullmarketodds", b1);
                    $(".market_" + selectionid + "_b_btn").attr("fullfancymarketrate", ratesback);
                    $(".market_" + selectionid + "_b_val").html(b1);
					$(".market_" + selectionid + "_b_volume").html(bs1);

                    lay_html = '<span class="casino-odds d-block"><b>' + l1 + '</b></span>';
                    $(".market_" + selectionid + "_l_btn").attr("side", "Back");
                    $(".market_" + selectionid + "_l_btn").attr("selectionid", selectionid);
                    $(".market_" + selectionid + "_l_btn").attr("marketid", selectionid);
                    $(".market_" + selectionid + "_l_btn").attr("runner", runner);
                    $(".market_" + selectionid + "_l_btn").attr("marketname", runner);
                    $(".market_" + selectionid + "_l_btn").attr("eventid", eventId);
                    $(".market_" + selectionid + "_l_btn").attr("markettype", markettype);
                    $(".market_" + selectionid + "_l_btn").attr("event_name", markettype);
                    $(".market_" + selectionid + "_l_btn").attr("fullmarketodds", l1);
                    $(".market_" + selectionid + "_l_btn").attr("fullfancymarketrate", rateslay);
                    $(".market_" + selectionid + "_l_val").html(l1);
					$(".market_" + selectionid + "_l_volume").html(ls1);

                    gstatus = data.t2[j].gstatus.toString();
                    if (gstatus == "SUSPENDED" || gstatus == "0") {
                        $(".market_" + selectionid + "_l_btn").addClass("suspended-box");
                        $(".market_" + selectionid + "_b_btn").addClass("suspended-box");
                    } else {
                        $(".market_" + selectionid + "_l_btn").removeClass("suspended-box");
                        $(".market_" + selectionid + "_b_btn").removeClass("suspended-box");
                    }
                }
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
            casino_type = "'mogambo'";
            data.forEach((runData) => {

                eventId = runData.mid == 0 ? 0 : runData.mid;
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="result ml-1 ' + (parseInt(runData.win) == 1 ? 'result-b' : 'result-a') + '">' + (parseInt(runData.win) == 1 ? 'W' : 'L') + '</span>';
            });
            $("#last-result").html(html);
            if (oldGameId == 0 || oldGameId == resultGameLast) {
                $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
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
        stake = $(this).attr("stake");
        eventId = $("#fullMarketBetsWrap").attr("eventid");
        $("#inputStake").val(stake);
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
        eventType = 'MOGAMBO';
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
            runsNo = parseFloat($("#odds_val").val());
			oddsNo = parseFloat($("#fullfancymarketrate").val());
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
                url: 'ajaxfiles/bet_place_mogambo.php',
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
                        toastr.clear()
                        toastr.success("", message, {
                            "timeOut": "3000",
                            "iconClass": "toast-success",
                            "positionClass": "toast-top-center",
                            "extendedTImeout": "0"
                        });
                        /* $("#bet-error-class").addClass("b-toast-success"); */
                    } else {
                        toastr.clear()
                        toastr.warning("", message, {
                            "timeOut": "3000",
                            "iconClass": "toast-warning",
                            "positionClass": "toast-top-center",
                            "extendedTImeout": "0"
                        });
                        /* $("#bet-error-class").addClass("b-toast-danger"); */
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
<script>
    jQuery(document).on("click", ".back-1", function() {
        $(".hideplacebet").show();
        var fullmarketodds = $(this).attr("fullmarketodds");
        if (fullmarketodds != "") {
            side = $(this).attr("side");
            selectionid = $(this).attr("selectionid");
            market_odd_name = $(this).attr("markettype");
            runner = $(this).attr("runner");
            market_runner_name = runner;
            marketname = $(this).attr("marketname");
            markettype = $(this).attr("markettype");
            fullfancymarketrate = $(this).attr("fullfancymarketrate");
            /* fullmarketodds = (fullmarketodds / 100) + 1;
            fullfancymarketrate = (fullfancymarketrate / 100) + 1;
            fullfancymarketrate = fullfancymarketrate.toFixed(2);
            fullmarketodds = fullmarketodds.toFixed(2); */
            odds_change_value = "disabled";
            runs_lable = 'Runs';
            runs_lable = 'Odds';
            /* fullfancymarketrate = fullmarketodds; */
            eventId = $(this).attr("eventid");
            marketId = $(this).attr("marketid");
            event_name = $(this).attr("event_name");
            $(".select").removeClass("select");
            $(this).addClass("select");
            return_html = "";
            return_html +=
                "<div class='bet-slip-data'><div><div class='table-responsive back'><form><table class='coupon-table table table-borderedless'><thead><tr><th class='place-bet-for'>(Bet for)</th><th class='place-bet-odds'>Odds</th><th class='place-bet-stake'>Stake</th><th class='place-bet-profit'>Profit</th></tr></thead><tbody>";
            return_html +=
                "<tr><td class='text-center place-bet-for'><a href='javascript:void(0);' class='text-danger close-bet-slip'><i class='fa fa-times me-1'></i></a> <span>"+ runner +"</span></td><td class='bet-odds place-bet-odds'><div class='form-group'> <input placeholder='0' value='" +
                fullmarketodds +
                "' id='odds_val' type='text' required='required' maxlength='4' readonly='readonly' class='amountint' style='width: 45px; vertical-align: middle;'></div></td><td class='bet-stakes place-bet-stake'><div class='form-group bet-stake'><input type='hidden' id='bet_stake_side' value='Back'/><input type='hidden' id='bet_event_id' value='" +
                eventId + "'/><input type='hidden' id='bet_marketId' value='" + selectionid +
                "'/><input type='hidden' id='bet_event_name' value='" + event_name +
                "'/><input type='hidden' id='bet_market_name' value='" + marketname +
                "'/><input type='hidden' id='bet_markettype' value='" + markettype +
                "'/><input type='hidden' id='fullfancymarketrate' value='" + fullfancymarketrate +
                "'/> <input type='hidden' id='oddsmarketId' value='" + marketId +
                "'/><input type='hidden' id='market_runner_name' value='" + market_runner_name +
                "'/><input type='hidden' id='market_odd_name' value='" + market_odd_name +
                "'/> <input maxlength='10' name='inputStake' id='inputStake' required='required' type='number' ></div></td><td class='text-right bet-profit place-bet-profit' id='profitLiability'>0</td></tr>";
            return_html += "<tr><td colspan='5' class='value-buttons' style='padding: 5px;'>";
            <?php
                $get_button_value = $conn->query("select * from user_master where id=$user_id and (casino_button_value <> '' and casino_button_value IS NOT NULL)");
                $num_rows = $get_button_value->num_rows;
                $button_array = array();
                if ($num_rows <= 0) {
                    $button_array[] = 500;
                    $button_array[] = 1000;
                    $button_array[] = 2000;
                    $button_array[] = 3000;
                    $button_array[] = 4000;
                    $button_array[] = 5000;
                    $button_array[] = 10000;
                    $button_array[] = 20000;
                    $button_array[] = 20000;
                    $button_array[] = 20000;
                } else {
                    $fetch_button_value_data = mysqli_fetch_assoc($get_button_value);
                    $fetch_button_value = $fetch_button_value_data['casino_button_value'];
                    $default_stake = $fetch_button_value_data['default_stake'];
                    $one_bet_default_stake = $fetch_button_value_data['one_bet_default_stake'];
                    $button_array = explode(",", $fetch_button_value);
                }
                foreach ($button_array as $button_value) {
                ?>
            return_html +=
                " <button type='button' stake='<?php echo $button_value; ?>' class='btn btn-secondary m-l-5 m-b-5 label_stake btn-place-bet'> <?php echo $button_value; ?> </button>";
            <?php
                }
                ?>
            return_html += "<div class='btn btn-sm btn-link text-dark flex-fill text-end place-bet-clear-btn'>clear</div>";
            return_html +=
                "</td></tr></tbody></table><div class='col-md-12 place-bet-action-buttons'><div> <button type='button' class='btn btn-sm btn-info float-left btn-edit' data-target='#set_btn_value' data-toggle='modal'> Edit </button> </div>"; 
            return_html +=    
                "<div><button type='button' class='btn btn-sm btn-danger close-bet-slip'> Reset </button> <button type='button' class='btn btn-sm btn-success float-right m-b-5 placeBet' id='placeBet'> Submit </button></div></div></form></div></div></div>";
            $(".bet_slip_details").html(return_html);
        }
    });

    jQuery(document).on("click", ".lay-1", function() {
        $(".hideplacebet").show();
        var fullmarketodds = $(this).attr("fullmarketodds");
        if (fullmarketodds != "") {
            side = $(this).attr("side");
            selectionid = $(this).attr("selectionid");
            market_odd_name = $(this).attr("markettype");
            runner = $(this).attr("runner");
            market_runner_name = runner;
            marketname = $(this).attr("marketname");
            markettype = $(this).attr("markettype"); 
            fullfancymarketrate = $(this).attr("fullfancymarketrate");
            /* fullfancymarketrate = (fullfancymarketrate / 100) + 1;
            fullmarketodds = (fullmarketodds / 100) + 1;
            fullfancymarketrate = fullfancymarketrate.toFixed(2);
            fullmarketodds = fullmarketodds.toFixed(2); */
            odds_change_value = "disabled";
            runs_lable = 'Runs';
            runs_lable = 'Odds';
           /*  fullfancymarketrate = fullmarketodds; */
            eventId = $(this).attr("eventid");
            marketId = $(this).attr("marketid");
            event_name = $(this).attr("event_name");
            $(".select").removeClass("select");
            $(this).addClass("select");
            return_html = "";
            return_html +=
                "<div class='bet-slip-data'><div><div class='table-responsive lay'><form><table class='coupon-table table table-borderedless'><thead><tr><th class='place-bet-for'>(Bet for)</th><th class='place-bet-odds'>Odds</th><th class='place-bet-stake'>Stake</th><th class='place-bet-profit'>Profit</th></tr></thead><tbody>";
            return_html +=
                "<tr><td class='text-center place-bet-for'><a href='javascript:void(0);' class='text-danger close-bet-slip'><i class='fa fa-times me-1'></i></a> <span>"+ runner +"</span> </td><td class='bet-odds place-bet-odds'><div class='form-group'> <input placeholder='0' value='" +
                fullmarketodds +
                "' id='odds_val' type='text' required='required' maxlength='4' readonly='readonly' class='amountint' style='width: 45px; vertical-align: middle;'></div></td><td class='bet-stakes'><div class='form-group bet-stake place-bet-stake'><input type='hidden' id='bet_stake_side' value='Lay'/><input type='hidden' id='bet_event_id' value='" +
                eventId + "'/><input type='hidden' id='bet_marketId' value='" + selectionid +
                "'/><input type='hidden' id='bet_event_name' value='" + event_name +
                "'/><input type='hidden' id='bet_market_name' value='" + marketname +
                "'/><input type='hidden' id='bet_markettype' value='" + markettype +
                "'/><input type='hidden' id='fullfancymarketrate' value='" + fullfancymarketrate +
                "'/> <input type='hidden' id='oddsmarketId' value='" + marketId +
                "'/><input type='hidden' id='market_runner_name' value='" + market_runner_name +
                "'/><input type='hidden' id='market_odd_name' value='" + market_odd_name +
                "'/> <input maxlength='10' name='inputStake' id='inputStake' required='required' type='text' ></div></td><td class='text-right bet-profit place-bet-profit' id='profitLiability'>0</td></tr>";
            return_html += "<tr><td colspan='5' class='value-buttons' style='padding: 5px;'>";
            <?php
                $get_button_value = $conn->query("select * from user_master where id=$user_id and (button_value <> '' and button_value IS NOT NULL)");
                $num_rows = $get_button_value->num_rows;
                $button_array = array();
                if ($num_rows <= 0) {
                    $button_array[] = 500;
                    $button_array[] = 1000;
                    $button_array[] = 2000;
                    $button_array[] = 3000;
                    $button_array[] = 4000;
                    $button_array[] = 5000;
                    $button_array[] = 10000;
                    $button_array[] = 20000;
                    $button_array[] = 20000;
                    $button_array[] = 20000;
                } else {
                    $fetch_button_value_data = mysqli_fetch_assoc($get_button_value);
                    $fetch_button_value = $fetch_button_value_data['button_value'];
                    $default_stake = $fetch_button_value_data['default_stake'];
                    $one_bet_default_stake = $fetch_button_value_data['one_bet_default_stake'];
                    $button_array = explode(",", $fetch_button_value);
                }
                foreach ($button_array as $button_value) {
                ?>
            return_html +=
                " <button type='button' stake='<?php echo $button_value; ?>' class='btn btn-secondary m-l-5 m-b-5 label_stake btn-place-bet'> <?php echo $button_value; ?> </button>";
            <?php
                }
                ?>
            return_html += "<div class='btn btn-sm btn-link text-dark flex-fill text-end place-bet-clear-btn'>clear</div>"
            return_html +=
                "</td></tr></tbody></table><div class='col-md-12 place-bet-action-buttons'> <div><button type='button' class='btn btn-sm btn-info float-left btn-edit'> Edit </button></div>";
            return_html +=
                "<div> <button type='button' class='btn btn-sm btn-danger close-bet-slip'> Reset </button> <button type='button' class='btn btn-sm btn-success float-right m-b-5 placeBet' id='placeBet'> Submit </button></div> </div></form></div></div></div>";
            $(".bet_slip_details").html(return_html);
        }
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
                    rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0])
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
                        rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0])
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
                            rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0])
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
                                rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0])
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