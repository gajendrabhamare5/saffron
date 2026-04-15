<?php
include('include/conn.php');
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
    .selected {
        background: green;
        color: #fff;
    }

    .hv-container .line-odd-even {
        font-size: 40px;
        height: 40px;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: "CasinoNumFont";
        font-weight: unset;
    }

    .hv-container .nav-tabs .nav-link {
        font-weight: unset;
    }

    .hv-container .nav-tabs .nav-item {
        min-width: unset;
    }

    .hv-container table td,
    .hv-container table th {
        border-left: 2px solid #eceaea !important;
        border-right: 2px solid #eceaea !important;
        border-top: 1px solid #eceaea !important;
        border-bottom: 2px solid #eceaea !important;
    }

    .casino-title {
        display: flex;
    }

    .casino-title .d-block {
        margin-top: 1px;
    }

    .casino-title a {
        color: #fff;
        text-decoration: underline;
    }

    .casino-table {
        background-color: #f7f7f7;
        color: #333;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-top: 5px;
    }

    .nav {
        display: flex;
        flex-wrap: wrap;
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
    }

    .nav {
        display: flex;
        flex-wrap: wrap;
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
    }

    .nav-link {
        display: block;
        padding: .5rem 1rem;
        color: #0d6efd;
        text-decoration: none;
        transition: color .15sease-in-out, background-color .15sease-in-out, border-color .15sease-in-out;
    }

    .nav-pills .nav-link {
        background: 0 0;
        border: 0;
        border-radius: .25rem;
    }

    .nav-pills .nav-link {
        background-color: #cccccc;
        color: #000000;
        border-radius: 0;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        -ms-border-radius: 0;
        -o-border-radius: 0;
        border-right: 1px solid #2c3e50;
        font-weight: 500;
        font-size: 16px;
        text-align: center;
        line-height: 1;
        cursor: pointer;
        white-space: nowrap;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #fff;
        background-color: #0d6efd;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        background-color: #2c3e50;
        color: #ffffff;
    }

    .nav .nav-item .nav-link {
        border-right: 0;
    }

    .nav .nav-item {
        flex: 1 1 auto;
        margin: 1px;
    }

    .tab-content {
        width: 100%;
    }

    .fade {
        transition: opacity .15slinear;
    }

    .tab-content>.tab-pane {
        display: none;
    }

    .tab-content>.active {
        display: block;
    }

    .worlibox {
        display: flex;
        margin-top: 5px;
        flex-wrap: wrap;
        position: relative;
        width: 100%;
    }

    .worli-left {
        width: 60%;
        display: flex;
        flex-wrap: wrap;
    }

    .worli-box-title {
        width: 100%;
        text-align: center;
        margin: 5px 0;
        min-height: 24px;
    }

    .worli-box-title {
        min-height: 18px;
    }

    .worli-box-row {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 2px;
    }

    .worli-odd-box {
        text-align: center;
        height: 70px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        cursor: pointer;
    }

    .worli-left .worli-odd-box,
    .worli-full .worli-odd-box {
        width: calc(20% - 2px);
        margin-right: 2px;
    }

    .back {
        background-color: #72bbef !important;
    }

    .worli-odd-box .worli-odd {
        font-size: 40px;
        height: 40px;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: "CasinoNumFont";
    }


    .worli-box-row {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 2px;
    }

    .worli-right {
        width: 40%;
        display: flex;
        flex-wrap: wrap;
    }

    .worli-box-title {
        width: 100%;
        text-align: center;
        margin: 5px 0;
        min-height: 24px;
    }

    .worli-box-row {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 2px;
    }

    .worli-right .worli-odd-box {
        width: calc(50% - 2px);
        margin-right: 2px;
    }

    .d-block {
        display: block !important;
    }

    .fade:not(.show) {
        opacity: 0;
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
                            <div class="row row5 card32-container">
                                <div class="col-md-9 coupon-card featured-box-detail">
                                    <div class="coupon-card hv-container">
                                        <div class="game-heading"><span class="card-header-title">Instant Worli

                                            </span> <span class="float-right">
                                                Round ID:
                                                <span class="round_no">0</span></span>
                                        </div>
                                        <!---->
                                        <div class="video-container">

                                            <?php
                                            if (!empty(IFRAME_URL_SET)) {
                                            ?>
                                                <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . INSTANTWORLI_CODE; ?>" width="100%" height="200px" style="border: 0px;"></iframe>
                                            <?php

                                            } else {
                                            ?>
                                                <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                            <?php

                                            }
                                            ?>

                                            <!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . INSTANTWORLI_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
                                            <div class="clock clock3digit flip-clock-wrapper">
                                                <ul class="flip play">
                                                    <li class="flip-clock-before">
                                                        <a href="#">
                                                            <div class="up">
                                                                <div class="shadow"></div>
                                                                <div class="inn">9</div>
                                                            </div>
                                                            <div class="down">
                                                                <div class="shadow"></div>
                                                                <div class="inn">9</div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="flip-clock-active">
                                                        <a href="#">
                                                            <div class="up">
                                                                <div class="shadow"></div>
                                                                <div class="inn">0</div>
                                                            </div>
                                                            <div class="down">
                                                                <div class="shadow"></div>
                                                                <div class="inn">0</div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <ul class="flip play">
                                                    <li class="flip-clock-before">
                                                        <a href="#">
                                                            <div class="up">
                                                                <div class="shadow"></div>
                                                                <div class="inn">9</div>
                                                            </div>
                                                            <div class="down">
                                                                <div class="shadow"></div>
                                                                <div class="inn">9</div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="flip-clock-active">
                                                        <a href="#">
                                                            <div class="up">
                                                                <div class="shadow"></div>
                                                                <div class="inn">0</div>
                                                            </div>
                                                            <div class="down">
                                                                <div class="shadow"></div>
                                                                <div class="inn">0</div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <ul class="flip play">
                                                    <li class="flip-clock-before">
                                                        <a href="#">
                                                            <div class="up">
                                                                <div class="shadow"></div>
                                                                <div class="inn">1</div>
                                                            </div>
                                                            <div class="down">
                                                                <div class="shadow"></div>
                                                                <div class="inn">1</div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="flip-clock-active">
                                                        <a href="#">
                                                            <div class="up">
                                                                <div class="shadow"></div>
                                                                <div class="inn">0</div>
                                                            </div>
                                                            <div class="down">
                                                                <div class="shadow"></div>
                                                                <div class="inn">0</div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="video-overlay">
                                                <div>
                                                    <img id="card_c1" src="storage/front/img/cards_new/1.png">
                                                    <img id="card_c2" src="storage/front/img/cards_new/1.png">
                                                    <img id="card_c3" src="storage/front/img/cards_new/1.png">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="casino-detail">
                                            <div class="casino-table">
                                                <div class="tab-content suspended market_1_row">
                                                    <div role="tabpanel" id="worli-tabs-tabpane-single" aria-labelledby="worli-tabs-tab-single" class="fade single tab-pane active show">
                                                        <div class="worlibox">
                                                            <div class="worli-left">
                                                                <div class="worli-box-title"><b>9</b></div>
                                                                <div class="worli-box-row">
                                                                    <div class="worli-odd-box back back-1 market_1_b_btn" nat_1="1 Single"><span class="worli-odd">1</span></div>
                                                                    <div class="worli-odd-box back back-1 market_1_b_btn" nat_1="2 Single"><span class="worli-odd">2</span></div>
                                                                    <div class="worli-odd-box back back-1 market_1_b_btn" nat_1="3 Single"><span class="worli-odd">3</span></div>
                                                                    <div class="worli-odd-box back back-1 market_1_b_btn" nat_1="4 Single"><span class="worli-odd">4</span></div>
                                                                    <div class="worli-odd-box back back-1 market_1_b_btn" nat_1="5 Single"><span class="worli-odd">5</span></div>
                                                                </div>
                                                                <div class="worli-box-row">
                                                                    <div class="worli-odd-box back back-1 market_1_b_btn" nat_1="6 Single"><span class="worli-odd">6</span></div>
                                                                    <div class="worli-odd-box back back-1 market_1_b_btn" nat_1="7 Single"><span class="worli-odd">7</span></div>
                                                                    <div class="worli-odd-box back back-1 market_1_b_btn" nat_1="8 Single"><span class="worli-odd">8</span></div>
                                                                    <div class="worli-odd-box back back-1 market_1_b_btn" nat_1="9 Single"><span class="worli-odd">9</span></div>
                                                                    <div class="worli-odd-box back"><span class="worli-odd">0</span></div>
                                                                </div>
                                                            </div>
                                                            <div class="worli-right">
                                                                <div class="worli-box-title"><b>9</b></div>
                                                                <div class="worli-box-row">
                                                                    <div class="worli-odd-box back back-1 market_1_b_btn" nat_1="Line 1 Single"><span class="worli-odd">Line 1</span><span class="d-block">1|2|3|4|5</span></div>
                                                                    <div class="worli-odd-box back back-1 market_1_b_btn" nat_1="Odd Single"><span class="worli-odd">ODD</span><span class="d-block">1|3|5|7|9</span></div>
                                                                </div>
                                                                <div class="worli-box-row">
                                                                    <div class="worli-odd-box back back-1 market_1_b_btn" nat_1="Even Single"><span class="worli-odd">Line 2</span><span class="d-block">6|7|8|9|0</span></div>
                                                                    <div class="worli-odd-box back back-1 market_1_b_btn" nat_1="Line 2 Single"><span class="worli-odd">EVEN</span><span class="d-block">2|4|6|8|0</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=worli2">View All</a></span></div>
                                            <div class="casino-last-results" id="last-result">
                                                <!-- <span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span> -->
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

        <script src="storage/front/js/flipclock.js" type="text/javascript"></script>
        <script type="text/javascript" src='footer-js.js'></script>

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
            /* var data6; */
            var selectionid = "";
            var runner = "";
            var b1 = "";
            var bs1 = "";
            var l1 = "";
            var ls1 = "";
            var markettype = "INSTANT_WORLI";
            var markettype_2 = markettype;
            var back_html = "";
            var lay_html = "";
            var gstatus = "";
            var last_result_id = '0';

            function websocket(type) {
                socket = io.connect(websocketurl);
                socket.on('connect', function() {
                    socket.emit('Room', 'worli2');
                });
                socket.on('gameIframe', function(data) {
                    $("#casinoIframe").attr('src', data);
                });
                socket.on('game', function(data) {
                    
                    if (data && data['t1'] && data['t1'][0]) {
                        if (oldGameId != data.t1[0].mid && data.t1[0].mid != 0 && data.t1[0].mid != "0") {
                            setTimeout(function() {
                                clearCards();
                            }, <?php echo CASINO_RESULT_TIMEOUT; ?>);
                        }
                        oldGameId = data.t1[0].mid;
                        if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {

                            $(".casino-remark").text(data.t1[0].remark);
                            if (data.t1[0].C1 != 1) {
                                $("#card_c1").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C1 + ".png");
                            }
                            if (data.t1[0].C2 != 1) {
                                $("#card_c2").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C2 + ".png");
                            }
                            if (data.t1[0].C3 != 1) {
                                $("#card_c3").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C3 + ".png");
                            }

                        }
                        clock.setValue(data.t1[0].autotime);

                        $(".round_no").text(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
                        $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
                        eventId = data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid;

                        for (var j in data['t2']) {
                            selectionid = parseInt(data['t2'][j].sid);

                            b1 = 9;



                            markettype = "INSTANT_WORLI";

                            $(".market_" + selectionid + "_b_btn").attr("side", "Back");
                            $(".market_" + selectionid + "_b_btn").attr("selectionid", selectionid);
                            $(".market_" + selectionid + "_b_btn").attr("marketid", selectionid);

                            $(".market_" + selectionid + "_b_btn").attr("eventid", eventId);
                            $(".market_" + selectionid + "_b_btn").attr("markettype", markettype);
                            $(".market_" + selectionid + "_b_btn").attr("event_name", markettype);
                            $(".market_" + selectionid + "_b_btn").attr("fullmarketodds", b1);
                            $(".market_" + selectionid + "_b_btn").attr("fullfancymarketrate", b1);

                            gstatus = data['t2'][j].gstatus.toString();
                            if (gstatus == "SUSPENDED" || gstatus == "0") {
                                $(".market_" + selectionid + "_row").addClass("suspended");
                            } else {
                                $(".market_" + selectionid + "_row").removeClass("suspended");
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
                $("#card_c1").attr("src", "storage/front/img/cards_new/1.png");
                $("#card_c2").attr("src", "storage/front/img/cards_new/1.png");
                $("#card_c3").attr("src", "storage/front/img/cards_new/1.png");
            }

            function updateResult(data) {
                if (data && typeof data == "object") {
                    data = JSON.parse(JSON.stringify(data));
                    resultGameLast = data[0].mid;

                    if (last_result_id != resultGameLast) {
                        last_result_id = resultGameLast;
                        /* refresh(markettype); */
                    }

                    var html = "";
                    /* var ab = "";
                    var ab1 = ""; */
                    casino_type = "'worli2'";
                    data.forEach((runData) => {

                        ab = "result-a";
                        ab1 = "R";

                        eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] : runData.mid;
                        html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs  ' + ab + ' last-result">' + ab1 + '</span>';
                    });
                    $("#last-result").html(html);
                    if (oldGameId == 0 || oldGameId == resultGameLast) {
                        /* $("#card_c1").attr("src",site_url + "storage/front/img/cards_new/1.png");
                        $("#card_c2").attr("src",site_url + "storage/front/img/cards_new/1.png");
                        $("#card_c3").attr("src",site_url + "storage/front/img/cards_new/1.png"); */
                    }
                }
            }

            function teenpatti(type) {
                gameType = type
                websocket();
            }

            teenpatti("ok");

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
                $("#bet-error-class").removeClass("b-toast-danger");
                $("#bet-error-class").removeClass("b-toast-success");
                var last_place_bet = "";
                bet_stake_side = $("#bet_stake_side").val();
                bet_type = bet_stake_side;
                bet_event_id = $("#bet_event_id").val();
                bet_marketId = $("#bet_marketId").val();
                oddsmarketId = bet_marketId;
                eventType = 'INSTANT_WORLI';
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
                        url: 'ajaxfiles/bet_place_instant_worli.php',
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