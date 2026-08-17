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
$isopenTeen = true;
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

	.casino-table-full-box {
		width: 100%;
		border-left: 1px solid #c7c8ca;
		border-right: 1px solid #c7c8ca;
		border-top: 1px solid #c7c8ca;
		background-color: #f2f2f2;
	}

	.casino-table-header,
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

	.casino-table-header .casino-nation-detail {
		font-weight: bold;
		min-height: 25px;
	}

	.casino-nation-detail {
		width: 40%;
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

	.casino-table-header .casino-odds-box {
		cursor: unset;
		padding: 2px;
		min-height: unset;
		height: auto !important;
	}

	.casino-odds-box {
		width: 20%;
	}

	.back {
		background-color: #72bbef !important;
	}

	.casino-nation-name {
		font-size: 16px;
		font-weight: bold;
	}

	.patern-name {
		display: inline-block;
		vertical-align: middle;
		font-size: 12px;
		background-color: #cccccc;
		padding: 0;
		margin-left: 5px;
	}

	.card-icon {
		font-family: Card Characters !important;
		display: inline-block;
	}

	.patern-name .card-icon {
		padding: 4px 2px;
	}

	.card-red {
		color: #ff0000 !important;
	}

	.card-black {
		color: #000000 !important;
	}

	.casino-odds {
		font-size: 18px;
		font-weight: bold;
		line-height: 1;
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
	.teenpatti-open .suspended:after {
    width: 100% !important;
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
							<div class="row row5 teenpatti-open">
								<div class="col-md-9 casino-container coupon-card featured-box-detail">
									<div class="coupon-card">
										<div class="game-heading"><span class="card-header-title">Teenpatti Open
												<!-- <small role="button" class="teenpatti-rules"   onclick="view_rules('tp-rules.jpg')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small> -->
												<!----></span>
											<small role="button" class="teenpatti-rules" onclick="view_rules('open_teenpatti')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small>
											<span class="float-right">
												Round ID:
												<span class="round_no">0</span></span>
										</div>
										<!---->
										<div class="video-container">
											<?php
											if (!empty(IFRAME_URL_SET)) {
											?>
												<iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . OPENTEENPATTI_CODE; ?>" width="100%" height="200px" style="border: 0px;"></iframe>
											<?php

											} else {
											?>
												<iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
											<?php

											}
											?>
											<!--	<iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                             <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . OPENTEENPATTI_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
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
												<div class="videoCards">
													<div>
														<h6 class="text-white">DEALER</h6>
														<div>
															<img id="card8" src="/storage/front/img/cards_new/1.png">
															<img id="card17" src="/storage/front/img/cards_new/1.png">
															<img id="card26" src="/storage/front/img/cards_new/1.png">
														</div>
													</div>
												</div>
											</div>
											<div class="bet-note theme2bg theme1color specialRemarkdiv" style="display:none;"><span class="greenbx">Result: </span> <span id="specialRemark"></span></div>
											<!---->
										</div>
										<div class="casino-detail">
											<div class="casino-table">
												<div class="casino-table-full-box">
													<div class="casino-table-header">
														<div class="casino-nation-detail"></div>
														<div class="casino-odds-box back">Odds</div>
														<div class="casino-odds-box back">Pair Plus</div>
														<div class="casino-odds-box back">Total</div>
													</div>
													<div class="casino-table-body">
							            <div class="casino-table-row">
							               <div class="casino-nation-detail">
							                  <div class="casino-nation-name">
							                     Player 1
							                     <div class="patern-name">
													<span class="card-icon ms-1" id="card0"></span>
													<span class="card-icon ms-1" id="card9"></span>
													<span class="card-icon ms-1" id="card18"></span>
												</div>
							                  </div>
							               </div>
							               <div class="casino-odds-box back suspended-box market_1_row">
												<span class="casino-odds market_1_b_btn back-1 market_1_val">1.98</span>
												<div class="casino-nation-book market_1_b_exposure market_exposure text-center">0</div>
											</div>
							               <div class="casino-odds-box back suspended-box market_9_row">
												<span class="casino-odds market_9_b_btn back-1">Pair Plus 1</span>
												<div class="casino-nation-book market_9_b_exposure market_exposure text-center">0</div>
											</div>
							               <div class="casino-odds-box back suspended-box market_17_row">
												<span class="casino-odds market_17_b_btn back-1 market_17_val">1.98</span>
												<div class="casino-nation-book market_17_b_exposure market_exposure text-center">0</div>
											</div>
							            </div>
							            <div class="casino-table-row">
							               <div class="casino-nation-detail">
							                  <div class="casino-nation-name">
							                     Player 2
							                     <div class="patern-name">
													<span class="card-icon ms-1" id="card1"></span>
													<span class="card-icon ms-1" id="card10"></span>
													<span class="card-icon ms-1" id="card19"></span>
												</div>
							                  </div>
							               </div>
							              <div class="casino-odds-box back suspended-box market_2_row">
												<span class="casino-odds market_2_b_btn back-1 market_2_val">1.98</span>
												<div class="casino-nation-book market_2_b_exposure market_exposure text-center">0</div>
											</div>
							               <div class="casino-odds-box back suspended-box market_10_row">
												<span class="casino-odds market_10_b_btn back-1">Pair Plus 2</span>
												<div class="casino-nation-book market_10_b_exposure market_exposure text-center">0</div>
											</div>
							               <div class="casino-odds-box back suspended-box market_18_row">
												<span class="casino-odds market_18_b_btn back-1 market_18_val">1.98</span>
												<div class="casino-nation-book market_18_b_exposure market_exposure text-center">0</div>
											</div>
							            </div>
							            <div class="casino-table-row">
							               <div class="casino-nation-detail">
							                  <div class="casino-nation-name">
							                     Player 3
							                     <div class="patern-name">
													<span class="card-icon ms-1" id="card2"></span>
													<span class="card-icon ms-1" id="card11"></span>
													<span class="card-icon ms-1" id="card20"></span>
												</div>
							                  </div>
							               </div>
							               <div class="casino-odds-box back suspended-box market_3_row">
												<span class="casino-odds market_3_b_btn back-1 market_3_val">1.98</span>
												<div class="casino-nation-book market_3_b_exposure market_exposure text-center">0</div>
											</div>
							               <div class="casino-odds-box back suspended-box market_11_row">
												<span class="casino-odds market_11_b_btn back-1">Pair Plus 3</span>
												<div class="casino-nation-book market_11_b_exposure market_exposure text-center">0</div>
											</div>
							               <div class="casino-odds-box back suspended-box market_19_row">
												<span class="casino-odds market_19_b_btn back-1 market_19_val">1.98</span>
												<div class="casino-nation-book market_19_b_exposure market_exposure text-center">0</div>
											</div>
							            </div>
							            <div class="casino-table-row">
							               <div class="casino-nation-detail">
							                  <div class="casino-nation-name">
							                     Player 4
							                     <div class="patern-name">
													<span class="card-icon ms-1" id="card3"></span>
													<span class="card-icon ms-1" id="card12"></span>
													<span class="card-icon ms-1" id="card21"></span>
												</div>
							                  </div>
							               </div>
							               <div class="casino-odds-box back suspended-box market_4_row">
												<span class="casino-odds market_4_b_btn back-1 market_4_val">1.98</span>
												<div class="casino-nation-book market_4_b_exposure market_exposure text-center">0</div>
											</div>
							               <div class="casino-odds-box back suspended-box market_12_row">
												<span class="casino-odds market_12_b_btn back-1">Pair Plus 4</span>
												<div class="casino-nation-book market_12_b_exposure market_exposure text-center">0</div>
											</div>
							               <div class="casino-odds-box back suspended-box market_20_row">
												<span class="casino-odds market_20_b_btn back-1 market_20_val">1.98</span>
												<div class="casino-nation-book market_20_b_exposure market_exposure text-center">0</div>
											</div>
							            </div>
							            <div class="casino-table-row">
							               <div class="casino-nation-detail">
							                  <div class="casino-nation-name">
							                     Player 5
							                     <div class="patern-name">
													<span class="card-icon ms-1" id="card4"></span>
													<span class="card-icon ms-1" id="card13"></span>
													<span class="card-icon ms-1" id="card22"></span>
												</div>
							                  </div>
							               </div>
							               <div class="casino-odds-box back suspended-box market_5_row">
												<span class="casino-odds market_5_b_btn back-1 market_5_val">1.98</span>
												<div class="casino-nation-book market_5_b_exposure market_exposure text-center">0</div>
											</div>
							               <div class="casino-odds-box back suspended-box market_13_row">
												<span class="casino-odds market_13_b_btn back-1">Pair Plus 5</span>
												<div class="casino-nation-book market_13_b_exposure market_exposure text-center">0</div>
											</div>
							               <div class="casino-odds-box back suspended-box market_21_row">
												<span class="casino-odds market_21_b_btn back-1 market_21_val">1.98</span>
												<div class="casino-nation-book market_21_b_exposure market_exposure text-center">0</div>
											</div>
							            </div>
							            <div class="casino-table-row">
							               <div class="casino-nation-detail">
							                  <div class="casino-nation-name">
							                     Player 6
							                    <div class="patern-name">
													<span class="card-icon ms-1" id="card5"></span>
													<span class="card-icon ms-1" id="card14"></span>
													<span class="card-icon ms-1" id="card23"></span>
												</div>
							                  </div>
							               </div>
							               <div class="casino-odds-box back suspended-box market_6_row">
												<span class="casino-odds market_6_b_btn back-1 market_6_val">1.98</span>
												<div class="casino-nation-book market_6_b_exposure market_exposure text-center">0</div>
											</div>
							               <div class="casino-odds-box back suspended-box market_14_row">
												<span class="casino-odds market_14_b_btn back-1">Pair Plus 6</span>
												<div class="casino-nation-book market_14_b_exposure market_exposure text-center">0</div>
											</div>
							               <div class="casino-odds-box back suspended-box market_22_row">
												<span class="casino-odds market_22_b_btn back-1 market_22_val">1.98</span>
												<div class="casino-nation-book market_22_b_exposure market_exposure text-center">0</div>
											</div>
							            </div>
							            <div class="casino-table-row">
							               <div class="casino-nation-detail">
							                  <div class="casino-nation-name">
							                     Player 7
							                     <div class="patern-name">
													<span class="card-icon ms-1" id="card6"></span>
													<span class="card-icon ms-1" id="card15"></span>
													<span class="card-icon ms-1" id="card24"></span>
												</div>
							                  </div>
							               </div>
							               <div class="casino-odds-box back suspended-box market_7_row">
												<span class="casino-odds market_7_b_btn back-1 market_7_val">1.98</span>
												<div class="casino-nation-book market_7_b_exposure market_exposure text-center">0</div>
											</div>
							               <div class="casino-odds-box back suspended-box market_15_row">
												<span class="casino-odds market_15_b_btn back-1">Pair Plus 7</span>
												<div class="casino-nation-book market_15_b_exposure market_exposure text-center">0</div>
											</div>
							               <div class="casino-odds-box back suspended-box market_23_row">
												<span class="casino-odds market_23_b_btn back-1 market_23_val">1.98</span>
												<div class="casino-nation-book market_23_b_exposure market_exposure text-center">0</div>
											</div>
							            </div>
							            <div class="casino-table-row">
							               <div class="casino-nation-detail">
							                  <div class="casino-nation-name">
							                     Player 8
							                    <div class="patern-name">
													<span class="card-icon ms-1" id="card7"></span>
													<span class="card-icon ms-1" id="card16"></span>
													<span class="card-icon ms-1" id="card25"></span>
												</div>
							                  </div>
							               </div>
							              <div class="casino-odds-box back suspended-box market_8_row">
												<span class="casino-odds market_8_b_btn back-1 market_8_val">1.98</span>
												<div class="casino-nation-book market_8_b_exposure market_exposure text-center">0</div>
											</div>
							               <div class="casino-odds-box back suspended-box market_16_row">
												<span class="casino-odds market_16_b_btn back-1">Pair Plus 8</span>
												<div class="casino-nation-book market_16_b_exposure market_exposure text-center">0</div>
											</div>
							               <div class="casino-odds-box back suspended-box market_24_row">
												<span class="casino-odds market_24_b_btn back-1 market_24_val">1.98</span>
												<div class="casino-nation-book market_24_b_exposure market_exposure text-center">0</div>
											</div>
							            </div>
							         </div>
												</div>
											</div>
											<div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=teen8">View All</a></span></div>
											<div class="casino-last-results" id="last-result">
												
											</div>
											<div class="sidebar-box my-bet-container mt-2 d-xl-none">
												<div class="sidebar-title">
													<h4>Rules</h4>
												</div>
												<div class="">
													<div class="table-responsive">
														<table class="table table-bordered">
															<thead>
																<tr>
																	<th colspan="2" class="text-center">Pair Plus</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>Pair</td>
																	<td>1 TO 1</td>
																</tr>
																<tr>
																	<td>Flush</td>
																	<td>1 TO 4</td>
																</tr>
																<tr>
																	<td>Straight</td>
																	<td>1 TO 6</td>
																</tr>
																<tr>
																	<td>Trio</td>
																	<td>1 TO 30</td>
																</tr>
																<tr>
																	<td>Straight Flush</td>
																	<td>1 TO 40</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
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
		var data6;
		var markettype = "OPENTEENPATTI";
		var last_result_id = '0';

		function websocket(type) {
			socket = io.connect(websocketurl, {
				transports: ['websocket']
			});
			socket.on('connect', function() {
				socket.emit('Room', 'teen8');
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
						specialRemark = data.t1[0].remark;
						$("#specialRemark").text(specialRemark);
						if (specialRemark == "") {
							$(".specialRemarkdiv").hide();
						} else {
							$(".specialRemarkdiv").show();
						}

						data.t1[0].cards = data.t1[0].cards.split(",");

						for (var k = 0; k < data.t1[0].cards.length; k++) {
							if (data.t1[0].cards[k] != '1' && data.t1[0].cards[k] != 1) {
								if (k != 8 && k != 17 && k != 26) {
									data6 = getType(data.t1[0].cards[k]);
									if (data6) {
										var cs = data6.card + "<span class='card-" + data6.color + "'>" + data6.type + "</span>";
										$("#card" + k).html(cs);
									}
								} else {
									if (k == 26) {
										data.t1[0].cards[k] = data.t1[0].cards[k].replace(" ", "");
										data.t1[0].cards[k] = data.t1[0].cards[k].replace("#", "");
										data.t1[0].cards[k] = data.t1[0].cards[k].replace("2", "");
										data.t1[0].cards[k] = data.t1[0].cards[k].replace("1", "");
										data.t1[0].cards[k] = data.t1[0].cards[k].replace("Player", "");
									}
									$("#card" + k).attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].cards[k] + ".png");
								}
								//$("#card"+k).attr("src",site_url + "storage/front/img/cards_new/" + data.t1[0].cards[k] + ".png");
							}
						}
					}
					clock.setValue(data.t1[0].autotime);
					$(".round_no").text(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
					eventId = data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid;
					for (var j in data['t2']) {
						selectionid = parseInt(data['t2'][j].sid);
						runner = data['t2'][j].nat || data['t2'][j].nation;
						b1 = data['t2'][j].rate;
						b1_label = b1;
						/* if (selectionid == 1) {
							$(".n-bck").html(data['t2'][j].min);
							$(".x-bck").html(data['t2'][j].max);
						}
						if (selectionid > 10) {
							if (selectionid == 11) {
								b1_label = "Pair Plus 1";
								$(".n-pair").html(data['t2'][j].min);
								$(".x-pair").html(data['t2'][j].max);
							} else if (selectionid == 12) {
								b1_label = "Pair Plus 2";
							} else if (selectionid == 13) {
								b1_label = "Pair Plus 3";
							} else if (selectionid == 14) {
								b1_label = "Pair Plus 4";
							} else if (selectionid == 15) {
								b1_label = "Pair Plus 5";
							} else if (selectionid == 16) {
								b1_label = "Pair Plus 6";
							} else if (selectionid == 17) {
								b1_label = "Pair Plus 7";
							} else if (selectionid == 18) {
								b1_label = "Pair Plus 8";
							}
						} */
						markettype = "OPENTEENPATTI";
						
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
						$(".market_" + selectionid + "_val").html(b1);
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

		function clearCards() {
			refresh(markettype);
			$("#card0").html('');
			$("#card1").html('');
			$("#card2").html('');
			$("#card3").html('');
			$("#card4").html('');
			$("#card5").html('');
			$("#card6").html('');
			$("#card7").html('');
			$("#card8").attr("src", site_url + "storage/front/img/cards_new/1.png");
			$("#card9").html('');
			$("#card10").html('');
			$("#card11").html('');
			$("#card12").html('');
			$("#card13").html('');
			$("#card14").html('');
			$("#card15").html('');
			$("#card16").html('');
			$("#card17").attr("src", site_url + "storage/front/img/cards_new/1.png");
			$("#card18").html('');
			$("#card19").html('');
			$("#card20").html('');
			$("#card21").html('');
			$("#card22").html('');
			$("#card23").html('');
			$("#card24").html('');
			$("#card25").html('');
			$("#card26").attr("src", site_url + "storage/front/img/cards_new/1.png");
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
				casino_type = "'teen8'";
				data.forEach((runData) => {
					ab = "result-b";
					ab1 = "R";
					eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] : runData.mid;
					html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs  ' + ab + ' result">' + ab1 + '</span>';
				});
				$("#last-result").html(html);
				/* if (oldGameId == 0 || oldGameId == resultGameLast) {
					$("#card_c1").attr("src", site_url + "storage/front/img/cards_new/1.png");
					$("#card_c2").attr("src", site_url + "storage/front/img/cards_new/1.png");
					$("#card_c3").attr("src", site_url + "storage/front/img/cards_new/1.png");
					$("#card_c4").attr("src", site_url + "storage/front/img/cards_new/1.png");
					$("#card_c5").attr("src", site_url + "storage/front/img/cards_new/1.png");
					$("#card_c6").attr("src", site_url + "storage/front/img/cards_new/1.png");
					$("#card_c7").attr("src", site_url + "storage/front/img/cards_new/1.png");
					$("#card_c8").attr("src", site_url + "storage/front/img/cards_new/1.png");
					$("#card_c9").attr("src", site_url + "storage/front/img/cards_new/1.png");
				} */
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
			bet_event_id = $("#bet_event_id").val();
			bet_marketId = $("#bet_marketId").val();
			oddsmarketId = bet_marketId;
			eventType = 'OPENTEENPATTI';
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
					url: 'ajaxfiles/bet_place_open_teenpatti.php',
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
						bet_event_name: bet_event_name
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
							$("#bet-error-class").addClass("b-toast-success");
						} else {
							$("#bet-error-class").addClass("b-toast-danger");
						}
						error_message_text = message;
						$("#errorMsgText").text(error_message_text);
						$("#errorMsg").fadeIn('fast').delay(3000).hide(0);
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