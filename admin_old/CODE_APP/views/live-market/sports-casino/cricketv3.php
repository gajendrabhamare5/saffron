<link rel="stylesheet" type="text/css" href="<?php echo MASTER_URL; ?>/assets/css/flipclock.css">

<style type="text/css">
    .market-title {
        background-color: var(--theme2-bg85);
        padding: 6px 8px;
        color: var(--secondary-color);
        font-size: 14px;
        font-weight: bold;
    }

    .game-rules-icon,
    .game-rules-icon:hover,
    .game-rules-icon:focus {
        color: #fff;
    }

    .table-header,
    .table-row {
        display: flex;
        display: -ms-flex;
        display: -webkit-flex;
        border-bottom: 1px solid #fff;
    }

    .table-header>div:first-child,
    .table-row>div:first-child {
        padding-left: 5px;
        padding-right: 5px;
    }

    .table-header>div {
        border-bottom: 0;
    }

    .table-header>div,
    .table-row>div {
        padding: 5px 0;
        border: 1px solid #fff;
        border-right: 0;
        border-bottom: 0;
        border-top: 0;
    }

    .team-name,
    .country-name {
        font-size: 14px;
    }

    .table-row {
        background-color: #f2f2f2;
    }

    .suspended {
        position: relative;
        display: flex !important;
    }

    .bookmaker-market .suspended:after {
        width: 60%;
        content: attr(data-title);
        font-size: 16px;
        color: #ff0000;
        font-family: Arial, Verdana, Helvetica, sans-serif;
    }

    .table-row>div .odd {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 1px;
    }

    .table-row>div .odd~span {
        font-size: 10px;
    }

    .suspended:after {
        background-color: rgba(0, 0, 0, 0.6) !important;
    }

    .fancy-market .box-6 {
        width: 54%;
        min-width: 54%;
        max-width: 54%;
    }

    .fancy-market .box-1 {
        width: 13%;
        min-width: 13%;
        max-width: 13%;
    }

    .fancy-market .fancy-tripple {
        border-bottom: 1px solid #fff;
    }

    .fancy-market .suspended:after {
        width: 46%;
        content: attr(data-title);
        font-size: 16px;
        color: #ff0000;
        font-family: Arial, Verdana, Helvetica, sans-serif;
    }

    .table-row>div a {
        color: var(--site-color);
    }

    .scorecard {
        width: 100%;
        padding: 5px;
        position: relative;
        background-repeat: no-repeat;
        background-size: cover;
        color: #fff;
    }

    .scorecard:before {
        content: "";
        background-color: rgba(0, 0, 0, 0.3);
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
    }

    .ball-runs.four {
        background: #087F23;
    }

    .ball-runs.six {
        background: #883997;
    }
</style>
<div class="col-md-12 main-container">
    <div class="listing-grid cardj3 casino-grid">
        <div class="coupon-card row">
            <div class="col-md-8 main-content new-casino race">
                <div class="coupon-card">
                    <div class="game-heading">
                        <span class="card-header-title">
                            AUS vs IND 5Five Cricket
                            <small role="button" class="teenpatti-rules" data-toggle="modal" data-target="#modalrulesteenpatti"><u>Rules</u></small>
                            <!---->
                        </span>
                        <span class="float-right">
                            Round ID:
                            <span class="round_no">0</span>
                            | Min: <span>100.00</span>
                            | Max: <span>300000.00</span></span>
                    </div>
                    <div class="scorecard m-b-5" id="scoreboard-box" style="background-image: url(<?php echo WEB_URL; ?>storage/front/img/scorecard-bg.png);">

                    </div>
                    <div class="video-container" style="position: relative;">

