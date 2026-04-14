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
    echo "<script>alert('you are does not access this game'); window.location.href = '/';</script>";
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<?php
include("head_css.php");
?>

<style>
    .selected {
        background: green;
        color: #fff;
    }

    .casino-title {
        display: flex;
    }

    .casino-title .d-block {
        margin-top: 1px;
    }

    .casino-title a {
        color: #fff;
        text-decoration: underline;
    }

    .casino-table {
        background-color: #f7f7f7;
        color: #333;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-top: 5px;
    }

    .nav {
        display: flex;
        flex-wrap: wrap;
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
    }

    .nav {
        display: flex;
        flex-wrap: wrap;
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
    }

    .nav-link {
        display: block;
        padding: .5rem 1rem;
        color: #0d6efd;
        text-decoration: none;
        transition: color .15sease-in-out, background-color .15sease-in-out, border-color .15sease-in-out;
    }

    .nav-pills .nav-link {
        background: 0 0;
        border: 0;
        border-radius: .25rem;
    }

    .nav-pills .nav-link {
        background-color: #cccccc;
        color: #000000;
        border-radius: 0;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        -ms-border-radius: 0;
        -o-border-radius: 0;
        border-right: 1px solid #2c3e50;
        font-weight: 500;
        font-size: 16px;
        text-align: center;
        line-height: 1;
        cursor: pointer;
        white-space: nowrap;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #fff;
        background-color: #0d6efd;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        background-color: var(--theme2-bg);
        color: #ffffff;
    }

    .nav .nav-item .nav-link {
        border-right: 0;
    }

    .nav .nav-item {
        flex: 1 1 auto;
        margin: 1px;
    }

    .tab-content {
        width: 100%;
    }

    .fade {
        transition: opacity .15slinear;
    }

    .tab-content>.tab-pane tab-pane-common {
        display: none;
    }

    .tab-content>.active {
        display: block;
    }

    .worlibox {
        display: flex;
        margin-top: 5px;
        flex-wrap: wrap;
        position: relative;
        width: 100%;
    }

    .worli-left {
        width: 60%;
        display: flex;
        flex-wrap: wrap;
    }

    .worli-box-title {
        width: 100%;
        text-align: center;
        margin: 5px 0;
        min-height: 24px;
    }

    .worli-box-title {
        min-height: 18px;
    }

    .worli-odd-box {
        text-align: center;
        height: 70px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        cursor: pointer;
    }

    .worli-left .worli-odd-box,
    .worli-full .worli-odd-box {
        width: calc(20% - 2px);
        margin-right: 2px;
    }

    .back {
        background-color: #72bbef !important;
    }

    .worli-odd-box .worli-odd {
        font-size: 40px;
        height: 40px;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: "CasinoNumFont";
    }

    .worli-odd-box .worli-odd {
        font-size: 20px;
    }

    .worli-box-row {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 2px;
    }

    .worli-right {
        width: 40%;
        display: flex;
        flex-wrap: wrap;
    }

    .worli-box-title {
        width: 100%;
        text-align: center;
        margin: 5px 0;
        min-height: 18px;
    }

    .worli-box-row {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 2px;
    }

    .worli-right .worli-odd-box {
        width: calc(50% - 2px);
        margin-right: 2px;
    }

    .worli-full {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        margin-top: 5px;
    }

    .worlibox {
        display: flex;
        margin-top: 5px;
        flex-wrap: wrap;
        position: relative;
        width: 100%;
    }

    .sp .worli-left,
    .dp .worli-left,
    .chart56 .worli-left,
    .chart64 .worli-left,
    .colordp .worli-left {
        width: 75%;
    }

    .sp .worli-right,
    .dp .worli-right,
    .chart56 .worli-right,
    .chart64 .worli-right,
    .colordp .worli-right {
        width: 25%;
    }

    .sp .worli-right .worli-odd-box,
    .dp .worli-right .worli-odd-box,
    .chart56 .worli-right .worli-odd-box,
    .chart64 .worli-right .worli-odd-box,
    .colordp .worli-right .worli-odd-box {
        height: 142px;
        width: 100%;
    }

    .trio .worli-full .worli-odd-box {
        width: 100%;
    }

    .abr .worli-left .worli-odd-box {
        width: calc(33.33% - 2px);
    }

    .abr .worli-right .worli-odd-box {
        width: 100%;
    }

    .abr .worli-right .worli-odd-box:last-child {
        margin-right: 0;
    }

    .d-block {
        display: block !important;
    }

    .fade:not(.show) {
        opacity: 0;
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
        color: #ffff33 !important;
    }

    .clock3digit {
        right: -50px !important;
    }

    /* .suspended:after {
    width: 100% !important;
} */
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
                    <div class="casino-title"><span class="casino-name">Worli Matka</span><span class="d-block">
                            <!-- <a onclick="view_rules()" data-target="#rules_popup" data-toggle="modal" id="rules_popup_btn" class="ml-1" role="button">Rules</a> -->
                        </span></div>

                    <?php
include("casino_header.php");
?>

                    <div class="tab-content">
                        <div id="bhav" class="tab-pane active">

                            <!---->
                            <div class="casino-video">


                                <?php
