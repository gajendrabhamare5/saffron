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

.threecardjbox {
    display: flex
;
    flex-wrap: wrap;
    width: 100%;
    align-content: center;
}

.threecard-title {
    width: 10%;
    text-align: center;
    border-left: 1px solid #000;
    display: flex
;
    flex-wrap: wrap;
    align-content: center;
    justify-content: center;
    border-top: 1px solid #000;
    border-bottom: 1px solid #000;
    font-weight: bold;
    display: flex
;
    flex-direction: column;
}

.casino-odds {
    font-size: 18px;
    font-weight: bold;
    line-height: 1;
}

.threecardj-cards {
    width: 90%;
    display: flex
;
    flex-wrap: wrap;
    justify-content: center;
    border: 1px solid #000;
    padding: 10px;
    padding-bottom: 0;
}

.card-odd-box {
    display: flex
;
    flex-wrap: wrap;
    justify-content: flex-start;
    flex-direction: column;
    align-items: center;
    margin-bottom: 10px;
    margin-right: 10px;
    cursor: pointer;
}

.card-odd-box img {
    height: 75px;
}

.threecardj-cards img {
    border: 2px solid transparent;
    padding: 2px;
}

.card-odd-box img {
    height: 45px;
}

.back {
    background-color: #72bbef !important;
}

.lay {
    background-color: #faa9ba !important;
}

 h4, .h4 {
    font-size: 20px;
    font-weight: 400;
    margin-bottom: 0;
}

.casino-remark-div {
    padding: 0 5px;
    color: #097c93;
    font-weight: bold;
    font-size: 12px;
    max-width: 100%;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    display: inline-block;
    width: 100%;
}

