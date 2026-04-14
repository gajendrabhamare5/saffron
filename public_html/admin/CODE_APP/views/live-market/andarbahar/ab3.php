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

    .casino-table-box {
        padding: 4px;
    }

    .andar-box {
        background-color: #ffa07a;
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        align-content: center;
    }

    .andar-box,
    .andarbg3 {
        background-color: #fc424280;
    }

    .ab-title {
        width: 10%;
        text-align: center;
        border-left: 1px solid #000;
        display: flex;
        flex-wrap: wrap;
        align-content: center;
        justify-content: center;
        border-top: 1px solid #000;
        border-bottom: 1px solid #000;
        font-weight: bold;
    }

    /* .ab-title {
        writing-mode: vertical-lr;
        text-orientation: upright;
    }
 */
    .ab-cards {
        width: 90%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        border: 1px solid #000;
        padding: 10px;
        padding-bottom: 0;
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

    .casino-odds {
        font-size: 18px;
        font-weight: bold;
        line-height: 1;
    }

    .card-odd-box .casino-odds {
        margin-bottom: 5px;
        font-size: 14px;
    }

    .card-odd-box img {
        height: 45px;
    }

    .casino-nation-book {
        font-size: 12px;
        font-weight: bold;
        min-height: 18px;
        z-index: 1;
    }

    .bahar-box {
        background-color: #90ee90;
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        align-content: center;
    }

    .bahar-box,
    .baharbg3 {
        background-color: #fdcf1380;
    }

    .casino-title {
        display: flex;
    }

    .casino-title .d-block {
        margin-top: 1px;
    }

    .casino-title a {
        color: #fff;
        text-decoration: underline;
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
        height: 25px;
        width: 25px;
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

    .casino-last-results .result.result-b {
        color: #ffff33;
    }

    .casino-last-results .result.result-c {
        color: #33c6ff;
    }

    .casino-last-results .result.result-a {
        color: #ff4500;
    }

    .video-overlay {
        width: 25% !important;
        top: 50% !important;
    }

    .video-overlay .ab-rtlslider1 {
        width: 90px !important;
    }

    .video-overlay img {
        width: 24px !important;
        margin-right: unset !important;
    }

    .card-inner {
        height: 40px;
    }

    .card-image {
        min-width: 90px !important;
    }

    .card-image img {
        width: 45px !important;
    }

    .ab-2-box {
        display: flex !important;
        flex-wrap: wrap !important;
        background: none !important;
        justify-content: space-between !important;
        padding: 10px;
    }

    .andar-cards-box {
        width: 49%;
        display: flex;
        padding: 10px;
        justify-content: center;
        flex-wrap: wrap;
        border: 3px solid #fc4242;
        background: #fc424214;
    }

    .bahar-cards-box {
        width: 49%;
        padding: 10px;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        border: 3px solid #fdcf13;
        background: #fdcf1314;
    }

     .casino-video-title {
        position: absolute;
        left: 15px;
        top: 5px;
        background-color: rgba(0, 0, 0, 0.8);
        padding: 10px;
        z-index: 10;
        text-align: center;
        min-width: 220px;
        display: flex;
        display: -webkit-flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

   .casino-video-title .casino-name {
        font-weight: bold;
        text-transform: uppercase;
        font-size: 20px;
        color: #FDCF13;
        line-height: 22px;
        padding: 0;
        background: transparent;
        position: unset;
        width: auto;
    }

    .casino-video-rid {
        font-weight: bold;
        color: #ddd;
        margin-top: 3px;
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
                    <!-- <div class="game-heading">
                        <span class="card-header-title">ANDAR BAHAR 50 CARDS</span>
                      

                        <span class="float-right">
                            Round ID:
                            <span class="round_no">0</span>
                           
                        </span>
                    </div> -->
                     <div class="casino-video-title">
                            <span class="casino-name">ANDAR BAHAR 50 CARDS</span>
                            <div class="casino-video-rid">Round ID: <span id="round-id" class="round_no"></span></div>
                            <!-- <div class="total-points">
                                <div>
                                    <div>Total Card:</div>
                                    <div id="total_card">0</div>
                                </div>
                                <div>
                                    <div>Total Point:</div>
                                    <div id="total_point">0</div>
                                </div>
                            </div> -->
                        </div>
                   
                    <div class="video-container">
                        <?php
                        if (!empty(IFRAME_URL_SET)) {
                            ?>
                        <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . AB3_CODE; ?>" width="100%"
                            height="400px" style="border: 0px;"></iframe>
                        <?php

                        } else {
                            ?>
                        <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="400"
                            style="border: 0px;"></iframe>
                        <?php

                        }
                        ?>
                        <!--<iframe class="iframedesign" src="../tv/andarbahar.html" width="100%" height="200px" style="border: 0px;"></iframe>-->
                        <!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL;
                        echo AB3_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
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
                                            <div class="inn">1</div>
                                        </div>
                                        <div class="down">
                                            <div class="shadow"></div>
                                            <div class="inn">1</div>
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
                        <div class="video-overlay" style="">
                            <div id="game-cards">
                                <!-- <span class="text-white">Next Card Count: <span class="text-warning">137 /
                                        Andar</span></span> -->
                                <div class="card-inner">
                                    <p class="text-white m-b-0"><b>Andar</b></p>
                                    <div id="andar-cards"
                                        class="ab-rtlslider owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                                        <div class="owl-stage-outer">
                                            <div class="owl-stage" id="cards_1"
                                                style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 371px !important;">

                                            </div>
                                        </div>
                                        <div class="owl-nav">
                                            <button type="button" role="presentation" class="owl-prev disabled"><span
                                                    aria-label="Previous">&#8249;</span></button>
                                            <button type="button" role="presentation" class="owl-next"><span
                                                    aria-label="Next"> &#8250;</span></button>
                                        </div>
                                        <div class="owl-dots disabled"></div>
                                    </div>
                                </div>
                                <div class="card-inner">
                                    <p class="text-white m-b-0"><b>Bahar</b></p>
                                    <div id="bahar-cards"
                                        class="ab-rtlslider owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                                        <div class="owl-stage-outer">
                                            <div class="owl-stage" id="cards_2"
                                                style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 371px;">

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
                                                        <li>1. Andar Bahar is a fast paced Indian origin game.</li>
                                                        <li>2. It is played with a regular deck of 52 cards.</li>
                                                        <li>3. This game is played between two sides Andar and Bahar.
                                                        </li>
                                                        <li>4. The objective of the game is to place bet on cards of
                                                            your choice whether they will be on the Andar side or the
                                                            Bahar side and therefor win.</li>
                                                        <li>5. The odds will be available on every card to place your
                                                            bets upto 46th card.</li>
                                                        <li>6. At the start of the game first card will be drawn on the
                                                            Bahar side and the next card will be drawn on the Andar side
                                                            and so on upto the 50th card.</li>
                                                        <li>7. When the card is to be open on the Bahar side odds will
                                                            be available for both the Andar side and the Bahar side.
                                                            <ul class="pl-4 pr-4 list-style">
                                                                <li>* If you place bets on the Bahar side and you win on
                                                                    that particular first card the payout will be 25% of
                                                                    your bet amount from 1st card to 31st card and from
                                                                    the 33rd card to 45th card the payout
                                                                    will be 20% of your bet amount.</li>
                                                                <li>* Winning on all cards other than that particular
                                                                    first card payout will be 100%.</li>
                                                            </ul>
                                                        </li>
                                                        <li>8. When the card is to be open on the Andar side the odds
                                                            will be available only for the Bahar side. The payout will
                                                            be 100% of your bet amount on all the cards.</li>
                                                        <li>9. The game will be considered over after the 50th card is
                                                            drawn. The pending bets on remaining 2 cards will be
                                                            cancelled (Pushed).</li>
                                                    </ul>
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
                            <!-- <div class="casino-table-box">
                                                    <div class="andar-box market_1_row">
                                                        <div class="ab-title">ANDAR</div>
                                                        <div class="ab-cards">
                                                            <div class="card-odd-box">
                                                                <div class="casino-odds market_1_l_value">1</div>
                                                                <div class="lay-1 market_1_l_btn"><img id="ab_cards_1" src="/storage/front/img/andar_bahar/1.jpg"></div>
                                                                <div class="casino-nation-book market_1_l_exposure market_exposure"></div>
                                                            </div>
                                                            <div class="card-odd-box">
                                                                <div class="casino-odds market_2_l_value">1</div>
                                                                <div class="lay-1 market_2_l_btn"><img id="ab_cards_2" src="/storage/front/img/andar_bahar/2.jpg"></div>
                                                                <div class="casino-nation-book market_2_l_exposure market_exposure"></div>
                                                            </div>
                                                            <div class="card-odd-box">
                                                                <div class="casino-odds market_3_l_value">2</div>
                                                                <div class="lay-1 market_3_l_btn"><img id="ab_cards_3" src="/storage/front/img/andar_bahar/3.jpg"></div>
                                                                <div class="casino-nation-book market_3_l_exposure market_exposure"></div>
                                                            </div>
                                                            <div class="card-odd-box">
                                                                <div class="casino-odds market_4_l_value">0</div>
                                                                <div class="lay-1 market_4_l_btn"><img id="ab_cards_4" src="/storage/front/img/andar_bahar/4.jpg"></div>
                                                                <div class="casino-nation-book market_4_l_exposure market_exposure"></div>
                                                            </div>
                                                            <div class="card-odd-box">
                                                                <div class="casino-odds market_5_l_value">2</div>
                                                                <div class="lay-1 market_5_l_btn"><img id="ab_cards_5" src="/storage/front/img/andar_bahar/5.jpg"></div>
                                                                <div class="casino-nation-book market_5_l_exposure market_exposure"></div>
                                                            </div>
                                                            <div class="card-odd-box">
                                                                <div class="casino-odds market_6_l_value">3</div>
                                                                <div class="lay-1 market_6_l_btn"><img id="ab_cards_6" src="/storage/front/img/andar_bahar/6.jpg"></div>
                                                                <div class="casino-nation-book market_6_l_exposure market_exposure"></div>
                                                            </div>
                                                            <div class="card-odd-box">
                                                                <div class="casino-odds market_7_l_value">1</div>
                                                                <div class="lay-1 market_7_l_btn"><img id="ab_cards_7" src="/storage/front/img/andar_bahar/7.jpg"></div>
                                                                <div class="casino-nation-book market_7_l_exposure market_exposure"></div>
                                                            </div>
                                                            <div class="card-odd-box">
                                                                <div class="casino-odds market_8_l_value">2</div>
                                                                <div class="lay-1 market_8_l_btn"><img id="ab_cards_8" src="/storage/front/img/andar_bahar/8.jpg"></div>
                                                                <div class="casino-nation-book market_8_l_exposure market_exposure"></div>
                                                            </div>
                                                            <div class="card-odd-box">
                                                                <div class="casino-odds market_9_l_value">0</div>
                                                                <div class="lay-1 market_9_l_btn"><img id="ab_cards_9" src="/storage/front/img/andar_bahar/9.jpg"></div>
                                                                <div class="casino-nation-book market_9_l_exposure market_exposure"></div>
                                                            </div>
                                                            <div class="card-odd-box">
                                                                <div class="casino-odds market_10_l_value">2</div>
                                                                <div class="lay-1 market_10_l_btn"><img id="ab_cards_10" src="/storage/front/img/andar_bahar/10.jpg"></div>
                                                                <div class="casino-nation-book market_10_l_exposure market_exposure"></div>
                                                            </div>
                                                            <div class="card-odd-box">
                                                                <div class="casino-odds market_11_l_value">2</div>
                                                                <div class="lay-1 market_11_l_btn"><img id="ab_cards_11" src="/storage/front/img/andar_bahar/11.jpg"></div>
                                                                <div class="casino-nation-book market_11_l_exposure market_exposure"></div>
                                                            </div>
                                                            <div class="card-odd-box">
                                                                <div class="casino-odds market_12_l_value">1</div>
                                                                <div class="lay-1 market_12_l_btn"><img id="ab_cards_12" src="/storage/front/img/andar_bahar/12.jpg"></div>
                                                                <div class="casino-nation-book market_12_l_exposure market_exposure"></div>
                                                            </div>
                                                            <div class="card-odd-box">
                                                                <div class="casino-odds market_13_l_value">1</div>
                                                                <div class="lay-1 market_13_l_btn"><img id="ab_cards_13" src="/storage/front/img/andar_bahar/13.jpg"></div>
                                                                <div class="casino-nation-book market_13_l_exposure market_exposure"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bahar-box market_21_row">
                                                        <div class="ab-title">BAHAR</div>
                                                        <div class="ab-cards">
                                                            <div class="card-odd-box">
                                                                <div class="casino-odds market_21_l_value">1</div>
                                                                <div class="market_21_l_btn lay-1"><img id="ab_cards_21" src="/storage/front/img/andar_bahar/1.jpg"></div>
                                                                <div class="casino-nation-book market_21_l_exposure market_exposure"></div>
                                                            </div>
                                                            <div class="card-odd-box">
                                                                <div class="casino-odds market_22_l_value">1</div>
                                                                <div class="market_22_l_btn lay-1"><img id="ab_cards_22" src="/storage/front/img/andar_bahar/2.jpg"></div>
                                                                <div class="casino-nation-book market_22_l_exposure market_exposure"></div>
                                                            </div>
                                                            <div class="card-odd-box">
                                                                <div class="casino-odds market_23_l_value">2</div>
                                                                <div class="market_23_l_btn lay-1"><img id="ab_cards_23" src="/storage/front/img/andar_bahar/3.jpg"></div>
                                                                <div class="casino-nation-book market_23_l_exposure market_exposure"></div>
                                                            </div>
                                                            <div class="card-odd-box">
                                                                <div class="casino-odds market_24_l_value">0</div>
                                                                <div class="market_24_l_btn lay-1"><img id="ab_cards_24" src="/storage/front/img/andar_bahar/4.jpg"></div>
                                                                <div class="casino-nation-book market_24_l_exposure market_exposure"></div>
                                                            </div>
                                                            <div class="card-odd-box">
                                                                <div class="casino-odds market_25_l_value">2</div>
                                                                <div class="market_25_l_btn lay-1"><img id="ab_cards_25" src="/storage/front/img/andar_bahar/5.jpg"></div>
                                                                <div class="casino-nation-book market_25_l_exposure market_exposure"></div>
                                                            </div>
                                                            <div class="card-odd-box">
                                                                <div class="casino-odds market_26_l_value">3</div>
                                                                <div class="market_26_l_btn lay-1"><img id="ab_cards_26" src="/storage/front/img/andar_bahar/6.jpg"></div>
                                                                <div class="casino-nation-book market_26_l_exposure market_exposure"></div>
                                                            </div>
                                                            <div class="card-odd-box">
                                                                <div class="casino-odds market_27_l_value">1</div>
                                                                <div class="market_27_l_btn lay-1"><img id="ab_cards_27" src="/storage/front/img/andar_bahar/7.jpg"></div>
                                                                <div class="casino-nation-book market_27_l_exposure market_exposure"></div>
                                                            </div>
                                                            <div class="card-odd-box">
                                                                <div class="casino-odds market_28_l_value">2</div>
                                                                <div class="market_28_l_btn lay-1"><img id="ab_cards_28" src="/storage/front/img/andar_bahar/8.jpg"></div>
                                                                <div class="casino-nation-book market_28_l_exposure market_exposure"></div>
                                                            </div>
                                                            <div class="card-odd-box">
                                                                <div class="casino-odds market_29_l_value">0</div>
                                                                <div class="market_29_l_btn lay-1"><img id="ab_cards_29" src="/storage/front/img/andar_bahar/9.jpg"></div>
                                                                <div class="casino-nation-book market_29_l_exposure market_exposure"></div>
                                                            </div>
                                                            <div class="card-odd-box">
                                                                <div class="casino-odds market_30_l_value">2</div>
                                                                <div class="market_30_l_btn lay-1"><img id="ab_cards_30" src="/storage/front/img/andar_bahar/10.jpg"></div>
                                                                <div class="casino-nation-book market_30_l_exposure market_exposure"></div>
                                                            </div>
                                                            <div class="card-odd-box">
                                                                <div class="casino-odds market_31_l_value">2</div>
                                                                <div class="market_31_l_btn lay-1"><img id="ab_cards_31" src="/storage/front/img/andar_bahar/11.jpg"></div>
                                                                <div class="casino-nation-book market_31_l_exposure market_exposure"></div>
                                                            </div>
                                                            <div class="card-odd-box">
                                                                <div class="casino-odds market_32_l_value">1</div>
                                                                <div class="market_32_l_btn lay-1"><img id="ab_cards_32" src="/storage/front/img/andar_bahar/12.jpg"></div>
                                                                <div class="casino-nation-book market_32_l_exposure market_exposure"></div>
                                                            </div>
                                                            <div class="card-odd-box">
                                                                <div class="casino-odds market_33_l_value">1</div>
                                                                <div class="market_33_l_btn lay-1"><img id="ab_cards_33" src="/storage/front/img/andar_bahar/13.jpg"></div>
                                                                <div class="casino-nation-book market_33_l_exposure market_exposure"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                            <div class="col-12">
                                <div class="ab-2-box">

                                    <div class="row mt-1">

                                        <div class="col-6 text-center andar-cards-box me-2 market_1_row"
                                            style=" display: inline-block;">
                                            <h3 style="color: #fc4242">Andar</h3>
                                            <div class=" m-r-5 card-image ">
                                                <!-- 
                                                                <div class="lay-1 market_1_l_btn"><img id="ab_cards_1" src="/storage/front/img/andar_bahar/1.jpg"></div>
                                                                 -->
                                                <div class="casino-odds market_1_l_value">1</div>
                                                <div class="market_1_l_btn lay-1 "><img
                                                        src="/storage/front/img/andar_bahar/1.jpg"> </div>
                                                <div class="ubook text-center m-t-5"><b style="color: rgb(0, 0, 0);"
                                                        class="market_1_l_exposure market_exposure text-danger">0</b>
                                                </div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="casino-odds market_2_l_value">1</div>
                                                <div class=" market_2_l_btn back-1"><img
                                                        src="/storage/front/img/andar_bahar/2.jpg"></div>
                                                <div class="ubook text-center m-t-5"><b style="color: rgb(0, 0, 0);"
                                                        class="market_8_b_exposure market_exposure text-danger">0</b>
                                                </div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="casino-odds market_3_l_value">2</div>
                                                <div class=" market_3_l_btn back-1"><img
                                                        src="/storage/front/img/andar_bahar/3.jpg">
                                                </div>
                                                <div class="ubook text-center m-t-5"><b style="color: rgb(0, 0, 0);"
                                                        class="market_9_b_exposure market_exposure text-danger">0</b>
                                                </div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="casino-odds market_4_l_value">0</div>
                                                <div class=" market_4_l_btn back-1"><img
                                                        src="/storage/front/img/andar_bahar/4.jpg">
                                                </div>
                                                <div class="ubook text-center m-t-5"><b style="color: rgb(0, 0, 0);"
                                                        class="market_10_b_exposure market_exposure text-danger">0</b>
                                                </div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="casino-odds market_5_l_value">2</div>
                                                <div class="market_5_l_btn back-1"><img
                                                        src="/storage/front/img/andar_bahar/5.jpg">
                                                </div>
                                                <div class="ubook text-center m-t-5"><b style="color: rgb(0, 0, 0);"
                                                        class="market_11_b_exposure market_exposure text-danger">0</b>
                                                </div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="casino-odds market_6_l_value">3</div>
                                                <div class="market_6_l_value back-1"><img
                                                        src="/storage/front/img/andar_bahar/6.jpg">
                                                </div>
                                                <div class="ubook text-center m-t-5"><b style="color: rgb(0, 0, 0);"
                                                        class="market_12_b_exposure market_exposure text-danger">0</b>
                                                </div>
                                            </div>
                                            <div class=" m-r-5 card-image">

                                                <div class="casino-odds market_7_l_value">1</div>
                                                <div class="market_7_l_btn back-1"><img
                                                        src="/storage/front/img/andar_bahar/7.jpg">
                                                </div>
                                                <div class="ubook text-center m-t-5"><b style="color: rgb(0, 0, 0);"
                                                        class="market_13_b_exposure market_exposure text-danger">0</b>
                                                </div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="casino-odds market_8_l_value">2</div>
                                                <div class=" market_8_l_btn back-1"><img
                                                        src="/storage/front/img/andar_bahar/8.jpg">
                                                </div>
                                                <div class="ubook text-center m-t-5"><b style="color: rgb(0, 0, 0);"
                                                        class="market_14_b_exposure market_exposure text-danger">0</b>
                                                </div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="casino-odds market_9_l_value">0</div>
                                                <div class="market_9_l_btn back-1"><img
                                                        src="/storage/front/img/andar_bahar/9.jpg">
                                                </div>
                                                <div class="ubook text-center m-t-5"><b style="color: rgb(0, 0, 0);"
                                                        class="market_15_b_exposure market_exposure text-danger">0</b>
                                                </div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="casino-odds market_10_l_value">2</div>
                                                <div class="market_10_l_btn back-1"><img
                                                        src="/storage/front/img/andar_bahar/10.jpg">
                                                </div>
                                                <div class="ubook text-center m-t-5"><b style="color: rgb(0, 0, 0);"
                                                        class="market_16_b_exposure market_exposure text-danger">0</b>
                                                </div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="casino-odds market_11_l_value">2</div>
                                                <div class="market_11_l_btn back-1"><img
                                                        src="/storage/front/img/andar_bahar/11.jpg">
                                                </div>
                                                <div class="ubook text-center m-t-5"><b style="color: rgb(0, 0, 0);"
                                                        class="market_17_b_exposure market_exposure text-danger">0</b>
                                                </div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="casino-odds market_12_l_value">1</div>
                                                <div class=" market_12_l_btn back-1"><img
                                                        src="/storage/front/img/andar_bahar/12.jpg">
                                                </div>
                                                <div class="ubook text-center m-t-5"><b style="color: rgb(0, 0, 0);"
                                                        class="market_18_b_exposure market_exposure text-danger">0</b>
                                                </div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="casino-odds market_13_l_value">1</div>
                                                <div class=" market_13_l_btn back-1"><img
                                                        src="/storage/front/img/andar_bahar/13.jpg">
                                                </div>
                                                <div class="ubook text-center m-t-5"><b style="color: rgb(0, 0, 0);"
                                                        class="market_19_b_exposure market_exposure text-danger">0</b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 text-center bahar-cards-box market_2_row"
                                            style=" display: inline-block;">
                                            <h3 style="color: #ef910f">Bahar</h3>
                                            <div class=" m-r-5 card-image ">
                                                <div class="casino-odds market_21_l_value">1</div>
                                                <div class=" market_21_l_btn back-1"><img
                                                        src="/storage/front/img/andar_bahar/1.jpg">
                                                </div>
                                                <div class="ubook text-center m-t-5"><b style="color: rgb(0, 0, 0);"
                                                        class="market_7_b_exposure market_exposure text-danger">0</b>
                                                </div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="casino-odds market_22_l_value">1</div>
                                                <div class=" market_22_l_btn back-1"><img
                                                        src="/storage/front/img/andar_bahar/2.jpg">
                                                </div>
                                                <div class="ubook text-center m-t-5"><b style="color: rgb(0, 0, 0);"
                                                        class="market_8_b_exposure market_exposure text-danger">0</b>
                                                </div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="casino-odds market_23_l_value">2</div>
                                                <div class="market_23_l_btn back-1"><img
                                                        src="/storage/front/img/andar_bahar/3.jpg">
                                                </div>
                                                <div class="ubook text-center m-t-5"><b style="color: rgb(0, 0, 0);"
                                                        class="market_9_b_exposure market_exposure text-danger">0</b>
                                                </div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="casino-odds market_24_l_value">0</div>
                                                <div class="market_24_l_btn back-1"><img
                                                        src="/storage/front/img/andar_bahar/4.jpg">
                                                </div>
                                                <div class="ubook text-center m-t-5"><b style="color: rgb(0, 0, 0);"
                                                        class="market_10_b_exposure market_exposure text-danger">0</b>
                                                </div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="casino-odds market_25_l_value">2</div>
                                                <div class="market_25_l_btn back-1"><img
                                                        src="/storage/front/img/andar_bahar/5.jpg">
                                                </div>
                                                <div class="ubook text-center m-t-5"><b style="color: rgb(0, 0, 0);"
                                                        class="market_11_b_exposure market_exposure text-danger">0</b>
                                                </div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="casino-odds market_26_l_value">3</div>
                                                <div class=" market_26_l_btn back-1"><img
                                                        src="/storage/front/img/andar_bahar/6.jpg">
                                                </div>
                                                <div class="ubook text-center m-t-5"><b style="color: rgb(0, 0, 0);"
                                                        class="market_12_b_exposure market_exposure text-danger">0</b>
                                                </div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="casino-odds market_27_l_value">1</div>
                                                <div class="market_27_l_btn back-1"><img
                                                        src="/storage/front/img/andar_bahar/7.jpg">
                                                </div>
                                                <div class="ubook text-center m-t-5"><b style="color: rgb(0, 0, 0);"
                                                        class="market_13_b_exposure market_exposure text-danger">0</b>
                                                </div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="casino-odds market_28_l_value">2</div>
                                                <div class=" market_28_l_btn back-1"><img
                                                        src="/storage/front/img/andar_bahar/8.jpg">
                                                </div>
                                                <div class="ubook text-center m-t-5"><b style="color: rgb(0, 0, 0);"
                                                        class="market_14_b_exposure market_exposure text-danger">0</b>
                                                </div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="casino-odds market_29_l_value">0</div>
                                                <div class=" market_29_l_btn back-1"><img
                                                        src="/storage/front/img/andar_bahar/9.jpg">
                                                </div>
                                                <div class="ubook text-center m-t-5"><b style="color: rgb(0, 0, 0);"
                                                        class="market_15_b_exposure market_exposure text-danger">0</b>
                                                </div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="casino-odds market_30_l_value">2</div>
                                                <div class="market_30_l_btn back-1"><img
                                                        src="/storage/front/img/andar_bahar/10.jpg">
                                                </div>
                                                <div class="ubook text-center m-t-5"><b style="color: rgb(0, 0, 0);"
                                                        class="market_16_b_exposure market_exposure text-danger">0</b>
                                                </div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="casino-odds market_31_l_value">2</div>
                                                <div class="market_31_l_btn back-1"><img
                                                        src="/storage/front/img/andar_bahar/11.jpg">
                                                </div>
                                                <div class="ubook text-center m-t-5"><b style="color: rgb(0, 0, 0);"
                                                        class="market_17_b_exposure market_exposure text-danger">0</b>
                                                </div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="casino-odds market_32_l_value">1</div>
                                                <div class=" market_32_l_btn back-1"><img
                                                        src="/storage/front/img/andar_bahar/12.jpg">
                                                </div>
                                                <div class="ubook text-center m-t-5"><b style="color: rgb(0, 0, 0);"
                                                        class="market_18_b_exposure market_exposure text-danger">0</b>
                                                </div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="casino-odds market_33_l_value">1</div>
                                                <div class=" market_33_l_btn back-1"><img
                                                        src="/storage/front/img/andar_bahar/13.jpg">
                                                </div>
                                                <div class="ubook text-center m-t-5"><b style="color: rgb(0, 0, 0);"
                                                        class="market_19_b_exposure market_exposure text-danger">0</b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="casino-last-result-title"><span>Last Result</span><span><a
                                    href="<?php echo MASTER_URL; ?>/reports/casino-results?q=ab3">View All</a></span>
                        </div>
                        <div class="casino-last-results" id="last-result">
                            <!-- <span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span> -->
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

                        <h4 class="modal-title">ANDAR BAHAR 50 CARDS Result</h4>

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
var markettype = "AB3";
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
        socket.emit('Room', 'ab3');
    });
    socket.on('gameIframe', function(data) {
        $("#casinoIframe").attr('src', data);
    });
    socket.on('game', function(data) {
      

        if (data && data['t1'] && data['t1'][0]) {
            if (oldGameId != data.t1[0].mid && data.t1[0].mid != 0 && data.t1[0].mid != "0") {
                // setTimeout(function() {
                // 	clearCards();
                // }, <?php echo CASINO_RESULT_TIMEOUT; ?>);
            }
            oldGameId = data.t1[0].mid;
            if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                $(".casino-remark").text(data.t1[0].remark);


            }
            clock.setValue(data.t1[0].autotime);
            $(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid);
            $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid);
            eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid;

            for (var j in data['t1']) {


                allcards = data['t1'][j].cards;
                var ball = [];
                var aall = [];
                var count_non_ones = 0;
                 var count_non_ones_new = 0;

                         acards_html_array = [];
                        var acards_html = "";
                        var len1 = 0;

                        bcards_html_array = [];
                        var bcards_html = "";
                        var lenb = 0;


                // Loop through the array and push values to the appropriate array
                for (var i = 0; i < allcards.length; i++) {

                    if (allcards[i] != "1") {
                        count_non_ones++;
                        if (i % 2 === 0) {
                            ball.push(allcards[i]); // For even indices
                            bcards_html_array.push('  <div class="owl-item " id="owl_bc_img_id_' + (ball.length - 1) + '"  style=""><div class="item"><img src="../../../storage/front/img/cards_new/' + allcards[i] + '.png"></div></div>');
                        lenb++;
                        } else {
                            aall.push(allcards[i]); // For odd indices
                            acards_html_array.push('  <div class="owl-item " id="owl_ac_img_id' + (aall.length - 1) + '" style="margin-right:25px !important;"><div class="item"><img src="../../../storage/front/img/cards_new/' + allcards[i] + '.png"></div></div>');
                              len1++;
                        }
                    }
                }
                $(".nextcard").hide();
                if (count_non_ones > 0) {
                    count_non_ones = count_non_ones + 1;
                    if (count_non_ones % 2 === 0) {
                        count_non_ones += " / Bahar";
                    } else {
                        count_non_ones += " / Ander";
                    }
                    $(".nextcard").show();
                    $(".runnernext").html(count_non_ones);
                }
              
                      const $andar = $('#andar-cards');

if ($andar.hasClass('owl-loaded')) {
   
    
    if (aall.length > 0) {
        $andar.trigger('replace.owl.carousel', [jQuery("")]);
        acards_html_array.reverse();
        for (let i = 0; i < acards_html_array.length; i++) {
            $andar.trigger('add.owl.carousel', [jQuery(acards_html_array[i])]);
        }
        $andar.trigger('refresh.owl.carousel');
    }

    
}


                        
       const $bahar = $('#bahar-cards');

if ($bahar.hasClass('owl-loaded')) {
   
    
    if (ball.length > 0) {
         $bahar.trigger('replace.owl.carousel', [jQuery("")]);
        bcards_html_array.reverse();
        for (let i = 0; i < bcards_html_array.length; i++) {
            $bahar.trigger('add.owl.carousel', [jQuery(bcards_html_array[i])]);
        }
          $bahar.trigger('refresh.owl.carousel');
    }

  
}

            }

             var bet_card="";
             for (var j in data['t2']) {
                bet_card = data['t2'][j].gstatus.toString();
                // if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {

                //      $("#ab_cards_" + selectionid).attr("src", "../storage/front/img/andar_bahar/0.jpg");
                //     $(".market_" + selectionid + "_l_btn").removeClass("back-1");
                //     $(".market_" + selectionid + "_row").addClass("suspended-box");
                // } else {
                //     $(".market_" + selectionid + "_l_btn").addClass("back-1");
                //      $("#ab_cards_" + selectionid).attr("src", "../storage/front/img/andar_bahar/" + selectionid + ".jpg");
                //     $(".market_" + selectionid + "_row").removeClass("suspended-box");
                // }
            }

            for (var j in data['t3']) {
                selectionid = parseInt(data['t3'][j].sid);
                runner = data['t3'][j].nat || data['t3'][j].nation;
                b1 = data['t3'][j].b1;
                l1 = data['t3'][j].l1;


                markettype = "AB3";


                /*  $(".market_" + selectionid + "_b_btn").attr("side", "Back");
                $(".market_" + selectionid + "_b_btn").attr("selectionid", selectionid);
                $(".market_" + selectionid + "_b_btn").attr("marketid", selectionid);
                $(".market_" + selectionid + "_b_btn").attr("runner", runner);
                $(".market_" + selectionid + "_b_btn").attr("marketname", runner);
                $(".market_" + selectionid + "_b_btn").attr("eventid", eventId);
                $(".market_" + selectionid + "_b_btn").attr("markettype", markettype);
                $(".market_" + selectionid + "_b_btn").attr("event_name", markettype);
                $(".market_" + selectionid + "_b_btn").attr("fullmarketodds", b1);
                $(".market_" + selectionid + "_b_btn").attr("fullfancymarketrate", b1);
                $(".market_"+selectionid+"_b_value").html(b1); */

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
                $(".market_" + selectionid + "_l_value").html(l1);


                // gstatus = data['t2'][j].gstatus.toString();
                // if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {

                //     $("#ab_cards_" + selectionid).attr("src", "../storage/front/img/andar_bahar/0.jpg");
                //     $(".market_" + selectionid + "_l_btn").removeClass("back-1");
                //     $(".market_" + selectionid + "_row").addClass("suspended-box");
                // } else {
                //     $(".market_" + selectionid + "_l_btn").addClass("back-1");
                //     $("#ab_cards_" + selectionid).attr("src", "../storage/front/img/andar_bahar/" + selectionid + ".jpg");
                //     $(".market_" + selectionid + "_row").removeClass("suspended-box");
                // }
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
    // refresh(markettype);
    $(".nextcard").hide();
    $("#cards_1").html("")
    $("#cards_2").html("");
}

function updateResult(data) {
    console.log("updateResult", data);

    if (data && data[0]) {
        resultGameLast = data[0].mid;

        if (last_result_id != resultGameLast) {
            last_result_id = resultGameLast;
            // refresh(markettype);
        }

        html = "";
        var ab = "";
        var ab1 = "";
        casino_type = "'ab3'";
        data.forEach((runData) => {

            ab = "result-b";
            ab1 = "R";

            eventId = runData.mid == 0 ? 0 : runData.mid;
            html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type +
                ')"  class="result ml-1  ' + ab + ' result">' + ab1 + '</span>';
        });
        $("#player_1_value").removeClass("text-success");
        $("#player_2_value").removeClass("text-success");
        $("#player_3_value").removeClass("text-success");
        $("#player_4_value").removeClass("text-success");
        $("#last-result").html(html);
        if (oldGameId == 0 || oldGameId == resultGameLast) {
            $("#cards_1").html("")
            $(".nextcard").hide();
            $("#cards_2").html("");
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
        url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/ab3/' + event_id,
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
        url: MASTER_URL + '/live-market/andarbahar/active_bets/ab3/' + get_round_no(),
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
        url: MASTER_URL + '/live-market/andarbahar/view_more_matched/ab3/' + get_round_no(),
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
        url: MASTER_URL + '/live-market/andarbahar/market_analysis/ab3/' + get_round_no(),
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