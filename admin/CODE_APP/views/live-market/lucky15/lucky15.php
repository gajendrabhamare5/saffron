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
    <style>

.position-relative {
		position: relative !important;
	}

	.detail-page-container {
    display: flex
;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: flex-start;
    align-content: flex-start;
}

.game-market {
    background: #f7f7f7;
    color: #333;
    margin-top: 8px;
}

.market-6 {
    min-width: calc(100% - 8px);
    max-width: calc(100% - 8px);
    margin-left: 4px;
    margin-right: 4px;
    flex: 1;
}

.row {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex
;
    flex-wrap: wrap;
    margin-top: calc(-1* var(--bs-gutter-y));
    margin-right: calc(-.5* var(--bs-gutter-x));
    margin-left: calc(-.5* var(--bs-gutter-x));
}

.market-title {
    background-color: #2c3e50d9;
    color: #ffffff;
    padding: 8px 10px;
    font-size: 15px;
    font-weight: bold;
    display: flex
;
    flex-wrap: wrap;
    justify-content: space-between;
}

.row.row5 {
    margin-left: -5px;
    margin-right: -5px;
}

.row.row5 > [class*="col-"], .row.row5 > [class*="col"] {
    padding-left: 5px;
    padding-right: 5px;
}

.market-nation-detail {
    width: calc(100% - 480px);
    display: flex
;
    flex-wrap: wrap;
    /* justify-content: space-between; */
    padding: 0 5px;
    font-size: 14px;
}

.market-nation-detail {
        width: calc(100% - 330px);
    }

    .market-nation-detail {
        font-size: 13px;
    }

    .market-6 .market-nation-detail {
    width: calc(100% - 240px);
    position: relative;
}

.market-6 .market-nation-detail {
        width: calc(100% - 165px);
    }

    .market-6 .market-nation-detail {
        width: calc(100% - 160px);
    }

    .market-odd-box {
    width: 80px;
    padding: 2px 0;
    display: flex
;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    border-left: 1px solid #c7c8ca;
    cursor: pointer;
    min-height: 34px;
}

.back {
    background-color: #72bbef !important;
    border: 0px solid #72bbef !important;
}

.market-odd-box {
        width: 55px;
    }

    .market-header .market-odd-box {
    min-height: 28px;
}

.market-header .market-odd-box{
    font-size: 16px;
}

.market-odd-box .market-odd {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 0;
    line-height: 1;
}

.market-odd-box .market-volume {
    font-size: 12px;
    font-weight: 100;
    line-height: 1;
}

.market-header, .market-row {
    border-bottom: 0.01em solid #c7c8ca;
}

.market-row {
    background-color: #f2f2f2;
    display: flex
;
    flex-wrap: wrap;
}

.fancy-min-max-box {
    width: 80px;
    padding: 0 5px;
    text-align: right;
}

.fancy-min-max-box {
        width: 55px;
    }

    .fancy-min-max-box {
        width: 80px;
    }

    .fancy-min-max {
    font-size: 12px;
    font-weight: bold;
    color: #333;
    word-break: break-all;
    border: unset !important;
    padding: unset !important;
}

.fancy-min-max {
        font-size: 9px;
    }


.fancy-market {
    border-bottom: 1px solid #c7c8ca;
}

.fancy-market .market-row {
    border-bottom: 0;
}

.suspended-box {
    position: relative;
    pointer-events: none;
    cursor: none;
}

.suspended-box::before {
    background-image: url(/storage/front/img/lock.svg);
    background-size: 17px 17px;
    filter: invert(1);
    -webkit-filter: invert(1);
    background-repeat: no-repeat;
    content: "";
    position: absolute;
    z-index: 100;
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
    padding: 10px;
    background-color: var(--theme2-bg70);
    color: #ffffff;
    font-size: 14px;
    display: flex
;
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
    display: flex
;
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
    display: flex
;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: bold;
    margin-left: 5px;
    cursor: pointer;
    color: #ffff33;
}

