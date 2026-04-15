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
?>
<!DOCTYPE html>
<html lang="en">

<?php
	include("head_css.php");
?>
<script type="text/javascript">
	  var check = false;
	  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
	  if(check == false){
		window.location.assign('<?php echo WEB_URL."home"; ?>');
	  }
</script>
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
                <ul class="nav nav-tabs game-nav-bar">
                    <li class="nav-item"><a href="home" class="nav-link "> In-play </a></li>
                    <li class="nav-item"><a href="sports" class="nav-link router-link-exact-active router-link-active active"> Sports </a></li>
                    <li class="nav-item"><a href="slot" class="nav-link"> Casino + Slot </a></li>
                    <?php if(ELECTION_EVENT_ID != ''){ ?>
                    	<li class="nav-item"><a href="/m/event_full_market?eventType=<?php echo ELECTION_EVENT_TYPE_ID;?>&eventId=<?php echo ELECTION_EVENT_ID;?>&marketId=<?php echo ELECTION_MARKET_ID;?>" class="nav-link"> <?php echo ELECTION_MARKET_NAME;?> </a></li>
                    <?php } ?>
                    <li class="nav-item"><a href="others" class="nav-link"> Others </a></li>
                </ul>
                <div >
                    <div class="tab-content">
                        <div id="home" class="tab-pane sports active">
                            <ul class="nav nav-tabs game-nav-bar">
                                <?php if($fetch_access['cricket_access'] == 1){ ?>
									<li class="nav-item text-center">
										<a data-toggle="tab" href="#game4" onclick="tab_view('game4')" class="nav-link active">
											<div ><img src="../storage/mobile/img/gameImg/4.png"></div>
											<div >
												Cricket
											</div>
										</a>
									</li>
                                <?php } if($fetch_access['soccer_access'] == 1){ ?>
									<li class="nav-item text-center">
										<a data-toggle="tab" href="#game1" onclick="tab_view('game1')" class="nav-link">
											<div ><img src="../storage/mobile/img/gameImg/1.png"></div>
											<div >
												Football
											</div>
										</a>
									</li>
                                <?php } if($fetch_access['tennis_access'] == 1){ ?>
									<li class="nav-item text-center">
										<a data-toggle="tab" href="#game2" onclick="tab_view('game2')" class="nav-link">
											<div ><img src="../storage/mobile/img/gameImg/2.png"></div>
											<div >
												Tennis
											</div>
										</a>
									</li>
                                <?php } ?>
                                
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game6" onclick="tab_view('game6')" class="nav-link">
                                        <div ><img src="../storage/mobile/img/gameImg/7524.png"></div>
                                        <div >
                                            Ice Hockey
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game6" onclick="tab_view('game6')" class="nav-link">
                                        <div ><img src="../storage/mobile/img/gameImg/998917.png"></div>
                                        <div >
                                            Volleyball
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game6" onclick="tab_view('game6')" class="nav-link">
                                        <div ><img src="../storage/mobile/img/gameImg/7522.png"></div>
                                        <div >
                                            BasketBall
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game6" onclick="tab_view('game6')" class="nav-link">
                                        <div ><img src="../storage/mobile/img/gameImg/70.png"></div>
                                        <div >
                                            Table Tennis
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game6" onclick="tab_view('game6')" class="nav-link">
                                        <div ><img src="../storage/mobile/img/gameImg/3503.png"></div>
                                        <div >
                                            Darts
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game6" onclick="tab_view('game6')" class="nav-link">
                                        <div ><img src="../storage/mobile/img/gameImg/71.png"></div>
                                        <div >
                                            Badminton
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game6" onclick="tab_view('game6')" class="nav-link">
                                        <div ><img src="../storage/mobile/img/gameImg/52.png"></div>
                                        <div >
                                            Kabaddi
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game6" onclick="tab_view('game6')" class="nav-link">
                                        <div ><img src="../storage/mobile/img/gameImg/6.png"></div>
                                        <div >
                                            Boxing
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game6" onclick="tab_view('game6')" class="nav-link">
                                        <div ><img src="../storage/mobile/img/gameImg/26420387.png"></div>
                                        <div >
                                            Mixed Martial Arts
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center">
                                    <a data-toggle="tab" href="#game6" onclick="tab_view('game6')" class="nav-link">
                                        <div ><img src="../storage/mobile/img/gameImg/8.png"></div>
                                        <div >
                                            Motor Sport
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="game1" class="tab-pane container pl-0 pr-0">
                                    <div class="game-listing-container" id="football_event" style="; overflow-x: auto;">
                                    	<div class="game-list pt-1 pb-1 container-fluid">
											<div class="row row5">
												<div class="col-12">
													<p class="text-center mb-1 mt-1">No real-time records found</p>
												</div>
											</div>
										</div>
                                    </div>
                                </div>
                                <div id="game2" class="tab-pane container pl-0 pr-0">
                                    <div class="game-listing-container" id="tennis_event"  style="overflow-x: auto;">
                                        <div class="game-list pt-1 pb-1 container-fluid">
                                            <div class="row row5">
                                                <div class="col-12">
                                                    <p class="text-center mb-1 mt-1">No real-time records found</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="game4" class="tab-pane container pl-0 pr-0 active">
                                    <div class="game-listing-container" id="cricket_event" style="">                                        
                                        <div class="row row5">
											<div class="col-12">
												<p class="text-center mb-1 mt-1">No real-time records found</p>
											</div>
										</div>
                                    </div>
                                </div>
                                <div id="game6" class="tab-pane container pl-0 pr-0">
                                    <div class="game-listing-container" style="max-height: calc((100vh - 184px) / 2); overflow-x: auto;">
                                        <div class="game-list pt-1 pb-1 container-fluid">
                                            <div class="row row5">
                                                <div class="col-12">
                                                    <p class="text-center mb-1 mt-1">No real-time records found</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="game8" class="tab-pane container pl-0 pr-0">
                                    <div class="game-listing-container" style="max-height: calc((100vh - 184px) / 2); overflow-x: auto;">
                                        <div class="game-list pt-1 pb-1 container-fluid">
                                            <div class="row row5">
                                                <div class="col-12">
                                                    <p class="text-center mb-1 mt-1">No real-time records found</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="game52" class="tab-pane container pl-0 pr-0">
                                    <div class="game-listing-container" style="max-height: calc((100vh - 184px) / 2); overflow-x: auto;">
                                        <div class="game-list pt-1 pb-1 container-fluid">
                                            <div class="row row5">
                                                <div class="col-12">
                                                    <p class="text-center mb-1 mt-1">No real-time records found</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="game26420387" class="tab-pane container pl-0 pr-0">
                                    <div class="game-listing-container" style="max-height: calc((100vh - 184px) / 2); overflow-x: auto;">
                                        <div class="game-list pt-1 pb-1 container-fluid">
                                            <div class="row row5">
                                                <div class="col-12">
                                                    <p class="text-center mb-1 mt-1">No real-time records found</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!---->
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


