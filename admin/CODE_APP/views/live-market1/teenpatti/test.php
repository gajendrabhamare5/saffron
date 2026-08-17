<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flipclock/0.7.8/flipclock.min.css">
<div class="col-md-12 main-container">
    <style type="text/css">
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

    .video-overlay {
        left: auto;
    }


    .teen-section {
        text-align: center;
    }

    .ball-runs.playerc {
        background: #355e3b;
        color: #08c;
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


    .casino-table-left-box,
    .casino-table-center-box,
    .casino-table-right-box {
        width: 49%;
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
        width: 60%;
    }

    .casino-table-header .casino-nation-detail {
        font-weight: bold;
        min-height: 25px;
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

    .casino-odds-box {
        width: 20%;
    }

    .casino-table-header .casino-odds-box {
        cursor: unset;
        padding: 2px;
        min-height: unset;
        height: auto !important;
    }

    .casino-table-row .casino-odds-box {
        width: 25%;
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

    .casino-nation-name {
        font-size: 16px;
        font-weight: bold;
    }

    .suspended-box {
        position: relative;
        pointer-events: none;
        cursor: none;
    }

    .teenpatti20-other-oods img {
        height: 35px;
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

    .casino-odds {
        font-size: 18px;
        font-weight: bold;
        line-height: 1;
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

    .under-over-row .uo-box {
        display: flex;
        flex-wrap: wrap;
        width: 48%;
        margin-top: 10px;
        /* border: 1px solid #c7c8ca; */
    }

    .teenpatti2 .under-over-row .uo-box .casino-nation-detail {
        width: 70%;
    }

    .teenpatti2 .under-over-row .uo-box .casino-odds-box {
        width: 30%;
    }

    .teenpatti2 .teen2other {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        border: 0;
    }

    .casino-table-full-box {
        width: 100%;
        /* border-left: 1px solid var(--table-border);
    border-right: 1px solid var(--table-border);
    border-top: 1px solid var(--table-border); */
        background-color: var(--bg-table-row);
    }

    .casino-table-full-box {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        padding: 10px;
        /* border-bottom: 1px solid var(--table-border); */
    }

    .casino-table-full-box img {
        height: 100px;
        z-index: 10;
    }

    .casino-odd-box-container {
        width: 25%;
        display: flex;
        flex-wrap: wrap;
        margin-left: -5px;
        margin-top: 20px;
    }

    .casino-odd-box-container .casino-odds-box {
        width: 50%;
    }

    .casino-nation-book {
        font-size: 12px;
        font-weight: bold;
        min-height: 18px;
        z-index: 1;
    }

    .teenpatti2 .teen2other .casino-odds-box {
        width: 16%;
        flex-direction: row;
        justify-content: space-between;
        padding: 5px 10px;
    }

    .bltitle img {
        height: 35px;
    }

    .teen2cards {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        border: 0;
        padding: 10px 10px 0 10px;
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

    .card-odd-box .casino-odds {
        margin-bottom: 5px;
        font-size: 14px;
    }

    .card-odd-box img {
        height: 75px;
    }

    .teenpatti20-other-oods {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        width: 100%;
    }

    .teenpatti20-other-oods .casino-table-left-box,
    .teenpatti20-other-oods .casino-table-right-box {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        border: 0;
        padding-top: 10px;
    }

    .teenpatti20 .teenpatti20-other-oods .casino-odds-box {
        width: 49%;
        flex-direction: row;
        justify-content: space-between;
        padding: 5px 10px;
    }

    .teenpatti20 .teenpatti20-other-oods img {
        height: 35px;
    }

    .teenpatti20-other-oods .casino-odds-box {
        width: 49%;
        flex-direction: row;
        justify-content: space-between;
        padding: 5px 10px;
    }

    .fancy-marker-title {
        margin-top: 10px;
    }

    @media only screen and (min-width: 1200px) and (max-width: 1399px) {
        .card-odd-box img {
            height: 45px;
        }
    }

    @media only screen and (max-width: 767px) {
        .casino-table-box {
            padding: 5px;
        }

        .casino-table-left-box,
        .casino-table-right-box {
            width: 100%;
            padding: 0 5px;
        }

        .teenpatti2 .teen2other .casino-odds-box {
            width: 49%;
            margin-bottom: 10px;
        }

        .teenpatti2 .casino-table-right-box {
            margin-top: 10px;
        }

        .card-odd-box img {
            height: 45px;
        }
    }

    .casino-table-box-divider {
        background-color: var(--table-border);
        width: 2px;
    }

    .game-heading .card-header-title {
        font-size: 16px !important;
        font-weight: bold !important;
        /* text-transform: uppercase !important; */
    }

    .game-heading .float-right {
        font-size: 12px;
    }

    .video-overlay {
        position: absolute;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.4);
        height: auto;
        padding: 5px;
    }

    .videoCards .text-white {
        font-weight: bold;
        font-size: 17px;
        line-height: 1.2;
        margin-bottom: 0;
        margin-top: 0;
    }

    .casino-last-result-title {
        padding: 10px;
        background-color: var(--theme2-bg70);
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

    .abc {
        color: #ef910f !important;
    }

    .box-w2 {
        width: 131px !important;
        max-width: 120px !important;
        min-width: 110px !important;
    }

    .table-bordered {
        border: 0px solid #dee2e6 !important;
    }

    table {
        border-collapse: unset !important;
    }

    .nav-tabs {
        border-bottom: 0px solid #dee2e6;
    }

    .player-number {
        border-right: 0px solid #08c !important;
    }

    .winner-icon {
        left: -7% !important;
    }

    .coupon-table tr td {
        height: 40px !important;
    }

     .info-block {
    position: relative;
    display: inline-block;
}

.min-max-info {
    position: absolute;
    top: 100%;
    right: 0;
    background-color: #333;
    color: #fff;
    padding: 5px 10px;
    font-size: 12px;
    white-space: nowrap;
    z-index: 10;
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
                    <div class="game-heading"> <span class="card-header-title">Teenpatti Test
                            <!-- <small class="teenpatti-rules" data-toggle="modal" data-target="#modalrulesteenpatti"><u>Rules</u></small> -->
                        </span> <span class="float-right">
                            Round ID: <span id="round-id" class="round_no">0</span> </span>
                    </div>
                    <div style="position: relative;">

                        <?php
                        if (!empty(IFRAME_URL_SET)) {
                        ?>
                        <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . TESTTEENPATTI_CODE; ?>"
                            width="100%" height="400px" style="border: 0px;"></iframe>
                        <?php

                        } else {
                        ?>
                        <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="400"
                            style="border: 0px;"></iframe>
                        <?php

                        }
                        ?>
                        <!-- <iframe id="casinoIframe" src="" width="100%" height="400" style="border: 0px;"></iframe> -->
                        <!-- <iframe id="tv-frame" width="100%" height="400" src="<?php echo IFRAME_URL . "" . TESTTEENPATTI_CODE; ?>" style="border:0px"></iframe> -->
                        <div class="video-overlay">
                            <div id="game-cards">
                                <div class="card-inner">
                                    <h3 class="text-white">Tiger</h3>
                                    <div> <img id="card_c1" src="../../../storage/front/img/cards/1.png"> <img
                                            id="card_c2" src="../../../storage/front/img/cards/1.png"> <img id="card_c3"
                                            src="../../../storage/front/img/cards/1.png"> </div>
                                </div>
                                <div class="card-inner">
                                    <h3 class="text-white">Lion</h3>
                                    <div> <img id="card_c4" src="../../../storage/front/img/cards/1.png"> <img
                                            id="card_c5" src="../../../storage/front/img/cards/1.png"> <img id="card_c6"
                                            src="../../../storage/front/img/cards/1.png"> </div>
                                </div>
                                <div class="card-inner">
                                    <h3 class="text-white">Dragon</h3>
                                    <div> <img id="card_c7" src="../../../storage/front/img/cards/1.png"> <img
                                            id="card_c8" src="../../../storage/front/img/cards/1.png"> <img id="card_c9"
                                            src="../../../storage/front/img/cards/1.png"> </div>
                                </div>
                            </div>
                        </div>
                        <div class="clock clock2digit flip-clock-wrapper"></div>

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
                                                        <img src="/storage/front/img/rules/teen6.jpg" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-content m-t-5">
                        <!-- <div class="fancy-marker-title">
                            <h4>&nbsp;
                                <span class="float-right">Min: <span id="min-bet">100</span> Max: <span id="max-bet">300000</span></span>
                            </h4> </div> -->
                        <div class=" m-b-10 main-market">
                            <table class="table coupon-table table-bordered ">
                                <!-- <thead>
                                    <tr>
                                        <th></th>
                                        <th colspan="3" class="back">Back</th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th class="box-w2 back">Tiger</th>
                                        <th class="box-w2 back">Lion</th>
                                        <th class="box-w2 back">Dragon</th>
                                    </tr>
                                </thead>
                                
                                <tbody id="teenpatti-bdy">
                                    <tr class="bet-info suspended market_11_row market_21_row market_31_row" data-title="SUSPENDED">
                                        <td><b>Winner</b></td>
                                        <td data-title="" class=" box-w2 back teen-section market_11_b_btn" data-sid="11" data-rate="2.94" data-nation="Winner">
                                            <button class="back"> <span class="odd">2.94</span> <span>0</span> </button>
                                        </td>
                                        <td data-title="" class=" box-w2 back teen-section market_21_b_btn" data-sid="21" data-rate="2.94" data-nation="Winner">
                                            <button class="back"><span class="odd">2.94</span><span>0</span></button>
                                        </td>
                                        <td data-title="" class=" box-w2 back teen-section market_31_b_btn" data-sid="31" data-rate="2.94" data-nation="Winner">
                                            <button class="back"><span class="odd">2.94</span><span>0</span></button>
                                        </td>
                                    </tr>
                                    <tr class="bet-info suspended market_12_row market_22_row market_32_row" data-title="SUSPENDED">
                                        <td><b>Pair</b></td>
                                        <td data-title="" class=" box-w2 back teen-section market_12_b_btn" data-sid="12" data-rate="5.00" data-nation="Pair">
                                            <button class="back"><span class="odd">5.00</span><span>0</span></button>
                                        </td>
                                        <td data-title="" class=" box-w2 back teen-section market_22_b_btn" data-sid="22" data-rate="5.00" data-nation="Pair">
                                            <button class="back"><span class="odd">5.00</span><span>0</span></button>
                                        </td>
                                        <td data-title="" class=" box-w2 back teen-section market_32_b_btn" data-sid="32" data-rate="5.00" data-nation="Pair">
                                            <button class="back"><span class="odd">5.00</span><span>0</span></button>
                                        </td>
                                    </tr>
                                    <tr class="bet-info suspended market_13_row market_23_row market_33_row" data-title="SUSPENDED">
                                        <td><b>Flush</b></td>
                                        <td data-title="" class=" box-w2 back teen-section market_13_b_btn" data-sid="13" data-rate="12.00" data-nation="Flush">
                                            <button class="back"><span class="odd">12.00</span><span>0</span></button>
                                        </td>
                                        <td data-title="" class=" box-w2 back teen-section market_23_b_btn" data-sid="23" data-rate="12.00" data-nation="Flush">
                                            <button class="back"><span class="odd">12.00</span><span>0</span></button>
                                        </td>
                                        <td data-title="" class=" box-w2 back teen-section market_33_b_btn" data-sid="33" data-rate="12.00" data-nation="Flush">
                                            <button class="back"><span class="odd">12.00</span><span>0</span></button>
                                        </td>
                                    </tr>
                                    <tr class="bet-info suspended market_14_row market_24_row market_34_row" data-title="SUSPENDED">
                                        <td><b>Straight</b></td>
                                        <td data-title="" class=" box-w2 back teen-section market_14_b_btn" data-sid="14" data-rate="21.00" data-nation="Straight">
                                            <button class="back"><span class="odd">21.00</span><span>0</span></button>
                                        </td>
                                        <td data-title="" class=" box-w2 back teen-section market_24_b_btn" data-sid="24" data-rate="21.00" data-nation="Straight">
                                            <button class="back"><span class="odd">21.00</span><span>0</span></button>
                                        </td>
                                        <td data-title="" class=" box-w2 back teen-section market_34_b_btn" data-sid="34" data-rate="21.00" data-nation="Straight">
                                            <button class="back"><span class="odd">21.00</span><span>0</span></button>
                                        </td>
                                    </tr>
                                    <tr class="bet-info suspended market_15_row market_25_row market_35_row" data-title="SUSPENDED">
                                        <td><b>Trio</b></td>
                                        <td data-title="" class=" box-w2 back teen-section market_15_b_btn" data-sid="15" data-rate="126.00" data-nation="Trio">
                                            <button class="back"><span class="odd">126.00</span><span>0</span></button>
                                        </td>
                                        <td data-title="" class=" box-w2 back teen-section market_25_b_btn" data-sid="25" data-rate="126.00" data-nation="Trio">
                                            <button class="back"><span class="odd">126.00</span><span>0</span></button>
                                        </td>
                                        <td data-title="" class=" box-w2 back teen-section market_35_b_btn" data-sid="35" data-rate="126.00" data-nation="Trio">
                                            <button class="back"><span class="odd">126.00</span><span>0</span></button>
                                        </td>
                                    </tr>
                                    <tr class="bet-info suspended market_16_row market_26_row market_36_row" data-title="SUSPENDED">
                                        <td><b>Straight Flush</b></td>
                                        <td data-title="" class=" box-w2 back teen-section market_16_b_btn" data-sid="16" data-rate="151.00" data-nation="Straight Flush">
                                            <button class="back"><span class="odd">151.00</span><span>0</span></button>
                                        </td>
                                        <td data-title="" class=" box-w2 back teen-section market_26_b_btn" data-sid="26" data-rate="151.00" data-nation="Straight Flush">
                                            <button class="back"><span class="odd">151.00</span><span>0</span></button>
                                        </td>
                                        <td data-title="" class=" box-w2 back teen-section market_36_b_btn" data-sid="36" data-rate="151.00" data-nation="Straight Flush">
                                            <button class="back"><span class="odd">151.00</span><span>0</span></button>
                                        </td>
                                    </tr>
                                </tbody>  -->
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="box-w2">Winner  <div class="info-block m-t-5" style="position: relative; display: block;">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info1" aria-expanded="false"
                                                            class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                        <div id="min-max-info1" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                            <span class="m-r-5"> R:100-3L</span>        
                                                        </div>
                                                    </div></th>
                                        <th class="box-w2">Pair  <div class="info-block m-t-5" style="position: relative; display: block;">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info2" aria-expanded="false"
                                                            class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                        <div id="min-max-info2" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                            <span class="m-r-5"> R:100-25k</span>        
                                                        </div>
                                                    </div></th>
                                        <th class="box-w2">Flush  <div class="info-block m-t-5" style="position: relative; display: block;">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info3" aria-expanded="false"
                                                            class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                        <div id="min-max-info3" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                            <span class="m-r-5"> R:100-10k</span>        
                                                        </div>
                                                    </div></th>
                                        <th class="box-w2">Straight  <div class="info-block m-t-5" style="position: relative; display: block;">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info4" aria-expanded="false"
                                                            class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                        <div id="min-max-info4" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                            <span class="m-r-5"> R:100-10k</span>        
                                                        </div>
                                                    </div></th>
                                        <th class="box-w2">Trio  <div class="info-block m-t-5" style="position: relative; display: block;">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info5" aria-expanded="false"
                                                            class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                        <div id="min-max-info5" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                            <span class="m-r-5"> R:100-5k</span>        
                                                        </div>
                                                    </div></th>
                                        <th class="box-w2">Straight Flush  <div class="info-block m-t-5" style="position: relative; display: block;">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info6" aria-expanded="false"
                                                            class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                        <div id="min-max-info6" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                            <span class="m-r-5"> R:100-5k</span>        
                                                        </div>
                                                    </div></th>
                                    </tr>
                                </thead>
                                <tbody id="teenpatti-bdy">
                                    <tr>
                                        <td><b>Tiger</b></td>
                                        <td data-title=""
                                            class=" box-w2 back teen-section market_11_b_btn market_11_row suspended-box"
                                            data-title="SUSPENDED" data-sid="11" data-rate="2.94" data-nation="Winner">
                                           
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back teen-section market_12_b_btn market_12_row suspended-box"
                                            data-title="SUSPENDED" data-sid="12" data-rate="5.00" data-nation="Pair">
                                            <button class="back"><span class="odd">5.00</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back teen-section market_13_b_btn market_13_row suspended-box"
                                            data-title="SUSPENDED" data-sid="13" data-rate="12.00" data-nation="Flush">
                                            <button class="back"><span class="odd">12.00</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back teen-section market_14_b_btn market_14_row suspended-box"
                                            data-title="SUSPENDED" data-sid="14" data-rate="21.00"
                                            data-nation="Straight">
                                            <button class="back"><span class="odd">21.00</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back teen-section market_15_b_btn market_15_row suspended-box"
                                            data-title="SUSPENDED" data-sid="15" data-rate="126.00" data-nation="Trio">
                                            <button class="back"><span class="odd">126.00</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back teen-section market_16_b_btn market_16_row suspended-box"
                                            data-title="SUSPENDED" data-sid="16" data-rate="151.00"
                                            data-nation="Straight Flush">
                                            <button class="back"><span class="odd">151.00</span></button>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td></td>
                                        <td style="text-align: center;color:red;">  <span>0</span> </td>
                                        <td style="text-align: center;color:red;">  <span>0</span> </td>
                                        <td style="text-align: center;color:red;">  <span>0</span> </td>
                                        <td style="text-align: center;color:red;">  <span>0</span> </td>
                                        <td style="text-align: center;color:red;">  <span>0</span> </td>
                                        <td style="text-align: center;color:red;">  <span>0</span> </td>
                                       
                                    </tr> -->
                                    <tr>
                                        <td><b>Lion</b></td>
                                        <td data-title=""
                                            class=" box-w2 back teen-section market_21_b_btn market_21_row suspended-box"
                                            data-title="SUSPENDED" data-sid="21" data-rate="2.94" data-nation="Winner">
                                            <button class="back"><span class="odd">2.94</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back teen-section market_22_b_btn market_22_row suspended-box"
                                            data-title="SUSPENDED" data-sid="22" data-rate="5.00" data-nation="Pair">
                                            <button class="back"><span class="odd">5.00</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back teen-section market_23_b_btn market_23_row suspended-box"
                                            data-title="SUSPENDED" data-sid="23" data-rate="12.00" data-nation="Flush">
                                            <button class="back"><span class="odd">12.00</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back teen-section market_24_b_btn market_24_row suspended-box"
                                            data-title="SUSPENDED" data-sid="24" data-rate="21.00"
                                            data-nation="Straight">
                                            <button class="back"><span class="odd">21.00</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back teen-section market_25_b_btn market_25_row suspended-box"
                                            data-title="SUSPENDED" data-sid="25" data-rate="126.00" data-nation="Trio">
                                            <button class="back"><span class="odd">126.00</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back teen-section market_26_b_btn market_26_row suspended-box"
                                            data-title="SUSPENDED" data-sid="26" data-rate="151.00"
                                            data-nation="Straight Flush">
                                            <button class="back"><span class="odd">151.00</span></button>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td></td>
                                        <td style="text-align: center;color:red;">  <span>0</span> </td>
                                        <td style="text-align: center;color:red;">  <span>0</span> </td>
                                        <td style="text-align: center;color:red;">  <span>0</span> </td>
                                        <td style="text-align: center;color:red;">  <span>0</span> </td>
                                        <td style="text-align: center;color:red;">  <span>0</span> </td>
                                        <td style="text-align: center;color:red;">  <span>0</span> </td>
                                       
                                    </tr> -->
                                    <tr>
                                        <td><b>Dragon</b></td>
                                        <td data-title=""
                                            class=" box-w2 back teen-section market_31_b_btn market_31_row suspended-box"
                                            data-title="SUSPENDED" data-sid="31" data-rate="2.94" data-nation="Winner">
                                            <button class="back"><span class="odd">2.94</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back teen-section market_32_b_btn market_32_row suspended-box"
                                            data-title="SUSPENDED" data-sid="32" data-rate="5.00" data-nation="Pair">
                                            <button class="back"><span class="odd">5.00</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back teen-section market_33_b_btn market_33_row suspended-box"
                                            data-title="SUSPENDED" data-sid="33" data-rate="12.00" data-nation="Flush">
                                            <button class="back"><span class="odd">12.00</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back teen-section market_34_b_btn market_34_row suspended-box"
                                            data-title="SUSPENDED" data-sid="34" data-rate="21.00"
                                            data-nation="Straight">
                                            <button class="back"><span class="odd">21.00</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back teen-section market_35_b_btn market_35_row suspended-box"
                                            data-title="SUSPENDED" data-sid="35" data-rate="126.00" data-nation="Trio">
                                            <button class="back"><span class="odd">126.00</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back teen-section market_36_b_btn market_36_row suspended-box"
                                            data-title="SUSPENDED" data-sid="36" data-rate="151.00"
                                            data-nation="Straight Flush">
                                            <button class="back"><span class="odd">151.00</span></button>
                                        </td>
                                    </tr>
                                     <!-- <tr>
                                        <td></td>
                                        <td style="text-align: center;color:red;">  <span>0</span> </td>
                                        <td style="text-align: center;color:red;">  <span>0</span> </td>
                                        <td style="text-align: center;color:red;">  <span>0</span> </td>
                                        <td style="text-align: center;color:red;">  <span>0</span> </td>
                                        <td style="text-align: center;color:red;">  <span>0</span> </td>
                                        <td style="text-align: center;color:red;">  <span>0</span> </td>
                                       
                                    </tr> -->
                                </tbody>
                            </table>
                            <!-- <div id="commetry" class="text-right text-info">Incase of Tie, The entire round will be cancelled || Odds are considered same as international exchange. || In "Trio" result, "Pair" should not be considered. || In "Straight Flush" result, "Straight" and "Flush" should not be considered.</div> -->
                        </div>
                    </div>
                    <div class="fancy-marker-title">
                        <h4>Last Result <a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=teen9"
                                class="text-right" style="font-size: 14px; float: right; color: #fff">View All</a></h4>
                    </div>
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
        <div id="modalpokerresult" class="modal fade show" tabindex='-1'>
            <div class="modal-dialog" style="min-width: 650px">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Teenpatti Test Result</h4>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/flipclock/0.7.8/flipclock.min.js" type="text/javascript"></script>

<script>
var site_url = '<?php echo WEB_URL; ?>';
var websocketurl = '<?php echo GAME_IP; ?>';
var clock = new FlipClock($(".clock"), {
    clockFace: "Counter"
});
var oldGameId = 0;
var resultGameLast = 0;
var markettype = "TESTTEENPATTI";
var live_market_data = {};
var markettype_2 = markettype;
var last_result_id = '0';

function websocket(type) {
    socket = io.connect(websocketurl, {
        transports: ['websocket']
    });
    socket.on('connect', function() {
        socket.emit('Room', 'teen9');
    });

    socket.on('gameIframe', function(data) {
        $("#casinoIframe").attr('src', data);
    });
    socket.on('game', function(data) {
        console.log("data=", data);

        if (data && data['t1'] && data['t1'][0]) {
            if (oldGameId != data.t1[0].mid && oldGameId != 0) {
                clearCards();
            }
            oldGameId = data.t1[0].mid;
            if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                //                    $(".casino-remark").text(data.t1[0].remark);
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
                markettype = "TESTTEENPATTI";
                runner = data['t2'][j].nation;
                selectionid = data['t2'][j].tsection;
                trate = data['t2'][j].trate;
                 trate = parseFloat(trate);

                var exposure_val = 0;
                if (typeof live_market_data[selectionid] !== 'undefined') {
                    exposure_val = live_market_data[selectionid].pl;
                }

                back_html = '<span class="d-block text-bold"><b>' + trate +
                    '</b></span> <span class="d-block market_' + selectionid +
                    '_b_exposure market_exposure" style="color: ' + ((exposure_val > 0) ? 'green' : 'red') +
                    ';">' + exposure_val + '</span>';
                $(".market_" + selectionid + "_b_btn").attr("side", "Back");
                $(".market_" + selectionid + "_b_btn").attr("selectionid", selectionid);
                $(".market_" + selectionid + "_b_btn").attr("marketid", selectionid);
                $(".market_" + selectionid + "_b_btn").attr("runner", runner);
                $(".market_" + selectionid + "_b_btn").attr("marketname", runner);
                $(".market_" + selectionid + "_b_btn").attr("eventid", eventId);
                $(".market_" + selectionid + "_b_btn").attr("markettype", markettype);
                $(".market_" + selectionid + "_b_btn").attr("event_name", markettype);
                $(".market_" + selectionid + "_b_btn").attr("fullmarketodds", trate);
                $(".market_" + selectionid + "_b_btn").attr("fullfancymarketrate", trate);
                $(".market_" + selectionid + "_b_btn").html(back_html);
                Lselectionid = data['t2'][j].lsection;
                lrate = data['t2'][j].lrate;
                 lrate = parseFloat(lrate);

                var exposure_val = 0;
                if (typeof live_market_data[Lselectionid] !== 'undefined') {
                    exposure_val = live_market_data[Lselectionid].pl;
                }
                back_html = '<span class="d-block text-bold"><b>' + lrate +
                    '</b></span> <span class="d-block market_' + Lselectionid +
                    '_b_exposure market_exposure" style="color: ' + ((exposure_val > 0) ? 'green' : 'red') +
                    ';">' + exposure_val + '</span>';
                $(".market_" + Lselectionid + "_b_btn").attr("side", "Back");
                $(".market_" + Lselectionid + "_b_btn").attr("selectionid", Lselectionid);
                $(".market_" + Lselectionid + "_b_btn").attr("marketid", Lselectionid);
                $(".market_" + Lselectionid + "_b_btn").attr("runner", runner);
                $(".market_" + Lselectionid + "_b_btn").attr("marketname", runner);
                $(".market_" + Lselectionid + "_b_btn").attr("eventid", eventId);
                $(".market_" + Lselectionid + "_b_btn").attr("markettype", markettype);
                $(".market_" + Lselectionid + "_b_btn").attr("event_name", markettype);
                $(".market_" + Lselectionid + "_b_btn").attr("fullmarketodds", lrate);
                $(".market_" + Lselectionid + "_b_btn").attr("fullfancymarketrate", lrate);
                $(".market_" + Lselectionid + "_b_btn").html(back_html);
                Dselectionid = data['t2'][j].dsectionid;
                drate = data['t2'][j].drate;
                 drate = parseFloat(drate);
                var exposure_val = 0;
                if (typeof live_market_data[Dselectionid] !== 'undefined') {
                    exposure_val = live_market_data[Dselectionid].pl;
                }
                back_html = '<span class="d-block text-bold"><b>' + drate +
                    '</b></span> <span class="d-block market_' + Dselectionid +
                    '_b_exposure market_exposure" style="color:' + ((exposure_val > 0) ? 'green' : 'red') +
                    ';">' + exposure_val + '</span>';
                $(".market_" + Dselectionid + "_b_btn").attr("side", "Back");
                $(".market_" + Dselectionid + "_b_btn").attr("selectionid", Dselectionid);
                $(".market_" + Dselectionid + "_b_btn").attr("marketid", Dselectionid);
                $(".market_" + Dselectionid + "_b_btn").attr("runner", runner);
                $(".market_" + Dselectionid + "_b_btn").attr("marketname", runner);
                $(".market_" + Dselectionid + "_b_btn").attr("eventid", eventId);
                $(".market_" + Dselectionid + "_b_btn").attr("markettype", markettype);
                $(".market_" + Dselectionid + "_b_btn").attr("event_name", markettype);
                $(".market_" + Dselectionid + "_b_btn").attr("fullmarketodds", drate);
                $(".market_" + Dselectionid + "_b_btn").attr("fullfancymarketrate", drate);
                $(".market_" + Dselectionid + "_b_btn").html(back_html);
                gstatus = data['t2'][j].tstatus.toString();
                if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "False") {
                    $(".market_" + selectionid + "_row").addClass("suspended-box");
                    $(".market_" + Lselectionid + "_row").addClass("suspended-box");
                    $(".market_" + Dselectionid + "_row").addClass("suspended-box");
                } else {
                    $(".market_" + selectionid + "_row").removeClass("suspended-box");
                    $(".market_" + Lselectionid + "_row").removeClass("suspended-box");
                    $(".market_" + Dselectionid + "_row").removeClass("suspended-box");
                }
            }
        } else {
            $(".timer_game").text("Left Time:0");
            $(".round_no").text("0");
        }
    });
    socket.on('gameResult', function(args) {
        updateResult(args.data);
    });
    socket.on('error', function(data) {});
    socket.on('close', function(data) {});
}

function clearCards() {
    // refresh(markettype);
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

function updateResult(data) {
    if (data && data[0]) {
        resultGameLast = data[0].mid;
        if (last_result_id != resultGameLast) {
            last_result_id = resultGameLast;

        }
        html = "";
        var ab = "";
        var ab1 = "";
        casino_type = "'teen9'";
        data.forEach(function(runData) {
            if (parseInt(runData.result) == 11) {
                ab = "playera";
                ab1 = "T";
            } else if (parseInt(runData.result) == 21) {
                ab = "playerb";
                ab1 = "L";
            } else {
                ab = "playerc";
                ab1 = "D";
            }
            eventId = runData.mid == 0 ? 0 : runData.mid.split(".")[1];
            html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type +
                ')"  class="ball-runs  ' + ab + ' last-result">' + ab1 + '</span>';
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
</script>
<script type="text/javascript">
function view_casiono_result(event_id, casino_type) {

    $("#cards_data").html("");
    $("#round_no").text(event_id);

    $.ajax({
        type: 'POST',
        url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/teen9/' + event_id,
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
    if (get_round_no() !== 0) {
        if (xhr && xhr.readyState != 4)
            xhr.abort();
        xhr = $.ajax({
            url: MASTER_URL + '/live-market/teenpatti/active_bets/test/' + get_round_no(),
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.results) {
                    $('#table_body').html(data.results);
                    $('#matchedCount').html('(' + data.total_bets + ')');
                }
            }
        });
    } else {
        $('#table_body').html('');
        $('#matchedCount').html('(0)');
    }
}
var xhr_vm;

function call_view_more_bets() {

    if (xhr_vm && xhr_vm.readyState != 4)
        xhr_vm.abort();
    xhr_vm = $.ajax({
        url: MASTER_URL + '/live-market/teenpatti/view_more_matched/test/' + get_round_no(),
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
    if (get_round_no() !== 0) {
        if (xhr_analysis && xhr_analysis.readyState != 4)
            xhr_analysis.abort();
        xhr_analysis = $.ajax({
            url: MASTER_URL + '/live-market/teenpatti/market_analysis/test/' + get_round_no(),
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                live_market_data = data.results;
            }
        });
    }
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