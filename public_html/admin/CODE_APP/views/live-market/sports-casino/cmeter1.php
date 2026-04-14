<link rel="stylesheet" type="text/css" href="<?php echo MASTER_URL; ?>/assets/css/flipclock.css">

<style type="text/css">
    .video-container {
        position: relative;
        min-height: 400px;
    }

    .market-title {
        background-color: var(--theme2-bg85);
        padding: 6px 8px;
        color: var(--secondary-color);
        font-size: 14px;
        font-weight: bold;
    }

    .game-rules-icon,
    .game-rules-icon:hover,
    .game-rules-icon:focus {
        color: #fff;
    }

    .table-header,
    .table-row {
        display: flex;
        display: -ms-flex;
        display: -webkit-flex;
        border-bottom: 1px solid #fff;
    }

    .table-header>div:first-child,
    .table-row>div:first-child {
        padding-left: 5px;
        padding-right: 5px;
    }

    .table-header>div {
        border-bottom: 0;
    }

    .table-header>div,
    .table-row>div {
        padding: 5px 0;
        border: 1px solid #fff;
        border-right: 0;
        border-bottom: 0;
        border-top: 0;
    }

    .team-name,
    .country-name {
        font-size: 14px;
    }

    .table-row {
        background-color: #f2f2f2;
    }

    .suspended {
        position: relative;
        display: flex !important;
    }

    .bookmaker-market .suspended:after {
        width: 60%;
        content: attr(data-title);
        font-size: 16px;
        color: #ff0000;
        font-family: Arial, Verdana, Helvetica, sans-serif;
    }

    .table-row>div .odd {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 1px;
    }

    .table-row>div .odd~span {
        font-size: 10px;
    }

    .suspended:after {
        /* background-color: rgba(0, 0, 0, 0.6) !important; */
        background-color: #737574d6;
    }

    .fancy-market .box-6 {
        width: 54%;
        min-width: 54%;
        max-width: 54%;
    }

    .fancy-market .box-1 {
        width: 13%;
        min-width: 13%;
        max-width: 13%;
    }

    .fancy-market .fancy-tripple {
        border-bottom: 1px solid #fff;
    }

    .fancy-market .suspended:after {
        width: 46%;
        content: attr(data-title);
        font-size: 16px;
        color: #ff0000;
        font-family: Arial, Verdana, Helvetica, sans-serif;
    }

    .table-row>div a {
        color: var(--site-color);
    }

    .scorecard {
        width: 100%;
        padding: 5px;
        position: relative;
        background-repeat: no-repeat;
        background-size: cover;
        color: #fff;
    }

    .scorecard:before {
        content: "";
        background-color: rgba(0, 0, 0, 0.3);
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
    }

    .ball-runs.four {
        background: #087F23;
    }

    .ball-runs.six {
        background: #883997;
    }

    .cc-rules .card .card-header {
        background-color: transparent;
        padding: 8px;
        color: #000;
    }

    .card-header:first-child {
        border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
    }

    .cc-rules .card .card-body {
        padding: 8px !important;
    }

    .cc-rules img {
        height: 30px;
    }

    .cc-rules .count,
    .cc-rules .value {
        display: flex;
        justify-content: flex-end;
        align-items: center;
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

    .casino-table-full-box {
        width: 100%;
        border-left: 1px solid #c7c8ca;
        border-right: 1px solid #c7c8ca;
        /* border-top: 1px solid #c7c8ca; */
        background-color: #f2f2f2;
    }

    .meter-btns {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        width: 100%;
    }

    .meter-btns .meter-btn {
        width: 48%;
    }

    .meter-btns .meter-btn-box {
        width: 100%;
    }

    [type=button]:not(:disabled),
    [type=reset]:not(:disabled),
    [type=submit]:not(:disabled),
    button:not(:disabled) {
        cursor: pointer;
    }

    .meter-btns .meter-btn .btn-fighter-1 {
        transition: all 0.5s;
        position: relative;
        width: 100%;
        height: 70px;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
        -ms-transition: all 0.5s;
        -o-transition: all 0.5s;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        font-weight: bold;
        text-transform: uppercase;
        border-radius: 0;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        -ms-border-radius: 0;
        -o-border-radius: 0;
        z-index: 1;
        background-color: #72bbef;
        border: 3px solid #e22739 !important;
        box-shadow: 0 0px 6px #c8c8c8;
    }

    .meter-btns .meter-btn .btn-fighter-1:before {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0%;
        height: 100%;
        /* background-color: green; */
        transition: all 0.3s;
        border-radius: 0;
        z-index: -1;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        -ms-border-radius: 0;
        -o-border-radius: 0;
     
    }

    .meter-btns .meter-btn .btn-fighter-1 img {
        transform: rotate(90deg);
        height: 40px;
        margin-left: 10px;
    }

  
    .meter-btns .meter-btn .btn-fighter-1:hover:before {
        width: 100%;
    }

    .meter-btns .meter-btn .btn-fighter-1::after {
        /* content: ""; */
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #737574d6;
        border-radius: 0;
        z-index: 0;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        -ms-border-radius: 0;
        -o-border-radius: 0;
        border: 3px solid #e22739;
        box-shadow: 0 0px 6px #c8c8c8;
    }

    .meter-btns .meter-btn .btn-fighter-2 {
        transition: all 0.5s;
        position: relative;
        width: 100%;
        height: 70px;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
        -ms-transition: all 0.5s;
        -o-transition: all 0.5s;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        font-weight: bold;
        text-transform: uppercase;
        border-radius: 0;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        -ms-border-radius: 0;
        -o-border-radius: 0;
        z-index: 1;
          background-color: #72bbef;
         border: 3px solid #ecc116 !important;
        box-shadow: 0 0px 6px #c8c8c8;
    }

    .meter-btns .meter-btn .btn-fighter-2:before {
        content: "";
        position: absolute;
        bottom: 0;
        right: 0;
        width: 0%;
        height: 100%;
        /* background-color: green; */
        transition: all 0.3s;
        border-radius: 0;
        z-index: -1;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        -ms-border-radius: 0;
        -o-border-radius: 0;
    }

    .meter-btns .meter-btn .btn-fighter-2 img {
        transform: rotate(270deg);
        height: 40px;
        margin-right: 10px;
        -webkit-transform: rotate(270deg);
        -moz-transform: rotate(270deg);
        -ms-transform: rotate(270deg);
        -o-transform: rotate(270deg);
    }

    .meter-btns .meter-btn .btn-fighter-2::before {
        content: "";
        position: absolute;
        bottom: 0;
        right: 0;
        width: 0%;
        height: 100%;
        /* background-color: green; */
        transition: all 0.3s;
        border-radius: 0;
        z-index: -1;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        -ms-border-radius: 0;
        -o-border-radius: 0;
        
    }

    .meter-btns .meter-btn .btn-fighter-2:hover::before {
        width: 100%;
    }

    .meter-btns .meter-btn .btn-fighter-2::after {
        /* content: ""; */
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #737574d6;
        border-radius: 0;
        z-index: 2;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        -ms-border-radius: 0;
        -o-border-radius: 0;
       
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
        width: 100% !important;
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

    .video-overlay{
            top: 168px !important;
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
        left: -824%;
        width: 688px;
        height: 330px;
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
<div class="col-md-12 main-container">
    <div class="listing-grid cardj3 casino-grid">
        <div class="coupon-card row">
            <div class="col-md-8 main-content new-casino race">
                <div class="coupon-card">
                                        <!-- <div class="game-heading"><span class="card-header-title">1 Card Meter
                                              
                                            
                                            <span class="float-right">
                                                Round ID:
                                                <span class="round_no">0</span></span>
                                        </div> -->
                                        <div class="casino-video-title">
                            <span class="casino-name">1 Card Meter</span>
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
                                        <!---->
                                        <div class="video-container">
                                            <?php
                                            if (!empty(IFRAME_URL_SET)) {
                                            ?>
                                                <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . CASINOMETER_CODE; ?>" width="100%" height="400px" style="border: 0px;"></iframe>
                                            <?php

                                            } else {
                                            ?>
                                                <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="400" style="border: 0px;"></iframe>
                                            <?php

                                            }
                                            ?>
                                            <!---->
                                            <!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL;
                                                                                    echo CASINOMETER_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
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
                                                <div class="videoCards" >
                                                    <div>
                                                        <div>
                                                            <img id="card_c1" src="/storage/front/img/cards/1.png">
                                                            <img id="card_c2" src="/storage/front/img/cards/1.png">
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
                                                <li>1 Card meter will be played with 8 deck of cards.</li>
                                                <li>In this game the value of the cards will be as follow
                                                    <p>ACE =1, 2=2, 3=3, ……, Jack =11, Queen=12, King=13.</p>
                                                </li>
                                                <li>In this game there will be two players which will be named as Fighter A &amp; Fighter B.</li>
                                                <li>1 card each will be dealt to both the fighters.</li>
                                                <li>In this game the winner will be the fighter who will have the higher value card and also his point difference will be calculated.</li>
                                            </ul>
                                            <p>For example,</p>
                                            <p>Fighter A has 7.</p>
                                            <p>Fighter B has King (K).</p>
                                            <p>So fighter B will be the winner with 6 points (13-7 = 6).</p>
                                            <p>here the winning amount will be calculated on the point differences.</p>
                                            <p>Like,</p>
                                            <p>1 point 1 time bet amount.</p>
                                            <p>2 points 2 times bet amount.</p>
                                            <p>3 points 3 times bet amount.</p>
                                            <p>4 points 4 times bet amount.</p>
                                            <p>5 points 5 times bet amount.</p>
                                            <p>6 points 6 times bet amount.</p>
                                            <p>7 points 7 times bet amount.</p>
                                            <p>8 points 8 times bet amount.</p>
                                            <p>9 points 9 times bet amount.</p>
                                            <p>10 points 10 times bet amount.</p>
                                            <p>11 points 11 times bet amount.</p>
                                            <p>12 points 12 times bet amount.</p>
                                            <p>(12 times bet amount will be the highest)</p>
                                            <p>So in this case the difference is 6 points thus the winning amount for Fighter B will be 6 times of the bet amount and similarly For Fighter A the losing amount will be 6 times of the bet amount.</p>
                                            <ul class="pl-4 pr-4 list-style">
                                                <li>In this game If punter place bet of 100 amount &amp; If he loses by 12 points then he will lose 1200 amount.
                                                    <p>In short in this game punter can win or lose up to 12 times of his betting amount. </p>
                                                </li>
                                                <li>If both the fighters have same value cards but of different suits then the winner will be decided by the ranking of the suits
                                                    <p>Ie. Spades hearts clubs diamonds</p>
                                                    <p>And in this case the winning amount will be 1 time of the bet amount.
                                                    </p>
                                                    <p>If both the fighters have the same value cards and of the same suits then in this case it will be a tieand the bet amount will be pushed( Returned)</p>
                                                </li>
                                                <li>2% will be charged on winning amount only.</li>
                                            </ul>
                                        </div></div></div>
                                    </div>
                                </div>
                            </div>
                        </div> 

                                        </div>

                                        <div class="casino-table">
                                            <div class="casino-table-full-box">
                                                <div class="meter-btns">
                                                    <div class="meter-btn">
                                                        <div class="text-right min-max">
                                  <b>  Min:<span>50</span></b>
                                   <b> Max:<span>1L</span></div></b>
                                                        <div class="meter-btn-box market_1_row"><button class="btn btn-fighter-1 back market_1_b_btn">Fighter A<img src="/storage/front/img/fight.png" alt="Fight"></button></div>
                                                        <div class="text-center book-green market_1_b_exposure market_exposure text-danger"><b></b></div>
                                                    </div>
                                                    <div class="meter-btn">
                                                        <div class="text-right min-max">
                                   <b> Min:<span>50</span></b>
                                  <b>  Max:<span>1L</span></div></b>
                                                        <div class="meter-btn-box market_2_row"><button class="btn btn-fighter-2 back market_2_b_btn"><img src="/storage/front/img/fight.png" alt="Fight">Fighter B</button></div>
                                                        <div class="text-center book-green market_2_b_exposure market_exposure text-danger"><b></b></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="casino-last-result-title"><span>Last Result</span><span><a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=cmeter1">View All</a></span></div>
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
                        <img src="../../../storage/front/img/rules/superover.jpg" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div id="modalpokerresult" class="modal fade show" tabindex="-1">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">1 Card Meter Result</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" id="cards_data1">
                        <div>
                            <h6 class="text-left round-id">
                                Round Id:
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

<script type="text/javascript" src="<?php echo WEB_URL; ?>/js/socket.io.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/js/flipclock.js" type="text/javascript"></script>


<script type="text/javascript">
    var GAME_ID = "";
    //var SCOREBOARD_SOCKET_URL = "wss://sportsscore24.com";
    var SCOREBOARD_URL = "wss://sportsscore24.com/";
    var ssocket = null;
    var socketScoreBoard;


    function scoreboardConnect() {
        socketScoreBoard = io.connect(SCOREBOARD_URL);

        socketScoreBoard.on("connect", function() {

            socketScoreBoard.emit("subscribe", {
                type: 1,
                rooms: [parseInt(GAME_ID)]
            });
        });
        socketScoreBoard.on("error", function(abc) {

        });
        socketScoreBoard.on("update", function(response) {

            if (
                response.data != undefined &&
                response.data != null &&
                response.data.isfinished == 1
            ) {
                socketScoreBoard.emit("unsubscribe", {
                    type: 1,
                    rooms: []
                });
                // $("#scoreboard-box").html("");
            } else {
                if (response.data != undefined && response.data != null) {
                    //self.scoreboardData = response.data;
                    updateScoreBoard(response.data);
                } else {
                    $("#scoreboard-box").html("");
                }
            }
        });
        socketScoreBoard.on("disconnect", function() {
            // console.log("disconnect");
        });
    }

    function updateScoreBoard(data) {

        if (data.isfinished == "1") {
            $("#scoreboard-box").hide();
            return;
        } else {
            $("#scoreboard-box").show();
        }

        var scoreboardStr = "";
        scoreboardStr += "<div class=\"scorecard scorecard-mobile\"><div data-v-68a8f00a='' class='score-inner'>";
        scoreboardStr += "    <div class=\"row\">";
        scoreboardStr += "        <span class=\"team-name col-2\">" + data.spnnation1 + "<\/span>";
        scoreboardStr += "        <span class=\"score col-6\">" + data.score1 + "<\/span>";
        scoreboardStr += "<span class=\"col-2 run-rate\">";
        if (data.spnrunrate1 != null && data.spnrunrate1 != "") {
            scoreboardStr += "CRR " + data.spnrunrate1;
        }
        scoreboardStr += "<\/span>";
        scoreboardStr += "<span class=\"col-2 run-rate\">";
        if (data.spnreqrate1 != null && data.spnreqrate1 != "") {
            scoreboardStr += " RR " + data.spnreqrate1;
        }
        scoreboardStr += "<\/span>";
        scoreboardStr += "    <\/div>";
        scoreboardStr += "    <div class=\"row m-t-10\">";
        scoreboardStr += "        <span class=\"team-name col-2\">" + data.spnnation2 + "<\/span>";
        scoreboardStr += "        <span class=\"score col-6\">" + data.score2 + "<\/span>";
        scoreboardStr += "        <span class=\"col-2 run-rate\">";
        if (data.spnrunrate2 != null && data.spnrunrate2 != "") {
            scoreboardStr += "CRR " + data.spnrunrate2;
        }
        scoreboardStr += "<\/span>";
        scoreboardStr += "        <span class=\"col-2 run-rate\">";
        if (data.spnreqrate2 != null && data.spnreqrate2 != "") {
            scoreboardStr += " RR " + data.spnreqrate2;
        }
        scoreboardStr += "<\/span>";
        scoreboardStr += "    <\/div>";
        scoreboardStr += "    <div class=\"row\">";
        scoreboardStr += "        <div class=\"col-6 m-t-10\">";
        if (data.spnballrunningstatus != "") {
            scoreboardStr += "<p>";
            if (data.dayno != "") {
                scoreboardStr += "<span>Day " + data.dayno + "<\/span> | ";
            }
            scoreboardStr += data.spnballrunningstatus + "<\/p>";
        } else if (data.spnmessage != "") {
            scoreboardStr += "<p>";
            if (data.dayno != "") {
                scoreboardStr += "<span>Day " + data.dayno + "<\/span> | ";
            }
            scoreboardStr += data.spnmessage + "<\/p>";
        }

        scoreboardStr += "        <\/div>";
        scoreboardStr += "        <div class=\"col-6 ball-runs-container m-t-5\">";
        scoreboardStr += "            <p class=\"text-right ball-by-ball\">";
        $.each(data.balls, function(key, ballVal) {
            if (ballVal != "") {
                var b_class = "";
                if (ballVal == '4') {
                    b_class = "four";
                } else if (ballVal == '6') {
                    b_class = "six";
                } else if (ballVal == 'W') {
                    b_class = "wicket";
                }
                scoreboardStr += "<span class=\"ball-runs " + b_class + "\">" + ballVal + "<\/span> ";
            }
        });
        scoreboardStr += "            <\/p>";
        scoreboardStr += "        <\/div>";
        scoreboardStr += "    <\/div>";
        scoreboardStr += "<\/div><\/div>";
        $("#scoreboard-box").html(scoreboardStr);
        return;
    }
    $(function() {
        var header = $("#sidebar-right");
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();

            if (scroll >= $(window).height() / 3) {
                $("#sidebar-right").css('position', 'fixed');
                $("#sidebar-right").css('top', '0px');
                $("#sidebar-right").css('right', '0px');
                $("#sidebar-right").css('width', 'auto');
            } else {
                $("#sidebar-right").css('position', 'relative');
                $("#sidebar-right").css('top', '0px');
                $("#sidebar-right").css('right', '0px');
                $("#sidebar-right").css('width', 'auto');
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
    var selectionid = "";
    var runner = "";
    var b1 = "";
    var bs1 = "";
    var l1 = "";
    var ls1 = "";
    var markettype = "CMETER1";
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
            socket.emit('Room', 'cmeter1');
        });
        socket.on('gameIframe', function(data) {
            $("#casinoIframe").attr('src', data);
        });
          socket.on('game', function(data) {
          console.log("data=",data);
          
             $(".videoCards").show();
            if (data && data['t1'] && data['t1'][0]) {
                if (oldGameId != data.t1[0].mid && data.t1[0].mid != 0 && data.t1[0].mid != "0") {
                    setTimeout(function() {
                        clearCards();
                    }, <?php //echo CASINO_RESULT_TIMEOUT; ?>);
                }
                oldGameId = data.t1[0].mid;
                if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark").text(data.t1[0].remark);
                    if (data.t1[0].C1 != 1) {
                        $("#card_c1").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C1 + ".png");
                    }
                    if (data.t1[0].C2 != 1) {
                        $("#card_c2").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C2 + ".png");
                    }
                }
                clock.setValue(data.t1[0].autotime);
                $(".round_no").text(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
                eventId = data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid;
                for (var j in data['t2']) {
                    selectionid = parseInt(data['t2'][j].sid);
                    runner = data['t2'][j].nat || data['t2'][j].nation;
                    b1 = data['t2'][j].rate;

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
                    if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSE") {
                        $(".market_" + selectionid + "_b_btn").removeClass("back-1");
                        $(".market_" + selectionid + "_b_btn").addClass("suspended");
                    } else {
                        $(".market_" + selectionid + "_b_btn").addClass("back-1");
                        $(".market_" + selectionid + "_b_btn").removeClass("suspended");
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


        function clearCards() {
        //refresh(markettype);
        $(".videoCards").hide();
        $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
        /*  $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
         $("#card_c4").attr("src", site_url + "storage/front/img/cards/1.png");
         $("#card_c5").attr("src", site_url + "storage/front/img/cards/1.png");
         $("#card_c6").attr("src", site_url + "storage/front/img/cards/1.png"); */
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
            var ab = "";
            var ab1 = "";
            casino_type = "'cmeter1'";
            data.forEach((runData) => {

                if (parseInt(runData.win) == 1) {
                    ab = "result-a";
                    ab1 = "A";

                } else if (parseInt(runData.win) == 2) {
                    ab = "result-b";
                    ab1 = "B";

                } else {
                    ab = "playerc";
                    ab1 = "T";
                }

                eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] : runData.mid;
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs  ' + ab + ' result">' + ab1 + '</span>';
            });
            $("#last-result").html(html);
            if (oldGameId == 0 || oldGameId == resultGameLast) {
                $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
                /* $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
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
    function get_round_no() {
        return $.trim($('.round_no').text());
    }
    $('.last-result').on('click', function() {
        $('#modalpokerresult').modal('show');
    });
    var xhr;

    function call_active_bets() {
        if (get_round_no() > 0) {
            if (xhr && xhr.readyState != 4)
                xhr.abort();
            xhr = $.ajax({
                url: MASTER_URL + '/live-market/sports-casino/active_bets/cmeter1/' + get_round_no(),
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    console.log("data result", data);

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
            url: MASTER_URL + '/live-market/sports-casino/view_more_matched/cmeter1/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/sports-casino/market_analysis/cmeter1/' + get_round_no(),
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

    function view_casiono_result(event_id, casino_type) {

        $("#cards_data").html("");
        $("#round_no").text(event_id);
        $.ajax({
            type: 'POST',
            url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/cmeter1/' + event_id,
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