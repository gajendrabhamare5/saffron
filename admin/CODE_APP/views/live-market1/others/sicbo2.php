<link rel="stylesheet" type="text/css" href="<?php echo MASTER_URL; ?>/assets/css/flipclock.css">
<link rel="stylesheet" type="text/css"
    href="<?php echo WEB_URL; ?>/storage/js/plugins/OwlCarousel2/assets/owl.carousel.css">
<link rel="stylesheet" type="text/css"
    href="<?php echo WEB_URL; ?>/storage/js/plugins/OwlCarousel2/assets/owl.theme.default.css">
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
    .sicbo-title-box {
        background-color: #666666;
        color: #fff;
        border-radius: 10px;
        padding: 0 5px;
        height: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        min-width: 70px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -ms-border-radius: 10px;
        -o-border-radius: 10px;
    }

    @media only screen and (min-width: 1200px) and (max-width: 1599px) {
        .sicbo-title-box {
            padding: 0 10px;
            font-size: 9px;
        }
    }

    .sicbo-middle-small,
    .sicbo-middle-big {
        flex: unset;
        min-width: 60px;
    }

    .sicbo-square-box {
        text-transform: uppercase;
        background-image: linear-gradient(rgba(153, 146, 135, 0.7), rgba(162, 142, 130, 0.7));
        border-radius: 6px;
        padding: 5px;
        color: #1d1b2d;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        margin: 0 1px;
        flex: 1 1 auto;
        cursor: pointer;
    }

    .sicbo-middle-small,
    .sicbo-middle-big {
        flex: unset;
        min-width: 60px;
    }


    .sicbo-middle-middle-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-top: 10px;
        width: 100%;
    }

    .sicbo-middle-middle-row .sicbo-cube-box-container {
        flex: 1 auto;
    }

    .sicbo-cube-box-container {
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        margin: 0 1px;
    }

    .sicbo-middle-middle-row .sicbo-cube-box-container:first-child .sicbo-title-box {
        display: flex;
        justify-content: space-between;
    }

    .sicbo-cube-box-group {
        display: flex;
        flex-wrap: wrap;
        margin-top: 5px;
    }

    .sicbo-cube-double,
    .sicbo-cube-tripple {
        position: relative;
    }

    .sicbo-cube-box {
        width: 50px;
        height: 50px;
    }

    .sicbo-cube-single img {
        height: 30px;
    }

    .sicbo-cube-double img:first-child {
        position: absolute;
        left: 5px;
        top: 5px;
    }

    .sicbo-cube-double img {
        height: 20px;
    }

    .sicbo-cube-double img:last-child {
        position: absolute;
        right: 5px;
        bottom: 5px;
    }

    .sicbo-cube-tripple img:first-child {
        position: absolute;
        left: 5px;
        top: 5px;
    }

    .sicbo-cube-tripple img:nth-child(2) {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .sicbo-cube-tripple img:last-child {
        position: absolute;
        right: 5px;
        bottom: 5px;
    }

    .sicbo-bottom {
        display: flex;
        margin-top: 10px;
    }

    .sicbo-bottom .sicbo-cube-box-container {
        margin: 0 auto;
    }

    .sicbo-bottom .sicbo-cube-box {
        flex: unset;
        height: 60px;
        justify-content: space-between;
    }

    .sicbo-cube-combination img {
        height: 20px;
    }

    @media only screen and (min-width: 1200px) and (max-width: 1399px) {
        .sicbo-cube-combination img {
            height: 17px;
        }

        .sicbo-bottom .sicbo-cube-box {
            height: 50px;
            width: 42px;
        }

        .sicbo-cube-tripple img {
            height: 10px;
        }

        .sicbo-cube-double img {
            height: 15px;
        }

        .sicbo-middle-middle-row .sicbo-cube-box {
            width: 28px;
        }

        .sicbo-middle-midle .sicbo-title-box {
            padding: 0 2px;
            font-size: 8px;
            min-width: unset;
        }

        .sicbo-middle-midle .sicbo-square-box {
            padding: 0;
            height: 42px;
        }
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

    .sicbo-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .sicbo-middle-top-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        width: 100%;
    }

    .sicbo-middle-top-box-odd {
        margin: 0 5px;
        min-width: 50px;
    }

    .sicbo-box-value {
        font-weight: bold;
    }

    .sicbo-middle-top-box-odd {
        margin: 0 5px;
        min-width: 50px;
    }

    @media only screen and (max-width: 767px) {
        .sicbo-title-box {
            min-width: unset;
            padding: 0 3px;
            font-size: 10px;
        }

        .sicbo-middle {
            flex-wrap: wrap;
        }

        .sicbo-middle-left {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
        }

        .sicbo-middle-left .sicbo-cube-box-container {
            width: 100%;
        }

        .sicbo-title-box {
            min-width: unset;
            padding: 0 3px;
            font-size: 10px;
        }

        .sicbo-middle-left .sicbo-title-box {
            font-size: 9px;
            padding: 0px 2px;
        }

        .sicbo-middle-left .sicbo-cube-box {
            margin-bottom: 2px;
        }

        .sicbo-middle-right {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .sicbo-middle-top-row {
            width: 100%;
            align-content: flex-start;
        }

        .sicbo-middle-top-row .sicbo-square-box {
            margin: 1px;
            width: calc(14% - 2px);
            height: 50px;
        }

        .sicbo-bottom {
            width: 100%;
        }

        .sicbo-bottom .sicbo-cube-box-container {
            width: 100%;
        }

        .sicbo-bottom .sicbo-cube-box-group {
            flex-direction: row;
            justify-content: space-between;
        }

        .sicbo-bottom .sicbo-cube-box {
            width: auto;
            height: auto;
            margin-bottom: 5px;
            flex-direction: row;
            width: 19%;
        }

        .sicbo-middle-middle-row {
            width: 100%;
            align-content: flex-start;
            margin-top: 0;
        }

        .sicbo-middle-middle-row .sicbo-cube-box-container {
            width: 32%;
            margin-bottom: 5px;
        }

        .sicbo-title-box {
            min-width: unset;
            padding: 0 3px;
            font-size: 10px;
        }
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

    .ball-runs {
        color: yellow;
    }

    .nav-tabs {
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
                    <div class="game-heading"><span class="card-header-title">Sic Bo 2
                            <!-- <small role="button" class="teenpatti-rules"  onclick="view_rules('tp-rules.jpg')" data-target="#rules_popup" data-toggle="modal"  tabindex="0"><u>Rules</u></small> -->
                            <!---->
                        </span>

                        <span class="float-right">
                            Round ID:
                            <span class="round_no">0</span>
                            <!--   | Min: <span>100</span> | Max: <span>500000</span> --></span>
                    </div>
                    <!---->
                    <div class="video-container">
                        <?php
                                                    if(!empty(IFRAME_URL_SET)){
                                                ?>
                        <iframe class="iframedesign" src="<?php echo IFRAME_URL."".SICBO2_CODE;?>" width="100%"
                            height="400px" style="border: 0px;"></iframe>
                        <?php
                                                    
                                                }else{
                                                    ?>
                        <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="400"
                            style="border: 0px;"></iframe>
                        <?php

                                                }
                                                ?>
                        <!---->
                        <!--  <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                             <iframe class="iframedesign" src="<?php echo IFRAME_URL;
                                                            echo SICBO2_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
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
                                                    <h6 class="rules-highlight">Game Rules : </h6>
                                                    <ul class="pl-4 pr-4 list-style">
                                                        <li>This casino operates similarly to Sicbo, with the key
                                                            difference being that each round alternates between two
                                                            Sicbo machines. For example, the first round will start on
                                                            the first machine, the second round on the second machine,
                                                            and this alternating pattern will continue throughout the
                                                            game.</li>
                                                        <li>Sic Bo is an exciting game of chance played with three
                                                            regular dice with face value 1 to 6. The objective of Sic Bo
                                                            is to predict the outcome of the shake of the three dice.
                                                        </li>
                                                        <li>After betting time has expired, the dice are shaken in a
                                                            dice shaker. A number of bet spots — from zero to several —
                                                            then have multipliers randomly applied to them before the
                                                            dice come to rest and the result is known. If the player’s
                                                            bet is placed on the bet spot with the applied multiplier,
                                                            your bet is multiplied accordingly.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="rules-section">
                                                    <h6 class="rules-highlight">Bet Type : </h6>
                                                    <ul class="pl-4 pr-4 list-style">
                                                        <li>You can place many kinds of bets on the Sic Bo table, and
                                                            each type of bet has its own payout. Your bet is returned on
                                                            top of your winnings.
                                                            <ul class="pl-4 pr-4 list-style">
                                                                <li><span><strong>Small/Big</strong> — place your bet on
                                                                        the total of the three dice being Small (4–10)
                                                                        or Big (11–17). Wins pay 1:1, but these bets
                                                                        lose to any Triple.</span></li>
                                                                <li><span><strong>Even/Odd</strong> — place your bet on
                                                                        the total of the three dice being Odd or Even.
                                                                        Wins pay 1:1, but these bets lose to any
                                                                        Triple.</span></li>
                                                                <li><span><strong>Total</strong> — place your bet on any
                                                                        of the 14 betting areas labelled 4–17. Total is
                                                                        the total of the three dice and excludes 3 and
                                                                        18. You win if the total of the three dice adds
                                                                        up to the Total number on which you placed your
                                                                        bet. Payouts vary depending on the winning
                                                                        total.</span></li>
                                                                <li><span><strong>Single</strong> — place your bet on
                                                                        any of the six betting areas labelled ONE, TWO,
                                                                        THREE, FOUR, FIVE and SIX, which represent the
                                                                        six face values of a dice.</span>
                                                                    <ul class="singleBets--2f9e7">
                                                                        <li><span>If 1 of 3 dice shows the number you
                                                                                bet on, you get paid 1:1.</span></li>
                                                                        <li><span>If 2 of 3 dice show the number you bet
                                                                                on, you get paid 2:1.</span></li>
                                                                        <li><span>If all 3 dice show the number you bet
                                                                                on, you get paid 3:1.</span></li>
                                                                    </ul>
                                                                </li>
                                                                <li><span><strong>Double</strong> — place your bet on
                                                                        any of the six Double-labelled betting areas. To
                                                                        win, 2 of 3 dice must show the same number. Wins
                                                                        pay 8:1. Please note that regardless of whether
                                                                        2 or 3 dice show the same number, the payout
                                                                        remains the same.</span></li>
                                                                <li><span><strong>Triple</strong> — place your bet on
                                                                        any of the six Triple-labelled betting areas. To
                                                                        win, all 3 dice must match the number chosen,
                                                                        and you get paid 150:1.</span></li>
                                                                <li><span><strong>Any Triple</strong> — place your bet
                                                                        on this box to cover all six different Triple
                                                                        bets at once. To win, all three dice must show
                                                                        the same number, and you get paid 30:1.</span>
                                                                </li>
                                                                <li><span><strong>Combination</strong> — place your bet
                                                                        on any or all 15 possible 2 dice combinations.
                                                                        Wins pay 5:1.</span></li>
                                                            </ul>
                                                        </li>
                                                        <li>After the betting is closed, random bet spots will be
                                                            highlighted showing the multiplied payouts.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="rules-section">
                                                    <h6 class="rules-highlight">Winning Numbers : </h6>
                                                    <ul class="pl-4 pr-4 list-style">
                                                        <li>The WINNING NUMBERS display shows the most recent winning
                                                            numbers.</li>
                                                        <li>The result of the most recently completed round is listed on
                                                            the left: the total of the three dice on the upper line,
                                                            following with the result of three individual dice below.
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="rules-section">
                                                    <h6 class="rules-highlight">Statistics : </h6>
                                                    <ul class="pl-4 pr-4 list-style">
                                                        <li>In the roadmap below, the Winning numbers are displayed in
                                                            the patterns of Small (S), Big (B), and Triple (T) results.
                                                            Each cell represents the result of a past round. The result
                                                            of the earliest round is recorded in the upper left corner.
                                                            Read the column downwards all the way to the bottom; then
                                                            start at the top of the adjacent column to the right, and so
                                                            forth.</li>
                                                        <li>This representation may be of help to you in predicting the
                                                            results of future rounds.</li>
                                                        <li>Below the roadmap, you can see the statistics of Small, Big,
                                                            and Triple bets for the last 50 rounds.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="rules-section">
                                                    <h6 class="rules-highlight">Payouts : </h6>
                                                    <ul>
                                                        <li>Your payout depends on the type of bet placed. The payout
                                                            range depends on whether the bet you have placed on the bet
                                                            spot of your choice has a multiplier applied to it. If there
                                                            is no multiplier, then the regular payout is applied. Your
                                                            bet is returned on top of your winnings.</li>
                                                    </ul>
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Bet</th>
                                                                <th>Payout</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Small/Big</td>
                                                                <td>1:1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Even/Odd</td>
                                                                <td>1:1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Double</td>
                                                                <td>8:1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Triple</td>
                                                                <td>150:1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Any Triple</td>
                                                                <td>30:1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total 4 or 17</td>
                                                                <td>50:1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total 5 or 16</td>
                                                                <td>20:1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total 6 or 15</td>
                                                                <td>15:1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total 7 or 14</td>
                                                                <td>12:1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total 8 or 13</td>
                                                                <td>8:1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total 9 or 12</td>
                                                                <td>6:1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total 10 or 11</td>
                                                                <td>6:1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Combination</td>
                                                                <td>5:1</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <div class="d-flex justify-content-between">
                                                                        <div>
                                                                            <ul class="list-style">
                                                                                <li>Single</li>
                                                                                <li>Double</li>
                                                                                <li>Triple</li>
                                                                            </ul>
                                                                        </div>
                                                                        <div>
                                                                            <div>1:1</div>
                                                                            <div>2:1</div>
                                                                            <div>3:1</div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <p>Malfunction voids all pays and play.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="d-flex flex-wrap justify-content-between mt-2">
                        <div class="d-none d-xl-block w-100">
                            <div class="sicbo-top d-flex justify-content-between ">
                                <div class="sicbo-top-box sicbo-title-box">1:1 Lose to Any Triple</div>
                                <div class="sicbo-top-box sicbo-title-box">30:1</div>
                                <div class="sicbo-top-box sicbo-title-box">1:1 Lose to Any Triple</div>
                            </div>
                            <div class="sicbo-middle-small d-flex justify-content-between mt-2 flex-nowrap">
                                <div
                                    class="sicbo-middle-small sicbo-square-box market_1_b_btn market_1_row suspended-box back-1">
                                    <div>Small</div>
                                    <div class="sicbo-box-value">4-10</div>
                                </div>
                                <div class="sicbo-middle-midle d-flex flex-wrap w-auto justify-content-between">
                                    <div class="sicbo-middle-top-row d-flex flex-wrap justify-content-between w-100">
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box sicbo-middle-top-box-odd  market_4_b_btn market_4_row suspended-box back-1">
                                            <div>ODD</div>
                                            <div class="sicbo-box-value">1:1</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box market_18_b_btn market_18_row suspended-box back-1">
                                            <div>4</div>
                                            <div class="sicbo-box-value">50:1</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box market_19_b_btn market_19_row suspended-box back-1">
                                            <div>5</div>
                                            <div class="sicbo-box-value">20:1</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box market_20_b_btn market_20_row suspended-box back-1">
                                            <div>6</div>
                                            <div class="sicbo-box-value">15:1</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box market_21_b_btn market_21_row suspended-box back-1">
                                            <div>7</div>
                                            <div class="sicbo-box-value">12:1</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box market_22_b_btn market_22_row suspended-box back-1">
                                            <div>8</div>
                                            <div class="sicbo-box-value">8:1</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box market_23_b_btn market_23_row suspended-box back-1">
                                            <div>9</div>
                                            <div class="sicbo-box-value">6:1</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box market_24_b_btn market_24_row suspended-box back-1">
                                            <div>10</div>
                                            <div class="sicbo-box-value">6:1</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box sicbo-middle-top-box-odd  market_3_b_btn market_3_row suspended-box back-1">
                                            <div class="">Any Triple</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box market_25_b_btn market_25_row suspended-box back-1">
                                            <div>11</div>
                                            <div class="sicbo-box-value">6:1</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box market_26_b_btn market_26_row suspended-box back-1">
                                            <div>12</div>
                                            <div class="sicbo-box-value">6:1</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box market_27_b_btn market_27_row suspended-box back-1">
                                            <div>13</div>
                                            <div class="sicbo-box-value">8:1</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box market_28_b_btn market_28_row suspended-box back-1">
                                            <div>14</div>
                                            <div class="sicbo-box-value">12:1</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box market_29_b_btn market_29_row suspended-box back-1">
                                            <div>15</div>
                                            <div class="sicbo-box-value">15:1</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box market_30_b_btn market_30_row suspended-box back-1">
                                            <div>16</div>
                                            <div class="sicbo-box-value">20:1</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box market_31_b_btn market_31_row suspended-box back-1">
                                            <div>17</div>
                                            <div class="sicbo-box-value">50:1</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box sicbo-middle-top-box-odd market_5_b_btn market_5_row suspended-box back-1">
                                            <div>Even</div>
                                            <div class="sicbo-box-value ">1:1</div>
                                        </div>
                                    </div>
                                    <div class="sicbo-middle-middle-row">
                                        <div class="sicbo-cube-box-container">
                                            <div class="sicbo-top-box sicbo-title-box"><span>1:1 on
                                                    Sinlge</span><span>2:1 on Double</span><span>3:1 on Tripple</span>
                                            </div>
                                            <div class="sicbo-cube-box-group">
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-single suspended-box back-1  market_47_row  market_47_b_btn">
                                                    <img src="/storage/front/img/cards_new/dice1.png" alt="Dice 1">
                                                </div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-single suspended-box back-1  market_48_row  market_48_b_btn">
                                                    <img src="/storage/front/img/cards_new/dice2.png" alt="Dice 2">
                                                </div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-single suspended-box back-1  market_48_row  market_49_b_btn">
                                                    <img src="/storage/front/img/cards_new/dice3.png" alt="Dice 3">
                                                </div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-single suspended-box back-1  market_50_row  market_50_b_btn">
                                                    <img src="/storage/front/img/cards_new/dice4.png" alt="Dice 4">
                                                </div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-single suspended-box back-1  market_51_row  market_51_b_btn">
                                                    <img src="/storage/front/img/cards_new/dice5.png" alt="Dice 5">
                                                </div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-single suspended-box back-1  market_52_row  market_52_b_btn">
                                                    <img src="/storage/front/img/cards_new/dice6.png" alt="Dice 6">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sicbo-cube-box-container">
                                            <div class="sicbo-top-box sicbo-title-box">8:1 Double</div>
                                            <div class="sicbo-cube-box-group">
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-double suspended-box back-1  market_6_row  market_6_b_btn">
                                                    <img src="/storage/front/img/cards_new/dice1.png" alt="Dice 1"><img
                                                        src="/storage/front/img/cards_new/dice1.png" alt="Dice 1"></div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-double suspended-box back-1  market_7_row market_7_b_btn">
                                                    <img src="/storage/front/img/cards_new/dice2.png" alt="Dice 2"><img
                                                        src="/storage/front/img/cards_new/dice2.png" alt="Dice 2"></div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-double suspended-box back-1  market_8_row market_8_b_btn">
                                                    <img src="/storage/front/img/cards_new/dice3.png" alt="Dice 3"><img
                                                        src="/storage/front/img/cards_new/dice3.png" alt="Dice 3"></div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-double suspended-box back-1  market_9_row market_9_b_btn">
                                                    <img src="/storage/front/img/cards_new/dice4.png" alt="Dice 4"><img
                                                        src="/storage/front/img/cards_new/dice4.png" alt="Dice 4"></div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-double suspended-box back-1  market_10_row market_10_b_btn">
                                                    <img src="/storage/front/img/cards_new/dice5.png" alt="Dice 5"><img
                                                        src="/storage/front/img/cards_new/dice5.png" alt="Dice 5"></div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-double suspended-box back-1  market_11_row market_11_b_btn">
                                                    <img src="/storage/front/img/cards_new/dice6.png" alt="Dice 6"><img
                                                        src="/storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                            </div>
                                        </div>
                                        <div class="sicbo-cube-box-container">
                                            <div class="sicbo-top-box sicbo-title-box">150:1 Each Tripple</div>
                                            <div class="sicbo-cube-box-group">
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-tripple suspended-box back-1  market_12_row  market_12_b_btn">
                                                    <img src="/storage/front/img/cards_new/dice1.png" alt="Dice 1"><img
                                                        src="/storage/front/img/cards_new/dice1.png" alt="Dice 1"><img
                                                        src="/storage/front/img/cards_new/dice1.png" alt="Dice 1"></div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-tripple suspended-box back-1  market_13_row  market_13_b_btn">
                                                    <img src="/storage/front/img/cards_new/dice2.png" alt="Dice 2"><img
                                                        src="/storage/front/img/cards_new/dice2.png" alt="Dice 2"><img
                                                        src="/storage/front/img/cards_new/dice2.png" alt="Dice 2"></div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-tripple suspended-box back-1  market_14_row  market_14_b_btn">
                                                    <img src="/storage/front/img/cards_new/dice3.png" alt="Dice 3"><img
                                                        src="/storage/front/img/cards_new/dice3.png" alt="Dice 3"><img
                                                        src="/storage/front/img/cards_new/dice3.png" alt="Dice 3"></div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-tripple suspended-box back-1  market_15_row  market_15_b_btn">
                                                    <img src="/storage/front/img/cards_new/dice4.png" alt="Dice 4"><img
                                                        src="/storage/front/img/cards_new/dice4.png" alt="Dice 4"><img
                                                        src="/storage/front/img/cards_new/dice4.png" alt="Dice 4"></div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-tripple suspended-box back-1  market_16_row  market_16_b_btn">
                                                    <img src="/storage/front/img/cards_new/dice5.png" alt="Dice 5"><img
                                                        src="/storage/front/img/cards_new/dice5.png" alt="Dice 5"><img
                                                        src="/storage/front/img/cards_new/dice5.png" alt="Dice 5"></div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-tripple suspended-box back-1  market_17_row  market_17_b_btn">
                                                    <img src="/storage/front/img/cards_new/dice6.png" alt="Dice 6"><img
                                                        src="/storage/front/img/cards_new/dice6.png" alt="Dice 6"><img
                                                        src="/storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="sicbo-middle-big sicbo-square-box  market_2_b_btn market_2_row suspended-box back-1">
                                    <div>Big</div>
                                    <div class="sicbo-box-value ">11-17</div>
                                </div>
                            </div>
                            <div class="sicbo-bottom">
                                <div class="sicbo-cube-box-container">
                                    <div class="sicbo-top-box sicbo-title-box">5:1 Two Dice</div>
                                    <div class="sicbo-cube-box-group">
                                        <div
                                            class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_32_row  market_32_b_btn suspended-box back-1">
                                            <img src="/storage/front/img/cards_new/dice1.png" alt="Dice 1"><img
                                                src="/storage/front/img/cards_new/dice2.png" alt="Dice 2"></div>
                                        <div
                                            class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_33_row  market_33_b_btn suspended-box back-1">
                                            <img src="/storage/front/img/cards_new/dice1.png" alt="Dice 1"><img
                                                src="/storage/front/img/cards_new/dice3.png" alt="Dice 3"></div>
                                        <div
                                            class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_34_row  market_34_b_btn suspended-box back-1">
                                            <img src="/storage/front/img/cards_new/dice1.png" alt="Dice 1"><img
                                                src="/storage/front/img/cards_new/dice4.png" alt="Dice 4"></div>
                                        <div
                                            class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_35_row  market_35_b_btn suspended-box back-1">
                                            <img src="/storage/front/img/cards_new/dice1.png" alt="Dice 1"><img
                                                src="/storage/front/img/cards_new/dice5.png" alt="Dice 5"></div>
                                        <div
                                            class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_36_row  market_36_b_btn suspended-box back-1">
                                            <img src="/storage/front/img/cards_new/dice1.png" alt="Dice 1"><img
                                                src="/storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                        <div
                                            class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_37_row  market_37_b_btn suspended-box back-1">
                                            <img src="/storage/front/img/cards_new/dice2.png" alt="Dice 2"><img
                                                src="/storage/front/img/cards_new/dice3.png" alt="Dice 3"></div>
                                        <div
                                            class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_38_row  market_38_b_btn suspended-box back-1">
                                            <img src="/storage/front/img/cards_new/dice2.png" alt="Dice 2"><img
                                                src="/storage/front/img/cards_new/dice4.png" alt="Dice 4"></div>
                                        <div
                                            class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_39_row  market_39_b_btn suspended-box back-1">
                                            <img src="/storage/front/img/cards_new/dice2.png" alt="Dice 2"><img
                                                src="/storage/front/img/cards_new/dice5.png" alt="Dice 5"></div>
                                        <div
                                            class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_40_row  market_40_b_btn suspended-box back-1">
                                            <img src="/storage/front/img/cards_new/dice2.png" alt="Dice 2"><img
                                                src="/storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                        <div
                                            class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_41_row  market_41_b_btn suspended-box back-1">
                                            <img src="/storage/front/img/cards_new/dice3.png" alt="Dice 3"><img
                                                src="/storage/front/img/cards_new/dice4.png" alt="Dice 4"></div>
                                        <div
                                            class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_42_row  market_42_b_btn suspended-box back-1">
                                            <img src="/storage/front/img/cards_new/dice3.png" alt="Dice 3"><img
                                                src="/storage/front/img/cards_new/dice5.png" alt="Dice 5"></div>
                                        <div
                                            class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_43_row  market_43_b_btn suspended-box back-1">
                                            <img src="/storage/front/img/cards_new/dice3.png" alt="Dice 3"><img
                                                src="/storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                        <div
                                            class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_44_row  market_44_b_btn suspended-box back-1">
                                            <img src="/storage/front/img/cards_new/dice4.png" alt="Dice 4"><img
                                                src="/storage/front/img/cards_new/dice5.png" alt="Dice 5"></div>
                                        <div
                                            class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_46_row  market_45_b_btn suspended-box back-1">
                                            <img src="/storage/front/img/cards_new/dice4.png" alt="Dice 4"><img
                                                src="/storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                        <div
                                            class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_46_row  market_46_b_btn suspended-box back-1">
                                            <img src="/storage/front/img/cards_new/dice5.png" alt="Dice 5"><img
                                                src="/storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-xl-none w-100">
                            <div class="sicbo-top">
                                <div class="sicbo-cube-box-container">
                                    <div class="sicbo-top-box sicbo-title-box">1:1 Lose to Any Triple</div>
                                    <div class="sicbo-cube-box-group">
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box sicbo-middle-top-box-odd  market_1_b_btn market_1_row suspended-box back-1">
                                            <div>Small</div>
                                            <div class="sicbo-box-value">4-10</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box sicbo-middle-top-box-odd market_4_b_btn market_4_row suspended-box back-1">
                                            <div>ODD</div>
                                            <div class="sicbo-box-value">1:1</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sicbo-cube-box-container">
                                    <div class="sicbo-top-box sicbo-title-box">30:1</div>
                                    <div class="sicbo-cube-box-group">
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box sicbo-middle-top-box-odd market_3_b_btn market_3_row suspended-box back-1">
                                            <div class=" ">Any Triple</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sicbo-cube-box-container">
                                    <div class="sicbo-top-box sicbo-title-box">1:1 Lose to Any Triple</div>
                                    <div class="sicbo-cube-box-group">
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box sicbo-middle-top-box-odd market_5_b_btn market_5_row suspended-box back-1">
                                            <div>Even</div>
                                            <div class="sicbo-box-value">1:1</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box sicbo-middle-top-box-odd market_2_b_btn market_2_row suspended-box back-1">
                                            <div>Big</div>
                                            <div class="sicbo-box-value">11:17</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sicbo-middle">
                                <div class="sicbo-middle-left">
                                    <div class="sicbo-cube-box-container">
                                        <div class="sicbo-top-box sicbo-title-box">8:1 Each Double</div>
                                        <div class="sicbo-cube-box-group">
                                            <div
                                                class="sicbo-cube-box sicbo-square-box sicbo-cube-double suspended-box back-1  market_6_row  market_6_b_btn">
                                                <img src="/storage/front/img/cards_new/dice1.png" alt="Dice 1"><img
                                                    src="/storage/front/img/cards_new/dice1.png" alt="Dice 1"></div>
                                            <div
                                                class="sicbo-cube-box sicbo-square-box sicbo-cube-double suspended-box back-1  market_7_row  market_7_b_btn">
                                                <img src="/storage/front/img/cards_new/dice2.png" alt="Dice 2"><img
                                                    src="/storage/front/img/cards_new/dice2.png" alt="Dice 2"></div>
                                            <div
                                                class="sicbo-cube-box sicbo-square-box sicbo-cube-double suspended-box back-1  market_8_row  market_8_b_btn">
                                                <img src="/storage/front/img/cards_new/dice3.png" alt="Dice 3"><img
                                                    src="/storage/front/img/cards_new/dice3.png" alt="Dice 3"></div>
                                            <div
                                                class="sicbo-cube-box sicbo-square-box sicbo-cube-double suspended-box back-1  market_9_row  market_9_b_btn">
                                                <img src="/storage/front/img/cards_new/dice4.png" alt="Dice 4"><img
                                                    src="/storage/front/img/cards_new/dice4.png" alt="Dice 4"></div>
                                            <div
                                                class="sicbo-cube-box sicbo-square-box sicbo-cube-double suspended-box back-1  market_10_row  market_10_b_btn">
                                                <img src="/storage/front/img/cards_new/dice5.png" alt="Dice 5"><img
                                                    src="/storage/front/img/cards_new/dice5.png" alt="Dice 5"></div>
                                            <div
                                                class="sicbo-cube-box sicbo-square-box sicbo-cube-double suspended-box back-1  market_11_row  market_11_b_btn">
                                                <img src="/storage/front/img/cards_new/dice6.png" alt="Dice 6"><img
                                                    src="/storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                        </div>
                                    </div>
                                    <div class="sicbo-cube-box-container">
                                        <div class="sicbo-top-box sicbo-title-box">150:1 Each Tripple</div>
                                        <div class="sicbo-cube-box-group">
                                            <div
                                                class="sicbo-cube-box sicbo-square-box sicbo-cube-tripple suspended-box back-1  market_12_row  market_12_b_btn">
                                                <img src="/storage/front/img/cards_new/dice1.png" alt="Dice 1"><img
                                                    src="/storage/front/img/cards_new/dice1.png" alt="Dice 1"><img
                                                    src="/storage/front/img/cards_new/dice1.png" alt="Dice 1"></div>
                                            <div
                                                class="sicbo-cube-box sicbo-square-box sicbo-cube-tripple suspended-box back-1  market_13_row  market_13_b_btn">
                                                <img src="/storage/front/img/cards_new/dice2.png" alt="Dice 2"><img
                                                    src="/storage/front/img/cards_new/dice2.png" alt="Dice 2"><img
                                                    src="/storage/front/img/cards_new/dice2.png" alt="Dice 2"></div>
                                            <div
                                                class="sicbo-cube-box sicbo-square-box sicbo-cube-tripple suspended-box back-1  market_14_row  market_14_b_btn">
                                                <img src="/storage/front/img/cards_new/dice3.png" alt="Dice 3"><img
                                                    src="/storage/front/img/cards_new/dice3.png" alt="Dice 3"><img
                                                    src="/storage/front/img/cards_new/dice3.png" alt="Dice 3"></div>
                                            <div
                                                class="sicbo-cube-box sicbo-square-box sicbo-cube-tripple suspended-box back-1  market_15_row  market_15_b_btn">
                                                <img src="/storage/front/img/cards_new/dice4.png" alt="Dice 4"><img
                                                    src="/storage/front/img/cards_new/dice4.png" alt="Dice 4"><img
                                                    src="/storage/front/img/cards_new/dice4.png" alt="Dice 4"></div>
                                            <div
                                                class="sicbo-cube-box sicbo-square-box sicbo-cube-tripple suspended-box back-1  market_16_row  market_16_b_btn">
                                                <img src="/storage/front/img/cards_new/dice5.png" alt="Dice 5"><img
                                                    src="/storage/front/img/cards_new/dice5.png" alt="Dice 5"><img
                                                    src="/storage/front/img/cards_new/dice5.png" alt="Dice 5"></div>
                                            <div
                                                class="sicbo-cube-box sicbo-square-box sicbo-cube-tripple suspended-box back-1  market_17_row  market_17_b_btn">
                                                <img src="/storage/front/img/cards_new/dice6.png" alt="Dice 6"><img
                                                    src="/storage/front/img/cards_new/dice6.png" alt="Dice 6"><img
                                                    src="/storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sicbo-middle-right">
                                    <div class="sicbo-middle-top-row">
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box market_18_b_btn market_18_row suspended-box back-1">
                                            <div>4</div>
                                            <div class="sicbo-box-value">50:1</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box market_19_b_btn market_19_row suspended-box back-1">
                                            <div>5</div>
                                            <div class="sicbo-box-value">20:1</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box market_20_b_btn market_20_row suspended-box back-1">
                                            <div>6</div>
                                            <div class="sicbo-box-value">15:1</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box market_21_b_btn market_21_row suspended-box back-1">
                                            <div>7</div>
                                            <div class="sicbo-box-value">12:1</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box market_22_b_btn market_22_row suspended-box back-1">
                                            <div>8</div>
                                            <div class="sicbo-box-value">8:1</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box market_23_b_btn market_23_row suspended-box back-1">
                                            <div>9</div>
                                            <div class="sicbo-box-value">6:1</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box market_24_b_btn market_24_row suspended-box back-1">
                                            <div>10</div>
                                            <div class="sicbo-box-value">6:1</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box market_25_b_btn market_25_row suspended-box back-1">
                                            <div>11</div>
                                            <div class="sicbo-box-value">6:1</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box market_26_b_btn market_26_row suspended-box back-1">
                                            <div>12</div>
                                            <div class="sicbo-box-value">6:1</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box market_27_b_btn market_27_row suspended-box back-1">
                                            <div>13</div>
                                            <div class="sicbo-box-value">8:1</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box market_28_b_btn market_28_row suspended-box back-1">
                                            <div>14</div>
                                            <div class="sicbo-box-value">12:1</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box market_29_b_btn market_29_row suspended-box back-1">
                                            <div>15</div>
                                            <div class="sicbo-box-value">15:1</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box market_30_b_btn market_30_row suspended-box back-1">
                                            <div>16</div>
                                            <div class="sicbo-box-value">20:1</div>
                                        </div>
                                        <div
                                            class="sicbo-middle-top-box sicbo-square-box market_31_b_btn market_31_row suspended-box back-1">
                                            <div>17</div>
                                            <div class="sicbo-box-value">50:1</div>
                                        </div>
                                    </div>
                                    <div class="sicbo-bottom">
                                        <div class="sicbo-cube-box-container">
                                            <div class="sicbo-top-box sicbo-title-box">5:1 Two Dice</div>
                                            <div class="sicbo-cube-box-group">
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_32_row  market_32_b_btn suspended-box back-1">
                                                    <img src="/storage/front/img/cards_new/dice1.png" alt="Dice 1"><img
                                                        src="/storage/front/img/cards_new/dice2.png" alt="Dice 2"></div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_33_row  market_33_b_btn suspended-box back-1">
                                                    <img src="/storage/front/img/cards_new/dice1.png" alt="Dice 1"><img
                                                        src="/storage/front/img/cards_new/dice3.png" alt="Dice 3"></div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_35_row  market_34_b_btn suspended-box back-1">
                                                    <img src="/storage/front/img/cards_new/dice1.png" alt="Dice 1"><img
                                                        src="/storage/front/img/cards_new/dice4.png" alt="Dice 4"></div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_35_row  market_35_b_btn suspended-box back-1">
                                                    <img src="/storage/front/img/cards_new/dice1.png" alt="Dice 1"><img
                                                        src="/storage/front/img/cards_new/dice5.png" alt="Dice 5"></div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_36_row  market_36_b_btn suspended-box back-1">
                                                    <img src="/storage/front/img/cards_new/dice1.png" alt="Dice 1"><img
                                                        src="/storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_37_row  market_37_b_btn suspended-box back-1">
                                                    <img src="/storage/front/img/cards_new/dice2.png" alt="Dice 2"><img
                                                        src="/storage/front/img/cards_new/dice3.png" alt="Dice 3"></div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_38_row  market_38_b_btn suspended-box back-1">
                                                    <img src="/storage/front/img/cards_new/dice2.png" alt="Dice 2"><img
                                                        src="/storage/front/img/cards_new/dice4.png" alt="Dice 4"></div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_39_row  market_39_b_btn suspended-box back-1">
                                                    <img src="/storage/front/img/cards_new/dice2.png" alt="Dice 2"><img
                                                        src="/storage/front/img/cards_new/dice5.png" alt="Dice 5"></div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_40_row  market_40_b_btn suspended-box back-1">
                                                    <img src="/storage/front/img/cards_new/dice2.png" alt="Dice 2"><img
                                                        src="/storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_41_row  market_41_b_btn suspended-box back-1">
                                                    <img src="/storage/front/img/cards_new/dice3.png" alt="Dice 3"><img
                                                        src="/storage/front/img/cards_new/dice4.png" alt="Dice 4"></div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_42_row  market_42_b_btn suspended-box back-1">
                                                    <img src="/storage/front/img/cards_new/dice3.png" alt="Dice 3"><img
                                                        src="/storage/front/img/cards_new/dice5.png" alt="Dice 5"></div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_43_row  market_43_b_btn suspended-box back-1">
                                                    <img src="/storage/front/img/cards_new/dice3.png" alt="Dice 3"><img
                                                        src="/storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_44_row  market_44_b_btn suspended-box back-1">
                                                    <img src="/storage/front/img/cards_new/dice4.png" alt="Dice 4"><img
                                                        src="/storage/front/img/cards_new/dice5.png" alt="Dice 5"></div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_45_row  market_45_b_btn suspended-box back-1">
                                                    <img src="/storage/front/img/cards_new/dice4.png" alt="Dice 4"><img
                                                        src="/storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_46_row  market_46_b_btn suspended-box back-1">
                                                    <img src="/storage/front/img/cards_new/dice5.png" alt="Dice 5"><img
                                                        src="/storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sicbo-middle-middle-row">
                                        <div class="sicbo-cube-box-container">
                                            <div class="sicbo-top-box sicbo-title-box"><span>1:1 on
                                                    Sinlge</span><span>2:1 on Double</span><span>3:1 on Tripple</span>
                                            </div>
                                            <div class="sicbo-cube-box-group">
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-single suspended-box back-1  market_47_row  market_47_b_btn">
                                                    <img src="/storage/front/img/cards_new/dice1.png" alt="Dice 1">
                                                </div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-single suspended-box back-1  market_48_row  market_48_b_btn">
                                                    <img src="/storage/front/img/cards_new/dice2.png" alt="Dice 2">
                                                </div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-single suspended-box back-1  market_49_row  market_49_b_btn">
                                                    <img src="/storage/front/img/cards_new/dice3.png" alt="Dice 3">
                                                </div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-single suspended-box back-1  market_50_row  market_50_b_btn">
                                                    <img src="/storage/front/img/cards_new/dice4.png" alt="Dice 4">
                                                </div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-single suspended-box back-1  market_51_row  market_51_b_btn">
                                                    <img src="/storage/front/img/cards_new/dice5.png" alt="Dice 5">
                                                </div>
                                                <div
                                                    class="sicbo-cube-box sicbo-square-box sicbo-cube-single suspended-box back-1  market_52_row  market_52_b_btn">
                                                    <img src="/storage/front/img/cards_new/dice6.png" alt="Dice 6">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="remark text-right pr-2">
                        <!-- <marquee scrollamount="3">
                                                <p class="mb-0">Hi.</p>
                                            </marquee> -->
                    </div>

                    <div class="casino-last-result-title"><span>Last Result</span><span><a
                                href="<?php echo MASTER_URL; ?>/reports/casino-results?q=sicbo2">View All</a></span>
                    </div>
                    <div class="casino-last-results" id="last-result">
                        <!-- <span class="result result-b">B</span><span class="result result-a">A</span><span class="result result-b">B</span><span class="result result-b">B</span><span class="result result-b">B</span><span class="result result-a">A</span><span class="result result-a">A</span><span class="result result-b">B</span><span class="result result-a">A</span><span class="result result-a">A</span> -->
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
                                    <span>My Bets</span>
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

                        <h4 class="modal-title">Sic Bo 2 Result</h4>

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

                <h4 class="modal-title">View More </h4>

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
var markettype = "SICBO2";
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
        socket.emit('Room', 'sicbo2');
    });

    socket.on('gameIframe', function(data) {
        $("#casinoIframe").attr('src', data);
    });
    socket.on('game', function(data) {
        data1 = data;
        console.log("data=", data);
        if (data && data1.t1) {

            oldGameId = data1.t1[0].mid;
            clock.setValue(data.t1[0].autotime);
            $(".round_no").text(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid
                .split(".")[1] : data.t1[0].mid);
            $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0]
                .mid.split(".")[1] : data.t1[0].mid);
            eventId = data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[
                1] : data.t1[0].mid;

            for (var j in data.t2) {
                selectionid = data.t2[j].sectionId || data.t2[j].sid;
                runner = data.t2[j].nation || data.t2[j].nat;
                b1 = data.t2[j].b1;
                bs1 = data.t2[j].bs1;
                l1 = data.t2[j].l1;
                ls1 = data.t2[j].ls1;
                back_html = '<span class="odds d-block"><b>' + b1 + '</b></span> <span style="color: black;">' +
                    bs1 + '</span>';
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
                //$(".market_" + selectionid + "_b_btn").html(back_html);


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

function updateResult(data) {
    if (data && data[0]) {
        data = JSON.parse(JSON.stringify(data));
        resultGameLast = data[0].mid;
        if (last_result_id != resultGameLast) {
            last_result_id = resultGameLast;
            //refresh(markettype);
        }

        var html = "";
        casino_type = "'sicbo2'";
        data.forEach((runData) => {

            eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] :
                runData.mid;
            html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type +
                ')"  class="ball-runs ml-1 last-result">' + runData.win + '</span>';
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
        url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/sicbo2/' + event_id,
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
        url: MASTER_URL + '/live-market/others/active_bets/sicbo2/' + get_round_no(),
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
        url: MASTER_URL + '/live-market/others/view_more_matched/sicbo2/' + get_round_no(),
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
        url: MASTER_URL + '/live-market/others/market_analysis/sicbo2/' + get_round_no(),
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