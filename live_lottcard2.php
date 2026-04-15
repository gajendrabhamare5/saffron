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
$lottcard=true;
?>
<!DOCTYPE html>
<html lang="en">

<?php
include("head_css.php");
?>
<style>
	.lottery-box .lottery-card img {
		width: 55px !important;
		cursor: pointer;
	}

	.lottery .single,
	.lottery .double,
	.lottery .tripple {
		display: flex;
		flex-wrap: wrap;
		justify-content: space-between;
		height: auto;
		align-items: flex-start;
		padding: 5px;
	}

	.lottery-box {
		display: flex;
		flex-wrap: wrap;
		justify-content: space-between;
		align-items: center;
		align-content: center;
		padding: 0;
		width: 100%;
	}

	.lottery-box .lottery-card {
		width: 10%;
		text-align: center;
		margin: 5px 0;
	}

	.random-bets {
		width: auto;
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
		background-color: var(--theme2-bg);
		color: var(--secondary-color);
		border-radius: 16px;
		padding: 5px;
		margin: 10px auto 0;
	}

	.lottery-btn.active {
		border: 1px solid var(--theme1-bg);
		background-color: var(--theme1-bg);
		color: var(--secondary-color);
	}

	.random-bets button {
		min-width: 50px;
		height: 40px;
		margin-right: 7px;
		margin-bottom: 7px;
		border-radius: 8px;
	}
	.ballss{
		margin-right: 5px;
		width: 45px;
		animation-name: ballspin;
		animation-duration: 5000ms;
		animation-iteration-count: infinite;
		animation-timing-function: linear;
	}
	@keyframes ballspin{
		0% {
    transform: rotate(0deg);
		}

		100% {
			transform: rotate(360deg);
		}
	}
