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
	include("head_css2.php");
	
?>
<style>
    
    /*.casino-title{
        display: flex;
    }

    .casino-title .d-block{
        margin-top:1px;
    }

    .casino-title a{
        color: #fff;
        text-decoration: underline;
    }*/
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
                      
                    <div class="tab-content new-casino race">
   <div id="bhav" class="tab-pane active">
      <div class="casino-title">
         <div class="row row5">
            <div class="casino-name col-4">Race 20-20</div>
            <div class="casino-name text-right col-8">Total Cards: <span id="total_card">8</span> | Total Points: <span  id="total_point">37</span></div>
         </div>
      </div>

      <?php
                  include("casino_header.php");
               ?>
      <!----> 
      <div class="casino-video">
         <div class="video-box-container">
            <div class="video-container"><iframe src="<?php echo IFRAME_URL."".RACE20_CODE;?>" width="100%" height="200" style="border: 0px;"></iframe></div>
         </div>
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
            
			 <div class="mb-1">
					  <span><img src="../storage/front/img/cards/spade_race.png"></span> 
					  
					  <span><img src="../storage/front/img/cards/1.png" id="card_spade_1" class="cl_cards" style="display:none;"></span>
					  <span><img src="../storage/front/img/cards/1.png" id="card_spade_2" class="cl_cards" style="display:none;"></span>
					  <span><img src="../storage/front/img/cards/1.png" id="card_spade_3" class="cl_cards" style="display:none;"></span>
					  <span><img src="../storage/front/img/cards/1.png" id="card_spade_4" class="cl_cards" style="display:none;"></span> 
					  <span><img src="../storage/front/img/cards/1.png" id="card_spade_5" class="cl_cards" style="display:none;"></span>
					  <span><img src="../storage/front/img/cards/1.png" id="card_spade_6" class="cl_cards" style="display:none;"></span>
				</div>
                
				<div class="mb-1">
					<span><img src="../storage/front/img/cards/heart_race.png"></span> 
					
					<span><img src="../storage/front/img/cards/1.png" id="card_heart_1" class="cl_cards" style="display:none;"></span>
					<span><img src="../storage/front/img/cards/1.png" id="card_heart_2" class="cl_cards" style="display:none;"></span>
					<span><img src="../storage/front/img/cards/1.png" id="card_heart_3" class="cl_cards" style="display:none;"></span>
					<span><img src="../storage/front/img/cards/1.png" id="card_heart_4" class="cl_cards" style="display:none;"></span>
					<span><img src="../storage/front/img/cards/1.png" id="card_heart_5" class="cl_cards" style="display:none;"></span> 
					<span><img src="../storage/front/img/cards/1.png" id="card_heart_6" class="cl_cards" style="display:none;"></span>
					
				</div>
                
				<div class="mb-1">
					<span><img src="../storage/front/img/cards/club_race.png"></span> 
					
					<span><img src="../storage/front/img/cards/1.png" id="card_club_1" class="cl_cards" style="display:none;"></span>
					<span><img src="../storage/front/img/cards/1.png" id="card_club_2" class="cl_cards" style="display:none;"></span>
					<span><img src="../storage/front/img/cards/1.png" id="card_club_3" class="cl_cards" style="display:none;"></span>
					<span><img src="../storage/front/img/cards/1.png" id="card_club_4" class="cl_cards" style="display:none;"></span>
					<span><img src="../storage/front/img/cards/1.png" id="card_club_5" class="cl_cards" style="display:none;"></span> 
					<span><img src="../storage/front/img/cards/1.png" id="card_club_6" class="cl_cards" style="display:none;"></span>
				</div>
                
				<div class="mb-1">
					<span><img src="../storage/front/img/cards/diamond_race.png"></span> 
					
					<span><img src="../storage/front/img/cards/1.png" id="card_diamond_1" class="cl_cards" style="display:none;"></span>
					<span><img src="../storage/front/img/cards/1.png" id="card_diamond_2" class="cl_cards" style="display:none;"></span>
					<span><img src="../storage/front/img/cards/1.png" id="card_diamond_3" class="cl_cards" style="display:none;"></span>
					<span><img src="../storage/front/img/cards/1.png" id="card_diamond_4" class="cl_cards" style="display:none;"></span>
					<span><img src="../storage/front/img/cards/1.png" id="card_diamond_5" class="cl_cards" style="display:none;"></span> 
					<span><img src="../storage/front/img/cards/1.png" id="card_diamond_6" class="cl_cards" style="display:none;"></span>
					
				</div>
				
         </div>
      </div>
      <div class="card-content mt-1">
         <div class="casino-odds-box-wrapper">
            <div class="casino-odds-box-container casino-odds-box-container-double">
               <div class="casino-odds-box-bhav">
                  <img src="../storage/front/img/cards/KHH.png" style="width: 35px;"> 
                  <div class="range-icon">
                     <i data-toggle="collapse" data-target="#demo0" class="fas fa-info-circle float-right"></i> 
                     <div id="demo0" class="collapse icon-range">
                        Range:<span>100.0</span>-<span>100 K</span>
                     </div>
                  </div>
               </div>
               <div class="casino-odds-box suspended market_1_row">
                  <div class="back-border market_1_b_btn back-1"><span class="casino-odds-box-odd">0.00</span> <span>0</span></div>
                  <div class="lay-border market_1_l_btn lay-1"><span class="casino-odds-box-odd">0.00</span> <span>0</span></div>
               </div>
               <div class="casino-odds-book market_1_b_exposure market_exposure" style="color: black;">0</div>
            </div>
            <div class="casino-odds-box-container casino-odds-box-container-double">
               <div class="casino-odds-box-bhav">
                  <img src="../storage/front/img/cards/KDD.png" style="width: 35px;"> 
                  <div class="range-icon">
                     <i data-toggle="collapse" data-target="#demo1" class="fas fa-info-circle float-right"></i> 
                     <div id="demo1" class="collapse icon-range">
                        Range: <span>100.0</span>-<span>100 K</span>
                     </div>
                  </div>
               </div>
               <div class="casino-odds-box suspended market_2_row">
                  <div class="back-border market_2_b_btn back-1"><span class="casino-odds-box-odd">0.00</span> <span>0</span></div>
                  <div class="lay-border market_2_l_btn lay-1"><span class="casino-odds-box-odd">0.00</span> <span>0</span></div>
               </div>
               <div class="casino-odds-book market_2_b_exposure market_exposure" style="color: black;">0</div>
            </div>
            <div class="casino-odds-box-container casino-odds-box-container-double">
               <div class="casino-odds-box-bhav">
                  <img src="../storage/front/img/cards/KCC.png" style="width: 35px;"> 
                  <div class="range-icon">
                     <i data-toggle="collapse" data-target="#demo2" class="fas fa-info-circle float-right"></i> 
                     <div id="demo2" class="collapse icon-range">
                        Range:<span>100.0</span>-<span>100 K</span>
                     </div>
                  </div>
               </div>
               <div class="casino-odds-box suspended market_3_row">
                  <div class="back-border market_3_b_btn back-1"><span class="casino-odds-box-odd">0.00</span> <span>0</span></div>
                  <div class="lay-border market_3_l_btn lay-1"><span class="casino-odds-box-odd">0.00</span> <span>0</span></div>
               </div>
               <div class="casino-odds-book market_3_b_exposure market_exposure" style="color: black;">0</div>
            </div>
            <div class="casino-odds-box-container casino-odds-box-container-double">
               <div class="casino-odds-box-bhav">
                  <img src="../storage/front/img/cards/KSS.png" style="width: 35px;"> 
                  <div class="range-icon">
                     <i data-toggle="collapse" data-target="#demo3" class="fas fa-info-circle float-right"></i> 
                     <div id="demo3" class="collapse icon-range">
                        Range:<span>100.0</span>-<span>100 K</span>
                     </div>
                  </div>
               </div>
               <div class="casino-odds-box suspended market_4_row">
                  <div class="back-border market_4_b_btn back-1"><span class="casino-odds-box-odd">0.00</span> <span>0</span></div>
                  <div class="lay-border market_4_l_btn lay-1"><span class="casino-odds-box-odd">0.00</span> <span>0</span></div>
               </div>
               <div class="casino-odds-book market_4_b_exposure market_exposure" style="color: black;">0</div>
            </div>
         </div>
      </div>
      <div class="card-content mt-1">
         <div class="casino-odds-box-container casino-odds-box-container-extra">
            <div class="casino-yn">
               <div></div>
               <div class="casino-odds-box-bhav"><b>No</b></div>
               <div class="casino-odds-box-bhav"><b>Yes</b></div>
            </div>
            <div class="casino-odds-box casino-yn">
               <div class="casino-odds-box-bhav">
                  <b>Total Point</b> 
                  <div class="range-icon">
                     <i data-toggle="collapse" data-target="#demo4" class="fas fa-info-circle float-right"></i> 
                     <div id="demo4" class="collapse icon-range">
                        Range:<span>100.0</span>-<span>100 K</span>
                     </div>
                  </div>
               </div>
               <div class="lay-border suspended market_5_row market_5_l_btn lay-1"><span class="casino-odds-box-odd">0.00</span> <span>0</span></div>
               <div class="back-border suspended market_5_row market_5_b_btn back-1"><span class="casino-odds-box-odd">0.00</span> <span>0</span></div>
            </div>
            <div class="casino-odds-book market_5_b_exposure market_exposure" style="color: black;">0</div>
         </div>
         <div class="casino-odds-box-container casino-odds-box-container-extra">
            <div class="casino-yn">
               <div></div>
               <div class="casino-odds-box-bhav"><b>No</b></div>
               <div class="casino-odds-box-bhav"><b>Yes</b></div>
            </div>
            <div class="casino-odds-box casino-yn">
               <div class="casino-odds-box-bhav">
                  <b>Total Card</b> 
                  <div class="range-icon">
                     <i data-toggle="collapse" data-target="#demo5" class="fas fa-info-circle float-right"></i> 
                     <div id="demo5" class="collapse icon-range">
                        Range:<span>100.0</span>-<span>100 K</span>
                     </div>
                  </div>
               </div>
               <div class="lay-border suspended market_6_row market_6_l_btn lay-1"><span class="casino-odds-box-odd">0.00</span> <span>0</span></div>
               <div class="back-border suspended market_6_row market_6_b_btn back-1"><span class="casino-odds-box-odd">0.00</span> <span>0</span></div>
            </div>
            <div class="casino-odds-book market_6_b_exposure market_exposure" style="color: black;">0</div>
         </div>
      </div>
      <div class="card-content mt-1">
         <div class="row row5">
            <div class="col-4">
               <div class="casino-odds-box-container casino-odds-box-container-extra">
                  <div class="casino-odds-box-bhav">
                     <b>Win with 5</b> 
                     <div class="range-icon">
                        <i data-toggle="collapse" data-target="#demo6" class="fas fa-info-circle float-right"></i> 
                        <div id="demo6" class="collapse icon-range">
                           Range:<span>10.0</span>-<span>25 K</span>
                        </div>
                     </div>
                  </div>
                  <div class="casino-odds-box back-border suspended market_7_row market_7_b_btn back-1"><span class="casino-odds-box-odd">0.00</span></div>
                  <div class="casino-odds-book market_7_b_exposure market_exposure" style="color: black;">0</div>
               </div>
               <div class="casino-odds-box-container casino-odds-box-container-extra">
                  <div class="casino-odds-box-bhav">
                     <b>Win with 15</b> 
                     <div class="range-icon">
                        <i data-toggle="collapse" data-target="#demo9" class="fas fa-info-circle float-right"></i> 
                        <div id="demo9" class="collapse icon-range">
                           Range:<span>10.0</span>-<span>25 K</span>
                        </div>
                     </div>
                  </div>
                  <div class="casino-odds-box back-border suspended market_10_row market_10_b_btn back-1"><span class="casino-odds-box-odd">0.00</span></div>
                  <div class="casino-odds-book market_10_b_exposure market_exposure" style="color: black;">0</div>
               </div>
            </div>
            <div class="col-4">
               <div class="casino-odds-box-container casino-odds-box-container-extra">
                  <div class="casino-odds-box-bhav">
                     <b>Win with 6</b> 
                     <div class="range-icon">
                        <i data-toggle="collapse" data-target="#demo7" class="fas fa-info-circle float-right"></i> 
                        <div id="demo7" class="collapse icon-range">
                           Range:<span>10.0</span>-<span>25 K</span>
                        </div>
                     </div>
                  </div>
                  <div class="casino-odds-box back-border suspended market_8_row market_8_b_btn back-1"><span class="casino-odds-box-odd">0.00</span></div>
                  <div class="casino-odds-book market_8_b_exposure market_exposure" style="color: black;">0</div>
               </div>
               <div class="casino-odds-box-container casino-odds-box-container-extra">
                  <div class="casino-odds-box-bhav">
                     <b>Win with 16</b> 
                     <div class="range-icon">
                        <i data-toggle="collapse" data-target="#demo10" class="fas fa-info-circle float-right"></i> 
                        <div id="demo10" class="collapse icon-range">
                           Range:<span>10.0</span>-<span>25 K</span>
                        </div>
                     </div>
                  </div>
                  <div class="casino-odds-box back-border suspended market_11_row market_11_b_btn back-1"><span class="casino-odds-box-odd">0.00</span></div>
                  <div class="casino-odds-book market_11_b_exposure market_exposure" style="color: black;">0</div>
               </div>
            </div>
            <div class="col-4">
               <div class="casino-odds-box-container casino-odds-box-container-extra">
                  <div class="casino-odds-box-bhav">
                     <b>Win with 7</b> 
                     <div class="range-icon">
                        <i data-toggle="collapse" data-target="#demo8" class="fas fa-info-circle float-right"></i> 
                        <div id="demo8" class="collapse icon-range">
                           Range:<span>10.0</span>-<span>25 K</span>
                        </div>
                     </div>
                  </div>
                  <div class="casino-odds-box back-border suspended market_9_row market_9_b_btn back-1"><span class="casino-odds-box-odd">0.00</span></div>
                  <div class="casino-odds-book market_9_b_exposure market_exposure" style="color: black;">0</div>
               </div>
               <div class="casino-odds-box-container casino-odds-box-container-extra">
                  <div class="casino-odds-box-bhav">
                     <b>Win with 17</b> 
                     <div class="range-icon">
                        <i data-toggle="collapse" data-target="#demo11" class="fas fa-info-circle float-right"></i> 
                        <div id="demo11" class="collapse icon-range">
                           Range:<span>10.0</span>-<span>25 K</span>
                        </div>
                     </div>
                  </div>
                  <div class="casino-odds-box back-border suspended market_12_row market_12_b_btn back-1"><span class="casino-odds-box-odd">0.00</span></div>
                  <div class="casino-odds-book market_12_b_exposure market_exposure" style="color: black;">0</div>
               </div>
            </div>
         </div>
      </div>
      <div class="remark text-right pr-2">
         <marquee scrollamount="3">
            <p class="mb-0">Hi.</p>
         </marquee>
      </div>
      <div class="last-result-tiele"><span>Last Result</span> <span class="float-right"><a href="casinoresults?game_type=race20" class="">View All</a></span></div>
      <div class="last-result-container text-right mt-1" id="last-result">
         
      </div>
      <!----> <!----> 
      <div>
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

