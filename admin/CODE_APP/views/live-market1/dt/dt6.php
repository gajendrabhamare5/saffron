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
            2 justify-content: center;
            align-items: center;
            pointer-events: none;
        }

        .lucky7-container .dt-button {
            /* background-image: linear-gradient(to right, var(--theme1-bg), var(--theme2-bg)); */
            width: 100%;
            border-radius: 0px !important;
            box-shadow: none !important;
            border: 0;
            padding: 8px 10px;
            cursor: pointer;
            font-size: 14px;
        }
        .btn-theme{
            border-radius: 0px !important;
            box-shadow: none !important;
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

        .casino-table-full-box {
            width: 100%;
            border-left: 1px solid #c7c8ca;
            border-right: 1px solid #c7c8ca;
            border-top: 1px solid #c7c8ca;
            background-color: #f2f2f2;
        }

        .casino-table-full-box {
            display: flex;
            flex-wrap: wrap;
            padding: 10px;
            border: 0;
        }

        .onecard20player,
        .onecard20dealer,
        .onecard20pair {
            width: calc(29% - 15px);
        }

        .onecard20oddbox {
            margin-right: 20px;
        }

        .casino-odds {
            font-size: 14px;
            font-weight: bold;
            line-height: 1;
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

        .casino-odds-box-theme1 {
            /* background-image: linear-gradient(to right, #0088cc, #2c3e50); */
            color: black;
            border-radius: 4px;
            /* box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2); */
            border: 0;
            border: 2px solid #fc4242 !important;
            background-color: #fc42422e;
        }

        .casino-odds-box-theme2 {
            position: absolute;
            width: 100px !important;
            height: 100px !important;
            border-radius: 50% !important;
            left: 40%;
            transform: translateX(-50%);
            padding: 6px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #03b37f;
            color: white;
            flex-direction: column;
            justify-content: center;
            z-index: 10;
            cursor: pointer;
        }

        .casino-odds-box-theme3 {
            /* background-image: linear-gradient(to right, #0088cc, #2c3e50); */
            color: black;
            border-radius: 4px;
            /* box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2); */
            border: 0;
            border: 2px solid #fdcf13 !important;
            background-color: #fdcf132e;
        }

        .casino-odds-box-theme4 {
            /* background-image: linear-gradient(to right, #0088cc, #2c3e50); */
            color: black;
            border-radius: 4px;
            /* box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2); */
            border: 0;
            border: 2px solid #0041a2 !important;
            background-color: #03b37f33;
        }

        .casino-odds-box {
            margin: 5px 0;
            padding: 6px;
        }

        .casino-nation-book {
            font-size: 12px;
            font-weight: bold;
            min-height: 18px;
            z-index: 1;
        }

        .onecard20tie {
            width: calc(13% - 15px);
        }

        .onecard20pair {
            margin-right: 0;
            border-left: 5px solid #2c3e50;
            padding-left: 20px;
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
            margin-left: 12px;
        }

        .back {
            /* background-color: #72bbef !important; */
            border: 2px solid #72bbef !important;
            margin-right: -3px;
        }

        .card {
            border: 0px solid rgba(0, 0, 0, .125) !important;
        }

        .card-image {
            min-width: 80px !important;
        }

        .p-r-5 {
            border-right: 2px solid grey;
        }

        .m-b-0 {
            background: #ddd !important;
        }

        .btn-theme {
            background-color: white !important;
        }

        .player-image-container img {
            left: -19% !important;
        }

        .winner-icon {
            left: -31% !important;
        }

        .dtobx-top {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            padding-top: 20px;
            position: relative;
        }

        .dragon-box {
            width: 40%;
            padding: 6px;
            padding-right: 6px;
            border: 2px solid #fc4242;
            background-color: #fc42422e;
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-height: 60px;
            padding-right: 60px;
            position: relative;
        }

        .tiebox {
            position: absolute;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            left: 40%;
            transform: translateX(-50%);
            padding: 6px;
            display: flex;
            align-items: center;
            background-color: #03b37f;
            color: var(--text-white);
            flex-direction: column;
            justify-content: center;
            z-index: 10;
        }

        .tiger-box {
            width: 40%;
            padding: 6px;
            padding-left: 6px;
            border: 2px solid #fdcf13;
            background-color: #fdcf132e;
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-height: 60px;
            padding-left: 60px;
            position: relative;
        }

        .pair-box {
            width: 18%;
            margin-left: 2%;
            background-color: #434343;
            padding: 6px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-height: 60px;
            flex-wrap: wrap;
            position: relative;
            color: #fff;
        }
 .dragonfancy {
    width: 40%;
    padding: 6px;
    padding-bottom: 6px;
    padding-bottom: 0;
    border: 2px solid var(--text-red);
    background-color: #fc42422e;
}

 .dt1dayfancy .casino-nation-name {
    background-color: transparent;
    width: 50%;
    padding-right: 10px;
    position: relative;
    
}
.dt1dayfancy .casino-bl-box {
    width: 50%;
    margin-right: 0;
}
.casino-bl-box {
    display: flex
;
    display: -webkit-flex;
    justify-content: center;
    align-items: center;
    /* flex-wrap: wrap; */
    width: 100%;
}
.casino-table .back {
    background-color: transparent;
    border: 2px solid #72bbef;
}
.casino-bl-box-item {
    margin-right: 4px;
    border-radius: 0;
    text-align: center;
    display: -webkit-flex;
    display: flex
;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    cursor: pointer;
    color: var(--text-black);
    text-align: center;
    /* cursor: pointer; */
    cursor: not-allowed;
    height: 40px;
}
.casino-bl-box-item .casino-box-odd, .casino-rb-box-player .casino-box-odd {
    font-weight: bold;
    font-size: 16px;
    height: 16px;
    line-height: 16px;
    margin-bottom: 2px;
    width: 100%;
    color: #333;
}
 .dt1dayfancy .casino-bl-box-item {
    width: calc(50% - 2px);
    height: 40px;
}
 .casino-book {
    position: absolute;
    bottom: -20px;
}
.casino-book {
    font-size: 18px;
    line-height: 18px;
}
 .pairfancy {
    width: 18%;
    padding: 6px;
    padding-bottom: 6px;
    padding-bottom: 0;
    background-color: #ddd;
}
.casino-box-row {
    display: flex
;
    display: -webkit-flex;
    flex-wrap: wrap;
    padding: 2px 0;
    align-items: center;
    position: relative;
}

 .dt1dayfancy .pairfancy .casino-bl-box-item {
    width: calc(100% - 2px);
}
.dt1dayfancy .casino-bl-box-item {
    width: calc(50% - 2px);
    height: 40px;
}
.tigerfancy {
    width: 40%;
    padding: 6px;
    padding-bottom: 6px;
    padding-bottom: 0;
    border: 2px solid #fdcf13;
    background-color: #fdcf132e;
}

.dt1dayfancy {
    position: relative;
    display: flex
;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
    margin-bottom: 30px;
    width: 100%;
}
.dragonfancy {
    width: 40%;
    padding: 6px;
    padding-bottom: 6px;
    padding-bottom: 0;
    border: 2px solid #fc4242;
    background-color: #fc42422e;
}
.casino-nation-name {
    padding: 4px;
    /* background-color: #ddd; */
}
.casino-bl-box-item > span, .casino-rb-box-player > span{
    display: block;
}
.casino-book {
    position: absolute;
    bottom: -20px;
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

    <div class="listing-grid lucky7-container casino-grid">
        <div class="coupon-card row">
            <div class="col-md-8 main-content">
                <div class="coupon-card">
                    <div class="game-heading">
                        <span class="card-header-title">1 Day Dragon Tiger &nbsp;
                            <!-- <small class="teenpatti-rules" data-toggle="modal" data-target="#modalrulesteenpatti"><u>Rules</u></small></span> -->
                            <span class="float-right">
                                Round ID: <span id="round-id" class="round_no"></span></span>
                    </div>
                    <div style="position: relative;">

                        <?php
                        if (!empty(IFRAME_URL_SET)) {
                        ?>
                            <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . ODIDT_CODE; ?>" width="100%"
                                height="400px" style="border: 0px;"></iframe>
                        <?php

                        } else {
                        ?>
                            <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="400"
                                style="border: 0px;"></iframe>
                        <?php

                        }
                        ?>

                        <!-- <iframe id="casinoIframe" src="" width="100%" height="400" style="border: 0px;"></iframe> -->
                        <!-- <iframe width="100%" height="400" src="<?php echo IFRAME_URL . "" . ODIDT_CODE; ?>" style="border:0px"></iframe> -->
                        <div class="video-overlay">
                            <div>
                                <img id="card_c1" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                <img id="card_c2" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
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
                                                        <img src="/storage/front/img/rules/dt6.jpg"
                                                            class="img-fluid">
                                                    </div>
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

                    <div id="tableData">
                        <div class="dt-container">
                            <div class="dtobx-top">
                                <div class="dt1dayfancy">
                                    <div class="casino-box-row dragonfancy">
                                        <div class="casino-nation-name">
                                            <div class="float-left mr-2"><i data-toggle="collapse" data-target="#demo0" class="fas fa-info-circle"></i>
                                                <div id="demo0" class="collapse icon-range">
                                                    R:<span>100</span>-<span>3L</span></div>
                                            </div> <b>Dragon</b>
                                        </div>
                                        <div class="casino-bl-box">
                                            <div class="back casino-bl-box-item market_1_row"><span class="casino-box-odd market_1_b_value"><b>1.98</b></span></div>
                                            <div class="lay casino-bl-box-item market_1_row"><span class="casino-box-odd  market_1_l_value">0</span></div>
                                        </div>
                                        <div class="casino-nation-name text-center w-100"><span class="casino-book book-red market_1_b_exposure market_exposure">0</span></div>
                                    </div>
                                    <div class="casino-box-row pairfancy">
                                        <div class="casino-nation-name">
                                            <div class="float-left mr-2"><i data-toggle="collapse" data-target="#demo2" class="fas fa-info-circle"></i>
                                                <div id="demo2" class="collapse icon-range">
                                                    R:<span>100</span>-<span>10K</span></div>
                                            </div> <b>Pair</b>
                                        </div>
                                        <div class="casino-bl-box">
                                            <div class="back casino-bl-box-item market_3_row" ><span class="casino-box-odd market_3_b_value">12</span></div>
                                        </div>
                                        <div class="casino-nation-name text-center w-100"><span class="casino-book book-red market_3_b_exposure market_exposure">0</span></div>
                                    </div>
                                    <div class="casino-box-row tigerfancy">
                                        <div class="casino-nation-name">
                                            <div class="float-left mr-2"><i data-toggle="collapse" data-target="#demo1" class="fas fa-info-circle"></i>
                                                <div id="demo1" class="collapse icon-range">
                                                    R:<span>100</span>-<span>3L</span></div>
                                            </div> <b>Tiger</b>
                                        </div>
                                        <div class="casino-bl-box">
                                            <div class="back casino-bl-box-item market_2_row "><span class="casino-box-odd  market_2_b_value">1.98</span></div>
                                            <div class="lay casino-bl-box-item market_2_row "><span class="casino-box-odd  market_2_l_value">0</span></div>
                                        </div>
                                        <div class="casino-nation-name text-center w-100"><span class="casino-book book-red market_2_b_exposure market_exposure">0</span></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 p-r-5 m-t-20">
                                    <div class="d-t-box m-b-10">
                                        <div class="row ">
                                            <div class="col-12">
                                                <h4 class="m-b-0 text-left" style="color: #fc4242;line-height: 29px;font-size: 14px;padding-left: 7px; 
                                                "><b>Dragon</b></h4>
                                                
                                            </div>

                                            <div class="col-md-3 text-center">
                                                <b class="casino-odds market_4_b_value">0</b>
                                                <div class="m-t-10">
                                                    <button
                                                        class="text-uppercase dt-button showbet-action market_4_row back"
                                                        data-index="4">
                                                        <b>Even</b>
                                                    </button>
                                                    <div class="ubook m-t-5 text-danger">
                                                        <b class="market_4_b_exposure market_exposure text-danger">0</b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 text-center">
                                                <b class="casino-odds market_5_b_value">0</b>
                                                <div class="m-t-10">
                                                    <button
                                                        class="suspended-box text-uppercase dt-button showbet-action market_5_b_btn market_5_row back"
                                                        data-index="5">
                                                        <b>Odd</b>
                                                    </button>
                                                    <div class="ubook m-t-5 text-danger">
                                                        <b class="market_5_b_exposure market_exposure text-danger">0</b>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3 text-center">
                                                <b class="casino-odds market_6_b_value">0</b>
                                                <div class="m-t-10">
                                                    <button
                                                        class="suspended-box text-uppercase btn-theme market_8_b_btn market_6_row back"
                                                        data-index="7">
                                                        <div class="color-card"></div>
                                                         <span class="card-icon">
                                                            <span class="card-black">}</span>
                                                        </span>
                                                        <span class="card-icon">
                                                            <span class="card-black">]</span>
                                                        </span>
                                                       
                                                    </button>
                                                    <div class="ubook m-t-5 text-danger">
                                                        <b class="market_6_b_exposure market_exposure text-danger">0</b>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-3 text-center">
                                                <b class="casino-odds market_7_b_value">0</b>
                                                <div class="m-t-10">
                                                    <button
                                                        class="suspended-box text-uppercase btn-theme market_7_b_btn market_7_row back"
                                                        data-index="6">
                                                        <div class="color-card"></div>
                                                        <span class="card-icon">
                                                            <span class="card-red">{</span>
                                                        </span>
                                                        <span class="card-icon">
                                                            <span class="card-red">[</span>
                                                        </span>
                                                        
                                                    </button>
                                                    <div class="ubook m-t-5 text-danger">
                                                        <b class="market_7_b_exposure market_exposure text-danger">0</b>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12 m-t-10 text-right">
                                                <span class="m-r-5">
                                                    R:100 -
                                                </span>
                                                <span class="m-r-5">
                                                    25k
                                                </span>
                                            </div>
                                            <div class="col-md-3 text-center">
                                                 <div class="color-card"></div>
                                                         <span class="card-icon">
                                                            <span class="card-black">}</span>
                                                        </span>
                                                <div class="m-t-10">
                                                    <button
                                                        class="text-uppercase dt-button showbet-action market_8_b_btn market_8_row back"
                                                        data-index="4">
                                                        <b class="casino-odds market_8_b_value">0</b>
                                                    </button>
                                                    <div class="ubook m-t-5 text-danger">
                                                        <b class="market_8_b_exposure market_exposure text-danger">0</b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 text-center">
                                                <div class="color-card"></div>
                                                        <span class="card-icon">
                                                            <span class="card-red">{</span>
                                                        </span>
                                                <div class="m-t-10">
                                                    <button
                                                        class="text-uppercase dt-button showbet-action market_9_b_btn market_9_row back"
                                                        data-index="5">
                                                        <b class="casino-odds market_9_b_value">0</b>
                                                    </button>
                                                    <div class="ubook m-t-5 text-danger">
                                                        <b class="market_9_b_exposure market_exposure text-danger">0</b>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-3 text-center">
                                                  <span class="card-icon">
                                                            <span class="card-black">]</span>
                                                        </span>
                                                <div class="m-t-10">
                                                    <button
                                                        class="text-uppercase btn-theme market_11_b_btn market_11_row back"
                                                        data-index="6">
                                                        <b class="casino-odds market_11_b_value">0</b>
                                                    </button>
                                                    <div class="ubook m-t-5 text-danger">
                                                        <b class="market_11_b_exposure market_exposure text-danger">0</b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 text-center">
                                                <span class="card-icon">
                                                            <span class="card-red">[</span>
                                                        </span>
                                                <div class="m-t-10">
                                                    <button
                                                        class="text-uppercase btn-theme market_10_b_btn market_10_row back"
                                                        data-index="7">
                                                        <b class="casino-odds market_10_b_value">0</b>
                                                    </button>
                                                    <div class="ubook m-t-5 text-danger">
                                                        <b class="market_10_b_exposure market_exposure text-danger">0</b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 m-t-10 text-right">
                                                <span class="m-r-5">
                                                    R:100 -
                                                </span>
                                                <span class="m-r-5">
                                                    25k
                                                </span>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 p-l-5 m-t-20">
                                    <div class="d-t-box m-b-10">
                                        <div class="row ">
                                            <div class="col-12">
                                                <h4 class="m-b-0 text-left"
                                                    style="color: #ef910f;line-height: 29px;font-size: 14px;    padding-left: 7px;">
                                                    <b>Tiger</b>
                                                </h4>
                                               
                                            </div>

                                            <div class="col-md-3 text-center">
                                                <b class="casino-odds market_12_b_value">0</b>
                                                <div class="m-t-10">
                                                    <button
                                                        class="suspended-box text-uppercase dt-button showbet-action market_12_b_btn market_12_row back"
                                                        data-index="21">
                                                        <b>Even</b>
                                                    </button>
                                                    <div class="ubook m-t-5 text-danger">
                                                        <b class="market_12_b_exposure market_exposure text-danger">0</b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 text-center">
                                                <b class="casino-odds market_13_b_value">0</b>
                                                <div class="m-t-10">
                                                    <button
                                                        class="suspended-box text-uppercase dt-button showbet-action market_13_b_btn market_13_row back"
                                                        data-index="22">
                                                        <b>Odd</b>
                                                    </button>
                                                    <div class="ubook m-t-5 text-danger">
                                                        <b class="market_13_b_exposure market_exposure text-danger">0</b>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                            <div class="col-md-3 text-center">
                                                <b class="casino-odds market_14_b_value">0</b>
                                                <div class="m-t-10">
                                                    <button
                                                        class="suspended-box text-uppercase btn-theme market_14_b_btn market_14_row back"
                                                        data-index="23">
                                                        <div class="color-card"></div>
                                                         <span class="card-icon">
                                                            <span class="card-red">{</span>
                                                        </span>
                                                        <span class="card-icon">
                                                            <span class="card-red">[</span>
                                                        </span>
                                                       
                                                    </button>
                                                    <div class="ubook m-t-5 text-danger">
                                                        <b class="market_14_b_exposure market_exposure  text-danger">0</b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 text-center">
                                                <b class="casino-odds market_15_b_value">0</b>
                                                <div class="m-t-10">
                                                    <button
                                                        class="suspended-box text-uppercase btn-theme market_15_b_btn market_15_row back"
                                                        data-index="24">
                                                        <div class="color-card"></div>
                                                         <span class="card-icon">
                                                            <span class="card-black">}</span>
                                                        </span>
                                                        <span class="card-icon">
                                                            <span class="card-black">]</span>
                                                        </span>
                                                       
                                                    </button>
                                                    <div class="ubook m-t-5 text-danger">
                                                        <b class="market_15_b_exposure market_exposure text-danger">0</b>
                                                    </div>
                                                </div>
                                            </div>
                                           <div class="col-md-12 m-t-10 text-right">
                                                <span class="m-r-5">
                                                    R:100 -
                                                </span>
                                                <span class="m-r-5">
                                                    25k
                                                </span>
                                            </div>
                                            <div class="col-md-3 text-center">
                                                  <span class="card-icon">
                                                            <span class="card-black">}</span>
                                                        </span>
                                                <div class="m-t-10">
                                                    <button
                                                        class="text-uppercase dt-button showbet-action market_16_b_btn market_16_row back"
                                                        data-index="21">
                                                        <b class="casino-odds market_16_b_value">0</b>
                                                    </button>
                                                    <div class="ubook m-t-5 text-danger">
                                                        <b class="market_16_b_exposure market_exposure text-danger">0</b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 text-center">
                                              <span class="card-icon">
                                                            <span class="card-red">{</span>
                                                        </span>
                                                <div class="m-t-10">
                                                    <button
                                                        class="text-uppercase dt-button showbet-action market_17_b_btn market_17_row back"
                                                        data-index="22">
                                                        <b class="casino-odds market_17_b_value">0</b>
                                                    </button>
                                                    <div class="ubook m-t-5 text-danger">
                                                        <b class="market_17_b_exposure market_exposure text-danger">0</b>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-3 text-center">
                                                 <span class="card-icon">
                                                            <span class="card-black">]</span>
                                                        </span>
                                                <div class="m-t-10">
                                                    <button
                                                        class="text-uppercase btn-theme market_19_b_btn market_19_row back"
                                                        data-index="23">
                                                       <b class="casino-odds market_19_b_value">0</b>
                                                    </button>
                                                    <div class="ubook m-t-5 text-danger">
                                                        <b class="market_19_b_exposure market_exposure  text-danger">0</b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 text-center">
                                                <span class="card-icon">
                                                            <span class="card-red">[</span>
                                                        </span>
                                                <div class="m-t-10">
                                                    <button
                                                        class="text-uppercase btn-theme market_18_b_btn market_18_row back"
                                                        data-index="24">
                                                      <b class="casino-odds market_18_b_value">0</b>
                                                    </button>
                                                    <div class="ubook m-t-5 text-danger">
                                                        <b class="market_18_b_exposure market_exposure text-danger">0</b>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-md-12 m-t-10 text-right">
                                                <span class="m-r-5">
                                                    R:100 -
                                                </span>
                                                <span class="m-r-5">
                                                    25k
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 p-r-5">
                           
                        </div>
                        <div class="col-md-6 p-l-5">
                          
                        </div>
                    </div>

                    <div class="fancy-marker-title">
                        <h4>Last Result <a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=dt6"
                                class="text-right" style="font-size: 14px; float: right; color: #fff">View All</a></h4>
                    </div>
                    <div class="m-b-10">
                        <p class="casino-last-results" id="last-result"></p>
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
            <div class="modal-dialog modal-md modal-dialog-centered" style="min-width: 650px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">1 Day Dragon Tiger Result</h4>
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


<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/dataTables.buttons.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/pdfmake.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/buttons.html5.min.js"></script> -->

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
var markettype = "ODI_DRAGON_TIGER";
var back_html = "";
var lay_html = "";
var gstatus = "";

function websocket(type) {
    socket = io.connect(websocketurl, {
        transports: ['websocket']
    });
    socket.on('connect', function() {
        socket.emit('Room', 'dt6');
    });

    socket.on('gameIframe', function(data) {
        $("#casinoIframe").attr('src', data);
    });

    socket.on('game', function(data) {
        
        
        if (data && data['t1'] && data['t1'][0]) {
             if (oldGameId != data.t1[0].mid && oldGameId != 0) {
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


            }
            clock.setValue(data.t1[0].autotime);
            $(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
            $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
            eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1];

            for (var j in data['t2']) {
                selectionid = parseInt(data['t2'][j].sid);
                runner = data['t2'][j].nat;
                b1 = data['t2'][j].b1;
                b1 = parseFloat(b1);
                l1 = data['t2'][j].l1;
                l1 = parseFloat(l1);


                markettype = "ODI_DRAGON_TIGER";


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

                    if (selectionid == 1 || selectionid == 2 || selectionid == 3)
                        $(".market_" + selectionid + "_row").addClass("suspended-box");
                    else
                        $(".market_" + selectionid + "_row").addClass("suspended-box");
                    $(".market_" + selectionid + "_b_btn").removeClass("back-1");
                    $(".market_" + selectionid + "_l_btn").removeClass("lay-1");
                } else {

                    if (b1 != 0.00) {
                        $(".market_" + selectionid + "_b_btn").addClass("back-1");
                    }

                    if (l1 != 0.00) {
                        $(".market_" + selectionid + "_l_btn").addClass("lay-1");
                    }
                    if (selectionid == 1 || selectionid == 2 || selectionid == 3)
                        $(".market_" + selectionid + "_row").removeClass("suspended-box");
                    else
                        $(".market_" + selectionid + "_row").removeClass("suspended-box");
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
}

function updateResult(data) {
    data = JSON.parse(JSON.stringify(data));
    resultGameLast = data[0].mid;
    var html = "";
    casino_type = "'dt6'";
    data.forEach(function(runData) {
        if (parseInt(runData.result) == 1) {
            ab = "playera";
            ab1 = "D";

        } else if (parseInt(runData.result) == 2) {
            ab = "playerb";
            ab1 = "T";

        }
        eventId = runData.mid == 0 ? 0 : runData.mid.split(".")[1];
        html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs  ' +
            ab + ' last-result">' + ab1 + '</span>';
    });
    $("#last-result").html(html);
    if (oldGameId == 0 || oldGameId == resultGameLast) {
        $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
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
        url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/dt6/' + event_id,
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
        url: MASTER_URL + '/live-market/dt/active_bets/dt6/' + get_round_no(),
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
        url: MASTER_URL + '/live-market/dt/view_more_matched/dt6/' + get_round_no(),
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
        url: MASTER_URL + '/live-market/dt/market_analysis/dt6/' + get_round_no(),
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