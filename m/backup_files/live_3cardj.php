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

.casino-title{
    display: flex;
}

.casino-title .d-block{
    margin-top:1px;
}

.casino-title a{
    color: #fff;
    text-decoration: underline;
}
</style>

<body cz-shortcut-listen="true">
    <div id="app">
        <?php
	include ("loader.php");
?>
        <div>
            <?php
				include("header.php");
			?>
            <div class="main-content">
                <!---->
                <!---->
                <div>
                    
                    <div class="tab-content">
                        <div id="bhav" class="tab-pane active">
                            <div class="casino-title"><span class="casino-name">3 Cards Judgement</span><span class="d-block"><a href="#" onclick="view_rules()" data-target="#rules_popup" data-toggle="modal" id="rules_popup_btn" class="ml-1" role="button">Rules</a></span></div>

                            <?php
                                include("casino_header.php");
                            ?>
                            <!---->
                            <div class="casino-video">
                                <iframe src="<?php echo IFRAME_URL."".A3CJ_CODE;?>" width="100%" height="200" style="border: 0px;"></iframe>
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
                                </div>
                                <div class="video-overlay">
                                    <div>
                                        <div>
                                            <div>
											<img id="card_c1" src="../storage/front/img/cards/1.png">
												<img id="card_c2" src="../storage/front/img/cards/1.png"> 
												<img id="card_c3" src="../storage/front/img/cards/1.png">
											</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="casino-container tpjudgement">
                                <div class="andar-bx back">
                                    <div class="ab-title"><b>Yes - 1.78</b> <span class="float-right text-danger"><b style="color: black;" class="market_1_b_exposure market_exposure">0</b></span></div>
                                    <div class="text-center ab-content suspended  market_1_row">
                                        <div id="andar_div" class="owl-carousel owl-theme ab-slider owl-loaded owl-drag">
                                            <div class="owl-stage-outer">
                                                <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 845px;">
                                                    <div class="owl-item active" style="width: 55px; margin-right: 10px;">
                                                        <div class="d-inline-block mr-1"><img src="../storage/mobile/img/andar_bahar/1.jpg" class="back-1 market_1_b_btn" nat_1="A"></div>
                                                    </div>
                                                    <div class="owl-item active" style="width: 55px; margin-right: 10px;">
                                                        <div class="d-inline-block mr-1"><img src="../storage/mobile/img/andar_bahar/2.jpg" class="back-1 market_1_b_btn" nat_1="2"></div>
                                                    </div>
                                                    <div class="owl-item active" style="width: 55px; margin-right: 10px;">
                                                        <div class="d-inline-block mr-1"><img src="../storage/mobile/img/andar_bahar/3.jpg" class="back-1 market_1_b_btn" nat_1="3"></div>
                                                    </div>
                                                    <div class="owl-item active" style="width: 55px; margin-right: 10px;">
                                                        <div class="d-inline-block mr-1"><img src="../storage/mobile/img/andar_bahar/4.jpg" class="back-1 market_1_b_btn" nat_1="4"></div>
                                                    </div>
                                                    <div class="owl-item active" style="width: 55px; margin-right: 10px;">
                                                        <div class="d-inline-block mr-1"><img src="../storage/mobile/img/andar_bahar/5.jpg" class="back-1 market_1_b_btn" nat_1="5"></div>
                                                    </div>
                                                    <div class="owl-item" style="width: 55px; margin-right: 10px;">
                                                        <div class="d-inline-block mr-1"><img src="../storage/mobile/img/andar_bahar/6.jpg" class="back-1 market_1_b_btn" nat_1="6"></div>
                                                    </div>
                                                    <div class="owl-item" style="width: 55px; margin-right: 10px;">
                                                        <div class="d-inline-block mr-1"><img src="../storage/mobile/img/andar_bahar/7.jpg" class="back-1 market_1_b_btn" nat_1="7"></div>
                                                    </div>
                                                    <div class="owl-item" style="width: 55px; margin-right: 10px;">
                                                        <div class="d-inline-block mr-1"><img src="../storage/mobile/img/andar_bahar/8.jpg" class="back-1 market_1_b_btn" nat_1="8"></div>
                                                    </div>
                                                    <div class="owl-item" style="width: 55px; margin-right: 10px;">
                                                        <div class="d-inline-block mr-1"><img src="../storage/mobile/img/andar_bahar/9.jpg" class="back-1 market_1_b_btn" nat_1="9"></div>
                                                    </div>
                                                    <div class="owl-item" style="width: 55px; margin-right: 10px;">
                                                        <div class="d-inline-block mr-1"><img src="../storage/mobile/img/andar_bahar/10.jpg" class="back-1 market_1_b_btn" nat_1="10"></div>
                                                    </div>
                                                    <div class="owl-item" style="width: 55px; margin-right: 10px;">
                                                        <div class="d-inline-block mr-1"><img src="../storage/mobile/img/andar_bahar/11.jpg" class="back-1 market_1_b_btn" nat_1="J"></div>
                                                    </div>
                                                    <div class="owl-item" style="width: 55px; margin-right: 10px;">
                                                        <div class="d-inline-block mr-1"><img src="../storage/mobile/img/andar_bahar/12.jpg" class="back-1 market_1_b_btn" nat_1="Q"></div>
                                                    </div>
                                                    <div class="owl-item" style="width: 55px; margin-right: 10px;">
                                                        <div class="d-inline-block mr-1"><img src="../storage/mobile/img/andar_bahar/13.jpg" class="back-1 market_1_b_btn" nat_1="K"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-nav">
                                                <button type="button" role="presentation" class="owl-prev disabled"><span aria-label="Previous">‹</span></button>
                                                <button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button>
                                            </div>
                                            <div class="owl-dots disabled"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="remark text-right mt-1 pr-2">
                                    <marquee scrollamount="3">
                                        <p class="mb-0">Select any 3 card and you will win if you will get at least 1 card from the 3 cards you have selected.</p>
                                    </marquee>
                                </div>
                                <div class="bahar-bx lay">
                                    <div class="ab-title"><b>No - 1.84</b> <span class="float-right text-danger"><b style="color: black;" class="market_2_b_exposure market_exposure">0</b></span></div>
                                    <div class="text-center ab-content suspended market_2_row">
                                        <div id="bahar_div" class="owl-carousel owl-theme ab-slider owl-loaded owl-drag">
                                            <div class="owl-stage-outer">
                                                <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 845px;">
                                                    <div class="owl-item active" style="width: 55px; margin-right: 10px;">
                                                        <div class="d-inline-block mr-1"><img src="../storage/mobile/img/andar_bahar/1.jpg" class=" lay-1 market_2_l_btn" nat_1="A"></div>
                                                    </div>
                                                    <div class="owl-item active" style="width: 55px; margin-right: 10px;">
                                                        <div class="d-inline-block mr-1"><img src="../storage/mobile/img/andar_bahar/2.jpg" class=" lay-1 market_2_l_btn" nat_1="2"></div>
                                                    </div>
                                                    <div class="owl-item active" style="width: 55px; margin-right: 10px;">
                                                        <div class="d-inline-block mr-1"><img src="../storage/mobile/img/andar_bahar/3.jpg" class=" lay-1 market_2_l_btn" nat_1="3"></div>
                                                    </div>
                                                    <div class="owl-item active" style="width: 55px; margin-right: 10px;">
                                                        <div class="d-inline-block mr-1"><img src="../storage/mobile/img/andar_bahar/4.jpg" class=" lay-1 market_2_l_btn" nat_1="4"></div>
                                                    </div>
                                                    <div class="owl-item active" style="width: 55px; margin-right: 10px;">
                                                        <div class="d-inline-block mr-1"><img src="../storage/mobile/img/andar_bahar/5.jpg" class=" lay-1 market_2_l_btn" nat_1="5"></div>
                                                    </div>
                                                    <div class="owl-item" style="width: 55px; margin-right: 10px;">
                                                        <div class="d-inline-block mr-1"><img src="../storage/mobile/img/andar_bahar/6.jpg" class=" lay-1 market_2_l_btn" nat_1="6"></div>
                                                    </div>
                                                    <div class="owl-item" style="width: 55px; margin-right: 10px;">
                                                        <div class="d-inline-block mr-1"><img src="../storage/mobile/img/andar_bahar/7.jpg" class=" lay-1 market_2_l_btn" nat_1="7"></div>
                                                    </div>
                                                    <div class="owl-item" style="width: 55px; margin-right: 10px;">
                                                        <div class="d-inline-block mr-1"><img src="../storage/mobile/img/andar_bahar/8.jpg" class=" lay-1 market_2_l_btn" nat_1="8"></div>
                                                    </div>
                                                    <div class="owl-item" style="width: 55px; margin-right: 10px;">
                                                        <div class="d-inline-block mr-1"><img src="../storage/mobile/img/andar_bahar/9.jpg" class=" lay-1 market_2_l_btn" nat_1="9"></div>
                                                    </div>
                                                    <div class="owl-item" style="width: 55px; margin-right: 10px;">
                                                        <div class="d-inline-block mr-1"><img src="../storage/mobile/img/andar_bahar/10.jpg" class=" lay-1 market_2_l_btn" nat_1="10"></div>
                                                    </div>
                                                    <div class="owl-item" style="width: 55px; margin-right: 10px;">
                                                        <div class="d-inline-block mr-1"><img src="../storage/mobile/img/andar_bahar/11.jpg" class=" lay-1 market_2_l_btn" nat_1="J"></div>
                                                    </div>
                                                    <div class="owl-item" style="width: 55px; margin-right: 10px;">
                                                        <div class="d-inline-block mr-1"><img src="../storage/mobile/img/andar_bahar/12.jpg" class=" lay-1 market_2_l_btn" nat_1="Q"></div>
                                                    </div>
                                                    <div class="owl-item" style="width: 55px; margin-right: 10px;">
                                                        <div class="d-inline-block mr-1"><img src="../storage/mobile/img/andar_bahar/13.jpg" class=" lay-1 market_2_l_btn" nat_1="K"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-nav">
                                                <button type="button" role="presentation" class="owl-prev disabled"><span aria-label="Previous">‹</span></button>
                                                <button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button>
                                            </div>
                                            <div class="owl-dots disabled"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="remark text-right mt-1 pr-2">
                                    <marquee scrollamount="3">
                                        <p class="mb-0">Select any 3 card and you will win If you do not get any card from the 3 cards you have selected.</p>
                                    </marquee>
                                </div>
                               <div class="last-result-tiele"><span>Last Result</span> <span class="float-right"><a href="casinoresults?game_type=3cardj" class="">View All</a></span></div>
                                <div class="last-result-container text-right mt-1" id="last-result">
								
								
								
								</div>
                                <!---->
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

