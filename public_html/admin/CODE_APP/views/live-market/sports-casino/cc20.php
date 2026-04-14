<link rel="stylesheet" type="text/css" href="<?php echo MASTER_URL; ?>/assets/css/flipclock.css">

<div class="col-md-12 main-container">
    <style type="text/css">
    .score-box.btn-theme.suspended {
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

    .cricket20-container {
        display: flex;
        display: -webkit-flex;
        flex-wrap: wrap;
        justify-content: space-between;
        width: 100%;
    }

    .cricket20-left,
    .cricket20-right {
        width: calc(50% - 4px);
        padding: 5px;
        /* background: #f2f2f2;
        box-shadow: 0 0 3px #aaa; */
    }


    .score-box {
        position: relative;
        height: 64px;
        margin-top: 30px;
        padding: 0;
        background-image: url(/storage/img/score-bg.png);
        background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: center;
        margin-bottom: 45px;
    }

    .team-score {
        position: unset;
        left: unset;
        top: unset;
        background-color: unset;
        padding: 5px;
        display: flex;
        align-items: center;
        height: 62px;
        left: unset;
        width: 374px;
        flex-direction: unset;
        justify-content: unset;
        align-items: unset;
    }

    .team-score {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        color: #fff;
        font-size: 14px;
    }

    .text-center {
        text-align: center !important;
    }

    .ball-icon {
        position: absolute;
        left: 50%;
        top: -25px;
        height: 50px;
        transform: translateX(-50%);
    }

    img,
    svg {
        vertical-align: middle;
    }

    .ball-icon img {
        height: 60px;
    }

    .blbox {
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
        left: 50%;
        width: 170px;
        height: 40px;
        transform: translateX(-50%);
        bottom: -15px;
    }

    .casino-odds-box {
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 5px 0;
        /* font-weight: bold; */
        border-left: 1px solid #c7c8ca;
        cursor: pointer;
        min-height: 46px;
    }

    .blbox div {
        width: 35%;
        text-align: center;
        color: #000;
        height: 40px;
        line-height: 40px;
        border: 0;
    }

    .casino-odds {
        font-size: 14px;
        /* font-weight: bold; */
        line-height: 1;
    }

    .back {
        background-color: #72bbef !important;
    }

    .lay {
        background-color: #faa9ba !important;
    }

    /* 
.ml-1, .mx-1 {
    margin-left: .25rem !important;
} */

    .casino-remark {
        color: #097c93;
        font-weight: bold;
        font-size: 12px;
        max-width: 100%;
        text-overflow: ellipsis;
        display: inline-block;
        width: 100%;
        padding: 0px 5px;
        white-space: nowrap;
        overflow: hidden;
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
        /* background: #355e3b; */
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

    .casino-last-results .result img,
    .casino-last-results .result img {
        height: 25px;
    }

    .video-overlay{
        top: 155px !important;
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
        <div class="coupon-card row cc-20">
            <div class="col-md-8 main-content">
                <div class="coupon-card">
                    <div class="game-heading"><span class="card-header-title">Cricket Match 20-20
                            <!-- <small role="button" class="teenpatti-rules"  onclick="view_rules('cmatch20-rules.jpg')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small>  -->
                            <!---->
                        </span>
                        <!-- <small role="button" class="teenpatti-rules" onclick="view_rules('cc20')"
                                                data-target="#rules_popup" data-toggle="modal"
                                                tabindex="0"><u>Rules</u></small> -->
                        <span class="float-right">
                            Round ID:
                            <span class="round_no">0</span></span>
                    </div>
                    <!---->
                    <div class="video-container">
                        <?php
													if(!empty(IFRAME_URL_SET)){
													?>
                        <iframe class="iframedesign" src="<?php echo IFRAME_URL."".CRICKET20_CODE;?>" width="100%"
                            height="400px" style="border: 0px;"></iframe>
                        <?php
														
													}else{
														?>
                        <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="400"
                            style="border: 0px;"></iframe>
                        <?php

													}
													?>
                        <!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL; echo CRICKET20_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
                        <div class="clock clock2digit flip-clock-wrapper">
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
                            <ul class="flip play">
                                <li class="flip-clock-before">
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
                        <!---->
                        <!---->
                        <div class="video-overlay">
                            <div class="videoCards">
                                <div>
                                    <!-- <h3 class="text-white">Dealer</h3> -->
                                    <div><img id="card_c1" src="/storage/front/img/cards_new/1.png">
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
                                                    border-right: 1px solid #444;
                                                    vertical-align: middle;
                                                    text-align: center;
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

                                                .rules-section .casino-tabs {
                                                    background-color: #222 !important;
                                                    border-radius: 0;
                                                }

                                                .rules-section .casino-tabs .nav-tabs .nav-link {
                                                    color: #fff !important;
                                                }

                                                .rules-section .casino-tabs .nav-tabs .nav-link.active {
                                                    color: #FDCF13 !important;
                                                    border-bottom: 3px solid #FDCF13 !important;
                                                }
                                                </style>

                                                <div class="rules-section">
                                                    <ul class="pl-2 pr-2 list-style">
                                                        <li>This is a game of twenty-20 cricket. We will alreadty have
                                                            score of first batting team, &amp; score of second batting
                                                            team up to 19.4 overs. At this stage second batting team
                                                            will be always 12 run short of first batting team(IF THE
                                                            SCORE IS TIED, SECOND BAT WILL WIN). This 12 run has to be
                                                            scored by 2 scoring shots or (two steps).</li>
                                                        <li>1st step is to be select a scoring shot from 2 , 3 , 4 , 5 ,
                                                            6 ,7 , 8 , 9 , 10. The one who bet will get rate according
                                                            to the scoring shot he select from 2 to 10, &amp; that will
                                                            be considered as ball number 19.5.</li>
                                                        <li>2nd step is to open a card from 40 card deck of 1 to 10 of
                                                            all suites. This will be considered last ball of the match.
                                                            This twenty-20 game consist of scoring shots of 1 run to 10
                                                            runs.</li>
                                                        <li class="text-danger"><b>IF THE SCORE IS TIED SECOND BAT WILL
                                                                WIN</b></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--<div class="video-overlay1">
												<p>1 -> <span class="market_1_b_exposure">0</span></p>
												<p>2 -> <span class="market_2_b_exposure">0</span></p>
												<p>3 -> <span class="market_3_b_exposure">0</span></p>
												<p>4 -> <span class="market_4_b_exposure">0</span></p>
												<p>5 -> <span class="market_5_b_exposure">0</span></p>
												<p>6 -> <span class="market_6_b_exposure">0</span></p>
												<p>7 -> <span class="market_7_b_exposure">0</span></p>
												<p>8 -> <span class="market_8_b_exposure">0</span></p>
												<p>9 -> <span class="market_9_b_exposure">0</span></p>
												<p>10 -> <span class="market_10_b_exposure">0</span></p>
												
												
											</div>-->
                        <!---->
                    </div>
                    <div class="casino-detail">
                        <div class="casino-table">
                            <div class="cricket20-container">
                                <div class="cricket20-left">
                                    <div class="score-box">
                                        <div class="team-score">
                                            <!-- <div>
                                                <div class="text-center team_1_name"><b>Team A</b>
                                                </div>
                                                <div class="text-center"><span class="ml-1 team_1_score">228/7
                                                    </span><span class="ml-2 team_1_over">20 Over</span>
                                                </div>
                                            </div> -->
                                            <!-- <div>
                                                <div class="text-center team_2_name"><b>Team B</b>
                                                </div>
                                                <div class="text-center"><span class="ml-1 team_2_score">216/6
                                                    </span><span class="ml-1 team_2_score">19.4 Overs</span>
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="ball-icon"><img src="/storage/img/balls/ball2.png"></div>
                                        <div class="blbox">
                                            <div
                                                class="casino-odds-box back back-1 market_1_b_btn suspended-box market_1_row">
                                                <span class="casino-odds market_1_b_value">9.5</span>
                                            </div>
                                            <div
                                                class="casino-odds-box lay lay-1 market_1_l_btn suspended-box market_1_row">
                                                <span class="casino-odds market_1_l_value">10.5</span>
                                            </div>
                                        </div>
                                        <!-- <div class="c20minmax"><i data-toggle="collapse" data-target="#minmax4" aria-expanded="true" class="fas fa-info-circle float-right"></i> <div id="minmax4" class="icon-range collapse show" style="">
                                                R:<span>100</span>-<span>3L</span></div></div> -->
                                                  <div class="info-block m-t-5" style="position: relative; display: inline-block;margin-left: 335px;">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info1" aria-expanded="false"
                                                            class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                        <div id="min-max-info1" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-3L</span>        
                                                        </div>
                                                    </div>
                                    </div>
                                    <div class="score-box">
                                        <!-- <div class="team-score">
                                            <div>
                                                <div class="text-center team_1_name"><b>Team A</b>
                                                </div>
                                                <div class="text-center"><span class="ml-1 team_1_score">228/7
                                                    </span><span class="ml-2 team_1_over">20 Over</span>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-center team_2_name"><b>Team B</b>
                                                </div>
                                                <div class="text-center"><span class="ml-1 team_2_score">216/6
                                                    </span><span class="ml-1 team_2_score">19.4 Overs</span>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="ball-icon"><img src="/storage/img/balls/ball3.png"></div>
                                        <div class="blbox">
                                            <div
                                                class="casino-odds-box back back-1 market_2_b_btn suspended-box market_2_row">
                                                <span class="casino-odds market_2_b_value">4.8</span>
                                            </div>
                                            <div
                                                class="casino-odds-box lay lay-1 market_2_l_btn suspended-box market_2_row">
                                                <span class="casino-odds market_2_l_value">5.2</span>
                                            </div>
                                        </div>
                                         <div class="info-block m-t-5" style="position: relative; display: inline-block;margin-left: 335px;margin-top: 68px;">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info2" aria-expanded="false"
                                                            class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                        <div id="min-max-info2" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-3L</span>        
                                                        </div>
                                                    </div>
                                    </div>
                                    <div class="score-box">
                                        <!-- <div class="team-score">
                                            <div>
                                                <div class="text-center team_1_name"><b>Team A</b>
                                                </div>
                                                <div class="text-center"><span class="ml-1 team_1_score">228/7
                                                    </span><span class="ml-2 team_1_over">20 Over</span>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-center team_2_name"><b>Team B</b>
                                                </div>
                                                <div class="text-center"><span class="ml-1 team_2_score">216/6
                                                    </span><span class="ml-1 team_2_score">19.4 Overs</span>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="ball-icon"><img src="/storage/img/balls/ball4.png"></div>
                                        <div class="blbox">
                                            <div
                                                class="casino-odds-box back back-1 market_3_b_btn suspended-box market_3_row">
                                                <span class="casino-odds market_3_b_value">3.23</span>
                                            </div>
                                            <div
                                                class="casino-odds-box lay lay-1 market_3_l_btn suspended-box market_3_row">
                                                <span class="casino-odds market_3_l_value">3.43</span>
                                            </div>
                                        </div>
                                         <div class="info-block m-t-5" style="position: relative; display: inline-block;margin-left: 335px;margin-top: 68px;">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info3" aria-expanded="false"
                                                            class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                        <div id="min-max-info3" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-3L</span>        
                                                        </div>
                                                    </div>
                                    </div>
                                    <div class="score-box">
                                        <!-- <div class="team-score">
                                            <div>
                                                <div class="text-center team_1_name"><b>Team A</b>
                                                </div>
                                                <div class="text-center"><span class="ml-1 team_1_score">228/7
                                                    </span><span class="ml-2 team_1_over">20 Over</span>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-center team_2_name"><b>Team B</b>
                                                </div>
                                                <div class="text-center"><span class="ml-1 team_2_score">216/6
                                                    </span><span class="ml-1 team_2_score">19.4 Overs</span>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="ball-icon"><img src="/storage/img/balls/ball5.png"></div>
                                        <div class="blbox">
                                            <div
                                                class="casino-odds-box back back-1 market_4_b_btn suspended-box market_4_row">
                                                <span class="casino-odds market_4_b_value">2.45</span>
                                            </div>
                                            <div
                                                class="casino-odds-box lay lay-1 market_4_l_btn suspended-box market_4_row">
                                                <span class="casino-odds market_4_l_value">2.55</span>
                                            </div>
                                        </div>
                                         <div class="info-block m-t-5" style="position: relative; display: inline-block;margin-left: 335px;margin-top: 68px;">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info4" aria-expanded="false"
                                                            class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                        <div id="min-max-info4" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-3L</span>        
                                                        </div>
                                                    </div>
                                    </div>
                                    <div class="score-box">
                                        <!-- <div class="team-score">
                                            <div>
                                                <div class="text-center team_1_name"><b>Team A</b>
                                                </div>
                                                <div class="text-center"><span class="ml-1 team_1_score">228/7
                                                    </span><span class="ml-2 team_1_over">20 Over</span>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-center team_2_name"><b>Team B</b>
                                                </div>
                                                <div class="text-center"><span class="ml-1 team_2_score">216/6
                                                    </span><span class="ml-1 team_2_score">19.4 Overs</span>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="ball-icon"><img src="/storage/img/balls/ball6.png"></div>
                                        <div class="blbox">
                                            <div
                                                class="casino-odds-box back back-1 market_5_b_btn suspended-box market_5_row">
                                                <span class="casino-odds market_5_b_value">1.98</span>
                                            </div>
                                            <div
                                                class="casino-odds-box lay lay-1 market_5_l_btn suspended-box market_5_row">
                                                <span class="casino-odds market_5_l_value">2.02</span>
                                            </div>
                                        </div>
                                         <div class="info-block m-t-5" style="position: relative; display: inline-block;margin-left: 335px;margin-top: 68px;">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info5" aria-expanded="false"
                                                            class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                        <div id="min-max-info5" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-3L</span>        
                                                        </div>
                                                    </div>
                                    </div>
                                </div>
                                <div class="cricket20-right">
                                    <div class="score-box">
                                        <!-- <div class="team-score">
                                            <div>
                                                <div class="text-center team_1_name"><b>Team A</b>
                                                </div>
                                                <div class="text-center"><span class="ml-1 team_1_score">228/7
                                                    </span><span class="ml-1 team_1_over">20 Over</span>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-center team_2_name"><b>Team B</b>
                                                </div>
                                                <div class="text-center"><span class="ml-1 team_2_score">216/6
                                                    </span><span class="ml-1 team_2_score">19.4 Overs</span>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="ball-icon"><img src="/storage/img/balls/ball7.png"></div>
                                        <div class="blbox">
                                            <div
                                                class="casino-odds-box back back-1 market_6_b_btn suspended-box market_6_row">
                                                <span class="casino-odds market_6_b_value">1.65</span>
                                            </div>
                                            <div
                                                class="casino-odds-box lay lay-1 market_6_l_btn suspended-box market_6_row">
                                                <span class="casino-odds market_6_l_value">1.69</span>
                                            </div>
                                        </div>
                                         <div class="info-block m-t-5" style="position: relative; display: inline-block;margin-left: 335px;margin-top: 68px;">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info6" aria-expanded="false"
                                                            class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                        <div id="min-max-info6" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-3L</span>        
                                                        </div>
                                                    </div>
                                    </div>
                                    <div class="score-box">
                                        <!-- <div class="team-score">
                                            <div>
                                                <div class="text-center team_1_name"><b>Team A</b>
                                                </div>
                                                <div class="text-center"><span class="ml-1 team_1_score">228/7
                                                    </span><span class="ml-1 team_1_over">20 Over</span>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-center"><b>Team B</b></div>
                                                <div class="text-center team_2_name"><span
                                                        class="ml-1 team_2_score">216/6 </span><span
                                                        class="ml-1 team_2_score">19.4 Overs</span>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="ball-icon"><img src="/storage/img/balls/ball8.png"></div>
                                        <div class="blbox">
                                            <div
                                                class="casino-odds-box back back-1 market_7_b_btn suspended-box market_7_row">
                                                <span class="casino-odds market_7_b_value">1.42</span>
                                            </div>
                                            <div
                                                class="casino-odds-box lay lay-1 market_7_l_btn suspended-box market_7_row">
                                                <span class="casino-odds market_7_l_value">1.45</span>
                                            </div>
                                        </div>
                                         <div class="info-block m-t-5" style="position: relative; display: inline-block;margin-left: 335px;margin-top: 68px;">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info7" aria-expanded="false"
                                                            class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                        <div id="min-max-info7" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-3L</span>        
                                                        </div>
                                                    </div>
                                    </div>
                                    <div class="score-box">
                                        <!-- <div class="team-score">
                                            <div>
                                                <div class="text-center team_1_name"><b>Team A</b>
                                                </div>
                                                <div class="text-center"><span class="ml-1 team_1_score">228/7
                                                    </span><span class="ml-1 team_1_over">20 Over</span>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-center team_2_name"><b>Team B</b>
                                                </div>
                                                <div class="text-center"><span class="ml-1 team_2_score">216/6
                                                    </span><span class="ml-1 team_2_score">19.4 Overs</span>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="ball-icon"><img src="/storage/img/balls/ball9.png"></div>
                                        <div class="blbox">
                                            <div
                                                class="casino-odds-box back back-1 market_8_b_btn suspended-box market_8_row">
                                                <span class="casino-odds market_8_b_value">1.24</span>
                                            </div>
                                            <div
                                                class="casino-odds-box lay lay-1 market_8_l_btn suspended-box market_8_row">
                                                <span class="casino-odds market_8_l_value">1.27</span>
                                            </div>
                                        </div>
                                         <div class="info-block m-t-5" style="position: relative; display: inline-block;margin-left: 335px;margin-top: 68px;">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info8" aria-expanded="false"
                                                            class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                        <div id="min-max-info8" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-3L</span>        
                                                        </div>
                                                    </div>
                                    </div>
                                    <div class="score-box">
                                        <!-- <div class="team-score">
                                            <div>
                                                <div class="text-center team_1_name"><b>Team A</b>
                                                </div>
                                                <div class="text-center"><span class="ml-1 team_1_score">228/7
                                                    </span><span class="ml-1 team_1_over">20 Over</span>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-center team_2_name"><b>Team B</b>
                                                </div>
                                                <div class="text-center"><span class="ml-1 team_2_score">216/6
                                                    </span><span class="ml-1 team_2_score">19.4 Overs</span>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="ball-icon"><img src="/storage/img/balls/ball10.png"></div>
                                        <div class="blbox">
                                            <div
                                                class="casino-odds-box back back-1 market_9_b_btn suspended-box market_9_row">
                                                <span class="casino-odds market_9_b_value">1.1</span>
                                            </div>
                                            <div
                                                class="casino-odds-box lay lay-1 market_9_l_btn suspended-box market_9_row">
                                                <span class="casino-odds market_9_l_value">1.12</span>
                                            </div>
                                        </div>
                                         <div class="info-block m-t-5" style="position: relative; display: inline-block;margin-left: 335px;margin-top: 68px;">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info10" aria-expanded="false"
                                                            class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                        <div id="min-max-info10" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-3L</span>        
                                                        </div>
                                                    </div>
                                    </div>
                                </div>
                              
                            </div>
                           
                        </div>
                           <div class="mt-1">
                                <marquee class="casino-remark" scrollamount="3">Team B Need 12 Runs
                                    to WIN Match. If The Score is Tie Team B will WIN. </marquee>
                            </div>
                        <div class="casino-last-result-title"><span>Last Result</span><span><a
                                    href="<?php echo MASTER_URL; ?>/reports/casino-results?q=cmatch20">View
                                    All</a></span>
                        </div>
                        <!-- <div class="casino-last-result-title"><span>Last Result</span><span><a
                                                        href="<?php echo MASTER_URL; ?>/reports/casino-results?q=cmatch20">View All</a></span>
                                            </div> -->
                        <div class="casino-last-results" id="last-result">
                            <!-- <span class="result"><img src="/storage/img/balls/ball2.png"></span><span class="result"><img src="/storage/img/balls/ball4.png"></span><span class="result"><img src="/storage/img/balls/ball6.png"></span><span class="result"><img src="/storage/img/balls/ball8.png"></span><span class="result"><img src="/storage/img/balls/ball3.png"></span><span class="result"><img src="/storage/img/balls/ball6.png"></span><span class="result"><img src="/storage/img/balls/ball9.png"></span><span class="result"><img src="/storage/img/balls/ball10.png"></span><span class="result"><img src="/storage/img/balls/ball1.png"></span><span class="result"><img src="/storage/img/balls/ball9.png"></span> -->
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
                                                    <!-- <th>PlaceDate</th> -->
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
                        <img src="<?php echo WEB_URL; ?>storage/front/img/rules/war-rules.jpg" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div id="modalpokerresult" class="modal fade show" tabindex="-1">
            <div class="modal-dialog modal-md modal-dialog-centered" style="min-width: 650px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Cricket Match 20-20 Result</h4>
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
                    <!-- <ul class="nav nav-tabs d-inline-block" role="tablist ">
                        <li class="nav-item d-inline-block">
                            <a class="nav-link  active " data-toggle="tab" href="#matched-bet2"
                                id="matchedDataLink">Matched Bets</a>
                        </li>
                        <li class="nav-item d-inline-block">
                            <a class="nav-link " data-toggle="tab" href="#unmatched-bet2"
                                id="unMatchedDataLink">Unmatched Bets</a>
                        </li>
                        <li class="nav-item d-inline-block">
                            <a class="nav-link " data-toggle="tab" href="#deleted-bet2"
                                id="deletedMatchedDataLink">Deleted Bets</a>
                        </li>
                    </ul> -->
                    <div class="tab-content m-t-20">
                        <div id="matched-bet2" class="tab-pane active">
                            <!-- <form method="POST" id="form-view_more_bets">
                                <div class="row form-inline">
                                    <div class="col-md-5">
                                        <div class="form-group m-t-20">
                                            <label for="list-ac" class="d-inline-block">Client Name</label>
                                            <select class="form-control" name="search-client_name"
                                                id="search-client_name" id="" style="width: 160px;"></select>
                                        </div>
                                        <div class="form-group m-t-20">
                                            <label class="d-inline-block">IP Address</label>
                                            <input type="text" name="search-ipaddress" id="search-ipaddress"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group m-t-20">
                                            <label class="d-inline-block">Amount</label>
                                            <input type="text" name="search-amount_min" id="search-amount_min"
                                                class="form-control" placeholder="Min">
                                            <input type="text" name="search-amount_max" id="search-amount_max"
                                                class="form-control m-l-10" placeholder="Max">
                                        </div>
                                        <div class="form-group m-t-20">
                                            <label class="d-inline-block">Type</label>
                                            <select name="search-bettype" class="form-control d-inline-block"
                                                id="search-bettype">
                                                <option value="">All</option>
                                                <option value="back">Back</option>
                                                <option value="lay">Lay</option>
                                            </select>
                                            <button class="btn btn-back m-l-10" id="btn-search"
                                                type="submit">Search</button>
                                            <button type="reset" class="btn btn-back m-l-10"
                                                id="btn-view_all_matched">View All</button>
                                        </div>
                                    </div>
                                </div>
                            </form> -->
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
var markettype = "2020_CRICKET_MATCH";
var markettype_2 = markettype;
var back_html = "";
var lay_html = "";
var gstatus = "";
var last_result_id = '0';

function websocket(type) {
    socket = io.connect(websocketurl);
    socket.on('connect', function() {
        socket.emit('Room', 'cmatch20');
    });

    socket.on('gameIframe', function(data) {
        $("#casinoIframe").attr('src', data);
    });

    socket.on('game', function(data) {

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
                    $("#card_c1").attr("src", "/storage/front/img/cards_new/" + data.t1[0].C1 + ".png");
                }

                $(".team_1_name").text("Team A");
                $(".team_2_name").text("Team B");

                $(".team_1_score").text(data.t1[0].C2 + "/" + data.t1[0].C3);
                $(".team_2_score").text(data.t1[0].C5 + "/" + data.t1[0].C6);

                $(".team_1_over").text(data.t1[0].C4 + " Over");
                $(".team_2_over").text(data.t1[0].C7 + " Over");

            }
            clock.setValue(data.t1[0].autotime);
            $(".round_no").text(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid
                .split(".")[1] : data.t1[0].mid);
            $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[
                0].mid.split(".")[1] : data.t1[0].mid);
            eventId = data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(
                ".")[1] : data.t1[0].mid;

            for (var j in data['t2']) {
                selectionid = parseInt(data['t2'][j].sid);
                runner = data['t2'][j].nat || data['t2'][j].nation;
                b1 = data['t2'][j].b1;
                l1 = data['t2'][j].l1;


                markettype = "2020_CRICKET_MATCH";


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

                gstatus = data['t2'][j].gstatus.toString();
                if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {

                    $(".market_" + selectionid + "_row").addClass("suspended-box");
                    $(".market_" + selectionid + "_b_btn").removeClass("back-1");
                } else {
                    $(".market_" + selectionid + "_b_btn").addClass("back-1");
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
        //refresh(markettype);
    });
    socket.on('error', function(data) {});
    socket.on('close', function(data) {});
}

function clearCards() {
    //refresh(markettype);
    $("#card_c1").attr("src", "/storage/front/img/cards_new/1.png");

}


function updateResult(data) {
    // console.log("data update",data);
    if (data && data[0]) {


        data = JSON.parse(JSON.stringify(data));
        resultGameLast = data[0].mid;

        if (last_result_id != resultGameLast) {
            last_result_id = resultGameLast;
            /* refresh(markettype); */
        }

        var html = "";
        casino_type = "'cmatch20'";
        data.forEach((runData) => {

            ball_result = parseInt(runData.win);

            eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] :
                runData.mid;
            html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type +
                ')"  class=" result"><img src="/storage/img/balls/ball' + ball_result +
                '.png" class="result-ball"></span>';
        });
        $("#last-result").html(html);
        if (oldGameId == 0 || oldGameId == resultGameLast) {

            $("#card_c1").attr("src", "/storage/front/img/cards_new/1.png");


        }
    }
}

function teenpatti(type) {
    gameType = type
    websocket();
}
teenpatti("ok");


function getType(data) {
    var data1 = data;
    if (data) {
        data = data.split('DD');
        if (data.length > 1) {
            var obj = {
                type: '[',
                color: 'red',
                card: data[0]
            }
            return obj;
        } else {
            data = data1;
            data = data.split('HH');
            if (data.length > 1) {
                var obj = {
                    type: '{',
                    color: 'red',
                    card: data[0]
                }
                return obj;
            } else {
                data = data1;
                data = data.split('SS');
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
</script>
<script>
function view_casiono_result(event_id, casino_type) {

    $("#cards_data").html("");
    $("#round_no").text(event_id);
    $.ajax({
        type: 'POST',
        url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/cmatch20/' + event_id,
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
        url: MASTER_URL + '/live-market/sports-casino/active_bets/cricket20/' + get_round_no(),
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
        url: MASTER_URL + '/live-market/sports-casino/view_more_matched/cricket20/' + get_round_no(),
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
        url: MASTER_URL + '/live-market/sports-casino/market_analysis/cricket20/' + get_round_no(),
        type: 'POST',
        dataType: 'json',
        success: function(data) {
            if (data.results == 0) {
                $('.market_exposure').text(0).css('color', 'white');
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