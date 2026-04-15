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
	.baccarat-container .bet-odds {
		background-color: #2c3e50;
		font-size: 12px;
		color: #fff;
		width: 100%;
		padding: 6px;
		text-align: center;
		cursor: pointer;
		height: 58px;
	}

	.row5 .col-3 {
		height: 76px;
	}

	.baccarat .player-pair>div:first-child {
		font-size: 16px;
	}

	.baccarat .banker-pair>div:first-child {
		font-size: 16px;
	}

	.market_exposure {
		font-size: 12px;
		font-weight: bold;
	}

	.row>* {

		padding-right: unset;
		padding-left: 8px;
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

	.casino-last-results .result.result-a {
		background-color: #086cb8;
		color: #fff;
	}

	.baccarat .casino-last-results .result.result-b {
		background-color: #ae2130;
		color: #fff;
	}

	.baccarat-container {
		height: 185px;
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
						<div class="col-md-10 featured-box ">
							<div class="row row5 teen20-container baccarat">


								<div class="col-md-9 casino-container coupon-card featured-box-detail">
									<div class="coupon-card">
										<div class="game-heading">
											<span class="card-header-title">
												Baccarat 2
												<!-- <small role="button" class="teenpatti-rules" onclick="view_rules('baccarat2-rules.jpg')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small> -->
												<!---->
											</span>
											<small role="button" class="teenpatti-rules"
												onclick="view_rules('baccarat2')" data-target="#rules_popup"
												data-toggle="modal" tabindex="0"><u>Rules</u></small>
											<span class="float-right">
												Round ID:
												<span class="round_no">0</span>
											</span>
										</div>
										<!---->
										<div class="video-container">
											<?php
											if (!empty(IFRAME_URL_SET)) {
												?>
												<iframe class="iframedesign"
													src="<?php echo IFRAME_URL . "" . BACCARAT2_CODE; ?>" width="100%"
													height="200px" style="border: 0px;"></iframe>
												<?php

											} else {
												?>
												<iframe class="iframedesign" id="casinoIframe" src="" width="100%"
													height="200" style="border: 0px;"></iframe>
												<?php

											}
											?>
											<!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . BACCARAT2_CODE; ?>" width="100%" height="400" style="border: 0px;"a></ifrme> -->
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
										</div>
										<div class="baccarat-container">
											<div class="row row5">
												<div class="col-3">
													<div style="text-align : center;"><b
															style="color: #333; font-size: 20px; font-weight: 400;">Statistics</b>
													</div>
													<div>
														<div style="position: relative;">
															<div dir="ltr"
																style="position: relative; width: 183px; height: 160px;">
																<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"
																	aria-label="A chart.">
																	<svg width="183" height="160" aria-label="A chart."
																		style="overflow: hidden;">
																		<defs id="_ABSTRACT_RENDERER_ID_1"></defs>
																		<rect x="0" y="0" width="183" height="160"
																			stroke="none" stroke-width="0"
																			fill="#eeeeee"></rect>
																		<g>
																			<rect x="130" y="3" width="53" height="39"
																				stroke="none" stroke-width="0"
																				fill-opacity="0" fill="#ffffff"></rect>
																			<g column-id="Player">
																				<rect x="130" y="3" width="53"
																					height="9" stroke="none"
																					stroke-width="0" fill-opacity="0"
																					fill="#ffffff"></rect>
																				<g><text text-anchor="start" x="142"
																						y="10.65" font-family="Arial"
																						font-size="9" stroke="none"
																						stroke-width="0"
																						fill="#222222">Player</text></g>
																				<circle cx="134.5" cy="7.5" r="4.5"
																					stroke="none" stroke-width="0"
																					fill="#086cb8"></circle>
																			</g>
																			<g column-id="Banker">
																				<rect x="130" y="18" width="53"
																					height="9" stroke="none"
																					stroke-width="0" fill-opacity="0"
																					fill="#ffffff"></rect>
																				<g><text text-anchor="start" x="142"
																						y="25.65" font-family="Arial"
																						font-size="9" stroke="none"
																						stroke-width="0"
																						fill="#222222">Banker</text></g>
																				<circle cx="134.5" cy="22.5" r="4.5"
																					stroke="none" stroke-width="0"
																					fill="#ae2130"></circle>
																			</g>
																			<g column-id="Tie">
																				<rect x="130" y="33" width="53"
																					height="9" stroke="none"
																					stroke-width="0" fill-opacity="0"
																					fill="#ffffff"></rect>
																				<g><text text-anchor="start" x="142"
																						y="40.65" font-family="Arial"
																						font-size="9" stroke="none"
																						stroke-width="0"
																						fill="#222222">Tie</text></g>
																				<circle cx="134.5" cy="37.5" r="4.5"
																					stroke="none" stroke-width="0"
																					fill="#279532"></circle>
																			</g>
																		</g>
																		<g>
																			<path
																				d="M115,74.5L115,85.5A55,44,0,0,1,86.49645207559436,124.05749392192999L86.49645207559436,113.05749392192999A55,44,0,0,0,115,74.5"
																				stroke="#06518a" stroke-width="1"
																				fill="#06518a"></path>
																			<path
																				d="M60,74.5L60,85.5L86.49645207559436,124.05749392192999L86.49645207559436,113.05749392192999"
																				stroke="#06518a" stroke-width="1"
																				fill="#06518a"></path>
																			<path
																				d="M60,74.5L60,30.5A55,44,0,0,1,86.49645207559436,113.05749392192999L60,74.5A0,0,0,0,0,60,74.5"
																				stroke="#086cb8" stroke-width="1"
																				fill="#086cb8"></path>
																			<text text-anchor="start"
																				x="85.55839301424535"
																				y="70.89873799201459"
																				font-family="Arial" font-size="9"
																				stroke="none" stroke-width="0"
																				fill="#ffffff">42%</text>
																		</g>
																		<g>
																			<path
																				d="M60,74.5L60,85.5L46.32205620593296,42.88234091034024L46.32205620593296,31.88234091034024"
																				stroke="#1d7026" stroke-width="1"
																				fill="#1d7026"></path>
																			<path
																				d="M60,74.5L46.32205620593296,31.88234091034024A55,44,0,0,1,60,30.5L60,74.5A0,0,0,0,0,60,74.5"
																				stroke="#279532" stroke-width="1"
																				fill="#279532"></path>
																		</g>
																		<g>
																			<path
																				d="M86.49645207559436,113.05749392192999L86.49645207559436,124.05749392192999A55,44,0,0,1,5,85.5L5,74.5A55,44,0,0,0,86.49645207559436,113.05749392192999"
																				stroke="#831924" stroke-width="1"
																				fill="#831924"></path>
																			<path
																				d="M60,74.5L86.49645207559436,113.05749392192999A55,44,0,1,1,46.32205620593296,31.88234091034024L60,74.5A0,0,0,1,0,60,74.5"
																				stroke="#ae2130" stroke-width="1"
																				fill="#ae2130"></path>
																			<text text-anchor="start"
																				x="18.08325816387353"
																				y="87.56615438684823"
																				font-family="Arial" font-size="9"
																				stroke="none" stroke-width="0"
																				fill="#ffffff">54%</text>
																		</g>
																		<g></g>
																	</svg>
																	<div aria-label="A tabular representation of the data in the chart."
																		style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;">
																		<table>
																			<thead>
																				<tr>
																					<th>P</th>
																					<th>Data</th>
																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<td>Player</td>
																					<td>42</td>
																				</tr>
																				<tr>
																					<td>Banker</td>
																					<td>54</td>
																				</tr>
																				<tr>
																					<td>Tie</td>
																					<td>4</td>
																				</tr>
																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
															<div aria-hidden="true"
																style="display: none; position: absolute; top: 170px; left: 193px; white-space: nowrap; font-family: Arial; font-size: 9px;">
																Tie</div>
															<div></div>
														</div>
													</div>
												</div>
												<div class="col-9">
													<div class="row row5">
														<div class="col">
															<div
																class="bet-odds suspended market_6_b_btn market_6_row back-1">
																<p class="mb-1">Score 1-4</p>
																<p class="mb-1">7.5:1</p>
															</div>
															<div class="book market_6_b_exposure market_exposure"
																style="color: black;">0</div>
														</div>
														<div class="col">
															<div
																class="bet-odds suspended market_7_b_btn market_7_row back-1">
																<p class="mb-1">Score 5-6</p>
																<p class="mb-1">4:1</p>
															</div>
															<div class="book market_7_b_exposure market_exposure"
																style="color: black;">0</div>
														</div>
														<div class="col">
															<div
																class="bet-odds suspended market_8_b_btn market_8_row back-1">
																<p class="mb-1">Score 7</p>
																<p class="mb-1">4.5:1</p>
															</div>
															<div class="book market_8_b_exposure market_exposure"
																style="color: black;">0</div>
														</div>
														<div class="col">
															<div
																class="bet-odds suspended market_9_b_btn market_9_row back-1">
																<p class="mb-1">Score 8</p>
																<p class="mb-1">3:1</p>
															</div>
															<div class="book market_9_b_exposure market_exposure"
																style="color: black;">0</div>
														</div>
														<div class="col">
															<div
																class="bet-odds suspended market_10_b_btn market_10_row back-1">
																<p class="mb-1">Score 9</p>
																<p class="mb-1">2.5:1</p>
															</div>
															<div class="book market_10_b_exposure market_exposure"
																style="color: black;">0</div>
														</div>
													</div>
													<div class="bet-container mt-1">
														<div class="player-pair">
															<div class="suspended market_4_b_btn market_4_row back-1">
																Player Pair<br />
																11:1
															</div>
															<div class="book market_4_b_exposure market_exposure"
																style="color: black;">0</div>
														</div>
														<div class="player">
															<div class="suspended market_1_b_btn market_1_row back-1">
																<b class="">Player</b> <span class="d-block">1:1</span>
																<div class="player-card">

																	<img id="card_c5" class="lrotate"
																		style="display:none;"
																		src="storage/front/img/cards_new/1.png">
																	<img id="card_c3"
																		src="storage/front/img/cards_new/1.png">
																	<img id="card_c1"
																		src="storage/front/img/cards_new/1.png">

																</div>
															</div>
															<div class="book market_1_b_exposure market_exposure"
																style="color: black;">0</div>
														</div>
														<div class="tie">
															<div class="suspended  market_3_b_btn market_3_row back-1">
																<div><b class="">Tie</b></div>
																<div class="mt-2">8:1</div>
															</div>
															<div class="book market_3_b_exposure market_exposure"
																style="color: black;">0</div>
														</div>
														<div class="banker">
															<div class="suspended market_2_b_btn market_2_row back-1">
																<b class="">Banker</b> <span class="d-block">1:1</span>
																<div class="player-card second">

																	<img id="card_c2"
																		src="storage/front/img/cards_new/1.png">
																	<img id="card_c4"
																		src="storage/front/img/cards_new/1.png">
																	<img id="card_c6" class="lrotate"
																		style="display:none;"
																		src="storage/front/img/cards_new/1.png">
																	<!---->
																</div>
															</div>
															<div class="book market_2_b_exposure market_exposure"
																style="color: black;">0</div>
														</div>
														<div class="banker-pair">
															<div class="suspended market_5_b_btn market_5_row back-1">
																Banker Pair<br />
																11:1
															</div>
															<div class="book market_5_b_exposure market_exposure"
																style="color: black;">0</div>
														</div>
													</div>
													<div class="row row5 mt-2">
														<div class="col-12 text-right">
															<!-- <span class="m-r-5 market_min_max_1">Min:100 Max:100000</span>	 -->
															<!--<span> Min: <span>100</span> Max: <span>100000</span></span>-->
														</div>
													</div>
												</div>
											</div>
										</div>
										<marquee scrollamount="3" class="casino-remark m-b-10"> </marquee>
										<div class="fancy-marker-title m-t-10">
											<div class="casino-last-result-title"><span>Last Result</span><span><a
														href="/casino-results/poker6">View All</a></span></div>
											<!-- <div class="casino-last-results"><span class="result result-b">B</span><span class="result result-a">P</span><span class="result result-a">P</span><span class="result result-a">P</span><span class="result result-a">P</span><span class="result result-b">B</span><span class="result result-b">B</span><span class="result result-a">P</span><span class="result result-a">P</span><span class="result">T</span></div> -->
											<div class="last-result-container text-right mt-1" id="last-result">



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
	var markettype = "BACCARAT2";
	var back_html = "";
	var lay_html = "";
	var gstatus = "";
	var last_result_id = '0';

	function websocket(type) {
		socket = io.connect(websocketurl, {
			transports: ['websocket']
		});
		socket.on('connect', function () {
			socket.emit('Room', 'baccarat2');
		});

		socket.on('game', function (data) {
			if (data && data['t1'] && data['t1'][0]) {

				if (oldGameId != data.t1[0].mid && data.t1[0].mid != 0 && data.t1[0].mid != "0") {
					setTimeout(function () {
						clearCards();
					}, <?php echo CASINO_RESULT_TIMEOUT; ?>);
				}

				oldGameId = data.t1[0].mid;
				if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
					$(".casino-remark").text(data.t1[0].remark);

					if (data.t1[0].C1 != 1) {
						$("#card_c1").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C1 + ".png");
					}
					if (data.t1[0].C2 != 1) {
						$("#card_c2").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C2 + ".png");
					}
					if (data.t1[0].C3 != 1) {
						$("#card_c3").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C3 + ".png");
					}
					if (data.t1[0].C4 != 1) {
						$("#card_c4").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C4 + ".png");
					}
					if (data.t1[0].C5 != 1) {
						$("#card_c5").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C5 + ".png");
						$("#card_c5").show();
					}
					if (data.t1[0].C6 != 1) {
						$("#card_c6").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C6 + ".png");
						$("#card_c6").show();
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
					l1 = data['t2'][j].l1;

					if (selectionid == 1) {
						$(".market_min_max_" + selectionid).html("Min:" + data['t2'][j].min + " Max:" + data['t2'][j].max);

					}

					markettype = "BACCARAT2";


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

						$(".market_" + selectionid + "_row").addClass("suspended");
						$(".market_" + selectionid + "_b_btn").removeClass("back-1");
					}
					else {
						$(".market_" + selectionid + "_b_btn").addClass("back-1");
						$(".market_" + selectionid + "_row").removeClass("suspended");
					}
				}


			}
		});

		socket.on('gameResult', function (args) {
			 if (args.data) {
                updateResult(args.data);
            } else {
                updateResult(args['res']);
            }
		});
		socket.on('error', function (data) { });
		socket.on('close', function (data) { });
	}
	function clearCards() {
		refresh(markettype);
		$("#card_c1").attr("src", "storage/front/img/cards_new/1.png");
		$("#card_c2").attr("src", "storage/front/img/cards_new/1.png");
		$("#card_c3").attr("src", "storage/front/img/cards_new/1.png");
		$("#card_c4").attr("src", "storage/front/img/cards_new/1.png");
		$("#card_c5").attr("src", "storage/front/img/cards_new/1.png");
		$("#card_c6").attr("src", "storage/front/img/cards_new/1.png");

		$("#card_c5").hide();
		$("#card_c6").hide();

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
			casino_type = "'baccarat2'";
			data.forEach((runData) => {

				if (parseInt(runData.win) == 1) {
					ab = "cplayer";
					ab1 = "P";

				} else if (parseInt(runData.win) == 2) {
					ab = "cbanker";
					ab1 = "B";

				} else {
					ab = "ctie";
					ab1 = "T";
				}


				eventId = runData.mid;
				html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs  ' + ab + ' last-result">' + ab1 + '</span>';
			});
			$("#last-result").html(html);
			if (oldGameId == 0 || oldGameId == resultGameLast) {
				$("#card_c1").attr("src", "storage/front/img/cards_new/1.png");
				$("#card_c2").attr("src", "storage/front/img/cards_new/1.png");
				$("#card_c3").attr("src", "storage/front/img/cards_new/1.png");
				$("#card_c4").attr("src", "storage/front/img/cards_new/1.png");
				$("#card_c5").attr("src", "storage/front/img/cards_new/1.png");
				$("#card_c6").attr("src", "storage/front/img/cards_new/1.png");
				$("#card_c5").hide();
				$("#card_c6").hide();

			}
		}
	}

	function teenpatti(type) {
		gameType = type
		websocket();
	}
	teenpatti("ok");
	jQuery(document).on("click", ".back-1", function () {

		var fullmarketodds = $(this).attr("fullmarketodds");
		if (fullmarketodds != "") {
			side = $(this).attr("side");
			selectionid = $(this).attr("selectionid");
			market_odd_name = $(this).attr("markettype");
			runner = $(this).attr("runner");
			market_runner_name = runner;
			marketname = $(this).attr("marketname");
			markettype = $(this).attr("markettype");
			fullfancymarketrate = $(this).attr("fullfancymarketrate");


			odds_change_value = "disabled";
			runs_lable = 'Runs';
			runs_lable = 'Odds';
			fullfancymarketrate = fullmarketodds;
			eventId = $(this).attr("eventid");
			marketId = $(this).attr("marketid");
			event_name = $(this).attr("event_name");
			$(".select").removeClass("select");
			$(this).addClass("select");
			return_html = "";
			return_html += "<div class='bet-slip-data'><div><div class='table-responsive back'><form><table class='coupon-table table table-borderedless'><thead><tr><th></th><th style='width: 35%; text-align: left;'>(Bet for)</th><th style='width: 25%; text-align: left;'>Odds</th><th style='width: 15%; text-align: left;'>Stake</th><th style='width: 15%; text-align: right;'>Profit</th></tr></thead><tbody>";
			return_html += "<tr><td class='text-center'><a href='javascript:void(0);' class='text-danger close-bet-slip'><i class='fa fa-times'></i></a></td><td>" + runner + "</td><td class='bet-odds'><div class='form-group'> <input placeholder='0' value='" + fullmarketodds + "' id='odds_val' type='text' required='required' maxlength='4' readonly='readonly' class='amountint' style='width: 45px; vertical-align: middle;'><div class='spinner-buttons input-group-btn btn-group-vertical'> <button disabled='disabled' class='custom-btn-spinner btn btn-xs btn-default'><i class='fa fa-angle-up'></i></button> <button disabled='disabled' class='custom-btn-spinner btn btn-xs btn-default'><i class='fa fa-angle-down'></i></button></div></div></td><td class='bet-stakes'><div class='form-group bet-stake'><input type='hidden' id='bet_stake_side' value='Back'/><input type='hidden' id='bet_event_id' value='" + eventId + "'/><input type='hidden' id='bet_marketId' value='" + selectionid + "'/><input type='hidden' id='bet_event_name' value='" + event_name + "'/><input type='hidden' id='bet_market_name' value='" + marketname + "'/><input type='hidden' id='bet_markettype' value='" + markettype + "'/><input type='hidden' id='fullfancymarketrate' value='" + fullfancymarketrate + "'/> <input type='hidden' id='oddsmarketId' value='" + marketId + "'/><input type='hidden' id='market_runner_name' value='" + market_runner_name + "'/><input type='hidden' id='market_odd_name' value='" + market_odd_name + "'/> <input maxlength='10' name='inputStake' id='inputStake' required='required' type='text' ></div></td><td class='text-right bet-profit' id='profitLiability'>0</td></tr>";
			return_html += "<tr><td colspan='5' class='value-buttons' style='padding: 5px;'>";
			<?php
			$get_button_value = $conn->query("select * from user_master where id=$user_id and (button_value <> '' and button_value IS NOT NULL)");
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
				$button_array[] = 20000;
				$button_array[] = 20000;
			} else {
				$fetch_button_value_data = mysqli_fetch_assoc($get_button_value);
				$fetch_button_value = $fetch_button_value_data['button_value'];
				$default_stake = $fetch_button_value_data['default_stake'];
				$one_bet_default_stake = $fetch_button_value_data['one_bet_default_stake'];
				$button_array = explode(",", $fetch_button_value);
			}
			foreach ($button_array as $button_value) {
				?>
				return_html += " <button type='button' stake='<?php echo $button_value; ?>' class='btn btn-secondary m-l-5 m-b-5 label_stake'> <?php echo $button_value; ?> </button>";
				<?php
			}
			?>
			return_html += "</td></tr></tbody></table><div class='col-md-12'> <button type='button' class='btn btn-sm btn-danger float-left close-bet-slip'> Reset </button> <button type='button' class='btn btn-sm btn-success float-right m-b-5 placeBet' id='placeBet'> Submit </button></div></form></div></div></div>"
			$(".bet_slip_details").html(return_html);
		}
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
	jQuery(document).on("click", ".close-bet-slip", function () {
		$('.bet-slip-data').remove();
		$(".back-1").removeClass("select");
		$(".lay-1").removeClass("select");
	});
	jQuery(document).on("click", "#placeBet", function () {
		$("#placeBet").html('<i class="fa fa-spinner  fa-spin"></i> Submit');
		$("#placeBet").addClass('disabled');
		$(".placeBetLoader").addClass('show');
		var last_place_bet = "";
		bet_stake_side = $("#bet_stake_side").val(); bet_type = bet_stake_side;
		bet_event_id = $("#bet_event_id").val();
		bet_marketId = $("#bet_marketId").val();
		oddsmarketId = bet_marketId;
		eventType = 'BACCARAT2';
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

		$.ajax({
			type: 'POST',
			url: 'ajaxfiles/bet_place_baccarat2.php',
			dataType: 'json',
			data: { eventId: bet_event_id, eventType: eventType, marketId: bet_marketId, stack: inputStake, type: type, odds: oddsNo, runs: runsNo, bet_market_type: bet_market_type, oddsmarketId: oddsmarketId, eventManualType: eventManualType, market_runner_name: market_runner_name, market_odd_name: market_odd_name, bet_event_name: bet_event_name, bet_type: bet_type },
			success: function (response) {
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
					toastr.success("", message, {
                                "timeOut": "3000",
                                "iconClass":"toast-success",
                                "positionClass":"toast-top-center",
                                "extendedTImeout": "0"
                            });
					//$("#bet-error-class").addClass("b-toast-success");
				} else {
					toastr.clear()
                            toastr.warning("", message, {
                                "timeOut": "3000",
                                "iconClass":"toast-warning",
                                "positionClass":"toast-top-center",
                                "extendedTImeout": "0"
                            });
					//$("#bet-error-class").addClass("b-toast-danger");
				}
				error_message_text = message;
				$("#errorMsgText").text(error_message_text);
				$("#errorMsg").fadeIn('fast').delay(3000).hide(0);
				$(".close-bet-slip").click();
				refresh(markettype);
			}
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