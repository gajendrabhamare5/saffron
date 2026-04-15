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

    .casino-table-box:first-child {
        padding-bottom: 20px;
        position: relative;
        margin-bottom: 10px !important;
    }

    .casino-table-box:first-child {
        width: 70%;
        margin: 0 auto;
    }

    .casino-table-box:first-child::after {
        content: "";
        background-color: #2c3e50b3;
        height: 1px;
        width: 50%;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        -webkit-transform: translateX(-50%);
        -moz-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        -o-transform: translateX(-50%);
        bottom: 0;
    }

    .casino-table-header,
    .casino-table-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        border-bottom: 1px solid #c7c8ca;
    }

    .casino-table-header,
    .casino-table-body {
        width: 100%;
    }

    .casino-table-header,
    .casino-table-body {
        border-left: 1px solid #c7c8ca;
        border-top: 1px solid #c7c8ca;
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
        flex-direction: revert;
        justify-content: space-between;
        align-items: center;
        padding: 0 10px;
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

    .casino-odds-box-theme {
        background-image: linear-gradient(to right, #0088cc, #2c3e50);
        color: #ffffff;
        border-radius: 4px;
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
        border: 0;
    }

    .casino-table-header .casino-odds-box {
        cursor: unset;
        padding: 2px;
        min-height: unset;
        height: auto !important;
    }

    .casino-odds-box {
        width: 20%;
    }

    .casino-table-header,
    .casino-table-body {
        width: 100%;
    }

    .casino-table-header,
    .casino-table-body {
        border-left: 1px solid #c7c8ca;
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

    .casino-table-left-box,
    .casino-table-center-box,
    .casino-table-right-box {
        width: 49%;
        border-left: 1px solid #c7c8ca;
        border-right: 1px solid #c7c8ca;
        border-top: 1px solid #c7c8ca;
        background-color: #f2f2f2;
    }

    .casino-table-left-box,
    .casino-table-right-box {
        width: 49%;
        padding: 10px 10px 0 10px;
    }

    .aaa-odd-box {
        margin-bottom: 10px;
        min-height: 92px;
    }

    .casino-table-left-box .casino-odds-box,
    .casino-table-right-box .casino-odds-box {
        width: 100%;
        margin: 5px 0;
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


    .video-overlay .ab-rtlslider1 {
        width: 90px !important;
    }

    .dkd-total {
        padding: 5px;
        margin-right: 0;
        border: 1px solid yellow;
        color: #fff;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        width: 190px;
        margin-top: 5px;
        align-items: center;
    }

    .dkd-total {
        width: 140px;
    }

    .dkd-total>div:first-child {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .dkd-total>div:first-child>div {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
    }

    .dkd-total>div {
        line-height: normal;
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
                                        <div class="game-heading"><span class="card-header-title">Dus ka Dum
                                                <!-- <small role="button" class="teenpatti-rules"  onclick="view_rules('tp-rules.jpg')" data-target="#rules_popup" data-toggle="modal"  tabindex="0"><u>Rules</u></small> --> <!----></span>
                                            <small role="button" onclick="view_rules('dum10')" data-toggle="modal" tabindex="0"><u>Rules</u></small>

                                            <span class="float-right">
                                                Round ID:
                                                <span class="round_no">0</span><!--   | Min: <span>100</span> | Max: <span>500000</span> --></span>
                                        </div>
                                        <!---->
                                        <div class="video-container">
                                            <?php
                                            if (!empty(IFRAME_URL_SET)) {
                                            ?>
                                                <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . DUM10_CODE; ?>" width="100%" height="200px" style="border: 0px;"></iframe>
                                            <?php

                                            } else {
                                            ?>
                                                <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                            <?php

                                            }
                                            ?>
                                            <!---->
                                            <!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL;
                                                                                    echo DUM10_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
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
                                                <div>
                                                    <div>
                                                        <div class="dkd-total mb-1 mt-1">
                                                            <div>
                                                                <div>
                                                                    <div>Curr. Total:</div>
                                                                    <div class="numeric text-playerb cards_total">0</div>
                                                                </div>
                                                                <div>Card #:<span class="no_cards"> 0 </span></div>
                                                            </div>
                                                            <div class="runnernext"></div>
                                                        </div>
                                                        <div class="d-flex">
                                                            <div id="dum10-cards" class="ab-rtlslider ab-rtlslider1 owl-carousel owl-theme owl-rtl owl-loaded owl-drag mt-1">
                                                                <div class="owl-stage-outer">
                                                                    <div class="owl-stage" id="cards_1" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 196px;">

                                                                    </div>
                                                                </div>
                                                                <div class="owl-nav">
                                                                    <button type="button" role="presentation" class="owl-prev disabled"><span aria-label="Previous">&#8249;</span></button>
                                                                    <button type="button" role="presentation" class="owl-next"><span aria-label="Next">&#8250;</span></button>
                                                                </div>
                                                                <div class="owl-dots disabled"></div>
                                                            </div>
                                                            <div class="mt-1 ml-1">
                                                                <img id="card_c1" src="../storage/front/img/cards/1.png">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="casino-table">
                                            <div class="casino-table-box">
                                                <div class="casino-table-header">
                                                    <div class="casino-nation-detail"></div>
                                                    <div class="casino-odds-box back">Back</div>
                                                    <div class="casino-odds-box lay">Lay</div>
                                                </div>
                                                <div class="casino-table-body">
                                                    <div class="casino-table-row ">
                                                        <div class="casino-nation-detail">
                                                            <div class="casino-nation-name market_1_name">Next Total 160 or More</div>
                                                            <div class="casino-nation-book w-100 market_1_b_exposure market_exposure"></div>
                                                        </div>
                                                        <div class="casino-odds-box back suspended-box  market_1_row market_1_b_btn back-1"><span class="casino-odds market_1_b_value">0</span></div>
                                                        <div class="casino-odds-box lay suspended-box  market_1_row market_1_l_btn lay-1"><span class="casino-odds market_1_l_value">0</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="casino-table-box mt-3">
                                                <div class="casino-table-left-box">
                                                    <div class="aaa-odd-box">
                                                        <div class="casino-odds text-center market_5_b_value">0</div>
                                                        <div class="casino-odds-box back casino-odds-box-theme suspended-box  market_5_row market_5_b_btn back-1"><span class="casino-odds market_5_name">Even</span></div>
                                                        <div class="casino-nation-book text-center w-100 market_5_b_exposure market_exposure"></div>
                                                    </div>
                                                    <div class="aaa-odd-box">
                                                        <div class="casino-odds text-center market_6_b_value">0</div>
                                                        <div class="casino-odds-box back casino-odds-box-theme suspended-box  market_6_row market_6_b_btn back-1"><span class="casino-odds market_6_name">Odd</span></div>
                                                        <div class="casino-nation-book text-center w-100 market_6_b_exposure market_exposure"></div>
                                                    </div>
                                                </div>
                                                <div class="casino-table-right-box">
                                                    <div class="aaa-odd-box">
                                                        <div class="casino-odds text-center market_3_b_value">0</div>
                                                        <div class="casino-odds-box back casino-odds-box-theme suspended-box  market_3_row market_3_b_btn back-1">
                                                            <div class="casino-odds"><span class="card-icon ms-1"><span class="card-red ">{</span></span><span class="card-icon ms-1"><span class="card-red ">[</span></span></div>
                                                        </div>
                                                        <div class="casino-nation-book text-center w-100 market_3_b_exposure market_exposure"></div>
                                                    </div>
                                                    <div class="aaa-odd-box">
                                                        <div class="casino-odds text-center market_4_b_value">0</div>
                                                        <div class="casino-odds-box back casino-odds-box-theme suspended-box  market_4_row market_4_b_btn back-1">
                                                            <div class="casino-odds"><span class="card-icon ms-1"><span class="card-black ">}</span></span><span class="card-icon ms-1"><span class="card-black ">]</span></span></div>
                                                        </div>
                                                        <div class="casino-nation-book text-center w-100 market_4_b_exposure market_exposure"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=teen33">View All</a></span></div>
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








<script src="storage/front/js/flipclock.js" type="text/javascript"></script>
<script src="storage/front/js/owl.carousel.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src='footer-js.js?4'></script>

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
    var markettype = "DUM10";
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
            socket.emit('Room', 'dum10');
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
                    if (data.t1[0].cards != 1) {
                        $("#card_c1").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].cards +
                            ".png");
                    } else {
                        $("#card_c1").attr("src", site_url + "storage/front/img/cards_new/1.png");
                    }
                    var desc = data.t1[0].lcard;
                    desc = desc.split(",");
                    $(".no_cards").html(desc.length);
                    var card_count = 0;
                    aall = [];
                    for (var i in desc) {

                        if (desc[i] != 1) {
                            aall.push(desc[i]);
                            card_value = getType(desc[i]);
                            card_rank = card_value.rank;
                            card_count += card_rank;
                        }

                    }
                    $(".cards_total").text(card_count);


                    acards_html_array = [];
                    var acards_html = "";
                    var len1 = 0;

                    if (aall != "") {
                        for (ac in aall) {


                            acards_html_array.push('  <div class="owl-item " id="owl_ac_img_id' + ac + '" style=""><div class="item"><img src="storage/front/img/cards_new/' + aall[ac] + '.png"></div></div>');
                            acards_html += acards_html_array[len1];

                            len1++;
                            if (len1 == aall.length) {
                                acards_html_array.reverse();

                                acards_html = acards_html_array.join('');

                                $("#cards_1").html(acards_html);
                                $('#dum10-cards').owlCarousel().trigger('add.owl.carousel',
                                    [jQuery(acards_html)]).trigger('refresh.owl.carousel');
                            } else {
                                $("#cards_1").html(acards_html);
                                $('#dum10-cards').owlCarousel().trigger('add.owl.carousel',
                                    [jQuery(acards_html)]).trigger('refresh.owl.carousel');
                            }



                        }

                    } else {
                        $("#cards_1").html("");
                        $('#dum10-cards').owlCarousel().trigger('add.owl.carousel',
                            [jQuery(acards_html)]).trigger('refresh.owl.carousel');
                    }
                }
                clock.setValue(data.t1[0].autotime);
                $(".round_no").text(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
                eventId = data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid;
                for (var j in data['t2']) {
                    selectionid = data.t2[j].sectionId || data.t2[j].sid;
                    runner = data.t2[j].nation || data.t2[j].nat;
                    b1 = data.t2[j].b1;
                    bs1 = data.t2[j].bs1;
                    l1 = data.t2[j].l1;
                    ls1 = data.t2[j].ls1;


                    $(".market_" + selectionid + "_name").html(runner);
                    if (selectionid == 1) {
                        $(".runnernext").html(runner);
                    }
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
                    $(".market_" + selectionid + "_b_value").html(b1);

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
                    $(".market_" + selectionid + "_l_value").html(l1);

                    gstatus = data.t2[j].gstatus.toString();
                    if (gstatus == "SUSPENDED" || gstatus == "0") {
                        $(".market_" + selectionid + "_row").addClass("suspended-box");
                    } else {
                        $(".market_" + selectionid + "_row").removeClass("suspended-box");
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
                    rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ?
                        11 : data[0] == '10' ?
                        10 : parseInt(data[0])
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
                        rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ?
                            11 : data[0] == '10' ?
                            10 : parseInt(data[0])
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
                            rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ?
                                11 : data[0] == '10' ?
                                10 : parseInt(data[0])
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
                                rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ?
                                    11 : data[0] == '10' ?
                                    10 : parseInt(data[0])
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

    function clearCards() {
        refresh(markettype);
        $("#cards_1").html("");
        /*  $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
         $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
         $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
         $("#card_c4").attr("src", site_url + "storage/front/img/cards/1.png");
         $("#card_c5").attr("src", site_url + "storage/front/img/cards/1.png");
         $("#card_c6").attr("src", site_url + "storage/front/img/cards/1.png"); */
    }

    function updateResult(data) {
        
        if (data && data[0]) {
            /* data = JSON.parse(JSON.stringify(data)); */
            resultGameLast = data[0].mid;

            if (last_result_id != resultGameLast) {
                last_result_id = resultGameLast;
                //refresh(markettype);
            }

            var html = "";
            var ab = "";
            var ab1 = "";
            casino_type = "'dum10'";
            data.forEach((runData) => {


                if (parseInt(runData.win) == 1) {
                    ab = "result-a";
                    ab1 = "Y";

                } else if (parseInt(runData.win) == 2) {
                    ab = "result-b";
                    ab1 = "N";

                } else {
                    ab = "result-c";
                    ab1 = "R";
                }

                eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] : runData.mid;
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs  ' + ab + ' result">' + ab1 + '</span>';
            });
            $("#last-result").html(html);
            if (oldGameId == 0 || oldGameId == resultGameLast) {
                $("#cards_1").html("")
                /* $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c4").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c5").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c6").attr("src", site_url + "storage/front/img/cards/1.png"); */
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
        eventType = 'DUM10';
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
                url: 'ajaxfiles/bet_place_teen6.php',
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

    (function($) {


        carousel_start();
        jQuery("#andar_div").owlCarousel({

            loop: false,
            margin: 2,
            nav: true,
            responsive: {
                0: {
                    items: 6
                },

                600: {
                    items: 6
                },

                1000: {
                    items: 6
                },
            }
        });

    }(jQuery));


    function carousel_start() {
        jQuery("#dum10-cards").owlCarousel({
            rtl: true,
            loop: false,
            margin: 1,
            nav: true,
            responsive: {
                0: {
                    items: 3
                },

                600: {
                    items: 3
                },

                1000: {
                    items: 3
                },
            }
        });
    }
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