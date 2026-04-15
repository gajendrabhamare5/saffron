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
		padding: 5px;
	}

	.casino-table-box:first-child {
		padding-bottom: 20px;
		position: relative;
		margin-bottom: 10px !important;
	}

	/* .casino-table-box:first-child {
        width: 70%;
        margin: 0 auto;
    } */

	.casino-table-box:first-child::after {
		content: "";
		background-color: #2c3e50b3;
		height: 1px;
		width: 50%;
		position: absolute;
		left: 50%;
		transform: translateX(-50%);
		-webkit-transform: translateX(-50%);
		-moz-transform: translateX(-50%);
		-ms-transform: translateX(-50%);
		-o-transform: translateX(-50%);
		bottom: 0;
	}

	.casino-table-header,
	.casino-table-row {
		display: flex;
		flex-wrap: wrap;
		justify-content: space-between;
		border-bottom: 1px solid #c7c8ca;
	}

	.casino-table-header,
	.casino-table-body {
		width: 100%;
	}

	.casino-table-header,
	.casino-table-body {
		border-left: 1px solid #c7c8ca;
		border-top: 1px solid #c7c8ca;
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
		min-height: unset;
	}

	.casino-nation-detail {
		width: 60%;
		flex-direction: revert;
		justify-content: space-between;
		align-items: center;
		padding: 0 10px;
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

	.casino-odds-box-theme {
		background-image: linear-gradient(to right, #0088cc, #2c3e50);
		color: #ffffff;
		border-radius: 4px;
		box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
		border: 0;
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

	.casino-table-header,
	.casino-table-body {
		width: 100%;
	}

	/* .casino-table-header, .casino-table-body {
        border-left: 1px solid #c7c8ca;
    } */

	.casino-nation-name {
		font-size: 12px;
		font-weight: bold;
	}

	.casino-nation-detail .casino-nation-name {
		max-width: calc(100% - 65px);
	}

	.casino-odds {
		font-size: 14px;
		font-weight: bold;
		line-height: 1;
	}

	.casino-table-left-box,
	.casino-table-center-box,
	.casino-table-right-box {
		width: 49%;
		border-left: 1px solid #c7c8ca;
		border-right: 1px solid #c7c8ca;
		border-top: 1px solid #c7c8ca;
		background-color: #f2f2f2;
	}

	.casino-table-left-box,
	.casino-table-right-box {
		width: 49%;
		padding: 10px 10px 0 10px;
	}

	.aaa-odd-box {
		margin-bottom: 10px;
		min-height: 92px;
	}

	.casino-table-left-box .casino-odds-box,
	.casino-table-right-box .casino-odds-box {
		width: 100%;
		margin: 5px 0;
	}

	.suspended-box {
		position: relative;
		pointer-events: none;
		cursor: none;
	}

	.suspended-box::before {
		background-image: url(/storage/front/img/lock.svg);
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
		background-color: #2c3e50d9;
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

	.dkd-total {
		padding: 5px;
		margin-right: 0;
		border: 1px solid yellow;
		color: #fff;
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
		width: 190px;
		margin-top: 5px;
		align-items: center;
	}

	.dkd-total {
		width: 140px;
	}

	.dkd-total>div:first-child {
		width: 100%;
		display: flex;
		flex-wrap: wrap;
		justify-content: space-between;
	}

	.dkd-total>div:first-child>div {
		display: flex;
		flex-wrap: wrap;
		align-items: center;
		justify-content: center;
	}

	.dkd-total>div {
		line-height: normal;
	}
	.video-overlay .ab-rtlslider1 {
		width: 90px !important;
	}
	.video-overlay img {
    width: 24px !important;
    margin-right: unset !important;
}
.suspended::after,.suspended::before {
		width: 100% !important;
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
					<div class="casino-title"><span class="casino-name">Dus ka Dum</span><span class="d-block"><a href="#" onclick="view_rules('dum10')" data-target="#rules_popup" data-toggle="modal" id="rules_popup_btn" class="ml-1" role="button">Rules</a></span></div>

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
                               <iframe src="<?php echo IFRAME_URL."".DUM10_CODE;?>" width="100%" height="250px" style="border: 0px;"></iframe>
                               <?php
                                
                            }else{
                                ?>
                                <iframe id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                <?php

                            }
                            ?>

							<!--	<iframe id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
								 <iframe src="<?php echo IFRAME_URL . "" . DUM10_CODE; ?>" width="100%" height="200px" style="border: 0px;"></iframe> -->
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
											<div class="dkd-total mb-1 mt-1">
												<div>
													<div>
														<div>Curr. Total:</div>
														<div class="numeric text-playerb cards_total">0</div>
													</div>
													<div>Card #:<span class="no_cards"> 0 </span></div>
												</div>
												<div class="runnernext"></div>
											</div>
											<div class="d-flex">
												<div id="dum10-cards" class="ab-rtlslider ab-rtlslider1 owl-carousel owl-theme owl-rtl owl-loaded owl-drag mt-1">
													<div class="owl-stage-outer">
														<div class="owl-stage" id="cards_1" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 196px;">

														</div>
													</div>
													<div class="owl-nav">
														<button type="button" role="presentation" class="owl-prev disabled"><span aria-label="Previous">&#8249;</span></button>
														<button type="button" role="presentation" class="owl-next"><span aria-label="Next">&#8250;</span></button>
													</div>
													<div class="owl-dots disabled"></div>
												</div>
												<div class="mt-1 ml-1">
													<img id="card_c1" src="../storage/front/img/cards/1.png">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="bet-note theme2bg theme1color specialRemarkdiv" style="display:none;"><span class="greenbx">Result: </span> <span id="specialRemark"></span></div>
							</div>
							<div class="casino-detail">

								<div class="casino-table">
									<div class="casino-table-box">
										<div class="casino-table-header">
											<div class="casino-nation-detail"></div>
											<div class="casino-odds-box back">Back</div>
											<div class="casino-odds-box lay">Lay</div>
										</div>
										<div class="casino-table-body">
											<div class="casino-table-row ">
												<div class="casino-nation-detail">
													<div class="casino-nation-name market_1_name">Next Total 240 or More</div>
													<div class="casino-nation-book w-100 market_1_b_exposure market_exposure"></div>
												</div>
												<div class="casino-odds-box back  suspended  market_1_row market_1_b_btn back-1"><span class="casino-odds market_1_b_value">0</span></div>
												<div class="casino-odds-box lay  suspended  market_1_row market_1_l_btn lay-1"><span class="casino-odds market_1_l_value">0</span></div>
											</div>
										</div>
									</div>
									<div class="casino-table-box mt-1">
										<div class="casino-table-left-box">
											<div class="aaa-odd-box">
												<div class="casino-odds text-center market_5_b_value">0</div>
												<div class="casino-odds-box back casino-odds-box-theme  suspended  market_5_row market_5_b_btn back-1"><span class="casino-odds market_5_name">Even</span></div>
												<div class="casino-nation-book text-center w-100 market_5_b_exposure market_exposure"></div>
											</div>
											<div class="aaa-odd-box">
												<div class="casino-odds text-center market_6_b_value">0</div>
												<div class="casino-odds-box back casino-odds-box-theme  suspended  market_6_row market_6_b_btn back-1"><span class="casino-odds market_6_name">Odd</span></div>
												<div class="casino-nation-book text-center w-100 market_6_b_exposure market_exposure"></div>
											</div>
										</div>
										<div class="casino-table-right-box">
											<div class="aaa-odd-box">
												<div class="casino-odds text-center market_3_b_value">0</div>
												<div class="casino-odds-box back casino-odds-box-theme  suspended  market_3_row market_3_b_btn back-1">
													<div class="casino-odds"><span class="card-icon ms-1"><span class="card-red ">{</span></span><span class="card-icon ms-1"><span class="card-red ">[</span></span></div>
														
												</div>
												<div class="casino-nation-book text-center w-100 market_3_b_exposure market_exposure"></div>
											</div>
											<div class="aaa-odd-box">
												<div class="casino-odds text-center market_4_b_value">0</div>
												<div class="casino-odds-box back casino-odds-box-theme  suspended  market_4_row market_4_b_btn back-1">
													<div class="casino-odds"><span class="card-icon ms-1"><span class="card-black ">}</span></span><span class="card-icon ms-1"><span class="card-black ">]</span></span></div>
													
												</div>
												<div class="casino-nation-book text-center w-100 market_4_b_exposure market_exposure"></div>
											</div>
										</div>
									</div>
								</div>

								<div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=teen33">View All</a></span></div>
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
<script src="../storage/front/js/owl.carousel.min.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src='footer-js.js?9'></script>
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
	var markettype = "DUM10";
	var markettype_2 = markettype;
	var last_result_id = '0';

	function websocket(type) {
		socket = io.connect(websocketurl);
		socket.on('connect', function() {
			socket.emit('Room', 'dum10');
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
					if (data.t1[0].cards != 1) {
						$("#card_c1").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].cards +
							".png");
					}else{
						$("#card_c1").attr("src", site_url + "storage/front/img/cards_new/1.png");
					}
					var desc = data.t1[0].lcard;
					desc = desc.split(",");
					$(".no_cards").html(desc.length);
					var card_count = 0;
					aall = [];
					for(var i in desc){
						
						if(desc[i] != 1){
							aall.push(desc[i]);
							card_value = getType(desc[i]);
							card_rank = card_value.rank;
							card_count += card_rank;
						}
						
					}
					$(".cards_total").text(card_count);


					acards_html_array = [];
					var acards_html = "";
					var len1 = 0;

					if(aall != ""){
						for(ac in aall){


							acards_html_array.push('  <div class="owl-item " id="owl_ac_img_id'+ac+'" style=""><div class="item"><img src="../storage/front/img/cards_new/'+aall[ac]+'.png"></div></div>');
							acards_html += acards_html_array[len1];

						len1++;
							if(len1 == aall.length){
								acards_html_array.reverse();

								acards_html = acards_html_array.join('');

								$("#cards_1").html(acards_html);
								$('#dum10-cards').owlCarousel().trigger('add.owl.carousel',
								[jQuery(acards_html)]).trigger('refresh.owl.carousel');
							}else{
								$("#cards_1").html(acards_html);
								$('#dum10-cards').owlCarousel().trigger('add.owl.carousel',
								[jQuery(acards_html)]).trigger('refresh.owl.carousel');
							}



						}

					}
					else{
						$("#cards_1").html("");
						$('#dum10-cards').owlCarousel().trigger('add.owl.carousel',
										[jQuery(acards_html)]).trigger('refresh.owl.carousel');
					}
				}
				clock.setValue(data.t1[0].autotime);
				$(".round_no").text(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
				eventId = data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid;
				for (var j in data['t2']) {
					selectionid = data.t2[j].sectionId || data.t2[j].sid;
					runner = data.t2[j].nation || data.t2[j].nat;
					b1 = data.t2[j].b1;
					bs1 = data.t2[j].bs1;
					l1 = data.t2[j].l1;
					ls1 = data.t2[j].ls1;

					
					$(".market_" + selectionid + "_name").html(runner);
					if(selectionid == 1){
						$(".runnernext").html(runner);
					}
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
					$(".market_" + selectionid + "_b_value").html(b1);

					$(".market_" + selectionid + "_l_btn").attr("side", "Back");
					$(".market_" + selectionid + "_l_btn").attr("selectionid", selectionid);
					$(".market_" + selectionid + "_l_btn").attr("marketid", selectionid);
					$(".market_" + selectionid + "_l_btn").attr("runner", runner);
					$(".market_" + selectionid + "_l_btn").attr("marketname", runner);
					$(".market_" + selectionid + "_l_btn").attr("eventid", eventId);
					$(".market_" + selectionid + "_l_btn").attr("markettype", markettype);
					$(".market_" + selectionid + "_l_btn").attr("event_name", markettype);
					$(".market_" + selectionid + "_l_btn").attr("fullmarketodds", l1);
					$(".market_" + selectionid + "_l_btn").attr("fullfancymarketrate", l1);
					$(".market_" + selectionid + "_l_value").html(l1);
					
					gstatus = data.t2[j].gstatus.toString();
                    if (gstatus == "SUSPENDED" || gstatus == "0") {
                        $(".market_" + selectionid + "_row").addClass("suspended");
                    } else {
                        $(".market_" + selectionid + "_row").removeClass("suspended");
                    }
				}
			}
		});
		socket.on('gameResult', function(args) {
			console.log("gameResult",args);
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
                rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ?
                    11 : data[0] == '10' ?
                    10 : parseInt(data[0])
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
                    rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ?
                    11 : data[0] == '10' ?
                    10 : parseInt(data[0])
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
                        rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ?
                    11 : data[0] == '10' ?
                    10 : parseInt(data[0])
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
							rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ?
                    11 : data[0] == '10' ?
                    10 : parseInt(data[0])
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
		$("#cards_1").html("");
		/* $('#dum10-cards').owlCarousel().trigger('add.owl.carousel',
		[jQuery('')]).trigger('refresh.owl.carousel');
		$("#card_c1").attr("src", site_url + "storage/front/img/cards_new/1.png"); */
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
			casino_type = "'dum10'";
			data.forEach((runData) => {
				if (parseInt(runData.win) == 1) {
					ab = "result-a";
					ab1 = "Y";

				} else if (parseInt(runData.win) == 2) {
					ab = "result-b";
					ab1 = "N";

				} else {
					ab = "result-c";
					ab1 = "R";
				}

				eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] : runData.mid;
				html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs  ' + ab + ' result">' + ab1 + '</span>';
			});
			$("#last-result").html(html);
			if (oldGameId == 0 || oldGameId == resultGameLast) {
				$("#cards_1").html("")
			}
		}
	}

	function teenpatti(type) {
		gameType = type
		websocket();
	}

	teenpatti("ok");
	jQuery(document).on("click", ".back-1", function() {
		$("#popup_color").removeClass("back");
		$("#popup_color").removeClass("lay");
		$("#popup_color").addClass("back");
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
	jQuery(document).on("click", ".lay-1", function() {
		$("#popup_color").removeClass("back");
		$("#popup_color").removeClass("lay");
		$("#popup_color").addClass("lay");
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
		eventType = 'DUM10';
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
				url: '../ajaxfiles/bet_place_dum10.php',
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
					bet_type:bet_type
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
				}
			});
		}, bet_sec - 2000);
	}); 


	



	(function ( $ ) {


carousel_start();
jQuery("#andar_div").owlCarousel({

rtl: true,
loop: false,
margin: 2,
nav: true,
responsive: {
  0: {
	items: 6
  },

  600: {
	items: 6
  },

  1000: {
	items: 6
  },
}
});

}( jQuery ));


	function carousel_start(){
	jQuery("#dum10-cards").owlCarousel({
		  rtl:true,
		  loop: false,
		  margin: 1,
		  nav: true,
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
						<div class="row row5 mt-1">
							<div class="col-6 text-center">Odds</div>
							<div class="col-6 text-center">Amount</div>
						</div>
						<div class="row row5 mt-1">
							<div class="col-6"><input type="text" id="odds_val" class="stakeinput w-100" disabled="" value="1.7"></div>
							<div class="col-6">
								<div class="float-right"><input type="number" id="inputStake" class="stakeinput w-100" value=""></div>
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
							<div class="mt-1 d-flex"><span>Range: 100 to 10k</span></div>
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