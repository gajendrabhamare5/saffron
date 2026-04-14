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

    <div class="listing-grid casino-grid">

        <div class="coupon-card row">

            <div class="col-md-8 main-content">

                <div class="coupon-card">

                    <div class="game-heading">

                        <span class="card-header-title">20-20 Live Poker &nbsp; 
                            <small class="teenpatti-rules" data-toggle="modal" data-target="#modalrulesteenpatti"><u>Rules</u></small></span>

                        <span class="float-right">

                            Round ID: <span id="round-id" class="round_no"></span></span>

                    </div>

                    <div style="position: relative;">

                        <iframe width="100%" height="400" src="<?php echo IFRAME_URL."".A2020POKER_CODE; ?>" style="border:0px"></iframe>

                        <div class="video-overlay">

                            <div id="game-cards">
                                <div class="card-inner">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3 class="text-white">Player A</h3>
                                            <div>
                                                <img id="card_c1" src="../../../storage/front/img/cards/1.png">
                                                <img id="card_c2" src="../../../storage/front/img/cards/1.png">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <h3 class="text-white">Player B</h3>
                                            <img id="card_c3" src="../../../storage/front/img/cards/1.png">
                                            <img id="card_c4" src="../../../storage/front/img/cards/1.png">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-inner">
                                    <h3 class="text-white">Board</h3>
                                    <div>
                                        <img id="card_c5" src="../../../storage/front/img/cards/1.png">
                                        <img id="card_c6" src="../../../storage/front/img/cards/1.png">
                                        <img id="card_c7" src="../../../storage/front/img/cards/1.png">
                                        <img id="card_c8" src="../../../storage/front/img/cards/1.png">
                                        <img id="card_c9" src="../../../storage/front/img/cards/1.png">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="clock clock2digit flip-clock-wrapper">
                        </div>
                        <div id="result-desc" style="display: none;">
                            <div class="m-b-5">
                                <span class="greenbx">Winner:</span>
                                <span id="desc1"></span>
                            </div>
                            <div class="m-b-5">
                                <span class="redbx">A:</span>
                                <span id="desc2"></span>
                            </div>
                            <div class="m-b-5">
                                <span class="yellowbx">B:</span>
                                <span id="desc3"></span>
                            </div>
                        </div>
                    </div>

                    <div class="card-content m-t-5">
                        <div class="row" id="poker-table">
                            <div class="col-md-6 m-b-10 main-market p-r-5">
                                <div class="live-poker">
                                    <table class="table coupon-table table table-bordered ">
                                        <thead>
                                            <tr>
                                                <th class="w-33 w-33"></th>
                                                <th class="box-w2 back w-33">Player A</th>
                                                <th class="box-w2 back w-33">Player B</th>
                                            </tr>
                                        </thead>
                                        <tbody class="">
                                            <tr class="bet-info suspended market_11_row" data-title="SUSPENDED">
                                                <td class="w-33">Winner</td>
                                                <td class=" box-w2 back w-33 teen-section" data-sid="11" data-rate="1.98" data-nation="Winner">
                                                    <button class="back market_11_b_btn">
                                                        <span class="odd market_11_b_value">1.98</span>
                                                        <span class="market_11_b_exposure market_exposure">0</span>
                                                    </button>
                                                </td>
                                                <td class=" box-w2 back w-33 teen-section" data-sid="21" data-rate="1.98" data-nation="Winner">
                                                    <button class="back market_21_b_btn">
                                                        <span class="odd market_21_b_value">1.98</span>
                                                        <span class="market_21_b_exposure market_exposure">0</span>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="bet-info suspended market_12_row" data-title="SUSPENDED">
                                                <td class="w-33">One Pair</td>
                                                <td class=" box-w2 back w-33 teen-section" data-sid="12" data-rate="2.00" data-nation="One Pair">
                                                    <button class="back market_12_b_btn">
                                                        <span class="odd market_12_b_value">2.00</span>
                                                        <span class="market_12_b_exposure market_exposure">0</span>
                                                    </button>
                                                </td>
                                                <td class=" box-w2 back w-33 teen-section" data-sid="22" data-rate="2.00" data-nation="One Pair">
                                                    <button class="back market_22_b_btn">
                                                        <span class="odd market_22_b_value">2.00</span>
                                                        <span class="market_22_b_exposure market_exposure">0</span>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="bet-info suspended market_13_row" data-title="SUSPENDED">
                                                <td class="w-33">Two Pair</td>
                                                <td class=" box-w2 back w-33 teen-section" data-sid="13" data-rate="3.75" data-nation="Two Pair">
                                                    <button class="back market_13_b_btn">
                                                        <span class="odd market_13_b_value">3.75</span>
                                                        <span class="market_13_b_exposure market_exposure">0</span>
                                                    </button>
                                                </td>
                                                <td class=" box-w2 back w-33 teen-section" data-sid="23" data-rate="3.75" data-nation="Two Pair">
                                                    <button class="back market_23_b_btn">
                                                        <span class="odd market_23_b_value">3.75</span>
                                                        <span class="market_23_b_exposure market_exposure">0</span>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="bet-info suspended market_14_row" data-title="SUSPENDED">
                                                <td class="w-33">Three of a Kind</td>
                                                <td class=" box-w2 back w-33 teen-section" data-sid="14" data-rate="16.00" data-nation="Three of a Kind">
                                                    <button class="back market_14_b_btn">
                                                        <span class="odd market_14_b_value">16.00</span>
                                                        <span class="market_14_b_exposure market_exposure">0</span>
                                                    </button>
                                                </td>
                                                <td class=" box-w2 back w-33 teen-section" data-sid="24" data-rate="16.00" data-nation="Three of a Kind">
                                                    <button class="back market_24_b_btn">
                                                        <span class="odd market_24_b_value">16.00</span>
                                                        <span class="market_24_b_exposure market_exposure">0</span>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="bet-info suspended market_15_row" data-title="SUSPENDED">
                                                <td class="w-33">Straight</td>
                                                <td class=" box-w2 back w-33 teen-section" data-sid="15" data-rate="16.00" data-nation="Straight">
                                                    <button class="back market_15_b_btn">
                                                        <span class="odd market_15_b_value">16.00</span>
                                                        <span class="market_15_b_exposure market_exposure">0</span>
                                                    </button>
                                                </td>
                                                <td class=" box-w2 back w-33 teen-section" data-sid="25" data-rate="16.00" data-nation="Straight">
                                                    <button class="back market_25_b_btn">
                                                        <span class="odd market_25_b_value">16.00</span>
                                                        <span class="market_25_b_exposure market_exposure">0</span>
                                                    </button>
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
                                                <th class="w-33"></th>
                                                <th class="box-w2 back w-33">Player A</th>
                                                <th class="box-w2 back w-33">Player B</th>
                                            </tr>
                                        </thead>
                                        <tbody class="">
                                            <tr class="bet-info suspended market_16_row" data-title="SUSPENDED">
                                                <td class="w-33">Flush</td>
                                                <td class=" box-w2 back w-33 teen-section" data-sid="16" data-rate="26.00" data-nation="Flush">
                                                    <button class="back market_16_b_btn">
                                                        <span class="odd market_16_b_value">26.00</span>
                                                        <span class="market_16_b_exposure market_exposure">0</span>
                                                    </button>
                                                </td>
                                                <td class=" box-w2 back w-33 teen-section" data-sid="26" data-rate="26.00" data-nation="Flush">
                                                    <button class="back market_26_b_btn">
                                                        <span class="odd market_26_b_value">26.00</span>
                                                        <span class="market_26_b_exposure market_exposure">0</span>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="bet-info suspended market_17_row" data-title="SUSPENDED">
                                                <td class="w-33">Full House</td>
                                                <td class=" box-w2 back w-33 teen-section" data-sid="17" data-rate="29.00" data-nation="Full House">
                                                    <button class="back market_17_b_btn">
                                                        <span class="odd market_17_b_value">29.00</span>
                                                        <span class="market_17_b_exposure market_exposure">0</span>
                                                    </button>
                                                </td>
                                                <td class=" box-w2 back w-33 teen-section" data-sid="27" data-rate="29.00" data-nation="Full House">
                                                    <button class="back market_27_b_btn">
                                                        <span class="odd market_27_b_value">29.00</span>
                                                        <span class="market_27_b_exposure market_exposure">0</span>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="bet-info suspended market_18_row" data-title="SUSPENDED">
                                                <td class="w-33">Four of a Kind</td>
                                                <td class=" box-w2 back w-33 teen-section" data-sid="18" data-rate="251.00" data-nation="Four of a Kind">
                                                    <button class="back market_18_b_btn">
                                                        <span class="odd market_18_b_value">251.00</span>
                                                        <span class="market_18_b_exposure market_exposure">0</span>
                                                    </button>
                                                </td>
                                                <td class=" box-w2 back w-33 teen-section" data-sid="28" data-rate="251.00" data-nation="Four of a Kind">
                                                    <button class="back market_28_b_btn">
                                                        <span class="odd market_28_b_value">251.00</span>
                                                        <span class="market_28_b_exposure market_exposure">0</span>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="bet-info suspended market_19_row" data-title="SUSPENDED">
                                                <td class="w-33">Straight Flush</td>
                                                <td class=" box-w2 back w-33 teen-section" data-sid="19" data-rate="501.00" data-nation="Straight Flush">
                                                    <button class="back market_19_b_btn">
                                                        <span class="odd market_19_b_value">501.00</span>
                                                        <span class="market_19_b_exposure market_exposure">0</span>
                                                    </button>
                                                </td>
                                                <td class=" box-w2 back w-33 teen-section" data-sid="29" data-rate="501.00" data-nation="Straight Flush">
                                                    <button class="back market_29_b_btn">
                                                        <span class="odd market_29_b_value">501.00</span>
                                                        <span class="market_29_b_exposure market_exposure">0</span>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="commetry" class="text-right text-info" scrollamount="3">In each round, player will be a winner from player A/B and from the remaining patterns, only high pattern will be considered as winner for each player | tie round will be considered as a cancel round.</div>
                    </div>

                    <div class="fancy-marker-title">
                        <h4>Last Result <a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=poker20" class="text-right" style="font-size: 14px; float: right; color: #fff">View All</a></h4>

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

        <div id="modalpokerresult" class="modal fade show" tabindex="-1">

            <div class="modal-dialog" style="min-width: 650px">

                <div class="modal-content">

                    <div class="modal-header">

                        <h4 class="modal-title">20-20 Poker Result</h4>

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
    var resultGameLast = 0;
    var selectionid = "";
    var runner = "";
    var b1 = "";
    var bs1 = "";
    var l1 = "";
    var ls1 = "";
    var markettype = "2020_POKER";
    var back_html = "";
    var lay_html = "";
    var gstatus = "";
    function websocket(type) {
        socket = io.connect(websocketurl, {
            transports: ['websocket']
        });
        socket.on('connect', function () {
            socket.emit('Room', 'poker20');
        });
        socket.on('game', function (data) {

            if (data && data['t1'] && data['t1'][0]) {

                oldGameId = data.t1[0].mid;
                if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark").text(data.t1[0].remark);
                    var desc = data.t1[0].desc;
                    desc_array = desc.split("##");
                    if (desc != "") {
                        $("#result-desc").show();
                        desc1 = desc_array[0];
                        desc2 = desc_array[1];
                        desc3 = desc_array[2];
                        $("#desc1").text(desc1);
                        $("#desc2").text(desc2);
                        $("#desc3").text(desc3);
                    } else {
                        $("#result-desc").hide();
                    }

                    if (data.t1[0].C1 != 1) {
                        $("#card_c1").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C1 + ".png");
                    }

                    if (data.t1[0].C2 != 1) {
                        $("#card_c2").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C2 + ".png");
                    }

                    if (data.t1[0].C3 != 1) {
                        $("#card_c3").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C3 + ".png");
                    }
                    if (data.t1[0].C4 != 1) {
                        $("#card_c4").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C4 + ".png");
                    }
                    if (data.t1[0].C5 != 1) {
                        $("#card_c5").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C5 + ".png");
                    }
                    if (data.t1[0].C6 != 1) {
                        $("#card_c6").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C6 + ".png");
                    }
                    if (data.t1[0].C7 != 1) {
                        $("#card_c7").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C7 + ".png");
                    }
                    if (data.t1[0].C8 != 1) {
                        $("#card_c8").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C8 + ".png");
                    }
                    if (data.t1[0].C9 != 1) {
                        $("#card_c9").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C9 + ".png");
                    }



                }
                clock.setValue(data.t1[0].autotime);
                $(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
                $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
                eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1];
                for (var j in data['t2']) {
                    selectionid = parseInt(data['t2'][j].sid);
                    runner = data['t2'][j].nation;
                    b1 = data['t2'][j].rate;
                    markettype = "2020_POKER";
                    $(".market_" + selectionid + "_b_value").text(b1);
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
                    gstatus = data['t2'][j].gstatus.toString();
                    if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {

                        $(".market_" + selectionid + "_row").addClass("suspended");
                        $(".market_" + selectionid + "_b_btn").removeClass("back-1");
                    }
                    else {
                        $(".market_" + selectionid + "_b_btn").addClass("back-1");
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


    function updateResult(data) {
        data = JSON.parse(JSON.stringify(data));
        resultGameLast = data[0].mid;
        var html = "";
        casino_type = "'poker20'";
        data.forEach(function (runData) {
            if (parseInt(runData.result) == 11) {
                ab = "playera";
                ab1 = "A";
            }
            else if (parseInt(runData.result) == 21) {
                ab = "playerb";
                ab1 = "B";
            } else {
                ab = "playertie";
                ab1 = "T";
            }
            eventId = runData.mid == 0 ? 0 : runData.mid.split(".")[1];
            html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs  ' + ab + ' last-result">' + ab1 + '</span>';
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

    function teenpatti(type) {
        gameType = type
        websocket();
    }
    teenpatti("ok");
</script>
<script>

    function view_casiono_result(event_id, casino_type) {

        $("#cards_data").html("");
        $("#round_no").text(event_id);
        $.ajax({
            type: 'POST',
            url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/poker20/' + event_id,
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
            url: MASTER_URL + '/live-market/poker/active_bets/t20/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/poker/view_more_matched/t20/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/poker/market_analysis/t20/' + get_round_no(),
            type: 'POST',
            dataType: 'json',
            success: function (data) {
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