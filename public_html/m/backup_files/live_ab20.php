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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
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
                            <div class="casino-title"><span class="casino-name">Andar Bahar</span><span class="d-block"><a href="#" onclick="view_rules()" data-target="#rules_popup" data-toggle="modal" id="rules_popup_btn" class="ml-1" role="button">Rules</a></span></div>

                            <?php
                                include("casino_header.php");
                            ?>
                            
                            <!---->
                            <div class="casino-video">
                                <iframe src="<?php echo IFRAME_URL; echo ANDARBAHAR_CODE; ?>" width="100%" height="200" style="border: 0px;"></iframe>
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
                                <div class="video-overlay" style="">
                                    <div id="game-cards">
                                        <div class="card-inner">
                                            <p class="text-white mb-0"><b>Andar</b></p>
                                            <div id="andar-cards" class="ab-rtlslider owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
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
                                        </div>
                                        <div class="card-inner">
                                            <p class="text-white mb-0"><b>Bahar</b></p>
                                            <div id="bahar-cards" class="ab-rtlslider owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                                                <div class="owl-stage-outer">
                                                    <div class="owl-stage" id="cards_2" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 224px;">
                                                       
                                                        
                                                    </div>
                                                </div>
                                                <div class="owl-nav">
                                                    <button type="button" role="presentation" class="owl-prev disabled"><span aria-label="Previous">&#8249;</span></button>
                                                    <button type="button" role="presentation" class="owl-next"><span aria-label="Next">&#8250;</span></button>
                                                </div>
                                                <div class="owl-dots disabled"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="casino-container andar-bahar">
                                <div class="andar-bx">
                                    <div class="ab-title text-center">Andar</div>
                                    <div class="text-center ab-content">
                                        <div id="andar_div" class="owl-carousel owl-theme ab-slider owl-loaded owl-drag">
                                            <div class="owl-stage-outer">
                                                <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 845px;">
                                                    <div class="owl-item active back-1 market_1_b_btn" style="width: 55px; margin-right: 10px;">
                                                        <div><img id="ab_cards_1"  src="../storage/mobile/img/andar_bahar/0.jpg" class="andar-bahar-image">
                                                            <p class="mb-0 market_1_b_exposure market_exposure" style="color: black;">0</p>
                                                        </div>
                                                    </div>
                                                    <div class="owl-item active back-1 market_2_b_btn" style="width: 55px; margin-right: 10px;">
                                                        <div><img id="ab_cards_2" src="../storage/mobile/img/andar_bahar/0.jpg" class="andar-bahar-image">
                                                            <p class="mb-0 market_2_b_exposure market_exposure" style="color: black;">0</p>
                                                        </div>
                                                    </div>
                                                    <div class="owl-item active back-1 market_3_b_btn" style="width: 55px; margin-right: 10px;">
                                                        <div><img id="ab_cards_3" src="../storage/mobile/img/andar_bahar/0.jpg" class="andar-bahar-image">
                                                            <p class="mb-0 market_3_b_exposure market_exposure" style="color: black;">0</p>
                                                        </div>
                                                    </div>
                                                    <div class="owl-item active back-1 market_4_b_btn" style="width: 55px; margin-right: 10px;">
                                                        <div><img id="ab_cards_4" src="../storage/mobile/img/andar_bahar/0.jpg" class="andar-bahar-image">
                                                            <p class="mb-0 market_4_b_exposure market_exposure" style="color: black;">0</p>
                                                        </div>
                                                    </div>
                                                    <div class="owl-item active back-1 market_5_b_btn" style="width: 55px; margin-right: 10px;">
                                                        <div><img id="ab_cards_5" src="../storage/mobile/img/andar_bahar/0.jpg" class="andar-bahar-image">
                                                            <p class="mb-0 market_5_b_exposure market_exposure" style="color: black;">0</p>
                                                        </div>
                                                    </div>
                                                    <div class="owl-item back-1 market_6_b_btn" style="width: 55px; margin-right: 10px;">
                                                        <div><img id="ab_cards_6" src="../storage/mobile/img/andar_bahar/0.jpg" class="andar-bahar-image">
                                                            <p class="mb-0 market_6_b_exposure market_exposure" style="color: black;">0</p>
                                                        </div>
                                                    </div>
                                                    <div class="owl-item back-1 market_7_b_btn" style="width: 55px; margin-right: 10px;">
                                                        <div><img id="ab_cards_7" src="../storage/mobile/img/andar_bahar/0.jpg" class="andar-bahar-image">
                                                            <p class="mb-0 market_7_b_exposure market_exposure" style="color: black;">0</p>
                                                        </div>
                                                    </div>
                                                    <div class="owl-item back-1 market_8_b_btn" style="width: 55px; margin-right: 10px;">
                                                        <div><img id="ab_cards_8" src="../storage/mobile/img/andar_bahar/0.jpg" class="andar-bahar-image">
                                                            <p class="mb-0 market_8_b_exposure market_exposure" style="color: black;">0</p>
                                                        </div>
                                                    </div>
                                                    <div class="owl-item back-1 market_9_b_btn" style="width: 55px; margin-right: 10px;">
                                                        <div><img id="ab_cards_9" src="../storage/mobile/img/andar_bahar/0.jpg" class="andar-bahar-image">
                                                            <p class="mb-0 market_9_b_exposure market_exposure" style="color: black;">0</p>
                                                        </div>
                                                    </div>
                                                    <div class="owl-item back-1 market_10_b_btn" style="width: 55px; margin-right: 10px;">
                                                        <div><img id="ab_cards_10" src="../storage/mobile/img/andar_bahar/0.jpg" class="andar-bahar-image">
                                                            <p class="mb-0 market_10_b_exposure market_exposure" style="color: black;">0</p>
                                                        </div>
                                                    </div>
                                                    <div class="owl-item back-1 market_11_b_btn" style="width: 55px; margin-right: 10px;">
                                                        <div><img id="ab_cards_11" src="../storage/mobile/img/andar_bahar/0.jpg" class="andar-bahar-image">
                                                            <p class="mb-0 market_11_b_exposure market_exposure" style="color: black;">0</p>
                                                        </div>
                                                    </div>
                                                    <div class="owl-item back-1 market_12_b_btn" style="width: 55px; margin-right: 10px;">
                                                        <div><img id="ab_cards_12" src="../storage/mobile/img/andar_bahar/0.jpg" class="andar-bahar-image">
                                                            <p class="mb-0 market_12_b_exposure market_exposure" style="color: black;">0</p>
                                                        </div>
                                                    </div>
                                                    <div class="owl-item back-1 market_13_b_btn" style="width: 55px; margin-right: 10px;">
                                                        <div><img id="ab_cards_13" src="../storage/mobile/img/andar_bahar/0.jpg" class="andar-bahar-image">
                                                            <p class="mb-0 market_13_b_exposure market_exposure" style="color: black;">0</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-nav">
                                                <button type="button" role="presentation" class="owl-prev disabled"><span aria-label="Previous">&#8249;</span></button>
                                                <button type="button" role="presentation" class="owl-next"><span aria-label="Next">&#8250;</span></button>
                                            </div>
                                            <div class="owl-dots disabled"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bahar-bx mt-2">
                                    <div class="ab-title text-center">Bahar</div>
                                    <div class="text-center ab-content">
                                        <div id="bahar_div" class="owl-carousel owl-theme ab-slider owl-loaded owl-drag">
                                            <div class="owl-stage-outer">
                                                <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 845px;">
                                                    <div class="owl-item active  back-1 market_21_b_btn" style="width: 55px; margin-right: 10px;">
                                                        <div><img id="ab_cards_21" src="../storage/mobile/img/andar_bahar/0.jpg" class="andar-bahar-image">
                                                            <p class="mb-0 market_21_b_exposure market_exposure" style="color: black;">0</p>
                                                        </div>
                                                    </div>
                                                    <div class="owl-item active back-1 market_22_b_btn" style="width: 55px; margin-right: 10px;">
                                                        <div><img  id="ab_cards_22" src="../storage/mobile/img/andar_bahar/0.jpg" class="andar-bahar-image">
                                                            <p class="mb-0 market_22_b_exposure market_exposure" style="color: black;">0</p>
                                                        </div>
                                                    </div>
                                                    <div class="owl-item active back-1 market_23_b_btn" style="width: 55px; margin-right: 10px;">
                                                        <div><img  id="ab_cards_23" src="../storage/mobile/img/andar_bahar/0.jpg" class="andar-bahar-image">
                                                            <p class="mb-0 market_23_b_exposure market_exposure" style="color: black;">0</p>
                                                        </div>
                                                    </div>
                                                    <div class="owl-item active back-1 market_24_b_btn" style="width: 55px; margin-right: 10px;">
                                                        <div><img  id="ab_cards_24" src="../storage/mobile/img/andar_bahar/0.jpg" class="andar-bahar-image">
                                                            <p class="mb-0 market_24_b_exposure market_exposure" style="color: black;">0</p>
                                                        </div>
                                                    </div>
                                                    <div class="owl-item active  back-1 market_25_b_btn" style="width: 55px; margin-right: 10px;">
                                                        <div><img  id="ab_cards_25" src="../storage/mobile/img/andar_bahar/0.jpg" class="andar-bahar-image">
                                                            <p class="mb-0 market_25_b_exposure market_exposure" style="color: black;">0</p>
                                                        </div>
                                                    </div>
                                                    <div class="owl-item back-1 market_26_b_btn" style="width: 55px; margin-right: 10px;">
                                                        <div><img  id="ab_cards_26" src="../storage/mobile/img/andar_bahar/0.jpg" class="andar-bahar-image">
                                                            <p class="mb-0 market_26_b_exposure market_exposure" style="color: black;">0</p>
                                                        </div>
                                                    </div>
                                                    <div class="owl-item back-1 market_27_b_btn" style="width: 55px; margin-right: 10px;">
                                                        <div><img  id="ab_cards_27" src="../storage/mobile/img/andar_bahar/0.jpg" class="andar-bahar-image">
                                                            <p class="mb-0 market_27_b_exposure market_exposure" style="color: black;">0</p>
                                                        </div>
                                                    </div>
                                                    <div class="owl-item back-1 market_28_b_btn" style="width: 55px; margin-right: 10px;">
                                                        <div><img  id="ab_cards_28" src="../storage/mobile/img/andar_bahar/0.jpg" class="andar-bahar-image">
                                                            <p class="mb-0 market_28_b_exposure market_exposure" style="color: black;">0</p>
                                                        </div>
                                                    </div>
                                                    <div class="owl-item back-1 market_29_b_btn" style="width: 55px; margin-right: 10px;">
                                                        <div><img  id="ab_cards_29" src="../storage/mobile/img/andar_bahar/0.jpg" class="andar-bahar-image">
                                                            <p class="mb-0 market_29_b_exposure market_exposure" style="color: black;">0</p>
                                                        </div>
                                                    </div>
                                                    <div class="owl-item back-1 market_30_b_btn" style="width: 55px; margin-right: 10px;">
                                                        <div><img  id="ab_cards_30" src="../storage/mobile/img/andar_bahar/0.jpg" class="andar-bahar-image">
                                                            <p class="mb-0 market_30_b_exposure market_exposure" style="color: black;">0</p>
                                                        </div>
                                                    </div>
                                                    <div class="owl-item back-1 market_31_b_btn" style="width: 55px; margin-right: 10px;">
                                                        <div><img  id="ab_cards_31" src="../storage/mobile/img/andar_bahar/0.jpg" class="andar-bahar-image">
                                                            <p class="mb-0 market_31_b_exposure market_exposure" style="color: black;">0</p>
                                                        </div>
                                                    </div>
                                                    <div class="owl-item back-1 market_32_b_btn" style="width: 55px; margin-right: 10px;">
                                                        <div><img  id="ab_cards_32" src="../storage/mobile/img/andar_bahar/0.jpg" class="andar-bahar-image">
                                                            <p class="mb-0 market_32_b_exposure market_exposure" style="color: black;">0</p>
                                                        </div>
                                                    </div>
                                                    <div class="owl-item back-1 market_33_b_btn" style="width: 55px; margin-right: 10px;">
                                                        <div><img  id="ab_cards_33" src="../storage/mobile/img/andar_bahar/0.jpg" class="andar-bahar-image">
                                                            <p class="mb-0 market_33_b_exposure market_exposure" style="color: black;">0</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-nav">
                                                <button type="button" role="presentation" class="owl-prev disabled"><span aria-label="Previous">&#8249;</span></button>
                                                <button type="button" role="presentation" class="owl-next"><span aria-label="Next">&#8250;</span></button>
                                            </div>
                                            <div class="owl-dots disabled"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="remark text-right pr-2">
                                    <marquee scrollamount="3">
                                        <p class="mb-0 casino-remar"></p>
                                    </marquee>
                                </div>
                               <div class="last-result-tiele"><span>Last Result</span> <span class="float-right"><a href="casinoresults?game_type=ab20" class="">View All</a></span></div>
                                <div class="last-result-container text-right mt-1" id="last-result">
								
								
								
								</div>
                                <!---->
                                <!---->
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
	var markettype = "AB20";
	var markettype_2 = markettype;
	var back_html = "";
	var lay_html = "";
	var gstatus = "";
	var last_result_id = '0';
	function websocket(type) {
    socket = io.connect(websocketurl);
    socket.on('connect', function() {
    	socket.emit('Room', 'ab20');
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
				
				
			}
			clock.setValue(data.t1[0].autotime);
			$(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
			$("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
			eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1];
			
				for(var j in data['t2']){
				  	selectionid = parseInt(data['t2'][j].sid);
					runner = data['t2'][j].nat || data['t2'][j].nation;
					b1 = data['t2'][j].rate;
				  	
				  	
				  	markettype = "AB20";
				
					
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
						
						$("#ab_cards_"+selectionid).attr("src","../storage/front/img/andar_bahar/0.jpg");
						$(".market_"+selectionid+"_b_btn").removeClass("back-1");
					}
					else{
						$(".market_"+selectionid+"_b_btn").addClass("back-1");
				  		$("#ab_cards_"+selectionid).attr("src","../storage/front/img/andar_bahar/"+selectionid+".jpg");
					}
			}
			
			
			for(var j in data['t3']){
				aall = data['t3'][j].aall;
				if(aall){
					aall = aall.split(",");
				}
				ball = data['t3'][j].ball;
				if(ball){
					ball = ball.split(",");
				}
				andar = data['t3'][j].ar;
				if(andar){
					andar = andar.split(",");
				}
				bahar = data['t3'][j].br;
				if(bahar){
					bahar = bahar.split(",");
				}
				if(andar && andar.length){
					for(a in andar){
						
						
						$("#ab_cards_"+andar[a]).attr("src","../storage/front/img/andar_bahar/"+andar[a]+".jpg");
					}
				}
				
				if(bahar && bahar.length){
					for(b in bahar){
						$("#ab_cards_"+bahar[b]).attr("src","../storage/front/img/andar_bahar/"+bahar[b]+".jpg");
					}
				}
				
				
				acards_html_array = [];
				var acards_html = "";
				var len1 = 0;
						
				if(aall != ""){
					for(ac in aall){
						
						
						acards_html_array.push('  <div class="owl-item " id="owl_ac_img_id'+ac+'" style="margin-right:25px !important;"><div class="item"><img src="../storage/front/img/cards/'+aall[ac]+'.png"></div></div>');
						acards_html += acards_html_array[len1];
						
					len1++;
						if(len1 == aall.length){
							acards_html_array.reverse();
							
							acards_html = acards_html_array.join('');
							
							$("#cards_1").html(acards_html);
							$('#andar-cards').owlCarousel({margin:20}).trigger('add.owl.carousel', 
							  [jQuery(acards_html)]).trigger('refresh.owl.carousel');
						}else{
							$("#cards_1").html(acards_html);
							$('#andar-cards').owlCarousel().trigger('add.owl.carousel', 
							  [jQuery(acards_html)]).trigger('refresh.owl.carousel');
						}
						
							
						
					}
					
				}else{
					$("#cards_1").html("");
					$('#andar-cards').owlCarousel().trigger('add.owl.carousel', 
									[jQuery(acards_html)]).trigger('refresh.owl.carousel');
				}
				
				
				bcards_html_array = [];
				var bcards_html = "";
				var lenb = 0;
				if(ball != ""){
					for(bc in ball){
						
						
						
						bcards_html_array.push('  <div class="owl-item " id="owl_bc_img_id_'+bc+'"  style=""><div class="item"><img src="../storage/front/img/cards/'+ball[bc]+'.png"></div></div>');
						bcards_html += bcards_html_array[lenb];
						
						lenb++;
						
							if(lenb == ball.length){
								bcards_html_array.reverse();
								
								bcards_html = bcards_html_array.join('');
								
								$("#cards_2").html(bcards_html);
								$('#bahar-cards').owlCarousel().trigger('add.owl.carousel', 
									[jQuery(acards_html)]).trigger('refresh.owl.carousel');
							}else{
								$("#cards_2").html(bcards_html);
								$('#bahar-cards').owlCarousel().trigger('add.owl.carousel', 
									[jQuery(acards_html)]).trigger('refresh.owl.carousel');
							}
							
							
							
					}
				}else{
					$("#cards_2").html("");
					$('#bahar-cards').owlCarousel().trigger('add.owl.carousel', 
									[jQuery(bcards_html)]).trigger('refresh.owl.carousel');
				}
				
				
				
				
				
			}
        }
		
		
    });
    socket.on('gameResult', function(args){
    	updateResult(args.data);
    });
    socket.on('error', function(data){
    });
    socket.on('close', function(data){
    });
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
	refresh(markettype);
	$("#cards_1").html("")
	$("#cards_2").html("");
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
		casino_type = "'ab20'";
		data.forEach((runData) => {
			
				ab = "playera";
				ab1 = "R";

			eventId = runData.mid == 0 ? 0 : runData.mid.split(".")[1];
			html += '<span onclick="view_casiono_result('+eventId+','+casino_type+')"  class="last-result ml-1  '+ ab +' last-result">'+ ab1 + '</span>';
			
		});
		
			$("#player_1_value").removeClass("text-success");
			$("#player_2_value").removeClass("text-success");
			$("#player_3_value").removeClass("text-success");
			$("#player_4_value").removeClass("text-success");
			
			
		$("#last-result").html(html);
		if(oldGameId == 0 || oldGameId == resultGameLast){		
			$("#cards_1").html("")
			$("#cards_2").html("");
		}
    }
}
function teenpatti(type) {
    gameType = type
    websocket();
}

teenpatti("ok");
	jQuery(document).on("click", ".back-1", function () {			$("#popup_color").removeClass("back");			$("#popup_color").removeClass("lay");			$("#popup_color").addClass("back");
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
		bet_stake_side = $("#bet_stake_side").val();		bet_type = bet_stake_side;
		bet_event_id = $("#bet_event_id").val();
		bet_marketId = $("#bet_marketId").val();
		oddsmarketId = bet_marketId;
		eventType = 'AB20';
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
				 url: '../ajaxfiles/bet_place_ab20.php',
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

   
	carousel_start();
	
		jQuery("#andar_div").owlCarousel({
		  
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
	jQuery("#andar-cards").owlCarousel({
		  rtl:true,
		  loop: false,
		  margin: 25,
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
		jQuery("#bahar-cards").owlCarousel({
		  rtl:true,
		  loop: false,
		  margin: 25,
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
}
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