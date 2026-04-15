<?php
include("include/conn.php");
include('include/flip_function.php');
include('session.php');
$user_id = $_SESSION['CLIENT_LOGIN_ID'];

$get_parent_ids = $conn->query("select parentSuperMDL from user_login_master where UserID=$user_id");
$fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
$parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];

$get_access = $conn->query("select cricket_access,soccer_access,soccer_access,video_access from user_master where Id=$parentSuperMDL");
$fetch_access = mysqli_fetch_assoc($get_access);

if ($fetch_access['video_access'] != 1) {
    echo "<script>alert('you are does not access this game');window.location.href='/';</script>";
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<?php
include("head_css.php");
?>
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
    .iframedesign {
        max-width: calc(100% - 220px);
        margin-left: 220px;
    }
    .iframedesign_full {
        max-width: unset;
        margin-left: unset;
    }
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

    .sidebar-box {
        margin-bottom: 5px;
    }

    .sidebar-title {
        background-color: var(--bg-primary);
        color: var(--text-primary);
        position: relative;
        height: 30px;
        display: flex;
        align-items: center;
    }

    .sidebar-title {
        background-color: #b97242;
        color: #FFFFFF;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        padding: 0px 5px 0px 0px;
    }

    .sidebar-title h4 {
        font-size: 14px;
        font-weight: bold;
        padding: 4px;
    }

    .roulette11-table-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        background-color: f7f7f7;
        color: #333;
        border-bottom: 1px solid #c7c8ca;
        border-left: 1px solid #c7c8ca;
    }

    .roulette11-table-cell {
        max-width: 50%;
        width: 33.33%;
        text-align: center;
        display: flex;
        justify-content: space-between;
        flex: 1 1 0%;
        padding: 4px 8px;
        border-right: 1px solid #c7c8ca;
    }

</style>

