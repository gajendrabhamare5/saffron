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
				<div class="casino-title"><span class="casino-name">ENG VS RSA SUPER OVER</span></div>
                      <?php
						include("casino_header.php");
					?>
                    
					<div class="tab-content">
   <div id="bhav" class="tab-pane active">
     
      <div class="casino-video">
         <iframe src="<?php echo IFRAME_URL.SUPEROVER_CODE; ?>" width="100%" height="200px" style="border: 0px;"></iframe> 
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
         <div class="video-overlay">
            <div><img id="card_c1"   style="display:none;" src="../storage/front/img/cards/1.png"></div>
            <div><img id="card_c2" style="display:none;" src="../storage/front/img/cards/1.png"></div>
            <div><img id="card_c3"  style="display:none;" src="../storage/front/img/cards/1.png"></div>
            <div><img id="card_c4"  style="display:none;" src="../storage/front/img/cards/1.png"></div>
            <div><img id="card_c5"  style="display:none;" src="../storage/front/img/cards/1.png"></div>
            <div><img id="card_c6"  style="display:none;" src="../storage/front/img/cards/1.png"></div>
         </div>
      </div>
      <div id="scoreboard-box">
        
      </div>
      <div class="markets">
         <div class="bookmaker-market">
            <div class="market-title mt-1">
               Bookmaker Market
               <p class="float-right mb-0"><i class="fas fa-info-circle"></i></p>
            </div>
            <div>
               <div class="table-header">
                  <div class="float-left country-name box-6 min-max"><b>Min:100 Max:300000</b></div>
                  <div class="back box-1 float-left text-center"><b>BACK</b></div>
                  <div class="lay box-1 float-left text-center"><b>LAY</b></div>
               </div>
               <div class="table-body">
                  <div data-title="SUSPENDED" class="table-row suspended market_1_row">
                     <div class="float-left country-name box-4">
                        <span class="team-name"><b>ENG</b></span> 
                        <p><span class="float-left market_1_b_exposure market_exposure" style="color: black;">0</span></p>
                     </div>
                     <div class="box-1 back1 float-left back-1  text-center"></div>
                     <div class="box-1 back2 float-left back-2  text-center"></div>
                     <div class="box-1 back float-left back lock text-center market_1_b_btn back-1">
                        
                     </div>
                     <div class="box-1 lay float-left text-center market_1_l_btn lay-1">
                        
                     </div>
                     <div class="box-1 lay-2 float-left  text-center"></div>
                     <div class="box-1 lay-1 float-left  text-center"></div>
                  </div>
                  <div data-title="SUSPENDED" class="table-row suspended market_2_row">
                     <div class="float-left country-name box-4">
                        <span class="team-name"><b>RSA</b></span> 
                        <p><span class="float-left market_2_b_exposure market_exposure" style="color: black;">0</span></p>
                     </div>
                     <div class="box-1 back1 float-left back-1  text-center"></div>
                     <div class="box-1 back2 float-left back-2  text-center"></div>
                     <div class="box-1 back float-left back lock text-center market_2_b_btn back-1">
                        
                     </div>
                     <div class="box-1 lay float-left text-center market_2_l_btn back-1">
                        
                     </div>
                     <div class="box-1 lay-2 float-left  text-center"></div>
                     <div class="box-1 lay-1 float-left  text-center"></div>
                  </div>
               </div>
            </div>
            <div class="table-remark text-right remark">
            </div>
         </div>
         <div class="fancy-market fancyMarket" style="display:none;">
            <div class="table-header">
               <div class="market-title float-left country-name box-4">
                  <span>Fancy Market</span> 
                  <p class="float-right mb-0"><i class="fas fa-info-circle"></i></p>
               </div>
               <div class="box-1 float-left lay text-center"><b>No</b></div>
               <div class="back box-1 float-left back text-center"><b>Yes</b></div>
            </div>
            <div class="table-body">
               <div class="fancy-tripple fancyTripple">
                  
               </div>
               <div class="table-remark text-right remark">
               </div>
            </div>
         </div>
		 <div class="fancy-market fancyMarket1" style="display:none;">
            <div class="table-header">
               <div class="market-title float-left country-name box-4">
                  <span>Fancy1 Market</span> 
                  <p class="float-right mb-0"><i class="fas fa-info-circle"></i></p>
               </div>
               <div class="box-1 float-left lay text-center"><b>No</b></div>
               <div class="back box-1 float-left back text-center"><b>Yes</b></div>
            </div>
            <div class="table-body">
               <div class="fancy-tripple fancyTripple1">
                  
               </div>
               <div class="table-remark text-right remark">
               </div>
            </div>
         </div>
		 
		 
      </div>
      <div class="last-result-tiele"><span>Last Result</span> <span class="float-right"><a href="casinoresults?game_type=superover" class="">View All</a></span></div>
      <div class="last-result-container text-right mt-1" id="last-result">
	  
	  </div>
      
	  
	  
	  <div class="card m-b-10">
         <div class="market-title mt-1">Rules</div>
         <div class="row row5 cc-rules">
            <div class="col-6">
               <div class="card">
                  <div class="card-header">
                     <h5 class="card-title">AUS</h5>
                     <div class="row row5 mt-1">
                        <div class="col-7">Cards</div>
                        <div class="col-5 text-right">Value</div>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="row row5 mt-1">
                        <div class="col-7"><img src="../storage/front/img/cricketv/A.jpg"> <span class="ml-2">X</span> <span class="ml-2">10</span></div>
                        <div class="col-5 text-right value">1 Run</div>
                     </div>
                     <div class="row row5 mt-1">
                        <div class="col-7"><img src="../storage/front/img/cricketv/2.jpg"> <span class="ml-2">X</span> <span class="ml-2">10</span></div>
                        <div class="col-5 text-right value">2 Run</div>
                     </div>
                     <div class="row row5 mt-1">
                        <div class="col-7"><img src="../storage/front/img/cricketv/3.jpg"> <span class="ml-2">X</span> <span class="ml-2">10</span></div>
                        <div class="col-5 text-right value">3 Run</div>
                     </div>
                     <div class="row row5 mt-1">
                        <div class="col-7"><img src="../storage/front/img/cricketv/4.jpg"> <span class="ml-2">X</span> <span class="ml-2">10</span></div>
                        <div class="col-5 text-right value">4 Run</div>
                     </div>
                     
                     <div class="row row5 mt-1">
                        <div class="col-7"><img src="../storage/front/img/cricketv/6.jpg"> <span class="ml-2">X</span> <span class="ml-2">10</span></div>
                        <div class="col-5 text-right value">6 Run</div>
                     </div>
                     
                     <div class="row row5 mt-1">
                        <div class="col-7"><img src="../storage/front/img/cricketv/10.jpg"> <span class="ml-2">X</span> <span class="ml-2">10</span></div>
                        <div class="col-5 text-right value">0 Run</div>
                     </div>
                     
                     <div class="row row5 mt-1">
                        <div class="col-7"><img src="../storage/front/img/cricketv/K.jpg"> <span class="ml-2">X</span> <span class="ml-2">10</span></div>
                        <div class="col-5 text-right value">Wicket</div>
                     </div>
                     
                  </div>
                  <div class="card-footer"></div>
               </div>
            </div>
            <div class="col-6">
               <div class="card">
                  <div class="card-header">
                     <h5 class="card-title">IND</h5>
                     <div class="row row5 mt-1">
                        <div class="col-7">Cards</div>
                        <div class="col-5 text-right">Value</div>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="row row5 mt-1">
                        <div class="col-7"><img src="../storage/front/img/cricketv/A.jpg"> <span class="ml-2">X</span> <span class="ml-2">10</span></div>
                        <div class="col-5 text-right value">1 Run</div>
                     </div>
                     <div class="row row5 mt-1">
                        <div class="col-7"><img src="../storage/front/img/cricketv/2.jpg"> <span class="ml-2">X</span> <span class="ml-2">10</span></div>
                        <div class="col-5 text-right value">2 Run</div>
                     </div>
                     <div class="row row5 mt-1">
                        <div class="col-7"><img src="../storage/front/img/cricketv/3.jpg"> <span class="ml-2">X</span> <span class="ml-2">10</span></div>
                        <div class="col-5 text-right value">3 Run</div>
                     </div>
                     <div class="row row5 mt-1">
                        <div class="col-7"><img src="../storage/front/img/cricketv/4.jpg"> <span class="ml-2">X</span> <span class="ml-2">10</span></div>
                        <div class="col-5 text-right value">4 Run</div>
                     </div>
                     
                     <div class="row row5 mt-1">
                        <div class="col-7"><img src="../storage/front/img/cricketv/6.jpg"> <span class="ml-2">X</span> <span class="ml-2">10</span></div>
                        <div class="col-5 text-right value">6 Run</div>
                     </div>
                     
                     <div class="row row5 mt-1">
                        <div class="col-7"><img src="../storage/front/img/cricketv/10.jpg"> <span class="ml-2">X</span> <span class="ml-2">10</span></div>
                        <div class="col-5 text-right value">0 Run</div>
                     </div>
                     
                     <div class="row row5 mt-1">
                        <div class="col-7"><img src="../storage/front/img/cricketv/K.jpg"> <span class="ml-2">X</span> <span class="ml-2">10</span></div>
                        <div class="col-5 text-right value">Wicket</div>
                     </div>
                     
                  </div>
                  <div class="card-footer"></div>
               </div>
            </div>
         </div>
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
   
	
var GAME_ID = "";
//var SCOREBOARD_SOCKET_URL = "wss://sportsscore24.com";
var SCOREBOARD_URL = "wss://sportsscore24.com/";
var ssocket = null;
var socketScoreBoard;


