<?php
include('../include/conn.php');
include('../include/flip_function.php');
include('../session.php');
include('../include/market_limit.php');
$user_id = $_SESSION['CLIENT_LOGIN_ID'];

$get_parent_ids = $conn->query("select parentDL,parentMDL,parentSuperMDL from user_login_master where UserID=$user_id");
$fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
$parentDL = $fetch_parent_ids['parentDL'];
$parentMDL = $fetch_parent_ids['parentMDL'];
$parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];

if ($_GET['eventId']) {
	$event_id = $_GET['eventId'];
} else {
	echo "<h1>Error:</h1>";
	exit();
}
if ($_GET['marketId']) {
	$marketId = strval($_GET['marketId']);
} else {
	echo "<h1>Error:</h1>";
	exit();
}
if ($_GET['eventType']) {
	$eventType = $_GET['eventType'];
	if ($eventType == 1 or $eventType == 2 or $eventType == 4 or $eventType == 5 or $eventType == 8 or $eventType == 7522) {
	} else {
		header("Location: index");
	}
} else {
	header("Location: index");
}

$market_limit_data = get_market_limit($conn, $event_id, $marketId, true, $eventType);

$match_max = $bookmaker_min = $bookmaker_max = $bookmakersmall_max = 1;
if (!empty($market_limit_data)) {
	$match_max = $market_limit_data['match_max'];
	$bookmaker_min = $market_limit_data['bookmaker_min'];
	if (get_inplay_status($marketId))
		$bookmaker_max = $market_limit_data['bookmaker_live'];
	else
		$bookmaker_max1 = $market_limit_data['bookmaker_max'];


	$bookmakersmall_max = 25000;
} else {
	$match_max = 50000;
	$bookmaker_min = 500;
	if (get_inplay_status($marketId)) {
		$bookmaker_max1 = 50000;
	} else {
		$bookmaker_max1 = 50000;
		if ($eventType == 4) {
			$bookmaker_max1 = 200000;
		}
	}
}

if ($bookmaker_max1 >= 100000) {
	$bookmaker_max = ($bookmaker_max1 / 100000) . 'L';
} else {
	$bookmaker_max = $bookmaker_max1;
}

$event_name = '';
if ($event_id == ELECTION_EVENT_ID) {
	$event_name = ELECTION_MARKET_NAME;
} elseif ($event_id == IPL_EVENT_ID) {
	$event_name = IPL_MARKET_NAME;
	;
}
$get_url = $conn->query("select * from tv_url_master where event_id=$event_id");
$fetch_get_url = mysqli_fetch_assoc($get_url);
$iframe_score_url = $fetch_get_url['score_url'];
if (empty($iframe_score_url)) {
	$iframe_score_url = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
include("head_css.php");
?>
<style>
	div#matchDate1 {
		padding: 0px;
		margin: 0px !IMPORTANT;
	}

	.back1 {
		background-color: rgba(114, 187, 239, .5);
	}

	.lay1 {
		background-color: rgba(250, 169, 186, .5);
	}

	.rate_change_link {
		background: #FD7 !important;
	}

	.nav-tabs .nav-item {
		flex: auto;
		/*  display: flex; */
		align-items: center;
		text-align: center;
	}

	.tv-icon {
		right: unset !important;
		position: unset !important;
	}

	.eventfull {
		color: #333 !important;
	}

	.collapsed {
		display: none;
	}

	.bookmaker-market .suspended:before,
	.bookmaker-tied-market .suspended:before,
	.fancy-market .suspended:before {
		background-image: unset !important;
	}

	.custbold {
		pointer-events: all !important;
	}

	.fancy-market-number .suspended:before,
	.fancy-market-number .suspended:after {
		width: 20%;
	}

	.fancy-market-number .box-1 {
		width: 20%;
		min-width: 20%;
		max-width: 20%;
	}

	.loader_page {
		position: fixed;
		left: 0;
		top: 0;
		width: 100%;
		height: 100vh;
		display: flex;
		justify-content: center;
		align-items: center;
		background-color: rgba(256, 256, 256, .5);
		z-index: 10000
	}

	.main-footer-id {
		display: none;
	}
</style>

<body cz-shortcut-listen="true" class="eventfull">
	<div id="app">
		<?php
		include("loader.php");
		?>
		<div>
			<?php
			include("header.php");
			?>

			<div class="loader_page" style="display:none;"><i class="fa fa-spinner fa-spin"
					style="font-size: 38px;"></i></div>
			<div class="main-content">
				<!---->
				<!---->
				<div style="position: relative;">
					<ul class="nav nav-tabs">
						<li class="nav-item"><a data-toggle="tab" href="#odds" class="nav-link active">Odds</a></li>
						<li class="nav-item"><a data-toggle="tab" href="#match" class="nav-link">Matched Bet (
								<span id="count_open_bet">0</span> )</a></li>
						<li class="nav-item">
							<div id="tvvv" onclick="openTV();" class="tv-icon">
								<p class="mb-0"><i class="fas fa-tv"></i></p>
							</div>
						</li>
					</ul>

					<div class="tab-content">
						<div id="odds" class="tab-pane active">
							<div id="matchDate1" class="match-title mt-1"><span
									class="match-name event_name_heading text-uppercase"><?php echo $event_name; ?></span>
								<span class="float-right" id="matchdate"></span>
							</div>

							<div class="col-xl-12" style="border: 3px solid #000;padding: 0px;">

								<div id="scoreboard-box" style="background: black;">
									<?
									if ($eventType != 4 && $eventType != 8) {
										?>
										<iframe style="    width: 100%;height:250px;" src=""
											id="scoreboard_iframe"></iframe>
										<?
									}
									?>
								</div>

							</div>
							<div id="match_odds_all_full_markets"></div>
							<div id="bookmaker_market_div_secure" style="display:none;"> </div>

							<div id="bookmakersmall1_market_div_secure" style="display:none;"> </div>
							<div id="bookmaker_tied_market_div_secure" style="display:none;"> </div>
							<!---->
							<?php if ($eventType == 4 || $eventType == 8) { ?>
								<div class="">
									<!-- <ul class="nav nav-tabs mt-2 fancy-nav">
										<li class="nav-item active"><a href="#fancy" data-toggle="tab" href="javascript:void(0)" class="nav-link active">Fancy</a></li>
										<li class="nav-item"><a href="#fancy1" data-toggle="tab" href="javascript:void(0)" class="nav-link">Fancy 1</a></li>
										<li class="nav-item"><a href="#meter" data-toggle="tab" href="javascript:void(0)" class="nav-link">Meter</a></li>
										<li class="nav-item"><a href="#khado" data-toggle="tab" href="javascript:void(0)" class="nav-link">Khado</a></li>
										<li class="nav-item"><a href="#oddeven" data-toggle="tab" href="javascript:void(0)" class="nav-link">Odd Even</a></li>
										<li class="nav-item"><a href="#wicket" data-toggle="tab" href="javascript:void(0)" class="nav-link">Wicket</a></li>
										<li class="nav-item"><a href="#four" data-toggle="tab" href="javascript:void(0)" class="nav-link">Four</a></li>
										<li class="nav-item"><a href="#six" data-toggle="tab" href="javascript:void(0)" class="nav-link">Six</a></li>
										<li class="nav-item"><a href="#cc" data-toggle="tab" href="javascript:void(0)" class="nav-link">Cricket Casino</a></li>
									</ul> -->
									<div class="tab-content">
										<div id="fancy" class="tab-pane active">
											<div class="fancy-market">
												<div id="fancy_odds_market" style="display:none;">
													<div class='market-title mt-1'>Normal</div>
													<div class="table-header">
														<div class="market-title1 float-left country-name box-4">
															<!-- <span>Normal</span>
															<p class="float-right mb-0" data-target="#view_fancy_rules" data-toggle="modal"><i class="fas fa-info-circle"></i></p> -->
														</div>
														<div class="box-1 float-left lay text-center lablesize"><b>No</b>
														</div>
														<div class="back box-1 float-left back text-center lablesize">
															<b>Yes</b>
														</div>
													</div>
													<div class="table-body">
														<div id="secure"></div>

													</div>
													<!---->
													<div>
														<!---->
													</div>
												</div>

												<div id="over_odds_market" style="display:none;">
													<div class='market-title mt-1'>Over By Over</div>
													<div class="table-header">
														<div class="market-title1 float-left country-name box-4"><!-- <span>Over By Over Session Market</span>
															<p class="float-right mb-0"><i class="fas fa-info-circle"></i></p> -->
														</div>
														<div class="box-1 float-left lay text-center lablesize"><b>No</b>
														</div>
														<div class="back box-1 float-left back text-center lablesize">
															<b>Yes</b>
														</div>
													</div>
													<div class="table-body">
														<div id="secure_over"></div>

													</div>
													<!---->
													<div>
														<!---->
													</div>
												</div>

												<div id="ball_odds_market" style="display:none;">
													<div class='market-title mt-1'>Ball By Ball</div>
													<div class="table-header">
														<div class="market-title1 float-left country-name box-4"><!-- <span>Ball By Ball Session Market</span>
															<p class="float-right mb-0"><i class="fas fa-info-circle"></i></p> -->
														</div>
														<div class="box-1 float-left lay text-center lablesize"><b>No</b>
														</div>
														<div class="back box-1 float-left back text-center lablesize">
															<b>Yes</b>
														</div>
													</div>
													<div class="table-body">
														<div id="secure_ball"></div>

													</div>
													<!---->
													<div>
														<!---->
													</div>
												</div>
											</div>
										</div>
										<div id="fancy1" class="tab-pane active">
											<div class="fancy-market">
												<div id="fancy_odds_market1" style="display:none;">
													<div class='market-title mt-1'>Fancy1</div>
													<div class="table-header">
														<div class="market-title1 float-left country-name box-4"><!-- <span>Fancy1</span>
															<p class="float-right mb-0"><i class="fas fa-info-circle"></i></p> -->
														</div>
														<div class="back box-1 float-left back text-center lablesize">
															<b>Back</b>
														</div>
														<div class="box-1 float-left lay text-center lablesize"><b>Lay</b>
														</div>
													</div>
													<div class="table-body">
														<div id="secure1"></div>

													</div>
													<!---->
													<div>
														<!---->
													</div>
												</div>
											</div>
										</div>
										<div id="khado" class="tab-pane active">

											<div id="khado_odds_market" style="display:none;">
												<div class="fancy-market fancykado">
													<div class='market-title mt-1'>Khado</div>
													<div class="table-header">
														<div class="market-title1 float-left country-name box-8"><!-- <span>Khado</span>
															<p class="float-right mb-0"><i class="fas fa-info-circle"></i></p> -->
														</div>
														<div class="back box-1 float-left back text-center lablesize">
															<b>Back</b>
														</div>
														<!-- <div class="box-1 float-left lay text-center lablesize"><b>Lay</b></div> -->
													</div>
													<div class="table-body">
														<div id="secure_khado"></div>

													</div>
													<!---->
													<div>
														<!---->
													</div>
												</div>
											</div>
										</div>
										<div id="oddeven" class="tab-pane active">
											<!--<div class="no-record-msg">No real-time records found</div>-->
											<div class="fancy-market">
												<div id="oddeven_odds_market" style="display:none;">
													<div class='market-title mt-1'>oddeven</div>

													<div class="table-body">
														<div id="secure_oddeven"></div>
													</div>
													<!---->
													<div>
														<!---->
													</div>
												</div>
											</div>
										</div>
										<div id="meter" class="tab-pane active">
											<div id="meter_odds_market" style="display:none;">
												<div class="fancy-market">
													<div class='market-title mt-1'>Meter</div>
													<div class="table-header">
														<div class="market-title1 float-left country-name box-4"><!-- <span>Meter Market</span>
															<p class="float-right mb-0"><i class="fas fa-info-circle"></i></p> -->
														</div>
														<div class="box-1 float-left lay text-center lablesize"><b>No</b>
														</div>
														<div class="back box-1 float-left back text-center lablesize">
															<b>Yes</b>
														</div>
													</div>
													<div class="table-body">
														<div id="secure_meter"></div>

													</div>
													<!---->
													<div>
														<!---->
													</div>
												</div>
											</div>
										</div>


										<!-- <div id="wicket" class="tab-pane active">
											<div class="no-record-msg">No real-time records found</div>
										</div>
										<div id="four" class="tab-pane active">
											<div class="no-record-msg">No real-time records found</div>
										</div>
										<div id="six" class="tab-pane active">
											<div class="no-record-msg">No real-time records found</div>
										</div>
										<div id="cc" class="tab-pane active">
											<div class="no-record-msg">No real-time records found</div>
										</div> -->
									</div>
								</div>
							<?php } ?>
							<div id="match_odds_numbers_markets"></div>
							<div id="match_odds_all_tie_markets"></div>
						</div>
						<?php
						include("open_bet.php");
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
<div id="errorMsg" class="b-toaster b-toaster-top-center" style="display:none;">
	<div class="b-toaster-slot vue-portal-target">
		<div role="alert" aria-live="assertive" aria-atomic="true" id="bet-error-class"
			class="b-toast b-toast-solid b-toast-prepend b-toast-danger">
			<div tabindex="0" class="toast">
				<header class="toast-header">
					<strong class="mr-2" id="errorMsgText"></strong>
					<button type="button" aria-label="Close" class="close ml-auto mb-1">&times;</button>
				</header>
				<div class="toast-body">
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore.js"></script>
<script type="text/javascript" src="../js/socket.io.js?1"></script>
<script type="text/javascript" src="../js/jquery.min.js?1"></script>
<script src="../storage/front/js/flipclock.js?1" type="text/javascript"></script>
<script src="../js/bootstrap.min.js?1" type="text/javascript"></script>



