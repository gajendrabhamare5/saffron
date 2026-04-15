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
                            <div class="casino-title"><span class="casino-name">Test Teenpatti</span><span class="d-block"><a href="#" onclick="view_rules()" data-target="#rules_popup" data-toggle="modal" id="rules_popup_btn" class="ml-1" role="button">Rules</a></span></div>

                            <?php
                                include("casino_header.php");
                            ?>
                            <!---->
                            <div class="casino-video">
								<iframe src="<?php echo IFRAME_URL; echo TESTTEENPATTI_CODE; ?>" width="100%" height="200" style="border: 0px;"></iframe>
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
                                                    <div class="inn">3</div>
                                                </div>
                                                <div class="down">
                                                    <div class="shadow"></div>
                                                    <div class="inn">3</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="flip-clock-active">
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
                                    </ul>
                                </div>
                                <div class="video-overlay">
                                    <div>
                                        <div>
                                            <h3 class="text-white">Tiger</h3>
                                            <div>
                                            	<img id="card_c1" src="/storage/mobile/img/cards/1.png">
                                            	<img id="card_c2" src="/storage/mobile/img/cards/1.png">
                                            	<img id="card_c3"  src="/storage/mobile/img/cards/1.png">
                                            </div>
                                        </div>
                                        <div>
                                            <h3 class="text-white">Lion</h3>
                                            <div>
                                            	<img id="card_c4"  src="/storage/mobile/img/cards/1.png"> 
                                            	<img id="card_c5"  src="/storage/mobile/img/cards/1.png"> 
                                            	<img id="card_c6"  src="/storage/mobile/img/cards/1.png">
                                            </div>
                                        </div>
                                        <div>
                                            <h3 class="text-white">Dragon</h3>
                                            <div>
                                            	<img id="card_c7" src="/storage/mobile/img/cards/1.png"> 
                                            	<img id="card_c8" src="/storage/mobile/img/cards/1.png"> 
                                            	<img id="card_c9" src="/storage/mobile/img/cards/1.png">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="casino-container teenpatti-test">
                                <div class="table-responsive mb-1">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th class="box-4 min-max">Min:100 Max:200000</th>
                                                <th colspan="3" class="box-6 back text-center">BACK</th>
                                            </tr>
                                            <tr>
                                                <th class="box-4"></th>
                                                <th class="box-2 back text-center"><b>Tiger</b></th>
                                                <th class="box-2 back text-center"><b>Lion</b></th>
                                                <th class="box-2 back text-center"><b>Dragon</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="suspended market_11_row market_21_row market_31_row">
                                                <td class="box-4"><b>Winner</b></td>
                                                <td class="box-2 back text-center back-1 market_11_b_btn"><span class="odds d-block"><b>2.94</b></span> <span style="color: black;" class="market_11_b_exposure market_exposure">0</span></td>
                                                <td class="box-2 back text-center back-1 market_21_b_btn"><span class="odds d-block"><b>2.94</b></span> <span style="color: black;" class="market_21_b_exposure market_exposure">0</span></td>
                                                <td class="box-2 back text-center back-1 market_31_b_btn"><span class="odds d-block"><b>2.94</b></span> <span style="color: black;" class="market_31_b_exposure market_exposure">0</span></td>
                                            </tr>
                                            <tr class="suspended market_12_row market_22_row market_32_row">
                                                <td class="box-4"><b>Pair</b></td>
                                                <td class="box-2 back text-center back-1 market_12_b_btn"><span class="odds d-block"><b>5.00</b></span> <span style="color: black;" class="market_12_b_exposure market_exposure">0</span></td>
                                                <td class="box-2 back text-center back-1 market_22_b_btn"><span class="odds d-block"><b>5.00</b></span> <span style="color: black;" class="market_22_b_exposure market_exposure">0</span></td>
                                                <td class="box-2 back text-center back-1 market_32_b_btn"><span class="odds d-block"><b>5.00</b></span> <span style="color: black;" class="market_32_b_exposure market_exposure">0</span></td>
                                            </tr>
                                            <tr class="suspended market_13_row market_23_row market_33_row">
                                                <td class="box-4"><b>Flush</b></td>
                                                <td class="box-2 back text-center back-1 market_13_b_btn"><span class="odds d-block"><b>12.00</b></span> <span style="color: black;" class="market_13_b_exposure market_exposure">0</span></td>
                                                <td class="box-2 back text-center back-1 market_23_b_btn"><span class="odds d-block"><b>12.00</b></span> <span style="color: black;" class="market_23_b_exposure market_exposure">0</span></td>
                                                <td class="box-2 back text-center back-1 market_33_b_btn"><span class="odds d-block"><b>12.00</b></span> <span style="color: black;" class="market_33_b_exposure market_exposure">0</span></td>
                                            </tr>
                                            <tr class="suspended market_14_row market_24_row market_34_row">
                                                <td class="box-4"><b>Straight</b></td>
                                                <td class="box-2 back text-center back-1 market_14_b_btn"><span class="odds d-block"><b>21.00</b></span> <span style="color: black;" class="market_14_b_exposure market_exposure">0</span></td>
                                                <td class="box-2 back text-center back-1 market_24_b_btn"><span class="odds d-block"><b>21.00</b></span> <span style="color: black;" class="market_24_b_exposure market_exposure">0</span></td>
                                                <td class="box-2 back text-center back-1 market_34_b_btn"><span class="odds d-block"><b>21.00</b></span> <span style="color: black;" class="market_34_b_exposure market_exposure">0</span></td>
                                            </tr>
                                            <tr class="suspended market_15_row market_25_row market_35_row">
                                                <td class="box-4"><b>Trio</b></td>
                                                <td class="box-2 back text-center back-1 market_15_b_btn"><span class="odds d-block"><b>126.00</b></span> <span style="color: black;" class="market_15_b_exposure market_exposure">0</span></td>
                                                <td class="box-2 back text-center back-1 market_25_b_btn"><span class="odds d-block"><b>126.00</b></span> <span style="color: black;" class="market_25_b_exposure market_exposure">0</span></td>
                                                <td class="box-2 back text-center back-1 market_35_b_btn"><span class="odds d-block"><b>126.00</b></span> <span style="color: black;" class="market_35_b_exposure market_exposure">0</span></td>
                                            </tr>
                                            <tr class="suspended market_16_row market_26_row market_36_row">
                                                <td class="box-4"><b>Straight Flush</b></td>
                                                <td class="box-2 back text-center back-1 market_16_b_btn"><span class="odds d-block"><b>151.00</b></span> <span style="color: black;" class="market_16_b_exposure market_exposure">0</span></td>
                                                <td class="box-2 back text-center back-1 market_26_b_btn"><span class="odds d-block"><b>151.00</b></span> <span style="color: black;" class="market_26_b_exposure market_exposure">0</span></td>
                                                <td class="box-2 back text-center back-1 market_36_b_btn"><span class="odds d-block"><b>151.00</b></span> <span style="color: black;" class="market_36_b_exposure market_exposure">0</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="remark text-right pr-2">
                                    <marquee scrollamount="3">
                                        <p class="mb-0">Incase of Tie, The entire round will be cancelled || Odds are considered same as international exchange. || In "Trio" result, "Pair" should not be considered. || In "Straight Flush" result, "Straight" and "Flush" should not be considered.</p>
                                    </marquee>
                                </div>
                                <div class="last-result-tiele"><span>Last Result</span> <span class="float-right"><a href="casinoresults?game_type=teen9" class="">View All</a></span></div>
                                <div id="last-result" class="last-result-container text-right mt-1"></div>
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

