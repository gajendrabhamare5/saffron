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
        background-color: #2c3e50d9;
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

    td.suspendedtd:after {
        position: absolute;
        content: attr(data-title);
        top: 0;
        right: 0;
        background: white !important;
        color: black !important;
        font-weight: 700;
        width: 170px;
        height: 100%;
        font-size: 20px;
        cursor: not-allowed;
        align-items: center;
        display: flex;
        display: -ms-flex;
        display: -webkit-flex;
        justify-content: center;
    }

    .ball-runs.player-a {
        color: #ff4500 !important;
    }

    .ball-runs.player-b {
        color: #ffff33 !important;
    }

    .ball-runs.player-c {
        color: #03b37f !important;
    }

    .table thead th {
        border-bottom: 0px solid #dee2e6 !important;
        border-top: 0px solid #dee2e6 !important;
    }

    .box-4 {
        background-color: #ddd !important;
        height: 45px !important;
    }

    /* .winner-icon {
        right: 54px !important;
        bottom: 5% !important;
    } */
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
                    <div class="game-heading">
                        <span class="card-header-title">20-20 D T L &nbsp;
                            <!-- <small class="teenpatti-rules" data-toggle="modal" data-target="#modalrulesteenpatti"><u>Rules</u></small> -->
                        </span>
                        <span class="float-right">
                            Round ID: <span id="round-id" class="round_no"></span></span>
                    </div>
                    <div style="position: relative;">
                        <?php
                        if(!empty(IFRAME_URL_SET)){
                               ?>
                        <iframe class="iframedesign" src="<?php echo IFRAME_URL."".DTL_CODE;?>" width="100%"
                            height="400px" style="border: 0px;"></iframe>
                        <?php
                                
                            }else{
                                ?>
                        <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="400"
                            style="border: 0px;"></iframe>
                        <?php

                            }
                            ?>
                        <!-- <iframe id="casinoIframe" src="" width="100%" height="400" style="border: 0px;"></iframe> -->
                        <!-- <iframe width="100%" height="400" src="<?php echo IFRAME_URL."".DTL_CODE; ?>" style="border:0px"></iframe> -->
                        <div class="video-overlay">
                            <div>
                                <img id="card_c1" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                <img id="card_c2" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                <img id="card_c3" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
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
                                                        <ul class="pl-4 pr-4 list-style">
                                                            <li>20-20 DTL(Dragon Tiger Lion) is a 52 playing cards game,
                                                                In DTL game 3 hands are dealt: for each 3 player. The
                                                                player will bets which will win. </li>
                                                            <li>The ranking of cards is, from lowest to highest: Ace, 2,
                                                                3, 4, 5, 6, 7,8, 9, 10, Jack, Queen and King when Ace is
                                                                “1” and King is “13”.</li>
                                                            <li>On same card with different suit, Winner will be declare
                                                                based on below winning suit sequence.
                                                                <p>
                                                                </p>
                                                                <div class="cards-box">
                                                                    <span
                                                                        class="card-character black-card ml-1">1}</span>
                                                                    <span>1st</span>
                                                                </div>
                                                                <p></p>
                                                                <p>
                                                                </p>
                                                                <div class="cards-box">
                                                                    <span class="card-character red-card ml-1">1{</span>
                                                                    <span>2nd</span>
                                                                </div>
                                                                <p></p>
                                                                <p>
                                                                </p>
                                                                <div class="cards-box">
                                                                    <span
                                                                        class="card-character black-card ml-1">1]</span>
                                                                    <span>3rd</span>
                                                                </div>
                                                                <p></p>
                                                                <p>
                                                                </p>
                                                                <div class="cards-box">
                                                                    <span class="card-character red-card ml-1">1[</span>
                                                                    <span>4th</span>
                                                                </div>
                                                                <p></p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                       
                        <div class="clock clock2digit flip-clock-wrapper"></div>
                        <div id="result-desc" style="display: none;"></div>
                    </div>
                    <div class="card-content m-t-5">
                        <div class=" row row5">
                            <div class="col-6" style="border-right: 2px solid grey;">
                                <div class="main-market">
                                    <table class="table coupon-table table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th class="box-2">D</th>
                                                <th class="box-2">T</th>
                                                <th class="box-2">L</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="box-4 card-type-icon">
                                                    <b>Winner</b>
                                                    <div class="info-block m-t-5" style="position: relative; display: inline-block;float: right;">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info0"
                                                            aria-expanded="false" class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                         <div id="min-max-info0" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-1L</span>        
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="box-2 back market_1_row market_1_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_1_b_value">2.94</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_21_row market_21_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_21_b_value">2.94</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_41_row market_41_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_41_b_value">2.94</span>

                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_1_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5  text-center">
                                                            <b
                                                                class="market_21_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_41_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-4 card-type-icon">

                                                    <span class="card-icon">
                                                        <span class="card-black">]</span>
                                                    </span>
                                                    <span class="card-icon">
                                                        <span class="card-black">}</span>
                                                    </span>
                                                    <div class="info-block float-right">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info1"
                                                            aria-expanded="false" class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                     <div id="min-max-info1" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-5k</span>        
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="box-2 back market_2_row market_2_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_2_b_value">1.97</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_22_row market_22_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_22_b_value">1.97</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_42_row market_42_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_42_b_value">1.97</span>

                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_2_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5  text-center">
                                                            <b
                                                                class="market_22_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_42_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-4 card-type-icon">

                                                    <span class="card-icon">
                                                        <span class="card-red">[</span>
                                                    </span>
                                                    <span class="card-icon">
                                                        <span class="card-red">{</span>
                                                    </span>
                                                    <div class="info-block float-right">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info2"
                                                            aria-expanded="false" class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                             <div id="min-max-info2" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-5k</span>        
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="box-2 back market_3_row market_3_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_3_b_value">1.97</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_23_row market_23_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_23_b_value">1.97</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_43_row market_43_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_43_b_value">1.97</span>

                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_3_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5  text-center">
                                                            <b
                                                                class="market_23_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_43_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-4 card-type-icon">
                                                    <b>Odd</b>
                                                    <div class="info-block float-right">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info3"
                                                            aria-expanded="false" class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                             <div id="min-max-info3" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-5k</span>        
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="box-2 back market_4_row market_4_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_4_b_value">1.83</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_24_row market_24_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_24_b_value">1.83</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_44_row market_44_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_44_b_value">1.83</span>

                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_4_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5  text-center">
                                                            <b
                                                                class="market_24_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_44_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-4 card-type-icon">
                                                    <b>Even</b>
                                                    <div class="info-block float-right">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info4"
                                                            aria-expanded="false" class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                             <div id="min-max-info4" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-5k</span>        
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="box-2 back market_5_row market_5_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_5_b_value">2.12</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_25_row market_25_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_25_b_value">2.12</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_45_row market_45_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_25_b_value">2.12</span>

                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_5_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5  text-center">
                                                            <b
                                                                class="market_25_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_45_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-4 card-type-icon">
                                                    <img
                                                        src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/1.jpg">
                                                    <div class="info-block float-right">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info5"
                                                            aria-expanded="false" class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                              <div id="min-max-info5" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-5k</span>        
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="box-2 back market_6_row market_6_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_6_b_value">12.00</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_26_row market_26_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_26_b_value">12.00</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_46_row market_46_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_46_b_value">12.00</span>

                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_6_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5  text-center">
                                                            <b
                                                                class="market_26_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_46_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-4 card-type-icon">
                                                    <img
                                                        src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/2.jpg">
                                                    <div class="info-block float-right">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info6"
                                                            aria-expanded="false" class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                              <div id="min-max-info6" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-5k</span>        
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="box-2 back market_7_row market_7_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_7_b_value">12.00</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_27_row market_27_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_27_b_value">12.00</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_47_row market_47_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_47_b_value">12.00</span>

                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_7_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5  text-center">
                                                            <b
                                                                class="market_27_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_47_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-4 card-type-icon">
                                                    <img
                                                        src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/3.jpg">
                                                    <div class="info-block float-right">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info7"
                                                            aria-expanded="false" class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                              <div id="min-max-info7" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-5k</span>        
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="box-2 back market_8_row market_8_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_8_b_value">12.00</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_28_row market_28_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_28_b_value">12.00</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_48_row market_48_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_48_b_value">12.00</span>

                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_8_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5  text-center">
                                                            <b
                                                                class="market_8_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_48_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-4 card-type-icon">
                                                    <img
                                                        src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/4.jpg">
                                                    <div class="info-block float-right">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info8"
                                                            aria-expanded="false" class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                              <div id="min-max-info8" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-5k</span>        
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="box-2 back market_9_row market_9_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_9_b_value">12.00</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_29_row market_29_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_29_b_value">12.00</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_49_row market_49_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_49_b_value">12.00</span>

                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_9_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5  text-center">
                                                            <b
                                                                class="market_29_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_49_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="main-market">
                                    <table class="table coupon-table table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th class="box-2">D</th>
                                                <th class="box-2">T</th>
                                                <th class="box-2">L</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="box-4 card-type-icon">
                                                    <img
                                                        src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/5.jpg">
                                                    <div class="info-block float-right">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info9"
                                                            aria-expanded="false" class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                              <div id="min-max-info9" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-5k</span>        
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="box-2 back market_10_row market_10_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_10_b_value">12.00</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back  market_30_row market_30_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_30_b_value">12.00</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_50_row market_50_b_btn">
                                                    <button>
                                                        <span class="odd d-bloc market_50_b_value">12.00</span>

                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_10_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5  text-center">
                                                            <b
                                                                class="market_30_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_50_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-4 card-type-icon">
                                                    <img
                                                        src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/6.jpg">
                                                    <div class="info-block float-right">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info10"
                                                            aria-expanded="false" class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                              <div id="min-max-info10" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-5k</span>        
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="box-2 back market_11_row market_11_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_11_b_value">12.00</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_31_row market_31_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_31_b_value">12.00</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_51_row market_51_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_51_b_value">12.00</span>

                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_11_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5  text-center">
                                                            <b
                                                                class="market_31_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_51_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-4 card-type-icon">
                                                    <img
                                                        src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/7.jpg">
                                                    <div class="info-block float-right">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info11"
                                                            aria-expanded="false" class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                              <div id="min-max-info11" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-5k</span>        
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="box-2 back market_12_row market_12_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_12_b_value">12.00</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_32_row market_32_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_32_b_value">12.00</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_52_row market_52_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_52_b_value">12.00</span>

                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_12_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5  text-center">
                                                            <b
                                                                class="market_32_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_52_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-4 card-type-icon">
                                                    <img
                                                        src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/8.jpg">
                                                    <div class="info-block float-right">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info12"
                                                            aria-expanded="false" class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                              <div id="min-max-info12" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-5k</span>        
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="box-2 back market_13_row market_13_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_13_b_value">12.00</span>
                                                        <span class="d-block">
                                                            <div class="ubook m-t-5 text-danger">

                                                            </div>
                                                        </span>
                                                    </button>
                                                </td>
                                                <td class="box-2 back market_33_row market_33_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_33_b_value">12.00</span>
                                                        <span class="d-block">
                                                            <div class="ubook m-t-5 text-danger">

                                                            </div>
                                                        </span>
                                                    </button>
                                                </td>
                                                <td class="box-2 back market_53_row market_53_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_53_b_value">12.00</span>
                                                        <span class="d-block">
                                                            <div class="ubook m-t-5">

                                                            </div>
                                                        </span>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_13_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5  text-center">
                                                            <b
                                                                class="market_33_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_53_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-4 card-type-icon">
                                                    <img
                                                        src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/9.jpg">
                                                    <div class="info-block float-right">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info13"
                                                            aria-expanded="false" class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                              <div id="min-max-info13" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-5k</span>        
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="box-2 back market_14_row market_14_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_14_b_value">12.00</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_34_row market_34_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_34_b_value">12.00</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_54_row market_54_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_54_b_value">12.00</span>

                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_14_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5  text-center">
                                                            <b
                                                                class="market_14_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_54_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-4 card-type-icon">
                                                    <img
                                                        src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/10.jpg">
                                                    <div class="info-block float-right">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info14"
                                                            aria-expanded="false" class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                              <div id="min-max-info14" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-5k</span>        
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="box-2 back market_15_row market_15_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_15_b_value">12.00</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_35_row market_35_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_35_b_value">12.00</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_55_row market_55_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_55_b_value">12.00</span>

                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_15_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5  text-center">
                                                            <b
                                                                class="market_35_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_55_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-4 card-type-icon">
                                                    <img
                                                        src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/11.jpg">
                                                    <div class="info-block float-right">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info15"
                                                            aria-expanded="false" class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                              <div id="min-max-info15" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-5k</span>        
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="box-2 back market_16_row market_16_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_16_b_value">12.00</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_36_row market_36_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_36_b_value">12.00</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_56_row market_56_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_56_b_value">12.00</span>

                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_16_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5  text-center">
                                                            <b
                                                                class="market_36_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_56_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-4 card-type-icon">
                                                    <img
                                                        src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/12.jpg">
                                                    <div class="info-block float-right">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info16"
                                                            aria-expanded="false" class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                              <div id="min-max-info16" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-5k</span>        
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="box-2 back market_17_row market_17_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_17_b_value">12.00</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_37_row market_37_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_37_b_value">12.00</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_57_row market_57_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_57_b_value">12.00</span>

                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_17_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5  text-center">
                                                            <b
                                                                class="market_37_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_57_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-4 card-type-icon">
                                                    <img
                                                        src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/13.jpg">
                                                    <div class="info-block float-right">
                                                        <a href="#" data-toggle="collapse" data-target="#min-max-info17"
                                                            aria-expanded="false" class="info-icon collapsed">
                                                            <i class="fas fa-info-circle m-l-10"></i>
                                                        </a>
                                                              <div id="min-max-info17" class="min-max-info collapse" style="position: absolute; top: 100%; right: 0; background: #333; color: #fff; padding: 5px 10px; font-size: 12px; white-space: nowrap; z-index: 10;width:64px;">
                                                            <span class="m-r-5"> R:100-5k</span>        
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="box-2 back market_18_row market_18_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_18_b_value">12.00</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_38_row market_38_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_38_b_value">12.00</span>

                                                    </button>
                                                </td>
                                                <td class="box-2 back market_58_row market_58_b_btn">
                                                    <button>
                                                        <span class="odd d-block market_58_b_value">12.00</span>

                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_18_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5  text-center">
                                                            <b
                                                                class="market_38_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="d-block">
                                                        <div class="ubook m-t-5 text-center">
                                                            <b
                                                                class="market_58_b_exposure market_exposure text-danger">0</b>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <marquee scrollamount="3" class="casino-remark m-b-10"></marquee>
                    </div>
                    <div class="fancy-marker-title">
                        <h4>Last Result <a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=dtl20"
                                class="text-right" style="font-size: 14px; float: right; color: #fff">View All</a></h4>
                    </div>
                    <div class="m-b-10">
                        <p class="text-right" id="last-result"></p>
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
                            <a href="javascript:void(0)" class="btn btn-back float-right" id="view_more_bets">VIEW MORE </a>
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
            <div class="modal-dialog modal-md modal-dialog-centered" style="min-width: 650px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">20-20 D T L Result</h4>
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
var markettype = "DTL20";
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
        socket.emit('Room', 'dtl20');
    });

    socket.on('gameIframe', function(data) {
        $("#casinoIframe").attr('src', data);
    });
    socket.on('game', function(data) {

        if (data && data['t1'] && data['t1'][0]) {
            if (oldGameId != data.t1[0].mid && data.t1[0].mid != 0 && data.t1[0].mid != "0") {
                setTimeout(function() {
                    //clearCards();
                }, <?php //echo CASINO_RESULT_TIMEOUT; ?>);
            }

            oldGameId = data.t1[0].mid;
            if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                $(".casino-remark").text(data.t1[0].remark);
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
                markettype = "DTL20";
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

                    $(".market_" + selectionid + "_row").addClass("suspendedtd");
                    $(".market_" + selectionid + "_b_btn").removeClass("back-1");
                } else {
                    $(".market_" + selectionid + "_b_btn").addClass("back-1");
                    $(".market_" + selectionid + "_row").removeClass("suspendedtd");
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


function updateResult(data) {
    if (data && data[0]) {
        // data = JSON.parse(JSON.stringify(data));
        resultGameLast = data[0].mid;
        if (last_result_id != resultGameLast) {
            last_result_id = resultGameLast;
            /* refresh(markettype); */
        }
        var html = "";
        var ab = "";
        var ab1 = "";
        casino_type = "'dtl20'";
        data.forEach(function(runData) {
            if (parseInt(runData.win) == 1) {
                ab = "player-a";
                ab1 = "D";
            } else if (parseInt(runData.win) == 21) {
                ab = "player-b";
                ab1 = "T";
            } else if (parseInt(runData.win) == 41) {
                ab = "player-c";
                ab1 = "L";
            } else {
                ab = "playertie";
                ab1 = "T";
            }

            eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] :
                runData.mid;
            html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type +
                ')"  class="ball-runs  ' + ab + ' last-result">' + ab1 + '</span>';
        });
        $("#last-result").html(html);
        if (oldGameId == 0 || oldGameId == resultGameLast) {

            $("#card_c1").attr("src", site_url + "storage/front/img/cards_new/1.png");
            $("#card_c2").attr("src", site_url + "storage/front/img/cards_new/1.png");
            $("#card_c3").attr("src", site_url + "storage/front/img/cards_new/1.png");


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
        url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/dtl20/' + event_id,
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
        url: MASTER_URL + '/live-market/dt/active_bets/dtl20/' + get_round_no(),
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
        url: MASTER_URL + '/live-market/dt/view_more_matched/dtl20/' + get_round_no(),
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
        url: MASTER_URL + '/live-market/dt/market_analysis/dtl20/' + get_round_no(),
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