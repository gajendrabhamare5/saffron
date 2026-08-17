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

    .casino-table-box {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: flex-start;
    }

    .casino-odd-box-container {
        width: 100%;
    }

    .casino-odd-box-container {
        width: calc(33.33% - 7.5px);
        margin-right: 10px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .casino-nation-name {
        font-size: 16px;
        font-weight: bold;
    }

    .casino-nation-name {
        width: 100%;
        text-align: center;
    }

    .casino-nation-book {
        font-size: 12px;
        font-weight: bold;
        min-height: 18px;
        z-index: 1;
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

    .casino-odds-box {
        width: 49%;
    }

    .casino-odds {
        font-size: 18px;
        font-weight: bold;
        line-height: 1;
    }

    .casino-odd-box-container:last-child {
        margin-right: 0;
    }

    .casino-table-left-box, .casino-table-center-box, .casino-table-right-box {
        width: 49%;
        border-left: 1px solid #c7c8ca;
        border-right: 1px solid #c7c8ca;
        border-top: 1px solid #c7c8ca;
        border-bottom: 1px solid #c7c8ca;
        background-color: #f2f2f2;
    }

    .casino-table-left-box, .casino-table-center-box, .casino-table-right-box {
        width: 32%;
        padding: 10px 10px 0 10px;
    }

    .aaa-odd-box {
        margin-bottom: 10px;
        min-height: 92px;
    }

    .casino-odds-box-theme {
        background-image: linear-gradient(to right, #0088cc, #2c3e50);
        color: #ffffff;
        border-radius: 4px;
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
        border: 0;
    }

     .casino-table-left-box .casino-odds-box,  .casino-table-center-box .casino-odds-box,  .casino-table-right-box .casino-odds-box {
        width: 100%;
        margin: 5px 0;
    }

    .casino-table-full-box {
        width: 100%;
        border-left: 1px solid #c7c8ca;
        border-right: 1px solid #c7c8ca;
        border-top: 1px solid #c7c8ca;
        background-color: #f2f2f2;
    }

    .aaacards {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        border: 0;
        padding: 10px 10px 0 10px;
    }

    .card-odd-box {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        flex-direction: column;
        align-items: center;
        margin-bottom: 10px;
        margin-right: 10px;
        cursor: pointer;
    }

    .card-odd-box img {
        height: 45px;
    }

	h4, .h4 {
    font-size: 20px;
    font-weight: 400;
    margin-bottom: 0;
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
                            <div class="row row5 aaa-container aaa">
                                <div class="col-md-9 casino-container coupon-card featured-box-detail">
                                    <div class="coupon-card">
                                        <div class="game-heading"><span class="card-header-title">
            Amar Akbar Anthony
            <!-- <small role="button" class="teenpatti-rules"  onclick="view_rules('aaa-rules.jpg')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small>  -->
			<!----></span> 
			<small role="button" class="teenpatti-rules"  onclick="view_rules('aaa')" data-target="#rules_popup" data-toggle="modal"  tabindex="0"><u>Rules</u></small> 
			<span class="float-right">
            Round ID:
            <span class="round_no">0</span></span>
                                        </div>
                                        <!---->
                                        <div class="video-container">

								<?php
 									 if(!empty(IFRAME_URL_SET)){
                               ?>
                               		<iframe class="iframedesign" src="<?php echo IFRAME_URL."".AAA_CODE;?>" width="100%" height="200px" style="border: 0px;"></iframe>
                               <?php
                                
                            		}else{
                                ?>
                               		 <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                <?php

								}
								?>

                                            <!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL; echo AAA_CODE; ?>" width="100%" height="400" style="border: 0px;" id="iframe_video"></iframe> -->
                                            <div class="clock clock2digit flip-clock-wrapper">
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
                                            <div class="video-overlay">
                                                <h4 class="text-white">Card</h4>
                                                <div><img id="card_c1" src="storage/front/img/cards_new/1.png"></div>
                                            </div>
                                        </div>
                                        <div class="casino-detail">
											<div class="casino-table">
												<div class="casino-table-box">
													<div class="casino-odd-box-container">
														<div class="casino-nation-name">
														A. Amar
														<div class="casino-nation-book d-md-none market_1_b_exposure market_exposure"></div>
														</div>
														<div class="casino-odds-box back back-1 suspended-box market_1_row market_1_b_btn"><span class="casino-odds market_1_b_value">2.12</span></div>
														<div class="casino-odds-box lay lay-1 suspended-box market_1_row market_1_l_btn"><span class="casino-odds market_1_l_value">2.22</span></div>
														<div class="casino-nation-book text-center d-none d-md-block w-100 market_1_b_exposure market_exposure"></div>
													</div>
													<div class="casino-odd-box-container">
														<div class="casino-nation-name">
														B. Akbar
														<div class="casino-nation-book d-md-none market_2_b_exposure market_exposure"></div>
														</div>
														<div class="casino-odds-box back back-1 suspended-box market_2_row market_2_b_btn"><span class="casino-odds market_2_b_value">3.15</span></div>
														<div class="casino-odds-box lay lay-1 suspended-box market_2_row market_2_l_btn"><span class="casino-odds market_2_l_value">3.35</span></div>
														<div class="casino-nation-book text-center d-none d-md-block w-100 market_2_b_exposure market_exposure"></div>
													</div>
													<div class="casino-odd-box-container">
														<div class="casino-nation-name">
														C. Anthony
														<div class="casino-nation-book d-md-none market_3_b_exposure market_exposure"></div>
														</div>
														<div class="casino-odds-box back back-1 suspended-box market_3_row market_3_b_btn"><span class="casino-odds market_3_b_value">4.15</span></div>
														<div class="casino-odds-box lay lay-1 suspended-box market_3_row market_3_l_btn"><span class="casino-odds market_3_6_value">4.45</span></div>
														<div class="casino-nation-book text-center d-none d-md-block w-100 market_3_b_exposure market_exposure"></div>
													</div>
												</div>
												<div class="casino-table-box mt-3">
													<div class="casino-table-left-box">
														<div class="aaa-odd-box">
														<div class="casino-odds text-center market_4_b_value">2.12</div>
														<div class="casino-odds-box back casino-odds-box-theme suspended-box market_4_b_btn market_4_row back-1"><span class="casino-odds">Even</span></div>
														<div class="casino-nation-book text-center market_4_b_exposure market_exposure"></div>
														</div>
														<div class="aaa-odd-box">
														<div class="casino-odds text-center market_5_b_value">1.83</div>
														<div class="casino-odds-box back casino-odds-box-theme suspended-box market_5_b_btn market_5_row back-1"><span class="casino-odds">Odd</span></div>
														<div class="casino-nation-book text-center market_5_b_exposure market_exposure"></div>
														</div>
													</div>
													<div class="casino-table-center-box">
														<div class="aaa-odd-box">
														<div class="casino-odds text-center market_6_b_value">1.97</div>
														<div class="casino-odds-box back casino-odds-box-theme suspended-box market_6_b_btn market_6_row back-1">
															<div class="casino-odds"><span class="card-icon ms-1"><span class="card-red ">{</span></span><span class="card-icon ms-1"><span class="card-red ">[</span></span></div>
														</div>
														<div class="casino-nation-book text-center market_6_b_exposure market_exposure"></div>
														</div>
														<div class="aaa-odd-box">
														<div class="casino-odds text-center market_7_b_value">1.97</div>
														<div class="casino-odds-box back casino-odds-box-theme suspended-box market_7_b_btn market_7_row back-1">
															<div class="casino-odds"><span class="card-icon ms-1"><span class="card-black ">}</span></span><span class="card-icon ms-1"><span class="card-black ">]</span></span></div>
														</div>
														<div class="casino-nation-book text-center market_7_b_exposure market_exposure"></div>
														</div>
													</div>
													<div class="casino-table-right-box">
														<div class="aaa-odd-box">
														<div class="casino-odds text-center market_21_b_value">2</div>
														<div class="casino-odds-box back casino-odds-box-theme market_21_b_btn market_21_row suspended-box back-1"><span class="casino-odds">Under 7</span></div>
														<div class="casino-nation-book text-center market_21_b_exposure market_exposure"></div>
														</div>
														<div class="aaa-odd-box">
														<div class="casino-odds text-center market_22_b_value">2</div>
														<div class="casino-odds-box back casino-odds-box-theme market_22_b_btn market_22_row suspended-box back-1"><span class="casino-odds">Over 7</span></div>
														<div class="casino-nation-book text-center market_22_b_exposure market_exposure"></div>
														</div>
													</div>
												</div>
												<div class="casino-table-full-box aaacards mt-3">
													<h4 class="w-100 text-center mb-2 market_8_b_value"><b>12</b></h4>
													<div class="card-odd-box">
														<div class="suspended-box market_8_b_btn market_8_row back-1"><img src="storage/front/img/cards_new/A.png"></div>
														<div class="casino-nation-book market_8_b_exposure market_exposure"></div>
													</div>
													<div class="card-odd-box">
														<div class="suspended-box market_9_b_btn market_9_row back-1"><img src="storage/front/img/cards_new/2.png"></div>
														<div class="casino-nation-book market_9_b_exposure market_exposure"></div>
													</div>
													<div class="card-odd-box">
														<div class="suspended-box market_10_b_btn market_10_row back-1"><img src="storage/front/img/cards_new/3.png"></div>
														<div class="casino-nation-book market_10_b_exposure market_exposure"></div>
													</div>
													<div class="card-odd-box">
														<div class="suspended-box market_11_b_btn market_11_row back-1"><img src="storage/front/img/cards_new/4.png"></div>
														<div class="casino-nation-book market_11_b_exposure market_exposure"></div>
													</div>
													<div class="card-odd-box">
														<div class="suspended-box market_12_b_btn market_12_row back-1"><img src="storage/front/img/cards_new/5.png"></div>
														<div class="casino-nation-book market_12_b_exposure market_exposure"></div>
													</div>
													<div class="card-odd-box">
														<div class="suspended-box market_13_b_btn market_13_row back-1"><img src="storage/front/img/cards_new/6.png"></div>
														<div class="casino-nation-book market_13_b_exposure market_exposure"></div>
													</div>
													<div class="card-odd-box">
														<div class="suspended-box market_14_b_btn market_14_row back-1"><img src="storage/front/img/cards_new/7.png"></div>
														<div class="casino-nation-book market_14_b_exposure market_exposure"></div>
													</div>
													<div class="card-odd-box">
														<div class="suspended-box market_15_b_btn market_15_row back-1"><img src="storage/front/img/cards_new/8.png"></div>
														<div class="casino-nation-book market_15_b_exposure market_exposure"></div>
													</div>
													<div class="card-odd-box">
														<div class="suspended-box market_16_b_btn market_16_row back-1"><img src="storage/front/img/cards_new/9.png"></div>
														<div class="casino-nation-book market_16_b_exposure market_exposure"></div>
													</div>
													<div class="card-odd-box">
														<div class="suspended-box market_17_b_btn market_17_row back-1"><img src="storage/front/img/cards_new/10.png"></div>
														<div class="casino-nation-book market_17_b_exposure market_exposure"></div>
													</div>
													<div class="card-odd-box">
														<div class="suspended-box market_18_b_btn market_18_row back-1"><img src="storage/front/img/cards_new/J.png"></div>
														<div class="casino-nation-book market_18_b_exposure market_exposure"></div>
													</div>
													<div class="card-odd-box">
														<div class="suspended-box market_19_b_btn market_19_row back-1"><img src="storage/front/img/cards_new/Q.png"></div>
														<div class="casino-nation-book market_19_b_exposure market_exposure"></div>
													</div>
													<div class="card-odd-box">
														<div class="suspended-box market_20_b_btn market_20_row back-1"><img src="storage/front/img/cards_new/K.png"></div>
														<div class="casino-nation-book market_20_b_exposure market_exposure"></div>
													</div>
												</div>
											</div>
											<div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=aaa">View All</a></span></div>
											<div class="casino-last-results" id="last-result">
												<!-- <span class="result result-c">C</span><span class="result result-b">B</span><span class="result result-a">A</span><span class="result result-b">B</span><span class="result result-b">B</span><span class="result result-a">A</span><span class="result result-c">C</span><span class="result result-a">A</span><span class="result result-a">A</span><span class="result result-c">C</span> -->
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
    var selectionid = "";
	var runner = "";
	var b1 = "";
	var bs1 = "";
	var l1 = "";
	var ls1 = "";
	var markettype = "AMAR_AKBAR_ANTHONY";
	var markettype_2 = markettype;
	var back_html = "";
	var lay_html = "";
	var gstatus = "";
	var last_result_id = '0';
	
        var first_time = true;
	function websocket(type) {
		socket = io.connect(websocketurl, {
			transports: ['websocket']
		});
		socket.on('connect', function () {
			socket.emit('Room', 'aaa');
		});
		socket.on('gameIframe', function(data){
			$("#casinoIframe").attr('src',data);
		});
		
		 socket.on('game', function(data) {	
                     
                     /* if(first_time){
                         console.log('line_378',data);
                         first_time = false;
                     } */
			
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
					
				
			}
			clock.setValue(data.t1[0].autotime);
			$(".round_no").text(data.t1[0].mid);
			$("#casino_event_id").val(data.t1[0].mid);
			eventId = data.t1[0].mid;
			
				for(var j in data['t2']){
				  	selectionid = parseInt(data['t2'][j].sid);
					runner = data['t2'][j].nat || data['t2'][j].nation;
					b1 = data['t2'][j].b1;
					b1 = parseFloat(b1);
					l1 = data['t2'][j].l1;
					l1 = parseFloat(l1);
				  	
				  	
				  	markettype = "AMAR_AKBAR_ANTHONY";
					
				 	
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
					
					
					$(".market_"+selectionid+"_l_value").text(l1);
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

	function getType(data){
	var data1 = data;
	if(data){
		data = data.split('SS');
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
			data = data.split('DD');
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
				data = data.split('HH');
				if(data.length > 1){
					var obj = {
						type	:	']',
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
							type	:	'}',
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

	function clearCards(){
		$("#card_c1").attr("src", site_url + "storage/front/img/cards_new/1.png");
		refresh(markettype);
	}

	function updateResult(data) {
		if(data && data[0]){
			data = JSON.parse(JSON.stringify(data));
			resultGameLast = data[0].mid;
		
			if(last_result_id != resultGameLast){
				last_result_id = resultGameLast;
				/* refresh(markettype); */
			}
		
			var html = "";
			casino_type = "'aaa'";
			data.forEach((runData) => {
				if(parseInt(runData.win) == 1){
					ab = "result-a";
					ab1 = "A";
			
				}
				else if(parseInt(runData.win) == 2){
					ab = "result-b";
					ab1 = "B";
			
				}
				else{
					ab = "result-c";
					ab1 = "C";
				}
			
				eventId = runData.mid;
				html += '<span onclick="view_casiono_result('+eventId+','+casino_type+')"  class="ball-runs   '+ ab +' ml-1 result">'+ ab1 + '</span>';
			});
			$("#last-result").html(html);
			if(oldGameId == 0 || oldGameId == resultGameLast){	
				$("#card_c1").attr("src", site_url + "storage/front/img/cards_new/1.png");
			}
		}
	}

	function teenpatti(type) {
		gameType = type
		websocket();
	}
	teenpatti("ok");

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
		eventType = 'AMAR_AKBAR_ANTHONY';
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
				 url: 'ajaxfiles/bet_place_aaa.php',
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