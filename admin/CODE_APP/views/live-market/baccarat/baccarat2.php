<link rel="stylesheet" type="text/css" href="<?php echo MASTER_URL; ?>/assets/css/flipclock.css">

<div class="col-md-12 main-container">
    <style type="text/css">
    </style>
    <style>
    .baccarat-container .bet-odds {
        background-color: #434343;
        font-size: 12px;
        color: #fff;
        width: 100%;
        padding: 6px;
        text-align: center;
        cursor: pointer;
        height: 30px;
    }

    .row5 .col-3 {
        height: 76px;
    }

    .baccarat .player-pair>div:first-child {
        font-size: 16px;
    }

    .baccarat .banker-pair>div:first-child {
        font-size: 16px;
    }

    .market_exposure {
        font-size: 12px;
        font-weight: bold;
    }

    .row>* {

        padding-right: unset;
        padding-left: 8px;
    }

    .suspended-box {
        position: relative;
        pointer-events: none;
        cursor: none;
    }

    .suspended-box::before {
        background-image: url(storage/front/img/lock.svg);
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

    .casino-last-results .result.result-a {
        background-color: #086cb8;
        color: #fff;
    }

    .baccarat .casino-last-results .result.result-b {
        background-color: #ae2130;
        color: #fff;
    }

    .baccarat-container {
        height: 185px;
    }

    .player-image-container img {
        left: 5%;
    }
      .baccarat .player>div:first-child{
        display: flex;
    flex-direction: column;
    align-items: flex-start;
    }
    .baccarat .banker>div:first-child{
            display: flex;
    flex-direction: column;
    align-items: end;
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
        <div class="coupon-card row dt6-container">
            <div class="col-md-8 main-content baccarat">
                <div class="coupon-card">
                    <div class="game-heading">
                        <span class="card-header-title">
                            Baccarat 2
                            <!-- <small role="button" class="teenpatti-rules" onclick="view_rules('baccarat2-rules.jpg')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small> -->
                            <!---->
                        </span>
                        <!-- <small role="button" class="teenpatti-rules"
												onclick="view_rules('baccarat2')" data-target="#rules_popup"
												data-toggle="modal" tabindex="0"><u>Rules</u></small> -->
                        <span class="float-right">
                            Round ID:
                            <span class="round_no">0</span>
                        </span>
                    </div>
                    <!---->
                    <div class="video-container">
                        <?php
											if (!empty(IFRAME_URL_SET)) {
												?>
                        <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . BACCARAT2_CODE; ?>" width="100%"
                            height="400px" style="border: 0px;"></iframe>
                        <?php

											} else {
												?>
                        <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="400"
                            style="border: 0px;"></iframe>
                        <?php

											}
											?>
                        <!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . BACCARAT2_CODE; ?>" width="100%" height="400" style="border: 0px;"a></ifrme> -->
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

                                                .rules-section img {
                                                    height: 30px;
                                                    margin-right: 5px;
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
                                                        <li>In the Baccarat game two hands are dealt; once for the
                                                            banker and another for the player. The player best which
                                                            will win or if they will tie. The winning hand has the
                                                            closest value to nine. In case of Banker winning, if
                                                            banker's point sum is equals to 6, then payout will be 50%.
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="rules-section">
                                                    <h6 class="rules-highlight">Rules for Players:</h6>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td rowspan="3">When Player’s first two cards total:
                                                                    </td>
                                                                    <td>0-1-2-3-4-5</td>
                                                                    <td>Draw a card</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>6-7</td>
                                                                    <td>Stands</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>8-9</td>
                                                                    <td>Natural-Neither hand draws</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="rules-section">
                                                    <h6 class="rules-highlight">Rules for Banker:</h6>
                                                    <ul class="pl-2 pr-2 list-style">
                                                        <li>When the PLAYER stands on 6 or 7, the BANKER will always
                                                            draw on totals of 0-1-2-3-4 and 5, and stands on 6-7-8 and
                                                            9.When the PLAYER does not have a natural, the BANKER shall
                                                            draw on the totals of 0-1 or 2, and then observe the
                                                            following rules:</li>
                                                    </ul>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>When Banker’s first two cards total:</td>
                                                                    <td>Draws when Player’s third card is:</td>
                                                                    <td>Does not draw when Player’s third card is:</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>1-2-3-4-5-6-7-9-0</td>
                                                                    <td>8</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>2-3-4-5-6-7</td>
                                                                    <td>1-8-9-0</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>4-5-6-7</td>
                                                                    <td>1-2-3-8-9-0</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>6</td>
                                                                    <td>6-7</td>
                                                                    <td>1-2-3-4-5-8-9-0</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>7</td>
                                                                    <td colspan="2">STANDS</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>8-9</td>
                                                                    <td colspan="2">NATURAL-NEITHER HAND DRAWS</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <ul class="pl-2 pr-2 list-style">
                                                        <li>If the PLAYER takes no third card BANKER stands on 6. The
                                                            hand closest to 9 wins.All Winning bets are paid even
                                                            money.TIE bets pay 8 for 1</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="rules-section">
                                                    <h6 class="rules-highlight">Side Bets:</h6>
                                                    <ul class="pl-2 pr-2 list-style">
                                                        <li><b>Player Pair</b> - Bet on the chance that the first two
                                                            cards dealt to the player, are a pair.</li>
                                                        <li><b>Banker Pair</b> - Bet on the chance that the first two
                                                            cards dealt to the banker, are a pair.</li>
                                                        <li>Select the Player/Banker winning score and get paid
                                                            according to the payout shown. in the event of tie, bets on
                                                            “Winning Total” are lost</li>
                                                    </ul>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>1-4(7:5:1)</td>
                                                                    <td>5-6(4:1)</td>
                                                                    <td>7(4:5:1)</td>
                                                                    <td>8(3:1)</td>
                                                                    <td>9(2:5:1)</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <ul class="pl-2 pr-2 list-style">
                                                        <li>For example, if you believe the Player/Banker winning score
                                                            will be ‘5-6’(meaning 5 or 6) then if this side bet wins you
                                                            can win 4 times your side bet amount</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="baccarat-container">
                        <div class="row row5">
                            <!-- <div class="col-3">
													<div style="text-align : center;"><b
															style="color: #333; font-size: 20px; font-weight: 400;">Statistics</b>
													</div>
													<div>
														<div style="position: relative;">
															<div dir="ltr"
																style="position: relative; width: 183px; height: 160px;">
																<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"
																	aria-label="A chart.">
																	<svg width="183" height="160" aria-label="A chart."
																		style="overflow: hidden;">
																		<defs id="_ABSTRACT_RENDERER_ID_1"></defs>
																		<rect x="0" y="0" width="183" height="160"
																			stroke="none" stroke-width="0"
																			fill="#eeeeee"></rect>
																		<g>
																			<rect x="130" y="3" width="53" height="39"
																				stroke="none" stroke-width="0"
																				fill-opacity="0" fill="#ffffff"></rect>
																			<g column-id="Player">
																				<rect x="130" y="3" width="53"
																					height="9" stroke="none"
																					stroke-width="0" fill-opacity="0"
																					fill="#ffffff"></rect>
																				<g><text text-anchor="start" x="142"
																						y="10.65" font-family="Arial"
																						font-size="9" stroke="none"
																						stroke-width="0"
																						fill="#222222">Player</text></g>
																				<circle cx="134.5" cy="7.5" r="4.5"
																					stroke="none" stroke-width="0"
																					fill="#086cb8"></circle>
																			</g>
																			<g column-id="Banker">
																				<rect x="130" y="18" width="53"
																					height="9" stroke="none"
																					stroke-width="0" fill-opacity="0"
																					fill="#ffffff"></rect>
																				<g><text text-anchor="start" x="142"
																						y="25.65" font-family="Arial"
																						font-size="9" stroke="none"
																						stroke-width="0"
																						fill="#222222">Banker</text></g>
																				<circle cx="134.5" cy="22.5" r="4.5"
																					stroke="none" stroke-width="0"
																					fill="#ae2130"></circle>
																			</g>
																			<g column-id="Tie">
																				<rect x="130" y="33" width="53"
																					height="9" stroke="none"
																					stroke-width="0" fill-opacity="0"
																					fill="#ffffff"></rect>
																				<g><text text-anchor="start" x="142"
																						y="40.65" font-family="Arial"
																						font-size="9" stroke="none"
																						stroke-width="0"
																						fill="#222222">Tie</text></g>
																				<circle cx="134.5" cy="37.5" r="4.5"
																					stroke="none" stroke-width="0"
																					fill="#279532"></circle>
																			</g>
																		</g>
																		<g>
																			<path
																				d="M115,74.5L115,85.5A55,44,0,0,1,86.49645207559436,124.05749392192999L86.49645207559436,113.05749392192999A55,44,0,0,0,115,74.5"
																				stroke="#06518a" stroke-width="1"
																				fill="#06518a"></path>
																			<path
																				d="M60,74.5L60,85.5L86.49645207559436,124.05749392192999L86.49645207559436,113.05749392192999"
																				stroke="#06518a" stroke-width="1"
																				fill="#06518a"></path>
																			<path
																				d="M60,74.5L60,30.5A55,44,0,0,1,86.49645207559436,113.05749392192999L60,74.5A0,0,0,0,0,60,74.5"
																				stroke="#086cb8" stroke-width="1"
																				fill="#086cb8"></path>
																			<text text-anchor="start"
																				x="85.55839301424535"
																				y="70.89873799201459"
																				font-family="Arial" font-size="9"
																				stroke="none" stroke-width="0"
																				fill="#ffffff">42%</text>
																		</g>
																		<g>
																			<path
																				d="M60,74.5L60,85.5L46.32205620593296,42.88234091034024L46.32205620593296,31.88234091034024"
																				stroke="#1d7026" stroke-width="1"
																				fill="#1d7026"></path>
																			<path
																				d="M60,74.5L46.32205620593296,31.88234091034024A55,44,0,0,1,60,30.5L60,74.5A0,0,0,0,0,60,74.5"
																				stroke="#279532" stroke-width="1"
																				fill="#279532"></path>
																		</g>
																		<g>
																			<path
																				d="M86.49645207559436,113.05749392192999L86.49645207559436,124.05749392192999A55,44,0,0,1,5,85.5L5,74.5A55,44,0,0,0,86.49645207559436,113.05749392192999"
																				stroke="#831924" stroke-width="1"
																				fill="#831924"></path>
																			<path
																				d="M60,74.5L86.49645207559436,113.05749392192999A55,44,0,1,1,46.32205620593296,31.88234091034024L60,74.5A0,0,0,1,0,60,74.5"
																				stroke="#ae2130" stroke-width="1"
																				fill="#ae2130"></path>
																			<text text-anchor="start"
																				x="18.08325816387353"
																				y="87.56615438684823"
																				font-family="Arial" font-size="9"
																				stroke="none" stroke-width="0"
																				fill="#ffffff">54%</text>
																		</g>
																		<g></g>
																	</svg>
																	<div aria-label="A tabular representation of the data in the chart."
																		style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;">
																		<table>
																			<thead>
																				<tr>
																					<th>P</th>
																					<th>Data</th>
																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<td>Player</td>
																					<td>42</td>
																				</tr>
																				<tr>
																					<td>Banker</td>
																					<td>54</td>
																				</tr>
																				<tr>
																					<td>Tie</td>
																					<td>4</td>
																				</tr>
																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
															<div aria-hidden="true"
																style="display: none; position: absolute; top: 170px; left: 193px; white-space: nowrap; font-family: Arial; font-size: 9px;">
																Tie</div>
															<div></div>
														</div>
													</div>
												</div> -->
                            <div class="col-12">
                                <div class="row row5">
                                    <div class="col">
                                        <div class="bet-odds suspended market_6_b_btn market_6_row back-1" style="display: flex;flex-wrap: wrap; flex-direction: column; align-content: center;font-size: 14px;">
                                            <p class="mb-1">Score 1-4</p>&nbsp;&nbsp;
                                            <p class="mb-1">7.5:1</p>
                                        </div>
                                        <div class="book market_6_b_exposure market_exposure" style="color: black;">0
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="bet-odds suspended market_7_b_btn market_7_row back-1" style="display: flex;flex-wrap: wrap; flex-direction: column; align-content: center;font-size: 14px;">
                                            <p class="mb-1">Score 5-6</p>&nbsp;&nbsp;
                                            <p class="mb-1">4:1</p>
                                        </div>
                                        <div class="book market_7_b_exposure market_exposure" style="color: black;">0
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="bet-odds suspended market_8_b_btn market_8_row back-1" style="display: flex;flex-wrap: wrap; flex-direction: column; align-content: center;font-size: 14px;">
                                            <p class="mb-1">Score 7</p>&nbsp;&nbsp;
                                            <p class="mb-1">4.5:1</p>
                                        </div>
                                        <div class="book market_8_b_exposure market_exposure" style="color: black;" >0
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="bet-odds suspended market_9_b_btn market_9_row back-1" style="display: flex;flex-wrap: wrap; flex-direction: column; align-content: center;font-size: 14px;">
                                            <p class="mb-1">Score 8</p>&nbsp;&nbsp;
                                            <p class="mb-1">3:1</p>
                                        </div>
                                        <div class="book market_9_b_exposure market_exposure" style="color: black;">0
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="bet-odds suspended market_10_b_btn market_10_row back-1" style="display: flex;flex-wrap: wrap; flex-direction: column; align-content: center;font-size: 14px;">
                                            <p class="mb-1">Score 9</p>&nbsp;&nbsp;
                                            <p class="mb-1">2.5:1</p>
                                        </div>
                                        <div class="book market_10_b_exposure market_exposure" style="color: black;">0
                                        </div>
                                    </div>
                                </div>
                                <div class="bet-container mt-1">
                                    <div class="player-pair">
                                        <div class="suspended market_4_b_btn market_4_row back-1">
                                            Player Pair<br />
                                            11:1
                                        </div>
                                        <div class="book market_4_b_exposure market_exposure" style="color: black;">0
                                        </div>
                                    </div>
                                    <div class="player">
                                        <div class="suspended market_1_b_btn market_1_row back-1">
                                            <b class="">Player 1:1</b>
                                            <div class="player-card">

                                                <img id="card_c5" class="lrotate" style="display:none;"
                                                    src="storage/front/img/cards/1.png">
                                                <img id="card_c3" src="storage/front/img/cards/1.png">
                                                <img id="card_c1" src="storage/front/img/cards/1.png">

                                            </div>
                                        </div>
                                        <div class="book market_1_b_exposure market_exposure" style="color: black;">0
                                        </div>
                                    </div>
                                    <div class="tie">
                                        <div class="suspended  market_3_b_btn market_3_row back-1">
                                            <div><b class="">Tie</b></div>
                                            <div class="mt-2">8:1</div>
                                        </div>
                                        <div class="book market_3_b_exposure market_exposure" style="color: black;">0
                                        </div>
                                    </div>
                                    <div class="banker">
                                        <div class="suspended market_2_b_btn market_2_row back-1">
                                            <b class="">Banker &nbsp; 1:1</b>
                                            <div class="player-card second">

                                                <img id="card_c2" src="storage/front/img/cards/1.png">
                                                <img id="card_c4" src="storage/front/img/cards/1.png">
                                                <img id="card_c6" class="lrotate" style="display:none;"
                                                    src="storage/front/img/cards/1.png">
                                                <!---->
                                            </div>
                                        </div>
                                        <div class="book market_2_b_exposure market_exposure" style="color: black;">0
                                        </div>
                                    </div>
                                    <div class="banker-pair">
                                        <div class="suspended market_5_b_btn market_5_row back-1">
                                            Banker Pair<br />
                                            11:1
                                        </div>
                                        <div class="book market_5_b_exposure market_exposure" style="color: black;">0
                                        </div>
                                    </div>
                                </div>
                                <div class="row row5 mt-2">
                                    <div class="col-12 text-right">
                                        <!-- <span class="m-r-5 market_min_max_1">Min:100 Max:100000</span>	 -->
                                        <!--<span> Min: <span>100</span> Max: <span>100000</span></span>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <marquee scrollamount="3" class="casino-remark m-b-10"> </marquee>
                    <div class="fancy-marker-title m-t-10">
                        <div class="casino-last-result-title"><span>Last Result</span><span><a
                                    href="<?php echo MASTER_URL; ?>/reports/casino-results?q=baccarat2">View
                                    All</a></span></div>
                        <!-- <div class="casino-last-results"><span class="result result-b">B</span><span class="result result-a">P</span><span class="result result-a">P</span><span class="result result-a">P</span><span class="result result-a">P</span><span class="result result-b">B</span><span class="result result-b">B</span><span class="result result-a">P</span><span class="result result-a">P</span><span class="result">T</span></div> -->
                        <div class="last-result-container text-right mt-1" id="last-result">



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
                            <a href="javascript:void(0)" class="btn btn-back float-right" id="view_more_bets">View
                                More</a>
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
                        <img src="<?php echo WEB_URL; ?>storage/front/img/rules/war-rules.jpg" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div id="modalpokerresult" class="modal fade show" tabindex="-1">
            <div class="modal-dialog" style="min-width: 650px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Baccarat 2 Result</h4>
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
                <h4 class="modal-title">VIEW MORE</h4>
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
var markettype = "BACCARAT2";
var back_html = "";
var lay_html = "";
var gstatus = "";
var last_result_id = '0';

function websocket(type) {
    socket = io.connect(websocketurl, {
        transports: ['websocket']
    });
    socket.on('connect', function() {
        socket.emit('Room', 'baccarat2');
    });


    socket.on('game', function(data) {
        if (data && data['t1'] && data['t1'][0]) {
            if (oldGameId != data.t1[0].mid && data.t1[0].mid != 0 && data.t1[0].mid != "0") {
                clearCards();
            }
            oldGameId = data.t1[0].mid;
            if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                $(".casino-remark").text(data.t1[0].remark);
                if (data.t1[0].C1 != 1) {
                    $("#card_c1").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C1 + ".png");
                }
                if (data.t1[0].C2 != 1) {
                    $("#card_c2").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C2 + ".png");
                }
                if (data.t1[0].C3 != 1) {
                    $("#card_c3").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C3 + ".png");
                }
                if (data.t1[0].C4 != 1) {
                    $("#card_c4").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C4 + ".png");
                }
                if (data.t1[0].C5 != 1) {
                    $("#card_c5").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C5 + ".png");
                    $("#card_c5").show();
                }
                if (data.t1[0].C6 != 1) {
                    $("#card_c6").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C6 + ".png");
                    $("#card_c6").show();
                }

            }
            clock.setValue(data.t1[0].autotime);
            $(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
            $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
            eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1];
            for (var j in data['t2']) {
                selectionid = parseInt(data['t2'][j].sid);
                runner = data['t2'][j].nat || data['t2'][j].nation;
                b1 = data['t2'][j].b1;
                l1 = data['t2'][j].l1;

                if (selectionid == 1) {
                    $(".market_min_max_" + selectionid).html("Min:" + data['t2'][j].min + " Max:" + data['t2'][
                        j].max);

                }
                markettype = "BACCARAT2";
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
                gstatus = data['t2'][j].gstatus.toString();
                if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {

                    $(".market_" + selectionid + "_row").addClass("suspended");
                    $(".market_" + selectionid + "_b_btn").removeClass("back-1");
                } else {
                    $(".market_" + selectionid + "_b_btn").addClass("back-1");
                    $(".market_" + selectionid + "_row").removeClass("suspended");
                }
            }
        }
    });
    socket.on('gameResult', function(args) {
        updateResult(args.data);
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
    $("#card_c5").hide();
    $("#card_c6").hide();

    $('.market_exposure').text('0');
    $('#table_body').html('');
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
        casino_type = "'baccarat2'";
        data.forEach((runData) => {

            if (parseInt(runData.result) == 1) {
                ab = "cplayer";
                ab1 = "P";

            } else if (parseInt(runData.result) == 2) {
                ab = "cbanker";
                ab1 = "B";

            } else {
                ab = "ctie";
                ab1 = "T";
            }


            eventId = runData.mid == 0 ? 0 : runData.mid.split(".")[1];
            html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type +
                ')"  class="ball-runs  ' + ab + ' last-result">' + ab1 + '</span>';
        });
        $("#last-result").html(html);
        if (oldGameId == 0 || oldGameId == resultGameLast) {
            $("#card_c1").attr("src", "storage/front/img/cards/1.png");
            $("#card_c2").attr("src", "storage/front/img/cards/1.png");
            $("#card_c3").attr("src", "storage/front/img/cards/1.png");
            $("#card_c4").attr("src", "storage/front/img/cards/1.png");
            $("#card_c5").attr("src", "storage/front/img/cards/1.png");
            $("#card_c6").attr("src", "storage/front/img/cards/1.png");
            $("#card_c5").hide();
            $("#card_c6").hide();

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
        url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/baccarat2/' + event_id,
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
        url: MASTER_URL + '/live-market/baccarat2/active_bets/baccarat2/' + get_round_no(),
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
        url: MASTER_URL + '/live-market/baccarat2/view_more_matched/baccarat2/' + get_round_no(),
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
        url: MASTER_URL + '/live-market/baccarat2/market_analysis/baccarat2/' + get_round_no(),
        type: 'POST',
        dataType: 'json',
        success: function(data) {
            if (data.results == 0) {
                $('.market_exposure').text(0).css('color', 'red');
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