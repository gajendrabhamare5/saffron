<?php
	include("../include/conn.php");
	include("../include/flip_function.php");
	include("../session.php");
	$user_id = $_SESSION['CLIENT_LOGIN_ID'];
	$get_parent_ids = $conn->query("select * from user_login_master where UserID=$user_id");
$fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
$parentDL = $fetch_parent_ids['parentDL'];
$parentMDL = $fetch_parent_ids['parentMDL'];		
$parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];
$parentKingAdmin = $fetch_parent_ids['parentKingAdmin'];



	if($parentKingAdmin > 0){
		$check_cess_parent = $parentKingAdmin;
	}
	else{
		$check_cess_parent = $parentSuperMDL;
	}

	$get_access = $conn->query("select cricket_access,soccer_access,tennis_access,video_access from user_master where Id=$check_cess_parent");
	$fetch_access = mysqli_fetch_assoc($get_access);
	
	/* if($fetch_access['video_access'] == 1){
		echo "<script>window.location.href='home'</script>";
	} */
?>
<!DOCTYPE html>
<html lang="en">

<?php
	include("head_css.php");
?>

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
                <div class="loader"><i class="fa fa-spinner fa-spin" style="font-size: 38px;"></i></div>
                <ul class="nav nav-tabs game-nav-bar">
                    <li class="nav-item"><a href="home" class="nav-link "> In-play </a></li>
                    <li class="nav-item"><a href="sports" class="nav-link"> Sports </a></li>
                    <li class="nav-item"><a href="slot" class="nav-link router-link-exact-active router-link-active active"> Casino - Slot </a></li>
                    <?php if(ELECTION_EVENT_ID != ''){ ?>
                    	<li class="nav-item"><a href="/m/event_full_market?eventType=<?php echo ELECTION_EVENT_TYPE_ID;?>&eventId=<?php echo ELECTION_EVENT_ID;?>&marketId=<?php echo ELECTION_MARKET_ID;?>" class="nav-link"> <?php echo ELECTION_MARKET_NAME;?> </a></li>
                    <?php } ?>
                    <li class="nav-item"><a href="#" class="nav-link"> Others </a></li>
                </ul>
                <div >
                	<div class="tab-content">
					   <div id="casino" class="tab-pane active container">
							<div class="container-fluid container-fluid-5">
								<div class="row row5 mt-2">
									<div class="col-12">
										<div class="casino-list-title">Live Casino</div>
									</div>
								</div>
								<div class="row row5 mt-2 casino-icons-containers">
									
									
									<div class="col-4 casino-icons-list">
										<a href="/m/live_5_cricket" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/cricketv3.png" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">5Five Cricket</div>
											</div>
										</a>
									</div>
									
									<div class="col-4 casino-icons-list">
										<a href="/m/live_ab202" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/andar-bahar2.png" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">Andar Bahar 2</div>
											</div>
										</a>
									</div>
									
									<div class="col-4 casino-icons-list">
										<a href="/m/live_dt202" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/dt202-transparent.png" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">20-20 DT 2</div>
											</div>
										</a>
									</div>

									<div class="col-4 casino-icons-list">
										<a href="/m/live_baccarat2" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/baccarat2-transparent.png" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">Baccarat 2</div>
											</div>
										</a>
									</div>
									<div class="col-4 casino-icons-list">
										<a href="/m/live_baccarat" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/baccarat-transparent.png" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">Baccarat</div>
											</div>
										</a>
									</div>
									<div class="col-4 casino-icons-list">
										<a href="javascript:void(0);" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/teen2-0.jpg" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">Teenpatti 2.0</div>
											</div>
										</a>
									</div>
									
									<div class="col-4 casino-icons-list">
										<a href="/m/live_lucky7eu" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/lucky7Bmobile.png" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">Lucky 7 - B</div>
											</div>
										</a>
									</div>
									
									<div class="col-4 casino-icons-list">
										<a href="/m/live_cc20" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/cc-20.png" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">20-20 Cricket Match</div>
											</div>
										</a>
									</div>
									
									<div class="col-4 casino-icons-list">
										<a href="/m/live_cmeter" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/meter.png" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">Casino Meter</div>
											</div>
										</a>
									</div>
									
									<div class="col-4 casino-icons-list">
										<a href="/m/live_casino_war" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/war.png" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">Casino War</div>
											</div>
										</a>
									</div>
									
									
									<div class="col-4 casino-icons-list">
										<a href="/m/live_dtl20" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/dtl.png" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">20-20 Dragon Tiger Lion</div>
											</div>
										</a>
									</div>
									<div class="col-4 casino-icons-list">
										<a href="/m/live_20_teenpatti" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/teenpatti.png" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">20-20 Live Teenpatti</div>
											</div>
										</a>
									</div>
									<div class="col-4 casino-icons-list">
										<a href="/m/live_odi_teenpatti" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/teenpatti.png" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">1 Day Live Teenpatti</div>
											</div>
										</a>
									</div>
									<div class="col-4 casino-icons-list">
										<a href="/m/live_test_teenpatti" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/teenpatti.png" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">Test Live Teenpatti</div>
											</div>
										</a>
									</div>
									
									<div class="col-4 casino-icons-list">
										<a href="/m/live_open_teenpatti" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/teenpatti.png" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">Open Live Teenpatti</div>
											</div>
										</a>
									</div>
									
									<div class="col-4 casino-icons-list">
										<a href="/m/live_20poker" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/poker.png" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">20-20 Live Poker</div>
											</div>
										</a>
									</div>
									<div class="col-4 casino-icons-list">
										<a href="/m/live_1day_poker" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/poker.png" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">1 Day Live Poker</div>
											</div>
										</a>
									</div>
									<div class="col-4 casino-icons-list">
										<a href="/m/live_6player_poker" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/poker.png" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">6 Player Live Poker</div>
											</div>
										</a>
									</div>
									
									<div class="col-4 casino-icons-list">
										<a href="/m/live_32_cards-a" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/32cards.png" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">32 Cards-A</div>
											</div>
										</a>
									</div>
									<div class="col-4 casino-icons-list">
										<a href="/m/live_32_cards-b" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/32cards.png" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">32-Cards-B</div>
											</div>
										</a>
									</div>
									<div class="col-4 casino-icons-list">
										<a href="/m/live_20_dragon_tiger" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/dt.png" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">20-20 Dragon Tiger</div>
											</div>
										</a>
									</div>
									<div class="col-4 casino-icons-list">
										<a href="/m/live_odi_dragon_tiger" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/dt.png" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">1-Day Dragon Tiger</div>
											</div>
										</a>
									</div>
									<div class="col-4 casino-icons-list">
										<a href="/m/live_lucky7" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/lucky7.png" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">Lucky 7 - A</div>
											</div>
										</a>
									</div>
									<div class="col-4 casino-icons-list">
										<a href="/m/live_aaa" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/bollywood.png" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">Amar Akbar Anthony</div>
											</div>
										</a>
									</div>
									<div class="col-4 casino-icons-list">
										<a href="/m/live_ddb" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/bollywood.png" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">Bollywood Table</div>
											</div>
										</a>
									</div>
									
									<div class="col-4 casino-icons-list">
										<a href="/m/live_ab20" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/andar-bahar.png" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">Andar Bahar</div>
											</div>
										</a>
									</div>
									<div class="col-4 casino-icons-list">
										<a href="/m/live_worli_matka" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/worli.png" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">Worli Matka</div>
											</div>
										</a>
									</div>
									<div class="col-4 casino-icons-list">
										<a href="/m/live_instant_worli" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/worli.png" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">Instant Worli</div>
											</div>
										</a>
									</div>
									<div class="col-4 casino-icons-list">
										<a href="/m/live_3cardj" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/3cardj.png" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">3 Card Judgement</div>
											</div>
										</a>
									</div>
									<div class="col-4 casino-icons-list">
										<a href="javascript:void(0);" class="">
											<div class="casino-icon text-center">
												<div><img src="../storage/mobile/img/casino_v2/lottery.png" class="img-fluid" style="width: 50%;"></div>
												<div class="d-block mt-2">Lottery</div>
											</div>
										</a>
									</div>
									
								</div>
							</div>
						</div>  
					</div>                  
                </div>
            </div>
        </div>
    </div><script type="text/javascript" src="../js/socket.io.js"></script><script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript">
