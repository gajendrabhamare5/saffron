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

    .roulette.roulette11 .transfer-board {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        width: 100%;
        align-items: center;
        gap: 10px;
        padding: 3px 8px 8px;
    }

    .transfer-board .switch-board-icon {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .transfer-board .switch-board-icon>div {
        /* padding: 8px; */
        min-width: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 40px;
        border: 2px solid transparent;
        cursor: pointer;
        font-size: 18px;
        font-weight: bold;
    }

    .transfer-board .switch-board-icon>div.active {
        border: 2px solid #000;
    }

    .transfer-board .switch-board-icon>div.back {
        border-radius: 20px 0 0 20px;
    }

    .transfer-board .switch-board-icon>div.lay {
        border-radius: 0 20px 20px 0;
    }

    .back {
        background-color: #72bbef !important;
    }

    .lay {
        background-color: #faa9ba !important;
    }

    .casino-table-box {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: flex-start;
        padding-right: 4px;
    }

    .casino-table-box {
        padding: 10px;
    }

    .roulette-box-container {
        width: 100%;
    }

    .board-in {
        display: grid;
        grid-template-rows: 105fr 50fr;
        grid-template-columns: 44fr 539fr 44fr;
        grid-template-areas:
            "center center right"
            ". bottom . ";
        grid-gap: 0.1328125311rem;
        gap: 0.1328125311rem;
        width: 100%;
        position: relative;
        height: 100%;
        pointer-events: none;
    }

    .board-right {
        display: grid;
        grid-area: right;
        grid-template-rows: repeat(3, 1fr);
        grid-gap: 0.1328125311rem;
        gap: 0.1328125311rem;
        pointer-events: all;
    }

    .board-cell {
        position: relative;
        /* border-radius: 0.2656250623rem; */
        border-radius: 0;
        min-height: 50px;
    }

    .board-cell.yellow {
        background-color: #fef0a9;
        color: #b2121f;
    }

    .board-right .board-cell:first-child {
        /* border-top-right-radius: 1.062500249rem; */
        border-radius: 0;
    }

    .board-cell-in {
        position: relative;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: inherit;
        transition: background-color 180ms var(--g-ttf);
    }

    .board-cell-in::before {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        border-width: 0.1328125311rem;
        border-style: solid;
        border-color: #000;
        border-radius: inherit;
        box-shadow: 0 0 0 4.2500009961rem rgba(var(--g-white-rgb), 0.15) inset;
        opacity: 0;
        pointer-events: none;
        z-index: 0;
    }

    .board-text,
    .board-number {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 26px;
        font-weight: bold;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        pointer-events: none;
        z-index: 1;
    }

    .board-text,
    .board-number {
        font-size: 20px;
    }

    .board-cell.yellow .board-text,
    .board-cell.yellow .borad-number {
        color: red;
    }

    .board-cell.yellow .board-text {
        top: -7px;
    }

    .board-cell-in .bet-chip-area {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        /* transform: translate3d(-50%, -50%, 0); */
        z-index: 15;
    }

    .board-cell-in .bet-chip-area {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        /* transform: translate3d(-50%, -50%, 0); */
        z-index: 15;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .board-cell-in .bet-chip-area.coin-place {
        z-index: 14;
    }

    .board-bottom {
        display: grid;
        grid-area: bottom;
        grid-template-rows: repeat(2, 1fr);
        grid-template-columns: repeat(6, 1fr);
        grid-template-areas:
            "first first second second third third "
            "first-half even red black odd second-half";
        grid-gap: 0.1328125311rem;
        gap: 0.1328125311rem;
        pointer-events: all;
    }

    .board-bottom .board-cell:first-child {
        grid-area: first;
    }

    .board-bottom .board-cell:last-child {
        grid-area: second-half;
        /* border-bottom-right-radius: 1.062500249rem; */
        border-radius: 0;
    }

    .board-bottom .board-cell:nth-child(2) {
        grid-area: second;
    }

    .board-bottom .board-cell:nth-child(3) {
        grid-area: third;
    }

    .board-bottom .board-cell:nth-child(4) {
        grid-area: first-half;
        /* border-bottom-left-radius: 1.062500249rem; */
        border-radius: 0;
    }

    .board-bottom .board-cell:nth-child(5) {
        grid-area: even;
    }

    .board-bottom .board-cell:nth-child(6) {
        grid-area: red;
    }

    .board-bottom .board-cell:nth-child(7) {
        grid-area: black;
    }

    .board-bottom .board-cell:nth-child(8) {
        grid-area: odd;
    }

    .board-bottom .board-cell:last-child {
        grid-area: second-half;
        /* border-bottom-right-radius: 1.062500249rem; */
        border-radius: 0;
    }

    .board-center {
        display: grid;
        grid-area: center;
        grid-template-rows: repeat(3, 1fr);
        grid-template-columns: repeat(13, 1fr);
        grid-template-areas:
            "zero c f i l o r u x aa ad ag aj"
            "zero b e h k n q t w z ac af ai"
            "zero a d g j m p s v y ab ae ah";
        grid-gap: 0.1328125311rem;
        gap: 0.1328125311rem;
        pointer-events: all;
    }

    .board-cell.green {
        background-color: #17732e;
        /* border-radius: 1.062500249rem 0.2656250623rem 0.2656250623rem 1.062500249rem; */
        border-radius: 0;
    }

    .board-cell.red {
        background-color: #b2121f;
    }

    .board-cell.black {
        background-color: #111111;
    }

    .board-center .board-cell:nth-child(1) {
        grid-area: zero;
    }

    .board-center .board-cell:nth-child(2) {
        grid-area: a;
    }

    .board-center .board-cell:nth-child(3) {
        grid-area: b;
    }

    .board-center .board-cell:nth-child(4) {
        grid-area: c;
    }

    .board-center .board-cell:nth-child(5) {
        grid-area: d;
    }

    .board-center .board-cell:nth-child(6) {
        grid-area: e;
    }

    .board-center .board-cell:nth-child(7) {
        grid-area: f;
    }

    .board-center .board-cell:nth-child(8) {
        grid-area: g;
    }

    .board-center .board-cell:nth-child(9) {
        grid-area: h;
    }

    .board-center .board-cell:nth-child(10) {
        grid-area: i;
    }

    .board-center .board-cell:nth-child(11) {
        grid-area: j;
    }

    .board-center .board-cell:nth-child(12) {
        grid-area: k;
    }

    .board-center .board-cell:nth-child(13) {
        grid-area: l;
    }

    .board-center .board-cell:nth-child(14) {
        grid-area: m;
    }

    .board-center .board-cell:nth-child(15) {
        grid-area: n;
    }

    .board-center .board-cell:nth-child(16) {
        grid-area: o;
    }

    .board-center .board-cell:nth-child(17) {
        grid-area: p;
    }

    .board-center .board-cell:nth-child(18) {
        grid-area: q;
    }

    .board-center .board-cell:nth-child(19) {
        grid-area: r;
    }

    .board-center .board-cell:nth-child(20) {
        grid-area: s;
    }

    .board-center .board-cell:nth-child(21) {
        grid-area: t;
    }

    .board-center .board-cell:nth-child(22) {
        grid-area: u;
    }

    .board-center .board-cell:nth-child(23) {
        grid-area: v;
    }

    .board-center .board-cell:nth-child(24) {
        grid-area: w;
    }

    .board-center .board-cell:nth-child(25) {
        grid-area: x;
    }

    .board-center .board-cell:nth-child(26) {
        grid-area: y;
    }

    .board-center .board-cell:nth-child(27) {
        grid-area: z;
    }

    .board-center .board-cell:nth-child(28) {
        grid-area: aa;
    }

    .board-center .board-cell:nth-child(29) {
        grid-area: ab;
    }

    .board-center .board-cell:nth-child(30) {
        grid-area: ac;
    }

    .board-center .board-cell:nth-child(31) {
        grid-area: ad;
    }

    .board-center .board-cell:nth-child(32) {
        grid-area: ae;
    }

    .board-center .board-cell:nth-child(33) {
        grid-area: af;
    }

    .board-center .board-cell:nth-child(34) {
        grid-area: ag;
    }

    .board-center .board-cell:nth-child(35) {
        grid-area: ah;
    }

    .board-center .board-cell:nth-child(36) {
        grid-area: ai;
    }

    .board-center .board-cell:nth-child(37) {
        grid-area: aj;
    }

    .suspended-box {
        position: relative;
        pointer-events: none;
        cursor: none;
    }

    .roulette .suspended-box {
        cursor: unset;
        pointer-events: all;
    }

    .suspended-box::before {
        background-image: url(storage/front/img/lock.svg);
        background-size: 17px 17px;
        filter: invert(1);
        -webkit-filter: invert(1);
        background-repeat: no-repeat;
        content: "";
        position: absolute;
        z-index: 5;
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
        z-index: 1;
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

    .casino-last-results .result.black {
        background-color: #111111;
    }

    .casino-last-results .result.green {
        background-color: #17732e;
    }

    .casino-last-results .result.red {
        background-color: #b2121f;
    }

    .video-overlay {
        position: unset;
    }

    .video-box-container {
        max-width: calc(100% - 220px);
        margin-left: auto;
    }

    .casino-coins-container {
        position: absolute;
        bottom: 5px;
        left: 0;
        /* transform: translateX(-50%); */
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        gap: 5px;
        background: #0000004a;
        padding: 5px;
        border-radius: 0;
        flex-direction: column;
        /* background-image: linear-gradient(#2d5bc82e, #0000002e); */
        width: 220px;
    }

    .casino-coins-container {
        bottom: 0;
    }

    .casino-coin-box {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        position: relative;
        /* margin: 0 40px; */
        gap: 5px;
    }

    .casino-coin {
        position: relative;
    }

    .bet-chip-holder {
        width: 50px;
        height: 50px;
        flex: 0 0 50px;
        cursor: pointer;
    }

    .bet-chip:before {
        /* position: absolute; */
        content: "";
        display: block;
        padding-bottom: 100%;
    }

    .bet-chip-front {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-color: #00d700;
        /* background-image: url(https://rgs-livedealerwebclient.worldserviceprovider.com/29e7c40….svg); */
        background-repeat: no-repeat, no-repeat;
        background-position: center bottom, center;
        background-size: 100% auto, cover;
        border-radius: 50%;
        transition: transform 360ms var(--g-ttf), border-radius 360ms var(--g-ttf);
        z-index: 1;
    }

    .bet-chip-top {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-color: #00d700;
        border-radius: 50%;
        z-index: 2;
    }

    .bet-chip-amount {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 4;
    }

    .bet-chip-top:before,
    .bet-chip-top:after {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 4;
    }

    .bet-chip-top:before {
        width: 64%;
        height: 64%;
        margin: auto;
        /* background-color: var(--g-chip-inner-color); */
        z-index: 2;
    }

    .bet-chip-top:after {
        /* background-image: url(https://rgs-livedealerwebclient.worldserviceprovider.com/af4a3dba7a5c3b087d6a.svg); */
        /* background-image: url("../img/roulette/icon.svg"); */
        background-image: url(storage/front/img/coinicon.svg);
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        z-index: 3;
    }

    .bet-chip-amount svg {
        width: 100%;
        height: 100%;
        display: block;
    }

    .bet-chip-amount text {
        /* font-family: "Arvo", serif; */
        font-size: 32px;
        font-weight: bold;
        fill: #fff;
    }

    .casino-coin.active .bet-chip-amount text {
        font-weight: bold;
    }

    .casino-coin.active .bet-chip-holder {
        height: 60px;
        width: 60px;
    }

    .coin-btns {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        width: 100%;
        gap: 2px;
        /* flex-direction: column; */
        align-items: center;
    }

    .coin-btns .btn {
        /* background: #ff0000; */
        border: 0;
        border-radius: 0;
        height: 40px;
        width: 68px;
        display: flex;
        align-items: center;
        justify-content: center;
        /* flex-direction: column; */
        font-weight: bold;
        font-size: 12px;
        padding: 0;
        gap: 3px;
    }

    .coin-btns .btn:disabled {
        /* background-color: #6a6a6a; */
        opacity: 0.5;
    }

    .coin-arrow {
        position: absolute;
        color: #fff;
        font-size: 30px;
        background: #00000082;
        height: 40px;
        width: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }

    .coin-arrow.coin-arrow-left {
        left: -45px;
    }

    .coin-arrow.coin-arrow-right {
        right: -45px;
    }

    .back-1 {
        background-color: unset !important;
    }

    .backk-1 {
        cursor: pointer;
    }

    .board-center .bet-chip-area.center-left {
        top: 50%;
        left: 0;
        width: 50%;
        height: 50%;
        transform: translate3d(-50%, -50%, 0);
    }

    .board-center .bet-chip-area.bottom-left {
        bottom: 0;
        top: 50%;
        left: 0;
        width: 50%;
        height: 50%;
        transform: translate3d(-50%, 50%, 0);
    }

    .board-center .bet-chip-area.top-center {
        top: 0;
        left: 50%;
        width: 50%;
        height: 50%;
        transform: translate3d(-50%, -50%, 0);
    }

    .board-cell-in .bet-chip-area.coin-place {
        z-index: 14;
    }

    .pop-outin {
        animation: 2s anim-popoutin ease infinite;
    }

    @keyframes anim-popoutin {
        0% {
            color: black;
            transform: scale(0);
            opacity: 0;
            text-shadow: 0 0 0 rgba(0, 0, 0, 0);
        }

        25% {
            color: #ffdf00;
            transform: scale(2);
            opacity: 1;
            text-shadow: 3px 10px 5px rgba(0, 0, 0, 0.5);
        }

        50% {
            color: black;
            transform: scale(1);
            opacity: 1;
            text-shadow: 1px 0 0 rgba(0, 0, 0, 0);
        }

        100% {
            transform: scale(1);
            opacity: 1;
            text-shadow: 1px 0 0 rgba(0, 0, 0, 0);
        }
    }

    .casino-last-results .result.red {
        background-color: #db3131;
    }

    .casino-last-results .result.black {
        background-color: #3f3f3f;
    }

    .clock2digit {

        left: -18px !important;
        transform: scale(0.75) !important;
        top: -18px !important;
        bottom: unset !important;
        right: unset !important;
    }

    /* .iframedesign {
        max-width: calc(100% - 220px);
        margin-left: 220px;
    }

    .iframedesign_full {
        max-width: unset;
        margin-left: unset;
    } */

    .board-cell-in .casino-coin .bet-chip-holder {
        width: 35px;
        height: 35px;
    }

    .casino-video-cards {
        position: absolute;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.4);
        height: auto;
        padding: 5px;
        top: 0;
        transform: unset;
        left: 130px;
    }

    .flip-card {
        height: 64px;
        width: 80px;
    }

    .casino-video-cards h5 {
        font-weight: bold;
        text-transform: uppercase;
        color: #fff;
    }

    .casino-video-cards img {
        height: 100%;
        width: 100%;
    }

    .casino-video-cards img:last-child {
        margin-right: 0;
    }

    .casino-video-cards {
        display: none;
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
        /* .casino-video-rules-icon i:not(.fa-trash) {
    font-size: 24px !important;
    color: #fff;
    cursor: pointer;
} */
    .casino-video-rules-icon i.fa-trash {
    font-size: 16px;
    color: black;
}
.casino-video-rules-icon i.fa-redo {
    font-size: 16px;
    color: black;
}
.casino-video-rules-icon i.fa-undo {
    font-size: 16px;
    color: black;
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
            height: calc(100% - 10px);
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
                    <div class="game-heading"><span class="card-header-title">Beach Roulette

                        </span>

                        <span class="float-right">
                            Round ID:
                            <span class="round_no">0</span>

                        </span>
                    </div>

                    <div class="video-container">

                        <?php
                        if (!empty(IFRAME_URL_SET)) {
                        ?>
                            <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . ROULLETE12; ?>" width="100%"
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
                                             <iframe class="iframedesign" src="<?php echo IFRAME_URL;
                                                                                echo OURROULLETE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
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
                        <div id="result-desc" style="display:none;">
                            <div class="m-b-5"><span class="greenbx">Winner:</span> <span id="desc1"></span> </div>
                            <div class="m-b-5"><span class="redbx">A:</span> <span id="desc2"></span> </div>
                            <div class="m-b-5"><span class="yellowbx">B:</span> <span id="desc3"></span> </div>
                        </div>
                        <!-- <div class="video-overlay">

                            <div class="card-inner">
                              <h3 class="text-white">Board</h3>
                                <div><img src="/storage/front/img/cards_new/1.png" id="card_c5"></div>
                            </div>
                        </div> -->
                        <div class="casino-video-right-icons">
                            <div title="Rules" class="casino-video-rules-icon tooltip-container" id="tooltipBtn">
                                <i class="fas fa-info-circle" style="margin: 6px 0 0 6px;"></i>
                                <div class="tooltip-box">
                                    <div class="tooltip-header">Rules <span class="tooltip-close"
                                            id="tooltipClose">&times;</span></div>
                                    <div class="tooltip-content">
                                        <div class="rules-body">
                                            <div><style type="text/css">
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
.rule-inner-icon{
            background-color: #fff;
            color: #000;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 40px;
            width: 40px;
            font-size: 24px;
        }
    </style>


<div class="rules-section">
                                            <h6 class="rules-highlight">Game Rules:</h6>
                                            <p>The objective in Roulette is to predict the number on which the ball will land by placing one or more bets that cover that particular number. The wheel in European Roulette includes the numbers 1-36 plus a single 0 (zero).</p>
                                            <p>After betting time has expired, the ball is spun within the Roulette wheel. The ball will eventually come to rest in one of the numbered pockets within the wheel. You win if you have placed a bet that covers that particular number..</p>
                                        </div>
</div><div><div class="rules-section">
                                            <h6 class="rules-highlight">Bet Types:</h6>
                                            <p>You can place many different kinds of bets on the Roulette table. Bets can cover a single number or a certain range of numbers, and each type of bet has its own payout rate.</p>
                                            <p>Bets made on the numbered spaces on the betting area, or on the lines between them, are called Inside Bets, while bets made on the special boxes below and to the side of the main grid of numbers are called Outside Bets.</p>
                                        </div></div><div><div class="rules-section">
                                            <h6 class="rules-highlight">INSIDE BETS:</h6>
                                            <ul class="pl-2 pr-2 list-style">
                                                <li><b>Straight Up</b> — place your chip directly on any single number (including zero).</li>
                                                <li><b>Split Bet</b> — place your chip on the line between any two numbers, either on the vertical or horizontal.</li>
                                                <li><b>Street Bet</b> — place your chip at the end of any row of numbers. A Street Bet covers remaining numbers on that Street.</li>
                                                <li><b>Corner Bet</b> — place your chip at the corner (central intersection) where four numbers meet. All remaining numbers on that corner are covered.</li>
                                               
                                            </ul>
                                            <br>
                                            <br>
                                        </div></div><div><div class="rules-section">
                                            <h6 class="rules-highlight">OUTSIDE BETS:</h6>
                                            <ul class="pl-2 pr-2 list-style">
                                                <li><b>Column Bet</b> — place your chip in one of the boxes marked "2 to 1" at the end of the column that covers all remaining numbers in that column. The zero is not covered by any column bet.</li>
                                                <li><b>Dozen Bet</b> — place your chip in one of the three boxes marked "1st 12," "2nd 12" or "3rd 12" to cover the remaining numbers alongside the box.</li>
                                                <li><b>Red/Black</b> — place your chip in the Red or Black box to cover the all remaining red or all remaining black numbers. The zero is not covered by these bets.</li>
                                                <li><b>Even/Odd</b> — place your chip in one of these boxes to cover the remaining even or remaining odd numbers. The zero is not covered by these bets.</li>
                                                <li><b>1-18/19-36</b> — place your chip in either of these boxes to cover the first or second set of remaining numbers. The zero is not covered by these bets.</li>
                                            </ul>
                                            <br>
                                        </div></div><div><div class="rules-section">
                                            <h6 class="rules-highlight">Winning Numbers:</h6>
                                            <p>The WINNING NUMBERS display shows the most recent winning numbers.</p>
                                        </div></div><div><div class="rules-section">
                                            <h6 class="rules-highlight">Place Bets &amp; Payouts:</h6>
                                            <p>In Settings icon shows the minimum and maximum allowed bet limits at the table, which may change from time to time. Open the Bet Limits to check your current limits.</p>
                                            <p>In Settings icon also shows the payouts of all covers section.</p>
                                            <p>To participate in the game, you must have sufficient funds to cover your bets. You can see your current BALANCE on your screen.</p>
                                        </div></div><div><div class="rules-section">
                                            <h6 class="rules-highlight">PLACE YOUR BETS:</h6>
                                            <p>The CHIP DISPLAY allows you to select the value of each chip you wish to bet. Only chips of denominations that can be covered by your current balance will be enabled and you can change chips amount from Set Button Values.</p>
                                            <p>Once you have selected a chip, place your bet by simply clicking/tapping the appropriate betting spot on the game table. Each time you click/tap the betting spot, the amount of your bet increases by the value of the selected chip or up to the maximum limit for the type of bet you have selected. Once you have bet the maximum limit, no additional funds will be accepted for that bet, and a message will appear above your bet to notify you that you have bet the maximum.</p>
                                            <p><b>NOTE:</b> Please do not minimise your browser or open any other tab in your browser while betting time remains, and you have placed bets on the table. Such actions may be interpreted as leaving the game, and your bets will therefore be declined for that particular game round.</p>
                                        </div></div><div><div class="rules-section">
                                            <p>The Clear button becomes available after you have placed any bet. that clear all your bets.</p>
                                            <p>
                                                <span class="rule-inner-icon"><i class="fas fa-trash"></i></span>
                                            </p>
                                            <p>The Rebet button allows you to repeat all bets from the previous game round. This button is available only before the first chip is placed.</p>
                                            <p>
                                                <span class="rule-inner-icon"><i class="fas fa-redo"></i></span>
                                            </p>
                                            <p>The Undo button removes the last bet you placed.</p>
                                            <p>
                                                <span class="rule-inner-icon"><i class="fas fa-undo"></i></span>
                                            </p>
                                        </div>
                                        <div class="rules-section">
                                            <h6 class="rules-highlight">Back table limits:</h6>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Covers</th>
                                                            <th>Team</th>
                                                            <th>Pays</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1 Nr</td>
                                                            <td>Straight bet</td>
                                                            <td>35:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2 Nrs</td>
                                                            <td>Split bet</td>
                                                            <td>17:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3 Nrs</td>
                                                            <td>Street bet</td>
                                                            <td>11:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>4 Nrs</td>
                                                            <td>Corner bet</td>
                                                            <td>8:1</td>
                                                        </tr>
 <tr>
                                                            <td>12 Nrs</td>
                                                            <td>Dozen bet</td>
                                                            <td>2:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>18 Nrs</td>
                                                            <td>Half board</td>
                                                            <td>1:1</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="rules-section">
                                            <h6 class="rules-highlight">Lay table limits:</h6>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Covers</th>
                                                            <th>Team</th>
                                                            <th>Pays</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1 Nr</td>
                                                            <td>Straight bet</td>
                                                            <td>39:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2 Nrs</td>
                                                            <td>Split bet</td>
                                                            <td>19.5:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3 Nrs</td>
                                                            <td>Street bet</td>
                                                            <td>13:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>4 Nrs</td>
                                                            <td>Corner bet</td>
                                                            <td>9.75:1</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td>12 Nrs</td>
                                                            <td>Dozen bet</td>
                                                            <td>3.25:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>18 Nrs</td>
                                                            <td>Half board</td>
                                                            <td>2.1:1</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="casino-detail">
                        <div class="casino-table">
                            <div class="casino-table-box">
                                <div class="roulette-box-container">
                                    <div class="board-in">
                                        <div class="board-right">
                                            <div class="board-cell yellow market_138_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-text">2to1</span>

                                                    <div class="bet-chip-area center-center coin-place market_138_b_btn backk-1" id="138"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell yellow market_137_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-text">2to1</span>
                                                    <div class="bet-chip-area center-center coin-place market_137_b_btn backk-1" id="137"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell yellow market_136_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-text">2to1</span>
                                                    <div class="bet-chip-area center-center coin-place market_136_b_btn backk-1" id="136"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="board-bottom">
                                            <div class="board-cell yellow market_133_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-text">1st12</span>
                                                    <div class="bet-chip-area center-center coin-place market_133_b_btn backk-1" id="133"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell yellow market_134_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-text">2nd12</span>
                                                    <div class="bet-chip-area center-center coin-place market_134_b_btn backk-1" id="134"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell yellow market_135_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-text">3rd12</span>
                                                    <div class="bet-chip-area center-center coin-place market_135_b_btn backk-1" id="135"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell yellow market_139_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-text">1 - 18</span>
                                                    <div class="bet-chip-area center-center coin-place market_139_b_btn backk-1" id="139"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell yellow market_144_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-text">Even</span>
                                                    <div class="bet-chip-area center-center coin-place market_144_b_btn backk-1" id="144"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell yellow market_141_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-text">Red</span>
                                                    <div class="bet-chip-area center-center coin-place market_141_b_btn backk-1" id="141"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell yellow market_142_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-text">Black</span>
                                                    <div class="bet-chip-area center-center coin-place market_142_b_btn backk-1" id="142"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell yellow market_143_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-text">Odd</span>
                                                    <div class="bet-chip-area center-center coin-place market_143_b_btn backk-1" id="143"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell yellow market_140_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-text">19 - 36</span>
                                                    <div class="bet-chip-area center-center coin-place market_140_b_btn backk-1" id="140"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="board-center">
                                            <div class="board-cell green market_1_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">0</span>
                                                    <div class="bet-chip-area center-center coin-place market_1_b_btn backk-1" id="1"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell red market_2_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">1</span>
                                                    <div class="bet-chip-area center-left coin-place market_38_b_btn backk-1" id="38"></div>
                                                    <div class="bet-chip-area center-center coin-place market_2_b_btn backk-1" id="2"></div>
                                                    <div class="bet-chip-area bottom-left coin-place market_110_b_btn backk-1" id="110"></div>
                                                    <div class="bet-chip-area top-center coin-place market_74_b_btn backk-1" id="74"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell black market_3_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">2</span>
                                                    <div class="bet-chip-area center-left coin-place market_39_b_btn backk-1" id="39"></div>
                                                    <div class="bet-chip-area center-center coin-place market_3_b_btn backk-1" id="3"></div>
                                                    <div class="bet-chip-area bottom-left coin-place market_145_b_btn backk-1" id="145"></div>
                                                    <div class="bet-chip-area top-center coin-place market_75_b_btn backk-1" id="75"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell red market_4_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">3</span>
                                                    <div class="bet-chip-area center-left coin-place market_40_b_btn backk-1" id="40"></div>
                                                    <div class="bet-chip-area center-center coin-place market_4_b_btn backk-1" id="4"></div>
                                                    <div class="bet-chip-area bottom-left coin-place market_146_b_btn backk-1" id="146"></div>
                                                    <div class="bet-chip-area top-center coin-place market_98_b_btn backk-1" id="98"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell black market_5_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">4</span>
                                                    <div class="bet-chip-area center-left coin-place market_41_b_btn backk-1" id="41"></div>
                                                    <div class="bet-chip-area center-center coin-place market_5_b_btn backk-1" id="5"></div>
                                                    <div class="bet-chip-area top-center coin-place market_76_b_btn backk-1" id="76"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell red market_6_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">5</span>
                                                    <div class="bet-chip-area center-left coin-place market_52_b_btn backk-1" id="52"></div>
                                                    <div class="bet-chip-area center-center coin-place market_6_b_btn backk-1" id="6"></div>
                                                    <div class="bet-chip-area bottom-left coin-place market_111_b_btn backk-1" id="111"></div>
                                                    <div class="bet-chip-area top-center coin-place market_77_b_btn backk-1" id="77"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell black market_7_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">6</span>
                                                    <div class="bet-chip-area center-left coin-place market_63_b_btn backk-1" id="63"></div>
                                                    <div class="bet-chip-area center-center coin-place market_7_b_btn backk-1" id="7"></div>
                                                    <div class="bet-chip-area bottom-left coin-place market_112_b_btn backk-1" id="112"></div>
                                                    <div class="bet-chip-area top-center coin-place market_99_b_btn backk-1" id="99"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell red market_8_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">7</span>
                                                    <div class="bet-chip-area center-left coin-place market_42_b_btn backk-1" id="42"></div>
                                                    <div class="bet-chip-area center-center coin-place market_8_b_btn backk-1" id="8"></div>
                                                    <div class="bet-chip-area top-center coin-place market_78_b_btn backk-1" id="78"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell black market_9_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">8</span>
                                                    <div class="bet-chip-area center-left coin-place market_53_b_btn backk-1" id="53"></div>
                                                    <div class="bet-chip-area center-center coin-place market_9_b_btn backk-1" id="9"></div>
                                                    <div class="bet-chip-area bottom-left coin-place market_113_b_btn backk-1" id="113"></div>
                                                    <div class="bet-chip-area top-center coin-place market_79_b_btn backk-1" id="79"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell red market_10_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">9</span>
                                                    <div class="bet-chip-area center-left coin-place market_64_b_btn backk-1" id="64"></div>
                                                    <div class="bet-chip-area center-center coin-place market_10_b_btn backk-1" id="10"></div>
                                                    <div class="bet-chip-area bottom-left coin-place market_114_b_btn backk-1" id="114"></div>
                                                    <div class="bet-chip-area top-center coin-place market_100_b_btn backk-1" id="100"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell black market_11_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">10</span>
                                                    <div class="bet-chip-area center-left coin-place market_43_b_btn backk-1" id="43"></div>
                                                    <div class="bet-chip-area center-center coin-place market_11_b_btn backk-1" id="11"></div>
                                                    <div class="bet-chip-area top-center coin-place market_80_b_btn backk-1" id="80"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell black market_12_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">11</span>
                                                    <div class="bet-chip-area center-left coin-place market_54_b_btn backk-1" id="54"></div>
                                                    <div class="bet-chip-area center-center coin-place market_12_b_btn backk-1" id="12"></div>
                                                    <div class="bet-chip-area bottom-left coin-place market_115_b_btn backk-1" id="115"></div>
                                                    <div class="bet-chip-area top-center coin-place market_81_b_btn backk-1" id="81"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell red market_13_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">12</span>
                                                    <div class="bet-chip-area center-left coin-place market_65_b_btn backk-1" id="65"></div>
                                                    <div class="bet-chip-area center-center coin-place market_13_b_btn backk-1" id="13"></div>
                                                    <div class="bet-chip-area bottom-left coin-place market_116_b_btn backk-1" id="116"></div>
                                                    <div class="bet-chip-area top-center coin-place market_101_b_btn backk-1" id="101"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell black market_14_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">13</span>
                                                    <div class="bet-chip-area center-left coin-place market_44_b_btn backk-1" id="44"></div>
                                                    <div class="bet-chip-area center-center coin-place market_14_b_btn backk-1" id="14"></div>
                                                    <div class="bet-chip-area top-center coin-place market_82_b_btn backk-1" id="82"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell red market_15_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">14</span>
                                                    <div class="bet-chip-area center-left coin-place market_55_b_btn backk-1" id="55"></div>
                                                    <div class="bet-chip-area center-center coin-place market_15_b_btn backk-1" id="15"></div>
                                                    <div class="bet-chip-area bottom-left coin-place market_117_b_btn backk-1" id="117"></div>
                                                    <div class="bet-chip-area top-center coin-place market_83_b_btn backk-1" id="83"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell black market_16_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">15</span>
                                                    <div class="bet-chip-area center-left coin-place market_66_b_btn backk-1" id="66"></div>
                                                    <div class="bet-chip-area center-center coin-place market_16_b_btn backk-1" id="16"></div>
                                                    <div class="bet-chip-area bottom-left coin-place market_118_b_btn backk-1" id="118"></div>
                                                    <div class="bet-chip-area top-center coin-place market_102_b_btn backk-1" id="102"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell red market_17_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">16</span>
                                                    <div class="bet-chip-area center-left coin-place market_45_b_btn backk-1" id="45"></div>
                                                    <div class="bet-chip-area center-center coin-place market_17_b_btn backk-1" id="17"></div>
                                                    <div class="bet-chip-area top-center coin-place market_84_b_btn backk-1" id="84"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell black market_18_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">17</span>
                                                    <div class="bet-chip-area center-left coin-place market_56_b_btn backk-1" id="56"></div>
                                                    <div class="bet-chip-area center-center coin-place market_18_b_btn backk-1" id="18"></div>
                                                    <div class="bet-chip-area bottom-left coin-place market_119_b_btn backk-1" id="119"></div>
                                                    <div class="bet-chip-area top-center coin-place market_85_b_btn backk-1" id="85"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell red market_19_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">18</span>
                                                    <div class="bet-chip-area center-left coin-place market_67_b_btn backk-1" id="67"></div>
                                                    <div class="bet-chip-area center-center coin-place market_19_b_btn backk-1" id="19"></div>
                                                    <div class="bet-chip-area bottom-left coin-place market_120_b_btn backk-1" id="120"></div>
                                                    <div class="bet-chip-area top-center coin-place market_103_b_btn backk-1" id="103"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell red market_20_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">19</span>
                                                    <div class="bet-chip-area center-left coin-place market_19_b_btn backk-1" id="46"></div>
                                                    <div class="bet-chip-area center-center coin-place market_20_b_btn backk-1" id="20"></div>
                                                    <div class="bet-chip-area top-center coin-place market_86_b_btn backk-1" id="86"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell black market_21_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">20</span>
                                                    <div class="bet-chip-area center-left coin-place market_57_b_btn backk-1" id="57"></div>
                                                    <div class="bet-chip-area center-center coin-place market_21_b_btn backk-1" id="21"></div>
                                                    <div class="bet-chip-area bottom-left coin-place market_121_b_btn backk-1" id="121"></div>
                                                    <div class="bet-chip-area top-center coin-place market_87_b_btn backk-1" id="87"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell red market_22_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">21</span>
                                                    <div class="bet-chip-area center-left coin-place market_68_b_btn backk-1" id="68"></div>
                                                    <div class="bet-chip-area center-center coin-place market_22_b_btn backk-1" id="22"></div>
                                                    <div class="bet-chip-area bottom-left coin-place market_122_b_btn backk-1" id="122"></div>
                                                    <div class="bet-chip-area top-center coin-place market_104_b_btn backk-1" id="104"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell black market_23_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">22</span>
                                                    <div class="bet-chip-area center-left coin-place market_47_b_btn backk-1" id="47"></div>
                                                    <div class="bet-chip-area center-center coin-place market_23_b_btn backk-1" id="23"></div>
                                                    <div class="bet-chip-area top-center coin-place market_88_b_btn backk-1" id="88"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell red market_24_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">23</span>
                                                    <div class="bet-chip-area center-left coin-place market_58_b_btn backk-1" id="58"></div>
                                                    <div class="bet-chip-area center-center coin-place market_24_b_btn backk-1" id="24"></div>
                                                    <div class="bet-chip-area bottom-left coin-place market_123_b_btn backk-1" id="123"></div>
                                                    <div class="bet-chip-area top-center coin-place market_89_b_btn backk-1" id="89"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell black market_25_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">24</span>
                                                    <div class="bet-chip-area center-left coin-place market_69_b_btn backk-1" id="69"></div>
                                                    <div class="bet-chip-area center-center coin-place market_25_b_btn backk-1" id="25"></div>
                                                    <div class="bet-chip-area bottom-left coin-place market_124_b_btn backk-1" id="124"></div>
                                                    <div class="bet-chip-area top-center coin-place market_105_b_btn backk-1" id="105"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell red market_26_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">25</span>
                                                    <div class="bet-chip-area center-left coin-place market_48_b_btn backk-1" id="48"></div>
                                                    <div class="bet-chip-area center-center coin-place market_26_b_btn backk-1" id="26"></div>
                                                    <div class="bet-chip-area top-center coin-place market_90_b_btn backk-1" id="90"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell black market_27_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">26</span>
                                                    <div class="bet-chip-area center-left coin-place market_59_b_btn backk-1" id="59"></div>
                                                    <div class="bet-chip-area center-center coin-place market_27_b_btn backk-1" id="27"></div>
                                                    <div class="bet-chip-area bottom-left coin-place market_125_b_btn backk-1" id="125"></div>
                                                    <div class="bet-chip-area top-center coin-place market_91_b_btn backk-1" id="91"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell red market_28_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">27</span>
                                                    <div class="bet-chip-area center-left coin-place market_70_b_btn backk-1" id="70"></div>
                                                    <div class="bet-chip-area center-center coin-place market_28_b_btn backk-1" id="28"></div>
                                                    <div class="bet-chip-area bottom-left coin-place market_126_b_btn backk-1" id="126"></div>
                                                    <div class="bet-chip-area top-center coin-place market_106_b_btn backk-1" id="106"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell black market_29_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">28</span>
                                                    <div class="bet-chip-area center-left coin-place market_49_b_btn backk-1" id="49"></div>
                                                    <div class="bet-chip-area center-center coin-place market_29_b_btn backk-1" id="29"></div>
                                                    <div class="bet-chip-area top-center coin-place market_92_b_btn backk-1" id="92"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell black market_30_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">29</span>
                                                    <div class="bet-chip-area center-left coin-place market_60_b_btn backk-1" id="60"></div>
                                                    <div class="bet-chip-area center-center coin-place market_30_b_btn backk-1" id="30"></div>
                                                    <div class="bet-chip-area bottom-left coin-place market_127_b_btn backk-1" id="127"></div>
                                                    <div class="bet-chip-area top-center coin-place market_93_b_btn backk-1" id="93"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell red market_31_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">30</span>
                                                    <div class="bet-chip-area center-left coin-place market_71_b_btn backk-1" id="71"></div>
                                                    <div class="bet-chip-area center-center coin-place market_31_b_btn backk-1" id="31"></div>
                                                    <div class="bet-chip-area bottom-left coin-place market_128_b_btn backk-1" id="128"></div>
                                                    <div class="bet-chip-area top-center coin-place market_107_b_btn backk-1" id="107"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell black market_32_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">31</span>
                                                    <div class="bet-chip-area center-left coin-place market_50_b_btn backk-1" id="50"></div>
                                                    <div class="bet-chip-area center-center coin-place market_32_b_btn backk-1" id="32"></div>
                                                    <div class="bet-chip-area top-center coin-place market_94_b_btn backk-1" id="94"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell red market_33_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">32</span>
                                                    <div class="bet-chip-area center-left coin-place market_61_b_btn backk-1" id="61"></div>
                                                    <div class="bet-chip-area center-center coin-place market_33_b_btn backk-1" id="33"></div>
                                                    <div class="bet-chip-area bottom-left coin-place market_129_b_btn backk-1" id="129"></div>
                                                    <div class="bet-chip-area top-center coin-place market_95_b_btn backk-1" id="95"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell black market_34_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">33</span>
                                                    <div class="bet-chip-area center-left coin-place market_72_b_btn backk-1" id="72"></div>
                                                    <div class="bet-chip-area center-center coin-place market_34_b_btn backk-1" id="34"></div>
                                                    <div class="bet-chip-area bottom-left coin-place market_130_b_btn backk-1" id="130"></div>
                                                    <div class="bet-chip-area top-center coin-place market_108_b_btn backk-1" id="108"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell red market_35_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number ">34</span>
                                                    <div class="bet-chip-area center-left coin-place market_51_b_btn backk-1" id="51"></div>
                                                    <div class="bet-chip-area center-center coin-place market_35_b_btn backk-1" id="35"></div>
                                                    <div class="bet-chip-area top-center coin-place market_96_b_btn backk-1" id="96"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell black market_36_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">35</span>
                                                    <div class="bet-chip-area center-left coin-place market_62_b_btn backk-1" id="62"></div>
                                                    <div class="bet-chip-area center-center coin-place market_36_b_btn backk-1" id="36"></div>
                                                    <div class="bet-chip-area bottom-left coin-place market_131_b_btn backk-1" id="131"></div>
                                                    <div class="bet-chip-area top-center coin-place market_97_b_btn backk-1" id="97"></div>
                                                </div>
                                            </div>
                                            <div class="board-cell red market_37_row suspended-box">
                                                <div class="board-cell-in">
                                                    <span class="board-number">36</span>
                                                    <div class="bet-chip-area center-left coin-place market_73_b_btn backk-1" id="73"></div>
                                                    <div class="bet-chip-area center-center coin-place market_37_b_btn backk-1" id="37"></div>
                                                    <div class="bet-chip-area bottom-left coin-place market_132_b_btn backk-1" id="132"></div>
                                                    <div class="bet-chip-area top-center coin-place market_109_b_btn backk-1" id="109"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=roulette11">View All</a></span></div>
                        <div class="casino-last-results" id="last-result"></div>
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

        <div id="modalroulette11result" class="modal fade show" tabindex="-1">

            <div class="modal-dialog" style="min-width: 1000px">

                <div class="modal-content">

                    <div class="modal-header">

                        <h4 class="modal-title">ROULLETE12 </h4>

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
    var markettype = "ROULLETE12";
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
            socket.emit('Room', 'roullete12');
        });

        socket.on('gameIframe', function(data) {
            $("#casinoIframe").attr('src', data);
        });
        socket.on('game', function(data) {
            console.log("data",data);

            if (data && data['t1'] && data['t1'][0]) {
                if (oldGameId != data.t1[0].mid && data.t1[0].mid != 0 && data.t1[0].mid != "0") {
                    setTimeout(function() {
                        clearCards();
                    }, <?php // echo CASINO_RESULT_TIMEOUT; 
                        ?>);
                }

                oldGameId = data.t1[0].mid;
                if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark").text(data.t1[0].remark);
                    var desc = data.t1[0].desc;
                    desc_array = desc.split("##");
                    if (desc != "") {
                        $("#result-desc").show();
                        desc1 = desc_array[0];
                        desc2 = desc_array[1];
                        desc3 = desc_array[2];
                        $("#desc1").text(desc1);
                        $("#desc2").text(desc2);
                        $("#desc3").text(desc3);
                    } else {
                        $("#result-desc").hide();
                    }

                    if (data.t1[0].C1 != 1) {
                        $("#card_c1").attr("src", site_url + "storage/front/img/cards_new/roulette/" + data.t1[0].C1 +
                            ".png");
                    }

                    if (data.t1[0].C2 != 1) {
                        $("#card_c2").attr("src", site_url + "storage/front/img/cards_new/roulette/" + data.t1[0].C2 +
                            ".png");
                    }

                    if (data.t1[0].C3 != 1) {
                        $("#card_c3").attr("src", site_url + "storage/front/img/cards_new/roulette/" + data.t1[0].C3 +
                            ".png");
                    }
                    if (data.t1[0].C4 != 1) {
                        $("#card_c4").attr("src", site_url + "storage/front/img/cards_new/roulette/" + data.t1[0].C4 +
                            ".png");
                    }
                    if (data.t1[0].C5 != 1) {
                        $("#card_c5").attr("src", site_url + "storage/front/img/cards_new/roulette/" + data.t1[0].C5 +
                            ".png");
                    }
                    if (data.t1[0].C6 != 1) {
                        $("#card_c6").attr("src", site_url + "storage/front/img/cards_new/roulette/" + data.t1[0].C6 +
                            ".png");
                    }
                    if (data.t1[0].C7 != 1) {
                        $("#card_c7").attr("src", site_url + "storage/front/img/cards_new/roulette/" + data.t1[0].C7 +
                            ".png");
                    }
                    if (data.t1[0].C8 != 1) {
                        $("#card_c8").attr("src", site_url + "storage/front/img/cards_new/roulette/" + data.t1[0].C8 +
                            ".png");
                    }
                    if (data.t1[0].C9 != 1) {
                        $("#card_c9").attr("src", site_url + "storage/front/img/cards_new/roulette/" + data.t1[0].C9 +
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
                    l1 = data['t2'][j].l1;
                    markettype = "ROULLETE12";
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
                for (var j in data['t3']) {
                    selectionid = parseInt(data['t3'][j].sid);
                    runner = data['t3'][j].nation;
                    b1 = data['t3'][j].b1;
                    l1 = data['t3'][j].l1;
                    markettype = "ROULLETE12";
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
                    gstatus = data['t3'][j].gstatus.toString();
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

    function clearCards() {
        // refresh(markettype);
        $("#card_c1").attr("src", site_url + "storage/front/img/cards_new/1.png");
        $("#card_c2").attr("src", site_url + "storage/front/img/cards_new/1.png");
        $("#card_c3").attr("src", site_url + "storage/front/img/cards_new/1.png");
        $("#card_c4").attr("src", site_url + "storage/front/img/cards_new/1.png");
        $("#card_c5").attr("src", site_url + "storage/front/img/cards_new/1.png");
        $("#card_c6").attr("src", site_url + "storage/front/img/cards_new/1.png");
        $("#card_c7").attr("src", site_url + "storage/front/img/cards_new/1.png");
        $("#card_c8").attr("src", site_url + "storage/front/img/cards_new/1.png");
        $("#card_c9").attr("src", site_url + "storage/front/img/cards_new/1.png");
    }

    function updateResult(data) {
        if (data && data[0]) {
            /* data = JSON.parse(JSON.stringify(data)); */
            resultGameLast = data[0].mid;
            if (last_result_id != resultGameLast) {
                last_result_id = resultGameLast;

            }

            html = "";
            var ab = "";
            var ab1 = "";

            casino_type = "'roullete12'";
            data.forEach((runData) => {
                if (parseInt(runData.win) == 1) {
                    ab = "result-a";
                    ab1 = "A";

                } else if (parseInt(runData.win) == 2) {
                    ab = "result-b";
                    ab1 = "B";

                } else {
                    ab = "playertie";
                    ab1 = "T";

                }

                eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] :
                    runData.mid;
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type +
                    ')"  class="result ml-1  ' + ab + '">' + ab1 + '</span>';
            });
            $("#last-result").html(html);
            if (oldGameId == 0 || oldGameId == resultGameLast) {
                $("#card_c1").attr("src", site_url + "storage/front/img/cards_new/1.png");
                $("#card_c2").attr("src", site_url + "storage/front/img/cards_new/1.png");
                $("#card_c3").attr("src", site_url + "storage/front/img/cards_new/1.png");
                $("#card_c4").attr("src", site_url + "storage/front/img/cards_new/1.png");
                $("#card_c5").attr("src", site_url + "storage/front/img/cards_new/1.png");
                $("#card_c6").attr("src", site_url + "storage/front/img/cards_new/1.png");
                $("#card_c7").attr("src", site_url + "storage/front/img/cards_new/1.png");
                $("#card_c8").attr("src", site_url + "storage/front/img/cards_new/1.png");
                $("#card_c9").attr("src", site_url + "storage/front/img/cards_new/1.png");

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
            url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/roullete12/' + event_id,
            dataType: 'json',
            data: {
                event_id: event_id,
                casino_type: casino_type
            },
            success: function(response) {
                $('#modalroullete12result').modal('show');
                $("#cards_data1").html(response.result);
            }
        });
    }

    function get_round_no() {
        return $.trim($('.round_no').text());
    }

    $('.last-result').on('click', function() {

        $('#modalroullete12result').modal('show');
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
            url: MASTER_URL + '/live-market/roullete12/active_bets/roullete12/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/roullete12/view_more_matched/roullete12/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/roullete12/market_analysis/roullete12/' + get_round_no(),
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