<script type="text/javascript" src="../js/socket.io.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script src="../storage/front/js/flipclock.js" type="text/javascript"></script>
<script src="../storage/front/js/owl.carousel.min.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src='footer-js.js'></script>

 <script type="text/javascript">
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
	var markettype = "3_CARD_J";
	var markettype_2 = markettype;
	var back_html = "";
	var lay_html = "";
	var gstatus = "";
	var last_result_id = '0';
	
	function websocket(type) {
		socket = io.connect(websocketurl);
		socket.on('connect', function () {
			socket.emit('Room', '3cardj');
		});
		
		 socket.on('game', function(data) {	
			
		  if (data && data['t1'] && data['t1'][0]) {
		  	if(oldGameId != data.t1[0].mid && data.t1[0].mid != 0 && data.t1[0].mid != "0"){
		  		setTimeout(function(){
						clearCards();
					},<?php echo CASINO_RESULT_TIMEOUT; ?>);
		  	}
		  	oldGameId = data.t1[0].mid;
        		if(data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast){
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
				
				
					
				
			}
			clock.setValue(data.t1[0].autotime);
			$(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
			$("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
			eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1];
			
				for(var j in data['t2']){
				  	selectionid = parseInt(data['t2'][j].sid);
					runner = data['t2'][j].nat || data['t2'][j].nation;
					b1 = data['t2'][j].rate;
					l1 = data['t2'][j].rate;
					
				  	
				  	
				  	markettype = "3_CARD_J";
					
				 	if(selectionid == 1){
						$(".market_"+selectionid+"_b_value").text(b1);
						$(".market_"+selectionid+"_b_btn").attr("side","Back");
						$(".market_"+selectionid+"_b_btn").attr("selectionid",selectionid);
						$(".market_"+selectionid+"_b_btn").attr("marketid",selectionid);
						$(".market_"+selectionid+"_b_btn").attr("runner",runner);
						$(".market_"+selectionid+"_b_btn").attr("marketname",runner);
						$(".market_"+selectionid+"_b_btn").attr("eventid",eventId);
						$(".market_"+selectionid+"_b_btn").attr("markettype",markettype);
						$(".market_"+selectionid+"_b_btn").attr("event_name",markettype);
						$(".market_"+selectionid+"_b_btn").attr("fullmarketodds",b1);
						$(".market_"+selectionid+"_b_btn").attr("fullfancymarketrate",b1);
					}else{
						$(".market_"+selectionid+"_l_value").text(l1);
						$(".market_"+selectionid+"_l_btn").attr("side","Lay");
						$(".market_"+selectionid+"_l_btn").attr("selectionid",selectionid);
						$(".market_"+selectionid+"_l_btn").attr("marketid",selectionid);
						$(".market_"+selectionid+"_l_btn").attr("runner",runner);
						$(".market_"+selectionid+"_l_btn").attr("marketname",runner);
						$(".market_"+selectionid+"_l_btn").attr("eventid",eventId);
						$(".market_"+selectionid+"_l_btn").attr("markettype",markettype);
						$(".market_"+selectionid+"_l_btn").attr("event_name",markettype);
						$(".market_"+selectionid+"_l_btn").attr("fullmarketodds",l1);
						$(".market_"+selectionid+"_l_btn").attr("fullfancymarketrate",l1);
					}
				  	
					
					
					
					
					
				 	gstatus =  data['t2'][j].gstatus.toString();
					if(gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED"){
						
						$(".market_" + selectionid + "_row").addClass("suspended");
						$(".market_"+selectionid+"_b_btn").removeClass("back-1");
					}
					else {
						$(".market_"+selectionid+"_b_btn").addClass("back-1");
						$(".market_" + selectionid + "_row").removeClass("suspended");
					}
			}
			
			
		
        }
    });
	
		socket.on('gameResult', function (args) {
			updateResult(args.data);
		});
		socket.on('error', function (data) {});
		socket.on('close', function (data) {});
	}
	

	function updateResult(data) {
		data = JSON.parse(JSON.stringify(data));
		resultGameLast = data[0].mid;
		
		if(last_result_id != resultGameLast){
			last_result_id = resultGameLast;
			refresh(markettype);
		}
		
		var html = "";
		casino_type = "'3cardj'";
		data.forEach((runData) => {
			
				ab = "playera";
				ab1 = "R";
			
			eventId = runData.mid == 0 ? 0 : runData.mid.split(".")[1];
				html += '<span onclick="view_casiono_result('+eventId+','+casino_type+')"  class="ball-runs  '+ ab +' last-result">'+ ab1 + '</span>';
		});
		$("#last-result").html(html);
		if(oldGameId == 0 || oldGameId == resultGameLast){	
			
			
			
		}
	}

	function clearCards(){
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
	var nat_1=[];
	var nat_count = 0;
	var back = 0;
	var lay = 0;
	
	jQuery(document).on("click", ".back-1", function () {		
	
	nat_1_temp = $(this).attr("nat_1");
	if(lay > 0){
			return false;
		}
			check_already = nat_1.includes(nat_1_temp);
			if(check_already){
				return false;
			}
			nat_1.push(nat_1_temp);
			nat_count++;
			$(this).addClass("selected");
		if(nat_count != 3){
				return false;
		}
	
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
			
			
			return_html = "";
			var nat_1_string = nat_1.join();
				
			$("#inputStake").val();
			$("#market_runner_label").text(market_runner_name +" "+nat_1_string);
			$("#bet_stake_side").val("Back");
			$("#odds_val").val(fullmarketodds);
			$("#bet_event_id").val(eventId);
			$("#bet_marketId").val(marketId);
			$("#bet_event_name").val(event_name);
			$("#bet_market_name").val(marketname);
			$("#bet_markettype").val(markettype);
			$("#fullfancymarketrate").val(fullfancymarketrate);			
			$("#oddsmarketId").val(marketId);
			$("#market_runner_name").val(market_runner_name+" "+nat_1_string);
			$("#market_odd_name").val(market_odd_name);
			
			$('#profitLiability').text('0');
			$(".placeBet").attr('disabled',false);
			$("#inputStake").val("0");
			
			$('.open_back_place_bet').show();
			$('#open_back_place_bet').modal("show");
		}
	});			
	
	jQuery(document).on("click", ".lay-1", function () {		
	
	
	if(back > 0){
			return false;
		}
		
	nat_1_temp = $(this).attr("nat_1");
		
		check_already = nat_1.includes(nat_1_temp);
			if(check_already){
				return false;
			}
			nat_1.push(nat_1_temp);
			nat_count++;
			$(this).addClass("selected");
			if(nat_count != 3){
				return false;
		}
			
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
			
			
			return_html = "";
			var nat_1_string = nat_1.join();
			$("#inputStake").val();
			$("#market_runner_label").text(market_runner_name+" "+nat_1_string);
			$("#bet_stake_side").val("Lay");
			$("#odds_val").val(fullmarketodds);
			$("#bet_event_id").val(eventId);
			$("#bet_marketId").val(marketId);
			$("#bet_event_name").val(event_name);
			$("#bet_market_name").val(marketname);
			$("#bet_markettype").val(markettype);
			$("#fullfancymarketrate").val(fullfancymarketrate);			
			$("#oddsmarketId").val(marketId);
			$("#market_runner_name").val(market_runner_name+" "+nat_1_string);
			$("#market_odd_name").val(market_odd_name);
			
			$('#profitLiability').text('0');
			$(".placeBet").attr('disabled',false);
			$("#inputStake").val("0");
			
			$('.open_back_place_bet').show();			
			$('#open_back_place_bet').modal("show");
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
	if(bet_markettype != "FANCY_ODDS"){
		if(bet_stake_side == "Lay"){
			profit = parseInt(inputStake);
		}else{
			profit = (odds - 1 ) * inputStake;
		}
	}
	$("#profitLiability").text(profit.toFixed(2));
});
jQuery(document).on("click", ".label_stake", function () {
   stake = $(this).attr("stake");
   eventId = $("#fullMarketBetsWrap").attr("eventid");
	$("#inputStake").val(stake);
	odds =  parseFloat($("#odds_val").val());
    inputStake = $("#inputStake").val();
    bet_stake_side = $("#bet_stake_side").val();
	bet_markettype = $("#bet_markettype").val();
	if(bet_markettype != "FANCY_ODDS"){
		if(bet_stake_side == "Lay"){
			profit = (odds - 1 ) * inputStake;
		}else{
			profit = (odds - 1 ) * inputStake;
		}
	}
	$("#profitLiability").text(profit.toFixed(2));
});

jQuery(document).on("click", "#placeBet", function () {
	
	 $("#placeBet").html('<i class="fa fa-spinner  fa-spin"></i> Submit');
	 
	 	$(".placeBet").attr('disabled',true);
	 	
		$(".placeBet").removeAttr("id","placeBet");
		
		$("#bet-error-class").removeClass("b-toast-danger");
		$("#bet-error-class").removeClass("b-toast-success");
		 if(nat_count != 3){
		 $("#bet-error-class").addClass("b-toast-danger");
		 
		 $("#errorMsgText").text("Bet Not Confirmed Card Not Valid");
		$("#errorMsg").fadeIn('fast').delay(3000).hide(0);
		$(".close-bet-slip").click();
	 }
		var last_place_bet= "";
		nat_1=[];
		nat_count = 0;
		
		bet_stake_side = $("#bet_stake_side").val();		bet_type = bet_stake_side;
		bet_event_id = $("#bet_event_id").val();
		bet_marketId = $("#bet_marketId").val();
		oddsmarketId = bet_marketId;
		eventType = '3_CARD_J';
		bet_event_name = $("#bet_event_name").val();
		inputStake = $("#inputStake").val();
		market_runner_name = $("#market_runner_name").val();
		market_odd_name = $("#market_odd_name").val();
		var runsNo; 
		var oddsNo; 
		bet_market_name = $("#bet_market_name").val();
		eventManualType = 'Auto';
		if(bet_stake_side == "Lay"){
			type = "No";
			class_type = "no";
			unmatched_side_type = false;
		}else{
			type = "Yes";
			class_type = "yes";
			unmatched_side_type = true;
		}
		bet_markettype = $("#bet_markettype").val();
		if(bet_markettype != "FANCY_ODDS"){
			bet_market_type = bet_markettype;
			runsNo = parseFloat($("#odds_val").val());
			oddsNo = parseFloat($("#odds_val").val());
			if(bet_stake_side == "Lay"){
				return_stake = (oddsNo - 1 ) * inputStake;
				return_stake = parseInt(return_stake);
			}else{
				return_stake = (oddsNo - 1 ) * inputStake;
				return_stake = parseInt(return_stake);
			}
		bet_seconds = 1;
		bet_sec = 1000;
		}
		
		/* $("#inputStake").val(""); */
		$(".back-1").removeClass("select");
		$(".lay-1").removeClass("select");
		$("#loadingMsg").show();
		$('.header_Back_'+bet_event_id).remove();
		$('.header_Lay_'+bet_event_id).remove();
		$('#betSlipFullBtn').hide();
		$('#backSlipHeader').hide();
		$('#laySlipHeader').hide();
		$(".back-1").removeClass("select");
		$(".lay-1").removeClass("select");
		
		
		setTimeout(function(){ 
			$.ajax({
				 type: 'POST',
				 url: '../ajaxfiles/bet_place_3_card_j.php',
				 dataType: 'json',
				 data: {eventId:bet_event_id,eventType:eventType,marketId:bet_marketId,stack:inputStake,type:type,odds:oddsNo,runs:runsNo,bet_market_type:bet_market_type,oddsmarketId:oddsmarketId,eventManualType:eventManualType,market_runner_name:market_runner_name,market_odd_name:market_odd_name,bet_event_name:bet_event_name,bet_type:bet_type},
				 success: function(response) {
					var check_status = response['status'];
					var message = response['message'];
					if(check_status == 'ok'){
							if(bet_markettype != "FANCY_ODDS"){
								oddsNo = runsNo;
							}else{
								oddsNo = oddsNo;
							}
							auth_key = 1;
							$("#bet-error-class").addClass("b-toast-success");
						}else{
							$("#bet-error-class").addClass("b-toast-danger");
						}
						error_message_text = message;
						$("#errorMsgText").text(error_message_text);
						$("#errorMsg").fadeIn('fast').delay(3000).hide(0);
						$(".close-bet-slip").click();
						refresh(markettype);
						$(".placeBet").attr("id","placeBet");
						$("#placeBet").html('Submit');
						$(".placeBet").attr('disabled',false);
						$('.open_back_place_bet').hide();
						$('#open_back_place_bet').modal("hide");
				 }
			 });
		 }, bet_sec - 2000);
	});
	
	
		(function ( $ ) { 

   
	
		jQuery("#andar_div").owlCarousel({
		  rtl: false,
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
		jQuery("#bahar_div").owlCarousel({
		  rtl: false,
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


$(document).ready(function(){
$('#open_back_place_bet').on('hide.bs.modal', function () {
  $(".back-1").removeClass("select");
	$(".lay-1").removeClass("select");
	back = 0;
	lay = 0;
	nat_count = 0;
	nat_1=[];
	$(".selected").removeClass("selected");
});
});
</script>  
<div id="open_back_place_bet" class="modal open_back_place_bet" role="dialog" >
   <div class="modal-dialog">
      <div role="document" id="__BVID__30___BV_modal_content_" tabindex="-1" class="modal-content">
         <header id="__BVID__30___BV_modal_header_" class="modal-header">
            <h5 id="__BVID__30___BV_modal_title_" class="modal-title">Placebet</h5>
            <button type="button" data-dismiss="modal" class="close">&times;</button>                
         </header>
         <div id="__BVID__30___BV_modal_body_" class="modal-body" style="    padding: 0px;">
            <div class="place-bet pt-2 pb-2 back" id="popup_color">
               <div class="container-fluid container-fluid-5">
                  <div class="row row5">
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
<input type='hidden' id='bet_stake_side' value=''/><input type='hidden' id='bet_event_id' value=''/><input type='hidden' id='bet_marketId' value=''/><input type='hidden' id='bet_event_name' value=''/><input type='hidden' id='bet_market_name' value=''/><input type='hidden' id='bet_markettype' value=''/><input type='hidden' id='fullfancymarketrate' value=''/> <input type='hidden' id='oddsmarketId' value=''/><input type='hidden' id='market_runner_name' value=''/><input type='hidden' id='market_odd_name' value=''/> 
							</div>
                     </div>
                  </div>
                  <div class="row row5 mt-2">
                     <div class="col-4">                                    
                     	<input type="number" placeholder="00" id="inputStake" class="stakeinput w-100">                                
                     </div>
                     <div class="col-4">
                        <button class="btn btn-primary btn-block  placeBet" id="placeBet">
                           <!---->Submit                                    
                        </button>
                     </div>
                     <div class="col-4 text-center pt-1"><span id="profitLiability">0</span></div>
                  </div>
                  <div class="row row5 mt-2">
                     <?php										
                     	$get_button_value = $conn->query("select * from user_master where id=$user_id and (button_value <> '' and button_value IS NOT NULL)");					
                     	$num_rows = $get_button_value->num_rows;					
                     	$button_array = array();					
                     	if($num_rows <= 0){						
                     		$button_array[] = 500;						
                     		$button_array[] = 1000;						
                     		$button_array[] = 2000;						
                     		$button_array[] = 3000;						
                     		$button_array[] = 4000;						
                     		$button_array[] = 5000;						
                     		$button_array[] = 10000;						
                     		$button_array[] = 20000;					
                     	}else{						
                     		$fetch_button_value_data = mysqli_fetch_assoc($get_button_value);						
                     		$fetch_button_value = $fetch_button_value_data['button_value'];						
                     		$default_stake = $fetch_button_value_data['default_stake'];						
                     		$one_bet_default_stake = $fetch_button_value_data['one_bet_default_stake'];						
                     		$button_array = explode(",",$fetch_button_value);					}										
                     		foreach($button_array as $button_value){				
                     ?>														
                    	 		<div class="col-4">                                   
                    	 			<button type="button" class="btn btn-secondary btn-block mb-2 label_stake" stake='<?php echo $button_value; ?>'>                                       
                    	 				<?php echo $button_value; ?>                                    
                    	 			</button>                                
                    	 		</div>
                     <?php					
                     		}				
                     ?>								                                                            
                  </div>
               </div>
            </div>
         </div>
         <!---->            
      </div>
   </div>
</div>
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
	include "footer.php";
	include "footer-result-popup.php";
?>
</html>