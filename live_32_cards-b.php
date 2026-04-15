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
    display: flex
;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-top: 5px;
}

.casino-table-box {
    width: 100%;
    display: flex
;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: flex-start;
}

.casino-table-left-box, .casino-table-center-box, .casino-table-right-box {
    width: 49%;
    border-left: 1px solid #c7c8ca;
    border-right: 1px solid #c7c8ca;
    border-top: 1px solid #c7c8ca;
    background-color: #f2f2f2;
}

.casino-table-header, .casino-table-row {
    display: flex
;
    flex-wrap: wrap;
    justify-content: space-between;
    border-bottom: 1px solid #c7c8ca;
}

.casino-nation-detail {
    display: flex
;
    align-items: flex-start;
    flex-direction: column;
    flex-wrap: wrap;
    justify-content: center;
    padding-left: 5px;
    min-height: 46px;
}

.casino-table-header .casino-nation-detail {
    font-weight: bold;
    min-height: unset;
}

.casino-nation-detail {
    width: 60%;
}

.casino-odds-box {
    display: flex
;
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

.casino-table-header .casino-odds-box {
    cursor: unset;
    padding: 2px;
    min-height: unset;
    height: 28px !important;
}

 .casino-odds-box {
    width: 20%;
}

.casino-nation-book {
    font-size: 12px;
    font-weight: bold;
    min-height: 18px;
}

.back {
    background-color: #72bbef !important;
}

.lay {
    background-color: #faa9ba !important;
}

.casino-nation-name {
    font-size: 16px;
    font-weight: bold;
}

.casino-odds {
    font-size: 18px;
    font-weight: bold;
    line-height: 1;
}

.casino-table-box-divider {
    background-color: #c7c8ca;
    width: 2px;
}

.cards32total .casino-odds-box {
    height: 69px;
    width: 40%;
}

.casino-table-full-box {
    width: 100%;
    border-left: 1px solid #c7c8ca;
    border-right: 1px solid #c7c8ca;
    border-top: 1px solid #c7c8ca;
    background-color: #f2f2f2;
}

.card32numbers-container {
    display: flex
;
    flex-wrap: wrap;
}

.card32numbers-container .casino-odds-box {
    border-bottom: 1px solid #c7c8ca;
}

.card32numbers .casino-odds {
    font-family: Casino;
    font-size: 48px;
    height: 40px;
    line-height: 40px;
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

.casino-last-result-title {
    padding: 10px;
    background-color:  var(--theme2-bg);
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
                            <div class="row row5 card32eu-container casino-32B">
                                <div class="col-md-9 coupon-card featured-box-detail">
                                    <div class="coupon-card">
                                        <div class="game-heading"><span class="card-header-title">32 Cards- B
                        <!-- <small role="button" class="teenpatti-rules"  onclick="view_rules('tt_cards_rule.jpg')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small> -->
						 <!----></span> 
						 <small role="button" class="teenpatti-rules"  onclick="view_rules('32cards_b')" data-target="#rules_popup" data-toggle="modal"  tabindex="0"><u>Rules</u></small> 
						 <span class="float-right">
                        Round ID:
                        <span class="round_no"> 0</span></span>
                                        </div>
                                        <!---->
                                        <div class="video-container">
										<?php
  if(!empty(IFRAME_URL_SET)){
                               ?>
                               <iframe class="iframedesign" src="<?php echo IFRAME_URL."".A32CARDSB_CODE;?>" width="100%" height="200px" style="border: 0px;"></iframe>
                               <?php
                                
                            }else{
                                ?>
                                <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                <?php

                            }
                            ?>
										<!--	<iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                           	 <iframe class="iframedesign" src="<?php echo IFRAME_URL; echo A32CARDSB_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
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
                                                <div>
                                                    <div class="videoCards">
                                                        <div>
                                                            <p class="m-b-0 text-white"><b><span class="" id="player_1_value">Player 8</span>
                      :
                      <span class="text-warning" id="card_1_value"></span></b></p>
                                                            <div>
																<img id="cards_0" src="storage/front/img/cards_new/1.png">
																<img id="cards_4" style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_8"  style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_12"  style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_16"  style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_20" style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_24"  style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_28"  style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_32"  style="display:none;" src="storage/front/img/cards_new/1.png">
															</div>
                                                        </div>
                                                        <div>
                                                            <p class="m-b-0 text-white"><b><span class="" id="player_2_value">Player 9</span>
                      :
                      <span class="text-warning" id="card_2_value"></span></b></p>
                                                            <div>
																<img id="cards_1" src="storage/front/img/cards_new/1.png">
																<img id="cards_5" style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_9"  style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_13"  style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_17"  style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_21" style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_25"  style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_29"  style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_33"  style="display:none;" src="storage/front/img/cards_new/1.png">
															</div>
															
                                                        </div>
                                                        <div>
                                                            <p class="m-b-0 text-white"><b><span class="" id="player_3_value">Player 10</span>
                      :
                      <span class="text-warning" id="card_3_value"></span></b></p>
                                                            <div>
																
																<img id="cards_2" src="storage/front/img/cards_new/1.png">
																<img id="cards_6" style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_10"  style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_14"  style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_18"  style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_22" style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_26"  style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_30"  style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_34"  style="display:none;" src="storage/front/img/cards_new/1.png">
																
															</div>
                                                        </div>
                                                        <div>
                                                            <p class="m-b-0 text-white"><b><span class="" id="player_4_value">Player 11</span>
                      :
                      <span class="text-warning" id="card_4_value"></span></b></p>
                                                            <div>
																<img id="cards_3" src="storage/front/img/cards_new/1.png">
																<img id="cards_7" style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_11"  style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_15"  style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_19"  style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_23" style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_27"  style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_31"  style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_35"  style="display:none;" src="storage/front/img/cards_new/1.png">
															</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="casino-detail">
											<div class="casino-table">
												<div class="casino-table-box">
													<div class="casino-table-left-box">
														<div class="casino-table-header">
														<div class="casino-nation-detail"></div>
														<div class="casino-odds-box back">Back</div>
														<div class="casino-odds-box lay">Lay</div>
														</div>
														<div class="casino-table-body">
														<div class="casino-table-row">
															<div class="casino-nation-detail">
																<div class="casino-nation-name">Player 8</div>
																<div class="casino-nation-book market_1_b_exposure market_exposure"></div>
															</div>
															<div class="casino-odds-box back suspended-box back-1  market_1_row market_1_b_btn"><span class="casino-odds">0</span></div>
															<div class="casino-odds-box lay suspended-box lay-1  market_1_row market_1_l_btn"><span class="casino-odds">0</span></div>
														</div>
														<div class="casino-table-row">
															<div class="casino-nation-detail">
																<div class="casino-nation-name">Player 9</div>
																<div class="casino-nation-book market_2_b_exposure market_exposure"></div>
															</div>
															<div class="casino-odds-box back suspended-box back-1  market_2_row market_2_b_btn"><span class="casino-odds">0</span></div>
															<div class="casino-odds-box lay suspended-box lay-1  market_2_row market_2_l_btn"><span class="casino-odds">0</span></div>
														</div>
														<div class="casino-table-row">
															<div class="casino-nation-detail">
																<div class="casino-nation-name">Player 10</div>
																<div class="casino-nation-book market_3_b_exposure market_exposure"></div>
															</div>
															<div class="casino-odds-box back suspended-box back-1 market_3_row market_3_b_btn"><span class="casino-odds">0</span></div>
															<div class="casino-odds-box lay suspended-box lay-1  market_3_row market_3_l_btn"><span class="casino-odds">0</span></div>
														</div>
														<div class="casino-table-row">
															<div class="casino-nation-detail">
																<div class="casino-nation-name">Player 11</div>
																<div class="casino-nation-book market_4_b_exposure market_exposure"></div>
															</div>
															<div class="casino-odds-box back suspended-box back-1 market_4_row market_4_b_btn"><span class="casino-odds">0</span></div>
															<div class="casino-odds-box lay suspended-box lay-1  market_4_row market_4_l_btn"><span class="casino-odds">0</span></div>
														</div>
														</div>
													</div>
													<div class="casino-table-box-divider"></div>
													<div class="casino-table-right-box">
														<div class="casino-table-header">
														<div class="casino-nation-detail"></div>
														<div class="casino-odds-box back">Odd</div>
														<div class="casino-odds-box back">Even</div>
														</div>
														<div class="casino-table-body">
														<div class="casino-table-row ">
															<div class="casino-nation-detail">
																<div class="casino-nation-name">Player 8</div>
															</div>
															<div class="casino-odds-box back suspended-box back-1  market_6_row market_6_b_btn"><span class="casino-odds">0</span><div class="casino-nation-book market_6_b_exposure market_exposure"></div></div>
															<div class="casino-odds-box back suspended-box back-1  market_5_row market_5_b_btn"><span class="casino-odds">0</span><div class="casino-nation-book market_5_b_exposure market_exposure"></div></div>
														</div>
														<div class="casino-table-row">
															<div class="casino-nation-detail">
																<div class="casino-nation-name">Player 9</div>
															</div>
															<div class="casino-odds-box back suspended-box back-1 market_8_row market_8_b_btn"><span class="casino-odds">0</span><div class="casino-nation-book market_8_b_exposure market_exposure"></div></div>
															<div class="casino-odds-box back suspended-box back-1 market_7_row market_7_b_btn"><span class="casino-odds">0</span><div class="casino-nation-book market_7_b_exposure market_exposure"></div></div>
														</div>
														<div class="casino-table-row">
															<div class="casino-nation-detail">
																<div class="casino-nation-name">Player 10</div>
															</div>
															<div class="casino-odds-box back suspended-box back-1 market_10_row market_10_b_btn"><span class="casino-odds">0</span><div class="casino-nation-book market_10_b_exposure market_exposure"></div></div>
															<div class="casino-odds-box back suspended-box back-1 market_9_row market_9_b_btn"><span class="casino-odds">0</span><div class="casino-nation-book market_9_b_exposure market_exposure"></div></div>
														</div>
														<div class="casino-table-row">
															<div class="casino-nation-detail">
																<div class="casino-nation-name">Player 11</div>
															</div>
															<div class="casino-odds-box back suspended-box back-1 market_12_row market_12_b_btn"><span class="casino-odds">0</span><div class="casino-nation-book market_12_b_exposure market_exposure"></div></div>
															<div class="casino-odds-box back suspended-box back-1 market_11_row market_11_b_btn"><span class="casino-odds">0</span><div class="casino-nation-book market_11_b_exposure market_exposure"></div></div>
														</div>
														</div>
													</div>
												</div>
												<div class="casino-table-box mt-3">
													<div class="casino-table-left-box">
														<div class="casino-table-header">
														<div class="casino-nation-detail"></div>
														<div class="casino-odds-box back">Back</div>
														<div class="casino-odds-box lay">Lay</div>
														</div>
														<div class="casino-table-body">
														<div class="casino-table-row">
															<div class="casino-nation-detail">
																<div class="casino-nation-name">Any 3 Card Black</div>
																<div class="casino-nation-book market_13_b_exposure market_exposure"></div>
															</div>
															<div class="casino-odds-box back suspended-box back-1  market_13_row market_13_b_btn"><span class="casino-odds">0</span></div>
															<div class="casino-odds-box lay suspended-box lay-1  market_13_row market_13_l_btn"><span class="casino-odds">0</span></div>
														</div>
														<div class="casino-table-row">
															<div class="casino-nation-detail">
																<div class="casino-nation-name">Any 3 Card Red</div>
																<div class="casino-nation-book market_14_b_exposure market_exposure"></div>
															</div>
															<div class="casino-odds-box back suspended-box back-1  market_14_row market_14_b_btn"><span class="casino-odds">0</span></div>
															<div class="casino-odds-box lay suspended-box lay-1   market_14_row market_14_l_btn"><span class="casino-odds">0</span></div>
														</div>
														<div class="casino-table-row">
															<div class="casino-nation-detail">
																<div class="casino-nation-name">Two Black Two Red</div>
																<div class="casino-nation-book market_27_b_exposure market_exposure"></div>
															</div>
															<div class="casino-odds-box back suspended-box back-1  market_27_row market_27_b_btn"><span class="casino-odds market_27_b_val">0</span></div>
															<div class="casino-odds-box lay suspended-box lay-1  market_27_row market_27_l_btn"><span class="casino-odds market_27_l_val">0</span></div>
														</div>
														</div>
													</div>
													<div class="casino-table-box-divider"></div>
													<div class="casino-table-right-box cards32total">
														<div class="casino-table-header">
														<div class="casino-nation-detail"></div>
														<div class="casino-odds-box back">Back</div>
														</div>
														<div class="casino-table-body">
														<div class="casino-table-row ">
															<div class="casino-nation-detail">
																<div class="casino-nation-name">8 &amp; 9 Total</div>
																<div class="casino-nation-book market_25_b_exposure market_exposure"></div>
															</div>
															<div class="casino-odds-box back suspended-box back-1  market_25_row market_25_b_btn"><span class="casino-odds market_25_b_val">0</span></div>
														</div>
														<div class="casino-table-row">
															<div class="casino-nation-detail">
																<div class="casino-nation-name">10 &amp; 11 Total</div>
																<div class="casino-nation-book market_26_b_exposure market_exposure"></div>
															</div>
															<div class="casino-odds-box back suspended-box back-1  market_26_row market_26_b_btn"><span class="casino-odds market_26_b_val">0</span></div>
														</div>
														</div>
													</div>
												</div>
												<div class="casino-table-full-box mt-3 card32numbers">
													<h4 class="w-100 text-center mb-2"><b class="market_15_b_val">0</b></h4>
													<div class="card32numbers-container">
														<div class="casino-odds-box back suspended-box back-1  market_15_row market_15_b_btn"><span class="casino-odds">1</span><div class="casino-nation-book market_15_b_exposure market_exposure"></div></div>
														<div class="casino-odds-box back suspended-box back-1  market_16_row market_16_b_btn"><span class="casino-odds">2</span><div class="casino-nation-book market_16_b_exposure market_exposure"></div></div>
														<div class="casino-odds-box back suspended-box back-1 market_17_row market_17_b_btn"><span class="casino-odds">3</span><div class="casino-nation-book market_17_b_exposure market_exposure"></div></div>
														<div class="casino-odds-box back suspended-box back-1 market_18_row market_18_b_btn"><span class="casino-odds">4</span><div class="casino-nation-book market_18_b_exposure market_exposure"></div></div>
														<div class="casino-odds-box back suspended-box back-1 market_19_row market_19_b_btn"><span class="casino-odds">5</span><div class="casino-nation-book market_19_b_exposure market_exposure"></div></div>
														<div class="casino-odds-box back suspended-box back-1 market_20_row market_20_b_btn"><span class="casino-odds">6</span><div class="casino-nation-book market_20_b_exposure market_exposure"></div></div>
														<div class="casino-odds-box back suspended-box back-1 market_21_row market_21_b_btn"><span class="casino-odds">7</span><div class="casino-nation-book market_21_b_exposure market_exposure"></div></div>
														<div class="casino-odds-box back suspended-box back-1 market_22_row market_22_b_btn"><span class="casino-odds">8</span><div class="casino-nation-book market_22_b_exposure market_exposure"></div></div>
														<div class="casino-odds-box back suspended-box back-1 market_23_row market_23_b_btn"><span class="casino-odds">9</span><div class="casino-nation-book market_23_b_exposure market_exposure"></div></div>
														<div class="casino-odds-box back suspended-box back-1 market_24_row market_24_b_btn"><span class="casino-odds">0</span><div class="casino-nation-book market_24_b_exposure market_exposure"></div></div>
													</div>
												</div>
											</div>
											<div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=card32eu">View All</a></span></div>
											<div class="casino-last-results" id="last-result">
												<!-- <span class="result result-b">11</span><span class="result result-b">11</span><span class="result result-b">8</span><span class="result result-b">11</span><span class="result result-b">8</span><span class="result result-b">11</span><span class="result result-b">8</span><span class="result result-b">8</span><span class="result result-b">11</span><span class="result result-b">10</span> -->
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

   <script type="text/javascript">
   
   $(function () { 
		var header = $("#sidebar-right"); 
		$(window).scroll(function () { 
			var scroll = $(window).scrollTop(); 
		
			if (scroll >= $(window).height()/3) { 
				$("#sidebar-right").css('position','fixed') ;
				$("#sidebar-right").css('top','0px') ;
				$("#sidebar-right").css('right','0px') ;
				$("#sidebar-right").css('width','25.5%') ;
			} else { 
				$("#sidebar-right").css('position','relative') ;
				$("#sidebar-right").css('top','0px') ;
				$("#sidebar-right").css('right','0px') ;
				$("#sidebar-right").css('width','25.5%') ;
			} 
		}); 
	});


	var site_url = '<?php echo WEB_URL; ?>' ;
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
	var markettype = "32CARDSB";
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
    	socket.emit('Room', 'card32eu');
    });
	socket.on('gameIframe', function(data){
    	$("#casinoIframe").attr('src',data);
    });
    socket.on('game', function(data) {	
			
		  if (data && data['t1'] && data['t1'][0]) {
		  	if(oldGameId != data.t1[0].mid && data.t1[0].mid != 0 && data.t1[0].mid != "0"){
		  		setTimeout(function(){
						clearCards();
					},<?php echo CASINO_RESULT_TIMEOUT; ?>);
		  	}
		  	oldGameId = data.t1[0].mid;
        		if(data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast){
				$(".casino-remark").text(data.t1[0].remark);
				/* if (data.t1[0].C1 != 1){ 
					$("#card_1_value").text(data.t1[0].C1);
				}
				if (data.t1[0].C2 != 1){ 
					$("#card_2_value").text(data.t1[0].C2);
				}
				if (data.t1[0].C3 != 1){ 
					$("#card_3_value").text(data.t1[0].C3);
				}
				if (data.t1[0].C4 != 1){ 
					$("#card_4_value").text(data.t1[0].C4);
				} */
				
				if(data.t1[0].C1 > data.t1[0].C2 && data.t1[0].C1 > data.t1[0].C3 && data.t1[0].C1 > data.t1[0].C4){
					$("#player_2_value").removeClass("text-success");
					$("#player_3_value").removeClass("text-success");
					$("#player_4_value").removeClass("text-success");
					$("#player_1_value").addClass("text-success");
				}
				
				if(data.t1[0].C2 > data.t1[0].C1 && data.t1[0].C2 > data.t1[0].C3 && data.t1[0].C2 > data.t1[0].C4){
					$("#player_3_value").removeClass("text-success");
					$("#player_4_value").removeClass("text-success");
					$("#player_1_value").removeClass("text-success");
					$("#player_2_value").addClass("text-success");
				}
				
				if(data.t1[0].C3 > data.t1[0].C1 && data.t1[0].C3 > data.t1[0].C2 && data.t1[0].C3 > data.t1[0].C4){
					$("#player_4_value").removeClass("text-success");
					$("#player_1_value").removeClass("text-success");
					$("#player_2_value").removeClass("text-success");
					$("#player_3_value").addClass("text-success");
				}
				
				if(data.t1[0].C4 > data.t1[0].C1 && data.t1[0].C4 > data.t1[0].C2 && data.t1[0].C4 > data.t1[0].C3){
					$("#player_1_value").removeClass("text-success");
					$("#player_2_value").removeClass("text-success");
					$("#player_3_value").removeClass("text-success");
					$("#player_4_value").addClass("text-success");
				}
				
				
				
				if(data.t1[0].cards){
					cards_img  = data.t1[0].cards;
					cards_img = cards_img.split(",");
					 card_1_value = 8;
						card_2_value = 9;
						card_3_value = 10;
						card_4_value = 11;

					for(var i in cards_img){
						if(cards_img[i] && cards_img[i] != 1){

						 get_rank = getType(cards_img[i]);
							get_rank = get_rank['rank'];
							if(i == 0 || i == 4 || i == 8 || i == 12 || i == 16 || i == 20 || i == 24 || i == 28){
								card_1_value += get_rank;
							}
							else if(i == 1 || i == 5 || i == 9 || i == 13 || i == 17 || i == 21 || i == 25 || i == 29){
								card_2_value += get_rank;
							}
							else if(i == 2 || i == 6 || i == 10 || i == 14 || i == 18 || i == 22 || i == 26 || i == 30){
								card_3_value += get_rank;
							}
							else if(i == 3 || i == 7 || i == 11 || i == 15 || i == 19 || i == 23 || i == 27 || i == 31){
								card_4_value += get_rank;
							}


							$("#cards_"+i).attr("src",site_url + "storage/front/img/cards_new/" + cards_img[i] + ".png");
							$("#cards_"+i).show();
						}
					}
					$("#card_1_value").text(card_1_value);
					$("#card_2_value").text(card_2_value);
					$("#card_3_value").text(card_3_value);
					$("#card_4_value").text(card_4_value);
				}
				
				
			}
			clock.setValue(data.t1[0].autotime);
			$(".round_no").text(data.t1[0].mid);
			$("#casino_event_id").val(data.t1[0].mid);
			eventId = data.t1[0].mid;
			
				for(var j in data['t2']){
				  	selectionid = parseInt(data['t2'][j].sid);
					runner = data['t2'][j].nat || data['t2'][j].nation;
					b1 = data['t2'][j].b1;
					b1 = parseFloat(b1);
					bs1 = data['t2'][j].bs1;
					bs1 = parseFloat(bs1);
					l1 = data['t2'][j].l1;
					l1 = parseFloat(l1);
					ls1 = data['t2'][j].ls1;
					ls1 = parseFloat(ls1);
				  	
				  	markettype = "32CARDSB";
						b11 = b1;
					if(selectionid >= 15 && selectionid <=24){
						runner1 = runner.replace("Single ","");
						b11 = runner1;
						
					}
						
					
					
				 	//$(".market_"+selectionid+"_b_value").text(b11);
					back_html = '<span class="odds d-block"><b>' + b1 + '</b></span>';
				  	$(".market_"+selectionid+"_b_btn").attr("side","Back");
				  	$(".market_"+selectionid+"_b_btn").attr("selectionid",selectionid);
				  	$(".market_"+selectionid+"_b_btn").attr("marketid",selectionid);
				  	$(".market_"+selectionid+"_b_btn").attr("runner",runner);
				  	$(".market_"+selectionid+"_b_btn").attr("marketname",runner);
				  	$(".market_"+selectionid+"_b_btn").attr("eventid",eventId);
				  	$(".market_"+selectionid+"_b_btn").attr("markettype",markettype);
				  	$(".market_"+selectionid+"_b_btn").attr("event_name",markettype);
				  	$(".market_"+selectionid+"_b_btn").attr("fullmarketodds",b1);
				  	$(".market_"+selectionid+"_b_btn").attr("fullfancymarketrate",b1);
					
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
					if(selectionid < 15){
						$(".market_" + selectionid + "_b_btn").html(back_html);
						$(".market_" + selectionid + "_l_btn").html(lay_html);
					}else{
						
						$(".market_" + selectionid + "_b_val").html(b1);
						$(".market_" + selectionid + "_l_val").html(l1); 
					}
					
				 	gstatus =  data['t2'][j].gstatus.toString();
					if(gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED"){
						$(".market_"+selectionid+"_row").addClass("suspended-box");
					}
					else{
				  		$(".market_"+selectionid+"_row").removeClass("suspended-box");
					}
			}
        }
    });
    socket.on('gameResult', function(args){
    	  if (args.data) {
                updateResult(args.data);
            } else {
                updateResult(args['res']);
            }
    });
    socket.on('error', function(data){
    });
    socket.on('close', function(data){
    });
}

