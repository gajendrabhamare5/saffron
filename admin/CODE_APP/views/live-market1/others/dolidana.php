<link rel="stylesheet" type="text/css" href="<?php echo MASTER_URL; ?>/assets/css/flipclock.css">
<link rel="stylesheet" type="text/css" href="<?php echo WEB_URL; ?>/storage/js/plugins/OwlCarousel2/assets/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?php echo WEB_URL; ?>/storage/js/plugins/OwlCarousel2/assets/owl.theme.default.css">
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

        .andar-bahar-image {
            width: 45px;
            cursor: pointer;
        }

        .ab-slider {
            margin: 0 25px;
            width: 140px;
        }

        .ab-slider .items {
            width: 25px
        }

        #andar-box,
        #bahar-box {
            vertical-align: top;
            height: 80px;
        }

        #andar-box .game-section,
        #bahar-box .game-section {
            position: relative;
        }

        #andar-box .game-section .odds,
        #bahar-box .game-section .odds {
            position: absolute;
            top: 40px;
            left: 0;
            width: 100%;
        }

        .owl-next {
            position: absolute;
            top: 0;
            left: -20px;
        }

        .owl-prev {
            position: absolute;
            top: 0;
            right: -20px;
        }

        .owl-next span,
        .owl-prev span {
            color: #fff;
            font-size: 33px;
        }
    </style>
    <style>
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
        border-top: 1px solid #c7c8ca;
        background-color: #f2f2f2; */
        }

        .trap-down-box {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            border: 2px solid #72bbef;
        }

        .trap-up-box {
            width: 50%;
            height: 50px;
            display: flex;
            align-items: center;
            padding-left: 10px;
            padding-right: 40px;
            position: relative;
            justify-content: flex-end;
        }

        .trap-up-box .up-down-book {
            position: absolute;
            left: 10px;
        }

        .up-down-odds {
            font-weight: bold;
            font-size: 18px;
        }

        .trap-down-box-d {
            width: 50%;
            text-align: right;
            height: 50px;
            display: flex;
            align-items: center;
            padding-right: 10px;
            padding-left: 40px;
            justify-content: flex-start;
            position: relative;
        }

        .trap-seven-box {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            -webkit-transform: translateX(-50%);
            -moz-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            -o-transform: translateX(-50%);
        }

        .trap-seven-box img {
            height: 70px;
            vertical-align: middle;
        }

        .casino-table-header,
        .casino-table-row {
            display: flex;
            flex-wrap: wrap;
            /* justify-content: space-between; */
            /* border-bottom: 1px solid #c7c8ca; */
        }

        .teenpatti2 .casino-nation-detail {
            width: 60%;
        }

        .casino-table-header .casino-nation-detail {
            font-weight: bold;
            min-height: unset;
        }

        .casino-nation-detail {
            display: flex;
            align-items: flex-start;
            flex-direction: column;
            flex-wrap: wrap;
            justify-content: center;
            padding-left: 5px;
            min-height: 46px;
            width: 60%;
        }

        .teenpatti2 .casino-odds-box {
            width: 19%;
        }

        .casino-table-header .casino-odds-box {
            cursor: unset;
            padding: 2px;
            min-height: unset;
            height: auto !important;
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

        .casino-nation-name {
            padding: 4px;
            background-color: #ddd;
        }

        .doli-dana .casino-nation-name {
            min-height: 38px;
            width: 100%;
            padding-right: 10px;
            position: relative;
        }


        .text-end {
            text-align: right !important;
        }

        .text-start {
            text-align: left !important;
        }

        .casino-odds {
            font-size: 18px;
            font-weight: bold;
            line-height: 1;
        }

        .under-over-row .uo-box {
            display: flex;
            flex-wrap: wrap;
            width: 48%;
            margin-top: 10px;
            border: 1px solid #c7c8ca;
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
            /* width: 100%;
    border-left: 1px solid var(--table-border);
    border-right: 1px solid var(--table-border);
    border-top: 1px solid var(--table-border);
    background-color: var(--bg-table-row); */
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

        .casino-nation-book {
            font-size: 12px;
            font-weight: bold;
            min-height: 18px;
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
            background-color: grey;
            width: 2px;
            height: 100%;
        }

        .video-overlay img {
            margin-left: 12px;
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

        .video-overlay {
            top: 110px !important;
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
    <style>
        .doli-main {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            gap: 10px;
        }

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
            margin-top: 5px;
        }

        .casino-table-left-box,
        .casino-table-center-box,
        .casino-table-right-box {
            width: 49%;
            border-left: 1px solid #c7c8ca;
            border-right: 1px solid #c7c8ca;
            border-top: 1px solid #c7c8ca;
            background-color: #f2f2f2;
        }

        .doli-main .players-bet {
            width: calc(40% - 5px);
            display: flex;
            flex-wrap: wrap;
        }

        .doli-main .casino-table-row {
            width: 100%;
        }



        .odd-name {
            font-size: 12px;
            font-weight: bold;
            text-align: center;
        }

        .seven-box img {
            height: 60px;
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

        .casino-nation-book {
            font-size: 12px;
            font-weight: bold;
            min-height: 18px;
            z-index: 1;
        }

        .doli-main .doli-odds-box {
            width: 20%;
        }

        .doli-main .casino-odds-box {
            width: 100%;
        }

        .doli-dana .casino-odds {
            font-size: 16px;
        }

        .casino-odds {
            font-size: 18px;
            font-weight: bold;
            line-height: 1;
        }

        .doli-dana .casino-volume {
            font-weight: 400;
            /* font-size: 14px; */
        }

        .casino-volume {
            font-size: 12px;
            font-weight: 100;
            line-height: 1;
            margin-top: 5px;
        }

        .doli-main .casino-table-row {
            width: 100%;
        }

        .doli-main .side-bets {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            width: calc(60% - 5px);
            gap: 10px;
        }

        .doli-main .any-pair {
            width: calc(20% - 7px);
        }

        .doli-main .any-pair .doli-odds-box {
            width: 100%;
        }

        .doli-dana .odd-name {
            font-size: 12px;
            font-weight: bold;
            text-align: center;
        }

        .doli-main .any-pair .casino-odds-box {
            width: 100%;
            /* border-radius: 4px; */
            height: 60px;
        }

        .doli-dana .casino-volume {
            font-weight: 400;
            /* font-size: 14px; */
        }

        .casino-volume {
            font-size: 12px;
            font-weight: 100;
            line-height: 1;
            margin-top: 5px;
        }

        .doli-main .side-bets .odd-even-pair {
            width: calc(35% - 7px);
            background: #0000000a;
            padding: 8px;
            border-radius: 4px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .doli-main .side-bets .bets-box {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .doli-main .side-bets .odd-even-pair .bets-box .doli-odds-box {
            width: calc(50% - 5px);
        }

        .doli-main .side-bets .odd-even-pair .bets-box .casino-odds-box {
            width: 100%;
        }

        .doli-main .side-bets .lucky7-pair {
            width: calc(45% - 7px);
            ;
            background: #0000000a;
            padding: 8px;
            border-radius: 4px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .doli-main .side-bets .bets-box {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .doli-main .side-bets .lucky7-pair .bets-box .doli-odds-box {
            width: calc(33.33% - 5px);
        }

        .doli-main .side-bets .lucky7-pair .bets-box .casino-odds-box {
            width: 100%;
        }

        .doli-dana .seven-box {
            text-align: center;
        }

        .doli-other-bets {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            gap: 10px;
            margin-top: 8px;
        }

        .doli-other-bets .particular-pair {
            width: calc(35% - 5px);
            background: #0000000a;
            padding: 8px;
            border-radius: 4px;
            display: flex;
            flex-wrap: wrap;
            /* justify-content: center; */
        }

        .doli-other-bets .bets-box {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .doli-other-bets .particular-pair .bets-box .doli-odds-box {
            width: calc(33.33% - 5px);
        }

        .doli-other-bets .particular-pair .bets-box .casino-odds-box {
            width: 100%;
        }

        .doli-other-bets .sum-odds {
            width: calc(65% - 5px);
            background: #0000000a;
            padding: 8px;
            border-radius: 4px;
            display: flex;
            flex-wrap: wrap;
            /* justify-content: center; */
        }

        .doli-other-bets .sum-odds .bets-box .doli-odds-box {
            width: calc(16.66% - 5px);
        }

        .doli-other-bets .casino-odds-box,
        .doli-main .side-bets .casino-odds-box {
            border-radius: 4px;
        }

        .doli-other-bets .sum-odds .bets-box .casino-odds-box {
            width: 100%;
        }

        .book-red {
    color: red !important;
    z-index: 10;
    font-weight: bold;
}
    </style>

    <div class="listing-grid casino-grid">
        <div class="coupon-card row">
            <div class="col-md-8 main-content">
                <div class="coupon-card">
                    <div class="game-heading"><span class="card-header-title">Doli Dana
                            <!-- <small role="button" class="teenpatti-rules"  onclick="view_rules('tp-rules.jpg')" data-target="#rules_popup" data-toggle="modal"  tabindex="0"><u>Rules</u></small> --> <!----></span>

                        <span class="float-right">
                            Round ID:
                            <span class="round_no">0</span><!--   | Min: <span>100</span> | Max: <span>500000</span> --></span>
                    </div>
                    <!---->
                    <div class="video-container">
                        <?php
                        if (!empty(IFRAME_URL_SET)) {
                        ?>
                            <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . DOLIDANA_CODE; ?>" width="100%" height="400px" style="border: 0px;"></iframe>
                        <?php

                        } else {
                        ?>
                            <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="400" style="border: 0px;"></iframe>
                        <?php

                        }
                        ?>
                        <!---->
                        <!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL;
                                                                echo DOLIDANA_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
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
                                    <!-- <h3 class="text-white">PLAYER</h3> -->
                                    <div>

                                        <img id="card_c1" src="/storage/front/img/dice/dice1.png">
                                        <img id="card_c2" src="/storage/front/img/dice/dice1.png">

                                    </div>
                                </div>
                                <!-- <div>
                                                        <h3 class="text-white">DEALER</h3>
                                                        <div>
                                                            <img id="card_c2" src="/storage/front/img/dice/dice1.png">
                                                        </div>
                                                    </div> -->
                            </div>
                        </div>

                        <div class="casino-video-right-icons">
                            <div title="Rules" class="casino-video-rules-icon tooltip-container" id="tooltipBtn">
                                <i class="fas fa-info-circle" style="margin: 6px 0 0 6px;"></i>
                                <div class="tooltip-box">
                                    <div class="tooltip-header">Rules <span class="tooltip-close" id="tooltipClose">&times;</span></div>
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
                                                    <h6 class="rules-highlight">Winning Dice</h6>
                                                    <ul class="pl-4 pr-4 list-style">
                                                        <li>3:3</li>
                                                        <li>5:5</li>
                                                        <li>6:6</li>
                                                        <li>5:6 or 6:5</li>
                                                    </ul>
                                                    <h6 class="rules-highlight">Losing Dice</h6>
                                                    <ul class="pl-4 pr-4 list-style">
                                                        <li>1:1</li>
                                                        <li>2:2</li>
                                                        <li>4:4</li>
                                                        <li>1:2 or 2:1</li>
                                                    </ul>
                                                    <p>Any other combo (like 2:5, 3:4, etc.):</p>
                                                    <p>* No win / no loss Dice passes to the next player</p>
                                                    <p><b>•Any Pair</b> : |1:1||2:2||3:3||4:4||5:5||6:6|</p>
                                                    <p><b>•ODD:</b> 3,5,7,9,11 | <b>EVEN:</b> 2,4,6,8,10,12</p>
                                                    <p>•If the Dice total = 7 (e.g., 1:6, 2:5, 3:4, etc.) Bets on Greater than 7 and Less than 7 both lose 50% of the bet Amount.</p>
                                                    <p>Examples: 2:5 = 7 -&gt; 50% loss on both
                                                        &lt;7 and&gt;7
                                                    </p>
                                                    <p>1:6 = 7 -&gt; 50% loss on both
                                                        &lt;7 and&gt;7</p>
                                                    <p></p>
                                                    <p><b>Note</b>: All other bets settle immediately, but the main bet waits until Player A or&nbsp;Player&nbsp;B&nbsp;win/Loss(player&nbsp;Back/Lay).</p>
                                                    <h6 class="rules-highlight">Result Integrity &amp; Error-Correction Policy</h6>
                                                    <ul class="pl-4 pr-4 list-style">
                                                        <li>1) Authoritative Result<br>
                                                            The Original Dice Number Result generated and recorded by our server is the sole, final, and binding outcome for every round.
                                                        </li>
                                                        <li>2) Display Errors &amp; Corrections<br>
                                                            If any technical issue causes an incorrect, missing, duplicated, delayed, or otherwise erroneous display of the result, Dolidana Casino may update the displayed result to match the Original Dice Number Result. All settlements (wins/losses/payouts) are made only against the Original Dice Number Result.
                                                        </li>
                                                        <li>3) Player Acceptance<br>
                                                            By participating, you agree that if a display error occurs, you must accept the corrected/updated result reflecting the Original Dice Number Result, and any settlement made on that basis.
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="casino-table doli-dana">

                        <div class="casino-table-box">
                            <div class="doli-main">
                                <div class="players-bet">
                                    <div class="casino-table-row">
                                        <div class="casino-nation-detail">
                                            <div class="casino-nation-name">
                                                Player A
                                                <div class="float-right"><span class="mr-2 book-red">0</span>
                                                    <div class="info-block m-t-5" style="position: relative; display: inline-block;">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info1" aria-expanded="false"
                                                            class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                        <div id="min-max-info1" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 5px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                            <span class="m-r-5"> R:100-300k</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="doli-odds-box">
                                            <div class="casino-odds-box back"><span class="casino-odds">1.97</span></div>
                                        </div>
                                    </div>
                                    <div class="casino-table-row">
                                        <div class="casino-nation-detail">
                                            <div class="casino-nation-name">
                                                Player B
                                                <div class="float-right"><span class="mr-2 book-red">0</span>
                                                    <div class="info-block m-t-5" style="position: relative; display: inline-block;">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info2" aria-expanded="false"
                                                            class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                        <div id="min-max-info2" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 5px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                            <span class="m-r-5"> R:100-300k</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="doli-odds-box">
                                            <div class="casino-odds-box back"><span class="casino-odds">1.97</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="side-bets">
                                    <div class="any-pair">
                                        <div class="doli-odds-box">
                                            <div class="odd-name">
                                                Any Pair
                                                <div class="float-right">
                                                    <div class="info-block m-t-5" style="position: relative; display: inline-block;">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info3" aria-expanded="false"
                                                            class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                        <div id="min-max-info3" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 5px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                            <span class="m-r-5"> R:100-100k</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="casino-odds-box back"><span class="casino-odds">5.75 </span> <span class="casino-volume book-red">0</span></div>
                                        </div>
                                    </div>
                                    <div class="odd-even-pair">
                                        <div class="bets-box">
                                            <div class="doli-odds-box">
                                                <div class="odd-name">
                                                    Odd
                                                    <div class="float-right">
                                                        <div class="info-block m-t-5" style="position: relative; display: inline-block;">
                                                            <a href="#" data-toggle="collapse" data-target="#min-max-info4" aria-expanded="false"
                                                                class="info-icon collapsed">
                                                                <i class="fas fa-info-circle m-l-10"></i>
                                                            </a>
                                                            <div id="min-max-info4" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 5px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                                <span class="m-r-5"> R:100-100k</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="casino-odds-box back"><span class="casino-odds">1.95</span> <span class="casino-volume book-red">0</span></div>
                                            </div>
                                            <div class="doli-odds-box">
                                                <div class="odd-name">
                                                    Even
                                                    <div class="float-right">
                                                        <div class="info-block m-t-5" style="position: relative; display: inline-block;">
                                                            <a href="#" data-toggle="collapse" data-target="#min-max-info5" aria-expanded="false"
                                                                class="info-icon collapsed">
                                                                <i class="fas fa-info-circle m-l-10"></i>
                                                            </a>
                                                            <div id="min-max-info5" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 5px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                                <span class="m-r-5"> R:100-100k</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="casino-odds-box back"><span class="casino-odds">1.95</span> <span class="casino-volume book-red">0</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lucky7-pair">
                                        <div class="bets-box">
                                            <div class="doli-odds-box">
                                                <div class="odd-name">
                                                    &lt; 7
                                                    <div class="float-right">
                                                        <div class="info-block m-t-5" style="position: relative; display: inline-block;">
                                                            <a href="#" data-toggle="collapse" data-target="#min-max-info6" aria-expanded="false"
                                                                class="info-icon collapsed">
                                                                <i class="fas fa-info-circle m-l-10"></i>
                                                            </a>
                                                            <div id="min-max-info6" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 5px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                                <span class="m-r-5"> R:100-100k</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="casino-odds-box back"><span class="casino-odds">2</span> <span class="casino-volume book-red">0</span></div>
                                            </div>
                                            <div class="doli-odds-box">
                                                <div class="seven-box"><img src="https://versionobj.ecoassetsservice.com/v81/static/admin/img/trape-seven.png"></div>
                                            </div>
                                            <div class="doli-odds-box">
                                                <div class="odd-name">
                                                    7 &gt;
                                                    <div class="float-right">
                                                        <div class="info-block m-t-5" style="position: relative; display: inline-block;">
                                                            <a href="#" data-toggle="collapse" data-target="#min-max-info7" aria-expanded="false"
                                                                class="info-icon collapsed">
                                                                <i class="fas fa-info-circle m-l-10"></i>
                                                            </a>
                                                            <div id="min-max-info7" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 5px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                                <span class="m-r-5"> R:100-100k</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="casino-odds-box back"><span class="casino-odds">2</span> <span class="casino-volume book-red">0</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="doli-other-bets">
                                <div class="particular-pair">
                                    <h4>Particular Pair</h4>
                                    <div class="bets-box">
                                        <div class="doli-odds-box">
                                            <div class="odd-name">
                                                1-1 Pair
                                                <div class="float-right">
                                                  <div class="info-block m-t-5" style="position: relative; display: inline-block;">
                                                            <a href="#" data-toggle="collapse" data-target="#min-max-info8" aria-expanded="false"
                                                                class="info-icon collapsed">
                                                                <i class="fas fa-info-circle m-l-10"></i>
                                                            </a>
                                                            <div id="min-max-info8" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 5px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                                <span class="m-r-5"> R:100-100k</span>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="casino-odds-box back"><span class="casino-odds">29.5</span> <span class="casino-volume book-red">0</span></div>
                                        </div>
                                        <div class="doli-odds-box">
                                            <div class="odd-name">
                                                2-2 Pair
                                                <div class="float-right">
                                                   <div class="info-block m-t-5" style="position: relative; display: inline-block;">
                                                            <a href="#" data-toggle="collapse" data-target="#min-max-info9" aria-expanded="false"
                                                                class="info-icon collapsed">
                                                                <i class="fas fa-info-circle m-l-10"></i>
                                                            </a>
                                                            <div id="min-max-info9" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 5px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                                <span class="m-r-5"> R:100-100k</span>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="casino-odds-box back"><span class="casino-odds">29.5</span> <span class="casino-volume book-red">0</span></div>
                                        </div>
                                        <div class="doli-odds-box">
                                            <div class="odd-name">
                                                3-3 Pair
                                                <div class="float-right">
                                                  <div class="info-block m-t-5" style="position: relative; display: inline-block;">
                                                            <a href="#" data-toggle="collapse" data-target="#min-max-info10" aria-expanded="false"
                                                                class="info-icon collapsed">
                                                                <i class="fas fa-info-circle m-l-10"></i>
                                                            </a>
                                                            <div id="min-max-info10" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 5px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                                <span class="m-r-5"> R:100-100k</span>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="casino-odds-box back"><span class="casino-odds">29.5</span> <span class="casino-volume book-red">0</span></div>
                                        </div>
                                        <div class="doli-odds-box">
                                            <div class="odd-name">
                                                4-4 Pair
                                                <div class="float-right">
                                                    <div class="info-block m-t-5" style="position: relative; display: inline-block;">
                                                            <a href="#" data-toggle="collapse" data-target="#min-max-info11" aria-expanded="false"
                                                                class="info-icon collapsed">
                                                                <i class="fas fa-info-circle m-l-10"></i>
                                                            </a>
                                                            <div id="min-max-info11" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 5px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                                <span class="m-r-5"> R:100-100k</span>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="casino-odds-box back"><span class="casino-odds">29.5</span> <span class="casino-volume book-red">0</span></div>
                                        </div>
                                        <div class="doli-odds-box">
                                            <div class="odd-name">
                                                5-5 Pair
                                                <div class="float-right">
                                                   <div class="info-block m-t-5" style="position: relative; display: inline-block;">
                                                            <a href="#" data-toggle="collapse" data-target="#min-max-info12" aria-expanded="false"
                                                                class="info-icon collapsed">
                                                                <i class="fas fa-info-circle m-l-10"></i>
                                                            </a>
                                                            <div id="min-max-info12" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 5px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                                <span class="m-r-5"> R:100-100k</span>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="casino-odds-box back"><span class="casino-odds">29.5</span> <span class="casino-volume book-red">0</span></div>
                                        </div>
                                        <div class="doli-odds-box">
                                            <div class="odd-name">
                                                6-6 Pair
                                                <div class="float-right">
                                                  <div class="info-block m-t-5" style="position: relative; display: inline-block;">
                                                            <a href="#" data-toggle="collapse" data-target="#min-max-info13" aria-expanded="false"
                                                                class="info-icon collapsed">
                                                                <i class="fas fa-info-circle m-l-10"></i>
                                                            </a>
                                                            <div id="min-max-info13" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 5px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                                <span class="m-r-5"> R:100-100k</span>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="casino-odds-box back"><span class="casino-odds">29.5</span> <span class="casino-volume book-red">0</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sum-odds">
                                    <h4>Odds of Sum Total</h4>
                                    <div class="bets-box">
                                        <div class="doli-odds-box">
                                            <div class="odd-name">
                                                Sum Total 2
                                                <div class="float-right">
                                                   <div class="info-block m-t-5" style="position: relative; display: inline-block;">
                                                            <a href="#" data-toggle="collapse" data-target="#min-max-info14" aria-expanded="false"
                                                                class="info-icon collapsed">
                                                                <i class="fas fa-info-circle m-l-10"></i>
                                                            </a>
                                                            <div id="min-max-info14" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 5px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                                <span class="m-r-5"> R:100-100k</span>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="casino-odds-box back"><span class="casino-odds">29.8</span> <span class="casino-volume book-red">0</span></div>
                                        </div>
                                        <div class="doli-odds-box">
                                            <div class="odd-name">
                                                Sum Total 3
                                                <div class="float-right">
                                                   <div class="info-block m-t-5" style="position: relative; display: inline-block;">
                                                            <a href="#" data-toggle="collapse" data-target="#min-max-info15" aria-expanded="false"
                                                                class="info-icon collapsed">
                                                                <i class="fas fa-info-circle m-l-10"></i>
                                                            </a>
                                                            <div id="min-max-info15" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 5px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                                <span class="m-r-5"> R:100-100k</span>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="casino-odds-box back"><span class="casino-odds">15.4</span> <span class="casino-volume book-red">0</span></div>
                                        </div>
                                        <div class="doli-odds-box">
                                            <div class="odd-name">
                                                Sum Total 4
                                                <div class="float-right">
                                                   <div class="info-block m-t-5" style="position: relative; display: inline-block;">
                                                            <a href="#" data-toggle="collapse" data-target="#min-max-info16" aria-expanded="false"
                                                                class="info-icon collapsed">
                                                                <i class="fas fa-info-circle m-l-10"></i>
                                                            </a>
                                                            <div id="min-max-info16" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 5px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                                <span class="m-r-5"> R:100-100k</span>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="casino-odds-box back"><span class="casino-odds">10.6</span> <span class="casino-volume book-red">0</span></div>
                                        </div>
                                        <div class="doli-odds-box">
                                            <div class="odd-name">
                                                Sum Total 5
                                                <div class="float-right">
                                                   <div class="info-block m-t-5" style="position: relative; display: inline-block;">
                                                            <a href="#" data-toggle="collapse" data-target="#min-max-info17" aria-expanded="false"
                                                                class="info-icon collapsed">
                                                                <i class="fas fa-info-circle m-l-10"></i>
                                                            </a>
                                                            <div id="min-max-info17" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 5px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                                <span class="m-r-5"> R:100-100k</span>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="casino-odds-box back"><span class="casino-odds">8.2</span> <span class="casino-volume book-red">0</span></div>
                                        </div>
                                        <div class="doli-odds-box">
                                            <div class="odd-name">
                                                Sum Total 6
                                                <div class="float-right">
                                                   <div class="info-block m-t-5" style="position: relative; display: inline-block;">
                                                            <a href="#" data-toggle="collapse" data-target="#min-max-info18" aria-expanded="false"
                                                                class="info-icon collapsed">
                                                                <i class="fas fa-info-circle m-l-10"></i>
                                                            </a>
                                                            <div id="min-max-info18" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 5px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                                <span class="m-r-5"> R:100-100k</span>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="casino-odds-box back"><span class="casino-odds">6.76</span> <span class="casino-volume book-red">0</span></div>
                                        </div>
                                        <div class="doli-odds-box">
                                            <div class="odd-name">
                                                Sum Total 7
                                                <div class="float-right">
                                                   <div class="info-block m-t-5" style="position: relative; display: inline-block;">
                                                            <a href="#" data-toggle="collapse" data-target="#min-max-info19" aria-expanded="false"
                                                                class="info-icon collapsed">
                                                                <i class="fas fa-info-circle m-l-10"></i>
                                                            </a>
                                                            <div id="min-max-info19" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 5px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                                <span class="m-r-5"> R:100-100k</span>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="casino-odds-box back"><span class="casino-odds">5.8</span> <span class="casino-volume book-red">0</span></div>
                                        </div>
                                        <div class="doli-odds-box">
                                            <div class="odd-name">
                                                Sum Total 8
                                                <div class="float-right">
                                                    <div class="info-block m-t-5" style="position: relative; display: inline-block;">
                                                            <a href="#" data-toggle="collapse" data-target="#min-max-info20" aria-expanded="false"
                                                                class="info-icon collapsed">
                                                                <i class="fas fa-info-circle m-l-10"></i>
                                                            </a>
                                                            <div id="min-max-info20" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 5px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                                <span class="m-r-5"> R:100-100k</span>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="casino-odds-box back"><span class="casino-odds">6.76</span> <span class="casino-volume book-red">0</span></div>
                                        </div>
                                        <div class="doli-odds-box">
                                            <div class="odd-name">
                                                Sum Total 9
                                                <div class="float-right">
                                                  <div class="info-block m-t-5" style="position: relative; display: inline-block;">
                                                            <a href="#" data-toggle="collapse" data-target="#min-max-info21" aria-expanded="false"
                                                                class="info-icon collapsed">
                                                                <i class="fas fa-info-circle m-l-10"></i>
                                                            </a>
                                                            <div id="min-max-info21" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 5px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                                <span class="m-r-5"> R:100-100k</span>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="casino-odds-box back"><span class="casino-odds">8.2</span> <span class="casino-volume book-red">0</span></div>
                                        </div>
                                        <div class="doli-odds-box">
                                            <div class="odd-name">
                                                Sum Total 10
                                                <div class="float-right">
                                                   <div class="info-block m-t-5" style="position: relative; display: inline-block;">
                                                            <a href="#" data-toggle="collapse" data-target="#min-max-info22" aria-expanded="false"
                                                                class="info-icon collapsed">
                                                                <i class="fas fa-info-circle m-l-10"></i>
                                                            </a>
                                                            <div id="min-max-info22" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 5px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                                <span class="m-r-5"> R:100-100k</span>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="casino-odds-box back"><span class="casino-odds">10.6</span> <span class="casino-volume book-red">0</span></div>
                                        </div>
                                        <div class="doli-odds-box">
                                            <div class="odd-name">
                                                Sum Total 11
                                                <div class="float-right">
                                                   <div class="info-block m-t-5" style="position: relative; display: inline-block;">
                                                            <a href="#" data-toggle="collapse" data-target="#min-max-info23" aria-expanded="false"
                                                                class="info-icon collapsed">
                                                                <i class="fas fa-info-circle m-l-10"></i>
                                                            </a>
                                                            <div id="min-max-info23" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 5px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                                <span class="m-r-5"> R:100-100k</span>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="casino-odds-box back"><span class="casino-odds">15.4</span> <span class="casino-volume book-red">0</span></div>
                                        </div>
                                        <div class="doli-odds-box">
                                            <div class="odd-name">
                                                Sum Total 12
                                                <div class="float-right">
                                                  <div class="info-block m-t-5" style="position: relative; display: inline-block;">
                                                            <a href="#" data-toggle="collapse" data-target="#min-max-info24" aria-expanded="false"
                                                                class="info-icon collapsed">
                                                                <i class="fas fa-info-circle m-l-10"></i>
                                                            </a>
                                                            <div id="min-max-info24" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 5px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                                <span class="m-r-5"> R:100-100k</span>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="casino-odds-box back"><span class="casino-odds">29.8</span> <span class="casino-volume book-red">0</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="casino-last-result-title"><span>Last Result</span><span><a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=dolidana">View All</a></span></div>
                    <div class="casino-last-results" id="last-result"></div>
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

                            <a href="javascript:void(0)" class="btn btn-back float-right" id="view_more_bets"> VIEW MORE</a>

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

                        <img src="<?php echo WEB_URL; ?>/storage/front/img/rules/tp-rules.jpg" class="img-fluid">

                    </div>

                </div>

            </div>

        </div>

        <div id="modalpokerresult" class="modal fade show" tabindex="-1">

            <div class="modal-dialog" style="min-width: 650px">

                <div class="modal-content">

                    <div class="modal-header">

                        <h4 class="modal-title">1 CARD ONE-DAY Result</h4>

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


<script src="<?php echo WEB_URL; ?>/js/socket.io.js" type="text/javascript"></script>
<script src="<?php echo MASTER_URL; ?>/assets/js/flipclock.js" type="text/javascript"></script>
<script src="<?php echo WEB_URL; ?>/storage/front/js/owl.carousel.min.js" type="text/javascript"></script>


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
    var markettype = "DOLIDANA";
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
            socket.emit('Room', 'dolidana');
        });
        socket.on('gameIframe', function(data) {
            $("#casinoIframe").attr('src', data);
        });
        socket.on('game', function(data) {
            console.log("data==", data);
            data1 = data;
            if (data) {
                if (oldGameId != data1.t1[0].mid && data1.t1[0].mid != 0 && data1.t1[0].mid != "0") {
                    setTimeout(function() {
                        clearCards();
                    }, <?php //echo CASINO_RESULT_TIMEOUT; 
                        ?>);
                }
                oldGameId = data.t1[0].mid;
                oldGameId = data1.t1[0].mid;
                if (data1.t1[0].mid != 0 && data1.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark")
                        .text(data.t1[0].remark);
                    if (data.t1[0].C1 != 1) {
                        $("#card_c1").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C1 + ".png");
                    }
                    if (data.t1[0].C2 != 1) {
                        $("#card_c2").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C2 + ".png");
                    }
                }
                clock.setValue(data1.t1[0].autotime);
                $(".round_no").text(data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid);
                $("#casino_event_id").val(data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid);
                eventId = data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid;
                for (var j in data.t2) {
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
                    $(".value_b_" + selectionid).html(b1);

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
                    $(".value_l_" + selectionid).html(l1);

                    gstatus = data.t2[j].gstatus.toString();
                    if (gstatus == "SUSPENDED" || gstatus == "0") {
                        $(".market_" + selectionid + "_row").addClass("suspended-box");
                    } else {
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

    function clearCards() {
        // refresh(markettype);
        $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
    }


    function updateResult(data) {
        console.log("updated data", data);

        if (data && data[0]) {
            data = JSON.parse(JSON.stringify(data));
            resultGameLast = data[0].mid;

            if (last_result_id != resultGameLast) {
                last_result_id = resultGameLast;
                // refresh(markettype);
            }

            var html = "";
            casino_type = "'dolidana'";
            data.forEach((runData) => {

                eventId = runData.mid == 0 ? 0 : runData.mid;
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="result ml-1 ' + (parseInt(runData.win) == 1 ? 'result-a' : 'result-b') + '">' + (parseInt(runData.win) == 1 ? 'P' : 'D') + '</span>';
            });
            $("#last-result").html(html);
            if (oldGameId == 0 || oldGameId == resultGameLast) {
                $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
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
    $('#andar-cards, #bahar-cards').owlCarousel({
        rtl: true,
        loop: false,
        margin: 2,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }

    });

    function view_casiono_result(event_id, casino_type) {

        $("#cards_data").html("");
        $("#round_no").text(event_id);
        $.ajax({
            type: 'POST',
            url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/dolidana/' + event_id,
            dataType: 'json',
            data: {
                event_id: event_id,
                casino_type: casino_type
            },
            success: function(response) {
                $('#modalpokerresult').modal('show');
                $("#cards_data1").html(response.result);
                $('.last-result-slider').owlCarousel({
                    loop: false,
                    margin: 2,
                    nav: true,
                    dots: false,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 3
                        },
                        1000: {
                            items: 8
                        }
                    }
                });
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
            url: MASTER_URL + '/live-market/others/active_bets/dolidana/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/others/view_more_matched/dolidana/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/others/market_analysis/dolidana/' + get_round_no(),
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.results == 0) {
                    $('.market_exposure').text(0).css('color', 'black');
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

    function getType(data) {
        var data1 = data;
        if (data) {
            data = data.split('DD');
            if (data.length > 1) {
                var obj = {
                    type: '[',
                    color: 'red',
                    ctype: 'diamond',
                    card: data[0],
                    rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0])
                }
                return obj;
            } else {
                data = data1;
                data = data.split('HH');
                if (data.length > 1) {
                    var obj = {
                        type: '{',
                        color: 'red',
                        ctype: 'heart',
                        card: data[0],
                        rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0])
                    }
                    return obj;
                } else {
                    data = data1;
                    data = data.split('SS');
                    if (data.length > 1) {
                        var obj = {
                            type: ']',
                            color: 'black',
                            ctype: 'spade',
                            card: data[0],
                            rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0])
                        }
                        return obj;
                    } else {
                        data = data1;
                        data = data.split('CC');
                        if (data.length > 1) {
                            var obj = {
                                type: '}',
                                color: 'black',
                                ctype: 'club',
                                card: data[0],
                                rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0])
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