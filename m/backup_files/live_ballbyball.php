<?php
include("../include/conn.php");
include('../include/flip_function.php');
include('../session.php');
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
include("head_css2.php");
?>
<style>
    .cricket20ballpopup {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-left: -50px;
        margin-top: -50px;
        z-index: 10;
    }

    .cricket20ballpopup {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-left: -75px;
        margin-top: -75px;
        z-index: 10;
        animation: zoom-in-zoom-out 1s ease;
        -webkit-animation: zoom-in-zoom-out 1s ease;
        animation-iteration-count: 1;
    }

    #ball_run {
        position: absolute;
        top: 50%;
        left: 40%;
        transform: translate(-50%, -50%);
        color: #fff;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 26px;
    }

    @keyframes zoom-in-zoom-out {

        /* At the beginning of the animation */
        0% {
            /* Scale the element to its original size */
            transform: scale(1, 1);
        }

        /* At the middle of the animation */
        50% {
            /* Scale the element to 1.5 times its original size */
            transform: scale(1.5, 1.5);
        }

        /* At the end of the animation */
        100% {
            /* Scale the element back to its original size */
            transform: scale(1, 1);
        }
    }

    .market-6 {
        min-width: 100%;
        margin: 0;
    }

    .market-header {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        padding: 0;
    }

    .market-6 .market-nation-detail {
        width: calc(100% - 40%);
    }

    .market-odd-box {
        width: 20%;
        padding: 2px 0;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        border-left: 1px solid #aaa;
        cursor: pointer;
        min-height: 44px;
    }

    .market-header .market-odd-box {
        min-height: 28px;
    }

    .market-row {
        background-color: #f2f2f2;
        display: flex;
        flex-wrap: wrap;
    }

    .ballbyball .suspended:after {
        width: 100%;
        font-family: "Font Awesome 5 Free";
        content: "\f023" !important;
        color: var(--white-color);
    }

    .market-nation-detail {
        font-size: 13px;
        padding: 0 5px;
    }

    .market-6 .market-nation-detail .market-nation-name {
        max-width: calc(100% - 30px);
    }

    .market-nation-detail .market-nation-name {
        font-weight: bold;
        max-width: 100%;
        width: 100%;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
        display: inline-block;
    }

    .ball-by-ball-popup span,
    .result-image span {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
        font-size: 32px;
    }

    .ball-by-ball-popup {
        position: absolute;
        top: 45%;
        left: 50%;
        margin-left: -70px;
        margin-top: -50px;
    }

    .casino-title{
        display: flex;
    }

    .casino-title .d-block{
        margin-top:1px;
    }

    .casino-title a{
        color: #fff;
        text-decoration: underline;
    }
</style>

