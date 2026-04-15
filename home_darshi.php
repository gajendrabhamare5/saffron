<?php
include('include/conn.php');
include('include/flip_function.php');
include('session.php');
$user_id = $_SESSION['CLIENT_LOGIN_ID'];
$get_parent_ids = $conn->query("select * from user_login_master where UserID=$user_id");
$fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
$parentDL = $fetch_parent_ids['parentDL'];
$parentMDL = $fetch_parent_ids['parentMDL'];
$parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];
$parentKingAdmin = $fetch_parent_ids['parentKingAdmin'];

if ($parentKingAdmin > 0) {
	$check_cess_parent = $parentKingAdmin;
} else {
	$check_cess_parent = $parentSuperMDL;
}
$get_access = $conn->query("select cricket_access,soccer_access,tennis_access,video_access from user_master where Id=$check_cess_parent");
$fetch_access = mysqli_fetch_assoc($get_access);
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8" />
<script type="text/javascript">
	var check = false;
	(function(a) {
		if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4)))
			check = true;
	})(navigator.userAgent || navigator.vendor || window.opera);
	if (check == true) {
		window.location.assign('<?php echo MOBILE_URL . "home"; ?>');
	}
	
</script>
<?php
include("head_css_darshi.php");
?>

			<script type="text/javascript" src="js/socket.io.js"></script>
			<script type="text/javascript" src="js/jquery.min.js"></script>


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
						include("left_sidebar2.php");
						?>
						<div class="col-md-10 featured-box">
							<div>
								<div>
									<div class="latest-event d-none d-xl-flex">
										<div class="latest-event-item "><a class="blink_me" href="/game-details/4/698663105"><i class='fas fa-football-ball me-1'></i><span>Melbourne Stars v Sydney Sixers</span></a></div>
										<div class="latest-event-item "><a class="blink_me" href="/game-details/2/778803036"><i class='fas fa-football-ball me-1'></i><span>V Kudermetova v Mertens</span></a></div>
										<div class="latest-event-item "><a class="blink_me" href="/game-details/4/860740296"><i class='fas fa-football-ball me-1'></i><span>Fortune Barishal v Rangpur Riders</span></a></div>
										<div class="latest-event-item "><a class="blink_me" href="/game-details/4/730750813"><i class='fas fa-football-ball me-1'></i><span> Dhaka Capital v Chittagong Kings</span></a></div>
										<div class="latest-event-item "><a class="blink_me" href="/game-details/4/517651674"><i class='fas fa-football-ball me-1'></i><span> Sunrisers Eastern Cape v MI Cape Town</span></a></div>
									</div>
									<ul role="tablist" id="home-events" class="nav nav-tabs">
										<?php if ($fetch_access['cricket_access'] == 1) { ?>
											<li class="nav-item"><a href="javascript:void(0)" data-toggle="cricket" class="nav-link active tab_menu_btn cricket_tab_btn" onclick="tab_view('cricket')">Cricket</a></li>
										<?php }
										if ($fetch_access['soccer_access'] == 1) { ?>
											<li class="nav-item"><a href="javascript:void(0)" data-toggle="football" class="nav-link  tab_menu_btn football_tab_btn" onclick="tab_view('football')">Football</a></li>
										<?php }
										if ($fetch_access['tennis_access'] == 1) { ?>
											<li class="nav-item"><a href="javascript:void(0)" data-toggle="tennis" class="nav-link  tab_menu_btn tennis_tab_btn" onclick="tab_view('tennis')">Tennis</a></li>
										<?php } ?>
									</ul>
									<div class="tab-content" id="cricket">
										<div class="tab-pane active">
											<div class="coupon-card coupon-card-first">
												<div class="card-content">
													<table class="table coupon-table">
														<thead>
															<tr>
																<th style="width: 63%;"> Game</th>
																<th colspan="2"> 1 </th>
																<th colspan="2"> X </th>
																<th colspan="2"> 2 </th>
															</tr>
														</thead>
														<tbody id="cricket_event">
															<tr>
																<td colspan="100%">
																	<div class="game-list pt-1 pb-1 container-fluid">
																		<div class="row row5">
																			<div class="col-12">
																				<p class="text-center mb-1 mt-1">No real-time records found</p>
																			</div>
																		</div>
																	</div>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-content" id="football" style="display:none;">
										<div class="tab-pane active">
											<div class="coupon-card coupon-card-first">
												<div class="card-content">
													<table class="table coupon-table">
														<thead>
															<tr>
																<th style="width: 63%;"> Game</th>
																<th colspan="2"> 1 </th>
																<th colspan="2"> X </th>
																<th colspan="2"> 2 </th>
															</tr>
														</thead>
														<tbody id="football_event">
															<tr>
																<td colspan="100%">
																	<div class="game-list pt-1 pb-1 container-fluid">
																		<div class="row row5">
																			<div class="col-12">
																				<p class="text-center mb-1 mt-1">No real-time records found</p>
																			</div>
																		</div>
																	</div>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-content" id="tennis" style="display:none;">
										<div class="tab-pane active">
											<div class="coupon-card coupon-card-first">
												<div class="card-content">
													<table class="table coupon-table">
														<thead>
															<tr>
																<th style="width: 63%;"> Game</th>
																<th colspan="2"> 1 </th>
																<th colspan="2"> X </th>
																<th colspan="2"> 2 </th>
															</tr>
														</thead>
														<tbody id="tennis_event">
															<tr>
																<td colspan="100%">
																	<div class="game-list pt-1 pb-1 container-fluid">
																		<div class="row row5">
																			<div class="col-12">
																				<p class="text-center mb-1 mt-1">No real-time records found</p>
																			</div>
																		</div>
																	</div>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php if ($fetch_access['video_access'] == 1) { ?>
									<div class="home-products-container">
										<div class="row row5">
											<div class="col-md-12">
											<a href="live_ballbyball" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/ballbyball.jpg" class="img-fluid">
														<div class="casino-name">Ball By Ball</div>

													</div>
												</a>
												<a href="live_superover" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/superover.jpg" class="img-fluid">
														<div class="casino-name">Super Over</div>
														<div class="new-launch-casino"><img src="storage/front/img/casinoicons/offer-patch.png">
															<style>
																.new-launch-casino {
																	background: transparent !important;
																	position: absolute;
																	left: -23px;
																	top: -40px;
																	padding: 10px;
																	height: auto;
																	width: 125px;
																	display: flex;
																	justify-content: center;
																	align-items: center;
																	text-align: center;
																	color: #fff;
																}
															</style>
														</div>
													</div>
												</a>
												<a href="live_race20" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/race20.png" class="img-fluid">
														<div class="casino-name">Race 20-20</div>

													</div>
												</a>
												<a href="live_queen" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/queen.jpeg" class="img-fluid">
														<div class="casino-name">Casino Queen</div>

													</div>
												</a>
												<a href="live_5_cricket" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/cricketv3.jpeg" class="img-fluid">
														<div class="casino-name">5Five Cricket</div>

													</div>
												</a>

												<a href="live_ab202" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/andar-bahar2.jpg" class="img-fluid">
														<div class="casino-name">Andar Bahar 2</div>

													</div>
												</a>
												<a href="live_dt202" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/dt202.jpg" class="img-fluid">
														<div class="casino-name">20-20 DT2</div>

													</div>
												</a>
												<a href="live_baccarat2" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/baccarat2.jpg" class="img-fluid">
														<div class="casino-name">BACCARAT 2</div>

													</div>
												</a>
												<a href="live_baccarat" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/baccarat.png" class="img-fluid">
														<div class="casino-name">BACCARAT</div>

													</div>
												</a>
												<a href="live_lucky7eu" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/lucky7eu.jpg" class="img-fluid">
														<div class="casino-name">Lucky 7-B</div>
													</div>
												</a>

												<a href="javascript:void(0);" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/teencasino.jpg" class="img-fluid">
														<div class="casino-name">Teenpatti 2.0</div>
													</div>
												</a>

												<a href="live_cc20" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/cc-20.jpg" class="img-fluid">
														<div class="casino-name">20-20 CRICKET MATCH</div>

													</div>
												</a>
												<a href="live_cmeter" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/cmeter.jpg" class="img-fluid">
														<div class="casino-name">CASINO METER</div>

													</div>
												</a>
												<a href="live_casino_war" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/war.jpg" class="img-fluid">
														<div class="casino-name">CASINO WAR</div>

													</div>
												</a>
												<a href="live_dtl20" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/dtl.jpg" class="img-fluid">
														<div class="casino-name">20-20 DTL</div>
													</div>
												</a>
												<a href="live_odi_teenpatti" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/teenpatti.jpg" class="img-fluid">
														<div class="casino-name">1 Day Teenpatti</div>
													</div>
												</a>
												<a href="live_test_teenpatti" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/teenpatti.jpg" class="img-fluid">
														<div class="casino-name">Test Teenpatti</div>
													</div>
												</a>

												<a href="live_20_teenpatti" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/teenpatti.jpg" class="img-fluid">
														<div class="casino-name">20-20 Teenpatti</div>
													</div>
												</a>
												<a href="live_open_teenpatti" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/teenpatti.jpg" class="img-fluid">
														<div class="casino-name">Open Teenpatti</div>

													</div>
												</a>
												<a href="live_1day_poker" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/poker.jpg" class="img-fluid">
														<div class="casino-name">1 Day Poker</div>
													</div>
												</a><a href="live_6player_poker" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/poker.jpg" class="img-fluid">
														<div class="casino-name">6 Player Poker</div>

													</div>
												</a>
												<a href="live_20poker" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/poker.jpg" class="img-fluid">
														<div class="casino-name">20-20 Poker</div>
													</div>
												</a>
												<a href="live_ab20" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/andar-bahar.jpg" class="img-fluid">
														<div class="casino-name">Andar Bahar</div>
													</div>
												</a>
												<a href="live_worli_matka" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/worli.jpg" class="img-fluid">
														<div class="casino-name">Worli Matka</div>

													</div>
												</a>
												<a href="live_instant_worli" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/worli.jpg" class="img-fluid">
														<div class="casino-name">Instant Worli</div>

													</div>
												</a>
												<a href="live_3cardj" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/3cardsJ.jpg" class="img-fluid">
														<div class="casino-name">3 Cards Judgement</div>

													</div>
												</a>
												<a href="live_32_cards-a" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/32cardsA.jpg" class="img-fluid">
														<div class="casino-name">32 Cards A</div>
													</div>
												</a>
												<a href="live_32_cards-b" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/32cardsB.jpg" class="img-fluid">
														<div class="casino-name">32 Cards B</div>
													</div>
												</a>
												<a href="live_aaa" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/aaa.jpg" class="img-fluid">
														<div class="casino-name">Amar Akbar Anthony</div>
													</div>
												</a>
												<a href="live_ddb" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/bollywood-casino.jpg" class="img-fluid">
														<div class="casino-name">Bollywood Casino</div>
													</div>
												</a>
												<a href="live_odi_dragon_tiger" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/dt.jpg" class="img-fluid">
														<div class="casino-name">1 Day Dragon Tiger</div>
													</div>
												</a>
												<a href="live_20_dragon_tiger" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/dt.jpg" class="img-fluid">
														<div class="casino-name">20-20 Dragon Tiger</div>
													</div>
												</a>
												<a href="javascript:void(0);" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/lottery.jpg" class="img-fluid">
														<div class="casino-name">Lottery</div>
													</div>
												</a>

												<a href="live_lucky7" class="">
													<div class="d-inline-block casinoicons"><img src="storage/front/img/casinoicons/lucky7.jpg" class="img-fluid">
														<div class="casino-name">Lucky 7-A</div>
													</div>
												</a>



											</div>


										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>


			<script type="text/javascript" src="js/jquery.min.js"></script>
			<?php
			include("footer_darshi.php");
			?>
		</div>
	</div>


	<?php
	include("footer-js_darshi.php");
	?>

</body>

</html>
<script type="text/javascript">
	var cricket_html = "";
	var football_html = "";
	var tennis_html = "";
	var b11 = "-";
	var b21 = "-";
	var b31 = "-";

	var l11 = "-";
	var l21 = "-";
	var l31 = "-";

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

	var month_name = function(dt) {
		mlist = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
		return mlist[dt.getMonth()];
	};


	var site_url = '<?php echo WEB_URL; ?>';
	var socket = io("<?php echo GAME_IP; ?>", {
		transports: ['websocket']
	});

	$.ajax({
		 type: 'GET',
		 url: '<?php echo GAME_IP; ?>getCricketMatches',
		 success: function(data) {
		 	setData(data);
		 }
	});
	var event_type_array={};

	function setData(data){
			if (data) {
				if (data.sport) {
					if (data.sport.body) {
						var list_sport = data.sport.body;
						eventNotIncluded = data.eventNotIncluded;

						var result = Object.keys(data.sport.body).length;
						if (result > 0) {
							var main_datas = data;
							var main_x = data;


							smdl_c = ['1', '2'];
							mdl_c = ['1', '2'];
							dl_c = ['1', '2'];
							smdl_s = ['1', '2'];
							smdl_b = ['1', '2'];
							smdl_r = ['1', '2'];
							mdl_s = ['1', '2'];
							dl_s = ['1', '2'];
							smdl_t = ['1', '2'];
							mdl_t = ['1', '2'];
							mdl_b = ['1', '2'];
							mdl_r = ['1', '2'];
							dl_t = ['1', '2'];
							dl_b = ['1', '2'];
							dl_r = ['1', '2'];
							evnt = ['1', '2'];
							evnt = eventNotIncluded || [];

							data = main_datas.sport;
							data.body.sort(function(a, b) {
								return (a.inPlay === b.inPlay) ? 0 : (a.inPlay ? -1 : 1);
							});
							key = Object.keys(data.body)[0];
							eventType = parseInt(data.body[key].SportId);
							console.log("sdfsfsd=",JSON.stringify(data));
							event_type_array[eventType] = data.body.length;
							for (var i in data.body) {

								if (data.body[i]) {
									event_id = data.body[i].matchid.toString();
									marketId = data.body[i].marketid;
									n1 = smdl_c.includes(event_id) || smdl_c.includes(event_id.toString());
									n2 = mdl_c.includes(event_id) || mdl_c.includes(event_id.toString());
									n3 = dl_c.includes(event_id) || dl_c.includes(event_id.toString());

									s1 = smdl_s.includes(event_id) || smdl_s.includes(event_id.toString());
									s2 = mdl_s.includes(event_id) || mdl_s.includes(event_id.toString());
									s3 = dl_s.includes(event_id) || dl_s.includes(event_id.toString());

									t1 = smdl_t.includes(event_id) || smdl_t.includes(event_id.toString());
									t2 = mdl_t.includes(event_id) || mdl_t.includes(event_id.toString());
									t3 = dl_t.includes(event_id) || dl_t.includes(event_id.toString());

									b1 = smdl_b.includes(event_id) || smdl_b.includes(event_id.toString());
									b2 = mdl_b.includes(event_id) || mdl_b.includes(event_id.toString());
									b3 = dl_b.includes(event_id) || dl_b.includes(event_id.toString());

									r1 = smdl_r.includes(event_id) || smdl_r.includes(event_id.toString());
									r2 = mdl_r.includes(event_id) || mdl_r.includes(event_id.toString());
									r3 = dl_r.includes(event_id) || dl_r.includes(event_id.toString());
									e1 = evnt.includes(parseInt(marketId)) || evnt.includes(marketId.toString());
									if (!n1 && !n2 && !n3 && !s1 && !s2 && !s3 && !t1 && !t2 && !t3 && !b1 && !b2 && !b3 && !r1 && !r2 && !r3 && !e1) {

										if (eventType == 4) {
											event_name = data.body[i].matchName;

											marketTime = data.body[i].matchdate;
											marketDateTime = data.body[i].matchdate;





											inPlay = data.body[i].inPlay || "0";
											marketId = data.body[i].marketid;
											marketinPlay = data.body[i].inPlay || "0";
											isFancy = data.body[i].fancy || "0";
											is_tv = data.body[i].tv || "0";
											fancySpan = "";
											if (marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" || marketinPlay == 1) {
												market_status = "active";
											} else {
												market_status = "";

											}

											if (isFancy == true || isFancy == "True" || isFancy == "1" || isFancy == 1) {
												fancy_status = "<span class='game-icon'><img src='storage/front/img/ic_fancy.png' class='fancy-icon'></span>";
											} else {
												fancy_status = "";

											}

											if (is_tv == true || is_tv == "True" || is_tv == "1" || is_tv == 1) {
												tv_status = "<span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span>";
											} else {
												tv_status = "";

											}


											var back_0 = "-";
											var back_1 = "-";
											var back_2 = "-";

											var lay_0 = "-";
											var lay_1 = "-";
											var lay_2 = "-";

											if (data.body[i].b1) {
												back_0 = data.body[i].b1;
											}
											if (data.body[i].b2) {
												back_1 = data.body[i].b2;
											}
											if (data.body[i].b3) {
												back_2 = data.body[i].b3;
											}

											if (data.body[i].l1) {
												lay_0 = data.body[i].l1;
											}
											if (data.body[i].l2) {
												lay_1 = data.body[i].l2;
											}
											if (data.body[i].b3) {
												lay_2 = data.body[i].l3;
											}

											const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

											marketTime1 = new Date(marketTime);
											marketdate = ("0" + (marketTime1.getDate())).slice(-2);
											marketMonth = monthNames[marketTime1.getMonth()];
											marketYear = marketTime1.getFullYear();
											marketHours = ("0" + (marketTime1.getHours())).slice(-2);
											marketMinutes = ("0" + (marketTime1.getMinutes())).slice(-2);
											var ampm = marketHours >= 12 ? 'pm' : 'am';

											marketHours = marketHours % 12;
											marketHours = marketHours ? marketHours : 12;

											market_full_date = marketMonth + " " + marketdate + " " + marketYear + " " + marketHours + ":" + marketMinutes + " " + ampm + " (IST)";

											cricket_html += "<tr><td><div class='game-name'><a href='event_full_market?eventType=" + eventType + "&eventId=" + event_id + "&marketId=" + marketId + "' class='text-dark'>" + event_name + " / <span class='time_event'>" + market_full_date + "</span></a></div><div class='game-icons'><span class='game-icon'><span class='" + market_status + "'></span></span> " + tv_status + " " + fancy_status + " <span class='game-icon'><img src='storage/front/img/ic_bm.png' class='bookmaker-icon'></span></div></td><td> <button class='back'><span class='odd'> " + back_0 + " </span></button></td><td> <button class='lay'><span class='odd'>" + lay_0 + "</span></button></td><td> <button class='back'><span class='odd'> " + back_2 + " </span></button></td><td> <button class='lay'><span class='odd'> " + lay_2 + " </span></button></td><td> <button class='back'><span class='odd'>" + back_1 + "</span></button></td><td> <button class='lay'><span class='odd'> " + lay_1 + " </span></button></td></tr>";



										}

										if (eventType == 1) {
											event_name = data.body[i].matchName;

											marketTime = data.body[i].matchdate;
											marketDateTime = data.body[i].matchdate;





											inPlay = data.body[i].inPlay || "0";
											marketId = data.body[i].marketid;
											marketinPlay = data.body[i].inPlay || "0";
											isFancy = data.body[i].fancy || "0";
											is_tv = data.body[i].tv || "0";
											fancySpan = "";
											if (marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" || marketinPlay == 1) {
												market_status = "active";
											} else {
												market_status = "";

											}

											if (isFancy == true || isFancy == "True" || isFancy == "1" || isFancy == 1) {
												fancy_status = "<span class='game-icon'><img src='storage/front/img/ic_fancy.png' class='fancy-icon'></span>";
											} else {
												fancy_status = "";

											}

											if (is_tv == true || is_tv == "True" || is_tv == "1" || is_tv == 1) {
												tv_status = "<span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span>";
											} else {
												tv_status = "";

											}



											var back_0 = "-";
											var back_1 = "-";
											var back_2 = "-";

											var lay_0 = "-";
											var lay_1 = "-";
											var lay_2 = "-";

											if (data.body[i].b1) {
												back_0 = data.body[i].b1;
											}
											if (data.body[i].b2) {
												back_1 = data.body[i].b2;
											}
											if (data.body[i].b3) {
												back_2 = data.body[i].b3;
											}

											if (data.body[i].l1) {
												lay_0 = data.body[i].l1;
											}
											if (data.body[i].l2) {
												lay_1 = data.body[i].l2;
											}
											if (data.body[i].b3) {
												lay_2 = data.body[i].l3;
											}


											const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

											marketTime1 = new Date(marketTime);
											marketdate = ("0" + (marketTime1.getDate())).slice(-2);
											marketMonth = monthNames[marketTime1.getMonth()];
											marketYear = marketTime1.getFullYear();
											marketHours = ("0" + (marketTime1.getHours())).slice(-2);
											marketMinutes = ("0" + (marketTime1.getMinutes())).slice(-2);
											var ampm = marketHours >= 12 ? 'pm' : 'am';

											marketHours = marketHours % 12;
											marketHours = marketHours ? marketHours : 12;

											market_full_date = marketMonth + " " + marketdate + " " + marketYear + " " + marketHours + ":" + marketMinutes + " " + ampm + " (IST)";

											football_html += "<tr><td><div class='game-name'><a href='event_full_market?eventType=" + eventType + "&eventId=" + event_id + "&marketId=" + marketId + "' class='text-dark'>" + event_name + " / <span class='time_event'>" + market_full_date + "</span></a></div><div class='game-icons'><span class='game-icon'><span class='" + market_status + "'></span></span> " + tv_status + " " + fancy_status + " <span class='game-icon'><img src='storage/front/img/ic_bm.png' style='display:none;' class='bookmaker-icon'></span></div></td><td> <button class='back'><span class='odd'> " + back_0 + " </span></button></td><td> <button class='lay'><span class='odd'>" + lay_0 + "</span></button></td><td> <button class='back'><span class='odd'> " + back_2 + " </span></button></td><td> <button class='lay'><span class='odd'> " + lay_2 + " </span></button></td><td> <button class='back'><span class='odd'>" + back_1 + "</span></button></td><td> <button class='lay'><span class='odd'> " + lay_1 + " </span></button></td></tr>";



										}

										if (eventType == 2) {
											event_name = data.body[i].matchName;

											marketTime = data.body[i].matchdate;
											marketDateTime = data.body[i].matchdate;





											inPlay = data.body[i].inPlay || "0";
											marketId = data.body[i].marketid;
											marketinPlay = data.body[i].inPlay || "0";
											isFancy = data.body[i].fancy || "0";
											is_tv = data.body[i].tv || "0";
											fancySpan = "";
											if (marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" || marketinPlay == 1) {
												market_status = "active";
											} else {
												market_status = "";

											}

											if (isFancy == true || isFancy == "True" || isFancy == "1" || isFancy == 1) {
												fancy_status = "<span class='game-icon'><img src='storage/front/img/ic_fancy.png' class='fancy-icon'></span>";
											} else {
												fancy_status = "";

											}

											if (is_tv == true || is_tv == "True" || is_tv == "1" || is_tv == 1) {
												tv_status = "<span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span>";
											} else {
												tv_status = "";

											}


											var back_0 = "-";
											var back_1 = "-";
											var back_2 = "-";

											var lay_0 = "-";
											var lay_1 = "-";
											var lay_2 = "-";

											if (data.body[i].b1) {
												back_0 = data.body[i].b1;
											}
											if (data.body[i].b2) {
												back_1 = data.body[i].b2;
											}
											if (data.body[i].b3) {
												back_2 = data.body[i].b3;
											}

											if (data.body[i].l1) {
												lay_0 = data.body[i].l1;
											}
											if (data.body[i].l2) {
												lay_1 = data.body[i].l2;
											}
											if (data.body[i].b3) {
												lay_2 = data.body[i].l3;
											}



											const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

											marketTime1 = new Date(marketTime);
											marketdate = ("0" + (marketTime1.getDate())).slice(-2);
											marketMonth = monthNames[marketTime1.getMonth()];
											marketYear = marketTime1.getFullYear();
											marketHours = ("0" + (marketTime1.getHours())).slice(-2);
											marketMinutes = ("0" + (marketTime1.getMinutes())).slice(-2);
											var ampm = marketHours >= 12 ? 'pm' : 'am';

											marketHours = marketHours % 12;
											marketHours = marketHours ? marketHours : 12;

											market_full_date = marketMonth + " " + marketdate + " " + marketYear + " " + marketHours + ":" + marketMinutes + " " + ampm + " (IST)";

											tennis_html += "<tr><td><div class='game-name'><a href='event_full_market?eventType=" + eventType + "&eventId=" + event_id + "&marketId=" + marketId + "' class='text-dark'>" + event_name + " / <span class='time_event'>" + market_full_date + "</span></a></div><div class='game-icons'><span class='game-icon'><span class='" + market_status + "'></span></span> " + tv_status + " " + fancy_status + " <span class='game-icon'><img src='storage/front/img/ic_bm.png'  class='bookmaker-icon'></span></div></td><td> <button class='back'><span class='odd'> " + back_0 + " </span></button></td><td> <button class='lay'><span class='odd'>" + lay_0 + "</span></button></td><td> <button class='back'><span class='odd'> " + back_2 + " </span></button></td><td> <button class='lay'><span class='odd'> " + lay_2 + " </span></button></td><td> <button class='back'><span class='odd'>" + back_1 + "</span></button></td><td> <button class='lay'><span class='odd'> " + lay_1 + " </span></button></td></tr>";



										}

									}
								}

							}


							if (eventType == 4) {
								$("#cricket_event").html(cricket_html);
								cricket_html = "";
							}
							if (eventType == 1) {
								$("#football_event").html(football_html);
								football_html = "";
							}
							if (eventType == 2) {
								$("#tennis_event").html(tennis_html);
								tennis_html = "";
							}

						}
					}
				}
			}
	}
	
	socket.on('connect', function() {

		<?php if ($fetch_access['cricket_access'] == 1) { ?>
			socket.emit('getMatches', {
				eventType: 4
			});

		<?php } ?>



	});
	function tab_view(tab_name) {
		if (tab_name == "football") {
			<?php if ($fetch_access['soccer_access'] == 1) { ?>
				if(!event_type_array['1'] || (event_type_array['1'] && event_type_array['1'] <= 0)){
					$.ajax({
						type: 'GET',
						url: '<?php echo GAME_IP; ?>getSoccerMatches',
						success: function(data) {
							setData(data);
						}
					});
				}
				socket.emit('getMatches', {
					eventType: 1
				});
			<?php } ?>
		} else if (tab_name == "tennis") {
			<?php if ($fetch_access['tennis_access'] == 1) { ?>
				if(!event_type_array['2'] || (event_type_array['2'] && event_type_array['2'] <= 0)){
					$.ajax({
						type: 'GET',
						url: '<?php echo GAME_IP; ?>getTennisMatches',
						success: function(data) {
							setData(data);
						}
					});
				}
				socket.emit('getMatches', {
					eventType: 2
				});
			<?php } ?>
		} else {
			<?php if ($fetch_access['cricket_access'] == 1) { ?>
				if(!event_type_array['4'] || (event_type_array['4'] && event_type_array['4'] <= 0)){
					$.ajax({
						type: 'GET',
						url: '<?php echo GAME_IP; ?>getCricketMatches',
						success: function(data) {
							setData(data);
						}
					});
				}
				socket.emit('getMatches', {
					eventType: 4
				});
			<?php } ?>
		}
		$(".tab_menu_btn").removeClass("active");
		$("." + tab_name + "_tab_btn").addClass("active");

		$("#cricket").hide();
		$("#football").hide();
		$("#tennis").hide();
		$("#" + tab_name).show();


	}




	socket.on('eventGetLiveEventName', function(data) {
		args = data;
		setData(data);
		/* if (data) {
			if (data.sport) {
				if (data.sport.body) {
					var list_sport = data.sport.body;
					eventNotIncluded = data.eventNotIncluded;

					var result = Object.keys(data.sport.body).length;
					if (result > 0) {
						var main_datas = data;
						var main_x = data;


						smdl_c = ['1', '2'];
						mdl_c = ['1', '2'];
						dl_c = ['1', '2'];
						smdl_s = ['1', '2'];
						smdl_b = ['1', '2'];
						smdl_r = ['1', '2'];
						mdl_s = ['1', '2'];
						dl_s = ['1', '2'];
						smdl_t = ['1', '2'];
						mdl_t = ['1', '2'];
						mdl_b = ['1', '2'];
						mdl_r = ['1', '2'];
						dl_t = ['1', '2'];
						dl_b = ['1', '2'];
						dl_r = ['1', '2'];
						evnt = ['1', '2'];
						evnt = eventNotIncluded || [];

						data = main_datas.sport;

						key = Object.keys(data.body)[0];
						eventType = parseInt(data.body[key].SportId);
						for (var i in data.body) {

							if (data.body[i]) {
								event_id = data.body[i].matchid.toString();
								marketId = data.body[i].marketid;
								n1 = smdl_c.includes(event_id) || smdl_c.includes(event_id.toString());
								n2 = mdl_c.includes(event_id) || mdl_c.includes(event_id.toString());
								n3 = dl_c.includes(event_id) || dl_c.includes(event_id.toString());

								s1 = smdl_s.includes(event_id) || smdl_s.includes(event_id.toString());
								s2 = mdl_s.includes(event_id) || mdl_s.includes(event_id.toString());
								s3 = dl_s.includes(event_id) || dl_s.includes(event_id.toString());

								t1 = smdl_t.includes(event_id) || smdl_t.includes(event_id.toString());
								t2 = mdl_t.includes(event_id) || mdl_t.includes(event_id.toString());
								t3 = dl_t.includes(event_id) || dl_t.includes(event_id.toString());

								b1 = smdl_b.includes(event_id) || smdl_b.includes(event_id.toString());
								b2 = mdl_b.includes(event_id) || mdl_b.includes(event_id.toString());
								b3 = dl_b.includes(event_id) || dl_b.includes(event_id.toString());

								r1 = smdl_r.includes(event_id) || smdl_r.includes(event_id.toString());
								r2 = mdl_r.includes(event_id) || mdl_r.includes(event_id.toString());
								r3 = dl_r.includes(event_id) || dl_r.includes(event_id.toString());
								e1 = evnt.includes(parseInt(marketId)) || evnt.includes(marketId.toString());
								if (!n1 && !n2 && !n3 && !s1 && !s2 && !s3 && !t1 && !t2 && !t3 && !b1 && !b2 && !b3 && !r1 && !r2 && !r3 && !e1) {

									if (eventType == 4) {
										event_name = data.body[i].matchName;

										marketTime = data.body[i].matchdate;
										marketDateTime = data.body[i].matchdate;





										inPlay = data.body[i].inPlay || "0";
										marketId = data.body[i].marketid;
										marketinPlay = data.body[i].inPlay || "0";
										isFancy = data.body[i].fancy || "0";
										is_tv = data.body[i].tv || "0";
										fancySpan = "";
										if (marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" || marketinPlay == 1) {
											market_status = "active";
										} else {
											market_status = "";

										}

										if (isFancy == true || isFancy == "True" || isFancy == "1" || isFancy == 1) {
											fancy_status = "<span class='game-icon'><img src='storage/front/img/ic_fancy.png' class='fancy-icon'></span>";
										} else {
											fancy_status = "";

										}

										if (is_tv == true || is_tv == "True" || is_tv == "1" || is_tv == 1) {
											tv_status = "<span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span>";
										} else {
											tv_status = "";

										}


										var back_0 = "-";
										var back_1 = "-";
										var back_2 = "-";

										var lay_0 = "-";
										var lay_1 = "-";
										var lay_2 = "-";

										if (data.body[i].b1) {
											back_0 = data.body[i].b1;
										}
										if (data.body[i].b2) {
											back_1 = data.body[i].b2;
										}
										if (data.body[i].b3) {
											back_2 = data.body[i].b3;
										}

										if (data.body[i].l1) {
											lay_0 = data.body[i].l1;
										}
										if (data.body[i].l2) {
											lay_1 = data.body[i].l2;
										}
										if (data.body[i].b3) {
											lay_2 = data.body[i].l3;
										}

										const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

										marketTime1 = new Date(marketTime);
										marketdate = ("0" + (marketTime1.getDate())).slice(-2);
										marketMonth = monthNames[marketTime1.getMonth()];
										marketYear = marketTime1.getFullYear();
										marketHours = ("0" + (marketTime1.getHours())).slice(-2);
										marketMinutes = ("0" + (marketTime1.getMinutes())).slice(-2);
										var ampm = marketHours >= 12 ? 'pm' : 'am';

										marketHours = marketHours % 12;
										marketHours = marketHours ? marketHours : 12;

										market_full_date = marketMonth + " " + marketdate + " " + marketYear + " " + marketHours + ":" + marketMinutes + " " + ampm + " (IST)";

										cricket_html += "<tr><td><div class='game-name'><a href='event_full_market?eventType=" + eventType + "&eventId=" + event_id + "&marketId=" + marketId + "' class='text-dark'>" + event_name + " / <span class='time_event'>" + market_full_date + "</span></a></div><div class='game-icons'><span class='game-icon'><span class='" + market_status + "'></span></span> " + tv_status + " " + fancy_status + " <span class='game-icon'><img src='storage/front/img/ic_bm.png' class='bookmaker-icon'></span></div></td><td> <button class='back'><span class='odd'> " + back_0 + " </span></button></td><td> <button class='lay'><span class='odd'>" + lay_0 + "</span></button></td><td> <button class='back'><span class='odd'> " + back_2 + " </span></button></td><td> <button class='lay'><span class='odd'> " + lay_2 + " </span></button></td><td> <button class='back'><span class='odd'>" + back_1 + "</span></button></td><td> <button class='lay'><span class='odd'> " + lay_1 + " </span></button></td></tr>";



									}

									if (eventType == 1) {
										event_name = data.body[i].matchName;

										marketTime = data.body[i].matchdate;
										marketDateTime = data.body[i].matchdate;





										inPlay = data.body[i].inPlay || "0";
										marketId = data.body[i].marketid;
										marketinPlay = data.body[i].inPlay || "0";
										isFancy = data.body[i].fancy || "0";
										is_tv = data.body[i].tv || "0";
										fancySpan = "";
										if (marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" || marketinPlay == 1) {
											market_status = "active";
										} else {
											market_status = "";

										}

										if (isFancy == true || isFancy == "True" || isFancy == "1" || isFancy == 1) {
											fancy_status = "<span class='game-icon'><img src='storage/front/img/ic_fancy.png' class='fancy-icon'></span>";
										} else {
											fancy_status = "";

										}

										if (is_tv == true || is_tv == "True" || is_tv == "1" || is_tv == 1) {
											tv_status = "<span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span>";
										} else {
											tv_status = "";

										}



										var back_0 = "-";
										var back_1 = "-";
										var back_2 = "-";

										var lay_0 = "-";
										var lay_1 = "-";
										var lay_2 = "-";

										if (data.body[i].b1) {
											back_0 = data.body[i].b1;
										}
										if (data.body[i].b2) {
											back_1 = data.body[i].b2;
										}
										if (data.body[i].b3) {
											back_2 = data.body[i].b3;
										}

										if (data.body[i].l1) {
											lay_0 = data.body[i].l1;
										}
										if (data.body[i].l2) {
											lay_1 = data.body[i].l2;
										}
										if (data.body[i].b3) {
											lay_2 = data.body[i].l3;
										}


										const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

										marketTime1 = new Date(marketTime);
										marketdate = ("0" + (marketTime1.getDate())).slice(-2);
										marketMonth = monthNames[marketTime1.getMonth()];
										marketYear = marketTime1.getFullYear();
										marketHours = ("0" + (marketTime1.getHours())).slice(-2);
										marketMinutes = ("0" + (marketTime1.getMinutes())).slice(-2);
										var ampm = marketHours >= 12 ? 'pm' : 'am';

										marketHours = marketHours % 12;
										marketHours = marketHours ? marketHours : 12;

										market_full_date = marketMonth + " " + marketdate + " " + marketYear + " " + marketHours + ":" + marketMinutes + " " + ampm + " (IST)";

										football_html += "<tr><td><div class='game-name'><a href='event_full_market?eventType=" + eventType + "&eventId=" + event_id + "&marketId=" + marketId + "' class='text-dark'>" + event_name + " / <span class='time_event'>" + market_full_date + "</span></a></div><div class='game-icons'><span class='game-icon'><span class='" + market_status + "'></span></span> " + tv_status + " " + fancy_status + " <span class='game-icon'><img src='storage/front/img/ic_bm.png' style='display:none;' class='bookmaker-icon'></span></div></td><td> <button class='back'><span class='odd'> " + back_0 + " </span></button></td><td> <button class='lay'><span class='odd'>" + lay_0 + "</span></button></td><td> <button class='back'><span class='odd'> " + back_2 + " </span></button></td><td> <button class='lay'><span class='odd'> " + lay_2 + " </span></button></td><td> <button class='back'><span class='odd'>" + back_1 + "</span></button></td><td> <button class='lay'><span class='odd'> " + lay_1 + " </span></button></td></tr>";



									}

									if (eventType == 2) {
										event_name = data.body[i].matchName;

										marketTime = data.body[i].matchdate;
										marketDateTime = data.body[i].matchdate;





										inPlay = data.body[i].inPlay || "0";
										marketId = data.body[i].marketid;
										marketinPlay = data.body[i].inPlay || "0";
										isFancy = data.body[i].fancy || "0";
										is_tv = data.body[i].tv || "0";
										fancySpan = "";
										if (marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" || marketinPlay == 1) {
											market_status = "active";
										} else {
											market_status = "";

										}

										if (isFancy == true || isFancy == "True" || isFancy == "1" || isFancy == 1) {
											fancy_status = "<span class='game-icon'><img src='storage/front/img/ic_fancy.png' class='fancy-icon'></span>";
										} else {
											fancy_status = "";

										}

										if (is_tv == true || is_tv == "True" || is_tv == "1" || is_tv == 1) {
											tv_status = "<span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span>";
										} else {
											tv_status = "";

										}


										var back_0 = "-";
										var back_1 = "-";
										var back_2 = "-";

										var lay_0 = "-";
										var lay_1 = "-";
										var lay_2 = "-";

										if (data.body[i].b1) {
											back_0 = data.body[i].b1;
										}
										if (data.body[i].b2) {
											back_1 = data.body[i].b2;
										}
										if (data.body[i].b3) {
											back_2 = data.body[i].b3;
										}

										if (data.body[i].l1) {
											lay_0 = data.body[i].l1;
										}
										if (data.body[i].l2) {
											lay_1 = data.body[i].l2;
										}
										if (data.body[i].b3) {
											lay_2 = data.body[i].l3;
										}



										const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

										marketTime1 = new Date(marketTime);
										marketdate = ("0" + (marketTime1.getDate())).slice(-2);
										marketMonth = monthNames[marketTime1.getMonth()];
										marketYear = marketTime1.getFullYear();
										marketHours = ("0" + (marketTime1.getHours())).slice(-2);
										marketMinutes = ("0" + (marketTime1.getMinutes())).slice(-2);
										var ampm = marketHours >= 12 ? 'pm' : 'am';

										marketHours = marketHours % 12;
										marketHours = marketHours ? marketHours : 12;

										market_full_date = marketMonth + " " + marketdate + " " + marketYear + " " + marketHours + ":" + marketMinutes + " " + ampm + " (IST)";

										tennis_html += "<tr><td><div class='game-name'><a href='event_full_market?eventType=" + eventType + "&eventId=" + event_id + "&marketId=" + marketId + "' class='text-dark'>" + event_name + " / <span class='time_event'>" + market_full_date + "</span></a></div><div class='game-icons'><span class='game-icon'><span class='" + market_status + "'></span></span> " + tv_status + " " + fancy_status + " <span class='game-icon'><img src='storage/front/img/ic_bm.png'  class='bookmaker-icon'></span></div></td><td> <button class='back'><span class='odd'> " + back_0 + " </span></button></td><td> <button class='lay'><span class='odd'>" + lay_0 + "</span></button></td><td> <button class='back'><span class='odd'> " + back_2 + " </span></button></td><td> <button class='lay'><span class='odd'> " + lay_2 + " </span></button></td><td> <button class='back'><span class='odd'>" + back_1 + "</span></button></td><td> <button class='lay'><span class='odd'> " + lay_1 + " </span></button></td></tr>";



									}

								}
							}

						}


						if (eventType == 4) {
							$("#cricket_event").html(cricket_html);
							cricket_html = "";
						}
						if (eventType == 1) {
							$("#football_event").html(football_html);
							football_html = "";
						}
						if (eventType == 2) {
							$("#tennis_event").html(tennis_html);
							tennis_html = "";
						}

					}
				}
			}
		} */
	});
</script>
<script type="text/javascript" src='footer-js.js'></script>