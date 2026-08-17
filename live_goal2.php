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

.position-relative {
		position: relative !important;
	}

	.detail-page-container {
    display: flex
;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: flex-start;
    align-content: flex-start;
}

.game-market {
    background: #f7f7f7;
    color: #333;
    margin-top: 8px;
}

.market-6 {
    min-width: calc(100% - 8px);
    max-width: calc(100% - 8px);
    margin-left: 4px;
    margin-right: 4px;
    flex: 1;
}

.market-6 {
    min-width: calc(50% - 8px);
    max-width: calc(50% - 8px);
}

.market-title {
    background-color: #2c3e50d9;
    color: #ffffff;
    padding: 8px 10px;
    font-size: 15px;
    font-weight: bold;
    display: flex
;
    flex-wrap: wrap;
    justify-content: space-between;
}

.row {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex
;
    flex-wrap: wrap;
    margin-top: calc(-1* var(--bs-gutter-y));
    margin-right: calc(-.5* var(--bs-gutter-x));
    margin-left: calc(-.5* var(--bs-gutter-x));
}

.market-header {
    display: flex
;
    flex-wrap: wrap;
    align-items: center;
    padding: 0;
}

.market-header, .market-row {
    border-bottom: 0.01em solid #c7c8ca;
}

.col-md-12 {
        flex: 0 0 auto;
        width: 100%;
    }

.market-header, .market-row {
    border-bottom: 0.01em solid #c7c8ca;
}

.market-row {
    background-color: #f2f2f2;
    display: flex
;
    flex-wrap: wrap;
}

.market-nation-detail {
    width: calc(100% - 480px);
    /* display: flex; */
    flex-wrap: wrap;
    justify-content: space-between;
    padding: 0 5px;
    font-size: 14px;
}

.market-nation-detail {
        width: 50%;
    }

	.market-nation-detail {
        font-size: 13px;
    }

    .market-6 .market-nation-detail {
    width: calc(100% - 240px);
    position: relative;
}

.market-6 .market-nation-detail {
        width: calc(100% - 165px);
    }

.ball-by-ball .market-6 .market-nation-detail {
        width: calc(100% - 160px);
    }

    .back {
    background-color: #72bbef !important;
}

.lay {
    background-color: #faa9ba !important;
}

.market-odd-box {
    width: 80px;
    /* padding: 2px 0; */
    display: flex
;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    border-left: 1px solid #c7c8ca;
    cursor: pointer;
    min-height: 35px;
}

.market-odd-box {
        width: 55px;
    }

    .market-header .market-odd-box {
    min-height: 28px;
}

.market-header .market-odd-box b {
    font-size: 16px;
}

.col-md-4 {
        flex: 0 0 auto;
        width: 33.33333333%;
    }

    .fancy-min-max-box {
    width: 80px;
    padding: 0 5px;
    text-align: right;
}

.fancy-min-max-box {
        width: 55px;
    }

  /*   .fancy-min-max-box {
        width: 80px;
    } */

    .fancy-min-max {
    font-size: 12px;
    font-weight: bold;
    color: #097c93;
    word-break: break-all;
    border: unset !important;
    padding: unset !important;
}

.fancy-min-max {
        font-size: 9px;
    }

    .col-md-12 {
        flex: 0 0 auto;
        width: 100%;
    }

    .fancy-market {
    border-bottom: 1px solid #c7c8ca;
}

.market-row {
    background-color: #f2f2f2;
    display: flex
;
    flex-wrap: wrap;
}

.fancy-market .market-row {
    border-bottom: 0;
}

.market-nation-detail .market-nation-name {
    font-weight: 400;
    max-width: 100%;
    width: 100%;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    display: inline-block;
}

.market-6 .market-nation-detail .market-nation-name {
    white-space: normal;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    max-width: calc(100% - 50px);
}

.ball-by-ball .market-6 .market-nation-detail .market-nation-name {
    max-width: 100%;
}

.market-6 {
    min-width: calc(50% - 8px);
    max-width: calc(50% - 8px);
}

.casino-remark-div {
    padding: 0 5px;
    color: var(--text-info);
    font-weight: bold;
    font-size: 12px;
    max-width: 100%;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    display: inline-block;
    width: 100%;
}

