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
$is_five_cricket = true;
?>
<!DOCTYPE html>
<html lang="en">

<?php
include("head_css2.php");
?>

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
                        
						<div class="col-md-10 featured-box white-bg">
   <div class="row row5 card32-container">
      <div class="col-md-9 coupon-card featured-box-detail">
         <div class="coupon-card">
            <div class="game-heading">
               <span class="card-header-title">
                  ENG VS RSA SUPER OVER
                  <small role="button" class="teenpatti-rules" onclick="view_rules('superover.jpg')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small> <!---->
               </span>
               <span class="float-right">
               Round ID:
               <span class="round_no">0</span>
               | Min: <span>100.00</span>
               | Max: <span>300000.00</span></span>
            </div>
            <div class="scorecard m-b-5" id="scoreboard-box">
              
            </div>
            <div class="video-container">
			<?php
  if(!empty(IFRAME_URL_SET)){
                               ?>
                               <iframe class="iframedesign" src="<?php echo IFRAME_URL."".SUPEROVER_CODE;?>" width="100%" height="200px" style="border: 0px;"></iframe>
                               <?php
                                
                            }else{
                                ?>
                                <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                <?php

                            }
                            ?>
               <!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL.SUPEROVER_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe>  -->
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
                  <div><img id="card_c1" style="display:none;" src="storage/front/img/cards/1.png"></div>
                  <div><img id="card_c2" style="display:none;" src="storage/front/img/cards/1.png"></div>
                  <div><img id="card_c3"  style="display:none;" src="storage/front/img/cards/1.png"></div>
                  <div><img id="card_c4"  style="display:none;" src="storage/front/img/cards/1.png"></div>
                  <div><img id="card_c5" style="display:none;" src="storage/front/img/cards/1.png"></div>
                  <div><img id="card_c6" style="display:none;" src="storage/front/img/cards/1.png"></div>
               </div>
            </div>
            <div class="markets">
               <div class="bookmaker-market">
                  <div class="market-title mt-1">
                     Bookmaker market
                     <a href="javascript:void(0)" class="m-r-5 game-rules-icon"><span><i class="fa fa-info-circle float-right"></i></span></a>
                  </div>
                  <div class="table-header">
                     <div class="float-left country-name box-4 text-info"></div>
                     <div class="box-1 float-left"></div>
                     <div class="box-1 float-left"></div>
                     <div class="back box-1 float-left text-center"><b>BACK</b></div>
                     <div class="lay box-1 float-left text-center"><b>LAY</b></div>
                     <div class="box-1 float-left"></div>
                     <div class="box-1 float-left"></div>
                  </div>
                  <div class="table-body">
                     <div  class="table-row suspended market_1_row">
                        <div class="float-left country-name box-4">
                           <span class="team-name"><b>ENG</b></span> 
                           <p><span class="float-left market_1_b_exposure market_exposure" style="color: black;">0</span> <span class="float-right" style="display: none; color: black;">0</span></p>
                        </div>
                        <div class="box-1 back2 float-left text-center">
                           <!---->
                        </div>
                        <div class="box-1 back1 float-left back-2 text-center">
                           <!---->
                        </div>
                        <div class="box-1 back float-left back lock text-center betting-disabled  market_1_b_btn back-1">
                           <!---->
                        </div>
                        <div class="box-1 lay float-left text-center betting-disabled  market_1_l_btn lay-1">
                           <!---->
                        </div>
                        <div class="box-1 lay1 float-left text-center">
                           <!---->
                        </div>
                        <div class="box-1 lay2 float-left text-center">
                           <!---->
                        </div>
                     </div>
                     <div  class="table-row suspended market_2_row">
                        <div class="float-left country-name box-4">
                           <span class="team-name"><b>RSA</b></span> 
                           <p><span class="float-left market_2_b_exposure market_exposure" style="color: black;">0</span> <span class="float-right" style="display: none; color: black;">0</span></p>
                        </div>
                        <div class="box-1 back2 float-left text-center">
                           <!---->
                        </div>
                        <div class="box-1 back1 float-left back-2 text-center">
                           <!---->
                        </div>
                        <div class="box-1 back float-left back lock text-center betting-disabled  market_2_b_btn back-1">
                           <!---->
                        </div>
                        <div class="box-1 lay float-left text-center betting-disabled  market_2_l_btn lay-1">
                           <!---->
                        </div>
                        <div class="box-1 lay1 float-left text-center">
                           <!---->
                        </div>
                        <div class="box-1 lay2 float-left text-center">
                           <!---->
                        </div>
                     </div>
                  </div>
               </div>
               <div class="fancy-market  row row5" >
                  <div class="col-6 fancyMarket" style="display:none;">
                     <div>
                        <div class="market-title mt-1">
                           Fancy Market
                           <a href="javascript:void(0)" class="m-r-5 game-rules-icon"><span><i class="fa fa-info-circle float-right"></i></span></a>
                        </div>
                        <div class="table-header">
                           <div class="float-left country-name box-6"></div>
                           <div class="box-1 float-left lay text-center"><b>No</b></div>
                           <div class="back box-1 float-left back text-center"><b>Yes</b></div>
                           <div class="box-2 float-left"></div>
                        </div>
                        <div class="table-body">
                           <div class="fancy-tripple fancyTripple">
                              
                           </div>
                        </div>
                        <div></div>
                     </div>
                  </div>
				  
				  <div class="col-6 fancyMarket1" style="display:none;">
                     <div>
                        <div class="market-title mt-1">
                           Fancy1 Market
                           <a href="javascript:void(0)" class="m-r-5 game-rules-icon"><span><i class="fa fa-info-circle float-right"></i></span></a>
                        </div>
                        <div class="table-header">
                           <div class="float-left country-name box-6"></div>
                           <div class="box-1 float-left lay text-center"><b>No</b></div>
                           <div class="back box-1 float-left back text-center"><b>Yes</b></div>
                           <div class="box-2 float-left"></div>
                        </div>
                        <div class="table-body">
                           <div class="fancy-tripple fancyTripple1">
                              
                           </div>
                        </div>
                        <div></div>
                     </div>
                  </div>
                  <!---->
				  
				 
               </div>
			   
			  
            </div>
            <div class="fancy-marker-title m-t-10">
               <h4>
                  Last Result
                  <a href="casinoresults?game_type=superover" class="result-view-all">View
                  All</a>
               </h4>
            </div>
            <div class="m-b-10">
               <p id="last-result" class="text-right">
                  
               </p>
            </div>
         </div>
      </div>
      <?php
			include("right_sidebar.php");
		?>

      <div>
         <!---->
      </div>
      <div>
         <!---->
      </div>
   </div>
   <!---->
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
 
	<script src="storage/front/js/flipclock.js" type="text/javascript"></script>
	<script type="text/javascript" src='footer-js.js'></script>

   <script type="text/javascript">
   
	
