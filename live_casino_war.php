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
    width: 40%;
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
    height: auto !important;
}

.casino-odds-box {
    width: 10%;
}

.casino-nation-book {
    font-size: 12px;
    font-weight: bold;
    min-height: 18px;
}

.flip-card {
    background-color: transparent;
    perspective: 1000px;
    height: 50px;
    width: 40px;
    margin-right: 5px;
}

.flip-card {
	height: 35px;
	width: 28px;
}

.flip-card:last-child {
    margin-right: 0;
}

.flip-card-inner {
    position: relative;
    width: 100%;
    height: 100%;
    text-align: center;
}

.flip-card-front, .flip-card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
}

.casino-odds-box img {
    height: 100%;
    width: 100%;
}

.flip-card-front, .flip-card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
}

.flip-card-back {
    transform: rotateY(180deg);
    -webkit-transform: rotateY(180deg);
    -moz-transform: rotateY(180deg);
    -ms-transform: rotateY(180deg);
    -o-transform: rotateY(180deg);
}

.flip-card-inner {
    position: relative;
    width: 100%;
    height: 100%;
    text-align: center;
}

.casino-table-full-box {
    width: 100%;
    border-left: 1px solid #c7c8ca;
    border-right: 1px solid #c7c8ca;
    border-top: 1px solid #c7c8ca;
    background-color: #f2f2f2;
}

.casino-nation-name {
    font-size: 16px;
    font-weight: bold;
}

.back {
    background-color: #72bbef !important;
}

.nav {
    display: flex
;
    flex-wrap: wrap;
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
}
.nav-tabs {
    border-bottom: 1px solid #dee2e6;
}

ul li, ol li {
    list-style: none;
}

.nav-tabs .nav-item {
    padding: 10px 0;
    flex: auto;
}

.casino-page-container .nav-tabs .nav-item {
    flex: unset;
}

.nav-link {
    display: block;
    padding: .5rem 1rem;
    color: #0d6efd;
    text-decoration: none;
    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out;
}

[type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled), button:not(:disabled) {
    cursor: pointer;
}

.nav-tabs .nav-link {
    margin-bottom: -1px;
    background: 0 0;
    border: 1px solid transparent;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
}

.nav-tabs .nav-link {
    color: #ffffff;
    border: 0;
    border-right: 1px solid #ffffff;
    border-radius: 0;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    -ms-border-radius: 0;
    -o-border-radius: 0;
    padding: 0 8px;
    font-weight: bold;
    text-transform: us;
    position: relative;
    text-align: center;
    text-transform: uppercase;
}

.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #495057;
    background-color: #fff;
    border-color: #dee2e6 #dee2e6 #fff;
}

.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #ffffff;
    background-color: transparent;
}

