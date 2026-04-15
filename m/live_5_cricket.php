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

    .video-overlay img{
      margin-bottom: 3px;
    }

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

    .position-relative {
    position: relative !important;
}

.detail-page-container {
    display: flex
;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: flex-start;
    align-content: flex-start;
}



.game-market {
    background: #f7f7f7;
    color: #333;
    margin-top: 8px;
}

.market-2 {
    min-width: calc(33.33% - 8px);
    max-width: calc(100% - 8px);
    margin-left: 4px;
    margin-right: 4px;
    flex: 1;
    width: calc(50% - 8px);
}

    .market-1, .market-2, .market-2.width30, .market-3, .market-4, .market-4.width70, .market-5, .market-6, .market-9, .market-10, .market-11, .market-12, .market-13 {
        min-width: 100%;
        margin: 0;
    }

 .market-2 {
    /*min-width: calc(50% - 8px);*/
}

.market-title {
    background-color: var(--theme1-bg);
    color: #ffffff;
    padding: 5px 10px;
    font-size: 15px;
    font-weight: bold;
    /* display: flex ;*/
    flex-wrap: wrap;
    justify-content: space-between;
}

.market-title {
        font-size: 13px;
        padding: 3px 6px;
    }

    .market-title span {
    display: inline-block;
    max-width: calc(100% - 30px);
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.market-header {
    display: flex
;
    flex-wrap: wrap;
    align-items: center;
    padding: 0;
}

.market-header, .market-row {
    border-bottom: 0.01em solid #c7c8ca;
}

.market-nation-detail {
    width: calc(100% - 480px);
    display: flex
;
    flex-wrap: wrap;
    justify-content: space-between;
    padding: 0 5px;
    font-size: 14px;
}

    .market-nation-detail {
        font-size: 13px;
    }

    .market-nation-detail {
        width: calc(100% - 210px);
    }

    .market-2 .market-nation-detail {
    width: calc(100% - 160px);
}

.market-2 .market-nation-detail {
        width: calc(100% - 40%);
    }

    .market-nation-detail .market-nation-name {
    font-weight: 400;
    max-width: 100%;
    width: 100%;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    display: inline-block;
}

.market-header .market-nation-detail .market-nation-name {
    font-size: 12px;
    color: #097c93;
    font-weight: bold;
}

.back {
    background-color: #72bbef !important;
}

.market-odd-box {
    width: 80px;
    padding: 2px 0;
    display: flex
;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    border-left: 1px solid #c7c8ca;
    cursor: pointer;
    min-height: 44px;
}

.market-odd-box {
        width: 20%;
        padding: 2px 0;
    }

    .market-header .market-odd-box {
    min-height: 28px;
}

.market-header .market-odd-box b {
    font-size: 16px;
}

.lay {
    background-color: #faa9ba !important;
}

.market-row {
    background-color: #f2f2f2;
    display: flex
;
    flex-wrap: wrap;
}

.market-nation-book {
    display: flex
;
    flex-wrap: wrap;
    width: 100%;
    justify-content: space-between;
}

.market-odd-box .market-odd {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 3px;
    line-height: 1;
}

    .market-odd-box .market-odd {
        font-size: 15px;
    }

    .market-odd-box .market-volume {
    font-size: 12px;
    font-weight: 400;
    line-height: 1;
}

    .market-odd-box .market-volume {
        font-size: 11px;
    }

    .market-6 {
    min-width: calc(100% - 8px);
    max-width: calc(100% - 8px);
    /*margin-left: 4px;*/
    margin-right: 4px;
    flex: 1;
}

 .market-6 {
    min-width: calc(33.33% - 8px);
}

.market-6 {
        min-width: 100%;
    }

.fancy-min-max-box {
    width: 80px;
    padding: 0 5px;
    text-align: right;
}

    .fancy-min-max-box {
        width: 20%;
        padding: 0 2px;
        display: none;
    }

    .fancy-market {
    border-bottom: 1px solid #c7c8ca;
}

.market-6 .market-nation-detail {
    width: calc(100% - 240px);
}

    .market-6 .market-nation-detail {
        width: calc(100% - 40%);
    }

    .market-6 .market-nation-detail .market-nation-name {
    white-space: normal;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    max-width: calc(100% - 50px);
}

.market-6 .market-nation-detail .market-nation-name {
        max-width: calc(100% - 30px);
    }

    .market-nation-book {
    display: flex
;
    flex-wrap: wrap;
    width: 100%;
    justify-content: space-between;
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

.casino-last-results {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-end;
        margin-top: 10px;
        width: 100%;
    }

    .casino-last-results .result {
        background: #355e3b;
        color: #fff;
        height: 25px;
        width: 25px;
        border-radius: 50%;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        font-weight: bold;
        margin-left: 5px;
        cursor: pointer;
    }

    .casino-last-results .result.result-b {
        color: #ffff33;
    }

    .casino-last-results .result.result-c {
        color: #33c6ff;
    }

    .casino-last-results .result.result-a {
        color: #ff4500;
    }

  
.bookmaker-market .suspended:after,
    .fancyMarket .suspended:after,
    .fancyTieMarket .suspended:after,
    .fancyMarket1 .suspended:after,
    .fancyMarket .suspended:after,
    .fancyTripple .suspended:after,
    .fancyTripple1 .suspended:after {
        width: 40% !important;
    }

    
.bookmaker-market .suspended:before, .bookmaker-tied-market .suspended:before, .fancy-market .suspended:before, .fancyMarket1 .suspended:before, .fancyMarket .suspended:before, .fancyTripple .suspended:before, .fancyTripple1 .suspended:before {
		background-image: unset !important;
	}
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
                <div class="casino-title"><span class="casino-name">five five cricket</span><span class="d-block"><a href="#" onclick="view_rules('5_cricket')" data-target="#rules_popup" data-toggle="modal" id="rules_popup_btn" class="ml-1" role="button">Rules</a></span></div>
                <?php
        include("casino_header.php");
    ?>
					<div class="tab-content">
   <div id="bhav" class="tab-pane active">
      <div id="scoreboard-box">

		</div>


      <div class="casino-video">



	  <?php 
                            if(!empty(IFRAME_URL_SET)){
                               ?>
                               <iframe src="<?php echo IFRAME_URL."".CRICKET5_CODE;?>" width="100%" height="250px" style="border: 0px;"></iframe>
                               <?php
                                
                            }else{
                                ?>
                                <iframe id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                <?php

                            }
                            ?>

	<!--  <iframe id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
          <iframe src="<?php echo IFRAME_URL.CRICKET5_CODE; ?>" width="100%" height="200px" style="border: 0px;"></iframe>  -->
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
            <div><img id="card_c1" src="../storage/front/img/cards_new/1.png"></div>
            <div><img id="card_c2" src="../storage/front/img/cards_new/1.png"></div>
            <div><img id="card_c3" src="../storage/front/img/cards_new/1.png"></div>
            <div><img id="card_c4" src="../storage/front/img/cards_new/1.png"></div>
            <div><img id="card_c5" src="../storage/front/img/cards_new/1.png"></div>
            <div><img id="card_c6" src="../storage/front/img/cards_new/1.png"></div>
         </div>
      </div>

      <div class="casino-detail detail-page-container position-relative">
         <div class="game-market market-2 ">
            <div class="market-title"><span>Bookmaker</span></div>
            <div class="market-header">
               <div class="market-nation-detail"><span class="market-nation-name">Min: 100 Max: 3L</span></div>
               <div class="market-odd-box back"><b>Back</b></div>
               <div class="market-odd-box lay"><b>Lay</b></div>
            </div>
            <div class="market-body bookmaker-market" data-title="OPEN">
               <div class="market-row  suspended market_1_row" data-title="SUSPENDED">
                  <div class="market-nation-detail">
                     <span class="market-nation-name">AUS</span>
                     <div class="market-nation-book market_1_b_exposure market_exposure"></div>
                  </div>
                  <div class="market-odd-box back  market_1_b_btn back-1  "><span class="market-odd">-</span><span class="market-volume">0.00</span></div>
                  <div class="market-odd-box lay  market_1_l_btn lay-1 "><span class="market-odd">-</span><span class="market-volume">0.00</span></div>
               </div>
               <div class="market-row suspended market_2_row" data-title="SUSPENDED">
                  <div class="market-nation-detail">
                     <span class="market-nation-name">IND</span>
                     <div class="market-nation-book market_2_b_exposure market_exposure"></div>
                  </div>
                  <div class="market-odd-box back market_2_b_btn back-1  "><span class="market-odd">-</span><span class="market-volume">0.00</span></div>
                  <div class="market-odd-box lay market_2_l_btn lay-1  "><span class="market-odd">-</span><span class="market-volume">0.00</span></div>
               </div>
            </div>
         </div>
         <div class="game-market market-6 fancyMarket bookmaker-market" style="display:none;">
            <div class="market-title"><span>Fancy</span></div>
            <div class="market-header">
               <div class="market-nation-detail"></div>
               <div class="market-odd-box lay"><b>No</b></div>
               <div class="market-odd-box back"><b>Yes</b></div>
               <div class="fancy-min-max-box"></div>
            </div>
            <div class="market-body fancyTripple" data-title="OPEN">
               <div>
                  <div class="fancy-market suspended" data-title="SUSPENDED">
                     <div class="market-row">
                        <div class="market-nation-detail">
                           <span class="market-nation-name pointer">Aus Over 1</span>
                           <div class="market-nation-book"></div>
                        </div>
                        <div class="market-odd-box lay "><span class="market-odd">-</span></div>
                        <div class="market-odd-box back "><span class="market-odd">-</span></div>
                        <div class="fancy-min-max-box">
                           <div class="fancy-min-max"><span class="w-100 d-block">Min: 100</span><span class="w-100 d-block">Max: 1L</span></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
		 <div class="game-market market-6 fancyMarket1 bookmaker-market" style="display:none;">
            <div class="market-title"><span>Fancy</span></div>
            <div class="market-header">
               <div class="market-nation-detail"></div>
               <div class="market-odd-box lay"><b>No</b></div>
               <div class="market-odd-box back"><b>Yes</b></div>
               <div class="fancy-min-max-box"></div>
            </div>
            <div class="market-body fancyTripple1" data-title="OPEN">
               <div>
                  <div class="fancy-market suspended" data-title="SUSPENDED">
                     <div class="market-row">
                        <div class="market-nation-detail">
                           <span class="market-nation-name pointer">Aus Over 1</span>
                           <div class="market-nation-book"></div>
                        </div>
                        <div class="market-odd-box lay "><span class="market-odd">-</span></div>
                        <div class="market-odd-box back "><span class="market-odd">-</span></div>
                        <div class="fancy-min-max-box">
                           <div class="fancy-min-max"><span class="w-100 d-block">Min: 100</span><span class="w-100 d-block">Max: 1L</span></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=cricketv3">View All</a></span></div>
         <div class="casino-last-results" id="last-result"></div>
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
<script type="text/javascript" src='footer-js.js?36'></script>

<?

include("betpopcss.php");
?>

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
	var markettype = "FIVE_5_CRICKET";
	var markettype_2 = markettype;
	var back_html = "";
	var lay_html = "";
	var gstatus = "";
	var last_result_id = '0';

	   var display_runners_bm = [{
            runner_id: 1,
            runner_name: 'AUS'
        },
        {
            runner_id: 2,
            runner_name: 'IND'
        }
    ];

    var selectorIdArray = [1, 2];
    var xb = 0;
    var html_match = "";

    while (display_runners_bm[xb]) {

        html_match += '<div class="row row5 mt-2">' +
            '<div class="col-4"><span>' + display_runners_bm[xb].runner_name + '</span></div>' +
            '<div class="col-4 text-center text-success"><b>' +
            '<span id="last_data_' + display_runners_bm[xb].runner_id + '_BOOKMAKER_ODDS" class="last_data_BOOKMAKER_ODDS clear_exposure"></span>' +
            '</b></div>' +
            '<div class="col-4 text-right">' +
            '<span id="middle_data_' + display_runners_bm[xb].runner_id + '_BOOKMAKER_ODDS" class="middle_data_BOOKMAKER_ODDS clear_exposure"></span>' +
            '</div></div>';

        xb++;
    }
    $("#back_bookmaker_data_superover").html(html_match);

	function websocket(type) {
    socket = io.connect(websocketurl);
    socket.on('connect', function() {
    	socket.emit('Room', 'cricketv3');
    	socket.emit('getLiveScore',{
    		dataType	: true
    	});
    });
	socket.on('gameIframe', function(data){
    	$("#casinoIframe").attr('src',data);
    });
    socket.on('game', function(data) {

console.log("data=",data);

		  if (data && data['t1'] && data['t1'][0]) {
		  	if(oldGameId != data.t1[0].mid && data.t1[0].mid != 0 && data.t1[0].mid != "0"){
		  		setTimeout(function(){
						clearCards();
					},<?php echo CASINO_RESULT_TIMEOUT; ?>);
		  	}

			if(oldGameId != data.t1[0].mid){
			  GAME_ID =   (data.t1[0].mid && typeof data.t1[0].mid == "string") ? data.t1[0].mid.split('.')[1] : data.t1[0].mid;
			 // GAME_ID = GAME_ID[1];
		  }
		  	oldGameId = data.t1[0].mid;
        		if(data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast){
				$(".casino-remark").text(data.t1[0].remark);
				var desc = data.t1[0].desc;

					$("#card_c1").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C1 + ".png");
					$("#card_c2").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C2 + ".png");
					$("#card_c3").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C3 + ".png");
					$("#card_c4").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C4 + ".png");
					$("#card_c5").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C5 + ".png");
					$("#card_c6").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C6 + ".png");


			}
			clock.setValue(data.t1[0].autotime);
			$(".round_no").text(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
			$("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
			eventId = data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid;

				for(var j in data['t2']){
				  	selectionid = parseInt(data['t2'][j].sid);
					runner = data['t2'][j].nat || data['t2'][j].nation || data['t2'][j].nat || data['t2'][j].nation;
					b1 = data['t2'][j].b1;
					bs1 = data['t2'][j].bs1;
					l1 = data['t2'][j].l1;
					ls1 = data['t2'][j].ls1;

				  	b11 = b1;
				  	markettype = "FIVE_5_CRICKET";

					b1 = b1 == 0 ? "-" : b1;
					bs1 = bs1 == 0 ? "" : parseFloat(bs1).toFixed(2);

					l1 = l1 == 0 ? "-" : l1;
					ls1 = ls1 == 0 ? "" : parseFloat(ls1).toFixed(2);


						back_html = '<span class="market-odd d-block">'+b1+'</span><span class="market-volumn d-block">'+bs1+'</span>';


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


						lay_html = '<span class="market-odd d-block">'+l1+'</span><span class="market-volumn d-block">'+ls1+'</span>';


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
						$(".market_"+selectionid+"_row").attr("data-title",'SUSPENDED');
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

						b1 = b1 == 0 ? "-" : parseInt(b1);
						bs1 = bs1 == 0 ? "" : parseInt(bs1);

						l1 = l1 == 0 ? "-" : parseInt(l1);
						ls1 = ls1 == 0 ? "" : parseInt(ls1);


						is_suspended = '';
						is_suspended_title = '';
						gstatus =  data['t3'][f].status.toString();
						if(gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED"){
							is_suspended = 'suspended';
							is_suspended_title = 'SUSPENDED';
						}



						back_html ='<span class="market-odd d-block">'+b1+'</span><span class="market-volumn ">'+bs1+'</span>';
						lay_html ='<span class="market-odd d-block">'+l1+'</span><span class="market-volumn ">'+ls1+'</span>';

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
									$(".market_"+selectionid+"_row").attr("data-title",'SUSPENDED');
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
							/* fancy_data += '	<div id="five_fancy_'+selectionid+'" data-title="'+is_suspended+'" class="table-row '+is_suspended+' market_'+selectionid+'_row">';
							fancy_data += '		 <div class="float-left country-name box-4">';
							fancy_data += '			<span><b>'+runner+'</b></span> ';
							fancy_data += '			<p><span class="float-left market_'+selectionid+'_b_exposure market_exposure" style="color: black;">0</span></p>';
							fancy_data += '		 </div>';
							fancy_data += ' <div class="box-1 lay float-left text-center market_'+selectionid+'_l_btn lay-1">'+lay_html+'</div>';
							fancy_data += ' <div class="box-1 back float-left text-center market_'+selectionid+'_b_btn back-1"">'+back_html+'</div>';
							fancy_data += '</div>'; */
							fancy_data += `
                  <div id="five_fancy_${selectionid}'" class="fancy-market  ${is_suspended} market_${selectionid}_row" data-title="${is_suspended_title}">
                     <div class="market-row">
                        <div class="market-nation-detail">
                           <span class="market-nation-name pointer">${runner}</span>
                           <div class="market-nation-book market_${selectionid}_b_exposure market_exposure"></div>
                        </div>
                        <div class="market-odd-box lay  market_${selectionid}_l_btn lay-1">${lay_html}</div>
                        <div class="market-odd-box back market_${selectionid}_l_btn back-1 ">${back_html}</div>
                        <div class="fancy-min-max-box">
                           <div class="fancy-min-max"><span class="w-100 d-block">Min: 100</span><span class="w-100 d-block">Max: 1L</span></div>
                        </div>
                     </div>
                  </div>`;

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
					var fancy_data1 = '';
					for(var f in data['t4']){
						selectionid = parseInt(data['t4'][f].sid);
						runner = data['t4'][f].nat;
						b1 = data['t4'][f].b1;
						bs1 = data['t4'][f].bs1;
						l1 = data['t4'][f].l1;
						ls1 = data['t4'][f].ls1;

						b1 = b1 == 0 ? "-" : parseInt(b1);
						bs1 = bs1 == 0 ? "" : parseInt(bs1);

						l1 = l1 == 0 ? "-" : parseInt(l1);
						ls1 = ls1 == 0 ? "" : parseInt(ls1);


						is_suspended = '';
						is_suspended_title = '';
						gstatus =  data['t4'][f].status.toString();
						if(gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED"){
							is_suspended = 'suspended';
							is_suspended_title = 'SUSPENDED';
						}



						back_html ='<span class="market-odd d-block">'+b1+'</span><span class="market-volumn ">'+bs1+'</span>';
						lay_html ='<span class="market-odd d-block">'+l1+'</span><span class="market-volumn ">'+ls1+'</span>';

						if($("#five_fancy1_"+selectionid) && $("#five_fancy1_"+selectionid).length > 0){


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
									$(".market_"+selectionid+"_row").attr("data-title",'SUSPENDED');
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
							/* fancy_data += '	<div id="five_fancy_'+selectionid+'" data-title="'+is_suspended+'" class="table-row '+is_suspended+' market_'+selectionid+'_row">';
							fancy_data += '		 <div class="float-left country-name box-4">';
							fancy_data += '			<span><b>'+runner+'</b></span> ';
							fancy_data += '			<p><span class="float-left market_'+selectionid+'_b_exposure market_exposure" style="color: black;">0</span></p>';
							fancy_data += '		 </div>';
							fancy_data += ' <div class="box-1 lay float-left text-center market_'+selectionid+'_l_btn lay-1">'+lay_html+'</div>';
							fancy_data += ' <div class="box-1 back float-left text-center market_'+selectionid+'_b_btn back-1"">'+back_html+'</div>';
							fancy_data += '</div>'; */
							fancy_data1 += `
                  <div id="five_fancy1_${selectionid}'" class="fancy-market  ${is_suspended} market_${selectionid}_row" data-title="${is_suspended_title}">
                     <div class="market-row">
                        <div class="market-nation-detail">
                           <span class="market-nation-name pointer">${runner}</span>
                           <div class="market-nation-book market_${selectionid}_b_exposure market_exposure"></div>
                        </div>
                        <div class="market-odd-box lay  market_${selectionid}_l_btn lay-1">${lay_html}</div>
                        <div class="market-odd-box back market_${selectionid}_l_btn back-1 ">${back_html}</div>
                        <div class="fancy-min-max-box">
                           <div class="fancy-min-max"><span class="w-100 d-block">Min: 100</span><span class="w-100 d-block">Max: 1L</span></div>
                        </div>
                     </div>
                  </div>`;

						}




						 $(".fancyMarket1").show();
					}

					if(fancy_data1 != ""){
						$(".fancyTripple1").html(fancy_data1);
					}
				}
				else{
					$(".fancyTripple1").html("");
					$(".fancyMarket1").hide();
				}
		}
    });

    socket.on('liveScore5Cri', function(args){
		if(args && args.data){
			updateScoreBoard(args.data);
		}
    });
	socket.on('liveScoreGameIn', function(args) {
		if(args && args.data){
			
			updateScoreBoard(args.data);
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
	$("#card_c1").attr("../storage/front/img/cards_new/1.png");
	$("#card_c2").attr("../storage/front/img/cards_new/1.png");
	$("#card_c3").attr("../storage/front/img/cards_new/1.png");
	$("#card_c4").attr("../storage/front/img/cards_new/1.png");
	$("#card_c5").attr("../storage/front/img/cards_new/1.png");
	$("#card_c6").attr("../storage/front/img/cards_new/1.png");

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
		casino_type = "'cricketv3'";
		data.forEach((runData) => {
			if(parseInt(runData.win) == 1){
				ab = "result-a";
				ab1 = "A";

			}
			else if(parseInt(runData.win) == 2){
				ab = "result-b";
				ab1 = "I";

			}
			else{
				ab = "playertie";
				ab1 = "T";
			}

			eventId = runData.mid;
			html += '<span onclick="view_casiono_result('+eventId+','+casino_type+')"  class="ball-runs ml-1 '+ ab +' result">'+ ab1 + '</span>';
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
		
		$("#popup_color").removeClass("back");
		$("#popup_color").removeClass("lay");
		$("#popup_color").addClass("back");
		var fullmarketodds = $(this).attr("fullmarketodds");
		if (fullmarketodds != "") {
			side = $(this).attr("side");
			selectionid = $(this).attr("selectionid");
			market_odd_name = $(this).attr("markettype");
			
            $("#back_bookmaker_data_superover").hide();

			runner = $(this).attr("runner");
			market_runner_name = runner;
			marketname = $(this).attr("marketname");
			markettype = $(this).attr("markettype");
			fullfancymarketrate = $(this).attr("fullfancymarketrate");
			odds_change_value = "disabled";
			runs_lable = 'Runs';
			runs_lable = 'Odds';

			 eventId = $(this).attr("eventid");
            if (selectionid == "1" || selectionid == "2") {
                $("#back_bookmaker_data_superover").show();
                prv_exposure(eventId,markettype);
            }

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

			$('#profitLiability').text('');
			$(".placeBet").attr('disabled',false);
			$("#inputStake").val("");

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
			  $("#back_bookmaker_data_superover").hide();
			marketname = $(this).attr("marketname");
			markettype = $(this).attr("markettype");
			fullfancymarketrate = $(this).attr("fullfancymarketrate");
			odds_change_value = "disabled";
			runs_lable = 'Runs';
			runs_lable = 'Odds';

			 eventId = $(this).attr("eventid");
            if (selectionid == "1" || selectionid == "2") {
                $("#back_bookmaker_data_superover").show();
                prv_exposure(eventId,markettype);
            }

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

	$.ajax({
            type: 'POST',
            url: '../ajaxfiles/place_bet_net_exposure_superover.php',
            dataType: 'json',
            data: {
                eventId: bet_event_id,
                stack: inputStake,
                runs: odds,
                bet_market_type: bet_markettype,
                marketId: bet_marketId,
                bet_stake_side: bet_stake_side,
                market_ids: selectorIdArray
            },
            success: function(response) {
                var status = response.status;
                if (status == 'ok') {


                    if (response.data) {
                        //if(response.data == "MATCH_ODDS" ){
                        for (var i in response.data) {
                            $(".middle_data_" + i).hide();
                            for (var ij = 1; ij <= Object.keys(response.data[i].market_ids).length; ij++) {
                                var team = "team_" + ij;
                                var market_1 = parseInt(response.data[i].market_ids[team]);
                                var team_1_exposure = parseInt(response.data[i].exposure[team]);
                                $("#middle_data_" + market_1 + "_" + i).text(team_1_exposure);
                                if (team_1_exposure != 0) {
                                    $(".middle_data_" + i).show();
                                }
                                if (team_1_exposure >= 0) {
                                    $("#middle_data_" + market_1 + "_" + i).css('color', 'green');

                                } else {
                                    $("#middle_data_" + market_1 + "_" + i).css('color', 'red');
                                }
                                var old_val=$("#last_data_" + market_1 + "_" + i).text();
                                if(old_val == team_1_exposure){
                                    $("#middle_data_" + market_1 + "_" + i).hide();
                                }
                            }
                        }

                    }

                }
            }
        });
	profit = 0;
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
	bet_marketId = $("#bet_marketId").val();
        bet_event_id = $("#bet_event_id").val();
	$.ajax({
            type: 'POST',
            url: '../ajaxfiles/place_bet_net_exposure_superover.php',
            dataType: 'json',
            data: {
                eventId: bet_event_id,
                stack: inputStake,
                runs: odds,
                bet_market_type: bet_markettype,
                marketId: bet_marketId,
                bet_stake_side: bet_stake_side,
                market_ids: selectorIdArray
            },
            success: function(response) {
                var status = response.status;
                if (status == 'ok') {


                    if (response.data) {
                        //if(response.data == "MATCH_ODDS" ){
                        for (var i in response.data) {
                            $(".middle_data_" + i).hide();
                            for (var ij = 1; ij <= Object.keys(response.data[i].market_ids).length; ij++) {
                                var team = "team_" + ij;
                                var market_1 = parseInt(response.data[i].market_ids[team]);
                                var team_1_exposure = parseInt(response.data[i].exposure[team]);
                                $("#middle_data_" + market_1 + "_" + i).text(team_1_exposure);
                                if (team_1_exposure != 0) {
                                    $(".middle_data_" + i).show();
                                }
                                if (team_1_exposure >= 0) {
                                    $("#middle_data_" + market_1 + "_" + i).css('color', 'green');
                                } else {
                                    $("#middle_data_" + market_1 + "_" + i).css('color', 'red');
                                }
                                var old_val=$("#last_data_" + market_1 + "_" + i).text();
                                console.log(old_val,"=",team_1_exposure);
                                if(old_val == team_1_exposure){
                                    $("#middle_data_" + market_1 + "_" + i).hide();
                                }
                            }
                        }

                    }

                }
            }
        });

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
		eventType = 'FIVE_5_CRICKET';
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
		/* setTimeout(function(){ */
			$.ajax({
				 type: 'POST',
				 url: '../ajaxfiles/bet_place_five_cricket.php',
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
		/*  }, bet_sec - 2000); */
	});

	
    function prv_exposure(bet_event_id,bet_markettype){
        $.ajax({
            type: 'POST',
            url: '../ajaxfiles/get_casino_on_page_exposure.php',
            dataType: 'json',
            data: {
                main_event_id: bet_event_id,
                markettype: bet_markettype,
            },
            success: function(response) {
                var status = response.status;
                if (status == 'ok') {


                    if (response.data) {
                       var total_exposure_data = response.data;
                       var i="BOOKMAKER_ODDS";
                        $(".last_data_" + i).hide();
                        for (var exp in total_exposure_data) {
                            
                            market_1 = total_exposure_data[exp].market_id;
                            team_1_exposure_prv = total_exposure_data[exp].total_exposure;
                            console.log("ma=",market_1);
                            console.log("team_1_exposure_prv=",team_1_exposure_prv);
                                $("#last_data_" + market_1 + "_" + i).text(team_1_exposure_prv);
                                if (team_1_exposure_prv != 0) {
                                    $("#last_data_" + market_1 + "_" + i).show();
                                }
                                if (team_1_exposure_prv >= 0) {
                                    $("#last_data_" + market_1 + "_" + i).css('color', 'green');

                                } else {
                                    $("#last_data_" + market_1 + "_" + i).css('color', 'red');
                                }

                        }
                    }

                }
            }
        });
    }

</script>
<div id="open_back_place_bet" class="modal open_back_place_bet" role="dialog">
    <div class="modal-dialog" style="margin:0;">
        <div role="document" id="__BVID__30___BV_modal_content_" tabindex="-1" class="modal-content">
            <header id="__BVID__30___BV_modal_header_" class="modal-header">
                <h5 id="__BVID__30___BV_modal_title_" class="modal-title">Place Bet</h5>
                <button type="button" data-dismiss="modal" class="close">&times;</button>
            </header>
            <div id="__BVID__30___BV_modal_body_" class="modal-body" style="    padding: 0px;">
                <div class="place-bet1 pt-2 pb-2 back place-bet-modal" id="popup_color">
                       <div class="row row5">
                            <div class="col-6"><b id="market_runner_label"></b></div>
                            <div class="col-6 text-right pt-1">Profit: <span id="profitLiability"></span></div>
                        </div>
                        <div class="odd-stake-box">
                            <div class="row row5 mt-1">
                                <div class="col-6 text-center">Odds</div>
                                <div class="col-6 text-center">Amount</div>
                            </div>
                            <div class="row row5 mt-1">
                                <div class="col-6"><input type="text" id="odds_val" class="stakeinput w-100" disabled="" value="1.7"></div>
                                <div class="col-6">
                                    <div class="float-right"><input type="number" id="inputStake" class="stakeinput w-100" value=""></div>
                                    <input type='hidden' id='market_runner_label' value='' />
                                    <input type='hidden' id='bet_stake_side' value='' /><input type='hidden' id='bet_event_id' value='' /><input type='hidden' id='bet_marketId' value='' /><input type='hidden' id='bet_event_name' value='' /><input type='hidden' id='bet_market_name' value='' /><input type='hidden' id='bet_markettype' value='' /><input type='hidden' id='fullfancymarketrate' value='' /> <input type='hidden' id='oddsmarketId' value='' /><input type='hidden' id='market_runner_name' value='' /><input type='hidden' id='market_odd_name' value='' />
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row row5">
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
                                </div>
                            </div>
                        </div> -->

                       <!--  <div class="row row5 mt-2">
                            <div class="col-4">
                                <input type="number" placeholder="00" id="inputStake" class="stakeinput w-100">
                            </div>
                            <div class="col-4">
                                <button class="btn btn-primary btn-block  placeBet" id="placeBet">
                                    Submit
                                </button>
                            </div>

                        </div> -->
                        <div class="place-bet-buttons mt-1">
                            <?php
                            $get_button_value = $conn->query("select * from user_master where id=$user_id and (casino_button_value <> '' and casino_button_value IS NOT NULL)");
                            $num_rows = $get_button_value->num_rows;
                            $button_array = array();
                            if ($num_rows <= 0) {
                                $button_array[] = 500;
                                $button_array[] = 1000;
                                $button_array[] = 2000;
                                $button_array[] = 3000;
                                $button_array[] = 4000;
                                $button_array[] = 5000;
                                $button_array[] = 10000;
                                $button_array[] = 20000;
                            } else {
                                $fetch_button_value_data = mysqli_fetch_assoc($get_button_value);
                                $fetch_button_value = $fetch_button_value_data['casino_button_value'];
                                $default_stake = $fetch_button_value_data['default_stake'];
                                $one_bet_default_stake = $fetch_button_value_data['one_bet_default_stake'];
                                $button_array = explode(",", $fetch_button_value);
                            }
                            foreach ($button_array as $button_value) {
                            ?>
                                <button type="button" class="btn-place-bet btn btn-secondary btn-block1 label_stake" stake='<?php echo $button_value; ?>'>
                                        +<?php echo $button_value; ?>
                                    </button>

                            <?php
                            }
                            ?>
                        </div>
                        <div class="mt-1 place-bet-btn-box">
                            <button class="btn btn-link stackclear" style="text-decoration: underline;">Clear</button>
                            <button class="btn btn-info" data-target="#set_btn_value" data-toggle="modal">Edit</button>
                            <button class="btn btn-danger" data-dismiss="modal" class="close">Reset</button>
                            <button class="btn btn-success placeBet" id="placeBet" disabled>Place Bet</button>
                        </div>
							 <div class="mt-1 d-flex"><span>Range: 100 to 3L</span></div>
							  <div id="back_bookmaker_data_superover" style="display : none;">


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