$.ajax({
		 type: 'GET',
		 url: '<?php echo GAME_IP; ?>getCricketMatches',
		 success: function(data) {
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
						 
			
						data = main_datas.sport;
						data.body.sort(function(a, b) {
								return (a.inPlay === b.inPlay) ? 0 : (a.inPlay ? -1 : 1);
						});
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
								
								matchdate_ = (marketTime).toString();
								if(matchdate_.search("(IST)") == -1){
									var _date = new Date(marketTime);
									var _matchtime = formatAMPM(_date);
									marketTime = month_name(_date) + ' ' + _date.getDate() + ' ' + _date.getFullYear() + ' '+ _matchtime;
								}
								
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
					
								
									var b11="-";
									var b21="-";
									var b31="-";
									
									var l11="-";
									var l21="-";
									var l31="-";
									console.log(data.body[i]);
									if(data.body[i].b1){
											b11 = data.body[i].b1;
										}
										if(data.body[i].b2){
											b21 = data.body[i].b2;
										}
										if(data.body[i].b3){
											b31 = data.body[i].b3;
										}
										
										if(data.body[i].l1){
											l11 = data.body[i].l1;
										}
										if(data.body[i].l2){
											l21 = data.body[i].l2;
										}
										if(data.body[i].b3){
											l31 = data.body[i].l3;
										}
								
							
								
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
								b31 = parseFloat(data.body[i].b3) != 0 ? data.body[i].b3 : "-";
								
								
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
								marketDateTime = data.body[i].matchdate;

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
								b31 = parseFloat(data.body[i].b3) != 0 ? data.body[i].b3 : "-";
								
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
		 }
});

 socket.on('connect', function() {
 
 		<?php if($fetch_access['cricket_access'] == 1){ ?>
			socket.emit('getMatches',{
				eventType : 4
			});
		<?php } ?>
		<?php if($fetch_access['soccer_access'] == 1){ ?>
			socket.emit('getMatches',{
				eventType : 1
			});
		<?php } ?>
		<?php if($fetch_access['tennis_access'] == 1){ ?>
			socket.emit('getMatches',{
				eventType : 2
			});
		<?php } ?>
      		
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
						
			
						data = main_datas.sport;
						data.body.sort(function(a, b) {
								return (a.inPlay === b.inPlay) ? 0 : (a.inPlay ? -1 : 1);
						});
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
								
								matchdate_ = (marketTime).toString();
								if(matchdate_.search("(IST)") == -1){
									var _date = new Date(marketTime);
									var _matchtime = formatAMPM(_date);
									marketTime = month_name(_date) + ' ' + _date.getDate() + ' ' + _date.getFullYear() + ' '+ _matchtime;
								}
								
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
					
								
									var b11="-";
									var b21="-";
									var b31="-";
									
									var l11="-";
									var l21="-";
									var l31="-";
									console.log(data.body[i]);
									if(data.body[i].b1){
											b11 = data.body[i].b1;
										}
										if(data.body[i].b2){
											b21 = data.body[i].b2;
										}
										if(data.body[i].b3){
											b31 = data.body[i].b3;
										}
										
										if(data.body[i].l1){
											l11 = data.body[i].l1;
										}
										if(data.body[i].l2){
											l21 = data.body[i].l2;
										}
										if(data.body[i].b3){
											l31 = data.body[i].l3;
										}
								
							
								
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
								b31 = parseFloat(data.body[i].b3) != 0 ? data.body[i].b3 : "-";
								
								
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
								marketDateTime = data.body[i].matchdate;

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
								b31 = parseFloat(data.body[i].b3) != 0 ? data.body[i].b3 : "-";
								
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