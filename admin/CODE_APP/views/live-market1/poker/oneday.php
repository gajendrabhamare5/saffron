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

    .live-poker {
        background: #EEEEEE;
    }

    .w-33 {
        min-width: 33.33% !important;
        width: 33.33% !important;
    }

    .suspended:after {
        width: 66.5%;
    }

    td.suspendedtd:after {
        width: 100%;
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

    /* .casino-table-left-box,
    .casino-table-center-box,
    .casino-table-right-box {
        width: 39%;
        border-left: 1px solid #c7c8ca;
        border-right: 1px solid #c7c8ca;
        border-top: 1px solid #c7c8ca;
        background-color: #f2f2f2;
    } */

    .casino-table-header,
    .casino-table-rowa {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        border: 1px solid #fc4242;
        background-color: #fc42422e;
        padding: 6px;
        min-height: 72px;
    }

    .casino-table-header,
    .casino-table-rowb {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        border: 2px solid #fdcf13;
        background-color: #fdcf132e;
        padding: 6px;
        min-height: 72px;
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

    .casino-nation-detail {
        width: 60%;
    }

    .casino-nation-name {
        font-size: 16px;
        font-weight: bold;
    }

    .casino-odds-box {
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 5px 0;
        font-weight: bold;
        border-left: 1px solid #c7c8ca;
        cursor: pointer;
        min-height: 46px;
    }

    .casino-odds-box {
        width: 20%;
    }

    .back {
         /* background-color: #72bbef !important;  */
             background-color: #cfcfcf;
    /* border-radius: 4px; */
    padding: 4px;
    width: 20%;
    color: #333;
    cursor: pointer;
    }

    .lay {
        /* background-color: #faa9ba !important; */
    }

    .casino-odds {
        font-size: 18px;
        font-weight: bold;
        line-height: 1;
    }

    .casino-table-box-divider {
        background-color: #c7c8ca;
        width: 2px;
    }

    .casino-table-left-box,
    .casino-table-center-box,
    .casino-table-right-box {
        width: 39%;
        border-left: 1px solid #c7c8ca;
        border-right: 1px solid #c7c8ca;
        border-top: 1px solid #c7c8ca;
        background-color: #f2f2f2;
    }

    .poker1day-other-odds {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .poker1day-other-odds .casino-table-left-box,
    .poker1day-other-odds .casino-table-right-box {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        border: 0;
        padding-top: 10px;
    }

    .poker1day-other-odds .casino-odds-box {
        width: 49%;
    }

    .casino-remark {
        padding: 0 5px;
        color: #097c93;
        font-weight: bold;
        font-size: 12px;
        max-width: 100%;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
        display: inline-block;
        width: 100%;
    }

    .casino-remark {
        width: calc(100% - 60px);
        float: right;
        padding-left: 10px;
    }

    .casino-nation-book {
        font-size: 12px;
        font-weight: bold;
        min-height: 18px;
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
        padding: 10px;
        background-color: var(--theme2-bg);
        color: #ffffff;
        font-size: 14px;
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
        width: 100%;
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

    .table-bordered td,
    .table-bordered th {
        padding: 4px 6px !important;
    }

    .winner-icon {
        bottom: 62% !important;
    }

    .playerabcardbox {
    width: 20%;
    background-color: #434343;
    display: flex
;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    height: 100%;
    border-radius: 8px;
    height: 180px;
    margin-top: 11px;
}

.playerabcardbox .poker-icon img {
    width: 120px;
}

.row.row5 {
    margin-left: -5px;
    margin-right: -5px;
}
.dealer-name.playera {
    color: #fc4242;
}
.dealer-name.playerb {
    color: #fdcf13;
}

.dealer-name {
    font-size: 18px;
    font-weight: bold;
}
.playerabcardbox img {
    width: 30px;
    margin-right: 5px;
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
                    <div class="game-heading"><span class="card-header-title">Poker 1-Day
                            <!-- <small role="button" class="teenpatti-rules" onclick="view_rules('poker-rules.jpeg')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u >Rules</u></small> -->
                            <!---->
                        </span>
                        <!-- <small role="button" class="teenpatti-rules" onclick="view_rules('1day_poker')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small> -->
                        <span class="float-right">
                            Round ID:
                            <span class="round_no">0</span>
                            <!-- | Min: <span >100</span> | Max: <span >200000</span> -->
                        </span>
                    </div>
                    <!---->
                    <div class="video-container">

                        <?php
                        if (!empty(IFRAME_URL_SET)) {
                        ?>
                        <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . ODIPOKER_CODE; ?>" width="100%"
                            height="400px" style="border: 0px;"></iframe>
                        <?php

                        } else {
                        ?>
                        <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="400"
                            style="border: 0px;"></iframe>
                        <?php

                        }
                        ?>

                        <!-- <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                             <iframe class="iframedesign" src="<?php echo IFRAME_URL;
                                                                                echo ODIPOKER_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
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
                        <div id="result-desc" style="display:none;">
                            <div class="m-b-5"><span class="greenbx">Winner:</span> <span id="desc1"></span> </div>
                            <div class="m-b-5"><span class="redbx">A:</span> <span id="desc2"></span> </div>
                            <div class="m-b-5"><span class="yellowbx">B:</span> <span id="desc3"></span> </div>
                        </div>
                        <div class="video-overlay">
                            <!-- <div class="card-inner">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3 class="text-white">Player A</h3>
                                        <div><img id="card_c1" src="/storage/front/img/cards_new/1.png"> <img id="card_c2" src="/storage/front/img/cards_new/1.png"></div>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <h3 class="text-white">Player B</h3> <img src="/storage/front/img/cards_new/1.png" id="card_c3"> <img id="card_c4" src="/storage/front/img/cards_new/1.png">
                                    </div>
                                </div>
                            </div> -->
                            <div class="card-inner">
                                <h3 class="text-white">Board</h3>
                                <div><img src="/storage/front/img/cards_new/1.png" id="card_c5"> <img id="card_c6"
                                        src="/storage/front/img/cards_new/1.png"> <img id="card_c7"
                                        src="/storage/front/img/cards_new/1.png"> <img id="card_c8"
                                        src="/storage/front/img/cards_new/1.png"> <img id="card_c9"
                                        src="/storage/front/img/cards_new/1.png"></div>
                            </div>
                        </div>
                        <div class="casino-video-right-icons">
                            <div title="Rules" class="casino-video-rules-icon tooltip-container" id="tooltipBtn">
                                <i class="fas fa-info-circle" style="margin: 6px 0 0 6px;"></i>
                                <div class="tooltip-box">
                                    <div class="tooltip-header">Rules <span class="tooltip-close"
                                            id="tooltipClose">&times;</span></div>
                                    <div class="tooltip-content">
                                        <div class="rules-body">
                                            <div>
                                                <style type="text/css">
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
                                                    <div>
                                                        <img src="/storage/front/img/rules/poker6.jpg"
                                                            class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="casino-detail">
                        <div class="casino-table">
                            <div class="casino-table-box">
                                <div class="casino-table-left-box">
                                    <div class="casino-table-body">
                                        <div class="casino-table-rowa ">
                                            <div class="casino-nation-detail">
                                                <div class="casino-nation-name">Player A</div>

                                            </div>
                                            <div class="casino-odds-box back market_1_row back-1 market_1_b_btn"><span
                                                    class="casino-odds market_1_b_value">1.92</span></div>
                                            <div class="casino-odds-box lay market_1_row lay-1 market_1_l_btn"><span
                                                    class="casino-odds market_1_l_value">1.96</span></div>
                                        </div>
                                    </div>
                                    <div
                                        class="casino-nation-book market_1_b_exposure market_exposure text-center text-danger">
                                    </div>
                                </div>
                                <!-- <div class="casino-table-box-divider"></div> -->

                                                <div class="playerabcardbox">
                                                    <div class="poker-icon">
                                                         <img src="https://versionobj.ecoassetsservice.com/v66/static/admin/img/poker.png">
                                                    </div> 
                                                    <div class="row row5 w-100">
                                                        <div class="col-12 col-md-6">
                                                            <div class="dealer-name playera">Player A</div> 
                                                            <div class="mt-1">
                                                            <span><img  src="/storage/front/img/cards_new/1.png" id="card_c1"></span>
                                                             <span><img  src="/storage/front/img/cards_new/1.png" id="card_c2"></span>
                                                            </div>
                                                        </div> 
                                                        <div class="col-12 col-md-6 text-right">
                                                            <div class="dealer-name playerb">Player B</div>
                                                             <div class="mt-1"><span>
                                                                <img  src="/storage/front/img/cards_new/1.png" id="card_c3"></span> 
                                                                <span> <img  src="/storage/front/img/cards_new/1.png" id="card_c4"></span>
                                                             </div>
                                                        </div>
                                                    </div>
                                                </div> 


                                <div class="casino-table-right-box">
                                    <div class="casino-table-body">
                                        <div class="casino-table-rowb ">
                                            <div class="casino-nation-detail">
                                                <div class="casino-nation-name">Player B</div>

                                            </div>
                                            <div
                                                class="casino-odds-box back suspended-box market_2_row back-1 market_2_b_btn">
                                                <span class="casino-odds market_2_b_value">0</span></div>
                                            <div
                                                class="casino-odds-box lay suspended-box market_2_row  lay-1 market_2_l_btn">
                                                <span class="casino-odds market_2_l_value">0</span></div>
                                        </div>
                                    </div>
                                    <div
                                        class="casino-nation-book market_2_b_exposure market_exposure text-center text-danger">
                                    </div>
                                </div>
                            </div>
                            <div class="poker1day-other-odds">
                                <div class="casino-table-left-box">
                                    <div class="w-100 d-xl-none mobile-nation-name">Player A</div>
                                    <div style="width: 49%;">
                                         <div class="casino-odds-box back suspended-box back-1 market_3_b_btn market_3_row" style="width: 100%;">
                                        <span class="casino-odds">2 Cards Bonus</span>
                                      
                                    </div>
                                      <div class="casino-nation-book market_3_b_exposure market_exposure" style="color: red;">0</div>
                                    </div>
                                    <div style="width: 49%;">
                                    <div class="casino-odds-box back suspended-box back-1 market_4_b_btn market_4_row" style="width: 100%;">
                                        <span class="casino-odds">7 Cards Bonus</span>
                                        
                                    </div>
                                    <div class="casino-nation-book market_4_b_exposure market_exposure" style="color: red;">0</div>
                                    </div>
                                </div>

                                <!-- <div class="casino-table-box-divider"></div> -->
                                <div class="casino-table-right-box">
                                    <div class="w-100 d-xl-none mobile-nation-name">Player B</div>
                                    <div style="width: 49%;">
                                        <div class="casino-odds-box back suspended-box back-1 market_5_b_btn market_5_row" style="width: 100%;">
                                            <span class="casino-odds">2 Cards Bonus</span>
                                          
                                        </div>
                                          <div class="casino-nation-book market_5_b_exposure market_exposure" style="color: red;">0</div>
                                    </div>
                                    <div style="width: 49%;">
                                        <div class="casino-odds-box back suspended-box back-1 market_6_b_btn market_6_row" style="width: 100%;">
                                            <span class="casino-odds">7 Cards Bonus</span>
                                           
                                        </div>
                                         <div class="casino-nation-book market_6_b_exposure market_exposure" style="color: red;">0</div>
                                    </div>
                                </div>
                            </div>

                            <div class="casino-remark-div mt-1 w-100">
                                <marquee scrollamount="3" class="casino-remark casino-remark-new">Play &amp; Win
                                </marquee>
                            </div>
                        </div>
                        <div class="casino-last-result-title"><span>Last Result</span><span><a
                                    href="casinoresults?game_type=poker">View All</a></span></div>
                        <div class="casino-last-results" id="last-result">
                            <!-- <span class="result result-b">B</span><span class="result result-a">A</span><span class="result result-b">B</span><span class="result result-b">B</span><span class="result result-a">A</span><span class="result result-b">B</span><span class="result result-b">B</span><span class="result result-a">A</span><span class="result result-a">A</span><span class="result result-b">B</span> -->
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

                            <a href="javascript:void(0)" class="btn btn-back float-right" id="view_more_bets">VIEW MORE</a>

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

                <div class="card m-b-10">
                    <div class="card-header">
                        <h6 class="card-title d-inline-block">
                            Rules
                        </h6>
                    </div>
                    <div class="card-body" style="padding: 10px;">
                        <table class="table table-bordered rules-table">
                            <tbody>
                                <tr class="text-center">
                                    <th colspan="2">Bonus 1 (2 Cards Bonus)</th>
                                </tr>
                                <tr>
                                    <td width="60%">Pair (2-10)</td>
                                    <td>1 TO 3</td>
                                </tr>
                                <tr>
                                    <td width="60%">A/Q or A/J Off Suited</td>
                                    <td>1 TO 5</td>
                                </tr>
                                <tr>
                                    <td width="60%">Pair (JQK)</td>
                                    <td>1 TO 10</td>
                                </tr>
                                <tr>
                                    <td width="60%">A/K Off Suited</td>
                                    <td>1 TO 15</td>
                                </tr>
                                <tr>
                                    <td width="60%">A/Q or A/J Suited</td>
                                    <td>1 TO 20</td>
                                </tr>
                                <tr>
                                    <td width="60%">A/K Suited</td>
                                    <td>1 TO 25</td>
                                </tr>
                                <tr>
                                    <td width="60%">A/A</td>
                                    <td>1 TO 30</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered rules-table">
                            <tbody>
                                <tr class="text-center">
                                    <th colspan="2">Bonus 2 (7 Cards Bonus)</th>
                                </tr>
                                <tr>
                                    <td width="60%">Three of a Kind</td>
                                    <td>1 TO 3</td>
                                </tr>
                                <tr>
                                    <td width="60%">Straight</td>
                                    <td>1 TO 4</td>
                                </tr>
                                <tr>
                                    <td width="60%">Flush</td>
                                    <td>1 TO 6</td>
                                </tr>
                                <tr>
                                    <td width="60%">Full House</td>
                                    <td>1 TO 8</td>
                                </tr>
                                <tr>
                                    <td width="60%">Four of a Kind</td>
                                    <td>1 TO 30</td>
                                </tr>
                                <tr>
                                    <td width="60%">Straight Flush</td>
                                    <td>1 TO 50</td>
                                </tr>
                                <tr>
                                    <td width="60%">Royal Flush</td>
                                    <td>1 TO 100</td>
                                </tr>
                            </tbody>
                        </table>
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

            <div class="modal-dialog" style="min-width: 1000px">

                <div class="modal-content">

                    <div class="modal-header">

                        <h4 class="modal-title">Poker 1-Day </h4>

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

                    <!-- <ul class="nav nav-tabs d-inline-block" role="tablist ">

                        <li class="nav-item d-inline-block">

                            <a class="nav-link  active " data-toggle="tab" href="#matched-bet2" id="matchedDataLink">Matched Bets</a>

                        </li>

                        <li class="nav-item d-inline-block">

                            <a class="nav-link " data-toggle="tab" href="#unmatched-bet2" id="unMatchedDataLink">Unmatched Bets</a>

                        </li>

                        <li class="nav-item d-inline-block">

                            <a class="nav-link " data-toggle="tab" href="#deleted-bet2" id="deletedMatchedDataLink">Deleted Bets</a>

                        </li>

                    </ul> -->

                    <div class="tab-content m-t-20">

                        <div id="matched-bet2" class="tab-pane active">

                            <!-- <form method="POST" id="form-view_more_bets">

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

                            </form> -->



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
var markettype = "ODI_POKER";
var markettype_2 = markettype;
var back_html = "";
var lay_html = "";
var gstatus = "";
var last_result_id = '0';

function websocket(type) {
    socket = io.connect(websocketurl, {
        transports: ['websocket']
    });
    socket.on('connect', function() {
        socket.emit('Room', 'poker');
    });

    socket.on('gameIframe', function(data) {
        $("#casinoIframe").attr('src', data);
    });
    socket.on('game', function(data) {

        if (data && data['t1'] && data['t1'][0]) {
            if (oldGameId != data.t1[0].mid && data.t1[0].mid != 0 && data.t1[0].mid != "0") {
                setTimeout(function(){
                 		clearCards();
                 	},<?php // echo CASINO_RESULT_TIMEOUT; ?>);
            }

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
                    $("#card_c1").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C1 +
                        ".png");
                }

                if (data.t1[0].C2 != 1) {
                    $("#card_c2").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C2 +
                        ".png");
                }

                if (data.t1[0].C3 != 1) {
                    $("#card_c3").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C3 +
                        ".png");
                }
                if (data.t1[0].C4 != 1) {
                    $("#card_c4").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C4 +
                        ".png");
                }
                if (data.t1[0].C5 != 1) {
                    $("#card_c5").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C5 +
                        ".png");
                }
                if (data.t1[0].C6 != 1) {
                    $("#card_c6").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C6 +
                        ".png");
                }
                if (data.t1[0].C7 != 1) {
                    $("#card_c7").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C7 +
                        ".png");
                }
                if (data.t1[0].C8 != 1) {
                    $("#card_c8").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C8 +
                        ".png");
                }
                if (data.t1[0].C9 != 1) {
                    $("#card_c9").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C9 +
                        ".png");
                }



            }
            clock.setValue(data.t1[0].autotime);
            $(".round_no").text(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid
                .split(".")[1] : data.t1[0].mid);
            $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0]
                .mid.split(".")[1] : data.t1[0].mid);
            eventId = data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[
                1] : data.t1[0].mid;

            for (var j in data['t2']) {
                selectionid = parseInt(data['t2'][j].sid);
                runner = data['t2'][j].nat || data['t2'][j].nation;
                b1 = data['t2'][j].b1;
                l1 = data['t2'][j].l1;
                markettype = "ODI_POKER";
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
                $(".market_" + selectionid + "_l_value").text(l1);
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
                gstatus = data['t2'][j].gstatus.toString();
                if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {

                    $(".market_" + selectionid + "_row").addClass("suspended-box");
                    $(".market_" + selectionid + "_b_btn").removeClass("back-1");
                } else {
                    $(".market_" + selectionid + "_b_btn").addClass("back-1");
                    $(".market_" + selectionid + "_row").removeClass("suspended-box");
                }
            }
            for (var j in data['t3']) {
                selectionid = parseInt(data['t3'][j].sid);
                runner = data['t3'][j].nation;
                b1 = data['t3'][j].b1;
                l1 = data['t3'][j].l1;
                markettype = "ODI_POKER";
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
                gstatus = data['t3'][j].gstatus.toString();
                if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {

                    $(".market_" + selectionid + "_row").addClass("suspended-box");
                    $(".market_" + selectionid + "_b_btn").removeClass("back-1");
                } else {
                    $(".market_" + selectionid + "_b_btn").addClass("back-1");
                    $(".market_" + selectionid + "_row").removeClass("suspended-box");
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

function getType(data) {
    var data1 = data;
    if (data) {
        data = data.split('DD');
        if (data.length > 1) {
            var obj = {
                type: '[',
                color: 'red',
                card: data[0]
            }
            return obj;
        } else {
            data = data1;
            data = data.split('HH');
            if (data.length > 1) {
                var obj = {
                    type: '{',
                    color: 'red',
                    card: data[0]
                }
                return obj;
            } else {
                data = data1;
                data = data.split('SS');
                if (data.length > 1) {
                    var obj = {
                        type: ']',
                        color: 'black',
                        card: data[0]
                    }
                    return obj;
                } else {
                    data = data1;
                    data = data.split('CC');
                    if (data.length > 1) {
                        var obj = {
                            type: '}',
                            color: 'black',
                            card: data[0]
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
   // refresh(markettype);
    $("#card_c1").attr("src", site_url + "storage/front/img/cards_new/1.png");
    $("#card_c2").attr("src", site_url + "storage/front/img/cards_new/1.png");
    $("#card_c3").attr("src", site_url + "storage/front/img/cards_new/1.png");
    $("#card_c4").attr("src", site_url + "storage/front/img/cards_new/1.png");
    $("#card_c5").attr("src", site_url + "storage/front/img/cards_new/1.png");
    $("#card_c6").attr("src", site_url + "storage/front/img/cards_new/1.png");
    $("#card_c7").attr("src", site_url + "storage/front/img/cards_new/1.png");
    $("#card_c8").attr("src", site_url + "storage/front/img/cards_new/1.png");
    $("#card_c9").attr("src", site_url + "storage/front/img/cards_new/1.png");
}

function updateResult(data) {
    if (data && data[0]) {
        /* data = JSON.parse(JSON.stringify(data)); */
        resultGameLast = data[0].mid;
        if (last_result_id != resultGameLast) {
            last_result_id = resultGameLast;

        }

        html = "";
        var ab = "";
        var ab1 = "";

        casino_type = "'poker'";
        data.forEach((runData) => {
            if (parseInt(runData.win) == 1) {
                ab = "result-a";
                ab1 = "A";

            } else if (parseInt(runData.win) == 2) {
                ab = "result-b";
                ab1 = "B";

            } else {
                ab = "playertie";
                ab1 = "T";

            }

            eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] :
                runData.mid;
            html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type +
                ')"  class="result ml-1  ' + ab + '">' + ab1 + '</span>';
        });
        $("#last-result").html(html);
        if (oldGameId == 0 || oldGameId == resultGameLast) {
            $("#card_c1").attr("src", site_url + "storage/front/img/cards_new/1.png");
            $("#card_c2").attr("src", site_url + "storage/front/img/cards_new/1.png");
            $("#card_c3").attr("src", site_url + "storage/front/img/cards_new/1.png");
            $("#card_c4").attr("src", site_url + "storage/front/img/cards_new/1.png");
            $("#card_c5").attr("src", site_url + "storage/front/img/cards_new/1.png");
            $("#card_c6").attr("src", site_url + "storage/front/img/cards_new/1.png");
            $("#card_c7").attr("src", site_url + "storage/front/img/cards_new/1.png");
            $("#card_c8").attr("src", site_url + "storage/front/img/cards_new/1.png");
            $("#card_c9").attr("src", site_url + "storage/front/img/cards_new/1.png");

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
        url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/poker/' + event_id,
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

$('.last-result').on('click', function() {

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
        url: MASTER_URL + '/live-market/poker/active_bets/oneday/' + get_round_no(),
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

var xhr_vm;

function call_view_more_bets() {

    if (xhr_vm && xhr_vm.readyState != 4)
        xhr_vm.abort();
    xhr_vm = $.ajax({
        url: MASTER_URL + '/live-market/poker/view_more_matched/oneday/' + get_round_no(),
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

    if (get_round_no() == 0) {
        $('.market_exposure').text(0).css('color', 'black');
        return false;
    }

    if (xhr_analysis && xhr_analysis.readyState != 4)
        xhr_analysis.abort();
    xhr_analysis = $.ajax({
        url: MASTER_URL + '/live-market/poker/market_analysis/oneday/' + get_round_no(),
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