<?php
include('include/conn.php');
include('include/flip_function.php');
include('session.php');
$user_id = $_SESSION['CLIENT_LOGIN_ID'];

$get_parent_ids = $conn->query("select parentSuperMDL from user_login_master where UserID=$user_id");
$fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
$parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];

$get_access = $conn->query("select cricket_access,soccer_access,soccer_access,video_access from user_master where Id=$parentSuperMDL");
$fetch_access = mysqli_fetch_assoc($get_access);

if($fetch_access['video_access'] != 1){
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

.nav {
    display: flex;
    flex-wrap: wrap;
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
}

ul,
ol {
    margin-bottom: 0;
    padding: 0;
}

.mb-1 {
    margin-bottom: .25rem !important;
}

.nav,
.tab-content {
    width: 100%;
}

ul li,
ol li {
    list-style: none;
}

.nav-link1 {
    display: block;
    padding: .5rem 1rem;
    color: #0d6efd;
    text-decoration: none;
    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out;
}

[type=button]:not(:disabled),
[type=reset]:not(:disabled),
[type=submit]:not(:disabled),
button:not(:disabled) {
    cursor: pointer;
}

.nav-pills .nav-link1 {
    background: 0 0;
    border: 0;
    border-radius: .25rem;
}

.nav-pills .nav-link1 {
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
    height: 32px;
}

.nav-pills .nav-link1.active,
.nav-pills .show>.nav-link1 {
    color: #fff;
    background-color: #0d6efd;
}

.nav-pills .nav-link1.active,
.nav-pills .show>.nav-link1 {
    background-color:  var(--theme2-bg);
    color: #ffffff;
}

.nav-pills .nav-item:last-child .nav-link1 {
    border-right: 0;
}

.nav,
.tab-content {
    width: 100%;
}

.fade {
    transition: opacity .15s linear;
}

.tab-content>.tab-pane {
    display: none;
}

.tab-content>.active {
    display: block;
}

.row {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(-1* var(--bs-gutter-y));
    margin-right: calc(-.5* var(--bs-gutter-x));
    margin-left: calc(-.5* var(--bs-gutter-x));
}

.row.row5 {
    margin-left: -5px;
    margin-right: -5px;
}

.col-md-6 {
    flex: 0 0 auto;
    width: 50%;
}

.row.row5>[class*="col-"],
.row.row5>[class*="col"] {
    padding-left: 5px;
    padding-right: 5px;
}

.hands .col-md-6,
.pattern .col-md-4,
.pattern .col-6 {
    margin-bottom: 10px;
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
    flex-direction: row;
    justify-content: space-between;
    padding: 5px 10px;
}

.casino-nation-name {
    font-size: 16px;
    font-weight: bold;
}

.casino-nation-book {
    font-size: 12px;
    font-weight: bold;
    min-height: 18px;
}

.patern-name {
    display: inline-block;
    vertical-align: middle;
    font-size: 12px !important;
    background-color: #cccccc !important;
    padding: 0;
    margin-left: 5px !important;
    float: unset !important;
}

.card-icon {
    font-family: Card Characters !important;
    display: inline-block;
}

.patern-name .card-icon {
    padding: 4px 2px;
}

.card-black {
    color: #000000 !important;
}

.casino-odds {
    font-size: 18px;
    font-weight: bold;
    line-height: 1;
}

.casino-odds-box .casino-odds {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-end;
}

.casino-odds {
    font-size: 18px;
    font-weight: bold;
    line-height: 1;
}

.casino-odds-box .casino-odds {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-end;
}

.fade {
    transition: opacity .15s linear;
}

.fade:not(.show) {
    opacity: 0;
}

.row.row5 {
    margin-left: -5px;
    margin-right: -5px;
}

.col-md-4 {
    flex: 0 0 auto;
    width: 33.33333333%;
}

.row.row5>[class*="col-"],
.row.row5>[class*="col"] {
    padding-left: 5px;
    padding-right: 5px;
}

.patern-name {
    display: inline-block;
    vertical-align: middle;
    font-size: 12px;
    background-color: #cccccc;
    padding: 0;
    margin-left: 5px;
}

.pattern .col-md-4,
.pattern .col-6 {
    margin-bottom: 10px;
}

.card-icon {
    font-family: Card Characters !important;
    display: inline-block;
}

.patern-name .card-icon {
    padding: 4px 2px;
}

.card-black {
    color: #000000 !important;
}

.card-red {
    color: #ff0000 !important;
}

.casino-remark {
    padding: 0 5px;
    color: #097c93;
    font-weight: bold;
    font-size: 12px;
    max-width: 100%;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    display: inline-block;
    width: 100%;
}

.mt-1 {
    margin-top: .25rem !important;
}

.casino-remark marquee {
    width: calc(100% - 60px);
    float: right;
    padding-left: 10px;
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
    background-color:  var(--theme2-bg);
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
                            <div class="row row5 poker9-container poker-6player">
                                <div class="col-md-9 casino-container coupon-card featured-box-detail">
                                    <div class="coupon-card hands-pattern-container">
                                        <div class="game-heading"><span class="card-header-title">Poker 6 Players
                                                <!-- <small  role="button" class="teenpatti-rules" onclick="view_rules('poker-rules.jpeg')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u >Rules</u></small> -->
                                                <!---->
                                            </span>
                                            <small role="button" class="teenpatti-rules"
                                                onclick="view_rules('6player_poker')" data-target="#rules_popup"
                                                data-toggle="modal" tabindex="0"><u>Rules</u></small>
                                            <span class="float-right">
                                                Round ID:
                                                <span class="round_no">0</span></span>
                                        </div>
                                        <!---->
                                        <div class="video-container">
                                            <?php
														if(!empty(IFRAME_URL_SET)){
												?>
																<iframe class="iframedesign"
																	src="<?php echo IFRAME_URL."".A6PLAYERPOKER_CODE;?>" width="100%"
																	height="200px" style="border: 0px;"></iframe>
																<?php
													
												}else{
													?>
																<iframe class="iframedesign" id="casinoIframe" src="" width="100%"
																	height="200" style="border: 0px;"></iframe>
																<?php

												}
												?>
                                            <!--	<iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                           <iframe class="iframedesign"  src="<?php echo IFRAME_URL; echo A6PLAYERPOKER_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
                                            <div class="clock clock2digit flip-clock-wrapper">
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


                                            <div class="video-overlay">
                                                <img id="card_c13" src="storage/front/img/cards_new/1.png">
                                                <img id="card_c14" src="storage/front/img/cards_new/1.png">
                                                <img src="storage/front/img/cards_new/1.png" id="card_c15">
                                                <img id="card_c16" src="storage/front/img/cards_new/1.png">
                                                <img src="storage/front/img/cards_new/1.png" id="card_c17">

                                            </div>
                                            <div class="bet-note theme2bg theme1color specialRemarkdiv"
                                                style="display:none;"><span class="greenbx">Result: </span> <span
                                                    id="specialRemark"></span></div>
                                            <!---->
                                        </div>
                                        <!---->
                                        <div class="casino-detail">
                                            <div class="casino-table">
                                                <ul class="mb-1 nav nav-pills" role="tablist">
                                                    <li class="nav-item" role="presentation"><button type="button"
                                                            role="tab" data-rr-ui-event-key="hands"
                                                            aria-controls="uncontrolled-tab-example-tabpane-hands"
                                                            aria-selected="true" class="nav-link1 active hands_tab_btn"
                                                            onclick="tab_view('hands')">Hands</button></li>
                                                    <li class="nav-item" role="presentation"><button type="button"
                                                            role="tab" data-rr-ui-event-key="pattern"
                                                            aria-controls="uncontrolled-tab-example-tabpane-pattern"
                                                            aria-selected="false" class="nav-link1 patterns_tab_btn"
                                                            tabindex="-1"
                                                            onclick="tab_view('patterns')">Pattern</button></li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div role="tabpanel" id="hands"
                                                        aria-labelledby="uncontrolled-tab-example-tab-hands"
                                                        class="fade hands tab-pane active show">
                                                        <div class="row row5">
                                                            <div class="col-md-6">
                                                                <div
                                                                    class="casino-odds-box back suspended-box market_11_row market_11_b_btn back-1">
                                                                    <div class="casino-nation-name">
                                                                        Player 1
                                                                        <div class="patern-name ms-3 card_c1 card_c7">
                                                                            <span class="card-icon ml-2"
                                                                                id="card_c1">8<span
                                                                                    class="card-black ml-1">}</span></span>
                                                                            <span class="card-icon ml-2"
                                                                                id="card_c7">8<span
                                                                                    class="card-red ml-1">{</span></span>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <span
                                                                            class="casino-odds market_11_b_value">0</span>
                                                                        <div
                                                                            class="casino-nation-book market_11_b_exposure market_exposure">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div
                                                                    class="casino-odds-box back suspended-box market_12_row market_12_b_btn back-1">
                                                                    <div class="casino-nation-name">
                                                                        Player 2
                                                                        <div class="patern-name ms-3 card_c2 card_c8">
                                                                            <span class="card-icon ml-2"
                                                                                id="card_c2"></span>
                                                                            <span class="card-icon ml-2"
                                                                                id="card_c8"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <span
                                                                            class="casino-odds market_12_b_value">0</span>
                                                                        <div
                                                                            class="casino-nation-book market_12_b_exposure market_exposure">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div
                                                                    class="casino-odds-box back suspended-box market_13_row market_13_b_btn back-1">
                                                                    <div class="casino-nation-name">
                                                                        Player 3
                                                                        <div class="patern-name ms-3 card_c3 card_c9">
                                                                            <span class="card-icon ml-2"
                                                                                id="card_c3"></span>
                                                                            <span class="card-icon ml-2"
                                                                                id="card_c9"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <span
                                                                            class="casino-odds market_13_b_value">0</span>
                                                                        <div
                                                                            class="casino-nation-book market_13_b_exposure market_exposure">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div
                                                                    class="casino-odds-box back suspended-box market_14_row market_14_b_btn back-1">
                                                                    <div class="casino-nation-name">
                                                                        Player 4
                                                                        <div class="patern-name ms-3 card_c4 card_c10">
                                                                            <span class="card-icon ml-2"
                                                                                id="card_c4"></span>
                                                                            <span class="card-icon ml-2"
                                                                                id="card_c10"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <span
                                                                            class="casino-odds market_14_b_value">0</span>
                                                                        <div
                                                                            class="casino-nation-book market_14_b_exposure market_exposure">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div
                                                                    class="casino-odds-box back suspended-box market_15_row market_15_b_btn back-1">
                                                                    <div class="casino-nation-name">
                                                                        Player 5
                                                                        <div class="patern-name ms-3 card_c5 card_c11">
                                                                            <span class="card-icon ml-2"
                                                                                id="card_c5"></span>
                                                                            <span class="card-icon ml-2"
                                                                                id="card_c11"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <span
                                                                            class="casino-odds market_15_b_value">0</span>
                                                                        <div
                                                                            class="casino-nation-book market_15_b_exposure market_exposure">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div
                                                                    class="casino-odds-box back suspended-box market_16_row market_16_b_btn back-1">
                                                                    <div class="casino-nation-name">
                                                                        Player 6
                                                                        <div class="patern-name ms-3 card_c12 card_c6">
                                                                            <span class="card-icon ml-2"
                                                                                id="card_c6"></span>
                                                                            <span class="card-icon ml-2"
                                                                                id="card_c12"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <span
                                                                            class="casino-odds market_16_b_value">0</span>
                                                                        <div
                                                                            class="casino-nation-book market_16_b_exposure market_exposure">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div role="tabpanel" id="patterns"
                                                        aria-labelledby="uncontrolled-tab-example-tab-pattern"
                                                        class="fade pattern tab-pane">
                                                        <div class="row row5">
                                                            <div class="col-md-4 col-6">
                                                                <div
                                                                    class="casino-odds-box back suspended-box market_21_row market_21_b_btn back-1">
                                                                    <div class="casino-nation-name">High Card</div>
                                                                    <div>
                                                                        <span
                                                                            class="casino-odds market_21_b_value">0</span>
                                                                        <div
                                                                            class="casino-nation-book market_21_b_exposure market_exposure">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-md-4 col-6">
															<div class="casino-odds-box back suspended-box">
																<div class="casino-nation-name">Pair</div>
																<div><span class="casino-odds">0</span></div>
															</div>
														</div> -->
                                                            <div class="col-md-4 col-6">
                                                                <div
                                                                    class="casino-odds-box back suspended-box market_22_row market_22_b_btn back-1">
                                                                    <div class="casino-nation-name">Pair</div>
                                                                    <div>
                                                                        <span
                                                                            class="casino-odds market_22_b_value">0</span>
                                                                        <div
                                                                            class="casino-nation-book market_22_b_exposure market_exposure">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-6">
                                                                <div
                                                                    class="casino-odds-box back suspended-box market_23_row market_23_b_btn back-1">
                                                                    <div class="casino-nation-name">Two Pair</div>
                                                                    <div>
                                                                        <span
                                                                            class="casino-odds market_23_b_value">0</span>
                                                                        <div
                                                                            class="casino-nation-book market_23_b_exposure market_exposure">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-6">
                                                                <div
                                                                    class="casino-odds-box back suspended-box market_24_row market_24_b_btn back-1">
                                                                    <div class="casino-nation-name">Three of a Kind
                                                                    </div>
                                                                    <div>
                                                                        <span
                                                                            class="casino-odds market_24_b_value">0</span>
                                                                        <div
                                                                            class="casino-nation-book market_24_b_exposure market_exposure">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-6">
                                                                <div
                                                                    class="casino-odds-box back suspended-box market_25_row market_25_b_btn back-1">
                                                                    <div class="casino-nation-name">Straight</div>
                                                                    <div>
                                                                        <span
                                                                            class="casino-odds market_25_b_value">0</span>
                                                                        <div
                                                                            class="casino-nation-book market_25_b_exposure market_exposure">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-6">
                                                                <div
                                                                    class="casino-odds-box back suspended-box market_26_row market_26_b_btn back-1">
                                                                    <div class="casino-nation-name">Flush</div>
                                                                    <div>
                                                                        <span
                                                                            class="casino-odds market_26_b_value">0</span>
                                                                        <div
                                                                            class="casino-nation-book market_26_b_exposure market_exposure">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-6">
                                                                <div
                                                                    class="casino-odds-box back suspended-box market_27_row market_27_b_btn back-1">
                                                                    <div class="casino-nation-name">Full House</div>
                                                                    <div>
                                                                        <span
                                                                            class="casino-odds market_27_b_value">0</span>
                                                                        <div
                                                                            class="casino-nation-book market_27_b_exposure market_exposure">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-6">
                                                                <div
                                                                    class="casino-odds-box back suspended-box market_28_row market_28_b_btn back-1">
                                                                    <div class="casino-nation-name">Four of a Kind</div>
                                                                    <div>
                                                                        <span
                                                                            class="casino-odds market_28_b_value">0</span>
                                                                        <div
                                                                            class="casino-nation-book market_28_b_exposure market_exposure">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-6">
                                                                <div
                                                                    class="casino-odds-box back suspended-box market_29_row market_29_b_btn back-1">
                                                                    <div class="casino-nation-name">Straight Flush</div>
                                                                    <div>
                                                                        <span
                                                                            class="casino-odds market_29_b_value">0</span>
                                                                        <div
                                                                            class="casino-nation-book market_29_b_exposure market_exposure">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="casino-remark mt-1">
                                                    <marquee scrollamount="3"> </marquee>
                                                </div>
                                            </div>
                                            <div class="casino-last-result-title"><span>Last Result</span><span><a
                                                        href="casinoresults?game_type=poker6">View All</a></span></div>
                                            <div class="casino-last-results" id="last-result">
                                                <!-- <span class="result result-b">1</span><span class="result result-b">6</span><span class="result result-b">2</span><span class="result result-b">6</span><span class="result result-b">4</span><span class="result result-b">1</span><span class="result result-b">6</span><span class="result result-b">5</span><span class="result result-b">5</span><span class="result result-b">6</span> -->
                                            </div>
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

    <script src="storage/front/js/flipclock.js" type="text/javascript"></script>
    <script type="text/javascript" src='footer-js.js?1'></script>

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


    function tab_view(tab_name) {
        $(".hands_tab_btn").removeClass("active");
        $(".patterns_tab_btn").removeClass("active");
        $(".tab-pane").removeClass("active");
        $(".tab-pane").removeClass("show");
        $("." + tab_name + "_tab_btn").addClass("active");
        $("#" + tab_name).addClass("active");
        $("#" + tab_name).addClass("show");
        $("#patterns").hide();
        $("#hands").hide();
        $("#" + tab_name).show();
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
    var selectionid = "";
    var runner = "";
    var b1 = "";
    var bs1 = "";
    var l1 = "";
    var ls1 = "";
    var markettype = "6_PLAYER_POKER";
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
            socket.emit('Room', 'poker6');
        });
        socket.on('gameIframe', function(data) {
            $("#casinoIframe").attr('src', data);
        });
        socket.on('game', function(data) {
            $(".patern-name").css('background-color', 'unset');
            if (data && data['t1'] && data['t1'][0]) {

                if (oldGameId != data.t1[0].mid && data.t1[0].mid != 0 && data.t1[0].mid != "0") {
                    setTimeout(function() {
                        clearCards();
                    }, <?php echo CASINO_RESULT_TIMEOUT; ?>);
                }
                oldGameId = data.t1[0].mid;
                if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark").text(data.t1[0].remark);
                    specialRemark = data.t1[0].desc;
                    $("#specialRemark").text(specialRemark);
                    if (specialRemark == "") {
                        $(".specialRemarkdiv").hide();
                    } else {
                        $(".specialRemarkdiv").show();
                    }



                    if (data.t1[0].C13 != 1) {
                        $("#card_c13").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C13 +
                            ".png");
                    }
                    if (data.t1[0].C14 != 1) {
                        $("#card_c14").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C14 +
                            ".png");
                    }
                    if (data.t1[0].C15 != 1) {
                        $("#card_c15").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C15 +
                            ".png");
                    }
                    if (data.t1[0].C16 != 1) {
                        $("#card_c16").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C16 +
                            ".png");
                    }
                    if (data.t1[0].C17 != 1) {
                        $("#card_c17").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C17 +
                            ".png");
                    }



                    if (data.t1[0].C1 != 1) {
                        data6 = getType(data.t1[0].C1);
                        if (data6) {
                            var cs = data6.card + "<span class='card-" + data6.color + "'>" + data6.type +
                                "</span>";
                            $("#card_c1").html(cs);
                            $("#card_c1").html(cs);
                            $(".card_c1").css('background-color', '#cccccc');
                        }
                    }

                    if (data.t1[0].C2 != 1) {
                        data6 = getType(data.t1[0].C2);
                        if (data6) {
                            var cs = data6.card + "<span class='card-" + data6.color + "'>" + data6.type +
                                "</span>";
                            $("#card_c2").html(cs);
                            $(".card_c2").css('background-color', '#cccccc');
                        }
                    }

                    if (data.t1[0].C3 != 1) {
                        data6 = getType(data.t1[0].C3);
                        if (data6) {
                            var cs = data6.card + "<span class='card-" + data6.color + "'>" + data6.type +
                                "</span>";
                            $("#card_c3").html(cs);
                            $(".card_c3").css('background-color', '#cccccc');
                        }
                    }

                    if (data.t1[0].C4 != 1) {
                        data6 = getType(data.t1[0].C4);
                        if (data6) {
                            var cs = data6.card + "<span class='card-" + data6.color + "'>" + data6.type +
                                "</span>";
                            $("#card_c4").html(cs);
                            $(".card_c4").css('background-color', '#cccccc');
                        }
                    }

                    if (data.t1[0].C5 != 1) {
                        data6 = getType(data.t1[0].C5);
                        if (data6) {
                            var cs = data6.card + "<span class='card-" + data6.color + "'>" + data6.type +
                                "</span>";
                            $("#card_c5").html(cs);
                            $(".card_c5").css('background-color', '#cccccc');
                        }
                    }

                    if (data.t1[0].C6 != 1) {
                        data6 = getType(data.t1[0].C6);
                        if (data6) {
                            var cs = data6.card + "<span class='card-" + data6.color + "'>" + data6.type +
                                "</span>";
                            $("#card_c6").html(cs);
                            $(".card_c6").css('background-color', '#cccccc');
                        }
                    }

                    if (data.t1[0].C7 != 1) {
                        data6 = getType(data.t1[0].C7);
                        if (data6) {
                            var cs = data6.card + "<span class='card-" + data6.color + "'>" + data6.type +
                                "</span>";
                            $("#card_c7").html(cs);
                            $(".card_c7").css('background-color', '#cccccc');
                        }
                    }

                    if (data.t1[0].C8 != 1) {
                        data6 = getType(data.t1[0].C8);
                        if (data6) {
                            var cs = data6.card + "<span class='card-" + data6.color + "'>" + data6.type +
                                "</span>";
                            $("#card_c8").html(cs);
                            $(".card_c8").css('background-color', '#cccccc');
                        }
                    }

                    if (data.t1[0].C9 != 1) {
                        data6 = getType(data.t1[0].C9);
                        if (data6) {
                            var cs = data6.card + "<span class='card-" + data6.color + "'>" + data6.type +
                                "</span>";
                            $("#card_c9").html(cs);
                            $(".card_c9").css('background-color', '#cccccc');
                        }
                    }

                    if (data.t1[0].C10 != 1) {
                        data6 = getType(data.t1[0].C10);
                        if (data6) {
                            var cs = data6.card + "<span class='card-" + data6.color + "'>" + data6.type +
                                "</span>";
                            $("#card_c10").html(cs);
                            $(".card_c10").css('background-color', '#cccccc');
                        }
                    }

                    if (data.t1[0].C11 != 1) {
                        data6 = getType(data.t1[0].C11);
                        if (data6) {
                            var cs = data6.card + "<span class='card-" + data6.color + "'>" + data6.type +
                                "</span>";
                            $("#card_c11").html(cs);
                            $("#card_c11").html(cs);
                            $(".card_c11").css('background-color', '#cccccc');
                        }
                    }

                    if (data.t1[0].C12 != 1) {
                        data6 = getType(data.t1[0].C12);
                        if (data6) {
                            var cs = data6.card + "<span class='card-" + data6.color + "'>" + data6.type +
                                "</span>";
                            $("#card_c12").html(cs);
                            $(".card_c12").css('background-color', '#cccccc');
                        }
                    }




                }
                clock.setValue(data.t1[0].autotime);
                $(".round_no").text(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid
                    .split(".")[1] : data.t1[0].mid);
                $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[
                    0].mid.split(".")[1] : data.t1[0].mid);
                eventId = data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(
                    ".")[1] : data.t1[0].mid;

                for (var j in data['t2']) {
                    selectionid = parseInt(data['t2'][j].sid);
                    runner = data['t2'][j].nat || data['t2'][j].nation;
                    b1 = data['t2'][j].rate;

                    /* $(".market_min_max_"+selectionid).html("Min:"+data['t2'][j].min+" Max:"+data['t2'][j].max);	 */

                    markettype = "6_PLAYER_POKER";


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


    function clearCards() {
        refresh(markettype);
        $("#card_c1").text("");
        $("#card_c2").text("");
        $("#card_c3").text("");
        $("#card_c4").text("");
        $("#card_c5").text("");
        $("#card_c6").text("");
        $("#card_c7").text("");
        $("#card_c8").text("");
        $("#card_c9").text("");
        $("#card_c10").text("");
        $("#card_c11").text("");
        $("#card_c12").text("");
        $("#card_c13").attr("src", site_url + "storage/front/img/cards_new/1.png");
        $("#card_c14").attr("src", site_url + "storage/front/img/cards_new/1.png");
        $("#card_c15").attr("src", site_url + "storage/front/img/cards_new/1.png");
        $("#card_c16").attr("src", site_url + "storage/front/img/cards_new/1.png");
        $("#card_c17").attr("src", site_url + "storage/front/img/cards_new/1.png");
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
            casino_type = "'poker6'";
            data.forEach((runData) => {
                if (parseInt(runData.win) == 11) {
                    ab = "player1";
                    ab1 = "1";

                } else if (parseInt(runData.win) == 12) {
                    ab = "player2";
                    ab1 = "2";

                } else if (parseInt(runData.win) == 13) {
                    ab = "player3";
                    ab1 = "3";

                } else if (parseInt(runData.win) == 14) {
                    ab = "player4";
                    ab1 = "4";

                } else if (parseInt(runData.win) == 15) {
                    ab = "player5";
                    ab1 = "5";

                } else if (parseInt(runData.win) == 16) {
                    ab = "player6";
                    ab1 = "6";

                } else {
                    ab = "playertie";
                    ab1 = "T";

                }

                eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] :
                    runData.mid;
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type +
                    ')" class="ball-runs  ' + ab + ' last-result">' + ab1 + '</span>';
            });
            $("#last-result").html(html);
            if (oldGameId == 0 || oldGameId == resultGameLast) {
                $("#card_c1").text("");
                $("#card_c2").text("");
                $("#card_c3").text("");
                $("#card_c4").text("");
                $("#card_c5").text("");
                $("#card_c6").text("");
                $("#card_c7").text("");
                $("#card_c8").text("");
                $("#card_c9").text("");
                $("#card_c10").text("");
                $("#card_c11").text("");
                $("#card_c12").text("");
                $("#card_c13").attr("src", site_url + "storage/front/img/cards_new/1.png");
                $("#card_c14").attr("src", site_url + "storage/front/img/cards_new/1.png");
                $("#card_c15").attr("src", site_url + "storage/front/img/cards_new/1.png");
                $("#card_c16").attr("src", site_url + "storage/front/img/cards_new/1.png");
                $("#card_c17").attr("src", site_url + "storage/front/img/cards_new/1.png");

            }
        }
    }

    function teenpatti(type) {
        gameType = type
        websocket();
    }
    teenpatti("ok");


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
                            type: '}',
                            color: 'black',
                            card: data[0]
                        }
                        return obj;
                    } else {
                        data = data1;
                        data = data.split('CC');
                        if (data.length > 1) {
                            var obj = {
                                type: ']',
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
        eventType = '6_PLAYER_POKER';
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
                url: 'ajaxfiles/bet_place_6_player_poker.php',
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
        $('a[data-toggle="pill"]').on('shown.bs.tab', function(e) {
            // Hide the previously active tab pane
            $(e.relatedTarget).removeClass('active show');
            // Show the newly active tab pane
            $(e.target).addClass('active show');
        });
    });
    </script>
</body>
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
				include("footer-js.php");
				include("footer-result-popup.php");
			?>

</html>