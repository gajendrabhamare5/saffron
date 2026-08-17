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
    display: flex
;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-top: 5px;
}

.casino-table {
    background-color: transparent;
}

.casino-table-full-box {
    width: 100%;
    border-left: 1px solid #c7c8ca;
    border-right: 1px solid #c7c8ca;
    border-top: 1px solid #c7c8ca;
    background-color: #f2f2f2;
}

.casino-table-full-box {
    border: 0;
}

.casino-table-box {
    width: 100%;
    display: flex
;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: flex-start;
    padding-right: 4px;
}

.cmeter-video-cards-box {
    background-color: #2c3e50d9;
    color: #ffffff;
    padding: 4px 4px 0;
    display: flex
;
    flex-wrap: wrap;
    justify-content: flex-start;
}

.cmeter-low, .cmeter-high {
    display: flex
;
    flex-wrap: wrap;
    align-items: center;
    width: 100%;
    min-height: 45px;
}

.cmeter-low > div:first-child, .cmeter-high > div:first-child {
    width: 10%;
}

.text-fancy {
    color: #fdcf13;
}

.cmeter-low .text-success, .cmeter-high .text-success {
    color: #17ec17 !important;
}

.cmeter-video-cards-box img {
    height: 40px;
    margin-right: 4px;
    margin-bottom: 4px;
}

.casino-table-left-box, .casino-table-center-box, .casino-table-right-box {
    width: calc(50% - 2px);
    border-left: 1px solid #c7c8ca;
    border-right: 1px solid #c7c8ca;
    border-top: 1px solid #c7c8ca;
    background-color: #f2f2f2;
}

.casino-table-left-box, .casino-table-right-box {
    padding: 5px;
    border-bottom: 1px solid #c7c8ca;
    cursor: pointer;
}

 .casino-table-left-box > div:first-child, .casino-table-right-box > div:first-child {
    min-height: 50px;
    display: flex
;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
}

.text-info {
    --bs-text-opacity: 1;
    color: rgba(var(--bs-info-rgb), var(--bs-text-opacity)) !important;
}

.text-info {
    color: #097c93 !important;
}

.mt-2 {
    margin-top: .5rem !important;
}

.cmeter-card-box {
    display: flex
;
    flex-wrap: wrap;
    justify-content: center;
    align-items: flex-start;
}

.card-odd-box {
    display: flex
;
    flex-wrap: wrap;
    justify-content: flex-start;
    flex-direction: column;
    align-items: center;
    margin-bottom: 4px;
    margin-right: 4px;
    cursor: pointer;
}

.card-odd-box img {
    height: 65px;
}

.casino-table-left-box img, .casino-table-right-box img {
    height: 50px;
}

.casino-nation-book {
    font-size: 12px;
    font-weight: bold;
    min-height: 18px;
    z-index: 1;
}

.casino-table-left-box .casino-nation-book, .casino-table-right-box .casino-nation-book {
    min-height: 18px;
    z-index: 1;
    position: relative;
}

