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

$isdolidana = true;
?>
<!DOCTYPE html>
<html lang="en">

<?php
include("head_css.php");
?>
<style>
    .doli-main {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    gap: 10px;
}

    .casino-table { 
        background-color: #f7f7f7;
        color: #333;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-top: 5px;
    }

    .casino-table-box {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: flex-start;
        margin-top: 5px;
    }

    .casino-table-left-box,
    .casino-table-center-box,
    .casino-table-right-box {
        width: 49%;
        border-left: 1px solid #c7c8ca;
        border-right: 1px solid #c7c8ca;
        border-top: 1px solid #c7c8ca;
        background-color: #f2f2f2;
    }

    .doli-main .players-bet {
    width: calc(40% - 5px);
    display: flex;
    flex-wrap: wrap;
}

.doli-main .casino-table-row {
    width: 100%;
}

.doli-main .casino-nation-detail {
    width: 80%;
    border-left: 1px solid #c7c8ca;
    border-top: 1px solid #c7c8ca;
}
 .odd-name {
    font-size: 12px;
    font-weight: bold;
    text-align: center;
}
 .seven-box img {
    height: 60px;
}

.sidebar-box .sidebar-title{
    background-color: var(--theme1-bg) !important;
    color: #fff;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    padding: 0 5px 0 0;
}

.doli-dana-rules .table{
    border-collapse: collapse;
}

