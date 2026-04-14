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
.sicbo-title-box {
    background-color: #666666;
    color: #fff;
    border-radius: 10px;
    padding: 0 5px;
    height: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    min-width: 70px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    -ms-border-radius: 10px;
    -o-border-radius: 10px;
}
@media only screen and (min-width: 1200px) and (max-width: 1599px) {
    .sicbo-title-box {
        padding: 0 10px;
        font-size: 9px;
    }
}
.sicbo-middle-small, .sicbo-middle-big {
    flex: unset;
    min-width: 60px;
}
.sicbo-square-box {
    text-transform: uppercase;
    background-image: linear-gradient(rgba(153, 146, 135, 0.7), rgba(162, 142, 130, 0.7));
    border-radius: 6px;
    padding: 5px;
    color: #1d1b2d;
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    margin: 0 1px;
    flex: 1 1 auto;
    cursor: pointer;
}
.sicbo-middle-small, .sicbo-middle-big {
    flex: unset;
    min-width: 60px;
}


.sicbo-middle-middle-row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-top: 10px;
    width: 100%;
}
.sicbo-middle-middle-row .sicbo-cube-box-container {
    flex: 1 auto;
}
.sicbo-cube-box-container {
    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
    margin: 0 1px;
}
.sicbo-middle-middle-row .sicbo-cube-box-container:first-child .sicbo-title-box {
    display: flex;
    justify-content: space-between;
}

.sicbo-cube-box-group {
    display: flex;
    flex-wrap: wrap;
    margin-top: 5px;
}

.sicbo-cube-double, .sicbo-cube-tripple {
    position: relative;
}
.sicbo-cube-box {
    width: 50px;
    height: 50px;
}
.sicbo-cube-single img {
    height: 30px;
}

.sicbo-cube-double img:first-child {
    position: absolute;
    left: 5px;
    top: 5px;
}
.sicbo-cube-double img {
    height: 20px;
}
.sicbo-cube-double img:last-child {
    position: absolute;
    right: 5px;
    bottom: 5px;
}
.sicbo-cube-tripple img:first-child {
    position: absolute;
    left: 5px;
    top: 5px;
}
.sicbo-cube-tripple img:nth-child(2) {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
}
.sicbo-cube-tripple img:last-child {
    position: absolute;
    right: 5px;
    bottom: 5px;
}
.sicbo-bottom {
    display: flex;
    margin-top: 10px;
}
.sicbo-bottom .sicbo-cube-box-container {
    margin: 0 auto;
}
.sicbo-bottom .sicbo-cube-box {
    flex: unset;
    height: 60px;
    justify-content: space-between;
}

.sicbo-cube-combination img {
    height: 20px;
}
@media only screen and (min-width: 1200px) and (max-width: 1399px) {
    .sicbo-cube-combination img {
        height: 17px;
    }
    .sicbo-bottom .sicbo-cube-box {
        height: 50px;
        width: 42px;
    }
    .sicbo-cube-tripple img {
        height: 10px;
    }
    .sicbo-cube-double img {
        height: 15px;
    }
    .sicbo-middle-middle-row .sicbo-cube-box {
        width: 28px;
    }
    .sicbo-middle-midle .sicbo-title-box {
        padding: 0 2px;
        font-size: 8px;
        min-width: unset;
    }
    .sicbo-middle-midle .sicbo-square-box {
        padding: 0;
        height: 42px;
    }
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

.sicbo-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.sicbo-middle-top-row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    width: 100%;
}
.sicbo-middle-top-box-odd {
    margin: 0 5px;
    min-width: 50px;
}
.sicbo-box-value {
    font-weight: bold;
}