function scoreboardConnect(){
     socketScoreBoard = io.connect(SCOREBOARD_URL);
	
    socketScoreBoard.on("connect", function() {

      socketScoreBoard.emit("subscribe", {
        type: 1,
        rooms: [parseInt(GAME_ID)]
      });
    });
    socketScoreBoard.on("error", function(abc) {
    
    });
    socketScoreBoard.on("update", function(response) {
    
      if (
        response.data != undefined &&
        response.data != null &&
        response.data.isfinished == 1
      ) {
        socketScoreBoard.emit("unsubscribe", {type: 1, rooms: [] });
        // $("#scoreboard-box").html("");
      } else {
        if (response.data != undefined && response.data != null) {
          //self.scoreboardData = response.data;
          updateScoreBoard(response.data);    
        } else {
          $("#scoreboard-box").html("");
        }
      }
    });
    socketScoreBoard.on("disconnect", function() {
     
    });
}

function updateScoreBoard(data){
	
    if(data.isfinished == "1"){
        $("#scoreboard-box").hide();
        return;
    }else{
        $("#scoreboard-box").show();
    }

    var scoreboardStr="";
    scoreboardStr += "<div class=\"scorecard scorecard-mobile\"><div data-v-68a8f00a='' class='score-inner'>";
    scoreboardStr += "    <div class=\"row\">";
    scoreboardStr += "        <span class=\"team-name col-2\">"+data.spnnation1+"<\/span>";
    scoreboardStr += "        <span class=\"score col-6\">"+data.score1+"<\/span>";
    scoreboardStr += "<span class=\"col-2 run-rate\">";
    if(data.spnrunrate1 != null && data.spnrunrate1 != ""){
        scoreboardStr += "CRR "+data.spnrunrate1;
    }
    scoreboardStr += "<\/span>";
    scoreboardStr += "<span class=\"col-2 run-rate\">";
    if(data.spnreqrate1 != null && data.spnreqrate1 != ""){
        scoreboardStr += " RR "+data.spnreqrate1;    
    }
    scoreboardStr += "<\/span>";
    scoreboardStr += "    <\/div>";
    scoreboardStr += "    <div class=\"row m-t-10\">";
    scoreboardStr += "        <span class=\"team-name col-2\">"+data.spnnation2+"<\/span>";
    scoreboardStr += "        <span class=\"score col-6\">"+data.score2+"<\/span>";
    scoreboardStr += "        <span class=\"col-2 run-rate\">";
    if(data.spnrunrate2 != null && data.spnrunrate2 != ""){
        scoreboardStr += "CRR "+data.spnrunrate2;
    }
    scoreboardStr += "<\/span>";
    scoreboardStr += "        <span class=\"col-2 run-rate\">";
    if(data.spnreqrate2 != null && data.spnreqrate2 != ""){
        scoreboardStr += " RR "+data.spnreqrate2;    
    }
    scoreboardStr += "<\/span>";
    scoreboardStr += "    <\/div>";
    scoreboardStr += "    <div class=\"row\">";
    scoreboardStr += "        <div class=\"col-6 m-t-10\">";
    if(data.spnballrunningstatus != ""){
        scoreboardStr += "<p>";
        if(data.dayno != ""){
            scoreboardStr += "<span>Day "+data.dayno+"<\/span> | ";
        }
        scoreboardStr += data.spnballrunningstatus+"<\/p>";
    }else if(data.spnmessage != ""){
        scoreboardStr += "<p>";
        if(data.dayno != ""){
            scoreboardStr += "<span>Day "+data.dayno+"<\/span> | ";
        }
        scoreboardStr += data.spnmessage+"<\/p>";
    }
    
    scoreboardStr += "        <\/div>";
    scoreboardStr += "        <div class=\"col-6 ball-runs-container m-t-5\">";
    scoreboardStr += "            <p class=\"text-right ball-by-ball\">";
    $.each(data.balls, function(key, ballVal) {
        if(ballVal != ""){
            var b_class = "";
            if(ballVal == '4'){
                b_class = "four";
            }else if(ballVal == '6'){
                b_class = "six";
            }else if(ballVal == 'ww'){
                b_class = "wicket";
            }
            scoreboardStr += "<span class=\"ball-runs "+b_class+"\">"+ballVal+"<\/span> ";    
        }
    });
    scoreboardStr += "            <\/p>";
    scoreboardStr += "        <\/div>";
    scoreboardStr += "    <\/div>";
    scoreboardStr += "<\/div><\/div>";
    $("#scoreboard-box").html(scoreboardStr);
    return;
}

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
	var markettype = "SUPER_OVER";
	var markettype_2 = markettype;
	var back_html = "";
	var lay_html = "";
	var gstatus = "";
	var last_result_id = '0';
	function websocket(type) {
    socket = io.connect(websocketurl);
    socket.on('connect', function() {
    	socket.emit('Room', 'superover');
    });
    socket.on('game', function(data) {	
			
			
		  if (data && data['t1'] && data['t1'][0]) {
		  	if(oldGameId != data.t1[0].mid && data.t1[0].mid != 0 && data.t1[0].mid != "0"){
		  		setTimeout(function(){
						clearCards();
					},<?php echo CASINO_RESULT_TIMEOUT; ?>);
		  	}
			if(oldGameId != data.t1[0].mid){
			  GAME_ID =  data.t1[0].mid.split('.');
			  GAME_ID = GAME_ID[1];
			  scoreboardConnect();
		  }
			
		  	oldGameId = data.t1[0].mid;
        		if(data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast){
				$(".casino-remark").text(data.t1[0].remark);
				var desc = data.t1[0].desc;
					
					if(data.t1[0].C1 != 1){
						$("#card_c1").attr("src", site_url + "storage/front/img/cards/superover/" + data.t1[0].C1 + ".png");
						$("#card_c1").show();
					}
					if(data.t1[0].C2 != 1){
						$("#card_c2").attr("src", site_url + "storage/front/img/cards/superover/" + data.t1[0].C2 + ".png");
						$("#card_c2").show();
					}
					if(data.t1[0].C3 != 1){
						$("#card_c3").attr("src", site_url + "storage/front/img/cards/superover/" + data.t1[0].C3 + ".png");
						$("#card_c3").show();
					}
					if(data.t1[0].C4 != 1){
						$("#card_c4").attr("src", site_url + "storage/front/img/cards/superover/" + data.t1[0].C4 + ".png");
						$("#card_c4").show();
					}
					if(data.t1[0].C5 != 1){
						$("#card_c5").attr("src", site_url + "storage/front/img/cards/superover/" + data.t1[0].C5 + ".png");
						$("#card_c5").show();
					}
					if(data.t1[0].C6 != 1){
						$("#card_c6").attr("src", site_url + "storage/front/img/cards/superover/" + data.t1[0].C6 + ".png");
						$("#card_c6").show();
					}
					
				
			}
			clock.setValue(data.t1[0].autotime);
			$(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
			$("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
			eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1];
			
				for(var j in data['t2']){
				  	selectionid = parseInt(data['t2'][j].sid);
					runner = data['t2'][j].nat || data['t2'][j].nation;
					b1 = data['t2'][j].b1;
					bs1 = data['t2'][j].bs1;
					l1 = data['t2'][j].l1;
					ls1 = data['t2'][j].ls1;
				  	
				  	b11 = b1;
				  	markettype = "SUPER_OVER";
					
					b1 = b1 == 0 ? "" : b1;
					bs1 = bs1 == 0 ? "" : bs1;
					
					l1 = l1 == 0 ? "" : l1;
					ls1 = ls1 == 0 ? "" : ls1;
					
					
						back_html = '<span class="odd d-block">'+b1+'</span><span class="d-block">'+bs1+'</span>';
					
					
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
					
					
						lay_html = '<span class="odd d-block">'+l1+'</span><span class="d-block">'+ls1+'</span>';
					
					
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
					
				 	gstatus =  data['t2'][j].status.toString();
					if(gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED"){
						$(".market_"+selectionid+"_row").attr("data-title",'suspended');
						$(".market_"+selectionid+"_row").addClass("suspended");
						
						$(".market_"+selectionid+"_b_btn").removeClass("back-1");
						$(".market_"+selectionid+"_b_btn").addClass("betting-disabled");
						$(".market_"+selectionid+"_l_btn").removeClass("lay-1");
						$(".market_"+selectionid+"_l_btn").addClass("betting-disabled");
					}
					else{
						
				  		$(".market_"+selectionid+"_row").removeAttr("data-title");
				  		$(".market_"+selectionid+"_row").removeClass("suspended");
						$(".market_"+selectionid+"_b_btn").addClass("back-1");
						$(".market_"+selectionid+"_b_btn").removeClass("betting-disabled");
						$(".market_"+selectionid+"_l_btn").addClass("lay-1");
						$(".market_"+selectionid+"_l_btn").removeClass("betting-disabled");
					}
			}
        
				if(data['t3'] != null){
					var fancy_data = '';
					for(var f in data['t3']){
						selectionid = parseInt(data['t3'][f].sid);
						runner = data['t3'][f].nat;
						b1 = data['t3'][f].b1;
						bs1 = data['t3'][f].bs1;
						l1 = data['t3'][f].l1;
						ls1 = data['t3'][f].ls1;
						
						b1 = b1 == 0 ? "" : parseFloat(b1);
						bs1 = bs1 == 0 ? "" : parseInt(bs1);
						
						l1 = l1 == 0 ? "" : parseFloat(l1);
						ls1 = ls1 == 0 ? "" : parseInt(ls1);
						
						
						is_suspended = '';
						gstatus =  data['t3'][f].status.toString();
						if(gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED"){
							is_suspended = 'suspended';
						}
						
						
						
						back_html ='<span class="odd d-block">'+b1+'</span><span>'+bs1+'</span>';
						lay_html ='<span class="odd d-block">'+l1+'</span><span>'+ls1+'</span>';
						
						if($("#five_fancy_"+selectionid) && $("#five_fancy_"+selectionid).length > 0){
							
							
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
								$(".market_"+selectionid+"_b_btn").attr("fullfancymarketrate",bs1);
								
								$(".market_" + selectionid + "_l_btn").attr("side", "Lay");
								$(".market_" + selectionid + "_l_btn").attr("selectionid", selectionid);
								$(".market_" + selectionid + "_l_btn").attr("marketid", selectionid);
								$(".market_" + selectionid + "_l_btn").attr("runner", runner);
								$(".market_" + selectionid + "_l_btn").attr("marketname", runner);
								$(".market_" + selectionid + "_l_btn").attr("eventid", eventId);
								$(".market_" + selectionid + "_l_btn").attr("markettype", markettype);
								$(".market_" + selectionid + "_l_btn").attr("event_name", markettype);
								$(".market_" + selectionid + "_l_btn").attr("fullmarketodds", l1);
								$(".market_" + selectionid + "_l_btn").attr("fullfancymarketrate", ls1);
								$(".market_" + selectionid + "_l_btn").html(lay_html);
								
								if(gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED"){
									$(".market_"+selectionid+"_row").attr("data-title",'suspended');
									$(".market_"+selectionid+"_row").addClass("suspended");
									
									$(".market_"+selectionid+"_b_btn").removeClass("back-1");
									$(".market_"+selectionid+"_b_btn").addClass("betting-disabled");
									$(".market_"+selectionid+"_l_btn").removeClass("lay-1");
									$(".market_"+selectionid+"_l_btn").addClass("betting-disabled");
								}
								else{
									
									$(".market_"+selectionid+"_row").removeAttr("data-title");
									$(".market_"+selectionid+"_row").removeClass("suspended");
									$(".market_"+selectionid+"_b_btn").addClass("back-1");
									$(".market_"+selectionid+"_b_btn").removeClass("betting-disabled");
									$(".market_"+selectionid+"_l_btn").addClass("lay-1");
									$(".market_"+selectionid+"_l_btn").removeClass("betting-disabled");
								}
						}
						else{
							fancy_data += '	<div id="five_fancy_'+selectionid+'" data-title="'+is_suspended+'" class="table-row '+is_suspended+' market_'+selectionid+'_row">';
							fancy_data += '		 <div class="float-left country-name box-4">';
							fancy_data += '			<span><b>'+runner+'</b></span> ';
							fancy_data += '			<p><span class="float-left market_'+selectionid+'_b_exposure market_exposure" style="color: black;">0</span></p>';
							fancy_data += '		 </div>';
							fancy_data += ' <div class="box-1 lay float-left text-center market_'+selectionid+'_l_btn lay-1">'+lay_html+'</div>';
							fancy_data += ' <div class="box-1 back float-left text-center market_'+selectionid+'_b_btn back-1"">'+back_html+'</div>';
							fancy_data += '</div>';
							
						}
						
						
						
						
						$(".fancyMarket").show();
					}
					
					if(fancy_data != ""){
						$(".fancyTripple").html(fancy_data);
					}
				}
				else{
					$(".fancyTripple").html("");
					$(".fancyMarket").hide();
				}
				
				if(data['t4'] != null){
					var fancy_data = '';
					for(var f in data['t4']){
						selectionid = parseInt(data['t4'][f].sid);
						runner = data['t4'][f].nat;
						b1 = data['t4'][f].b1;
						bs1 = data['t4'][f].bs1;
						l1 = data['t4'][f].l1;
						ls1 = data['t4'][f].ls1;
						
						b1 = b1 == 0 ? "" : parseFloat(b1);
						bs1 = bs1 == 0 ? "" : parseInt(bs1);
						
						l1 = l1 == 0 ? "" : parseFloat(l1);
						ls1 = ls1 == 0 ? "" : parseInt(ls1);
						
						
						is_suspended = '';
						gstatus =  data['t4'][f].status.toString();
						if(gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED"){
							is_suspended = 'suspended';
						}
						
						
						
						back_html ='<span class="odd d-block">'+b1+'</span><span>'+bs1+'</span>';
						lay_html ='<span class="odd d-block">'+l1+'</span><span>'+ls1+'</span>';
						if(selectionid == 7 || selectionid == 9){
							if(gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED"){
								continue;
							}
						}
						if($("#five_fancy_"+selectionid) && $("#five_fancy_"+selectionid).length > 0){
							
							
								$(".market_"+selectionid+"_b_btn").html(back_html);					
								$(".market_"+selectionid+"_b_btn").attr("side","Back");
								$(".market_"+selectionid+"_b_btn").attr("selectionid",selectionid);
								$(".market_"+selectionid+"_b_btn").attr("marketid",selectionid);
								$(".market_"+selectionid+"_b_btn").attr("runner",runner);
								$(".market_"+selectionid+"_b_btn").attr("marketname",runner);
								$(".market_"+selectionid+"_b_btn").attr("eventid",eventId);
								$(".market_"+selectionid+"_b_btn").attr("markettype",'FANCY1_ODDS');
								$(".market_"+selectionid+"_b_btn").attr("event_name",markettype);
								$(".market_"+selectionid+"_b_btn").attr("fullmarketodds",b1);
								$(".market_"+selectionid+"_b_btn").attr("fullfancymarketrate",bs1);
								
								$(".market_" + selectionid + "_l_btn").attr("side", "Lay");
								$(".market_" + selectionid + "_l_btn").attr("selectionid", selectionid);
								$(".market_" + selectionid + "_l_btn").attr("marketid", selectionid);
								$(".market_" + selectionid + "_l_btn").attr("runner", runner);
								$(".market_" + selectionid + "_l_btn").attr("marketname", runner);
								$(".market_" + selectionid + "_l_btn").attr("eventid", eventId);
								$(".market_" + selectionid + "_l_btn").attr("markettype", 'FANCY1_ODDS');
								$(".market_" + selectionid + "_l_btn").attr("event_name", markettype);
								$(".market_" + selectionid + "_l_btn").attr("fullmarketodds", l1);
								$(".market_" + selectionid + "_l_btn").attr("fullfancymarketrate", ls1);
								$(".market_" + selectionid + "_l_btn").html(lay_html);
								
								if(gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED"){
									$(".market_"+selectionid+"_row").attr("data-title",'suspended');
									$(".market_"+selectionid+"_row").addClass("suspended");
									
									$(".market_"+selectionid+"_b_btn").removeClass("back-1");
									$(".market_"+selectionid+"_b_btn").addClass("betting-disabled");
									$(".market_"+selectionid+"_l_btn").removeClass("lay-1");
									$(".market_"+selectionid+"_l_btn").addClass("betting-disabled");
								}
								else{
									
									$(".market_"+selectionid+"_row").removeAttr("data-title");
									$(".market_"+selectionid+"_row").removeClass("suspended");
									$(".market_"+selectionid+"_b_btn").addClass("back-1");
									$(".market_"+selectionid+"_b_btn").removeClass("betting-disabled");
									$(".market_"+selectionid+"_l_btn").addClass("lay-1");
									$(".market_"+selectionid+"_l_btn").removeClass("betting-disabled");
								}
						}
						else{
							fancy_data += '	<div id="five_fancy_'+selectionid+'" data-title="'+is_suspended+'" class="table-row '+is_suspended+' market_'+selectionid+'_row">';
							fancy_data += '		 <div class="float-left country-name box-4">';
							fancy_data += '			<span><b>'+runner+'</b></span> ';
							fancy_data += '			<p><span class="float-left market_'+selectionid+'_b_exposure market_exposure" style="color: black;">0</span></p>';
							fancy_data += '		 </div>';
							fancy_data += ' <div class="box-1 lay float-left text-center market_'+selectionid+'_l_btn lay-1">'+lay_html+'</div>';
							fancy_data += ' <div class="box-1 back float-left text-center market_'+selectionid+'_b_btn back-1"">'+back_html+'</div>';
							fancy_data += '</div>';
							
						}
						
						
						
						
						$(".fancyMarket1").show();
					}
					
					if(fancy_data != ""){
						$(".fancyTripple1").html(fancy_data);
					}
				}
				else{
					$(".fancyTripple1").html("");
					$(".fancyMarket1").hide();
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
				ctype	:	'diamond',
				card	:	data[0],
				rank 	:	data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0]) 
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
					ctype	:	'heart',
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
	$("#card_c1").attr("../storage/front/img/cards/1.png");
	$("#card_c2").attr("../storage/front/img/cards/1.png");
	$("#card_c3").attr("../storage/front/img/cards/1.png");
	$("#card_c4").attr("../storage/front/img/cards/1.png");
	$("#card_c5").attr("../storage/front/img/cards/1.png");
	$("#card_c6").attr("../storage/front/img/cards/1.png");
	
	
	$("#card_c1").hide();
	$("#card_c2").hide();
	$("#card_c3").hide();
	$("#card_c4").hide();
	$("#card_c5").hide();
	$("#card_c6").hide();
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
		casino_type = "'superover'";
		data.forEach((runData) => {
			if(parseInt(runData.result) == 1){
				ab = "playera";
				ab1 = "E";
			
			}
			else if(parseInt(runData.result) == 2){
				ab = "playerb";
				ab1 = "R";
			
			}
			else{
				ab = "playertie";
				ab1 = "T";
			}
			
			eventId = runData.mid == 0 ? 0 : runData.mid.split(".")[1];
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
			
			
			
			eventId = $(this).attr("eventid");
			marketId = $(this).attr("marketid");
			event_name = $(this).attr("event_name");
			$(".select").removeClass("select");
			$(this).addClass("select");
			return_html = "";
			
			if(marketId <= 2){
				fullfancymarketrate = fullmarketodds;
			}
			
			if(market_odd_name == "FANCY1_ODDS"){
				fullfancymarketrate = fullmarketodds;
			}
			
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
	
	jQuery(document).on("click", ".lay-1", function () {		

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
			
			

			eventId = $(this).attr("eventid");
			marketId = $(this).attr("marketid");
			event_name = $(this).attr("event_name");
			$(".select").removeClass("select");
			$(this).addClass("select");
			return_html = "";
			
			if(marketId <= 2){
				fullfancymarketrate = fullmarketodds;
			}
			
			if(market_odd_name == "FANCY1_ODDS"){
				fullfancymarketrate = fullmarketodds;
			}
			
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
	 
	 $(".placeBet").attr('disabled',false);
	 
	 $(".placeBet").removeAttr("id","placeBet");
	 
		var last_place_bet= "";
		bet_stake_side = $("#bet_stake_side").val();		bet_type = bet_stake_side;
		bet_event_id = $("#bet_event_id").val();
		bet_marketId = $("#bet_marketId").val();
		oddsmarketId = bet_marketId;
		eventType = 'SUPER_OVER';
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
			
			
			if(bet_marketId > 2){
				oddsNo = parseFloat($("#fullfancymarketrate").val());
			}
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
				 url: '../ajaxfiles/bet_place_super_over_v2.php',
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
							toastr.clear()
					toastr.success("", message, {
						"timeOut": "3000",
						"iconClass":"toast-success",
						"positionClass":"toast-top-center",
						"extendedTImeout": "0"
					});
					/*$("#bet-error-class").addClass("b-toast-success");*/
						}else{
							toastr.clear()
					toastr.warning("", message, {
						"timeOut": "3000",
						"iconClass":"toast-warning",
						"positionClass":"toast-top-center",
						"extendedTImeout": "0"
					});
					/*$("#bet-error-class").addClass("b-toast-danger");*/
						}
						/*error_message_text = message;
					$("#errorMsgText").text(error_message_text);
					$("#errorMsg").fadeIn('fast').delay(3000).hide(0);*/
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