<body cz-shortcut-listen="true">
    <div id="app">
        <?php
        include("loader.php");
        ?>
        <div>
            <?php
            include("header.php");
            ?>
            <div class="main-content">
                <!---->
                <!---->
                <div>
                    
                    <div class="tab-content">
                        <div id="bhav" class="tab-pane active">
                            <div class="casino-title"><span class="casino-name">Ball by Ball</span><span class="d-block"><a href="#" onclick="view_rules()" data-target="#rules_popup" data-toggle="modal" id="rules_popup_btn" class="ml-1" role="button">Rules</a></span></div>

                            <?php
                                include("casino_header.php");
                            ?>
                            <!---->
                            <div class="casino-video">
                                <iframe src="<?php echo IFRAME_URL;
                                                echo BALLBYBALL_CODE; ?>" width="100%" height="200" style="border: 0px;"></iframe>
                                <div class="cricket20ballpopup" style="display : none;"><img src="/storage/img/ball-blank.png"><span id="ball_run"></span></div>
                                <div class="clock clock2digit flip-clock-wrapper">
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
                                <div data-v-73ba2763="" class="ball-by-ball-popup" style="display:none;"><img data-v-73ba2763="" src="/storage/img/ball-blank.png"> <span data-v-73ba2763="">0 Run</span></div>
                            </div>
                            <div class="casino-container ballbyball">
                                <div class="table-responsive mb-1">
                                    <div class="markets">
                                        <div class="game-market market-6">
                                            <div class="market-title"><span>runs</span></div>
                                            <div class="row row10">
                                                <div class="col-6">
                                                    <div class="market-header">
                                                        <div class="market-nation-detail"><small class="float-right">
                                                                <!--  Min:<span>50</span> Max:<span>25K</span> --></small></div>
                                                        <div class="market-odd-box back"><b>Back</b></div>
                                                        <div class="fancy-min-max-box"></div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="market-header">
                                                        <div class="market-nation-detail"><small class="float-right">
                                                                <!--   Min:<span>50</span> Max:<span>25K</span> --></small></div>
                                                        <div class="market-odd-box back"><b>Back</b></div>
                                                        <div class="fancy-min-max-box"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="market-body">
                                                <div class="row row10">

                                                    <?
                                                    $sid_list = array(
                                                        "0 Run" => 1,
                                                        "1 Run" => 2,
                                                        "2 Run" => 3,
                                                        "3 Run" => 4,
                                                        "4 Run" => 5,
                                                        "6 Run" => 6,
                                                        "Boundary" => 17,
                                                        "Wicket" => 18,
                                                        "Extra Runs" => 19
                                                    );
                                                    foreach ($sid_list as $key => $val) {
                                                    ?>
                                                        <div class="col-6">
                                                            <div class="fancy-market">
                                                                <div class="market-row">
                                                                    <div class="market-nation-detail d-flex flex-column">
                                                                        <span class="market-nation-name">
                                                                            <? echo $key; ?>
                                                                        </span>
                                                                        <span style="color: black;" class="market_<? echo $val; ?>_b_exposure">0</span>
                                                                    </div>
                                                                    <div data-title="suspended" class="betting-disabled suspended market_<? echo $val; ?>_b_btn market-odd-box back"></div>
                                                                    <small class="box-2 float-center text-center" style="display: flex;">
                                                                        <span class="market_<? echo $val; ?>_min_max">

                                                                        </span>
                                                                    </small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                        </div> <!----> <!---->
                                    </div>
                                </div>
                                <div class="remark text-right pr-2">
                                    <!---->
                                </div>
                                <marquee scrollamount="3" class="casino-remark m-b-10">

                                </marquee>
                                <div class="last-result-tiele"><span>Last Result</span> <span class="float-right"><a href="casinoresults?game_type=ballbyball" class="">View All</a></span></div>
                                <div class="last-result-container text-right mt-1" id="last-result">



                                </div>
                                <!---->
                                <!---->
                                <!---->
                            </div>
                        </div>
                        <?php
                        include("open_bet.php");
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<script type="text/javascript" src="../js/socket.io.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script src="../storage/front/js/flipclock.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src='footer-js.js'></script>

<script type="text/javascript">
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
    var markettype = "BALLBYBALL";
    var markettype_2 = markettype;
    var back_html = "";
    var lay_html = "";
    var gstatus = "";
    var data6;
    var last_result_id = '0';

    function websocket(type) {
        socket = io.connect(websocketurl);
        socket.on('connect', function() {
            socket.emit('Room', 'ballbyball');
        });
        socket.on('game', function(data) {
            if (data && data['t1'] && data['t1']['mid']) {
                data['t1'][0] = data['t1'];
            }
            if (data && data['t1'] && data['t1'][0]) {
                if (data.t1[0].rdesc != "") {
                    $("#ball_run").text(data.t1[0].rdesc);
                    $(".cricket20ballpopup").show();
                } else {
                    $("#ball_run").html("");
                    $(".cricket20ballpopup").hide();
                }
                if (oldGameId != data.t1[0].mid && data.t1[0].mid != 0 && data.t1[0].mid != "0") {
                    setTimeout(function() {
                        clearCards();
                    }, <?php echo CASINO_RESULT_TIMEOUT; ?>);
                }
                oldGameId = data.t1[0].mid;
                if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark").text(data.t1[0].remark);
                }
                clock.setValue(data.t1[0].lt);
                $(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid);
                /*  $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]); */
                eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid;

                for (var j in data['t1'][0]['sub']) {
                    selectionid = parseInt(data['t1'][0]['sub'][j].sid);
                    runner = data['t1'][0]['sub'][j].nat || data['t1'][0]['sub'][j].nation || data['t1'][0]['sub'][j].nat || data['t1'][0]['sub'][j].nation;
                    b1 = data['t1'][0]['sub'][j].b;
                    bs1 = data['t1'][0]['sub'][j].bs;
                    l1 = data['t1'][0]['sub'][j].l;
                    ls1 = data['t1'][0]['sub'][j].ls;

                    b11 = b1;
                    markettype = "BALLBYBALL";

                    b1 = b1 == 0 ? "" : b1;
                    bs1 = bs1 == 0 ? "" : bs1;

                    l1 = l1 == 0 ? "" : l1;
                    ls1 = ls1 == 0 ? "" : ls1;


                    back_html = '<span class="market-odd">' + b1 + '</span><span class="market-volume">' + bs1 + '</span>';


                    $(".market_" + selectionid + "_b_btn").html(back_html);

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


                    gstatus = data['t1'][0]['sub'][j].gstatus.toString();
                    if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {
                        $(".market_" + selectionid + "_b_btn").attr("data-title", 'suspended');
                        $(".market_" + selectionid + "_b_btn").addClass("suspended");

                        $(".market_" + selectionid + "_b_btn").removeClass("back-1");
                        $(".market_" + selectionid + "_b_btn").addClass("betting-disabled");
                    } else {

                        $(".market_" + selectionid + "_b_btn").removeAttr("data-title");
                        $(".market_" + selectionid + "_b_btn").removeClass("suspended");
                        $(".market_" + selectionid + "_b_btn").addClass("back-1");
                        $(".market_" + selectionid + "_b_btn").removeClass("betting-disabled");
                    }
                    /* $(".market_" + selectionid + "_b_btn").removeClass("back-1"); */
                    min = data['t1'][0]['sub'][j].min.toString();
                    max = data['t1'][0]['sub'][j].max;
                    max = max / 1000;
                    $(".market_" + selectionid + "_min_max").html(`
                                Min:<span>${min}</span><br>Max:<span>${max}K</span>
                        `);
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


    }

    function updateResult(data) {
        if (data && data[0]) {
            resultGameLast = data[0].mid;

            if (last_result_id != resultGameLast) {
                last_result_id = resultGameLast;
            }

            html = "";
            var ab = "";
            var ab1 = "";
            casino_type = "'ballbyball'";
            data.forEach((runData) => {
                ab = "R";
                ab1 = "R";
                eventId = runData.mid == 0 ? 0 : runData.mid;
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="last-result ml-1  ' + ab + ' last-result">' + ab1 + '</span>';

            });


            $("#last-result").html(html);
        }
    }

    function teenpatti(type) {
        gameType = type
        websocket();
    }

    teenpatti("ok");
    jQuery(document).on("click", ".back-1", function() {
        $("#popup_color").removeClass("back");
        $("#popup_color").removeClass("lay");
        $("#popup_color").addClass("back");
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
            odds_change_value = "disabled";
            runs_lable = 'Runs';
            runs_lable = 'Odds';

            fullfancymarketrate = fullmarketodds;

            eventId = $(this).attr("eventid");
            marketId = $(this).attr("marketid");
            event_name = $(this).attr("event_name");
            $(".select").removeClass("select");
            $(this).addClass("select");
            return_html = "";

            $("#inputStake").val();
            $("#market_runner_label").text(market_runner_name);
            $("#bet_stake_side").val("Back");
            $("#odds_val").val(fullmarketodds);
            $("#bet_event_id").val(eventId);
            $("#bet_marketId").val(marketId);
            $("#bet_event_name").val(event_name);
            $("#bet_market_name").val(marketname);
            $("#bet_markettype").val(markettype);
            $("#fullfancymarketrate").val(fullfancymarketrate);
            $("#oddsmarketId").val(marketId);
            $("#market_runner_name").val(market_runner_name);
            $("#market_odd_name").val(market_odd_name);

            $('#profitLiability').text('0');
            $(".placeBet").attr('disabled', false);
            $("#inputStake").val("0");

            $('.open_back_place_bet').show();
            $('#open_back_place_bet').modal("show");
        }
    });

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

    jQuery(document).on("click", "#placeBet", function() {

        $("#placeBet").html('<i class="fa fa-spinner  fa-spin"></i> Submit');
        $(".placeBet").attr('disabled', true);
        $(".placeBet").removeAttr("id", "placeBet");

        var last_place_bet = "";
        bet_stake_side = $("#bet_stake_side").val();
        bet_type = bet_stake_side;
        bet_event_id = $("#bet_event_id").val();
        bet_marketId = $("#bet_marketId").val();
        oddsmarketId = bet_marketId;
        eventType = 'BALLBYBALL';
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

        $("#bet-error-class").removeClass("b-toast-danger");
        $("#bet-error-class").removeClass("b-toast-success");
        setTimeout(function() {
            $.ajax({
                type: 'POST',
                url: '../ajaxfiles/bet_place_ball_by_ball.php',
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
                    var check_status = response['status'];
                    var message = response['message'];
                    if (check_status == 'ok') {
                        if (bet_markettype != "FANCY_ODDS") {
                            oddsNo = runsNo;
                        } else {
                            oddsNo = oddsNo;
                        }
                        auth_key = 1;
                        $("#bet-error-class").addClass("b-toast-success");
                    } else {
                        $("#bet-error-class").addClass("b-toast-danger");
                    }
                    error_message_text = message;
                    $("#errorMsgText").text(error_message_text);
                    $("#errorMsg").fadeIn('fast').delay(3000).hide(0);
                    $(".close-bet-slip").click();
                    refresh(markettype);
                    $(".placeBet").attr("id", "placeBet");
                    $("#placeBet").html('Submit');

                    $(".placeBet").attr('disabled', false);

                    $('.open_back_place_bet').hide();
                    $('#open_back_place_bet').modal("hide");
                }
            });
        }, bet_sec - 2000);
    });
</script>
<div id="open_back_place_bet" class="modal open_back_place_bet" role="dialog">
    <div class="modal-dialog">
        <div role="document" id="__BVID__30___BV_modal_content_" tabindex="-1" class="modal-content">
            <header id="__BVID__30___BV_modal_header_" class="modal-header">
                <h5 id="__BVID__30___BV_modal_title_" class="modal-title">Placebet</h5>
                <button type="button" data-dismiss="modal" class="close">&times;</button>
            </header>
            <div id="__BVID__30___BV_modal_body_" class="modal-body" style="    padding: 0px;">
                <div class="place-bet pt-2 pb-2 back" id="popup_color">
                    <div class="container-fluid container-fluid-5">
                        <div class="row row5">
                            <div class="col-5"><b id="market_runner_label">Player A</b></div>
                            <div class="col-7 text-right">
                                <div class="float-right">
                                    <button class="stakeactionminus btn disabled">
                                        <span class="fa fa-minus"></span>
                                    </button>
                                    <input type="text" placeholder="0" class="stakeinput" id="odds_val">
                                    <button class="stakeactionminus btn disabled">
                                        <span class="fa fa-plus"></span>
                                    </button>
                                    <input type='hidden' id='bet_stake_side' value='' /><input type='hidden' id='bet_event_id' value='' /><input type='hidden' id='bet_marketId' value='' /><input type='hidden' id='bet_event_name' value='' /><input type='hidden' id='bet_market_name' value='' /><input type='hidden' id='bet_markettype' value='' /><input type='hidden' id='fullfancymarketrate' value='' /> <input type='hidden' id='oddsmarketId' value='' /><input type='hidden' id='market_runner_name' value='' /><input type='hidden' id='market_odd_name' value='' />
                                </div>
                            </div>
                        </div>
                        <div class="row row5 mt-2">
                            <div class="col-4">
                                <input type="number" placeholder="00" id="inputStake" class="stakeinput w-100">
                            </div>
                            <div class="col-4">
                                <button class="btn btn-primary btn-block  placeBet" id="placeBet">
                                    <!---->Submit
                                </button>
                            </div>
                            <div class="col-4 text-center pt-1"><span id="profitLiability">0</span></div>
                        </div>
                        <div class="row row5 mt-2">
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
                            } else {
                                $fetch_button_value_data = mysqli_fetch_assoc($get_button_value);
                                $fetch_button_value = $fetch_button_value_data['button_value'];
                                $default_stake = $fetch_button_value_data['default_stake'];
                                $one_bet_default_stake = $fetch_button_value_data['one_bet_default_stake'];
                                $button_array = explode(",", $fetch_button_value);
                            }
                            foreach ($button_array as $button_value) {
                            ?>
                                <div class="col-4">
                                    <button type="button" class="btn btn-secondary btn-block mb-2 label_stake" stake='<?php echo $button_value; ?>'>
                                        <?php echo $button_value; ?>
                                    </button>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!---->
        </div>
    </div>
</div>
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
</div>
<?php
include "footer.php";
include "footer-result-popup.php";
?>

</html>