<?php
include("../include/conn.php");
include('../include/flip_function.php');
include('../session.php');
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
include("head_css2.php");
?>
<style>
    .doli-dana-rules .sidebar-title {
        background-color: var(--theme1-bg) !important;
        color: #fff;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        padding: 0 5px 0 0;
    }

    .doli-dana-rules .table td {
        border-bottom: 0;
        text-align: center;
    }

    .doli-dana-rules .table thead th {
        text-align: center;
    }

    .b-table-sticky-header,
    .table-responsive,
    [class*="table-responsive-"] {
        padding: 5px;
    }

    .teenpatti-1day {
        background-color: #f7f7f7;
        margin-top: 5px;
    }

    .casino-table-box {
        padding: 5px;
    }

    .casino-table-box {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: flex-start;
    }

    .casino-table-left-box {
        margin-bottom: 20px;
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

    .casino-table-left-box,
    .casino-table-right-box {
        width: 100%;
        padding: 0 5px;
    }

    .seven-up-down-box {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
        border: 2px solid #72bbef;
    }

    h4,
    .h4 {
        font-size: 16px;
    }

    .up-box {
        width: 50%;
        height: 50px;
        display: flex;
        align-items: center;
        padding-left: 10px;
        padding-right: 40px;
        position: relative;
        justify-content: flex-end;
    }

    .up-box .up-down-book {
        position: absolute;
        left: 10px;
    }

    .text-end {
        text-align: right !important;
    }

    .text-start {
        text-align: left !important;
    }

    .up-down-odds {
        font-weight: bold;
        font-size: 18px;
    }

    .down-box {
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

    .down-box .up-down-book {
        position: absolute;
        right: 10px;
        z-index: 1;
    }

    /* .seven-box {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        -webkit-transform: translateX(-50%);
        -moz-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        -o-transform: translateX(-50%);
        z-index: 10;
    } */

    .seven-box img {
        height: 70px;
    }

    .casino-table-box-divider {
        background-color: #c7c8ca;
        width: 2px;
    }

    .casino-table-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        border-bottom: 1px solid #c7c8ca;
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

    .casino-nation-detail {
        width: 60%;
    }

    .market_1_row,
    .markets {
        min-height: 46px;
    }

    .market_2_row {
        min-height: 46px;
    }

    .casino-nation-name {
        font-size: 12px;
        font-weight: bold;
    }

    .casino-nation-detail img {
        height: 30px;
        margin-right: 5px;
    }

    .casino-nation-book {
        font-size: 12px;
        font-weight: bold;
        min-height: 18px;
        z-index: 1;
    }

    .back {
        background-color: #72bbef !important;
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

    .casino-odds-box {
        width: 20%;
    }

    .casino-odds {
        font-size: 14px;
        font-weight: bold;
        line-height: 1;
    }

    .lay {
        background-color: #faa9ba !important;
    }

    .video-overlay img {
        margin-left: 10px;
    }

    .casino-title {
        display: flex;
    }

    .casino-title .d-block {
        margin-top: 1px;
    }

    .suspended::after {
        width: 100% !important;
    }

    .casino-title a {
        color: #fff;
        text-decoration: underline;
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
        height: 25px;
        width: 25px;
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

    .casino-last-results .result.result-b {
        color: #ffff33;
    }

    .casino-last-results .result.result-c {
        color: #33c6ff;
    }

    .casino-last-results .result.result-a {
        color: #ff4500;
    }
    .video-overlay img {
        width: 50px !important;
        margin-left: unset !important;
    }
</style>

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
    width: 100%;
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
    width: 100%;
    gap: 10px;
}
.doli-main .any-pair {
    width: 100%;
}
.doli-main .any-pair .doli-odds-box
 {
    width: 100%;
}
.doli-dana .odd-name {
    font-size: 9px;
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
    width: calc(40% - 5px);
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
    width: calc(60% - 5px);
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
    width: 100%;
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
.doli-other-bets .particular-pair .bets-box .doli-odds-box {
    width: calc(16.66% - 5px);
}
.doli-other-bets .particular-pair .bets-box .casino-odds-box {
    width: 100%;
}
.doli-other-bets .sum-odds {
    width: 100%;
    background: #0000000a;
    padding: 8px;
    border-radius: 4px;
    display: flex;
    flex-wrap: wrap;
    /* justify-content: center; */
}

.doli-other-bets .sum-odds .bets-box .doli-odds-box {
    width: calc(16.66% - 5px);
}

.doli-other-bets .casino-odds-box, .doli-main .side-bets .casino-odds-box{
        border-radius: 4px;
}
.doli-other-bets .sum-odds .bets-box .casino-odds-box{
    width: 100%;
}

</style>

<body cz-shortcut-listen="true">
    <div id="app">
        <?php
        include("loader.php");
        ?>
        <div>
            <?php
            include("header.php");
            ?>
            <div class="main-content">
                <!---->
                <!---->
                <div>
                    <div class="casino-title"><span class="casino-name">Doli Dana</span><span class="d-block"><a href="#" onclick="view_rules('dolidana')" data-target="#rules_popup" data-toggle="modal" id="rules_popup_btn" class="ml-1" role="button">Rules</a></span></div>

                    <?php
                    include("casino_header.php");
                    ?>
                    <input type='hidden' class="round_no2">
                    <div class="tab-content">
                        <div id="bhav" class="tab-pane active">

                            <!---->
                            <div class="casino-video">


                                <?php
                                if (!empty(IFRAME_URL_SET)) {
                                ?>
                                    <iframe src="<?php echo IFRAME_URL . "" . DOLIDANA_CODE; ?>" width="100%" height="250px" style="border: 0px;"></iframe>
                                <?php

                                } else {
                                ?>
                                    <iframe id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                <?php

                                }
                                ?>

                                <!--  <iframe id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                <iframe src="<?php echo IFRAME_URL;
                                                echo DOLIDANA_CODE; ?>" width="100%" height="200" style="border: 0px;"></iframe> -->
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
                                                    <div class="inn">6</div>
                                                </div>
                                                <div class="down">
                                                    <div class="shadow"></div>
                                                    <div class="inn">6</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="flip-clock-active">
                                            <a href="#">
                                                <div class="up">
                                                    <div class="shadow"></div>
                                                    <div class="inn">5</div>
                                                </div>
                                                <div class="down">
                                                    <div class="shadow"></div>
                                                    <div class="inn">5</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="video-overlay">
                                    <div>
                                        <div>
                                            <!-- <h3 class="text-white">PLAYER</h3> -->
                                            <div class="cardsblock">
                                                <img id="card_c1" src="">
                                                <img id="card_c2" src="">
                                            </div>
                                        </div>
                                        <!-- <div>
                                            <h3 class="text-white">DEALER</h3>
                                            <div>
                                            	<img id="card_c2"  src="../storage/mobile/img/cards/1.png"> 
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="casino-container doli-dana">
                                <div class="casino-table-box">
                                    <div class="doli-main">
                                        <div class="players-bet">
                                            <div class="casino-table-row ">
                                                <div class="casino-nation-detail">
                                                    <div class="casino-nation-name">Player A</div>
                                                    <div class="casino-nation-book market_1_b_exposure"></div>
                                                </div>
                                                <div class="doli-odds-box">
                                                    <div class="casino-odds-box back back-1 market_1_b_btn market_1_row"><span class="casino-odds market_1_b_val">0</span><span class="casino-volume market_1_b_volume">0</span></div>
                                                </div>
                                            </div>
                                            <div class="casino-table-row ">
                                                <div class="casino-nation-detail">
                                                    <div class="casino-nation-name">Player B</div>
                                                    <div class="casino-nation-book market_2_b_exposure"></div>
                                                </div>
                                                <div class="doli-odds-box">
                                                    <div class="casino-odds-box back back-1 market_2_b_btn market_2_row"><span class="casino-odds market_2_b_val">0</span><span class="casino-volume market_2_b_volume">0</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="side-bets"> 
                                            <div class="any-pair">
                                                <div class="doli-odds-box">
                                                    <div class="odd-name">Any Pair</div>
                                                    <div class="casino-odds-box back back-1 market_3_b_btn market_3_row"><span class="casino-odds market_3_b_val">0</span><span class="casino-nation-book market_3_b_exposure market_exposure"></span></div>
                                                </div>
                                            </div>
                                            <div class="odd-even-pair">
                                                <div class="bets-box">
                                                    <div class="doli-odds-box">
                                                        <div class="odd-name">Odd</div>
                                                        <div class="casino-odds-box back back-1 market_21_b_btn market_21_row"><span class="casino-odds market_21_b_val">0</span><span class="casino-nation-book market_21_b_exposure market_exposure"></span></div>
                                                    </div>
                                                    <div class="doli-odds-box">
                                                        <div class="odd-name">Even</div>
                                                        <div class="casino-odds-box back back-1 market_22_b_btn market_22_row"><span class="casino-odds market_22_b_val">0</span><span class="casino-nation-book market_22_b_exposure market_exposure"></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="lucky7-pair">
                                                <div class="bets-box">
                                                    <div class="doli-odds-box">
                                                        <div class="odd-name">&lt; 7</div>
                                                        <div class="casino-odds-box back back-1 market_25_b_btn market_25_row"><span class="casino-odds market_25_b_val">0</span><span class="casino-nation-book market_25_b_exposure market_exposure"></span></div>
                                                    </div>
                                                    <div class="doli-odds-box">
                                                        <div class="seven-box"><img src="../storage/front/img/trap/trape-seven.png"></div>
                                                    </div>
                                                    <div class="doli-odds-box">
                                                        <div class="odd-name">&gt; 7</div>
                                                        <div class="casino-odds-box back back-1 market_24_b_btn market_24_row"><span class="casino-odds market_24_b_val">0</span><span class="casino-nation-book market_24_b_exposure market_exposure"></span></div>
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
                                                    <div class="casino-odds-box back back-1 market_4_b_btn market_4_row"><span class="casino-odds market_4_b_val">0</span><span class="casino-nation-book market_4_b_exposure market_exposure"></span></div>
                                                </div>
                                                <div class="doli-odds-box">
                                                    <div class="odd-name">2-2 Pair</div>
                                                    <div class="casino-odds-box back back-1 market_5_b_btn market_5_row"><span class="casino-odds market_5_b_val">0</span><span class="casino-nation-book market_5_b_exposure market_exposure"></span></div>
                                                </div>
                                                <div class="doli-odds-box">
                                                    <div class="odd-name">3-3 Pair</div>
                                                    <div class="casino-odds-box back back-1 market_6_b_btn market_6_row"><span class="casino-odds market_6_b_val">0</span><span class="casino-nation-book market_6_b_exposure market_exposure"></span></div>
                                                </div>
                                                <div class="doli-odds-box">
                                                    <div class="odd-name">4-4 Pair</div>
                                                    <div class="casino-odds-box back back-1 market_7_b_btn market_7_row"><span class="casino-odds market_7_b_val">0</span><span class="casino-nation-book market_7_b_exposure market_exposure"></span></div>
                                                </div>
                                                <div class="doli-odds-box">
                                                    <div class="odd-name">5-5 Pair</div>
                                                    <div class="casino-odds-box back back-1 market_8_b_btn market_8_row"><span class="casino-odds market_8_b_val">0</span><span class="casino-nation-book market_8_b_exposure market_exposure"></span></div>
                                                </div>
                                                <div class="doli-odds-box">
                                                    <div class="odd-name">6-6 Pair</div>
                                                    <div class="casino-odds-box back back-1 market_9_b_btn market_9_row"><span class="casino-odds market_9_b_val">0</span><span class="casino-nation-book market_9_b_exposure market_exposure"></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sum-odds">
                                            <h4>Odds of Sum Total</h4>
                                            <div class="bets-box">
                                                <div class="doli-odds-box">
                                                    <div class="odd-name">Sum Total 2</div>
                                                    <div class="casino-odds-box back back-1 market_10_b_btn market_10_row"><span class="casino-odds market_10_b_val">0</span><span class="casino-nation-book market_10_b_exposure market_exposure"></span></div>
                                                </div>
                                                <div class="doli-odds-box">
                                                    <div class="odd-name">Sum Total 3</div>
                                                    <div class="casino-odds-box back back-1 market_11_b_btn market_11_row"><span class="casino-odds market_11_b_val">0</span><span class="casino-nation-book market_11_b_exposure market_exposure"></span></div>
                                                </div>
                                                <div class="doli-odds-box">
                                                    <div class="odd-name">Sum Total 4</div>
                                                    <div class="casino-odds-box back back-1 market_12_b_btn market_12_row"><span class="casino-odds market_12_b_val">0</span><span class="casino-nation-book market_12_b_exposure market_exposure"></span></div>
                                                </div>
                                                <div class="doli-odds-box">
                                                    <div class="odd-name">Sum Total 5</div>
                                                    <div class="casino-odds-box back back-1 market_13_b_btn market_13_row"><span class="casino-odds market_13_b_val">0</span><span class="casino-nation-book market_13_b_exposure market_exposure"></span></div>
                                                </div>
                                                <div class="doli-odds-box">
                                                    <div class="odd-name">Sum Total 6</div>
                                                    <div class="casino-odds-box back back-1 market_14_b_btn market_14_row"><span class="casino-odds market_14_b_val">0</span><span class="casino-nation-book market_14_b_exposure market_exposure"></span></div>
                                                </div>
                                                <div class="doli-odds-box">
                                                    <div class="odd-name">Sum Total 7</div>
                                                    <div class="casino-odds-box back back-1 market_15_b_btn market_15_row"><span class="casino-oddsmarket_15_b_val">0</span><span class="casino-nation-book market_15_b_exposure market_exposure"></span></div>
                                                </div>
                                                <div class="doli-odds-box">
                                                    <div class="odd-name">Sum Total 8</div>
                                                    <div class="casino-odds-box back back-1 market_16_b_btn market_16_row"><span class="casino-odds market_16_b_val">0</span><span class="casino-nation-book market_16_b_exposure market_exposure"></span></div>
                                                </div>
                                                <div class="doli-odds-box">
                                                    <div class="odd-name">Sum Total 9</div>
                                                    <div class="casino-odds-box back back-1 market_17_b_btn market_17_row"><span class="casino-odds market_17_b_val">0</span><span class="casino-nation-book market_17_b_exposure market_exposure"></span></div>
                                                </div>
                                                <div class="doli-odds-box">
                                                    <div class="odd-name">Sum Total 10</div>
                                                    <div class="casino-odds-box back back-1 market_18_b_btn market_18_row"><span class="casino-odds market_18_b_val">0</span><span class="casino-nation-book market_18_b_exposure market_exposure"></span></div>
                                                </div>
                                                <div class="doli-odds-box">
                                                    <div class="odd-name">Sum Total 11</div>
                                                    <div class="casino-odds-box back back-1 market_19_b_btn market_19_row"><span class="casino-odds market_19_b_val">0</span><span class="casino-nation-book market_19_b_exposure market_exposure"></span></div>
                                                </div>
                                                <div class="doli-odds-box">
                                                    <div class="odd-name">Sum Total 12</div>
                                                    <div class="casino-odds-box back back-1 market_20_b_btn market_20_row"><span class="casino-odds market_20_b_val">0</span><span class="casino-nation-book market_20_b_exposure market_exposure"></span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=dolidana">View All</a></span></div>
                                <div class="casino-last-results" id="last-result"></div>
                                <!---->
                                <!---->
                                <!---->
                                <div class="sidebar-box my-bet-container doli-dana-rules d-xl-none w-100">
                                    <div class="sidebar-title">
                                        <h4>Rules</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Win</th>
                                                    <th>Loss</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="../storage/mobile/img/dice/dice3.png" alt="">
                                                        <img src="../storage/mobile/img/dice/dice3.png" alt="">
                                                    </td>
                                                    <td>
                                                        <img src="../storage/mobile/img/dice/dice1.png" alt="">
                                                        <img src="../storage/mobile/img/dice/dice1.png" alt="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="../storage/mobile/img/dice/dice5.png" alt="">
                                                        <img src="../storage/mobile/img/dice/dice5.png" alt="">
                                                    </td>
                                                    <td>
                                                        <img src="../storage/mobile/img/dice/dice2.png" alt="">
                                                        <img src="../storage/mobile/img/dice/dice2.png" alt="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="../storage/mobile/img/dice/dice6.png" alt="">
                                                        <img src="../storage/mobile/img/dice/dice6.png" alt="">
                                                    </td>
                                                    <td>
                                                        <img src="../storage/mobile/img/dice/dice4.png?3" alt="">
                                                        <img src="../storage/mobile/img/dice/dice4.png?3" alt="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="../storage/mobile/img/dice/dice5.png" alt="">
                                                        <img src="../storage/mobile/img/dice/dice6.png" alt="">
                                                    </td>
                                                    <td>
                                                        <img src="../storage/mobile/img/dice/dice1.png" alt="">
                                                        <img src="../storage/mobile/img/dice/dice2.png" alt="">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        include("open_bet.php");
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

<script type="text/javascript" src="../js/socket.io.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script src="../storage/front/js/flipclock.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src='footer-js.js?23'></script>

<?

include("betpopcss.php");
?>

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
                        $("#card_c1").attr("src", site_url + "storage/front/img/dice/dolidana/dice" + data.t1[0].C1 + ".png?1");
                    }
                    if (data.t1[0].C2 && data.t1[0].C2 != "") {
                        $("#card_c2").attr("src", site_url + "storage/front/img/dice/dolidana/dice" + data.t1[0].C2 + ".png?1");
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
                        $(".round_no2").val(eventId);
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
                        $(".market_" + selectionid + "_row").addClass("suspended");
                    } else {
                        $(".market_" + selectionid + "_row").removeClass("suspended");
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
    jQuery(document).on("click", ".back-1", function() {
        $("#popup_color").removeClass("back");
        $("#popup_color").removeClass("lay");
        $("#popup_color").addClass("back");
        var fullmarketodds = $(this).attr("fullmarketodds");
        if (fullmarketodds != "") {
            side = $(this).attr("side");
            selectionid = $(this).attr("selectionid");
            market_odd_name = $(this).attr("markettype");
            runner = $(this).attr("runner");
            market_runner_name = runner;
            marketname = $(this).attr("marketname");
            markettype = $(this).attr("markettype");
            fullfancymarketrate = $(this).attr("fullfancymarketrate");
            odds_change_value = "disabled";
            runs_lable = 'Runs';
            runs_lable = 'Odds';
            fullfancymarketrate = fullmarketodds;
            eventId = $(this).attr("eventid");
            marketId = $(this).attr("marketid");
            event_name = $(this).attr("event_name");
            $(".select").removeClass("select");
            $(this).addClass("select");
            return_html = "";

            $("#inputStake").val();
            $("#market_runner_label").text(market_runner_name);
            $("#bet_stake_side").val("Back");
            $("#odds_val").val(fullmarketodds);
            $("#bet_event_id").val(eventId);
            $("#bet_marketId").val(marketId);
            $("#bet_event_name").val(event_name);
            $("#bet_market_name").val(marketname);
            $("#bet_markettype").val(markettype);
            $("#fullfancymarketrate").val(fullfancymarketrate);
            $("#oddsmarketId").val(marketId);
            $("#market_runner_name").val(market_runner_name);
            $("#market_odd_name").val(market_odd_name);

            $('#profitLiability').text('');
            $(".placeBet").attr('disabled', false);
            $("#inputStake").val("");

            $('.open_back_place_bet').show();
            $('#open_back_place_bet').modal("show");
        }
    });
    jQuery(document).on("click", ".lay-1", function() {
        $("#popup_color").removeClass("back");
        $("#popup_color").removeClass("lay");
        $("#popup_color").addClass("lay");
        var fullmarketodds = $(this).attr("fullmarketodds");
        if (fullmarketodds != "") {
            side = $(this).attr("side");
            selectionid = $(this).attr("selectionid");
            market_odd_name = $(this).attr("markettype");
            runner = $(this).attr("runner");
            market_runner_name = runner;
            marketname = $(this).attr("marketname");
            markettype = $(this).attr("markettype");
            fullfancymarketrate = $(this).attr("fullfancymarketrate");
            odds_change_value = "disabled";
            runs_lable = 'Runs';
            runs_lable = 'Odds';
            fullfancymarketrate = fullmarketodds;
            eventId = $(this).attr("eventid");
            marketId = $(this).attr("marketid");
            event_name = $(this).attr("event_name");
            $(".select").removeClass("select");
            $(this).addClass("select");
            return_html = "";

            $("#inputStake").val();
            $("#market_runner_label").text(market_runner_name);
            $("#bet_stake_side").val("Lay");
            $("#odds_val").val(fullmarketodds);
            $("#bet_event_id").val(eventId);
            $("#bet_marketId").val(marketId);
            $("#bet_event_name").val(event_name);
            $("#bet_market_name").val(marketname);
            $("#bet_markettype").val(markettype);
            $("#fullfancymarketrate").val(fullfancymarketrate);
            $("#oddsmarketId").val(marketId);
            $("#market_runner_name").val(market_runner_name);
            $("#market_odd_name").val(market_odd_name);

            $('#profitLiability').text('');
            $(".placeBet").attr('disabled', false);
            $("#inputStake").val("");

            $('.open_back_place_bet').show();
            $('#open_back_place_bet').modal("show");
        }
    });

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

    jQuery(document).on("click", "#placeBet", function() {

        $("#placeBet").html('<i class="fa fa-spinner  fa-spin"></i> Submit');
        $(".placeBet").attr('disabled', true);
        $(".placeBet").removeAttr("id", "placeBet");
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

        $("#bet-error-class").removeClass("b-toast-danger");
        $("#bet-error-class").removeClass("b-toast-success");
        setTimeout(function() {
            $.ajax({
                type: 'POST',
                url: '../ajaxfiles/bet_place_dolidana.php',
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
                        /*$("#bet-error-class").addClass("b-toast-success");*/
                    } else {
                        toastr.clear()
                        toastr.warning("", message, {
                            "timeOut": "3000",
                            "iconClass": "toast-warning",
                            "positionClass": "toast-top-center",
                            "extendedTImeout": "0"
                        });
                        /*$("#bet-error-class").addClass("b-toast-danger");*/
                    }
                    /*error_message_text = message;
					$("#errorMsgText").text(error_message_text);
					$("#errorMsg").fadeIn('fast').delay(3000).hide(0);*/
                    $(".close-bet-slip").click();
                    refresh(markettype);
                    $(".placeBet").attr("id", "placeBet");
                    $("#placeBet").html('Submit');
                    $(".placeBet").attr('disabled', false);
                    $('.open_back_place_bet').hide();
                    $('#open_back_place_bet').modal("hide");
                }
            });
        }, bet_sec - 2000);
    });
</script>

<div id="open_back_place_bet" class="modal open_back_place_bet" role="dialog">
    <div class="modal-dialog" style="margin:0;">
        <div role="document" id="__BVID__30___BV_modal_content_" tabindex="-1" class="modal-content">
            <header id="__BVID__30___BV_modal_header_" class="modal-header">
                <h5 id="__BVID__30___BV_modal_title_" class="modal-title">Place Bet</h5>
                <button type="button" data-dismiss="modal" class="close">&times;</button>
            </header>
            <div id="__BVID__30___BV_modal_body_" class="modal-body" style="    padding: 0px;">
                <div class="place-bet1 pt-2 pb-2 back place-bet-modal" id="popup_color">
                    <div class="row row5">
                        <div class="col-6"><b id="market_runner_label"></b></div>
                        <div class="col-6 text-right pt-1">Profit: <span id="profitLiability"></span></div>
                    </div>
                    <div class="odd-stake-box">
                        <div class="row row5 mt-1">
                            <div class="col-6 text-center">Odds</div>
                            <div class="col-6 text-center">Amount</div>
                        </div>
                        <div class="row row5 mt-1">
                            <div class="col-6"><input type="text" id="odds_val" class="stakeinput w-100" disabled="" value="1.7"></div>
                            <div class="col-6">
                                <div class="float-right"><input type="number" id="inputStake" class="stakeinput w-100" value=""></div>
                                <input type='hidden' id='market_runner_label' value='' />
                                <input type='hidden' id='bet_stake_side' value='' /><input type='hidden' id='bet_event_id' value='' /><input type='hidden' id='bet_marketId' value='' /><input type='hidden' id='bet_event_name' value='' /><input type='hidden' id='bet_market_name' value='' /><input type='hidden' id='bet_markettype' value='' /><input type='hidden' id='fullfancymarketrate' value='' /> <input type='hidden' id='oddsmarketId' value='' /><input type='hidden' id='market_runner_name' value='' /><input type='hidden' id='market_odd_name' value='' />
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row row5">
                            <div class="col-5"><b id="market_runner_label">Player A</b></div>
                            <div class="col-7 text-right">
                                <div class="float-right">
                                    <button class="stakeactionminus btn disabled">
                                        <span class="fa fa-minus"></span>
                                    </button>
                                    <input type="text" placeholder="0" class="stakeinput" id="odds_val">
                                    <button class="stakeactionminus btn disabled">
                                        <span class="fa fa-plus"></span>
                                    </button>
                                </div>
                            </div>
                        </div> -->

                    <!--  <div class="row row5 mt-2">
                            <div class="col-4">
                                <input type="number" placeholder="00" id="inputStake" class="stakeinput w-100">
                            </div>
                            <div class="col-4">
                                <button class="btn btn-primary btn-block  placeBet" id="placeBet">
                                    Submit
                                </button>
                            </div>

                        </div> -->
                    <div class="place-bet-buttons mt-1">
                        <?php
                        $get_button_value = $conn->query("select * from user_master where id=$user_id and (casino_button_value <> '' and casino_button_value IS NOT NULL)");
                        $num_rows = $get_button_value->num_rows;
                        $button_array = array();
                        if ($num_rows <= 0) {
                            $button_array[] = 500;
                            $button_array[] = 1000;
                            $button_array[] = 2000;
                            $button_array[] = 3000;
                            $button_array[] = 4000;
                            $button_array[] = 5000;
                            $button_array[] = 10000;
                            $button_array[] = 20000;
                        } else {
                            $fetch_button_value_data = mysqli_fetch_assoc($get_button_value);
                            $fetch_button_value = $fetch_button_value_data['casino_button_value'];
                            $default_stake = $fetch_button_value_data['default_stake'];
                            $one_bet_default_stake = $fetch_button_value_data['one_bet_default_stake'];
                            $button_array = explode(",", $fetch_button_value);
                        }
                        foreach ($button_array as $button_value) {
                        ?>
                            <button type="button" class="btn-place-bet btn btn-secondary btn-block1 label_stake" stake='<?php echo $button_value; ?>'>
                                +<?php echo $button_value; ?>
                            </button>

                        <?php
                        }
                        ?>
                    </div>
                    <div class="mt-1 place-bet-btn-box">
                        <button class="btn btn-link stackclear" style="text-decoration: underline;">Clear</button>
                        <button class="btn btn-info" data-target="#set_btn_value" data-toggle="modal">Edit</button>
                        <button class="btn btn-danger" data-dismiss="modal" class="close">Reset</button>
                        <button class="btn btn-success placeBet" id="placeBet" disabled>Place Bet</button>
                    </div>
                    <div class="mt-1 d-flex"><span>Range: 100 to 5L</span></div>
                </div>
            </div>
            <!---->
        </div>
    </div>
</div>
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
</div>
<?php
include "footer.php";
include "footer-result-popup.php";
?>

</html>