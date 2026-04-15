<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flipclock/0.7.8/flipclock.min.css">
<div class="col-md-12 main-container">
    <style type="text/css">
        .box-w3{
            width: 340px;
            min-width: 340px;
            max-width: 340px;
        }
        span.odd{
            display: block;
        }
        #matched-bet th, #unmatched-bet th{
            min-width: 100px;
        }
        .mtree table td, .mtree table th{
            width: 33.3%;
        }
        #openFancyBook{
        }
        .fancyBookModal .modal-body {
            background: none;
            padding-right: 15px;
        }
        #playStopButton {
            height:30px;
            width:70px;
            font-weight:bold;
            border-radius:8px;
            border:none;
            color:black;
            background-color:lightsteelblue;
            outline:none;
            cursor:pointer;
            font-size:12px;
            font:Arial, Helvetica, sans-serif;
        }
        .coupon-table button span{
            font-size: 14px;
        }
        .coupon-table button span.odd{
            font-size: 14px;
        }
        .result-image img {
            width: 50px;
        }
        /*   CSS FOR FLIPCLOCK   */
        span.flip-clock-divider {
            display: none;
        }
        /*        .clock2digit ul.flip:nth-child(-n+3){
                    display: none;
                }*/
        label.d-inline-block {
            width: 111px;
        }
    </style>
    <div class="listing-grid casino-grid">
        <div class="coupon-card row">
            <div class="col-md-8 main-content">
                <div class="coupon-card">
                    <div class="game-heading">
                        <span class="card-header-title">20-20 Live TeenPatti &nbsp; <small class="teenpatti-rules" data-toggle="modal" data-target="#modalrulesteenpatti"><u>Rules</u></small></span>
                        <span class="float-right">
                            Round ID: <span id="round-id" class="round_no"></span></span>
                    </div>
                    <div style="position: relative;">

