<style>
.position-relative {
    position: relative !important;
}

.detail-page-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: flex-start;
    align-content: flex-start;
}

.game-market {
    background: #f7f7f7;
    color: #333;
    margin-top: 8px;
}

.market-6 {
    min-width: calc(100% - 8px);
    max-width: calc(100% - 8px);
    margin-left: 4px;
    margin-right: 4px;
    flex: 1;
}

.market-6 {
    min-width: calc(50% - 8px);
    max-width: calc(50% - 8px);
}

.market-title {
    background-color: var(--theme2-bg70);
    color: #ffffff;
    padding: 8px 10px;
    font-size: 15px;
    font-weight: bold;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.row {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(-1* var(--bs-gutter-y));
    margin-right: calc(-.5* var(--bs-gutter-x));
    margin-left: calc(-.5* var(--bs-gutter-x));
}

.market-header {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    padding: 0;
}

.market-header,
.market-row {
    border-bottom: 0.01em solid #c7c8ca;
}

.col-md-12 {
    flex: 0 0 auto;
    width: 100%;
}

.market-header,
.market-row {
    border-bottom: 0.01em solid #c7c8ca;
}

.market-row {
    background-color: #f2f2f2;
    display: flex;
    flex-wrap: wrap;
}

.market-nation-detail {
    width: calc(100% - 480px);
    /* display: flex; */
    flex-wrap: wrap;
    justify-content: space-between;
    padding: 0 5px;
    font-size: 14px;
}

.market-nation-detail {
    width: calc(100% - 330px);
}

.market-nation-detail {
    font-size: 13px;
}

.market-6 .market-nation-detail {
    width: calc(100% - 240px);
    position: relative;
}

.market-6 .market-nation-detail {
    width: calc(100% - 165px);
}

.ball-by-ball .market-6 .market-nation-detail {
    width: calc(100% - 160px);
}

.back {
    background-color: #72bbef !important;
}

.lay {
    background-color: #faa9ba !important;
}

.market-odd-box {
    width: 80px;
    /* padding: 2px 0; */
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    border-left: 1px solid #c7c8ca;
    cursor: pointer;
    min-height: 35px;
}

.market-odd-box {
    width: 55px;
}

.market-header .market-odd-box {
    min-height: 28px;
}

.market-header .market-odd-box b {
    font-size: 16px;
}

.col-md-4 {
    flex: 0 0 auto;
    width: 33.33333333%;
}

.fancy-min-max-box {
    width: 80px;
    padding: 0 5px;
    text-align: right;
}

.fancy-min-max-box {
    width: 55px;
}

.fancy-min-max-box {
    width: 80px;
}

.fancy-min-max {
    font-size: 12px;
    font-weight: bold;
    color: black;
    word-break: break-all;
    border: unset !important;
    padding: unset !important;
}

.fancy-min-max {
    font-size: 9px;
}

.col-md-12 {
    flex: 0 0 auto;
    width: 100%;
}

.fancy-market {
    border-bottom: 1px solid #c7c8ca;
}

.market-row {
    background-color: #f2f2f2;
    display: flex;
    flex-wrap: wrap;
}

.fancy-market .market-row {
    border-bottom: 0;
}

.market-nation-detail .market-nation-name {
    font-weight: 400;
    max-width: 100%;
    width: 100%;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    display: inline-block;
}

.market-6 .market-nation-detail .market-nation-name {
    white-space: normal;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    max-width: calc(100% - 50px);
}

.ball-by-ball .market-6 .market-nation-detail .market-nation-name {
    max-width: 100%;
}

.market-6 {
    min-width: calc(50% - 8px);
    max-width: calc(50% - 8px);
}

.casino-remark-div {
    padding: 0 5px;
    color: var(--text-info);
    font-weight: bold;
    font-size: 12px;
    max-width: 100%;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    display: inline-block;
    width: 100%;
}

.casino-remark-div {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    /* background-color: #086f3f; */
    color: #086f3f;
}

.casino-remark-div .remark-icon {
    width: 50px;
    display: flex;
    display: -webkit-flex;
    justify-content: center;
    align-items: center;
    height: 32px;
    border-top-left-radius: 16px;
    border-bottom-left-radius: 16px;
    background-color: #086f3f;
}

img,
svg {
    vertical-align: middle;
}

.casino-remark-div marquee {
    width: calc(100% - 60px);
    float: right;
    padding-left: 10px;
    font-size: 12px !important;
    font-style: unset !important;
    position: unset !important;
    color: #086f3f;
}

.casino-remark-div .remark-icon img {
    height: 20px;
}

.casino-last-result-title {
    padding: 10px;
    background-color: var(--theme2-bg70);
    ;
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

@keyframes zoom-in-zoom-out {

    /* At the beginning of the animation */
    0% {
        /* Scale the element to its original size */
        transform: scale(1, 1);
    }

    /* At the middle of the animation */
    50% {
        /* Scale the element to 1.5 times its original size */
        transform: scale(1.5, 1.5);
    }

    /* At the end of the animation */
    100% {
        /* Scale the element back to its original size */
        transform: scale(1, 1);
    }
}

.goal .suspended:after {
    width: 100%;
}

.ball-by-ball-popup span,
.result-image span {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #fff;
    font-size: 32px;
}

.ball-by-ball-popup {
    position: absolute;
    top: 45%;
    left: 50%;
    margin-left: -70px;
    margin-top: -50px;
}

.cricket20ballpopup {
    position: absolute;
    top: 50%;
    left: 50%;
    margin-left: -50px;
    margin-top: -50px;
    z-index: 10;
}

.cricket20ballpopup {
    position: absolute;
    top: 50%;
    left: 50%;
    margin-left: -75px;
    margin-top: -75px;
    z-index: 10;
    animation: zoom-in-zoom-out 1s ease;
    -webkit-animation: zoom-in-zoom-out 1s ease;
    animation-iteration-count: 1;
}

.market-odd-box .market-odd {
    font-size: 15px;
    font-weight: bold;
    margin-bottom: 3px;
    line-height: 1;
}

.market-odd-box .market-volume {
    font-size: 11px;
    line-height: 1;
}

.cricket20ballresult {
    position: relative;
    width: auto;
    left: unset;
    top: unset;
    margin: 0;
    display: inline-block;
}

.cricket20ballresult span {
    position: absolute;
    transform: translate(-50%, -50%);
    text-transform: uppercase;
    top: unset;
    left: 58%;
    color: #000;
    font-weight: bold;
    bottom: -10px;
    font-size: 15px;
    width: 60%;
    height: 40px;
    display: flex;
    align-items: center;
    bottom: -10px;
    justify-content: center;
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

<link rel="stylesheet" type="text/css" href="<?php echo MASTER_URL; ?>/assets/css/flipclock.css">

<div class="col-md-12 main-container">
    <style type="text/css">

    </style>
    <div class="listing-grid ddb-container casino-grid">
        <div class="coupon-card row dt6-container">
            <div class="col-md-8 main-content">
                <div class="coupon-card">
                    <div class="game-heading"><span class="card-header-title">
                            Goal
                            <!-- <small role="button" class="teenpatti-rules"  onclick="view_rules('tt_cards_rule.jpg')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small>  -->
                            <!---->
                        </span>

                        <span class="float-right">
                            Round ID:
                            <span class="round_no">0</span>
                            <!--  | Min:
                                                <span>100</span> | Max:
                                                <span>500000</span></span> -->
                    </div>
                    <!---->
                    <div class="video-container">
                        <?php
                                                    if(!empty(IFRAME_URL_SET)){
                                                                                ?>
                        <iframe class="iframedesign" src="<?php echo IFRAME_URL."".GOAL_CODE;?>" width="100%"
                            height="400px" style="border: 0px;"></iframe>
                        <?php
                                                                                    
                                                                                }else{
                                                                                    ?>
                        <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="400"
                            style="border: 0px;"></iframe>
                        <?php

                                                                                }
                                                                                ?>
                        <!-- <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe> -->
                        <!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL;
                                                            echo GOAL_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
                        <div class="cricket20ballpopup goal-result" style="display : none;"><img
                                src="/storage/img/soccer-ball.png" style="height: 250px;"><span
                                id="ball_run">asFGsdgsdfg</span></div>
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

                                                .rules-section .pl-4 {
                                                    padding-left: 1.5rem !important;
                                                }

                                                .rules-section .pr-4 {
                                                    padding-right: 1.5rem !important;
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
                                                    <h6 class="rules-highlight">1. Objective</h6>
                                                    <p>The goal of this game is to predict which player or method will
                                                        result in the next goal, providing players with exciting
                                                        opportunities to win big.</p>
                                                </div>
                                                <br>
                                            </div>
                                            <div>
                                                <div class="rules-section">
                                                    <h6 class="rules-highlight">2. Betting Options</h6>
                                                    <ul class="pl-2 pr-2 ">
                                                        <li>
                                                            <h7 class="rules-sub-highlight">1.Who Will Goal Next?</h7>
                                                            <ul class="pl-4 pr-4 list-style">
                                                                <li><b>Description:</b> Predict which player (from the
                                                                    available player selection) will score the next
                                                                    goal.</li>
                                                                <li><b>Winning Criteria:</b> If the selected player
                                                                    scores the next goal, the bet is won.</li>
                                                                <li><b>No Goal Condition:</b> If no goal is scored by
                                                                    any player (i.e., the shot is missed or saved), the
                                                                    bet is considered a No Goal.</li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <h7 class="rules-sub-highlight">2. Method of the Next Goal
                                                            </h7>
                                                            <ul class="pl-4 pr-4 list-style">
                                                                <li><b>Description:</b> Predict the method by which the
                                                                    next goal will be scored. The following options are
                                                                    available:
                                                                    <ul class="pl-4 pr-4 list-style">
                                                                        <li><b>Header Goal:</b> The goal scorer must use
                                                                            their head to score. The last touch on the
                                                                            ball before entering the net must be from
                                                                            the head.</li>
                                                                        <li><b>Free-kick Goal:</b> The goal must be
                                                                            scored directly from a free-kick, meaning no
                                                                            additional touches are allowed before the
                                                                            ball crosses the goal line.</li>
                                                                        <li><b>Penalty Goal:</b> The goal must be scored
                                                                            from a penalty, and the penalty taker must
                                                                            be the one who scores.</li>
                                                                        <li><b>Shot Goal:</b> This includes all other
                                                                            types of goals that are not covered by the
                                                                            above categories, including shots from open
                                                                            play, volleys, or any other direct goals.
                                                                        </li>
                                                                    </ul>
                                                                </li>

                                                                <li><b>Winning Criteria:</b> If the goal is scored by
                                                                    the method selected, the bet is won.</li>
                                                                <li><b>No Goal Condition:</b> If the goal attempt fails
                                                                    or is blocked, the bet is considered a No Goal.</li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <br>
                                            </div>
                                            <div>
                                                <div class="rules-section">
                                                    <h6 class="rules-highlight">3. General Rules</h6>
                                                    <p><b>No Goal Condition:</b> In all instances, if no goal is scored
                                                        (due to a miss, save, or other reasons), the bet will be marked
                                                        as a No Goal.</p>
                                                    <p><b>Goal Misses or Saved Shots:</b> If a player misses or the shot
                                                        is saved, bets placed on that player or method will be settled
                                                        as No Goal.</p>
                                                    <p><b>Broadcast Delays:</b> Please note that the video feeds used to
                                                        confirm goal outcomes may come from different broadcasters,
                                                        which can result in a delay in updating the scoreboard. However,
                                                        the final result will be determined by our official rules and
                                                        the video evidence available at the time.</p>
                                                </div>
                                                <br>
                                            </div>
                                            <div>
                                                <div class="rules-section">
                                                    <h6 class="rules-highlight">4. Disclaimers</h6>
                                                    <p><b>Official Decision:</b> In case of any disputes regarding the
                                                        goal, the casino’s decision based on video reviews will be
                                                        final.</p>
                                                    <p><b>Video Evidence:</b> The casino reserves the right to use
                                                        available video footage to confirm whether a goal was scored by
                                                        the chosen player or method. If the footage is inconclusive, the
                                                        bet may be voided and refunded.</p>
                                                </div>
                                                <br>
                                            </div>
                                            <div>
                                                <div class="rules-section">
                                                    <h6 class="rules-highlight">5. Terms of Participation</h6>
                                                    <p>All players must be aware of the potential delay in goal
                                                        announcements due to broadcast lag.</p>
                                                    <p>Players accept that the casino's decision is final in the event
                                                        of any discrepancies.</p>
                                                    <br>
                                                    <p class="text-center"><b>"Best of luck! Enjoy the excitement of the
                                                            casino and win BIG!"</b></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--  <div data-v-73ba2763="" class="ball-by-ball-popup" style="display:none;"><img data-v-73ba2763="" src="/storage/img/ball-blank.png"> <span data-v-73ba2763="">0 Run</span></div> -->
                
                <div class="casino-detail detail-page-container position-relative">
                    <div class="game-market market-6">
                        <div class="market-title">Who Will Goal Next?</div>
                        <div class="market-header row">
                            <div class="col-12 col-md-12 d-none d-md-block">
                                <div class="market-row">
                                    <div class="market-nation-detail"></div>
                                    <div class="market-odd-box back"><b>Back</b></div>
                                </div>
                            </div>
                        </div>
                        <div class="market-body row">
                            <?
                                                    $sid_list = array(
                                                        "Cristiano Ronaldo" => 1,
                                                        "Lionel Messi" => 2,
                                                        "Robert Lewandowski" => 3,
                                                        "Neymar" => 4,
                                                        "Harry Kane" => 5,
                                                        "Zlatan Ibrahimovic" => 6,
                                                        "Romelu Lukaku" => 7,
                                                        "Kylian Mbappe" => 8,
                                                        "Erling Haaland" => 9,
                                                        "No Goal" => 10,
                                                    );
                                                    foreach ($sid_list as $key => $val) {
                                                    ?>
                            <div class="col-12 col-md-12">
                                <div class="fancy-market">
                                    <div class="market-row">
                                        <div class="market-nation-detail">
                                            <span class="market-nation-name pointer">
                                                <? echo $key; ?>
                                            </span>
                                            <p style="color: black;"
                                                class="market_<? echo $val; ?>_b_exposure market_exposure">0</p>
                                        </div>
                                        <div class=" blb-box">
                                            <div class="market-odd-box back market_<? echo $val; ?>_b_btn"><span
                                                    class="market-odd">-</span></div>
                                        </div>
                                        <div class="fancy-min-max-box">
                                            <div class="fancy-min-max"><span
                                                    class="w-100 d-block min-max market_<? echo $val; ?>_min_max">
                                                </span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?
                                                    }
                                                    ?>

                        </div>
                    </div>
                    <div class="game-market market-6">
                        <div class="market-title">Method Of Next Goal</div>
                        <div class="market-header row">
                            <div class="col-12 col-md-12 d-none d-md-block">
                                <div class="market-row">
                                    <div class="market-nation-detail"></div>
                                    <div class="market-odd-box back"><b>Back</b></div>
                                </div>
                            </div>
                            <div class="fancy-min-max-box"></div>
                        </div>
                        <div class="market-body row">
                            <?
                                                    $sid_list = array(
                                                        "Shot Goal" => 11,
                                                        "Header Goal" => 12,
                                                        "Penalty Goal" => 13,
                                                        "Free Kick Goal" => 14,
                                                        "No Goal" => 15,
                                                    );
                                                    foreach ($sid_list as $key => $val) {
                                                    ?>
                            <div class="col-12 col-md-12">
                                <div class="fancy-market">
                                    <div class="market-row">
                                        <div class="market-nation-detail">
                                            <span class="market-nation-name pointer">
                                                <? echo $key; ?>
                                            </span>
                                            <p style="color: black;"
                                                class="market_<? echo $val; ?>_b_exposure market_exposure">0</p>
                                        </div>
                                        <div class=" blb-box">
                                            <div class="market-odd-box back market_<? echo $val; ?>_b_btn "><span
                                                    class="market-odd">-</span></div>
                                        </div>
                                        <div class="fancy-min-max-box">
                                            <div class="fancy-min-max"><span
                                                    class="w-100 d-block min-max market_<? echo $val; ?>_min_max">
                                                </span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?
                                                    }
                                                    ?>
                        </div>
                    </div>
                    <div class="mt-1 casino-remark-div">

                        <marquee class="casino-remark" scrollamount="3">Results are based on stream&nbsp;only</marquee>
                    </div>
                    <div class="casino-last-result-title"><span>Last Result</span><span><a
                                href="<?php echo MASTER_URL; ?>/reports/casino-results?q=goal">View All</a></span></div>
                    <div class="casino-last-results" id="last-result">
                        <!-- <span class="result result-b">B</span><span class="result result-b">B</span><span class="result result-a">A</span><span class="result result-b">B</span><span class="result result-b">B</span><span class="result result-a">A</span><span class="result result-b">B</span><span class="result result-a">A</span><span class="result result-a">A</span><span class="result result-a">A</span> -->
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
                            <span>MY BETS</span>
                            <!-- <a class="nav-link active "  href="#matched-bet"><span>My Bets</span> </a> -->
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
                <h4 class="modal-title">View More Bet</h4>
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
                <h4 class="modal-title">Goal Result</h4>
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
                <h4 class="modal-title">View More Bet</h4>
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
var markettype = "GOAL";
var markettype_2 = markettype;
var back_html = "";
var lay_html = "";
var gstatus = "";
var data6;
var last_result_id = '0';

function websocket(type) {
    socket = io.connect(websocketurl, {
        transports: ['websocket']
    });
    socket.on('connect', function() {
        socket.emit('Room', 'goal');
    });


    socket.on('gameIframe', function(data) {
        $("#casinoIframe").attr('src', data);
    });

    socket.on('game', function(data) {
        console.log("game=", data);
        var data = data;
        if (data && data['t1'] && data['t1']['mid']) {
            data['t1'][0] = data['t1'];
        }
        if (data && data['t1'] && data['t1'][0]) {
            if (data.t1[0].rdesc != "") {
                $("#ball_run").text(data.t1[0].rdesc);
                $(".cricket20ballpopup").show();
            } else {
                $("#ball_run").html("");
                $(".cricket20ballpopup").hide();
            }
            if (oldGameId != data.t1[0].mid && data.t1[0].mid != 0 && data.t1[0].mid != "0") {
                // setTimeout(function() {
                //     clearCards();
                // }, <?php echo CASINO_RESULT_TIMEOUT; ?>);
            }
            oldGameId = data.t1[0].mid;
            if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                $(".casino-remark").text(data.t1[0].remark);
            }
            clock.setValue(data.t1[0].lt);
            $(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid);
            /*  $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]); */
            eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid;

            for (var j in data['t1'][0]['sub']) {
                selectionid = parseInt(data['t1'][0]['sub'][j].sid);
                runner = data['t1'][0]['sub'][j].nat || data['t1'][0]['sub'][j].nation || data['t1'][0]['sub'][
                    j
                ].nat || data['t1'][0]['sub'][j].nation;
                b1 = data['t1'][0]['sub'][j].b;
                bs1 = data['t1'][0]['sub'][j].bs;
                l1 = data['t1'][0]['sub'][j].l;
                ls1 = data['t1'][0]['sub'][j].ls;

                b11 = b1;
                markettype = "GOAL";

                b1 = b1 == 0 ? "" : b1;

                bs1 = bs1 / 1000;
                bs1 = bs1 == 0 ? "" : bs1;


                l1 = l1 == 0 ? "" : l1;
                ls1 = ls1 == 0 ? "" : ls1;


                /* back_html = '<span class="odd d-block">' + b1 + '</span><span class="d-block">' + bs1 + '</span>'; */
                back_html = '<div class="market-odd-box"><span class="market-odd">' + b1 +
                    '</span><span class="market-volume">' + bs1 + 'k</span></div>';


                $(".market_" + selectionid + "_b_btn").html(back_html);
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



                gstatus = data['t1'][0]['sub'][j].gstatus.toString();
                if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {
                    $(".market_" + selectionid + "_b_btn").attr("data-title", 'suspended-box');
                    $(".market_" + selectionid + "_b_btn").addClass("suspended-box");

                    $(".market_" + selectionid + "_b_btn").removeClass("back-1");
                    $(".market_" + selectionid + "_b_btn").addClass("betting-disabled");
                } else {

                    $(".market_" + selectionid + "_b_btn").removeAttr("data-title");
                    $(".market_" + selectionid + "_b_btn").removeClass("suspended-box");
                    $(".market_" + selectionid + "_b_btn").addClass("back-1");
                    $(".market_" + selectionid + "_b_btn").removeClass("betting-disabled");
                }
                /*  $(".market_" + selectionid + "_b_btn").removeClass("back-1"); */
                min = data['t1'][0]['sub'][j].min.toString();
                max = data['t1'][0]['sub'][j].max;
                max = max / 1000;
                $(".market_" + selectionid + "_min_max").html(`
                                Min:<span>${min}</span><br>Max:<span>${max}K</span>
                        `);
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
    refresh(markettype);


}

function updateResult(data) {
    if (data && data[0]) {
        resultGameLast = data[0].mid;

        if (last_result_id != resultGameLast) {
            last_result_id = resultGameLast;

        }

        html = "";
        var ab = "";
        var ab1 = "";
        casino_type = "'goal'";
        data.forEach((runData) => {
            ab = "R";
            ab1 = "R";


            eventId = runData.mid == 0 ? 0 : runData.mid;
            html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type +
                ')"  class="ball-runs  ' + ab + ' last-result">' + ab1 + '</span>';
        });
        $("#last-result").html(html);
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
        url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/goal/' + event_id,
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
        url: MASTER_URL + '/live-market/goal/active_bets/goal/' + get_round_no(),
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
        url: MASTER_URL + '/live-market/goal/view_more_matched/goal/' + get_round_no(),
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
        url: MASTER_URL + '/live-market/goal/market_analysis/goal/' + get_round_no(),
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