.cmeter-card-box {
    display: flex
;
    flex-wrap: wrap;
    justify-content: center;
    align-items: flex-start;
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

.casino-last-results .result.result-c {
    color: #33c6ff;
}

.rules-section img {
    max-width: 300px;
}


.cmeter-low-cards, .cmeter-high-cards {
    display: flex
;
    flex-wrap: wrap;
    align-items: center;
}

.cmeter-high-cards, .cmeter-low-cards {
        width: 85%;
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
                            <div class="row row5 cmeter-container">
                                
								
									
									<div class="col-md-9 coupon-card featured-box-detail">
    <div class="coupon-card">
        <div class="game-heading"><span class="card-header-title">Casino Meter
                        <!-- <small role="button" class="teenpatti-rules"  onclick="view_rules('cmeter-rules.jpg')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small> -->
					 <!----></span>
					 <small role="button" class="teenpatti-rules"  onclick="view_rules('cmeter')" data-target="#rules_popup" data-toggle="modal"  tabindex="0"><u>Rules</u></small> 
					 <span class="float-right">
                        Round ID:
                        <span class="round_no">0</span></span>
        </div>
        <!---->
        <div class="video-container">

		<?php
  							if(!empty(IFRAME_URL_SET)){
                               ?>
                               <iframe class="iframedesign" src="<?php echo IFRAME_URL."".CASINOMETER_CODE;?>" width="100%" height="200px" style="border: 0px;"></iframe>
                               <?php
                                
                            }else{
                                ?>
                                <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                <?php

                            }
                            ?>

            <!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL."".CASINOMETER_CODE;?>" width="100%" height="400" style="border: 0px;"></iframe> -->
           	<ipnut id="casino_type" type="hidden" value="meter">
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
        <div class="casino-detail">
			
			<div class="casino-table">
				<div class="casino-table-full-box">
					<div class="cmeter-video-cards-box">
						<div class="cmeter-low">
							<div><span class="text-fancy">Low</span><span class="ms-2 text-success"><b id="card_c1"> 47</b></span></div>
							<div class="cmeter-low-cards" id="low_cards"></div>
						</div>
						<div class="cmeter-high">
							<div><span class="text-fancy">High</span><span class="ms-2 text-success"><b id="card_c2"> 22</b></span></div>
							<div class="cmeter-high-cards" id="high_cards"></div>
						</div>
					</div>
				</div>
				<div class="casino-table-box mt-3">
					<div class="casino-table-left-box suspended-box back-1 market_1_b_btn market_1_row">
						<div class=" text-center"><b class="text-info">Low</b></div>
						<div class="cmeter-card-box mt-2">
						<div class="card-odd-box">
							<div class=""><img src="storage/front/img/cards/A.png"></div>
						</div>
						<div class="card-odd-box">
							<div class=""><img src="storage/front/img/cards/2.png"></div>
						</div>
						<div class="card-odd-box">
							<div class=""><img src="storage/front/img/cards/3.png"></div>
						</div>
						<div class="card-odd-box">
							<div class=""><img src="storage/front/img/cards/4.png"></div>
						</div>
						<div class="card-odd-box">
							<div class=""><img src="storage/front/img/cards/5.png"></div>
						</div>
						<div class="card-odd-box">
							<div class=""><img src="storage/front/img/cards/6.png"></div>
						</div>
						<div class="card-odd-box">
							<div class=""><img src="storage/front/img/cards/7.png"></div>
						</div>
						<div class="card-odd-box">
							<div class=""><img src="storage/front/img/cards/8.png"></div>
						</div>
						<div class="card-odd-box">
							<div class=""><img src="storage/front/img/cards/9.png" id="9meter"></div>
						</div>
						</div>
						<div class="casino-nation-book text-center mt-2 market_1_b_exposure market_exposure"></div>
					</div>
					<div class="casino-table-right-box suspended-box back-1 market_2_b_btn market_2_row">
						<div class=" text-center"><b class="text-info">High</b></div>
						<div class="cmeter-card-box mt-2">
						<div class="card-odd-box">
							<div class=""><img src="storage/front/img/cards/10.png" id="10meter"></div>
						</div>
						<div class="card-odd-box">
							<div class=""><img src="storage/front/img/cards/J.png"></div>
						</div>
						<div class="card-odd-box">
							<div class=""><img src="storage/front/img/cards/Q.png"></div>
						</div>
						<div class="card-odd-box">
							<div class=""><img src="storage/front/img/cards/K.png"></div>
						</div>
						</div>
						<div class="casino-nation-book text-center mt-2 market_2_b_exposure market_exposure"></div>
					</div>
				</div>
			</div>
			<div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=meter">View All</a></span></div>
			<div class="casino-last-results" id="last-result">
				<!-- <span class="result result-a">L</span><span class="result result-b">H</span><span class="result result-a">L</span><span class="result result-b">H</span><span class="result result-b">H</span><span class="result result-b">H</span><span class="result result-b">H</span><span class="result result-b">H</span><span class="result result-a">L</span><span class="result result-b">H</span> -->
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
<script type="text/javascript" src='footer-js.js?7'></script>

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
    var selectionid = "";
	var runner = "";
	var b1 = "";
	var bs1 = "";
	var l1 = "";
	var ls1 = "";
	var markettype = "CASINO_METER";
	var markettype_2 = markettype;
	var back_html = "";
	var lay_html = "";
	var gstatus = "";
	var last_result_id = '0';
	
	function websocket(type) {
		socket = io.connect(websocketurl);
		socket.on('connect', function () {
			socket.emit('Room', 'cmeter');
		});
		socket.on('gameIframe', function(data){
			$("#casinoIframe").attr('src',data);
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
						$("#card_c1").text(data.t1[0].C1);
				}
				if (data.t1[0].C2 != 1) {
						$("#card_c2").text(data.t1[0].C2);
				}				
				
				if(data.t1[0].C1 > 0 || data.t1[0].C2 > 0){
					$(".cards_rows").show();
				}else{
					$(".cards_rows").hide();
					$("#low_cards").html("");
					$("#high_cards").html("");
				}
				
				cards = data.t1[0].cards.split(",");
				
				var low_cards = "";
				var high_cards = "";
				
				for(var c in cards){
					
					cards_data = getType(cards[c]);
					cards_value =  cards_data.card;
					
					if(cards_value == "A" || (cards_value >= 2 && cards_value <= 9)){
						//low
						if(cards[c] != 1){
							low_cards +='<img src="storage/mobile/img/cards_new/'+cards[c]+'.png">';
						}
					}else{
						//high
						if(cards[c] != 1){
							high_cards +='<img src="storage/mobile/img/cards_new/'+cards[c]+'.png">';
						}
					}
					
					$("#low_cards").html(low_cards);
					
					
					$("#high_cards").html(high_cards);
					
				}
			}
			clock.setValue(data.t1[0].autotime);
			$(".round_no").text(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
			$("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
			eventId = data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid;
			
				for(var j in data['t2']){
				  	selectionid = parseInt(data['t2'][j].sid);
					runner = data['t2'][j].nat || data['t2'][j].nation;
					b1 = data['t2'][j].b1;	
				  	
					/* $(".market_min_max_"+selectionid).html("Min:"+data['t2'][j].min+" Max:"+data['t2'][j].max);	 */
				  	
				  	markettype = "CASINO_METER";
					
				 	
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
					
					
					
				 	gstatus =  data['t2'][j].gstatus.toString();
					if(gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED"){
						
						$(".market_" + selectionid + "_row").addClass("suspended-box");
						$(".market_"+selectionid+"_b_btn").removeClass("back-1");
					}
					else {
						$(".market_"+selectionid+"_b_btn").addClass("back-1");
						$(".market_" + selectionid + "_row").removeClass("suspended-box");
					}
			}
			
		
        }
    });
	
		socket.on('gameResult', function (args) {
			if(args.data){
				updateResult(args.data);
			}else{
				updateResult(args['res']);
			}
		});
		socket.on('error', function (data) {});
		socket.on('close', function (data) {});
	}
	function clearCards(){
		refresh(markettype);
		$("#card_c1").text("");
		$("#card_c2").text("");
			
	}

	function updateResult(data) {
		if(data && data[0]){	
			data = JSON.parse(JSON.stringify(data));
			resultGameLast = data[0].mid;	
			if(last_result_id != resultGameLast){
				last_result_id = resultGameLast;
				refresh(markettype);
			}
		
			data = JSON.parse(JSON.stringify(data));
			resultGameLast = data[0].mid;
			var html = "";
			casino_type = "'meter'";
			data.forEach((runData) => {
				
			if(runData.win == "1"){
					ab = "result-a";
					ab1 = "L";
				}
				else if(runData.win == "2"){
					ab1 = "H";
					ab = "result-b";
				}else{
				 ab1 = "R";

				}
			
				eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] : runData.mid;
				html += '<span onclick="view_casiono_result('+eventId+','+casino_type+')"  class="ball-runs  '+ ab +' result">'+ ab1 + '</span>';
			});
			$("#last-result").html(html);
			if(oldGameId == 0 || oldGameId == resultGameLast){	
				$("#card_c1").text("");
				$("#card_c2").text("");
				$(".cards_rows").hide();
				$("#low_cards").html("");
				$("#high_cards").html("");
			}
		}
	}

	function teenpatti(type) {
		gameType = type
		websocket();
	}
	teenpatti("ok");
	
	
	function getType(data){
	var data1 = data;
	if(data){
		data = data.split('DD');
		if(data.length > 1){
			var obj = {
				type	:	'[',
				color	:	'red',
				card	:	data[0]
			}
			return obj;
		}
		else{
			data = data1;
			data = data.split('HH');
			if(data.length > 1){
				var obj = {
					type	:	'{',
					color	:	'red',
					card	:	data[0]
				}
				return obj;
			}
			else{
				data = data1;
				data = data.split('SS');
				if(data.length > 1){
					var obj = {
						type	:	'}',
						color	:	'black',
						card	:	data[0]
					}
					return obj;
				}
				else{
					data = data1;
					data = data.split('CC');
					if(data.length > 1){
						var obj = {
							type	:	']',
							color	:	'black',
							card	:	data[0]
						}
						return obj;
					}
					else{
						return 0;
					}
				}
			}
		}
	}
	return 0;
}
	
	
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
jQuery(document).on("click", ".close-bet-slip", function () {
	 $('.bet-slip-data').remove();
	 $(".back-1").removeClass("select");
	$(".lay-1").removeClass("select");
 });
 jQuery(document).on("click", "#placeBet", function () {
	 $("#placeBet").html('<i class="fa fa-spinner  fa-spin"></i> Submit');
	 $("#placeBet").addClass('disabled');
	 $(".placeBetLoader").addClass('show');
		var last_place_bet= "";
		bet_stake_side = $("#bet_stake_side").val();		bet_type = bet_stake_side;
		bet_event_id = $("#bet_event_id").val();
		bet_marketId = $("#bet_marketId").val();
		oddsmarketId = bet_marketId;
		eventType = 'CASINO_METER';
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
		
		$(".placeBet").addClass("disable");
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
		$("#placeBets").addClass('disable');
		$("#bet-error-class").removeClass("b-toast-danger");
		$("#bet-error-class").removeClass("b-toast-success");
		setTimeout(function(){ 
			$.ajax({
				 type: 'POST',
				 url: 'ajaxfiles/bet_place_casino_meter.php',
				 dataType: 'json',
				 data: {eventId:bet_event_id,eventType:eventType,marketId:bet_marketId,stack:inputStake,type:type,odds:oddsNo,runs:runsNo,bet_market_type:bet_market_type,oddsmarketId:oddsmarketId,eventManualType:eventManualType,market_runner_name:market_runner_name,market_odd_name:market_odd_name,bet_event_name:bet_event_name,bet_type:bet_type},
				 success: function(response) {
					 $(".placeBetLoader").removeClass('show');
					var check_status = response['status'];
					var message = response['message'];
					if(check_status == 'ok'){
							if(bet_markettype != "FANCY_ODDS"){
								oddsNo = runsNo;
							}else{
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
						}else{
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
</body>
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
</html>