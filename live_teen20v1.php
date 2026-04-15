<?php
include("include/conn.php");
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

.casino-table-box {
    width: 100%;
    display: flex
;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: flex-start;
}

.casino-table-left-box, .casino-table-center-box, .casino-table-right-box {
    width: 49%;
    border-left: 1px solid #c7c8ca;
    border-right: 1px solid #c7c8ca;
    border-top: 1px solid #c7c8ca;
    background-color: #f2f2f2;
}

.casino-table-header, .casino-table-row {
    display: flex
;
    flex-wrap: wrap;
    justify-content: space-between;
    border-bottom: 1px solid #c7c8ca;
}

.casino-nation-detail {
    display: flex
;
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
}

.casino-odds-box {
    display: flex
;
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
    height: 28px !important;
}

 .casino-odds-box {
    width: 20%;
}

.casino-table-header, .casino-table-row {
    display: flex
;
    flex-wrap: wrap;
    justify-content: space-between;
    border-bottom: 1px solid #c7c8ca;
}

.casino-odds {
    font-size: 18px;
    font-weight: bold;
    line-height: 1;
}

.back {
    background-color: #72bbef !important;
}

.lay {
    background-color: #faa9ba !important;
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

.casino-table-box-divider {
    background-color: #c7c8ca;
    width: 2px;
}

.casino-table-full-box {
    width: 100%;
    border-left: 1px solid #c7c8ca;
    border-right: 1px solid #c7c8ca;
    border-top: 1px solid #c7c8ca;
    background-color: #f2f2f2;
}

.teenpatti1day-other-odds .casino-nation-detail {
    width: 22%;
}

.teenpatti1day-other-odds .casino-odds-box {
    width: 13%;
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
    right: 0;
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
    right: 0;
    top: 0;
    cursor: not-allowed;
    display: flex
;
    justify-content: center;
    align-items: center;
    pointer-events: none;
}

.casino-table-box .suspended-box::after,.casino-table-box .suspended-box::before {
	width: 40% !important;
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

 marquee{
    position: unset !important;
    width: 100% !important;
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
                            <div class="row row5 teenpatti-1day">
                                <div class="col-md-9 coupon-card featured-box-detail">
                                    <div class="coupon-card">
                                        <div class="game-heading"><span class="card-header-title">20-20 Teenpatti VIP 1
                       					 <!-- <small role="button" class="teenpatti-rules"  onclick="view_rules('tp-rules.jpg')" data-target="#rules_popup" data-toggle="modal"  tabindex="0"><u>Rules</u></small>  -->
										<!----></span>
										<small role="button" class="teenpatti-rules"  onclick="view_rules('teen62')" data-target="#rules_popup" data-toggle="modal"  tabindex="0"><u>Rules</u></small> 
										<span class="float-right">
											Round ID:
											<span class="round_no">0</span>  
											<!-- | Min: <span>100</span> | Max: <span>500000</span> -->
										</span>
                                        </div>
                                        <!---->
                                        <div class="video-container">
														<?php
												if(!empty(IFRAME_URL_SET)){
											?>
											<iframe class="iframedesign" src="<?php echo IFRAME_URL."".TEEN1_CODE;?>" width="100%" height="200px" style="border: 0px;"></iframe>
											<?php
												
											}else{
												?>
												<iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
												<?php

											}
											?>
											<!--  <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
											<iframe class="iframedesign" src="<?php echo IFRAME_URL; echo TEEN1_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
                                            <div class="clock clock2digit flip-clock-wrapper">
                                                <ul class="flip play">
                                                    <li class="flip-clock-before">
                                                        <a href="#">
                                                            <div class="up">
                                                                <div class="shadow"></div>
                                                                <div class="inn">4</div>
                                                            </div>
                                                            <div class="down">
                                                                <div class="shadow"></div>
                                                                <div class="inn">4</div>
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
                                                <div class="videoCards">
                                                    <div>
                                                        <h3 class="text-white">PLAYER A</h3>
                                                        <div>
                                                        	<img id="card_c1" src="storage/front/img/cards/1.png">
                                                        	<img id="card_c2"  src="storage/front/img/cards/1.png">
                                                        	<img id="card_c3"  src="storage/front/img/cards/1.png"></div>
                                                    </div>
                                                    <div>
                                                        <h3 class="text-white">PLAYER B</h3>
                                                        <div>
                                                        	<img id="card_c4"  src="storage/front/img/cards/1.png">
                                                        	<img id="card_c5"  src="storage/front/img/cards/1.png"> 
                                                        	<img id="card_c6"  src="storage/front/img/cards/1.png"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="casino-detail">
										<div class="casino-table">
											<div class="casino-table-box">
												<div class="casino-table-left-box">
													<div class="casino-table-header">
													<div class="casino-nation-detail">Player A</div>
													<div class="casino-odds-box back">Back</div>
													<div class="casino-odds-box lay">Lay</div>
													</div>
													<div class="casino-table-body">
													<div class="casino-table-row market_1_row">
														<div class="casino-nation-detail">
															<div class="casino-nation-name">Main</div>
															<p class="mb-0"><span style="color: black;" class="casino-nation-book market_1_b_exposure market_exposure">0</span> </p>
														</div>
														<div class="casino-odds-box back back-1 market_1_b_btn"><span class="casino-odds market_1_b_val">0</span></div>
														<div class="casino-odds-box lay lay-1 market_1_l_btn"><span class="casino-odds market_1_l_val">0</span></div>
													</div>
													<div class="casino-table-row market_17_row">
														<div class="casino-nation-detail">
															<div class="casino-nation-name">Consecutive</div> <p class="mb-0"><span style="color: black;" class="casino-nation-book  market_17_b_exposure market_exposure">0</span> </p>
														</div>
														<div class="casino-odds-box back back-1 market_17_b_btn"><span class="casino-odds market_17_b_val">0</span></div>
														<div class="casino-odds-box lay lay-1 market_17_l_btn"><span class="casino-odds market_17_l_val">0</span></div>
													</div>
													</div>
												</div>
												<div class="casino-table-box-divider"></div>
												<div class="casino-table-right-box">
													<div class="casino-table-header">
													<div class="casino-nation-detail">Player B</div>
													<div class="casino-odds-box back">Back</div>
													<div class="casino-odds-box lay">Lay</div>
													</div>
													<div class="casino-table-body">
													<div class="casino-table-row market_2_row">
														<div class="casino-nation-detail">
															<div class="casino-nation-name">Main</div> <p class="mb-0"><span style="color: black;" class="casino-nation-book market_2_b_exposure market_exposure">0</span> </p>
														</div>
														<div class="casino-odds-box back back-1 market_2_b_btn"><span class="casino-odds market_2_b_val">1.83</span></div>
														<div class="casino-odds-box lay lay-1 market_2_l_btn"><span class="casino-odds market_2_l_val">1.87</span></div>
													</div>
													<div class="casino-table-row suspended-row market_18_row">
														<div class="casino-nation-detail">
															<div class="casino-nation-name">Consecutive</div> <p class="mb-0"><span style="color: black;" class="casino-nation-book market_18_b_exposure market_exposure">0</span> </p>
														</div>
														<div class="casino-odds-box back back-1 market_18_b_btn"><span class="casino-odds market_18_b_val">0</span></div>
														<div class="casino-odds-box lay lay-1 market_18_l_btn"><span class="casino-odds market_18_l_val">0</span></div>
													</div>
													</div>
												</div>
											</div>
											<div class="casino-table-full-box teenpatti1day-other-odds mt-3">
												<div class="casino-table-header">
													<div class="casino-nation-detail"></div>
													<div class="casino-odds-box">Card 1</div>
													<div class="casino-odds-box">Card 2</div>
													<div class="casino-odds-box">Card 3</div>
													<div class="casino-odds-box">Card 4</div>
													<div class="casino-odds-box">Card 5</div>
													<div class="casino-odds-box">Card 6</div>
												</div>
												<div class="casino-table-body">
													<div class="casino-table-row">
													<div class="casino-nation-detail">
														<div class="casino-nation-name">Odd</div>
													</div>
													<div class="casino-odds-box back market_11_row back-1 market_11_1_b_btn"><span class="casino-odds market_11_1_b_val">0</span><div class="casino-nation-book market_11_1_b_exposure market_exposure text-center"></div></div>
													<div class="casino-odds-box back market_12_row back-1 market_12_1_b_btn"><span class="casino-odds market_12_1_b_val">0</span><div class="casino-nation-book market_12_1_b_exposure market_exposure text-center"></div></div>
													<div class="casino-odds-box back market_13_row back-1 market_13_1_b_btn"><span class="casino-odds market_13_1_b_val">1.83</span><div class="casino-nation-book market_13_1_b_exposure market_exposure text-center"></div></div>
													<div class="casino-odds-box back market_14_row back-1 market_14_1_b_btn"><span class="casino-odds market_14_1_b_val">0</span><div class="casino-nation-book market_14_1_b_exposure market_exposure text-center"></div></div>
													<div class="casino-odds-box back market_15_row back-1 market_15_1_b_btn"><span class="casino-odds market_15_1_b_val">0</span><div class="casino-nation-book market_15_1_b_exposure market_exposure text-center"></div></div>
													<div class="casino-odds-box back market_16_row back-1 market_16_1_b_btn"><span class="casino-odds market_16_1_b_val">0</span><div class="casino-nation-book market_16_1_b_exposure market_exposure text-center"></div></div>
													</div>
													<div class="casino-table-row">
													<div class="casino-nation-detail">
														<div class="casino-nation-name">Even</div>
													</div>
													<div class="casino-odds-box back market_11_row back-1 market_11_2_b_btn"><span class="casino-odds market_11_2_b_val">0</span><div class="casino-nation-book market_11_2_b_exposure market_exposure text-center"></div></div>
													<div class="casino-odds-box back market_12_row back-1 market_12_2_b_btn"><span class="casino-odds market_12_2_b_val">0</span><div class="casino-nation-book market_12_2_b_exposure market_exposure text-center"></div></div>
													<div class="casino-odds-box back market_13_row back-1 market_13_2_b_btn"><span class="casino-odds market_13_2_b_val">2.14</span><div class="casino-nation-book market_13_2_b_exposure market_exposure text-center"></div></div>
													<div class="casino-odds-box back market_14_row back-1 market_14_2_b_btn"><span class="casino-odds market_14_2_b_val">0</span><div class="casino-nation-book market_14_2_b_exposure market_exposure text-center"></div></div>
													<div class="casino-odds-box back market_15_row back-1 market_15_2_b_btn"><span class="casino-odds market_15_2_b_val">0</span><div class="casino-nation-book market_15_2_b_exposure market_exposure text-center"></div></div>
													<div class="casino-odds-box back market_16_row back-1 market_16_2_b_btn"><span class="casino-odds market_16_2_b_val">0</span><div class="casino-nation-book market_16_2_b_exposure market_exposure text-center"></div></div>
													</div>
												</div>
											</div>
										</div>
										<!-- <div class="mt-1 casino-remark-div">
                                                 <marquee style="color: #097c93;">PLAY OUR NEW GAME PREMIUM TEENPATTI 1_DAY</marquee>
                                        </div> -->
										<div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=teen62">View All</a></span></div>
										<div class="casino-last-results" id="last-result">
											<!-- <span class="result result-a">A</span><span class="result result-a">A</span><span class="result result-b">B</span><span class="result result-b">B</span><span class="result result-a">A</span><span class="result result-a">A</span><span class="result result-a">A</span><span class="result result-b">B</span><span class="result result-a">A</span><span class="result result-b">B</span> -->
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
<script type="text/javascript" src='footer-js.js?2'></script>

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
	var markettype = "TEEN62";
	var markettype_2 = markettype;
	var back_html = "";
	var lay_html = "";
	var gstatus = "";
	var last_result_id = '0';
	
	function websocket(type) { 
		socket = io.connect(websocketurl);
		socket.on('connect', function () {
			socket.emit('Room', 'teen62');
		});
		socket.on('gameIframe', function(data){
            $("#casinoIframe").attr('src',data);
        });
		socket.on('game', function (data) {
			
			data1 = data;
			if (data && data.t1) {
             if(oldGameId != data1.t1[0].mid && data1.t1[0].mid != 0 && data1.t1[0].mid != "0"){
		  		setTimeout(function(){
						clearCards();
					},<?php echo CASINO_RESULT_TIMEOUT; ?>);
		  	}
				oldGameId = data1.t1[0].mid;
        		if(data1.t1[0].mid != 0 && data1.t1[0].mid != "0" && oldGameId != resultGameLast){
					$(".casino-remark")
						.text(data.t1[0].remark);
					if (data.t1[0].C1 != 1) {
						$("#card_c1").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C1 + ".png");
					}
					if (data.t1[0].C2 != 1) {
						$("#card_c4").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C2 + ".png");
					}
					if (data.t1[0].C3 != 1) {
						$("#card_c2").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C3 + ".png");
					}
					if (data.t1[0].C4 != 1) {
						$("#card_c5").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C4 + ".png");
					}
					if (data.t1[0].C5 != 1) {
						$("#card_c3").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C5 + ".png");
					}
					if (data.t1[0].C6 != 1) {
						$("#card_c6").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C6 + ".png");
					}
				}
				clock.setValue(data.t1[0].autotime);
				$(".round_no").text(data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid);
				$("#casino_event_id").val(data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid);
				eventId = data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid;
				for (var j in data.t2) {
					selectionid = data.t2[j].sectionId || data.t2[j].sid;
					runner = data.t2[j].nation || data.t2[j].nat;
					b1 = data.t2[j].b1;
					bs1 = data.t2[j].bs1;
					l1 = data.t2[j].l1;
					ls1 = data.t2[j].ls1;
					back_html = '<span class="odds d-block"><b>' + b1 + '</b></span>';
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
					/* $(".market_" + selectionid + "_b_btn").html(back_html); */
					$(".market_" + selectionid + "_b_val").html(b1);

					lay_html = '<span class="odds d-block"><b>' + l1 + '</b></span>';
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
					/* $(".market_" + selectionid + "_l_btn").html(lay_html); */
					$(".market_" + selectionid + "_l_val").html(l1);

					gstatus = data.t2[j].gstatus.toString();
					if (gstatus == "SUSPENDED" || gstatus == "0") {
						$(".market_" + selectionid + "_row").addClass("suspended-box");
					}
					else {
						$(".market_" + selectionid + "_row").removeClass("suspended-box");
					}
					visible = data.t2[j].visible;
					if (data.t2[j].odds && visible == "1") {
						for (var k in data.t2[j].odds) {
							odd_selectionid = data.t2[j].odds[k].sectionId || data.t2[j].odds[k].sid;
							odd_runner = data.t2[j].odds[k].nation || data.t2[j].odds[k].nat;
							odd_b1 = data.t2[j].odds[k].b;
							odd_l1 = data.t2[j].odds[k].l;
							new_selectionid = selectionid + "_" + odd_selectionid;
							new_runner = runner + " - " + odd_runner;

							back_html = '<span class="odds d-block"><b>' + odd_b1 + '</b></span>';
							$(".market_" + new_selectionid + "_b_btn").attr("side", "Back");
							$(".market_" + new_selectionid + "_b_btn").attr("selectionid", new_selectionid);
							$(".market_" + new_selectionid + "_b_btn").attr("marketid", new_selectionid);
							$(".market_" + new_selectionid + "_b_btn").attr("runner", new_runner);
							$(".market_" + new_selectionid + "_b_btn").attr("marketname", new_runner);
							$(".market_" + new_selectionid + "_b_btn").attr("eventid", eventId);
							$(".market_" + new_selectionid + "_b_btn").attr("markettype", markettype);
							$(".market_" + new_selectionid + "_b_btn").attr("event_name", markettype);
							$(".market_" + new_selectionid + "_b_btn").attr("fullmarketodds", odd_b1);
							$(".market_" + new_selectionid + "_b_btn").attr("fullfancymarketrate", odd_b1);
							/* $(".market_" + new_selectionid + "_b_btn").html(back_html); */
							$(".market_" + new_selectionid + "_b_val").html(odd_b1);
						}
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
	function clearCards(){
		refresh(markettype);
		$("#card_c1").attr("src",site_url + "storage/front/img/cards/1.png");
		$("#card_c2").attr("src",site_url + "storage/front/img/cards/1.png");
		$("#card_c3").attr("src",site_url + "storage/front/img/cards/1.png");
		$("#card_c4").attr("src",site_url + "storage/front/img/cards/1.png");
		$("#card_c5").attr("src",site_url + "storage/front/img/cards/1.png");
		$("#card_c6").attr("src",site_url + "storage/front/img/cards/1.png");
	}

	function updateResult(data) {
		if(data && data[0]){
			data = JSON.parse(JSON.stringify(data));
			resultGameLast = data[0].mid;
		
			if(last_result_id != resultGameLast){
				last_result_id = resultGameLast;
				refresh(markettype);
			}
		
			var html = "";
			casino_type = "'teen62'";
			data.forEach((runData) => {
			
				eventId = runData.mid == 0 ? 0 : runData.mid;
				html += '<span onclick="view_casiono_result('+eventId+','+casino_type+')"  class="result ml-1 '+ (parseInt(runData.win) == 1 ? 'result-a' : 'result-b') +'">'+(parseInt(runData.win) == 1 ? 'A' : 'B')+'</span>';
			});
			$("#last-result").html(html);
			if(oldGameId == 0 || oldGameId == resultGameLast){	
				$("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
				$("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
				$("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
				$("#card_c4").attr("src", site_url + "storage/front/img/cards/1.png");
				$("#card_c5").attr("src", site_url + "storage/front/img/cards/1.png");
				$("#card_c6").attr("src", site_url + "storage/front/img/cards/1.png");
			}
		}
	}

	function teenpatti(type) {
		gameType = type
		websocket();
	}
	teenpatti("ok");

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
		eventType = 'TEEN62';
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
				 url: 'ajaxfiles/bet_place_teen20v1.php',
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
  <?php

				include("footer-js.php");
				include("footer-result-popup.php");
			?>

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

</body>



</html>