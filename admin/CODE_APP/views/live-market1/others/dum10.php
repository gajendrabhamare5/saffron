<link rel="stylesheet" type="text/css" href="<?php echo MASTER_URL; ?>/assets/css/flipclock.css">
<link rel="stylesheet" type="text/css" href="<?php echo WEB_URL; ?>/storage/js/plugins/OwlCarousel2/assets/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?php echo WEB_URL; ?>/storage/js/plugins/OwlCarousel2/assets/owl.theme.default.css">
<div class="col-md-12 main-container">
    <style>
        .ab-2 .video-overlay img {
            border-radius: 4px;
            width: 30px !important;
            height: auto;
            margin-right: 3px;
        }

        .ab-2 .card-right {
            margin-top: 0;
        }

        .video-overlay img {
            width: 35px;
            height: auto;
            margin-right: 2px;
            margin-left: 2px;
        }

        .ab-2 .video-overlay .card-inner {
            margin-bottom: 3px;
        }

        .last-result-slider .owl-prev {
            position: absolute;
            top: 0;
            right: -20px !important;
            left: unset;
        }

        .last-result-slider .owl-next span,
        .last-result-slider .owl-prev span {
            color: #333;
            font-size: 35px;
            line-height: 1;
        }

        .last-result-slider .owl-next {
            position: absolute;
            top: 0;
            left: -20px !important;
            right: unset;
        }

        .owl-carousel .owl-dots {
            display: none;
        }

        .winner-icon {
            position: absolute;
            right: 0;
            bottom: 15%;
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

        .casino-table-box:first-child {
            padding-bottom: 20px;
            position: relative;
            margin-bottom: 10px !important;
        }

        .casino-table-box:first-child {
            width: 100%;
            margin: 0 auto;
        }

        .casino-table-box:first-child::after {
            content: "";
            background-color: #fdcf13;
            height: 1px;
            width: 50%;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            -webkit-transform: translateX(-50%);
            -moz-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            -o-transform: translateX(-50%);
            bottom: 0;
        }

        .casino-table-header,
        .casino-table-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            border-bottom: 1px solid #c7c8ca;
        }

        .casino-table-header,
        .casino-table-body {
            width: 100%;
        }

        .casino-table-header,
        .casino-table-body {
            border-left: 1px solid #c7c8ca;
            border-top: 1px solid #c7c8ca;
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

        .casino-table-header .casino-nation-detail {
            font-weight: bold;
            min-height: unset;
        }

        .casino-nation-detail {
            width: 60%;
            flex-direction: revert;
            justify-content: space-between;
            align-items: center;
            padding: 0 10px;
            background-color: #ddd;
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
            /* background-image: linear-gradient(to right, #0088cc, #2c3e50); */
            color: black;
            /* border-radius: 4px;
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
            border: 0; */
        }

        .casino-table-header .casino-odds-box {
            cursor: unset;
            padding: 2px;
            min-height: unset;
            height: auto !important;
        }

        .casino-odds-box {
            width: 20%;
        }

        .casino-table-header,
        .casino-table-body {
            width: 100%;
        }

        .casino-table-header,
        .casino-table-body {
            border-left: 1px solid #c7c8ca;
        }

        .casino-nation-name {
            font-size: 16px;
            font-weight: bold;
        }

        .casino-odds {
            font-size: 18px;
            font-weight: bold;
            line-height: 1;
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

        .casino-table-left-box,
        .casino-table-right-box {
            width: 49%;
            padding: 10px 10px 0 10px;
            display: flex
;
    justify-content: space-evenly;
        }

        .aaa-odd-box {
            margin-bottom: 10px;
            min-height: 92px;
            width: 100%;
            margin-right: 4px;
        }

        .casino-table-left-box .casino-odds-box,
        .casino-table-right-box .casino-odds-box {
            width: 100%;
            margin: 5px 0;
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


        .video-overlay .ab-rtlslider1 {
            width: 90px !important;
        }

        .dkd-total {
            padding: 5px;
            margin-right: 0;
            border: 1px solid yellow;
            color: #fff;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            width: 190px;
            margin-top: 5px;
            align-items: center;
        }

        .dkd-total {
            width: 200px;
        }

        .dkd-total>div:first-child {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .dkd-total>div:first-child>div {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
        }

        .dkd-total>div {
            line-height: normal;
        }
         .numeric{
            font-size: 26px;
    margin-left: 5px;
    color: #ef910f;
    font-weight: bold;
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
    .video-overlay{
        top: 50%;
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
    <div class="listing-grid ddb-container casino-grid">
        <div class="coupon-card row ab-2">
            <div class="col-md-8 main-content">
               <div class="coupon-card">
                                        <!-- <div class="game-heading"><span class="card-header-title">Dus ka Dum
                                            
                                            <span class="float-right">
                                                Round ID:
                                                <span class="round_no">0</span></span>
                                        </div> -->

                                        <div class="casino-video-title">
                            <span class="casino-name">Dus ka Dum</span>
                            <div class="casino-video-rid">Round ID: <span id="round-id" class="round_no"></span></div>
                             <div class="total-points">
                                <div class="dkd-total">
                                    <div style="color: white;">Current Total:<span class="numeric text-playerb cards_total">0</span></div>
                                    <!-- <div id="total_card">0</div> -->
                                     <!-- <div class="">0</div> -->
                                </div>
                                <!-- <div>
                                    <div>Total Point:</div>
                                    
                                </div> -->
                            </div> 
                        </div>
                                      
                                        <div class="video-container">
                                            <?php
                                            if (!empty(IFRAME_URL_SET)) {
                                            ?>
                                                <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . DUM10_CODE; ?>" width="100%" height="400px" style="border: 0px;"></iframe>
                                            <?php

                                            } else {
                                            ?>
                                                <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="400" style="border: 0px;"></iframe>
                                            <?php

                                            }
                                            ?>
                                            <!---->
                                            <!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL;
                                                                                    echo DUM10_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
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
                                                <div>
                                                    <div>
                                                        <!-- <div class="dkd-total mb-1 mt-1">
                                                            <div>
                                                                <div>
                                                                    <div>Current Total:</div>
                                                                    <div class="numeric text-playerb cards_total">0</div>
                                                                </div>
                                                                <div>Card #:<span class="no_cards"> 0 </span></div>
                                                            </div>
                                                            <div class="runnernext"></div>
                                                        </div> -->
                                                        <div class="d-flex">
                                                            <div id="dum10-cards" class="ab-rtlslider ab-rtlslider1 owl-carousel owl-theme owl-rtl owl-loaded owl-drag mt-1">
                                                                <div class="owl-stage-outer">
                                                                    <div class="owl-stage" id="cards_1" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 196px;">

                                                                    </div>
                                                                </div>
                                                                <div class="owl-nav">
                                                                    <button type="button" role="presentation" class="owl-prev disabled"><span aria-label="Previous">&#8249;</span></button>
                                                                    <button type="button" role="presentation" class="owl-next"><span aria-label="Next">&#8250;</span></button>
                                                                </div>
                                                                <div class="owl-dots disabled"></div>
                                                            </div>
                                                            <div class="mt-1 ml-1">
                                                                <img id="card_c1" src="../storage/front/img/cards/1.png">
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
                                                <li>Dus Ka Dum is an unique and instant result game.</li>
                                                <li>It is played with a regular single deck of 52 cards.</li>
                                                <li>In this game each card has point value</li>
                                            </ul>
                                            <h6 class="rules-highlight">Point value of cards:</h6>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Ace = 1</td>
                                                            <td>8 = 8</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2 = 2</td>
                                                            <td>9 = 9</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3 = 3</td>
                                                            <td>10 = 10</td>
                                                        </tr>
                                                        <tr>
                                                            <td>4 = 4</td>
                                                            <td>J = 11</td>
                                                        </tr>
                                                        <tr>
                                                            <td>5 = 5</td>
                                                            <td>Q = 12</td>
                                                        </tr>
                                                        <tr>
                                                            <td>6 = 6</td>
                                                            <td>K = 13</td>
                                                        </tr>
                                                        <tr>
                                                            <td>7 = 7</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <p>(Suit of card is irrelevant in point value)</p>
                                            <ul class="pl-4 pr-4 list-style">
                                                <li>Dus ka Dum is a one card game. The dealer will draw a single card every time which will decide the result of the game. Hence that particular game will be over.</li>
                                                <li>Now always the last drawn card will be removed and kept aside. Thereafter a new game will commence from the remaining cards. Then the same process will continue till there is a winning chance or otherwise up to 35 cards or so.</li>
                                                <li>All the drawn cards will be added to current total.</li>
                                            </ul>
                                            <p>Example1: </p>
                                            <p>If first four drawn cards are: 7, 9, J, 4</p>
                                            <p>So current total is 31, now on opening of 5th card bet will be for next total 40 or more.</p>
                                            <p>Eaxmple2: If the current total of first 11 drawn cards is 84 the bet will open for next total 90 or more.</p>
                                            <p>Example3: The current total of first 12 drawn cards is 79 the bet will open for next total 90 or more (because on opening of any cards 80 is certainty). </p>
                                            <ul class="pl-4 pr-4 list-style">
                                                <li>The objective of the game is to achieve next (decade) total or more and therefor win.</li>
                                                <li>Both back and lay options will be available.</li>
                                            </ul>
                                        </div></div><div><div class="rules-section">
                                            <h6 class="rules-highlight">Side bets:</h6>
                                            <p>
                                                <h7 class="rules-sub-highlight">Odd even:</h7> Here you can bet on every card whether it will be an odd card or an even card.
                                            </p>
                                            <p>Odd cards: A, 3, 5, 7, 9, J, K</p>
                                            <p>Even cards: 2, 4, 6, 8, 10, Q</p>
                                            <p>
                                                <h7 class="rules-sub-highlight">Red Black:</h7> Here you can bet on every card whether it will be a red card or a black card.
                                            </p>
                                            <p>Red cards: Hearts, Diamonds</p>
                                            <p>Black cards: Spades, Clubs</p>
                                        </div></div></div>
                                    </div>
                                </div>
                            </div>
                        </div> 

                                        </div>

                                        <div class="casino-table">
                                            <div class="casino-table-box">
                                                <!-- <div class="casino-table-header">
                                                    <div class="casino-nation-detail"></div>
                                                    <div class="casino-odds-box back">Back</div>
                                                    <div class="casino-odds-box lay">Lay</div>
                                                </div> -->
                                                <div class="casino-table-body">
                                                    <div class="casino-table-row ">
                                                        <div class="casino-nation-detail d-flex text-align: center;">
                                                            <div class="casino-nation-name market_1_name d-flex justify-content-between">Next Total 160 or More</div>
                                                            <div class="casino-nation-book w-100 market_1_b_exposure market_exposure text-danger"></div>
                                                        </div>
                                                        <div class="casino-odds-box back suspended-box  market_1_row market_1_b_btn back-1"><span class="casino-odds market_1_b_value">0</span></div>
                                                        <div class="casino-odds-box lay suspended-box  market_1_row market_1_l_btn lay-1"><span class="casino-odds market_1_l_value">0</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="casino-table-box mt-3">
                                                <div class="casino-table-left-box">
                                                    <div class="aaa-odd-box">
                                                        <div class="casino-odds text-center market_5_b_value">0</div>
                                                        <div class="casino-odds-box back casino-odds-box-theme suspended-box  market_5_row market_5_b_btn back-1"><span class="casino-odds market_5_name">Even</span>
                                                        <div class="casino-nation-book text-center w-100 market_5_b_exposure market_exposure text-danger"></div>
                                                        </div>
                                                    </div>
                                                    <div class="aaa-odd-box">
                                                        <div class="casino-odds text-center market_6_b_value">0</div>
                                                        <div class="casino-odds-box back casino-odds-box-theme suspended-box  market_6_row market_6_b_btn back-1"><span class="casino-odds market_6_name">Odd</span>
                                                        <div class="casino-nation-book text-center w-100 market_6_b_exposure market_exposure text-danger"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="casino-table-right-box">
                                                    <div class="aaa-odd-box">
                                                        <div class="casino-odds text-center market_3_b_value">0</div>
                                                        <div class="casino-odds-box back casino-odds-box-theme suspended-box  market_3_row market_3_b_btn back-1">
                                                            <div class="casino-odds"><span class="card-icon ms-1"><span class="card-red ">{</span></span><span class="card-icon ms-1"><span class="card-red ">[</span></span></div>
                                                        
                                                        <div class="casino-nation-book text-center w-100 market_3_b_exposure market_exposure text-danger"></div>
                                                        </div>
                                                    </div>
                                                    <div class="aaa-odd-box">
                                                        <div class="casino-odds text-center market_4_b_value">0</div>
                                                        <div class="casino-odds-box back casino-odds-box-theme suspended-box  market_4_row market_4_b_btn back-1">
                                                            <div class="casino-odds"><span class="card-icon ms-1"><span class="card-black ">}</span></span><span class="card-icon ms-1"><span class="card-black ">]</span></span></div>
                                                       
                                                        <div class="casino-nation-book text-center w-100 market_4_b_exposure market_exposure text-danger"></div>
                                                         </div>
                                                        <span class="float-right casino-min-max">R:<span>100</span>-<span>10K</span></span>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="casino-last-result-title"><span>Last Result</span><span><a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=dum10">View All</a></span></div>
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

                        <h4 class="modal-title">View More </h4>

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

                        <img src="<?php echo WEB_URL; ?>/storage/front/img/rules/abj-rules.jpg" class="img-fluid">

                    </div>

                </div>

            </div>

        </div>

        <div id="modalpokerresult" class="modal fade show" tabindex="-1">

            <div class="modal-dialog" style="min-width: 650px">

                <div class="modal-content">

                    <div class="modal-header">

                        <h4 class="modal-title">Dus ka Dum Result</h4>

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
    var markettype = "DUM10";
    var markettype_2 = markettype;
    var back_html = "";
    var lay_html = "";
    var gstatus = "";
    var last_result_id = '0';

    var CARDS_IMG_URL = site_url + "storage/front/img/cards";

    function websocket(type) {
        socket = io.connect(websocketurl, {
            transports: ['websocket']
        });
        socket.on('connect', function() {
            socket.emit('Room', 'dum10');
        });

        socket.on('gameIframe', function(data) {
            $("#casinoIframe").attr('src', data);
        });
        socket.on('game', function(data) {

                  if (data && data['t1'] && data['t1'][0]) {
                if (oldGameId != data.t1[0].mid && data.t1[0].mid != 0 && data.t1[0].mid != "0") {
                    // setTimeout(function() {
                    //     clearCards();
                    // }, <?php echo CASINO_RESULT_TIMEOUT; ?>);
                }
                oldGameId = data.t1[0].mid;
                if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark").text(data.t1[0].remark);
                    if (data.t1[0].cards != 1) {
                        $("#card_c1").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].cards +
                            ".png");
                    } else {
                        $("#card_c1").attr("src", site_url + "storage/front/img/cards_new/1.png");
                    }
                    var desc = data.t1[0].lcard;
                    desc = desc.split(",");
                    $(".no_cards").html(desc.length);
                    var card_count = 0;
                    aall = [];
                    for (var i in desc) {

                        if (desc[i] != 1) {
                            aall.push(desc[i]);
                            card_value = getType(desc[i]);
                            card_rank = card_value.rank;
                            card_count += card_rank;
                        }

                    }
                    $(".cards_total").text(card_count);


                    acards_html_array = [];
                    var acards_html = "";
                    var len1 = 0;

                    if (aall != "") {
                        for (ac in aall) {


                            acards_html_array.push('  <div class="owl-item " id="owl_ac_img_id' + ac + '" style=""><div class="item"><img src="/storage/front/img/cards_new/' + aall[ac] + '.png"></div></div>');
                            acards_html += acards_html_array[len1];

                            len1++;
                            if (len1 == aall.length) {
                                acards_html_array.reverse();

                                acards_html = acards_html_array.join('');

                                $("#cards_1").html(acards_html);
                                $('#dum10-cards').owlCarousel().trigger('add.owl.carousel',
                                    [jQuery(acards_html)]).trigger('refresh.owl.carousel');
                            } else {
                                $("#cards_1").html(acards_html);
                                $('#dum10-cards').owlCarousel().trigger('add.owl.carousel',
                                    [jQuery(acards_html)]).trigger('refresh.owl.carousel');
                            }



                        }

                    } else {
                        $("#cards_1").html("");
                        $('#dum10-cards').owlCarousel().trigger('add.owl.carousel',
                            [jQuery(acards_html)]).trigger('refresh.owl.carousel');
                    }
                }
                clock.setValue(data.t1[0].autotime);
                $(".round_no").text(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
                eventId = data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid;
                for (var j in data['t2']) {
                    selectionid = data.t2[j].sectionId || data.t2[j].sid;
                    runner = data.t2[j].nation || data.t2[j].nat;
                    b1 = data.t2[j].b1;
                    bs1 = data.t2[j].bs1;
                    l1 = data.t2[j].l1;
                    ls1 = data.t2[j].ls1;


                    $(".market_" + selectionid + "_name").html(runner);
                    if (selectionid == 1) {
                        $(".runnernext").html(runner);
                    }
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
                    $(".market_" + selectionid + "_b_value").html(b1);

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
                    $(".market_" + selectionid + "_l_value").html(l1);

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
                     rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ?
                        11 : data[0] == '10' ?
                        10 : parseInt(data[0])
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
                       rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ?
                            11 : data[0] == '10' ?
                            10 : parseInt(data[0])
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
                            rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ?
                                11 : data[0] == '10' ?
                                10 : parseInt(data[0])
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
                                 rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ?
                                    11 : data[0] == '10' ?
                                    10 : parseInt(data[0])
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
        $("#cards_1").html("");
        /*  $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
         $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
         $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
         $("#card_c4").attr("src", site_url + "storage/front/img/cards/1.png");
         $("#card_c5").attr("src", site_url + "storage/front/img/cards/1.png");
         $("#card_c6").attr("src", site_url + "storage/front/img/cards/1.png"); */
    }

    function updateResult(data) {
        console.log("data=", data);
        if (data && data[0]) {
            /* data = JSON.parse(JSON.stringify(data)); */
            resultGameLast = data[0].mid;

            if (last_result_id != resultGameLast) {
                last_result_id = resultGameLast;
                //refresh(markettype);
            }

            var html = "";
            var ab = "";
            var ab1 = "";
            casino_type = "'dum10'";
            data.forEach((runData) => {


                if (parseInt(runData.win) == 1) {
                    ab = "result-b";
                    ab1 = "Y";

                } else if (parseInt(runData.win) == 2) {
                    ab = "result-b";
                    ab1 = "N";

                } else {
                    ab = "result-c";
                    ab1 = "R";
                }

                eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] : runData.mid;
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs  ' + ab + ' result">' + ab1 + '</span>';
            });
            $("#last-result").html(html);
            if (oldGameId == 0 || oldGameId == resultGameLast) {
                $("#cards_1").html("")
                /* $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c4").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c5").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c6").attr("src", site_url + "storage/front/img/cards/1.png"); */
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
            url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/dum10/' + event_id,
            dataType: 'json',
            data: {
                event_id: event_id,
                casino_type: casino_type
            },
            success: function(response) {
                $('#modalpokerresult').modal('show');
                $("#cards_data1").html(response.result);
               /* $('.last-result-slider').owlCarousel({
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
                });*/
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
            url: MASTER_URL + '/live-market/others/active_bets/dum10/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/others/view_more_matched/dum10/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/others/market_analysis/dum10/' + get_round_no(),
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