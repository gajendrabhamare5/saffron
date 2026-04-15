<link rel="stylesheet" type="text/css" href="<?php echo MASTER_URL; ?>/assets/css/flipclock.css">

<div class="col-md-12 main-container">
    <style type="text/css">
    .aaa-button {
        margin-top: 10px;
    }

    .aaa-button button {
        padding: 8px;
        border: 0;
        outline: none;
        width: 50%;
        float: left;
    }

    .aaa-content {
        background-color: #eee;
        padding: 15px;
    }

    .bollywood-casino-btn {
        color: #fff;
        background-image: linear-gradient(to right, #0088CC, #2C3E50);
        width: 100%;
        border-radius: 4px;
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
        border: 0;
        padding: 8px 10px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
    }

    .card-image {
        display: inline-block;
    }

    .card-image img {
        width: 40px;
    }

    .suspended {
        position: relative;
    }

    .suspended:after {
        width: 100%;
        content: "\f023";
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        color: #fff;
        background: rgba(0, 0, 0, 0.90);
    }

    .info-icon {
        color: #000;
        font-size: 16px;
    }

    .info-block {
        position: relative;
    }

    .info-block .min-max-info {
        background: rgb(102, 102, 102) none repeat scroll 0% 0%;
        padding: 6px 14px;
        position: absolute;
        color: rgb(255, 255, 255);
        right: 0px;
        z-index: 1000;
    }

    .aaa-content b {
        font-size: 16px;
    }

    .ddb-second-row .aaa-content {
        height: 240px;
    }

    .ball-runs {
        margin-left: 2px;
    }

    .ubook b {
        font-size: 14px;
    }

    #view-more label {
        display: block;
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

    .casino-odd-box-container {
        width: 100%;
    }

    .casino-odd-box-container {
        width: calc(33.33% - 7.5px);
        margin-right: 10px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .casino-nation-name {
        font-size: 16px;
        font-weight: bold;
    }

    .casino-nation-name {
        width: 100%;
        text-align: center;
    }

    .casino-nation-book {
        font-size: 12px;
        font-weight: bold;
        min-height: 18px;
        z-index: 1;
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
        width: 49%;
    }

    .casino-odds {
        font-size: 18px;
        font-weight: bold;
        line-height: 1;
    }

    .casino-odd-box-container:last-child {
        margin-right: 0;
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
    .casino-table-center-box,
    .casino-table-right-box {
        width: 32%;
        padding: 10px 10px 0 10px;
        display: flex;
        /* flex-wrap: wrap; */
        /* flex-direction: row; */
        align-content: stretch;
        justify-content: space-around;
    }

    .aaa-odd-box {
        margin-bottom: 10px;
        min-height: 92px;
        width: 50%;
        margin-right: 4px;
    }

    .casino-odds-box-theme {
        /* background-image: linear-gradient(to right, #0088cc, #2c3e50); */
        color: black !important;
        /* border-radius: 4px;
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
        border: 0; */
    }

    .casino-table-left-box .casino-odds-box,
    .casino-table-center-box .casino-odds-box,
    .casino-table-right-box .casino-odds-box {
        width: 100%;
        margin: 5px 0;
    }

    .casino-table-full-box {
        width: 100%;
        /* border-left: 1px solid #c7c8ca;
        border-right: 1px solid #c7c8ca;
        border-top: 1px solid #c7c8ca;
        background-color: #f2f2f2; */
    }

    .aaacards {
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
        min-width: 80px;
    }

    .card-odd-box img {
        /* height: 45px; */
        width: 48px;

    }

    h4,
    .h4 {
        font-size: 20px;
        font-weight: 400;
        margin-bottom: 0;
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
        <div class="coupon-card row">
            <div class="col-md-8 main-content">
                <div class="coupon-card">
                    <div class="game-heading"><span class="card-header-title">Amar Akbar Anthony 2
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
                                            if (!empty(IFRAME_URL_SET)) {
                                            ?>
                        <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . AAA2_CODE; ?>" width="100%"
                            height="400px" style="border: 0px;"></iframe>
                        <?php

                                            } else {
                                            ?>
                        <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="400"
                            style="border: 0px;"></iframe>
                        <?php

                                            }
                                            ?>
                        <!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL;
                                                                                    echo AAA2_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
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
                                    <div>
                                        <img id="card_c1" src="/storage/front/img/cards/1.png">
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
                                                <li>If the card is ACE,2,3,4,5, or 6 Amar Wins. </li>
                                                <li>If the card is 7,8,9 or 10 Akbar wins. </li>
                                                <li>If the card is J,Q or K Anthony wins.</li>
                                            </ul>
                                        </div></div><div><div class="rules-section">
                                            <p>
                                                <b class="rules-sub-highlight">EVEN</b>
                                                <span class="ml-2">(PAYOUT 2.12)</span>
                                            </p>
                                            <ul class="pl-4 pr-4 list-style">
                                                <li>If the card is 2 , 4 , 6 , 8 , 10 , Q</li>
                                            </ul>
                                            <p>
                                                <b class="rules-sub-highlight">ODD</b>
                                                <span class="ml-2">(PAYOUT 1.83)</span>
                                            </p>
                                            <ul class="pl-4 pr-4 list-style">
                                                <li>If the card is A , 3 , 5 , 7 , 9 , J , K</li>
                                            </ul>
                                            <p>
                                                <b class="rules-sub-highlight">RED</b>
                                                <span class="ml-2">(PAYOUT 1.97)</span>
                                            </p>
                                            <ul class="pl-4 pr-4 list-style">
                                                <li>If the card color is DIAMOND or HEART</li>
                                            </ul>
                                            <p>
                                                <b class="rules-sub-highlight">BLACK</b>
                                                <span class="ml-2">(PAYOUT 1.97)</span>
                                            </p>
                                            <ul class="pl-4 pr-4 list-style">
                                                <li>If the card color is CLUB or SPADE</li>
                                            </ul>
                                            <p>
                                                <b class="rules-sub-highlight">UNDER 7</b>
                                                <span class="ml-2">(PAYOUT 2.0)</span>
                                            </p>
                                            <ul class="pl-4 pr-4 list-style">
                                                <li>If the card is A , 2 , 3 , 4 , 5 , 6</li>
                                            </ul>
                                            <p>
                                                <b class="rules-sub-highlight">OVER 7</b>
                                                <span class="ml-2">(PAYOUT 2.0)</span>
                                            </p>
                                            <ul class="pl-4 pr-4 list-style">
                                                <li>If the card is 8 , 9 , 10 , J , Q , K</li>
                                            </ul>
                                            <p>
                                                <b>Note: </b>
                                                <span>If the card is 7, Bets on under 7 and over 7 will lose 50% of the bet amount.</span>
                                            </p>
                                            <p>
                                                <b class="rules-sub-highlight">CARDS</b>
                                                <span class="ml-2">(PAYOUT 12.0)</span>
                                            </p>
                                            <ul class="pl-4 pr-4 list-style">
                                                <li>A , 2 , 3 , 4 , 5 , 6 , 7 , 8 , 9 , 10 , J , Q , K</li>
                                            </ul>
                                        </div></div></div>
                                    </div>
                                </div>
                            </div>
                        </div> 

                    </div>

                    <div class="casino-table">
                        <div class="casino-table-box">
                            <div class="casino-odd-box-container">
                                <div class="casino-nation-name">
                                    A. Amar
                                    <div class="casino-nation-book d-md-none market_1_b_exposure market_exposure"></div>
                                </div>
                                <div class="casino-odds-box back suspended-box back-1 market_1_b_btn market_1_row"><span
                                        class="casino-odds market_1_b_value">0</span></div>
                                <div class="casino-odds-box lay suspended-box lay-1 market_1_l_btn market_1_row"><span
                                        class="casino-odds market_1_l_value">0</span></div>
                                <div
                                    class="casino-nation-book text-center d-none d-md-block w-100 market_1_b_exposure market_exposure text-danger">
                                </div>
                            </div>
                            <div class="casino-odd-box-container">
                                <div class="casino-nation-name">
                                    B. Akbar
                                    <div class="casino-nation-book d-md-none market_2_b_exposure market_exposure"></div>
                                </div>
                                <div class="casino-odds-box back suspended-box market_2_row back-1 market_2_b_btn"><span
                                        class="casino-odds market_2_b_value">0</span></div>
                                <div class="casino-odds-box lay suspended-box market_2_row lay-1 market_2_l_btn"><span
                                        class="casino-odds market_2_l_value">0</span></div>
                                <div
                                    class="casino-nation-book text-center d-none d-md-block w-100 market_2_b_exposure market_exposure text-danger">
                                </div>
                            </div>
                            <div class="casino-odd-box-container">
                                <div class="casino-nation-name">
                                    C. Anthony
                                    <div class="casino-nation-book d-md-none market_3_b_exposure market_exposure"></div>
                                </div>
                                <div class="casino-odds-box back suspended-box market_3_row back-1 market_3_b_btn"><span
                                        class="casino-odds market_3_b_value">0</span></div>
                                <div class="casino-odds-box lay suspended-box market_3_row lay-1 market_3_l_btn"><span
                                        class="casino-odds market_3_l_value">0</span></div>
                                <div
                                    class="casino-nation-book text-center d-none d-md-block w-100 market_3_b_exposure market_exposure text-danger">
                                </div>
                                 <div class="teen1daycasino-container casino-min-max w-100">
                                        <div style="text-align: end;">R:<span>100</span>-<span>3L</span></div>
                                                    </div>
                            </div>
                        </div>
                        <div class="casino-table-box mt-3">
                            <div class="casino-table-left-box">
                                <div class="aaa-odd-box">
                                    <div class="casino-odds text-center market_4_b_value">0</div>
                                    <div
                                        class="casino-odds-box back casino-odds-box-theme suspended-box market_4_b_btn market_4_row back-1">
                                        <span class="casino-odds">Even</span></div>
                                    <div class="casino-nation-book text-center market_4_b_exposure market_exposure">
                                    </div>
                                </div>
                                <div class="aaa-odd-box">
                                    <div class="casino-odds text-center market_5_b_value">0</div>
                                    <div
                                        class="casino-odds-box back casino-odds-box-theme suspended-box market_5_b_btn market_5_row back-1">
                                        <span class="casino-odds">Odd</span></div>
                                    <div class="casino-nation-book text-center market_5_b_exposure market_exposure text-danger">
                                    </div>
                                     <div class="teen1daycasino-container casino-min-max w-100">
                                        <div style="text-align: end;">R:<span>100</span>-<span>25k</span></div>
                                                    </div>
                                </div>
                            </div>
                            <div class="casino-table-center-box">
                                <div class="aaa-odd-box">
                                    <div class="casino-odds text-center market_6_b_value">0</div>
                                    <div
                                        class="casino-odds-box back casino-odds-box-theme suspended-box market_6_b_btn market_6_row back-1">
                                        <div class="casino-odds"><span class="card-icon ms-1"><span
                                                    class="card-red ">{</span></span><span class="card-icon ms-1"><span
                                                    class="card-red ">[</span></span></div>
                                    </div>
                                    <div class="casino-nation-book text-center market_6_b_exposure market_exposure text-danger">
                                    </div>
                                </div>
                                <div class="aaa-odd-box">
                                    <div class="casino-odds text-center market_7_b_value">0</div>
                                    <div
                                        class="casino-odds-box back casino-odds-box-theme suspended-box market_7_b_btn market_7_row back-1">
                                        <div class="casino-odds"><span class="card-icon ms-1"><span
                                                    class="card-black ">}</span></span><span
                                                class="card-icon ms-1"><span class="card-black ">]</span></span></div>
                                    </div>
                                    <div class="casino-nation-book text-center market_7_b_exposure market_exposure text-danger">
                                    </div>
                                     <div class="teen1daycasino-container casino-min-max w-100">
                                        <div style="text-align: end;">R:<span>100</span>-<span>25k</span></div>
                                                    </div>
                                </div>
                            </div>
                            <div class="casino-table-right-box">
                                <div class="aaa-odd-box">
                                    <div class="casino-odds text-center market_21_b_value">0</div>
                                    <div
                                        class="casino-odds-box back casino-odds-box-theme suspended-box market_21_b_btn market_21_row back-1">
                                        <span class="casino-odds">Under 7</span></div>
                                    <div class="casino-nation-book text-center market_21_b_exposure market_exposure text-danger">
                                    </div>
                                </div>
                                <div class="aaa-odd-box">
                                    <div class="casino-odds text-center market_22_b_value">0</div>
                                    <div
                                        class="casino-odds-box back casino-odds-box-theme suspended-box market_22_b_btn market_22_row back-1">
                                        <span class="casino-odds">Over 7</span></div>
                                    <div class="casino-nation-book text-center market_22_b_exposure market_exposure text-danger">
                                    </div>
                                     <div class="teen1daycasino-container casino-min-max w-100">
                                        <div style="text-align: end;">R:<span>100</span>-<span>1L</span></div>
                                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="casino-table-full-box aaacards mt-3">
                            <h4 class="w-100 text-center mb-2"><b class="market_8_b_value">0</b></h4>
                            <div class="card-odd-box">
                                <div class="suspended-box market_8_b_btn market_8_row back-1"><img
                                        src="/storage/front/img/cards/A.png"></div>
                                <div class="casino-nation-bookmarket_8_b_exposure market_exposure text-danger"></div>
                            </div>
                            <div class="card-odd-box">
                                <div class="suspended-box market_9_b_btn market_9_row back-1"><img
                                        src="/storage/front/img/cards/2.png"></div>
                                <div class="casino-nation-book market_9_b_exposure market_exposure text-danger"></div>
                            </div>
                            <div class="card-odd-box">
                                <div class="suspended-box market_10_b_btn market_10_row back-1"><img
                                        src="/storage/front/img/cards/3.png"></div>
                                <div class="casino-nation-book market_10_b_exposure market_exposure text-danger"></div>
                            </div>
                            <div class="card-odd-box">
                                <div class="suspended-box market_11_b_btn market_11_row back-1"><img
                                        src="/storage/front/img/cards/4.png"></div>
                                <div class="casino-nation-market_11_b_exposure market_exposure text-danger"></div>
                            </div>
                            <div class="card-odd-box">
                                <div class="suspended-box market_12_b_btn market_12_row back-1"><img
                                        src="/storage/front/img/cards/5.png"></div>
                                <div class="casino-nation-book market_12_b_exposure market_exposure text-danger"></div>
                            </div>
                            <div class="card-odd-box">
                                <div class="suspended-box market_13_b_btn market_13_row back-1"><img
                                        src="/storage/front/img/cards/6.png"></div>
                                <div class="casino-nation-book market_13_b_exposure market_exposure text-danger"></div>
                            </div>
                            <div class="card-odd-box">
                                <div class="suspended-box market_14_b_btn market_14_row back-1"><img
                                        src="/storage/front/img/cards/7.png"></div>
                                <div class="casino-nation-book market_14_b_exposure market_exposure text-danger"></div>
                            </div>
                            <div class="card-odd-box">
                                <div class="suspended-box market_15_b_btn market_15_row back-1"><img
                                        src="/storage/front/img/cards/8.png"></div>
                                <div class="casino-nation-book market_15_b_exposure market_exposure text-danger"></div>
                            </div>
                            <div class="card-odd-box">
                                <div class="suspended-box market_16_b_btn market_16_row back-1"><img
                                        src="/storage/front/img/cards/9.png"></div>
                                <div class="casino-nation-book market_16_b_exposure market_exposure text-danger"></div>
                            </div>
                            <div class="card-odd-box">
                                <div class="suspended-box market_17_b_btn market_17_row back-1"><img
                                        src="/storage/front/img/cards/10.png"></div>
                                <div class="casino-nation-book market_17_b_exposure market_exposure text-danger"></div>
                            </div>
                            <div class="card-odd-box">
                                <div class="suspended-box market_18_b_btn market_18_row back-1"><img
                                        src="/storage/front/img/cards/J.png"></div>
                                <div class="casino-nation-book market_18_b_exposure market_exposure text-danger"></div>
                            </div>
                            <div class="card-odd-box">
                                <div class="suspended-box market_19_b_btn market_19_row back-1"><img
                                        src="/storage/front/img/cards/Q.png"></div>
                                <div class="casino-nation-book market_19_b_exposure market_exposure text-danger"></div>
                            </div>
                            <div class="card-odd-box">
                                <div class="suspended-box market_20_b_btn market_20_row back-1"><img
                                        src="/storage/front/img/cards/K.png"></div>
                                <div class="casino-nation-book market_20_b_exposure market_exposure text-danger"></div>
                            </div>
                             <div class="teen1daycasino-container casino-min-max w-100">
                                        <div style="text-align: end;">R:<span>100</span>-<span>5k</span></div>
                                                    </div>
                        </div>
                    </div>

                    <div class="casino-last-result-title"><span>Last Result</span><span><a
                                href="<?php echo MASTER_URL; ?>/reports/casino-results?q=aaa2">View All</a></span></div>
                    <div class="casino-last-results" id="last-result"></div>
                </div>
            </div>
            <div class="col-md-4 sidebar-right" id="sidebar-right">
                <div class="card m-b-10 scorecard" style="margin-bottom: 0px;">
                    <div class="card m-b-10 my-bet">
                        <div class="card-header">
                            <ul class="nav nav-tabs d-inline-block" role="tablist ">
                                <li class="nav-item d-inline-block">
                                    <!-- <a class="nav-link active " data-toggle="tab" href="#matched-bet">Matched <span
                                            id="matchedCount">(0)</span></a> -->
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
                        <h4 class="modal-title">Amar Akbar Anthony 2 Result</h4>
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

<script type="text/javascript" src="<?php echo WEB_URL; ?>/js/socket.io.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/js/flipclock.js" type="text/javascript"></script>


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
var markettype = "AMAR_AKBAR_ANTHONY2";
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
        socket.emit('Room', 'aaa2');
    });
    socket.on('gameIframe', function(data) {
        $("#casinoIframe").attr('src', data);
    });
    socket.on('game', function(data) {
        // console.log("taa=", data);
        data1 = data;
        if (data) {
            if (oldGameId != data1.t1[0].mid && data1.t1[0].mid != 0 && data1.t1[0].mid != "0") {
                 setTimeout(function() {
                     clearCards();
                 }, <?php //echo CASINO_RESULT_TIMEOUT; ?>);
            }
            oldGameId = data1.t1[0].mid;
            if (data1.t1[0].mid != 0 && data1.t1[0].mid != "0" && oldGameId != resultGameLast) {
                $(".casino-remark").text(data.t1[0].remark);

                if (data.t1[0].C1 != 1) {

                    $("#card_c1").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C1 +
                        ".png");
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

                gstatus = data.t2[j].gstatus.toString();
                if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {
                    $(".market_" + selectionid + "_row").addClass("suspended-box");
                    $(".market_" + selectionid + "_b_btn").removeClass("back-1");
                } else {
                    $(".market_" + selectionid + "_row").removeClass("suspended-box");
                    $(".market_" + selectionid + "_b_btn").addClass("back-1");
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
}

function updateResult(data) {
console.log("updated data",data);

    if (data && data[0]) {
        data = JSON.parse(JSON.stringify(data));
        resultGameLast = data[0].mid;

        if (last_result_id != resultGameLast) {
            last_result_id = resultGameLast;
            // refresh(markettype);
        }

        var html = "";
        var ab = "";
        var ab1 = "";
        casino_type = "'aaa2'";
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

            eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] :
                runData.mid;
            html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type +
                ')"  class="ball-runs  ' + ab + ' result">' + ab1 + '</span>';
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
        url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/aaa2/' + event_id,
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
        url: MASTER_URL + '/live-market/bollywood-casino/active_bets/aaa2/' + get_round_no(),
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
        url: MASTER_URL + '/live-market/bollywood-casino/view_more_matched/aaa2/' + get_round_no(),
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
        url: MASTER_URL + '/live-market/bollywood-casino/market_analysis/aaa2/' + get_round_no(),
        type: 'POST',
        dataType: 'json',
        success: function(data) {
            if (data.results == 0) {
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