<body cz-shortcut-listen="true" class="" data-modal-open-count="0" style="">
    <div id="app">
        <?php
        include("loader.php");
        ?>
        <div class="wrapper">
            <?php
            include("header.php");
            ?>
            <div class="main">
                <div class="container-fluid container-fluid-5">
                    <div class="row row5">
                        <?php
                        include("left_sidebar.php");
                        ?>
                        <!---->
                        <div class="col-md-10 featured-box">
                            <div class="row row5 teenpatti-1day">
                                <div class="col-md-9 coupon-card featured-box-detail">
                                    <div class="coupon-card">
                                        <div class="game-heading"><span class="card-header-title">Beach Roulette
                                                <!-- <small role="button" class="teenpatti-rules"  onclick="view_rules('tp-rules.jpg')" data-target="#rules_popup" data-toggle="modal"  tabindex="0"><u>Rules</u></small> --> <!----></span>
                                            <small role="button" class="teenpatti-rules" onclick="view_rules('roulette12')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small>
                                            <span class="float-right">
                                                Round ID:
                                                <span class="round_no">0</span><!--   | Min: <span>100</span> | Max: <span>500000</span> --></span>
                                        </div>
                                        <!---->
                                        
                                        <div class="video-container">
                                            <?php
                                            if (!empty(IFRAME_URL_SET)) {
                                            ?>
                                                <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . ROULETTE12_CODE; ?>" width="100%" height="200px" style="border: 0px;"></iframe>
                                            <?php

                                            } else {
                                            ?>
                                                <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                            <?php

                                            }
                                            ?>
                                           
                                            <div class="casino-video-cards ">
                                                <div>
                                                    <div class="flip-card-container">
                                                        <div class="flip-card">
                                                            <div class="flip-card-inner">
                                                                <div class="flip-card-front">
                                                                    <img id="card_c1" src="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                                <div class="casino-coins-container">
                                                    <div class="casino-coin-box">
                                                        <?php
                                                        $get_button_value = $conn->query("select * from user_master where id=$user_id and (casino_button_value <> '' and casino_button_value IS NOT NULL)");
                                                        $num_rows = $get_button_value->num_rows;
                                                        $button_array = array();
                                                        if ($num_rows <= 0) {
                                                            $button_array[] = 100;
                                                            $button_array[] = 150;
                                                            $button_array[] = 200;
                                                            $button_array[] = 250;
                                                            $button_array[] = 300;
                                                        } else {
                                                            $fetch_button_value_data = mysqli_fetch_assoc($get_button_value);
                                                            $fetch_button_value = $fetch_button_value_data['casino_button_value'];
                                                            $default_stake = $fetch_button_value_data['default_stake'];
                                                            $one_bet_default_stake = $fetch_button_value_data['one_bet_default_stake'];
                                                            $button_array = explode(",", $fetch_button_value);
                                                        }
                                                        $j_active = 1;
                                                        $stack_value = 0;
                                                        sort($button_array);
                                                        foreach ($button_array as $button_value) {
                                                            if ($button_value >= 1000) {
                                                                $labelprint = $button_value / 1000;
                                                                $labelprint = $labelprint . "k";
                                                            } else {
                                                                $labelprint = $button_value;
                                                            }
                                                            $active_class = "";
                                                            if ($j_active == 1) {
                                                                $active_class = "active";
                                                                $stack_value = $button_value;
                                                            }
                                                        ?>
                                                            <div class="casino-coin stackclick <? echo $active_class; ?>" data-value="<? echo $button_value; ?>"">
                                                            <div class=" bet-chip-holder">
                                                                <div class="bet-chip">
                                                                    <div class="bet-chip-front"></div>
                                                                    <div class="bet-chip-top"></div>
                                                                    <div class="bet-chip-amount">
                                                                        <svg class="bet-chip-amount-in" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 108 108">
                                                                            <text class="bet-chip-amount-label" x="50%" y="53.5%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="32" font-weight="700"><?php echo $labelprint; ?></text>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                <?
                                                            $j_active++;
                                                        }
                                                ?>

                                                </div>
                                                <div class="coin-btns">
                                                    <div class="undo_bet"><button class="btn btn-danger btnss" disabled><i class="fas fa-undo"></i><span class="d-none d-md-flex">Undo Bet</span></button><span class="d-md-none">Undo Bet</span></div>
                                                    <div class="repeat_bet"><button class="btn btn-info"><i class="fas fa-redo"></i><span class="d-none d-md-flex">Repeat</span></button><span class="d-md-none">Repeat</span></div>
                                                    <div class="clear_bet"><button class="btn btn-warning btnss" disabled><i class="fas fa-trash"></i><span class="d-none d-md-flex">Clear</span></button><span class="d-md-none">Clear</span></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="casino-detail">
                                        <div class="casino-table">
                                            <div class="transfer-board">
                                                <div class="switch-board-icon">
                                                    <div class="tabclick back active" data-bettype="Back">Back</div>
                                                    <div class="tabclick lay" data-bettype="Lay">Lay</div>
                                                </div>
                                                <h5 class="d-block d-lg-none"><a href="/casino/roulette12">Statistics</a></h5>
                                            </div>
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
                                        <div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=roulette12">View All</a></span></div>
                                        <div class="casino-last-results" id="last-result"></div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            include("right_sidebar.php");
                            ?>
                            <div>
                                <!---->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/socket.io.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <?php
        include("footer.php");
        ?>
    </div>
    </div>






</body>

<script src="storage/front/js/flipclock.js" type="text/javascript"></script>
<script type="text/javascript" src='footer-js.js?209'></script>