/* .casino-last-results .result.result-a {
    color: #ff4500;
} */

.casino-last-results .result.result-b {
    color: #ffff33;
}

.result-image span{
    left: 45% !important; 
}

.cricket20ballpopup{
    display: block;
    position: absolute;
    top: 50%;
    left: 40%;
    transform: translate(-50%, -50%);
}
.ball_run{
    position: absolute;
    top: 50%;
    left: 40%;
    transform: translate(-50%, -50%);
    color: #fff;
    font-weight: bold;
    /* text-transform: uppercase; */
    font-family: timer;
    font-size: 32px;
}

.nav-tabs{
    border-bottom: 0px solid #dee2e6;
}
</style>
 <style>
    .casino-video-right-icons {
        position: absolute;
        right: 5px;
        top: 5px;
        display: flex;
        display: -webkit-flex;
    }

    .casino-video-rules-icon {
        background-color: rgba(0, 0, 0, 0.5);
        border: 2px solid #999;
        border-radius: 50%;
        height: 40px;
        width: 40px;
        display: flex;
        display: -webkit-flex;
        align-items: center;
        justify-content: center;
        margin-right: 5px;
        cursor: pointer;
        font-size: 24px;
    }

    .casino-video-rules-icon i {
        font-size: 24 px !important;
        color: #fff;
        cursor: pointer;

    }
    
  .tooltip-container {
        position: relative;
        display: inline-block;
        cursor: pointer;
        font-family: Arial, sans-serif;
    }

    .tooltip-box {
        visibility: hidden;
        /* background-color: #fff; */
        color: #333;
        /* border: 1px solid #ccc; */
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        border-radius: 6px;
        position: absolute;
        z-index: 1;
        top: 125%;
        left: 50%;
        transform: translateX(-50%);
        width: 200px;
        overflow: hidden;
        left: -617%;
        width: 1500%;
        height: 550%;
    }

    .tooltip-header {
        background-color: #333;
        display: flex;
        justify-content: center;
        font-size: 16px;
        padding: 4px 8px;
        width: 100%;
        color: white;
         position: relative;
    }

    .tooltip-content {
        padding: 10px;
        overflow-x: hidden;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: #666666 #333333;
        height: calc(100% - 74px);
        line-height: normal;
        width: 100%;
        background-color: black;
        color: white;
        font-size: 12px;
    }

    .tooltip-container.show-tooltip .tooltip-box {
        visibility: visible;

    }
    .tooltip-close {
        cursor: pointer;
    font-size: 23px;
    font-weight: bold;
    position: absolute;
    right: 8px; 
    top: 50%;
    transform: translateY(-50%);
}
</style>
    <div class="listing-grid casino-grid">
        <div class="coupon-card row">
            <div class="col-md-8 main-content">
                <div class="coupon-card">
                                        <div class="game-heading"><span class="card-header-title">
                                                Lucky 15
                                                <!-- <small role="button" class="teenpatti-rules"  onclick="view_rules('tt_cards_rule.jpg')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small> --> <!----></span> 
                                                
                                                <span class="float-right">
                                                Round ID:
                                                <span class="round_no">0</span><!--  | Min:
                                                <span>100</span> | Max:
                                                <span>500000</span></span> -->
                                        </div>
                                        <!---->
                                        <div class="video-container">
                                                                                        <?php
                                                if(!empty(IFRAME_URL_SET)){
                                                                            ?>
                                                                            <iframe class="iframedesign" src="<?php echo IFRAME_URL."".LUCKY15_CODE;?>" width="100%" height="400px" style="border: 0px;"></iframe>
                                                                            <?php
                                                                                
                                                                            }else{
                                                                                ?>
                                                                                <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="400" style="border: 0px;"></iframe>
                                                                                <?php

                                                                            }
                                                                            ?>
                                        <!-- <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe> -->
                                            <!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL;
                                                            echo LUCKY15_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
                                            <div class="cricket20ballpopup" style="display : none;"><img src="/storage/img/ball-blank.png"><span id="ball_run" class="ball_run"></span></div>
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
                                            </div>
                                                                                 <div class="casino-video-right-icons">
                            <div title="Rules" class="casino-video-rules-icon tooltip-container" id="tooltipBtn">
                                <i class="fas fa-info-circle" style="margin: 6px 0 0 6px;"></i>
                                <div class="tooltip-box">
                                    <div class="tooltip-header">Rules  <span class="tooltip-close" id="tooltipClose">&times;</span></div>
                                    <div class="tooltip-content">
                                        <div class="rules-body"><div><style type="text/css">
    .rules-section .row.row5 {
        margin-left: -5px;
        margin-right: -5px;
    }

    .rules-section .pl-2 {
        padding-left: .5rem !important;
    }

    .rules-section .pr-2 {
        padding-right: .5rem !important;
    }

    .rules-section .row.row5>[class*="col-"],
    .rules-section .row.row5>[class*="col"] {
        padding-left: 5px;
        padding-right: 5px;
    }

    .rules-section {
        text-align: left;
        margin-bottom: 10px;
    }

    .rules-section .table {
        color: #fff;
        border: 1px solid #444;
        background-color: #222;
        font-size: 12px;
    }

    .rules-section .table td,
    .rules-section .table th {
        border-bottom: 1px solid #444;
    }

    .rules-section ul li,
    .rules-section p {
        margin-bottom: 5px;
    }

    .rules-section::-webkit-scrollbar {
        width: 8px;
    }

    .rules-section::-webkit-scrollbar-track {
        background: #666666;
    }

    .rules-section::-webkit-scrollbar-thumb {
        background-color: #333333;
    }

    .rules-section .rules-highlight {
        color: #FDCF13;
        font-size: 16px;
    }

    .rules-section .rules-sub-highlight {
        color: #FDCF13;
        font-size: 14px;
    }

    .rules-section .list-style,
    .rules-section .list-style li {
        list-style: disc;
    }

    .rules-section .rule-card {
        height: 20px;
        margin-left: 5px;
    }

    .rules-section .card-character {
        font-family: Card Characters;
    }

    .rules-section .red-card {
        color: red;
    }

    .rules-section .black-card {
        color: black;
    }

    .rules-section .cards-box {
        background: #fff;
        padding: 6px;
        display: inline-block;
        color: #000;
        min-width: 150px;
    }