<script type="text/javascript">
	var iframe_score_url = '<?php echo $iframe_score_url ?>';
	//var GAME_ID = "30065962";
	//var SCOREBOARD_SOCKET_URL = "wss://sportsscore24.com";
	var SCOREBOARD_URL = "wss://sportsscore24.com/";
	var ssocket = null;
	var socketScoreBoard;


	function scoreboardConnect() {
		socketScoreBoard = io.connect(SCOREBOARD_URL, {
			transports: ['websocket']
		});

		socketScoreBoard.on("connect", function () {

			socketScoreBoard.emit("subscribe", {
				type: 1,
				rooms: [parseInt(GAME_ID)]
			});
		});
		socketScoreBoard.on("error", function (abc) {

		});
		socketScoreBoard.on("update", function (response) {

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
		socketScoreBoard.on("disconnect", function () { });
	}

	function updateScoreBoard(data) {

		if (data.isfinished == "1") {
			$("#scoreboard-box").hide();
			return;
		} else {
			$("#scoreboard-box").show();
		}

		var scoreboardStr = "";
		scoreboardStr += "<div class=\"scorecard scorecard-mobile\"><div data-v-68a8f00a='' class='score-inner'>";
		scoreboardStr += "    <div class=\"row\">";
		scoreboardStr += "        <span class=\"team-name col-6\">" + data.spnnation1 + "<\/span>";
		scoreboardStr += "        <span class=\"score col-6 text-center\">" + data.score1;

		if (data.spnrunrate1 != null && data.spnrunrate1 != "") {
			scoreboardStr += "CRR " + data.spnrunrate1;
		}
		if (data.spnreqrate1 != null && data.spnreqrate1 != "") {
			scoreboardStr += " RR " + data.spnreqrate1;
		}
		scoreboardStr += "<\/span>";
		scoreboardStr += "    <\/div>";
		scoreboardStr += "    <div class=\"row mt-2\">";
		scoreboardStr += "        <span class=\"team-name col-6\">" + data.spnnation2 + "<\/span>";
		scoreboardStr += "        <span class=\"score col-6  text-center\">" + data.score2;

		if (data.spnrunrate2 != null && data.spnrunrate2 != "") {
			scoreboardStr += "CRR " + data.spnrunrate2;
		}

		if (data.spnreqrate2 != null && data.spnreqrate2 != "") {
			scoreboardStr += " RR " + data.spnreqrate2;
		}
		scoreboardStr += "<\/span>";
		scoreboardStr += "    <\/div>";
		scoreboardStr += "    <div class=\"row\">";
		scoreboardStr += "        ";
		if (data.spnballrunningstatus != "") {
			scoreboardStr += "<div class=\"col-6 m-t-10\"><p>";
			if (data.dayno != "") {
				scoreboardStr += "<span>Day " + data.dayno + "<\/span> | ";
			}
			scoreboardStr += data.spnballrunningstatus + "<\/p>";
		} else if (data.spnmessage != "") {
			scoreboardStr += "<div class=\"col-6 m-t-10\"><p>";
			if (data.dayno != "") {
				scoreboardStr += "<span>Day " + data.dayno + "<\/span> | ";
			}
			scoreboardStr += data.spnmessage + "<\/p>";
		}

		scoreboardStr += "        <\/div>";
		scoreboardStr += "        <div class=\"col-6 ball-runs-container m-t-5\">";
		scoreboardStr += "            <p class=\"ball-by-ball\">";
		$.each(data.balls, function (key, ballVal) {
			if (ballVal != "") {
				var b_class = "";
				if (ballVal == '4') {
					b_class = "four";
				} else if (ballVal == '6') {
					b_class = "six";
				} else if (ballVal == 'ww') {
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

	function openTV() {
		var name = "collapseTV";
		if ($("#collapseTV").length > 0 && $('#collapseTV').is(':visible')) {
			$("#collapseTV").hide();


		} else {
			$("#collapseTV").show();

		}
	}
</script>
<script>
	var SKIP_FANCY_EVENTID = ('<?php echo SKIP_FANCY; ?>').split(',');
	var argsTv = "<? echo tv_url; ?>&sportid=<?php echo $eventType; ?>&gmid=<? echo $event_id; ?>";
	$("#matchDate1").append('<div data-v-68a8f00a="" style="display : none;    height: 206px;" id="collapseTV"><iframe data-v-68a8f00a="" src="' + argsTv + '" width="100%" style="height:206px;" id="myiFrame" class="video-iframe"></iframe></div>');
	var html_fancy_market_new = "";
	var html_fancy_market_new1 = "";
	var html_ball_market_new = "";
	var html_khado_market_new = "";
	var html_meter_market_new = "";
	var html_oddeven_market_new = "";
	var one_size_1 = 0;
	var one_size_2 = 0;
	var one_size_3 = 0;
	var lay_one_size_1 = 0;
	var lay_one_size_2 = 0;
	var lay_one_size_3 = 0;
	var runnerName;
	var marketName;
	var runsNo = "";
	var runsYes = "";
	var oddsNo = "";
	var oddsYes = "";
	var runRate = "";
	var class_add_yes_change = "";
	var class_add_no_change = "";
	var marketIdArray = [];
	var marketIdArrayNew = [];
	var selectorIdArray = [];
	var selectorIdCasinoArray = [];
	var selectorIdBookmakerArray = [];
	var selectorIdBookmakerTiedArray = [];

	var marketIdArrayFancy1 = [];
	var marketIdArrayNewFancy1 = [];

	var marketIdArrayKhado = [];
	var marketIdArrayNewKhado = [];

	var marketIdArrayOver = [];
	var marketIdArrayOverNew = [];

	var marketIdArrayOddeven = [];
	var marketIdArrayNewOddeven = [];

	var marketIdArrayBall = [];
	var marketIdArrayNewBall = [];

	var marketIdArrayMeter = [];
	var marketIdArrayNewMeter = [];

	var bookmaker1_back_rate = "";
	var bookmaker1_back_size = "";
	var bookmaker1_lay_rate = "";
	var bookmaker1_lay_size = "";

	var bookmaker1_back_2_rate = "";
	var bookmaker1_back_2_size = "";
	var bookmaker1_lay_2_rate = "";
	var bookmaker1_lay_2_size = "";


	var bookmaker1_back_3_rate = "";
	var bookmaker1_back_3_size = "";
	var bookmaker1_lay_3_rate = "";
	var bookmaker1_lay_3_size = "";


	var html_bookmaker_odds = "";

	var bookmaker1_tied_back_rate = "";
	var bookmaker1_tied_back_size = "";
	var bookmaker1_tied_lay_rate = "";
	var bookmaker1_tied_lay_size = "";

	var bookmaker1_tied_back_2_rate = "";
	var bookmaker1_tied_back_2_size = "";
	var bookmaker1_tied_lay_2_rate = "";
	var bookmaker1_tied_lay_2_size = "";


	var bookmaker1_tied_back_3_rate = "";
	var bookmaker1_tied_back_3_size = "";
	var bookmaker1_tied_lay_3_rate = "";
	var bookmaker1_tied_lay_3_size = "";


	var html_bookmaker_tied_odds = "";
	var match_odds_numbers_markets = "";
	var oddsmarketId = <?php echo $marketId; ?>;
	var eventId = <?php echo $event_id; ?>;
	var eventIdOpenbet = <?php echo $event_id; ?>;

	var callExposure = true;

	var site_url = '<?php echo WEB_URL; ?>';
	var socket = io.connect("<?php echo SITE_SPORTS_IP; ?>");
	var first_time = true;

	function kFormatter(num) {
		return Math.abs(num) > 999 ? Math.sign(num) * ((Math.abs(num) / 1000).toFixed(1)) + ' K' : Math.sign(num) * Math.abs(num)
	}

	function formatAMPM(date) {
		var hours = date.getHours();
		var minutes = date.getMinutes();
		var ampm = hours >= 12 ? 'PM' : 'AM';
		hours = hours % 12;
		hours = hours ? hours : 12; // the hour '0' should be '12'
		minutes = minutes < 10 ? '0' + minutes : minutes;
		var strTime = hours + ':' + minutes + '' + ampm;
		return strTime;
	}
	var matchInPlay;
	var eventTypeChk = '<?php echo $eventType; ?>';
	var mainclass = "main-market-new";
	var hiddenclass = "";
	if (eventTypeChk == "1") {
		mainclass = "main-market";
		hiddenclass = "hidden-portrait";
	}
	socket.on('connect', function () {
		console.log("HERE");
		console.log(<?php echo $marketId; ?>);
		socket.emit('getOddData1', { "user": 1 });
		callExposure = true;
		socket.emit('getOddData', {
			eventId: '<?php echo $marketId; ?>'
		});

		socket.emit('getMatches', {
			eventType: '<?php echo $eventType; ?>'
		});

		$.ajax({
			url: 'https://api.ipify.org?format=json',
			success: function (response) {
				if (response) {
					ipAddress = response.ip;
					socket.emit('getLiveVideoUrl', {
						eventId: '<?php echo $event_id; ?>',
						ipAddress: ipAddress
					})
				}
			}
		});
	});

	socket.on('liveURLForMatch', function (args) {
		console.log("args=", args);
		/* if (args) {
			//args = "https://dpmatka.in/dtv.php?id="+<?php echo $event_id; ?>+"&sportid=" + <?php echo $eventType; ?>;
		args = "<? echo tv_url; ?>?id=<? echo $event_id; ?>";
		$("#matchDate1").append('<div data-v-68a8f00a="" style="display : none;    height: 206px;" id="collapseTV"><iframe data-v-68a8f00a="" src="' + args + '" width="100%" style="height:206px;" id="myiFrame" class="video-iframe"></iframe></div>');
	} */
	});
	$(".loader_page").show();
	$(".main-footer-id").hide();
	socket.on('eventGetLiveEventName', function (data) {
		if (data) {
			if (data.sport) {
				if (data.sport.body) {

					var result = Object.keys(data.sport.body).length;
					if (result > 0) {
						$(".loader_page").hide();
						$(".main-footer-id").show();
						var main_datas = data;

						data = main_datas.sport;

						for (var i in data.body) {

							if (data.body[i]) {

								var _event_id = data.body[i].matchid.toString();

								if ('<?php echo $event_id; ?>' == _event_id) {

									var matchNameArr = data.body[i].matchName.split('/');
									$('.event_name_heading').text(matchNameArr[0].trim());
									$(".event_name_heading").attr("event_name", matchNameArr[0].trim());

									var matchdate = data.body[i].matchdate;
									var matchdate_ = (matchdate).toString();
									var date_string = '';
									// if (matchdate_.indexOf("(IST)") > -1) {
									// 	matchdate = (matchdate.replace(/\s\s+/g, ' ').replace(' (IST)', '')).trim();
									// 	var matchdateArr = matchdate.split(' ');
									// 	var _matchdate = matchdateArr[0] + ' ' + matchdateArr[1] + ' ' + matchdateArr[2];
									// 	var _matchtime12 = matchdateArr[3] + ' ' + matchdateArr[4];
									// 	var _matchtime24 = to24Hour(_matchtime12);
									// 	var _date = new Date(_matchdate);
									// 	date_string =  _date.getDate()+ '/' + (_date.getMonth() + 1) + '/' + _date.getFullYear() + ' ' + _matchtime24;
									// } else {
									// 	var _date = new Date(matchdate);
									// 	var _matchtime = formatAMPM(_date);
									// 	date_string = _date.getDate() + '/' + (_date.getMonth() + 1) + '/' + _date.getFullYear() + ' ' + _matchtime;
									// }
									if (matchdate_.indexOf("(IST)") > -1) {
										matchdate = (matchdate.replace(/\s\s+/g, ' ').replace(' (IST)', '')).trim();
										var matchdateArr = matchdate.split(' ');

										var _matchdate = matchdateArr[0] + ' ' + matchdateArr[1] + ' ' + matchdateArr[2];
										var _matchtime12 = matchdateArr[3] + ' ' + matchdateArr[4];
										var _matchtime24 = to24Hour(_matchtime12);

										var _date = new Date(_matchdate);
										//date_string = _date.getDate()  + '/' + (_date.getMonth()+1) + '/' + _date.getFullYear() + ' ' + _matchtime24;
										var dd = String(_date.getDate()).padStart(2, '0');
										var mm = String(_date.getMonth() + 1).padStart(2, '0');
										var yyyy = _date.getFullYear();

										date_string = `${dd}/${mm}/${yyyy} ${_matchtime24}:00`;
									} else {
										var _date = new Date(matchdate);

										//date_string = _date.getDate() + '/' + (_date.getMonth()+1) + '/' + _date.getFullYear() + ' ' + _matchtime;
										var dd = String(_date.getDate()).padStart(2, '0');
										var mm = String(_date.getMonth() + 1).padStart(2, '0');
										var yyyy = _date.getFullYear();

										var hh = String(_date.getHours()).padStart(2, '0');
										var min = String(_date.getMinutes()).padStart(2, '0');
										var ss = String(_date.getSeconds()).padStart(2, '0');

										date_string = `${dd}/${mm}/${yyyy} ${hh}:${min}:${ss}`;
									}

									$('#matchdate').text(date_string);

									var inPlay = data.body[i].inPlay;
									matchInPlay = inPlay;
									if (inPlay == "False" || inPlay == false || inPlay == "false") {
										$("#tvvv").hide();
									} else {
										$("#tvvv").show();
									}

								}
							}
						}
					}
				}
			}
		}

	});

	var display_runners = [];
	var display_runners_bm = [];
	var display_cashProfit = {};
	var display_runners_tied_bm = [];
	var display_runners_sbm = [];

	socket.on('eventGetLiveEventFancyData', function (args) {
		if (args.body == undefined) {
			//window.location.href = "/index";
		} else {
			$(".loader_page").hide();
			$(".main-footer-id").show();
			if (args.body.data) {
				if (args.body.data[0]) {

					matchdate = args.body.data[0].matchdate;

					$("#matchdate").html(matchdate);

					eventName = args.body.data[0].matchName;
					eventName2 = args.body.data[0].matchName;
					oddsmarketId = args.body.data[0].marketid;
					eventId = args.body.data[0].matchid;
					marketId = args.body.data[0].marketid;

					oldGameId = args.body.data[0].oldGameId;
					oldGameIdId = args.body.data[0].oldGameIdId;
					betfairGameId = args.body.data[0].betFairId || oldGameId;
					GAME_ID = oldGameId;
					var eventTypeId = args.body.data[0].eventTypeId
					if (parseInt(eventTypeId) == 4) { } else {
						iframe_score_url = "<?php echo LATEST_SCORE_URL; ?>&eventid=" + betfairGameId + "&sportid=<?php echo $eventType; ?>";
						$("#scoreboard_iframe").attr('src', iframe_score_url);
					}

					/* if(betfairGameId){
						
						iframe_score_url = "<?php echo LATEST_SCORE_URL; ?>?eventid = "+ betfairGameId +" & sportid=<?php echo $eventType; ?>";
					$("#scoreboard_iframe").attr('src', iframe_score_url);
				} */
				/* 
				if (iframe_score_url != null && iframe_score_url != "") {
					$("#scoreboard-box").html('<iframe id="iframe-tracker-1" width="100%" height="230px" src="' + iframe_score_url + '" style="overflow: hidden; border: 0px; height: 230px;" class="visible"></iframe>');
				} else {
					if (matchInPlay == "False" || matchInPlay == false || matchInPlay == "false") {

					} else {
						var url = "scoreboard.php?eventId=" + GAME_ID;
						$("#addIframe").html("<iframe src='" + url + "' style='     height: 5.3rem;overflow-x: unset;   width: 100%;'></iframe>")
					}
				}
					*/

				var inPlay = 1;
				html_match_odds = "";
				html_match_tie_odds = "";
				html_match_odds += "";
				match_odds_lay_place_status = "";

				for (k = 0; k < args.body.data.length; k++) {
					market_type_name = args.body.data[k].market_name;
					market_market_id = args.body.data[k].marketid;
					market_odd_name = market_type_name;

					if (market_type_name == "Tied Match") {
						html_match_tie_odds += "<div class='market-title cashout mt-1'>" + market_type_name + "<button class='btn btn-success btn-sm' disabled=''>Cashout</button></div><div class='" + mainclass + "'><div class='table-header'><div class='float-left country-name box-6 min-max'><b>Min:100 Max:<span id='match_odds_tied_max_bet_" + k + "'>0</span></b></div> <div class='back box-1 float-left text-center lablesize'><b>Back</b></div> <div class='lay box-1 float-left text-center lablesize'><b>Lay</b></div></div>";
						if (market_type_name == "Match Odds") {
							marketType = "MATCH_ODDS";
						} else if (market_type_name == "Tied Match") {
							marketType = "TIED_MATCH";
						} else if (market_type_name == "To Win the Toss") {
							marketType = "TOSS_ODDS";
						} else {
							if (market_type_name) {
								market_type_name = market_type_name.split(".").join("_");
								market_type_name = market_type_name.split(" ").join("_");
								market_type_name = market_type_name.split("/").join("_");
								market_type_name = market_type_name.split(" ").join("_");
								marketType = market_type_name.toUpperCase();
							}
						}
						market_type_name2 = marketType.toUpperCase();;
						market_marketid = market_type_name2;
						if (args.body.data[k].runners) {
							var xc = 0;
							for (j = 0; j < args.body.data[k].runners.length; j++) {

								var selectionId = args.body.data[k].runners[j].id;

								selectorIdArray.push(selectionId);
								runnerName = args.body.data[k].runners[j].name;
								marketName = args.body.data[k].runners[j].name;
								/* display_runners.push({
									runner_id: selectionId,
									runner_name: runnerName,
								}); */
								var bet_suspended = args.body.data[k].runners[j].status;

								if (market_type_name == "Match Odds") {
									marketType = "MATCH_ODDS";
								} else if (market_type_name == "Tied Match") {
									marketType = "TIED_MATCH";
								} else if (market_type_name == "To Win the Toss") {
									marketType = "TOSS_ODDS";
								} else {
									if (market_type_name) {
										market_type_name = market_type_name.split(".").join("_");
										market_type_name = market_type_name.split(" ").join("_");
										market_type_name = market_type_name.split("/").join("_");
										market_type_name = market_type_name.split(" ").join("_");
										marketType = market_type_name.toUpperCase();
									}
									marketType = market_type_name.toUpperCase();
								}

								display_runners.push({
									marketType: marketType,
									runner_id: selectionId,
									runner_name: runnerName,
								});

								if (args.body.data[k].runners[j].back[2]) {
									one_price_1 = args.body.data[k].runners[j].back[2].price || "";
									one_size_1 = args.body.data[k].runners[j].back[2].size;
									if (parseFloat(one_size_1)) {
										one_size_1 = parseFloat(one_size_1);
									} else {
										one_size_1 = "-";
									}
									//one_size_1 = parseFloat(one_size_1) >= 1000 ? one_size_1/1000 + "K" : one_size_1;
								} else {
									one_price_1 = "";
									one_size_1 = "";
								}

								if (args.body.data[k].runners[j].back[1]) {
									one_price_2 = args.body.data[k].runners[j].back[1].price || "";
									one_size_2 = args.body.data[k].runners[j].back[1].size;
									if (parseFloat(one_size_2)) {
										one_size_2 = parseFloat(one_size_2);
									} else {
										one_size_2 = "-";
									}
									//	one_size_2 = one_size_2 >= 1000 ? one_size_2/1000 + "K" : one_size_2;
								} else {
									one_price_2 = "";
									one_size_2 = "";
								}

								if (args.body.data[k].runners[j].back[0]) {
									one_price_3 = args.body.data[k].runners[j].back[0].price || "";
									one_size_3 = args.body.data[k].runners[j].back[0].size || "";
									if (parseFloat(one_size_3)) {
										one_size_3 = parseFloat(one_size_3);
									} else {
										one_size_3 = "-";
									}
									//	one_size_3 = one_size_3 >= 1000 ? one_size_3/1000 + "K" : one_size_3;
								} else {
									one_price_3 = "";
									one_size_3 = "";
								}

								if (args.body.data[k].runners[j].lay[0]) {
									lay_one_price_1 = args.body.data[k].runners[j].lay[0].price || "";
									lay_one_size_1 = args.body.data[k].runners[j].lay[0].size;
									if (parseFloat(lay_one_size_1)) {
										lay_one_size_1 = parseFloat(lay_one_size_1);
									} else {
										lay_one_size_1 = "-";
									}
									//	lay_one_size_1 = lay_one_size_1 >= 1000 ? lay_one_size_1/1000 + "K" : lay_one_size_1;
								} else {
									lay_one_size_1 = "";
									lay_one_price_1 = "";
								}

								if (args.body.data[k].runners[j].lay[1]) {
									lay_one_price_2 = args.body.data[k].runners[j].lay[1].price || "";
									lay_one_size_2 = args.body.data[k].runners[j].lay[1].size;
									if (parseFloat(lay_one_size_2)) {
										lay_one_size_2 = parseFloat(lay_one_size_2);
									} else {
										lay_one_size_2 = "-";
									}
									//	lay_one_size_2 = lay_one_size_2 >= 1000 ? lay_one_size_2/1000 + "K" : lay_one_size_2;
								} else {
									lay_one_size_2 = "";
									lay_one_price_2 = "";
								}

								if (args.body.data[k].runners[j].lay[2]) {
									lay_one_price_3 = args.body.data[k].runners[j].lay[2].price || "";
									lay_one_size_3 = args.body.data[k].runners[j].lay[2].size;
									if (parseFloat(lay_one_size_3)) {
										lay_one_size_3 = parseFloat(lay_one_size_3);
									} else {
										lay_one_size_3 = "-";
									}
									//	lay_one_size_3 = lay_one_size_3 >= 1000 ? one_size_2/1000 + "K" : lay_one_size_3;
								} else {
									lay_one_price_3 = "";
									lay_one_size_3 = "";
								}


								if (one_size_1 == 0 && one_size_2 == 0 && one_size_3 == 0 && lay_one_size_1 == 0 && lay_one_size_2 == 0 && lay_one_size_3 == 0) {
									//	window.location.href = "/index";
								}
								/* if(parseFloat(one_price_1) <= 0){
									one_price_1 = "-";
									one_size_1 = "";
								}
								if(parseFloat(one_price_2) <= 0){
									one_price_2 = "-";
									one_size_2 = "";
								}
								if(parseFloat(one_price_3) <= 0){
									one_price_3 = "-";
									one_size_3 = "";
								}
								if(parseFloat(lay_one_price_1) <= 0){
									lay_one_price_1 = "-";
									lay_one_size_1 = "";
								}
								if(parseFloat(lay_one_price_2) <= 0){
									lay_one_price_2 = "-";
									lay_one_size_2 = "";
								}
								if(parseFloat(lay_one_price_3) <= 0){
									lay_one_price_3 = "-";
									lay_one_size_3 = "";
								} */

								if (!display_cashProfit) {
									display_cashProfit = {};
								}

								if (!display_cashProfit[marketType]) {
									display_cashProfit[marketType] = {};
								}

								if (!display_cashProfit[marketType][selectionId]) {
									display_cashProfit[marketType][selectionId] = {};
								}

								display_cashProfit[marketType][selectionId]['back_1'] = one_price_3;
								display_cashProfit[marketType][selectionId]['lay_1'] = lay_one_price_1;
								if (!display_cashProfit[marketType][selectionId]['exposure']) {
									display_cashProfit[marketType][selectionId]['exposure'] = 0;
								}

								var is_suspended = '';
								if (bet_suspended != "ACTIVE" && bet_suspended != "OPEN") {
									is_suspended = 'suspended';
								}

								html_match_tie_odds += "<div data-title='" + bet_suspended + "' class='aa table-row " + is_suspended + "' id='fullSelection_" + selectionId + "_" + market_marketid + "'  eventtype='4' eventid='" + eventId + "' marketid='" + market_market_id + "' selectionid='" + selectionId + "' eventname='" + runnerName + "' status='" + status + "'><div class='float-left country-name box-4'><span class='team-name'><b>" + runnerName + "</b></span><p><span class='float-left live_match_points' style='color: black;' id='live_match_points_" + selectionId + "_" + market_marketid + "'></span> <span class='float-right' style='display: none; color: black;'></span></p></div><div id='back_3_" + selectionId + "_" + market_marketid + "' class='box-1 back1 float-left " + hiddenclass + " text-center' side='Back'  selectionid='" + selectionId + "' runner='" + runnerName + "' marketname='" + runnerName + "' markettype='" + marketType + "' fullmarketodds='" + one_price_1 + "'  oddsmarketId=" + oddsmarketId + " event_name='" + eventName2 + "' market_odd_name='" + market_odd_name + "' marketId='" + selectionId + "' eventId='" + eventId + "'   inplay='" + inPlay + "' ><button><span class='odd d-block'>" + one_price_1 + "</span> <span class='d-block'>" + one_size_1 + "</span></button></div><div class='box-1 back2 float-left back-2 " + hiddenclass + " text-center' id='back_2_" + selectionId + "_" + market_marketid + "' side='Back'  selectionid='" + selectionId + "' runner='" + runnerName + "' marketname='" + runnerName + "' markettype='" + marketType + "' fullmarketodds='" + one_price_2 + "'  oddsmarketId=" + oddsmarketId + " event_name='" + eventName2 + "' market_odd_name='" + market_odd_name + "' marketId='" + selectionId + "' eventId='" + eventId + "'   inplay='" + inPlay + "'><button><span class='odd d-block'>" + one_price_2 + "</span> <span class='d-block'>" + one_size_2 + "</span></button></div><div class='box-1 back float-left back lock text-center back-1'  id='back_1_" + selectionId + "_" + market_marketid + "' side='Back'  selectionid='" + selectionId + "' runner='" + runnerName + "' marketname='" + runnerName + "' markettype='" + marketType + "' fullmarketodds='" + one_price_3 + "'  oddsmarketId=" + oddsmarketId + " event_name='" + eventName2 + "' market_odd_name='" + market_odd_name + "' marketId='" + selectionId + "' eventId='" + eventId + "'   inplay='" + inPlay + "'><button><span class='odd d-block'>" + one_price_3 + "</span> <span class='d-block'>" + one_size_3 + "</span></button></div><div class='box-1 lay float-left text-center lay-1' id='lay_1_" + selectionId + "_" + market_marketid + "' side='Lay' selectionid='" + selectionId + "' runner='" + runnerName + "' marketname='" + runnerName + "' markettype='" + marketType + "' fullmarketodds='" + lay_one_price_1 + "' oddsmarketId=" + oddsmarketId + " event_name='" + eventName2 + "' market_odd_name='" + market_odd_name + "' marketId='" + selectionId + "' eventId='" + eventId + "'   inplay='" + inPlay + "'><button><span class='odd d-block'>" + lay_one_price_1 + "</span> <span class='d-block'>" + lay_one_size_1 + "</span></button></div><div class='box-1 lay-2 float-left " + hiddenclass + " text-center' id='lay_2_" + selectionId + "_" + market_marketid + "' side='Lay' selectionid='" + selectionId + "' runner='" + runnerName + "' marketname='" + runnerName + "' markettype='" + marketType + "' fullmarketodds='" + lay_one_price_2 + "' oddsmarketId=" + oddsmarketId + " event_name='" + eventName2 + "' market_odd_name='" + market_odd_name + "' marketId='" + selectionId + "' eventId='" + eventId + "'   inplay='" + inPlay + "'><button><span class='odd d-block'>" + lay_one_price_2 + "</span> <span class='d-block'>" + lay_one_size_2 + "</span></button></div><div class='box-1 float-left " + hiddenclass + " text-center lay1' id='lay_3_" + selectionId + "_" + market_marketid + "'><button><span class='odd d-block' side='Lay' selectionid='" + selectionId + "' runner='" + runnerName + "' marketname='" + runnerName + "' markettype='" + marketType + "' fullmarketodds='" + lay_one_price_3 + "' oddsmarketId=" + oddsmarketId + " event_name='" + eventName2 + "' market_odd_name='" + market_odd_name + "' marketId='" + selectionId + "' eventId='" + eventId + "'   inplay='" + inPlay + "'>" + lay_one_price_3 + "</span> <span class='d-block'>" + lay_one_size_3 + "</span></button></div></div>";
								xc++;
								if (xc == args.body.data[k].runners.length) {
									var xb = 0;
									var html_match = "";
									while (display_runners[xb]) {
										// <div class="col-4 text-center text-success"><b><span id="middle_data_' + display_runners[xb].runner_id + '_' + display_runners[xb].marketType + '" class="clear_exposure" style="color: black;">0</span></b></div>
										html_match += '<div class="row row5 mt-2 commonblock div_' + display_runners[xb].marketType + '"><div class="col-6"><span>' + display_runners[xb].runner_name + '</span></div><div class="col-6 text-right"><span id="last_data_' + display_runners[xb].runner_id + '_' + display_runners[xb].marketType + '"  class="last_data_' + display_runners[xb].marketType + ' text-danger clear_exposure"><b>0</b></span></div></div>';
										xb++;
										if (display_runners.length == xb) {
											$("#back_match_odds_data").html(html_match);
										}
									}

								}


							}
						}
						html_match_tie_odds += "</div>";
					} else {

						html_match_odds += "<div class='market-title cashout mt-1'>" + market_type_name + "<button class='btn btn-success btn-sm' disabled=''>Cashout</button></div>";
						if (market_type_name == "Match Odds") {
							marketType = "MATCH_ODDS";
						} else if (market_type_name == "Tied Match") {
							marketType = "TIED_MATCH";
						} else if (market_type_name == "To Win the Toss") {
							marketType = "TOSS_ODDS";
						} else {
							if (market_type_name) {
								market_type_name = market_type_name.split(".").join("_");
								market_type_name = market_type_name.split(" ").join("_");
								market_type_name = market_type_name.split("/").join("_");
								market_type_name = market_type_name.split(" ").join("_");
								marketType = market_type_name.toUpperCase();
							}
						}
						market_type_name2 = marketType.toUpperCase();
						market_marketid = market_type_name2;
						var classdesign = "fancy-market";
						var hiddenclass2 = "hidden-portrait";
						if (market_marketid == "MATCH_ODDS") {
							classdesign = "bookmaker-market";
							hiddenclass2 = "";
						}
						html_match_odds += "<div class='" + classdesign + "'><div class='table-header'><div class='float-left country-name box-6 min-max'><b>Max:<span id='match_odds_max_bet_" + k + "'>1</span></b></div> <div class='back box-1 float-left text-center lablesize'><b>Back</b></div> <div class='lay box-1 float-left text-center lablesize'><b>Lay</b></div></div>";
						if (args.body.data[k].runners) {
							var xc = 0;
							for (j = 0; j < args.body.data[k].runners.length; j++) {

								var selectionId = args.body.data[k].runners[j].id;

								selectorIdArray.push(selectionId);
								runnerName = args.body.data[k].runners[j].name;
								marketName = args.body.data[k].runners[j].name;
								/* display_runners.push({
									runner_id: selectionId,
									runner_name: runnerName,
								}); */
								var bet_suspended = args.body.data[k].runners[j].status;
								var other_fancy = "";

								if (market_type_name == "Match Odds") {
									marketType = "MATCH_ODDS";
								} else if (market_type_name == "Tied Match") {
									marketType = "TIED_MATCH";
								} else if (market_type_name == "To Win the Toss") {
									marketType = "TOSS_ODDS";
								} else {
									if (market_type_name) {
										market_type_name = market_type_name.split(".").join("_");
										market_type_name = market_type_name.split(" ").join("_");
										market_type_name = market_type_name.split("/").join("_");
										market_type_name = market_type_name.split(" ").join("_");
										marketType = market_type_name.toUpperCase();
									}
									other_fancy = "other";
									marketType = market_type_name.toUpperCase();
								}

								display_runners.push({
									marketType: marketType,
									runner_id: selectionId,
									runner_name: runnerName,
								});

								if (args.body.data[k].runners[j].back[2]) {
									one_price_1 = args.body.data[k].runners[j].back[2].price || "";
									one_size_1 = args.body.data[k].runners[j].back[2].size;
									if (parseFloat(one_size_1)) {
										one_size_1 = parseFloat(one_size_1);
									} else {
										one_size_1 = "-";
									}
									//one_size_1 = parseFloat(one_size_1) >= 1000 ? one_size_1/1000 + "K" : one_size_1;
								} else {
									one_price_1 = "";
									one_size_1 = "";
								}
								if (args.body.data[k].runners[j].back[1]) {
									one_price_2 = args.body.data[k].runners[j].back[1].price || "";
									one_size_2 = args.body.data[k].runners[j].back[1].size;
									if (parseFloat(one_size_2)) {
										one_size_2 = parseFloat(one_size_2);
									} else {
										one_size_2 = "-";
									}
									//	one_size_2 = one_size_2 >= 1000 ? one_size_2/1000 + "K" : one_size_2;
								} else {
									one_price_2 = "";
									one_size_2 = "";
								}
								if (args.body.data[k].runners[j].back[0]) {
									one_price_3 = args.body.data[k].runners[j].back[0].price || "";
									one_size_3 = args.body.data[k].runners[j].back[0].size || "";
									if (parseFloat(one_size_3)) {
										one_size_3 = parseFloat(one_size_3);
									} else {
										one_size_3 = "-";
									}
									//	one_size_3 = one_size_3 >= 1000 ? one_size_3/1000 + "K" : one_size_3;
								} else {
									one_price_3 = "";
									one_size_3 = "";
								}
								if (args.body.data[k].runners[j].lay[0]) {
									lay_one_price_1 = args.body.data[k].runners[j].lay[0].price || "";
									lay_one_size_1 = args.body.data[k].runners[j].lay[0].size;
									if (parseFloat(lay_one_size_1)) {
										lay_one_size_1 = parseFloat(lay_one_size_1);
									} else {
										lay_one_size_1 = "-";
									}
									//	lay_one_size_1 = lay_one_size_1 >= 1000 ? lay_one_size_1/1000 + "K" : lay_one_size_1;
								} else {
									lay_one_size_1 = "";
									lay_one_price_1 = "";
								}
								if (args.body.data[k].runners[j].lay[1]) {
									lay_one_price_2 = args.body.data[k].runners[j].lay[1].price || "";
									lay_one_size_2 = args.body.data[k].runners[j].lay[1].size;
									if (parseFloat(lay_one_size_2)) {
										lay_one_size_2 = parseFloat(lay_one_size_2);
									} else {
										lay_one_size_2 = "-";
									}
									//	lay_one_size_2 = lay_one_size_2 >= 1000 ? lay_one_size_2/1000 + "K" : lay_one_size_2;
								} else {
									lay_one_size_2 = "";
									lay_one_price_2 = "";
								}
								if (args.body.data[k].runners[j].lay[2]) {
									lay_one_price_3 = args.body.data[k].runners[j].lay[2].price || "";
									lay_one_size_3 = args.body.data[k].runners[j].lay[2].size;
									if (parseFloat(lay_one_size_3)) {
										lay_one_size_3 = parseFloat(lay_one_size_3);
									} else {
										lay_one_size_3 = "-";
									}
									//	lay_one_size_3 = lay_one_size_3 >= 1000 ? one_size_2/1000 + "K" : lay_one_size_3;
								} else {
									lay_one_price_3 = "";
									lay_one_size_3 = "";
								}
								if (one_size_1 == 0 && one_size_2 == 0 && one_size_3 == 0 && lay_one_size_1 == 0 && lay_one_size_2 == 0 && lay_one_size_3 == 0) {
									//	window.location.href = "/index";
								}
								if (!display_cashProfit) {
									display_cashProfit = {};
								}

								if (!display_cashProfit[marketType]) {
									display_cashProfit[marketType] = {};
								}

								if (!display_cashProfit[marketType][selectionId]) {
									display_cashProfit[marketType][selectionId] = {};
								}

								display_cashProfit[marketType][selectionId]['back_1'] = one_price_3;
								display_cashProfit[marketType][selectionId]['lay_1'] = lay_one_price_1;
								if (!display_cashProfit[marketType][selectionId]['exposure']) {
									display_cashProfit[marketType][selectionId]['exposure'] = 0;
								}

								/* if(one_price_1 <= 0){
									one_price_1 = "-";
									one_size_1 = "";
								}
								if(one_price_2 <= 0){
									one_price_2 = "-";
									one_size_2 = "";
								}
								if(one_price_3 <= 0){
									one_price_3 = "-";
									one_size_3 = "";
								}
								if(lay_one_price_1 <= 0){
									lay_one_price_1 = "-";
									lay_one_size_1 = "";
								}
								if(lay_one_price_2 <= 0){
									lay_one_price_2 = "-";
									lay_one_size_2 = "";
								}
								if(lay_one_price_3 <= 0){
									lay_one_price_3 = "-";
									lay_one_size_3 = "";
								} */

								var is_suspended = '';
								if (bet_suspended != "ACTIVE" && bet_suspended != "OPEN") {
									is_suspended = 'suspended';
								}

								html_match_odds += "<div data-title='" + bet_suspended + "' class='bb table-row " + is_suspended + "' id='fullSelection_" + selectionId + "_" + market_marketid + "'  eventtype='4' eventid='" + eventId + "' marketid='" + market_market_id + "' selectionid='" + selectionId + "' eventname='" + runnerName + "' status='" + status + "'><div class='float-left country-name box-4'><span class='team-name'><b>" + runnerName + "</b></span><p><span class='float-left live_match_points' style='color: black;' id='live_match_points_" + selectionId + "_" + market_marketid + "'></span> <span class='float-right' style='display: none; color: black;'></span></p></div><div id='back_3_" + selectionId + "_" + market_marketid + "' class='box-1 back1 float-left " + hiddenclass2 + " text-center' side='Back'  selectionid='" + selectionId + "' runner='" + runnerName + "' marketname='" + runnerName + "' markettype='" + marketType + "' fullmarketodds='" + one_price_1 + "'  oddsmarketId=" + oddsmarketId + " event_name='" + eventName2 + "' market_odd_name='" + market_odd_name + "' marketId='" + selectionId + "' eventId='" + eventId + "'   inplay='" + inPlay + "' ><button><span class='odd d-block'>" + one_price_1 + "</span> <span class='d-block'>" + one_size_1 + "</span></button></div><div class='box-1 back2 float-left back-2 " + hiddenclass2 + " text-center' id='back_2_" + selectionId + "_" + market_marketid + "' side='Back'  selectionid='" + selectionId + "' runner='" + runnerName + "' marketname='" + runnerName + "' markettype='" + marketType + "' fullmarketodds='" + one_price_2 + "'  oddsmarketId=" + oddsmarketId + " event_name='" + eventName2 + "' market_odd_name='" + market_odd_name + "' marketId='" + selectionId + "' eventId='" + eventId + "'   inplay='" + inPlay + "'><button><span class='odd d-block'>" + one_price_2 + "</span> <span class='d-block'>" + one_size_2 + "</span></button></div><div class='box-1 back float-left back lock text-center back-1'  id='back_1_" + selectionId + "_" + market_marketid + "' side='Back'  selectionid='" + selectionId + "' runner='" + runnerName + "' marketname='" + runnerName + "' markettype='" + marketType + "' fullmarketodds='" + one_price_3 + "'  oddsmarketId=" + oddsmarketId + " event_name='" + eventName2 + "' market_odd_name='" + market_odd_name + "' marketId='" + selectionId + "' eventId='" + eventId + "'   inplay='" + inPlay + "' other_fancy='" + other_fancy + "'><button><span class='odd d-block'>" + one_price_3 + "</span> <span class='d-block'>" + one_size_3 + "</span></button></div><div class='box-1 lay float-left text-center lay-1' id='lay_1_" + selectionId + "_" + market_marketid + "' side='Lay' selectionid='" + selectionId + "' runner='" + runnerName + "' marketname='" + runnerName + "' markettype='" + marketType + "' fullmarketodds='" + lay_one_price_1 + "' oddsmarketId=" + oddsmarketId + " event_name='" + eventName2 + "' market_odd_name='" + market_odd_name + "' marketId='" + selectionId + "' eventId='" + eventId + "'   inplay='" + inPlay + "' other_fancy='" + other_fancy + "'><button><span class='odd d-block'>" + lay_one_price_1 + "</span> <span class='d-block'>" + lay_one_size_1 + "</span></button></div><div class='box-1 lay-2 float-left " + hiddenclass2 + " text-center' id='lay_2_" + selectionId + "_" + market_marketid + "' side='Lay' selectionid='" + selectionId + "' runner='" + runnerName + "' marketname='" + runnerName + "' markettype='" + marketType + "' fullmarketodds='" + lay_one_price_2 + "' oddsmarketId=" + oddsmarketId + " event_name='" + eventName2 + "' market_odd_name='" + market_odd_name + "' marketId='" + selectionId + "' eventId='" + eventId + "'   inplay='" + inPlay + "'><button><span class='odd d-block'>" + lay_one_price_2 + "</span> <span class='d-block'>" + lay_one_size_2 + "</span></button></div><div class='box-1 float-left " + hiddenclass2 + " text-center lay1' id='lay_3_" + selectionId + "_" + market_marketid + "'><button><span class='odd d-block' side='Lay' selectionid='" + selectionId + "' runner='" + runnerName + "' marketname='" + runnerName + "' markettype='" + marketType + "' fullmarketodds='" + lay_one_price_3 + "' oddsmarketId=" + oddsmarketId + " event_name='" + eventName2 + "' market_odd_name='" + market_odd_name + "' marketId='" + selectionId + "' eventId='" + eventId + "'   inplay='" + inPlay + "'>" + lay_one_price_3 + "</span> <span class='d-block'>" + lay_one_size_3 + "</span></button></div></div>";
								xc++;
								if (xc == args.body.data[k].runners.length) {
									var xb = 0;
									var html_match = "";
									while (display_runners[xb]) {
										// <div class="col-4 text-center text-success"><b><span id="middle_data_' + display_runners[xb].runner_id + '_' + display_runners[xb].marketType + '" class="clear_exposure" style="color: black;">0</span></b></div>
										html_match += '<div class="row row5 mt-2 commonblock div_' + display_runners[xb].marketType + '"><div class="col-6"><span>' + display_runners[xb].runner_name + '</span></div><div class="col-6 text-right"><span id="last_data_' + display_runners[xb].runner_id + '_' + display_runners[xb].marketType + '"  class="last_data_' + display_runners[xb].marketType + ' text-danger clear_exposure"><b></b></span></div></div>';
										xb++;
										if (display_runners.length == xb) {
											$("#back_match_odds_data").html(html_match);
										}
									}

								}


							}
						}
						html_match_odds += "</div>";
					}


					<?php if ($eventType != 4) { ?>
						if (marketType == "MATCH_ODDS") {
							if (args.body.data[0]) {

								if (args.body.data[0][0]) {
									args.body.data[0] = args.body.data[0][0];
								}
								bookmaker_remarks = "";
								html_bookmaker_odds = "";
								eventName = $(".event_name_heading").attr("event_name");

								if (args.body.data[0].bookmaker && args.body.data[0].bookmaker != null) {
									bookmaker_remarks = args.body.data[0].remark;
									if (bookmaker_remarks) {

									} else {
										bookmaker_remarks = "";
									}
									html_bookmaker_odds = "";
									var classdesignbook = "bookmaker-market";
									var hiddenclass2 = "";
									if (parseInt(eventTypeId) == 1) {
										classdesignbook = "fancy-market";
										hiddenclass2 = "hidden-portrait";
									}

									html_bookmaker_odds += "<div id='bookmaker_market_div_0'><div class='market-title mt-1'>Bookmakerr<p class='float-right mb-0' data-target='#view_bookmaker_rules' data-toggle='modal'><i class='fas fa-info-circle'></i></p></div><div class='" + classdesignbook + "'><div class='table-header'><div class='float-left country-name box-6 min-max'><b>Min:  <span id='bookmaker_min'></span> Max: <span id='bookmaker_max'></span> </b></div><div class='back box-1 float-left text-center lablesize'><b>Back</b></div><div class='lay box-1 float-left text-center lablesize'><b>Lay</b></div></div>";
									var xc = 0;
									for (z = 0; z < args.body.data[0].bookmaker.length; z++) {

										if (args.body.data[0].bookmaker[z] && args.body.data[0].bookmaker[z]) {

											html_bookmaker_odds += "<div class='table-body' id='match_odds_bookmaker_market_" + z + "'>";

											var bookmaker1_data = args.body.data[0].bookmaker[z];

											runnerName = bookmaker1_data['name'];
											book_status = bookmaker1_data['status'];
											selectionId = bookmaker1_data['selectionId'];
											display_runners_bm.push({
												runner_id: selectionId,
												runner_name: runnerName,
											});

											marketType = "BOOKMAKER_ODDS";
											selectorIdBookmakerArray.push(selectionId);

											marketName = runnerName;
											var bet_suspended = "";

											if (bookmaker1_data.back[0].price) {
												bookmaker1_back_rate = bookmaker1_data.back[0].price || "";
											} else {
												bookmaker1_back_rate = "";
											}

											if (bookmaker1_data.back[0].size) {
												bookmaker1_back_size = bookmaker1_data.back[0].size || "";
											} else {
												bookmaker1_back_size = "-";
											}
											//bookmaker1_back_size = parseFloat(bookmaker1_back_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_size) / 1000) + "K" : bookmaker1_back_size;

											if (bookmaker1_data.back[1].price) {
												bookmaker1_back_2_rate = bookmaker1_data.back[1].price || "";
											} else {
												bookmaker1_back_2_rate = "-";
											}

											if (bookmaker1_data.back[1].size) {
												bookmaker1_back_2_size = bookmaker1_data.back[1].size || "";
											} else {
												bookmaker1_back_2_size = "-";
											}
											//bookmaker1_back_2_size = parseFloat(bookmaker1_back_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_2_size) / 1000) + "K" : bookmaker1_back_2_size;

											if (bookmaker1_data.back[2].price) {
												bookmaker1_back_3_rate = bookmaker1_data.back[2].price || "";
											} else {
												bookmaker1_back_3_rate = "-";
											}

											if (bookmaker1_data.back[2].size) {
												bookmaker1_back_3_size = bookmaker1_data.back[2].size || "";
											} else {
												bookmaker1_back_3_size = "-";
											}
											//bookmaker1_back_3_size = parseFloat(bookmaker1_back_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_3_size) / 1000) + "K" : bookmaker1_back_3_size;


											if (bookmaker1_data.lay[0].price) {
												bookmaker1_lay_rate = bookmaker1_data.lay[0].price || "";
											} else {
												bookmaker1_lay_rate = "-";
											}

											if (bookmaker1_data.lay[0].size) {
												bookmaker1_lay_size = bookmaker1_data.lay[0].size || "";
											} else {
												bookmaker1_lay_size = "-";
											}
											//bookmaker1_lay_size = parseFloat(bookmaker1_lay_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_size) / 1000) + "K" : bookmaker1_lay_size;

											if (bookmaker1_data.lay[1].price) {
												bookmaker1_lay_2_rate = bookmaker1_data.lay[1].price || "";
											} else {
												bookmaker1_lay_2_rate = "";
											}
											if (bookmaker1_data.lay[1].size) {
												bookmaker1_lay_2_size = bookmaker1_data.lay[1].size || "";
											} else {
												bookmaker1_lay_2_size = "";
											}
											//bookmaker1_lay_2_size = parseFloat(bookmaker1_lay_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_2_size) / 1000) + "K" : bookmaker1_lay_2_size;


											if (bookmaker1_data.lay[2].price) {
												bookmaker1_lay_3_rate = bookmaker1_data.lay[2].price || "";
											} else {
												bookmaker1_lay_3_rate = "-";
											}
											if (bookmaker1_data.lay[2].size) {
												bookmaker1_lay_3_size = bookmaker1_data.lay[2].size || "";
											} else {
												bookmaker1_lay_3_size = "";
											}
											//bookmaker1_lay_3_size = parseFloat(bookmaker1_lay_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_3_size) / 1000) + "K" : bookmaker1_lay_3_size;

											bookmaker_suspended = "";
											if (book_status != "ACTIVE") {
												bookmaker_suspended = "suspended";
											}
											var temp_selectionId;
											temp_selectionId = runnerName.split(" ").join('_');
											temp_selectionId = temp_selectionId.replace(/[^a-zA-Z ]/g, "");

											if (!display_cashProfit) {
												display_cashProfit = {};
											}

											if (!display_cashProfit[marketType]) {
												display_cashProfit[marketType] = {};
											}

											if (!display_cashProfit[marketType][selectionId]) {
												display_cashProfit[marketType][selectionId] = {};
											}

											display_cashProfit[marketType][selectionId]['back_1'] = bookmaker1_back_rate;
											display_cashProfit[marketType][selectionId]['lay_1'] = bookmaker1_lay_rate;
											if (!display_cashProfit[marketType][selectionId]['exposure']) {
												display_cashProfit[marketType][selectionId]['exposure'] = 0;
											}

											html_bookmaker_odds += "<div data-title='" + book_status + "' class='table-row " + bookmaker_suspended + "' id='bookmaker_row_" + temp_selectionId + "'><div class='float-left country-name  box-4'><span class='team-name'><b>" + runnerName + "</b></span><p><span class='float-left live_match_points' style='color: black;' id='live_match_points_" + selectionId + "_BOOKMAKER_ODDS'></span>  <span class='float-right' style='display: none; color: black;'></span></p></div><div class='box-1 back1 float-left " + hiddenclass2 + "  text-center' id='back_3_" + temp_selectionId + "_BOOKMAKER_ODDS' ><button><span class='odd d-block'>" + bookmaker1_back_3_rate + "</span> <span class='d-block'>" + bookmaker1_back_3_size + "</span></button></div><div class='box-1 back2 float-left " + hiddenclass2 + " back-2  text-center' id='back_2_" + temp_selectionId + "_BOOKMAKER_ODDS' ><button><span class='odd d-block'>" + bookmaker1_back_2_rate + "</span> <span class='d-block'>" + bookmaker1_back_2_size + "</span></button></div><div class='box-1 back float-left back lock text-center back-1'  id='back_1_" + temp_selectionId + "_BOOKMAKER_ODDS' side='Back'  selectionid='" + selectionId + "' runner='" + runnerName + "' marketname='" + runnerName + "' markettype='" + marketType + "' fullmarketodds='" + bookmaker1_back_rate + "'  oddsmarketId=" + oddsmarketId + " event_name='" + eventName + "' market_odd_name='BOOKMAKER_ODDS' marketId='" + selectionId + "' eventId='" + eventId + "'   inplay='1'><button><span class='odd d-block'>" + bookmaker1_back_rate + "</span> <span class='d-block'>" + bookmaker1_back_size + "</span></button></div><div class='box-1 lay float-left text-center lay-1' id='lay_1_" + temp_selectionId + "_BOOKMAKER_ODDS' side='Lay'  selectionid='" + selectionId + "' runner='" + runnerName + "' marketname='" + runnerName + "' markettype='" + marketType + "' fullmarketodds='" + bookmaker1_lay_rate + "'  oddsmarketId=" + oddsmarketId + " event_name='" + eventName + "' market_odd_name='BOOKMAKER_ODDS' marketId='" + selectionId + "' eventId='" + eventId + "'   inplay='1'><button><span class='odd d-block'>" + bookmaker1_lay_rate + "</span> <span class='d-block'>" + bookmaker1_lay_size + "</span></button></div><div class='box-1 lay-2 float-left " + hiddenclass2 + "  text-center' id='lay_2_" + temp_selectionId + "_BOOKMAKER_ODDS' ><button><span class='odd d-block'>" + bookmaker1_lay_2_rate + "</span> <span class='d-block'>" + bookmaker1_lay_2_size + "</span></button></div><div class='box-1 lay-1 float-left " + hiddenclass2 + "  text-center' id='lay_3_" + temp_selectionId + "_BOOKMAKER_ODDS' ><button><span class='odd d-block'>" + bookmaker1_lay_3_rate + "</span> <span class='d-block'>" + bookmaker1_lay_3_size + "</span></button></div></div> </div>";

										}
										xc++;

										if (xc == args.body.data[0].bookmaker.length) {
											var xb = 0;
											var html_match = "";
											while (display_runners_bm[xb]) {
												// <div class="col-4 text-center text-success"><b><span id="middle_data_' + display_runners_bm[xb].runner_id + '_BOOKMAKER_ODDS" class="clear_exposure" style="color: black;">0</span></b></div>
												html_match += '<div class="row row5 mt-2"><div class="col-6"><span>' + display_runners_bm[xb].runner_name + '</span></div><div class="col-6 text-right"><span id="last_data_' + display_runners_bm[xb].runner_id + '_BOOKMAKER_ODDS" class="last_data_BOOKMAKER_ODDS text-danger clear_exposure"><b></b></span></div></div>';
												xb++;
												if (display_runners_bm.length == xb) {
													$("#back_bookmaker_data").html(html_match);

												} else {
													$("#back_bookmaker_data").html("");
												}
											}

										}
									}

									html_bookmaker_odds += "</div><div class='table-remark text-right remark' id='bookmaker-remakrs-" + z + "'>" + bookmaker_remarks + "</div><div></div></div>";

									if (html_bookmaker_odds != "") {
										html_match_odds += html_bookmaker_odds;
									}
								}

								bookmaker_tied_remarks = "";
								html_bookmaker_tied_odds = "";
								eventName = $(".event_name_heading").attr("event_name");

								if (args.body.data[0].bookmaker_tied && args.body.data[0].bookmaker_tied != null) {
									bookmaker_tied_remarks = args.body.data[0].bookmaker_tied_remarks;
									if (bookmaker_tied_remarks) {

									} else {
										bookmaker_tied_remarks = "";
									}

									html_bookmaker_tied_odds = "";
									html_bookmaker_tied_odds += "<div id='bookmaker_tied_market_div_0'><div class='market-title mt-1'>Tied Match<p class='float-right mb-0' data-target='#view_bookmaker_tied_rules' data-toggle='modal'><i class='fas fa-info-circle'></i></p></div><div class='bookmaker-tied-market'><div class='table-header'><div class='float-left country-name box-6 min-max'><b>Min:  <span id='bookmaker_tied_min'></span> Max: <span id='bookmaker_tied_max'></span> </b></div><div class='back box-1 float-left text-center lablesize'><b>Back</b></div><div class='lay box-1 float-left text-center lablesize'><b>Lay</b></div></div>";
									var xc = 0;
									for (z = 0; z < args.body.data[0].bookmaker_tied.length; z++) {

										if (args.body.data[0].bookmaker_tied[z] && args.body.data[0].bookmaker_tied[z]) {

											html_bookmaker_tied_odds += "<div class='table-body' id='match_odds_bookmaker_tied_market_" + z + "'>";

											var bookmaker1_tied_data = args.body.data[0].bookmaker_tied[z];

											runnerName = bookmaker1_tied_data['name'];
											book_status = bookmaker1_tied_data['status'];
											selectionId = bookmaker1_tied_data['selectionId'];
											display_runners_tied_bm.push({
												runner_id: selectionId,
												runner_name: runnerName,
											});

											marketType = "BOOKMAKER_TIED_ODDS";
											selectorIdBookmakerTiedArray.push(selectionId);

											marketName = runnerName;
											var bet_suspended = "";

											if (bookmaker1_tied_data.back[0].price) {
												bookmaker1_tied_back_rate = bookmaker1_tied_data.back[0].price || "";
											} else {
												bookmaker1_tied_back_rate = "-";
											}

											if (bookmaker1_tied_data.back[0].size) {
												bookmaker1_tied_back_size = bookmaker1_tied_data.back[0].size || "";
											} else {
												bookmaker1_tied_back_size = "";
											}
											//bookmaker1_tied_back_size = parseFloat(bookmaker1_tied_back_size) >= 1000 ? parseInt(parseInt(bookmaker1_tied_back_size) / 1000) + "K" : bookmaker1_tied_back_size;

											if (bookmaker1_tied_data.back[1].price) {
												bookmaker1_tied_back_2_rate = bookmaker1_tied_data.back[1].price || "";
											} else {
												bookmaker1_tied_back_2_rate = "-";
											}

											if (bookmaker1_tied_data.back[1].size) {
												bookmaker1_tied_back_2_size = bookmaker1_tied_data.back[1].size || "";
											} else {
												bookmaker1_tied_back_2_size = "";
											}
											//bookmaker1_tied_back_2_size = parseFloat(bookmaker1_tied_back_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_tied_back_2_size) / 1000) + "K" : bookmaker1_tied_back_2_size;

											if (bookmaker1_tied_data.back[2].price) {
												bookmaker1_tied_back_3_rate = bookmaker1_tied_data.back[2].price || "";
											} else {
												bookmaker1_tied_back_3_rate = "-";
											}

											if (bookmaker1_tied_data.back[2].size) {
												bookmaker1_tied_back_3_size = bookmaker1_tied_data.back[2].size || "";
											} else {
												bookmaker1_tied_back_3_size = "";
											}
											//bookmaker1_tied_back_3_size = parseFloat(bookmaker1_tied_back_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_tied_back_3_size) / 1000) + "K" : bookmaker1_tied_back_3_size;


											if (bookmaker1_tied_data.lay[0].price) {
												bookmaker1_tied_lay_rate = bookmaker1_tied_data.lay[0].price || "";
											} else {
												bookmaker1_tied_lay_rate = "-";
											}

											if (bookmaker1_tied_data.lay[0].size) {
												bookmaker1_tied_lay_size = bookmaker1_tied_data.lay[0].size || "";
											} else {
												bookmaker1_tied_lay_size = "";
											}
											//bookmaker1_tied_lay_size = parseFloat(bookmaker1_tied_lay_size) >= 1000 ? parseInt(parseInt(bookmaker1_tied_lay_size) / 1000) + "K" : bookmaker1_tied_lay_size;

											if (bookmaker1_tied_data.lay[1].price) {
												bookmaker1_tied_lay_2_rate = bookmaker1_tied_data.lay[1].price || "";
											} else {
												bookmaker1_tied_lay_2_rate = "-";
											}
											if (bookmaker1_tied_data.lay[1].size) {
												bookmaker1_tied_lay_2_size = bookmaker1_tied_data.lay[1].size || "";
											} else {
												bookmaker1_tied_lay_2_size = "";
											}
											//bookmaker1_tied_lay_2_size = parseFloat(bookmaker1_tied_lay_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_tied_lay_2_size) / 1000) + "K" : bookmaker1_tied_lay_2_size;


											if (bookmaker1_tied_data.lay[2].price) {
												bookmaker1_tied_lay_3_rate = bookmaker1_tied_data.lay[2].price || "";
											} else {
												bookmaker1_tied_lay_3_rate = "-";
											}
											if (bookmaker1_tied_data.lay[2].size) {
												bookmaker1_tied_lay_3_size = bookmaker1_tied_data.lay[2].size || "";
											} else {
												bookmaker1_tied_lay_3_size = "";
											}
											//bookmaker1_tied_lay_3_size = parseFloat(bookmaker1_tied_lay_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_tied_lay_3_size) / 1000) + "K" : bookmaker1_tied_lay_3_size;

											bookmaker_tied_suspended = "";
											if (book_status != "ACTIVE") {
												bookmaker_tied_suspended = "suspended";
											}
											var temp_selectionId;
											temp_selectionId = runnerName.split(" ").join('_');
											temp_selectionId = temp_selectionId.replace(/[^a-zA-Z ]/g, "");


											if (!display_cashProfit) {
												display_cashProfit = {};
											}

											if (!display_cashProfit[marketType]) {
												display_cashProfit[marketType] = {};
											}

											if (!display_cashProfit[marketType][selectionId]) {
												display_cashProfit[marketType][selectionId] = {};
											}

											display_cashProfit[marketType][selectionId]['back_1'] = bookmaker1_tied_back_rate;
											display_cashProfit[marketType][selectionId]['lay_1'] = bookmaker1_tied_lay_rate;
											if (!display_cashProfit[marketType][selectionId]['exposure']) {
												display_cashProfit[marketType][selectionId]['exposure'] = 0;
											}

											html_bookmaker_tied_odds += "<div data-title='" + book_status + "' class='table-row " + bookmaker_tied_suspended + "' id='bookmaker_tied_row_" + temp_selectionId + "'><div class='float-left country-name  box-4'><span class='team-name'><b>" + runnerName + "</b></span><p><span class='float-left live_match_points' style='color: black;' id='live_match_points_" + selectionId + "_BOOKMAKER_TIED_ODDS'></span> <span class='float-right' style='display: none; color: black;'></span></p></div><div class='box-1 back1 float-left  text-center' id='back_3_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS' ><button><span class='odd d-block'>" + bookmaker1_tied_back_3_rate + "</span> <span class='d-block'>" + bookmaker1_tied_back_3_size + "</span></button></div><div class='box-1 back2 float-left back-2  text-center' id='back_2_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS' ><button><span class='odd d-block'>" + bookmaker1_tied_back_2_rate + "</span> <span class='d-block'>" + bookmaker1_tied_back_2_size + "</span></button></div><div class='box-1 back float-left back lock text-center back-1'  id='back_1_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS' side='Back'  selectionid='" + selectionId + "' runner='" + runnerName + "' marketname='" + runnerName + "' markettype='" + marketType + "' fullmarketodds='" + bookmaker1_tied_back_rate + "'  oddsmarketId=" + oddsmarketId + " event_name='" + eventName + "' market_odd_name='BOOKMAKER_TIED_ODDS' marketId='" + selectionId + "' eventId='" + eventId + "'   inplay='1'><button><span class='odd d-block'>" + bookmaker1_tied_back_rate + "</span> <span class='d-block'>" + bookmaker1_tied_back_size + "</span></button></div><div class='box-1 lay float-left text-center lay-1' id='lay_1_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS' side='Lay'  selectionid='" + selectionId + "' runner='" + runnerName + "' marketname='" + runnerName + "' markettype='" + marketType + "' fullmarketodds='" + bookmaker1_tied_lay_rate + "'  oddsmarketId=" + oddsmarketId + " event_name='" + eventName + "' market_odd_name='BOOKMAKER_TIED_ODDS' marketId='" + selectionId + "' eventId='" + eventId + "'   inplay='1'><button><span class='odd d-block'>" + bookmaker1_tied_lay_rate + "</span> <span class='d-block'>" + bookmaker1_tied_lay_size + "</span></button></div><div class='box-1 lay-2 float-left  text-center' id='lay_2_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS' ><button><span class='odd d-block'>" + bookmaker1_tied_lay_2_rate + "</span> <span class='d-block'>" + bookmaker1_tied_lay_2_size + "</span></button></div><div class='box-1 lay-1 float-left  text-center' id='lay_3_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS' ><button><span class='odd d-block'>" + bookmaker1_tied_lay_3_rate + "</span> <span class='d-block'>" + bookmaker1_tied_lay_3_size + "</span></button></div></div> </div>";

										}
										xc++;

										if (xc == args.body.data[0].bookmaker_tied.length) {
											var xb = 0;
											var html_match = "";
											while (display_runners_tied_bm[xb]) {
												// <div class="col-4 text-center text-success"><b><span id="middle_data_' + display_runners_tied_bm[xb].runner_id + '_BOOKMAKER_TIED_ODDS" class="clear_exposure" style="color: black;">0</span></b></div>
												html_match += '<div class="row row5 mt-2"><div class="col-6"><span>' + display_runners_tied_bm[xb].runner_name + '</span></div><div class="col-6 text-right"><span id="last_data_' + display_runners_tied_bm[xb].runner_id + '_BOOKMAKER_TIED_ODDS" class="last_data_BOOKMAKER_TIED_ODDS text-danger clear_exposure"><b></b></span></div></div>';
												xb++;
												if (display_runners_tied_bm.length == xb) {
													$("#back_bookmaker_tied_data").html(html_match);

												} else {
													$("#back_bookmaker_tied_data").html("");
												}
											}

										}
									}

									html_bookmaker_tied_odds += "</div><div class='table-remark text-right remark' id='bookmaker-tied-remakrs-" + z + "'>" + bookmaker_tied_remarks + "</div><div></div></div>";

									if (html_bookmaker_tied_odds != "") {
										html_match_odds += html_bookmaker_tied_odds;

									}
								}
							}


							if (args.body) {
								if (args.body.data) {
									if (args.body.data[0].bm1) {

										if (args.body.data[0].bm1) {

											bookmaker_remarks = "";
											html_bookmaker_odds = "";
											eventName = $(".event_name_heading").attr("event_name");

											var bm_small1 = args.body.data[0].bm1;

											bm_small1_datas = bm_small1;
											bm_small1_datas.sort((a, b) => a.SelectionId - b.SelectionId);
											html_bookmaker_odds = "";
											html_bookmaker_odds += "<div id='bookmakersmall_market_div_0'><div class='market-title mt-1 cashout 3'>Bookmakerrr <button class='btn btn-success btn-sm' disabled=''>Cashout</button></div><div class='fancy-market'><div class='table-header'><div class='float-left country-name box-6 min-max'><b>Min:<?php echo $bookmaker_min; ?> Max:<?php echo $bookmakersmall_max; ?> </b></div><div class='back box-1 float-left text-center lablesize'><b>Back</b></div><div class='lay box-1 float-left text-center lablesize'><b>Lay</b></div></div>";
											var xc = 0;
											for (z = 0; z < bm_small1_datas.length; z++) {

												if (bm_small1_datas[z] && bm_small1_datas[z]) {
													html_bookmaker_odds += "<div class='table-body' id='match_odds_bookmakersmall_market_" + z + "'>";

													var bookmaker1_data = bm_small1_datas[z];

													runnerName = bookmaker1_data['RunnerName'];
													book_status = bookmaker1_data['GameStatus'];
													selectionId = bookmaker1_data['SelectionId'];
													display_runners_sbm.push({
														runner_id: selectionId,
														runner_name: runnerName,
													});
													marketType = "BOOKMAKERSMALL_ODDS";
													selectorIdBookmakerArray.push(selectionId);

													marketName = runnerName;
													var bet_suspended = "";

													if (bookmaker1_data.BackPrice1) {
														bookmaker1_back_rate = bookmaker1_data.BackPrice1 || "";
													} else {
														bookmaker1_back_rate = "-";
													}

													if (bookmaker1_data.BackSize1) {
														bookmaker1_back_size = bookmaker1_data.BackSize1 || "";
													} else {
														bookmaker1_back_size = "";
													}
													//bookmaker1_back_size = parseFloat(bookmaker1_back_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_size) / 1000) + "K" : bookmaker1_back_size;

													if (bookmaker1_data.BackPrice2) {
														bookmaker1_back_2_rate = bookmaker1_data.BackPrice2 || "";
													} else {
														bookmaker1_back_2_rate = "-";
													}

													if (bookmaker1_data.BackSize2) {
														bookmaker1_back_2_size = bookmaker1_data.BackSize2 || "";
													} else {
														bookmaker1_back_2_size = "";
													}
													//bookmaker1_back_2_size = parseFloat(bookmaker1_back_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_2_size) / 1000) + "K" : bookmaker1_back_2_size;

													if (bookmaker1_data.BackPrice3) {
														bookmaker1_back_3_rate = bookmaker1_data.BackPrice3 || "";
													} else {
														bookmaker1_back_3_rate = "-";
													}

													if (bookmaker1_data.BackSize3) {
														bookmaker1_back_3_size = bookmaker1_data.BackSize3 || "";
													} else {
														bookmaker1_back_3_size = "";
													}
													//bookmaker1_back_3_size = parseFloat(bookmaker1_back_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_3_size) / 1000) + "K" : bookmaker1_back_3_size;


													if (bookmaker1_data.LayPrice1) {
														bookmaker1_lay_rate = bookmaker1_data.LayPrice1 || "";
													} else {
														bookmaker1_lay_rate = "-";
													}

													if (bookmaker1_data.LaySize1) {
														bookmaker1_lay_size = bookmaker1_data.LaySize1 || "";
													} else {
														bookmaker1_lay_size = "";
													}
													//bookmaker1_lay_size = parseFloat(bookmaker1_lay_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_size) / 1000) + "K" : bookmaker1_lay_size;

													if (bookmaker1_data.LayPrice2) {
														bookmaker1_lay_2_rate = bookmaker1_data.LayPrice2 || "";
													} else {
														bookmaker1_lay_2_rate = "-";
													}
													if (bookmaker1_data.LaySize2) {
														bookmaker1_lay_2_size = bookmaker1_data.LaySize2 || "";
													} else {
														bookmaker1_lay_2_size = "";
													}
													//bookmaker1_lay_2_size = parseFloat(bookmaker1_lay_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_2_size) / 1000) + "K" : bookmaker1_lay_2_size;


													if (bookmaker1_data.LayPrice3) {
														bookmaker1_lay_3_rate = bookmaker1_data.LayPrice3 || "";
													} else {
														bookmaker1_lay_3_rate = "-";
													}
													if (bookmaker1_data.LaySize3) {
														bookmaker1_lay_3_size = bookmaker1_data.LaySize3 || "";
													} else {
														bookmaker1_lay_3_size = "";
													}
													//bookmaker1_lay_3_size = parseFloat(bookmaker1_lay_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_3_size) / 1000) + "K" : bookmaker1_lay_3_size;

													bookmaker_suspended = "";
													if (book_status != "ACTIVE") {
														bookmaker_suspended = "suspended";
													}

													if (!display_cashProfit) {
														display_cashProfit = {};
													}

													if (!display_cashProfit[marketType]) {
														display_cashProfit[marketType] = {};
													}

													if (!display_cashProfit[marketType][selectionId]) {
														display_cashProfit[marketType][selectionId] = {};
													}

													display_cashProfit[marketType][selectionId]['back_1'] = bookmaker1_back_rate;
													display_cashProfit[marketType][selectionId]['lay_1'] = bookmaker1_lay_rate;
													if (!display_cashProfit[marketType][selectionId]['exposure']) {
														display_cashProfit[marketType][selectionId]['exposure'] = 0;
													}

													var temp_selectionId;
													temp_selectionId = runnerName.split(" ").join('_');
													temp_selectionId = temp_selectionId.replace(/[^a-zA-Z ]/g, "");
													html_bookmaker_odds += "<div data-title='" + book_status + "' class='table-row " + bookmaker_suspended + "' id='bookmakersmall_row_" + temp_selectionId + "'><div class='float-left country-name box-4'><span class='team-name'><b>" + runnerName + "</b></span><p><span class='float-left live_match_points' style='color: black;' id='live_match_points_" + selectionId + "_BOOKMAKERSMALL_ODDS'></span>  <span class='float-right' style='display: none; color: black;'></span></p></div><div class='box-1 back float-left back lock text-center back-1'  id='back_1_" + temp_selectionId + "_BOOKMAKERSMALL_ODDS' side='Back'  selectionid='" + selectionId + "' runner='" + runnerName + "' marketname='" + runnerName + "' markettype='" + marketType + "' fullmarketodds='" + bookmaker1_back_rate + "'  oddsmarketId=" + oddsmarketId + " event_name='" + eventName + "' market_odd_name='BOOKMAKERSMALL_ODDS' marketId='" + selectionId + "' eventId='" + eventId + "'   inplay='1'><button><span class='odd d-block'>" + bookmaker1_back_rate + "</span> <span class='d-block'>" + bookmaker1_back_size + "</span></button></div><div class='box-1 lay float-left text-center lay-1' id='lay_1_" + temp_selectionId + "_BOOKMAKERSMALL_ODDS' side='Lay'  selectionid='" + selectionId + "' runner='" + runnerName + "' marketname='" + runnerName + "' markettype='" + marketType + "' fullmarketodds='" + bookmaker1_lay_rate + "'  oddsmarketId=" + oddsmarketId + " event_name='" + eventName + "' market_odd_name='BOOKMAKERSMALL_ODDS' marketId='" + selectionId + "' eventId='" + eventId + "'   inplay='1'><button><span class='odd d-block'>" + bookmaker1_lay_rate + "</span> <span class='d-block'>" + bookmaker1_lay_size + "</span></button></div></div> </div>";

												}

												xc++;
												if (xc == bm_small1_datas.length) {
													var xb = 0;
													var html_match = "";
													while (display_runners_sbm[xb]) {
														// <div class="col-4 text-center text-success"><b><span id="middle_data_' + display_runners_sbm[xb].runner_id + '_BOOKMAKERSMALL_ODDS" class="clear_exposure" style="color: black;">0</span></b></div>
														html_match += '<div class="row row5 mt-2"><div class="col-6"><span>' + display_runners_sbm[xb].runner_name + '</span></div><div class="col-6 text-right"><span id="last_data_' + display_runners_bm[xb].runner_id + '_BOOKMAKERSMALL_ODDS" class="text-danger last_data_BOOKMAKERSMALL_ODDS clear_exposure"><b></b></span></div></div>';
														xb++;
														if (display_runners_bm.length == xb) {
															$("#back_sm_bookmaker_data").html(html_match);
														} else {
															$("#back_sm_bookmaker_data").html("");

														}
													}

												}
											}

											html_bookmaker_odds += "</div><div class='table-remark text-right remark' id='bookmakersmall-remakrs-" + z + "'>" + bookmaker_remarks + "</div><div></div></div>";

											if (html_bookmaker_odds != "" && bm_small1_datas.length > 0) {

												html_match_odds += html_bookmaker_odds;
											}



										}


									}
								}
							}
						}

					<?php } ?>
				}

				html_match_odds += "";

				$(".event_name_heading").attr("eventid", eventId);
				$(".event_name_heading").attr("marketid", oddsmarketId);
				//						$(".event_name_heading").attr("event_name", eventName);
				// $(".event_name_heading").text(eventName);
				$("#match_odds_all_full_markets").html(html_match_odds);
				$("#match_odds_all_tie_markets").html(html_match_tie_odds);
			}
		}
		<?php if ($eventType == 4) { ?>

			if (args.body.data[0]) {
				if (args.body.data[0][0]) {
					args.body.data[0] = args.body.data[0][0];
				}
				bookmaker_remarks = "";
				html_bookmaker_odds = "";
				eventName = $(".event_name_heading").attr("event_name");

				if (args.body.data[0].bookmaker && args.body.data[0].bookmaker != null) {
					bookmaker_remarks = args.body.data[0].remark;
					if (bookmaker_remarks) {

					} else {
						bookmaker_remarks = "";
					}
					html_bookmaker_odds = "";
					html_bookmaker_odds += "<div id='bookmaker_market_div_0'><div class='market-title mt-1 cashout 4'>Bookmaker<button markettype='BOOKMAKER_ODDS' runner='Bookmaker' id='bookmaker_odds' class='btn btn-success btn-sm cashoutClick' disabled=''>Cashout</button></div><div class='bookmaker-market'><div class='table-header'><div class='float-left country-name box-6 min-max'><b>Min:  <span id='bookmaker_min'></span> Max: <span id='bookmaker_max'></span> </b></div><div class='back box-1 float-left text-center lablesize'><b>Back</b></div><div class='lay box-1 float-left text-center lablesize'><b>Lay</b></div></div>";
					var xc = 0;
					for (z = 0; z < args.body.data[0].bookmaker.length; z++) {

						if (args.body.data[0].bookmaker[z] && args.body.data[0].bookmaker[z]) {

							html_bookmaker_odds += "<div class='table-body' id='match_odds_bookmaker_market_" + z + "'>";

							var bookmaker1_data = args.body.data[0].bookmaker[z];

							runnerName = bookmaker1_data['name'];
							book_status = bookmaker1_data['status'];
							selectionId = bookmaker1_data['selectionId'];
							display_runners_bm.push({
								runner_id: selectionId,
								runner_name: runnerName,
							});

							marketType = "BOOKMAKER_ODDS";
							selectorIdBookmakerArray.push(selectionId);

							marketName = runnerName;
							var bet_suspended = "";

							if (bookmaker1_data.back[0].price) {
								bookmaker1_back_rate = bookmaker1_data.back[0].price || "";
							} else {
								bookmaker1_back_rate = "-";
							}

							if (bookmaker1_data.back[0].size) {
								bookmaker1_back_size = bookmaker1_data.back[0].size || "";
							} else {
								bookmaker1_back_size = "";
							}
							//bookmaker1_back_size = parseFloat(bookmaker1_back_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_size) / 1000) + "K" : bookmaker1_back_size;

							if (bookmaker1_data.back[1].price) {
								bookmaker1_back_2_rate = bookmaker1_data.back[1].price || "";
							} else {
								bookmaker1_back_2_rate = "-";
							}

							if (bookmaker1_data.back[1].size) {
								bookmaker1_back_2_size = bookmaker1_data.back[1].size || "";
							} else {
								bookmaker1_back_2_size = "";
							}
							//bookmaker1_back_2_size = parseFloat(bookmaker1_back_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_2_size) / 1000) + "K" : bookmaker1_back_2_size;

							if (bookmaker1_data.back[2].price) {
								bookmaker1_back_3_rate = bookmaker1_data.back[2].price || "";
							} else {
								bookmaker1_back_3_rate = "-";
							}

							if (bookmaker1_data.back[2].size) {
								bookmaker1_back_3_size = bookmaker1_data.back[2].size || "";
							} else {
								bookmaker1_back_3_size = "";
							}
							//bookmaker1_back_3_size = parseFloat(bookmaker1_back_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_3_size) / 1000) + "K" : bookmaker1_back_3_size;


							if (bookmaker1_data.lay[0].price) {
								bookmaker1_lay_rate = bookmaker1_data.lay[0].price || "";
							} else {
								bookmaker1_lay_rate = "-";
							}

							if (bookmaker1_data.lay[0].size) {
								bookmaker1_lay_size = bookmaker1_data.lay[0].size || "";
							} else {
								bookmaker1_lay_size = "";
							}
							//bookmaker1_lay_size = parseFloat(bookmaker1_lay_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_size) / 1000) + "K" : bookmaker1_lay_size;

							if (bookmaker1_data.lay[1].price) {
								bookmaker1_lay_2_rate = bookmaker1_data.lay[1].price || "";
							} else {
								bookmaker1_lay_2_rate = "-";
							}
							if (bookmaker1_data.lay[1].size) {
								bookmaker1_lay_2_size = bookmaker1_data.lay[1].size || "";
							} else {
								bookmaker1_lay_2_size = "";
							}
							//bookmaker1_lay_2_size = parseFloat(bookmaker1_lay_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_2_size) / 1000) + "K" : bookmaker1_lay_2_size;


							if (bookmaker1_data.lay[2].price) {
								bookmaker1_lay_3_rate = bookmaker1_data.lay[2].price || "";
							} else {
								bookmaker1_lay_3_rate = "-";
							}
							if (bookmaker1_data.lay[2].size) {
								bookmaker1_lay_3_size = bookmaker1_data.lay[2].size || "";
							} else {
								bookmaker1_lay_3_size = "";
							}
							//bookmaker1_lay_3_size = parseFloat(bookmaker1_lay_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_3_size) / 1000) + "K" : bookmaker1_lay_3_size;

							bookmaker_suspended = "";
							if (book_status != "ACTIVE") {
								bookmaker_suspended = "suspended";
							}
							var temp_selectionId;
							temp_selectionId = runnerName.split(" ").join('_');
							temp_selectionId = temp_selectionId.replace(/[^a-zA-Z ]/g, "");

							if (!display_cashProfit) {
								display_cashProfit = {};
							}

							if (!display_cashProfit[marketType]) {
								display_cashProfit[marketType] = {};
							}

							if (!display_cashProfit[marketType][selectionId]) {
								display_cashProfit[marketType][selectionId] = {};
							}

							display_cashProfit[marketType][selectionId]['back_1'] = bookmaker1_back_rate;
							display_cashProfit[marketType][selectionId]['lay_1'] = bookmaker1_lay_rate;
							if (!display_cashProfit[marketType][selectionId]['exposure']) {
								display_cashProfit[marketType][selectionId]['exposure'] = 0;
							}

							html_bookmaker_odds += "<div data-title='" + book_status + "' class='table-row " + bookmaker_suspended + "' id='bookmaker_row_" + temp_selectionId + "'><div class='float-left country-name  box-4'><span class='team-name'><b>" + runnerName + "</b></span><p><span class='float-left live_match_points' style='color: black;' id='live_match_points_" + selectionId + "_BOOKMAKER_ODDS'></span> <span class='float-right' style='display: none; color: black;'>0</span></p></div><div class='box-1 back1 float-left  text-center' id='back_3_" + temp_selectionId + "_BOOKMAKER_ODDS' ><button><span class='odd d-block'>" + bookmaker1_back_3_rate + "</span> <span class='d-block'>" + bookmaker1_back_3_size + "</span></button></div><div class='box-1 back2 float-left back-2  text-center' id='back_2_" + temp_selectionId + "_BOOKMAKER_ODDS' ><button><span class='odd d-block'>" + bookmaker1_back_2_rate + "</span> <span class='d-block'>" + bookmaker1_back_2_size + "</span></button></div><div class='box-1 back float-left back lock text-center back-1'  id='back_1_" + temp_selectionId + "_BOOKMAKER_ODDS' side='Back'  selectionid='" + selectionId + "' runner='" + runnerName + "' marketname='" + runnerName + "' markettype='" + marketType + "' fullmarketodds='" + bookmaker1_back_rate + "'  oddsmarketId=" + oddsmarketId + " event_name='" + eventName + "' market_odd_name='BOOKMAKER_ODDS' marketId='" + selectionId + "' eventId='" + eventId + "'   inplay='1'><button><span class='odd d-block'>" + bookmaker1_back_rate + "</span> <span class='d-block'>" + bookmaker1_back_size + "</span></button></div><div class='box-1 lay float-left text-center lay-1' id='lay_1_" + temp_selectionId + "_BOOKMAKER_ODDS' side='Lay'  selectionid='" + selectionId + "' runner='" + runnerName + "' marketname='" + runnerName + "' markettype='" + marketType + "' fullmarketodds='" + bookmaker1_lay_rate + "'  oddsmarketId=" + oddsmarketId + " event_name='" + eventName + "' market_odd_name='BOOKMAKER_ODDS' marketId='" + selectionId + "' eventId='" + eventId + "'   inplay='1'><button><span class='odd d-block'>" + bookmaker1_lay_rate + "</span> <span class='d-block'>" + bookmaker1_lay_size + "</span></button></div><div class='box-1 lay-2 float-left  text-center' id='lay_2_" + temp_selectionId + "_BOOKMAKER_ODDS' ><button><span class='odd d-block'>" + bookmaker1_lay_2_rate + "</span> <span class='d-block'>" + bookmaker1_lay_2_size + "</span></button></div><div class='box-1 lay-1 float-left  text-center' id='lay_3_" + temp_selectionId + "_BOOKMAKER_ODDS' ><button><span class='odd d-block'>" + bookmaker1_lay_3_rate + "</span> <span class='d-block'>" + bookmaker1_lay_3_size + "</span></button></div></div> </div>";

						}
						xc++;

						if (xc == args.body.data[0].bookmaker.length) {
							var xb = 0;
							var html_match = "";
							while (display_runners_bm[xb]) {
								// <div class="col-4 text-center text-success"><b><span id="middle_data_' + display_runners_bm[xb].runner_id + '_BOOKMAKER_ODDS" class="clear_exposure" style="color: black;">0</span></b></div>
								html_match += '<div class="row row5 mt-2"><div class="col-4"><span>' + display_runners_bm[xb].runner_name + '</span></div><div class="col-4 text-right"><span id="last_data_' + display_runners_bm[xb].runner_id + '_BOOKMAKER_ODDS" class="last_data_BOOKMAKER_ODDS text-danger clear_exposure"><b></b></span></div></div>';
								xb++;
								if (display_runners_bm.length == xb) {
									$("#back_bookmaker_data").html(html_match);

								} else {
									$("#back_bookmaker_data").html("");
								}
							}

						}
					}

					html_bookmaker_odds += "</div><div class='table-remark text-right remark' id='bookmaker-remakrs-" + z + "'>" + bookmaker_remarks + "</div><div></div></div>";

					if (html_bookmaker_odds != "" && args.body.data[0].bookmaker.length > 0) {
						$("#bookmaker_market_div_secure").css('display', 'block');
						$("#bookmaker_market_div_secure").html(html_bookmaker_odds);
					}
				}

				bookmaker_tied_remarks = "";
				html_bookmaker_tied_odds = "";
				eventName = $(".event_name_heading").attr("event_name");

				if (args.body.data[0].bookmaker_tied && args.body.data[0].bookmaker_tied != null) {
					bookmaker_tied_remarks = args.body.data[0].bookmaker_tied_remarks;
					if (bookmaker_tied_remarks) {

					} else {
						bookmaker_tied_remarks = "";
					}
					html_bookmaker_tied_odds = "";
					html_bookmaker_tied_odds += "<div id='bookmaker_tied_market_div_0'><div class='market-title mt-1 cashout 1'>Tied Match<button class='btn btn-success btn-sm' disabled=''>Cashout</button></div><div class='fancy-market'><div class='table-header'><div class='float-left country-name box-6 min-max'><b>Min:  <span id='bookmaker_tied_min'></span> Max: <span id='bookmaker_tied_max'></span> </b></div><div class='back box-1 float-left text-center lablesize'><b>Back</b></div><div class='lay box-1 float-left text-center lablesize'><b>Lay</b></div></div>";
					var xc = 0;
					for (z = 0; z < args.body.data[0].bookmaker_tied.length; z++) {

						if (args.body.data[0].bookmaker_tied[z] && args.body.data[0].bookmaker_tied[z]) {

							html_bookmaker_tied_odds += "<div class='table-body' id='match_odds_bookmaker_tied_market_" + z + "'>";

							var bookmaker1_tied_data = args.body.data[0].bookmaker_tied[z];

							runnerName = bookmaker1_tied_data['name'];
							book_status = bookmaker1_tied_data['status'];
							selectionId = bookmaker1_tied_data['selectionId'];
							display_runners_tied_bm.push({
								runner_id: selectionId,
								runner_name: runnerName,
							});

							marketType = "BOOKMAKER_TIED_ODDS";
							selectorIdBookmakerTiedArray.push(selectionId);

							marketName = runnerName;
							var bet_suspended = "";

							if (bookmaker1_tied_data.back[0].price) {
								bookmaker1_tied_back_rate = bookmaker1_tied_data.back[0].price || "";
							} else {
								bookmaker1_tied_back_rate = "-";
							}

							if (bookmaker1_tied_data.back[0].size) {
								bookmaker1_tied_back_size = bookmaker1_tied_data.back[0].size || "";
							} else {
								bookmaker1_tied_back_size = "";
							}
							//bookmaker1_tied_back_size = parseFloat(bookmaker1_tied_back_size) >= 1000 ? parseInt(parseInt(bookmaker1_tied_back_size) / 1000) + "K" : bookmaker1_tied_back_size;

							if (bookmaker1_tied_data.back[1].price) {
								bookmaker1_tied_back_2_rate = bookmaker1_tied_data.back[1].price || "";
							} else {
								bookmaker1_tied_back_2_rate = "-";
							}

							if (bookmaker1_tied_data.back[1].size) {
								bookmaker1_tied_back_2_size = bookmaker1_tied_data.back[1].size || "";
							} else {
								bookmaker1_tied_back_2_size = "";
							}
							//bookmaker1_tied_back_2_size = parseFloat(bookmaker1_tied_back_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_tied_back_2_size) / 1000) + "K" : bookmaker1_tied_back_2_size;

							if (bookmaker1_tied_data.back[2].price) {
								bookmaker1_tied_back_3_rate = bookmaker1_tied_data.back[2].price || "";
							} else {
								bookmaker1_tied_back_3_rate = "-";
							}

							if (bookmaker1_tied_data.back[2].size) {
								bookmaker1_tied_back_3_size = bookmaker1_tied_data.back[2].size || "";
							} else {
								bookmaker1_tied_back_3_size = "";
							}
							//bookmaker1_tied_back_3_size = parseFloat(bookmaker1_tied_back_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_tied_back_3_size) / 1000) + "K" : bookmaker1_tied_back_3_size;


							if (bookmaker1_tied_data.lay[0].price) {
								bookmaker1_tied_lay_rate = bookmaker1_tied_data.lay[0].price || "";
							} else {
								bookmaker1_tied_lay_rate = "-";
							}

							if (bookmaker1_tied_data.lay[0].size) {
								bookmaker1_tied_lay_size = bookmaker1_tied_data.lay[0].size || "";
							} else {
								bookmaker1_tied_lay_size = "";
							}
							//bookmaker1_tied_lay_size = parseFloat(bookmaker1_tied_lay_size) >= 1000 ? parseInt(parseInt(bookmaker1_tied_lay_size) / 1000) + "K" : bookmaker1_tied_lay_size;

							if (bookmaker1_tied_data.lay[1].price) {
								bookmaker1_tied_lay_2_rate = bookmaker1_tied_data.lay[1].price || "";
							} else {
								bookmaker1_tied_lay_2_rate = "-";
							}
							if (bookmaker1_tied_data.lay[1].size) {
								bookmaker1_tied_lay_2_size = bookmaker1_tied_data.lay[1].size || "";
							} else {
								bookmaker1_tied_lay_2_size = "";
							}
							//bookmaker1_tied_lay_2_size = parseFloat(bookmaker1_tied_lay_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_tied_lay_2_size) / 1000) + "K" : bookmaker1_tied_lay_2_size;


							if (bookmaker1_tied_data.lay[2].price) {
								bookmaker1_tied_lay_3_rate = bookmaker1_tied_data.lay[2].price || "";
							} else {
								bookmaker1_tied_lay_3_rate = "-";
							}
							if (bookmaker1_tied_data.lay[2].size) {
								bookmaker1_tied_lay_3_size = bookmaker1_tied_data.lay[2].size || "";
							} else {
								bookmaker1_tied_lay_3_size = "";
							}
							//bookmaker1_tied_lay_3_size = parseFloat(bookmaker1_tied_lay_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_tied_lay_3_size) / 1000) + "K" : bookmaker1_tied_lay_3_size;

							bookmaker_tied_suspended = "";
							if (book_status != "ACTIVE") {
								bookmaker_tied_suspended = "suspended";
							}
							var temp_selectionId;
							temp_selectionId = runnerName.split(" ").join('_');
							temp_selectionId = temp_selectionId.replace(/[^a-zA-Z ]/g, "");

							if (!display_cashProfit) {
								display_cashProfit = {};
							}

							if (!display_cashProfit[marketType]) {
								display_cashProfit[marketType] = {};
							}

							if (!display_cashProfit[marketType][selectionId]) {
								display_cashProfit[marketType][selectionId] = {};
							}

							display_cashProfit[marketType][selectionId]['back_1'] = bookmaker1_tied_back_rate;
							display_cashProfit[marketType][selectionId]['lay_1'] = bookmaker1_tied_lay_rate;
							if (!display_cashProfit[marketType][selectionId]['exposure']) {
								display_cashProfit[marketType][selectionId]['exposure'] = 0;
							}

							html_bookmaker_tied_odds += "<div data-title='" + book_status + "' class='table-row " + bookmaker_tied_suspended + "' id='bookmaker_tied_row_" + temp_selectionId + "'><div class='float-left country-name  box-4'><span class='team-name'><b>" + runnerName + "</b></span><p><span class='float-left live_match_points' style='color: black;' id='live_match_points_" + selectionId + "_BOOKMAKER_TIED_ODDS'></span> <span class='float-right' style='display: none; color: black;'>0</span></p></div><div class='box-1 back1 float-left hidden-portrait  text-center' id='back_3_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS' ><button><span class='odd d-block'>" + bookmaker1_tied_back_3_rate + "</span> <span class='d-block'>" + bookmaker1_tied_back_3_size + "</span></button></div><div class='box-1 back2 float-left hidden-portrait back-2  text-center' id='back_2_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS' ><button><span class='odd d-block'>" + bookmaker1_tied_back_2_rate + "</span> <span class='d-block'>" + bookmaker1_tied_back_2_size + "</span></button></div><div class='box-1 back float-left back lock text-center back-1'  id='back_1_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS' side='Back'  selectionid='" + selectionId + "' runner='" + runnerName + "' marketname='" + runnerName + "' markettype='" + marketType + "' fullmarketodds='" + bookmaker1_tied_back_rate + "'  oddsmarketId=" + oddsmarketId + " event_name='" + eventName + "' market_odd_name='BOOKMAKER_TIED_ODDS' marketId='" + selectionId + "' eventId='" + eventId + "'   inplay='1'><button><span class='odd d-block'>" + bookmaker1_tied_back_rate + "</span> <span class='d-block'>" + bookmaker1_tied_back_size + "</span></button></div><div class='box-1 lay float-left text-center lay-1' id='lay_1_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS' side='Lay'  selectionid='" + selectionId + "' runner='" + runnerName + "' marketname='" + runnerName + "' markettype='" + marketType + "' fullmarketodds='" + bookmaker1_tied_lay_rate + "'  oddsmarketId=" + oddsmarketId + " event_name='" + eventName + "' market_odd_name='BOOKMAKER_TIED_ODDS' marketId='" + selectionId + "' eventId='" + eventId + "'   inplay='1'><button><span class='odd d-block'>" + bookmaker1_tied_lay_rate + "</span> <span class='d-block'>" + bookmaker1_tied_lay_size + "</span></button></div><div class='box-1 lay-2 float-left hidden-portrait text-center' id='lay_2_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS' ><button><span class='odd d-block'>" + bookmaker1_tied_lay_2_rate + "</span> <span class='d-block'>" + bookmaker1_tied_lay_2_size + "</span></button></div><div class='box-1 lay-1 float-left hidden-portrait text-center' id='lay_3_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS' ><button><span class='odd d-block'>" + bookmaker1_tied_lay_3_rate + "</span> <span class='d-block'>" + bookmaker1_tied_lay_3_size + "</span></button></div></div> </div>";

						}
						xc++;

						if (xc == args.body.data[0].bookmaker_tied.length) {
							var xb = 0;
							var html_match = "";
							while (display_runners_tied_bm[xb]) {
								// <div class="col-4 text-center text-success"><b><span id="middle_data_' + display_runners_tied_bm[xb].runner_id + '_BOOKMAKER_TIED_ODDS" class="clear_exposure" style="color: black;">0</span></b></div>
								html_match += '<div class="row row5 mt-2"><div class="col-6"><span>' + display_runners_tied_bm[xb].runner_name + '</span></div><div class="col-6 text-right"><span id="last_data_' + display_runners_tied_bm[xb].runner_id + '_BOOKMAKER_TIED_ODDS" class="last_data_BOOKMAKER_TIED_ODDS text-danger clear_exposure"><b></b></span></div></div>';
								xb++;
								if (display_runners_tied_bm.length == xb) {
									$("#back_bookmaker_tied_data").html(html_match);

								} else {
									$("#back_bookmaker_tied_data").html("");
								}
							}

						}
					}

					html_bookmaker_tied_odds += "</div><div class='table-remark text-right remark' id='bookmaker-tied-remakrs-" + z + "'>" + bookmaker_tied_remarks + "</div><div></div></div>";

					if (html_bookmaker_tied_odds != "" && args.body.data[0].bookmaker_tied.length > 0) {
						$("#bookmaker_tied_market_div_secure").css('display', 'block');
						$("#bookmaker_tied_market_div_secure").html(html_bookmaker_tied_odds);
					}
				}
			}


			if (args.body.data[0].bm1) {
				if (args.body.data[0].bm1) {

					bookmaker_remarks = "";
					html_bookmaker_odds = "";
					eventName = $(".event_name_heading").attr("event_name");

					var bm_small1 = args.body.data[0].bm1;
					bm_small1_datas = bm_small1;
					bm_small1_datas.sort((a, b) => a.SelectionId - b.SelectionId);
					html_bookmaker_odds = "";
					html_bookmaker_odds += "<div id='bookmakersmall_market_div_0'><div class='market-title mt-1 cashout 2'>Bookmaker 2<button class='btn btn-success btn-sm' disabled=''>Cashout</button></div><div class='fancy-market'><div class='table-header'><div class='float-left country-name box-6 min-max'><b>Min:<?php echo $bookmaker_min; ?> Max:<?php echo $bookmakersmall_max; ?> </b></div><div class='back box-1 float-left text-center lablesize'><b>Back</b></div><div class='lay box-1 float-left text-center lablesize'><b>Lay</b></div></div>";
					var xc = 0;
					for (z = 0; z < bm_small1_datas.length; z++) {

						if (bm_small1_datas[z] && bm_small1_datas[z]) {
							html_bookmaker_odds += "<div class='table-body' id='match_odds_bookmakersmall_market_" + z + "'>";

							var bookmaker1_data = bm_small1_datas[z];

							runnerName = bookmaker1_data['RunnerName'];
							book_status = bookmaker1_data['GameStatus'];
							selectionId = bookmaker1_data['SelectionId'];
							display_runners_sbm.push({
								runner_id: selectionId,
								runner_name: runnerName,
							});
							marketType = "BOOKMAKERSMALL_ODDS";
							selectorIdBookmakerArray.push(selectionId);

							marketName = runnerName;
							var bet_suspended = "";

							if (bookmaker1_data.BackPrice1) {
								bookmaker1_back_rate = bookmaker1_data.BackPrice1 || "";
							} else {
								bookmaker1_back_rate = "-";
							}

							if (bookmaker1_data.BackSize1) {
								bookmaker1_back_size = bookmaker1_data.BackSize1 || "";
							} else {
								bookmaker1_back_size = "";
							}
							//bookmaker1_back_size = parseFloat(bookmaker1_back_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_size) / 1000) + "K" : bookmaker1_back_size;

							if (bookmaker1_data.BackPrice2) {
								bookmaker1_back_2_rate = bookmaker1_data.BackPrice2 || "";
							} else {
								bookmaker1_back_2_rate = "-";
							}

							if (bookmaker1_data.BackSize2) {
								bookmaker1_back_2_size = bookmaker1_data.BackSize2 || "";
							} else {
								bookmaker1_back_2_size = "";
							}
							//bookmaker1_back_2_size = parseFloat(bookmaker1_back_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_2_size) / 1000) + "K" : bookmaker1_back_2_size;

							if (bookmaker1_data.BackPrice3) {
								bookmaker1_back_3_rate = bookmaker1_data.BackPrice3 || "";
							} else {
								bookmaker1_back_3_rate = "-";
							}

							if (bookmaker1_data.BackSize3) {
								bookmaker1_back_3_size = bookmaker1_data.BackSize3 || "";
							} else {
								bookmaker1_back_3_size = "";
							}
							//bookmaker1_back_3_size = parseFloat(bookmaker1_back_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_3_size) / 1000) + "K" : bookmaker1_back_3_size;


							if (bookmaker1_data.LayPrice1) {
								bookmaker1_lay_rate = bookmaker1_data.LayPrice1 || "";
							} else {
								bookmaker1_lay_rate = "-";
							}

							if (bookmaker1_data.LaySize1) {
								bookmaker1_lay_size = bookmaker1_data.LaySize1 || "";
							} else {
								bookmaker1_lay_size = "";
							}
							//bookmaker1_lay_size = parseFloat(bookmaker1_lay_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_size) / 1000) + "K" : bookmaker1_lay_size;

							if (bookmaker1_data.LayPrice2) {
								bookmaker1_lay_2_rate = bookmaker1_data.LayPrice2 || "";
							} else {
								bookmaker1_lay_2_rate = "-";
							}
							if (bookmaker1_data.LaySize2) {
								bookmaker1_lay_2_size = bookmaker1_data.LaySize2 || "";
							} else {
								bookmaker1_lay_2_size = "";
							}
							//bookmaker1_lay_2_size = parseFloat(bookmaker1_lay_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_2_size) / 1000) + "K" : bookmaker1_lay_2_size;


							if (bookmaker1_data.LayPrice3) {
								bookmaker1_lay_3_rate = bookmaker1_data.LayPrice3 || "";
							} else {
								bookmaker1_lay_3_rate = "-";
							}
							if (bookmaker1_data.LaySize3) {
								bookmaker1_lay_3_size = bookmaker1_data.LaySize3 || "";
							} else {
								bookmaker1_lay_3_size = "";
							}
							//bookmaker1_lay_3_size = parseFloat(bookmaker1_lay_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_3_size) / 1000) + "K" : bookmaker1_lay_3_size;

							bookmaker_suspended = "";
							if (book_status != "ACTIVE") {
								bookmaker_suspended = "suspended";
							}
							var temp_selectionId;
							temp_selectionId = runnerName.split(" ").join('_');
							temp_selectionId = temp_selectionId.replace(/[^a-zA-Z ]/g, "");

							if (!display_cashProfit) {
								display_cashProfit = {};
							}

							if (!display_cashProfit[marketType]) {
								display_cashProfit[marketType] = {};
							}

							if (!display_cashProfit[marketType][selectionId]) {
								display_cashProfit[marketType][selectionId] = {};
							}

							display_cashProfit[marketType][selectionId]['back_1'] = bookmaker1_back_rate;
							display_cashProfit[marketType][selectionId]['lay_1'] = bookmaker1_lay_rate;
							if (!display_cashProfit[marketType][selectionId]['exposure']) {
								display_cashProfit[marketType][selectionId]['exposure'] = 0;
							}

							html_bookmaker_odds += "<div data-title='" + book_status + "' class='table-row " + bookmaker_suspended + "' id='bookmakersmall_row_" + temp_selectionId + "'><div class='float-left country-name custbold box-4'><span class='team-name'><b>" + runnerName + "</b></span><p> <span class='float-left live_match_points' style='color: black;' id='live_match_points_" + selectionId + "_BOOKMAKERSMALL_ODDS'></span> <span class='float-right' style='display: none; color: black;'>0</span></p></div><div class='box-1 back float-left back lock text-center back-1'  id='back_1_" + temp_selectionId + "_BOOKMAKERSMALL_ODDS' side='Back'  selectionid='" + selectionId + "' runner='" + runnerName + "' marketname='" + runnerName + "' markettype='" + marketType + "' fullmarketodds='" + bookmaker1_back_rate + "'  oddsmarketId=" + oddsmarketId + " event_name='" + eventName + "' market_odd_name='BOOKMAKERSMALL_ODDS' marketId='" + selectionId + "' eventId='" + eventId + "'   inplay='1'><button><span class='odd d-block'>" + bookmaker1_back_rate + "</span> <span class='d-block'>" + bookmaker1_back_size + "</span></button></div><div class='box-1 lay float-left text-center lay-1' id='lay_1_" + temp_selectionId + "_BOOKMAKERSMALL_ODDS' side='Lay'  selectionid='" + selectionId + "' runner='" + runnerName + "' marketname='" + runnerName + "' markettype='" + marketType + "' fullmarketodds='" + bookmaker1_lay_rate + "'  oddsmarketId=" + oddsmarketId + " event_name='" + eventName + "' market_odd_name='BOOKMAKERSMALL_ODDS' marketId='" + selectionId + "' eventId='" + eventId + "'   inplay='1'><button><span class='odd d-block'>" + bookmaker1_lay_rate + "</span> <span class='d-block'>" + bookmaker1_lay_size + "</span></button></div></div> </div>";

						}

						xc++;
						if (xc == bm_small1_datas.length) {
							var xb = 0;
							var html_match = "";
							while (display_runners_sbm[xb]) {
								// <div class="col-4 text-center text-success"><b><span id="middle_data_' + display_runners_sbm[xb].runner_id + '_BOOKMAKERSMALL_ODDS" class="clear_exposure" style="color: black;">0</span></b></div>
								html_match += '<div class="row row5 mt-2"><div class="col-6"><span>' + display_runners_sbm[xb].runner_name + '</span></div><div class="col-6 text-right"><span id="last_data_' + display_runners_bm[xb].runner_id + '_BOOKMAKERSMALL_ODDS" class="text-danger last_data_BOOKMAKERSMALL_ODDS clear_exposure"><b></b></span></div></div>';
								xb++;
								if (display_runners_bm.length == xb) {
									$("#back_sm_bookmaker_data").html(html_match);
								} else {
									$("#back_sm_bookmaker_data").html("");

								}
							}

						}
					}

					html_bookmaker_odds += "</div><div class='table-remark text-right remark' id='bookmakersmall-remakrs-" + z + "'>" + bookmaker_remarks + "</div><div></div></div>";

					if (html_bookmaker_odds != "" && bm_small1_datas.length > 0) {
						$("#bookmakersmall1_market_div_secure").css('display', 'block');
						$("#bookmakersmall1_market_div_secure").html(html_bookmaker_odds);
					}

				}
			}
		<?php } ?>
	}
	});


	socket.on('eventGetLiveEventsFancyData', function (args) {
		/* console.log("dataa=",args.body); */
		if (args && args.body && args.body.cricket) {
			$(".loader_page").hide();
			$(".main-footer-id").show();
			if (args.body.cricket[0]) {
				if (args.body.cricket[0]) {
					if (args.body.cricket[0][0]) {
						args.body.cricket[0] = args.body.cricket[0][0];
					}

					var oddsmarketId = args.body.cricket[0].marketid;
					var eventId = args.body.cricket[0].matchid;
					var marketId = "";
					var marketName = "";
					var eventName2 = "";
					var runsNo = "";
					var runsYes = "";
					var oddsNo = "";
					var oddsYes = "";
					var one_click_back_bet_status = "";
					var one_click_lay_bet_status = "";
					var class_add_yes_change = "";
					var class_add_no_change = "";
					var statusLabel = "";
					var status = "";
					var max_bet = 1;

					for (k = 0; k < args.body.cricket.length; k++) {
						market_type_name = args.body.cricket[k].marketName;


						max_bet = args.body.cricket[k].maxBet;
						max_bet_display = (max_bet / 100000) + 'L';

						if (args.body.cricket[k].bookmaker) {
							bookmaker_min = args.body.cricket[k].min;
							bookmaker_max = args.body.cricket[k].max;
							bookmaker_max_display = (bookmaker_max / 100000) + 'L';
							$("#bookmaker_min").html(bookmaker_min);
							$("#bookmaker_max").html(bookmaker_max_display);
						}
						if (args.body.cricket[k].bookmaker_tied) {
							bookmaker_tied_min = args.body.cricket[k].min_tied;
							bookmaker_tied_max = args.body.cricket[k].max_tied;
							bookmaker_tied_max_display = (bookmaker_tied_max / 100000) + 'L';
							$("#bookmaker_tied_min").html(bookmaker_tied_min);
							$("#bookmaker_tied_max").html(bookmaker_tied_max_display);
						}
						$('#match_odds_max_bet_' + k).text(max_bet_display);
						if (market_type_name == "Match Odds") {
							marketType = "MATCH_ODDS";
						} else if (market_type_name == "Tied Match") {
							marketType = "TIED_MATCH";
							$('#match_odds_tied_max_bet_' + k).text(max_bet == 1 ? 0 : max_bet);
						} else if (market_type_name == "To Win the Toss") {
							marketType = "TOSS_ODDS";
						} else {
							if (market_type_name) {
								market_type_name = market_type_name.split(".").join("_");
								market_type_name = market_type_name.split(" ").join("_");
								market_type_name = market_type_name.split("/").join("_");
								market_type_name = market_type_name.split(" ").join("_");
								marketType = market_type_name.toUpperCase();
							}
							marketType = market_type_name.toUpperCase();;
						}
						market_type_name2 = marketType.toUpperCase();;
						market_marketid = market_type_name2;
						if (market_marketid) {
							market_marketid = market_marketid.split(".").join("_");
						}
						if (args.body.cricket[k].runners) {
							for (j = 0; j < args.body.cricket[k].runners.length; j++) {
								var selectionId = args.body.cricket[k].runners[j].id;
								runnerName = args.body.cricket[k].runners[j].name;
								marketName = args.body.cricket[k].runners[j].name;
								var bet_suspended = args.body.cricket[k].runners[j].status;
								if (args.body.cricket[k].runners[j].back[2]) {
									one_price_1 = args.body.cricket[k].runners[j].back[2].price;
									if (!one_price_1) {
										one_price_1 = "-";
									}
									one_size_1 = args.body.cricket[k].runners[j].back[2].size || "";
								} else {
									one_price_1 = "-";
									one_size_1 = "";
								}
								if (args.body.cricket[k].runners[j].back[1]) {
									one_price_2 = args.body.cricket[k].runners[j].back[1].price;
									if (!one_price_2) {
										one_price_2 = "-";
									}
									one_size_2 = args.body.cricket[k].runners[j].back[1].size || "";
								} else {
									one_price_2 = "-";
									one_size_2 = "";
								}
								if (args.body.cricket[k].runners[j].back[0]) {
									one_price_3 = args.body.cricket[k].runners[j].back[0].price;
									if (!one_price_3) {
										one_price_3 = "-";
									}
									one_size_3 = args.body.cricket[k].runners[j].back[0].size || "";
								} else {
									one_price_3 = "-";
									one_size_3 = "";
								}
								if (args.body.cricket[k].runners[j].lay[0]) {
									lay_one_price_1 = args.body.cricket[k].runners[j].lay[0].price;
									if (!lay_one_price_1) {
										lay_one_price_1 = "-";
									}
									lay_one_size_1 = args.body.cricket[k].runners[j].lay[0].size || "";
								} else {
									lay_one_size_1 = "";
									lay_one_price_1 = "-";
								}
								if (args.body.cricket[k].runners[j].lay[1]) {
									lay_one_price_2 = args.body.cricket[k].runners[j].lay[1].price;
									if (!lay_one_price_2) {
										lay_one_price_2 = "-";
									}
									lay_one_size_2 = args.body.cricket[k].runners[j].lay[1].size || "";
								} else {
									lay_one_size_2 = "";
									lay_one_price_2 = "-";
								}
								if (args.body.cricket[k].runners[j].lay[2]) {
									lay_one_price_3 = args.body.cricket[k].runners[j].lay[2].price;
									if (!lay_one_price_3) {
										lay_one_price_3 = "-";
									}
									lay_one_size_3 = args.body.cricket[k].runners[j].lay[2].size || "";
								} else {
									lay_one_price_3 = "-";
									lay_one_size_3 = "";
								}
								one_size_1 = parseInt(one_size_1);
								if (parseInt(one_size_1)) {
									//	one_size_1 = one_size_1.toFixed(2);
								} else {
									one_size_1 = "";
								}
								if (one_size_1 > 1000) {
									one_size_1 = one_size_1 / 1000;
								}
								one_size_2 = parseInt(one_size_2);
								if (one_size_2) {
									//one_size_2 = one_size_2.toFixed(2);
								} else {
									one_size_2 = "";
								}
								if (one_size_2 > 1000) {
									one_size_2 = one_size_2 / 1000;
								}
								one_size_3 = parseInt(one_size_3);
								if (one_size_3) { } else {
									one_size_3 = "";
								}
								//one_size_3 = one_size_3.toFixed(2);
								if (one_size_3 > 1000) {
									one_size_3 = one_size_3 / 1000;
								}
								lay_one_size_1 = parseInt(lay_one_size_1);
								if (lay_one_size_1) { } else {
									lay_one_size_1 = "";
								}
								//lay_one_size_1 = lay_one_size_1.toFixed(2);
								if (lay_one_size_1 > 1000) {
									lay_one_size_1 = lay_one_size_1 / 1000;
								}
								lay_one_size_2 = parseInt(lay_one_size_2);
								if (lay_one_size_2) { } else {
									lay_one_size_2 = "";
								}
								//lay_one_size_2 = lay_one_size_2.toFixed(2);
								if (lay_one_size_2 > 1000) {
									lay_one_size_2 = lay_one_size_2 / 1000;
								}
								lay_one_size_3 = parseInt(lay_one_size_3);
								if (lay_one_size_3) {
									lay_one_size_3 = lay_one_size_3.toFixed(2);
									if (lay_one_size_3 > 1000) {
										lay_one_size_3 = lay_one_size_3 / 1000;
									}

									lay_one_size_3 = parseFloat(lay_one_size_3);
									lay_one_size_3 = lay_one_size_3.toFixed(2);

								} else {
									lay_one_size_3 = "";
								}

								if (!display_cashProfit) {
									display_cashProfit = {};
								}

								if (!display_cashProfit[marketType]) {
									display_cashProfit[marketType] = {};
								}

								if (!display_cashProfit[marketType][selectionId]) {
									display_cashProfit[marketType][selectionId] = {};
								}

								display_cashProfit[marketType][selectionId]['back_1'] = one_price_3;
								display_cashProfit[marketType][selectionId]['lay_1'] = lay_one_price_1;
								if (!display_cashProfit[marketType][selectionId]['exposure']) {
									display_cashProfit[marketType][selectionId]['exposure'] = 0;
								}
								if ($("#back_3_" + selectionId + "_" + market_marketid).attr("fullmarketodds") != one_price_1)
									$("#back_3_" + selectionId + "_" + market_marketid).addClass('rate_change_link');
								else
									$("#back_3_" + selectionId + "_" + market_marketid).removeClass('rate_change_link');
								if ($("#back_2_" + selectionId + "_" + market_marketid).attr("fullmarketodds") != one_price_2)
									$("#back_2_" + selectionId + "_" + market_marketid).addClass('rate_change_link');
								else
									$("#back_2_" + selectionId + "_" + market_marketid).removeClass('rate_change_link');
								if ($("#lay_2_" + selectionId + "_" + market_marketid).attr("fullmarketodds") != lay_one_price_2)
									$("#lay_2_" + selectionId + "_" + market_marketid).addClass('rate_change_link');
								else
									$("#lay_2_" + selectionId + "_" + market_marketid).removeClass('rate_change_link');
								if ($("#lay_3_" + selectionId + "_" + market_marketid).attr("fullmarketodds") != lay_one_price_3)
									$("#lay_3_" + selectionId + "_" + market_marketid).addClass('rate_change_link');
								else
									$("#lay_3_" + selectionId + "_" + market_marketid).removeClass('rate_change_link');
								$("#back_3_" + selectionId + "_" + market_marketid).attr("fullmarketodds", one_price_1);
								$("#back_2_" + selectionId + "_" + market_marketid).attr("fullmarketodds", one_price_2);
								$("#back_1_" + selectionId + "_" + market_marketid).attr("fullmarketodds", one_price_3);
								back_1_html = "<button><span class='odd d-block'>" + one_price_1 + "</span> <span class='d-block'>" + one_size_1 + "</span></button>";
								back_2_html = "<button><span class='odd d-block'>" + one_price_2 + "</span> <span class='d-block'>" + one_size_2 + "</span></button>";
								back_3_html = "<button><span class='odd d-block'>" + one_price_3 + "</span> <span class='d-block'>" + one_size_3 + "</span></button>";
								$("#back_1_" + selectionId + "_" + market_marketid).html(back_3_html);
								$("#back_2_" + selectionId + "_" + market_marketid).html(back_2_html);
								$("#back_3_" + selectionId + "_" + market_marketid).html(back_1_html);
								$('#fullSelection_' + selectionId + '_' + market_marketid).attr("title", bet_suspended);
								$("#fullSelection_" + selectionId).attr("data-title", bet_suspended);
								if (bet_suspended != "ACTIVE" && bet_suspended != "OPEN") {
									$('#fullSelection_' + selectionId + '_' + market_marketid).addClass("suspended");
								} else {
									$('#fullSelection_' + selectionId + '_' + market_marketid).removeClass("suspended");
								}
								lay_1_html = "<button><span class='odd d-block'>" + lay_one_price_1 + "</span> <span class='d-block'>" + lay_one_size_1 + "</span></button>";
								lay_2_html = "<button><span class='odd d-block'>" + lay_one_price_2 + "</span> <span class='d-block'>" + lay_one_size_2 + "</span></button>";
								lay_3_html = "<button><span class='odd d-block'>" + lay_one_price_3 + "</span> <span class='d-block'>" + lay_one_size_3 + "</span></button>";
								$("#lay_1_" + selectionId + "_" + market_marketid).html(lay_1_html);
								$("#lay_2_" + selectionId + "_" + market_marketid).html(lay_2_html);
								$("#lay_3_" + selectionId + "_" + market_marketid).html(lay_3_html);
								$("#lay_1_" + selectionId + "_" + market_marketid).attr("fullmarketodds", lay_one_price_1);
								$("#lay_2_" + selectionId + "_" + market_marketid).attr("fullmarketodds", lay_one_price_2);
								$("#lay_3_" + selectionId + "_" + market_marketid).attr("fullmarketodds", lay_one_price_3);
							}
						}
						if (args.body.cricket[k].bookmaker && args.body.cricket[k].bookmaker != null) {
							for (z = 0; z < args.body.cricket[k].bookmaker.length; z++) {
								var bookmaker1_data = args.body.cricket[k].bookmaker[z];
								runnerName = bookmaker1_data['name'];
								book_status = bookmaker1_data['status'];
								selectionId = bookmaker1_data['selectionId'];
								var temp_selectionId;
								temp_selectionId = runnerName.split(" ").join('_');
								temp_selectionId = temp_selectionId.replace(/[^a-zA-Z ]/g, "");
								marketType = "BOOKMAKER_ODDS";
								selectorIdBookmakerArray.push(selectionId);
								marketName = runnerName;
								var bet_suspended = "";
								if (bookmaker1_data.back[0].price) {
									bookmaker1_back_rate = bookmaker1_data.back[0].price || "";
								} else {
									bookmaker1_back_rate = "-";
								}
								if (bookmaker1_data.back[0].size) {
									bookmaker1_back_size = bookmaker1_data.back[0].size || "";
								} else {
									bookmaker1_back_size = "";
								}
								//bookmaker1_back_size = parseFloat(bookmaker1_back_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_size) / 1000) + "K" : bookmaker1_back_size;
								if (bookmaker1_data.back[1].price) {
									bookmaker1_back_2_rate = bookmaker1_data.back[1].price || "";
								} else {
									bookmaker1_back_2_rate = "-";
								}
								if (bookmaker1_data.back[1].size) {
									bookmaker1_back_2_size = bookmaker1_data.back[1].size || "";
								} else {
									bookmaker1_back_2_size = "";
								}
								//bookmaker1_back_2_size = parseFloat(bookmaker1_back_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_2_size) / 1000) + "K" : bookmaker1_back_2_size;
								if (bookmaker1_data.back[2].price) {
									bookmaker1_back_3_rate = bookmaker1_data.back[2].price || "";
								} else {
									bookmaker1_back_3_rate = "-";
								}
								if (bookmaker1_data.back[2].size) {
									bookmaker1_back_3_size = bookmaker1_data.back[2].size || "";
								} else {
									bookmaker1_back_3_size = "";
								}
								//bookmaker1_back_3_size = parseFloat(bookmaker1_back_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_3_size) / 1000) + "K" : bookmaker1_back_3_size;
								if (bookmaker1_data.lay[0].price) {
									bookmaker1_lay_rate = bookmaker1_data.lay[0].price || "";
								} else {
									bookmaker1_lay_rate = "-";
								}
								if (bookmaker1_data.lay[0].size) {
									bookmaker1_lay_size = bookmaker1_data.lay[0].size || "";
								} else {
									bookmaker1_lay_size = "";
								}
								//bookmaker1_lay_size = parseFloat(bookmaker1_lay_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_size) / 1000) + "K" : bookmaker1_lay_size;
								if (bookmaker1_data.lay[1].price) {
									bookmaker1_lay_2_rate = bookmaker1_data.lay[1].price || "";
								} else {
									bookmaker1_lay_2_rate = "-";
								}
								if (bookmaker1_data.lay[1].size) {
									bookmaker1_lay_2_size = bookmaker1_data.lay[1].size || "";
								} else {
									bookmaker1_lay_2_size = "";
								}
								//bookmaker1_lay_2_size = parseFloat(bookmaker1_lay_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_2_size) / 1000) + "K" : bookmaker1_lay_2_size;
								if (bookmaker1_data.lay[2].price) {
									bookmaker1_lay_3_rate = bookmaker1_data.lay[2].price || "";
								} else {
									bookmaker1_lay_3_rate = "-";
								}
								if (bookmaker1_data.lay[2].size) {
									bookmaker1_lay_3_size = bookmaker1_data.lay[2].size || "";
								} else {
									bookmaker1_lay_3_size = "";
								}
								//bookmaker1_lay_3_size = parseFloat(bookmaker1_lay_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_3_size) / 1000) + "K" : bookmaker1_lay_3_size;
								bookmaker_suspended = "";
								if (book_status != "ACTIVE") {
									bookmaker_suspended = "suspended";
								}
								if (book_status != "ACTIVE" || (bookmaker1_back_rate == 0 && bookmaker1_lay_rate == 0)) {
									$("#bookmaker_row_" + temp_selectionId).addClass("suspended");
								} else {
									$("#bookmaker_row_" + temp_selectionId).removeClass("suspended");
								}

								if (!display_cashProfit) {
									display_cashProfit = {};
								}

								if (!display_cashProfit[marketType]) {
									display_cashProfit[marketType] = {};
								}

								if (!display_cashProfit[marketType][selectionId]) {
									display_cashProfit[marketType][selectionId] = {};
								}

								display_cashProfit[marketType][selectionId]['back_1'] = bookmaker1_back_rate;
								display_cashProfit[marketType][selectionId]['lay_1'] = bookmaker1_lay_rate;
								if (!display_cashProfit[marketType][selectionId]['exposure']) {
									display_cashProfit[marketType][selectionId]['exposure'] = 0;
								}


								$("#bookmaker_row_" + temp_selectionId).attr("data-title", book_status);
								$("#back_1_" + temp_selectionId + "_BOOKMAKER_ODDS").attr("fullmarketodds", bookmaker1_back_rate);
								$("#back_2_" + temp_selectionId + "_BOOKMAKER_ODDS").attr("fullmarketodds", bookmaker1_back_2_rate);
								$("#back_3_" + temp_selectionId + "_BOOKMAKER_ODDS").attr("fullmarketodds", bookmaker1_back_3_rate);
								$("#lay_1_" + temp_selectionId + "_BOOKMAKER_ODDS").attr("fullmarketodds", bookmaker1_lay_rate);
								$("#lay_2_" + temp_selectionId + "_BOOKMAKER_ODDS").attr("fullmarketodds", bookmaker1_lay_2_rate);
								$("#lay_3_" + temp_selectionId + "_BOOKMAKER_ODDS").attr("fullmarketodds", bookmaker1_lay_3_rate);
								back_1_html = "<button><span class='odd d-block'>" + bookmaker1_back_rate + "</span> <span class='d-block'>" + bookmaker1_back_size + "</span></button>";
								back_2_html = "<button><span class='odd d-block'>" + bookmaker1_back_2_rate + "</span> <span class='d-block'>" + bookmaker1_back_2_size + "</span></button>";
								back_3_html = "<button><span class='odd d-block'>" + bookmaker1_back_3_rate + "</span> <span class='d-block'>" + bookmaker1_back_3_size + "</span></button>";
								lay_1_html = "<button><span class='odd d-block'>" + bookmaker1_lay_rate + "</span> <span class='d-block'>" + bookmaker1_lay_size + "</span></button>";
								lay_2_html = "<button><span class='odd d-block'>" + bookmaker1_lay_2_rate + "</span> <span class='d-block'>" + bookmaker1_lay_2_size + "</span></button>";
								lay_3_html = "<button><span class='odd d-block'>" + bookmaker1_lay_3_rate + "</span> <span class='d-block'>" + bookmaker1_lay_3_size + "</span></button>";
								$("#back_1_" + temp_selectionId + "_BOOKMAKER_ODDS").html(back_1_html);
								$("#back_2_" + temp_selectionId + "_BOOKMAKER_ODDS").html(back_2_html);
								$("#back_3_" + temp_selectionId + "_BOOKMAKER_ODDS").html(back_3_html);
								$("#lay_1_" + temp_selectionId + "_BOOKMAKER_ODDS").html(lay_1_html);
								$("#lay_2_" + temp_selectionId + "_BOOKMAKER_ODDS").html(lay_2_html);
								$("#lay_3_" + temp_selectionId + "_BOOKMAKER_ODDS").html(lay_3_html);
							}
						}

						if (args.body.cricket[k].bookmaker_tied && args.body.cricket[k].bookmaker_tied != null) {
							for (z = 0; z < args.body.cricket[k].bookmaker_tied.length; z++) {
								var bookmaker1_tied_data = args.body.cricket[k].bookmaker_tied[z];
								runnerName = bookmaker1_tied_data['name'];
								book_status = bookmaker1_tied_data['status'];
								selectionId = bookmaker1_tied_data['selectionId'];
								var temp_selectionId;
								temp_selectionId = runnerName.split(" ").join('_');
								temp_selectionId = temp_selectionId.replace(/[^a-zA-Z ]/g, "");
								marketType = "BOOKMAKER_TIED_ODDS";
								selectorIdBookmakerArray.push(selectionId);
								marketName = runnerName;
								var bet_suspended = "";
								if (bookmaker1_tied_data.back[0].price) {
									bookmaker1_tied_back_rate = bookmaker1_tied_data.back[0].price || "";
								} else {
									bookmaker1_tied_back_rate = "-";
								}
								if (bookmaker1_tied_data.back[0].size) {
									bookmaker1_tied_back_size = bookmaker1_tied_data.back[0].size || "";
								} else {
									bookmaker1_tied_back_size = "";
								}
								//bookmaker1_tied_back_size = parseFloat(bookmaker1_tied_back_size) >= 1000 ? parseInt(parseInt(bookmaker1_tied_back_size) / 1000) + "K" : bookmaker1_tied_back_size;
								if (bookmaker1_tied_data.back[1].price) {
									bookmaker1_tied_back_2_rate = bookmaker1_tied_data.back[1].price || "";
								} else {
									bookmaker1_tied_back_2_rate = "-";
								}
								if (bookmaker1_tied_data.back[1].size) {
									bookmaker1_tied_back_2_size = bookmaker1_tied_data.back[1].size || "";
								} else {
									bookmaker1_tied_back_2_size = "";
								}
								//bookmaker1_tied_back_2_size = parseFloat(bookmaker1_tied_back_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_tied_back_2_size) / 1000) + "K" : bookmaker1_tied_back_2_size;
								if (bookmaker1_tied_data.back[2].price) {
									bookmaker1_tied_back_3_rate = bookmaker1_tied_data.back[2].price || "";
								} else {
									bookmaker1_tied_back_3_rate = "-";
								}
								if (bookmaker1_tied_data.back[2].size) {
									bookmaker1_tied_back_3_size = bookmaker1_tied_data.back[2].size || "";
								} else {
									bookmaker1_tied_back_3_size = "";
								}
								//bookmaker1_tied_back_3_size = parseFloat(bookmaker1_tied_back_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_tied_back_3_size) / 1000) + "K" : bookmaker1_tied_back_3_size;
								if (bookmaker1_tied_data.lay[0].price) {
									bookmaker1_tied_lay_rate = bookmaker1_tied_data.lay[0].price || "";
								} else {
									bookmaker1_tied_lay_rate = "-";
								}
								if (bookmaker1_tied_data.lay[0].size) {
									bookmaker1_tied_lay_size = bookmaker1_tied_data.lay[0].size || "";
								} else {
									bookmaker1_tied_lay_size = "";
								}
								//bookmaker1_tied_lay_size = parseFloat(bookmaker1_tied_lay_size) >= 1000 ? parseInt(parseInt(bookmaker1_tied_lay_size) / 1000) + "K" : bookmaker1_tied_lay_size;
								if (bookmaker1_tied_data.lay[1].price) {
									bookmaker1_tied_lay_2_rate = bookmaker1_tied_data.lay[1].price || "";
								} else {
									bookmaker1_tied_lay_2_rate = "-";
								}
								if (bookmaker1_tied_data.lay[1].size) {
									bookmaker1_tied_lay_2_size = bookmaker1_tied_data.lay[1].size || "";
								} else {
									bookmaker1_tied_lay_2_size = "";
								}
								//bookmaker1_tied_lay_2_size = parseFloat(bookmaker1_tied_lay_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_tied_lay_2_size) / 1000) + "K" : bookmaker1_tied_lay_2_size;
								if (bookmaker1_tied_data.lay[2].price) {
									bookmaker1_tied_lay_3_rate = bookmaker1_tied_data.lay[2].price || "";
								} else {
									bookmaker1_tied_lay_3_rate = "-";
								}
								if (bookmaker1_tied_data.lay[2].size) {
									bookmaker1_tied_lay_3_size = bookmaker1_tied_data.lay[2].size || "";
								} else {
									bookmaker1_tied_lay_3_size = "";
								}
								//bookmaker1_tied_lay_3_size = parseFloat(bookmaker1_tied_lay_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_tied_lay_3_size) / 1000) + "K" : bookmaker1_tied_lay_3_size;

								if (!display_cashProfit) {
									display_cashProfit = {};
								}

								if (!display_cashProfit[marketType]) {
									display_cashProfit[marketType] = {};
								}

								if (!display_cashProfit[marketType][selectionId]) {
									display_cashProfit[marketType][selectionId] = {};
								}

								display_cashProfit[marketType][selectionId]['back_1'] = bookmaker1_tied_back_rate;
								display_cashProfit[marketType][selectionId]['lay_1'] = bookmaker1_tied_lay_rate;
								if (!display_cashProfit[marketType][selectionId]['exposure']) {
									display_cashProfit[marketType][selectionId]['exposure'] = 0;
								}

								bookmaker_tied_suspended = "";
								if (book_status != "ACTIVE") {
									bookmaker_tied_suspended = "suspended";
								}
								if (book_status != "ACTIVE" || (bookmaker1_tied_back_rate == 0 && bookmaker1_tied_lay_rate == 0)) {
									$("#bookmaker_tied_row_" + temp_selectionId).addClass("suspended");
								} else {
									$("#bookmaker_tied_row_" + temp_selectionId).removeClass("suspended");
								}
								$("#bookmaker_tied_row_" + temp_selectionId).attr("data-title", book_status);
								$("#back_1_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS").attr("fullmarketodds", bookmaker1_tied_back_rate);
								$("#back_2_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS").attr("fullmarketodds", bookmaker1_tied_back_2_rate);
								$("#back_3_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS").attr("fullmarketodds", bookmaker1_tied_back_3_rate);
								$("#lay_1_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS").attr("fullmarketodds", bookmaker1_tied_lay_rate);
								$("#lay_2_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS").attr("fullmarketodds", bookmaker1_tied_lay_2_rate);
								$("#lay_3_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS").attr("fullmarketodds", bookmaker1_tied_lay_3_rate);
								back_1_html = "<button><span class='odd d-block'>" + bookmaker1_tied_back_rate + "</span> <span class='d-block'>" + bookmaker1_tied_back_size + "</span></button>";
								back_2_html = "<button><span class='odd d-block'>" + bookmaker1_tied_back_2_rate + "</span> <span class='d-block'>" + bookmaker1_tied_back_2_size + "</span></button>";
								back_3_html = "<button><span class='odd d-block'>" + bookmaker1_tied_back_3_rate + "</span> <span class='d-block'>" + bookmaker1_tied_back_3_size + "</span></button>";
								lay_1_html = "<button><span class='odd d-block'>" + bookmaker1_tied_lay_rate + "</span> <span class='d-block'>" + bookmaker1_tied_lay_size + "</span></button>";
								lay_2_html = "<button><span class='odd d-block'>" + bookmaker1_tied_lay_2_rate + "</span> <span class='d-block'>" + bookmaker1_tied_lay_2_size + "</span></button>";
								lay_3_html = "<button><span class='odd d-block'>" + bookmaker1_tied_lay_3_rate + "</span> <span class='d-block'>" + bookmaker1_tied_lay_3_size + "</span></button>";
								$("#back_1_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS").html(back_1_html);
								$("#back_2_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS").html(back_2_html);
								$("#back_3_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS").html(back_3_html);
								$("#lay_1_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS").html(lay_1_html);
								$("#lay_2_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS").html(lay_2_html);
								$("#lay_3_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS").html(lay_3_html);
							}
						}

					}
				}
			}
			if (args.body) {
				if (args.body.bm1) {

					if (args.body.bm1[0]) {

						bookmaker_remarks = "";
						html_bookmaker_odds = "";
						eventName = $(".event_name_heading").attr("event_name");

						var bm_small1 = args.body.bm1[0];

						if (bm_small1.value && bm_small1.value != null) {
							if (bm_small1.value.session && bm_small1.value.session != null) {
								bm_small1_datas = bm_small1.value.session;
								bm_small1_datas.sort((a, b) => a.SelectionId - b.SelectionId);
								for (z = 0; z < bm_small1_datas.length; z++) {

									if (bm_small1_datas[z] && bm_small1_datas[z]) {
										var bookmaker1_data = bm_small1_datas[z];

										runnerName = bookmaker1_data['RunnerName'];
										book_status = bookmaker1_data['GameStatus'];
										selectionId = bookmaker1_data['SelectionId'];

										var temp_selectionId;
										temp_selectionId = runnerName.split(" ").join('_');
										temp_selectionId = temp_selectionId.replace(/[^a-zA-Z ]/g, "");

										marketType = "BOOKMAKERSMALL_ODDS";
										selectorIdBookmakerArray.push(selectionId);

										marketName = runnerName;
										var bet_suspended = "";

										if (bookmaker1_data.BackPrice1) {
											bookmaker1_back_rate = bookmaker1_data.BackPrice1 || "";
										} else {
											bookmaker1_back_rate = "-";
										}

										if (bookmaker1_data.BackSize1) {
											bookmaker1_back_size = bookmaker1_data.BackSize1 || "";
										} else {
											bookmaker1_back_size = "";
										}
										//bookmaker1_back_size = parseFloat(bookmaker1_back_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_size) / 1000) + "K" : bookmaker1_back_size;

										if (bookmaker1_data.BackPrice2) {
											bookmaker1_back_2_rate = bookmaker1_data.BackPrice2 || "";
										} else {
											bookmaker1_back_2_rate = "-";
										}

										if (bookmaker1_data.BackSize2) {
											bookmaker1_back_2_size = bookmaker1_data.BackSize2 || "";
										} else {
											bookmaker1_back_2_size = "";
										}
										//bookmaker1_back_2_size = parseFloat(bookmaker1_back_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_2_size) / 1000) + "K" : bookmaker1_back_2_size;

										if (bookmaker1_data.BackPrice3) {
											bookmaker1_back_3_rate = bookmaker1_data.BackPrice3 || "";
										} else {
											bookmaker1_back_3_rate = "-";
										}

										if (bookmaker1_data.BackSize3) {
											bookmaker1_back_3_size = bookmaker1_data.BackSize3 || "";
										} else {
											bookmaker1_back_3_size = "";
										}
										//bookmaker1_back_3_size = parseFloat(bookmaker1_back_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_3_size) / 1000) + "K" : bookmaker1_back_3_size;


										if (bookmaker1_data.LayPrice1) {
											bookmaker1_lay_rate = bookmaker1_data.LayPrice1 || "";
										} else {
											bookmaker1_lay_rate = "-";
										}

										if (bookmaker1_data.LaySize1) {
											bookmaker1_lay_size = bookmaker1_data.LaySize1 || "";
										} else {
											bookmaker1_lay_size = "";
										}
										//bookmaker1_lay_size = parseFloat(bookmaker1_lay_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_size) / 1000) + "K" : bookmaker1_lay_size;

										if (bookmaker1_data.LayPrice2) {
											bookmaker1_lay_2_rate = bookmaker1_data.LayPrice2 || "";
										} else {
											bookmaker1_lay_2_rate = "-";
										}
										if (bookmaker1_data.LaySize2) {
											bookmaker1_lay_2_size = bookmaker1_data.LaySize2 || "";
										} else {
											bookmaker1_lay_2_size = "";
										}
										//bookmaker1_lay_2_size = parseFloat(bookmaker1_lay_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_2_size) / 1000) + "K" : bookmaker1_lay_2_size;


										if (bookmaker1_data.LayPrice3) {
											bookmaker1_lay_3_rate = bookmaker1_data.LayPrice3 || "";
										} else {
											bookmaker1_lay_3_rate = "-";
										}
										if (bookmaker1_data.LaySize3) {
											bookmaker1_lay_3_size = bookmaker1_data.LaySize3 || "";
										} else {
											bookmaker1_lay_3_size = "";
										}
										//bookmaker1_lay_3_size = parseFloat(bookmaker1_lay_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_3_size) / 1000) + "K" : bookmaker1_lay_3_size;


										if (!display_cashProfit) {
											display_cashProfit = {};
										}

										if (!display_cashProfit[marketType]) {
											display_cashProfit[marketType] = {};
										}

										if (!display_cashProfit[marketType][selectionId]) {
											display_cashProfit[marketType][selectionId] = {};
										}

										display_cashProfit[marketType][selectionId]['back_1'] = bookmaker1_back_rate;
										display_cashProfit[marketType][selectionId]['lay_1'] = bookmaker1_lay_rate;
										if (!display_cashProfit[marketType][selectionId]['exposure']) {
											display_cashProfit[marketType][selectionId]['exposure'] = 0;
										}

										bookmaker_suspended = "";
										if (book_status != "ACTIVE") {
											bookmaker_suspended = "suspended";
										}

										if (book_status != "ACTIVE" || (bookmaker1_back_rate == 0 && bookmaker1_lay_rate == 0)) {
											$("#bookmakersmall_row_" + temp_selectionId).addClass("suspended");
										} else {
											$("#bookmakersmall_row_" + temp_selectionId).removeClass("suspended");
										}
										$("#bookmakersmall_row_" + temp_selectionId).attr("data-title", book_status);

										$("#back_1_" + temp_selectionId + "_BOOKMAKERSMALL_ODDS").attr("fullmarketodds", bookmaker1_back_rate);
										$("#back_2_" + temp_selectionId + "_BOOKMAKERSMALL_ODDS").attr("fullmarketodds", bookmaker1_back_2_rate);
										$("#back_3_" + temp_selectionId + "_BOOKMAKERSMALL_ODDS").attr("fullmarketodds", bookmaker1_back_3_rate);
										$("#lay_1_" + temp_selectionId + "_BOOKMAKERSMALL_ODDS").attr("fullmarketodds", bookmaker1_lay_rate);
										$("#lay_2_" + temp_selectionId + "_BOOKMAKERSMALL_ODDS").attr("fullmarketodds", bookmaker1_lay_2_rate);
										$("#lay_3_" + temp_selectionId + "_BOOKMAKERSMALL_ODDS").attr("fullmarketodds", bookmaker1_lay_3_rate);

										back_1_html = "<button><span class='odd d-block'>" + bookmaker1_back_rate + "</span> <span class='d-block'>" + bookmaker1_back_size + "</span></button>";
										back_2_html = "<button><span class='odd d-block'>" + bookmaker1_back_2_rate + "</span> <span class='d-block'>" + bookmaker1_back_2_size + "</span></button>";
										back_3_html = "<button><span class='odd d-block'>" + bookmaker1_back_3_rate + "</span> <span class='d-block'>" + bookmaker1_back_3_size + "</span></button>";

										lay_1_html = "<button><span class='odd d-block'>" + bookmaker1_lay_rate + "</span> <span class='d-block'>" + bookmaker1_lay_size + "</span></button>";
										lay_2_html = "<button><span class='odd d-block'>" + bookmaker1_lay_2_rate + "</span> <span class='d-block'>" + bookmaker1_lay_2_size + "</span></button>";
										lay_3_html = "<button><span class='odd d-block'>" + bookmaker1_lay_3_rate + "</span> <span class='d-block'>" + bookmaker1_lay_3_size + "</span></button>";

										$("#back_1_" + temp_selectionId + "_BOOKMAKERSMALL_ODDS").html(back_1_html);
										$("#back_2_" + temp_selectionId + "_BOOKMAKERSMALL_ODDS").html(back_2_html);
										$("#back_3_" + temp_selectionId + "_BOOKMAKERSMALL_ODDS").html(back_3_html);

										$("#lay_1_" + temp_selectionId + "_BOOKMAKERSMALL_ODDS").html(lay_1_html);
										$("#lay_2_" + temp_selectionId + "_BOOKMAKERSMALL_ODDS").html(lay_2_html);
										$("#lay_3_" + temp_selectionId + "_BOOKMAKERSMALL_ODDS").html(lay_3_html);


									}

								}

							}

						}
					}
				}

			}
			var main_x = args;
			var smdlm_c = [];
			var mdlm_c = [];
			var dlm_c = [];
			marketIdArrayNew = [];
			marketIdArrayNewFancy1 = [];
			var n1;
			var n2;
			var n3;

			if (main_x.SMDLMarket[<?php echo SITE_ID; ?>]) {
				if (main_x.SMDLMarket[<?php echo SITE_ID; ?>][<?php echo $parentSuperMDL; ?>]) {
					if (main_x.SMDLMarket[<?php echo SITE_ID; ?>][<?php echo $parentSuperMDL; ?>]['cricket']) {
						smdlm_c = main_x.SMDLMarket[<?php echo SITE_ID; ?>][<?php echo $parentSuperMDL; ?>]['cricket'];
					}
				}
			}
			if (main_x.MDLMarket[<?php echo SITE_ID; ?>]) {
				if (main_x.MDLMarket[<?php echo SITE_ID; ?>][<?php echo $parentMDL; ?>]) {
					if (main_x.MDLMarket[<?php echo SITE_ID; ?>][<?php echo $parentMDL; ?>]['cricket']) {
						mdlm_c = main_x.MDLMarket[<?php echo SITE_ID; ?>][<?php echo $parentMDL; ?>]['cricket'];
					}
				}
			}
			if (main_x.DLMarket[<?php echo SITE_ID; ?>]) {
				if (main_x.DLMarket[<?php echo SITE_ID; ?>][<?php echo $parentDL; ?>]) {
					if (main_x.DLMarket[<?php echo SITE_ID; ?>][<?php echo $parentDL; ?>]['cricket']) {
						dlm_c = main_x.DLMarket[<?php echo SITE_ID; ?>][<?php echo $parentDL; ?>]['cricket'];
					}
				}
			}
			var _event_id = '<?php echo $event_id; ?>';
			if (!SKIP_FANCY_EVENTID.includes(_event_id)) {
				if (args.body.session) {
					if (args.body.session[0]) {
						if (args.body.session[0].value) {
							if (args.body.session[0].value.session) {
								eventId = $(".event_name_heading").attr("eventid");
								event_name = $(".event_name_heading").attr("event_name");
								counter2 = 0;
								var last_market_id = 0;
								var last_event_id = 0;
								args.body.session[0].value.session = _.sortBy(args.body.session[0].value.session, 'DisplayOrder');
								for (let i = 0; i < args.body.session[0].value.session.length; i++) {
									html_fancy_market_new = "";
									var eventId = <?php echo $event_id; ?>;
									marketId = args.body.session[0].value.session[i].SelectionId;
									if (marketId == "" || args.body.session[0].value.session[i].GameStatus.toUpperCase() == "OFFLINE" || args.body.session[0].value.session[i].GameStatus.toUpperCase() == "CLOSED") { } else {
										min_stack = args.body.session[0].value.session[i].Min;
										max_stack = args.body.session[0].value.session[i].Max;
										marketName = args.body.session[0].value.session[i].RunnerName;
										Remark = args.body.session[0].value.session[i].Remark;
										statusLabel = args.body.session[0].value.session[i].GameStatus;
										if (statusLabel == "") {
											$(".fancy-suspend-tr_" + marketId).removeClass("suspended");
										} else if (statusLabel == "BALL_RUN") {
											$(".fancy-suspend-tr_" + marketId).addClass("suspended");
										} else if (statusLabel == "SUSPEND") {
											$(".fancy-suspend-tr_" + marketId).addClass("suspended");
										} else {
											$(".fancy-suspend-tr_" + marketId).addClass("suspended");
										}
										$(".fancy-suspend-tr_" + marketId).attr("data-title", statusLabel);
										if (args.body.session[0].value.session[i] != undefined) {
											runsNo = args.body.session[0].value.session[i].LayPrice1;
											oddsNo = args.body.session[0].value.session[i].LaySize1;
											runsYes = args.body.session[0].value.session[i].BackPrice1;
											oddsYes = args.body.session[0].value.session[i].BackSize1;
										}
										eventName = marketName;
										eventName2 = eventName.split(' ').join('_');
										if (oddsNo == null) {
											oddsNo = "";
										}
										if (oddsYes == null) {
											oddsYes = "";
										}
										check_runsNo_interger = isNaN(runsNo);
										check_oddsNo_interger = isNaN(oddsNo);
										check_runsYes_interger = isNaN(runsYes);
										check_oddsYes_interger = isNaN(oddsYes);
										if (check_runsNo_interger == true) {
											runsNo = 0;
										}
										if (check_oddsNo_interger == true) {
											oddsNo = 0;
										}
										if (check_runsYes_interger == true) {
											runsYes = 0;
										}
										if (check_oddsYes_interger == true) {
											oddsYes = 0;
										}
										marketId = parseInt(marketId);
										n1 = smdlm_c.includes(marketId);
										n2 = mdlm_c.includes(marketId);
										n3 = dlm_c.includes(marketId);
										//if(!n1 && !n2 && !n3){
										if (true) {
											m1 = marketIdArray.includes(marketId);
											if (m1) {
												marketIdArrayNew[counter2] = marketId;
												counter2++;
												if (Remark != "") {
													$("#remakrs_" + marketId).show();
													$("#remakrs_" + marketId).text(Remark);
												}
												lay_runs_info = "<span class='odd d-block'>" + runsNo + "</span> <span>" + oddsNo + "</span>";
												$("#fancy_market_lay_btn_" + marketId).attr("event_name", event_name);
												$("#fancy_market_lay_btn_" + marketId).attr("fullmarketodds", runsNo);
												$("#fancy_market_lay_btn_" + marketId).attr("selectionid", marketId);
												$("#fancy_market_lay_btn_" + marketId).attr("runner", marketName);
												$("#fancy_market_lay_btn_" + marketId).attr("marketname", marketName);
												$("#fancy_market_lay_btn_" + marketId).attr("eventid", eventId);
												$("#fancy_market_lay_btn_" + marketId).attr("marketid", marketId);
												$("#fancy_market_lay_btn_" + marketId).attr("fullfancymarketrate", oddsNo);
												$("#fancy_market_lay_btn_" + marketId).html(lay_runs_info);
												back_runs_info = "<span class='odd d-block'>" + runsYes + "</span> <span>" + oddsYes + "</span>";
												$("#fancy_market_back_btn_" + marketId).attr("event_name", event_name);
												$("#fancy_market_back_btn_" + marketId).attr("fullmarketodds", runsYes);
												$("#fancy_market_back_btn_" + marketId).attr("selectionid", marketId);
												$("#fancy_market_back_btn_" + marketId).attr("runner", marketName);
												$("#fancy_market_back_btn_" + marketId).attr("marketname", marketName);
												$("#fancy_market_back_btn_" + marketId).attr("eventid", eventId);
												$("#fancy_market_back_btn_" + marketId).attr("marketid", marketId);
												$("#fancy_market_back_btn_" + marketId).attr("fullfancymarketrate", oddsYes);
												$("#fancy_market_back_btn_" + marketId).html(back_runs_info);
											} else {
												marketIdArrayNew[counter2] = marketId;
												counter2++;
												back_attribute = " event_name='" + event_name + "' fullmarketodds='" + runsYes + "' side='Lay' marketid='" + marketId + "' eventid='" + eventId + "'  selectionid='" + marketId + "' market_odd_name='' runner='" + marketName + "' marketname='" + marketName + "' markettype='FANCY_ODDS' inplay='1' fullfancymarketrate='" + oddsYes + "'";
												lay_attribute = " event_name='" + event_name + "' fullmarketodds='" + runsNo + "' side='Lay' marketid='" + marketId + "' eventid='" + eventId + "' selectionid='" + marketId + "' market_odd_name='' runner='" + marketName + "' marketname='" + marketName + "' markettype='FANCY_ODDS' inplay='1' fullfancymarketrate='" + oddsNo + "'";
												html_fancy_market_new += "<div id='spc_fancyBetMarket_" + eventId + "_" + marketId + "'><div id='fancyBetMarket_" + eventId + "_" + marketId + "'><div class='fancy-tripple' > <div data-title='SUSPENDED' class='table-row suspended fancy-suspend-tr_" + marketId + "'><div class='float-left country-name custbold box-4'><span onclick='view_fancy_bet_book(" + eventId + "," + marketId + ")'><b>" + marketName + "</b></span> <div class='float-right'> <div class='info-block'> <a href='javascript:void(0);' data-toggle='collapse' data-target='#min-max-" + marketId + "' aria-expanded='false' class='info-icon collapsed'> <i class='fas fa-info-circle m-l-10'></i> </a> <div id='min-max-" + marketId + "' class='min-max-info collapse'> <span><b>Min:</b> " + min_stack + " </span> <span><b>Max:</b> " + max_stack + " </span> </div> </div> </div> <p class='live_match_points' id='live_match_points_" + marketId + "_FANCY_ODDS'><span class='float-left' style='color: black;'></span></p></div><div class='box-1 lay float-left text-center lay-1' id='fancy_market_lay_btn_" + marketId + "' " + lay_attribute + "><button><span class='odd d-block'>" + runsNo + "</span> <span class='d-block'>" + oddsNo + "</span></button></div><div class='box-1 back float-left text-center back-1' id='fancy_market_back_btn_" + marketId + "' " + back_attribute + "><button><span class='odd d-block'>" + runsYes + "</span> <span class='d-block'>" + oddsYes + "</span></button></div></div></div></div><div class='table-remark  remark' style='display:none;color:var(--theme2-bg85);' id='remakrs_" + marketId + "'></div></div>";
												lastrunsNo = runsNo;
												lastrunsYes = runsYes;
												if (!last_market_id || !last_event_id) {
													$("#secure").after(html_fancy_market_new);
												}
												else {
													var id_to_place_after = "#spc_fancyBetMarket_" + last_event_id + "_" + last_market_id;
													$(id_to_place_after).after(html_fancy_market_new);
												}
											}
										}
									}
									last_market_id = marketId;
									last_event_id = eventId;
								}
								if (html_fancy_market_new != "") {
									$("#fancy_odds_market").show();
								} else { }
								var z = $.grep(marketIdArray, function (el) {
									return $.inArray(el, marketIdArrayNew) == -1
								});
								if (z) {
									for (i = 0; i < z.length; i++) {
										marketId = z[i];
										if ($("#fancyBetMarket_" + eventId + "_" + marketId).length > 0) {
											document.getElementById("fancyBetMarket_" + eventId + "_" + marketId).remove();
											$(".fancy-suspend-tr_" + marketId).remove();
										}
									}
								}
								marketIdArray = marketIdArrayNew;
							}
							//end for
						}
					}
				}
				if (args.body.overByOver) {
					if (args.body.overByOver[0]) {
						if (args.body.overByOver[0].value) {
							if (args.body.overByOver[0].value.session) {
								eventId = $(".event_name_heading").attr("eventid");
								event_name = $(".event_name_heading").attr("event_name");
								counter21 = 0;
								marketIdArrayOverNew = [];
								html_fancy_market_new = "";
								var last_market_id = 0;
								var last_event_id = 0;
								args.body.overByOver[0].value.session = _.sortBy(args.body.overByOver[0].value.session, 'DisplayOrder');
								for (let i = 0; i < args.body.overByOver[0].value.session.length; i++) {

									var eventId = <?php echo $event_id; ?>;
									marketId = args.body.overByOver[0].value.session[i].SelectionId;
									if (marketId == "" || args.body.overByOver[0].value.session[i].GameStatus.toUpperCase() == "OFFLINE" || args.body.overByOver[0].value.session[i].GameStatus.toUpperCase() == "CLOSED") { } else {
										min_stack = args.body.overByOver[0].value.session[i].Min;
										max_stack = args.body.overByOver[0].value.session[i].Max;
										marketName = args.body.overByOver[0].value.session[i].RunnerName;
										Remark = args.body.overByOver[0].value.session[i].Remark;
										statusLabel = args.body.overByOver[0].value.session[i].GameStatus;
										if (statusLabel == "") {
											$(".fancy-over-suspend-tr_" + marketId).removeClass("suspended");
										} else if (statusLabel == "BALL_RUN") {
											$(".fancy-over-suspend-tr_" + marketId).addClass("suspended");
										} else if (statusLabel == "SUSPEND") {
											$(".fancy-over-suspend-tr_" + marketId).addClass("suspended");
										} else {
											$(".fancy-over-suspend-tr_" + marketId).addClass("suspended");
										}
										$(".fancy-over-suspend-tr_" + marketId).attr("data-title", statusLabel);
										if (args.body.overByOver[0].value.session[i] != undefined) {
											runsNo = args.body.overByOver[0].value.session[i].LayPrice1;
											oddsNo = args.body.overByOver[0].value.session[i].LaySize1;
											runsYes = args.body.overByOver[0].value.session[i].BackPrice1;
											oddsYes = args.body.overByOver[0].value.session[i].BackSize1;
										}
										eventName = marketName;
										eventName2 = eventName.split(' ').join('_');
										if (oddsNo == null) {
											oddsNo = "";
										}
										if (oddsYes == null) {
											oddsYes = "";
										}
										check_runsNo_interger = isNaN(runsNo);
										check_oddsNo_interger = isNaN(oddsNo);
										check_runsYes_interger = isNaN(runsYes);
										check_oddsYes_interger = isNaN(oddsYes);
										if (check_runsNo_interger == true) {
											runsNo = 0;
										}
										if (check_oddsNo_interger == true) {
											oddsNo = 0;
										}
										if (check_runsYes_interger == true) {
											runsYes = 0;
										}
										if (check_oddsYes_interger == true) {
											oddsYes = 0;
										}
										marketId = parseInt(marketId);
										n1 = smdlm_c.includes(marketId);
										n2 = mdlm_c.includes(marketId);
										n3 = dlm_c.includes(marketId);
										//if(!n1 && !n2 && !n3){
										if (true) {
											m1 = marketIdArrayOver.includes(marketId);
											if (m1) {
												marketIdArrayOverNew[counter21] = marketId;
												counter21++;
												if (Remark != "") {
													$("#remakrs_" + marketId).show();
													$("#remakrs_" + marketId).text(Remark);
												}
												lay_runs_info = "<span class='odd d-block'>" + runsNo + "</span> <span>" + oddsNo + "</span>";
												$("#fancy_market_lay_btn_" + marketId).attr("event_name", event_name);
												$("#fancy_market_lay_btn_" + marketId).attr("fullmarketodds", runsNo);
												$("#fancy_market_lay_btn_" + marketId).attr("selectionid", marketId);
												$("#fancy_market_lay_btn_" + marketId).attr("runner", marketName);
												$("#fancy_market_lay_btn_" + marketId).attr("marketname", marketName);
												$("#fancy_market_lay_btn_" + marketId).attr("eventid", eventId);
												$("#fancy_market_lay_btn_" + marketId).attr("marketid", marketId);
												$("#fancy_market_lay_btn_" + marketId).attr("fullfancymarketrate", oddsNo);
												$("#fancy_market_lay_btn_" + marketId).html(lay_runs_info);
												back_runs_info = "<span class='odd d-block'>" + runsYes + "</span> <span>" + oddsYes + "</span>";
												$("#fancy_market_back_btn_" + marketId).attr("event_name", event_name);
												$("#fancy_market_back_btn_" + marketId).attr("fullmarketodds", runsYes);
												$("#fancy_market_back_btn_" + marketId).attr("selectionid", marketId);
												$("#fancy_market_back_btn_" + marketId).attr("runner", marketName);
												$("#fancy_market_back_btn_" + marketId).attr("marketname", marketName);
												$("#fancy_market_back_btn_" + marketId).attr("eventid", eventId);
												$("#fancy_market_back_btn_" + marketId).attr("marketid", marketId);
												$("#fancy_market_back_btn_" + marketId).attr("fullfancymarketrate", oddsYes);
												$("#fancy_market_back_btn_" + marketId).html(back_runs_info);
											} else {
												marketIdArrayOverNew[counter21] = marketId;
												counter21++;
												back_attribute = " event_name='" + event_name + "' fullmarketodds='" + runsYes + "' side='Lay' marketid='" + marketId + "' eventid='" + eventId + "'  selectionid='" + marketId + "' market_odd_name='' runner='" + marketName + "' marketname='" + marketName + "' markettype='FANCY_ODDS' inplay='1' fullfancymarketrate='" + oddsYes + "'";
												lay_attribute = " event_name='" + event_name + "' fullmarketodds='" + runsNo + "' side='Lay' marketid='" + marketId + "' eventid='" + eventId + "' selectionid='" + marketId + "' market_odd_name='' runner='" + marketName + "' marketname='" + marketName + "' markettype='FANCY_ODDS' inplay='1' fullfancymarketrate='" + oddsNo + "'";
												html_fancy_market_new += "<div id='spc_fancyOverBetMarket_" + eventId + "_" + marketId + "'><div id='fancyOverBetMarket_" + eventId + "_" + marketId + "'><div class='fancy-tripple' > <div data-title='SUSPENDED' class='table-row suspended fancy-over-suspend-tr_" + marketId + "'><div class='float-left country-name custbold box-4'><span onclick='view_fancy_bet_book(" + eventId + "," + marketId + ")'><b>" + marketName + "</b></span> <div class='float-right'> <div class='info-block'> <a href='javascript:void(0);' data-toggle='collapse' data-target='#min-max-" + marketId + "' aria-expanded='false' class='info-icon collapsed'> <i class='fas fa-info-circle m-l-10'></i> </a> <div id='min-max-" + marketId + "' class='min-max-info collapse'> <span><b>Min:</b> " + min_stack + " </span> <span><b>Max:</b> " + max_stack + " </span> </div> </div> </div> <p class='live_match_points' id='live_match_points_" + marketId + "_FANCY_ODDS'><span class='float-left' style='color: black;'></span></p></div><div class='box-1 lay float-left text-center lay-1' id='fancy_market_lay_btn_" + marketId + "' " + lay_attribute + "><button><span class='odd d-block'>" + runsNo + "</span> <span class='d-block'>" + oddsNo + "</span></button></div><div class='box-1 back float-left text-center back-1' id='fancy_market_back_btn_" + marketId + "' " + back_attribute + "><button><span class='odd d-block'>" + runsYes + "</span> <span class='d-block'>" + oddsYes + "</span></button></div></div></div></div><div class='table-remark text-right remark' style='display:none;' id='remakrs_" + marketId + "'></div></div>";
												lastrunsNo = runsNo;
												lastrunsYes = runsYes;
												if (!last_market_id || !last_event_id) {
													$("#secure_over").after(html_fancy_market_new);
												}
												else {
													var id_to_place_after = "#spc_fancyOverBetMarket_" + last_event_id + "_" + last_market_id;
													$(id_to_place_after).after(html_fancy_market_new);
												}

											}
										}
									}
									last_market_id = marketId;
									last_event_id = eventId;
								}
								if (html_fancy_market_new != "") {
									$("#over_odds_market").show();
								} else { }
								var z = $.grep(marketIdArrayOver, function (el) {
									return $.inArray(el, marketIdArrayOverNew) == -1
								});
								if (z) {
									for (i = 0; i < z.length; i++) {
										marketId = z[i];
										if ($("#fancyOverBetMarket_" + eventId + "_" + marketId).length > 0) {
											document.getElementById("fancyOverBetMarket_" + eventId + "_" + marketId).remove();
											$(".fancy-over-suspend-tr_" + marketId).remove();
										}
									}
								}
								marketIdArrayOver = marketIdArrayOverNew;
							}
							//end for
						}
					}
				}
				if (args.body.session1 && true) {
					if (args.body.session1[0]) {
						if (args.body.session1[0].value) {
							if (args.body.session1[0].value.session) {
								eventId = $(".event_name_heading").attr("eventid");
								event_name = $(".event_name_heading").attr("event_name");
								counter2 = 0;
								marketIdArrayNewFancy1 = [];
								//start for
								var body2 = args.body.session1[0].value.session.map(a => {
									let b = {};
									b = a;
									b['SelectionId'] = parseInt(b['SelectionId']);
									return b;
								});
								var last_market_id = 0;
								var last_event_id = 0;
								args.body.session1[0].value.session = _.sortBy(body2, 'DisplayOrder');
								for (i = 0; i < args.body.session1[0].value.session.length; i++) {
									html_fancy_market_new1 = "";
									var eventId = <?php echo $event_id; ?>;
									marketId = args.body.session1[0].value.session[i].SelectionId;
									if (marketId == "" || args.body.session1[0].value.session[i].GameStatus.toUpperCase() == "OFFLINE" || args.body.session1[0].value.session[i].GameStatus.toUpperCase() == "CLOSED") {
										//	if(marketId == ""){
									} else {
										min_stack = args.body.session1[0].value.session[i].Min;
										max_stack = args.body.session1[0].value.session[i].Max;
										marketName = args.body.session1[0].value.session[i].RunnerName;
										Remark = args.body.session1[0].value.session[i].Remark;
										statusLabel = args.body.session1[0].value.session[i].GameStatus;
										if (statusLabel == "") {
											$(".fancy1-suspend-tr_" + marketId).removeClass("suspended");
										} else if (statusLabel == "BALL_RUN") {
											$(".fancy1-suspend-tr_" + marketId).addClass("suspended");
										} else if (statusLabel == "SUSPEND") {
											$(".fancy1-suspend-tr_" + marketId).addClass("suspended");
										} else {
											$(".fancy1-suspend-tr_" + marketId).addClass("suspended");
										}
										$(".fancy1-suspend-tr_" + marketId).attr("data-title", statusLabel);
										if (args.body.session1[0].value.session[i] != undefined) {
											runsNo = args.body.session1[0].value.session[i].LayPrice1;
											oddsNo = args.body.session1[0].value.session[i].LaySize1;
											runsYes = args.body.session1[0].value.session[i].BackPrice1;
											oddsYes = args.body.session1[0].value.session[i].BackSize1;
										}
										eventName = marketName;
										eventName2 = eventName.split(' ').join('_');
										if (oddsNo == null) {
											oddsNo = "";
										}
										if (oddsYes == null) {
											oddsYes = "";
										}
										check_runsNo_interger = isNaN(runsNo);
										check_oddsNo_interger = isNaN(oddsNo);
										check_runsYes_interger = isNaN(runsYes);
										check_oddsYes_interger = isNaN(oddsYes);
										if (check_runsNo_interger == true) {
											runsNo = 0;
										}
										if (check_oddsNo_interger == true) {
											oddsNo = 0;
										}
										if (check_runsYes_interger == true) {
											runsYes = 0;
										}
										if (check_oddsYes_interger == true) {
											oddsYes = 0;
										}
										marketId = parseInt(marketId);
										n1 = smdlm_c.includes(marketId);
										n2 = mdlm_c.includes(marketId);
										n3 = dlm_c.includes(marketId);
										//if(!n1 && !n2 && !n3){
										if (true) {
											m1 = marketIdArrayFancy1.includes(marketId);
											if (m1) {
												marketIdArrayNewFancy1[counter2] = marketId;
												counter2++;
												if (Remark != "") {
													$("#remakrs_" + marketId).show();
													$("#remakrs_" + marketId).text(Remark);
												}
												/*                                        if(runsNo == 0){
																							   runsNo = "";
																							   oddsNo = "";
																					   }
												
																					   if(runsYes == 0){
																							   runsYes = "";
																							   oddsYes = "";
																					   } */
												lay_runs_info = "<span class='odd d-block'>" + runsNo + "</span> <span>" + oddsNo + "</span>";
												$("#fancy1_market_lay_btn_" + marketId).attr("event_name", event_name);
												$("#fancy1_market_lay_btn_" + marketId).attr("fullmarketodds", runsNo);
												$("#fancy1_market_lay_btn_" + marketId).attr("selectionid", marketId);
												$("#fancy1_market_lay_btn_" + marketId).attr("runner", marketName);
												$("#fancy1_market_lay_btn_" + marketId).attr("marketname", marketName);
												$("#fancy1_market_lay_btn_" + marketId).attr("eventid", eventId);
												$("#fancy1_market_lay_btn_" + marketId).attr("marketid", marketId);
												$("#fancy1_market_lay_btn_" + marketId).attr("fullfancymarketrate", runsNo);
												$("#fancy1_market_lay_btn_" + marketId).html(lay_runs_info);
												back_runs_info = "<span class='odd d-block'>" + runsYes + "</span> <span>" + oddsYes + "</span>";
												$("#fancy1_market_back_btn_" + marketId).attr("event_name", event_name);
												$("#fancy1_market_back_btn_" + marketId).attr("fullmarketodds", runsYes);
												$("#fancy1_market_back_btn_" + marketId).attr("selectionid", marketId);
												$("#fancy1_market_back_btn_" + marketId).attr("runner", marketName);
												$("#fancy1_market_back_btn_" + marketId).attr("marketname", marketName);
												$("#fancy1_market_back_btn_" + marketId).attr("eventid", eventId);
												$("#fancy1_market_back_btn_" + marketId).attr("marketid", marketId);
												$("#fancy1_market_back_btn_" + marketId).attr("fullfancymarketrate", runsYes);
												$("#fancy1_market_back_btn_" + marketId).html(back_runs_info);
											} else {
												marketIdArrayNewFancy1[counter2] = marketId;
												counter2++;
												back_attribute = " event_name='" + event_name + "' fullmarketodds='" + runsYes + "' side='Lay' marketid='" + marketId + "' eventid='" + eventId + "'  selectionid='" + marketId + "' market_odd_name='FANCY1_ODDS' runner='" + marketName + "' marketname='" + marketName + "' markettype='FANCY_ODDS' inplay='1' fullfancymarketrate='" + runsYes + "'";
												lay_attribute = " event_name='" + event_name + "' fullmarketodds='" + runsNo + "' side='Lay' marketid='" + marketId + "' eventid='" + eventId + "' selectionid='" + marketId + "' market_odd_name='FANCY1_ODDS' runner='" + marketName + "' marketname='" + marketName + "' markettype='FANCY_ODDS' inplay='1' fullfancymarketrate='" + runsNo + "'";
												html_fancy_market_new1 += "<div id='spc_fancy1BetMarket_" + eventId + "_" + marketId + "'><div id='fancy1BetMarket_" + eventId + "_" + marketId + "'><div class='fancy-tripple'> <div data-title='SUSPENDED' class='table-row suspended fancy1-suspend-tr_" + marketId + "'><div class='float-left country-name custbold box-4'><span onclick='view_fancy_bet_book(" + eventId + "," + marketId + ")'><b>" + marketName + "</b></span> <div class='float-right'> <div class='info-block'> <a href='javascript:void(0);' data-toggle='collapse' data-target='#min-max-" + marketId + "' aria-expanded='false' class='info-icon collapsed'> <i class='fas fa-info-circle m-l-10'></i> </a> <div id='min-max-" + marketId + "' class='min-max-info collapse'> <span><b>Min:</b> " + min_stack + " </span> <span><b>Max:</b> " + max_stack + " </span> </div> </div> </div> <p class='live_match_points' id='live_match_points_" + marketId + "_FANCY_ODDS'><span class='float-left' style='color: black;'></span></p></div><div class='box-1 back float-left text-center back-1' id='fancy1_market_back_btn_" + marketId + "' " + back_attribute + "><button><span class='odd d-block'>" + runsYes + "</span> <span class='d-block'>" + oddsYes + "</span></button></div><div class='box-1 lay float-left text-center lay-1' id='fancy1_market_lay_btn_" + marketId + "' " + lay_attribute + "><button><span class='odd d-block'>" + runsNo + "</span> <span class='d-block'>" + oddsNo + "</span></button></div></div></div></div><div class='table-remark text-right remark' style='display:none;' id='remakrs_" + marketId + "'></div></div>";
												lastrunsNo = runsNo;
												lastrunsYes = runsYes;
												if (!last_market_id || !last_event_id) {
													$("#secure1").after(html_fancy_market_new1);
												}
												else {
													var id_to_place_after = "#spc_fancy1BetMarket_" + last_event_id + "_" + last_market_id;
													$(id_to_place_after).after(html_fancy_market_new1);
												}
											}
										}
									}
									last_market_id = marketId;
									last_event_id = eventId;
								}
								if (html_fancy_market_new1 != "") {
									$("#fancy_odds_market1").show();
								} else { }
								var z = $.grep(marketIdArrayFancy1, function (el) {
									return $.inArray(el, marketIdArrayNewFancy1) == -1
								});
								if (z) {
									for (i = 0; i < z.length; i++) {
										marketId = z[i];
										if ($("#fancy1BetMarket_" + eventId + "_" + marketId).length > 0) {
											document.getElementById("fancy1BetMarket_" + eventId + "_" + marketId).remove();
											$(".fancy1-suspend-tr_" + marketId).remove();
										}
									}
								}
								marketIdArrayFancy1 = marketIdArrayNewFancy1;
							}
							//end for
						}
					}
				}
				if (args.body.khado && true) {
					if (args.body.khado[0]) {
						if (args.body.khado[0].value) {
							if (args.body.khado[0].value.session) {
								eventId = $(".event_name_heading").attr("eventid");
								event_name = $(".event_name_heading").attr("event_name");
								marketIdArrayNewKhado = [];
								counter2 = 0;
								//start for
								var body2 = args.body.khado[0].value.session.map(a => {
									let b = {};
									b = a;
									b['SelectionId'] = parseInt(b['SelectionId']);
									return b;
								});
								var last_market_id = 0;
								var last_event_id = 0;
								args.body.khado[0].value.session = _.sortBy(body2, 'DisplayOrder');
								for (i = 0; i < args.body.khado[0].value.session.length; i++) {
									html_khado_market_new = "";
									var eventId = <?php echo $event_id; ?>;
									marketId = args.body.khado[0].value.session[i].SelectionId;
									if (marketId == "" || args.body.khado[0].value.session[i].GameStatus.toUpperCase() == "OFFLINE" || args.body.khado[0].value.session[i].GameStatus.toUpperCase() == "CLOSED") {
										//	if(marketId == ""){
									} else {
										min_stack = args.body.khado[0].value.session[i].Min;
										max_stack = args.body.khado[0].value.session[i].Max;
										marketName = args.body.khado[0].value.session[i].RunnerName;
										Remark = args.body.khado[0].value.session[i].Remark;
										statusLabel = args.body.khado[0].value.session[i].GameStatus;
										if (statusLabel == "") {
											$(".khado-suspend-tr_" + marketId).removeClass("suspended");
										} else if (statusLabel == "BALL_RUN") {
											$(".khado-suspend-tr_" + marketId).addClass("suspended");
										} else if (statusLabel == "SUSPEND") {
											$(".khado-suspend-tr_" + marketId).addClass("suspended");
										} else {
											$(".khado-suspend-tr_" + marketId).addClass("suspended");
										}
										$(".khado-suspend-tr_" + marketId).attr("data-title", statusLabel);
										if (args.body.khado[0].value.session[i] != undefined) {
											runsNo = args.body.khado[0].value.session[i].LayPrice1;
											oddsNo = args.body.khado[0].value.session[i].LaySize1;
											runsYes = args.body.khado[0].value.session[i].BackPrice1;
											oddsYes = args.body.khado[0].value.session[i].BackSize1;
										}
										eventName = marketName;
										eventName2 = eventName.split(' ').join('_');
										if (oddsNo == null) {
											oddsNo = "";
										}
										if (oddsYes == null) {
											oddsYes = "";
										}
										check_runsNo_interger = isNaN(runsNo);
										check_oddsNo_interger = isNaN(oddsNo);
										check_runsYes_interger = isNaN(runsYes);
										check_oddsYes_interger = isNaN(oddsYes);
										if (check_runsNo_interger == true) {
											runsNo = 0;
										}
										if (check_oddsNo_interger == true) {
											oddsNo = 0;
										}
										if (check_runsYes_interger == true) {
											runsYes = 0;
										}
										if (check_oddsYes_interger == true) {
											oddsYes = 0;
										}
										marketId = parseInt(marketId);
										n1 = smdlm_c.includes(marketId);
										n2 = mdlm_c.includes(marketId);
										n3 = dlm_c.includes(marketId);
										//if(!n1 && !n2 && !n3){
										if (true) {
											m1 = marketIdArrayKhado.includes(marketId);
											if (m1) {
												marketIdArrayNewKhado[counter2] = marketId;
												counter2++;
												if (Remark != "") {
													$("#remakrs_" + marketId).show();
													$("#remakrs_" + marketId).text(Remark);
												}
												if (runsNo == 0) {
													runsNo = "";
													oddsNo = "";
												}
												if (runsYes == 0) {
													runsYes = "";
													oddsYes = "";
												}
												lay_runs_info = "<span class='odd d-block'>" + runsNo + "</span> <span>" + oddsNo + "</span>";
												$("#khado_market_lay_btn_" + marketId).attr("event_name", event_name);
												$("#khado_market_lay_btn_" + marketId).attr("fullmarketodds", runsNo);
												$("#khado_market_lay_btn_" + marketId).attr("selectionid", marketId);
												$("#khado_market_lay_btn_" + marketId).attr("runner", marketName);
												$("#khado_market_lay_btn_" + marketId).attr("marketname", marketName);
												$("#khado_market_lay_btn_" + marketId).attr("eventid", eventId);
												$("#khado_market_lay_btn_" + marketId).attr("marketid", marketId);
												$("#khado_market_lay_btn_" + marketId).attr("fullfancymarketrate", oddsNo);
												$("#khado_market_lay_btn_" + marketId).html();
												winning_zone = parseInt(runsYes) + parseInt(runsNo);
												back_runs_info = "<span class='odd d-block'>" + runsYes + "</span> <span>" + oddsYes + "</span>";
												$("#khado_market_back_btn_" + marketId).attr("event_name", event_name);
												$("#khado_market_back_btn_" + marketId).attr("fullmarketodds", runsYes);
												$("#khado_market_back_btn_" + marketId).attr("selectionid", marketId);
												$("#khado_market_back_btn_" + marketId).attr("runner", marketName + ' - ' + runsNo);
												$("#khado_market_back_btn_" + marketId).attr("marketname", marketName);
												$("#khado_market_back_btn_" + marketId).attr("eventid", eventId);
												$("#khado_market_back_btn_" + marketId).attr("marketid", marketId);
												$("#khado_market_back_btn_" + marketId).attr("fullfancymarketrate", oddsYes);
												$("#khado_market_back_btn_" + marketId).attr("winnig_zone", winning_zone);
												$("#khado_market_back_btn_" + marketId).html(back_runs_info);
											} else {
												marketIdArrayNewKhado[counter2] = marketId;
												counter2++;
												winning_zone = runsYes + runsNo;
												back_attribute = " event_name='" + event_name + "' fullmarketodds='" + runsYes + "' side='Lay' marketid='" + marketId + "' eventid='" + eventId + "'  selectionid='" + marketId + "' market_odd_name='KHADO_ODDS' runner='" + marketName + "' marketname='" + marketName + "' markettype='KHADO_ODDS' inplay='1' fullfancymarketrate='" + oddsYes + "' winnig_zone='" + winning_zone + "'";
												lay_attribute = " event_name='" + event_name + "' fullmarketodds='" + runsNo + "' side='Lay' marketid='" + marketId + "' eventid='" + eventId + "' selectionid='" + marketId + "' market_odd_name='KHADO_ODDS' runner='" + marketName + "' marketname='" + marketName + "' markettype='KHADO_ODDS' inplay='1' fullfancymarketrate='" + oddsNo + "'";
												html_khado_market_new += "<div id='spc_khadoBetMarket_" + eventId + "_" + marketId + "'><div id='khadoBetMarket_" + eventId + "_" + marketId + "'><div class='fancy-tripple' > <div data-title='SUSPENDED' class='table-row suspended khado-suspend-tr_" + marketId + "'><div class='float-left country-name custbold box-8'><span><b>" + marketName + ' - ' + runsNo + "</b></span> <div class='float-right'> <div class='info-block'> <a href='javascript:void(0);' data-toggle='collapse' data-target='#min-max-" + marketId + "' aria-expanded='false' class='info-icon collapsed'> <i class='fas fa-info-circle m-l-10'></i> </a> <div id='min-max-" + marketId + "' class='min-max-info collapse'> <span><b>Min:</b> " + min_stack + " </span> <span><b>Max:</b> " + max_stack + " </span> </div> </div> </div> <p class='live_match_points' id='live_match_points_" + marketId + "_KHADO_ODDS'><span class='float-left' style='color: black;'></span></p></div><div class='box-1 back float-left text-center back-1' id='khado_market_back_btn_" + marketId + "' " + back_attribute + "><button><span class='odd d-block'>" + runsYes + "</span> <span class='d-block'>" + oddsYes + "</span></button></div></div></div></div><div class='table-remark text-right remark' style='display:none;' id='remakrs_" + marketId + "'></div></div>";
												lastrunsNo = runsNo;
												lastrunsYes = runsYes;

												if (!last_market_id || !last_event_id) {
													$("#secure_khado").after(html_khado_market_new);
												}
												else {
													var id_to_place_after = "#spc_khadoBetMarket_" + last_event_id + "_" + last_market_id;
													$(id_to_place_after).after(html_khado_market_new);
												}

											}
										}
									}
									last_market_id = marketId;
									last_event_id = eventId;
								}
								if (html_khado_market_new != "") {
									$("#khado_odds_market").show();
								} else { }
								var z = $.grep(marketIdArrayKhado, function (el) {
									return $.inArray(el, marketIdArrayNewKhado) == -1
								});
								if (z) {
									for (i = 0; i < z.length; i++) {
										marketId = z[i];
										if ($("#khadoBetMarket_" + eventId + "_" + marketId).length > 0) {
											document.getElementById("khadoBetMarket_" + eventId + "_" + marketId).remove();
											$(".khado-suspend-tr_" + marketId).remove();
										}
									}
								}
								marketIdArrayKhado = marketIdArrayNewKhado;
							}
							//end for
						}
					}
				}
				if (args.body.ballByBall && true) {
					if (args.body.ballByBall[0]) {
						if (args.body.ballByBall[0].value) {
							if (args.body.ballByBall[0].value.session) {
								eventId = $(".event_name_heading").attr("eventid");
								event_name = $(".event_name_heading").attr("event_name");
								counter2 = 0;
								marketIdArrayNewBall = [];
								//start for
								var body2 = args.body.ballByBall[0].value.session.map(a => {
									let b = {};
									b = a;
									b['SelectionId'] = parseInt(b['SelectionId']);
									return b;
								});
								args.body.ballByBall[0].value.session = _.sortBy(body2, 'DisplayOrder');
								var is_first_over_run = false,
									over_number = '';
								var last_market_id = 0;
								var last_event_id = 0;
								for (let i = 0; i < args.body.ballByBall[0].value.session.length; i++) {
									html_ball_market_new = "";
									var eventId = <?php echo $event_id; ?>;
									marketId = args.body.ballByBall[0].value.session[i].SelectionId;
									if (marketId == "" || args.body.ballByBall[0].value.session[i].GameStatus.toUpperCase() == "OFFLINE" || args.body.ballByBall[0].value.session[i].GameStatus.toUpperCase() == "CLOSED") {
										//	if(marketId == ""){
									} else {
										min_stack = args.body.ballByBall[0].value.session[i].Min;
										max_stack = args.body.ballByBall[0].value.session[i].Max;
										marketName = args.body.ballByBall[0].value.session[i].RunnerName;
										Remark = args.body.ballByBall[0].value.session[i].Remark;
										statusLabel = args.body.ballByBall[0].value.session[i].GameStatus;

										if (statusLabel == "") {
											$(".ballByBall-suspend-tr_" + marketId).removeClass("suspended");
										} else if (statusLabel == "BALL_RUN") {
											$(".ballByBall-suspend-tr_" + marketId).addClass("suspended");
										} else if (statusLabel == "SUSPEND") {
											$(".ballByBall-suspend-tr_" + marketId).addClass("suspended");
										} else {
											$(".ballByBall-suspend-tr_" + marketId).addClass("suspended");
										}
										$(".ballByBall-suspend-tr_" + marketId).attr("data-title", statusLabel);
										if (args.body.ballByBall[0].value.session[i] != undefined) {
											runsNo = args.body.ballByBall[0].value.session[i].LayPrice1;
											oddsNo = args.body.ballByBall[0].value.session[i].LaySize1;
											runsYes = args.body.ballByBall[0].value.session[i].BackPrice1;
											oddsYes = args.body.ballByBall[0].value.session[i].BackSize1;
										}
										eventName = marketName;
										eventName2 = eventName.split(' ').join('_');
										if (oddsNo == null) {
											oddsNo = "";
										}
										if (oddsYes == null) {
											oddsYes = "";
										}
										check_runsNo_interger = isNaN(runsNo);
										check_oddsNo_interger = isNaN(oddsNo);
										check_runsYes_interger = isNaN(runsYes);
										check_oddsYes_interger = isNaN(oddsYes);
										if (check_runsNo_interger == true) {
											runsNo = 0;
										}
										if (check_oddsNo_interger == true) {
											oddsNo = 0;
										}
										if (check_runsYes_interger == true) {
											runsYes = 0;
										}
										if (check_oddsYes_interger == true) {
											oddsYes = 0;
										}
										marketId = parseInt(marketId);
										n1 = smdlm_c.includes(marketId);
										n2 = mdlm_c.includes(marketId);
										n3 = dlm_c.includes(marketId);
										//if(!n1 && !n2 && !n3){
										if (true) {
											m1 = marketIdArrayBall.includes(marketId);
											if (m1) {
												marketIdArrayNewBall[counter2] = marketId;
												counter2++;
												if (Remark != "") {
													$("#remakrs_" + marketId).show();
													$("#remakrs_" + marketId).text(Remark);
												}
												if (runsNo == 0) {
													runsNo = "";
													oddsNo = "";
												}
												if (runsYes == 0) {
													runsYes = "";
													oddsYes = "";
												}
												lay_runs_info = "<span class='odd d-block'>" + runsNo + "</span> <span>" + oddsNo + "</span>";
												$("#ball_market_lay_btn_" + marketId).attr("event_name", event_name);
												$("#ball_market_lay_btn_" + marketId).attr("fullmarketodds", runsNo);
												$("#ball_market_lay_btn_" + marketId).attr("selectionid", marketId);
												$("#ball_market_lay_btn_" + marketId).attr("runner", marketName);
												$("#ball_market_lay_btn_" + marketId).attr("marketname", marketName);
												$("#ball_market_lay_btn_" + marketId).attr("eventid", eventId);
												$("#ball_market_lay_btn_" + marketId).attr("marketid", marketId);
												$("#ball_market_lay_btn_" + marketId).attr("fullfancymarketrate", oddsNo);
												$("#ball_market_lay_btn_" + marketId).html(lay_runs_info);
												back_runs_info = "<span class='odd d-block'>" + runsYes + "</span> <span>" + oddsYes + "</span>";
												$("#ball_market_back_btn_" + marketId).attr("event_name", event_name);
												$("#ball_market_back_btn_" + marketId).attr("fullmarketodds", runsYes);
												$("#ball_market_back_btn_" + marketId).attr("selectionid", marketId);
												$("#ball_market_back_btn_" + marketId).attr("runner", marketName);
												$("#ball_market_back_btn_" + marketId).attr("marketname", marketName);
												$("#ball_market_back_btn_" + marketId).attr("eventid", eventId);
												$("#ball_market_back_btn_" + marketId).attr("marketid", marketId);
												$("#ball_market_back_btn_" + marketId).attr("fullfancymarketrate", oddsYes);
												$("#ball_market_back_btn_" + marketId).html(back_runs_info);
											} else {
												marketIdArrayNewBall[counter2] = marketId;
												counter2++;
												back_attribute = " event_name='" + event_name + "' fullmarketodds='" + runsYes + "' side='Lay' marketid='" + marketId + "' eventid='" + eventId + "'  selectionid='" + marketId + "' market_odd_name='BALL_ODDS' runner='" + marketName + "' marketname='" + marketName + "' markettype='FANCY_ODDS' inplay='1' fullfancymarketrate='" + oddsYes + "'";
												lay_attribute = " event_name='" + event_name + "' fullmarketodds='" + runsNo + "' side='Lay' marketid='" + marketId + "' eventid='" + eventId + "' selectionid='" + marketId + "' market_odd_name='BALL_ODDS' runner='" + marketName + "' marketname='" + marketName + "' markettype='FANCY_ODDS' inplay='1' fullfancymarketrate='" + oddsNo + "'";
												html_ball_market_new += "<div id='spc_ballBetMarket_" + eventId + "_" + marketId + "'><div id='ballBetMarket_" + eventId + "_" + marketId + "'><div class='fancy-tripple' > <div data-title='SUSPENDED' class='table-row suspended ballByBall-suspend-tr_" + marketId + "'><div class='float-left country-name custbold box-4'><span><b>" + marketName + "</b></span> <div class='float-right'> <div class='info-block'> <a href='javascript:void(0);' data-toggle='collapse' data-target='#min-max-" + marketId + "' aria-expanded='false' class='info-icon collapsed'> <i class='fas fa-info-circle m-l-10'></i> </a> <div id='min-max-" + marketId + "' class='min-max-info collapse'> <span><b>Min:</b> " + min_stack + " </span> <span><b>Max:</b> " + max_stack + " </span> </div> </div> </div> <p class='live_match_points' id='live_match_points_" + marketId + "_FANCY_ODDS'><span class='float-left' style='color: black;'></span></p></div><div class='box-1 lay float-left text-center lay-1' id='ball_market_lay_btn_" + marketId + "' " + lay_attribute + "><button><span class='odd d-block'>" + runsNo + "</span> <span class='d-block'>" + oddsNo + "</span></button></div><div class='box-1 back float-left text-center back-1' id='ball_market_back_btn_" + marketId + "' " + back_attribute + "><button><span class='odd d-block'>" + runsYes + "</span> <span class='d-block'>" + oddsYes + "</span></button></div></div></div></div><div class='table-remark text-right remark' style='display:none;' id='remakrs_" + marketId + "'></div></div>";
												lastrunsNo = runsNo;
												lastrunsYes = runsYes;

												if (!last_market_id || !last_event_id) {
													$("#secure_ball").after(html_ball_market_new);
												}
												else {
													var id_to_place_after = "#spc_ballBetMarket_" + last_event_id + "_" + last_market_id;
													$(id_to_place_after).after(html_ball_market_new);
												}
											}
										}
									}
									last_market_id = marketId;
									last_event_id = eventId;
								}
								if (html_ball_market_new != "") {
									$("#ball_odds_market").show();
								}
								var z = $.grep(marketIdArrayBall, function (el) {
									return $.inArray(el, marketIdArrayNewBall) == -1
								});
								if (z) {
									for (i = 0; i < z.length; i++) {
										marketId = z[i];
										if ($("#ballBetMarket_" + eventId + "_" + marketId).length > 0) {
											document.getElementById("ballBetMarket_" + eventId + "_" + marketId).remove();
											$(".ballByBall-suspend-tr_" + marketId).remove();
										}
									}
								}
								marketIdArrayBall = marketIdArrayNewBall;
							}
							//end for
						}
					}
				}
				if (args.body.oddEven && true) {
					if (args.body.oddEven[0]) {
						if (args.body.oddEven[0].value) {
							if (args.body.oddEven[0].value.session) {
								eventId = $(".event_name_heading").attr("eventid");
								event_name = $(".event_name_heading").attr("event_name");
								counter2 = 0;
								marketIdArrayNewOddeven = [];
								//start for
								var body2 = args.body.oddEven[0].value.session.map(a => {
									let b = {};
									b = a;
									b['SelectionId'] = parseInt(b['SelectionId']);
									return b;
								});
								var last_market_id = 0;
								var last_event_id = 0;
								args.body.oddEven[0].value.session = _.sortBy(body2, 'DisplayOrder');
								for (i = 0; i < args.body.oddEven[0].value.session.length; i++) {
									html_oddeven_market_new = "";
									var eventId = <?php echo $event_id; ?>;
									marketId = args.body.oddEven[0].value.session[i].SelectionId;
									if (marketId == "" || args.body.oddEven[0].value.session[i].GameStatus.toUpperCase() == "OFFLINE" || args.body.oddEven[0].value.session[i].GameStatus.toUpperCase() == "CLOSED") {
										//	if(marketId == ""){
									} else {
										min_stack = args.body.oddEven[0].value.session[i].Min;
										max_stack = args.body.oddEven[0].value.session[i].Max;
										marketName = args.body.oddEven[0].value.session[i].RunnerName;
										Remark = args.body.oddEven[0].value.session[i].Remark;
										statusLabel = args.body.oddEven[0].value.session[i].GameStatus;
										if (statusLabel == "") {
											$(".oddeven-suspend-tr_" + marketId).removeClass("suspended");
										} else if (statusLabel == "BALL_RUN") {
											$(".oddeven-suspend-tr_" + marketId).addClass("suspended");
										} else if (statusLabel == "SUSPEND") {
											$(".oddeven-suspend-tr_" + marketId).addClass("suspended");
										} else {
											$(".oddeven-suspend-tr_" + marketId).addClass("suspended");
										}
										$(".oddeven-suspend-tr_" + marketId).attr("data-title", statusLabel);
										if (args.body.oddEven[0].value.session[i] != undefined) {
											runsNo = args.body.oddEven[0].value.session[i].LayPrice1;
											oddsNo = args.body.oddEven[0].value.session[i].LaySize1;
											runsYes = args.body.oddEven[0].value.session[i].BackPrice1;
											oddsYes = args.body.oddEven[0].value.session[i].BackSize1;
										}
										eventName = marketName;
										if (eventName) {
											eventName2 = eventName.split(' ').join('_');
										} else {
											eventName2 = marketName
										}
										if (oddsNo == null) {
											oddsNo = "";
										}
										if (oddsYes == null) {
											oddsYes = "";
										}
										check_runsNo_interger = isNaN(runsNo);
										check_oddsNo_interger = isNaN(oddsNo);
										check_runsYes_interger = isNaN(runsYes);
										check_oddsYes_interger = isNaN(oddsYes);
										if (check_runsNo_interger == true) {
											runsNo = 0;
										}
										if (check_oddsNo_interger == true) {
											oddsNo = 0;
										}
										if (check_runsYes_interger == true) {
											runsYes = 0;
										}
										if (check_oddsYes_interger == true) {
											oddsYes = 0;
										}
										marketId = parseInt(marketId);
										n1 = smdlm_c.includes(marketId);
										n2 = mdlm_c.includes(marketId);
										n3 = dlm_c.includes(marketId);
										//if(!n1 && !n2 && !n3){
										if (true) {
											m1 = marketIdArrayOddeven.includes(marketId);
											if (m1) {
												marketIdArrayNewOddeven[counter2] = marketId;
												counter2++;
												if (Remark != "") {
													$("#remakrs_" + marketId).show();
													$("#remakrs_" + marketId).text(Remark);
												}
												if (runsNo == 0) {
													runsNo = "";
													oddsNo = "";
												}
												if (runsYes == 0) {
													runsYes = "";
													oddsYes = "";
												}
												lay_runs_info = "<span class='odd d-block'>" + runsNo + "</span> <span>" + oddsNo + "</span>";
												$("#oddeven_market_lay_btn_" + marketId).attr("event_name", event_name);
												$("#oddeven_market_lay_btn_" + marketId).attr("fullmarketodds", runsNo);
												$("#oddeven_market_lay_btn_" + marketId).attr("selectionid", marketId);
												$("#oddeven_market_lay_btn_" + marketId).attr("runner", marketName);
												$("#oddeven_market_lay_btn_" + marketId).attr("marketname", marketName);
												$("#oddeven_market_lay_btn_" + marketId).attr("eventid", eventId);
												$("#oddeven_market_lay_btn_" + marketId).attr("marketid", marketId);
												$("#oddeven_market_lay_btn_" + marketId).attr("fullfancymarketrate", runsNo);
												$("#oddeven_market_lay_btn_" + marketId).html(lay_runs_info);
												back_runs_info = "<span class='odd d-block'>" + runsYes + "</span> <span>" + oddsYes + "</span>";
												$("#oddeven_market_back_btn_" + marketId).attr("event_name", event_name);
												$("#oddeven_market_back_btn_" + marketId).attr("fullmarketodds", runsYes);
												$("#oddeven_market_back_btn_" + marketId).attr("selectionid", marketId);
												$("#oddeven_market_back_btn_" + marketId).attr("runner", marketName);
												$("#oddeven_market_back_btn_" + marketId).attr("marketname", marketName);
												$("#oddeven_market_back_btn_" + marketId).attr("eventid", eventId);
												$("#oddeven_market_back_btn_" + marketId).attr("marketid", marketId);
												$("#oddeven_market_back_btn_" + marketId).attr("fullfancymarketrate", runsYes);
												$("#oddeven_market_back_btn_" + marketId).html(back_runs_info);
											} else {
												marketIdArrayNewOddeven[counter2] = marketId;
												counter2++;
												odd_attribute = " event_name='" + event_name + "' fullmarketodds='" + runsYes + "' side='Lay' marketid='" + oddsmarketId + "' eventid='" + eventId + "'  selectionid='" + marketId + "' market_odd_name='ODDEVEN_ODDS' runner='" + marketName + "' marketname='" + marketName + "' markettype='FANCY_ODDS' inplay='1' fullfancymarketrate='" + oddsYes + "'";
												even_attribute = " event_name='" + event_name + "' fullmarketodds='" + runsNo + "' side='Lay' marketid='" + oddsmarketId + "' eventid='" + eventId + "' selectionid='" + marketId + "' market_odd_name='ODDEVEN_ODDS' runner='" + marketName + "' marketname='" + marketName + "' markettype='FANCY_ODDS' inplay='1' fullfancymarketrate='" + oddsNo + "'";
												html_oddeven_market_new += "<div id='spc_oddevenBetMarket_" + eventId + "_" + marketId + "'><div id='oddevenBetMarket_" + eventId + "_" + marketId + "'>  <div class='fancy-tripple' >   <div data-title='SUSPENDED' class='table-row suspended oddeven-suspend-tr_" + marketId + "'>    <div class='float-left country-name custbold box-4'>    <span><b>" + marketName + "</b></span> <div class='float-right'> <div class='info-block'> <a data-toggle='collapse' data-target='#min-max-" + marketId + "' aria-expanded='false' class='info-icon collapsed'> <i class='fas fa-info-circle m-l-10'></i> </a> <div id='min-max-" + marketId + "' class='min-max-info collapse'> <span><b>Min:</b> " + min_stack + " </span> <span><b>Max:</b> " + max_stack + " </span> </div> </div> </div> <p class='live_match_points' id='live_match_points_" + marketId + "_FANCY_ODDS'>     <span class='float-left' style='color: black;'></span>    </p>   </div>      <div class='box-1 back float-left text-center back-1' id='oddeven_market_lay_btn_" + marketId + "' " + even_attribute + ">    <button>     <span class='odd d-block'>" + runsYes + "</span>     <span class='d-block'>" + oddsYes + "</span>    </button>   </div><div class='box-1 back float-left text-center lay-1' id='oddeven_market_back_btn_" + marketId + "' " + odd_attribute + ">    <button>     <span class='odd d-block'>" + runsNo + "</span>     <span class='d-block'>" + oddsNo + "</span>    </button>   </div>  </div> </div></div><div class='table-remark text-right remark' style='display:none;' id='remakrs_" + marketId + "'></div></div>";
												lastrunsNo = runsNo;
												lastrunsYes = runsYes;

												if (!last_market_id || !last_event_id) {
													$("#secure_oddeven").after(html_oddeven_market_new);
												}
												else {
													var id_to_place_after = "#spc_oddevenBetMarket_" + last_event_id + "_" + last_market_id;
													$(id_to_place_after).after(html_oddeven_market_new);
												}
											}
										}
									}
									last_market_id = marketId;
									last_event_id = eventId;
								}
								if (html_oddeven_market_new != "") {
									$('#oddeven').find('.fancy-message').hide();
									$("#oddeven_odds_market").show();
								} else { }
								var z = $.grep(marketIdArrayOddeven, function (el) {
									return $.inArray(el, marketIdArrayNewOddeven) == -1
								});
								if (z) {
									for (i = 0; i < z.length; i++) {
										marketId = z[i];
										if ($("#oddevenBetMarket_" + eventId + "_" + marketId).length > 0) {
											document.getElementById("oddevenBetMarket_" + eventId + "_" + marketId).remove();
											$(".oddeven-suspend-tr_" + marketId).remove();
										}
									}
								}
								marketIdArrayOddeven = marketIdArrayNewOddeven;
							}
							//end for
						}
					}
				}
				if (args.body.meter && true) {
					if (args.body.meter[0]) {
						if (args.body.meter[0].value) {
							if (args.body.meter[0].value.session) {
								eventId = $(".event_name_heading").attr("eventid");
								event_name = $(".event_name_heading").attr("event_name");
								counter2 = 0;
								marketIdArrayNewMeter = [];
								//start for
								var body2 = args.body.meter[0].value.session.map(a => {
									let b = {};
									b = a;
									b['SelectionId'] = parseInt(b['SelectionId']);
									return b;
								});
								var last_market_id = 0;
								var last_event_id = 0;
								args.body.meter[0].value.session = _.sortBy(body2, 'DisplayOrder');
								for (i = 0; i < args.body.meter[0].value.session.length; i++) {
									html_meter_market_new = "";
									var eventId = <?php echo $event_id; ?>;
									marketId = args.body.meter[0].value.session[i].SelectionId;
									if (marketId == "" || args.body.meter[0].value.session[i].GameStatus.toUpperCase() == "OFFLINE" || args.body.meter[0].value.session[i].GameStatus.toUpperCase() == "CLOSED") {
										//	if(marketId == ""){
									} else {
										min_stack = args.body.meter[0].value.session[i].Min;
										max_stack = args.body.meter[0].value.session[i].Max;
										marketName = args.body.meter[0].value.session[i].RunnerName;
										Remark = args.body.meter[0].value.session[i].Remark;
										statusLabel = args.body.meter[0].value.session[i].GameStatus;
										if (statusLabel == "") {
											$(".meter-suspend-tr_" + marketId).removeClass("suspended");
										} else if (statusLabel == "BALL_RUN") {
											$(".meter-suspend-tr_" + marketId).addClass("suspended");
										} else if (statusLabel == "SUSPEND") {
											$(".meter-suspend-tr_" + marketId).addClass("suspended");
										} else {
											$(".meter-suspend-tr_" + marketId).addClass("suspended");
										}
										$(".meter-suspend-tr_" + marketId).attr("data-title", statusLabel);
										if (args.body.meter[0].value.session[i] != undefined) {
											runsNo = args.body.meter[0].value.session[i].LayPrice1;
											oddsNo = args.body.meter[0].value.session[i].LaySize1;
											runsYes = args.body.meter[0].value.session[i].BackPrice1;
											oddsYes = args.body.meter[0].value.session[i].BackSize1;
										}
										eventName = marketName;
										eventName2 = eventName.split(' ').join('_');
										if (oddsNo == null) {
											oddsNo = "";
										}
										if (oddsYes == null) {
											oddsYes = "";
										}
										check_runsNo_interger = isNaN(runsNo);
										check_oddsNo_interger = isNaN(oddsNo);
										check_runsYes_interger = isNaN(runsYes);
										check_oddsYes_interger = isNaN(oddsYes);
										if (check_runsNo_interger == true) {
											runsNo = 0;
										}
										if (check_oddsNo_interger == true) {
											oddsNo = 0;
										}
										if (check_runsYes_interger == true) {
											runsYes = 0;
										}
										if (check_oddsYes_interger == true) {
											oddsYes = 0;
										}
										marketId = parseInt(marketId);
										n1 = smdlm_c.includes(marketId);
										n2 = mdlm_c.includes(marketId);
										n3 = dlm_c.includes(marketId);
										//if(!n1 && !n2 && !n3){
										if (true) {
											m1 = marketIdArrayMeter.includes(marketId);
											if (m1) {
												marketIdArrayNewMeter[counter2] = marketId;
												counter2++;
												if (Remark != "") {
													$("#remakrs_" + marketId).show();
													$("#remakrs_" + marketId).text(Remark);
												}
												if (runsNo == 0) {
													runsNo = "";
													oddsNo = "";
												}
												if (runsYes == 0) {
													runsYes = "";
													oddsYes = "";
												}
												lay_runs_info = "<span class='odd d-block'>" + runsNo + "</span> <span>" + oddsNo + "</span>";
												$("#meter_market_lay_btn_" + marketId).attr("event_name", event_name);
												$("#meter_market_lay_btn_" + marketId).attr("fullmarketodds", runsNo);
												$("#meter_market_lay_btn_" + marketId).attr("selectionid", marketId);
												$("#meter_market_lay_btn_" + marketId).attr("runner", marketName);
												$("#meter_market_lay_btn_" + marketId).attr("marketname", marketName);
												$("#meter_market_lay_btn_" + marketId).attr("eventid", eventId);
												$("#meter_market_lay_btn_" + marketId).attr("marketid", marketId);
												$("#meter_market_lay_btn_" + marketId).attr("fullfancymarketrate", oddsNo);
												$("#meter_market_lay_btn_" + marketId).html(lay_runs_info);
												back_runs_info = "<span class='odd d-block'>" + runsYes + "</span> <span>" + oddsYes + "</span>";
												$("#meter_market_back_btn_" + marketId).attr("event_name", event_name);
												$("#meter_market_back_btn_" + marketId).attr("fullmarketodds", runsYes);
												$("#meter_market_back_btn_" + marketId).attr("selectionid", marketId);
												$("#meter_market_back_btn_" + marketId).attr("runner", marketName);
												$("#meter_market_back_btn_" + marketId).attr("marketname", marketName);
												$("#meter_market_back_btn_" + marketId).attr("eventid", eventId);
												$("#meter_market_back_btn_" + marketId).attr("marketid", marketId);
												$("#meter_market_back_btn_" + marketId).attr("fullfancymarketrate", oddsYes);
												$("#meter_market_back_btn_" + marketId).html(back_runs_info);
											} else {
												marketIdArrayNewMeter[counter2] = marketId;
												counter2++;
												back_attribute = " event_name='" + event_name + "' fullmarketodds='" + runsYes + "' side='Lay' marketid='" + oddsmarketId + "' eventid='" + eventId + "'  selectionid='" + marketId + "' market_odd_name='METER_ODDS' runner='" + marketName + "' marketname='" + marketName + "' markettype='METER_ODDS' inplay='1' fullfancymarketrate='" + oddsYes + "'";
												lay_attribute = " event_name='" + event_name + "' fullmarketodds='" + runsNo + "' side='Lay' marketid='" + oddsmarketId + "' eventid='" + eventId + "' selectionid='" + marketId + "' market_odd_name='METER_ODDS' runner='" + marketName + "' marketname='" + marketName + "' markettype='METER_ODDS' inplay='1' fullfancymarketrate='" + oddsNo + "'";
												html_meter_market_new += "<div id='spc_meterBetMarket_" + eventId + "_" + marketId + "'><div id='meterBetMarket_" + eventId + "_" + marketId + "'><div class='fancy-tripple' > <div data-title='SUSPENDED' class='table-row suspended meter-suspend-tr_" + marketId + "'><div class='float-left country-name custbold box-4'><span><b>" + marketName + "</b></span> <div class='float-right'> <div class='info-block'> <a href='javascript:void(0);' data-toggle='collapse' data-target='#min-max-" + marketId + "' aria-expanded='false' class='info-icon collapsed'> <i class='fas fa-info-circle m-l-10'></i> </a> <div id='min-max-" + marketId + "' class='min-max-info collapse'> <span><b>Min:</b> " + min_stack + " </span> <span><b>Max:</b> " + max_stack + " </span> </div> </div> </div> <p class='live_match_points' id='live_match_points_" + marketId + "_METER_ODDS'><span class='float-left' style='color: black;'></span></p></div><div class='box-1 lay float-left text-center lay-1' id='meter_market_lay_btn_" + marketId + "' " + lay_attribute + "><button><span class='odd d-block'>" + runsNo + "</span> <span class='d-block'>" + oddsNo + "</span></button></div><div class='box-1 back float-left text-center back-1' id='meter_market_back_btn_" + marketId + "' " + back_attribute + "><button><span class='odd d-block'>" + runsYes + "</span> <span class='d-block'>" + oddsYes + "</span></button></div></div></div></div><div class='table-remark text-right remark' style='display:none;' id='remakrs_" + marketId + "'></div></div>";
												lastrunsNo = runsNo;
												lastrunsYes = runsYes;
												$("#secure_meter").after(html_meter_market_new);
												if (!last_market_id || !last_event_id) {
													$("#secure_meter").after(html_meter_market_new);
												}
												else {
													var id_to_place_after = "#spc_meterBetMarket_" + last_event_id + "_" + last_market_id;
													$(id_to_place_after).after(html_meter_market_new);
												}
											}
										}
									}
									last_market_id = marketId;
									last_event_id = eventId;
								}
								if (html_meter_market_new != "") {
									$("#meter_odds_market").show();
								} else { }
								var z = $.grep(marketIdArrayMeter, function (el) {
									return $.inArray(el, marketIdArrayNewMeter) == -1
								});
								if (z) {
									for (i = 0; i < z.length; i++) {
										marketId = z[i];
										if ($("#meterBetMarket_" + eventId + "_" + marketId).length > 0) {
											document.getElementById("meterBetMarket_" + eventId + "_" + marketId).remove();
											$(".meter-suspend-tr_" + marketId).remove();
										}
									}
								}
								marketIdArrayMeter = marketIdArrayNewMeter;
							}
							//end for
						}
					}
				}
			}
			if (first_time || callExposure) {
				first_time = false;
				getlive_match_point();
			}
		}
		if (args.body.cricketcasino) {
			if (args.body.cricketcasino[0]) {
				if (args.body.cricketcasino[0].value) {
					if (args.body.cricketcasino[0].value.session) {
						match_odds_numbers_markets = "";
						oddsmarketId = '<? echo $marketId; ?>';
						eventId = $(".event_name_heading").attr("eventid");
						event_name = $(".event_name_heading").attr("event_name");
						$.each(args.body.cricketcasino[0].value.session, function (key, val) {

							market_type_name = val[0].header;
							market_odd_name = market_type_name;
							market_type_name = market_type_name.split(".").join("_");
							market_type_name = market_type_name.split(" ").join("_");
							market_type_name = market_type_name.split("/").join("_");
							market_type_name = market_type_name.split(" ").join("_");
							marketType = market_type_name.toUpperCase();
							market_type_name2 = marketType.toUpperCase();
							market_marketid = market_type_name2;
							min_stack = val[0].Min;
							max_stack1 = val[0].Max;
							if (max_stack1 >= 100000) {
								max_stack = (max_stack1 / 100000) + 'L';
							} else {
								max_stack = max_stack1;
							}
							match_odds_numbers_markets += `<div class="fancy-market-number">
												<div class='market-title mt-1'>${market_odd_name}</div>
													<div class="table-header">
														<div class="market-title1 float-left country-name box-8">Min: ${min_stack} Max: ${max_stack}<!-- <span>Khado</span>
															<p class="float-right mb-0"><i class="fas fa-info-circle"></i></p> -->
														</div>
														<div class="back box-1 float-left back text-center lablesize"><b>Back</b></div>
														<!-- <div class="box-1 float-left lay text-center lablesize"><b>Lay</b></div> -->
													</div>
													<div class="table-body">`;
							match_odds_numbers_markets += "<div class='table-body' id='match_odds_numbers_market_" + key + "'>";

							var xc = 0;
							for (z = 0; z < args.body.cricketcasino[0].value.session[key].length; z++) {




								var bookmaker1_tied_data = args.body.cricketcasino[0].value.session[key][z];
								selectionId = bookmaker1_tied_data['SelectionId'];

								runnerName = bookmaker1_tied_data['RunnerName'];
								marketName = runnerName;
								bet_suspended = bookmaker1_tied_data['Active'];
								var other_fancy = "other";
								marketId = bookmaker1_tied_data['SelectionId'];

								marketType = "CRICKET_CASINO_ODDS";
								if (args.body.cricketcasino[0].value.session[key][z].BackPrice1) {
									cricketcasino_back_rate = args.body.cricketcasino[0].value.session[key][z].BackPrice1 || "";
								} else {
									cricketcasino_back_rate = "";
								}

								if (args.body.cricketcasino[0].value.session[key][z].BackSize1) {
									cricketcasino_back_size = args.body.cricketcasino[0].value.session[key][z].BackSize1 || 0;
								} else {
									cricketcasino_back_size = 0;
								}
								cricketcasino_back_size = parseFloat(cricketcasino_back_size) >= 1000 ? parseInt(parseInt(cricketcasino_back_size) / 1000) + "K" : cricketcasino_back_size;


								var cricketcasino_suspended = '';
								if (bet_suspended == "Suspended") {
									cricketcasino_suspended = 'suspended';
								}
								selectorIdCasinoArray.push(marketId + "_" + market_marketid);
								common_key = marketId + "_" + market_marketid;

								var exposure = "";
								var classexpo = "";
								if ($("#live_match_points_" + common_key).length) {

									exposure = $("#live_match_points_" + common_key).html();
									if (exposure > 0) {

										classexpo = "color : green";
										$("#live_match_points_" + common_key).css('color', 'green');
									} else if (exposure < 0) {
										classexpo = "color:red";
										$("#live_match_points_" + common_key).css('color', 'red');
									}
								}

								/* if ($("#cricketcasino_back_btn_"+common_key).length > 0) {
									back_runs_info = "<span class='odd d-block'>" + cricketcasino_back_rate + "</span> <span>" + cricketcasino_back_size + "</span>";
									$("#cricketcasino_back_btn_" + common_key).attr("event_name", event_name);
									$("#khado_market_back_btn_" + common_key).attr("fullmarketodds", cricketcasino_back_rate);
									$("#khado_market_back_btn_" + common_key).attr("selectionid", common_key);
									$("#khado_market_back_btn_" + common_key).attr("runner", runnerName);
									$("#khado_market_back_btn_" + common_key).attr("marketname", runnerName);
									$("#khado_market_back_btn_" + common_key).attr("eventId", eventId);
									$("#khado_market_back_btn_" + common_key).attr("marketId", common_key);
									$("#khado_market_back_btn_" + common_key).attr("fullfancymarketrate", cricketcasino_back_rate);
									$("#khado_market_back_btn_" + common_key).html(back_runs_info);
								}else{ */
								match_odds_numbers_markets += `<div id='cricketcasino_${eventId}_${common_key}'>
												<div class='fancy-tripple' > 
													<div data-title='${bet_suspended}' class='table-row ${cricketcasino_suspended} cricketcasino-suspend-tr_${common_key}'>
														<div class='float-left country-name custbold box-8'><span><b>${marketName}</b></span> 
															<div class='float-right'> 
																
															</div> 
															<p class='live_match_points' id='live_match_points_${common_key}' style="${classexpo}">
										${exposure}
															</p>
															</div>
															<div class='box-1 back float-left text-center back-1' id='cricketcasino_back_btn_${common_key}' side='Back'  selectionid='${selectionId}' runner='${marketName}' marketname='${marketName}' markettype='${market_marketid}' fullmarketodds='${cricketcasino_back_rate}'  oddsmarketId=${oddsmarketId} event_name='${marketName}' market_odd_name='${market_odd_name}' marketId='${selectionId}' eventId='${eventId}' other_fancy='${other_fancy}'>
																<button><span class='odd d-block'>${cricketcasino_back_rate}</span> <span class='d-block'>${cricketcasino_back_size}</span>
																</button>
															</div>
														</div>
													</div>
												`;
								/* } */



							}
							match_odds_numbers_markets += "</div></div><div></div></div>";
						});

						if (match_odds_numbers_markets != "" && Object.keys(args.body.cricketcasino[0].value.session).length > 0) {
							$("#match_odds_numbers_markets").css('display', 'block');
							$("#match_odds_numbers_markets").html(match_odds_numbers_markets);
						}
					}
					//end for
				}
			}
		}
	});

	$(function () {

		$("#open_back_place_bet").on("hidden.bs.modal", function () {
			getlive_match_point();
		});
	});

	function getlive_match_point() {
		callExposure = false;
		var added_team_1;
		var added_team_2;
		var added_team_3;
		var eventId = <?php echo $event_id; ?>;
		$.ajax({
			type: 'POST',
			url: '../ajaxfiles/get_live_match_points_v2.php',
			dataType: 'json',
			data: {
				eventId: eventId,
				market_ids: selectorIdArray
			},
			success: function (response) {

				var status = response.status;
				$(".live_match_points").text("");
				$(".live_match_points").css('color', 'black');
				if (status == 'ok') {
					if (response.data) {
						//if(response.data == "MATCH_ODDS" ){
						if (!response.data['MATCH_ODDS']) {
							var ij = 0;
							while (selectorIdArray[ij]) {
								$("#live_match_points_" + selectorIdArray[ij] + "_MATCH_ODDS").text("");
								$("#live_match_points_" + selectorIdArray[ij] + "_MATCH_ODDS").css('color', 'black');
								ij++;
							}
							var ij = 0;
							while (selectorIdCasinoArray[ij]) {
								$("#live_match_points_" + selectorIdCasinoArray[ij]).text("");
								$("#live_match_points_" + selectorIdCasinoArray[ij]).css('color', 'black');
								ij++;
							}

							var ij = 0;
							while (selectorIdBookmakerArray[ij]) {
								$("#live_match_points_" + selectorIdBookmakerArray[ij] + "_BOOKMAKER_ODDS").text("");
								$("#live_match_points_" + selectorIdBookmakerArray[ij] + "_BOOKMAKER_ODDS").css('color', 'black');
								$("#live_match_points_" + selectorIdBookmakerArray[ij] + "_BOOKMAKERSMALL_ODDS").text("");
								$("#live_match_points_" + selectorIdBookmakerArray[ij] + "_BOOKMAKERSMALL_ODDS").css('color', 'black');
								ij++;
							}
							var ij = 0;
							while (selectorIdBookmakerTiedArray[ij]) {
								$("#live_match_points_" + selectorIdBookmakerTiedArray[ij] + "_BOOKMAKER_TIED_ODDS").text("");
								$("#live_match_points_" + selectorIdBookmakerTiedArray[ij] + "_BOOKMAKER_TIED_ODDS").css('color', 'black');
								ij++;
							}
						}
						for (var i in response.data) {
							if (i == "BOOKMAKER_ODDS" || i == "BOOKMAKER_TIED_ODDS") {
								for (var ij = 1; ij <= Object.keys(response.data[i].market_ids).length; ij++) {
									$('#bookmaker_odds').prop('disabled', false);
									var team = "team_" + ij;
									var market_1 = parseInt(response.data[i].market_ids[team]);
									var team_1_exposure = parseInt(response.data[i].exposure[team]);
									$("#live_match_points_" + market_1 + "_" + i).text(team_1_exposure);
									if (team_1_exposure >= 0) {
										$("#live_match_points_" + market_1 + "_" + i).css('color', 'green');
									} else {
										$("#live_match_points_" + market_1 + "_" + i).css('color', 'red');
									}
									display_cashProfit[i][market_1]['exposure'] = team_1_exposure;

								}
							} else if (i != "FANCY_ODDS" && i != "METER_ODDS" && i != "KHADO_ODDS") {

								var market_1 = parseInt(response.data[i].market_ids.team_1);
								var market_2 = parseInt(response.data[i].market_ids.team_2);
								var market_3 = parseInt(response.data[i].market_ids.team_3);
								var team_1_exposure = parseInt(response.data[i].exposure.team_1);
								var team_2_exposure = parseInt(response.data[i].exposure.team_2);
								var team_3_exposure = parseInt(response.data[i].exposure.team_3);
								added_team_1 = selectorIdArray[0];
								added_team_2 = selectorIdArray[1];
								if (selectorIdArray[2]) {
									added_team_3 = selectorIdArray[2];
								}
								if (market_1 == NaN && market_2 == NaN && market_3 == NaN) {
									$("#live_match_points_" + added_team_3 + "_" + i).text("");
									$("#live_match_points_" + added_team_2 + "_" + i).text("");
									$("#live_match_points_" + added_team_1 + "_" + i).text("");
								}
								$("#live_match_points_" + market_1 + "_" + i).text(team_1_exposure);
								if (team_1_exposure >= 0) {
									$("#live_match_points_" + market_1 + "_" + i).css('color', 'green');
								} else {
									$("#live_match_points_" + market_1 + "_" + i).css('color', 'red');
								}
								$("#live_match_points_" + market_2 + "_" + i).text(team_2_exposure);
								if (team_2_exposure >= 0) {
									$("#live_match_points_" + market_2 + "_" + i).css('color', 'green');
								} else {
									$("#live_match_points_" + market_2 + "_" + i).css('color', 'red');
								}
								$("#live_match_points_" + market_3 + "_" + i).text(team_3_exposure);
								if (team_3_exposure >= 0) {
									$("#live_match_points_" + market_3 + "_" + i).css('color', 'green');
								} else {
									$("#live_match_points_" + market_3 + "_" + i).css('color', 'red');
								}
								for (j in response.data[i]) {

									var fancy_market_idsnew = response.data[i].market_ids;
									$.each(fancy_market_idsnew, function (key, val) {


										var fancy_market_ids = $.trim(val);
										var fancy_exposure = response.data[i].exposure[key];
										if (fancy_exposure > 0) {
											$(`#live_match_points_${fancy_market_ids}_${i}`).css('color', 'green');
										} else {
											$(`#live_match_points_${fancy_market_ids}_${i}`).css('color', 'red');
										}
										$(`#live_match_points_${fancy_market_ids}_${i}`).html(fancy_exposure);
										$(`#live_match_points_${fancy_market_ids}_${i}`).show();
									});



								}
							} else {

								for (j in response.data[i]) {
									var fancy_market_ids = response.data[i][j].market_ids.team_1;
									var fancy_exposure = response.data[i][j].exposure.team_1;
									if (fancy_exposure > 0) {
										$("#live_match_points_" + fancy_market_ids + "_" + i).css('color', 'green');
									} else {
										$("#live_match_points_" + fancy_market_ids + "_" + i).css('color', 'red');
									}
									$("#live_match_points_" + fancy_market_ids + "_" + i).text(fancy_exposure);
									$("#live_match_points_" + fancy_market_ids + "_" + i).show();
								}
							}
						}

					}
				}
			}
		});
	}
</script>


<script>
	var home_team_serving_true = '<span class="serviceoff">&nbsp;</span>';
	var away_team_serving_true = '<span class="serviceoff">&nbsp;</span>';
	if (iframe_score_url != null && iframe_score_url != "") {
		$("#scoreboard-box").html('<iframe id="iframe-tracker-1" width="100%" height="230px" src="' + iframe_score_url + '" style="overflow: hidden; border: 0px; height: 230px;" class="visible"></iframe>');
	} else {
		socket.on('liveScore', function (args) {



			if (args && args.data) {
				<?php
				if ($eventType == 4) {
					?>
					updateScoreBoard(args.data);
					<?php
				}
				?>
			} else if (args && args.score) {
				<?php
				if ($eventType == 1) {
					?>
					if (args.score.home) {
						if (args.score.home.name) {
							home_team_name = args.score.home.name;
							home_team_score = args.score.home.score;
							home_team_numberOfYellowCards = args.score.home.numberOfYellowCards;
							home_team_numberOfRedCards = args.score.home.numberOfRedCards;
							home_team_numberOfCorners = args.score.home.numberOfCorners;

						}
					}

					if (args.score.away) {
						if (args.score.away.name) {
							away_team_name = args.score.away.name;


							away_team_score = args.score.away.score;
							away_team_numberOfYellowCards = args.score.away.numberOfYellowCards;
							away_team_numberOfRedCards = args.score.away.numberOfRedCards;
							away_team_numberOfCorners = args.score.away.numberOfCorners;


						}
					}





					soccer_timeElapsed = 0;
					if (args && args.timeElapsed) {
						soccer_timeElapsed = args.timeElapsed;
					}

					if (eventName2) {
						html_score_card = "<div class='table-container table-responsive' style='margin:0px'>" +
							"	<div class='' style='width:100%'>" +
							"	  <div class='col-sm-12' style='color:#FFFFFF;' id='footballScoreBoard'>" +
							"		 <table style='width:100%'>" +
							"			<tbody>" +
							"			   <tr>" +
							"				  <td style='text-align:center'><span class='badge badge-score' style='background-color:#55c331;padding:8px;'>LIVE</span></td>" +
							"			   </tr>" +
							"			   <tr>" +
							"				  <td style='text-align:center;color:#fff;font-size:17px;'>" +
							"					 <p class='mtitle'><img src='/images/football_new.png?12' width='30' height='30'> " + eventName2 + "</p>" +
							"				  </td>" +
							"			   </tr>" +
							"			   <tr>" +
							"				  <td style='text-align:center;color:#fff;font-size:17px;'>" +
							"					 <table style='width:100%;border-radius:20px;'>" +
							"						<thead>" +
							"						   <tr>" +
							"							  <th style='text-align:center;font-size:12px;'>&nbsp;</th>" +
							"							  <th style='text-align:center;font-size:12px;'>&nbsp;</th>" +
							"							  <th style='text-align:center;font-size:12px;'><span class='badge badge-score' style='background-color:yellow;width:20px;height:20px;'> </span></th>" +
							"							  <th style='text-align:center;font-size:12px;'><span class='badge badge-score' style='background-color:red;width:20px;height:20px;'> </span></th>" +
							"							  <th style='text-align:center;font-size:12px;'><img src='/images/football_new.png?1' width='15' height='15'></th>" +
							"							  <th style='text-align:center;font-size:12px;'><img src='/images/football_new.png?1' width='15' height='15'></th>" +
							"						   </tr>" +
							"						</thead>" +
							"						<tbody class='text-center'>" +
							"						   <tr style='background:#ffc722 !important;border-radius:20px;'>" +
							"							  <td style='text-align:left;font-size:14px;height:30px;padding:5px;color:#000'>" + home_team_name + "</td>" +
							"							  <td style='text-align:center;font-size:12px;color:#000'>" + home_team_score + "</td>" +
							"							  <td style='text-align:center;font-size:12px;color:#000'>" + home_team_numberOfYellowCards + "</td>" +
							"							  <td style='text-align:center;font-size:12px;color:#000'>" + home_team_numberOfRedCards + "</td>" +
							"							  <td style='text-align:center;font-size:12px;color:#000'>" + home_team_numberOfCorners + "</td>" +
							"							  <td style='text-align:center;font-size:12px;color:#000'>0-0</td>" +
							"						   </tr>" +
							"						   <tr style='background:#ffc722 !important;border-top:1px solid #000;'>" +
							"							  <td style='text-align:left;font-size:14px;height:30px;padding:5px;color:#000'>" + away_team_name + "</td>" +
							"							  <td style='text-align:center;font-size:12px;color:#000'>" + away_team_score + "</td>" +
							"							  <td style='text-align:center;font-size:12px;color:#000'>" + away_team_numberOfYellowCards + "</td>" +
							"							  <td style='text-align:center;font-size:12px;color:#000'>" + away_team_numberOfRedCards + "</td>" +
							"							  <td style='text-align:center;font-size:12px;color:#000'>" + away_team_numberOfCorners + "</td>" +
							"							  <td style='text-align:center;font-size:12px;color:#000'></td>" +
							"						   </tr>" +
							"					</tbody>" +
							"					 </table>" +
							"				  </td>" +
							"			   </tr>" +
							"			</tbody>" +
							"		 </table>" +
							"	  </div>" +
							"  </div>" +
							"</div>";
						$("#scoreboard-box").html(html_score_card);
					}

					<?php
				} else if ($eventType == 2) {
					?>

						if (args.score.home) {
							if (args.score.home.name) {
								home_team_name = args.score.home.name;
								home_team_score = args.score.home.score;
								home_team_halfTimeScore = args.score.home.halfTimeScore;
								if (home_team_halfTimeScore == "") {
									home_team_halfTimeScore = 0;
								}


								home_team_gameSequence = "";
								home_team_gameSequence2 = "";
								home_team_gameSequence3 = "";

								home_gameSequenceLength = args.score.home.gameSequence.length;
								if (home_gameSequenceLength >= 2) {
									home_team_gameSequence = args.score.home.gameSequence[home_gameSequenceLength - 2];
									home_team_gameSequence2 = args.score.home.gameSequence[home_gameSequenceLength - 1];
									home_team_gameSequence3 = args.score.home.games;
								} else if (home_gameSequenceLength == 1) {
									home_team_gameSequence = args.score.home.gameSequence[home_gameSequenceLength - 1];
									home_team_gameSequence2 = args.score.home.games;
									home_team_gameSequence3 = "-";
								} else {
									home_team_gameSequence = args.score.home.games;
									home_team_gameSequence2 = "-";
									home_team_gameSequence3 = "-";
								}


								home_team_fullTimeScore = args.score.home.fullTimeScore;
								home_team_penaltiesScore = args.score.home.penaltiesScore;
								home_team_sets = args.score.home.sets;
								home_team_games = args.score.home.games;
								home_team_isServing = args.score.home.isServing;

								if (home_team_isServing == true) {
									home_team_serving_true = '<span class="serviceon"><img data-src="/images/tennis_ball_1.png" width="20" height="20"></span>';
								} else {
									home_team_serving_true = '<span class="serviceoff">&nbsp;</span>';
								}



							}
						}

						if (args.score.away) {
							if (args.score.away.name) {
								away_team_name = args.score.away.name;

								away_team_score = args.score.away.score;
								away_team_halfTimeScore = args.score.away.halfTimeScore;
								if (away_team_halfTimeScore == "") {
									away_team_halfTimeScore = 0;
								}


								away_team_gameSequence = "";
								away_team_gameSequence2 = "";
								away_team_gameSequence3 = "";

								away_gameSequenceLength = args.score.away.gameSequence.length;
								if (away_gameSequenceLength >= 2) {
									away_team_gameSequence = args.score.away.gameSequence[away_gameSequenceLength - 2];
									away_team_gameSequence2 = args.score.away.gameSequence[away_gameSequenceLength - 1];
									away_team_gameSequence3 = args.score.away.games;
								} else if (away_gameSequenceLength == 1) {
									away_team_gameSequence = args.score.away.gameSequence[away_gameSequenceLength - 1];
									away_team_gameSequence2 = args.score.away.games;
									away_team_gameSequence3 = "-";
								} else {
									away_team_gameSequence = args.score.away.games;
									away_team_gameSequence2 = "-";
									away_team_gameSequence3 = "-";
								}


								away_team_fullTimeScore = args.score.away.fullTimeScore;
								away_team_penaltiesScore = args.score.away.penaltiesScore;
								away_team_sets = args.score.away.sets;
								away_team_games = args.score.away.games;

								away_team_isServing = args.score.away.isServing;

								if (away_team_isServing == true) {
									away_team_serving_true = '<span class="serviceon"><img data-src="/images/tennis_ball_1.png" width="20" height="20"></span>';
								} else {
									away_team_serving_true = '<span class="serviceoff">&nbsp;</span>';
								}

							}
						}

						currentSet = "";
						if (args.currentSet) {
							currentSet = args.currentSet;
						}

						currentGame = "";
						if (args.currentGame) {
							currentGame = args.currentGame;
						}

						var fullTimeShowMix = "";
						if (args.fullTimeElapsed) {
							if (args.fullTimeElapsed.hour && args.fullTimeElapsed.min && args.fullTimeElapsed.sec) {

								fullTimeHours = args.fullTimeElapsed.hour;
								fullTimeMin = args.fullTimeElapsed.min;
								fullTimeSec = args.fullTimeElapsed.sec;

								fullTimeShowMix = fullTimeHours + ":" + fullTimeMin + ":" + fullTimeSec;

							}

						}

						html_score_card = "<div class='table-container table-responsive' style='margin:0px'>" +
							"<div class='' style='width:100%'>" +
							"  <div class='col-sm-12' style='color:#FFFFFF;' id=''>" +
							"	 <table style='width:100%'>" +
							"		<tbody>" +
							"		   <tr>" +
							"			  <td style='text-align:center'><span class='badge badge-score' style='background-color:#55c331;padding:8px;'>LIVE</span></td>" +
							"		   </tr>" +
							"		   <tr>" +
							"			  <td style='text-align:center'>" +
							"				 <table style='width:100%'>" +
							"					<thead>" +
							"					   <tr>" +
							"						  <th></th>" +
							"						  <th width='16%' style='text-align:center;font-size:12px;'>1</th>" +
							"						  <th width='16%' style='text-align:center;font-size:12px;'>2</th>" +
							"						  <th width='16%' style='text-align:center;font-size:12px;'>3</th>" +
							"						  <th style='text-align:center;font-size:12px;width:16%'>Sets</th>" +
							"						  <th style='text-align:center;font-size:12px;width:16%'>Points</th>" +
							"					   </tr>" +
							"					</thead>" +
							"				<tbody>" +
							"					   <tr style='background:#ffc722 !important;color:#000;font-weight:bold;'>" +
							"						  <td style='text-align:left;font-size:12px;height:40px;padding:5px;'>" + home_team_serving_true + "" + home_team_name + "</td>" +
							"						  <td width='16%' style='text-align:center;font-size:12px;'>" + home_team_gameSequence + "</td>" +
							"						  <td width='16%' style='text-align:center;font-size:12px;'>" + home_team_gameSequence2 + "</td>" +
							"						  <td width='16%' style='text-align:center;font-size:12px;'>" + home_team_gameSequence3 + "</td>" +
							"						  <td style='text-align:center;font-size:12px;'>" + home_team_sets + "</td>" +
							"						  <td style='text-align:center;font-size:12px;'>" + home_team_score + "</td>" +
							"					   </tr>" +
							"					   <tr style='background:#ffc722 !important;border-top:1px solid #000;color:#000;font-weight:bold;'>" +
							"						  <td style='text-align:left;font-size:12px;height:40px;padding:5px;'>" + away_team_serving_true + "" + away_team_name + "</td>" +
							"						  <td width='16%' style='text-align:center;font-size:12px;'>" + away_team_gameSequence + "</td>" +
							"						  <td width='16%' style='text-align:center;font-size:12px;'>" + away_team_gameSequence2 + "</td>" +
							"						  <td width='16%' style='text-align:center;font-size:12px;'>" + away_team_gameSequence3 + "</td>" +
							"						  <td style='text-align:center;font-size:12px;'>" + away_team_sets + "</td>" +
							"						  <td style='text-align:center;font-size:12px;'>" + away_team_score + "</td>" +
							"					   </tr>" +
							"					</tbody>" +
							"				 </table>" +
							"			  </td>" +
							"		   </tr>" +
							"		</tbody>" +
							"	 </table>" +
							" </div>" +
							"</div>" +
							"</div>";


						$("#scoreboard-box").html(html_score_card);


					<?php
				}
				?>


			}
		});
	}
</script>

<script>
	jQuery(document).on("click", ".back-1", function () {
		$("#popup_color").removeClass("back");
		$("#popup_color").removeClass("lay");
		$("#popup_color").addClass("back");
		$(".clear_exposure").text('');
		$(".clear_exposure").css("color", "#000000");
		var fullmarketodds = $(this).attr("fullmarketodds");
		if (fullmarketodds != "") {
			side = $(this).attr("side");
			selectionid = $(this).attr("selectionid");
			market_odd_name = $(this).attr("markettype");

			$("#back_match_odds_data").hide();
			$("#back_bookmaker_data").hide();
			$("#back_bookmaker_tied_data").hide();
			$("#back_sm_bookmaker_data").hide();

			if (market_odd_name == "MATCH_ODDS") {
				$("#back_match_odds_data").show();
				$(".commonblock").hide();
				$(".div_" + market_odd_name).show();
			} else if (market_odd_name == "BOOKMAKER_ODDS") {
				$("#back_bookmaker_data").show();
			} else if (market_odd_name == "BOOKMAKER_TIED_ODDS") {
				$("#back_bookmaker_tied_data").show();
			} else if (market_odd_name == "BOOKMAKERSMALL_ODDS") {
				$("#back_sm_bookmaker_data").show();
			} else {
				$("#back_match_odds_data").show();
				$(".commonblock").hide();
				$(".div_" + market_odd_name).show();
			}


			if (['ODDEVEN_ODDS', 'FANCY1_ODDS', 'BALL_ODDS', 'METER_ODDS', 'KHADO_ODDS'].includes($(this).attr("market_odd_name")))
				market_odd_name = $(this).attr("market_odd_name");

			runner = $(this).attr("runner");
			market_runner_name = runner;
			marketname = $(this).attr("marketname");
			markettype = $(this).attr("markettype");
			fullfancymarketrate = $(this).attr("fullfancymarketrate");
			other_fancy = "";
			if (this.hasAttribute('other_fancy')) {
				other_fancy = $(this).attr("other_fancy");
			}
			odds_change_value = "disabled";
			runs_lable = 'Runs';
			runs_lable = 'Odds';
			fullfancymarketrate = fullmarketodds;
			eventId = '<?php echo $event_id; ?>'; //$(this).attr("eventid");
			marketId = $(this).attr("marketid");
			event_name = $(this).attr("event_name");
			$(".select").removeClass("select");
			$(this).addClass("select");
			return_html = "";
			winnig_zone = 0;
			if (markettype == "KHADO_ODDS") {
				winnig_zone = $(this).attr("winnig_zone");
				$("#profitLiability").text(winnig_zone);
			}
			$("#inputStake").val();
			$("#market_runner_label").text(market_runner_name);
			$("#bet_stake_side").val("Back");
			$("#odds_val").val(fullmarketodds);
			$("#bet_event_id").val(eventId);
			$("#bet_marketId").val(marketId);
			$("#bet_event_name").val(event_name);
			$("#bet_market_name").val(marketname);
			$("#bet_markettype").val(markettype);
			$("#fullfancymarketrate").val(fullfancymarketrate);
			$("#other_fancy").val(other_fancy);
			$("#oddsmarketId").val(marketId);
			$("#market_runner_name").val(market_runner_name);
			$("#market_odd_name").val(market_odd_name);
			//$('.modal').show();
			$('#open_back_place_bet').modal("show");
		}
	});

	jQuery(document).on("click", ".lay-1", function () {
		$("#popup_color").removeClass("back");
		$("#popup_color").removeClass("lay");
		$("#popup_color").addClass("lay");
		$(".clear_exposure").text('');
		$(".clear_exposure").css("color", "#000000");
		var fullmarketodds = $(this).attr("fullmarketodds");
		if (fullmarketodds != "") {
			side = $(this).attr("side");
			selectionid = $(this).attr("selectionid");
			market_odd_name = $(this).attr("markettype");
			$("#back_match_odds_data").hide();
			$("#back_bookmaker_data").hide();
			$("#back_bookmaker_tied_data").hide();
			$("#back_sm_bookmaker_data").hide();

			if (market_odd_name == "MATCH_ODDS") {
				$("#back_match_odds_data").show();
				$(".commonblock").hide();
				$(".div_" + market_odd_name).show();
			} else if (market_odd_name == "BOOKMAKER_ODDS") {
				$("#back_bookmaker_data").show();
			} else if (market_odd_name == "BOOKMAKER_TIED_ODDS") {
				$("#back_bookmaker_tied_data").show();
			} else if (market_odd_name == "BOOKMAKERSMALL_ODDS") {
				$("#back_sm_bookmaker_data").show();
			} else {
				$("#back_match_odds_data").show();
				$(".commonblock").hide();
				$(".div_" + market_odd_name).show();
			}

			if (['ODDEVEN_ODDS', 'FANCY1_ODDS', 'BALL_ODDS', 'METER_ODDS', 'KHADO_ODDS'].includes($(this).attr("market_odd_name")))
				market_odd_name = $(this).attr("market_odd_name");

			runner = $(this).attr("runner");
			market_runner_name = runner;
			marketname = $(this).attr("marketname");
			markettype = $(this).attr("markettype");
			fullfancymarketrate = $(this).attr("fullfancymarketrate");
			other_fancy = "";
			if (this.hasAttribute('other_fancy')) {
				other_fancy = $(this).attr("other_fancy");
			}
			runs_lable = 'Runs';
			odds_change_value = "disabled";
			if (markettype != 'FANCY_ODDS') {
				odds_change_value = "";
				runs_lable = 'Odds';
				fullfancymarketrate = fullmarketodds;
			}
			eventId = '<?php echo $event_id; ?>'; //$(this).attr("eventid");
			marketId = $(this).attr("marketid");
			event_name = $(this).attr("event_name");
			$(".select").removeClass("select");
			$(this).addClass("select");
			return_html = "";

			$("#inputStake").val();
			$("#market_runner_label").text(market_runner_name);
			$("#bet_stake_side").val("Lay");
			$("#odds_val").val(fullmarketodds);
			$("#bet_event_id").val(eventId);
			$("#bet_marketId").val(marketId);
			$("#bet_event_name").val(event_name);
			$("#bet_market_name").val(marketname);
			$("#bet_markettype").val(markettype);
			$("#fullfancymarketrate").val(fullfancymarketrate);
			$("#other_fancy").val(other_fancy);
			$("#oddsmarketId").val(marketId);
			$("#market_runner_name").val(market_runner_name);
			$("#market_odd_name").val(market_odd_name);
			//$('.modal').show();			
			$('#open_back_place_bet').modal("show");
		}
	});

	console.log("display_cashProfit=", display_cashProfit);
	// 1. Calculate cashout value (guaranteed P/L)
	function getCashoutBet(pA, pB, marketA, marketB,mtypeNew) {
		// marketA = { back: x, lay: y }
		// marketB = { back: x, lay: y }

		const target = (pA + pB) / 2;

		let team, currentProfit, market;

		// 1. Pick weaker side
		if (pA < pB) {
			team = marketA.selectionId;
			currentProfit = pA;
			market = marketA;
		} else if (pB < pA) {
			team = marketB.selectionId;
			currentProfit = pB;
			market = marketB;
		} else {
			return {
				message: "Already balanced",
				targetProfit: target
			};
		}

		// 2. Decide action
		const needIncrease = target > currentProfit;
		const action = needIncrease ? "Back" : "Lay";

		// 3. Pick correct odds
		const odds = needIncrease ? market.back : market.lay;

		if (!odds || isNaN(odds) || odds <= 1 || odds == "-") {
		return {
			error: "You are not eligible for cashout!",
			
		};
	}

		var oddcal=odds;
		if (mtypeNew == "BOOKMAKER_ODDS" || mtypeNew == "BOOKMAKER_TIED_ODDS" || mtypeNew == "BOOKMAKERSMALL_ODDS" || mtypeNew.indexOf('BM_') !== -1) {
					oddcal = (oddcal / 100) + 1;
				}
		// 4. Calculate stake
		const diff = Math.abs(target - currentProfit);
		const stake = diff / (oddcal - 1);

		return {
			team,
			action,
			odds,
			stake,
			targetProfit: target
		};
	}


	/* const result = getCashoutBet(
			-100, // RCB
			50,   // Delhi
			{ back: 1.67, lay: 1.62 }, // RCB odds
			{ back: 2.60, lay: 2.48 }  // Delhi odds
		); */



	jQuery(document).on("click", ".cashoutClick", function () {
		/* console.log("in"); */
		//const profits = [-100, 50]; 
		var market_typeee = $(this).attr('markettype');
		console.log("sdsafc=", market_typeee);
		console.log("display_cashProfit=", JSON.stringify(display_cashProfit[market_typeee]));

		const results = [];

		const ids = Object.keys(display_cashProfit[market_typeee]);
		console.log("ids=", ids);
		// assuming 2 selections (like A vs B)
		if (ids.length === 2) {
			const idA = ids[0];
			const idB = ids[1];
			console.log("idA=", idA);
			const A = display_cashProfit[market_typeee][idA];
			console.log("A=", A);
			const B = display_cashProfit[market_typeee][idB];
			
			const result = getCashoutBet(
				A.exposure,
				B.exposure,
				{ back: A.back_1, lay: A.lay_1, selectionId: idA },
				{ back: B.back_1, lay: B.lay_1, selectionId: idB },market_typeee
			);

			if (result.error) {
				console.log("Error:", result.error);
				toastr.clear()
					toastr.warning(result.error,"", {
						"timeOut": "3000",
						"iconClass": "toast-warning",
						"positionClass": "toast-top-center",
						"extendedTImeout": "0"
					});
				return;
			}

			results.push(result);
			
			if (result.action === "Back") {
			$("#popup_color").removeClass("back");
			$("#popup_color").removeClass("lay");
			$("#popup_color").addClass("back");
			} else if (result.action === "Lay") {
				$("#popup_color").removeClass("back");
				$("#popup_color").removeClass("lay");
				$("#popup_color").addClass("lay");
			}

		$(".clear_exposure").text('');
		$(".clear_exposure").css("color", "#000000");
		var fullmarketodds = result.odds;
		if (fullmarketodds != "") {
			selectionid = result.team;
			market_odd_name =market_typeee;

			$("#back_match_odds_data").hide();
			$("#back_bookmaker_data").hide();
			$("#back_bookmaker_tied_data").hide();
			$("#back_sm_bookmaker_data").hide();

			if (market_odd_name == "MATCH_ODDS") {
				$("#back_match_odds_data").show();
				$(".commonblock").hide();
				$(".div_" + market_odd_name).show();
			} else if (market_odd_name == "BOOKMAKER_ODDS") {
				$("#back_bookmaker_data").show();
			} else if (market_odd_name == "BOOKMAKER_TIED_ODDS") {
				$("#back_bookmaker_tied_data").show();
			} else if (market_odd_name == "BOOKMAKERSMALL_ODDS") {
				$("#back_sm_bookmaker_data").show();
			} else {
				$("#back_match_odds_data").show();
				$(".commonblock").hide();
				$(".div_" + market_odd_name).show();
			}
			if (['ODDEVEN_ODDS', 'FANCY1_ODDS', 'BALL_ODDS', 'METER_ODDS', 'KHADO_ODDS'].includes($(this).attr("market_odd_name")))
				market_odd_name = $(this).attr("market_odd_name");

			runner = $(this).attr("runner");
			market_runner_name = runner;
			marketname = $(this).attr("marketname");
			markettype = $(this).attr("markettype");
			fullfancymarketrate = $(this).attr("fullfancymarketrate");
			other_fancy = "";
			if (this.hasAttribute('other_fancy')) {
				other_fancy = $(this).attr("other_fancy");
			}
			odds_change_value = "disabled";
			runs_lable = 'Runs';
			runs_lable = 'Odds';
			fullfancymarketrate = fullmarketodds;
			eventId = '<?php echo $event_id; ?>'; //$(this).attr("eventid");
			marketId = $(this).attr("marketid");
			event_name = $(this).attr("event_name");
			$(".select").removeClass("select");
			$(this).addClass("select");
			return_html = "";
			winnig_zone = 0;
			if (markettype == "KHADO_ODDS") {
				winnig_zone = $(this).attr("winnig_zone");
				$("#profitLiability").text(winnig_zone);
			}
			
			$("#market_runner_label").text(market_runner_name);
			$("#bet_stake_side").val(result.action);
			$("#odds_val").val(fullmarketodds);
			$("#bet_event_id").val(eventId);
			$("#bet_marketId").val(marketId);
			$("#bet_event_name").val(event_name);
			$("#bet_market_name").val(marketname);
			$("#bet_markettype").val(markettype);
			$("#fullfancymarketrate").val(fullfancymarketrate);
			$("#other_fancy").val(other_fancy);
			$("#oddsmarketId").val(marketId);
			$("#market_runner_name").val(market_runner_name);
			$("#market_odd_name").val(market_odd_name);
			//$('.modal').show();
			$("#inputStake").val(result.stake).trigger("input");
			$('#open_back_place_bet').modal("show");


		}

		}

		console.log(results);
	});


	jQuery(document).on("input", "#inputStake", function () {
		var stake = $("#inputStake").val();
		eventId = $("#fullMarketBetsWrap").attr("eventid");
		$("#inputStake").val(stake);
		odds = parseFloat($("#odds_val").val());
		inputStake = $("#inputStake").val();
		bet_marketId = $("#bet_marketId").val();
		bet_stake_side = $("#bet_stake_side").val();
		bet_markettype = $("#bet_markettype").val();
		if (bet_markettype == "BOOKMAKER_ODDS" || bet_markettype == "BOOKMAKER_TIED_ODDS" || bet_markettype == "BOOKMAKERSMALL_ODDS" || bet_markettype.indexOf('BM_') !== -1) {
			odds = (odds / 100) + 1;
		}
		if (bet_markettype != "FANCY_ODDS") {
			if (bet_stake_side == "Lay") {
				profit = parseInt(inputStake);
				profit123 = profit.toFixed(2);

				$(".last_data_" + bet_markettype).text(inputStake);
				$(".last_data_" + bet_markettype).removeClass("text-danger");
				$(".last_data_" + bet_markettype).removeClass("text-success");
				$(".last_data_" + bet_markettype).addClass("text-success");
				$("#last_data_" + bet_marketId + "_" + bet_markettype).text("-" + profit123);

				$("#last_data_" + bet_marketId + "_" + bet_markettype).removeClass("text-success");
				$("#last_data_" + bet_marketId + "_" + bet_markettype).removeClass("text-danger");
				$("#last_data_" + bet_marketId + "_" + bet_markettype).addClass("text-danger");

			} else {
				profit = (odds - 1) * inputStake;
				profit123 = profit.toFixed(2);
				$(".last_data_" + bet_markettype).text("-" + inputStake);
				$(".last_data_" + bet_markettype).removeClass("text-danger");
				$(".last_data_" + bet_markettype).removeClass("text-success");
				$(".last_data_" + bet_markettype).addClass("text-danger");

				$("#last_data_" + bet_marketId + "_" + bet_markettype).text(profit123);
				$("#last_data_" + bet_marketId + "_" + bet_markettype).removeClass("text-success");
				$("#last_data_" + bet_marketId + "_" + bet_markettype).removeClass("text-danger");
				$("#last_data_" + bet_marketId + "_" + bet_markettype).addClass("text-success");
			}

			bet_marketId = $("#bet_marketId").val();
			bet_event_id = $("#bet_event_id").val();
			$.ajax({
				type: 'POST',
				url: '../ajaxfiles/place_bet_net_exposure_v2.php',
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
				success: function (response) {
					var status = response.status;
					if (status == 'ok') {


						if (response.data) {
							//if(response.data == "MATCH_ODDS" ){
							for (var i in response.data) {
								for (var ij = 1; ij <= Object.keys(response.data[i].market_ids).length; ij++) {
									var team = "team_" + ij;
									var market_1 = parseInt(response.data[i].market_ids[team]);
									var team_1_exposure = parseInt(response.data[i].exposure[team]);
									$("#live_match_points_" + market_1 + "_" + i).text(team_1_exposure);
									$("#middle_data_" + market_1 + "_" + i).text(team_1_exposure);
									if (team_1_exposure >= 0) {
										$("#live_match_points_" + market_1 + "_" + i).css('color', 'green');
										$("#middle_data_" + market_1 + "_" + i).css('color', 'green');
									} else {
										$("#live_match_points_" + market_1 + "_" + i).css('color', 'red');
										$("#middle_data_" + market_1 + "_" + i).css('color', 'red');
									}

								}
							}

						}

					}
				}
			});
		}
		if (bet_markettype == "MATCH_ODDS" || bet_markettype == "BOOKMAKER_ODDS" || bet_markettype == "BOOKMAKER_TIED_ODDS" || bet_markettype == "BOOKMAKERSMALL_ODDS" || bet_markettype.indexOf('BM_') !== -1) {
			$("#profitLiability").text(profit.toFixed(2));
		}
	});

	jQuery(document).on("click", ".label_stake", function () {
		//stake = $(this).attr("stake");
		eventId = $("#fullMarketBetsWrap").attr("eventid");

		var currentStake = parseFloat($("#inputStake").val()) || 0;
		var buttonStake = parseFloat($(this).attr("stake")) || 0;
		var totalStake = currentStake + buttonStake;

		$("#inputStake").val(totalStake);
		// $("#inputStake").val(stake);
		odds = parseFloat($("#odds_val").val());
		inputStake = $("#inputStake").val();
		bet_stake_side = $("#bet_stake_side").val();
		bet_markettype = $("#bet_markettype").val();
		bet_marketId = $("#bet_marketId").val();
		if (bet_markettype == "BOOKMAKER_ODDS" || bet_markettype == "BOOKMAKER_TIED_ODDS" || bet_markettype == "BOOKMAKERSMALL_ODDS" || bet_markettype.indexOf('BM_') !== -1) {
			odds = (odds / 100) + 1;
		}

		if (bet_markettype != "FANCY_ODDS") {
			if (bet_stake_side == "Lay") {
				profit = (odds - 1) * inputStake;
				profit123 = parseInt(inputStake).toFixed(2);
				$(".last_data_" + bet_markettype).text(inputStake);
				$(".last_data_" + bet_markettype).removeClass("text-danger");
				$(".last_data_" + bet_markettype).removeClass("text-success");
				$(".last_data_" + bet_markettype).addClass("text-success");
				$("#last_data_" + bet_marketId + "_" + bet_markettype).text("-" + profit123);

				$("#last_data_" + bet_marketId + "_" + bet_markettype).removeClass("text-success");
				$("#last_data_" + bet_marketId + "_" + bet_markettype).removeClass("text-danger");
				$("#last_data_" + bet_marketId + "_" + bet_markettype).addClass("text-danger");

			} else {
				profit = (odds - 1) * inputStake;
				profit123 = profit.toFixed(2);
				$(".last_data_" + bet_markettype).text("-" + inputStake);
				$(".last_data_" + bet_markettype).removeClass("text-danger");
				$(".last_data_" + bet_markettype).removeClass("text-success");
				$(".last_data_" + bet_markettype).addClass("text-danger");

				$("#last_data_" + bet_marketId + "_" + bet_markettype).text(profit123);
				$("#last_data_" + bet_marketId + "_" + bet_markettype).removeClass("text-danger");
				$("#last_data_" + bet_marketId + "_" + bet_markettype).removeClass("text-success");
				$("#last_data_" + bet_marketId + "_" + bet_markettype).addClass("text-success");
			}

			bet_marketId = $("#bet_marketId").val();
			bet_event_id = $("#bet_event_id").val();
			$.ajax({
				type: 'POST',
				url: '../ajaxfiles/place_bet_net_exposure_v2.php',
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
				success: function (response) {
					var status = response.status;
					if (status == 'ok') {


						if (response.data) {
							//if(response.data == "MATCH_ODDS" ){
							for (var i in response.data) {
								for (var ij = 1; ij <= Object.keys(response.data[i].market_ids).length; ij++) {
									var team = "team_" + ij;
									var market_1 = parseInt(response.data[i].market_ids[team]);
									var team_1_exposure = parseInt(response.data[i].exposure[team]);
									$("#live_match_points_" + market_1 + "_" + i).text(team_1_exposure);
									$("#middle_data_" + market_1 + "_" + i).text(team_1_exposure);
									if (team_1_exposure >= 0) {
										$("#live_match_points_" + market_1 + "_" + i).css('color', 'green');
										$("#middle_data_" + market_1 + "_" + i).css('color', 'green');
									} else {
										$("#live_match_points_" + market_1 + "_" + i).css('color', 'red');
										$("#middle_data_" + market_1 + "_" + i).css('color', 'red');
									}

								}
							}

						}

					}
				}
			});
		}
		if (bet_markettype == "MATCH_ODDS" || bet_markettype == "BOOKMAKER_ODDS" || bet_markettype == "BOOKMAKER_TIED_ODDS" || bet_markettype == "BOOKMAKERSMALL_ODDS" || bet_markettype.indexOf('BM_') !== -1) {
			$("#profitLiability").text(profit.toFixed(2));
		}
	});

	jQuery(document).on("click", "#placeBet", function () {

		$("#placeBet").html('<i class="fa fa-spinner  fa-spin"></i> Submit');
		$("#placeBet").addClass('disabled');
		var last_place_bet = "";
		bet_stake_side = $("#bet_stake_side").val();
		bet_type = bet_stake_side;
		bet_event_id = $("#bet_event_id").val();
		bet_marketId = $("#bet_marketId").val();
		oddsmarketId = '<?php echo $marketId; ?>';
		eventType = <?php echo $eventType; ?>;
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
			//bet_market_type = "MATCH_ODDS";
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
		} else {
			bet_market_type = "FANCY_ODDS";
			fullfancymarketrate = oddsNo;
			if (fullfancymarketrate > 100) {
				return_stake = parseInt(inputStake);
			} else {
				return_stake = fullfancymarketrate * inputStake / 100;
				return_stake = parseInt(return_stake);
			}
			runsNo = $('.select').attr("fullmarketodds");
			oddsNo = $('.select').attr("fullfancymarketrate");
		}

		other_fancy = $("#other_fancy").val();

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
			url: '../ajaxfiles/bet_place_v2.php',
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
				other_fancy: other_fancy,
			},
			success: function (response) {
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
						"iconClass": "toast-success",
						"positionClass": "toast-top-center",
						"extendedTImeout": "0"
					});
					/*$("#bet-error-class").addClass("b-toast-success");*/
				} else {


					toastr.clear()
					toastr.warning("", message, {
						"timeOut": "3000",
						"iconClass": "toast-warning",
						"positionClass": "toast-top-center",
						"extendedTImeout": "0"
					});
					/*$("#bet-error-class").addClass("b-toast-danger");*/
				}
				/*error_message_text = message;
				$("#errorMsgText").text(error_message_text);
				$("#errorMsg").fadeIn('fast').delay(3000).hide(0);*/
				$(".close-bet-slip").click();
				refresh(1, eventIdOpenbet);
				getlive_match_point();
				$("#placeBet").html('Submit');
				$(".placeBet").removeClass("disable");
				//$('.modal').hide();
				$("#inputStake").val("");
				$('#open_back_place_bet').modal("hide");
			}
		});
	});




	function view_fancy_bet_book(event_id, market_id) {
		//$(".loader").show();
		$(".loader").hide();
		$.ajax({
			type: 'POST',
			url: '../ajaxfiles/view_fancy_bet_book.php',
			dataType: 'text',
			data: {
				event_id: event_id,
				market_id: market_id
			},
			success: function (response) {
				//$(".loader").hide();
				$("#fancy_bet_book_run").html(response);
				$("#view_fancy_bet_book").modal('show');
			}
		});
	}

	function infoBlock() {
		$(".info-block").click(function () {


			$($(this).children('div')[0]).toggle();
		});
	}
	setTimeout(function () {
		infoBlock();

	}, 2000);