function getType(data){
	var data1 = data;
	if(data){
		data = data.split('SS');
		if(data.length > 1){
			var obj = {
				type	:	'[',
				color	:	'red',
				ctype	:	'diamond',
				card	:	data[0],
				rank 	:	data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0])
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
					ctype	:	'heart',
					card	:	data[0],
					rank 	:	data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0])
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
						ctype	:	'spade',
						card	:	data[0],
						rank 	:	data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0])
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
							ctype	:	'club',
							card	:	data[0],
							rank 	:	data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0])
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
}


function clearCards(){
	
	refresh(markettype);
	$("#player_1_value").removeClass("text-success");
			$("#player_2_value").removeClass("text-success");
			$("#player_3_value").removeClass("text-success");
			$("#player_4_value").removeClass("text-success");
			
			$("#card_1_value").text("0");
			$("#card_2_value").text("0");
			$("#card_3_value").text("0");
			$("#card_4_value").text("0");
			for(i=0;i<=35;i++){
				$("#cards_"+i).hide();
				$("#cards_"+i).attr("storage/front/img/cards_new/1.png");
			}
}
function updateResult(data) {

	if(data && data[0]){
		resultGameLast = data[0].mid;
		
		if(last_result_id != resultGameLast){
			last_result_id = resultGameLast;
			
		}

		html = "";
		var ab = "";
		var ab1 = "";
		casino_type = "'card32eu'";
		data.forEach((runData) => {
			if(parseInt(runData.win) == 1){
				ab = "result-b";
				ab1 = "8";
			
			}
			else if(parseInt(runData.win) == 2){
				ab = "result-b";
				ab1 = "9";
			
			}
			else if(parseInt(runData.win) == 3){
				ab = "result-b";
				ab1 = "10";
			
			}
			else{
				ab = "result-b";
				ab1 = "11";
			}
			
			eventId = runData.mid;
			html += '<span onclick="view_casiono_result('+eventId+','+casino_type+')"  class="result ml-1  '+ ab +'">'+ ab1 + '</span>';
		});
		
			
		$("#last-result").html(html);
		if(oldGameId == 0 || oldGameId == resultGameLast){		
			
			$("#player_1_value").removeClass("text-success");
			$("#player_2_value").removeClass("text-success");
			$("#player_3_value").removeClass("text-success");
			$("#player_4_value").removeClass("text-success");
			$("#card_1_value").text("0");
			$("#card_2_value").text("0");
			$("#card_3_value").text("0");
			$("#card_4_value").text("0");
			for(i=0;i<=35;i++){
				$("#cards_"+i).hide();
				$("#cards_"+i).attr("storage/front/img/cards_new/1.png");
			}
		}
    }
}
function teenpatti(type) {
    gameType = type
    websocket();
}