.rules-section img {
  max-width: 100%;
}
    </style>

<div class="rules-section">
                                            <ul class="pl-4 pr-4 list-style">
                                                <li>Lucky 15 is an exciting and fun game with higher odds to win more on each ball. It consists of 15 balls (15 videos) in which 3 zero runs, 3 one runs, 3 two runs, 2 fours, 2 sixes, and 2 wickets in each round.</li>
                                                <li>A randomly picked video will be played one by one out of 15 videos and users will have a chance to place a bet on every ball played.</li>
                                                <li>Round will end when there is only one ball left or all balls of the same run left.</li>
                                                <li>To make this game more exciting, remaining balls will be displayed to users to predict the outcome of the next ball and place a bet.</li>
                                                <li>Good Luck and win more !!!</li>
                                            </ul>
                                        </div>
</div></div>
                                    </div>
                                </div>
                            </div>
                        </div> 

                                            <div data-v-73ba2763="" class="ball-by-ball-popup" style="display:none;"><img data-v-73ba2763="" src="/storage/img/ball-blank.png"> <span data-v-73ba2763="">0 Run</span></div>
                                        </div>
                                        <div class="casino-detail detail-page-container position-relative">
                                            <div class="game-market market-6 container-fluid container-fluid-5">
                                                <div class="market-title row row5">Runs</div>
                                                <div class="market-header row row5">
                                                    <div class="col-12 col-md-4 d-none d-md-block">
                                                        <div class="market-row">
                                                        <div class="market-nation-detail"></div>
                                                        <div class="market-odd-box back"><b>Back</b></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4 d-none d-md-block">
                                                        <div class="market-row">
                                                        <div class="market-nation-detail"></div>
                                                        <div class="market-odd-box back"><b>Back</b></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <div class="market-row">
                                                        <div class="market-nation-detail"></div>
                                                        <div class="market-odd-box back"><b>Back</b></div>
                                                        </div>
                                                    </div>
                                                    <div class="fancy-min-max-box"></div>
                                                </div>
                                                <div class="market-body row row5">
                                                    <?
                                                        $sid_list = array(
                                                            "0 Runs" => 1,
                                                            "1 Runs" => 2,
                                                            "2 Runs" => 3,
                                                            "4 Runs" => 4,
                                                            "6 Runs" => 5,
                                                            "Wicket" => 6,
                                                        );
                                                        foreach ($sid_list as $key => $val) {
                                                    ?>
                                                    <div class="col-12 col-md-4">
                                                        <div class="fancy-market" data-title="SUSPENDED">
                                                        <div class="market-row">
                                                            <div class="market-nation-detail d-flex flex-column"><span class="market-nation-name pointer"><? echo $key; ?></span>
                                                            <span style="color: black;" class="market_<? echo $val; ?>_b_exposure market_exposure"></span></div>
                                                            <div class=" blb-box">
                                                                <div class="market-odd-box back market_<? echo $val; ?>_b_btn"></div>
                                                            </div>
                                                            <div class="fancy-min-max-box">
                                                                <div class="fancy-min-max"><span class="w-100 d-block market_<? echo $val; ?>_min_max"> </span></div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <?
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="casino-last-result-title"><span>Last Result</span><span><a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=lucky15">View All</a></span></div>
                                            <div class="casino-last-results" id="last-result">
                                                <!-- <span class="result">6</span><span class="result">1</span><span class="result">1</span><span class="result">4</span><span class="result">2</span><span class="result">1</span><span class="result">6</span><span class="result">2</span><span class="result">4</span><span class="result">0</span> -->
                                            </div>
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
                                     <span>MY BETS</span>
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
                                                    <!-- <th>MatchDate</th> -->
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
                        <h4 class="modal-title">View More</h4>
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
                        <h4 class="modal-title">Lucky 15 Result</h4>
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
                <h4 class="modal-title">View More</h4>
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

<script type="text/javascript" src="<?php echo WEB_URL; ?>/js/socket.io.js"></script>
<script src="<?php echo WEB_URL; ?>/storage/front/js/flipclock.js" type="text/javascript"></script>


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
        var markettype = "LUCKY15";
        var markettype_2 = markettype;
        var back_html = "";
        var lay_html = "";
        var gstatus = "";
        var data6;
        var last_result_id = '0';
    function websocket(type) {
        socket = io.connect(websocketurl, {
            transports: ['websocket']
        });
        socket.on('connect', function () {
            socket.emit('Room', 'lucky15');
        });
    
    socket.on('gameIframe', function(data){
    	$("#casinoIframe").attr('src',data);
    });
        socket.on('game', function(data) {

           console.log("lucky15=",data);
                if(data && data['t1'] && data['t1']['mid']){
                	data['t1'][0] = data['t1'];
                }
                if (data && data['t1'] && data['t1'][0]) {
                	if(data.t1[0].rdesc != ""){
                    	$("#ball_run").text(data.t1[0].rdesc);
                    	$(".cricket20ballpopup").show();
                    }
                    else{
                    	$("#ball_run").html("");
                    	$(".cricket20ballpopup").hide();
                    }
                    if (oldGameId != data.t1[0].mid && data.t1[0].mid != 0 && data.t1[0].mid != "0") {
                        // setTimeout(function() {
                        //     clearCards();
                        // }, <?php echo CASINO_RESULT_TIMEOUT; ?>);
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
                        markettype = "LUCKY15";

                        b1 = b1 == 0 ? "" : b1;
                        bs1 = bs1 == 0 ? "" : bs1;
                         bs1 = bs1 / 1000;

                        l1 = l1 == 0 ? "" : l1;
                        ls1 = ls1 == 0 ? "" : ls1;


                        back_html = '<span class="market-odd">' + b1 + '</span><span class="market-volume">' + bs1 + 'k</span>';


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
                            $(".market_" + selectionid + "_b_btn").attr("data-title", 'suspended-box');
                            $(".market_" + selectionid + "_b_btn").addClass("suspended-box");

                            $(".market_" + selectionid + "_b_btn").removeClass("back-1");
                            $(".market_" + selectionid + "_b_btn").addClass("betting-disabled");
                        } else {

                            $(".market_" + selectionid + "_b_btn").removeAttr("data-title");
                            $(".market_" + selectionid + "_b_btn").removeClass("suspended-box");
                            $(".market_" + selectionid + "_b_btn").addClass("back-1");
                            $(".market_" + selectionid + "_b_btn").removeClass("betting-disabled");
                        }
                       /*  $(".market_" + selectionid + "_b_btn").removeClass("back-1"); */
                        min = data['t1'][0]['sub'][j].min.toString();
                        max = data['t1'][0]['sub'][j].max;
                        max = max / 1000;
                        $(".market_" + selectionid + "_min_max").html(`  Min:<span>${min}</span><br>Max:<span>${max}K</span> `);
                    }


                }
        });
        socket.on('gameResult', function (args) {
              if(args.data){
				updateResult(args.data);
			}else{
				updateResult(args['res']);
			}
        });
        socket.on('error', function (data) {
        });
        socket.on('close', function (data) {
        });
    }
    
        function clearCards() {
            refresh(markettype);


        } 

    function updateResult(data) { console.log("data",data);
            console.log("updated data",data);
            
             if (data && data[0]) {
                resultGameLast = data[0].mid;

                if (last_result_id != resultGameLast) {
                    last_result_id = resultGameLast;

                }

                html = "";
                var ab = "";
                var ab1 = "";
                casino_type = "'lucky15'";
                var swappedSidList = {
                    '1': "0",
                    '2': "1",
                    '3': "2",
                    '4': "4",
                    '5': "6",
                    '6': "W"
                };
                data.forEach((runData) => {
                        /* ab = "R";
                        ab1 = "R"; */
                        ab = "result-a";
                        ab1 = swappedSidList[runData.win];

                
                    eventId = runData.mid == 0 ? 0 : runData.mid;
                    html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="result ml-1  ' + ab + ' last-result">' + ab1 + '</span>';
                });
                $("#last-result").html(html);
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
            url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/lucky15/' + event_id,
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
            url: MASTER_URL + '/live-market/lucky15/active_bets/lucky15/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/lucky15/view_more_matched/lucky15/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/lucky15/market_analysis/lucky15/' + get_round_no(),
            type: 'POST',
            dataType: 'json',
            success: function (data) {
                if (typeof data.results[0] == 'undefined') {
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
        }, <?php echo CASINO_SET_INTERVAL; ?>);
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
<script>
const tooltipBtn = document.getElementById("tooltipBtn");
const tooltipClose = document.getElementById("tooltipClose");

tooltipBtn.addEventListener("click", function(e) {
    // Prevent closing when clicking inside tooltip-box
    if (!e.target.closest('.tooltip-box')) {
        this.classList.toggle("show-tooltip");
    }
});

// Close button action
tooltipClose.addEventListener("click", function(e) {
    e.stopPropagation(); // Prevent triggering the main click event
    tooltipBtn.classList.remove("show-tooltip");
});
</script>