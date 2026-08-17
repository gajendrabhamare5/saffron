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
         background-color: #f2f2f2;
     }

     .casino-table-header,
     .casino-table-row {
         display: flex;
         flex-wrap: wrap;
         justify-content: space-between;
         /* border-bottom: 1px solid #c7c8ca; */
     }

     .teenpatti2 .casino-nation-detail {
         width: 60%;
     }

     .casino-table-header .casino-nation-detail {
         font-weight: bold;
         min-height: 25px;
     }

     .casino-table-header .casino-nation-detail1 {
         font-weight: bold;
         min-height: 25px;
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

     .casino-nation-detail1 {
         display: flex;
         align-items: flex-start;
         flex-direction: column;
         flex-wrap: wrap;
         justify-content: center;
         padding-left: 5px;
         min-height: 46px;
         color: #ef910f !important;
     }

     .teenpatti2 .casino-odds-box {
         width: 20%;
     }

     .casino-table-header .casino-odds-box {
         cursor: unset;
         padding: 2px;
         min-height: unset;
         height: auto !important;
     }

     .casino-table-row .casino-odds-box {
         width: 25%;
         text-transform: uppercase;
     }

     .casino-odds-box {
         display: flex;
         flex-wrap: wrap;
         flex-direction: column;
         align-items: center;
         justify-content: center;
         padding: 5px 0;
         font-weight: bold;
         /* border-left: 1px solid #c7c8ca; */
         cursor: pointer;
         min-height: 46px;
     }

     .casino-nation-name {
         font-size: 16px;
         font-weight: bold;
     }

     .teenpatti20-other-oods img {
         height: 35px;
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
         width: 100%;
         border-left: 1px solid var(--table-border);
         border-right: 1px solid var(--table-border);
         border-top: 1px solid var(--table-border);
         background-color: var(--bg-table-row);
     }

     .casino-table-full-box {
         display: flex;
         flex-wrap: wrap;
         justify-content: center;
         align-items: center;
         padding: 10px;
         border-bottom: 1px solid var(--table-border);
     }

     .casino-table-full-box img {
         height: 100px;
         z-index: 10;
     }

     .casino-odd-box-container {
         width: 25%;
         display: flex;
         flex-wrap: wrap;
         margin-left: -5px;
         margin-top: 20px;
     }

     .casino-odd-box-container .casino-odds-box {
         width: 50%;
     }

     .casino-nation-book {
         font-size: 12px;
         font-weight: bold;
         min-height: 18px;
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

     .teenpatti20-other-oods {
         display: flex;
         flex-wrap: wrap;
         justify-content: space-between;
         width: 100%;
     }

     .teenpatti20-other-oods .casino-table-left-box,
     .teenpatti20-other-oods .casino-table-right-box {
         display: flex;
         flex-wrap: wrap;
         justify-content: space-between;
         border: 0;
         padding-top: 10px;
     }

     .teenpatti20 .teenpatti20-other-oods .casino-odds-box {
         width: 49%;
         flex-direction: row;
         justify-content: space-between;
         padding: 5px 10px;
     }

     .teenpatti20 .teenpatti20-other-oods img {
         height: 35px;
     }

     .teenpatti20-other-oods .casino-odds-box {
         width: 49%;
         flex-direction: row;
         justify-content: space-between;
         padding: 5px 10px;
         border-radius: 4px;
     }

     .fancy-marker-title {
         margin-top: 10px;
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
         background-color: var(--table-border);
         width: 2px;
     }

     .game-heading .card-header-title {
         font-size: 16px !important;
         font-weight: bold !important;
         text-transform: uppercase !important;
     }

     .game-heading .float-right {
         font-size: 12px;
     }

     .video-overlay {
         position: absolute;
         top: 0;
         left: 0;
         background: rgba(0, 0, 0, 0.4);
         height: auto;
         padding: 5px;
     }

     .videoCards .text-white {
         font-weight: bold;
         font-size: 17px;
         line-height: 1.2;
         margin-bottom: 0;
         margin-top: 0;
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
                     <div class="game-heading"><span class="card-header-title">20-20 Teenpatti B
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
                         <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . TEEN20B_CODE; ?>" width="100%"
                             height="400px" style="border: 0px;"></iframe>
                         <?php

                            } else {
                            ?>
                         <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="400"
                             style="border: 0px;"></iframe>
                         <?php

                            }
                            ?>
                         <!---->
                         <!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL;
                                                                echo TEEN20B_CODE; ?>" width="100%" height="400"
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
                         <div class="video-overlay">
                             <div class="videoCards">
                                 <div>
                                     <!-- <h3 class="text-white">PLAYER A</h3> -->
                                     <div>
                                         <img id="card_c1" src="/storage/front/img/cards/1.png">
                                         <img id="card_c2" src="/storage/front/img/cards/1.png">
                                         <img id="card_c3" src="/storage/front/img/cards/1.png">
                                     </div>
                                 </div>
                                 <div>
                                     <!-- <h3 class="text-white">PLAYER B</h3> -->
                                     <div>
                                         <img id="card_c4" src="/storage/front/img/cards/1.png">
                                         <img id="card_c5" src="/storage/front/img/cards/1.png">
                                         <img id="card_c6" src="/storage/front/img/cards/1.png">
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

                                                 .rules-section img {
                                                     max-width: 100%;
                                                 }
                                                 </style>

                                                 <div class="rules-section">
                                                     <ul class="pl-2 pr-2 list-style">
                                                         <li>The game is played with a regular 52 cards single deck,
                                                             between 2 players A and B.</li>
                                                         <li>Each player will receive 3 cards.</li>
                                                         <li><b>Rules of regular teenpatti winner</b></li>
                                                     </ul>
                                                     <div>
                                                         <img src="/storage/front/img/rules/teen20b.jpg">
                                                     </div>
                                                 </div>
                                             </div>
                                             <div>
                                                 <div class="rules-section">
                                                     <h6 class="rules-highlight">Rules of 3 baccarat</h6>
                                                     <p>There are 3 criteria for winning the 3 Baccarat .</p>
                                                     <h7 class="rules-sub-highlight">First criteria:</h7>
                                                     <ul class="pl-2 pr-2 list-style">
                                                         <li>Game having trio will win,</li>
                                                         <li>If both game has trio then higher trio will win.</li>
                                                         <li>Ranking of trio from high to low.
                                                             <div class="pl-2 pr-2">1,1,1</div>
                                                             <div class="pl-2 pr-2">K,K,K</div>
                                                             <div class="pl-2 pr-2">Q,Q,Q</div>
                                                             <div class="pl-2 pr-2">J,J,J</div>
                                                             <div class="pl-2 pr-2">10,10,10</div>
                                                             <div class="pl-2 pr-2">9,9,9</div>
                                                             <div class="pl-2 pr-2">8,8,8</div>
                                                             <div class="pl-2 pr-2">7,7,7</div>
                                                             <div class="pl-2 pr-2">6,6,6</div>
                                                             <div class="pl-2 pr-2">5,5,5</div>
                                                             <div class="pl-2 pr-2">4,4,4</div>
                                                             <div class="pl-2 pr-2">3,3,3</div>
                                                             <div class="pl-2 pr-2">2,2,2</div>
                                                         </li>
                                                         <li>If none of the game have got trio then second criteria will
                                                             apply.</li>
                                                     </ul>
                                                     <h7 class="rules-sub-highlight">Second criteria:</h7>
                                                     <ul class="pl-2 pr-2 list-style">
                                                         <li>Game having all the three face card will win.</li>
                                                         <li>Here JACK, QUEEN AND KING are named face card.</li>
                                                         <li>if both the game have all three face cards then game having
                                                             highest face card will win.</li>
                                                         <li>Ranking of face card from High to low :
                                                             <div class="pl-2 pr-2">Spade King</div>
                                                             <div class="pl-2 pr-2">Heart King</div>
                                                             <div class="pl-2 pr-2">Club King</div>
                                                             <div class="pl-2 pr-2">Diamond King</div>
                                                         </li>
                                                         <li>Same order will apply for Queen (Q) and Jack (J) also .
                                                         </li>
                                                         <li>If second criteria is also not applicable, then 3rd
                                                             criteria will apply .</li>
                                                     </ul>
                                                     <h7 class="rules-sub-highlight">3rd criteria:</h7>
                                                     <ul class="pl-2 pr-2 list-style">
                                                         <li>Game having higher baccarat value will win .</li>
                                                         <li>For deciding baccarat value we will add point value of all
                                                             the three cards</li>
                                                         <li>Point value of all the cards :
                                                             <div class="pl-2 pr-2">1 = 1</div>
                                                             <div class="pl-2 pr-2">2 = 2</div>
                                                             <div class="pl-2 pr-2">To</div>
                                                             <div class="pl-2 pr-2">9 = 9</div>
                                                             <div class="pl-2 pr-2">10, J ,Q, K has zero (0) point value
                                                                 .</div>
                                                         </li>
                                                     </ul>
                                                     <p><b>Example 1st:</b></p>
                                                     <ul class="pl-2 pr-2 list-style">
                                                         <li>Last digit of total will be considered as baccarat value
                                                             <div class="pl-2 pr-2">2,5,8 =</div>
                                                             <div class="pl-2 pr-2">2+5+8 =15 here last digit of total
                                                                 is 5 , So baccarat value is 5.</div>
                                                         </li>
                                                     </ul>
                                                     <p><b>Example 2nd :</b></p>
                                                     <ul class="pl-2 pr-2 list-style">
                                                         <li>1,3,K</li>
                                                         <li>1+3+0 = 4 here total is in single digit so we will take
                                                             this single digit 4 as baccarat value</li>
                                                     </ul>
                                                     <p><b>If baccarat value of both the game is equal then Following
                                                             condition will apply :</b></p>
                                                     <p><b>Condition 1 :</b></p>
                                                     <ul class="pl-2 pr-2 list-style">
                                                         <li>Game having more face card will win.</li>
                                                         <li>Example : Game A has 3,4,k and B has 7,J,Q then game B will
                                                             win as it has more face card then game A .</li>
                                                     </ul>
                                                     <p><b>Condition 2 :</b></p>
                                                     <ul class="pl-2 pr-2 list-style">
                                                         <li>If Number of face card of both the game are equal then
                                                             higher value face card game will win.</li>
                                                         <li>Example : Game A has 4,5,K (K Spade ) and Game B has 9,10,K
                                                             ( K Heart ) here baccarat value of both the game is equal
                                                             (9 ) and both the game have same number of face card so
                                                             game A will win because It has got higher value face card
                                                             then Game B .</li>
                                                     </ul>
                                                     <p><b>Condition 3 :</b></p>
                                                     <ul class="pl-2 pr-2 list-style">
                                                         <li>If baccarat value of both the game is equal and none of
                                                             game has got face card then in this case Game having
                                                             highest value point card will win .</li>
                                                         <li>Value of Point Cards :
                                                             <div class="pl-2 pr-2">Ace = 1</div>
                                                             <div class="pl-2 pr-2">2 = 2</div>
                                                             <div class="pl-2 pr-2">3 = 3</div>
                                                             <div class="pl-2 pr-2">4 = 4</div>
                                                             <div class="pl-2 pr-2">5 = 5</div>
                                                             <div class="pl-2 pr-2">6 = 6</div>
                                                             <div class="pl-2 pr-2">7 = 7</div>
                                                             <div class="pl-2 pr-2">8 = 8</div>
                                                             <div class="pl-2 pr-2">9 = 9</div>
                                                             <div class="pl-2 pr-2">10 = 0 (Zero )</div>
                                                         </li>
                                                         <li>Example : GameA: 1,6,10 And GameB: 7,10,10</li>
                                                         <li>here both the game have same baccarat value . But game B
                                                             will win as it has higher value point card i.e. 7 .</li>
                                                     </ul>
                                                     <p><b>Condition 4 :</b></p>
                                                     <ul class="pl-2 pr-2 list-style">
                                                         <li>If baccarat value of both game is equal and none of game
                                                             has got face card and high point card of both the game is
                                                             of equal point value , then suits of both high card will be
                                                             compared</li>
                                                         <li>Example :
                                                             <div class="pl-2 pr-2">
                                                                 Game A : 1(Heart) ,2(Heart) ,5(Heart)
                                                             </div>
                                                             <div class="pl-2 pr-2">
                                                                 Game B : 10 (Heart) , 3 (Diamond ) , 5 (Spade )
                                                             </div>
                                                         </li>
                                                         <li>Here Baccarat value of both the game (8) is equal . and
                                                             none of game has got face card and point value of both
                                                             game's high card is equal so by comparing suits of both the
                                                             high card ( A 5 of Heart , B 5 of spade ) game B is
                                                             declared 3 Baccarat winner .</li>
                                                         <li>Ranking of suits from High to low :
                                                             <div class="pl-2 pr-2">Spade</div>
                                                             <div class="pl-2 pr-2">Heart</div>
                                                             <div class="pl-2 pr-2">Club</div>
                                                             <div class="pl-2 pr-2">Diamond</div>
                                                         </li>
                                                     </ul>
                                                 </div>
                                             </div>
                                             <div>
                                                 <div class="rules-section">
                                                     <h6 class="rules-highlight">Rules of Total :</h6>
                                                     <ul class="pl-2 pr-2 list-style">
                                                         <li>It is a comparison of total of all three cards of both the
                                                             games.</li>
                                                         <li>Point value of all the cards for the bet of total
                                                             <div class="pl-2 pr-2">Ace = 1</div>
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
                                                         <li>suits doesn't matter</li>
                                                         <li>If total of both the game is equal , it is a Tie .</li>
                                                         <li>If total of both the game is equal then half of your bet
                                                             amount will returned.</li>
                                                     </ul>
                                                 </div>
                                             </div>
                                             <div>
                                                 <div class="rules-section">
                                                     <h6 class="rules-highlight">Rules of Pair Plus :</h6>
                                                     <ul class="pl-2 pr-2 list-style">
                                                         <li>This bet provides multiple option to win a price .</li>
                                                         <li>Option 1 : Pair</li>
                                                         <li>If you got pair you will get equal value return of your
                                                             betting amount .</li>
                                                         <li>Option 2 : Flush</li>
                                                         <li>If you have all three cards of same suits you will get 4
                                                             times return of your betting amount .</li>
                                                         <li>Option 3 : Straight</li>
                                                         <li>If you have straight ( three cards in sequence eg : 4,5,6
                                                             eg: J,Q,K ) (but king ,Ace ,2 is not a straight ) you will
                                                             get six times return of your betting amount .</li>
                                                         <li>Option 4 : Trio</li>
                                                         <li>If you have got all the cards of same rank ( eg: 4,4,4
                                                             J,J,J ) you will get 30 times return of your betting amount
                                                             .</li>
                                                         <li>Option 5 : Straight Flush</li>
                                                         <li>If you have straight of all three cards of same suits (
                                                             Three cards in sequence eg: 4,5,6 ) ( but King ,Ace ,2 is
                                                             not straight ) you will get 40 times return of your betting
                                                             amount .</li>
                                                         <li>Note : If you have trio then you will receive price of trio
                                                             only , In this case you will not receive price of pair .
                                                         </li>
                                                         <li>If you have straight flush you will receive price of
                                                             straight flush only , In this case you will not receive
                                                             price of straigh and flush .</li>
                                                         <li>It means you will receive only one price whichever is
                                                             higher .</li>
                                                     </ul>
                                                 </div>
                                             </div>
                                             <div>
                                                 <div class="rules-section">
                                                     <h6 class="rules-highlight">Rules of Color :</h6>
                                                     <ul class="pl-2 pr-2 list-style">
                                                         <li>This is a bet for having more cards of red or Black (Heart
                                                             and Diamond are named RED , Spade and Club are named BLACK
                                                             ).</li>
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
                             <div class="casino-table-box">
                                 <div class="casino-table-left-box">
                                     <div class="casino-table-header">
                                         <div class="casino-nation-detail">Player A</div>
                                     </div>
                                     <div class="casino-table-body">
                                         <div class="casino-table-row">
                                             <div class="casino-odds-box" style="display: block;">Player <div class="info-block m-t-5"
                                                     style="position: relative; display: inline-block;">
                                                     <a href="#" data-toggle="collapse" data-target="#min-max-info1"
                                                         aria-expanded="false" class="info-icon collapsed">
                                                         <i class="fas fa-info-circle m-l-10"></i>
                                                     </a>
                                                     <div id="min-max-info1" class="min-max-info collapse"
                                                         style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                         <span class="m-r-5"> R:100-2L</span>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="casino-odds-box" style="display: block;">3 Baccarat <div class="info-block m-t-5"
                                                     style="position: relative; display: inline-block;">
                                                     <a href="#" data-toggle="collapse" data-target="#min-max-info2"
                                                         aria-expanded="false" class="info-icon collapsed">
                                                         <i class="fas fa-info-circle m-l-10"></i>
                                                     </a>
                                                     <div id="min-max-info2" class="min-max-info collapse"
                                                         style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                         <span class="m-r-5"> R:100-50k</span>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="casino-odds-box" style="display: block;">Total <div class="info-block m-t-5"
                                                     style="position: relative; display: inline-block;">
                                                     <a href="#" data-toggle="collapse" data-target="#min-max-info3"
                                                         aria-expanded="false" class="info-icon collapsed">
                                                         <i class="fas fa-info-circle m-l-10"></i>
                                                     </a>
                                                     <div id="min-max-info3" class="min-max-info collapse"
                                                         style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                         <span class="m-r-5"> R:100-25k</span>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="casino-odds-box" style="display: block;">Pair Plus <div class="info-block m-t-5"
                                                     style="position: relative; display: inline-block;">
                                                     <a href="#" data-toggle="collapse" data-target="#min-max-info4"
                                                         aria-expanded="false" class="info-icon collapsed">
                                                         <i class="fas fa-info-circle m-l-10"></i>
                                                     </a>
                                                     <div id="min-max-info4" class="min-max-info collapse"
                                                         style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                         <span class="m-r-5"> R:100-10k</span>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="casino-table-row">
                                            <div style="width: 25%;">
                                                <div
                                                        class="casino-odds-box back back-1 market_1_row market_1_b_btn suspended-box" style="width: 100%;">
                                                        <span class="casino-odds market_1_b_val">1.98</span>
                                                        
                                                </div>
                                                <div
                                                            class="casino-nation-book market_1_b_exposure market_exposure text-center" style="color: red;">0
                                                        </div>
                                            </div>
                                             
                                             <div style="width: 25%;">
                                                <div
                                                    class="casino-odds-box back back-1 market_5_row market_5_b_btn suspended-box" style="width: 100%;">
                                                    <span class="casino-odds market_5_b_val">1.98</span>
                                                    
                                                </div>
                                                <div
                                                        class="casino-nation-book market_5_b_exposure market_exposure text-center" style="color: red;">0
                                                    </div>
                                             </div>

                                              <div style="width: 25%;">
                                             <div
                                                 class="casino-odds-box back back-1 market_11_row market_11_b_btn suspended-box" style="width: 100%;">
                                                 <span class="casino-odds market_11_b_val">2</span>
                                              
                                             </div>
                                                <div
                                                     class="casino-nation-book market_11_b_exposure market_exposure text-center" style="color: red;">0
                                                 </div>
                                             </div>
                                              <div style="width: 25%;">
                                             <div
                                                 class="casino-odds-box back back-1 market_3_row market_3_b_btn suspended-box" style="width: 100%;">
                                                 <span class="casino-odds">A</span>
                                                
                                             </div>
                                              <div
                                                     class="casino-nation-book market_3_b_exposure market_exposure  text-center" style="color: red;">0
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="teenpatti20-other-oods d-md-none">
                                     <div class="casino-table-left-box">
                                         <div class="casino-odds-box back back-1 market_7_row market_7_b_btn">
                                             <div><img src="../storage/front/img/cards/spade.png"><img
                                                     src="../storage/front/img/cards/club.png"></div>
                                             <div class=""><span class="casino-odds market_7_b_val">1.98</span>
                                                 <div
                                                     class="casino-nation-book market_7_b_exposure market_exposure  text-danger">
                                                     0</div>
                                             </div>
                                         </div>
                                         <div class="casino-odds-box back back-1 market_8_row market_8_b_btn">
                                             <div><img src="../storage/front/img/cards/heart.png"><img
                                                     src="../storage/front/img/cards/diamond.png"></div>
                                             <div class=""><span class="casino-odds market_8_b_val">1.98</span>
                                                 <div
                                                     class="casino-nation-book market_8_b_exposure market_exposure text-danger">
                                                     0</div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="casino-table-right-box">
                                     <div class="casino-table-header">
                                         <div class="casino-nation-detail1">Player B</div>
                                     </div>
                                     <div class="casino-table-body">
                                         <div class="casino-table-row">
                                             <div class="casino-odds-box" style="display: block;">Player <div class="info-block m-t-5"
                                                     style="position: relative; display: inline-block;">
                                                     <a href="#" data-toggle="collapse" data-target="#min-max-info5"
                                                         aria-expanded="false" class="info-icon collapsed">
                                                         <i class="fas fa-info-circle m-l-10"></i>
                                                     </a>
                                                     <div id="min-max-info5" class="min-max-info collapse"
                                                         style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                         <span class="m-r-5"> R:100-2L</span>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="casino-odds-box" style="display: block;">3 Baccarat <div class="info-block m-t-5"
                                                     style="position: relative; display: inline-block;">
                                                     <a href="#" data-toggle="collapse" data-target="#min-max-info6"
                                                         aria-expanded="false" class="info-icon collapsed">
                                                         <i class="fas fa-info-circle m-l-10"></i>
                                                     </a>
                                                     <div id="min-max-info6" class="min-max-info collapse"
                                                         style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                         <span class="m-r-5"> R:100-50k</span>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="casino-odds-box" style="display: block;">Total <div class="info-block m-t-5"
                                                     style="position: relative; display: inline-block;">
                                                     <a href="#" data-toggle="collapse" data-target="#min-max-info7"
                                                         aria-expanded="false" class="info-icon collapsed">
                                                         <i class="fas fa-info-circle m-l-10"></i>
                                                     </a>
                                                     <div id="min-max-info7" class="min-max-info collapse"
                                                         style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                         <span class="m-r-5"> R:100-25k</span>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="casino-odds-box" style="display: block;">Pair Plus <div class="info-block m-t-5"
                                                     style="position: relative; display: inline-block;">
                                                     <a href="#" data-toggle="collapse" data-target="#min-max-info8"
                                                         aria-expanded="false" class="info-icon collapsed">
                                                         <i class="fas fa-info-circle m-l-10"></i>
                                                     </a>
                                                     <div id="min-max-info8" class="min-max-info collapse"
                                                         style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                         <span class="m-r-5"> R:100-10k</span>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="casino-table-row">
                                            <div style="width: 25%;">
                                                <div
                                                    class="casino-odds-box back back-1 market_2_row market_2_b_btn suspended-box" style="width: 100%;">
                                                    <span class="casino-odds market_2_b_val">1.98</span>
                                                   
                                                </div>
                                                 <div
                                                        class="casino-nation-book market_2_b_exposure market_exposure text-center" style="color: red;">0
                                                    </div>
                                             </div>
                                              <div style="width: 25%;">
                                             <div
                                                 class="casino-odds-box back back-1 market_6_row market_6_b_btn suspended-box" style="width: 100%;">
                                                 <span class="casino-odds market_6_b_val">1.98</span>
                                              
                                             </div>
                                                <div
                                                     class="casino-nation-book market_6_b_exposure market_exposure text-center" style="color: red;">0
                                                 </div>
                                             </div>
                                              <div style="width: 25%;">
                                             <div
                                                 class="casino-odds-box back back-1 market_12_row market_12_b_btn suspended-box" style="width: 100%;">
                                                 <span class="casino-odds market_12_b_val">2</span>
                                               
                                             </div>
                                               <div
                                                     class="casino-nation-book market_12_b_exposure market_exposure text-center" style="color: red;">0
                                                 </div>
                                             </div>
                                              <div style="width: 25%;">
                                             <div
                                                 class="casino-odds-box back back-1 market_4_row market_4_b_btn suspended-box" style="width: 100%;">
                                                 <span class="casino-odds market_4_b_val">B</span>
                                               
                                             </div>
                                               <div
                                                     class="casino-nation-book market_4_b_exposure market_exposure text-center" style="color: red;">0
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="teenpatti20-other-oods d-md-none">
                                     <div class="casino-table-right-box">
                                         <div class="casino-odds-box back back-1 market_9_row market_9_b_btn">
                                             <div><img src="../storage/front/img/cards/spade.png"><img
                                                     src="../storage/front/img/cards/club.png"></div>
                                             <div class=""><span class="casino-odds market_9_b_val">1.98</span>
                                                 <div
                                                     class="casino-nation-book market_9_b_exposure market_exposure text-danger">
                                                     0</div>
                                             </div>
                                         </div>
                                         <div class="casino-odds-box back back-1 market_10_row market_10_b_btn">
                                             <div><img src="../storage/front/img/cards/heart.png"><img
                                                     src="../storage/front/img/cards/diamond.png"></div>
                                             <div class=""><span class="casino-odds market_10_b_val">1.98</span>
                                                 <div
                                                     class="casino-nation-book market_10_b_exposure market_exposure text-danger">
                                                     0</div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="teenpatti20-other-oods d-none d-md-flex">
                                 <div class="casino-table-left-box">
                                     <div style="width: 49%;">
                                     <div class="casino-odds-box back back-1 market_7_row market_7_b_btn"  style="width: 100%;">
                                         <div><img src="/storage/front/img/cards/spade.png"><img
                                                 src="/storage/front/img/cards/club.png"></div>
                                         <div><span class="casino-odds market_7_b_val">1.98</span>
                                             <!-- <div
                                                 class="casino-nation-book market_7_b_exposure market_exposure text-danger">
                                             </div> -->
                                         </div>
                                     </div>
                                      <div class="casino-nation-book text-center market_7_b_exposure market_exposure" style="color: red;"> 0
                                        <div class="info-block m-t-5" style="position: relative;float: right;">
                                            <a href="#" data-toggle="collapse" data-target="#min-max-info9" aria-expanded="false"
                                                class="info-icon collapsed">
                                                <i class="fas fa-info-circle m-l-10"></i>
                                            </a>
                                            <div id="min-max-info9" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                <span class="m-r-5"> R:100-10k</span>
                                            </div>
                                        </div>
                                    </div>
                                     </div>
                                     <div style="width: 49%;">
                                     <div class="casino-odds-box back back-1 market_8_row market_8_b_btn"  style="width: 100%;">
                                         <div><img src="/storage/front/img/cards/heart.png"><img
                                                 src="/storage/front/img/cards/diamond.png"></div>
                                         <div><span class="casino-odds market_8_b_val">1.98</span>
                                             <!-- <div
                                                 class="casino-nation-book market_8_b_exposure market_exposure text-danger">
                                             </div> -->
                                         </div>
                                     </div>
                                     <div class="casino-nation-book text-center market_8_b_exposure market_exposure" style="color: red;"> 0
                                        <div class="info-block m-t-5" style="position: relative; float: right;">
                                            <a href="#" data-toggle="collapse" data-target="#min-max-info10" aria-expanded="false"
                                                class="info-icon collapsed">
                                                <i class="fas fa-info-circle m-l-10"></i>
                                            </a>
                                            <div id="min-max-info10" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                <span class="m-r-5"> R:100-10k</span>
                                            </div>
                                        </div>
                                    </div>
                                     </div>
                                 </div>
                                 <div class="casino-table-right-box">
                                    <div style="width: 49%;">
                                        <div class="casino-odds-box back back-1 market_9_row market_9_b_btn" style="width: 100%;">
                                            <div><img src="/storage/front/img/cards/spade.png"><img
                                                    src="/storage/front/img/cards/club.png"></div>
                                            <div><span class="casino-odds market_9_b_val">1.98</span>
                                                <!-- <div
                                                    class="casino-nation-book market_9_b_exposure market_exposure text-danger">
                                                </div> -->
                                            </div>
                                        </div>
                                         <div class="casino-nation-book text-center market_9_b_exposure market_exposure" style="color: red;"> 0
                                        <div class="info-block m-t-5" style="position: relative; float: right;">
                                            <a href="#" data-toggle="collapse" data-target="#min-max-info11" aria-expanded="false"
                                                class="info-icon collapsed">
                                                <i class="fas fa-info-circle m-l-10"></i>
                                            </a>
                                            <div id="min-max-info11" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                <span class="m-r-5"> R:100-10k</span>
                                            </div>
                                        </div>
                                    </div>
                                     </div>
                                     <div style="width: 49%;">
                                        <div class="casino-odds-box back back-1 market_10_row market_10_b_btn" style="width: 100%;">
                                            <div><img src="/storage/front/img/cards/heart.png"><img
                                                    src="/storage/front/img/cards/diamond.png"></div>
                                            <div><span class="casino-odds market_10_b_val">1.98</span>
                                                <!-- <div
                                                    class="casino-nation-book market_10_b_exposure market_exposure text-danger">
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="casino-nation-book text-center market_10_b_exposure market_exposure" style="color: red;"> 0
                                        <div class="info-block m-t-5" style="position: relative;float: right;">
                                            <a href="#" data-toggle="collapse" data-target="#min-max-info12" aria-expanded="false"
                                                class="info-icon collapsed">
                                                <i class="fas fa-info-circle m-l-10"></i>
                                            </a>
                                            <div id="min-max-info12" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:60px;">
                                                <span class="m-r-5"> R:100-10k</span>
                                            </div>
                                        </div>
                                    </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="casino-last-result-title"><span>Last Result</span><span><a
                                     href="<?php echo MASTER_URL; ?>/reports/casino-results?q=teen20b">View
                                     All</a></span></div>
                         <div class="casino-last-results" id="last-result">
                             <!-- <span class="result result-a">A</span><span class="result result-a">A</span><span class="result result-a">A</span><span class="result result-b">B</span><span class="result result-a">A</span><span class="result result-b">B</span><span class="result result-a">A</span><span class="result result-b">B</span><span class="result result-b">B</span><span class="result result-b">B</span> -->
                         </div>
                         <div class="sidebar-box my-bet-container mt-2 d-xl-none">
                             <div class="sidebar-title">
                                 <h4>Rules</h4>
                             </div>
                             <div class="">
                                 <div class="table-responsive">
                                     <table class="table table-bordered">
                                         <thead>
                                             <tr>
                                                 <th colspan="2" class="text-center">Pair Plus</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <tr>
                                                 <td>Pair</td>
                                                 <td>1 TO 1</td>
                                             </tr>
                                             <tr>
                                                 <td>Flush</td>
                                                 <td>1 TO 4</td>
                                             </tr>
                                             <tr>
                                                 <td>Straight</td>
                                                 <td>1 TO 6</td>
                                             </tr>
                                             <tr>
                                                 <td>Trio</td>
                                                 <td>1 TO 30</td>
                                             </tr>
                                             <tr>
                                                 <td>Straight Flush</td>
                                                 <td>1 TO 40</td>
                                             </tr>
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
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
                 <div class="card m-b-10">
                     <div class="card-header">
                         <h6 class="card-title d-inline-block">
                             Rules
                         </h6>
                     </div>
                     <div class="card-body" style="padding: 10px;">
                         <table class="table table-bordered rules-table">
                             <tbody>
                                 <tr class="text-center">
                                     <th colspan="2">Pair Plus</th>
                                 </tr>
                                 <tr>
                                     <td width="60%">Pair</td>
                                     <td>1 TO 1</td>
                                 </tr>
                                 <tr>
                                     <td width="60%">Flush</td>
                                     <td>1 TO 4</td>
                                 </tr>
                                 <tr>
                                     <td width="60%">Straight</td>
                                     <td>1 TO 6</td>
                                 </tr>
                                 <tr>
                                     <td width="60%">Trio</td>
                                     <td>1 TO 30</td>
                                 </tr>
                                 <tr>
                                     <td width="60%">Straight Flush</td>
                                     <td>1 TO 40</td>
                                 </tr>
                             </tbody>
                         </table>
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
                         <h4 class="modal-title">20-20 Teenpatti B Result</h4>
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
var markettype = "TEEN20B";
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
        socket.emit('Room', 'teen20b');
    });

    socket.on('gameIframe', function(data) {
        $("#casinoIframe").attr('src', data);
    });
    socket.on('game', function(data) {
        console.log("data=", data);
        data1 = data;
        if (data && data1.t1) {
            if (oldGameId != data1.t1[0].mid && data1.t1[0].mid != 0 && data1.t1[0].mid != "0") {
                // setTimeout(function() {
                //     clearCards();
                // }, <?php echo CASINO_RESULT_TIMEOUT; ?>);
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
                    $("#card_c4").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C2 +
                        ".png");
                }
                if (data.t1[0].C3 != 1) {
                    $("#card_c2").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C3 +
                        ".png");
                }
                if (data.t1[0].C4 != 1) {
                    $("#card_c5").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C4 +
                        ".png");
                }
                if (data.t1[0].C5 != 1) {
                    $("#card_c3").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C5 +
                        ".png");
                }
                if (data.t1[0].C6 != 1) {
                    $("#card_c6").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C6 +
                        ".png");
                }
            }
            clock.setValue(data1.t1[0].autotime);
            $(".round_no").text(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid
                .split(".")[1] : data.t1[0].mid);
            eventId = data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[
                1] : data.t1[0].mid;
            for (var j in data.t2) {
                selectionid = data.t2[j].sectionId || data.t2[j].sid;
                runner = data.t2[j].nation || data.t2[j].nat;
                b1 = data.t2[j].b1;
                bs1 = data.t2[j].bs1;
                l1 = data.t2[j].l1;
                ls1 = data.t2[j].ls1;
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
                /* if(selectionid != "3" && selectionid != "4"){
                $(".market_" + selectionid + "_b_btn").html(back_html);

                } */
                $(".market_" + selectionid + "_b_val").html(b1);

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
    $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
    $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
    $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
    $("#card_c4").attr("src", site_url + "storage/front/img/cards/1.png");
    $("#card_c5").attr("src", site_url + "storage/front/img/cards/1.png");
    $("#card_c6").attr("src", site_url + "storage/front/img/cards/1.png");
}