.casino-remark {
    width: calc(100% - 60px) !important;
    float: right;
    padding-left: 10px;
	font-size: 12px;
	font-style: unset;
	bottom: unset;
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
                        <div  class="col-md-10 featured-box">
                            <div  class="row row5 teenpattixyz">
                                <div  class="col-md-9 coupon-card featured-box-detail">
                                    <div  class="coupon-card">
                                        <div  class="game-heading"><span  class="card-header-title">3 Cards Judgement
                        </span> <span  class="float-right">
                        Round ID:
                        <span class="round_no">0</span> 
						
					</span>
                                        </div>
                                        <!---->
                                        <div  class="video-container">
										<?php
  								if(!empty(IFRAME_URL_SET)){
                               ?>
                               <iframe class="iframedesign" src="<?php echo IFRAME_URL."".A3CJ_CODE;?>" width="100%" height="200px" style="border: 0px;"></iframe>
                               <?php
                                
                            }else{
                                ?>
                                <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                <?php

                            }
                            ?>
										<!--	<iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                             <iframe class="iframedesign" src="<?php echo IFRAME_URL."".A3CJ_CODE;?>" width="100%" height="400" style="border: 0px;"></iframe> -->
                                            <div  class="clock clock2digit flip-clock-wrapper">
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
                                            <div  class="video-overlay">
                                                <div>
												<img id="card_c1" src="storage/front/img/cards_new/1.png">
												<img id="card_c2" src="storage/front/img/cards_new/1.png"> 
												<img id="card_c3" src="storage/front/img/cards_new/1.png"></div>
                                            </div>
                                        </div>
                                        <div class="casino-detail">
											<div class="casino-table">
												<div class="threecardjbox back suspended-box market_1_row">
													<div class="threecard-title">
														Yes
														<div class="casino-odds"></div>
													</div>
													<div class="threecardj-cards">
														<h4 class="text-center w-100 mb-2"><b class="market_1_b_value">0</b><div class="casino-nation-book market_1_b_exposure market_exposure"></div></h4>
														<div class="card-odd-box">
														<div class="back-1 market_1_b_btn" nat_1="A"><img src="storage/front/img/cards_new/A.png"></div>
														</div>
														<div class="card-odd-box">
														<div class="back-1 market_1_b_btn" nat_1="2"><img src="storage/front/img/cards_new/2.png"></div>
														</div>
														<div class="card-odd-box">
														<div class="back-1 market_1_b_btn" nat_1="3"><img src="storage/front/img/cards_new/3.png"></div>
														</div>
														<div class="card-odd-box">
														<div class="back-1 market_1_b_btn" nat_1="4"><img src="storage/front/img/cards_new/4.png"></div>
														</div>
														<div class="card-odd-box">
														<div class="back-1 market_1_b_btn" nat_1="5"><img src="storage/front/img/cards_new/5.png"></div>
														</div>
														<div class="card-odd-box">
														<div class="back-1 market_1_b_btn" nat_1="6"><img src="storage/front/img/cards_new/6.png"></div>
														</div>
														<div class="card-odd-box">
														<div class="back-1 market_1_b_btn" nat_1="7"><img src="storage/front/img/cards_new/7.png"></div>
														</div>
														<div class="card-odd-box">
														<div class="back-1 market_1_b_btn" nat_1="8"><img src="storage/front/img/cards_new/8.png"></div>
														</div>
														<div class="card-odd-box">
														<div class="back-1 market_1_b_btn" nat_1="9"><img src="storage/front/img/cards_new/9.png"></div>
														</div>
														<div class="card-odd-box">
														<div class="back-1 market_1_b_btn" nat_1="10"><img src="storage/front/img/cards_new/10.png"></div>
														</div>
														<div class="card-odd-box">
														<div class="back-1 market_1_b_btn" nat_1="J"><img src="storage/front/img/cards_new/J.png"></div>
														</div>
														<div class="card-odd-box">
														<div class="back-1 market_1_b_btn" nat_1="Q"><img src="storage/front/img/cards_new/Q.png"></div>
														</div>
														<div class="card-odd-box">
														<div class="back-1 market_1_b_btn" nat_1="K"><img src="storage/front/img/cards_new/K.png"></div>
														</div>
													</div>
												</div>
												<div class="threecardjbox lay suspended-box market_2_row">
													<div class="threecard-title">
														No
														<div class="casino-odds"></div>
													</div>
													<div class="threecardj-cards">
														<h4 class="text-center w-100 mb-2"><b class="market_2_l_value">0</b><div class="casino-nation-book market_2_l_exposure market_exposure"></div></h4>
														<div class="card-odd-box">
														<div class="lay-1 market_2_l_btn" nat_1="A"><img src="storage/front/img/cards_new/A.png"></div>
														</div>
														<div class="card-odd-box">
														<div class="lay-1 market_2_l_btn" nat_1="2"><img src="storage/front/img/cards_new/2.png"></div>
														</div>
														<div class="card-odd-box">
														<div class="lay-1 market_2_l_btn" nat_1="3"><img src="storage/front/img/cards_new/3.png"></div>
														</div>
														<div class="card-odd-box">
														<div class="lay-1 market_2_l_btn" nat_1="4"><img src="storage/front/img/cards_new/4.png"></div>
														</div>
														<div class="card-odd-box">
														<div class="lay-1 market_2_l_btn" nat_1="5"><img src="storage/front/img/cards_new/5.png"></div>
														</div>
														<div class="card-odd-box">
														<div class="lay-1 market_2_l_btn" nat_1="6"><img src="storage/front/img/cards_new/6.png"></div>
														</div>
														<div class="card-odd-box">
														<div class="lay-1 market_2_l_btn" nat_1="7"><img src="storage/front/img/cards_new/7.png"></div>
														</div>
														<div class="card-odd-box">
														<div class="lay-1 market_2_l_btn" nat_1="8"><img src="storage/front/img/cards_new/8.png"></div>
														</div>
														<div class="card-odd-box">
														<div class="lay-1 market_2_l_btn" nat_1="9"><img src="storage/front/img/cards_new/9.png"></div>
														</div>
														<div class="card-odd-box">
														<div class="lay-1 market_2_l_btn" nat_1="10"><img src="storage/front/img/cards_new/10.png"></div>
														</div>
														<div class="card-odd-box">
														<div class="lay-1 market_2_l_btn" nat_1="J"><img src="storage/front/img/cards_new/J.png"></div>
														</div>
														<div class="card-odd-box">
														<div class="lay-1 market_2_l_btn" nat_1="Q"><img src="storage/front/img/cards_new/Q.png"></div>
														</div>
														<div class="card-odd-box">
														<div class="lay-1 market_2_l_btn" nat_1="K"><img src="storage/front/img/cards_new/K.png"></div>
														</div>
													</div>
												</div>
												<div class="casino-remark-div mt-1">
													<marquee class="casino-remark" scrollamount="3">Select any 3 card and you will win if you will get at least 1 card from the 3 cards you have selected.|Select any 3 card and you will win If you do not get any card from the 3 cards you have selected.</marquee>
												</div>
											</div>
											<div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=3cardj">View All</a></span></div>
											<div class="casino-last-results" id="last-result">
												<!-- <span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span><span class="result result-b">R</span> -->
											</div>
										</div>
                                    </div>
                                </div>
                               <?php
									include("right_sidebar.php");
								?>
                                <div >
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
<script src="storage/front/js/owl.carousel.min.js" type="text/javascript"></script>
<script type="text/javascript" src='footer-js.js'></script>

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
	var markettype = "3_CARD_J";
	var markettype_2 = markettype;
	var back_html = "";
	var lay_html = "";
	var gstatus = "";
	var last_result_id = '0';
	
	function websocket(type) {
		socket = io.connect(websocketurl, {
			transports: ['websocket']
		});
		socket.on('connect', function () {
			socket.emit('Room', '3cardj');
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
			$(".round_no").text(data.t1[0].mid);
			$("#casino_event_id").val(data.t1[0].mid);
			eventId = data.t1[0].mid;
			
				for(var j in data['t2']){
				  	selectionid = parseInt(data['t2'][j].sid);
					runner = data['t2'][j].nat || data['t2'][j].nation;
					b1 = data['t2'][j].b1;
					l1 = data['t2'][j].b1;
					
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
						$(".market_"+selectionid+"_l_value").text(b1);
						$(".market_"+selectionid+"_l_btn").attr("side","Lay");
						$(".market_"+selectionid+"_l_btn").attr("selectionid",selectionid);
						$(".market_"+selectionid+"_l_btn").attr("marketid",selectionid);
						$(".market_"+selectionid+"_l_btn").attr("runner",runner);
						$(".market_"+selectionid+"_l_btn").attr("marketname",runner);
						$(".market_"+selectionid+"_l_btn").attr("eventid",eventId);
						$(".market_"+selectionid+"_l_btn").attr("markettype",markettype);
						$(".market_"+selectionid+"_l_btn").attr("event_name",markettype);
						$(".market_"+selectionid+"_l_btn").attr("fullmarketodds",b1);
						$(".market_"+selectionid+"_l_btn").attr("fullfancymarketrate",b1);
					}
				  	
					
					
					
					
					
				 	gstatus =  data['t2'][j].gstatus.toString();
					if(gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED"){
						$(".market_"+selectionid+"_b_value").text(0);
						$(".market_"+selectionid+"_l_value").text(0);
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
			if (args.data) {
                updateResult(args.data);
            } else {
                updateResult(args['res']);
            }
		});
		socket.on('error', function (data) {});
		socket.on('close', function (data) {});
	}
	

	function updateResult(data) {
		/* if(data && data[0]){ */
			data = JSON.parse(JSON.stringify(data));
			resultGameLast = data[0].mid;
		
			if(last_result_id != resultGameLast){
				last_result_id = resultGameLast;
				refresh(markettype);
			}
		
			var html = "";
			casino_type = "'3cardj'";
			data.forEach((runData) => {
			
					ab = "result-b";
					ab1 = "R";
			
				eventId = runData.mid;
				html += '<span onclick="view_casiono_result('+eventId+','+casino_type+')"  class="'+ ab +' result">'+ ab1 + '</span>';
			});
			$("#last-result").html(html);
			if(oldGameId == 0 || oldGameId == resultGameLast){	
				
			
			
			}
		/* } */
	} 

	function clearCards(){
		refresh(markettype);
		$("#card_c1").attr("src", site_url + "storage/front/img/cards_new/1.png");
		$("#card_c2").attr("src", site_url + "storage/front/img/cards_new/1.png");
		$("#card_c3").attr("src", site_url + "storage/front/img/cards_new/1.png");
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

			$('#profitLiability').text('');
			$(".placeBet").attr('disabled',false);
			$("#inputStake").val("");

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

			$('#profitLiability').text('');
			$(".placeBet").attr('disabled',false);
			$("#inputStake").val("");

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
//    stake = $(this).attr("stake");
//    eventId = $("#fullMarketBetsWrap").attr("eventid");
// 	$("#inputStake").val(stake);

  eventId = $("#fullMarketBetsWrap").attr("eventid");
   var currentStake = parseFloat($("#inputStake").val()) || 0;
		var buttonStake = parseFloat($(this).attr("stake")) || 0;
		var totalStake = currentStake + buttonStake;

	$("#inputStake").val(totalStake);

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
		 /* $("#bet-error-class").addClass("b-toast-danger"); */
		 toastr.clear()
		 toastr.warning("", message, {
		 	"timeOut": "3000",
		 	"iconClass":"toast-warning",
			"positionClass":"toast-top-center",
		 	"extendedTImeout": "0"
		 });
		 
		 $("#errorMsgText").text("Bet Not Confirmed Card Not Valid");
		$("#errorMsg").fadeIn('fast').delay(3000).hide(0);
		$(".close-bet-slip").click();
	 }
		var last_place_bet= "";
		nat_1=[];
		/* lay = 0;
		back = 0; */
		nat_count = 0;
		/* $(".selected").removeClass("selected"); */
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
		
		/* $(".placeBet").addClass("disable"); */
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
		/* $("#placeBets").addClass('disable'); */
		
		setTimeout(function(){
			$.ajax({
				 type: 'POST',
				 url: 'ajaxfiles/bet_place_3_card_j.php',
				 dataType: 'json',
				 data: {eventId:bet_event_id,eventType:eventType,marketId:bet_marketId,stack:inputStake,type:type,odds:oddsNo,runs:runsNo,bet_market_type:bet_market_type,oddsmarketId:oddsmarketId,eventManualType:eventManualType,market_runner_name:market_runner_name,market_odd_name:market_odd_name,bet_event_name:bet_event_name,bet_type:bet_type},
				 success: function(response) {
					/*  $(".placeBetLoader").removeClass('show'); */
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