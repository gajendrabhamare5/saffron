<link rel="stylesheet" type="text/css" href="<?php echo MASTER_URL; ?>/assets/css/flipclock.css">

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

.market-2 {
    min-width: calc(33.33% - 8px);
    max-width: calc(100% - 8px);
    margin-left: 4px;
    margin-right: 4px;
    flex: 1;
    width: calc(50% - 8px);
}

.market-title {
    background-color: #2c3e50d9;
    color: #ffffff;
    padding: 8px 10px;
    font-size: 15px;
    font-weight: bold;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.market-title span {
    display: inline-block;
    max-width: calc(100% - 30px);
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
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

.market-nation-detail {
    width: calc(100% - 480px);
    display: flex;
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

.market-2 .market-nation-detail {
    width: calc(100% - 160px);
}

.market-2 .market-nation-detail {
    width: calc(100% - 110px);
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

.market-header .market-nation-detail .market-nation-name {
    font-size: 12px;
    color: #097c93;
    font-weight: bold;
}

.back {
    background-color: #72bbef !important;
}

.lay {
    background-color: #faa9ba !important;
}

.market-odd-box {
    width: 80px;
    padding: 2px 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    border-left: 1px solid #c7c8ca;
    cursor: pointer;
    min-height: 44px;
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

.market-row {
    background-color: #f2f2f2;
    display: flex;
    flex-wrap: wrap;
}

.market-nation-book {
    display: flex;
    flex-wrap: wrap;
    width: 100%;
    justify-content: space-between;
}

.market-odd-box .market-odd {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 3px;
    line-height: 1;
}

.market-odd-box .market-odd {
    font-size: 16px;
}

.market-odd-box .market-volume {
    font-size: 12px;
    font-weight: 100;
    line-height: 1;
}

.market-6 {
    min-width: calc(100% - 8px);
    max-width: calc(100% - 8px);
    margin-left: 4px;
    margin-right: 4px;
    flex: 1;
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

.col-md-12 {
    flex: 0 0 auto;
    width: 100%;
}

.row.row10 {
    margin-left: -10px;
    margin-right: -10px;
}

.market-6 .market-nation-detail {
    width: calc(100% - 240px);
    position: relative;
}

.market-6 .market-nation-detail {
    width: calc(100% - 165px);
}

.fancy-min-max-box {
    width: 80px;
    padding: 0 5px;
    text-align: right;
}

.fancy-min-max-box {
    width: 55px;
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

.fancy-min-max {
    font-size: 12px;
    font-weight: bold;
    color: #097c93;
    word-break: break-all;
}

.fancy-min-max {
    font-size: 9px;
}

.casino-last-result-title {
    padding: 10px;
    background-color: var(--theme2-bg70);
    color: #ffffff;
    font-size: 14px;
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
    width: 100%;
    /* height: 41px; */
    align-items: center;
}

.suspended-row {
    position: relative;
    pointer-events: none;
    cursor: none;
}


.suspended-row::before {
    /* background-image: url(storage/front/img/lock.svg); */
    background-size: 17px 17px;
    filter: invert(1);
    -webkit-filter: invert(1);
    background-repeat: no-repeat;
    content: "";
    position: absolute;
    z-index: 1;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    background-position: center;
    pointer-events: none;
}

.suspended-row::after {
    content: attr(data-title);
    background-color: #373636d6;
    color: #ff0000;
    font-weight: bold;
    font-size: 16px;
    text-transform: uppercase;
    position: absolute;
    position: absolute;
    height: 100%;
    width: 100%;
    right: 0;
    top: 0;
    cursor: not-allowed;
    display: flex;
    justify-content: center;
    align-items: center;
    pointer-events: none;
}

@media only screen and (min-width: 1200px) and (max-width: 1399px) {

    .suspended-row::after,
    .suspended-table::after {
        font-size: 14px;
    }
}

.market-2 .suspended-row::after,
.market-2 .suspended-table::after {
    width: 111px;
}

@media only screen and (min-width: 1200px) and (max-width: 1399px) {

    .market-2 .suspended-row::after,
    .market-2 .suspended-table::after {
        width: 110px;
    }
}

@media only screen and (min-width: 1200px) and (max-width: 1399px) {

    .market-2 .suspended-row::after,
    .market-2 .suspended-table::after {
        width: 110px;
    }
}

.market-6 .suspended-row::after,
.market-6 .suspended-table::after {
    width: 168px;
}

@media only screen and (min-width: 1200px) and (max-width: 1399px) {

    .market-6 .suspended-row::after,
    .market-6 .suspended-table::after {
        /* width: 165px; */
        width: 107px;
        right: 57px;
    }
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

.mt-2 {
    margin-top: .5rem !important;
}

.sidebar-box {
    margin-bottom: 5px;
}

/* .super-over-rule {
        width: 100%;
    } */

.sidebar-title {
    background-color: var(--theme2-bg70);
    color: #ffffff;
    position: relative;
    height: 30px;
}

.sidebar-title h4 {
    padding: 4px;
    font-size: 14px;
    font-weight: bold;
}

/* .super-over-rule h4 {
        background-color: #2c3e50d9;
        color: #ffffff;
        padding: 5px;
    } */

.table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

table {
    caption-side: bottom;
    border-collapse: collapse;
}

.table {
    --bs-table-bg: transparent;
    --bs-table-accent-bg: transparent;
    --bs-table-striped-color: #212529;
    --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
    --bs-table-active-color: #212529;
    --bs-table-active-bg: rgba(0, 0, 0, 0.1);
    --bs-table-hover-color: #212529;
    --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
    vertical-align: top;
    border-color: #dee2e6;
}

.table {
    background-color: #f7f7f7;
    color: #333;
    margin-bottom: 0;
}

tbody,
td,
tfoot,
th,
thead,
tr {
    border-color: inherit;
    border-style: solid;
    border-width: 0;
}

tbody,
td,
tfoot,
th,
thead,
tr {
    border-color: #c7c8ca;
}

.table>thead {
    vertical-align: bottom;
}

tbody,
td,
tfoot,
th,
thead,
tr {
    border-color: inherit;
    border-style: solid;
    border-width: 0;
}

tbody,
td,
tfoot,
th,
thead,
tr {
    border-color: #c7c8ca;
}

.table td {
    font-size: 14px;
}

.table th,
.table td {
    padding: 2px 4px;
    vertical-align: middle;
}

.table td:first-child,
.table th:first-child {
    padding-left: 10px;
}

.table th,
.table td {
    padding: 2px 4px;
    vertical-align: middle;
}

.table tbody tr {
    background-color: #f2f2f2;
}

.text-end {
    text-align: right !important;
}

.super-over-rule img {
    height: 40px;
}

.ms-2 {
    margin-left: .5rem !important;
}

.rules-section img {
    max-width: 300px;
}

.ruless {
    width: 25px;
}

.sidebar-title img {
    width: 25px;
}

.scorecard {
    width: 100%;
    padding: 5px;
    background-image: url(/storage/front/img/scorecard-bg.png);
    position: relative;
    background-repeat: no-repeat;
    background-size: cover;
    color: white;
    background-color: #2e3439;
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
    .ball-runs{
    background-color: #0088cc !important;
}

.ball-runs.six{
    background-color: #883997 !important;
}
.ball-runs.four{
    background-color: #087f23 !important;
}
</style>

<div class="col-md-12 main-container">
    <div class="listing-grid cardj3 casino-grid">
        <div class="coupon-card row">
            <div class="col-md-8 main-content new-casino race">
                <div class="coupon-card">
                    <div class="game-heading">
                        <span class="card-header-title">
                            ENG VS RSA SUPER OVER
                            <!-- <small role="button" class="teenpatti-rules" onclick="view_rules('superover.jpg')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small>  -->
                            <!---->
                        </span>

                        <span class="float-right">
                            Round ID:
                            <span class="round_no">0</span>
                        </span>
                    </div>
                    <div class="scorecard m-b-5" id="scoreboard-box">

                    </div>
                    <div class="video-container">
                        <?php
  							if(!empty(IFRAME_URL_SET)){
                               ?>
                        <iframe class="iframedesign" src="<?php echo IFRAME_URL."".SUPEROVER_CODE;?>" width="100%"
                            height="400px" style="border: 0px;"></iframe>
                        <?php
                                
                            }else{
                                ?>
                        <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="400"
                            style="border: 0px;"></iframe>
                        <?php

                            }
                            ?>
                        <!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL.SUPEROVER_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe>  -->
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
                        <div class="video-overlay">
                            <div><img id="card_c1" style="display:none;" src="storage/front/img/cards/1.png"></div>
                            <div><img id="card_c2" style="display:none;" src="storage/front/img/cards/1.png"></div>
                            <div><img id="card_c3" style="display:none;" src="storage/front/img/cards/1.png"></div>
                            <div><img id="card_c4" style="display:none;" src="storage/front/img/cards/1.png"></div>
                            <div><img id="card_c5" style="display:none;" src="storage/front/img/cards/1.png"></div>
                            <div><img id="card_c6" style="display:none;" src="storage/front/img/cards/1.png"></div>
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
                                                </style>

                                                <div class="rules-section">
                                                    <div>
                                                        <img src="/storage/front/img/rules/superover.jpg"
                                                            class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="casino-detail detail-page-container position-relative">
                        <div class="game-market market-2 ">
                            <div class="market-title"><span>Bookmaker</span></div>
                            <div class="market-header">
                                <div class="market-nation-detail">
                                    <!-- <span class="market-nation-name">Min: 100 Max:  5L</span> -->
                                </div>
                                <div class="market-odd-box back"><b>Back</b></div>
                                <div class="market-odd-box lay"><b>Lay</b></div>
                            </div>
                            <div class="market-body bookmaker-market" data-title="OPEN">
                                <div class="market-row suspended-row market_1_row" data-title="SUSPENDED">
                                    <div class="market-nation-detail">
                                        <span class="market-nation-name">ENG</span>
                                        <div class="market-nation-book market_1_b_exposure market_exposure text-danger"></div>
                                    </div>
                                    <div class="market-odd-box back market_1_b_btn back-1"><span
                                            class="market-odd">-</span><span class="market-volume">0.00</span></div>
                                    <div class="market-odd-box lay market_1_l_btn lay-1"><span
                                            class="market-odd">-</span><span class="market-volume">0.00</span></div>
                                </div>
                                <div class="market-row suspended-row market_2_row" data-title="ACTIVE">
                                    <div class="market-nation-detail">
                                        <span class="market-nation-name">RSA</span>
                                        <div class="market-nation-book market_2_b_exposure market_exposure text-danger"></div>
                                    </div>
                                    <div class="market-odd-box back market_2_b_btn back-1"><span
                                            class="market-odd">1.32</span><span class="market-volume">500000.00</span>
                                    </div>
                                    <div class="market-odd-box lay market_2_l_btn lay-1"><span
                                            class="market-odd">1.35</span><span class="market-volume">500000.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="game-market market-6 fancyMarket bookmaker-market">
                            <div class="market-title"><span>Fancy</span></div>
                            <div class="market-header">
                                <div class="market-nation-detail"></div>
                                <div class="market-odd-box lay"><b>No</b></div>
                                <div class="market-odd-box back"><b>Yes</b></div>
                                <div class="fancy-min-max-box"></div>
                            </div>
                            <div class="market-body fancyTripple" data-title="OPEN">
                                <!-- <div>
							<div class="fancy-market " data-title="ACTIVE">
							<div class="market-row">
								<div class="market-nation-detail">
									<span class="market-nation-name pointer">1 over run bhav ENG</span>
									<div class="market-nation-book"></div>
								</div>
								<div class="market-odd-box lay "><span class="market-odd">13</span><span class="market-volume">716</span></div>
								<div class="market-odd-box back "><span class="market-odd">13</span><span class="market-volume">634</span></div>
								<div class="fancy-min-max-box">
									<div class="fancy-min-max"><span class="w-100 d-block">Min: 100</span><span class="w-100 d-block">Max: 1L</span></div>
								</div>
							</div>
							</div>
						</div>
						<div>
							<div class="fancy-market " data-title="ACTIVE">
							<div class="market-row">
								<div class="market-nation-detail">
									<span class="market-nation-name pointer">1 over run ENG</span>
									<div class="market-nation-book"></div>
								</div>
								<div class="market-odd-box lay "><span class="market-odd">9</span><span class="market-volume">100</span></div>
								<div class="market-odd-box back "><span class="market-odd">9</span><span class="market-volume">88</span></div>
								<div class="fancy-min-max-box">
									<div class="fancy-min-max"><span class="w-100 d-block">Min: 100</span><span class="w-100 d-block">Max: 1L</span></div>
								</div>
							</div>
							</div>
						</div> -->
                            </div>
                        </div>
                        <div class="game-market market-6 fancyMarket1 bookmaker-market">
                            <div class="market-title"><span>Fancy1</span><div class="float-right"><a href="javascript:void(0)" class="btn btn-back">Bet Lock</a></div></div>
                            <div class="row row10">
                                <div class="col-md-12">
                                    <div class="market-header">
                                        <div class="market-nation-detail"></div>
                                        <div class="market-odd-box back"><b>Back</b></div>
                                        <div class="market-odd-box lay"><b>Lay</b></div>
                                        <div class="fancy-min-max-box"></div>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6 d-none d-xl-block">
							<div class="market-header">
							<div class="market-nation-detail"></div>
							<div class="market-odd-box back"><b>Back</b></div>
							<div class="market-odd-box lay"><b>Lay</b></div>
							<div class="fancy-min-max-box"></div>
							</div>
						</div> -->
                            </div>
                            <div class="market-body " data-title="OPEN">
                                <div class="row row10 fancyTripple1">
                                    <!-- <div class="col-md-6">
								<div class="fancy-market suspended-row" data-title="SUSPENDED">
									<div class="market-row">
										<div class="market-nation-detail">
											<span class="market-nation-name">Common Wicket ENG</span>
											<div class="market-nation-book"></div>
										</div>
										<div class="market-odd-box back "><span class="market-odd">-</span></div>
										<div class="market-odd-box lay "><span class="market-odd">-</span></div>
										<div class="fancy-min-max-box">
											<div class="fancy-min-max"><span class="w-100 d-block">Min: 100</span><span class="w-100 d-block">Max: 10K</span></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="fancy-market suspended-row" data-title="SUSPENDED">
									<div class="market-row">
										<div class="market-nation-detail">
											<span class="market-nation-name">Common Boundry ENG</span>
											<div class="market-nation-book"></div>
										</div>
										<div class="market-odd-box back "><span class="market-odd">-</span></div>
										<div class="market-odd-box lay "><span class="market-odd">-</span></div>
										<div class="fancy-min-max-box">
											<div class="fancy-min-max"><span class="w-100 d-block">Min: 100</span><span class="w-100 d-block">Max: 10K</span></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="fancy-market " data-title="ACTIVE">
									<div class="market-row">
										<div class="market-nation-detail">
											<span class="market-nation-name">0.5 Over Wicket ENG</span>
											<div class="market-nation-book"></div>
										</div>
										<div class="market-odd-box back "><span class="market-odd">5.94</span><span class="market-volume">100</span></div>
										<div class="market-odd-box lay "><span class="market-odd">-</span></div>
										<div class="fancy-min-max-box">
											<div class="fancy-min-max"><span class="w-100 d-block">Min: 100</span><span class="w-100 d-block">Max: 10K</span></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="fancy-market " data-title="ACTIVE">
									<div class="market-row">
										<div class="market-nation-detail">
											<span class="market-nation-name">0.5 Over Zero ENG</span>
											<div class="market-nation-book"></div>
										</div>
										<div class="market-odd-box back "><span class="market-odd">7.41</span><span class="market-volume">100</span></div>
										<div class="market-odd-box lay "><span class="market-odd">-</span></div>
										<div class="fancy-min-max-box">
											<div class="fancy-min-max"><span class="w-100 d-block">Min: 100</span><span class="w-100 d-block">Max: 10K</span></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="fancy-market " data-title="ACTIVE">
									<div class="market-row">
										<div class="market-nation-detail">
											<span class="market-nation-name">0.5 Over One ENG</span>
											<div class="market-nation-book"></div>
										</div>
										<div class="market-odd-box back "><span class="market-odd">9.86</span><span class="market-volume">100</span></div>
										<div class="market-odd-box lay "><span class="market-odd">-</span></div>
										<div class="fancy-min-max-box">
											<div class="fancy-min-max"><span class="w-100 d-block">Min: 100</span><span class="w-100 d-block">Max: 10K</span></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="fancy-market " data-title="ACTIVE">
									<div class="market-row">
										<div class="market-nation-detail">
											<span class="market-nation-name">0.5 Over Two ENG</span>
											<div class="market-nation-book"></div>
										</div>
										<div class="market-odd-box back "><span class="market-odd">7.41</span><span class="market-volume">100</span></div>
										<div class="market-odd-box lay "><span class="market-odd">-</span></div>
										<div class="fancy-min-max-box">
											<div class="fancy-min-max"><span class="w-100 d-block">Min: 100</span><span class="w-100 d-block">Max: 10K</span></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="fancy-market " data-title="ACTIVE">
									<div class="market-row">
										<div class="market-nation-detail">
											<span class="market-nation-name">0.5 Over Three ENG</span>
											<div class="market-nation-book"></div>
										</div>
										<div class="market-odd-box back "><span class="market-odd">5.94</span><span class="market-volume">100</span></div>
										<div class="market-odd-box lay "><span class="market-odd">-</span></div>
										<div class="fancy-min-max-box">
											<div class="fancy-min-max"><span class="w-100 d-block">Min: 100</span><span class="w-100 d-block">Max: 10K</span></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="fancy-market " data-title="ACTIVE">
									<div class="market-row">
										<div class="market-nation-detail">
											<span class="market-nation-name">0.5 Over Boundry ENG</span>
											<div class="market-nation-book"></div>
										</div>
										<div class="market-odd-box back "><span class="market-odd">3</span><span class="market-volume">100</span></div>
										<div class="market-odd-box lay "><span class="market-odd">-</span></div>
										<div class="fancy-min-max-box">
											<div class="fancy-min-max"><span class="w-100 d-block">Min: 100</span><span class="w-100 d-block">Max: 10K</span></div>
										</div>
									</div>
								</div>
							</div> -->
                                </div>
                            </div>
                        </div>
                        <div class="casino-last-result-title"><span>Last Result</span><span><a
                                    href="<?php echo MASTER_URL; ?>/reports/casino-results?q=superover">View
                                    All</a></span></div>
                        <div class="casino-last-results" id="last-result">
                            <!-- <span class="result result-a">E</span><span class="result result-a">E</span><span class="result result-a">E</span><span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-a">E</span><span class="result result-b">R</span><span class="result result-a">E</span><span class="result result-a">E</span><span class="result result-b">R</span> -->
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4 sidebar-right" id="sidebar-right">
                <div class="card m-b-10 " style="margin-bottom: 0px;">
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
                    <div class="cc-rules">
                        <div class="sidebar-title">
                            <h4>ENG vs RSA Inning's Card Rules</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Cards</th>
                                        <th class="text-center">Count</th>
                                        <th class="text-end">Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="https://versionobj.ecoassetsservice.com/v36/static/front/img/superover/cards/cardA.png"
                                                class="ruless"><span class="ms-2">X</span></td>
                                        <td class="text-center">5</td>
                                        <td class="text-end"><img
                                                src="https://versionobj.ecoassetsservice.com/v36/static/front/img/superover/balls/ball1.png"
                                                class="ruless"></td>
                                    </tr>
                                    <tr>
                                        <td><img src="https://versionobj.ecoassetsservice.com/v36/static/front/img/superover/cards/card2.png"
                                                class="ruless"><span class="ms-2">X</span></td>
                                        <td class="text-center">5</td>
                                        <td class="text-end"><img
                                                src="https://versionobj.ecoassetsservice.com/v36/static/front/img/superover/balls/ball2.png"
                                                class="ruless"></td>
                                    </tr>
                                    <tr>
                                        <td><img src="https://versionobj.ecoassetsservice.com/v36/static/front/img/superover/cards/card3.png"
                                                class="ruless"><span class="ms-2">X</span></td>
                                        <td class="text-center">5</td>
                                        <td class="text-end"><img
                                                src="https://versionobj.ecoassetsservice.com/v36/static/front/img/superover/balls/ball3.png"
                                                class="ruless"></td>
                                    </tr>
                                    <tr>
                                        <td><img src="https://versionobj.ecoassetsservice.com/v36/static/front/img/superover/cards/card4.png"
                                                class="ruless"><span class="ms-2">X</span></td>
                                        <td class="text-center">5</td>
                                        <td class="text-end"><img
                                                src="https://versionobj.ecoassetsservice.com/v36/static/front/img/superover/balls/ball4.png"
                                                class="ruless"></td>
                                    </tr>
                                    <tr>
                                        <td><img src="https://versionobj.ecoassetsservice.com/v36/static/front/img/superover/cards/card6.png"
                                                class="ruless"><span class="ms-2">X</span></td>
                                        <td class="text-center">5</td>
                                        <td class="text-end"><img
                                                src="https://versionobj.ecoassetsservice.com/v36/static/front/img/superover/balls/ball6.png"
                                                class="ruless"></td>
                                    </tr>
                                    <tr>
                                        <td><img src="https://versionobj.ecoassetsservice.com/v36/static/front/img/superover/cards/card10.png"
                                                class="ruless"><span class="ms-2">X</span></td>
                                        <td class="text-center">5</td>
                                        <td class="text-end"><img
                                                src="https://versionobj.ecoassetsservice.com/v36/static/front/img/superover/balls/ball0.png"
                                                class="ruless"></td>
                                    </tr>
                                    <tr>
                                        <td><img src="https://versionobj.ecoassetsservice.com/v36/static/front/img/superover/cards/cardK.png"
                                                class="ruless"><span class="ms-2">X</span></td>
                                        <td class="text-center">5</td>
                                        <td class="text-end"><span>Wicket</span><img
                                                src="https://versionobj.ecoassetsservice.com/v36/static/front/img/superover/balls/wicket.png"
                                                class="ruless"></td>
                                    </tr>
                                </tbody>
                            </table>
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
                        <h4 class="modal-title">Result</h4>
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
                                            <th>Bet Type</th>
                                            <th>Amount</th>
                                            <th>User Rate</th>
                                            <th>Place Date</th>
                                            <th>Match Date</th>
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
                                            <th>Bet Type</th>
                                            <th>Amount</th>
                                            <th>User Rate</th>
                                            <th>Place Date</th>
                                            <th>Match Date</th>
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
    

    /* var won_match=data.spnmessage;
    if(data.isfinished == "1" || won_match.includes('won')){ */
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
var markettype = "SUPER_OVER";
var markettype_2 = markettype;
var back_html = "";
var lay_html = "";
var gstatus = "";
var last_result_id = '0';

function websocket(type) {
    socket = io.connect(websocketurl);
    socket.on('connect', function() {
        socket.emit('Room', 'superover');
    });
    socket.on('liveScoreGameIn', function(args) {
        if (args && args.data) {
            updateScoreBoard(args.data);
        }
    });

    socket.on('gameIframe', function(data) {
        $("#casinoIframe").attr('src', data);
    });
    socket.on('game', function(data) {

       
        if (data && data['t1'] && data['t1'][0]) {
            if (oldGameId != data.t1[0].mid && data.t1[0].mid != 0 && data.t1[0].mid != "0") {

                 setTimeout(function(){
             		clearCards();
                 	},<?php //echo CASINO_RESULT_TIMEOUT; ?>);
            }

            if (oldGameId != data.t1[0].mid) {
                GAME_ID = (data.t1[0].mid && typeof data.t1[0].mid == "string") ? data.t1[0].mid.split('.')[1] :
                    data.t1[0].mid;
                scoreboardConnect();
            }
            oldGameId = data.t1[0].mid;
            if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                $(".casino-remark").text(data.t1[0].remark);
                var desc = data.t1[0].desc;

                if (data.t1[0].C1 != 1) {
                    $("#card_c1").attr("src", site_url + "storage/front/img/cards/superover/" + data.t1[0].C1 +
                        ".png");
                    $("#card_c1").show();
                }
                if (data.t1[0].C2 != 1) {
                    $("#card_c2").attr("src", site_url + "storage/front/img/cards/superover/" + data.t1[0].C2 +
                        ".png");
                    $("#card_c2").show();
                }
                if (data.t1[0].C3 != 1) {
                    $("#card_c3").attr("src", site_url + "storage/front/img/cards/superover/" + data.t1[0].C3 +
                        ".png");
                    $("#card_c3").show();
                }
                if (data.t1[0].C4 != 1) {
                    $("#card_c4").attr("src", site_url + "storage/front/img/cards/superover/" + data.t1[0].C4 +
                        ".png");
                    $("#card_c4").show();
                }
                if (data.t1[0].C5 != 1) {
                    $("#card_c5").attr("src", site_url + "storage/front/img/cards/superover/" + data.t1[0].C5 +
                        ".png");
                    $("#card_c5").show();
                }
                if (data.t1[0].C6 != 1) {
                    $("#card_c6").attr("src", site_url + "storage/front/img/cards/superover/" + data.t1[0].C6 +
                        ".png");
                    $("#card_c6").show();
                }


            }
            clock.setValue(data.t1[0].autotime);
            $(".round_no").text(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid
                .split(".")[1] : data.t1[0].mid);
            $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0]
                .mid.split(".")[1] : data.t1[0].mid);
            eventId = data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[
                1] : data.t1[0].mid;

            for (var j in data['t2']) {
                selectionid = parseInt(data['t2'][j].sid);
                runner = data['t2'][j].nat || data['t2'][j].nation;
                b1 = data['t2'][j].b1;
                bs1 = data['t2'][j].bs1;
                l1 = data['t2'][j].l1;
                ls1 = data['t2'][j].ls1;

                b11 = b1;
                markettype = "SUPER_OVER";

                b1 = b1 == 0 ? "-" : b1;
                bs1 = bs1 == 0 ? "" : bs1;
                bs1 = bs1 / 1000;
                l1 = l1 == 0 ? "-" : l1;
                ls1 = ls1 == 0 ? "" : ls1;
                ls1 = ls1 / 1000;


                back_html = '<span class="market-odd d-block">' + b1 +
                    '</span><span class="market-volumn d-block">' + bs1 + 'k</span>';


                $(".market_" + selectionid + "_b_btn").html(back_html);

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


                lay_html = '<span class="market-odd d-block">' + l1 +
                    '</span><span class="market-volumn d-block">' + ls1 + 'k</span>';


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
                $(".market_" + selectionid + "_l_btn").html(lay_html);

                gstatus = data['t2'][j].status.toString();
                if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {
                    $(".market_" + selectionid + "_row").attr("data-title", 'SUSPENDED');
                    $(".market_" + selectionid + "_row").addClass("suspended-row");

                    $(".market_" + selectionid + "_b_btn").removeClass("back-1");
                    $(".market_" + selectionid + "_b_btn").addClass("betting-disabled");
                    $(".market_" + selectionid + "_l_btn").removeClass("lay-1");
                    $(".market_" + selectionid + "_l_btn").addClass("betting-disabled");
                } else {

                    $(".market_" + selectionid + "_row").removeAttr("data-title");
                    $(".market_" + selectionid + "_row").removeClass("suspended-row");
                    $(".market_" + selectionid + "_b_btn").addClass("back-1");
                    $(".market_" + selectionid + "_b_btn").removeClass("betting-disabled");
                    $(".market_" + selectionid + "_l_btn").addClass("lay-1");
                    $(".market_" + selectionid + "_l_btn").removeClass("betting-disabled");
                }
            }



            if (data['t3'] != null) {

                var fancy_data = '';
                for (var f in data['t3']) {
                    selectionid = parseInt(data['t3'][f].sid);
                    runner = data['t3'][f].nat;
                    b1 = data['t3'][f].b1;
                    bs1 = data['t3'][f].bs1;
                    l1 = data['t3'][f].l1;
                    ls1 = data['t3'][f].ls1;

                    b1 = b1 == 0 ? "-" : parseFloat(b1);
                    bs1 = bs1 == 0 ? "" : parseInt(bs1);

                    l1 = l1 == 0 ? "-" : parseFloat(l1);
                    ls1 = ls1 == 0 ? "" : parseInt(ls1);


                    is_suspended = '';
                    is_suspended_title = '';
                    gstatus = data['t3'][f].status.toString();
                    if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {
                        is_suspended = 'suspended-row';
                        is_suspended_title = 'SUSPENDED';
                    }



                    back_html = '<span class="market-odd d-block">' + b1 +
                        '</span><span class="market-volumn">' + bs1 + '</span>';
                    lay_html = '<span class="market-odd d-block">' + l1 +
                        '</span><span class="market-volumn">' + ls1 + '</span>';

                    if ($("#five_fancy_" + selectionid).length) {


                        $(".market_" + selectionid + "_b_btn").html(back_html);
                        $(".market_" + selectionid + "_b_btn").attr("side", "Back");
                        $(".market_" + selectionid + "_b_btn").attr("selectionid", selectionid);
                        $(".market_" + selectionid + "_b_btn").attr("marketid", selectionid);
                        $(".market_" + selectionid + "_b_btn").attr("runner", runner);
                        $(".market_" + selectionid + "_b_btn").attr("marketname", runner);
                        $(".market_" + selectionid + "_b_btn").attr("eventid", eventId);
                        $(".market_" + selectionid + "_b_btn").attr("markettype", markettype);
                        $(".market_" + selectionid + "_b_btn").attr("event_name", markettype);
                        $(".market_" + selectionid + "_b_btn").attr("fullmarketodds", b1);
                        $(".market_" + selectionid + "_b_btn").attr("fullfancymarketrate", bs1);

                        $(".market_" + selectionid + "_l_btn").attr("side", "Lay");
                        $(".market_" + selectionid + "_l_btn").attr("selectionid", selectionid);
                        $(".market_" + selectionid + "_l_btn").attr("marketid", selectionid);
                        $(".market_" + selectionid + "_l_btn").attr("runner", runner);
                        $(".market_" + selectionid + "_l_btn").attr("marketname", runner);
                        $(".market_" + selectionid + "_l_btn").attr("eventid", eventId);
                        $(".market_" + selectionid + "_l_btn").attr("markettype", markettype);
                        $(".market_" + selectionid + "_l_btn").attr("event_name", markettype);
                        $(".market_" + selectionid + "_l_btn").attr("fullmarketodds", l1);
                        $(".market_" + selectionid + "_l_btn").attr("fullfancymarketrate", ls1);
                        $(".market_" + selectionid + "_l_btn").html(lay_html);

                        if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {
                            $(".market_" + selectionid + "_row").attr("data-title", 'SUSPENDED');
                            $(".market_" + selectionid + "_row").addClass("suspended-row");

                            $(".market_" + selectionid + "_b_btn").removeClass("back-1");
                            $(".market_" + selectionid + "_b_btn").addClass("betting-disabled");
                            $(".market_" + selectionid + "_l_btn").removeClass("lay-1");
                            $(".market_" + selectionid + "_l_btn").addClass("betting-disabled");
                        } else {

                            $(".market_" + selectionid + "_row").removeAttr("data-title");
                            $(".market_" + selectionid + "_row").removeClass("suspended-row");
                            $(".market_" + selectionid + "_b_btn").addClass("back-1");
                            $(".market_" + selectionid + "_b_btn").removeClass("betting-disabled");
                            $(".market_" + selectionid + "_l_btn").addClass("lay-1");
                            $(".market_" + selectionid + "_l_btn").removeClass("betting-disabled");
                        }
                    } else {

                        /* fancy_data += '	<div id="five_fancy_'+selectionid+'" data-title="'+is_suspended+'" class="table-row '+is_suspended+' market_'+selectionid+'_row">';
                        fancy_data += '		<div class="float-left country-name box-6" style="border-bottom: 0px;">';
                        fancy_data += '  		<p class="m-b-0"><a href="javascript:void(0)">'+runner+'</a></p>';
                        fancy_data += '				<p class="m-b-0"><span style="color: black;" class="market_'+selectionid+'_b_exposure market_exposure">0</span></p>';
                        fancy_data += '		</div>';
                        
                        
                        fancy_data += '     <div class="box-1 back float-left text-center betting-disabled market_'+selectionid+'_b_btn back-1">'+back_html+'</div>';
                        fancy_data += '		<div class="box-1 lay float-left text-center betting-disabled market_'+selectionid+'_l_btn lay-1">'+lay_html+'</div>';
                        fancy_data += '		<div class="box-2 float-left text-right min-max" style="border-bottom: 0px;"></div>';
                        fancy_data += '	</div>'; */
                        fancy_data += `
								<div id="five_fancy_${selectionid}'" data-title="${is_suspended_title}" class="fancy-market ${is_suspended} market_${selectionid}_row">
								<div class="market-row">
									<div class="market-nation-detail">
										<span class="market-nation-name pointer">${runner}</span>
										<div class="market-nation-book market_${selectionid}_b_exposure market_exposure"></div>
									</div>
									<div class="market-odd-box lay market_${selectionid}_l_btn lay-1" side="Lay" selectionid="${selectionid}" marketid="${selectionid}" runner="${runner}" marketname="${runner}" eventid="${eventId}" markettype="${markettype}" event_name="${markettype}" fullmarketodds="${l1}" fullfancymarketrate="${l1}">${lay_html}</div>
									<div class="market-odd-box back market_${selectionid}_b_btn back-1" side="Back" selectionid="${selectionid}" marketid="${selectionid}" runner="${runner}" marketname="${runner}" eventid="${eventId}" markettype="${markettype}" event_name="${markettype}" fullmarketodds="${b1}" fullfancymarketrate="${b1}">${back_html}</div>
									
								</div>
								</div>
							`;
                    }
                    // <div class="fancy-min-max-box">
                    // 				<div class="fancy-min-max"><span class="w-100 d-block">Min: 100</span><span class="w-100 d-block">Max: 1L</span></div>
                    // 			</div>



                    $(".fancyMarket").show();
                }

                if (fancy_data != "") {
                    $(".fancyTripple").html(fancy_data);
                }
            } else {
                $(".fancyTripple").html("");
                $(".fancyMarket").hide();
            }

            if (data['t4'] != null) {
                var fancy_data = '';
                for (var f in data['t4']) {
                    selectionid = parseInt(data['t4'][f].sid);
                    runner = data['t4'][f].nat;
                    b1 = data['t4'][f].b1;
                    bs1 = data['t4'][f].bs1;
                    l1 = data['t4'][f].l1;
                    ls1 = data['t4'][f].ls1;

                    b1 = b1 == 0 ? "-" : parseFloat(b1);
                    bs1 = bs1 == 0 ? "" : parseInt(bs1);

                    l1 = l1 == 0 ? "-" : parseFloat(l1);
                    ls1 = ls1 == 0 ? "" : parseInt(ls1);


                    is_suspended = '';
                    is_suspended_title = '';
                    gstatus = data['t4'][f].status.toString();
                    if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {
                        is_suspended = 'suspended-row';
                        is_suspended_title = 'SUSPENDED';
                    }


                    back_html = '<span class="market-odd d-block">' + b1 +
                        '</span><span class="market-volumn">' + bs1 + '</span>';
                    lay_html = '<span class="market-odd d-block">' + l1 +
                        '</span><span class="market-volumn">' + ls1 + '</span>';
                    if (selectionid == 7 || selectionid == 9) {
                        if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {
                            continue;
                        }
                    }
                    if ($("#five_fancy_" + selectionid).length) {
                        $(".market_" + selectionid + "_b_btn").html(back_html);
                        $(".market_" + selectionid + "_b_btn").attr("side", "Back");
                        $(".market_" + selectionid + "_b_btn").attr("selectionid", selectionid);
                        $(".market_" + selectionid + "_b_btn").attr("marketid", selectionid);
                        $(".market_" + selectionid + "_b_btn").attr("runner", runner);
                        $(".market_" + selectionid + "_b_btn").attr("marketname", runner);
                        $(".market_" + selectionid + "_b_btn").attr("eventid", eventId);
                        $(".market_" + selectionid + "_b_btn").attr("markettype", 'FANCY1_ODDS');
                        $(".market_" + selectionid + "_b_btn").attr("event_name", markettype);
                        $(".market_" + selectionid + "_b_btn").attr("fullmarketodds", b1);
                        $(".market_" + selectionid + "_b_btn").attr("fullfancymarketrate", bs1);

                        $(".market_" + selectionid + "_l_btn").attr("side", "Lay");
                        $(".market_" + selectionid + "_l_btn").attr("selectionid", selectionid);
                        $(".market_" + selectionid + "_l_btn").attr("marketid", selectionid);
                        $(".market_" + selectionid + "_l_btn").attr("runner", runner);
                        $(".market_" + selectionid + "_l_btn").attr("marketname", runner);
                        $(".market_" + selectionid + "_l_btn").attr("eventid", eventId);
                        $(".market_" + selectionid + "_l_btn").attr("markettype", 'FANCY1_ODDS');
                        $(".market_" + selectionid + "_l_btn").attr("event_name", markettype);
                        $(".market_" + selectionid + "_l_btn").attr("fullmarketodds", l1);
                        $(".market_" + selectionid + "_l_btn").attr("fullfancymarketrate", ls1);
                        $(".market_" + selectionid + "_l_btn").html(lay_html);

                        if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {
                            $(".market_" + selectionid + "_row").attr("data-title", 'SUSPENDED');
                            $(".market_" + selectionid + "_row").addClass("suspended-row");

                            $(".market_" + selectionid + "_b_btn").removeClass("back-1");
                            $(".market_" + selectionid + "_b_btn").addClass("betting-disabled");
                            $(".market_" + selectionid + "_l_btn").removeClass("lay-1");
                            $(".market_" + selectionid + "_l_btn").addClass("betting-disabled");
                        } else {

                            $(".market_" + selectionid + "_row").removeAttr("data-title");
                            $(".market_" + selectionid + "_row").removeClass("suspended-row");
                            $(".market_" + selectionid + "_b_btn").addClass("back-1");
                            $(".market_" + selectionid + "_b_btn").removeClass("betting-disabled");
                            $(".market_" + selectionid + "_l_btn").addClass("lay-1");
                            $(".market_" + selectionid + "_l_btn").removeClass("betting-disabled");
                        }
                    } else {
                        /* fancy_data += '	<div id="five_fancy_'+selectionid+'" data-title="'+is_suspended+'" class="table-row '+is_suspended+' market_'+selectionid+'_row">';
                        fancy_data += '		<div class="float-left country-name box-6" style="border-bottom: 0px;">';
                        fancy_data += '  		<p class="m-b-0"><a href="javascript:void(0)">'+runner+'</a></p>';
                        fancy_data += '				<p class="m-b-0"><span style="color: black;" class="market_'+selectionid+'_b_exposure market_exposure">0</span></p>';
                        fancy_data += '		</div>';
                        
                        
                        fancy_data += '     <div class="box-1 back float-left text-center betting-disabled market_'+selectionid+'_b_btn back-1">'+back_html+'</div>';
                        fancy_data += '		<div class="box-1 lay float-left text-center betting-disabled market_'+selectionid+'_l_btn lay-1">'+lay_html+'</div>';
                        fancy_data += '		<div class="box-2 float-left text-right min-max" style="border-bottom: 0px;"></div>';
                        fancy_data += '	</div>'; */

                        fancy_data += `<div class="col-md-12"  id="five_fancy_${selectionid}'">
								<div" data-title="${is_suspended_title}" class="fancy-market ${is_suspended} market_${selectionid}_row">
									<div class="market-row">
										<div class="market-nation-detail">
											<span class="market-nation-name">${runner}</span>
											<div class="market-nation-book market_${selectionid}_b_exposure market_exposure"></div>
										</div>
										<div class="market-odd-box back market_${selectionid}_b_btn back-1" side="Back" selectionid="${selectionid}" marketid="${selectionid}" runner="${runner}" marketname="${runner}" eventid="${eventId}" markettype="${markettype}" event_name="${markettype}" fullmarketodds="${b1}" fullfancymarketrate="${b1}">${back_html}</div>
										<div class="market-odd-box lay  market_${selectionid}_l_btn lay-1" side="Lay" selectionid="${selectionid}" marketid="${selectionid}" runner="${runner}" marketname="${runner}" eventid="${eventId}" markettype="${markettype}" event_name="${markettype}" fullmarketodds="${l1}" fullfancymarketrate="${l1}">${lay_html}</div>
										
									</div>
								</div>
								</div>`;
                    }

                    // <div class="fancy-min-max-box">
                    // 					<div class="fancy-min-max"><span class="w-100 d-block">Min: 100</span><span class="w-100 d-block">Max: 10K</span></div>
                    // 				</div>


                    $(".fancyMarket1").show();
                }

                if (fancy_data != "") {
                    $(".fancyTripple1").html(fancy_data);
                }
            } else {
                $(".fancyTripple1").html("");
                $(".fancyMarket1").hide();
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

function teenpatti(type) {
    gameType = type
    websocket();
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
                rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 :
                    parseInt(data[0])
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
                    rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 :
                        parseInt(data[0])
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
                        rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 :
                            parseInt(data[0])
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
                                11 : parseInt(data[0])
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
    $("#card_c1").attr("storage/front/img/cards/1.png");
    $("#card_c2").attr("storage/front/img/cards/1.png");
    $("#card_c3").attr("storage/front/img/cards/1.png");
    $("#card_c4").attr("storage/front/img/cards/1.png");
    $("#card_c5").attr("storage/front/img/cards/1.png");
    $("#card_c6").attr("storage/front/img/cards/1.png");

    $("#card_c1").hide();
    $("#card_c2").hide();
    $("#card_c3").hide();
    $("#card_c4").hide();
    $("#card_c5").hide();
    $("#card_c6").hide();
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
        casino_type = "'superover'";
        data.forEach((runData) => {
            if (parseInt(runData.win) == 1) {
                ab = "result-a";
                ab1 = "E";

            } else if (parseInt(runData.win) == 2) {
                ab = "result-b";
                ab1 = "R";

            } else {
                ab = "resultb";
                ab1 = "T";
            }

            eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] :
                runData.mid;
            html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type +
                ')"  class=" ml-1 ' + ab + ' result">' + ab1 + '</span>';
        });


        $("#last-result").html(html);
        if (oldGameId == 0 || oldGameId == resultGameLast) {

        }
    }
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
            url: MASTER_URL + '/live-market/sports-casino/active_bets/superover/' + get_round_no(),
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
        url: MASTER_URL + '/live-market/sports-casino/view_more_matched/superover/' + get_round_no(),
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
        url: MASTER_URL + '/live-market/sports-casino/market_analysis/superover/' + get_round_no(),
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
        url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/superover/' + event_id,
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