<script type="text/javascript" src="../js/socket.io.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script src="../storage/front/js/flipclock.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src='footer-js.js'></script>

 <script type="text/javascript">
	var site_url = '<?php echo WEB_URL; ?>';
	var websocketurl = '<?php echo GAME_IP; ?>';
	var clock = new FlipClock($(".clock"), {
		clockFace: "Counter"
	});
	var oldGameId = 0;
	var markettype = "TESTTEENPATTI";
	var markettype_2 = markettype;
    var resultGameLast = 0;
    var last_result_id = '0';
    
	function websocket(type) {
		socket = io.connect(websocketurl);
		socket.on('connect', function() {
			socket.emit('Room', 'teen9');
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
				if (data.t1[0].C1 != 1){ 
					$("#card_c1").attr("src",site_url + "storage/front/img/cards/" + data.t1[0].C1 + ".png");
				}
				if (data.t1[0].C2 != 1){ 
					$("#card_c2").attr("src",site_url + "storage/front/img/cards/" + data.t1[0].C2 + ".png");
				}
				if (data.t1[0].C3 != 1){ 
					$("#card_c3").attr("src",site_url + "storage/front/img/cards/" + data.t1[0].C3 + ".png");
				}
				if (data.t1[0].C4 != 1){ 
					$("#card_c4").attr("src",site_url + "storage/front/img/cards/" + data.t1[0].C4 + ".png");
				}
				if (data.t1[0].C5 != 1){ 
					$("#card_c5").attr("src",site_url + "storage/front/img/cards/" + data.t1[0].C5 + ".png");
				}
				if (data.t1[0].C6 != 1){ 
					$("#card_c6").attr("src",site_url + "storage/front/img/cards/" + data.t1[0].C6 + ".png");
				}
				if (data.t1[0].C7 != 1){ 
					$("#card_c7").attr("src",site_url + "storage/front/img/cards/" + data.t1[0].C7 + ".png");
				}
				if (data.t1[0].C8 != 1){ 
					$("#card_c8").attr("src",site_url + "storage/front/img/cards/" + data.t1[0].C8 + ".png");
				}
				if (data.t1[0].C9 != 1){ 
					$("#card_c9").attr("src",site_url + "storage/front/img/cards/" + data.t1[0].C9 + ".png");
				}
			}
			clock.setValue(data.t1[0].autotime);
			$(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
			$("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
			eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1];
				for(var j in data['t2']){
				  markettype = "TESTTEENPATTI";
			  
				  runner = data['t2'][j].nat || data['t2'][j].nation;				
			  
				  selectionid = data['t2'][j].tsection;
				  trate = data['t2'][j].trate;
			  	  var value1 = $('.market_' + selectionid + '_b_exposure').html();
				  var color1 = parseInt(value1) > 0 ? 'green' : 'black';
				  back_html = '<span class="d-block text-bold"><b>'+trate+'</b></span> <span class="d-block market_'+selectionid+'_b_exposure market_exposure" style="color: '+color1+';">'+value1+'</span>';
				  $(".market_"+selectionid+"_b_btn").attr("side","Back");
				  $(".market_"+selectionid+"_b_btn").attr("selectionid",selectionid);
				  $(".market_"+selectionid+"_b_btn").attr("marketid",selectionid);
				  $(".market_"+selectionid+"_b_btn").attr("runner",runner);
				  $(".market_"+selectionid+"_b_btn").attr("marketname",runner);
				  $(".market_"+selectionid+"_b_btn").attr("eventid",eventId);
				  $(".market_"+selectionid+"_b_btn").attr("markettype",markettype);
				  $(".market_"+selectionid+"_b_btn").attr("event_name",markettype);
				  $(".market_"+selectionid+"_b_btn").attr("fullmarketodds",trate);
				  $(".market_"+selectionid+"_b_btn").attr("fullfancymarketrate",trate);
				  $(".market_"+selectionid+"_b_btn").html(back_html);
			  
			  
				  Lselectionid = data['t2'][j].lsection;
				  lrate = data['t2'][j].lrate;
			  	  var value2 = $('.market_' + Lselectionid + '_b_exposure').html();
				  var color2 = parseInt(value2) > 0 ? 'green' : 'black';
				  back_html = '<span class="d-block text-bold"><b>'+lrate+'</b></span> <span class="d-block market_'+Lselectionid+'_b_exposure market_exposure" style="color: '+color2+';">'+value2+'</span>';
				  $(".market_"+Lselectionid+"_b_btn").attr("side","Back");
				  $(".market_"+Lselectionid+"_b_btn").attr("selectionid",Lselectionid);
				  $(".market_"+Lselectionid+"_b_btn").attr("marketid",Lselectionid);
				  $(".market_"+Lselectionid+"_b_btn").attr("runner",runner);
				  $(".market_"+Lselectionid+"_b_btn").attr("marketname",runner);
				  $(".market_"+Lselectionid+"_b_btn").attr("eventid",eventId);
				  $(".market_"+Lselectionid+"_b_btn").attr("markettype",markettype);
				  $(".market_"+Lselectionid+"_b_btn").attr("event_name",markettype);
				  $(".market_"+Lselectionid+"_b_btn").attr("fullmarketodds",lrate);
				  $(".market_"+Lselectionid+"_b_btn").attr("fullfancymarketrate",lrate);
				  $(".market_"+Lselectionid+"_b_btn").html(back_html);
			  
			  
				  Dselectionid = data['t2'][j].dsectionid;
				  drate = data['t2'][j].drate;
			  
			  	  var value3 = $('.market_' + Dselectionid + '_b_exposure').html();
				  var color3 = parseInt(value3) > 0 ? 'green' : 'black';
				  back_html = '<span class="d-block text-bold"><b>'+drate+'</b></span> <span class="d-block market_'+Dselectionid+'_b_exposure market_exposure" style="color: '+color3+';">'+value3+'</span>';
				  $(".market_"+Dselectionid+"_b_btn").attr("side","Back");
				  $(".market_"+Dselectionid+"_b_btn").attr("selectionid",Dselectionid);
				  $(".market_"+Dselectionid+"_b_btn").attr("marketid",Dselectionid);
				  $(".market_"+Dselectionid+"_b_btn").attr("runner",runner);
				  $(".market_"+Dselectionid+"_b_btn").attr("marketname",runner);
				  $(".market_"+Dselectionid+"_b_btn").attr("eventid",eventId);
				  $(".market_"+Dselectionid+"_b_btn").attr("markettype",markettype);
				  $(".market_"+Dselectionid+"_b_btn").attr("event_name",markettype);
				  $(".market_"+Dselectionid+"_b_btn").attr("fullmarketodds",drate);
				  $(".market_"+Dselectionid+"_b_btn").attr("fullfancymarketrate",drate);
				  $(".market_"+Dselectionid+"_b_btn").html(back_html);
				
				 gstatus =  data['t2'][j].tstatus.toString();
				if(gstatus == "SUSPENDED" || gstatus == "0" || gstatus =="False"){
					$(".market_"+selectionid+"_row").addClass("suspended");
				}else{
				  $(".market_"+selectionid+"_row").removeClass("suspended");
				}
			}
		}
		});
		socket.on('gameResult', function(args){
			updateResult(args.data);
		});
		socket.on('error', function (data) {});
		socket.on('close', function (data) {});
	}
	function clearCards(){
		
		refresh(markettype);
				
		$("#card_c1").attr("src",site_url + "storage/front/img/cards/1.png");
		$("#card_c2").attr("src",site_url + "storage/front/img/cards/1.png");
		$("#card_c3").attr("src",site_url + "storage/front/img/cards/1.png");
		$("#card_c4").attr("src",site_url + "storage/front/img/cards/1.png");
		$("#card_c5").attr("src",site_url + "storage/front/img/cards/1.png");
		$("#card_c6").attr("src",site_url + "storage/front/img/cards/1.png");
		$("#card_c7").attr("src",site_url + "storage/front/img/cards/1.png");
		$("#card_c8").attr("src",site_url + "storage/front/img/cards/1.png");
		$("#card_c9").attr("src",site_url + "storage/front/img/cards/1.png");
	}

	function updateResult(data) {
	
		if(data && data[0]){
			resultGameLast = data[0].mid;
		
			if(last_result_id != resultGameLast){
				last_result_id = resultGameLast;
				
				
				
			}
		
			html = "";
			var ab = "";
			var ab1 = "";
			casino_type = "'teen9'";
			data.forEach((runData) => {
				if(parseInt(runData.result) == 11){
					ab = "a";
					ab1 = "T";
				}
				else if(parseInt(runData.result) == 21){
					ab = "b";
					ab1 = "L"
				}
				else if(parseInt(runData.result) == 31){
					ab = "c";
					ab1 = "D";
				}
				
				eventId = runData.mid == 0 ? 0 : runData.mid.split(".")[1];
				html += '<span  onclick="view_casiono_result('+eventId+','+casino_type+')"  class="last-result ml-1 player'+ ab +'">'+ ab1 + '</span>';
			});
			$("#last-result").html(html);
			if(oldGameId == 0 || oldGameId == resultGameLast){		
				$("#card_c1").attr("src",site_url + "storage/front/img/cards/1.png");
				$("#card_c2").attr("src",site_url + "storage/front/img/cards/1.png");
				$("#card_c3").attr("src",site_url + "storage/front/img/cards/1.png");
				$("#card_c4").attr("src",site_url + "storage/front/img/cards/1.png");
				$("#card_c5").attr("src",site_url + "storage/front/img/cards/1.png");
				$("#card_c6").attr("src",site_url + "storage/front/img/cards/1.png");
				$("#card_c7").attr("src",site_url + "storage/front/img/cards/1.png");
				$("#card_c8").attr("src",site_url + "storage/front/img/cards/1.png");
				$("#card_c9").attr("src",site_url + "storage/front/img/cards/1.png");
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
			if(marketId >= 11 && marketId <= 20){				nation_name = "Tiger";			}else if(marketId >= 21 && marketId <= 30){				nation_name = "Lion";			}else{				nation_name = "Dragon";			}
			$("#inputStake").val();
			$("#market_runner_label").text(market_runner_name+" "+nation_name);
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
		var last_place_bet= "";
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
		
		$("#bet-error-class").removeClass("b-toast-danger");
		$("#bet-error-class").removeClass("b-toast-success");
		setTimeout(function(){ 
			$.ajax({
				 type: 'POST',
				 url: '../ajaxfiles/bet_place_test_teenpatti.php',
				 dataType: 'json',
				 data: {eventId:bet_event_id,eventType:eventType,marketId:bet_marketId,stack:inputStake,type:type,odds:oddsNo,runs:runsNo,bet_market_type:bet_market_type,oddsmarketId:oddsmarketId,eventManualType:eventManualType,market_runner_name:market_runner_name,market_odd_name:market_odd_name,bet_event_name:bet_event_name},
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
</script>  
<div id="open_back_place_bet" class="modal open_back_place_bet" role="dialog" >
   <div class="modal-dialog">
      <div role="document" id="__BVID__30___BV_modal_content_" tabindex="-1" class="modal-content">
         <header id="__BVID__30___BV_modal_header_" class="modal-header">
            <h5 id="__BVID__30___BV_modal_title_" class="modal-title">Placebet</h5>
            <button type="button" data-dismiss="modal" class="close">&times;</button>                
         </header>
         <div id="__BVID__30___BV_modal_body_" class="modal-body" style="    padding: 0px;">
            <div class="place-bet pt-2 pb-2 back">
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
                     		$button_array[] = 20000;					                     		$button_array[] = 20000;					                     		$button_array[] = 20000;					
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