<iframe id="casinoIframe" src="" width="100%" height="400" style="border: 0px;"></iframe>
                       <!--  <iframe width="100%" height="400" src="<?php echo IFRAME_URL . "" . CRICKET5_CODE; ?>" style="border:0px"></iframe> -->
                        <!-- <div class="casino-video-title">
                            <span class="casino-name">AUS vs IND 5Five Cricket</span>
                            <div class="casino-video-rid">Round ID: <span id="round-id" class="round_no"></span></div>
                        </div> -->
                        <div class="video-overlay">
                            <div><img id="card_c1" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png"></div>
                            <div><img id="card_c2" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png"></div>
                            <div><img id="card_c3" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png"></div>
                            <div><img id="card_c4" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png"></div>
                            <div><img id="card_c5" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png"></div>
                            <div><img id="card_c6" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png"></div>
                        </div>
                        <div class="clock clock2digit flip-clock-wrapper"></div>
                        <div id="result-desc" style="display: none;"></div>
                    </div>

                    <div class="markets">
                        <div class="bookmaker-market">
                            <div class="market-title mt-1">
                                Bookmaker market
                                <a href="javascript:void(0)" class="m-r-5 game-rules-icon"><span><i class="fa fa-info-circle float-right"></i></span></a>
                            </div>
                            <div class="table-header">
                                <div class="float-left country-name box-4 text-info"></div>
                                <div class="box-1 float-left"></div>
                                <div class="box-1 float-left"></div>
                                <div class="back box-1 float-left text-center"><b>BACK</b></div>
                                <div class="lay box-1 float-left text-center"><b>LAY</b></div>
                                <div class="box-1 float-left"></div>
                                <div class="box-1 float-left"></div>
                            </div>
                            <div class="table-body">
                                <div class="table-row suspended market_1_row">
                                    <div class="float-left country-name box-4">
                                        <span class="team-name"><b>AUS</b></span>
                                        <p><span class="float-left market_1_b_exposure market_exposure" style="color: black;">0</span> <span class="float-right" style="display: none; color: black;">0</span></p>
                                    </div>
                                    <div class="box-1 back2 float-left text-center">
                                        <!---->
                                    </div>
                                    <div class="box-1 back1 float-left back-2 text-center">
                                        <!---->
                                    </div>
                                    <div class="box-1 back float-left back lock text-center betting-disabled  market_1_b_btn back-1">
                                        <!---->
                                    </div>
                                    <div class="box-1 lay float-left text-center betting-disabled  market_1_l_btn lay-1">
                                        <!---->
                                    </div>
                                    <div class="box-1 lay1 float-left text-center">
                                        <!---->
                                    </div>
                                    <div class="box-1 lay2 float-left text-center">
                                        <!---->
                                    </div>
                                </div>
                                <div class="table-row suspended market_2_row">
                                    <div class="float-left country-name box-4">
                                        <span class="team-name"><b>IND</b></span>
                                        <p><span class="float-left market_2_b_exposure market_exposure" style="color: black;">0</span> <span class="float-right" style="display: none; color: black;">0</span></p>
                                    </div>
                                    <div class="box-1 back2 float-left text-center">
                                        <!---->
                                    </div>
                                    <div class="box-1 back1 float-left back-2 text-center">
                                        <!---->
                                    </div>
                                    <div class="box-1 back float-left back lock text-center betting-disabled  market_2_b_btn back-1">
                                        <!---->
                                    </div>
                                    <div class="box-1 lay float-left text-center betting-disabled  market_2_l_btn lay-1">
                                        <!---->
                                    </div>
                                    <div class="box-1 lay1 float-left text-center">
                                        <!---->
                                    </div>
                                    <div class="box-1 lay2 float-left text-center">
                                        <!---->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fancy-market row row5" style="display: none;">
                            <div class="col-6">
                                <div>
                                    <div class="market-title mt-1">
                                        Fancy Market
                                        <!-- <a href="javascript:void(0)" class="m-r-5 game-rules-icon"><span><i class="fa fa-info-circle float-right"></i></span></a> -->
                                    </div>
                                    <div class="table-header">
                                        <div class="float-left country-name box-6"></div>
                                        <div class="box-1 float-left lay text-center"><b>No</b></div>
                                        <div class="back box-1 float-left back text-center"><b>Yes</b></div>
                                        <div class="box-2 float-left"></div>
                                    </div>
                                    <div class="table-body">
                                        <div class="fancy-tripple">

                                        </div>
                                    </div>
                                    <div></div>
                                </div>
                            </div>
                            <!---->
                        </div>
                    </div>

                    <div class="fancy-marker-title">
                        <h4>Last Result <a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=cricketv3" class="text-right" style="font-size: 14px; float: right; color: #fff">View All</a></h4>
                    </div>
                    <div class="m-b-10">
                        <p class="ball-by-ball row m-t-10"></p>
                        <p id="last-result" class="text-right"></p>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 sidebar-right" id="sidebar-right">
                <div class="card m-b-10 scorecard" style="margin-bottom: 0px;">
                    <div class="card m-b-10 my-bet">
                        <div class="card-header">
                            <ul class="nav nav-tabs d-inline-block" role="tablist ">
                                <li class="nav-item d-inline-block">
                                    <a class="nav-link active " data-toggle="tab" href="#matched-bet">Matched <span id="matchedCount">(0)</span></a>
                                </li>
                            </ul>
                            <a href="javascript:void(0)" class="btn btn-back float-right" id="view_more_bets">View More</a>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div id="matched-bet" class="tab-pane active">
                                    <div class="table-responsive">
                                        <table id="matched" class="table coupon-table table-bordered table-stripted">
                                            <thead>
                                                <tr>
                                                    <th>UserName</th>
                                                    <th style="min-width: 140px">Nation</th>
                                                    <th style="min-width: 50px">Rate</th>
                                                    <th>Amount</th>
                                                    <th>PlaceDate</th>
                                                    <th>MatchDate</th>
                                                    <th style="min-width:70px">Gametype</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table_body">
                                                <tr class="">
                                                    <td colspan="100%" align="center">Loading</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="userwise">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Active User</h4>
                        <button type="button" class="close" data-dismiss="modal">�</button>
                    </div>
                    <div class="modal-body">
                        <div class="usertypewiseactive-container"></div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="view-more">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">View More Bet</h4>
                        <button type="button" class="close" data-dismiss="modal">�</button>
                    </div>
                    <div class="modal-body">
                        <div class="viewMoreMatchedDataModal"></div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <div id="modalrulesteenpatti" class="modal fade teenpatti">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Rules</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <img src="../../../storage/front/img/rules/cricketv3.jpeg" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div id="modalpokerresult" class="modal fade show" tabindex="-1">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">AUS vs IND 5Five Cricket Result</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" id="cards_data1">
                        <div>
                            <h6 class="text-right round-id">
                                <b>Round Id:</b>
                            </h6>
                            <div class="row">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-view_more">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View More Bet</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="viewMoreMatchedDataModal">
                    <ul class="nav nav-tabs d-inline-block" role="tablist ">
                        <li class="nav-item d-inline-block">
                            <a class="nav-link  active " data-toggle="tab" href="#matched-bet2" id="matchedDataLink">Matched Bets</a>
                        </li>
                        <li class="nav-item d-inline-block">
                            <a class="nav-link " data-toggle="tab" href="#unmatched-bet2" id="unMatchedDataLink">Unmatched Bets</a>
                        </li>
                        <li class="nav-item d-inline-block">
                            <a class="nav-link " data-toggle="tab" href="#deleted-bet2" id="deletedMatchedDataLink">Deleted Bets</a>
                        </li>
                    </ul>
                    <div class="tab-content m-t-20">
                        <div id="matched-bet2" class="tab-pane active">
                            <form method="POST" id="form-view_more_bets">
                                <div class="row form-inline">
                                    <div class="col-md-5">
                                        <div class="form-group m-t-20">
                                            <label for="list-ac" class="d-inline-block">Client Name</label>
                                            <select class="form-control" name="search-client_name" id="search-client_name" id="" style="width: 160px;"></select>
                                        </div>
                                        <div class="form-group m-t-20">
                                            <label class="d-inline-block">IP Address</label>
                                            <input type="text" name="search-ipaddress" id="search-ipaddress" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group m-t-20">
                                            <label class="d-inline-block">Amount</label>
                                            <input type="text" name="search-amount_min" id="search-amount_min" class="form-control" placeholder="Min">
                                            <input type="text" name="search-amount_max" id="search-amount_max" class="form-control m-l-10" placeholder="Max">
                                        </div>
                                        <div class="form-group m-t-20">
                                            <label class="d-inline-block">Type</label>
                                            <select name="search-bettype" class="form-control d-inline-block" id="search-bettype">
                                                <option value="">All</option>
                                                <option value="back">Back</option>
                                                <option value="lay">Lay</option>
                                            </select>
                                            <button class="btn btn-back m-l-10" id="btn-search" type="submit">Search</button>
                                            <button type="reset" class="btn btn-back m-l-10" id="btn-view_all_matched">View All</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive m-t-20">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>UserName</th>
                                            <th>Nation</th>
                                            <th>Bet Type</th>
                                            <th>Amount</th>
                                            <th>User Rate</th>
                                            <th>Place Date</th>
                                            <th>Match Date</th>
                                            <th>IP</th>
                                            <th>Browser Details</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody-view_more_matched">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="unmatched-bet2" class="tab-pane">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>UserName</th>
                                            <th>Nation</th>
                                            <th>Bet Type</th>
                                            <th>Amount</th>
                                            <th>User Rate</th>
                                            <th>Place Date</th>
                                            <th>Match Date</th>
                                            <th>IP</th>
                                            <th>Browser Details</th>
                                        </tr>
                                    </thead>
                                    <tbody id="">
                                        <tr>
                                            <td colspan="100%" align="center">No Record Found!..</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="deleted-bet2" class="tab-pane">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>UserName</th>
                                            <th>Nation</th>
                                            <th>Bet Type</th>
                                            <th>Amount</th>
                                            <th>User Rate</th>
                                            <th>Place Date</th>
                                            <th>Match Date</th>
                                            <th>IP</th>
                                            <th>Browser Details</th>
                                        </tr>
                                    </thead>
                                    <tbody id="">
                                        <tr>
                                            <td colspan="100%" align="center">No Record Found!..</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo WEB_URL; ?>/js/socket.io.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/js/flipclock.js" type="text/javascript"></script>


