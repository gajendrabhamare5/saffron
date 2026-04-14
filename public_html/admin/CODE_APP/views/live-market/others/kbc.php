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

    .row.row5 {
        margin-left: -5px;
        margin-right: -5px;
    }

    .kbc-btns {
        align-items: center;
        width: 100%;
    }

    .col-md-4 {
        flex: 0 0 auto;
        width: 33.33333333%;
    }

    .row.row5>[class*="col-"],
    .row.row5>[class*="col"] {
        padding-left: 5px;
        padding-right: 5px;
    }

    .casino-odd-box-container {
        width: 100%;
        margin-bottom: 10px;
    }

    .casino-nation-name {
        font-size: 16px;
        font-weight: bold;
    }

    .kbc-btns .casino-nation-name {
        /* background: #2c3e50; */
        border-radius: 12px;
        color: black;
        padding: 6px;
        /* border: 1px solid #fdcf13; */
        border-bottom: 0;
        text-align: center;
    }

    .btn-group,
    .btn-group-vertical {
        position: relative;
        display: inline-flex;
        vertical-align: middle;
    }

    .kbc-btns .btn-group {
        width: 85%;
        margin: 0 auto;
        display: flex;
        flex-wrap: nowrap;
        justify-content: space-between;
    }

    button,
    input,
    optgroup,
    select,
    textarea {
        margin: 0;
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
    }

    .btn-check {
        position: absolute;
        clip: rect(0, 0, 0, 0);
        pointer-events: none;
    }

    .kbc-btns .btnspan {
        /* background-color: #72bbef; */
        width: calc(50% - 4px);
        border: 3px solid #72bbef;
        margin: 3px;
    }

    .kbc-btns .btn {

        color: #000;
        color: #000;
        /* border: 2px solid #fdcf13; */

        flex: 0 0 auto;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        margin-left: 1px;
        border-top: 0;
        border-radius: 0;
        font-weight: bold;
        font-size: 18px;
    }

    .btn-group>.btn-group:not(:last-child)>.btn,
    .btn-group>.btn:not(:last-child):not(.dropdown-toggle) {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .kbc-btns .btn img {
        width: 23px;

        margin-right: 5px;
    }

    .btn-check:checked+.btn {
        background-color: var(--bs-success);
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

    .video-overlay img {
        margin-bottom: 3px;
    }

    @media only screen and (min-width: 1400px) and (max-width: 1599px) {
        .hfquitbtns .btn {
            width: 110px;
            height: 110px;
        }
    }

    .hfquitbtns .hbtn {
        background-image: linear-gradient(-180deg, #03b37f 0%, #06553e 100%);
        border-width: 5px !important;
        border: 5px solid #116f52;
        margin-right: 20px;
    }

    .hfquitbtns .btn {
        opacity: 1;
        width: 120px;
        height: 120px;
        border-radius: 50% !important;
        color: #fff;
    }

    .hfquitbtns .fbtn {
        background-image: linear-gradient(-180deg, #fc4242 0%, #6f0404 100%);
        border-color: #6f0404 !important;
        border-width: 5px !important;
        border: 5px solid #6f0404;
    }

    .hfquitbtns {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .hfquitbtns .btn.selected {
        border-color: var(--text-fancy) !important;
        box-shadow: 0 0 5px #fff !important;
        opacity: 1;
    }

    .kbcbtesbox>div {
        width: calc(33.33% - 6px) !important;
        margin-bottom: 5px;
    }

    .kbcbtesbox {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        width: 100%;
        padding: 5px;
    }

    .kbcbtesbox .bet-box {
        margin-left: 3px;
        margin-right: 3px;
        width: calc(33.33% - 6px);
        margin-bottom: 5px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #FFF;
    }

    .kbcbtesbox .bet-box {
        background: #2C3E50;
        padding: 5px 10px;
        border-radius: 8px;
        margin-left: 3px;
        margin-right: 3px;
        width: calc(33.33% - 6px);
        margin-bottom: 5px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        min-height: 32px;
        color: #FFF;
    }

    .kbcbtesbox .bet-box span {
        flex: 1;
        text-align: center;
    }

    .kbcbtesbox .bet-box i {
        color: #bd1828;
        cursor: pointer;
    }

    .hfquitbtns {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .kbc .kbc-btns .btn {
        background-color: #72bbef;
        color: #000;
        color: #000;
        border: 2px solid #fdcf13;
        width: calc(50% - 4px);
        flex: 0 0 auto;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        margin-left: 1px;
        border-top: 0;
        border-radius: 0;
        font-weight: bold;
        font-size: 18px;
    }

    .hfquitbtns .btn {
        opacity: 1;
        width: 130px;
        height: 130px;
        border-radius: 50% !important;
        color: #fff;
    }

    .hfquitbtns .hbtn {
        background-image: linear-gradient(-180deg, #03b37f 0%, #06553e 100%);
        border-width: 5px !important;
        border: 5px solid #116f52;
        margin-right: 20px;
    }

    .hfquitbtns .btn {
        width: 90px;
        height: 90px;
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
                                        <div class="game-heading"><span class="card-header-title">K.B.C
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
                                                <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . KBC_CODE; ?>" width="100%" height="400px" style="border: 0px;"></iframe>
                                            <?php

                                            } else {
                                            ?>
                                                <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="400" style="border: 0px;"></iframe>
                                            <?php

                                            }
                                            ?>

                                            <!---->
                                            <!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL;
                                                                                    echo KBC_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
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
                                                    <div>
                                                        <div>
                                                            <img id="card_c2" src="/storage/front/img/cards/1.png">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <img id="card_c3" src="/storage/front/img/cards/1.png">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <img id="card_c4" src="/storage/front/img/cards/1.png">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <img id="card_c5" src="/storage/front/img/cards/1.png">
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
                                                <li>Kaun Banega Crorepati  (KBC ) is a unique and a new concept game played with a regular 52 cards deck.</li>
                                                <li>As the name itself suggests there are very high returns on your bets.</li>
                                                <li><b>How to play KBC :</b> There is a set of five questions and each question has options</li>
                                                <li>5 cards will be drawn one by one from the deck as the answers to this questions 1 to 5 respectively.</li>
                                                <li><b>Q1. </b><b>RED</b>(Hearts &amp; Diamonds) or <b>BLACK</b>(Spades &amp; Clubs )</li>
                                                <li><b>Q2. </b><b>ODD</b>(A,3,5,7,9,J,K) or <b>EVEN</b>(2,4,6,8,10,Q)</li>
                                                <li><b>Q3. </b><b>7UP</b>(8,9,10,J,Q,K) or <b>7DOWN</b>(A,2,3,4,5,6)</li>
                                                <li><b>Q4. </b><b>3 CARD JUDGEMENT</b>(A,2,3   or  4,5,6   or  8,9,10  or  J,Q,K)
                                                    <div>Any 1card from the set of 3cards you choose.</div>
                                                </li>
                                                <li><b>Q5. </b><b>SUITS ( COLOR )</b>(Spades  or   Hearts   or   Clubs    or   Diamonds)
                                                    <div>You have to select your choice of answer from given options for all the questions.</div>
                                                    <div>At the start of the game you have three choices to play this game .</div>
                                                </li>
                                                <li><b>1. Five Questions :</b> Going for all the 5 questions</li>
                                                <li><b>2. Four questions  (Four card quit )  :</b>   Going for the 1st  4 questions .</li>
                                                <li><b>3. 50-50 Quit :</b> Going for 5 questions but 50-50 quit after the 4th question.</li>
                                            </ul>
                                        </div></div><div><div class="rules-section">
                                            <h6 class="rules-highlight">About the Odds :  </h6>
                                            <h6 class="rules-sub-highlight">1. Five questions : </h6>
                                            <ul class="pl-4 pr-4 list-style">
                                                <li>a. If you are going with an ODD card as your 2nd answer your winning odds will be 101 times of your betting amount.</li>
                                                <li>eg: bet amount : 1000 x  101 odds  = 1,01,000 net winning amount.</li>
                                                <li>b. If you are going with an EVEN card as your 2nd answer your winning odds will be 111 times of your betting amount.</li>
                                                <li>eg: bet amount : 1000 x  111 odds  = 1,11,000 net winning amount.</li>
                                            </ul>
                                            <h6 class="rules-sub-highlight">2. Four Questions (Four card quit ) : </h6>
                                            <ul class="pl-4 pr-4 list-style">
                                                <li>a. If you are going with an ODD card as your 2nd answer your winning odds will be 26.5 times of your betting amount.</li>
                                                <li>eg : bet amount : 1000 x  26.5 odds  = 26,500 net winning amount.</li>
                                                <li>b. If you are going with an EVEN card as your 2nd answer your winning odds will be 29 times of your betting amount.</li>
                                                <li>eg : bet amount : 1000 x  29 odds  =  29,000 net winning amount.</li>
                                            </ul>
                                            <h6 class="rules-sub-highlight">3. 50-50 Quit : </h6>
                                            <ul class="pl-4 pr-4 list-style">
                                                <li>In this you will get half of your winning amount after the 4th card and the remaining half of your winning amount + half of your initial bet amount will be placed on the 5th card as your betting amount.</li>
                                                <li><b>If all the five answers are correct :</b></li>
                                                <li>eg 1(a) ODD CARD :bet amount : 1000 x 63.76 odds   = 63,760 net winning amount.</li>
                                                <li>eg 1(b) EVEN CARD :bet amount : 1000 x  69.65 odds  = 69,650 net winning amount.</li>
                                                <li><b>If the 5th answer is incorrect :</b></li>
                                                <li>eg 2(a) ODD CARD: bet amount : 1000 x  12.75 odds  = 12,750 net winning amount.</li>
                                                <li>eg 2(b) EVEN CARD: bet amount : 1000 x  14 odds  = 14,000 net winning amount.</li>
                                            </ul>
                                        </div></div></div>
                                    </div>
                                </div>
                            </div>
                        </div> 

                                        </div>

                                        <div class="casino-table markets_all">

                                        </div>

                                        <div class="casino-last-result-title"><span>Last Result</span><span><a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=kbc">View All</a></span></div>
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

                        <h4 class="modal-title">K.B.C Result</h4>

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
    var markettype = "KBC";
    var markettype_2 = markettype;
    var back_html = "";
    var lay_html = "";
    var gstatus = "";
    var last_result_id = '0';
    var old_eid = '0';

    function websocket(type) {
        socket = io.connect(websocketurl, {
            transports: ['websocket']
        });
        socket.on('connect', function() {
            socket.emit('Room', 'kbc');
        });
        socket.on('gameIframe', function(data) {
            $("#casinoIframe").attr('src', data);
        });
        socket.on('game', function(data) {
            console.log("data=", data);
            data1 = data;
            if (data && data.t1) {
                if (oldGameId != data1.t1[0].mid && data1.t1[0].mid != 0 && data1.t1[0].mid != "0") {
                     setTimeout(function() {
                        clearCards();
                     }, <?php // echo CASINO_RESULT_TIMEOUT; ?>);
                }

                oldGameId = data1.t1[0].mid;

                if (data1.t1[0].mid != 0 && data1.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark").text(data.t1[0].remark);
                    if (data.t1[0].C1 != "1") {
                        $("#card_c1").attr("src", site_url + "/storage/front/img/cards_new/" + data.t1[0].C1 +
                            ".png");
                    }
                    if (data.t1[0].C2 != "1") {
                        $("#card_c2").attr("src", site_url + "/storage/front/img/cards_new/" + data.t1[0].C2 +
                            ".png");
                    }
                    if (data.t1[0].C3 != "1") {
                        $("#card_c3").attr("src", site_url + "/storage/front/img/cards_new/" + data.t1[0].C3 +
                            ".png");

                    }
                    if (data.t1[0].C4 != "1") {
                        $("#card_c4").attr("src", site_url + "/storage/front/img/cards_new/" + data.t1[0].C4 +
                            ".png");

                    }
                    if (data.t1[0].C5 != "1") {
                        $("#card_c5").attr("src", site_url + "/storage/front/img/cards_new/" + data.t1[0].C5 +
                            ".png");
                    }
                }
                clock.setValue(data.t1[0].autotime);
                $(".round_no").text(data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid);
                $("#casino_event_id").val(data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid);
                eventId = data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid;

                var markets_red_black = "";
                var markets_odd_even = "";
                var markets_up_down = "";
                var markets_cards = "";
                var markets_suits = "";
                for (var j in data.t2) {
                    selectionid = data.t2[j].sectionId || data.t2[j].sid;
                    new_selectionid = selectionid;
                    runner = data.t2[j].nation || data.t2[j].nat;
                    b1 = data.t2[j].b1;
                    bs1 = data.t2[j].bs1;
                    l1 = data.t2[j].l1;
                    ls1 = data.t2[j].ls1;
                    visible = data.t2[j].visible;
                    subtype = data.t2[j].subtype;
                    if (visible == "1" || true) {
                        /*back_html = '<span class="odds d-block"><b>' + b1 + '</b></span> <span style="color: black;">' + bs1 + '</span>';
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

                        lay_html = '<span class="odds d-block"><b>' + l1 + '</b></span> <span style="color: black;">' + ls1 + '</span>';
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
                        $(".market_" + selectionid + "_l_btn").html(lay_html);*/

                        var statuss = "";

                        gstatus = data.t2[j].gstatus.toString();
                        if (gstatus == "SUSPENDED" || gstatus == "0") {
                            /*  $(".market_" + selectionid + "_row").addClass("suspended"); */
                            statuss = "suspended-box";
                        } else {
                            /*  $(".market_" + selectionid + "_row").removeClass("suspended"); */
                        }


                        if (data.t2[j].odds) {
                            for (var k in data.t2[j].odds) {
                                odd_selectionid = new_selectionid + "_" + data.t2[j].odds[k].ssid;
                                odd_runner = data.t2[j].odds[k].nat;
                                /* odd_b1 = data.t2[j].odds[k].b; */
                                odd_b1 = 2;
                                sno = data.t2[j].odds[k].sno;
                                if (old_eid == eventId) {
                                    $(".market_" + odd_selectionid + "_row").addClass(statuss);
                                    continue;
                                }
                                var back_data =
                                    `side="Back" selectionid="${odd_selectionid}" marketkey="${new_selectionid}" marketid="${odd_selectionid}" runner="${odd_runner}" marketname="${odd_runner}" eventid="${eventId}" markettype="${markettype}" event_name="${markettype}" fullmarketodds="${odd_b1}" fullfancymarketrate="${odd_b1}"`;
                                if (subtype == "redblack") {
                                    var imgg_block = ` <img src="/storage/front/img/cards/heart.png">
                                                                <img src="/storage/front/img/cards/diamond.png">`;
                                    if (odd_runner == "Black") {
                                        imgg_block = `<img src="/storage/front/img/cards/spade.png">
                                                                <img src="/storage/front/img/cards/club.png">`;
                                    }
                                    markets_red_black += `
                                    
                                     <span class="btnspan back-1 market_${odd_selectionid}_row  market_${odd_selectionid}_b_btn ${statuss}" ${back_data}>
                                                            <input type="radio" class="btn-check" id="${subtype}-${sno}" name="${new_selectionid}Btn" value="${data.t2[j].odds[k].ssid}">
                                                            <label class="form-check-label btn" for="${subtype}-${sno}">
                                                                ${imgg_block}
                                                            </label>
                                    </span>`;
                                }
                                if (subtype == "oddeven") {

                                    markets_odd_even += `
                                    
                                     <span class="btnspan back-1 market_${odd_selectionid}_row  market_${odd_selectionid}_b_btn ${statuss}" ${back_data}>
                                                            <input type="radio" class="btn-check" id="${subtype}-${sno}" name="${new_selectionid}Btn" value="${data.t2[j].odds[k].ssid}">
                                                            <label class="form-check-label btn" for="${subtype}-${sno}">
                                                                ${odd_runner}
                                                            </label>
                                    </span>`;
                                }

                                if (subtype == "updown") {

                                    markets_up_down += `
                                    
                                     <span class="btnspan back-1 market_${odd_selectionid}_row  market_${odd_selectionid}_b_btn ${statuss}" ${back_data}>
                                                            <input type="radio" class="btn-check" id="${subtype}-${sno}" name="${new_selectionid}Btn" value="${data.t2[j].odds[k].ssid}">
                                                            <label class="form-check-label btn" for="${subtype}-${sno}">
                                                                ${odd_runner}
                                                            </label>
                                        </span>`;
                                }


                                if (subtype == "Cardj") {

                                    markets_cards += `
                                    
                                     <span class="btnspan back-1 market_${odd_selectionid}_row  market_${odd_selectionid}_b_btn ${statuss}" ${back_data}>
                                                          <input type="radio" class="btn-check" id="${subtype}-${sno}" name="${new_selectionid}Btn" value="${data.t2[j].odds[k].ssid}">
                                                        <label class="form-check-label btn" for="${subtype}-${sno}">${odd_runner}</label>
                                        </span>`;
                                }



                                if (subtype == "color") {

                                    var imgg = odd_runner.toLowerCase();
                                    markets_suits += `
                                    
                                     <span class="btnspan back-1 market_${odd_selectionid}_row  market_${odd_selectionid}_b_btn ${statuss}" ${back_data}>
                                                          <input type="radio" class="btn-check" id="${subtype}-${sno}" name="${new_selectionid}Btn" value="${data.t2[j].odds[k].ssid}">
                                                        <label class="form-check-label btn" for="${subtype}-${sno}">
                                                        <img src="/storage/front/img/cards/${imgg}.png">
                                                        </label>
                                            </span>`;
                                }
                            }
                        }
                    }
                }
                if (old_eid != eventId) {
                    $(".markets_all").html(`<div class="row row5 kbc-btns">
                                                <div class="col-12 col-md-4">
                                                    <div class="casino-odd-box-container">
                                                        <div class="casino-nation-name"><b>[Q1] Red Black</b></div>
                                                        <div class="btn-group">
                                ${markets_red_black}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="casino-odd-box-container">
                                                        <div class="casino-nation-name"><b>[Q2] Odd Even</b></div>
                                                        <div class="btn-group">
            ${markets_odd_even}
                                                        </div>
                                                           
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="casino-odd-box-container">
                                                        <div class="casino-nation-name"><b>[Q3] 7 Up-7 Down</b></div>
                                                        <div class="btn-group">
            ${markets_up_down}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row5 kbc-btns kbcothers mt-xl-3">
                                                <div class="col-12 col-md-6">
                                                    <div class="casino-odd-box-container">
                                                        <div class="casino-nation-name"><b>[Q4] 3 Card Judgement</b></div>
                                                        <div class="btn-group">
                                                            
            ${markets_cards}
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="casino-odd-box-container">
                                                        <div class="casino-nation-name"><b>[Q5] Suits</b></div>
                                                        <div class="btn-group">
            ${markets_suits}
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>`);
                }
                old_eid = eventId;
            }
        });
        // <div class="col-12 col-md-4 d-none d-xl-block"><div class="hfquitbtns"><button class="btn hbtn">4 Cards Quit</button><button class="btn fbtn">50-50 Quit</button></div></div>
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
        $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c4").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c5").attr("src", site_url + "storage/front/img/cards/1.png");
       // closeBetSlip();
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
            casino_type = "'kbc'";
            data.forEach((runData) => {

                eventId = runData.mid == 0 ? 0 : runData.mid;
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs result ml-1 result-b">R</span>';
            });
            $("#last-result").html(html);
            if (oldGameId == 0 || oldGameId == resultGameLast) {
                $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c4").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c5").attr("src", site_url + "storage/front/img/cards/1.png");
                closeBetSlip();
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
            url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/kbc/' + event_id,
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
            url: MASTER_URL + '/live-market/others/active_bets/kbc/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/others/view_more_matched/kbc/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/others/market_analysis/kbc/' + get_round_no(),
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