.casino-remark-div {
    display: flex
;
    align-items: center;
    flex-wrap: wrap;
    background-color: #086f3f;
    color: #fff;
}

.casino-remark-div .remark-icon {
    width: 50px;
    display: flex
;
    display: -webkit-flex;
    justify-content: center;
    align-items: center;
    height: 32px;
    border-top-left-radius: 16px;
    border-bottom-left-radius: 16px;
    background-color: #086f3f;
}

img, svg {
    vertical-align: middle;
}

.casino-remark-div marquee {
    width: calc(100% - 60px);
    float: right;
    padding-left: 10px;
    font-size: 12px !important;
    font-style: unset !important;
    position: unset !important;
    color: white;
}

.casino-remark-div .remark-icon img {
    height: 20px;
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
    height: 41px;
    align-items: center;
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
    display: flex
;
    justify-content: center;
    align-items: center;
    pointer-events: none;
}

    @keyframes zoom-in-zoom-out {

        /* At the beginning of the animation */
        0% {
            /* Scale the element to its original size */
            transform: scale(1, 1);
        }

        /* At the middle of the animation */
        50% {
            /* Scale the element to 1.5 times its original size */
            transform: scale(1.5, 1.5);
        }

        /* At the end of the animation */
        100% {
            /* Scale the element back to its original size */
            transform: scale(1, 1);
        }
    }

    .goal .suspended:after {
        width: 100%;
    }

    .ball-by-ball-popup span,
    .result-image span {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
        font-size: 32px;
    }

    .ball-by-ball-popup {
        position: absolute;
        top: 45%;
        left: 50%;
        margin-left: -70px;
        margin-top: -50px;
    }

    .cricket20ballpopup {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-left: -50px;
        margin-top: -50px;
        z-index: 10;
    }

    .cricket20ballpopup {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-left: -75px;
        margin-top: -75px;
        z-index: 10;
        animation: zoom-in-zoom-out 1s ease;
        -webkit-animation: zoom-in-zoom-out 1s ease;
        animation-iteration-count: 1;
    }

    .market-odd-box .market-odd {
        font-size: 15px;
        font-weight: bold;
        margin-bottom: 3px;
        line-height: 1;
    }

    .market-odd-box .market-volume {
        font-size: 11px;
        line-height: 1;
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
                            <div class="row row5 goal">
                                <div class="col-md-9 casino-container coupon-card featured-box-detail">
                                    <div class="coupon-card">
                                        <div class="game-heading"><span class="card-header-title">
                                                GOAL 2
                                                <!-- <small role="button" class="teenpatti-rules"  onclick="view_rules('tt_cards_rule.jpg')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small>  --><!----></span>
                                                <small role="button" class="teenpatti-rules"  onclick="view_rules('goal2')" data-target="#rules_popup" data-toggle="modal"  tabindex="0"><u>Rules</u></small>
                                                <span class="float-right">
                                                Round ID:
                                                <span class="round_no">0</span><!--  | Min:
                                                <span>100</span> | Max:
                                                <span>500000</span></span> -->
                                            </div>
                                                    <!---->
                                                 <div class="video-container">
                                                                                            <?php
                                                    if(!empty(IFRAME_URL_SET)){
                                                                                ?>
                                                                                <iframe class="iframedesign" src="https://stream.trubets365.com/?id=goal2" width="100%" height="200px" style="border: 0px;"></iframe>
                                                                                <?php
                                                                                    
                                                                                }else{
                                                                                    ?>
                                                                                    <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                                                                    <?php

                                                                                }
                                                                                ?>
                                        <!-- <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe> -->
                                            <!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL;
                                                            echo GOAL_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
                                            <div class="cricket20ballpopup goal-result" style="display : none;"><img src="storage/img/soccer-ball.png"  style="height: 250px;"><span id="ball_run" >asFGsdgsdfg</span></div>
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
                                           <!--  <div data-v-73ba2763="" class="ball-by-ball-popup" style="display:none;"><img data-v-73ba2763="" src="/storage/img/ball-blank.png"> <span data-v-73ba2763="">0 Run</span></div> -->
                                        </div>
                                        <div class="casino-detail detail-page-container position-relative">
                                            <div class="game-market market-6">
                                                <div class="market-title">Who Will Goal Next?</div>
                                                <div class="market-header row">
                                                    <div class="col-12 col-md-12 d-none d-md-block">
                                                        <div class="market-row">
                                                        <div class="market-nation-detail"></div>
                                                        <div class="market-odd-box back"><b>Back</b></div>
                                                        <div class="market-odd-box lay"><b>Lay</b></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="market-body row">
                                                    <?
                                                    $sid_list = array(
                                                    "Cristiano Ronaldo" => 1,
                                                    "Lionel Messi" => 2,
                                                    "Robert Lewandowski" => 3,
                                                    "Karim Benzema" => 4,
                                                    "Edinson Cavani" => 5,
                                                    "Luis Suarez" => 6,
                                                    "Neymar" => 7,
                                                    "Sergio Aguero" => 8,
                                                    "Olivier Giroud" => 9,
                                                    "Mohamed Salahl" => 10,
                                                    "Kylian Mbappe" => 11,
                                                    "No Goal" => 12,
                                                    );
                                                    foreach ($sid_list as $key => $val) {
                                                    ?>
                                                    <div class="col-12 col-md-12">
                                                        <div class="fancy-market">
                                                        <div class="market-row">
                                                            <div class="market-nation-detail">
                                                                <span class="market-nation-name pointer"><? echo $key; ?></span>
                                                                <p style="color: black;" class="market_<? echo $val; ?>_b_exposure market_exposure">0</p>
                                                            </div>
                                                            <div class=" blb-box">
                                                                <div class="market-odd-box back market_<? echo $val; ?>_b_btn"><span class="market-odd">-</span></div>
                                                            </div>
                                                            <div class=" blb-box">
                                                                <div class="market-odd-box lay market_<? echo $val; ?>_l_btn">
                                                                    <span class="market-odd">-</span></div>
                                                            </div>
                                                            <div class="fancy-min-max-box">
                                                                <div class="fancy-min-max"><span class="w-100 d-block min-max market_<? echo $val; ?>_min_max"> </span></div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <?
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                            <div class="game-market market-6">
                                                <div class="market-title">Method Of Next Goal</div>
                                                <div class="market-header row">
                                                    <div class="col-12 col-md-12 d-none d-md-block">
                                                        <div class="market-row">
                                                        <div class="market-nation-detail"></div>
                                                        <div class="market-odd-box back"><b>Back</b></div>
                                                        <div class="market-odd-box lay"><b>Lay</b></div>
                                                        </div>
                                                        <div class="fancy-min-max-box"></div>
                                                    </div>
                                                </div>
                                                <div class="market-body row">
                                                    <?
                                                    $sid_list = array(
                                                    "Shot Goal" => 21,
                                                    "Header Goal" => 22,
                                                    "Penalty Goal" => 23,
                                                    "Free Kick Goal" => 24,
                                                    "No Goal" => 25,
                                                    );
                                                    foreach ($sid_list as $key => $val) {
                                                    ?>
                                                    <div class="col-12 col-md-12">
                                                        <div class="fancy-market">
                                                        <div class="market-row">
                                                            <div class="market-nation-detail">
                                                                <span class="market-nation-name pointer"><? echo $key; ?></span>
                                                                <p style="color: black;" class="market_<? echo $val; ?>_b_exposure market_exposure">0</p>
                                                            </div>
                                                            <div class=" blb-box">
                                                                <div class="market-odd-box back market_<? echo $val; ?>_b_btn "><span class="market-odd">-</span></div>
                                                            </div>
                                                            <div class=" blb-box">
                                                                <div class="market-odd-box lay market_<? echo $val; ?>_l_btn "><span class="market-odd">-</span></div>
                                                            </div>
                                                            <div class="fancy-min-max-box">
                                                                <div class="fancy-min-max"><span class="w-100 d-block min-max market_<? echo $val; ?>_min_max"> </span></div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <?
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="game-market market-12">
                                                <div class="market-title">Method Of Combination Goal</div>
                                                <div class="market-header row">
                                                    <div class="col-12 col-md-6 ">
                                                        <div class="market-row">
                                                        <div class="market-nation-detail"></div>
                                                        <div class="market-odd-box back"><b>Back</b></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-6">
                                                        <div class="market-row">
                                                            <div class="market-nation-detail"></div>
                                                            <div class="market-odd-box back"><b>Back</b></div>
                                                        </div>
                                                    </div>
                                                    <div class="fancy-min-max-box"></div>
                                                    
                                                </div>
                                                
                                                <div class="market-body row">
                                                    <?
                                                   $sid_list = array(
                                                    "Cristiano Ronaldo and Shot Goal" => 121,
                                                    "Lionel Messi and Shot Goal" => 221,
                                                    "Robert Lewandowski and Shot Goal" => 321,
                                                    "Karim Benzema and Shot Goal" => 421,
                                                    "Edinson Cavani and Shot Goal" => 521,
                                                    "Luis Suarez and Shot Goal" => 621,
                                                    "Neymar and Shot Goal" => 721,
                                                    "Sergio Aguero and Shot Goal" => 821,
                                                    "Olivier Giroud and Shot Goal" => 921,
                                                    "Mohamed Salah and Shot Goal" => 1021,
                                                    "Kylian Mbappe and Shot Goal" => 1121,

                                                    "Cristiano Ronaldo and Header Goal" => 122,
                                                    "Lionel Messi and Header Goal" => 222,
                                                     "Robert Lewandowski and Header Goal" => 322,
                                                     "Karim Benzema and Header Goal" => 422,
                                                     "Edinson Cavani and Header Goal" => 522,
                                                     "Luis Suarez and Header Goal" => 622,
                                                     "Neymar and Header Goal" => 722,
                                                      "Sergio Aguero and Header Goal" => 822,
                                                      "Olivier Giroud and Header Goal" => 922,
                                                      "Mohamed Salah and Header Goal" => 1022,
                                                      "Kylian Mbappe and Header Goal" => 1122,

                                                    "Cristiano Ronaldo and Penalty Goal" => 123,
                                                    "Lionel Messi and Penalty Goal" => 223,
                                                     "Robert Lewandowski and Penalty Goal" => 323,
                                                     "Karim Benzema and Penalty Goal" => 423,
                                                     "Edinson Cavani and Penalty Goal" => 523,
                                                      "Luis Suarez and Penalty Goal" => 623,
                                                      "Neymar and Penalty Goal" => 723,
                                                      "Sergio Aguero and Penalty Goal" => 823,
                                                      "Olivier Giroud and Penalty Goal" => 923,
                                                       "Mohamed Salah and Penalty Goal" => 1023,
                                                       "Kylian Mbappe and Penalty Goal" => 1123,

                                                    "Cristiano Ronaldo and Free Kick Goal" => 124,
                                                    "Lionel Messi and Free Kick Goal" => 224,
                                                    "Robert Lewandowski and Free Kick Goal" => 324,
                                                    "Karim Benzema and Free Kick Goal" => 424,
                                                    "Edinson Cavani and Free Kick Goal" => 524,
                                                     "Luis Suarez and Free Kick Goal" => 624,
                                                     "Neymar and Free Kick Goal" => 724,
                                                      "Sergio Aguero and Free Kick Goal" => 824,
                                                      "Olivier Giroud and Free Kick Goal" => 924,
                                                      "Mohamed Salah and Free Kick Goal" => 1024,
                                                      "Kylian Mbappe and Free Kick Goal" => 1124,

                                                    "Cristiano Ronaldo and No Goal" => 125,
                                                     "Lionel Messi and No Goal" => 225,
                                                     "Robert Lewandowski and No Goal" => 325,
                                                    "Karim Benzema and No Goal" => 425,
                                                   "Edinson Cavani and No Goal" => 525,
                                                     "Luis Suarez and No Goal" => 625,
                                                   "Neymar and No Goal" => 725,
                                                    "Sergio Aguero and No Goal" => 825,
                                                     "Olivier Giroud and No Goal" => 925,
                                                    "Mohamed Salah and No Goal" => 1025,
                                                    "Kylian Mbappe and No Goal" => 1125,
                                                );
                                                foreach ($sid_list as $key => $val) {
                                                    ?>
                                                    <div class="col-12 col-md-6">
                                                        <div class="fancy-market">
                                                        <div class="market-row">
                                                            <div class="market-nation-detail">
                                                                <span class="market-nation-name pointer"><? echo $key; ?></span>
                                                                <p style="color: black;" class="market_<? echo $val; ?>_b_exposure market_exposure">0</p>
                                                            </div>
                                                            <div class=" blb-box">
                                                                <div class="market-odd-box back market_<? echo $val; ?>_b_btn "><span class="market-odd">-</span></div>
                                                            </div>
                                                            <div class="fancy-min-max-box">
                                                                <div class="fancy-min-max"><span class="w-100 d-block min-max market_<? echo $val; ?>_min_max"> </span></div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <?
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                           <!--  <div class="mt-1 casino-remark-div">
                                                <div class="remark-icon">
                                                    <img src="https://versionobj.ecoassetsservice.com/v33/static/front/img/icons/remark.png">
                                                </div>
                                                <marquee class="casino-remark" scrollamount="3">Results are based on stream&nbsp;only</marquee>
                                            </div> -->
                                            <div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=goal2">View All</a></span></div>
                                        	<div class="casino-last-results" id="last-result">
                                                <!-- <span class="result result-b">B</span><span class="result result-b">B</span><span class="result result-a">A</span><span class="result result-b">B</span><span class="result result-b">B</span><span class="result result-a">A</span><span class="result result-b">B</span><span class="result result-a">A</span><span class="result result-a">A</span><span class="result result-a">A</span> -->
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
    <script type="text/javascript" src='footer-js.js?4'></script>

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
        var markettype = "GOAL2";
        var markettype_2 = markettype;
        var back_html = "";
        var lay_html = "";
        var gstatus = "";
        var data6;
        var last_result_id = '0';

        function websocket(type) {
            socket = io.connect(websocketurl, {
                transports: ['websocket', 'polling']
            });
            socket.on('connect', function() {
                socket.emit('Room', 'goal2');
            });
            socket.on('gameIframe', function(data) {
                $("#casinoIframe").attr('src', data);
            });
            socket.on('game', function(data) {
               
                var data=data;
                if (data && data['t1'] && data['t1']['mid']) {
                    data['t1'][0] = data['t1'];
                }
                if (data && data['t1'] && data['t1'][0]) {
                    if (data.t1[0].rdesc != "") {
                        $("#ball_run").text(data.t1[0].rdesc);
                        $(".cricket20ballpopup").show();
                    } else {
                        $("#ball_run").html("");
                        $(".cricket20ballpopup").hide();
                    }
                    if (oldGameId != data.t1[0].mid && data.t1[0].mid != 0 && data.t1[0].mid != "0") {
                        setTimeout(function() {
                            clearCards();
                        }, <?php echo CASINO_RESULT_TIMEOUT; ?>);
                    }
                    oldGameId = data.t1[0].mid;
                    if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                        $(".casino-remark").text(data.t1[0].remark);
                    }
                    clock.setValue(data.t1[0].lt);
                    $(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid);
                    /*  $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]); */
                    eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid;

                    for (var j in data['t1'][0]['sub']) {
                        selectionid = parseInt(data['t1'][0]['sub'][j].sid);
                        runner = data['t1'][0]['sub'][j].nat || data['t1'][0]['sub'][j].nation || data['t1'][0]['sub'][j].nat || data['t1'][0]['sub'][j].nation;
                        b1 = data['t1'][0]['sub'][j].b;
                        bs1 = data['t1'][0]['sub'][j].bs;
                        l1 = data['t1'][0]['sub'][j].l;
                        ls1 = data['t1'][0]['sub'][j].ls;

                        b11 = b1;
                        markettype = "GOAL2";

                        b1 = b1 == 0 ? "" : b1;
                        bs1 = bs1 == 0 ? "" : bs1;

                        l1 = l1 == 0 ? "" : l1;
                        ls1 = ls1 == 0 ? "" : ls1;


                        /* back_html = '<span class="odd d-block">' + b1 + '</span><span class="d-block">' + bs1 + '</span>'; */
                        back_html = '<div class="market-odd-box"><span class="market-odd">' + b1 + '</span><span class="market-volume">' + bs1 + '</span></div>';


                        $(".market_" + selectionid + "_b_btn").html(back_html);

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

                         lay_html = '<div class="market-odd-box"><span class="market-odd">' + l1 + '</span><span class="market-volume">' + ls1 + '</span></div>';


                    $(".market_" + selectionid + "_l_btn").html(lay_html);

                    $(".market_" + selectionid + "_l_btn").attr("side", "Back");
                    $(".market_" + selectionid + "_l_btn").attr("selectionid", selectionid);
                    $(".market_" + selectionid + "_l_btn").attr("marketid", selectionid);
                    $(".market_" + selectionid + "_l_btn").attr("runner", runner);
                    $(".market_" + selectionid + "_l_btn").attr("marketname", runner);
                    $(".market_" + selectionid + "_l_btn").attr("eventid", eventId);
                    $(".market_" + selectionid + "_l_btn").attr("markettype", markettype);
                    $(".market_" + selectionid + "_l_btn").attr("event_name", markettype);
                    $(".market_" + selectionid + "_l_btn").attr("fullmarketodds", b1);
                    $(".market_" + selectionid + "_l_btn").attr("fullfancymarketrate", b1);
                    $(".market_" + selectionid + "_l_btn").attr("fullmarketodds", l1);
                    $(".market_" + selectionid + "_l_btn").attr("fullfancymarketrate", l1);


                        gstatus = data['t1'][0]['sub'][j].gstatus.toString();
                        if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {
                            $(".market_" + selectionid + "_b_btn").attr("data-title", 'suspended-box');
                            $(".market_" + selectionid + "_b_btn").addClass("suspended-box");
                            $(".market_" + selectionid + "_b_btn").removeClass("back-1");
                            $(".market_" + selectionid + "_b_btn").addClass("betting-disabled");

                            $(".market_" + selectionid + "_l_btn").attr("data-title", 'suspended-box');
                            $(".market_" + selectionid + "_l_btn").addClass("suspended-box");
                            $(".market_" + selectionid + "_l_btn").removeClass("lay-1");
                            $(".market_" + selectionid + "_l_btn").addClass("betting-disabled");
                        } else {

                            $(".market_" + selectionid + "_b_btn").removeAttr("data-title");
                            $(".market_" + selectionid + "_b_btn").removeClass("suspended-box");
                            $(".market_" + selectionid + "_b_btn").addClass("back-1");
                            $(".market_" + selectionid + "_b_btn").removeClass("betting-disabled");

                             $(".market_" + selectionid + "_l_btn").removeAttr("data-title");
                            $(".market_" + selectionid + "_l_btn").removeClass("suspended-box");
                            $(".market_" + selectionid + "_l_btn").addClass("lay-1");
                            $(".market_" + selectionid + "_l_btn").removeClass("betting-disabled");
                        }
                        /*  $(".market_" + selectionid + "_b_btn").removeClass("back-1"); */
                        min = data['t1'][0]['sub'][j].min.toString();
                        max = data['t1'][0]['sub'][j].max;
                        max = max / 1000;
                        $(".market_" + selectionid + "_min_max").html(`
                                Min:<span>${min}</span><br>Max:<span>${max}K</span>
                        `);
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


        }

        function updateResult(data) {
            
            
            if (data && data[0]) {
                resultGameLast = data[0].mid;

                if (last_result_id != resultGameLast) {
                    last_result_id = resultGameLast;

                }

                html = "";
                var ab = "";
                var ab1 = "";
                casino_type = "'goal2'";
                data.forEach((runData) => {
                    ab = "R";
                    ab1 = "R";


                    eventId = runData.mid == 0 ? 0 : runData.mid;
                    html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs  ' + ab + ' last-result">' + ab1 + '</span>';
                });
                $("#last-result").html(html);
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
            $(".placeBet").attr('disabled', true);
            $(".placeBet").removeAttr("id", "placeBet");
            var last_place_bet = "";
            bet_stake_side = $("#bet_stake_side").val();
            bet_type = bet_stake_side;
            bet_event_id = $("#bet_event_id").val();
            bet_marketId = $("#bet_marketId").val();
            oddsmarketId = bet_marketId;
            eventType = 'GOAL2';
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
                    url: 'ajaxfiles/bet_place_goal2.php',
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
                            toastr.clear()
                            toastr.warning("", message, {
                                "timeOut": "3000",
                                "iconClass":"toast-warning",
                                "positionClass":"toast-top-center",
                                "extendedTImeout": "0"
                            });
                            /* $("#bet-error-class").addClass("b-toast-danger"); */
                        }
                        /* error_message_text = message;
                        $("#errorMsgText").text(error_message_text);
                        $("#errorMsg").fadeIn('fast').delay(3000).hide(0); */
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
    include("footer-js.php");
    include("footer-result-popup.php");
    ?>

</html>