<?php
include("../include/conn.php");
include('../include/flip_function.php');
include('../session.php');
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

	.kbc .casino-table {
		padding: 5px;
	}

	.row.row5 {
		margin-left: -5px;
		margin-right: -5px;
	}

	.kbc-btns {
		align-items: center;
		width: 100%;
	}

	.kbc-btns {
		width: auto;
	}

	.col-12 {
		flex: 0 0 auto;
		width: 100%;
	}

	.row.row5>[class*="col-"],
	.row.row5>[class*="col"] {
		padding-left: 5px;
		padding-right: 5px;
	}

	.casino-odd-box-container {
		width: 100%;
		margin-bottom: 10px;
		margin-left: 3px;
	}

	.casino-nation-name {
		font-size: 12px;
		font-weight: bold;
	}

	.kbc-btns .casino-nation-name {
		background: #2c3e50;
		border-radius: 12px;
		color: #ffffff;
		padding: 6px;
		border: 1px solid #fdcf13;
		border-bottom: 0;
		text-align: left;
	}

	.btn-group,
	.btn-group-vertical {
		position: relative;
		display: inline-flex;
		vertical-align: middle;
	}

	.kbc-btns .btn-group {
		width: 85%;
		margin: 0 auto;
		display: flex;
		flex-wrap: wrap;
		justify-content: space-between;
	}

	button,
	input,
	optgroup,
	select,
	textarea {
		margin: 0;
		font-family: inherit;
		font-size: inherit;
		line-height: inherit;
	}

	.btn-check {
		position: absolute;
		clip: rect(0, 0, 0, 0);
		pointer-events: none;
	}

	.kbc-btns .btnspan {
		background-color: #72bbef;
		width: calc(50% - 4px);
	}

	.kbc-btns .btn {
		color: #000;
		color: #000;
		border: 2px solid #fdcf13;
		flex: 0 0 auto;
		height: 50px;
		display: flex;
		align-items: center;
		justify-content: center;
		position: relative;
		margin-left: 1px;
		border-top: 0;
		border-radius: 0;
		font-weight: bold;
		font-size: 18px;
	}

	.btn-group>.btn-group:not(:last-child)>.btn,
	.btn-group>.btn:not(:last-child):not(.dropdown-toggle) {
		border-top-right-radius: 0;
		border-bottom-right-radius: 0;
	}

	.kbc-btns .btn img {
		width: 20px;
		margin-right: 5px;
	}

