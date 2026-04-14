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
    display: flex
;
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

.board-text, .board-number {
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

.board-text, .board-number {
    font-size: 20px;
}

.board-cell.yellow .board-text, .board-cell.yellow .borad-number {
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
}.board-center .board-cell:nth-child(31) {
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
    display: flex
;
    justify-content: space-between;
    margin-top: 10px;
    width: 100%;
}

.casino-last-result-title a {
    color: #ffffff;
}

.casino-last-results {
    display: flex
;
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
    display: flex
;
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
    position:unset;
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
    background: #ff0000;
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
    background-color: #6a6a6a;
    opacity: 1;
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
                                        <div class="game-heading"><span class="card-header-title">Unique Roulette
                                                <!-- <small role="button" class="teenpatti-rules"  onclick="view_rules('tp-rules.jpg')" data-target="#rules_popup" data-toggle="modal"  tabindex="0"><u>Rules</u></small> --> <!----></span>
                                                <small role="button" class="teenpatti-rules"  onclick="view_rules('ourroullete')" data-target="#rules_popup" data-toggle="modal"  tabindex="0"><u>Rules</u></small> 
                                                <span class="float-right">
                                                Round ID:
                                                <span class="round_no">0</span><!--   | Min: <span>100</span> | Max: <span>500000</span> --></span>
                                        </div>
                                        <!---->
                                        <div class="video-container">
                                        <?php
                                            if(!empty(IFRAME_URL_SET)){
                                            ?>
                                            <iframe class="iframedesign" src="<?php echo IFRAME_URL."".SICBO_CODE;?>" width="100%" height="200px" style="border: 0px;"></iframe>
                                            <?php
                                                
                                            }else{
                                                ?>
                                                <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                                <?php

                                            }
                                            ?>
                                            <!---->
                                          <!--  <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                             <iframe class="iframedesign" src="<?php echo IFRAME_URL;
                                                            echo SICBO_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
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
                                                        <div class="casino-coin active">
                                                            <div class="bet-chip-holder" style="--g-chip-inner-color: #138cf5;">
                                                                <div class="bet-chip">
                                                                <div class="bet-chip-front"></div>
                                                                <div class="bet-chip-top"></div>
                                                                <div class="bet-chip-amount">
                                                                    <svg class="bet-chip-amount-in" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 108 108">
                                                                        <text class="bet-chip-amount-label" x="50%" y="53.5%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="32" font-weight="700">30</text>
                                                                    </svg>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="casino-coin ">
                                                            <div class="bet-chip-holder" style="--g-chip-inner-color: #138cf5;">
                                                                <div class="bet-chip">
                                                                <div class="bet-chip-front"></div>
                                                                <div class="bet-chip-top"></div>
                                                                <div class="bet-chip-amount">
                                                                    <svg class="bet-chip-amount-in" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 108 108">
                                                                        <text class="bet-chip-amount-label" x="50%" y="53.5%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="32" font-weight="700">50</text>
                                                                    </svg>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="casino-coin ">
                                                            <div class="bet-chip-holder" style="--g-chip-inner-color: #138cf5;">
                                                                <div class="bet-chip">
                                                                <div class="bet-chip-front"></div>
                                                                <div class="bet-chip-top"></div>
                                                                <div class="bet-chip-amount">
                                                                    <svg class="bet-chip-amount-in" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 108 108">
                                                                        <text class="bet-chip-amount-label" x="50%" y="53.5%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="32" font-weight="700">100</text>
                                                                    </svg>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="casino-coin ">
                                                            <div class="bet-chip-holder" style="--g-chip-inner-color: #00d700;">
                                                                <div class="bet-chip">
                                                                <div class="bet-chip-front"></div>
                                                                <div class="bet-chip-top"></div>
                                                                <div class="bet-chip-amount">
                                                                    <svg class="bet-chip-amount-in" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 108 108">
                                                                        <text class="bet-chip-amount-label" x="50%" y="53.5%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="32" font-weight="700">200</text>
                                                                    </svg>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="casino-coin ">
                                                            <div class="bet-chip-holder" style="--g-chip-inner-color: #00d700;">
                                                                <div class="bet-chip">
                                                                <div class="bet-chip-front"></div>
                                                                <div class="bet-chip-top"></div>
                                                                <div class="bet-chip-amount">
                                                                    <svg class="bet-chip-amount-in" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 108 108">
                                                                        <text class="bet-chip-amount-label" x="50%" y="53.5%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="32" font-weight="700">500</text>
                                                                    </svg>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="casino-coin ">
                                                            <div class="bet-chip-holder" style="--g-chip-inner-color: #9541f9;">
                                                                <div class="bet-chip">
                                                                <div class="bet-chip-front"></div>
                                                                <div class="bet-chip-top"></div>
                                                                <div class="bet-chip-amount">
                                                                    <svg class="bet-chip-amount-in" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 108 108">
                                                                        <text class="bet-chip-amount-label" x="50%" y="53.5%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="32" font-weight="700">1K</text>
                                                                    </svg>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="casino-coin ">
                                                            <div class="bet-chip-holder" style="--g-chip-inner-color: #138cf5;">
                                                                <div class="bet-chip">
                                                                <div class="bet-chip-front"></div>
                                                                <div class="bet-chip-top"></div>
                                                                <div class="bet-chip-amount">
                                                                    <svg class="bet-chip-amount-in" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 108 108">
                                                                        <text class="bet-chip-amount-label" x="50%" y="53.5%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="32" font-weight="700">25</text>
                                                                    </svg>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="casino-coin ">
                                                            <div class="bet-chip-holder" style="--g-chip-inner-color: #138cf5;">
                                                                <div class="bet-chip">
                                                                <div class="bet-chip-front"></div>
                                                                <div class="bet-chip-top"></div>
                                                                <div class="bet-chip-amount">
                                                                    <svg class="bet-chip-amount-in" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 108 108">
                                                                        <text class="bet-chip-amount-label" x="50%" y="53.5%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="32" font-weight="700">50</text>
                                                                    </svg>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="casino-coin ">
                                                            <div class="bet-chip-holder" style="--g-chip-inner-color: #138cf5;">
                                                                <div class="bet-chip">
                                                                <div class="bet-chip-front"></div>
                                                                <div class="bet-chip-top"></div>
                                                                <div class="bet-chip-amount">
                                                                    <svg class="bet-chip-amount-in" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 108 108">
                                                                        <text class="bet-chip-amount-label" x="50%" y="53.5%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="32" font-weight="700">100</text>
                                                                    </svg>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="casino-coin ">
                                                            <div class="bet-chip-holder" style="--g-chip-inner-color: #00d700;">
                                                                <div class="bet-chip">
                                                                <div class="bet-chip-front"></div>
                                                                <div class="bet-chip-top"></div>
                                                                <div class="bet-chip-amount">
                                                                    <svg class="bet-chip-amount-in" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 108 108">
                                                                        <text class="bet-chip-amount-label" x="50%" y="53.5%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="32" font-weight="700">200</text>
                                                                    </svg>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="casino-coin ">
                                                            <div class="bet-chip-holder" style="--g-chip-inner-color: #00d700;">
                                                                <div class="bet-chip">
                                                                <div class="bet-chip-front"></div>
                                                                <div class="bet-chip-top"></div>
                                                                <div class="bet-chip-amount">
                                                                    <svg class="bet-chip-amount-in" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 108 108">
                                                                        <text class="bet-chip-amount-label" x="50%" y="53.5%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="32" font-weight="700">500</text>
                                                                    </svg>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="casino-coin ">
                                                            <div class="bet-chip-holder" style="--g-chip-inner-color: #9541f9;">
                                                                <div class="bet-chip">
                                                                <div class="bet-chip-front"></div>
                                                                <div class="bet-chip-top"></div>
                                                                <div class="bet-chip-amount">
                                                                    <svg class="bet-chip-amount-in" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 108 108">
                                                                        <text class="bet-chip-amount-label" x="50%" y="53.5%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="32" font-weight="700">1K</text>
                                                                    </svg>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="casino-coin ">
                                                            <div class="bet-chip-holder" style="--g-chip-inner-color: #138cf5;">
                                                                <div class="bet-chip">
                                                                <div class="bet-chip-front"></div>
                                                                <div class="bet-chip-top"></div>
                                                                <div class="bet-chip-amount">
                                                                    <svg class="bet-chip-amount-in" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 108 108">
                                                                        <text class="bet-chip-amount-label" x="50%" y="53.5%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="32" font-weight="700">25</text>
                                                                    </svg>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="casino-coin ">
                                                            <div class="bet-chip-holder" style="--g-chip-inner-color: #138cf5;">
                                                                <div class="bet-chip">
                                                                <div class="bet-chip-front"></div>
                                                                <div class="bet-chip-top"></div>
                                                                <div class="bet-chip-amount">
                                                                    <svg class="bet-chip-amount-in" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 108 108">
                                                                        <text class="bet-chip-amount-label" x="50%" y="53.5%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="32" font-weight="700">50</text>
                                                                    </svg>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="casino-coin ">
                                                            <div class="bet-chip-holder" style="--g-chip-inner-color: #138cf5;">
                                                                <div class="bet-chip">
                                                                <div class="bet-chip-front"></div>
                                                                <div class="bet-chip-top"></div>
                                                                <div class="bet-chip-amount">
                                                                    <svg class="bet-chip-amount-in" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 108 108">
                                                                        <text class="bet-chip-amount-label" x="50%" y="53.5%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="32" font-weight="700">100</text>
                                                                    </svg>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="casino-coin ">
                                                            <div class="bet-chip-holder" style="--g-chip-inner-color: #00d700;">
                                                                <div class="bet-chip">
                                                                <div class="bet-chip-front"></div>
                                                                <div class="bet-chip-top"></div>
                                                                <div class="bet-chip-amount">
                                                                    <svg class="bet-chip-amount-in" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 108 108">
                                                                        <text class="bet-chip-amount-label" x="50%" y="53.5%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="32" font-weight="700">200</text>
                                                                    </svg>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="casino-coin ">
                                                            <div class="bet-chip-holder" style="--g-chip-inner-color: #00d700;">
                                                                <div class="bet-chip">
                                                                <div class="bet-chip-front"></div>
                                                                <div class="bet-chip-top"></div>
                                                                <div class="bet-chip-amount">
                                                                    <svg class="bet-chip-amount-in" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 108 108">
                                                                        <text class="bet-chip-amount-label" x="50%" y="53.5%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="32" font-weight="700">500</text>
                                                                    </svg>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="casino-coin ">
                                                            <div class="bet-chip-holder" style="--g-chip-inner-color: #9541f9;">
                                                                <div class="bet-chip">
                                                                <div class="bet-chip-front"></div>
                                                                <div class="bet-chip-top"></div>
                                                                <div class="bet-chip-amount">
                                                                    <svg class="bet-chip-amount-in" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 108 108">
                                                                        <text class="bet-chip-amount-label" x="50%" y="53.5%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="32" font-weight="700">1K</text>
                                                                    </svg>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="coin-btns">
                                                        <div><button class="btn btn-danger" disabled=""><i class="fas fa-undo"></i><span class="d-none d-md-flex">Undo Bet</span></button><span class="d-md-none">Undo Bet</span></div>
                                                        <div><button class="btn btn-info"><i class="fas fa-redo"></i><span class="d-none d-md-flex">Repeat</span></button><span class="d-md-none">Repeat</span></div>
                                                        <div><button class="btn btn-warning" disabled=""><i class="fas fa-trash"></i><span class="d-none d-md-flex">Clear</span></button><span class="d-md-none">Clear</span></div>
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
                                                            <div class="board-cell yellow">
                                                                <div class="board-cell-in">
                                                                    <span class="board-text">2to1</span>
                                                                    <div class="bet-chip-area center-center coin-place" id="138"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell yellow">
                                                                <div class="board-cell-in">
                                                                    <span class="board-text">2to1</span>
                                                                    <div class="bet-chip-area center-center coin-place" id="137"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell yellow">
                                                                <div class="board-cell-in">
                                                                    <span class="board-text">2to1</span>
                                                                    <div class="bet-chip-area center-center coin-place" id="136"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="board-bottom">
                                                            <div class="board-cell yellow">
                                                                <div class="board-cell-in">
                                                                    <span class="board-text">1st12</span>
                                                                    <div class="bet-chip-area center-center coin-place" id="133"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell yellow">
                                                                <div class="board-cell-in">
                                                                    <span class="board-text">2nd12</span>
                                                                    <div class="bet-chip-area center-center coin-place" id="134"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell yellow">
                                                                <div class="board-cell-in">
                                                                    <span class="board-text">3rd12</span>
                                                                    <div class="bet-chip-area center-center coin-place" id="135"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell yellow">
                                                                <div class="board-cell-in">
                                                                    <span class="board-text">1 - 18</span>
                                                                    <div class="bet-chip-area center-center coin-place" id="139"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell yellow">
                                                                <div class="board-cell-in">
                                                                    <span class="board-text">Even</span>
                                                                    <div class="bet-chip-area center-center coin-place" id="144"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell yellow">
                                                                <div class="board-cell-in">
                                                                    <span class="board-text">Red</span>
                                                                    <div class="bet-chip-area center-center coin-place" id="141"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell yellow">
                                                                <div class="board-cell-in">
                                                                    <span class="board-text">Black</span>
                                                                    <div class="bet-chip-area center-center coin-place" id="142"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell yellow">
                                                                <div class="board-cell-in">
                                                                    <span class="board-text">Odd</span>
                                                                    <div class="bet-chip-area center-center coin-place" id="143"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell yellow">
                                                                <div class="board-cell-in">
                                                                    <span class="board-text">19 - 36</span>
                                                                    <div class="bet-chip-area center-center coin-place" id="140"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="board-center">
                                                            <div class="board-cell green">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">0</span>
                                                                    <div class="bet-chip-area center-center coin-place" id="1"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell red">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">1</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="38"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="2"></div>
                                                                    <div class="bet-chip-area bottom-left coin-place" id="110"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="74"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell black">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">2</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="39"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="3"></div>
                                                                    <div class="bet-chip-area bottom-left coin-place" id="145"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="75"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell red">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">3</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="40"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="4"></div>
                                                                    <div class="bet-chip-area bottom-left coin-place" id="146"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="98"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell black">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">4</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="41"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="5"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="76"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell red">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">5</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="52"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="6"></div>
                                                                    <div class="bet-chip-area bottom-left coin-place" id="111"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="77"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell black">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">6</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="63"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="7"></div>
                                                                    <div class="bet-chip-area bottom-left coin-place" id="112"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="99"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell red">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">7</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="42"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="8"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="78"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell black">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">8</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="53"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="9"></div>
                                                                    <div class="bet-chip-area bottom-left coin-place" id="113"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="79"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell red">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">9</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="64"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="10"></div>
                                                                    <div class="bet-chip-area bottom-left coin-place" id="114"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="100"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell black">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">10</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="43"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="11"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="80"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell black">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">11</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="54"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="12"></div>
                                                                    <div class="bet-chip-area bottom-left coin-place" id="115"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="81"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell red">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">12</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="65"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="13"></div>
                                                                    <div class="bet-chip-area bottom-left coin-place" id="116"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="101"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell black">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">13</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="44"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="14"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="82"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell red">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">14</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="55"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="15"></div>
                                                                    <div class="bet-chip-area bottom-left coin-place" id="117"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="83"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell black">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">15</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="66"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="16"></div>
                                                                    <div class="bet-chip-area bottom-left coin-place" id="118"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="102"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell red">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">16</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="45"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="17"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="84"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell black">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">17</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="56"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="18"></div>
                                                                    <div class="bet-chip-area bottom-left coin-place" id="119"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="85"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell red">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">18</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="67"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="19"></div>
                                                                    <div class="bet-chip-area bottom-left coin-place" id="120"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="103"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell red">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">19</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="46"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="20"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="86"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell black">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">20</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="57"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="21"></div>
                                                                    <div class="bet-chip-area bottom-left coin-place" id="121"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="87"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell red">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">21</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="68"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="22"></div>
                                                                    <div class="bet-chip-area bottom-left coin-place" id="122"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="104"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell black">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">22</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="47"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="23"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="88"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell red">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">23</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="58"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="24"></div>
                                                                    <div class="bet-chip-area bottom-left coin-place" id="123"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="89"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell black">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">24</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="69"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="25"></div>
                                                                    <div class="bet-chip-area bottom-left coin-place" id="124"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="105"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell red">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">25</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="48"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="26"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="90"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell black">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">26</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="59"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="27"></div>
                                                                    <div class="bet-chip-area bottom-left coin-place" id="125"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="91"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell red">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">27</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="70"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="28"></div>
                                                                    <div class="bet-chip-area bottom-left coin-place" id="126"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="106"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell black">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">28</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="49"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="29"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="92"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell black">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">29</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="60"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="30"></div>
                                                                    <div class="bet-chip-area bottom-left coin-place" id="127"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="93"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell red">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">30</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="71"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="31"></div>
                                                                    <div class="bet-chip-area bottom-left coin-place" id="128"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="107"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell black">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">31</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="50"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="32"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="94"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell red">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">32</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="61"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="33"></div>
                                                                    <div class="bet-chip-area bottom-left coin-place" id="129"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="95"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell black">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">33</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="72"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="34"></div>
                                                                    <div class="bet-chip-area bottom-left coin-place" id="130"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="108"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell red">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">34</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="51"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="35"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="96"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell black">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">35</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="62"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="36"></div>
                                                                    <div class="bet-chip-area bottom-left coin-place" id="131"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="97"></div>
                                                                </div>
                                                            </div>
                                                            <div class="board-cell red">
                                                                <div class="board-cell-in">
                                                                    <span class="board-number">36</span>
                                                                    <div class="bet-chip-area center-left coin-place" id="73"></div>
                                                                    <div class="bet-chip-area center-center coin-place" id="37"></div>
                                                                    <div class="bet-chip-area bottom-left coin-place" id="132"></div>
                                                                    <div class="bet-chip-area top-center coin-place" id="109"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="casino-last-result-title"><span>Last Result</span><span><a href="/casino-results/roulette12">View All</a></span></div>
                                            <div class="casino-last-results"><span class="result red">21</span><span class="result black">24</span><span class="result red">27</span><span class="result black">10</span><span class="result black">35</span><span class="result black">26</span><span class="result red">07</span><span class="result black">02</span><span class="result black">17</span><span class="result red">27</span></div>
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
<script type="text/javascript" src='footer-js.js?211'></script>

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
    var markettype = "SICBO";
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
            socket.emit('Room', 'sicbo');
        });
        socket.on('gameIframe', function(data){
            $("#casinoIframe").attr('src',data);
        });
        socket.on('game', function(data) {
            data1 = data;
            if (data && data1.t1) {
            
                oldGameId = data1.t1[0].mid;

                clock.setValue(data.t1[0].autotime);
                $(".round_no").text(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
                $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
                eventId = data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid;

                for (var j in data.t2) {
                    selectionid = data.t2[j].sectionId || data.t2[j].sid;
                    runner = data.t2[j].nation || data.t2[j].nat;
                    b1 = data.t2[j].b1;
                    bs1 = data.t2[j].bs1;
                    l1 = data.t2[j].l1;
                    ls1 = data.t2[j].ls1;
                    back_html = '<span class="odds d-block"><b>' + b1 + '</b></span> <span style="color: black;">' + bs1 + '</span>';
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
                        $(".market_" + selectionid + "_row").addClass("suspended-box");
                    } else {
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

 

    function updateResult(data) {
        if (data && data[0]) {
            data = JSON.parse(JSON.stringify(data));
            resultGameLast = data[0].mid;

            if (last_result_id != resultGameLast) {
                last_result_id = resultGameLast;
                //refresh(markettype);
            }

            var html = "";
            casino_type = "'sicbo'";
            data.forEach((runData) => {

                eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] : runData.mid;
			    html += '<span onclick="view_casiono_result('+eventId+','+casino_type+')"  class="ball-runs ml-1 last-result">'+ runData.win + '</span>';
            });
            $("#last-result").html(html);
            if(oldGameId == 0 || oldGameId == resultGameLast){

            }
        
        }
    }

    function teenpatti(type) {
        gameType = type
        websocket();
    }
    teenpatti("ok");
    
    jQuery(document).on("input", "#inputStake", function() {
        var stake = $("#inputStake").val();
        eventId = $("#fullMarketBetsWrap").attr("eventid");
        $("#inputStake").val(stake);
        odds = parseFloat($("#odds_val").val());
        inputStake = $("#inputStake").val();
        bet_stake_side = $("#bet_stake_side").val();
        bet_markettype = $("#bet_markettype").val();
        if (bet_markettype != "FANCY_ODDS") {
            if (bet_stake_side == "Lay") {
                profit = parseInt(inputStake);
            } else {
                profit = (odds - 1) * inputStake;
            }
        }
        $("#profitLiability").text(profit.toFixed(2));
    });
    jQuery(document).on("click", ".label_stake", function() {
        // stake = $(this).attr("stake");
        // eventId = $("#fullMarketBetsWrap").attr("eventid");
        // $("#inputStake").val(stake);
        
  eventId = $("#fullMarketBetsWrap").attr("eventid");
   var currentStake = parseFloat($("#inputStake").val()) || 0;
		var buttonStake = parseFloat($(this).attr("stake")) || 0;
		var totalStake = currentStake + buttonStake;

	$("#inputStake").val(totalStake);

        odds = parseFloat($("#odds_val").val());
        inputStake = $("#inputStake").val();
        bet_stake_side = $("#bet_stake_side").val();
        bet_markettype = $("#bet_markettype").val();
        if (bet_markettype != "FANCY_ODDS") {
            if (bet_stake_side == "Lay") {
                profit = (odds - 1) * inputStake;
            } else {
                profit = (odds - 1) * inputStake;
            }
        }
        $("#profitLiability").text(profit.toFixed(2));
    });
    jQuery(document).on("click", ".close-bet-slip", function() {
        $('.bet-slip-data').remove();
        $(".back-1").removeClass("select");
        $(".lay-1").removeClass("select");
    });
    jQuery(document).on("click", "#placeBet", function() {
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
        if(bet_markettype != "FANCY_ODDS"){
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
        /* $("#inputStake").val(""); */
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
        setTimeout(function(){
            $.ajax({
                type: 'POST',
                url: 'ajaxfiles/bet_place_sicbo.php',
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
                            "iconClass":"toast-success",
                            "positionClass":"toast-top-center",
                            "extendedTImeout": "0"
                        });
                        /* $("#bet-error-class").addClass("b-toast-success"); */
                    } else {
                        /* $("#bet-error-class").addClass("b-toast-danger"); */
                        toastr.clear()
                        toastr.warning("", message, {
                            "timeOut": "3000",
                            "iconClass":"toast-warning",
                            "positionClass":"toast-top-center",
                            "extendedTImeout": "0"
                        });
                    }
                    /* error_message_text = message;
                    $("#errorMsgText").text(error_message_text);
                    $("#errorMsg").fadeIn('fast').delay(3000).hide(0); */
                    $(".close-bet-slip").click();
                    refresh(markettype);
                }
            });
        }, bet_sec - 2000);

    });
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