.ball-runs{
	height: 35px !important;
    width: 45px !important;
    border-radius: 35% !important;
    line-height: 35px !important;
}
.lottery-buttons {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-bottom: 5px;
}
.lottery-buttons .btn {
    background: var(--theme1-bg);
    color: #fff;
    width: 30%;
    font-size: 18px;
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
							<div class="row row5 teenpattixyz">
								<div class="col-md-9 coupon-card featured-box-detail">
									<div class="coupon-card">
										<div class="game-heading"><span class="card-header-title">Lottery
											</span> <span class="float-right">
												Round ID:
												<span class="round_no">0</span><!--  | Min: <span >100</span> | Max: <span >200000</span> --></span>
										</div>
										<!---->
										<div class="video-container">
										<?php
  if(!empty(IFRAME_URL_SET)){
                               ?>
                               <iframe class="iframedesign" src="<?php echo IFRAME_URL."".LOTTCARD_CODE;?>" width="100%" height="200px" style="border: 0px;"></iframe>
                               <?php
                                
                            }else{
                                ?>
                                <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                <?php

                            }
                            ?>
											<!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . LOTTCARD_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
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
																<div class="inn">2</div>
															</div>
															<div class="down">
																<div class="shadow"></div>
																<div class="inn">2</div>
															</div>
														</a>
													</li>
													<li class="flip-clock-active">
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
												</ul>
											</div>
											<div class="video-overlay">
												<div class="d-flex flex-column">
													<img id="card_c1" src="storage/front/img/cards/1.png">
													<img id="card_c2" src="storage/front/img/cards/1.png">
													<img id="card_c3" src="storage/front/img/cards/1.png">
												</div>
											</div>
										</div>
										<div class="card-content m-t-5 m-b-5 lottery">
											<ul class="nav nav-tabs m-b-5 m-t-5">
												<li class="nav-item"><a href="javascript:void(0);" class="nav-link active tab_btn single_tab_btn" data-tab_name="single">Single</a></li>
												<li class="nav-item"><a href="javascript:void(0);" class="nav-link tab_btn double_tab_btn" data-tab_name="double">Double</a></li>
												<li class="nav-item"><a href="javascript:void(0);" class="nav-link tab_btn tripple_tab_btn" data-tab_name="tripple">Tripple</a></li>
											</ul>
											<div class="tab-content ">
												<div id="single" class="tab-pane tab_btn_block active">
													<div class="single market_1_row" data-title="SUSPENDED">
														<div class="lottery-box">
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/1.jpg" class="card-image back-1 market_1_b_btn" nat_1="1" />
															</div>
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/2.jpg" class="card-image back-1 market_1_b_btn" nat_1="2" />
															</div>
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/3.jpg" class="card-image back-1 market_1_b_btn" nat_1="3" />
															</div>
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/4.jpg" class="card-image back-1 market_1_b_btn" nat_1="4" />
															</div>
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/5.jpg" class="card-image back-1 market_1_b_btn" nat_1="5" />
															</div>
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/6.jpg" class="card-image back-1 market_1_b_btn" nat_1="6" />
															</div>
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/7.jpg" class="card-image back-1 market_1_b_btn" nat_1="7" />
															</div>
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/8.jpg" class="card-image back-1 market_1_b_btn" nat_1="8" />
															</div>
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/9.jpg" class="card-image back-1 market_1_b_btn" nat_1="9" />
															</div>
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/10.jpg" class="card-image back-1 market_1_b_btn" nat_1="0" />
															</div>



														</div>
													</div>

												</div>
												<div id="double" class="tab-pane tab_btn_block">
													<div class="double market_2_row" data-title="SUSPENDED">
														<div class="lottery-box">
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/1.jpg" class="card-image back-1 market_2_b_btn" nat_1="1" />
															</div>
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/2.jpg" class="card-image back-1 market_2_b_btn" nat_1="2" />
															</div>
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/3.jpg" class="card-image back-1 market_2_b_btn" nat_1="3" />
															</div>
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/4.jpg" class="card-image back-1 market_2_b_btn" nat_1="4" />
															</div>
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/5.jpg" class="card-image back-1 market_2_b_btn" nat_1="5" />
															</div>
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/6.jpg" class="card-image back-1 market_2_b_btn" nat_1="6" />
															</div>
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/7.jpg" class="card-image back-1 market_2_b_btn" nat_1="7" />
															</div>
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/8.jpg" class="card-image back-1 market_2_b_btn" nat_1="8" />
															</div>
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/9.jpg" class="card-image back-1 market_2_b_btn" nat_1="9" />
															</div>
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/10.jpg" class="card-image back-1 market_2_b_btn" nat_1="0" />
															</div>



														</div>
														<div class="random-bets">
															<h4 class="w-100 text-center mb-1">Random Bets</h4>
															<button class="lottery-btn market_2_b_btn active" nat_1="5">5</button>
															<button class="lottery-btn market_2_b_btn active" nat_1="10">10</button>
															<button class="lottery-btn market_2_b_btn active" nat_1="15">15</button>
															<button class="lottery-btn market_2_b_btn active" nat_1="20">20</button>
															<button class="lottery-btn market_2_b_btn active" nat_1="25">25</button>
															<button class="lottery-btn market_2_b_btn active" nat_1="50">50</button>
															<button class="lottery-btn market_2_b_btn active" nat_1="75">75</button>
														</div>
													</div>
												</div>
												<div id="tripple" class="tab-pane tab_btn_block">
													<div class="tripple market_3_row" data-title="SUSPENDED">
														<div class="lottery-box">
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/1.jpg" class="card-image back-1 market_3_b_btn" nat_1="1" />
															</div>
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/2.jpg" class="card-image back-1 market_3_b_btn" nat_1="2" />
															</div>
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/3.jpg" class="card-image back-1 market_3_b_btn" nat_1="3" />
															</div>
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/4.jpg" class="card-image back-1 market_3_b_btn" nat_1="4" />
															</div>
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/5.jpg" class="card-image back-1 market_3_b_btn" nat_1="5" />
															</div>
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/6.jpg" class="card-image back-1 market_3_b_btn" nat_1="6" />
															</div>
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/7.jpg" class="card-image back-1 market_3_b_btn" nat_1="7" />
															</div>
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/8.jpg" class="card-image back-1 market_3_b_btn" nat_1="8" />
															</div>
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/9.jpg" class="card-image back-1 market_3_b_btn" nat_1="9" />
															</div>
															<div class="lottery-card">
																<img src="storage/front/img/andar_bahar/10.jpg" class="card-image back-1 market_3_b_btn" nat_1="0" />
															</div>



														</div>
														<div class="random-bets">
															<h4 class="w-100 text-center mb-1">Random Bets</h4>
															<button class="lottery-btn market_3_b_btn active" nat_1="5">5</button>
															<button class="lottery-btn market_3_b_btn active" nat_1="10">10</button>
															<button class="lottery-btn market_3_b_btn active" nat_1="15">15</button>
															<button class="lottery-btn market_3_b_btn active" nat_1="20">20</button>
															<button class="lottery-btn market_3_b_btn active" nat_1="25">25</button>
															<button class="lottery-btn market_3_b_btn active" nat_1="50">50</button>
															<button class="lottery-btn market_3_b_btn active" nat_1="100">100</button>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="fancy-marker-title m-t-10">
											<h4>Last Result <a href="casinoresults?game_type=lottcard" class="result-view-all">View All</a></h4>
										</div>
										<div class="m-b-10">

											<p id="last-result" class="text-right"></p>

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
<script type="text/javascript" src='footer-js.js'></script>

<script type="text/javascript">
	$(document).on('click', '.tab_btn', function(e) {
		var tab_name = $(this).data('tab_name');

		$(".tab_btn").removeClass("active");
		$("." + tab_name + "_tab_btn").addClass("active");
		$(".tab_btn_block").hide();
		$(".tab_btn_block").removeClass("active");
		$("#" + tab_name).addClass("active");
		$("#" + tab_name).show();
		closeBetSlip();
	});

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
	var markettype = "LOTTCARD";
	var back_html = "";
	var lay_html = "";
	var gstatus = "";
	var last_result_id = '0';

	function websocket(type) {
		socket = io.connect(websocketurl, {
			transports: ['websocket']
		});
		socket.on('connect', function() {
			socket.emit('Room', 'lottcard');
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
						$("#card_c1").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C1 + ".png");
					}

					if (data.t1[0].C2 != 1) {
						$("#card_c2").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C2 + ".png");
					}

					if (data.t1[0].C3 != 1) {
						$("#card_c3").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C3 + ".png");
					}




				}
				clock.setValue(data.t1[0].autotime);
				$(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid);
				$("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid);
				eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid;

				for (var j in data['t2']) {
					selectionid = parseInt(data['t2'][j].sid);
					runner = data['t2'][j].nat || data['t2'][j].nation;
					b1 = data['t2'][j].b1;
					l1 = data['t2'][j].l1;



					markettype = "LOTTCARD";



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
						$(".btn-lottery").addClass("suspended");
						$(".btn-lottery").css("pointer-events", "none");
						$(".market_" + selectionid + "_b_btn").removeClass("back-1");
					} else {
						$(".market_" + selectionid + "_b_btn").addClass("back-1");
						$(".market_" + selectionid + "_row").removeClass("suspended");
						$(".btn-lottery").removeClass("suspended");
						$(".btn-lottery").css("pointer-events", "");
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


	function updateResult(data) {
		if (data && data[0]) {
			data = JSON.parse(JSON.stringify(data));
			resultGameLast = data[0].mid;

			if (last_result_id != resultGameLast) {
				last_result_id = resultGameLast;

			}

			var html = "";
			casino_type = "'lottcard'";
			data.forEach((runData) => {

				ab = "playerb";
				ab1 = runData.win;

				eventId = runData.mid == 0 ? 0 : runData.mid;
				html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs  ' + ab + ' last-result">' + ab1 + '</span>';
			});
			$("#last-result").html(html);
			if (oldGameId == 0 || oldGameId == resultGameLast) {



			}
		}
	}

	function clearCards() {
		refresh(markettype);
		$("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
		$("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
		$("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
	}

	function teenpatti(type) {
		gameType = type
		websocket();
	}
	teenpatti("ok");
	var nat_1 = [];
	var nat_count = 0;
	var back = 0;
	var lay = 0;
	var lottery = 0;
	jQuery(document).on("click", ".back-1", function() {

		var activeTabId = $(".tab_btn_block.active").attr("id");
		if (lay > 0) {
			return false;
		}
		var bigger = 1;

		if (activeTabId == "double") {
			bigger = 2;
		}
		if (activeTabId == "tripple") {
			bigger = 3;
		}
		if (lottery == "1") {
			return false;
		}
		if (activeTabId == "single") {
			nat_1 = [];
		} else {
			if (nat_count >= bigger) {
				return false;
			}
		}
		var fullmarketodds = $(this).attr("fullmarketodds");
		if (fullmarketodds != "") {
			nat_1_temp = $(this).attr("nat_1");
			/*check_already = nat_1.includes(nat_1_temp);
			if (check_already) {
				return false;
			}*/
			random=false;
			nat_1.push(nat_1_temp);
			nat_count++;
			back++;

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

			$(this).addClass("selected");


			return_html = "";
			var return_ball = "";
			var nat_1_string = nat_1.join();
			if(nat_1){
				for (var j in nat_1)
				{
					return_ball += `<img class="ballss" src="storage/img/lottery/ball${nat_1[j]}.png">`;
				}
			}
			return_html += "<div class='bet-slip-data'><div><div class='table-responsive back'><form><table class='coupon-table table table-borderedless'><thead><tr><th style='width: 75%; text-align: left;'>(Bet for)</th><th style='width: 25%; text-align: left;'>Stake</th></tr></thead><tbody>";
			return_html += "<tr><td>" + return_ball + "</td><td class='bet-stakes'><div class='form-group bet-stake'><input type='hidden' id='bet_stake_side' value='Back'/><input type='hidden' id='bet_event_id' value='" + eventId + "'/><input type='hidden' id='bet_marketId' value='" + selectionid + "'/><input type='hidden' id='bet_event_name' value='" + event_name + "'/><input type='hidden' id='bet_market_name' value='" + marketname + "'/><input type='hidden' id='bet_markettype' value='" + markettype + "'/><input type='hidden' id='fullfancymarketrate' value='" + fullfancymarketrate + "'/> <input type='hidden' id='oddsmarketId' value='" + marketId + "'/><input type='hidden' id='market_runner_name' value='" + market_runner_name + " " + nat_1_string + "'/><input type='hidden' id='market_odd_name' value='" + market_odd_name + "'/> <input maxlength='10' name='inputStake' id='inputStake' required='required' type='text' > <input placeholder='0' value='" + fullmarketodds + "' id='odds_val' type='hidden' required='required' maxlength='4' readonly='readonly' class='amountint' style='width: 45px; vertical-align: middle;'></div></td></tr>";
			return_html += "<tr><td colspan='2' class='value-buttons' style='padding: 5px;'>";
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
	var random=false;
	jQuery(document).on("click", ".lottery-btn", function() {
		lottery = 1;
		var activeTabId = $(".tab_btn_block.active").attr("id");
		if (lay > 0) {
			return false;
		}
		var bigger = 1;
		nat_1 = [];
		nat_count = 0;

		var fullmarketodds = $(this).attr("fullmarketodds");
		if (fullmarketodds != "") {
			random=true;
			nat_1_temp = $(this).attr("nat_1");
			/*check_already = nat_1.includes(nat_1_temp);
			if (check_already) {
				return false;
			}*/
			nat_1.push(nat_1_temp);
			nat_count++;
			back++;

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

			$(this).addClass("selected");


			return_html = "";
			var nat_1_string = nat_1.join();
			return_html += "<div class='bet-slip-data'><div><div class='table-responsive back'><form><table class='coupon-table table table-borderedless'><thead><tr><th style='width: 75%; text-align: left;'>(Bet for)</th><th style='width: 25%; text-align: left;'>Stake</th></tr></thead><tbody>";
			return_html += "<tr><td>" + runner + " " + nat_1_string + "</td><td class='bet-stakes'><div class='form-group bet-stake'><input type='hidden' id='bet_stake_side' value='Back'/><input type='hidden' id='bet_event_id' value='" + eventId + "'/><input type='hidden' id='bet_marketId' value='" + selectionid + "'/><input type='hidden' id='bet_event_name' value='" + event_name + "'/><input type='hidden' id='bet_market_name' value='" + marketname + "'/><input type='hidden' id='bet_markettype' value='" + markettype + "'/><input type='hidden' id='fullfancymarketrate' value='" + fullfancymarketrate + "'/> <input type='hidden' id='oddsmarketId' value='" + marketId + "'/><input type='hidden' id='market_runner_name' value='" + market_runner_name + " " + nat_1_string + "'/><input type='hidden' id='market_odd_name' value='" + market_odd_name + "'/><input placeholder='0' value='" + fullmarketodds + "' id='odds_val' type='hidden' required='required' maxlength='4' readonly='readonly' class='amountint' style='width: 45px; vertical-align: middle;'> <input maxlength='10' name='inputStake' id='inputStake' required='required' type='text' ></div></td></tr>";
			return_html += "<tr><td colspan='2' class='value-buttons' style='padding: 5px;'>";
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

	jQuery(document).on("click", ".lay-1", function() {
		if (back > 0) {
			return false;
		}
		if (nat_count >= 3) {
			return false;
		}
		var fullmarketodds = $(this).attr("fullmarketodds");
		if (fullmarketodds != "") {

			nat_1_temp = $(this).attr("nat_1");

			check_already = nat_1.includes(nat_1_temp);
			if (check_already) {
				return false;
			}
			nat_1.push(nat_1_temp);
			nat_count++;
			lay++;


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

			$(this).addClass("selected");
			return_html = "";
			var nat_1_string = nat_1.join();
			return_html += "<div class='bet-slip-data'><div><div class='table-responsive lay'><form><table class='coupon-table table table-borderedless'><thead><tr><th></th><th style='width: 35%; text-align: left;'>(Bet for)</th><th style='width: 25%; text-align: left;'>Odds</th><th style='width: 15%; text-align: left;'>Stake</th><th style='width: 15%; text-align: right;'>Liability</th></tr></thead><tbody>";
			return_html += "<tr><td class='text-center'><a href='javascript:void(0);' class='text-danger close-bet-slip'><i class='fa fa-times'></i></a></td><td>" + runner + " " + nat_1_string + "</td><td class='bet-odds'><div class='form-group'> <input placeholder='0' value='" + fullmarketodds + "' id='odds_val' type='text' required='required' maxlength='4' readonly='readonly' class='amountint' style='width: 45px; vertical-align: middle;'><div class='spinner-buttons input-group-btn btn-group-vertical'> <button disabled='disabled' class='custom-btn-spinner btn btn-xs btn-default'><i class='fa fa-angle-up'></i></button> <button disabled='disabled' class='custom-btn-spinner btn btn-xs btn-default'><i class='fa fa-angle-down'></i></button></div></div></td><td class='bet-stakes'><div class='form-group bet-stake'><input type='hidden' id='bet_stake_side' value='Lay'/><input type='hidden' id='bet_event_id' value='" + eventId + "'/><input type='hidden' id='bet_marketId' value='" + selectionid + "'/><input type='hidden' id='bet_event_name' value='" + event_name + "'/><input type='hidden' id='bet_market_name' value='" + marketname + "'/><input type='hidden' id='bet_markettype' value='" + markettype + "'/><input type='hidden' id='fullfancymarketrate' value='" + fullfancymarketrate + "'/> <input type='hidden' id='oddsmarketId' value='" + marketId + "'/><input type='hidden' id='market_runner_name' value='" + market_runner_name + " " + nat_1_string + "'/><input type='hidden' id='market_odd_name' value='" + market_odd_name + "'/> <input maxlength='10' name='inputStake' id='inputStake' required='required' type='text' ></div></td><td class='text-right bet-profit' id='profitLiability'>0</td></tr>";
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
	jQuery(document).on("click", ".close-bet-slip", closeBetSlip);

	function closeBetSlip() {
		$('.bet-slip-data').remove();
		$(".back-1").removeClass("select");
		$(".lay-1").removeClass("select");
		back = 0;
		lay = 0;
		nat_count = 0;
		nat_1 = [];
		random=false;
		lottery = 0;
		$(".selected").removeClass("selected");
	}
	jQuery(document).on("click", "#placeBet", function() {
		$("#placeBet").html('<i class="fa fa-spinner  fa-spin"></i> Submit');
		$("#placeBet").addClass('disabled');
		$(".placeBetLoader").addClass('show');
		$("#bet-error-class").removeClass("b-toast-danger");
		$("#bet-error-class").removeClass("b-toast-success");

		var activeTabId = $(".tab_btn_block.active").attr("id");
		var bigger = 1;

		if (activeTabId == "double") {
			bigger = 2;
		}
		if (activeTabId == "tripple") {
			bigger = 3;
		}
		if (lottery == "1") {
			bigger = 1;
		}
		if (nat_count != bigger) {
			$("#placeBet").html('Submit');
			$("#placeBet").removeClass("disabled");
				$(".placeBet").removeClass("disabled");
				$(".placeBetLoader").removeClass('show');
			$("#bet-error-class").addClass("b-toast-danger");

			$("#errorMsgText").text("Bet Not Confirmed Card Not Valid");
			$("#errorMsg").fadeIn('fast').delay(3000).hide(0);
			return true;
		}
		var last_place_bet = "";
		nat_1 = [];
		lay = 0;
		back = 0;
		nat_count = 0;
		$(".selected").removeClass("selected");
		bet_stake_side = $("#bet_stake_side").val();
		bet_type = bet_stake_side;
		bet_event_id = $("#bet_event_id").val();
		bet_marketId = $("#bet_marketId").val();
		oddsmarketId = bet_marketId;
		eventType = 'LOTTCARD';
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

		$(".placeBet").addClass("disabled");
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
		$("#placeBets").addClass('disabled');


		$.ajax({
			type: 'POST',
			url: 'ajaxfiles/bet_place_lottcard.php',
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
				bet_type: bet_type,
				random: lottery,
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
			},
			error:function(e,error){
				$("#placeBet").html('Submit');
				$("#placeBet").removeClass("disabled");
				$(".placeBet").removeClass("disabled");
				$(".placeBetLoader").removeClass('show');
				$("#bet-error-class").addClass("b-toast-danger");
				$("#errorMsgText").text(error);
				$("#errorMsg").fadeIn('fast').delay(3000).hide(0);
			}
		});

	});
</script>
</body>
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