<script type="text/javascript">
    var GAME_ID = "";
    //var SCOREBOARD_SOCKET_URL = "wss://sportsscore24.com";
    var SCOREBOARD_URL = "wss://sportsscore24.com/";
    var ssocket = null;
    var socketScoreBoard;


    function scoreboardConnect() {
        socketScoreBoard = io.connect(SCOREBOARD_URL, {
            transports: ['websocket']
        });
        console.log(1);
        socketScoreBoard.on("connect", function() {
            console.log(2);
            socketScoreBoard.emit("subscribe", {
                type: 1,
                rooms: [parseInt(GAME_ID)]
            });
        });
        socketScoreBoard.on("error", function(abc) {
            console.log(abc);
        });
        socketScoreBoard.on("update", function(response) {
            console.log(response);
            if (
                response.data != undefined &&
                response.data != null &&
                response.data.isfinished == 1
            ) {
                socketScoreBoard.emit("unsubscribe", {
                    type: 1,
                    rooms: []
                });
                // $("#scoreboard-box").html("");
            } else {
                if (response.data != undefined && response.data != null) {
                    //self.scoreboardData = response.data;
                    updateScoreBoard(response.data);
                } else {
                    $("#scoreboard-box").html("");
                }
            }
        });
        socketScoreBoard.on("disconnect", function() {
            // console.log("disconnect");
        });
    }

    function updateScoreBoard(data) {

        if (data.isfinished == "1") {
            $("#scoreboard-box").hide();
            return;
        } else {
            $("#scoreboard-box").show();
        }

        var scoreboardStr = "";
        scoreboardStr += "<div class=\"scorecard scorecard-mobile\"><div data-v-68a8f00a='' class='score-inner'>";
        scoreboardStr += "    <div class=\"row\">";
        scoreboardStr += "        <span class=\"team-name col-2\">" + data.spnnation1 + "<\/span>";
        scoreboardStr += "        <span class=\"score col-6\">" + data.score1 + "<\/span>";
        scoreboardStr += "<span class=\"col-2 run-rate\">";
        if (data.spnrunrate1 != null && data.spnrunrate1 != "") {
            scoreboardStr += "CRR " + data.spnrunrate1;
        }
        scoreboardStr += "<\/span>";
        scoreboardStr += "<span class=\"col-2 run-rate\">";
        if (data.spnreqrate1 != null && data.spnreqrate1 != "") {
            scoreboardStr += " RR " + data.spnreqrate1;
        }
        scoreboardStr += "<\/span>";
        scoreboardStr += "    <\/div>";
        scoreboardStr += "    <div class=\"row m-t-10\">";
        scoreboardStr += "        <span class=\"team-name col-2\">" + data.spnnation2 + "<\/span>";
        scoreboardStr += "        <span class=\"score col-6\">" + data.score2 + "<\/span>";
        scoreboardStr += "        <span class=\"col-2 run-rate\">";
        if (data.spnrunrate2 != null && data.spnrunrate2 != "") {
            scoreboardStr += "CRR " + data.spnrunrate2;
        }
        scoreboardStr += "<\/span>";
        scoreboardStr += "        <span class=\"col-2 run-rate\">";
        if (data.spnreqrate2 != null && data.spnreqrate2 != "") {
            scoreboardStr += " RR " + data.spnreqrate2;
        }
        scoreboardStr += "<\/span>";
        scoreboardStr += "    <\/div>";
        scoreboardStr += "    <div class=\"row\">";
        scoreboardStr += "        <div class=\"col-6 m-t-10\">";
        if (data.spnballrunningstatus != "") {
            scoreboardStr += "<p>";
            if (data.dayno != "") {
                scoreboardStr += "<span>Day " + data.dayno + "<\/span> | ";
            }
            scoreboardStr += data.spnballrunningstatus + "<\/p>";
        } else if (data.spnmessage != "") {
            scoreboardStr += "<p>";
            if (data.dayno != "") {
                scoreboardStr += "<span>Day " + data.dayno + "<\/span> | ";
            }
            scoreboardStr += data.spnmessage + "<\/p>";
        }

        scoreboardStr += "        <\/div>";
        scoreboardStr += "        <div class=\"col-6 ball-runs-container m-t-5\">";
        scoreboardStr += "            <p class=\"text-right ball-by-ball\">";
        $.each(data.balls, function(key, ballVal) {
            if (ballVal != "") {
                var b_class = "";
                if (ballVal == '4') {
                    b_class = "four";
                } else if (ballVal == '6') {
                    b_class = "six";
                } else if (ballVal == 'ww') {
                    b_class = "wicket";
                }
                scoreboardStr += "<span class=\"ball-runs " + b_class + "\">" + ballVal + "<\/span> ";
            }
        });
        scoreboardStr += "            <\/p>";
        scoreboardStr += "        <\/div>";
        scoreboardStr += "    <\/div>";
        scoreboardStr += "<\/div><\/div>";
        $("#scoreboard-box").html(scoreboardStr);
        return;
    }

    var site_url = '<?php echo WEB_URL; ?>';
    var websocketurl = '<?php echo GAME_IP; ?>';
    var clock = new FlipClock($(".clock"), {
        clockFace: "Counter"
    });
    var oldGameId = 0;
    var resultGameLast = 0;
    var data6;
    var markettype = "FIVE_5_CRICKET";
    var last_result_id = '0';

    function websocket(type) {
        socket = io.connect(websocketurl, {
            transports: ['websocket']
        });
        socket.on('connect', function() {
            socket.emit('Room', 'cricketv3');
        });
    
    socket.on('gameIframe', function(data){
    	$("#casinoIframe").attr('src',data);
    });

        socket.on('game', function(data) {
            if (data && data['t1'] && data['t1'][0]) {
                if (oldGameId != data.t1[0].mid && oldGameId != 0) {
                    setTimeout(function() {
                        clearCards();
                    }, <?php echo CASINO_RESULT_TIMEOUT; ?>);
                }
                if (oldGameId != data.t1[0].mid) {
                    GAME_ID = data.t1[0].mid.split('.');
                    GAME_ID = GAME_ID[1];
                    scoreboardConnect();
                }
                oldGameId = data.t1[0].mid;
                if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark").text(data.t1[0].remark);
                    var desc = data.t1[0].desc;

                    $("#card_c1").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C1 + ".png");
                    $("#card_c2").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C2 + ".png");
                    $("#card_c3").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C3 + ".png");
                    $("#card_c4").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C4 + ".png");
                    $("#card_c5").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C5 + ".png");
                    $("#card_c6").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C6 + ".png");


                }
                clock.setValue(data.t1[0].autotime);
                $(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
                $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
                eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1];

                for (var j in data['t2']) {
                    selectionid = parseInt(data['t2'][j].sid);
                    runner = data['t2'][j].nat || data['t2'][j].nation || data['t2'][j].nat || data['t2'][j].nation;
                    b1 = data['t2'][j].b1;
                    bs1 = data['t2'][j].bs1;
                    l1 = data['t2'][j].l1;
                    ls1 = data['t2'][j].ls1;

                    b11 = b1;
                    markettype = "FIVE_5_CRICKET";

                    b1 = b1 == 0 ? "" : b1;
                    bs1 = bs1 == 0 ? "" : bs1;

                    l1 = l1 == 0 ? "" : l1;
                    ls1 = ls1 == 0 ? "" : ls1;


                    back_html = '<span class="odd d-block">' + b1 + '</span><span class="d-block">' + bs1 + '</span>';


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


                    lay_html = '<span class="odd d-block">' + l1 + '</span><span class="d-block">' + ls1 + '</span>';


                    $(".market_" + selectionid + "_l_btn").attr("side", "Lay");
                    $(".market_" + selectionid + "_l_btn").attr("selectionid", selectionid);
                    $(".market_" + selectionid + "_l_btn").attr("marketid", selectionid);
                    $(".market_" + selectionid + "_l_btn").attr("runner", runner);
                    $(".market_" + selectionid + "_l_btn").attr("marketname", runner);
                    $(".market_" + selectionid + "_l_btn").attr("eventid", eventId);
                    $(".market_" + selectionid + "_l_btn").attr("markettype", markettype);
                    $(".market_" + selectionid + "_l_btn").attr("event_name", markettype);
                    $(".market_" + selectionid + "_l_btn").attr("fullmarketodds", l1);
                    $(".market_" + selectionid + "_l_btn").attr("fullfancymarketrate", l1);
                    $(".market_" + selectionid + "_l_btn").html(lay_html);

                    gstatus = data['t2'][j].status.toString();
                    if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {
                        $(".market_" + selectionid + "_row").attr("data-title", 'suspended');
                        $(".market_" + selectionid + "_row").addClass("suspended");

                        $(".market_" + selectionid + "_b_btn").removeClass("back-1");
                        $(".market_" + selectionid + "_b_btn").addClass("betting-disabled");
                        $(".market_" + selectionid + "_l_btn").removeClass("lay-1");
                        $(".market_" + selectionid + "_l_btn").addClass("betting-disabled");
                    } else {

                        $(".market_" + selectionid + "_row").removeAttr("data-title");
                        $(".market_" + selectionid + "_row").removeClass("suspended");
                        $(".market_" + selectionid + "_b_btn").addClass("back-1");
                        $(".market_" + selectionid + "_b_btn").removeClass("betting-disabled");
                        $(".market_" + selectionid + "_l_btn").addClass("lay-1");
                        $(".market_" + selectionid + "_l_btn").removeClass("betting-disabled");
                    }
                }

                if (data['t3'] != null) {
                    for (var f in data['t3']) {
                        selectionid = parseInt(data['t3'][f].sid);
                        runner = data['t3'][f].nat;
                        b1 = data['t3'][f].b1;
                        bs1 = data['t3'][f].bs1;
                        l1 = data['t3'][f].l1;
                        ls1 = data['t3'][f].ls1;

                        b1 = b1 == 0 ? "" : parseInt(b1);
                        bs1 = bs1 == 0 ? "" : parseInt(bs1);

                        l1 = l1 == 0 ? "" : parseInt(l1);
                        ls1 = ls1 == 0 ? "" : parseInt(ls1);


                        is_suspended = '';
                        gstatus = data['t3'][f].status.toString();
                        if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {
                            is_suspended = 'suspended';
                        }
                        var fancy_data = '';


                        back_html = '<span class="odd d-block">' + b1 + '</span><span>' + bs1 + '</span>';
                        lay_html = '<span class="odd d-block">' + l1 + '</span><span>' + ls1 + '</span>';

                        if ($("#five_fancy_" + selectionid) && $("#five_fancy_" + selectionid).length > 0) {


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

                            $(".market_" + selectionid + "_l_btn").attr("side", "Lay");
                            $(".market_" + selectionid + "_l_btn").attr("selectionid", selectionid);
                            $(".market_" + selectionid + "_l_btn").attr("marketid", selectionid);
                            $(".market_" + selectionid + "_l_btn").attr("runner", runner);
                            $(".market_" + selectionid + "_l_btn").attr("marketname", runner);
                            $(".market_" + selectionid + "_l_btn").attr("eventid", eventId);
                            $(".market_" + selectionid + "_l_btn").attr("markettype", markettype);
                            $(".market_" + selectionid + "_l_btn").attr("event_name", markettype);
                            $(".market_" + selectionid + "_l_btn").attr("fullmarketodds", l1);
                            $(".market_" + selectionid + "_l_btn").attr("fullfancymarketrate", l1);
                            $(".market_" + selectionid + "_l_btn").html(lay_html);

                            if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {
                                $(".market_" + selectionid + "_row").attr("data-title", 'suspended');
                                $(".market_" + selectionid + "_row").addClass("suspended");

                                $(".market_" + selectionid + "_b_btn").removeClass("back-1");
                                $(".market_" + selectionid + "_b_btn").addClass("betting-disabled");
                                $(".market_" + selectionid + "_l_btn").removeClass("lay-1");
                                $(".market_" + selectionid + "_l_btn").addClass("betting-disabled");
                            } else {

                                $(".market_" + selectionid + "_row").removeAttr("data-title");
                                $(".market_" + selectionid + "_row").removeClass("suspended");
                                $(".market_" + selectionid + "_b_btn").addClass("back-1");
                                $(".market_" + selectionid + "_b_btn").removeClass("betting-disabled");
                                $(".market_" + selectionid + "_l_btn").addClass("lay-1");
                                $(".market_" + selectionid + "_l_btn").removeClass("betting-disabled");
                            }
                        } else {
                            fancy_data += '	<div id="five_fancy_' + selectionid + '" data-title="' + is_suspended + '" class="table-row ' + is_suspended + ' market_' + selectionid + '_row">';
                            fancy_data += '		<div class="float-left country-name box-6" style="border-bottom: 0px;">';
                            fancy_data += '  		<p class="m-b-0"><a href="javascript:void(0)">' + runner + '</a></p>';
                            fancy_data += '				<p class="m-b-0"><span style="color: black;" class="market_' + selectionid + '_b_exposure market_exposure">0</span></p>';
                            fancy_data += '		</div>';

                            fancy_data += '		<div class="box-1 lay float-left text-center betting-disabled market_' + selectionid + '_l_btn lay-1">' + lay_html + '</div>';

                            fancy_data += '     <div class="box-1 back float-left text-center betting-disabled market_' + selectionid + '_b_btn back-1">' + back_html + '</div>';
                            fancy_data += '		<div class="box-2 float-left text-right min-max" style="border-bottom: 0px;"></div>';
                            fancy_data += '	</div>';
                        }




                        /* $(".fancy-market").show(); */
                    }

                    if (fancy_data != "") {
                        $(".fancy-tripple").html(fancy_data);
                    }
                } else {
                    $(".fancy-tripple").html("");
                    $(".fancy-market").hide();
                }

            }
        });

        socket.on('gameResult', function(args) {
            updateResult(args.data);
        });
        socket.on('error', function(data) {});
        socket.on('close', function(data) {});
    }

    function teenpatti(type) {
        gameType = type
        websocket();
    }

    function getType(data) {
        var data1 = data;
        if (data) {
            data = data.split('SS');
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
                data = data.split('DD');
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
                    data = data.split('HH');
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


    function clearCards() {

        $("#card_c1").attr("storage/front/img/cards/1.png");
        $("#card_c2").attr("storage/front/img/cards/1.png");
        $("#card_c3").attr("storage/front/img/cards/1.png");
        $("#card_c4").attr("storage/front/img/cards/1.png");
        $("#card_c5").attr("storage/front/img/cards/1.png");
        $("#card_c6").attr("storage/front/img/cards/1.png");
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
            casino_type = "'cricketv3'";
            data.forEach((runData) => {
                if (parseInt(runData.result) == 1) {
                    ab = "playera";
                    ab1 = "A";

                } else if (parseInt(runData.result) == 2) {
                    ab = "playerb";
                    ab1 = "I";

                } else {
                    ab = "playertie";
                    ab1 = "T";
                }

                eventId = runData.mid == 0 ? 0 : runData.mid.split(".")[1];
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs  ' + ab + ' last-result">' + ab1 + '</span>';
            });


            $("#last-result").html(html);
            if (oldGameId == 0 || oldGameId == resultGameLast) {

            }
        }
    }
    teenpatti("ok");
</script>
<script>
    function view_casiono_result(event_id, casino_type) {

        $("#cards_data").html("");
        $("#round_no").text(event_id);
        $.ajax({
            type: 'POST',
            url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/cricketv3/' + event_id,
            dataType: 'json',
            data: {
                event_id: event_id,
                casino_type: casino_type
            },
            success: function(response) {
                $('#modalpokerresult').modal('show');
                $("#cards_data1").html(response.result);
            }
        });
    }
</script>