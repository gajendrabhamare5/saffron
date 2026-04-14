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

.casino-nation-book {
    font-size: 12px;
    font-weight: bold;
    min-height: 18px;
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
						<div class="col-md-10 featured-box">
							<div class="row row5 teen9-container ">
								<div class="col-md-9 casino-container coupon-card featured-box-detail">
									<div class="coupon-card">
										<div class="game-heading">
											<span class="card-header-title">
												Teenpatti Test
												<!-- <small role="button" class="teenpatti-rules"   onclick="view_rules('tp-rules.jpg')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small> -->
												 <!---->
											</span>
											<small role="button" class="teenpatti-rules"  onclick="view_rules('test_teenpatti')" data-target="#rules_popup" data-toggle="modal"  tabindex="0"><u>Rules</u></small> 
											<span class="float-right">
											Round ID:
											<span class="round_no">0</span> </span>
										</div>
										<div class="video-container">
										<?php
  if(!empty(IFRAME_URL_SET)){
                               ?>
                               <iframe class="iframedesign" src="<?php echo IFRAME_URL."".TESTTEENPATTI_CODE;?>" width="100%" height="200px" style="border: 0px;"></iframe>
                               <?php
                                
                            }else{
                                ?>
                                <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                <?php

                            }
                            ?>
											<!-- <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
											 <iframe class="iframedesign" src="<?php echo IFRAME_URL; echo TESTTEENPATTI_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
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
																<div class="inn">0</div>
															</div>
															<div class="down">
																<div class="shadow"></div>
																<div class="inn">0</div>
															</div>
														</a>
													</li>
													<li class="flip-clock-active">
														<a href="#">
															<div class="up">
																<div class="shadow"></div>
																<div class="inn">3</div>
															</div>
															<div class="down">
																<div class="shadow"></div>
																<div class="inn">3</div>
															</div>
														</a>
													</li>
												</ul>
											</div>
											<div class="video-overlay">
												<div class="videoCards">
													<div>
														<h3 class="text-white">Tiger</h3>
														<div><img id="card_c1" src="storage/front/img/cards/1.png"> <img id="card_c2" src="storage/front/img/cards/1.png"> <img id="card_c3" src="storage/front/img/cards/1.png"></div>
													</div>
													<div>
														<h3 class="text-white">Lion</h3>
														<div><img id="card_c4" src="storage/front/img/cards/1.png"> <img id="card_c5" src="storage/front/img/cards/1.png"> <img id="card_c6" src="storage/front/img/cards/1.png"></div>
													</div>
													<div>
														<h3 class="text-white">Dragon</h3>
														<div><img id="card_c7" src="storage/front/img/cards/1.png"> <img id="card_c8" src="storage/front/img/cards/1.png"> <img id="card_c9" src="storage/front/img/cards/1.png"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="casino-detail">
											<div class="casino-table">
												<div class="casino-table-full-box">
													<div class="casino-table-header">
														<div class="casino-nation-detail"></div>
														<div class="casino-odds-box back">Tiger</div>
														<div class="casino-odds-box back">Lion</div>
														<div class="casino-odds-box back">Dragon</div>
													</div>
													<div class="casino-table-body">
														<div class="casino-table-row">
														<div class="casino-nation-detail">
															<div class="casino-nation-name">Winner</div>
														</div>
														<div class="casino-odds-box back suspended-box back-1 market_11_b_btn market_11_row"><span class="casino-odds">2.94</span></div>
														<div class="casino-odds-box back suspended-box back-1 market_21_b_btn market_21_row"><span class="casino-odds">2.94</span></div>
														<div class="casino-odds-box back suspended-box back-1 market_31_b_btn market_31_row"><span class="casino-odds">2.94</span></div>
														</div>
														<div class="casino-table-row">
														<div class="casino-nation-detail">
															<div class="casino-nation-name">Pair</div>
														</div>
														<div class="casino-odds-box back suspended-box back-1 market_12_b_btn market_12_row"><span class="casino-odds">5</span></div>
														<div class="casino-odds-box back suspended-box back-1 market_22_b_btn market_22_row"><span class="casino-odds">5</span></div>
														<div class="casino-odds-box back suspended-box back-1 market_32_b_btn market_32_row"><span class="casino-odds">5</span></div>
														</div>
														<div class="casino-table-row">
														<div class="casino-nation-detail">
															<div class="casino-nation-name">Flush</div>
														</div>
														<div class="casino-odds-box back suspended-box back-1 market_13_b_btn market_13_row"><span class="casino-odds">12</span></div>
														<div class="casino-odds-box back suspended-box back-1 market_23_b_btn market_23_row"><span class="casino-odds">12</span></div>
														<div class="casino-odds-box back suspended-box back-1 market_33_b_btn market_33_row"><span class="casino-odds">12</span></div>
														</div>
														<div class="casino-table-row">
														<div class="casino-nation-detail">
															<div class="casino-nation-name">Straight</div>
														</div>
														<div class="casino-odds-box back suspended-box back-1 market_14_b_btn market_14_row"><span class="casino-odds">21</span></div>
														<div class="casino-odds-box back suspended-box back-1 market_24_b_btn market_24_row"><span class="casino-odds">21</span></div>
														<div class="casino-odds-box back suspended-box back-1 market_34_b_btn market_34_row"><span class="casino-odds">21</span></div>
														</div>
														<div class="casino-table-row">
														<div class="casino-nation-detail">
															<div class="casino-nation-name">Trio</div>
														</div>
														<div class="casino-odds-box back suspended-box back-1 market_15_b_btn market_15_row"><span class="casino-odds">126</span></div>
														<div class="casino-odds-box back suspended-box back-1 market_25_b_btn market_25_row"><span class="casino-odds">126</span></div>
														<div class="casino-odds-box back suspended-box back-1 market_35_b_btn market_35_row"><span class="casino-odds">126</span></div>
														</div>
														<div class="casino-table-row">
														<div class="casino-nation-detail">
															<div class="casino-nation-name">Straight Flush</div>
														</div>
														<div class="casino-odds-box back suspended-box back-1 market_16_b_btn market_16_row"><span class="casino-odds">151</span></div>
														<div class="casino-odds-box back suspended-box back-1 market_26_b_btn market_26_row"><span class="casino-odds">151</span></div>
														<div class="casino-odds-box back suspended-box back-1 market_36_b_btn market_36_row"><span class="casino-odds">151</span></div>
														</div>
													</div>
												</div>
											</div>
											<div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=teen9">View All</a></span></div>
											<div class="casino-last-results" id="last-result">
												<!-- <span class="result result-b">L</span><span class="result result-a">T</span><span class="result result-c">D</span><span class="result result-b">L</span><span class="result result-c">D</span><span class="result result-c">D</span><span class="result result-a">T</span><span class="result result-b">L</span><span class="result result-c">D</span><span class="result result-b">L</span> -->
											</div>
										</div>
									</div>
								</div>
								<?php
									include("right_sidebar.php");
									?>
								<div>
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
	var markettype = "TESTTEENPATTI";
	var markettype_2 = markettype;
	var last_result_id = '0';

	function websocket(type) {
		socket = io.connect(websocketurl, {
			transports: ['websocket']
		});
		socket.on('connect', function () {
			socket.emit('Room', 'teen9');
		});
		socket.on('gameIframe', function(data){
			$("#casinoIframe").attr('src',data);
		});
		socket.on('game', function (data) {

			 
			if (data && data['t1'] && data['t1'][0]) {
				if(oldGameId != data.t1[0].mid && data.t1[0].mid != 0 && data.t1[0].mid != "0"){
					setTimeout(function(){
						clearCards();
					},<?php echo CASINO_RESULT_TIMEOUT; ?>);
				}
				oldGameId = data.t1[0].mid;
				if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
					$(".casino-remark").text(data.t1[0].remark);
					if (data.t1[0].C1 != 1) {
						$("#card_c1").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C1 + ".png");
					}
					if (data.t1[0].C2 != 1) {
						$("#card_c2").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C2 + ".png");
					}
					if (data.t1[0].C3 != 1) {
						$("#card_c3").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C3 + ".png");
					}
					if (data.t1[0].C4 != 1) {
						$("#card_c4").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C4 + ".png");
					}
					if (data.t1[0].C5 != 1) {
						$("#card_c5").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C5 + ".png");
					}
					if (data.t1[0].C6 != 1) {
						$("#card_c6").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C6 + ".png");
					}
					if (data.t1[0].C7 != 1) {
						$("#card_c7").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C7 + ".png");
					}
					if (data.t1[0].C8 != 1) {
						$("#card_c8").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C8 + ".png");
					}
					if (data.t1[0].C9 != 1) {
						$("#card_c9").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C9 + ".png");
					}
				}
				clock.setValue(data.t1[0].autotime);
				$(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
				$("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
				eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1];
				for (var j in data['t2']) {
					markettype = "TESTTEENPATTI";
					runner = data['t2'][j].nat || data['t2'][j].nation;
					selectionid = data['t2'][j].tsection;
					trate = data['t2'][j].trate;
					trate = parseFloat(trate);
					var value1 = $('.market_' + selectionid + '_b_exposure').html();
					if(!value1){
						value1 = 0;
					}
					var color1 = parseInt(value1) > 0 ? 'green' : 'black';
					if(value1 == 0){
						value1="";
					}
					back_html = '<span class="d-block text-bold"><b>' + trate + '</b></span> <span class="d-block casino-nation-book market_' + selectionid + '_b_exposure market_exposure" style="color: '+color1+';">'+value1+'</span>';
					$(".market_" + selectionid + "_b_btn").attr("side", "Back");
					$(".market_" + selectionid + "_b_btn").attr("selectionid", selectionid);
					$(".market_" + selectionid + "_b_btn").attr("marketid", selectionid);
					$(".market_" + selectionid + "_b_btn").attr("runner", runner);
					$(".market_" + selectionid + "_b_btn").attr("marketname", runner);
					$(".market_" + selectionid + "_b_btn").attr("eventid", eventId);
					$(".market_" + selectionid + "_b_btn").attr("markettype", markettype);
					$(".market_" + selectionid + "_b_btn").attr("event_name", markettype);
					$(".market_" + selectionid + "_b_btn").attr("fullmarketodds", trate);
					$(".market_" + selectionid + "_b_btn").attr("fullfancymarketrate", trate);
					$(".market_" + selectionid + "_b_btn").html(back_html);
					Lselectionid = data['t2'][j].lsection;
					lrate = data['t2'][j].lrate;
					lrate = parseFloat(lrate);
					var value2 = $('.market_' + Lselectionid + '_b_exposure').html();
			  	  if(!value2){
			  	  	value2 = 0;
			  	  }
				 
				  var color2 = parseInt(value2) > 0 ? 'green' : 'black';
				   if(value2 == 0){
					value2="";
				  }
					back_html = '<span class="d-block text-bold"><b>' + lrate + '</b></span> <span class="d-block casino-nation-book market_' + Lselectionid + '_b_exposure market_exposure" style="color: '+color2+';">'+value2+'</span>';
					$(".market_" + Lselectionid + "_b_btn").attr("side", "Back");
					$(".market_" + Lselectionid + "_b_btn").attr("selectionid", Lselectionid);
					$(".market_" + Lselectionid + "_b_btn").attr("marketid", Lselectionid);
					$(".market_" + Lselectionid + "_b_btn").attr("runner", runner);
					$(".market_" + Lselectionid + "_b_btn").attr("marketname", runner);
					$(".market_" + Lselectionid + "_b_btn").attr("eventid", eventId);
					$(".market_" + Lselectionid + "_b_btn").attr("markettype", markettype);
					$(".market_" + Lselectionid + "_b_btn").attr("event_name", markettype);
					$(".market_" + Lselectionid + "_b_btn").attr("fullmarketodds", lrate);
					$(".market_" + Lselectionid + "_b_btn").attr("fullfancymarketrate", lrate);
					$(".market_" + Lselectionid + "_b_btn").html(back_html);
					Dselectionid = data['t2'][j].dsectionid;
					drate = data['t2'][j].drate;
					drate = parseFloat(drate);
					var value3 = $('.market_' + Dselectionid + '_b_exposure').html();
					if(!value3){
						value3 = 0;
					}
					var color3 = parseInt(value3) > 0 ? 'green' : 'black';
					if(value3 == 0){
						value3="";
					}
					back_html = '<span class="d-block text-bold"><b>' + drate + '</b></span> <span class="d-block casino-nation-book market_' + Dselectionid + '_b_exposure market_exposure" style="color: '+color3+';">'+value3+'</span>';
					$(".market_" + Dselectionid + "_b_btn").attr("side", "Back");
					$(".market_" + Dselectionid + "_b_btn").attr("selectionid", Dselectionid);
					$(".market_" + Dselectionid + "_b_btn").attr("marketid", Dselectionid);
					$(".market_" + Dselectionid + "_b_btn").attr("runner", runner);
					$(".market_" + Dselectionid + "_b_btn").attr("marketname", runner);
					$(".market_" + Dselectionid + "_b_btn").attr("eventid", eventId);
					$(".market_" + Dselectionid + "_b_btn").attr("markettype", markettype);
					$(".market_" + Dselectionid + "_b_btn").attr("event_name", markettype);
					$(".market_" + Dselectionid + "_b_btn").attr("fullmarketodds", drate);
					$(".market_" + Dselectionid + "_b_btn").attr("fullfancymarketrate", drate);
					$(".market_" + Dselectionid + "_b_btn").html(back_html);
					gstatus = data['t2'][j].tstatus.toString();
					if(gstatus == "SUSPENDED" || gstatus == "0" || gstatus =="False"){
						var ab = parseInt(selectionid) + 10;
						var ab2 = parseInt(selectionid) + 20;
						$(".market_"+selectionid+"_row").addClass("suspended-box");
						$(".market_"+ab+"_row").addClass("suspended-box");
						$(".market_"+ab2+"_row").addClass("suspended-box");
					}
					else{
						var ab = parseInt(selectionid) + 10;
						var ab2 = parseInt(selectionid) + 20;
						$(".market_"+selectionid+"_row").removeClass("suspended-box");
						$(".market_"+ab+"_row").removeClass("suspended-box");
						$(".market_"+ab2+"_row").removeClass("suspended-box");
					}
				}
			}
			else {
				$(".timer_game").text("Left Time:0");
				$(".round_no").text("0");
			}
		});
		socket.on('gameResult', function (args) {

			updateResult(args.data);
		});
		socket.on('error', function (data) {});
		socket.on('close', function (data) {});
	}

	function clearCards() {
		refresh(markettype);
		$("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
		$("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
		$("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
		$("#card_c4").attr("src", site_url + "storage/front/img/cards/1.png");
		$("#card_c5").attr("src", site_url + "storage/front/img/cards/1.png");
		$("#card_c6").attr("src", site_url + "storage/front/img/cards/1.png");
		$("#card_c7").attr("src", site_url + "storage/front/img/cards/1.png");
		$("#card_c8").attr("src", site_url + "storage/front/img/cards/1.png");
		$("#card_c9").attr("src", site_url + "storage/front/img/cards/1.png");
	}

	function updateResult(data) {
		console.log("updateResult",data);
		
		if (data && data[0]) {
			resultGameLast = data[0].mid;
			
			if(last_result_id != resultGameLast){
				last_result_id = resultGameLast;
				 
			}
		
			html = "";
			var ab = "";
			var ab1 = "";
			casino_type = "'teen9'";
			data.forEach((runData) => {
				if (parseInt(runData.result) == 11) {
					ab = "a";
					ab1 = "T";
				}
				else if (parseInt(runData.result) == 21) {
					ab = "b";
					ab1 = "L";
				}
				else if(parseInt(runData.result) == 31){
					ab = "c";
					ab1 = "D";
				}
				eventId = runData.mid == 0 ? 0 : runData.mid.split(".")[1];
				html += '<span  onclick="view_casiono_result('+eventId+','+casino_type+')"  class="result ml-1 result-'+ ab +'">'+ ab1 + '</span>';
			});
			$("#last-result").html(html);
			if (oldGameId == 0 || oldGameId == resultGameLast) {
				$("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
				$("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
				$("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
				$("#card_c4").attr("src", site_url + "storage/front/img/cards/1.png");
				$("#card_c5").attr("src", site_url + "storage/front/img/cards/1.png");
				$("#card_c6").attr("src", site_url + "storage/front/img/cards/1.png");
				$("#card_c7").attr("src", site_url + "storage/front/img/cards/1.png");
				$("#card_c8").attr("src", site_url + "storage/front/img/cards/1.png");
				$("#card_c9").attr("src", site_url + "storage/front/img/cards/1.png");
			}
		}
	}

	function teenpatti(type) {
		gameType = type
		websocket();
	}
	teenpatti("ok");
	
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
			}
			else {
				profit = (odds - 1) * inputStake;
			}
		}
		$("#profitLiability").text(profit.toFixed(2));
	});
	jQuery(document).on("click", ".label_stake", function () {
		stake = $(this).attr("stake");
		eventId = $("#fullMarketBetsWrap").attr("eventid");
		$("#inputStake").val(stake);
		odds = parseFloat($("#odds_val").val());
		inputStake = $("#inputStake").val();
		bet_stake_side = $("#bet_stake_side").val();
		bet_markettype = $("#bet_markettype").val();
		if (bet_markettype != "FANCY_ODDS") {
			if (bet_stake_side == "Lay") {
				profit = (odds - 1) * inputStake;
			}
			else {
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
		bet_stake_side = $("#bet_stake_side").val();
		bet_event_id = $("#bet_event_id").val();
		bet_marketId = $("#bet_marketId").val();
		oddsmarketId = bet_marketId;
		eventType = 'TESTTEENPATTI';
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
		}
		else {
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
			}
			else {
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
		setTimeout(function () {
			$.ajax({
				type: 'POST',
				url: 'ajaxfiles/bet_place_test_teenpatti.php',
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
				success: function (response) {
					$(".placeBetLoader").removeClass('show');
					var check_status = response['status'];
					var message = response['message'];
					if (check_status == 'ok') {
						if (bet_markettype != "FANCY_ODDS") {
							oddsNo = runsNo;
						}
						else {
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
					}
					else {
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
</body>
</html>