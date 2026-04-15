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
            min-width: 80px !important;
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

        .casino-open-card-box {
    display: flex
;
    flex-wrap: wrap;
    background-color: #434343;
    padding: 10px;
    border-radius: 16px;
    margin-bottom: 10px;
}
.casino-open-card-box > div {
    width: 12.5%;
    text-align: center;
    display: flex
;
    flex-wrap: wrap;
    color: yellow;
}
 .casino-open-card-box > div > div {
    text-align: center;
    width: 100%;
    display: flex
;
    flex-wrap: wrap;
    justify-content: center;
}
 .casino-open-card-box img {
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
                    <div class="game-heading"> <span class="card-header-title">Teenpatti Open
                            <!-- <small class="teenpatti-rules" data-toggle="modal" data-target="#modalrulesteenpatti"><u>Rules</u></small> -->
                        </span> <span class="float-right">
                            Round ID: <span id="round-id" class="round_no">0</span> </span>
                    </div>
                    <div style="position: relative;">

                        <?php
                        if (!empty(IFRAME_URL_SET)) {
                        ?>
                            <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . OPENTEENPATTI_CODE; ?>"
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
                            <div class="videoCards">
                                <div>
                                    <h6 class="text-white">DEALER</h6>
                                    <div>
                                        <img id="card8" src="/storage/front/img/cards_new/1.png">
                                        <img id="card17" src="/storage/front/img/cards_new/1.png">
                                        <img id="card26" src="/storage/front/img/cards_new/1.png">
                                    </div>
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
                                                        <img src="/storage/front/img/rules/teen6.jpg"
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
                    <div class="card-content m-t-5">

                        <div class="casino-open-card-box">
                            <div>
                                <div><b>1</b></div>
                                <div>
                                    <span showclosecard="true" > <img src="/storage/front/img/cards_new/1.png" id="card0"></span> 
                                    <span showclosecard="true"><img src="/storage/front/img/cards_new/1.png" id="card9"></span> 
                                    <span showclosecard="true"><img src="/storage/front/img/cards_new/1.png" id="card18"></span>
                                </div>
                            </div>
                            <div>
                                <div><b>2</b></div>
                                <div><span showclosecard="true">
                                    <img src="/storage/front/img/cards_new/1.png" id="card1"></span> <span showclosecard="true">
                                    <img src="/storage/front/img/cards_new/1.png" id="card10"></span> <span showclosecard="true">
                                    <img src="/storage/front/img/cards_new/1.png" id="card19"></span>
                                </div>
                            </div>
                            <div>
                                <div><b>3</b></div>
                                <div><span showclosecard="true">
                                    <img src="/storage/front/img/cards_new/1.png" id="card2"></span> <span showclosecard="true">
                                    <img src="/storage/front/img/cards_new/1.png" id="card11"></span> <span showclosecard="true">
                                    <img src="/storage/front/img/cards_new/1.png" id="card20"></span>
                                </div>
                            </div>
                            <div>
                                <div><b>4</b></div>
                                <div><span showclosecard="true">
                                    <img src="/storage/front/img/cards_new/1.png" id="card3"></span> <span showclosecard="true">
                                    <img src="/storage/front/img/cards_new/1.png" id="card12"></span> <span showclosecard="true">
                                    <img src="/storage/front/img/cards_new/1.png" id="card21"></span>
                                </div>
                            </div>
                            <div>
                                <div><b>5</b></div>
                                <div><span showclosecard="true">
                                    <img src="/storage/front/img/cards_new/1.png" id="card4"></span> <span showclosecard="true">
                                    <img src="/storage/front/img/cards_new/1.png" id="card13"></span> <span showclosecard="true">
                                    <img src="/storage/front/img/cards_new/1.png" id="card22"></span>
                                </div>
                            </div>
                            <div>
                                <div><b>6</b></div>
                                <div><span showclosecard="true">
                                    <img src="/storage/front/img/cards_new/1.png" id="card5"></span> <span showclosecard="true">
                                    <img src="/storage/front/img/cards_new/1.png" id="card14"></span> <span showclosecard="true">
                                    <img src="/storage/front/img/cards_new/1.png" id="card23"></span>
                                </div>
                            </div>
                            <div>
                                <div><b>7</b></div>
                                <div><span showclosecard="true">
                                    <img src="/storage/front/img/cards_new/1.png" id="card6"></span> <span showclosecard="true">
                                    <img src="/storage/front/img/cards_new/1.png" id="card15"></span> <span showclosecard="true">
                                    <img src="/storage/front/img/cards_new/1.png" id="card24"></span>
                                </div>
                            </div>
                            <div>
                                <div><b>8</b></div>
                                <div><span showclosecard="true">
                                    <img src="/storage/front/img/cards_new/1.png" id="card7"></span> <span showclosecard="true">
                                    <img src="/storage/front/img/cards_new/1.png" id="card16"></span> <span showclosecard="true">
                                    <img src="/storage/front/img/cards_new/1.png" id="card25"></span>
                                </div>
                            </div>
                        </div>


                        <!-- <div class="fancy-marker-title">
                            <h4>&nbsp;
                                <span class="float-right">Min: <span id="min-bet">100</span> Max: <span id="max-bet">300000</span></span>
                            </h4> </div> -->
                        <div class=" m-b-10 main-market">
                            <table class="table coupon-table table-bordered ">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="box-w2">Player 1</th>
                                        <th class="box-w2">Player 2</th>
                                        <th class="box-w2">Player 3</th>
                                        <th class="box-w2">Player 4</th>
                                        <th class="box-w2">Player 5</th>
                                        <th class="box-w2">Player 6</th>
                                        <th class="box-w2">Player 7</th>
                                        <th class="box-w2">Player 8</th>
                                    </tr>
                                </thead>
                                <tbody id="teenpatti-bdy">
                                    <tr>
                                        <td><b>Odds</b>
                                            <div class="info-block m-t-5" style="position: relative; display: inline-block;">
                                                <a href="#" data-toggle="collapse" data-target="#min-max-info1" aria-expanded="false"
                                                    class="info-icon collapsed">
                                                    <i class="fas fa-info-circle m-l-10"></i>
                                                </a>
                                                <div id="min-max-info1" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                    <span class="m-r-5"> R:100-1L</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back teen-section market_1_b_btn market_1_row market_1_val suspended-box"
                                            data-title="SUSPENDED" data-sid="11" data-rate="1.98" data-nation="Winner">
                                            <button class="back"> <span class="odd">1.98</span> <span>0</span> </button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back  teen-section market_2_b_btn market_2_row market_2_val suspended-box"
                                            data-title="SUSPENDED" data-sid="12" data-rate="1.98" data-nation="Pair">
                                            <button class="back"><span class="odd">1.98</span><span>0</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back  teen-section market_3_b_btn market_3_row market_3_val suspended-box"
                                            data-title="SUSPENDED" data-sid="13" data-rate="1.98" data-nation="Flush">
                                            <button class="back"><span class="odd">1.98</span><span>0</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back  teen-section market_4_b_btn market_4_row market_4_val suspended-box"
                                            data-title="SUSPENDED" data-sid="14" data-rate="1.98"
                                            data-nation="Straight">
                                            <button class="back"><span class="odd">1.98</span><span>0</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back  teen-section market_5_b_btn market_5_row market_5_val suspended-box"
                                            data-title="SUSPENDED" data-sid="15" data-rate="1.98" data-nation="Trio">
                                            <button class="back"><span class="odd">1.98</span><span>0</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back  teen-section market_6_b_btn market_6_row market_6_val suspended-box"
                                            data-title="SUSPENDED" data-sid="16" data-rate="1.98"
                                            data-nation="Straight Flush">
                                            <button class="back"><span class="odd">1.98</span><span>0</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back  teen-section market_7_b_btn market_7_row market_7_val suspended-box"
                                            data-title="SUSPENDED" data-sid="16" data-rate="1.98"
                                            data-nation="Straight Flush">
                                            <button class="back"><span class="odd">1.98</span><span>0</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back  teen-section market_8_b_btn market_8_row market_8_val suspended-box"
                                            data-title="SUSPENDED" data-sid="16" data-rate="1.98"
                                            data-nation="Straight Flush">
                                            <button class="back"><span class="odd">1.98</span><span>0</span></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Pair Plus</b>
                                            <div class="info-block m-t-5" style="position: relative; display: inline-block;">
                                                <a href="#" data-toggle="collapse" data-target="#min-max-info2" aria-expanded="false"
                                                    class="info-icon collapsed">
                                                    <i class="fas fa-info-circle m-l-10"></i>
                                                </a>
                                                <div id="min-max-info2" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                    <span class="m-r-5"> R:100-10k</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back  teen-section market_9_b_btn market_9_row suspended-box"
                                            data-title="SUSPENDED" data-sid="21" data-rate="2.94" data-nation="Winner">
                                            <button><span class="odd">Pair Plus 1</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back  teen-section market_10_b_btn market_10_row suspended-box"
                                            data-title="SUSPENDED" data-sid="22" data-rate="5.00" data-nation="Pair">
                                            <button><span class="odd">Pair Plus 2</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back  teen-section market_11_b_btn market_11_row suspended-box"
                                            data-title="SUSPENDED" data-sid="23" data-rate="12.00" data-nation="Flush">
                                            <button><span class="odd">Pair Plus 3</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back  teen-section market_12_b_btn market_12_row suspended-box"
                                            data-title="SUSPENDED" data-sid="24" data-rate="21.00"
                                            data-nation="Straight">
                                            <button><span class="odd">Pair Plus 4</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back  teen-section market_13_b_btn market_13_row suspended-box"
                                            data-title="SUSPENDED" data-sid="25" data-rate="126.00" data-nation="Trio">
                                            <button><span class="odd">Pair Plus 5</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back  teen-section market_14_b_btn market_14_row suspended-box"
                                            data-title="SUSPENDED" data-sid="26" data-rate="151.00"
                                            data-nation="Straight Flush">
                                            <button><span class="odd">Pair Plus 6</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back  teen-section market_15_b_btn market_15_row suspended-box"
                                            data-title="SUSPENDED" data-sid="26" data-rate="151.00"
                                            data-nation="Straight Flush">
                                            <button><span class="odd">Pair Plus 7</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back  teen-section market_16_b_btn market_16_row suspended-box"
                                            data-title="SUSPENDED" data-sid="26" data-rate="151.00"
                                            data-nation="Straight Flush">
                                            <button><span class="odd">Pair Plus 8</span></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Total</b>
                                            <div class="info-block m-t-5" style="position: relative; display: inline-block;">
                                                <a href="#" data-toggle="collapse" data-target="#min-max-info3" aria-expanded="false"
                                                    class="info-icon collapsed">
                                                    <i class="fas fa-info-circle m-l-10"></i>
                                                </a>
                                                <div id="min-max-info3" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                    <span class="m-r-5"> R:100-10k</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back teen-section market_17_b_btn market_17_row market_17_val suspended-box"
                                            data-title="SUSPENDED" data-sid="31" data-rate="2.94" data-nation="Winner">
                                            <button class="back"><span class="odd">1.98</span><span>0</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back teen-section market_18_b_btn market_18_row market_18_val suspended-box"
                                            data-title="SUSPENDED" data-sid="32" data-rate="5.00" data-nation="Pair">
                                            <button class="back"><span class="odd">1.98</span><span>0</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back  teen-section market_19_b_btn market_19_row market_19_val suspended-box"
                                            data-title="SUSPENDED" data-sid="33" data-rate="12.00" data-nation="Flush">
                                            <button class="back"><span class="odd">1.98</span><span>0</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back  teen-section market_20_b_btn market_20_row market_20_val suspended-box"
                                            data-title="SUSPENDED" data-sid="34" data-rate="21.00"
                                            data-nation="Straight">
                                            <button class="back"><span class="odd">1.98</span><span>0</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back  teen-section market_21_b_btn market_21_row market_21_val suspended-box"
                                            data-title="SUSPENDED" data-sid="35" data-rate="126.00" data-nation="Trio">
                                            <button class="back"><span class="odd">1.98</span><span>0</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back  teen-section market_22_b_btn market_22_row market_22_val suspended-box"
                                            data-title="SUSPENDED" data-sid="36" data-rate="151.00"
                                            data-nation="Straight Flush">
                                            <button class="back"><span class="odd">1.98</span><span>0</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back  teen-section market_23_b_btn market_23_row market_23_val suspended-box"
                                            data-title="SUSPENDED" data-sid="36" data-rate="151.00"
                                            data-nation="Straight Flush">
                                            <button class="back"><span class="odd">1.98</span><span>0</span></button>
                                        </td>
                                        <td data-title=""
                                            class=" box-w2 back teen-section market_24_b_btn market_24_row market_24_val suspended-box"
                                            data-title="SUSPENDED" data-sid="36" data-rate="151.00"
                                            data-nation="Straight Flush">
                                            <button class="back"><span class="odd">1.98</span><span>0</span></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- <div id="commetry" class="text-right text-info">Incase of Tie, The entire round will be cancelled || Odds are considered same as international exchange. || In "Trio" result, "Pair" should not be considered. || In "Straight Flush" result, "Straight" and "Flush" should not be considered.</div> -->
                        </div>
                    </div>
                    <div class="fancy-marker-title">
                        <h4>Last Result <a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=teen8"
                                class="text-right" style="font-size: 14px; float: right; color: #fff">View All</a></h4>
                    </div>
                    <div class="casino-last-results" id="last-result">
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
                                        <th colspan="2">Pair Plus</th>
                                    </tr>
                                    <tr>
                                        <td width="60%">Pair</td>
                                        <td>1 TO 1</td>
                                    </tr>
                                    <tr>
                                        <td width="60%">Flush</td>
                                        <td>1 TO 4</td>
                                    </tr>
                                    <tr>
                                        <td width="60%">Straight</td>
                                        <td>1 TO 6</td>
                                    </tr>
                                    <tr>
                                        <td width="60%">Trio</td>
                                        <td>1 TO 30</td>
                                    </tr>
                                    <tr>
                                        <td width="60%">Straight Flush</td>
                                        <td>1 TO 40</td>
                                    </tr>
                                </tbody>
                            </table>
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
                        <h4 class="modal-title">Teenpatti Open Result</h4>
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

<script type="text/javascript">
    $(function() {
        var header = $("#sidebar-right");
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();

            if (scroll >= $(window).height() / 3) {
                $("#sidebar-right").css('position', 'relative');
                $("#sidebar-right").css('top', '0px');
                $("#sidebar-right").css('right', '0px');
                $("#sidebar-right").css('width', '25.5%');
            } else {
                $("#sidebar-right").css('position', 'relative');
                $("#sidebar-right").css('top', '0px');
                $("#sidebar-right").css('right', '0px');
                $("#sidebar-right").css('width', '25.5%');
            }
        });
    });
    var site_url = '<?php echo WEB_URL; ?>';
    var websocketurl = '<?php echo GAME_IP; ?>';
    var clock = new FlipClock($(".clock"), {
        clockFace: "Counter"
    });
    var oldGameId = 0;
    var resultGameLast = 0;
    var data6;
    var markettype = "OPENTEENPATTI";
    var last_result_id = '0';

    function websocket(type) {
        socket = io.connect(websocketurl, {
            transports: ['websocket']
        });
        socket.on('connect', function() {
            socket.emit('Room', 'teen8');
        });


        socket.on('game', function(data) {
             console.log("data=", data); 

            if (data && data['t1'] && data['t1'][0]) {
                if (oldGameId != data.t1[0].mid && data.t1[0].mid != 0 && data.t1[0].mid != "0") {
                    clearCards();
                }
                oldGameId = data.t1[0].mid;
                if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark").text(data.t1[0].remark);
                    specialRemark = data.t1[0].remark;
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
                                    var cs = data6.card + "<span class='card-" + data6.color + "'>" + data6.type +
                                        "</span>";
                                      
                                    /* $("#card" + k).html(cs); */
                                    $("#card" + k).attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0]
                                    .cards[k] + ".png");
                                }
                            } else {
                                if (k == 26) {
                                    data.t1[0].cards[k] = data.t1[0].cards[k].replace(" ", "");
                                    data.t1[0].cards[k] = data.t1[0].cards[k].replace("#", "");
                                    data.t1[0].cards[k] = data.t1[0].cards[k].replace("2", "");
                                    data.t1[0].cards[k] = data.t1[0].cards[k].replace("1", "");
                                    data.t1[0].cards[k] = data.t1[0].cards[k].replace("Player", "");
                                }
                                $("#card" + k).attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0]
                                    .cards[k] + ".png");
                            }
                            //$("#card"+k).attr("src",site_url + "storage/front/img/cards_new/" + data.t1[0].cards[k] + ".png");
                        }
                    }
                }
                clock.setValue(data.t1[0].autotime);
                $(".round_no").text(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid
                    .split(".")[1] : data.t1[0].mid);
                eventId = data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[
                    1] : data.t1[0].mid;
                for (var j in data['t2']) {
                    selectionid = parseInt(data['t2'][j].sid);
                    runner = data['t2'][j].nat || data['t2'][j].nation;
                    b1 = data['t2'][j].rate;
                    b1_label = b1;
                    /* if (selectionid == 1) {
                    	$(".n-bck").html(data['t2'][j].min);
                    	$(".x-bck").html(data['t2'][j].max);
                    }
                    if (selectionid > 10) {
                    	if (selectionid == 11) {
                    		b1_label = "Pair Plus 1";
                    		$(".n-pair").html(data['t2'][j].min);
                    		$(".x-pair").html(data['t2'][j].max);
                    	} else if (selectionid == 12) {
                    		b1_label = "Pair Plus 2";
                    	} else if (selectionid == 13) {
                    		b1_label = "Pair Plus 3";
                    	} else if (selectionid == 14) {
                    		b1_label = "Pair Plus 4";
                    	} else if (selectionid == 15) {
                    		b1_label = "Pair Plus 5";
                    	} else if (selectionid == 16) {
                    		b1_label = "Pair Plus 6";
                    	} else if (selectionid == 17) {
                    		b1_label = "Pair Plus 7";
                    	} else if (selectionid == 18) {
                    		b1_label = "Pair Plus 8";
                    	}
                    } */
                    markettype = "OPENTEENPATTI";

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
                    $(".market_" + selectionid + "_val").html(b1);
                    gstatus = data['t2'][j].gstatus.toString();
                    if (gstatus == "SUSPENDED" || gstatus == "0") {
                        $(".market_" + selectionid + "_row").addClass("suspended-box");
                    } else {
                        $(".market_" + selectionid + "_row").removeClass("suspended-box");
                    }
                }
            } else {
                $(".timer_game").text("Left Time:0");
                $(".round_no").text("0");
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
                            type: '}',
                            color: 'black',
                            card: data[0]
                        }
                        return obj;
                    } else {
                        data = data1;
                        data = data.split('CC');
                        if (data.length > 1) {
                            var obj = {
                                type: ']',
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
        $("#card0").html('');
        $("#card1").html('');
        $("#card2").html('');
        $("#card3").html('');
        $("#card4").html('');
        $("#card5").html('');
        $("#card6").html('');
        $("#card7").html('');
        $("#card8").attr("src", site_url + "storage/front/img/cards_new/1.png");
        $("#card9").html('');
        $("#card10").html('');
        $("#card11").html('');
        $("#card12").html('');
        $("#card13").html('');
        $("#card14").html('');
        $("#card15").html('');
        $("#card16").html('');
        $("#card17").attr("src", site_url + "storage/front/img/cards_new/1.png");
        $("#card18").html('');
        $("#card19").html('');
        $("#card20").html('');
        $("#card21").html('');
        $("#card22").html('');
        $("#card23").html('');
        $("#card24").html('');
        $("#card25").html('');
        $("#card26").attr("src", site_url + "storage/front/img/cards_new/1.png");
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
            casino_type = "'teen8'";
            data.forEach((runData) => {
                ab = "result-b";
                ab1 = "R";
                eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] :
                    runData.mid;
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type +
                    ')"  class="ball-runs  ' + ab + ' result">' + ab1 + '</span>';
            });
            $("#last-result").html(html);
            // if (oldGameId == 0 || oldGameId == resultGameLast) {
            //     $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
            //     $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
            //     $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
            //     $("#card_c4").attr("src", site_url + "storage/front/img/cards/1.png");
            //     $("#card_c5").attr("src", site_url + "storage/front/img/cards/1.png");
            //     $("#card_c6").attr("src", site_url + "storage/front/img/cards/1.png");
            //     $("#card_c7").attr("src", site_url + "storage/front/img/cards/1.png");
            //     $("#card_c8").attr("src", site_url + "storage/front/img/cards/1.png");
            //     $("#card_c9").attr("src", site_url + "storage/front/img/cards/1.png");
            // }
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
            url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/teen8/' + event_id,
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
                url: MASTER_URL + '/live-market/teenpatti/active_bets/open/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/teenpatti/view_more_matched/open/' + get_round_no(),
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
                url: MASTER_URL + '/live-market/teenpatti/market_analysis/open/' + get_round_no(),
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