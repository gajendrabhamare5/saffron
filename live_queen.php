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
		padding-right: 4px;
	}

	.casino-odd-box-container {
		width: 100%;
	}

	.casino-odd-box-container {
		width: calc(25% - 7.5px);
		margin-right: 10px;
		display: flex;
		flex-wrap: wrap;
		justify-content: space-between;
	}

	.casino-nation-name {
		font-size: 16px;
		font-weight: bold;
	}

	.casino-nation-name {
		width: 100%;
		text-align: center;
	}

	.back {
		background-color: #72bbef !important;
	}

	.lay {
		background-color: #faa9ba !important;
	}

	.casino-odds-box {
		display: flex !important;
		flex-wrap: wrap !important;
		flex-direction: column !important;
		align-items: center !important;
		justify-content: center !important;
		padding: 5px 0 !important;
		font-weight: bold !important;
		border-left: 1px solid #c7c8ca !important;
		cursor: pointer !important;
		min-height: 46px !important;
	}

	.casino-odds-box {
		width: 49% !important;
	}

	.casino-odds {
		font-size: 18px !important;
		font-weight: bold;
		line-height: 1;
	}

	.casino-nation-book {
		font-size: 12px;
		font-weight: bold;
		min-height: 18px;
		z-index: 1;
	}

	.casino-nation-book {
		width: 100%;
		text-align: center;
	}

	.casino-odd-box-container:last-child {
		margin-right: 0;
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

	.casino-remark marquee {
		width: calc(100% - 60px);
		float: right;
		padding-left: 0;
		position: unset !important;
		color: #097c93 !important;
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

						<div class="col-md-10 featured-box white-bg">
							<div class="row row5 queen">
								<div class="col-md-9 casino-container coupon-card featured-box-detail">
									<div class="coupon-card  new-casino">
										<div class="casino-video">
											<div class="casino-video-title">
												<span class="casino-name">Queen</span>
												<div class="casino-video-rid">Round ID:
													<span class="round_no"></span>
												</div>
											</div>
											<div class="video-box-container">
												<div class="video-container">
													<?php
													if (!empty(IFRAME_URL_SET)) {
													?>
														<iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . QUEEN_CODE; ?>" width="100%" height="200px" style="border: 0px;"></iframe>
													<?php

													} else {
													?>
														<iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
													<?php

													}
													?>
													<!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . QUEEN_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
												</div>
											</div>
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
																<div class="inn">5</div>
															</div>
															<div class="down">
																<div class="shadow"></div>
																<div class="inn">5</div>
															</div>
														</a>
													</li>
													<li class="flip-clock-active">
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
												</ul>
											</div>
											<div class="video-overlay">
												<div>
													<div class="videoCards">
														<div>
															<p class="m-b-0 text-white"><b><span class="" id="player_1_value">Total 0</span>
																	:
																	<span class="text-warning" id="card_1_value">0</span></b>
															</p>
															<div>
																<img id="cards_0" style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_4" style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_8" style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_12" style="display:none;" src="storage/front/img/cards_new/1.png">
															</div>
														</div>
														<div>
															<p class="m-b-0 text-white"><b><span class="" id="player_2_value">Total 1</span>
																	:
																	<span class="text-warning" id="card_2_value">1</span></b>
															</p>
															<div>
																<img id="cards_1" style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_5" style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_9" style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_13" style="display:none;" src="storage/front/img/cards_new/1.png">
															</div>
														</div>
														<div>
															<p class="m-b-0 text-white"><b><span class="" id="player_3_value">Total 2</span>
																	:
																	<span class="text-warning" id="card_3_value">2</span></b>
															</p>
															<div>
																<img id="cards_2" style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_6" style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_10" style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_14" style="display:none;" src="storage/front/img/cards_new/1.png">
															</div>
														</div>
														<div>
															<p class="m-b-0 text-white"><b><span class="" id="player_4_value">Total 3</span>
																	:
																	<span class="text-warning" id="card_4_value">3</span></b>
															</p>
															<div>
																<img id="cards_3" style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_7" style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_11" style="display:none;" src="storage/front/img/cards_new/1.png">
																<img id="cards_15" style="display:none;" src="storage/front/img/cards_new/1.png">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="casino-detail">
											<div class="casino-table">
												<div class="casino-table-box">
													<div class="casino-odd-box-container">
														<div class="casino-nation-name">Total 0</div>
														<div class="casino-odds-box back suspended-box market_1_row market_1_b_btn back-1"><span class="casino-odds">2.76</span></div>
														<div class="casino-odds-box lay suspended-box market_1_row market_1_l_btn lay-1"><span class="casino-odds">2.9</span></div>
														<div class="casino-nation-book market_1_b_exposure market_exposure"></div>
													</div>
													<div class="casino-odd-box-container">
														<div class="casino-nation-name">Total 1</div>
														<div class="casino-odds-box back suspended-box market_2_row market_2_b_btn back-1"><span class="casino-odds">3.55</span></div>
														<div class="casino-odds-box lay suspended-box market_2_row market_2_l_btn lay-1"><span class="casino-odds">3.81</span></div>
														<div class="casino-nation-book market_2_b_exposure market_exposure"></div>
													</div>
													<div class="casino-odd-box-container">
														<div class="casino-nation-name">Total 2</div>
														<div class="casino-odds-box back suspended-box market_3_row market_3_b_btn back-1"><span class="casino-odds">4.08</span></div>
														<div class="casino-odds-box lay suspended-box market_3_row market_3_l_btn lay-1"><span class="casino-odds">4.36</span></div>
														<div class="casino-nation-book market_3_b_exposure market_exposure"></div>
													</div>
													<div class="casino-odd-box-container">
														<div class="casino-nation-name">Total 3</div>
														<div class="casino-odds-box back suspended-box market_4_row market_4_b_btn back-1"><span class="casino-odds">7.39</span></div>
														<div class="casino-odds-box lay suspended-box market_4_row market_4_l_btn lay-1"><span class="casino-odds">8.09</span></div>
														<div class="casino-nation-book market_4_b_exposure market_exposure"></div>
													</div>
												</div>
												
											</div>
											<div class="casino-remark mt-1">
													<marquee scrollamount="3">This is 21 cards game 2,3,4,5,6 x 4 =20 and 1 Queen. Minimum total 10 or queen is required to win.</marquee>
												</div>
											<div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=queen">View All</a></span></div>
											<div class="casino-last-results" id="last-result">
												<!-- <span class="result result-b">1</span><span class="result result-b">1</span><span class="result result-b">2</span><span class="result result-b">1</span><span class="result result-b">1</span><span class="result result-b">3</span><span class="result result-b">3</span><span class="result result-b">0</span><span class="result result-b">2</span><span class="result result-b">0</span> -->
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
								<!---->
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
	<script type="text/javascript" src='footer-js.js'></script>

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
		var markettype = "QUEEN";
		var markettype_2 = markettype;
		var back_html = "";
		var lay_html = "";
		var gstatus = "";
		var last_result_id = '0';

		function websocket(type) {
			socket = io.connect(websocketurl);
			socket.on('connect', function() {
				socket.emit('Room', 'queen');
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
					/* $(".market_min_max_1").html("Min:"+Math.round(data.t1[0].min)+" Max:"+Math.round(data.t1[0].max));	 */
					if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
						$(".casino-remark").text(data.t1[0].remark);
						if (data.t1[0].rdesc) {

							cards_img = data.t1[0].rdesc;
							cards_img = cards_img.split(",");

							card_value_1 = 0;
							card_value_2 = 1;
							card_value_3 = 2;
							card_value_4 = 3;


							for (var i in cards_img) {
								if (cards_img[i] && cards_img[i] != 1) {
									get_rank = getType(cards_img[i]);
									get_rank = get_rank['rank'];
									if (i == 0 || i == 4 || i == 8 || i == 12) {
										card_value_1 += get_rank;
									} else if (i == 1 || i == 5 || i == 9 || i == 13) {
										card_value_2 += get_rank;
									} else if (i == 2 || i == 6 || i == 10 || i == 14) {
										card_value_3 += get_rank;
									} else if (i == 3 || i == 7 || i == 11 || i == 15) {
										card_value_4 += get_rank;
									}


									$("#cards_" + i).attr("src", site_url + "storage/front/img/cards_new/" + cards_img[i] + ".png");
									$("#cards_" + i).show();
								}
							}
							$("#card_1_value").text(card_value_1);
							$("#card_2_value").text(card_value_2);
							$("#card_3_value").text(card_value_3);
							$("#card_4_value").text(card_value_4);
							if (card_value_1 > card_value_2 && card_value_1 > card_value_3 && card_value_1 > card_value_4) {
								$("#player_2_value").removeClass("text-success");
								$("#player_3_value").removeClass("text-success");
								$("#player_4_value").removeClass("text-success");
								$("#player_1_value").addClass("text-success");
							}

							if (card_value_2 > card_value_1 && card_value_2 > card_value_3 && card_value_2 > card_value_4) {
								$("#player_3_value").removeClass("text-success");
								$("#player_4_value").removeClass("text-success");
								$("#player_1_value").removeClass("text-success");
								$("#player_2_value").addClass("text-success");
							}

							if (card_value_3 > card_value_1 && card_value_3 > card_value_2 && card_value_3 > card_value_4) {
								$("#player_4_value").removeClass("text-success");
								$("#player_1_value").removeClass("text-success");
								$("#player_2_value").removeClass("text-success");
								$("#player_3_value").addClass("text-success");
							}

							if (card_value_4 > card_value_1 && card_value_4 > card_value_2 && card_value_4 > card_value_3) {
								$("#player_1_value").removeClass("text-success");
								$("#player_2_value").removeClass("text-success");
								$("#player_3_value").removeClass("text-success");
								$("#player_4_value").addClass("text-success");
							}


						}


					}
					clock.setValue(data.t1[0].autotime);
					$(".round_no").text(data.t1[0].mid);
					$("#casino_event_id").val(data.t1[0].mid);
					eventId = data.t1[0].mid;

					for (var j in data['t2']) {
						selectionid = parseInt(data['t2'][j].sid);
						runner = data['t2'][j].nat || data['t2'][j].nation;
						b1 = data['t2'][j].b1;
						bs1 = data['t2'][j].bs1;
						l1 = data['t2'][j].l1;
						ls1 = data['t2'][j].ls1;
						
						
						// b11 = b1;
						markettype = "QUEEN";




						back_html = '<span class="casino-odds-box-odd market_' + selectionid + '_b_value">' + b1 + '</span>';


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


						lay_html = '<span class="casino-odds-box-odd market_' + selectionid + '_l_value">' + l1 + '</span>';


						$(".market_" + selectionid + "_l_btn").attr("side", "Lay");
						$(".market_" + selectionid + "_l_btn").attr("selectionid", selectionid);
						$(".market_" + selectionid + "_l_btn").attr("marketid", selectionid);
						$(".market_" + selectionid + "_l_btn").attr("runner", runner);
						$(".market_" + selectionid + "_l_btn").attr("marketname", runner);
						$(".market_" + selectionid + "_l_btn").attr("eventid", eventId);
						$(".market_" + selectionid + "_l_btn").attr("markettype", markettype);
						$(".market_" + selectionid + "_l_btn").attr("event_name", markettype);
						$(".market_" + selectionid + "_l_btn").attr("fullmarketodds", l1);
						$(".market_" + selectionid + "_l_btn").attr("fullfancymarketrate", l1);
						$(".market_" + selectionid + "_l_btn").html(lay_html);

						gstatus = data['t2'][j].gstatus.toString();
						if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {
							$(".market_" + selectionid + "_row").addClass("suspended-box");
							$(".market_" + selectionid + "_b_btn").removeClass("back-1");
							$(".market_" + selectionid + "_l_btn").removeClass("lay-1");
						} else {
							$(".market_" + selectionid + "_row").removeClass("suspended-box");
							$(".market_" + selectionid + "_b_btn").addClass("back-1");
							$(".market_" + selectionid + "_l_btn").addClass("lay-1");
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

		function getType(data) {
			var data1 = data;
			if (data) {
				data = data.split('SS');
				if (data.length > 1) {
					var obj = {
						type: '[',
						color: 'red',
						ctype: 'diamond',
						card: data[0],
						rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0])
					}
					return obj;
				} else {
					data = data1;
					data = data.split('DD');
					if (data.length > 1) {
						var obj = {
							type: '{',
							color: 'red',
							ctype: 'heart',
							card: data[0],
							rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0])
						}
						return obj;
					} else {
						data = data1;
						data = data.split('HH');
						if (data.length > 1) {
							var obj = {
								type: ']',
								color: 'black',
								ctype: 'spade',
								card: data[0],
								rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0])
							}
							return obj;
						} else {
							data = data1;
							data = data.split('CC');
							if (data.length > 1) {
								var obj = {
									type: '}',
									color: 'black',
									ctype: 'club',
									card: data[0],
									rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0])
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

			$("#player_1_value").removeClass("text-success");
			$("#player_2_value").removeClass("text-success");
			$("#player_3_value").removeClass("text-success");
			$("#player_4_value").removeClass("text-success");
			$("#card_1_value").text("0");
			$("#card_2_value").text("1");
			$("#card_3_value").text("2");
			$("#card_4_value").text("3");
			for (i = 0; i <= 15; i++) {
				$("#cards_" + i).hide();
				$("#cards_" + i).attr("storage/front/img/cards_new/1.png");
			}
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
				casino_type = "'queen'";
				data.forEach((runData) => {
					if (parseInt(runData.win) == 1) {
						ab = "result-b";
						ab1 = "0";

					} else if (parseInt(runData.win) == 2) {
						ab = "result-b";
						ab1 = "1";

					} else if (parseInt(runData.win) == 3) {
						ab = "result-b";
						ab1 = "2";

					} else {
						ab = "result-b";
						ab1 = "3";
					}

					eventId = runData.mid;
					html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs ml-1 ' + ab + ' result">' + ab1 + '</span>';
				});


				$("#last-result").html(html);
				if (oldGameId == 0 || oldGameId == resultGameLast) {

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
			eventType = 'QUEEN';
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
					url: 'ajaxfiles/bet_place_queen.php',
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
	</div>


</body>

</html>