</body>

<script type="text/javascript" src="../js/socket.io.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script src="../storage/front/js/flipclock.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src='footer-js.js?1'></script>

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
	var markettype = "RACE_20";
	var markettype_2 = markettype;
	var back_html = "";
	var lay_html = "";
	var gstatus = "";
	var last_result_id = '0';
	function websocket(type) {
    socket = io.connect(websocketurl);
    socket.on('connect', function() {
    	socket.emit('Room', 'race20');
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
				var desc = data.t1[0].cards || data.t1[0].desc;
				desc = desc.split(",");
				
				var total_card_value =0;
				var total_card_rank =0;
				var spade_card_show =0;
				var heart_card_show =0;
				var club_card_show =0;
				var diamond_card_show =0;
				
			
				
				for(var i in desc){
					card_details = desc[i];
					if(card_details != 1){
						card_value = getType(card_details);
						card_rank = card_value.rank;
						ctype = card_value.ctype;
						
						if(ctype == "spade"){
							spade_card_show++;
							spade_master_card_show = spade_card_show + 1;
							$("#card_"+ctype+"_"+spade_card_show).attr("src", site_url + "storage/front/img/cards_new/" + card_details+ ".png");
							$("#card_"+ctype+"_"+spade_card_show).show();
							$("#card_"+ctype+"_"+spade_master_card_show).attr("src", site_url + "storage/front/img/cards/KHH.png");
							$("#card_"+ctype+"_"+spade_master_card_show).show();
						}
						else if(ctype == "heart"){
							heart_card_show++;
							heart_master_card_show = heart_card_show + 1;
							$("#card_"+ctype+"_"+heart_card_show).attr("src", site_url + "storage/front/img/cards_new/" + card_details+ ".png");
							$("#card_"+ctype+"_"+heart_card_show).show();
							$("#card_"+ctype+"_"+heart_master_card_show).attr("src", site_url + "storage/front/img/cards/KDD.png");
							$("#card_"+ctype+"_"+heart_master_card_show).show();
						}
						else if(ctype == "club"){
							club_card_show++;
							club_master_card_show = club_card_show + 1;
							$("#card_"+ctype+"_"+club_card_show).attr("src", site_url + "storage/front/img/cards_new/" + card_details+ ".png");
							$("#card_"+ctype+"_"+club_card_show).show();
							$("#card_"+ctype+"_"+club_master_card_show).attr("src", site_url + "storage/front/img/cards/KCC.png");
							$("#card_"+ctype+"_"+club_master_card_show).show();
						}
						else if(ctype == "diamond"){
							diamond_card_show++;
							diamond_master_card_show = diamond_card_show + 1;
							$("#card_"+ctype+"_"+diamond_card_show).attr("src", site_url + "storage/front/img/cards_new/" + card_details+ ".png");
							$("#card_"+ctype+"_"+diamond_card_show).show();
							$("#card_"+ctype+"_"+diamond_master_card_show).attr("src", site_url + "storage/front/img/cards/KSS.png");
							$("#card_"+ctype+"_"+diamond_master_card_show).show();
						}
						
						
						
						
						total_card_rank += card_rank;
						total_card_value++;
					}
				}
				
				$("#total_card").text(total_card_value);
				$("#total_point").text(total_card_rank);
				
			}
			clock.setValue(data.t1[0].autotime);
			$(".round_no").text(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
			$("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
			eventId = data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid;
			
				for(var j in data['t2']){
				  	selectionid = parseInt(data['t2'][j].sid);
					runner = data['t2'][j].nat || data['t2'][j].nation;
					b1 = data['t2'][j].b1;
					bs1 = data['t2'][j].bs1;
					l1 = data['t2'][j].l1;
					ls1 = data['t2'][j].ls1;
				  	
				  	b11 = b1;
				  	markettype = "RACE_20";
					
						
					
					if(selectionid <= 6){
						
						if(selectionid == 5){
							bs1 = 100;
						}
						else if(selectionid == 6){
							bs1 = 90;
						}
						
						back_html = '<span class="casino-odds-box-odd market_'+selectionid+'_b_value">'+ b1 + '</span> <span>'+ bs1 +'</span>';
					}
					else{
						back_html = '<span class="casino-odds-box-odd market_'+selectionid+'_b_value">'+ b1 + '</span>';
					}
					
				 	$(".market_"+selectionid+"_b_btn").html(back_html);
					
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
					
					if(selectionid <= 6){
						
						if(selectionid == 5){
							ls1 = 100;
						}
						else if(selectionid == 6){
							ls1 = 105;
						}
						
						lay_html = '<span class="casino-odds-box-odd market_'+selectionid+'_l_value">'+ l1 + '</span> <span>'+ ls1 +'</span>';
					}
					else{
						lay_html =  '<span class="casino-odds-box-odd market_'+selectionid+'_l_value">'+ l1 + '</span>';
					}
					
					$(".market_" + selectionid + "_l_btn").attr("side", "Lay");
					$(".market_" + selectionid + "_l_btn").attr("selectionid", selectionid);
					$(".market_" + selectionid + "_l_btn").attr("marketid", selectionid);
					$(".market_" + selectionid + "_l_btn").attr("runner", runner);
					$(".market_" + selectionid + "_l_btn").attr("marketname", runner);
					$(".market_" + selectionid + "_l_btn").attr("eventid", eventId);
					$(".market_" + selectionid + "_l_btn").attr("markettype", markettype);
					$(".market_" + selectionid + "_l_btn").attr("event_name", markettype);
					$(".market_" + selectionid + "_l_btn").attr("fullmarketodds", l1);
					$(".market_" + selectionid + "_l_btn").attr("fullfancymarketrate", l1);
					$(".market_" + selectionid + "_l_btn").html(lay_html);
					
				 	gstatus =  data['t2'][j].gstatus.toString();
					if(gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED"){
						$(".market_"+selectionid+"_row").addClass("suspended");
						$(".market_"+selectionid+"_b_btn").removeClass("back-1");
						$(".market_"+selectionid+"_l_btn").removeClass("lay-1");
					}
					else{
				  		$(".market_"+selectionid+"_row").removeClass("suspended");
						$(".market_"+selectionid+"_b_btn").addClass("back-1");
						$(".market_"+selectionid+"_l_btn").addClass("lay-1");
					}
			}
        }
    });
    socket.on('gameResult', function(args){
    	if(args.data){
				updateResult(args.data);
			}else{
				updateResult(args['res']);
			}
    });
    socket.on('error', function(data){
    });
    socket.on('close', function(data){
    });
}

