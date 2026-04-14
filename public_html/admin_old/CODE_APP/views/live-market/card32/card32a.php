<link rel="stylesheet" type="text/css" href="<?php echo MASTER_URL; ?>/assets/css/flipclock.css">

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
        .live-poker
        {
            background: #EEEEEE;
        }
        .w-33
        {
            min-width: 33.33% !important;
            width: 33.33% !important;
        }
        .suspended:after{
            width: 66.5%;
        }
        td.suspendedtd:after{
            width: 100%;
        }
    </style>
    <div class="listing-grid ddb-container casino-grid">
        <div class="coupon-card row">
            <div class="col-md-8 main-content">
                <div class="coupon-card">
                    <div class="game-heading">
                        <span class="card-header-title">32 Cards - A &nbsp; 
                            <small class="teenpatti-rules" data-toggle="modal" data-target="#modalrulesteenpatti"><u>Rules</u></small></span>
                        <span class="float-right">
                            Round ID: <span id="round-id" class="round_no"></span>
                        </span>
                    </div>
                    <div style="position: relative;">

<iframe id="casinoIframe" src="" width="100%" height="400" style="border: 0px;"></iframe>
                      <!--   <iframe width="100%" height="400" src="<?php echo IFRAME_URL."".A32CARDSA_CODE; ?>" style="border:0px"></iframe> -->
                        <div class="video-overlay">
                            <div id="game-cards">
                                <div class="card-inner">
                                    <h3 class="text-white"><span id="player_1_value">Player 8:</span> <span class="text-warning" id="card_1_value">8</span></h3>
                                    <div>
                                        <img id="cards_0" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_4" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_8" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_12" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_16" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_20" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_24" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_28" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_32" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                    </div>
                                    <h3 class="text-white"><span id="player_2_value">Player 9:</span> <span class="text-warning" id="card_2_value">9</span></h3>
                                    <div>
                                        <img id="cards_1" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_5" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_9" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_13" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_17" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_21" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_25" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_29" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_33" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                    </div>
                                    <h3 class="text-white"><span id="player_3_value">Player 10:</span> <span class="text-warning" id="card_3_value">10</span></h3>
                                    <div>
                                        <img id="cards_2" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_6" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_10" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_14" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_18" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_22" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_26" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_30" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_34" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                    </div>
                                    <h3 class="text-white"><span id="player_4_value">Player 11:</span> <span class="text-warning" id="card_4_value">11</span></h3>
                                    <div>
                                        <img id="cards_3" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_7" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_11" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_15" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_19" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_23" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_27" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_31" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                        <img id="cards_35" style="display:none;" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clock clock2digit flip-clock-wrapper"></div>
                        <div id="result-desc" style="display: none;"></div>
                    </div>

                    <div class="card-content m-t-5">
                        <div class="row">
                            <div class="table-responsive col-md-6 m-b-10 main-market p-r-5">
                                <div class="live-poker">
                                    <table class="table coupon-table table table-bordered ">
                                        <thead>
                                            <tr>
                                                <th class="w-33 w-33"></th>
                                                <th class="box-w2 back w-33">Back</th>
                                                <th class="box-w2 lay w-33">Lay</th>
                                            </tr>
                                        </thead>
                                        <tbody class="" id="poker-table1">
                                            <tr class="bet-info suspended market_1_row" data-title="SUSPENDED">
                                                <td class="w-33"><b>Player 8</b>
                                                    <p class="market_1_b_exposure market_exposure">0</p>
                                                </td>
                                                <td class="box-w2 back w-33 teen-section" data-sid="1" data-rate="0.00" data-nation="Player 8" data-bettype="BACK" data-gtype="card32">
                                                    <button class="back market_1_b_btn"><span class="odd">0.00</span><span>0</span></button>
                                                </td>
                                                <td class="box-w2 lay w-33 teen-section" data-sid="1" data-rate="0.00" data-nation="Player 8" data-bettype="LAY" data-gtype="card32">
                                                    <button class="lay market_1_l_btn"><span class="odd">0.00</span><span>0</span></button>
                                                </td>
                                            </tr>
                                            <tr class="bet-info suspended market_2_row" data-title="SUSPENDED">
                                                <td class="w-33"><b>Player 9</b>
                                                    <p class="market_2_b_exposure market_exposure">0</p>
                                                </td>
                                                <td class="box-w2 back w-33 teen-section" data-sid="2" data-rate="0.00" data-nation="Player 9" data-bettype="BACK" data-gtype="card32">
                                                    <button class="back market_2_b_btn"><span class="odd">0.00</span><span>0</span></button>
                                                </td>
                                                <td class="box-w2 lay w-33 teen-section" data-sid="2" data-rate="0.00" data-nation="Player 9" data-bettype="LAY" data-gtype="card32">
                                                    <button class="lay market_2_l_btn"><span class="odd">0.00</span><span>0</span></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="table-responsive col-md-6 m-b-10 main-market p-l-5">
                                <div class="live-poker">
                                    <table class="table coupon-table table table-bordered ">
                                        <thead>
                                            <tr>
                                                <th class="w-33 w-33"></th>
                                                <th class="box-w2 back w-33">Back</th>
                                                <th class="box-w2 lay w-33">Lay</th>
                                            </tr>
                                        </thead>
                                        <tbody class="" id="poker-table2">
                                            <tr class="bet-info suspended market_3_row" data-title="SUSPENDED">
                                                <td class="w-33"><b>Player 10</b>
                                                    <p class="market_3_b_exposure market_exposure">0</p>
                                                </td>
                                                <td class="box-w2 back w-33 teen-section" data-sid="3" data-rate="0.00" data-nation="Player 10" data-bettype="BACK" data-gtype="card32">
                                                    <button class="back market_3_b_btn"><span class="odd">0.00</span><span>0</span></button>
                                                </td>
                                                <td class="box-w2 lay w-33 teen-section" data-sid="3" data-rate="0.00" data-nation="Player 10" data-bettype="LAY" data-gtype="card32">
                                                    <button class="lay market_3_l_btn"><span class="odd">0.00</span><span>0</span></button>
                                                </td>
                                            </tr>
                                            <tr class="bet-info suspended market_4_row" data-title="SUSPENDED">
                                                <td class="w-33"><b>Player 11</b>
                                                    <p class="market_4_b_exposure market_exposure">0</p>
                                                </td>
                                                <td class="box-w2 back w-33 teen-section" data-sid="4" data-rate="0.00" data-nation="Player 11" data-bettype="BACK" data-gtype="card32">
                                                    <button class="back market_4_b_btn"><span class="odd">0.00</span><span>0</span></button>
                                                </td>
                                                <td class="box-w2 lay w-33 teen-section" data-sid="4" data-rate="0.00" data-nation="Player 11" data-bettype="LAY" data-gtype="card32">
                                                    <button class="lay market_4_l_btn"><span class="odd">0.00</span><span>0</span></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="commetry" class="text-right text-info" scrollamount="3"></div>
                    </div>

                    <div class="fancy-marker-title">
                        <h4>Last Result <a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=card32" class="text-right" style="font-size: 14px; float: right; color: #fff">View All</a></h4>
                    </div>
                    <div class="m-b-10">
                        <p class="text-right" id="last-result"></p>
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
                        <h4 class="modal-title">32 Cards B Result</h4>
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
    var site_url = '<?php echo WEB_URL; ?>';
    var websocketurl = '<?php echo GAME_IP; ?>';
    var clock = new FlipClock($(".clock"), {
        clockFace: "Counter"
    });
    var oldGameId = 0;
    var resultGameLast = 0;
    var markettype = "32CARDS";
    var data6;
    function websocket(type) {
        socket = io.connect(websocketurl, {
            transports: ['websocket']
        });
        socket.on('connect', function () {
            socket.emit('Room', 'card32');
        });
    
    socket.on('gameIframe', function(data){
    	$("#casinoIframe").attr('src',data);
    });
        socket.on('game', function (data) {

            if (data && data['t1'] && data['t1'][0]) {
                if (oldGameId != data.t1[0].mid && oldGameId != 0) {
                    clearCards();
                }
                oldGameId = data.t1[0].mid;
                if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark").text(data.t1[0].remark);
                    if (data.t1[0].C1 != 1) {
                        $("#card_1_value").text(data.t1[0].C1);
                    }
                    if (data.t1[0].C2 != 1) {
                        $("#card_2_value").text(data.t1[0].C2);
                    }
                    if (data.t1[0].C3 != 1) {
                        $("#card_3_value").text(data.t1[0].C3);
                    }
                    if (data.t1[0].C4 != 1) {
                        $("#card_4_value").text(data.t1[0].C4);
                    }

                    if (data.t1[0].C1 > data.t1[0].C2 && data.t1[0].C1 > data.t1[0].C3 && data.t1[0].C1 > data.t1[0].C4) {
                        $("#player_2_value").removeClass("text-success");
                        $("#player_3_value").removeClass("text-success");
                        $("#player_4_value").removeClass("text-success");
                        $("#player_1_value").addClass("text-success");
                    }

                    if (data.t1[0].C2 > data.t1[0].C1 && data.t1[0].C2 > data.t1[0].C3 && data.t1[0].C2 > data.t1[0].C4) {
                        $("#player_3_value").removeClass("text-success");
                        $("#player_4_value").removeClass("text-success");
                        $("#player_1_value").removeClass("text-success");
                        $("#player_2_value").addClass("text-success");
                    }

                    if (data.t1[0].C3 > data.t1[0].C1 && data.t1[0].C3 > data.t1[0].C2 && data.t1[0].C3 > data.t1[0].C4) {
                        $("#player_4_value").removeClass("text-success");
                        $("#player_1_value").removeClass("text-success");
                        $("#player_2_value").removeClass("text-success");
                        $("#player_3_value").addClass("text-success");
                    }

                    if (data.t1[0].C4 > data.t1[0].C1 && data.t1[0].C4 > data.t1[0].C2 && data.t1[0].C4 > data.t1[0].C3) {
                        $("#player_1_value").removeClass("text-success");
                        $("#player_2_value").removeClass("text-success");
                        $("#player_3_value").removeClass("text-success");
                        $("#player_4_value").addClass("text-success");
                    }



                    if (data.t1[0].desc) {
                        cards_img = data.t1[0].desc;
						cards_img=cards_img.split(',');
                        for (var i in cards_img) {
                            if (cards_img[i] && cards_img[i] != 1) {
                                $("#cards_" + i).attr("src", site_url + "storage/front/img/cards/" + cards_img[i] + ".png");
                                $("#cards_" + i).show();
                            }
                        }
                    }


                }
                clock.setValue(data.t1[0].autotime);
                $(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
                $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
                eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1];
                for (var j in data['t2']) {
                    selectionid = parseInt(data['t2'][j].sid);
                    runner = data['t2'][j].nation;
                    b1 = data['t2'][j].b1;
                    bs1 = data['t2'][j].bs1;
                    l1 = data['t2'][j].l1;
                    ls1 = data['t2'][j].ls1;
                    markettype = "32CARDS";
                    back_html = '<span class="odd">' + b1 + '</span> <span style="color: black;">' + bs1 + '</span>';
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
                    lay_html = '<span class="odd"><b>' + l1 + '</b></span> <span style="color: black;">' + ls1 + '</span>';
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
                    gstatus = data['t2'][j].gstatus.toString();
                    if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {
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



        $("#player_1_value").removeClass("text-success");
        $("#player_2_value").removeClass("text-success");
        $("#player_3_value").removeClass("text-success");
        $("#player_4_value").removeClass("text-success");
        $("#card_1_value").text("0");
        $("#card_2_value").text("0");
        $("#card_3_value").text("0");
        $("#card_4_value").text("0");
        for (i = 0; i <= 35; i++) {
            $("#cards_" + i).hide();
            $("#cards_" + i).attr("storage/front/img/cards/1.png");
        }
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

    function updateResult(data) {
        if (data && data[0]) {
            resultGameLast = data[0].mid;
            html = "";
            var ab = "";
            var ab1 = "";
            casino_type = "'card32'";
            data.forEach(function (runData) {
                if (parseInt(runData.result) == 1) {
                    ab = "playera";
                    ab1 = "8";
                }
                else if (parseInt(runData.result) == 2) {
                    ab = "playerb";
                    ab1 = "9";
                }
                else if (parseInt(runData.result) == 3) {
                    ab = "playerc";
                    ab1 = "10";
                }
                else {
                    ab = "playerd";
                    ab1 = "11";
                }

                eventId = runData.mid == 0 ? 0 : runData.mid.split(".")[1];
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs  ' + ab + ' last-result">' + ab1 + '</span>';
            });
            $("#last-result").html(html);
            if (oldGameId == 0 || oldGameId == resultGameLast) {

                $("#player_1_value").removeClass("text-success");
                $("#player_2_value").removeClass("text-success");
                $("#player_3_value").removeClass("text-success");
                $("#player_4_value").removeClass("text-success");
                $("#card_1_value").text("0");
                $("#card_2_value").text("0");
                $("#card_3_value").text("0");
                $("#card_4_value").text("0");
                for (i = 0; i <= 35; i++) {
                    $("#cards_" + i).hide();
                    $("#cards_" + i).attr("storage/front/img/cards/1.png");
                }

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
            url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/card32/' + event_id,
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

        if (get_round_no() == 0) {
            $('#table_body').html('');
            $('#matchedCount').html('(0)');
        }
        if (xhr && xhr.readyState != 4)
            xhr.abort();
        xhr = $.ajax({
            url: MASTER_URL + '/live-market/card32/active_bets/card32/' + get_round_no(),
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

    var xhr_vm;
    function call_view_more_bets() {

        if (xhr_vm && xhr_vm.readyState != 4)
            xhr_vm.abort();
        xhr_vm = $.ajax({
            url: MASTER_URL + '/live-market/card32/view_more_matched/card32/' + get_round_no(),
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
        if (get_round_no() == 0) {
            $('.market_exposure').text(0).css('color', 'black');
            return false;
        }

        if (xhr_analysis && xhr_analysis.readyState != 4)
            xhr_analysis.abort();
        xhr_analysis = $.ajax({
            url: MASTER_URL + '/live-market/card32/market_analysis/card32/' + get_round_no(),
            type: 'POST',
            dataType: 'json',
            success: function (data) {
                if (data.results == 0) {
                    $('.market_exposure').text(0).css('color', 'black');
                }
                $.each(data.results, function (index, value) {
                    var element = $('.market_' + value.market_id + '_b_exposure');
                    $(element).text(value.pl);
                    if (value.pl > 0)
                        $(element).css('color', 'green');
                    else
                        $(element).css('color', 'red');
                });
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