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
            width: 100%;
        }
        td.suspendedtd:after{
            width: 100%;
        }

        .ball-runs {
            background: #355e3b;
            color: #ff4500;
        }

        .patern-name{
            min-width: 108px;
        }

        .theme2bg {
            background-color: #2c3e50;
        }

    </style>

    <div class="listing-grid casino-grid">
        <div class="coupon-card row">
            <div class="col-md-8 main-content hands-pattern-container">
                <div class="coupon-card">
                    <div class="game-heading">
                        <span class="card-header-title">6 Player Live Poker &nbsp; 
                            <small class="teenpatti-rules" data-toggle="modal" data-target="#modalrulesteenpatti"><u>Rules</u></small>
                        </span>
                        <span class="float-right">
                            Round ID: <span id="round-id" class="round_no"></span>
                        </span>
                    </div>

                    <div style="position: relative;">

<iframe id="casinoIframe" src="" width="100%" height="400" style="border: 0px;"></iframe>
                       <!--  <iframe width="100%" height="400" src="<?php echo IFRAME_URL."".A6PLAYERPOKER_CODE; ?>" style="border:0px"></iframe> -->
                        <div class="video-overlay">
                            <div id="game-cards">
                                <div class="card-inner">
                                    <div>
                                        <img id="card_c13" class="m-r-5"  src="../../../storage/front/img/cards/1.png">
                                        <img id="card_c14" class="m-r-5"  src="../../../storage/front/img/cards/1.png">
                                        <img id="card_c15" class="m-r-5"  src="../../../storage/front/img/cards/1.png">
                                        <img id="card_c16" class="m-r-5"  src="../../../storage/front/img/cards/1.png">
                                        <img id="card_c17" class="m-r-5"  src="../../../storage/front/img/cards/1.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clock clock2digit flip-clock-wrapper"></div>
                    </div>
                    
                    <div class="bet-note theme2bg theme1color specialRemarkdiv" style="display: none;"><span class="greenbx">Result: </span> <span id="specialRemark"></span></div>

                    <div id="poker-test-box">
                        <ul class="nav nav-tabs m-b-5 m-t-5">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#hands">Hands</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#patterns">Patterns</a>
                            </li>
                        </ul>
                        <div class="tab-content ">
                            <div class="tab-pane hands active" id="hands">
                                <div class="card-content m-t-0">
                                    <div class="table-responsive m-b-10">
                                        <table class="table table-bordered ">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <button class="btn-theme market_11_row market_11_b_btn suspended" data-rate="5.20" data-nation="Player 1" data-sid="11" data-bettype="back" data-gstatus="1">
                                                            <div class="color-card"></div>
                                                            <span class="patern-name">Player 1
                                                                <span class="card-icon m-l-20" id="card_c1"></span>
                                                                <span class="card-icon m-l-5" id="card_c7"></span>
                                                            </span>
                                                            <span class="point market_11_b_value">5.20</span>
                                                        </button>
                                                        <span class="ubook market_11_b_exposure market_exposure">0</span>
                                                        <p class="m-b-0 m-t-5 text-right min-max">
                                                            <span>
                                                                <b>Min:</b>100
                                                            </span>
                                                            <span class="m-l-5">
                                                                <b>Max:</b>100000
                                                            </span>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <button class="btn-theme market_12_row market_12_b_btn suspended" data-rate="5.20" data-nation="Player 2" data-sid="12" data-bettype="back" data-gstatus="1">
                                                            <div class="color-card"></div>
                                                            <span class="patern-name">Player 2
                                                                <span class="card-icon m-l-20" id="card_c2"></span>
                                                                <span class="card-icon m-l-5" id="card_c8"></span>
                                                            </span>
                                                            <span class="point market_12_b_value">5.20</span>
                                                        </button>
                                                        <span class="ubook market_12_b_exposure market_exposure">0</span>
                                                        <p class="m-b-0 m-t-5 text-right min-max">
                                                            <span>
                                                                <b>Min:</b>100
                                                            </span>
                                                            <span class="m-l-5">
                                                                <b>Max:</b>100000
                                                            </span>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <button class="btn-theme market_13_row market_13_b_btn suspended" data-rate="5.20" data-nation="Player 3" data-sid="13" data-bettype="back" data-gstatus="1">
                                                            <div class="color-card"></div>
                                                            <span class="patern-name">Player 3
                                                                <span class="card-icon m-l-20" id="card_c3"></span>
                                                                <span class="card-icon m-l-5" id="card_c9"></span>
                                                            </span>
                                                            <span class="point market_13_b_value">5.20</span>
                                                        </button>
                                                        <span class="ubook market_13_b_exposure market_exposure">0</span>
                                                        <p class="m-b-0 m-t-5 text-right min-max">
                                                            <span>
                                                                <b>Min:</b>100
                                                            </span>
                                                            <span class="m-l-5">
                                                                <b>Max:</b>100000
                                                            </span>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <button class="btn-theme market_14_row market_14_b_btn suspended" data-rate="5.20" data-nation="Player 4" data-sid="14" data-bettype="back" data-gstatus="1">
                                                            <div class="color-card"></div>
                                                            <span class="patern-name">Player 4
                                                                <span class="card-icon m-l-20" id="card_c4"></span>
                                                                <span class="card-icon m-l-5" id="card_c10"></span>
                                                            </span>
                                                            <span class="point market_14_b_value">5.20</span>
                                                        </button>
                                                        <span class="ubook market_14_b_exposure market_exposure">0</span>
                                                        <p class="m-b-0 m-t-5 text-right min-max">
                                                            <span>
                                                                <b>Min:</b>100
                                                            </span>
                                                            <span class="m-l-5">
                                                                <b>Max:</b>100000
                                                            </span>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <button class="btn-theme market_15_row market_15_b_btn suspended" data-rate="5.20" data-nation="Player 5" data-sid="15" data-bettype="back" data-gstatus="1">
                                                            <div class="color-card"></div>
                                                            <span class="patern-name">Player 5
                                                                <span class="card-icon m-l-20" id="card_c5"></span>
                                                                <span class="card-icon m-l-5" id="card_c11"></span>
                                                            </span>
                                                            <span class="point market_15_b_value">5.20</span>
                                                        </button>
                                                        <span class="ubook market_15_b_exposure market_exposure">0</span>
                                                        <p class="m-b-0 m-t-5 text-right min-max">
                                                            <span>
                                                                <b>Min:</b>100
                                                            </span>
                                                            <span class="m-l-5">
                                                                <b>Max:</b>100000
                                                            </span>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <button class="btn-theme market_16_row market_16_b_btn suspended" data-rate="5.20" data-nation="Player 6" data-sid="16" data-bettype="back" data-gstatus="1">
                                                            <div class="color-card"></div>
                                                            <span class="patern-name">Player 6
                                                                <span class="card-icon m-l-20" id="card_c6"></span>
                                                                <span class="card-icon m-l-5" id="card_c12"></span>
                                                            </span>
                                                            <span class="point market_16_b_value">5.20</span>
                                                        </button>
                                                        <span class="ubook market_16_b_exposure market_exposure">0</span>
                                                        <p class="m-b-0 m-t-5 text-right min-max">
                                                            <span>
                                                                <b>Min:</b>100
                                                            </span>
                                                            <span class="m-l-5">
                                                                <b>Max:</b>100000
                                                            </span>
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane patterns" id="patterns">
                                <div class="card-content m-t-0">
                                    <div class="table-responsive m-b-10">
                                        <table class="table table-bordered ">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <button class="bt-action suspended market_21_row market_21_b_btn" data-rate="100.00" data-nation="High Card" data-sid="21" data-bettype="back" data-gstatus="1">
                                                            <span class="patern-name">High Card</span>
                                                            <span class="point market_21_b_value">100.00</span>
                                                        </button>
                                                        <span class="ubook market_21_b_exposure market_exposure">0</span>
                                                        <p class="m-b-0 m-t-5 text-right min-max">
                                                            <span>
                                                                <b>Min:</b>100
                                                            </span>
                                                            <span class="m-l-5">
                                                                <b>Max:</b>100000
                                                            </span>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <button class="bt-action suspended market_22_row market_22_b_btn" data-rate="5.80" data-nation="Pair" data-sid="22" data-bettype="back" data-gstatus="1">
                                                            <span class="patern-name">Pair</span>
                                                            <span class="point market_22_b_value">5.80</span>
                                                        </button>
                                                        <span class="ubook market_22_b_exposure market_exposure">0</span>
                                                        <p class="m-b-0 m-t-5 text-right min-max">
                                                            <span>
                                                                <b>Min:</b>100
                                                            </span>
                                                            <span class="m-l-5">
                                                                <b>Max:</b>100000
                                                            </span>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <button class="bt-action suspended market_23_row market_23_b_btn" data-rate="3.10" data-nation="Two Pair" data-sid="23" data-bettype="back" data-gstatus="1">
                                                            <span class="patern-name">Two Pair</span>
                                                            <span class="point market_23_b_value">3.10</span>
                                                        </button>
                                                        <span class="ubook market_23_b_exposure market_exposure">0</span>
                                                        <p class="m-b-0 m-t-5 text-right min-max">
                                                            <span>
                                                                <b>Min:</b>100
                                                            </span>
                                                            <span class="m-l-5">
                                                                <b>Max:</b>100000
                                                            </span>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <button class="bt-action suspended market_24_row market_24_b_btn" data-rate="6.80" data-nation="Three of a Kind" data-sid="24" data-bettype="back" data-gstatus="1">
                                                            <span class="patern-name">Three of a Kind</span>
                                                            <span class="point market_24_b_value">6.80</span>
                                                        </button>
                                                        <span class="ubook market_24_b_exposure market_exposure">0</span>
                                                        <p class="m-b-0 m-t-5 text-right min-max">
                                                            <span>
                                                                <b>Min:</b>100
                                                            </span>
                                                            <span class="m-l-5">
                                                                <b>Max:</b>100000
                                                            </span>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <button class="bt-action suspended market_25_row market_25_b_btn" data-rate="5.70" data-nation="Straight" data-sid="25" data-bettype="back" data-gstatus="1">
                                                            <span class="patern-name">Straight</span>
                                                            <span class="point market_25_b_value">5.70</span>
                                                        </button>
                                                        <span class="ubook market_25_b_exposure market_exposure">0</span>
                                                        <p class="m-b-0 m-t-5 text-right min-max">
                                                            <span>
                                                                <b>Min:</b>100
                                                            </span>
                                                            <span class="m-l-5">
                                                                <b>Max:</b>100000
                                                            </span>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <button class="bt-action suspended market_26_row market_26_b_btn" data-rate="8.70" data-nation="Flush" data-sid="26" data-bettype="back" data-gstatus="1">
                                                            <span class="patern-name">Flush</span>
                                                            <span class="point market_26_b_value">8.70</span>
                                                        </button>
                                                        <span class="ubook market_26_b_exposure market_exposure">0</span>
                                                        <p class="m-b-0 m-t-5 text-right min-max">
                                                            <span>
                                                                <b>Min:</b>100
                                                            </span>
                                                            <span class="m-l-5">
                                                                <b>Max:</b>100000
                                                            </span>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <button class="bt-action suspended market_27_row market_27_b_btn" data-rate="8.70" data-nation="Full House" data-sid="27" data-bettype="back" data-gstatus="1">
                                                            <span class="patern-name">Full House</span>
                                                            <span class="point market_27_b_value">8.70</span>
                                                        </button>
                                                        <span class="ubook market_27_b_exposure market_exposure">0</span>
                                                        <p class="m-b-0 m-t-5 text-right min-max">
                                                            <span>
                                                                <b>Min:</b>100
                                                            </span>
                                                            <span class="m-l-5">
                                                                <b>Max:</b>100000
                                                            </span>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <button class="bt-action suspended market_28_row market_28_b_btn" data-rate="80.00" data-nation="Four of a Kind" data-sid="28" data-bettype="back" data-gstatus="1">
                                                            <span class="patern-name">Four of a Kind</span>
                                                            <span class="point market_28_b_value">80.00</span>
                                                        </button>
                                                        <span class="ubook market_28_b_exposure market_exposure">0</span>
                                                        <p class="m-b-0 m-t-5 text-right min-max">
                                                            <span>
                                                                <b>Min:</b>100
                                                            </span>
                                                            <span class="m-l-5">
                                                                <b>Max:</b>100000
                                                            </span>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <button class="bt-action suspended market_29_row market_29_b_btn" data-rate="100.00" data-nation="Straight Flush" data-sid="29" data-bettype="back" data-gstatus="1">
                                                            <span class="patern-name">Straight Flush</span>
                                                            <span class="point market_29_b_value">100.00</span>
                                                        </button>
                                                        <span class="ubook market_29_b_exposure market_exposure">0</span>
                                                        <p class="m-b-0 m-t-5 text-right min-max">
                                                            <span>
                                                                <b>Min:</b>100
                                                            </span>
                                                            <span class="m-l-5">
                                                                <b>Max:</b>100000
                                                            </span>
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div

                    <div class="fancy-marker-title">
                        <div class="fancy-marker-title">
                            <h4>Last Result <a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=poker9" class="text-right" style="font-size: 14px; float: right; color: #fff">View All</a></h4>
                        </div>
                    </div>
                    <div class="m-b-10">
                        <p class="text-right" id="last-result"></p>
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
                            <h4 class="modal-title">6 Player Poker Result</h4>
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
        var markettype = "6_PLAYER_POKER";
        var back_html = "";
        var lay_html = "";
        var gstatus = "";
        function websocket(type) {
            socket = io.connect(websocketurl, {
                transports: ['websocket']
            });
            socket.on('connect', function () {
                socket.emit('Room', 'poker9');
            });
    
    socket.on('gameIframe', function(data){
    	$("#casinoIframe").attr('src',data);
    });
            socket.on('game', function (data) {

                if (data && data['t1'] && data['t1'][0]) {

                    oldGameId = data.t1[0].mid;
                    if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                        $(".casino-remark").text(data.t1[0].remark);
                        specialRemark = data.t1[0].desc;
                        $("#specialRemark").text(specialRemark);
                        if (specialRemark == "") {
                            $(".specialRemarkdiv").hide();
                        } else {
                            $(".specialRemarkdiv").show();
                        }

                        if (data.t1[0].C13 != 1) {
                            $("#card_c13").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C13 + ".png");
                        }
                        if (data.t1[0].C14 != 1) {
                            $("#card_c14").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C14 + ".png");
                        }
                        if (data.t1[0].C15 != 1) {
                            $("#card_c15").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C15 + ".png");
                        }
                        if (data.t1[0].C16 != 1) {
                            $("#card_c16").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C16 + ".png");
                        }
                        if (data.t1[0].C17 != 1) {
                            $("#card_c17").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C17 + ".png");
                        }



                        if (data.t1[0].C1 != 1) {
                            data6 = getType(data.t1[0].C1);
                            if (data6) {
                                var cs = data6.card + "<span class='card-" + data6.color + "'>" + data6.type + "</span>";
                                $("#card_c1").html(cs);
                            }
                        }

                        if (data.t1[0].C2 != 1) {
                            data6 = getType(data.t1[0].C2);
                            if (data6) {
                                var cs = data6.card + "<span class='card-" + data6.color + "'>" + data6.type + "</span>";
                                $("#card_c2").html(cs);
                            }
                        }

                        if (data.t1[0].C3 != 1) {
                            data6 = getType(data.t1[0].C3);
                            if (data6) {
                                var cs = data6.card + "<span class='card-" + data6.color + "'>" + data6.type + "</span>";
                                $("#card_c3").html(cs);
                            }
                        }

                        if (data.t1[0].C4 != 1) {
                            data6 = getType(data.t1[0].C4);
                            if (data6) {
                                var cs = data6.card + "<span class='card-" + data6.color + "'>" + data6.type + "</span>";
                                $("#card_c4").html(cs);
                            }
                        }

                        if (data.t1[0].C5 != 1) {
                            data6 = getType(data.t1[0].C5);
                            if (data6) {
                                var cs = data6.card + "<span class='card-" + data6.color + "'>" + data6.type + "</span>";
                                $("#card_c5").html(cs);
                            }
                        }

                        if (data.t1[0].C6 != 1) {
                            data6 = getType(data.t1[0].C6);
                            if (data6) {
                                var cs = data6.card + "<span class='card-" + data6.color + "'>" + data6.type + "</span>";
                                $("#card_c6").html(cs);
                            }
                        }

                        if (data.t1[0].C7 != 1) {
                            data6 = getType(data.t1[0].C7);
                            if (data6) {
                                var cs = data6.card + "<span class='card-" + data6.color + "'>" + data6.type + "</span>";
                                $("#card_c7").html(cs);
                            }
                        }

                        if (data.t1[0].C8 != 1) {
                            data6 = getType(data.t1[0].C8);
                            if (data6) {
                                var cs = data6.card + "<span class='card-" + data6.color + "'>" + data6.type + "</span>";
                                $("#card_c8").html(cs);
                            }
                        }

                        if (data.t1[0].C9 != 1) {
                            data6 = getType(data.t1[0].C9);
                            if (data6) {
                                var cs = data6.card + "<span class='card-" + data6.color + "'>" + data6.type + "</span>";
                                $("#card_c9").html(cs);
                            }
                        }

                        if (data.t1[0].C10 != 1) {
                            data6 = getType(data.t1[0].C10);
                            if (data6) {
                                var cs = data6.card + "<span class='card-" + data6.color + "'>" + data6.type + "</span>";
                                $("#card_c10").html(cs);
                            }
                        }

                        if (data.t1[0].C11 != 1) {
                            data6 = getType(data.t1[0].C11);
                            if (data6) {
                                var cs = data6.card + "<span class='card-" + data6.color + "'>" + data6.type + "</span>";
                                $("#card_c11").html(cs);
                            }
                        }

                        if (data.t1[0].C12 != 1) {
                            data6 = getType(data.t1[0].C12);
                            if (data6) {
                                var cs = data6.card + "<span class='card-" + data6.color + "'>" + data6.type + "</span>";
                                $("#card_c12").html(cs);
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
                        b1 = data['t2'][j].rate;
                        markettype = "6_PLAYER_POKER";
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
            casino_type = "'poker9'";
            data.forEach(function (runData) {
                if (parseInt(runData.result) == 11) {
                    ab = "player1";
                    ab1 = "1";
                }
                else if (parseInt(runData.result) == 12) {
                    ab = "player2";
                    ab1 = "2";
                } else if (parseInt(runData.result) == 13) {
                    ab = "player3";
                    ab1 = "3";
                } else if (parseInt(runData.result) == 14) {
                    ab = "player4";
                    ab1 = "4";
                } else if (parseInt(runData.result) == 15) {
                    ab = "player5";
                    ab1 = "5";
                } else if (parseInt(runData.result) == 16) {
                    ab = "player6";
                    ab1 = "6";
                } else {
                    ab = "playertie";
                    ab1 = "T";
                }

                eventId = runData.mid == 0 ? 0 : runData.mid.split(".")[1];
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')" class="ball-runs  ' + ab + ' last-result">' + ab1 + '</span>';
            });
            $("#last-result").html(html);
            if (oldGameId == 0 || oldGameId == resultGameLast) {
                $("#card_c1").text("");
                $("#card_c2").text("");
                $("#card_c3").text("");
                $("#card_c4").text("");
                $("#card_c5").text("");
                $("#card_c6").text("");
                $("#card_c7").text("");
                $("#card_c8").text("");
                $("#card_c9").text("");
                $("#card_c10").text("");
                $("#card_c11").text("");
                $("#card_c12").text("");
                $("#card_c13").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c14").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c15").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c16").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c17").attr("src", site_url + "storage/front/img/cards/1.png");
            }
        }

        function teenpatti(type) {
            gameType = type
            websocket();
        }
        teenpatti("ok");
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
                                type: '}',
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
                                    type: ']',
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

    </script>
    <script>

        function view_casiono_result(event_id, casino_type) {

            $("#cards_data").html("");
            $("#round_no").text(event_id);
            $.ajax({
                type: 'POST',
                url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/poker9/' + event_id,
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
                return false;
            }

            if (xhr && xhr.readyState != 4)
                xhr.abort();
            xhr = $.ajax({
                url: MASTER_URL + '/live-market/poker/active_bets/player6/' + get_round_no(),
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
                url: MASTER_URL + '/live-market/poker/view_more_matched/player6/' + get_round_no(),
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
                url: MASTER_URL + '/live-market/poker/market_analysis/player6/' + get_round_no(),
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    if (data.results == 0) {

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