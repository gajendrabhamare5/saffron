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

	.casino-table-box {
		width: 100%;
		display: flex;
		flex-wrap: wrap;
		justify-content: space-between;
		align-items: flex-start;
	}

	.casino-table-box {
		padding: 4px;
	}

	.andar-box {
		background-color: #ffa07a;
		display: flex;
		flex-wrap: wrap;
		width: 100%;
		align-content: center;
	}

	.andar-box,
	.andarbg3 {
		background-color: #fc424280;
	}

	.ab-title {
		width: 10%;
		text-align: center;
		border-left: 1px solid #000;
		display: flex;
		flex-wrap: wrap;
		align-content: center;
		justify-content: center;
		border-top: 1px solid #000;
		border-bottom: 1px solid #000;
		font-weight: bold;
	}

	/* .ab-title {
        writing-mode: vertical-lr;
        text-orientation: upright;
    }
 */
	.ab-cards {
		width: 90%;
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
		border: 1px solid #000;
		padding: 10px;
		padding-bottom: 0;
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

	.casino-odds {
		font-size: 18px;
		font-weight: bold;
		line-height: 1;
	}

	.card-odd-box .casino-odds {
		margin-bottom: 5px;
		font-size: 14px;
	}

	.card-odd-box img {
		height: 45px;
	}

	.casino-nation-book {
		font-size: 12px;
		font-weight: bold;
		min-height: 18px;
		z-index: 1;
	}

	.bahar-box {
		background-color: #90ee90;
		display: flex;
		flex-wrap: wrap;
		width: 100%;
		align-content: center;
	}

	.bahar-box,
	.baharbg3 {
		background-color: #fdcf1380;
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

	.video-overlay .ab-rtlslider1 {
		width: 90px !important;
	}

	.video-overlay img {
		width: 24px !important;
		margin-right: unset !important;
	}

	.card-inner {
		height: 40px;
	}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

<body cz-shortcut-listen="true" class="" data-modal-open-count="0">
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
							<div class="row row5 andarbahar-module">
								<div class="col-md-9 andar-bahar coupon-card featured-box-detail">
									<div class="coupon-card">
										<div class="game-heading">
											<span class="card-header-title">ANDAR BAHAR 50 CARDS</span>
											<!-- <small role="button" class="teenpatti-rules"  onclick="view_rules('tt_cards_rule.jpg')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small> -->
											<small role="button" class="teenpatti-rules" onclick="view_rules('ab3')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small>
											<span class="float-right">
												Round ID:
												<span class="round_no">0</span><!--  | Min:
                                            <span>100</span> | Max:
                                            <span>200000</span> --></span>
										</div>
										<!---->
										<div class="video-container">
											<?php
											if (!empty(IFRAME_URL_SET)) {
											?>
												<iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . AB3_CODE; ?>" width="100%" height="200px" style="border: 0px;"></iframe>
											<?php

											} else {
											?>
												<iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
											<?php

											}
											?>
											<!--<iframe class="iframedesign" src="../tv/andarbahar.html" width="100%" height="200px" style="border: 0px;"></iframe>-->
											<!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL;
																					echo AB3_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
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
											<div class="video-overlay" style="">
												<div id="game-cards">
													<span class="text-white">Next Card Count: <span class="text-warning runnernext"></span></span>
													<div class="card-inner">
														<p class="text-white m-b-0"><b>ANDAR</b></p>
														<div id="andar-cards" class="ab-rtlslider owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
															<div class="owl-stage-outer">
																<div class="owl-stage" id="cards_1" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 371px !important;">

																</div>
															</div>
															<div class="owl-nav">
																<button type="button" role="presentation" class="owl-prev disabled"><span aria-label="Previous">&#8249;</span></button>
																<button type="button" role="presentation" class="owl-next"><span aria-label="Next"> &#8250;</span></button>
															</div>
															<div class="owl-dots disabled"></div>
														</div>
													</div>
													<div class="card-inner">
														<p class="text-white m-b-0"><b>BAHAR</b></p>
														<div id="bahar-cards" class="ab-rtlslider owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
															<div class="owl-stage-outer">
																<div class="owl-stage" id="cards_2" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 371px;">

																</div>
															</div>

														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="casino-detail">
											<div class="casino-table">
												<div class="casino-table-box">
													<div class="andar-box market_1_row">
														<div class="ab-title">ANDAR</div>
														<div class="ab-cards">
															<div class="card-odd-box">
																<div class="casino-odds market_1_b_btn market_1_b_value">1</div>
																<div class="back-1 market_1_b_btn"><img id="ab_cards_1" src="storage/front/img/andar_bahar/1.jpg"></div>
																<div class="casino-nation-book market_1_b_exposure market_exposure"></div>
															</div>
															<div class="card-odd-box">
																<div class="casino-odds market_2_b_btn market_2_b_value">1</div>
																<div class="back-1 market_2_b_btn"><img id="ab_cards_2" src="storage/front/img/andar_bahar/2.jpg"></div>
																<div class="casino-nation-book market_2_b_exposure market_exposure"></div>
															</div>
															<div class="card-odd-box">
																<div class="casino-odds market_3_b_btn market_3_b_value">2</div>
																<div class="back-1 market_3_b_btn"><img id="ab_cards_3" src="storage/front/img/andar_bahar/3.jpg"></div>
																<div class="casino-nation-book market_3_b_exposure market_exposure"></div>
															</div>
															<div class="card-odd-box">
																<div class="casino-odds market_4_b_btn market_4_b_value">0</div>
																<div class="back-1 market_4_b_btn"><img id="ab_cards_4" src="storage/front/img/andar_bahar/4.jpg"></div>
																<div class="casino-nation-book market_4_b_exposure market_exposure"></div>
															</div>
															<div class="card-odd-box">
																<div class="casino-odds market_5_b_btn market_5_b_value">2</div>
																<div class="back-1 market_5_b_btn"><img id="ab_cards_5" src="storage/front/img/andar_bahar/5.jpg"></div>
																<div class="casino-nation-book market_5_b_exposure market_exposure"></div>
															</div>
															<div class="card-odd-box">
																<div class="casino-odds market_6_b_btn market_6_b_value">3</div>
																<div class="back-1 market_6_b_btn"><img id="ab_cards_6" src="storage/front/img/andar_bahar/6.jpg"></div>
																<div class="casino-nation-book market_6_b_exposure market_exposure"></div>
															</div>
															<div class="card-odd-box">
																<div class="casino-odds market_7_b_btn market_7_b_value">1</div>
																<div class="back-1 market_7_b_btn"><img id="ab_cards_7" src="storage/front/img/andar_bahar/7.jpg"></div>
																<div class="casino-nation-book market_7_b_exposure market_exposure"></div>
															</div>
															<div class="card-odd-box">
																<div class="casino-odds market_8_b_btn market_8_b_value">2</div>
																<div class="back-1 market_8_b_btn"><img id="ab_cards_8" src="storage/front/img/andar_bahar/8.jpg"></div>
																<div class="casino-nation-book market_8_b_exposure market_exposure"></div>
															</div>
															<div class="card-odd-box">
																<div class="casino-odds market_9_b_btn market_9_b_value">0</div>
																<div class="back-1 market_9_b_btn"><img id="ab_cards_9" src="storage/front/img/andar_bahar/9.jpg"></div>
																<div class="casino-nation-book market_9_b_exposure market_exposure"></div>
															</div>
															<div class="card-odd-box">
																<div class="casino-odds market_10_b_btn market_10_b_value">2</div>
																<div class="back-1 market_10_b_btn"><img id="ab_cards_10" src="storage/front/img/andar_bahar/10.jpg"></div>
																<div class="casino-nation-book market_10_b_exposure market_exposure"></div>
															</div>
															<div class="card-odd-box">
																<div class="casino-odds market_11_b_btn market_11_b_value">2</div>
																<div class="back-1 market_11_b_btn"><img id="ab_cards_11" src="storage/front/img/andar_bahar/11.jpg"></div>
																<div class="casino-nation-book market_11_b_exposure market_exposure"></div>
															</div>
															<div class="card-odd-box">
																<div class="casino-odds market_12_b_btn market_12_b_value">1</div>
																<div class="back-1 market_12_b_btn"><img id="ab_cards_12" src="storage/front/img/andar_bahar/12.jpg"></div>
																<div class="casino-nation-book market_12_b_exposure market_exposure"></div>
															</div>
															<div class="card-odd-box">
																<div class="casino-odds market_13_b_btn market_13_b_value">1</div>
																<div class="back-1 market_13_b_btn"><img id="ab_cards_13" src="storage/front/img/andar_bahar/13.jpg"></div>
																<div class="casino-nation-book market_13_b_exposure market_exposure"></div>
															</div>
														</div>
													</div>
													<div class="bahar-box market_21_row">
														<div class="ab-title">BAHAR</div>
														<div class="ab-cards">
															<div class="card-odd-box">
																<div class="casino-odds market_21_b_btn market_21_b_value">1</div>
																<div class="market_21_b_btn back-1"><img id="ab_cards_21" src="storage/front/img/andar_bahar/1.jpg"></div>
																<div class="casino-nation-book market_21_b_exposure market_exposure"></div>
															</div>
															<div class="card-odd-box">
																<div class="casino-odds market_22_b_btn  market_22_b_value">1</div>
																<div class="market_22_b_btn back-1"><img id="ab_cards_22" src="storage/front/img/andar_bahar/2.jpg"></div>
																<div class="casino-nation-book market_22_b_exposure market_exposure"></div>
															</div>
															<div class="card-odd-box">
																<div class="casino-odds market_23_b_btn  market_23_b_value">2</div>
																<div class="market_23_b_btn back-1"><img id="ab_cards_23" src="storage/front/img/andar_bahar/3.jpg"></div>
																<div class="casino-nation-book market_23_b_exposure market_exposure"></div>
															</div>
															<div class="card-odd-box">
																<div class="casino-odds market_24_b_btn  market_24_b_value">0</div>
																<div class="market_24_b_btn back-1"><img id="ab_cards_24" src="storage/front/img/andar_bahar/4.jpg"></div>
																<div class="casino-nation-book market_24_b_exposure market_exposure"></div>
															</div>
															<div class="card-odd-box">
																<div class="casino-odds market_25_b_btn  market_25_b_value">2</div>
																<div class="market_25_b_btn back-1"><img id="ab_cards_25" src="storage/front/img/andar_bahar/5.jpg"></div>
																<div class="casino-nation-book market_25_b_exposure market_exposure"></div>
															</div>
															<div class="card-odd-box">
																<div class="casino-odds market_26_b_btn  market_26_b_value">3</div>
																<div class="market_26_b_btn back-1"><img id="ab_cards_26" src="storage/front/img/andar_bahar/6.jpg"></div>
																<div class="casino-nation-book market_26_b_exposure market_exposure"></div>
															</div>
															<div class="card-odd-box">
																<div class="casino-odds market_27_b_btn  market_27_b_value">1</div>
																<div class="market_27_b_btn back-1"><img id="ab_cards_27" src="storage/front/img/andar_bahar/7.jpg"></div>
																<div class="casino-nation-book market_27_b_exposure market_exposure"></div>
															</div>
															<div class="card-odd-box">
																<div class="casino-odds market_28_b_btn  market_28_b_value">2</div>
																<div class="market_28_b_btn back-1"><img id="ab_cards_28" src="storage/front/img/andar_bahar/8.jpg"></div>
																<div class="casino-nation-book market_28_b_exposure market_exposure"></div>
															</div>
															<div class="card-odd-box">
																<div class="casino-odds market_29_b_btn  market_29_b_value">0</div>
																<div class="market_29_b_btn back-1"><img id="ab_cards_29" src="storage/front/img/andar_bahar/9.jpg"></div>
																<div class="casino-nation-book market_29_b_exposure market_exposure"></div>
															</div>
															<div class="card-odd-box">
																<div class="casino-odds market_30_b_btn  market_30_b_value">2</div>
																<div class="market_30_b_btn back-1"><img id="ab_cards_30" src="storage/front/img/andar_bahar/10.jpg"></div>
																<div class="casino-nation-book market_30_b_exposure market_exposure"></div>
															</div>
															<div class="card-odd-box">
																<div class="casino-odds market_31_b_btn market_31_b_value">2</div>
																<div class="market_31_b_btn back-1"><img id="ab_cards_31" src="storage/front/img/andar_bahar/11.jpg"></div>
																<div class="casino-nation-book market_31_b_exposure market_exposure"></div>
															</div>
															<div class="card-odd-box">
																<div class="casino-odds market_32_b_btn market_32_b_value">1</div>
																<div class="market_32_b_btn back-1"><img id="ab_cards_32" src="storage/front/img/andar_bahar/12.jpg"></div>
																<div class="casino-nation-book market_32_b_exposure market_exposure"></div>
															</div>
															<div class="card-odd-box">
																<div class="casino-odds market_33_b_btn market_33_b_value">1</div>
																<div class="market_33_b_btn back-1"><img id="ab_cards_33" src="storage/front/img/andar_bahar/13.jpg"></div>
																<div class="casino-nation-book market_33_b_exposure market_exposure"></div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=ab3">View All</a></span></div>
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
			<script src="storage/front/js/owl.carousel.min.js" type="text/javascript"></script>
			<?php
			include("footer.php");
			?>
		</div>
	</div>

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
		var markettype = "AB3";
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
				socket.emit('Room', 'ab3');
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


					}
					clock.setValue(data.t1[0].autotime);
					$(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid);
					$("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid);
					eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid;

					for (var j in data['t1']) {


						allcards = data['t1'][j].cards;
						var ball = [];
						var aall = [];
						var count_non_ones = 0;
						// Loop through the array and push values to the appropriate array
						for (var i = 0; i < allcards.length; i++) {

							if (allcards[i] != "1") {
								count_non_ones++;
								if (i % 2 === 0) {
									ball.push(allcards[i]); // For even indices
								} else {
									aall.push(allcards[i]); // For odd indices
								}
							}
						}
						$(".nextcard").hide();
						if (count_non_ones > 0) {
							count_non_ones = count_non_ones + 1;
							if (count_non_ones % 2 === 0) {
								count_non_ones += " / Bahar";
								//andar suspended
								$(".andar-box").addClass("suspended");
								$(".bahar-box").removeClass("suspended");

							} else {
								//both suspended
								count_non_ones += " / Andar";
								$(".andar-box, .bahar-box").removeClass("suspended");
								//$(".bahar-box").addClass("suspended");
							}
							$(".nextcard").show();
							$(".runnernext").html(count_non_ones);
						}
						acards_html_array = [];
						var acards_html = "";
						var len1 = 0;

						if (aall != "") {
							for (ac in aall) {


								acards_html_array.push('  <div class="owl-item " id="owl_ac_img_id' + ac + '" style="margin-right:25px !important;"><div class="item"><img src="storage/front/img/cards_new/' + aall[ac] + '.png"></div></div>');
								acards_html += acards_html_array[len1];

								len1++;
								if (len1 == aall.length) {
									acards_html_array.reverse();

									acards_html = acards_html_array.join('');

									$("#cards_1").html(acards_html);
									$('#andar-cards').owlCarousel({
										margin: 20
									}).trigger('add.owl.carousel',
										[jQuery(acards_html)]).trigger('refresh.owl.carousel');
								} else {
									$("#cards_1").html(acards_html);
									$('#andar-cards').owlCarousel().trigger('add.owl.carousel',
										[jQuery(acards_html)]).trigger('refresh.owl.carousel');
								}



							}

						} else {
							$("#cards_1").html("");
							$('#andar-cards').owlCarousel().trigger('add.owl.carousel',
								[jQuery(acards_html)]).trigger('refresh.owl.carousel');
						}


						bcards_html_array = [];
						var bcards_html = "";
						var lenb = 0;
						if (ball != "") {
							for (bc in ball) {



								bcards_html_array.push('  <div class="owl-item " id="owl_bc_img_id_' + bc + '"  style=""><div class="item"><img src="storage/front/img/cards_new/' + ball[bc] + '.png"></div></div>');
								bcards_html += bcards_html_array[lenb];

								lenb++;

								if (lenb == ball.length) {
									bcards_html_array.reverse();

									bcards_html = bcards_html_array.join('');

									$("#cards_2").html(bcards_html);
									$('#bahar-cards').owlCarousel().trigger('add.owl.carousel',
										[jQuery(acards_html)]).trigger('refresh.owl.carousel');
								} else {
									$("#cards_2").html(bcards_html);
									$('#bahar-cards').owlCarousel().trigger('add.owl.carousel',
										[jQuery(acards_html)]).trigger('refresh.owl.carousel');
								}



							}
						} else {
							$("#cards_2").html("");
							$('#bahar-cards').owlCarousel().trigger('add.owl.carousel',
								[jQuery(bcards_html)]).trigger('refresh.owl.carousel');
						}





					}
					for (var j in data['t2']) {
						gstatus =  data['t2'][j].gstatus.toString();
						if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {

							$(".andar-box, .bahar-box").addClass("suspended");
						}
					}



					for (var j in data['t3']) {
						selectionid = parseInt(data['t3'][j].sid);
						runner = data['t3'][j].nat || data['t3'][j].nation;
						b1 = data['t3'][j].b1;
						l1 = data['t3'][j].l1;


						markettype = "AB3";


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
						$(".market_"+selectionid+"_b_value").html(l1); 

						/* $(".market_" + selectionid + "_l_btn").attr("side", "Lay");
						$(".market_" + selectionid + "_l_btn").attr("selectionid", selectionid);
						$(".market_" + selectionid + "_l_btn").attr("marketid", selectionid);
						$(".market_" + selectionid + "_l_btn").attr("runner", runner);
						$(".market_" + selectionid + "_l_btn").attr("marketname", runner);
						$(".market_" + selectionid + "_l_btn").attr("eventid", eventId);
						$(".market_" + selectionid + "_l_btn").attr("markettype", markettype);
						$(".market_" + selectionid + "_l_btn").attr("event_name", markettype);
						$(".market_" + selectionid + "_l_btn").attr("fullmarketodds", l1);
						$(".market_" + selectionid + "_l_btn").attr("fullfancymarketrate", l1);
						$(".market_" + selectionid + "_l_value").html(l1); */


						/*  gstatus = data['t2'][j].gstatus.toString();
						if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {

							$("#ab_cards_" + selectionid).attr("src", "../storage/front/img/andar_bahar/0.jpg");
							$(".market_" + selectionid + "_b_btn").removeClass("back-1");
							$(".market_"+selectionid+"_row").addClass("suspended");
						} else {
							$(".market_" + selectionid + "_b_btn").addClass("back-1");
							$("#ab_cards_" + selectionid).attr("src", "../storage/front/img/andar_bahar/" + selectionid + ".jpg");
							$(".market_"+selectionid+"_row").removeClass("suspended");
						} */
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

		function getType(data) {
			var data1 = data;
			if (data) {
				data = data.split('SS');
				if (data.length > 1) {
					var obj = {
						type: '[',
						color: 'red',
						card: data[0]
					}
					return obj;
				} else {
					data = data1;
					data = data.split('DD');
					if (data.length > 1) {
						var obj = {
							type: '{',
							color: 'red',
							card: data[0]
						}
						return obj;
					} else {
						data = data1;
						data = data.split('HH');
						if (data.length > 1) {
							var obj = {
								type: ']',
								color: 'black',
								card: data[0]
							}
							return obj;
						} else {
							data = data1;
							data = data.split('CC');
							if (data.length > 1) {
								var obj = {
									type: '}',
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

		function clearCards() {
			refresh(markettype);
			$(".nextcard").hide();
			$("#cards_1").html("")
			$("#cards_2").html("");
		}

		function updateResult(data) {
			

			if (data && data[0]) {
				resultGameLast = data[0].mid;

				if (last_result_id != resultGameLast) {
					last_result_id = resultGameLast;
					refresh(markettype);
				}

				html = "";
				var ab = "";
				var ab1 = "";
				casino_type = "'ab3'";
				data.forEach((runData) => {

					ab = "result-b";
					ab1 = "R";

					eventId = runData.mid == 0 ? 0 : runData.mid;
					html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="result ml-1  ' + ab + ' result">' + ab1 + '</span>';
				});
				$("#player_1_value").removeClass("text-success");
				$("#player_2_value").removeClass("text-success");
				$("#player_3_value").removeClass("text-success");
				$("#player_4_value").removeClass("text-success");
				$("#last-result").html(html);
				if (oldGameId == 0 || oldGameId == resultGameLast) {
					$("#cards_1").html("")
					$(".nextcard").hide();
					$("#cards_2").html("");
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
			eventType = 'AB3';
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
					url: 'ajaxfiles/bet_place_ab3.php',
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

		(function($) {


			carousel_start();

			jQuery("#andar_div").owlCarousel({

				loop: false,
				margin: 1,
				nav: true,
				dots: false,
				responsive: {
					0: {
						items: 3
					},

					600: {
						items: 3
					},

					1000: {
						items: 3
					},
				}
			});
			jQuery("#bahar_div").owlCarousel({

				loop: false,
				margin: 1,
				nav: true,
				dots: false,
				responsive: {
					0: {
						items: 3
					},

					600: {
						items: 3
					},

					1000: {
						items: 3
					},
				}
			});

		}(jQuery));

		function carousel_start() {
			jQuery("#andar-cards").owlCarousel({
				rtl: true,
				loop: false,
				margin: 1,
				nav: true,
				dots: false,
				responsive: {
					0: {
						items: 3
					},

					600: {
						items: 3
					},

					1000: {
						items: 3
					},
				}
			});
			jQuery("#bahar-cards").owlCarousel({
				rtl: true,
				loop: false,
				margin: 1,
				nav: true,
				dots: false,
				responsive: {
					0: {
						items: 3
					},

					600: {
						items: 3
					},

					1000: {
						items: 3
					},
				}
			});
		}
	</script>
	<?php
	include("footer-js.php");
	include("footer-result-popup.php");
	?>


</body>
<div id="errorMsg" class="b-toaster b-toaster-top-center" style="display:none;">
	<div class="b-toaster-slot vue-portal-target">
		<div role="alert" aria-live="assertive" aria-atomic="true" id="bet-error-class" class="b-toast b-toast-solid b-toast-prepend b-toast-danger">
			<div tabindex="0" class="toast">
				<header class="toast-header"><strong class="mr-2" id="errorMsgText"></strong>
					<button type="button" aria-label="Close" class="close ml-auto mb-1">x</button>
				</header>
				<div class="toast-body"> </div>
			</div>
		</div>
	</div>
</div>

</html>