.btn-check:checked+.btn {
	background-color: #198754;
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

	.video-overlay img {
		margin-bottom: 3px;
	}

	@media only screen and (max-width: 767px) {
		.hfquitbtns .hbtn {
			background-image: linear-gradient(-180deg, #03b37f 0, #06553e 100%);
			border-color: #116f52 !important;
			border-width: 2px !important;
			border-top-width: 5px;
			margin-right: 20px;
			color: #fff;
		}

		.hfquitbtns .btn.selected {
			border-color: #fdcf13 !important;
		}

		.hfquitbtns .fbtn {
			background-image: linear-gradient(-180deg, #fc4242 0, #6f0404 100%);
			border-color: #6f0404 !important;
			border-width: 2px !important;
			color: #fff;
		}
	}

	.hfquitbtns {
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
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

	.video-overlay img {
		margin-bottom: 3px;
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


	.kbcbtesbox>div {
		width: calc(33.33% - 6px) !important;
		margin-bottom: 5px;
	}

	.kbcbtesbox {
		display: flex;
		flex-wrap: wrap;
		align-items: center;
		width: 100%;
		padding: 5px;
	}

	.kbcbtesbox .bet-box {
		margin-left: 3px;
		margin-right: 3px;
		width: calc(33.33% - 6px);
		margin-bottom: 5px;
		display: flex;
		justify-content: space-between;
		align-items: center;
		color: #FFF;
	}

	.kbcbtesbox .bet-box {
		background: #2C3E50;
		padding: 5px 10px;
		/* border-radius: 8px; */
		margin-left: 3px;
		margin-right: 3px;
		width: calc(33.33% - 6px);
		margin-bottom: 5px;
		display: flex;
		justify-content: space-between;
		align-items: center;
		min-height: 32px;
		color: #FFF;
	}

	.kbcbtesbox .bet-box span {
		flex: 1;
		text-align: center;
	}

	.kbcbtesbox .bet-box i {
		color: #bd1828;
		cursor: pointer;
	}
</style>

<body cz-shortcut-listen="true">
	<div id="app">
		<?php
		include("loader.php");
		?>
		<div>
			<?php
			include("header.php");
			?>
			<div class="main-content">
				<!---->
				<!---->
				<div>
				<div class="casino-title"><span class="casino-name">K.B.C</span><span class="d-block"><a href="#" onclick="view_rules('kbc')" data-target="#rules_popup" data-toggle="modal" id="rules_popup_btn" class="ml-1" role="button">Rules</a></span></div>

<?php
include("casino_header.php");
?>
					<div class="tab-content">
						<div id="bhav" class="tab-pane active">
							
							<!---->
							<div class="casino-video">


                            <?php 
                            if(!empty(IFRAME_URL_SET)){
                               ?>
                               <iframe src="<?php echo IFRAME_URL."".KBC_CODE;?>" width="100%" height="250px" style="border: 0px;"></iframe>
                               <?php
                                
                            }else{
                                ?>
                                <iframe id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                <?php

                            }
                            ?>

						<!--	<iframe id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
								 <iframe src="<?php echo IFRAME_URL . "" . KBC_CODE; ?>" width="100%" height="200px" style="border: 0px;"></iframe> -->
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
									<div>
										<div>
											<div>
												<img id="card_c1" src="../storage/front/img/cards/1.png">
											</div>
										</div>
										<div>
											<div>
												<img id="card_c2" src="../storage/front/img/cards/1.png">
											</div>
										</div>
										<div>
											<div>
												<img id="card_c3" src="../storage/front/img/cards/1.png">
											</div>
										</div>
										<div>
											<div>
												<img id="card_c4" src="../storage/front/img/cards/1.png">
											</div>
										</div>
										<div>
											<div>
												<img id="card_c5" src="../storage/front/img/cards/1.png">
											</div>
										</div>
									</div>
								</div>
								<div class="bet-note theme2bg theme1color specialRemarkdiv" style="display:none;"><span class="greenbx">Result: </span> <span id="specialRemark"></span></div>
							</div>
							<div class="casino-detail">

								<div class="casino-table markets_all">
									<!-- <div class="row row5 kbc-btns">
										<div class="col-12 col-md-4">
											<div class="casino-odd-box-container">
												<div class="casino-nation-name"><b>[Q1] Red Black</b></div>
												<div class="btn-group">
													<span class="btnspan">
														<input type="radio" class="btn-check" id="redBlack-1" name="redBlackBtn" value="1">
														<label class="form-check-label btn" for="redBlack-1">
															<img src="../storage/front/img/cards/heart.png">
															<img src="../storage/front/img/cards/diamond.png">
														</label>
													</span>
													<span class="btnspan">
														<input type="radio" class="btn-check" id="redBlack-2" name="redBlackBtn" value="2">
														<label class="form-check-label btn" for="redBlack-2">
															<img src="../storage/front/img/cards/spade.png">
															<img src="../storage/front/img/cards/club.png">
														</label>
													</span>
												</div>
											</div>
										</div>
										<div class="col-12 col-md-4">
											<div class="casino-odd-box-container">
												<div class="casino-nation-name"><b>[Q2] Odd Even</b></div>
												<div class="btn-group">
													<span class="btnspan">
														<input type="radio" class="btn-check" id="oddEven-1" name="oddEvenBtn" value="1">
														<label class="form-check-label btn" for="oddEven-1">Odd</label>
													</span>
													<span class="btnspan">
														<input type="radio" class="btn-check" id="oddEven-2" name="oddEvenBtn" value="2"><label class="form-check-label btn" for="oddEven-2">Even</label>
													</span>
												</div>
											</div>
										</div>
										<div class="col-12 col-md-4">
											<div class="casino-odd-box-container">
												<div class="casino-nation-name"><b>[Q3] 7 Up-7 Down</b></div>
												<div class="btn-group">
													<span class="btnspan"><input type="radio" class="btn-check" id="upDown-1" name="7UpDownBtn" value="1"><label class="form-check-label btn" for="upDown-1">Up</label>
													</span>
													<span class="btnspan"><input type="radio" class="btn-check" id="upDown-2" name="7UpDownBtn" value="2"><label class="form-check-label btn" for="upDown-2">Down</label></span>
												</div>
											</div>
										</div>
									</div>
									<div class="row row5 kbc-btns kbcothers mt-xl-3">
										<div class="col-12 col-md-4">
											<div class="casino-odd-box-container">
												<div class="casino-nation-name"><b>[Q4] 3 Card Judgement</b></div>
												<div class="btn-group">
													<span class="btnspan">
														<input type="radio" class="btn-check" id="cardj-1" name="3cardj" value="1">
														<label class="form-check-label btn" for="cardj-1">A23</label>
													</span>
													<span class="btnspan">
														<input type="radio" class="btn-check" id="cardj-2" name="3cardj" value="2">
														<label class="form-check-label btn" for="cardj-2">456</label>
													</span>
													<span class="btnspan">
														<input type="radio" class="btn-check" id="cardj-3" name="3cardj" value="3">
														<label class="form-check-label btn" for="cardj-3">8910</label>
													</span>
													<span class="btnspan">
														<input type="radio" class="btn-check" id="cardj-4" name="3cardj" value="4">
														<label class="form-check-label btn" for="cardj-4">JQK</label>
													</span>
												</div>
											</div>
										</div>
										<div class="col-12 col-md-4">
											<div class="casino-odd-box-container">
												<div class="casino-nation-name"><b>[Q5] Suits</b></div>
												<div class="btn-group">
													<span class="btnspan">
														<input type="radio" class="btn-check" id="suits-1" name="suit" value="1">
														<label class="form-check-label btn" for="suits-1">
															<img src="../storage/front/img/cards/spade.png">
														</label>
													</span>
													<span class="btnspan">
														<input type="radio" class="btn-check" id="suits-2" name="suit" value="2">
														<label class="form-check-label btn" for="suits-2">
															<img src="../storage/front/img/cards/heart.png">
														</label>
													</span>
													<span class="btnspan">
														<input type="radio" class="btn-check" id="suits-3" name="suit" value="3">
														<label class="form-check-label btn" for="suits-3">
															<img src="../storage/front/img/cards/club.png">
														</label>
													</span>
													<span class="btnspan">
														<input type="radio" class="btn-check" id="suits-4" name="suit" value="4">
														<label class="form-check-label btn" for="suits-4">
															<img src="../storage/front/img/cards/diamond.png">
														</label>
													</span>
												</div>
											</div>
										</div>
									</div> -->
								</div>

								<div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=kbc">View All</a></span></div>
								<div class="casino-last-results" id="last-result"></div>

							</div>
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

<script type="text/javascript" src="../js/socket.io.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script src="../storage/front/js/flipclock.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src='footer-js.js?17'></script>

<?

include("betpopcss.php");
?>
<script type="text/javascript">
	var site_url = '<?php echo WEB_URL; ?>';
	var websocketurl = '<?php echo GAME_IP; ?>';
	var clock = new FlipClock($(".clock"), {
		clockFace: "Counter"
	});
	var oldGameId = 0;
	var resultGameLast = 0;
	var data6;
	var markettype = "KBC";
	var markettype_2 = markettype;
	var last_result_id = '0';
	var old_eid = '0';

	function websocket(type) {
		socket = io.connect(websocketurl, {
			transports: ['websocket']
		});
		socket.on('connect', function() {
			socket.emit('Room', 'kbc');
		});
		socket.on('gameIframe', function(data){
    	$("#casinoIframe").attr('src',data);
    });
		socket.on('game', function(data) {
			
			data1 = data;
			if (data && data.t1) {
				if (oldGameId != data1.t1[0].mid && data1.t1[0].mid != 0 && data1.t1[0].mid != "0") {
					setTimeout(function() {
						clearCards();
					}, <?php echo CASINO_RESULT_TIMEOUT; ?>);
				}
				oldGameId = data1.t1[0].mid;
				if (data1.t1[0].mid != 0 && data1.t1[0].mid != "0" && oldGameId != resultGameLast) {
					$(".casino-remark").text(data.t1[0].remark);

					if (data.t1[0].C1 != "1") {
						$("#card_c1").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C1 +
							".png");
					}
					if (data.t1[0].C2 != "1") {
						$("#card_c2").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C2 +
							".png");
					}
					if (data.t1[0].C3 != "1") {
						$("#card_c3").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C3 +
							".png");

					}
					if (data.t1[0].C4 != "1") {
						$("#card_c4").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C4 +
							".png");

					}
					if (data.t1[0].C5 != "1") {
						$("#card_c5").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C5 +
							".png");
					}
				}
				clock.setValue(data.t1[0].autotime);
				$(".round_no").text(data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid);
				$("#casino_event_id").val(data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid);
				eventId = data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid;
				var markets_red_black = "";
				var markets_odd_even = "";
				var markets_up_down = "";
				var markets_cards = "";
				var markets_suits = "";
				for (var j in data.t2) {
					selectionid = data.t2[j].sectionId || data.t2[j].sid;
					new_selectionid = selectionid;
					runner = data.t2[j].nation || data.t2[j].nat;
					b1 = data.t2[j].b1;
					bs1 = data.t2[j].bs1;
					l1 = data.t2[j].l1;
					ls1 = data.t2[j].ls1;
					visible = data.t2[j].visible;
					subtype = data.t2[j].subtype;
					if (visible == "1" || true) {
						/*back_html = '<span  class="odd d-block">' + b1_label + '</span> <span  class="market_' + selectionid + '_b_exposure market_exposure" style="color: '+color1+';">'+value1+'</span>';
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
						$(".market_" + selectionid + "_b_btn").html(back_html);*/
						var statuss = "";

						gstatus = data.t2[j].gstatus.toString();
						if (gstatus == "SUSPENDED" || gstatus == "0") {
							/*  $(".market_" + selectionid + "_row").addClass("suspended"); */
							statuss = "suspended";
						} else {
							/*  $(".market_" + selectionid + "_row").removeClass("suspended"); */
						}
						if (data.t2[j].odds) {
							for (var k in data.t2[j].odds) {
								odd_selectionid = new_selectionid + "_" + data.t2[j].odds[k].ssid;
								odd_runner = data.t2[j].odds[k].nat;
								/* odd_b1 = data.t2[j].odds[k].b; */
								odd_b1 = 2;
								sno = data.t2[j].odds[k].sno;
								if (old_eid == eventId) {
									$(".market_" + odd_selectionid + "_row").addClass(statuss);
									continue;
								}
								var back_data =
									`side="Back" selectionid="${odd_selectionid}" marketkey="${new_selectionid}" marketid="${odd_selectionid}" runner="${odd_runner}" marketname="${odd_runner}" eventid="${eventId}" markettype="${markettype}" event_name="${markettype}" fullmarketodds="${odd_b1}" fullfancymarketrate="${odd_b1}"`;
								if (subtype == "redblack") {
									var imgg_block = ` <img src="../storage/front/img/cards/heart.png">
                                                                <img src="../storage/front/img/cards/diamond.png">`;
									if (odd_runner == "Black") {
										imgg_block = `<img src="../storage/front/img/cards/spade.png">
                                                                <img src="../storage/front/img/cards/club.png">`;
									}
									markets_red_black += `
                                    
                                     <span class="btnspan back-1 market_${odd_selectionid}_row  market_${odd_selectionid}_b_btn ${statuss}" ${back_data}>
                                                            <input type="radio" class="btn-check" id="${subtype}-${sno}" name="${new_selectionid}Btn" value="${data.t2[j].odds[k].ssid}">
                                                            <label class="form-check-label btn" for="${subtype}-${sno}">
                                                                ${imgg_block}
                                                            </label>
                                    </span>`;
								}
								if (subtype == "oddeven") {

									markets_odd_even += `
                                    
                                     <span class="btnspan back-1 market_${odd_selectionid}_row  market_${odd_selectionid}_b_btn ${statuss}" ${back_data}>
                                                            <input type="radio" class="btn-check" id="${subtype}-${sno}" name="${new_selectionid}Btn" value="${data.t2[j].odds[k].ssid}">
                                                            <label class="form-check-label btn" for="${subtype}-${sno}">
                                                                ${odd_runner}
                                                            </label>
                                    </span>`;
								}

								if (subtype == "updown") {

									markets_up_down += `
                                    
                                     <span class="btnspan back-1 market_${odd_selectionid}_row  market_${odd_selectionid}_b_btn ${statuss}" ${back_data}>
                                                            <input type="radio" class="btn-check" id="${subtype}-${sno}" name="${new_selectionid}Btn" value="${data.t2[j].odds[k].ssid}">
                                                            <label class="form-check-label btn" for="${subtype}-${sno}">
                                                                ${odd_runner}
                                                            </label>
                                        </span>`;
								}


								if (subtype == "Cardj") {

									markets_cards += `
                                    
                                     <span class="btnspan back-1 market_${odd_selectionid}_row  market_${odd_selectionid}_b_btn ${statuss}" ${back_data}>
                                                          <input type="radio" class="btn-check" id="${subtype}-${sno}" name="${new_selectionid}Btn" value="${data.t2[j].odds[k].ssid}">
                                                        <label class="form-check-label btn" for="${subtype}-${sno}">${odd_runner}</label>
                                        </span>`;
								}



								if (subtype == "color") {

									var imgg = odd_runner.toLowerCase();
									markets_suits += `
                                    
                                     <span class="btnspan back-1 market_${odd_selectionid}_row  market_${odd_selectionid}_b_btn ${statuss}" ${back_data}>
                                                          <input type="radio" class="btn-check" id="${subtype}-${sno}" name="${new_selectionid}Btn" value="${data.t2[j].odds[k].ssid}">
                                                        <label class="form-check-label btn" for="${subtype}-${sno}">
                                                        <img src="../storage/front/img/cards/${imgg}.png">
                                                        </label>
                                            </span>`;
								}
							}
						}
					}
				}
				if (old_eid != eventId) {
					$(".markets_all").html(`<div class="row row5 kbc-btns">
                                                <div class="col-12 col-md-4">
                                                    <div class="casino-odd-box-container">
                                                        <div class="casino-nation-name"><b>[Q1] Red Black</b></div>
                                                        <div class="btn-group">
                                ${markets_red_black}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="casino-odd-box-container">
                                                        <div class="casino-nation-name"><b>[Q2] Odd Even</b></div>
                                                        <div class="btn-group">
            ${markets_odd_even}
                                                        </div>
                                                           
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="casino-odd-box-container">
                                                        <div class="casino-nation-name"><b>[Q3] 7 Up-7 Down</b></div>
                                                        <div class="btn-group">
            ${markets_up_down}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row5 kbc-btns kbcothers mt-xl-3">
                                                <div class="col-12 col-md-4">
                                                    <div class="casino-odd-box-container">
                                                        <div class="casino-nation-name"><b>[Q4] 3 Card Judgement</b></div>
                                                        <div class="btn-group">
                                                            
            ${markets_cards}
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="casino-odd-box-container">
                                                        <div class="casino-nation-name"><b>[Q5] Suits</b></div>
                                                        <div class="btn-group">
            ${markets_suits}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>`);
				}
				old_eid = eventId;
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

	function clearCards() {
		refresh(markettype);
		$("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
		$("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
		$("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
		$("#card_c4").attr("src", site_url + "storage/front/img/cards/1.png");
		$("#card_c5").attr("src", site_url + "storage/front/img/cards/1.png");
        closeBetSlip();

	}

	function updateResult(data) {
		
		
		if (data && data[0]) {
			data = JSON.parse(JSON.stringify(data));
			resultGameLast = data[0].mid;

			if (last_result_id != resultGameLast) {
				last_result_id = resultGameLast;
				refresh(markettype);
			}

			html = "";
			casino_type = "'kbc'";
			data.forEach((runData) => {

				eventId = runData.mid == 0 ? 0 : runData.mid;
				html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs result ml-1 result-b">R</span>';
			});
			$("#last-result").html(html);
			if (oldGameId == 0 || oldGameId == resultGameLast) {
				$("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
				$("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
				$("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
				$("#card_c4").attr("src", site_url + "storage/front/img/cards/1.png");
				$("#card_c5").attr("src", site_url + "storage/front/img/cards/1.png");
                closeBetSlip();
			}
		}
	}

	function teenpatti(type) {
		gameType = type
		websocket();
	}

	teenpatti("ok");
	var nat_1 = {
		1: '',
		2: '',
		3: '',
		4: '',
		5: '',
	};
	var nat_2 = {
		1: '',
		2: '',
		3: '',
		4: '',
		5: '',
	};
	jQuery(document).on("click", ".back-1", function() {
		var fullmarketodds = $(this).attr("fullmarketodds");
		if (fullmarketodds != "") {
			side = $(this).attr("side");
			selectionid = $(this).attr("selectionid");
			market_odd_name = $(this).attr("markettype");
			runner = $(this).attr("runner");
			market_runner_name = runner;

			var marketkey = $(this).attr("marketkey");
            nat_1[marketkey]=market_runner_name;
            nat_2[marketkey]=selectionid;
			if (Object.values(nat_1).includes('')) {
				return true;
			}
			var blockk="";
			
            $.each(nat_1, function(key, value) {
                if(value == ""){
                    blockk+=` <div class="bet-box"></div>`;
                }
                if(value != ""){
                    blockk+=` <div class="bet-box ${key}">
                          <span>${value}</span><i class="float-right fas fa-times closeblock" marketkey="${key}"></i>  
                    </div>`;
                }
            });
			blockk+=`<div class="bet-input back-border">
										<input type="number" class="form-control input-stake" id="inputStake" value="">
									</div>`;
			$(".kbcbtesbox").html(blockk);
			
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
			$("#oddsmarketId").val(marketId);
			$("#market_runner_name").val(market_runner_name);
			$("#market_odd_name").val(market_odd_name);

			$('#profitLiability').text('');
			$(".placeBet").attr('disabled', false);
			$("#inputStake").val("");

			$('.open_back_place_bet').show();
			$('#open_back_place_bet').modal("show");
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
	jQuery(document).on("click", ".closeblock", function() {
		var marketkey = $(this).attr("marketkey");
		nat_1[marketkey] = '';
		nat_2[marketkey] = '';
		$('input[name="' + marketkey + 'Btn"]').prop('checked', false);
		$('.' + marketkey).html('');
		$('.open_back_place_bet').hide();
		$('#open_back_place_bet').modal("hide");
	});

	jQuery(document).on("click", ".close-bet-slip", closeBetSlip);

    function closeBetSlip() {
		$(".back-1").removeClass("select");
        $(".lay-1").removeClass("select");
        nat_1 = {
            1: '',
            2: '',
            3: '',
            4: '',
            5: '',
        };
		nat_2 = {
            1: '',
            2: '',
            3: '',
            4: '',
            5: '',
        };
		questiontype="5";
		var blockk="";
		$.each(nat_1, function(key, value) {
                if(value == ""){
                    blockk+=` <div class="bet-box"></div>`;
                }
                if(value != ""){
                    blockk+=` <div class="bet-box ${key}">
                          <span>${value}</span><i class="float-right fas fa-times closeblock" marketkey="${key}"></i>  
                    </div>`;
                }
            });
			blockk+=`<div class="bet-input back-border">
										<input type="number" class="form-control input-stake" id="inputStake" value="">
									</div>`;
			$(".kbcbtesbox").html(blockk);
        $('input[type="radio"]').prop('checked', false);
		$('.open_back_place_bet').hide();
		$('#open_back_place_bet').modal("hide");
	}
	var questiontype="5";
	jQuery(document).on("click", ".questiontype", function() {
		questiontype=$(this).data('value');
		
	});
	jQuery(document).on("click", "#placeBet", function() {
		
		$("#placeBet").html('<i class="fa fa-spinner  fa-spin"></i> Submit');
		$(".placeBet").attr('disabled', true);
		$(".placeBet").removeAttr("id", "placeBet");
		var last_place_bet = "";
		bet_stake_side = $("#bet_stake_side").val();
		bet_type = bet_stake_side;
		bet_event_id = $("#bet_event_id").val();
		bet_marketId = $("#bet_marketId").val();
		oddsmarketId = bet_marketId;
		eventType = 'KBC';
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

		$("#bet-error-class").removeClass("b-toast-danger");
		$("#bet-error-class").removeClass("b-toast-success");
		setTimeout(function() {
			$.ajax({
				type: 'POST',
				url: '../ajaxfiles/bet_place_kbc.php',
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
					nat_1: JSON.stringify(nat_1),
					nat_2: JSON.stringify(nat_2),
					questiontype: questiontype,
				},
				success: function(response) {
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
						"iconClass":"toast-success",
						"positionClass":"toast-top-center",
						"extendedTImeout": "0"
					});
					/*$("#bet-error-class").addClass("b-toast-success");*/
					} else {
						toastr.clear()
					toastr.warning("", message, {
						"timeOut": "3000",
						"iconClass":"toast-warning",
						"positionClass":"toast-top-center",
						"extendedTImeout": "0"
					});
					/*$("#bet-error-class").addClass("b-toast-danger");*/
					}
					/*error_message_text = message;
					$("#errorMsgText").text(error_message_text);
					$("#errorMsg").fadeIn('fast').delay(3000).hide(0);*/
					$(".close-bet-slip").click();
					refresh(markettype);
					$(".placeBet").attr("id", "placeBet");
					$("#placeBet").html('Submit');
					$(".placeBet").attr('disabled', false);
					$('.open_back_place_bet').hide();
					$('#open_back_place_bet').modal("hide");
					closeBetSlip();
				}
			});
		}, bet_sec - 2000);
	});
</script>
<style>
	  .modal-body {
    padding: 0px !important;
}
</style>
<div id="open_back_place_bet" class="modal open_back_place_bet" role="dialog">
    <div class="modal-dialog" style="margin:0;">
        <div role="document" id="__BVID__30___BV_modal_content_" tabindex="-1" class="modal-content">
            <header id="__BVID__30___BV_modal_header_" class="modal-header">
                <h5 id="__BVID__30___BV_modal_title_" class="modal-title">Place Bet</h5>
                <button type="button" data-dismiss="modal" class="close">&times;</button>
            </header>
            <div id="__BVID__30___BV_modal_body_" class="modal-body" style="    padding: 0px;">
                <div class="place-bet1 pt-2 pb-2 back place-bet-modal" id="popup_color">
                       <div class="row row5">
                            <div class="col-6"><b id="market_runner_label"></b></div>
                            <div class="col-6 text-right pt-1">Profit: <span id="profitLiability"></span></div>
                        </div>
                        <div class="odd-stake-box">
							
                            <!-- <div class="row row5 mt-1">
                                <div class="col-6 text-center">Odds</div>
                                <div class="col-6 text-center">Amount</div>
                            </div> -->
                            <div class="row row5 mt-1">
                                <!-- <div class="col-6"><input type="text" id="odds_val" class="stakeinput w-100" disabled="" value="1.7"></div> -->
								<div class="col-12">
									<div class="kbcbtesbox">
										
									</div>
									<div class="hfquitbtns"><button class="btn hbtn questiontype" data-value="4">4 Cards Quit</button><button class="btn fbtn questiontype" data-value="50">50-50 Quit</button></div>
								</div>
                                <div class="col-12">
                                   <!--  <div class="float-right"><input type="number" id="inputStake" class="stakeinput w-100" value=""></div> -->
                                    <input type='hidden' id='market_runner_label' value='' />
                                    <input type='hidden' id='bet_stake_side' value='' /><input type='hidden' id='bet_event_id' value='' /><input type='hidden' id='bet_marketId' value='' /><input type='hidden' id='bet_event_name' value='' /><input type='hidden' id='bet_market_name' value='' /><input type='hidden' id='bet_markettype' value='' /><input type='hidden' id='fullfancymarketrate' value='' /> <input type='hidden' id='oddsmarketId' value='' /><input type='hidden' id='market_runner_name' value='' /><input type='hidden' id='market_odd_name' value='' />
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row row5">
                            <div class="col-5"><b id="market_runner_label">Player A</b></div>
                            <div class="col-7 text-right">
                                <div class="float-right">
                                    <button class="stakeactionminus btn disabled">
                                        <span class="fa fa-minus"></span>
                                    </button>
                                    <input type="text" placeholder="0" class="stakeinput" id="odds_val">
                                    <button class="stakeactionminus btn disabled">
                                        <span class="fa fa-plus"></span>
                                    </button>
                                </div>
                            </div>
                        </div> -->

                       <!--  <div class="row row5 mt-2">
                            <div class="col-4">
                                <input type="number" placeholder="00" id="inputStake" class="stakeinput w-100">
                            </div>
                            <div class="col-4">
                                <button class="btn btn-primary btn-block  placeBet" id="placeBet">
                                    Submit
                                </button>
                            </div>

                        </div> -->
                        <div class="place-bet-buttons mt-1">
                            <?php
                            $get_button_value = $conn->query("select * from user_master where id=$user_id and (casino_button_value <> '' and casino_button_value IS NOT NULL)");
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
                            } else {
                                $fetch_button_value_data = mysqli_fetch_assoc($get_button_value);
                                $fetch_button_value = $fetch_button_value_data['casino_button_value'];
                                $default_stake = $fetch_button_value_data['default_stake'];
                                $one_bet_default_stake = $fetch_button_value_data['one_bet_default_stake'];
                                $button_array = explode(",", $fetch_button_value);
                            }
                            foreach ($button_array as $button_value) {
                            ?>
                                <button type="button" class="btn-place-bet btn btn-secondary btn-block1 label_stake" stake='<?php echo $button_value; ?>'>
                                        +<?php echo $button_value; ?>
                                    </button>
                               
                            <?php
                            }
                            ?>
                        </div>
                        <div class="mt-1 place-bet-btn-box">
                            <button class="btn btn-link stackclear" style="text-decoration: underline;">Clear</button>
                            <button class="btn btn-info" data-target="#set_btn_value" data-toggle="modal">Edit</button>
                            <button class="btn btn-danger" data-dismiss="modal" class="close">Reset</button>
                            <button class="btn btn-success placeBet" id="placeBet" disabled>Place Bet</button>
                        </div>
							<div class="mt-1 d-flex"><span>Range: 25 to 1L</span></div>
                </div>
            </div>
            <!---->
        </div>
    </div>
</div>
<div id="errorMsg" class="b-toaster b-toaster-top-center" style="display:none;">
	<div class="b-toaster-slot vue-portal-target">
		<div role="alert" aria-live="assertive" aria-atomic="true" id="bet-error-class" class="b-toast b-toast-solid b-toast-prepend b-toast-danger">
			<div tabindex="0" class="toast">
				<header class="toast-header"><strong class="mr-2" id="errorMsgText"></strong>

				</header>
				<div class="toast-body"> </div>
			</div>
		</div>
	</div>
</div>
<?php
include "footer.php";
include "footer-result-popup.php";
?>

</html>