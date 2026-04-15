<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flipclock/0.7.8/flipclock.min.css">
<div class="col-md-12 main-container">
    <style type="text/css">
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
        .video-overlay{
            right: 0;
            left: auto;
        }
    </style>
    <div class="listing-grid casino-grid">
        <div class="coupon-card row">
            <div class="col-md-8 main-content">
                <div class="coupon-card">
                    <div class="game-heading">
                        <span class="card-header-title">ODI Live TeenPatti &nbsp; <small class="teenpatti-rules" data-toggle="modal" data-target="#modalrulesteenpatti"><u>Rules</u></small></span>
                        <span class="float-right">
                            Round ID: <span id="round-id" class="round_no">0</span></span>
                    </div>
                    <div style="position: relative;">
                        <iframe width="100%" height="400" src="<?php echo IFRAME_URL."".ODITEENPATTI_CODE; ?>" style="border:0px"></iframe>
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
                                        <th class="back box-w1">Back</th>
                                        <th class="lay box-w1">lay</th>
                                        <th class="box-w2"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bet-info suspended market_1_row" data-title="SUSPENDED">
                                        <td>
                                            <i class="fas fa-chart-bar"></i><span class="team-name">Player A</span>
                                            <p class="box-w4"><span class="float-left" id="player_a_pl" style="color: green;">0</span></p>
                                        </td>
                                        <td class="box-w1 back text-center market_1_b_btn">
                                            <button class="back">
                                                <span class="odd">0</span><span>0</span>
                                            </button>
                                        </td>
                                        <td class="box-w1 lay text-center market_1_l_btn"><button class="lay"><span class="odd">0</span><span>0</span></button></td>
                                        <td class="text-right p-r-10 box-w2" style="padding-right: 5px"><span class="d-block">Min:100.00</span><span class="d-block">Max:500000.00</span></td>
                                    </tr>
                                    <tr class="bet-info suspended market_2_row" data-title="SUSPENDED">
                                        <td>
                                            <i class="fas fa-chart-bar"></i><span class="team-name">Player B</span>
                                            <p class="box-w4"><span class="float-left" id="player_b_pl" style="color: green;">0</span></p>
                                        </td>
                                        <td class="box-w1 back text-center market_2_b_btn"><button class="back"><span class="odd">49</span><span>1000000</span></button></td>
                                        <td class="box-w1 lay text-center market_2_l_btn"><button class="lay"><span class="odd">52</span><span>1000000</span></button></td>
                                        <td class="text-right p-r-10 box-w2" style="padding-right: 5px"><span class="d-block">Min:100.00</span><span class="d-block">Max:500000.00</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div id="commetry" class="text-right text-info"></div>
                        </div>
                    </div>
                    <div class="fancy-marker-title">
                        <h4>Last Result <a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=teenOdi" class="text-right" style="font-size: 14px; float: right; color: #fff">View All</a></h4>
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
                        <button type="button" class="close" data-dismiss="modal">×</button>
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
                        <button type="button" class="close" data-dismiss="modal">×</button>
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
        <div id="modalpokerresult" class="modal fade show" tabindex='-1'>
            <div class="modal-dialog" style="min-width: 650px">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">1 Day Teenpatti Result</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body nopading" id="cards_data1" style="min-height: 300px"></div>
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
    var resultGameLast = 0;
    var selectionid = "";
    var runner = "";
    var b1 = "";
    var bs1 = "";
    var l1 = "";
    var ls1 = "";
    var markettype = "ODITEENPATTI";
    var back_html = "";
    var lay_html = "";
    var gstatus = "";
    function websocket(type) {
        socket = io.connect(websocketurl, {
            transports: ['websocket']
        });
        socket.on('connect', function () {
            socket.emit('Room', 'Teen');
        });
        socket.on('game', function (data) {
			data = data.bf;
            if (data && data[0]) {
                oldGameId = data[0].marketId;
                if (data[0].marketId != 0 && data[0].marketId != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark")
                            .text(data[0].remark);
                    if (data[0].C1 != 1) {
                        $("#card_c1").attr("src", site_url + "storage/front/img/cards/" + data[0].C1 + ".png");
                    }
                    if (data[0].C2 != 1) {
                        $("#card_c2").attr("src", site_url + "storage/front/img/cards/" + data[0].C2 + ".png");
                    }
                    if (data[0].C3 != 1) {
                        $("#card_c3").attr("src", site_url + "storage/front/img/cards/" + data[0].C3 + ".png");
                    }
                    if (data[1].C1 != 1) {
                        $("#card_c4").attr("src", site_url + "storage/front/img/cards/" + data[1].C1 + ".png");
                    }
                    if (data[1].C2 != 1) {
                        $("#card_c5").attr("src", site_url + "storage/front/img/cards/" + data[1].C2 + ".png");
                    }
                    if (data[1].C3 != 1) {
                        $("#card_c6").attr("src", site_url + "storage/front/img/cards/" + data[1].C3 + ".png");
                    }
                }
                clock.setValue(data[0].lasttime);
                $(".round_no").text(data[0].marketId == 0 ? 0 : data[0].marketId.split(".")[1]);
                $("#casino_event_id").val(data[0].marketId == 0 ? 0 : data[0].marketId.split(".")[1]);
                eventId = data[0].marketId == 0 ? 0 : data[0].marketId.split(".")[1];
                for (var j in data) {
                    selectionid = data[j].sectionId;
                    runner = data[j].nation;
                    b1 = data[j].b1;
                    bs1 = data[j].bs1;
                    l1 = data[j].l1;
                    ls1 = data[j].ls1;
                    back_html = '<span class="odds d-block"><b>' + b1 + '</b></span> <span style="color: black;">' + bs1 + '</span>';
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
                    $(".market_" + selectionid + "_l_btn").html(lay_html);

                    gstatus = data[j].gstatus.toString();
                    if (gstatus == "SUSPENDED" || gstatus == "0") {
                        $(".market_" + selectionid + "_row").addClass("suspended");
                    }
                    else {
                        $(".market_" + selectionid + "_row").removeClass("suspended");
                    }
                }
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
        data = JSON.parse(JSON.stringify(data));
        resultGameLast = data[0].mid;
        var html = "";
        casino_type = "'teenOdi'";
        data.forEach(function (runData) {

            eventId = runData.mid == 0 ? 0 : runData.mid.split(".")[1];
            html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs last-result ml-1 ' + (parseInt(runData.result) == 1 ? 'playera' : 'playerb') + '">' + (parseInt(runData.result) == 1 ? 'A' : 'B') + '</span>';
        }
        );
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

    function teenpatti(type) {
        gameType = type
        websocket();
    }
    teenpatti("ok");

    function view_casiono_result(event_id, casino_type) {

        $("#cards_data").html("");
        $("#round_no").text(event_id);

        $.ajax({
            type: 'POST',
            url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/teenOdi/' + event_id,
            dataType: 'json',
            data: {event_id: event_id, casino_type: casino_type},
            success: function (response) {
                $('#modalpokerresult').modal('show');
                $("#cards_data1").html(response.result);
            }
        });
    }
</script>

<script>
    var xhr;

    function get_round_no() {
        return $.trim($('.round_no').text());
    }
    function call_active_bets() {

        if (get_round_no() !== 0) {

            if (xhr && xhr.readyState != 4)
                xhr.abort();
            xhr = $.ajax({
                url: '<?php echo MASTER_URL; ?>/live-market/teenpatti/active_bets/odi/' + get_round_no(),
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
        else {
            $('#table_body').html('');
            $('#matchedCount').html('(0)');
        }
    }

    var xhr_vm;
    function call_view_more_bets() {
        if (xhr_vm && xhr_vm.readyState != 4)
            xhr_vm.abort();
        xhr_vm = $.ajax({
            url: '<?php echo MASTER_URL; ?>/live-market/teenpatti/view_more_matched/odi/' + get_round_no(),
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
            url: '<?php echo MASTER_URL; ?>/live-market/teenpatti/market_analysis/odi/' + get_round_no(),
            type: 'POST',
            dataType: 'json',
            success: function (data) {
                if (data.results) {
                    if (data.results[1] !== undefined) {
                        var player_a_pl = data.results[1].pl;
                        var player_b_pl = data.results[2].pl;

                        if (player_a_pl > 0) {
                            $('#player_a_pl').css('color', 'green');
                        }
                        else {
                            $('#player_a_pl').css('color', 'red');
                        }

                        if (player_b_pl > 0) {
                            $('#player_b_pl').css('color', 'green');
                        }
                        else {
                            $('#player_b_pl').css('color', 'red');
                        }

                        $('#player_a_pl').text(player_a_pl);
                        $('#player_b_pl').text(player_b_pl);
                    }
                    else {
                        $('#player_a_pl').css('color', 'green');
                        $('#player_b_pl').css('color', 'green');
                        $('#player_a_pl').text('0');
                        $('#player_b_pl').text('0');
                    }
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
                url: '<?php echo MASTER_URL; ?>/reports/common/get_clients',
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