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
        width: 100%;
    }

    td.suspendedtd:after {
        width: 100%;
    }

    .card-image {
        display: inline-block;
        min-width: 82px !important;
    }

    .low-high-btn .text-center {
        margin-bottom: 4px;
        /* adjust as needed */
    }

    .b1 {
        border: 5px solid #fc4242 !important;
    }

    .b2 {
        border: 5px solid #03b37f !important;
    }

    .lucky7cards {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        width: 24%;
        background-color: #f2f2f2;
        padding: 10px 0 0 0;
        height: 130px;
        align-content: flex-start;
    }

    .casino-table-box {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: flex-start;
    }

    .casino-odds {
        font-size: 18px;
        font-weight: bold;
        line-height: 1;
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

    .casino-odds-box-theme {
        background-image: linear-gradient(to right, #0088cc, #2c3e50);
        color: #ffffff;
        border-radius: 4px;
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
        border: 0;
    }

    .card-odd-box-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        cursor: pointer;
        padding: 5px;
        border-width: 5px;
        border-style: solid;
        border-color: rgba(67, 67, 67, 0.565);
        border-image: initial;
    }

    .card-odd-box {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        flex-direction: column;
        align-items: center;
        margin-bottom: 10px;
        margin-right: 10px;
        cursor: pointer;
    }

    .card-odd-box img {
        height: 50px;
    }

    .cards-top .cards-top-box {
        cursor: pointer;
        display: block !important;
        padding: 5px;
        border-width: 5px;
        border-style: solid;
        border-color: rgba(67, 67, 67, 0.565);
        border-image: initial;
    }
    .low-high-btn{
        font-size: 14px !important;
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
        left: -950%;
        width: 800px;
        height: 250px;
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
                <div class="coupon-card" style="background-color: #eee;">
                    <div class="game-heading">
                        <span class="card-header-title">Lucky 7 - A &nbsp;
                            <!-- <small class="teenpatti-rules" data-toggle="modal" data-target="#modalrulesteenpatti"><u>Rules</u></small> -->
                        </span>
                        <span class="float-right">
                            Round ID: <span id="round-id" class="round_no"></span></span>
                    </div>
                    <div style="position: relative;">

                        <?php
                        if (!empty(IFRAME_URL_SET)) {
                            ?>
                        <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . LUCKY7A_CODE; ?>" width="100%"
                            height="400px" style="border: 0px;"></iframe>
                        <?php

                        } else {
                            ?>
                        <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="400"
                            style="border: 0px;"></iframe>
                        <?php

                        }
                        ?>

                        <!-- <iframe id="casinoIframe" src="" width="100%" height="400" style="border: 0px;"></iframe> -->
                        <!-- <iframe width="100%" height="400" src="<?php echo IFRAME_URL . "" . LUCKY7A_CODE; ?>" style="border:0px"></iframe> -->
                        <div class="video-overlay">
                            <div id="game-cards">
                                <div class="card-inner">
                                    <h3 class="text-white">Cards</h3>
                                    <div>
                                        <img src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png" id="card_c1">
                                    </div>
                                </div>
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
                                                </style>
                                                <div class="rules-section">
                                                    <ul class="pl-4 pr-4 list-style">
                                                        <li>Lucky 7 is a 8 deck playing cards game, total 8 * 52 = 416
                                                            cards.</li>
                                                        <li>If the card is from ACE to 6, LOW Wins.</li>
                                                        <li>If the card is from 8 to KING, HIGH Wins.</li>
                                                        <li>If the card is 7, bets on high and low will lose 50% of the
                                                            bet amount.</li>
                                                    </ul>
                                                    <div>
                                                        <b class="rules-sub-highlight">LOW:</b>1,2,3,4,5,6 | <b
                                                            class="rules-sub-highlight">HIGH:</b>8,9,10,J,Q,K
                                                    </div>
                                                    <div>Payout:2.0</div>
                                                    <br>
                                                    <div>
                                                        <b class="rules-sub-highlight">EVEN:</b>2,4,6,8,10,Q
                                                    </div>
                                                    <div>Payout:2.10</div>
                                                    <br>
                                                    <div>
                                                        <b class="rules-sub-highlight">ODD:</b>1,3,5,7,9,J,K
                                                    </div>
                                                    <div>Payout:1.79</div>
                                                    <br>
                                                    <div>
                                                        <b class="rules-sub-highlight">RED:</b>
                                                    </div>
                                                    <div>Payout:1.95</div>
                                                    <br>
                                                    <div>
                                                        <b class="rules-sub-highlight">BLACK:</b>
                                                    </div>
                                                    <div>Payout:1.95
                                                    </div>
                                                    <br>
                                                    <b class="rules-sub-highlight">CARDS:</b>1,2,3,4,5,6,7,8,9,10,J,Q,K
                                                    <div>PAYOUT: 12.0</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="clock clock2digit flip-clock-wrapper"></div>
                        <div id="result-desc" style="display: none;"></div>
                    </div>
                    <div id="tableData">

                        <div class="card-content lucky-seven-content m-t-10">
                            <div class="d-flex justify-between" style="justify-content: space-between;">
                                <div class="d-flex" style="gap: 7px;width: 40%;">
                                    <div class="text-center" style="width: 40%;">
                                        <button class="low-high-btn showbet-action market_1_row market_1_b_btn b1"
                                            data-index="0" side="Back" selectionid="1" marketid="1"
                                            eventid="251507130035" markettype="LUCKY7B" event_name="LUCKY7B"
                                            fullmarketodds="2.00" fullfancymarketrate="2.00">
                                            <div class="text-center"> 2 </div>Low Card
                                        </button>
                                        <div class="ubook m-t-5 text-danger market_1_b_exposure market_exposure"
                                            style="color: rgb(0, 0, 0);">0</div>
                                    </div>
                                    <div class="text-center card-seven" style="width: 15%;"> <img
                                            src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/7.jpg"> </div>
                                    <div class="text-center" style="width: 40%;">
                                        <button class="low-high-btn showbet-action market_2_row market_2_b_btn b2"
                                            data-index="1" side="Back" selectionid="2" marketid="2"
                                            eventid="251507130035" markettype="LUCKY7B" event_name="LUCKY7B"
                                            fullmarketodds="2.00" fullfancymarketrate="2.00">
                                            <div class="text-center"> 2 </div>High Card
                                        </button>
                                        <div class="ubook m-t-5 text-danger market_2_b_exposure market_exposure"
                                            style="color: rgb(0, 0, 0);">0</div>
                                            <div class="casino-min-max text-right">
                                R:<span>100</span>-<span>1L</span></div>
                                    </div>
                                </div>
                                <div class="d-flex" style=" gap: 5px;width: 55%;">
                                    <div class="text-center" style="width: 25%;">
                                        <button
                                            class="suspended low-high-btn showbet-action market_3_row market_3_b_btn"
                                            data-index="2">
                                            <div class="text-center"> 2.1 </div>Even
                                        </button>
                                        <div class="ubook m-t-5 text-danger market_3_b_exposure market_exposure">
                                            <b>0</b>
                                        </div>
                                        <div class="casino-min-max text-right">
                                R:<span>100</span>-<span>25k</span></div>
                                    </div>
                                    <div class="text-center" style="width: 25%;">
                                        <button
                                            class="suspended low-high-btn showbet-action market_4_row market_4_b_btn"
                                            data-index="3">
                                            <div class="text-center"> 1.79 </div>Odd
                                        </button>
                                        <div class="ubook m-t-5 text-danger market_4_b_exposure market_exposure">
                                            <b>0</b>
                                        </div>
                                        <div class="casino-min-max text-right">
                                R:<span>100</span>-<span>25k</span></div>
                                    </div>
                                    <div class="text-center" style="width: 25%;">
                                        <button class="text-uppercase suspended btn-theme market_6_row market_6_b_btn"
                                            data-index="5">
                                            <div class="text-center" style="color: #fff;"> <b>1.95</b> </div>
                                            <div class="color-card"></div> <span class="card-icon"><span
                                                    class="card-black">]</span></span> <span class="card-icon"><span
                                                    class="card-black">}</span></span>
                                        </button>
                                        <div class="ubook m-t-5 text-danger market_6_b_exposure market_exposure">
                                            <b>0</b>
                                        </div>
                                        <div class="casino-min-max text-right">
                                R:<span>100</span>-<span>25k</span></div>
                                    </div>
                                    <div class="text-center" style="width: 25%;">
                                        <button class="text-uppercase suspended btn-theme market_5_row market_5_b_btn"
                                            data-index="4">
                                            <div class="text-center" style="color: #fff;"> <b>1.95</b> </div>
                                            <div class="color-card"></div> <span class="card-icon"><span
                                                    class="card-red">[</span></span> <span class="card-icon"><span
                                                    class="card-red">{</span></span>
                                        </button>
                                        <div class="ubook m-t-5 text-danger market_5_b_exposure market_exposure">
                                            <b>0</b>
                                        </div>
                                        <div class="casino-min-max text-right">
                                R:<span>100</span>-<span>25k</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="card-content lucky-seven-content m-t-10">
                          
                            <div class="row m-t-10">
                                <div class="col-5 text-center">
                                   
                                    <button class="suspended low-high-btn showbet-action market_1_row market_1_b_btn" data-index="0"> <div class="text-center"> <b>2</b> </div><b>Low Card</b></button>
                                    <div class="ubook m-t-5 text-danger market_1_b_exposure market_exposure"><b>0</b></div>
                                </div>
                                <div class="col-2 text-center card-seven"> <img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/7.jpg"> </div>
                                <div class="col-5 text-center">
                                     
                                    <button class="suspended low-high-btn showbet-action market_2_row market_2_b_btn" data-index="1"><div class="text-center"> <b>2</b> </div><b>High Card</b></button>
                                    <div class="ubook m-t-5 text-danger market_2_b_exposure market_exposure"><b>0</b></div>
                                </div>
                            </div>
                           
                        </div> -->
                        <!-- <div class="row">
                            <div class="col-6 p-r-5">
                                <div class="card-content lucky-seven-content m-t-10">
                                    <div class="row">
                                        <div class="col-6 text-center"> <b>2.12</b> </div>
                                        <div class="col-6 text-center"> <b>1.83</b> </div>
                                    </div>
                                    <div class="row m-t-10">
                                        <div class="col-6 text-center">
                                            <button class="suspended low-high-btn showbet-action market_3_row market_3_b_btn" data-index="2"><b>Even</b></button>
                                            <div class="ubook m-t-5 text-danger market_3_b_exposure market_exposure"><b>0</b></div>
                                        </div>
                                        <div class="col-6 text-center">
                                            <button class="suspended low-high-btn showbet-action market_4_row market_4_b_btn" data-index="3"><b>Odd</b></button>
                                            <div class="ubook m-t-5 text-danger market_4_b_exposure market_exposure"><b>0</b></div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-6 p-l-5">
                                <div class="card-content lucky-seven-content m-t-10">
                                    <div class="row">
                                        <div class="col-6 text-center"> <b>1.97</b> </div>
                                        <div class="col-6 text-center"> <b>1.97</b> </div>
                                    </div>
                                    <div class="row m-t-10">
                                        <div class="col-6 text-center">
                                            <button class="text-uppercase suspended btn-theme market_5_row market_5_b_btn" data-index="4">
                                                <div class="color-card"></div> <span class="card-icon"><span class="card-red">[</span></span> <span class="card-icon"><span class="card-red">{</span></span>
                                            </button>
                                            <div class="ubook m-t-5 text-danger market_5_b_exposure market_exposure"><b>0</b></div>
                                        </div>
                                        <div class="col-6 text-center">
                                            <button class="text-uppercase suspended btn-theme market_6_row market_6_b_btn" data-index="5">
                                                <div class="color-card"></div> <span class="card-icon"><span class="card-black">]</span></span> <span class="card-icon"><span class="card-black">}</span></span>
                                            </button>
                                            <div class="ubook m-t-5 text-danger market_6_b_exposure market_exposure"><b>0</b></div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div> -->

                        <div class="casino-table-box mt-3">
                            <div class="lucky7cards">
                                <div class="casino-odds w-100 text-center market_20_b_value">4</div>
                                <div class="card-odd-box-container suspended market_20_row back-1 market_20_b_btn"
                                    data-index="6">
                                    <div class="card-odd-box">
                                        <div class=""><img src="/storage/front/img/cards/A.png"></div>
                                    </div>
                                    <div class="card-odd-box">
                                        <div class=""><img src="/storage/front/img/cards/2.png"></div>
                                    </div>
                                    <div class="card-odd-box">
                                        <div class=""><img src="/storage/front/img/cards/3.png"></div>
                                    </div>
                                </div>
                                <div
                                    class="casino-nation-book text-center text-danger w-100 market_20_b_exposure market_exposure">
                                </div>
                                <div class="casino-min-max text-right">
                                R:<span>100</span>-<span>5k</span></div>
                            </div>
                            <div class="lucky7cards">
                                <div class="casino-odds w-100 text-center market_21_b_value">4</div>
                                <div class="card-odd-box-container suspended market_21_row back-1 market_21_b_btn"
                                    data-index="7">
                                    <div class="card-odd-box">
                                        <div class=""><img src="/storage/front/img/cards/4.png"></div>
                                    </div>
                                    <div class="card-odd-box">
                                        <div class=""><img src="/storage/front/img/cards/5.png"></div>
                                    </div>
                                    <div class="card-odd-box">
                                        <div class=""><img src="/storage/front/img/cards/6.png"></div>
                                    </div>
                                </div>
                                <div
                                    class="casino-nation-book text-center text-danger w-100 market_21_b_exposure market_exposure">
                                </div>
                                <div class="casino-min-max text-right">
                                R:<span>100</span>-<span>5k</span></div>
                            </div>
                            <div class="lucky7cards">
                                <div class="casino-odds w-100 text-center market_22_b_value">4</div>
                                <div class="card-odd-box-container suspended market_22_row back-1 market_22_b_btn"
                                    data-index="8">
                                    <div class="card-odd-box">
                                        <div class=""><img src="/storage/front/img/cards/8.png"></div>
                                    </div>
                                    <div class="card-odd-box">
                                        <div class=""><img src="/storage/front/img/cards/9.png"></div>
                                    </div>
                                    <div class="card-odd-box">
                                        <div class=""><img src="/storage/front/img/cards/10.png"></div>
                                    </div>
                                </div>
                                <div
                                    class="casino-nation-book text-center text-danger w-100 market_22_b_exposure market_exposure">
                                </div>
                                <div class="casino-min-max text-right">
                                R:<span>100</span>-<span>5k</span></div>
                            </div>
                            <div class="lucky7cards">
                                <div class="casino-odds w-100 text-center market_23_b_value">4</div>
                                <div class="card-odd-box-container suspended market_23_row back-1 market_23_b_btn"
                                    data-index="9">
                                    <div class="card-odd-box">
                                        <div class=""><img src="/storage/front/img/cards/J.png"></div>
                                    </div>
                                    <div class="card-odd-box">
                                        <div class=""><img src="/storage/front/img/cards/Q.png"></div>
                                    </div>
                                    <div class="card-odd-box">
                                        <div class=""><img src="/storage/front/img/cards/K.png"></div>
                                    </div>
                                </div>
                                <div
                                    class="casino-nation-book text-center text-danger w-100 market_23_b_exposure market_exposure">
                                </div>
                                <div class="casino-min-max text-right">
                                R:<span>100</span>-<span>5k</span></div>
                            </div>
                        </div>

                        <div class="card-content lucky-seven-content m-t-10">
                            <div class="row">
                                <div class="col-12 text-center market_7_b_value"> 0 </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-12 text-center card-seven">
                                    <div class=" m-r-5 card-image showbet-action" data-index="6">
                                        <div class=" market_7_row market_7_b_btn"><img
                                                src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/1.jpg"></div>
                                        <div class="ubook m-t-5 text-danger market_7_b_exposure market_exposure">
                                            <b>0</b>
                                        </div>
                                    </div>
                                    <div class="m-r-5 card-image showbet-action" data-index="7">
                                        <div class=" market_8_row market_8_b_btn"><img
                                                src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/2.jpg"></div>
                                        <div class="ubook m-t-5 text-danger market_8_b_exposure market_exposure">
                                            <b>0</b>
                                        </div>
                                    </div>
                                    <div class="m-r-5 card-image showbet-action" data-index="8">
                                        <div class=" market_9_row market_9_b_btn"><img
                                                src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/3.jpg"></div>
                                        <div class="ubook m-t-5 text-danger market_9_b_exposure market_exposure">
                                            <b>0</b>
                                        </div>
                                    </div>
                                    <div class="m-r-5 card-image showbet-action" data-index="9">
                                        <div class=" market_10_row market_10_b_btn"><img
                                                src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/4.jpg"></div>
                                        <div class="ubook m-t-5 text-danger market_10_b_exposure market_exposure">
                                            <b>0</b>
                                        </div>
                                    </div>
                                    <div class="m-r-5 card-image showbet-action" data-index="10">
                                        <div class=" market_11_row market_11_b_btn"><img
                                                src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/5.jpg"></div>
                                        <div class="ubook m-t-5 text-danger market_11_b_exposure market_exposure">
                                            <b>0</b>
                                        </div>
                                    </div>
                                    <div class="m-r-5 card-image showbet-action" data-index="11">
                                        <div class=" market_12_row market_12_b_btn"><img
                                                src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/6.jpg"></div>
                                        <div class="ubook m-t-5 text-danger market_12_b_exposure market_exposure">
                                            <b>0</b>
                                        </div>
                                    </div>
                                    <div class="m-r-5 card-image showbet-action" data-index="12">
                                        <div class=" market_13_row market_13_b_btn"><img
                                                src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/7.jpg"></div>
                                        <div class="ubook m-t-5 text-danger market_13_b_exposure market_exposure">
                                            <b>0</b>
                                        </div>
                                    </div>
                                    <div class="m-r-5 card-image showbet-action" data-index="13">
                                        <div class=" market_14_row market_14_b_btn"><img
                                                src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/8.jpg"></div>
                                        <div class="ubook m-t-5 text-danger market_14_b_exposure market_exposure">
                                            <b>0</b>
                                        </div>
                                    </div>
                                    <div class="m-r-5 card-image showbet-action" data-index="14">
                                        <div class=" market_15_row market_15_b_btn"><img
                                                src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/9.jpg"></div>
                                        <div class="ubook m-t-5 text-danger market_15_b_exposure market_exposure">
                                            <b>0</b>
                                        </div>
                                    </div>
                                    <div class="m-r-5 card-image showbet-action" data-index="15">
                                        <div class=" market_16_row market_16_b_btn"><img
                                                src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/10.jpg"></div>
                                        <div class="ubook m-t-5 text-danger market_16_b_exposure market_exposure">
                                            <b>0</b>
                                        </div>
                                    </div>
                                    <div class="m-r-5 card-image showbet-action" data-index="16">
                                        <div class=" market_17_row market_17_b_btn"><img
                                                src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/11.jpg"></div>
                                        <div class="ubook m-t-5 text-danger market_17_b_exposure market_exposure">
                                            <b>0</b>
                                        </div>
                                    </div>
                                    <div class="m-r-5 card-image showbet-action" data-index="17">
                                        <div class=" market_18_row market_18_b_btn"><img
                                                src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/12.jpg"></div>
                                        <div class="ubook m-t-5 text-danger market_18_b_exposure market_exposure">
                                            <b>0</b>
                                        </div>
                                    </div>
                                    <div class="m-r-5 card-image showbet-action" data-index="18">
                                        <div class=" market_19_row market_19_b_btn"><img
                                                src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/13.jpg"></div>
                                        <div class="ubook m-t-5 text-danger market_19_b_exposure market_exposure">
                                            <b>0</b>
                                        </div>
                                    </div>
                                    <div class="casino-min-max text-right">
                                R:<span>100</span>-<span>5k</span></div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="fancy-marker-title">
                        <h4>Last Result <a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=lucky7"
                                class="text-right" style="font-size: 14px; float: right; color: #fff">View All</a></h4>
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
                        <h4 class="modal-title">Lucky 7 - A Result</h4>
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
var data6;
var markettype = "LUCKY7";

function websocket(type) {
    socket = io.connect(websocketurl, {
        transports: ['websocket']
    });
    socket.on('connect', function() {
        socket.emit('Room', 'lucky7');
    });

    socket.on('gameIframe', function(data) {
        $("#casinoIframe").attr('src', data);
    });
    socket.on('game', function(data) {

            if (data && data['t1'] && data['t1'][0]) {

                  if (oldGameId != data.t1[0].mid && data.t1[0].mid != 0 && data.t1[0].mid != "0") {
                 setTimeout(function() {
                     clearCards();
                 }, <?php  //echo CASINO_RESULT_TIMEOUT; ?>);
            }
        }

        if (data && data['t1'] && data['t1'][0]) {

            oldGameId = data.t1[0].mid;
            if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                $(".casino-remark").text(data.t1[0].remark);
                if (data.t1[0].C1 != 1) {
                    $("#card_c1").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C1 + ".png");
                }

            }
            clock.setValue(data.t1[0].autotime);
            $(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
            $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
            eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1];
            for (var j in data['t2']) {
                selectionid = parseInt(data['t2'][j].sid);
                runner = data['t2'][j].nat;
                b1 = data['t2'][j].rate;
                b1 = parseFloat(b1);
                b1_label = b1;
                if (selectionid == 1) {
                    $(".n-bck").html(data['t2'][j].min);
                    $(".x-bck").html(data['t2'][j].max);
                }

                markettype = "LUCKY7";
                 $(".market_" + selectionid + "_b_value").html(b1);
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
                if (gstatus == "SUSPENDED" || gstatus == "0") {
                    $(".market_" + selectionid + "_row").addClass("suspended");
                     $(".market_" + selectionid + "_b_value").html('0');
                } else {
                    $(".market_" + selectionid + "_row").removeClass("suspended");
                }
            }
        }
    });
    socket.on('gameResult', function(args) {
        updateResult(args.data);
    });
    socket.on('error', function(data) {});
    socket.on('close', function(data) {});
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
        } else {
            data = data1;
            data = data.split('DD');
            if (data.length > 1) {
                var obj = {
                    type: '{',
                    color: 'red',
                    card: data[0]
                }
                return obj;
            } else {
                data = data1;
                data = data.split('HH');
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
    //refresh(markettype);
    $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
}

function updateResult(data) {
    if (data && data[0]) {
        resultGameLast = data[0];
        html = "";
        var ab = "";
        var ab1 = "";
        casino_type = "'lucky7'";
        data.forEach(function(runData) {
            if (parseInt(runData.result) == 1) {
                ab = "playera";
                ab1 = "L";
            } else if (parseInt(runData.result) == 2) {
                ab = "playerb";
                ab1 = "H";
            } else {
                ab = "playerc";
                ab1 = "T";
            }

            eventId = runData.mid == 0 ? 0 : runData.mid.split(".")[1];
            html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type +
                ')"  class="ball-runs  ' + ab + ' last-result">' + ab1 + '</span>';
        });
        $("#last-result").html(html);
        if (oldGameId == 0 || oldGameId == resultGameLast) {
            $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
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
        url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/lucky7/' + event_id,
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
    }
    if (xhr && xhr.readyState != 4)
        xhr.abort();
    xhr = $.ajax({
        url: MASTER_URL + '/live-market/lucky7/active_bets/lucky7/' + get_round_no(),
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
        url: MASTER_URL + '/live-market/lucky7/view_more_matched/lucky7/' + get_round_no(),
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
        url: MASTER_URL + '/live-market/lucky7/market_analysis/lucky7/' + get_round_no(),
        type: 'POST',
        dataType: 'json',
        success: function(data) {
            if (typeof data.results[0] == 'undefined') {
                $('.market_exposure').text(0).css('color', 'black');
            }
            $.each(data.results, function(index, value) {
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

$(function() {

    setTimeout(function() {
        call_active_bets();
        call_analysis();
    }, 2000);
    setInterval(function() {
        call_active_bets();
        call_analysis();
    }, <?php echo CASINO_SET_INTERVAL; ?>);
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