teenpatti("ok");

jQuery(document).on("click", ".label_stake", function () {
//    stake = $(this).attr("stake");
//    eventId = $("#fullMarketBetsWrap").attr("eventid");
// 	$("#inputStake").val(stake);

  eventId = $("#fullMarketBetsWrap").attr("eventid");
   var currentStake = parseFloat($("#inputStake").val()) || 0;
		var buttonStake = parseFloat($(this).attr("stake")) || 0;
		var totalStake = currentStake + buttonStake;

	$("#inputStake").val(totalStake);

	odds =  parseFloat($("#odds_val").val());
    inputStake = $("#inputStake").val();
    bet_stake_side = $("#bet_stake_side").val();
	bet_markettype = $("#bet_markettype").val();
	if(bet_markettype != "FANCY_ODDS"){
		if(bet_stake_side == "Lay"){
			profit = (odds - 1 ) * inputStake;
		}else{
			profit = (odds - 1 ) * inputStake;
		}
	}
	$("#profitLiability").text(profit.toFixed(2));
});
jQuery(document).on("click", ".close-bet-slip", function () {
	 $('.bet-slip-data').remove();
	 $(".back-1").removeClass("select");
	$(".lay-1").removeClass("select");
 });
 jQuery(document).on("click", "#placeBet", function () {
	 $("#placeBet").html('<i class="fa fa-spinner  fa-spin"></i> Submit');
	 $("#placeBet").addClass('disabled');
	 $(".placeBetLoader").addClass('show');
		var last_place_bet= "";
		bet_stake_side = $("#bet_stake_side").val();
		bet_type = bet_stake_side;
		bet_event_id = $("#bet_event_id").val();
		bet_marketId = $("#bet_marketId").val();
		oddsmarketId = bet_marketId;
		eventType = '32CARDSB';
		bet_event_name = $("#bet_event_name").val();
		inputStake = $("#inputStake").val();
		market_runner_name = $("#market_runner_name").val();
		market_odd_name = $("#market_odd_name").val();
		var runsNo; 
		var oddsNo; 
		bet_market_name = $("#bet_market_name").val();
		eventManualType = 'Auto';
		if(bet_stake_side == "Lay"){
			type = "No";
			class_type = "no";
			unmatched_side_type = false;
		}else{
			type = "Yes";
			class_type = "yes";
			unmatched_side_type = true;
		}
		bet_markettype = $("#bet_markettype").val();
		if(bet_markettype != "FANCY_ODDS"){
			bet_market_type = bet_markettype;
			runsNo = parseFloat($("#odds_val").val());
			oddsNo = parseFloat($("#odds_val").val());
			if(bet_stake_side == "Lay"){
				return_stake = (oddsNo - 1 ) * inputStake;
				return_stake = parseInt(return_stake);
			}else{
				return_stake = (oddsNo - 1 ) * inputStake;
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
		$('.header_Back_'+bet_event_id).remove();
		$('.header_Lay_'+bet_event_id).remove();
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
				 url: 'ajaxfiles/bet_place_32cardeu_teenpatti.php',
				 dataType: 'json',
				 data: {eventId:bet_event_id,eventType:eventType,marketId:bet_marketId,stack:inputStake,type:type,odds:oddsNo,runs:runsNo,bet_market_type:bet_market_type,oddsmarketId:oddsmarketId,eventManualType:eventManualType,market_runner_name:market_runner_name,market_odd_name:market_odd_name,bet_event_name:bet_event_name,bet_type:bet_type},
				 success: function(response) {
					 $(".placeBetLoader").removeClass('show');
					var check_status = response['status'];
					var message = response['message'];
					if(check_status == 'ok'){
							if(bet_markettype != "FANCY_ODDS"){
								oddsNo = runsNo;
							}else{
								oddsNo = oddsNo;
							}
							auth_key = 1;
							/* $("#bet-error-class").addClass("b-toast-success"); */
							toastr.clear()
							toastr.success("", message, {
								"timeOut": "3000",
								"iconClass":"toast-success",
								"positionClass":"toast-top-center",
								"extendedTImeout": "0"
							});
						}else{
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
        <div tabindex="0"  class="toast">
            <header class="toast-header"><strong class="mr-2" id="errorMsgText"></strong>
                <button type="button" aria-label="Close" class="close ml-auto mb-1">&times;</button>
            </header>
            <div class="toast-body"> </div>
        </div>
    </div>
</div>
</div>


</body>

</html>