</script>

<div id="view_fancy_bet_book" class="modal" role="dialog" style="display: none;">
	<div class="modal-dialog" style="">
		<div class="modal-dialog modal-lg">
			<div role="document" id="__BVID__51___BV_modal_content_" tabindex="-1" class="modal-content">
				<header id="__BVID__51___BV_modal_header_" class="modal-header">
					<h5 class="modal-title" id="result_title">Run Position</h5>
					<button type="button" aria-label="Close" data-dismiss="modal" class="close">&times;</button>
				</header>
				<div id="__BVID__51___BV_modal_body_" class="modal-body">
					<!---->
					<!---->
					<div id="fancy_bet_book_run">

					</div>
				</div>
				<!---->
			</div>
		</div>
	</div>

</div>

<style>
	.place-bet .stakeactionplus,
	.place-bet .stakeactionminus {
		width: 30px !important;
	}

	.modal-body {
		padding: 0px !important;
	}

	.col-4 {
		-ms-flex: 0 0 33.333333%;
		flex: 0 0 24.333333%;
		max-width: 33.333333%;
	}

	.row.row5>[class*=col-] {
		padding-left: 0px !important;
		padding-right: 2px !important;
	}
</style>

<div id="open_back_place_bet" class="modal" role="dialog">
	<div class="modal-dialog">
		<div role="document" id="__BVID__30___BV_modal_content_" tabindex="-1" class="modal-content">
			<header id="__BVID__30___BV_modal_header_" class="modal-header">
				<h5 id="__BVID__30___BV_modal_title_" class="modal-title">Place Bet</h5>
				<button type="button" data-dismiss="modal" class="close">&times;</button>
			</header>
			<div id="__BVID__30___BV_modal_body_" class="modal-body" style="padding: 0px;">
				<div class="place-bet pt-2 pb-2 back" id="popup_color" style="padding: 5px;">
					<div class="container-fluid container-fluid-5">
						<div class="row row5">
							<div class="col-5 text-left"><b id="market_runner_label">Player A</b></div>
							<div class="col-7 text-right">
								<div class="pt-1">Profit:<span id="profitLiability">0</span></div>

							</div>
							<div class="odd-stake-box" style="width:100%;background:#ffffff45;padding:4px;">
								<div class="row row5 mt-1">
									<div class="col-5 text-center">
										Odds
									</div>
									<div class="col-7 text-center">
										Amount
									</div>
								</div>
								<div class="row row5 mt-1">
									<div class="col-5">

										<button class="stakeactionminus minuss btn disabled">
											<span class="fa fa-minus"></span>
										</button>
										<input type="text" placeholder="0" disabled readonly class="stakeinput"
											id="odds_val"> </span>
										<button class="stakeactionminus pluss btn disabled">
											<span class="fa fa-plus"></span>
										</button>
										<input type='hidden' id='bet_stake_side' value='' /><input type='hidden'
											id='bet_event_id' value='' /><input type='hidden' id='bet_marketId'
											value='' /><input type='hidden' id='bet_event_name' value='' /><input
											type='hidden' id='bet_market_name' value='' /><input type='hidden'
											id='bet_markettype' value='' /><input type='hidden' id='fullfancymarketrate'
											value='' /> <input type='hidden' id='oddsmarketId' value='' /><input
											type='hidden' id='market_runner_name' value='' /><input type='hidden'
											id='market_odd_name' value='' /><input type='hidden' id='other_fancy'
											value='' />
									</div>
									<div class="col-7 text-right">

										<input type="number" id="inputStake" class="stakeinput w-100">
									</div>
								</div>
							</div>

						</div>

						<div class="row row5 mt-2">
							<?php
							$get_button_value = $conn->query("select * from user_master where id=$user_id and (button_value <> '' and button_value IS NOT NULL)");
							$num_rows = $get_button_value->num_rows;
							$button_array = array();
							if ($num_rows <= 0) {
								$button_array[] = 1000;
								$button_array[] = 5000;
								$button_array[] = 10000;
								$button_array[] = 25000;
								$button_array[] = 50000;
								$button_array[] = 100000;
								$button_array[] = 200000;
								$button_array[] = 500000;
								$button_array[] = 1000000;
								$button_array[] = 2500000;
							} else {
								$fetch_button_value_data = mysqli_fetch_assoc($get_button_value);
								$fetch_button_value = $fetch_button_value_data['button_value'];
								$default_stake = $fetch_button_value_data['default_stake'];
								$one_bet_default_stake = $fetch_button_value_data['one_bet_default_stake'];
								$button_array = explode(",", $fetch_button_value);
							}
							foreach ($button_array as $button_value) {
								$labelprint = $button_value / 1000;
								?>
								<div class="col-4" style="flex: 0 0 24%;">
									<button type="button" class="btn btn-secondary btn-block label_stake"
										stake='<?php echo $button_value; ?>' style="margin-bottom:2px;">
										+<?php echo $labelprint; ?>k
									</button>
								</div>
								<?php
							}
							?>
						</div>
						<style>
							.row.row5.buttons>[class*=col-] {
								padding-left: 0px;
								padding-right: 0px;
							}
						</style>

						<div class="row row5 mt-2 buttons">
							<div class="col-3">
								<button class='btn btn-link place-bet-clear-btn'
									style="width: 100%;text-decoration: underline;font-weight:bold;">
									Clear
								</button>
							</div>
							<div class="col-3">
								<button type='button' class='btn btn-info btn-edit' data-target='#set_btn_value'
									data-toggle='modal' style="width:100%">
									Edit
								</button>
							</div>
							<div class="col-3">
								<button type='button' class='btn btn-danger' data-dismiss="modal" class="close"
									style="width:100%">
									Reset
								</button>
							</div>
							<div class="col-3">
								<button class="btn btn-success placeBet" id="placeBet" style="width:100%">
									Place Bet
								</button>
							</div>

						</div>
						<div id="back_match_odds_data" class="mt-2"
							style="display : none;background:#ffffff45;padding:5px;">


						</div>

						<div id="back_bookmaker_data" class="mt-2"
							style="display : none;background: rgba(255, 255, 255, 0.27);padding:4px;">


						</div>
						<div id="back_bookmaker_tied_data" class="mt-2"
							style="display : none;background: rgba(255, 255, 255, 0.27);padding:4px;">


						</div>

						<div id="back_sm_bookmaker_data" class="mt-2"
							style="display : none;background: rgba(255, 255, 255, 0.27);padding:4px;">


						</div>


					</div>
				</div>
			</div>
			<!---->
		</div>
	</div>
