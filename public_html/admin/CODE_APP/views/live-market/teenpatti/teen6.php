<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flipclock/0.7.8/flipclock.min.css">
<div class="col-md-12 main-container">
    <style type="text/css">
        .box-w3{
            width: 340px;
            min-width: 340px;
            max-width: 340px;
        }
        span.odd{
            display: block;
        }
        #matched-bet th, #unmatched-bet th{
            min-width: 100px;
        }
        .mtree table td, .mtree table th{
            width: 33.3%;
        }
        #openFancyBook{
        }
        .fancyBookModal .modal-body {
            background: none;
            padding-right: 15px;
        }
        #playStopButton {
            height:30px;
            width:70px;
            font-weight:bold;
            border-radius:8px;
            border:none;
            color:black;
            background-color:lightsteelblue;
            outline:none;
            cursor:pointer;
            font-size:12px;
            font:Arial, Helvetica, sans-serif;
        }
        .coupon-table button span{
            font-size: 14px;
        }
        .coupon-table button span.odd{
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

    .teenpatti2 .casino-odds-box {
        width: 20%;
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
        /* border-left: 1px solid #c7c8ca; */
        cursor: pointer;
        min-height: 46px;
    }

    .casino-nation-name {
        font-size: 16px;
        font-weight: bold;
    }

    .casino-table-full-box {
        width: 100%;
        border-left: 1px solid #c7c8ca;
        border-right: 1px solid #c7c8ca;
        border-top: 1px solid #c7c8ca;
        background-color: #f2f2f2;
    }

    .teen2other .casino-odds-box {
    width: 16%;
    flex-direction: row;
    justify-content: space-between;
    padding: 5px 10px;
}

.teen2other img {
    height: 35px;
}

.teen2other .casino-odds-box .casino-odds {
    display: flex
;
    flex-wrap: wrap;
    justify-content: flex-end;
}

.teen2cards {
    display: flex
;
    flex-wrap: wrap;
    justify-content: center;
    border: 0;
    padding: 10px 10px 0 10px;
}

.card-odd-box {
    display: flex
;
    flex-wrap: wrap;
    justify-content: flex-start;
    flex-direction: column;
    align-items: center;
    margin-bottom: 4px;
    margin-right: 4px;
    cursor: pointer;
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

    .casino-odds {
        font-size: 18px;
        font-weight: bold;
        line-height: 1;
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

    .under-over-row .uo-box {
        display: flex;
        flex-wrap: wrap;
        width: 48%;
        margin-top: 10px;
        /* border: 1px solid #c7c8ca; */
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
        /* justify-content: space-between; */
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
        width: 24%;
        flex-direction: row;
        justify-content: space-between;
        padding: 5px 10px;
        margin: 4px;
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


    .last-result-title {
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

.last-result-title a {
    color: #ffffff;
}
.abc{
    color: #ef910f !important;
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
                                        <div class="game-heading"><span class="card-header-title">Teenpatti - 2.0
                                                <!-- <small role="button" class="teenpatti-rules"  onclick="view_rules('tp-rules.jpg')" data-target="#rules_popup" data-toggle="modal"  tabindex="0"><u>Rules</u></small> --> <!----></span> 
                                                
                                                <span class="float-right">
                                                Round ID:
                                                <span class="round_no">0</span><!--   | Min: <span>100</span> | Max: <span>500000</span> --></span>
                                        </div>
                                        <!---->
                                        <div class="video-container">
                                                        <?php
                                            if(!empty(IFRAME_URL_SET)){
                                            ?>
                                            <iframe class="iframedesign" src="<?php echo IFRAME_URL."".TEEN6_CODE;?>" width="100%" height="400px" style="border: 0px;"></iframe>
                                            <?php
                                                
                                            }else{
                                                ?>
                                                <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="400" style="border: 0px;"></iframe>
                                                <?php

                                            }
                                            ?>
                                            <!---->
                                            <!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL;
                                                            echo TEEN6_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
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
.rules-section img {
  max-width: 100%;
}
    </style>

<div class="rules-section">
                                            <ul class="pl-4 pr-4 list-style">
                                                <li>Teenpatti is an indian origin three cards game</li>
                                                <li>This game is played with a regular 52 cards deck between Player A and Player B .</li>
                                                <li>The objective of the game is to make the best three cards hand as per the hand rankings and win.</li>
                                                <li>You have a betting option of Back and Lay for the main bet.</li>
                                                <li>Rankings of the card hands from highest to lowest :</li>
                                                <li>1. Straight Flush (pure Sequence )</li>
                                                <li>2. Trail  (Three of a Kind )</li>
                                                <li>3. Straight (Sequence)</li>
                                                <li>4. Flush (Color )</li>
                                                <li>5. Pair (Two of a kind )</li>
                                                <li>6. High Card </li>
                                            </ul>
                                            <div>
                                                <img src="/storage/front/img/rules/teen6.jpg" class="img-fluid">
                                            </div>
                                        </div></div><div><div class="rules-section">
                                            <div>
                                                <h6 class="rules-highlight">Side bets  :</h6>
                                            </div>
                                            <ul class="pl-4 pr-4 list-style">
                                                <li><b>Under 21 - Over 22 :</b> It is a total point value of all the three cards.</li>
                                                <li>here you can bet whether the total point value of all the 3 cards will be    Under 21 or Over 22.</li>
                                                <li><b>Point Values :</b>
                                                    <div>A= 1</div>
                                                    <div>2= 2</div>
                                                    <div>3= 3</div>
                                                    <div>4= 4</div>
                                                    <div>5= 5</div>
                                                    <div>6= 6</div>
                                                    <div>7= 7</div>
                                                    <div>8= 8</div>
                                                    <div>9= 9</div>
                                                    <div>10= 10</div>
                                                    <div>J= 11</div>
                                                    <div>Q= 12</div>
                                                    <div>K= 13</div>
                                                </li>
                                                <li>you can bet on either or both the players .</li>
                                                <li><b>Suits:</b>
                                                    <div>Here you can bet on every card whether it will be a Spade ,Heart,Club or a Diamond card .</div>
                                                </li>
                                                <li><b>Odd - Even :</b>
                                                    <div>Here you can bet on every card whether it will be an Odd card or an Even card.</div>
                                                </li>
                                                <li><b>Odd Cards :</b> A,3,5,7,9,J,K</li>
                                                <li><b>Even Cards :</b> 2,4,6,8,10,Q</li>
                                                <li><b>Fix Cards :</b>
                                                    <div>Here you can place bets on fix cards of your choice from Ace (A) to King (K). </div>
                                                    <div>This bet is availabe for every card.  </div>
                                                </li>
                                            </ul>

                                        </div></div></div>
                                    </div>
                                </div>
                            </div>
                        </div> 

                                        </div>
                                        <div class="casino-container teenpatti-1day">
                                            <div class="casino-table teenpatti2">
                                                <div class="casino-table-box">
                                                    <div class="casino-table-left-box">
                                                        <div class="casino-table-header">
                                                            <div class="casino-nation-detail">Player A</div>
                                                            <div class="casino-odds-box">Back</div>
                                                            <div class="casino-odds-box">Lay</div>
                                                        </div>
                                                        <div class="casino-table-body">
                                                            <div class="casino-table-row ">
                                                                <div class="casino-nation-detail"  style="display: flex;height: 48px;text-align: center;vertical-align: bottom;">
                                                                    <div class="casino-nation-name d-flex justify-content-between align-items-baseline" style="width: 100%;background-color: #ddd;">Main
                                                                    <span class="d-flex justify-content-end align-items-baseline" style="width: 100%;">
                                                                        <b class="casino-nation-book text-center market_1_b_exposure market_exposure" style="color: red;">0</b>
                                                                  
                                                                    <!-- <div class="">0</div>  -->
                                                                    <div class="info-block m-t-5">
                                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info1" aria-expanded="false"
                                                                            class="info-icon collapsed">
                                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                                        </a>
                                                                        <div id="min-max-info1" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                                            <span class="m-r-5"> R:50-2L</span>        
                                                                        </div>
                                                                    </div>
                                                                      </span>
                                                                      </div>
                                                                </div>
                                                                <div class="casino-odds-box back back-1 market_1_b_btn"><span class="casino-odds">1.56</span></div>
                                                                <div class="casino-odds-box lay lay-1 market_1_l_btn"><span class="casino-odds">1.61</span></div>
                                                            </div>
                                                            <div class="casino-table-row under-over-row">
                                                                <div class="uo-box">
                                                                    <div class="casino-nation-detail" style="display: flex;height: 48px;text-align: center;vertical-align: bottom;">
                                                                        <div class="casino-nation-name d-flex justify-content-between align-items-baseline" style="width: 100%;background-color: #ddd;">Under 21
                                                                       <span class="d-flex justify-content-end align-items-baseline">
                                                                        <b class="casino-nation-book text-center market_9_b_exposure market_exposure" style="color: red;">0</b>
                                                                         <div class="info-block m-t-5">
                                                                            <a href="#" data-toggle="collapse" data-target="#min-max-info2" aria-expanded="false"
                                                                                class="info-icon collapsed">
                                                                                <i class="fas fa-info-circle m-l-10"></i>
                                                                            </a>
                                                                            <div id="min-max-info2" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                                                <span class="m-r-5"> R:100-50k</span>        
                                                                            </div>
                                                                        </div>
                                                                       </span>
                                                                       </div>
                                                                        
                                                                    </div>
                                                                    <div class="casino-odds-box back back-1 market_9_b_btn"><span class="casino-odds">0</span></div>
                                                                    
                                                                </div>
                                                                <div class="uo-box">
                                                                    <div class="casino-nation-detail" style="display: flex;height: 48px;text-align: center;vertical-align: bottom;">
                                                                        <div class="casino-nation-name  d-flex justify-content-between align-items-baseline" style="width: 100%;background-color: #ddd;">Over 22
                                                                       <span class="d-flex justify-content-end align-items-baseline">
                                                                            <b class="casino-nation-book text-center market_10_b_exposure market_exposure" style="color: red;">0</b>
                                                                             <div class="info-block m-t-5">
                                                                                <a href="#" data-toggle="collapse" data-target="#min-max-info6" aria-expanded="false"
                                                                                    class="info-icon collapsed">
                                                                                    <i class="fas fa-info-circle m-l-10"></i>
                                                                                </a>
                                                                                <div id="min-max-info6" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                                                    <span class="m-r-5"> R:100-50k</span>        
                                                                                </div>
                                                                            </div>
                                                                       </span>
                                                                       </div>
                                                                        
                                                                        
                                                                    </div>
                                                                    <div class="casino-odds-box back back-1 market_10_b_btn"><span class="casino-odds">0</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="casino-table-box-divider"></div>
                                                    <div class="casino-table-right-box">
                                                        <div class="casino-table-header">
                                                            <div class="casino-nation-detail abc">Player B</div>
                                                            <div class="casino-odds-box">Back</div>
                                                            <div class="casino-odds-box">Lay</div>
                                                        </div>
                                                        <div class="casino-table-body">
                                                            <div class="casino-table-row">
                                                                <div class="casino-nation-detail" style="display: flex;height: 48px;text-align: center;vertical-align: bottom;">
                                                                    <div class="casino-nation-name d-flex justify-content-between align-items-baseline" style="width: 100%;background-color: #ddd;">Main
                                                                    <span  class="d-flex justify-content-end align-items-baseline" style="width: 100%;">
                                                                        <b class="casino-nation-book text-center market_2_b_exposure market_exposure" style="color: red;">0</b>
                                                                        <div class="info-block m-t-5">
                                                                            <a href="#" data-toggle="collapse" data-target="#min-max-info3" aria-expanded="false"
                                                                                class="info-icon collapsed">
                                                                                <i class="fas fa-info-circle m-l-10"></i>
                                                                            </a>
                                                                            <div id="min-max-info3" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                                                <span class="m-r-5"> R:50-2L</span>        
                                                                            </div>
                                                                        </div>
                                                                    </span>
                                                                    </div>
                                                                    <!-- <div class=""></div> -->
                                                                     
                                                                </div>
                                                                <div class="casino-odds-box back back-1 market_2_b_btn suspended-box"><span class="casino-odds">0</span></div>
                                                                <div class="casino-odds-box lay lay-1 market_2_l_btn suspended-box"><span class="casino-odds">0</span></div>
                                                            </div>
                                                            <div class="casino-table-row under-over-row">
                                                                <div class="uo-box">
                                                                    <div class="casino-nation-detail" style="display: flex;height: 48px;text-align: center;vertical-align: bottom;">
                                                                        <div class="casino-nation-name d-flex justify-content-between align-items-baseline" style="width: 100%;background-color: #ddd;">Under 21
                                                                        <span class="d-flex justify-content-end align-items-baseline">
                                                                            <b class="casino-nation-book text-center market_11_b_exposure market_exposure" style="color: red;">0</b>
                                                                                 <div class="info-block m-t-5" >
                                                                                    <a href="#" data-toggle="collapse" data-target="#min-max-info4" aria-expanded="false"
                                                                                        class="info-icon collapsed">
                                                                                        <i class="fas fa-info-circle m-l-10"></i>
                                                                                    </a>
                                                                                    <div id="min-max-info4" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                                                        <span class="m-r-5"> R:100-50k</span>        
                                                                                    </div>
                                                                                </div>
                                                                        </span>
                                                                       </div>
                                                                    </div>
                                                                    <div class="casino-odds-box back back-1 market_11_b_btn suspended-box"><span class="casino-odds">0</span></div>
                                                                    
                                                                </div>
                                                                <div class="uo-box">
                                                                    <div class="casino-nation-detail" style="display: flex;height: 48px;text-align: center;vertical-align: bottom;">
                                                                        <div class="casino-nation-name d-flex justify-content-between align-items-baseline" style="width: 100%;background-color: #ddd;">Over 22
                                                                        <span class="d-flex justify-content-end align-items-baseline">
                                                                        <b class="casino-nation-book text-center market_12_b_exposure market_exposure" style="color: red;">0</b>
                                                                                                <div class="info-block m-t-5">
                                                                                <a href="#" data-toggle="collapse" data-target="#min-max-info5" aria-expanded="false"
                                                                                    class="info-icon collapsed">
                                                                                    <i class="fas fa-info-circle m-l-10"></i>
                                                                                </a>
                                                                                <div id="min-max-info5" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                                                    <span class="m-r-5"> R:100-50k</span>        
                                                                                </div>
                                                                            </div>
                                                                        </span>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="casino-odds-box back back-1 market_12_b_btn suspended-box"><span class="casino-odds">0</span></div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-100 other_markets mt-3">
                                                </div>
                                                <!-- <div class="casino-table-full-box teen2other mt-3">
                                                    <div class="casino-odds-box back suspended-box">
                                                        <div><img src="https://versionobj.ecoassetsservice.com/v35/static/front/img/icons/spade.png"></div>
                                                        <div><span class="casino-odds">3.85</span></div>
                                                    </div>
                                                    <div class="casino-odds-box back suspended-box">
                                                        <div><img src="https://versionobj.ecoassetsservice.com/v35/static/front/img/icons/heart.png"></div>
                                                        <div><span class="casino-odds">3.85</span></div>
                                                    </div>
                                                    <div class="casino-odds-box back suspended-box">
                                                        <div><img src="https://versionobj.ecoassetsservice.com/v35/static/front/img/icons/club.png"></div>
                                                        <div><span class="casino-odds">4.2</span></div>
                                                    </div>
                                                    <div class="casino-odds-box back suspended-box">
                                                        <div><img src="https://versionobj.ecoassetsservice.com/v35/static/front/img/icons/diamond.png"></div>
                                                        <div><span class="casino-odds">3.56</span></div>
                                                    </div>
                                                    <div class="casino-odds-box back suspended-box">
                                                        <div><b>Odd</b></div>
                                                        <div><span class="casino-odds">1.82</span></div>
                                                    </div>
                                                    <div class="casino-odds-box back suspended-box">
                                                        <div><b>Even</b></div>
                                                        <div><span class="casino-odds">2.15</span></div>
                                                    </div>
                                                </div>
                                                <div class="casino-table-full-box teen2cards mt-3">
                                                    <div class="card-odd-box">
                                                        <span class="casino-odds">11.12</span>
                                                        <div class=""><img src="https://versionobj.ecoassetsservice.com/v35/static/front/img/cards/A.png"></div>
                                                    </div>
                                                    <div class="card-odd-box">
                                                        <span class="casino-odds">11.12</span>
                                                        <div class=""><img src="https://versionobj.ecoassetsservice.com/v35/static/front/img/cards/2.png"></div>
                                                    </div>
                                                    <div class="card-odd-box">
                                                        <span class="casino-odds">11.12</span>
                                                        <div class=""><img src="https://versionobj.ecoassetsservice.com/v35/static/front/img/cards/3.png"></div>
                                                    </div>
                                                    <div class="card-odd-box">
                                                        <span class="casino-odds">14.8</span>
                                                        <div class=""><img src="https://versionobj.ecoassetsservice.com/v35/static/front/img/cards/4.png"></div>
                                                    </div>
                                                    <div class="card-odd-box">
                                                        <span class="casino-odds">11.12</span>
                                                        <div class=""><img src="https://versionobj.ecoassetsservice.com/v35/static/front/img/cards/5.png"></div>
                                                    </div>
                                                    <div class="card-odd-box">
                                                        <span class="casino-odds">11.12</span>
                                                        <div class=""><img src="https://versionobj.ecoassetsservice.com/v35/static/front/img/cards/6.png"></div>
                                                    </div>
                                                    <div class="card-odd-box">
                                                        <span class="casino-odds">11.12</span>
                                                        <div class=""><img src="https://versionobj.ecoassetsservice.com/v35/static/front/img/cards/7.png"></div>
                                                    </div>
                                                    <div class="card-odd-box">
                                                        <span class="casino-odds">14.8</span>
                                                        <div class=""><img src="https://versionobj.ecoassetsservice.com/v35/static/front/img/cards/8.png"></div>
                                                    </div>
                                                    <div class="card-odd-box">
                                                        <span class="casino-odds">11.12</span>
                                                        <div class=""><img src="https://versionobj.ecoassetsservice.com/v35/static/front/img/cards/9.png"></div>
                                                    </div>
                                                    <div class="card-odd-box">
                                                        <span class="casino-odds">11.12</span>
                                                        <div class=""><img src="https://versionobj.ecoassetsservice.com/v35/static/front/img/cards/10.png"></div>
                                                    </div>
                                                    <div class="card-odd-box">
                                                        <span class="casino-odds">11.12</span>
                                                        <div class=""><img src="https://versionobj.ecoassetsservice.com/v35/static/front/img/cards/J.png"></div>
                                                    </div>
                                                    <div class="card-odd-box">
                                                        <span class="casino-odds">14.8</span>
                                                        <div class=""><img src="https://versionobj.ecoassetsservice.com/v35/static/front/img/cards/Q.png"></div>
                                                    </div>
                                                    <div class="card-odd-box">
                                                        <span class="casino-odds">14.8</span>
                                                        <div class=""><img src="https://versionobj.ecoassetsservice.com/v35/static/front/img/cards/K.png"></div>
                                                    </div>
                                                </div> -->
                                               
                                            </div>

                                            <div class="last-result-title"><span>Last Result</span> <span class="float-right"><a
                                                     href="<?php echo MASTER_URL; ?>/reports/casino-results?q=teen6" class="">View All</a></span></div>
                                            <div id="last-result" class="last-result-container text-right mt-1"></div>
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
                        <img src="../../../storage/front/img/rules/tp-rules.jpg" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div id="modalpokerresult" class="modal fade show" tabindex="-1">
            <div class="modal-dialog" style="min-width: 650px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Teenpatti - 2.0 Result</h4>
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
    var markettype = "TEEN6";
    var markettype_2 = markettype;
    var back_html = "";
    var lay_html = "";
    var gstatus = "";
    var last_result_id = '0';
    function websocket(type) {
        socket = io.connect(websocketurl);
        socket.on('connect', function() {
            socket.emit('Room', 'teen6');
        });
    
    socket.on('gameIframe', function(data){
			$("#casinoIframe").attr('src',data);
		});
        socket.on('game', function(data) {
           
        
          data1 = data;
            if (data) {
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
                        $("#card_c1").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C1 + ".png");
                    }
                    if (data.t1[0].C2 != 1) {
                        $("#card_c4").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C2 + ".png");
                    }
                    if (data.t1[0].C3 != 1) {
                        $("#card_c2").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C3 + ".png");
                    }
                    if (data.t1[0].C4 != 1) {
                        $("#card_c5").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C4 + ".png");
                    }
                    if (data.t1[0].C5 != 1) {
                        $("#card_c3").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C5 + ".png");
                    }
                    if (data.t1[0].C6 != 1) {
                        $("#card_c6").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C6 + ".png");
                    }
                }
                clock.setValue(data1.t1[0].autotime);
                $(".round_no").text(data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid);
                $("#casino_event_id").val(data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid);
                eventId = data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid;
                  var suit_markets = "";
                var odd_markets = "";
                var cards_markets = "";
                for (var j in data.t2) {
                    selectionid = data.t2[j].sectionId || data.t2[j].sid;
                    runner = data.t2[j].nation || data.t2[j].nat;
                    b1 = data.t2[j].b1;
                    bs1 = data.t2[j].bs1;
                    l1 = data.t2[j].l1;
                    ls1 = data.t2[j].ls1;
                    visible = data.t2[j].visible;
                    back_html = '<span class="odds d-block"><b>' + b1 + '</b></span> ';
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

                   var statuss="";
                    gstatus = data.t2[j].gstatus.toString();
                    if (gstatus == "SUSPENDED" || gstatus == "0") {
                        $(".market_" + selectionid + "_l_btn").addClass("suspended-box");
                        $(".market_" + selectionid + "_b_btn").addClass("suspended-box");
                        statuss="suspended-box";
                    } else {
                        $(".market_" + selectionid + "_l_btn").removeClass("suspended-box");
                        $(".market_" + selectionid + "_b_btn").removeClass("suspended-box");
                    }
                    subtype = data.t2[j].subtype;
                    if (data.t2[j].odds && visible == "1") {
                        for (var k in data.t2[j].odds) {
                            odd_selectionid =  data.t2[j].odds[k].sectionId ||  data.t2[j].odds[k].sid;
                            odd_runner = data.t2[j].odds[k].nation ||  data.t2[j].odds[k].nat;
                            odd_b1 =  data.t2[j].odds[k].b;
                            new_selectionid = selectionid + "_" + odd_selectionid;
                            new_runner = runner + " - " + odd_runner;
                          
                            if (subtype == "suit") {
                                var exposure="";
                                if ($('.casino-nation-book').hasClass("market_"+new_selectionid+"_b_exposure")) {
                                    exposure=$(".market_"+new_selectionid+"_b_exposure").html();
                                    if(exposure != ""){
                                        if (parseInt(exposure,10) < 0) {
                                            $(".market_" + new_selectionid + "_b_exposure").css("color", "red");
                                        } else {
                                            $(".market_" + new_selectionid + "_b_exposure").css("color", "green");
                                        }
                                    }
                                }
                                suit_markets += ` 
                          
                                                    <div class="casino-odds-box back back-1 market_${new_selectionid}_row ${statuss} market_${new_selectionid}_b_btn" side="Back" selectionid="${new_selectionid}" marketid="${new_selectionid}" runner="${new_runner}" marketname="${new_runner}" eventid="${eventId}" markettype="${markettype}" event_name="${markettype}" fullmarketodds="${odd_b1}" fullfancymarketrate="${odd_b1}">
                                                        <div class="bltitle"><img src="/storage/front/img/cards/${odd_runner.toLowerCase()}_race.png"></div>
                                                        <div><span class="casino-odds">${odd_b1}</span><div class="casino-nation-book text-center market_${new_selectionid}_b_exposure market_exposure">${exposure}</div></div>
                                                    </div>
                                                    `;
                            }
                            if (subtype == "oddeven") {
                             
                          
                                var exposure="";
                                if ($('.casino-nation-book').hasClass("market_"+new_selectionid+"_b_exposure")) {
                                    exposure=$(".market_"+new_selectionid+"_b_exposure").html();
                                    if(exposure != ""){
                                        if (parseInt(exposure,10) < 0) {
                                            $(".market_" + new_selectionid + "_b_exposure").css("color", "red");
                                        } else {
                                            $(".market_" + new_selectionid + "_b_exposure").css("color", "green");
                                        }
                                    }
                                }
                                odd_markets += `
                                                        <div class="casino-odds-box back back-1 market_${new_selectionid}_row ${statuss} market_${new_selectionid}_b_btn" side="Back" selectionid="${new_selectionid}" marketid="${new_selectionid}" runner="${new_runner}" marketname="${new_runner}" eventid="${eventId}" markettype="${markettype}" event_name="${markettype}" fullmarketodds="${odd_b1}" fullfancymarketrate="${odd_b1}">
                                                            <div><b>${odd_runner}</b></div>
                                                            <div><span class="casino-odd">${odd_b1}</span><div class="casino-nation-book text-center market_${new_selectionid}_b_exposure market_exposure">${exposure}</div></div>
                                                        </div>
                                                        `;
                            }
                            if (subtype == "cards") {
                              
                          
                                var exposure="";
                                if ($('.casino-nation-book').hasClass("market_"+new_selectionid+"_b_exposure")) {
                                    exposure=$(".market_"+new_selectionid+"_b_exposure").html();
                                    if(exposure != ""){
                                        if (parseInt(exposure,10) < 0) {
                                            $(".market_" + new_selectionid + "_b_exposure").css("color", "red");
                                        } else {
                                            $(".market_" + new_selectionid + "_b_exposure").css("color", "green");
                                        }
                                    }
                                }
                                cards_markets += ` <div class="card-odd-box"><span class="casino-odds">${odd_b1}</span>
                                                            <div class=" back-1 market_${new_selectionid}_row ${statuss}  market_${new_selectionid}_b_btn" side="Back" selectionid="${new_selectionid}" marketid="${new_selectionid}" runner="${new_runner}" marketname="${new_runner}" eventid="${eventId}" markettype="${markettype}" event_name="${markettype}" fullmarketodds="${odd_b1}" fullfancymarketrate="${odd_b1}"><img src="/storage/front/img/andar_bahar/${odd_selectionid}.jpg"><div class="casino-nation-book text-center market_${new_selectionid}_b_exposure market_exposure">${exposure}</div></div>
                                                        </div>
                                                        `;
                            }


                        }
                    }
                }
                 $(".other_markets").html(`<div class="teen2other">${suit_markets}${odd_markets}</div>  <div class="w-100 casino-table-full-box teen2cards mt-3">${cards_markets}</div>`);
            }
        });
        socket.on('gameResult', function(args) {
            console.log("update",args);
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
       //  refresh(markettype);
        $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c4").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c5").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c6").attr("src", site_url + "storage/front/img/cards/1.png");
    }
    function updateResult(data) {
        
        console.log("updateResult",data);
        
        if (data && data[0]) {
            
            
            data = JSON.parse(JSON.stringify(data));
            resultGameLast = data[0].mid;

            if (last_result_id != resultGameLast) {
                last_result_id = resultGameLast;
                //refresh(markettype);
            }

            var html = "";
            casino_type = "'teen6'";
            data.forEach((runData) => {

                eventId = runData.mid == 0 ? 0 : runData.mid;
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs last-result ml-1 ' + (parseInt(runData.win) == 1 ? 'playera' : 'playerb') + '">' + (parseInt(runData.win) == 1 ? 'A' : 'B') + '</span>';
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
    teenpatti("ok");</script>
<script>
    
    function view_casiono_result(event_id, casino_type) {
        $("#cards_data").html("");
        $("#round_no").text(event_id);
        $.ajax({
            type: 'POST',
            url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/teen6/' + event_id,
            dataType: 'json',
            data: {event_id: event_id, casino_type: casino_type},
            success: function (response) {
                $('#modalpokerresult').modal('show');
                $("#cards_data1").html(response.result);
            }
        });
    }
    function get_round_no() {
        return $.trim($('.round_no').text());
    }
    $('.last-result').on('click', function () {
        $('#modalpokerresult').modal('show');
    });
    var xhr;
    function call_active_bets() {
        if (get_round_no() > 0) {
            if (xhr && xhr.readyState != 4)
                xhr.abort();
            xhr = $.ajax({
                url: MASTER_URL + '/live-market/teenpatti/active_bets/teen6/' + get_round_no(),
                type: 'POST',
                dataType: 'json',
                success: function (data) {
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
            url: MASTER_URL + '/live-market/teenpatti/view_more_matched/teen6/' + get_round_no(),
            type: 'POST',
            dataType: 'json',
            data: $('#form-view_more_bets').serialize(),
            success: function (data) {
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
            url: MASTER_URL + '/live-market/teenpatti/market_analysis/teen6/' + get_round_no(),
            type: 'POST',
            dataType: 'json',
            success: function (data) {
                if (data.results  == 0) {
                    
                    $('.market_1_b_exposure').text(0).css('color', 'black');
                    $('.market_2_b_exposure').text(0).css('color', 'black');
                    $('.market_3_b_exposure').text(0).css('color', 'black');
                    $('.market_4_b_exposure').text(0).css('color', 'black');
                }
                else {
                    $.each(data.results, function (index, value) {
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
    $(function () {
        setTimeout(function () {
            call_active_bets();
            call_analysis();
        }, 2000);
        setInterval(function () {
            call_active_bets();
            call_analysis();
        }, <?php echo CASINO_SET_INTERVAL;  ?>);
        $('#view_more_bets').on('click', function () {
            call_view_more_bets();
        });
        $('#form-view_more_bets').on('submit', function () {
            call_view_more_bets();
            return false;
        });
        $('#btn-view_all_matched').on('click', function () {
            $('#search-client_name').html('');
            setTimeout(function () {
                call_view_more_bets();
            }, 1);
        });
        $('#search-client_name').select2({
            allowClear: true,
            minimumInputLength: 3,
            placeholder: 'select..',
            ajax: {
                url: MASTER_URL + '/reports/common/get_clients',
                data: function (params) {
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