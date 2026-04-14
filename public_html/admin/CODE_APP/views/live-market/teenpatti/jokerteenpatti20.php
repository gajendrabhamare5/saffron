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
        .casino-detail {
            padding: 10px 10px 40px;
            background-color: #f8f8fb;
            border-radius: 0 0 8px 8px;
            box-shadow: 0 2px 6px #e2e2e2;
        }

        .teen1daycasino-container {
            display: flex;
            display: -webkit-flex;
            flex-wrap: wrap;
            justify-content: space-between;
            width: 100%;
        }

        .teen1dayleft,
        .teen1dayright {
            width: 49%;
        }

        .teen1dayleft {
            align-self: center;
        }

        .casino-box-row {
            display: flex;
            display: -webkit-flex;
            flex-wrap: wrap;
            padding: 2px 0;
            align-items: center;
            position: relative;
        }

        .casino-nation-name {
            padding: 4px;
            background-color: #ddd;
        }

        .casino-nation-name {
            width: 50%;
            padding-right: 10px;
            position: relative;
        }

        .book-red {
            color: #bb2834 !important;
            z-index: 10;
            font-weight: bold;
        }

        .fa-info-circle {
            color: #4a4a4a !important;
            font-size: var(--font-caption);
            cursor: pointer;
            transition: 0.5s;
            z-index: 1;
        }

        .fa-info-circle:before {
            content: "\F05A";
        }

        .icon-range {
            position: absolute;
            top: 100%;
            background-color: #16191c;
            padding: 4px;
            max-width: 100%;
            word-wrap: break-word;
            font-size: var(--font-small);
            z-index: 10;
            right: 0;
            transition: 0.1s;
            text-transform: capitalize;
            color: #aaafb5;
            z-index: 150;
        }

        .collapse:not(.show) {
            display: none;
        }

        .casino-bl-box {
            display: flex;
            display: -webkit-flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            width: 100%;
        }

        .casino-bl-box {
            width: 50%;
        }

        .casino-bl-box-item {
            margin-right: 4px;
            border-radius: 0;
            text-align: center;
            display: -webkit-flex;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            cursor: pointer;
            color: #000000;
            text-align: center;
            /* cursor: pointer; */
            cursor: not-allowed;
            height: 40px;
        }

        .casino-table .back {
            background-color: transparent;
            border: 2px solid var(--back);
        }

        .casino-bl-box-item {
            width: calc(50% - 2px);
        }

        .casino-bl-box-item>span,
        .casino-rb-box-player>span {
            display: block;
            width: 100%;
            line-height: 14px;
        }

        .casino-bl-box-item .casino-box-odd,
        .casino-rb-box-player .casino-box-odd {
            font-weight: bold;
            font-size: 16px;
            height: 16px;
            line-height: 16px;
            margin-bottom: 2px;
            width: 100%;
            color: #333;
        }

        .casino-bl-box-item:last-child {
            margin-right: 0;
        }

        .casino-table .lay {
            background-color: transparent;
            border: 2px solid var(--lay);
        }

        .casino-bl-box-item {
            width: calc(50% - 2px);
        }

        .teen1daycenter {
            width: 2px;
            background-color: grey;
        }

        .teen1dayleft,
        .teen1dayright {
            width: 49%;
        }

        .casino-odds {
            font-weight: bold;
            text-align: center;
            width: 100%;
            line-height: 18px;
            color: #000000;
            position: relative;
        }

        .text-playerb {
            color: var(--text-yellow);
            font-weight: bold;
        }

        .joker-other .casino-bl-box {
            width: calc(25% - 3px);
            margin-right: 4px;
            position: relative;
        }

        .joker-other .casino-bl-box:last-child {
            margin-right: 0;
        }

        .joker-other .casino-bl-box-item {
            width: 100%;
            height: 40px;
        }

        .casino-bl-box-item>span {
            font-size: 12px;
            line-height: 1;
        }


        .casino-card-img img {
            width: 30px;
            height: auto;
            margin-left: 5px;
        }

        .casino-card-img img {
            width: 20px;
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
                    <div class="game-heading"><span class="card-header-title">Teenpatti Joker 20-20

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
                                                    <p>Welcome to JOKER TEENPATTI 20-20, a new version of Indian Teenpatti game.</p>
                                                    <p>Teenpatti is a very simple game and one of the most played games on our platform. To keep the game as simple as it is and make it more exciting , we have introduced a Joker to the game. The game follows the same standard rules of Teenpatti but The Joker can act as any missing or highest card to make a high hand to defeat the opponent player. You can also do side bets on Joker before the round starts.</p>
                                                    <p>For Example:</p>
                                                    <img src="/storage/front/img/rules/joker1.jpg" class="img-fluid">
                                                    <p>Player A wins because THE JOKER can act as the highest card.</p>
                                                    <img src="/storage/front/img/rules/joker2.jpg" class="img-fluid">
                                                    <p>Player A wins because THE JOKER can act as the highest color card.</p>
                                                    <h4>Standard Rules.</h4>
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
                        <div class="teen1daycasino-container mt-2">
                            <div class="teen1dayleft">
                                <div class="casino-box-row">
                                    <div class="casino-nation-name">
                                        <b>Player A</b>
                                        <div class="float-right">
                                            <span class="mr-2 book-red casino-nation-book market_1_b_exposure market_exposure">0</span>
                                            <i data-toggle="collapse" data-target="#range1" aria-expanded="false" class="fas fa-info-circle collapsed"></i>
                                            <div id="range1" class="icon-range collapse">
                                                R:<span>100</span>-<span>3L</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="casino-bl-box">
                                        <div class="casino-bl-box-item casino-odds-box back suspended-box market_1_row back-1 market_1_b_btn"><span class="casino-box-odd casino-odds market_1_b_val">1.98</span></div>
                                        <div class="casino-bl-box-item casino-odds-box lay suspended-box market_1_row lay-1 market_1_l_btn"><span class="casino-box-odd casino-odds market_1_l_val">0</span></div>
                                    </div>
                                </div>
                                <div class="casino-box-row">
                                    <div class="casino-nation-name">
                                        <b>Player B</b>
                                        <div class="float-right">
                                            <span class="mr-2 book-red casino-nation-book text-center market_2_b_exposure market_exposure">0</span> <i data-toggle="collapse" data-target="#range2" aria-expanded="false" class="fas fa-info-circle collapsed"></i>
                                            <div id="range2" class="icon-range collapse">
                                                R:<span>100</span>-<span>3L</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="casino-bl-box">
                                        <div class="casino-bl-box-item casino-odds-box back suspended-box market_2_row back-1 market_2_b_btn"><span class="casino-box-odd casino-odds market_2_b_val">1.98</span></div>
                                        <div class="casino-bl-box-item casino-odds-box lay suspended-box market_2_row lay-1 market_2_l_btn"><span class="casino-box-odd casino-odds market_2_l_val">0</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="teen1daycenter"></div>
                            <div class="teen1dayright joker-other">
                                <div>
                                    <div class="casino-box-row casino-odds">
                                        <div class="text-left w-100"><b class="text-playerb">Joker</b></div>
                                    </div>
                                    <div class="casino-box-row">
                                        <div class="casino-bl-box"><b class="casino-odds market_3_b_val">2.1</b></div>
                                        <div class="casino-bl-box"><b class="casino-odds market_4_b_val">1.79</b></div>
                                        <div class="casino-bl-box"><b class="casino-odds market_5_b_val">1.95</b></div>
                                        <div class="casino-bl-box"><b class="casino-odds market_6_b_val">1.95</b></div>
                                    </div>
                                    <div class="casino-box-row">
                                        <div class="casino-bl-box">
                                            <div class="back casino-bl-box-item casino-box-odd casino-odds-box suspended-box market_3_row back-1 market_3_b_btn"><span class="">Even</span> <span class="book-red">0</span></div>
                                            <div class="text-right casino-rb-box-player-range w-100 mt-1">
                                                <i data-toggle="collapse" data-target="#range3" class="fas fa-info-circle float-right"></i>
                                                <div id="range3" class="collapse icon-range">
                                                    R:<span>100</span>-<span>3L</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="casino-bl-box">
                                            <div class="back casino-bl-box-item casino-box-odd casino-odds-box suspended-box market_4_row back-1 market_4_b_btn"><span class="">Odd</span> <span class="book-red">0</span></div>
                                            <div class="text-right casino-rb-box-player-range w-100 mt-1">
                                                <i data-toggle="collapse" data-target="#range4" class="fas fa-info-circle float-right"></i>
                                                <div id="range4" class="collapse icon-range">
                                                    R:<span>100</span>-<span>3L</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="casino-bl-box">
                                            <div class="back casino-bl-box-item casino-card-img casino-odds-box suspended-box market_5_row back-1 market_5_b_btn"><span class=""><img src="/storage/front/img/cards/heart.png"> <img src="/storage/front/img/cards/diamond.png"></span> <span class="book-red">0</span></div>
                                            <div class="text-right casino-rb-box-player-range w-100 mt-1">
                                                <i data-toggle="collapse" data-target="#range5" class="fas fa-info-circle float-right"></i>
                                                <div id="range5" class="collapse icon-range">
                                                    R:<span>100</span>-<span>3L</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="casino-bl-box">
                                            <div class="back casino-bl-box-item casino-card-img casino-odds-box suspended-box market_6_row back-1 market_6_b_btn"><span class=""><img src="/storage/front/img/cards/spade.png"> <img src="/storage/front/img/cards/club.png"></span> <span class="book-red">0</span></div>
                                            <div class="text-right casino-rb-box-player-range w-100 mt-1">
                                                <i data-toggle="collapse" data-target="#range6" class="fas fa-info-circle float-right"></i>
                                                <div id="range6" class="collapse icon-range">
                                                    R:<span>100</span>-<span>3L</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-1">
                                    <div class="casino-box-row">
                                        <div class="casino-bl-box">
                                            <div class="casino-bl-box-item casino-card-img casino-odds-box"><img src="/storage/front/img/cards/spade.png"></div>
                                        </div>
                                        <div class="casino-bl-box">
                                            <div class="casino-bl-box-item casino-card-img casino-odds-box"><img src="/storage/front/img/cards/heart.png"></div>
                                        </div>
                                        <div class="casino-bl-box">
                                            <div class="casino-bl-box-item casino-card-img casino-odds-box"><img src="/storage/front/img/cards/diamond.png"></div>
                                        </div>
                                        <div class="casino-bl-box">
                                            <div class="casino-bl-box-item casino-card-img casino-odds-box"><img src="/storage/front/img/cards/club.png"></div>
                                        </div>
                                    </div>
                                    <div class="casino-box-row">
                                        <div class="casino-bl-box">
                                            <div class="back casino-bl-box-item casino-box-odd casino-odds-box suspended-box market_7_row back-1 market_7_b_btn"><span class="">3.75</span> <span class="book-red casino-odds market_7_b_val">0</span></div>
                                            <div class="text-right casino-rb-box-player-range w-100 mt-1">
                                                <i data-toggle="collapse" data-target="#range7" class="fas fa-info-circle float-right"></i>
                                                <div id="range7" class="collapse icon-range">
                                                    R:<span>100</span>-<span>3L</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="casino-bl-box">
                                            <div class="back casino-bl-box-item casino-box-odd casino-odds-box suspended-box market_8_row back-1 market_8_b_btn"><span class="">3.75</span> <span class="book-red casino-odds market_8_b_val">0</span></div>
                                            <div class="text-right casino-rb-box-player-range w-100 mt-1">
                                                <i data-toggle="collapse" data-target="#range8" class="fas fa-info-circle float-right"></i>
                                                <div id="range8" class="collapse icon-range">
                                                    R:<span>100</span>-<span>3L</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="casino-bl-box">
                                            <div class="back casino-bl-box-item casino-box-odd casino-odds-box suspended-box market_9_row back-1 market_9_b_btn"><span class="">3.75</span> <span class="book-red casino-odds market_9_b_val">0</span></div>
                                            <div class="text-right casino-rb-box-player-range w-100 mt-1">
                                                <i data-toggle="collapse" data-target="#range9" class="fas fa-info-circle float-right"></i>
                                                <div id="range9" class="collapse icon-range">
                                                    R:<span>100</span>-<span>3L</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="casino-bl-box">
                                            <div class="back casino-bl-box-item casino-box-odd casino-odds-box suspended-box back-1 market_10_row market_10_b_btn"><span class="">3.75</span> <span class="book-red casino-odds market_10_b_val">0</span></div>
                                            <div class="text-right casino-rb-box-player-range w-100 mt-1">
                                                <i data-toggle="collapse" data-target="#range10" class="fas fa-info-circle float-right"></i>
                                                <div id="range10" class="collapse icon-range">
                                                    R:<span>100</span>-<span>3L</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!---->
                            <div class="casino-last-result-title"><span>Last Result</span><span><a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=teenjoker">View All</a></span></div>
                            <div class="casino-last-results" id="last-result"></div>
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
                    }, <?php //echo CASINO_RESULT_TIMEOUT; 
                        ?>);
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
                $(".round_no").text(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
                $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid);
                eventId = data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid;
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
        console.log("data=", data);

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