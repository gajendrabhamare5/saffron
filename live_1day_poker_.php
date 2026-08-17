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
<body cz-shortcut-listen="true">
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
                            <div class="row row5 poker-1day">
                                <div class="col-md-9 casino-container coupon-card featured-box-detail">
                                    <div class="coupon-card">
                                        <div class="game-heading"><span class="card-header-title">1-Day Poker
                        <small role="button" class="teenpatti-rules" onclick="view_rules('poker-rules.jpeg')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u >Rules</u></small> <!----></span> <span class="float-right">
                        Round ID:
                        <span class="round_no">0</span> | Min: <span >100</span> | Max: <span >200000</span></span>
                                        </div>
                                        <!---->
                                        <div class="video-container">
										<?php
  if(!empty(IFRAME_URL_SET)){
                               ?>
                               <iframe class="iframedesign" src="<?php echo IFRAME_URL."".ODIPOKER_CODE;?>" width="100%" height="200px" style="border: 0px;"></iframe>
                               <?php
                                
                            }else{
                                ?>
                                <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                <?php

                            }
                            ?>
                                            <!-- <iframe class="iframedesign" src="tv/poker-ONEDAY.html" width="100%" height="400" style="border: 0px;"></iframe> -->
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
											<div id="result-desc" style="display:none;">
												<div class="m-b-5"><span class="greenbx">Winner:</span> <span id="desc1"></span> </div>
												<div class="m-b-5"><span class="redbx">A:</span> <span id="desc2"></span> </div>
												<div class="m-b-5"><span class="yellowbx">B:</span> <span id="desc3"></span> </div>
											</div>
                                            <div  class="video-overlay">
                                                <div  class="card-inner">
                                                    <div  class="row">
                                                        <div  class="col-sm-6">
                                                            <h3  class="text-white">Player A</h3>
                                                            <div ><img  id="card_c1" src="storage/front/img/cards/1.png"> <img  id="card_c2" src="storage/front/img/cards/1.png"></div>
                                                        </div>
                                                        <div  class="col-sm-6 text-right">
                                                            <h3  class="text-white">Player B</h3> <img  src="storage/front/img/cards/1.png" id="card_c3"> <img id="card_c4"  src="storage/front/img/cards/1.png"></div>
                                                    </div>
                                                </div>
                                                <div  class="card-inner">
                                                    <h3  class="text-white">Board</h3>
                                                    <div ><img  src="storage/front/img/cards/1.png" id="card_c5"> <img id="card_c6"  src="storage/front/img/cards/1.png"> <img id="card_c7"  src="storage/front/img/cards/1.png"> <img id="card_c8"  src="storage/front/img/cards/1.png"> <img id="card_c9"  src="storage/front/img/cards/1.png"></div>
                                                </div>
                                            </div>
                                            <!---->
                                        </div>
                                        <div class="card-content m-t-0">
                                            <div class="row row5">
                                                <div class="col-md-5 main-market p-r-5">
                                                    <div class="live-poker">
                                                        <table class="table coupon-table table-bordered">
                                                            <thead >
                                                                <tr >
                                                                    <th class="box-4"></th>
                                                                    <th class="box-3 back">BACK</th>
                                                                    <th class="box-3 lay-color">LAY</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody >
                                                                <tr data-title="SUSPENDED" class="bet-info suspended market_1_row">
                                                                    <td class="box-4"><b >Player A</b> <span class="d-block market_1_b_exposure market_exposure" style="color: black;">0</span> </td>
                                                                    <td class="box-3 back teen-section">
                                                                        <button class="back back-1 market_1_b_btn"><span class="odd market_1_b_value">0.00</span> <span class="d-block">100000</span></button>
                                                                    </td>
                                                                    <td class="box-3 lay teen-section">
                                                                        <button class="lay lay-1 market_1_l_btn"><span class="odd market_1_l_value">0.00</span> <span class="d-block">100000</span></button>
                                                                    </td>
                                                                </tr>
                                                                <tr data-title="SUSPENDED" class="bet-info suspended market_2_row">
                                                                    <td class="box-4"><b >Player B</b> <span class="d-block market_2_b_exposure market_exposure" style="color: black;">0</span> </td>
                                                                    <td class="box-3 back teen-section">
                                                                        <button class="back back-1 market_2_b_btn"><span class="odd market_2_b_value">0.00</span> <span class="d-block">100000</span></button>
                                                                    </td>
                                                                    <td class="box-3 lay teen-section">
                                                                        <button class="lay lay-1 market_2_l_btn"><span class="odd market_2_l_value"><b >0.00</b></span> <span class="d-block">100000</span></button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-7 main-market p-l-5">
                                                    <div class="live-poker">
                                                        <table class="table coupon-table table-bordered">
                                                            <thead >
                                                                <tr >
                                                                    <th class="box-4"></th>
                                                                    <th class="box-3 back-color">BACK</th>
                                                                    <th class="box-3 back-color">BACK</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody >
                                                                <tr data-title="SUSPENDED" class="bet-info suspended  market_3_row market_4_row">
                                                                    <td class="box-4">Player A</td>
                                                                    <td class="box-3 back teen-section">
                                                                        <button class="back back-1 market_3_b_btn"><span class="odd">Player A 2 card Bonus</span> <span class="d-block market_3_b_exposure market_exposure" style="color: black;">0</span></button>
                                                                    </td>
                                                                    <td class="box-3 back teen-section">
                                                                        <button class="back back-1 market_4_b_btn"><span class="odd">Player A 7 card bonus</span> <span class="d-block market_4_b_exposure market_exposure" style="color: black;">0</span></button>
                                                                    </td>
                                                                </tr>
                                                                <tr data-title="SUSPENDED" class="bet-info suspended market_5_row market_6_row">
                                                                    <td class="box-4">Player B</td>
                                                                    <td class="box-3 back teen-section">
                                                                        <button class="back back-1 market_5_b_btn"><span class="odd">Player B 2 card Bonus</span> <span class="d-block market_5_b_exposure market_exposure" style="color: black;">0</span></button>
                                                                    </td>
                                                                    <td class="box-3 back teen-section">
                                                                        <button class="back back-1 market_6_b_btn"><span class="odd">Player B 7 card bonus</span> <span class="d-block market_6_b_exposure market_exposure" style="color: black;">0</span></button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       
									   <marquee  scrollamount="3" class="casino-remark m-b-10">
                                           
                                        </marquee>
                                         <div class="fancy-marker-title m-t-10">
                                            <h4>Last Result <a href="casinoresults?game_type=poker" class="result-view-all">View All</a></h4></div>
                                       <div class="m-b-10">

                                            <p id="last-result" class="text-right"></p>

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
	var markettype = "ODI_POKER";
	var back_html = "";
	var lay_html = "";
	var gstatus = "";
	var last_result_event_id = -1;
	function websocket(type) {
		socket = io.connect(websocketurl, {
			transports: ['websocket']
		});
		socket.on('connect', function () {
			socket.emit('Room', 'poker');
		});
		
		 socket.on('game', function(data) {	
			
		  if (data && data['t1'] && data['t1'][0]) {
		  	
		  	oldGameId = data.t1[0].mid;
        		if(data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast){
				$(".casino-remark").text(data.t1[0].remark);
				var desc = data.t1[0].desc;
				desc_array = desc.split("##");
				
				if(desc != ""){
					$("#result-desc").show();
					desc1 = desc_array[0];
					desc2 = desc_array[1];
					desc3 = desc_array[2];
					
					$("#desc1").text(desc1);
					$("#desc2").text(desc2);
					$("#desc3").text(desc3);
				}else{
					$("#result-desc").hide();
				}
				
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
			
				for(var j in data['t2']){
				  	selectionid = parseInt(data['t2'][j].sid);
					runner = data['t2'][j].nation;
					b1 = data['t2'][j].b1;
					l1 = data['t2'][j].l1;
				  	
				  	
				  	markettype = "ODI_POKER";
					
				 	
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
			for(var j in data['t3']){
				  	selectionid = parseInt(data['t3'][j].sid);
					runner = data['t3'][j].nation;
					b1 = data['t3'][j].b1;
					l1 = data['t3'][j].l1;
				  	
				  	
				  	markettype = "ODI_POKER";
					
				 	
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
				
					
					
					
				 	gstatus =  data['t3'][j].gstatus.toString();
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
			
			if(args.data !== undefined){
				if(args.data[0] !== undefined){
					if(args.data[0] !== undefined){
						var resilt_event_id = args.data[0].mid;
						if(resilt_event_id != last_result_event_id){
							setTimeout(function (){refresh(markettype);},2000);
							setTimeout(function (){refresh(markettype);},7000);
							last_result_event_id = resilt_event_id;
						}
					}
				}
			}
		});
		socket.on('error', function (data) {});
		socket.on('close', function (data) {});
	}
	

	function updateResult(data) {
		if(data && data[0]){
			data = JSON.parse(JSON.stringify(data));
			resultGameLast = data[0].mid;
			var html = "";
		
			casino_type = "'poker'";
			data.forEach((runData) => {
				if(parseInt(runData.result) == 11){
					ab = "playera";
					ab1 = "A";
			
				}
				else if(parseInt(runData.result) == 21){
					ab = "playerb";
					ab1 = "B";
			
				}else{
					ab = "playertie";
					ab1 = "T";
			
				}
			
				eventId = runData.mid == 0 ? 0 : runData.mid.split(".")[1];
				html += '<span onclick="view_casiono_result('+eventId+','+casino_type+')" class="ball-runs  '+ ab +' last-result">'+ ab1 + '</span>';
			});
			$("#last-result").html(html);
			if(oldGameId == 0 || oldGameId == resultGameLast){	
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
jQuery(document).on("click", ".back-1", function () {
	
		var fullmarketodds = $(this).attr("fullmarketodds");
		if(fullmarketodds != ""){	
			side = $(this).attr("side");
			selectionid = $(this).attr("selectionid");
			market_odd_name = $(this).attr("markettype");
			runner = $(this).attr("runner");
			market_runner_name  = runner;
			marketname = $(this).attr("marketname");
			markettype = $(this).attr("markettype");
			fullfancymarketrate = $(this).attr("fullfancymarketrate");	

			
			odds_change_value ="disabled";
			runs_lable = 'Runs';				
			runs_lable = 'Odds';
			fullfancymarketrate = fullmarketodds;
			eventId = $(this).attr("eventid");
			marketId = $(this).attr("marketid");
			event_name = $(this).attr("event_name");
			$(".select").removeClass("select");
			$(this).addClass("select");
			
			
			return_html = "";
			return_html += "<div class='bet-slip-data'><div><div class='table-responsive back'><form><table class='coupon-table table table-borderedless'><thead><tr><th></th><th style='width: 35%; text-align: left;'>(Bet for)</th><th style='width: 25%; text-align: left;'>Odds</th><th style='width: 15%; text-align: left;'>Stake</th><th style='width: 15%; text-align: right;'>Profit</th></tr></thead><tbody>";
			return_html +="<tr><td class='text-center'><a href='javascript:void(0);' class='text-danger close-bet-slip'><i class='fa fa-times'></i></a></td><td>"+runner+"</td><td class='bet-odds'><div class='form-group'> <input placeholder='0' value='"+fullmarketodds+"' id='odds_val' type='text' required='required' maxlength='4' readonly='readonly' class='amountint' style='width: 45px; vertical-align: middle;'><div class='spinner-buttons input-group-btn btn-group-vertical'> <button disabled='disabled' class='custom-btn-spinner btn btn-xs btn-default'><i class='fa fa-angle-up'></i></button> <button disabled='disabled' class='custom-btn-spinner btn btn-xs btn-default'><i class='fa fa-angle-down'></i></button></div></div></td><td class='bet-stakes'><div class='form-group bet-stake'><input type='hidden' id='bet_stake_side' value='Back'/><input type='hidden' id='bet_event_id' value='"+eventId+"'/><input type='hidden' id='bet_marketId' value='"+selectionid+"'/><input type='hidden' id='bet_event_name' value='"+event_name+"'/><input type='hidden' id='bet_market_name' value='"+marketname+"'/><input type='hidden' id='bet_markettype' value='"+markettype+"'/><input type='hidden' id='fullfancymarketrate' value='"+fullfancymarketrate+"'/> <input type='hidden' id='oddsmarketId' value='"+marketId+"'/><input type='hidden' id='market_runner_name' value='"+market_runner_name+"'/><input type='hidden' id='market_odd_name' value='"+market_odd_name+"'/> <input maxlength='10' name='inputStake' id='inputStake' required='required' type='text' ></div></td><td class='text-right bet-profit' id='profitLiability'>0</td></tr>";
			return_html +="<tr><td colspan='5' class='value-buttons' style='padding: 5px;'>";
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
						$button_array[] = 20000;						$button_array[] = 20000;						$button_array[] = 20000;
					}else{
						$fetch_button_value_data = mysqli_fetch_assoc($get_button_value);
						$fetch_button_value = $fetch_button_value_data['button_value'];
						$default_stake = $fetch_button_value_data['default_stake'];
						$one_bet_default_stake = $fetch_button_value_data['one_bet_default_stake'];
						$button_array = explode(",",$fetch_button_value);
					}
					foreach($button_array as $button_value){
				?>
					return_html +=" <button type='button' stake='<?php echo $button_value; ?>' class='btn btn-secondary m-l-5 m-b-5 label_stake'> <?php echo $button_value; ?> </button>";
				<?php
					}
				?>
			  return_html +="</td></tr></tbody></table><div class='col-md-12'> <button type='button' class='btn btn-sm btn-danger float-left close-bet-slip'> Reset </button> <button type='button' class='btn btn-sm btn-success float-right m-b-5 placeBet' id='placeBet'> Submit </button></div></form></div></div></div>"
			  $(".bet_slip_details").html(return_html);
		}
	});		
	
	jQuery(document).on("click", ".lay-1", function () {
		var fullmarketodds = $(this).attr("fullmarketodds");
		if(fullmarketodds != ""){	
			side = $(this).attr("side");
			selectionid = $(this).attr("selectionid");
			market_odd_name = $(this).attr("markettype");
			runner = $(this).attr("runner");
			market_runner_name  = runner;
			marketname = $(this).attr("marketname");
			markettype = $(this).attr("markettype");
			fullfancymarketrate = $(this).attr("fullfancymarketrate");			
			
			
			odds_change_value ="disabled"; 
			runs_lable = 'Runs';				
			runs_lable = 'Odds';
			fullfancymarketrate = fullmarketodds;
			eventId = $(this).attr("eventid");
			marketId = $(this).attr("marketid");
			event_name = $(this).attr("event_name");
			$(".select").removeClass("select");
			$(this).addClass("select");
			return_html = "";
			return_html += "<div class='bet-slip-data'><div><div class='table-responsive lay'><form><table class='coupon-table table table-borderedless'><thead><tr><th></th><th style='width: 35%; text-align: left;'>(Bet for)</th><th style='width: 25%; text-align: left;'>Odds</th><th style='width: 15%; text-align: left;'>Stake</th><th style='width: 15%; text-align: right;'>Liability</th></tr></thead><tbody>";
			return_html +="<tr><td class='text-center'><a href='javascript:void(0);' class='text-danger close-bet-slip'><i class='fa fa-times'></i></a></td><td>"+runner+"</td><td class='bet-odds'><div class='form-group'> <input placeholder='0' value='"+fullmarketodds+"' id='odds_val' type='text' required='required' maxlength='4' readonly='readonly' class='amountint' style='width: 45px; vertical-align: middle;'><div class='spinner-buttons input-group-btn btn-group-vertical'> <button disabled='disabled' class='custom-btn-spinner btn btn-xs btn-default'><i class='fa fa-angle-up'></i></button> <button disabled='disabled' class='custom-btn-spinner btn btn-xs btn-default'><i class='fa fa-angle-down'></i></button></div></div></td><td class='bet-stakes'><div class='form-group bet-stake'><input type='hidden' id='bet_stake_side' value='Lay'/><input type='hidden' id='bet_event_id' value='"+eventId+"'/><input type='hidden' id='bet_marketId' value='"+selectionid+"'/><input type='hidden' id='bet_event_name' value='"+event_name+"'/><input type='hidden' id='bet_market_name' value='"+marketname+"'/><input type='hidden' id='bet_markettype' value='"+markettype+"'/><input type='hidden' id='fullfancymarketrate' value='"+fullfancymarketrate+"'/> <input type='hidden' id='oddsmarketId' value='"+marketId+"'/><input type='hidden' id='market_runner_name' value='"+market_runner_name+"'/><input type='hidden' id='market_odd_name' value='"+market_odd_name+"'/> <input maxlength='10' name='inputStake' id='inputStake' required='required' type='text' ></div></td><td class='text-right bet-profit' id='profitLiability'>0</td></tr>";
			return_html +="<tr><td colspan='5' class='value-buttons' style='padding: 5px;'>";
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
						$button_array[] = 20000;						$button_array[] = 20000;						$button_array[] = 20000;
					}else{
						$fetch_button_value_data = mysqli_fetch_assoc($get_button_value);
						$fetch_button_value = $fetch_button_value_data['button_value'];
						$default_stake = $fetch_button_value_data['default_stake'];
						$one_bet_default_stake = $fetch_button_value_data['one_bet_default_stake'];
						$button_array = explode(",",$fetch_button_value);
					}
					foreach($button_array as $button_value){
				?>
					return_html +=" <button type='button' stake='<?php echo $button_value; ?>' class='btn btn-secondary m-l-5 m-b-5 label_stake'> <?php echo $button_value; ?> </button>";
				<?php
					}
				?>
			  return_html +="</td></tr></tbody></table><div class='col-md-12'> <button type='button' class='btn btn-sm btn-danger float-left close-bet-slip'> Reset </button> <button type='button' class='btn btn-sm btn-success float-right m-b-5 placeBet' id='placeBet'> Submit </button></div></form></div></div></div>"
			  $(".bet_slip_details").html(return_html);
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
		eventType = 'ODI_POKER';
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
		
			$.ajax({
				 type: 'POST',
				 url: 'ajaxfiles/bet_place_odi_poker_.php',
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
							$("#bet-error-class").addClass("b-toast-success");
						}else{
							$("#bet-error-class").addClass("b-toast-danger");
						}
						error_message_text = message;
						$("#errorMsgText").text(error_message_text);
						$("#errorMsg").fadeIn('fast').delay(3000).hide(0);
						$(".close-bet-slip").click();
						refresh(markettype);
				 }
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