.tab-content>.active {
    display: block;
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

.row.row5 {
    margin-left: -5px;
    margin-right: -5px;
}

.col-6 {
    flex: 0 0 auto;
    width: 50%;
}

.row.row5 > [class*="col-"], .row.row5 > [class*="col"] {
    padding-left: 5px;
    padding-right: 5px;
}

.casino-nation-name img {
    height: 28px;
}

.fade {
    transition: opacity .15s linear;
}

.fade:not(.show) {
    opacity: 0;
}

.tab-content>.tab-pane {
    display: none;
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

.rules-section img {
    max-width: 300px;
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
                            <div class="row row5 teen20-container war">
                                <div class="col-md-9 casino-container coupon-card featured-box-detail">
								<div class="coupon-card">
									<div class="game-heading"><span class="card-header-title">Casino War
													<!-- <small role="button" class="teenpatti-rules"  onclick="view_rules('war-rules.jpg')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small> -->
												 <!----></span> 
												 <small role="button" class="teenpatti-rules"  onclick="view_rules('casino_war')" data-target="#rules_popup" data-toggle="modal"  tabindex="0"><u>Rules</u></small> 
												 <span class="float-right">
													Round ID:
													<span class="round_no">0</span></span>
									</div>
									<!---->
									<div class="video-container">
									<?php
  if(!empty(IFRAME_URL_SET)){
                               ?>
                               <iframe class="iframedesign" src="<?php echo IFRAME_URL."".CASINOWAR_CODE;?>" width="100%" height="200px" style="border: 0px;"></iframe>
                               <?php
                                
                            }else{
                                ?>
                                <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                <?php

                            }
                            ?>
										<!-- <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
										 <iframe class="iframedesign" src="<?php echo IFRAME_URL."".CASINOWAR_CODE;?>" width="100%" height="400" style="border: 0px;"></iframe> -->
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
											<div class="videoCards">
												<div>
													<!-- <h3 class="text-white">Dealer</h3> -->
													<div><img id="card_c7" src="storage/front/img/cards_new/1.png"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="casino-detail">
										<div class="casino-table">
											<div class="casino-table-header w-100">
												<div class="casino-nation-detail"></div>
												<div class="casino-odds-box ">
													<div class="flip-card">
													<div class="flip-card-inner ">
														<div class="flip-card-front">
															<img id="card_c1" src="storage/front/img/cards_new/1.jpg"></div>
														<!-- <div class="flip-card-back"><img id="card_c2" src="storage/front/img/cards_new/1.jpg"></div> -->
													</div>
													</div>
												</div>
												<div class="casino-odds-box ">
													<div class="flip-card">
													<div class="flip-card-inner ">
														<div class="flip-card-front"><img id="card_c2" src="storage/front/img/cards_new/1.jpg"></div>
														<!-- <div class="flip-card-back"><img id="card_c4" src="storage/front/img/cards_new/1.jpg"></div> -->
													</div>
													</div>
												</div>
												<div class="casino-odds-box ">
													<div class="flip-card">
													<div class="flip-card-inner ">
														<div class="flip-card-front"><img id="card_c3" src="storage/front/img/cards_new/1.jpg"></div>
														<!-- <div class="flip-card-back"><img id="card_c6" src="storage/front/img/cards_new/1.jpg"></div> -->
													</div>
													</div>
												</div>
												<div class="casino-odds-box ">
													<div class="flip-card">
													<div class="flip-card-inner ">
														<div class="flip-card-front"><img id="card_c4" src="storage/front/img/cards_new/1.jpg"></div>
														<!-- <div class="flip-card-back"><img src="storage/front/img/cards_new/1.jpg"></div> -->
													</div>
													</div>
												</div>
												<div class="casino-odds-box ">
													<div class="flip-card">
													<div class="flip-card-inner ">
														<div class="flip-card-front"><img id="card_c5" src="storage/front/img/cards_new/1.jpg"></div>
														<!-- <div class="flip-card-back"><img src="storage/front/img/cards_new/1.jpg"></div> -->
													</div>
													</div>
												</div>
												<div class="casino-odds-box ">
													<div class="flip-card">
													<div class="flip-card-inner ">
														<div class="flip-card-front"><img id="card_c6" src="storage/front/img/cards_new/1.jpg"></div>
														<!-- <div class="flip-card-back"><img src="storage/front/img/cards_new/1.jpg"></div> -->
													</div>
													</div>
												</div>
											</div>
											<div class="casino-table-full-box d-none d-md-block">
												<div class="casino-table-header">
													<div class="casino-nation-detail"></div>
													<div class="casino-odds-box ">1</div>
													<div class="casino-odds-box ">2</div>
													<div class="casino-odds-box ">3</div>
													<div class="casino-odds-box ">4</div>
													<div class="casino-odds-box ">5</div>
													<div class="casino-odds-box ">6</div>
												</div>
												<div class="casino-table-body">
													<div class="casino-table-row">
													<div class="casino-nation-detail">
														<div class="casino-nation-name"><span>Winner</span></div>
													</div>
													<div class="casino-odds-box back suspended-box market_1_b_btn market_1_row back-1"><span class="casino-odds market_1_b_value">0</span><div class="casino-nation-book market_1_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_11_b_btn market_11_row back-1"><span class="casino-odds market_11_b_value">0</span><div class="casino-nation-book market_11_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_21_b_btn market_21_row back-1"><span class="casino-odds market_21_b_value">0</span><div class="casino-nation-book market_21_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_31_b_btn market_31_row back-1"><span class="casino-odds market_31_b_value">0</span><div class="casino-nation-book market_31_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_41_b_btn market_41_row back-1"><span class="casino-odds market_41_b_value">0</span><div class="casino-nation-book market_41_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_51_b_btn market_51_row back-1"><span class="casino-odds market_51_b_value">0</span><div class="casino-nation-book market_51_b_exposure market_exposure"></div></div>
													</div>
													<div class="casino-table-row">
													<div class="casino-nation-detail">
														<div class="casino-nation-name"><span>Black</span><span class="card-icon ms-1"><span class="card-black ">}</span></span><span class="card-icon ms-1"><span class="card-black ">]</span></span></div>
													</div>
													<div class="casino-odds-box back suspended-box market_2_b_btn market_2_row back-1"><span class="casino-odds market_2_b_value">0</span><div class="casino-nation-book market_2_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_12_b_btn market_12_row back-1"><span class="casino-odds market_12_b_value">0</span><div class="casino-nation-book market_12_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_22_b_btn market_22_row back-1"><span class="casino-odds market_22_b_value">0</span><div class="casino-nation-book market_22_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_32_b_btn market_32_row back-1"><span class="casino-odds market_32_b_value">0</span><div class="casino-nation-book market_32_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_42_b_btn market_42_row back-1"><span class="casino-odds market_42_b_value">0</span><div class="casino-nation-book market_42_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_52_b_btn market_52_row back-1"><span class="casino-odds market_52_b_value">0</span><div class="casino-nation-book market_52_b_exposure market_exposure"></div></div>
													</div>
													<div class="casino-table-row">
													<div class="casino-nation-detail">
														<div class="casino-nation-name"><span>Red</span><span class="card-icon ms-1"><span class="card-red ">{</span></span><span class="card-icon ms-1"><span class="card-red ">[</span></span></div>
													</div>
													<div class="casino-odds-box back suspended-box market_3_b_btn market_3_row back-1"><span class="casino-odds market_3_b_value">0</span><div class="casino-nation-book market_3_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_13_b_btn market_13_row back-1"><span class="casino-odds market_13_b_value">0</span><div class="casino-nation-book market_13_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_23_b_btn market_23_row back-1"><span class="casino-odds market_23_b_value">0</span><div class="casino-nation-book market_23_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_33_b_btn market_33_row back-1"><span class="casino-odds market_33_b_value">0</span><div class="casino-nation-book market_33_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_43_b_btn market_43_row back-1"><span class="casino-odds market_43_b_value">0</span><div class="casino-nation-book market_43_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_53_b_btn market_53_row back-1"><span class="casino-odds market_53_b_value">0</span><div class="casino-nation-book market_53_b_exposure market_exposure"></div></div>
													</div>
													<div class="casino-table-row">
													<div class="casino-nation-detail">
														<div class="casino-nation-name"><span>Odds</span></div>
													</div>
													<div class="casino-odds-box back suspended-box market_4_b_btn market_4_row back-1"><span class="casino-odds market_4_b_value">0</span><div class="casino-nation-book market_4_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_14_b_btn market_14_row back-1"><span class="casino-odds market_14_b_value">0</span><div class="casino-nation-book market_14_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_24_b_btn market_24_row back-1"><span class="casino-odds market_24_b_value">0</span><div class="casino-nation-book market_24_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_34_b_btn market_34_row back-1"><span class="casino-odds market_34_b_value">0</span><div class="casino-nation-book market_34_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_44_b_btn market_44_row back-1"><span class="casino-odds market_44_b_value">0</span><div class="casino-nation-book market_44_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_54_b_btn market_54_row back-1"><span class="casino-odds market_54_b_value">0</span><div class="casino-nation-book market_54_b_exposure market_exposure"></div></div>
													</div>
													<div class="casino-table-row">
													<div class="casino-nation-detail">
														<div class="casino-nation-name"><span>Even</span></div>
													</div>
													<div class="casino-odds-box back suspended-box market_5_b_btn market_5_row back-1"><span class="casino-odds market_5_b_value">0</span><div class="casino-nation-book market_5_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_15_b_btn market_15_row back-1"><span class="casino-odds market_15_b_value">0</span><div class="casino-nation-book market_15_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_25_b_btn market_25_row back-1"><span class="casino-odds market_25_b_value">0</span><div class="casino-nation-book market_25_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_35_b_btn market_35_row back-1"><span class="casino-odds market_35_b_value">0</span><div class="casino-nation-book market_35_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_45_b_btn market_45_row back-1"><span class="casino-odds market_45_b_value">0</span><div class="casino-nation-book market_45_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_55_b_btn market_55_row back-1"><span class="casino-odds market_55_b_value">0</span><div class="casino-nation-book market_55_b_exposure market_exposure"></div></div>
													</div>
													<div class="casino-table-row">
													<div class="casino-nation-detail">
														<div class="casino-nation-name"><img src="storage/front/img/cards/spade.png"></div>
													</div>
													<div class="casino-odds-box back suspended-box market_6_b_btn market_6_row back-1"><span class="casino-odds market_6_b_value">0</span><div class="casino-nation-book market_6_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_16_b_btn market_16_row back-1"><span class="casino-odds market_16_b_value">0</span><div class="casino-nation-book market_16_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_26_b_btn market_26_row back-1"><span class="casino-odds market_26_b_value">0</span><div class="casino-nation-book market_26_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_36_b_btn market_36_row back-1"><span class="casino-odds market_36_b_value">0</span><div class="casino-nation-book market_36_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_46_b_btn market_46_row back-1"><span class="casino-odds market_46_b_value">0</span><div class="casino-nation-book market_46_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_56_b_btn market_56_row back-1"><span class="casino-odds market_56_b_value">0</span><div class="casino-nation-book market_56_b_exposure market_exposure"></div></div>
													</div>
													<div class="casino-table-row">
													<div class="casino-nation-detail">
														<div class="casino-nation-name"><img src="storage/front/img/cards/club.png"></div>
													</div>
													<div class="casino-odds-box back suspended-box market_7_b_btn market_7_row back-1"><span class="casino-odds market_7_b_value">0</span><div class="casino-nation-book market_7_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_17_b_btn market_17_row back-1"><span class="casino-odds market_17_b_value">0</span><div class="casino-nation-book market_17_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_27_b_btn market_27_row back-1"><span class="casino-odds market_27_b_value">0</span><div class="casino-nation-book market_27_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_37_b_btn market_37_row back-1"><span class="casino-odds market_37_b_value">0</span><div class="casino-nation-book market_37_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_47_b_btn market_47_row back-1"><span class="casino-odds market_47_b_value">0</span><div class="casino-nation-book market_47_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_57_b_btn market_57_row back-1"><span class="casino-odds market_57_b_value">0</span><div class="casino-nation-book market_57_b_exposure market_exposure"></div></div>
													</div>
													<div class="casino-table-row">
													<div class="casino-nation-detail">
														<div class="casino-nation-name"><img src="storage/front/img/cards/heart.png"></div>
													</div>
													<div class="casino-odds-box back suspended-box market_8_b_btn market_8_row back-1"><span class="casino-odds market_8_b_value">0</span><div class="casino-nation-book market_8_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_18_b_btn market_18_row back-1"><span class="casino-odds market_18_b_value">0</span><div class="casino-nation-book market_18_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_28_b_btn market_28_row back-1"><span class="casino-odds market_28_b_value">0</span><div class="casino-nation-book market_28_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_38_b_btn market_38_row back-1"><span class="casino-odds market_38_b_value">0</span><div class="casino-nation-book market_38_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_48_b_btn market_48_row back-1"><span class="casino-odds market_48_b_value">0</span><div class="casino-nation-book market_48_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_58_b_btn market_58_row back-1"><span class="casino-odds market_58_b_value">0</span><div class="casino-nation-book market_58_b_exposure market_exposure"></div></div>
													</div>
													<div class="casino-table-row">
													<div class="casino-nation-detail">
														<div class="casino-nation-name"><img src="storage/front/img/cards/diamond.png"></div>
													</div>
													<div class="casino-odds-box back suspended-box market_9_b_btn market_9_row back-1"><span class="casino-odds market_9_b_value">0</span><div class="casino-nation-book market_9_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_19_b_btn market_19_row back-1"><span class="casino-odds market_19_b_value">0</span><div class="casino-nation-book market_19_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_29_b_btn market_29_row back-1"><span class="casino-odds market_29_b_value">0</span><div class="casino-nation-book market_29_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_39_b_btn market_39_row back-1"><span class="casino-odds market_39_b_value">0</span><div class="casino-nation-book market_39_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_49_b_btn market_49_row back-1"><span class="casino-odds market_49_b_value">0</span><div class="casino-nation-book market_49_b_exposure market_exposure"></div></div>
													<div class="casino-odds-box back suspended-box market_59_b_btn market_59_row back-1"><span class="casino-odds market_59_b_value">0</span><div class="casino-nation-book market_59_b_exposure market_exposure"></div></div>
													</div>
												</div>
											</div>
											
										</div>
										<div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=war">View All</a></span></div>
										<div class="casino-last-results" id="last-result">
											<!-- <span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span> -->
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
  
  
  
     


</body>

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
	var markettype = "CASINO_WAR";
	var markettype_2 = markettype;
	var back_html = "";
	var lay_html = "";
	var gstatus = "";
	var last_result_id = '0';
	
	function websocket(type) {
		socket = io.connect(websocketurl);
		socket.on('connect', function () {
			socket.emit('Room', 'War');
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
				
				if (data.t1[0].C1 && data.t1[0].C1 != 1) {
						$("#card_c1").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C1 + ".png");
				}
				if (data.t1[0].C2 && data.t1[0].C2 != 1) {
						$("#card_c2").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C2 + ".png");
				}
				if (data.t1[0].C3 && data.t1[0].C3 != 1) {
						$("#card_c3").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C3 + ".png");
				}
				if (data.t1[0].C4 && data.t1[0].C4 != 1) {
						$("#card_c4").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C4 + ".png");
				}
				if (data.t1[0].C5 && data.t1[0].C5 != 1) {
						$("#card_c5").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C5 + ".png");
				}
				if (data.t1[0].C6 && data.t1[0].C6 != 1) {
						$("#card_c6").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C6 + ".png");
				}
				if (data.t1[0].C7 && data.t1[0].C7 != 1) {
						$("#card_c7").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C7 + ".png");
				}
					
				
			}
			clock.setValue(data.t1[0].autotime);
			$(".round_no").text(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
			$("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
			eventId = data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid;
			
				for(var j in data['t2']){
				  	selectionid = parseInt(data['t2'][j].sid);
					runner = data['t2'][j].nat || data['t2'][j].nation;
					b1 = data['t2'][j].b1;
					l1 = data['t2'][j].l1;
				  	
				  	
				  	markettype = "CASINO_WAR";
					
				 	
				  	$(".market_"+selectionid+"_b_value").text(b1);
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
					
					
					
				 	gstatus =  data['t2'][j].gstatus.toString();
					if(gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED"){
						
						$(".market_" + selectionid + "_row").addClass("suspended-box");
						$(".market_"+selectionid+"_b_btn").removeClass("back-1");
					}
					else {
						$(".market_"+selectionid+"_b_btn").addClass("back-1");
						$(".market_" + selectionid + "_row").removeClass("suspended-box");
					}
			}
			
		
        }
    });
	
		socket.on('gameResult', function (args) {
			if(args.data){
				updateResult(args.data);
			}else{
				updateResult(args['res']);
			}
		});
		socket.on('error', function (data) {});
		socket.on('close', function (data) {});
	}

	function getType(data){
	var data1 = data;
	if(data){
		data = data.split('DD');
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
			data = data.split('HH');
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
				data = data.split('SS');
				if(data.length > 1){
					var obj = {
						type	:	'}',
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
							type	:	']',
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
}
	function clearCards(){
		refresh(markettype);
		$("#card_c1").attr("src",site_url + "storage/front/img/cards_new/1.png");
		$("#card_c2").attr("src", site_url + "storage/front/img/cards_new/1.png");
			$("#card_c3").attr("src", site_url + "storage/front/img/cards_new/1.png");
			$("#card_c4").attr("src", site_url + "storage/front/img/cards_new/1.png");
			$("#card_c5").attr("src", site_url + "storage/front/img/cards_new/1.png");
			$("#card_c6").attr("src", site_url + "storage/front/img/cards_new/1.png");
			$("#card_c7").attr("src", site_url + "storage/front/img/cards_new/1.png");
	}

	function updateResult(data) {
		if(data && data[0]){
			/* data = JSON.parse(JSON.stringify(data)); */
			resultGameLast = data[0].mid;
		
			if(last_result_id != resultGameLast){
				last_result_id = resultGameLast;
				
			}
		
			var html = "";
			var ab = "";
			var ab1 = "";
			casino_type = "'war'";
			data.forEach((runData) => {
			
					ab = "result-b";
					ab1 = "R";
			
				eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] : runData.mid;
				html += '<span onclick="view_casiono_result('+eventId+','+casino_type+')"  class="last-result ml-1  '+ ab +' result">'+ ab1 + '</span>';
			});
			$("#last-result").html(html);
			if(oldGameId == 0 || oldGameId == resultGameLast){	
				$("#card_c1").attr("src", site_url + "storage/front/img/cards_new/1.png");
				$("#card_c2").attr("src", site_url + "storage/front/img/cards_new/1.png");
				$("#card_c3").attr("src", site_url + "storage/front/img/cards_new/1.png");
				$("#card_c4").attr("src", site_url + "storage/front/img/cards_new/1.png");
				$("#card_c5").attr("src", site_url + "storage/front/img/cards_new/1.png");
				$("#card_c6").attr("src", site_url + "storage/front/img/cards_new/1.png");
				$("#card_c7").attr("src", site_url + "storage/front/img/cards_new/1.png");
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
		bet_stake_side = $("#bet_stake_side").val();		bet_type = bet_stake_side;
		bet_event_id = $("#bet_event_id").val();
		bet_marketId = $("#bet_marketId").val();
		oddsmarketId = bet_marketId;
		eventType = 'CASINO_WAR';
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
				 url: 'ajaxfiles/bet_place_casino_war.php',
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
</body>
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
<?php
				include("footer-js.php");
				include("footer-result-popup.php");
			?>
</html>