.sicbo-middle-top-box-odd {
    margin: 0 5px;
    min-width: 50px;
}
@media only screen and (max-width: 767px) {
    .sicbo-title-box {
        min-width: unset;
        padding: 0 3px;
        font-size: 10px;
    }
    .sicbo-middle {
        flex-wrap: wrap;
    }
    .sicbo-middle-left {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
    }
    .sicbo-middle-left .sicbo-cube-box-container {
        width: 100%;
    }
    .sicbo-title-box {
        min-width: unset;
        padding: 0 3px;
        font-size: 10px;
    }
    .sicbo-middle-left .sicbo-title-box {
        font-size: 9px;
        padding: 0px 2px;
    }
    .sicbo-middle-left .sicbo-cube-box {
        margin-bottom: 2px;
    }
    .sicbo-middle-right {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    .sicbo-middle-top-row {
        width: 100%;
        align-content: flex-start;
    }
    .sicbo-middle-top-row .sicbo-square-box {
        margin: 1px;
        width: calc(14% - 2px);
        height: 50px;
    }
    .sicbo-bottom {
        width: 100%;
    }
    .sicbo-bottom .sicbo-cube-box-container {
        width: 100%;
    }
    .sicbo-bottom .sicbo-cube-box-group {
        flex-direction: row;
        justify-content: space-between;
    }
    .sicbo-bottom .sicbo-cube-box {
        width: auto;
        height: auto;
        margin-bottom: 5px;
        flex-direction: row;
        width: 19%;
    }
    .sicbo-middle-middle-row {
        width: 100%;
        align-content: flex-start;
        margin-top: 0;
    }
    .sicbo-middle-middle-row .sicbo-cube-box-container {
        width: 32%;
        margin-bottom: 5px;
    }
    .sicbo-title-box {
        min-width: unset;
        padding: 0 3px;
        font-size: 10px;
    }
}

.casino-last-result-title {
    padding: 10px;
    background-color: var(--theme2-bg);
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

.casino-last-results .result.result-a {
    color: #ff4500;
}

.casino-last-results .result.result-b {
    color: #ffff33;
}

.casino-last-results .result.result-c {
    color: #33c6ff;
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
                                        <div class="game-heading"><span class="card-header-title">Sic Bo
                                                <!-- <small role="button" class="teenpatti-rules"  onclick="view_rules('tp-rules.jpg')" data-target="#rules_popup" data-toggle="modal"  tabindex="0"><u>Rules</u></small> --> <!----></span>
                                                <small role="button" class="teenpatti-rules"  onclick="view_rules('sicbo')" data-target="#rules_popup" data-toggle="modal"  tabindex="0"><u>Rules</u></small> 
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

                                        </div>
                                        <div class="d-flex flex-wrap justify-content-between mt-2">
                                            <div class="d-none d-xl-block w-100">
                                                <div class="sicbo-top d-flex justify-content-between ">
                                                    <div class="sicbo-top-box sicbo-title-box">1:1 Lose to Any Triple</div>
                                                    <div class="sicbo-top-box sicbo-title-box">30:1</div>
                                                    <div class="sicbo-top-box sicbo-title-box">1:1 Lose to Any Triple</div>
                                                </div>
                                                <div class="sicbo-middle-small d-flex justify-content-between mt-2 flex-nowrap">
                                                    <div class="sicbo-middle-small sicbo-square-box market_1_b_btn market_1_row suspended-box back-1">
                                                        <div>Small</div>
                                                        <div class="sicbo-box-value">4-10</div>
                                                    </div>
                                                    <div class="sicbo-middle-midle d-flex flex-wrap w-auto justify-content-between">
                                                        <div class="sicbo-middle-top-row d-flex flex-wrap justify-content-between w-100">
                                                            <div class="sicbo-middle-top-box sicbo-square-box sicbo-middle-top-box-odd  market_4_b_btn market_4_row suspended-box back-1">
                                                                <div>ODD</div>
                                                                <div class="sicbo-box-value">1:1</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box market_18_b_btn market_18_row suspended-box back-1">
                                                                <div>4</div>
                                                                <div class="sicbo-box-value">50:1</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box market_19_b_btn market_19_row suspended-box back-1">
                                                                <div>5</div>
                                                                <div class="sicbo-box-value">20:1</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box market_20_b_btn market_20_row suspended-box back-1">
                                                                <div>6</div>
                                                                <div class="sicbo-box-value">15:1</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box market_21_b_btn market_21_row suspended-box back-1">
                                                                <div>7</div>
                                                                <div class="sicbo-box-value">12:1</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box market_22_b_btn market_22_row suspended-box back-1">
                                                                <div>8</div>
                                                                <div class="sicbo-box-value">8:1</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box market_23_b_btn market_23_row suspended-box back-1">
                                                                <div>9</div>
                                                                <div class="sicbo-box-value">6:1</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box market_24_b_btn market_24_row suspended-box back-1">
                                                                <div>10</div>
                                                                <div class="sicbo-box-value">6:1</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box sicbo-middle-top-box-odd  market_3_b_btn market_3_row suspended-box back-1">
                                                                <div class="">Any Triple</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box market_25_b_btn market_25_row suspended-box back-1">
                                                                <div>11</div>
                                                                <div class="sicbo-box-value">6:1</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box market_26_b_btn market_26_row suspended-box back-1">
                                                                <div>12</div>
                                                                <div class="sicbo-box-value">6:1</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box market_27_b_btn market_27_row suspended-box back-1">
                                                                <div>13</div>
                                                                <div class="sicbo-box-value">8:1</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box market_28_b_btn market_28_row suspended-box back-1">
                                                                <div>14</div>
                                                                <div class="sicbo-box-value">12:1</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box market_29_b_btn market_29_row suspended-box back-1">
                                                                <div>15</div>
                                                                <div class="sicbo-box-value">15:1</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box market_30_b_btn market_30_row suspended-box back-1">
                                                                <div>16</div>
                                                                <div class="sicbo-box-value">20:1</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box market_31_b_btn market_31_row suspended-box back-1">
                                                                <div>17</div>
                                                                <div class="sicbo-box-value">50:1</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box sicbo-middle-top-box-odd market_5_b_btn market_5_row suspended-box back-1">
                                                                <div>Even</div>
                                                                <div class="sicbo-box-value ">1:1</div>
                                                            </div>
                                                        </div>
                                                        <div class="sicbo-middle-middle-row">
                                                            <div class="sicbo-cube-box-container">
                                                                <div class="sicbo-top-box sicbo-title-box"><span>1:1 on Sinlge</span><span>2:1 on Double</span><span>3:1 on Tripple</span></div>
                                                                <div class="sicbo-cube-box-group">
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-single suspended-box back-1  market_47_row  market_47_b_btn"><img src="storage/front/img/cards_new/dice1.png" alt="Dice 1"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-single suspended-box back-1  market_48_row  market_48_b_btn"><img src="storage/front/img/cards_new/dice2.png" alt="Dice 2"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-single suspended-box back-1  market_48_row  market_49_b_btn"><img src="storage/front/img/cards_new/dice3.png" alt="Dice 3"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-single suspended-box back-1  market_50_row  market_50_b_btn"><img src="storage/front/img/cards_new/dice4.png" alt="Dice 4"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-single suspended-box back-1  market_51_row  market_51_b_btn"><img src="storage/front/img/cards_new/dice5.png" alt="Dice 5"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-single suspended-box back-1  market_52_row  market_52_b_btn"><img src="storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                                                </div>
                                                            </div>
                                                            <div class="sicbo-cube-box-container">
                                                                <div class="sicbo-top-box sicbo-title-box">8:1 Double</div>
                                                                <div class="sicbo-cube-box-group">
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-double suspended-box back-1  market_6_row  market_6_b_btn"><img src="storage/front/img/cards_new/dice1.png" alt="Dice 1"><img src="storage/front/img/cards_new/dice1.png" alt="Dice 1"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-double suspended-box back-1  market_7_row market_7_b_btn"><img src="storage/front/img/cards_new/dice2.png" alt="Dice 2"><img src="storage/front/img/cards_new/dice2.png" alt="Dice 2"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-double suspended-box back-1  market_8_row market_8_b_btn"><img src="storage/front/img/cards_new/dice3.png" alt="Dice 3"><img src="storage/front/img/cards_new/dice3.png" alt="Dice 3"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-double suspended-box back-1  market_9_row market_9_b_btn"><img src="storage/front/img/cards_new/dice4.png" alt="Dice 4"><img src="storage/front/img/cards_new/dice4.png" alt="Dice 4"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-double suspended-box back-1  market_10_row market_10_b_btn"><img src="storage/front/img/cards_new/dice5.png" alt="Dice 5"><img src="storage/front/img/cards_new/dice5.png" alt="Dice 5"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-double suspended-box back-1  market_11_row market_11_b_btn"><img src="storage/front/img/cards_new/dice6.png" alt="Dice 6"><img src="storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                                                </div>
                                                            </div>
                                                            <div class="sicbo-cube-box-container">
                                                                <div class="sicbo-top-box sicbo-title-box">150:1 Each Tripple</div>
                                                                <div class="sicbo-cube-box-group">
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-tripple suspended-box back-1  market_12_row  market_12_b_btn"><img src="storage/front/img/cards_new/dice1.png" alt="Dice 1"><img src="storage/front/img/cards_new/dice1.png" alt="Dice 1"><img src="storage/front/img/cards_new/dice1.png" alt="Dice 1"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-tripple suspended-box back-1  market_13_row  market_13_b_btn"><img src="storage/front/img/cards_new/dice2.png" alt="Dice 2"><img src="storage/front/img/cards_new/dice2.png" alt="Dice 2"><img src="storage/front/img/cards_new/dice2.png" alt="Dice 2"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-tripple suspended-box back-1  market_14_row  market_14_b_btn"><img src="storage/front/img/cards_new/dice3.png" alt="Dice 3"><img src="storage/front/img/cards_new/dice3.png" alt="Dice 3"><img src="storage/front/img/cards_new/dice3.png" alt="Dice 3"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-tripple suspended-box back-1  market_15_row  market_15_b_btn"><img src="storage/front/img/cards_new/dice4.png" alt="Dice 4"><img src="storage/front/img/cards_new/dice4.png" alt="Dice 4"><img src="storage/front/img/cards_new/dice4.png" alt="Dice 4"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-tripple suspended-box back-1  market_16_row  market_16_b_btn"><img src="storage/front/img/cards_new/dice5.png" alt="Dice 5"><img src="storage/front/img/cards_new/dice5.png" alt="Dice 5"><img src="storage/front/img/cards_new/dice5.png" alt="Dice 5"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-tripple suspended-box back-1  market_17_row  market_17_b_btn"><img src="storage/front/img/cards_new/dice6.png" alt="Dice 6"><img src="storage/front/img/cards_new/dice6.png" alt="Dice 6"><img src="storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sicbo-middle-big sicbo-square-box  market_2_b_btn market_2_row suspended-box back-1">
                                                        <div>Big</div>
                                                        <div class="sicbo-box-value ">11-17</div>
                                                    </div>
                                                </div>
                                                <div class="sicbo-bottom">
                                                    <div class="sicbo-cube-box-container">
                                                        <div class="sicbo-top-box sicbo-title-box">5:1 Two Dice</div>
                                                        <div class="sicbo-cube-box-group">
                                                            <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_32_row  market_32_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice1.png" alt="Dice 1"><img src="storage/front/img/cards_new/dice2.png" alt="Dice 2"></div>
                                                            <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_33_row  market_33_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice1.png" alt="Dice 1"><img src="storage/front/img/cards_new/dice3.png" alt="Dice 3"></div>
                                                            <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_34_row  market_34_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice1.png" alt="Dice 1"><img src="storage/front/img/cards_new/dice4.png" alt="Dice 4"></div>
                                                            <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_35_row  market_35_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice1.png" alt="Dice 1"><img src="storage/front/img/cards_new/dice5.png" alt="Dice 5"></div>
                                                            <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_36_row  market_36_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice1.png" alt="Dice 1"><img src="storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                                            <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_37_row  market_37_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice2.png" alt="Dice 2"><img src="storage/front/img/cards_new/dice3.png" alt="Dice 3"></div>
                                                            <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_38_row  market_38_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice2.png" alt="Dice 2"><img src="storage/front/img/cards_new/dice4.png" alt="Dice 4"></div>
                                                            <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_39_row  market_39_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice2.png" alt="Dice 2"><img src="storage/front/img/cards_new/dice5.png" alt="Dice 5"></div>
                                                            <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_40_row  market_40_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice2.png" alt="Dice 2"><img src="storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                                            <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_41_row  market_41_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice3.png" alt="Dice 3"><img src="storage/front/img/cards_new/dice4.png" alt="Dice 4"></div>
                                                            <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_42_row  market_42_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice3.png" alt="Dice 3"><img src="storage/front/img/cards_new/dice5.png" alt="Dice 5"></div>
                                                            <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_43_row  market_43_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice3.png" alt="Dice 3"><img src="storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                                            <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_44_row  market_44_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice4.png" alt="Dice 4"><img src="storage/front/img/cards_new/dice5.png" alt="Dice 5"></div>
                                                            <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_46_row  market_45_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice4.png" alt="Dice 4"><img src="storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                                            <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_46_row  market_46_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice5.png" alt="Dice 5"><img src="storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-xl-none w-100">
                                                <div class="sicbo-top">
                                                    <div class="sicbo-cube-box-container">
                                                        <div class="sicbo-top-box sicbo-title-box">1:1 Lose to Any Triple</div>
                                                        <div class="sicbo-cube-box-group">
                                                            <div class="sicbo-middle-top-box sicbo-square-box sicbo-middle-top-box-odd  market_1_b_btn market_1_row suspended-box back-1">
                                                                <div>Small</div>
                                                                <div class="sicbo-box-value">4-10</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box sicbo-middle-top-box-odd market_4_b_btn market_4_row suspended-box back-1">
                                                                <div>ODD</div>
                                                                <div class="sicbo-box-value">1:1</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sicbo-cube-box-container">
                                                        <div class="sicbo-top-box sicbo-title-box">30:1</div>
                                                        <div class="sicbo-cube-box-group">
                                                            <div class="sicbo-middle-top-box sicbo-square-box sicbo-middle-top-box-odd market_3_b_btn market_3_row suspended-box back-1">
                                                                <div class=" ">Any Triple</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sicbo-cube-box-container">
                                                        <div class="sicbo-top-box sicbo-title-box">1:1 Lose to Any Triple</div>
                                                        <div class="sicbo-cube-box-group">
                                                            <div class="sicbo-middle-top-box sicbo-square-box sicbo-middle-top-box-odd market_5_b_btn market_5_row suspended-box back-1">
                                                                <div>Even</div>
                                                                <div class="sicbo-box-value">1:1</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box sicbo-middle-top-box-odd market_2_b_btn market_2_row suspended-box back-1">
                                                                <div>Big</div>
                                                                <div class="sicbo-box-value">11:17</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sicbo-middle">
                                                    <div class="sicbo-middle-left">
                                                        <div class="sicbo-cube-box-container">
                                                            <div class="sicbo-top-box sicbo-title-box">8:1 Each Double</div>
                                                            <div class="sicbo-cube-box-group">
                                                                <div class="sicbo-cube-box sicbo-square-box sicbo-cube-double suspended-box back-1  market_6_row  market_6_b_btn"><img src="storage/front/img/cards_new/dice1.png" alt="Dice 1"><img src="storage/front/img/cards_new/dice1.png" alt="Dice 1"></div>
                                                                <div class="sicbo-cube-box sicbo-square-box sicbo-cube-double suspended-box back-1  market_7_row  market_7_b_btn"><img src="storage/front/img/cards_new/dice2.png" alt="Dice 2"><img src="storage/front/img/cards_new/dice2.png" alt="Dice 2"></div>
                                                                <div class="sicbo-cube-box sicbo-square-box sicbo-cube-double suspended-box back-1  market_8_row  market_8_b_btn"><img src="storage/front/img/cards_new/dice3.png" alt="Dice 3"><img src="storage/front/img/cards_new/dice3.png" alt="Dice 3"></div>
                                                                <div class="sicbo-cube-box sicbo-square-box sicbo-cube-double suspended-box back-1  market_9_row  market_9_b_btn"><img src="storage/front/img/cards_new/dice4.png" alt="Dice 4"><img src="storage/front/img/cards_new/dice4.png" alt="Dice 4"></div>
                                                                <div class="sicbo-cube-box sicbo-square-box sicbo-cube-double suspended-box back-1  market_10_row  market_10_b_btn"><img src="storage/front/img/cards_new/dice5.png" alt="Dice 5"><img src="storage/front/img/cards_new/dice5.png" alt="Dice 5"></div>
                                                                <div class="sicbo-cube-box sicbo-square-box sicbo-cube-double suspended-box back-1  market_11_row  market_11_b_btn"><img src="storage/front/img/cards_new/dice6.png" alt="Dice 6"><img src="storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                                            </div>
                                                        </div>
                                                        <div class="sicbo-cube-box-container">
                                                            <div class="sicbo-top-box sicbo-title-box">150:1 Each Tripple</div>
                                                            <div class="sicbo-cube-box-group">
                                                                <div class="sicbo-cube-box sicbo-square-box sicbo-cube-tripple suspended-box back-1  market_12_row  market_12_b_btn"><img src="storage/front/img/cards_new/dice1.png" alt="Dice 1"><img src="storage/front/img/cards_new/dice1.png" alt="Dice 1"><img src="storage/front/img/cards_new/dice1.png" alt="Dice 1"></div>
                                                                <div class="sicbo-cube-box sicbo-square-box sicbo-cube-tripple suspended-box back-1  market_13_row  market_13_b_btn"><img src="storage/front/img/cards_new/dice2.png" alt="Dice 2"><img src="storage/front/img/cards_new/dice2.png" alt="Dice 2"><img src="storage/front/img/cards_new/dice2.png" alt="Dice 2"></div>
                                                                <div class="sicbo-cube-box sicbo-square-box sicbo-cube-tripple suspended-box back-1  market_14_row  market_14_b_btn"><img src="storage/front/img/cards_new/dice3.png" alt="Dice 3"><img src="storage/front/img/cards_new/dice3.png" alt="Dice 3"><img src="storage/front/img/cards_new/dice3.png" alt="Dice 3"></div>
                                                                <div class="sicbo-cube-box sicbo-square-box sicbo-cube-tripple suspended-box back-1  market_15_row  market_15_b_btn"><img src="storage/front/img/cards_new/dice4.png" alt="Dice 4"><img src="storage/front/img/cards_new/dice4.png" alt="Dice 4"><img src="storage/front/img/cards_new/dice4.png" alt="Dice 4"></div>
                                                                <div class="sicbo-cube-box sicbo-square-box sicbo-cube-tripple suspended-box back-1  market_16_row  market_16_b_btn"><img src="storage/front/img/cards_new/dice5.png" alt="Dice 5"><img src="storage/front/img/cards_new/dice5.png" alt="Dice 5"><img src="storage/front/img/cards_new/dice5.png" alt="Dice 5"></div>
                                                                <div class="sicbo-cube-box sicbo-square-box sicbo-cube-tripple suspended-box back-1  market_17_row  market_17_b_btn"><img src="storage/front/img/cards_new/dice6.png" alt="Dice 6"><img src="storage/front/img/cards_new/dice6.png" alt="Dice 6"><img src="storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sicbo-middle-right">
                                                        <div class="sicbo-middle-top-row">
                                                            <div class="sicbo-middle-top-box sicbo-square-box market_18_b_btn market_18_row suspended-box back-1">
                                                                <div>4</div>
                                                                <div class="sicbo-box-value">50:1</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box market_19_b_btn market_19_row suspended-box back-1">
                                                                <div>5</div>
                                                                <div class="sicbo-box-value">20:1</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box market_20_b_btn market_20_row suspended-box back-1">
                                                                <div>6</div>
                                                                <div class="sicbo-box-value">15:1</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box market_21_b_btn market_21_row suspended-box back-1">
                                                                <div>7</div>
                                                                <div class="sicbo-box-value">12:1</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box market_22_b_btn market_22_row suspended-box back-1">
                                                                <div>8</div>
                                                                <div class="sicbo-box-value">8:1</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box market_23_b_btn market_23_row suspended-box back-1">
                                                                <div>9</div>
                                                                <div class="sicbo-box-value">6:1</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box market_24_b_btn market_24_row suspended-box back-1">
                                                                <div>10</div>
                                                                <div class="sicbo-box-value">6:1</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box market_25_b_btn market_25_row suspended-box back-1">
                                                                <div>11</div>
                                                                <div class="sicbo-box-value">6:1</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box market_26_b_btn market_26_row suspended-box back-1">
                                                                <div>12</div>
                                                                <div class="sicbo-box-value">6:1</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box market_27_b_btn market_27_row suspended-box back-1">
                                                                <div>13</div>
                                                                <div class="sicbo-box-value">8:1</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box market_28_b_btn market_28_row suspended-box back-1">
                                                                <div>14</div>
                                                                <div class="sicbo-box-value">12:1</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box market_29_b_btn market_29_row suspended-box back-1">
                                                                <div>15</div>
                                                                <div class="sicbo-box-value">15:1</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box market_30_b_btn market_30_row suspended-box back-1">
                                                                <div>16</div>
                                                                <div class="sicbo-box-value">20:1</div>
                                                            </div>
                                                            <div class="sicbo-middle-top-box sicbo-square-box market_31_b_btn market_31_row suspended-box back-1">
                                                                <div>17</div>
                                                                <div class="sicbo-box-value">50:1</div>
                                                            </div>
                                                        </div>
                                                        <div class="sicbo-bottom">
                                                            <div class="sicbo-cube-box-container">
                                                                <div class="sicbo-top-box sicbo-title-box">5:1 Two Dice</div>
                                                                <div class="sicbo-cube-box-group">
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_32_row  market_32_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice1.png" alt="Dice 1"><img src="storage/front/img/cards_new/dice2.png" alt="Dice 2"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_33_row  market_33_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice1.png" alt="Dice 1"><img src="storage/front/img/cards_new/dice3.png" alt="Dice 3"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_35_row  market_34_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice1.png" alt="Dice 1"><img src="storage/front/img/cards_new/dice4.png" alt="Dice 4"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_35_row  market_35_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice1.png" alt="Dice 1"><img src="storage/front/img/cards_new/dice5.png" alt="Dice 5"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_36_row  market_36_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice1.png" alt="Dice 1"><img src="storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_37_row  market_37_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice2.png" alt="Dice 2"><img src="storage/front/img/cards_new/dice3.png" alt="Dice 3"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_38_row  market_38_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice2.png" alt="Dice 2"><img src="storage/front/img/cards_new/dice4.png" alt="Dice 4"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_39_row  market_39_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice2.png" alt="Dice 2"><img src="storage/front/img/cards_new/dice5.png" alt="Dice 5"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_40_row  market_40_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice2.png" alt="Dice 2"><img src="storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_41_row  market_41_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice3.png" alt="Dice 3"><img src="storage/front/img/cards_new/dice4.png" alt="Dice 4"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_42_row  market_42_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice3.png" alt="Dice 3"><img src="storage/front/img/cards_new/dice5.png" alt="Dice 5"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_43_row  market_43_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice3.png" alt="Dice 3"><img src="storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_44_row  market_44_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice4.png" alt="Dice 4"><img src="storage/front/img/cards_new/dice5.png" alt="Dice 5"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_45_row  market_45_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice4.png" alt="Dice 4"><img src="storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-combination market_46_row  market_46_b_btn suspended-box back-1"><img src="storage/front/img/cards_new/dice5.png" alt="Dice 5"><img src="storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="sicbo-middle-middle-row">
                                                            <div class="sicbo-cube-box-container">
                                                                <div class="sicbo-top-box sicbo-title-box"><span>1:1 on Sinlge</span><span>2:1 on Double</span><span>3:1 on Tripple</span></div>
                                                                <div class="sicbo-cube-box-group">
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-single suspended-box back-1  market_47_row  market_47_b_btn"><img src="storage/front/img/cards_new/dice1.png" alt="Dice 1"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-single suspended-box back-1  market_48_row  market_48_b_btn"><img src="storage/front/img/cards_new/dice2.png" alt="Dice 2"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-single suspended-box back-1  market_49_row  market_49_b_btn"><img src="storage/front/img/cards_new/dice3.png" alt="Dice 3"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-single suspended-box back-1  market_50_row  market_50_b_btn"><img src="storage/front/img/cards_new/dice4.png" alt="Dice 4"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-single suspended-box back-1  market_51_row  market_51_b_btn"><img src="storage/front/img/cards_new/dice5.png" alt="Dice 5"></div>
                                                                    <div class="sicbo-cube-box sicbo-square-box sicbo-cube-single suspended-box back-1  market_52_row  market_52_b_btn"><img src="storage/front/img/cards_new/dice6.png" alt="Dice 6"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=sicbo">View All</a></span></div>
                                        <div class="casino-last-results" id="last-result">
                                            <!-- <span class="result result-b">B</span><span class="result result-a">A</span><span class="result result-b">B</span><span class="result result-b">B</span><span class="result result-b">B</span><span class="result result-a">A</span><span class="result result-a">A</span><span class="result result-b">B</span><span class="result result-a">A</span><span class="result result-a">A</span> -->
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
<script type="text/javascript" src='footer-js.js?1'></script>

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