if (!empty(IFRAME_URL_SET)) {
?>
                                <iframe src="<?php echo IFRAME_URL . "" . WORLI_CODE; ?>" width="100%" height="250px"
                                    style="border: 0px;"></iframe>
                                <?php

}
else {
?>
                                <iframe id="casinoIframe" src="" width="100%" height="200"
                                    style="border: 0px;"></iframe>
                                <?php

}
?>

                                <!--  <iframe id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                 <iframe src="<?php echo IFRAME_URL . "" . WORLI_CODE; ?>" width="100%" height="200px" style="border: 0px;"></iframe> -->
                                <div class="clock clock3digit flip-clock-wrapper">
                                    <ul class="flip play">
                                        <li class="flip-clock-before">
                                            <a>
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
                                            <a>
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
                                            <a>
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
                                            <a>
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
                                            <a>
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
                                            <a>
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
                                    <div>
                                        <img id="card_c1" src="../storage/front/img/cards/1.png">
                                        <img id="card_c2" src="../storage/front/img/cards/1.png">
                                        <img id="card_c3" src="../storage/front/img/cards/1.png">
                                    </div>
                                </div>
                            </div>
                            <div class="casino-detail">
                                <div class="casino-table">
                                    <div class="nav nav-pills" role="tablist">
                                        <div class="nav-item"><a role="tab" data-rr-ui-event-key="single"
                                                id="worli-tabs-tab-single" aria-controls="worli-tabs-tabpane-single"
                                                aria-selected="true" class="nav-link commontabsworli active"
                                                tabindex="0">Single</a></div>
                                        <div class="nav-item"><a role="tab" data-rr-ui-event-key="pana"
                                                id="worli-tabs-tab-pana" aria-controls="worli-tabs-tabpane-pana"
                                                aria-selected="false" tabindex="-1"
                                                class="nav-link commontabsworli">Pana</a></div>
                                        <div class="nav-item"><a role="tab" data-rr-ui-event-key="sp"
                                                id="worli-tabs-tab-sp" aria-controls="worli-tabs-tabpane-sp"
                                                aria-selected="false" tabindex="-1"
                                                class="nav-link commontabsworli">SP</a></div>
                                        <div class="nav-item"><a role="tab" data-rr-ui-event-key="dp"
                                                id="worli-tabs-tab-dp" aria-controls="worli-tabs-tabpane-dp"
                                                aria-selected="false" tabindex="-1"
                                                class="nav-link commontabsworli">DP</a></div>
                                        <div class="nav-item"><a role="tab" data-rr-ui-event-key="trio"
                                                id="worli-tabs-tab-trio" aria-controls="worli-tabs-tabpane-trio"
                                                aria-selected="false" tabindex="-1"
                                                class="nav-link commontabsworli">Trio</a></div>
                                        <div class="nav-item"><a role="tab" data-rr-ui-event-key="cycle"
                                                id="worli-tabs-tab-cycle" aria-controls="worli-tabs-tabpane-cycle"
                                                aria-selected="false" tabindex="-1"
                                                class="nav-link commontabsworli">Cycle</a></div>
                                        <div class="nav-item"><a role="tab" data-rr-ui-event-key="motor"
                                                id="worli-tabs-tab-motor" aria-controls="worli-tabs-tabpane-motor"
                                                aria-selected="false" tabindex="-1"
                                                class="nav-link commontabsworli">Motor SP</a></div>
                                        <div class="nav-item"><a role="tab" data-rr-ui-event-key="chart56"
                                                id="worli-tabs-tab-chart56" aria-controls="worli-tabs-tabpane-chart56"
                                                aria-selected="false" tabindex="-1" class="nav-link commontabsworli">56
                                                Charts</a></div>
                                        <div class="nav-item"><a role="tab" data-rr-ui-event-key="chart64"
                                                id="worli-tabs-tab-chart64" aria-controls="worli-tabs-tabpane-chart64"
                                                aria-selected="false" tabindex="-1" class="nav-link commontabsworli">64
                                                Charts</a></div>
                                        <div class="nav-item"><a role="tab" data-rr-ui-event-key="abr"
                                                id="worli-tabs-tab-abr" aria-controls="worli-tabs-tabpane-abr"
                                                aria-selected="false" tabindex="-1"
                                                class="nav-link commontabsworli">ABR</a></div>
                                        <div class="nav-item"><a role="tab" data-rr-ui-event-key="commonsp"
                                                id="worli-tabs-tab-commonsp" aria-controls="worli-tabs-tabpane-commonsp"
                                                aria-selected="false" tabindex="-1"
                                                class="nav-link commontabsworli">Common SP</a></div>
                                        <div class="nav-item"><a role="tab" data-rr-ui-event-key="commondp"
                                                id="worli-tabs-tab-commondp" aria-controls="worli-tabs-tabpane-commondp"
                                                aria-selected="false" tabindex="-1"
                                                class="nav-link commontabsworli">Common DP</a></div>
                                        <div class="nav-item"><a role="tab" data-rr-ui-event-key="colordp"
                                                id="worli-tabs-tab-colordp" aria-controls="worli-tabs-tabpane-colordp"
                                                aria-selected="false" tabindex="-1"
                                                class="nav-link commontabsworli">Color DP</a></div>
                                    </div>
                                    <div class="tab-content">
                                        <div role="tabpanel" id="worli-tabs-tabpane-single"
                                            aria-labelledby="worli-tabs-tab-single"
                                            class="fade single tab-pane tab-pane-common active show">
                                            <div class="worlibox suspended market_1_row">
                                                <div class="worli-left">
                                                    <div class="worli-box-title"><b>9.5</b></div>
                                                    <div class="worli-box-row">
                                                        <div class="worli-odd-box back back-1 market_1_b_btn"
                                                            nat_1="1 Single"><span class="worli-odd">1</span></div>
                                                        <div class="worli-odd-box back back-1 market_1_b_btn"
                                                            nat_1="2 Single"><span class="worli-odd">2</span></div>
                                                        <div class="worli-odd-box back back-1 market_1_b_btn"
                                                            nat_1="3 Single"><span class="worli-odd">3</span></div>
                                                        <div class="worli-odd-box back back-1 market_1_b_btn"
                                                            nat_1="4 Single"><span class="worli-odd">4</span></div>
                                                        <div class="worli-odd-box back back-1 market_1_b_btn"
                                                            nat_1="5 Single"><span class="worli-odd">5</span></div>
                                                    </div>
                                                    <div class="worli-box-row">
                                                        <div class="worli-odd-box back back-1 market_1_b_btn"
                                                            nat_1="6 Single"><span class="worli-odd">6</span></div>
                                                        <div class="worli-odd-box back back-1 market_1_b_btn"
                                                            nat_1="7 Single"><span class="worli-odd">7</span></div>
                                                        <div class="worli-odd-box back back-1 market_1_b_btn"
                                                            nat_1="8 Single"><span class="worli-odd">8</span></div>
                                                        <div class="worli-odd-box back back-1 market_1_b_btn"
                                                            nat_1="9 Single"><span class="worli-odd">9</span></div>
                                                        <div class="worli-odd-box back back-1 market_1_b_btn"
                                                            nat_1="0 Single"><span class="worli-odd">0</span></div>
                                                    </div>
                                                </div>
                                                <div class="worli-right">
                                                    <div class="worli-box-title"><b>9.5</b></div>
                                                    <div class="worli-box-row">
                                                        <div class="worli-odd-box back back-1 market_1_b_btn"
                                                            nat_1="Line 1 Single"><span class="worli-odd">Line
                                                                1</span><span class="d-block">1|2|3|4|5</span></div>
                                                        <div class="worli-odd-box back back-1 market_1_b_btn"
                                                            nat_1="Odd Single"><span class="worli-odd">ODD</span><span
                                                                class="d-block">1|3|5|7|9</span></div>
                                                    </div>
                                                    <div class="worli-box-row">
                                                        <div class="worli-odd-box back back-1 market_1_b_btn"
                                                            nat_1="Even Single"><span class="worli-odd">Line
                                                                2</span><span class="d-block">6|7|8|9|0</span></div>
                                                        <div class="worli-odd-box back back-1 market_1_b_btn"
                                                            nat_1="Line 2 Single"><span
                                                                class="worli-odd">EVEN</span><span
                                                                class="d-block">2|4|6|8|0</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" id="worli-tabs-tabpane-pana"
                                            aria-labelledby="worli-tabs-tab-pana"
                                            class="fade pana tab-pane tab-pane-common">
                                            <div class="worli-full suspended market_2_row">
                                                <div class="worli-box-title"><b>SP:140 | DP:240 | TP:700</b></div>
                                                <div class="worli-box-row">
                                                    <div class="worli-odd-box back back-1 market_2_b_btn" nat_1="1">
                                                        <span class="worli-odd">1</span>
                                                    </div>
                                                    <div class="worli-odd-box back back-1 market_2_b_btn" nat_1="2">
                                                        <span class="worli-odd">2</span>
                                                    </div>
                                                    <div class="worli-odd-box back back-1 market_2_b_btn" nat_1="3">
                                                        <span class="worli-odd">3</span>
                                                    </div>
                                                    <div class="worli-odd-box back back-1 market_2_b_btn" nat_1="4">
                                                        <span class="worli-odd">4</span>
                                                    </div>
                                                    <div class="worli-odd-box back back-1 market_2_b_btn" nat_1="5">
                                                        <span class="worli-odd">5</span>
                                                    </div>
                                                </div>
                                                <div class="worli-box-row">
                                                    <div class="worli-odd-box back back-1 market_2_b_btn" nat_1="6">
                                                        <span class="worli-odd">6</span>
                                                    </div>
                                                    <div class="worli-odd-box back back-1 market_2_b_btn" nat_1="7">
                                                        <span class="worli-odd">7</span>
                                                    </div>
                                                    <div class="worli-odd-box back back-1 market_2_b_btn" nat_1="8">
                                                        <span class="worli-odd">8</span>
                                                    </div>
                                                    <div class="worli-odd-box back back-1 market_2_b_btn" nat_1="9">
                                                        <span class="worli-odd">9</span>
                                                    </div>
                                                    <div class="worli-odd-box back back-1 market_2_b_btn" nat_1="0">
                                                        <span class="worli-odd">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" id="worli-tabs-tabpane-sp"
                                            aria-labelledby="worli-tabs-tab-sp"
                                            class="fade sp tab-pane tab-pane-common">
                                            <div class="worlibox suspended market_3_row">
                                                <div class="worli-box-title"><b>140</b></div>
                                                <div class="worli-left">
                                                    <div class="worli-box-row">
                                                        <div class="worli-odd-box back back-1 market_3_b_btn"
                                                            nat_1="1 SP"><span class="worli-odd">1</span></div>
                                                        <div class="worli-odd-box back back-1 market_3_b_btn"
                                                            nat_1="2 SP"><span class="worli-odd">2</span></div>
                                                        <div class="worli-odd-box back back-1 market_3_b_btn"
                                                            nat_1="3 SP"><span class="worli-odd">3</span></div>
                                                        <div class="worli-odd-box back back-1 market_3_b_btn"
                                                            nat_1="4 SP"><span class="worli-odd">4</span></div>
                                                        <div class="worli-odd-box back back-1 market_3_b_btn"
                                                            nat_1="5 SP"><span class="worli-odd">5</span></div>
                                                    </div>
                                                    <div class="worli-box-row">
                                                        <div class="worli-odd-box back back-1 market_3_b_btn"
                                                            nat_1="6 SP"><span class="worli-odd">6</span></div>
                                                        <div class="worli-odd-box back back-1 market_3_b_btn"
                                                            nat_1="7 SP"><span class="worli-odd">7</span></div>
                                                        <div class="worli-odd-box back back-1 market_3_b_btn"
                                                            nat_1="8 SP"><span class="worli-odd">8</span></div>
                                                        <div class="worli-odd-box back back-1 market_3_b_btn"
                                                            nat_1="9 SP"><span class="worli-odd">9</span></div>
                                                        <div class="worli-odd-box back back-1 market_3_b_btn"
                                                            nat_1="10 SP"><span class="worli-odd">0</span></div>
                                                    </div>
                                                </div>
                                                <div class="worli-right">
                                                    <div class="worli-box-row">
                                                        <div class="worli-odd-box back back-1 market_3_b_btn"
                                                            nat_1="SP-ALL"><span class="worli-odd">SP ALL</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" id="worli-tabs-tabpane-dp"
                                            aria-labelledby="worli-tabs-tab-dp"
                                            class="fade dp tab-pane tab-pane-common">
                                            <div class="worlibox suspended market_4_row">
                                                <div class="worli-box-title"></div>
                                                <div class="worli-left">
                                                    <div class="worli-box-row">
                                                        <div class="worli-odd-box back back-1 market_4_b_btn"
                                                            nat_1="1 DP"><span class="worli-odd">1</span></div>
                                                        <div class="worli-odd-box back back-1 market_4_b_btn"
                                                            nat_1="2 DP"><span class="worli-odd">2</span></div>
                                                        <div class="worli-odd-box back back-1 market_4_b_btn"
                                                            nat_1="2 DP"><span class="worli-odd">3</span></div>
                                                        <div class="worli-odd-box back back-1 market_4_b_btn"
                                                            nat_1="3 DP"><span class="worli-odd">4</span></div>
                                                        <div class="worli-odd-box back back-1 market_4_b_btn"
                                                            nat_1="4 DP"><span class="worli-odd">5</span></div>
                                                    </div>
                                                    <div class="worli-box-row">
                                                        <div class="worli-odd-box back back-1 market_4_b_btn"
                                                            nat_1="5 DP"><span class="worli-odd">6</span></div>
                                                        <div class="worli-odd-box back back-1 market_4_b_btn"
                                                            nat_1="6 DP"><span class="worli-odd">7</span></div>
                                                        <div class="worli-odd-box back back-1 market_4_b_btn"
                                                            nat_1="7 DP"><span class="worli-odd">8</span></div>
                                                        <div class="worli-odd-box back back-1 market_4_b_btn"
                                                            nat_1="8 DP"><span class="worli-odd">9</span></div>
                                                        <div class="worli-odd-box back back-1 market_4_b_btn"
                                                            nat_1="9 DP"><span class="worli-odd">0</span></div>
                                                    </div>
                                                </div>
                                                <div class="worli-right">
                                                    <div class="worli-box-row">
                                                        <div class="worli-odd-box back back-1 market_4_b_btn"
                                                            nat_1="DP-ALL"><span class="worli-odd">DP ALL</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" id="worli-tabs-tabpane-trio"
                                            aria-labelledby="worli-tabs-tab-trio"
                                            class="fade trio tab-pane tab-pane-common">
                                            <div class="worli-full suspended market_5_row">
                                                <div class="worli-box-title"></div>
                                                <div class="worli-box-row">
                                                    <div class="worli-odd-box back back-1 market_5_b_btn"
                                                        nat_1="ALL Trio"><span class="worli-odd">ALL TRIO</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" id="worli-tabs-tabpane-cycle"
                                            aria-labelledby="worli-tabs-tab-cycle"
                                            class="fade cycle tab-pane tab-pane-common">
                                            <div class="worli-full suspended market_6_row">
                                                <div class="worli-box-title"><b>&nbsp;</b></div>
                                                <div class="worli-box-row">
                                                    <div class="worli-odd-box back back-1 market_6_b_btn" nat_1="1">
                                                        <span class="worli-odd">1</span>
                                                    </div>
                                                    <div class="worli-odd-box back back-1 market_6_b_btn" nat_1="2">
                                                        <span class="worli-odd">2</span>
                                                    </div>
                                                    <div class="worli-odd-box back back-1 market_6_b_btn" nat_1="3">
                                                        <span class="worli-odd">3</span>
                                                    </div>
                                                    <div class="worli-odd-box back back-1 market_6_b_btn" nat_1="4">
                                                        <span class="worli-odd">4</span>
                                                    </div>
                                                    <div class="worli-odd-box back back-1 market_6_b_btn" nat_1="5">
                                                        <span class="worli-odd">5</span>
                                                    </div>
                                                </div>
                                                <div class="worli-box-row">
                                                    <div class="worli-odd-box back back-1 market_6_b_btn" nat_1="6">
                                                        <span class="worli-odd">6</span>
                                                    </div>
                                                    <div class="worli-odd-box back back-1 market_6_b_btn" nat_1="7">
                                                        <span class="worli-odd">7</span>
                                                    </div>
                                                    <div class="worli-odd-box back back-1 market_6_b_btn" nat_1="8">
                                                        <span class="worli-odd">8</span>
                                                    </div>
                                                    <div class="worli-odd-box back back-1 market_6_b_btn" nat_1="9">
                                                        <span class="worli-odd">9</span>
                                                    </div>
                                                    <div class="worli-odd-box back back-1 market_6_b_btn" nat_1="0">
                                                        <span class="worli-odd">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="mt-2 worli-place close-bet-slip container-fluid container-fluid-5 pt-1 pb-1">
                                                <div class="row row5">
                                                    <div class="col-6 text-center pt-2"><span
                                                            class="worli-place-card"></span></div>
                                                    <div class="col-6 text-right">
                                                        <button class="btn btn-danger btn-sm">Clear</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" id="worli-tabs-tabpane-motor"
                                            aria-labelledby="worli-tabs-tab-motor"
                                            class="fade motorsp tab-pane tab-pane-common">
                                            <div class="worli-full suspended market_7_row">
                                                <div class="worli-box-title"></div>
                                                <div class="worli-box-row">
                                                    <div class="worli-odd-box back back-1 market_7_b_btn" nat_1="1">
                                                        <span class="worli-odd">1</span>
                                                    </div>
                                                    <div class="worli-odd-box back back-1 market_7_b_btn" nat_1="2">
                                                        <span class="worli-odd">2</span>
                                                    </div>
                                                    <div class="worli-odd-box back back-1 market_7_b_btn" nat_1="3">
                                                        <span class="worli-odd">3</span>
                                                    </div>
                                                    <div class="worli-odd-box back back-1 market_7_b_btn" nat_1="4">
                                                        <span class="worli-odd">4</span>
                                                    </div>
                                                    <div class="worli-odd-box back back-1 market_7_b_btn" nat_1="5">
                                                        <span class="worli-odd">5</span>
                                                    </div>
                                                </div>
                                                <div class="worli-box-row">
                                                    <div class="worli-odd-box back back-1 market_7_b_btn" nat_1="6">
                                                        <span class="worli-odd">6</span>
                                                    </div>
                                                    <div class="worli-odd-box back back-1 market_7_b_btn" nat_1="7">
                                                        <span class="worli-odd">7</span>
                                                    </div>
                                                    <div class="worli-odd-box back back-1 market_7_b_btn" nat_1="8">
                                                        <span class="worli-odd">8</span>
                                                    </div>
                                                    <div class="worli-odd-box back back-1 market_7_b_btn" nat_1="9">
                                                        <span class="worli-odd">9</span>
                                                    </div>
                                                    <div class="worli-odd-box back back-1 market_7_b_btn" nat_1="0">
                                                        <span class="worli-odd">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="mt-2 worli-place close-bet-slip container-fluid container-fluid-5 pt-1 pb-1">
                                                <div class="row row5">
                                                    <div class="col-6 text-center pt-2"><span
                                                            class="worli-place-card"></span></div>
                                                    <div class="col-6 text-right">
                                                        <button class="btn btn-danger btn-sm">Clear</button>
                                                        <button
                                                            class="btn btn-primary btn-sm disabled back-1 market_7_b_btn place_open_motor"
                                                            nat_1="place_bet" disabled>Place Bet</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" id="worli-tabs-tabpane-chart56"
                                            aria-labelledby="worli-tabs-tab-chart56"
                                            class="fade chart56 tab-pane tab-pane-common">
                                            <div class="worlibox suspended market_8_row">
                                                <div class="worli-box-title"></div>
                                                <div class="worli-left">
                                                    <div class="worli-box-row">
                                                        <div class="worli-odd-box back back-1 market_8_b_btn"
                                                            nat_1="56-1"><span class="worli-odd">1</span></div>
                                                        <div class="worli-odd-box back back-1 market_8_b_btn"
                                                            nat_1="56-2"><span class="worli-odd">2</span></div>
                                                        <div class="worli-odd-box back back-1 market_8_b_btn"
                                                            nat_1="56-3"><span class="worli-odd">3</span></div>
                                                        <div class="worli-odd-box back back-1 market_8_b_btn"
                                                            nat_1="56-4"><span class="worli-odd">4</span></div>
                                                        <div class="worli-odd-box back back-1 market_8_b_btn"
                                                            nat_1="56-5"><span class="worli-odd">5</span></div>
                                                    </div>
                                                    <div class="worli-box-row">
                                                        <div class="worli-odd-box back back-1 market_8_b_btn"
                                                            nat_1="56-6"><span class="worli-odd">6</span></div>
                                                        <div class="worli-odd-box back back-1 market_8_b_btn"
                                                            nat_1="56-7"><span class="worli-odd">7</span></div>
                                                        <div class="worli-odd-box back back-1 market_8_b_btn"
                                                            nat_1="56-8"><span class="worli-odd">8</span></div>
                                                        <div class="worli-odd-box back back-1 market_8_b_btn"
                                                            nat_1="56-9"><span class="worli-odd">9</span></div>
                                                        <div class="worli-odd-box back back-1 market_8_b_btn"
                                                            nat_1="56-0"><span class="worli-odd">0</span></div>
                                                    </div>
                                                </div>
                                                <div class="worli-right">
                                                    <div class="worli-box-row">
                                                        <div class="worli-odd-box back back-1 market_8_b_btn"
                                                            nat_1="56CHART"><span class="worli-odd">56 ALL</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" id="worli-tabs-tabpane-chart64"
                                            aria-labelledby="worli-tabs-tab-chart64"
                                            class="fade chart64 tab-pane tab-pane-common">
                                            <div class="worlibox suspended market_9_row">
                                                <div class="worli-box-title"></div>
                                                <div class="worli-left">
                                                    <div class="worli-box-row">
                                                        <div class="worli-odd-box back back-1 market_9_b_btn"
                                                            nat_1="64-1"><span class="worli-odd">1</span></div>
                                                        <div class="worli-odd-box back back-1 market_9_b_btn"
                                                            nat_1="64-2"><span class="worli-odd">2</span></div>
                                                        <div class="worli-odd-box back back-1 market_9_b_btn"
                                                            nat_1="64-3"><span class="worli-odd">3</span></div>
                                                        <div class="worli-odd-box back back-1 market_9_b_btn"
                                                            nat_1="64-4"><span class="worli-odd">4</span></div>
                                                        <div class="worli-odd-box back back-1 market_9_b_btn"
                                                            nat_1="64-5"><span class="worli-odd">5</span></div>
                                                    </div>
                                                    <div class="worli-box-row">
                                                        <div class="worli-odd-box back back-1 market_9_b_btn"
                                                            nat_1="64-6"><span class="worli-odd">6</span></div>
                                                        <div class="worli-odd-box back back-1 market_9_b_btn"
                                                            nat_1="64-7"><span class="worli-odd">7</span></div>
                                                        <div class="worli-odd-box back back-1 market_9_b_btn"
                                                            nat_1="64-8"><span class="worli-odd">8</span></div>
                                                        <div class="worli-odd-box back back-1 market_9_b_btn"
                                                            nat_1="64-9"><span class="worli-odd">9</span></div>
                                                        <div class="worli-odd-box back back-1 market_9_b_btn"
                                                            nat_1="64-0"><span class="worli-odd">0</span></div>
                                                    </div>
                                                </div>
                                                <div class="worli-right">
                                                    <div class="worli-box-row">
                                                        <div class="worli-odd-box back back-1 market_9_b_btn"
                                                            nat_1="64CHART"><span class="worli-odd">64 ALL</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" id="worli-tabs-tabpane-abr"
                                            aria-labelledby="worli-tabs-tab-abr"
                                            class="fade abr tab-pane tab-pane-common">
                                            <div class="worlibox suspended market_10_row">
                                                <div class="worli-box-title"></div>
                                                <div class="worli-left">
                                                    <div class="worli-box-row">
                                                        <div class="worli-odd-box back back-1 market_10_b_btn"
                                                            nat_1="ABR-A"><span class="worli-odd">A</span></div>
                                                        <div class="worli-odd-box back back-1 market_10_b_btn"
                                                            nat_1="ABR-B"><span class="worli-odd">B</span></div>
                                                        <div class="worli-odd-box back back-1 market_10_b_btn"
                                                            nat_1="ABR-R"><span class="worli-odd">R</span></div>
                                                    </div>
                                                    <div class="worli-box-row">
                                                        <div class="worli-odd-box back back-1 market_10_b_btn"
                                                            nat_1="ABR-AB"><span class="worli-odd">AB</span></div>
                                                        <div class="worli-odd-box back back-1 market_10_b_btn"
                                                            nat_1="ABR-AR"><span class="worli-odd">AR</span></div>
                                                        <div class="worli-odd-box back back-1 market_10_b_btn"
                                                            nat_1="ABR-BR"><span class="worli-odd">BR</span></div>
                                                    </div>
                                                </div>
                                                <div class="worli-right">
                                                    <div class="worli-box-row">
                                                        <div class="worli-odd-box back back-1 market_10_b_btn"
                                                            nat_1="ABR-ABR"><span class="worli-odd">ABR</span></div>
                                                    </div>
                                                    <div class="worli-box-row">
                                                        <div class="worli-odd-box back back-1 market_10_b_btn"
                                                            nat_1="ABR-ABR Cut"><span class="worli-odd">ABR CUT</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" id="worli-tabs-tabpane-commonsp"
                                            aria-labelledby="worli-tabs-tab-commonsp"
                                            class="fade commonsp tab-pane tab-pane-common">
                                            <div class="worli-full suspended market_11_row">
                                                <div class="worli-box-title"></div>
                                                <div class="worli-box-row">
                                                    <div class="worli-odd-box back back-1 market_11_b_btn"
                                                        nat_1="Common SP-1"><span class="worli-odd">1</span></div>
                                                    <div class="worli-odd-box back back-1 market_11_b_btn"
                                                        nat_1="Common SP-2"><span class="worli-odd">2</span></div>
                                                    <div class="worli-odd-box back back-1 market_11_b_btn"
                                                        nat_1="Common SP-3"><span class="worli-odd">3</span></div>
                                                    <div class="worli-odd-box back back-1 market_11_b_btn"
                                                        nat_1="Common SP-4"><span class="worli-odd">4</span></div>
                                                    <div class="worli-odd-box back back-1 market_11_b_btn"
                                                        nat_1="Common SP-5"><span class="worli-odd">5</span></div>
                                                </div>
                                                <div class="worli-box-row">
                                                    <div class="worli-odd-box back back-1 market_11_b_btn"
                                                        nat_1="Common SP-6"><span class="worli-odd">6</span></div>
                                                    <div class="worli-odd-box back back-1 market_11_b_btn"
                                                        nat_1="Common SP-7"><span class="worli-odd">7</span></div>
                                                    <div class="worli-odd-box back back-1 market_11_b_btn"
                                                        nat_1="Common SP-8"><span class="worli-odd">8</span></div>
                                                    <div class="worli-odd-box back back-1 market_11_b_btn"
                                                        nat_1="Common SP-9"><span class="worli-odd">9</span></div>
                                                    <div class="worli-odd-box back back-1 market_11_b_btn"
                                                        nat_1="Common SP-0"><span class="worli-odd">0</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" id="worli-tabs-tabpane-commondp"
                                            aria-labelledby="worli-tabs-tab-commondp"
                                            class="fade commondp tab-pane tab-pane-common">
                                            <div class="worli-full suspended market_12_row">
                                                <div class="worli-box-title"></div>
                                                <div class="worli-box-row">
                                                    <div class="worli-odd-box back back-1 market_12_b_btn"
                                                        nat_1="Common DP-1"><span class="worli-odd">1</span></div>
                                                    <div class="worli-odd-box back back-1 market_12_b_btn"
                                                        nat_1="Common DP-2"><span class="worli-odd">2</span></div>
                                                    <div class="worli-odd-box back back-1 market_12_b_btn"
                                                        nat_1="Common DP-3"><span class="worli-odd">3</span></div>
                                                    <div class="worli-odd-box back back-1 market_12_b_btn"
                                                        nat_1="Common DP-4"><span class="worli-odd">4</span></div>
                                                    <div class="worli-odd-box back back-1 market_12_b_btn"
                                                        nat_1="Common DP-5"><span class="worli-odd">5</span></div>
                                                </div>
                                                <div class="worli-box-row">
                                                    <div class="worli-odd-box back back-1 market_12_b_btn"
                                                        nat_1="Common DP-6"><span class="worli-odd">6</span></div>
                                                    <div class="worli-odd-box back back-1 market_12_b_btn"
                                                        nat_1="Common DP-7"><span class="worli-odd">7</span></div>
                                                    <div class="worli-odd-box back back-1 market_12_b_btn"
                                                        nat_1="Common DP-8"><span class="worli-odd">8</span></div>
                                                    <div class="worli-odd-box back back-1 market_12_b_btn"
                                                        nat_1="Common DP-9"><span class="worli-odd">9</span></div>
                                                    <div class="worli-odd-box back back-1 market_12_b_btn"
                                                        nat_1="Common DP-0"><span class="worli-odd">0</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" id="worli-tabs-tabpane-colordp"
                                            aria-labelledby="worli-tabs-tab-colordp"
                                            class="fade colordp tab-pane tab-pane-common">
                                            <div class="worlibox suspended market_13_row">
                                                <div class="worli-box-title"></div>
                                                <div class="worli-left">
                                                    <div class="worli-box-row">
                                                        <div class="worli-odd-box back back-1 market_13_b_btn"
                                                            nat_1="Color DP-1"><span class="worli-odd">1</span></div>
                                                        <div class="worli-odd-box back back-1 market_13_b_btn"
                                                            nat_1="Color DP-2"><span class="worli-odd">2</span></div>
                                                        <div class="worli-odd-box back back-1 market_13_b_btn"
                                                            nat_1="Color DP-3"><span class="worli-odd">3</span></div>
                                                        <div class="worli-odd-box back back-1 market_13_b_btn"
                                                            nat_1="Color DP-4"><span class="worli-odd">4</span></div>
                                                        <div class="worli-odd-box back back-1 market_13_b_btn"
                                                            nat_1="Color DP-5"><span class="worli-odd">5</span></div>
                                                    </div>
                                                    <div class="worli-box-row">
                                                        <div class="worli-odd-box back back-1 market_13_b_btn"
                                                            nat_1="Color DP-6"><span class="worli-odd">6</span></div>
                                                        <div class="worli-odd-box back back-1 market_13_b_btn"
                                                            nat_1="Color DP-7"><span class="worli-odd">7</span></div>
                                                        <div class="worli-odd-box back back-1 market_13_b_btn"
                                                            nat_1="Color DP-8"><span class="worli-odd">8</span></div>
                                                        <div class="worli-odd-box back back-1 market_13_b_btn"
                                                            nat_1="Color DP-9"><span class="worli-odd">9</span></div>
                                                        <div class="worli-odd-box back back-1 market_13_b_btn"
                                                            nat_1="Color DP-0"><span class="worli-odd">0</span></div>
                                                    </div>
                                                </div>
                                                <div class="worli-right">
                                                    <div class="worli-box-row">
                                                        <div class="worli-odd-box back back-1 market_13_b_btn"
                                                            nat_1="Color DP-11"><span class="worli-odd">COLOR DP
                                                                ALL</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="casino-last-result-title"><span>Last Result</span><span><a
                                            href="casinoresults?game_type=worli">View All</a></span></div>
                                <div class="casino-last-results" id="last-result"></div>
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

    <script type="text/javascript" src="../js/socket.io.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script src="../storage/front/js/flipclock.js" type="text/javascript"></script>
    <script src="../storage/front/js/owl.carousel.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src='footer-js.js'></script>

    <?