function updateResult(data) {
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
        casino_type = "'teen20b'";
        data.forEach((runData) => {

            eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] :
                runData.mid;
            html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type +
                ')"  class="ball-runs last-result ml-1 ' + (parseInt(runData.win) == 1 ? 'playera' :
                    'playerb') + '">' + (parseInt(runData.win) == 1 ? 'A' : 'B') + '</span>';
        });
        $("#last-result").html(html);
        if (oldGameId == 0 || oldGameId == resultGameLast) {
            $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
            $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
            $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
            $("#card_c4").attr("src", site_url + "storage/front/img/cards/1.png");
            $("#card_c5").attr("src", site_url + "storage/front/img/cards/1.png");
            $("#card_c6").attr("src", site_url + "storage/front/img/cards/1.png");
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
        url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/teen20b/' + event_id,
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
    if (get_round_no() > 0) {
        if (xhr && xhr.readyState != 4)
            xhr.abort();
        xhr = $.ajax({
            url: MASTER_URL + '/live-market/teenpatti/active_bets/teen20b/' + get_round_no(),
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
        url: MASTER_URL + '/live-market/teenpatti/view_more_matched/teen20b/' + get_round_no(),
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
        url: MASTER_URL + '/live-market/teenpatti/market_analysis/teen20b/' + get_round_no(),
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