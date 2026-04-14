<link rel="stylesheet" type="text/css" href="<?php echo MASTER_URL; ?>/assets/css/flipclock.css">

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

    .live-poker {
        background: #EEEEEE;
    }

    .w-33 {
        min-width: 33.33% !important;
        width: 33.33% !important;
    }

    .suspended:after {
        width: 66.5%;
    }

    td.suspendedtd:after {
        width: 100%;
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

    .casino-table-header,
    .casino-table-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        border-bottom: 1px solid #ffff;
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

    .casino-table-header .casino-nation-detail {
        font-weight: bold;
        min-height: unset;
    }

    .casino-nation-detail {
        width: 40%;
    }

    .casino-odds-box {
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 5px 0;
        font-weight: bold;
        border-left: 1px solid #ffff;
        cursor: pointer;
        min-height: 46px;
    }

    .casino-table-header .casino-odds-box {
        cursor: unset;
        padding: 2px;
        min-height: unset;
        height: auto !important;
    }

    .casino-odds-box {
        width: 10%;
    }

    .casino-nation-book {
        font-size: 12px;
        font-weight: bold;
        min-height: 18px;
    }

    .flip-card {
        background-color: transparent;
        perspective: 1000px;
        height: 50px;
        width: 40px;
        margin-right: 5px;
    }

    .flip-card {
        height: 35px;
        width: 28px;
    }

    .flip-card:last-child {
        margin-right: 0;
    }

    .flip-card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
    }

    .flip-card-front,
    .flip-card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
    }

    .casino-odds-box img {
        height: 100%;
        width: 100%;
    }

    .flip-card-front,
    .flip-card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
    }

    .flip-card-back {
        transform: rotateY(180deg);
        -webkit-transform: rotateY(180deg);
        -moz-transform: rotateY(180deg);
        -ms-transform: rotateY(180deg);
        -o-transform: rotateY(180deg);
    }

    .flip-card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
    }

    .casino-table-full-box {
        width: 100%;
        /* border-left: 1px solid #c7c8ca;
            border-right: 1px solid #c7c8ca;
            border-top: 1px solid #c7c8ca; */
        background-color: #f2f2f2;
    }

    .casino-nation-name {
        font-size: 16px;
        font-weight: bold;
    }

    .back {
        background-color: #72bbef !important;
    }

    /* .nav {
            display: flex;
            flex-wrap: wrap;
            padding-left: 0;
            margin-bottom: 0;
            list-style: none;
        } */

    /* .nav-tabs {
            border-bottom: 1px solid #dee2e6;
        } */

    /* ul li,
        ol li {
            list-style: none;
        } */

    /* .nav-tabs .nav-item {
            padding: 10px 0;
            flex: auto;
        } */

    /* .casino-page-container .nav-tabs .nav-item {
            flex: unset;
        } */

    /* .nav-link {
            display: block;
            padding: .5rem 1rem;
            color: #0d6efd;
            text-decoration: none;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out;
        } */

    [type=button]:not(:disabled),
    [type=reset]:not(:disabled),
    [type=submit]:not(:disabled),
    button:not(:disabled) {
        cursor: pointer;
    }

    /* .nav-tabs .nav-link {
            margin-bottom: -1px;
            background: 0 0;
            border: 1px solid transparent;
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
        } */

    /* .nav-tabs .nav-link {
            color: #ffffff;
            border: 0;
            border-right: 1px solid #ffffff;
            border-radius: 0;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            -ms-border-radius: 0;
            -o-border-radius: 0;
            padding: 0 8px;
            font-weight: bold;
            text-transform: us;
            position: relative;
            text-align: center;
            text-transform: uppercase;
        } */

    /* .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            color: #495057;
            background-color: #fff;
            border-color: #dee2e6 #dee2e6 #fff;
        } */

    /* .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            color: #ffffff;
            background-color: transparent;
        } */

    .tab-content>.active {
        display: block;
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

    .row.row5 {
        margin-left: -5px;
        margin-right: -5px;
    }

    .col-6 {
        flex: 0 0 auto;
        width: 50%;
    }

    .row.row5>[class*="col-"],
    .row.row5>[class*="col"] {
        padding-left: 5px;
        padding-right: 5px;
    }

    .casino-nation-name img {
        height: 28px;
    }

    .fade {
        transition: opacity .15s linear;
    }

    .fade:not(.show) {
        opacity: 0;
    }

    /* .tab-content>.tab-pane {
            display: none;
        } */

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

    .rules-section img {
        max-width: 300px;
    }

    @media (min-width: 576px) {
        .modal-dialog {
            max-width: 800px !important;
            margin: 1.75rem auto;
        }
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
            <div class="col-md-8 main-content">
                <div class="coupon-card">
                    <div class="game-heading"><span class="card-header-title">Casino War
                            <!-- <small role="button" class="teenpatti-rules"  onclick="view_rules('war-rules.jpg')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small> -->
                            <!---->
                        </span>
                        <!-- <small role="button" class="teenpatti-rules" onclick="view_rules('casino_war')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small> -->
                        <span class="float-right">
                            Round ID:
                            <span class="round_no">0</span></span>
                    </div>
                    <!---->
                    <div class="video-container">
                        <?php
                        if (!empty(IFRAME_URL_SET)) {
                        ?>
                        <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . CASINOWAR_CODE; ?>" width="100%"
                            height="400px" style="border: 0px;"></iframe>
                        <?php

                        } else {
                        ?>
                        <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="400"
                            style="border: 0px;"></iframe>
                        <?php

                        }
                        ?>
                        <!-- <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
										 <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . CASINOWAR_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
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
                            <div class="videoCards">
                                <div>
                                    <!-- <h3 class="text-white">Dealer</h3> -->
                                    <div><img id="card_c7" src="/storage/front/img/cards/1.png"></div>
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
                                                </style>

                                                <div class="rules-section">
                                                    <div>
                                                        <img src="/storage/front/img/rules/war.jpg"
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
                    <div class="casino-detail">
                        <div class="casino-table">
                            <div class="casino-table-header w-100">
                                <div class="casino-nation-detail"></div>
                                <div class="casino-odds-box ">
                                    <div class="flip-card">
                                        <div class="flip-card-inner ">
                                            <div class="flip-card-front"><img id="card_c1"
                                                    src="/storage/front/img/cards_new/1.jpg"></div>
                                            <!-- <div class="flip-card-back"><img id="card_c2" src="/storage/front/img/cards_new/1.jpg"></div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="casino-odds-box ">
                                    <div class="flip-card">
                                        <div class="flip-card-inner ">
                                            <div class="flip-card-front"><img id="card_c2"
                                                    src="/storage/front/img/cards_new/1.jpg"></div>
                                            <!-- <div class="flip-card-back"><img id="card_c4" src="/storage/front/img/cards_new/1.jpg"></div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="casino-odds-box ">
                                    <div class="flip-card">
                                        <div class="flip-card-inner ">
                                            <div class="flip-card-front"><img id="card_c3"
                                                    src="/storage/front/img/cards_new/1.jpg"></div>
                                            <!-- <div class="flip-card-back"><img id="card_c6" src="/storage/front/img/cards_new/1.jpg"></div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="casino-odds-box ">
                                    <div class="flip-card">
                                        <div class="flip-card-inner ">
                                            <div class="flip-card-front"><img id="card_c4"
                                                    src="/storage/front/img/cards_new/1.jpg"></div>
                                            <!-- <div class="flip-card-back"><img src="/storage/front/img/cards_new/1.jpg"></div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="casino-odds-box ">
                                    <div class="flip-card">
                                        <div class="flip-card-inner ">
                                            <div class="flip-card-front"><img id="card_c5"
                                                    src="/storage/front/img/cards/1.jpg"></div>
                                            <!-- <div class="flip-card-back"><img src="/storage/front/img/cards_new/1.jpg"></div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="casino-odds-box ">
                                    <div class="flip-card">
                                        <div class="flip-card-inner ">
                                            <div class="flip-card-front"><img id="card_c6"
                                                    src="/storage/front/img/cards/1.jpg"></div>
                                            <!-- <div class="flip-card-back"><img src="/storage/front/img/cards_new/1.jpg"></div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="casino-table-full-box d-none d-md-block">
                                <div class="casino-table-header">
                                    <div class="casino-nation-detail"></div>
                                    <div class="casino-odds-box ">1</div>
                                    <div class="casino-odds-box ">2</div>
                                    <div class="casino-odds-box ">3</div>
                                    <div class="casino-odds-box ">4</div>
                                    <div class="casino-odds-box ">5</div>
                                    <div class="casino-odds-box ">6</div>
                                </div>
                                <div class="casino-table-body">
                                    <div class="casino-table-row">
                                        <div class="casino-nation-detail">
                                            <div class="casino-nation-name"><span>Winner</span>
                                            <div class="info-block m-t-5" style="position: relative; display: inline-block;left: 210px;">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info0" aria-expanded="false"
                                                            class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                        <div id="min-max-info0" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-1L</span>        
                                                        </div>
                                                    </div>
                                                    </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_1_b_btn market_1_row back-1">
                                            <span class="casino-odds market_1_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_1_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_11_b_btn market_11_row back-1">
                                            <span class="casino-odds market_11_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_11_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_21_b_btn market_21_row back-1">
                                            <span class="casino-odds market_21_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_21_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_31_b_btn market_31_row back-1">
                                            <span class="casino-odds market_31_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_31_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_41_b_btn market_41_row back-1">
                                            <span class="casino-odds market_41_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_41_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_51_b_btn market_51_row back-1">
                                            <span class="casino-odds market_51_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_51_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="casino-table-row">
                                        <div class="casino-nation-detail">
                                            <div class="casino-nation-name"><span class="card-icon ms-1"><span
                                                        class="card-black ">}</span></span><span
                                                    class="card-icon ms-1"><span class="card-black ">]</span></span>
                                                    <div class="info-block m-t-5" style="position: relative; display: inline-block;left: 224px;">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info1" aria-expanded="false"
                                                            class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                        <div id="min-max-info1" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-25k</span>        
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_2_b_btn market_2_row back-1">
                                            <span class="casino-odds market_2_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_2_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_12_b_btn market_12_row back-1">
                                            <span class="casino-odds market_12_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_12_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_22_b_btn market_22_row back-1">
                                            <span class="casino-odds market_22_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_22_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_32_b_btn market_32_row back-1">
                                            <span class="casino-odds market_32_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_32_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_42_b_btn market_42_row back-1">
                                            <span class="casino-odds market_42_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_42_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_52_b_btn market_52_row back-1">
                                            <span class="casino-odds market_52_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_52_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="casino-table-row">
                                        <div class="casino-nation-detail">
                                            <div class="casino-nation-name"><span class="card-icon ms-1"><span
                                                        class="card-red ">{</span></span><span
                                                    class="card-icon ms-1"><span class="card-red ">[</span></span>
                                                <div class="info-block m-t-5" style="position: relative; display: inline-block;left: 224px;">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info2" aria-expanded="false"
                                                            class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                        <div id="min-max-info2" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-25k</span>        
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_3_b_btn market_3_row back-1">
                                            <span class="casino-odds market_3_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_3_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_13_b_btn market_13_row back-1">
                                            <span class="casino-odds market_13_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_13_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_23_b_btn market_23_row back-1">
                                            <span class="casino-odds market_23_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_23_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_33_b_btn market_33_row back-1">
                                            <span class="casino-odds market_33_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_33_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_43_b_btn market_43_row back-1">
                                            <span class="casino-odds market_43_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_43_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_53_b_btn market_53_row back-1">
                                            <span class="casino-odds market_53_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_53_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="casino-table-row">
                                        <div class="casino-nation-detail">
                                            <div class="casino-nation-name"><span>Odds</span>
                                        <div class="info-block m-t-5" style="position: relative; display: inline-block;left: 224px;">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info3" aria-expanded="false"
                                                            class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                        <div id="min-max-info3" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-25k</span>        
                                                        </div>
                                                    </div>
                                        </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_4_b_btn market_4_row back-1">
                                            <span class="casino-odds market_4_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_4_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_14_b_btn market_14_row back-1">
                                            <span class="casino-odds market_14_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_14_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_24_b_btn market_24_row back-1">
                                            <span class="casino-odds market_24_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_24_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_34_b_btn market_34_row back-1">
                                            <span class="casino-odds market_34_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_34_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_44_b_btn market_44_row back-1">
                                            <span class="casino-odds market_44_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_44_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_54_b_btn market_54_row back-1">
                                            <span class="casino-odds market_54_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_54_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="casino-table-row">
                                        <div class="casino-nation-detail">
                                            <div class="casino-nation-name"><span>Even</span>
                                        <div class="info-block m-t-5" style="position: relative; display: inline-block;left: 224px;">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info4" aria-expanded="false"
                                                            class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                        <div id="min-max-info4" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-25k</span>        
                                                        </div>
                                                    </div>
                                        </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_5_b_btn market_5_row back-1">
                                            <span class="casino-odds market_5_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_5_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_15_b_btn market_15_row back-1">
                                            <span class="casino-odds market_15_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_15_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_25_b_btn market_25_row back-1">
                                            <span class="casino-odds market_25_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_25_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_35_b_btn market_35_row back-1">
                                            <span class="casino-odds market_35_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_35_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_45_b_btn market_45_row back-1">
                                            <span class="casino-odds market_45_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_45_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_55_b_btn market_55_row back-1">
                                            <span class="casino-odds market_55_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_55_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="casino-table-row">
                                        <div class="casino-nation-detail">
                                            <div class="casino-nation-name"><img
                                                    src="/storage/front/img/cards/spade.png">
                                                <div class="info-block m-t-5" style="position: relative; display: inline-block;left: 224px;">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info6" aria-expanded="false"
                                                            class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                        <div id="min-max-info6" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-25k</span>        
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_6_b_btn market_6_row back-1">
                                            <span class="casino-odds market_6_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_6_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_16_b_btn market_16_row back-1">
                                            <span class="casino-odds market_16_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_16_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_26_b_btn market_26_row back-1">
                                            <span class="casino-odds market_26_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_26_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_36_b_btn market_36_row back-1">
                                            <span class="casino-odds market_36_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_36_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_46_b_btn market_46_row back-1">
                                            <span class="casino-odds market_46_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_46_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_56_b_btn market_56_row back-1">
                                            <span class="casino-odds market_56_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_56_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="casino-table-row">
                                        <div class="casino-nation-detail">
                                            <div class="casino-nation-name"><img
                                                    src="/storage/front/img/cards/club.png">
                                                <div class="info-block m-t-5" style="position: relative; display: inline-block;left: 224px;">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info7" aria-expanded="false"
                                                            class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                        <div id="min-max-info7" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-25k</span>        
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_7_b_btn market_7_row back-1">
                                            <span class="casino-odds market_7_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_7_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_17_b_btn market_17_row back-1">
                                            <span class="casino-odds market_17_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_17_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_27_b_btn market_27_row back-1">
                                            <span class="casino-odds market_27_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_27_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_37_b_btn market_37_row back-1">
                                            <span class="casino-odds market_37_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_37_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_47_b_btn market_47_row back-1">
                                            <span class="casino-odds market_47_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_47_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_57_b_btn market_57_row back-1">
                                            <span class="casino-odds market_57_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_57_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="casino-table-row">
                                        <div class="casino-nation-detail">
                                            <div class="casino-nation-name"><img
                                                    src="/storage/front/img/cards/heart.png">
                                                <div class="info-block m-t-5" style="position: relative; display: inline-block;left: 224px;">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info8" aria-expanded="false"
                                                            class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                        <div id="min-max-info8" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-25k</span>        
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_8_b_btn market_8_row back-1">
                                            <span class="casino-odds market_8_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_8_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_18_b_btn market_18_row back-1">
                                            <span class="casino-odds market_18_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_18_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_28_b_btn market_28_row back-1">
                                            <span class="casino-odds market_28_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_28_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_38_b_btn market_38_row back-1">
                                            <span class="casino-odds market_38_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_38_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_48_b_btn market_48_row back-1">
                                            <span class="casino-odds market_48_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_48_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_58_b_btn market_58_row back-1">
                                            <span class="casino-odds market_58_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_58_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="casino-table-row">
                                        <div class="casino-nation-detail">
                                            <div class="casino-nation-name"><img
                                                    src="/storage/front/img/cards/diamond.png">
                                                <div class="info-block m-t-5" style="position: relative; display: inline-block;left: 224px;">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info9" aria-expanded="false"
                                                            class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                        <div id="min-max-info9" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-25k</span>        
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_9_b_btn market_9_row back-1">
                                            <span class="casino-odds market_9_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_9_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_19_b_btn market_19_row back-1">
                                            <span class="casino-odds market_19_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_19_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_29_b_btn market_29_row back-1">
                                            <span class="casino-odds market_29_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_29_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_39_b_btn market_39_row back-1">
                                            <span class="casino-odds market_39_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_39_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_49_b_btn market_49_row back-1">
                                            <span class="casino-odds market_49_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_49_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                        <div
                                            class="casino-odds-box back suspended-box market_59_b_btn market_59_row back-1">
                                            <span class="casino-odds market_59_b_value">0</span>
                                            <div
                                                class="casino-nation-book market_59_b_exposure market_exposure text-danger">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="casino-last-result-title"><span>Last Result</span><span><a
                                    href="<?php echo MASTER_URL; ?>/reports/casino-results?q=war">View All</a></span>
                        </div>
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
                                    <span>My Bets</span>
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
        <!-- <div id="modalpokerresult" class="modal fade show" tabindex="-1">
            <div class="modal-dialog " style="min-width: 650px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Casino War Result</h4>
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
        </div> -->
        <div id="modalpokerresult" class="modal fade show" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Casino War Result</h4>
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
                    <!-- <ul class="nav nav-tabs d-inline-block" role="tablist ">
                        <li class="nav-item d-inline-block">
                            <a class="nav-link  active " data-toggle="tab" href="#matched-bet2" id="matchedDataLink">Matched Bets</a>
                        </li>
                        <li class="nav-item d-inline-block">
                            <a class="nav-link " data-toggle="tab" href="#unmatched-bet2" id="unMatchedDataLink">Unmatched Bets</a>
                        </li>
                        <li class="nav-item d-inline-block">
                            <a class="nav-link " data-toggle="tab" href="#deleted-bet2" id="deletedMatchedDataLink">Deleted Bets</a>
                        </li>
                    </ul> -->
                    <div class="tab-content m-t-20">
                        <div id="matched-bet2" class="tab-pane active">
                            <!-- <form method="POST" id="form-view_more_bets">
                                <div class="row form-inline">
                                    <div class="col-md-5">
                                        <div class="form-group m-t-20">
                                            <label for="list-ac" class="d-inline-block">Client Name</label>
                                            <select class="form-control" name="search-client_name" id="search-client_name" id="" style="width: 160px;"></select>
                                        </div>
                                        <div class="form-group m-t-20">
                                            <label class="d-inline-block">IP Address</label>
                                            <input type="text" name="search-ipaddress" id="search-ipaddress" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group m-t-20">
                                            <label class="d-inline-block">Amount</label>
                                            <input type="text" name="search-amount_min" id="search-amount_min" class="form-control" placeholder="Min">
                                            <input type="text" name="search-amount_max" id="search-amount_max" class="form-control m-l-10" placeholder="Max">
                                        </div>
                                        <div class="form-group m-t-20">
                                            <label class="d-inline-block">Type</label>
                                            <select name="search-bettype" class="form-control d-inline-block" id="search-bettype"> 
                                                <option value="">All</option>
                                                <option value="back">Back</option>
                                                <option value="lay">Lay</option>
                                            </select>
                                            <button class="btn btn-back m-l-10" id="btn-search" type="submit">Search</button>
                                            <button type="reset" class="btn btn-back m-l-10" id="btn-view_all_matched">View All</button>
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
var markettype = "CASINO_WAR";
var markettype_2 = markettype;
var back_html = "";
var lay_html = "";
var gstatus = "";
var last_result_id = '0';

function websocket(type) {
    socket = io.connect(websocketurl);
    socket.on('connect', function() {
        socket.emit('Room', 'War');
    });

    socket.on('gameIframe', function(data) {
        $("#casinoIframe").attr('src', data);
    });

    socket.on('game', function(data) {
        console.log("data",data);
        
  data1 = data;
        if (data && data['t1'] && data['t1'][0]) {
            // console.log("data=",data);
              if (oldGameId != data1.t1[0].mid && data1.t1[0].mid != 0 && data1.t1[0].mid != "0") {
                 setTimeout(function() {
                     clearCards();
                 }, <?php //echo CASINO_RESULT_TIMEOUT; ?>);
            }

            oldGameId = data.t1[0].mid;
            if (data1.t1[0].mid != 0 && data1.t1[0].mid != "0" && oldGameId != resultGameLast) {
                $(".casino-remark").text(data1.t1[0].remark);

                if (data1.t1[0].C1 != 1) {
                    $("#card_c1").attr("src", site_url + "storage/front/img/cards_new/" + data1.t1[0].C1 +
                        ".png");
                }
                if (data1.t1[0].C2 != 1) {
                    $("#card_c2").attr("src", site_url + "storage/front/img/cards_new/" + data1.t1[0].C2 +
                        ".png");
                }
                if (data1.t1[0].C3 != 1) {
                    $("#card_c3").attr("src", site_url + "storage/front/img/cards_new/" + data1.t1[0].C3 +
                        ".png");
                }
                if (data1.t1[0].C4 != 1) {
                    $("#card_c4").attr("src", site_url + "storage/front/img/cards_new/" + data1.t1[0].C4 +
                        ".png");
                }
                if (data1.t1[0].C5 != 1) {
                    $("#card_c5").attr("src", site_url + "storage/front/img/cards_new/" + data1.t1[0].C5 +
                        ".png");
                }
                if (data1.t1[0].C6 != 1) {
                    $("#card_c6").attr("src", site_url + "storage/front/img/cards_new/" + data1.t1[0].C6 +
                        ".png");
                }
                if (data1.t1[0].C7 != 1) {
                    $("#card_c7").attr("src", site_url + "storage/front/img/cards_new/" + data1.t1[0].C7 +
                        ".png");
                }


            }
            clock.setValue(data.t1[0].autotime);
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
                l1 = data['t2'][j].l1;


                markettype = "CASINO_WAR";


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
    });
    socket.on('error', function(data) {});
    socket.on('close', function(data) {});
}

function clearCards() {
    $("#card_c1").attr("storage/front/img/cards/1.png");
    $("#card_c2").attr("storage/front/img/cards/1.png");
    $("#card_c3").attr("storage/front/img/cards/1.png");
    $("#card_c4").attr("storage/front/img/cards/1.png");
    $("#card_c5").attr("storage/front/img/cards/1.png");
    $("#card_c6").attr("storage/front/img/cards/1.png");
    $("#card_c7").attr("storage/front/img/cards/1.png");

    
}

function updateResult(data) {
    if (data && data[0]) {
        // data = JSON.parse(JSON.stringify(data));
        resultGameLast = data[0].mid;


        if (last_result_id != resultGameLast) {
            last_result_id = resultGameLast;

        }
        var html = "";
        var ab = "";
        var ab1 = "";
        casino_type = "'war'";
        data.forEach(function(runData) {

            ab = "result-b";
            ab1 = "R";

            eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] :
                runData.mid;
            html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type +
                ')"  class="last-result ml-1  ' + ab + ' result">' + ab1 + '</span>';
        });
        $("#last-result").html(html);
        if (oldGameId == 0 || oldGameId == resultGameLast) {
            $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
            $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
            $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
            $("#card_c4").attr("src", site_url + "storage/front/img/cards/1.png");
            $("#card_c5").attr("src", site_url + "storage/front/img/cards/1.png");
            $("#card_c6").attr("src", site_url + "storage/front/img/cards/1.png");
            $("#card_c7").attr("src", site_url + "storage/front/img/cards/1.png");
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
        url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/war/' + event_id,
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
        url: MASTER_URL + '/live-market/war/active_bets/war/' + get_round_no(),
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
        url: MASTER_URL + '/live-market/war/view_more_matched/war/' + get_round_no(),
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
        url: MASTER_URL + '/live-market/war/market_analysis/war/' + get_round_no(),
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