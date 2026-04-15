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
$is_super_over3 = true;
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

.market-2 {
    min-width: calc(33.33% - 8px);
    max-width: calc(100% - 8px);
    margin-left: 4px;
    margin-right: 4px;
    flex: 1;
    width: calc(50% - 8px);
}

.market-title {
    background-color: var(--theme2-bg);
    color: #ffffff;
    padding: 8px 10px;
    font-size: 15px;
    font-weight: bold;
    display: flex
;
    flex-wrap: wrap;
    justify-content: space-between;
}

.market-title span {
    display: inline-block;
    max-width: calc(100% - 30px);
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
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

.market-nation-detail {
    width: calc(100% - 480px);
    display: flex
;
    flex-wrap: wrap;
    justify-content: space-between;
    padding: 0 5px;
    font-size: 14px;
}

.market-nation-detail {
        width: calc(100% - 330px);
    }

	.market-nation-detail {
        font-size: 13px;
    }

	.market-2 .market-nation-detail {
    width: calc(100% - 160px);
}

.market-2 .market-nation-detail {
        width: calc(100% - 110px);
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

.market-header .market-nation-detail .market-nation-name {
    font-size: 12px;
    color: #097c93;
    font-weight: bold;
}

.back {
    background-color: #72bbef !important;
}

.lay {
    background-color: #faa9ba !important;
}

.market-odd-box {
    width: 80px;
    padding: 2px 0;
    display: flex
;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    border-left: 1px solid #c7c8ca;
    cursor: pointer;
    min-height: 44px;
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

.market-row {
    background-color: #f2f2f2;
    display: flex
;
    flex-wrap: wrap;
}

.market-nation-book {
    display: flex
;
    flex-wrap: wrap;
    width: 100%;
    justify-content: space-between;
}

.market-odd-box .market-odd {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 3px;
    line-height: 1;
}

.market-odd-box .market-odd {
        font-size: 16px;
    }

	.market-odd-box .market-volume {
    font-size: 12px;
    font-weight: 100;
    line-height: 1;
}

.market-6 {
    min-width: calc(100% - 8px);
    max-width: calc(100% - 8px);
    margin-left: 4px;
    margin-right: 4px;
    flex: 1;
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

.col-md-12 {
        flex: 0 0 auto;
        width: 100%;
    }

.row.row10 {
    margin-left: -10px;
    margin-right: -10px;
}

.market-6 .market-nation-detail {
    width: calc(100% - 240px);
    position: relative;
}

.market-6 .market-nation-detail {
        width: calc(100% - 165px);
    }

	.fancy-min-max-box {
    width: 80px;
    padding: 0 5px;
    text-align: right;
}

.fancy-min-max-box {
        width: 55px;
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

.fancy-min-max {
    font-size: 12px;
    font-weight: bold;
    color: #097c93;
    word-break: break-all;
}

.fancy-min-max {
        font-size: 9px;
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

 .suspended-row {
    position: relative;
    pointer-events: none;
    cursor: none;
}


.suspended-row::before {
    /* background-image: url(storage/front/img/lock.svg); */
    background-size: 17px 17px;
    filter: invert(1);
    -webkit-filter: invert(1);
    background-repeat: no-repeat;
    content: "";
    position: absolute;
    z-index: 1;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    background-position: center;
    pointer-events: none;
}

.suspended-row::after {
    content: attr(data-title);
    background-color: #373636d6;
    color: #ff0000;
    font-weight: bold;
    font-size: 16px;
    text-transform: uppercase;
    position: absolute;
    position: absolute;
    height: 100%;
    width: 100%;
    right: 0;
    top: 0;
    cursor: not-allowed;
    display: flex;
    justify-content: center;
    align-items: center;
    pointer-events: none;
}

.casino-table .suspended-row::before, .casino-table .suspended-row::after {
    width: 40%;
}

@media only screen and (min-width: 1200px) and (max-width: 1399px) {
    .suspended-row::after, .suspended-table::after {
        font-size: 14px;
    }
}

.market-2 .suspended-row::after, .market-2 .suspended-table::after {
    width: 12.5%;
}

@media only screen and (min-width: 1200px) and (max-width: 1399px) {
    .market-2 .suspended-row::after, .market-2 .suspended-table::after {
        width: 110px;
    }
}

@media only screen and (min-width: 1200px) and (max-width: 1399px) {
    .market-2 .suspended-row::after, .market-2 .suspended-table::after {
        width: 110px;
    }
}

.market-6 .suspended-row::after, .market-6 .suspended-table::after {
    width: 38%;
}

@media only screen and (min-width: 1200px) and (max-width: 1399px) {
    .market-6 .suspended-row::after, .market-6 .suspended-table::after {
        width: 165px;
    }
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
							<div class="row row5 card32-container">
								<div class="col-md-9 coupon-card featured-box-detail">
									<div class="coupon-card">
										<div class="game-heading">
											<span class="card-header-title">
												Mini SUPER OVER
												<!-- <small role="button" class="teenpatti-rules" onclick="view_rules('superover3_rule.jpg')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small> -->
												 <!---->
											</span>
											<small role="button" class="teenpatti-rules"  onclick="view_rules('superover3')" data-target="#rules_popup" data-toggle="modal"  tabindex="0"><u>Rules</u></small>
											<span class="float-right">
												Round ID:
												<span class="round_no">0</span>
												<!-- | Min: <span>100.00</span>
               										| Max: <span>300000.00</span> --></span>
										</div>
										<div class="scorecard m-b-5" id="scoreboard-box">

										</div>
										<div class="video-container">
										<?php
											if(!empty(IFRAME_URL_SET)){
																		?>
																		<iframe class="iframedesign" src="<?php echo IFRAME_URL."".SUPEROVER3_CODE;?>" width="100%" height="200px" style="border: 0px;"></iframe>
																		<?php
																			
																		}else{
																			?>
																			<iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
																			<?php

																		}
																		?>
											<!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL . SUPEROVER3_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
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
												<div><img id="card_c1" style="display:none;" src="storage/front/img/cards/1.png"></div>
												<div><img id="card_c2" style="display:none;" src="storage/front/img/cards/1.png"></div>
												<div><img id="card_c3" style="display:none;" src="storage/front/img/cards/1.png"></div>
												<div><img id="card_c4" style="display:none;" src="storage/front/img/cards/1.png"></div>
												<div><img id="card_c5" style="display:none;" src="storage/front/img/cards/1.png"></div>
												<div><img id="card_c6" style="display:none;" src="storage/front/img/cards/1.png"></div>
											</div>
										</div>
										<div class="casino-detail detail-page-container position-relative">
											<div class="game-market market-2 ">
												<div class="market-title"><span>Bookmaker</span></div>
												<div class="market-header">
													<div class="market-nation-detail"><span class="market-nation-name">Min: 100 Max: 3L</span></div>
													<div class="market-odd-box back"><b>Back</b></div>
													<div class="market-odd-box lay"><b>Lay</b></div>
												</div>
												<div class="market-body " data-title="OPEN">
													<div class="market-row suspended-row market_1_row" data-title="SUSPENDED">
														<div class="market-nation-detail">
														<span class="market-nation-name">IND</span>
														<span class="d-flex justify-content-around w-100">
															<div class="market-nation-book market_1_b_exposure market_exposure"></div>
															<div id="middle_data_1_BOOKMAKER_ODDS" class="middle_data_BOOKMAKER_ODDS"></div>
														</span>
														<!-- <div class="market-nation-book market_1_b_exposure market_exposure"></div> -->
														</div>
														<div class="market-odd-box back market_1_b_btn back-1">

														</div>
														<div class="market-odd-box lay market_1_l_btn lay-1">
															
														</div>
													</div>
													<div class="market-row suspended-row market_2_row" data-title="ACTIVE">
														<div class="market-nation-detail">
														<span class="market-nation-name">AUS</span>
														<span class="d-flex justify-content-around w-100">
															<div class="market-nation-book market_2_b_exposure market_exposure"></div>
															<div id="middle_data_2_BOOKMAKER_ODDS" class="middle_data_BOOKMAKER_ODDS"></div>
														</span>
														<!-- <div class="market-nation-book market_2_b_exposure market_exposure"></div> -->
														</div>
														<div class="market-odd-box back market_2_b_btn back-1">

														</div>
														<div class="market-odd-box lay market_2_l_btn lay-1">
															
														</div>
													</div>
												</div>
											</div>
											<div class="game-market market-6 fancy-market fancyMarket bookmaker-market">
												<div class="market-title country-name"><span>Fancy</span></div>
												<div class="market-header">
													<div class="market-nation-detail"></div>
													<div class="market-odd-box lay"><b>No</b></div>
													<div class="market-odd-box back"><b>Yes</b></div>
													<div class="fancy-min-max-box"></div>
												</div>
												<div class="market-body fancy-tripple fancyTripple" data-title="OPEN">
													
												</div>
											</div>
											<div class="game-market market-6 fancy-market fancyTieMarket bookmaker-market">
												<div class="market-title country-name"><span>Tie</span></div>
												<div class="row row10">
													<div class="col-md-12">
														<div class="market-header">
														<div class="market-nation-detail"></div>
														<div class="market-odd-box back"><b>Back</b></div>
														<div class="market-odd-box lay"><b>Lay</b></div>
														<div class="fancy-min-max-box"></div>
														</div>
													</div>
												</div>
												<div class="market-body fancy-tripple fancyTie" data-title="OPEN">
													
												</div>
											</div>
											<div class="game-market market-6 fancy-market fancyMarket1 bookmaker-market">
												<div class="market-title country-name"><span>Fancy1</span></div>
												<div class="row row10">
													<div class="col-md-6">
														<div class="market-header">
														<div class="market-nation-detail"></div>
														<div class="market-odd-box back"><b>Back</b></div>
														<div class="market-odd-box lay"><b>Lay</b></div>
														<div class="fancy-min-max-box"></div>
														</div>
													</div>
													<div class="col-md-6 d-none d-xl-block">
														<div class="market-header">
														<div class="market-nation-detail"></div>
														<div class="market-odd-box back"><b>Back</b></div>
														<div class="market-odd-box lay"><b>Lay</b></div>
														<div class="fancy-min-max-box"></div>
														</div>
													</div>
												</div>
												<div class="market-body" data-title="OPEN">
													<div class="row row10 fancy-tripple fancyTripple1">
													
													</div>
												</div>
											</div>
											 <div class="casino-last-result-title"><span>Last Result</span> <span class="float-right"><a href="casinoresults?game_type=superover3" class="">View All</a></span></div>
											<div class="casino-last-results text-right mt-1" id="last-result">

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
								<div>
									<!---->
								</div>
							</div>
							<!---->
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
		var GAME_ID = "";
		//var SCOREBOARD_SOCKET_URL = "wss://sportsscore24.com";
		var SCOREBOARD_URL = "wss://sportsscore24.com/";
		var ssocket = null;
		var socketScoreBoard;


		function scoreboardConnect() {
			socketScoreBoard = io.connect(SCOREBOARD_URL);

			socketScoreBoard.on("connect", function() {

				socketScoreBoard.emit("subscribe", {
					type: 1,
					rooms: [parseInt(GAME_ID)]
				});
			});
			socketScoreBoard.on("error", function(abc) {

			});
			socketScoreBoard.on("update", function(response) {

				if (
					response.data != undefined &&
					response.data != null &&
					response.data.isfinished == 1
				) {
					socketScoreBoard.emit("unsubscribe", {
						type: 1,
						rooms: []
					});
					// $("#scoreboard-box").html("");
				} else {
					if (response.data != undefined && response.data != null) {
						//self.scoreboardData = response.data;
						updateScoreBoard(response.data);
					} else {
						$("#scoreboard-box").html("");
					}
				}
			});
			socketScoreBoard.on("disconnect", function() {
				// console.log("disconnect");
			});
		}


		function updateScoreBoard(data) {

			/* var won_match=data.spnmessage;
    if(data.isfinished == "1" || won_match.includes('won')){ */
			if (data.isfinished == "1") {
				$("#scoreboard-box").hide();
				return;
			} else {
				$("#scoreboard-box").show();
			}

			var scoreboardStr = "";
			scoreboardStr += "<div class=\"scorecard scorecard-mobile\"><div data-v-68a8f00a='' class='score-inner'>";
			scoreboardStr += "    <div class=\"row\">";
			scoreboardStr += "        <span class=\"team-name col-2\">" + data.spnnation1 + "<\/span>";
			scoreboardStr += "        <span class=\"score col-6\">" + data.score1 + "<\/span>";
			scoreboardStr += "<span class=\"col-2 run-rate\">";
			if (data.spnrunrate1 != null && data.spnrunrate1 != "") {
				scoreboardStr += "CRR " + data.spnrunrate1;
			}
			scoreboardStr += "<\/span>";
			scoreboardStr += "<span class=\"col-2 run-rate\">";
			if (data.spnreqrate1 != null && data.spnreqrate1 != "") {
				scoreboardStr += " RR " + data.spnreqrate1;
			}
			scoreboardStr += "<\/span>";
			scoreboardStr += "    <\/div>";
			scoreboardStr += "    <div class=\"row m-t-10\">";
			scoreboardStr += "        <span class=\"team-name col-2\">" + data.spnnation2 + "<\/span>";
			scoreboardStr += "        <span class=\"score col-6\">" + data.score2 + "<\/span>";
			scoreboardStr += "        <span class=\"col-2 run-rate\">";
			if (data.spnrunrate2 != null && data.spnrunrate2 != "") {
				scoreboardStr += "CRR " + data.spnrunrate2;
			}
			scoreboardStr += "<\/span>";
			scoreboardStr += "        <span class=\"col-2 run-rate\">";
			if (data.spnreqrate2 != null && data.spnreqrate2 != "") {
				scoreboardStr += " RR " + data.spnreqrate2;
			}
			scoreboardStr += "<\/span>";
			scoreboardStr += "    <\/div>";
			scoreboardStr += "    <div class=\"row\">";
			scoreboardStr += "        <div class=\"col-6 m-t-10\">";
			if (data.spnballrunningstatus != "") {
				scoreboardStr += "<p>";
				if (data.dayno != "") {
					scoreboardStr += "<span>Day " + data.dayno + "<\/span> | ";
				}
				scoreboardStr += data.spnballrunningstatus + "<\/p>";
			} else if (data.spnmessage != "") {
				scoreboardStr += "<p>";
				if (data.dayno != "") {
					scoreboardStr += "<span>Day " + data.dayno + "<\/span> | ";
				}
				scoreboardStr += data.spnmessage + "<\/p>";
			}

			scoreboardStr += "        <\/div>";
			scoreboardStr += "        <div class=\"col-6 ball-runs-container m-t-5\">";
			scoreboardStr += "            <p class=\"text-right ball-by-ball\">";
			$.each(data.balls, function(key, ballVal) {
				if (ballVal != "") {
					var b_class = "";
					if (ballVal == '4') {
						b_class = "four";
					} else if (ballVal == '6') {
						b_class = "six";
					} else if (ballVal == 'W') {
						b_class = "wicket";
					}
					scoreboardStr += "<span class=\"ball-runs " + b_class + "\">" + ballVal + "<\/span> ";
				}
			});
			scoreboardStr += "            <\/p>";
			scoreboardStr += "        <\/div>";
			scoreboardStr += "    <\/div>";
			scoreboardStr += "<\/div><\/div>";
			$("#scoreboard-box").html(scoreboardStr);
			return;
		}

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
		var markettype = "SUPER_OVER3";
		var markettype_2 = markettype;
		var back_html = "";
		var lay_html = "";
		var gstatus = "";
		var last_result_id = '0';
var selectorIdArray = [1, 2];
		function websocket(type) {
			socket = io.connect(websocketurl, {
				transports: ['websocket']
			});
			socket.on('connect', function() {
				socket.emit('Room', 'superover3');
			});
			socket.on('liveScoreGameIn', function(args) {
				if (args && args.data) {
					updateScoreBoard(args.data);
				}
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

					if (oldGameId != data.t1[0].mid) {
						GAME_ID = (data.t1[0].mid && typeof data.t1[0].mid == "string") ? data.t1[0].mid.split('.')[1] : data.t1[0].mid;
						scoreboardConnect();
					}
					oldGameId = data.t1[0].mid;
					if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
						$(".casino-remark").text(data.t1[0].remark);
						var desc = data.t1[0].desc;

						$("#card_c1").hide();
							$("#card_c2").hide();
							$("#card_c3").hide();
							$("#card_c4").hide();
							$("#card_c5").hide();
							$("#card_c6").hide();
							
						if (data.t1[0].C1 && data.t1[0].C1 != 1) {
							$("#card_c1").attr("src", site_url + "storage/front/img/cards/superover/" + data.t1[0].C1 + ".png");
							$("#card_c1").show();
						}
						if (data.t1[0].C2 && data.t1[0].C2 != 1) {
							$("#card_c2").attr("src", site_url + "storage/front/img/cards/superover/" + data.t1[0].C2 + ".png");
							$("#card_c2").show();
						}
						if (data.t1[0].C3 && data.t1[0].C3 != 1) {
							$("#card_c3").attr("src", site_url + "storage/front/img/cards/superover/" + data.t1[0].C3 + ".png");
							$("#card_c3").show();
						}
						if (data.t1[0].C4 && data.t1[0].C4 != 1) {
							$("#card_c4").attr("src", site_url + "storage/front/img/cards/superover/" + data.t1[0].C4 + ".png");
							$("#card_c4").show();
						}
						if (data.t1[0].C5 && data.t1[0].C5 != 1) {
							$("#card_c5").attr("src", site_url + "storage/front/img/cards/superover/" + data.t1[0].C5 + ".png");
							$("#card_c5").show();
						}
						if (data.t1[0].C6 && data.t1[0].C6 != 1) {
							$("#card_c6").attr("src", site_url + "storage/front/img/cards/superover/" + data.t1[0].C6 + ".png");
							$("#card_c6").show();
						}


					}
					clock.setValue(data.t1[0].autotime);
					$(".round_no").text(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
					$("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
					eventId = data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid;

					for (var j in data['t2']) {
						selectionid = parseInt(data['t2'][j].sid);
						runner = data['t2'][j].nat || data['t2'][j].nation;
						b1 = data['t2'][j].b1;
						bs1 = data['t2'][j].bs1;
						l1 = data['t2'][j].l1;
						ls1 = data['t2'][j].ls1;

						b11 = b1;
						markettype = "SUPER_OVER3";

						b1 = b1 == 0 ? "-" : b1;
						bs1 = bs1 == 0 ? "" : bs1;

						l1 = l1 == 0 ? "-" : l1;
						ls1 = ls1 == 0 ? "" : ls1;


						back_html = '<span class="odd d-block">' + b1 + '</span><span class="d-block">' + bs1 + '</span>';


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


						lay_html = '<span class="odd d-block">' + l1 + '</span><span class="d-block">' + ls1 + '</span>';


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

						gstatus = data['t2'][j].status.toString();
						if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {
							$(".market_" + selectionid + "_row").attr("data-title", 'SUSPENDED');
							$(".market_" + selectionid + "_row").addClass("suspended-row");

							$(".market_" + selectionid + "_b_btn").removeClass("back-1");
							$(".market_" + selectionid + "_b_btn").addClass("betting-disabled");
							$(".market_" + selectionid + "_l_btn").removeClass("lay-1");
							$(".market_" + selectionid + "_l_btn").addClass("betting-disabled");
						} else {

							$(".market_" + selectionid + "_row").removeAttr("data-title");
							$(".market_" + selectionid + "_row").removeClass("suspended-row");
							$(".market_" + selectionid + "_b_btn").addClass("back-1");
							$(".market_" + selectionid + "_b_btn").removeClass("betting-disabled");
							$(".market_" + selectionid + "_l_btn").addClass("lay-1");
							$(".market_" + selectionid + "_l_btn").removeClass("betting-disabled");
						}
					}



					if (data['t3'] != null) {


						var fancy_data = '';
						for (var f in data['t3']) {
							selectionid = parseInt(data['t3'][f].sid);
							runner = data['t3'][f].nat;
							b1 = data['t3'][f].b1;
							bs1 = data['t3'][f].bs1;
							l1 = data['t3'][f].l1;
							ls1 = data['t3'][f].ls1;
							max = data['t3'][f].max;
							max = max / 1000;
							min = data['t3'][f].min;

							var minmax = `Min:<span>${min}</span><br>Max:<span>${max}K</span>`;
							var back_class="";
							var lay_class="";
							if(b1 != 0){
								back_class="back-1";
							}
							if(l1 != 0){
								lay_class="lay-1";
							}
							b1 = b1 == 0 ? "-" : parseInt(b1);
							bs1 = bs1 == 0 ? "" : parseInt(bs1);

							l1 = l1 == 0 ? "-" : parseInt(l1);
							ls1 = ls1 == 0 ? "" : parseInt(ls1);


							is_suspended = '';
							is_suspended_title = '';
							gstatus = data['t3'][f].status.toString();
							if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {
								is_suspended = 'suspended-row';
                            	is_suspended_title = 'SUSPENDED';
							}



							back_html = '<span class="odd d-block market-odd">' + b1 + '</span><span class="market-volume">' + bs1 + '</span>';
							lay_html = '<span class="odd d-block market-odd">' + l1 + '</span><span class="market-volume">' + ls1 + '</span>';



							if ($("#five_fancy_" + selectionid) && $("#five_fancy_" + selectionid).length > 0) {


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
								$(".market_" + selectionid + "_b_btn").attr("fullfancymarketrate", bs1);

								$(".market_" + selectionid + "_l_btn").attr("side", "Lay");
								$(".market_" + selectionid + "_l_btn").attr("selectionid", selectionid);
								$(".market_" + selectionid + "_l_btn").attr("marketid", selectionid);
								$(".market_" + selectionid + "_l_btn").attr("runner", runner);
								$(".market_" + selectionid + "_l_btn").attr("marketname", runner);
								$(".market_" + selectionid + "_l_btn").attr("eventid", eventId);
								$(".market_" + selectionid + "_l_btn").attr("markettype", markettype);
								$(".market_" + selectionid + "_l_btn").attr("event_name", markettype);
								$(".market_" + selectionid + "_l_btn").attr("fullmarketodds", l1);
								$(".market_" + selectionid + "_l_btn").attr("fullfancymarketrate", ls1);
								$(".market_" + selectionid + "_l_btn").html(lay_html);
								/* $(".market_" + selectionid + "_min_max").html(`${minmax}`); */
								if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {
									$(".market_" + selectionid + "_row").attr("data-title", 'SUSPENDED');
									$(".market_" + selectionid + "_row").addClass("suspended-row");

									$(".market_" + selectionid + "_b_btn").removeClass("back-1");
									$(".market_" + selectionid + "_b_btn").addClass("betting-disabled");
									$(".market_" + selectionid + "_l_btn").removeClass("lay-1");
									$(".market_" + selectionid + "_l_btn").addClass("betting-disabled");
								} else {

									$(".market_" + selectionid + "_row").removeAttr("data-title");
									$(".market_" + selectionid + "_row").removeClass("suspended-row");
									$(".market_" + selectionid + "_b_btn").addClass(back_class);
									$(".market_" + selectionid + "_b_btn").removeClass("betting-disabled");
									$(".market_" + selectionid + "_l_btn").addClass(lay_class);
									$(".market_" + selectionid + "_l_btn").removeClass("betting-disabled");
								}
							} else {

								fancy_data+= `<div>
												<div class="fancy-market " data-title="ACTIVE">
													<div id="five_fancy_${selectionid}" data-title="${is_suspended_title}" class="table-row ${is_suspended} market_${selectionid}_row market-row">
														<div class="market-nation-detail">
															<span class="market-nation-name pointer">${runner}</span>
															<div class="market-nation-book class="market_${selectionid}_b_exposure market_exposure""></div>
														</div>
														 <div class="market-odd-box lay betting-disabled market_${selectionid}_b_btn ${lay_class}" side="Lay" selectionid="${selectionid}" marketid="${selectionid}" runner="${runner}" marketname="${runner}" eventid="${eventId}" markettype="${markettype}" event_name="${markettype}" fullmarketodds="${l1}" fullfancymarketrate="${l1}">${lay_html}</div>

														 <div class="market-odd-box back betting-disabled market_${selectionid}_l_btn ${back_class}" side="Back" selectionid="${selectionid}" marketid="${selectionid}" runner="${runner}" marketname="${runner}" eventid="${eventId}" markettype="${markettype}" event_name="${markettype}" fullmarketodds="${b1}" fullfancymarketrate="${b1}">${back_html}</div>

														
														<div class="fancy-min-max-box">
															<div class="fancy-min-max market_${selectionid}_min_max">${minmax}</div>
														</div>
													</div>
												</div>
											</div>`;

								/* fancy_data += '	<div id="five_fancy_' + selectionid + '" data-title="' + is_suspended + '" class="table-row ' + is_suspended + ' market_' + selectionid + '_row">';
								fancy_data += '		<div class="float-left country-name box-7" style="border-bottom: 0px;">';
								fancy_data += '  		<p class="m-b-0"><a href="javascript:void(0)">' + runner + '</a></p>';
								fancy_data += '				<p class="m-b-0"><span style="color: black;" class="market_' + selectionid + '_b_exposure market_exposure">0</span></p>';
								fancy_data += '		</div>';


								
								fancy_data += '		<div class="box-1 lay float-left text-center betting-disabled market_' + selectionid + '_l_btn '+lay_class+'">' + lay_html + '</div>';
								fancy_data += '     <div class="box-1 back float-left text-center betting-disabled market_' + selectionid + '_b_btn '+back_class+'">' + back_html + '</div>';
								fancy_data += '		<div class="box-1 float-left text-right market_' + selectionid + '_min_max" style="border-bottom: 0px;font-size:12px;">' + minmax + '</div>';
								fancy_data += '	</div>'; */
							}




							$(".fancyMarket").show();

						}

						if (fancy_data != "") {
							$(".fancyTripple").html(fancy_data);
						}

					} else {
						$(".fancyTripple").html("");
						$(".fancyMarket").hide();
					}

					if (data['t4'] != null) {
						var fancy_data = '';
						var fancy_tie_data = '';
						for (var f in data['t4']) {
							selectionid = parseInt(data['t4'][f].sid);
							runner = data['t4'][f].nat;
							b1 = data['t4'][f].b1;
							bs1 = data['t4'][f].bs1;
							l1 = data['t4'][f].l1;
							ls1 = data['t4'][f].ls1;
							max = data['t4'][f].max;
							max = max / 1000;
							min = data['t4'][f].min;

							var minmax = `Min:<span>${min}</span><br>Max:<span>${max}K</span>`;
							var back_class="";
							var lay_class="";
							if(b1 != 0){
								back_class="back-1";
							}
							
							if(l1 != 0){
								lay_class="lay-1";
							}
							b1 = b1 == 0 ? "-" : parseFloat(b1);
							bs1 = bs1 == 0 ? "" : parseInt(bs1);

							l1 = l1 == 0 ? "-" : parseFloat(l1);
							ls1 = ls1 == 0 ? "" : parseInt(ls1);


							is_suspended = '';
                        	is_suspended_title = '';
							gstatus = data['t4'][f].status.toString();
							if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {
								is_suspended = 'suspended';
								is_suspended_title = 'SUSPENDED';
							}



							back_html = '<span class="odd d-block market-odd">' + b1 + '</span><span class="market-volume">' + bs1 + '</span>';
							lay_html = '<span class="odd d-block market-odd">' + l1 + '</span><span class="market-volume">' + ls1 + '</span>';
							if (selectionid == 7 || selectionid == 9) {
								if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {
									continue;
								}
							}
							if (runner.toLowerCase() == "tie") {
								if ($("#five_fancy_tie_" + selectionid) && $("#five_fancy_tie_" + selectionid).length > 0) {


									$(".market_" + selectionid + "_b_btn").html(back_html);
									$(".market_" + selectionid + "_b_btn").attr("side", "Back");
									$(".market_" + selectionid + "_b_btn").attr("selectionid", selectionid);
									$(".market_" + selectionid + "_b_btn").attr("marketid", selectionid);
									$(".market_" + selectionid + "_b_btn").attr("runner", runner);
									$(".market_" + selectionid + "_b_btn").attr("marketname", runner);
									$(".market_" + selectionid + "_b_btn").attr("eventid", eventId);
									$(".market_" + selectionid + "_b_btn").attr("markettype", 'FANCY1_ODDS');
									$(".market_" + selectionid + "_b_btn").attr("event_name", markettype);
									$(".market_" + selectionid + "_b_btn").attr("fullmarketodds", b1);
									$(".market_" + selectionid + "_b_btn").attr("fullfancymarketrate", bs1);

									$(".market_" + selectionid + "_l_btn").attr("side", "Lay");
									$(".market_" + selectionid + "_l_btn").attr("selectionid", selectionid);
									$(".market_" + selectionid + "_l_btn").attr("marketid", selectionid);
									$(".market_" + selectionid + "_l_btn").attr("runner", runner);
									$(".market_" + selectionid + "_l_btn").attr("marketname", runner);
									$(".market_" + selectionid + "_l_btn").attr("eventid", eventId);
									$(".market_" + selectionid + "_l_btn").attr("markettype", 'FANCY1_ODDS');
									$(".market_" + selectionid + "_l_btn").attr("event_name", markettype);
									$(".market_" + selectionid + "_l_btn").attr("fullmarketodds", l1);
									$(".market_" + selectionid + "_l_btn").attr("fullfancymarketrate", ls1);
									$(".market_" + selectionid + "_l_btn").html(lay_html);
									$(".market_" + selectionid + "_min_max").html(`${minmax}`);
									if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {
										$(".market_" + selectionid + "_row").attr("data-title", 'SUSPENDED');
										$(".market_" + selectionid + "_row").addClass("suspended-row");

										$(".market_" + selectionid + "_b_btn").removeClass("back-1");
										$(".market_" + selectionid + "_b_btn").addClass("betting-disabled");
										$(".market_" + selectionid + "_l_btn").removeClass("lay-1");
										$(".market_" + selectionid + "_l_btn").addClass("betting-disabled");
									} else {

										$(".market_" + selectionid + "_row").removeAttr("data-title");
										$(".market_" + selectionid + "_row").removeClass("suspended-row");
										$(".market_" + selectionid + "_b_btn").addClass(back_class);
										$(".market_" + selectionid + "_b_btn").removeClass("betting-disabled");
										$(".market_" + selectionid + "_l_btn").addClass(lay_class);
										$(".market_" + selectionid + "_l_btn").removeClass("betting-disabled");
									}
								} else {

									fancy_tie_data += `<div class="row row10">
														<div class="col-md-12">
															<div class="fancy-market " data-title="ACTIVE">
																<div id="five_fancy_tie_${selectionid}" data-title="${is_suspended_title}" class="market-row table-row ${is_suspended} market_${selectionid}_row">
																	<div class="market-nation-detail">
																		<span class="market-nation-name">${runner}</span>
																		<div class="market-nation-book market_${selectionid}_b_exposure market_exposure"></div>
																	</div>


																	 <div class="market-odd-box back betting-disabled market_${selectionid}_b_btn ${back_class}" side="Back" selectionid="${selectionid}" marketid="${selectionid}" runner="${runner}" marketname="${runner}" eventid="${eventId}" markettype="FANCY1_ODDS" event_name="${markettype}" fullmarketodds="${b1}" fullfancymarketrate="${b1}">${back_html}</div>

																	<div class="market-odd-box lay betting-disabled market_${selectionid}_l_btn ${lay_class}" side="Lay" selectionid="${selectionid}" marketid="${selectionid}" runner="${runner}" marketname="${runner}" eventid="${eventId}" markettype="FANCY1_ODDS" event_name="${markettype}" fullmarketodds="${l1}" fullfancymarketrate="${l1}">${lay_html}</div>

														

																
																	<div class="fancy-min-max-box">
																		<div class="fancy-min-max market_${selectionid}_min_max">${minmax}</div>
																	</div>
																</div>
															</div>
														</div>
													</div>`;

									/* fancy_tie_data += '	<div id="five_fancy_tie_' + selectionid + '" data-title="' + is_suspended + '" class="table-row ' + is_suspended + ' market_' + selectionid + '_row">';
									fancy_tie_data += '		<div class="float-left country-name box-7" style="border-bottom: 0px;">';
									fancy_tie_data += '  		<p class="m-b-0"><a href="javascript:void(0)">' + runner + '</a></p>';
									fancy_tie_data += '				<p class="m-b-0"><span style="color: black;" class="market_' + selectionid + '_b_exposure market_exposure">0</span></p>';
									fancy_tie_data += '		</div>';


									fancy_tie_data += '     <div class="box-1 back float-left text-center betting-disabled market_' + selectionid + '_b_btn '+back_class+'">' + back_html + '</div>';
									fancy_tie_data += '		<div class="box-1 lay float-left text-center betting-disabled market_' + selectionid + '_l_btn '+lay_class+'">' + lay_html + '</div>';
									fancy_tie_data += '		<div class="box-1 float-left text-right market_' + selectionid + '_min_max" style="border-bottom: 0px;font-size:12px;">' + minmax + '</div>';
									fancy_tie_data += '	</div>'; */
								}




								$(".fancyTieMarket").show();
							} else {
								if (selectionid == 7 || selectionid == 9) {
									if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {
										continue;
									}
								}
								if ($("#five_fancy_" + selectionid) && $("#five_fancy_" + selectionid).length > 0) {


									$(".market_" + selectionid + "_b_btn").html(back_html);
									$(".market_" + selectionid + "_b_btn").attr("side", "Back");
									$(".market_" + selectionid + "_b_btn").attr("selectionid", selectionid);
									$(".market_" + selectionid + "_b_btn").attr("marketid", selectionid);
									$(".market_" + selectionid + "_b_btn").attr("runner", runner);
									$(".market_" + selectionid + "_b_btn").attr("marketname", runner);
									$(".market_" + selectionid + "_b_btn").attr("eventid", eventId);
									$(".market_" + selectionid + "_b_btn").attr("markettype", 'FANCY1_ODDS');
									$(".market_" + selectionid + "_b_btn").attr("event_name", markettype);
									$(".market_" + selectionid + "_b_btn").attr("fullmarketodds", b1);
									$(".market_" + selectionid + "_b_btn").attr("fullfancymarketrate", bs1);

									$(".market_" + selectionid + "_l_btn").attr("side", "Lay");
									$(".market_" + selectionid + "_l_btn").attr("selectionid", selectionid);
									$(".market_" + selectionid + "_l_btn").attr("marketid", selectionid);
									$(".market_" + selectionid + "_l_btn").attr("runner", runner);
									$(".market_" + selectionid + "_l_btn").attr("marketname", runner);
									$(".market_" + selectionid + "_l_btn").attr("eventid", eventId);
									$(".market_" + selectionid + "_l_btn").attr("markettype", 'FANCY1_ODDS');
									$(".market_" + selectionid + "_l_btn").attr("event_name", markettype);
									$(".market_" + selectionid + "_l_btn").attr("fullmarketodds", l1);
									$(".market_" + selectionid + "_l_btn").attr("fullfancymarketrate", ls1);
									$(".market_" + selectionid + "_l_btn").html(lay_html);
									$(".market_" + selectionid + "_min_max").html(`${minmax}`);
									if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {
										$(".market_" + selectionid + "_row").attr("data-title", 'SUSPENDED');
										$(".market_" + selectionid + "_row").addClass("suspended-row");

										$(".market_" + selectionid + "_b_btn").removeClass("back-1");
										$(".market_" + selectionid + "_b_btn").addClass("betting-disabled");
										$(".market_" + selectionid + "_l_btn").removeClass("lay-1");
										$(".market_" + selectionid + "_l_btn").addClass("betting-disabled");
									} else {

										$(".market_" + selectionid + "_row").removeAttr("data-title");
										$(".market_" + selectionid + "_row").removeClass("suspended-row");
										$(".market_" + selectionid + "_b_btn").addClass(back_class);
										$(".market_" + selectionid + "_b_btn").removeClass("betting-disabled");
										$(".market_" + selectionid + "_l_btn").addClass(lay_class);
										$(".market_" + selectionid + "_l_btn").removeClass("betting-disabled");
									}
								} else {

									fancy_data += `<div class="col-md-6">
															<div class="fancy-market " data-title="ACTIVE">
																<div id="five_fancy_${selectionid}" data-title="${is_suspended_title}" class="market-row table-row ${is_suspended} market_${selectionid}_row">
																	<div class="market-nation-detail">
																		<span class="market-nation-name">${runner}</span>
																		<div class="market-nation-book market_${selectionid}_b_exposure market_exposure"></div>
																	</div>
																	<div class="market-odd-box back betting-disabled market_${selectionid}_b_btn ${back_class}" side="Back" selectionid="${selectionid}" marketid="${selectionid}" runner="${runner}" marketname="${runner}" eventid="${eventId}" markettype="FANCY1_ODDS" event_name="${markettype}" fullmarketodds="${b1}" fullfancymarketrate="${b1}">${back_html}</div>
																	<div class="market-odd-box lay betting-disabled market_${selectionid}_l_btn ${lay_class}" side="Lay" selectionid="${selectionid}" marketid="${selectionid}" runner="${runner}" marketname="${runner}" eventid="${eventId}" markettype="FANCY1_ODDS" event_name="${markettype}" fullmarketodds="${l1}" fullfancymarketrate="${l1}">${lay_html}</div>
																	<div class="fancy-min-max-box">
																		<div class="fancy-min-max market_${selectionid}_min_max">${minmax}</div>
																	</div>
																</div>
															</div>
														</div>`;

									/* fancy_data += '<div class="col-6">	<div id="five_fancy_' + selectionid + '" data-title="' + is_suspended + '" class="table-row ' + is_suspended + ' market_' + selectionid + '_row">';
									fancy_data += '		<div class="float-left country-name box-6" style="border-bottom: 0px;">';
									fancy_data += '  		<p class="m-b-0"><a href="javascript:void(0)">' + runner + '</a></p>';
									fancy_data += '				<p class="m-b-0"><span style="color: black;" class="market_' + selectionid + '_b_exposure market_exposure">0</span></p>';
									fancy_data += '		</div>';


									fancy_data += '     <div class="box-1 back float-left text-center betting-disabled market_' + selectionid + '_b_btn '+back_class+'">' + back_html + '</div>';
									fancy_data += '		<div class="box-1 lay float-left text-center betting-disabled market_' + selectionid + '_l_btn '+lay_class+'">' + lay_html + '</div>';
									fancy_data += '		<div class="box-2 float-left text-right market_' + selectionid + '_min_max" style="border-bottom: 0px;font-size:12px;">' + minmax + '</div>';
									fancy_data += '	</div></div>'; */
								}




								$(".fancyMarket1").show();
							}
						}

						if (fancy_data != "") {
							$(".fancyTripple1").html(fancy_data);
						}
						if (fancy_tie_data != "") {
							$(".fancyTie").html(fancy_tie_data);
						}
					} else {
						$(".fancyTie").html("");
						$(".fancyTripple1").html("");
						$(".fancyMarket1").hide();
						$(".fancyTieMarket").hide();
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
						ctype: 'diamond',
						card: data[0],
						rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0])
					}
					return obj;
				} else {
					data = data1;
					data = data.split('HH');
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
						data = data.split('SS');
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
			$("#card_c1").attr("storage/front/img/cards/1.png");
			$("#card_c2").attr("storage/front/img/cards/1.png");
			$("#card_c3").attr("storage/front/img/cards/1.png");
			$("#card_c4").attr("storage/front/img/cards/1.png");
			$("#card_c5").attr("storage/front/img/cards/1.png");
			$("#card_c6").attr("storage/front/img/cards/1.png");

			$("#card_c1").hide();
			$("#card_c2").hide();
			$("#card_c3").hide();
			$("#card_c4").hide();
			$("#card_c5").hide();
			$("#card_c6").hide();
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
				casino_type = "'superover3'";
				data.forEach((runData) => {
					if (parseInt(runData.win) == 1) {
						ab = "playera";
						ab1 = "I";

					} else if (parseInt(runData.win) == 2) {
						ab = "playerb";
						ab1 = "A";

					} else {
						ab = "playertie";
						ab1 = "T";
					}

					eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] : runData.mid;
					html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs  ' + ab + ' last-result">' + ab1 + '</span>';
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
        bet_markettype1 = $("#bet_markettype").val();
        bet_marketId = $("#bet_marketId").val();
        if (bet_marketId == "1" || bet_marketId == "2") {
            bet_markettype1 = "BOOKMAKER_ODDS";
        }
        bet_marketId = $("#bet_marketId").val();
        bet_event_id = $("#bet_event_id").val();
        $.ajax({
            type: 'POST',
            url: 'ajaxfiles/place_bet_net_exposure_superover.php',
            dataType: 'json',
            data: {
                eventId: bet_event_id,
                stack: inputStake,
                runs: odds,
                bet_market_type: bet_markettype,
                marketId: bet_marketId,
                bet_stake_side: bet_stake_side,
                market_ids: selectorIdArray
            },
            success: function(response) {
                var status = response.status;
                if (status == 'ok') {


                    if (response.data) {
                        //if(response.data == "MATCH_ODDS" ){
                        for (var i in response.data) {
                            $(".middle_data_" + i).hide();
                            for (var ij = 1; ij <= Object.keys(response.data[i].market_ids).length; ij++) {
                                var team = "team_" + ij;
                                var market_1 = parseInt(response.data[i].market_ids[team]);
                                var team_1_exposure = parseInt(response.data[i].exposure[team]);
                                $("#middle_data_" + market_1 + "_" + i).text(team_1_exposure);
                                if (team_1_exposure != 0) {
                                    $(".middle_data_" + i).show();
                                }
                                if (team_1_exposure >= 0) {
                                    $("#middle_data_" + market_1 + "_" + i).css('color', 'green');

                                } else {
                                    $("#middle_data_" + market_1 + "_" + i).css('color', 'red');
                                }
                                var old_val=$(".market_" + market_1 + "_b_exposure").text();
                                if(old_val == team_1_exposure){
                                    $("#middle_data_" + market_1 + "_" + i).hide();
                                }
                            }
                        }

                    }

                }
            }
        });
			profit=0;
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
			profit=0;
        bet_markettype1 = $("#bet_markettype").val();
        bet_marketId = $("#bet_marketId").val();
        if (bet_marketId == "1" || bet_marketId == "2") {
            bet_markettype1 = "BOOKMAKER_ODDS";
        }
        bet_marketId = $("#bet_marketId").val();
        bet_event_id = $("#bet_event_id").val();
        $.ajax({
            type: 'POST',
            url: 'ajaxfiles/place_bet_net_exposure_superover.php',
            dataType: 'json',
            data: {
                eventId: bet_event_id,
                stack: inputStake,
                runs: odds,
                bet_market_type: bet_markettype,
                marketId: bet_marketId,
                bet_stake_side: bet_stake_side,
                market_ids: selectorIdArray
            },
            success: function(response) {
                var status = response.status;
                if (status == 'ok') {


                    if (response.data) {
                        //if(response.data == "MATCH_ODDS" ){
                        for (var i in response.data) {
                            $(".middle_data_" + i).hide();
                            for (var ij = 1; ij <= Object.keys(response.data[i].market_ids).length; ij++) {
                                var team = "team_" + ij;
                                var market_1 = parseInt(response.data[i].market_ids[team]);
                                var team_1_exposure = parseInt(response.data[i].exposure[team]);
                                $("#middle_data_" + market_1 + "_" + i).text(team_1_exposure);
                                if (team_1_exposure != 0) {
                                    $(".middle_data_" + i).show();
                                }
                                if (team_1_exposure >= 0) {
                                    $("#middle_data_" + market_1 + "_" + i).css('color', 'green');
                                } else {
                                    $("#middle_data_" + market_1 + "_" + i).css('color', 'red');
                                }
                                var old_val=$("#last_data_" + market_1 + "_" + i).text();
                                console.log(old_val,"=",team_1_exposure);
                                if(old_val == team_1_exposure){
                                    $("#middle_data_" + market_1 + "_" + i).hide();
                                }
                            }
                        }

                    }

                }
            }
        });
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
			eventType = 'SUPER_OVER3';
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
			if (bet_markettype != "FANCY_ODDS") {
				bet_market_type = bet_markettype;
				runsNo = parseFloat($("#odds_val").val());
				oddsNo = parseFloat($("#odds_val").val());


				if (bet_marketId > 2) {
					oddsNo = parseFloat($("#fullfancymarketrate").val());
				}
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
			/* setTimeout(function() { */
				$.ajax({
					type: 'POST',
					url: 'ajaxfiles/bet_place_super_over_3.php',
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
								"iconClass":"toast-success",
								"positionClass":"toast-top-center",
								"extendedTImeout": "0"
							});
							$(".middle_data_BOOKMAKER_ODDS").hide();
						} else {
							/* $("#bet-error-class").addClass("b-toast-danger"); */
							toastr.clear()
							toastr.warning("", message, {
								"timeOut": "3000",
								"iconClass":"toast-warning",
								"positionClass":"toast-top-center",
								"extendedTImeout": "0"
							});
						}
						error_message_text = message;
						$("#errorMsgText").text(error_message_text);
						$("#errorMsg").fadeIn('fast').delay(3000).hide(0);
						$(".close-bet-slip").click();
						refresh(markettype);
					},
					error: function(response) {
						$(".placeBetLoader").removeClass('show');
						refresh(markettype);
					}
				});
			/* }, bet_sec - 2000); */
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