function getType(data){
	var data1 = data;
	if(data){
		data = data.split('DD');
		if(data.length > 1){
			var obj = {
				type	:	'[',
				color	:	'red',
				ctype	:	'diamond',
				card	:	data[0],
				rank 	:	data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0]) 
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
					ctype	:	'heart',
					card	:	data[0],
					rank 	:	data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0]) 
				}
				return obj;
			}
			else{
				data = data1;
				data = data.split('SS');
				if(data.length > 1){
					var obj = {
						type	:	']',
						color	:	'black',
						ctype	:	'spade',
						card	:	data[0],
						rank 	:	data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0]) 
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
							ctype	:	'club',
							card	:	data[0],
							rank 	:	data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0]) 
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
	$("#total_card").text(0);
	$("#total_point").text(0);
	$(".cl_cards").attr("../storage/front/img/cards_new/1.png");
	$(".cl_cards").hide();
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
		casino_type = "'race20'";
		data.forEach((runData) => {
			if(parseInt(runData.win) == 1){
				ab = "playersuit";
				ab1 = "<img src='../storage/front/img/cards/spade_race.png'>";
			
			}
			else if(parseInt(runData.win) == 2){
				ab = "playersuit";
				ab1 = "<img src='../storage/front/img/cards/heart_race.png'>";
			
			}
			else if(parseInt(runData.win) == 3){
				ab = "playersuit";
				ab1 = "<img src='../storage/front/img/cards/club_race.png'>";
			
			}
			else{
				ab = "playersuit";
				ab1 = "<img src='../storage/front/img/cards/diamond_race.png'>";
			}
			
			eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] : runData.mid;
			html += '<span onclick="view_casiono_result('+eventId+','+casino_type+')"  class="ball-runs ml-1 '+ ab +' last-result">'+ ab1 + '</span>';
		});
		
		
		$("#last-result").html(html);
		if(oldGameId == 0 || oldGameId == resultGameLast){		
			
		}
    }
}
function teenpatti(type) {
    gameType = type
    websocket();
}

teenpatti("ok");
	jQuery(document).on("click", ".back-1", function () {	
		console.log('heloo');	
		$("#popup_color").removeClass("back");			$("#popup_color").removeClass("lay");			$("#popup_color").addClass("back");
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
	});			jQuery(document).on("click", ".lay-1", function () {		$("#popup_color").removeClass("back");			$("#popup_color").removeClass("lay");			$("#popup_color").addClass("lay");
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
			$("#bet_stake_side").val("Lay");
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
	 
	 $(".placeBet").attr('disabled',false);
	 
	 $(".placeBet").removeAttr("id","placeBet");
	 
		var last_place_bet= "";
		bet_stake_side = $("#bet_stake_side").val();		bet_type = bet_stake_side;
		bet_event_id = $("#bet_event_id").val();
		bet_marketId = $("#bet_marketId").val();
		oddsmarketId = bet_marketId;
		eventType = 'RACE_20';
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
				 url: '../ajaxfiles/bet_place_race20.php',
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