function url_redirect(link){
	location.href='<?php echo str_replace("index","",MOBILE_URL); ?>'+link;
}
</script>
</body>

<?php
	include "footer.php";
?>
</html>


<script type="text/javascript">

 function tab_view(tab_name){
	 
	 $("#game1").hide();
	 $("#game2").hide();
	 $("#game4").hide();
	 $("#"+tab_name).show();
 }
 
 function formatAMPM(date) {
	  var hours = date.getHours();
	  var minutes = date.getMinutes();
	  var ampm = hours >= 12 ? 'PM' : 'AM';
	  hours = hours % 12;
	  hours = hours ? hours : 12; // the hour '0' should be '12'
	  minutes = minutes < 10 ? '0'+minutes : minutes;
	  var strTime = hours + ':' + minutes + '' + ampm;
	  return strTime;
	}
	
var month_name = function(dt){
mlist = [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ];
  return mlist[dt.getMonth()];
};


var cricket_html= "";
var football_html= "";
var tennis_html = "";
var b11="-";
var b21="-";
var b31="-";

var l11="-";
var l21="-";
var l31="-";

var site_url = '<?php echo WEB_URL; ?>';
var socket = io("<?php echo GAME_IP; ?>");

 socket.on('connect', function() {
		socket.emit('getMatches',{
			eventType : 4
		});
		socket.emit('getMatches',{
			eventType : 1
		});      	
      	socket.emit('getMatches',{
			eventType : 2
		});
	  });
	  
	  socket.on('eventGetLiveEventName',function(data) {
	  		if(data){
	  			if(data.sport){
	  				if(data.sport.body){
					var list_sport = data.sport.body;
					eventNotIncluded = data.eventNotIncluded;
					
					var result = Object.keys(data.sport.body).length;
	  				if(result > 0){
	  					var main_datas = data;
						var main_x = data;
			
						
						smdl_c = ['1','2'];
						mdl_c = ['1','2'];
						dl_c = ['1','2'];
						smdl_s = ['1','2'];
						smdl_b = ['1','2'];
						smdl_r = ['1','2'];
						mdl_s = ['1','2'];
						dl_s = ['1','2'];
						smdl_t = ['1','2'];
						mdl_t = ['1','2'];
						mdl_b = ['1','2'];
						mdl_r = ['1','2'];
						dl_t = ['1','2'];
						dl_b = ['1','2'];
						dl_r = ['1','2'];
						evnt = ['1','2'];
						evnt = eventNotIncluded;
						if(main_x.SMDL[<?php echo SITE_ID; ?>] != undefined){
							if(main_x.SMDL[<?php echo SITE_ID; ?>][<?php echo $parentSuperMDL;?>] != undefined){
								if(main_x.SMDL[<?php echo SITE_ID; ?>][<?php echo $parentSuperMDL;?>]['cricket']){
									smdl_c = main_x.SMDL[<?php echo SITE_ID; ?>][<?php echo $parentSuperMDL;?>]['cricket'];
								}
								if(main_x.SMDL[<?php echo SITE_ID; ?>][<?php echo $parentSuperMDL;?>]['soccer']){
									smdl_s = main_x.SMDL[<?php echo SITE_ID; ?>][<?php echo $parentSuperMDL;?>]['soccer'];
								}
								if(main_x.SMDL[<?php echo SITE_ID; ?>][<?php echo $parentSuperMDL;?>]['tennis']){
									smdl_t = main_x.SMDL[<?php echo SITE_ID; ?>][<?php echo $parentSuperMDL;?>]['tennis'];
								}
								if(main_x.SMDL[<?php echo SITE_ID; ?>][<?php echo $parentSuperMDL;?>]['basketball']){
									smdl_b = main_x.SMDL[<?php echo SITE_ID; ?>][<?php echo $parentSuperMDL;?>]['basketball'];
								}
								if(main_x.SMDL[<?php echo SITE_ID; ?>][<?php echo $parentSuperMDL;?>]['rugby']){
									smdl_r = main_x.SMDL[<?php echo SITE_ID; ?>][<?php echo $parentSuperMDL;?>]['rugby'];
								}
							}
						}
						if(main_x.MDL[<?php echo SITE_ID; ?>] != undefined){
							if(main_x.MDL[<?php echo SITE_ID; ?>][<?php echo $parentMDL;?>] != undefined){
								if(main_x.MDL[<?php echo SITE_ID; ?>][<?php echo $parentMDL;?>]['cricket']){
									mdl_c = main_x.MDL[<?php echo SITE_ID; ?>][<?php echo $parentMDL;?>]['cricket'];
								}
								if(main_x.MDL[<?php echo SITE_ID; ?>][<?php echo $parentMDL;?>]['soccer']){
									mdl_s = main_x.MDL[<?php echo SITE_ID; ?>][<?php echo $parentMDL;?>]['soccer'];
								}
								if(main_x.MDL[<?php echo SITE_ID; ?>][<?php echo $parentMDL;?>]['tennis']){
									mdl_t = main_x.MDL[<?php echo SITE_ID; ?>][<?php echo $parentMDL;?>]['tennis'];
								}
								if(main_x.MDL[<?php echo SITE_ID; ?>][<?php echo $parentMDL;?>]['basketball']){
									mdl_b = main_x.MDL[<?php echo SITE_ID; ?>][<?php echo $parentMDL;?>]['basketball'];
								}
								if(main_x.MDL[<?php echo SITE_ID; ?>][<?php echo $parentMDL;?>]['rugby']){
									mdl_r = main_x.MDL[<?php echo SITE_ID; ?>][<?php echo $parentMDL;?>]['rugby'];
								}
							}
						}
						
						if(main_x.DL[<?php echo SITE_ID; ?>] != undefined){
							
							if(main_x.DL[<?php echo SITE_ID; ?>][<?php echo $parentDL;?>] != undefined){
								if(main_x.DL[<?php echo SITE_ID; ?>][<?php echo $parentDL;?>]['cricket']){
									dl_c = main_x.DL[<?php echo SITE_ID; ?>][<?php echo $parentDL;?>]['cricket'];		
								}
								if(main_x.DL[<?php echo SITE_ID; ?>][<?php echo $parentDL;?>]['soccer']){
									dl_s = main_x.DL[<?php echo SITE_ID; ?>][<?php echo $parentDL;?>]['soccer'];
								}
								if(main_x.DL[<?php echo SITE_ID; ?>][<?php echo $parentDL;?>]['tennis']){
									dl_t = main_x.DL[<?php echo SITE_ID; ?>][<?php echo $parentDL;?>]['tennis'];
								}
								if(main_x.DL[<?php echo SITE_ID; ?>][<?php echo $parentDL;?>]['basketball']){
									dl_b = main_x.DL[<?php echo SITE_ID; ?>][<?php echo $parentDL;?>]['basketball'];
								}
								if(main_x.DL[<?php echo SITE_ID; ?>][<?php echo $parentDL;?>]['rugby']){
									dl_r = main_x.DL[<?php echo SITE_ID; ?>][<?php echo $parentDL;?>]['rugby'];
								}
							}
						}
			
						data = main_datas.sport;
						
						key = Object.keys(data.body)[0];
						eventType = parseInt(data.body[key].SportId);
						for(var i in data.body){
				
							
						if(data.body[i]){
							event_id = data.body[i].matchid.toString();
							marketId = data.body[i].marketid;
							n1 = smdl_c.includes(event_id) || smdl_c.includes(event_id.toString());
							n2 = mdl_c.includes(event_id) || mdl_c.includes(event_id.toString()) ;
							n3 = dl_c.includes(event_id) || dl_c.includes(event_id.toString());
	
							s1 = smdl_s.includes(event_id) || smdl_s.includes(event_id.toString());
							s2 = mdl_s.includes(event_id) || mdl_s.includes(event_id.toString());
							s3 = dl_s.includes(event_id) || dl_s.includes(event_id.toString());
	
							t1 = smdl_t.includes(event_id) || smdl_t.includes(event_id.toString());
							t2 = mdl_t.includes(event_id) || mdl_t.includes(event_id.toString());
							t3 = dl_t.includes(event_id) || dl_t.includes(event_id.toString());
							
							b1 = smdl_b.includes(event_id) || smdl_b.includes(event_id.toString());
							b2 = mdl_b.includes(event_id) || mdl_b.includes(event_id.toString());
							b3 = dl_b.includes(event_id) || dl_b.includes(event_id.toString());
							
							r1 = smdl_r.includes(event_id) || smdl_r.includes(event_id.toString());
							r2 = mdl_r.includes(event_id) || mdl_r.includes(event_id.toString());
							r3 = dl_r.includes(event_id) || dl_r.includes(event_id.toString());
							e1 = evnt.includes(parseInt(marketId)) || evnt.includes(marketId.toString());
							if(!n1 && !n2 && !n3 && !s1 && !s2 && !s3 && !t1 && !t2 && !t3 && !b1 && !b2 && !b3 && !r1 && !r2 && !r3 && !e1){
								
							if(eventType == 4){
								event_name = data.body[i].matchName;
								
								marketTime = data.body[i].matchdate;
								marketDateTime = data.body[i].matchdate;
							
								if(event_name.indexOf("/") != -1){
									event_name_arr = event_name.split("/");
									event_name = event_name_arr[0];
								}
								
								var temp_event_name = (event_name).split(' v ');
								var home_team = (temp_event_name[0]).trim();
								
								if(event_id == '30306599')
									continue;
								
								if(['Karnataka','Jammu And Kashmir','Baroda','Uttarakhand','Chhattisgarh','Himachal Pradesh','Gujarat','Maharashtra','Jharkhand','Tamil Nadu','Odisha','Bengal','Railways','Tripura','Punjab','Uttar Pradesh','','Hyderabad','Chandigarh','Nagaland','Bihar','Arunachal Pradesh','Mumbai','Delhi','Haryana','Andhra','Mizoram','Sikkim','Vidarbha','Rajasthan','Services','Saurashtra','Meghalaya','Manipur','Kerala','Puducherry','Madhya Pradesh','Goa'].includes(home_team)){
									continue;
								}

									inPlay = data.body[i].inPlay || "0";
									marketId = data.body[i].marketid;
									marketinPlay = data.body[i].inPlay || "0";
									isFancy = data.body[i].fancy || "0";
									is_tv = data.body[i].tv || "0";
									fancySpan = "";
									if(marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" || marketinPlay == 1){
										market_status = "active-icon";										
									}else{
										market_status = "";
							
									}
									
									if(isFancy == true || isFancy == "True" || isFancy == "1" || isFancy == 1){
										fancy_status = "<span class='game-icon'><img src='../storage/front/img/ic_fancy.png' class='fancy-icon'></span>";										
									}else{
										fancy_status = "";
							
									}
									
									if(is_tv == true || is_tv == "True" || is_tv == "1" || is_tv == 1){
										tv_status = "<span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span>";										
									}else{
										tv_status = "";
							
									}
					
								
								b11 = parseFloat(data.body[i].b1) != 0 ? data.body[i].b1 : "-";
								b21 = parseFloat(data.body[i].b2) != 0 ? data.body[i].b2 : "-";
								b31 = parseFloat(data.body[i].b3) != 0 ? data.body[i].b2 : "-";
								
								
								l11 = parseFloat(data.body[i].l1) != 0 ? data.body[i].l1 : "-";
								l21 = parseFloat(data.body[i].l2) != 0 ? data.body[i].l2 : "-";
								l31 = parseFloat(data.body[i].l3) != 0 ? data.body[i].l3 : "-";
								
							
								
								cricket_html +="<span onclick=\"url_redirect('event_full_market?eventType="+eventType+"&eventId="+event_id+"&marketId="+marketId+"');\"><div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-8'><p class='mb-0 game-name'><strong >"+event_name+"</strong></p><p class='mb-0'>"+marketTime+"</p></div><div class='col-4 text-right'><div class='game-icons'><span class='game-icon'><span class='"+market_status+"' style='vertical-align: bottom;'></span></span> "+tv_status+" "+fancy_status+" <span class='game-icon'><img src='../storage/mobile/img/ic_bm.png' class='bm-icon'></span></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><b >1</b></div><div class='text-center game-col game-home'><b >X</b></div><div class='text-center game-col game-home'><b >2</b></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>"+b11+"</a> <a href='javascript:void(0);' class='btn-lay'>"+l11+"</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>"+b31+"</a> <a href='javascript:void(0);' class='btn-lay'>"+l31+"</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>"+b21+"</a> <a href='javascript:void(0);' class='btn-lay'>"+l21+"</a></div></div></div></div> </span>";
								
								
							
							}
							
							if(eventType == 1){
								event_name = data.body[i].matchName;
								
								marketTime = data.body[i].matchdate;
								matchdate_ = (marketTime).toString();
										
								if(matchdate_.search("(IST)") == -1){
									var _date = new Date(marketTime);
									var _matchtime = formatAMPM(_date);
									marketTime = month_name(_date) + ' ' + _date.getDate() + ' ' + _date.getFullYear() + ' '+ _matchtime;
								}
							

									inPlay = data.body[i].inPlay || "0";
									marketId = data.body[i].marketid;
									marketinPlay = data.body[i].inPlay || "0";
									isFancy = data.body[i].fancy || "0";
									is_tv = data.body[i].tv || "0";
									fancySpan = "";
									if(marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" || marketinPlay == 1){
										market_status = "active-icon";										
									}else{
										market_status = "";
							
									}
									
									if(isFancy == true || isFancy == "True" || isFancy == "1" || isFancy == 1){
										fancy_status = "<span class='game-icon'><img src='../storage/front/img/ic_fancy.png' class='fancy-icon'></span>";										
									}else{
										fancy_status = "";
							
									}
									
									if(is_tv == true || is_tv == "True" || is_tv == "1" || is_tv == 1){
										tv_status = "<span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span>";										
									}else{
										tv_status = "";
							
									}
					
								
								b11 = parseFloat(data.body[i].b1) != 0 ? data.body[i].b1 : "-";
								b21 = parseFloat(data.body[i].b2) != 0 ? data.body[i].b2 : "-";
								b31 = parseFloat(data.body[i].b3) != 0 ? data.body[i].b2 : "-";
								
								
								l11 = parseFloat(data.body[i].l1) != 0 ? data.body[i].l1 : "-";
								l21 = parseFloat(data.body[i].l2) != 0 ? data.body[i].l2 : "-";
								l31 = parseFloat(data.body[i].l3) != 0 ? data.body[i].l3 : "-";
								
								if (b11 == undefined || b11 == "undefined") {
									b11 = 0;
								}
								if (b21 == undefined || b21 == "undefined") {
									b21 = 0;
								}
								if (b31 == undefined || b31 == "undefined") {
									b31 = 0;
								}


								if (l11 == undefined || l11 == "undefined") {
									l11 = 0;
								}
								if (l21 == undefined || l21 == "undefined") {
									l21 = 0;
								}
								if (l31 == undefined || l31 == "undefined") {
									l31 = 0;
								}
								
								football_html +="<span onclick=\"url_redirect('event_full_market?eventType="+eventType+"&eventId="+event_id+"&marketId="+marketId+"');\"><div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-8'><p class='mb-0 game-name'><strong >"+event_name+"</strong></p><p class='mb-0'>"+marketTime+"</p></div><div class='col-4 text-right'><div class='game-icons'><span class='game-icon'><span class='"+market_status+"' style='vertical-align: bottom;'></span></span> "+tv_status+" "+fancy_status+" <span class='game-icon'><img src='../storage/mobile/img/ic_bm.png' class='bm-icon'></span></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><b >1</b></div><div class='text-center game-col game-home'><b >X</b></div><div class='text-center game-col game-home'><b >2</b></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>"+b11+"</a> <a href='javascript:void(0);' class='btn-lay'>"+l11+"</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>"+b31+"</a> <a href='javascript:void(0);' class='btn-lay'>"+l31+"</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>"+b21+"</a> <a href='javascript:void(0);' class='btn-lay'>"+l21+"</a></div></div></div></div> </span>";
								
								
							
							}
							
							if(eventType == 2){
								event_name = data.body[i].matchName;
								
								marketTime = data.body[i].matchdate;
								
								matchdate_ = (marketTime).toString();
										
								if(matchdate_.search("(IST)") == -1){
									var _date = new Date(marketTime);
									var _matchtime = formatAMPM(_date);
									marketTime = month_name(_date) + ' ' + _date.getDate() + ' ' + _date.getFullYear() + ' '+ _matchtime;
								}

								inPlay = data.body[i].inPlay || "0";
								marketId = data.body[i].marketid;
								marketinPlay = data.body[i].inPlay || "0";
								isFancy = data.body[i].fancy || "0";
								is_tv = data.body[i].tv || "0";
								fancySpan = "";
								if(marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" || marketinPlay == 1){
									market_status = "active-icon";										
								}else{
									market_status = "";
								}
								
								if(isFancy == true || isFancy == "True" || isFancy == "1" || isFancy == 1){
									fancy_status = "<span class='game-icon'><img src='../storage/front/img/ic_fancy.png' class='fancy-icon'></span>";										
								}else{
									fancy_status = "";
								}
								
								if(is_tv == true || is_tv == "True" || is_tv == "1" || is_tv == 1){
									tv_status = "<span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span>";										
								}else{
									tv_status = "";
								}
								
								b11 = parseFloat(data.body[i].b1) != 0 ? data.body[i].b1 : "-";
								b21 = parseFloat(data.body[i].b2) != 0 ? data.body[i].b2 : "-";
								b31 = parseFloat(data.body[i].b3) != 0 ? data.body[i].b2 : "-";
								
								l11 = parseFloat(data.body[i].l1) != 0 ? data.body[i].l1 : "-";
								l21 = parseFloat(data.body[i].l2) != 0 ? data.body[i].l2 : "-";
								l31 = parseFloat(data.body[i].l3) != 0 ? data.body[i].l3 : "-";
								
								
								if (b11 == undefined || b11 == "undefined") {
									b11 = 0;
								}
								if (b21 == undefined || b21 == "undefined") {
									b21 = 0;
								}
								if (b31 == undefined || b31 == "undefined") {
									b31 = 0;
								}


								if (l11 == undefined || l11 == "undefined") {
									l11 = 0;
								}
								if (l21 == undefined || l21 == "undefined") {
									l21 = 0;
								}
								if (l31 == undefined || l31 == "undefined") {
									l31 = 0;
								}
								
								tennis_html +="<span onclick=\"url_redirect('event_full_market?eventType="+eventType+"&eventId="+event_id+"&marketId="+marketId+"');\"><div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-8'><p class='mb-0 game-name'><strong >"+event_name+"</strong></p><p class='mb-0'>"+marketTime+"</p></div><div class='col-4 text-right'><div class='game-icons'><span class='game-icon'><span class='"+market_status+"' style='vertical-align: bottom;'></span></span> "+tv_status+" "+fancy_status+" <span class='game-icon'><img src='../storage/mobile/img/ic_bm.png' class='bm-icon'></span></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><b >1</b></div><div class='text-center game-col game-home'><b >X</b></div><div class='text-center game-col game-home'><b >2</b></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>"+b11+"</a> <a href='javascript:void(0);' class='btn-lay'>"+l11+"</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>"+b31+"</a> <a href='javascript:void(0);' class='btn-lay'>"+l31+"</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>"+b21+"</a> <a href='javascript:void(0);' class='btn-lay'>"+l21+"</a></div></div></div></div> </span>";				
							}
							
							}
						}
			
				  }
				  
				
							if(eventType == 4){
								$("#cricket_event").html(cricket_html);
								cricket_html = "";
							}
							
							if(eventType == 1){
								$("#football_event").html(football_html);
								football_html = "";
							}
							if(eventType == 2){
								$("#tennis_event").html(tennis_html);
								tennis_html = "";
							}
					}
				}
				}
	  		}		
	  });
	  
			
</script>
<script type="text/javascript" src='footer-js.js?<?php echo time(); ?>'></script>