.doli-dana-rules img {
    height: 30px !important;
    margin-right: 5px !important;
}
.doli-dana-rules td, .doli-dana-rules th {
    text-align: center !important;
}
.doli-dana-rules .table td:first-child, .table th:first-child {
    padding-left: 10px !important;
}
tbody, td, tfoot, th, thead, tr {
    border-color: #c7c8ca !important;
}
    .trap-down-box {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
        border: 2px solid #72bbef;
    }

    .trap-up-box {
        width: 50%;
        height: 50px;
        display: flex;
        align-items: center;
        padding-left: 10px;
        padding-right: 40px;
        position: relative;
        justify-content: flex-end;
    }

    .trap-up-box .up-down-book {
        position: absolute;
        left: 10px;
    }

    .up-down-odds {
        font-weight: bold;
        font-size: 18px;
    }

    .trap-down-box-d {
        width: 50%;
        text-align: right;
        height: 50px;
        display: flex;
        align-items: center;
        padding-right: 10px;
        padding-left: 40px;
        justify-content: flex-start;
        position: relative;
    }

    .trap-seven-box {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        -webkit-transform: translateX(-50%);
        -moz-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        -o-transform: translateX(-50%);
    }

    .trap-seven-box img {
        height: 70px;
        vertical-align: middle;
    }

    .casino-table-header,
    .casino-table-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        border-bottom: 1px solid #c7c8ca;
    }

    .teenpatti2 .casino-nation-detail {
        width: 60%;
    }

    .casino-table-header .casino-nation-detail {
        font-weight: bold;
        min-height: unset;
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

    .teenpatti2 .casino-odds-box {
        width: 20%;
    }

    .casino-table-header .casino-odds-box {
        cursor: unset;
        padding: 2px;
        min-height: unset;
        height: auto !important;
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

    .casino-nation-name {
        font-size: 16px;
        font-weight: bold;
    }

    .casino-nation-name {
    font-size: 16px;
    font-weight: bold;
}
.casino-nation-book {
    font-size: 12px;
    font-weight: bold;
    min-height: 18px;
    z-index: 1;
}
.doli-main .doli-odds-box {
    width: 20%;
}

.doli-main .casino-odds-box {
    width: 100%;
}
.doli-dana .casino-odds {
    font-size: 16px;
}
.casino-odds {
    font-size: 18px;
    font-weight: bold;
    line-height: 1;
}
.doli-dana .casino-volume {
    font-weight: 400;
    /* font-size: 14px; */
}
.casino-volume {
    font-size: 12px;
    font-weight: 100;
    line-height: 1;
    margin-top: 5px;
}
.doli-main .casino-table-row {
    width: 100%;
}
.doli-main .side-bets {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    width: calc(60% - 5px);
    gap: 10px;
}
.doli-main .any-pair {
    width: calc(20% - 7px);
}
.doli-main .any-pair .doli-odds-box
 {
    width: 100%;
}
.doli-dana .odd-name {
    font-size: 12px;
    font-weight: bold;
    text-align: center;
}
.doli-main .any-pair .casino-odds-box {
    width: 100%;
    /* border-radius: 4px; */
    height: 60px;
}
.doli-dana .casino-volume {
    font-weight: 400;
    /* font-size: 14px; */
}
.casino-volume {
    font-size: 12px;
    font-weight: 100;
    line-height: 1;
    margin-top: 5px;
}
.doli-main .side-bets .odd-even-pair {
    width: calc(35% - 7px);
    background: #0000000a;
    padding: 8px;
    border-radius: 4px;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}
.doli-main .side-bets .bets-box {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    gap: 5px;
}
.doli-main .side-bets .odd-even-pair .bets-box .doli-odds-box {
    width: calc(50% - 5px);
}

.doli-main .side-bets .odd-even-pair .bets-box .casino-odds-box {
    width: 100%;
}
.doli-main .side-bets .lucky7-pair {
    width: calc(45% - 7px);
    background: #0000000a;
    padding: 8px;
    border-radius: 4px;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}
.doli-main .side-bets .bets-box {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    gap: 5px;
}
.doli-main .side-bets .lucky7-pair .bets-box .doli-odds-box {
    width: calc(33.33% - 5px);
}
.doli-main .side-bets .lucky7-pair .bets-box .casino-odds-box {
    width: 100%;
}
.doli-dana .seven-box {
    text-align: center;
}
.doli-other-bets {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    gap: 10px;
    margin-top: 8px;
}
.doli-other-bets .particular-pair {
    width: calc(35% - 5px);
    background: #0000000a;
    padding: 8px;
    border-radius: 4px;
    display: flex;
    flex-wrap: wrap;
    /* justify-content: center; */
}

.doli-other-bets .particular-pair .bets-box .doli-odds-box {
    width: calc(33.33% - 5px);
}
.doli-other-bets .particular-pair .bets-box .casino-odds-box {
    width: 100%;
}
.doli-other-bets .sum-odds {
    width: calc(65% - 5px);
    background: #0000000a;
    padding: 8px;
    border-radius: 4px;
    display: flex;
    flex-wrap: wrap;
    /* justify-content: center; */
}
.doli-other-bets .bets-box {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    gap: 5px;
}
.doli-other-bets .sum-odds .bets-box .doli-odds-box {
    width: calc(16.66% - 5px);
}




    .text-end {
        text-align: right !important;
    }

    .text-start {
        text-align: left !important;
    }

    .casino-odds {
        font-size: 18px;
        font-weight: bold;
        line-height: 1;
    }

    .under-over-row .uo-box {
        display: flex;
        flex-wrap: wrap;
        width: 48%;
        margin-top: 10px;
        border: 1px solid #c7c8ca;
    }

    .teenpatti2 .under-over-row .uo-box .casino-nation-detail {
        width: 70%;
    }

    .teenpatti2 .under-over-row .uo-box .casino-odds-box {
        width: 30%;
    }

    .teenpatti2 .teen2other {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        border: 0;
    }

    .casino-table-full-box {
        /* width: 100%;
    border-left: 1px solid var(--table-border);
    border-right: 1px solid var(--table-border);
    border-top: 1px solid var(--table-border);
    background-color: var(--bg-table-row); */
    }

    .teenpatti2 .teen2other .casino-odds-box {
        width: 16%;
        flex-direction: row;
        justify-content: space-between;
        padding: 5px 10px;
    }

    .bltitle img {
        height: 35px;
    }

    .teen2cards {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        border: 0;
        padding: 10px 10px 0 10px;
    }

    .card-odd-box {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        flex-direction: column;
        align-items: center;
        margin-bottom: 10px;
        margin-right: 10px;
        cursor: pointer;
    }

    .card-odd-box .casino-odds {
        margin-bottom: 5px;
        font-size: 14px;
    }

    .card-odd-box img {
        height: 75px;
    }

    .casino-nation-book {
        font-size: 12px;
        font-weight: bold;
        min-height: 18px;
    }

    @media only screen and (min-width: 1200px) and (max-width: 1399px) {
        .card-odd-box img {
            height: 45px;
        }
    }

    @media only screen and (max-width: 767px) {
        .casino-table-box {
            padding: 5px;
        }

        .casino-table-left-box,
        .casino-table-right-box {
            width: 100%;
            padding: 0 5px;
        }

        .teenpatti2 .teen2other .casino-odds-box {
            width: 49%;
            margin-bottom: 10px;
        }

        .teenpatti2 .casino-table-right-box {
            margin-top: 10px;
        }

        .card-odd-box img {
            height: 45px;
        }
    }

    .casino-table-box-divider {
        background-color: var(--table-border);
        width: 2px;
    }

    .video-overlay img {
        margin-left: 12px;
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
        width: 50px !important;
        margin-left: unset !important;
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
                                        <div class="game-heading"><span class="card-header-title">Doli Dana
                                                <!-- <small role="button" class="teenpatti-rules"  onclick="view_rules('tp-rules.jpg')" data-target="#rules_popup" data-toggle="modal"  tabindex="0"><u>Rules</u></small> --> <!----></span>
                                            <small role="button" class="teenpatti-rules" onclick="view_rules('dolidana')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small>
                                            <span class="float-right">
                                                Round ID:
                                                <span class="round_no">0</span><input type='hidden' class="round_no2"><!--   | Min: <span>100</span> | Max: <span>500000</span> --></span>
                                        </div>
                                        <!---->
                                        <div class="video-container">
                                            <?php
                                            if (!empty(IFRAME_URL_SET)) {
                                            ?>
                                                <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . DOLIDANA_CODE; ?>" width="100%" height="200px" style="border: 0px;"></iframe>
                                            <?php

                                            } else {
                                            ?>
                                                <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                            <?php

                                            }
                                            ?>
                                            <!---->
                                            <!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL;
                                                                                    echo DOLIDANA_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
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
                                                <div class="videoCards">
                                                    <div>
                                                        <!-- <h3 class="text-white">PLAYER</h3> -->
                                                        <div class="cardsblock" >

                                                            <img id="card_c1" src="">
                                                            <img id="card_c2" src="">
                                                        </div>
                                                    </div>
                                                    <!-- <div>
                                                        <h3 class="text-white">DEALER</h3>
                                                        <div>
                                                            <img id="card_c2" src="storage/front/img/cards/1.png">
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="casino-table-box">
                                            <div class="doli-main">
                                                <div class="players-bet">
                                                    <div class="casino-table-row ">
                                                        <div class="casino-nation-detail">
                                                            <div class="casino-nation-name">Player A</div>
                                                            <div class="casino-nation-book market_1_b_exposure"></div>
                                                        </div>
                                                        <div class="doli-odds-box">
                                                            <div class="casino-odds-box back suspended-box back-1 market_1_b_btn market_1_row"><span class="casino-odds market_1_b_val">0</span><span class="casino-volume market_1_b_volume">0</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="casino-table-row ">
                                                        <div class="casino-nation-detail">
                                                            <div class="casino-nation-name">Player B</div>
                                                            <div class="casino-nation-book market_2_b_exposure"></div>
                                                        </div>
                                                        <div class="doli-odds-box">
                                                            <div class="casino-odds-box back suspended-box back-1 market_2_b_btn market_2_row"><span class="casino-odds market_2_b_val">0</span><span class="casino-volume market_2_b_volume">0</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="side-bets">
                                                    <div class="any-pair">
                                                        <div class="doli-odds-box">
                                                            <div class="odd-name">Any Pair</div>
                                                            <div class="casino-odds-box back suspended-box back-1 market_3_b_btn market_3_row"><span class="casino-odds market_3_b_val">0</span><div class="casino-nation-book market_3_b_exposure market_exposure"></div></div>
                                                        </div>
                                                    </div>
                                                    <div class="odd-even-pair">
                                                        <div class="bets-box">
                                                            <div class="doli-odds-box">
                                                                <div class="odd-name">Odd</div>
                                                                <div class="casino-odds-box back suspended-box back-1 market_21_b_btn market_21_row"><span class="casino-odds market_21_b_val">0</span><div class="casino-nation-book market_21_b_exposure market_exposure"></div></div>
                                                            </div>
                                                            <div class="doli-odds-box">
                                                                <div class="odd-name">Even</div>
                                                                <div class="casino-odds-box back suspended-box back-1 market_22_b_btn market_22_row"><span class="casino-odds market_22_b_val">0</span><div class="casino-nation-book market_22_b_exposure market_exposure"></div></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="lucky7-pair">
                                                        <div class="bets-box">
                                                            <div class="doli-odds-box">
                                                                <div class="odd-name">&lt; 7</div>
                                                                <div class="casino-odds-box back suspended-box back-1 market_25_b_btn market_25_row"><span class="casino-odds market_25_b_val">0</span><div class="casino-nation-book market_25_b_exposure market_exposure"></div></div>
                                                            </div>
                                                            <div class="doli-odds-box">
                                                                <div class="seven-box"><img src="storage/front/img/trap/trape-seven.png"></div>
                                                            </div>
                                                            <div class="doli-odds-box">
                                                                <div class="odd-name">&gt; 7</div>
                                                                <div class="casino-odds-box back suspended-box back-1 market_24_b_btn market_24_row"><span class="casino-odds market_24_b_val">0</span><div class="casino-nation-book market_24_b_exposure market_exposure"></div></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="doli-other-bets">
                                                <div class="particular-pair">
                                                    <h4>Particular Pair</h4>
                                                    <div class="bets-box">
                                                        <div class="doli-odds-box">
                                                            <div class="odd-name">1-1 Pair</div>
                                                            <div class="casino-odds-box back suspended-box back-1 market_4_b_btn market_4_row"><span class="casino-odds market_4_b_val">0</span><div class="casino-nation-book market_4_b_exposure market_exposure"></div></div>
                                                        </div>
                                                        <div class="doli-odds-box">
                                                            <div class="odd-name">2-2 Pair</div>
                                                            <div class="casino-odds-box back suspended-box back-1 market_5_b_btn market_5_row"><span class="casino-odds market_5_b_val">0</span><div class="casino-nation-book market_5_b_exposure market_exposure"></div></div>
                                                        </div>
                                                        <div class="doli-odds-box">
                                                            <div class="odd-name">3-3 Pair</div>
                                                            <div class="casino-odds-box back suspended-box back-1 market_6_b_btn market_6_row"><span class="casino-odds market_6_b_val">0</span><div class="casino-nation-book market_6_b_exposure market_exposure"></div></div>
                                                        </div>
                                                        <div class="doli-odds-box">
                                                            <div class="odd-name">4-4 Pair</div>
                                                            <div class="casino-odds-box back suspended-box back-1 market_7_b_btn market_7_row"><span class="casino-odds market_7_b_val">0</span><div class="casino-nation-book market_7_b_exposure market_exposure"></div></div>
                                                        </div>
                                                        <div class="doli-odds-box">
                                                            <div class="odd-name">5-5 Pair</div>
                                                            <div class="casino-odds-box back suspended-box back-1 market_8_b_btn market_8_row"><span class="casino-odds market_8_b_val">0</span><div class="casino-nation-book market_8_b_exposure market_exposure"></div></div>
                                                        </div>
                                                        <div class="doli-odds-box">
                                                            <div class="odd-name">6-6 Pair</div>
                                                            <div class="casino-odds-box back suspended-box back-1 market_9_b_btn market_9_row"><span class="casino-odds market_9_b_val">0</span><div class="casino-nation-book market_9_b_exposure market_exposure"></div></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sum-odds">
                                                    <h4>Odds of Sum Total</h4>
                                                    <div class="bets-box">
                                                        <div class="doli-odds-box">
                                                            <div class="odd-name">Sum Total 2</div>
                                                            <div class="casino-odds-box back suspended-box back-1 market_10_b_btn market_10_row"><span class="casino-odds market_10_b_val">0</span><div class="casino-nation-book market_10_b_exposure market_exposure"></div></div>
                                                        </div>
                                                        <div class="doli-odds-box">
                                                            <div class="odd-name">Sum Total 3</div>
                                                            <div class="casino-odds-box back suspended-box back-1 market_11_b_btn market_11_row"><span class="casino-odds market_11_b_val">0</span><div class="casino-nation-book market_11_b_exposure market_exposure"></div></div>
                                                        </div>
                                                        <div class="doli-odds-box">
                                                            <div class="odd-name">Sum Total 4</div>
                                                            <div class="casino-odds-box back suspended-box back-1 market_12_b_btn market_12_row"><span class="casino-odds market_12_b_val">0</span><div class="casino-nation-book market_12_b_exposure market_exposure"></div></div>
                                                        </div>
                                                        <div class="doli-odds-box">
                                                            <div class="odd-name">Sum Total 5</div> 
                                                            <div class="casino-odds-box back suspended-box back-1 market_13_b_btn market_13_row"><span class="casino-odds market_13_b_val">0</span><div class="casino-nation-book market_13_b_exposure market_exposure"></div></div>
                                                        </div>
                                                        <div class="doli-odds-box">
                                                            <div class="odd-name">Sum Total 6</div>
                                                            <div class="casino-odds-box back suspended-box back-1 market_14_b_btn market_14_row"><span class="casino-odds market_14_b_val">0</span><div class="casino-nation-book market_14_b_exposure market_exposure"></div></div>
                                                        </div>
                                                        <div class="doli-odds-box">
                                                            <div class="odd-name">Sum Total 7</div>
                                                            <div class="casino-odds-box back suspended-box back-1 market_15_b_btn market_15_row"><span class="casino-odds market_15_b_val">0</span><div class="casino-nation-book market_15_b_exposure market_exposure"></div></div>
                                                        </div>
                                                        <div class="doli-odds-box">
                                                            <div class="odd-name">Sum Total 8</div>
                                                            <div class="casino-odds-box back suspended-box back-1 market_16_b_btn market_16_row"><span class="casino-odds market_16_b_val">0</span><div class="casino-nation-book market_16_b_exposure market_exposure"></div></div>
                                                        </div>
                                                        <div class="doli-odds-box">
                                                            <div class="odd-name">Sum Total 9</div>
                                                            <div class="casino-odds-box back suspended-box back-1 market_17_b_btn market_17_row"><span class="casino-odds market_17_b_val">0</span><div class="casino-nation-book market_17_b_exposure market_exposure"></div></div>
                                                        </div>
                                                        <div class="doli-odds-box">
                                                            <div class="odd-name">Sum Total 10</div>
                                                            <div class="casino-odds-box back suspended-box back-1 market_18_b_btn market_18_row"><span class="casino-odds market_18_b_val">0</span><div class="casino-nation-book market_18_b_exposure market_exposure"></div></div>
                                                        </div>
                                                        <div class="doli-odds-box">
                                                            <div class="odd-name">Sum Total 11</div>
                                                            <div class="casino-odds-box back suspended-box back-1 market_19_b_btn market_19_row"><span class="casino-odds market_19_b_val">0</span><div class="casino-nation-book market_19_b_exposure market_exposure"></div></div>
                                                        </div>
                                                        <div class="doli-odds-box">
                                                            <div class="odd-name">Sum Total 12</div>
                                                            <div class="casino-odds-box back suspended-box back-1 market_20_b_btn market_20_row"><span class="casino-odds market_20_b_val">0</span><div class="casino-nation-book market_20_b_exposure market_exposure"></div></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=dolidana">View All</a></span></div>
                                        <div class="casino-last-results" id="last-result"></div>
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
<script type="text/javascript" src='footer-js.js?17'></script>

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
    var markettype = "DOLIDANA";
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
            socket.emit('Room', 'dolidana');
        });
        socket.on('gameIframe', function(data) {
            $("#casinoIframe").attr('src', data);
        });
        socket.on('game', function(data) {
            data1 = data;
            if (data) {
                if (oldGameId != data1.t1[0].mid && data1.t1[0].mid != 0 && data1.t1[0].mid != "0") {
                    setTimeout(function() {
                        clearCards();
                    }, <?php echo CASINO_RESULT_TIMEOUT; ?>);
                }
                oldGameId = data1.t1[0].mid;
                if (data1.t1[0].mid != 0 && data1.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark")
                        .text(data.t1[0].remark);
                        $(".cardsblock").show();
                    if (data.t1[0].C1 && data.t1[0].C1 != "") {
                        $("#card_c1").attr("src", site_url + "storage/front/img/dice/dolidana/dice" + data.t1[0].C1 + ".png");
                    }
                    if (data.t1[0].C2 && data.t1[0].C2 != "") {
                        $("#card_c2").attr("src", site_url + "storage/front/img/dice/dolidana/dice" + data.t1[0].C2 + ".png");
                    }
                }else{
                    $(".cardsblock").hide();
                }
                clock.setValue(data1.t1[0].autotime);
                $(".round_no").text(data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid);
                $(".round_no2").val("");
                $("#casino_event_id").val(data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid);
                eventId = data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid;
                eventIdMain = data1.t1[0].mid == 0 ? 0 : data1.t1[0].mainMid;
                for (var j in data.t2) {
                    selectionid = data.t2[j].sectionId || data.t2[j].sid;
                    runner = data.t2[j].nation || data.t2[j].nat;
                    b1 = data.t2[j].b1;
                    bs1 = data.t2[j].bs1;
                    l1 = data.t2[j].l1;
                    ls1 = data.t2[j].ls1;
                    if(selectionid == "1" || selectionid == "2"){
                        eventId=eventIdMain;
                        $(".round_no2").val(eventIdMain);
                    }else{
                        eventId = data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid;
                    }
                    back_html = '<span class="odds d-block"><b>' + b1 + '</b></span> ';
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
                    $(".value_b_" + selectionid).html(b1);
                    $(".market_" + selectionid + "_b_val").html(b1);
					$(".market_" + selectionid + "_b_volume").html(bs1);

                    lay_html = '<span class="odds d-block"><b>' + l1 + '</b></span>';
                    $(".market_" + selectionid + "_l_btn").attr("side", "Back");
                    $(".market_" + selectionid + "_l_btn").attr("selectionid", selectionid);
                    $(".market_" + selectionid + "_l_btn").attr("marketid", selectionid);
                    $(".market_" + selectionid + "_l_btn").attr("runner", runner);
                    $(".market_" + selectionid + "_l_btn").attr("marketname", runner);
                    $(".market_" + selectionid + "_l_btn").attr("eventid", eventId);
                    $(".market_" + selectionid + "_l_btn").attr("markettype", markettype);
                    $(".market_" + selectionid + "_l_btn").attr("event_name", markettype);
                    $(".market_" + selectionid + "_l_btn").attr("fullmarketodds", l1);
                    $(".market_" + selectionid + "_l_btn").attr("fullfancymarketrate", l1);
                    $(".value_l_" + selectionid).html(l1);
                    $(".market_" + selectionid + "_l_val").html(l1);
					$(".market_" + selectionid + "_l_volume").html(ls1);

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

    function clearCards() {
        refresh(markettype);
        $(".cardsblock").hide();
        $("#card_c1").attr("src", "");
        $("#card_c2").attr("src", "");
    }

    function updateResult(data) {
        if (data && data[0]) {
            data = JSON.parse(JSON.stringify(data));
            resultGameLast = data[0].mid;

            if (last_result_id != resultGameLast) {
                last_result_id = resultGameLast;
                refresh(markettype);
            }

            var html = "";
            casino_type = "'dolidana'";
            data.forEach((runData) => {

                eventId = runData.mid == 0 ? 0 : runData.mid;
                html += '<span onclick="view_casiono_result(\'' + eventId + '\',' + casino_type + ')"  class="result ml-1 ' + (parseInt(runData.win) == 1 ? 'result-a' : 'result-b') + '">' + (parseInt(runData.win) == 1 ? 'P' : 'D') + '</span>';
            });
            $("#last-result").html(html);
            if (oldGameId == 0 || oldGameId == resultGameLast) {
                $(".cardsblock").hide();
                $("#card_c1").attr("src", "");
                $("#card_c2").attr("src", "");
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
        stake = $(this).attr("stake");
        eventId = $("#fullMarketBetsWrap").attr("eventid");
        $("#inputStake").val(stake);
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
        eventType = 'DOLIDANA';
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
        setTimeout(function() {
            $.ajax({
                type: 'POST',
                url: 'ajaxfiles/bet_place_dolidana.php',
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
                        /* $("#bet-error-class").addClass("b-toast-success"); */
                        toastr.clear()
                        toastr.success("", message, {
                            "timeOut": "3000",
                            "iconClass": "toast-success",
                            "positionClass": "toast-top-center",
                            "extendedTImeout": "0"
                        });
                    } else {
                        /* $("#bet-error-class").addClass("b-toast-danger"); */
                        toastr.clear()
                        toastr.warning("", message, {
                            "timeOut": "3000",
                            "iconClass": "toast-warning",
                            "positionClass": "toast-top-center",
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