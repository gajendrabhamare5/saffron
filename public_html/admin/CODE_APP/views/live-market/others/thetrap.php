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
            /* background-color: #fbe383; */
            background-color: #f2f2f2;
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
            justify-content: space-between;
            border-bottom: 1px solid #c7c8ca;
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
        }

        .casino-nation-detail {
            width: 60%;
            background-color: #fbe383;
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

        .casino-odds-box {
            width: 19%;
        }

        .casino-nation-name {
            font-size: 16px;
            font-weight: bold;
        }

        .casino-nation-name img {
            height: 30px;
            margin-right: 5px;
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

        .under-over-row .uo-box .casino-nation-detail {
            width: 70%;
        }

        .under-over-row .uo-box .casino-odds-box {
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

        .text-yellow {
            color: #fdcf13;
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

        .trap .teen1daycasino-container {
    margin-bottom: 10px;
}

.trap-number {
    position: relative;
    box-shadow: 0 0 10px;
    opacity: 0.5;
    margin-top: 10px;
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
                                        <div class="game-heading"><span class="card-header-title">The Trap
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
                                                <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . TRAP_CODE; ?>" width="100%" height="400px" style="border: 0px;"></iframe>
                                            <?php

                                            } else {
                                            ?>
                                                <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="400" style="border: 0px;"></iframe>
                                            <?php

                                            }
                                            ?>
                                            <!---->
                                            <!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL;
                                                                                    echo TRAP_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
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
                                            <div class="video-overlay" style="height:400px;">
                                                <div class="videoCards">
                                                    <div class="row row5 text-white text-center cardblock d-none">
                                                        <div class="col-6">
                                                            <div style="line-height: 20px;">
                                                                <b>A</b>
                                                                <div class="text-yellow a_count">0</div>
                                                            </div>
                                                            <div class="v-slider mt-2">
                                                                <div class="slick-slider slick-vertical slick-initialized">
                                                                    <div class="slick-list">
                                                                        <div class="slick-track" style="opacity: 1; transform: translate3d(0px, 0px, 0px); height: 374px;">
                                                                            <div data-index="0" class="slick-slide slick-active slick-current a_card" tabindex="-1" aria-hidden="false" style="outline: none; width: 25px;">

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div style="line-height: 20px;">
                                                                <b>B</b>
                                                                <div class="text-yellow b_count">0</div>
                                                            </div>
                                                            <div class="v-slider mt-2">
                                                                <div class="slick-slider slick-vertical slick-initialized">
                                                                    <div class="slick-list">
                                                                        <div class="slick-track " style="opacity: 1; transform: translate3d(0px, 0px, 0px); height: 374px;">
                                                                            <div data-index="0" class="slick-slide slick-active slick-current b_card" tabindex="-1" aria-hidden="false" style="outline: none; width: 25px;">

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
        .rules-section .row.row5 > [class*="col-"], .rules-section .row.row5 > [class*="col"] {
            padding-left: 5px;
            padding-right: 5px;
        }
        .rules-section
        {
            text-align: left;
            margin-bottom: 10px;
        }
        .rules-section .table
        {
            color: #fff;
            border:1px solid #444;
            background-color: #222;
            font-size: 12px;
        }
        .rules-section .table td, .rules-section .table th
        {
            border-bottom: 1px solid #444;
        }
        .rules-section ul li, .rules-section p
        {
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
        .rules-section .rules-highlight
        {
            color: #FDCF13;
            font-size: 16px;
        }
        .rules-section .rules-sub-highlight {
            color: #FDCF13;
            font-size: 14px;
        }
        .rules-section .list-style, .rules-section .list-style li
        {
            list-style: disc;
        }
        .rules-section .rule-card
        {
            height: 20px;
            margin-left: 5px;
        }
        .rules-section .card-character
        {
            font-family: Card Characters;
        }
        .rules-section .red-card
        {
            color: red;
        }
        .rules-section .black-card
        {
            color: black;
        }
        .rules-section .cards-box
        {
            background: #fff;
            padding: 6px;
            display: inline-block;
            color: #000;
            min-width: 150px;
        }
    </style>
<div class="rules-section">
                                            <ul class="pl-4 pr-4 list-style">
                                                <li> Trap is a 52 card deck game.</li>
                                                <li>Keeping Ace= 1 point, 2= 2 points, 3= 3 points, 4= 4 points, 5= 5 points, 6= 6 points, 7=7 points, 8= 8 Points, 9= 9 points, 10= 10 points, Jack= 11 points, Queen= 12 points and King= 13 points.</li>
                                                <li>Here there are two sides in TRAP. A and B respectively.
                                                </li>
                                                <li>First card that will open in the game would be from side ‘A’, next card will open in the game from Side ‘B’. Likewise till the end of the game.</li>
                                                <li>Any side that crosses a total score of 15 would be the winner of the game. For Example: the total score should be 16 or above.
                                                </li>
                                                <li>But if at any stage your score is at 13, 14, 15 then you will get into the trap which ideally means you lose.</li>
                                                <li>Hence there are only two conditions from which you can decide the winner here either your opponent has to be trapped in the score of 13, 14, 15 or your total score should be above 15.</li>
                                            </ul>
                                        </div></div></div>
                                    </div>
                                </div>
                            </div>
                        </div> 

                                        </div>

                                        <div class="casino-table teenpatti-1day">
                                            <div class="casino-table-box">
                                                <div class="casino-table-left-box">
                                                    <!-- <div class="casino-table-header">
                                                        <div class="casino-nation-detail">Player A</div>
                                                        <div class="casino-odds-box back">Back</div>
                                                        <div class="casino-odds-box lay">Lay</div>
                                                    </div> -->
                                                    <div class="casino-table-body">
                                                        <div class="casino-table-row ">
                                                            <div class="casino-nation-detail">
                                                                <div class="casino-nation-name">Player A</div>
                                                                <div class="casino-nation-book market_1_b_exposure market_exposure text-danger"></div>
                                                            </div>
                                                            <div class="casino-odds-box back back-1 market_1_row  market_1_b_btn">1.56</div>
                                                            <div class="casino-odds-box lay lay-1  market_1_row  market_1_l_btn">1.61</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="casino-table-box-divider"></div>
                                                <div class="casino-table-right-box">
                                                    <!-- <div class="casino-table-header">
                                                        <div class="casino-nation-detail">Player B</div>
                                                        <div class="casino-odds-box back">Back</div>
                                                        <div class="casino-odds-box lay">Lay</div>
                                                    </div> -->
                                                    <div class="casino-table-body">
                                                        <div class="casino-table-row">
                                                            <div class="casino-nation-detail">
                                                                <div class="casino-nation-name">Player B</div>
                                                                <div class="casino-nation-book market_2_b_exposure market_exposure text-danger"></div>
                                                            </div>
                                                            <div class="casino-odds-box back back-1 market_2_row  market_2_b_btn">0</div>
                                                            <div class="casino-odds-box lay lay-1 market_2_row  market_2_l_btn">0</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="casino-table-box other_markets mt-3 sevenupbox">

                                            </div>
                                        </div>

                                        <div class="teen1daycasino-container trap-number">
                                            <img src="/storage/front/img/trap/trap-number-bg.jpg" class="img-fluid">
                                        </div>

                                        <marquee scrollamount="3" class="casino-remark m-b-10" style="margin-top: 10px;">

                                        </marquee>
                                        <div class="casino-last-result-title"><span>Last Result</span><span><a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=trap">View All</a></span></div>
                                        <div class="casino-last-results" id="last-result"></div>
                                        <div class="trap-number-icon d-xl-none"><img src="/storage/front/img/trap/trap13.png"><img src="/storage/front/img/trap/trap14.png"><img src="/storage/front/img/trap/trap15.png"></div>
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

                        <h4 class="modal-title">The Trap Result</h4>

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
    var markettype = "TRAP";
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
            socket.emit('Room', 'trap');
        });

        socket.on('gameIframe', function(data) {
            $("#casinoIframe").attr('src', data);
        });
        socket.on('game', function(data) {
             console.log("data=", data);
            data1 = data;
           
            if (data && data.t1) {
                if (oldGameId != data1.t1[0].mid && data1.t1[0].mid != 0 && data1.t1[0].mid != "0") {
                    // setTimeout(function() {
                    //     clearCards();
                    // }, <?php echo CASINO_RESULT_TIMEOUT; ?>);
                }
                oldGameId = data1.t1[0].mid;
                if (data1.t1[0].mid != 0 && data1.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark")
                        .text(data.t1[0].remark);
                    if (data1.t1[0].cards) {
                        var arr = data1.t1[0].cards.split(',');

                        var a_count = 0;
                        var b_count = 0;
                        var a_card = "";
                        var b_card = "";
                        for (var i in arr) {
                            card_details = arr[i];
                            // console.log("iii=", i);
                            if (card_details != 1) {
                                card_value = getType(card_details);
                                card_rank = card_value.rank;
                                if (i % 2 === 0) {
                                    a_count += card_rank;
                                    a_card += `<div class="mb-1"><img src="${site_url}storage/front/img/cards_new/${card_details}.png" tabindex="-1" style="width: 100%; display: inline-block;"></div>`;
                                } else {
                                    b_count += card_rank;
                                    b_card += `<div class="mb-1"><img src="${site_url}storage/front/img/cards_new/${card_details}.png" tabindex="-1" style="width: 100%; display: inline-block;"></div>`;
                                }
                            }
                        }
                        var allOne = arr.every(function(val) {
                            return val === "1";
                        });
                        if (!allOne) {
                            $(".cardblock").removeClass("d-none");
                        } else {
                            $(".cardblock").addClass("d-none");
                        }
                        $(".a_count").text(a_count);
                        $(".b_count").text(b_count);
                        $(".a_card").html(a_card);
                        $(".b_card").html(b_card);
                    }
                    /* if (data[0].C1 != 1) {
                        $("#card_c1").attr("src", site_url + "storage/front/img/cards/" + data[0].C1 + ".png");
                    }
                    if (data[0].C2 != 1) {
                        $("#card_c2").attr("src", site_url + "storage/front/img/cards/" + data[0].C2 + ".png");
                    }
                    if (data[0].C3 != 1) {
                        $("#card_c3").attr("src", site_url + "storage/front/img/cards/" + data[0].C3 + ".png");
                    }
                    if (data[1].C1 != 1) {
                        $("#card_c4").attr("src", site_url + "storage/front/img/cards/" + data[1].C1 + ".png");
                    }
                    if (data[1].C2 != 1) {
                        $("#card_c5").attr("src", site_url + "storage/front/img/cards/" + data[1].C2 + ".png");
                    }
                    if (data[1].C3 != 1) {
                        $("#card_c6").attr("src", site_url + "storage/front/img/cards/" + data[1].C3 + ".png");
                    } */
                }
                clock.setValue(data.t1[0].autotime);
                $(".round_no").text(data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid);
                $("#casino_event_id").val(data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid);
                eventId = data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid;
                var high_markets = "";
                var low_markets = "";
                var jqk_markets = "";
                for (var j in data.t2) {
                    selectionid = data.t2[j].sectionId || data.t2[j].sid;
                    runner = data.t2[j].nation || data.t2[j].nat;
                    b1 = data.t2[j].b1;
                    bs1 = data.t2[j].bs1;
                    l1 = data.t2[j].l1;
                    ls1 = data.t2[j].ls1;
                    visible = data.t2[j].visible;
                    back_html = '<span class="odds d-block"><b>' + b1 + '</b></span>';
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
                    $(".market_" + selectionid + "_b_btn").html(back_html);

                    lay_html = '<span class="odds d-block"><b>' + l1 + '</b></span> ';
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
                    $(".market_" + selectionid + "_l_btn").html(lay_html);
                    var statuss = "";

                    gstatus = data.t2[j].gstatus.toString();
                    if (gstatus == "SUSPENDED" || gstatus == "0") {
                        $(".market_" + selectionid + "_l_btn").addClass("suspended-box");
                        $(".market_" + selectionid + "_b_btn").addClass("suspended-box");
                        statuss = "suspended-box";
                    } else {
                        $(".market_" + selectionid + "_l_btn").removeClass("suspended-box");
                        $(".market_" + selectionid + "_b_btn").removeClass("suspended-box");
                    }
                    subtype = data.t2[j].subtype;
                    if (data.t2[j].odds && visible == "1") {
                        for (var k in data.t2[j].odds) {
                            odd_selectionid = data.t2[j].odds[k].sectionId || data.t2[j].odds[k].sid;
                            odd_runner = data.t2[j].odds[k].nation || data.t2[j].odds[k].nat;
                            odd_b1 = data.t2[j].odds[k].b;
                            odd_l1 = data.t2[j].odds[k].l;
                            new_selectionid = selectionid + "_" + odd_selectionid;
                            new_runner = runner + " - " + odd_runner;
                            var exposure = "";
                            if ($('.casino-nation-book').hasClass("market_" + new_selectionid + "_b_exposure")) {
                                exposure = $(".market_" + new_selectionid + "_b_exposure").html();

                                if (exposure != "") {
                                    if (parseInt(exposure, 10) < 0) {
                                        $(".market_" + new_selectionid + "_b_exposure").css("color", "red");
                                    } else {
                                        $(".market_" + new_selectionid + "_b_exposure").css("color", "green");
                                    }
                                }
                            }

                            if (subtype == "highlow") {


                                if (odd_selectionid == "2") {
                                    low_markets += `<div class="trap-up-box back-1 market_${new_selectionid}_row ${statuss} market_${new_selectionid}_b_btn" side="Back" selectionid="${new_selectionid}" marketid="${new_selectionid}" runner="${new_runner}" marketname="${new_runner}" eventid="${eventId}" markettype="${markettype}" event_name="${markettype}" fullmarketodds="${odd_b1}" fullfancymarketrate="${odd_b1}">
                                                        <div class="up-down-book "><div class="casino-nation-book market_${new_selectionid}_b_exposure market_exposure text-danger">${exposure}</div></div>
                                                            <div class="text-end">
                                                                <div class="up-down-odds">${odd_b1}</div>
                                                                <span>${odd_runner}</span>
                                                            </div>
                                                        </div>`;
                                }
                                if (odd_selectionid == "1") {
                                    high_markets += ` <div class="trap-down-box-d back-1 market_${new_selectionid}_row ${statuss} market_${new_selectionid}_b_btn" side="Back" selectionid="${new_selectionid}" marketid="${new_selectionid}" runner="${new_runner}" marketname="${new_runner}" eventid="${eventId}" markettype="${markettype}" event_name="${markettype}" fullmarketodds="${odd_b1}" fullfancymarketrate="${odd_b1}">
                                                        
                                                           <div class="text-start">
                                                                <div class="up-down-odds">${odd_b1}</div>
                                                                <span>${odd_runner}</span>
                                                            </div>
                                                            <div class="up-down-book" style="width:100%"><div class="casino-nation-book market_${new_selectionid}_b_exposure market_exposure text-danger">${exposure}</div></div>

                                                        </div>`;
                                }
                            }
                            if (subtype == "jqk") {


                                jqk_markets +=
                                    `<div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="/storage/front/img/andar_bahar/11.jpg"><img src="/storage/front/img/andar_bahar/12.jpg"><img src="/storage/front/img/andar_bahar/13.jpg"></div>
                                                <div class="casino-nation-book market_${new_selectionid}_b_exposure market_exposure text-danger">${exposure}</div>
                                                </div>
                                                <div class="casino-odds-box back back-1 market_${new_selectionid}_row ${statuss} market_${new_selectionid}_b_btn" side="Back" selectionid="${new_selectionid}" marketid="${new_selectionid}" runner="${new_runner}" marketname="${new_runner}" eventid="${eventId}" markettype="${markettype}" event_name="${markettype}" fullmarketodds="${odd_b1}" fullfancymarketrate="${odd_b1}">${odd_b1}</div>
                                                <div class="casino-odds-box lay lay-1 market_${new_selectionid}_row ${statuss} market_${new_selectionid}_l_btn" side="Lay" selectionid="${new_selectionid}" marketid="${new_selectionid}" runner="${new_runner}" marketname="${new_runner}" eventid="${eventId}" markettype="${markettype}" event_name="${markettype}" fullmarketodds="${odd_l1}" fullfancymarketrate="${odd_l1}">${odd_l1}</div>`;
                            }


                        }
                    }
                }
                $(".other_markets").html(`<div class="casino-table-left-box">
                                                    <div class="trap-down-box">
                                                        ${low_markets}${high_markets}
                                                        <div class="trap-seven-box"><img src="/storage/front/img/casinoicons/trape-seven.png"></div>
                                                    </div>
                                                </div>
                                                <div class="casino-table-box-divider"></div>
                                                <div class="casino-table-right-box">
                                                    <div class="casino-table-body">
                                                        <div class="casino-table-row ">
                                                            
                                                             ${jqk_markets}
                                                            
                                                        </div>
                                                    </div>
                                                </div>`);
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
            casino_type = "'trap'";
            data.forEach((runData) => {

                 eventId = runData.mid == 0 ? 0 : runData.mid;
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="result ml-1 ' + (parseInt(runData.win) == 1 ? 'result-a' : 'result-b') + '">' + (parseInt(runData.win) == 1 ? 'A' : 'B') + '</span>';
            });
            $("#last-result").html(html);
            if (oldGameId == 0 || oldGameId == resultGameLast) {
                $(".cardblock").addClass('d-none');

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
            url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/trap/' + event_id,
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
            url: MASTER_URL + '/live-market/others/active_bets/thetrap/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/others/view_more_matched/thetrap/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/others/market_analysis/thetrap/' + get_round_no(),
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