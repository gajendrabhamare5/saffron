<?php

include('include/conn.php');
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
    .selected {
        background: green;
        color: #fff;
    }

    .hv-container .line-odd-even {
        font-size: 40px;
        height: 40px;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: "CasinoNumFont";
        font-weight: unset;
    }

    .hv-container .nav-tabs .nav-link {
        font-weight: unset;
    }

    .hv-container .nav-tabs .nav-item {
        min-width: unset;
    }

    .hv-container table td,
    .hv-container table th {
        border-left: 2px solid #eceaea !important;
        border-right: 2px solid #eceaea !important;
        border-top: 1px solid #eceaea !important;
        border-bottom: 2px solid #eceaea !important;
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

    .worli-tab-wrapper {
        width: 100%;
    }

    /* Left tab column */
    .worli-tabs-left {
        width: 122px;
        border-right: 1px solid #ddd;
    }

    /* Remove bottom border of tabs */
    .worli-tabs-left.nav-tabs {
        border-bottom: 0;
    }

    /* Tab buttons */
    .worli-tabs-left .nav-link {
        border-radius: 0;
        text-align: left;
        border: 1px solid transparent;
    }

    /* Active tab styling */
    /* .worli-tabs-left .nav-link.active {
    background-color: #f8f9fa;
    border-color: #ddd #fff #ddd #ddd;
} */

    /* Right content */
    .worli-tab-content {
        padding-left: 15px;
    }

    .card-number {
        font-size: 30px !important;
    }

    .matka-coins {
    width: 100%;
    background: #00000024;
    color: #000;
    padding: 4px 8px;
    margin-bottom: 4px;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 0 10px;
}

.matka-coins .matka-coin-title {
    font-size: 13px;
    display: flex;
    align-items: center;
    gap: 6px;
    width: auto;
    margin-bottom: 6px;
}

.matka-coins .matka-coin-title span {
    font-weight: bold;
    font-size: 12px;
    background: #0000001a;
    padding: 4.5px 9px;
    color: #000;
    text-transform: uppercase;
}

 .matka-coins .matka-coin-title span {
    font-weight: bold;
    font-size: 12px;
    background: #0000001a;
    padding: 4.5px 9px;
    color: #000;
    text-transform: uppercase;
}
.matka-coins .matka-total-coin {
    display: flex;
    align-items: center;
    gap: 5px;
    position: relative;
}

.matka-coins .matka-total-coin .casino-coin, .matka .matka-coins .matka-other-coins .casino-coin {
    display: flex;
    justify-content: center;
    align-items: center;
}
.casino-coin {
    position: relative;
}
.matka-coins .matka-total-coin .casino-coin img {
    height: 60px;
}
.matka-coins .matka-total-coin .casino-coin span, .matka .matka-coins .matka-other-coins .casino-coin span {
    position: absolute;
    font-family: "antonio";
    font-size: 14px;
    font-weight: 600;
    color: #e1e1e1;
}
.matka-coins .matka-other-coins {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    align-items: center;
}

.matka-coins .matka-other-coins .casino-coin {
    display: flex;
    justify-content: center;
    align-items: center;
}

.matka-coins .matka-other-coins .casino-coin img {
    height: 50px;
}

.matka-coins .matka-other-coins .casino-coin span {
    font-size: 16px;
}
 .casino-coin span {
    position: absolute;
    font-family: "antonio";
    font-size: 14px;
    font-weight: 600;
    color: #e1e1e1;
}

.btn-danger {
    background-color: #bd1828 !important;
    color: #fff;
    border-color: #bd1828 !important;
}

.matka-tabs {
    margin-bottom: 4px;
    margin-top: 4px;
}

.matka-tabs .nav-pills {
    gap: 0 4px;
    flex-wrap: nowrap;
    overflow: auto;
    white-space: nowrap;
}

.matka-tabs .nav-pills .nav-link.active, .matka .matka-tabs .nav-pills .show > .nav-link {
    color: #fff;
    background-color: #125e7b;
    font-weight: bold;
}

.matka-tabs .nav-pills .nav-link {
    background: #374151;
    color: #fff;
    font-size: 14px;
    text-transform: uppercase;
    border-radius: 0;
    display: flex;
    flex-direction: column;
    line-height: 1.2;
    padding: 4px 8px;
    justify-content: center;
    align-items: center;
    gap: 4px;
}

.nav-link span {
    line-height: 1;
}
.matka-tabs .remaining-time {
    display: flex;
    align-items: center;
    gap: 6px;
}
.matka-tabs .nav-pills .nav-link.active, .matka .matka-tabs .nav-pills .show > .nav-link {
    color: #fff;
    background-color: #125e7b;
    font-weight: bold;
}

 .matka-tabs .remaining-time img {
    height: 18px;
}
.matka-tabs .remaining-time span {
    font-weight: bold;
    color: #fdcf13;
    font-size: 12px;
}
.matka .game-time {
    margin-top: -3px;
    font-size: 11px;
}
.matka-tabs .nav-pills .nav-link.active, .matka .matka-tabs .nav-pills .show > .nav-link {
    color: #fff;
    background-color: #125e7b;
    font-weight: bold;
}
.game-time {
    margin-top: -3px;
    font-size: 11px;
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
                            <div class="row row5">
                                <div class="col-md-9 coupon-card featured-box-detail">
                                    <div class="coupon-card hv-container">
                                        <div class="game-heading">
                                            <span class="card-header-title">Matka Market </span>
                                            </span> <small role="button" class="teenpatti-rules"  onclick="view_rules('worli3')" data-target="#rules_popup" data-toggle="modal"  tabindex="0"><u>Rules</u></small> <span class="float-right">
                                            <!-- <span class="float-right"> Round ID: <span class="round_no">0</span> </span> -->
                                        </div>
                                        <div class="matka-tabs">
                                            <ul class="nav nav-pills">
                                                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><span>Lords Close</span>
                                                        <div class="remaining-time"><img
                                                                src="storage/front/img/casinoicons/clock.png"
                                                                alt="Clock Icon"><span>00:25:05</span></div>
                                                        <div class="game-time"><span>25 Dec 25 12:00 PM</span></div>
                                                    </a></li>
                                                <li class="nav-item"><a class="nav-link " href="javascript:void(0);"><span>Riga Open</span>
                                                        <div class="remaining-time"><img
                                                                src="storage/front/img/casinoicons/clock.png"
                                                                alt="Clock Icon"><span>01:25:05</span></div>
                                                        <div class="game-time"><span>25 Dec 25 01:00 PM</span></div>
                                                    </a></li>
                                            </ul>
                                        </div>
                                        <div class="video-container">

                                            <?php
                                            if (!empty(IFRAME_URL_SET)) {
                                            ?>
                                                <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . WORLI3_CODE; ?>" width="100%" height="200px" style="border: 0px;"></iframe>
                                            <?php

                                            } else {
                                            ?>
                                                <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                            <?php

                                            }
                                            ?>

                                            <!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . WORLI3_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
                                            <div class="clock clock3digit flip-clock-wrapper">
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
                                            <!-- <div class="video-overlay">
                                                <div>

                                                    <img id="card_c1" src="storage/front/img/cards/1.png">
                                                    <img id="card_c2" src="storage/front/img/cards/1.png">
                                                    <img id="card_c3" src="storage/front/img/cards/1.png">

                                                </div>
                                            </div> -->
                                        </div>
                                         <div class="matka-coins mb-1 mt-1"> 
                                                <div class="matka-coin-title"><span class="d-none d-md-flex">SET YOUR COIN AMOUNT<br> AND START 1-CLICK BET!</span><span class="d-md-none">SET YOUR COIN AMOUNT AND START 1-CLICK BET!</span><button class="btn btn-danger btn-sm">Reset</button></div>
                                                <div class="matka-total-coin">
                                                    <div class="casino-coin"><img src="storage/front/img/casinoicons/matka-coin-2.png" alt=""><span>0</span></div>
                                                    <div>=</div>
                                                </div>
                                                <div class="matka-other-coins">
                                                    <div class="casino-coin"><img src="storage/front/img/casinoicons/matka-coin-1.png" alt=""><span>25</span></div>
                                                    <div>+</div>
                                                    <div class="casino-coin"><img src="storage/front/img/casinoicons/matka-coin-1.png" alt=""><span>50</span></div>
                                                    <div>+</div>
                                                    <div class="casino-coin"><img src="storage/front/img/casinoicons/matka-coin-1.png" alt=""><span>100</span></div>
                                                    <div>+</div>
                                                    <div class="casino-coin"><img src="storage/front/img/casinoicons/matka-coin-1.png" alt=""><span>200</span></div>
                                                    <div>+</div>
                                                    <div class="casino-coin"><img src="storage/front/img/casinoicons/matka-coin-1.png" alt=""><span>500</span></div>
                                                    <div>+</div>
                                                    <div class="casino-coin"><img src="storage/front/img/casinoicons/matka-coin-1.png" alt=""><span>1K</span></div>
                                                </div>
                                            </div>
                                        <div class="worli-tab-wrapper d-flex">
                                           
                                            <ul class="nav nav-tabs flex-column worli-tabs-left m-b-5 m-t-5">
                                                <li class="nav-item"><a role="tab" data-rr-ui-event-key="jodi" id="worli-tabs-tab-jodi" aria-controls="worli-tabs-tabpane-jodi" aria-selected="false" class="nav-link commontabsworli" tabindex="0">Jodi</a></li>
                                                <li class="nav-item"><a role="tab" data-rr-ui-event-key="single" id="worli-tabs-tab-single" aria-controls="worli-tabs-tabpane-single" aria-selected="true" class="nav-link commontabsworli active" tabindex="0">Single</a></li>
                                                <li class="nav-item"><a role="tab" data-rr-ui-event-key="pana" id="worli-tabs-tab-pana" aria-controls="worli-tabs-tabpane-pana" aria-selected="false" tabindex="-1" class="nav-link commontabsworli">Pana</a></li>
                                                <li class="nav-item"><a role="tab" data-rr-ui-event-key="sp" id="worli-tabs-tab-sp" aria-controls="worli-tabs-tabpane-sp" aria-selected="false" tabindex="-1" class="nav-link commontabsworli">SP</a></li>
                                                <li class="nav-item"><a role="tab" data-rr-ui-event-key="dp" id="worli-tabs-tab-dp" aria-controls="worli-tabs-tabpane-dp" aria-selected="false" tabindex="-1" class="nav-link commontabsworli">DP</a></li>
                                                <li class="nav-item"><a role="tab" data-rr-ui-event-key="trio" id="worli-tabs-tab-trio" aria-controls="worli-tabs-tabpane-trio" aria-selected="false" tabindex="-1" class="nav-link commontabsworli">Trio</a></li>
                                                <li class="nav-item"><a role="tab" data-rr-ui-event-key="cycle" id="worli-tabs-tab-cycle" aria-controls="worli-tabs-tabpane-cycle" aria-selected="false" tabindex="-1" class="nav-link commontabsworli">Cycle</a></li>
                                                <li class="nav-item"><a role="tab" data-rr-ui-event-key="motor" id="worli-tabs-tab-motor" aria-controls="worli-tabs-tabpane-motor" aria-selected="false" tabindex="-1" class="nav-link commontabsworli">Motor SP</a></li>
                                                <li class="nav-item"><a role="tab" data-rr-ui-event-key="chart56" id="worli-tabs-tab-chart56" aria-controls="worli-tabs-tabpane-chart56" aria-selected="false" tabindex="-1" class="nav-link commontabsworli">56 Charts</a></li>
                                                <li class="nav-item"><a role="tab" data-rr-ui-event-key="chart64" id="worli-tabs-tab-chart64" aria-controls="worli-tabs-tabpane-chart64" aria-selected="false" tabindex="-1" class="nav-link commontabsworli">64 Charts</a></li>
                                                <li class="nav-item"><a role="tab" data-rr-ui-event-key="abr" id="worli-tabs-tab-abr" aria-controls="worli-tabs-tabpane-abr" aria-selected="false" tabindex="-1" class="nav-link commontabsworli">ABR</a></li>
                                                <li class="nav-item"><a role="tab" data-rr-ui-event-key="commonsp" id="worli-tabs-tab-commonsp" aria-controls="worli-tabs-tabpane-commonsp" aria-selected="false" tabindex="-1" class="nav-link commontabsworli">Common SP</a></li>
                                                <li class="nav-item"><a role="tab" data-rr-ui-event-key="commondp" id="worli-tabs-tab-commondp" aria-controls="worli-tabs-tabpane-commondp" aria-selected="false" tabindex="-1" class="nav-link commontabsworli">Common DP</a></li>
                                                <li class="nav-item"><a role="tab" data-rr-ui-event-key="colordp" id="worli-tabs-tab-colordp" aria-controls="worli-tabs-tabpane-colordp" aria-selected="false" tabindex="-1" class="nav-link commontabsworli">Color DP</a></li>
                                            </ul>
                                            <div class="tab-content worli-tab-content flex-fill">
                                                <!---->
                                                <div role="tabpanel" id="worli-tabs-tabpane-single" aria-labelledby="worli-tabs-tab-single" class="fade single tab-pane tab-pane-common active show">
                                                    <div class="card-content m-t-0">
                                                        <div class="table-responsive m-b-10">
                                                            <table class="table table-bordered worlibox suspended market_1_row">
                                                                <tbody>
                                                                    <tr>
                                                                        <th colspan="5" class="text-center card-odds"><b>9.5</b></th>
                                                                        <th colspan="2" class="text-center card-odds"><b>9.5</b></th>
                                                                    </tr>

                                                                    <tr class="back">
                                                                        <td class="worli-odd-box text-center back-1 market_1_b_btn" nat_1="1 Single"><span class="worli-odd d-block card-number">1</span></td>
                                                                        <td class="worli-odd-box text-center  back-1 market_1_b_btn" nat_1="2 Single"><span class="worli-odd d-block card-number">2</span></td>
                                                                        <td class="worli-odd-box text-center  back-1 market_1_b_btn" nat_1="3 Single"><span class="worli-odd d-block card-number">3</span></td>
                                                                        <td class="worli-odd-box text-center  back-1 market_1_b_btn" nat_1="4 Single"><span class="worli-odd d-block card-number">4</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_1_b_btn" nat_1="5 Single"><span class="worli-odd d-block card-number">5</span></td>

                                                                        <td class="text-center back-1 market_1_b_btn" nat_1="Line 1 Single"><span class="d-block line-odd-even">Line 1</span> <span class="d-block">1|2|3|4|5</span></td>

                                                                        <td class="text-center  back-1 market_1_b_btn" nat_1="Odd Single"><span class="d-block line-odd-even">ODD</span> <span class="d-block">1|3|5|7|9</span></td>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="6 Single"><span class="worli-odd d-block card-number">6</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="7 Single"><span class="worli-odd d-block card-number">7</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="8 Single"><span class="worli-odd d-block card-number">8</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="9 Single"><span class="worli-odd d-block card-number">9</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="0 Single"><span class="worli-odd d-block card-number">0</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="Line 2 Single"><span class="d-block line-odd-even">Line 2</span> <span class="d-block">6|7|8|9|0</span></td>

                                                                        <td class="text-center  back-1 market_1_b_btn" nat_1="Even Single"><span class="d-block line-odd-even">EVEN</span> <span class="d-block">2|4|6|8|0</span></td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div role="tabpanel" id="worli-tabs-tabpane-jodi" aria-labelledby="worli-tabs-tab-jodi" class="fade jodi tab-pane tab-pane-common">
                                                    <div class="card-content m-t-0">
                                                        <div class="table-responsive m-b-10">
                                                            <table class="table table-bordered worlibox market_1_row">
                                                                <tbody>
                                                                    <tr>
                                                                        <th colspan="10" class="text-center card-odds"><b>90</b></th>
                                                                    </tr>

                                                                    <tr class="back">
                                                                        <td class="worli-odd-box text-center back-1 market_1_b_btn" nat_1="1 Single"><span class="worli-odd d-block card-number">0-0</span></td>
                                                                        <td class="worli-odd-box text-center  back-1 market_1_b_btn" nat_1="2 Single"><span class="worli-odd d-block card-number">0-1</span></td>
                                                                        <td class="worli-odd-box text-center  back-1 market_1_b_btn" nat_1="3 Single"><span class="worli-odd d-block card-number">0-2</span></td>
                                                                        <td class="worli-odd-box text-center  back-1 market_1_b_btn" nat_1="4 Single"><span class="worli-odd d-block card-number">0-3</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_1_b_btn" nat_1="5 Single"><span class="worli-odd d-block card-number">0-4</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_1_b_btn" nat_1="6 Single"><span class="worli-odd d-block card-number">0-5</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_1_b_btn" nat_1="7 Single"><span class="worli-odd d-block card-number">0-6</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_1_b_btn" nat_1="8 Single"><span class="worli-odd d-block card-number">0-7</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_1_b_btn" nat_1="9 Single"><span class="worli-odd d-block card-number">0-8</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_1_b_btn" nat_1="10 Single"><span class="worli-odd d-block card-number">0-9</span></td>

                                                                        <!-- <td class="text-center back-1 market_1_b_btn" nat_1="Line 1 Single"><span class="d-block line-odd-even">Line 1</span> <span class="d-block">1|2|3|4|5</span></td> -->

                                                                        <!-- <td class="text-center  back-1 market_1_b_btn" nat_1="Odd Single"><span class="d-block line-odd-even">ODD</span> <span class="d-block">1|3|5|7|9</span></td> -->
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="11 Single"><span class="worli-odd d-block card-number">1-0</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="12 Single"><span class="worli-odd d-block card-number">1-1</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="13 Single"><span class="worli-odd d-block card-number">1-2</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="14 Single"><span class="worli-odd d-block card-number">1-3</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="15 Single"><span class="worli-odd d-block card-number">1-4</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="16 Single"><span class="worli-odd d-block card-number">1-5</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="17 Single"><span class="worli-odd d-block card-number">1-6</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="18 Single"><span class="worli-odd d-block card-number">1-7</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="19 Single"><span class="worli-odd d-block card-number">1-8</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="20 Single"><span class="worli-odd d-block card-number">1-9</span></td>

                                                                        <!-- <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="Line 2 Single"><span class="d-block line-odd-even">Line 2</span> <span class="d-block">6|7|8|9|0</span></td> -->

                                                                        <!-- <td class="text-center  back-1 market_1_b_btn" nat_1="Even Single"><span class="d-block line-odd-even">EVEN</span> <span class="d-block">2|4|6|8|0</span></td> -->
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="21 Single"><span class="worli-odd d-block card-number">2-0</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="22 Single"><span class="worli-odd d-block card-number">2-1</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="23 Single"><span class="worli-odd d-block card-number">2-2</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="24 Single"><span class="worli-odd d-block card-number">2-3</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="25 Single"><span class="worli-odd d-block card-number">2-4</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="26 Single"><span class="worli-odd d-block card-number">2-5</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="27 Single"><span class="worli-odd d-block card-number">2-6</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="28 Single"><span class="worli-odd d-block card-number">2-7</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="29 Single"><span class="worli-odd d-block card-number">2-8</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="30 Single"><span class="worli-odd d-block card-number">2-9</span></td>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="31 Single"><span class="worli-odd d-block card-number">3-0</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="32 Single"><span class="worli-odd d-block card-number">3-1</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="33 Single"><span class="worli-odd d-block card-number">3-2</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="34 Single"><span class="worli-odd d-block card-number">3-3</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="35 Single"><span class="worli-odd d-block card-number">3-4</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="36 Single"><span class="worli-odd d-block card-number">3-5</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="37 Single"><span class="worli-odd d-block card-number">3-6</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="38 Single"><span class="worli-odd d-block card-number">3-7</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="39 Single"><span class="worli-odd d-block card-number">3-8</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="40 Single"><span class="worli-odd d-block card-number">3-9</span></td>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="41 Single"><span class="worli-odd d-block card-number">4-0</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="42 Single"><span class="worli-odd d-block card-number">4-1</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="43 Single"><span class="worli-odd d-block card-number">4-2</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="44 Single"><span class="worli-odd d-block card-number">4-3</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="45 Single"><span class="worli-odd d-block card-number">4-4</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="46 Single"><span class="worli-odd d-block card-number">4-5</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="47 Single"><span class="worli-odd d-block card-number">4-6</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="48 Single"><span class="worli-odd d-block card-number">4-7</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="49 Single"><span class="worli-odd d-block card-number">4-8</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="50 Single"><span class="worli-odd d-block card-number">4-9</span></td>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="51 Single"><span class="worli-odd d-block card-number">5-0</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="52 Single"><span class="worli-odd d-block card-number">5-1</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="53 Single"><span class="worli-odd d-block card-number">5-2</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="54 Single"><span class="worli-odd d-block card-number">5-3</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="55 Single"><span class="worli-odd d-block card-number">5-4</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="56 Single"><span class="worli-odd d-block card-number">5-5</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="57 Single"><span class="worli-odd d-block card-number">5-6</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="58 Single"><span class="worli-odd d-block card-number">5-7</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="59 Single"><span class="worli-odd d-block card-number">5-8</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="60 Single"><span class="worli-odd d-block card-number">5-9</span></td>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="61 Single"><span class="worli-odd d-block card-number">6-0</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="62 Single"><span class="worli-odd d-block card-number">6-1</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="63 Single"><span class="worli-odd d-block card-number">6-2</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="64 Single"><span class="worli-odd d-block card-number">6-3</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="65 Single"><span class="worli-odd d-block card-number">6-4</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="66 Single"><span class="worli-odd d-block card-number">6-5</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="67 Single"><span class="worli-odd d-block card-number">6-6</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="68 Single"><span class="worli-odd d-block card-number">6-7</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="69 Single"><span class="worli-odd d-block card-number">6-8</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="70 Single"><span class="worli-odd d-block card-number">6-9</span></td>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="71 Single"><span class="worli-odd d-block card-number">7-0</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="72 Single"><span class="worli-odd d-block card-number">7-1</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="73 Single"><span class="worli-odd d-block card-number">7-2</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="74 Single"><span class="worli-odd d-block card-number">7-3</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="75 Single"><span class="worli-odd d-block card-number">7-4</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="76 Single"><span class="worli-odd d-block card-number">7-5</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="77 Single"><span class="worli-odd d-block card-number">7-6</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="78 Single"><span class="worli-odd d-block card-number">7-7</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="79 Single"><span class="worli-odd d-block card-number">7-8</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="80 Single"><span class="worli-odd d-block card-number">7-9</span></td>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="81 Single"><span class="worli-odd d-block card-number">8-0</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="82 Single"><span class="worli-odd d-block card-number">8-1</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="83 Single"><span class="worli-odd d-block card-number">8-2</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="84 Single"><span class="worli-odd d-block card-number">8-3</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="85 Single"><span class="worli-odd d-block card-number">8-4</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="86 Single"><span class="worli-odd d-block card-number">8-5</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="87 Single"><span class="worli-odd d-block card-number">8-6</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="88 Single"><span class="worli-odd d-block card-number">8-7</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="89 Single"><span class="worli-odd d-block card-number">8-8</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="90 Single"><span class="worli-odd d-block card-number">8-9</span></td>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="91 Single"><span class="worli-odd d-block card-number">9-0</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="92 Single"><span class="worli-odd d-block card-number">9-1</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="93 Single"><span class="worli-odd d-block card-number">9-2</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="94 Single"><span class="worli-odd d-block card-number">9-3</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="95 Single"><span class="worli-odd d-block card-number">9-4</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="96 Single"><span class="worli-odd d-block card-number">9-5</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="97 Single"><span class="worli-odd d-block card-number">9-6</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="98 Single"><span class="worli-odd d-block card-number">9-7</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="99 Single"><span class="worli-odd d-block card-number">9-8</span></td>
                                                                        <td class="worli-odd-boxtext-center back-1 market_1_b_btn" nat_1="100 Single"><span class="worli-odd d-block card-number">9-9</span></td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="worli-tabs-tabpane-pana" aria-labelledby="worli-tabs-tab-pana" class="fade pana tab-pane tab-pane-common">
                                                    <div class="card-content m-t-0">
                                                        <div class="table-responsive m-b-10">
                                                            <table class="table table-bordered suspended market_2_row">
                                                                <tbody>
                                                                    <tr>
                                                                        <th colspan="5" class="text-center card-odds"><b>SP: 140
                                                                                | DP: 240
                                                                                | TP: 700</b></th>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-box text-center back-1 market_2_b_btn" nat_1="1"><span class="worli-odd d-block card-number">1</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_2_b_btn" nat_1="2"><span class="worli-odd d-block card-number">2</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_2_b_btn" nat_1="3"><span class="worli-odd d-block card-number">3</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_2_b_btn" nat_1="4"><span class="worli-odd d-block card-number">4</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_2_b_btn" nat_1="5"><span class="worli-odd d-block card-number">5</span></td>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-box text-center back-1 market_2_b_btn" nat_1="6"><span class="worli-odd d-block card-number">6</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_2_b_btn" nat_1="7"><span class="worli-odd d-block card-number">7</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_2_b_btn" nat_1="8"><span class="worli-odd d-block card-number">8</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_2_b_btn" nat_1="9"><span class="worli-odd d-block card-number">9</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_2_b_btn" nat_1="0"><span class="worli-odd d-block card-number">0</span></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" id="worli-tabs-tabpane-sp" aria-labelledby="worli-tabs-tab-sp" class="fade sp tab-pane tab-pane-common">
                                                    <div class="card-content m-t-0">
                                                        <div class="table-responsive m-b-10">
                                                            <table class="table table-bordered suspended market_3_row">
                                                                <tbody>
                                                                    <tr>
                                                                        <th colspan="6" class="text-center card-odds"><b>135</b></th>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-box text-center back-1 market_3_b_btn" nat_1="1 SP"><span class="worli-odd d-block card-number">1</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_3_b_btn" nat_1="2 SP"><span class="worli-odd d-block card-number">2</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_3_b_btn" nat_1="3 SP"><span class="worli-odd d-block card-number">3</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_3_b_btn" nat_1="4 SP"><span class="worli-odd d-block card-number">4</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_3_b_btn" nat_1="5 SP"><span class="worli-odd d-block card-number">5</span></td>
                                                                        <td rowspan="2" class="worli-odd-box text-center back-1 market_3_b_btn" nat_1="SP-ALL"><span class="worli-odd d-block card-number">SP ALL</span></td>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-box text-center back-1 market_3_b_btn" nat_1="6 SP"><span class="worli-odd d-block card-number">6</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_3_b_btn" nat_1="7 SP"><span class="worli-odd d-block card-number">7</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_3_b_btn" nat_1="8 SP"><span class="worli-odd d-block card-number">8</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_3_b_btn" nat_1="9 SP"><span class="worli-odd d-block card-number">9</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_3_b_btn" nat_1="0 SP"><span class="worli-odd d-block card-number">0</span></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" id="worli-tabs-tabpane-dp" aria-labelledby="worli-tabs-tab-dp" class="fade dp tab-pane tab-pane-common">
                                                    <div class="card-content m-t-0">
                                                        <div class="table-responsive m-b-10">
                                                            <table class="table table-bordered suspended market_4_row">
                                                                <tbody>
                                                                    <tr>
                                                                        <th colspan="6" class="text-center card-odds"><b>240</b></th>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-box text-center back-1 market_4_b_btn" nat_1="1 DP"><span class="worli-odd d-block card-number">1</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_4_b_btn" nat_1="2 DP"><span class="worli-odd d-block card-number">2</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_4_b_btn" nat_1="3 DP"><span class="worli-odd d-block card-number">3</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_4_b_btn" nat_1="4 DP"><span class="worli-odd d-block card-number">4</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_4_b_btn" nat_1="5 DP"><span class="worli-odd d-block card-number">5</span></td>
                                                                        <td rowspan="2" class="worli-odd-box text-center back-1 market_4_b_btn" nat_1="DP-ALL"><span class="worli-odd d-block card-number">DP ALL</span></td>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-box text-center back-1 market_4_b_btn" nat_1="6 DP"><span class="worli-odd d-block card-number">6</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_4_b_btn" nat_1="7 DP"><span class="worli-odd d-block card-number">7</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_4_b_btn" nat_1="8 DP"><span class="worli-odd d-block card-number">8</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_4_b_btn" nat_1="9 DP"><span class="worli-odd d-block card-number">9</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_4_b_btn" nat_1="0 DP"><span class="worli-odd d-block card-number">0</span></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" id="worli-tabs-tabpane-trio" aria-labelledby="worli-tabs-tab-trio" class="fade trio tab-pane tab-pane-common">
                                                    <div class="card-content m-t-0">
                                                        <div class="table-responsive m-b-10">
                                                            <table class="table table-bordered suspended market_5_row">
                                                                <tbody>
                                                                    <tr>
                                                                        <th class="text-center card-odds"><b>700</b></th>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-box text-center back-1 market_5_b_btn" nat_1="ALL Trio">
                                                                            <!-- <button class="worli-odd btn btn-primary text-uppercase">All Trio</button> -->
                                                                            <span class="worli-odd d-block card-number">All Trio</span>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" id="worli-tabs-tabpane-cycle" aria-labelledby="worli-tabs-tab-cycle" class="fade cycle tab-pane tab-pane-common">
                                                    <div class="card-content m-t-0">
                                                        <div class="table-responsive m-b-10">
                                                            <table class="table table-bordered suspended market_6_row">
                                                                <tbody>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-box back text-center back-1 market_6_b_btn" nat_1="1"><span class="worli-odd d-block card-number">1</span></td>
                                                                        <td class="worli-odd-box back text-center back-1 market_6_b_btn" nat_1="2"><span class="worli-odd d-block card-number">2</span></td>
                                                                        <td class="worli-odd-box back text-center back-1 market_6_b_btn" nat_1="3"><span class="worli-odd d-block card-number">3</span></td>
                                                                        <td class="worli-odd-box back text-center back-1 market_6_b_btn" nat_1="4"><span class="worli-odd d-block card-number">4</span></td>
                                                                        <td class="worli-odd-box back text-center back-1 market_6_b_btn" nat_1="5"><span class="worli-odd d-block card-number">5</span></td>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-box back text-center back-1 market_6_b_btn" nat_1="6"><span class="worli-odd d-block card-number">6</span></td>
                                                                        <td class="worli-odd-box back text-center back-1 market_6_b_btn" nat_1="7"><span class="worli-odd d-block card-number">7</span></td>
                                                                        <td class="worli-odd-box back text-center back-1 market_6_b_btn" nat_1="8"><span class="worli-odd d-block card-number">8</span></td>
                                                                        <td class="worli-odd-box back text-center back-1 market_6_b_btn" nat_1="9"><span class="worli-odd d-block card-number">9</span></td>
                                                                        <td class="worli-odd-box back text-center back-1 market_6_b_btn" nat_1="0"><span class="worli-odd d-block card-number">0</span></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" id="worli-tabs-tabpane-motor" aria-labelledby="worli-tabs-tab-motor" class="fade motorsp tab-pane tab-pane-common">
                                                    <div class="card-content m-t-0">
                                                        <div class="table-responsive m-b-10">
                                                            <table class="table table-bordered suspended market_7_row">
                                                                <tbody>
                                                                    <tr>
                                                                        <th colspan="5" class="text-center card-odds"><b>135</b></th>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-box text-center back-1 market_7_b_btn" nat_1="1"><span class="worli-odd d-block card-number">1</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_7_b_btn" nat_1="2"><span class="worli-odd d-block card-number">2</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_7_b_btn" nat_1="3"><span class="worli-odd d-block card-number">3</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_7_b_btn" nat_1="4"><span class="worli-odd d-block card-number">4</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_7_b_btn" nat_1="5"><span class="worli-odd d-block card-number">5</span></td>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-box text-center back-1 market_7_b_btn" nat_1="6"><span class="worli-odd d-block card-number">6</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_7_b_btn" nat_1="7"><span class="worli-odd d-block card-number">7</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_7_b_btn" nat_1="8"><span class="worli-odd d-block card-number">8</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_7_b_btn" nat_1="9"><span class="worli-odd d-block card-number">9</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_7_b_btn" nat_1="0"><span class="worli-odd d-block card-number">0</span></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" id="worli-tabs-tabpane-chart56" aria-labelledby="worli-tabs-tab-chart56" class="fade chart56 tab-pane tab-pane-common">
                                                    <div class="card-content m-t-0">
                                                        <div class="table-responsive m-b-10">
                                                            <table class="table table-bordered suspended market_8_row">
                                                                <tbody>
                                                                    <tr>
                                                                        <th colspan="6" class=" worli-box-title text-center card-odds"><b>135</b></th>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-box text-center back-1 market_8_b_btn" nat_1="56-1"><span class="worli-odd d-block card-number">1</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_8_b_btn" nat_1="56-2"><span class="worli-odd d-block card-number">2</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_8_b_btn" nat_1="56-3"><span class="worli-odd d-block card-number">3</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_8_b_btn" nat_1="56-4"><span class="worli-odd d-block card-number">4</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_8_b_btn" nat_1="56-5"><span class="worli-odd d-block card-number">5</span></td>
                                                                        <td rowspan="2" class="worli-odd-box text-center back-1 market_8_b_btn" nat_1="56CHART"><span class="worli-odd d-block card-number">56 ALL</span></td>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-box text-center back-1 market_8_b_btn" nat_1="56-6"><span class="worli-odd d-block card-number">6</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_8_b_btn" nat_1="56-7"><span class="worli-odd d-block card-number">7</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_8_b_btn" nat_1="56-8"><span class="worli-odd d-block card-number">8</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_8_b_btn" nat_1="56-9"><span class="worli-odd d-block card-number">9</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_8_b_btn" nat_1="56-0"><span class="worli-odd d-block card-number">0</span></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" id="worli-tabs-tabpane-chart64" aria-labelledby="worli-tabs-tab-chart64" class="fade chart64 tab-pane tab-pane-common">
                                                    <div class="card-content m-t-0">
                                                        <div class="table-responsive m-b-10">
                                                            <table class="table table-bordered suspended market_9_row">
                                                                <tbody>
                                                                    <tr>
                                                                        <th colspan="6" class="text-center card-odds"><b>135</b></th>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-box text-center back-1 market_9_b_btn" nat_1="64-1"><span class="worli-odd d-block card-number">1</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_9_b_btn" nat_1="64-2"><span class="worli-odd d-block card-number">2</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_9_b_btn" nat_1="64-3"><span class="worli-odd d-block card-number">3</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_9_b_btn" nat_1="64-4"><span class="worli-odd d-block card-number">4</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_9_b_btn" nat_1="64-5"><span class="worli-odd d-block card-number">5</span></td>
                                                                        <td rowspan="2" class="worli-odd-box text-center back-1 market_9_b_btn" nat_1="64CHART"><span class="worli-odd d-block card-number">64 ALL</span></td>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-box text-center back-1 market_9_b_btn" nat_1="64-6"><span class="worli-odd d-block card-number">6</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_9_b_btn" nat_1="64-7"><span class="worli-odd d-block card-number">7</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_9_b_btn" nat_1="64-8"><span class="worli-odd d-block card-number">8</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_9_b_btn" nat_1="64-9"><span class="worli-odd d-block card-number">9</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_9_b_btn" nat_1="64-0"><span class="worli-odd d-block card-number">0</span></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" id="worli-tabs-tabpane-abr" aria-labelledby="worli-tabs-tab-abr" class="fade abr tab-pane tab-pane-common">
                                                    <div class="card-content m-t-0">
                                                        <div class="table-responsive m-b-10">
                                                            <table class="table table-bordered suspended market_10_row">
                                                                <tbody>
                                                                    <tr>
                                                                        <th colspan="6" class="text-center card-odds"><b>135</b></th>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-box text-center back-1 market_10_b_btn" nat_1="ABR-A"><span class="worli-odd d-block card-number">A</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_10_b_btn" nat_1="ABR-B"><span class="worli-odd d-block card-number">B</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_10_b_btn" nat_1="ABR-R"><span class="worli-odd d-block card-number">R</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_10_b_btn" nat_1="ABR-ABR"><span class="worli-odd d-block card-number">ABR</span></td>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-box text-center back-1 market_10_b_btn" nat_1="ABR-AB"><span class="worli-odd d-block card-number">AB</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_10_b_btn" nat_1="ABR-AR"><span class="worli-odd d-block card-number">AR</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_10_b_btn" nat_1="ABR-BR"><span class="worli-odd d-block card-number">BR</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_10_b_btn" nat_1="ABR-ABR Cut"><span class="worli-odd d-block card-number">ABR CUT</span></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" id="worli-tabs-tabpane-commonsp" aria-labelledby="worli-tabs-tab-commonsp" class="fade commonsp tab-pane tab-pane-common">
                                                    <div class="card-content m-t-0">
                                                        <div class="table-responsive m-b-10">
                                                            <table class="table table-bordered suspended market_11_row">
                                                                <tbody>
                                                                    <tr>
                                                                        <th colspan="5" class="text-center card-odds"><b>135</b></th>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-box text-center back-1 market_11_b_btn" nat_1="Common SP-1"><span class="worli-odd d-block card-number">1</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_11_b_btn" nat_1="Common SP-2"><span class="worli-odd d-block card-number">2</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_11_b_btn" nat_1="Common SP-3"><span class="worli-odd d-block card-number">3</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_11_b_btn" nat_1="Common SP-4"><span class="worli-odd d-block card-number">4</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_11_b_btn" nat_1="Common SP-5"><span class="worli-odd d-block card-number">5</span></td>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-box text-center back-1 market_11_b_btn" nat_1="Common SP-6"><span class="worli-odd d-block card-number">6</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_11_b_btn" nat_1="Common SP-7"><span class="worli-odd d-block card-number">7</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_11_b_btn" nat_1="Common SP-8"><span class="worli-odd d-block card-number">8</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_11_b_btn" nat_1="Common SP-9"><span class="worli-odd d-block card-number">9</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_11_b_btn" nat_1="Common SP-0"><span class="worli-odd d-block card-number">0</span></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" id="worli-tabs-tabpane-commondp" aria-labelledby="worli-tabs-tab-commondp" class="fade commondp tab-pane tab-pane-common">
                                                    <div class="card-content m-t-0">
                                                        <div class="table-responsive m-b-10">
                                                            <table class="table table-bordered suspended market_12_row">
                                                                <tbody>
                                                                    <tr>
                                                                        <th colspan="5" class="text-center card-odds"><b>240</b></th>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-box text-center back-1 market_12_b_btn" nat_1="Common DP-1"><span class="worli-odd d-block card-number">1</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_12_b_btn" nat_1="Common DP-2"><span class="worli-odd d-block card-number">2</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_12_b_btn" nat_1="Common DP-3"><span class="worli-odd d-block card-number">3</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_12_b_btn" nat_1="Common DP-4"><span class="worli-odd d-block card-number">4</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_12_b_btn" nat_1="Common DP-5"><span class="worli-odd d-block card-number">5</span></td>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-box text-center back-1 market_12_b_btn" nat_1="Common DP-6"><span class="worli-odd d-block card-number">6</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_12_b_btn" nat_1="Common DP-7"><span class="worli-odd d-block card-number">7</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_12_b_btn" nat_1="Common DP-8"><span class="worli-odd d-block card-number">8</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_12_b_btn" nat_1="Common DP-9"><span class="worli-odd d-block card-number">9</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_12_b_btn" nat_1="Common DP-0"><span class="worli-odd d-block card-number">0</span></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" id="worli-tabs-tabpane-colordp" aria-labelledby="worli-tabs-tab-colordp" class="fade colordp tab-pane tab-pane-common">
                                                    <div class="card-content m-t-0">
                                                        <div class="table-responsive m-b-10">
                                                            <table class="table table-bordered suspended market_13_row">
                                                                <tbody>
                                                                    <tr>
                                                                        <th colspan="6" class="text-center card-odds"><b>240</b></th>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-box text-center back-1 market_13_b_btn" nat_1="Color DP-1"><span class="worli-odd d-block card-number">1</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_13_b_btn" nat_1="Color DP-2"><span class="worli-odd d-block card-number">2</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_13_b_btn" nat_1="Color DP-3"><span class="worli-odd d-block card-number">3</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_13_b_btn" nat_1="Color DP-4"><span class="worli-odd d-block card-number">4</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_13_b_btn" nat_1="Color DP-5"><span class="worli-odd d-block card-number">5</span></td>
                                                                        <td rowspan="2" class="worli-odd-box text-center back-1 market_13_b_btn" nat_1="Color DP-11"><span class="d-block card-number">COLOR DP ALL</span></td>
                                                                    </tr>
                                                                    <tr class="back">
                                                                        <td class="worli-odd-box text-center back-1 market_13_b_btn" nat_1="Color DP-6"><span class="worli-odd d-block card-number">6</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_13_b_btn" nat_1="Color DP-7"><span class="worli-odd d-block card-number">7</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_13_b_btn" nat_1="Color DP-8"><span class="worli-odd d-block card-number">8</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_13_b_btn" nat_1="Color DP-9"><span class="worli-odd d-block card-number">9</span></td>
                                                                        <td class="worli-odd-box text-center back-1 market_13_b_btn" nat_1="Color DP-0"><span class="worli-odd d-block card-number">0</span></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=worli3">View All</a></span></div>
                                        <div class="casino-last-results" id="last-result">
                                            <!-- <span class="result result-b">B</span><span class="result result-b">B</span><span class="result result-a">A</span><span class="result result-b">B</span><span class="result result-b">B</span><span class="result result-a">A</span><span class="result result-b">B</span><span class="result result-a">A</span><span class="result result-a">A</span><span class="result result-a">A</span> -->
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

    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!-- <script src="storage/js/bootstrap.min.js" type="text/javascript"></script> -->
    <script src="storage/front/js/flipclock.js" type="text/javascript"></script>
    <script type="text/javascript" src='footer-js.js?25'></script>

    <script>
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

        jQuery(document).on("click", ".commontabsworli", function() {

            $(".commontabsworli").removeClass("active");
            $(".tab-pane-common").removeClass("active");
            $(".tab-pane-common").removeClass("show");

            var tab_name = $(this).attr("aria-controls");
            $(this).addClass("active");
            $("#" + tab_name).addClass("active");
            $("#" + tab_name).addClass("show");
           
            $(".back-1").removeClass("selected");
            $(".lay-1").removeClass("selected");
            nat_1 = "";
            nat_count = 0;
            back = 0;
            last_word = "";
        });

        function tab_view(tab_name) {
           
            $(".tab_menu_btn").removeClass("active");
            $("." + tab_name + "_tab_btn").addClass("active");
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
            $("#" + tab_name).show();
            /* $('.bet-slip-data').remove(); */
            $(".back-1").removeClass("selected");
            $(".lay-1").removeClass("selected");
            nat_1 = "";
            nat_count = 0;
            back = 0;
            last_word = "";
        }
    </script>


    <script type="text/javascript">
        var site_url = '<?php echo WEB_URL; ?>';
        var websocketurl = '<?php echo GAME_IP; ?>';
        var clock = new FlipClock($(".clock"), {
            clockFace: "Counter"
        });
        var oldGameId = 0;
        var resultGameLast = 0;
        var data6;
        var selectionid = "";
        var runner = "";
        var b1 = "";
        var bs1 = "";
        var l1 = "";
        var ls1 = "";
        var markettype = "WORLI3_MATKA";
        var markettype_2 = markettype;
        var back_html = "";
        var lay_html = "";
        var gstatus = "";
        var last_result_id = '0';

        function websocket(type) {
            socket = io.connect(websocketurl);
            socket.on('connect', function() {
                socket.emit('Room', 'worli3');
            });
            socket.on('gameIframe', function(data) {
                $("#casinoIframe").attr('src', data);
            });
            socket.on('game', function(data) {
               

                if (data && data['t1'] && data['t1'][0]) {
                    if (oldGameId != data.t1[0].mid && data.t1[0].mid != 0 && data.t1[0].mid != "0") {
                        setTimeout(function() {
                            clearCards();
                        }, <?php echo CASINO_RESULT_TIMEOUT; ?>);
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

                    $(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
                    $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
                    eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1];

                    for (var j in data['t2']) {
                        selectionid = parseInt(data['t2'][j].sid);
                        /* b1 = 0; */
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


                        markettype = "WORLI3_MATKA";

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
                        } else {
                            $(".market_" + selectionid + "_row").removeClass("suspended");
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

        /* function getType(data){
        	var data1 = data;
        	if(data){
        		data = data.split('SS');
        		if(data.length > 1){
        			var obj = {
        				type	:	'[',
        				color	:	'red',
        				card	:	data[0]
        			}
        			return obj;
        		}
        		else{
        			data = data1;
        			data = data.split('DD');
        			if(data.length > 1){
        				var obj = {
        					type	:	'{',
        					color	:	'red',
        					card	:	data[0]
        				}
        				return obj;
        			}
        			else{
        				data = data1;
        				data = data.split('HH');
        				if(data.length > 1){
        					var obj = {
        						type	:	']',
        						color	:	'black',
        						card	:	data[0]
        					}
        					return obj;
        				}
        				else{
        					data = data1;
        					data = data.split('CC');
        					if(data.length > 1){
        						var obj = {
        							type	:	'}',
        							color	:	'black',
        							card	:	data[0]
        						}
        						return obj;
        					}
        					else{
        						return 0;
        					}
        				}
        			}
        		}
        	}
        	return 0;
        } */

        function clearCards() {
            refresh(markettype);
            $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
            $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
            $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
        }

        function updateResult(data) {
            if (data && data[0]) {
                data = JSON.parse(JSON.stringify(data));
                resultGameLast = data[0].mid;

                if (last_result_id != resultGameLast) {
                    last_result_id = resultGameLast;
                    refresh(markettype);
                }

                html = "";

                casino_type = "'worli3'";
                data.forEach((runData) => {

                    ab = "result-a";
                    ab1 = "R";

                    eventId = runData.mid == 0 ? 0 : runData.mid.split(".")[1];
                    html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')" class="ball-runs  ' + ab + ' last-result">' + ab1 + '</span>';
                });
                $("#last-result").html(html);
                if (oldGameId == 0 || oldGameId == resultGameLast) {
                    $("#card_c1").attr("src", "storage/front/img/cards/1.png");
                    $("#card_c2").attr("src", "storage/front/img/cards/1.png");
                    $("#card_c3").attr("src", "storage/front/img/cards/1.png");
                }
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
        /* jQuery(document).on("click", ".close-bet-slip", function () {
        	 $('.bet-slip-data').remove();
        	 $(".back-1").removeClass("selected");
        	$(".lay-1").removeClass("selected");
        	nat_1="";
        	nat_count = 0;
        	back = 0;
        	last_word = "";
         }); */
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
            eventType = 'WORLI3_MATKA';
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
            $("#placeBets").addClass('disable');
            $("#bet-error-class").removeClass("b-toast-danger");
            $("#bet-error-class").removeClass("b-toast-success");
            setTimeout(function() {
                $.ajax({
                    type: 'POST',
                    url: 'ajaxfiles/bet_place_worli_matka.php',
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

        $(document).ready(function() {
            $('#open_back_place_bet').on('hide.bs.modal', function() {
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