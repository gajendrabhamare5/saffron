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
        /*        .card-icon
                {
                    font-family: Card Characters !important;
                    display: inline-block;
                    text-align: right;
                    width: 35px;
                    font-size: 14px;
                }*/
        /*        .card-red
                {
                    color: #ff0000;
                    font-size: 16px;
                }
                .card-black
                {
                    color: #000;
                    font-size: 16px;
                }*/

        .box-1
        {
            width: 10%;
            min-width: 10%;
            max-width: 10%;
        }
        .box-2
        {
            width: 20%;
            min-width: 20%;
            max-width: 20%;
        }
        .box-3
        {
            width: 30%;
            min-width: 30%;
            max-width: 30%;
        }
        .box-4
        {
            width: 40%;
            min-width: 40%;
            max-width: 40%;
        }
        .box-5
        {
            width: 50%;
            min-width: 50%;
            max-width: 50%;
        }
        .box-6
        {
            width: 60%;
            min-width: 60%;
            max-width: 60%;
        }
        .box-7
        {
            width: 70%;
            min-width: 70%;
            max-width: 70%;
        }
        .box-8
        {
            width: 80%;
            min-width: 80%;
            max-width: 80%;
        }
        .box-9
        {
            width: 90%;
            min-width: 90%;
            max-width: 90%;
        }
        .box-10
        {
            width: 100%;
            min-width: 100%;
            max-width: 100%;
        }
        .suspended:after{
            width: 60%;
        }
        .suspendedtd:after{
            width: 100%;
        }

        /*.modal-lg {
            max-width: 800px;
        }*/

        .bet-note
        {
            text-align: center;
            padding: 10px;
        }
        .bet-note span
        {
            font-weight: bold;
            font-style: italic;
            font-size: 1.2rem;
            vertical-align: middle;
        }

        .ball-runs {
            background: #355e3b;
            color: #ff3;
        }
        .last-result {
            cursor: pointer;
        }
    </style>
    <div class="listing-grid casino-grid">
        <div class="coupon-card row">
            <div class="col-md-8 main-content">
                <div class="coupon-card">
                    <div class="game-heading"> <span class="card-header-title">Open TeenPatti &nbsp; <small class="teenpatti-rules" data-toggle="modal" data-target="#modalrulesteenpatti"><u>Rules</u></small></span> <span class="float-right">
                            Round ID: <span id="round-id" class="round_no">0</span></span>
                    </div>
                    <div class="video-container" style="position: relative;">
                        <iframe id="tv-frame" width="100%" height="400" src="<?php echo IFRAME_URL."".OPENTEENPATTI_CODE; ?>" style="border:0px"></iframe>
                        <div class="video-overlay">
                            <div id="game-cards">
                                <div class="card-inner">
                                    <h3 class="text-white">Dealer</h3>
                                    <div>
                                        <img id="card8" src="../../../storage/front/img/cards/1.png">
                                        <img id="card17" src="../../../storage/front/img/cards/1.png">
                                        <img id="card26" src="../../../storage/front/img/cards/1.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clock clock2digit flip-clock-wrapper">
                        </div>
                    </div>
                    <div class="bet-note theme2bg theme1color" id="resultdesc" style="display: none;"></div>
                    <div class="card-content m-t-5">
                        <div class=" m-b-10 main-market">
                            <table class="table coupon-table table table-bordered " id="teenpatti-tbl">
                                <thead>
                                    <tr>
                                        <th class="box-4"></th>
                                        <th class="box-3 back-color">Back (Min: 100 Max: 100000)</th>
                                        <th class="box-3 back-color">Min: 100 Max: 10000</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bet-info suspended market_1_row market_11_row" data-title="SUSPENDED">
                                        <td class="box-4">
                                            <b>Player 1</b>
                                            <span class="patern-name">
                                                <span id="card0" class="card-icon m-l-5"></span>
                                                <span id="card9" class="card-icon m-l-5"></span>
                                                <span id="card18" class="card-icon m-l-5"></span>
                                            </span>
                                        </td>
                                        <td data-title="SUSPENDED" class=" box-3 back teen-section " data-sid="1" data-rate="1.98" data-nation="Player 1" data-bettype="back">
                                            <button class="back market_1_b_btn"><span class="odd">1.98</span><span>0</span></button>
                                        </td>
                                        <td data-title="SUSPENDED" class=" box-3 back teen-section" data-sid="11" data-rate="2.00" data-nation="Pair plus 1" data-bettype="pairplus">
                                            <button class="back market_11_b_btn"><span class="odd">Pair plus 1</span><span>0</span></button>
                                        </td>
                                    </tr>
                                    <tr class="bet-info suspended market_2_row market_12_row" data-title="SUSPENDED">
                                        <td class="box-4"><b>Player 2</b>
                                            <span class="patern-name">
                                                <span id="card1" class="card-icon m-l-5"></span>
                                                <span id="card10" class="card-icon m-l-5"></span>
                                                <span id="card19" class="card-icon m-l-5"></span>
                                            </span>
                                        </td>
                                        <td data-title="SUSPENDED" class=" box-3 back teen-section" data-sid="2" data-rate="1.98" data-nation="Player 2" data-bettype="back">
                                            <button class="back market_2_b_btn"><span class="odd">1.98</span><span>0</span></button>
                                        </td>
                                        <td data-title="SUSPENDED" class=" box-3 back teen-section" data-sid="12" data-rate="2.00" data-nation="Pair plus 2" data-bettype="pairplus">
                                            <button class="back market_12_b_btn"><span class="odd">Pair plus 2</span><span>0</span></button>
                                        </td>
                                    </tr>
                                    <tr class="bet-info suspended market_3_row market_13_row" data-title="SUSPENDED">
                                        <td class="box-4"><b>Player 3</b>
                                            <span class="patern-name">
                                                <span id="card2" class="card-icon m-l-5"></span>
                                                <span id="card11" class="card-icon m-l-5"></span>
                                                <span id="card20" class="card-icon m-l-5"></span>
                                            </span>
                                        </td>
                                        <td data-title="SUSPENDED" class=" box-3 back teen-section" data-sid="3" data-rate="1.98" data-nation="Player 3" data-bettype="back">
                                            <button class="back market_3_b_btn"><span class="odd">1.98</span><span>0</span></button>
                                        </td>
                                        <td data-title="SUSPENDED" class=" box-3 back teen-section" data-sid="13" data-rate="2.00" data-nation="Pair plus 3" data-bettype="pairplus">
                                            <button class="back market_13_b_btn"><span class="odd">Pair plus 3</span><span>0</span></button>
                                        </td>
                                    </tr>
                                    <tr class="bet-info suspended market_4_row market_14_row" data-title="SUSPENDED">
                                        <td class="box-4"><b>Player 4</b>
                                            <span class="patern-name">
                                                <span id="card3" class="card-icon m-l-5"></span>
                                                <span id="card12" class="card-icon m-l-5"></span>
                                                <span id="card21" class="card-icon m-l-5"></span>
                                            </span>
                                        </td>
                                        <td data-title="SUSPENDED" class=" box-3 back teen-section" data-sid="4" data-rate="1.98" data-nation="Player 4" data-bettype="back">
                                            <button class="back market_4_b_btn"><span class="odd">1.98</span><span>0</span></button>
                                        </td>
                                        <td data-title="SUSPENDED" class=" box-3 back teen-section" data-sid="14" data-rate="2.00" data-nation="Pair plus 4" data-bettype="pairplus">
                                            <button class="back market_14_b_btn"><span class="odd">Pair plus 4</span><span>0</span></button>
                                        </td>
                                    </tr>
                                    <tr class="bet-info suspended market_5_row market_15_row" data-title="SUSPENDED">
                                        <td class="box-4"><b>Player 5</b>
                                            <span class="patern-name">
                                                <span id="card4" class="card-icon m-l-5"></span>
                                                <span id="card13" class="card-icon m-l-5"></span>
                                                <span id="card22" class="card-icon m-l-5"></span>
                                            </span>
                                        </td>
                                        <td data-title="SUSPENDED" class=" box-3 back teen-section" data-sid="5" data-rate="1.98" data-nation="Player 5" data-bettype="back">
                                            <button class="back market_5_b_btn"><span class="odd">1.98</span><span>0</span></button>
                                        </td>
                                        <td data-title="SUSPENDED" class=" box-3 back teen-section" data-sid="15" data-rate="2.00" data-nation="Pair plus 5" data-bettype="pairplus">
                                            <button class="back market_15_b_btn"><span class="odd">Pair plus 5</span><span>0</span></button>
                                        </td>
                                    </tr>
                                    <tr class="bet-info suspended market_6_row market_16_row" data-title="SUSPENDED">
                                        <td class="box-4"><b>Player 6</b>
                                            <span class="patern-name">
                                                <span id="card5" class="card-icon m-l-5"></span>
                                                <span id="card14" class="card-icon m-l-5"></span>
                                                <span id="card23" class="card-icon m-l-5"></span>
                                            </span>
                                        </td>
                                        <td data-title="SUSPENDED" class=" box-3 back teen-section" data-sid="6" data-rate="1.98" data-nation="Player 6" data-bettype="back">
                                            <button class="back market_6_b_btn"><span class="odd">1.98</span><span>0</span></button>
                                        </td>
                                        <td data-title="SUSPENDED" class=" box-3 back teen-section" data-sid="16" data-rate="2.00" data-nation="Pair plus 6" data-bettype="pairplus">
                                            <button class="back market_16_b_btn"><span class="odd">Pair plus 6</span><span>0</span></button>
                                        </td>
                                    </tr>
                                    <tr class="bet-info suspended market_7_row market_17_row" data-title="SUSPENDED">
                                        <td class="box-4"><b>Player 7</b>
                                            <span class="patern-name">
                                                <span id="card6" class="card-icon m-l-5"></span>
                                                <span id="card15" class="card-icon m-l-5"></span>
                                                <span id="card24" class="card-icon m-l-5"></span>
                                            </span>
                                        </td>
                                        <td data-title="SUSPENDED" class=" box-3 back teen-section" data-sid="7" data-rate="1.98" data-nation="Player 7" data-bettype="back">
                                            <button class="back market_7_b_btn"><span class="odd">1.98</span><span>0</span></button>
                                        </td>
                                        <td data-title="SUSPENDED" class=" box-3 back teen-section" data-sid="17" data-rate="2.00" data-nation="Pair plus 7" data-bettype="pairplus">
                                            <button class="back market_17_b_btn"><span class="odd">Pair plus 7</span><span>0</span></button>
                                        </td>
                                    </tr>
                                    <tr class="bet-info suspended market_8_row market_18_row" data-title="SUSPENDED">
                                        <td class="box-4"><b>Player 8</b>
                                            <span class="patern-name">
                                                <span id="card7" class="card-icon m-l-5"></span>
                                                <span id="card16" class="card-icon m-l-5"></span>
                                                <span id="card25" class="card-icon m-l-5"></span>
                                            </span>
                                        </td>
                                        <td data-title="SUSPENDED" class=" box-3 back teen-section" data-sid="8" data-rate="1.98" data-nation="Player 8" data-bettype="back">
                                            <button class="back market_8_b_btn"><span class="odd">1.98</span><span>0</span></button>
                                        </td>
                                        <td data-title="SUSPENDED" class=" box-3 back teen-section" data-sid="18" data-rate="2.00" data-nation="Pair plus 8" data-bettype="pairplus">
                                            <button class="back market_18_b_btn"><span class="odd">Pair plus 8</span><span>0</span></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div id="commetry" class="text-right text-info"></div>
                        </div>
                    </div>
                    <div class="fancy-marker-title">
                        <h4>Last Result <a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=teen8" class="text-right" style="font-size: 14px; float: right; color: #fff">View All</a></h4></div>
                    <div class="m-b-10">
                        <p class="ball-by-ball row m-t-10"> </p>
                        <p class="text-right" id="last-result"></p>
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
            <div class="modal-dialog modal-md modal-dialog-centered" style="min-width: 650px">
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
    var data6;
    var markettype = "OPENTEENPATTI";
    var live_market_data = {};
    function websocket(type) {
        socket = io.connect(websocketurl, {
            transports: ['websocket']
        });
        socket.on('connect', function () {
            socket.emit('Room', 'teen8');
        });
        socket.on('game', function (data) {

            if (data && data['t1'] && data['t1'][0]) {
                if (oldGameId != data.t1[0].mid && oldGameId != 0) {
                    clearCards();
                }
                oldGameId = data.t1[0].mid;
                if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark").text(data.t1[0].remark);
                    specialRemark = data.t1[0].specialRemark;
                    $("#specialRemark").text(specialRemark);
                    if (specialRemark == "") {
                        $(".specialRemarkdiv").hide();
                    } else {
                        $(".specialRemarkdiv").show();
                    }
					data.t1[0].cards = data.t1[0].cards.split(",");
                    for (var k = 0; k < data.t1[0].cards.length; k++) {
                        if (data.t1[0].cards[k] != '1' && data.t1[0].cards[k] != 1) {
                            if (k != 8 && k != 17 && k != 26) {
                                data6 = getType(data.t1[0].cards[k]);
                                if (data6) {
                                    var cs = data6.card + "<span class='card-" + data6.color + "'>" + data6.type + "</span>";
                                    $("#card" + k).html(cs);
                                }
                            }
                            else {
                                $("#card" + k).attr("src", site_url + "storage/front/img/cards/" + data.t1[0].cards[k] + ".png");
                            }
                            //$("#card"+k).attr("src",site_url + "storage/front/img/cards/" + data.t1[0].cards[k] + ".png");
                        }
                    }
                }
                clock.setValue(data.t1[0].autotime);
                $(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
                eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1];
                for (var j in data['t2']) {
                    selectionid = parseInt(data['t2'][j].sid);
                    runner = data['t2'][j].nation;
                    b1 = data['t2'][j].rate;
                    b1_label = b1;
                    if (selectionid == 1) {
                        $(".n-bck").html(data['t2'][j].min);
                        $(".x-bck").html(data['t2'][j].max);
                    }
                    if (selectionid > 10) {
                        if (selectionid == 11) {
                            b1_label = "Pair Plus 1";
                            $(".n-pair").html(data['t2'][j].min);
                            $(".x-pair").html(data['t2'][j].max);
                        }
                        else if (selectionid == 12) {
                            b1_label = "Pair Plus 2";
                        }
                        else if (selectionid == 13) {
                            b1_label = "Pair Plus 3";
                        }
                        else if (selectionid == 14) {
                            b1_label = "Pair Plus 4";
                        }
                        else if (selectionid == 15) {
                            b1_label = "Pair Plus 5";
                        }
                        else if (selectionid == 16) {
                            b1_label = "Pair Plus 6";
                        }
                        else if (selectionid == 17) {
                            b1_label = "Pair Plus 7";
                        }
                        else if (selectionid == 18) {
                            b1_label = "Pair Plus 8";
                        }
                    }
                    var exposure_val = 0;
                    if (typeof live_market_data[selectionid] !== 'undefined') {
                        exposure_val = live_market_data[selectionid].pl;
                    }

                    markettype = "OPENTEENPATTI";
                    back_html = '<span  class="odd">' + b1_label + '</span> <span class="d-block market_' + selectionid + '_b_exposure market_exposure" style="color: ' + ((exposure_val >= 0) ? 'green' : 'red') + ';">' + exposure_val + '</span>';
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

    function getType(data) {
        var data1 = data;
        if (data) {
            data = data.split('SS');
            if (data.length > 1) {
                var obj = {
                    type: '[',
                    color: 'red',
                    card: data[0]
                }
                return obj;
            }
            else {
                data = data1;
                data = data.split('DD');
                if (data.length > 1) {
                    var obj = {
                        type: '{',
                        color: 'red',
                        card: data[0]
                    }
                    return obj;
                }
                else {
                    data = data1;
                    data = data.split('HH');
                    if (data.length > 1) {
                        var obj = {
                            type: ']',
                            color: 'black',
                            card: data[0]
                        }
                        return obj;
                    }
                    else {
                        data = data1;
                        data = data.split('CC');
                        if (data.length > 1) {
                            var obj = {
                                type: '}',
                                color: 'black',
                                card: data[0]
                            }
                            return obj;
                        }
                        else {
                            return 0;
                        }
                    }
                }
            }
        }
        return 0;
    }

    function clearCards() {
        $("#card0").html('');
        $("#card1").html('');
        $("#card2").html('');
        $("#card3").html('');
        $("#card4").html('');
        $("#card5").html('');
        $("#card6").html('');
        $("#card7").html('');
        $("#card8").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card9").html('');
        $("#card10").html('');
        $("#card11").html('');
        $("#card12").html('');
        $("#card13").html('');
        $("#card14").html('');
        $("#card15").html('');
        $("#card16").html('');
        $("#card17").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card18").html('');
        $("#card19").html('');
        $("#card20").html('');
        $("#card21").html('');
        $("#card22").html('');
        $("#card23").html('');
        $("#card24").html('');
        $("#card25").html('');
        $("#card26").attr("src", site_url + "storage/front/img/cards/1.png");
    }

    function updateResult(data) {
        if (data && data[0]) {
            resultGameLast = data[0].mid;
            html = "";
            var ab = "";
            var ab1 = "";
            casino_type = "'teen8'";
            data.forEach(function (runData) {
                if (parseInt(runData.result) == 11) {
                    ab = "playera";
                    ab1 = "R";
                }
                else if (parseInt(runData.result) == 21) {
                    ab = "playerb";
                    ab1 = "R";
                }
                else {
                    ab = "playerc";
                    ab1 = "R";
                }
                eventId = runData.mid == 0 ? 0 : runData.mid.split(".")[1];
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs ' + ab + ' last-result">' + ab1 + '</span>';
            });
            $("#last-result").html(html);
            if (oldGameId == 0 || oldGameId == resultGameLast) {
                $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c4").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c5").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c6").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c7").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c8").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c9").attr("src", site_url + "storage/front/img/cards/1.png");
            }
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
            url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/teen8/' + event_id,
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
                url: '<?php echo MASTER_URL; ?>/live-market/teenpatti/active_bets/open/' + get_round_no(),
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
            url: '<?php echo MASTER_URL; ?>/live-market/teenpatti/view_more_matched/open/' + get_round_no(),
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
            url: '<?php echo MASTER_URL; ?>/live-market/teenpatti/market_analysis/open/' + get_round_no(),
            type: 'POST',
            dataType: 'json',
            success: function (data) {
                live_market_data = data.results;
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