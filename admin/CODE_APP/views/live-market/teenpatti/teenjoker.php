<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flipclock/0.7.8/flipclock.min.css">
<div class="col-md-12 main-container">
    <style type="text/css">
        .box-w3 {
            width: 340px;
            min-width: 340px;
            max-width: 340px;
        }

        span.odd {
            display: block;
        }

        #matched-bet th,
        #unmatched-bet th {
            min-width: 100px;
        }

        .mtree table td,
        .mtree table th {
            width: 33.3%;
        }

        #openFancyBook {}

        .fancyBookModal .modal-body {
            background: none;
            padding-right: 15px;
        }

        #playStopButton {
            height: 30px;
            width: 70px;
            font-weight: bold;
            border-radius: 8px;
            border: none;
            color: black;
            background-color: lightsteelblue;
            outline: none;
            cursor: pointer;
            font-size: 12px;
            font: Arial, Helvetica, sans-serif;
        }

        .coupon-table button span {
            font-size: 14px;
        }

        .coupon-table button span.odd {
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

        .casino-table-box {
            padding: 4px;
        }


        .casino-table-left-box,
        .casino-table-center-box,
        .casino-table-right-box {
            width: calc(50% - 2px);
            /* border-left: 1px solid #c7c8ca;
        border-right: 1px solid #c7c8ca;
        border-top: 1px solid #c7c8ca; */
            background-color: #f2f2f2;
        }

        .casino-table-header,
        .casino-table-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            /* border-bottom: 1px solid #c7c8ca; */
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
        }

        .casino-odds-box {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 5px 0;
            font-weight: bold;
            /* border-left: 1px solid #c7c8ca; */
            cursor: pointer;
            min-height: 46px;
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

        .back {
            /* background-color: #72bbef !important; */
            background-color: white !important;
            border: 2px solid #72bbef;
        }

        .lay {
            /* background-color: #faa9ba !important; */
            background-color: white !important;
            border: 2px solid #faa9ba;
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
            width: calc(50% - 2px);
            /* border-left: 1px solid #c7c8ca;
        border-right: 1px solid #c7c8ca;
        border-top: 1px solid #c7c8ca; */
            background-color: #f2f2f2;
        }

        .card-icon {
            font-family: Card Characters !important;
            display: inline-block;
        }

        .card-red {
            color: #ff0000 !important;
        }

        .card-black {
            color: #000000 !important;
        }

        .joker-other-odds .casino-nation-detail,
        .joker-other-odds .casino-odds-box {
            width: 20%;
        }

        .dtredblack .casino-table-header .casino-odds-box {
            flex-direction: row;
        }

        body {
            line-height: 1.5;
        }



        .suspended-box {
            position: relative;
            pointer-events: none;
            cursor: none;
        }

        .suspended-box::before {
            background-image: url(/storage/front/img/lock.svg);
            background-size: 17px 17px;
            /* filter: invert(1);
    -webkit-filter: invert(1); */
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
            background-color: rgba(255, 255, 255, 0.7);
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

        .text-playerb {
            color: #ef910f !important;
            font-weight: bold;
        }

        .teen1daycenter {
    width: 2px;
    background-color: grey;
}

.nav-tabs {
    border-bottom: 0px solid #dee2e6 !important;
}
    </style>
    <div class="listing-grid casino-grid">
        <div class="coupon-card row">
            <div class="col-md-8 main-content">
                <div class="coupon-card">
                    <div class="game-heading"><span class="card-header-title">Joker Teenpatti

                            <!---->
                        </span> 
                        <!-- <small role="button" class="teenpatti-rules" onclick="view_rules('teenjoker')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small>  -->
                        <span class="float-right">
                            Round ID:
                            <span class="round_no">0</span>
                            <!--   | Min: <span>100</span> | Max: <span>500000</span> --></span>
                    </div>
                    <!---->
                    <div class="video-container">
                        <?php
                        if (!empty(IFRAME_URL_SET)) {
                        ?>
                            <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . TEENJOKER_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe>
                        <?php

                        } else {
                        ?>
                            <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="400" style="border: 0px;"></iframe>
                        <?php

                        }
                        ?>
                        <!---->
                        <!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL;
                                                                echo TEENJOKER_CODE; ?>" width="100%" height="400"
                                                style="border: 0px;"></iframe> -->
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
                            <div class="videoCards">
                                <div>
                                    <h3 class="text-white text-playerb">JOKER</h3>
                                    <div>
                                        <img id="card_c7" src="/storage/front/img/cards/1.png">
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-white">PLAYER A</h3>
                                    <div>
                                        <img id="card_c1" src="/storage/front/img/cards/1.png">
                                        <img id="card_c2" src="/storage/front/img/cards/1.png">
                                        <img id="card_c3" src="/storage/front/img/cards/1.png">
                                    </div>
                                </div>
                                <div class="mt-1">
                                    <h3 class="text-white">PLAYER B</h3>
                                    <div>
                                        <img id="card_c4" src="/storage/front/img/cards/1.png">
                                        <img id="card_c5" src="/storage/front/img/cards/1.png">
                                        <img id="card_c6" src="/storage/front/img/cards/1.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="casino-detail">
                        <div class="casino-table">
                            <div class="casino-table-box" style="align-items:center;">
                                <div class="casino-table-left-box" style="display:flex;flex-direction:column;vertical-align: super;padding-right: 5px;">
                                    <div class="casino-table-header">
                                        <div class="casino-nation-detail"></div>
                                        <!-- <div class="casino-odds-box back">Back</div>
                                                        <div class="casino-odds-box lay">Lay</div> -->
                                    </div>
                                    <div class="casino-table-body">
                                        <div class="casino-table-row ">
                                            <div class="casino-nation-detail" style="display: flex;flex-direction: row;justify-content: space-between;align-items: center;padding: 0px 5px;">
                                                <div class="casino-nation-name">Player A</div>
                                                <div class="casino-nation-book text-center market_1_b_exposure market_exposure"></div>
                                            </div>
                                            <div class="casino-odds-box back suspended-box market_1_row back-1 market_1_b_btn"><span class="casino-odds market_1_b_val">0</span></div>
                                            <div class="casino-odds-box lay suspended-box market_1_row lay-1 market_1_l_btn"><span class="casino-odds market_1_l_val">0</span></div>
                                        </div>
                                        <div class="casino-table-row">
                                            <div class="casino-nation-detail" style="display: flex;flex-direction: row;justify-content: space-between;align-items: center;padding: 0px 5px;">
                                                <div class="casino-nation-name">Player B</div>
                                                <div class="casino-nation-book text-center market_2_b_exposure market_exposure"></div>
                                            </div>
                                            <div class="casino-odds-box back market_2_row suspended-box back-1 market_2_b_btn"><span class="casino-odds market_2_b_val">0</span></div>
                                            <div class="casino-odds-box lay market_2_row suspended-box lay-1 market_2_l_btn"><span class="casino-odds market_2_l_val">0</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="teen1daycenter"></div>
                                <div class="casino-table-right-box joker-other-odds" style="border-left: 2px solid grey;padding-left: 6px;">
                                     <h6 class="text-warning text-playerb">Joker</h6>
                                    <div class="joker-other-odds">
                                        <div class="casino-table-header">
                                            <!-- <div class="casino-nation-detail"></div> -->
                                            
                                            <div class="casino-odds-box "><span class="casino-odds market_3_b_val">0</span></div>
                                            <div class="casino-odds-box "><span class="casino-odds market_4_b_val">0</span></div>
                                            <div class="casino-odds-box "><span class="casino-odds market_5_b_val">0</span></div>
                                            <div class="casino-odds-box"><span class="casino-odds market_6_b_val">0</span></div>
                                        </div>
                                        <div class="casino-table-body">
                                            <div class="casino-table-row">
                                                <!-- <div class="casino-nation-detail">
                                                                    <div class="casino-nation-name">Joker</div>
                                                                </div> -->
                                                <div class="casino-odds-box back suspended-box market_3_row back-1 market_3_b_btn">Even</div>
                                                <!-- <div class="casino-odds-box back suspended-box market_3_row back-1 market_3_b_btn"><span class="casino-odds market_3_b_val">0</span></div> -->
                                                <div class="casino-odds-box back suspended-box market_4_row back-1 market_4_b_btn">Odd</div>
                                                <div class="casino-odds-box back suspended-box market_5_row back-1 market_5_b_btn"><span class="card-icon ms-1"><span class="card-red ">{</span><span class="card-red ">[</span></span></div>
                                                <div class="casino-odds-box back suspended-box market_6_row back-1 market_6_b_btn"><span class="card-icon ms-1"><span class="card-black ">}</span><span class="card-black ">]</span></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="joker-other-odds dtredblack">
                                        <div class="casino-table-header">
                                            <!-- <div class="casino-nation-detail"></div> -->
                                            <div class="casino-odds-box"><span class="card-icon ms-1"><span class="card-black ">}</span></span></div>
                                            <div class="casino-odds-box"><span class="card-icon ms-1"><span class="card-red ">{</span></span></div>
                                            <div class="casino-odds-box"><span class="card-icon ms-1"><span class="card-red ">[</span></span></div>
                                            <div class="casino-odds-box"><span class="card-icon ms-1"><span class="card-black ">]</span></span></div>
                                        </div>
                                        <div class="casino-table-body">
                                            <div class="casino-table-row ">
                                                <!-- <div class="casino-nation-detail">
                                                                    <div class="casino-nation-name">Joker</div>
                                                                </div> -->
                                                <div class="casino-odds-box back suspended-box market_7_row back-1 market_7_b_btn"><span class="casino-odds market_7_b_val">0</span></div>
                                                <div class="casino-odds-box back suspended-box market_8_row back-1 market_8_b_btn"><span class="casino-odds market_8_b_val">0</span></div>
                                                <div class="casino-odds-box back suspended-box back-1 market_9_row market_9_b_btn"><span class="casino-odds market_9_b_val">0</span></div>
                                                <div class="casino-odds-box back suspended-box back-1 market_10_row market_10_b_btn"><span class="casino-odds market_10_b_val">0</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="casino-last-result-title"><span>Last Result</span><span><a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=teenjoker">View All</a></span></div>
                        <div class="casino-last-results" id="last-result"></div>
                    </div>


                </div>
            </div>
            <div class="col-md-4 sidebar-right" id="sidebar-right">
                <div class="card m-b-10 scorecard" style="margin-bottom: 0px;">
                    <div class="card m-b-10 my-bet">
                        <div class="card-header">
                            <ul class="nav nav-tabs d-inline-block" role="tablist ">
                                <li class="nav-item d-inline-block">
                                    <!-- <a class="nav-link active " data-toggle="tab" href="#matched-bet">Matched <span id="matchedCount">(0)</span></a> -->
                                     <span>
                                        MY BETS
                                     </span>
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
                        <h4 class="modal-title">Teenpatti Joker Result</h4>
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

                    <div class="tab-content m-t-20">
                        <div id="matched-bet2" class="tab-pane active">

                            <div class="table-responsive m-t-20">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>UserName</th>
                                            <th>Nation</th>
                                            <!-- <th>Bet Type</th> -->
                                            <th>Amount</th>
                                            <th>User Rate</th>
                                            <th>Place Date</th>
                                            <!-- <th>Match Date</th> -->
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
                                            <!-- <th>Bet Type</th> -->
                                            <th>Amount</th>
                                            <th>User Rate</th>
                                            <th>Place Date</th>
                                            <!-- <th>Match Date</th> -->
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
                                            <!-- <th>Bet Type</th> -->
                                            <th>Amount</th>
                                            <th>User Rate</th>
                                            <th>Place Date</th>
                                            <!-- <th>Match Date</th> -->
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
    var markettype = "TEENJOKER";
var back_html = "";
var lay_html = "";
var gstatus = "";
var last_result_id = '0';

    function websocket(type) {
        socket = io.connect(websocketurl, {
            transports: ['websocket']
        });

        socket.on('connect', function() {
            socket.emit('Room', 'teenjoker');
        });

        socket.on('game', function(data) {
           
            
          data1 = data;
            if (data && data['t1'] && data['t1'][0]) {
            if (oldGameId != data1.t1[0].mid && data1.t1[0].mid != 0 && data1.t1[0].mid != "0") {
                setTimeout(function() {
                   clearCards();
                }, <?php //echo CASINO_RESULT_TIMEOUT; ?>);
            }
                oldGameId = data.t1[0].mid;
              
                if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark").text(data.t1[0].remark);
                    if (data.t1[0].C1 != 1) {
                        $("#card_c7")
                            .attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C1 + ".png");
                    }
                    if (data.t1[0].C2 != 1) {
                        $("#card_c1")
                            .attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C2 + ".png");
                    }
                    if (data.t1[0].C3 != 1) {
                        $("#card_c4")
                            .attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C3 + ".png");
                    }
                    if (data.t1[0].C4 != 1) {
                        $("#card_c2")
                            .attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C4 + ".png");
                    }
                    if (data.t1[0].C5 != 1) {
                        $("#card_c5")
                            .attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C5 + ".png");
                    }
                    if (data.t1[0].C6 != 1) {
                        $("#card_c3")
                            .attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C6 + ".png");
                    }
                    if (data.t1[0].C7 != 1) {
                        $("#card_c6")
                            .attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C7 + ".png");
                    }
                }
                clock.setValue(data.t1[0].autotime);
                $(".round_no").text(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid=="string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
                $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid);
                eventId = data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid=="string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid;
                var event_id = eventId;
                for (var j in data['t2']) {
                    selectionid = data.t2[j].sectionId || data.t2[j].sid;
                    runner = data.t2[j].nation || data.t2[j].nat;
                    b1 = data.t2[j].b1;
                    bs1 = data.t2[j].bs1;
                    l1 = data.t2[j].l1;
                    ls1 = data.t2[j].ls1;
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
                    $(".market_" + selectionid + "_b_val").html(b1);

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
                    $(".market_" + selectionid + "_l_val").html(l1);
                   gstatus = data.t2[j].gstatus.toString();
                if (gstatus == "SUSPENDED" || gstatus == "0") {
                    $(".market_" + selectionid + "_row").addClass("suspended-box");
                } else {
                    $(".market_" + selectionid + "_row").removeClass("suspended-box");
                }
                }
            } else {
                $(".timer_game")
                    .text("Left Time:0");
                $(".round_no")
                    .text("0");
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
        $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c4").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c5").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c6").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c7").attr("src", site_url + "storage/front/img/cards/1.png");
    }

    function updateResult(data) {
        console.log("data updated",data);
        
        if (data && data[0]) {
            resultGameLast = data[0].mid;
            
        if (last_result_id != resultGameLast) {
            last_result_id = resultGameLast;
            refresh(markettype);
        }

            html = "";
            var ab = "";
            var ab1 = "";
            casino_type = "'teenjoker'";
            data.forEach((runData) => {
                if (parseInt(runData.win) == 1) {
                    ab = "result-a";
                    ab1 = "A";

                } else if (parseInt(runData.win) == 2) {
                    ab = "result-b";
                    ab1 = "B";

                } else {
                    ab = "result-c";
                    ab1 = "C";
                }

                eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] : runData.mid;
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs  ' + ab + ' result">' + ab1 + '</span>';
            });
            $("#last-result").html(html);
            if (oldGameId == 0 || oldGameId == resultGameLast) {
                $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c4").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c5").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c6").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c7").attr("src", site_url + "storage/front/img/cards_new/1.png");
            }
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
            url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/teenjoker/' + event_id,
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

    function get_round_no() {
        return $.trim($('.round_no').text());
    }
    $('#last-result').on('click', function() {
        $('#modalpokerresult').modal('show');
    });
    var xhr;

    function call_active_bets() {
        if (get_round_no() > 0) {
            if (xhr && xhr.readyState != 4)
                xhr.abort();
            xhr = $.ajax({
                url: MASTER_URL + '/live-market/teenpatti/active_bets/teenjoker/' + get_round_no(),
                type: 'POST',
                dataType: 'json',
                success: function(data) {
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
            url: MASTER_URL + '/live-market/teenpatti/view_more_matched/teenjoker/' + get_round_no(),
            type: 'POST',
            dataType: 'json',
            data: $('#form-view_more_bets').serialize(),
            success: function(data) {
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
            url: MASTER_URL + '/live-market/teenpatti/market_analysis/teenjoker/' + get_round_no(),
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.results == 0) {

                    $('.market_1_b_exposure').text(0).css('color', 'black');
                    $('.market_2_b_exposure').text(0).css('color', 'black');
                    $('.market_3_b_exposure').text(0).css('color', 'black');
                    $('.market_4_b_exposure').text(0).css('color', 'black');
                } else {
                    $.each(data.results, function(index, value) {
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
    $(function() {
        setTimeout(function() {
            call_active_bets();
            call_analysis();
        }, 2000);
        setInterval(function() {
            call_active_bets();
            call_analysis();
        }, <?php echo CASINO_SET_INTERVAL;  ?>);
        $('#view_more_bets').on('click', function() {
            call_view_more_bets();
        });
        $('#form-view_more_bets').on('submit', function() {
            call_view_more_bets();
            return false;
        });
        $('#btn-view_all_matched').on('click', function() {
            $('#search-client_name').html('');
            setTimeout(function() {
                call_view_more_bets();
            }, 1);
        });
        $('#search-client_name').select2({
            allowClear: true,
            minimumInputLength: 3,
            placeholder: 'select..',
            ajax: {
                url: MASTER_URL + '/reports/common/get_clients',
                data: function(params) {
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