</div>
<?php
include "footer.php";
include "event_full_market_rules_popup.php";
?>

</html>
<script>
	$(document).ready(function () {

		jQuery(document).on("click", ".minuss", function () {
			var bet_markettype = $("#bet_markettype").val();

			/*if(bet_markettype == "MATCH_ODDS"){
			
				var odds_val=$("#odds_val").val();
				var integerr = /^\d+$/; 
				if(odds_val > 0){
					if (odds_val.match(integerr)) {
						
						odds_val = +odds_val - 1;
					} else{
						
						odds_val = +odds_val - 0.01;
						odds_val = parseFloat(odds_val).toFixed(2);
					}
					if(odds_val > 0){
						$("#odds_val").val(odds_val);
						$("#fullfancymarketrate").val(odds_val);
					}
				}
			}*/

		});

		jQuery(document).on("click", ".pluss", function () {
			var bet_markettype = $("#bet_markettype").val();

			/*if(bet_markettype == "MATCH_ODDS"){
				
				var odds_val=$("#odds_val").val();
				var integerr = /^\d+$/; 
				if(odds_val > 0){
					if (odds_val.match(integerr)) {
						
						odds_val = +odds_val + 1;
					} else{
						
						odds_val = +odds_val + 0.01;
						odds_val = parseFloat(odds_val).toFixed(2);
					}
					$("#odds_val").val(odds_val);
					$("#fullfancymarketrate").val(odds_val);
				}
			}*/
		});
	});

	jQuery(document).on("click", ".place-bet-clear-btn", function () {
		$('#inputStake').val('');
		$('.clear_exposure').text('');
		$('#profitLiability').text('0');


	});

	jQuery(document).on("click", ".close-bet-slip", function () {
		$('.bet-slip-data').remove();
		$(".back-1").removeClass("select");
		$(".lay-1").removeClass("select");
		getlive_match_point();
	});

</script>
<script type="text/javascript" src='footer-js.js'></script>