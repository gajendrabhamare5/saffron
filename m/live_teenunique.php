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

    .casino-table {
        padding: 5px;
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }

    h4,
    .h4 {
        font-size: 20px;
        font-weight: 400;
        margin-bottom: 0;
    }

    .unique-teen-title {
        text-align: center;
        background: var(--theme2-bg);
        color: #ffffff;
        padding: 6px 12px;
        font-size: 16px;
        /* border-radius: 4px; */
        opacity: 0.9;
        margin-bottom: 8px;
    }

    .unique-teen-title {
        font-size: 14px;
    }

    .unique-teen-title i {
        font-size: 20px;
    }

    .unique-teen20-box {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        align-content: center;
        padding: 0;
        /* width: 100%; */
        margin: 0 auto;
        gap: 10px;
    }

    .unique-teen20-box .unique-teen20-card {
        /* width: 10%; */
        text-align: center;
        margin: 5px 0;
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        align-items: center;
        gap: 5px;
    }

    .unique-teen20-box.suspendedNew .unique-teen20-card {
        pointer-events: none;
    }

    .unique-teen20-box.suspendedNew {
        cursor: not-allowed;
        pointer-events: unset;
    }

    .unique-teen20-box .unique-teen20-card img {
        width: 80px;
        height: auto;
        cursor: pointer;
        /* border: 3px solid; */
    }

    .unique-teen20-box .unique-teen20-card img {
        width: 40px;
        height: auto;
    }

    .unique-teen20-box .unique-teen20-card img:first-child {
        width: 30px;
    }

    .unique-teen20-box .unique-teen20-card img:first-child {
        width: 25px;
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
        padding: 6px;
        background-color: var(--theme2-bg);
        color: #ffffff;
        font-size: 14px;
        display: flex;
        justify-content: space-between;
        margin-top: 4px;
        width: 100%;
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
        height: 25px;
        width: 25px;
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

    .casino-last-results .result.result-b {
        color: #ffff33;
    }

    .casino-last-results .result.result-c {
        color: #33c6ff;
    }

    .casino-last-results .result.result-a {
        color: #ff4500;
    }
.unique-teen20-box .unique-teen20-card img.select {
    /* transform: scale(1.05); */
    border: 3px solid var(--theme1-bg);
}
.unique-teen20-place-balls {
    display: flex;
    padding: 6px;
    justify-content: center;
    flex-wrap: wrap;
    align-items: center;
    gap: 8px;
}

.unique-teen20-place-balls img {
    width: 30px;
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

    .rules-section .rules-section .list-style {
        padding-left: 1.5rem !important;
    }

    .rules-section .rules-section .list-style {
        padding-right: 1.5rem !important;
    }

    .suspended:after {
        width: 100% !important;
    }
    .unique-your-card{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    padding: 4px;
    width: 95%;
    margin: 5px auto;
    background: #0000001c;
    border-radius: 4px;
}
.unique-your-card h4{
    padding:unset !important;
}
.unique-your-card img{
    height: 40px;
    margin-right: 5px;
}
.uniquebets , .hidenettab{
    display:none;
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
                    <div class="casino-title"><span class="casino-name">Unique Teenpatti</span><span class="d-block"><a href="#" onclick="view_rules('teenunique')" data-target="#rules_popup" data-toggle="modal" id="rules_popup_btn" class="ml-1" role="button">Rules</a></span></div>

                    <?php
                    include("casino_header.php");
                    ?>
                    <div class="tab-content">
                        <div id="bhav" class="tab-pane active">

                            <!---->
                            <div class="casino-video">


                                <?php
                                if (!empty(IFRAME_URL_SET)) {
                                ?>
                                    <iframe src="<?php echo IFRAME_URL . "" . TEENUNIQUE_CODE; ?>" width="100%" height="250px" style="border: 0px;"></iframe>
                                <?php

                                } else {
                                ?>
                                    <iframe id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                <?php

                                }
                                ?>

                                <!--  <iframe id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                 <iframe src="<?php echo IFRAME_URL . "" . TEENUNIQUE_CODE; ?>" width="100%" height="200px" style="border: 0px;"></iframe> -->
                                <div class="clock clock2digit flip-clock-wrapper">
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
                                                    <div class="inn">2</div>
                                                </div>
                                                <div class="down">
                                                    <div class="shadow"></div>
                                                    <div class="inn">2</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="flip-clock-active">
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
                                    </ul>
                                </div>

                            </div>
                            <div class="casino-detail">
                                <div class="casino-table">
                                    <h4 class="unique-teen-title">Select any 3 cards of your choice and experience TeenPatti in a unique way.<i class="fas fa-hand-point-down ms-1"></i></h4>
                                    <div class="unique-teen20-box suspendedNew">
                                        <div class="unique-teen20-card"><img src="../storage/front/img/s1-icon.png" alt=""><img id="card_c1" class="teenuni_card1 cardss cards_click" src="../storage/front/img/cards/0.png" nat_1="1"></div>
                                        <div class="unique-teen20-card"><img src="../storage/front/img/s2-icon.png" alt=""><img id="card_c2" class="teenuni_card2 cardss cards_click" src="../storage/front/img/cards/0.png" nat_1="2"></div>
                                        <div class="unique-teen20-card"><img src="../storage/front/img/s3-icon.png" alt=""><img id="card_c3" class="teenuni_card3 cardss cards_click" src="../storage/front/img/cards/0.png" nat_1="3"></div>
                                        <div class="unique-teen20-card"><img src="../storage/front/img/s4-icon.png" alt=""><img id="card_c4" class="teenuni_card4 cardss cards_click" src="../storage/front/img/cards/0.png" nat_1="4"></div>
                                        <div class="unique-teen20-card"><img src="../storage/front/img/s5-icon.png" alt=""><img id="card_c5" class="teenuni_card5 cardss cards_click" src="../storage/front/img/cards/0.png" nat_1="5"></div>
                                        <div class="unique-teen20-card"><img src="../storage/front/img/s6-icon.png" alt=""><img id="card_c6" class="teenuni_card6 cardss cards_click" src="../storage/front/img/cards/0.png" nat_1="6"></div>
                                    </div>
                                </div>
                                <div class="last-result-tiele"><span>Last Result</span> <span class="float-right"><a href="casinoresults?game_type=teenunique" class="">View All</a></span></div>
                                <div class="casino-last-results" id="last-result"></div>
                            </div>
                        </div>
                        <div class="table-responsive m-u-table uniquebets">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="box-6">Matched Bet</th>
                                            <th class="box-2 text-right">Odds</th>
                                            <th class="box-2 text-right">Stake</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id="matched_bet">
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        <?php
                        /* include("open_bet.php"); */
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<script type="text/javascript" src="../js/socket.io.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script src="../storage/front/js/flipclock.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src='footer-js.js?109'></script>

<?

include("betpopcss.php");
?>

<script type="text/javascript">
    var site_url = '<?php echo WEB_URL; ?>';
    var websocketurl = '<?php echo GAME_IP; ?>';
    var clock = new FlipClock($(".clock"), {
        clockFace: "Counter"
    });
    var oldGameId = 0;
    var resultGameLast = 0;
    var data6;
    var markettype = "TEENUNIQUE";
    var markettype_2 = markettype;
    var last_result_id = '0';
    var newround = false;

    function websocket(type) {
        socket = io.connect(websocketurl, {
            transports: ['websocket']
        });
        socket.on('connect', function() {
            socket.emit('Room', 'teenunique');
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
                var cards_open = false;
                if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark").text(data.t1[0].remark);
                    if (data.t1[0].C1 && data.t1[0].C1 != 1) {
                        cards_open = true;
                        $(".teenuni_card1").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C1 + ".png");
                    }
                    if (data.t1[0].C2 && data.t1[0].C2 != 1) {
                        cards_open = true;
                        $(".teenuni_card2").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C2 + ".png");
                    }
                    if (data.t1[0].C3 && data.t1[0].C3 != 1) {
                        cards_open = true;
                        $(".teenuni_card3").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C3 + ".png");
                    }
                    if (data.t1[0].C4 && data.t1[0].C4 != 1) {
                        cards_open = true;
                        $(".teenuni_card4").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C4 + ".png");
                    }
                    if (data.t1[0].C5 && data.t1[0].C5 != 1) {
                        cards_open = true;
                        $(".teenuni_card5").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C5 + ".png");
                    }
                    if (data.t1[0].C6 && data.t1[0].C6 != 1) {
                        cards_open = true;
                        $(".teenuni_card6").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C6 + ".png");
                    }
                }
                clock.setValue(data.t1[0].autotime);
                $(".round_no").text(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
                eventId = data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid;
                for (var j in data['t2']) {
                    selectionid = 1;
                    runner = "";
                    b1 = data.t2[j].b1;
                    bs1 = data.t2[j].bs1;
                    l1 = data.t2[j].l1;
                    ls1 = data.t2[j].ls1;
                    $(".cardss").attr("side", "Back");
                    $(".cardss").attr("selectionid", selectionid);
                    $(".cardss").attr("marketid", selectionid);
                    $(".cardss").attr("runner", runner);
                    $(".cardss").attr("marketname", "");
                    $(".cardss").attr("eventid", eventId);
                    $(".cardss").attr("markettype", markettype);
                    $(".cardss").attr("event_name", markettype);
                    $(".cardss").attr("fullmarketodds", b1);
                    $(".cardss").attr("fullfancymarketrate", b1);

                    gstatus = data.t2[j].gstatus.toString();
                    if (gstatus == "SUSPENDED" || gstatus == "0") {
                        if (!cards_open) {
                            $(".cardss").attr("src", site_url + "storage/front/img/cards/0.png");
                        }

                        $(".cardss").removeClass('select');
                        $(".cardss").removeClass('cards_click');
                        $(".unique-teen20-box").addClass('suspendedNew');
                        newround = false;
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
        $("#card_c4").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c5").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c6").attr("src", site_url + "storage/front/img/cards/1.png");
        $(".cardss").addClass('cards_click');
        $(".unique-teen20-box").removeClass('suspendedNew');
        $(".uniquebets").hide();
        newround = true;
    }

    function updateResult(data) {

        if (data) {
            data = JSON.parse(JSON.stringify(data));
            resultGameLast = data[0].mid;

            if (last_result_id != resultGameLast) {
                last_result_id = resultGameLast;
                refresh(markettype);
            }

            html = "";
            var ab = "";
            var ab1 = "";
            casino_type = "'teenunique'";
            data.forEach((runData) => {

                ab = "result-b";
                ab1 = "R";

                eventId = runData.mid;
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs  ' + ab + ' result">' + ab1 + '</span>';
            });
            $("#last-result").html(html);
            /* if (oldGameId == 0 || oldGameId == resultGameLast) {
                $("#card_c1").attr("src", site_url + "storage/front/img/cards_new/1.png");
                $("#card_c2").attr("src", site_url + "storage/front/img/cards_new/1.png");
                $("#card_c3").attr("src", site_url + "storage/front/img/cards_new/1.png");
                $("#card_c4").attr("src", site_url + "storage/front/img/cards_new/1.png");
                $("#card_c5").attr("src", site_url + "storage/front/img/cards_new/1.png");
                $("#card_c6").attr("src", site_url + "storage/front/img/cards_new/1.png");
            } */
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
var nat_1 = [];
    jQuery(document).on("click", ".close-bet-slip", closeBetSlip);

function closeBetSlip() {
    
    nat_1 = [];
    $(".cards_click").removeClass("select");
}

    jQuery(document).on("click", ".cards_click", function() {
        if(!newround){
                    return false;
                }
                
                
                var nat_1_temp = $(this).attr("nat_1");
                var check_already = nat_1.includes(nat_1_temp);
                if(check_already){
                    $(this).removeClass("select");
                    nat_1 = nat_1.filter(e => e !== nat_1_temp);
                    nat_1.sort();
                    
                }else{
                    if(nat_1.length < 3){
                        nat_1.push(nat_1_temp);
                        $(this).addClass("select");
                        nat_1.sort();
                    }
                }
                if(nat_1.length != 3){
                    return false;
                }
               
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
            eventId = $(this).attr("eventid");
            marketId = $(this).attr("marketid");
            event_name = $(this).attr("event_name");
            return_html = "";

            var return_ball = "";
                var nat_1_string = nat_1.join();
                marketname=nat_1_string;
                market_runner_name=nat_1_string;
                if (nat_1) {
                    for (var j in nat_1) {
                        return_ball += `<img class="ballss" src="../storage/front/img/cards_new/s${nat_1[j]}.png">`;
                    }
                }

            $("#inputStake").val();
            $("#market_runner_label").html(return_ball);
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

            if(nat_1.length == "3"){
                $(".placeBet").attr("id", "placeBet");
                $(".placeBet").attr('disabled', false);
            }
            if(nat_1.length != "3"){
                $(".placeBet").attr('disabled', true);
                $(".placeBet").removeAttr("id", "placeBet");
            }
        }
    });

    jQuery(document).on("click", "#placeBet", function() {

        if (nat_1.length != "3") {
            toastr.clear()
                        toastr.warning("", "Please select any 3 cards", {
                            "timeOut": "3000",
                            "iconClass":"toast-warning",
                            "positionClass":"toast-top-center",
                            "extendedTImeout": "0"
                        });
        
            return true;
        }
        $("#placeBet").html('<i class="fa fa-spinner  fa-spin"></i> Submit');
        $(".placeBet").attr('disabled', true);
        $(".placeBet").removeAttr("id", "placeBet");
        var last_place_bet = "";
        bet_stake_side = $("#bet_stake_side").val();
        bet_type = bet_stake_side;
        bet_event_id = $("#bet_event_id").val();
        bet_marketId = $("#bet_marketId").val();
        oddsmarketId = bet_marketId;
        eventType = 'TEENUNIQUE';
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
                url: '../ajaxfiles/bet_place_teenunique.php',
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
                        toastr.clear()
                        toastr.success("", message, {
                            "timeOut": "3000",
                            "iconClass": "toast-success",
                            "positionClass": "toast-top-center",
                            "extendedTImeout": "0"
                        });
                        $(".uniquebets").show();
                        /*$("#bet-error-class").addClass("b-toast-success");*/
                    } else {
                        toastr.clear()
                        toastr.warning("", message, {
                            "timeOut": "3000",
                            "iconClass": "toast-warning",
                            "positionClass": "toast-top-center",
                            "extendedTImeout": "0"
                        });
                        $(".uniquebets").hide();
                        /*$("#bet-error-class").addClass("b-toast-danger");*/
                    }
                    /*error_message_text = message;
					$("#errorMsgText").text(error_message_text);
					$("#errorMsg").fadeIn('fast').delay(3000).hide(0);*/
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
    <div class="modal-dialog" style="margin:0;">
        <div role="document" id="__BVID__30___BV_modal_content_" tabindex="-1" class="modal-content">
            <header id="__BVID__30___BV_modal_header_" class="modal-header">
                <h5 id="__BVID__30___BV_modal_title_" class="modal-title">Placebet</h5>
                <button type="button" data-dismiss="modal" class="close close-bet-slip">&times;</button>
            </header>
            <div id="__BVID__30___BV_modal_body_" class="modal-body" style="    padding: 0px;">
                <div class="place-bet1 pt-2 pb-2 back place-bet-modal" id="popup_color">
                    <div class="row row5">
                        <div class="col-6"><b id="market_runner_label"></b></div>
                        <div class="col-6 text-right pt-1">Profit: <span id="profitLiability">0</span></div>
                    </div>
                    <div class="odd-stake-box">
                        <div class="row row5 mt-1">
                            <div class="col-6 text-center">Odds</div>
                            <div class="col-6 text-center">Amount</div>
                        </div>
                        <div class="row row5 mt-1">
                            <div class="col-6"><input type="text" id="odds_val" class="stakeinput w-100" disabled="" value="1.7"></div>
                            <div class="col-6">
                                <div class="float-right"><input type="number" id="inputStake" class="stakeinput w-100" value=""></div>
                                <input type='hidden' id='market_runner_label' value='' />
                                <input type='hidden' id='bet_stake_side' value='' /><input type='hidden' id='bet_event_id' value='' /><input type='hidden' id='bet_marketId' value='' /><input type='hidden' id='bet_event_name' value='' /><input type='hidden' id='bet_market_name' value='' /><input type='hidden' id='bet_markettype' value='' /><input type='hidden' id='fullfancymarketrate' value='' /> <input type='hidden' id='oddsmarketId' value='' /><input type='hidden' id='market_runner_name' value='' /><input type='hidden' id='market_odd_name' value='' />
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row row5">
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
                                </div>
                            </div>
                        </div> -->

                    <!--  <div class="row row5 mt-2">
                            <div class="col-4">
                                <input type="number" placeholder="00" id="inputStake" class="stakeinput w-100">
                            </div>
                            <div class="col-4">
                                <button class="btn btn-primary btn-block  placeBet" id="placeBet">
                                    Submit
                                </button>
                            </div>

                        </div> -->
                    <div class="place-bet-buttons mt-1">
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
                        } else {
                            $fetch_button_value_data = mysqli_fetch_assoc($get_button_value);
                            $fetch_button_value = $fetch_button_value_data['casino_button_value'];
                            $default_stake = $fetch_button_value_data['default_stake'];
                            $one_bet_default_stake = $fetch_button_value_data['one_bet_default_stake'];
                            $button_array = explode(",", $fetch_button_value);
                        }
                        foreach ($button_array as $button_value) {
                        ?>
                            <button type="button" class="btn-place-bet btn btn-secondary btn-block1 label_stake" stake='<?php echo $button_value; ?>'>
                                <?php echo $button_value; ?>
                            </button>

                        <?php
                        }
                        ?>
                    </div>
                    <div class="mt-1 place-bet-btn-box">
                        <button class="btn btn-link stackclear">Clear</button>
                        <button class="btn btn-info" data-target="#set_btn_value" data-toggle="modal">Edit</button>
                        <button class="btn btn-danger  close-bet-slip close" data-dismiss="modal">Reset</button>
                        <button class="btn btn-success placeBet" disabled>Place Bet</button>
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