var GAME_ID = "";
//var SCOREBOARD_SOCKET_URL = "wss://sportsscore24.com";
var SCOREBOARD_URL = "wss://sportsscore24.com/";
var ssocket = null;
var socketScoreBoard;


function scoreboardConnect(){
     socketScoreBoard = io.connect(SCOREBOARD_URL, { transports: ['websocket'] });
	
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
      // console.log("disconnect");
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


	var site_url = '<?php echo WEB_URL; ?>' ;
	var websocketurl = '<?php echo GAME_IP; ?>';
	var clock = new FlipClock($(".clock"), {
                        clockFace: "Counter"
                    });
    var oldGameId = 0;
    var resultGameLast = 0;
    var data6;
	var markettype = "SUPER_OVER";
	var last_result_id = '0';
	
	function websocket(type) {
    socket = io.connect(websocketurl, {
        transports: ['websocket']
    });
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
						
						b1 = b1 == 0 ? "" : parseInt(b1);
						bs1 = bs1 == 0 ? "" : parseInt(bs1);
						
						l1 = l1 == 0 ? "" : parseInt(l1);
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
							fancy_data += '		<div class="float-left country-name box-6" style="border-bottom: 0px;">';
							fancy_data += '  		<p class="m-b-0"><a href="javascript:void(0)">'+runner+'</a></p>';
							fancy_data += '				<p class="m-b-0"><span style="color: black;" class="market_'+selectionid+'_b_exposure market_exposure">0</span></p>';
							fancy_data += '		</div>';
							
							fancy_data += '		<div class="box-1 lay float-left text-center betting-disabled market_'+selectionid+'_l_btn lay-1">'+lay_html+'</div>';
							
							fancy_data += '     <div class="box-1 back float-left text-center betting-disabled market_'+selectionid+'_b_btn back-1">'+back_html+'</div>';
							fancy_data += '		<div class="box-2 float-left text-right min-max" style="border-bottom: 0px;"></div>';
							fancy_data += '	</div>';
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
							fancy_data += '		<div class="float-left country-name box-6" style="border-bottom: 0px;">';
							fancy_data += '  		<p class="m-b-0"><a href="javascript:void(0)">'+runner+'</a></p>';
							fancy_data += '				<p class="m-b-0"><span style="color: black;" class="market_'+selectionid+'_b_exposure market_exposure">0</span></p>';
							fancy_data += '		</div>';
							
							fancy_data += '		<div class="box-1 lay float-left text-center betting-disabled market_'+selectionid+'_l_btn lay-1">'+lay_html+'</div>';
							
							fancy_data += '     <div class="box-1 back float-left text-center betting-disabled market_'+selectionid+'_b_btn back-1">'+back_html+'</div>';
							fancy_data += '		<div class="box-2 float-left text-right min-max" style="border-bottom: 0px;"></div>';
							fancy_data += '	</div>';
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
	$("#card_c1").attr("storage/front/img/cards/1.png");
	$("#card_c2").attr("storage/front/img/cards/1.png");
	$("#card_c3").attr("storage/front/img/cards/1.png");
	$("#card_c4").attr("storage/front/img/cards/1.png");
	$("#card_c5").attr("storage/front/img/cards/1.png");
	$("#card_c6").attr("storage/front/img/cards/1.png");
	
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
			html += '<span onclick="view_casiono_result('+eventId+','+casino_type+')"  class="ball-runs  '+ ab +' last-result">'+ ab1 + '</span>';
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
			
			eventId = $(this).attr("eventid");
			marketId = $(this).attr("marketid");
			
			if(marketId <= 2){
				fullfancymarketrate = fullmarketodds;
			}
			
			if(market_odd_name == "FANCY1_ODDS"){
				fullfancymarketrate = fullmarketodds;
			}
			
			event_name = $(this).attr("event_name");
			$(".select").removeClass("select");
			$(this).addClass("select");
			return_html = "";			
			nation_name = "";
			
			return_html += "<div class='bet-slip-data'><div><div class='table-responsive back'><form><table class='coupon-table table table-borderedless'><thead><tr><th></th><th style='width: 35%; text-align: left;'>(Bet for)</th><th style='width: 25%; text-align: left;'>Odds</th><th style='width: 15%; text-align: left;'>Stake</th><th style='width: 15%; text-align: right;'>Profit</th></tr></thead><tbody>";
			return_html +="<tr><td class='text-center'><a href='javascript:void(0);' class='text-danger close-bet-slip'><i class='fa fa-times'></i></a></td><td>"+runner+" "+nation_name+"</td><td class='bet-odds'><div class='form-group'> <input placeholder='0' value='"+fullmarketodds+"' id='odds_val' type='text' required='required' maxlength='4' readonly='readonly' class='amountint' style='width: 45px; vertical-align: middle;'><div class='spinner-buttons input-group-btn btn-group-vertical'> <button disabled='disabled' class='custom-btn-spinner btn btn-xs btn-default'><i class='fa fa-angle-up'></i></button> <button disabled='disabled' class='custom-btn-spinner btn btn-xs btn-default'><i class='fa fa-angle-down'></i></button></div></div></td><td class='bet-stakes'><div class='form-group bet-stake'><input type='hidden' id='bet_stake_side' value='Back'/><input type='hidden' id='bet_event_id' value='"+eventId+"'/><input type='hidden' id='bet_marketId' value='"+selectionid+"'/><input type='hidden' id='bet_event_name' value='"+event_name+"'/><input type='hidden' id='bet_market_name' value='"+marketname+"'/><input type='hidden' id='bet_markettype' value='"+markettype+"'/><input type='hidden' id='fullfancymarketrate' value='"+fullfancymarketrate+"'/> <input type='hidden' id='oddsmarketId' value='"+marketId+"'/><input type='hidden' id='market_runner_name' value='"+market_runner_name+"'/><input type='hidden' id='market_odd_name' value='"+market_odd_name+"'/> <input maxlength='10' name='inputStake' id='inputStake' required='required' type='text' ></div></td><td class='text-right bet-profit' id='profitLiability'>0</td></tr>";
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
			
			eventId = $(this).attr("eventid");
			marketId = $(this).attr("marketid");
			if(marketId <= 2){
				fullfancymarketrate = fullmarketodds;
			}
			
			if(market_odd_name == "FANCY1_ODDS"){
				fullfancymarketrate = fullmarketodds;
			}
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
		bet_stake_side = $("#bet_stake_side").val();
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
				 url: 'ajaxfiles/bet_place_super_over_v2.php',
				 dataType: 'json',
				 data: {eventId:bet_event_id,eventType:eventType,marketId:bet_marketId,stack:inputStake,type:type,odds:oddsNo,runs:runsNo,bet_market_type:bet_market_type,oddsmarketId:oddsmarketId,eventManualType:eventManualType,market_runner_name:market_runner_name,market_odd_name:market_odd_name,bet_event_name:bet_event_name,bet_type:bet_stake_side},
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
</div>


</body>

</html>