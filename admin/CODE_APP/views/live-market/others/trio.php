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
        /* flex-wrap: wrap; */
        justify-content: space-between;
        align-items: flex-start;
    }

    .casino-odd-box-container {
        width: 100%;
    }

    .casino-odd-box-container {
        width: calc(33.33% - 10px);
        margin-right: 10px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .trioodds .casino-odd-box-container {
        width: calc(20% - 10px);
    }

    .casino-nation-name {
        font-size: 16px;
        font-weight: bold;
        margin: 6px;
    }

    .casino-nation-name {
        width: 100%;
        text-align: center;
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

    .trioodds .casino-odds-box {
        width: 100%;
    }

    .casino-odds {
        font-size: 18px;
        font-weight: bold;
        line-height: 1;
    }

    .casino-nation-book {
        font-size: 12px;
        font-weight: bold;
        min-height: 18px;
        z-index: 1;
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
        /* height: 41px; */
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

    .ball-runs.playerb{
            background: #0088cc !important;
            color: white !important;
    }

    .video-overlay{
        top: 50% !important;
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
                                        <div class="game-heading"><span class="card-header-title">Trio
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
                                                <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . TRIO_CODE; ?>" width="100%" height="400px" style="border: 0px;"></iframe>
                                            <?php

                                            } else {
                                            ?>
                                                <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="400" style="border: 0px;"></iframe>
                                            <?php

                                            }
                                            ?>
                                            <!---->
                                            <!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL;
                                                                                    echo TRIO_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
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
                                                            <img id="card_c2" src="/storage/front/img/cards/1.png">
                                                            <img id="card_c3" src="/storage/front/img/cards/1.png">
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
                                            <h6 class="rules-highlight">Session :</h6>
                                            <ul class="pl-2 pr-2 list-style">
                                                <li>It is a total of point value of all three cards .</li>
                                                <li>Point Value of Cards ( Suits doesn't matter )
                                                    <div class="pl-2 pr-2">Ace  = 1</div>
                                                    <div class="pl-2 pr-2">2 = 2</div>
                                                    <div class="pl-2 pr-2">3 = 3</div>
                                                    <div class="pl-2 pr-2">4 = 4</div>
                                                    <div class="pl-2 pr-2">5 = 5</div>
                                                    <div class="pl-2 pr-2">6 = 6</div>
                                                    <div class="pl-2 pr-2">7 = 7</div>
                                                    <div class="pl-2 pr-2">8 = 8</div>
                                                    <div class="pl-2 pr-2">9 = 9</div>
                                                    <div class="pl-2 pr-2">10 = 10</div>
                                                    <div class="pl-2 pr-2">Jack = 11</div>
                                                    <div class="pl-2 pr-2">Queen = 12</div>
                                                    <div class="pl-2 pr-2">King = 13</div>
                                                </li>
                                                <li>1+10+13 = 24 , Here session is 24.</li>
                                                <li>It is a bet for having session 21 Yes or No .</li>
                                                <li>Both back and lay rate of session 21 is available.</li>
                                            </ul>
                                        </div></div><div><div class="rules-section">
                                            <h6 class="rules-highlight">3 card Judgement :</h6>
                                            <ul class="pl-2 pr-2 list-style">
                                                <li>In this bet you are offered set of three cards from which atleast one card must come in game .</li>
                                                <li>Both Back and Lay rate is available for 3 card judgement.</li>
                                                <li>Two sets of three cards are offered for " 3 card Judgement " .</li>
                                                <li>Set One : (1,2,4 )</li>
                                                <li>Set 2 : ( Jack , queen , King )</li>
                                                <li>Suits doesn't matter .</li>
                                            </ul>
                                        </div></div><div><div class="rules-section">
                                            <h6 class="rules-highlight">Two Red Only :</h6>
                                            <ul class="pl-2 pr-2 list-style">
                                                <li>It is a bet for having two red cards only in the game (not more not less )</li>
                                                <li>(Here Heart and Diamond are named Red card).</li>
                                            </ul>
                                        </div></div><div><div class="rules-section">
                                            <h6 class="rules-highlight">Two Black only :</h6>
                                            <ul class="pl-2 pr-2 list-style">
                                                <li>It is a bet for having two black cards only in the game (not more not less )</li>
                                                <li>(Here Spade and Club are named Black card ).</li>
                                            </ul>
                                        </div></div><div><div class="rules-section">
                                            <h6 class="rules-highlight">Two Odd only :</h6>
                                            <ul class="pl-2 pr-2 list-style">
                                                <li>It is a bet for having two odd cards only in the game (not more not less ).</li>
                                                <li>1,3,5,7,9,Jack and King are named odd cards.</li>
                                            </ul>
                                        </div></div><div><div class="rules-section">
                                            <h6 class="rules-highlight">Two Even only :</h6>
                                            <ul class="pl-2 pr-2 list-style">
                                                <li>It is a bet for having two even cards only in the game (not more not less ).</li>
                                                <li>2,4,6,8,10 and Queen are named even cards .</li>
                                            </ul>
                                        </div></div><div><div class="rules-section">
                                            <h6 class="rules-highlight">Pair :</h6>
                                            <ul class="pl-2 pr-2 list-style">
                                                <li>It is a bet for having Two cards of same rank .</li>
                                                <li>( Trio is also valid for Pair ).</li>
                                            </ul>
                                        </div></div><div><div class="rules-section">
                                            <h6 class="rules-highlight">Flush :</h6>
                                            <ul class="pl-2 pr-2 list-style">
                                                <li>It is bet for having all three cards of same suits .</li>
                                                <li>(If straight Flush come Flush is valid.)</li>
                                            </ul>
                                        </div></div><div><div class="rules-section">
                                            <h6 class="rules-highlight">Straight :</h6>
                                            <ul class="pl-2 pr-2 list-style">
                                                <li>It is bet for having all three cards in the sequence .
                                                    <div class="pl-2 pr-2">Eg : 4,5,6</div>
                                                    <div class="pl-2 pr-2">Jack, Queen, King</div>
                                                </li>
                                                <li>(If Straight Flush come Straight is valid.)</li>
                                                <li>Note : King , Ace , 2 is not valid for straight .</li>
                                            </ul>
                                        </div></div><div><div class="rules-section">
                                            <h6 class="rules-highlight">Trio :</h6>
                                            <ul class="pl-2 pr-2 list-style">
                                                <li>It is a bet for having all three cards of same rank .
                                                    <div class="pl-2 pr-2">Eg: 4 Heart , 4 Spade , 4 Diamond</div>
                                                    <div class="pl-2 pr-2">J Heart , J Club , J Diamond</div>
                                                </li>
                                            </ul>
                                        </div></div><div><div class="rules-section">
                                            <h6 class="rules-highlight">Straight Flush :</h6>
                                            <ul class="pl-2 pr-2 list-style">
                                                <li>It is a bet for having all three cards in a sequence and also of same suits .
                                                    <div class="pl-2 pr-2">Eg : Jack (Heart), Queen (Heart ), King (Heart)</div>
                                                    <div class="pl-2 pr-2">4 (Club), 5(Club) ,6 (Club )</div>
                                                </li>
                                                <li>Note : King , Ace and 2 is not valid for Straight Flush .</li>
                                            </ul>
                                        </div></div></div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                                        </div>

                                        <div class="casino-detail">
                                            <div class="casino-table">
                                                <div class="casino-table-box markets_all1">
                                                    <div class="casino-odd-box-container">
                                                        <div class="casino-nation-name pointer">Session </div>
                                                        <!-- <i class="fas fa-info-circle"></i> -->
                                                        <div class="casino-odds-box back suspended-box"><span>21</span><span class="casino-volume">80</span></div>
                                                        <div class="casino-odds-box lay suspended-box"><span >21</span><span class="casino-volume">100</span></div>
                                                        <!-- <div class="casino-nation-book text-center w-100"></div> -->
                                                    </div>
                                                    <div class="casino-odd-box-container">
                                                        <div class="casino-nation-name">3 Card Judgement(1 2 4)</div>
                                                        <div class="casino-odds-box back suspended-box"><span class="casino-odds">1.78</span></div>
                                                        <div class="casino-odds-box lay suspended-box"><span class="casino-odds">1.83</span></div>
                                                        <!-- <div class="casino-nation-book text-center w-100"></div> -->
                                                    </div>
                                                    <div class="casino-odd-box-container">
                                                        <div class="casino-nation-name">3 Card Judgement(J Q K)</div>
                                                        <div class="casino-odds-box back suspended-box"><span class="casino-odds">1.78</span></div>
                                                        <div class="casino-odds-box lay suspended-box"><span class="casino-odds">1.83</span></div>
                                                        <!-- <div class="casino-nation-book text-center w-100"></div> -->
                                                    </div>
                                                </div>
                                                <div class="casino-table-box triocards mt-3 markets_all2">
                                                    <div class="casino-odd-box-container">
                                                        <div class="casino-nation-name">Two Red Only</div>
                                                        <div class="casino-odds-box back suspended-box"><span class="casino-odds">2.52</span></div>
                                                        <div class="casino-odds-box lay suspended-box"><span class="casino-odds">2.72</span></div>
                                                        <!-- <div class="casino-nation-book text-center w-100"></div> -->
                                                    </div>
                                                    <div class="casino-odd-box-container">
                                                        <div class="casino-nation-name">Two Black Only</div>
                                                        <div class="casino-odds-box back suspended-box"><span class="casino-odds">2.52</span></div>
                                                        <div class="casino-odds-box lay suspended-box"><span class="casino-odds">2.72</span></div>
                                                        <!-- <div class="casino-nation-book text-center w-100"></div> -->
                                                    </div>
                                                    <div class="casino-odd-box-container">
                                                        <div class="casino-nation-name">Two Odd Only</div>
                                                        <div class="casino-odds-box back suspended-box"><span class="casino-odds">2.33</span></div>
                                                        <div class="casino-odds-box lay suspended-box"><span class="casino-odds">2.53</span></div>
                                                        <!-- <div class="casino-nation-book text-center w-100"></div> -->
                                                    </div>
                                                    <div class="casino-odd-box-container">
                                                        <div class="casino-nation-name">Two Even Only</div>
                                                        <div class="casino-odds-box back suspended-box"><span class="casino-odds">2.75</span></div>
                                                        <div class="casino-odds-box lay suspended-box"><span class="casino-odds">2.95</span></div>
                                                        <!-- <div class="casino-nation-book text-center w-100"></div> -->
                                                    </div>
                                                </div>
                                                <div class="casino-table-box trioodds mt-3 markets_all3">
                                                    <div class="casino-odd-box-container">
                                                        <div class="casino-nation-name">Pair</div>
                                                        <div class="casino-odds-box back suspended-box"><span class="casino-odds">5.5</span></div>
                                                        <!-- <div class="casino-nation-book text-center w-100"></div> -->
                                                    </div>
                                                    <div class="casino-odd-box-container">
                                                        <div class="casino-nation-name">Flush</div>
                                                        <div class="casino-odds-box back suspended-box"><span class="casino-odds">17</span></div>
                                                        <!-- <div class="casino-nation-book text-center w-100"></div> -->
                                                    </div>
                                                    <div class="casino-odd-box-container">
                                                        <div class="casino-nation-name">Straight</div>
                                                        <div class="casino-odds-box back suspended-box"><span class="casino-odds">24</span></div>
                                                        <!-- <div class="casino-nation-book text-center w-100"></div> -->
                                                    </div>
                                                    <div class="casino-odd-box-container">
                                                        <div class="casino-nation-name">Trio</div>
                                                        <div class="casino-odds-box back suspended-box"><span class="casino-odds">201</span></div>
                                                        <!-- <div class="casino-nation-book text-center w-100"></div> -->
                                                    </div>
                                                    <div class="casino-odd-box-container">
                                                        <div class="casino-nation-name">Straight Flush</div>
                                                        <div class="casino-odds-box back suspended-box"><span class="casino-odds">226</span></div>
                                                        <!-- <div class="casino-nation-book text-center w-100"></div> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="casino-last-result-title"><span>Last Result</span><span><a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=trio">View All</a></span></div>
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

                        <h4 class="modal-title">Trio Result</h4>

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
    var markettype = "TRIO";
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
            socket.emit('Room', 'trio');
        });
    
        socket.on('game', function(data) {
            console.log("data=", data);
            data1 = data;

            if (data && data.t1) {
                if (oldGameId != data1.t1[0].mid && data1.t1[0].mid != 0 && data1.t1[0].mid != "0") {
                     setTimeout(function() {
                         clearCards();
                     }, <?php //echo CASINO_RESULT_TIMEOUT; ?>);
                }
                oldGameId = data1.t1[0].mid;
                if (data1.t1[0].mid != 0 && data1.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark")
                        .text(data.t1[0].remark);
                    if (data.t1[0].C1 != 1) {
                        $("#card_c1").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C1 +
                            ".png");
                    }
                    if (data.t1[0].C2 != 1) {
                        $("#card_c2").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C2 +
                            ".png");
                    }
                    if (data.t1[0].C3 != 1) {
                        $("#card_c3").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C3 +
                            ".png");
                    }
                }
              clock.setValue(data1.t1[0].autotime);
                $(".round_no").text(data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid);
                $("#casino_event_id").val(data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid);
                eventId = data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid;
               var markets_all1 = "";
                var markets_all2 = "";
                var markets_all3 = "";
                for (var j in data.t2) {
                    selectionid = data.t2[j].sectionId || data.t2[j].sid;
                    new_selectionid = selectionid;
                    runner = data.t2[j].nation || data.t2[j].nat;
                    b1 = data.t2[j].b1;
                    bs1 = data.t2[j].bs1;
                    l1 = data.t2[j].l1;
                    ls1 = data.t2[j].ls1;
                     /* back_html = '<span class="odds d-block"><b>' + b1 + '</b></span>';
                    if(selectionid == 1){
                        back_html = '<span class="odds d-block"><b>' + b1 + '</b></span> <span style="color: black;">' + bs1 + '</span>';
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
                    $(".market_" + selectionid + "_b_btn").html(back_html);

                    lay_html = '<span class="odds d-block"><b>' + l1 + '</b></span>';
                    if(selectionid == 1){
                        lay_html = '<span class="odds d-block"><b>' + l1 + '</b></span> <span style="color: black;">' + ls1 + '</span>';
                    }
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
                    $(".market_" + selectionid + "_l_btn").html(lay_html); */
                    var statuss = "";

                    gstatus = data.t2[j].gstatus.toString();
                     if (gstatus == "SUSPENDED" || gstatus == "0") {
                        /* $(".market_" + selectionid + "_row").addClass("suspended-box"); */
                        statuss = "suspended-box";
                    } else {
                        /*  $(".market_" + selectionid + "_row").removeClass("suspended-box"); */
                    }
                   var size_back = "";
                    var info = "";
                    var size_lay = "";
                    if (selectionid == 1) {
                        info = `<i class="fas fa-info-circle"></i>`;
                        size_back = ` <span class="casino-volume">${bs1}</span>`;
                        size_lay = ` <span class="casino-volume">${ls1}</span>`;
                    }
                    var back_data =
                        `side="Back" selectionid="${new_selectionid}" marketid="${new_selectionid}" runner="${runner}" marketname="${runner}" eventid="${eventId}" markettype="${markettype}" event_name="${markettype}" fullmarketodds="${b1}" fullfancymarketrate="${b1}"`;
                    var lay_data =
                        `side="Lay" selectionid="${new_selectionid}" marketid="${new_selectionid}" runner="${runner}" marketname="${runner}" eventid="${eventId}" markettype="${markettype}" event_name="${markettype}" fullmarketodds="${l1}" fullfancymarketrate="${l1}"`;

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

                           if (selectionid >= 1 && selectionid <= 3) {
                        markets_all1 += `<div class="casino-odd-box-container">
                                                        <div class="casino-nation-name pointer">${runner}</div>
                                                        <div class="casino-odds-box back back-1 market_${new_selectionid}_row  market_${new_selectionid}_b_btn ${statuss}" ${back_data}>
                                                            <span style="font-weight:lighter">${b1}</span>
                                                            ${size_back}
                                                        </div>
                                                        <div class="casino-odds-box lay lay-1 market_${new_selectionid}_row  market_1_${new_selectionid}_btn ${statuss}" ${lay_data}>
                                                            <span style="font-weight:lighter">${l1}</span>
                                                            ${size_lay}
                                                        </div>
                                                        <div class="casino-nation-book text-center w-100 market_${new_selectionid}_b_exposure market_exposure text-danger">${exposure}</div>
                                                    </div>`;
                    }
                    if (selectionid >= 4 && selectionid <= 7) {
                        markets_all2 += `<div class="casino-odd-box-container">
                                                        <div class="casino-nation-name pointer">${runner}</div>
                                                        <div class="casino-odds-box back back-1 market_${new_selectionid}_row  market_${new_selectionid}_b_btn ${statuss}" ${back_data}>
                                                            <span class="casino-odds">${b1}</span>
                                                        </div>
                                                        <div class="casino-odds-box lay lay-1 market_${new_selectionid}_row  market_1_${new_selectionid}_btn ${statuss}" ${lay_data}>
                                                            <span class="casino-odds">${l1}</span>
                                                        </div>
                                                        <div class="casino-nation-book text-center w-100 market_${new_selectionid}_b_exposure market_exposure text-danger">${exposure}</div>
                                                    </div>`;
                    }
                    if (selectionid >= 8 && selectionid <= 12) {
                        markets_all3 += `<div class="casino-odd-box-container">
                                                        <div class="casino-nation-name pointer">${runner}</div>
                                                        <div class="casino-odds-box back back-1 market_${new_selectionid}_row  market_${new_selectionid}_b_btn ${statuss}" ${back_data}>
                                                            <span class="casino-odds">${b1}</span>
                                                        </div>
                                                    <div class="casino-nation-book text-center w-100 market_${new_selectionid}_b_exposure market_exposure text-danger">${exposure}</div>
                                                        
                                                    </div>`;
                    }
                }
                $(".markets_all1").html(markets_all1);
                $(".markets_all2").html(markets_all2);
                $(".markets_all3").html(markets_all3);
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
        //refresh(markettype);
        $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
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
            casino_type = "'trio'";
            data.forEach((runData) => {
                 ab = "playerb";
                ab1 = "R";

                eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] : runData.mid;
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs  ' + ab + ' last-result">' + ab1 + '</span>';
            });
            $("#last-result").html(html);
             if (oldGameId == 0 || oldGameId == resultGameLast) {
                $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
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
            url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/trio/' + event_id,
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
            url: MASTER_URL + '/live-market/others/active_bets/trio/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/others/view_more_matched/trio/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/others/market_analysis/trio/' + get_round_no(),
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