<iframe id="casinoIframe" src="" width="100%" height="400" style="border: 0px;"></iframe>
                       <!--  <iframe width="100%" height="400" src="<?php echo IFRAME_URL."".A2020TEENPATTI_CODE; ?>" style="border:0px"></iframe> -->
                        <div class="video-overlay">
                            <div id="game-cards">
                                <div class="card-inner">
                                    <h3 class="text-white">Player A</h3>
                                    <div>
                                        <img id="card_c1" src="../../../storage/front/img/cards/1.png">
                                        <img id="card_c2" src="../../../storage/front/img/cards/1.png">
                                        <img id="card_c3" src="../../../storage/front/img/cards/1.png">
                                    </div>
                                </div>
                                <div class="card-inner">
                                    <h3 class="text-white">Player B</h3>
                                    <div>
                                        <img id="card_c4" src="../../../storage/front/img/cards/1.png">
                                        <img id="card_c5" src="../../../storage/front/img/cards/1.png">
                                        <img id="card_c6" src="../../../storage/front/img/cards/1.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clock clock2digit flip-clock-wrapper">
                            <ul class="flip play">
                                <li class="flip-clock-before">
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
                                            <div class="inn">0</div>
                                        </div>
                                        <div class="down">
                                            <div class="shadow"></div>
                                            <div class="inn">0</div>
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
                    </div>
                    <div class="card-content m-t-5">
                        <div class="fancy-marker-title">
                            <h4>&nbsp;
                                <span class="float-right">Min: <span id="min-bet">100</span> Max: <span id="max-bet">500000</span></span>
                            </h4>
                        </div>
                        <div class=" m-b-10 main-market">
                            <table class="table coupon-table table table-bordered ">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="box-w2 back">Back</th>
                                        <th class="box-w3 back"></th>
                                    </tr>
                                </thead>
                                <tbody id="teenpatti-bdy">
                                    <tr class="bet-info suspended market_1_row market_2_row" data-title="SUSPENDED">
                                        <td><b>Player A</b></td>
                                        <td data-title="SUSPENDED" class=" box-w2 back teen-section" data-sid="1" data-rate="1.98" data-nation="Player A" data-bettype="back"><button class="back"><span class="odd market_1_b_value">0</span><span class="market_1_b_exposure " style="color:black">0</span></button></td>
                                        <td data-title="SUSPENDED" class=" box-w3 back teen-section" data-sid="2" data-rate="2.00" data-nation="Pair plus A" data-bettype="pairplus"><button class="back"><span class="odd">Pair plus A</span><span class="market_2_b_exposure">0</span></button></td>
                                    </tr>
                                    <tr class="bet-info suspended market_4_row market_3_row" data-title="SUSPENDED">
                                        <td><b>Player B</b></td>
                                        <td data-title="SUSPENDED" class=" box-w2 back teen-section" data-sid="3" data-rate="1.98" data-nation="Player B" data-bettype="back"><button class="back"><span class="odd market_3_b_value">0</span><span class="market_3_b_exposure">0</span></button></td>
                                        <td data-title="SUSPENDED" class=" box-w3 back teen-section" data-sid="4" data-rate="2.00" data-nation="Pair plus B" data-bettype="pairplus"><button class="back"><span class="odd">Pair plus B</span><span class="market_4_b_exposure">0</span></button></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div id="commetry" class="text-right text-info"></div>
                        </div>
                    </div>
                    <div class="fancy-marker-title">
                        <h4>Last Result <a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=teen20" class="text-right" style="font-size: 14px; float: right; color: #fff">View All</a></h4>
                    </div>
                    <div class="m-b-10">
                        <p class="text-right" id="last-result">
                        </p>
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
                        <img src="../../../storage/front/img/rules/tp-rules.jpg" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div id="modalpokerresult" class="modal fade show" tabindex="-1">
            <div class="modal-dialog" style="min-width: 650px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">20-20 Teenpatti Result</h4>
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
<script type="text/javascript" src="../../../js/socket.io.js"></script>
<script src="../../../storage/front/js/flipclock.js" type="text/javascript"></script>
<script type="text/javascript">
    var site_url = '<?php echo WEB_URL; ?>';
    var websocketurl = '<?php echo GAME_IP; ?>';
    var clock = new FlipClock($(".clock"), {
        clockFace: "Counter"
    });
    var oldGameId = 0;
    var markettype = "2020TEENPATTI";
    var resultGameLast = 0;
    var event_id = 0;
    function websocket(type) {
        socket = io.connect(websocketurl, {
            transports: ['websocket']
        });
        socket.on('connect', function () {
            socket.emit('Room', 'teen20');
        });
    
    socket.on('gameIframe', function(data){
    	$("#casinoIframe").attr('src',data);
    });
        socket.on('game', function (data) {
            if (data && data['t1'] && data['t1'][0]) {
                oldGameId = data.t1[0].mid;
                if (oldGameId != data.t1[0].mid && oldGameId != 0) {
                    clearCards();
                }
                if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark")
                            .text(data.t1[0].remark);
                    if (data.t1[0].C1 != 1) {
                        $("#card_c1")
                                .attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C1 + ".png");
                    }
                    if (data.t1[0].C2 != 1) {
                        $("#card_c2")
                                .attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C2 + ".png");
                    }
                    if (data.t1[0].C3 != 1) {
                        $("#card_c3")
                                .attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C3 + ".png");
                    }
                    if (data.t1[0].C4 != 1) {
                        $("#card_c4")
                                .attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C4 + ".png");
                    }
                    if (data.t1[0].C5 != 1) {
                        $("#card_c5")
                                .attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C5 + ".png");
                    }
                    if (data.t1[0].C6 != 1) {
                        $("#card_c6")
                                .attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C6 + ".png");
                    }
                }
                clock.setValue(data.t1[0].autotime);
                $(".timer_game")
                        .text("Left Time:" + data.t1[0].autotime);
                $(".round_no")
                        .text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
                $("#casino_event_id")
                        .val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
                eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1];
                var event_id = eventId;
                for (var j in data['t2']) {
                    selectionid = data['t2'][j].sid;
                    runner = data['t2'][j].nation;
                    b1 = data['t2'][j].rate;
                    b1_label = b1;
                    if (selectionid == 2) {
                        b1_label = "Pair Plus A";
                    }
                    if (selectionid == 4) {
                        b1_label = "Pair Plus B";
                    }
                    markettype = "2020TEENPATTI";
                    back_html = '<span class="odds d-block"><b>' + b1_label + '</b></span> <span class="market_' + selectionid + '_b_exposure market_exposure" style="color: green">0</span>';
                    $(".market_" + selectionid + "_b_value").text(b1_label);
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
                    gstatus = data['t2'][j].gstatus.toString();
                    if (gstatus == "SUSPENDED" || parseInt(gstatus) == 0) {
                        $(".market_" + selectionid + "_row")
                                .addClass("suspended");
                    }
                    else {
                        $(".market_" + selectionid + "_row")
                                .removeClass("suspended");
                    }
                }
            }
            else {
                $(".timer_game")
                        .text("Left Time:0");
                $(".round_no")
                        .text("0");
            }
        });
        socket.on('gameResult', function (args) {
            updateResult(args.data);
        });
        socket.on('error', function (data) {
        });
        socket.on('close', function (data) {
        });
    }
    function clearCards() {
        $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c4").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c5").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c6").attr("src", site_url + "storage/front/img/cards/1.png");
    }
    function updateResult(data) {
        if (data && data[0]) {
            resultGameLast = data[0].mid;
            var html = "";
            casino_type = "'teen20'";
            data.forEach(function (runData) {
                eventId = runData.mid == 0 ? 0 : runData.mid.split(".")[1];
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs last-result ' + (runData.result == 1 ? 'playera' : 'playerb') + '">' + (runData.result == 1 ? 'A' : 'B') + '</span>';
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
    teenpatti("ok");</script>
<script>
    
    function view_casiono_result(event_id, casino_type) {
        $("#cards_data").html("");
        $("#round_no").text(event_id);
        $.ajax({
            type: 'POST',
            url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/teen20/' + event_id,
            dataType: 'json',
            data: {event_id: event_id, casino_type: casino_type},
            success: function (response) {
                $('#modalpokerresult').modal('show');
                $("#cards_data1").html(response.result);
            }
        });
    }
    function get_round_no() {
        return $.trim($('.round_no').text());
    }
    $('.last-result').on('click', function () {
        $('#modalpokerresult').modal('show');
    });
    var xhr;
    function call_active_bets() {
        if (get_round_no() > 0) {
            if (xhr && xhr.readyState != 4)
                xhr.abort();
            xhr = $.ajax({
                url: MASTER_URL + '/live-market/teenpatti/active_bets/t20/' + get_round_no(),
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    if (data.results) {
                        $('#table_body').html(data.results);
                        $('#matchedCount').html('(' + data.total_bets + ')');
                    }
                }
            });
        }
    }
    var xhr_vm;
    function call_view_more_bets() {
        if (xhr_vm && xhr_vm.readyState != 4)
            xhr_vm.abort();
        xhr_vm = $.ajax({
            url: MASTER_URL + '/live-market/teenpatti/view_more_matched/t20/' + get_round_no(),
            type: 'POST',
            dataType: 'json',
            data: $('#form-view_more_bets').serialize(),
            success: function (data) {
                if (data.results) {
                    $('#tbody-view_more_matched').html(data.results);
                    $('#modal-view_more').modal('show');
                    $('[data-toggle="tooltip"]').tooltip();
                }
            }
        });
    }
    var xhr_analysis;
    function call_analysis() {
        if (xhr_analysis && xhr_analysis.readyState != 4)
            xhr_analysis.abort();
        xhr_analysis = $.ajax({
            url: MASTER_URL + '/live-market/teenpatti/market_analysis/t20/' + get_round_no(),
            type: 'POST',
            dataType: 'json',
            success: function (data) {
                if (data.results  == 0) {
                    
                    $('.market_1_b_exposure').text(0).css('color', 'black');
                    $('.market_2_b_exposure').text(0).css('color', 'black');
                    $('.market_3_b_exposure').text(0).css('color', 'black');
                    $('.market_4_b_exposure').text(0).css('color', 'black');
                }
                else {
                    $.each(data.results, function (index, value) {
                        var element = $('.market_' + value.market_id + '_b_exposure');
                        $(element).text(value.pl);
                        if (value.pl > 0)
                            $(element).css('color', 'green');
                        else
                            $(element).css('color', 'red');
                    });
                }
            }
        });
    }
    $(function () {
        setTimeout(function () {
            call_active_bets();
            call_analysis();
        }, 2000);
        setInterval(function () {
            call_active_bets();
            call_analysis();
        }, <?php echo CASINO_SET_INTERVAL;  ?>);
        $('#view_more_bets').on('click', function () {
            call_view_more_bets();
        });
        $('#form-view_more_bets').on('submit', function () {
            call_view_more_bets();
            return false;
        });
        $('#btn-view_all_matched').on('click', function () {
            $('#search-client_name').html('');
            setTimeout(function () {
                call_view_more_bets();
            }, 1);
        });
        $('#search-client_name').select2({
            allowClear: true,
            minimumInputLength: 3,
            placeholder: 'select..',
            ajax: {
                url: MASTER_URL + '/reports/common/get_clients',
                data: function (params) {
                    var query = {
                        search: params.term,
                        type: 'public'
                    }
                    return query;
                }
            },
        });
    });
</script>