include("betpopcss.php");
??

     <script>
jQuery(document).on("click", ".commontabsworli", function () {

	 $(".commontabsworli").removeClass("active");
	 $(".tab-pane-common").removeClass("active");
	 $(".tab-pane-common").removeClass("show");

     var tab_name=$(this).attr("aria-controls");
     $(this).addClass("active");
     $("#"+tab_name).addClass("active");
     $("#"+tab_name).addClass("show");
     
	 $(".back-1").removeClass("selected");
	$(".lay-1").removeClass("selected");
	nat_1="";
	nat_count = 0;
	back = 0;
	last_word = "";
 });
 function tab_view(tab_name){
	 $(".tab_menu_btn").removeClass("active");
	 $("."+tab_name+"_tab_btn").addClass("active");
	 $("#single").hide();
	 $("#pana").hide();
	 $("#sp").hide();
	 $("#dp").hide();
	 $("#trio").hide();
	 $("#cycle").hide();
	 $("#motorsp").hide();
	 $("#fifty-six-charts").hide();
	 $("#sixty-four-charts").hide();
	 $("#abr").hide();
	 $("#commonsp").hide();
	 $("#commondp").hide();
	 $("#colordp").hide();
	 $("#"+tab_name).show();

	 $(".back-1").removeClass("selected");
	$(".lay-1").removeClass("selected");
	nat_1="";
	nat_count = 0;
	back = 0;
	last_word = "";
 }
 </script>



 <script type="text/javascript">
    var site_url = '<?php echo WEB_URL; ?>';
    var websocketurl = '
        <? php echo GAME_IP; ?> ';
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
    var markettype = "INSTANT_WORLI";
    var markettype_2 = markettype;
    var back_html = "";
    var lay_html = "";
    var gstatus = "";
    var last_result_id = '0';

    function websocket(type) {
        socket = io.connect(websocketurl);
        socket.on('connect', function () {
            socket.emit('Room', 'worli');
        });
        socket.on('gameIframe', function (data) {
            $("#casinoIframe").attr('src', data);
        });
        socket.on('game', function (data) {
            console.log("ggg=", data);
            console.log("ggg=", data.t1[0].mid);
            if (data && data['t1'] && data['t1'][0]) {
                if (oldGameId != data.t1[0].mid && data.t1[0].mid != 0 && data.t1[0].mid != "0") {
                    setTimeout(function () {
                        clearCards();
                    },
    <? php echo CASINO_RESULT_TIMEOUT; ?>);
    }
    oldGameId = data.t1[0].mid;
    if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
        $(".casino-remark").text(data.t1[0].remark);
        if (data.t1[0].C1 != 1) {
            $("#card_c1").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C1 + ".png");
        }
        if (data.t1[0].C2 != 3) {
            $("#card_c2").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C2 + ".png");
        }
        if (data.t1[0].C3 != 1) {
            $("#card_c3").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C3 + ".png");
        }

    }
    clock.setValue(data.t1[0].autotime);

    $(".round_no").text(data.t1[0].mid);
    $("#casino_event_id").val(data.t1[0].mid);
    var eventId = data.t1[0].mid;

    for (var j in data['t2']) {
        selectionid = parseInt(data['t2'][j].sid);
        if (selectionid == 1) {
            b1 = 9.5;
        } else if (selectionid == 2) {
            b1 = 0;
        } else if (selectionid == 3) {
            b1 = 140;
        } else if (selectionid == 4) {
            b1 = 240;
        } else if (selectionid == 5) {
            b1 = 700;
        } else if (selectionid == 6) {
            b1 = 0;
        } else if (selectionid == 7) {
            b1 = 140;
        } else if (selectionid == 8) {
            b1 = 140;
        } else if (selectionid == 9) {
            b1 = 140;
        } else if (selectionid == 10) {
            b1 = 140;
        } else if (selectionid == 11) {
            b1 = 140;
        } else if (selectionid == 12) {
            b1 = 240;
        } else if (selectionid == 13) {
            b1 = 240;
        }


        markettype = "WORLI_MATKA";

        $(".market_" + selectionid + "_b_btn").attr("side", "Back");
        $(".market_" + selectionid + "_b_btn").attr("selectionid", selectionid);
        $(".market_" + selectionid + "_b_btn").attr("marketid", selectionid);

        $(".market_" + selectionid + "_b_btn").attr("eventid", eventId);
        $(".market_" + selectionid + "_b_btn").attr("markettype", markettype);
        $(".market_" + selectionid + "_b_btn").attr("event_name", markettype);
        $(".market_" + selectionid + "_b_btn").attr("fullmarketodds", b1);
        $(".market_" + selectionid + "_b_btn").attr("fullfancymarketrate", b1);

        gstatus = data['t2'][j].gstatus.toString();
        if (gstatus == "SUSPENDED" || gstatus == "0") {
            $(".market_" + selectionid + "_row").addClass("suspended");
        }
        else {
            $(".market_" + selectionid + "_row").removeClass("suspended");
        }
    }
    }
    });
    socket.on('gameResult', function (args) {
        updateResult(args.data);
    });
    socket.on('error', function (data) {
    });
    socket.on('close', function (data) {
    });
    }
    function clearCards() {
        refresh(markettype);
        $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
    }

    function updateResult(data) {

        data = JSON.parse(JSON.stringify(data));
        resultGameLast = data[0].mid;

        if (last_result_id != resultGameLast) {
            last_result_id = resultGameLast;
            refresh(markettype);
        }

        var html = "";
        casino_type = "'worli'";
        data.forEach((runData) => {

            ab = "result-a";
            ab1 = "R";

            eventId = runData.mid == 0 ? 0 : runData.mid.split(".")[1];
            html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')" class="ball-runs  ' + ab + ' result">' + ab1
                + '</span>';
        });
        $("#last-result").html(html);
        if (oldGameId == 0 || oldGameId == resultGameLast) {
            $("#card_c1").attr("src", "../storage/front/img/cards/1.png");
            $("#card_c2").attr("src", "../storage/front/img/cards/1.png");
            $("#card_c3").attr("src", "../storage/front/img/cards/1.png");


        }
    }

    function teenpatti(type) {
        gameType = type
        websocket();
    }
    teenpatti("ok");

    var nat_1 = "";
    var nat_count = 0;
    var back = 0;
    var last_word = "";
    var motor_all_selection = "";
    jQuery(document).on("click", ".back-1", function () {




        $(this).addClass("selected");
        var fullmarketodds = $(this).attr("fullmarketodds");
        if (fullmarketodds != "") {
            side = $(this).attr("side");
            selectionid = $(this).attr("selectionid");

            nat_1_temp = $(this).attr("nat_1");
            runner = $(this).attr("nat_1");
            market_runner_name = runner;

            if (selectionid == 2) {
                //3 click



                nat_1 += nat_1_temp;
                nat_count++;
                back++;
                last_word = "Pana";
                motor_all_selection = "";
                full_market_name = nat_1 + " " + last_word;

                if (nat_count != 3) {
                    return false;
                }
            } else if (selectionid == 6) {
                // 2click


                nat_1 += nat_1_temp;
                nat_count++;
                back++;
                motor_all_selection = "";
                last_word = "Cycle";
                full_market_name = nat_1 + " " + last_word;

                if (nat_count != 2) {
                    return false;
                }
            } else if (selectionid == 7) {
                //4 click open max 9
                $(".place_open_motor").addClass("disabled");
                $(".place_open_motor").attr('disabled', true);



                check_already = nat_1.includes(nat_1_temp);
                if (check_already) {
                    return false;
                }
                if (nat_1_temp != "place_bet") {
                    nat_1 += nat_1_temp;
                }



                nat_count++;
                back++;
                last_word = "Motor SP";
                full_market_name = nat_1 + " " + last_word;

                if (nat_count >= 4) {
                    $(".place_open_motor").removeClass("disabled");
                    $(".place_open_motor").attr('disabled', false);

                    if (nat_1_temp != "place_bet") {
                        return false;
                    }

                }

                if (nat_count <= 3) { $(this).addClass("selected"); return false; } if (nat_count >= 9) {
                    return false;
                }
            } else {
                nat_1 = "";
                $(".selected").removeClass("selected");
                nat_count = 0;
                last_word = "";
                full_market_name = market_runner_name;
                motor_all_selection = "";
            }


            $("#popup_color").removeClass("back");
            $("#popup_color").removeClass("lay");
            $("#popup_color").addClass("back");
            market_odd_name = $(this).attr("markettype");
            runner = $(this).attr("nat_1");
            market_runner_name = runner;
            marketname = $(this).attr("nat_1");
            markettype = $(this).attr("markettype");
            fullfancymarketrate = $(this).attr("fullfancymarketrate");
            odds_change_value = "disabled";
            runs_lable = 'Runs';
            runs_lable = 'Odds';



            fullfancymarketrate = fullmarketodds;

            eventId = $(this).attr("eventid");
            marketId = $(this).attr("marketid");
            event_name = $(this).attr("event_name");


            return_html = "";

            $(this).addClass("selected");
            $("#inputStake").val();
            $("#market_runner_label").text(full_market_name);
            $("#bet_stake_side").val("Back");
            $("#odds_val").val(fullmarketodds);
            $("#bet_event_id").val(eventId);
            $("#bet_marketId").val(marketId);
            $("#bet_event_name").val(event_name);
            $("#bet_market_name").val(marketname);
            $("#bet_markettype").val(markettype);
            $("#fullfancymarketrate").val(fullfancymarketrate);
            $("#oddsmarketId").val(marketId);
            $("#market_runner_name").val(full_market_name);
            $("#market_odd_name").val(market_odd_name);

            $('#profitLiability').text('');
            $(".placeBet").attr('disabled', false);
            $("#inputStake").val("");

            $('.open_back_place_bet').show();
            $('#open_back_place_bet').modal("show");
        }
    });

    jQuery(document).on("click", ".close-bet-slip", function () {

        $(".back-1").removeClass("selected");
        $(".lay-1").removeClass("selected");
        nat_1 = "";
        nat_count = 0;
        back = 0;
        last_word = "";
    });

    jQuery(document).on("input", "#inputStake", function () {
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
    jQuery(document).on("click", ".label_stake", function () {
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

    jQuery(document).on("click", "#placeBet", function () {

        $("#placeBet").html('<i class="fa fa-spinner  fa-spin"></i> Submit');
        $(".placeBet").attr('disabled', true);
        $(".placeBet").removeAttr("id", "placeBet");
        $("#bet-error-class").removeClass("b-toast-danger");
        $("#bet-error-class").removeClass("b-toast-success");

        var last_place_bet = "";

        bet_stake_side = $("#bet_stake_side").val();
        bet_type = bet_stake_side;
        bet_event_id = $("#bet_event_id").val();
        bet_marketId = $("#bet_marketId").val();
        oddsmarketId = bet_marketId;
        eventType = 'INSTANT_WORLI';
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
        $(".back-1").removeClass("selected");
        $(".lay-1").removeClass("selected");
        $("#loadingMsg").show();
        $('.header_Back_' + bet_event_id).remove();
        $('.header_Lay_' + bet_event_id).remove();
        $('#betSlipFullBtn').hide();
        $('#backSlipHeader').hide();
        $('#laySlipHeader').hide();
        $(".back-1").removeClass("selected");
        $(".lay-1").removeClass("selected");

        setTimeout(function () {
            $.ajax({
                type: 'POST',
                url: '../ajaxfiles/bet_place_worli_matka.php',
                dataType: 'json',
                data:
                    { eventId: bet_event_id, eventType: eventType, marketId: bet_marketId, stack: inputStake, type: type, odds: oddsNo, runs: runsNo, bet_market_type: bet_market_type, oddsmarketId: oddsmarketId, eventManualType: eventManualType, market_runner_name: market_runner_name, market_odd_name: market_odd_name, bet_event_name: bet_event_name, bet_type: bet_type },
                success: function (response) {
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

    $(document).ready(function () {
        $('#open_back_place_bet').on('hide.bs.modal', function () {
            $(".back-1").removeClass("selected");
            $(".lay-1").removeClass("selected");
            back = 0;
            lay = 0;
            nat_count = 0;
            nat_1 = "";
            $(".selected").removeClass("selected");
            last_word = "";
        });
    });


</script>
        <style>
            .modal-body {
                padding: 0px !important;
            }
        </style>
        <div id="open_back_place_bet" class="modal open_back_place_bet" role="dialog">
            <div class="modal-dialog" style="margin:0;">
                <div role="document" id="__BVID__30___BV_modal_content_" tabindex="-1" class="modal-content">
                    <header id="__BVID__30___BV_modal_header_" class="modal-header">
                        <h5 id="__BVID__30___BV_modal_title_" class="modal-title">Placebet</h5>
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
                                    <div class="col-6"><input type="text" id="odds_val" class="stakeinput w-100"
                                            disabled="" value="1.7"></div>
                                    <div class="col-6">
                                        <div class="float-right"><input type="number" id="inputStake"
                                                class="stakeinput w-100" value=""></div>
                                        <input type='hidden' id='market_runner_label' value='' />
                                        <input type='hidden' id='bet_stake_side' value='' /><input type='hidden'
                                            id='bet_event_id' value='' /><input type='hidden' id='bet_marketId'
                                            value='' /><input type='hidden' id='bet_event_name' value='' /><input
                                            type='hidden' id='bet_market_name' value='' /><input type='hidden'
                                            id='bet_markettype' value='' /><input type='hidden' id='fullfancymarketrate'
                                            value='' /> <input type='hidden' id='oddsmarketId' value='' /><input
                                            type='hidden' id='market_runner_name' value='' /><input type='hidden'
                                            id='market_odd_name' value='' />
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
}
else {
    $fetch_button_value_data = mysqli_fetch_assoc($get_button_value);
    $fetch_button_value = $fetch_button_value_data['casino_button_value'];
    $default_stake = $fetch_button_value_data['default_stake'];
    $one_bet_default_stake = $fetch_button_value_data['one_bet_default_stake'];
    $button_array = explode(",", $fetch_button_value);
}
foreach ($button_array as $button_value) {
?>
    <button type="button" class="btn-place-bet btn btn-secondary btn-block1 label_stake"
        stake='<?php echo $button_value; ?>'>
        +
        <?php echo $button_value; ?>
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

    </div>
    </div>
    <!---->
    </div>
    </div>
    </div>
    <div id="errorMsg" class="b-toaster b-toaster-top-center" style="display:none;">
        <div class="b-toaster-slot vue-portal-target">
            <div role="alert" aria-live="assertive" aria-atomic="true" id="bet-error-class"
                class="b-toast b-toast-solid b-toast-prepend b-toast-danger">
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