<script type="text/javascript">
    $(function() {
        var header = $("#sidebar-right");
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();

            if (scroll >= $(window).height() / 3) {
                $("#sidebar-right").css('position', 'fixed');
                $("#sidebar-right").css('top', '0px');
                $("#sidebar-right").css('right', '0px');
                $("#sidebar-right").css('width', '25.5%');
            } else {
                $("#sidebar-right").css('position', 'relative');
                $("#sidebar-right").css('top', '0px');
                $("#sidebar-right").css('right', '0px');
                $("#sidebar-right").css('width', '25.5%');
            }
        });
    });


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
    var markettype = "ROULETTE12";
    var markettype_2 = markettype;
    var back_html = "";
    var lay_html = "";
    var gstatus = "";
    var last_result_id = '0';
    var eventId = '0';
    var bet_data_all = [];
    var old_bet = [];
    var event_new = "";
    var betType = "Back";

    function websocket(type) {
        socket = io.connect(websocketurl, {
            transports: ['websocket']
        });
        socket.on('connect', function() {
            socket.emit('Room', 'roulette12');
        });
        socket.on('gameIframe', function(data) {
            $("#casinoIframe").attr('src', data);
        });
        socket.on('game', function(data) {
           
            data1 = data;
            if (data && data1.t1) {


                if (oldGameId != data.t1[0].mid && data.t1[0].mid != 0 && data.t1[0].mid != "0") {
                    $(".casino-video-cards").hide();
                    refresh(markettype);
                }   

                var card_result = false;
                var resultt = "";
                oldGameId = data.t1[0].mid;
                if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {

                    if (data.t1[0].C1[0] != "") {
                        card_result = true;
                        $(".casino-videoo").removeClass("full");
                        $(".casino-video-cards").show();
                        resultt = parseInt(data.t1[0].C1[0]) + 1;
                      
                        $('.market_' + resultt + '_row .board-number').addClass('pop-outin');
                        $("#card_c1").attr("src", site_url + "/storage/front/img/cards_new/roulette/" + data.t1[0].C1[0] + ".png");
                    }

                }

                clock.setValue(data.t1[0].autotime);
                $(".round_no").text(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
                $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
                eventId = data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid;

                for (var j in data.t2) {
                    selectionid = data.t2[j].sectionId || data.t2[j].sid;
                    runner = data.t2[j].nation || data.t2[j].nat;
                    b1 = data.t2[j].rate;
                    if(betType == "Lay"){
                        b1=data.t2[j].l_rate;
                    }
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
                    //$(".market_" + selectionid + "_b_btn").html(back_html);


                    gstatus = data.t2[j].gstatus.toString();
                    if (gstatus == "SUSPENDED" || gstatus == "0") {

                        $(".casino-coins-container").hide();
                        $(".iframedesign").addClass("iframedesign_full");
                        $(".market_" + selectionid + "_row").addClass("suspended-box");
                        $(".market_" + resultt + "_row").removeClass("suspended-box");
                        if (!card_result) {

                            $(".casino-videoo").addClass("full");
                        }
                    } else {
                        $(".market_" + selectionid + "_row").removeClass("suspended-box");
                        if (event_new != eventId) {

                            $(".market_" + selectionid + "_b_btn").html("");
                        }
                        $('.board-number').removeClass('pop-outin');
                        $(".casino-coins-container").show();
                        $(".iframedesign").removeClass("iframedesign_full");
                        $(".casino-videoo").removeClass("full");
                    }
                }
                if (event_new != eventId) {

                    fetch_bets();
                }
                event_new = eventId;
            }
        });
        socket.on('gameResult', function(args) {
            if (args.data) {
                updateResult(args.data);
            } else {
                var statastichtml = `<div class="sidebar-box my-bet-container roulette-rules">
                                        <div class="sidebar-title">
                                            <h4>Statistics</h4>
                                        </div>
                                        <div class="">
                                            <div class="roulette11-table">
                                                <div class="roulette11-table-row">
                                                    <div class="roulette11-table-cell"><span>1st12:</span><b id="table_cell_c1">${args['g'].C1st12}</b></div>
                                                    <div class="roulette11-table-cell"><span>2nd12:</span><b id="table_cell_c2">${args['g'].C2nd12}</b></div>
                                                    <div class="roulette11-table-cell"><span>3rd12:</span><b id="table_cell_c3">${args['g'].C3rd12}</b></div>
                                                </div>
                                                <div class="roulette11-table-row">
                                                    <div class="roulette11-table-cell"><span>1-34:</span><b id="table_cell_r1">${args['g'].R1st}</b></div>
                                                    <div class="roulette11-table-cell"><span>2-35</span><b id="table_cell_r2">${args['g'].R2nd}</b></div>
                                                    <div class="roulette11-table-cell"><span>3-36</span><b id="table_cell_r3">${args['g'].R3rd}</b></div>
                                                </div>
                                                <div class="roulette11-table-row">
                                                    <div class="roulette11-table-cell"><span>Red:</span><b id="table_cell_red">${args['g'].Red}</b></div>
                                                    <div class="roulette11-table-cell"><span>Black:</span><b id="table_cell_black">${args['g'].Blk}</b></div>
                                                </div>
                                                <div class="roulette11-table-row">
                                                    <div class="roulette11-table-cell"><span>Odd:</span><b id="table_cell_odd">${args['g'].Odd}</b></div>
                                                    <div class="roulette11-table-cell"><span>Even:</span><b id="table_cell_even">${args['g'].Evn}</b></div>
                                                </div>
                                                <div class="roulette11-table-row">
                                                    <div class="roulette11-table-cell"><span>1to18:</span><b id="table_cell_1to18">${args['g'].T01to18}</b></div>
                                                    <div class="roulette11-table-cell"><span>19to36:</span><b id="table_cell_19to36">${args['g'].T19to36}</b></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> `;
                                
                $("#sidebar-box-div").html(statastichtml);

                updateResult(args['res']);
            }
        });
        socket.on('error', function(data) {});
        socket.on('close', function(data) {});
    }

    jQuery(document).on("click", ".tabclick", function() {
        $(".tabclick").removeClass("active");
        $(this).addClass("active");
        betType=$(this).attr('data-bettype');
    })

    let blackKeys = [1, 3, 5, 7, 9, 12, 14, 16, 18, 19, 21, 23, 25, 27, 30, 32, 34, 36];
    let colors = {};

    for (let i = 1; i <= 36; i++) {
        colors[i] = blackKeys.includes(i) ? 'red' : 'black';
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
            casino_type = "'roulette12'";
            data.forEach((runData) => {
                var classs = colors[runData.win];
                 var eventIdnew = runData.mid;
                html += '<span onclick="view_casiono_result(' + eventIdnew + ',' + casino_type + ')"  class="result ml-1 ' + classs + '">' + runData.win + '</span>';
            });
            $("#last-result").html(html);
            if (oldGameId == 0 || oldGameId == resultGameLast) {

            }

        }
    }

    function teenpatti(type) {
        gameType = type
        websocket();
    }

    function fetch_bets() {
        $.ajax({
            type: 'POST',
            url: 'ajaxfiles/bet_fetch_roulette',
            dataType: 'json',
            data: {
                eventId: eventId,
                eventType: 'ROULETTE12'
            },
            success: function(response) {

                var check_status = response['status'];
                var count_total_bet = response['count_total_bet'];
                if (count_total_bet > 0) {
                    $('.btnss').removeAttr('disabled');
                } else {
                    $('.btnss').attr('disabled', true);
                }
                if (check_status == 'ok') {
                    bet_data_all = response['open_bet_data'];

                    for (const [bet_marketId, value] of Object.entries(bet_data_all)) {
                        $(".market_" + bet_marketId + "_b_btn").html(`<div class="casino-coin"><div class=" bet-chip-holder">
                                                                <div class="bet-chip">
                                                                    <div class="bet-chip-front"></div>
                                                                    <div class="bet-chip-top"></div>
                                                                    <div class="bet-chip-amount">
                                                                        <svg class="bet-chip-amount-in" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 108 108">
                                                                            <text class="bet-chip-amount-label" x="50%" y="53.5%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="32" font-weight="700">${value}</text>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div></div>`);
                    }

                }
            }
        });
    }

    function rolette_button_action(action_type) {
        var all_old_bet="";
        /* if(action_type == "repeat" && old_bet.length > 0){
            all_old_bet=old_bet.join(',');
        } */
        $.ajax({
            type: 'POST',
            url: 'ajaxfiles/bet_action_roulette',
            dataType: 'json',
            data: {
                eventId: eventId,
                eventType: 'ROULETTE12',
                action_type: action_type,
                all_old_bet:all_old_bet
            },
            success: function(response) {
               
                var message = "";
                var mid_list = response['all_market_id'];
                mid_list.forEach(element => {
                    $(".market_" + element + "_b_btn").html("");
                });
                if (action_type == "undo") {
                    message = "Bets remove successfully";
                } else if (action_type == "clear") {
                    message = "Bets clear successfully";
                } else if (action_type == "repeat") {
                    message = "Bets repeated successfully";
                }
                toastr.clear()
                toastr.success("", message, {
                    "timeOut": "3000",
                    "iconClass": "toast-success",
                    "positionClass": "toast-top-center",
                    "extendedTImeout": "0"
                });
                fetch_bets();
                refresh(markettype);
            }
        });
    }
    teenpatti("ok");

    var stack_value = parseInt('<? echo $stack_value; ?>');
    jQuery(document).on("click", ".undo_bet", function() {
        rolette_button_action('undo');
    });
    jQuery(document).on("click", ".repeat_bet", function() {
        rolette_button_action('repeat');
    });
    jQuery(document).on("click", ".clear_bet", function() {
        rolette_button_action('clear');
    });
    jQuery(document).on("click", ".stackclick", function() {
        stack_value = parseInt($(this).data("value"));
        $(".stackclick").removeClass("active");
        $(this).addClass("active");
    });


    jQuery(document).on("click", ".backk-1", function() {
        
        var fullmarketodds = $(this).attr("fullmarketodds");
       
        if (fullmarketodds != "") {
            var side = $(this).attr("side");
            var selectionid = $(this).attr("selectionid");
            var market_odd_name = $(this).attr("markettype");
            var runner = $(this).attr("runner");
            var market_runner_name = runner;
            var marketname = $(this).attr("marketname");
            var markettype = $(this).attr("markettype");
            var fullfancymarketrate = $(this).attr("fullfancymarketrate");
            var odds_change_value = "disabled";
            var runs_lable = 'Runs';
            var runs_lable = 'Odds';

            var fullfancymarketrate = fullmarketodds;

            var eventId = $(this).attr("eventid");
            var marketId = $(this).attr("marketid");
            var event_name = $(this).attr("event_name");
            $(".select").removeClass("select");
            $(this).addClass("select");
            var return_html = "";


            var last_place_bet = "";
            bet_stake_side = betType;
            bet_type = bet_stake_side;
            bet_event_id = eventId;
            bet_marketId = marketId;
            oddsmarketId = bet_marketId;
            eventType = 'ROULETTE12';
            bet_event_name = event_name;
            inputStake = stack_value;
            market_runner_name = market_runner_name;
            market_odd_name = market_odd_name;
            var runsNo;
            var oddsNo;
            bet_market_name = marketname;
            eventManualType = 'Auto';
            if (bet_stake_side == "Lay") {
                type = "No";
                class_type = "no";
                unmatched_side_type = false;
            } else {
                type = "Yes";
                class_type = "yes";
                unmatched_side_type = true;
            }
            bet_markettype = markettype;
            if (bet_markettype != "FANCY_ODDS") {
                bet_market_type = bet_markettype;
                runsNo = parseFloat(fullmarketodds);
                oddsNo = parseFloat(fullmarketodds);
                if (bet_stake_side == "Lay") {
                    return_stake = (oddsNo - 1) * inputStake;
                    return_stake = parseInt(return_stake);
                } else {
                    return_stake = (oddsNo - 1) * inputStake;
                    return_stake = parseInt(return_stake);
                }
                bet_seconds = 1;
                bet_sec = 1000;
            }

          
            $.ajax({
                type: 'POST',
                url: 'ajaxfiles/bet_place_roulette12',
                dataType: 'json',
                data: {
                    eventId: bet_event_id,
                    eventType: eventType,
                    marketId: bet_marketId,
                    stack: inputStake,
                    type: type,
                    odds: oddsNo,
                    runs: runsNo,
                    bet_market_type: bet_market_type,
                    oddsmarketId: oddsmarketId,
                    eventManualType: eventManualType,
                    market_runner_name: market_runner_name,
                    market_odd_name: market_odd_name,
                    bet_event_name: bet_event_name,
                    bet_type: bet_type
                },
                success: function(response) {

                    var check_status = response['status'];
                    var message = response['message'];
                    if (check_status == 'ok') {
                        old_bet.push(response['last_bet_id']);

                        bet_data_all[bet_marketId] = (bet_data_all[bet_marketId] || 0) + inputStake;
                        $(".market_" + bet_marketId + "_b_btn").html(`<div class="casino-coin"><div class=" bet-chip-holder">
                                                                <div class="bet-chip">
                                                                    <div class="bet-chip-front"></div>
                                                                    <div class="bet-chip-top"></div>
                                                                    <div class="bet-chip-amount">
                                                                        <svg class="bet-chip-amount-in" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 108 108">
                                                                            <text class="bet-chip-amount-label" x="50%" y="53.5%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="32" font-weight="700">${bet_data_all[bet_marketId]}</text>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div></div>`);
                        if (bet_markettype != "FANCY_ODDS") {
                            oddsNo = runsNo;
                        } else {
                            oddsNo = oddsNo;
                        }
                        refresh(markettype);
                        auth_key = 1;
                        toastr.clear()
                        toastr.success("", message, {
                            "timeOut": "3000",
                            "iconClass": "toast-success",
                            "positionClass": "toast-top-center",
                            "extendedTImeout": "0"
                        });
                        fetch_bets();
                    } else {
                        toastr.clear()
                        toastr.warning("", message, {
                            "timeOut": "3000",
                            "iconClass": "toast-warning",
                            "positionClass": "toast-top-center",
                            "extendedTImeout": "0"
                        });

                    }
                }
            });



        }
    });

    /* jQuery(document).on("click", "#placeBet", function() {
        $("#placeBet").html('<i class="fa fa-spinner  fa-spin"></i> Submit');
        $("#placeBet").addClass('disabled');
        $(".placeBetLoader").addClass('show');
        var last_place_bet = "";
        bet_stake_side = $("#bet_stake_side").val();
        bet_type = bet_stake_side;
        bet_event_id = $("#bet_event_id").val();
        bet_marketId = $("#bet_marketId").val();
        oddsmarketId = bet_marketId;
        eventType = 'sicbo';
        bet_event_name = $("#bet_event_name").val();
        inputStake = $("#inputStake").val();
        market_runner_name = $("#market_runner_name").val();
        market_odd_name = $("#market_odd_name").val();
        var runsNo;
        var oddsNo;
        bet_market_name = $("#bet_market_name").val();
        eventManualType = 'Auto';
        if (bet_stake_side == "Lay") {
            type = "No";
            class_type = "no";
            unmatched_side_type = false;
        } else {
            type = "Yes";
            class_type = "yes";
            unmatched_side_type = true;
        }
        bet_markettype = $("#bet_markettype").val();
        if (bet_markettype != "FANCY_ODDS") {
            bet_market_type = bet_markettype;
            runsNo = parseFloat($("#odds_val").val());
            oddsNo = parseFloat($("#odds_val").val());
            if (bet_stake_side == "Lay") {
                return_stake = (oddsNo - 1) * inputStake;
                return_stake = parseInt(return_stake);
            } else {
                return_stake = (oddsNo - 1) * inputStake;
                return_stake = parseInt(return_stake);
            }
            bet_seconds = 1;
            bet_sec = 1000;
        }

        $(".placeBet").addClass("disable");
        $(".back-1").removeClass("select");
        $(".lay-1").removeClass("select");
        $("#loadingMsg").show();
        $('.header_Back_' + bet_event_id).remove();
        $('.header_Lay_' + bet_event_id).remove();
        $('#betSlipFullBtn').hide();
        $('#backSlipHeader').hide();
        $('#laySlipHeader').hide();
        $(".back-1").removeClass("select");
        $(".lay-1").removeClass("select");
        $("#placeBets").addClass('disable');
        $("#bet-error-class").removeClass("b-toast-danger");
        $("#bet-error-class").removeClass("b-toast-success");
        setTimeout(function() {
            $.ajax({
                type: 'POST',
                url: 'ajaxfiles/bet_place_sicbo',
                dataType: 'json',
                data: {
                    eventId: bet_event_id,
                    eventType: eventType,
                    marketId: bet_marketId,
                    stack: inputStake,
                    type: type,
                    odds: oddsNo,
                    runs: runsNo,
                    bet_market_type: bet_market_type,
                    oddsmarketId: oddsmarketId,
                    eventManualType: eventManualType,
                    market_runner_name: market_runner_name,
                    market_odd_name: market_odd_name,
                    bet_event_name: bet_event_name,
                    bet_type: bet_type
                },
                success: function(response) {
                    $(".placeBetLoader").removeClass('show');
                    var check_status = response['status'];
                    var message = response['message'];
                    if (check_status == 'ok') {
                        if (bet_markettype != "FANCY_ODDS") {
                            oddsNo = runsNo;
                        } else {
                            oddsNo = oddsNo;
                        }
                        auth_key = 1;
                        toastr.clear()
                        toastr.success("", message, {
                            "timeOut": "3000",
                            "iconClass": "toast-success",
                            "positionClass": "toast-top-center",
                            "extendedTImeout": "0"
                        });
                    } else {
                        toastr.clear()
                        toastr.warning("", message, {
                            "timeOut": "3000",
                            "iconClass": "toast-warning",
                            "positionClass": "toast-top-center",
                            "extendedTImeout": "0"
                        });
                    }
                    $(".close-bet-slip").click();
                    refresh(markettype);
                }
            });
        }, bet_sec - 2000);

    }); */
</script>
<?php

include("footer-js.php");
include("footer-result-popup.php");
?>

<div id="errorMsg" class="b-toaster b-toaster-top-center" style="display:none;">
    <div class="b-toaster-slot vue-portal-target">
        <div role="alert" aria-live="assertive" aria-atomic="true" id="bet-error-class" class="b-toast b-toast-solid b-toast-prepend b-toast-danger">
            <div tabindex="0" class="toast">
                <header class="toast-header"><strong class="mr-2" id="errorMsgText"></strong>
                    <button type="button" aria-label="Close" class="close ml-auto mb-1">&times;</button>
                </header>
                <div class="toast-body"> </div>
            </div>
        </div>
    </div>

    </body>



</html>